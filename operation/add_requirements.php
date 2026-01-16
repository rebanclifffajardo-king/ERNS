<?php
session_start();
require_once("../db/databaseConnection.php");
$type=mysql_real_escape_string($_POST['type']);
$req=mysql_real_escape_string($_POST['req']);
mysql_query("delete from   requirements where type='$type'");

	$save = "INSERT INTO  requirements(type,req) 
				VALUES 
				('$type','$req')";
				$success=mysql_query($save);
				
				
			header("location: ../requirements.php");
		
?>