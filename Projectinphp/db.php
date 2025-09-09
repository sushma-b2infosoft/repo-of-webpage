<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'taskmanager';

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("❌ Connection failed: " . mysqli_connect_error());
}
?>
