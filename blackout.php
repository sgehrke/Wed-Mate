<?php
	error_reporting(E_ALL);
	require_once('db_con.php');
	session_start();


	$checkId = $_SESSION['id'];
	$stmt = $db->prepare("SELECT * FROM events
			WHERE eventCreator = :checkId");
	$stmt->bindParam(':checkId', $checkId);
	$stmt->execute();
	$check = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	
	$dates = array();
	foreach ($check as $dates) {
		
		
		echo $dates['eventDate'];
	
			if ($dates > 0) {
				$response['status'] = 'booked';
				//header("Location: booked.php");
			} 
			echo json_encode($dates);
	}	
	
	
?>