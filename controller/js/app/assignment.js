$(document).ready(function() {

    var instutition = $(".abba-change-institution option:selected").val();
  
    $('#ekene_display_campus_for_create_class').html('<option>  <span class="visually-hidden">Loading...</span></option>'); 
    
    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/assignment/ekene_select_campus.php",
        data: {
            instutition: instutition
          
           
        },
    
        success: function (output) { 
            
           
            $("#ekene_display_campus_for_create_class").html(output);
    
        }
    });


    
    // $('#ekene_select_assignment_campus').html('<option>  <span class="visually-hidden">Loading...</span></option>'); 
    
    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/assignment/ekene_select_campus.php",
        data: {
            instutition: instutition
          
           
        },
    
        success: function (output) { 
            
           
            $("#ekene_select_assignment_campus").html(output);
    
        }
    });

    var campus = $("#ekene_select_assignment_campus").val();

  

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/assignment/ekene_select_subject.php",
        data: {
            class_id: class_id,
              campus: campus
           
        },
    
        success: function (output) { 
          
           
            $("#ekene_select_assignment_subject").html(output);
    
        }
    });

});


$('body').on('change','#ekene_display_campus_for_create_class',function(){
    var campus = $(this).val();
    var instutition = $(".abba-change-institution option:selected").val();
    $("#ekene_select_assignment_campus").val(campus);
    // $('#ekene_select_assignment_campus').html('<option>  <span class="visually-hidden">Loading...</span></option>'); 
    
    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/assignment/ekene_select_class.php",
        data: {
            instutition: instutition,
              campus: campus
           
        },
    
        success: function (output) { 
            
           
            $("#ekene_display_section_for_display_class").html(output);
    
        }
    });
    $('#ekene_select_assignment_term').html('<option>  <span class="visually-hidden">Loading...</span></option>'); 
    
    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/assignment/ekene_select_termalias.php",
        data: {
        
              campus: campus
           
        },
    
        success: function (output) { 
            
           
            $("#ekene_select_assignment_term").html(output);
    
        }
    });

    

});

$('body').on('change','#ekene_select_assignment_campus',function(){
    var campus = $(this).val();
    var instutition = $(".abba-change-institution option:selected").val();


    $('#ekene_select_assignment_class').html('<option>  <span class="visually-hidden">Loading...</span></option>'); 
    
    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/assignment/ekene_select_class.php",
        data: {
            instutition: instutition,
              campus: campus
           
        },
    
        success: function (output) { 
            
           
            $("#ekene_select_assignment_class").html(output);
    
        }
    });


    
    $('#ekene_select_assignment_term').html('<option>  <span class="visually-hidden">Loading...</span></option>'); 
    
    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/assignment/ekene_select_termalias.php",
        data: {
        
              campus: campus
           
        },
    
        success: function (output) { 
            
           
            $("#ekene_select_assignment_term").html(output);
    
        }
    });

});


$('body').on('change','#ekene_display_section_for_display_class',function(){

    var class_id = $(this).val();
    var campus = $("#ekene_display_campus_for_create_class option:selected").val();
    var instutition = $(".abba-change-institution option:selected").val();

  $('#ekene_display_subject_class').html('<option>  <span class="visually-hidden">Loading...</span></option>'); 
    
    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/assignment/ekene_select_subject.php",
        data: {
            class_id: class_id,
              campus: campus
           
        },
    
        success: function (output) { 
          
           
            $("#ekene_display_subject_class").html(output);
    
        }
    });

    $('#ekene_select_assignment_class').html('<option>  <span class="visually-hidden">Loading...</span></option>'); 
    
    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/assignment/ekene_select_class.php",
        data: {
            instutition: instutition,
              campus: campus
           
        },
    
        success: function (output) { 
            
           
            $("#ekene_select_assignment_class").html(output);
    
        }
    });


});
$('body').on('change','#ekene_display_section_for_display_class',function(){
    var class_id = $(this).val();
    var campus = $("#ekene_display_campus_for_create_class option:selected").val();
    $('#ekene_select_assignment_subject').html('<option>  <span class="visually-hidden">Loading...</span></option>'); 
    
    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/assignment/ekene_select_subject.php",
        data: {
            class_id: class_id,
              campus: campus
           
        },
    
        success: function (output) { 
          
           
            $("#ekene_select_assignment_subject").html(output);
    
        }
    });

});


$('body').on('change','#ekene_select_assignment_class',function(){

    var class_id = $(this).val();
    var campus = $("#ekene_select_assignment_campus option:selected").val();

  $('#ekene_select_assignment_subject').html('<option>  <span class="visually-hidden">Loading...</span></option>'); 
    
    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/assignment/ekene_select_subject.php",
        data: {
            class_id: class_id,
              campus: campus
           
        },
    
        success: function (output) { 
          
           
            $("#ekene_select_assignment_subject").html(output);
    
        }
    });

});







$(document).ready(function() {
$("#ekene_hidecbt").hide();
$("#ekene_hidenotcbt").hide();

});


$('body').on('change','#cbtornot',function(){
    var cbtornot = $(this).val();
    if(cbtornot == "yes")
    {
        $("#ekene_hidecbt").show();
        $("#ekene_hidenotcbt").hide();
    }
    else
    {
        $("#ekene_hidenotcbt").show();
        $("#ekene_hidecbt").hide(); 
    }
});

     $('body').on('click','#ekene_import_question',function(){
    
        var campus = $("#ekene_display_campus_for_create_class").val();
        var class_id = $("#ekene_display_section_for_display_class").val();
        var subject_id = $("#ekene_display_subject_class").val();
        var ekene_title = $("#ekene_title").val();
        var cbtornot = $("#cbtornot").val();
        var hidden_date = $("#hidden_date").val();
        var start_time = $("#start_time").val();
        var end_time = $("#end_time").val();
        var start_date = $("#start_date").val();
        var submission_date = $("#submission_date").val();

        if(cbtornot == "NULL")
        {
                   
            if(campus == '' || campus == "NULL")
            {
             $("#ekene_display_campus_for_create_class").css("border-color", "Red");
             $.wnoty({
                type: 'warning',
                message: "Please Select campus....",
                autohideDelay: 5500

            });

            }
            else if (class_id == '' || class_id == 'NULL') {
             $("#ekene_display_campus_for_create_class").css("border-color", "green");
             $("#ekene_display_section_for_display_class").css("border-color", "Red");
             $.wnoty({
                type: 'warning',
                message: "Please select class....",
                autohideDelay: 5500

            });
             }
             else if (subject_id == '' || subject_id == 'NULL') {
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#ekene_display_subject_class").css("border-color", "Red");

                 $.wnoty({
                    type: 'warning',
                    message: "Please select Subject....",
                    autohideDelay: 5500
    
                });
             }
             else if (ekene_title == '' || ekene_title == 'NULL') {
                 
                 $("#ekene_display_subject_class").css("border-color", "green");
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#ekene_title").css("border-color", "Red");
                 $.wnoty({
                    type: 'warning',
                    message: "Please input Assignment title....",
                    autohideDelay: 5500
    
                });
              
             }
             else if (cbtornot == '' || cbtornot == 'NULL') {
     
                 $("#overall_score").css("border-color", "green");
                 $("#ekene_title").css("border-color", "green");
                 $("#ekene_display_subject_class").css("border-color", "green");
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#cbtornot").css("border-color", "red");
                 $.wnoty({
                    type: 'warning',
                    message: "Please select CBT Base....",
                    autohideDelay: 5500
    
                });
               
             }
             else
             {
                 $("#overall_score").css("border-color", "green");
                 $("#ekene_title").css("border-color", "green");
                 $("#ekene_display_subject_class").css("border-color", "green");
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#cbtornot").css("border-color", "green");
     
     
             }




        }
        else if(cbtornot == "yes")
        {

                           
            if(campus == '' || campus == "NULL")
            {
             $("#ekene_display_campus_for_create_class").css("border-color", "Red");
             $.wnoty({
                type: 'warning',
                message: "Please Select campus....",
                autohideDelay: 5500

            });

            }
            else if (class_id == '' || class_id == 'NULL') {
             $("#ekene_display_campus_for_create_class").css("border-color", "green");
             $("#ekene_display_section_for_display_class").css("border-color", "Red");
             $.wnoty({
                type: 'warning',
                message: "Please select class....",
                autohideDelay: 5500

            });
             }
             else if (subject_id == '' || subject_id == 'NULL') {
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#ekene_display_subject_class").css("border-color", "Red");

                 $.wnoty({
                    type: 'warning',
                    message: "Please select Subject....",
                    autohideDelay: 5500
    
                });
             }
             else if (ekene_title == '' || ekene_title == 'NULL') {
                 
                 $("#ekene_display_subject_class").css("border-color", "green");
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#ekene_title").css("border-color", "Red");
                 $.wnoty({
                    type: 'warning',
                    message: "Please input Assignment title....",
                    autohideDelay: 5500
    
                });
              
             }
             else if (cbtornot == '' || cbtornot == 'NULL') {
     
                 $("#overall_score").css("border-color", "green");
                 $("#ekene_title").css("border-color", "green");
                 $("#ekene_display_subject_class").css("border-color", "green");
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#cbtornot").css("border-color", "red");
                 $.wnoty({
                    type: 'warning',
                    message: "Please select CBT Base....",
                    autohideDelay: 5500
    
                });
               
             }
             else if(hidden_date == '' || hidden_date == 'NULL')
             {
                $("#overall_score").css("border-color", "green");
                $("#ekene_title").css("border-color", "green");
                $("#ekene_display_subject_class").css("border-color", "green");
                $("#ekene_display_section_for_display_class").css("border-color", "green");
                $("#ekene_display_campus_for_create_class").css("border-color", "green");
                $("#cbtornot").css("border-color", "green");
                $("#hidden_date").css("border-color", "red");
                $.wnoty({
                    type: 'warning',
                    message: "Please Enter Date....",
                    autohideDelay: 5500
    
                });
             }
             else if(start_time == '' || start_time == 'NULL')
             {
                $("#overall_score").css("border-color", "green");
                $("#ekene_title").css("border-color", "green");
                $("#ekene_display_subject_class").css("border-color", "green");
                $("#ekene_display_section_for_display_class").css("border-color", "green");
                $("#ekene_display_campus_for_create_class").css("border-color", "green");
                $("#cbtornot").css("border-color", "green");
                $("#hidden_date").css("border-color", "green");
                $("#start_time").css("border-color", "red");
                $.wnoty({
                    type: 'warning',
                    message: "Please Enter Time....",
                    autohideDelay: 5500
    
                });
             }
             else if(end_time == '' || end_time == 'NULL')
             {
                $("#overall_score").css("border-color", "green");
                $("#ekene_title").css("border-color", "green");
                $("#ekene_display_subject_class").css("border-color", "green");
                $("#ekene_display_section_for_display_class").css("border-color", "green");
                $("#ekene_display_campus_for_create_class").css("border-color", "green");
                $("#cbtornot").css("border-color", "green");
                $("#hidden_date").css("border-color", "green");
                $("#start_time").css("border-color", "green");
                $("#end_time").css("border-color", "red");
                $.wnoty({
                    type: 'warning',
                    message: "Please Enter Time....",
                    autohideDelay: 5500
    
                });
             }
             else
             {
                 $("#overall_score").css("border-color", "green");
                 $("#ekene_title").css("border-color", "green");
                 $("#ekene_display_subject_class").css("border-color", "green");
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#cbtornot").css("border-color", "green");
                 $("#hidden_date").css("border-color", "green");
                 $("#start_time").css("border-color", "green");
                 $("#end_time").css("border-color", "green");
              
                 $("#ekene-import-questionmodal").modal("show");

                 // Set up an event listener for the hidden.bs.modal event
                 $('#ekene-import-questionmodal').on('hidden.bs.modal', function (e) {
                   // Show the second modal when the first modal is hidden
                   $("#ekene-setassignmentmodal").modal("show");
                 });

     
             }


        }
        else if(cbtornot == "no")
        {

            if(campus == '' || campus == "NULL")
            {
             $("#ekene_display_campus_for_create_class").css("border-color", "Red");
             $.wnoty({
                type: 'warning',
                message: "Please Select campus....",
                autohideDelay: 5500

            });

            }
            else if (class_id == '' || class_id == 'NULL') {
             $("#ekene_display_campus_for_create_class").css("border-color", "green");
             $("#ekene_display_section_for_display_class").css("border-color", "Red");
             $.wnoty({
                type: 'warning',
                message: "Please select class....",
                autohideDelay: 5500

            });
             }
             else if (subject_id == '' || subject_id == 'NULL') {
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#ekene_display_subject_class").css("border-color", "Red");

                 $.wnoty({
                    type: 'warning',
                    message: "Please select Subject....",
                    autohideDelay: 5500
    
                });
             }
             else if (ekene_title == '' || ekene_title == 'NULL') {
                 
                 $("#ekene_display_subject_class").css("border-color", "green");
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#ekene_title").css("border-color", "Red");
                 $.wnoty({
                    type: 'warning',
                    message: "Please input Assignment title....",
                    autohideDelay: 5500
    
                });
              
             }
             else if (cbtornot == '' || cbtornot == 'NULL') {
     
                 $("#overall_score").css("border-color", "green");
                 $("#ekene_title").css("border-color", "green");
                 $("#ekene_display_subject_class").css("border-color", "green");
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#cbtornot").css("border-color", "red");
                 $.wnoty({
                    type: 'warning',
                    message: "Please select CBT Base....",
                    autohideDelay: 5500
    
                });
               
             }
             else if(start_date == '' || start_date == 'NULL')
             {
                $("#overall_score").css("border-color", "green");
                $("#ekene_title").css("border-color", "green");
                $("#ekene_display_subject_class").css("border-color", "green");
                $("#ekene_display_section_for_display_class").css("border-color", "green");
                $("#ekene_display_campus_for_create_class").css("border-color", "green");
                $("#cbtornot").css("border-color", "green");
                $("#start_date").css("border-color", "red");
                $.wnoty({
                    type: 'warning',
                    message: "Please Enter Date....",
                    autohideDelay: 5500
    
                });
             }
             else if(submission_date == '' || submission_date == 'NULL')
             {
                $("#overall_score").css("border-color", "green");
                $("#ekene_title").css("border-color", "green");
                $("#ekene_display_subject_class").css("border-color", "green");
                $("#ekene_display_section_for_display_class").css("border-color", "green");
                $("#ekene_display_campus_for_create_class").css("border-color", "green");
                $("#cbtornot").css("border-color", "green");
                $("#start_date").css("border-color", "green");
                $("#submission_date").css("border-color", "red");
                $.wnoty({
                    type: 'warning',
                    message: "Please Enter Date....",
                    autohideDelay: 5500
    
                });
             }
             else
             {
                $("#overall_score").css("border-color", "green");
                $("#ekene_title").css("border-color", "green");
                $("#ekene_display_subject_class").css("border-color", "green");
                $("#ekene_display_section_for_display_class").css("border-color", "green");
                $("#ekene_display_campus_for_create_class").css("border-color", "green");
                $("#cbtornot").css("border-color", "green");
                $("#hidden_date").css("border-color", "green");
                $("#submission_date").css("border-color", "green");
        
                   $("#ekene-import-questionmodal").modal("show");

                   // Set up an event listener for the hidden.bs.modal event
                   $('#ekene-import-questionmodal').on('hidden.bs.modal', function (e) {
                     // Show the second modal when the first modal is hidden
                     $("#ekene-setassignmentmodal").modal("show");
                   });

                } 



        }

     
  
     });
    $('body').on('click', '#ekene_addtheory',function(){
        var campus = $("#ekene_display_campus_for_create_class").val();
        var class_id = $("#ekene_display_section_for_display_class").val();
        var subject_id = $("#ekene_display_subject_class").val();
        var ekene_title = $("#ekene_title").val();
        var cbtornot = $("#cbtornot").val();
        var hidden_date = $("#hidden_date").val();
        var start_time = $("#start_time").val();
        var end_time = $("#end_time").val();
        var start_date = $("#start_date").val();
        var submission_date = $("#submission_date").val();

        if(cbtornot == "NULL")
        {
                   
            if(campus == '' || campus == "NULL")
            {
             $("#ekene_display_campus_for_create_class").css("border-color", "Red");
             $.wnoty({
                type: 'warning',
                message: "Please Select campus....",
                autohideDelay: 5500

            });

            }
            else if (class_id == '' || class_id == 'NULL') {
             $("#ekene_display_campus_for_create_class").css("border-color", "green");
             $("#ekene_display_section_for_display_class").css("border-color", "Red");
             $.wnoty({
                type: 'warning',
                message: "Please select class....",
                autohideDelay: 5500

            });
             }
             else if (subject_id == '' || subject_id == 'NULL') {
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#ekene_display_subject_class").css("border-color", "Red");

                 $.wnoty({
                    type: 'warning',
                    message: "Please select Subject....",
                    autohideDelay: 5500
    
                });
             }
             else if (ekene_title == '' || ekene_title == 'NULL') {
                 
                 $("#ekene_display_subject_class").css("border-color", "green");
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#ekene_title").css("border-color", "Red");
                 $.wnoty({
                    type: 'warning',
                    message: "Please input Assignment title....",
                    autohideDelay: 5500
    
                });
              
             }
             else if (cbtornot == '' || cbtornot == 'NULL') {
     
                 $("#overall_score").css("border-color", "green");
                 $("#ekene_title").css("border-color", "green");
                 $("#ekene_display_subject_class").css("border-color", "green");
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#cbtornot").css("border-color", "red");
                 $.wnoty({
                    type: 'warning',
                    message: "Please select CBT Base....",
                    autohideDelay: 5500
    
                });
               
             }
             else
             {
                 $("#overall_score").css("border-color", "green");
                 $("#ekene_title").css("border-color", "green");
                 $("#ekene_display_subject_class").css("border-color", "green");
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#cbtornot").css("border-color", "green");
     
     
             }




        }
        else if(cbtornot == "yes")
        {

                           
            if(campus == '' || campus == "NULL")
            {
             $("#ekene_display_campus_for_create_class").css("border-color", "Red");
             $.wnoty({
                type: 'warning',
                message: "Please Select campus....",
                autohideDelay: 5500

            });

            }
            else if (class_id == '' || class_id == 'NULL') {
             $("#ekene_display_campus_for_create_class").css("border-color", "green");
             $("#ekene_display_section_for_display_class").css("border-color", "Red");
             $.wnoty({
                type: 'warning',
                message: "Please select class....",
                autohideDelay: 5500

            });
             }
             else if (subject_id == '' || subject_id == 'NULL') {
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#ekene_display_subject_class").css("border-color", "Red");

                 $.wnoty({
                    type: 'warning',
                    message: "Please select Subject....",
                    autohideDelay: 5500
    
                });
             }
             else if (ekene_title == '' || ekene_title == 'NULL') {
                 
                 $("#ekene_display_subject_class").css("border-color", "green");
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#ekene_title").css("border-color", "Red");
                 $.wnoty({
                    type: 'warning',
                    message: "Please input Assignment title....",
                    autohideDelay: 5500
    
                });
              
             }
             else if (cbtornot == '' || cbtornot == 'NULL') {
     
                 $("#overall_score").css("border-color", "green");
                 $("#ekene_title").css("border-color", "green");
                 $("#ekene_display_subject_class").css("border-color", "green");
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#cbtornot").css("border-color", "red");
                 $.wnoty({
                    type: 'warning',
                    message: "Please select CBT Base....",
                    autohideDelay: 5500
    
                });
               
             }
             else if(hidden_date == '' || hidden_date == 'NULL')
             {
                $("#overall_score").css("border-color", "green");
                $("#ekene_title").css("border-color", "green");
                $("#ekene_display_subject_class").css("border-color", "green");
                $("#ekene_display_section_for_display_class").css("border-color", "green");
                $("#ekene_display_campus_for_create_class").css("border-color", "green");
                $("#cbtornot").css("border-color", "green");
                $("#hidden_date").css("border-color", "red");
                $.wnoty({
                    type: 'warning',
                    message: "Please Enter Date....",
                    autohideDelay: 5500
    
                });
             }
             else if(start_time == '' || start_time == 'NULL')
             {
                $("#overall_score").css("border-color", "green");
                $("#ekene_title").css("border-color", "green");
                $("#ekene_display_subject_class").css("border-color", "green");
                $("#ekene_display_section_for_display_class").css("border-color", "green");
                $("#ekene_display_campus_for_create_class").css("border-color", "green");
                $("#cbtornot").css("border-color", "green");
                $("#hidden_date").css("border-color", "green");
                $("#start_time").css("border-color", "red");
                $.wnoty({
                    type: 'warning',
                    message: "Please Enter Time....",
                    autohideDelay: 5500
    
                });
             }
             else if(end_time == '' || end_time == 'NULL')
             {
                $("#overall_score").css("border-color", "green");
                $("#ekene_title").css("border-color", "green");
                $("#ekene_display_subject_class").css("border-color", "green");
                $("#ekene_display_section_for_display_class").css("border-color", "green");
                $("#ekene_display_campus_for_create_class").css("border-color", "green");
                $("#cbtornot").css("border-color", "green");
                $("#hidden_date").css("border-color", "green");
                $("#start_time").css("border-color", "green");
                $("#end_time").css("border-color", "red");
                $.wnoty({
                    type: 'warning',
                    message: "Please Enter Time....",
                    autohideDelay: 5500
    
                });
             }
             else
             {
                 $("#overall_score").css("border-color", "green");
                 $("#ekene_title").css("border-color", "green");
                 $("#ekene_display_subject_class").css("border-color", "green");
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#cbtornot").css("border-color", "green");
                 $("#hidden_date").css("border-color", "green");
                 $("#start_time").css("border-color", "green");
                 $("#end_time").css("border-color", "green");
                 $('.submitquestion').prop('disabled', false);
                 var hidd1 = $("#hidd1").val();
                 if(hidd1 == 1)
                 {
                   $("#ekenetheorynorecordfoundcontent").empty();
          

                   var ekene_theoryquestion = `<div style="color: black;"class="ekeneremoveappendentheory${ekeneloadinputtag}">
                   <h3 class="ekene_general_class_remove_inputtheory ekenetheoryquest"> Question ${ekeneloadinputtag} </h3>
                   <div class="row" align="right">
                       <span class="fa fa-trash text-danger remove_appendformbtn col-12  ekene_delete_jsontheorycontent" data-id="${ekeneloadinputtag}" style="cursor: pointer;"> Delete</span>
                   </div>
                   &nbsp; <textarea class="mymce textarea_questiontheory question mb-4"  data-status="Theory" rows="3" cols="80" name="area"></textarea>
               </div>`;
               $('#ekeneloadtheoryappendquestion').val(ekeneloadinputtag);
               $('#ekeneloadappededinputheretheory').append(ekene_theoryquestion);
          
                    $('.mymce').summernote();
                 }
                 else
                 {
                    var ekene_theoryquestion = `<div style="color: black;"class="ekeneremoveappendentheory${ekeneloadinputtag}">
                   <h3 class="ekene_general_class_remove_inputtheory ekenetheoryquest"> Question ${ekeneloadinputtag} </h3>
                   <div class="row" align="right">
                       <span class="fa fa-trash text-danger remove_appendformbtn col-12  ekene_delete_jsontheorycontent" data-id="${ekeneloadinputtag}" style="cursor: pointer;"> Delete</span>
                   </div>
                   &nbsp; <textarea class="mymce textarea_questiontheory question mb-4" data-status="Theory" rows="3" cols="80" name="area"></textarea>
               </div>`;
               $('#ekeneloadtheoryappendquestion').val(ekeneloadinputtag);
               $('#ekeneloadappededinputheretheory').append(ekene_theoryquestion);
              
                   $('.mymce').summernote();
                 }
             }


        }
        else if(cbtornot == "no")
        {

            if(campus == '' || campus == "NULL")
            {
             $("#ekene_display_campus_for_create_class").css("border-color", "Red");
             $.wnoty({
                type: 'warning',
                message: "Please Select campus....",
                autohideDelay: 5500

            });

            }
            else if (class_id == '' || class_id == 'NULL') {
             $("#ekene_display_campus_for_create_class").css("border-color", "green");
             $("#ekene_display_section_for_display_class").css("border-color", "Red");
             $.wnoty({
                type: 'warning',
                message: "Please select class....",
                autohideDelay: 5500

            });
             }
             else if (subject_id == '' || subject_id == 'NULL') {
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#ekene_display_subject_class").css("border-color", "Red");

                 $.wnoty({
                    type: 'warning',
                    message: "Please select Subject....",
                    autohideDelay: 5500
    
                });
             }
             else if (ekene_title == '' || ekene_title == 'NULL') {
                 
                 $("#ekene_display_subject_class").css("border-color", "green");
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#ekene_title").css("border-color", "Red");
                 $.wnoty({
                    type: 'warning',
                    message: "Please input Assignment title....",
                    autohideDelay: 5500
    
                });
              
             }
             else if (cbtornot == '' || cbtornot == 'NULL') {
     
                 $("#overall_score").css("border-color", "green");
                 $("#ekene_title").css("border-color", "green");
                 $("#ekene_display_subject_class").css("border-color", "green");
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#cbtornot").css("border-color", "red");
                 $.wnoty({
                    type: 'warning',
                    message: "Please select CBT Base....",
                    autohideDelay: 5500
    
                });
               
             }
             else if(start_date == '' || start_date == 'NULL')
             {
                $("#overall_score").css("border-color", "green");
                $("#ekene_title").css("border-color", "green");
                $("#ekene_display_subject_class").css("border-color", "green");
                $("#ekene_display_section_for_display_class").css("border-color", "green");
                $("#ekene_display_campus_for_create_class").css("border-color", "green");
                $("#cbtornot").css("border-color", "green");
                $("#start_date").css("border-color", "red");
                $.wnoty({
                    type: 'warning',
                    message: "Please Enter Date....",
                    autohideDelay: 5500
    
                });
             }
             else if(submission_date == '' || submission_date == 'NULL')
             {
                $("#overall_score").css("border-color", "green");
                $("#ekene_title").css("border-color", "green");
                $("#ekene_display_subject_class").css("border-color", "green");
                $("#ekene_display_section_for_display_class").css("border-color", "green");
                $("#ekene_display_campus_for_create_class").css("border-color", "green");
                $("#cbtornot").css("border-color", "green");
                $("#start_date").css("border-color", "green");
                $("#submission_date").css("border-color", "red");
                $.wnoty({
                    type: 'warning',
                    message: "Please Enter Date....",
                    autohideDelay: 5500
    
                });
             }
             else
             {
                $("#overall_score").css("border-color", "green");
                $("#ekene_title").css("border-color", "green");
                $("#ekene_display_subject_class").css("border-color", "green");
                $("#ekene_display_section_for_display_class").css("border-color", "green");
                $("#ekene_display_campus_for_create_class").css("border-color", "green");
                $("#cbtornot").css("border-color", "green");
                $("#hidden_date").css("border-color", "green");
                $("#submission_date").css("border-color", "green");
                $('.submitquestion').prop('disabled', false);

                var hidd1 = $("#hidd1").val();
                 if(hidd1 == 1)
                 {
                    
                    var ekeneloadinputtag = parseInt($('#ekeneloadtheoryappendquestion').val());

                ekeneloadinputtag++;
                   $("#ekenetheorynorecordfoundcontent").empty();
          
                   var ekene_theoryquestion = `<div style="color: black;"class="ekeneremoveappendentheory${ekeneloadinputtag}">
                   <h3 class="ekene_general_class_remove_inputtheory ekenetheoryquest"> Question ${ekeneloadinputtag} </h3>
                   <div class="row" align="right">
                       <span class="fa fa-trash text-danger remove_appendformbtn col-12  ekene_delete_jsontheorycontent" data-id="${ekeneloadinputtag}" style="cursor: pointer;"> Delete</span>
                   </div>
                   &nbsp; <textarea class="mymce textarea_questiontheory question mb-4" data-status="Theory" rows="3" cols="80" name="area"></textarea>
               </div>`;
               $('#ekeneloadtheoryappendquestion').val(ekeneloadinputtag);
               $('#ekeneloadappededinputheretheory').append(ekene_theoryquestion);
               
               $('.mymce').summernote();
                    
                 }
                 else
                 {

                    var ekeneloadinputtag = parseInt($('#ekeneloadtheoryappendquestion').val());

                ekeneloadinputtag++;
                    var ekene_theoryquestion = `<div style="color: black;"class="ekeneremoveappendentheory${ekeneloadinputtag}">
                    <h3 class="ekene_general_class_remove_inputtheory ekenetheoryquest"> Question ${ekeneloadinputtag} </h3>
                    <div class="row" align="right">
                        <span class="fa fa-trash text-danger remove_appendformbtn col-12  ekene_delete_jsontheorycontent" data-id="${ekeneloadinputtag}" style="cursor: pointer;"> Delete</span>
                    </div>
                    &nbsp; <textarea class="mymce textarea_questiontheory question mb-4" data-status="Theory" rows="3" cols="80" name="area"></textarea>
                </div>`;
                $('#ekeneloadtheoryappendquestion').val(ekeneloadinputtag);
                $('#ekeneloadappededinputheretheory').append(ekene_theoryquestion);
                
                $('.mymce').summernote();
                     
                 }
             } 



        }
    });
    $('body').on('click', '#ekene_add_obj',function(){
        var campus = $("#ekene_display_campus_for_create_class").val();
        var class_id = $("#ekene_display_section_for_display_class").val();
        var subject_id = $("#ekene_display_subject_class").val();
        var ekene_title = $("#ekene_title").val();
        var cbtornot = $("#cbtornot").val();
        var hidden_date = $("#hidden_date").val();
        var start_time = $("#start_time").val();
        var end_time = $("#end_time").val();
        var start_date = $("#start_date").val();
        var submission_date = $("#submission_date").val();

        var categoryforcreate = $(".prosassementcategory_create").val();


        

        if(cbtornot == "NULL")
        {
                   
            if(campus == '' || campus == "NULL")
            {
             $("#ekene_display_campus_for_create_class").css("border-color", "Red");
             $.wnoty({
                type: 'warning',
                message: "Please Select campus....",
                autohideDelay: 5500

            });

            }
            else if (class_id == '' || class_id == 'NULL') {
             $("#ekene_display_campus_for_create_class").css("border-color", "green");
             $("#ekene_display_section_for_display_class").css("border-color", "Red");
             $.wnoty({
                type: 'warning',
                message: "Please select class....",
                autohideDelay: 5500

            });
             }
             else if (subject_id == '' || subject_id == 'NULL') {
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#ekene_display_subject_class").css("border-color", "Red");

                 $.wnoty({
                    type: 'warning',
                    message: "Please select Subject....",
                    autohideDelay: 5500
    
                });
             }
             else if (ekene_title == '' || ekene_title == 'NULL') {
                 
                 $("#ekene_display_subject_class").css("border-color", "green");
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#ekene_title").css("border-color", "Red");
                 $.wnoty({
                    type: 'warning',
                    message: "Please input Assignment title....",
                    autohideDelay: 5500
    
                });
              
             }
             else if (cbtornot == '' || cbtornot == 'NULL') {
     
                 $("#overall_score").css("border-color", "green");
                 $("#ekene_title").css("border-color", "green");
                 $("#ekene_display_subject_class").css("border-color", "green");
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#cbtornot").css("border-color", "red");
                 $.wnoty({
                    type: 'warning',
                    message: "Please select CBT Base....",
                    autohideDelay: 5500
    
                });
               
             }else if(categoryforcreate == '0' || categoryforcreate == '' || categoryforcreate == 'NULL')
             {


                        $("#overall_score").css("border-color", "green");
                        $("#ekene_title").css("border-color", "green");
                        $("#ekene_display_subject_class").css("border-color", "green");
                        $("#ekene_display_section_for_display_class").css("border-color", "green");
                        $("#ekene_display_campus_for_create_class").css("border-color", "green");
                        $("#cbtornot").css("border-color", "green");
                        $(".prosassementcategory_create").css("border-color", "red");

                        $.wnoty({
                        type: 'warning',
                        message: "Please select Ccategory to proceed.",
                        autohideDelay: 5500
        
                          });
                    
                    

             }
             else
             {
                 $("#overall_score").css("border-color", "green");
                 $("#ekene_title").css("border-color", "green");
                 $("#ekene_display_subject_class").css("border-color", "green");
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#cbtornot").css("border-color", "green");
                 $(".prosassementcategory_create").css("border-color", "green");
     
     
             }




        }
        else if(cbtornot == "yes")
        {

                           
            if(campus == '' || campus == "NULL")
            {
             $("#ekene_display_campus_for_create_class").css("border-color", "Red");
             $.wnoty({
                type: 'warning',
                message: "Please Select campus....",
                autohideDelay: 5500

            });

            }
            else if (class_id == '' || class_id == 'NULL') {
             $("#ekene_display_campus_for_create_class").css("border-color", "green");
             $("#ekene_display_section_for_display_class").css("border-color", "Red");
             $.wnoty({
                type: 'warning',
                message: "Please select class....",
                autohideDelay: 5500

            });
             }
             else if (subject_id == '' || subject_id == 'NULL') {
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#ekene_display_subject_class").css("border-color", "Red");

                 $.wnoty({
                    type: 'warning',
                    message: "Please select Subject....",
                    autohideDelay: 5500
    
                });
             }
             else if (ekene_title == '' || ekene_title == 'NULL') {
                 
                 $("#ekene_display_subject_class").css("border-color", "green");
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#ekene_title").css("border-color", "Red");
                 $.wnoty({
                    type: 'warning',
                    message: "Please input Assignment title....",
                    autohideDelay: 5500
    
                });
              
             }
             else if (cbtornot == '' || cbtornot == 'NULL') {
     
                 $("#overall_score").css("border-color", "green");
                 $("#ekene_title").css("border-color", "green");
                 $("#ekene_display_subject_class").css("border-color", "green");
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#cbtornot").css("border-color", "red");
                 $.wnoty({
                    type: 'warning',
                    message: "Please select CBT Base....",
                    autohideDelay: 5500
    
                });
               
             }
             else if(hidden_date == '' || hidden_date == 'NULL')
             {
                $("#overall_score").css("border-color", "green");
                $("#ekene_title").css("border-color", "green");
                $("#ekene_display_subject_class").css("border-color", "green");
                $("#ekene_display_section_for_display_class").css("border-color", "green");
                $("#ekene_display_campus_for_create_class").css("border-color", "green");
                $("#cbtornot").css("border-color", "green");
                $("#hidden_date").css("border-color", "red");
                $.wnoty({
                    type: 'warning',
                    message: "Please Enter Date....",
                    autohideDelay: 5500
    
                });
             }
             else if(start_time == '' || start_time == 'NULL')
             {
                $("#overall_score").css("border-color", "green");
                $("#ekene_title").css("border-color", "green");
                $("#ekene_display_subject_class").css("border-color", "green");
                $("#ekene_display_section_for_display_class").css("border-color", "green");
                $("#ekene_display_campus_for_create_class").css("border-color", "green");
                $("#cbtornot").css("border-color", "green");
                $("#hidden_date").css("border-color", "green");
                $("#start_time").css("border-color", "red");
                $.wnoty({
                    type: 'warning',
                    message: "Please Enter Time....",
                    autohideDelay: 5500
    
                });
             }
             else if(end_time == '' || end_time == 'NULL')
             {
                $("#overall_score").css("border-color", "green");
                $("#ekene_title").css("border-color", "green");
                $("#ekene_display_subject_class").css("border-color", "green");
                $("#ekene_display_section_for_display_class").css("border-color", "green");
                $("#ekene_display_campus_for_create_class").css("border-color", "green");
                $("#cbtornot").css("border-color", "green");
                $("#hidden_date").css("border-color", "green");
                $("#start_time").css("border-color", "green");
                $("#end_time").css("border-color", "red");
                $.wnoty({
                    type: 'warning',
                    message: "Please Enter Time....",
                    autohideDelay: 5500
    
                });
             }
             else
             {


                 $("#overall_score").css("border-color", "green");
                 $("#ekene_title").css("border-color", "green");
                 $("#ekene_display_subject_class").css("border-color", "green");
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#cbtornot").css("border-color", "green");
                 $("#hidden_date").css("border-color", "green");
                 $("#start_time").css("border-color", "green");
                 $("#end_time").css("border-color", "green");

                 $('.submitquestion').prop('disabled', false);

                 var ekeneloadinputtag = parseInt($('#ekeneloadobjectiveappendquestion').val());

                 ekeneloadinputtag++;
               


                 var hidd = $("#hidd").val();

                 if(hidd == 1)
                 {
                      $("#ekehidehidecontentnorecord").empty();
  
  
                      var ekene_objectivequestion = `<div style="color: black;">
                          <h3 class="ekene_general_class_remove_inputtheory ekenetheoryquest"> Question ${ekeneloadinputtag} </h3>
                          <div class="row" align="right">
                              <span class="fa fa-trash text-danger remove_appendformbtn col-12 ekene_delete_jsontheorycontent"> Delete</span>
                          </div>
                          &nbsp;
                          <textarea class="mymce textarea_question question" data-status="objective" rows="3" cols="80" name="area"></textarea>
  
                          <div class="row mx-3" style="padding: 20px;">
                              <div class="col-5 align-items-center abba_items_amt_add_single">
                                  <h6> Option A </h6>
                                  <textarea class="mymce option1" rows="4" cols="20" name="area"></textarea>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              </div>
  
                              <div class="col-5 align-items-center abba_items_amt_add_single">
                                  <h6> Option B </h6>
                                  <textarea class="mymce option2" rows="4" cols="20" name="area"></textarea>
                              </div>
                          </div>
  
                          <div class="row mx-3" style="padding: 20px;">
                              <div class="col-5 align-items-center abba_items_amt_add_single">
                                  <h6> Option C </h6>
                                  <textarea class="mymce option3" rows="4" cols="20" name="area"></textarea>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              </div>
  
                              <div class="col-5 align-items-center abba_items_amt_add_single">
                                  <h6> Option D </h6>
                                  <textarea class="mymce option4" rows="4" cols="20" name="area"></textarea>
                              </div>
                          </div>
  
                          <div class="row mx-4 mb-4">
                              <div class="col-6" style="padding-left: 35px;">
                                  <select class="form-select answerselected form-select-sm ekeneselectedanswer" aria-label=".form-select-sm example" style="width: 180px;">
                                      <option value="NULL">Answer</option>
                                      <option value="A">A</option>
                                      <option value="B">B</option>
                                      <option value="C">C</option>
                                      <option value="D">D</option>
                                  </select>
                              </div>
                          </div>
                        </div>`;
  
                          $('#ekeneloadappededinputhere').append(ekene_objectivequestion);
                          $('.mymce').summernote();
                      }
                      else
                      {
                          var ekene_objectivequestion = `<div style="color: black;">
                          <h3 class="ekene_general_class_remove_inputtheory ekenetheoryquest"> Question ${ekeneloadinputtag} </h3>
                          <div class="row" align="right">
                              <span class="fa fa-trash text-danger remove_appendformbtn col-12 ekene_delete_jsontheorycontent"> Delete</span>
                          </div>
                          &nbsp;
                          <textarea class="mymce textarea_question question" data-status="objective" rows="3" cols="80" name="area"></textarea>
  
                          <div class="row mx-3" style="padding: 20px;">
                              <div class="col-5 align-items-center abba_items_amt_add_single">
                                  <h6> Option A </h6>
                                  <textarea class="mymce option1" rows="4" cols="20" name="area"></textarea>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              </div>
  
                              <div class="col-5 align-items-center abba_items_amt_add_single">
                                  <h6> Option B </h6>
                                  <textarea class="mymce option2" rows="4" cols="20" name="area"></textarea>
                              </div>
                          </div>
  
                          <div class="row mx-3" style="padding: 20px;">
                              <div class="col-5 align-items-center abba_items_amt_add_single">
                                  <h6> Option C </h6>
                                  <textarea class="mymce option3" rows="4" cols="20" name="area"></textarea>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              </div>
  
                              <div class="col-5 align-items-center abba_items_amt_add_single">
                                  <h6> Option D </h6>
                                  <textarea class="mymce option4" rows="4" cols="20" name="area"></textarea>
                              </div>
                          </div>
  
                          <div class="row mx-4 mb-4">
                              <div class="col-6" style="padding-left: 35px;">
                                  <select class="form-select answerselected form-select-sm ekeneselectedanswer" aria-label=".form-select-sm example" style="width: 180px;">
                                      <option value="NULL">Answer</option>
                                      <option value="A">A</option>
                                      <option value="B">B</option>
                                      <option value="C">C</option>
                                      <option value="D">D</option>
                                  </select>
                              </div>
                          </div>
                        </div>`;
  
                          $('#ekeneloadappededinputhere').append(ekene_objectivequestion);
                          $('.mymce').summernote();
                      }


                      $('.ekeneloadobjectiveappendquestion').val(ekeneloadinputtag);
                 
     
             }


        }
        else if(cbtornot == "no")
        {

            if(campus == '' || campus == "NULL")
            {
             $("#ekene_display_campus_for_create_class").css("border-color", "Red");
             $.wnoty({
                type: 'warning',
                message: "Please Select campus....",
                autohideDelay: 5500

            });

            }
            else if (class_id == '' || class_id == 'NULL') {
             $("#ekene_display_campus_for_create_class").css("border-color", "green");
             $("#ekene_display_section_for_display_class").css("border-color", "Red");
             $.wnoty({
                type: 'warning',
                message: "Please select class....",
                autohideDelay: 5500

            });
             }
             else if (subject_id == '' || subject_id == 'NULL') {
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#ekene_display_subject_class").css("border-color", "Red");

                 $.wnoty({
                    type: 'warning',
                    message: "Please select Subject....",
                    autohideDelay: 5500
    
                });
             }
             else if (ekene_title == '' || ekene_title == 'NULL') {



                 
                    $("#ekene_display_subject_class").css("border-color", "green");
                    $("#ekene_display_section_for_display_class").css("border-color", "green");
                    $("#ekene_display_campus_for_create_class").css("border-color", "green");
                    $("#ekene_title").css("border-color", "Red");
                    $.wnoty({
                        type: 'warning',
                        message: "Please input Assignment title....",
                        autohideDelay: 5500
        
                    });
              
             }
             else if (cbtornot == '' || cbtornot == 'NULL') {



     
                 $("#overall_score").css("border-color", "green");
                 $("#ekene_title").css("border-color", "green");
                 $("#ekene_display_subject_class").css("border-color", "green");
                 $("#ekene_display_section_for_display_class").css("border-color", "green");
                 $("#ekene_display_campus_for_create_class").css("border-color", "green");
                 $("#cbtornot").css("border-color", "red");

                 $.wnoty({
                    type: 'warning',
                    message: "Please select CBT Base....",
                    autohideDelay: 5500 });
               



               
             }
             else if(start_date == '' || start_date == 'NULL')
             {

                $("#overall_score").css("border-color", "green");
                $("#ekene_title").css("border-color", "green");
                $("#ekene_display_subject_class").css("border-color", "green");
                $("#ekene_display_section_for_display_class").css("border-color", "green");
                $("#ekene_display_campus_for_create_class").css("border-color", "green");
                $("#cbtornot").css("border-color", "green");
                $("#start_date").css("border-color", "red");

                $.wnoty({
                    type: 'warning',
                    message: "Please Enter Date....",
                    autohideDelay: 5500
    
                });




             }
             else if(submission_date == '' || submission_date == 'NULL')
             {
                $("#overall_score").css("border-color", "green");
                $("#ekene_title").css("border-color", "green");
                $("#ekene_display_subject_class").css("border-color", "green");
                $("#ekene_display_section_for_display_class").css("border-color", "green");
                $("#ekene_display_campus_for_create_class").css("border-color", "green");
                $("#cbtornot").css("border-color", "green");
                $("#start_date").css("border-color", "green");
                $("#submission_date").css("border-color", "red");
                $.wnoty({
                    type: 'warning',
                    message: "Please Enter Date....",
                    autohideDelay: 5500
    
                });
             }
             else
             {
                $("#overall_score").css("border-color", "green");
                $("#ekene_title").css("border-color", "green");
                $("#ekene_display_subject_class").css("border-color", "green");
                $("#ekene_display_section_for_display_class").css("border-color", "green");
                $("#ekene_display_campus_for_create_class").css("border-color", "green");
                $("#cbtornot").css("border-color", "green");
                $("#hidden_date").css("border-color", "green");
                $("#submission_date").css("border-color", "green");

                var hidd = $("#hidd").val();

                 


                $('.submitquestion').prop('disabled', false);
               
                
               if(hidd == 1)
               {
                    $("#ekehidehidecontentnorecord").empty();

                    // var ekenestagvidated =  ekeneloadinputtag+1;
                    var ekeneloadinputtag = parseInt($('#ekeneloadobjectiveappendquestion').val());

                    ekeneloadinputtag++;

                    var ekene_objectivequestion = `<div style="color: black;"  class="ekeneremoveappendenobj${ekeneloadinputtag}">
                        <h3 class="ekene_general_class_remove_inputtheory ekenetheoryquest ekeneupdateobjectquestion"> Question ${ekeneloadinputtag} </h3>
                        <div class="row" align="right">
                            <span class="fa fa-trash text-danger remove_appendformbtn col-12 ekene_delete_jsontheorycontentobj" data-id="${ekeneloadinputtag}" style="cursor: pointer;"> Delete</span>
                        </div>
                        &nbsp;
                        <textarea class="mymce textarea_question question" data-status="objective" rows="3" cols="80" name="area"></textarea>

                        <div class="row mx-3" style="padding: 20px;">
                            <div class="col-5 align-items-center abba_items_amt_add_single">
                                <h6> Option A </h6>
                                <textarea class="mymce option1" rows="4" cols="20" name="area"></textarea>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>

                            <div class="col-5 align-items-center abba_items_amt_add_single">
                                <h6> Option B </h6>
                                <textarea class="mymce option2" rows="4" cols="20" name="area"></textarea>
                            </div>
                        </div>

                        <div class="row mx-3" style="padding: 20px;">
                            <div class="col-5 align-items-center abba_items_amt_add_single">
                                <h6> Option C </h6>
                                <textarea class="mymce option3" rows="4" cols="20" name="area"></textarea>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>

                            <div class="col-5 align-items-center abba_items_amt_add_single">
                                <h6> Option D </h6>
                                <textarea class="mymce option4" rows="4" cols="20" name="area"></textarea>
                            </div>
                        </div>

                        <div class="row mx-4 mb-4">
                            <div class="col-6" style="padding-left: 35px;">
                                <select class="form-select answerselected form-select-sm ekeneselectedanswer" aria-label=".form-select-sm example" style="width: 180px;">
                                    <option value="NULL">Answer</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </div>
                        </div>
                      </div>`;

                        $('#ekeneloadappededinputhere').append(ekene_objectivequestion);
                        $('.mymce').summernote();
                        $('#ekeneloadobjectiveappendquestion').val(ekeneloadinputtag);
                    }
                    else
                    {

                        var ekeneloadinputtag = parseInt($('#ekeneloadobjectiveappendquestion').val());

                        ekeneloadinputtag++;
                        var ekene_objectivequestion = `<div style="color: black;" class="ekeneremoveappendenobj${ekeneloadinputtag}">
                        <h3 class="ekene_general_class_remove_inputtheory ekenetheoryquest ekeneupdateobjectquestion"> Question ${ekeneloadinputtag} </h3>
                        <div class="row" align="right">
                            <span class="fa fa-trash text-danger remove_appendformbtn col-12 ekene_delete_jsontheorycontentobj" data-id="${ekeneloadinputtag}" style="cursor: pointer;"> Delete</span>
                        </div>
                        &nbsp;  
                        <textarea class="mymce textarea_question question" data-status="objective" rows="3" cols="80" name="area"></textarea>

                        <div class="row mx-3" style="padding: 20px;">
                            <div class="col-5 align-items-center abba_items_amt_add_single">
                                <h6> Option A </h6>
                                <textarea class="mymce option1" rows="4" cols="20" name="area"></textarea>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>

                            <div class="col-5 align-items-center abba_items_amt_add_single">
                                <h6> Option B </h6>
                                <textarea class="mymce option2" rows="4" cols="20" name="area"></textarea>
                            </div>
                        </div>

                        <div class="row mx-3" style="padding: 20px;">
                            <div class="col-5 align-items-center abba_items_amt_add_single">
                                <h6> Option C </h6>
                                <textarea class="mymce option3" rows="4" cols="20" name="area"></textarea>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>

                            <div class="col-5 align-items-center abba_items_amt_add_single">
                                <h6> Option D </h6>
                                <textarea class="mymce option4" rows="4" cols="20" name="area"></textarea>
                            </div>
                        </div>

                        <div class="row mx-4 mb-4">
                            <div class="col-6" style="padding-left: 35px;">
                                <select class="form-select answerselected form-select-sm ekeneselectedanswer" aria-label=".form-select-sm example" style="width: 180px;">
                                    <option value="NULL">Answer</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </div>
                        </div>
                      </div>`;

                        $('#ekeneloadappededinputhere').append(ekene_objectivequestion);
                        $('.mymce').summernote();

                        $('#ekeneloadobjectiveappendquestion').val(ekeneloadinputtag);
                    }
               
             } 

           

         


        }
    });




    $("body").on('click', '#pros_load_import_question', function () {

                var usertype = $("#user_type").val();
                var user_id = $("#user_id").val();

                

                var campusid = $("#ekene_display_campus_for_create_class  option:selected").val();
                var instutiton = $(".abba-change-institution option:selected").val();
                var class_id = $("#ekene_display_section_for_display_class option:selected").val();
                var subject_id = $("#ekene_display_subject_class option:selected").val();
                var select_question_type = $("#select_question_type option:selected").val();
                var select_question_category = $("#select_question_category option:selected").val();
                var ekene_title = $("#ekene_title").val();
   

            

               $('#display_import').html('<div class="text-center p-5"> <span class="spinner-border spinner-border-lg" role="status" aria-hidden="true" style="color:#007ffb;"></span></div>');

          
    
            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/assignment/import_questionbank.php",
                data: {
                    user_id: user_id,
                    campusid: campusid,
                    usertype: usertype,
                    ekene_title: ekene_title,
                    class_id: class_id,
                    subject_id: subject_id,
                    select_question_category: select_question_category,
                    select_question_type: select_question_type,
                    instutiton: instutiton
                },
            
                success: function (output) { 

                  
                   
                
                    $('#display_import').html(output);
                    $('#load_import_question').text('Load');
                
            
                }
            });





    });


    $('body').on('click', '#add_button', function () {

        $('.submitquestion').prop('disabled', false);
        $('#add_button').html('<center><i class="fa fa-spinner fa-spin"></i></center>');
                    

        $.each($(".question_id:checked"), function () {

            var ekene_qustion_id = $(this).val();

            var ekene_qustion = $('.question' + ekene_qustion_id).text();
            var ekene_optionA = $('.optionA' + ekene_qustion_id).text();
            var ekene_optionB = $('.optionB' + ekene_qustion_id).text();
            var ekene_optionC = $('.optionC' + ekene_qustion_id).text();
            var ekene_optionD = $('.optionD' + ekene_qustion_id).text();
            var ekene_category = $('.category' + ekene_qustion_id).text();
            var ekene_Answer = $('.Answer' + ekene_qustion_id).text();
    
            if (ekene_category == 'Theory') {

                var hidd1 = $("#hidd1").val();
    
                if (hidd1 == 1) {
                    $("#ekenetheorynorecordfoundcontent").empty();
                }
                var ekeneloadinputtag = parseInt($('#ekeneloadtheoryappendquestion').val());

                ekeneloadinputtag++;
                var existingQuestion = $('.textarea_questiontheory.question' + ekene_qustion_id);

                if (!existingQuestion.length) {

                        var ekene_theoryquestion = `<div style="color: black;"class="ekeneremoveappendentheory${ekeneloadinputtag}">
                            <h3 class="ekene_general_class_remove_inputtheory ekenetheoryquest"> Question ${ekeneloadinputtag} </h3>
                            <div class="row" align="right">
                                <span class="fa fa-trash text-danger remove_appendformbtn col-12  ekene_delete_jsontheorycontent" data-id="${ekeneloadinputtag}" style="cursor: pointer;"> Delete</span>
                            </div>
                            &nbsp; <textarea class="mymce textarea_questiontheory question${ekene_qustion_id}" data-status="Theory" rows="3" cols="80" name="area">${ekene_qustion}</textarea>
                        </div>`;
                        $('#ekeneloadtheoryappendquestion').val(ekeneloadinputtag);
                        $('#ekeneloadappededinputheretheory').append(ekene_theoryquestion);
                    
                        $('.mymce').summernote();
                }       
            } else {
             
                   
                var hidd = $("#hidd").val();
    
                if (hidd == 1) {

                    $("#ekehidehidecontentnorecord").empty();
                }

                 var ekeneloadinputtag = parseInt($('#ekeneloadobjectiveappendquestion').val());

                        ekeneloadinputtag++;

                             var existingQuestion = $('.textarea_question.question' + ekene_qustion_id);

                        if (!existingQuestion.length) {
                        
                                var ekene_objectivequestion = `<div style="color: black;"class="ekeneremoveappendenobj${ekeneloadinputtag}">
                                    <h3 class="ekene_general_class_remove_inputtheory   ekeneupdateobjectquestion"> Question ${ekeneloadinputtag}  </h3>
                                    <div class="row" align="right">
                                        <span class="fa fa-trash text-danger remove_appendformbtn col-12 ekene_delete_jsontheorycontentobj" data-id="${ekeneloadinputtag}" style="cursor: pointer;"> Delete</span>
                                    </div>
                                    &nbsp;
                                    <textarea class="mymce textarea_question question1${ekene_qustion_id}" data-status="objective" rows="3" cols="80" name="area">${ekene_qustion}</textarea>
                    
                                    <div class="row mx-3" style="padding: 20px;">
                                        <div class="col-5 align-items-center abba_items_amt_add_single">
                                            <h6> Option A </h6>
                                            <textarea class="mymce option1 optionA${ekene_qustion_id}" rows="4" cols="20" name="area">${ekene_optionA}</textarea>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </div>
                    
                                        <div class="col-5 align-items-center abba_items_amt_add_single">
                                            <h6> Option B </h6>
                                            <textarea class="mymce option2 optionB${ekene_qustion_id}" rows="4" cols="20" name="area">${ekene_optionB}</textarea>
                                        </div>
                                    </div>
                    
                                    <div class="row mx-3" style="padding: 20px;">
                                        <div class="col-5 align-items-center abba_items_amt_add_single">
                                            <h6> Option C </h6>
                                            <textarea class="mymce option3 optionC${ekene_qustion_id}" rows="4" cols="20" name="area">${ekene_optionC}</textarea>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </div>
                    
                                        <div class="col-5 align-items-center abba_items_amt_add_single">
                                            <h6> Option D </h6>
                                            <textarea class="mymce option4 optionD${ekene_qustion_id}" rows="4" cols="20" name="area">${ekene_optionD}</textarea>
                                        </div>
                                    </div>
                    
                                    <div class="row mx-4 mb-4">
                                        <div class="col-6" style="padding-left: 35px;">
                                            <select class="form-select answerselected form-select-sm ekeneselectedanswer${ekene_qustion_id}" aria-label=".form-select-sm example" style="width: 180px;">
                                                <option value="NULL">Answer</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                            </select>
                                        </div>
                                    </div>
                                
                                </div>`;
                                    
                                    
                                        $('#ekeneloadappededinputhere').append(ekene_objectivequestion);
                                    
                                
                                    
                            
                                $('.ekeneselectedanswer' + ekene_qustion_id).val(ekene_Answer);
                                $('#ekeneloadobjectiveappendquestion').val(ekeneloadinputtag);
                        }
            }
           
        });
                

    
        $('#add_button').text('Next');
        $('.mymce').summernote();
       
        $('#ekene-import-questionmodal').modal("hide");
    
        $('#ekene-import-questionmodal').on('hidden.bs.modal', function () {
            $('#ekene-setassignmentmodal').modal('show');
        });
       

    });
    // instrcution textarea
    $(document).ready(function() {
        $('.submitquestion').prop('disabled', true);
          var instruction =  ` 
          <h3 >Instruction (Optional)</h3>
          <textarea class="mymce" id="ekene_instrution" rows="3" cols="80" name="area"></textarea>`;
          $('#insrtuction_div').html(instruction);
          $('.mymce').summernote();
    });


    //Ekene del Objective Question

    $('body').on('click', '.ekene_delete_jsontheorycontentobj', function () { 


            var datatagid = $(this).data('id');

            $('.ekeneremoveappendenobj'+ datatagid).remove();


            var ekeneinpuupdate = $('#ekeneloadobjectiveappendquestion').val();
            ekeneinpuupdate--;
            $('#ekeneloadobjectiveappendquestion').val(ekeneinpuupdate);


             var countnum = 0;
            

            $.each($(".ekeneupdateobjectquestion"), function () {

                countnum++;
               var updatenum =  $(this).html('Question '+ countnum);
                
            });

         if(countnum == 0)
         {
            $("#ekehidehidecontentnorecord").fadeIn();

         }

           

            
    });



//ekene del theory question

$('body').on('click', '.ekene_delete_jsontheorycontent', function () { 


    var datatagid = $(this).data('id');

    $('.ekeneremoveappendentheory'+ datatagid).remove();


    var ekeneinpuupdate = $('#ekeneloadtheoryappendquestion').val();
    ekeneinpuupdate--;
    $('#ekeneloadtheoryappendquestion').val(ekeneinpuupdate);


     var countnum = 0;
    

    $.each($(".ekenetheoryquest"), function () {

        countnum++;
       var updatenum =  $(this).html('Question '+ countnum);
        
    });

 if(countnum == 0)
 {
    $("#ekenetheorynorecordfoundcontent").fadeIn();

 }

   

    
});


    function escapeSpecialCharacters(text) {
        // Replace special characters with their HTML entities
        return text.replace(/[&<>"'/]/g, function (match) {
            return {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#39;',
                '/': '&#x2F;'
            }[match];
        });
    }

    function escapeSpecialCharacters(text) {
        // Replace special characters with their HTML entities
        return text.replace(/[&<>"'/]/g, function (match) {
            return {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#39;',
                '/': '&#x2F;'
            }[match];
        });
    }

    // Example usage with jQuery:
    $(document).ready(function() {
        $('input').each(function() {
            var userInput = $(this).val(); // Get the content of each textarea
            var escapedText = escapeSpecialCharacters(userInput);
            
            // Use escapedText as needed
            console.log(escapedText);
        });
    });


    // Example usage with jQuery:
    $(document).ready(function() {
        $('textarea').each(function() {
            var userInput = $(this).val(); // Get the content of each textarea
            var escapedText = escapeSpecialCharacters(userInput);
            
            // Use escapedText as needed
            console.log(escapedText);
        });
    });

    $('body').on('click', '#ekene_add_question', function () { 


        $('#ekene_add_question').html('<center><i class="fa fa-spinner fa-spin fs-3"></i></center>');
      
        var ekene_import_campus = $('#ekene_display_campus_for_create_class option:selected').val();
        var userID = $('#user_id').val();
        var diplay_class = $('#ekene_display_section_for_display_class').val();
        var usertype = $('#user_type').val();
        var instutition = $(".abba-change-institution option:selected").val();
        var ekene_import_subject = $('#ekene_display_subject_class option:selected').val();
        var ekene_import_title = $('#ekene_title').val();
        var ekene_overall_score = $('#overall_score').val();
        var ekene_overall_score = $('#overall_score').val();

        var ctbornot = $("#cbtornot").val();
        var hidden_date = $("#hidden_date").val();
        var start_time = $("#start_time").val();
        var end_time = $("#end_time").val();
        var startdate = $("#start_date").val();
        var submission = $("#submission_date").val();
        var ekeneinstrution = $("#ekene_instrution").val();

        var prosloadcbtorexamsettingstype = $(".prosassementcategory_create").val();

   

        var timeIN = convertTo12HourFormat(start_time);
        var timeOUT = convertTo12HourFormat(end_time);


        function convertTo12HourFormat(timeValue) {
            var timeParts = timeValue.split(":");
            var hours = parseInt(timeParts[0]);
            var minutes = timeParts[1];

            var amPm = hours >= 12 ? "PM" : "AM";
            hours = hours % 12 || 12;

            var convertedTime = hours + ":" + minutes + " " + amPm;
            return convertedTime;
        }

       
       
            // Arrays to store values
            var textareaquestion = [];
            var textareaquestiontheory = [];
            var optionA = [];
            var optionB = [];
            var optionC = [];
            var optionD = [];
            var Answer = [];
            var assignmenttype = [];
            var assignmenttypefortheory = [];




            
            $.each($(".textarea_questiontheory"), function () {
                var question_check = $(this).val();
                if (question_check == '') {
                    textareaquestiontheory.push('');
                } else {
                    textareaquestiontheory.push(question_check +'###||');
                  
                }
            });

                 $.each($(".textarea_question"), function () {
                var question_check = $(this).val()+'###||';
                if (question_check == '') {
                    textareaquestion.push(question_check || '');
                } else {
                    textareaquestion.push(question_check);
                    assignmenttype.push($(this).data('status'));
                }
            });


            
            $.each($(".option1"), function () {
                var question_option1 = $(this).val()+'###||';
                optionA.push(question_option1 || '');
            });

            $.each($(".option2"), function () {
                var question_option2 = $(this).val()+'###||';
                optionB.push(question_option2 || '');
            });

            $.each($(".option3"), function () {
                var question_option3 = $(this).val()+'###||';
                optionC.push(question_option3 || '');
            });







            $.each($(".option4"), function () {
                var question_option4 = $(this).val()+'###||';

                if (question_option4 === '' || question_option4 === 0) {
                    optionD.push('');
                } else {
                    optionD.push(question_option4);
                }
            });






            $.each($(".answerselected"), function () {
                var question_answerselected = $(this).val();
                Answer.push(question_answerselected || 'NULL');
            });

            var ekeneempty_question = textareaquestion.some(function (value) {
                return value.trim() == '';
            });

            var textareaquestiontheory1 = textareaquestiontheory.some(function (value) {
                return value.trim() == '';
            });
          
            var option1 = optionA.some(function (value) {
                return value.trim() === '';
            });
        
            var option2 = optionB.some(function (value) {
                return value.trim() === '';
            });
        
            var option3 = optionC.some(function (value) {
                return value.trim() === '';
            });
        
            var option4 = optionD.some(function (value) {
                return value.trim() === '';
            });
        
            var optionanswer = Answer.some(function (value) {
                return value.trim() === 'NULL';
           });
            

          
        if (ekeneempty_question) {
            $.wnoty({
                type: 'warning',
                message: "One or more of the Objective question was not Filled..",
                autohideDelay: 5000
            });



            $('#ekene_add_question').html('Submit');
      
        }
        else if (option1) {
    
            $.wnoty({
                type: 'warning',
                message: "Please fill in all the required fields",
                autohideDelay: 5000
            });

            $('#ekene_add_question').html('Submit');
        }
        else if (option2) {
            $.wnoty({
                type: 'warning',
                message: "Please fill in all the required fields",
                autohideDelay: 5000
            });

            $('#ekene_add_question').html('Submit');
        }
        else if (option3) {
            $.wnoty({
                type: 'warning',
                message: "Please fill in all the required fields",
                autohideDelay: 5000
            });
            $('#ekene_add_question').html('Submit');
        }
        else if (option4) {
            $.wnoty({
                type: 'warning',
                message: "Please fill in all the required fields",
                autohideDelay: 5000
            });
            $('#ekene_add_question').html('Submit');
        }
        else if (optionanswer) {
            $.wnoty({
                type: 'warning',
                message: "Please fill in all the required fields",
                autohideDelay: 5000
            });
            $('#ekene_add_question').html('Submit');
        }

        else if (textareaquestiontheory1) {
            $.wnoty({
                type: 'warning',
                message: "One or more of the theory question was not Filled..",
                autohideDelay: 5000
            });
            $('#ekene_add_question').html('Submit');
        }
        
    
        else {
    
    
            textareaquestion = textareaquestion.toString();
            textareaquestiontheory = textareaquestiontheory.toString();
            optionA = optionA.toString();
            optionB = optionB.toString();
            optionC = optionC.toString();
            optionD = optionD.toString();
            Answer = Answer.toString();
            assignmenttype = assignmenttype.toString();
          
    
    
            $.ajax({
                type: "POST",
                url: '../../controller/scripts/owner/assignment/insert_assignment.php',
                data: {
                    ekene_import_campus: ekene_import_campus,
                    userID: userID,
                    diplay_class: diplay_class,
                    instutition: instutition,
                    usertype: usertype,
                    ekene_import_subject: ekene_import_subject,
                    ekene_import_title: ekene_import_title,
                    ctbornot: ctbornot,
                    hidden_date: hidden_date,
                    start_time: start_time,
                    end_time: end_time,
                    submission: submission,
                    startdate: startdate,
                    ekene_overall_score: ekene_overall_score,
                    
                    ekeneinstrution: ekeneinstrution,
                 
                    textareaquestion: textareaquestion,
                    textareaquestiontheory: textareaquestiontheory,
                    optionA: optionA,
                    optionB: optionB,
                    optionC: optionC,
                    assignmenttype: assignmenttype,
                    optionD: optionD,
                    Answer: Answer,
                    prosloadcbtorexamsettingstype:prosloadcbtorexamsettingstype,

                    timeIN:timeIN,
                    timeOUT:timeOUT
                },

                
                success: function (response) {

                    $('#ekene_add_question').html('Submit');

                  

                    $('.submitquestion').prop('disabled', false);
                    
                    if (response == 1) {
                            $.wnoty({
                                type: 'warning',
                                message: "This question and Assignment title Already Exist",
                                autohideDelay: 5000
                            });
                        }
                        else
                        {
                         

                          
                            var jsonDatacate = JSON.parse(response);
                   
               
                            for (var i = 0; i < jsonDatacate.length; i++) {
                             
                              // Access the properties you need here
                      
                              var itemnew = jsonDatacate[i];
                           
                              //  var spotName = item.spot_name;
                               var ParentWhatsappNumbernew = itemnew.ParentWhatsappNumber;
                               var messagenew = itemnew.message;
                               var filniializenew = itemnew.filniialize;
                               var institutioninitionnew = itemnew.institutioninition;
                               var apikeynew = itemnew.apikey;
                               var successnewone = itemnew.successnew;

                            //    var InstitutionEmailnew = itemnew.InstitutionEmail;
                            //    var ParentEmailnew = itemnew.ParentEmail;
                            //    var messageemailnew = itemnew.messageemail;
                            //    var assignmentmessagenew = itemnew.assignmentmessage;
                               
                               
                               if (successnewone == 10)
                                {
                                      $.wnoty({
                                          type: 'success',
                                          message: "Question set successfully.",
                                          autohideDelay: 5000
                  
                                      });
                                      
                                      $("#ekene_select_assignment_class").val(diplay_class);
                                      $("#ekene_select_assignment_subject").val(ekene_import_subject);
                                      $("#ekene_select_assignment_campus").val(ekene_import_campus);
                                        ekeneloadconassignmentcontent();
                                        $("#ekene-setassignmentmodal").modal("hide");
                                    }

                                        var dataToSend = {
                                            number: ParentWhatsappNumbernew,
                                            msg: messagenew,
                                            abba_institution_id: institutioninitionnew,
                                            file: filniializenew,

                                            // senderEmail: InstitutionEmailnew,
                                            // recipientEmail: ParentEmailnew,
                                            // email_content: messageemailnew,
                                            // subject: assignmentmessagenew,
                                            apikey: apikeynew
                                        
                                        };
                              
                            // Make an AJAX request
                            $.ajax({
                                type: 'POST', // or 'GET' depending on your needs
                                url: '../../controller/scripts/owner/assignment/send_whatsappmsg.php',
                                data: dataToSend,
                                
                                success: function(response) {
                                   
                               
                                },
                            
                            });

                       


                          }
              
                        }
                        $('#ekene_add_question').text('Submit');

    
        
    
        
        }

    



             });
       }
});




    // $(document).ready(function() {
    //             ekeneloadconassignmentcontent();
    //  });
    


    $('body').on('click', '#ekene_load_assignment_question', function () { 

        ekeneloadconassignmentcontent();

    });  


   function  ekeneloadconassignmentcontent()
   {

  

        $('#ekene_display_student_behavioural').html('<center><i class="fa fa-spinner fa-spin fs-3"></i></center>');

        var ekene_campus = $('#ekene_select_assignment_campus option:selected').val();
        var userID = $('#user_id').val();
        var diplay_class = $('#ekene_select_assignment_class option:selected').val();
        var usertype = $('#user_type').val();
        var ekene_subject = $('#ekene_select_assignment_subject option:selected').val();


            
        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/assignment/ekene_appendcard.php",
            data: {
   
                ekene_campus: ekene_campus,
        
                diplay_class: diplay_class,
                ekene_subject: ekene_subject
              
            },

            success: function (output) { 
             
          
                
                $('#ekene_display_student_behavioural').html(output);
               
                
            
            },
        });

    }
    
    $('body').on('click', '#ekene_edit_assignmentpencil', function () { 
        var ekene_campusnew = $(this).data("cam");
        var ekene_assignmentid = $(this).data("ass");
        var ekene_title = $(this).data("title");
         $("#eke_hiddeninput").val(ekene_assignmentid);
        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/assignment/ekene_editassignment_one.php",
            data: {
   
             
        
                ekene_campusnew: ekene_campusnew,
                ekene_assignmentid: ekene_assignmentid,
                ekene_title: ekene_title
              
            },

            success: function (output) { 
             
              
                
                $('#ekeneedit_content').html(output);

                var ctbornot = $("#cbtornotedit").val();

                if(ctbornot == "no")
                {
                    $(".ekene_hidecbtcontent").fadeOut();
                    $(".ekene_hidenotcbtcontent").fadeIn();
                }
                else
                {
                    $(".ekene_hidecbtcontent").fadeIn();
                    $(".ekene_hidenotcbtcontent").fadeOut();
                }

               
                $('body').on('change', '#cbtornotedit', function () { 
                    var cbtvalue = $(this).val();

                    if (cbtvalue == "no")
                    {
                        $(".ekene_hidecbtcontent").fadeOut();
                        $(".ekene_hidenotcbtcontent").fadeIn();
                    }
                    else
                    {
                        $(".ekene_hidecbtcontent").fadeIn();
                        $(".ekene_hidenotcbtcontent").fadeOut();
                    }

                });
            
            }
        });

    });
    $('body').on('click', '#eken_edit_assignmenttitle', function () { 

        var ekene_import_campus = $('#ekene_select_assignment_campus option:selected').val();
        var userID = $('#user_id').val();
        var assignmentid = $("#eke_hiddeninput").val();
        var usertype = $('#user_type').val();
       
        var ekene_titleedit = $('#ekene_titleedit').val();
        var overall_scoreedit = $('#overall_scoreedit').val();

        var cbtornotedit = $("#cbtornotedit").val();
        var hidden_dateedit = $("#hidden_dateedit").val();
        var start_timeedit = $("#start_timeedit").val();
        var end_timeedit = $("#end_timeedit").val();
        var start_dateedit = $("#start_dateedit").val();
        var submission_dateedit = $("#submission_dateedit").val();
        var instrcutionedit = $("#instrcutionedit").val();
      


        $.ajax({
            type: "POST",
            url: '../../controller/scripts/owner/assignment/ekene_editassignment_two.php',
            data: {
                ekene_import_campus: ekene_import_campus,
                userID: userID,
                assignmentid: assignmentid,
                usertype: usertype,
                ekene_titleedit: ekene_titleedit,
                overall_scoreedit: overall_scoreedit,
                cbtornotedit: cbtornotedit,
                hidden_dateedit: hidden_dateedit,
                start_timeedit: start_timeedit,
                end_timeedit: end_timeedit,
                start_dateedit: start_dateedit,
                submission_dateedit: submission_dateedit,
                instrcutionedit: instrcutionedit
              
            },

            success: function (response) {

            
              
         
             
                 if (response == 2) {
                     
                     
                     
                    $.wnoty({
                        type: 'success',
                        message: "Edited successfully.",
                        autohideDelay: 5000

                    });
                    
                    $("#edit_assignmenttitle").modal("hide");

                    ekeneloadconassignmentcontent();
                      

                   

                } else {

                    $.wnoty({
                        type: 'danger',
                        message: "Failed",
                        autohideDelay: 5000
                    });
                }
                 


            },


        });


    });
    


// delete assignment=======---
    $("body").on('click', '#ekene_delete_fullassignment', function () {

        var dataassignmentid = $(this).data('id');
    
        var datacampus = $(this).data('cam');
        
    
        $("#dataid").val(dataassignmentid);
        $("#datacam").val(datacampus);
    
    });
    
    $("body").on('click', '#eken_delete_all', function () {

        var userID = $('#user_id').val();
    
        var usertype = $('#user_type').val();

        var deleteid = $("#dataid").val();
    
        var deletecam = $("#datacam").val();
    
        $('#eken_delete_all').html(
            '<div class="spinner-border" role="status">  <span class="visually-hidden">Loading...</span></div>'
        );


        $.ajax({
            type: "POST",
            url: '../../controller/scripts/owner/assignment/delete_assignment.php',
            data: {
                deleteid: deleteid,
                userID: userID,
              
                usertype: usertype,
                
                deletecam: deletecam
              
            },

            success: function (response) {

            
                if (response == 1) {
                    $('#eken_delete_all').html("Delete");
                    $.wnoty({
                        type: 'success',
                        message: "Deleted successfully.",
                        autohideDelay: 5000
    
                    });


                    ekeneloadconassignmentcontent();
                    
                } else 
                {
                    $.wnoty({
                        type: 'danger',
                        message: "Failed",
                        autohideDelay: 5000
                    });
                }
           
            },


        });


    });    

    $("body").on('click', '#ekene_view_fullassignment', function () {
        var assignmentid = $(this).data("id");
        var campusid = $(this).data("cam");
     
        
        $.ajax({
            type: "POST",
            url: '../../controller/scripts/owner/assignment/ekene_view_assignment_one.php',
            data: {
                assignmentid: assignmentid,
               
                
                campusid: campusid
              
            },

            success: function (response) {

             
                var jsonDatacate = JSON.parse(response);
                $('#ekeneloadtheoryappendquestionsjon').val(0);
                $("#ekeneloadappededinputheresavechangetheory").empty();
               
                $('#ekeneloadobjectiveappendquestionsjon').val(0);
                $("#ekeneloadappededinputheresavechangeobjective").empty();
                for (var i = 0; i < jsonDatacate.length; i++) {
                   
                    // Access the properties you need here
            
                    var itemnew = jsonDatacate[i];
                 
                    //  var spotName = item.spot_name;
                     var AssignmentQuestion = itemnew.id;
                     var assignmentquestionid = itemnew.assignmentid;
                     var questionnew = itemnew.question;
                     var optionAnew = itemnew.optionA;
                     var optionBnew = itemnew.optionB;
                     var optionCnew = itemnew.optionC;
                     var optionDnew = itemnew.optionD;
                     var CampusIDnew = itemnew.CampusID;
                     
                     var answernew = itemnew.answer;
                     var AssignmentCategorynew = itemnew.AssignmentCategory;
                     var answerquestionnew = itemnew.answerquestion;

                     $("#datacamid").val(CampusIDnew);
                     $("#dataassignmentquestionid").val(AssignmentQuestion);
                     $("#dataassignmentid").val(assignmentquestionid);
                     
                    
                     
                        
                   

                    if(AssignmentCategorynew == "Theory")
                    {


                        
                        var ekeneloadinputtag = parseInt($('#ekeneloadtheoryappendquestionsjon').val());
                        ekeneloadinputtag++;
                       
                       
                        
                          var ekene_theoryquestion = `<div style="color: black;"class="ekeneremoveappendentheoryjson${ekeneloadinputtag}">
                          <h3 class="ekene_general_class_remove_inputtheory ekenetheoryquestjson"> Question ${ekeneloadinputtag} </h3>
                          <div class="row" align="right">
                              <span class="fa fa-trash text-danger remove_appendformbtn col-12  ekene_delete_jsontheorycontentjson" data-cam="${CampusIDnew}" data-ass="${AssignmentQuestion}" data-status="delete" data-id="${ekeneloadinputtag}" style="cursor: pointer;"> Delete</span>
                          </div>
                          &nbsp; <textarea class="mymce textarea_questiontheory question mb-4 generaledit" data-status="edit" rows="3" cols="80" name="area">${questionnew}</textarea>
                      </div>`;
                      $('#ekeneloadtheoryappendquestionsjon').val(ekeneloadinputtag);
                      $('#ekeneloadappededinputheresavechangetheory').append(ekene_theoryquestion);
                      
                      $('.mymce').summernote();
                           
                       
                       
                        if(answerquestionnew == "dontedit")
                        {
                            $("#ekene_import_questionthoerysavechangequestion").hide();
                                $("#ekene_add_json_theoryquestion").hide();
                                $("#eke_save_changetheory").hide();
                                $(".ekene_delete_jsontheorycontentjson").hide();
                        
                            
                        }else
                        {
                            $("#ekene_import_questionthoerysavechangequestion").show();
                            $("#ekene_add_json_theoryquestion").show();
                            $("#eke_save_changetheory").show();
                            $(".ekene_delete_jsontheorycontentjson").show();
                        }

                        
                     
                    }
                    else
                    {
                        var ekeneloadinputtag = parseInt($('#ekeneloadobjectiveappendquestionsjon').val());
                        ekeneloadinputtag++;
                     

                        var ekene_objectivequestion = `<div style="color: black;"class="ekeneremoveappendenobjjson${ekeneloadinputtag}">
                        <h3 class="ekene_general_class_remove_inputtheory   ekeneupdateobjectquestion"> Question ${ekeneloadinputtag}  </h3>
                        <div class="row" align="right">
                            <span class="fa fa-trash text-danger col-12 ekene_delete_jsoncontentobjjson" data-status="delete" data-cam="${CampusIDnew}" data-ass="${AssignmentQuestion}"   data-id="${ekeneloadinputtag}" style="cursor: pointer;"> Delete</span>
                        </div>
                        &nbsp;
                        <textarea class="mymce objectivetextarea_question generaleditobjective" data-status="edit" rows="3" cols="80" name="area">${questionnew}</textarea>
        
                        <div class="row mx-3" style="padding: 20px;">
                            <div class="col-5 align-items-center abba_items_amt_add_single">
                                <h6> Option A </h6>
                                <textarea class="mymce option1" rows="4" cols="20" name="area">${optionAnew}</textarea>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>
        
                            <div class="col-5 align-items-center abba_items_amt_add_single">
                                <h6> Option B </h6>
                                <textarea class="mymce option2 " rows="4" cols="20" name="area">${optionBnew}</textarea>
                            </div>
                        </div>
        
                        <div class="row mx-3" style="padding: 20px;">
                            <div class="col-5 align-items-center abba_items_amt_add_single">
                                <h6> Option C </h6>
                                <textarea class="mymce option3 " rows="4" cols="20" name="area">${optionCnew}</textarea>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>
        
                            <div class="col-5 align-items-center abba_items_amt_add_single">
                                <h6> Option D </h6>
                                <textarea class="mymce option4 " rows="4" cols="20" name="area">${optionDnew}</textarea>
                            </div>
                        </div>
        
                        <div class="row mx-4 mb-4">
                            <div class="col-6" style="padding-left: 35px;">
                                <select class="form-select answerselected form-select-sm ekeneselectedansweremma${AssignmentQuestion}" aria-label=".form-select-sm example" style="width: 180px;">
                                    <option value="NULL">Answer</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </div>
                        </div>
                    
                    </div>`;
                    $('#ekeneloadobjectiveappendquestionsjon').val(ekeneloadinputtag);
                     $('#ekeneloadappededinputheresavechangeobjective').append(ekene_objectivequestion);
                    

                    $('.mymce').summernote();
                    $('.ekeneselectedansweremma' + AssignmentQuestion).val(answernew);
                   

                           
                        
                    
                  


                    if(answerquestionnew == "dontedit")
                    {




                        

                       $("#ekene_import_questionobjectivesavechangequestion").hide();
                           $("#ekene_add_jsonobjectivequestion").hide();
                           $("#eke_save_changeobjective").hide();
                           $(".ekene_delete_jsoncontentobjjson").hide();
                   
                       
                    }else
                    {
                       $("#ekene_import_questionobjectivesavechangequestion").show();
                       $("#ekene_add_jsonobjectivequestion").show();
                       $("#eke_save_changeobjective").show();
                       $(".ekene_delete_jsoncontentobjjson").show();
                    }

                  }



                }
               
            },


        });


    });


  



  


    $('body').on('click', '#ekene_add_jsonobjectivequestion', function () { 


    var ekeneloadinputtag = parseInt($('#ekeneloadobjectiveappendquestionsjon').val());

        ekeneloadinputtag++;
    


        var hidd = $("#hidd2").val();
      
        if(hidd == 1)
        {
            $("#ekeneloadappededinputheresavechangeobjective").empty();


            var ekene_objectivequestion = `<div style="color: black;"class="ekeneremoveappendenobjjson${ekeneloadinputtag}">
            <h3 class="ekene_general_class_remove_inputtheory   ekeneupdateobjectquestion"> Question ${ekeneloadinputtag}  </h3>
            <div class="row" align="right">
                <span class="fa fa-trash text-danger remove_appendformbtn col-12 ekene_delete_jsoncontentobjjson" data-status="edit"  data-id="${ekeneloadinputtag}" style="cursor: pointer;"> Delete</span>
            </div>
            &nbsp;
            <textarea class="mymce objectivetextarea_question  generaleditobjective" data-status="insert" rows="3" cols="80" name="area"></textarea>

            <div class="row mx-3" style="padding: 20px;">
                <div class="col-5 align-items-center abba_items_amt_add_single">
                    <h6> Option A </h6>
                    <textarea class="mymce option1" rows="4" cols="20" name="area"></textarea>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>

                <div class="col-5 align-items-center abba_items_amt_add_single">
                    <h6> Option B </h6>
                    <textarea class="mymce option2 " rows="4" cols="20" name="area"></textarea>
                </div>
            </div>

            <div class="row mx-3" style="padding: 20px;">
                <div class="col-5 align-items-center abba_items_amt_add_single">
                    <h6> Option C </h6>
                    <textarea class="mymce option3 " rows="4" cols="20" name="area"></textarea>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>

                <div class="col-5 align-items-center abba_items_amt_add_single">
                    <h6> Option D </h6>
                    <textarea class="mymce option4 " rows="4" cols="20" name="area"></textarea>
                </div>
            </div>

            <div class="row mx-4 mb-4">
                <div class="col-6" style="padding-left: 35px;">
                    <select class="form-select answerselected form-select-sm ekeneselectedansweremma" aria-label=".form-select-sm example" style="width: 180px;">
                        <option value="NULL">Answer</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                </div>
            </div>
        
        </div>`;

                $('#ekeneloadappededinputheresavechangeobjective').append(ekene_objectivequestion);
                $('.mymce').summernote();
            }
            else
            {
                var ekene_objectivequestion = `<div style="color: black;"class="ekeneremoveappendenobjjson${ekeneloadinputtag}">
                <h3 class="ekene_general_class_remove_inputtheory   ekeneupdateobjectquestion"> Question ${ekeneloadinputtag}  </h3>
                <div class="row" align="right">
                    <span class="fa fa-trash text-danger remove_appendformbtn col-12 ekene_delete_jsoncontentobjjson" data-status="edit"  data-id="${ekeneloadinputtag}" style="cursor: pointer;"> Delete</span>
                </div>
                &nbsp;
                <textarea class="mymce objectivetextarea_question generaleditobjective" data-status="insert" rows="3" cols="80" name="area"></textarea>
    
                <div class="row mx-3" style="padding: 20px;">
                    <div class="col-5 align-items-center abba_items_amt_add_single">
                        <h6> Option A </h6>
                        <textarea class="mymce option1" rows="4" cols="20" name="area"></textarea>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
    
                    <div class="col-5 align-items-center abba_items_amt_add_single">
                        <h6> Option B </h6>
                        <textarea class="mymce option2 " rows="4" cols="20" name="area"></textarea>
                    </div>
                </div>
    
                <div class="row mx-3" style="padding: 20px;">
                    <div class="col-5 align-items-center abba_items_amt_add_single">
                        <h6> Option C </h6>
                        <textarea class="mymce option3 " rows="4" cols="20" name="area"></textarea>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
    
                    <div class="col-5 align-items-center abba_items_amt_add_single">
                        <h6> Option D </h6>
                        <textarea class="mymce option4 " rows="4" cols="20" name="area"></textarea>
                    </div>
                </div>
    
                <div class="row mx-4 mb-4">
                    <div class="col-6" style="padding-left: 35px;">
                        <select class="form-select answerselected form-select-sm ekeneselectedansweremma" aria-label=".form-select-sm example" style="width: 180px;">
                            <option value="NULL">Answer</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
                </div>
            
            </div>`;

                $('#ekeneloadappededinputheresavechangeobjective').append(ekene_objectivequestion);
                $('.mymce').summernote();
            }


            $('#ekeneloadobjectiveappendquestionsjon').val(ekeneloadinputtag);
                 
     
             


    });
    


    $('body').on('click', '#ekene_add_json_theoryquestion', function () { 


        var hidd1 = $("#hidd12").val();


        var ekeneloadinputtag = parseInt($('#ekeneloadtheoryappendquestionsjon').val());

          ekeneloadinputtag++;
            if(hidd1 == 1)
            {
            
            $("#ekeneloadappededinputheresavechangetheory").empty();
    
            var ekene_theoryquestion = `<div style="color: black;"class="ekeneremoveappendentheoryjson${ekeneloadinputtag}">
            <h3 class="ekene_general_class_remove_inputtheory ekenetheoryquestjson"> Question ${ekeneloadinputtag} </h3>
            <div class="row" align="right">
                <span class="fa fa-trash text-danger  col-12  ekene_delete_jsontheorycontentjson" data-status="edit" data-id="${ekeneloadinputtag}" style="cursor: pointer;"> Delete</span>
            </div>
            &nbsp; <textarea class="mymce textarea_questiontheory question mb-4 generaledit" data-status="insert" rows="3" cols="80" name="area"></textarea>
        </div>`;
        
        $('#ekeneloadappededinputheresavechangetheory').append(ekene_theoryquestion);
        
        $('.mymce').summernote();
            
            }
            else
            {

            
            var ekene_theoryquestion = `<div style="color: black;"class="ekeneremoveappendentheoryjson${ekeneloadinputtag}">
            <h3 class="ekene_general_class_remove_inputtheory ekenetheoryquestjson"> Question ${ekeneloadinputtag} </h3>
            <div class="row" align="right">
                <span class="fa fa-trash text-danger remove_appendformbtn col-12  ekene_delete_jsontheorycontentjson" data-status="edit" data-id="${ekeneloadinputtag}" style="cursor: pointer;"> Delete</span>
            </div>
            &nbsp; <textarea class="mymce textarea_questiontheory question mb-4 generaledit" data-status="insert" rows="3" cols="80" name="area"></textarea>
        </div>`;
        
        $('#ekeneloadappededinputheresavechangetheory').append(ekene_theoryquestion);
        
        $('.mymce').summernote();
                
            }


         $('#ekeneloadtheoryappendquestionsjon').val(ekeneloadinputtag);
         
    });


      // ekene delete objectivejson
    
      $('body').on('click', '.ekene_delete_jsoncontentobjjson', function () { 


        var datatagid = $(this).data('id');
        var datatastatus = $(this).data('status');
        var dataassignmentquestionid = $(this).data('ass');
        var datacampusid = $(this).data('cam');
        $("#kdataid").val(datatagid);
       $("#kdatacamid").val(datacampusid);
       $("#dataassignmentquestionid").val(dataassignmentquestionid);
      
        if(datatastatus == "delete")
        {
          

            $('#ekeneloaddeletemodaljson').modal('show');
            $('#ekene_save_change').css('z-index', 1040); // Increase z-index of first modal
                        // Reset z-index of first modal when second modal is closed
                $('#ekeneloaddeletemodaljson').on('hidden.bs.modal', function () {
                    $('#ekene_save_change').css('z-index', 1050); // Reset z-index of firstmodal
            });


            
        }
        else
        {
             
        $('.ekeneremoveappendenobjjson'+ datatagid).remove();
    
    
        var ekeneinpuupdate = $('#ekeneloadobjectiveappendquestionsjon').val();
        ekeneinpuupdate--;
        $('#ekeneloadobjectiveappendquestionsjon').val(ekeneinpuupdate);
    
    
         var countnum = 0;
        
    
        $.each($(".ekeneupdateobjectquestion"), function () {
    
            countnum++;
           var updatenum =  $(this).html('Question '+ countnum);
            
        });
    
        }
    
    
    
       
    
        
    });
    

    $('body').on('click', '#eken_delete_eachjsonquestion', function () { 

   var assignmentquestionid = $("#dataassignmentquestionid").val();
   var campusid = $("#kdatacamid").val();
   var datatagid = $("#kdataid").val();

   $.ajax({
    type: "POST",
    url: '../../controller/scripts/owner/assignment/delete_assignment_one.php',
    data: {
        assignmentquestionid: assignmentquestionid,
        campusid: campusid
      
    },

    success: function (response) {

   

        if (response == 1) {
            $('#eken_delete_all').html("Delete");
            $.wnoty({
                type: 'success',
                message: "Deleted successfully.",
                autohideDelay: 5000

            });
                   $("#ekeneloaddeletemodaljson").modal("hide");


            $('.ekeneremoveappendenobjjson'+ datatagid).remove();
    
    
            var ekeneinpuupdate = $('#ekeneloadobjectiveappendquestionsjon').val();
            ekeneinpuupdate--;
            $('#ekeneloadobjectiveappendquestionsjon').val(ekeneinpuupdate);
        
        
             var countnum = 0;
            
        
            $.each($(".ekeneupdateobjectquestion"), function () {
        
                countnum++;
               var updatenum =  $(this).html('Question '+ countnum);
                
            });
          
            
        } else 
        {
            $.wnoty({
                type: 'danger',
                message: "Failed",
                autohideDelay: 5000
            });
        }
   
    },


});

    });
// end of objectivejson delete



    // ekene delete theoryjson
        
    $('body').on('click', '.ekene_delete_jsontheorycontentjson', function () { 


        var datatagid = $(this).data('id');
        var datatastatus = $(this).data('status');
        var dataassignmentquestionid = $(this).data('ass');
        var datacampusid = $(this).data('cam');
        $("#kdataidtheory").val(datatagid);
        
        $("#kdatacamidtheory").val(datacampusid);
        
        $("#dataassignmentquestionidtheory").val(dataassignmentquestionid);
        
        if(datatastatus == "delete")
        {
            $('#ekeneloaddeletemodaljsontheory').modal('show');
            $('#ekene_save_change').css('z-index', 1040); // Increase z-index of first modal
                        // Reset z-index of first modal when second modal is closed
                $('#ekeneloaddeletemodaljsontheory').on('hidden.bs.modal', function () {
                    $('#ekene_save_change').css('z-index', 1050); // Reset z-index of firstmodal
            });


        }
        else
        {
            $('.ekeneremoveappendentheoryjson'+ datatagid).remove();


            var ekeneinpuupdate = $('#ekeneloadtheoryappendquestionsjon').val();
            ekeneinpuupdate--;
            $('#ekeneloadtheoryappendquestionsjon').val(ekeneinpuupdate);
        
        
            var countnum = 0;
            
        
            $.each($(".ekenetheoryquestjson"), function () {
        
                countnum++;
            var updatenum =  $(this).html('Question '+ countnum);
                
            });
        
        }

    });

    
    $('body').on('click', '#eken_delete_eachjsonquestiontheory', function () { 

        var assignmentquestionid = $("#dataassignmentquestionidtheory").val();
         var campusid = $("#kdatacamidtheory").val();
         var datatagid = $("#kdataidtheory").val();


         $.ajax({
                type: "POST",
                url: '../../controller/scripts/owner/assignment/delete_assignment_two.php',
                data: {
                    assignmentquestionid: assignmentquestionid,
                    campusid: campusid
                  
                },
            
                success: function (response) {
            
               
               
                    if (response == 1) {
                        $('#eken_delete_all').html("Delete");
                        $.wnoty({
                            type: 'success',
                            message: "Deleted successfully.",
                            autohideDelay: 5000
            
                        });
                                $("#ekeneloaddeletemodaljsontheory").modal("hide");
            
                                $('.ekeneremoveappendentheoryjson'+ datatagid).remove();


                                var ekeneinpuupdate = $('#ekeneloadtheoryappendquestionsjon').val();
                                ekeneinpuupdate--;
                                $('#ekeneloadtheoryappendquestionsjon').val(ekeneinpuupdate);
                            
                            
                                var countnum = 0;
                                
                            
                                $.each($(".ekenetheoryquestjson"), function () {
                            
                                    countnum++;
                                var updatenum =  $(this).html('Question '+ countnum);
                                    
                                });
                            
                      
                      
                        
                    } else 
                    {
                        $.wnoty({
                            type: 'danger',
                            message: "Failed",
                            autohideDelay: 5000
                        });
                    }
               
                },
            
            
            });
            
         
  });
//   end of theoryjson delete 


// ekene import only objectivequestion
$('body').on('click', '#ekene_import_questionobjectivesavechangequestion', function () { 

    $("#ekene-import-questionmodalobjective").modal("show");

    // Set up an event listener for the hidden.bs.modal event
    $('#ekene-import-questionmodalobjective').on('hidden.bs.modal', function (e) {
      // Show the second modal when the first modal is hidden
      $("#ekene_save_change").modal("show");
    });

});
$('body').on('click', '#load_import_questionobjective', function () { 

        var campusid = $("#ekene_select_assignment_campus option:selected").val();
        var class_id = $("#ekene_select_assignment_class option:selected").val();
        var select_question_type = $("#select_question_typeobjective option:selected").val();
        var select_question_category = $("#select_question_categoryobjective option:selected").val();
        
        $('#load_import_questionobjective').html('<div class="text-center p-5"> <span class="spinner-border spinner-border-lg" role="status" aria-hidden="true" style="color:#007ffb;"></span></div>');

          
    
   
    
    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/assignment/import_questionbank_objective.php",
        data: {
      
            campusid: campusid,
        
          
            class_id: class_id,
       
            select_question_category: select_question_category,
            select_question_type: select_question_type
           
        },
    
        success: function (output) { 


            
       
           
             $('#display_importobjective').html(output);
            $('#load_import_questionobjective').text('Load');
           
      
        }
    });

});


$('body').on('click', '#add_buttonobjective', function () { 
    $('#add_buttonobjective').html('<center><i class="fa fa-spinner fa-spin"></i></center>');

    var ekeneloadinputtag = parseInt($('#ekeneloadobjectiveappendquestionsjon').val());

    $.each($(".question_id:checked"), function () {
        var ekene_qustion_id = $(this).val();
        var ekene_qustion = $('.question' + ekene_qustion_id).text();
        var ekene_optionA = $('.optionA' + ekene_qustion_id).text();
        var ekene_optionB = $('.optionB' + ekene_qustion_id).text();
        var ekene_optionC = $('.optionC' + ekene_qustion_id).text();
        var ekene_optionD = $('.optionD' + ekene_qustion_id).text();
        // var ekene_category = $('.category' + ekene_qustion_id).text();
        var ekene_Answer = $('.Answer' + ekene_qustion_id).text();

    
        var hidd = $("#hidd2").val();
    
            
        if (hidd == 1) {
            $("#ekeneloadappededinputheresavechangeobjective").empty();
        }
      

                ekeneloadinputtag++;
                    var existingQuestion = $('.textarea_questionobjective.question' + ekene_qustion_id);
                    
                if (!existingQuestion.length) {
                
                        var ekene_objectivequestion = `<div style="color: black;"class="ekeneremoveappendenobjjson${ekeneloadinputtag}">
                            <h3 class="ekene_general_class_remove_inputtheory   ekeneupdateobjectquestion"> Question ${ekeneloadinputtag}  </h3>
                            <div class="row" align="right">
                            <span class="fa fa-trash text-danger col-12 ekene_delete_jsoncontentobjjson" data-status="edit"    data-id="${ekeneloadinputtag}" style="cursor: pointer;"> Delete</span>
                            </div>
                            &nbsp;
                            <textarea class="mymce textarea_questionobjective  question1${ekeneloadinputtag} generaleditobjective" data-status="insert" rows="3" cols="80" name="area">${ekene_qustion}</textarea>
            
                            <div class="row mx-3" style="padding: 20px;">
                                <div class="col-5 align-items-center abba_items_amt_add_single">
                                    <h6> Option A </h6>
                                    <textarea class="mymce option1 optionA${ekeneloadinputtag}" rows="4" cols="20" name="area">${ekene_optionA}</textarea>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
    
                        <div class="col-5 align-items-center abba_items_amt_add_single">
                            <h6> Option B </h6>
                            <textarea class="mymce option2 optionB${ekeneloadinputtag}" rows="4" cols="20" name="area">${ekene_optionB}</textarea>
                        </div>
                    </div>
    
                    <div class="row mx-3" style="padding: 20px;">
                        <div class="col-5 align-items-center abba_items_amt_add_single">
                            <h6> Option C </h6>
                            <textarea class="mymce option3 optionC${ekeneloadinputtag}" rows="4" cols="20" name="area">${ekene_optionC}</textarea>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
    
                        <div class="col-5 align-items-center abba_items_amt_add_single">
                            <h6> Option D </h6>
                            <textarea class="mymce option4 optionD${ekeneloadinputtag}" rows="4" cols="20" name="area">${ekene_optionD}</textarea>
                        </div>
                    </div>
    
                    <div class="row mx-4 mb-4">
                        <div class="col-6" style="padding-left: 35px;">
                            <select class="form-select answerselected form-select-sm ekeneselectedansweremma${ekeneloadinputtag}" aria-label=".form-select-sm example" style="width: 180px;">
                                <option value="NULL">Answer</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>
                    </div>
                
                </div>`;
                    
                $('#ekeneloadobjectiveappendquestionsjon').val(ekeneloadinputtag);
            
                        $('#ekeneloadappededinputheresavechangeobjective').append(ekene_objectivequestion);
                    
                
                 
                $('.ekeneselectedansweremma' + ekene_qustion_id).val(ekene_Answer);
              
        }


        
      
    });

    $('#add_buttonobjective').text('Next');
    $('.mymce').summernote();

    $('#ekene-import-questionmodalobjective').modal("hide");

    $('#ekene-import-questionmodalobjective').on('hidden.bs.modal', function () {
        $('#ekene_save_change').modal('show');
    });


});
// end of importobjectivejson


// import theory json 
$('body').on('click', '#ekene_import_questionthoerysavechangequestion', function () { 

    $("#ekene-import-questionmodaltheory").modal("show");

    // Set up an event listener for the hidden.bs.modal event
    $('#ekene-import-questionmodaltheory').on('hidden.bs.modal', function (e) {
      // Show the second modal when the first modal is hidden
      $("#ekene_save_change").modal("show");
    });

});

$('body').on('click', '#load_import_questiontheory', function () { 

    var campusid = $("#ekene_select_assignment_campus option:selected").val();
    var class_id = $("#ekene_select_assignment_class option:selected").val();
    var select_question_type = $("#select_question_typetheory option:selected").val();
    var select_question_category = $("#select_question_categorytheory option:selected").val();
     
    
   
     $('#load_import_questiontheory').html('<div class="text-center p-5"> <span class="spinner-border spinner-border-lg" role="status" aria-hidden="true" style="color:#007ffb;"></span></div>');
    
    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/assignment/import_assignment_theory.php",
        data: {
      
            campusid: campusid,
        
          
            class_id: class_id,
       
            select_question_category: select_question_category,
            select_question_type: select_question_type
           
        },
    
        success: function (output) { 
   
           
             $('#display_importtheory').html(output);
            $('#load_import_questiontheory').text('Load');
           
      
        }
    });

});


$('body').on('click', '#add_buttontheory', function () { 
    $('#add_buttontheory').html('<center><i class="fa fa-spinner fa-spin"></i></center>');

    $.each($(".question_id:checked"), function () {
        var ekene_qustion_id = $(this).val();
        var ekene_qustion = $('.question' + ekene_qustion_id).text();


        var hidd1 = $("#hidd12").val();


        var ekeneloadinputtag = parseInt($('#ekeneloadtheoryappendquestionsjon').val());

        ekeneloadinputtag++;
            if(hidd1 == 1)
            {
            
            $("#ekeneloadappededinputheresavechangetheory").empty();
    
            var ekene_theoryquestion = `<div style="color: black;"class="ekeneremoveappendentheoryjson${ekeneloadinputtag}">
            <h3 class="ekene_general_class_remove_inputtheory ekenetheoryquestjson"> Question ${ekeneloadinputtag} </h3>
            <div class="row" align="right">
                <span class="fa fa-trash text-danger remove_appendformbtn col-12  ekene_delete_jsontheorycontentjson"  data-status="edit" data-id="${ekeneloadinputtag}" style="cursor: pointer;"> Delete</span>
            </div>
            &nbsp; <textarea class="mymce textarea_questiontheory question${ekeneloadinputtag} mb-4 generaledit" data-status="insert" rows="3" cols="80" name="area">${ekene_qustion}</textarea>
        </div>`;
        
        $('#ekeneloadappededinputheresavechangetheory').append(ekene_theoryquestion);
        
        $('.mymce').summernote();
            
            }
            else
            {

            
            var ekene_theoryquestion = `<div style="color: black;"class="ekeneremoveappendentheoryjson${ekeneloadinputtag}">
            <h3 class="ekene_general_class_remove_inputtheory ekenetheoryquestjson"> Question ${ekeneloadinputtag} </h3>
            <div class="row" align="right">
                <span class="fa fa-trash text-danger remove_appendformbtn col-12  ekene_delete_jsontheorycontentjson" data-status="edit" data-id="${ekeneloadinputtag}" style="cursor: pointer;"> Delete</span>
            </div>
            &nbsp; <textarea class="mymce textarea_questiontheory question${ekeneloadinputtag} mb-4 generaledit" data-status="insert" rows="3" cols="80" name="area">${ekene_qustion}</textarea>
        </div>`;
                
                $('#ekeneloadappededinputheresavechangetheory').append(ekene_theoryquestion);
                
                $('.mymce').summernote();
                
            }


         $('#ekeneloadtheoryappendquestionsjon').val(ekeneloadinputtag);

    });

   
    $('#add_buttontheory').text('Next');
    $('.mymce').summernote();

    $('#ekene-import-questionmodaltheory').modal("hide");

    $('#ekene-import-questionmodaltheory').on('hidden.bs.modal', function () {
        $('#ekene_save_change').modal('show');
    });


});
// the end of theory importjson
$('body').on('click', '#eke_save_changeobjective', function () { 

    $('#eke_save_changeobjective').html('<center><i class="fa fa-spinner fa-spin"></i></center>');


    var campusid = $("#ekene_select_assignment_campus option:selected").val();
    var class_id = $("#ekene_select_assignment_class option:selected").val();
    var assignmentid = $("#dataassignmentid").val();
    var usertype = $('#user_type').val();
    var userid = $('#user_id').val();
    var ekene_subject = $('#ekene_select_assignment_subject option:selected').val();




    

    // Arrays to store values
    var textareaquestionobjective = [];

    var optionA = [];
    var optionB = [];
    var optionC = [];
    var optionD = [];
    var Answer = [];






// if in case i start to have issues here remeber the student foreach u did

    $.each($(".generaleditobjective"), function () {
        var question_check = $(this).val()+'###||';
        if (question_check == '') {
            textareaquestionobjective.push(question_check || '');
        } else {
            textareaquestionobjective.push(question_check);
            
        }
    });


    
    $.each($(".option1"), function () {
        var question_option1 = $(this).val()+'###||';
        optionA.push(question_option1 || '');
    });

    $.each($(".option2"), function () {
        var question_option2 = $(this).val()+'###||';
        optionB.push(question_option2 || '');
    });

    $.each($(".option3"), function () {
        var question_option3 = $(this).val()+'###||';
        optionC.push(question_option3 || '');
    });







        $.each($(".option4"), function () {
            var question_option4 = $(this).val()+'###||';

            if (question_option4 === '' || question_option4 === 0) {
                optionD.push('');
            } else {
                optionD.push(question_option4);
            }
        });



            $.each($(".answerselected"), function () {
                var question_answerselected = $(this).val();
                Answer.push(question_answerselected || 'NULL');
           
            });
           
           



            var ekeneempty_question = textareaquestionobjective.some(function (value) {
                return value.trim() == '';
            });


            var option1 = optionA.some(function (value) {
                return value.trim() === '';
            });

            var option2 = optionB.some(function (value) {
                return value.trim() === '';
            });

            var option3 = optionC.some(function (value) {
                return value.trim() === '';
            });

            var option4 = optionD.some(function (value) {
                return value.trim() === '';
            });

            var optionanswer = Answer.some(function (value) {
                return value.trim() === 'NULL';
            });
            


            if (ekeneempty_question) {
            $.wnoty({
                type: 'warning',
                message: "One or more of the Objective question was not Filled..",
                autohideDelay: 5000
            });
            $('#eke_save_changeobjective').text('save change');
            }
            else if (option1) {

            $.wnoty({
                type: 'warning',
                message: "Please fill in all the required fields",
                autohideDelay: 5000
            });
            $('#eke_save_changeobjective').text('save change');
            }
            else if (option2) {
            $.wnoty({
                type: 'warning',
                message: "Please fill in all the required fields",
                autohideDelay: 5000
            });
            $('#eke_save_changeobjective').text('save change');
            }
            else if (option3) {
            $.wnoty({
                type: 'warning',
                message: "Please fill in all the required fields",
                autohideDelay: 5000
            });
            $('#eke_save_changeobjective').text('save change');
            }
            else if (option4) {
            $.wnoty({
                type: 'warning',
                message: "Please fill in all the required fields",
                autohideDelay: 5000
            });
            $('#eke_save_changeobjective').text('save change');
            }
            else if (optionanswer) {
            $.wnoty({
                type: 'warning',
                message: "Please fill in all the required fields",
                autohideDelay: 5000
            });
            $('#eke_save_changeobjective').text('save change');
            }
            else
            {
                textareaquestionobjective = textareaquestionobjective.toString();
          
                optionA = optionA.toString();
                optionB = optionB.toString();
                optionC = optionC.toString();
                optionD = optionD.toString();
                Answer = Answer.toString();


                $.ajax({
                    type: "POST",
                    url: '../../controller/scripts/owner/assignment/ekene_editorinsert_one.php',
                    data: {
                        campusid: campusid,
                        class_id: class_id,
                        assignmentid: assignmentid,
                        textareaquestionobjective: textareaquestionobjective,
                    
                        
                
                     
                        ekene_subject: ekene_subject,
                        usertype: usertype,
                        userid: userid,
                        optionA: optionA,
                        optionB: optionB,
                        optionC: optionC,
                        optionD: optionD,
                        Answer: Answer
                    },

                    success: function (response) {

                     $('#eke_save_changeobjective').html('Save');


                    

                       
                

                        if (response == 1) {
                            $.wnoty({
                                type: 'success',
                                message: "Save change successfully..",
                                autohideDelay: 5000
                            });
                            $('#eke_save_changeobjective').text('save change');

                        } else {

                            $.wnoty({
                                type: 'danger',
                                message: "Failed",
                                autohideDelay: 5000
                            });
                            $('#eke_save_changeobjective').text('save change');
                        }
                        


                    },


                });

            }


 });




 $('body').on('click', '#eke_save_changetheory', function () { 
     
    $('#eke_save_changetheory').html('<center><i class="fa fa-spinner fa-spin"></i></center>');
    var campusid = $("#ekene_select_assignment_campus option:selected").val();
    var class_id = $("#ekene_select_assignment_class option:selected").val();
   var assignmentid = $("#dataassignmentid").val();
   var usertype = $('#user_type').val();
   var userid = $('#user_id').val();
   var ekene_subject = $('#ekene_select_assignment_subject option:selected').val();

   var textareaquestiontheory = [];

        $.each($(".generaledit"), function () {
                var question_check = $(this).val()+'###||';
                if (question_check == '') {
                    textareaquestiontheory.push(question_check || '');
                } else {
                    textareaquestiontheory.push(question_check);
                    
                }
        });

        var ekeneempty_question = textareaquestiontheory.some(function (value) {
            return value.trim() == '';
        });

        if (ekeneempty_question) {
            $.wnoty({
                type: 'warning',
                message: "One or more of the Theory question was not Filled..",
                autohideDelay: 5000
            });
            $('#eke_save_changetheory').text('save change');
        }
        else
        {
            textareaquestiontheory = textareaquestiontheory.toString();

            $.ajax({
                type: "POST",
                url: '../../controller/scripts/owner/assignment/ekene_editorinsert_two.php',
                data: {
                    campusid: campusid,
                    class_id: class_id,
                    assignmentid: assignmentid,
                    textareaquestiontheory: textareaquestiontheory,
                
                    ekene_subject: ekene_subject,
                    usertype: usertype,
                    userid: userid
                
                },

                success: function (response) {


                
            
                      
                    if (response == 1) {
                        $.wnoty({
                            type: 'success',
                            message: "Save change successfully..",
                            autohideDelay: 5000
                        });
                        $('#eke_save_changetheory').text('save change');

                    } else {

                        $.wnoty({
                            type: 'danger',
                            message: "Failed",
                            autohideDelay: 5000
                        });
                        $('#eke_save_changetheory').text('save change');
                    }
                    


                },


            });

        }

 });

 $('body').on('click', '#ekene_download_fullassignment', function () { 

        var campusid =  $(this).data("cam");
        var assignmentsettingsid = $(this).data("id");
        var ekene_subject = $('#ekene_select_assignment_subject option:selected').val();
        var instutition = $(".abba-change-institution option:selected").val();
        var class_id = $("#ekene_select_assignment_class option:selected").val();
        
        $('#downloadassignmentekene').html('<div class="text-center p-5"> <span class="spinner-border spinner-border-lg" role="status" aria-hidden="true" style="color:#007ffb;"></span></div>');

        $.ajax({
            type: "POST",
            url: '../../controller/scripts/owner/assignment/ekene_dowload_assignment.php',
            data: {
                campusid: campusid,
                instutition: instutition,
                assignmentsettingsid: assignmentsettingsid,
                ekene_subject: ekene_subject,
                class_id: class_id
             
            },

            success: function (response) {


                  $("#downloadassignmentekene").html(response);
                 

                    // if (response == 1) {
                    //     $.wnoty({
                    //         type: 'success',
                    //         message: "Save change successfully..",
                    //         autohideDelay: 5000
                    //     });
                    //     $('#eke_save_changetheory').text('save change');

                    // } else {

                    //     $.wnoty({
                    //         type: 'danger',
                    //         message: "Failed",
                    //         autohideDelay: 5000
                    //     });
                    //     $('#eke_save_changetheory').text('save change');
                    // }
                


            },

       });
    });

    
    

    $('body').on('click', '#ekene_print', function () {

               

                        var element = document.getElementById('downloadassignmentekene');

                        element.style.paddingRight = '40px';
                        element.style.paddingLeft = '40px';
                        var prosloadname = 'ASSIGNMENT QUESTION';
                        // Clone the content and manipulate the clone
                        var clone = element.cloneNode(true);

                        // Remove elements to exclude from the clone
                        $(clone).find('.proloadshowanserbtnforview').remove();
                        // Generate PDF from the modified clone
                        html2pdf().from(clone).output('blob').then(function (pdfBlob) {
                            // Create a Blob and trigger the download
                            var a = document.createElement('a');
                            a.href = URL.createObjectURL(pdfBlob);
                            a.download = prosloadname + '.pdf';
                            a.click();
                        });

              
    });


    $('body').on('click', '#ekene_mark_fullassignment', function () {
        var assignmentsettingsid = $(this).data("id");
        var campusid = $(this).data("cam");
       
       
       $('#ekenemarkassignmentekene').html('<div class="text-center p-5"> <span class="spinner-border spinner-border-lg" role="status" aria-hidden="true" style="color:#007ffb;"></span></div>');

        $.ajax({
            type: "POST",
            url: '../../controller/scripts/owner/assignment/ekene_mark_assignmentone.php',
            data: {
                campusid: campusid,
         
                assignmentsettingsid: assignmentsettingsid
               
             
            },

            success: function (response) {

            
              $("#ekenemarkassignmentekene").html(response);
           
            },

       });

    });
  
   



    //===========check staff box here all======================
$('body').on('change','#inlineCheckbox2',function(){
      
    var checkStatus = $(this).prop('checked');
    if(checkStatus == true)
    {
        $(".form-check-input").prop('checked', $(this).prop("checked"));
  
        
       
    
    }
    else if(checkStatus == false)
    {
        $(".form-check-input").prop('checked', false);
       ;
       
    }
});
//===========check staff box here all======================

//===========check staff box here single======================
$('body').on('change', '.form-check-input', function() {
if ($('.form-check-input:checked').length === $('.form-check-input').length) {

$("#inlineCheckbox2").prop('checked', true);


} else {
$("#inlineCheckbox2").prop('checked', false);


}
});


//===========check staff box here single======================
$('body').on('click', '#ekene_markmainassignmenticon', function () {
    
    $('#ekene_markmainassignment').modal('show');
    $('#ekene_mark_question').css('z-index', 1040); // Increase z-index of first modal
                // Reset z-index of first modal when second modal is closed
        $('#ekene_markmainassignment').on('hidden.bs.modal', function () {
            $('#ekene_mark_question').css('z-index', 1050); // Reset z-index of firstmodal
    });

    var assignmentid = $(this).data("id");
     var campusid = $(this).data("cam");
     var studentid = $(this).data("stud");
      $("#ekene_sassignmenthiddenidten").val(assignmentid);
      $("#ekene_campushiddenidten").val(campusid);
      $("#ekene_studenthiddenidten").val(studentid);
      
      
      $('#objectiveparttab').html('<div class="text-center p-5"> <span class="spinner-border spinner-border-lg" role="status" aria-hidden="true" style="color:#007ffb;"></span></div>');
     
     $.ajax({
        type: "POST",
        url: '../../controller/scripts/owner/assignment/mark_objectiveassignment.php',
        data: {

            campusid: campusid,
            studentid: studentid,
            assignmentid: assignmentid
           
         
        },

        success: function (response) {

          
              $("#objectiveparttab").html(response);


            //   $("#ekenemarkassignmentekene").html(response);
       
        },

   });


   
    
      $('#theoryparttab').html('<div class="text-center p-5"> <span class="spinner-border spinner-border-lg" role="status" aria-hidden="true" style="color:#007ffb;"></span></div>');
      
   $.ajax({

    type: "POST",
    url: '../../controller/scripts/owner/assignment/mark_theoryassignment.php',
    data: {
        campusid: campusid,
        studentid: studentid,
        assignmentid: assignmentid
       
     
    },

    success: function (response) {
            //  alert(response);
        $("#theoryparttab").html(response);
    //   $("#ekenemarkassignmentekene").html(response);
   
    },

});


});

$('body').on('click', '#submit_markedassignment', function () {
   
    var assignmentid = $("#ekene_sassignmenthiddenidten").val();
    var campusid = $("#ekene_campushiddenidten").val();
    var studentid = $("#ekene_studenthiddenidten").val();
   
  
    var theoryquestionarray = [];
    var correctionarray = [];
   
   
    $.each($(".ekenetheoryscoreid"), function () {
       var theoryquestion = $(this).val();

       if (theoryquestion == '') {
        
    } else {
        theoryquestionarray.push(theoryquestion);
      
    }
    
         
   });

 
   
   $.each($(".ekenetheorycorrectionid"), function () {
       var correction = $(this).val();
   
     
           correctionarray.push(correction);
     
   });

   
    //    var correctionarray1 = correctionarray.some(function (value) {
    //        return value.trim() === '';
    //    });
    
    //    var theoryquestionarray1 = theoryquestionarray.some(function (value) {
    //        return value.trim() === '';
    //    });
     
   
   

   

       if ($('.ekenetheoryscoreid').length > theoryquestionarray.length) {

           $.wnoty({
               type: 'warning',
               message: "Please fill in the score....",
               autohideDelay: 5000
           });

       }
       else
       {
    
           $.ajax({
   
               type: "POST",
               url: '../../controller/scripts/owner/assignment/ekene_submit_markedassignment.php',
               data: {
                   campusid: campusid,
                   studentid: studentid,
                   theoryquestionarray: theoryquestionarray,
                   assignmentid: assignmentid,
                   correctionarray: correctionarray
                  
                
               },
           
               success: function (response) {
             
                      if (response == "40") {
                    $.wnoty({
                        type: 'warning',
                        message: "Theory score exceed....",
                        autohideDelay: 5000
                    });
                }
                else if(response == "20")
                {
                    $.wnoty({
                        type: 'success',
                        message: "Marked successfully....",
                        autohideDelay: 5000
                    });
                    $.ajax({
                        type: "POST",
                        url: '../../controller/scripts/owner/assignment/ekene_mark_assignmentone.php',
                        data: {
                            campusid: campusid,
                     
                            assignmentsettingsid: assignmentid
                           
                         
                        },
            
                        success: function (response) {
            
                        
                          $("#ekenemarkassignmentekene").html(response);
                       
                        },
            
                   });

                }
                else
                {
                    $.wnoty({
                        type: 'danger',
                        message: "failed",
                        autohideDelay: 5000
                    });
                }
                
              },
           
         });
       }
       
   
   
   
   
   });

//reset assignment======------====--





    
  


// //Reset z-index of first modal when second modal is closed


    $('#resetmodalhere').on('hidden.bs.modal', function () {
        $('#ekene_mark_question').css('z-index', 1050); // Reset z-index of firstmodal
    });

   $('body').on('click', '.resetassignment', function () {
    
    var resetassignmentid = $(this).data("id");
    var resetstudentid = $(this).data("stud");
    var studentcampus = $(this).data("cam");
    var resetdatastatus = $(this).data("status");
    var resetdata = $(this).data("reset");

    var usertype = $('#user_type').val();
    var userid = $('#user_id').val();


    $('.pros-resetassignmentid').val(resetassignmentid);
    $('.pros-resetstudentid').val(resetstudentid);
    $('.pros-studentcampus').val(studentcampus);
    $('.pros-resetdatastatus').val(resetdatastatus);
    $('.pros-resetdata').val(resetdata);

    
   




    $('#resetmodalhere').modal('show');
    $('#ekene_mark_question').css('z-index', 1040); // Increase z-index of first modal


   

   });



   $('body').on('click', '#resteassignmentbtn_final', function () {
   

    var resetassignmentid = $('.pros-resetassignmentid').val();
    var resetstudentid  =  $('.pros-resetstudentid').val();
    var studentcampus =  $('.pros-studentcampus').val();
    var resetdatastatus =  $('.pros-resetdatastatus').val();
    var resetdata =  $('.pros-resetdata').val();

    var usertype = $('#user_type').val();
    var userid = $('#user_id').val();


       

   

    $('#resteassignmentbtn_final').html('<center><i class="fa fa-spinner fa-spin fs-3"></i></center>');







     if (resetdata == 4)
    {

                $.wnoty({
                    type: 'warning',
                    message: "This assignment has already been reset.",
                    autohideDelay: 5000

                });
                $('#resteassignmentbtn_final').html('Reset <i class="fas fa-undo"></i>');
    }
    else
    {
        $('#resetassignmentid').val(resetassignmentid);
        $('#resetstudentid').val(resetstudentid);


        
        if(resetdatastatus == "bulk")
        {
            
            
        var studentIDnew = [];
    
        var assignmentid = [];
    
    
            $.each($(".eachcheckbox:checked"), function () {
    
                var valuestudentid = $(this).data("stud");
                var valueassignmentid = $(this).data("id");
            
                
                assignmentid.push(valueassignmentid);
                
                studentIDnew.push(valuestudentid);
            
    
            });
        }
        else
        {
            var assignmentid = $("#resetassignmentid").val();
            var studentIDnew = $("#resetstudentid").val();
        }



        if(assignmentid == '' || assignmentid == 'NULL')
        {


            $.wnoty({
                type: 'warning',
                message: "Please select student to reset assignment for!!.",
                autohideDelay: 5000

            });
            $('#resteassignmentbtn_final').html('Reset <i class="fas fa-undo"></i>');

        }else
        {




                    studentIDnew = studentIDnew.toString();
                    assignmentid = assignmentid.toString(); 

                    
                    

                    $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/assignment/ekene_resetassignment.php",
                        data: {
                            studentcampus: studentcampus,
                        
                            assignmentid: assignmentid,
                            usertype: usertype,
                            userid: userid,

                            studentIDnew: studentIDnew
                        },

                        success: function (response) {



                           

                            $('#resteassignmentbtn_final').html('Reset <i class="fas fa-undo"></i>');
                
                            if (response == "success")
                            {
                                $.wnoty({
                                    type: 'success',
                                    message: "Assignment as been reset....",
                                    autohideDelay: 5500

                                });
                            }
                            else
                            {
                                $.wnoty({
                                    type: 'danger',
                                    message: "failed",
                                    autohideDelay: 5500

                                });
                            }


                            
                            },

                    });






        }


          
    }


  

});




// pros publish singgle here

        $('body').on('click', '.proschangepublishstatus', function () {
                        

                var pros_settingsID = $(this).data('id');
                var status = $(this).data('status');
                var StudentID = $(this).data('stud');

              


               

                
                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/assignment/pros_publishassignmentsingle.php",
                    data: {
                        pros_settingsID:pros_settingsID,
                        StudentID:StudentID,
                       status:status
                    },

                    success: function (output) { 


                                if(output.trim() == 'success')
                                {




                                     

                                                

                                                if(status == '1')
                                                {


                                                     $('.proschangestudentstatus'+StudentID).removeClass('chiActive');
                                                    // Add a class
                                                      $('.proschangestudentstatus'+StudentID).addClass('chiBlock');
                                                      $('.proschangestudentstatus'+StudentID).html('<i class="fas fa-cloud-upload-alt" ></i> Unpubli..');

                                                      $('.proschangestudentstatus'+StudentID).data('status', '0');

                                                      
                                                }else
                                                {


                                                      $('.proschangestudentstatus'+StudentID).removeClass('chiBlock');
                                                      $('.proschangestudentstatus'+StudentID).addClass('chiActive');
                                                      $('.proschangestudentstatus'+StudentID).html('<i class="fas fa-cloud-upload-alt" ></i> Publish');


                                                      
                                                      $('.proschangestudentstatus'+StudentID).data('status', '1');
                                                    
                                                }
                                               



                                            $.wnoty({
                                                type: 'success',
                                                message: "Result status changed successfully!!",
                                                autohideDelay: 5500
            
                                            });

                                        
                                }else
                                {


                                    $.wnoty({
                                        type: 'warning',
                                        message: "Result status failed. pls try again!!",
                                        autohideDelay: 5500
    
                                    });

                                }
                        

                    },
                });

               



                       
        });
// pros publish singgle here





//end of reset assignment======---=

///publish and unpulish assignment=[=========;]
   $('body').on('click', '#ekenepublishassignment', function () {


    var publishassignmentid = $(this).data("id");
    var publishstudentid = $(this).data("stud");
    var studentcampus = $(this).data("cam");
    var publishdatastatus = $(this).data("status");
  
  
  
        $('#publishdatastatus').val(publishdatastatus);
        $('#publishassignmentid').val(publishassignmentid);
        $('#publishstudentid').val(publishstudentid);


      

         
            if ($(".eachcheckbox").is(":checked")) {
              
                    $('#ekene_publishandunpublish_assignmentmodal').modal('show');
                    $('#ekene_mark_question').css('z-index', 1040); // Increase z-index of first modal
                    
                    
                    //Reset z-index of first modal when second modal is closed
                    $('#ekene_publishandunpublish_assignmentmodal').on('hidden.bs.modal', function () {
                        $('#ekene_mark_question').css('z-index', 1050); // Reset z-index of firstmodal
                    });


               

                  

            } else {

                $.wnoty({
                    type: 'warning',
                    message: "Please check all cards....",
                    autohideDelay: 5500

                });
            }
           
           
            $('#publishandunpulishassignment').html('<div class="text-center p-5"> <span class="spinner-border spinner-border-lg" role="status" aria-hidden="true" style="color:#007ffb;"></span></div>');

           $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/assignment/ekene_publishandunpublishassignment.php",
            data: {
                studentcampus: studentcampus,
                

                publishassignmentid: publishassignmentid

            },

            success: function (response) {






                $("#publishandunpulishassignment").html(response);
                // if (response == "success")
                // {
                //     $.wnoty({
                //         type: 'success',
                //         message: "Assignment as been reset....",
                //         autohideDelay: 5500

                //     });
                // }
                // else
                // {
                //     $.wnoty({
                //         type: 'danger',
                //         message: "failed",
                //         autohideDelay: 5500

                //     });
                // }


                
                },

        });





   });



  

   



   $('body').on('click', '#ekene_publishandunpuishbutton', function () {
    var display_class = $("#ekene_select_assignment_class").val();
    var ekene_import_subject = $("#ekene_select_assignment_subject").val();
    var instutition = $(".abba-change-institution option:selected").val();
        var studentIDnew = [];
    
        var assignmentid = [];
        var publishdata = [];
        var ekenecampus = [];
    
            $.each($(".eachcheckbox:checked"), function () {
                var studentcampus = $(this).data("cam");
                var valuestudentid = $(this).data("stud");
                var valueassignmentid = $(this).data("id");
                var publishdatainnercont = $(this).data("publish");
            
                
                assignmentid.push(valueassignmentid);
                

                studentIDnew.push(valuestudentid);
                publishdata.push(publishdatainnercont);

                ekenecampus.push(studentcampus);
             
    
            });
               studentIDnew = studentIDnew.toString();
                assignmentid = assignmentid.toString();
                publishdata = publishdata.toString();
                ekenecampus = ekenecampus.toString();

            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/assignment/ekene_publishassignment.php",
                data: {
                    ekenecampus: ekenecampus,
                    
                    assignmentid: assignmentid,
                   ekene_import_subject: ekene_import_subject,
                   display_class:display_class,
                   instutition:instutition,
                    publishdata: publishdata,

                    studentIDnew: studentIDnew
                },
                success: function (output) {
               
                                   
                    
                     var jsonDatacate = JSON.parse(output);
                   
               
                     for (var i = 0; i < jsonDatacate.length; i++) {
                      
                       // Access the properties you need here
               
                       var itemnew = jsonDatacate[i];
                    
                       //  var spotName = item.spot_name;
                        var ParentWhatsappNumbernew = itemnew.ParentWhatsappNumber;
                        var messagenew = itemnew.message;
                        var filniializenew = itemnew.filniialize;
                        var institutioninitionnew = itemnew.institutioninition;
                        var apikeynew = itemnew.apikey;
                        var successnewone = itemnew.successnew;
                  
                     //    var InstitutionEmailnew = itemnew.InstitutionEmail;
                     //    var ParentEmailnew = itemnew.ParentEmail;
                     //    var messageemailnew = itemnew.messageemail;
                     //    var assignmentmessagenew = itemnew.assignmentmessage;
                         
                        
                        if (successnewone == 8) {
                            $.wnoty({
                                type: 'success',
                                message: "Assignment published....",
                                autohideDelay: 5500
    
                            });
    
                            $.ajax({
                                type: "POST",
                                url: '../../controller/scripts/owner/assignment/ekene_mark_assignmentone.php',
                                data: {
                                    campusid: ekenecampus,
                            
                                    assignmentsettingsid: assignmentid
                                    
                                
                                },
                    
                                success: function (response) {
                        
                    
                                
                                $("#ekenemarkassignmentekene").html(response);
                                
                                },
                    
                            });
                            $('#ekene_publishandunpublish_assignmentmodal').modal('hide');
                      
                           }

                     var dataToSend = {
                         number: ParentWhatsappNumbernew,
                         msg: messagenew,
                         abba_institution_id: institutioninitionnew,
                         file: filniializenew,

                         // senderEmail: InstitutionEmailnew,
                         // recipientEmail: ParentEmailnew,
                         // email_content: messageemailnew,
                         // subject: assignmentmessagenew,
                         apikey: apikeynew
                       
                     };
                       
                     // Make an AJAX request
                     $.ajax({
                         type: 'POST', // or 'GET' depending on your needs
                         url: '../../controller/scripts/owner/assignment/send_whatsappmsg.php',
                         data: dataToSend,
                         
                         success: function(response) {
                            
                        
                         },
                     
                     });

                
                   }
                 
                  
                  

                     
                        //   if (output == 8)
                        //           {
                        //               $.wnoty({
                        //                   type: 'success',
                        //                   message: "Assignment published....",
                        //                   autohideDelay: 5500
              
                        //               });
              
                        //               $.ajax({
                        //                   type: "POST",
                        //                   url: '../../controller/scripts/owner/assignment/ekene_mark_assignmentone.php',
                        //                   data: {
                        //                       campusid: ekenecampus,
                                       
                        //                       assignmentsettingsid: assignmentid
                                             
                                           
                        //                   },
                              
                        //                   success: function (response) {
                                   
                              
                                          
                        //                     $("#ekenemarkassignmentekene").html(response);
                                         
                        //                   },
                              
                        //              });
                        //              $('#ekene_publishandunpublish_assignmentmodal').modal('hide');
              
                        //           }
                        //           else if(output == 1)
                        //           {
                        //               $.wnoty({
                        //                   type: 'success',
                        //                   message: "Assignment unpublished....",
                        //                   autohideDelay: 5500
              
                        //               });
              
                        //               $.ajax({
                        //                   type: "POST",
                        //                   url: '../../controller/scripts/owner/assignment/ekene_mark_assignmentone.php',
                        //                   data: {
                        //                       campusid: ekenecampus,
                                       
                        //                       assignmentsettingsid: assignmentid
                                             
                                           
                        //                   },
                              
                        //                   success: function (response) {
                              
                                             
                        //                     $("#ekenemarkassignmentekene").html(response);
                                         
                        //                   },
                              
                        //              });
                        //              $('#ekene_publishandunpublish_assignmentmodal').modal('hide');
                        //           }
              
                                 
                        //           else
                        //           {
                        //               $.wnoty({
                        //                   type: 'danger',
                        //                   message: "failed",
                        //                   autohideDelay: 5500
              
                        //               });
                        //           }
              
              
                                  
                                 },
              
                          });
                        
                  
        

              
            });
         


   
// end of pulishassignment=============

//convert assignment =========---------------
$('body').on('click', '#ekeneconverttoca', function () {

    

            var convertdatacampusid = $(this).data("cam");
            var convertdatastatus = $(this).data("status");
            var convertdatastudentid = $(this).data("stud");
        
            var dataterm = $(this).data("term");
            var datasession = $(this).data("session");

            var mytotalscore = $(this).data("mytotalscore");
        
            var maxscore = $(this).data("maxscore");
        
            $('#dataterm').val(dataterm);

            $('#datasession').val(datasession);

            $('#ekeneconvertdatastatus').val(convertdatastatus);

            $('#ekeneconvertstudentid').val(convertdatastudentid);
            $('#overallhiddeninput').val(maxscore);
            
            $('#tota_lobjectivequestion').val(mytotalscore);
        



            if (convertdatastatus == "bulk")
            {
                

            if ($(".eachcheckbox").is(":checked")) {
                    
            
            
        $('#ekene_convert_assignmentmodal').modal('show');
        $('#ekene_mark_question').css('z-index', 1040); // Increase z-index of first modal
        
        
        //Reset z-index of first modal when second modal is closed
        $('#ekene_convert_assignmentmodal').on('hidden.bs.modal', function () {
            $('#ekene_mark_question').css('z-index', 1050); // Reset z-index of firstmodal
        });
        
        
        $('#ekene_ca_select').html('<div class="text-center p-5"> <span class="spinner-border spinner-border-lg" role="status" aria-hidden="true" style="color:#007ffb;"></span></div>');

                        $.ajax({
                            type: "POST",
                            url: "../../controller/scripts/owner/assignment/ekene_convertassignment.php",
                            data: {
                                convertdatacampusid: convertdatacampusid,
                            
                            
                            },

                            success: function (output) { 

                            
                                $("#ekene_ca_select").html(output);

                            },
                        });
            
            } else {
            
            $.wnoty({
                type: 'warning',
                message: "Please check all cards....",
                autohideDelay: 5500
            
            });
            }
        
        }  
        else
        {
            $('#ekene_convert_assignmentmodal').modal('show');
            $('#ekene_mark_question').css('z-index', 1040); // Increase z-index of first modal
            
            
            //Reset z-index of first modal when second modal is closed
            $('#ekene_convert_assignmentmodal').on('hidden.bs.modal', function () {
                $('#ekene_mark_question').css('z-index', 1050); // Reset z-index of firstmodal
            });
            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/assignment/ekene_convertassignment.php",
                data: {
                    convertdatacampusid: convertdatacampusid,
                
                
                },
            
                success: function (output) { 
            
                
                    $("#ekene_ca_select").html(output);
            
                },
            });
        }

 


});


$('body').on('click', '#ekene_convertbutton', function () {


        var convertdatastatus = $("#ekeneconvertdatastatus").val();
        var dataid = $("#ekene_ca_select :selected").data("id");
        var cascore = $("#ekene_ca_select :selected").val();
        var termid = $("#dataterm").val();
        var campusid = $("#ekene_select_assignment_campus").val();
        var classid = $("#ekene_select_assignment_class").val();
        var subjectid = $("#ekene_select_assignment_subject").val();
        var session = $("#datasession").val();
        var usertype = $('#user_type').val();
        var userid = $('#user_id').val();


        $('#ekene_convertbutton').html('<center><i class="fa fa-spinner fa-spin"></i></center>');



        if (convertdatastatus == "bulk")
        {
            
            var studentIDnew = [];
            
            var maxscoreid = [];
            
            var totalscoreid = [];


                $.each($(".eachcheckbox:checked"), function () {

                    var valuestudentid = $(this).data("stud");
                    var totalscore = $(this).data("mytotalscore");

                    var maxscore = $(this).data("maxscore");
                    
                    
                    totalscoreid.push(totalscore);
                    
                    studentIDnew.push(valuestudentid);
                    maxscoreid.push(maxscore);
                

                });
        }

        else
        {
            var studentIDnew = $("#ekeneconvertstudentid").val();
            var maxscoreid = $("#overallhiddeninput").val();
            var totalscoreid = $("#tota_lobjectivequestion").val();

        }




    totalscoreid = totalscoreid.toString();
    studentIDnew = studentIDnew.toString();
    maxscoreid = maxscoreid.toString();


                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/assignment/ekene_convertingassignment.php",
                    data: {
                        studentIDnew: studentIDnew,
                        maxscoreid: maxscoreid,
                        totalscoreid: totalscoreid,
                        dataid: dataid,
                        termid: termid,
                        usertype: usertype,
                        userid: userid,
                        campusid: campusid,
                        classid: classid,
                        subjectid: subjectid,
                        cascore: cascore,
                        session: session
                    
                    },

                    success: function (output) { 


                        $('#ekene_convertbutton').html('Convert');
                
                        //  $("#ekene_ca_select").html(output);
                        if (output == 10)
                        {
                            $.wnoty({
                                type: 'success',
                                message: "Converted succesfully",
                                autohideDelay: 5500

                            });
                            $('#ekene_convert_assignmentmodal').modal('hide');
                        }
                        else
                        {
                            $.wnoty({
                                type: 'danger',
                                message: "failed",
                                autohideDelay: 5500

                            });
                        }

                    },
                });






});
