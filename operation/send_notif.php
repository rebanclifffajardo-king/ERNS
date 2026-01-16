<?php
session_start();
require_once("../db/databaseConnection.php");
$id=mysql_real_escape_string($_GET['id']);
$requirements="";
$SQL_=mysql_query("SELECT * FROM  requirements  where type='Travel Order'");
					
							while($crow = mysql_fetch_array($SQL_)){
									$cid= $crow['id'];
									
									$requirements=$crow['req'];
							}
				
$requirements=
		$save = "INSERT INTO  notif(empid,requirements,sent)  VALUES  ('$id','$requirements','')";
						$success=mysql_query($save);
			header("location: ../travel_order.php");
		
?>