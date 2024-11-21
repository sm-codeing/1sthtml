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

// Handle POST request to insert a new BDO
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    // Check if bdo_name and dst_id are present in the payload
    if (isset($data['bdo_name']) && isset($data['dst_id'])) {
        $bdo_name = $data['bdo_name'];
        $dst_id = $data['dst_id'];

        // Insert data into the bdo table
        $sql = "INSERT INTO bdo (bdo_name, dst_id) VALUES ('$bdo_name', '$dst_id')";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(["status" => "success", "message" => "New BDO added successfully!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error: " . $sql . " - " . $conn->error]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "bdo_name and dst_id are required"]);
    }
}

// Close connection
$conn->close();
?>
