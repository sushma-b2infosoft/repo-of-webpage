<!DOCTYPE html>
<html>
<head>
    <title>Grading System</title>
    <style>
    body {
            font-family: Arial, sans-serif;
            background: #f3f3f3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .box {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
        }
        input[type="submit"] {
            background: #3498db;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #2980b9;
        }
    </style>
</head>
<body>
    <div class="box">
        <h2>Grading System</h2>
        <form action="grade.php" method="post">
            <label for="name">Enter Your Name:</label>
            <input type="text" name="name" id="name" required>

            <label for="marks">Enter Marks (0-100):</label>
            <input type="number" name="marks" id="marks" min="0" max="100" required>

            <input type="submit" value="Check Grade">
        </form>
    </div>
    <div class="result-box">
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_POST['name']);
            $marks = $_POST['marks'];

            if ($marks >= 0 && $marks <= 100) {
                if ($marks >= 90) {
                    $grade = "A";
                } elseif ($marks >= 75) {
                    $grade = "B";
                } elseif ($marks >= 50) {
                    $grade = "C";
                } else {
                    $grade = "Fail";
                }

                echo "<p>Hello <strong>$name</strong>,</p>";
                echo "<p>You scored <strong>$marks</strong> marks.</p>";
                echo "<p class='grade'>Your grade is: <strong>$grade</strong></p>";
            } else {
                echo "<p>Please enter a valid mark between 0 and 100.</p>";
            }
        } else {
            echo "<p>Invalid Request</p>";
        }
        ?>
    </div>
</body>
</html>

