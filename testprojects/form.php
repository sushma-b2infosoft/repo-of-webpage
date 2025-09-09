<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h2>Form Data Received:</h2>";

    echo "Name: " . htmlspecialchars($_POST['name']) . "<br>";

    
    echo "Email: " . htmlspecialchars($_POST['email']) . "<br>";
    echo "Password: " . htmlspecialchars($_POST['password']) . "<br>";
    echo "About: " . htmlspecialchars($_POST['about']) . "<br>";
    echo "Gender: " . htmlspecialchars($_POST['gender']) . "<br>";

    if (!empty($_POST['hobbies'])) {
        echo "Hobbies: " . implode(", ", $_POST['hobbies']) . "<br>";
    } else {
        echo "Hobbies: None selected<br>";
    }

    echo "Country: " . htmlspecialchars($_POST['country']) . "<br>";
} else {
    echo "No form data submitted.";
}
if (!isset($_POST["name"]) || empty(trim($_POST["name"]))) {
        echo "Name is required.<br>";
    } else {
        $name = trim($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            echo "Only letters and spaces allowed.<br>";
        }
    }

    if (!isset($_POST["email"]) || empty($_POST["email"])) {
        echo "Email is required.<br>";
    } else {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format.<br>";
        }
    }

    if (!isset($_POST["password"]) || strlen($_POST["password"]) < 6) {
        echo "Password must be at least 6 characters long.<br>";
    }


?>
