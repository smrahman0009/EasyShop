<?php
session_start();
?>
<?php
	include 'include/header.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		$(document).ready(function (){

			var productCount = 6;
			$("button").click(function(){
				
				productCount = productCount + 6;
				$("#products").load("database_file/load-products.php",{
					productNewCount : productCount
				});

			});

			$("#test").click(function(){
				
				productCount = productCount -7;
				$("#products").load("database_file/load-products.php",{
					productNewCount : productCount
				});

			});

		});
	</script>
</head>
<body>

</body>
</html>

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
	loadFromProduct("SELECT * FROM product where product_qty > 0 LIMIT 3;");
	$counter = 1;
	echo '<table width="100%" cellspacing="6" cellpadding="6">';
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
	<?php echo "<tr> <td></td> <td >
		<button style='position:center;' width='100%'>show more </button>
	</td> <td> </td></tr>"; ?>
	<?php echo "<tr> <td></td> <td >
		<button id='test' style='position:center;' width='100%'>Test </button>
	</td> <td> </td></tr>"; ?>
	<?php echo "</table>"; ?>
									
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

