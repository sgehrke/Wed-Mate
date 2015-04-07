/*  
	WedMate planning application
	Author: Shaun Gehrke
*/




$(document).ready(function () {

    /*
	===============================================
	=========================== MY ADDED jQUERY
	*/

    //hides the main feature container and reveals after 1 second


    // moving the dashboard up 
    $(".main-dash li").css("top", "20%");


    //Dashboard page nav bar feature...makes an expanded column on hover
    $(".hide").mouseenter(function () {
        $(this).addClass("expand").stop().animate({
            height: '300px'
        }, {
            queue: false,
            duration: 600,
            easing: 'easeOutBounce'
        })
    });


    $(".hide").mouseleave(function () {
        $(this).removeClass("expand").stop().animate({
            height: '65px'
        }, {
            queue: false,
            duration: 600,
            easing: 'easeOutBounce'
        })

    });


    /********************* Tabbed Menu index.html **********************************/

    $("#tab-content div:not(:first)");

    $("#tab-content div:not(:first)").hide();

    $("#tabs li").bind("click", function (event) {
        var id = $(event.target).index();

        $(".active").removeClass("active");
        $(this).addClass("active");
        $("#tab-content div").hide().eq(id).show();
        return false;
    });

    /********************* LOGIN **********************************/
 
 
// This is going to be an attempt at a modal window for the guest button in the footer
var olay = $('<div class="overlay" />').appendTo(document.body).hide();
var modal = $('<div class="modal" />').appendTo(document.body).hide();
 	
 	var openmodal = function(){
 		olay.add(modal).show().css({opacity:0});
 		olay.animate({opacity:.8}, 100);
 		modal
 			/*
.css({
	 			top: $(window).height()/2 - modal.outerHeight()/2 + $(window).scrollTop(),
	 			left: $(window).width()/2 - modal.outerWidth()/2 + $(window).scrollLeft()
 			})
*/
 			.animate({opacity:1});
 	};
 	var movemodal = function(){
	 	modal
	 		.stop(true)
 			.animate({
	 			top: $(window).height()/2 - modal.outerHeight()/2 + $(window).scrollTop(),
	 			left: $(window).width()/2 - modal.outerWidth()/2 + $(window).scrollLeft()
 			}, 300);
 	};
 	
 	var closemodal = function(){
	 	olay.add(modal).animate({opacity:0}, function(){	
			$(this).hide(); 	
	 	})
 	};

  $(".navItem").on('click' , function(){
  	
  	openmodal();
  	$(".modal").load("data/"+$(this).attr("id")+".html", function(){
	
		});
	return false;  
  });
  
  olay.on('click', closemodal);
  
  $(window).on('keyup', function(e){
	  if (e.which === 27 ){
		  closemodal();
	  }
  }); 
 
    
/*
    $("#sign_in").on("click", function (e) {
        e.preventDefault();
        $(".main-CTA").load("Signin1.html");
    });

    $("#submit").on("click", function (e) {
        e.preventDefault();

        var user = $("#username").val();
        var password = $("#password").val();
        console.log(user, password);

        $.ajax({
            url: "xhr/login.php",
            type: "post",
            dataType: "json",
            data: {
                username: user,
                password: password
            },
            success: function (response) {
                if (response.error) {
                    alert(response.error)
                } else {
                    window.location.assign("Dashboard.html");
                };
            }
        });

    });
	
	$(document).bind('keypress', function(e){
			if (e.keycode == 13){
				$("#submit").trigger('click');
			}
	});
*/


    /********************* REGISTER **********************************/

/*
    $(".sign_up").on("click", function () {
        console.log("Sign up 106");
        $(".main-CTA").load("Signup1.html");
        return false;
    });

    $("#register").on("click", function (e) {

        e.preventDefault();
        console.log("you are here line 114")
        var firstname = $("#name_first").val(),
            lastname = $("#name_last").val(),
            email = $("#email").val(),
            username = $("#username").val(),
            password = $("#password").val();
        console.log("120" + username, firstname);

        $.ajax({

            url: "xhr/register.php",
            type: "post",
            datatype: "json",
            data: {
                firstname: firstname,
                lastname: lastname,
                email: email,
                username: username,
                password: password
            },

            success: function (response) {
                if (response.error) {
                    alert(response.error);
                } else {
                    window.location.assign("Dashboard.html");
                }
            }
        })
    });
*/

    /********************* USER DISPLAYED **********************************/

/*
    $.getJSON("xhr/check_login.php", function (data) {
        console.log(data);
        $.each(data, function (key, val) {
            console.log(val.first_name);
            $(".user_html").html("Welcome to your Dashboard <br> " + val.first_name);
        })
    });
*/

    /********************* DASHBOARD **********************************/

/*
    $("#addTask, #projects, #edit").on("click", function (e) {
        e.preventDefault();
        $(".dashboard.main-dash").load("projects.html")
        $(".section.dashboard").load("projects_app1.html");
    });
*/


    /********************* ADD PROJECTS **********************************/

/*
    $("#addProject").on("click", function (e) {
        e.preventDefault();

        var status = $("#status").val(); //Changed your file names here to match your variables
	        projName = $("#event").val();
	        projDesc = $("#note").val();
	        projDue = $("#time1").val() + ":" + $("#time2").val() + $("#time3").val();
	
        console.log(projDue);


        $.ajax({
            url: "xhr/new_project.php",
            type: "post",
            dataType: "json",
            data: {
                status: status, //Changed your file names here to match your variables
                projectName: projName,
                projectDescription: projDesc,
                dueDate: projDue
            },
            success: function (response) {
                if (response.error) {
                    alert(response.error);
                } else {
                    $(".dashboard.main-dash").load("projects.html")
                    $(".section.dashboard").load("projects_app1.html");
                }
            }
        })
    });
*/



    /********************* Get Projects **********************************/
   
/*
    var myprojects = function () {

        $.ajax({
            url: 'xhr/get_projects.php',
            type: 'get',
            dataType: 'json',
            success: function (response) {
                if (response.error) {
                    console.log(response.error);
                } else {
					console.log(response);
                    for (var i = 0, j = response.projects.length; i < j; i++) {
                        var result = response.projects[i];
						
						$(".accordion-wrap").append('<div><h3>' + result.projectName + '</h3></div>' +
                        '<div class="acc-info">' +
                        	" Time: " + result.dueDate +
                            " Status: " + result.status +
                            " Notes: " + result.projectDescription  +
                             '<button class="deletebtn" id="' + result.id +'">Delete</button>' // Maybe add result .id HERE
                        //+ '<button class="editbtn">Edit</button>'
                        +
                            '</div>');
						$(".acc-info").hide();
                        $(".accordion-wrap div").off('click').on("click", function () {
							$(this).next(".acc-info").stop(true, true).slideToggle();
							return false;
						});
                    };
                    $('.deletebtn').on('click', function (e) {
	                    var btnclicked = e.target.id;
	                    console.log(e.target.id);

                        $.ajax({
                            url: 'xhr/delete_project.php',
                            data: {
                                projectID: btnclicked
                            },
                            type: 'POST',
                            dataType: 'json',
                            success: function (response) {
                                console.log('Testing for success');
								console.log(result.id);
                                if (response.error) {
                                    alert(response.error);
                                } else {
                                    $(".dashboard.main-dash").load("projects.html")
                                    $(".section.dashboard").load("projects_app1.html");
                                };
                            }
                        });
                    }); // End Delete

                }
            }
        })
    }
    myprojects();
*/

	/********************* LOGOUT **********************************/


/*
    $("#logOut").click(function (e) {
        e.preventDefault();
        $.get("xhr/logout.php",

        function () {
           $("body").load("index.html");
           $(".main-CTA").load("Signin1.html");
        });
    });
*/





}); // end private scope