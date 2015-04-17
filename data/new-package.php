	
<section id="register-modal">	
	<form class="formLayout" method="POST" action="dashboard.php" onsubmit="return FrontPage_Form1_Validator(this)" name="FrontPage_Form1" language="JavaScript">	
		<a class="close">×</a>
		<h2>Add New Package</h2>
			<input type="text" name="packname" value="" placeholder="Package Name"></br>
			<input type="text" name="hours" value="" placeholder="Hours Included"></br>
			<input type="text" name="price" value="" placeholder="Price $"></br>
			<input type="text" name="overrate" value="" placeholder="Overtime rate (per half hour)"></br>
			<input type="text" name="dposit" value="" placeholder="Deposit Amount">
			<textarea rows="3" cols="30" type="text" name="desc" id="desc" value="" placeholder="Description of Package"></textarea></br>
			
			<input type="submit" name="submit" value="Add Package"></br>
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

