<?php
session_start();
 require_once("../db/databaseConnection.php");
  $id_="";

	 $response=array();
	 
		  $sql_= "select * from maternityleave";
 
			 $sql=mysql_query("select * from maternityleave");
		 
				while($row_=mysql_fetch_array($sql)){
					$id =$row_['id'];
				//	$emp_id =($row_['emp_id']);
					$maternity_credits =$row_['maternity_credits'];
					//if($status=="") $status="pending";
					
					//array_push($response,array("type"=>($row_['type']),"date"=>$date_,"status"=>$status,"from_"=>$from_,"to_"=>$to_));
				array_push($response,array("maternity_credits"=>($row_['maternity_credits'])));
				
				}
				 
		
	// }
	 echo json_encode(array("server_response"=>$response));
	 
 
 ?>