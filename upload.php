<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		if (isset($_POST["submit"])) {
		$file = $_FILES["file"];

		$fileName = $_FILES["file"]["name"];
		$fileTmpName = $_FILES["file"]["tmp_name"];
		$fileSize = $_FILES["file"]["size"];
		$fileError = $_FILES["file"]["error"];
		$fileType = $_FILES["file"]["type"];

		$fileExt = explode(".", $fileName);
		$fileActualExt = strtolower(end($fileExt));

		$allowed = array("jpg","jpeg","png","pdf");

		if (in_array($fileActualExt, $allowed)) {
			if ($fileError === 0) {
				if ($fileSize < 500000) {
					$fileNameNew = uniqid('',true) .".". $fileActualExt;
					$fileDestination = "uploads/" . $fileNameNew;
					move_uploaded_file($fileTmpName, $fileDestination);
					insert_to_product($fileDestination);
					header("Location: dashboard.php?upload success");
				}
				else echo "Too much large";
			}
			else echo "There was an error";
		}
		else  {
			echo "You can not upload files of this type!";
		}


	}
	}

	function insert_to_product($fileDestination){
		/*echo "Product Category: " . $_POST["product_category"] . "<br>";
		echo "Product name    : " . $_POST["product_name"] . "<br>";
		echo "Product Quantity: " . $_POST["product_qty"] . "<br>";
		echo "Product Description: " . $_POST["description"] . "<br>";
		echo "Product Price: " . $_POST["product_price"] . "<br>";
		echo "Image Location " . $fileDestination . "<br>";
		echo "<img src='$fileDestination' width='20%'>";*/


	$product_name = $_POST["product_name"];
	$product_price = $_POST["product_price"];
	$product_qty = $_POST["product_qty"];
	$product_image = $fileDestination;
	$product_category =  $_POST["product_category"];
	$description = $_POST["description"];
	$_SESSION["img_path"] = $fileDestination;


	$qry = "INSERT INTO product (product_name,product_price,product_qty,product_image,product_category,description)
			VALUES
 ('$product_name','$product_price','$product_qty','$product_image','$product_category','$description');";

	$db_server_name = "localhost";
	$db_user_name = "root";
	$db_password = "";
	$db_name = "easyshop";
	$db_con = mysqli_connect($db_server_name, $db_user_name, $db_password, $db_name);
	$qry_result = mysqli_query($db_con,$qry);
	}

	
?>