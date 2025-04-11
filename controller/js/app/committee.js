$(document).ready(function() {

    var institution = $(".abba-change-institution").val();

   $("#ekene_select_assignment_campus").html("<option value='NULL'>Loading...</option>");
   $("#ekene_select_create_campus").html("<option value='NULL'>Loading...</option>");

    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/committee/emma_get_campus.php',
        data:{institution: institution},
        success:function(campus_id){
            $("#ekene_select_assignment_campus").html(campus_id);
        }
    });

    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/committee/emma_get_campus.php',
        data:{institution: institution},
        success:function(campus_id){
            $("#ekene_select_create_campus").html(campus_id);
        }
    });

    $(".mymce").summernote();
});

$('body').on('change','#ekene_select_assignment_campus',function(){

    var campus = $(this).val();

    $("#ekene_display_student_behavioural").html('<div class="text-center text-primary"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/committee/ekene_select_all_committee.php",
        data: {
            campus: campus
        },
        success: function (output) { 
            $("#ekene_display_student_behavioural").html(output);
        }
    });
});

$('body').on('click','#ekene_convertbutton',function(){

    $('#ekene_convertbutton').html('<div class="spinner-border text-white spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>');

    var campus = $("#ekene_select_create_campus").val();
    var committeename = $("#new_committee").val();
    
    if (campus == '' || campus == 'NULL'){

        $.wnoty({
            type: 'warning',
            message: "Please Select Campus...",
            autohideDelay: 5000
        });

    }else if(committeename == ''){
        $.wnoty({
            type: 'warning',
            message: "Please enter committee name...",
            autohideDelay: 5000
        });
    }else{

        get_longitude_and_latitude(function(coordinates) {

            var latitude = coordinates.latitude;
            var longitude = coordinates.longitude;
            var userid = $("#user_id").val();
            var usertype = $("#user_type").val();


            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/committee/ekene_create_committee.php",
                data: {
                    campus: campus,
                    committeename: committeename,
                    latitude: latitude,
                    longitude: longitude,
                    userid: userid,
                    usertype: usertype
                },
                success: function (output) {
                    $('#ekene_convertbutton').html('<i class="fa fa-plus"></i> Create');
            
                    if (output == 2){
                        $.wnoty({
                            type: 'success',
                            message: "Committee Created successfully.",
                            autohideDelay: 5000
                        });
                        $(".abba_display_campus option:selected").val(campus);
                        // $("#ekene_display_student_behavioural").html('<div class="text-center text-primary"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');
                        // $.ajax({
                        //     type: "POST",
                        //     url: "../../controller/scripts/owner/committee/ekene_select_all_committee.php",
                        //     data: {
                        //         campus: campus
                        //     },
                        //     success: function (output) {
                        //         $("#ekene_display_student_behavioural").html(output);
                        //     }
                        // });

                        $("#ekene_create_committee").modal("hide");
                    }else if(output == "exist1"){
                        $.wnoty({
                            type: 'warning',
                            message: "Committee Name Already Exist...",
                            autohideDelay: 5000
                        });
                    }
                }
            });
        });
    }
});

$('body').on('click','#ekene_editc',function(){

    var committeeid = $(this).data("committeeid");
    var committeename = $(this).data("name");
  
    $("#edit_new_committee_id").val(committeeid);
    $("#edit_new_committee").val(committeename);
});

$('body').on('click','#ekene_edit_committee_name_button',function(){

    $("#ekene_display_student_behavioural").html('<div class="spinner-border text-center text-primary" role="status"><span class="visually-hidden">Loading...</span></div>');

    $('#ekene_edit_committee_name_button').html('<div class="spinner-border text-white spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>');

    var committeeid = $("#edit_new_committee_id").val();
    var committeename = $("#edit_new_committee").val();
    var campus = $("#ekene_select_assignment_campus").val();
    
    if (committeename == '')
    {
        $.wnoty({
            type: 'warning',
            message: "Please enter committee name...",
            autohideDelay: 5000
        });
    }
    else
    {
        get_longitude_and_latitude(function(coordinates) {
            var latitude = coordinates.latitude;
            var longitude = coordinates.longitude;
            var userid = $("#user_id").val();
            var usertype = $("#user_type").val();

            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/committee/ekene_edit_committee.php",
                data: {
                    committeeid: committeeid,
                    committeename: committeename,
                    latitude: latitude,
                    longitude: longitude,
                    userid: userid,
                    usertype: usertype,
                    campus:campus
                },
                success: function (response) { 
                    
                    $('#ekene_edit_committee_name_button').html('<i class="fas fa-edit"></i> Edit');

                    if (response == 2){
                        $.wnoty({
                            type: 'success',
                            message: "Edited successfully...",
                            autohideDelay: 5000
                        });

                        $("#ekene_display_student_behavioural").html('<div class="text-center text-primary"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');

                        $.ajax({
                            type: "POST",
                            url: "../../controller/scripts/owner/committee/ekene_select_all_committee.php",
                            data:{
                                campus: campus
                            },
                            success: function (output){
                                $("#ekene_display_student_behavioural").html(output);
                            }
                        });

                    $("#ekene_edit_committee_name").modal("hide");
                    
                    }
                    else
                    {
                        $.wnoty({
                            type: 'danger',
                            message: "Failed",
                            autohideDelay: 5000
                        });
                    }
                }
            });
        });
    }
});

$('body').on('click','#ekene_delete_fullassignmenttwo',function(){
    var campusid = $(this).data("cam");
    var committeeid = $(this).data("committee");
    $("#kdatacamid").val(campusid);
    $("#kdataid").val(committeeid);
});

$('body').on('click','#ekene_delete_committee_button',function(){
    var campus = $("#kdatacamid").val();
    var committeeid = $("#kdataid").val();

    $('#ekene_delete_committee_button').html('<div class="spinner-border text-white spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>');


    get_longitude_and_latitude(function(coordinates) {
        var latitude = coordinates.latitude;
        var longitude = coordinates.longitude;
        var userid = $("#user_id").val();
        var usertype = $("#user_type").val();

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/committee/ekene_delete_committee.php",
            data: {
                campus: campus,
                committeeid: committeeid,
                latitude: latitude,
                longitude: longitude,
                userid: userid,
                usertype: usertype
            },
            success: function (output) { 
                $('#ekene_delete_committee_button').html('<i class="fas fa-trash"></i> Yes! Delete');

                if (output == 2){
                    $.wnoty({
                        type: 'success',
                        message: "Deleted successfully...",
                        autohideDelay: 5000

                    });

                    $("#ekene_delete_committee").modal("hide");

                    $("#ekene_display_student_behavioural").html('<div class="text-center text-primary"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');

                    $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/committee/ekene_select_all_committee.php",
                        data: {
                            campus: campus
                        },
                        success: function (output) { 
                            $("#ekene_display_student_behavioural").html(output);
                        }
                    });
                
                }else{
                    $.wnoty({
                        type: 'danger',
                        message: "Failed",
                        autohideDelay: 5000
                    });
                }
            }
        });
    });

});

$('body').on('click','#ekene_view_fullassignment',function(){

    var committeeid = $(this).data("committee");
    var campusid = $(this).data("cam");
    $("#kdataidekene").val(committeeid);

    $("#ekene_view_member_content").html('<div class="text-center text-primary"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/committee/ekene_view_committee_member.php",
        data: {
            committeeid: committeeid,
            campusid: campusid
        },
        success: function (response) { 
            $("#ekene_view_member_content").html(response);
        }
    });
});

$('body').on('click','#ekene_view_fullassignment',function(){

    var campus = $("#ekene_select_assignment_campus").val();
    
    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/committee/emma_get_institution.php',
        data:{campus: campus},
        success:function(institution_id){
            $(".emma_keep_institution").val(institution_id);
        }
    });
});

$('body').on('click','#ekene_edit_membericon',function(){

    var positionid = $(this).data("position");
    var positionname  = $(this).data("positionname");
    var userid = $(this).data("id");
    $("#ekene_hide_userid").val(userid);

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/committee/ekene_edit_position.php",
        data: {
            positionid: positionid,
            positionname: positionname,
        },
        success: function (response) { 
        
        $("#ekene_select_position").html(response);

            $("#ekene_edit_member").modal("show");
            $('#ekene_save_change').css('z-index', 1040); // Increase z-index of first modal
                // Reset z-index of first modal when second modal is closed
                $('#ekene_edit_member').on('hidden.bs.modal', function () {
                $('#ekene_save_change').css('z-index', 1050); // Reset z-index of firstmodal
            });
        }
    });
});

$('body').on('click','#ekene_edit_member_name_button',function(){
    var positionid = $("#ekene_edit_membericon").data("position");
    var positionname  = $("#ekene_edit_membericon").data("positionname");
    var committeeid = $("#ekene_edit_membericon").data("committee");
    var campusid = $("#ekene_edit_membericon").data("cam");
    var useride = $("#ekene_hide_userid").val();

    var ekene_p = $("#ekene_select_position").val();

    if (ekene_p == 'NULL')
    {
    $.wnoty({
        type: 'warning',
        message: "Please Select position...",
        autohideDelay: 5000
    });
    }else{

    $('#ekene_edit_member_name_button').html('<div class="spinner-border text-white spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>');


        get_longitude_and_latitude(function(coordinates) {
            var latitude = coordinates.latitude;
            var longitude = coordinates.longitude;
            var userid = $("#user_id").val();
            var usertype = $("#user_type").val();

            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/committee/ekene_edit_postiontwo.php",
                data: {
                    positionid: positionid,
                    positionname: positionname,
                    ekene_p:ekene_p,
                    userid:userid,
                    useride:useride,
                    committeeid: committeeid,
                    latitude: latitude,
                    longitude: longitude,
                    usertype: usertype,
                    campus: campusid
                },
            
                success: function (response) { 
                    $('#ekene_edit_member_name_button').html('<i class="fas fa-edit"></i> Update');
                    if (response == 2){
                        $.wnoty({
                            type: 'success',
                            message: "Position Changed successfully...",
                            autohideDelay: 5000

                        });

                        $("#ekene_edit_member").modal("hide");

                        $.ajax({
                            type: "POST",
                            url: "../../controller/scripts/owner/committee/ekene_view_committee_member.php",
                            data: {
                                committeeid: committeeid,
                                campusid: campusid
                            },
                        
                            success: function (response) { 
                        
                                $("#ekene_view_member_content").html(response);
                                
                            }
                        });

                    }else{

                        $.wnoty({
                            type: 'danger',
                            message: "Failed",
                            autohideDelay: 5000
                        });
                    }
                }
            });
        });


    }

});

$('body').on('click','#ekene_delete_membericon, .emma_delete_icon_for_commitee, #ekene_delete_membericontable',function(){

    var campus = $("#ekene_select_assignment_campus").val();

    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/committee/emma_modal_image_for_member_delete.php',
        data:{
            campus: campus
        },
        success:function(delete_image){
            $(".emma_keep_delete_member").html(delete_image);
            $(".emma_keep_delete_member_card").html(delete_image);
            $(".delete_icon_for_add_task_modal").html(delete_image);
        }
    });
});

$('body').on('click','#ekene_delete_membericon',function(){

    $("#ekene_delete_member_modal").modal("show");
    $('#ekene_save_change').css('z-index', 1040); // Increase z-index of first modal
    // Reset z-index of first modal when second modal is closed
    $('#ekene_delete_member_modal').on('hidden.bs.modal', function () {
    $('#ekene_save_change').css('z-index', 1050); // Reset z-index of firstmodal
});

var userid = $(this).data("id");
var committeeid = $("#ekene_delete_membericon").data("committee");
var campusid = $("#ekene_delete_membericon").data("cam");

    $("#kdatacamiddelete").val(campusid);
    $("#kdataiddelete").val(committeeid);
    $("#ekenedelete1").val(userid);
                
});

$('body').on('click','#ekene_delete_member_modalbutton',function(){

    var campusid = $("#kdatacamiddelete").val();
    var committeeid = $("#kdataiddelete").val();
    var Userid = $("#ekenedelete1").val();

    $('#ekene_delete_member_modalbutton').html('<div class="spinner-border text-white spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>');

    get_longitude_and_latitude(function(coordinates) {
        var latitude = coordinates.latitude;
        var longitude = coordinates.longitude;
        var userid = $("#user_id").val();
        var usertype = $("#user_type").val();

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/committee/ekene_delete_member.php",
            data: {
                User: Userid,
                committeeid: committeeid,
                latitude: latitude,
                longitude: longitude,
                userid: userid,
                usertype: usertype,
                campusid: campusid
            },

            success: function (output) { 
                $('#ekene_delete_member_modalbutton').html('<i class="fas fa-trash"> Yes Delete</i>');

                if (output == 2){

                    $.wnoty({
                        type: 'success',
                        message: "Deleted successfully...",
                        autohideDelay: 5000
                    });

                    $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/committee/ekene_view_committee_member.php",
                        data: {
                            committeeid: committeeid,
                            campusid: campusid
                        },
                        success: function (response) { 
                            $("#ekene_view_member_content").html(response);
                        }
                    });

                    // $("#ekene_display_student_behavioural").html('<div class="text-center text-primary"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');

                    // $.ajax({
                    //     type: "POST",
                    //     url: "../../controller/scripts/owner/committee/ekene_select_all_committee.php",
                    //     data: {
                    //         campus: campusid
                        
                    //     },
                    //     success: function (output) {
                    //         $("#ekene_display_student_behavioural").html(output);
                    //     }
                    // });

                    $("#ekene_delete_member_modal").modal("hide");
                }else{

                }
            }
        });
    });
});
   
$('body').on('click','#ekeneaddfirst',function(){
    $("#ekene_add_member_forreal").modal("show");
            
    $('#ekene_save_change').css('z-index', 1040); // Increase z-index of first modal
        // Reset z-index of first modal when second modal is closed
        $('#ekene_add_member_forreal').on('hidden.bs.modal', function () {
        $('#ekene_save_change').css('z-index', 1050); // Reset z-index of firstmodal
    });
});

$('body').on('click','#ekene_add_onemember',function(){

    var campusid = $("#ekene_select_assignment_campus").val();
    var ekenecommitee = $('#kdataidekene').val();
    var usertype = $("#ekene_select_usertype").val();
    var instutition = $(".abba-change-institution").val();

    var ekeneuserid = [];

    $.each($(".ekenecheckeboxtopic:checked"), function () {
        var userid = $(this).data("id");
        ekeneuserid.push(userid);
    });

    if (ekeneuserid.length > 0) {
        
    ekeneuserid = ekeneuserid.toString();

    $('#ekene_add_onemember').html('<div class="spinner-border text-white spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>');

    get_longitude_and_latitude(function(coordinates) {
        var latitude = coordinates.latitude;
        var longitude = coordinates.longitude;
        var userid = $("#user_id").val();
        var usertype = $("#user_type").val();
            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/committee/ekene_insert_member.php",
                data: {
                usertypes: usertype,
                instutition:instutition,
                ekenecommitee:ekenecommitee,
                ekeneuserid:ekeneuserid,
                campus: campusid,
                latitude: latitude,
                longitude: longitude,
                userid: userid,
                usertype: usertype
                },
            
                success: function (response){
                    $('#ekene_add_onemember').html('<i class="fa fa-plus-circle"></i> Add');

                    var jsonDatacate = JSON.parse(response);

                    for (var i = 0; i < jsonDatacate.length; i++) {

                        var itemnew = jsonDatacate[i];
                        //  var spotName = item.spot_name;
                        var WhatsappNumbernew = itemnew.WhatsappNumber;
                        var messagenew = itemnew.message;
                        var filniializenew = itemnew.filniialize;
                        var institutioninitionnew = itemnew.institutioninition;
                        var apikeynew = itemnew.apikey;
                        var successnewone = itemnew.successnew;

                        if (successnewone == 4){
        
                            $.wnoty({
                                type: 'success',
                                message: "member created  successfully...",
                                autohideDelay: 5000
            
                            });

                            $.ajax({
                                type: "POST",
                                url: "../../controller/scripts/owner/committee/ekene_view_committee_member.php",
                                data: {
                                    committeeid: ekenecommitee,
                                    campusid: campusid
                                },
                                success: function (response) {
                                    $("#ekene_view_member_content").html(response);
                                }
                            });

                            $.ajax({
                                type: "POST",
                                url: "../../controller/scripts/owner/committee/ekene_select_stack.php",
                                data: {
                                usertype: usertype,
                                instutition:instutition,
                                campus: campusid,
                                },
                                success: function (response) { 
                                    // $("#checkBoxes").html(response);
                                }
                            });
                
                            $("#ekene_add_member_forreal").modal("hide");

                            var dataToSend = {
                                number: WhatsappNumbernew,
                                msg: messagenew,
                                file: filniializenew,
                                abba_institution_id: institutioninitionnew,
                                apikey: apikeynew,
                            }

                            $.ajax({
                                type: 'POST',
                                url: '../../controller/scripts/owner/committee/ekene_send_whatsmessage.php',
                                data: dataToSend,
                                success: function(response) {
                                    
                                },
                            });
        
                        }else{
                            $.wnoty({
                                type: 'danger',
                                message: "Failed..",
                                autohideDelay: 5000
                            });
                        }
                    }
                }
            });
        });

    }
    else
    {
        $.wnoty({
            type: 'warning',
            message: "Select a Member",
            autohideDelay: 5000
        });
    }
});

$('body').on('change','#ekene_select_usertype',function(){

    var usertype = $(this).val();
    var instutition = $(".abba-change-institution").val();
    // var campusid = $('#ekene_view_fullassignment').data("cam");
    var campusid = $("#ekene_select_assignment_campus").val();

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/committee/ekene_select_stack.php",
        data: {
        usertype: usertype,
        instutition:instutition,
        campus: campusid,
        },
    
        success: function (response) {   
            $("#checkBoxes").html(response);
        }
    });
});

$('body').on('click','#ekene_add_first_task',function(){
    var campus = $("#ekene_select_assignment_campus option:selected").val();


    $("#ekene_add_member_forrealtask").modal("show");
        
    $('#ekene_assigning_of_task').css('z-index', 1040); // Increase z-index of first modal
                // Reset z-index of first modal when second modal is closed
        $('#ekene_add_member_forrealtask').on('hidden.bs.modal', function () {
        $('#ekene_assigning_of_task').css('z-index', 1050); // Reset z-index of firstmodal
    });

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/committee/ekene_select_all_committee_fortask.php",
        data: {
            campus: campus
        
        },
    
        success: function (output) { 
            
            $("#ekene_task_committeeassign").html(output);
    
        }
    });


        // $.ajax({
        //     type: "POST",
        //     url: "../../controller/scripts/owner/committee/ekene_select_stack.php",
        //     data: {
        //     usertype: usertype,
        //     instutition:instutition,
        //     campus: campusid,
        //     },
        
        //     success: function (response) { 
        
        //     $("#checkBoxes").html(response);
        //     }
        // });
});
   
$('body').on('change','#ekene_offenserusertype',function(){

    var usertype = $(this).val();
    var instutition = $(".abba-change-institution").val();
    var campus = $("#ekene_select_assignment_campus").val();

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/committee/ekene_select_stack.php",
        data: {
        usertype: usertype,
        instutition:instutition,
        campus: campus,
        },
    
        success: function (response) { 
    
        $("#checkBoxes1").html(response);
        }
    });
});

$('body').on('click','#ekene_add_onemembertask',function(){

    var committee = $("#ekene_angry").val();
    var instutition = $(".abba-change-institution").val();
    var campus = $("#ekene_select_assignment_campus").val();
    var titlename = $("#exampleFormControlInput1").val();
    var description = $("#exampleFormControlTextarea1").val();
    var userid = $("#user_id").val();
    var usertype = $("#user_type").val();

    var ekeneuserid = [];

    if (titlename == ''){
            $.wnoty({
                type: 'warning',
                message: "Please Enter Title...",
                autohideDelay: 5000
            });
    }else{
        $.each($(".ekenecheckeboxtopic:checked"), function () {
            var userid = $(this).data("id");
            ekeneuserid.push(userid);
        });

        $('#ekene_add_onemembertask').html('<div class="spinner-border text-white spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>');

        get_longitude_and_latitude(function(coordinates) {
            var latitude = coordinates.latitude;
            var longitude = coordinates.longitude;
            var userid = $("#user_id").val();
            var usertype = $("#user_type").val();

            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/committee/ekene_insert_task.php",
                data: {
                usertypes: usertype,
                instutition:instutition,
                campus: campus,
                description: description,
                titlename: titlename,
                ekeneuserid: ekeneuserid,
                committee: committee,
                latitude: latitude,
                longitude: longitude,
                userid: userid,
                usertype: usertype
                },
                
                success: function (response) { 
                    $('#ekene_add_onemembertask').html('<i class="fa fa-plus"></i> Add Task');

                    var jsonDatacate = JSON.parse(response);

                    for (var i = 0; i < jsonDatacate.length; i++) {
                        var itemnew = jsonDatacate[i];
                        
                        //  var spotName = item.spot_name;
                        var WhatsappNumbernew = itemnew.WhatsappNumber;
                        var messagenew = itemnew.message;
                        var filniializenew = itemnew.filniialize;
                        var institutioninitionnew = itemnew.institution;
                        var apikeynew = itemnew.apikey;
                        var successnewone = itemnew.successnew;
        
                        if (successnewone == 10){
                            $.wnoty({
                                type: 'success',
                                message: "Task Created successfully...",
                                autohideDelay: 5000
                            });
                            
                            $.ajax({
                                type: "POST",
                                url: "../../controller/scripts/owner/committee/display_task_one.php",
                                data: {
                                    committeeid:committee,
                                    instutition:instutition,
                                    campus: campus,
                                    userid: userid,
                                    usertype: usertype
                                },
                        
                                success: function (response) {
                                    $("#displaymytask").html(response);
                                }
                            });
                
                            $("#ekene_add_member_forrealtask").modal("hide");

                            var dataToSend = {
                                number: WhatsappNumbernew,
                                msg: messagenew,
                                file: filniializenew,
                                abba_institution_id: institutioninitionnew,
                                apikey: apikeynew,
                            }

                            $.ajax({
                                type: 'POST',
                                url: '../../controller/scripts/owner/committee/ekene_send_whatsmessage.php',
                                data: {dataToSend: dataToSend},
                                
                                success: function(response) {
                            
                                },
                            });
                        }
                    }
                }
            });
        });
    }
});

$('body').on('click','#ekene_task_fullassignmenttwo',function(){

    var committeeid = $(this).data("committee");
    var instutition = $(".abba-change-institution").val();
    var campus = $("#ekene_select_assignment_campus").val();
    var usertype = $("#user_type").val();
    var userid = $("#user_id").val();

    $("#ekene_angry").val(committeeid);

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/committee/display_task_one.php",
        data: {
            committeeid:committeeid,
            instutition:instutition,
            campus: campus,
            usertype: usertype,
            userid: userid
        },

        success: function (response) { 
            $("#displaymytask").html(response);
        }
    });
});

$('body').on('click','#ekene_delete_membericontable',function(){
    var taskid = $(this).data("task");
    $("#kdatacamidtask").val(taskid);
    $("#ekene_delete_deletetaskmodal").modal("show");
    
    $('#ekene_assigning_of_task').css('z-index', 1040); // Increase z-index of first modal
                // Reset z-index of first modal when second modal is closed
        $('#ekene_delete_deletetaskmodal').on('hidden.bs.modal', function () {
        $('#ekene_assigning_of_task').css('z-index', 1050); // Reset z-index of firstmodal
    });

});

$('body').on('click','#ekene_delete_committee_buttontask',function(){
    var taskid = $("#kdatacamidtask").val();
    var committee = $("#ekene_angry").val();
    
    var instutition = $(".abba-change-institution").val();
    var campus = $("#ekene_select_assignment_campus").val();
    var userid = $("#user_id").val();
    var usertype = $("#user_type").val();

    $('#ekene_delete_committee_buttontask').html('<div class="spinner-border text-white spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>');
    
    get_longitude_and_latitude(function(coordinates) {
        var latitude = coordinates.latitude;
        var longitude = coordinates.longitude;
        var userid = $("#user_id").val();
        var usertype = $("#user_type").val();

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/committee/ekene_delete_task.php",
            data: {

            taskid: taskid,
            committee: committee,
            latitude: latitude,
            longitude: longitude,
            usertype: usertype,
            userid: userid,
            campus: campus
            },

            success: function (response) { 
                $('#ekene_delete_committee_buttontask').html('<i class="fas fa-trash-alt"> Yes Delete</i>');

                $("#ekene_delete_deletetaskmodal").modal('hide');
        
                if (response == 2)
                {
                
                $.wnoty({
                    type: 'success',
                    message: "Task Deleted successfully...",
                    autohideDelay: 5000

                });

                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/committee/display_task_one.php",
                    data: {
                        committeeid:committee,
                    instutition:instutition,
                    campus: campus,
                    userid: userid,
                    usertype: usertype
                    },
                
                    success: function (response) { 
                
                
                    $("#displaymytask").html(response);
                    }
                });


                }
                else
                {
                $.wnoty({
                    type: 'danger',
                    message: "failed...",
                    autohideDelay: 5000

                });
                }
                
        //   $("#displaymytask").html(response);
            }
        });
    });

});

$('body').on('click','#ekene_edit_membericontable',function(){

    var data_id = $(this).data('task');
    var data_title = $(this).data('title');
    var data_description = $(this).data('desc');
    
    $(".emma_edit_data_id").val(data_id);
    $("#emma_load_task_edit_title").val(data_title);
    $("#emma_load_task_edit_description").val(data_description);

    $("#modalforeditingtask").modal("show");

    $('#ekene_assigning_of_task').css('z-index', 1040); // Increase z-index of first modal
    // Reset z-index of first modal when second modal is closed
    $('#modalforeditingtask').on('hidden.bs.modal', function () {
    $('#ekene_assigning_of_task').css('z-index', 1050); // Reset z-index of firstmodal
    });
});

$('body').on('click','#emma_update_task_button',function(){
    var get_task_id = $(".emma_edit_data_id").val();
    var get_task_title = $("#emma_load_task_edit_title").val();
    var get_task_description = $("#emma_load_task_edit_description").val();
    var committee = $("#ekene_angry").val();
    var instutition = $(".abba-change-institution").val();
    var campus = $("#ekene_select_assignment_campus").val();
    var userid = $("#user_id").val();
    var usertype = $("#user_type").val();

    $('#emma_update_task_button').html('<div class="spinner-border text-white spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>');

    get_longitude_and_latitude(function(coordinates) {
        var latitude = coordinates.latitude;
        var longitude = coordinates.longitude;
        var userid = $("#user_id").val();
        var usertype = $("#user_type").val();

        $.ajax({
            type:"POST",
            url:"../../controller/scripts/owner/committee/emma_edit_task.php",
            data:{
                get_task_id: get_task_id,
                get_task_title: get_task_title,
                get_task_description: get_task_description,
                campus: campus,
                latitude: latitude,
                longitude: longitude,
                userid: userid,
                usertype: usertype
            },
            success :function(edit_task) {
                $('#emma_update_task_button').html('<i class="fa fa-edit"></i> Update');

                if(edit_task == 2){
                    $.wnoty({
                        type: 'success',
                        message: "Task Updated successfully...",
                        autohideDelay: 5000
                    });

                    $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/committee/display_task_one.php",
                        data: {
                        committeeid:committee,
                        instutition:instutition,
                        campus: campus,
                        userid: userid,
                        usertype: usertype,
                        latitude: latitude,
                        longitude: longitude
                        },
                    
                        success: function (response) { 
                    
                    $("#displaymytask").html(response);
                        }
                    });
                    $("#modalforeditingtask").modal("hide");
                }else{
                    $.wnoty({
                        type: 'warning',
                        message: "failed...",
                        autohideDelay: 5000
                    });
                }
            }
        });
    });

});

$('body').on('click','#ekene_view_membericontable',function(){

    var data_id = $(this).data('task');
    // var data_title = $(this).data('title');
    // var data_description = $(this).data('desc');
    
    $(".emma_view_data_id").val(data_id);
    // $("#emma_load_task_edit_title").val(data_title);
    // $("#emma_load_task_edit_description").val(data_description);

    $("#modalforviewingtask").modal("show");

    $('#ekene_assigning_of_task').css('z-index', 1040); // Increase z-index of first modal
    // Reset z-index of first modal when second modal is closed
        $('#modalforviewingtask').on('hidden.bs.modal', function () {
        $('#ekene_assigning_of_task').css('z-index', 1050); // Reset z-index of firstmodal
        });

});

$('body').on('click','#ekene_assigned_users_membericontable',function(){

    $("#modalforassigningtasks").modal("show");

    $('#ekene_assigning_of_task').css('z-index', 1040); // Increase z-index of first modal
    // Reset z-index of first modal when second modal is closed
    $('#modalforassigningtasks').on('hidden.bs.modal', function () {
        $('#ekene_assigning_of_task').css('z-index', 1050); // Reset z-index of firstmodal
    });
});

$('body').on('click','#ekene_assigned_users_membericontable',function(){
    var get_user_id = $(this).data('userid');
    var get_user_type = $(this).data('usertype');
    var get_commitee_id = $(this).data('commitee');

    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/committee/get_assigned_users.php',
        data:{
            get_user_id: get_user_id,
            get_user_type: get_user_type,
            get_commitee_id: get_commitee_id
        },
        success:function(assignedusers){
            $(".emma_upload_assigned_users").html(assignedusers);
        }
    })
});

$('body').on('click','#emma_upload_membericontable',function(){
    var data_id = $(this).data('task');
    // var data_title = $(this).data('title');
    // var data_description = $(this).data('desc');
    
    $(".emma_upload_data_id").val(data_id);
    // $("#emma_load_task_edit_title").val(data_title);
    // $("#emma_load_task_edit_description").val(data_description);

    $("#modalforuploadingtask").modal("show");

    $('#ekene_assigning_of_task').css('z-index', 1040); // Increase z-index of first modal
    // Reset z-index of first modal when second modal is closed
    $('#modalforuploadingtask').on('hidden.bs.modal', function () {
        $('#ekene_assigning_of_task').css('z-index', 1050); // Reset z-index of firstmodal
    });
});

$('body').on('click','#emma_upload_membericontable',function(){
    var userid = $("#user_id").val();
    var commitee_id = $(this).data("commitee");
    var task_id = $(this).data("task");

    $(".emma_upload_user_id").val(userid);
    $(".emma_upload_commitee_id").val(commitee_id);
    $(".emma_upload_task_id").val(task_id);

    
    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/committee/display_penalty.php',
        data:{
            userid: userid,
            commitee_id: commitee_id,
            task_id: task_id
        },
        success:function(result){
            if(result == 2){
                $("#emma_load_upload_penalty").summernote('code', '');
            }else{
               $("#emma_load_upload_penalty").summernote('code', result);
            }
        }
    })
});

$('body').on('click','#emma_upload_penalty_button',function(){
    var get_task_id = $(".emma_upload_task_id").val();
    var get_user_id = $(".emma_upload_user_id").val();
    var get_commitee_id = $(".emma_upload_commitee_id").val();
    var get_penalty = $("#emma_load_upload_penalty").val();

    $('#emma_update_task_button').html('<div class="spinner-border text-white spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>');

    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/committee/emma_upload_penalty.php',
        data:{
            get_task_id: get_task_id,
            get_user_id: get_user_id,
            get_commitee_id: get_commitee_id,
            get_penalty: get_penalty
        },
        success:function(penalty){
            $('#emma_update_task_button').html('<i class="fa fa-upload"></i> Upload');

            if(penalty == 1){
                $.wnoty({
                    type: 'warning',
                    message: "Penalty Already Exists...",
                    autohideDelay: 5000
                });
            }else if(penalty == 2){
                $.wnoty({
                    type: 'success',
                    message: "Penalty Updated Successfully...",
                    autohideDelay: 5000
                });
                $("#modalforuploadingtask").modal('hide');
                // $("#emma_load_upload_penalty").val(get_penalty);
            }else{
                $.wnoty({
                    type: 'warning',
                    message: "Penalty Already Exists...",
                    autohideDelay: 5000
                });
            }
        }
    })
});

$('body').on('click','#ekene_view_membericontable',function(){
    var task_id = $(this).data('task');
    var commitee_id = $(this).data('comm');
    var user_id = $("#user_id").val();
    var user_type = $("#user_type").val();
    // var status_id = $(".keep_status_id").val();

    $(".load_view_content").html('<div align="center"><div class="spinner-border text-primary spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div></div>');

    $.ajax({
        type:'POST',
        url:"../../controller/scripts/owner/committee/emma_view_conclusion.php",
        data:{
            task_id: task_id,
            commitee_id: commitee_id,
            user_id: user_id,
            user_type: user_type
        },
        success:function(view){
            if (view .trim()=== '2') {
                $('#emma_approve_task_button').prop('disabled', true);

                $(".load_view_content").html(`  <div class="card">
                    <div class="card-body text-center text-danger">
                        <b>No Penalty Set</b>
                    </div>
                </div>`);
            }else{
                $(".load_view_content").html(view);


                var status_idcont = $(".keep_status_id").val();

                if(status_idcont == '1')
                {
                    $('#emma_approve_task_button')
                .removeClass('btn-success')
                .addClass('btn-danger')
                .html('<i class="fas fa-times"></i> Decline');

                }else{
                    $('#emma_approve_task_button')
                    .removeClass('btn-danger')
                    .addClass('btn-success')
                    .html('<i class="fas fa-check"></i> Approve');
                }

                $('#emma_approve_task_button').prop('disabled', false);
            }
        }
    })
});

$('body').on('click','#emma_approve_task_button',function(){

    $("#emma_approve_task_button").html('<div class="spinner-border text-white spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>');

    var offence_id = $(".keep_offence_id").val();
    var commitee_id = $(".keep_commitee_id").val();
    var task_id = $(".keep_task_id").val();
    var status_id = $(".keep_status_id").val();
    var user_id = $("#user_id").val();
    var user_type = $("#user_type").val();

    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/committee/emma_approve_conclusion.php',
        data:{
            offence_id: offence_id,
            commitee_id: commitee_id,
            task_id: task_id,
            status_id: status_id
        },
        success:function(approve){
            $("#emma_approve_task_button").html('<i class="fas fa-check"></i> Approve');

            if(approve == 'first1'){
                $.wnoty({
                    type: 'success',
                    message: "Penalty Approved Successfully...",
                    autohideDelay: 5000
                });

                $('#emma_approve_task_button')
                .removeClass('btn-success')
                .addClass('btn-danger')
                .html('<i class="fas fa-times"></i> Decline');

                $.ajax({
                    type:'POST',
                    url:"../../controller/scripts/owner/committee/emma_view_conclusion.php",
                    data:{
                        task_id: task_id,
                        commitee_id: commitee_id,
                        user_id: user_id,
                        user_type: user_type
                    },
                    success:function(view){
                        if (view .trim()=== 'not found') {
                            $('#emma_approve_task_button').prop('disabled', true);
            
                            $(".load_view_content").html(`  <div class="card">
                                <div class="card-body text-center text-danger">
                                    <b>No Penalty Set</b>
                                </div>
                            </div>`);
                        }else{
                            $(".load_view_content").html(view);
                            $('#emma_approve_task_button').prop('disabled', false);
                        }
                    }
                })
            }else{
                $.wnoty({
                    type: 'success',
                    message: "Penalty Denied Successfully...",
                    autohideDelay: 5000
                });

                $('#emma_approve_task_button')
                .removeClass('btn-danger')
                .addClass('btn-success')
                .html('<i class="fas fa-check"></i> Approve');

                $.ajax({
                    type:'POST',
                    url:"../../controller/scripts/owner/committee/emma_view_conclusion.php",
                    data:{
                        task_id: task_id,
                        commitee_id: commitee_id,
                        user_id: user_id,
                        user_type: user_type
                    },
                    success:function(view){
                        if (view .trim()=== 'not found') {
                            $('#emma_approve_task_button').prop('disabled', true);
            
                            $(".load_view_content").html(`  <div class="card">
                                <div class="card-body text-center text-danger">
                                    <b>No Penalty Set</b>
                                </div>
                            </div>`);
                        }else{
                            $(".load_view_content").html(view);
            
                            $('#emma_approve_task_button').prop('disabled', false);
                        }
                    }
                })
            }
        }
    })
});