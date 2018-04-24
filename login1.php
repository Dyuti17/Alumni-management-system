<?php
session_start();//session starts here

?>
<html>
<body background="back2.jpg">
  <link rel="stylesheet" href="registration.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1 style="color:white">Login</h1>
    <form class="form" action="login1.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"></div>
    <input type="text" placeholder="Username..."  name="loginname" required="true"></p>
    <input type="password" placeholder="Password" name="pwd" required="true"></p><br>
      <input type="submit" value="Login" name="log" class="btn btn-block btn-primary" />
    </form><br>
    <form class="form" action="registration1.php" method="post" enctype="multipart/form-data" autocomplete="off">
<input type="submit" value="Register" name="reg" class="btn btn-block btn-primary" />
</form>
  </div>
</div>
</body>
</html>
<?php
$con = mysqli_connect("localhost:3306","root","c13gr62867");
mysqli_select_db($con,"alumni");

if(isset($_POST['log']))
{
  $loginname=$_POST['loginname'];
  $pwd=$_POST['pwd'];

 $val1 =mysqli_query($con,"select * from alumni_personalinfo where loginname='$loginname'");


if(mysqli_num_rows($val1)>0)

 {
   echo"<script>alert('Successfully Logged In!');</script>";
   echo "<script>setTimeout(\"location.href = 'homepage.php';\",500);</script>";
    $row = mysqli_fetch_array($val1);
    $_SESSION['usn'] =$row['usn'];
     $_SESSION['loginname']=$loginname;

   }

else{

   echo"<script>alert('Wrong username or password');</script>";
   echo "<script>setTimeout(\"location.href = 'login1.php';\",500);</script>";
 }
}
if(isset($_POST['reg']))
{
  header("Location:registration1.php");
}

?>
