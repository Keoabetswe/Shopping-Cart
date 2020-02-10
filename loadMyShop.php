<?php 	

for($x = 0; $x < 2; $x++)
{

include("DBConn.php");	

//selects test databse	
$db = mysqli_select_db($db_connect,"test");
	
//db create query 
$db_query = "create database test";
	
//table create queries
$tbl_user = 'create table tbl_user(
				ID int NOT NULL Primary Key AUTO_INCREMENT,
				Admin int,
				FName varchar(50) NOT NULL,
				LName varchar(50) NOT NULL,
				Email varchar(50) NOT NULL,
				Password varchar(50) NOT NULL)';


$tbl_item = 'create table tbl_item(
				ItemID int NOT NULL Primary Key AUTO_INCREMENT,
				Description varchar(50) NOT NULL,
				CostPrice decimal(10,2) NOT NULL,
				Quantity int NOT NULL,
				SellPrice decimal(10,2) not null,				
				Image varchar(50) NOT NULL)';
				
$tbl_customer = 'create table tbl_customer(
				CustomerNum int NOT NULL Primary Key AUTO_INCREMENT,
				Name varchar(50) NOT NULL,
				Surname varchar(50) NOT NULL,
				PhoneNum int(10) not null,
				Email varchar(50) NOT NULL,
				Address varchar(50) not null)';				
				
$tbl_order = 'create table tbl_order(
				OrderNum int NOT NULL Primary Key AUTO_INCREMENT,
				OrderDate varchar(50) NOT NULL,
				ID int NOT NULL,
				
				Foreign Key(ID) References tbl_user(ID))';
				
$tbl_ordered_item = 'create table tbl_ordered_Item(
					OrderItemID int not null primary key AUTO_INCREMENT,
					OrderNum int not null,
					ItemID int not null,
					
					Foreign Key(OrderNum) references tbl_order(OrderNum),
					Foreign Key(ItemID) references tbl_item(ItemID))';


//txt paths				
$txt_item = "LOAD DATA LOCAL INFILE '\\item.txt' INTO TABLE tbl_item FIELDS TERMINATED BY '	' LINES TERMINATED BY '\n'";	
$txt_customer = "LOAD DATA LOCAL INFILE '\\customer.txt' INTO TABLE tbl_customer FIELDS TERMINATED BY '	' LINES TERMINATED BY '\n'";
$txt_order = "LOAD DATA LOCAL INFILE '\\order.txt' INTO TABLE tbl_order FIELDS TERMINATED BY '	' LINES TERMINATED BY '\n'";	
$txt_ordered_item = "LOAD DATA LOCAL INFILE '\\orderedItem.txt' INTO TABLE tbl_ordered_item FIELDS TERMINATED BY '	' LINES TERMINATED BY '\n'";		
$txt_user = "LOAD DATA LOCAL INFILE '\\userData.txt' INTO TABLE tbl_user FIELDS TERMINATED BY '	' LINES TERMINATED BY '\n'";		
	
//drops BOTH table	tbl_user and tbl_item
$tbl_drop1 = "drop table tbl_ordered_item";
$tbl_drop2 = "drop table tbl_user";
$tbl_drop3 = "drop table tbl_order";
$tbl_drop4 = "drop table tbl_customer";	
$tbl_drop5 = "drop table tbl_item";
	

//checks if the db exists		
	if(empty($db))
	{
		echo "<h3>Database not found</h3>";		
	
		//executes db query
		$db_create = mysqli_query($db_connect, $db_query);			
			
		if(!$db_create)
		{
			echo "<h3>Database not created</h3>";
		}
		else
		{
			echo "<h3>Database created</h3>";
		}
	}
	else
	{
		echo "<h3>database exists</h3>";
		
		//query to check the table
		$select = "select * from tbl_item";
		$query_tbl = mysqli_query($db_connect, $select);
	

		//checks if the table exists
		if(!$query_tbl)
		{
			echo "<h3>Tables not found</h3>";
			
			//re-create the tables
			$tbl_create1 = mysqli_query($db_connect, $tbl_item);
			$tbl_create2 = mysqli_query($db_connect, $tbl_user);
			$tbl_create3 = mysqli_query($db_connect, $tbl_customer);
			$tbl_create4 = mysqli_query($db_connect, $tbl_order);			
			$tbl_create5 = mysqli_query($db_connect, $tbl_ordered_item);

			
			echo "<h3>Tables created</h3>";
						
			//loads txt data	
			$insert_item = mysqli_query($db_connect, $txt_item);
			$insert_user = mysqli_query($db_connect, $txt_user);
			$insert_customer = mysqli_query($db_connect, $txt_customer);
			$insert_order = mysqli_query($db_connect, $txt_order);
			$insert_ordered_item = mysqli_query($db_connect, $txt_ordered_item);


		
		}
		else 
		{
			echo "<h3>Tables exist</h3>";	
			
			//drops tables if they exist
			$drop_ordered_item = mysqli_query($db_connect, $tbl_drop1);
			$drop_order = mysqli_query($db_connect, $tbl_drop2);
			$drop_customer = mysqli_query($db_connect, $tbl_drop3);			
			$drop_item = mysqli_query($db_connect, $tbl_drop4);	
			$drop_user = mysqli_query($db_connect, $tbl_drop5);						

			echo "<h3>Tables dropped</h3>";
							
			//re-create the tables
			$tbl_create1 = mysqli_query($db_connect, $tbl_item);
			$tbl_create2 = mysqli_query($db_connect, $tbl_customer);
			$tbl_create3 = mysqli_query($db_connect, $tbl_order);			
			$tbl_create4 = mysqli_query($db_connect, $tbl_ordered_item);
			$tbl_create5 = mysqli_query($db_connect, $tbl_user);			
						
			echo "<h3>Tables Re-created</h3>";
			
			//loads txt data	
			$insert_item = mysqli_query($db_connect, $txt_item);
			$insert_customer = mysqli_query($db_connect, $txt_customer);
			$insert_order = mysqli_query($db_connect, $txt_order);
			$insert_ordered_item = mysqli_query($db_connect, $txt_ordered_item);
			$insert_user = mysqli_query($db_connect, $txt_user);
		}	
	}
}
	

	
?> 
