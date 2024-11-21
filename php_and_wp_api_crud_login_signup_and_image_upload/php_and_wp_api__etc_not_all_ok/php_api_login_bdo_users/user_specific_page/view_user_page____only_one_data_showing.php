<?php
// Include database connection file
include 'db_connection.php';

// Get user ID from URL
if (!isset($_GET['user_id'])) {
    die("Invalid user ID.");
}

$userId = $_GET['user_id'];

// Fetch user page content
$stmt = $conn->prepare("SELECT content FROM user_pages WHERE user_id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$page = $result->fetch_assoc();

if (!$page) {
    echo "No page content found for this user.";
} else {
    echo "<h2>User's Page Content</h2>";
    echo "<div>" . nl2br(htmlspecialchars($page['content'])) . "</div>";
}

$stmt->close();
$conn->close();
?>
