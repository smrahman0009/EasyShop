<?php
	session_start();
?>


<?php
	include 'include/header.php';

$first_name = $last_name = $phone_no = $email = $pwd = $confirm_password ="";

$first_name_er = $last_name_er = $phone_no_er = $email_er = $password_er = $confirm_password_er="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$first_name = $_POST["first_name"];
	$last_name = $_POST["last_name"];
	$phone_no = $_POST["phone_no"];
	$email = $_POST["email"];
	$pwd = $_POST["password"];

require("database_file/signin_to_file.php");
$personal_info = array();

$query = "INSERT INTO personal_info (first_name,last_name,phone_no)
			VALUES
 ( '$first_name','$last_name','phone_no');";

insertIntoPersonalInfo($query);

$query = "INSERT INTO sign_in_info (email,pwd)VALUES ('$email','$pwd');";

insertIntoSignUpInfo($query);
			   
}

	
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


