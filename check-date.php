<?php
	error_reporting(E_ALL);
	require_once('db_con.php');
	session_start();

// if get id show modal and run processing if not direct to another page or message	
if (isset($_SESSION['companyId'])){
	$checkId = $_GET['id'];	

	$companyId = $_SESSION['companyId'];
	
	$stmt = $db->prepare("SELECT * FROM events
			WHERE eventCreator = :companyId
			AND eventDate = :checkId");
	$stmt->bindParam(':companyId', $companyId);
	$stmt->bindParam(':checkId', $checkId);
	$stmt->execute();
	$checkEvents = $stmt->fetch(PDO::FETCH_ASSOC);
	
	$errorInfo = $stmt->errorInfo();
		    
		    
		if (isset($errorInfo[2])) {
			$error = $errorInfo[2];
			echo "<h1 style='color:white;background-color:red'>$error</h1>";
			
		} else {
			
			
			$numRows = $stmt->rowCount();
			
			$response = array();
			
			if ($numRows > 0) {
				$response['status'] = 'booked';
				//header("Location: booked.php");
			} else {
				$response['status'] = 'available';
	
				//header("Location: event-info.php");
				// $_SESSION['$eventTitle'] = $eventTitle;			
			}
			echo json_encode($response);
		}
 }
?>





