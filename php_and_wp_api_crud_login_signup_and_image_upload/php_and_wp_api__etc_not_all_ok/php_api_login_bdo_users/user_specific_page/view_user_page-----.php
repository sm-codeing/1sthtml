<?php
include 'db_connection.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != $_GET['user_id']) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT content FROM user_pages WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($content);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Page</title>
</head>
<body>
    <h2>Your Personal Page</h2>
    <div><?php echo nl2br(htmlspecialchars($content)); ?></div>
</body>
</html>
