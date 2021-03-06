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
		//echo $_SESSION['username'];
		unset($_SESSION['message']);
	}
	
	$company = $_SESSION['id'];
	//print_r($_SESSION);
	$packagesSql = 'SELECT * FROM packages
			WHERE packageCreator ='.$_SESSION['id'];
	$results = $db->query($packagesSql);
	$packages = $results->fetchAll(PDO::FETCH_ASSOC);
	
	$optionsSql = 'SELECT * FROM options
			WHERE optionCreator ='.$_SESSION['id'];
	$results = $db->query($optionsSql);
	$options = $results->fetchAll(PDO::FETCH_ASSOC);

	$eventsSql = 'SELECT * FROM events
			WHERE eventCreator ='.$_SESSION['id'];
	$results = $db->query($eventsSql);
	$events = $results->fetchAll(PDO::FETCH_ASSOC);
	$numRows = $results->rowCount();

	$quoteSql = 'SELECT * FROM quotes
			WHERE quoteCreator ='.$_SESSION['id'];
	$results = $db->query($quoteSql);
	$quotes = $results->fetchAll(PDO::FETCH_ASSOC);
	
	$mostviewedSql = 'select quoteDate, count(*) as viewed FROM quotes
						WHERE quoteCreator = :company
						group by quoteDate
						ORDER BY viewed desc
						limit '. $numRows;
					
								
	$viewed = $db->prepare($mostviewedSql);
	$viewed->bindParam(':company', $company);
// 	$viewed->bindParam(':numrows', $numRows);
	$viewed->execute();
	$mostViewed = $viewed->fetchAll(PDO::FETCH_ASSOC);
/*
	print_r($mostViewed);
	die();
*/
	
/*
			$packagesSql = 'SELECT * FROM packages
		WHERE packageName = :quotePackage';
		$results = $db->prepare($packagesSql);
		$results->bindParam(':quotePackage', $quotePackage);
		$results->execute();
		$packages = $results->fetch(PDO::FETCH_ASSOC);
*/

/*
	print_r($quotes);
	die();
*/

?>
<!DOCTYPE HTML>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Event Assistant | Wed-Mate</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
	<script src="js/zabuto_calendar.js"></script>
	<script src="js/jquery.maskedinput.js"></script>
	<!-- main -->
	<script type="text/javascript" src="js/main.js"></script>	
</head>

<body>
<!-- 	div for the banner above the nav bar  -->
<main>
	<div>
		<nav>
			<ul>
				<?php echo "<li>Welcome {$_SESSION['username']}</li>"
					
				?>
			</ul>
		</nav>
	</div>

	<header>
<!-- Nav bar with logo floated left and nav floated right -->
		<div class="container">
			<h1>
				<a href="index.php">
					<img src="images/webMateLogo/WedMate_Logo_186x100.png" alt="Wed-Mate Event Assitant Logo" height="75">
				</a>
			</h1>
			<nav>
				<ul>
					<li><a href="link-gen.php" class="modal-window" id="link-gen">Link Generator</a></li>
					<li><a id="logOut" href="logout.php">Log out</a></li>
				</ul>
			</nav>
		</div>
	</header>
<!-- This secion is for the featured image slider and exerpt along its bottom -->
	<section id="featureDash">
		<p class="container"></p>
		<div id="featOverlayDash">
			<div class="container">
				<h2>Dashboard</h2>
			</div>
		</div>

	</section>

	<section>
<!-- Tabs -->
		<div id="tab-wrapper">	
				<ul id="tabs">
					<li class="active">Quote Generator</li>
					<li>Quote Checker</li>
					<li>Availability Checker</li>
				</ul>
				<div id="tab-content">
					<div>
						<section>
							<h2>Quote Generator Tools</h2>
							<p><strong>Set your package prices and additional options.</strong> Here is where you can add or modify packages to entice potential clients to complete their instant quote by giving you there contact information.</p>
							<table>
							  <tr>
							    <th>Packages</th>
							    <th>Price</th>		
							    <th>Edit</th>
							    <th>Delete</th>
							    <th><a href="#add" class="modal-window" id="new-package">Add New</a></th>
							  </tr>
							 
							  <?php
							  	foreach ($packages as $package) {
								  	echo 
								  '<tr>
								    <td>'.$package["packageName"].'</td>
								    <td>'.$package["packagePrice"].'</td>		
								    <td><a class="update" href="update-package.php?id='.$package['id'].'">Edit</a></td>
								    <td><a class="delete" href="delete-package.php?id='.$package['id'].'">Delete</a></td>
								    <td></td> 
								 </tr>'; }
							  ?>
						
							</table>
							
							<br>
							
							<table id="t01">
							 <tr>
							    <th>Options</th>
							    <th>Price</th>		
							    <th>Edit</th>
							    <th>Delete</th>
							    <th><a href="#add" class="modal-window" id="new-option">Add New</a></th>
							  </tr>
							  <?php
							  	foreach ($options as $option) {
								  	echo 
								  '<tr>
								    <td>'.$option["optionName"].'</td>
								    <td>'.$option["optionPrice"].'</td>		
								    <td><a class="update" href="update-option.php?id='.$option['id'].'">Edit</a></td>
								    <td><a class="delete" href="delete-option.php?id='.$option['id'].'">Delete</a></td>
								    <td></td> 
								 </tr>'; }
							  ?>		
							</table>
						</section>
						
					</div> <!-- Quote generator div -->
		
					<div>
						<section>
							<h2>Quote Checker</h2>
							<p><strong>Checkout your potential clients generated quotes</strong> View all of your client quotes so you can track what is working. You can also delete past inquiries or store them for an unlimited duration.</p>
							<table>
							  <tr>
							    <th>Client Name</th>
							    <th>Event Date</th>		
							    <th>Date Submitted</th>
							    <th>View</th>
							    <th>Delete</th>
							  </tr>
							  <?php
									  	foreach ($quotes as $quote) {
									  	echo 
									  '<tr>
									  	<td>'.$quote["quoteName"].'</td>
									    <td>'.$quote["quoteDate"].'</td>
									    <td>'.$quote["quoteSubmitted"].'</td>	
									    <td><a class="update" href="view-quote.php?id='.$quote['id'].'">View</a></td>
									    <td><a class="delete" href="delete-quote.php?id='.$quote['id'].'">Delete</a></td> 
									 </tr>'; }
								  ?>
					
							</table>
						</section>
						
						
					</div> <!-- Quote Checker div -->
				
					<div>
						<section id="checker">
							<h2>Availability Checker</h2>
							<p><strong>Blackout unavailable dates and check the most popular dates.</strong> The availability checker features three tools. You are able to use the calendar to easily blackout dates with a quick view to the right. Along with a convenient way to see the most checked dates.</p>
		
							
							
								<section id="cal-container">
								
									<section id="my-calendar"></section>
									
									<section class="tables">
										<table id="blackoutTable">
										  <tr>
										    <th colspan="3">Dates Blacked Out
										    </th>	 
										  </tr>
	<!-- DYNAMIC BLACKOUT DATES -->
									<?php
									  	foreach ($events as $event) {
									  	echo 
									  '<tr>
									    <td>'.$event["eventDate"].'</td>	
									    <td><a class="update" href="update-zabuto.php?id='.$event['id'].'">View</a></td>
									    <td><a class="delete" href="delete-event.php?id='.$event['id'].'">Delete</a></td> 
									 </tr>'; }
								  ?>
										  	
										</table>
									
										<table id="mostViewedTable">
										 	<th>Most Viewed Dates</th>
										 <?php
										 	foreach ($mostViewed as $viewed){;
										 	echo '<tr><td>'.$viewed['quoteDate'].'</td></tr>';
										 	}
										 ?>
										  
										</table>
									</section>
								</section>
						</section>	
					</div> <!-- Avail checker div -->
					
				</div>	<!-- End tabs-content -->
		</div>	<!-- End Tab-Wrapper -->




	</section>

	<a href="contact.php"><section id="subfooter" class="arrow_box">
		<h4>Get Support</h4>
	</section></a>
</main>
	<footer>
		<div class="container">
			<p>Powered by &nbsp; &copy;<a href="index.php">Wed-Mate.com 2015</a> </p>
			<p id="social">
				<a href="twitter.com"><i class="fa fa-twitter"></i></a>
				<a href="facebook.com"><i class="fa fa-facebook"></i></a>
				<a href="google.com"><i class="fa fa-google-plus"></i></a>
			</p>
		</div>
		
	</footer>

	
</body>

</html>

<script>
	
	$( document ).ready(function() {
		// When clicking delete where the class name is delete the confirm message is shown
		$('.delete').click(function(){
				return window.confirm(this.title || 'Are you sure you would like to delete');		
			});
			
	});
</script>



