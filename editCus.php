<?php
session_start();
$combined= $_SESSION['combined'];
$getEmail=$combined;
			
				
				
		
			?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="upCus.css">
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


<form action="#" method="POST" enctype="multipart/form-data" name="editCus">


	
			<?php
				$con= mysqli_connect('localhost','root','');
			mysqli_select_db($con, 'helperbd');	
				
			$stmt="select * from customer where email='$combined' or phone='$combined'";
			$res=mysqli_query($con,$stmt);
	
			$count=mysqli_num_rows($res);
	
				while($row = mysqli_fetch_array($res))
				{
					 $email=$row['email'];
				   $fname=$row['fname'];
                   $lname=$row['lname'];
				   $email=$row['email'];
                   $phone=$row['phone'];
                   $city=$row['city'];
                   $bcn=$row['bcn'];
                   $nid=$row['nidn'];
				   $psp=$row['psp'];
				   
		
				}
			?>
			<div class="cus">
			<div class="right">
			
			<h2 style="color:SlateBlue;">Update Information</h2>
				</div></div>
			
			
			
					<table>
			<tr>
				<td>First name:</td>
				<td><input type="text" name="fname" value="<?php echo $fname;?>"></td>
			</tr>
			
			<tr>
				<td>Last name:</td>
				<td><input type="text" name="lname" value="<?php echo $lname;?>"></td>
			</tr>
			
			
			
			<tr>
				<td>Phone:</td>
				<td><input type="text" name="phone" value="<?php echo $phone;?>"></td>
			</tr>
			
			<tr>
				<td>City:</td>
				<td><input type="text" name="city" value="<?php echo $city;?>"></td>
			</tr>
			
			
			<tr>
				<td>Current Password</td>
				<td><input type="password" name="ctpassword" value="" ></td>
			</tr>
			
			
			
			
			<tr>
				<td></td>
				<td><input type="submit"  name="confirm" value="CONFIRM" style="color: green" class="btn btn-info btn-block"></td>
			</tr>
		</table>
		</form>
	</div>
	</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>	
	</form>
</body>
</html>


<?php
	$con= mysqli_connect('localhost','root','');
	mysqli_select_db($con, 'helperbd');
	
	if(isset($_POST['confirm']))
	{
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$phone=$_POST['phone'];
		$city=$_POST['city'];
		
		$ctpassword=$_POST['ctpassword'];
		
		
		
		
		if($ctpassword == ""){echo '<script type="text/javascript">Swal.fire({
					icon: "info",
					title: "Oops...",
					text: "Please, enter Current Password!",
					})
				</script>';}
				
				
				else
				{
					$stmt="select password from `customer` where `email`='$getEmail' ";
				$res=mysqli_query($con,$stmt);
	
				while($row = mysqli_fetch_array($res))
			
			if($ctpassword==$row["password"]){
				
				
				
				$stmt="UPDATE `customer` SET `fname`='$fname',`lname`='$lname',`phone`='$phone',`city`='$city' WHERE `email`='$email'";
				
				
				$query_run= mysqli_query($con,$stmt);
		
		if($query_run)
		{
			echo '<script type="text/javascript">Swal.fire({
						icon: "success",
						title: "Data Updated!",
						showConfirmButton: false,
						timer: 1500
						})
					</script>';
		}
		else{
			echo '<script type="text/javascript">Swal.fire({
					icon: "error",
					title: "Oops...",
					text: "Data Failed!",
					})
				</script>';
		}	
		}
		else{
			echo '<script type="text/javascript">Swal.fire({
					icon: "error",
					title: "Oops...",
					text: "Current password does not match!",
					})
				</script>';
		}
					
					
					
				}
		
	}
	
	
?>


				
