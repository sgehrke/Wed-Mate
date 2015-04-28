<?php
	error_reporting(E_ALL);
	require_once('db_con.php');
	session_start();
	if (isset($_SESSION['message'])) {
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
	
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
		$packageCreator = $_SESSION['id'];

		//Added this query to create a condition to check against 
		$query =  "SELECT * 
					FROM packages 
					WHERE packageName = :packageName 
					AND packageHours = :packageHours";
		$stmt = $db->prepare($query);
		$stmt->bindParam(':packageName', $packageName);
		$stmt->bindParam(':packageHours', $packageHours); 
		$stmt->execute();
		$errorInfo = $stmt->errorInfo();
		
		if (isset($errorInfo[2])) {
			$error = $errorInfo[2];
			echo "<h1 style='color:white;background-color:red'>$error</h1>";
			
		} else {
			$numRows = $stmt->rowCount();
			//echo $numRows;
			if ($numRows > 0) {
				$dupmessage = '<p class="dupmessage">That company is already registered</p>';
				header("Location: index.php");
				echo $dupmessage; //cannot dislay this before header...this needs to be displayed on the AJAX modal
			} else {
					//Take the variables from the user input and place them in an array that will be Inserted to the DB 
				$stmt = $db->prepare("INSERT INTO packages (packageName, packageHours, packagePrice, packageDeposit, overRate, packageDesc, packageCreator) VALUES (:packageName, :packageHours, :packagePrice, :packageDeposit, :overRate, :packageDesc, :packageCreator);");
				
				$stmt->bindParam(':packageName', $packageName);
				$stmt->bindParam(':packageHours', $packageHours);
				$stmt->bindParam(':packagePrice', $packagePrice);
				$stmt->bindParam(':packageDeposit', $packageDeposit);					
				$stmt->bindParam(':overRate', $overRate);
				$stmt->bindParam(':packageDesc', $packageDesc);
				$stmt->bindParam(':packageCreator', $packageCreator);				
				$stmt->execute();
				header("Location: dashboard.php");
				// $_SESSION['$packageName'] = $packageName;			}
			}

		}
	}	

?>
	
<section id="register-modal">	
	<form class="formLayout" method="POST" action="new-package.php" onsubmit="return FrontPage_Form1_Validator(this)" name="FrontPage_Form1" language="JavaScript">	
		<a class="close">×</a>
		<h2>Add New Package</h2>
			<input type="text" name="packageName" value="" placeholder="Package Name"></br>
			<input type="text" name="packageHours" value="" placeholder="Hours Included"></br>
			<input type="text" name="packagePrice" value="" placeholder="Price $"></br>
			<input type="text" name="overRate" value="" placeholder="Overtime rate (per half hour)"></br>
			<input type="text" name="packageDeposit" value="" placeholder="Deposit Amount">
			<textarea rows="3" cols="30" type="text" name="packageDesc" id="desc" value="" placeholder="Description of Package"></textarea></br>
			
			<input type="submit" name="submit" value="Add Package"></br>
	</form>
</section>


