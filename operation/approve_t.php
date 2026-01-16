<?php
session_start();
require_once("../db/databaseConnection.php");
$id=mysql_real_escape_string($_GET['id']);
$empid=mysql_real_escape_string($_GET['empid']);
$credit=mysql_real_escape_string($_GET['credit']);
echo $empid."<br/>";
echo $credit."<br/>";
		mysql_query("update   traveltbl   set 
										status='approved'  where   id='$id'");
				 
										
		header("location: ../travel_order.php");
		
?>