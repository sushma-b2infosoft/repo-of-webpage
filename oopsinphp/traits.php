<?php
// 1. Define a trait
trait Logger {
    public function log($message) {
        echo "[LOG]: $message <br>";
    }
}

// 2. First class using the trait
class User {
    use Logger;

    public function createUser($name) {
        $this->log("Creating user: $name");
        echo "User '$name' created successfully.<br>";
    }
}

// 3. Second class using the same trait
class Product {
    use Logger;

    public function addProduct($productName) {
        $this->log("Adding product: $productName");
        echo "Product '$productName' added successfully.<br>";
    }
}

// 4. Third class (unrelated) also using the same trait
class Order {
    use Logger;

    public function placeOrder($orderId) {
        $this->log("Placing order ID: $orderId");
        echo "Order #$orderId placed successfully.<br>";
    }
}

// 5. Test the code
$user = new User();
$user->createUser("John Doe");

$product = new Product();
$product->addProduct("Laptop");

$order = new Order();
$order->placeOrder(101);
?>

