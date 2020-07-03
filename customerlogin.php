<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" href="loginnstyle.css" />
</head>
<body>

	<div class="header">
		
			<div class="title">
			<span style="margin-left: 600px;">HelperBD</span>
			</div>
		
	</div>
	
	<div class="login">		
		<div class="right">
			<div class="top">
				Login as Customer
			</div>
		
			<div class="middle">
				<form action="customerval.php" method="POST" name="login">
		<table>
			
			<tr>
				<td><input type="text" name="combined" placeholder="Email or Phone Number"></td>
			</tr>
			
			<tr>
				<td><input type="password" name="password" placeholder="Password"></td>
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
				<td>Don't have account?<a href="registration.php" style="text-decoration: none;"> Sign up</td>
			</tr>
			
			</table>
			</div>
		
		</div>
	</div>