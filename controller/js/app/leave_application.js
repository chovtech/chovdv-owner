$(document).ready(function(){
    var keep_staff_id = $(".keep_staff_ide").val();
    var keep_institution_id = $(".keep_institution_ide").val();

    $(".load_leave_card_table").html('<div class="text-center text-primary"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');

    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/leave_application/emma_display_leave.php',
        data:{
            keep_staff_id: keep_staff_id,
            keep_institution_id: keep_institution_id
        },
        success:function(result){
            $(".load_leave_card_table").html(result);
        }
    })

    $(".load_or_keep_leaves").html('<div class="text-center text-primary"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');

    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/leave_application/emma_display_leave_record.php',
        data:{
            keep_staff_id: keep_staff_id,
            keep_institution_id: keep_institution_id
        },
        success:function(result){
            $(".load_or_keep_leaves").html(result);
        }
    })

    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/leave_application/emma_get_campus.php',
        data:{
            keep_institution_id: keep_institution_id
        },
        success:function(result){
            $(".keep_camp").val(result);
        }
    })

    $(".emmaloadcampusforleave").html("<option value='NULL'>Loading...</option>");

    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/leave_application/emma_get_leave_session.php',
        data:{
            keep_staff_id: keep_staff_id,
            keep_institution_id: keep_institution_id
        },
        success:function(result){
            $(".emmaloadcampusforleave").html(result);
        }
    })
});

$("body").on("click","#ex2-tab-leave-settings",function(){
    $('#ex1-tabs-leave-history').hide();
    $('#ex1-tabs-leave-settings').show();
});

$("body").on("click","#ex1-tab-leave-history",function(){
    $('#ex1-tabs-leave-history').show();
    $('#ex1-tabs-leave-settings').hide();
});

$("body").on("click",".apply_for_leave_button",function(){
    var get_leave_title = $(".get_leave_title").val();
    var get_leave_start_date = $(".get_leave_start_date").val();
    var get_leave_end_date = $(".get_leave_end_date").val();
    var keep_staff_id = $(".keep_staff_id").val();
    var keep_institution_id = $(".keep_institution_id").val();
    var campus = $(".keep_camp").val();

    var startDate = new Date(get_leave_start_date);
    var endDate = new Date(get_leave_end_date);

    // Calculate the difference in milliseconds
    var differenceMs = endDate - startDate;

    // Convert milliseconds to days
    var differenceDays = differenceMs / (1000 * 60 * 60 * 24);

    if(get_leave_title == '' || get_leave_title == 'NULL'){
        $.wnoty({
            type: 'warning',
            message: "Add Leave Title...",
            autohideDelay: 5000
        });
    }else if(get_leave_start_date == '' || get_leave_start_date == 'NULL'){
        $.wnoty({
            type: 'warning',
            message: "Add Start Date...",
            autohideDelay: 5000
        });
    }else if(get_leave_end_date == '' || get_leave_end_date == 'NULL'){
        $.wnoty({
            type: 'warning',
            message: "Add End Date...",
            autohideDelay: 5000
        });
    }else if(get_leave_start_date >= get_leave_end_date){
        $.wnoty({
            type: 'warning',
            message: "End date must be greater than start date...",
            autohideDelay: 5000
        });
    }else{
        $(".apply_for_leave_button").html('<div class="spinner-border text-white spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>');
        $(".load_leave_card_table").html('<div class="text-center text-primary"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');

        get_longitude_and_latitude(function(coordinates) {
            var latitude = coordinates.latitude;
            var longitude = coordinates.longitude;
            var userid = $(".keep_staff_id").val();
            var usertype = $(".keep_usertype").val();

            $.ajax({
                type:'POST',
                url:'../../controller/scripts/owner/leave_application/emma_insert_leave.php',
                data:{
                    get_leave_title: get_leave_title,
                    get_leave_start_date: get_leave_start_date,
                    get_leave_end_date: get_leave_end_date,
                    keep_staff_id: keep_staff_id,
                    keep_institution_id: keep_institution_id,
                    differenceDays: differenceDays,
                    latitude: latitude,
                    longitude: longitude,
                    userid: userid,
                    usertype: usertype,
                    campus: campus
                },
                success:function(outcome){
                    
                    // alert(outcome)

                $(".apply_for_leave_button").html('<i class="fas fa-plus-circle"></i> Apply');

                    if(outcome == 1){
                        $.wnoty({
                            type: 'warning',
                            message: "Leave Already Exists...",
                            autohideDelay: 5000
                        });
                    }
                    else if(outcome == 2)
                    {
                        $.wnoty({
                            type: 'success',
                            message: "Leave Applied Successfully...",
                            autohideDelay: 5000
                        });

                        $("#emma_apply_for_leave_modal").modal('hide');

                        $.ajax({
                            type:'POST',
                            url:'../../controller/scripts/owner/leave_application/emma_display_leave.php',
                            data:{
                                keep_staff_id: keep_staff_id,
                                keep_institution_id: keep_institution_id
                            },
                            success:function(result){
                                $(".load_leave_card_table").html(result);
                            }
                        })

                        $(".load_or_keep_leaves").html('<div class="text-center text-primary"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');

                        $.ajax({
                            type:'POST',
                            url:'../../controller/scripts/owner/leave_application/emma_display_leave_record.php',
                            data:{
                                keep_staff_id: keep_staff_id,
                                keep_institution_id: keep_institution_id
                            },
                            success:function(result){
                                $(".load_or_keep_leaves").html(result);
                            }
                        })
                    }
                    else
                    {
                        $.wnoty({
                            type: 'warning',
                            message: "Leave Not Applied...",
                            autohideDelay: 5000
                        });
                    }
                }
            })
        });

    }
});

$("body").on("click",".save_leave_limit_per_year",function(){
    var get_limit = $(".leave_limit_per_year").val();
    var keep_institution_id = $(".abba-change-institution").val();
    var session = $(".emmaloadcampusforleave").val();

    if(session == 'NULL' || session == ''){
        $.wnoty({
            type: 'warning',
            message: "Select Sesion...",
            autohideDelay: 5000
        });
    }else if(get_limit == '' || get_limit == 'NULL'){
        $.wnoty({
            type: 'warning',
            message: "Add Number Of Leave...",
            autohideDelay: 5000
        });
    }else{
        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/leave_application/emma_leave_settings.php',
            data:{
                get_limit: get_limit,
                keep_institution_id: keep_institution_id,
                session: session
            },
            success:function(limit){
                if(limit == 1){
                    $.wnoty({
                        type: 'warning',
                        message: "Leave Setting Already Exists...",
                        autohideDelay: 5000
                    });
                }else if(limit == 2){
                    $.wnoty({
                        type: 'success',
                        message: "Setting Created Successfully...",
                        autohideDelay: 5000
                    });
                }else{
                    $.wnoty({
                        type: 'warning',
                        message: "Settings Doesn't Exists...",
                        autohideDelay: 5000
                    });
                }
            }
        })
    }
});

$(document).ready(function(){

    var keep_staff_id = $("#user_id").val();
    var keep_institution_id = $(".abba-change-institution").val();

    $(".emma_display_table_for_owner").html('<div class="text-center text-primary"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');

   $("#emma_load_session_for_leave").html("<option value='NULL'>Loading...</option>");

    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/leave_application/get_session.php',
        data:{
            keep_institution_id: keep_institution_id
        },
        success:function(display_table){
            $("#emma_load_session_for_leave").html(display_table);
        }
    })

    
    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/leave_application/display_leave_for_owner.php',
        data:{
            keep_staff_id: keep_staff_id,
            keep_institution_id: keep_institution_id
        },
        success:function(display_table){
            $(".emma_display_table_for_owner").html(display_table);
        }
    })

    $(".load_settings_table").html('<div class="text-center text-primary"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');

    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/leave_application/display_leave_settings.php',
        data:{
            keep_institution_id: keep_institution_id
        },
        success:function(outcome){
            $(".load_settings_table").html(outcome);
        }
    })

    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/leave_application/emma_get_campus.php',
        data:{
            keep_institution_id: keep_institution_id
        },
        success:function(result){
            $(".keep_campus").val(result);
        }
    })
});

$("body").on("change","#emma_load_session_for_leave",function(){
    var this_session = $(this).val();
    var keep_institution_id = $(".abba-change-institution").val();

    $(".emma_display_table_for_owner").html('<div class="text-center text-primary"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');
    
    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/leave_application/filter_leave_by_start_date.php',
        data:{
            this_session: this_session,
            keep_institution_id: keep_institution_id
        },
        success:function(display_table){
            $(".emma_display_table_for_owner").html(display_table);
        }
    })
});

$("body").on("click",".emma_approve_leave",function(){
    var keep_staff_id = $(this).data('userid');
    var keep_institution_id = $(".abba-change-institution").val();
    var leave_id = $(this).data('id');
    var campus = $(".keep_campus").val();

    get_longitude_and_latitude(function(coordinates) {
        var latitude = coordinates.latitude;
        var longitude = coordinates.longitude;
        var userid = $("#user_id").val();
        var usertype = $("#user_type").val();

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/leave_application/emma_approve_or_reject_leave.php',
            data:{
                keep_staff_id: keep_staff_id,
                keep_institution_id: keep_institution_id,
                leave_id: leave_id,
                campus: campus,
                latitude: latitude,
                longitude: longitude,
                userid: userid,
                usertype: usertype
            },
            success:function(result){

                if(result == 1){
                    $.wnoty({
                        type: 'success',
                        message: "Leave Approved Successfully...",
                        autohideDelay: 5000
                    });
                    // button.prop('disabled', true);
                    $(".emma_display_table_for_owner").html('<div class="text-center text-primary"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');

                    $.ajax({
                        type:'POST',
                        url:'../../controller/scripts/owner/leave_application/display_leave_for_owner.php',
                        data:{
                            keep_staff_id: keep_staff_id,
                            keep_institution_id: keep_institution_id
                        },
                        success:function(display_table){
                            $(".emma_display_table_for_owner").html(display_table);
                        }
                    })
                }else if(result == 3){
                    $.wnoty({
                        type: 'warning',
                        message: "Leave Not Approved......",
                        autohideDelay: 5000
                    });
                }else{
                    $.wnoty({
                        type: 'warning',
                        message: "Leave Error...",
                        autohideDelay: 5000
                    });
                }
            }
        })
    });  
})

$("body").on("click",".emma_decline_leave",function(){
    var keep_staff_id = $(this).data('userid');
    var keep_institution_id = $(".abba-change-institution").val();
    var leave_id = $(this).data('id');
    var status = $(this).data('status');

    var button = $(this); // Store reference to the button

    var campus = $(".keep_campus").val();

    get_longitude_and_latitude(function(coordinates) {
        var latitude = coordinates.latitude;
        var longitude = coordinates.longitude;
        var userid = $("#user_id").val();
        var usertype = $("#user_type").val();
        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/leave_application/emma_approve_or_reject_leave_two.php',
            data:{
                keep_staff_id: keep_staff_id,
                keep_institution_id: keep_institution_id,
                leave_id: leave_id,
                status: status,
                campus: campus,
                latitude: latitude,
                longitude: longitude,
                userid: userid,
                usertype: usertype
            },
            success:function(result){
                if(result == 1){
                    $.wnoty({
                        type: 'success',
                        message: "Leave Declined Successfully...",
                        autohideDelay: 5000
                    });

                    // button.prop('disabled', true);
                    $(".emma_display_table_for_owner").html('<div class="text-center text-primary"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');


                    $.ajax({
                        type:'POST',
                        url:'../../controller/scripts/owner/leave_application/display_leave_for_owner.php',
                        data:{
                            keep_staff_id: keep_staff_id,
                            keep_institution_id: keep_institution_id
                        },
                        success:function(display_table){
                            $(".emma_display_table_for_owner").html(display_table);
                        }
                    })
                }else if(result == 3){
                    $.wnoty({
                        type: 'warning',
                        message: "Leave Not Declined......",
                        autohideDelay: 5000
                    });
                }else{
                    $.wnoty({
                        type: 'warning',
                        message: "Leave Error...",
                        autohideDelay: 5000
                    });
                }
            }
        })
    });
})

$("body").on("click","#emma_view_leave_details",function(){
    var data_id = $(this).data('id');
    var data_institution = $(this).data('institution');
    var data_userid = $(this).data('userid');
    $(".emma_keep_view_details").html('<div class="text-center text-primary"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');


    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/leave_application/view_leave_details.php',
        data:{
            data_id: data_id,
            data_institution: data_institution,
            data_userid: data_userid
        },
        success:function(view){
            $(".emma_keep_view_details").html(view);
        }
    })
});

$("body").on("click","#emma_edit_leave_settings",function(){

    var session = $(this).data('session');
    var maximum_days = $(this).data('days');
    var data_id = $(this).data('id');
    var institute = $(this).data('institute');

    $(".edit_leave_session").val(session);
    $(".leave_settings_institution_id").val(institute);
    $(".edit_leave_limit_per_year").val(maximum_days);
    $(".leave_settings_data_id").val(data_id);
});


$("body").on("click",".edit_leave_limit_per_year",function(){

    var session = $(".edit_leave_session").val();
    var maximum_days = $(".edit_leave_limit_per_year").val();
    var data_id = $(".leave_settings_data_id").val();
    var keep_institution_id = $(".leave_settings_institution_id").val();
    var campus = $(".keep_campus").val();


    if(maximum_days == '' || maximum_days == 'NULL'){
        $.wnoty({
            type: 'warning',
            message: "Add yearly leave days.",
            autohideDelay: 5000
        });
    }else{

        get_longitude_and_latitude(function(coordinates) {
            var latitude = coordinates.latitude;
            var longitude = coordinates.longitude;
            var userid = $("#user_id").val();
            var usertype = $("#user_type").val();

            $.ajax({
                type:'POST',
                url:'../../controller/scripts/owner/leave_application/emma_edit_leave_settings.php',
                data:{
                    session: session,
                    maximum_days: maximum_days,
                    data_id: data_id,
                    institute_id: keep_institution_id,
                    campus: campus,
                    latitude: latitude,
                    longitude: longitude,
                    userid: userid,
                    usertype: usertype
                },
                success:function(edit_settings){
                    if(edit_settings == 1){
                        $.wnoty({
                            type: 'success',
                            message: "Settings Updated Successfully...",
                            autohideDelay: 5000
                        });

                        $(".load_settings_table").html('<div class="text-center text-primary"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');

                        $.ajax({
                            type:'POST',
                            url:'../../controller/scripts/owner/leave_application/display_leave_settings.php',
                            data:{
                                keep_institution_id: keep_institution_id
                            },
                            success:function(outcome){
                                $(".load_settings_table").html(outcome);
                            }
                        })
                    }else{
                        $.wnoty({
                            type: 'warning',
                            message: "Setting Not Updated...",
                            autohideDelay: 5000
                        });
                    }
                }
            })
        })
    }
});