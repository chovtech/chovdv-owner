<script>

    $(document).ready(function(){
        var url = window.location.href;

        var ref_id = localStorage.getItem('ref');
    
        if(ref_id == '' || ref_id == 'NULL' || ref_id == '0' || ref_id == undefined || ref_id == null)
        {
    
            localStorage.setItem('ref', url);
            
        }
        else
        {
    
        }
    
        var ref_id_new = localStorage.getItem('ref');
    
        var data = {
            "ref_id": ref_id_new
            };
    
        var jsonData = JSON.stringify(data);
    
        // console.log(jsonData);
    
        $.ajax({
            type: 'post',
            url: 'https://salesplode.co/api/influencer-id/',
            data: jsonData,
            crossDomain: true,
            success: function (data) {
                data = JSON.parse(data);
                var influencerID = data.responseBody.id;
            
                localStorage.setItem('consultantid', influencerID);
            }

            
        });
    });

    $(document).ready(function(){
                
        var request = new XMLHttpRequest();
        request.open('POST', 'https://api.monnify.com/api/v1/auth/login/');

        request.setRequestHeader('Content-Type', 'application/json');
        request.setRequestHeader('Authorization', 'Basic TUtfUFJPRF9aOTgwR0c0UFlBOjI0Wk1VNlZDQlRCOUs1RkRDVjI2VTU1OEZUTEZQMFQ5');

        request.onreadystatechange = function () {
            if (this.readyState === 4) {
                // console.log('Status:', this.status);
                // console.log('Headers:', this.getAllResponseHeaders());
                var abc =this.responseText;
        const myObj = JSON.parse(abc);
        var accessstoken = myObj["responseBody"]['accessToken'];

        localStorage.setItem('storedtoken', accessstoken);

                // console.log('Body:', accessstoken);
            }
        };

        request.send();
        
    });

    function Signupfunction(response) {
	        const responsePayload = decodeJwtResponse(response.credential);
            // collect lead id
            var consultandid1 = '<?php echo $consultant_id; ?>';
            var consultandid2 = localStorage.getItem('consultantid');

            if (!consultandid2 || consultandid2 === '0' || consultandid2 === null || consultandid2 === 'null' || consultandid2 === undefined) {
                var consultandid = consultandid1;
            }
            else
            {
                var consultandid = consultandid2;
            }

          var tagstateid = $("#googlegrid").data('id');


            // collect lead id
            var lang = 	localStorage.getItem("lang");

            if(lang == '' || lang === undefined || lang === null)
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

            var maintoken = localStorage.getItem('storedtoken');
            // collection of user details from Google end here

            //ajax signup request start here
            $.ajax({

                    type : 'post',
                    url : '../controller/scripts/edumesweb/signupwith-google.php', //Here you will fetch records
                    data : {firstname:firstname,lastname:lastname,image:image,email:email,consultandid:consultandid,fullname:fullname,defaultlang:defaultlang,tagstateid:tagstateid,maintoken:maintoken}, //Pass $id
                    success : function(output)
                    {
                            
                            var prosfeedback = (output);

                                if(prosfeedback.trim() === 'found')
                                {


                                    $.wnoty({
                                        type: 'warning',
                                        message: "Hey! email already exist click to login.",
                                        autohideDelay: 5000
                                    });
                                            
                                }else
                                {
                                            
                                            
                                            var redirectUrl2 = "../validate-password/?LcH6eMciwz3OOqP7KOrjjFf2V1DYE6=mkiuytrcccvvUR93vlqtfuRp3GPYGbHuyx9Y2LjWhr&UR93vlqtfuRp3GPYGbHuyx9Y2LjWhr=kjgytrexcdsLcH6eMciwz3OOqP7KOrjjFf2V1DYE6&oionxx=" + prosfeedback + "&UR93vlqtfuRp3GPYGbHuyx9Y2LjWhr=kjgytrexcdsLcH6eMciwz3OOqP7KOrjjFf2V1DYE6&lang=" + lang;

                                            var ref_id = localStorage.getItem('ref');
                                            var my_name = firstname+' '+lastname;
                                            var my_email = email;
                                            var number_new = '';
                                            var amount = '';
                                            var paymentRef = '';

                                        // salesplode_api(ref_id,my_name,my_email,number_new,amount,paymentRef,redirectUrl2);

                                                $.wnoty({
                                                    type: 'success',
                                                            message: "Great!! signup with google successfully.",
                                                            autohideDelay: 5000
                                                });
                                            
                                }
                                    
                    }
                
            });
            //ajax signup request end here
                
	}

    function decodeJwtResponse(data){
		var token = data.split(".");
    return JSON.parse(atob(token[1]));
	
	}


    //normal signup here

    $('body').on('click','#signup-btn',function(){

        $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();
        var email = $('#email').val();
        var phone = $('#Phone').val();
        var phonenumfull = MainNumber.getNumber(intlTelInputUtils.numberFormat.E164);
        $("input[name='WhatsappNumber[full]'").val(phonenumfull);
    
        var password = $('#password').val();
    
        var regexLength = /.{8,}/;
        var regexUppercase = /[A-Z]/;
        var regexLowercase = /[a-z]/;
        var regexNumber = /[0-9]/;
        var regexSpecialChar = /[!@#$%^&*]/;
    
        // Check if all criteria are met
        var isValid = regexLength.test(password) &&
        regexUppercase.test(password) &&
        regexLowercase.test(password) &&
        regexNumber.test(password) &&
        regexSpecialChar.test(password);

        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        var consultandid  = '<?php echo $consultant_id; ?>';
        var tagstateid = $(this).data('id');


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
            $('.fnamevalidate').css('outline', '1px solid red');
            $(this).html('Sign up');
            $('html,body').animate({scrollTop: 0},'fast');

            $.wnoty({
                type: 'warning',
                message: "Hey! first name required.",
                autohideDelay: 5000
            });
		}else if(lastname == '')
        {
            $('.fnamevalidate').css('outline', '1px solid green');
            $('.secondnamevalidate').css('outline','1px solid red');


            $(this).html('Sign up');

            $.wnoty({
                type: 'warning',
                message: "Hey! last name required.",
                autohideDelay: 5000
            });
                    
		}else if(email == '')
        {
            $('.fnamevalidate').css('outline', '1px solid green');
            $('.fnamevalidate').css('outline','1px solid green');
            $('.secondnamevalidate').css('outline','1px solid green');
            $('.emailvalidate').css('outline','1px solid red');

            $(this).html('Sign up');

            $.wnoty({
                type: 'warning',
                message: "Hey! email name required for verification.",
                autohideDelay: 5000
            });
		}else if(!emailPattern.test(email))
        {

            $('.fnamevalidate').css('outline', '1px solid green');
            $('.fnamevalidate').css('outline','1px solid green');
            $('.secondnamevalidate').css('outline','1px solid green');
            $('.emailvalidate').css('outline','1px solid red');
        
            $(this).html('Sign up');
        
            $.wnoty({
                type: 'warning',
                message: "Hey! enter a valid email.",
                autohideDelay: 5000
            });
		     
		}else if(phone == '')
        {

            $('.fnamevalidate').css('outline', '1px solid green');
            $('.secondnamevalidate').css('outline','1px solid green');
            $('.emailvalidate').css('outline','1px solid green');
            $('.phonevalidate').css('outline','1px solid red');
            $(this).html('Sign up');
        
            $.wnoty({
                type: 'warning',
                message: "Hey! Input your phone number.",
                autohideDelay: 5000
            });

		}else if(password == '')
        {
            $('.fnamevalidate').css('outline', '1px solid green');
            $('.secondnamevalidate').css('outline','1px solid green');
            $('.emailvalidate').css('outline','1px solid green');
            $('.phonevalidate').css('outline','1px solid green');
            $('.passwordvalidate').css('outline','1px solid red');


            $(this).html('Sign up');

            $.wnoty({
                type: 'warning',
                message: "Hey! Password required.",
                autohideDelay: 5000
            });

		}else if(!isValid)
        {


            $('.fnamevalidate').css('outline', '1px solid green');
            $('.secondnamevalidate').css('outline','1px solid green');
            $('.emailvalidate').css('outline','1px solid green');
            $('.phonevalidate').css('outline','1px solid green');
            $('.passwordvalidate').css('outline','1px solid red');
        
        
            $(this).html('Sign up');
        
            $.wnoty({
                type: 'warning',
                message: "Hey! Please include special characters, numbers, and both capital   <br> and small letters in your password for added security.",
                autohideDelay: 5000
            });
		}else
        {
            
            $('#signup-btn').prop('disabled', true);

            $('.fnamevalidate').css('outline', '1px solid green');
            $('.secondnamevalidate').css('outline','1px solid green');
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
                    phonenumfull:phonenumfull,
                    password:password,
                    consultandid:consultandid,
                    defaultlang:defaultlang,
                    tagid:tagstateid
        		}, //Pass $id
                success : function(output)
                {
        							        
        	       // alert(output);						    
        	        var prosfeedback = (output);

                    if(prosfeedback.trim() === 'found')
                    {


                        $.wnoty({
                            type: 'warning',
                            message: "Hey! email already exist click to login.",
                            autohideDelay: 5000
                        });

                        $('#firstname').val('');
                        $('#lastname').val('');
                        $('#email').val('');
                        $('#Phone').val('');
                        $('#password').val('');
                                                                            
                                                    
                    }else
                    {
                    					           
                        var redirectUrl2 = "../signup-verification/?LcH6eMciwz3OOqP7KOrjjFf2V1DYE6=mkiuytrcccvvUR93vlqtfuRp3GPYGbHuyx9Y2LjWhr&UR93vlqtfuRp3GPYGbHuyx9Y2LjWhr=kjgytrexcdsLcH6eMciwz3OOqP7KOrjjFf2V1DYE6&oionxx=&UR93vlqtfuRp3GPYGbHuyx9Y2LjWhr=kjgytrexcdsLcH6eMciwz3OOqP7KOrjjFf2V1DYE6&marana=" + email + "&kjgytrexcdsLcH6eMciwz3OOqP7KOrjjFf2V1DYE6=UR93vlqtfuRp3GPYGbHuyx9Y2LjWhr&tak=&oionxx=" + prosfeedback + "&lang=" + defaultlang;

                        var ref_id = localStorage.getItem('ref');
                        var my_name = firstname+' '+lastname;
                        var my_email = email;
                        var number_new = phonenumfull;
                        var amount = '';
                        var paymentRef = '';

                        // salesplode_api(ref_id,my_name,my_email,number_new,amount,paymentRef,redirectUrl2);

                        $.wnoty({
                            type: 'success',
                            message: "Great!! signup  successfully.",
                            autohideDelay: 5000
                        });
                        
                        window.location.href = redirectUrl2;
                                                
                    }
                    
                    // $('#successdisplay').html(output);//Show fetched data from database
                    $('#signup-btn').html('Sign up');
                    $('#signup-btn').prop('disabled', false);
        						
        		}
        	});
		}
		      
	});
        // normal signfup herre

        // change password  here

        // registration cllaback
        $('body').on('click','#verifybtn',function(){


            $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                var UserID = '<?php  echo $uid; ?>';
                var password = $('#password').val();
                var Confirmpassword = $('#Confirmpassword').val();
                var tagstateid = $(this).data('id');
                //   var tagid = $(this).data('id');

            var hasSpecialChar = /[!@#$%^&*()_+\-=\[\]{ };':"\\|,.<>\/?]/.test(password);
            var hasNumber = /\d/.test(password);
            var hasCapitalLetter = /[A-Z]/.test(password);
            var lowercaseLetters = /[a-z]/.test(password);



            if(password == '')
            {
                $('.mainpasswordverifycontent').css('outline', '1px solid red');
                    $(this).html('Proceed');

                    $.wnoty({
                        type: 'warning',
                    message: "Hey! Pasword required.",
                    autohideDelay: 5000
                });
                                        
            }else if(Confirmpassword == '')
                {
                    //  $('#pwmatcherr').fadeIn();
                    $('.Confirmpassword').css('outline', '1px solid green');
                $('.confirmpasswordverifycontent').css('outline','1px solid red');
                $(this).html('Proceed');

                $.wnoty({
                    type: 'warning',
                message: "Hey! confirm your password.",
                autohideDelay: 5000
                    });
                    
            }else if(password != Confirmpassword)
                {


                    $.wnoty({
                        type: 'warning',
                        message: "Hey! password did not match!.",
                        autohideDelay: 5000
                    });

                $('.mainpasswordverifycontent').css('outline','1px solid red');
                $('.confirmpasswordverifycontent').css('outline','1px solid red');
                $(this).html('Proceed');
            }else{ 
                
                if (hasSpecialChar && hasNumber && hasCapitalLetter && lowercaseLetters) {
                    $('#mainpasswordverifycontent').css('outline', '1px solid green');
                $('#confirmpasswordverifycontent').css('outline','1px solid green');
                $('#pwmatcherr').fadeOut();

                $.ajax({
                    type : 'post',
                url : '../controller/scripts/edumesweb/resetpassword.php', //Here you will fetch records
                data : {password:password,UserID:UserID,tagstateid:tagstateid}, //Pass $id
                success : function(output)
                {
                                            var feeedback = (output);

                if(feeedback.trim() === 'success')
                {

                    $.wnoty({
                        type: 'success',
                        message: 'Great!  password reset successfully <a href="../sign-in/">click to login</a>',
                        autohideDelay: 5000
                    });
                window.location.href = "../app/school/";
                                                        
                                            }else if(feeedback.trim() === 'notfound')
                {
                    $.wnoty({
                        type: 'warning',
                        message: 'Hey! this user do no longer exist',
                        autohideDelay: 5000
                    });
                                                
                                            }else

                {

                    $.wnoty({
                        type: 'warning',
                        message: 'Hey! password reset failed try again later.',
                        autohideDelay: 5000
                    });
                                                
                                            }

                $('#verifybtn').html('Proceed');
                
                                        }
                                        
                                    });
                }else
                {
                    $('#pwmatcherr').fadeIn();
                $('.mainpasswordverifycontent').css('outline','1px solid red');
                $('.confirmpasswordverifycontent').css('outline','1px solid red');
                $('#verifybtn').html('Proceed');

                $.wnoty({
                    type: 'warning',
                message: "Hey! Please include special characters, numbers, and both capital   <br> and small letters in your password for added security.",
                    autohideDelay: 5000
                    });
                        
                    
                }
                
            }
                     
        });
                // registration cllaback


                //change password here

        // registration cllaback
        $('body').on('click','#signinbtn',function(){
                $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

                var lang = 	localStorage.getItem("lang");
                if(lang == '' ||lang === undefined || lang === null)
                {
                var defaultlang = 'english';
                }else
                    {
                    var defaultlang = lang;
                }

                    var email = $('#resemail').val();

                    if(email == '')
                    {

                            $('.centerlogin').css('outline', '1px solid red');
                            $(this).html('Reset')

                            $.wnoty({
                                    type: 'warning',
                                        message: 'Hey!! email required.',
                                        autohideDelay: 8000
                            });
                
                
                }else
                {

                        $('.centerlogin').css('outline', '1px solid green');

                        $.ajax({
                            type : 'post',
                            url : '../controller/scripts/edumesweb/resetpasswordscript.php', //Here you will fetch records
                            data : {email:email,defaultlang:defaultlang}, //Pass $id
                            success : function(output)
                            {
                                
                                    // alert(output);
                                            
                                        var prosfeeedback = (output);

                                        if(prosfeeedback.trim() === 'verificationsent')
                                        {
                                            $.wnoty({
                                                type: 'success',
                                                message: 'Great!! a password reset link has been sent to this email provided.',
                                                autohideDelay: 8000
                                            });
                                                    
                                                }else if(prosfeeedback.trim() === 'noaccountfound')
                                        {
                                            $.wnoty({
                                                type: 'warning',
                                                message: 'Hey!! seems this user does not exist.',
                                                autohideDelay: 8000
                                            });  
                                        }



                                    $('#signinbtn').html('Reset');
                            }
                        
                        });
                }
                
            });
        // registration cllaback

                // password word strength 

          $('body').on('keyup','.signuppassword', function() {
        
                    var password_strength = document.getElementById("password-text");
                     var password = $(this).val();

                    //TextBox left blank.
                    if (password.length == 0) {
                        password_strength.innerHTML = "";
                    return;
                    }

                    //Regular Expressions.
                    var regex = new Array();
                    regex.push("[A-Z]"); //Uppercase Alphabet.
                    regex.push("[a-z]"); //Lowercase Alphabet.
                    regex.push("[0-9]"); //Digit.
                    regex.push("[$@$!%*#?&]"); //Special Character.

                    var passed = 0;

                    //Validate for each Regular Expression.
                    for (var i = 0; i < regex.length; i++) {
                            if (new RegExp(regex[i]).test(password)) {
                                passed++;
                            }
                    }

                    //Display status.
                    var strength = "";
                    switch (passed) {
                                case 0:
                                case 1:
                                case 2:
                                strength = "<small class='progress-bar bg-warning' style='width: 40%'>Weak</small><small class='mt-5'>your password should least have:8 characters,1 upper case letter (A-Z),1 lower case letter (a-z),1 number (0-9),1 special character(!@#$%^&*)</small>";
                                break;
                                case 3:
                                strength = "<small class='progress-bar bg-warning' style='width: 60%'>Weak</small><small class='mt-5'>your password should least have:8 characters,1 upper case letter (A-Z),1 lower case letter (a-z),1 number (0-9),1 special character(!@#$%^&*)</small>";
                                break;
                                case 4:
                                strength = "<small class='progress-bar bg-success' style='width: 100%'>Strong</small><small class='mt-5'>your password should least have:8 characters,1 upper case letter (A-Z),1 lower case letter (a-z),1 number (0-9),1 special character(!@#$%^&*)</small>";
                                break;

                    }
                    password_strength.innerHTML = strength;

          });

                //passwrord strenghth

        $('body').on('keyup','.prosperchnagepassword', function() {
    
                var password_strength = document.getElementById("password-text");
                var password = $(this).val();

                //TextBox left blank.
                if (password.length == 0) {
                    password_strength.innerHTML = "";
                return;
                }

            //Regular Expressions.
            var regex = new Array();
            regex.push("[A-Z]"); //Uppercase Alphabet.
            regex.push("[a-z]"); //Lowercase Alphabet.
            regex.push("[0-9]"); //Digit.
            regex.push("[$@$!%*#?&]"); //Special Character.

            var passed = 0;

            //Validate for each Regular Expression.
            for (var i = 0; i < regex.length; i++) {
                if (new RegExp(regex[i]).test(password)) {
                    passed++;
                }
            }

            //Display status.
            var strength = "";
            switch (passed) {
                    case 0:
                    case 1:
                    case 2:
                    strength = "<small class='progress-bar bg-warning' style='width: 40%'>Weak</small><small class='mt-5'>your password should least have:8 characters,1 upper case letter (A-Z),1 lower case letter (a-z),1 number (0-9),1 special character(!@#$%^&*)</small>";
                    break;
                    case 3:
                    strength = "<small class='progress-bar bg-warning' style='width: 60%'>Weak</small><small class='mt-5'>your password should least have:8 characters,1 upper case letter (A-Z),1 lower case letter (a-z),1 number (0-9),1 special character(!@#$%^&*)</small>";
                    break;
                    case 4:
                    strength = "<small class='progress-bar bg-success' style='width: 100%'>Strong</small><small class='mt-5'>your password should least have:8 characters,1 upper case letter (A-Z),1 lower case letter (a-z),1 number (0-9),1 special character(!@#$%^&*)</small>";
                    break;
            }
            password_strength.innerHTML = strength;

        });
  
//             function salesplode_api(ref_id,my_name,my_email,number_new,amount,paymentRef,redirectUrl2)
//             {
        
    //     // alert(ref_id);
    //     var data = {
    //                 "ref_id": ref_id,
    //             "name": my_name,
    //             "email": my_email,
    //             "number": number_new,
    //             "amount": amount,
    //             "paymentRef": paymentRef
    //     };

    //             var jsonData = JSON.stringify(data);

    //             // console.log(jsonData);

    //             $.ajax({
    //                 type: 'post',
    //             url: 'https://salesplode.co/api/create-subscriber/',
    //             data: jsonData,
    //             crossDomain: true,
    //             success: function (data) {

    //                 console.log(data);
    //             window.location.href = redirectUrl2;
        
    //         }
            
    //     });
    // }
</script>