<?php
// Error variables
$nameErr = $emailErr = $passwordErr = "";
$name = $email = $password = "";

// Function to clean user input and block script injection
function cleanInput($data) {
    $data = trim($data); // Remove extra spaces
    $data = stripslashes($data); // Remove backslashes
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8'); // Convert HTML tags
    return $data;
}

// Form submit check
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Name Validation
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = cleanInput($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and spaces allowed";
        }
    }

    // Email Validation
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = cleanInput($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Password Validation
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = cleanInput($_POST["password"]);
        if (strlen($password) < 6) {
            $passwordErr = "Password must be at least 6 characters";
        }
    }

    // If no errors
    if (empty($nameErr) && empty($emailErr) && empty($passwordErr)) {
        echo "<p style='color:green;'>Form submitted successfully! (Data is safe)</p>";
        // Here you can insert into database using prepared statements
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact/Register Form</title>
    <style>
        .error { color: red; }
        body { font-family: Arial; background: #f5f5f5; padding: 20px; }
        form { background: white; padding: 20px; border-radius: 10px; width: 300px; margin: auto; box-shadow: 0px 0px 10px gray; }
        input { width: 100%; padding: 8px; margin: 5px 0; }
        button { background: #4CAF50; color: white; padding: 10px; border: none; width: 100%; }
        button:hover { background: #45a049; cursor: pointer; }
    </style>
</head>
<body>

<h2 style="text-align:center;">Register / Contact Form</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    Name: <input type="text" name="name" value="<?php echo $name; ?>">
    <span class="error"><?php echo $nameErr; ?></span><br>

    Email: <input type="text" name="email" value="<?php echo $email; ?>">
    <span class="error"><?php echo $emailErr; ?></span><br>

    Password: <input type="password" name="password">
    <span class="error"><?php echo $passwordErr; ?></span><br>

    <button type="submit">Submit</button>
</form>

</body>
</html>
