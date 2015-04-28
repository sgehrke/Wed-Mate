
<section id="login-modal">	
	<form class="formLayout ajax" method="POST" action="login_processing.php" >	
		<a class="close">×</a>
		<h2>Sign in</h2>
			<div id="feedback">&nbsp;</div>
			<input id="username" type="username" name="username" value="" placeholder="Username"></br>
			<input id="password" type="password" name="password" value="" placeholder="Password"></br>
			<input type="submit" name="submit" value="Submit"></br>
	</form>
</section>
<script>

	$("form.ajax").on('submit', function () {
		
		var that = $(this),
			url = that.attr('action'),
			type = that.attr('method'),
			data = {};
			
		that.find('[name]').each(function(index, value) {
			var that = $(this),
				name = that.attr('name'),
				value = that.val();
				
			data[name] = value;
		});
        

	        $.ajax({
	
	            url: url,
	            type: "post",
	            datatype: "json",
	            data: data,
	
	            success: function (response) {
		        console.log(response);
		        
		        if (response.length > 0) {
	
		            $('#feedback').html(response);
		        } else { 
	               
		                console.log("no error");
	                    window.location.assign("dashboard.php");
	                }
	
	            }
	        });

	return false;
	});

</script>

