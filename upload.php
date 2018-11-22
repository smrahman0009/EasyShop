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
					print_v();
					//header("Location: dashboard.php?upload success");
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

	function print_v(){
		echo "Product Category: " . $_POST["product_category"] . "<br>";
		echo "Product name    : " . $_POST["product_name"] . "<br>";
		echo "Product Quantity: " . $_POST["product_qty"] . "<br>";
		echo "Product Description: " . $_POST["description"] . "<br>";
		echo "Product Price: " . $_POST["product_price"] . "<br>";
	}
	
?>