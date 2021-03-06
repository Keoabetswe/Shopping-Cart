﻿<?php
session_start();

$db_host="us-cdbr-east-02.cleardb.com";	
$db_username="babab8844655c8";	
$db_password="fa85e879";	
$db_name="heroku_1f84699d008c6be";
$db_connect = mysqli_connect($db_host, $db_username, $db_password, $db_name);	


if (isset($_GET['logout'])) 
{
	session_destroy();
  	unset($_SESSION['username']);
 	header("location: index.php");
}

if(isset($_GET["id"]))
{
	$query = "SELECT * FROM tbl_item WHERE ItemID = ".$_GET['id'];
	$result = mysqli_query($db_connect, $query);
	 $editRow = mysqli_fetch_array($result);	//collects item row info
}

if(isset($_POST['add']))
{
	//stores updated values
	$id = $_POST['id'];
	$desc = $_POST['description'];	
	$costprice = $_POST['cost_price'];
	$quantity = $_POST['quantity'];		
	$sellprice = $_POST['sell_price'];	
	$image = $_POST['item_image'];	
	
	$add_query = "INSERT INTO tbl_item (Description,CostPrice,Quantity,SellPrice,Image) VALUES ('$desc', '$costprice', '$quantity', '$sellprice', '$image')";
	$result = mysqli_query($db_connect,$add_query);
	header("location: admin.php");
}

if(isset($_POST['cancel']))
{
	//cancels the item and re-directs to admin page
	header("location: admin.php");
}

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="images/logo_icon.ico">

    <title>Admin</title>

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

    <!-- Custom styles for this stylsheet -->
    <link href="css/stylesheet.css" rel="stylesheet">
    
    <!-- Add icon library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
	<!-- move to top -->
	<script type="text/javascript" src="js/move2Top.js"></script>	
</head>

<body> 	
	<br/><!-- break --> 
	 <!-- logged in Admin -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<center><h4 style="color: white;">User: <strong><?php echo $_SESSION['username']; ?></strong></h4>
    	<h5> <a href="index.php?logout='1'" style="color: red;">logout</a> </h5></center>
    <?php endif ?>


 	 <!-- Place the whole page in a column narrower than the full screen on a large screen-->
	<div class="container">
 		
		<!-- Header -->
		<div id="top" class="row">
			 <!--main heading-->
			<center><h1>Admin</h1></center>
		</div>

		<br/><!-- break -->
		
	     <!-- Content row -->
		<div class="row">            			 
			<div id="content">
			
			<div class="container" style="width:750px;">
				<div style="clear:both"></div>
				
			<h3>Add Item</h3>
			
			<br /><!-- break -->
			
			<div class="products" >
				 <form method="post">
					 <center><table cellpadding="2" cellspacing="2">
						<tr>
							<td>Description</td>
							<td>
								<div class="input-group">
									<input type="text" name="description" >
							  	</div>

							</td>
						</tr>
						
							<tr>
							<td>Cost Price</td>
							<td>
								<div class="input-group">
									<input type="text" name="cost_price" >
							  	</div>

							</td>
						</tr>
						
						<tr>
							<td style="font-size:15px">Quantity</td>
							<td>
								<div class="input-group">
									<input type="text" name="quantity">
							  	</div>
							</td>
						</tr>
						
						<tr>
							<td>Sell Price</td>
							<td>
								<div class="input-group">
									<input type="text" name="sell_price">
							  	</div>

							</td>
						</tr>
						
						<tr>
						<td></td>
						<td><input type="file" id="image" name="item_image" accept="images/*" ><!-- adds an image --></td>
						</tr>
						
						<tr>
							<td>&nbsp;</td>
							<td>
								
								<br/><!-- break -->
				  				<button type="submit" class="btn" name="add" style="width:70px;">Add</button>
				  				<button type="submit" class="btn" name="cancel">Cancel</button>				  				
							</td>
						</tr>
					</table></center>
				</form>	
			</div>
			
			<br/><!-- break -->

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