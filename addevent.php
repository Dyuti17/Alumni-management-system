<?php
session_start();//session starts here
if(!$_SESSION['loginname'])
{
    header("Location: login1.php");//redirect to login page to secure the welcome page without login access.
}
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = 'c13gr62867'; // Password
$db_name = 'alumni'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
?>
<html>
<body background="eback.jpg">
  <link rel="stylesheet" href="registration.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1 style="color:white">Add an event</h1>
    <form class="form" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"></div>
    <input type="text" placeholder="Event Name"  name="eventname" required="true"></p>
    <input type="text" placeholder="Event Time" name="eventtime" required="true"></p>
    <input type="text" placeholder="Venue" name="venue" required="true"></p>
    <input type="date" placeholder="Event Date" name="eventdate" required="true"></p>
      <input type="submit" value="ADD" name="add" class="btn btn-block btn-primary" />
    </form><br>
    <form class="form" action="addevent.php" method="post" enctype="multipart/form-data" autocomplete="off">
<input type="submit" value="Cancel" name="cancel" class="btn btn-block btn-primary" />
</form>
  </div>
</div>
</body>
</html>
<?php
if(isset($_POST['add']))
{
  $usn=$_SESSION['usn'];
  $eventname=$_POST['eventname'];
  $eventtime=$_POST['eventtime'];
  $venue=$_POST['venue'];
  $eventdate=$_POST['eventdate'];
  $query="insert into events(usn,eventname,eventtime,venue,eventdate) values('$usn','$eventname','$eventtime','$venue','$eventdate');";
  mysqli_query($conn,$query);
  $val1="call daysremaining();";
  mysqli_query($conn,$val1);
  echo"<script>alert('Successfully added!');</script>";
  echo "<script>setTimeout(\"location.href = 'events.php';\",500);</script>";

}
if(isset($_POST['cancel']))
{
  header("Location:events.php");
}

?>
