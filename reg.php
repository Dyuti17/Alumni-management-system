<html>
<?php
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$loginname=$_POST['loginname'];
$pwd=$_POST['pwd'];
$dob=$_POST['dob'];
$email=$_POST['email'];
$phno=$_POST['phno'];
$sex=$_POST['sex'];
$address=$_POST['address'];
$usn=$_POST['usn'];
$joinyear=$_POST['joinyear'];
$passoutyear=$_POST['passoutyear'];
$profession=$_POST['profession'];
$con = mysqli_connect("localhost:3306","root","c13gr62867");
mysqli_select_db($con,"alumni");

if(isset($_POST['reg']))
{
$val1 =mysqli_query($con,"select * from alumni_personalinfo where usn='$usn'");

if(mysqli_num_rows($val1)>=1)

 {
   echo"<script>alert('User with loginname already exists!');</script>";
   echo "<script>setTimeout(\"location.href = 'registration1.php';\",500);</script>";

   }

else{
   $query="insert into alumni_personalinfo(fname,lname,dob,sex,phno,address,usn,email,loginname,pwd) values('$fname','$lname','$dob','$sex',$phno,'$address','$usn','$email','$loginname','$pwd');";
   $query1="insert into alumni_academicinfo(usn,joinyear,passoutyear,profession) values('$usn',$joinyear,$passoutyear,'$profession');";
   mysqli_query($con,$query);
   mysqli_query($con,$query1);
   echo"<script>alert('Successfully Registered!');</script>";
   echo "<script>setTimeout(\"location.href = 'login1.php';\",500);</script>";
}
}
?>
</html>
