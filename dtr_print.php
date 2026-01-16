	<?php
session_start();
require_once("db/databaseConnection.php");

		function getEmpname($id){
						$sql=mysql_query("SELECT * FROM  emptbl WHERE id='$id' ");
					
							 $row = mysql_fetch_array($sql);
								$name= $row['fname']." ".$row['mname']." ".$row['lname'];
								return $name;
							
					}
			function getEmpname1($id){
						$sql=mysql_query("SELECT * FROM  emptbl WHERE position='$id' ");
					
							 $row = mysql_fetch_array($sql);
								$name= $row['fname']." ".$row['mname']." ".$row['lname'];
								return $name;
							
					}		
$empid=($_SESSION['empid']);  
$name_=getEmpname($_SESSION['empid']);  
$name=getEmpname($_SESSION['empid']);  
$id_=($_SESSION['payrollID']); 	
 
$sname=getEmpname1($_SESSION['approval']);
 $payrollID_=$_SESSION['payrollID'];
//	echo "payrollID_:".$payrollID_;

//	echo "\n empid:".$empid;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>ERNS</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
<link rel="stylesheet" href="plugins/morris/morris.css">
<link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
<link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="dist/css/jquery.bracket.min.css" />
<script src="dist/js/jquery-1.11.0.min.js"></script>
	<script type="text/javascript">
<!--

window.print();
//-->
</script>
</head>
<body class="hold-transition skin-blue layout-boxed sidebar-mini">
<div>

  

  <div >
   

    <section>
         <div class="row">
        <div class="col-xs-12">
          <div>
    
				   <div class="col-xs-12">
		<a href="report.php" target="blank">HOME</a>
			
			</div >
            <div>
	

			 
		 <form>
		     <div class="row">
				<div class="col-xs-6" style=" font-size: 8px; ">
				 <p style=" text-align: center; ">Civil Service Form No. 48</p>
				<p style=" text-align: center; ">DAILY TIME RECORD</p>
			<p>NAME: <b><u><?php echo $name; ?> </u></b></p>
	
<input type="hidden" name="empid" value="<?php echo $empid; ?> " />
				 	<?php
					function getFrom($id_){
								$sql=mysql_query("SELECT * FROM   payroll   where id='$id_' ");
									while($row = mysql_fetch_array($sql)){
											$fromTmp_=date('Y-m-d', strtotime($row['from_']));
										$toTmp_=date('Y-m-d', strtotime($row['to_']));
										return $fromTmp_;
									}
					}
					function getTo($id_){
							$sql=mysql_query("SELECT * FROM   payroll   where id='$id_' ");
								while($row = mysql_fetch_array($sql)){
							
									$toTmp_=date('Y-m-d', strtotime($row['to_']));
									return $toTmp_;
					}	}

								
						$sql=mysql_query("SELECT * FROM  dtrtbl  where payrollid='$id_' and empid='$empid' ORDER BY date_");
						$numrow = mysql_num_rows($sql);	
					//	echo "no of rows:".$numrow;
						if($numrow>0){
						$crow = mysql_fetch_array($sql);
						 $payrollid= ($crow['payrollid']);
						$from1_= getFrom($payrollid);
						$to1_= getTo($payrollid);
					//	echo "payorolid".$payrollID_;
						// echo "myval:".$from1_;
						?>
								<p  >For the month of: <b><u><?php echo  date('F Y', strtotime($from1_)); ?> </u></b></p>
							<p   >Official hours of arrival (regular day) and departure</p>
			
						<br/>
				
					 
				
						<table   class="table table-bordered" style=" font-size: 8px; ">
							<thead>
							<tr>
							<th>Date</th>
						
							<th colspan=2>AM</th>
							<th  colspan=2>PM</th>
							 
							</tr>
							<tr>
							<th></th>

							<th>Arrival</th>
							<th>Departure</th>
							<th>Arrival</th>
							<th>Departure</th>
						 
						
							</tr>
							</thead>
						 	<?php
							function getLeave($id,$dateTmp){
								
								$leaveFound="";
									$sql=mysql_query("SELECT * FROM  leavetbl  WHERE empid='$id' and status='approved' ");
									while($row = mysql_fetch_array($sql)){
									$type= $row['type'];
										$fromTmp_=date('Y-m-d', strtotime($row['from_']));
										$toTmp_=date('Y-m-d', strtotime($row['to_']));
									
									 if (($dateTmp >= $fromTmp_) && ($dateTmp  <= $toTmp_)){
										 $leaveFound=$type;
									 }
									
								
								}
								return $leaveFound;
							}
							
								$date1=$from1_;
								$date2=$to1_;
									
								?>
								<input type="hidden" name="payrollID" value="<?php  echo $payrollID; ?>" />
								<input type="hidden" name="from_" value="<?php  echo $date1; ?>" />
								<input type="hidden" name="to_" value="<?php  echo $date2; ?>" />
								<?php
							$sql=mysql_query("SELECT * FROM  dtrtbl  where payrollid='$id_' and empid='$empid' ORDER BY date_");
							while($row = mysql_fetch_array($sql))
									{
									
									$am_in=($row['TimeIn']);
									$am_out=($row['TimeOut']);
									$pm_in=($row['TimeIn2']);
									$pm_out=($row['TimeOut2']);
									if($am_in==""){
										$am_in=  "";
									}else{
										$am_in=  date('H:i A', strtotime($am_in));
									}
									if($am_out==""){
										$am_out=  "";
									}else{
										$am_out=  date('H:i A', strtotime($am_out));
									}
									 if($pm_in==""){
										$pm_in=  "";
									}else{
										$pm_in=  date('H:i A', strtotime($pm_in));
									}
									if($pm_out==""){
										$pm_out=  "";
									}else{
										$pm_out=  date('H:i A', strtotime($pm_out));
									}
									 
									
									 
									 
									$date_=($row['date_']);
									$type=($row['type']);
									$leaveType=($row['leaveType']);
									$payrollid=($row['payrollid']);
								
						
							
									$date_final =new DateTime($date_);
									$day =  $date_final->format("w");
									if($day == 6 || $day == 0){
										$date_new=date_create($date_);
										?>
										<tr  style="  text-align: center;"> 
										<td><input type="hidden" name="date_<?php echo $i; ?>" value="<?php  echo $date_; ?>" /><?php  echo date_format($date_new,"F d, Y"); ?> </td>
										<td colspan=7><input type="hidden" name="arrivalAM<?php echo $i."_1"; ?>" value="weekend" /><span style="color:red"><b>--------------------WEEKEND--------------------</b><span></td>
										</tr>
										<?php
									}else{
										$date_new=date_create($date_);
										$dateCheck=date('Y-m-d', strtotime($date_));
										$dateFrom=date('Y-m-d', strtotime($date1));
										$dateTo=date('Y-m-d', strtotime($date2));
									?>
										<tr  style="  text-align: center;"> 
										<td><input type="hidden" name="date_<?php echo $i; ?>" value="<?php  echo $date_; ?>" /><?php  echo date_format($date_new,"F d, Y"); ?> </td>
										<?php
											$leaveTmp=getLeave($empid,$dateCheck); 
											if($leaveTmp<>""){
												?>
											<td colspan=7><input type="hidden" name="arrivalAM<?php echo $i."_1"; ?>" value="leave" /><input type="hidden" name="typeofleave<?php echo $i."_1"; ?>" value="<?php echo $leaveTmp; ?>" /><span style="color:blue"><b><?php echo $leaveTmp; ?></b><span></td>
											<?php
											}else{ 
										
											?> 
													<td>  <?php echo $am_in; ?></td>
													<td> <?php echo $am_out; ?></td>
													<td> <?php echo $pm_in; ?></td>
													<td>  <?php echo $pm_out; ?></td>
											 	<?php
											}
											?>

										</tr>
									<?php
									$numdays++;
									}
									?>
								
									<?php
									$i++;
									}
									
									
									?>
					
					</table>	
				 
					
						<?php
						
						
						
						}
					?>
						<p style=" text-align: center; ">I certify and honor that the above is true and correct report of 
						the hours of work performed, records of which was more daily at the time 
						of arrival and at the time of departure from office.</p>
					<p style=" text-align: center; "><u><?php echo $name_; ?> </u></p>
					<p style=" text-align: center; "> Verified as to prescribe office hours</p>
					<p style=" text-align: center; "><u>REMELGIO G. DUYAN</u></p>
					<p style=" text-align: center; "> Administrative Officer</p> 
				
				 </div>
				 <div class="col-xs-6" style=" font-size: 8px; ">
				 <p style=" text-align: center; ">Civil Service Form No. 48</p>
				<p style=" text-align: center; ">DAILY TIME RECORD</p>
			<p>NAME: <b><u><?php echo $name; ?> </u></b></p>
	
<input type="hidden" name="empid" value="<?php echo $empid; ?> " />
				 	<?php
				 

								
						$sql=mysql_query("SELECT * FROM  dtrtbl  where payrollid='$id_' and empid='$empid' ORDER BY date_");
						$numrow = mysql_num_rows($sql);	
					//	echo "no of rows:".$numrow;
						if($numrow>0){
						$crow = mysql_fetch_array($sql);
						 $payrollid= ($crow['payrollid']);
						$from1_= getFrom($payrollid);
						$to1_= getTo($payrollid);
					//	echo "payorolid".$payrollID_;
						// echo "myval:".$from1_;
						?>
								<p  >For the month of: <b><u><?php echo  date('F Y', strtotime($from1_)); ?> </u></b></p>
							<p  >Official hours of arrival (regular day) and departure</p>
			
						<br/>
				
					 
				
						<table   class="table table-bordered" style=" font-size: 8px; ">
							<thead>
							<tr>
							<th>Date</th>
						
							<th colspan=2>AM</th>
							<th  colspan=2>PM</th>
							 
							</tr>
							<tr>
							<th></th>

							<th>Arrival</th>
							<th>Departure</th>
							<th>Arrival</th>
							<th>Departure</th>
						 
						
							</tr>
							</thead>
						 	<?php
							 
							
								$date1=$from1_;
								$date2=$to1_;
									
								?>
								<input type="hidden" name="payrollID" value="<?php  echo $payrollID; ?>" />
								<input type="hidden" name="from_" value="<?php  echo $date1; ?>" />
								<input type="hidden" name="to_" value="<?php  echo $date2; ?>" />
								<?php
							$sql=mysql_query("SELECT * FROM  dtrtbl  where payrollid='$id_' and empid='$empid' ORDER BY date_");
							while($row = mysql_fetch_array($sql))
									{
									
									$am_in=($row['TimeIn']);
									$am_out=($row['TimeOut']);
									$pm_in=($row['TimeIn2']);
									$pm_out=($row['TimeOut2']);
									if($am_in==""){
										$am_in=  "";
									}else{
										$am_in=  date('H:i A', strtotime($am_in));
									}
									if($am_out==""){
										$am_out=  "";
									}else{
										$am_out=  date('H:i A', strtotime($am_out));
									}
									 if($pm_in==""){
										$pm_in=  "";
									}else{
										$pm_in=  date('H:i A', strtotime($pm_in));
									}
									if($pm_out==""){
										$pm_out=  "";
									}else{
										$pm_out=  date('H:i A', strtotime($pm_out));
									}
									 
									 
									 
									$date_=($row['date_']);
									$type=($row['type']);
									$leaveType=($row['leaveType']);
									$payrollid=($row['payrollid']);
								
						
							
									$date_final =new DateTime($date_);
									$day =  $date_final->format("w");
									if($day == 6 || $day == 0){
										$date_new=date_create($date_);
										?>
										<tr  style="  text-align: center;"> 
										<td><input type="hidden" name="date_<?php echo $i; ?>" value="<?php  echo $date_; ?>" /><?php  echo date_format($date_new,"F d, Y"); ?> </td>
										<td colspan=7><input type="hidden" name="arrivalAM<?php echo $i."_1"; ?>" value="weekend" /><span style="color:red"><b>--------------------WEEKEND--------------------</b><span></td>
										</tr>
										<?php
									}else{
										$date_new=date_create($date_);
										$dateCheck=date('Y-m-d', strtotime($date_));
										$dateFrom=date('Y-m-d', strtotime($date1));
										$dateTo=date('Y-m-d', strtotime($date2));
									?>
										<tr  style="  text-align: center;"> 
										<td><input type="hidden" name="date_<?php echo $i; ?>" value="<?php  echo $date_; ?>" /><?php  echo date_format($date_new,"F d, Y"); ?> </td>
										<?php
											$leaveTmp=getLeave($empid,$dateCheck); 
											if($leaveTmp<>""){
												?>
											<td colspan=7><input type="hidden" name="arrivalAM<?php echo $i."_1"; ?>" value="leave" /><input type="hidden" name="typeofleave<?php echo $i."_1"; ?>" value="<?php echo $leaveTmp; ?>" /><span style="color:blue"><b><?php echo $leaveTmp; ?></b><span></td>
											<?php
											}else{ 
										
											?> 
													<td>  <?php echo $am_in; ?></td>
													<td> <?php echo $am_out; ?></td>
													<td> <?php echo $pm_in; ?></td>
													<td>  <?php echo $pm_out; ?></td>
											 	<?php
											}
											?>

										</tr>
									<?php
									$numdays++;
									}
									?>
								
									<?php
									$i++;
									}
									
									
									?>
					
					</table>	
				 
					
						<?php
						
						
						
						}
					?>
						<p style=" text-align: center; ">I certify and honor that the above is true and correct report of 
						the hours of work performed, records of which was more daily at the time 
						of arrival and at the time of departure from office.</p>
					<p style=" text-align: center; "><u><?php echo $name_; ?> </u></p>
					<p style=" text-align: center; "> Verified as to prescribe office hours</p>
					<p style=" text-align: center; "><u>REMELGIO G. DUYAN</u></p>
					<p style=" text-align: center; "> Administrative Officer</p> 
				
				 
					 
				 
				 
					
						 
				
				 </div>
			  </form>	 
          </div>
        
        </div>
       </div>
   
 
			  </form>	 
          </div>
        
        </div>
       </div>
   
</div>

   </section>
   </div>


    <div class="control-sidebar-bg"></div>
</div>

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>

<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<script src="bootstrap/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="plugins/knob/jquery.knob.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
<script src="dist/js/demo.js"></script>
<script src="dist/js/jquery.bracket.min.js"></script>

</body>
</html>
