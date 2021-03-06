<?php
	session_start();
?>


<?php
	include 'include/header.php';

$first_name = $last_name = $phone_no = $email = $pwd = $confirm_password ="";

$first_name_er = $last_name_er = $phone_no_er = $email_er = $password_er = $confirm_password_er="";

function auth_user_info(){
	
	$flag="true";
		if (isset($_POST["submit_button"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
			  if (empty($_POST["first_name"])) {
			    $GLOBALS["first_name_er"] = "First name is required";  
			    $flag="false";
			  } else {
			  		if (preg_match("/^[A-Z][a-z]+$/",$_POST["first_name"]) === 0) {
			  		//	 $GLOBALS["first_name_er"] = "start with uppercase letter <br> and only contain letter and dashes";
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
			  		if (preg_match("/^[0-9]+$/",$_POST["phone_no"]) === 0) {
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
				if (preg_match("/^[^@]+@[^@.]+\.[a-z]+$/i", $_POST["email"]) === 0) {
				   		$email_er = "Email must be in valid form";
				   		 $flag="false";
				   	}
			   	
			  }
			  if (empty($_POST["password"])) {
			    $GLOBALS["password_er"] = "Password is required";
			    $flag="false";
			  } else {
			   		if (preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/",$_POST["password"]) == 0) {
			  			 $GLOBALS["password_er"] = "Must contain lowercase,uppercase and number";
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
			 	return true;
			  }
			  else
			   return false; 
	}
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$flag = auth_user_info();
	if ($flag == true) {
	//////////////// PERSONAL INFO/////////////////////////
	$first_name = $_POST["first_name"];
	$last_name = $_POST["last_name"];
	$phone_no = $_POST["phone_no"];

	//////////////// SIGN IN INFO/////////////////////////
	$email = $_POST["email"];
	$pwd = $_POST["password"];
	$pwd_hash = password_hash($pwd,PASSWORD_DEFAULT);
	$user_type="normal";

	//echo "<h1> Password Hash: ". $pwd_hash ."</h1>";
//	echo "<h1> Password: ". password_hash($pwd_hash,PASSWORD_DEFAULT)."</h1>";

	require("database_file/signin_to_file.php");
	$personal_info = array();
	//echo "<h1 style='color:red;'> Hello I am there </h1>";
	$query = "INSERT INTO personal_info (first_name,last_name,phone_no)
				VALUES
	 ( '$first_name','$last_name','$phone_no');";

	insertIntoPersonalInfo($query);

	$query = "INSERT INTO sign_in_info (email,pwd,user_type)VALUES ('$email','$pwd_hash','$user_type');";

	insertIntoSignUpInfo($query);
	header("Location:address_info.php");
	}
	
			   
}

	
?>
<!-- ============ NAVIGATION BAR SECTION ============== -->
<?php
		include 'include/nav_bar_loggedout.php';
?>
	<!-- ============ LEFT COLUMN (MENU) ============== -->
<?php
	include 'include/left_col_menu.php';
?>

	<!-- ============ MIDDLE COLUMN (CONTENT) ============== -->
	<!-- action="<?php $_SERVER["PHP_SELF"] ?>" -->
	<td width="55%" valign="top" bgcolor="#d2d8c7">
		<form method="post" action="<?php $_SERVER["PHP_SELF"] ?>"  name="sign_up_form" onsubmit="return validate_form()">
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
						<input type="text" id="first-name" name="first_name" placeholder="Start with Uppercase Letter">
						<span class="error">* <?php echo $first_name_er; ?></span>
					</td>
				</tr>

				<tr>
					<td>
						<p>Last Name</p>
						<input type="text" id="last-name" name="last_name" placeholder="Only contain letters ">
						<span class="error">* <?php echo $last_name_er; ?></span>
					</td>
				</tr>

				<tr>
					<td>
						<p>Phone No</p>
						<input type="tel" id="phone-no" name="phone_no" placeholder="Only contain numbers">
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
						<input type="email" id="email" name="email" placeholder="Should be valid email address">
						<span class="error">* <?php echo $email_er; ?> </span>
					</td>
				</tr>
				<tr>
					<td>
						<p>
							Password
						</p>
						<input type="Password" id="password" name="password" placeholder="Contain a lowercase,uppercase & numbers">
						<span class="error">* <?php echo $password_er; ?></span>
					</td>
				</tr>
				<tr>
					<td>
						<p>
							Confirm Password
						</p>
						<input type="Password" id="confirm-password" name="confirm_password">
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

<script type="text/javascript" src="js/easyshop.js">
	
</script>
	<!-- ============ RIGHT COLUMN (CONTENT) ============== -->
<?php
	include 'include/right_col_content.php';
?>
<!-- ============ FOOTER SECTION ============== -->
<?php
	include 'include/footer.php';
?>


