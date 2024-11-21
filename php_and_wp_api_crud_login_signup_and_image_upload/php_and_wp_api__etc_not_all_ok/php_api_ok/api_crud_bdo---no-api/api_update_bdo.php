<?php
header("Content-Type: application/json");

$servername = "localhost";
$username = "root"; // Update with your database username
$password = ""; // Update with your database password
$dbname = "school_dtl";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode([
        "status" => "error",
        "message" => "Connection failed: " . $conn->connect_error
    ]));
}

// Get the raw input data
$inputData = json_decode(file_get_contents("php://input"), true);

// Validate the input
if (isset($inputData['id']) && isset($inputData['bdo_name']) && isset($inputData['dst_id'])) {
    $id = $conn->real_escape_string($inputData['id']);
    $bdoName = $conn->real_escape_string($inputData['bdo_name']);
    $dstId = $conn->real_escape_string($inputData['dst_id']);

    // Update the BDO record in the database
    $sql = "UPDATE bdo SET bdo_name = '$bdoName', dst_id = '$dstId' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo json_encode([
            "status" => "success",
            "message" => "BDO record updated successfully."
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Error updating record: " . $conn->error
        ]);
    }
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid input. Please provide 'id', 'bdo_name', and 'dst_id'."
    ]);
}

// Close connection
$conn->close();
?>
