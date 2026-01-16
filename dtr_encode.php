<?php
session_start();
require_once("db/databaseConnection.php");
include("count.php");
include("notification.php");
	$id_="";
	if(isset($_POST['genBtn'])){
			$id_=$_POST['payrollopt'];
		
	}
	 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>ERNS</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" > 
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

</head>
<body class="hold-transition skin-blue layout-boxed sidebar-mini">
<div class="wrapper">

  <header class="main-header">
   <a href="#" class="logo">
      <span class="logo-mini"><b></b>ERNS</span>
    <span class="logo-lg"><b>ER</b>NS</span>
    </a>
   <nav class="navbar navbar-static-top">
     <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
       
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
     <section class="sidebar">
      
     </section>  </aside>

  <div class="content-wrapper">
   

    <section class="content">
         <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
			<h3>DTR </h3>
                 </div>
				   
            <div class="box-body">
			<?php
		
						function getEmpname($id){
						$sql=mysql_query("SELECT * FROM  emptbl WHERE id='$id' ");
					
							 $row = mysql_fetch_array($sql);
								$name= $row['fname']." ".$row['mname']." ".$row['lname'];
								return $name;
							
					}
			
			
			if(isset($_POST['employeeopt'])){
				
				$empid=($_POST['employeeopt']);  
				$name=getEmpname($_POST['employeeopt']);  
				
				 $_SESSION['id'] =$empid;
				$_SESSION['name'] =$name;
				
			}else{
					if($_SESSION['id']<>""){
					$empid=$_SESSION['id'];
					$name=	$_SESSION['name'];
					}
				 
				
			}
			
			
			?>

			
			<div class="col-xs-12">
			 
			<br/>
			<form class="form" method="post">
			<div class="col-xs-4">
		<br/>
			<label>Select Employee Name: </label>
			<select name="employeeopt"   class="form-control">
						<option value="---">---</option>
						
						<?php
						$sqlb=mysql_query("SELECT * FROM  emptbl ");

						while($crow = mysql_fetch_array($sqlb)){
						$id_b= $crow['id'];
						$name_b= $crow['fname']." ".$crow['lname'];
						 
						
						?>
						
						<option value="<?php echo $id_b; ?>" <?php if($id_b==$empid) echo "selected";  ?> ><?php echo $name_b; ?></option>
						<?php
						}
						?>
						</select>
						 
					</div>
					 
					
			
			<div class="col-xs-4">
		<br/>
			<label>Select Payroll Range: </label>
			<select name="payrollopt<?php echo $cid; ?>" id="eventopt<?php echo $cid; ?>" class="form-control">
						<option value="---">---</option>
						
						<?php
						$sql=mysql_query("SELECT * FROM  payroll ");

						while($crow = mysql_fetch_array($sql)){
						$id= $crow['id'];
						$payrollName= $crow['payrollName'];
						$from1_= ($crow['from_']);
						$to1_= ($crow['to_']);
						$from_= date_create($crow['from_']);
						$to_= date_create($crow['to_']);
						$from_=date_format($from_,"F d, Y");
						$to_= date_format($to_,"F d, Y");
						$details=$id." [".$from_."-".$to_."]";
						
						?>
						
						<option value="<?php echo $id; ?>" <?php if($id_==$id) echo "selected";  ?> ><?php echo $details; ?></option>
						<?php
						}
						?>
						</select>
						<br/>
						<input type="submit"  class='btn btn-primary btn btn-block' name="genBtn" value="GENERATE" />
					</div>
			
					</form>
			</div>
		 <form  method="post" action="operation/save_payroll1.php">
				<div class="col-xs-12">
					<br/>
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
						 
						?>
						<table   class="table table-bordered" >
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
								<input type="hidden" name="payrollID" value="<?php  echo $payrollid; ?>" />
								<input type="hidden" name="from_" value="<?php  echo $date1; ?>" />
								<input type="hidden" name="to_" value="<?php  echo $date2; ?>" />
								<?php
								$datediff = strtotime($date2) - strtotime($date1);
								$loop = floor($datediff/(60*60*24));
								$date_ = new DateTime($date1);
								$i=0;
								$sql=mysql_query("SELECT * FROM  dtrtbl  WHERE empid='$empid' and payrollid='$payrollid' order by date_ ");
								while($row = mysql_fetch_array($sql))
									{
									
									$am_in=($row['TimeIn']);
									$am_out=($row['TimeOut']);
									$pm_in=($row['TimeIn2']);
									$pm_out=($row['TimeOut2']);
									 
									$date_=($row['date_']);
									$type=($row['type']);
									$leaveType=($row['leaveType']);
									$payrollid=($row['payrollid']);
									
								
							
									$date_final =new DateTime($date_);
									$day =  $date_final->format("w");
								//	echo "myval:".$date_;
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
												
												if($staff){
											?> 
											
													<td><input type="time" name="arrivalAM<?php echo $i."_1"; ?>"  value="<?php echo $am_in; ?>" /> </td>
													<td><input type="time" name="departureAM<?php echo $i."_2"; ?>" value="<?php echo $am_out; ?>" /> </td>
													<td><input type="time" name="arrivalPM<?php echo $i."_3"; ?>" value="<?php echo $pm_in; ?>" /> </td>
													<td><input type="time" name="departurePM<?php echo $i."_4"; ?>" value="<?php echo $pm_out; ?>" /> </td>
												 	<?php
											}
											else{
											  ?>
											  
													<td><input type="time" name="arrivalAM<?php echo $i."_1"; ?>"  value="<?php echo $am_in; ?>" readonly /> </td>
													<td><input type="time" name="departureAM<?php echo $i."_2"; ?>" value="<?php echo $am_out; ?>" readonly /> </td>
													<td><input type="time" name="arrivalPM<?php echo $i."_3"; ?>" value="<?php echo $pm_in; ?>" readonly /> </td>
													<td><input type="time" name="departurePM<?php echo $i."_4"; ?>" value="<?php echo $pm_out; ?>" readonly /> </td>
												 	
											<?php
											}
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
					<br/>
					<td><input type="submit" name="submitBtn" class="btn btn-success" value="SAVE DTR " /> </td>		
						<?php
						
						
						
						}else{
							
							?>
							<?php 
					if($id_<>""){
						$payrollID=$id_;
						$sql=mysql_query("SELECT * FROM  payroll where id='$id_'");

						while($crow = mysql_fetch_array($sql)){
						$cid= $crow['id'];
						$payrollName= $crow['payrollName'];
						$from1_= ($crow['from_']);
						$to1_= ($crow['to_']);
						$from_= date_create($crow['from_']);
						$to_= date_create($crow['to_']);
						$from_=date_format($from_,"F d, Y");
						$to_= date_format($to_,"F d, Y");
						$details=$payrollName." [".$from_."-".$to_."]";
							?>
							<table   class="table table-bordered" >
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
								$datediff = strtotime($date2) - strtotime($date1);
								$loop = floor($datediff/(60*60*24));
								$date_ = new DateTime($date1);
								
								for($i=0;$i <= $loop; $i++)
									{
									
									$date_ = date('Y-m-d' ,strtotime($date1."+".$i." day"));
							
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
												
												if($staff){
											?> 
											
													<td><input type="time" name="arrivalAM<?php echo $i."_1"; ?>" /> </td>
													<td><input type="time" name="departureAM<?php echo $i."_2"; ?>" /> </td>
													<td><input type="time" name="arrivalPM<?php echo $i."_3"; ?>" /> </td>
													<td><input type="time" name="departurePM<?php echo $i."_4"; ?>" /> </td>
										 
											<?php
											}
											else{
											  ?>
											  
														<td><input type="time" name="arrivalAM<?php echo $i."_1"; ?>" /> </td>
													<td><input type="time" name="departureAM<?php echo $i."_2"; ?>" /> </td>
													<td><input type="time" name="arrivalPM<?php echo $i."_3"; ?>" /> </td>
													<td><input type="time" name="departurePM<?php echo $i."_4"; ?>" /> </td>
										 
	 	
											<?php
											}
											}
											?> 
												
										</tr>
									<?php
									$numdays++;
									}
									?>
								
									<?php
									}
									
									
									?>
									
					
					</table>	

					<br/>
					<td><input type="submit" name="submitBtn" class="btn btn-success" value="SAVE DTR " /> </td>		
								<?php
								}

						}
								?>
									  
				
				
               
			
				  </div>
							
							<?php
						}
					?>
					
					
				  </form>
				 </div>
          </div>
        
        </div>
       </div>
     </section>
   </div>
   <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <strong><a href="">ERNS</a></strong>
    </div>
    <strong>Copyright &copy; 2016 All rights reserved
  </footer>

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
