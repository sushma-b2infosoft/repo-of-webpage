<?php
$conn=mysqli_connect("localhost","root","","test");
$sql= "SELECT*FROM student";
$result=mysqli_query($conn,$sql) or die("SQL Query failed");
$output=mysqli_fetch_all($result,MYSQLI_ASSOC);
echo json_encode($output,JSON_PRETTY_PRINT);
?>   