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
	include 'include/left_col_admin_menu.php';
?>

	<!-- ============ MIDDLE COLUMN (CONTENT) ============== -->

<td width="55%" valign="top" bgcolor="#d2d8c7">
		
<div id="products">
<?php
function DisplayProduct(){
	loadFromProduct("SELECT * FROM product;");
} 

?>
<?php
	require("database_file/display_product.php");
	$product_info = array();
	
?>

<?php
///////////////////////////// UPDATE PRODUCT INFO ///////////////////////////////
	if (isset($_POST["button_update"])==true && $_SERVER["REQUEST_METHOD"] =="POST") {
		$id = $_POST["id"];
		$product_name = $_POST['product_name'];
		$product_price = $_POST['product_price'];
		$product_qty = $_POST["product_qty"];
		$description = $_POST['description'];

		/*echo "id = ".$id . "<br>";
	 	echo "name = ".$_POST['product_name'] . "<br>";
	 	echo "Price = ".$_POST['product_price'] . "<br>";
	 	echo "Quantity = ".$product_qty . "<br>";
	 	echo "Category = ".$_POST['product_category'] . "<br>";
	 	echo "Description".$_POST['description'] . "<br>";*/
	 

	

	 	UpdateProduct("UPDATE product SET product_name = '$product_name', product_price = '$product_price', product_qty = '$product_qty',description = '$description' where id = '$id';");
	 
	 
	 }
	 ///////////////////////////// DELETE PRODUCT FROM PRODUCT TABLE //////////////////////
	 elseif (isset($_POST["button_delete"])==true && $_SERVER["REQUEST_METHOD"] =="POST") {
	 		$id = $_POST["id"];
	 		UpdateProduct("DELETE FROM product WHERE id = '$id';");
	 }  
	DisplayProduct();
?>
<table border="1px" cellspacing="0" cellpadding="0">
	<tr>
		<th>Id</th><th>Image</th><th>Product Title</th> <th>Product Price</th><th>Quantity</th><th>Category</th><th>Description</th><th>Update</th><th>Delete</th>
	</tr>
	<?php foreach ($product_info as $info) { ?>
		<form action="<?php $_SERVER["PHP_SELF"] ?>" method="post" name="load" onsubmit="ProductAdmin();">
			<tr>
				<td>
					<input type="text" name="id" value="<?php echo($info['id'])?>" size="1">
				</td>
				<td>
					<img src="<?php echo($info['product_image'])?>" height="100px" height="100px">
				</td>
				<td>
					<input type="text" name="product_name" value="<?php echo $info['product_name']; ?>"
					required>
				</td>
				<td>
					<input type="text" name="product_price" value="<?php echo $info['product_price']; ?>" required>
				</td>
				<td>
					<input type="number" min="0" max="20" name="product_qty" value="<?php echo $info['product_qty']; ?>" required></td>
				<td>
					<select name="product_category">
						<option name='<?php echo $info["product_category"]; ?>'><?php echo $info["product_category"]; ?></option>
					</select>
				</td>
				<td>
					<textarea rows="8" cols="25" name="description" required>
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
	<script type="text/javascript" src="js/easyshop.js"></script>									
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

