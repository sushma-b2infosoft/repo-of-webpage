<?php
// Define database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "mydb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);





//error message
if (!$conn) {
    // Log technical error (optional)
    error_log("Connection failed: " . mysqli_connect_error());

    // Show user-friendly message
    die("Sorry, we are experiencing technical difficulties. Please try again later.");
}

echo "Connected successfully";
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";

// Close the connection (optional but recommended)
mysqli_close($conn);


///Object oriented mysqli()
// Create connection using OOP
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

// Close connection (optional but good practice)
$conn->close(); 
?>