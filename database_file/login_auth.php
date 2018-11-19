<?php
//session_start();

function loadFromPersonalInfo($qry){
	global $sign_in_info;

	$db_server_name = "localhost";
	$db_user_name = "root";
	$db_password = "";
	$db_name = "easyshop";
	$db_con = mysqli_connect($db_server_name, $db_user_name, $db_password, $db_name);

	//$qry = "SELECT * FROM user_personal_info;";
	$qry_result = mysqli_query($db_con,$qry);
	$qry_result_chk = mysqli_num_rows($qry_result);

	if ($qry_result_chk > 0) {
		while ($rows = mysqli_fetch_assoc($qry_result)) {
			//echo "First Name: " . $rows["first_name"] . "</br> ";
			//echo "Last Name: " . $rows["last_name"] . "</br> ";
			//echo "Phone No: " . $rows["phone_no"] . "</br>";
			$temp_array = array();
			$temp_array["user_id"] = $rows["user_id"];
			$temp_array["email"] = $rows["email"];
			$temp_array["pwd"] = $rows["pwd"];
			$temp_array["user_type"] = $rows["user_type"];
			$sign_in_info[] = $temp_array;
		}
	}

	if ($db_con != NULL) {
	//	echo "Connection Established";
	}

}
	
//login_auth();
?>