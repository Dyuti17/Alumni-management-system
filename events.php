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
$sql ="select * from events";
$query = mysqli_query($conn, $sql);
?>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Alumni Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
.navbar {
    margin-bottom: 0;
    background-color: #f4511e;
    z-index: 9999;
    border: 0;
    font-size: 12px !important;
    line-height: 1.42857143 !important;
    letter-spacing: 4px;
    border-radius: 0;
}

.navbar li a, .navbar .navbar-brand {
    color: #fff !important;
}

.navbar-nav li a:hover, .navbar-nav li.active a {
    color: #f4511e !important;
    background-color: #fff !important;
}

.navbar-default .navbar-toggle {
    border-color: transparent;
    color: #fff !important;
}

  .jumbotron-billboard .img {
    margin-bottom: 0px;
    opacity: 0.2;
    color: #fff;
    background: #000 url("alumni1.jpg") center center;
    width: 100%;
    height: 100%;
    background-size: cover;
    overflow: hidden;
    position:absolute;
    top:0;left:0;
    z-index:1;
}
.jumbotron {position:relative;padding:50px;}
.jumbotron .container {z-index:2;
 position:relative;
  z-index:2;
}

  .bg-grey {
      background-color: #f6f6f6;
  }
  .bg-orange{
    background-color:  #f4511e;
  }
  .container-fluid {
      padding: 60px 50px;
  }
.carousel-control.right, .carousel-control.left {
    background-image: none;
    color: #f4511e;
}

.carousel-indicators li {
    border-color: #f4511e;
}

.carousel-indicators li.active {
    background-color: #f4511e;
}

.item h4 {
    font-size: 19px;
    line-height: 1.375em;
    font-weight: 400;
    font-style: italic;
    margin: 70px 0;
}

.item span {
    font-style: normal;
}
footer .glyphicon {
    font-size: 20px;
    margin-bottom: 20px;
    color: #f4511e;
}
select,
textarea,
input[type="text"]
{
  height:30px;
  width:100%;;
  display: inline-block;
  vertical-align: middle;
  height: 34px;
  padding: 0 10px;
  margin-top: 3px;
  margin-bottom: 10px;
  font-size: 15px;
  line-height: 20px;
  border: 1px solid rgba(255, 255, 255, 0.3);
  background-color: #f7f9f9;
  color: #000000;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  border-radius: 2px;
}

input[type=submit] {
    width: 15%;
    background-color: #f4511e;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #f4511e;
}
.viewfunc {
    border-radius: 5px;
    background-color: #fff;
    padding: 20px;
    align:center;
}
li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #380e0e;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    colour:black;
}

.dropdown-content a {
    color: #380e0e;
    padding: 12px 16px;
    text-decoration: none;
    text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}
.modalDialog {
    position: fixed;
    font-family: Arial, Helvetica, sans-serif;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.8);
    z-index: 99999;
    opacity:0;
    -webkit-transition: opacity 400ms ease-in;
    -moz-transition: opacity 400ms ease-in;
    transition: opacity 400ms ease-in;
    pointer-events: none;
}
.modalDialog:target {
    opacity:1;
    pointer-events: auto;
}
.modalDialog > div {
    width: 600px;
    position: relative;
    margin: 10% auto;
    padding: 5px 20px 13px 20px;
    border-radius: 10px;
    background: #fff;
    background: -moz-linear-gradient(#fff, #999);
    background: -webkit-linear-gradient(#fff, #999);
    background: -o-linear-gradient(#fff, #999);
}
.close {
    background: #606061;
    color: #FFFFFF;
    line-height: 25px;
    position: absolute;
    right: -12px;
    text-align: center;
    top: -10px;
    width: 24px;
    text-decoration: none;
    font-weight: bold;
    -webkit-border-radius: 12px;
    -moz-border-radius: 12px;
    border-radius: 12px;
    -moz-box-shadow: 1px 1px 3px #000;
    -webkit-box-shadow: 1px 1px 3px #000;
    box-shadow: 1px 1px 3px #000;
}
.close:hover {
    background: #00d9ff;
}
.yesbtn {
    background-color: #f4511e; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
}
.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 30%;
  position: relative;
  transition: all 5s ease-in-out;
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
  position: absolute;
  top: 0px;
  right: 0px;
  transition: all 200ms;
  font-size: 20px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color: #06D85F;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
}

@media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
  }
  .textbox:focus {
    border: 3px solid #555;
}
}
.btn {
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
  margin: 3px 0;
  padding: 6px 20px;
  font-size: 15px;
  line-height: 20px;
  height: 34px;
  background-color: rgba(0, 0, 0, 0.15);
  color: #00aeff;
  border: 1px solid rgba(255, 255, 255, 0.15);
  box-shadow: 0 0 rgba(0, 0, 0, 0);
  border-radius: 2px;
  -webkit-transition: background-color 0.2s, box-shadow 0.2s, background-color 0.2s, border-color 0.2s, color 0.2s;
  transition: background-color 0.2s, box-shadow 0.2s, background-color 0.2s, border-color 0.2s, color 0.2s;
  width:40%;
}
body {
font-size: 15px;
color: #343d44;
font-family: "segoe-ui", "open-sans", tahoma, arial;
padding: 0;
margin: 0;
}
table {
margin: auto;
font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
font-size: 12px;
}

h1 {
margin: 25px auto 0;
text-align: center;
text-transform: uppercase;
font-size: 17px;
}

table td {
transition: all .5s;
}

/* Table */
.data-table {
border-collapse: collapse;
font-size: 14px;
min-width: 537px;
}

.data-table th,
.data-table td {
border: 1px solid #e1edff;
padding: 7px 17px;
}
.data-table caption {
margin: 7px;
}

/* Table Header */
.data-table thead th {
background-color: #f4511e;
color: #FFFFFF;
border-color: #000000 !important;
text-transform: uppercase;
}

/* Table Body */
.data-table tbody td {
color: #353535;
}
.data-table tbody td:first-child,
.data-table tbody td:nth-child(4),
.data-table tbody td:last-child {
text-align: right;
}

.data-table tbody tr:nth-child(odd) td {
background-color: #f4fbff;
}
.data-table tbody tr:hover td {
background-color: #ffffa2;
border-color: #000000;
}

/* Table Footer */
.data-table tfoot th {
background-color: #f4511e;
text-align: right;
}
.data-table tfoot th:first-child {
text-align: left;
}
.data-table tbody td:empty
{
background-color: #ffcccc;
}
.modalbg {
	position: fixed;
	font-family: Arial, Helvetica, sans-serif;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	background: rgba(0,0,0,0);
	z-index: 99999;
	.transition(2s);
  .transition-delay(.2s);
	display: block;
	pointer-events: none;
  .dialog {
    width: 400px;
    position: relative;
    top: -1000px;
    margin: 10% auto;
    padding: 5px 20px 13px 20px;
    .border-radius(10px);
    .gradient;
    .box-shadow;
  }
}

.modalbg:target {
	display: block;
	pointer-events: auto;
  background: rgba(4, 10 ,30, .8);
  .transition();
  .dialog {
    top: -20px;
    .transition(.8s);
    .transition-delay;
  }
}



.close {
	background: #606061;
	color: #FFFFFF;
	line-height: 25px;
	position: absolute;
	right: -12px;
	text-align: center;
	top: -10px;
	width: 24px;
	text-decoration: none;
	font-weight: bold;
	-webkit-border-radius: 12px;
	-moz-border-radius: 12px;
	border-radius: 12px;
  .box-shadow;
  .transition;
  .transition-delay(.2s);
  &:hover { background: #00d9ff; .transition; }
}

.fineprint {
  font-style: italic;
  font-size: 10px;
  color: #646;
}
a { color: #333; text-decoration: none; }

  </style>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">RNSIT</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-left">
        <li><a href="homepage.php">Home</a></li>
        <li><a href="#viewmodal">View</a></li>

        <div id="viewmodal" class="modalDialog">
    <div>	<a href="#close" title="Close" class="close">X</a>
      <form method="POST" action="get.php" align="center">
<label for="joinyear">JOIN YEAR</label>
&emsp;&emsp;&emsp;&emsp;<input type="number" id="joinyear" name="joinyear" placeholder="When did you join us?..">
<br><br>
<label for="passoutyear">PASSOUT YEAR</label>
&emsp;<input type="number" id="passoutyear" name="passoutyear" placeholder="Whwn did you leave us?..">
<br>
<input type="submit" value="submit">
</form>
    </div>
</div>

        <li><a href="#Events.html">Events</a></li>
        <li><a href="achview.php">Achievements</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profile.php">Me</a></li>
        <li class="dropdown">
        <a href="javascript:void(0)" class="dropbtn">Options</a>
        <div class="dropdown-content">
        <a href="logout.php">Logout</a>
        <a href="#deletemodal">Delete account</a>

        <div id="deletemodal" class="modalDialog">
    <div>	<a href="#close" title="Close" class="close">X</a>
        	<h4>Are you sure you want to delete your account?</h4>
          <form action="delete.php" method="post" enctype="multipart/form-data" autocomplete="off" align="center">
          <input type=submit name="yes">
        </form>
    </div>
</div>
  </li>
      </ul>
    </div>
</nav>
<form id="login" action='login.php' method='POST'>
<h1>Table 1</h1>
<table class="data-table">
	<caption class="title">List of Events</caption>
	<thead>
		<tr>
      <th>Added By</th>
			<th>Event ID</th>
			<th>Event Name</th>
			<th>Time</th>
      <th>Venue</th>
      <th>Event Date</th>
      <th>Daysleft</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$no 	= 1;
	while ($row = mysqli_fetch_array($query))
	{
		echo '<tr>
        <td>'.$row['usn'].'</td>
				<td>'.$row['eventid'].'</td>
        <td>'.$row['eventname'].'</td>
        <td>'.$row['eventtime'].'</td>
        <td>'.$row['venue'].'</td>
        <td>'.$row['eventdate'].'</td>
        <td>'.$row['daysleft'].'</td>
			</tr>';
		$no++;
	}?>
	</tbody>
</table>
</form>
<form action="addevent.php" method="post" enctype="multipart/form-data" autocomplete="off" align="center" class="textbox">
<input type="submit" value="Add an event" name="update" class="btn">
</form>
