<?php
header("Content-Type: application/json");
require "db.php";

$method = $_SERVER['REQUEST_METHOD'];
$id = $_GET['id'] ?? null; // /users.php?id=1

function response($data, $status = 200) {
    http_response_code($status);
    echo json_encode($data);
    exit;
}

switch ($method) {
    case "GET": // Read
        if ($id) {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE id=?");
            $stmt->execute([$id]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $user ? response($user, 200) : response(["error" => "User not found"], 404);
        } else {
            $stmt = $pdo->query("SELECT * FROM users");
            response($stmt->fetchAll(PDO::FETCH_ASSOC), 200);
        }
        break;

    case "POST": // Create
        $data = json_decode(file_get_contents("php://input"), true);
        if (!$data || !isset($data["name"]) || !isset($data["email"])) {
            response(["error" => "Invalid input"], 400);
        }
        $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $stmt->execute([$data["name"], $data["email"]]);
        response(["id" => $pdo->lastInsertId(), "name" => $data["name"], "email" => $data["email"]], 201);
        break;

    case "PUT": // Update
        if (!$id) response(["error" => "ID required"], 400);
        $data = json_decode(file_get_contents("php://input"), true);
        if (!$data) response(["error" => "Invalid input"], 400);

        $stmt = $pdo->prepare("UPDATE users SET name=?, email=? WHERE id=?");
        $stmt->execute([$data["name"], $data["email"], $id]);
        response(["message" => "User updated"], 200);
        break;

    case "DELETE": // Delete
        if (!$id) response(["error" => "ID required"], 400);
        $stmt = $pdo->prepare("DELETE FROM users WHERE id=?");
        $stmt->execute([$id]);
        response(["message" => "User deleted"], 200);
        break;

    default:
        response(["error" => "Method not allowed"], 405);
}
