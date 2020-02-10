<?php 
	include("DBConn.php");
?> 

<html>

<head>
	<title>Complete Registration</title>
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
</head>
<body>
<br>
<!-- Place the whole page in a column narrower than the full screen on a large screen-->
	<div class="container">
 		
		<!-- Header -->
		<div id="top" class="row">
			
			<!-- Logo -->
			<div id="logo" class="pull-left">
				<img src="images/WP_Daft_Punk-2560x1440_00000.jpg" class="Logo" alt="Pneuma Tabernacle Fellowship" height="130" width="130">
			</div>
								
			<br/>

			 <!--main heading-->
			 <div class="header">
				<center><h1>Electronix</h1></center>
			</div>
		</div>

		<!-- Static navbar -->
		<nav class="row navbar">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span> <!--mobile version nav bar drop down button-->
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>

				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="myIndex.php">Home</a></li>
						
						<li><a href="products.php">Products</a></li>						

						<li><a href="">SmartPhones</a></li>

						<li><a href="" >Wearable Devices</a></li>
					
						
						<li><a href="">Computers</a></li>
						

						<li><a href="">Gaming</a></li>
						
						<li><a href="register.php">Register</a></li>
					</ul>
				</div>
		</nav>
		
		<!-- Content row -->
		<div class="row" id="content">            
			<div id="maincontent">
			
			<?php 
				$username = $_POST['FName'];
			
				echo '<center><h2>Congratulations! '.$username. '<br> You have successfully created an account :)</h2></center>';	
			?>	
				<center><a href="login.php" class="loginText" style="font-size:25px;">Login</a></center>
				
				<br/><!-- break -->
				
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