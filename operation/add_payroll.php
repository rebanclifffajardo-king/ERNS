<?php
session_start();
require_once("../db/databaseConnection.php");
$payrollname=mysql_real_escape_string($_POST['payrollname']);
$from_=mysql_real_escape_string($_POST['from_']);
$to_=mysql_real_escape_string($_POST['to_']);
$datetoday=date("Y-m-d");
	$save = "INSERT INTO  payroll(payrollName,from_,to_,date_today) 
				VALUES 
				('$payrollname','$from_','$to_','$datetoday')";
				$success=mysql_query($save);
				
				
			header("location: ../dtr.php");
		
?>