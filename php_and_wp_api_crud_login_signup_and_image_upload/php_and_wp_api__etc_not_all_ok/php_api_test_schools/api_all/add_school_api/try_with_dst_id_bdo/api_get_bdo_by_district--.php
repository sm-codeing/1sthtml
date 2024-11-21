<?php

// //// below is for showing all data -------------------------------

// header("Content-Type: application/json");

// // Database connection details
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "school_dtl";

// // Create a new database connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check if the connection was successful
// if ($conn->connect_error) {
//     die(json_encode([
//         "status" => "error",
//         "message" => "Connection failed: " . $conn->connect_error
//     ]));
// }

// // SQL query to fetch all records from the bdo table
// $sql = "SELECT id, bdo_name, dst_id, district_name FROM bdo";
// $result = $conn->query($sql);

// // Check if any results were returned from the query
// if ($result->num_rows > 0) {
//     $bdo_list = [];

//     // Fetch each row as an associative array
//     while ($row = $result->fetch_assoc()) {
//         $bdo_list[] = $row;
//     }

//     // Return the list of BDOs as a JSON response
//     echo json_encode([
//         "status" => "success",
//         "data" => $bdo_list
//     ]);
// } else {
//     // No records found
//     echo json_encode([
//         "status" => "error",
//         "message" => "No BDOs found."
//     ]);
// }

// Close the database connection
// $conn->close();


?>






<?php

//// display as per district name
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





 <?php


// header("Content-Type: application/json");

// // Database connection details
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "school_dtl";

// // Create a new database connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check if the connection was successful
// if ($conn->connect_error) {
//     die(json_encode([
//         "status" => "error",
//         "message" => "Connection failed: " . $conn->connect_error
//     ]));
// }

// // Check if the 'district_name' parameter is provided in the request
// if (isset($_GET['district_name'])) {
//     // Trim the input to remove any extra whitespace and replace multiple spaces with a single space
//     $district_name = preg_replace('/\s+/', ' ', trim($conn->real_escape_string($_GET['district_name'])));

//     // SQL query to fetch BDOs based on the provided 'district_name' (exact match)
//     $sql = "SELECT id, bdo_name, dst_id, district_name FROM bdo WHERE LOWER(district_name) = LOWER('$district_name')";
//     $result = $conn->query($sql);

//     // Check if any results were returned from the query
//     if ($result->num_rows > 0) {
//         $bdo_list = [];

//         // Fetch each row as an associative array
//         while ($row = $result->fetch_assoc()) {
//             $bdo_list[] = $row;
//         }

//         // Return the list of BDOs as a JSON response
//         echo json_encode([
//             "status" => "success",
//             "data" => $bdo_list
//         ]);
//     } else {
//         // No records found for the given district
//         echo json_encode([
//             "status" => "error",
//             "message" => "No BDOs found for the specified district.",
//             "debug_district_name" => $district_name // For debugging purposes
//         ]);
//     }
// } else {
//     // Return an error if 'district_name' parameter is not provided
//     echo json_encode([
//         "status" => "error",
//         "message" => "Missing 'district_name' parameter."
//     ]);
// }

// // Close the database connection
// $conn->close();


?>





