<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set Content-Type header to return JSON
header('Content-Type: application/json');

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "all_in_one_bdo_api";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for a connection error
if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]);
    exit;
}

// Retrieve JSON data from the request body
$data = json_decode(file_get_contents("php://input"), true);

// Check if district_name is provided in the request
if (isset($data['district_name'])) {
    $district_name = $data['district_name'];

    // Generate a unique dst_id
    $result = $conn->query("SELECT MAX(id) AS max_id FROM district");
    $row = $result->fetch_assoc();
    $next_id = $row ? $row['max_id'] + 1 : 1;
    $dst_id = "dst_code_" . $next_id;

    // Prepare SQL statement to insert data
    $stmt = $conn->prepare("INSERT INTO district (dst_id, district_name) VALUES (?, ?)");
    $stmt->bind_param("ss", $dst_id, $district_name);

    // Execute the statement and respond accordingly
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'New district added successfully!', 'id' => $stmt->insert_id, 'dst_id' => $dst_id]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to add district: ' . $stmt->error]);
    }

    // Close the statement
    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'district_name is required']);
}

// Close the connection
$conn->close();
?>
