<?php
session_start();
unset($_SESSION['username']);
$_SESSION['username']="";
unset($_SESSION['username']);
//echo "session:".$_SESSION['username'];
header("location: login/index.php");





?>