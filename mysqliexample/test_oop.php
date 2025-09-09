<?php
// Force OOP mode
$connection_mode = 'oop';
require 'db_connect.php';

echo "Connected using Object-Oriented style.";

// Example query
// $result = $conn->query("SELECT * FROM users");

$conn->close();
?>
