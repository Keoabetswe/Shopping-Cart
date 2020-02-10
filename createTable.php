<?php 	

for($x = 0; $x < 4; $x++)
{
	include("DBConn.php");	
	$db = mysqli_select_db($db_connect,"test");//selects test databse	
	
	
	//creates for database and table
	$db_query = "create database test";
	$db_create = mysqli_query($db_connect, $db_query);
	
	//create table query
$tbl_user = 'create table tbl_user(
				ID int NOT NULL Primary Key AUTO_INCREMENT,
				Admin int not null,
				FName varchar(50) NOT NULL,
				LName varchar(50) NOT NULL,
				Email varchar(50) NOT NULL,
				Password varchar(50) NOT NULL)';

$tbl_item = 'create table tbl_item(
				ItemID int NOT NULL Primary Key AUTO_INCREMENT,
				Description varchar(50) NOT NULL,
				CostPrice int (50) NOT NULL,
				Quantity int NOT NULL,
				SellPrice int not null,				
				Image varchar(50) NOT NULL)';
				

	$txt_user = "LOAD DATA LOCAL INFILE '\\userData.txt' INTO TABLE tbl_user FIELDS TERMINATED BY '	' LINES TERMINATED BY '\n'";		
	$txt_item = "LOAD DATA LOCAL INFILE '\\item.txt' INTO TABLE tbl_item FIELDS TERMINATED BY '	' LINES TERMINATED BY '\n'";	

	//checks if table exists
	$tbl_select = "select * from tbl_user";
	$tbl_check = mysqli_query($db_connect, $tbl_select);
	
	//drops BOTH table	tbl_user and tbl_item
	$tbl_drop1 = "drop table tbl_user";
	$tbl_drop2 = "drop table tbl_item";
	
	//executes the drop query
	$drop_check = mysqli_query($db_connect, $tbl_drop1);
	$drop_check = mysqli_query($db_connect, $tbl_drop2);
	
	//executes create table queries	
	$tbl_create1 = mysqli_query($db_connect, $tbl_user);
	$tbl_create2 = mysqli_query($db_connect, $tbl_item);
	
	//inserts txt data into the tables
	$insert_user = mysqli_query($db_connect, $txt_user);
	$insert_item = mysqli_query($db_connect, $txt_item);
	
	if(empty($db))
	{
		$db_create;
		$tbl_check;
		$drop_check1;
		$drop_check2;
		$tbl_create1;
		$tbl_create2;
		$insert_user;
		$insert_item;
	}
	else
	{
		
	}	
}

	
	
?> 
