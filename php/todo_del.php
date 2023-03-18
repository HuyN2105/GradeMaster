<?php

require('conn.php');

$delID = $_POST['delId'];

$delQuery = "DELETE FROM `tasks` WHERE `user_id` = ".$_COOKIE['id']." AND `id` = ".$delID."";

$conn->query($delQuery);

?>