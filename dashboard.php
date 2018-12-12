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
<!--	<td width="60%" valign="top" bgcolor="#f5f5f5">
		<form action="/action_page.php">
			<h3>Choose a product picture: </h3>
				<input type="file" name="pic" accept="image/*">
			</br>
				<img src="img/f1.jpg" height="60%" width="50%">
				<br>
				 <input type="submit">
		</form>
	</td>
--!>

	<!-- ============ MIDDLE COLUMN (CONTENT) ============== -->
	<td width="55%" valign="top" bgcolor="#d2d8c7">
		<form method="post" action="upload.php" enctype="multipart/form-data">
			<table>
				<tr>
					<td rowspan="6">
						<img src="<?php  echo $_SESSION['ln'] ?>" width="20%" height="20%">
						<hr>
						<input type="file" name="file">
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
						<input type="text" name="product_name" required>
						<span class="error">* <?php echo $pro_name_er; ?></span>
					</td>
				</tr>
				<tr>
					<td>
						Price:
					</td>
					<td>
						<input type="text" name="product_price" required>
						<span class="error">* <?php echo $pro_price_er; ?></span>
					</td>
				</tr>
				<tr>
					<td>
						Product quantity:
					</td>
					<td>
						<input type="text" name="product_qty" required>
						<span class="error">* <?php echo $pro_quantity_er; ?></span>
					</td>
				</tr>
				<tr>
					<td>
						Description:
					</td>
					<td>
						<textarea name="description" rows="10" cols="40" required></textarea> 
						<span class="error">* <?php echo $pro_description_er; ?></span>
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="submit" width="100px" height="30%" value="ADD">
					</td>
				</tr>
			</table>
		</form>
	</td>

</tr>

<!-- ============ FOOTER SECTION ============== -->

<?php
	include 'include/footer.php';
?>

