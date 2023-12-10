<?php

$dsn = "mysql:host=localhost;dbname=register_stud_db;table=student";
$dbusername = "root";
$dbpassword = "";
try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "connection failed: " . $e->getMessage();
}

$l_name = $_POST["last_name"];
$f_name = $_POST["first_name"];
$m_i = $_POST["middle_initial"];
$stud_id = $_POST["student_no"];
$program = $_POST["program"];
$year = $_POST["year"];
$email = $_POST["E-mail"];
$phone_num = $_POST["number"];