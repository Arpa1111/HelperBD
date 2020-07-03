<?php 
//Connect to The DAtabase

$connection = mysqli_connect("localhost","root","","helperbd");
if (!$connection) {
	die("database Connection failed ".mysqli_error($connection));

}
?>
<?php 
if (isset($_POST['create_employee_rate'])) {
	$customer_name="SELECT item.item_id, employee.fname, item.item_per_cost FROM item INNER JOIN employee ON item.ID=employee.ID";
	$ID=mysqli_real_escape_string($connection,$_POST['customer_name']);
	
	$item_per_cost=mysqli_real_escape_string($connection,$_POST['cost']);

if (!empty($ID) && !empty($item_per_cost)) {
	$item_create_query = "INSERT INTO item(ID,item_per_cost) ";
	$item_create_query .= "VALUES('{$ID}','{$item_per_cost}') ";
	$item_create_query_result = mysqli_query($connection,$item_create_query);
	if (!$item_create_query_result) {
		die("$item_create_query_result failed ".mysqli_error($connection));
	}else{
		header("Location: create_employee_rate.php");
	}
	
}else{
	 echo "<h4 style='color: green' class='text-center mt-4'>Please Fill All the Box</h4>";
}
	

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
				  <a href="create_employee_rate.php"> Employee Rate</a>
				  <a href="create_bill.php">Create bill</a>
				  <a href="view_todays_bill.php">Todays Bill</a>
				  <a href="settings.php">Settings</a>
				   <a href="chat.php">Chat</a>
				  <a href="adminhome.php">Home</a>
				  <a href="loginn.php">log out</a>
				  
				</div>
			</div>
			<div class="col-md-4 offset-md-1">
				
					<h2 class="text-center mt-4">Create Employee Rate</h2>
					<form action="create_employee_rate.php" method="post">
					<div class="form-group">
						<label style="color: black; font-size: 25px;" for="">Employee Name</label>
						<input type="text" name="ID" class="form-control">
					</div>
					<div class="form-group">
						<label style="color: black; font-size: 25px;" for="">Price Per Employee</label>
						<input type="text" name="cost" class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" name="create_employee_rate" value="Create Employee Rate" class="btn btn-info btn-block">
					</div>
					
				</form>

				
			</div>
		</div>
	</div>
</body>
</html>