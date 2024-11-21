<?php
class Database {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'rpt2';
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Database connection failed: " . $this->conn->connect_error);
        }
    }

    public function getSliderPosts() {
        $sql = "SELECT * FROM wp_posts WHERE post_type = 'bt_slider' AND post_status = 'publish'";
        $result = $this->conn->query($sql);
        $posts = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Fetch metadata for each post
                $post_id = $row['ID'];
                $meta_sql = "SELECT meta_key, meta_value FROM wp_postmeta WHERE post_id = $post_id";
                $meta_result = $this->conn->query($meta_sql);

                $metadata = [];
                while ($meta_row = $meta_result->fetch_assoc()) {
                    $metadata[$meta_row['meta_key']] = $meta_row['meta_value'];
                }

                $row['metadata'] = $metadata;
                $posts[] = $row;
            }
        }

        return $posts;
    }

    public function closeConnection() {
        $this->conn->close();
    }
}
?>







<?php
/////require_once 'Database.php';

class SliderService {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getSliderData() {
        $posts = $this->db->getSliderPosts();
        $this->db->closeConnection();
        return $posts;
    }
}
?>






<?php
////////require_once 'SliderService.php';

$sliderService = new SliderService();
$sliderData = $sliderService->getSliderData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BT Slider</title>
    <style>
        .bt-slider { display: flex; gap: 20px; overflow: auto; }
        .slider-item { border: 1px solid #ccc; padding: 15px; border-radius: 5px; zwidth: 300px; text-align: center; }
        .slider-item img { max-width: 100%; height: auto; border-radius: 5px; }
        .slider-title { font-size: 1.5em; margin-bottom: 10px; }
        .slider-content { margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="bt-slider">
        <?php if (!empty($sliderData)) : ?>
            <?php foreach ($sliderData as $post) : ?>
                <div class="slider-item">
                    <!-- Post Title -->
                    <h2 class="slider-title"><?= htmlspecialchars($post['post_title']); ?></h2>

                    <!-- Post Image (from metadata) -->
                    <?php if (!empty($post['metadata']['slider_image'])) : ?>
                        <img src="<?= htmlspecialchars($post['metadata']['slider_image']); ?>" alt="Slider Image">
                    <?php else : ?>
                        <img src="placeholder.jpg" alt="Placeholder Image">
                    <?php endif; ?>

                    <!-- Post Content -->
                    <div class="slider-content"><?= htmlspecialchars($post['post_content']); ?></div>
                    <h2> below is with html filter</h2>
                    <div class="slider-content" style="color:#b00b2e;"><?= $post['post_content']; ?></div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No slider posts found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
