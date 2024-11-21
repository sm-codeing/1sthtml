<?php
// Include database connection
include 'db_connection.php'; // Make sure this file contains code to connect to your MySQL database

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

    // Validate the input
    if (empty($title) || empty($content)) {
        echo "Title and content are required.";
        exit;
    }

    // Insert the new post into the database
    $sql = "INSERT INTO user_pages (user_id, title, content) VALUES ('$user_id', '$title', '$content')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Post created successfully!";
        // Redirect to another page if needed, e.g., the user's profile or a page listing their posts
        // header("Location: user_profile.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}


// ////// --------


// Get the user ID from the session
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
</html>




<?php



// session_start(); // Start the session
// include 'db_connection.php';

// // Check if user is logged in
// if (!isset($_SESSION['user_id'])) {
//     // Redirect to login page if not logged in
//     header('Location: login.php');
//     exit;
// }

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


<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Your Page</title>
</head>
<body>
    <h2>Create Your Page <span style="color:pink"><?php echo htmlspecialchars($username); ?></span></h2>
    <form method="post" action="save_user_page.php">
        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($userId); ?>">
        <label for="page_content">Page Content:</label><br>
        <textarea id="page_content" name="page_content" rows="10" cols="50"></textarea><br><br>
        <button type="submit">Save Page</button>
    </form>

    <br>
    <br>
<a href="http://localhost/php_api_login_bdo_users/user_specific_page/view_user_page.php?user_id=<?php echo htmlspecialchars($userId); ?>">
    view page url</a>
    <br>
    <br>
<a href="view_user_page.php?user_id=<?php echo htmlspecialchars($userId); ?>">view page</a>

<br>
<br>
<a href="http://localhost/php_api_login_bdo_users/user_specific_page/index_example.html">example</a>

    <br>
    <br>
<a href="index_example.html">example 2</a>

    <br>
    <br>

    <a href="logout.php">Logout  111 1111</a>
    <br>
    <form method="post" action="logout.php">
        <button type="submit">Logout</button>
    </form>
</body>
</html> -->
