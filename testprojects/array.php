


//Indexed Array
<?php
$colors = array("Red", "Green", "Blue");
echo $colors[1];  // Output: Green

// Using foreach
foreach($colors as $color){
    echo $color . "<br>";
}
//Associative Array
$ages = array("Ravi"=>25, "Sneha"=>22);
echo $ages["Sneha"];  // Output: 22

// Using foreach
foreach($ages as $name => $age){
    echo "$name is $age years old.<br>";
}
//Multidimensional Array
$students = array(
  "Ravi" => array("Math"=>80, "English"=>70),
  "Sneha" => array("Math"=>90, "English"=>88)
);

echo "<h2>PHP Array Functions Examples</h2>";

// Sample array
$fruits = ["Apple", "Banana", "Mango", "Orange", "Grapes"];

// 1. count()
echo "1. Total fruits: " . count($fruits) . "<br><br>";

// 2. array_push() — Add items to end
array_push($fruits, "Pineapple");
print_r($fruits);
echo "<br><br>";

// 3. array_pop() — Remove last item
array_pop($fruits);
print_r($fruits);
echo "<br><br>";

// 4. array_unshift() — Add item to beginning
array_unshift($fruits, "Strawberry");
print_r($fruits);
echo "<br><br>";

// 5. array_shift() — Remove item from beginning
array_shift($fruits);
print_r($fruits);
echo "<br><br>";

// 6. in_array() — Check if value exists
if (in_array("Mango", $fruits)) {
    echo "6. Mango is in the list<br><br>";
}

// 7. array_search() — Get key/index of value
$index = array_search("Banana", $fruits);
echo "7. Banana is at index: $index<br><br>";

// 8. sort() — Sort ascending
sort($fruits);
echo "8. Sorted (A-Z): ";
print_r($fruits);
echo "<br><br>";

// 9. rsort() — Sort descending
rsort($fruits);
echo "9. Sorted (Z-A): ";
print_r($fruits);
echo "<br><br>";

// 10. array_merge()
$veg = ["Potato", "Tomato"];
$allItems = array_merge($fruits, $veg);
echo "10. Merged Array: ";
print_r($allItems);
echo "<br><br>";

// 11. array_slice()
$sliced = array_slice($allItems, 2, 3);
echo "11. Sliced (from index 2, 3 items): ";
print_r($sliced);
echo "<br><br>";

// 12. array_unique()
$dupArr = ["A", "B", "A", "C", "B"];
$unique = array_unique($dupArr);
echo "12. Unique values: ";
print_r($unique);
echo "<br><br>";

// 13. array_reverse()
$reversed = array_reverse($fruits);
echo "13. Reversed fruits: ";
print_r($reversed);
echo "<br><br>";

// 14. array_keys()
$keys = array_keys($fruits);
echo "14. Keys of fruit array: ";
print_r($keys);
echo "<br><br>";

// 15. array_values()
$values = array_values($fruits);
echo "15. Values of fruit array: ";
print_r($values);
echo "<br><br>";

// 16. implode() — Convert array to string
$str = implode(", ", $fruits);
echo "16. Imploded string: $str<br><br>";

// 17. explode() — Convert string to array
$newArr = explode(", ", $str);
echo "17. Exploded array: ";
print_r($newArr);
echo "<br><br>";

// 18. array_map() — Apply function to each item
$upperFruits = array_map("strtoupper", $fruits);
echo "18. Fruits in uppercase: ";
print_r($upperFruits);
echo "<br><br>";

// 19. array_filter() — Filter based on condition
$longFruits = array_filter($fruits, function($fruit) {
    return strlen($fruit) > 5;
});
echo "19. Fruits with name > 5 characters: ";
print_r($longFruits);
echo "<br><br>";

// 20. array_reduce() — Reduce to single value
$numbers = [1, 2, 3, 4, 5];
$sum = array_reduce($numbers, function($carry, $item) {
    return $carry + $item;
});
echo "20. Sum of numbers: $sum<br><br>";
// 11. array_merge() - Merges two arrays
$veggies = ["Carrot", "Potato"];
$merged = array_merge($fruits, $veggies);
echo "Merged array: ";
print_r($merged);
echo "<br>";

?>
