<?php
	$con = mysql_connect("localhost","root","");
	if(!$con) {
		die('Failed to connect to server: ' . mysql_error());
	}
	mysql_select_db("erns",$con);
	
	$db = mysql_select_db("erns");
	if(!$db) {
		die("Unable to select database");
	}
?>