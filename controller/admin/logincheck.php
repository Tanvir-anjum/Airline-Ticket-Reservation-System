<?php
include('../../model/db.php');
session_start();

$error="";
// store session data
if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Username or Password is required";
	} else {
		$username=$_POST['username'];
		$password=$_POST['password'];
		

		$dbobj = new db();
		$conobj=$dbobj->OpenCon();

		$userQuery=$dbobj->CheckUser($conobj,"admin_account",$username,$password);

		if ($userQuery->num_rows > 0) {
			$_SESSION["valid"]="yes";
			$_SESSION["uname"]=$username;
			setcookie('user', $username, time()+36000 , '/');
		} else {
			$error = "Username or Password is invalid";
		}
		$dbobj->CloseCon($conobj);
	}
}

?>