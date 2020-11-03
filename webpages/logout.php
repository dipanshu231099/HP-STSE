<?php

session_start();

$_SESSION['loginStatus']=0;
unset($_SESSION['email']);
unset($_SESSION['type']);
header("Location: index.php");

?>