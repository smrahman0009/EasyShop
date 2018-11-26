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
loadFromProduct("SELECT * FROM product;");
$counter = 1;
echo "<table>";
foreach ($product_info as  $info): ?>
						<?php 
							if(($counter % 3) == 1) {    // Check if it's new row
							 echo '<tr>'; 
							 }
						?>
								<td>
										<img src="<?php echo $info['product_image'];?>"width="200" height="200">
										<?php
											echo "Name: " . $info["product_name"];
										?> 
										
								</td>

						<?php if(($counter % 3) == 0) { 
							 echo '</tr>'; 
						} ?>
<?php $counter++; ?>				
<?php endforeach; ?>
<?php echo "</table>"; ?>
<?php echo "<h2>" .$counter." </h2>"; ?>
								

	
	


	<!-- ============ RIGHT COLUMN (CONTENT) ============== -->
<?php
	include 'include/right_col_content.php';
?>
<!-- ============ FOOTER SECTION ============== -->
<?php
	include 'include/footer.php';
?>

