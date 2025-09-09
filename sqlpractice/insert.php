<?php
$conn = new mysqli("localhost", "root", "", "mydb");
if ($conn->connect_error) die("Connection failed");

// Insert example data
$sql = "INSERT INTO users (name, email) VALUES ('Renu', 'renu@example.com')";
if ($conn->query($sql) === TRUE) {
    echo "✅ New record created successfully";
} else {
    echo "❌ Error: " . $conn->error;
}
$conn->close();
?>
