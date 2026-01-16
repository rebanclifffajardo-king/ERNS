<?php
session_start();
require_once("../db/databaseConnection.php");
$id=mysql_real_escape_string($_GET['id']);

		mysql_query("update   justification  set 
										status='rejected'  where   id='$id'");
			header("location: ../justification.php");
		
?>