<?php
	error_reporting(E_ALL);
	require_once('db_con.php');
	session_start();

	if (isset($_SESSION['message'])) {
		echo $_SESSION['message'];
		//echo $_SESSION['username'];
		unset($_SESSION['message']);
	};
	


	$userSql = 'SELECT * FROM users
			WHERE id ='.$_SESSION['companyId'];
	$results = $db->query($userSql);
	$user = $results->fetch(PDO::FETCH_ASSOC);

/*
	print_r($user);
	die();
*/
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
				
		</div>
	</section>
	
	<section id="booked" class="container">
		<h3>We regret to inform you that the date you are inquiring <br/> about has already been booked <br/>Feel Free to check our availablity on other dates</h3>
		<h4><strong>There still might be a chance!</strong> Sometimes dates fall through and become available again. Please <a href="contact.php">contact us</a> if you are interested in joining out waiting list.</h4>
		<a href="calendar.php?id=<?php
					echo $user['id'];
				?>">Check New Date</a>
			
	</section>

</main>

	<footer>
		<div class="container">
			<p>&copy; Wed-Mate.com 2015 </p>
			<p>
				<a>Twitter</a>
				<a>Facebook</a>
				<a>Google</a>
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
	<script type="application/javascript">
		var eventData = [
  {
    "date":"2015-04-30",
    "badge":true,
    "title":"Tonight",
    "body":"<p class=\"lead\">Party<\/p><p>Like it's 1999.<\/p>",
    "footer":"At Paisley Park",
    "classname":"purple-event"
  },
  {
    "date":"2016-01-01"
  }
];
					$(document).ready(function () {
					$("#my-calendar").zabuto_calendar({
						data: eventData,
						show_previous: false,
						nav_icon: {
						prev: '<i class="fa fa-chevron-circle-left"></i>',
						next: '<i class="fa fa-chevron-circle-right"></i>'
					}
			});
		});
	</script>

	
</body>

</html>