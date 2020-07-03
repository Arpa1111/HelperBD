<?php
session_start();
$combined = $_SESSION['combined'];
?>



<!DOCTYPE HTML>
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
				  <a href="update_customer.php">Update Customer</a>
				  <a href="adminprofile.php">Profile</a>
				  <a href="create_bill.php">Create bill</a>
				  <a href="view_todays_bill.php">Todays Bill</a>
				  <a href="settings.php">Settings</a>
				  <a href="loginn.php">log out</a>
				  

				</div>
			</div>
			<div class="col-md-6 offset-md-1">
			


		
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
                   $phone=$row['phone'];
                   $city=$row['city'];
                   $bcn=$row['bcn'];
                   $nid=$row['nidn'];
				   $psp=$row['psp'];
				   
					
					
				}
			?>				
			<table width="398" border="0" align="col-md-6 offset-md-1" cellpadding="0">
  <tr>
    <td height="26" colspan="2">Your Profile Information </td>

	
  </tr>
  <tr>
    <td valign="text-center mt-4"><div align="left">Email: </div></td>
    <td valign="text-center mt-4"><?php echo $email ?></td>
  </tr>
  <tr>
    <td width="50" rowspan="2"><img src="files\<?php echo $psp ?>" width="129" height="129" alt="no image found"/></td>
    <td width="82" valign="text-center mt-4"><div align="left">FirstName:</div></td>
    <td width="100" valign="text-center mt-4"><?php echo $fname ?></td>
  </tr>
  <tr>
    <td valign="text-center mt-4"><div align="left">LastName:</div></td>
    <td valign="text-center mt-4"><?php echo $lname ?></td>
  </tr>
  <tr>
    <td valign="text-center mt-4"><div align="left">Phone:</div></td>
    <td valign="text-center mt-4"><?php echo $phone ?></td>
  </tr>
  <tr>
    <td valign="text-center mt-4"><div align="left">City:</div></td>
    <td valign="text-center mt-4"><?php echo $city ?></td>
  </tr>
  <tr>
    <td valign="text-center mt-4"><div align="left">Birth certificate Number.: </div></td>
    <td valign="text-center mt-4"><?php echo $bcn ?></td>
  </tr>
  <tr>
    <td valign="text-center mt-4"><div align="left">NID No.: </div></td>
    <td valign="text-center mt-4"><?php echo $nid ?></td>
  </tr>
  
</table>	
				
			
		<a href="adminhome.php">Home</a>
		<a href="loginn.php">Logout</a>
		
	
			</div>
		</div>
	</div>		
</body>
</html>