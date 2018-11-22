
	$pro_category = $pro_name = $pro_price = $pro_quantity = $pro_description = "";
	$pro_category_er = $pro_name_er = $pro_price_er = $pro_quantity_er = $pro_description_er = "";

	function auth_product_info(){
		  $flag="true";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			$_SESSION["pro_category"] = $_POST["pro_category"];
			$_SESSION["pro_description"] = $_POST["pro_description"];

			  if (empty($_POST["pro_name"])) { 
			    $flag="false";
			    $pro_name_er = "procuct name required";
			  } else {
			  		if (preg_match("/^[a-zA-Z ]+$/",$_POST["pro_name"]) === 0) {
			  			$flag="false";
			  			$pro_name_er = "procuct name valid format";
			  		}else{
			  			$_SESSION["pro_name"] = $_POST["pro_name"];
			  		}
			  }

			  if (empty($_POST["pro_price"])) {
			    $flag="false";
			    $pro_price_er = "price required";
			  } else {
			  		if (preg_match("/^[0-9.]+$/",$_POST["pro_price"]) === 0) {
			  			$flag="false";
			  			 $pro_price_er = "invalid format";
			  		}else{
			  			$_SESSION["pro_price"] = $_POST["pro_price"];
			  		}
			  }

			  if (empty($_POST["pro_quantity"])) {
			    $flag="false";
			    $pro_quantity_er = "quantity required";
			  } else {
			  		if (preg_match("/^[0-9]+$/",$_POST["pro_quantity"]) === 0) {
			  			$pro_quantity_er = "Only numbers";
			  			$flag="false";
			  		}else{
			  			$_SESSION["pro_quantity"] = $_POST["pro_quantity"];
			  		}
			  }

			//  save_pro_info();
			 if ($flag == "true") {

			 	header("Location: database_file/product_to_file.php");
				exit();
			 	 /* Redirect browser */
				
			  //	include("raf.php");
			  } 
			  else {
			  	echo "Wrong";
			  //	header("Location:../dashboard.php");
			 // 	exit();
			  }
	}
}
auth_product_info();