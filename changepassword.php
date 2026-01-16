<?php
session_start();
require_once("db/databaseConnection.php");
include("count.php");
include("notification.php");
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
          <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/avatar2.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $name;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i><?php echo $position;?></a>
        </div>
      </div>
	
    <ul class="sidebar-menu">
         <?php if ($employee) { ?>	
           <ul class="sidebar-menu">
		   <li class="treeview active">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span> Requests Status </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
		    <li><a href="inprogress.php"><i class="fa fa-circle-o"></i>
				<span> In Progress </span>
				<span class="pull-right-container">
				  <small class="label pull-right bg-red"><?php echo $inprogress;?></small>
				</span>
				</a>
				</li>
            <li><a href="pending.php"><i class="fa fa-circle-o"></i><span> Pending </span>
				<span class="pull-right-container">
				  <small class="label pull-right bg-red"><?php echo $pending;?></small>
				</span>
				</a>
				</li><!-- class="active" -->
            <li><a href="rejected.php"><i class="fa fa-circle-o"></i> <span> Rejected </span>
				<span class="pull-right-container">
				  <small class="label pull-right bg-red"><?php echo $rejected;?></small>
				</span>
				</a>
				</li>
			 <li><a href="approved.php"><i class="fa fa-circle-o"></i> <span> Approved </span>
				<span class="pull-right-container">
				  <small class="label pull-right bg-red"><?php echo $approved;?></small>
				</span>
				</a>
				</li>
          </ul>
		    <?php } ?>
			</li>
			<li class="treeview active">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span> Account Settings </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
		    <li><a href="changepassword.php"><i class="fa fa-circle-o"></i> <?php if ($admin) { echo "Update Account Details"; }else{ echo "Change Password"; } ?></a></li>
             </ul>
			</li>
			
		<li ><a href="logout.php"><i class="fa fa-circle-o text-aqua"></i> <span>Logout</span></a></li>

      </ul>
      </ul>
	 
     </section>  </aside>

  <div class="content-wrapper">
    <section class="content-header">
       
           <ul class="nav navbar-nav">
      <?php if ($admin) { ?>	  <li><a href="dtr.php"> DTR </a></li> <?php }?>
         <li><a href="justification.php"> Justification &nbsp;
				<span class="pull-right-container">
				<?php if($justNotif>0){ ?>
				  <small class="label pull-right bg-red"><?php echo $justNotif;?></small>
				</span>
				<?php } ?>
				</a></li>
		 <?php if ($employee) { ?>	
		 <li><a href="pass_slip.php"> Pass Slip  &nbsp;
		  <?php if($passNotif>0){ ?>
				<span class="pull-right-container">
				  <small class="label pull-right bg-red"><?php echo $passNotif;?></small>
				</span>
			<?php } ?>	
				</a></li>
		  <li><a href="leave.php"> Leave &nbsp;
		  	  <?php if($leaveNotif>0){ ?>
				<span class="pull-right-container">
				  <small class="label pull-right bg-red"><?php echo $leaveNotif;?></small>
				</span>
					<?php } ?>	
				</a>
			</li>
		  <li><a href="travel_order.php"> Travel Order  &nbsp;
		  		  <?php if($travelNotif>0){ ?>
				<span class="pull-right-container">
				  <small class="label pull-right bg-red"><?php echo $travelNotif;?></small>
				</span>
					<?php } ?>	
				</a></li>
		
		  <?php } ?>
		    <?php if ($admin) { ?>  <li><a href="leavecredits.php"> Leave Credits </a></li><?php } ?>
		 <?php if ($admin) { ?>    
		   <li><a href="employee.php"> Employees Record </a></li>
		 <li><a href="activitylog.php"> Activity Log  &nbsp;
		    <?php if($activityNotif>0){ ?>
				<span class="pull-right-container">
				  <small class="label pull-right bg-red"><?php echo $activityNotif;?></small>
				</span>
					<?php } ?>	
				</a></li> <?php } ?>
		  <?php if ($admin) { ?> <li><a href="requirements.php"> Requirements </a></li><?php } ?>
      </ul>
    </section>

    <section class="content">
         <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
			<h3>Change Password</h3>
                 </div>
            <div class="box-body">
			   <div class="col-xs-6">
			   <form action="operation/changepass.php" method="post">
			<h4>Username:</h4> <input class="form-control"  type="text" name="username" value="<?php echo $username; ?>" readonly />
			<h4>FirstName:</h4> <input class="form-control"  type="text" name="fname" value="<?php echo $fname; ?>"  />
			<h4>MiddleName:</h4> <input class="form-control"  type="text" name="mname" value="<?php echo $mname; ?>"  />
			<h4>LastName:</h4> <input class="form-control"  type="text" name="fname" value="<?php echo $lname; ?>"  />
			<h4>Password:</h4> <input  class="form-control" type="password" name="pass" value="<?php echo $password; ?>" />
		<br/>
		
			<input type="submit" name="saveBtn" value="UPDATE DETAILS" class="btn btn-primary btn-sm" >
			 </form>
			 	<br/>
			  <?php if ($admin) { ?>	<a class="btn_edit_credit" id="<?php echo $cid; ?>"><button href="#editModal<?php echo $cid; ?>" role="button" data-toggle="modal" type="button" class='btn btn-success btn'>Add Employee Account</button></a> <?php } ?>
			
			 <?php  
							function getDep($id){
								$sql=mysql_query("SELECT * FROM  department  where id='$id'  ");
								while($row = mysql_fetch_array($sql)){
								return $row['department'];

								}
								}
								function getCol($id){
								$sql=mysql_query("SELECT * FROM  college  where id='$id'  ");
								while($row = mysql_fetch_array($sql)){
								return $row['college'];

								}
								}				 ?>
			   
			   <form action="operation/save_acc1.php" method="post"><br/>
			<div id="editModal<?php echo $cid; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog">
								<div class="modal-content">
								 
								<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h3>User Details</h3>
								</div>
								<div class="modal-body">
								<div class="row">
								<div class="col-sm-12">
										<h4>Firstname:</h4> <input class="form-control"  type="text" name="fname"   required/>
										<h4>Middlename:</h4> <input class="form-control"  type="text" name="mname"  required />
										<h4>Lastname:</h4> <input class="form-control"  type="text" name="lname"   required/>
										<h4>Username:</h4> <input class="form-control"  type="text" name="username"  required />
										 
										<h4>Password:</h4> <input  class="form-control" type="password" name="pass"   required/>
										<br/>
								<select name="position" class="form-control">
							 <?php
							 	$SQL_=mysql_query("SELECT * FROM  position  ");
					
							while($crow = mysql_fetch_array($SQL_)){
									$cid= $crow['id'];
									$position= $crow['position'];
									$department= getDep($crow['department']);
								$college= getCol($crow['college']);
									?>
							<option value="<?php echo $cid; ?>" ><?php echo $position."-".$department."(".$college.")"; ?></option>
							 
							<?php
							}
						
							?>
 						</select>
						<br/>
						<select name="designation" class="form-control">
							<option value="Without Designation" >Without Designation</option>
							<option value="With Designation" >With Designation</option>
 						</select>
						<b style="color:red;">
						<?php 
							if($_SESSION['error']<>""){
								echo $_SESSION['error'];
							}
							?>
							</b>
							<br/>
								</div>

							
								
								</div>
								</div>
								<div class="modal-footer">
								<div class="col-sm-12">
								
								<input type="submit" name="saveBtn" value="SAVE DETAILS" class="btn btn-primary btn-sm" >
								</div>	
								</div>
							 
								</div>
								</div>
								</div>
		</form>
		 
			  </div>
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
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
$('#accountsData').DataTable({
   	"paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
   });
</script>
</body>
</html>
