<?php
$host="localhost";
$userName="root";
$password= "null";
$database= "'ndb'";
$conn=mysqli_connect($host,$userName,$password,$database);
if(mysqli_connect_errno()){
    echo "some error".mysqli_connect_error();
}
echo"Connection success";

?>