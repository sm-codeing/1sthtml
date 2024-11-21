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
$sql = "SELECT page_id, title, content,  image_path, created_at, updated_at FROM user_pages WHERE user_id = '$user_id' ORDER BY created_at DESC";
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

///--------------------------------



// Define the directory where images are stored
$imageDirectory = 'uploads/'; // Replace 'uploads/' with your actual image directory if different

// Display the image if the image path is not empty
if (!empty($row['image_path'])) {
   /////----- $fullImagePath = $imageDirectory . htmlspecialchars($row['image_path']);
    $fullImagePath = $imageDirectory . htmlspecialchars($row['image_path']);
    echo "<img src='" . $fullImagePath . "' alt='Post Image' style='max-width: 20%; height: auto; margin-top: 10px;'>";
}


// // Display the image if the image path is not empty
// if (!empty($row['image_path'])) {
//     echo "<img src='" . htmlspecialchars($row['image_path']) . "' alt='Post Image' style='max-width: 20%; height: auto; margin-top: 10px;'>";
// }

/////--------------------------------------------

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
