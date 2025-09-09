<?php
require_once __DIR__ . '/function.php';

// If already logged in, redirect
if (!empty($_SESSION['user_id'])) {
    redirect('dashboard.php');
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = clean($_POST['name'] ?? '');
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $pass  = (string)($_POST['password'] ?? '');

    if ($name === '' || $email === '' || $pass === '') {
        $errors[] = "All fields are required.";
    }
    if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }
    if (strlen($pass) < 6) {
        $errors[] = "Password must be at least 6 characters.";
    }

    if (!$errors) {
        // Check duplicate email
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $errors[] = "Email is already registered.";
        }
        $stmt->close();
    }

    if (!$errors) {
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $name, $email, $hash);
        if ($stmt->execute()) {
            set_flash('success', 'Registration successful! Please log in.');
            redirect('login.php');
        } else {
            $errors[] = "Could not register user. Please try again.";
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="card">
  <h1>Create Account</h1>
  <?php render_flashes(); ?>
  <?php foreach ($errors as $e): ?>
    <div class="flash error"><?= htmlspecialchars($e) ?></div>
  <?php endforeach; ?>
  <form method="post" autocomplete="off" novalidate>
    <label>Name</label>
    <input type="text" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required>

    <label>Email</label>
    <input type="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>

    <label>Password</label>
    <input type="password" name="password" required minlength="6">

    <button type="submit">Register</button>
    <p class="muted">Already have an account? <a href="login.php">Login</a></p>
  </form>
</div>
</body>
</html>
