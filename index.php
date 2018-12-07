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
loadFromProduct("SELECT * FROM product where product_qty > 0;");
$counter = 1;
echo '<table width="100%" cellspacing="6" cellpadding="6">';
echo $_SESSION["email"];
foreach ($product_info as  $info): ?>
						<?php 
							if(($counter % 3) == 1) {    // Check if it's new row
							 echo '<tr>'; 
							 }
						?>
							<td bgcolor="white"><a href="http://localhost/dashboard/EasyShop/product.php?id=<?php echo $info['id'] ; ?>">
									<img src="<?php echo $info['product_image'];?>"width="200" height="200">
									</a>
									<?php
										echo "<h5>" . $info["product_name"] . " ";
										echo  $info["product_price"] . "$ </br>";
										//echo $info["id"] . "</h5>";
									?> 	
								</td>

						<?php if(($counter % 3) == 0) { 
							 echo '</tr>'; 
						} ?>
<?php $counter++; ?>				
<?php endforeach; ?>
<?php echo "</table>"; ?>
<?php echo "<h2>" .$counter." </h2>"; ?>
								

</td>

	<!-- ============ RIGHT COLUMN (CONTENT) ============== -->
<?php
	include 'include/right_col_content.php';
?>
<!-- ============ FOOTER SECTION ============== -->
<?php
	include 'include/footer.php';
?>

