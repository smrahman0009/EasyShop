<?php 
	


	$db_server_name = "localhost";
	$db_user_name = "root";
	$db_password = "";
	$db_name = "easyshop";
	$db_con = mysqli_connect($db_server_name, $db_user_name, $db_password, $db_name);

	$product_id = 3;
	$qry = "SELECT quantity FROM order_info where product_id = $product_id ";

	$result = mysqli_query($db_con,$qry);

	//$row = mysqli_fetch_row($result);
	//echo $row[0];
	$customer_id = "mushfik@gmail.com";
	$product_id = 2;
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
		var_dump($result);
		$row = mysqli_fetch_row($result);
		$quantity = $quantity+$row[0];

		$qry = "UPDATE order_info SET quantity = '$quantity' where product_id = '$product_id';";
		$result = mysqli_query($db_con,$qry);
		
	}


	echo "</br>";
	$qty="";
	//var_dump($result);
	//echo $qry_result;
	if (!$result) {
	//	echo "<h1 style='color:red;'>Not found</h1>";
	}
	else{
		
		
	//	echo "row: " . $row;
		
	}

	

	

?>