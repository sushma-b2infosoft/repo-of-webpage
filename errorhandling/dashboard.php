<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }
        header {
            background-color: #34495e;
            color: white;
            padding: 15px;
            text-align: center;
        }
        nav {
            background-color: #2c3e50;
            overflow: hidden;
        }
        nav a {
            float: left;
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            transition: background 0.3s;
        }
        nav a:hover {
            background-color: #1abc9c;
        }
        .container {
            padding: 20px;
        }
        .welcome {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 2px 8px rgba(0,0,0,0.1);
            max-width: 500px;
            margin: 40px auto;
            text-align: center;
        }
        .welcome h2 {
            color: #2c3e50;
        }
        .btn-logout {
            background-color: #e74c3c;
            border: none;
            padding: 10px 20px;
            color: white;
            cursor: pointer;
            border-radius: 4px;
            text-decoration: none;
        }
        .btn-logout:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

<header>
    <h1>My Dashboard</h1>
</header>

<nav>
    <a href="#">Home</a>
    <a href="#">Profile</a>
    <a href="#">Settings</a>
    <a href="logout.php" style="float:right;">Logout</a>
</nav>

<div class="container">
    <div class="welcome">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?>!</h2>
        <p>You have successfully logged in to your account.</p>
        <a href="logout.php" class="btn-logout">Logout</a>
    </div>
</div>

</body>
</html>

