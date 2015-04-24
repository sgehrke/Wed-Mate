<?php
	require_once('db_con.php');
	session_start();
	if (isset($_SESSION['username'])==false){
		//redirect to index
		header("Location: index.php");
	}
	if (isset($_SESSION['message'])) {
		echo $_SESSION['message'];
		//echo $_SESSION['username'];
		unset($_SESSION['message']);
	}
	
	
	
	$year = intval($_REQUEST['year']);
    $month = intval($_REQUEST['month']);
    $lastday = intval(strftime('%d', mktime(0, 0, 0, ($month == 12 ? 1 : $month + 1), 0, ($month == 12 ? $year + 1 : $year))));
	
	
	$dates = array();
        $date = $year . '-' . str_pad($month, 2, '0', STR_PAD_LEFT) . '-' .  $lastday;
        $dates[1] = array(
            'date' => $date,
            'badge' => false
        );
	
	// $dates['date']= "2015-04-23";
	
		
/*
    date:"2015-04-24",
    badge:true,
    title:"Tonight",
    classname:"purple-event"
  
);
*/
	
    echo json_encode($dates);

/*
} else {
    echo json_encode(array());
}
*/
?>