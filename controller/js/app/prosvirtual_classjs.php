
<script>


    $(document).ready(function() {


                var userID = $('#user_id').val();
                var usertype = $('#user_type').val();

                var instutitionID = $(".abba-change-institution option:selected").val();

               $('#prosselectvirtualtosetcampus').html('<option value="NULL">Loading..</option>');
               $('#prosloadliveclasscampus').html('<option value="NULL">Loading..</option>');
    
               

               

                // get campus ajax
                var dataString = 'abba_instituion_id=' + instutitionID;

                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/abba-get-campus.php",
                    data: dataString,
                    //cache: false,
                    success: function (output) {
                        $('#prosselectvirtualtosetcampus').html(output);
                        $('#prosloadliveclasscampus').html(output);
                      

                        
                    }
                });

                //load campus here



                   $('#prosselectvirtualtosetsession').html('<option value="NULL">Loading..</option>');
                   $('#prosloadsessioncontentliveclass').html('<option value="NULL">Loading..</option>');
                   

                    $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/lessonnote/prosloadsessionlessoninsert.php",
                        data: {instutitionID:instutitionID,usertype:usertype,userID:userID},
                        //cache: false,
                        success: function (output) {
                            
                            $('#prosselectvirtualtosetsession').html(output);
                            $('#prosloadsessioncontentliveclass').html(output);

                            
                            
                        }
                    });




    });




    //PROS LOAD TERM ON CHANGE OF CAMPUS
    $('body').on('change', '#prosselectvirtualtosetcampus', function() {

            var campusid = $(this).val();
            var instutitionID = $(".abba-change-institution option:selected").val();

            $('#prosselectvirtualtosetterm').html('<option value="NULL">Loading..</option>');


            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/lessonnote/prosloadtermforcreate.php",
                data: {campusid:campusid,instutitionID:instutitionID},
                //cache: false,
                success: function (output) {
                    $('#prosselectvirtualtosetterm').html(output);
                    
                }
            });


               $('#virtualsettingsclass').html('<option value="NULL">Loading..</option>');

                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/lessonnote/prosloadclassforlesson.php",
                    data: {campusid:campusid,instutitionID:instutitionID},
                    //cache: false,
                    success: function (output) {
                        
                        $('#virtualsettingsclass').html(output);
                        
                    }
                });



        });





        //PROS LOAD CLASS ON CAMPUS CHANGE

        $('body').on('change', '#prosloadliveclasscampus', function() {



                var campusid = $(this).val();
                var instutitionID = $(".abba-change-institution option:selected").val();

                $('#prosloadtermforliveclasscreate').html('<option value="NULL">Loading..</option>');


                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/lessonnote/prosloadtermforcreate.php",
                    data: {campusid:campusid,instutitionID:instutitionID},
                    //cache: false,
                    success: function (output) {
                        $('#prosloadtermforliveclasscreate').html(output);
                        
                    }
                });


               $('#proloadliveclassclass').html('<option value="NULL">Loading..</option>');

                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/lessonnote/prosloadclassforlesson.php",
                    data: {campusid:campusid,instutitionID:instutitionID},
                    //cache: false,
                    success: function (output) {
                        
                        $('#proloadliveclassclass').html(output);
                        
                    }
                });



        });




        $('body').on('change', '#virtualsettingsclass', function() {

            var classid = $(this).val();
            var campusID = $("#prosselectvirtualtosetcampus option:selected").val();

            $('#virtualsettinssubject').html('<option value="NULL">Loading..</option>');

            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/lessonnote/prosloadsubjectforlessoncreat.php",
                data: {campusID:campusID,classid:classid},
                //cache: false,
                success: function (output) {
                    
                    $('#virtualsettinssubject').html(output);
                    
                }
            });


            });//LOAD SUBJECT ON CHNAGE OF CLASS HERE




            
            $('body').on('change', '#proloadliveclassclass', function() {

                var classid = $(this).val();
                var campusID = $("#prosloadliveclasscampus option:selected").val();

                $('#proloadliveclasssubject').html('<option value="NULL">Loading..</option>');

                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/lessonnote/prosloadsubjectforlessoncreat.php",
                    data: {campusID:campusID,classid:classid},
                    //cache: false,
                    success: function (output) {
                        
                        $('#proloadliveclasssubject').html(output);
                        
                    }
                });


            });//LOAD SUBJECT ON CHNAGE OF CLASS HERE FILTER




    $('body').on('click', '#prosset_virtualclassbtn', function(e) {

          

            var campusID = $("#prosselectvirtualtosetcampus option:selected").val();
            var prosselectsession = $("#prosselectvirtualtosetsession option:selected").val();
            var term = $("#prosselectvirtualtosetterm option:selected").val();
            var classid = $("#virtualsettingsclass option:selected").val();
            var subjectID = $("#virtualsettinssubject option:selected").val();

             var start_classdate = $(".prosload_start_classdate").val();
             var start_time = $(".prosload_start_class_starttime").val();
             var end_time = $(".prosload_start_class_endtime").val();

            var userID = $('#user_id').val();
            var usertype = $('#user_type').val();

            var instutitionID = $(".abba-change-institution option:selected").val();


           



                if (campusID == '' || campusID == '0' || campusID == 'NULL') {

                        
                    $.wnoty({
                        type: 'warning',
                        message: "Hey!! Select campus to proceed",
                        autohideDelay: 5000
                    });

                
                    $('#prosset_virtualclassbtn').html("Schedule Now");

                    $("#prosselectvirtualtosetcampus").css('border', '2px solid red');

            }
            else if (prosselectsession == '' || prosselectsession == '0' || prosselectsession == 'NULL') {



                        
                    $.wnoty({
                        type: 'warning',
                        message: "Hey!! Select session to proceed",
                        autohideDelay: 5000
                    });

                   
                    $('#prosset_virtualclassbtn').html("Schedule Now");

                    $("#prosselectvirtualtosetsession").css('border', '2px solid red');

                    $("#prosselectvirtualtosetcampus").css('border', '');



                } else if (term == '' || term == '0' || term == 'NULL') {

                    $.wnoty({
                        type: 'warning',
                        message: "Hey!! Select term to proceed",
                        autohideDelay: 5000
                    });

                    $('#prossaveelssubmitfilecontentherebtn').html("Submit");


                    $('#prosset_virtualclassbtn').html("Schedule Now");

                    $("#prosselectvirtualtosetterm").css('border', '2px solid red');



                    $("#prosselectvirtualtosetsession").css('border', '');

                    $("#prosselectvirtualtosetcampus").css('border', '');



                } else if (classid == '' || classid == '0' || classid == 'NULL') {



                    $.wnoty({
                        type: 'warning',
                        message: "Hey!! Select class to proceed",
                        autohideDelay: 5000
                    });

                    $('#prossaveelssubmitfilecontentherebtn').html("Submit");

                    $("#virtualsettingsclass").css('border', '2px solid red');

                    $("#prosselectvirtualtosetterm").css('border', '');
                    $("#prosselectvirtualtosetsession").css('border', '');
                    $("#prosselectvirtualtosetcampus").css('border', '');


                }else if (subjectID == '' || subjectID == '0' || subjectID == 'NULL') {


                        $.wnoty({
                            type: 'warning',
                            message: "Hey!! Select subject to proceed",
                            autohideDelay: 5000
                        });

                        $('#prossaveelssubmitfilecontentherebtn').html("Submit");
                        $("#virtualsettinssubject").css('border', '2px solid red');



                        $("#virtualsettingsclass").css('border', '');

                        $("#prosselectvirtualtosetterm").css('border', '');
                        $("#prosselectvirtualtosetsession").css('border', '');
                        $("#prosselectvirtualtosetcampus").css('border', '');

                        // start_classdate:start_classdate,
                        // start_time:start_time,
                        // end_time:end_time

                }else if(start_classdate == '' || start_classdate == '0' || start_classdate == 'NULL')
                {

                         $.wnoty({
                            type: 'warning',
                            message: "Hey!! Input class date to proceed",
                            autohideDelay: 5000
                        });

                        $('#prosset_virtualclassbtn').html("Schedule Now");


                        $(".prosload_start_classdate").css('border', '2px solid red');

                        $("#virtualsettinssubject").css('border', '');
                        $("#virtualsettingsclass").css('border', '');
                        $("#prosselectvirtualtosetterm").css('border', '');
                        $("#prosselectvirtualtosetsession").css('border', '');
                        $("#prosselectvirtualtosetcampus").css('border', '');


                }else if(start_time == '' || start_time == '0' || start_time == 'NULL')
                {

                       $.wnoty({
                            type: 'warning',
                            message: "Hey!! Input start time",
                            autohideDelay: 5000
                        });

                        $('#prosset_virtualclassbtn').html("Schedule Now");



                        $(".prosload_start_class_starttime").css('border', '2px solid red');

                        $(".prosload_start_classdate").css('border', '');
                        $("#virtualsettinssubject").css('border', '');
                        $("#virtualsettingsclass").css('border', '');
                        $("#prosselectvirtualtosetterm").css('border', '');
                        $("#prosselectvirtualtosetsession").css('border', '');
                        $("#prosselectvirtualtosetcampus").css('border', '');


                    // var start_time = $(".prosload_start_class_starttime").val();
                    // var end_time = $(".prosload_start_class_endtime").val();

                }else if(end_time == '' || end_time == '0' || end_time == 'NULL')
                {

                       $.wnoty({
                            type: 'warning',
                            message: "Hey!! Input class end time",
                            autohideDelay: 5000
                        });

                        $('#prosset_virtualclassbtn').html("Schedule Now");



                        $(".prosload_start_class_endtime").css('border', '2px solid red');
                        $(".prosload_start_class_starttime").css('border', '');

                        $(".prosload_start_classdate").css('border', '');
                        $("#virtualsettinssubject").css('border', '');
                        $("#virtualsettingsclass").css('border', '');
                        $("#prosselectvirtualtosetterm").css('border', '');
                        $("#prosselectvirtualtosetsession").css('border', '');
                        $("#prosselectvirtualtosetcampus").css('border', '');



                }
                else
                {

                        $(".prosload_start_class_endtime").css('border', '');
                        $(".prosload_start_class_starttime").css('border', '');
                        $(".prosload_start_classdate").css('border', '');
                        $("#virtualsettinssubject").css('border', '');
                        $("#virtualsettingsclass").css('border', '');
                        $("#prosselectvirtualtosetterm").css('border', '');
                        $("#prosselectvirtualtosetsession").css('border', '');
                        $("#prosselectvirtualtosetcampus").css('border', '');

                    // var start_time = $(".prosload_start_class_starttime").val();
                    //  var end_time = $(".prosload_start_class_endtime").val();


                    $('#prosset_virtualclassbtn').html('<center><i class="fa fa-spinner fa-spin fs-3 text-primary"></i></center>');
                    $('#prosset_virtualclassbtn').prop("disabled", true);




                               //     get_longitude_and_latitude(function(coordinates) {

                                // lessonnote
                                //    var latitude = coordinates.latitude;
                                //    var longitude = coordinates.longitude;


                                    $.ajax({
                                        type: "POST",
                                        url: "../../controller/scripts/owner/liveclass/set-virtualclass.php",
                                        data: {

                                            campusID:campusID,
                                            prosselectsession:prosselectsession,
                                            term:term,
                                            classid:classid,
                                            subjectID:subjectID,
                                            instutitionID:instutitionID,
                                            usertype:usertype,
                                            userID:userID,
                                            // latitude:latitude,
                                            // longitude:longitude,
                                            start_classdate:start_classdate,
                                            start_time:start_time,
                                            end_time:end_time
                                        },
                                        //cache: false,
                                        success: function (output) {


                                           
                                            // proloadlessontecontenthere();
                                            // $("#prosloadlesonetecampus").val(campusID);
                                            // $("#prosloadsessioncontentlessonnote").val(prosselectsession);
                                            // $("#prosloadtermforlessonnotecreate").val(term);
                                            // $("#proloadlessonnoteclass").val(classid);

                                            if(output.trim() == 'success')
                                            {
                                                $.wnoty({
                                                    type: 'success',
                                                    message: "Great!! class saved successfully",
                                                    autohideDelay: 5000
                                                });


                                                $('#prossetvirualclass_modal').modal('hide');




                                            }else
                                            {

                                                    if(output.trim() == 'exist')
                                                    {
                                                            $.wnoty({
                                                                type: 'warning',
                                                                message: "Hey!! this class already exist",
                                                                autohideDelay: 5000
                                                            });
                                                        
                                                    }else
                                                    {

                                                        $.wnoty({
                                                        type: 'warning',
                                                        message: "Failed!! please try again",
                                                        autohideDelay: 5000
                                                        });

                                                    }

                                            }
                                            $('#prosset_virtualclassbtn').prop("disabled", false);
                                            $('#prosset_virtualclassbtn').html("Schedule Now");
                                            
                                        }
                                    });


                        //    });


                }



});




    //PROS LOAD CLASSES SET HERE


    $('body').on('click', '#prosload_liveclass_content_btn', function(e) {

            

            
            var campusID = $("#prosloadliveclasscampus option:selected").val();
            var prosselectsession = $("#prosloadsessioncontentliveclass option:selected").val();
            var term = $("#prosloadtermforliveclasscreate option:selected").val();
            var classid = $("#proloadliveclassclass option:selected").val();
            var subjectID = $("#proloadliveclasssubject option:selected").val();

           
           



                if (campusID == '' || campusID == '0' || campusID == 'NULL') {

                                        
                        $.wnoty({
                            type: 'warning',
                            message: "Hey!! Select campus to proceed",
                            autohideDelay: 5000
                        });


                       
                        $("#prosloadliveclasscampus").css('border', '2px solid red');
                        

                }
                else if (prosselectsession == '' || prosselectsession == '0' || prosselectsession == 'NULL') {



                            
                        $.wnoty({
                            type: 'warning',
                            message: "Hey!! Select session to proceed",
                            autohideDelay: 5000
                        });


                        $('#prosset_virtualclassbtn').html("Schedule Now");

                        $("#prosloadsessioncontentliveclass").css('border', '2px solid red');

                        $("#prosloadliveclasscampus").css('border', '');



                } else if (term == '' || term == '0' || term == 'NULL') {



                        $.wnoty({
                            type: 'warning',
                            message: "Hey!! Select term to proceed",
                            autohideDelay: 5000
                        });

                        $('#prossaveelssubmitfilecontentherebtn').html("Submit");


                        $('#prosset_virtualclassbtn').html("Schedule Now");

                        $("#prosloadtermforliveclasscreate").css('border', '2px solid red');

                        $("#prosloadsessioncontentliveclass").css('border', '');
                        $("#prosloadliveclasscampus").css('border', '');



                } else if (classid == '' || classid == '0' || classid == 'NULL') {



                        $.wnoty({
                            type: 'warning',
                            message: "Hey!! Select class to proceed",
                            autohideDelay: 5000
                        });

                        $('#prossaveelssubmitfilecontentherebtn').html("Submit");

                        $("#proloadliveclassclass").css('border', '2px solid red');
                          $("#prosloadtermforliveclasscreate").css('border', '');
                        
                         $("#prosloadsessioncontentliveclass").css('border', '');
                         $("#prosloadliveclasscampus").css('border', '');


                }else
                {

                    prosload_full_liveclass_details(campusID, prosselectsession, term, classid, subjectID);
                }


    });



       function  prosload_full_liveclass_details(campusID, prosselectsession, term, classid, subjectID)
       {


        $("#proloadliveclassclass").css('border', '');
        $("#prosloadtermforliveclasscreate").css('border', '');
        $("#prosloadsessioncontentliveclass").css('border', '');
        $("#prosloadliveclasscampus").css('border', '');

        var userID = $('#user_id').val();
        var usertype = $('#user_type').val();
        var instutitionID = $(".abba-change-institution option:selected").val();


        $('#prosload_class_content').html('<center><i class="fa fa-spinner fa-spin fs-3 text-primary"></i></center>');


        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/liveclass/pros-load-liveclass-content.php",
            data: {

                campusID:campusID,
                prosselectsession:prosselectsession,
                term:term,
                classid:classid,
                subjectID:subjectID,
                instutitionID:instutitionID,
                usertype:usertype,
                userID:userID
            },
            //cache: false,
            success: function (prosoutput) {
                $('#prosload_class_content').html(prosoutput);
            }

        });



       }



       $('body').on('click', '.pros_proceed_deletemodal_btn', function(e) {

             var campusId = $(this).data('camp');
             var virtual_ID = $(this).data('id');

             var subject_id = $(this).data('subj');
             var class_Id = $(this).data('class');

             var term = $(this).data('term');
             var session = $(this).data('session');



             $(".prosload_campus_for_liveclassdelete_here").val(campusId);
             $(".prosload_id_for_liveclassdelete_here").val(virtual_ID);

             $(".prosload_subjid_for_liveclassdelete_here").val(subject_id);
             $(".prosload_classid_for_liveclassdelete_here").val(class_Id);



             $(".prosload_term_for_liveclassdelete_here").val(term);
             $(".prosload_session_for_liveclassdelete_here").val(session);

            
       });



       $('body').on('click', '.pros_delete_liveclasss_btn', function(e) {

           var campusID =  $(".prosload_campus_for_liveclassdelete_here").val();
           var virtual_ID =   $(".prosload_id_for_liveclassdelete_here").val();

            var subjectID_new = $(".prosload_subjid_for_liveclassdelete_here").val();
            var classid =  $(".prosload_classid_for_liveclassdelete_here").val();

            var term  = $(".prosload_term_for_liveclassdelete_here").val();
            var prosselectsession =  $(".prosload_session_for_liveclassdelete_here").val();

            var userID = $('#user_id').val();
            var usertype = $('#user_type').val();
            var instutitionID = $(".abba-change-institution option:selected").val();
             
            
            $('.pros_delete_liveclasss_btn').html('<center><i class="fa fa-spinner fa-spin fs-3 text-primary"></i></center>');
            $('.pros_delete_liveclasss_btn').prop("disabled", true);



            var subjectID = 'NULL';




                //     get_longitude_and_latitude(function(coordinates) {

                // lessonnote
                //    var latitude = coordinates.latitude;
                //    var longitude = coordinates.longitude;


                    $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/liveclass/pros_deleteclass.php",
                        data: {

                            campusID:campusID,
                            virtual_ID:virtual_ID,
                            classid:classid,
                            subjectID:subjectID_new,
                            instutitionID:instutitionID,
                            usertype:usertype,
                            userID:userID,
                            // latitude:latitude,
                            // longitude:longitude,
                            
                        },
                        //cache: false,
                        success: function (output) {


                            if(output.trim() == 'success')
                            {
                                $.wnoty({
                                    type: 'success',
                                    message: "Great!!  class deleted",
                                    autohideDelay: 5000
                                });


                                $('#pros_deleteliveclass_modal').offcanvas('hide');


                                prosload_full_liveclass_details(campusID, prosselectsession, term, classid, subjectID);




                            }else
                            {
                                  
                                        $.wnoty({
                                        type: 'warning',
                                        message: "Failed!! please try again",
                                        autohideDelay: 5000
                                        });
                                  

                            }
                            $('.pros_delete_liveclasss_btn').prop("disabled", false);
                            $('.pros_delete_liveclasss_btn').html('Delete');
                            
                        }
                    });


        //    });


              
       });



       

       $('body').on('click', '.pros_proceed_editmodal_btn', function(e) {
             var campusId = $(this).data('camp');
             var virtual_ID = $(this).data('id');
             var subject_id = $(this).data('subj');
             var class_Id = $(this).data('class');
             var term = $(this).data('term');
             var session = $(this).data('session');
             var stime = $(this).data('stime');
             var etime = $(this).data('etime');
             var date = $(this).data('date');

             $('.prosload_start_classdate_edit').val(date);
             $('.prosload_start_class_starttime_edit').val(stime);
             $('.prosload_start_class_endtime_edit').val(etime);
             $(".prosload_campus_for_liveclassdelete_here_edit").val(campusId);
             $(".prosload_id_for_liveclassdelete_here_edit").val(virtual_ID);
             $(".prosload_subjid_for_liveclassdelete_here_edit").val(subject_id);
             $(".prosload_classid_for_liveclassdelete_here_edit").val(class_Id);
             $(".prosload_term_for_liveclassdelete_here_edit").val(term);
             $(".prosload_session_for_liveclassdelete_here_edit").val(session);
       });



       $('body').on('click', '#pros_edit_liveclass_finalbtn', function(e) {


            var start_classdate = $('.prosload_start_classdate_edit').val();
            var start_time =   $('.prosload_start_class_starttime_edit').val();
            var end_time =    $('.prosload_start_class_endtime_edit').val();

           

            var campusID =  $(".prosload_campus_for_liveclassdelete_here_edit").val();
            var subjectID = $(".prosload_subjid_for_liveclassdelete_here_edit").val();
            var classid =  $(".prosload_classid_for_liveclassdelete_here_edit").val();
            var term  = $(".prosload_term_for_liveclassdelete_here_edit").val();
            var prosselectsession =  $(".prosload_session_for_liveclassdelete_here_edit").val();

            var virtual_ID =   $(".prosload_id_for_liveclassdelete_here_edit").val();

            var userID = $('#user_id').val();
            var usertype = $('#user_type').val();
            var instutitionID = $(".abba-change-institution option:selected").val();


           
            $('#pros_edit_liveclass_finalbtn').prop("disabled", true);
            $('#pros_edit_liveclass_finalbtn').html('<center><i class="fa fa-spinner fa-spin fs-1 text-primary"></i></center>');




                //     get_longitude_and_latitude(function(coordinates) {

                // lessonnote
                //    var latitude = coordinates.latitude;
                //    var longitude = coordinates.longitude;


                $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/liveclass/pros_editlive_class.php",
                        data: {

                            campusID:campusID,
                            classid:classid,
                            subjectID:subjectID,
                            instutitionID:instutitionID,
                            usertype:usertype,
                            userID:userID,
                            virtual_ID:virtual_ID,
                            term:term,
                            prosselectsession:prosselectsession,
                            start_classdate:start_classdate,
                            start_time:start_time,
                            end_time:end_time
                            // latitude:latitude,
                            // longitude:longitude,
                            
                        },
                        //cache: false,
                        success: function (output) {


                            if(output.trim() == 'success')
                            {
                                $.wnoty({
                                    type: 'success',
                                    message: "Great!!  class editted successfully",
                                    autohideDelay: 5000
                                });


                                $('#pros_editliveclass_modal').modal('hide');


                                prosload_full_liveclass_details(campusID, prosselectsession, term, classid, subjectID);




                            }else
                            {
                                  
                                        $.wnoty({
                                        type: 'warning',
                                        message: "Failed!! please try again",
                                        autohideDelay: 5000
                                        });
                                  

                            }

                            $('#pros_edit_liveclass_finalbtn').prop("disabled", false);
                            $('#pros_edit_liveclass_finalbtn').html(' <i class="fa fa-edit"> Save</i>');
                            
                        }
                    });


        //    });






        
       });

       

// SELECT ALL QUESTION CHECKBOX
$("body").on("change", "#pros_select_all_class", function () {  //"select all" change 
        
        var checkStatus = $(this).prop('checked');

            if (checkStatus == true) {

                $(".prosloadsigngleclasshere").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status

                var selTotal = $('.prosloadsigngleclasshere:checked').length;

                $('#prosloadnumberofclasesselected').html('(' + selTotal + ' <i class="fa fa-trash"></i>)');
                $("#prosloadnumberofclasesselected").fadeIn("slow");

            }
            else if (checkStatus == false) {

                $(".prosloadsigngleclasshere").prop('checked', false); //change "select all" checked status to false
                var selTotal = $('.prosloadsigngleclasshere:checked').length;
                $("#prosloadnumberofclasesselected").fadeOut("slow");
            }

    });   




                            // select single parent checkbox
            $('body').on('change', '.prosloadsigngleclasshere', function () {

            if ($('.prosloadsigngleclasshere:checked').length == $('.prosloadsigngleclasshere').length) {

                $("#pros_select_all_class").prop('checked', true);
                var selTotal = $('.prosloadsigngleclasshere:checked').length;

                if (selTotal > 0) {
                    $('#prosloadnumberofclasesselected').html('(' + selTotal + ' <i class="fa fa-trash"></i>)');
                    $("#prosloadnumberofclasesselected").fadeIn("slow");
                }
                else {
                    $("#prosloadnumberofclasesselected").fadeOut("slow");
                }

            }
            else if ($('.prosloadsigngleclasshere:checked').length != $('.prosloadsigngleclasshere').length) {

                $("#pros_select_all_class").prop('checked', false);
                var selTotal = $('.prosloadsigngleclasshere:checked').length;

                if (selTotal > 0) {
                    $('#prosloadnumberofclasesselected').html('(' + selTotal + ' <i class="fa fa-trash"></i>)');
                    $("#prosloadnumberofclasesselected").fadeIn("slow");
                }
                else {
                    $("#prosloadnumberofclasesselected").fadeOut("slow");
                }
            }


            });



            $('body').on('click', '#prosloadnumberofclasesselected', function () {
                // alert('hello');
                $('#pros_deleteliveclassulk_modal').offcanvas('show');
            });



            $('body').on('click', '.pros_delete_liveclasssbulk_btn', function () {



                var campusID =  [];
                var virtual_ID =   [];

                var subjectID = [];
                var classid =  [];
                var term  = [];
                var prosselectsession = [];


                $.each($(".prosloadsigngleclasshere:checked"), function(){
                    var campusId = $(this).data('camp');
                    var virtualID = $(this).data('id');
                    var subject_id = $(this).data('subj');
                    var class_Id = $(this).data('class');
                    var termnew = $(this).data('term');
                    var session = $(this).data('session');

                    campusID.push(campusId);
                    virtual_ID.push(virtualID);
                    subjectID.push(subject_id);
                    classid.push(class_Id);
                    term.push(termnew);
                    prosselectsession.push(session);
                });




                    var campusID_new =  campusID.toString();
                    var virtual_ID_new =   virtual_ID.toString();
                    var subjectID_new = subjectID.toString();
                    var classid_new =  classid.toString();
                    var term_new  = term.toString();
                    var prosselectsession_new = prosselectsession.toString();



                    var campusID =  campusID[0]
                    var virtual_ID =   virtual_ID[0];
                    var subjectID = 'NULL';
                    var classid =  classid[0];
                    var term  = term[0];
                    var prosselectsession = prosselectsession[0];

                    var userID = $('#user_id').val();
                    var usertype = $('#user_type').val();
                    var instutitionID = $(".abba-change-institution option:selected").val();


                
                    $('.pros_delete_liveclasssbulk_btn').prop("disabled", true);
                    $('pros_delete_liveclasssbulk_btn').html('<center><i class="fa fa-spinner fa-spin fs-1 text-light"></i></center>deleting');







                //     get_longitude_and_latitude(function(coordinates) {

                // lessonnote
                //    var latitude = coordinates.latitude;
                //    var longitude = coordinates.longitude;



                    $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/liveclass/pros_deleteclass.php",
                        data: {

                            campusID:campusID_new,
                            virtual_ID:virtual_ID_new,
                            classid:classid_new,
                            subjectID:subjectID_new,
                            instutitionID:instutitionID,
                            usertype:usertype,
                            userID:userID,
                            // latitude:latitude,
                            // longitude:longitude,
                            
                        },
                        //cache: false,
                        success: function (output) {


                            if(output.trim() == 'success')
                            {
                                $.wnoty({
                                    type: 'success',
                                    message: "Great!!  class deleted",
                                    autohideDelay: 5000
                                });
                                $('#pros_deleteliveclassulk_modal').offcanvas('hide');

                                prosload_full_liveclass_details(campusID, prosselectsession, term, classid, subjectID);

                            }else
                            {
                            
                                $.wnoty({
                                type: 'warning',
                                message: "Failed!! please try again",
                                autohideDelay: 5000
                                });
                                  

                            }

                             $('.pros_delete_liveclasssbulk_btn').prop("disabled", false);
                             $('pros_delete_liveclasssbulk_btn').html('Delete');

                            
                        }
                    });


        //    });








                   

              

            });



            

    </script>
