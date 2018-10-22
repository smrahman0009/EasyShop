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
	$first_name = $last_name = $email = $password = $confirm_password ="";
	$first_name_er = $last_name_er = $email_er = $password_er = $confirm_password_er="";
	$flag="true";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			  if (empty($_POST["first_name"])) {
			    $first_name_er = "First name is required";  
			    $flag="false";
			  } else {
			  		if (preg_match("/^[A-Z][a-zA-Z ]+$/",$_POST["first_name"]) === 0) {
			  			$first_name_er = "Muust start with uppercase letter and only contain letter and dashes";
			  			$flag="false";
			  		}else{
			  			
			  		}
			  }

			  if (empty($_POST["last_name"])) {
			    $last_name_er = "Last name is required";
			    $flag="false";
			  } else {
			  		if (preg_match("/^[a-zA-Z ]+$/",$_POST["last_name"]) === 0) {
			  			$last_name_er = "Only contain letter and dashes";
			  			$flag="false";
			  		}else{
			  			//$name = test_input($_POST["name"]);
			  		}
			  }

			  if (empty($_POST["email"])) {
			    $email_er = "Email is required";
			    $flag="false";
			  } else {
			   	/*
				   	if ((preg_match("/^[a-zA-Z]w+(.w+)*@w+(.[0-9a-zA-Z]+)*.[a-zA-Z]{2,4}$/", $_POST["email"]) === 0) {
				   		$email_er = "Email must be in valid form";
				   		 $flag="false";
				   	}
			   	*/
			  }

			  if (empty($_POST["password"])) {
			    $password_er = "Password is required";
			    $flag="false";
			  } else {
			   		if (preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/",$_POST["password"]) == 0) {
			  			$password_er = "Muust be in valid form";
			  			$flag="false";
			  		}else{
			  		//	$name = test_input($_POST["name"]);
			  		}
			  }
			  
			  if (empty($_POST["confirm_password"])) {
			    $confirm_password_er = "Confirm password is required";
			    $flag="false";
			  } else {
			   	if ($_POST["password"] != $_POST["confirm_password"]) {
			   		$confirm_password_er = "Password won't match!!";
			   		 $flag="false";
			   	}
			  }
			 if ($flag == "true") {
			 	header("Location: raf.php"); /* Redirect browser */
			 	exit();
			  //	include("raf.php");
			  } 
			  else echo "Wrong";
	}

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
	<!-- ============ LEFT COLUMN (MENU) ============== -->
	<td width="20%" valign="top" bgcolor="#f5f5f5">
		<h3>Catagory</h3>
		<ul style="list-style: none;">
			
			<li><a href="#">Mens Wear</a> </li>
			<li><a href="#">Womens Wear</a></li>
			<li><a href="#">Kids</a> </li>
			<li><a href="#">Gadgets</a></li>
		</ul>
	</td>

	<!-- ============ MIDDLE COLUMN (CONTENT) ============== -->
	<td width="55%" valign="top" bgcolor="#d2d8c7">
		<form method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
			<table align="center">
				<tr>
					<td>
						<span class="error">* required field</span>
					</td>
				</tr>
				<tr >
					<td>
						<p>Personal Information</p>
						<hr>
						<p>First Name</p>
						<input type="text" name="first_name">
						<span class="error">* <?php echo $first_name_er; ?></span>
					</td>
				</tr>

				<tr>
					<td>
						<p>Last Name</p>
						<input type="text" name="last_name">
						<span class="error">* <?php echo $last_name_er; ?></span>
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
						<input type="email" name="email">
						<span class="error">* <?php echo $email_er; ?> </span>
					</td>
				</tr>
				<tr>
					<td>
						<p>
							Password
						</p>
						<input type="Password" name="password">
						<span class="error">* <?php echo $password_er; ?></span>
					</td>
				</tr>
				<tr>
					<td>
						<p>
							Confirm Password
						</p>
						<input type="Password" name="confirm_password">
						<span class="error">* <?php echo $confirm_password_er; ?></span>
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="submit_button" value="Create an Account">
					</td>
				</tr>
			</table>
		</form>
	</td>

	<!-- ============ RIGHT COLUMN (CONTENT) ============== -->
	<td width="25%" valign="top" bgcolor="#f5f5f5">&nbsp;</td>

</tr>

<!-- ============ FOOTER SECTION ============== -->
<tr><td colspan="3" align="center" height="20" bgcolor="#599a68">Copyright ©</td></tr>
</table>
</body>

<html>


