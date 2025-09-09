<?php
header("Content-Type: application/json");
include "db.php";

$title = $_POST['title'] ?? '';
if(empty($title)){
    echo json_encode(["status"=>"error","message"=>"Title required"]);
    exit;
}

$stmt = $conn->prepare("INSERT INTO tasks (title) VALUES (?)");
$stmt->bind_param("s",$title);
$stmt->execute();
echo json_encode(["status"=>"success","message"=>"Task added"]);
