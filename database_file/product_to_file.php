<?php
session_start();
//print_r($_REQUEST);

function save_pro_info(){

	$file=fopen('../database/pro_info.txt','a') or die("fle open error");
	$c=0;
	$c=fwrite($file,"\r\n");
	$c+=fwrite($file,$_SESSION["pro_category"]);
	$c+=fwrite($file," ");
	$c+=fwrite($file,$_SESSION["pro_name"]);
	$c+=fwrite($file," ");
	$c+=fwrite($file,$_SESSION["pro_price"]);
	$c+=fwrite($file," ");
	$c+=fwrite($file,$_SESSION["pro_quantity"]);
	$c+=fwrite($file," ");
	if ($_SESSION["pro_description"]==="") {
		$c+=fwrite($file,"xxx");
	}else $c+=fwrite($file,$_REQUEST["pro_description"]);
	echo $c." characters added to file";

}
	save_pro_info();

	header("Location: ../dashboard.php");
	exit();
?>


