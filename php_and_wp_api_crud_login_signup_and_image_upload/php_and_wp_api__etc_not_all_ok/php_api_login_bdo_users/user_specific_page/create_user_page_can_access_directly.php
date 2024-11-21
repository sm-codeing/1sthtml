<?php
include 'db_connection.php';

$userId = $_GET['user_id'] ?? null;
if (!$userId) {
    die('User ID is required.');
}

////// //// Fetch the username from the database
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Your Page</title>
</head>
<body>
    <h2>Create Your Page : <span style="color:#96f909; text-transform:uppercase;"> <?php echo htmlspecialchars($username); ?>  </span></h2>
    <form method="post" action="save_user_page.php">
        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($userId); ?>">
        <label for="page_content">Page Content:</label><br>
        <textarea id="page_content" name="page_content" rows="10" cols="50"></textarea><br><br>
        <button type="submit">Save Page</button>
    </form>
</body>
</html>
