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

// Fetch all districts with dst_id
$sql = "SELECT id, district_name, bdo_name, dst_id FROM bdo";  // Ensure dst_id is included in the query
$result = $conn->query($sql);

$districts = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $districts[] = $row;
    }
}

echo json_encode($districts);

// Close connection
$conn->close();
?>
