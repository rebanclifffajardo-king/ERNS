<?php
session_start();
require_once("../db/databaseConnection.php");

	
$username_ =$_POST['user_name'];
//$username_ ="bsit";
$position=getpositionID($username_);
//echo "position:".$position;
	  $response=array();				
					
 $SQL_=mysql_query("SELECT * FROM  traveltbl  where status='' ");
					while($crow = mysql_fetch_array($SQL_)){
									$id =$crow['id'];
									$empid =$crow['empid'];
									$designation =$crow['designation'];
									$name =getName($empid);
									$departure_date	=$crow['departure_date'];
									$return_date =$crow['return_date'];
									$station =$crow['station'];
									$destination =$crow['destination'];
									$report =$crow['report'];
									$purpose =$crow['purpose'];
									$remarks =$crow['remarks'];
									$date_today =$crow['date_today'];
									$status =$crow['status'];
									$isPosition =checkIfFromPosition($empid);
									if($isPosition==$position){
										array_push($response,array("id"=>($id),"empid"=>($empid),"designation"=>($designation),"name"=>($name),"departure_date"=>($departure_date),"return_date"=>($return_date),"station"=>($station),"destination"=>($destination),"report"=>($report),"purpose"=>($purpose),"remarks"=>($remarks),"date_today"=>($date_today),"status"=>($status)));
							
									}
									
							}
					
							 
 
 echo json_encode(array("server_response"=>$response));

 function getName($id){
					$sql=mysql_query("SELECT * FROM    emptbl   where  id='$id'  ");
					while($row = mysql_fetch_array($sql)){
					return $row['fname']." ".$row['mname']." ".$row['lname'];

					}
					}
 
 function getpositionID($id){
					$sql=mysql_query("SELECT * FROM    emptbl   where  username='$id'  ");
					while($row = mysql_fetch_array($sql)){
					return $row['position'];

					}
					}
			function checkIfFromPosition($id){
				$position="";
			$sql=mysql_query("SELECT * FROM    emptbl   where  id='$id'  ");
			while($row = mysql_fetch_array($sql)){
			$position= $row['position'];
				$sql1=mysql_query("SELECT * FROM    position   where  id='$position'  ");
							while($row1 = mysql_fetch_array($sql1)){
								$position= $row1['approval'];
							}
			}
				return $position;
			}
		
 ?>