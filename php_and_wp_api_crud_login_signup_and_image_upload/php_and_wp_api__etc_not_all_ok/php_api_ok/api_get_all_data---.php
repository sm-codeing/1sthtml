


 

 <?php
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

// Function to fetch data from a specific table
function fetchData($conn, $table) {
    $sql = "SELECT * FROM " . $conn->real_escape_string($table);
    $result = $conn->query($sql);

    $data = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}

// Function to fetch data by specific ID from relevant tables
function fetchById($conn, $id) {
    $data = [];

    // Fetch from each table if the ID matches
    $tables = ['district', 'school', 'bdo'];
    foreach ($tables as $table) {
        $sql = "SELECT * FROM " . $conn->real_escape_string($table) . " WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[$table][] = $row; // Group results by table name
            }
        }
        $stmt->close();
    }

    return $data;
}

// Check query parameters
$response = ["status" => "success", "data" => []];

if (isset($_GET['district'])) {
    // Fetch only district data
    $response['data']['district'] = fetchData($conn, 'district');
} elseif (isset($_GET['school'])) {
    // Fetch only school data
    $response['data']['school'] = fetchData($conn, 'school');
} elseif (isset($_GET['bdo'])) {
    // Fetch only BDO data
    $response['data']['bdo'] = fetchData($conn, 'bdo');
} elseif (isset($_GET['id'])) {
    // Fetch data for a specific ID in the format id:<id>
    $idParam = $_GET['id'];

    if (strpos($idParam, 'id:') === 0) { // Check for 'id:'
        $id = intval(substr($idParam, 3)); // Extract ID from 'id:<id>'
        $data = fetchById($conn, $id);
        if (!empty($data)) {
            $response['data'] = $data;
        } else {
            $response = [
                "status" => "error",
                "message" => "No data found for ID $id."
            ];
        }
    } else {
        $response = [
            "status" => "error",
            "message" => "Invalid ID format. Use 'id:<id>'."
        ];
    }
} else {
    // Fetch all data for all categories
    $response['data']['district'] = fetchData($conn, 'district');
    $response['data']['school'] = fetchData($conn, 'school');
    $response['data']['bdo'] = fetchData($conn, 'bdo'); // Add more categories as needed
}

// Return the JSON response
echo json_encode($response);

// Close the connection
$conn->close();
?>



<?php


////// working with ditrict, school, bdo

// header('Content-Type: application/json');

// // Database connection details
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "school_dtl";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die(json_encode([
//         "status" => "error",
//         "message" => "Connection failed: " . $conn->connect_error
//     ]));
// }

// // Function to fetch data from a specific table
// function fetchData($conn, $table) {
//     $sql = "SELECT * FROM " . $conn->real_escape_string($table);
//     $result = $conn->query($sql);

//     $data = [];
//     if ($result && $result->num_rows > 0) {
//         while ($row = $result->fetch_assoc()) {
//             $data[] = $row;
//         }
//     }
//     return $data;
// }

// // Function to fetch data by specific ID from relevant tables
// function fetchById($conn, $id) {
//     $sql = "SELECT * FROM district WHERE id = $id
//             UNION ALL
//             SELECT * FROM school WHERE id = $id
//             UNION ALL
//             SELECT * FROM bdo WHERE id = $id";
//     $result = $conn->query($sql);

//     $data = [];
//     if ($result && $result->num_rows > 0) {
//         while ($row = $result->fetch_assoc()) {
//             $data[] = $row;
//         }
//     }
//     return $data;
// }

// // Check query parameters
// $response = ["status" => "success", "data" => []];

// if (isset($_GET['district'])) {
//     // Fetch only district data
//     $response['data']['district'] = fetchData($conn, 'district');
// } elseif (isset($_GET['school'])) {
//     // Fetch only school data
//     $response['data']['school'] = fetchData($conn, 'school');
// } elseif (isset($_GET['bdo'])) {
//     // Fetch only BDO data
//     $response['data']['bdo'] = fetchData($conn, 'bdo');
// } elseif (isset($_GET['id'])) {
//     // Fetch data for a specific ID
//     $id = intval(substr($_GET['id'], 3)); // Extract ID from 'id:<id>'
//     $data = fetchById($conn, $id);
//     if ($data) {
//         $response['data'] = $data;
//     } else {
//         $response = [
//             "status" => "error",
//             "message" => "No data found for ID $id."
//         ];
//     }
// } else {
//     // Fetch all data for all categories
//     $response['data']['district'] = fetchData($conn, 'district');
//     $response['data']['school'] = fetchData($conn, 'school');
//     $response['data']['bdo'] = fetchData($conn, 'bdo'); // Add more categories as needed
// }

// // Return the JSON response
// echo json_encode($response);

// // Close the connection
// $conn->close();




?>








<?php



// header('Content-Type: application/json');

// // Database connection details
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "school_dtl";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die(json_encode([
//         "status" => "error",
//         "message" => "Connection failed: " . $conn->connect_error
//     ]));
// }

// // Function to fetch all districts
// function fetchDistricts($conn) {
//     $sql = "SELECT * FROM district";
//     $result = $conn->query($sql);

//     $data = [];
//     if ($result && $result->num_rows > 0) {
//         while ($row = $result->fetch_assoc()) {
//             $data[] = $row;
//         }
//     }
//     return $data;
// }

// // Function to fetch all schools
// function fetchSchools($conn) {
//     $sql = "SELECT * FROM school";
//     $result = $conn->query($sql);

//     $data = [];
//     if ($result && $result->num_rows > 0) {
//         while ($row = $result->fetch_assoc()) {
//             $data[] = $row;
//         }
//     }
//     return $data;
// }

// // Function to fetch all BDOS
// function fetchBDOs($conn) {
//     $sql = "SELECT * FROM bdo";
//     $result = $conn->query($sql);

//     $data = [];
//     if ($result && $result->num_rows > 0) {
//         while ($row = $result->fetch_assoc()) {
//             $data[] = $row;
//         }
//     }
//     return $data;
// }

// // Function to fetch data by specific ID
// function fetchById($conn, $id) {
//     $sql = "SELECT * FROM district WHERE id = $id
//             UNION ALL
//             SELECT * FROM school WHERE id = $id
//             UNION ALL
//             SELECT * FROM bdo WHERE id = $id";
//     $result = $conn->query($sql);

//     $data = [];
//     if ($result && $result->num_rows > 0) {
//         while ($row = $result->fetch_assoc()) {
//             $data[] = $row;
//         }
//     }
//     return $data;
// }

// // Check query parameters
// $response = ["status" => "success", "data" => []];

// if (isset($_GET['district'])) {
//     // Fetch only district data
//     $response['data']['district'] = fetchDistricts($conn);
// } elseif (isset($_GET['school'])) {
//     // Fetch only school data
//     $response['data']['school'] = fetchSchools($conn);
// } elseif (isset($_GET['id'])) {
//     // Fetch data for a specific ID
//     $id = intval(substr($_GET['id'], 3)); // Assuming the format is id:<id>
//     $data = fetchById($conn, $id);
//     if ($data) {
//         $response['data'] = $data;
//     } else {
//         $response = [
//             "status" => "error",
//             "message" => "No data found for ID $id."
//         ];
//     }
// } else {
//     // Fetch all data
//     $response['data']['district'] = fetchDistricts($conn);
//     $response['data']['school'] = fetchSchools($conn);
//     $response['data']['bdo'] = fetchBDOs($conn);
// }

// // Return the JSON response
// echo json_encode($response);

// // Close the connection
// $conn->close();


?>
