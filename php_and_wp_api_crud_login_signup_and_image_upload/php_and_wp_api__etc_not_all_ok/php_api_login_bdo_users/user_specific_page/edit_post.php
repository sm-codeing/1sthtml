<?php
// Include database connection
include 'db_connection.php'; // Ensure this file connects to your database

// Start the session to get user ID
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "You must be logged in to access this page.";
    exit;
}

// Get the user ID from the session
$user_id = $_SESSION['user_id'];

// Get the post ID from the URL
$post_id = $_GET['post_id'] ?? null;

if (!$post_id) {
    echo "Invalid post ID.";
    exit;
}

// Fetch the post data
$sql = "SELECT * FROM user_pages WHERE page_id = '$post_id' AND user_id = '$user_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    echo "Post not found or access denied.";
    exit;
}

$post = mysqli_fetch_assoc($result);

// Handle form submission for editing or deleting the post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete'])) {
        // Delete the post
        $delete_sql = "DELETE FROM user_pages WHERE page_id = '$post_id' AND user_id = '$user_id'";
        if (mysqli_query($conn, $delete_sql)) {
            echo "<script>alert('Post deleted successfully.'); window.location.href='view_user_page.php?user_id=" . $user_id . "';</script>";
            exit;
        } else {
            echo "Error deleting post: " . mysqli_error($conn);
        }
    } else {
        // Update the post content and image
        $new_content = mysqli_real_escape_string($conn, $_POST['content']);
        $new_title = mysqli_real_escape_string($conn, $_POST['title']);
        $image_path = $post['image_path'];

        // Check if a new image is uploaded
        if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
            // Define the upload directory
            $target_dir = "uploads/";
            $filename = basename($_FILES['image']['name']); // Only the file name
            $target_file = $target_dir . $filename;

            // Move the uploaded file
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                $image_path = $filename; // Only store the filename in the database
            } else {
                echo "Failed to upload image.";
            }
        }

        // Check if the user wants to remove the image
        if (isset($_POST['remove_image'])) {
            $image_path = null; // Set to NULL to indicate no image
        }

        // Update the database with the new post details
        $update_sql = "UPDATE user_pages SET title = '$new_title', content = '$new_content', " .
                      "image_path = " . (!empty($image_path) ? "'" . mysqli_real_escape_string($conn, $image_path) . "'" : "NULL") . ", " .
                      "updated_at = NOW() WHERE page_id = '$post_id' AND user_id = '$user_id'";

        if (mysqli_query($conn, $update_sql)) {
            // echo "<script>alert('Post updated successfully.'); window.location.href='view_user_page.php';</script>";
            echo "<script>alert('Post updated successfully.'); window.location.href='view_user_page_single_data.php?user_id=$user_id&post_id=$post_id';</script>";

            exit;
        } else {
            echo "Error updating post: " . mysqli_error($conn);
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Post</title>
</head>
<body>
    <h2>Edit Post</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="post_id" value="<?php echo htmlspecialchars($post['page_id']); ?>">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required><br><br>
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" rows="10" cols="30" required><?php echo htmlspecialchars($post['content']); ?></textarea><br><br>
        

        <?php if (!empty($post['image_path'])): ?>
            <p>Current Image:</p>
            <img src="uploads/<?php echo htmlspecialchars($post['image_path']); ?>" alt="Post Image" style="max-width: 100%; height: auto;"><br>
            <label><input type="checkbox" name="remove_image"> Remove Image</label><br><br>
        <?php endif; ?>

        <label for="image">Upload Image:</label><br>
        <input type="file" name="image" id="image"><br><br>
        <input type="checkbox" name="remove_image" id="remove_image" value="1">
        <label for="remove_image">Remove image</label><br><br>
        <input type="submit" value="Update">
        <input type="submit" name="delete" value="Delete Post" onclick="return confirm('Are you sure you want to delete this post?');">
    </form>
</body>
</html>
