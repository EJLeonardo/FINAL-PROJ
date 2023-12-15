<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Students</title>
</head>

<style>

.test2{
  border: none;
  padding: 30px;
  max-width: fit-content;
  margin-left: 300px;
}

</style>
<body>
<div class="test2">
    
<p>Student Information</p>

    <?php
    // Database Connection
    $conn = new mysqli('localhost', 'root', '', 'register_stud_db');
    if ($conn->connect_error) {
        die('Connection Failed : ' . $conn->connect_error);
    }

    // Selecting data from the table (replace 'students' with your actual table name)
    $selectQuery = "SELECT id, l_name, f_name, middle_initial, stud_id, program, year_l, email, phone_num FROM newtablename";
    $result = $conn->query($selectQuery);

    if ($result->num_rows > 0) {
        echo '<table border="1">';
        echo '<tr><th>ID</th><th>Last Name</th><th>First Name</th><th>Middle Initial</th><th>Student Number</th><th>Program</th><th>Year Level</th><th>E-Mail</th><th>Contact Number</th></tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['l_name'] . '</td>';
            echo '<td>' . $row['f_name'] . '</td>';
            echo '<td>' . $row['middle_initial'] . '</td>';
            echo '<td>' . $row['stud_id'] . '</td>';
            echo '<td>' . $row['program'] . '</td>';
            echo '<td>' . $row['year_l'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['phone_num'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'No records found';
    }

    // Close the database connection
    $conn->close();
    ?>


</div>


</body>
</html>
