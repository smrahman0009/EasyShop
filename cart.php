<?php
session_start();
?>
<?php
	include 'include/header.php';
?>
<?php 
	require("database_file/display_product.php");
	$product_info = array();
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

<?php 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 1 (if user attempts to add something to the cart from the product page)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];
	$wasFound = false;
	$i = 0;
	// If the cart session variable is not set or cart array is empty
	if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) { 
	    // RUN IF THE CART IS EMPTY OR NOT SET
		$_SESSION["cart_array"] = array(0 => array("item_id" => $pid, "quantity" => 1));
	} else {
		// RUN IF THE CART HAS AT LEAST ONE ITEM IN IT
		foreach ($_SESSION["cart_array"] as $each_item) { 
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "item_id" && $value == $pid) {
					  // That item is in cart already so let's adjust its quantity using array_splice()
					  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $pid, "quantity" => $each_item['quantity'] + 1)));
					  $wasFound = true;
				  } // close if condition
		      } // close while loop
	       } // close foreach loop
		   if ($wasFound == false) {
			   array_push($_SESSION["cart_array"], array("item_id" => $pid, "quantity" => 1));
		   }
	}
//	header("location: cart.php"); 
 //   exit();
}
?>
<?php
	///////////////// MAKE EMPTY SHOPING CART /////////////////////
	if (isset($_GET["cmd"]) && $_GET["cmd"] == "emptycart") {
		unset($_SESSION["cart_array"]);
	}
?>
<?php
	////////////////// USER VIEW ///////////////////////////
	$cartOutput = "";
	if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
   		 $cartOutput = "<h2 align='center'>Your shopping cart is empty</h2>";
	} 
	else {
		$i = 0;
		foreach ($_SESSION["cart_array"] as $each_item) {
			$i++;

			$item_id = $each_item["item_id"];
			loadFromProduct("SELECT * FROM product where id = '$item_id' LIMIT 1;");
			foreach ($product_info as $info) {
				$product_name = $info["product_name"];
				$product_price = $info["product_price"];
			}

			$price = $product_price * $each_item["quantity"];
			$cartOutput .= "<h2> Cart item $i</h2>";
			$cartOutput .= "item ID: " . $each_item["item_id"] . "<br/>";
			$cartOutput .= "Item Quantity: " . $each_item["quantity"] . "<br/>";
			$cartOutput .= "Item Name: " . $product_name . "<br/>";
			$cartOutput .= "Item price: " . $price . "<br/>";
		/*	while (list($key,$value) = each($each_item)) {
				$cartOutput .= "$key: $value <br/>";
			}
		*/
		}
	}
?>
<?php
	echo $cartOutput;
?>
<table>
	<tr>
		
	</tr>
	<tr>
		<td>
			<a href="cart.php?cmd=emptycart">Click here to empty your cart</a>
		</td>
	</tr>
</table>


</td>
<!-- ============ RIGHT COLUMN (CONTENT) ============== -->
<?php
	include 'include/right_col_content.php';
?>
 <!-- ============ FOOTER SECTION ============== -->
<?php
	include 'include/footer.php';
?>