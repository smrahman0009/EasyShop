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
<?php
	if (isset($_POST["button_update"])==true) {
		 $product_qty = $_POST["product_qty"];
		$id = $_POST["id"];


		echo "id = ".$id . "<br>";
	 	echo "name = ".$_POST['product_name'] . "<br>";
	 	echo "Price = ".$_POST['product_price'] . "<br>";
	 	echo "Quantity = ".$product_qty . "<br>";
	 	echo "Category = ".$_POST['product_category'] . "<br>";
	 	echo "Description".$_POST['description'] . "<br>";
	 

	

	 	UpdateProduct("UPDATE product SET product_qty = '$product_qty' where id = '$id';");
	 
	 }
	 if (isset($_POST["button_delete"])==true) {
	 	echo "<h1 style='color:red;'> DELETE </h1>";
	 }  
?>
<table border="1px" cellspacing="0" cellpadding="0">
	<tr>
		<th>Id</th><th>Image</th><th>Product Title</th> <th>Product Price</th><th>Quantity</th><th>Category</th><th>Description</th><th>Update</th><th>Delete</th>
	</tr>
	<?php foreach ($product_info as $info) { ?>
		<form action="<?php $_SERVER["PHP_SELF"] ?>" method="post" name="load">
			<tr>
				<td>
					<input type="text" name="id" value="<?php echo($info['id'])?>" size="1">
				</td>
				<td>
					<img src="<?php echo($info['product_image'])?>" height="100px" height="100px">
				</td>
				<td>
					<input type="text" name="product_name" value="<?php echo $info['product_name']; ?>">
				</td>
				<td>
					<input type="text" name="product_price" value="<?php echo $info['product_price']; ?>">
				</td>
				<td>
					<input type="number" min="0" max="20" name="product_qty" value="<?php echo $info['product_qty']; ?>"></td>
				<td>
					<select name="product_category">
						<option name='<?php echo $info["product_category"]; ?>'><?php echo $info["product_category"]; ?></option>
					</select>
				</td>
				<td>
					<textarea rews="50" cols="10" name="description">
						<?php echo $info['description']; ?>
					</textarea>
				</td>
				<td>
					<input type="submit" name="button_update" value="UPDATE">
				</td>
				<td>
					<input type="submit" name="button_delete" value="DELETE">
				</td>
			</tr>
		</form>
	<?php } ?>
</table>
									
</div>

</td>

	<!-- ============ RIGHT COLUMN (CONTENT) ============== -->
<?php
	//include 'include/right_col_content.php';
?>
<!-- ============ FOOTER SECTION ============== -->
<?php
	include 'include/footer.php';
?>

