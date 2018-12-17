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

function loadFromAddressInfo($qry){
	global $address_info;

	$db_server_name = "localhost";
	$db_user_name = "root";
	$db_password = "";
	$db_name = "easyshop";
	$db_con = mysqli_connect($db_server_name, $db_user_name, $db_password, $db_name);

	$qry_result = mysqli_query($db_con,$qry);
	global $qry_result_chk;
	 $qry_result_chk = mysqli_num_rows($qry_result);
	 $_SESSION["rows"] = $qry_result_chk;
	

	if ($qry_result_chk > 0) {
		while ($rows = mysqli_fetch_assoc($qry_result)) {
			$temp_array = array();
			$temp_array["city"] = $rows["city"];
			$temp_array["area"] = $rows["area"];
			$temp_array["road"] = $rows["road"];
			$temp_array["house_no"] = $rows["house_no"];
			$temp_array["flat_no"] = $rows["flat_no"];
			$temp_array["postal_code"] = $rows["postal_code"];
			$address_info[] = $temp_array;
		}
	}

	if ($db_con != NULL) {
	//	echo "Connection Established";
	}

}

	//header("Location: ../signin.php");
	//exit();
?>


