<?php

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
		$optionName = $_POST['optionName'] ;
		$optionPrice = $_POST['optionPrice'] ;
		$optionDesc = $_POST['optionDesc'] ;
		$optionCreator = $_SESSION['id'];

		//Added this query to create a condition to check against 
		$query =  "SELECT * 
					FROM options 
					WHERE optionName = :optionName 
					AND optionPrice = :optionPrice";
		$stmt = $db->prepare($query);
		$stmt->bindParam(':optionName', $optionName);
		$stmt->bindParam(':optionPrice', $optionPrice); 
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
				$stmt = $db->prepare("INSERT INTO options (optionName, optionPrice, optionDesc, optionCreator) VALUES (:optionName, :optionPrice, :optionDesc, :optionCreator);");
				
				$stmt->bindParam(':optionName', $optionName);
				$stmt->bindParam(':optionPrice', $optionPrice);
				$stmt->bindParam(':optionDesc', $optionDesc);
				$stmt->bindParam(':optionCreator', $optionCreator);				
				$stmt->execute();
				header("Location: dashboard.php");
				// $_SESSION['$optionName'] = $optionName;			}
			}

		}
	}	

?>	
<section id="register-modal">	
	<form class="formLayout" method="POST" action="new-option.php">	
		<a class="close">×</a>
		<h2>Add New Option</h2>
			<input type="text" name="optionName" value="" placeholder="Option Name"></br>
			<input type="text" name="optionPrice" value="" placeholder="Price $"></br>
			<textarea rows="3" cols="30" type="text" name="optionDesc" id="desc" value="" placeholder="Description of Option"></textarea></br>
			
			<input type="submit" name="submit" value="Add Option"></br>
	</form>
</section>


