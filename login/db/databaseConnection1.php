<?php
	$con = mysql_connect("db4free.net:3306","rcwebdev","09203913758");
	if(!$con) {
		die('Failed to connect to server: ' . mysql_error());
	}
	mysql_select_db("libsysdb",$con);
	
	$db = mysql_select_db("libsysdb");
	if(!$db) {
		die("Unable to select database");
	}
?>