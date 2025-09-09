<?php
// Enable full error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define the custom error handler
function customErrorHandler($errno, $errstr, $errfile, $errline) {
    echo "<div style='color: red;'>
            <strong>Error [$errno]</strong>: $errstr<br>
            <em>In $errfile on line $errline</em>
          </div>";
}

// Set the custom error handler
set_error_handler("customErrorHandler");

// Trigger an error (for testing)
echo $undefinedVariable;


function errorToException($errno, $errstr, $errfile, $errline) {
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
}

set_error_handler("errorToException");

try {
    echo $x; // Undefined variable
} catch (Exception $e) {
    echo "Caught Exception: " . $e->getMessage();
}


function customErrorLogger($errno, $errstr, $errfile, $errline) {
    $message = "[$errno] $errstr in $errfile on line $errline" . PHP_EOL;
    
    // Save to custom log file
    error_log($message, 3, "my_errors.log");
    
    // Also show on screen (optional)
    echo "<pre>$message</pre>";
}

set_error_handler("customErrorLogger");

?>
