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
	<link rel="stylesheet" href="searchEmp.css">
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
<form action="#" method="POST" enctype="multipart/form-data" name="searchEmp">
	
			<div class="cus">
			<div class="right">
			
			<h2 style="color:green;">View Employee Information</h2>
				<div class="search-box">
				<input type="text" name="search" placeholder="type to search">
				
				
				<input type="submit"  name="filter" value="SEARCH" style="color: green" class="btn btn-info btn-block">
					</div>
					</div></div>
					
					

					<table>
					  <tr>
					    <th><div align="left">First Name</div></th>
					    
					    <th>Last Name</th>
						<th>Profession</th>
						
						
						<th>City</th>
						<th>Cost</th>
						<th>Hire</th>
						
					  </tr>
					  
					
					
					  <?php 
					  
					  
	                $con= mysqli_connect('localhost','root','');
                	mysqli_select_db($con, 'helperbd');
	
	                 if(isset($_POST['filter'])){
		
		
		                $search=$_POST['search'];
					  
					  
					  $item_view_query = "SELECT * FROM `employee` WHERE profession='$search'";
					  $item_view_query_result = mysqli_query($connection,$item_view_query);
					  while ($row = mysqli_fetch_assoc($item_view_query_result)) {
					  	$email=$row['email'];
					  	$fname=$row['fname'];
					  	$lname=$row['lname'];
						$profession=$row['profession'];
						$phone=$row['phone'];
						$password=$row['password'];
						$city=$row['city'];
					 $cost=$row['cost'];
					 
					  	?>
					  
					   <tr>
						   
						    <td><?php echo $fname; ?></td> 
							<td><?php echo $lname; ?></td>
							<td><?php echo $profession; ?></td>
							
							
							<td><?php echo $city; ?></td>
							<td><?php echo $cost; ?></td>
							<td><a href="hireEmp.php">hire</a></td>
						     
					  	</tr>
					  	
					 <?php }}

					   ?>
					</table>
		
	</form>
</body>
</html>