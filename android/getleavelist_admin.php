<?php
session_start();
require_once("../db/databaseConnection.php");
 
$user_name =$_POST['user_name'];
 
  //$result=mysqli_query($con,$sql);
	 $response=array();
	  	 $SQL_=mysql_query("select leavetbl.status,leavetbl.date,leavetbl.from_,leavetbl.to_,leavetbl.id,leavetbl.type,emptbl.username from leavetbl INNER JOIN emptbl ON leavetbl.empid=emptbl.id where status='' order by leavetbl.date desc");
					while($row_ = mysql_fetch_array($SQL_)){
					$status =$row_['status'];
					$date_ =date_create($row_['date']);
					$from_ =date_create($row_['from_']);
					$to_ =date_create($row_['to_']);
					$id =$row_['id'];
					$date_ =date_format($date_,"F d, Y");
					$from_ =date_format($from_,"F d, Y");
					$to_ =date_format($to_,"F d, Y");
					$username =($row_['username']);
					$type =$row_['type'];
					if($status=="") $status="pending";
					
					//array_push($response,array("type"=>($row_['type']),"date"=>$date_,"status"=>$status,"from_"=>$from_,"to_"=>$to_));
				array_push($response,array("id"=>($row_['id']),"type"=>($row_['type']),"date"=>$date_,"status"=>$status,"from_"=>$from_,"to_"=>$to_,"username"=>$username));
				
					}
		 
		 
		
	// }
	 echo json_encode(array("server_response"=>$response));
	  
 
 ?>