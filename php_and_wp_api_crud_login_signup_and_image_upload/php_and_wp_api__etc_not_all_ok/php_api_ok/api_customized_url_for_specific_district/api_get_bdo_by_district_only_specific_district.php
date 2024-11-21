<?php
/// customized api url   -------   http://localhost/php_api_ok/api_customized_url_for_specific_district/districtt/24pgs


header('Content-Type: application/json');

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
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

// Get the district parameter from the URL
$district_name = isset($_GET['districtt']) ? $conn->real_escape_string($_GET['districtt']) : '';

// Check if the district parameter is provided
if (empty($district_name)) {
    echo json_encode([
        "status" => "error",
        "message" => "Missing 'district' parameter."
    ]);
    exit;
}

// Fetch BDO data for the specified district
$sql = "SELECT id, bdo_name, district_name FROM bdo WHERE district_name = '$district_name'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $bdo_data = [];
    while ($row = $result->fetch_assoc()) {
        $bdo_data[] = $row;
    }
    echo json_encode([
        "status" => "success",
        "data" => $bdo_data
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "No BDOs found for the specified district.",
        "debug_district_name" => $district_name
    ]);
}

// Close the connection
$conn->close();
?>
