<!DOCTYPE html>
<html>
<head>
<title>Variables in php</title>
</head>
<body>
<?php
  /*$name = "Renu";
  $age = 25;
  $price = 99.99;

  echo "Name: $name<br>";
  echo "Age: $age<br>";
  echo "Price: $price";
  /*Print_r() or gettype()
  <?php
$data = ["id" => 101, "name" => "Renu"];
print_r($data);
echo "Data type: " . gettype($data);  // Outputs: Data type: array
?>*/
/*Superglobals in php
$-GET
echo $_GET['name'];  // Output: Renu

*************POST method
<form method="post">
  <input name="email">
  <input type="submit">
</form>
<?php
echo $_POST['email'];
?>
***********SERVER METHODS
echo $_SERVER['SERVER_NAME'];   // localhost
echo $_SERVER['REQUEST_METHOD']; // GET or POST

$_SESSION — Session Variables*******
session_start();
$_SESSION['user'] = "Renu";
echo $_SESSION['user'];

$GLOBALS — All Global Variables*********

$x = 100;
function test() {
  echo $GLOBALS['x'];  // Accesses global variable inside function
}
test();
?>*/
/*creates variables for a name age and email display them a sentence using both 
concatenation and interploation in php?*/

 $name = "Renu";
 $age = 25;
 $email = "renu@example.com";
?>
<?php
echo "Name: " . $name . ", Age: " . $age . ", Email: " . $email . "<br>";
?>
<?php
echo "Name: $name, Age: $age, Email: $email<br>";
?>







</body>

</html>