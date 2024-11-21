<?php


//  ///// no special word requred like ----   category   ----
////    url type to get a specific id data  // http://localhost/php_api_ok/api_get_data_of_specific_id.php?bdo=6 


header('Content-Type: application/json');

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_dtl"; // Update with your actual database name
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]));
}

// Check for table name and ID in the query parameters
$tableName = null;
$id = null;

foreach ($_GET as $key => $value) {
    $tableName = $key;
    $id = $value;
    break;
}

// Validate parameters
if ($tableName && $id) {
    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT * FROM $tableName WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        if ($data) {
            echo json_encode(['status' => 'success', 'data' => $data]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No data found for the specified ID']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to execute query']);
    }

    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Please provide a valid table name and ID']);
}

$conn->close();
?>
