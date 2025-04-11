
  $('#emma_financeonboardingModal3').on('show.bs.modal', function (e) {
        
     $(".emmahostelsecondcard").fadeOut(); 
     $(".emma_hostel_done_dummy").fadeOut(); 
     
  });

  


$(document).ready(function(){

    abba_get_campus(); 
    emmahostelgetcampus();
    emmaloadhostelcontent();

	$(".emma_hostel_proceed_btn").click(function(){
        // $("#emma_financeonboardingModal3").modal('show');
        $(".emmahostelfirstcard").fadeIn(); 
       
    });

	var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");
	
	   var data_get_status = '2';
       

    $('#emma_display_hostel_onboarding_campus').html('<div align="center"><i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/emma_transport/prosget-campusforhostelandtansport.php",
        data: { abba_instituion_id: abba_get_stored_instituion_id,data_get_status:data_get_status },
        //cache: false,
        success: function(output){
            
            
            
                    
        
            $('#emma_display_hostel_onboarding_campus').html(output);
            var campus_id = $('.active-card').data('id');
            $(".proshostelcard").on({
                click: function(){
                    $(this).toggleClass("active-card");
                    $(this).parent(".col").siblings().children(".proshostelcard").removeClass("active-card");
                }
            });

        }
    });

	var activetab = localStorage.getItem("lastmainTab");
    // if(activetab == '#ex1-tabs-4'){
    // emmaloadhostelonboardingcontent();
    // }else{
        
    // }

	$(".emma_hostel_tab").click(function(){
		emmaloadhostelonboardingcontent();
	});

	function emmaloadhostelonboardingcontent(){      
		var institution = $(".abba-change-institution").val();

		var datastring ="abba-change-institution=" + institution;

		$.ajax({

			type:"POST",
			url:"../../controller/scripts/owner/emma_hostel/emma_hostel.php",
			
			data:datastring,
			success:function(result){
			
			
				if(result == '1'){
					// $("#emma_financeonboardingModal4").modal('hide');
				}else if(result == '2'){
					$("#emma_financeonboardingModal4").modal('show');
				}else{

				}
				
			}
		});

	}

	$(".emma_btn_next").on({
		click: function(){
			$('.emmahostelfirstcard').fadeOut("slow");
			$('.emmahostelsecondcard').fadeIn("slow");
		}
	});
	
	$(".emma_hostel_back_button").click(function(){
		$(".emmahostelfirstcard").fadeIn();
		$(".emmahostelsecondcard").fadeOut();
	})
	
	$("#emma_add_hostel_btn").click(function(){


		var emmmaloadhostelinputcontent = ' <div class="row mt-3 g-3 align-items-center abba_items_amt_add_single"><div class="col-lg-4 col-md-6 mt-2">'+
		'<div class="form-group emma_hostel_input">'+
			'<input type="text" class="form-control form-control-sm emma_hostel_input_name" placeholder="Hostel Name">'+
		'</div>'+

		'</div>'+
		'<div class="col-lg-4 col-md-6 mt-2">'+
			'<div class="form-group emma_hostel_amount_input">'+
				'<input type="number" class="form-control form-control-sm emma_hostel_input_amount" placeholder="Enter Amount">'+
			'</div>'+
		'</div>'+
		
		'<div class="col-lg-4 col-md-6 removehostelappendform">'+
			'<div class="form-group">'
				+'<i class="fa fa-times fs-4 text-danger" style="cursor:pointer;"></i>'
			+'</div>'+
		'</div>'+ 
		'</div>';

		$(document.createElement('div')).append(emmmaloadhostelinputcontent).appendTo('#emmaloadhostelappededinputhere');

		$(".removehostelappendform").click(function(){
			$(this).closest('.abba_items_amt_add_single').remove();
		});
	});

	$(".emma-onboarding-hostel-submit-button").click(function(){
        var onboarding_institutionID = $(".abba-change-institution").val();
        var onboarding_campusID =  $('.active-card').data('id');
        var onboarding_usertype = $(".emma_hostel_user_type").val();
        var onboarding_userID = $(".emma_hostel_user_id").val();
        var onboarding_hostel_name = [];

        var onboarding_hostel_amount = [];

        // Flag to check if any field is left empty
        var ishostelEmptyField = false;

        // Loop through each row with the class "abba_items_amt"
        $('.emma_hostel_input_name').each(function(){

            var hostel_value_checker = $(this).val();

            // Check if the value is empty
            if (hostel_value_checker == 0 || hostel_value_checker == '') {
                ishostelEmptyField = true;
                // Change the border-color of the empty input field to red
                $(this).css('border-color', 'red');
    	        return false;
				 // Exit the loop if any field is empty
            } else {
                // Reset the border-color of the input field
                $(this).css('border-color', '');

                onboarding_hostel_name.push($(this).val());
            }

        });
        
        var ishostelEmptyFieldd = false;

        // Loop through each row with the class "abba_items_amt"
        $('.emma_hostel_input_amount').each(function(){

            var route_value_checka = $(this).val();

            // Check if the value is empty
            if (route_value_checka == 0 || route_value_checka == '') {
                ishostelEmptyFieldd = true;
                // Change the border-color of the empty input field to red
                $(this).css('border-color', 'red');
                return false; // Exit the loop if any field is empty
            } else {
                // Reset the border-color of the input field
                $(this).css('border-color', '');

                onboarding_hostel_amount.push($(this).val());
            }

        });

        
		var datastring = "abba-change-institution=" + onboarding_institutionID + "&emma_display_hostel_onboarding_campus=" + onboarding_campusID + "&emma_hostel_input=" + onboarding_hostel_name + "&emma_hostel_amount_input=" + onboarding_hostel_amount + "&emma_hostel_user_type=" + onboarding_usertype + "&emma_hostel_user_id=" + onboarding_userID;
        
		$(".emma-onboarding-hostel-submit-button").html('<div align="center"><i class="fas fa-spinner fa-spin fs-1" style="color:white;"></i></div>');
        
		if(onboarding_hostel_name == '' || ishostelEmptyField == true){
            $.wnoty({
                type: 'warning',
                message: "Please Input your hostel name.",
                autohideDelay: 5000
            });
            
              $('.emma-onboarding-hostel-submit-button').html('<i class="fas fa"> Submit</i> <i class="fas fa-angle-right"> </i>');
        }
		else if(onboarding_hostel_amount == '' || ishostelEmptyFieldd == true ){
		    
            $.wnoty({
                type: 'warning',
                message: "Please input your Amount.",
                autohideDelay: 5000
            });
            
             $('.emma-onboarding-hostel-submit-button').html('<i class="fas fa"> Submit</i> <i class="fas fa-angle-right"> </i>');
            
            
        }
		else{
		    
		    $('.emma-onboarding-hostel-submit-button').prop("disabled", true);
		    
            $.ajax({
                type:"POST",
                url:"../../controller/scripts/owner/emma_hostel/emma_hostel_getvalues.php",
                data:datastring,
                success:function(display){
                    
                    
                       $('.emma-onboarding-hostel-submit-button').prop("disabled", false);
                       $('.emma-onboarding-hostel-submit-button').html('<i class="fas fa"> Submit</i> <i class="fas fa-angle-right"> </i>');

                    if(display == 1)
					{
                        $.wnoty({
                            type: 'success',
                            message: "Route Successfully Created.",
                            autohideDelay: 5000
                        });
                        $(".emmahostelsecondcard").fadeOut();
                        $(".emma_hostel_done_dummy").fadeIn("slow");
                        
                        
                        emmaloadhostelcontent();
                        
                    }else if(display == 2)
                    {
                        
                             $.wnoty({
                                type: 'warning',
                                message: "Hey!! Hostel already exist.",
                                autohideDelay: 5000
                            });
                        
                    }else
                    {
                      
                      
                             $.wnoty({
                                type: 'error',
                                message: "Error!!  failed to insert please try again later.",
                                autohideDelay: 5000
                            });  
                    }
				}
            });       
        }
        
      

		$(".emma_close_btn").click(function(){
		    
            $("#emma_financeonboardingModal3").modal('hide');
        })

        $(".emma_back_btn").click(function(){
            $(".emmahostelsecondcard").fadeIn();
            $(".emma_hostel_done_dummy").fadeOut();
        })
	});

	$(".emma_hostel_create_button").click(function(){
	    
		$("#emma_financeonboardingModal3").modal("show");
		$('.emmahostelfirstcard').fadeIn("slow");
	});

    // ON CHANGE ON INSTTUTION TO LOAD CAMPUS

	$("body").on('change', '.abba-change-institution', function(){
		emmahostelgetcampus();
		emmaloadhostelcontent()
	});
    //load campus function below

	function emmahostelgetcampus()
	{

		$('#emma_display_hostel_details').html('<option value="NULL">loading..</option>');
		var institution = $(".abba-change-institution").val();
		// get campus ajax
		var dataString = 'abba_instituion_id=' + institution;
	
		$.ajax({
			type: "POST",
			url: "../../controller/scripts/owner/abba-get-campus.php",
			data: dataString,
			success: function (output) {
				$('#emma_display_hostel_details').html(output);
				
			}
		});
	}
	
	
	
	
	
		$("body").on('change', '#emma_display_hostel_details', function(){
	        emmaloadhostelcontent();
	   	});
	

	function emmaloadhostelcontent(){
		$(".emmaloadhostelcontent").html('<div align="center"><i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

		var institution_id = $(".abba-change-institution").val();
		var campus_id = $("#emma_display_hostel_details").val();

		var datastring = "abba-change-institution=" + institution_id + "&emma_display_hostel_details=" + campus_id;

		$.ajax({
			type: "POST",
			url:"../../controller/scripts/owner/emma_hostel/emma-send_hostel_values.php",
			data: datastring,
			success: function (output) {
				$('.emmaloadhostelcontent').html(output);
				
			}
		});
	}


	$("body").on('click', '.emma_get_hostel_edit_values', function(){
		$("#emma_hostel_edit_modal_pop_up").modal(show);
	});

});


// function emmaloadhostelcontent(){
		
// 	$(".emmaloadhostelcontent").html('<div align="center"><i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

// 	var institution_id = $(".abba-change-institution").val();
// 	var campus_id = $("#emma_display_hostel_details").val();

// 	var datastring = "abba-change-institution=" + institution_id + "&emma_display_hostel_details=" + campus_id;

// 	$.ajax({
// 		type: "POST",
// 		url:"../../controller/scripts/owner/emma_hostel/emma-send_hostel_values.php",
// 		data: datastring,
// 		success: function (output) {
// 			$('.emmaloadhostelcontent').html(output);
			
// 		}
// 	});
// }




$("body").on('click', '.emma_get_hostel_edit_values', function(){

	$("#emma_load_edit_content").html('<div align="center"><i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
	
	var hostel_id = $(this).data("id");
	var campus_id = $(this).data("camp");
	var institution_id = $(".abba-change-institution").val();

	var datastring = "emma_edit_data_id=" + hostel_id + "&emma_edit_campus_id=" + campus_id + "&emma_institution_id=" + institution_id;

	
	$.ajax({
		type:"POST",
		url:"../../controller/scripts/owner/emma_hostel/emma_edit_hostel_values.php",
		data:datastring,
		success:function(outcome){
			$("#emma_load_edit_content").html('');
			$('.emmaloadedit-hostel-show').fadeIn();
			$('#emmaloadeditfullhostelcontent').html(outcome);

			var emma_hostelname = $('.emmahostelname-foredit').val();
			var emma_hostelamount= $('.emmahostelamount-foredit').val();
			var emma_hostelid= $('.emmaamount-forhostelid').val();


			$('.emma_get_hostel_name').val(emma_hostelname);
			$('.emma_get_hostel_amount').val(emma_hostelamount);
			$('.emmaamount-forhostelid').val(emma_hostelid);

		}
	});

	$("body").on('click', '#emma_proceed_to_change_hostel', function(){
		var emma_getting_user_id = $('.emma_hostel_user_id').val();
		var emma_getting_user_type = $('.emma_hostel_user_type').val();
		var emma_getting_hostel_name = $(".emma_get_hostel_name").val();
		var emma_getting_hostel_amount = $(".emma_get_hostel_amount").val();
		var emma_getting_hostel_id = $(".emmaamount-forhostelid").val();
		var emma_getting_institution_id = $(".abba-change-institution").val();
		
		const formatter = new Intl.NumberFormat('en-NG', { style: 'currency', currency: 'NGN' });
		const formattedNumber = formatter.format(emma_getting_hostel_amount);

		var datastring = "emma_hostel_user_id=" + emma_getting_user_id + "&emma_hostel_user_type=" + emma_getting_user_type +"&get_the_hostel_name=" + emma_getting_hostel_name + "&get_the_hostel_amount=" + emma_getting_hostel_amount + "&emmaamount-forhostelid=" + emma_getting_hostel_id + "&abba-change-institution=" + emma_getting_institution_id;
		
		
		
		
		      
                if(emma_getting_hostel_name == '')
                {
                    
                       $.wnoty({
                            type: 'warning',
                            message: "Hey!! Input Hostel name to proceed.",
                            autohideDelay: 5000
                        });
                        
                         $('#emma_proceed_to_change_hostel').html('<i class="fas fa"> Save Changes</i> <i class="fas fa-angle-right"> </i>');
                    
                }else if(emma_getting_hostel_amount == '')
                {
                    
                    
                    
                       $.wnoty({
                            type: 'warning',
                            message: "Hey!! Input hostel amount to proceed.",
                            autohideDelay: 5000
                        });
                        
                         $('#emma_proceed_to_change_hostel').html('<i class="fas fa"> Save Changes</i> <i class="fas fa-angle-right"> </i>');
                    
                }else
                {
                    
                                         
                          $("#emma_proceed_to_change_hostel").prop("disabled", true);

                    		$.ajax({
                    		    type:"POST",
                    		    url:"../../controller/scripts/owner/emma_hostel/emma_edit_myhostel_values.php",
                    		    data:datastring,
                    		    success:function(output){
                    		        
                    		        $('#emma_proceed_to_change_hostel').html('<i class="fas fa"> Save Changes</i> <i class="fas fa-angle-right"> </i>');
                    		        
                    		          $("#emma_proceed_to_change_hostel").prop("disabled", false);
                    				                           
                    		        if(output = 4){
                    		            $(".emmaloadeditcontent-hostelname"+emma_getting_hostel_id).html(emma_getting_hostel_name);
                    		            $(".emmaloadeditconforedithostelamount"+emma_getting_hostel_id).html(formattedNumber);
                    					$("#emma_hostel_edit_modal_pop_up").modal("hide");
                    
                    					
                    		            $.wnoty({
                    		                type: 'success',
                    		                message: "Route Updated Successfully.",
                    		                autohideDelay: 5000
                    		            });
                    		            
                    		            emmaloadhostelcontent(); 
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
});


$("body").on('click', '#emmaloadhosteldeletecontentbtn', function(){
	var delete_route_id = $(this).data("id");
   var delete_campus_id = $(this).data("camp");
//    var delete_institution_id = $(".abba-change-institution").val();
   var delete_route_name = $(this).data("name");
   

   $('#delete_hostel_id').val(delete_route_id);
   $('#delete_hostel_campus_id').val(delete_campus_id);
//    $(".abba-change-institution").val(delete_institution_id);
   $('#display-delete_hostel_name').val('"' + delete_route_name + '"');


	$("body").on('click', '.emmadeletehostelbtn', function(){

		var emma_getting_delete_user_id = $('#delete_hostel_id').val();
		var emma_getting_campus_id_for_delete = $('#delete_hostel_campus_id').val();
		var delete_the_institution_id = $(".abba-change-institution").val();
		var delete_the_hostel_name = $('#display-delete_hostel_name').val();
		
		
		$('.emmadeletehostelbtn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="visually-hidden">Loading...</span>Deleting..   ');


		var datastring = "emma_userid_delete=" + emma_getting_delete_user_id + "&emma_campus_id_for_delete=" + emma_getting_campus_id_for_delete + "&abba-change-institution=" + delete_the_institution_id + "&emma_delete_name=" + delete_the_hostel_name;
		
		$(".emmadeletehostelbtn").prop("disabled", true);
		
		$.ajax({
			type:"POST",
			url:"../../controller/scripts/owner/emma_hostel/emma_delete_hostel_values.php",
			data:datastring,
			success:function(outcome){
			    
			        
			    
			       $('.emmadeletehostelbtn').html('Delete');
                   $(".emmadeletehostelbtn").prop("disabled", false);
                   
                   
					                          
					if(outcome = 5){
					    
					    	 
					    	
						$.wnoty({
							type: 'success',
							message: "Route Successfully deleted.",
							autohideDelay: 5000
						});
						
						$("#emma_hostel_delete_modal_pop_up").modal("hide");
						
					$('.prosremoveappendedhoustelshere'+emma_getting_delete_user_id).remove(); 
					 
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



	