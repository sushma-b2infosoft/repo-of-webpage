<!-- Save as: success.php -->
<?php
if (!isset($_GET['name'])) {
    // Redirect back if no data
    header("Location: form.php");
    exit();
}
$name = htmlspecialchars($_GET['name']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial;
            background: #e8f5e9;
        }
        .box {
            background: white;
            padding: 30px;
            margin: 100px auto;
            width: 400px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 0 10px green;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Welcome, <?= $name ?>!</h2>
    <p>Your login was successful.</p>
</div>

</body>
</html>


