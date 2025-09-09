<?php
require 'db.php';

$id = $_GET['id'] ?? 0;
$id = (int)$id;

$sql = "SELECT * FROM tasks WHERE id = $id";
$result = mysqli_query($conn, $sql);
$task = mysqli_fetch_assoc($result);

if (!$task) {
    die("Task not found.");
}

$title = $task['title'];
$desc = $task['description'];
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $desc = trim($_POST['description']);

    if (empty($title)) {
        $errors[] = "Title is required.";
    }

    if (!$errors) {
        $title = mysqli_real_escape_string($conn, $title);
        $desc = mysqli_real_escape_string($conn, $desc);
        $sql = "UPDATE tasks SET title='$title', description='$desc' WHERE id=$id";
        if (mysqli_query($conn, $sql)) {
            header("Location: index.php?msg=Task updated successfully!");
            exit;
        } else {
            $errors[] = "Update failed.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Edit Task</title></head>
<body>
<h2>✏️ Edit Task</h2>

<?php foreach($errors as $error): ?>
    <p style="color:red;"><?= htmlspecialchars($error) ?></p>
<?php endforeach; ?>

<form method="POST">
    <input type="text" name="title" value="<?= htmlspecialchars($title) ?>"><br><br>
    <textarea name="description"><?= htmlspecialchars($desc) ?></textarea><br><br>
    <button type="submit">Update</button>
    <a href="index.php">⬅️ Back</a>
</form>
</body>
</html>
