<?php
// Database Connection
$conn = new mysqli('localhost', 'root', '', 'register_stud_db');
if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stud_id = $_POST["stud_id"];

    // Inserting data into the new table
    $insertQuery = "INSERT INTO newtablename (l_name, f_name) SELECT l_name, f_name FROM student WHERE stud_id = ?";
    $stmt = $conn->prepare($insertQuery);

    if (!$stmt) {
        die('Error in preparing statement: ' . $conn->error);
    }

    $stmt->bind_param("i", $stud_id);

    if (!$stmt->execute()) {
        die('Error in executing statement: ' . $stmt->error);
    }
    header("Location: registerstud.html");
        exit();

    $stmt->close();
}

$conn->close();
?>
