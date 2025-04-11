

      
			function Signupfunction(response) {
				const responsePayload = decodeJwtResponse(response.credential);
				// collect lead id
				var brougthbyconsultantName  = localStorage.getItem("consultantName"); 
				
				// collect lead id
				var lang = 	localStorage.getItem("lang");
				if(lang == '' ||lang === undefined || lang === null)
				{
				    var defaultlang = 'english';
				}else
				{
				    var defaultlang = lang;
				}
                  
			 // collection of user details from Google
				var fullname =	responsePayload.name;
				var firstname =	responsePayload.given_name;
				var lastname =	responsePayload.family_name;
				var image =	responsePayload.picture;
				var email =	responsePayload.email;
			 // collection of user details from Google end here
               
			//ajax signup request start here
				$.ajax({
					type : 'post',
					url : '../controller/scripts/edumesweb/signupwith-google.php', //Here you will fetch records 
					data : {firstname:firstname,lastname:lastname,image:image,email:email,brougthbyconsultantName:brougthbyconsultantName,fullname:fullname,defaultlang:defaultlang}, //Pass $id
					success : function(data)
					{
						
                        $('html,body').animate({scrollTop: 0},'fast');
						$('#successdisplay').html(data);//Show fetched data from database
					
					}
					
				});
			//ajax signup request end here
					
			}
			
			function decodeJwtResponse(data){
				var token = data.split(".");
				return JSON.parse(atob(token[1]));
				
			}


			$('body').on('click','#signup-btn',function(){
			    
				 $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
				 var firstname = $('#firstname').val();
				 var lastname = $('#lastname').val();
				 var email = $('#email').val();
				 var phone = $('#Phone').val();
				//  var phone = $('#Phone').val();
				 var password = $('#password').val();
				//  var Confirmpassword = $('#Confirmpassword').val();
				 var brougthbyconsultantName  = localStorage.getItem("consultantName"); 
				 
				 	var lang = 	localStorage.getItem("lang");
    				if(lang == '' ||lang === undefined || lang === null)
    				{
    				    var defaultlang = 'english';
    				}else
    				{
    				    var defaultlang = lang;
    				}
				 
       
				//  var MainNumberfull = MainNumber.getNumber(intlTelInputUtils.numberFormat.E164);
                // $("input[name='phonenum[full]'").val(MainNumberfull);
				 if(firstname == '')
				 {
					$('.fnamevalidate').css('outline','1px solid red');
					$(this).html('Proceed');
					 $('html,body').animate({scrollTop: 0},'fast');
				 }else if(lastname == '')
				 {
					$('.fnamevalidate').css('outline','1px solid red');
				// 	$('#firstname').css('border-color','green');
					 $(this).html('Proceed');
					 $('html,body').animate({scrollTop: 0},'fast');
				 }else if(email == '')	
				 {
				// 	 $('#lastname').css('border-color','green');
					 $('.fnamevalidate').css('outline','1px solid green');
					 $('.emailvalidate').css('outline','1px solid red');
					 $(this).html('Proceed');
					 $('html,body').animate({scrollTop: 0},'fast');

				 }else if(phone == '')
				 {
					   
					 $('.fnamevalidate').css('outline','1px solid green');
					 
					 $('.emailvalidate').css('outline','1px solid green');
					 $('.phonevalidate').css('outline','1px solid red');
					 $('html,body').animate({scrollTop: 0},'fast');
					 
					 $(this).html('Proceed');

				 }else if(password == '')
				 {
					 $('.fnamevalidate').css('outline','1px solid green');
				// 	 $('#firstname').css('border-color','green');
					 $('.emailvalidate').css('outline','1px solid green');
					 $('.phonevalidate').css('outline','1px solid green');
					 $('.passwordvalidate').css('outline','1px solid red');
					 $(this).html('Proceed');
					 $('html,body').animate({scrollTop: 0},'fast');

				 }else
				 {
				        $('.fnamevalidate').css('outline','1px solid green');
				// 	 $('#firstname').css('border-color','green');
					 $('.emailvalidate').css('outline','1px solid green');
					 $('.phonevalidate').css('outline','1px solid green');
					 $('.passwordvalidate').css('outline','1px solid green');
					$.ajax({
							type : 'post',
							url : '../controller/scripts/edumesweb/signuppage.php', //Here you will fetch records 
							data : {
							    firstname:firstname,
								lastname:lastname,
								email:email,
                                phone:phone,
								password:password,
								brougthbyconsultantName:brougthbyconsultantName,
								defaultlang:defaultlang
							}, //Pass $id
							success : function(output)
							{
								$('#successdisplay').html(output);//Show fetched data from database
								$('#signup-btn').html('Sign up');
						
								$('html,body').animate({scrollTop: 0},'fast');
								 
								 
							}
			     	});
				 }
                           
				      
			});


        // registration cllaback
        $('body').on('click','#verifybtn',function(){
            $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
             var UserID = '<?php  echo $uid; ?>';
             var password = $('#password').val();
             var Confirmpassword = $('#Confirmpassword').val();
            
             if(password == '')
             {
                 $('#password').css('border-color','red');
                 $(this).html('Proceed');
             }else if(Confirmpassword == '')
             {
                 $('#Confirmpassword').css('border-color','red');
                 $('#password').css('border-color','green'); 
                 $(this).html('Proceed');
             }else if(password != Confirmpassword)
             {
                     $('#pwmatcherr').text('password did not match!');
                     $('#password').css('border-color','red');
                     $('#Confirmpassword').css('border-color','red');
                     $(this).html('Proceed');
             }else
             {
                 $('#password').css('border-color','green'); 
                 $('#Confirmpassword').css('border-color','green');   
                 $('#pwmatcherr').fadeOut();


                 $.ajax({
                     type : 'post',
                     url : '../controller/scripts/edumesweb/resetpassword.php', //Here you will fetch records 
                     data : {password:password,UserID:UserID}, //Pass $id
                     success : function(data)
                     {
                         
                         $('#pwmatcherr').fadeIn();
                         $('#pwmatcherr').html(data);//Show fetched data from database
                         $('#verifybtn').html('Proceed');
                     }
                     
                 });
             }
                             
          });