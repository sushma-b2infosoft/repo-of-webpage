<?php
$conn = new mysqli("localhost", "root", "", "mydb");
$result = $conn->query("SELECT * FROM users");

echo "<h3>User List:</h3><ul>";
while ($row = $result->fetch_assoc()) {
    echo "<li>{$row['id']}: {$row['name']} ({$row['email']})</li>";
}
echo "</ul>";
$conn->close();
?>
