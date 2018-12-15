<?php 
	$db_server_name = "localhost";
	$db_user_name = "root";
	$db_password = "";
	$db_name = "easyshop";
	$db_con = mysqli_connect($db_server_name, $db_user_name, $db_password, $db_name);

	$qry = "SELECT MAX(id) FROM product;";
	$qry_result = mysqli_query($db_con,$qry);
	foreach ($qry_result as $info) {
		//var_dump($info);
		//echo $info["MAX(id)"];
		$max_id = $info["MAX(id)"];
	}
	echo $max_id;
	$product_brand = "samsung";
	$qry = "INSERT INTO brand_info (product_id,brand_name)
	VALUES ('$max_id','$product_brand');";
	mysqli_query($db_con,$qry);
?>