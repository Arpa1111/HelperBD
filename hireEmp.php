<?php
session_start();
$combined = $_SESSION['combined'];
?>


<?php 
//Connect to The Database

$connection = mysqli_connect("localhost","root","","helperbd");
if (!$connection) {
	die("database Connection failed ".mysqli_error($connection));

}
?>


<!DOCTYPE HTML>


	
	
	
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="viewEmp.css">
</head>


<body>


	<div class="container">
		<div class="row">
			<div class="col-md-3">
				
				<div class="sidenav">
				<a href="customer.php">Profile</a>
				<a href="editCus.php">Edit Profile</a>
				  <a href="hireEmp.php">Service Provider</a>
				  <a href="searchEmp.php">Search</a>
				  <a href="login.php">log out</a>
				</div>
			
			</div>
			
			</div>
			</div>
			
			<div class="top">
		<div class="left">
			Service Provider:<a href="nurse.php">Nurse</a><br>
			
		</div>
		<div class="right">
		
		
			Service Provider:<a href="cook.php">COOK</a><br><br>
			
		</div>
		</div>
	<div class="bottom">
			Service Provider:<a href="driver.php">Driver</a><br><br>
			
		</div>
		<div class="bottom">
			Service Provider:<a href="electrician.php">Electrician</a><br><br>
			
		</div>
			<div class="boll">
			<a href="searchEmp.php">other service provider?</a><br>
			
		</div>
				
				
			
</body>
</html>