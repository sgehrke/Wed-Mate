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
	if(isset($_GET["id"])){
		
		
	$eventId = $_GET['id'];
	$stmt = $db->prepare("SELECT * FROM events
			WHERE id = :id");
	$stmt->bindParam(':id', $eventId);
	$stmt->execute();
	$event = $stmt->fetch(PDO::FETCH_ASSOC);
	}			
	// this makes sure that the user submitted the form by checking the request..Alternativley if ($_POST['submit']) but that can send request withut data
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		$eventId = $_GET['id'];
		$eventDesc = $_POST['eventDesc'] ;
		$eventDate = $_POST['eventDate'] ;
		$eventTitle = $_POST['eventTitle'] ;

		$stmt = $db->prepare("UPDATE events SET
			eventTitle=:eventTitle,
			eventDate=:eventDate,
			eventDesc=:eventDesc
			WHERE id = :id;");
			
		$stmt->bindParam(':id', $eventId);
		$stmt->bindParam(':eventTitle', $eventTitle);
		$stmt->bindParam(':eventDate', $eventDate);
		$stmt->bindParam(':eventDesc', $eventDesc);	
		$stmt->execute();
		header("Location: dashboard.php");
		// $_SESSION['$eventTitle'] = $eventTitle;			
	}	

?>

<section id="register-modal">	
	<form class="formLayout" method="POST" action="update-zabuto.php?id=<?php
		echo $event['id'];
	?>">	
		<a class="close">×</a>
		<h2><?php
				echo $event['eventTitle'];
			?></h2>
			<input id="bodate" type="text" name="eventDate" value="<?php
				echo $event['eventDate'];
			?>" placeholder="Date to Update"></br>
			<input type="text" name="eventTitle" value="<?php
				echo $event['eventTitle'];
			?>" placeholder="Event Title"></br>
			<textarea rows="3" cols="30" type="text" name="eventDesc" id="desc" placeholder="Description of Package"><?php
				echo htmlspecialchars($event['eventDesc']);
			?></textarea></br>
			
			<input type="submit" name="submit" value="Update Event"></br>
	</form>
</section>
