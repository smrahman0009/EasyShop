<?php 
	session_start();
	function CustomerOrder($qry){
		global $customer_order;

		$db_server_name = "localhost";
		$db_user_name = "root";
		$db_password = "";
		$db_name = "easyshop";
		$db_con = mysqli_connect($db_server_name, $db_user_name, $db_password, $db_name);

		$customer_id = $_SESSION["email"];

	/*	$qry = "SELECT order_info.customer_id,order_info.product_id,order_info.quantity,product.product_name,product.product_price,product.product_category
		,product.product_image FROM order_info INNER JOIN product ON order_info.product_id = product.id
			WHERE order_info.customer_id = '$customer_id';";*/

		$qry_result = mysqli_query($db_con,$qry);

	

		 $qry_result_chk = mysqli_num_rows($qry_result);
		 $_SESSION["rows"] = $qry_result_chk;

		if ($qry_result_chk > 0) {
			while ($rows = mysqli_fetch_assoc($qry_result)) {
				$temp_array = array();
				$temp_array["product_id"] = $rows["product_id"];
				$temp_array["quantity"] = $rows["quantity"];
				$temp_array["product_name"] = $rows["product_name"];
				$temp_array["product_price"] = $rows["product_price"];
				$temp_array["product_category"] = $rows["product_category"];
				$temp_array["product_image"] = $rows["product_image"];
				$customer_order[] = $temp_array;
				echo $rows["customer_id"]. "<br>";
			}
		}

}
CustomerOrder();

?>