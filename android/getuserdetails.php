<?php
session_start();
require_once("../db/databaseConnection.php");
	
$username_ =$_POST['user_name'];
//$username_ ="chancellor";
$position=getpositionID($username_);
//echo "position:".$position;
	  $response=array();				
							$sql=mysql_query("SELECT * FROM  emptbl WHERE username='$username_'  ");
							$row = mysql_fetch_array($sql);
							$mid= $row['id'];
							
 $SQL_=mysql_query("SELECT * FROM  leavetbl where status='' and approval='$mid' and status='' ");
					while($crow = mysql_fetch_array($SQL_)){
									$id =$crow['id'];
									$empid =$crow['empid'];
									$isPosition =checkIfFromPosition($empid);
									$name =getName($empid);
									$from_ =$crow['from_'];
									$to_ =$crow['to_'];
									$type =$crow['type'];
									$date =$crow['date'];
									$status =$crow['status'];
											$clear =getPartialApp($id);
								//	if($isPosition==$position){
										array_push($response,array("id"=>($id),"empid"=>($empid),"name"=>($name),"from_"=>($from_),"to_"=>($to_),"type"=>($type),"date"=>($date),"status"=>($status),"clear"=>$clear));
							
								//	}
									
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
		function getPartialApp($id){
					$name="";
					$sql=mysql_query("SELECT * FROM   tracker  where leaveid='$id'  ");
					while($row = mysql_fetch_array($sql)){
					$name=$name."/".getName1($row['cleared']);

					}
					return $name;
					}
 function getName1($id){
					$sql=mysql_query("SELECT * FROM   emptbl  where id='$id'  ");
					while($row = mysql_fetch_array($sql)){
					return $row['fname']." ".$row['mname']." ".$row['lname'];

					}
					}
 ?>