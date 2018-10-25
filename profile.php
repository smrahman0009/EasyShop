<?php
	session_start();
	$first_name = $_SESSION["first_name"];
	$last_name = $_SESSION["last_name"];
	$email = $_SESSION["email"];
	$password = $_SESSION["password"];
?>
<?php
	include 'include/header.php';
?>
<!-- ============ NAVIGATION BAR SECTION ============== -->
<?php
	include 'include/navigation_bar.php';
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
						<p>
							Sign-in Information
						</p>
						<hr>
						<p>
							Email*
						</p>
						<input type="email" name="email" value="<?php echo $email;?>">
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


