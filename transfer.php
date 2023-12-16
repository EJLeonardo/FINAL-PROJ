<?php
// Database Connection
$conn = new mysqli('localhost', 'root', '', 'register_stud_db');
if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stud_id = $_POST["stud_id"];

    // Inserting data into the new table
    $insertQuery = "INSERT INTO tab(l_name, f_name, middle_initial, stud_id, program, year_l, email, phone_num) SELECT l_name, f_name, m_i, stud_id, program, year_l, email, phone_num FROM student WHERE stud_id = ?";
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