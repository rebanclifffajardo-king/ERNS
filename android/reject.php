<?php
session_start();
require_once("../db/databaseConnection.php");

	function getPosition($id){
						 
					 
							$sql=mysql_query("SELECT * FROM  leavetbl WHERE id='$id' ");
					
							 $row = mysql_fetch_array($sql);
							 $approval= $row['approval'];
								return $approval;	
					}
$id =$_POST['id'];
$empid =getName($id);
$approval =getPosition($id);
//$id ="17";
 mysql_query("update   leavetbl  set 
										status='rejected'  where   id='$id'");
										
 	$save = "INSERT INTO  reqnotif(id,stat) 
				VALUES 
				('$empid','rejected')";
				$success=mysql_query($save);
				
				$save = "INSERT INTO   tracker(empid,leaveid,cleared,status) 
				VALUES 
				('$empid','$id','$approval','rejected')";
				$success=mysql_query($save);
				
		echo "reject";
		
		
		function getName($id){
	$sql=mysql_query("SELECT * FROM  leavetbl WHERE id='$id' ");
					
							 $row = mysql_fetch_array($sql);
								$empid= $row['empid'];
								return $empid;	
								}
?>