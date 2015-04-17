	
<section id="login-modal">	
	<form class="formLayout" method="POST" action="dashboard.php" onsubmit="return FrontPage_Form1_Validator(this)" name="FrontPage_Form1" language="JavaScript">	
		<a class="close">×</a>
		<h2>Sign in</h2>
			<input id="username" type="username" name="username" value="" placeholder="Username"></br>
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
	    document.getElementById('email').style.outlineColor = "#ff6f47";
	    theForm.Email.focus();
	    return (false);
	  }
/*
	  if else (theForm.Email.value.length => 1) {
		theForm.Email.focus();
		document.getElementById('email').style.outlineColor = "default";
	    document.getElementById('email').style.borderColor = "black";	
	    return (false);	  
	  }
*/
	  return (true);
	}


</script>

