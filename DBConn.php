<?php 	
$db_host="localhost";	
$db_username="root";	
$db_password="";	


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