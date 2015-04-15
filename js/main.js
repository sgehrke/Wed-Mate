/*  
	WedMate planning application
	Author: Shaun Gehrke
*/




$(document).ready(function () {

    /********************* Tabbed Menu index.html **********************************/

    

    $("#tab-content div:not(:first)").hide();
	$("#tab-content div:not(:first)");
    $("#tabs li").bind("click", function (event) {
        var id = $(event.target).index();

        $(".active").removeClass("active");
        $(this).addClass("active");
        $("#tab-content > div").hide().eq(id).show();
        return false;
    });

    /********************* LOGIN **********************************/
 
 
	// This is going to be an attempt at a modal window for the guest button in the footer
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
	
	$(".modal-window").on('click' , function(){
		$(".modal").load("data/"+$(this).attr("id")+".html", function(){
			$('.close').on('click', function() {
				$('.overlay, .modal').hide();
				return false;
			});
		openmodal();	
			
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
	    }
	});

	function myDateFunction(id) {
	//var date = $("#" + id).data("date");
	//var hasEvent = $("#" + id).data("hasEvent");
	
			$("td div.day").on('click' , function(){
							
		// This openmodel is only for the dashboard page	
			if($('section').is('#checker')){
	
						openmodal();
	
						
			}
		// The removeClass show only be on the calendar page....dashboard I want to show blackedout dates
				$("div.day").removeClass("selected-date");
				$(this).addClass("selected-date");
	
				var string = $(this).attr("id");
					splitstring = string.split("_");
					fulldow = splitstring[2];
					dfull = new Date(fulldow);		
					dowDisplay = setDow(dfull);
	
					datesplit = splitstring[2].split("-");
		
					console.log(string);
				$('section#calendar aside div').html(weekday);
				$('section#calendar aside p').html(datesplit[2]);
				
				$(".modal").load("data/"+ splitstring[0] +".html", function(){
				
				});
	
				return false;  
				
		});
	return true;
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


}); // end private scope