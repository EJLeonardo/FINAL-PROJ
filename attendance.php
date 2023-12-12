<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Students</title>
</head>
<body>

    <h2>Student Information</h2>

    <?php
    // Database Connection
    $conn = new mysqli('localhost', 'root', '', 'register_stud_db');
    if ($conn->connect_error) {
        die('Connection Failed : ' . $conn->connect_error);
    }

    // Selecting data from the table (replace 'students' with your actual table name)
    $selectQuery = "SELECT id, l_name, f_name FROM newtablename";
    $result = $conn->query($selectQuery);

    if ($result->num_rows > 0) {
        echo '<table border="1">';
        echo '<tr><th>ID</th><th>Last Name</th><th>First Name</th></tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['l_name'] . '</td>';
            echo '<td>' . $row['f_name'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'No records found';
    }

    // Close the database connection
    $conn->close();
    ?>

</body>
</html>
