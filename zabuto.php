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
		
		$eventDesc = $_POST['eventDesc'] ;
		$eventDate = $_POST['eventDate'] ;
		$eventTitle = $_POST['eventTitle'] ;
	
		$eventCreator = $_SESSION['id'];

		//Added this query to create a condition to check against 
		$query =  "SELECT * 
					FROM events 
					WHERE eventTitle = :eventTitle 
					AND eventDate = :eventDate";
		$stmt = $db->prepare($query);
		$stmt->bindParam(':eventTitle', $eventTitle);
		$stmt->bindParam(':eventDate', $eventDate); 
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
				$stmt = $db->prepare("INSERT INTO events 
			(eventTitle,  eventDate, eventDesc, eventCreator) VALUES
			(:eventTitle, :eventDate, :eventDesc, :eventCreator);");
				
				$stmt->bindParam(':eventTitle', $eventTitle);
				$stmt->bindParam(':eventDate', $eventDate);			
				$stmt->bindParam(':eventDesc', $eventDesc);
				$stmt->bindParam(':eventCreator', $eventCreator);				
				$stmt->execute();
				header("Location: dashboard.php");
				// $_SESSION['$eventTitle'] = $eventTitle;			}
			}

		}
	}	

?>
	
<section id="register-modal">	
	<form class="formLayout" method="POST" action="zabuto.php" >	
		<a class="close">×</a>
		<h2>Blackout Date</h2>
<!-- id="dynamic-date" -->
			<input id="bodate" type="text" name="eventDate" value="" placeholder="Date to blackout"></br>
			<input id="event_title" type="text" name="eventTitle" value="" placeholder="Title of Event">			
			<textarea cols="4"  type="text" name="eventDesc" id="desc" value="" placeholder="Description of event" ></textarea></br>
			<input type="submit" name="submit" value="Blackout">
	</form>

<script>
	
	$( document ).ready(function() {
	
		$('.close').on('click', function() {
			$('.overlay, .modal').hide();
			return false;
		});
		var day = datesplit[2];
		var month = datesplit[1];
		switch (month) {
		    case "01":
		        month = "January";
		        break;
		    case "02":
		        month = "February";
		        break;
		    case "03":
		        month = "March";
		        break;
		    case "04":
		        month = "April";
		        break;
		    case "05":
		        month = "May";
		        break;
		    case "06":
		        month = "June";
		        break;
			case "07":
		        month = "July";
		        break;
		    case "08":
		        month = "August";
		        break;
		    case "09":
		        month = "September";
		        break;
		    case "10":
		        month = "October";
		        break;
		    case "11":
		        month = "November";
		        break;
		    case "12":
		        month = "December";
		        break;    
		}
		
		var dateString	= month + " " + day + ", " + datesplit[0];
			console.log(dateString);
		$("#bodate").val(dateString);

	
	});
</script>