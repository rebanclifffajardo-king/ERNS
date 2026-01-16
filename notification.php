<?php
session_start();
$justNotif=0;
$passNotif=0;
$leaveNotif=0;
$travelNotif=0;

require_once("db/databaseConnection.php");

$sql=mysql_query("SELECT * FROM   leaverequest  where status='' and approval='$mid'");
			$passNotif = mysql_num_rows($sql);
			
$sql=mysql_query("SELECT * FROM   leavetbl  where status='' and approval='$mid'");
			$leaveNotif = mysql_num_rows($sql);			
			
$sql=mysql_query("SELECT * FROM    traveltbl  where remarks='' and approval='$mid'");
			$travelNotif = mysql_num_rows($sql);		

$sql=mysql_query("SELECT * FROM     justification  where status='' and approval='$mid'");
			$justNotif = mysql_num_rows($sql);		

			



		
?>