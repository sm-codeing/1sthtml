<?php
// Set response header to return JSON
header('Content-Type: application/json');

// Database connection details
$servername = "localhost";
$username = "root";  // Your MySQL username
$password = "";      // Your MySQL password
$dbname = "school_dtl";  // Your database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    // Return a JSON response indicating failure to connect
    echo json_encode([
        "status" => "error",
        "message" => "Connection failed: " . $conn->connect_error
    ]);
    exit();
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the POST data (JSON) from the request body
    $data = json_decode(file_get_contents("php://input"), true);


//*************************** */


    // Ensure both 'bdo_name' and 'dst_id' are provided in the request
   // if (isset($data['bdo_name']) && isset($data['dst_id'])) {  ///*** */
    if (isset($data['bdo_name']) && isset($data['district_name'])) {   //--//////////
        $bdo_name = $conn->real_escape_string($data['bdo_name']);
     //  $dst_id = $conn->real_escape_string($data['dst_id']);  ///*** */
        $district_name = $conn->real_escape_string($data['district_name']);  //--//////

        // SQL query to insert the new BDO
       // $sql = "INSERT INTO bdo (bdo_name, dst_id) VALUES ('$bdo_name', '$dst_id')";  ///*** */
      
        $sql = "INSERT INTO bdo (bdo_name, district_name) VALUES ('$bdo_name', '$district_name')";  //--////////




    //     // Check if the query was successful
        if ($conn->query($sql) === TRUE) {
            // Return a JSON response indicating success
            echo json_encode([
                "status" => "success",
              //  "message" => "New BDO added successfully!"
            ]);
        } 




    //    else {
    //         // Return a JSON response with the SQL error
    //         echo json_encode([
    //             "status" => "error",
    //             "message" => "Error: " . $conn->error
    //         ]);
    //     }
    // } else {
    //     // Return a JSON response if required data is missing
    //     echo json_encode([
    //         "status" => "error",
    //         "message" => "bdo_name and dst_id are required"
    //     ]);

    


    }

//**************************************** */



// if (isset($data['bdo_name']) && isset($data['district_name'])) {
//     $bdo_name = $conn->real_escape_string($data['bdo_name']);
//     $district_name = $conn->real_escape_string($data['district_name']);

//     // SQL query to insert the new BDO
//     $sql = "INSERT INTO bdo (bdo_name, district_name) VALUES ('$bdo_name', '$district_name')";

//     // Check if the query was successful
//     if ($conn->query($sql) === TRUE) {
//         // Return a JSON response indicating success
//         echo json_encode([
//             "status" => "success",
//             "message" => "New BDO added successfully!"
//         ]);
//     } else {
//         // Return a JSON response indicating failure
//         echo json_encode([
//             "status" => "error",
//             "message" => "Error adding BDO: " . $conn->error
//         ]);
//     }
// } else {
//     // Return a JSON response indicating missing parameters
//     echo json_encode([
//         "status" => "error",
//         "message" => "Missing bdo_name or district_name"
//     ]);
// }



//================


}

// Close the database connection
$conn->close();
?>
