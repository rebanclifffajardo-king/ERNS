
<?php
session_start();
require_once("../db/databaseConnection.php");
	
	
 $id_ = $_POST['empid'];
  $payrollid = $_POST['payrollid'];
 //$id_ = "dhally";
 $id_=getID($id_);
 $date_today =  date('Y-m-d H:i:s');
$position = getApproval($id_);
function getID($emp_id){
	
			$sql=mysql_query("select * from emptbl where username='$emp_id'");
			 $row = mysql_fetch_array($sql);
			return $row['id'];
}
$save = "INSERT INTO  justification	(empid,payroll,date_today,status,approval)  VALUES  ('$id_','$payrollid','$date_today','','$position')";
						$success=mysql_query($save);
						
						
	function getApproval($emp_id){

	$sql=mysql_query("select * from emptbl where id='$emp_id'");
	$row = mysql_fetch_array($sql);
	return $row['approval'];
	}

						
 ?>