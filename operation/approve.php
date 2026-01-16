<?php
session_start();
require_once("../db/databaseConnection.php");
$id=mysql_real_escape_string($_GET['id']);
$empid=mysql_real_escape_string($_GET['empid']);
$credit=mysql_real_escape_string($_GET['credit']);
$appid=mysql_real_escape_string($_GET['appid']);
function getPosition($id){
						$sql=mysql_query("SELECT * FROM  emptbl WHERE id='$id' ");
					
							 $row = mysql_fetch_array($sql);
								$position= $row['position'];
								 
						$sql1=mysql_query("SELECT * FROM   position WHERE id='$position' ");
					
							 $row = mysql_fetch_array($sql1);
								$approval= $row['approval'];
								
						$sql2=mysql_query("SELECT * FROM   emptbl WHERE position='$approval' ");
					
							 $row = mysql_fetch_array($sql2);
								$newApproval= $row['id'];		
								return $newApproval;	
					}
					
$approval=getPosition($appid);			
 
	if($approval<>""){
		mysql_query("update   leavetbl  set 
											approval='$approval'  where   id='$id'");
					
					$save = "INSERT INTO   tracker(empid,leaveid,cleared,status) 
				VALUES 
				('$empid','$id','$approval','approved')";
				$success=mysql_query($save);


				
	 		
	}else{
		mysql_query("update   leavetbl  set 
										status='approved'  where   id='$id'");
		mysql_query("update   leavecredits  set 
	leavecredits=leavecredits-'$credit'  where   emp_id='$empid'");	

 	$save = "INSERT INTO  reqnotif(id,stat) 
				VALUES 
				('$empid','approved')";
				$success=mysql_query($save);
				
				$sql=mysql_query("SELECT * FROM  emptbl WHERE id='$empid' ");
					
							 $row = mysql_fetch_array($sql);
									$name= $row['fname']." ".$row['mname']." ".$row['lname'];
									$user_name= $accid;
									$username= $row['username'];
			$transaction= "Approved leave request of ".$username;
			$datetoday =  date('Y-m-d H:i:s');
		$sql = mysql_query("INSERT INTO activitylog  (username,name,transaction,date_) VALUES ('$user_name','$name','$transaction','$datetoday')");
  
	mysql_query("update   leavecredits  set 
										leavecredits=0  where   leavecredits<0");	
										
			//	$sql=mysql_query("DELETE   FROM  tracker WHERE leaveid='$id' ");		
 
	
	}
		
								
										
		header("location: ../leave.php");
		
?>