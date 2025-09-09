<?php
require_once __DIR__ . '/config.php';

/** Trim + basic sanitize */
function clean($v) {
    return htmlspecialchars(trim((string)$v), ENT_QUOTES, 'UTF-8');
}

/** Flash messages */
function set_flash($type, $msg) {
    $_SESSION['flash'][$type][] = $msg;
}
function get_flashes() {
    $flashes = $_SESSION['flash'] ?? [];
    unset($_SESSION['flash']);
    return $flashes;
}

/** Redirect helper */
function redirect($path) {
    header("Location: " . $path);
    exit;
}

/** Session login */
function login_user(array $user) {
    session_regenerate_id(true);
    $_SESSION['user_id'] = (int)$user['id'];
    $_SESSION['user_name'] = $user['name'];
    $_SESSION['user_email'] = $user['email'];
    $_SESSION['last_activity'] = time();
}

/** Session timeout enforcement */
function check_session_timeout() {
    if (!empty($_SESSION['user_id'])) {
        if (empty($_SESSION['last_activity'])) {
            $_SESSION['last_activity'] = time();
        } elseif (time() - $_SESSION['last_activity'] > SESSION_TIMEOUT) {
            logout_user(true); // silent (no redirect here)
            set_flash('info', 'Session expired. Please log in again.');
            redirect('login.php');
        } else {
            $_SESSION['last_activity'] = time(); // refresh activity
        }
    }
}

/** Require login for protected pages */
function require_login() {
    auto_login_from_cookie();
    check_session_timeout();
    if (empty($_SESSION['user_id'])) {
        set_flash('error', 'Please log in to continue.');
        redirect('login.php');
    }
}

/** Logout (destroy session + revoke remember token + optionally redirect) */
function logout_user($silent = false) {
    global $conn;

    // delete remember token if cookie exists
    if (!empty($_COOKIE[REMEMBER_COOKIE_NAME])) {
        list($selector) = explode(':', $_COOKIE[REMEMBER_COOKIE_NAME], 2);
        $stmt = $conn->prepare("DELETE FROM auth_tokens WHERE selector = ?");
        $stmt->bind_param('s', $selector);
        $stmt->execute();
        $stmt->close();

        // clear cookie
        setcookie(REMEMBER_COOKIE_NAME, '', time() - 3600, '/', '', false, true);
    }

    // clear session
    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
    session_destroy();

    if (!$silent) {
        set_flash('success', 'Logged out successfully.');
        redirect('login.php');
    }
}

/** Create secure remember-me cookie + DB entry */
function set_remember_me($user_id) {
    global $conn;

    // Generate random selector + validator
    $selector  = bin2hex(random_bytes(12)); // 24 chars
    $validator = bin2hex(random_bytes(32)); // 64 chars
    $validator_hash = hash('sha256', $validator);

    // Expiry
    $expires = new DateTimeImmutable('+' . REMEMBER_COOKIE_DAYS . ' days');

    // Store in DB
    $stmt = $conn->prepare("INSERT INTO auth_tokens (user_id, selector, validator_hash, expires_at) VALUES (?, ?, ?, ?)");
    $expStr = $expires->format('Y-m-d H:i:s');
    $stmt->bind_param('isss', $user_id, $selector, $validator_hash, $expStr);
    $stmt->execute();
    $stmt->close();

    // Store cookie: selector:validator
    $cookie_value = $selector . ':' . $validator;
    $cookie_exp = time() + (REMEMBER_COOKIE_DAYS * 24 * 60 * 60);
    setcookie(REMEMBER_COOKIE_NAME, $cookie_value, [
        'expires'  => $cookie_exp,
        'path'     => '/',
        'domain'   => '',
        'secure'   => false, // set true on HTTPS
        'httponly' => true,
        'samesite' => 'Lax'
    ]);
}

/** Auto login via remember-me (if session absent) */
function auto_login_from_cookie() {
    global $conn;

    if (!empty($_SESSION['user_id'])) return; // already logged in
    $cookie = $_COOKIE[REMEMBER_COOKIE_NAME] ?? '';
    if (!$cookie || strpos($cookie, ':') === false) return;

    list($selector, $validator) = explode(':', $cookie, 2);
    if (!$selector || !$validator) return;

    $stmt = $conn->prepare("SELECT user_id, validator_hash, expires_at FROM auth_tokens WHERE selector = ?");
    $stmt->bind_param('s', $selector);
    $stmt->execute();
    $res = $stmt->get_result();
    $row = $res->fetch_assoc();
    $stmt->close();

    if (!$row) {
        // no matching token; clear cookie
        setcookie(REMEMBER_COOKIE_NAME, '', time() - 3600, '/', '', false, true);
        return;
    }

    // Check expiry
    if (new DateTimeImmutable($row['expires_at']) < new DateTimeImmutable()) {
        // expired: cleanup and clear cookie
        $stmt = $conn->prepare("DELETE FROM auth_tokens WHERE selector = ?");
        $stmt->bind_param('s', $selector);
        $stmt->execute();
        $stmt->close();
        setcookie(REMEMBER_COOKIE_NAME, '', time() - 3600, '/', '', false, true);
        return;
    }

    // Validate hash
    $calc = hash('sha256', $validator);
    if (!hash_equals($row['validator_hash'], $calc)) {
        // potential theft: revoke all tokens for user
        $uid = (int)$row['user_id'];
        $stmt = $conn->prepare("DELETE FROM auth_tokens WHERE user_id = ?");
        $stmt->bind_param('i', $uid);
        $stmt->execute();
        $stmt->close();
        setcookie(REMEMBER_COOKIE_NAME, '', time() - 3600, '/', '', false, true);
        return;
    }

    // Token is valid → fetch user and log them in
    $uid = (int)$row['user_id'];
    $stmt = $conn->prepare("SELECT id, name, email FROM users WHERE id = ?");
    $stmt->bind_param('i', $uid);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if ($user) {
        login_user($user);

        // Rotate token (best practice)
        $stmt = $conn->prepare("DELETE FROM auth_tokens WHERE selector = ?");
        $stmt->bind_param('s', $selector);
        $stmt->execute();
        $stmt->close();

        set_remember_me($user['id']);
    }
}

/** Render flashes */
function render_flashes() {
    $flashes = get_flashes();
    if (!$flashes) return;
    echo '<div class="flash-wrap">';
    foreach ($flashes as $type => $msgs) {
        foreach ($msgs as $m) {
            echo '<div class="flash ' . htmlspecialchars($type) . '">' . htmlspecialchars($m) . '</div>';
        }
    }
    echo '</div>';
}
