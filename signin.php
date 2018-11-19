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
		<form method="post" action="#" onsubmit="return validate()">
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
						<input type="email" id="email" name="email">
						<span class="error">* <?php echo $email_er; ?> </span>
					</td>
				</tr>
				<tr>
					<td>
						<p>
							Password
						</p>
						<input type="Password" id="password" name="password">
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

<script type="text/javascript">
	function validate(){
		/////////////// Validate First_name ////////////////////////
		var first_name = document.getElementById("first-name").value;
		var f_n_reg= /^[A-Z][a-z]+$/;
		var f_n_reg_result = f_n_reg.test(first_name);

		/////////////// Validate Last_name ////////////////////////
		var last_name = document.getElementById("last-name").value;
		var l_n_reg= /^[A-Z][a-z]+$/;
		var l_n_reg_result = f_n_reg.test(first_name);

		/////////////// Validate Phone Numbers ////////////////////////
		var phone_no = document.getElementById("phone-no").value;
		var phone_no_reg = /^[0-9]+$/;
		var phone_no_reg_result = phone_no_reg.test(phone_no);

		/////////////// Validate Email ////////////////////////
		var email = document.getElementById("email").value;
		var email_reg = /^[^@]+@[^@.]+\.[a-z]+$/i;
		var email_reg_result = email_reg.test(email);

		/////////////// Validate Email ////////////////////////
		var email = document.getElementById("email").value;
		var email_reg = /^[^@]+@[^@.]+\.[a-z]+$/i;
		var email_reg_result = email_reg.test(email);

		if (f_n_reg_result == false) {
			alert("Start with Uppercase Letter");
		}
		else if (l_n_reg_result == false) {
			alert("Only contain letters ");
		}
		else if (phone_no_reg == false) {
			alert("Only numbers");
		}
		else if (email_reg_result == false) {
			alert("Shoul be valid email address");
		}
		else if (f_n_reg_result == true) {
			alert("RIGHT Format");
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


