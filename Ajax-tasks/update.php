<?php
header("Content-Type: application/json");
include "db.php";

$id = $_POST['id'] ?? '';
$title = $_POST['title'] ?? '';
$status = $_POST['status'] ?? '';

if(!$id){ echo json_encode(["status"=>"error","message"=>"ID missing"]); exit; }

if($title){
    $stmt = $conn->prepare("UPDATE tasks SET title=? WHERE id=?");
    $stmt->bind_param("si",$title,$id);
    $stmt->execute();
    echo json_encode(["status"=>"success","message"=>"Task updated"]);
} elseif($status){
    $stmt = $conn->prepare("UPDATE tasks SET status=? WHERE id=?");
    $stmt->bind_param("si",$status,$id);
    $stmt->execute();
    echo json_encode(["status"=>"success","message"=>"Status changed"]);
}
