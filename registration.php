<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" href="regstyle.css" />
</head>
<body>

	<div class="reg">		
		<div class="right">
			<div class="top">
				Sign up now
			</div>
		
			<div class="middle">
				<form action="#" method="POST" enctype="multipart/form-data" name="registration">
		<table>
			
			<tr>
				<td><input type="email" name="email" placeholder="Email"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="fname" placeholder="First name">
			
				<input type="text" name="lname" placeholder="Last name"></td>
			</tr>
			
			<tr>
				<td><input type="tel" name="phone" placeholder="Phone number"></td>
			</tr>
			
			<tr>
				<td><input type="password" name="password" placeholder="Create password"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="city" placeholder="City"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="nidn" placeholder="NID Number"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="bcn" placeholder="Birth Certificate Number"></td>
			</tr>
			
			<tr><td>File Upload</td></tr>
			<tr>

				
				<td><input type="file" name="psp" class="fileupload1">
				
				<input type="file" name="nidc" class="fileupload2">
				
				<input type="file" name="bc" class="fileupload3"></td>
			</tr>
			
			<tr>
				<td><input type="submit" name="submit" value="SUBMIT" class="btnsub"></td>
			</tr>
			
			</table>
		
		</form>
			</div>
		
			<div class="footer">
			<table>
			<tr>
				<td>Have already an account?<a href="login.php" style="text-decoration: none;"> Login</td>
			</tr>
			
			</table>
			</div>
		
		</div>
	</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>	
</body>
</html>

<?php
	
	$con= mysqli_connect('localhost','root','');
	mysqli_select_db($con, 'helperbd');
	
	if(isset($_POST['submit']))
	{
	$email=$_POST['email'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$phone=$_POST['phone'];
	$password=$_POST['password'];
	$city=$_POST['city'];
	$bcn=$_POST['bcn'];
	$nidn=$_POST['nidn'];
	
	$psp=$_FILES['psp']['name'];
	$tmp_name=$_FILES['psp']['tmp_name'];
	$path='files/'.$psp;
	move_uploaded_file($tmp_name,$path);

	$nidc=$_FILES['nidc']['name'];
	$tmp_name=$_FILES['nidc']['tmp_name'];
	$path='files/'.$nidc;
	move_uploaded_file($tmp_name,$path);
	
	$bc=$_FILES['bc']['name'];
	$tmp_name=$_FILES['bc']['tmp_name'];
	$path='files/'.$bc;
	move_uploaded_file($tmp_name,$path);
	
	if($email == "" || $fname == "" || $lname == "" || $phone == "" || $password == "" || $city == "" || $bcn == "" || $nidn == "" || $psp == "" || $nidc == "" || $bc == ""){
		echo '<script type="text/javascript">Swal.fire({
					icon: "info",
					title: "Oops...",
					text: "Please, provide all information!",
					})
				</script>';
	}
	
	else{
		
		$stmt="select * from admin where email='$email'";
		$res=mysqli_query($con,$stmt);
		$num=mysqli_num_rows($res);
	
		if($num == 1){
		echo '<script type="text/javascript">Swal.fire({
					icon: "info",
					title: "Oops...",
					text: "Email already taken!",
					})
				</script>';
		}
		else{
		
		$stmt="select * from customer where email='$email'";
		$res=mysqli_query($con,$stmt);
		$num=mysqli_num_rows($res);
	
		if($num == 1){
		echo '<script type="text/javascript">Swal.fire({
					icon: "info",
					title: "Oops...",
					text: "Email already taken!",
					})
				</script>';
		}
		
		else{
		
		$stmt="select * from employee where email='$email'";
		$res=mysqli_query($con,$stmt);
		$num=mysqli_num_rows($res);
	
		if($num == 1){
		echo '<script type="text/javascript">Swal.fire({
					icon: "info",
					title: "Oops...",
					text: "Email already taken!",
					})
				</script>';
		}
		
		
		
		
		
		
		else{
			$hash = password_hash($password, PASSWORD_BCRYPT);
			$reg="insert into customer(email,fname,lname,phone,password,city,bcn,nidn,psp,nidc,bc) values('$email','$fname','$lname','$phone','$hash','$city','$bcn','$nidn','$psp','$nidc','$bc')";
			$run=mysqli_query($con,$reg);
			if($run)
			{
				echo '<script type="text/javascript">Swal.fire({
						icon: "success",
						title: "Registration Successfully!",
						showConfirmButton: false,
						timer: 1500
						})
					</script>';
			}
			else{
				echo '<script type="text/javascript">Swal.fire({
					icon: "error",
					title: "Oops...",
					text: "Registration Unsuccessfull!",
					})
				</script>';
			}
		}
	}
	}
	}
	}
?>