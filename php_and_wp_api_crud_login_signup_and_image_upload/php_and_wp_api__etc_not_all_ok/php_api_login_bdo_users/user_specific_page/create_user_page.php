<?php
// Include database connection
include 'db_connection.php'; // Ensure this connects to your database

// Start the session to get user ID
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "You must be logged in to create a post.";
    exit;
}

// Get the user ID from the session
$user_id = $_SESSION['user_id'];

// Check if form data has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and get the input data
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    // Check if the image was uploaded
    $image_name = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $upload_dir = 'uploads/';
        $image_name = basename($_FILES['image']['name']);
        $image_tmp_path = $_FILES['image']['tmp_name'];
        $image_target_path = $upload_dir . $image_name;

        // Validate the image type and size (2MB limit in this example)
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $file_type = mime_content_type($image_tmp_path);

        if (in_array($file_type, $allowed_types) && $_FILES['image']['size'] <= 2 * 1024 * 1024) {
            // Move the uploaded file to the designated directory
            if (!move_uploaded_file($image_tmp_path, $image_target_path)) {
                echo "Failed to upload the image.";
                exit;
            }
        } else {
            echo "Invalid image type or file size exceeds 2MB.";
            exit;
        }
    }

    // Validate the input
    if (empty($title) || empty($content)) {
        echo "Title and content are required.";
        exit;
    }

    // Insert the new post with the image path into the database
    $sql = "INSERT INTO user_pages (user_id, title, content, image_path) VALUES ('$user_id', '$title', '$content', '$image_name')";
    
    // if (mysqli_query($conn, $sql)) {
    //     echo "Post created successfully!";
    //     // Redirect to another page if needed, e.g., the user's profile or a page listing their posts
    //     // header("Location: user_profile.php");
    //     // header("Location: create_user_page.php");
    //     exit;
    // }


    // ///========================
    

    if (mysqli_query($conn, $sql)) {
        // Show the alert and reload the page with the user ID
        echo "<script>
            alert('Post created successfully!');
            window.location.href = 'create_user_page.php?user_id=" . $user_id . "';
        </script>";
    }
    


    // if (mysqli_query($conn, $sql)) {
    //     // echo "Post created successfully!";
    //     echo "<script>alert('Post created successfully!');</script>";

    //     header("Location: create_user_page.php?user_id=" . $user_id);

     
    // }
    else {
        echo "Error: " . mysqli_error($conn);
    }
}



// // ////// -------- for getting the loged in user name and id second process


///////session_start(); // Ensure the session is started

// // Get the logged-in user ID from the session
// $userId = $_SESSION['user_id'] ?? null;

// // Validate and sanitize the user ID from the URL
// $requestedUserId = isset($_GET['user_id']) ? intval($_GET['user_id']) : null;

// if ($requestedUserId === null || $requestedUserId !== $userId) {
//     // Redirect to an error page or show an error message
//     die('Access denied: Invalid user ID.');
// }


/////=========  1 st process 
//// Get the user ID from the session
$userId = $_SESSION['user_id'];

// Validate the user ID from the URL
$requestedUserId = $_GET['user_id'] ?? null;
if ($requestedUserId != $userId) {
    // Redirect to an error page or show an error message
    die('Access denied: Invalid user ID.');
}





// Fetch the username from the database
$stmt = $conn->prepare("SELECT username FROM users WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->bind_result($username);
$stmt->fetch();
$stmt->close();

if (!$username) {
    die('User not found.');
}





?>

<!-- Simple form for creating a post -->
<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
</head>
<body>
    <h1>Create a New Post  <span style="color:pink"><?php echo htmlspecialchars($username); ?></span></h1>
    <form method="post" action="create_user_page.php" enctype="multipart/form-data">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>
        
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" rows="10" cols="50" required></textarea><br><br>

        <label for="image">Upload Image:</label><br>
        <input type="file" id="image" name="image" accept="image/*"><br><br>
        
        <input type="submit" value="Create Post">
    </form>





    <br>
    <br>
<a href="view_user_page.php?user_id=<?php echo htmlspecialchars($userId); ?>">view page</a>

<br>
<br>
<br>
    <br>
<a href="logout.php?">Log out</a>

<br>
<br>
</body>
</html>




<?php

////// ----include 'view_user_page.php';
include 'edit_post_list.php';

// // Include database connection
// include 'db_connection.php'; // Make sure this file contains code to connect to your MySQL database

// // Start the session to get user ID
// session_start();

// // Check if user is logged in
// if (!isset($_SESSION['user_id'])) {
//     echo "You must be logged in to create a post.";
//     exit;
// }

// // Get the user ID from the session
// $user_id = $_SESSION['user_id'];

// // Check if form data has been submitted
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     // Sanitize and get the input data
//     $title = mysqli_real_escape_string($conn, $_POST['title']);
//     $content = mysqli_real_escape_string($conn, $_POST['content']);

//     // Validate the input
//     if (empty($title) || empty($content)) {
//         echo "Title and content are required.";
//         exit;
//     }

//     // Insert the new post into the database
//     $sql = "INSERT INTO user_pages (user_id, title, content) VALUES ('$user_id', '$title', '$content')";
    
//     if (mysqli_query($conn, $sql)) {
//         echo "Post created successfully!";
//         // Redirect to another page if needed, e.g., the user's profile or a page listing their posts
//         // header("Location: user_profile.php");
//         exit;
//     } else {
//         echo "Error: " . mysqli_error($conn);
//     }
// }


// // ////// --------


// // Get the user ID from the session
// $userId = $_SESSION['user_id'];

// // Validate the user ID from the URL
// $requestedUserId = $_GET['user_id'] ?? null;
// if ($requestedUserId != $userId) {
//     // Redirect to an error page or show an error message
//     die('Access denied: Invalid user ID.');
// }

// // Fetch the username from the database
// $stmt = $conn->prepare("SELECT username FROM users WHERE id = ?");
// $stmt->bind_param("i", $userId);
// $stmt->execute();
// $stmt->bind_result($username);
// $stmt->fetch();
// $stmt->close();

// if (!$username) {
//     die('User not found.');
// }







?>

<!-- Simple form for creating a post -->
<!-- <!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
</head>
<body>
    <h1>Create a New Post   <span style="color:pink"><?php echo htmlspecialchars($username); ?></span></h1>
    <form method="post" action="create_user_page.php">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>
        
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" rows="10" cols="50" required></textarea><br><br>
        
        <input type="submit" value="Create Post">
    </form>



    <br>
    <br>
<a href="view_user_page.php?user_id=<?php echo htmlspecialchars($userId); ?>">view page</a>

<br>
<br>


</body>
</html> -->



 
 