	
<section id="register-modal">	
	<form class="formLayout" method="POST" action="dashboard.php" onsubmit="return FrontPage_Form1_Validator(this)" name="FrontPage_Form1" language="JavaScript">	
		<a class="close">×</a>
		<h2 id="dynamic-date">Blackout </h2>
			<input type="text" name="companyname" value="" placeholder="Company Name"></br>
			<input type="url" name="logourl" value="" placeholder="Logo URL"></br>
			<input type="url" name="website" value="" placeholder="Website - http://"></br>
			<input id="email" type="email" name="email" value="" placeholder="Email"></br>
			<input type="text" name="username" value="" placeholder="Username">
			<input type="password" name="password" value="" placeholder="Password"></br>
			<input type="submit" name="submit" value="Submit"></br>
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