<?php
require 'db.php';

$id = $_GET['id'] ?? 0;
$id = (int)$id;

$sql = "DELETE FROM tasks WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    header("Location: index.php?msg=Task deleted successfully!");
    exit;
} else {
    header("Location: index.php?msg=❌ Failed to delete task.");
    exit;
}
