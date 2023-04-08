<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_abort();
setcookie('username', '', -1);
setcookie("password", '', -1);
setcookie("id", '', -1);
echo "<script type='text/javascript'>window.location.href='https://huyn.site/login.php';</script>";
?>