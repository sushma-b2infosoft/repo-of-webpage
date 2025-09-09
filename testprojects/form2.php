<!-- Save as: form.php -->
<?php
$name = $password = "";
$nameErr = $passwordErr = "";
$success = "";
$redirect = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid = true;

    // Validate name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required.";
        $valid = false;
    } elseif (strlen($_POST["name"]) < 3) {
        $nameErr = "Name must be at least 3 characters.";
        $valid = false;
    } else {
        $name = htmlspecialchars($_POST["name"]);
    }

    // Validate password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required.";
        $valid = false;
    } elseif ($_POST["password"] !== "123456") { // Hardcoded example
        $passwordErr = "Incorrect password.";
        $valid = false;
    } else {
        $password = htmlspecialchars($_POST["password"]);
    }

    // If everything is valid, redirect
    if ($valid) {
        $success = "✅ Login successful! Welcome";$name="";
         $redirect = true;
         header("Refresh:3; url=success.php");   
    }
    }
     ?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial;
            background: #f3f3f3;
        }
        .container {
            background: white;
            padding: 25px;
            margin: 50px auto;
            width: 350px;
            border-radius: 10px;
            box-shadow: 0 0 10px gray;
        }
        input[type=text], input[type=password] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .error {
            color: red;
            font-size: 14px;
        }
        input[type=submit] {
            background: #28a745;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Login Form</h2>
    <!-- ✅ Show success message -->
    <?php if (!empty($success)) : ?>
        <div class="success"><?= $success ?></div>
    <?php endif; ?>
    <form method="post" action="form2.php">
        <label>Name:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($name) ?>">
        <div class="error"><?= $nameErr ?></div>

        <label>Password:</label>
        <input type="password" name="password">
        <div class="error"><?= $passwordErr ?></div>

        <input type="submit" value="Login">
    </form>
</div>

</body>
</html>

