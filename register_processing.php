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
		
		$response = array();

		//form was submittted
		if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['companyname']) || empty($_POST['logourl']) || empty($_POST['website'])){
            	$response['error'] = "Please complete the entire form";
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
				$response['username'] = $username;	
		        $_SESSION['username'] = $username;
		        $_SESSION['id'] = $userID;
				
			}
		}
	}
	echo json_encode($response);	
}

?>