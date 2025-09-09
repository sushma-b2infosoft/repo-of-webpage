<?php
/*$name = $email = $message = "";
$nameErr = $emailErr = $messageErr = "";
$successMsg = "";
/*if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Check if name is empty
    if (empty($name)) {
        echo "Name is required<br>";
    } else {
        echo "Name: $name<br>";
    }

    // Check if password is empty
    if (empty($password)) {
        echo "Password is required<br>";
    } elseif (strlen($password) < 6) {
        echo "Password must be at least 6 characters long<br>";
    } else {
        echo "Password is valid<br>";
    }
}*/
// Check if form is 

$name = $email = $message = $password = $gender = $country = "";
$nameErr = $emailErr = $messageErr = $passwordErr = $genderErr = $countryErr = "";
$successMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } elseif (strlen($_POST["name"]) < 3) {
        $nameErr = "Name must be at least 3 characters";
    } else {
        $name = htmlspecialchars($_POST["name"]);
    }

    // Email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    } else {
        $email = htmlspecialchars($_POST["email"]);
    }

    // Password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } elseif (strlen($_POST["password"]) < 6) {
        $passwordErr = "Password must be at least 6 characters";
    } else {
        $password = htmlspecialchars($_POST["password"]);
    }

    // Gender
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = htmlspecialchars($_POST["gender"]);
    }

    // Country
    if (empty($_POST["country"])) {
        $countryErr = "Please select a country";
    } else {
        $country = htmlspecialchars($_POST["country"]);
    }

    // Message
    if (empty($_POST["message"])) {
        $messageErr = "Message is required";
    } elseif (strlen($_POST["message"]) < 10) {
        $messageErr = "Message must be at least 10 characters";
    } else {
        $message = htmlspecialchars($_POST["message"]);
    }

    // Success
    if (empty($nameErr) && empty($emailErr) && empty($passwordErr) && empty($genderErr) && empty($countryErr) && empty($messageErr)) {
        $successMsg = "Form submitted successfully!";
        // You can store data in database or send email here
    }
}
?>

