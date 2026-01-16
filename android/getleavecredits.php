<?php
session_start();
require_once("../db/databaseConnection.php");
   $response=array();
$user_name =$_POST['user_name'];
  $emp_id_="";
 
 $sql=mysql_query("select id from emptbl where username='$user_name'");
					while($row_ = mysql_fetch_array($sql)){
  
					
					$emp_id_ =$row_['id'];

   
			$sql_=mysql_query("select * from leavecredits where emp_id='$emp_id_'");
					while($row_ = mysql_fetch_array($sql_)){
				 
					
					$id =$row_['id'];
					$emp_id =($row_['emp_id']);
					$leavecredits =$row_['leavecredits'];
			 	array_push($response,array("id"=>($row_['id']),"emp_id"=>($row_['emp_id']),"leavecredits"=>($row_['leavecredits'])));
				
				}
		 
		
	}
	 echo json_encode(array("server_response"=>$response));
 
 ?>