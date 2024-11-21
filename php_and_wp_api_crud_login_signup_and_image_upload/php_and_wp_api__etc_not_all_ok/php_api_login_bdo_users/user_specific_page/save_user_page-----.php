<?php
include 'db_connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $page_content = $_POST['page_content'];

    $stmt = $conn->prepare("INSERT INTO user_pages (user_id, content) VALUES (?, ?)");
    $stmt->bind_param("is", $user_id, $page_content);

    if ($stmt->execute()) {
        echo "Page created successfully!";
        // Redirect to view the user's own page
        header("Location: view_user_page.php?user_id=" . $user_id);
        exit();
    } else {
        echo "Error creating page: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
