<?php
session_start();
require_once("../db/databaseConnection.php");
$id =$_POST['id'];
//$id ="1";
function getName($id){
	$sql=mysql_query("SELECT * FROM  leavetbl WHERE id='$id' ");
					
							 $row = mysql_fetch_array($sql);
								$empid= $row['empid'];
								return $empid;	
								}
function getPosition($id){
						$sql=mysql_query("SELECT * FROM  leavetbl WHERE id='$id' ");
					
							 $row = mysql_fetch_array($sql);
								$approval= $row['approval'];
								
						$sql3=mysql_query("SELECT * FROM  emptbl WHERE id='$approval' ");
						 $row = mysql_fetch_array($sql3);
							$position= $row['position'];	

							
						$sql1=mysql_query("SELECT * FROM   position WHERE id='$position' ");
					
							 $row = mysql_fetch_array($sql1);
								$approval= $row['approval'];
								
						$sql2=mysql_query("SELECT * FROM   emptbl WHERE position='$approval' ");
					
							 $row = mysql_fetch_array($sql2);
								$newApproval= $row['id'];		
								return $newApproval;	
					}
					
	 function getEmpApp($id){
						$sql=mysql_query("SELECT * FROM  leavetbl WHERE id='$id' ");
					
							 $row = mysql_fetch_array($sql);
								$approval= $row['approval'];
							$sql=mysql_query("SELECT * FROM  emptbl WHERE id='$approval' ");
					
							 $row = mysql_fetch_array($sql);
							 $approval= $row['username'];
								return $approval;	
					}			
	 function getApproval($id){
						 
							$sql=mysql_query("SELECT * FROM  leavetbl WHERE id='$id' ");
					
							 $row = mysql_fetch_array($sql);
							 $approval= $row['approval'];
								return $approval;	
					}

function getCredit($id){
		$countDays=0;
				$sql=mysql_query("SELECT * FROM  leavetbl WHERE id='$id' ");
					
							 $crow = mysql_fetch_array($sql);
							$date1=$crow['from_'];
							$date2=$crow['to_'];
							$datediff = strtotime($date2) - strtotime($date1);
									$loop = floor($datediff/(60*60*24));
									$date_ = new DateTime($date1);
									$countDays=0;
									//echo "<br/>loop:".$loop;
									for($i=0;$i <= $loop; $i++) {
										$date_ = date('Y-m-d' ,strtotime($date1."+".$i." day"));

										$date_final =new DateTime($date_);
										$day =  $date_final->format("w");
										if($day == 6 || $day == 0){
										}else{
											$countDays++;
										}
										
									}
return 	$countDays;


}


$accid =getEmpApp($id);
$approval =getPosition($id);
 
$empid =getName($id);
 
$approval_ =getApproval($id);
$credit=getCredit($id);
 
if($approval<>""){
		mysql_query("update   leavetbl  set 
											approval='$approval'  where   id='$id'");
											
				$save = "INSERT INTO   tracker(empid,leaveid,cleared,status) 
				VALUES 
				('$empid','$id','$approval_','approved')";
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
				
				$save = "INSERT INTO   tracker(empid,leaveid,cleared,status) 
				VALUES 
				('$empid','$id','$approval_','approved')";
				$success=mysql_query($save);
				
				//$sql=mysql_query("DELETE   FROM  tracker WHERE leaveid='$id' ");	
				
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
			 
	}
		
										
		
	 
		echo "approve";
		
?>