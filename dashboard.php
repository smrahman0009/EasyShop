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

	$pro_category = $pro_name = $pro_price = $pro_quantity = $pro_description = "";
	$pro_category_er = $pro_name_er = $pro_price_er = $pro_quantity_er = $pro_description_er = "";

	function auth_product_info(){
		  $flag="true";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			$_SESSION["pro_category"] = $_POST["pro_category"];
			$_SESSION["pro_description"] = $_POST["pro_description"];

			  if (empty($_POST["pro_name"])) { 
			    $flag="false";
			    $pro_name_er = "procuct name required";
			  } else {
			  		if (preg_match("/^[a-zA-Z ]+$/",$_POST["pro_name"]) === 0) {
			  			$flag="false";
			  			$pro_name_er = "procuct name valid format";
			  		}else{
			  			$_SESSION["pro_name"] = $_POST["pro_name"];
			  		}
			  }

			  if (empty($_POST["pro_price"])) {
			    $flag="false";
			    $pro_price_er = "price required";
			  } else {
			  		if (preg_match("/^[0-9.]+$/",$_POST["pro_price"]) === 0) {
			  			$flag="false";
			  			 $pro_price_er = "invalid format";
			  		}else{
			  			$_SESSION["pro_price"] = $_POST["pro_price"];
			  		}
			  }

			  if (empty($_POST["pro_quantity"])) {
			    $flag="false";
			    $pro_quantity_er = "quantity required";
			  } else {
			  		if (preg_match("/^[0-9]+$/",$_POST["pro_quantity"]) === 0) {
			  			$pro_quantity_er = "Only numbers";
			  			$flag="false";
			  		}else{
			  			$_SESSION["pro_quantity"] = $_POST["pro_quantity"];
			  		}
			  }

			//  save_pro_info();
			 if ($flag == "true") {

			 	header("Location: database_file/product_to_file.php");
				exit();
			 	 /* Redirect browser */
				
			  //	include("raf.php");
			  } 
			  else {
			  	echo "Wrong";
			  //	header("Location:../dashboard.php");
			 // 	exit();
			  }
	}
}
auth_product_info();
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
		<form method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
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
						<span class="error">* <?php echo $pro_name_er; ?></span>
					</td>
				</tr>
				<tr>
					<td>
						Price:
					</td>
					<td>
						<input type="text" name="pro_price" required>
						<span class="error">* <?php echo $pro_price_er; ?></span>
					</td>
				</tr>
				<tr>
					<td>
						Product quantity:
					</td>
					<td>
						<input type="text" name="pro_quantity" required>
						<span class="error">* <?php echo $pro_quantity_er; ?></span>
					</td>
				</tr>
				<tr>
					<td>
						Description:
					</td>
					<td>
						<input type="text" name="pro_description" required>
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

