<?php
session_start();
if(isset($_SESSION["flag"])==NULL && $_SESSION["flag"]==""){
	echo "Invalid user";
	header("Location:login.php?error=invalid user");
	exit();
}
?>
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
		<form method="post" action="database_file/product_to_file.php">
			<table>
				<tr>
					<td>
						Choose Catagory:
					</td>
					<td>
						<select name="pro_category">
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
						<input type="text" name="pro_name" required>
					</td>
				</tr>
				<tr>
					<td>
						Price:
					</td>
					<td>
						<input type="text" name="pro_price" required>
					</td>
				</tr>
				<tr>
					<td>
						Product quantity:
					</td>
					<td>
						<input type="text" name="pro_quantity" required>
					</td>
				</tr>
				<tr>
					<td>
						Description:
					</td>
					<td>
						<input type="text" name="pro_description" required>
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

