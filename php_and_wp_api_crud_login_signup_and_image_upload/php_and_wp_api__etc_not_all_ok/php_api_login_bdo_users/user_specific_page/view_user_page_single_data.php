<?php
// Include database connection
include 'db_connection.php'; // Ensure this file connects to your database

// Start the session to manage user access
session_start();

// Retrieve user_id and post_id from the URL
$user_id = $_GET['user_id'] ?? null;
$post_id = $_GET['post_id'] ?? null;

// Validate that both user_id and post_id are provided
if (!$user_id || !$post_id) {
    echo "Invalid user or post ID.";
    exit;
}

// Fetch the specific post
$sql = "SELECT * FROM user_pages WHERE user_id = '$user_id' AND page_id = '$post_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    echo "Post not found or access denied ----.";
    exit;
}

// Display the post data
$post = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($post['title']); ?></title>
</head>
<body>
    <h1><?php echo htmlspecialchars($post['title']); ?></h1>
    <p><?php echo htmlspecialchars($post['content']); ?></p>

    <?php if (!empty($post['image_path'])): ?>
        <img src="uploads/<?php echo htmlspecialchars($post['image_path']); ?>" alt="Post Image">
    <?php endif; ?>
</body>
</html>
