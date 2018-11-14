<?php
//session_start();

function insertIntoPersonalInfo($qry){
	global $personal_info;

	$db_server_name = "localhost";
	$db_user_name = "root";
	$db_password = "";
	$db_name = "easyshop";
	$db_con = mysqli_connect($db_server_name, $db_user_name, $db_password, $db_name);
	$qry_result = mysqli_query($db_con,$qry);

}

function insertIntoSignUpInfo($qry){
	global $personal_info;

	$db_server_name = "localhost";
	$db_user_name = "root";
	$db_password = "";
	$db_name = "easyshop";
	$db_con = mysqli_connect($db_server_name, $db_user_name, $db_password, $db_name);

	$qry_result = mysqli_query($db_con,$qry);
}

	//header("Location: ../signin.php");
	//exit();
?>


