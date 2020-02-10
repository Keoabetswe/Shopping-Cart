<?php
// Initialize the session
session_start();

if(session_destroy()) //destroys all sessions
{
	header("location: index.php"); //redirects to the page
}

?>