<?php
session_start();
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
	include 'include/left_col_menu.php';
?>

	<!-- ============ MIDDLE COLUMN (CONTENT) ============== -->

<td width="55%" valign="top" bgcolor="#d2d8c7">
		
<div id="products">
<?php
	require("database_file/display_product.php");
	$product_info = array();
	loadFromProduct("SELECT * FROM product where product_qty > 0 LIMIT 6;");
?>

<table>
	<?php foreach ($product_info as $info) { ?>
		<form>
			<tr>
				<td><input type="text" name="name" value="<?php echo $info['product_name']; ?>"></td>
				<td><input type="text" name="price" value="<?php echo $info['product_price']; ?>"></td>
				<td><input type="text" name="qty" value="<?php echo $info['product_qty']; ?>"></td>
				<td><input type="button" name="button" value="UPDATE"></td>
			</tr>
		</form>
	<?php } ?>
</table>
									
</div>

</td>

	<!-- ============ RIGHT COLUMN (CONTENT) ============== -->
<?php
	include 'include/right_col_content.php';
?>
<!-- ============ FOOTER SECTION ============== -->
<?php
	include 'include/footer.php';
?>

