<?php
session_start();
if(isset($_SESSION["flag"])==NULL && $_SESSION["flag"]=="" || $_SESSION["user_type"] != "admin"){
	echo "Invalid user";
	header("Location:login.php?error=invalid user");
	exit();
}
?>

<?php
	include 'include/header.php';

	
	$pro_category = $pro_name = $pro_price = $pro_quantity = $pro_description = "";
	$pro_category_er = $pro_name_er = $pro_price_er = $pro_quantity_er = $pro_description_er = "";
	$_SESSION["ln"] ="uploads/5bf6a4890d3395.98920105.jpg";
//	echo $_SESSION["ln"];
	//$_SESSION["img_path"] = "";

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
		<form method="post" action="upload.php" enctype="multipart/form-data" onsubmit="return dbValidation();">
			<table>
				<tr>
					<td rowspan="6">
						<img src="<?php  echo $_SESSION['ln'] ?>" width="20%" height="20%">
						<hr>
						<input type="file" name="file" required id="file-pic">
					</td>
				</tr>
				<tr>
					<td>
						Choose Catagory:
					</td>
					<td>
						<select name="product_category">
							<option name="Mens Wear">
								Mens Wear
							</option>
							<option name="Womens Wear">
								Womens Wear
							</option>
							<option name="Kids">
								Kids
							</option>
							<option name="Gadgets">
								Gadgets
							</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						Name:
					</td>
					<td>
						<input type="text" name="product_name" id="product-name" required>
						<span class="error">* <?php echo $pro_name_er; ?></span>
					</td>
				</tr>
				<tr>
					<td>
						Price:
					</td>
					<td>
						<input type="number" min="0" max="200000"  name="product_price" id="product-price" required>
						<span class="error">* <?php echo $pro_price_er; ?></span>
					</td>
				</tr>
				<tr>
					<td>
						Product quantity:
					</td>
					<td>
						<input type="text" name="product_qty" id="product-qty" required>
						<span class="error">* <?php echo $pro_quantity_er; ?></span>
					</td>
				</tr>
				<tr>
					<td>
						Product brand:
					</td>
					<td>
						<input type="text" name="product_brand" id="product-brand" required>
					</td>
				</tr>
				<tr>
					<td>
						Description:
					</td>
					<td>
						<textarea name="description" rows="10" cols="40" id="description" required></textarea> 
						<span class="error">* <?php echo $pro_description_er; ?></span>
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="submit" width="200px" height="30%" value="ADD">
					</td>
				</tr>
			</table>
		</form>
	</td>
<script type="text/javascript" src="js/easyshop.js"></script>
</tr>

<!-- ============ FOOTER SECTION ============== -->

<?php
	include 'include/footer.php';
?>

