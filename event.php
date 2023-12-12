<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root"; // default XAMPP username
    $password = ""; // default XAMPP password
    $dbname = "register_stud_db";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Process form data
    $event_name = $conn->real_escape_string($_POST["event_name"]);
    $event_description = $conn->real_escape_string($_POST["event_description"]);
    $event_date = $conn->real_escape_string($_POST["event_date"]);
    $event_start_time = $conn->real_escape_string($_POST["event_start_time"]);
    $event_end_time = $conn->real_escape_string($_POST["event_end_time"]);
    $registration_fee = $conn->real_escape_string($_POST["registration_fee"]);
    $program = $conn->real_escape_string($_POST["program"]);

    // Insert data using a prepared statement
    $sql = "INSERT INTO events (event_name, event_description, event_date, event_start_time, event_end_time, registration_fee, program) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $event_name, $event_description, $event_date, $event_start_time, $event_end_time, $registration_fee, $program);

    if ($stmt->execute()) {
        echo "Event added successfully!";
        header("Location: addevent.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
