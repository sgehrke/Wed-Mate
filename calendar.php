<?php
	error_reporting(E_ALL);
	require_once('db_con.php');
	session_start();
	
	if (isset($_SESSION['message'])) {
		echo $_SESSION['message'];
		//echo $_SESSION['username'];
		unset($_SESSION['message']);
	};
	
	$_SESSION['companyId'] = $_GET['id'];

	if (!isset($_SESSION['companyId'])) {
		header("Location: index.php");
		die();	
	};

	$userSql = 'SELECT * FROM users
			WHERE id ='.$_SESSION['companyId'];
	$results = $db->query($userSql);
	$user = $results->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Event Assistant | Wed-Mate</title>
	<link rel="stylesheet" href="css/normalize.css">
	<!-- jquery -->
	<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
	<link rel="stylesheet" href="css/style.css">
		<!-- jquery -->
	<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/zabuto_calendar.js"></script>
<script src="js/jquery.maskedinput.js"></script>
	<!-- main -->
	<script type="text/javascript" src="js/main.js"></script>
</head>

<body>
<!-- 	div for the banner above the nav bar  -->
<main>
	<div>

	</div>
<!-- This secion is for the featured image slider and exerpt along its bottom -->
	<section id="featureUX">
		<?php
			if (strlen($user['logourl']) > 1) {
			// session logourl show logo image
			echo '<a href="'.$user["website"].'" target="_blank"><div id="userLogo" class="container"><img src="'.$user['logourl'].'" alt="'.$user['companyname'].'" height="245">
			</div></a>';
			} else {
				echo '<div id="userLogo" class="container"><h1>'.$user['companyname'].'</h1>
			</div>';
			};
			
		?>
		<div id="featOverlayUX">
				<ol class="progtrckr" data-progtrckr-steps="3">
				    <li class="progtrckr-done"><span>Check Availability</span></li><!--
				    --><li class="progtrckr-todo"><span>Tell us about you</span></li><!--
				    --><li class="progtrckr-todo"><span>Get Instant Quote</span></li>
				</ol>
		</div>
	</section>
	
	<section id="calendar">
		<aside>
			<div>Today</div>
			<p></p>
		</aside>
		<section>
			<div id="my-calendar">	
			</div>

					<a class="checkDate" id ="check-date">Check Selected Date</a>
			
		</section>
		
	</section>
	
	
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

