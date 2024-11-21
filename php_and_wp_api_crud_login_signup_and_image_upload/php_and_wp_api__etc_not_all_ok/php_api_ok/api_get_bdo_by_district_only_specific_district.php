<?php
/////////   url for this api only a spific district ------       http://localhost/php_api_ok/api_get_bdo_by_district_only_specific_district.php?district=kolkata

    /////////     url for this api all data  -------     http://localhost/php_api_ok/api_get_bdo_by_district_only_specific_district.php



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
$district = isset($_GET['district']) ? $conn->real_escape_string($_GET['district']) : null;

// Query to fetch BDO data grouped by district
if ($district) {
    // Fetch data for the specific district
    $sql = "SELECT id, district_name, bdo_name FROM bdo WHERE district_name = '$district'";
} else {
    // Fetch data for all districts
    $sql = "SELECT id, district_name, bdo_name FROM bdo";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $bdoData = [];

    while ($row = $result->fetch_assoc()) {
        $districtName = $row['district_name'] ? $row['district_name'] : 'Unknown';

        if (!isset($bdoData[$districtName])) {
            $bdoData[$districtName] = [];
        }

        $bdoData[$districtName][] = [
            "id" => $row['id'],
            "district_name" => $row['district_name'],
            "bdo_name" => $row['bdo_name']
        ];
    }

    // Return JSON response with the filtered or complete data
    echo json_encode([
        "status" => "success",
        "data" => $bdoData
    ]);
} else {
    // No records found
    echo json_encode([
        "status" => "error",
        "message" => "No BDOs found for the specified district.",
        "debug_district_name" => $district
    ]);
}

// Close the database connection
$conn->close();
?>
