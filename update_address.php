<?php
	session_start();
	if(isset($_SESSION["flag"])==NULL && $_SESSION["flag"]==""){
	echo "Invalid user";
	header("Location:login.php?error=invalid user");
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<script type="text/javascript" src="js/easyshop.js">
	
	
</script>
</body>
</html>
<?php
	require("database_file/signin_to_file.php");
	
 ?>

<?php
	////////////// update new address info ///////////////////
	$email_id = $_SESSION["email"];
	$flag = true;
	if (isset($_POST["submit_button"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["city"])) {
			$city_er="City is rewquired";
			$flag = false;
		}
		else if (empty($_POST["area"])) {
			$area_er="Area  is rewquired";
			$flag = false;
		}
		else if (empty($_POST["road_no"])) {
			$road_er="Road is rewquired";
			$flag = false;
		}
		else if (empty($_POST["house_no"])) {
			$house_er="House no is rewquired";
			$flag = false;
		}
		else if (empty($_POST["flat_no"])) {
			$flat_er="Flat no is rewquired";
			$flag = false;
		}
		else if (empty($_POST["postal_code"])) {
			$postal_code_er="Postal Code is rewquired";
			$flag = false;
		}

		if ($flag == false) {
			return false;
		}
		elseif ($flag == true) {
			$city = $_POST["city"];
			$area = $_POST["area"];
			$road = $_POST["road_no"];
			$house_no = $_POST["house_no"];
			$flat_no = $_POST["flat_no"];
			$postal_code = $_POST["postal_code"];

			$query = "UPDATE address_info SET city = '$city', area = '$area', road = '$road',
			house_no = '$house_no', flat_no = '$flat_no', postal_code = '$postal_code'  WHERE email_id = '$email_id' ;";

			insertIntoPersonalInfo($query);
		}
	}
 ?>

<?php
	include 'include/header.php';

$city = $area = $road = $house = $flat_no = $postal_code ="";

$city_er = $area_er = $road_er = $house_er = $flat_no_er = $postal_code_er="";

	//////////////////// LOAD current address info for address_info table from database///////
	$email_id = $_SESSION["email"];
	$query = "SELECT * FROM address_info WHERE email_id = '$email_id' ;";
	$address_info = array();
	loadFromAddressInfo($query);
	foreach ($address_info as $info) {
		
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
		<form method="post" action="<?php $_SERVER["PHP_SELF"] ?>"  name="delivery_form" onsubmit="return update_address();" >
			<table align="center">
				<tr >
					<td>
						<p>Delivery Information</p>
						<hr>
						<p>City</p>
						<input type="text" id="ucity" name="city"  required value="<?php echo $info['city']; ?>">
					</td>
				</tr>

				<tr>
					<td>
						<p>Area</p>
						<input type="text" id="uarea" name="area"  required  value="<?php echo $info['area']; ?>">
					</td>
				</tr>

				<tr>
					<td>
						<p>Road</p>
						<input type="text" id="uroad-no" name="road_no" required value="<?php echo $info['road']; ?>">
					</td>
				</tr>

				<tr>
					<td>
						<p>
							House
						</p>
						<input type="text" id="uhouse-no" name="house_no" placeholder="Your house no" required value="<?php echo $info['house_no']; ?>">
					</td>
				</tr>
				<tr>
					<td>
						<p>
							Flat No
						</p>
						<input type="text" id="uflat-no" name="flat_no" placeholder="Your flat no" required value="<?php echo $info['flat_no']; ?>">
					</td>
				</tr>
				<tr>
					<td>
						<p>
							Postal Code
						</p>
						<input type="number" id="upostal-code" name="postal_code" required value="<?php echo $info['postal_code']; ?>">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="submit_button" value="submit" >
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


