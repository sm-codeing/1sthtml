<?php
session_start();
include 'db_connection.php'; // Include your database connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Get the user ID from the session
$userId = $_SESSION['user_id'];

// Get the page ID from the URL
$pageId = $_GET['page_id'] ?? null;
if (!$pageId) {
    die('Page ID is required.');
}

// Fetch the page content from the database
$stmt = $conn->prepare("SELECT content FROM user_pages WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $pageId, $userId);
$stmt->execute();
$result = $stmt->get_result();
$page = $result->fetch_assoc();

if (!$page) {
    die('Page not found or access denied.');
}

// Display the page content
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Page</title>
</head>
<body>
    <h2>Your Page</h2>
    <div>
        <h3>Page Content:</h3>
        <p><?php echo htmlspecialchars($page['content']); ?></p>
    </div>
    <a href="logout.php">Logout</a>
</body>
</html>
