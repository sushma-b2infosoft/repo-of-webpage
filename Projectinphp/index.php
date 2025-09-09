<?php
require 'db.php';

$search = '';
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $sql = "SELECT * FROM tasks WHERE title LIKE '%$search%' OR description LIKE '%$search%' ORDER BY created_at DESC";
} else {
    $sql = "SELECT * FROM tasks ORDER BY created_at DESC";
}
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>📝 Task Manager</h2>

<form method="GET" action="">
    <input type="text" name="search" placeholder="Search tasks..." value="<?= htmlspecialchars($search) ?>">
    <button type="submit">Search</button>
    <a href="add.php" class="add-task-btn">➕ Add Task</a>
</form>

<?php if (isset($_GET['msg'])): ?>
    <p class="msg"><?= htmlspecialchars($_GET['msg']) ?></p>
<?php endif; ?>

<table>
    <tr>
        <th>ID</th><th>Title</th><th>Description</th><th>Actions</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['title']) ?></td>
        <td><?= htmlspecialchars($row['description']) ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id'] ?>">✏️ Edit</a> |
            <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure to delete this task?')">🗑️ Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
</body>
</html>
