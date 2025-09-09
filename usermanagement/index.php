<?php require 'dbconnect.php'; ?>
<style>
body {
    font-family: Arial;
    margin: 20px;
}
table {
    width: 60%;
}
a {
    text-decoration: none;
}
</style>
<h2>User List</h2>
<a href="adduser.php">➕ Add User</a><br><br>

<table border="1" cellpadding="8">
<tr><th>ID</th><th>Name</th><th>Email</th><th>Actions</th></tr>

<?php
$result = mysqli_query($conn, "SELECT * FROM users");
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
      <td>{$row['Id']}</td>
      <td>{$row['Name']}</td>
      <td>{$row['Email']}</td>
      <td>
        <a href='update.php?id={$row['Id']}'>✏️ Edit</a> | 
        <a href='delete.php?id={$row['Id']}' onclick='return confirm(\"Are you sure?\")'>❌ Delete</a>
      </td>
    </tr>";
}
?>
</table>
