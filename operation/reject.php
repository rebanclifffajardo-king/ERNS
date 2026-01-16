<?php
session_start();
require_once("../db/databaseConnection.php");
$id=mysql_real_escape_string($_GET['id']);

		mysql_query("update   leavetbl  set 
										status='rejected'  where   id='$id'");
										
 	$save = "INSERT INTO  reqnotif(id,stat) 
				VALUES 
				('$empid','rejected')";
				$success=mysql_query($save);
			header("location: ../leave.php");
		
?>