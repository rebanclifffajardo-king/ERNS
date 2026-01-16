<?php
	$con = mysql_connect("107.180.28.166","rcwebdev","QvkZT7_x@KAy");
	if(!$con) {
		die('Failed to connect to server: ' . mysql_error());
	}
	mysql_select_db("ernsDB",$con);
	
	$db = mysql_select_db("ernsDB");
	if(!$db) {
		die("Unable to select database");
	}
?>