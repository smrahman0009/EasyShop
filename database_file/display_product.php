<?php
//session_start();

function loadFromProduct($qry){
	global $product_info;

	$db_server_name = "localhost";
	$db_user_name = "root";
	$db_password = "";
	$db_name = "easyshop";
	$db_con = mysqli_connect($db_server_name, $db_user_name, $db_password, $db_name);

	//$qry = "SELECT * FROM user_personal_info;";
	$qry_result = mysqli_query($db_con,$qry);
	global $qry_result_chk;
	 $qry_result_chk = mysqli_num_rows($qry_result);
	 $_SESSION["rows"] = $qry_result_chk;
	

	if ($qry_result_chk > 0) {
		while ($rows = mysqli_fetch_assoc($qry_result)) {
			$temp_array = array();
			$temp_array["id"] = $rows["id"];
			$temp_array["product_name"] = $rows["product_name"];
			$temp_array["product_price"] = $rows["product_price"];
			$temp_array["product_qty"] = $rows["product_qty"];
			$temp_array["product_image"] = $rows["product_image"];
			$temp_array["product_category"] = $rows["product_category"];
			$temp_array["description"] = $rows["description"];
			$product_info[] = $temp_array;
		}
	}

	if ($db_con != NULL) {
	//	echo "Connection Established";
	}

}

function CustomerOrder($qry){
		global $customer_order;

		$db_server_name = "localhost";
		$db_user_name = "root";
		$db_password = "";
		$db_name = "easyshop";
		$db_con = mysqli_connect($db_server_name, $db_user_name, $db_password, $db_name);

		$customer_id = $_SESSION["email"];

		$qry_result = mysqli_query($db_con,$qry);
		global $qry_result_chk;
		$qry_result_chk = mysqli_num_rows($qry_result);
		$_SESSION["rows"] = $qry_result_chk;

		$total_price=0;

		if ($qry_result_chk > 0) {
			while ($rows = mysqli_fetch_assoc($qry_result)) {
				$temp_array = array();
				$temp_array["product_id"] = $rows["product_id"];
				$temp_array["product_name"] = $rows["product_name"];
				$temp_array["quantity"] = $rows["quantity"];
				$temp_array["product_category"] = $rows["product_category"];
				$temp_array["product_image"] = $rows["product_image"];

				$temp_array["product_price"] = $rows["product_price"];
				$total_price = $total_price + $rows["product_price"]*$rows["quantity"];
				$temp_array["total_price"] = $total_price;
				
				$customer_order[] = $temp_array;
				//echo $rows["customer_id"]. "<br>";
			}
		}

}

function AdminOrder($qry){
		global $admin_order;

		$db_server_name = "localhost";
		$db_user_name = "root";
		$db_password = "";
		$db_name = "easyshop";
		$db_con = mysqli_connect($db_server_name, $db_user_name, $db_password, $db_name);


		$qry_result = mysqli_query($db_con,$qry);
		global $qry_result_chk;
		$qry_result_chk = mysqli_num_rows($qry_result);
		$_SESSION["rows"] = $qry_result_chk;

		

		if ($qry_result_chk > 0) {
			while ($rows = mysqli_fetch_assoc($qry_result)) {
				$temp_array = array();
				$temp_array["customer_id"] = $rows["customer_id"];
				$temp_array["product_id"] = $rows["product_id"];
				$temp_array["quantity"] = $rows["quantity"];
				$temp_array["product_name"] = $rows["product_name"];
				$temp_array["product_category"] = $rows["product_category"];
				$temp_array["product_price"] = $rows["product_price"];
				
				
				$admin_order[] = $temp_array;
				//echo $rows["customer_id"]. "<br>";
			}
		}

}

function loadProfileInfo($qry){
	global $PersonalInfo;

	$db_server_name = "localhost";
	$db_user_name = "root";
	$db_password = "";
	$db_name = "easyshop";
	$db_con = mysqli_connect($db_server_name, $db_user_name, $db_password, $db_name);

	//$qry = "SELECT * FROM user_personal_info;";
	$qry_result = mysqli_query($db_con,$qry);
	global $qry_result_chk;
	 $qry_result_chk = mysqli_num_rows($qry_result);
	 $_SESSION["rows"] = $qry_result_chk;
	

	if ($qry_result_chk > 0) {
		while ($rows = mysqli_fetch_assoc($qry_result)) {
			//echo "First Name: " . $rows["first_name"] . "</br> ";
			//echo "Last Name: " . $rows["last_name"] . "</br> ";
			//echo "Phone No: " . $rows["phone_no"] . "</br>";
			//$temp_array = array();
			//$temp_array["user_id"] = $rows["user_id"];
			$user_id = $rows["user_id"];
		//	$PersonalInfo = $temp_array;
		}
	}

	$qry = "SELECT * FROM personal_info WHERE user_id = '$user_id';";

	$qry_result = mysqli_query($db_con,$qry);
	 $qry_result_chk = mysqli_num_rows($qry_result);
	 $_SESSION["rows"] = $qry_result_chk;

	 if ($qry_result_chk > 0) {
		while ($rows = mysqli_fetch_assoc($qry_result)) {
			$temp_array = array();
			$temp_array["first_name"] = $rows["first_name"];
			$temp_array["last_name"] = $rows["last_name"];
			$temp_array["phone_no"] = $rows["phone_no"];
			$PersonalInfo[] = $temp_array;
		}
	}

}

function UpdateProduct($qry){
	//global $product_info;

	$db_server_name = "localhost";
	$db_user_name = "root";
	$db_password = "";
	$db_name = "easyshop";
	$db_con = mysqli_connect($db_server_name, $db_user_name, $db_password, $db_name);

	//$qry = "SELECT * FROM user_personal_info;";
	$qry_result = mysqli_query($db_con,$qry);
}

function adjustCart($product_id,$customer_id){

		$db_server_name = "localhost";
		$db_user_name = "root";
		$db_password = "";
		$db_name = "easyshop";
		$db_con = mysqli_connect($db_server_name, $db_user_name, $db_password, $db_name);

		
		$qry = "SELECT quantity FROM order_info where product_id = $product_id ";

		$result = mysqli_query($db_con,$qry);

		//$row = mysqli_fetch_row($result);
		//echo $row[0];
	
		//$product_id = 2;
		$quantity = 1;

		if (!$result->num_rows) {
			////////// IF product not found then new row inserted into "order_info" table///////////////

			$qry = "INSERT INTO order_info (customer_id,product_id,quantity)
			VALUES ('$customer_id','$product_id','$quantity');";

			 $result = mysqli_query($db_con,$qry);
			 echo $result;
		}
		else {
			////////////// UPDATE PRODUCT QUANTITY IN "order_info" table ///////////////

			$qry = "SELECT quantity FROM order_info where product_id = '$product_id';";
			$result = mysqli_query($db_con,$qry);
			//var_dump($result);
			$row = mysqli_fetch_row($result);
			$quantity = $quantity+$row[0];

			$qry = "UPDATE order_info SET quantity = '$quantity' where product_id = '$product_id';";
			$result = mysqli_query($db_con,$qry);
			
		}

		////////////// UPDATE product_qty IN "product" table ///////////////
			
			$qry = "SELECT product_qty FROM product where id = '$product_id';";
			$result = mysqli_query($db_con,$qry);
		//	var_dump($result);
			$row = mysqli_fetch_row($result);
			echo "<h1>".$row[0] . "</h1>";
			$quantity = $row[0]-1;

			$qry = "UPDATE product SET product_qty = '$quantity' where id = '$product_id';";
			$result = mysqli_query($db_con,$qry);
			if ($result) {
				echo "EXECUTED!!";
			}
			elseif (!$result) {
				echo "NOT EXECUTED!!";
			}

}

function readjustcart($product_id,$quantity){
	$db_server_name = "localhost";
	$db_user_name = "root";
	$db_password = "";
	$db_name = "easyshop";
	$db_con = mysqli_connect($db_server_name, $db_user_name, $db_password, $db_name);

	
	$qry = "SELECT quantity FROM order_info where product_id = $product_id ";

	$result = mysqli_query($db_con,$qry);

	////////////// UPDATE PRODUCT QUANTITY IN "order_info" table ///////////////

	$qry = "SELECT quantity FROM order_info where product_id = '$product_id';";
	$result = mysqli_query($db_con,$qry);
	//var_dump($result);
	$row = mysqli_fetch_row($result);
	$quantity_od = $row[0]-$quantity;

	$qry = "UPDATE order_info SET quantity = '$quantity_od' where product_id = '$product_id';";
	$result = mysqli_query($db_con,$qry);
	


////////////// UPDATE product_qty IN "product" table ///////////////
	
	$qry = "SELECT product_qty FROM product where id = '$product_id';";
	$result = mysqli_query($db_con,$qry);
	$row = mysqli_fetch_row($result);
	$quantity_p = (int)$quantity+(int)$row[0];

	$qry = "UPDATE product SET product_qty = '$quantity_p' where id = '$product_id';";
	$result = mysqli_query($db_con,$qry);
		
}

?>