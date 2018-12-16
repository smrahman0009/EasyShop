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
	include 'include/left_col_user.php';
?>

	<!-- ============ MIDDLE COLUMN (CONTENT) ============== -->

<td width="55%" valign="top" bgcolor="#d2d8c7">
		
<div id="products">
<?php
//echo $_SESSION["email"];
function DisplayProduct(){
	$customer_id = $_SESSION["email"];
		$qry = "SELECT order_info.customer_id,order_info.product_id,order_info.quantity,product.product_name,product.product_price,product.product_category
		,product.product_image FROM order_info INNER JOIN product ON order_info.product_id = product.id
			WHERE order_info.customer_id = '$customer_id';";
			//$qry = "SELECT * FROM product;";
	CustomerOrder($qry);
} 

?>
<?php
	require("database_file/display_product.php");
	$customer_order = array();
	//var_dump($customer_order);
	
?>

<?php
///////////////////////////// UPDATE PRODUCT INFO ///////////////////////////////
	
	DisplayProduct();
?>
<table border="1px" cellspacing="0" cellpadding="0">
	<tr>
		<th>Id</th><th>Image</th><th>Product Title</th> <th>Product Price</th><th>Quantity</th><th>Category</th>
	</tr>
	<?php foreach ($customer_order as $info) { ?>
		<form action="<?php $_SERVER["PHP_SELF"] ?>" method="post" name="load">
			<tr>
				<td>
					<input type="text" name="id" value="<?php echo($info['product_id'])?>" size="1">
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
					<input type="number" min="0" max="20" name="product_qty" value="<?php echo $info['quantity']; ?>"></td>
				<td>
					<select name="product_category">
						<option name='<?php echo $info["product_category"]; ?>'><?php echo $info["product_category"]; ?></option>
					</select>
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

