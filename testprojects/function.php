<?php
//User-Defined Function
/* hello() {
    echo "HOW ARE U ALL";
}
hello();*/
//Function Parameters (with Default Values)
/*function hello($name="hii") {
    echo "How was your day today,$name<br>";
}
hello("Reenu");*/
//3. Return Values from Function
/*function add($a, $b) {
    return $a + $b;
}
$sum=add(35,45);
echo"total:$sum<br>";*/
/*function testLocal() {
    $msg = "I'm local!";
    echo $msg;
}
testLocal(); // OK
// echo $msg; ❌ Error: Undefined outside
$name = "Ravi";

function showName() {
    // echo $name; ❌ won't work directly
}

showName();
$x = 5;
$y = 10;

function multiply() {
    global $x, $y;
    echo $x * $y;  // 50
}

multiply();

function countCalls() {
    static $count = 0;
    $count++;
    echo "Called $count times<br>";
}

countCalls();
countCalls();
countCalls();*/

// Global variables to store class average
$totalClassPercentage = 0;
$totalStudents = 0;

// Function to calculate total marks
function calculateTotal($math, $science, $english) {
    return $math + $science + $english;
}

// Function to calculate percentage (default totalMarks is 300)
function calculatePercentage($totalMarks, $fullMarks = 300) {
    return ($totalMarks / $fullMarks) * 100;
}

// Function to assign grade based on percentage
function assignGrade($percentage) {
    if ($percentage >= 90) return "A+";
    elseif ($percentage >= 75) return "A";
    elseif ($percentage >= 60) return "B";
    elseif ($percentage >= 40) return "C";
    else return "F";
}

// Function to process a student
function processStudent($name, $math, $science, $english) {
    global $totalClassPercentage, $totalStudents;

    $total = calculateTotal($math, $science, $english);
    $percent = calculatePercentage($total);
    $grade = assignGrade($percent);

    // Update global class data
    $totalClassPercentage += $percent;
    $totalStudents++;

    // Use static variable to count individual function calls
    static $studentCount = 0;
    $studentCount++;

    echo "<hr>";
    echo "Student #$studentCount: $name<br>";
    echo "Total Marks: $total<br>";
    echo "Percentage: " . round($percent, 2) . "%<br>";
    echo "Grade: $grade<br>";
}

// Calling the function with student data
processStudent("Ravi", 85, 78, 92);
processStudent("Sneha", 65, 70, 72);
processStudent("Amit", 45, 35, 60);

// Show class average
echo "<hr>";
echo "<h3>Class Summary</h3>";
if ($totalStudents > 0) {
    $avg = $totalClassPercentage / $totalStudents;
    echo "Total Students: $totalStudents<br>";
    echo "Average Class Percentage: " . round($avg, 2) . "%<br>";
}



    
?>