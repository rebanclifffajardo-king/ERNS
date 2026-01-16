<?php
session_start();
require_once("../db/databaseConnection.php");
$user_name =$_POST['user_name'];
//$user_name ='dhally';
 $empid =getEmpID($user_name); 
$status=$_POST['status'];
	mysql_query("delete from notif  where empid='$empid' ");
	 
			if($status=="pending") mysql_query("DELETE FROM reqnotif WHERE id='$empid' and stat='pending'");
			if($status=="rejected") mysql_query("DELETE FROM reqnotif WHERE id='$empid' and stat='rejected'");
			if($status=="approved") mysql_query("DELETE FROM reqnotif WHERE id='$empid' and stat='approved'");
			
			
 //$status='pending';
 //$user_name ="jhon";
	  if($status=="pending"){
		  $status="";
	  }
 
	 $response=array();
 
  $SQL_=mysql_query("select leavetbl.status,leavetbl.date,leavetbl.from_,leavetbl.to_,leavetbl.id,leavetbl.type,emptbl.username,,leavetbl.empid from leavetbl INNER JOIN emptbl ON leavetbl.empid=emptbl.id where status='$status' and empid='$empid' order by leavetbl.date desc");
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
					$username =getName($row_['empid']);
					$type =$row_['type'];
					if($status=="") $status="pending";
				 
					$clear =getPartialApp($id);
			 		array_push($response,array("id"=>($row_['id']),"type"=>($row_['type']),"date"=>$date_,"status"=>$status,"from_"=>$from_,"to_"=>$to_,"username"=>$username,"clear"=>$clear));
				
				
				}
		 
		
	// }
	 echo json_encode(array("server_response"=>$response));
 
	 
	  function getEmpID($id){
					$sql=mysql_query("SELECT * FROM  emptbl  where username='$id'  ");
					while($row = mysql_fetch_array($sql)){
					return $row['id'];

					}
					}
 function getPartialApp($id){
					$name="";
					$sql=mysql_query("SELECT * FROM   tracker  where leaveid='$id'  ");
					while($row = mysql_fetch_array($sql)){
					$name=$name."/".getName($row['cleared']);

					}
					return $name;
					}
 function getName($id){
					$sql=mysql_query("SELECT * FROM   emptbl  where id='$id'  ");
					while($row = mysql_fetch_array($sql)){
					return $row['fname']." ".$row['mname']." ".$row['lname'];

					}
					}					
					
 ?>