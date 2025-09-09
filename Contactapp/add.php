<?php include 'db.php'; ?>

<?php
$name = $email = $phone = "";
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
        $stmt = $conn->prepare("INSERT INTO contact (name, email, phone) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $phone);
        if ($stmt->execute()) {
            header("Location: index.php?msg=Contact added successfully");
            exit;
        } else {
            $error = "Error adding contact.";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Contact</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class= "form-cont">
<h2>Add New Contact</h2>

<?php if ($error): ?>
    <p class="error"><?= $error ?></p>
<?php endif; ?>

<form method="POST" class="form1">
    <label>Name:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($name) ?>"><br>

    <label>Email:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($email) ?>"><br>

    <label>Phone:</label>
    <input type="text" name="phone" value="<?= htmlspecialchars($phone) ?>"><br>

    <button type="submit">Save</button>
    <a href="index.php">Cancel</a>
</form>
</div>
</body>
</html>
