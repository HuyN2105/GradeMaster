<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_abort();
setcookie("username", NULL);
setcookie("password", NULL);
setcookie("id", NULL);
echo "<script type='text/javascript'>window.location.href='https://huyn.site/login.php';</script>";
?>