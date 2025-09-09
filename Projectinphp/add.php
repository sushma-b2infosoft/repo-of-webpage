<?php
require 'db.php';

$title = $desc = '';
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

        $sql = "INSERT INTO tasks (title, description) VALUES ('$title', '$desc')";
        if (mysqli_query($conn, $sql)) {
            header("Location: index.php?msg=Task added successfully!");
            exit;
        } else {
            $errors[] = "Failed to add task.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Task</title>
</head>
<body>
<h2>➕ Add Task</h2>

<?php foreach($errors as $error): ?>
    <p style="color:red;"><?= htmlspecialchars($error) ?></p>
<?php endforeach; ?>

<form method="POST">
    <input type="text" name="title" placeholder="Task title" value="<?= htmlspecialchars($title) ?>"><br><br>
    <textarea name="description" placeholder="Task description"><?= htmlspecialchars($desc) ?></textarea><br><br>
    <button type="submit">Add Task</button>
    <a href="index.php">⬅️ Back</a>
</form>
</body>
</html>
