<?php
// Database configuration
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'mortel';

// Create database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die(json_encode([
        "message" => "Database connection failed: " . $conn->connect_error,
        "statusCode" => 400
    ]));
}
?>
