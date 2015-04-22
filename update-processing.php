<?php

	require_once('db_con.php');
	session_start();
	if (isset($_SESSION['username'])==false){
		//redirect to index
		header("Location: index.php");
	}
	if (isset($_SESSION['message'])) {
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
	
	$packageId = $_GET['id'];
	$packagesSql = 'SELECT * FROM packages
			WHERE id = :id;]';
	$stmt = $db->prepare($packagesSql);
	$stmt->bindParam(':id', $packageId);
	$stmt->execute();
	$packages = $stmt->fetchAll(PDO::FETCH_ASSOC);
	// this makes sure that the user submitted the form by checking the request..Alternativley if ($_POST['submit']) but that can send request withut data
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		//form was submittted
	
		//Once the condition is met for begin storing the info in variables
		$overRate = $_POST['overRate'];
		$packageDeposit = $_POST['packageDeposit'];
		$packageDesc = $_POST['packageDesc'] ;
		$packagePrice = $_POST['packagePrice'] ;
		$packageName = $_POST['packageName'] ;
		$packageHours = $_POST['packageHours'];

	
				$stmt = $db->prepare("UPDATE packages SET
									packageName=:packageName,
									packageHours=:packageHours,
									packagePrice=:packagePrice,
									packageDeposit=:packageDeposit,
									overRate=:overRate,
									packageDesc=:packageDesc
									WHERE id=:id;");
				
				$stmt->bindParam(':packageName', $packageName);
				$stmt->bindParam(':packageHours', $packageHours);
				$stmt->bindParam(':packagePrice', $packagePrice);
				$stmt->bindParam(':packageDeposit', $packageDeposit);
				$stmt->bindParam(':overRate', $overRate);
				$stmt->bindParam(':packageDesc', $packageDesc);
				
				$stmt->execute();
				header("Location: update-package.php");
				// $_SESSION['$packageName'] = $packageName;			
	}	

?>