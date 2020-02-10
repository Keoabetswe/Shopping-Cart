<?php
session_start(); //starts the session

$db_host="localhost";	
$db_username="root";	
$db_password="";	
$db = "test";

$db_connect = mysqli_connect($db_host, $db_username, $db_password,$db);	

//stores the session
$user_check = $_SESSION['login_user'];

//fetches all user info
$query = "SELECT FName From tbl_user WHERE FName = '$user_check'";
$session_result = mysqli_query($db_connect, $query);
$row = mysqli_fetch_assoc($session_result);
$login_session = $row['FName'];



?>