<?php 
//Connect to The DAtabase

$connection = mysqli_connect("localhost","root","","helperbd");
if (!$connection) {
	die("database Connection failed ".mysqli_error($connection));

}
?>
<?php 
if (isset($_POST['bill'])) {
	$current_date=date("Y/m/d/");
	$ID_bill=$_POST['fname_bill'];
	$amount=mysqli_real_escape_string($connection,$_POST['amount']);
	$item_per_employee_price_query = "SELECT cost FROM employee WHERE ID = $ID_bill ";
	$item_per_employee_price_query_result = mysqli_query($connection,$item_per_employee_price_query);
	while ($row = mysqli_fetch_assoc($item_per_employee_price_query_result)) {
	  	$item_per_price=$row['cost'];
	  }
	  if (empty($amount)) {
	  	header("Location: create_bill.php");
	  }else{

	  	 $item_total_price = $item_per_price*$amount;
	 $sell_query = "INSERT INTO sell(sell_item_id,sell_total_price,sell_date) ";
	 $sell_query .= "VALUES({$ID_bill},{$item_total_price},'{$current_date}') ";
	 $sell_query_result = mysqli_query($connection,$sell_query);
	 if (!$sell_query_result) {
		die("$sell_query_result failed ".mysqli_error($connection));
	}
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
				  
				  <a href="create_bill.php">Create bill</a>
				  <a href="view_todays_bill.php">Todays Bill</a>
				  <a href="settings.php">Settings</a>
				  <a href="chat.php">Chat</a>
				  <a href="adminhome.php">Home</a>
				  <a href="loginn.php">log out</a>
				</div>
			</div>
			<div class="col-md-4 offset-md-1">
				
					<h2 class="text-center mt-4"><h1 style="color:SlateBlue;">Create Bill</h2>
					<form action="create_bill.php" method="post">
					<div class="form-group">
						<label style="color: black; font-size: 25px;" for="">Select Employee</label>
						<select name="fname_bill" id="" class="form-control">
							<?php 
						 $item_view_query = "SELECT * FROM employee ";
					  $item_view_query_result = mysqli_query($connection,$item_view_query);
					  while ($row = mysqli_fetch_assoc($item_view_query_result)) {
					  	$item_id=$row['ID'];
					  	$item_name=$row['fname'];
					  	?>
					  	<option value="<?php echo $item_id; ?>"><?php echo $item_name; ?></option>

					<?php  }
					  	?>

							
						</select>
					</div>
					<div class="form-group">
						<label style="color: black; font-size: 25px;" for=""> Amount</label>
						<input type="text" name="amount" class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" name="bill" value="Create Bill" class="btn btn-info btn-block">
					</div>
				</form>

				
			</div>
			<div class="col-md-4">
				
					  <?php 
					  if (isset($_POST['bill'])) { 

					  	if (!empty($amount)) {
					  		
					  	
							
						$item_view_query = "SELECT fname FROM employee where ID = $ID_bill ";
					  $item_view_query_result = mysqli_query($connection,$item_view_query);
					  while ($row = mysqli_fetch_assoc($item_view_query_result)) {
					  	$item_name=$row['fname'];
					  	?>
					  	<h2 class="text-center mt-4">View Current bill</h2>
						<table>
						  <tr>
						    <th>Employee Name</th>
						    <th>Employee Amount</th>
						    <th>Total Price</th>
						  </tr>

						 <tr>
						    <td><?php echo $item_name; ?></td>
						    <td><?php echo $amount; ?></td> 
						    <td><?php echo $item_total_price; ?></td> 
					  	</tr>
					  	</table>
					  	
					 <?php }

					   ?>
					


					  	
					 <?php } } ?>
					  
			</div>
		</div>
	</div>
</body>
</html>