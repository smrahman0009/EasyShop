<?php
	session_start();
	if(isset($_SESSION["flag"])==NULL && $_SESSION["flag"]==""){
	echo "Invalid user";
	header("Location:login.php?error=invalid user");
	exit();
}



?>
<?php
	include 'include/header.php';
?>
<?php 
$first_name = $last_name = $phone_no = $password = $email= "";
	require("database_file/display_product.php");
	$PersonalInfo = array();

	$email = $_SESSION["email"];
	$qry = "SELECT * FROM sign_in_info WHERE email = '$email';";
	loadProfileInfo($qry);

	foreach ($PersonalInfo as $info) {
		$first_name = $info["first_name"];
		$last_name = $info["last_name"];
		$phone_no = $info["phone_no"];
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
	if ($_SESSION["user_type"]=="normal") {
		include 'include/left_col_user.php';
	 } 
	 elseif ($_SESSION["user_type"] =="admin") {
	 	include 'include/left_col_admin_menu.php';
	 }
	
?>
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
						<p>Phone No</p>
						<input type="text" name="last_name" value="<?php echo $phone_no;?>">
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
						<input type="email" name="email" value="<?php echo $email;?>" disabled>
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
<?php
	include 'include/footer.php';
?>


