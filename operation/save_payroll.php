<?php
session_start();
require_once("../db/databaseConnection.php");
$payrollID=mysql_real_escape_string($_POST['payrollID']);
$_SESSION['payrollID']=$payrollID;
mysql_query("delete from   dtrtbl  where payrollid='$payrollID'");


$id_=mysql_real_escape_string($_POST['empid']);
$_SESSION['empid']=$id_;
$from_=mysql_real_escape_string($_POST['from_']);
$to_=mysql_real_escape_string($_POST['to_']);
$date1=$from_;
$date2=$to_;

$datediff = strtotime($date2) - strtotime($date1);
$loop = floor($datediff/(60*60*24));
$date_ = new DateTime($date1);
for($i=0;$i <= $loop; $i++)
		{
			$am_in="";
			$am_out="";
			$pm_in="";
			$pm_out="";
		 
			$date_daily="";		
			$type="";
			$typeofleave="";
			
			$date_ = date('Y-m-d' ,strtotime($date1."+".$i." day"));

			$date_final =new DateTime($date_);
			
			$day =  $date_final->format("w");
			$type=($_POST['arrivalAM'.$i.'_1']);
		
			$date_new=date_create($date_);
			
			if($type=="weekend"){
			$type="weekend";
			$date_daily=$date_;		
						$save = "INSERT INTO  dtrtbl(empid,TimeIn,TimeOut,TimeIn2,TimeOut2,date_,type,leaveType,payrollid)  VALUES  ('','$id_','$am_in','$am_out','$pm_in','$pm_out','$date_daily','weekend','','$payrollID')";
						$success=mysql_query($save);
			}elseif($type=="leave"){
					$typeofleave=($_POST['typeofleave'.$i.'_1']);
						$date_daily=$date_;	
						$save = "INSERT INTO  dtrtbl(empid,TimeIn,TimeOut,TimeIn2,TimeOut2,date_,type,leaveType,payrollid)  VALUES  ('','$id_','$am_in','$am_out','$pm_in','$pm_out','$date_daily','leave','$typeofleave','$payrollID')";
						$success=mysql_query($save);
			}else{
				$date_daily=$date_;	
			$am_in=($_POST['arrivalAM'.$i.'_1']);
			$am_out=($_POST['departureAM'.$i.'_2']);
			$pm_in=($_POST['arrivalPM'.$i.'_3']);
			$pm_out=($_POST['departurePM'.$i.'_4']);
		 
					$save = "INSERT INTO  dtrtbl(empid,TimeIn,TimeOut,TimeIn2,TimeOut2,date_,type,leaveType,payrollid)  VALUES  ('','$id_','$am_in','$am_out','$pm_in','$pm_out','$date_daily','regular','','$payrollID')";
					$success=mysql_query($save);
			}
			
		 
			$numdays++;
			}
			$_SESSION['payrollID']=$payrollID;
			header("location: ../dtr_print.php");
			?>

			
		
			
		
?>