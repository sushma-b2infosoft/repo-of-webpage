<?php
header("Content-Type: application/json");
include "db.php";

$filter = $_GET['filter'] ?? 'all';
$search = $_GET['search'] ?? '';
$page   = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit  = isset($_GET['limit']) ? (int)$_GET['limit'] : 5;
$offset = ($page - 1) * $limit;

$sql = "SELECT * FROM tasks WHERE 1";
$countSql = "SELECT COUNT(*) as total FROM tasks WHERE 1";

if ($filter != 'all') {
    $sql .= " AND status='$filter'";
    $countSql .= " AND status='$filter'";
}

if (!empty($search)) {
    $search = $conn->real_escape_string($search);
    $sql .= " AND title LIKE '%$search%'";
    $countSql .= " AND title LIKE '%$search%'";
}

$totalResult = $conn->query($countSql);
$totalRow = $totalResult->fetch_assoc();
$totalRecords = $totalRow['total'];
$totalPages = ceil($totalRecords / $limit);

$sql .= " ORDER BY id DESC LIMIT $limit OFFSET $offset";

$result = $conn->query($sql);
$tasks = [];
while($row = $result->fetch_assoc()){ $tasks[]=$row; }

echo json_encode([
    "status"=>"success",
    "data"=>$tasks,
    "totalPages"=>$totalPages
]);

