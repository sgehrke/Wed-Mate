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
	

		$quoteId = $_GET['id'];
		$stmt = $db->prepare("SELECT * FROM quotes
				WHERE id = :id");
		$stmt->bindParam(':id', $quoteId);
		$stmt->execute();
		$quote = $stmt->fetch(PDO::FETCH_ASSOC);
		

		$packagesSql = 'SELECT * FROM packages
				WHERE packageCreator ='.$_SESSION['id'];
		$results = $db->query($packagesSql);
		$packages = $results->fetchAll(PDO::FETCH_ASSOC);
		
	
		$optionsSql = 'SELECT * FROM options
				WHERE optionCreator ='.$_SESSION['id'];
		$results = $db->query($optionsSql);
		$options = $results->fetchAll(PDO::FETCH_ASSOC);
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$quoteId = $_GET['id'];
		$stmt = $db->prepare("SELECT * FROM quotes
				WHERE id = :id");
		$stmt->bindParam(':id', $quoteId);
		$stmt->execute();
		$quote = $stmt->fetch(PDO::FETCH_ASSOC);
		

		$packagesSql = 'SELECT * FROM packages
				WHERE packageCreator ='.$_SESSION['id'];
		$results = $db->query($packagesSql);
		$packages = $results->fetch(PDO::FETCH_ASSOC);
		
	
		$optionsSql = 'SELECT * FROM options
				WHERE optionCreator ='.$_SESSION['id'];
		$results = $db->query($optionsSql);
		$options = $results->fetch(PDO::FETCH_ASSOC);

		
		$totalTime = $quote['endTime'] - $quote['startTime'];
		 	if ($totalTime <= $packages['packageHours']){
			 	$overage = 0;
		 	} else {
			 	$overage = $totalTime - $packages['packageHours'];
		 	}
		 	
		$overTime = ($packages['overRate']* 2 ) * $overage;
	
		$quotePrice = $packages['packagePrice'] + $options['optionPrice'] + $overTime  ;	
			
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
		$overTime = $quote['overTime'];
		$quotePrice = $packages['packagePrice'] + $options['optionPrice'] + $overTime  ;		
	
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




?>	
<section id="register-modal">	
	<form class="formLayout" method="POST" action="update-quote.php?id=<?php
		echo $quoteId;
	?>">	
		<a class="close">×</a>
		<h2 class="dynamic-date">Adjust Quote</h2>
			<input class="dynamic-date" type="text" name="quoteDate" placeholder="Date" value="<?php
				echo $quote['quoteDate'];
			?>"></br>
			<input type="text" name="quoteName" value="<?php
				echo $quote['quoteName'];
			?>" placeholder="Name"></br>
			<input id="email" type="email" name="quoteEmail" value="<?php
				echo $quote['quoteEmail'];
			?>" placeholder="Email"></br>
			<input id="phone" type="phone" name="quotePhone" value="<?php
				echo $quote['quotePhone'];
			?>" placeholder="Phone"></br>
			<input type="text" name="quoteLocation" value="<?php
				echo $quote['quoteLocation'];
			?>" placeholder="Event Location"></br>
			<div class="select-style">
				<select name="startTime" id="start_time" required >
					<option selected="selected">Start Time</option>	 
					<option value="11">11:00 AM</option>
					<option value="11.5">11:30 AM</option>	 
					<option value="12">12:00 PM</option>
					<option value="12.5">12:30 PM</option>		 
					<option value="13">1:00 PM</option>
					<option value="13.5">1:30 PM</option>		 
					<option value="14">2:00 PM</option>
					<option value="14.5">2:30 PM</option> 
					<option value="15">3:00 PM</option>
					<option value="15.5">3:30 PM</option>	 
					<option value="16">4:00 PM</option>
					<option value="16.5">4:30 PM</option> 
					<option value="17">5:00 PM</option>
					<option value="17.5">5:30 PM</option>
					<option value="18">6:00 PM</option>
					<option value="18.5">6:30 PM</option>
					<option value="19">7:00 PM</option>
					<option value="19.5">7:30 PM</option>
					<option value="20">8:00 PM</option>
					<option value="20.5">8:30 PM</option>		
					<option value="21">9:00 PM</option>	
					<option value="21.5">9:30 PM</option>		 
					<option value="22">10:00 PM</option>	
				</select>
			
				<select name="endTime" id="end_time" required >
					<option selected="selected">End Time</option>			 
					<option value="17">5:00 PM</option>
					<option value="17.5">5:30 PM</option>
					<option value="18">6:00 PM</option>
					<option value="18.5">6:30 PM</option>
					<option value="19">7:00 PM</option>
					<option value="19.5">7:30 PM</option>
					<option value="20">8:00 PM</option>
					<option value="20.5">8:30 PM</option>		
					<option value="21">9:00 PM</option>	
					<option value="21.5">9:30 PM</option>		 
					<option value="22">10:00 PM</option>	
					<option value="22.5">10:30 PM</option>
					<option value="23">11:00 PM</option>	
					<option value="23.5">11:30 PM</option>
					<option value="24">12:00 AM</option>
				</select>
			</div>			

			
			
			<div class="select-style">
				<select name="quotePackage" id="choose_package" required>
					<option value="NULL">Choose a Package</option>
					<?php
						foreach ($packages as $package) {
							echo '<option>'.$package['packageName'].'</option>';
						}
					?>
				</select>
			
			
				<select name="quoteOption" id="choose_option" required>
					<option value="dynamic packages">Choose an Option</option>
						<?php
							foreach ($options as $option) {
								echo '<option>'.$option['optionName'].'</option>';
							}
						?>					
				</select>
			</div>
			
			<input type="submit" name="submit" value="Instant Quote"></br>
	</form>
</section>
<script language="JavaScript" type="text/javascript">

	function FrontPage_Form1_Validator(theForm)
	{
	
	  if (theForm.Email.value == "")
	  {
	    theForm.Email.setAttribute("class", "error");
	    document.getElementById('email').style.borderColor = "#ff6f47";
	    document.getElementsByName('Email')[0].placeholder='Email is Required';
	    return (false);
	  }
	  return (true);
	}


</script>
	<script>
		jQuery(function($){
			$("#phone").mask("(999) 999-9999");
		});
	</script>
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
		$("h2.dynamic-date").append(dateString); 
		$("input.dynamic-date").val(dateString);

	
	});
</script>