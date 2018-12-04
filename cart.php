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

<?php
if (isset($_POST["pid"])) {
 	$pid = $_POST["pid"];
 	//echo "pid: " . $pid;
 	$wasFound = false;
 	$i = 0;
 	//if the cart session variable is not set or cart array is empty
 	if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
 		//exe if SHOPING CART is not set or is empty
 		$_SESSION["cart_array"] = array(0=>array("item_id" => $pid,"quantity" => 1));
 	}
 	else {
 		//EXE if the cat has at least one item init
 		foreach ($_SESSION["cart_array"] as $each_item) {
 			$i++;
 			while (list($key,$value) = each($each_item)) {
 				if ($key == "item_id" && $value == $pid) {
 					// that item is in cart already so let's adjust its quantity using array_splice()
 					array_splice($_SESSION["cart_array"],$i-1,1, array(array("item_id" => $pid,"quantity" => $each_item['quantity']+1)));
 					$wasFound = true;
 				}
 				
 			}
 		}
 		if ($wasFound == false) {
 			array_push($_SESSION["cart_array"], array("item_id"=>$pid,"quantity"=>1));
 		}

 	}
 	header("location: cart.php"); 
    exit();
 } 
?>
<?php
	if (isset($_GET["cmd"]) && $_GET["cmd"] == "emptycart") {
		unset($_SESSION["cart_array"]);
	}
?>

<?php
	////////////////// USER VIEW ///////////////////////////
	$cartOutput = "";
	if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
		$cartOutput = "<h2 align='center'>Cart is empty</h2>";
	}
	else {
		$i = 0;
		foreach ($_SESSION["cart_array"] as $each_item) {
			$i++;
			$cartOutput = "<h2> Cart item $i</h2>";
			while (list($key,$value) = each($each_item)) {
				$cartOutput = "$key: $value <br/>";
			}
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