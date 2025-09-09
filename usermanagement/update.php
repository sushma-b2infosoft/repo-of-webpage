<?php
require 'dbconnect.php';
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name  = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);

    $stmt = mysqli_prepare($conn, "UPDATE users SET name=?, email=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "ssi", $name, $email, $id);
    mysqli_stmt_execute($stmt);
    echo "<p>Updated. <a href='index.php'>Go back</a></p>";
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>

<h2>Edit User</h2>
<form method="post">
  Name: <input type="text" name="name" value="<?= $row['name'] ?>" required><br><br>
  Email: <input type="email" name="email" value="<?= $row['email'] ?>" required><br><br>
  <input type="submit" value="Update">
</form>
