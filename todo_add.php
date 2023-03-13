<?php

require('conn.php');

$task = $_POST['new-task'];

$add_query = "INSERT INTO `tasks`(`task`, `user_id`) VALUES ('".$task."', ".$_COOKIE['id'].")";

$conn->query($add_query);

echo "<script type='text/javascript'>window.location.href='todo.php'</script>";

?>