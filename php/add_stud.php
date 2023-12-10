<?php

$stud_id = $_POST["stud_id"];
$l_name = $_POST["last_name"];
$f_name = $_POST["first_name"];
$m_i = $_POST["m_i"];
$program = $_POST["program"];
$year_l = $_POST["year_l"];
$email = $_POST["email"];
$phone_num = $_POST["phone_num"];

// Database Connection
$conn = new mysqli('localhost', 'root', '', 'register_stud_db');
if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO student (stud_id, l_name, f_name, m_i, program, year_l, email, phone_num) VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    if (!$stmt) {
        die('Error in preparing statement: ' . $conn->error);
    }

    $stmt->bind_param("issssss", $stud_id, $l_name, $f_name, $m_i, $program, $year, $email, $phone_num);

    if (!$stmt->execute()) {
        die('Error in executing statement: ' . $stmt->error);
    }

    echo "Registration Successful...8=D";
    
    $stmt->close();
    $conn->close();
}

?>
