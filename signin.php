<?php
	session_start();
?>


<?php
	include 'include/header.php';

	$first_name = $last_name = $phone_no = $email = $password = $confirm_password ="";

	$first_name_er = $last_name_er = $phone_no_er = $email_er = $password_er = $confirm_password_er="";
	
function auth_user_info(){
	
	$flag="true";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			  if (empty($_POST["first_name"])) {
			    $GLOBALS["first_name_er"] = "First name is required";  
			    $flag="false";
			  } else {
			  		if (preg_match("/^[A-Z][a-zA-Z ]+$/",$_POST["first_name"]) === 0) {
			  			 $GLOBALS["first_name_er"] = "start with uppercase letter <br> and only contain letter and dashes";
			  			$flag="false";
			  		}else{
			  			$_SESSION["first_name"] = $_POST["first_name"];
			  		}
			  }

			  if (empty($_POST["last_name"])) {
			    $GLOBALS["last_name_er"] = "Last name is required";
			    $flag="false";
			  } else {
			  		if (preg_match("/^[a-zA-Z ]+$/",$_POST["last_name"]) === 0) {
			  			$GLOBALS["last_name_er"] = "Only contain letter and dashes";
			  			$flag="false";
			  		}else{
			  			$_SESSION["last_name"] = $_POST["last_name"];
			  		}
			  }

			  if (empty($_POST["phone_no"])) {
			  	$GLOBALS["phone_no_er"] = "Phone no required";
			  } else {
			  		if (preg_match("/^[0-9]+$/",$_POST["last_name"]) === 0) {
			  			$GLOBALS["phone_no_er"] = "Only contain numbers";
			  		}else{
			  			$_SESSION["phone_no"] = $_POST["phone_no"];
			  		}
			  }

			  if (empty($_POST["email"])) {
			    $GLOBALS["email_er"] = "Email is required";
			    $flag="false";
			  } else {
			   	
			   	$_SESSION["email"] = $_POST["email"];
				 /*  	if ((preg_match("/^[a-zA-Z][0-9A-Za-z_]+(.[0-9A-Za-z_]+)*@[0-9A-Za-z_]+(.[0-9a-zA-Z]+)*.[a-zA-Z]{2,4}$/", $_POST["email"]) === 0) {
				   		$email_er = "Email must be in valid form";
				   		 $flag="false";
				   	}
			   	*/
			  }

			  if (empty($_POST["password"])) {
			    $GLOBALS["password_er"] = "Password is required";
			    $flag="false";
			  } else {
			   		if (preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/",$_POST["password"]) == 0) {
			  			 $GLOBALS["password_er"] = "Muust be in valid form";
			  			$flag="false";
			  		}else{
			  			$_SESSION["password"] = $_POST["password"];
			  		}
			  }
			  
			  if (empty($_POST["confirm_password"])) {
			    $GLOBALS["confirm_password_er"] = "Confirm password is required";
			    $flag="false";
			  } else {
			   	if ($_POST["password"] != $_POST["confirm_password"]) {
			   		$GLOBALS["confirm_password_er"] = "Password won't match!!";
			   		 $flag="false";
			   	}
			  }
			 if ($flag == "true") {
			 	//save_user_info();
			 //	save_login_info();
			 	 /* Redirect browser */
			 	header("Location: database_file/signin_to_file.php");
			 	
				exit();
			  //	include("raf.php");
			  } 
	}
}
auth_user_info();
?>
<!-- ============ NAVIGATION BAR SECTION ============== -->
<?php
	include 'include/navigation_bar.php';
?>
	<!-- ============ LEFT COLUMN (MENU) ============== -->
<?php
	include 'include/left_col_menu.php';
?>

	<!-- ============ MIDDLE COLUMN (CONTENT) ============== -->
	<!-- action="<?php $_SERVER["PHP_SELF"] ?>" -->
	<td width="55%" valign="top" bgcolor="#d2d8c7">
		<form method="post" action="<?php $_SERVER["PHP_SELF"]?>">
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
						<p>Phone No</p>
						<input type="tel" name="phone_no">
						<span class="error">* <?php echo $phone_no_er; ?></span>
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
<?php
	include 'include/right_col_content.php';
?>
<!-- ============ FOOTER SECTION ============== -->
<?php
	include 'include/footer.php';
?>


