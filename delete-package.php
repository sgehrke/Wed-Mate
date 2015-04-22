<?php
 
	session_start();
	require_once('db_con.php');
	$_SESSION['message'] = "<div class='message'>Your Delete was Successful!</div>";
	

	$packageId = $_GET['id'];
	$stmt = $db->prepare("DELETE FROM packages WHERE id = :id");
	$stmt->bindParam(':id', $packageId);
	$stmt->execute();
	header('Location: dashboard.php');
	
	die();
?>