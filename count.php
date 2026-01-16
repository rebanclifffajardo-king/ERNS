<?php
session_start();
require_once("db/databaseConnection.php");
$username=$_SESSION['username'];
$password=$_SESSION['password'];
$staff=false;
$admin=false;
$employee=false;
	 
			$sql=mysql_query("SELECT * FROM  emptbl WHERE username='$username' and password='$password'");
				$row = mysql_fetch_array($sql);
				$mid= $row['id'];
				$accid= $row['position'];
				$fname=  $row['fname'];
				$lname=  $row['lname'];
				$mname=  $row['mname'];
				$name=  $fname." ".$mname." ".$lname;
				
				$sql1=mysql_query("SELECT * FROM  position  WHERE id='$accid' ");
				$row = mysql_fetch_array($sql1);
				$approval= $row['approval'];
				$position= $row['position'];
				$_SESSION['approval']=$approval;
				
				if($position=="Staff"){
					/* $staff=false;
					 $admin=true;
					 $employee=false;
					 $oic=false;
					 */
					 $staff=false;
					 $admin=false;
					 $employee=true;
					  $oic=false;
				}
				else if($position=="Admin Officer"){
					 $staff=false;
					 $admin=true;
					 $employee=true;
					  $oic=false;
				}
				else if($position=="Officer In Charge"){
					 $staff=false;
					 $admin=true;
					 $oic=true;
					 $employee=false;
				}
				else{
					 $staff=false;
					 $admin=false;
					 $employee=true;
					  $oic=false;
				}
			
				
			$sql=mysql_query("SELECT * FROM  leavetbl where status='' and approval='$mid'");
			$pending = mysql_num_rows($sql);
			$sql=mysql_query("SELECT * FROM  leavetbl where status='approved' and approval='$mid'");
			$approved = mysql_num_rows($sql);
			$sql=mysql_query("SELECT * FROM  leavetbl where status='rejected' and approval='$mid'");
			$rejected = mysql_num_rows($sql);
			$sql=mysql_query("SELECT * FROM  leavetbl where status='' and approval='$mid'");
			$inprogress = mysql_num_rows($sql)
?>