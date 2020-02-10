<?php
session_start();

// initializing variable
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'test');

// REGISTER USER
if (isset($_POST['register'])) 
{
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['FName']);
  $surname = mysqli_real_escape_string($db, $_POST['LName']);
  $email = mysqli_real_escape_string($db, $_POST['Email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['Password']);
  $password_2 = mysqli_real_escape_string($db, $_POST['Confirm_Password']);

  // form validation: ensure that the form is correctly filled...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) 
  { 
  	array_push($errors, "Username is required"); 
  }

  if (empty($surname)) 
  { 
  	array_push($errors, "Surname is required"); 
  }
  
  if (empty($email)) 
  { array_push($errors, "Email is required"); 
  }
  
  if (empty($password_1)) 
  { array_push($errors, "Password is required"); 
  }
  
  if ($password_1 != $password_2) 
  {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM tbl_user WHERE FName='$name' OR Email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user)  //checks if username & email exists
  {
    if ($user['FName'] === $name) 
    {
      array_push($errors, "Username already exists");
    }

    if ($user['Email'] === $email) 
    {
      array_push($errors, "email already exists");
    }
  }

  // register user if there are no errors 
  if (count($errors) == 0) 
  {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO tbl_user (FName,LName,Email, Password) VALUES('$name','$surname', '$email', '$password')";
  	mysqli_query($db, $query);
  	
  	$getUser = "SELECT * FROM tbl_user WHERE FName='$name' AND Password='$password'";
  	$newUser = mysqli_query($db, $getUser );
  	
	if (mysqli_num_rows($newUser) == 1) 
	   	{
			 $row = mysqli_fetch_array($newUser); //collects user row info
		
		    $_SESSION['username'] = $name; //stores name for registed user 
		     $_SESSION['UserID'] = $row["ID"]; //stores user ID for checking history & checking out
			$_SESSION['loggedIn'] = true;	//stores in user login status
		  	header('location: index.php');
  		}	
  }
}

// LOGIN USER
if (isset($_POST['login'])) 
{
  $name = mysqli_real_escape_string($db, $_POST['FName']);
  $password = mysqli_real_escape_string($db, $_POST['Password']);

  if (empty($name)) 
  {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) 
  {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) 
  {
	$password = md5($password);
  	$query = "SELECT * FROM tbl_user WHERE FName='$name' AND Password='$password'";
  	$results = mysqli_query($db, $query);
  	
  	if (mysqli_num_rows($results) == 1) 
   	{
	 $row = mysqli_fetch_array($results); //collects user row info
  	 $_SESSION['username'] = $name; //stores name for indicating user in a header
     $_SESSION['UserID'] = $row["ID"]; //stores user ID for checking history
	 $_SESSION['loggedIn'] = true;	//stores in user login status
  	  header('location: index.php');
  	}else 
  	{
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

// Admin login
if (isset($_POST['submit'])) 
{
  $name = mysqli_real_escape_string($db, $_POST['FName']);
  $pass = mysqli_real_escape_string($db, $_POST['Password']);

  if (empty($name)) 
  {
  	array_push($errors, "Username is required");
  }
  if (empty($pass)) 
  {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) 
  {
  	//$password = md5($pass);
  	$admin_privilege = 1;
  	$query = "SELECT * FROM tbl_user WHERE FName='$name' AND Password='$pass' AND Admin='$admin_privilege'";
  	$results = mysqli_query($db, $query);
  	
  	if (mysqli_num_rows($results) == 1) 
  	{
  	  $_SESSION['username'] = $name;
  	  header('location: admin.php');
  	}
  	else 
  	{
  		array_push($errors, "Wrong username/password combination");
		echo '<script>alert("Username: Admin \nPassword: Password1")</script>';
  	}
  }
}



?>