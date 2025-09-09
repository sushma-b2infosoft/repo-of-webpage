<?php
// $host="localhost";
// $username= "root";
// $dbname = "mydb";
// $password= "";
// try{
//     $conn = new PDO("mysql:host=$host;dbname=mydb", $username, $password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// }catch(PDOException $err){
//     echo"connect done";

// }
// echo"<br>";
// $result=$conn->query("SHOW TABLES");
// $host = "localhost";
// $username = "root";
// $dbname = "mydb";
// $password = "";

// try {
//     $conn = new PDO("mysql:host=$host;dbname=$mydb", $username, $password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "Connected successfully<br>";
// } catch (PDOException $err) {
//     die("Connection failed: " . $err->getMessage());
// }

// echo "<br>Tables in database '$dbname':<br>";

// // Run the query
// $result = $conn->query("SHOW TABLES");

// // Fetch and display results
// while ($row = $result->fetch(PDO::FETCH_NUM)) {
//     echo $row[0] . "<br>";
$host = "localhost";
$dbname = "mydb";
$username = "root";
$password = "";

try {
    // Create PDO connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch data
    $stmt = $conn->query("SELECT id, name, email FROM users");

    // Display data
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "ID: " . $row['id'] . " | ";
        echo "Name: " . $row['name'] . " | ";
        echo "Email: " . $row['email'] . "<br>";
    }

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?> 