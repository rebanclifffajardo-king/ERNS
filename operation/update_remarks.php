<?php
session_start();
require_once("../db/databaseConnection.php");
$id=mysql_real_escape_string($_POST['id']);
$remarks=mysql_real_escape_string($_POST['remarks']);
		mysql_query("update   traveltbl   set 
										remarks='$remarks'  where   id='$id'");
			header("location: ../travel_order.php");
		
?>