<?php
$host="localhost";
$user= "root";
$pass="";
$dbname= "registeredform";
$conn = new mysqli($host,$user,$pass,$dbname);
if ($conn->connect_error) {
    die("connection failed". $conn->connect_error);
}
?>