<?php
session_start();
require_once("../db/databaseConnection.php");
$username=mysql_real_escape_string($_POST['username']);

$password=mysql_real_escape_string($_POST['pass']);
 
$fname=mysql_real_escape_string($_POST['fname']);
$mname=mysql_real_escape_string($_POST['mname']);
$lname=mysql_real_escape_string($_POST['lname']);
		mysql_query("update    emptbl   set 
										password='$password',fname='$fname',mname='$mname',lname='$lname',username='$username1'  where   username='$username'");
			header("location: ../changepassword.php");
		
?>