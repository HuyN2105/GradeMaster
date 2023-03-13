<?php
session_start();
// set timezone
date_default_timezone_set('Asia/Ho_Chi_Minh');

$host = "localhost";
$dbname = "huyne8ps7e_db";
$username = "huyne8ps7e_user";
$password = "ZxRA4X3qzd4ZabqV";
	
$conn = mysqli_connect($host, $username, $password, $dbname);

if(mysqli_connect_errno()){
	die("Connection error: ". mysqli_connect_error());
}

?>
