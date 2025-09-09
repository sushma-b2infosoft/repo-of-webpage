<?php
$host = "localhost";         // MySQL server (usually localhost)
$dbname = "auth_system";     // Your database name
$username = "root";          // MySQL username (default in XAMPP is root)
$password = "";              // MySQL password (empty in XAMPP by default)




// === Sessions ===
// Set secure session cookie params (tune for production/HTTPS)
$lifetime = 0; // session cookie (expires on browser close)
$path     = '/';
$domain   = ''; // set your domain in production, e.g. '.example.com'
$secure   = false; // true on HTTPS
$httponly = true;
$samesite = 'Lax';

session_set_cookie_params([
  'lifetime' => $lifetime,
  'path'     => $path,
  'domain'   => $domain,
  'secure'   => $secure,
  'httponly' => $httponly,
  'samesite' => $samesite
]);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// App-wide config
define('REMEMBER_COOKIE_NAME', 'remember_me');
define('REMEMBER_COOKIE_DAYS', 30);
define('SESSION_TIMEOUT', 1800); // 30 minutes inactivity
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}