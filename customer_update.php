<?php 
//Connect to The DAtabase

$connection = mysqli_connect("localhost","root","","foods");
if (!$connection) {
	die("database Connection failed ".mysqli_error($connection));

}
?>
<?php 
if (isset($_POST['create_item'])) {
	$item_name=mysqli_real_escape_string($connection,$_POST['item_name']);
	$item_per_price=mysqli_real_escape_string($connection,$_POST['price']);

if (!empty($item_name) && !empty($item_per_price)) {
	$item_create_query = "INSERT INTO item(item_name,item_per_price) ";
	$item_create_query .= "VALUES('{$item_name}','{$item_per_price}') ";
	$item_create_query_result = mysqli_query($connection,$item_create_query);
	if (!$item_create_query_result) {
		die("$item_create_query_result failed ".mysqli_error($connection));
	}else{
		header("Location: create_item.php");
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
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="sidenav">
                  <a href="update_customer.php">Update Customer</a>
				  <a href="adminprofile.php">Profile</a>
				  <a href="create_bill.php">Create bill</a>
				  <a href="view_todays_bill.php">Todays Bill</a>
				  <a href="settings.php">Settings</a>
				  <a href="loginn.php">log out</a>
				</div>
			</div>
			<div class="col-md-4 offset-md-1">
				
					<h2 class="text-center mt-4">Create Item</h2>
					<form action="create_item.php" method="post">
					<div class="form-group">
						<label style="color: black; font-size: 25px;" for="">Item Name</label>
						<input type="text" name="item_name" class="form-control">
					</div>
					<div class="form-group">
						<label style="color: black; font-size: 25px;" for="">Price Per Item</label>
						<input type="text" name="price" class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" name="create_item" value="Create Item" class="btn btn-info btn-block">
					</div>
					
				</form>

				
			</div>
		</div>
	</div>
</body>
</html>