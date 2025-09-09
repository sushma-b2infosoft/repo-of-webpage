<?php
header("Content-Type: application/json");
include "db.php";

$id = $_POST['id'] ?? '';
if(!$id){ echo json_encode(["status"=>"error","message"=>"ID missing"]); exit; }

$stmt = $conn->prepare("DELETE FROM tasks WHERE id=?");
$stmt->bind_param("i",$id);
$stmt->execute();
echo json_encode(["status"=>"success","message"=>"Task deleted"]);
