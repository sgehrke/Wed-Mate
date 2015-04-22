<?php
 
	session_start();
	require_once('db_con.php');
	$_SESSION['message'] = "<div class='message'>Your Delete was Successful!</div>";
	

	$optionId = $_GET['id'];
	$stmt = $db->prepare("DELETE FROM options WHERE id = :id");
	$stmt->bindParam(':id', $optionId);
	$stmt->execute();
	header('Location: dashboard.php');
	
	die();
?>

