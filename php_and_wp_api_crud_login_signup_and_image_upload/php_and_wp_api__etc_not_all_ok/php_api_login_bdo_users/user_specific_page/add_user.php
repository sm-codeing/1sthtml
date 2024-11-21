<?php
// Include database connection file
include 'db_connection.php';

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Set Content-Type header to return JSON
    header('Content-Type: application/json');

    // Retrieve JSON data from the request body
    $data = json_decode(file_get_contents("php://input"), true);

    // Check if necessary fields are provided
    if (empty($data['username']) || empty($data['email']) || empty($data['password'])) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
        exit;
    }

    // Sanitize and assign input
    $username = $data['username'];
    $email = $data['email'];
    $password = password_hash($data['password'], PASSWORD_DEFAULT); // Encrypt password

    // Check if username or email already exists
    $checkStmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $checkStmt->bind_param("ss", $username, $email);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        echo json_encode(['status' => 'error', 'message' => 'Username or email already exists']);
        $checkStmt->close();
        exit;
    }
    $checkStmt->close();

    // Insert new user into the database
    $insertStmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $insertStmt->bind_param("sss", $username, $email, $password);

    if ($insertStmt->execute()) {
        $userId = $conn->insert_id; // Get the newly created user's ID
        echo json_encode(['status' => 'success', 'message' => 'User added successfully', 'user_id' => $userId]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to add user']);
    }

    $insertStmt->close();
    $conn->close();
    exit; // Stop further processing for POST requests
}

// For GET requests, display the HTML form
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
</head>
<body>
    <h2>Create New User</h2>
    <form id="userForm">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Create User</button>
    </form>

    <script>
        document.getElementById('userForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            const formData = new FormData(this);
            const data = {
                username: formData.get('username'),
                email: formData.get('email'),
                password: formData.get('password')
            };

            fetch('add_user.php', {
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
                    // Redirect to the create user page
                    window.location.href = 'create_user_page.php?user_id=' + result.user_id;
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>
