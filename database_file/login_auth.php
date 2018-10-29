<?php
session_start();
$mail_id=$password=$flag="false";
$auth=array();
$myfile = fopen("../database/login_info.txt", "r") or die("Unable to open file!");
$cnt=0;
/*while ( cnt<= 2) {
	
}*/

while($line=fgets($myfile)){
	$line=trim($line);
	//echo $line.'<br>';
	$up=explode(" ",$line);
	$mail_id=$up[0];
	$password=$up[1];

	if ($mail_id === $_POST["user_id"] && $password === $_POST["password"]) {
		$flag="true";
		header("Location: ../index.php");
		exit();
		echo "mail_id : ". $mail_id . "<br>";
		echo "password : ". $password . "<br>";
	}
}
if ($flag ==="false") {
	//echo "wrong";
	$_SESSION["user_id"] = "wrong user id";
	$_SESSION["password"]= "wrong password";
	header("Location: ../login.php");
	exit();
}
?>