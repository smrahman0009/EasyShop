<?php
	session_start();
	$_SESSION["first_name_er"] = $_SESSION["last_name_er"] = $_SESSION["email_er"] = $_SESSION["password_er"] = $_SESSION["confirm_password_er"]="";
?>

<?php
	include 'include/header.php';
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
		<form method="post" action="database_file/signin_to_file.php">
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
						<span class="error">* <?php echo $_SESSION["first_name_er"]; ?></span>
					</td>
				</tr>

				<tr>
					<td>
						<p>Last Name</p>
						<input type="text" name="last_name">
						<span class="error">* <?php echo $_SESSION["last_name_er"]; ?></span>
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
						<span class="error">* <?php echo $_SESSION["email_er"]; ?> </span>
					</td>
				</tr>
				<tr>
					<td>
						<p>
							Password
						</p>
						<input type="Password" name="password">
						<span class="error">* <?php echo $_SESSION["password_er"]; ?></span>
					</td>
				</tr>
				<tr>
					<td>
						<p>
							Confirm Password
						</p>
						<input type="Password" name="confirm_password">
						<span class="error">* <?php echo $_SESSION["confirm_password_er"]; ?></span>
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


