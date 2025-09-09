<?php
session_start();

$correct_user = "admin";
$correct_pass = "12345";

if ($_POST['username'] === $correct_user && $_POST['password'] === $correct_pass) {
    $_SESSION['username'] = $_POST['username'];
    header("Location: dashboard.php");
    exit();
} else {
    echo "Invalid username or password.";
}
?>
