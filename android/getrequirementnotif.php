<?php
  
session_start();
 require_once("../db/databaseConnection.php");
$empid =$_POST['id'];
//$empid ="bsit";
$empid =getEmpID($empid); 
 
	
	
  
	 $response=array();
	  $SQL_=mysql_query("select * from notif where empid='$empid'");
					while($row_ = mysql_fetch_array($SQL_)){
					$id =$row_['id'];
					$empid =$row_['empid'];
					$requirements =($row_['requirements']);
					$sent =$row_['sent'];
				 
				array_push($response,array("id"=>($row_['id']),"empid"=>($row_['empid']),"requirements"=>$requirements,"sent"=>$sent));			
							}
	 
		 
 
	 echo json_encode(array("server_response"=>$response));
	 
  
  function getEmpID($id){
					$sql=mysql_query("SELECT * FROM  emptbl  where username='$id'  ");
					while($row = mysql_fetch_array($sql)){
					return $row['id'];

					}
					}
 ?>