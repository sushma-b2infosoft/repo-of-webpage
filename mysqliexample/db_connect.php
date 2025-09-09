<?php
require_once 'config.php';

/*
 * Set connection mode:
 * 'procedural' or 'oop'
 */
$connection_mode = 'oop'; // Change to 'procedural' if needed

if ($connection_mode === 'procedural') {
    // Procedural MySQLi connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Error handling
    if (!$conn) {
        error_log("Procedural DB connection failed: " . mysqli_connect_error());
        die("We're experiencing technical difficulties. Please try again later.");
    }

} elseif ($connection_mode === 'oop') {
    // OOP MySQLi connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Error handling
    if ($conn->connect_error) {
        error_log("OOP DB connection failed: " . $conn->connect_error);
        die("We're experiencing technical difficulties. Please try again later.");
    }

} else {
    die("Invalid connection mode specified.");
}
?>
