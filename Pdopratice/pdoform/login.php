<?php
require "pdo.php"; // include PDO connection

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepared statement to prevent SQL Injection
    $stmt = $pdo->prepare("SELECT * FROM newuser WHERE email = :email AND password = :password");

    // Bind parameters
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindValue(":password", $password, PDO::PARAM_STR); // bindValue example

    $stmt->execute();

    // fetch() example
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        echo "✅ Login Successful! Welcome " . $user['name'];
    } else {
        echo "❌ Invalid Email or Password.";
    }
}
?>
