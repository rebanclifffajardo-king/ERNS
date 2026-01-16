<?php
session_start();
 require_once("../db/databaseConnection.php");

   $response=array();	
   
	   $SQL_=mysql_query("SELECT * FROM  payroll  ");
					while($row = mysql_fetch_array($SQL_)){
									  array_push($response,array("id"=>($row['id']),"payrollName"=>$row['payrollName'],"from_"=>$row['from_'],"to_"=> ($row['to_']),"date_today"=> ($row['date_today'])));
									
							}
	 
	 echo json_encode(array("server_response"=>$response));
	 
 
 
  function getPositionName($id){
					$sql=mysql_query("SELECT * FROM    position   where  	id='$id'  ");
					while($row = mysql_fetch_array($sql)){
					return $row['position'];

					}
					}
 ?>