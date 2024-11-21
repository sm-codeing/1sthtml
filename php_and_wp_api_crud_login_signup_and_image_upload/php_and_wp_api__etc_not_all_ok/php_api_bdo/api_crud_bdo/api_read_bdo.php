
 





<?php

/////// url type -----  http://localhost/php_api_ok/api_crud_bdo/api_read_bdo.php


header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdo_api";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]));
}

// Optional ID parameter to fetch a specific BDO
$bdo_id = $_GET['id'] ?? null;

if ($bdo_id) {
    $stmt = $conn->prepare("SELECT * FROM bdo WHERE id = ?");
    $stmt->bind_param("i", $bdo_id);
} else {
    $stmt = $conn->prepare("SELECT * FROM bdo");
}

if ($stmt->execute()) {
    $result = $stmt->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode(['status' => 'success', 'data' => $data]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to fetch BDO records']);
}

$stmt->close();
$conn->close();
?>


 