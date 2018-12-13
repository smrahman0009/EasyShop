<?php
	session_start();
?>


<?php
	include 'include/header.php';

$city = $area = $road_no = $house = $flat_no = $postal_code ="";

$city_er = $area_er = $road_no_er = $house_er = $flat_no_er = $postal_code_er="";

function auth_user_info(){
	
	$flag="true";
		if (isset($_POST["submit_button"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
			  if (empty($_POST["city"])) {
			    $GLOBALS["city_er"] = "City is required";  
			    $flag="false";
			  } else {
			  		if (preg_match("/^[A-Z][a-z]+$/",$_POST["city"]) === 0) {
			  			$flag="false";
			  		}else{
			  			$_SESSION["city"] = $_POST["city"];
			  		}
			  }
			  if (empty($_POST["area"])) {
			    $GLOBALS["area_er"] = "Area is required";
			    $flag="false";
			  } else {
			  		if (preg_match("/^[a-zA-Z0-9]+$/",$_POST["area"]) === 0) {
			  			$GLOBALS["area_er"] = "valid name needed";
			  			$flag="false";
			  		}else{
			  			$_SESSION["area"] = $_POST["area"];
			  		}
			  }
			  if (empty($_POST["road_no"])) {
			  	$GLOBALS["road_no_er"] = "Road no required";
			  } else {
			  		if (preg_match("/^[0-9a-zA-Z]+$/",$_POST["phone_no"]) === 0) {
			  			$GLOBALS["road_no_er"] = "valid road no required";
			  		}else{
			  			$_SESSION["road_no"] = $_POST["road_no"];
			  		}
			  }
			  if (empty($_POST["house"])) {
			    $GLOBALS["house_er"] = "House no is required";
			    $flag="false";
			  } else {
				if (preg_match("/^[A-Z0-9a-z]+$/i", $_POST["email"]) === 0) {
				   		$house_er = "House no be in valid form";
				   		 $flag="false";
				   	}
			   	
			  }
			  if (empty($_POST["flat_no"])) {
			    $GLOBALS["flat_no_er"] = "Password is required";
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
	$city = $_POST["first_name"];
	$area = $_POST["last_name"];
	$road_no = $_POST["phone_no"];

	//////////////// SIGN IN INFO/////////////////////////
	$house = $_POST["email"];
	$flat_no = $_POST["password"];
	$flat_no_hash = password_hash($flat_no,PASSWORD_DEFAULT);
	$user_type="normal";

	//echo "<h1> Password Hash: ". $flat_no_hash ."</h1>";
//	echo "<h1> Password: ". password_hash($flat_no_hash,PASSWORD_DEFAULT)."</h1>";

	require("database_file/signin_to_file.php");
	$personal_info = array();
	//echo "<h1 style='color:red;'> Hello I am there </h1>";
	$query = "INSERT INTO personal_info (first_name,last_name,phone_no)
				VALUES
	 ( '$city','$area','$road_no');";

	insertIntoPersonalInfo($query);

	$query = "INSERT INTO sign_in_info (email,pwd,user_type)VALUES ('$house','$flat_no_hash','$user_type');";

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
		<form method="post" action="<?php $_SERVER["PHP_SELF"] ?>"  name="sign_up_form" onsubmit="">
			<table align="center">
				<tr >
					<td>
						<p>Delivery Information</p>
						<hr>
						<p>City</p>
						<input type="text" id="first-name" name="first_name" placeholder="Start with Uppercase Letter">
						<span class="error"> <?php echo $city_er; ?></span>
					</td>
				</tr>

				<tr>
					<td>
						<p>Area</p>
						<input type="text" id="last-name" name="last_name" placeholder="Only contain letters ">
						<span class="error"> <?php echo $area_er; ?></span>
					</td>
				</tr>

				<tr>
					<td>
						<p>Road</p>
						<input type="tel" id="phone-no" name="phone_no" placeholder="Only contain numbers">
						<span class="error"> <?php echo $road_no_er; ?></span>
					</td>
				</tr>

				<tr>
					<td>
						<p>
							House
						</p>
						<input type="email" id="email" name="email" placeholder="Should be valid email address">
						<span class="error"> <?php echo $house_er; ?> </span>
					</td>
				</tr>
				<tr>
					<td>
						<p>
							Flat No
						</p>
						<input type="Password" id="password" name="password" placeholder="Contain a lowercase,uppercase & numbers">
						<span class="error"> <?php echo $flat_no_er; ?></span>
					</td>
				</tr>
				<tr>
					<td>
						<p>
							Postal Code
						</p>
						<input type="Password" id="confirm-password" name="confirm_password">
						<span class="error"> <?php echo $postal_code_er; ?></span>
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


