<?php 
	
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
	$product_id = 3;
	$customer_id = "mushfik@gmail.com";
	adjustCart($product_id,$customer_id);

?>