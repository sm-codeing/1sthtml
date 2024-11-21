 



<?php

//// display as per district name
header("Content-Type: application/json");

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "all_in_one_bdo_api";

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die(json_encode([
        "status" => "error",
        "message" => "Connection failed: " . $conn->connect_error
    ]));
}

// SQL query to fetch all records from the bdo table
$sql = "SELECT id, district_name, bdo_name, dst_id FROM bdo";
$result = $conn->query($sql);

// Check if any results were returned from the query
if ($result->num_rows > 0) {
    $grouped_data = [];

    // Fetch each row as an associative array
    while ($row = $result->fetch_assoc()) {
        // Get the district name
        $district_name = $row['district_name'] ?? 'Unknown';

        // Group data by district name
        if (!isset($grouped_data[$district_name])) {
            $grouped_data[$district_name] = [];
        }

        // Add the current record to the district group
        $grouped_data[$district_name][] = [
            "id" => $row['id'],
            "district_name" => $row['district_name'],
            "bdo_name" => $row['bdo_name']
        ];
    }

    // Return the grouped data as a JSON response
    echo json_encode([
        "status" => "success",
        "data" => $grouped_data
    ]);
} else {
    // No records found
    echo json_encode([
        "status" => "error",
        "message" => "No BDOs found."
    ]);
}

// Close the database connection
$conn->close();
?>




 


