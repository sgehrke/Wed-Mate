
<section id="login-modal">	
	<form class="formLayout ajax" method="POST" action="login_processing.php" >	
		<a class="close">×</a>
		<h2>Sign in</h2>
			<input id="username" type="username" name="username" value="" placeholder="Username"></br>
			<input type="password" name="password" value="" placeholder="Password"></br>
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
        
        console.log(data);


        $.ajax({

            url: url,
            type: "post",
           //  datatype: "json",
            data: data,

            success: function (response) {
                if (response.error) {
	                console.log("error");
                    alert(response.error);
                } else {
	                console.log("no error");
                    window.location.assign("dashboard.php");
                }
            }
        });

	return false;
    });

</script>

