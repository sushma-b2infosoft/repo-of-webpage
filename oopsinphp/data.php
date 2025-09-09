<?php
// 1. Define the interface (contract)
interface DatabaseInterface {
    public function connect($host, $user, $password, $dbname);
    public function query($sql);
    public function disconnect();
}

// 2. Implement the interface in MySQLDatabase
class MySQLDatabase implements DatabaseInterface {
    private $connection;

    // Connect to database
    public function connect($host, $user, $password, $dbname) {
        $this->connection = mysqli_connect($host, $user, $password, $dbname);
        
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        echo "Connected to MySQL database successfully.<br>";
    }

    // Run SQL query
    public function query($sql) {
        if (!$this->connection) {
            die("No database connection.");
        }
        $result = mysqli_query($this->connection, $sql);
        if ($result) {
            echo "Query executed successfully.<br>";
            return $result;
        } else {
            echo "Error: " . mysqli_error($this->connection) . "<br>";
            return false;
        }
    }

    // Disconnect from database
    public function disconnect() {
        if ($this->connection) {
            mysqli_close($this->connection);
            echo "Disconnected from MySQL database.<br>";
        }
    }
}

// 3. Test the implementation
$db = new MySQLDatabase();
$db->connect("localhost", "root", "", "test_db"); // Change credentials
$db->query("SELECT * FROM users"); // Example query
$db->disconnect();
?>
