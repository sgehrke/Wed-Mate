<?php
	error_reporting(E_ALL);
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
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$quoteId = $_GET['id'];	
		$stmt = $db->prepare("SELECT * FROM quotes
				WHERE id = :id");
		$stmt->bindParam(':id', $quoteId);
		$stmt->execute();
		$quote = $stmt->fetch(PDO::FETCH_ASSOC);
		
			
		$quoteId = $_GET['id'];
		$quoteName = $_POST['quoteName'] ;
		$quoteDate = $_POST['quoteDate'] ;
		$quoteEmail = $_POST['quoteEmail'];
		$quotePhone = $_POST['quotePhone'] ;
		$quoteLocation = $_POST['quoteLocation'];
		$startTime = $_POST['startTime'];
		$endTime = $_POST['endTime'] ;
		$quotePackage = $_POST['quotePackage'] ;

		$quoteOption = $_POST['quoteOption'] ;
		$quoteSubmitted = date('Y-m-d G:i:s') ;
		
		$packagesSql = 'SELECT * FROM packages
		WHERE packageName = :quotePackage';
		$results = $db->prepare($packagesSql);
		$results->bindParam(':quotePackage', $quotePackage);
		$results->execute();
		$packages = $results->fetch(PDO::FETCH_ASSOC);
		

		$optionsSql = 'SELECT * FROM options
				WHERE optionName = :quoteOption';
		$results = $db->prepare($optionsSql);
		$results->bindParam(':quoteOption', $quoteOption);
		$results->execute();
		$options = $results->fetch(PDO::FETCH_ASSOC);
		

		$totalTime =$endTime - $startTime;

		 	if ($totalTime <= $packages['packageHours']){
			 	$overage = 0;
		 	} else {
			 	$overage = $totalTime - $packages['packageHours'];
		 	}
		$overTime = ($packages['overRate']* 2 ) * $overage;
			
		$quotePrice = $packages['packagePrice'] + $options['optionPrice'] + $overTime ;
			
		$stmt = $db->prepare("UPDATE quotes SET
			quoteName=:quoteName,
			quoteDate=:quoteDate,
			quoteEmail=:quoteEmail,
			quotePhone=:quotePhone,
			quoteLocation=:quoteLocation,
			startTime=:startTime,
			endTime=:endTime,
			quotePackage=:quotePackage,
			quoteOption=:quoteOption,
			overTime=:overTime,
			quotePrice=:quotePrice,
			quoteSubmitted=:quoteSubmitted
			WHERE id = :id;");
			


		$stmt->bindParam(':id', $quoteId);	
		$stmt->bindParam(':quoteName', $quoteName);
		$stmt->bindParam(':quoteDate', $quoteDate);
		$stmt->bindParam(':quoteEmail', $quoteEmail);
		$stmt->bindParam(':quotePhone', $quotePhone);
		$stmt->bindParam(':quoteLocation', $quoteLocation);		
		$stmt->bindParam(':startTime', $startTime);
		$stmt->bindParam(':endTime', $endTime);
		$stmt->bindParam(':quotePackage', $quotePackage);
		$stmt->bindParam(':quoteOption', $quoteOption);	
		$stmt->bindParam(':overTime', $overTime);
		$stmt->bindParam(':quotePrice', $quotePrice);
		$stmt->bindParam(':quoteSubmitted', $quoteSubmitted);	
		$stmt->execute();
		header("Location: quote.php");
			

//After UPDATE SELECT THE TABLES AND CONTRUCT THE VARIABLES TO SHOW THE QUOTE

	}	