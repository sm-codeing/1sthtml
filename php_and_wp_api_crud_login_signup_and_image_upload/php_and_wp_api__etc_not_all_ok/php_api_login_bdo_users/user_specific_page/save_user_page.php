<?php
// Include database connection file
include 'db_connection.php';

// Start session
session_start();

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user ID and page content from the form
    $userId = $_POST['user_id'];
    $pageContent = $_POST['page_content'];

    // Validate inputs
    if (empty($userId) || empty($pageContent)) {
        die("User ID and page content are required.");
    }

    // Insert or update the user's page content
    $stmt = $conn->prepare("INSERT INTO user_pages (user_id, content) VALUES (?, ?) ON DUPLICATE KEY UPDATE content = ?");
    $stmt->bind_param("iss", $userId, $pageContent, $pageContent);

    if ($stmt->execute()) {
        echo "Page saved successfully!";
        // Optionally redirect the user to view their new page
        header("Location: view_user_page.php?user_id=" . $userId);
        exit;
    } else {
        echo "Error saving page: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
