<?php
require_once __DIR__ . '/function.php';

// If already logged in, redirect
auto_login_from_cookie();
if (!empty($_SESSION['user_id'])) {
    redirect('dashboard.php');
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $pass  = (string)($_POST['password'] ?? '');
    $remember = !empty($_POST['remember']);

    if ($email === '' || $pass === '') {
        $errors[] = "Email and password are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    if (!$errors) {
        $stmt = $conn->prepare("SELECT id, name, email, password FROM users WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $res = $stmt->get_result();
        $user = $res->fetch_assoc();
        $stmt->close();

        if ($user && password_verify($pass, $user['password'])) {
            login_user($user);
            if ($remember) {
                set_remember_me($user['id']);
            }
            set_flash('success', 'Logged in successfully.');
            redirect('dashboard.php');
        } else {
            $errors[] = "Invalid email or password.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="card">
  <h1>Welcome Back</h1>
  <?php render_flashes(); ?>
  <?php foreach ($errors as $e): ?>
    <div class="flash error"><?= htmlspecialchars($e) ?></div>
  <?php endforeach; ?>
  <form method="post" autocomplete="off" novalidate>
    <label>Email</label>
    <input type="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>

    <label>Password</label>
    <input type="password" name="password" required>

    <label class="checkbox"><input type="checkbox" name="remember" <?= !empty($_POST['remember']) ? 'checked' : '' ?>> Remember me</label>

    <button type="submit">Login</button>
    <p class="muted">No account? <a href="register.php">Create one</a></p>
  </form>
</div>
</body>
</html>
