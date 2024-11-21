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




/////////--------------------------------




    //////----------------------- Check if district_name already exists -------------------//////
    
    $checkStmt = $conn->prepare("SELECT COUNT(*) FROM district WHERE district_name = ?");
    $checkStmt->bind_param("s", $district_name);
    $checkStmt->execute();
    $checkStmt->bind_result($count);
    $checkStmt->fetch();
    $checkStmt->close();

    // If the district name already exists, return an error message
    if ($count > 0) {
        echo json_encode(['status' => 'error', 'message' => 'District already exists']);
        exit;
    }




/////////--------------------------------




    // Prepare SQL statement to insert data
    $stmt = $conn->prepare("INSERT INTO district (district_name) VALUES (?)");
    $stmt->bind_param("s", $district_name);

    // Execute the statement and respond accordingly
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'New district added successfully!', 'id' => $stmt->insert_id]);
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