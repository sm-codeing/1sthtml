<?php
// Database credentials
$host     = 'localhost';  // Database host (usually localhost)
$username = 'root';       // Your MySQL username
$password = '';           // Your MySQL password (leave empty for XAMPP default)
$dbname   = 'rpt2';       // Name of your database

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// Fetch bt_slider posts
$sql = "SELECT * FROM wp_posts WHERE post_type = 'bt_slider' AND post_status = 'publish'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="bt-slider">';
    while ($row = $result->fetch_assoc()) {
        echo '<div class="slider-item">';
        echo '<h2>' . htmlspecialchars($row['post_title']) . '</h2>';
        echo '<div class="slider-content">' . htmlspecialchars($row['post_content']) . '</div>';

        // Fetch metadata from wp_postmeta
        $post_id = $row['ID'];
        $meta_sql = "SELECT meta_key, meta_value FROM wp_postmeta WHERE post_id = $post_id";
        $meta_result = $conn->query($meta_sql);
        
        if ($meta_result->num_rows > 0) {
            echo '<ul class="meta-data">';
            while ($meta_row = $meta_result->fetch_assoc()) {
                echo '<li>' . htmlspecialchars($meta_row['meta_key']) . ': ' . htmlspecialchars($meta_row['meta_value']) . '</li>';
            }
            echo '</ul>';
        }
        
        echo '</div>';
    }
    echo '</div>';
} else {
    echo '<p>No slides found.</p>';
}

// Close connection
$conn->close();
?>
