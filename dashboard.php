<?php

	session_start();
	if (isset($_SESSION['message'])) {
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
	//setup MySQL database
	$mysql = 'mysql:host=localhost; dbname=wedmate_db';//DSN
	//$db = new PDO($mysql, 'root', 'root');
	//the videos show to always use try/catch
	try {
		$db = new PDO($mysql, 'root', 'root');
		$errorInfo = $db->errorInfo();
		if (isset($errorInfo[2])) {
			$error = $errorInfo[2];
		}
	} catch (PDOException $e) {
		$error = $e->getMessage();
		echo $error;
	}

	
	// this makes sure that the user submitted the form by checking the request..Alternativley if ($_POST['submit']) but that can send request withut data
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		//Once the condition is met for begin storing the info in variables
		$logourl = $_POST['logourl'];
		$companyname = $_POST['companyname'];
		$website = $_POST['website'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$epass = md5("encrypted".$password);

		
		//Added this query to create a condition to check against 
		$query =  "SELECT * 
					FROM users 
					WHERE username = :username 
					AND epass = :epass";
		$stmt = $db->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':epass', $epass); // may need to change this to epass
		$stmt->execute();
		$errorInfo = $stmt->errorInfo();
		if (isset($errorInfo[2])) {
			$error = $errorInfo[2];
			echo "<h1 style='color:white;background-color:red'>$error</h1>";
			
		} else {
			$numRows = $stmt->rowCount();
			//echo $numRows;
			
			if ($numRows > 0) {
				$dupmessage = '<p class="dupmessage">That username is taken</p>';
				echo $dupmessage;
			} else {
			//Take the variables from the user input and place them in an array that will be Inserted to the DB 
			$stmt = $db->prepare("INSERT INTO users (username, email, companyname, epass, logourl, website) VALUES (:username, :email, :companyname, :epass, :logourl, :website);");
			$_SESSION['message'] = "<div class='message'>Client was added Successfully!</div>";
			$stmt->bindParam(':username', $username);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':companyname', $companyname);					
			$stmt->bindParam(':epass', $epass);
			$stmt->bindParam(':logourl', $logourl);
			$stmt->bindParam(':website', $website);
			$stmt->execute();
			}
		}
	}
		
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
	<!-- main -->
	<script type="text/javascript" src="js/main.js"></script>	
</head>

<body>
<!-- 	div for the banner above the nav bar  -->
<main>
	<div>
		<nav>
			<ul>
				<?php echo "<li>Welcome {$username}</li>"
					
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
					<li><a href="#feature">Log out</a></li>
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
							  <tr>
							    <td>Jill</td>
							    <td>Smith</td>		
							    <td>50</td>
							    <td>X</td>
							    <td></td>
							  </tr>
							  <tr>
							    <td>Jill</td>
							    <td>Smith</td>		
							    <td>50</td>
							    <td>X</td>
							    <td></td>
							  </tr>
					
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
							  <tr>
							    <td>Jill</td>
							    <td>Smith</td>		
							    <td>50</td>
							    <td>X</td>
							    <td></td>
							  </tr>
							  <tr>
							    <td>Jill</td>
							    <td>Smith</td>		
							    <td>50</td>
							    <td>X</td>
							    <td></td>
							  </tr>
							  <tr>
							    <td>Jill</td>
							    <td>Smith</td>		
							    <td>50</td>
							    <td>X</td>
							    <td></td>
							  </tr>				
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
							  <tr>
							    <td>Jill</td>
							    <td>Today</td>		
							    <td>Yesterday</td>
							    <td><a href="#view">View</a></td>
							    <td>X</td>

							  </tr>
							  <tr>
							    <td>Jill</td>
							    <td>Today</td>		
							    <td>Yesterday</td>
							    <td><a href="#view">View</a></td>
							    <td>X</td>
							  </tr>
							   <tr>
							    <td>Jill</td>
							    <td>Today</td>		
							    <td>Yesterday</td>
							    <td><a href="#view">View</a></td>
							    <td>X</td>

							  </tr>
							  <tr>
							    <td>Jill</td>
							    <td>Today</td>		
							    <td>Yesterday</td>
							    <td><a href="#view">View</a></td>
							    <td>X</td>
							  </tr>
					
							</table>
						</section>
						
						
					</div> <!-- Quote Checker div -->
				
					<div>
						<section id="checker">
							<h2>Availability Checker</h2>
							<p><strong>Blackout unavailable dates and check the most popular dates.</strong> The availability checker features three tools. You are able to use the calendar to easily blackout dates with a quick view to the right. Along with a convenient way to see the most checked dates.</p>
		
							
							
								<section id="cal-container">
								
									<section id="my-calendar"></section>
								</section>		
									<table id="blackoutTable">
									  <tr>
									    <th colspan="3">Dates Blacked Out</th>							 
									  </tr>
									  <tr>
									  	<td >March 24, 2015</td>
									  	<td><a href="#view Details" class="modal-window" id="detail">View</a></td>
									  	<td><a href="#delete">x</a></td> <!-- setup an confirm box before delete  -->				
									  </tr>
									  <tr>
									  	<td >March 26, 2015</td>
									  	<td><a href="#view Details" class="modal-window" id="detail">View</a></td>
									  	<td><a href="#delete">x</a></td>							
									  </tr>
									  <tr>
									  	<td >March 02, 2015</td>
									  	<td><a href="#view Details" class="modal-window" id="detail">View</a></td>
									  	<td><a href="#delete">x</a></td>							
									  </tr>		
									</table>
								
									<table id="mostViewedTable">
									 <tr>
									    <th>Most Viewed Dates</th>							   
									  </tr>
									  <tr>							    
									    <td>March 24, 2015</td>
									  </tr>
									  <tr>							    
									    <td >March 26, 2015</td>
									  </tr>
									  <tr>							    
										<td >March 02, 2015</td>
									  </tr>
									</table>
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