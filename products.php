<?php
session_start();
  
if (isset($_GET['logout'])) 
{  
	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.php");
}


$db_host="us-cdbr-east-02.cleardb.com";	
$db_username="babab8844655c8";	
$db_password="fa85e879";	
$db_name="heroku_1f84699d008c6be";

$db_connect = mysqli_connect($db_host, $db_username, $db_password, $db_name);	

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);

			echo '<script>alert("Item(s) added to cart ")</script>';	
			echo '<script>window.location="products.php"</script>';
		}
		if(in_array($_GET["id"], $item_array_id))
		{
				$count = count($_SESSION["shopping_cart"]);
				$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);

			
		}
		$_SESSION["shopping_cart"][$count] = $item_array;
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "remove")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]); //removes the selected item
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="products.php"</script>';
			}
		}
	}
	if($_GET["action"] == "empty")
	{
		echo '<script>alert("Cart Cleared")</script>';		
		unset($_SESSION["shopping_cart"]); //empties the shopping cart 	
	}
	
	if($_GET["action"] == "checkout") 
	{
		if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true)
		{
			//checkout
			$userID = $_SESSION['UserID'];
			$getDate = date('Y/m/d');
			$query = "INSERT INTO tbl_order (OrderDate,ID) VALUES('$getDate','$userID')";
			$checkout = mysqli_query($db_connect, $query);
			
			//clear shopping cart
			unset($_SESSION['shopping_cart']);
			
		 	header("location: checkoutComplete.php");
		}
		else
		{
			//informs the user to login first
			echo '<script>alert("Please Login first")</script>';
		}
	}
}




?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="images/logo_icon.ico">

    <title>Products</title>

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
	<!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<center><h4 style="color: white;">User: <strong><?php echo $_SESSION['username']; ?></strong></h4>
    	<h5> <a href="index.php?logout='1'" style="color: red;">logout</a> </h5></center>
    <?php endif ?>

 	 <!-- Place the whole page in a column narrower than the full screen on a large screen-->
	<div class="container">
 		
		<!-- Header -->
		<div id="top" class="row">
			 <!--main heading-->
			<center><h1>Products</h1></center>
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
						<li><a href="login.php">Login</a></li>							
						<li><a href="admin-login.php">Admin</a></li>
					</ul>
				</div>
		</nav>
				
	     <!-- Content row -->
		<div class="row">            			 
			<div id="content">
			
			<div class="container" style="width:750px;">
				<div style="clear:both"></div>
				<br /><!-- break -->
			<h3>Order Details</h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="25%">Description</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						<th width="12%" align="center">Action</th>
					</tr>
					
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>R <?php echo $values["item_price"]; ?></td>
						<td>R <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td align="center"><a href="products.php?action=remove&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="left">R <?php echo number_format($total, 2); ?></td>
						<td align="center"><a id="btnEmpty" href="products.php?action=empty"><span class="text-danger">Empty Cart</span></a></td>
					</tr>
					<tr>
						<td style="border-color:#728BC1;"></td>
						<td style="border-color:#728BC1;"></td>
						<td style="border-color:#728BC1;"></td>
						<td style="border-right-color:red; border-right-color:white; border-bottom-color:#728BC1;"></td>
						<td align="center" style="border-color:white"><a id="btnCheckout" href="products.php?action=checkout"><span style="color:green;">Checkout</span></a></td>
					</tr>
					<?php
					}
					?>
						
				</table>
			</div>
				<?php 
				$items_query = "SELECT * FROM tbl_item order by ItemID ASC";
				$items_result = mysqli_query($db_connect, $items_query);
				
				if(mysqli_num_rows ($items_result) > 0)
				{
					while($row = mysqli_fetch_array($items_result))
					{
								
				?>
				
				<div class="col-md-4">
					<form method="post" action="products.php?action=add&id=<?php echo $row["ItemID"]; ?>">
						<div style="border:1px solid #333; background-color:lightgrey; border-radius:5px; padding:15px;" align="center">
							<img src="images/<?php echo $row["Image"]; ?>" class="img-responsive" height="50px" width="150px" /><br />
	
							<h4 class="text-info"><?php echo $row["Description"]; ?></h4>
	
							<h4 class="text-danger">R <?php echo $row["SellPrice"]; ?></h4>
	
							<input type="number" name="quantity" value="1" class="form-control" />
	
							<input type="hidden" name="hidden_name" value="<?php echo $row["Description"]; ?>" />
	
							<input type="hidden" name="hidden_price" value="<?php echo $row["SellPrice"]; ?>" />
	
							<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
						</div>
				</form>
				
				<br/><!-- break -->
				

				</div>	
				<?php
					}
				}
				?>
				<center><h3>Purchase History</h3></center>
				<?php 
					if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true)
					{?>
					<div class="table-responsive">
						<table class="table table-bordered">
						<tr>
							<th width="5%">Order Num</th>
							<th width="5%">Order Date</th>
							<th width="5%">User ID</th>
						</tr>
					
					<?php 
						$user = $_SESSION['UserID'];
						$items_query = "SELECT * FROM tbl_order WHERE ID = '$user'";
						$items_result = mysqli_query($db_connect, $items_query);
						
						if($items_result->num_rows > 0)
						{
							while($row = $items_result-> fetch_assoc())
							{
								echo "<tr><td>" .$row["OrderNum"] ."</td><td>" .$row["OrderDate"] ."</td><td>" .$row["ID"]  ."</td></tr>";
							}	
						}?>							
						</table><?php
					}
					else
					{
						echo "<center><h5>History N/A, Login first</h5></center>";
					}
				?>
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