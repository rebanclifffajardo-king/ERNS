<?php
 
 session_start();
require_once("../db/databaseConnection.php");
 $user_name =$_POST['user_name'];
 
 
 //$user_name ="dhally";
   $response=array();	
   
	   $SQL_=mysql_query("SELECT * FROM  emptbl WHERE  username='$user_name' ");
					while($row = mysql_fetch_array($SQL_)){
									  array_push($response,array("name"=>($row['fname']." ".$row['lname']),"position"=>$row['position'],"id"=>$row['id'],"positionName"=>getPositionName($row['position'])));
									
							}
	 
	 echo json_encode(array("server_response"=>$response));
	 
 
 
  function getPositionName($id){
					$sql=mysql_query("SELECT * FROM    position   where  	id='$id'  ");
					while($row = mysql_fetch_array($sql)){
					return $row['position'];

					}
					}
 ?>