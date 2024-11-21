<?php
// Include database connection
include 'db_connection.php';

// Check if data was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve user details from form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Encrypt the password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Prepare SQL statement with error checking
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters and execute statement
        $stmt->bind_param("ss", $username, $hashedPassword);
        
        if ($stmt->execute()) {
            echo "User added successfully! Redirecting...";
            header("Location: create_page.php"); // Redirect to the user-specific page creation form
            exit;
        } else {
            echo "Error executing statement: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
