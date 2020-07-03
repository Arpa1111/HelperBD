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
	<link rel="stylesheet" href="cngstyle.css">

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
			</div>
			</div>


<form action="#" method="POST" enctype="multipart/form-data" name="editCus">


	
			<?php
				$con= mysqli_connect('localhost','root','');
			mysqli_select_db($con, 'helperbd');	
				
			$stmt="select * from admin where email='$combined' or phone='$combined'";
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
			
			<h1 style="color:SlateBlue;">Change All Information</h1>
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
				<td>New Password</td>
				<td><input type="password" name="password" value="" ></td>
			</tr>
			
			
			
			
			<tr>
				<td></td>
				<td><input type="submit"  name="confirm" value="CONFIRM" style="color: #000099" class="btn btn-info btn-block"></td>
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
		$password=$_POST['password'];
		
		$ctpassword=$_POST['ctpassword'];
		
		
		
		
		if($ctpassword == ""){echo '<script type="text/javascript">Swal.fire({
					icon: "info",
					title: "Oops...",
					text: "Please, enter Current Password!",
					})
				</script>';}
				
				
				else
				{
					$stmt="select password from `admin` where `email`='$getEmail' ";
				$res=mysqli_query($con,$stmt);
	
				while($row = mysqli_fetch_array($res))
			
			if($ctpassword==$row["password"]){
				
				
				
				$stmt="UPDATE `admin` SET `fname`='$fname',`lname`='$lname',`phone`='$phone',`password`='$password',`city`='$city' WHERE `email`='$email'";
				
				
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


				
