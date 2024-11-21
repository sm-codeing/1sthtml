<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_dtl";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]));
}

// Get BDO ID from query parameter
$bdo_id = $_GET['id'] ?? null;

if ($bdo_id) {
    $stmt = $conn->prepare("DELETE FROM bdo WHERE id = ?");
    $stmt->bind_param("i", $bdo_id);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'BDO record deleted successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete BDO record']);
    }

    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Please provide a valid BDO ID']);
}

$conn->close();
?>
