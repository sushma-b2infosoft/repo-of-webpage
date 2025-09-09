<?php require 'dbconnect.php'; ?>

<h2>Add New User</h2>
<form method="post">
  Name: <input type="text" name="name" required><br><br>
  Email: <input type="email" name="email" required><br><br>
  <input type="submit" value="Create">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name  = trim($_POST["name"]);
    $email = trim($_POST["email"]);

    $stmt = mysqli_prepare($conn, "INSERT INTO users (name, email) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, "ss", $name, $email);
    mysqli_stmt_execute($stmt);

    echo "<p>User created. <a href='index.php'>Go back</a></p>";
    mysqli_stmt_close($stmt);
}
?>
