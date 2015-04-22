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
		
		
	$packageId = $_GET['id'];

	$stmt = $db->prepare("SELECT * FROM packages
			WHERE id = :id");
	$stmt->bindParam(':id', $packageId);
	$stmt->execute();
	$package = $stmt->fetch(PDO::FETCH_ASSOC);
	}			
	// this makes sure that the user submitted the form by checking the request..Alternativley if ($_POST['submit']) but that can send request withut data
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		$packageId = $_GET['id'];
		$packageName = $_POST['packageName'] ;	
		$packageHours = $_POST['packageHours'];	
		$packagePrice = $_POST['packagePrice'] ;
		$packageDeposit = $_POST['packageDeposit'];
		$overRate = $_POST['overRate'];
		$packageDesc = $_POST['packageDesc'] ;

		$stmt = $db->prepare("UPDATE packages SET
			packageName=:packageName,
			packageHours=:packageHours,
			packagePrice=:packagePrice,
			packageDeposit=:packageDeposit,
			overRate=:overRate,
			packageDesc=:packageDesc,
			WHERE id = :id;");
			
		$stmt->bindParam(':id', $packageId);
		$stmt->bindParam(':packageName', $packageName);
		$stmt->bindParam(':packageHours', $packageHours);
		$stmt->bindParam(':packagePrice', $packagePrice);
		$stmt->bindParam(':packageDeposit', $packageDeposit);
		$stmt->bindParam(':overRate', $overRate);
		$stmt->bindParam(':packageDesc', $packageDesc);
		
		$stmt->execute();
		header("Location: dashboard.php");
		// $_SESSION['$packageName'] = $packageName;			
	}	

?>
	
<section id="register-modal">	
	<form class="formLayout" method="POST" action="update-package.php?id=<?php echo $package['id'];?>">	
		<a class="close">×</a>
		<h2>Update Package</h2>
			<input type="text" name="packageName" value="<?php
				echo $package['packageName'];
			?>" placeholder="Package Name"></br>
			<input type="text" name="packageHours" value="<?php
				echo $package['packageHours'];
			?>" placeholder="Hours Included"></br>
			<input type="text" name="packagePrice" value="<?php
				echo $package['packagePrice'];
			?>" placeholder="Price $"></br>
			<input type="text" name="overRate" value="<?php
				echo $package['overRate'];
			?>" placeholder="Overtime rate (per half hour)"></br>
			<input type="text" name="packageDeposit" value="<?php
				echo $package['packageDeposit'];
			?>" placeholder="Deposit Amount">
			<textarea rows="3" cols="30" type="text" name="packageDesc" id="desc" placeholder="Description of Package"><?php
				echo htmlspecialchars($package['packageDesc']);
			?></textarea></br>
			
			<input type="submit" name="submit" value="Update Package"></br>
	</form>
</section>




