<?php
 session_start();
require_once("../db/databaseConnection.php");
$id =$_POST['id'];
//$id ="dhally";
 $empid =getEmpID($id); 
		 
			
			
 mysql_query("delete from notif  where empid='$empid' ");
   $response=array();	
 $SQL_=mysql_query("select leavetbl.status,leavetbl.date,leavetbl.from_,leavetbl.to_,leavetbl.id,leavetbl.type,emptbl.username from leavetbl INNER JOIN emptbl ON leavetbl.empid=emptbl.id where status<>''  and empid='$empid' order by leavetbl.date desc");
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
			array_push($response,array("id"=>($row_['id']),"type"=>($row_['type']),"date"=>$date_,"status"=>$status,"from_"=>$from_,"to_"=>$to_,"username"=>$username));
						
 
		

						}
	  
    echo json_encode(array("server_response"=>$response));
  function getEmpID($id){
					$sql=mysql_query("SELECT * FROM  emptbl  where username='$id'  ");
					while($row = mysql_fetch_array($sql)){
					return $row['id'];

					}
					}
 ?>