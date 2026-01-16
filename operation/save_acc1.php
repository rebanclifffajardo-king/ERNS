<?php
session_start();
require_once("../db/databaseConnection.php");
$username=mysql_real_escape_string($_POST['username']);
$password=mysql_real_escape_string($_POST['pass']);
$position=mysql_real_escape_string($_POST['position']);
$fname=mysql_real_escape_string($_POST['fname']);
$mname=mysql_real_escape_string($_POST['mname']);
$lname=mysql_real_escape_string($_POST['lname']);
$designation=mysql_real_escape_string($_POST['designation']);
function getPos($id){
	$sql=mysql_query("SELECT * FROM  position  where id='$id'  ");
					 $row = mysql_fetch_array($sql);
					 $app =$row['approval'];
		$sql1=mysql_query("SELECT * FROM  emptbl  where position='$app'  ");
					 $numrow = mysql_fetch_array($sql1);			 
					return	$numrow['id'];
					
					
}
$approval=getPos($position);

$leavecredits="0";
$emp_id="";
		$sql=mysql_query("SELECT * FROM  emptbl  where position='$position'  ");
					 $numrow = mysql_fetch_array($sql);
						if($numrow==0){
							$save = "INSERT INTO   emptbl(fname,mname,lname,position,username,password,approval,type) 
				VALUES 
				('$fname','$mname','$lname','$position','$username','$password','$approval','$designation')";
				$success=mysql_query($save);
	
		$sql=mysql_query("SELECT * FROM  emptbl  where username='$username'  ");
					while($row = mysql_fetch_array($sql)){
					$emp_id= $row['id'];

					}		
				
				
			$save = "INSERT INTO   leavecredits(emp_id,leavecredits) 
				VALUES 
				('$emp_id','$leavecredits')";
				$success=mysql_query($save);		
				$_SESSION['error']="";
						}else{
							$_SESSION['error']="acount with the same position already exist!";
						}
			 
		
	
			header("location: ../changepassword.php");
		
?>