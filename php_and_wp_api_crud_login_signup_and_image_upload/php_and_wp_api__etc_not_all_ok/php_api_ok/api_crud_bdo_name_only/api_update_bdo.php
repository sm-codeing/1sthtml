<?php
// Database configuration
$servername = "localhost";
$username = "root"; // Update with your database username if different
$password = ""; // Update with your database password if different
$dbname = "school_dtl";

// Set headers to handle CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// Handle the preflight request (OPTIONS request for CORS)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// Check if the request method is PUT
if ($_SERVER['REQUEST_METHOD'] !== 'PUT') {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid request method. Only PUT is allowed."
    ]);
    http_response_code(405); // Method Not Allowed
    exit;
}

// Get the input data
$input = json_decode(file_get_contents("php://input"), true);
if (!isset($input['id']) || !isset($input['bdo_name'])) {
    echo json_encode([
        "status" => "error",
        "message" => "Missing required fields: id or bdo_name."
    ]);
    http_response_code(400); // Bad Request
    exit;
}

$id = $input['id'];
$bdo_name = $input['bdo_name'];

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    echo json_encode([
        "status" => "error",
        "message" => "Database connection failed: " . $conn->connect_error
    ]);
    http_response_code(500); // Internal Server Error
    exit;
}

// Prepare and execute the update query
$sql = "UPDATE bdo SET bdo_name = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $bdo_name, $id);

if ($stmt->execute()) {
    echo json_encode([
        "status" => "success",
        "message" => "BDO record updated successfully."
    ]);
    http_response_code(200); // OK
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Failed to update BDO record."
    ]);
    http_response_code(500); // Internal Server Error
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>