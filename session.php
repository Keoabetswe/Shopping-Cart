<?php
session_start(); //starts the session

//database connection string
$db_host="us-cdbr-east-02.cleardb.com";	
$db_username="babab8844655c8";	
$db_password="fa85e879";	
$db_name="heroku_1f84699d008c6be";

$db_connect = mysqli_connect($db_host, $db_username, $db_password,$db);	

//stores the session
$user_check = $_SESSION['login_user'];

//fetches all user info
$query = "SELECT FName From tbl_user WHERE FName = '$user_check'";
$session_result = mysqli_query($db_connect, $query);
$row = mysqli_fetch_assoc($session_result);
$login_session = $row['FName'];



?>