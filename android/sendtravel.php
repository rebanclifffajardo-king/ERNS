
<?php
session_start();
require_once("../db/databaseConnection.php");
 $id_ = $_POST['id_'];
$txtdeparture_ = $_POST['txtdeparture_'];
$txtreturn_ = $_POST['txtreturn_'];
$txtdestination_ = $_POST['txtdestination_'];
$txtstation_ = $_POST['txtstation_'];
$txtreport_ = $_POST['txtreport_'];
$txtpurpose_ = $_POST['txtpurpose_'];

$datetoday =  date('Y-m-d');
  
		 
						 $SQL_=mysql_query("SELECT * FROM  emptbl WHERE id='$id_' ");
							$result = mysql_fetch_array($SQL_);
					 
						$designation= $result['position'];
							
					
 	$save = "INSERT INTO traveltbl  (empid,designation,departure_date,return_date,station,destination,report,purpose,date_today) 
		VALUES ('$id_','$designation','$txtdeparture_','$txtreturn_','$txtstation_','$txtdestination_','$txtreport_','$txtpurpose_','$datetoday')";
				$success=mysql_query($save);
				 echo "Leave Request Sucess...";
  
 
 
 

 ?>