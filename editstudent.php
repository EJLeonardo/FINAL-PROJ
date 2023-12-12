<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stud_id = $_POST["stud_id"];
    $action = isset($_POST["action"]) ? $_POST["action"] : "";

    // Database Connection
    $conn = new mysqli('localhost', 'root', '', 'register_stud_db');
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    }

    if ($action === "edit") {
        // Redirect to an edit page or perform edit actions
        header("Location: editpage.php?stud_id=$stud_id");
        exit();
    } elseif ($action === "delete") {
        // Delete the student record
        $deleteQuery = "DELETE FROM student WHERE stud_id = ?";
        $stmt = $conn->prepare($deleteQuery);

        if (!$stmt) {
            die('Error in preparing delete statement: ' . $conn->error);
        }

        $stmt->bind_param("i", $stud_id);

        if (!$stmt->execute()) {
            die('Error in executing delete statement: ' . $stmt->error);
        }

        $stmt->close();

        // Redirect to a success page or another destination
        header("Location: deletesuccess.html");
        exit();
    }
}

// If the form is accessed without submitting, redirect to the form page
header("Location: editstudent.html");
exit();
?>
