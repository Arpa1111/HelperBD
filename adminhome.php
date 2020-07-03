<?php
session_start();
$combined = $_SESSION['combined'];
?>


<?php 
//Connect to The DAtabase

$connection = mysqli_connect("localhost","root","","helperbd");
if (!$connection) {
	die("database Connection failed ".mysqli_error($connection));

}
?>

	
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="adminhomestyle.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="sidenav">
				  <a href="update_customer.php">Service Provider</a>
				  <a href="adminprofile.php">Profile</a>
				  
				  <a href="create_bill.php">Create bill</a>
				  <a href="view_todays_bill.php">Todays Bill</a>
				  <a href="settings.php">Settings</a>
				   <a href="chat.php">Chat</a>
				  <a href="loginn.php">log out</a>
				</div>
				</div>
			
				<div class="col-md-6 offset-md-1">
				
				
					<h2 class="text-center mt-4" style="color:SlateBlue;"> Welcome </h2>
					<?php
	
				$con= mysqli_connect('localhost','root','');
			mysqli_select_db($con, 'helperbd');	
				
			$stmt="select * from admin where email='$combined' or phone='$combined'";
			$res=mysqli_query($con,$stmt);
	
			$count=mysqli_num_rows($res);
	
				while($row = mysqli_fetch_array($res))
				{
					echo "<h2 style='color: SlateBlue;'>".$row["fname"]."</h2>";
				}
			?>
				
					
					<h2 class="text-center mt-4" style="color:SlateBlue;"> To your portal </h2>
					
					
								
								

			</div>

		</div>
	</div>
</body>
</html>