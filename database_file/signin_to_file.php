<?php
session_start();
//print_r($_REQUEST);

function save_user_info(){

	$file=fopen('../database/user_info.txt','a') or die("fle open error");
	$c=0;
	$c=fwrite($file,"\r\n");
	$c+=fwrite($file,$_SESSION["first_name"]);
	$c+=fwrite($file," ");
	$c+=fwrite($file,$_SESSION["last_name"]);
	$c+=fwrite($file," ");
	if ($_SESSION["phone_no"]==="") {
		$c+=fwrite($file,"xxx");
	}else $c+=fwrite($file,$_SESSION["phone_no"]);

	$c+=fwrite($file," ");
	$c+=fwrite($file,$_SESSION["email"]);
	$c+=fwrite($file," ");
	$c+=fwrite($file,$_SESSION["password"]);
	//$c+=fwrite($file,md5($_REQUEST["password"]));
	echo $c." characters added to file";

}

function save_login_info(){
	$file=fopen('../database/login_info.txt','a') or die("fle open error");
	$c=0;
	$c=fwrite($file,"\r\n");
	$c+=fwrite($file,$_SESSION["email"]);
	$c+=fwrite($file," ");
	$c+=fwrite($file,$_SESSION["password"]);
	//$c+=fwrite($file,md5($_REQUEST["password"]));
	echo $c." characters added to file";
}
	save_user_info();
	save_login_info();

	header("Location: ../signin.php");
	exit();
?>


