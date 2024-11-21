<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Data Form</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Add School Data</h2>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "schoolsdtls";

if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['submitted'])) {
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $district = $_POST['district'];
    $schoolName = $_POST['schoolName'];
    $schoolType = $_POST['schoolType'];
    $studentName = $_POST['studentName'];
    $class = $_POST['class'];
    $section = $_POST['section'];
    $rollNo = $_POST['rollNo'];
    $subject = $_POST['subject'];

    $sql = "INSERT INTO district (district_name) VALUES ('$district')";
    $conn->query($sql);

    $sql = "INSERT INTO schools (school_name, district_id, school_type_id) VALUES ('$schoolName', (SELECT district_id FROM district WHERE district_name='$district'), $schoolType)";
    $conn->query($sql);

    $sql = "INSERT INTO students (student_name, class, section, roll_no, school_id) VALUES ('$studentName', '$class', '$section', $rollNo, (SELECT school_id FROM schools WHERE school_name='$schoolName'))";
    $conn->query($sql);

    $sql = "INSERT INTO student_subjects (student_id, subject_id) VALUES ((SELECT student_id FROM students WHERE student_name='$studentName'), $subject)";
    $conn->query($sql);

    $conn->close();
    echo "<p>Data Submitted Successfully!</p>";

    echo '<script>window.location.href = window.location.href;</script>';
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="district">District:</label>
    <input type="text" name="district" required><br>

    <label for="schoolName">School Name:</label>
    <input type="text" name="schoolName" required><br>

    <label for="schoolType">School Type:</label>
    <select name="schoolType" required>
        <option value="1">Boys</option>
        <option value="2">Girls</option>
        <option value="3">Coed</option>
    </select><br>

    <label for="studentName">Student Name:</label>
    <input type="text" name="studentName" required><br>

    <label for="class">Class:</label>
    <input type="text" name="class" required><br>

    <label for="section">Section:</label>
    <input type="text" name="section" required><br>

    <label for="rollNo">Roll No:</label>
    <input type="text" name="rollNo" required><br>

    <label for="subject">Subject:</label>
    <select name="subject" required>
        <option value="1">Bengali</option>
        <option value="2">English</option>
        <option value="3">Math</option>
        <option value="4">History</option>
        <option value="5">Geography</option>
    </select><br>

    <input type="submit" value="Submit">
    <input type="hidden" name="submitted" value="true">
</form>

<h2>Display Data</h2>

<?php
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM district");
displayData($result, $conn, "District");

$conn->close();

function displayData($result, $conn, $tableName) {
    echo "<h3>$tableName Data</h3>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $district_id = $row['district_id'];
            $district_name = $row['district_name'];

            echo "<h4>$district_name</h4>";

            $schoolsResult = $conn->query("SELECT * FROM schools WHERE district_id = $district_id");
            displaySchoolsData($schoolsResult, $conn);

            echo "<hr>";
        }
    } else {
        echo "No data found";
    }
}

function displaySchoolsData($schoolsResult, $conn) {
    if ($schoolsResult->num_rows > 0) {
        while ($schoolRow = $schoolsResult->fetch_assoc()) {
            $school_id = $schoolRow['school_id'];
            $school_name = $schoolRow['school_name'];

            echo "<p>School Name: $school_name</p>";

            $studentsResult = $conn->query("SELECT * FROM students WHERE school_id = $school_id");
            displayStudentsData($studentsResult);
            echo "<br>";
        }
    }
}

function displayStudentsData($studentsResult) {
    if ($studentsResult->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Class</th><th>Section</th><th>Roll No</th></tr>";
        while ($studentRow = $studentsResult->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$studentRow['student_id']}</td>";
            echo "<td>{$studentRow['student_name']}</td>";
            echo "<td>{$studentRow['class']}</td>";
            echo "<td>{$studentRow['section']}</td>";
            echo "<td>{$studentRow['roll_no']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No students found";
    }
}
?>
</body>
</html>
