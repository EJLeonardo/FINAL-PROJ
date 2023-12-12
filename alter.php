<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stud_id = $_POST["stud_id"];
    $l_name = $_POST["last_name"];
    $f_name = $_POST["first_name"];
    $m_i = $_POST["middle_initial"];
    $program = $_POST["program"];
    $year_l = $_POST["year_l"];
    $email = $_POST["E-mail"];
    $phone_num = $_POST["number"];

    // Database Connection
    $conn = new mysqli('localhost', 'root', '', 'register_stud_db');
    
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    } else {
        // Update all fields except stud_id
        $stmt = $conn->prepare("UPDATE student SET l_name=?, f_name=?, m_i=?, program=?, year_l=?, email=?, phone_num=? WHERE stud_id=?");

        if (!$stmt) {
            die('Error in preparing statement: ' . $conn->error);
        }

        $stmt->bind_param("sssssssi", $l_name, $f_name, $m_i, $program, $year_l, $email, $phone_num, $stud_id);

        if (!$stmt->execute()) {
            die('Error in executing statement: ' . $stmt->error);
        }

        // Close statement
        $stmt->close();
        $conn->close();

        // Redirect or display success message
        header("Location: success.html");
        exit();
    }
}
?>
