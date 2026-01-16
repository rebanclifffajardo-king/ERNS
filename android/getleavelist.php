<?php
session_start();
require_once("../db/databaseConnection.php");
 
$user_name =$_POST['user_name'];
 
  
	 $response=array();
	 $sql=mysql_query( "select * from emptbl where username='$user_name'");
		 while($row = mysql_fetch_array($sql)){
	 
		$id=$row['id'];
		//  $id="1";
		 	$SQL_=mysql_query("select * from leavetbl where empid='$id'  order by date desc");
					while($row_ = mysql_fetch_array($SQL_)){
						$status =$row_['status'];
					$date_ =date_create($row_['date']);
					$from_ =date_create($row_['from_']);
					$to_ =date_create($row_['to_']);
					
					$date_ =date_format($date_,"F d, Y");
					$from_ =date_format($from_,"F d, Y");
					$to_ =date_format($to_,"F d, Y");
					if($status=="") $status="pending";
					
					array_push($response,array("type"=>($row_['type']),"date"=>$date_,"status"=>$status,"from_"=>$from_,"to_"=>$to_));
			
					}
				 
		
	 }
	 echo json_encode(array("server_response"=>$response));
	 
 
 ?>