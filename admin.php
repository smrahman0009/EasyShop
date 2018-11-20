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
	include 'include/navigation_bar.php';
?>
	<!-- ============ LEFT COLUMN (MENU) ============== -->
<?php
	//include 'include/left_col_menu.php';
?>

	<!-- ============ MIDDLE COLUMN (CONTENT) ============== -->
	<td width="55%" valign="top" bgcolor="#d2d8c7">
			<h2>Users Info: </h2>
			<hr>
		<iframe src="info/user_info.php" width="70%" height="60%" align="center"></iframe>
		<br>
	</td>
	<td>
		<h2>Product Info</h2>
		<hr>
		<iframe src="info/product_info.php" width="70%" height="60%" align="center"></iframe>
	</td>
	<!-- ============ RIGHT COLUMN (CONTENT) ============== -->
<?php
//	include 'include/right_col_content.php';
?>

<!-- ============ FOOTER SECTION ============== -->

<?php
	include 'include/footer.php';
?>
