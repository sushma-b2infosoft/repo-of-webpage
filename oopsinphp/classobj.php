<?php
// class User {
//     // Properties
//     public $name;
//     public $email;

//     // Constructor to set initial values
//     public function __construct($name, $email) {
//         $this->name = $name;
//         $this->email = $email;
//     }

//     // Method to get user details
//     public function getDetails() {
//         echo "Name: {$this->name}, Email: {$this->email}<br>";
//     }

//     // Method to update email
//     public function updateEmail($newEmail) {
//         $this->email = $newEmail;
//         echo "Email updated successfully to {$this->email}<br>";
//     }
// }

// // Create a user object
// $user1 = new User("Ravi Kumar", "ravi@example.com");

// // Get details
// $user1->getDetails();

// // Update email
// $user1->updateEmail("ravi.kumar@newmail.com");

// // Get updated details
// $user1->getDetails();
// Base Class
// class User {
//     protected $name;
//     protected $email;

//     // Constructor
//     public function __construct($name, $email) {
//         $this->name = $name;
//         $this->email = $email;
//     }

//     // Get details
//     public function getDetails() {
//         return "Name: {$this->name}, Email: {$this->email}";
//     }

//     // Update email
//     public function updateEmail($newEmail) {
//         $this->email = $newEmail;
//         echo "Email updated to: {$this->email}<br>";
//     }
// }

// // Child Class (AdminUser)
// class AdminUser extends User {
//     private $role = "Admin";

//     // Override getDetails to include role
//     public function getDetails() {
//         return parent::getDetails() . ", Role: {$this->role}";
//     }

//     // Extra method only for Admin
//     public function deleteUser($username) {
//         echo "User '{$username}' has been deleted by {$this->name}.<br>";
//     }
// }

// // --- Testing ---

// // Create normal user
// $user = new User("Ravi", "ravi@example.com");
// echo $user->getDetails() . "<br>";
// $user->updateEmail("newravi@example.com");
// echo $user->getDetails() . "<br><br>";

// // Create admin user
// $admin = new AdminUser("Anita", "anita@example.com");
// echo $admin->getDetails() . "<br>";
// $admin->updateEmail("admin.anita@example.com");
// echo $admin->getDetails() . "<br>";
// $admin->deleteUser("Ravi");



//++++++++++++++++++++++++++++++++++++++++++++++++++

//CLASS CRETAE KARNA 

class fruits{
    public $banana;
    public function apple() {
        echo "the $this->banana fruits is apple";
    }
}
$fruitobj = new fruits();
$fruitobj->banana="yellow";
$fruitobj->apple() ;

?>
