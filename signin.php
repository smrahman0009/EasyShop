<?php
	session_start();
?>


<?php
	include 'include/header.php';

$first_name = $last_name = $phone_no = $email = $pwd = $confirm_password ="";

$first_name_er = $last_name_er = $phone_no_er = $email_er = $password_er = $confirm_password_er="";

function auth_user_info(){
	
	$flag="true";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			  if (empty($_POST["first_name"])) {
			    $GLOBALS["first_name_er"] = "First name is required";  
			    $flag="false";
			  } else {
			  		if (preg_match("/^[A-Z][a-zA-Z ]+$/",$_POST["first_name"]) === 0) {
			  		//	 $GLOBALS["first_name_er"] = "start with uppercase letter <br> and only contain letter and dashes";
			  			$flag="false";
			  		}else{
			  			$_SESSION["first_name"] = $_POST["first_name"];
			  		}
			  }
			  if (empty($_POST["last_name"])) {
			 //   $GLOBALS["last_name_er"] = "Last name is required";
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
			 // 	$GLOBALS["phone_no_er"] = "Phone no required";
			  } else {
			  		if (preg_match("/^[0-9]+$/",$_POST["last_name"]) === 0) {
			  			$GLOBALS["phone_no_er"] = "Only contain numbers";
			  		}else{
			  			$_SESSION["phone_no"] = $_POST["phone_no"];
			  		}
			  }
			  if (empty($_POST["email"])) {
			  //  $GLOBALS["email_er"] = "Email is required";
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
			  //  $GLOBALS["password_er"] = "Password is required";
			    $flag="false";
			  } else {
			   		if (preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/",$_POST["password"]) == 0) {
			  			 $GLOBALS["password_er"] = "Muust be in valid form";
			  			$flag="false";
			  		}else{
			  			$_SESSION["password"] = $_POST["password"];
			  		}
			  }
			  
			  if (empty($_POST["confirm_password"])) {
		//	    $GLOBALS["confirm_password_er"] = "Confirm password is required";
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

	$query = "INSERT INTO personal_info (first_name,last_name,phone_no)
				VALUES
	 ( '$first_name','$last_name','$phone_no');";

	insertIntoPersonalInfo($query);

	$query = "INSERT INTO sign_in_info (email,pwd,user_type)VALUES ('$email','$pwd_hash','$user_type');";

	insertIntoSignUpInfo($query);
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
						<input type="submit" name="submit_button" value="Create an Account" onclick="validate();">
					</td>
				</tr>
			</table>
		</form>
	</td>

<script type="text/javascript">
	function validate(){
		/////////////// Validate First_name ////////////////////////
		var first_name = document.getElementById("first-name").value;
		var f_n_reg= /^[A-Z][a-z]+$/;
		var f_n_reg_result = f_n_reg.test(first_name);

		/////////////// Validate Last_name ////////////////////////
		var last_name = document.getElementById("last-name").value;
		var l_n_reg= /^[A-Za-z]+$/;
		var l_n_reg_result = l_n_reg.test(last_name);

		/////////////// Validate Phone Numbers ////////////////////////
		var phone_no = document.getElementById("phone-no").value;
		var phone_no_reg = /^[0-9]+$/;
		var phone_no_reg_result = phone_no_reg.test(phone_no);

		/////////////// Validate Email ////////////////////////
		var email = document.getElementById("email").value;
		var email_reg = /^[^@]+@[^@.]+\.[a-z]+$/i;
		var email_reg_result = email_reg.test(email);

		/////////////// Validate Password ////////////////////////
		/////////////// Must contain a lowercase, uppercase letter and a number//
		var password = document.getElementById("password").value;  
		var password_reg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/;
		var password_reg_result = password_reg.test(password);

		if (f_n_reg_result == false) {
			alert("Start with Uppercase Letter");
			return false;
		}
		 if (l_n_reg_result == false) {
			alert("Only contain letters ");
			return false;
		}
		if (phone_no_reg_result == false) {
			alert("Phone no only contain numbers");
			return false;
		}
		 if (email_reg_result == false) {
			alert("Shoul be valid email address");
			return false;
		}
		 if (password_reg_result == false) {
			alert("Must contain a lowercase,uppercase and a number");
			return false;
		}
		else if (password_reg_result == true) {
			if (document.getElementById("password").value != document.getElementById("confirm-password").value) {
				alert("Password and Confirm password Shoul be matched");
				return false;
			}
			else alert("Password matched!!!");
			//return true;
		}
		
		return false;
	}
</script>
	<!-- ============ RIGHT COLUMN (CONTENT) ============== -->
<?php
	include 'include/right_col_content.php';
?>
<!-- ============ FOOTER SECTION ============== -->
<?php
	include 'include/footer.php';
?>


