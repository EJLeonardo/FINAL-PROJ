<?php
// Database Connection
$conn = new mysqli('localhost', 'root', '', 'register_stud_db');
if ($conn->connect_error) {
  die('Connection Failed: ' . $conn->connect_error);
}

// Retrieve data from the 'events' table
$result = $conn->query("SELECT event_id, event_name FROM events");

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<option value='{$row['event_id']}'>{$row['event_name']}</option>";
  }
} else {
  echo "<option value=''>No events available</option>";
}

$conn->close();
?>
