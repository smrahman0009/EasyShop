<?php
	session_start();
?>


<?php
	include 'include/header.php';

$city = $area = $road = $house = $flat_no = $postal_code ="";

$city_er = $area_er = $road_er = $house_er = $flat_no_er = $postal_code_er="";

/*function auth_user_info(){
	
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
	$road = $_POST["phone_no"];

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
	 ( '$city','$area','$road');";

	insertIntoPersonalInfo($query);

	$query = "INSERT INTO sign_in_info (email,pwd,user_type)VALUES ('$house','$flat_no_hash','$user_type');";

	insertIntoSignUpInfo($query);
	}
	
			   
}*/

	
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
		<form method="post" action="delivery_info.php"  name="delivery_form" onsubmit="return delivery_form()">
			<table align="center">
				<tr >
					<td>
						<p>Delivery Information</p>
						<hr>
						<p>City</p>
						<input type="text" id="city" name="city" placeholder="Your current name">
						<span class="error"> <?php echo $city_er; ?></span>
					</td>
				</tr>

				<tr>
					<td>
						<p>Area</p>
						<input type="text" id="area-no" name="area_no" placeholder="Your area">
						<span class="error"> <?php echo $area_er; ?></span>
					</td>
				</tr>

				<tr>
					<td>
						<p>Road</p>
						<input type="text" id="road-no" name="road_no" placeholder="Road no">
						<span class="error"> <?php echo $road_er; ?></span>
					</td>
				</tr>

				<tr>
					<td>
						<p>
							House
						</p>
						<input type="text" id="house-no" name="house_no" placeholder="Your house no">
						<span class="error"> <?php echo $house_er; ?> </span>
					</td>
				</tr>
				<tr>
					<td>
						<p>
							Flat No
						</p>
						<input type="text" id="flat-no" name="flat_no" placeholder="Your flat no">
						<span class="error"> <?php echo $flat_no_er; ?></span>
					</td>
				</tr>
				<tr>
					<td>
						<p>
							Postal Code
						</p>
						<input type="number" id="postal-code" name="postal_code">
						<span class="error"> <?php echo $postal_code_er; ?></span>
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="submit_button" value="submit">
					</td>
				</tr>
			</table>
		</form>
	</td>

<script type="text/javascript">
	function delivery_form(){
		/////////////// Validate city ////////////////////////
		var city = document.getElementById("city").value;
		var city_reg = /^[A-Z][a-z]+$/;
		var city_reg_result = city_reg.test(city);

		/////////////// Validate area_no ////////////////////////
		var area_no = document.getElementById("area-no").value;
		var area_no_reg= /^[A-Za-z0-9]+$/;
		var area_no_reg_result = area_no_reg.test(area_no);

		/////////////// Validate road_no Numbers ////////////////////////
		var road_no = document.getElementById("road-no").value;
		var road_no_reg = /^[0-9a-zA-Z]+$/;
		var road_no_reg_result = road_no_reg.test(road_no);

		/////////////// Validate house_no ////////////////////////
		var house_no = document.getElementById("house-no").value;
		var house_no_reg = /^[0-9a-zA-Z]+$/i;
		var house_no_reg_result = house_no_reg.test(house_no);

		/////////////// Validate flat_no ////////////////////////
		/////////////// Must contain a lowercase, uppercase letter and a number//
		var flat_no = document.getElementById("flat-no").value;  
		var flat_no_reg = /^[0-9a-zA-Z]+$/;
		var flat_no_reg_result = flat_no_reg.test(flat_no);

		/////////////// Postal Code ////////////////////////
		var postal_no = document.getElementById("postal-code").value;
		var postal_no_reg = /^[0-9]+$/;
		var postal_no_reg_result = postal_no_reg.test(postal_no);

		if (city=="") { alert("city name required"); return false;}
		else if (area_no == "") {alert("city name required"); return false;}
		else if (road_no =="") {alert("city name required"); return false;}
		else if (house_no == "") {alert("House no required"); return false;}
		else if (flat_no =="") {alert("Flat no required"); return false;}

		else if (city_reg_result == false) {
			alert("First Name required");
			return false;
		}
		else if (area_no_reg_result == false) {
			alert("Last Name only contain letters ");
			return false;
		}
		else if (road_no == "") {
			alert("Phone number required");
			return false;
		}
		else if (road_no_reg_result == false) {
			alert("Phone no only contain numbers");
			return false;
		}
		else if (house_no_reg_result == false) {
			alert("invalid house_no address");
			return false;
		}
		else if (flat_no_reg_result == false) {
			alert("Must contain a lowercase,uppercase and a number");
			return false;
		}
		else if (document.getElementById("flat_no").value == "") {
			alert("Empty flat_no field");
			return false;
		}
		else if (flat_no_reg_result == true) {
			if (document.getElementById("flat_no").value != document.getElementById("confirm-flat_no").value) {
				alert("flat_no and Confirm flat_no Shoul be matched");
				return false;
			}
			else alert("flat_no matched!!!");
			return false;
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


