$(document).ready(function () {
    $('#total_classe').html('<i class="fa fa-spinner fa-spin"></i>');
    $('#total_tooo').html('<i class="fa fa-spinner fa-spin"></i>');
    // var campus = $("#autoSizingSelect option:selected").val();
    var instutition = $(".abba-change-institution option:selected").val();

    var userID = $('#user_id').val();

    $('#ekene_select_progressreport_campus').html('<option>  <span class="visually-hidden">Loading...</span></option>'); 
    
    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/assignment/ekene_select_campus.php",
        data: {
            instutition: instutition
          
           
        },
    
        success: function (output) { 
            
           
            $("#ekene_select_progressreport_campus").html(output);
    
        }
    });



  
    $('#emma_display_section_for_display_campus').html('<option>  <span class="visually-hidden">Loading...</span></option>'); 
    
    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/assignment/ekene_select_campus.php",
        data: {
            instutition: instutition
          
           
        },
    
        success: function (output) { 
            
           
            $("#emma_display_section_for_display_campus").html(output);
    
        }
    });


});

    $('#progressbutton').on('click', function() {
        // Redirect to the specified URL when the button is clicked
        window.location.href = '../../../edumess-v2.edumess.com/app/progressreport/index.php';
    });

$('body').on('change','#ekene_select_progressreport_campus',function(){
    var campus = $(this).val();

 
    var instutition = $(".abba-change-institution option:selected").val();
    // $("#ekene_select_assignment_campus").val(campus);
   $('#ekene_select_progressreport_class').html('<option>  <span class="visually-hidden">Loading...</span></option>'); 
    
    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/assignment/ekene_select_class.php",
        data: {
            instutition: instutition,
              campus: campus
           
        },
    
        success: function (output) { 
            
           
            $("#ekene_select_progressreport_class").html(output);
    
        }
    });

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/assignment/ekene_select_termalias.php",
        data: {
        
              campus: campus
           
        },
    
        success: function (output) { 
            
           
            $("#ekene_select_progressreport_term").html(output);
    
        }
    });

});



$('body').on('click', '#ekene_progress_report_load', function () {
    var instutition = $(".abba-change-institution option:selected").val();

    var userID = $('#user_id').val();
    var class_id = $("#ekene_select_progressreport_class").val();
    var campus = $("#ekene_select_progressreport_campus").val();
    var termid = $("#ekene_select_progressreport_term").val();

    $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/assignment/ekene_select_progressreport_subject.php",
                data: {
                    class_id: class_id,
                    userID: userID,
                    termid: termid,
                    instutition:instutition,
                      campus: campus
                   
                },
            
                success: function (output) { 
                  
                
                    $("#ekene_progressreport_filter").html(output);
            
                }
            });
            

            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/assignment/ekene_display_totaltopic.php",
                data: {
                    class_id: class_id,
                    userID: userID,
                    termid: termid,
                    instutition:instutition,
                      campus: campus
                   
                },
            
                success: function (output) { 
                  
                
                    $("#total_tooo").html(output);
            
                }
            });



            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/assignment/ekene_display_totalsubmittedtopic.php",
                data: {
                    class_id: class_id,
                    userID: userID,
                    termid: termid,
                    instutition:instutition,
                      campus: campus
                   
                },
            
                success: function (output) { 
                  
                
                    $("#total_classe").html(output);
            
                }
            });


        
});





$('body').on('click','#view_progressreporticon',function(){

var view_subjectid = $(this).data("id");
var class_id = $("#ekene_select_progressreport_class").val();
    var campus = $("#ekene_select_progressreport_campus").val();
    var termid = $("#ekene_select_progressreport_term").val();

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/assignment/ekene_select_topic.php",
        data: {
            campus: campus,
            classid: class_id,
            term: termid,
              subject: view_subjectid
           
        },
    
        success: function (output) { 
            
            $("#display_progress_reporttwo").html(output);
    
        }
    });


});







// $('body').on('change','#emma_display_section_for_display_campus',function(){
//     var campus = $(this).val();

//     var userID = $('#user_id_teacher').val();
//     var institution = $("#institutionid_header").val();
//     // $("#ekene_select_assignment_campus").val(campus);
//    $('#emma_display_section_for_display_class').html('<option>  <span class="visually-hidden">Loading...</span></option>'); 
    
//     $.ajax({
//         type: "POST",
//         url: "../../controller/scripts/Teacher/assignment/ekene_select_class.php",
//         data: {
//             userID: userID,
//               campus: campus
           
//         },
    
//         success: function (output) { 
            
           
//             $("#emma_display_section_for_display_class").html(output);
    
//         }
//     });

//     $.ajax({
//         type: "POST",
//         url: "../../controller/scripts/Teacher/assignment/ekene_select_termalias.php",
//         data: {
        
//               campus: campus
           
//         },
    
//         success: function (output) { 
            
           
//             $("#emma_display_section_for_display_term").html(output);
    
//         }
//     });

// });


// $('body').on('change','#emma_display_section_for_display_class',function(){

//     var class_id = $(this).val();
//     var campus = $("#autoSizingSelect option:selected").val();
//     var institution = $("#institutionid_header").val();
//     var userID = $('#user_id_teacher').val();

//   $('#emma_display_section_for_display_subject').html('<option>  <span class="visually-hidden">Loading...</span></option>'); 
    
//     $.ajax({
//         type: "POST",
//         url: "../../controller/scripts/Teacher/assignment/ekene_select_subject.php",
//         data: {
//             class_id: class_id,
//             userID: userID,
//               campus: campus
           
//         },
    
//         success: function (output) { 
          
           
//             $("#emma_display_section_for_display_subject").html(output);
    
//         }
//     });

   

// });

$('body').on('click', '#emma_load_assignment_question', function () {
    var subject = $('#emma_display_section_for_display_subject option:selected').val();
    var campus = $('#emma_display_section_for_display_campus option:selected').val();
    var classid = $('#emma_display_section_for_display_class option:selected').val();
    var term = $('#emma_display_section_for_display_term option:selected').val();


    $.ajax({
        type: "POST",
        url: "../../controller/scripts/Teacher/assignment/ekene_select_topic.php",
        data: {
            campus: campus,
            classid: classid,
            term: term,
              subject: subject
           
        },
    
        success: function (output) { 
          
           
            $("#display_progress_report").html(output);
    
        }
    });

});



// $('body').on('click', '#submit_topic_ekene', function () {
//     var userID = $('#user_id_teacher').val();
//     var subject = $('#emma_display_section_for_display_subject option:selected').val();
//     var campus = $('#emma_display_section_for_display_campus option:selected').val();
//     var classid = $('#emma_display_section_for_display_class option:selected').val();
//     var term = $('#emma_display_section_for_display_term option:selected').val();
//     // var subject = $('#emma_display_section_for_display_subject option:selected').val();
//     // var campus = $('#emma_display_section_for_display_campus option:selected').val();
//     // var classid = $('#emma_display_section_for_display_class option:selected').val();
//     // var term = $('#emma_display_section_for_display_term option:selected').val();
//     var CurriculumTopicIDnew = [];
    
//         var topicnamenew = [];
//         var termidnew = [];
//         var classidnew = [];
//         var campusidnew = [];
//         var subjectidnew = [];

//     $.each($(".ekenecheckeboxtopic:checked"), function () {
       
//         var CurriculumTopicID = $(this).data("topicid");
//         var topicname = $(this).data("topic");
//         var termid = $(this).data("term");
//         var classid = $(this).data("classid");
//         var campusid = $(this).data("camid");
//         var subjectid = $(this).data("subjectid");
       
//         CurriculumTopicIDnew.push(CurriculumTopicID);
//         topicnamenew.push(topicname);
//         termidnew.push(termid);
//         classidnew.push(classid);
//         campusidnew.push(campusid);
//         subjectidnew.push(subjectid);
        
       
      
     
//     });
   
// if (CurriculumTopicIDnew.length > 0) {
//     CurriculumTopicIDnew = CurriculumTopicIDnew.toString();
//     topicnamenew = topicnamenew.toString();
//     termidnew = termidnew.toString();
//     classidnew = classidnew.toString();
//     campusidnew = campusidnew.toString();
//     subjectidnew = subjectidnew.toString();

//     $.ajax({
//         type: "POST",
//         url: "../../controller/scripts/Teacher/assignment/ekene_inserttopic.php",
//         data: {
//             CurriculumTopicIDnew: CurriculumTopicIDnew,
//             topicnamenew: topicnamenew,
//             termidnew: termidnew,
//             userID: userID,
//             classidnew: classidnew,
//             campusidnew: campusidnew,
//             subjectidnew: subjectidnew
//         },
//         success: function (output) {
//             if (output == 4) {
//                 $.wnoty({
//                     type: 'success',
//                     message: "Submitted succesfully..",
//                     autohideDelay: 5000
//                 });
//                 $.ajax({
//                     type: "POST",
//                     url: "../../controller/scripts/Teacher/assignment/ekene_select_topic.php",
//                     data: {
//                         campus: campus,
//                         classid: classid,
//                         term: term,
//                           subject: subject
                       
//                     },
                
//                     success: function (output) { 
                      
                       
//                         $("#display_progress_report").html(output);
                
//                     }
//                 });
//             }
//         }
//     });
// } else {
//     $.wnoty({
//         type: 'warning',
//         message: "Choose A Topic",
//         autohideDelay: 5000
//     });
// }

// });