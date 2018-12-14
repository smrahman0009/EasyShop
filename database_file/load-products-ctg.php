<?php
	require("../database_file/display_product.php");
	$product_info = array();
	$product_category = $_POST["product_category"];
	loadFromProduct("SELECT * FROM product where product_category = '$product_category';");
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
											echo $product_category;
											//echo $info["id"] . "</h5>";
										?> 	
									</td>

							<?php if(($counter % 3) == 0) { 
								 echo '</tr>'; 
							} 
?>
<?php $counter++; ?>				
<?php endforeach; ?>
<?php echo "</table>"; ?>
