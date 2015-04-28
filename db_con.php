<?php
	error_reporting(E_ALL);
	//setup MySQL database
	$mysql = 'mysql:host=localhost; dbname=wedmate_db';//DSN
	//$db = new PDO($mysql, 'root', 'root');
	//the videos show to always use try/catch
	try {
		$db = new PDO($mysql, 'root', 'root');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo $e->getMessage();
		die();
	}
?>
