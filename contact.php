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
				<li><a href="login.php" class="modal-window" id="login">Log in &nbsp;|</a></li>
				<li><a href="register.php" class="modal-window" id="register">&nbsp; Register</a></li>
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
					<li><a href="index.php#feature">Features</a></li>
					<li><a href="index.php#feature">Why us</a></li>
					<li><a href="contact.php">Contact</a></li><!-- Make active -->
				</ul>
			</nav>
		</div>
	</header>
<!-- This secion is for the featured image slider and exerpt along its bottom -->
	<section id="featureContact" class="arrow_boxMain">
		<h1>Get in Touch</h1>
	</section>
<!-- This section will be the two main articles - One for features and one for Why us -->
	<section id="contactForm" class="container">		
		<form action="mailto:{email}" method="GET">
			<h2>Contact Details</h2>
			<h4>Use the form to describe your request</h4>
			<input type="text" name="name"/>
			<input type="email" name="email"/>
			<textarea rows="10" cols="50">
			</textarea>
			<input type="submit" value="Submit" name="submit"/>
		</form>	
			

		
	</section>
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
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<!-- plugins -->

	
	<!-- main -->
	<script type="text/javascript" src="js/main.js"></script>
</body>

</html>