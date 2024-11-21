<?php
// session_start();
// $host = 'localhost';
// $dbname = 'bdo_users';
// $user = 'root';
// $password = '';  // Replace with your MySQL password

// $conn = new mysqli($host, $user, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $username = $_POST['username'];
//     $password = $_POST['password'];
    
//     // Fetch user details from the database
//     $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
//     $stmt->bind_param("s", $username);
//     $stmt->execute();
//     $result = $stmt->get_result();
//     $user = $result->fetch_assoc();
    
//     // Verify password
//     if ($user && password_verify($password, $user['password'])) {
//         $_SESSION['user_id'] = $user['id'];  // Store user ID in session

//         // Check if the user has an existing page
//         $pageCheckStmt = $conn->prepare("SELECT id FROM user_pages WHERE user_id = ?");
//         $pageCheckStmt->bind_param("i", $user['id']);
//         $pageCheckStmt->execute();
//         $pageResult = $pageCheckStmt->get_result();

//         if ($pageResult->num_rows > 0) {
//             // Fetch the first existing page's ID
//             $page = $pageResult->fetch_assoc();
//             header("Location: user_page.php?page_id=" . $page['id']); // Redirect to the existing user page
//         } else {
//             // Redirect to create a new user page
//             header("Location: create_user_page.php?user_id=" . $user['id']);
//         }
//         exit; // Ensure no further code is executed after the redirect
//     } else {
//         echo "Invalid username or password.";
//     }
// }
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="login.php">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        
        <input type="submit" value="Login">
    </form>
</body>
</html> -->


<?php
session_start();
$host = 'localhost';
$dbname = 'bdo_users';
$user = 'root';
$password = '';  // Replace with your MySQL password

$conn = new mysqli($host, $user, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Fetch user details from database
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    
    // Verify password
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];  // Store user ID in session
        header("Location: protected.php");  // Redirect to protected page
        exit;
    } else {
        echo "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="login.php">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        
        <input type="submit" value="Login">
    </form>
</body>
</html>
