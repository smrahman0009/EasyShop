<?php
	session_start();
	if(isset($_SESSION["flag"])==NULL && $_SESSION["flag"]==""){
	echo "Invalid user";
	header("Location:login.php?error=invalid user");
	exit();
}

$first_name = $last_name = $phone_no = $password = $email= "";
function get_user_info(){
		$auth=array();
		$myfile = fopen("database/user_info.txt", "r") or die("Unable to open file!");

		while($line=fgets($myfile)){
		$line=trim($line);
		$up=explode(" ",$line);

		if ($up[3] === $_SESSION["email"]) {
			$GLOBALS["first_name"] = $up[0];
			$GLOBALS["last_name"] = $up[1];
			$GLOBALS["phone_no"] = $up[2];
			$GLOBALS["password"] = $up[4];
			$GLOBALS["email"] = $up[3];
		}
	}
}
get_user_info();
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


