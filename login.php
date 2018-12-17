<p style="color:red;">
<?php 
session_start();
if(isset($_REQUEST["error"]))//echo $_REQUEST["error"];
?>
</p>

<?php
	include 'include/header.php';
?>
<!-- ============ NAVIGATION BAR SECTION ============== -->
<?php
		include 'include/nav_bar_loggedout.php';
?>
	<!-- ============ LEFT COLUMN (MENU) ============== -->
	
<?php
	//include 'include/left_col_menu.php';
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$email = $password = $un_auth_login = "" ;
		require("database_file/login_auth.php");
		$sign_in_info = array();
		loadFromPersonalInfo("SELECT * FROM sign_in_info;");

		foreach ($sign_in_info as $info) {
			//echo $info["first_name"];
			$_SESSION["email"] = $info["email"];
			$_SESSION["password"] = $info["pwd"];
			$_SESSION["user_type"] =$info["user_type"];
		//	$hashedPwdInDb = password_hash($_SESSION["password"],PASSWORD_DEFAULT);

			if ($_SESSION["email"] == $_POST["u_email"] && 1 == password_verify($_POST["password"],$_SESSION["password"])) {
				$_SESSION["flag"]="loginSuccess";
				$_REQUEST["error"]="";
				if ($_SESSION["user_type"]=="admin") {
					
					header("Location:admin.php");
				}
				else if ($_SESSION["user_type"]=="normal") {

					header("Location:index.php");
				}
			
			exit();
			break;
		}
		else {
			if (empty($_POST["u_email"])  || empty($_POST["password"])) {
			$un_auth_login = "invalid user name or password";
		}
		else{
			
			$un_auth_login = "user name and password require";
		} 
		}
	}
}
	
?>
	<!-- ============ MIDDLE COLUMN (CONTENT) ============== -->
	<td width="55%" valign="top" bgcolor="#d2d8c7">
		<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
			<table align="center">
				<tr >
					<td>
						<p>User Id</p>
						<input type="text" name="u_email" id="email">
					</td>
				</tr>
				<tr>
					<td>
						<p>
						Password
						</p>
						<input type="password" name="password" id="password">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="lg_button" value="Login" onclick="LoginValidation();">
					</td>
					<td>
						Forgot <a href="#">Password</a>
					</td>
				</tr>
				<tr>
					<td style="color: red;">
						
						<?php
						if (isset($_REQUEST["error"])) {
							echo $_REQUEST["error"];
						}
						
						 ?>
					</td>
				</tr>
			</table>
		</form>
<script src="js/easyshop.js">
	
</script>
	</td>

	<!-- ============ RIGHT COLUMN (CONTENT) ============== -->
<?php
	//include 'include/left_col_menu.php';
?>
<!-- ============ FOOTER SECTION ============== -->
<?php
	include 'include/footer.php';
?>

