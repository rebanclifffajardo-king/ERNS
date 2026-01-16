  

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ERNS</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index"  >
 
	<img src="img/bghome.png" width="100%" height="100%"/>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" >
        <div class="container" >
		

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#loginModal" data-toggle="modal">Login</a>
                    </li>
                  
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
			<div id="loginModal" class="modal" tabindex="-1" role="dialog" aria-hidden="true"><!--class="modal show"  style=" background-image:url('dist/img/bghome.png'); background-repeat:no-repeat;"-->
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Close</button>
          <br/>
		   <img class="img-responsive" src="img/user.png" alt="">
      </div>
      <div class="modal-body">
	 
          
 
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Username" name="username" id="username"  required >
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" placeholder="Password" name="password" id="password" required >
             <br/>
		   <span id="error" style="color:red;">
		   
		   </span>
		   </div>
         
       
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
         <!-- <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>-->
		    <div class="form-group">
              <button name="logbtn" id="logbtn" class="btn btn-primary btn-lg btn-block">Login</button>
             


			 <!--<span class="pull-right"><a href="#">Register</a></span><span><a href="#">Need help?</a></span>-->
            </div>
		  </div>	
      </div>
	     
  </div>
  </div>
</div>
                 
                
                </div>
            </div>
        </div>
    </header>

    <!-- Footer -->
  

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

<script>
	(function ($) {
$(document).on('click', '#logbtn', function () {
				 
			 
				 var username= $("#username").val();
				 var password= $("#password").val();
					
				if(username=="" || password=="" ){
					$("#error").html("Empty Field/s!"); 
				 }
				 else{
						 
					var data = {'username': username,
							  'password': password 
							  };
				  
				   $.ajax({
						type: "POST",
						url: "login.php",
						data: data,
						cache: false,
						success:  function(data){
							if(data=="invalid"){
									$("#error").html("Invalid Account !"); 
							}
							if(data=="success"){
									$("#error").html(" "); 
									window.location="../index.php";
							}
							
					
					
				
							 
						}
						  }); 
				 }
					});
					
					})(jQuery);
 
</script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>

</body>

</html>
