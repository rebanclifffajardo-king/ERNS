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
<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
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
			<h3>Approved Leave Transaction</h3>
                 </div>
            <div class="box-body">
					<table id="accountsData" class="table table-bordered table-striped" data-role="datatable" data-searching="true">
              <thead>
                <tr>
				  <th>Name</th>
				  <th>Type</th>
				  <th>Date</th>
				  <th>From - To</th>
				  
				 
				  <th></th>
                </tr>
				 </thead>
				 	<?php
					function getEmpname($id){
						$sql=mysql_query("SELECT * FROM  emptbl WHERE id='$id' ");
					
							 $row = mysql_fetch_array($sql);
								$name= $row['fname']." ".$row['mname']." ".$row['lname'];
								return $name;
							
					}
					
					$SQL_=mysql_query("SELECT * FROM  leavetbl WHERE status='approved' and  approval='$mid' ");
					
							while($crow = mysql_fetch_array($SQL_)){
									$cid= $crow['id'];
									$cname= getEmpname($crow['empid']);
									$type= $crow['type'];
									$date= date_create($crow['date']);
								 	$from_= date_create($crow['from_']);
									$to_= date_create($crow['to_']);
									$status= $crow['status'];
									  ?>
				 <tr>
				
                 <td><?php echo $cname; ?> </td>
				  <td><?php echo $type; ?> </td>
				  <td><?php echo date_format($date,"F d, Y"); ?> </td>
				    <td><?php echo date_format($from_,"F d, Y")." - ".date_format($to_,"F d, Y"); ?> </td>
				<td>
				<?php echo $status; ?> </td>
	
						</tr>
					<?php
							}
						?>
				
				</table>	
				
			 
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
