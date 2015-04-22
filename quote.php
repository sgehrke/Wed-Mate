<?php
	session_start();
?>
<!DOCTYPE HTML>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Event Assistant | Wed-Mate</title>
	<link rel="stylesheet" href="css/normalize.css">
	<!-- jquery -->
	<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
	<script src="js/jquery-2.1.0.min.js"></script>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<!--
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
-->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">

</head>

<body>
<!-- 	div for the banner above the nav bar  -->
<main>
	<div>

	</div>
<!-- This secion is for the featured image slider and exerpt along its bottom -->
	<section id="featureUX">
		<a href="#home.html" target="_blank"><div id="userLogo" class="container">
		</div></a>
		<div id="featOverlayUX">
				<ol class="progtrckr" data-progtrckr-steps="3">
				    <li class="progtrckr-done"><span>Check Availability</span></li><!--
				    --><li class="progtrckr-done"><span>Tell us about you</span></li><!--
				    --><li class="progtrckr-done"><span>Get Instant Quote</span></li>
				</ol>
		</div>
	</section>
	<section id="quote">
		<h2>Here is your Instant Quote</h2>
		<section>
		<p><strong>Please review your choices.</strong> You may adjust your quote to tailor the package to your needs. If you are satisfied with the quote please <a href="#companyURLfor Booking">contact us</a> and we will begin the booking process.</p>
			<table>
				<tr>
		            <th scope="row">Package</th>
		            <td>This will display package detail</td>
		        </tr>
		        <tr>
		            <th scope="row">Options</th>
		            <td>This will display option detail</td>
		        </tr>
		        <tr>
		            <th scope="row">Overtime Hours</th>
		            <td>This will display price for overtime hours</td>
		        </tr>
		        <tr>
		            <th scope="row">Total</th><div class="arrow-right"></div>
		            <td>This will display the Price</td>
		        </tr>		
			</table>

			<p><strong>This is only an estimate.</strong> In no way does this event quote bind either party into a contract. If you would like to move forward with the booking process please <a href="#companyURLforBooking">contact us</a> as soon as possible.</p>
			<div><a href="calendar.php">Adjust Quote</a><a href="this will send to there website or email">Book Date</a></div>
		</section>
	</section>
	
	
</main>

	<footer>
		<div class="container">
			<p>Powered by &nbsp; &copy;<a href="index.html">Wed-Mate.com 2015</a> </p>
			<p id="social">
				<a href="twitter.com"><i class="fa fa-twitter"></i></a>
				<a href="facebook.com"><i class="fa fa-facebook"></i></a>
				<a href="google.com"><i class="fa fa-google-plus"></i></a>
			</p>
		</div>
		
	</footer>
	<!-- jquery -->
	<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
	<script src="js/jquery-2.1.0.min.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script src="js/zabuto_calendar.min.js"></script>
	<!-- main -->
	<script type="text/javascript" src="js/main.js"></script>	

	
</body>

</html>
