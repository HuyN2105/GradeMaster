<?php
require('conn.php');
session_start();
$username = $_POST['username'];
if ($stmt = $conn->prepare('SELECT `password`, `id` FROM `grademaster_account` WHERE `username` = ?')) {
	$stmt->bind_param('s', $username);
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
		$stmt->bind_result($pass, $id);
		$stmt->fetch();
		if ($_POST['password'] == $pass) {
			session_regenerate_id();
			if($_POST['remember']!=NULL){
				setcookie("username", $username, time() - 14400);
				setcookie("password", $pass, time() - 14400);
				setcookie("id", $id, time() - 14400);
			}
			$_SESSION['loggedin'] = true;
			$_SESSION['username'] = $username;
			$_SESSION['id'] = $id;
			$result = true;
		} else {
			$result = false;
		}
	} else {
		$result = false;
	}
	$stmt->close();
}
if($result){
	$response = array('success' => true);
}else{
	$response = array('success' => false);
}
echo json_encode($response);
?>