<html>
<body>
<body background="back2.jpg">
  <link rel="stylesheet" href="registration.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1 style="color:white">New User Registration</h1>
    <form class="form" action="reg.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"></div>
      <input type="text" placeholder="First name..."   name="fname" required="true"></p>
    <input type="text" placeholder="Last name..."  name="lname"></p>
    <input type="text" placeholder="Username..."  name="loginname" required="true"></p>
    <input type="password" placeholder="Password" name="pwd" required="true"></p>
    <input type="text" placeholder="sex" name="sex" required="true">
    <input type="date" placeholder="Date Of Birth" name="dob"  required="true"></p>
    <input type="email" placeholder="E-mail" name="email"  required="true"></p>
    <input type="number" placeholder="Phone" name="phno"  required="true"></p>
    <input type="text" placeholder="Address" name="address" required="true"></p>
    <input type="text" placeholder="USN" name="usn" required="true"></p>
    <input type="number" placeholder="When did you Join us?" name="joinyear" required="true"></p>
    <input type="number" placeholder="When did you leave us?" name="passoutyear" required="true"></p>
    <input type="text" placeholder="Profession" name="profession" required="true"></p>
      <input type="submit" value="Register" name="reg" class="btn btn-block btn-primary" />
    </form>
    <form class="form" action="login1.php" method="post" enctype="multipart/form-data" autocomplete="off">
<input type="submit" value="Back to Login" name="login" class="btn btn-block btn-primary" />
</form>
  </div>
</div>
</body>
</html>
