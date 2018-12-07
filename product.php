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
<?php 
	require("database_file/display_product.php");
	$product_info = array();
	$id = $_GET["id"];
	loadFromProduct("SELECT * FROM product where id = '$id';");
	foreach ($product_info as $info) {
		//echo "id = " . $info["product_image"];
	}
?>

 <table>
 	<tr>
 		<td valign="top" width="20%">
 			<img src="<?php echo $info['product_image'];?>" width="200" height="200">
 		</td>
 		<td valign="top" width="20%" align="left">
 			<p>
 				<p> Category = <?php echo $info["product_name"]; ?></p>
 				price = <?php echo $info["product_price"];?>
 				<br>
 				Description: <?php echo $info["description"];?>
 			</p>
 			<form id="product_form" method="post" action="cart.php">
 				<input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>">
 				<input type="submit" name="button"  onclick="login_request();" id="button" value="ADD to CART">
 			</form>
 			

			<?php

				if (isset($_SESSION["user_type"])==false) {
					echo "<script>
							function login_request(){
								alert('Login First');
							}
						</script>";
				}
			?>
 		</td>
 	</tr>
 </table>
</td>
<!-- ============ RIGHT COLUMN (CONTENT) ============== -->
<?php
	include 'include/right_col_content.php';
?>
 <!-- ============ FOOTER SECTION ============== -->
<?php
	include 'include/footer.php';
?>