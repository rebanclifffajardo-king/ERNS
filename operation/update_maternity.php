<?php
session_start();
require_once("../db/databaseConnection.php");
$id=mysql_real_escape_string($_POST['id']);
$maternity_credits=mysql_real_escape_string($_POST['maternity_credits']);

		mysql_query("update    maternityleave  set 
										maternity_credits='$maternity_credits'  where   id='$id'");
			header("location: ../leavecredits.php");
		
?>