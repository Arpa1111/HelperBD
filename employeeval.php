<!DOCTYPE HTML>
<html>
<head>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
</html>

<?php
	session_start();
	
	$con= mysqli_connect('localhost','root','');
	mysqli_select_db($con, 'helperbd');
	
	$combined=$_POST['combined'];
	$password=$_POST['password'];
	
			
		$stmt="select * from employee where email='$combined' or phone='$combined'";
		$res=mysqli_query($con,$stmt);
		$num=mysqli_num_rows($res);
		$row = mysqli_fetch_array($res);
	
		if($num == 1 && password_verify($password,$row["password"])){
		$_SESSION['combined']= $combined;
		header('location:adminprofile.php');
		}
		else{
		echo '<script type="text/javascript">Swal.fire({
					icon: "info",
					title: "Oops...",
					text: "Please, check information!",
					})
				</script>';
		require("loginn.php");
		}
	
?>