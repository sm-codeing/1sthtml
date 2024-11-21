
<?php

//////   here it's mandatory to use the category word in the url  -----  ( .php?category=district&id )
/////// url type -----  http://localhost/php_api_ok/api_get_all_data_multi_format.php?category=district&id=6

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

// Function to fetch data by category and ID
function fetchByCategoryAndId($conn, $category, $id) {
    $data = [];
    $sql = "SELECT * FROM " . $conn->real_escape_string($category) . " WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    $stmt->close();

    return $data;
}

// Function to get all table names in the database
function getAllTables($conn) {
    $tables = [];
    $sql = "SHOW TABLES";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_array()) {
            $tables[] = $row[0];
        }
    }

    return $tables;
}

// Get all table names from the database
$allTables = getAllTables($conn);

// Check if a category and ID are provided
$response = ["status" => "success", "data" => []];
if (isset($_GET['category']) && isset($_GET['id'])) {
    $category = $_GET['category'];
    $id = intval($_GET['id']);

    // Check if the category exists in the database
    if (in_array($category, $allTables)) {
        $data = fetchByCategoryAndId($conn, $category, $id);
        if (!empty($data)) {
            $response['data'][$category] = $data;
        } else {
            $response = [
                "status" => "error",
                "message" => "No data found for ID $id in category $category."
            ];
        }
    } else {
        $response = [
            "status" => "error",
            "message" => "Invalid category: $category."
        ];
    }
} else {
    $response = [
        "status" => "error",
        "message" => "Please provide a category and ID using the 'category' and 'id' parameters."
    ];
}

// Return the JSON response
echo json_encode($response);

// Close the connection
$conn->close();
?>






<?php

///// as per all category id (if more than one same id in different category)

///// url is like -----   http://localhost/php_api_ok/api_get_all_data_multi_format.php?id=8

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

// // Function to fetch data by specific ID across all tables
// function fetchById($conn, $id, $allTables) {
//     $data = [];

//     foreach ($allTables as $table) {
//         $sql = "SELECT * FROM " . $conn->real_escape_string($table) . " WHERE id = ?";
//         $stmt = $conn->prepare($sql);
//         $stmt->bind_param("i", $id);
//         $stmt->execute();
//         $result = $stmt->get_result();

//         if ($result && $result->num_rows > 0) {
//             while ($row = $result->fetch_assoc()) {
//                 $data[$table][] = $row;
//             }
//         }
//         $stmt->close();
//     }

//     return $data;
// }

// // Function to get all table names in the database
// function getAllTables($conn) {
//     $tables = [];
//     $sql = "SHOW TABLES";
//     $result = $conn->query($sql);

//     if ($result && $result->num_rows > 0) {
//         while ($row = $result->fetch_array()) {
//             $tables[] = $row[0];
//         }
//     }

//     return $tables;
// }

// // Get all table names from the database
// $allTables = getAllTables($conn);

// // Check if the 'id' parameter is provided
// $response = ["status" => "success", "data" => []];
// if (isset($_GET['id'])) {
//     $id = intval($_GET['id']);
//     $data = fetchById($conn, $id, $allTables);
//     if (!empty($data)) {
//         $response['data'] = $data;
//     } else {
//         $response = [
//             "status" => "error",
//             "message" => "No data found for ID $id."
//         ];
//     }
// } else {
//     $response = [
//         "status" => "error",
//         "message" => "Please provide an ID using the 'id' parameter."
//     ];
// }

// // Return the JSON response
// echo json_encode($response);

// // Close the connection
// $conn->close();




?>



<?php


///// all data also for future table 

 //////     try url  -----   http://localhost/php_api_ok/api_get_all_data_multi_format.php

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

// Function to fetch data from a specified table
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

// Function to fetch data by specific ID across all tables
function fetchById($conn, $id, $allTables) {
    $data = [];

    foreach ($allTables as $table) {
        $sql = "SELECT * FROM " . $conn->real_escape_string($table) . " WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[$table][] = $row;
            }
        }
        $stmt->close();
    }

    return $data;
}

// Function to get all table names in the database
function getAllTabless($conn) {
    $tables = [];
    $sql = "SHOW TABLES";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_array()) {
            $tables[] = $row[0];
        }
    }

    return $tables;
}

// Get all table names from the database
$allTables = getAllTabless($conn);

// Check query parameters
$response = ["status" => "success", "data" => []];

if (!empty($_GET)) {
    // Get the first key from the query string to determine what to fetch
    $key = array_key_first($_GET);
    $value = $_GET[$key];

    if ($key === 'id') {
        // Fetch data for a specific ID in the format id:<id>
        if (preg_match('/^id:(\d+)$/', $value, $matches)) {
            $id = intval($matches[1]);
            $data = fetchById($conn, $id, $allTables);
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
                "message" => "Invalid ID format. Use 'id:<number>'."
            ];
        }
    } else {
        // Assume the key corresponds to a table name and fetch its data
        if (in_array($key, $allTables)) {
            $data = fetchData($conn, $key);
            if (!empty($data)) {
                $response['data'][$key] = $data;
            } else {
                $response = [
                    "status" => "error",
                    "message" => "No data found for table '$key'."
                ];
            }
        } else {
            $response = [
                "status" => "error",
                "message" => "Table '$key' does not exist."
            ];
        }
    }
} else {
    // Fetch all data for all tables if no specific parameter is provided
    foreach ($allTables as $table) {
        $response['data'][$table] = fetchData($conn, $table);
    }
}

// Return the JSON response
echo json_encode($response);

// Close the connection
$conn->close();


?>







<?php

//// only existing table not foe neww table added latter

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

// // Function to fetch data from a specified table
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

// // Function to fetch data by specific ID across all tables
// function fetchById($conn, $id) {
//     $data = [];

//     // Specify tables to search in
//     $tables = ['district', 'school', 'bdo'];
//     foreach ($tables as $table) {
//         $sql = "SELECT * FROM " . $conn->real_escape_string($table) . " WHERE id = ?";
//         $stmt = $conn->prepare($sql);
//         $stmt->bind_param("i", $id);
//         $stmt->execute();
//         $result = $stmt->get_result();

//         if ($result && $result->num_rows > 0) {
//             while ($row = $result->fetch_assoc()) {
//                 $data[$table][] = $row;
//             }
//         }
//         $stmt->close();
//     }

//     return $data;
// }

// // Check query parameters
// $response = ["status" => "success", "data" => []];

// if (!empty($_GET)) {
//     // Get the first key from the query string to determine what to fetch
//     $key = array_key_first($_GET);
//     $value = $_GET[$key];

//     if ($key === 'id') {
//         // Fetch data for a specific ID in the format id:<id>
//         if (preg_match('/^id:(\d+)$/', $value, $matches)) {
//             $id = intval($matches[1]);
//             $data = fetchById($conn, $id);
//             if (!empty($data)) {
//                 $response['data'] = $data;
//             } else {
//                 $response = [
//                     "status" => "error",
//                     "message" => "No data found for ID $id."
//                 ];
//             }
//         } else {
//             $response = [
//                 "status" => "error",
//                 "message" => "Invalid ID format. Use 'id:<number>'."
//             ];
//         }
//     } else {
//         // Assume the key corresponds to a table name and fetch its data
//         $data = fetchData($conn, $key);
//         if (!empty($data)) {
//             $response['data'][$key] = $data;
//         } else {
//             $response = [
//                 "status" => "error",
//                 "message" => "No data found for table '$key'."
//             ];
//         }
//     }
// } else {
//     // Fetch all data for all categories if no specific parameter is provided
//     $tables = ['district', 'school', 'bdo'];
//     foreach ($tables as $table) {
//         $response['data'][$table] = fetchData($conn, $table);
//     }
// }

// // Return the JSON response
// echo json_encode($response);

// // Close the connection
// $conn->close();


?>
