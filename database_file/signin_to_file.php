<?php
session_start();
//print_r($_REQUEST);
function auth_user_info(){
	$first_name = $last_name = $email = $password = $confirm_password ="";
	$first_name_er = $last_name_er = $email_er = $password_er = $confirm_password_er="";
	$flag="true";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			  if (empty($_POST["first_name"])) {
			    $_SESSION["first_name_er"] = "First name is required";  
			    $flag="false";
			  } else {
			  		if (preg_match("/^[A-Z][a-zA-Z ]+$/",$_POST["first_name"]) === 0) {
			  			$_SESSION["first_name_er"] = "Muust start with uppercase letter and only contain letter and dashes";
			  			$flag="false";
			  		}else{
			  			$_SESSION["first_name"] = $_POST["first_name"];
			  		}
			  }

			  if (empty($_POST["last_name"])) {
			    $_SESSION["last_name_er"] = "Last name is required";
			    $flag="false";
			  } else {
			  		if (preg_match("/^[a-zA-Z ]+$/",$_POST["last_name"]) === 0) {
			  			$_SESSION["last_name_er"] = "Only contain letter and dashes";
			  			$flag="false";
			  		}else{
			  			$_SESSION["last_name"] = $_POST["last_name"];
			  		}
			  }

			  if (empty($_POST["email"])) {
			    $_SESSION["email_er"] = "Email is required";
			    $flag="false";
			  } else {
			   	
			   	$_SESSION["email"] = $_POST["email"];
				 /*  	if ((preg_match("/^[a-zA-Z][0-9A-Za-z_]+(.[0-9A-Za-z_]+)*@[0-9A-Za-z_]+(.[0-9a-zA-Z]+)*.[a-zA-Z]{2,4}$/", $_POST["email"]) === 0) {
				   		$email_er = "Email must be in valid form";
				   		 $flag="false";
				   	}
			   	*/
			  }

			  if (empty($_POST["password"])) {
			    $_SESSION["password_er"] = "Password is required";
			    $flag="false";
			  } else {
			   		if (preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/",$_POST["password"]) == 0) {
			  			 $_SESSION["password_er"] = "Muust be in valid form";
			  			$flag="false";
			  		}else{
			  			$_SESSION["password"] = $_POST["password"];
			  		}
			  }
			  
			  if (empty($_POST["confirm_password"])) {
			    $_SESSION["confirm_password_er"] = "Confirm password is required";
			    $flag="false";
			  } else {
			   	if ($_POST["password"] != $_POST["confirm_password"]) {
			   		$_SESSION["confirm_password_er"] = "Password won't match!!";
					$confirm_password = $_POST["confirm_password"];
			   		 $flag="false";
			   	}
			  }
			 if ($flag == "true") {
			 	save_user_info();
			 	save_login_info();
			 	header("Location:../profile.php"); /* Redirect browser */
				exit();
			  //	include("raf.php");
			  } 
			  else {
			  	echo "Wrong";
			  	header("Location:../signin.php");
			//  	exit();
			  }
	}
}
function save_user_info(){

	$file=fopen('../database/user_info.txt','a') or die("fle open error");
	$c=0;
	$c=fwrite($file,"\r\n");
	$c+=fwrite($file,$_REQUEST["first_name"]);
	$c+=fwrite($file," ");
	$c+=fwrite($file,$_REQUEST["last_name"]);
	$c+=fwrite($file," ");
	$c+=fwrite($file,$_REQUEST["email"]);
	$c+=fwrite($file," ");
	$c+=fwrite($file,$_REQUEST["password"]);
	//$c+=fwrite($file,md5($_REQUEST["password"]));
	echo $c." characters added to file";

}

function save_login_info(){
	$file=fopen('../database/login_info.txt','a') or die("fle open error");
	$c=0;
	$c=fwrite($file,"\r\n");
	$c+=fwrite($file,$_REQUEST["email"]);
	$c+=fwrite($file," ");
	$c+=fwrite($file,$_REQUEST["password"]);
	//$c+=fwrite($file,md5($_REQUEST["password"]));
	echo $c." characters added to file";
}
	auth_user_info();
?>


