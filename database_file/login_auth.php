<?php
session_start();
function login_auth(){
	$mail_id=$password=$flag="false";
	$auth=array();
	$myfile = fopen("../database/login_info.txt", "r") or die("Unable to open file!");
	$cnt=0;
	$_SESSION["flag"]="";
	while($line=fgets($myfile)){
		$line=trim($line);
		//echo $line.'<br>';
		$up=explode(" ",$line);
		$mail_id=$up[0];
		$password=$up[1];

		if ($mail_id === $_POST["user_id"] && $password === $_POST["password"]) {
			$flag="true";
			$_SESSION["flag"]="loginSuccess";
			$_SESSION["email"] = $mail_id;
			$_SESSION["password"] = $password;
			load_personal_info();
			header("Location: ../index.php");
			exit();
			
		}
	}
	if ($flag ==="false") {
		//echo "wrong";
		$_SESSION["user_id"] = "wrong user id";
		$_SESSION["password"]= "wrong password";
		header("Location: ../login.php");
		exit();
	}
}
function load_personal_info(){
	$mail_id=$password=$flag="false";
	$auth=array();
	$myfile = fopen("../database/user_info.txt", "r") or die("Unable to open file!");
	$cnt=0;
	//$_SESSION["flag"]="";
	while($line=fgets($myfile)){
		$line=trim($line);
		//echo $line.'<br>';
		$up=explode(" ",$line);
	//	$mail_id=$up[0];
	//	$password=$up[1];
			$_SESSION["first_name"] = $up[0];
			$_SESSION["last_name"] = $up[1];
	}
}
	
login_auth();
?>