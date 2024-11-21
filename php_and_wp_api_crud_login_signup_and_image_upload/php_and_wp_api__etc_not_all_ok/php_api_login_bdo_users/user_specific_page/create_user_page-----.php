<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Your Page</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>! Create Your Own Page</h2>
    <form action="save_user_page.php" method="post">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <textarea name="page_content" placeholder="Write your page content here..."></textarea><br>
        <input type="submit" value="Save Page">
    </form>
</body>
</html>
