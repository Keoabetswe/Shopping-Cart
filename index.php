<?php 
  session_start(); 
  
if (isset($_GET['logout'])) 
{
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="images/logo_icon.ico">

    <title>Home</title>

	 <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- styles for this stylsheet -->
    <link href="css/stylesheet.css" rel="stylesheet">
    
     
    <!-- social media icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
	<!-- move to top button -->
	<script type="text/javascript" src="js/move2Top.js"></script>	
</head>

<body> 
	<br/><!-- break -->
	
	 <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<center><h4 style="color: white;">User: <strong><?php echo $_SESSION['username']; ?></strong></h4>
    	<h5> <a href="index.php?logout='1'" style="color: red;">logout</a> </h5></center>
    <?php endif ?>

 	 
 	 <!-- Place the whole page in a column narrower than the full screen on a large screen-->
	<div class="container">
 		
		<!-- Header -->
		<div id="top" class="row">
			<center><h1>Welcome to Electronix</h1></center> <!--main heading-->
		</div>

		<br/><!-- break -->
		
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
						<li><a href="index.php">Home</a></li>
						
						<li><a href="products.php">Shop</a></li>						
						
						<li><a href="login.php">Login</a></li>
						
						<li><a href="admin-login.php">Admin</a></li>					
					</ul>
				</div>
		</nav>

		<!--Slideshow -->
		<div id="container">
			<img src="images/Slideshow/DSC_0089.JPG" class="slides" alt="">	
			<img src="images/Slideshow/2.jpg"class="slides" alt="">	
			<img src="images/Slideshow/DSC_0090.JPG" class="slides" alt="">	
			<img src="images/Slideshow/DSC_0096.JPG" class="slides" alt="">	
			<img src="images/Slideshow/DSC_0097.JPG" class="slides" alt="">		
			<img src="images/Slideshow/IMG-20161129-WA0000.jpg" class="slides" alt="">			
		
						
			<a class="prev" onclick="plusIndex(-1)">&#10094</a>
			<a class="next" onclick="plusIndex(+1)">&#10095</a>
		</div>
		
	  <br/>
    	<!-- Content row -->
		<div class="row" id="content">            
		
			 
			<div id="maincontent" >
			
			<div class="IndexContent">
			<!--Page heading -->
			<center><h2>Welcome to the electronix site, we offer a range of catalogues for your choosing!</h2></center>
						
						
			<center><p>Our store specialises in the latest electronic devices from<br/> phones, computers, consoles and many more!</p></center>
	
			
				
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