<?php
	error_reporting(E_ALL);
	require_once('db_con.php');
	session_start();

	if (isset($_SESSION['message'])) {
		echo $_SESSION['message'];
		//echo $_SESSION['username'];
		unset($_SESSION['message']);
	}

?>

<section id="login-modal">	
	<form class="formLayout ajax" method="POST" action="login_processing.php" >	
		<a class="close">×</a>
		<h2>Your Link Generator</h2>
		<p>Copy and paste this link into your websites homepage to make your Wed-Mate calendar available to your customers.</p>
			<textarea rows="3" cols="30" type="text" name="link-gen" id="desc" value="" ><a href="http://wed-mate.com/calendar.php?id=<?php
					echo $_SESSION['id'];
				?>"></a></textarea></br>
			
	</form>
</section>
<script>