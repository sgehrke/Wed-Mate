<?php
	error_reporting(E_ALL);
// destroy session and cookie data
	session_start();
	unset($_SESSION['$username']);
	session_destroy();

	
// redicect to login

	header("Location: index.php");	

?>