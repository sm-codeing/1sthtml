<?php
header('Content-Type: application/json');

// Database connection details
$servername = "localhost";
$username = "root";  // Your MySQL username
$password = "";      // Your MySQL password
$dbname = "school_dtl";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
}

// Handle POST request to insert a new school
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    // Check if school_name and dst_id are present in the payload
    if (isset($data['school_name']) && isset($data['dst_id'])) {
        $school_name = $data['school_name'];
        $dst_id = $data['dst_id'];

        // Insert data into the school table
        $sql = "INSERT INTO school (school_name, dst_id) VALUES ('$school_name', $dst_id)";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(["status" => "success", "message" => "New school added successfully!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error: " . $sql . " - " . $conn->error]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "school_name and dst_id are required"]);
    }
}

// Close connection
$conn->close();
?>
