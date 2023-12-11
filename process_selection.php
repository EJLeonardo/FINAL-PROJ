<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database Connection
    $conn = new mysqli('localhost', 'root', '', 'register_stud_db');
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    }

    // Process the selected event ID
    $selectedEventID = $conn->real_escape_string($_POST["event_id"]);

    // Further processing based on the selected event ID can be added here

    $conn->close();
}
?>
