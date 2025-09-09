<?php
include 'db.php';

$search = $_GET['search'] ?? '';
$searchParam = "%$search%";

// ✅ Define the SQL first
$sql = "SELECT c.id, c.name, c.email, c.phone, g.name AS group_name
        FROM contact c
        LEFT JOIN groups g ON c.group_id = g.id
        WHERE c.name LIKE ? OR c.email LIKE ? OR g.name LIKE ?
        ORDER BY c.id DESC";

// ✅ THEN prepare the query
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $searchParam, $searchParam, $searchParam);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Manager</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-cont">
<h2>Contact Manager</h2>


<form method="GET" action="">
    <div class="search-bar">
    <form method="GET" class="search-form">
        <input type="text" name="search" placeholder="Search by name or email" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
        <button type="submit">Search</button>
        <a href="add.php" class="btn-link">Add New Contact</a>
    </form>
</div>

</form>

<?php if (isset($_GET['msg'])): ?>
    <p class="msg"><?= htmlspecialchars($_GET['msg']) ?></p>
<?php endif; ?>
<div class="div1">
<table>
    <thead>
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($result->num_rows > 0): while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['phone']) ?></td>
                
            <td class="action-buttons">
    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-edit">Edit</a>
    <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-delete" onclick="return confirm('Delete this contact?')">Delete</a>
</td>
            </tr>
        <?php endwhile; else: ?>
            <tr><td colspan="5">No records found</td></tr>
        <?php endif; ?>
    </tbody>
</table>
        </div>
        </div>
</body>
</html>
