<?php
session_start();
require_once("../db/databaseConnection.php");
$id=mysql_real_escape_string($_POST['id']);
$req=mysql_real_escape_string($_POST['req']);
		mysql_query("update   requirements  set 
										req='$req'  where   id='$id'");
			header("location: ../requirements.php");
		
?>