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
		
		
	$optionId = $_GET['id'];
	$stmt = $db->prepare("SELECT * FROM options
			WHERE id = :id");
	$stmt->bindParam(':id', $optionId);
	$stmt->execute();
	$option = $stmt->fetch(PDO::FETCH_ASSOC);
	}			
	// this makes sure that the user submitted the form by checking the request..Alternativley if ($_POST['submit']) but that can send request withut data
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		$optionId = $_GET['id'];
		$optionName = $_POST['optionName'] ;		
		$optionPrice = $_POST['optionPrice'] ;
		$optionDesc = $_POST['optionDesc'] ;

		$stmt = $db->prepare("UPDATE options SET
			optionName=:optionName,
			optionPrice=:optionPrice,
			optionDesc=:optionDesc
			WHERE id = :id;");
			
		$stmt->bindParam(':id', $optionId);
		$stmt->bindParam(':optionName', $optionName);
		$stmt->bindParam(':optionPrice', $optionPrice);
		$stmt->bindParam(':optionDesc', $optionDesc);	
		$stmt->execute();
		header("Location: dashboard.php");
		// $_SESSION['$optionName'] = $optionName;			
	}	

?>

<section id="register-modal">	
	<form class="formLayout" method="POST" action="update-option.php?id=<?php echo $option['id'];?>">	
		<a class="close">×</a>
		<h2>Update Package</h2>
			<input type="text" name="optionName" value="<?php
				echo $option['optionName'];
			?>" placeholder="Package Name"></br>
			<input type="text" name="optionPrice" value="<?php
				echo $option['optionPrice'];
			?>" placeholder="Price $"></br>
			<textarea rows="3" cols="30" type="text" name="optionDesc" id="desc" placeholder="Description of Package"><?php
				echo htmlspecialchars($option['optionDesc']);
			?></textarea></br>
			
			<input type="submit" name="submit" value="Update Option"></br>
	</form>
</section>

