	
<section id="register-modal">	
	<form class="formLayout" method="POST" action="dashboard.php" >	
		<a class="close">×</a>
		<h2>Blackout Date</h2>
<!-- id="dynamic-date" -->
			<input id="bodate" type="text" name="bodate" value="" placeholder="Date to blackout"></br>
			<input id="event_title" type="text" name="event_title" value="" placeholder="Title of Event">			
			<textarea cols="4"  type="text" name="desc" id="desc" value="" placeholder="Description of event" ></textarea></br>
			<input type="submit" name="submit" value="Blackout">
	</form>

<script>
	
	$( document ).ready(function() {
	
		$('.close').on('click', function() {
			$('.overlay, .modal').hide();
			return false;
		});
		var day = datesplit[2];
		var month = datesplit[1];
		switch (month) {
		    case "01":
		        month = "January";
		        break;
		    case "02":
		        month = "February";
		        break;
		    case "03":
		        month = "March";
		        break;
		    case "04":
		        month = "April";
		        break;
		    case "05":
		        month = "May";
		        break;
		    case "06":
		        month = "June";
		        break;
			case "07":
		        month = "July";
		        break;
		    case "08":
		        month = "August";
		        break;
		    case "09":
		        month = "September";
		        break;
		    case "10":
		        month = "October";
		        break;
		    case "11":
		        month = "November";
		        break;
		    case "12":
		        month = "December";
		        break;    
		}
		
		var dateString	= month + " " + day + ", " + datesplit[0];
			console.log(dateString);
		$("#bodate").val(dateString);

	
	});
</script>