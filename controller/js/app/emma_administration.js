    $(document).ready(function(){

        abba_get_campus(); 
        emmagetcampus();
        emmaloadroutecontent();
        

        $(".emma_proceed_btn").click(function(){
            
            $("#emma_financeonboardingModal1").modal('hide');
            $("#emma_transportroutemodal").modal('show');
            $(".emmafirstcard").fadeIn();
                
            
        });

       

        var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");
        var data_get_status ='1';
       
       
    

        $('#emma_display_onboarding_campus').html('<div align="center"><i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/emma_transport/prosget-campusforhostelandtansport.php",
            data: { abba_instituion_id: abba_get_stored_instituion_id, data_get_status: data_get_status, },
            //cache: false,
            success: function(output){
            
                $('#emma_display_onboarding_campus').html(output);
                var campus_id = $('.active-card').data('id');
                
                $(".prostransportcard").on({
                    click: function(){
                        $(this).toggleClass("active-card");
                        $(this).parent(".col").siblings().children(".prostransportcard").removeClass("active-card");
                    }
                });

            }
        });

        var activetab = localStorage.getItem("lastmainTab");
        if(activetab == '#ex1-tabs-4'){
                emmaloadonboardingcontent();
        
        }
    });

    $(".emma_transport_tab").click(function(){
        emmaloadonboardingcontent();
    });

    function emmaloadonboardingcontent(){      
        var institution = $(".abba-change-institution").val();

        var datastring ="abba-change-institution=" + institution;

        $.ajax({

            type:"POST",
            url:"../../controller/scripts/owner/emma_transport/emma_transportation.php",
            data:datastring,
            success:function(result){
               
            
                if(result == '1'){
                    // $("#emma_financeonboardingModal1").modal('hide');
                }else if(result == '2'){
                    $("#emma_financeonboardingModal1").modal('show');
                }else{

                }
                
            }
        });

    }

    $(".next_1_emma").on({
        click: function () {
           
            $('.emmafirstcard').fadeOut("slow");
            $('.emmasecondcard').fadeIn("slow");

        }
     });

     $(".emma_back_button").click(function(){
        $(".emmafirstcard").fadeIn();
        $(".emmasecondcard").fadeOut();
    })

 
        $("#emma_add_route_btn").click(function(){


        var emmmaloadinputcontent = ' <div class="row mt-3 g-3 align-items-center abba_items_amt_add_single"><div class="col-lg-4 col-md-6 mt-2">'+
        '<div class="form-group emma_route_input">'+
            '<input type="text" class="form-control form-control-sm emma_input_name" placeholder="Route Name">'+
        '</div>'+

        '</div>'+
        '<div class="col-lg-4 col-md-6 mt-2">'+
            '<div class="form-group emma_amount_input">'+
                '<input type="number" class="form-control form-control-sm emma_input_amount" placeholder="Enter Amount">'+
            '</div>'+
        '</div>'+
        
        '<div class="col-lg-4 col-md-6 removeappendformemma">'+
            '<div class="form-group">'
                +'<i class="fa fa-times fs-4 text-danger" style="cursor:pointer;"></i>'
            +'</div>'+
        '</div>'+ 
        
        '</div>';

        $(document.createElement('div')).append(emmmaloadinputcontent).appendTo('#emmaloadappededinputhere');

              $(".removeappendformemma").click(function(){
                  $(this).closest('.abba_items_amt_add_single').remove();
              })
        })

        $(".emma-onboarding-submit-button").click(function(){
            
            var onboarding_institutionID = $(".abba-change-institution").val();
            var onboarding_campusID =  $('.active-card').data('id');
            var onboarding_usertype = $(".emma_user_type").val();
            var onboarding_userID = $(".emma_user_id").val();
            var onboarding_routename = [];
            
           

            var onboarding_routeamount = [];

            // Flag to check if any field is left empty
            var isEmptyField = false;

            // Loop through each row with the class "abba_items_amt"
            $('.emma_input_name').each(function () {

                var route_value_checker = $(this).val();

                // Check if the value is empty
                if (route_value_checker == 0 || route_value_checker == '') {
                       
                    isEmptyField = true;
                    // Change the border-color of the empty input field to red
                    $(this).css('border-color', 'red');
                    return false; // Exit the loop if any field is empty
                } else {
                    // Reset the border-color of the input field
                    $(this).css('border-color', '');

                    onboarding_routename.push($(this).val());
                }

            });

            
            var isEmptyFieldd = false;

            // Loop through each row with the class "abba_items_amt"
            $('.emma_input_amount').each(function () {

                var route_value_checka = $(this).val();

                // Check if the value is empty
                if (route_value_checka == 0 || route_value_checka == '') {
                    isEmptyFieldd = true;
                    // Change the border-color of the empty input field to red
                    $(this).css('border-color', 'red');
                    return false; // Exit the loop if any field is empty
                } else {
                    // Reset the border-color of the input field
                    $(this).css('border-color', '');

                    onboarding_routeamount.push($(this).val());
                }

            });
            
            

            var datastring = "abba-change-institution=" + onboarding_institutionID + "&emma_display_onboarding_campus=" + onboarding_campusID + "&emma_route_input=" + onboarding_routename + "&emma_amount_input=" + onboarding_routeamount + "&emma_user_type=" + onboarding_usertype + "&emma_user_id=" + onboarding_userID;
            $(".emma-onboarding-submit-button").html('<div align="center"><i class="fas fa-spinner fa-spin fs-1" style="color:white;"></i></div>');
            
            if(onboarding_routename == '' || isEmptyField == true){
                $.wnoty({
                    type: 'warning',
                    message: "Please input your route.",
                    autohideDelay: 5000
                });
                
                $('.emma-onboarding-submit-button').html('<i class="fas fa"> Submit</i> <i class="fas fa-angle-right"> </i>');
                
            }else if(onboarding_routeamount == '' || isEmptyField == true ){
                $.wnoty({
                    type: 'warning',
                    message: "Please input your Amount.",
                    autohideDelay: 5000
                });
                $('.emma-onboarding-submit-button').html('<i class="fas fa"> Submit</i> <i class="fas fa-angle-right"> </i>');
            }else{
                
                
                
                // Disable the button
                   $('.emma-onboarding-submit-button').prop("disabled", true);
                $.ajax({
                    type:"POST",
                    url:"../../controller/scripts/owner/emma_transport/emma_transportation_getvalues.php",
                    data:datastring,
                    success:function(display){
                        
                         $('.emma-onboarding-submit-button').prop("disabled", false);
                         $('.emma-onboarding-submit-button').html('<i class="fas fa"> Submit</i> <i class="fas fa-angle-right"> </i>');
                         
                       
                        if(display == 1){
                            $.wnoty({
                                type: 'success',
                                message: "Route Successfully Created.",
                                autohideDelay: 5000
                            });
                            $(".emmasecondcard").fadeOut();
                            $(".emma_done_dummy").fadeIn("slow");
                           
                            emmaloadroutecontent();
                            
                            
                        }else if(display == 2)
                        {
                            $.wnoty({
                                type: 'warning',
                                message: "Hey!! Route already exist.",
                                autohideDelay: 5000
                            });
                            
                        }
                        else{
                           
                           
                            $.wnoty({
                                type: 'error',
                                message: "Error!! Failed pls try again.",
                                autohideDelay: 5000
                            });
                        }
                        
                    }
                });
            }

            $(".emma_close_btn").click(function(){
                $("#emma_transportroutemodal").modal('hide');
            })

            $(".emma_back_btn").click(function(){
                $(".emmasecondcard").fadeIn();
                $(".emma_done_dummy").fadeOut();
            })

        });


  
            $(".emma_transport_create_button").click(function(){
                $("#emma_transportroutemodal").modal("show");
                $('.emmafirstcard').fadeIn("slow");
                $(".emma_done_dummy").fadeOut("fast");
            });
 
            //ONCHAGE ON INSTTUTION TO LOAD CAMPUS

            $("body").on('change', '.abba-change-institution', function(){
                emmagetcampus();
                emmaloadroutecontent()
            });
                //load campus function below

            function emmagetcampus()
            {
                        


                $('#emma_display_route_details').html('<option value="NULL">loading..</option>');
                var institution = $(".abba-change-institution").val();
                         // // get campus ajax
                var dataString = 'abba_instituion_id=' + institution;
              
                    $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/abba-get-campus.php",
                        data: dataString,
                        success: function (output) {
                            $('#emma_display_route_details').html(output);
                            
                        }
                    });
            }
            
            
            
           
            //load route content below


            function emmaloadroutecontent(){
                
               $(".emmaloadroutecontent").html('<div align="center"><i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

               var institution_id = $(".abba-change-institution").val();
               var campus_id = $("#emma_display_route_details").val();

                var datastring = "abba-change-institution=" + institution_id + "&emma_display_route_details=" + campus_id;

                $.ajax({
                    type: "POST",
                    url:"../../controller/scripts/owner/emma_transport/emma_send_route_values.php",
                    data: datastring,
                    success: function (output) {
                        $('.emmaloadroutecontent').html(output);
                       
                    }
                });
            }

            $(document).ready(function(){
               

                $("body").on('click', '.emmaloadrouteeditcontent', function(){
                    var routename = $(this).data("routename");
                    var routeamount = $(this).data("routeamount");

                    $("#emma_get_route_name").val(routename);
                    $("#emma_get_route_amount").val(routeamount);

                    var emma_route_name = $("#emma_get_route_name").val();
                    var emma_route_amount = $("#emma_get_route_amount").val();
                    var RouteID = $(this).data("id");
                    var CampusID = $(this).data("camp");
                    var institution_id = $(".abba-change-institution").val();
                    
                    $("#emaloadeditmodalconten").html('<div align="center"><i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

                    var datastring = "emma_load_route_name=" + emma_route_name + "&emma_load_route_amount=" + emma_route_amount +  "&emma_data_id=" + RouteID + "&emma_camp_id=" + CampusID + "&institution_id=" + institution_id;
                   
                    $.ajax({
                        type:"POST",
                        url:"../../controller/scripts/owner/emma_transport/emma_edit_route_values.php",
                        data:datastring,
                        success:function(outcome){

                            $("#emaloadeditmodalconten").html('');
                            $('.emmmaloadedit-show').fadeIn();
                            $('#emmaloadeditfullcontent').html(outcome);

                        }
                    });
                });

                

                 $("body").on('click', '#emma_proceed_to_change_route', function(){
                    var emma_gettting_user_id = $(".emma_route_user_id").val();
		            var emma_gettting_user_type = $(".emma_route_user_type").val();
                    var getting_route_name = $("#emma_get_route_name").val();
                    var getting_route_amount = $("#emma_get_route_amount").val();
                    var getting_route_id = $(".emmaamount-forrouteid").val();
                    var getting_institution_id = $(".abba-change-institution").val();

                    const formatter = new Intl.NumberFormat('en-NG', { style: 'currency', currency: 'NGN' });
                    const formattedNumber = formatter.format(getting_route_amount);
           
                      $('#emma_proceed_to_change_route').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="visually-hidden">Loading...</span>saving..   ');

                    var datastring = "getting_route_userid=" + emma_gettting_user_id + "&getting_route_usertype=" + emma_gettting_user_type + "&get_the_route_name=" + getting_route_name + "&get_the_route_amount=" + getting_route_amount + "&emmaamount-forrouteid=" + getting_route_id + "&abba-change-institution=" + getting_institution_id;
                    
                    
                    if(getting_route_name == '')
                    {
                        
                           $.wnoty({
                                type: 'warning',
                                message: "Hey!! Input Route to proceed.",
                                autohideDelay: 5000
                            });
                            
                             $('#emma_proceed_to_change_route').html('<i class="fas fa"> Save Changes</i> <i class="fas fa-angle-right"> </i>');
                        
                    }else if(getting_route_amount == '')
                    {
                        
                        
                        
                           $.wnoty({
                                type: 'warning',
                                message: "Hey!! Input Route amount to proceed.",
                                autohideDelay: 5000
                            });
                            
                             $('#emma_proceed_to_change_route').html('<i class="fas fa"> Save Changes</i> <i class="fas fa-angle-right"> </i>');
                        
                    }else
                    {
                        
                          
                          $("#emma_proceed_to_change_route").prop("disabled", true);

                        
                                $.ajax({
                                    type:"POST",
                                    url:"../../controller/scripts/owner/emma_transport/emma_edit_values.php",
                                    data:datastring,
                                    success:function(output){
                                        
                                           $("#emma_proceed_to_change_route").prop("disabled", false);
                                           $('#emma_proceed_to_change_route').html('<i class="fas fa"> Save Changes</i> <i class="fas fa-angle-right"> </i>');
                                           
                                        if(output = 4){
            
                                            $(".emmaloadeditcontent-routename"+getting_route_id).html(getting_route_name);
                                            $(".emmaloadeditconforeditamount"+getting_route_id).html(formattedNumber);
                                            $('#emma_transport_edit_modal_pop_up').modal('hide');
            
                                         
                                             
                                            $.wnoty({
                                                type: 'success',
                                                message: "Route Updated Successfully.",
                                                autohideDelay: 5000
                                            });
                                            
                                        }else{
                                            $.wnoty({
                                                type: 'warning',
                                                message: "Route not Inserted.",
                                                autohideDelay: 5000
                                            });
                                        }
                                    }
            
                                });

                        
                    }
                    
                    
                    
                 });

                $("body").on('click', '.emma_delete_settings', function(){
                    var delete_route_id = $(this).data("id");
                    var delete_campus_id = $(this).data("camp");
                    var delete_institution_id = $(".abba-change-institution").val();
                    var delete_route_name = $(this).data("name");


                    $('#delete_route_id').val(delete_route_id);
                    $('#delete_campus_id').val(delete_campus_id);
                   
                    $('#display-delete_route_name').html('"' + delete_route_name + '"');
                });
                 


                $("body").on('click', '.emmadeleteroutebtn', function(){
                    var emma_delete_getting_user_id = $(".emma_route_user_id").val();
		            var emma_delete_getting_user_type = $(".emma_route_user_type").val();
                    var delete_the_route_id = $("#delete_route_id").val();
                    var delete_the_campus_id = $("#delete_campus_id").val();
                    var delete_the_institution_id = $(".abba-change-institution").val();
                    
                   
                     $('.emmadeleteroutebtn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="visually-hidden">Loading...</span>Deleting..   ');

                    var datastring = "emma_delete_userid=" + emma_delete_getting_user_id + "&emma_delete_usertype=" + emma_delete_getting_user_type + "&delete_route_id=" + delete_the_route_id + "&delete_this_campus_id=" + delete_the_campus_id + "&abba-change-institution=" + delete_the_institution_id;


                     $(".emmadeleteroutebtn").prop("disabled", true);
                    $.ajax({
                        type:"POST",
                        url:"../../controller/scripts/owner/emma_transport/emma_delete_transport_values.php",
                        data:datastring,
                        success:function(outcome){
                            
                              $('.emmadeleteroutebtn').html('Delete');
                               $(".emmadeleteroutebtn").prop("disabled", false);
                            
                            emmaloadroutecontent();                            
                            if(outcome = 5){
                                $.wnoty({
                                    type: 'success',
                                    message: "Route Successfully deleted.",
                                    autohideDelay: 5000
                                });
                                $("#emma_transport_delete_modal_pop_up").modal('hide');
                            }else{
                                $.wnoty({
                                    type: 'warning',
                                    message: "Route not deleted.",
                                    autohideDelay: 5000
                                });
                            }
                        }
                    });
                });

                 
            });
            
            
            
            
    
      // load route onchange 
              
       $("body").on("change", ".emmaloadtransportcampus", function(){
            emmaloadroutecontent();
            // alert('hello');
        });

          