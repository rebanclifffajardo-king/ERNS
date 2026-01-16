<?php
session_start();
require_once("../db/databaseConnection.php");
	
$emp_id=$_POST['id_'];
$date1=$_POST['txtfrom_'];
$date2=$_POST['txtto_'];
$type=$_POST['leavetype'];
$emp_id=getID($emp_id);
 
 
function getID($emp_id){
	
			$sql=mysql_query("select * from emptbl where username='$emp_id'");
			 $row = mysql_fetch_array($sql);
			return $row['id'];
}

$datediff = strtotime($date2) - strtotime($date1);
$loop = floor($datediff/(60*60*24));
$date_ = new DateTime($date1);
$countDays=0;
//echo "<br/>loop:".$loop;
	$val_=0;
for($i=0;$i <= $loop; $i++) {
	$date_ = date('Y-m-d' ,strtotime($date1."+".$i." day"));
					$SQL_=mysql_query("SELECT * FROM  leavetbl  WHERE  empid='$emp_id' and status='approved' ");
							
										while($row = mysql_fetch_array($SQL_)){
											$from_=$row['from_'];
											$to_=$row['to_'];
											if (($date_ >= $from_) && ($date_ <= $to_))
											{
												$val_++;
											   
											}
											if (($date_ >= $from_) && ($date_ <= $to_))
											{
												$val_++;
											   
											}
											
										}
									
	
	$date_final =new DateTime($date_);
	$day =  $date_final->format("w");
	if($day == 6 || $day == 0){
	}else{
		$countDays++;
	}
	
}

if($type=='Maternity Leave'){

		
			$sql=mysql_query("select * from maternityleave");
			 $row = mysql_fetch_array($sql);
			$maternity_credits=$row['maternity_credits'];
	
	
	
//echo "<br/>maternity_credits:".$maternity_credits;	
if($countDays>$maternity_credits){ echo "Not enough Credits to File a Maternity Leave"; }
else{
	
	
	$SQL_=mysql_query("SELECT * FROM  leavetbl  WHERE  empid='$emp_id' and status='approved' ");
			$val=0;
					while($row = mysql_fetch_array($SQL_)){
						$from_=$row['from_'];
						$to_=$row['to_'];
						if (($date1 >= $from_) && ($date1 <= $to_))
						{
							$val++;
						   
						}
						if (($date2 >= $from_) && ($date2 <= $to_))
						{
							$val++;
						   
						}
						
					}
				if($val>0){
					echo "You already applied a Leave for that Day!"; 
				}else{
					echo "in range "; 
				}
			

	}
	
}
if($type=="Sick Leave"){
		$datetoday=date('Y-m-d');
		$datediff = strtotime($datetoday) - strtotime($date1);
		if($datediff>=0){
			$sql=mysql_query("select * from leavecredits where emp_id='$emp_id' ");
			 $row = mysql_fetch_array($sql);
			$leavecredits=$row['leavecredits'];
			if($leavecredits>0){
				//echo "<br/>leavecredits:".$leavecredits;	
				if($countDays>$leavecredits){ echo "Not enough Credits to File a Leave"; }
			else{ 
			$SQL_=mysql_query("SELECT * FROM  leavetbl  WHERE  empid='$emp_id' and status='approved' ");
			$val=0;
					while($row = mysql_fetch_array($SQL_)){
						$from_=$row['from_'];
						$to_=$row['to_'];
						if (($date1 >= $from_) && ($date1 <= $to_))
						{
							$val++;
						   
						}
						if (($date2 >= $from_) && ($date2 <= $to_))
						{
							$val++;
						   
						}
						
					}
				if($val>0){
					echo "You already applied a Leave for that Day!"; 
				}else{
					echo "in range "; 
				}
			
			
			
			}
			
			}else{
				echo "No More Leave Credits";
			}
			
			
		}else{
			echo "You should apply for Sick Leave On or After the day"; 
		}
		
	}


else{
	 
  $sql=mysql_query("select * from leavecredits where emp_id='$emp_id' ");
			 $row = mysql_fetch_array($sql);
			$leavecredits=$row['leavecredits'];
			if($leavecredits>0){
				//echo "<br/>leavecredits:".$leavecredits;	
			if($countDays>$leavecredits){ echo "Not enough Credits to File a Leave"; }
		else{ 
		$SQL_=mysql_query("SELECT * FROM  leavetbl  WHERE  empid='$emp_id' and status='approved' ");
			$val=0;
					while($row = mysql_fetch_array($SQL_)){
						$from_=$row['from_'];
						$to_=$row['to_'];
						if (($date1 >= $from_) && ($date1 <= $to_))
						{
							$val++;
						   
						}
						if (($date2 >= $from_) && ($date2 <= $to_))
						{
							$val++;
						   
						}
						
					}
				if($val>0){
					echo "You already applied a Leave for that Day!"; 
				}else{
					echo "in range "; 
				}
		
		
		
		}
	
			}
			else{
				echo "No More Leave Credits";
			}
	
	
	
}


	 
		
?>