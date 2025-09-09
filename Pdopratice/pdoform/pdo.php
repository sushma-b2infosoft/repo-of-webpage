<?php
// pdo.php — reusable PDO connection
$host = "localhost";
$dbname = "mydb";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=mydb;charset=utf8", $username, $password);
    // Set error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database Connection Failed: " . $e->getMessage());
}
?>
