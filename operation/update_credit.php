<?php
session_start();
require_once("../db/databaseConnection.php");
$id=mysql_real_escape_string($_POST['id']);
$leavecredits=mysql_real_escape_string($_POST['leavecredits']);
//echo $id;
		mysql_query("update    leavecredits  set 
										leavecredits='$leavecredits'  where   id='$id'");
		header("location: ../leavecredits.php");
		
?>