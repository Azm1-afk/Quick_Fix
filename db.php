<?php
$servername = "localhost"; // Or your server's address
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "quickfix"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set character set to utf8mb4 (recommended)
$conn->set_charset("utf8mb4");

// You can add other configurations here if needed

// Example: Function to execute a query (optional, for convenience)
function executeQuery($conn, $sql) {
    $result = $conn->query($sql);
    if (!$result) {
        error_log("MySQL query error: " . $conn->error . " (Query: " . $sql . ")"); // Log the error
        return false; // Or handle the error as needed
    }
    return $result;
}

// Example function to escape strings (for security)
function escapeString($conn, $string) {
    return $conn->real_escape_string($string);
}

// Example function to close the connection (optional, for later use)
function closeConnection($conn){
    $conn->close();
}

// The $conn variable is now available for use in other PHP files that include this one.

?>
