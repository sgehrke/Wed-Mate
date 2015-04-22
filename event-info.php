	
<section id="register-modal">	
	<form class="formLayout" method="POST" action="quote.php" onsubmit="return FrontPage_Form1_Validator(this)" name="FrontPage_Form1" language="JavaScript">	
		<a class="close">×</a>
		<h2 id="dynamic-date">Event Date: </h2>
			<input type="text" name="name" value="" placeholder="Name"></br>
			<input id="email" type="email" name="email" value="" placeholder="Email"></br>
			<input type="phone" name="phone" value="" placeholder="Phone"></br>
			<input type="text" name="event_loc" value="" placeholder="Event Location"></br>
			<div class="select-style">
				<select name="time" id="start_time" required >
					<option selected="selected">Start Time</option>			 
					<option value="11:00 AM">11:00 AM</option>
					<option value="11:30 AM">11:30 AM</option>
				 
					<option value="12:00 PM">12:00 PM</option>
					<option value="12:30 PM">12:30 PM</option>
				 
					<option value="1:00 PM">1:00 PM</option>
					<option value="1:30 PM">1:30 PM</option>
	
				 
					<option value="2:00 PM">2:00 PM</option>
	
					<option value="2:30 PM">2:30 PM</option>
	
				 
					<option value="3:00 PM">3:00 PM</option>
	
					<option value="3:30 PM">3:30 PM</option>
	
				 
					<option value="4:00 PM">4:00 PM</option>
	
					<option value="4:30 PM">4:30 PM</option>
	
				 
					<option value="5:00 PM">5:00 PM</option>
	
					<option value="5:30 PM">5:30 PM</option>
	
				 
					<option value="6:00 PM">6:00 PM</option>
	
					<option value="6:30 PM">6:30 PM</option>
	
				 
					<option value="7:00 PM">7:00 PM</option>
	
					<option value="7:30 PM">7:30 PM</option>
	
				 
					<option value="8:00 PM">8:00 PM</option>
	
					<option value="8:30 PM">8:30 PM</option>
	
				 
					<option value="9:00 PM">9:00 PM</option>
	
					<option value="9:30 PM">9:30 PM</option>
	
				 
					<option value="10:00 PM">10:00 PM</option>
	
					<option value="10:30 PM">10:30 PM</option>
	
				 
					<option value="11:00 PM">11:00 PM</option>
	
					<option value="11:30 PM">11:30 PM</option>
					<option value="12:00 AM">12:00 AM</option>
				</select>
			
				<select name="end_time" id="end_time" required >
					<option selected="selected">End Time</option>			 
					<option value="11:00 AM">11:00 AM</option>
					<option value="11:30 AM">11:30 AM</option>
				 
					<option value="12:00 PM">12:00 PM</option>
					<option value="12:30 PM">12:30 PM</option>
				 
					<option value="1:00 PM">1:00 PM</option>
					<option value="1:30 PM">1:30 PM</option>
	
				 
					<option value="2:00 PM">2:00 PM</option>
	
					<option value="2:30 PM">2:30 PM</option>
	
				 
					<option value="3:00 PM">3:00 PM</option>
	
					<option value="3:30 PM">3:30 PM</option>
	
				 
					<option value="4:00 PM">4:00 PM</option>
	
					<option value="4:30 PM">4:30 PM</option>
	
				 
					<option value="5:00 PM">5:00 PM</option>
	
					<option value="5:30 PM">5:30 PM</option>
	
				 
					<option value="6:00 PM">6:00 PM</option>
	
					<option value="6:30 PM">6:30 PM</option>
	
				 
					<option value="7:00 PM">7:00 PM</option>
	
					<option value="7:30 PM">7:30 PM</option>
	
				 
					<option value="8:00 PM">8:00 PM</option>
	
					<option value="8:30 PM">8:30 PM</option>
	
				 
					<option value="9:00 PM">9:00 PM</option>
	
					<option value="9:30 PM">9:30 PM</option>
	
				 
					<option value="10:00 PM">10:00 PM</option>
	
					<option value="10:30 PM">10:30 PM</option>
	
				 
					<option value="11:00 PM">11:00 PM</option>
	
					<option value="11:30 PM">11:30 PM</option>
					<option value="12:00 AM">12:00 AM</option>
				</select>
			</div>			

			
			
			<div class="select-style">
				<select name="choose_package" id="choose_package" required>
					<option value="dynamic packages">Choose a Package</option>
				</select>
			
			
				<select name="choose_option" id="choose_option" required>
					<option value="dynamic packages">Choose an Option</option>
				</select>
			</div>
			
			<input type="submit" name="submit" value="Instant Quote"></br>
	</form>
</section>
<script language="JavaScript" type="text/javascript">

	function FrontPage_Form1_Validator(theForm)
	{
	
	  if (theForm.Email.value == "")
	  {
	    theForm.Email.setAttribute("class", "error");
	    document.getElementById('email').style.borderColor = "#ff6f47";
	    document.getElementsByName('Email')[0].placeholder='Email is Required';
	    return (false);
	  }
	  return (true);
	}


</script>

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
		$("h2#dynamic-date").append(dateString);

	
	});
</script>