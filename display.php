<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

p {
  font-size: 50px;
}
body {
  margin: 0;
  padding: 0;
  background-color: #C2D9FF;
  background-size: cover;
  color: #070A52;
}

.test2{
  border: none;
  padding: 30px;
  max-width: fit-content;
  margin-left: 320px;
  margin-top: 100px;
  position: relative;
  top: -100px;
}

label{
  font-size: 20px;
  margin-left: 20px;
}

input{
  padding: 10px;
  font-size: larger;
  margin-bottom: 20px;
  background-color: #ECF9FF;
  font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
  text-align: center;
  color: black;
  border-left: none;
  border-right: none;
  border-top: none;
}

select{
  margin-bottom: 10px;
  padding-left: 70px;
  padding-top: 10px;
  padding-bottom: 10px;
  padding-right: 70px;
  font-size: large;
}

</style>


</head>

<body>
<a href="addstudent.html" type="submit" class="btn" style="background-color: transparent; border: none;">
    <img style="height: 50px; margin-left: 20px; margin-top: 20px;" src="PICS/DASHBOARD/sigee.jpg"/>
  </a>

  <div class="test2">
    <?php
// Database Connection
$conn = new mysqli('localhost', 'root', '', 'register_stud_db');
if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
}

// SELECT Query
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

// Display Results
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Student ID</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Middle Initial</th>
                <th>Program</th>
                <th>Year Level</th>
                <th>Email</th>
                <th>Phone Number</th>
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

// Close the database connection
$conn->close();
?>
  </div>


</body>
</html>


