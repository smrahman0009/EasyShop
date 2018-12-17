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
<div>
	<h2>Order Info</h2>
</div>
<div id="products">
<?php
//echo $_SESSION["email"];
function DisplayProduct(){
		$qry = "SELECT order_info.customer_id,order_info.product_id,order_info.quantity,product.product_name,
			product.product_price,product.product_category
			FROM order_info INNER JOIN product ON order_info.product_id = product.id;";
	AdminOrder($qry);
} 

function LoadCustomerAddress(){
	$qry = "SELECT address_info.email_id,address_info.city,address_info.area,address_info.road,address_info.house_no,address_info.flat_no,address_info.postal_code FROM
address_info inner JOIN order_info WHERE address_info.email_id = order_info.customer_id";
loadFromAddressInfo($qry);
}

?>
<?php
	require("database_file/display_product.php");
	$admin_order = array();
	require("database_file/signin_to_file.php");
	$address_info = array();
	//var_dump($admin_order);
	
?>

<?php
///////////////////////////// UPDATE PRODUCT INFO ///////////////////////////////
	
	DisplayProduct();

?>
<table border="1px" cellspacing="0" cellpadding="0" width="70%">
	<tr>
		<th>Customer Id</th><th>Product Id</th> <th>Quantity</th><th>ProductName</th><th>ProductPrice</th><th>Category</th>
	</tr>
	<?php foreach ($admin_order as $info) {  ?>
		<form action="<?php $_SERVER["PHP_SELF"] ?>" method="post" name="load">
			<tr>
				<td>
					<input type="text" name="product_name" value="<?php echo $info['customer_id']; ?>">
				</td>
				<td>
					<input type="text" name="product_price" value="<?php echo $info['product_id']; ?>">
				</td>
				<td>
					<input type="number" min="0" max="20" name="product_qty" value="<?php echo $info['quantity']; ?>">
				</td>
				<td>
					<input type="text" name="product_price" value="<?php echo $info['product_name']; ?>">
				</td>
				<td>
					<input type="text" name="product_price" value="<?php echo $info['product_price']; ?>">
				</td>
				<td>
					<select name="product_category">
						<option name='<?php echo $info["product_category"]; ?>'><?php echo $info["product_category"]; ?></option>
					</select>
				</td>
			</tr>
		</form>
	<?php } ?>
</table>
				
<?php
 LoadCustomerAddress();
 ?>
<div>
	<h2>Address Info</h2>
</div>
<table border="1px" cellspacing="0" cellpadding="0" width="70%">
	<tr>
		<th>Customer Id</th>
		<th>City</th>
		 <th>Area</th>
		 <th>Road</th>
		 <th>House No</th>
		 <th>Flat No</th>
		<th>Postal Code</th>
	</tr>
	<?php foreach ($address_info as $info) {  ?>
		<form action="<?php $_SERVER["PHP_SELF"] ?>" method="post" name="load">
			<tr>
				<td>
					<input type="text"  value="<?php echo $info['email_id']; ?>">
				</td>
				<td>
					<input type="text"  value="<?php echo $info['city']; ?>">
				</td>
				<td>
					<input type="text"  value="<?php echo $info['area']; ?>">
				</td>
				<td>
					<input type="text"  value="<?php echo $info['road']; ?>">
				</td>
				<td>
					<input type="text"  value="<?php echo $info['house_no']; ?>">
				</td>
				<td>
					<input type="text"  value="<?php echo $info['flat_no']; ?>">
				</td>
				<td>
					<input type="text"  value="<?php echo $info['postal_code']; ?>">
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

