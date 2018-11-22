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
	$qry_result_chk = mysqli_num_rows($qry_result);

	if ($qry_result_chk > 0) {
		while ($rows = mysqli_fetch_assoc($qry_result)) {
			//echo "First Name: " . $rows["first_name"] . "</br> ";
			//echo "Last Name: " . $rows["last_name"] . "</br> ";
			//echo "Phone No: " . $rows["phone_no"] . "</br>";
			$temp_array = array();
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
	
//login_auth();
?>