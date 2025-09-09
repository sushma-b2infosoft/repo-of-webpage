<?php
include "database.php";

if(isset($_POST['keyword'])){
    $keyword = $conn->real_escape_string($_POST['keyword']);

    // Example: Searching across multiple tables (users, products, tasks)
    $query = "
      SELECT name AS item, 'User' AS type FROM users WHERE name LIKE '%$keyword%'
      UNION
      SELECT product_name AS item, 'Product' AS type FROM products WHERE product_name LIKE '%$keyword%'
      UNION
      SELECT task_name AS item, 'Task' AS type FROM tasks WHERE task_name LIKE '%$keyword%'
      LIMIT 10
    ";

    $result = $conn->query($query);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            // Highlight matching keyword
            $highlight = preg_replace("/($keyword)/i", "<span class='highlight'>$1</span>", $row['item']);
            echo "<p><strong>{$row['type']}:</strong> $highlight</p>";
        }
    } else {
        echo "<p>No results found...</p>";
    }
}
?>
