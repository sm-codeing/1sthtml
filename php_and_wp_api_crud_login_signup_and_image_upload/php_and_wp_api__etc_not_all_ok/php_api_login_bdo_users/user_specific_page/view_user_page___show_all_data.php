<?php
// Include database connection
include 'db_connection.php'; // Ensure this file connects to your database

// Start the session to get user ID
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "You must be logged in to view your posts.";
    exit;
}

// Get the user ID from the session
$user_id = $_SESSION['user_id'];

// Fetch all posts for the logged-in user
$sql = "SELECT page_id, title, content, created_at, updated_at FROM user_pages WHERE user_id = '$user_id' ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);

// Check if any posts were found
if (mysqli_num_rows($result) > 0) {
    echo "<h1>Your Posts</h1>";
    
    // Display each post
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div style='border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;'>";
        echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
        echo "<p><strong>Created At:</strong> " . htmlspecialchars($row['created_at']) . "</p>";
        if ($row['created_at'] != $row['updated_at']) {
            echo "<p><strong>Last Updated:</strong> " . htmlspecialchars($row['updated_at']) . "</p>";
        }
        echo "<p>" . nl2br(htmlspecialchars($row['content'])) . "</p>";
        echo "</div>";
    }
} else {
    echo "<h1>No posts found.</h1>";
}

mysqli_close($conn); // Close the database connection
?>



<?php

///////// ----- only one data showing
// // Include database connection file
// include 'db_connection.php';

// // Get user ID from URL
// if (!isset($_GET['user_id'])) {
//     die("Invalid user ID.");
// }

// $userId = $_GET['user_id'];

// // Fetch user page content
// $stmt = $conn->prepare("SELECT content FROM user_pages WHERE user_id = ?");
// $stmt->bind_param("i", $userId);
// $stmt->execute();
// $result = $stmt->get_result();
// $page = $result->fetch_assoc();

// if (!$page) {
//     echo "No page content found for this user.";
// } else {
//     echo "<h2>User's Page Content</h2>";
//     echo "<div>" . nl2br(htmlspecialchars($page['content'])) . "</div>";
// }

// $stmt->close();
// $conn->close();


?>
