<?php
// Start session management
session_start();

// Include database connection file
include 'db_connection.php';

// Enable error reporting for development
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Set Content-Type header to return JSON
    header('Content-Type: application/json');

    // Retrieve JSON data from the request body
    $data = json_decode(file_get_contents("php://input"), true);

    // Check if necessary fields are provided
    if (empty($data['username']) && empty($data['email']) || empty($data['password'])) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
        exit;
    }

    // Sanitize and assign input
    $identifier = !empty($data['username']) ? $data['username'] : $data['email'];
    $password = $data['password'];

    // Check if user exists
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $identifier, $identifier);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 0) {
        echo json_encode(['status' => 'error', 'message' => 'User does not exist']);
        $stmt->close();
        exit;
    }

    $stmt->bind_result($userId, $hashedPassword);
    $stmt->fetch();
    $stmt->close();

    // Verify password
    if (password_verify($password, $hashedPassword)) {
        // Set session variables for logged in user
        $_SESSION['user_id'] = $userId; // Store user ID in session

        // Check if the user has an existing personal page
        $pageCheckStmt = $conn->prepare("SELECT COUNT(*) FROM user_pages WHERE user_id = ?");
        $pageCheckStmt->bind_param("i", $userId);
        $pageCheckStmt->execute();
        $pageCheckStmt->bind_result($pageCount);
        $pageCheckStmt->fetch();
        $pageCheckStmt->close();

        if ($pageCount > 0) {
            // Redirect to the user's existing page
            echo json_encode(['status' => 'success', 'user_id' => $userId]);
        } else {
            // No existing page, send a message to create a new page
            echo json_encode(['status' => 'no_page', 'message' => 'No page exists, create a new page', 'user_id' => $userId]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Incorrect password']);
    }
    exit; // Stop further processing for POST requests
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form id="loginForm">
        <label for="usernameOrEmail">Username or Email:</label>
        <input type="text" id="usernameOrEmail" name="usernameOrEmail" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            const formData = new FormData(this);
            const data = {
                username: formData.get('usernameOrEmail'),
                email: formData.get('usernameOrEmail'),
                password: formData.get('password')
            };

            fetch('login.php', {
                method: 'POST',
                body: JSON.stringify(data),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(result => {
                alert(result.message);
                if (result.status === 'success') {
                    // Redirect to the user's existing page
                    window.location.href = 'create_user_page.php?user_id=' + result.user_id;
                } else if (result.status === 'no_page') {
                    // Redirect to create a new page
                    window.location.href = 'create_user_page.php?user_id=' + result.user_id; // Adjust as necessary
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>
