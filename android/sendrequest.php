
<?php
session_start();
require_once("../db/databaseConnection.php");
 $id_ = $_POST['id_'];
$purposetype = $_POST['purposetype'];
$bustype = $_POST['bustype'];
$purpose = $_POST['purpose'];
$destination_value = $_POST['destination_value'];
$timein = $_POST['timein'];
$timeout = $_POST['timeout'];
$date_ = $_POST['date_'];
 
 
 $save = "INSERT INTO leaverequest (empid,purpose,purposetype,bustype,destination,timein,timeout,date_) VALUES ('$id_','$purposetype','$purpose','$bustype','$destination_value','$timein','$timeout','$date_')";
				$success=mysql_query($save);
			 echo "Leave Request Sucess...";	
				
  
 
 
 ?>