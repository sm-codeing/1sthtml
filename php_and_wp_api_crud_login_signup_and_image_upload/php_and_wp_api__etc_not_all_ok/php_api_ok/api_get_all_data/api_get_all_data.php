<?php

////// url for api  ----  http://localhost/php_api_ok/api_get_all_data/api_get_all_data.php

    
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

// Array to hold all data from each table
$all_data = [];

// List of tables in the school_dtl database
$tables = ['district', 'school', 'bdo']; // Add any other tables as needed

foreach ($tables as $table) {
    $sql = "SELECT * FROM $table";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $table_data = [];
        while ($row = $result->fetch_assoc()) {
            $table_data[] = $row;
        }
        $all_data[$table] = $table_data;
    } else {
        $all_data[$table] = [];
    }
}

// Return the collected data as a JSON response
echo json_encode([
    "status" => "success",
    "data" => $all_data
]);

// Close the connection
$conn->close();
?>
