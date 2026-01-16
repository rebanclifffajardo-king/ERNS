<?php
session_start();
require_once("db/databaseConnection.php");
$prof_log = false;
$prof_name = "";
if(isset($_SESSION['prof_id'])){
	$prof_accid = $_SESSION['prof_id'];
		$data_=mysql_query("SELECT * FROM user_account WHERE username='$prof_accid'");
					while($row = mysql_fetch_array($data_)){
						$prof_name= $row['fname']." ".$row['lname'];
					}
$prof_log = true;


}

if(isset($_POST['lBtn'])){
	$username_= $_POST['uname_'];
	$password_= $_POST['password_'];
	$log_=mysql_query("SELECT * FROM user_account WHERE username='$username_' and password='$password_'");
		$exist_ = mysql_num_rows($log_);
		if($exist_>0){
			$_SESSION['prof_id']=$username_;
			header("location: main_account.php");
		}
		
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Myk1Visa</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>	
	<script>
	$(function () {
  $('[data-toggle="tooltip"]').tooltip()
   });
  </script>
	
  </head>
  
  <body>
 <nav class="navbar navbar-default navbar-fixed-top">
 <div class="container-fluid">
 <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			<a class="navbar-brand" href="#">iDream-America</a>
  </div>
  <div id="navbar" class="navbar-collapse collapse">
          
          <ul class="nav navbar-nav navbar-right">
		  <?php
		  if($prof_log==true){
			?> 
			 <li ><a href="main_account.php"><b> <?php echo $prof_name; ?></b> </a></li>
			<?php } ?>
		    
            <li  class="active"><a href="index.php">Home</a></li>
            <li><a href="about.php">About K1 Visa</a></li>
            <li><a href="testimonials.php">Testimonials</a></li>
			<li ><a href="contact.php">Contact Us</a></li>
			 <?php
		  if($prof_log==true){
			?> 
			 <li><a href="logout.php" >Logout</a></li>
			<?php } else{ ?>
			<li><a href="#" data-toggle="modal" data-target="#lModal">Login</a></li>
			<?php } ?>
          </ul>
        </div>
	</div>	
</nav>
  <div class="container">
  <div class="modal fade" id="lModal" tabindex="-1" role="dialog" aria-labelledby="lModal" aria-hidden="true">
  <form method="post" action="">
				<div class="modal-dialog ">
				<div class="modal-content">
				<form method="post" action="">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="loginModalLabel">Login Your Account</h4>
				</div>
				<div class="modal-body">
				
				<div class="row">
				<div class="col-sm-6 col-md-offset-3">
						<div class="form-group">
						<label >Username</label>
						<input type="text" class="form-control" id="uname_" name="uname_"  required >
						</div>
				</div>
				
				
				</div>
				
				<div class="row">
				<div class="col-sm-6 col-md-offset-3">
						<div class="form-group">
						<label >Password</label>
						<input type="password" class="form-control" id="password_" name="password_"  required >
					
						</div>
				</div>
				</div>
				</div>
				<div class="modal-footer">
					<input   type="submit" name="lBtn" class="btn btn-success" value="Login" >
				<button   type="button"  class="btn btn-danger " data-dismiss="modal">Cancel</button>
				</div>
				</form>
				</div>
				</div>
				</form>
				</div>
				
  <div class="modal fade" id="pModal" tabindex="-1" role="dialog" aria-labelledby="pModal" aria-hidden="true" data-backdrop="static">
				<div class="modal-dialog ">
				<div class="modal-content">
				<form method="post" action="register_save.php">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="loginModalLabel">Register Profile Account</h4>
				</div>
				<div class="modal-body">
				<div class="row">
				<div class="col-sm-5">
						<div class="form-group">
						<label >Firstname</label>
						<input type="text" class="form-control" id="fname" name="fname"  required >
						</div>
				</div>
				<div class="col-sm-5">
						<div class="form-group">
						<label >Lastname</label>
						<input type="text" class="form-control" id="lname" name="lname"  required >
						</div>
				</div>
				<div class="col-sm-2">
						<div class="form-group">
						<label >M.I</label>
						<input type="text" class="form-control" id="mname" name="mname"  required >
						</div>
				</div>
				</div>
				<div class="row">
				<div class="col-sm-6">
						<div class="form-group">
						<label >Username</label>
						<input type="text" class="form-control" id="uname" name="uname"  required >
						</div>
				</div>
				<div class="col-sm-6">
						<div class="form-group">
						<label >Email</label>
						<input type="email" class="form-control" id="email" name="email"  required >
						</div>
				</div>
				
				</div>
				<div class="row">
				<div class="col-sm-6">
						<div class="form-group">
						<label >Password</label>
						<input type="password" class="form-control" id="password" name="password"  required >
						</div>
				</div>
				<div class="col-sm-6">
						<div class="form-group">
						<label >Confirm Password</label>
						<input type="password" class="form-control" id="cpassword" name="cpassword"  required >
						</div>
				</div>
				
				</div>
				
				</div>
				<div class="modal-footer">
					<input   type="submit" name="regBtn" class="btn btn-info" value="Register Account" >
				<button   type="button"  class="btn btn-warning " data-dismiss="modal">Cancel</button>
				</div>
				</form>
				</div>
				</div>
				</div>
  <br/><br/><br/><br/>
  <div class="row">
		  <div class="col-md-6">
			<h1>Our Services Includes...</h1>
			<ul>
			<li>
			<b>Attorney Review and Assistance.</b>We will prepare your K1 Petition will respond to Request for Evidence (RFE), if any.
			</li>
			<li><b>We prepare all required USCIS Forms.</b></li>
			<li><b>Ensure Complete K1 Visa Packet.</b>
			<ul><li>Cover Letter</li>
			<li>Required USCIS forms</li>
			<li>Sample Affidavits and Intent To Marry</li>
			<li>List of Mandatory documentary requirements and other supporting documents</li>
			</ul>
			<li>Attorney's Fees  = $600</li>
			
			</li>

		 </div>
		 
		   <div class="col-md-6">
			<h3>About You...</h3>
			<ul>
				<li>
				<b>If the US citizen fiancee/fiance Petitioner.</b>
					<ul>
					<li>Is at least 21 years old</li>
					<li>Has capacity to marry (e.g. single, widowed, divorced, etc.)</li>
					<li>Passes the poverty guidelines</li>
					</ul>
				</li>
				<li>
				<b>If the K1 Beneficiary</b>
					<ul>
					<li>Of legal age to marry</li>
					<li>Has capacity to marry</li>	
					</ul>
				</li>
			<br>
				<?php
				if($prof_log==false){
				?>
				<a class="btn btn-lg btn-warning"  role="button" href=""  data-toggle="modal" data-target="#pModal">Get started today</a>
				<?php
				}
				else{
				?>
				<a class="btn btn-lg btn-warning"  role="button" href="main_account.php" >Get started today</a>
				
				<?php
				}
				?>
			<br><br>
					
				<li>
				
				<b>If the US citizen fiancee/fiance Petitioner and/or K1 Beneficiary has</b>
				
					<ul>
					<li>Criminal history</li>
					<li>Serious Medical Condition</li>
					<li>Does not pass poverty guidelines</li>
					<li>Currently Married</li>
					</ul>
				</li>
				<li>
				<b>If the US citizen K1 Petitioner</b>
					<ul>
					<li>Has filed a K1 visa in the past</li>
					<li>Obtained US citizenship through marriage and has been divorced within the last 5 years</li>
				
					</ul>
				</li>
				<br>
				<?php
				if($prof_log==false){
				?>
					<a class="btn btn-lg btn-danger" href="" role="button" target="_blank"  data-toggle="modal" data-target="#pModal"> 
					<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> 
					Schedule A Free Initial Consultation with an Attorney</a>	
				<?php
				}
				else{
				?>
					<a class="btn btn-lg btn-danger" href="schedule.php" role="button" > 
					<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> 
					Schedule A Free Initial Consultation with an Attorney</a>
				<?php
				}
				?>
		   
			</ul>
		   </div>
		     </div>
  </div>
	<footer id="footer">
	 <div class="container">
	  <hr/>
	<p class="text-muted">Copyright &copy; IDream-America 2015</p>
	
	 </div>
	</footer>

  </body>
</html>