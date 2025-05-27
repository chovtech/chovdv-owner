<script>

    // click of sign in btn
    $('body').on('click', '#signinbtn', function () {
        
        pros_login_function();
    });
    
    // on click of the enter key
    $(document).keydown(function(event) {
        // Check if the pressed key is Enter (key code 13)
        if (event.which === 13) {
            
          pros_login_function();
        }
    });

    // function getIpAddress(callback) {
    //   $.getJSON("https://api.ipify.org?format=json", function(data) {
    //     var ipAddress = data.ip;
    //     callback(ipAddress);
    //   });
    // }
    
    // Function to be executed on button click or Enter key press
    function pros_login_function() {
      
        $('#signinbtn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    
    //   navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
    
    //   function successCallback(position) {
    //     var latitude = position.coords.latitude;
    //     var longitude = position.coords.longitude;
    
    //     var geocodingAPIUrl = "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + latitude + "," + longitude + "&key=AIzaSyBhnNN0pyO-mBwXdwWZh6BTzhByk3GqW3s";
    
    //     $.getJSON(geocodingAPIUrl, function(data) {
    //       if (data.results.length > 0) {
    //         var locationName = data.results[0].formatted_address;
    //         getIpAddress(function(ipAddress) {
    //           performLogin(locationName, latitude, longitude, ipAddress);
    //         });
    //       } else {
    //         var locationName = 'unavailable';
    //         getIpAddress(function(ipAddress) {
    //           performLogin(locationName, latitude, longitude, ipAddress);
    //         });
    //       }
    //     });
    //   }
    
    //   function errorCallback(error) {
    //     var latitude = 'unavailable';
    //     var longitude = 'unavailable';
    //     var locationName = 'unavailable';
    //     getIpAddress(function(ipAddress) {
    //       performLogin(locationName, latitude, longitude, ipAddress);
    //     });
    //   }
    
    //   // Function to perform login after obtaining geolocation data
    //   function performLogin(locationName, latitude, longitude, ipAddress) {
        var uname = $('#signinemail').val();
        var pwd = $('#signinpassword').val();
    
        // Use the locationName, latitude, longitude, and ipAddress variables as needed
        // alert(latitude + ' ' + longitude + ' ' + locationName + ' ' + ipAddress);
    
        var lang = localStorage.getItem("lang");
    
        if (lang == '' || lang === undefined || lang === null) 
        {
          var defaultlang = 'english';
        } 
        else 
        {
          var defaultlang = lang;
        }
        
        if (uname == '') 
        {

            $('#signinbtn').html('Login');
            $('.usernameverify').css('outline', '1px solid red');
            //   $(this).prop("disabled", true); 
            
            $.wnoty({
                type: 'error',
                message: "Hey! please enter your user name.",
                autohideDelay: 5000
            });

        } 
        else if (pwd == '') 
        {
            $('#signinbtn').html('Login');
            $('.passwordverify').css('outline', '1px solid red');
            $('.usernameverify').css('outline', '1px solid green');
            
             $.wnoty({
                type: 'error',
                message: "Hey! please enter your password.",
                autohideDelay: 5000
            });
            
        }
        else 
        {
              
            $('.passwordverify').css('outline', '1px solid green');
            $('.usernameverify').css('outline', '1px solid green');
            //  $(this).prop("disabled", true); 
            $(this).prop("disabled", true);
            
            // alert(uname+' '+pwd);
            $.ajax({
                type: 'post',
                url: '../controller/website-login/proccessuserlogin.php',
                data: {uname:uname,pwd:pwd,latitude:0,longitude:0,locationName:0,ipAddress:0,defaultlang:defaultlang}, //Pass $id
                success: function (data) {

                //   alert(data);
                  
                  $('#signinbtn').prop("disabled", false);
                    
                    // $('#loginmsg').html(data);

                    var userrole = (data);
                   
                    if (userrole.trim() == 'affiliate') {
                        $(this).html("Login");
                        $(this).prop("disabled", false);
                        $(this).html("Redirecting...<i class='fas fa-circle-notch fa-spin'></i>");
                        window.location.href = "../affiliate/home";
                        
                        localStorage.setItem('current_username', uname);
                    } else if (userrole.trim() == 'owner') {
                        
                        $(this).html("Login");
                        $(this).prop("disabled", false);
                         $('#signinbtn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"> </span>Redirecting');
                        window.location.href = "../app/home/";
                        
                        localStorage.setItem('current_username', uname);
                    }else if (userrole.trim() == 'affnotapproved') {
                        
                        $('#signinbtn').html("Login");
                        $('#signinbtn').prop("disabled", false);
                        $('#affi_notapproved_modal').modal('show');
                        
                    }
                    
                    else
                    {
                       
                        $('#signinbtn').html('Login');
                         $.wnoty({
                            type: 'error',
                            message: data,
                            autohideDelay: 10000
                        }); 
                    }
                }

            });
        }
    
    //   }
    }

     $('body').on('click','#verifyaccountbtn',function(){
         $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Processing..');

            var userid = $(this).data('id');
            var uname = $(this).data('username');
            var password = $(this).data('pass');
             var email = $(this).data('email');
          
            var lang = localStorage.getItem("lang");
            
            // alert(lang);

            if (lang == '' || lang == undefined || lang == null || lang == 'null') {
                var defaultlang = 'english';

            }else{
                var defaultlang = lang;
            }

            $.ajax({

                    type: 'post',
                    url: '../controller/scripts/edumesweb/verifyaccount.php',
                    data: {userid:userid,defaultlang:defaultlang,uname:uname,password:password}, //Pass $id
                    success: function (output) {
                        
                        // alert(output);
                        
                        $('#verifyaccountbtn').html('Verify now'); 
                        var feedback = (output);
                        
                        if(feedback.trim() == 'success')
                        {
                            
                            
                             $('#signinbtn').html('Login');
                             
                             $.wnoty({
                                type: 'success',
                                message: "A verification token has been sent to your email.",
                                autohideDelay: 5000
                            }); 
                            
                            window.location.href = "../signup-verification/?LcH6eMciwz3OOqP7KOrjjFf2V1DYE6=mkiuytrcccvvUR93vlqtfuRp3GPYGbHuyx9Y2LjWhr&UR93vlqtfuRp3GPYGbHuyx9Y2LjWhr=kjgytrexcdsLcH6eMciwz3OOqP7KOrjjFf2V1DYE6&oionxx=&UR93vlqtfuRp3GPYGbHuyx9Y2LjWhr=kjgytrexcdsLcH6eMciwz3OOqP7KOrjjFf2V1DYE6&marana="+email+"&kjgytrexcdsLcH6eMciwz3OOqP7KOrjjFf2V1DYE6=UR93vlqtfuRp3GPYGbHuyx9Y2LjWhr&tak=&oionxx="+userid+"&lang="+defaultlang;
                        }else
                        {
                             
                             $.wnoty({
                                type: 'error',
                                message: "User not found.",
                                autohideDelay: 5000
                            }); 
                        }
                        

                    }
                     
            });
        
     });

</script>