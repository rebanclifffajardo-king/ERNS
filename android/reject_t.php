<?php
session_start();
require_once("../db/databaseConnection.php");
$id =$_POST['id'];
//$id ="17";
 mysql_query("update traveltbl set status='reject' where id='$id' ");
		echo "reject";
		
?>