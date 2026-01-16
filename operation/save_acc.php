<?php
session_start();
require_once("../db/databaseConnection.php");
$username=mysql_real_escape_string($_POST['username']);
$password=mysql_real_escape_string($_POST['pass']);
$position=mysql_real_escape_string($_POST['position']);
$name=mysql_real_escape_string($_POST['name']);


	$save = "INSERT INTO  usertbl(username,password,name,position) 
				VALUES 
				('$username','$password','$name','$position')";
				$success=mysql_query($save);
				
				
			header("location: ../changepassword.php");
		
?>