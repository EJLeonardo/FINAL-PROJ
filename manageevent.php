<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

body {
  margin: 0;
  padding: 0;
  background: url("PICS/MANAGEEVENT/background.jpg") no-repeat center center fixed;
  background-size: cover;
}

.test2{
  border: none;
  border-radius: 10px;
  padding: 30px;
  max-width: fit-content;
  margin-left: 950px;
  color: white;
}

label{
  font-size: 30px;
}

input{
  padding: 10px;
  margin-bottom: 10px;
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
}

button{
  margin-left: 150px;
  width:100px;
  height: 50px;
}

p {
  font-size: 50px;
}

</style>
</head>
<body>
  <a href="dashboard.html" type="submit" class="btn" style="background-color: transparent; border: none;">
    <img style="height: 50px; margin-left: 20px; margin-top: 20px;" src="PICS/DASHBOARD/sigee.jpg"/>
  </a>

  <div class="test2">
    <form action="registerstud.html">
      <center><p>MANAGE EVENT</p></center>
        <hr>
        <form action="process_selection.php" method="post">
          <label for="eventSelect">Choose an event:</label>
          <select name="event_id" id="eventSelect" required>
            <?php 
            include('get_events.php'); ?>          
          </select>
        <hr>
        <button type="submit" class="registerbtn"><b>Manage</b></button>
    </form>
  </div>

</body>
</html>
