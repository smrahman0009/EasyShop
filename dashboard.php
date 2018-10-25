
<?php
	include 'include/header.php';
?>
<!-- ============ NAVIGATION BAR SECTION ============== -->
<?php
	include 'include/navigation_bar.php';
?>
	<!-- ============ LEFT COLUMN (MENU) ============== -->
	<td width="60%" valign="top" bgcolor="#f5f5f5">
		<form action="/action_page.php">
			<h3>Choose a product picture: </h3>
				<input type="file" name="pic" accept="image/*">
			</br>
				<img src="img/f1.jpg" height="60%" width="50%">
				<br>
				 <input type="submit">
		</form>
	</td>

	<!-- ============ MIDDLE COLUMN (CONTENT) ============== -->
	<td width="55%" valign="top" bgcolor="#d2d8c7">
		Choose Catagory:
		<select name="catagory">
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
		<br>
		<br>
		product quantity:
		<input type="text" name="product_quantity">
		<br>
		<br>
		product price:
		<input type="text" name="product_price">
		<br>
		<br>
		product descriptions:
		<input type="text" name="product_price" height="100" width="200%">
		<br>
		<br>
		<input type="button" name="add_price_button" width="100px" height="30%" value="ADD">


	</td>

	
</tr>

<!-- ============ FOOTER SECTION ============== -->

<?php
	include 'include/footer.php';
?>

