<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stud_id = $_POST["stud_id"];

    // Database Connection
    $conn = new mysqli('localhost', 'root', '', 'register_stud_db');

    if ($conn->connect_error) {
        die('Connection Failed : ' . $conn->connect_error);
    } else {
        // Delete record based on stud_id
        $stmt = $conn->prepare("DELETE FROM student WHERE stud_id = ?");

        if (!$stmt) {
            die('Error in preparing statement: ' . $conn->error);
        }

        $stmt->bind_param("i", $stud_id);

        if (!$stmt->execute()) {
            die('Error in executing statement: ' . $stmt->error);
        }

        // Close statement
        $stmt->close();
        $conn->close();

        // Redirect to a success page or another destination
        header("Location: delete_success.html");
        exit();
    }
}
?>
