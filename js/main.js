/*  
	WedMate planning application
	Author: Shaun Gehrke
*/




$(document).ready(function () {

    /********************* Tabbed Menu index.html **********************************/

	
    $("#tab-content div:not(:first)").hide();
	// $("#tab-content div:not(:first)");
    $("#tabs li").bind("click", function (event) {
        var id = $(event.target).index();

        $(".active").removeClass("active");
        $(this).addClass("active");
        $("#tab-content > div").hide().eq(id).show();
        return false;
    });


    /********************* AJAX MODALS **********************************/
    
    
	    $(".update").on('click', function () {  
		    //jquery stops the form from submitting to PHP processing
		    //stores the unique variable of the clicked edit button using its href attribute
		var	url = $(this).attr("href");
			//console.log(url);
		$.ajax( {
			//this is where the ajax sends the url for processing ...PHP page
			url: url,
			// Get puts the variable in the URL so it is usable on teh PHP page
			//It is using the ID from the database in the URL to process unique items
			type: "GET",
			//The PHP will return the processed page as a responce and can be used in the success function callback
			success: function(data) {
				console.log(data);
				//Here is where we create the modal window and load in the html from the PHP response.

			
					openmodal();
				$(".modal").html(data);				
				
				
				
				$('.close').on('click', function() {
					console.log(this);
					$('.overlay, .modal').hide();
					return false;
				});	

					
					
				olay.on('click', closemodal);
				
				
				
				$(window).on('keyup', function(e){
				  if (e.which === 27 ){
					  closemodal();
				  }
				}); 
 

			}
			
		});


	return false;
    });
    


    /********************* LOGIN **********************************/
 
 
	// This is going to be an attempt at a modal window 
	var olay = $('<div class="overlay" />').appendTo(document.body).hide();
	var modal = $('<div class="modal" />').appendTo(document.body).hide();
 	
		var openmodal = function(){
			modal.animate({opacity:1});
				olay.add(modal).show().css({opacity:0});
				olay.animate({opacity:.8}, 100);
		};
		
		var closemodal = function(){
		 	olay.add(modal).animate({opacity:0}, function(){	
				$(this).hide(); 	
		 	})
		};
	
	$(".modal-window").on('click' , function(e){
		$(".modal").load($(this).attr("id")+".php", function(){

			openmodal();
			
			$('.close').on('click', function() {
				console.log(this);
				$('.overlay, .modal').hide();
				return false;
			});	
			
			$('.tooltip').each(function(){
				var that = $(this), 
					tip = that.next('.tipbox')
				;
	
				that.on('focus', function(){
					tip.hide();
				})
				.bind('mouseenter', function(){
					tip.show();
				})
				.bind('mouseleave', function(){
					tip.hide();
				})
			});
		
		});
		
	return false;  
	});
		
	olay.on('click', closemodal);
	

	
	$(window).on('keyup', function(e){
	  if (e.which === 27 ){
		  closemodal();
	  }
	}); 
 
//    CALENDAR


	$("#my-calendar").zabuto_calendar({
	    today: true,
	    show_previous: false,
	    show_next: true,
	    weekstartson: 0,
	    nav_icon: {
	        prev: '<i class="fa fa-chevron-circle-left"></i>',
	        next: '<i class="fa fa-chevron-circle-right"></i>'
	    },
	    action: function () {
	        return myDateFunction(this.id, false);
	    },
            ajax: {
                url: "show_data.php"
               
            }
	});

	function myDateFunction(id) {
	//var date = $("#" + id).data("date");
	//var hasEvent = $("#" + id).data("hasEvent");
	
		$("tr.calendar-dow").delegate(".dow-clickable", 'click' , function(){
					console.log(this);				
							
		// This openmodel is only for the dashboard page	
			if($('section').is('#checker')){
	
						openmodal();

				
			}
		
			var string = $(this).attr("id");
				splitstring = string.split("_");
				fulldow = splitstring[2];
				dfull = new Date(fulldow);		
				dowDisplay = setDow(dfull);

				datesplit = splitstring[2].split("-");
	
				console.log(string);
			
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
			$("h2.dynamic-date").append(dateString); 
			$("input.dynamic-date").val(dateString);
			
			$("#bodate").val(dateString);
			$("#dynamic-date").val(dateString);
			$('section#calendar aside div').html(weekday);
			$('section#calendar aside p').html(datesplit[2]);
			$("input.dynamic-date").val(dateString);
			
			
			$(".modal").load(splitstring[0] +".php", function(){

				$(".checkDate").on('click', function () {
				      
					    //jquery stops the form from submitting to PHP processing
					    //stores the unique variable of the clicked edit button using its href attribute
					var	url = $(this).attr("id") + ".php?id=" + dateString;
						console.log(url);
					$.ajax( {
						//this is where the ajax sends the url for processing ...PHP page
						url: url,
						// Get puts the variable in the URL so it is usable on teh PHP page
						//It is using the ID from the database in the URL to process unique items
						type: "GET",
						datatype: 'json',
						//The PHP will return the processed page as a responce and can be used in the success function callback
						success: function(data) {
							console.log(data);
							//Here is where we create the modal window and load in the html from the PHP response
								
							var data = $.parseJSON(data);
							console.log(data);
							
							
							if (data.status == 'booked') {
								
								window.location.href = 'booked.php';
							} 
							
							
							if (data.status == 'available') {
								$.ajax( {
									//this is where the ajax sends the url for processing ...PHP page
									url: 'event-info.php',
									// Get puts the variable in the URL so it is usable on teh PHP page
									//It is using the ID from the database in the URL to process unique items
									type: "GET",
									datatype: 'json',
									//The PHP will return the processed page as a responce and can be used in the success function callback
									success: function(data) {
										openmodal();
										$(".modal").html(data);	
										
									}
								});
								
								
											
								
							}
								
								$('.close').on('click', function() {
										console.log(this);
										$('.overlay, .modal').hide();
									return false;
								});	
				
									
									
								olay.on('click', closemodal);
								
								
								
								$(window).on('keyup', function(e){
								  	if (e.which === 27 ){
									  	closemodal();
									}
								}) 
							}
						})
					})
				return true;
			})
		})
	}


		var fullDate = new Date();
				day = fullDate.getDate();
					
				
		var setDow = function(d) {
	
			switch (d.getUTCDay()) {
			    case 0:
			        weekday = "Sunday";
			        break;
			    case 1:
			        weekday = "Monday";
			        break;
			    case 2:
			        weekday = "Tuesday";
			        break;
			    case 3:
			        weekday = "Wednesday";
			        break;
			    case 4:
			        weekday = "Thursday";
			        break;
			    case 5:
			        weekday = "Friday";
			        break;
			    case 6:
			        weekday = "Saturday";
			        break;
		}
			
	};	

	$('section#calendar aside p').html(day);
	$('.dynamic-date').val(day);
	
	




    /********************* LOGOUT **********************************/




}); // end private scope