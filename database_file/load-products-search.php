<?php
	require("../database_file/display_product.php");
	$product_info = array();
	if (!empty($_GET["q"])) {
		$q = $_GET["q"];
		loadFromProduct("SELECT * FROM product where product_name LIKE '%$q%';");
		foreach ($product_info as $info) {
			echo "<h1 style='color:red;'>".$info["product_name"]."<h1>";
		}
	}
	
	
?>
