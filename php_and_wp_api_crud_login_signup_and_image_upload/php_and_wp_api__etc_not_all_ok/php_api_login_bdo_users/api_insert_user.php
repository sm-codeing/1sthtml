<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set Content-Type header to return JSON
header('Content-Type: application/json');

// Database connection details
$servername = "localhost";
$username = "root";
$password = ""; // Replace with your MySQL password
$dbname = "bdo_users";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for a connection error
if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]);
    exit;
}

// Retrieve JSON data from the request body
$data = json_decode(file_get_contents("php://input"), true);

// Check if username, email, and password are provided
if (isset($data['username']) && isset($data['email']) && isset($data['password'])) {
    $username = $data['username'];
    $email = $data['email'];
    $password = password_hash($data['password'], PASSWORD_BCRYPT);  // Encrypt the password

    // Prepare SQL statement to insert data
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);

    // Execute the statement and respond accordingly
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'User created successfully!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to add user: ' . $stmt->error]);
    }

    // Close the statement
    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'username, email, and password are required']);
}

// Close the connection
$conn->close();
?>
