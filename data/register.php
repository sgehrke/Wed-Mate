<?php
	;
?>
<section id="register-modal">	
	<form class="formLayout" method="POST" action="dashboard.php" onsubmit="return FrontPage_Form1_Validator(this)" name="FrontPage_Form1" language="JavaScript">	
		<a class="close">×</a>
		<h2>Sign up</h2>
			<input type="url" name="logourl" value="" placeholder="Logo URL" class="tooltip arrow_boxTool"><span class="tipbox">This is the URL to your logo file, for example: http://www.yourdjcompany.com/images/logo.gif</br><em>This file must be located on a web server, not on your hard drive.</em></span>
			<input type="text" name="companyname" value="" placeholder="Company Name"></br>
			<input type="url" name="website" value="" placeholder="Website - http://">
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

