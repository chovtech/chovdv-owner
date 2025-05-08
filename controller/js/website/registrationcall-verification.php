<script>



                // sign up verification
                $('body').on('click','#verifymailbtn',function(){
                    $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>verifying');
                       var UserID = '<?php  echo $uid; ?>';
                       var u_type = '<?php  echo  $u_type; ?>';
                       var valueone = $('#idone').val();
                       var valuetwo = $('#idtwo').val();
                       var valuethree = $('#idthree').val();
                       var valuefour = $('#idfour').val();
                       var valuefive = $('#idfive').val();
                       var totaltoken = valueone+valuetwo+valuethree+valuefour+valuefive;
                        var tagid = $(this).data('id');
                        
                       
                        
                        var lang = 	localStorage.getItem("lang");
        				if(lang == '' ||lang === undefined || lang === null)
        				{
        				    var defaultlang = 'english';
        				}else
        				{
        				    var defaultlang = lang;
        				}
        				
                       if(totaltoken == '')
                       {
                         $('#verifymailbtn').html('Verify Code');  
   
                                    $.wnoty({
                                          type: 'warning',
                                          message: 'Hey! enter to verify your account.',
                                          autohideDelay: 5000
                                        });
                       }else
                       {
                          
    
                      
                         $.ajax({
                              type: 'post',
                              url: '../controller/scripts/edumesweb/verifycode.php',
                              data: {
                                totaltoken: totaltoken,
                                UserID: UserID,
                                tagid: tagid,
                                defaultlang: defaultlang,
                                u_type:u_type
                              },
                              success: function(data) {
                                //   alert(data);
                                    
                                $('#verifymailbtn').html('Proceed');
                                         
                                var userrole = data;
                           
                                if (userrole.trim() === 'owner') {
                                  $('#verifymailbtn').html("Login");
                                  $('#verifymailbtn').prop("disabled", false);
                                  $('#verifymailbtn').html("<i class='fas fa-circle-notch fa-spin'></i>Redirecting...");
                                  window.location.href = "../app/school/";
                                    
                                  
                                } else if(userrole.trim() === 'affiliate')
                                {
                                    
                                    $('#verifymailbtn').html("Login");
                                  $('#verifymailbtn').prop("disabled", false);
                                  $('#verifymailbtn').html("<i class='fas fa-circle-notch fa-spin'></i>Redirecting...");
                                  window.location.href = "../affiliate/home/";
                                    
                                }
                                
                                else if(userrole.trim() === 'tokenexpired')
                                {
                                                         $.wnoty({
                                                              type: 'warning',
                                                              message: 'Hey! token expired click to resend new one',
                                                              autohideDelay: 5000
                                                            });
                                }else if(userrole.trim() === 'tokennotmatch')
                                {
                                                          $.wnoty({
                                                              type: 'warning',
                                                              message: 'Hey! token does not match with the one sent. pls make sure you verify from email.',
                                                              autohideDelay: 5000
                                                            });
                                }else if(userrole.trim() === 'invalid login')
                                {
                                                      $.wnoty({
                                                              type: 'warning',
                                                              message: 'Hey! Invalid login detected.',
                                                              autohideDelay: 5000
                                                            }); 
                                }
                                
                                
                              }
                            });
                          
                       }
                              
               });
               
              
    
                   $('body').on('click','#resendbtn',function(){
                      $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>resending');
                       var UserID = '<?php  echo $uid; ?>';
                       var u_type = '<?php  echo  $u_type; ?>';
                       
                       
                      var lang = 	localStorage.getItem("lang");
                      
        				if(lang == '' ||lang === undefined || lang === null)
        				{
        				    var defaultlang = 'english';
        				}else
        				{
        				    var defaultlang = lang;
        				}
                        
                          $.ajax({
                              type : 'post',
                              url : '../controller/scripts/edumesweb/resendcode.php', //Here you will fetch records 
                              data : {UserID:UserID,defaultlang:defaultlang,u_type:u_type}, //Pass $id
                              success : function(output)
                              {
                                 
                                  var prosfeedback = (output);
                                    $('#resendbtn').html('Resend');
                                 
                            					         
                                           
                                            
                                             if (prosfeedback.trim() === 'notfound') 
                                             {
                                                 
                                                        $.wnoty({
                                                                type: 'warning',
                                                                message: "Hey!! this user seems to not exist.",
                                                                autohideDelay: 5000
                                                        });
                                             }else 
                                             {
                                                 
                                                     localStorage.removeItem('remainingTime');
                                                      $('#resendbtn').fadeOut('slow');
                                                       $(".pasteitems").prop("disabled", false);
                                                         $('#verifymailbtn').prop("disabled", false);
                                                    var redirectUrl2 = "../signup-verification/?LcH6eMciwz3OOqP7KOrjjFf2V1DYE6=mkiuytrcccvvUR93vlqtfuRp3GPYGbHuyx9Y2LjWhr&UR93vlqtfuRp3GPYGbHuyx9Y2LjWhr=kjgytrexcdsLcH6eMciwz3OOqP7KOrjjFf2V1DYE6&oionxx=&UR93vlqtfuRp3GPYGbHuyx9Y2LjWhr=kjgytrexcdsLcH6eMciwz3OOqP7KOrjjFf2V1DYE6&marana=" + prosfeedback + "&kjgytrexcdsLcH6eMciwz3OOqP7KOrjjFf2V1DYE6=UR93vlqtfuRp3GPYGbHuyx9Y2LjWhr&tak=&oionxx=" + UserID + "&lang=" + defaultlang+"&utype=" + u_type;

                                                    window.location.href = redirectUrl2;
                                                  
                                                  
                                                  
                                                               $.wnoty({
                                                                    type: 'success',
                                                                    message: "Great!! token resent  successfully.",
                                                                    autohideDelay: 5000
                                                                });
                                                        
                                                        
                                                            //reload timeer
                                                            
                                                                        //     $(document).ready(function() {
                                                                        //     var duration = 5 * 60; // Duration in seconds
                                                                        //     var timerDisplay = $('#timer');
                                                                        //     var intervalId;
                                                                        
                                                                        //     function startTimer(duration, display) {
                                                                        //         var timer = duration, minutes, seconds;
                                                                        
                                                                        //         intervalId = setInterval(function() {
                                                                        //             minutes = parseInt(timer / 60, 10);
                                                                        //             seconds = parseInt(timer % 60, 10);
                                                                        
                                                                        //             minutes = minutes < 10 ? "0" + minutes : minutes;
                                                                        //             seconds = seconds < 10 ? "0" + seconds : seconds;
                                                                        
                                                                        //             display.text(minutes + ":" + seconds);
                                                                        //             display.css('color', 'grey');
                                                                        
                                                                        //             if (--timer < 0) {
                                                                        //                 clearInterval(intervalId);
                                                                        
                                                                        
                                                                        //                 $(".pasteitems").prop("disabled", true);
                                                                        //                 display.text("Time Out Please Resend OTP");
                                                                        //                 display.css('color', 'red');
                                                                        //                 $('#resendbtn').fadeIn('slow');
                                                                        //                 $('#verifymailbtn').prop("disabled", true);
                                                                        //             }
                                                                        
                                                                        //             // Store the remaining time in localStorage
                                                                        //             localStorage.setItem('remainingTime', timer);
                                                                        //         }, 1000);
                                                                        //     }
                                                                        
                                                                        //     var storedRemainingTime = localStorage.getItem('remainingTime');
                                                                        //     if (storedRemainingTime) {
                                                                        //         var remainingTime = parseInt(storedRemainingTime, 10);
                                                                        
                                                                        //         if (remainingTime > 0) {
                                                                        //             startTimer(remainingTime, timerDisplay);
                                                                        //         } else {
                                                                        //             displayExpired();
                                                                        //         }
                                                                        //     } else {
                                                                        //         startTimer(duration, timerDisplay);
                                                                        //     }
                                                                        
                                                                        //     function displayExpired() {
                                                                        //         $(".pasteitems").prop("disabled", true);
                                                                        //         timerDisplay.text("Time Out Please Resend OTP");
                                                                        //         timerDisplay.css('color', 'red');
                                                                        //         $('#resendbtn').fadeIn('slow');
                                                                        //         $('#verifymailbtn').prop("disabled", true);
                                                                        //     }
                                                                        
                                                                        //     // On page unload, clear the remainingTime from localStorage
                                                                        //     $(window).on('beforeunload', function() {
                                                                        //         localStorage.removeItem('remainingTime');
                                                                        //     });
                                                                        // });
                                                                                                                        
                                                                    
                                                            //reload timer
                                                        
                                                        
                                                 
                                             }
                            					        
                            		          
        
                              }
                              
                          });
                              
               });
    
                   // sign up verification
                               
                               
                               
                                       
             $(document).ready(function() {
                var duration = 5 * 60; // Duration in seconds
                var timerDisplay = $('#timer');
                var intervalId;
            
                function startTimer(duration, display) {
                    var timer = duration, minutes, seconds;
            
                    intervalId = setInterval(function() {
                        minutes = parseInt(timer / 60, 10);
                        seconds = parseInt(timer % 60, 10);
            
                        minutes = minutes < 10 ? "0" + minutes : minutes;
                        seconds = seconds < 10 ? "0" + seconds : seconds;
            
                        display.text(minutes + ":" + seconds);
                        display.css('color', 'grey');
            
                        if (--timer < 0) {
                            clearInterval(intervalId);
            
                            $(".pasteitems").prop("disabled", true);
                            display.text("Time Out Please Resend OTP");
                            display.css('color', 'red');
                            $('#resendbtn').fadeIn('slow');
                            $('#verifymailbtn').prop("disabled", true);
                        }
            
                        // Store the remaining time in localStorage
                        localStorage.setItem('remainingTime', timer);
                    }, 1000);
                }
            
                var storedRemainingTime = localStorage.getItem('remainingTime');
                if (storedRemainingTime) {
                    var remainingTime = parseInt(storedRemainingTime, 10);
            
                    if (remainingTime > 0) {
                        startTimer(remainingTime, timerDisplay);
                    } else {
                        displayExpired();
                    }
                } else {
                    startTimer(duration, timerDisplay);
                }
            
                function displayExpired() {
                    $(".pasteitems").prop("disabled", true);
                    timerDisplay.text("Time Out Please Resend OTP");
                    timerDisplay.css('color', 'red');
                    $('#resendbtn').fadeIn('slow');
                    $('#verifymailbtn').prop("disabled", true);
                }
            
                // On page unload, clear the remainingTime from localStorage
                $(window).on('beforeunload', function() {
                    localStorage.removeItem('remainingTime');
                });
            });


                               
                               
  </script>                             