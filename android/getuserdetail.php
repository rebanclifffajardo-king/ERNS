<?php

session_start();
require_once("../db/databaseConnection.php");

	
$username_ =$_POST['user_name'];
//$username_ ="bsit";
//$username_ ="dhally";
$mid=getID($username_);



	  $response=array();				
							$sql=mysql_query("SELECT * FROM  emptbl WHERE username='$username_'  ");
							$row = mysql_fetch_array($sql);
							$id= $row['id'];
							$name =$row['fname']." ".$row['mname']." ".$row['lname'];
							$position= getposition($row['position']);
							$credit=getleavecredit($id);
							if($credit=="") $credit="0";
							$count=getnotif($mid);
							$counta=getnotifapproved($mid);
							$countr=getnotifrejected($mid);
							$countp=getnotifpending($mid);
										array_push($response,array("id"=>($id),"name"=>($name),"position"=>($position),"leavecredits"=>($credit),"count"=>($count),"counta"=>($counta),"countr"=>($countr),"countp"=>($countp)));
						 
						 
					
							 
 
 echo json_encode(array("server_response"=>$response));
  function getnotif($mid){
				 
					$sql=mysql_query("SELECT * FROM    leavetbl   where approval='$mid' and status=''  ");
					 $numrow = mysql_num_rows($sql);
					return $numrow;

  }
   function getnotifapproved($mid){
				 
					$sql=mysql_query("SELECT * FROM    reqnotif   where id='$mid' and stat='approved'  ");
					 $numrow = mysql_num_rows($sql);
					return $numrow;

  }
    function getnotifrejected($mid){
				 
					$sql=mysql_query("SELECT * FROM    reqnotif   where id='$mid' and stat='rejected'  ");
					 $numrow = mysql_num_rows($sql);
					return $numrow;

  }
    function getnotifpending($mid){
				 
					$sql=mysql_query("SELECT * FROM    reqnotif   where id='$mid' and stat='pending'  ");
					 $numrow = mysql_num_rows($sql);
					return $numrow;

  }
  
   function getID($id){
					$sql=mysql_query("SELECT * FROM    emptbl   where  username='$id'  ");
					while($row = mysql_fetch_array($sql)){
					return $row['id'];

					}
					}
 function getposition($id){
					$sql=mysql_query("SELECT * FROM    position    where  id='$id'  ");
					while($row = mysql_fetch_array($sql)){
					return $row['position'];

					}
					}
  function getleavecredit($id){
					$sql=mysql_query("SELECT * FROM    leavecredits    where  	emp_id='$id'  ");
					while($row = mysql_fetch_array($sql)){
					return $row['leavecredits'];

					}
					}
 
   
		
 ?>