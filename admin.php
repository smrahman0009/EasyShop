<?php
session_start();
if(isset($_SESSION["flag"])==NULL && $_SESSION["flag"]=="" || $_SESSION["user_type"] != "admin"){
	echo "Invalid user";
	header("Location:login.php?error=invalid user");
	exit();
}

?>
<?php
	include 'include/header.php';
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
	include 'include/left_col_admin_menu.php';
?>

	<!-- ============ MIDDLE COLUMN (CONTENT) ============== -->
	<td width="55%" valign="top" bgcolor="#d2d8c7">
		<table height="100%" width="100%">
			<tr>
				<td height="100%" align="center">
					<h2>WELCOME ADMIN PANEL</h2>
					
					
				</td>
			</tr>
			<tr>
				<td>
					
				<hr>
				
				</td>
			</tr>
		</table>
			
		<br>
	</td>
	<td>
		
	</td>
	<!-- ============ RIGHT COLUMN (CONTENT) ============== -->
<?php
//	include 'include/right_col_content.php';
?>

<!-- ============ FOOTER SECTION ============== -->

<?php
	include 'include/footer.php';
?>
