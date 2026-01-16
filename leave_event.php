<?php
session_start();
require_once("db/databaseConnection.php");
$response =array();

	$sql=mysql_query("SELECT * FROM leavetbl");
			while($row = mysql_fetch_array($sql)){
				$type  =$row['type'];
				$from_  =$row['from_'];
				$to_  =$row['to_'];
			 array_push($response,array("title"=>$row['type'],"start"=>$row['from_'],"end"=>$row['to_']));
			}
	/*	$sql=mysql_query("SELECT * FROM leaverequest");
			while($row = mysql_fetch_array($sql)){
				$empid  =$row['empid'];
				$purpose  =$row['purpose'];
				$bustype  =$row['bustype'];
				$destination  =$row['destination'];
				$date_  =$row['date_'];
				$destination  =$row['destination'];
				$name=gettname($empid);
				$type  =$name."-".$purpose."-".$destination;
				
			 array_push($response,array("title"=>$name,"start"=>$row['date_']));
			}		
		*/
			
				function gettname($id){
				$sql_=mysql_query("SELECT * FROM    emptbl  WHERE id='$id'");
					$row_ = mysql_fetch_array($sql_);
					$name  =($row_['fname']." ".$row_['lname']);
				
			return $name;
		}
		
		
	 echo json_encode($response);
?>