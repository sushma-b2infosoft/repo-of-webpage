<!DOCTYPE html>
<html>
<head>
<title>Student Data</title>
    <style>
        table {
            width: 60%;
            margin: 50px auto;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid #444;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #008cba;
            color: white;
        }
    </style>
</head>
<body>
<?php
// Sample student data array
$students = [
    ["id" => 1, "name" => "Ravi Kumar", "age" => 20, "grade" => "A"],
    ["id" => 2, "name" => "Anita Sharma", "age" => 22, "grade" => "B"],
    ["id" => 3, "name" => "Pooja Mehta", "age" => 21, "grade" => "A+"],
    ["id" => 4, "name" => "Amit Verma", "age" => 23, "grade" => "B+"]
];
?>

<h2 style="text-align:center;">Student Information</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Grade</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($students as $student): ?>
        <tr>
            <td><?= $student['id'] ?></td>
            <td><?= $student['name'] ?></td>
            <td><?= $student['age'] ?></td>
            <td><?= $student['grade'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>