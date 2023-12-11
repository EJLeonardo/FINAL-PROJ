<?php
// Database Connection
$conn = new mysqli('localhost', 'root', '', 'register_stud_db');
if ($conn->connect_error) {
  die('Connection Failed: ' . $conn->connect_error);
}

// Retrieve data from the 'student' table
$result = $conn->query("SELECT * FROM student");

if ($result->num_rows > 0) {
  echo "<table border='1'>
          <tr>
            <th>Student ID</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>M.I.</th>
            <th>Program</th>
            <th>Year</th>
            <th>Email</th>
            <th>Contact Number</th>
          </tr>";

  while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['stud_id']}</td>
            <td>{$row['l_name']}</td>
            <td>{$row['f_name']}</td>
            <td>{$row['m_i']}</td>
            <td>{$row['program']}</td>
            <td>{$row['year_l']}</td>
            <td>{$row['email']}</td>
            <td>{$row['phone_num']}</td>
          </tr>";
  }

  echo "</table>";
} else {
  echo "No records found";
}

$conn->close();
?>
