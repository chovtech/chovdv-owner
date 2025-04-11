// initializing a function to load staff
$(document).ready(function () {
    pros_load_staff();
    

    $('#abba_display_campus').html('<option><i class="fa fa-spinner fa-spin">Loading..</i></option>');
    $('#abba_display_campus_for_attendance_config').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');
    $('#abba_display_attendance_campus').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');

    var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");
    var abba_get_stored_instituion_name = localStorage.getItem("abba-stored-institution-name");

    // get campus ajax
    var dataString = 'abba_instituion_id=' + abba_get_stored_instituion_id;

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba-get-campus.php",
        data: dataString,
        //cache: false,
        success: function (output) {
            
            $('#abba_display_campus').html(output);
            $('#abba_display_campus_for_attendance_config').html(output);
            $('#abba_display_attendance_campus').html(output);

            
        }
    });
    
    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba-get-attendance-setting.php",
        data: dataString,
        //cache: false,
        success: function (output) {
            
            // alert(output);
            
            var jsonData = JSON.parse(output);

            var Clock_In_Time = jsonData.Clock_In_Time;
            var Clock_In_Penalty = jsonData.Clock_In_Penalty;
            var Clock_Out_Time = jsonData.Clock_Out_Time;
            var Clock_Out_Penalty = jsonData.Clock_Out_Penalty;
            
            $('#abba_get_clock_in_time').val(Clock_In_Time);
    
            $('#abba_get_clock_in_penalty').val(Clock_In_Penalty);
            
            $('#abba_get_clock_out_time').val(Clock_Out_Time);
            
            $('#abba_get_clock_out_penalty').val(Clock_Out_Penalty);
        }
    });
    
    abba_get_attendance_record();

});


$('body').on('click','#abba_get_attendance_record', function(){
    abba_get_attendance_record();
});


function abba_get_attendance_record(){
    
    $('.abba_display_attendance_records').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-4" style="color:#007ffb;"></i></div>');
    
    $('#abba_get_attendance_record').html('<i class="fas fa-spinner fa-spin fs-6"></i> Loading...');
    
    var campus_id = $('#abba_display_attendance_campus option:selected').val();
    var abba_staff_type = $('#abba_staff_type option:selected').val();
    var abba_term = $('#abba_display_attendance_term option:selected').val();
    var abba_session = $('#abba_display_attendance_session option:selected').val();
    var abba_get_start_date = $('#abba_get_start_date').val();
    var abba_get_end_date = $('#abba_get_end_date').val();
    
    var abba_instituion_id = localStorage.getItem("abba-stored-institution-id");
    
    // alert(abba_get_start_date +' '+abba_get_end_date);
    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba-get-attendance-record.php",
        data: {
            campus_id:campus_id,
            abba_staff_type:abba_staff_type,
            abba_get_start_date:abba_get_start_date,
            abba_get_end_date:abba_get_end_date,
            institution_id:abba_instituion_id,
            abba_session:abba_session,
            abba_term:abba_term
        },
        //cache: false,
        success: function (output) {
            // alert(output);
            
            $('.abba_display_attendance_records').html(output);
            
            $('#abba_get_attendance_record').html('Load filter');
            
            $(document).ready(function () {
            
                new DataTable('#example');
    
        	});
        } 
    });
    
}

$('body').on('change', '.abba-change-institution', function(){
    
    $('#abba_display_campus').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');
    $('#abba_display_campus_for_attendance_config').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');
    $('#abba_display_attendance_campus').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');

    var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");
    var abba_get_stored_instituion_name = localStorage.getItem("abba-stored-institution-name");

    // get campus ajax
    var dataString = 'abba_instituion_id=' + abba_get_stored_instituion_id;

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba-get-campus.php",
        data: dataString,
        //cache: false,
        success: function (output) {
            $('#abba_display_campus').html(output);
            $('#abba_display_campus_for_attendance_config').html(output);
            $('#abba_display_attendance_campus').html(output);
            
        }
    });
});



$('body').on('click', '.abba_get_attendance_history', function(){
    
    $('.abba_dis_staff_atten_his').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-4" style="color:#007ffb;"></i></div>');
    
    var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");
    
    var atten_type = $(this).data('id');
    
    var atten_term = $(this).data('term');
    
    var atten_session = $(this).data('session');
    
    var atten_campus = $(this).data('campus');
    
    var atten_staff = $(this).data('staff');
    
    var atten_staff_type = $(this).data('stafftype');

    // get campus ajax
    var dataString = 'abba_instituion_id=' + abba_get_stored_instituion_id + '&atten_type=' + atten_type + '&atten_term=' + atten_term + '&atten_session=' + atten_session + '&atten_campus=' + atten_campus + '&atten_staff=' + atten_staff + '&atten_staff_type=' + atten_staff_type;

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba-get-staff-attendance-history.php",
        data: dataString,
        //cache: false,
        success: function (output) {
            $('.abba_dis_staff_atten_his').html(output);
            $(document).ready(function () {
            
                new DataTable('#example1');
    
        	});
        }
    });
});

$('body').on('click', '.get_modal_attend_img', function () {
    
    var img_class = $(this).data('id');
    
    var img = $('.'+img_class).val();
    
    $('.attendance_img').attr('src', img);
    
    $('#exampleModalimageview').modal('show');
    $('#staticBackdropattend').css('z-index', 1040); // Increase z-index of first modal
    
});

// Reset z-index of first modal when second modal is closed
$('#exampleModalimageview').on('hidden.bs.modal', function () {
    $('#staticBackdropattend').css('z-index', 1050); // Reset z-index of first modal
});


// change of campus get term alias and section
$('body').on('change', '#abba_display_attendance_campus', function () {

    var abba_campus_id = $('#abba_display_attendance_campus option:selected').val();

    if (abba_campus_id == 'NULL') {
        $('#abba_display_attendance_term').html('<option value="NULL">Select Campus First</option>');


    }
    else {
        // alert(abba_campus_id);

        $('#abba_display_attendance_term').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');

        var dataString = 'abba_campus_id=' + abba_campus_id;

        // get term alias
        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba-get-term.php",
            data: dataString,
            //cache: false,
            success: function (output) {
                // alert(output);
                $('#abba_display_attendance_term').html(output);

            }
        });

    }

});




$('body').on('click', '.abba_generate_qr_code', function(){
    
    var campus_id = $('#abba_display_campus_for_attendance_config option:selected').val();
    
    $('#qr-code-preloader').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-4" style="color:#007ffb;"></i></div>');

    if(campus_id == '' || campus_id == 0 || campus_id == 'NULL')
    {
        $.wnoty({
            type: 'warning',
            message: "Hey! select campus before generating the qr-code.",
            autohideDelay: 3000
        });
        
        $('#abba_display_campus_for_attendance_config').css('border-color', 'red');
        
        $('#qr-code-preloader').html('');
    }
    else
    {
        
        $('#abba_display_campus_for_attendance_config').css('border-color', 'none');
        
        function htmlEncode(value) {
            return $('<div/>').text(value)
                .html();
        }

        $(function () {
            
            var currentUrl = window.location.href;
            
            // Create a dummy anchor element
            var dummyAnchor = document.createElement("a");
            dummyAnchor.href = currentUrl;
            
            // Extract the base URL
            var baseUrl = dummyAnchor.protocol + "//" + dummyAnchor.host;

            let finalURL = 'https://chart.googleapis.com/chart?cht=qr&chl=' + htmlEncode(baseUrl +"?id="+campus_id) + '&chs=160x160&chld=L|0';

            $('.qr-code-display').html('<img src="'+finalURL+'" class="qr-code img-thumbnail img-responsive qr-code-final" />');
            
            $('.qr-code-print').html('<img src="'+finalURL+'" class="qr-code img-thumbnail img-responsive" style="width: 100%; height: auto;"/>');
            
            $('#qr-code-preloader').html('');
            
            $.wnoty({
                type: 'success',
                message: "QR-Code has been generated successfully.",
                autohideDelay: 3000
            });
        });
    }

});


$("body").on("click",".printQRCodeBtn", function () {
    // Show the hidden div with the content for printing
    $("#printContent").show();

    // Get the content from the hidden div
    var contentToPrint = $("#printContent").html();

    // Write the content to the hidden iframe
    var printFrame = $("#printFrame")[0].contentWindow.document;
    printFrame.open();
    printFrame.write('<html><head><title>Print QR Code</title></head><body style="margin: 0;">' +
        contentToPrint +
        '</body></html>');
    printFrame.close();

    // Initiate the print action from the hidden iframe
    $("#printFrame")[0].contentWindow.print();

    // Hide the hidden div again after printing is done
    $("#printContent").hide();
});


$('body').on('click', '.abba_pin_location', function(){
    
    var campus_id = $('#abba_display_campus_for_attendance_config option:selected').val();
    
    $('#pin-location-preloader').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-4" style="color:#007ffb;"></i></div>');

    if(campus_id == '' || campus_id == 0 || campus_id == 'NULL')
    {
        $.wnoty({
            type: 'warning',
            message: "Hey! select campus before generating the qr-code.",
            autohideDelay: 3000
        });
        
        $('#abba_display_campus_for_attendance_config').css('border-color', 'red');
        
        $('#pin-location-preloader').html('');
        
        $('.show_pinned_location').html('Pin Campus Location');
    }
    else
    {
        
        $('#abba_display_campus_for_attendance_config').css('border-color', 'lightgrey');
        
        // Check if Geolocation is supported by the browser
        if ("geolocation" in navigator) {
            // Use the Geolocation API to get the current position
            navigator.geolocation.getCurrentPosition(
                function (position) {
                    // Success callback
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;
                    
                    $('.abba_longitude').val(longitude);
                    
                    $('.abba_latitude').val(latitude);
                    
                    $.wnoty({
                        type: 'success',
                        message: "Campus location has been pinned successfully.",
                        autohideDelay: 3000
                    });
                    
                    $('#pin-location-preloader').html('');
                    
                    $('.show_pinned_location').html('Long: '+longitude+', &nbsp;&nbsp;Lat: '+latitude);
                    
                },
                function (error) {
                    // Error callback
                    
                    $('.abba_longitude').val('0');
                    
                    $('.abba_latitude').val('0');
                    
                    $.wnoty({
                        type: 'error',
                        message: "Your current location could not be accessed, please reload and try again.",
                        autohideDelay: 3000
                    });
                    
                    $('#pin-location-preloader').html('');
                    
                    $('.show_pinned_location').html('Pin Campus Location');
                }
            );
        } else {
            
            $('.abba_longitude').val('0');
            
            $('.abba_latitude').val('0');
                    
            $.wnoty({
                type: 'error',
                message: "Geolocation is not supported by your browser, please change your browser and try again",
                autohideDelay: 3000
            });
            
            $('.show_pinned_location').html('Pin Campus Location');    
        }
    }
});



$('body').on('click', '.abba_proceed_set_attendance_config', function(){
    
    var campus_id = $('#abba_display_campus_for_attendance_config option:selected').val();
    
    var institution_id = localStorage.getItem("abba-stored-institution-id");
    
    var qr_code = $(".qr-code-final").attr("src");
    
    var longitude = $('.abba_longitude').val();
    
    var latitude = $('.abba_latitude').val();
    
    var clock_in_time = $('#abba_get_clock_in_time').val();
    
    var clock_in_penalty = $('#abba_get_clock_in_penalty').val();
    
    var clock_out_time = $('#abba_get_clock_out_time').val();
    
    var clock_out_penalty = $('#abba_get_clock_out_penalty').val();
    
    // qr-code-div
    // pin_loc_div
    
    // alert(qr_code);
    
    $('.abba_proceed_set_attendance_config').html('<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div> Saving...');

    if(campus_id == '' || campus_id == 0 || campus_id == 'NULL')
    {
        $.wnoty({
            type: 'warning',
            message: "Hey! select campus to proceed.",
            autohideDelay: 3000
        });
        
        $('#abba_display_campus_for_attendance_config').css('border-color', 'red');
        
        $('.abba_proceed_set_attendance_config').html('<i class="fas fa-save"></i> Save Changes</i>');

    }
    else if(qr_code == '' || qr_code == '0' || qr_code == 'undefined' || qr_code == undefined || qr_code == 'null' || qr_code == null){
        $.wnoty({
            type: 'warning',
            message: "Hey! generate a QR-code to proceed.",
            autohideDelay: 3000
        });
        
        $('.qr-code-div').css('border-color', 'red');
        
        $('#abba_display_campus_for_attendance_config').css('border-color', 'lightgrey');
        
        $('.abba_proceed_set_attendance_config').html('<i class="fas fa-save"></i> Save Changes</i>');

    }
    else if(longitude == '' || longitude == '0' || latitude == '' || latitude == '0'){
        $.wnoty({
            type: 'warning',
            message: "Hey! pin your campus location to proceed.",
            autohideDelay: 3000
        });
        
        $('.pin_loc_div').css('border-color', 'red');
        
        $('.qr-code-div').css('border-color', 'lightgrey');
        
        $('#abba_display_campus_for_attendance_config').css('border-color', 'lightgrey');
        
        $('.abba_proceed_set_attendance_config').html('<i class="fas fa-save"></i> Save Changes</i>');

    }
    else if(clock_in_time == '' || clock_in_time == '0' || clock_in_time == 'NULL'){
        $.wnoty({
            type: 'warning',
            message: "Hey! select clock in time.",
            autohideDelay: 3000
        });
        
        $('#abba_get_clock_in_time').css('border-color', 'red');
        
        $('.pin_loc_div').css('border-color', 'lightgrey');
        
        $('.qr-code-div').css('border-color', 'lightgrey');
        
        $('#abba_display_campus_for_attendance_config').css('border-color', 'lightgrey');
        
        $('.abba_proceed_set_attendance_config').html('<i class="fas fa-save"></i> Save Changes</i>');

    }
    else if(clock_in_penalty == '' || clock_in_penalty == '0' || clock_in_penalty == 'NULL'){
        $.wnoty({
            type: 'warning',
            message: "Hey! select clock in penalty.",
            autohideDelay: 3000
        });
        
        $('#abba_get_clock_in_penalty').css('border-color', 'red');
        
        $('#abba_get_clock_in_time').css('border-color', 'lightgrey');
        
        $('.pin_loc_div').css('border-color', 'lightgrey');
        
        $('.qr-code-div').css('border-color', 'lightgrey');
        
        $('#abba_display_campus_for_attendance_config').css('border-color', 'lightgrey');
        
        $('.abba_proceed_set_attendance_config').html('<i class="fas fa-save"></i> Save Changes</i>');

    }
    else if(clock_out_time == '' || clock_out_time == '0' || clock_out_time == 'NULL'){
        $.wnoty({
            type: 'warning',
            message: "Hey! select clock out time.",
            autohideDelay: 3000
        });
        
        $('#abba_get_clock_out_time').css('border-color', 'red');
        
        $('#abba_get_clock_in_penalty').css('border-color', 'lightgrey');
        
        $('#abba_get_clock_in_time').css('border-color', 'lightgrey');
        
        $('.pin_loc_div').css('border-color', 'lightgrey');
        
        $('.qr-code-div').css('border-color', 'lightgrey');
        
        $('#abba_display_campus_for_attendance_config').css('border-color', 'lightgrey');
        
        $('.abba_proceed_set_attendance_config').html('<i class="fas fa-save"></i> Save Changes</i>');

    }
    else if(clock_out_penalty == '' || clock_out_penalty == '0' || clock_out_penalty == 'NULL'){
        $.wnoty({
            type: 'warning',
            message: "Hey! select clock out penalty.",
            autohideDelay: 3000
        });
        
        $('#abba_get_clock_out_penalty').css('border-color', 'red');
        
        $('#abba_get_clock_out_time').css('border-color', 'lightgrey');
        
        $('#abba_get_clock_in_penalty').css('border-color', 'lightgrey');
        
        $('#abba_get_clock_in_time').css('border-color', 'lightgrey');
        
        $('.pin_loc_div').css('border-color', 'lightgrey');
        
        $('.qr-code-div').css('border-color', 'lightgrey');
        
        $('#abba_display_campus_for_attendance_config').css('border-color', 'lightgrey');
        
        $('.abba_proceed_set_attendance_config').html('<i class="fas fa-save"></i> Save Changes</i>');

    }
    else
    {
        
        $('#abba_get_clock_out_penalty').css('border-color', 'lightgrey');
        
        $('#abba_get_clock_out_time').css('border-color', 'lightgrey');
        
        $('#abba_get_clock_in_penalty').css('border-color', 'lightgrey');
        
        $('#abba_get_clock_in_time').css('border-color', 'lightgrey');
        
        $('.pin_loc_div').css('border-color', 'lightgrey');
        
        $('.qr-code-div').css('border-color', 'lightgrey');
        
        $('#abba_display_campus_for_attendance_config').css('border-color', 'lightgrey');
        
        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba-save-attendance-config.php",
            data: {
                campus_id:campus_id,
                institution_id:institution_id,
                qr_code:qr_code,
                longitude:longitude,
                latitude:latitude,
                clock_in_time:clock_in_time,
                clock_in_penalty:clock_in_penalty,
                clock_out_time:clock_out_time,
                clock_out_penalty:clock_out_penalty
            },
            //cache: false,
            success: function (output) {
                
                $.wnoty({
                    type: 'success',
                    message: "Attendance has been configured Successfully.",
                    autohideDelay: 3000
                });
                
                $('.abba_proceed_set_attendance_config').html('<i class="fas fa-save"></i> Save Changes</i>');

            }
        
        });
    }
});



$('body').on('change', '#abba_display_campus_for_attendance_config', function(){
    
    var campus_id = $('#abba_display_campus_for_attendance_config option:selected').val();
    
    var institution_id = localStorage.getItem("abba-stored-institution-id");
    
    $('#pin-location-preloader').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-4" style="color:#007ffb;"></i></div>');
    
    $('#qr-code-preloader').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-4" style="color:#007ffb;"></i></div>');
    
    if(campus_id == '' || campus_id == 0 || campus_id == 'NULL')
    {
        $.wnoty({
            type: 'warning',
            message: "Hey! select campus to proceed.",
            autohideDelay: 3000
        });
        
        $('.qr-code-display').html('<span style="font-weight:600;font-size:20px;cursor:pointer;" class="abba_generate_qr_code">Generate QR-Code</span>');
            
        $('.qr-code-print').html('');
        
        $('.show_pinned_location').html('<span style="font-weight:600;font-size:20px;cursor:pointer;" class="abba_generate_qr_code show_pinned_location">Pin Campus Location</span>');
        
        $('#abba_display_campus_for_attendance_config').css('border-color', 'red');
        
    }
    else
    {
        
        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba-get-qr-loc.php",
            data: {
                campus_id:campus_id,
                institution_id:institution_id
            },
            //cache: false,
            success: function (output) {
                // alert(output);
                var jsonData = JSON.parse(output);

                var Campus_Longitude = jsonData.Campus_Longitude;
                var Campus_Latitude = jsonData.Campus_Latitude;
                var Campus_QR_Code = jsonData.Campus_QR_Code;
                
                $(".qr-code-final").attr("src", Campus_QR_Code);
    
                $('.abba_longitude').val(Campus_Longitude);
                
                $('.abba_latitude').val(Campus_Latitude);
                
                if(Campus_QR_Code == '' || Campus_QR_Code == 0)
                {
                    $('.qr-code-display').html('<span style="font-weight:600;font-size:20px;cursor:pointer;" class="abba_generate_qr_code">Generate QR-Code</span>');
            
                    $('.qr-code-print').html('');
            
                }
                else
                {
                    $('.qr-code-display').html('<img src="'+Campus_QR_Code+'" class="qr-code img-thumbnail img-responsive qr-code-final" />');
            
                    $('.qr-code-print').html('<img src="'+Campus_QR_Code+'" class="qr-code img-thumbnail img-responsive" style="width: 100%; height: auto;"/>');
            
                }
                
                if(Campus_Longitude == '' || Campus_Longitude == 0 || Campus_Latitude == '' || Campus_Latitude == 0)
                {
                    $('.show_pinned_location').html('<span style="font-weight:600;font-size:20px;cursor:pointer;" class="abba_generate_qr_code show_pinned_location">Pin Campus Location</span>');
            
                }
                else
                {
                    $('.show_pinned_location').html('Long: '+Campus_Longitude+', &nbsp;&nbsp;Lat: '+Campus_Latitude);
            
                }


                $('#pin-location-preloader').html('');
    
                $('#qr-code-preloader').html('');
    
            }
        
        });
    }
});



function  pros_load_staff()
{

    $('#pros-staffpaginationcont').fadeOut();
    
    var pros_increase_staff_per_page = $('#pros_increase_staff_per_page option:selected').val();
    var pros_staff_status = $('#pros_display_staff_status option:selected').val();
    var pros_staff_type = $('#pros_display_staff_type option:selected').val();
    var pros_staff_campus_id = $('#abba_display_campus option:selected').val();
    

    var pros_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");
    var pros_get_stored_instituion_name = localStorage.getItem("abba-stored-institution-name");

    $('#pros-loadstaff').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

//   alert(pros_staff_status+' '+pros_staff_campus_id);
    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/pros-getstaff.php",
        data: {
            pros_get_stored_instituion_id:pros_get_stored_instituion_id,
            pros_staff_status:pros_staff_status,
            pros_staff_type:pros_staff_type,
            pros_staff_campus_id:pros_staff_campus_id
        },
        //cache: false,
        success: function (output) {
            // alert(output);
            $('#pros-loadstaff').html(output);
            
            
            

         
          
            

            $(document).ready(function(){
                var items = $(".pros-maincard .pros-carditems");
                var numItems = items.length;
                var perPage = parseInt(pros_increase_staff_per_page);
                var prebtn = '<i class="fa fa-arrow-left"></i>';
                var nextbtn = '<i class="fa fa-arrow-right"></i>';
                    
                items.slice(perPage).hide();

                $('#pros-staffpaginationcont').pagination({

                    items: numItems,
                    itemsOnPage: perPage,
                    prevText: prebtn,
                    nextText: nextbtn,
                    onPageClick : function (pageNumber){
                        var showFrom = perPage * (pageNumber - 1);
                        var showTo = showFrom + perPage;
                        items.hide().slice(showFrom, showTo).show();
                    }

                });
            });

            $('#pros-staffpaginationcont').show();

           
        }
    });
}



 
$('body').on('keyup', '#pros-searchstaff', function (e) {
    var val = $(this).val();
    pros_filter(val.toLowerCase());
});//on keyup search

$(".search").on("paste", function() {
    var element = this;
    setTimeout(function() {
        var text = $(element).val().toLowerCase();
        pros_filter(text);
    }, 100);
});//on paste search

function  pros_filter(x) {
    var isMatch = false;
    $(".pros-carditems").each(function(i) {
        var content = $(this).html();

        if (content.toLowerCase().indexOf(x) == -1) {
            $(this).hide();
        } 
        else {
            isMatch = true;
        $(this).show();
        
        }
    });

    var ccs = $('.pros-carditems').filter(function() {
        return $(this).css('display') !== 'none';
    }).length;

    $(".no-results-image").toggle(!isMatch);
        $(".pros-loadstaffclass").toggle(isMatch);


}

var ccs = $('.pros-carditems').filter(function() {
    return $(this).css('display') !== 'none';
}).length;

//filter button click
$('body').on('click', '#pros_get_staff_on_click', function () {
    pros_load_staff();
    
});


// change number of students per page
$('body').on('change','#pros_increase_staff_per_page',function(){
    // get staff
    pros_load_staff();
    
});
















//===========check staff box here all======================
$('body').on('change','#pros-flexCheckDefaultal',function(){
      
            var checkStatus = $(this).prop('checked');
            if(checkStatus == true)
            {
                $(".pros-checkstaff").prop('checked', $(this).prop("checked"));
                var selTotal = $('.pros-checkstaff:checked').length;

                $('#delBtnSpan').html('<i class="fa fa-trash"></i> Delete (' + selTotal+')');
                $("#delBtnSpan").fadeIn("slow");
               
            
            }
            else if(checkStatus == false)
            {
                $(".pros-checkstaff").prop('checked', false);
                var selTotal = $('.pros-checkstaff:checked').length;
                $("#delBtnSpan").fadeOut("slow");
            }
});
//===========check staff box here all======================

//===========check staff box here single======================
$('body').on('change', '.pros-checkstaff', function() {
    if ($('.pros-checkstaff:checked').length === $('.pros-checkstaff').length) {
      
        $("#pros-flexCheckDefaultal").prop('checked', true);

        var selTotalSingle = $('.pros-checkstaff:checked').length;
        
        if(selTotalSingle >0){
             $('#delBtnSpan').html('<i class="fa fa-trash"></i> Delete (' + selTotalSingle +')');
             $("#delBtnSpan").fadeIn("slow");
         }
         else{
             $("#delBtnSpan").fadeOut("slow");
         }


        
    } else {
        $("#pros-flexCheckDefaultal").prop('checked', false);

        var selTotalSingle = $('.pros-checkstaff:checked').length;
    
        if(selTotalSingle >0){
             $('#delBtnSpan').html('<i class="fa fa-trash"></i> Delete (' + selTotalSingle +')');
             $("#delBtnSpan").fadeIn("slow");
         }
         else{
             $("#delBtnSpan").fadeOut("slow");
         }

    }
});


//===========check staff box here single======================


$('body').on('click', '#staffconfirmDelete', function (e) {
    $(this).html('<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>deleting...');

    var pros_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");
    var staffID = [];
    $('.pros-checkstaff:checked').each(function() {
        staffID.push($(this).val());
    });

    if(staffID == '')
    {
        var newstaffID = $('#pros-storegetstaffIDdel').val()

    }else
    {
        var newstaffID  = staffID;

    }
   

    if(newstaffID == '')
    {

        $.wnoty({
            type: 'warning',
            message: "Hey! staff not selected yet.",
            autohideDelay: 3000
        });
        $('#staffconfirmDelete').html('Delete');

    }else
    {
        newstaffID = newstaffID.toString();
        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/prosdeletestaff.php",
            data: {
                StaffID: newstaffID,
                pros_get_stored_instituion_id:pros_get_stored_instituion_id
            },
            success: function(output) {
    
               
                var userrolestaus = (output);

                if(userrolestaus == 'success')
                {

                
                    if(staffID == '')
                    {
                        var singlestafID = $('#pros-storegetstaffIDdel').val()
                          $('.prosstaffcontainer'+singlestafID).remove();

                    }else
                    {

                        $('.pros-checkstaff:checked').each(function() {

                            var multiplestaffid = $(this).val();
                            $('.prosstaffcontainer'+multiplestaffid).remove();

                        });
                        $("#delBtnSpan").fadeOut("slow");
                    }

                    $.wnoty({
                        type: 'success',
                        message: "staff Deleted successfully.",
                        autohideDelay: 3000
                    }); 
                }
                $('#pros-deltestaffmodal-modal').modal('hide');
                $('#staffconfirmDelete').html('Delete');

                   




            }
        });
    }

   

  
});//delete staff here

// store value if want to delete staff single
$('body').on('click', '#pros-deletestaffsingleval', function (e) {
   var staffID = $(this).data('id');
    $('#pros-storegetstaffIDdel').val(staffID);
    // getstaffID'
});
// store value if want to delete staff single

$('body').on('click', '#pros-changestaupbtn', function () {
  
    

    var button = $(this);
    var staffID = button.data('staffid');
    var session = button.data('session');
    var instid = button.data('instid');
    var status = button.data('status');

   

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/proschangestaffstatus.php",
        data: {
            staffID: staffID,
            session: session,
            instid: instid,
            status: status
        },
        success: function (output) {
            
            var userrolestaus = output;
            if (userrolestaus === '1') {
              
                button.removeClass('chiActive').addClass('chiBlock').html('<i class="bx bx-pencil"></i> Blocked');
                button.data('status', '1');

                $.wnoty({
                    type: 'success',
                    message: "status changed successfully.",
                    autohideDelay: 3000
                });

            }else if(userrolestaus === '2')
            {
                
                button.removeClass('chiBlock').addClass('chiActive').html('<i class="bx bx-pencil"></i> Active');
                button.data('status', '2'); // Update the data-status attribute


                $.wnoty({
                    type: 'success',
                    message: "status changed successfully.",
                    autohideDelay: 3000
                });
                
            }
            // pros_load_staff();
    }
    });


});



$('body').on('change', '.prosperchangeroleinputdrop', function (e) {

    var userrole = $(this).val();
    var StaffID = $('#pros-selStaffForRoleChange').val();
    if(userrole == 'schoolhead')
    {

        $('.prossectioninput').fadeIn('slow'); 
        $('.prosdisplaycampusrole').fadeOut('slow'); 
        $('.prosdisplaycampusroleschoolehead').fadeIn('slow'); 

            // LOAD FACULTY   
            var campusID = [];
            var campusname = [];
            $('.pros-checkstaffrolecmapus:checked').each(function() {
                campusID.push($(this).val());
                campusname.push($(this).data('id'));
            });
            
            campusID = campusID.toString();
            campusname = campusname.toString();
            
            if(campusID != '' && userrole == 'schoolhead')
            {
                $('.prossectioninput').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
                
                
                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/pros-loadfacultyrole.php",
                    data: {
                        campusID:campusID,
                        campusname:campusname,
                        StaffID:StaffID
                    },
                    success: function(result) {
                        $('.prossectioninput').html(result);
        
                        $(function () {
        
                            //attatch click event to the checkbox, then, based on the checked checkboxes to add value to the tags input.
                            $(".selectBox-cont input[type='checkbox']").each(function (index, item) {
                                $(item).click(function () {
                                    var checkedvalue = [];
                                    var id = [];
                                    
                                    $(".selectBox-cont input[type='checkbox']:checked").each(function (index, ele) {
                                        checkedvalue.push($(ele).val());
                                        id.push($(ele).data('id'));
                                    })
                                    var result = checkedvalue.join(",");
                                    var result2 = id.join(",");
                                    var campusIDnew = [];
        
                                    $('.pros-checkstaffrolecmapus:checked').each(function() {
                                        campusIDnew.push($(this).val());
                                    });
                                    
                                    // Code outside the loop
                                    for (var i = 0; i < campusIDnew.length; i++) {
                                        var campusIDarr = campusIDnew[i];
                                    }  
        
                                    $("#tagsinput").tagsinput('removeAll');
                                    $("#tagsinput").tagsinput('add', result);
                                    $("#tagsinput").data('id', result2);
                                    
                                    
        
                                    
                        
                                });
                            });
        
        
                            //trace the tag remove event, then, based on the tags to checked/unchecked the checkbox
                            $("#tagsinput").on('itemRemoved', function () {
                                var valarray = $("#tagsinput").val().split(",");
                                $(".selectBox-cont input[type='checkbox']").each(function (index, item) {
                                    if (jQuery.inArray($(item).val(), valarray) != -1) {
                                        $(item).prop("checked", true);
                                    }
                                    else {
                                        $(item).prop("checked", false);
                                    }
                                });
                            });
                        });
        
        
        
                    }
                });
                    
                
            }else{
                    
                $('.prossectioninput').html('');
            }

        // LOAD FACULTY   




    }else if(userrole == 'admin')
    {

        $('.prosdisplaycampusroleschoolehead').fadeOut('slow');
        $('.prossectioninput').fadeOut('slow');
        $('.prosdisplaycampusrole').fadeIn('slow');  
      

    }else
    {
          $('.prosdisplaycampusroleschoolehead').fadeOut('slow');
            $('.prossectioninput').fadeOut('slow'); 
            $('.prosdisplaycampusrole').fadeOut('slow'); 
    }

});//onchange on staff input selected


// click to change tag
$('body').on('click', '#pros-submitchangerole-btn', function (e) {
   
    $(this).html('<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>assigning...');
  
    var staff_Role = $('.prosperchangeroleinputdrop').val();
    var StaffID = $('#pros-selStaffForRoleChange').val();
    var pros_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");
     
    if(staff_Role == 'schoolhead')
    {

      
         var sectionID = []; 
         var campusID = [];
        $('.pros-checkinputnewinsert:checked').each(function() {
            sectionID.push($(this).data('id'));
            campusID.push($(this).data('campus'));
        });

        campusID = campusID.toString();
        sectionID = sectionID.toString();

        if(sectionID == '')
        {

                $.wnoty({
                    type: 'warning',
                    message: "Hey! select section you want to assign to this staff.",
                    autohideDelay: 3000
                });

                $('#pros-submitchangerole-btn').html('Change Role');

        }else 
        {

                    $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/proschangestaffrole.php",
                        data: {
                            StaffID: StaffID,
                            staff_Role: staff_Role,
                            sectionID:sectionID,
                            campusID:campusID,
                            pros_get_stored_instituion_id:pros_get_stored_instituion_id
                        },
                        success: function(output) {
                            
                              var userrolestaus = (output);
                              if(userrolestaus == 'success')
                              {
                                
                                    $.wnoty({
                                        type: 'success',
                                        message: "Role updated successfully.",
                                        autohideDelay: 3000
                                    }); 

                                    $('.prosgeneralclassupaterole' + StaffID).html(staff_Role);
                              }
                              $('#pros-submitchangerole-btn').html('Change Role');

                                // pros_load_staff();
                                $('#pros-changestaffrole').modal('hide');
                        }
                    });
        }



    }else if(staff_Role == 'admin')
    {


        var campusID = [];
       $('.pros-checkstaffrolecmapus:checked').each(function() {
           campusID.push($(this).val());
       });

       if(campusID == '')
       {
                $.wnoty({
                    type: 'warning',
                    message: "Hey! select campuses you want to an admin to.",
                    autohideDelay: 3000
                });

                $('#pros-submitchangerole-btn').html('Change Role');

       }else
       {

           campusID = campusID.toString();

            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/proschangestaffrole.php",
                data: {
                    StaffID: StaffID,
                    staff_Role: staff_Role,
                    campusID:campusID,
                    pros_get_stored_instituion_id:pros_get_stored_instituion_id
                },
                success: function(output) {
                        
                    var userrolestaus = (output);
                    
                    if(userrolestaus == 'success')
                    {
                          $.wnoty({
                              type: 'success',
                              message: "Role updated successfully.",
                              autohideDelay: 3000
                          }); 

                          $('.prosgeneralclassupaterole' + StaffID).html(staff_Role);
                    }
                    $('#pros-submitchangerole-btn').html('Change Role');
                    $('#pros-changestaffrole').modal('hide');
                    //   pros_load_staff();


                }
            });
       }

   
    }else if(staff_Role == 'teacher')
    {
      
        
        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/proschangestaffrole.php",
            data: {
                StaffID: StaffID,
                staff_Role: staff_Role,
                pros_get_stored_instituion_id:pros_get_stored_instituion_id
            },
            success: function(output) {
               

                var userrolestaus = (output);
                
                if(userrolestaus == 'success')
                {
                      $.wnoty({
                          type: 'success',
                          message: "Role updated successfully.",
                          autohideDelay: 3000
                      }); 

                      $('.prosgeneralclassupaterole' + StaffID).html(staff_Role);
                }
                $('#pros-submitchangerole-btn').html('Change Role');
                $('#pros-changestaffrole').modal('hide');


               
                //   pros_load_staff();

            }
        });   
    }
});

// load faculty if school head
$('body').on('change', '.pros-checkstaffrolecmapus', function (e) {

    var staff_Role = $('.prosperchangeroleinputdrop').val(); 
    var staffID = $("#prosgetstaffvaluforfaculselect").val();

     var campusID = [];
     var campusname = [];
    $('.pros-checkstaffrolecmapus:checked').each(function() {
        campusID.push($(this).val());
        campusname.push($(this).data('id'));
    });



    campusID = campusID.toString();
    campusname = campusname.toString();

    if(campusID != '' && staff_Role == 'schoolhead')
    {
        $('.prossectioninput').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
        
        
        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/pros-loadfacultyrole.php",
            data: {
                campusID:campusID,
                campusname:campusname,
                staffID:staffID
            },
            success: function(result) {
                $('.prossectioninput').html(result);

                $(function () {

                    //attatch click event to the checkbox, then, based on the checked checkboxes to add value to the tags input.
                    $(".selectBox-cont input[type='checkbox']").each(function (index, item) {
                        $(item).click(function () {
                            var checkedvalue = [];
                            var id = [];
                            
                            $(".selectBox-cont input[type='checkbox']:checked").each(function (index, ele) {
                                checkedvalue.push($(ele).val());
                                id.push($(ele).data('id'));
                            })
                            var result = checkedvalue.join(",");
                            var result2 = id.join(",");
                            var campusIDnew = [];

                            $('.pros-checkstaffrolecmapus:checked').each(function() {
                                campusIDnew.push($(this).val());
                            });
                            
                            // Code outside the loop
                            for (var i = 0; i < campusIDnew.length; i++) {
                                var campusIDarr = campusIDnew[i];
                            }  

                            $("#tagsinput").tagsinput('removeAll');
                            $("#tagsinput").tagsinput('add', result);
                            $("#tagsinput").data('id', result2);
                           
                          

                           
                
                        });
                    });


                    //trace the tag remove event, then, based on the tags to checked/unchecked the checkbox
                    $("#tagsinput").on('itemRemoved', function () {
                        var valarray = $("#tagsinput").val().split(",");
                        $(".selectBox-cont input[type='checkbox']").each(function (index, item) {
                            if (jQuery.inArray($(item).val(), valarray) != -1) {
                                $(item).prop("checked", true);
                            }
                            else {
                                $(item).prop("checked", false);
                            }
                        });
                    });
                });



            }
        });
          
        
    }else{
         
        $('.prossectioninput').html('');
    }
    
});
// load faculty if school head



// load staff change role
$('body').on('click', '#pros-loadchangerolemodal', function (e) {

    $('#loadChangeRoleForm').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

      var selStaffID = $(this).data('id');
      var pros_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");
      var pros_staff_campus_id = $('#abba_display_campus option:selected').val();
    

      $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/pros-loadchangerole.php",
            data: {selStaffID:selStaffID,pros_get_stored_instituion_id:pros_get_stored_instituion_id,pros_staff_campus_id:pros_staff_campus_id},
            success: function(result){
            $('#loadChangeRoleForm').html(result); 
                   var selUserTypeval = $("#selUserType").val();
                   var staffID = $("#prosgetstaffvaluforfaculselect").val();
                   
                   
                        if(selUserTypeval == 'schoolhead')
                        {
                           $('.prossectioninput').fadeIn('slow'); 
                           $('.prosdisplaycampusrole').fadeOut('slow'); 
                           $('.prosdisplaycampusroleschoolehead').fadeIn('slow'); 

                          // LOAD FACULTY   
                            var campusID = [];
                           var campusname = [];
                          $('.pros-checkstaffrolecmapus:checked').each(function() {
                              campusID.push($(this).val());
                              campusname.push($(this).data('id'));
                          });
                      
                          campusID = campusID.toString();
                          campusname = campusname.toString();

                      
                          if(campusID != '' && selUserTypeval == 'schoolhead')
                          {
                              $('.prossectioninput').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
                              
                              
                              $.ajax({
                                  type: "POST",
                                  url: "../../controller/scripts/owner/pros-loadfacultyrole.php",
                                  data: {
                                      campusID:campusID,
                                      campusname:campusname,
                                      staffID:staffID
                                  },
                                  success: function(result) {
                                      $('.prossectioninput').html(result);
                                           
                      
                                      $(function () {
                      
                                          //attatch click event to the checkbox, then, based on the checked checkboxes to add value to the tags input.
                                          $(".selectBox-cont input[type='checkbox']").each(function (index, item) {
                                              $(item).click(function () {
                                                   
                                                  var checkedvalue = [];
                                                  var id = [];
                                                  
                                                  $(".selectBox-cont input[type='checkbox']:checked").each(function (index, ele) {
                                                      checkedvalue.push($(ele).val());
                                                      id.push($(ele).data('id'));
                                                  })
                                                  var result = checkedvalue.join(",");
                                                  var result2 = id.join(",");
                                                  var campusIDnew = [];
                      
                                                  $('.pros-checkstaffrolecmapus:checked').each(function() {
                                                      campusIDnew.push($(this).val());
                                                  });
                                                  
                                                  // Code outside the loop
                                                  for (var i = 0; i < campusIDnew.length; i++) {
                                                      var campusIDarr = campusIDnew[i];
                                                  }  
                      
                                                  $("#tagsinput").tagsinput('removeAll');
                                                  $("#tagsinput").tagsinput('add', result);
                                                  $("#tagsinput").data('id', result2);
                                                 
                                                
                      
                                                 
                                      
                                              });
                                          });
                      
                      
                                          //trace the tag remove event, then, based on the tags to checked/unchecked the checkbox
                                          $("#tagsinput").on('itemRemoved', function () {
                                                  alert('hello');
                                              var valarray = $("#tagsinput").val().split(",");
                                              $(".selectBox-cont input[type='checkbox']").each(function (index, item) {
                                                  if (jQuery.inArray($(item).val(), valarray) != -1) {
                                                      $(item).prop("checked", true);
                                                  }
                                                  else {
                                                      $(item).prop("checked", false);
                                                  }
                                              });
                                          });
                                      });
                      
                      
                      
                                  }
                              });
                                
                              
                          }else{
                               
                              $('.prossectioninput').html('');
                          }

                           // LOAD FACULTY   


                           
                        }else if(selUserTypeval == 'admin')
                        {
                            
                            $('.prossectioninput').fadeOut('slow'); 
                            $('.prosdisplaycampusrole').fadeIn('slow'); 
                            $('.prosdisplaycampusroleschoolehead').fadeOut('slow'); 
                        }else
                        {
                            $('.prossectioninput').fadeOut('slow'); 
                            $('.prosdisplaycampusrole').fadeOut('slow'); 
                            $('.prosdisplaycampusroleschoolehead').fadeOut('slow'); 

                        }


                       
                        
            }
    });
});
// load staff change role




    //   $('body').on("click", '.selectBox', function(){
           
    //         $(this).parent().find('#checkBoxes-one').fadeToggle();
    //         // $(this).parent().parent().siblings().find('#checkBoxes-one').fadeOut();
    //     });
        
        // $('body').on("click",'#pros-closedropdownclose', function(){
        //     $("#checkBoxes-one").css("display", "none");
        // });








// pros create staff process here

$(document).ready(function() {

   

    $('#displaystaffemail').hide();
    $('#staff-form').hide();
    $('#selectuser-typecontainer').fadeIn();

    $('#getschoolusertypebtn').click(function() {
        var usertype_check = $("input[type='radio'].usertypecheck:checked").val();

        if (usertype_check === undefined) {

            $.wnoty({
                type: 'warning',
                message: "Hey! kindly choose a user to be invited.",
                autohideDelay: 3000
            });

        } else {

            // getstaff-forinsert-container  
            $('#getusertypeinvite').val(usertype_check);


            if (usertype_check == 'admin') {

                $('#selectuser-typecontainer').animate({
                    left: '+=50',
                    height: 'toggle'
                }, 1000);

                $('#pros-displayadminmenuset').fadeIn('slow');
                $('#invitestaff-backbtn').fadeIn('slow');
                $('#getstaff-forinsert-container').fadeOut('slow');

                $('.pros-invitestaff-usertype-dialog').removeClass('modal-lg');
                $('.pros-invitestaff-usertype-dialog').addClass('modal-xl');




            } else {



                $('.pros-invitestaff-usertype-dialog').removeClass('modal-lg');
                $('.pros-invitestaff-usertype-dialog').removeClass('modal-xl');

                $('.pros-invitestaff-usertype-dialog').addClass('modal-lg');

                $('#selectuser-typecontainer').animate({
                    left: '+=50',
                    height: 'toggle'
                }, 1000);


                $('#getstaff-forinsert-container').fadeIn('slow');
                $('#invitestaff-backbtn').fadeIn('slow');
                $('#pros-displayadminmenuset').fadeOut('slow');



                     if(usertype_check == 'teacher')
                     {

                        $('#pros-createtitle').html('Create teacher');
                        $('#pros-invitetitle').html('Invite teacher');
                         
                     }else if(usertype_check == 'schoolhead')
                     {
                            $('#pros-createtitle').html('Create school head');
                            $('#pros-invitetitle').html('Invite school head'); 

                     }else if(usertype_check == 'nonteaching')
                     {

                            $('#pros-createtitle').html('Create Non-teaching staff');
                            $('#pros-invitetitle').html('Invite Non-teaching staff');

                     }else if(usertype_check == 'Senior executive/Board member')

                     {
                        $('#pros-createtitle').html('Create Senior executive');
                        $('#pros-invitetitle').html('Invite Senior executive'); 
                     }

                     
                     

            }


        }


    });

    $('body').on('click', '.bringformlinkinvite', function() {
        var usertype_invitelink = $("input[type='radio'].inviteuser-create:checked").val();
                
                $('#displaystaffemail').fadeIn();
                $('#staff-form').fadeOut();

    });

    $('body').on('click', '.bringformlinkcreate', function() {
        var usertype_invitelink = $("input[type='radio'].inviteuser-create:checked").val();
            $('#displaystaffemail').fadeOut();
            $('#staff-form').fadeIn();
            // staff-form 

            var staffnumber = window.intlTelInput(document.querySelector("#staffnumber"), {
                separateDialCode: true,
                preferredCountries: ["ng"],
                hiddenInput: "full",
                utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
            });
    });


    $('body').on('click', '#invitestaff-backbtn', function() {


        $('#getstaff-forinsert-container').animate({
            right: '+=50',
            height: 'toggle'
        }, 1);
        $('#invitestaff-backbtn').fadeOut('fast');
        $('#pros-displayadminmenuset').fadeOut('fast');
        $('#getstaff-forinsert-container').fadeOut('fast');
        $('#selectuser-typecontainer').fadeIn('slow');


        $('.pros-invitestaff-usertype-dialog').removeClass('modal-lg');

        $('.pros-invitestaff-usertype-dialog').removeClass('modal-xl');

        $('.pros-invitestaff-usertype-dialog').addClass('modal-lg');

    });

    // collect group of school ID

    $('body').on('click', '#pros-create-staff', function() {
        var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");

        
        $('#pros-displayadminmenuset').html('<div class="d-flex justify-content-center">' +
            '<div class="spinner-border" role="status">' +
            '<span class="visually-hidden">Loading...</span>' +
            '</div>' +
            '</div>');

      

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/loadmenu-onboarding.php",
            data: {
                groupSchoolID: abba_get_stored_instituion_id
            },
            success: function(result) {
                $('#pros-displayadminmenuset').html(result);
            }
        });
    });




    $('body').on('click', '.generalclass-usertype', function() {//when click on staff invite or create link
       
        var datausertype = $(this).data('id');
            
        if (datausertype == '1') {
            $("#seniorexecutive").prop("checked", true);
    
        } else if (datausertype == '2') {

            $("#personalassist").prop("checked", true);

        } else if (datausertype == '3') {

            $("#admin").prop("checked", true);
    
        } else if (datausertype == '4') {

            $("#teacher").prop("checked", true);

        } else if (datausertype == '5') {
           
            $("#nonteaching").prop("checked", true);
        }
        
    });//when click on staff invite or create link
    

    // check usertype create
    $('body').on('click', '.generalcreateotheeusertypecover', function() {
        var datausertype = $(this).data('id');
    
        if (datausertype == '1') {
            $("#proschecksetupboard").prop("checked", true);
    
        } else if (datausertype == '2') {
            $("#pros-checksetupdamin").prop("checked", true);
        }
    });
    
    
    // check usertype create
    
    $('body').on('click', '.stafflink-card', function() {
        var dataucard_id = $(this).data('id');
        if (dataucard_id == '1') {
            $("#invitelink").prop("checked", true);
        } else if (dataucard_id == '2') {
            $("#createstaff").prop("checked", true);
        }
    
    });
    
});
    // next school menu for admin

// append staff email here

$('body').on('click', '#pros-addstaff-email-invite', function() {

    var numappended = $("#pros-appendinput-ivite-email").val();

    numappended++;

    var appendinputnew = '<div id="pros-staffemail-remove' + numappended + ' " ><br><br><span  data-id="' +
        numappended +
        '" style="color:red;float:right;cursor:pointer;" id="pros-removeappended-email">Remove <i class="fa fa-times"></i></span>' +
        '<div class="" style="margin-right:11rem;margin-left:2%;text-transform: uppercase;font-weight: 700;display: block;font-size: 0.9em;"><label for="schoolName">Staff email<span style="color:red;margin-right:2.5rem;">*</span></label></div>'

        +
        '<div class="pros-flexi-input-affix-wrapper-invitemail staffemail-invitelink pros-inviteemailcover'+ numappended +'" id="pros-staffemail' +
        numappended + '">'
 

        +
        '<input type="email" class="pros-flexi-input prosgeneralinvitemail prossingleinvitemail'+ numappended +'" id="staffemail-invite" data-id="' +
        numappended +'" placeholder="Enter your staff\'s email" style="width:70%;">' +
        '</div></div>';


    $(document.createElement('div')).append(appendinputnew).appendTo('#pros-display-appendstaff-email');
    $("#pros-appendinput-ivite-email").val(numappended);
});

// append staff email end here



$('body').on('click', '#pros-checkmenu-foradmin', function() {//collect assign to admin and proceed

    var pros_verify_menucheck_box = $(".pros-checkchildren:checked").val();


    if (pros_verify_menucheck_box == undefined) {
        $.wnoty({
            type: 'warning',
            message: "Please select at least one menu option before proceeding!",
            autohideDelay: 3000
        });

    }
     else 
    {


        var main_menuarr = [];

        // collect menu as array format prosper
        var mainmenuID = [];
        $.each($(".pros-mainmenugeneralclass:checked"), function() {

            main_menuarr.push($(this).data('id'));
            var miancampus = $(this).data('id');

            var submenuarr = [];
            //loop through submenu here
                $.each($(".prossubmenuclass" + miancampus +":checked"), function() {
                    submenuarr.push($(this).val());
                    submenuarr.push($(this).data('pros-menuper-status'));
                    
                   
                });
            //loop through submenu 
            main_menuarr.push(submenuarr);

        });

         var jsonArray = JSON.stringify(main_menuarr);

        //  var jsonObject = JSON.parse(jsonArray);
    
        $('#prosmenucontent').val(jsonArray); //passing value to an input field

        $('#pros-displayadminmenuset').animate({
            left: '+=50',
            height: 'toggle'
        }, 1000);




        $('#getstaff-forinsert-container').fadeIn('slow');
        $('#invitestaff-backbtn').fadeIn('slow');
        $('#pros-displayadminmenuset').fadeOut('slow');

        $('.pros-invitestaff-usertype-dialog').removeClass('modal-lg');
        $('.pros-invitestaff-usertype-dialog').removeClass('modal-xl');

        $('.pros-invitestaff-usertype-dialog').addClass('modal-lg');

        
        $('#pros-createtitle').html('Create admin');
        $('#pros-invitetitle').html('Invite admin');
    }


});//collect assign to admin and proceed




// check admin menu prosper
$('body').on('click', '.pros-mainmenugeneralclass', function(e) {
    var mainmenu = $(this).data('id');
    var checkbox = $('.prossubmenuclass' + mainmenu);
    checkbox.prop('checked', !checkbox.prop('checked'));
    var mainlength = checkbox.length;
  

    if(mainlength == 0)
    {
    }
    else
    {
        if ($(".prossubmenuclass" + mainmenu + ":checked").length === mainlength) {
        $('.prosgeneralmenuchecked' + mainmenu).prop('checked', true);
        } else {
        $('.prosgeneralmenuchecked' + mainmenu).prop('checked', false);
        }
    }

  });
  // check admin menu prosper
  
  
  
  
  
  



// remove appende staff email  here

$('body').on('click', '#pros-removeappended-email', function() {

    var pros_removeinput = $(this).data('id');
    var numappended = $("#pros-appendinput-ivite-email").val();

    $('#pros-staffemail-remove' + pros_removeinput).remove();

    numappended--;

    $("#pros-appendinput-ivite-email").val(numappended);
});

// remove appende staff email  end here



// insert staff
$('body').on('click', '#getschoolinvitebtn', function() {

   
    $(this).html(
        '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>creating...'
    );
    var typeof_invitation = $("input[type='radio'].inviteuser-create:checked").val();
    var groupSchoolID = localStorage.getItem("abba-stored-institution-id");
    var userType = $('#getusertypeinvite').val();
    
    var staffnumber = window.intlTelInput(document.querySelector("#staffnumber"), {
        separateDialCode: true,
        preferredCountries: ["ng"],
        hiddenInput: "full",
        utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
    });
    
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
    if (typeof_invitation == 'Create staff') {
        
    
        var staff_firstname = $('#staff-fname').val();
    
        var staff_lastname = $('#staff-lname').val();
    
        var staff_email = $('#staff-email').val();
    
        var staff_number = $('#staffnumber').val();
        var staff_date = $('#pros-staff-dob').val();
    
         var stafff_gender = $('#prosstaffgender').val();
       
            if(userType == 'admin')
            {
                var adminmenu = JSON.parse($('#prosmenucontent').val());
                var adminmenufinal = JSON.stringify(adminmenu);
            }else
            {
                var adminmenufinal = '';
            }
          
        
    
    
    
        var regexnumber = /^\+\d{1,3}\s?\(\d{1,4}\)\s?\d{1,4}-?\d{1,9}$/;
    
        var phonenumfull = staffnumber.getNumber(intlTelInputUtils.numberFormat.E164);
        $("input[name='staffphone[full]'").val(phonenumfull);
    
    
        
    
    
        if (staff_firstname == '') {
    
            $('.stafffnamecont').css('outline', '1px solid red');
            $.wnoty({
                type: 'warning',
                message: "Staff's name shouldn't be left blank.",
                autohideDelay: 3000
            });
            $('#getschoolinvitebtn').html('Submit <i class="fa fa-long-arrow-right"></i>');
    
        } else if (staff_lastname == '') {
    
    
            $('.stafff-lastnamecont').css('outline', '1px solid red');
            $('.stafffnamecont').css('outline', '1px solid green');
    
            $.wnoty({
                type: 'warning',
                message: "Staff's last name shouldn't be left blank.",
                autohideDelay: 3000
            });
    
            $('#getschoolinvitebtn').html('Submit <i class="fa fa-long-arrow-right"></i>');
    
        } else if (staff_email == '') {
    
            $('.stafff-emailcont').css('outline', '1px solid red');
            $('.stafff-lastnamecont').css('outline', '1px solid green');
            $('.stafffnamecont').css('outline', '1px solid green');
    
            $.wnoty({
                type: 'warning',
                message: "Staff's email shouldn't be left blank.",
                autohideDelay: 3000
            });
    
            $('#getschoolinvitebtn').html('Submit <i class="fa fa-long-arrow-right"></i>');
    
        } else if (!emailPattern.test(staff_email)) {
    
            $('.stafff-emailcont').css('outline', '1px solid red');
            $('.stafff-lastnamecont').css('outline', '1px solid green');
            $('.stafffnamecont').css('outline', '1px solid green');
    
            $.wnoty({
                type: 'warning',
                message: "Invalid email. please provide a valid one",
                autohideDelay: 3000
            });
            $('#getschoolinvitebtn').html('Submit <i class="fa fa-long-arrow-right"></i>');
    
    
        } else if (staff_number == '') {
    
            $('.staffnumbercont').css('outline', '1px solid red');
            $('.stafff-emailcont').css('outline', '1px solid green');
            $('.stafff-lastnamecont').css('outline', '1px solid green');
            $('.stafffnamecont').css('outline', '1px solid green');
    
            $.wnoty({
                type: 'warning',
                message: "please provide " + staff_firstname + "\'s " + "phone number",
                autohideDelay: 3000
            });
            $('#getschoolinvitebtn').html('Submit <i class="fa fa-long-arrow-right"></i>');
    
        }else if(staff_date == '' || staff_date == '0') 
        {
    
            $('.staffnumbercont').css('outline', '1px solid green');
            $('.stafff-emailcont').css('outline', '1px solid green');
            $('.stafff-lastnamecont').css('outline', '1px solid green');
            $('.stafffnamecont').css('outline', '1px solid green');
            $('.stafffnamecont').css('outline', '1px solid green');
            $('.stafff-dobcont').css('outline', '1px solid red');
    
            $('#getschoolinvitebtn').html('Submit <i class="fa fa-long-arrow-right"></i>');
    
            $.wnoty({
                type: 'warning',
                message: "Staff date of birth required.",
                autohideDelay: 3000
            });
    
            
    
    
        }else if(stafff_gender == '' || stafff_gender == '0') 
        {
    
            
            $('.staffnumbercont').css('outline', '1px solid green');
            $('.stafff-emailcont').css('outline', '1px solid green');
            $('.stafff-lastnamecont').css('outline', '1px solid green');
            $('.stafffnamecont').css('outline', '1px solid green');
            $('.stafffnamecont').css('outline', '1px solid green');
            $('.stafff-dobcont').css('outline', '1px solid green');
            $('.stafff-gendercont').css('outline', '1px solid red');
    
            $('#getschoolinvitebtn').html('Submit <i class="fa fa-long-arrow-right"></i>');
    
            $.wnoty({
                type: 'warning',
                message: "input staff gender.",
                autohideDelay: 3000
            });
            
        }
        else {
    
            $('.staffnumbercont').css('outline', '1px solid green');
            $('.stafff-emailcont').css('outline', '1px solid green');
            $('.stafff-lastnamecont').css('outline', '1px solid green');
            $('.stafffnamecont').css('outline', '1px solid green');
            $('.stafff-dobcont').css('outline', '1px solid green');
            $('.stafff-gendercont').css('outline', '1px solid green');
            
    
            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/createstaff-onboarding.php",
                data: {
                    groupSchoolID: groupSchoolID,
                    userType: userType,
                    staff_firstname: staff_firstname,
                    staff_lastname: staff_lastname,
                    staff_email: staff_email,
                    phonenumfull: phonenumfull,
                    staff_date:staff_date,
                    stafff_gender:stafff_gender,
                    adminmenufinal: adminmenufinal
    
                },
                success: function(output) {
                    // $('#displaycampus-created').html(result);
                    $('#getschoolinvitebtn').html('Submit <i class="fa fa-long-arrow-right"></i>');
                    var prosdata = (output);
                       
    
                    if (prosdata == 'success') {
                        $.wnoty({
                            type: 'success',
                            message: "Great!! staff created Successfully.",
                            autohideDelay: 3000
                        });
                        pros_load_staff();
                         
                        $('#pros-invitestaff-usertype').modal('hide');
                       
    
                    } else if (prosdata == 'exist') {
                        $.wnoty({
                            type: 'warning',
                            message: "email already exist",
                            autohideDelay: 3000
                        });
                    }
    
                }
            });
        }
    
    
    }
     else if (typeof_invitation == 'Invite Staff') {
        var staffemailinvite = $('#staffemail-invite').val();
        
                  var pros_staffemailinvite = [];
            
            $('.prosgeneralinvitemail').each(function() {
                var emainew = $(this).val();
                var trimmedEmail = emainew.trim();
                pros_staffemailinvite.push(trimmedEmail);
            
                var staffemaildata = $(this).data('id');
            
                var staffselectid = $('.prossingleinvitemail' + staffemaildata).val();
            
                if (staffselectid === '') {
                    $('.pros-inviteemailcover' + staffemaildata).css('outline', '1px solid red');
                } else if (!isValidEmail(staffselectid)) {
                    $('.pros-inviteemailcover' + staffemaildata).css('outline', '1px solid red');
                } else {
                    $('.pros-inviteemailcover' + staffemaildata).css('outline', '1px solid green');
                }
            });
            
            var pros_staffinviteemailvalidate = pros_staffemailinvite.some(function(value) {
                return value === ''; // Check if any email is empty
            });
            
            var invalidemail = pros_staffemailinvite.some(function(value) {
                return !isValidEmail(value); // Check if any email is invalid
            });
            
            if (pros_staffinviteemailvalidate) {
                $.wnoty({
                    type: 'warning',
                    message: "Enter your staff's email",
                    autohideDelay: 3000
                });
                $('#getschoolinvitebtn').html('Submit <i class="fa fa-long-arrow-right"></i>');
            } else if (invalidemail) {
                $.wnoty({
                    type: 'warning',
                    message: "Enter a valid email",
                    autohideDelay: 3000
                });
                $('#getschoolinvitebtn').html('Submit <i class="fa fa-long-arrow-right"></i>');
            } else {
                pros_staffemailinvite = pros_staffemailinvite.toString();
            
                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/pros-staffinvite.php",
                    data: {
                        groupSchoolID: groupSchoolID,
                        userType: userType,
                        pros_staffemailinvite: pros_staffemailinvite
                    },
                    success: function(output) {
                        $('#getschoolinvitebtn').html('Submit <i class="fa fa-long-arrow-right"></i>');
                        var prosdata = (output);
            
                        if (prosdata.trim() == 'success') {
                            $.wnoty({
                                type: 'success',
                                message: "Great!! Staff invited Successfully.",
                                autohideDelay: 3000
                            });
                            $('#pros-invitestaff-usertype').modal('hide');
                        } else if (prosdata == 'found') {
                            $.wnoty({
                                type: 'warning',
                                message: "Email already exists",
                                autohideDelay: 3000
                            });
                        }
                    }
                });
            }
            
            function isValidEmail(email) {
                // Regular expression for basic email validation
                var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailPattern.test(email);
            }
        
    
    } else {
        $.wnoty({
            type: 'warning',
            message: "Hey! select either invite staff or create staff before proceeding.",
            autohideDelay: 3000
        });
        $('#getschoolinvitebtn').html('Submit <i class="fa fa-long-arrow-right"></i>');
    }
    
    
    });
    // insert staff   
    

// upload stafff image start here

$('body').on('click', '#pros-uploasstaffimage', function() {
   var staffID = $(this).data('id');
  
   $('#prosgetstaffID-formimage').val(staffID);
  
});



  $(document).ready(function(){

    var groupSchoolID = localStorage.getItem("abba-stored-institution-id");
    $image_crop = $('#image_demo').croppie({
        enableExif: false,
        viewport: {
        width:300,
        height:300,
        type:'square' //circle
        },
        boundary:{
        width:350,
        height:350
        }    
    });



    $('body').on('change', '.updatestaffimage', function() {
        var reader = new FileReader();
        reader.onload = function(event) {
          $image_crop.croppie('bind', {
            url: event.target.result
          }).then(function() {
            console.log('jQuery bind complete');
          });
        };
        reader.readAsDataURL(this.files[0]);
      
        $('#prosloadstaffimagemodal').modal('show');

       
      });



    $('.crop_image').click(function(event){

        $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function(response){
        var StaffID = $('#prosgetstaffID-formimage').val();
             
          
        $('.prosstaffgeneralimage'+StaffID).attr('src', response);
        $('#pros-uploadstaffimage').modal('hide');

        $('#wizardPicturePreview').attr('src', response);
        $('.crop_image').html('<button class="btn btn-success diabled" ><i class="fa fa-spinner fa-pulse"></i>uploading</button>');
          
                $.ajax({
                url:'../../controller/scripts/owner/pros-uploadstaffimage.php',
                type:'POST',
                data:{"image":response, "StaffID":StaffID,"groupSchoolID":groupSchoolID},
                success:function(data){
                    // pros_load_staff();
                    $('.crop_image').html('<button class="btn btn-success btn-sm crop_image">Submit</button>');
                   
                    load_images();
                    $.wnoty({
                        type: 'success',
                        message: 'Great!! image uploaded successfully.',
                        autohideDelay: 3000, // 5 seconds
                        position:'top-right',
                        autohide:true
                    });
                }
            });
        });
    });

});

