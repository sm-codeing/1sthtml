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
$sql = "SELECT page_id, title, content, image_path, created_at, updated_at FROM user_pages WHERE user_id = '$user_id' ORDER BY created_at DESC";
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

        // Display the image if available
        if (!empty($row['image_path'])) {
            echo "<img src='uploads/" . htmlspecialchars($row['image_path']) . "' alt='Post Image' style='max-width: 20%; height: auto; margin-top: 10px;'><br>";
        }

        echo "<p>" . nl2br(htmlspecialchars($row['content'])) . "</p>";

        // Add Edit Post button with a link to the edit page
        echo "<a href='edit_post.php?post_id=" . $row['page_id'] . "' style='display: inline-block; margin-top: 10px; padding: 5px 10px; background-color: #007BFF; color: #fff; text-decoration: none; border-radius: 5px;'>Edit Post</a>";

        echo "</div>";
    }
} else {
    echo "<h1>No posts found.</h1>";
}

mysqli_close($conn); // Close the database connection

?>