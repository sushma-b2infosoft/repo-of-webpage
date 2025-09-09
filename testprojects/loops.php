<?php

echo "<h2>1. while Loop</h2>";
$i = 1;
while ($i <= 3) {
    echo "while loop: $i <br>";
    $i++;
}

echo "<h2>2. do...while Loop</h2>";
$j = 1;
do {
    echo "do...while loop: $j <br>";
    $j++;
} while ($j <= 3);

echo "<h2>3. for Loop</h2>";
for ($k = 1; $k <= 3; $k++) {
    echo "for loop: $k <br>";
}

echo "<h2>4. foreach Loop - Indexed Array</h2>";
$colors = ["Red", "Green", "Blue"];
foreach ($colors as $color) {
    echo "Color: $color <br>";
}

echo "<h2>5. foreach Loop - Associative Array</h2>";
$students = [
    "Ravi" => 85,
    "Neha" => 92,
    "Amit" => 76
];
foreach ($students as $name => $marks) {
    echo "$name scored $marks marks. <br>";
}

echo "<h2>6. for Loop with break and continue</h2>";
for ($x = 1; $x <= 5; $x++) {
    if ($x == 3) {
        echo "Skipping 3 using continue<br>";
        continue;
    }
    if ($x == 5) {
        echo "Breaking at 5<br>";
        break;
    }
    echo "Loop value: $x <br>";
}
?>
