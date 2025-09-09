<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Task Manager</h2>
    
    <!-- Add Task Form -->
    <form action="add.php" method="POST" class="task-form">
        <input type="text" name="title" placeholder="Task Title" required>
        <textarea name="description" placeholder="Task Description"></textarea>
        <select name="status">
            <option value="Pending">Pending</option>
            <option value="Completed">Completed</option>
        </select>
        <button type="submit">Add Task</button>
    </form>

    <!-- Task Table -->
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example Task -->
            <tr>
                <td>Buy Groceries</td>
                <td>Milk, Bread, Eggs</td>
                <td>Pending</td>
                <td>
                    <a href="edit.php?id=1" class="edit-btn">Edit</a>
                    <a href="delete.php?id=1" class="delete-btn" onclick="return confirm('Delete this task?')">Delete</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

</body>
</html>

