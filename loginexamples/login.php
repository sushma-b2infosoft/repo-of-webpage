<?php
session_start();

// Dummy credentials
$valid_username = "Reenu";
$valid_password = "1234";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Check credentials
    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        echo "<p style='color:red; text-align:center;'>Invalid username or password.</p>";
        echo "<p style='text-align:center;'><a href='login.html'>Try Again</a></p>";
    }
} else {
    header("Location: login.html");
    exit;
}
?>
