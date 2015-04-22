<?php
    //PHP to login the admin
	require_once('db_con.php');
	session_start();
	if (isset($_SESSION['message'])) {
		//echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
	
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       

		if (empty($_POST['username']) || empty($_POST['password']) ) {
            	$_SESSION['message'] =  "<p id='error_login'>Please enter a user name and password.</p>";
            	echo "Invalid Credentials";
            	
		}else{
			
		    $username = $_POST['username'];
		    $password = md5( $_POST['password']);
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
					    
		    if($username == $login['username']  && $password == $login['password']){
		       
		        $_SESSION['username'] = $username;
		        $_SESSION['id'] = $userID;
		        //header("Location: dashboard.php");
		        //$_SESSION['message'] = "<div class='message'>You are Logged in!</div>";
		        //$_SESSION['login_user'] = $username;
		        //$_SESSION['login_pass'] = $password;
				
		    }else {
		       	$_SESSION['message'] = "<p id='error'>Your credentials are invalid</p>";
		    }//end of the if/else check password
		    
        }//end of the if/else empty
        
    }//end of the IF server request method
?>
