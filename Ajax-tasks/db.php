<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "taskdb";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die(json_encode(["status"=>"error","message"=>"DB Connection Failed"]));
}
?>
