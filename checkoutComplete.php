<?php 
include('user_process.php');

if (isset($_GET['logout'])) 
{
	session_destroy();
  	unset($_SESSION['username']);
 	header("location: index.php");
}

?> 


<html>
 
<head>
	<title>Complete</title>
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

	 <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
     
    <!-- Add icon library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
	<!-- move to top -->
	<script type="text/javascript" src="js/move2Top.js"></script>
		
    <!-- Custom styles for this stylsheet -->
	 <link href="css/stylesheet.css" rel="stylesheet" type="text/css">
	 
	 <!-- Form  validation code -->
	<link rel="stylesheet" href="js/jquery-ui.css" />
	<script src="js/jquery-1.8.3.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script language="javascript" src="js/jquery.validation.js"></script>

</head>

<body>
<br><!-- break -->
 <!-- logged in user -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<center><h4 style="color: white;">User: <strong><?php echo $_SESSION['username']; ?></strong></h4>
    	<h5> <a href="index.php?logout='1'" style="color: red;">logout</a> </h5></center>
    <?php endif ?>

<!-- Place the whole page in a column narrower than the full screen on a large screen-->
	<div class="container">
 		
		<!-- Header -->
		<div id="top" class="row">
			
			 <!--main heading-->
			<center><h1>Checkout Successful!</h1></center>
		</div>
		
		<br/>
		<!-- Content row -->
		<div class="row" id="content">            
			<div id="maincontent" >		

				<br/><!-- break -->		

			<div id="content">
				<center><h3>Click <a href="products.php">here</a> to continue shopping...</h3></center>
			</div>		
		</div>
	</div>
	
	<div class="row">
			<div id="footer" class="col-lg-12">
      			<small>
					&copy; Electronix - Design by <a class="designName" href="http:www.facebook.co.za/keoabetswenthite/" target="_blank">										Keo Nthite </a> <a href="http:facebook/electronix.com" class="fa fa-facebook" title="Facebook"></a> <a href="http:twitter/electronix.com" class="fa fa-twitter" title="Twitter"></a> 				
				</small>
			</div>
		</div>
	</div>

	
	<!-- move to the top -->	
	<a href="#" class="back-to-top" style="display:inline">
		<i class="fa fa-arrow-circle-up"></i> 
	</a>

		
	<!--Calling JavaScript slideshow -->
	<script type="text/javascript" src="js/slideshow.js"></script>

</body>
</html>