<?php

	require_once('db_con.php');
	session_start();
	if (isset($_SESSION['message'])) {
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
	
// 	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
		$quotes = "SELECT * FROM quotes
				WHERE id = ".$_SESSION['lastId'] ;			
		$results = $db->query($quotes);
		$quote = $results->fetch(PDO::FETCH_ASSOC);
/*
		print_r($quote);
		die();
*/

// 	}	
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
		            <td><?php
						echo $quote['quotePackage'];
					?></td>
		        </tr>
		        <tr>
		            <th scope="row">Options</th>
		            <td><?php
						echo $quote['quoteOption'];
					?></td>
		        </tr>
		        <tr>
		            <th scope="row">Overtime Hours</th>
		            <td><?php 
			           if ($quote['overTime']){
				         
							echo $quote['overTime'];
						
						} else { echo "Not Needed";}
					?></td>
		        </tr>
		        <tr>
		            <th scope="row">Total</th><div class="arrow-right"></div>
		            <td>
					<?php
						echo '$'.$quote['quotePrice'].'.00';
					?></td>
		        </tr>		
			</table>

			<p><strong>This is only an estimate.</strong> In no way does this event quote bind either party into a contract. If you would like to move forward with the booking process please <a href="#companyURLforBooking">contact us</a> as soon as possible.</p>
			<div>
				<td><?php
					echo '<a class="update" href="update-quote.php?id='.$quote['id'].'">Adjust Quote</a>';
				?>
				<a href="this will send to there website or email">Book Date</a>
			</div>
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
	<script src="js/jquery.maskedinput.js"></script>
	<!-- main -->
	<script type="text/javascript" src="js/main.js"></script>	

	
</body>

</html>

<script>
	
	    $(".update").on('click', function () {  
		    //jquery stops the form from submitting to PHP processing
		    //stores the unique variable of the clicked edit button using its href attribute
		var	url = $(this).attr("href");
			//console.log(url);
		$.ajax( {
			//this is where the ajax sends the url for processing ...PHP page
			url: url,
			// Get puts the variable in the URL so it is usable on teh PHP page
			//It is using the ID from the database in the URL to process unique items
			type: "GET",
			//The PHP will return the processed page as a responce and can be used in the success function callback
			success: function(data) {
				console.log(data);
				//Here is where we create the modal window and load in the html from the PHP response.
				var olay = $('<div class="overlay" />').appendTo(document.body).hide();
				var modal = $('<div class="modal" />').appendTo(document.body).hide();
					
					var openmodal = function(){
						modal.animate({opacity:1});
							olay.add(modal).show().css({opacity:0});
							olay.animate({opacity:.8}, 100);
					};
					
					var closemodal = function(){
					 	olay.add(modal).animate({opacity:0}, function(){	
							$(this).hide(); 	
					 	})
					};
					
					
					openmodal();
				$(".modal").html(data);				
				
				
				
				$('.close').on('click', function() {
					console.log(this);
					$('.overlay, .modal').hide();
					return false;
				});	

					
					
				olay.on('click', closemodal);
				
				
				
				$(window).on('keyup', function(e){
				  if (e.which === 27 ){
					  closemodal();
				  }
				}); 
 

			}
			
		});


	return false;
    });

</script>


