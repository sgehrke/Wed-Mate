<?php
	error_reporting(E_ALL);
	require_once('db_con.php');
	session_start();
	if (isset($_SESSION['message'])) {
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
	
	// this makes sure that the user submitted the form by checking the request..Alternativley if ($_POST['submit']) but that can send request withut data
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		//form was submittted
		if (empty($_POST['username']) || empty($_POST['password']) ) {
            	echo "Please enter a user name and password";
		}else{
		//Once the condition is met for begin storing the info in variables
		$logourl = $_POST['logourl'];
		$companyname = $_POST['companyname'];
		$website = $_POST['website'] ;
		$email = $_POST['email'] ;
		$username = $_POST['username'] ;
		$password = md5 ($_POST['password']);

		//Added this query to create a condition to check against 
		$query =  "SELECT * 
					FROM users 
					WHERE username = :username 
					AND password = :password";
					
	
		$stmt = $db->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':password', $password); 
		$stmt->execute();
		$errorInfo = $stmt->errorInfo();
		
		if (isset($errorInfo[2])) {
			$error = $errorInfo[2];
			echo "<h1 style='color:white;background-color:red'>$error</h1>";
			
		} else {
			$numRows = $stmt->rowCount();
			//echo $numRows;
			if ($numRows > 0) {
				$dupmessage = '<p class="dupmessage">That company is already registered</p>';
				header("Location: index.php");
				echo $dupmessage; //cannot dislay this before header...this needs to be displayed on the AJAX modal
			} else {
					//Take the variables from the user input and place them in an array that will be Inserted to the DB 
				$stmt = $db->prepare("INSERT INTO users (username, password, email, companyname, logourl, website) VALUES (:username, :password, :email, :companyname, :logourl, :website);");
				
				$stmt->bindParam(':username', $username);
				$stmt->bindParam(':password', $password);
				$stmt->bindParam(':email', $email);
				$stmt->bindParam(':companyname', $companyname);					
				$stmt->bindParam(':logourl', $logourl);
				$stmt->bindParam(':website', $website);
				$stmt->execute();
				
				
				try {
					$loginQuery = "SELECT *
					            FROM users
					            WHERE username = :username AND password = :password";
					
					$stmtLogin = $db->prepare($loginQuery);
					$stmtLogin->bindParam(':username', $username);
					$stmtLogin->bindParam(':password', $password);
					$stmtLogin->execute();
					
					$login = $stmtLogin->fetch(PDO::FETCH_ASSOC);
					
					$checkUser = $login['username'];
					$checkPass = $login['password'];
					$userID = $login['id'];
					
				} catch(Exception $e) {
					echo $e->getMessage();
					die();
				}	    
					
		        $_SESSION['username'] = $username;
		        $_SESSION['id'] = $userID;
				//header("Location: dashboard.php");

				// MAKE ALL SESSION VARIABLE HERE
			}

		}
	}	
}

?>
<section id="register-modal">	
<!-- 	<div id="ack">ERROR DISPLAY</div> -->
	<form id="registerForm" class="formLayout ajax" method="POST" action="register_processing.php">	
		<a class="close">×</a>
		<h2>Sign up</h2>
	<div id="ack">&nbsp;</div>

			<input type="url" name="logourl" value="" placeholder="Logo URL" class="tooltip arrow_boxTool"><span class="tipbox">This is the URL to your logo file, for example: http://www.yourdjcompany.com/images/logo.gif</br><em>This file must be located on a web server, not on your hard drive.</em></span>
			<input type="text" name="companyname" value="" placeholder="Company Name" ></br>
			<input type="url" name="website" value="" placeholder="Website - http://"  >
			<input id="email" type="email" name="email" value="" placeholder="Email" ></br>
			<input type="text" name="username" value="" placeholder="Username" >
			<input type="password" name="password" value="" placeholder="Password" ></br>
			<input id="register" type="submit" name="submit" value="Submit" ></br>
	</form>

</section>

<script>
	$("form.ajax").on('submit', function () {
		
		var that = $(this),
			url = that.attr('action'),
			type = that.attr('method'),
			data = {};
			
		that.find('[name]').each(function(index, value) {
			var that = $(this),
				name = that.attr('name'),
				value = that.val();
				
			data[name] = value;
		});
        

	        $.ajax({
	
	            url: url,
	            type: "POST",
	            datatype: "json",
	            data: data,
	
	            success: function (data) {
					var data = $.parseJSON(data);
						console.log(data);
						console.log(data.username);
					if (data.error){
						$('#ack').html(data.error);   
					} else {
					
						$(".modal").load('login.php', function(){
					
							$('#username').val(data.username);
							$('#password').focus();
						});
					}

	            }

	
	            
	        });

	return false;
	});
	
	
</script>