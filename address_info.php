<?php
	session_start();
?>

<?php
	require("database_file/signin_to_file.php");
	$personal_info = array();
 ?>

<?php
	include 'include/header.php';

$city = $area = $road = $house = $flat_no = $postal_code ="";

$city_er = $area_er = $road_er = $house_er = $flat_no_er = $postal_code_er="";

if (isset($_POST["submit_button"]) && $_SERVER["REQUEST_METHOD"] =="POST") {
	$email_id = $_SESSION["email"];
	$city = $_POST["city"];
	$area = $_POST["area"];
	$road = $_POST["road_no"];
	$house_no = $_POST["house_no"];
	$flat_no = $_POST["flat_no"];
	$postal_code = $_POST["postal_code"];
	

	$query = "INSERT INTO address_info (email_id,city,area,road,house_no,flat_no,postal_code)
				VALUES
	 ( '$email_id','$city','$area','$road','$house_no','$flat_no',$postal_code);";

	insertIntoPersonalInfo($query);
}

	
?>
<!-- ============ NAVIGATION BAR SECTION ============== -->

<?php
	if (isset($_SESSION["user_type"])==false) {
		include 'include/nav_bar_loggedout.php';
	}
	elseif ($_SESSION["user_type"]=="normal") {
		include 'include/nav_bar_user.php';
	 } 
	 elseif ($_SESSION["user_type"] =="admin") {
	 	include 'include/nav_bar_admin.php';
	 }
?>
	<!-- ============ LEFT COLUMN (MENU) ============== -->
<?php
	include 'include/left_col_user.php';
?>

	<!-- ============ MIDDLE COLUMN (CONTENT) ============== -->
	<!-- action="<?php $_SERVER["PHP_SELF"] ?>" -->
	<td width="55%" valign="top" bgcolor="#d2d8c7">
		<form method="post" action="<?php $_SERVER["PHP_SELF"] ?>"  name="delivery_form">
			<table align="center">
				<tr >
					<td>
						<p>Delivery Information</p>
						<hr>
						<p>City</p>
						<input type="text" id="city" name="city" placeholder="Your current name" required>
					</td>
				</tr>

				<tr>
					<td>
						<p>Area</p>
						<input type="text" id="area" name="area" placeholder="Your area" required>
					</td>
				</tr>

				<tr>
					<td>
						<p>Road</p>
						<input type="text" id="road-no" name="road_no" placeholder="Road no" required>
					</td>
				</tr>

				<tr>
					<td>
						<p>
							House
						</p>
						<input type="text" id="house-no" name="house_no" placeholder="Your house no" required>
					</td>
				</tr>
				<tr>
					<td>
						<p>
							Flat No
						</p>
						<input type="text" id="flat-no" name="flat_no" placeholder="Your flat no" required>
					</td>
				</tr>
				<tr>
					<td>
						<p>
							Postal Code
						</p>
						<input type="number" id="postal-code" name="postal_code" required>
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

		if (city=="") {alert("city required");}

		/////////////// Validate area_no ////////////////////////
	/*	var area_no = document.getElementById("area-no").value;
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
		
		return false;*/
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


