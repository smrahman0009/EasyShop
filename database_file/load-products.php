<?php
	require("../database_file/display_product.php");
	$product_info = array();
	$productNewCount = $_POST["productNewCount"];
	loadFromProduct("SELECT * FROM product where product_qty > 0 LIMIT $productNewCount;");
	$counter = 1;
	echo '<table width="100%" cellspacing="6" cellpadding="6">';
	echo '<tr>
			<td></td><td></td>
			<td><input type="search" name="search_bar" id="search-bar"><button id="search-button" value="go">Search
			</td>
			</tr>';
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
							} 
?>
<?php $counter++; ?>				
<?php endforeach; ?>

<?php echo "</table>"; ?>
