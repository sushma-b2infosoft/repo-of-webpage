<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
</head>
<body>
  <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
  <p>You are now logged in.</p>
  <a href="logout.php">Logout</a>
</body>
</html>
