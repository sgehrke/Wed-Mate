<?php
 
	session_start();
	require_once('db_con.php');
	$_SESSION['message'] = "<div class='message'>Your Delete was Successful!</div>";
	

	$quoteId = $_GET['id'];
	$stmt = $db->prepare("DELETE FROM quotes WHERE id = :id");
	$stmt->bindParam(':id', $quoteId);
	$stmt->execute();
	header('Location: dashboard.php');
	
	die();
?>
