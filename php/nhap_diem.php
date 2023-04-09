<?php

require("conn.php");

$mon = $_POST['mon'];
$diem = $_POST['diem'];
$ld = $_POST['ld'];
print_r($mon." ".$diem);

$result = $conn->query("INSERT INTO `tohop_data`(`user_id`, `ten mon`, `diem`, `ld`) VALUES (".$_SESSION['id'].", '".$mon."', '".$diem."', '".$ld."')");

header("Location: ../index.php");

?>