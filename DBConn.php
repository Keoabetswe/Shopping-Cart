<?php 	
$db_host="us-cdbr-east-02.cleardb.com";	
$db_username="babab8844655c8";	
$db_password="fa85e879";	
$db_name="heroku_1f84699d008c6be";

$db_connect = mysqli_connect($db_host, $db_username, $db_password);	

	//check connection
	if(mysqli_connect_error())
	{
		echo "<h3>Failed to connect to mySQL: </h3>" .mysqli_connect_error();
		//	echo '<script>alert("Congrats '.$username.' \n You have successfully created an Account:)")</script>';
		//	echo '<script>window.location="index.php"</script>';

	}
	else
	{
		// echo "<h3>Connected!</h3>"; //comment out row when it connects
		//echo '<script>alert("Database Connected!")</script>';
	}		
?> 


<?php 	

?> 