<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>

<title>WEB PAGE TITLE GOES HERE</title>
<style>
	.error {
		color: #FF0000;
	}
</style>

</head>

<body style="margin: 0px; padding: 0px; font-family: 'Trebuchet MS',verdana;">

<?php
	session_start();
	$first_name = $_SESSION["first_name"];
	$last_name = $_SESSION["last_name"];
	$email = $_SESSION["email"];
	$password = $_SESSION["password"];
?>

<table width="100%" style="height: 100%;" cellpadding="10" cellspacing="0" border="0">
<tr>
	<!-- ============ HEADER SECTION ============== -->
	<td colspan="3" style="height: 100px;" bgcolor="green">
		<h1>Website Logo</h1>
		<h1 align="center" style="color: orange;"> EASY SHOP</h1>
	</td>
</tr>


<!-- ============ NAVIGATION BAR SECTION ============== -->
<tr>
	<td colspan="3" valign="middle" height="30" bgcolor=" #6ab47b">
		<table  width="100%">
			<tr style="color: orange" align="center">
				<td>
					<a href="admin.php">
						<input type="button" name="admin_button" value="ADMIN">
					</a>
				</td>
				<td width="100%" align="LEFT">
					<a href="index.php">
						<input type="button" name="home_button" value="HOME">
					</a>
				</td>
				<td>
					<a href="signin.php">
						<input type="button" name="sign_in_button" value="sign in">
					</a>
				</td>
				<td>
					<a href="login.php">
							<input type="button" name="log_in_button" value="log in">
					</a>
				</td>
			</tr>
	
		</table>
		
	</td>
</tr>

<tr>
	
	<!-- ============ MIDDLE COLUMN (CONTENT) ============== -->
	<!-- action="<?php $_SERVER["PHP_SELF"] ?>" -->
	<td width="55%" valign="top" bgcolor="#d2d8c7">
		<table align="center">
				<tr >
					<td>
						<p>Personal Information</p>
						<hr>
						<p>First Name</p>
						<input type="text" name="first_name" value="<?php echo $first_name; ?>">
					</td>
				</tr>

				<tr>
					<td>
						<p>Last Name</p>
						<input type="text" name="last_name" value="<?php echo $last_name;?>">
					</td>
				</tr>
				
				<tr>
					<td>
						<p>
							Sign-in Information
						</p>
						<hr>
						<p>
							Email*
						</p>
						<input type="email" name="email" value="<?php echo $email;?>">
					</td>
				</tr>
				<tr>
					<td>
						<p>
							Password
						</p>
						<input type="Password" name="password" value="<?php echo $password;?>">
					</td>
				</tr>
			</table>
	</td>

</tr>

<!-- ============ FOOTER SECTION ============== -->
<tr><td colspan="3" align="center" height="20" bgcolor="#599a68">Copyright ©</td></tr>
</table>
</body>

<html>


