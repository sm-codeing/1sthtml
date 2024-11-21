<?php
// Database connection details
$servername = "localhost";
$username = "root";  // Your MySQL username
$password = "";      // Your MySQL password
$dbname = "all_in_one_bdo_api";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the input data from the request
$data = json_decode(file_get_contents("php://input"));

if (isset($data->district_name)) {
    $district_name = $conn->real_escape_string($data->district_name);

    // Prepare the SQL query
    $sql = "INSERT INTO district (district_name) VALUES ('$district_name')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        $response = array(
            'status' => 'success',
            'message' => 'District name inserted successfully.'
        );
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Error: ' . $sql . '<br>' . $conn->error
        );
    }
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Invalid input. Please provide district_name.'
    );
}

// Close connection
$conn->close();

// Return response in JSON format
header('Content-Type: application/json');
echo json_encode($response);
?>
