<?php include 'db.php'; ?>

<?php
$id = $_GET['id'] ?? '';
if (!$id) {
    die("ID is required");
}

$stmt = $conn->prepare("SELECT * FROM contacts WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$contact = $result->fetch_assoc();
$stmt->close();

if (!$contact) {
    die("Contact not found.");
}

$name = $contact['name'];
$email = $contact['email'];
$phone = $contact['phone'];
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);

    if (empty($name) || empty($email) || empty($phone)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } else {
        $stmt = $conn->prepare("UPDATE contacts SET name=?, email=?, phone=? WHERE id=?");
        $stmt->bind_param("sssi", $name, $email, $phone, $id);
        if ($stmt->execute()) {
            header("Location: index.php?msg=Contact updated successfully");
            exit;
        } else {
            $error = "Error updating contact.";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Contact</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Edit Contact</h2>

<?php if ($error): ?>
    <p class="error"><?= $error ?></p>
<?php endif; ?>

<form method="POST">
    <label>Name:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($name) ?>"><br>

    <label>Email:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($email) ?>"><br>

    <label>Phone:</label>
    <input type="text" name="phone" value="<?= htmlspecialchars($phone) ?>"><br>

    <button type="submit">Update</button>
    <a href="index.php">Cancel</a>
</form>
</body>
</html>
