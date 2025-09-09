<?php
// Define variables and set to empty values
$name = $email = $message = "";
$nameErr = $emailErr = $messageErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Sanitize and validate Name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = htmlspecialchars(trim($_POST["name"])); // Remove spaces & escape HTML
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and spaces allowed";
        }
    }

    // Sanitize and validate Email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Sanitize and validate Message
    if (empty($_POST["message"])) {
        $messageErr = "Message is required";
    } else {
        $message = htmlspecialchars(trim($_POST["message"])); // Prevent script injection
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Secure PHP Form</title>
    <style>
        .error {color: red;}
    </style>
</head>
<body>

<h2>Contact / Register Form</h2>
<form method="post" action="">
    Name: <input type="text" name="name" value="<?php echo $name; ?>">
    <span class="error"><?php echo $nameErr; ?></span><br><br>
    
    Email: <input type="text" name="email" value="<?php echo $email; ?>">
    <span class="error"><?php echo $emailErr; ?></span><br><br>
    
    Message: <textarea name="message"><?php echo $message; ?></textarea>
    <span class="error"><?php echo $messageErr; ?></span><br><br>
    
    <input type="submit" value="Submit">
</form>

<?php
// Display sanitized data if no errors
if ($_SERVER["REQUEST_METHOD"] == "POST" && !$nameErr && !$emailErr && !$messageErr) {
    echo "<h3>Sanitized Input:</h3>";
    echo "Name: " . $name . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Message: " . nl2br($message) . "<br>";
}
?>

</body>
</html>
