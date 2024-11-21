<?php
header('Content-Type: application/json');

// Database connection details ------
$servername = "localhost";
$username = "root";   // Your MySQL username
$password = "";       // Your MySQL password
$dbname = "all_in_one_bdo_api";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
}

// Get the JSON payload
$data = json_decode(file_get_contents("php://input"), true);

// Check if district_name is present in the payload
if (isset($data['district_name'])) {
    $district_name = $data['district_name'];

    // Insert data into the district table
    $sql = "INSERT INTO district (district_name) VALUES ('$district_name')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "New district added successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $sql . " - " . $conn->error]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "district_name is required"]);
}

// Close connection
$conn->close();
?>
