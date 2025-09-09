<?php
// Force procedural mode
$connection_mode = 'procedural';
require 'db_connect.php';

echo "Connected using Procedural style.";

// Example query
// $result = mysqli_query($conn, "SELECT * FROM users");

mysqli_close($conn);
?>
