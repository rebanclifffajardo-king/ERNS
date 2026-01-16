
<?php
 session_start();
require_once("../db/databaseConnection.php");
	
	 $id = $_POST['id_'];
 
 
$leavetype = $_POST['leavetype'];
$txtfrom_ = $_POST['txtfrom_'];
$txtto_ = $_POST['txtto_'];
$datetoday =  date('Y-m-d H:i:s');
$position = getApproval($id);
/*
 $id_ = "1";
$leavetype = "Sick Leave";
$txtfrom_ =date('Y-m-d');
$txtto_ =date('Y-m-d');
*/


function getID($emp_id){
	
			$sql=mysql_query("select * from emptbl where username='$emp_id'");
			 $row = mysql_fetch_array($sql);
			return $row['id'];
}
function getApproval($emp_id){
	
			$sql=mysql_query("select * from emptbl where id='$emp_id'");
			 $row = mysql_fetch_array($sql);
			return $row['approval'];
}


 //$id_ = "1";
//$leavetype = "Sick Leave";
//$txtfrom_ =date('Y-m-d');
//$txtto_ =date('Y-m-d');

 $sql = mysql_query("INSERT INTO leavetbl  (empid,from_,to_,type,date,approval) VALUES ('$id','$txtfrom_','$txtto_','$leavetype','$datetoday','$position')");
 									
 	$save = "INSERT INTO  reqnotif(id,stat) 
				VALUES 
				('$empid','pending')";
				$success=mysql_query($save);

 echo "Leave Request Sucess...";
 
 
 ?>