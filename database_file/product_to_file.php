<?php
session_start();
//print_r($_REQUEST);
function auth_user_info(){
		  $flag="true";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			  if (empty($_POST["pro_name"])) { 
			    $flag="false";
			  } else {
			  		if (preg_match("/^[a-zA-Z ]+$/",$_POST["pro_name"]) === 0) {
			  			$flag="false";
			  		}else{
			  			$_SESSION["pro_name"] = $_POST["pro_name"];
			  		}
			  }

			  if (empty($_POST["pro_price"])) {
			    $flag="false";
			  } else {
			  		if (preg_match("/^[0-9.]+$/",$_POST["pro_price"]) === 0) {
			  			//$_SESSION["pro_price"] = "Only numbers";
			  			$flag="false";
			  		}else{
			  			$_SESSION["pro_price"] = $_POST["pro_price"];
			  		}
			  }

			  if (empty($_POST["pro_quantity"])) {
			    $flag="false";
			  } else {
			  		if (preg_match("/^[0-9]+$/",$_POST["pro_quantity"]) === 0) {
			  			$_SESSION["pro_quantity"] = "Only numbers";
			  			$flag="false";
			  		}else{
			  			$_SESSION["pro_quantity"] = $_POST["pro_quantity"];
			  		}
			  }

			  
			//  save_pro_info();
			 if ($flag == "true") {
			 	save_pro_info();
			 	header("Location:../dashboard.php"); /* Redirect browser */
				exit();
			  //	include("raf.php");
			  } 
			  else {
			  	echo "Wrong";
			  //	header("Location:../dashboard.php");
			 // 	exit();
			  }
	}
}
function save_pro_info(){

	$file=fopen('../database/pro_info.txt','a') or die("fle open error");
	$c=0;
	$c=fwrite($file,"\r\n");
	$c+=fwrite($file,$_REQUEST["pro_category"]);
	$c+=fwrite($file," ");
	$c+=fwrite($file,$_REQUEST["pro_name"]);
	$c+=fwrite($file," ");
	$c+=fwrite($file,$_REQUEST["pro_price"]);
	$c+=fwrite($file," ");
	$c+=fwrite($file,$_REQUEST["pro_quantity"]);
	$c+=fwrite($file," ");
	if ($_REQUEST["pro_description"]==="") {
		$c+=fwrite($file,"xxx");
	}else $c+=fwrite($file,$_REQUEST["pro_description"]);
	echo $c." characters added to file";

}
	auth_user_info();
?>


