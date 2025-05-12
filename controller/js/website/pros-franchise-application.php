
<script>

           
    


        $(document).ready(function () {




                
                var MainNumber_new = document.querySelector("#phonef");

                if (MainNumber_new) {

                        

                         // get number with country code
                        var MainNumber = window.intlTelInput(MainNumber_new, {
                                separateDialCode: true,
                                preferredCountries:["ng"],
                                hiddenInput: "full",
                                utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                });
                                // get number with country code

                } else {

                        // alert('hello');

                }

               


                prosloadfranchisecountry();


        });



        $('body').on('change','.pros-franchise-country', function(){
            // get staff
              prosloadfranchisecountry();
            
        });


        //get location here 

        $('body').on('change','.pros-franchiseregion', function(){
           


            var  Location = $(this).val();
    

            $('.pros-load-locationhere').html('<option value="NULL">loading..</option>');


            $.ajax({
                    type: "POST",
                    url: "../controller/scripts/edumesweb/pros-load-location.php",
                    data: {
                        Location:Location
                    },
                    //cache: false,
                    success: function (output) {
                        $('.pros-load-locationhere').html(output);   
                    }

                });

           
            
        });



        function  prosloadfranchisecountry(){

             var  CountryID = $('.pros-franchise-country').val();



                if(CountryID == 'NULL')
                {

                }else
                {
                    
                     $('.pros-franchiseregion').html('<option value="NULL">loading..</option>');



                        $.ajax({
                                type: "POST",
                                url: "../controller/scripts/edumesweb/pros-getlocationnamehere.php",
                                data: {
                                    CountryID:CountryID
                                },
                                //cache: false,
                                success: function (output) {
                                      
                                    $('.pros-franchiseregion').html(output);   
                                }

                            });

                }
        }



        //click to submit form here

        $('body').on('click', '.pros-registerfranchise-btn', function (e) {
         

               $('.pros-registerfranchise-btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span class="visually-hidden">Loading...</span>submitting..')

               var  firstName = $('.prosfirstname-franchise').val();
               var lastName = $('.proslastname-franchise').val();
               var email = $('.prosemail-franchise').val();
               
               var pros_country = $('.pros-franchise-country').val();
               var pros_region = $('.pros-franchiseregion').val();
               var location = $('.pros-load-locationhere').val();
               var tellusaboutyou_self = $('.prostelabout-yourself-input').val();
               var tellusaboutyou_want_market = $('.pros-how-youwant-market-edumess').val();


              



               var phone = $('#phonef').val();

               var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
             

               if(firstName == '')
				 {
					
					     $('.pros-registerfranchise-btn').html('Register Now');
					
					 
				        	 $.wnoty({
                                    type: 'warning',
                                    message: "Hey! first name required.",
                                    autohideDelay: 5000
                            });


                }else if(lastName == '')
                {


                    
					     $('.pros-registerfranchise-btn').html('Register Now');
					
					 
                        $.wnoty({
                                type: 'warning',
                                message: "Hey! last name required.",
                                autohideDelay: 5000
                        });

                }else if(email == '')
                {

                    
					     $('.pros-registerfranchise-btn').html('Register Now');
					
					 
                            $.wnoty({
                                    type: 'warning',
                                    message: "Hey! email should not be left empty.",
                                    autohideDelay: 5000
                            });

                    
                }else if(!emailPattern.test(email))
                {

                            $('.pros-registerfranchise-btn').html('Register Now');
                            
                            
                            $.wnoty({
                                    type: 'warning',
                                    message: "Hey! enter a valid mail.",
                                    autohideDelay: 5000
                            });


                }else if(phone == '')
                {


                             $('.pros-registerfranchise-btn').html('Register Now');
                            
                            $.wnoty({
                                    type: 'warning',
                                    message: "Hey! enter phone number.",
                                    autohideDelay: 5000
                            });


                }else if(pros_country == 'NULL')
                {

                             $('.pros-registerfranchise-btn').html('Register Now');
                            
                            $.wnoty({
                                    type: 'warning',
                                    message: "Hey! Select country to proceeed.",
                                    autohideDelay: 5000
                            });

                }else if(pros_region == 'NULL')
                {


                            $('.pros-registerfranchise-btn').html('Register Now');
                            
                            $.wnoty({
                                    type: 'warning',
                                    message: "Hey! Select region to proceeed.",
                                    autohideDelay: 5000
                            });

                }else if(location == 'NULL')
                {

                    
                             $('.pros-registerfranchise-btn').html('Register Now');
                            
                            $.wnoty({
                                    type: 'warning',
                                    message: "Hey! Select location to proceeed.",
                                    autohideDelay: 5000
                            });


                }else if(tellusaboutyou_self == '')
                {

                             $('.pros-registerfranchise-btn').html('Register Now');
                            
                            $.wnoty({
                                    type: 'warning',
                                    message: "Hey! tell us about your self before you proceed.",
                                    autohideDelay: 5000
                            });

                }else if(tellusaboutyou_want_market == '')
                {
                  
                    
                    
                             $('.pros-registerfranchise-btn').html('Register Now');
                            
                            $.wnoty({
                                    type: 'warning',
                                    message: "Hey! tell us how you want to sell EduMESS.",
                                    autohideDelay: 5000
                            });
                }else
                {



                                var formattedinput = [];
                                document.querySelectorAll('.prosnumber-franchise').forEach(function(input) {
                                    // Get the `intlTelInput` plugin instance for the input field
                                    var iti = window.intlTelInputGlobals.getInstance(input);
                                    // Get the raw phone number value from the input field
                                    var numberformat = input.value;
                                    // Use the `intlTelInputUtils` library to format the phone number with its country code
                                    formattedinput.push(intlTelInputUtils.formatNumber(numberformat, iti.getSelectedCountryData()
                                        .iso2));
                                    // Display the formatted phone number in an alert message

                                   
                                });
                                formattedinput = formattedinput.toString();


                                        $.ajax({
                                            type: "POST",
                                            url: "../controller/scripts/edumesweb/pros-insert-franchise-application.php",
                                            data: {

                                                firstName:firstName,
                                                lastName:lastName,
                                                email:email,
                                                pros_country:pros_country,
                                                pros_region:pros_region,
                                                location:location,
                                                tellusaboutyou_self:tellusaboutyou_self,
                                                tellusaboutyou_want_market:tellusaboutyou_want_market,
                                                formattedinput:formattedinput

                                            },
                                            //cache: false,
                                            success: function (output) {
                                                     

                                                   if(output.trim() == 'success')
                                                   {


                                                              $('.pros-registerfranchise-btn').html('Register Now');
                                                                
                                                                $.wnoty({
                                                                        type: 'success',
                                                                        message: "Great!! Registered successfully.",
                                                                        autohideDelay: 5000
                                                                });


                                                                setTimeout(function() {
                                                                    window.location.href = "<?php echo $defaultUrl; ?>"+'schedule-interview';
                                                                }, 1000);

                                                               

                                                                
                                                   }else if(output.trim() == 'exist')
                                                   {
                                                    
                                                             $('.pros-registerfranchise-btn').html('Register Now');
                                                                
                                                                $.wnoty({
                                                                        type: 'warning',
                                                                        message: "Opps!! Seems this user already Exist.",
                                                                        autohideDelay: 5000
                                                                });

                                                    
                                                   }
                                                
                                                
                                            }

                                        });

                                
                }


           

             
 
        });



        


</script>



