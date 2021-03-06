<?php
	error_reporting(E_ALL);
	require_once('db_con.php');
	session_start();

	if (isset($_SESSION['message'])) {
		echo $_SESSION['message'];
		//echo $_SESSION['username'];
		unset($_SESSION['message']);
	}
	//print_r($_SESSION);
/*
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

	$quoteSql = 'SELECT * FROM quotes
			WHERE quoteCreator ='.$_SESSION['id'];
	$results = $db->query($quoteSql);
	$quotes = $results->fetchAll(PDO::FETCH_ASSOC);
*/

?>
<!DOCTYPE HTML>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Event Assistant | Wed-Mate</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
<!-- 	div for the banner above the nav bar  -->
<main>
	<div>
		<nav>
			<ul>
				<li><a href="login.php" class="modal-window" id="login">Log in &nbsp;|</a></li> <!-- Temp link to UX -->
				<li><a href="register.php" class="modal-window" id="register">&nbsp; Register</a></li>
			</ul>
		</nav>
	</div>

	<header>
<!-- Nav bar with logo floated left and nav floated right -->
		<div class="container">
			<h1>
				<a href="#">
					<img src="images/webMateLogo/WedMate_Logo_186x100.png" alt="Wed-Mate Event Assitant Logo" height="75">
				</a>
			</h1>
			<nav>
				<ul>
					<li><a href="#feature">Features</a></li>
					<li><a href="#feature">Why us</a></li>
					<li><a href="contact.php">Contact</a></li>
				</ul>
			</nav>
		</div>
	</header>
<!-- This secion is for the featured image slider and exerpt along its bottom -->
	<section id="feature">
		
		
		
		
		
		
		<p></p>
		<div id="featOverlay">
			<div class="container">
				<p><strong>What is Wed-Mate? </strong>Wed-Mate is an event assistant made for wedding professionals. It is designed to help ease the burden of replying to numerous inquiries regarding pricing and availability. Sign up to learn about our event tools.</p>
			<a href="register.php" class="modal-window" id="register">Sign up</a>
			</div>
		</div>
	</section>
<!-- This section will be the two main articles - One for features and one for Why us -->
	<section class="container">		
		<article id="mainContent">
			<header>
				<h2>Features</h2>
			</header>	
				<img src="images/dressDrapedSmall.jpg" alt="dressDrapedSmall" width="150" height="222">
				<h3>Instant Quote Generator</h3>
				
				<p>Our system makes gathering potential client information as easy as 1-2-3. All they need to do is check their date, supply their pertinent information, and check the generated price quote. You have complete control of the prices and will be alerted only when someone checks a date that you are available on.</p>
<!-- These h3's may need to be put into a div container to seperate content -->
				<a href="calendar.php?id=<?php
					echo $_SESSION['id'];
				?>"><img src="images/calendar.jpg" alt="calendar" width="150" height="150"></a>
				<h3>Availability Checker</h3>
				
				<p>The event calendar will allow you to blackout unavailable dates with a click of a button. You will also be able to see event details simply by hovering over a blacked out date. </p>
		</article>
		
		<article>
			<header>
				<h2>Why us</h2>
			</header>
			<img src="images/ipad-606764_455.jpg" alt="ipad-606764_455" width="405" height="222">
			<h3>The Reason is Simple</h3>
			<p>We know the industry! Having had a successful wedding DJ business in Wisconsin for over 10 years, we can assure you that all aspects of your booking difficulties will be addressed with this application. The tools that we provide will keep you focused on responding to new clients and generating more income rather than replying to unnecessary inquiries. We have taken the time to develop a system that automates the booking process and delivers optimal ROI.</p>
		</article>
		
	</section>

	<a href="contact.php">
		<section id="subfooter" class="arrow_box">
		<h4>Get in Touch</h4>
		</section>
	</a>
</main>
	<footer>
		<div class="container">
			<p>&copy; Wed-Mate.com 2015 </p>
			<p id="social">
				<a href="twitter.com"><i class="fa fa-twitter"></i></a>
				<a href="facebook.com"><i class="fa fa-facebook"></i></a>
				<a href="google.com"><i class="fa fa-google-plus"></i></a>
			</p>
		</div>
		
	</footer>

	
	<!-- jquery -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- 	<script src="js/jquery-2.1.0.min.js"></script> -->

	<!-- plugins -->

	
	<!-- main -->
	<script type="text/javascript" src="js/main.js"></script>

</body>

</html>