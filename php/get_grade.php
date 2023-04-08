<?php

require("conn.php");
						
$tohop_list = $conn->query("SELECT `mon` FROM `tohop` WHERE `user_id` = ".$_SESSION['id']);
$mon = [];
$d = 0;
while($row = $tohop_list->fetch_assoc()){
    $monten[$d] = $row['mon'];
	$d++;
}
$d = 0;

$q1 = $conn->query('SELECT `diem` FROM `tohop_data` WHERE `user_id` = '.$_SESSION['id'].' AND  LOWER(`ten mon`) = "'.strtolower($monten[0]).'"');
$q2 = $conn->query('SELECT `diem` FROM `tohop_data` WHERE `user_id` = '.$_SESSION['id'].' AND  LOWER(`ten mon`) = "'.strtolower($monten[1]).'"');
$q3 = $conn->query('SELECT `diem` FROM `tohop_data` WHERE `user_id` = '.$_SESSION['id'].' AND  LOWER(`ten mon`) = "'.strtolower($monten[2]).'"');

$data1 = array();
$data2 = array();
$data3 = array();

while($row = mysqli_fetch_assoc($q1)){
    $data1[] = $row;
}
while($row = mysqli_fetch_assoc($q2)){
    $data2[] = $row;
}
while($row = mysqli_fetch_assoc($q3)){
    $data3[] = $row;
}

$data = array(
    'max' => max(count($data1),count($data2),count($data3)),
    'data1' => $data1,
    'data2' => $data2,
    'data3' => $data3
);

echo json_encode($data);

?>