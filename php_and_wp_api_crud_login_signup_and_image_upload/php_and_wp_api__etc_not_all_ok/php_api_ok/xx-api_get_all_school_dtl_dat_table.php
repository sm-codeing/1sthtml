<?php

//// below is for showing all data -------------------------------

header("Content-Type: application/json");

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_dtl";

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
$sql = "SELECT id, bdo_name, dst_id, district_name FROM bdo";
$result = $conn->query($sql);

// Check if any results were returned from the query
if ($result->num_rows > 0) {
    $bdo_list = [];

    // Fetch each row as an associative array
    while ($row = $result->fetch_assoc()) {
        $bdo_list[] = $row;
    }

    // Return the list of BDOs as a JSON response
    echo json_encode([
        "status" => "success",
        "data" => $bdo_list
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



 



