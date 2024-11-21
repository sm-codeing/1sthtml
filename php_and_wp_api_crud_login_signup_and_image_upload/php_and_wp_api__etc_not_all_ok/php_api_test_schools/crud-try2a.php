<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add District</title>
</head>
<body>
    <h2>Insert District</h2>

    <?php
    // Database connection details
    $servername = "localhost";
    $username = "root";   // Your MySQL username
    $password = "";       // Your MySQL password
    $dbname = "school_dtl";  // Your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get district name from the form
        $district_name = $_POST['district_name'];

        // Insert data into the district table
        $sql = "INSERT INTO district (district_name) VALUES ('$district_name')";

        if ($conn->query($sql) === TRUE) {
            echo "<p style='color: green;'>New district added successfully!</p>";
        } else {
            echo "<p style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }
    }

    // Close connection
    $conn->close();
    ?>

    <!-- HTML Form -->
    <form action="" method="POST">
        <label for="district_name">District Name:</label>
        <input type="text" id="district_name" name="district_name" required>
        <br><br>
        <input type="submit" value="Add District">
    </form>

</body>
</html>
