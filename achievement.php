<?php
session_start();
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
if(isset($_POST['submit']))
{
$achievement=$_POST['achievement'];
$usn=$_SESSION['usn'];
 $value="insert into achievements(usn,achievements) values('$usn','$achievement');";
 mysqli_query($conn,$value);
 header("Location:achview.php");
 }
 else {
   echo "";
 }
 ?>
