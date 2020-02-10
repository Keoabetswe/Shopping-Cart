<?php
session_start();

if (isset($_GET['logout'])) 
{
	session_destroy();
  	unset($_SESSION['username']);
 	header("location: index.php");
}

$db_host="localhost";	
$db_username="root";	
$db_password="";	
$db_name="test";

$db_connect = mysqli_connect($db_host, $db_username, $db_password, $db_name);	

if(isset($_GET["action"]))
{
	if($_GET['action'] == "admin_delete")
	{
		$id = $_GET['id'];
		$query = "DELETE FROM tbl_item WHERE ItemID = '$id'";
		$delete = mysqli_query($db_connect, $query);
	}
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
				
			<h3>Available Items</h3>
			
			<br /><!-- break -->
			
			<center><a href="addItem.php" style="color:slategrey"><button type="submit" class="btn" name="add" value="Add">Add New Item</button></a></center>			
		
			<br/><!-- break -->
			
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<tr>
						<th width="3%">ItemID</th>
						<th width="30%">Description</th>
						<th width="15%">Cost Price</th>
						<th width="10%">Quantity</th>
						<th width="15%">Sell Price</th>
						<th width="10%">Image</th>
						<th width="15%">Action</th>
					</tr>
					
					<?php 
						$items_query = "SELECT * FROM tbl_item";
						$items_result = mysqli_query($db_connect, $items_query);
						
						if($items_result->num_rows > 0)
						{
							while($row = $items_result-> fetch_assoc())
							{?>
								<tr>
									<td><?php echo $row['ItemID'] ?></td>
									<td><?php echo $row['Description'] ?></td>
									<td><?php echo $row['CostPrice'] ?></td>
									<td><?php echo $row['Quantity'] ?></td>																															<td><?php echo $row['SellPrice'] ?></td>
									<td><?php echo $row['Image'] ?></td>
									<td align="center">
										<a href="editItem.php?id=<?php echo $row['ItemID']?>"><span style="color:green;">Edit</span></a> | <!-- edit button -->
										<a href="admin.php?id=<?php echo $row['ItemID'] ?>&action=admin_delete"
										onclick="return confirm('Are you sure?')"><span class="text-danger">Delete</span></a> <!-- delete button -->
									</td>																		
								</tr>
					<?php
							}	
						}		
					?>						
				</table>
			</div>
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