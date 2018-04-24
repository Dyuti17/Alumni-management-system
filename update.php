<?php
        session_start();
        $usn=$_SESSION['usn'];
        $fname=$_POST['ufname'];
        $lname=$_POST['ulname'];
        $loginname=$_POST['uloginname'];
        $pwd=$_POST['upwd'];
        $phno=$_POST['uphno'];
        $address=$_POST['uaddress'];
        $email=$_POST['uemail'];
        $profession=$_POST['uprofession'];

        $con = mysqli_connect("localhost:3306","root","c13gr62867");
        mysqli_select_db($con,"alumni");
        //select query for viewing users.
        if(isset($_POST['update']))
{        $r1=mysqli_query($con,"update alumni_personalinfo set fname='$fname',lname='$lname',loginname='$loginname',pwd='$pwd',phno=$phno,address='$address',email='$email' where usn='$usn';");
         $r2=mysqli_query($con,"update alumni_academicinfo set profession='$profession' where usn='$usn';");
         header("Location:login1.php");

}
?>
