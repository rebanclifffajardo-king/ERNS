<?php
session_start();
require_once("../db/databaseConnection.php");
$username=mysql_real_escape_string($_POST['username']);
$password=mysql_real_escape_string($_POST['pass']);

$name=mysql_real_escape_string($_POST['name']);
		mysql_query("update    usertbl   set 
										password='$password',name='$name'  where   username='$username'");
			header("location: ../changepassword.php");
		
?>