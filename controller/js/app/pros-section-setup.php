<script>


            $(document).ready(function() {

                              var fullURL = window.location.href;
                              const urlParams = new URLSearchParams(window.location.search);


                              var campusID = urlParams.get('camp');
                              var IntitutionID = localStorage.getItem("abba-stored-institution-id");
                             


                              $('#prosloadsetupcontenthere').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
                              $('#prosloadsectionforinserthere').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

                              
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/pros-get-section-content-here.php",
                                    data: { 
                                          campusID:campusID,
                                          IntitutionID:IntitutionID
                                        },
                                    success: function(result) {

                                        $('#prosloadsetupcontenthere').html(result);

                                    }
                                }); //load sectiion content here   


                                
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/pros-get-section-insert-content-here.php",
                                    data: { 
                                          campusID:campusID,
                                          IntitutionID:IntitutionID
                                        },
                                    success: function(result) {

                                        $('#prosloadsectionforinserthere').html(result);

                                    }
                                });//load section for insert here
           
            });





            // check input usertype
                $('body').on('click', '.generalclass-checksection', function() {
                    var getsection_checked = $(this).data('id');
                    var pros_verify_section_box = $('#' + getsection_checked + ":checked").val();
                        

                        var sectionIDgotten = getsection_checked.replace('prosfacultyid', '');
                        
                    if (pros_verify_section_box == undefined) {



                        $(this).css('outline', '1px solid #007bff');
                        $('.sectionalianameherechecked' + sectionIDgotten).css('outline', '1px solid #007bff');

                        $("#" + getsection_checked).prop("checked", true);

                        $(this).animate({
                                top: '-=20px',

                            }, 'fast', 'swing')
                            .delay(200)
                            .animate({
                                top: '+=20px',

                            }, 'fast', 'swing', function() {
                                pulsate();
                            });

                    } else {

                            $(this).css('outline', 'none');
                            $('.sectionalianameherechecked' + sectionIDgotten).css('outline', 'none');
                            $("#" + getsection_checked).prop("checked", false);

                            $(this).animate({
                                    top: '-=20px',

                                }, 'fast', 'swing')
                                .delay(200)
                                .animate({
                                    top: '+=20px',

                                }, 'fast', 'swing', function() {
                                    pulsate();
                                });

                    }


                });




                //insert section here


                //create section setup start here
                $('body').on('click', '#pros-submitsectionforinsert', function() {


                               $('#pros-submitsectionforinsert').html('<span class="spinner-border spinner-border-sm" aria-hidden="true"></span><span class="visually-hidden" role="status">Loading...</span>submitting..');



                               var fullURL = window.location.href;
                               const urlParams = new URLSearchParams(window.location.search);

                               var campusID = urlParams.get('camp');
                               var IntitutionID = localStorage.getItem("abba-stored-institution-id");

                               var selSchoolFaculty_check = [];
                               var pros_section_alias_name = [];
                               var pros_load_sectionID_alias = [];

                               


                               $('.sectioncheckbox').each(function() {

                                    if ($(this).is(':checked')) {

                                        selSchoolFaculty_check.push($(this).val());


                                        var prosget_sectionID_Attach =  $(this).data('checkverify');

                                        var pros_filter_toge_section = prosget_sectionID_Attach.replace('checksectiongeneral','');

                                        
                                                //load alias name
                                            $('.sectionalianameherechecked'+ pros_filter_toge_section).each(function() {
                                                pros_section_alias_name.push($(this).val());
                                                pros_load_sectionID_alias.push($(this).data('id'));
                                                
                                            });
                                         //load alias name
                                    
                                    }
                                });


                                var proshasemptyvalue_alias = pros_section_alias_name.some(function(value) {
                              return value.trim() === '';
        });



                if (proshasemptyvalue_alias || pros_section_alias_name == '') //section valiadtion
                {

                    
                    $.wnoty({
                        type: 'warning',
                        message: "Hey!!  select the sections you want to create and input an alias for it.",
                        autohideDelay: 5000
                    });

                
                        $('#pros-submitsectionforinsert').html('Submit');


                } else {



                            selSchoolFaculty_check = selSchoolFaculty_check.toString();
                            pros_section_alias_name = pros_section_alias_name.toString();
                            pros_load_sectionID_alias = pros_load_sectionID_alias.toString();




                              


                               $.ajax({
                                    type: "POST",
                                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/pros-insertsection-here.php",
                                    data: {

                                        selSchoolFaculty_check:selSchoolFaculty_check,
                                        pros_section_alias_name:pros_section_alias_name,
                                        pros_load_sectionID_alias:pros_load_sectionID_alias,
                                        campusID:campusID,
                                        IntitutionID:IntitutionID

                                    },
                                    success: function(feeback) {

                                        $('#pros-submitsectionforinsert').html('Submit');

                                        var pros_output = (feeback);
                                        

                                        if (pros_output.trim() == 'success')
                                        {

                                            $.wnoty({
                                                type: 'success',
                                                message: "Great!! school head created successfully.",
                                                autohideDelay: 5000
                                            });







                                            $('#prosloadsetupcontenthere').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
                                             $('#prosloadsectionforinserthere').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

                                            
                                                $.ajax({
                                                    type: "POST",
                                                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/pros-get-section-content-here.php",
                                                    data: { 
                                                        campusID:campusID,
                                                        IntitutionID:IntitutionID
                                                        },
                                                    success: function(result) {

                                                        $('#prosloadsetupcontenthere').html(result);

                                                    }
                                                }); //load sectiion content here   


                                                
                                                $.ajax({
                                                    type: "POST",
                                                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/pros-get-section-insert-content-here.php",
                                                    data: { 
                                                        campusID:campusID,
                                                        IntitutionID:IntitutionID
                                                        },
                                                    success: function(result) {

                                                        $('#prosloadsectionforinserthere').html(result);

                                                    }
                                                });//load section for insert here




                                        }

                                    }

                                });

                        }         



    });




    $('body').on('click', '#prosloaddeletecontentbtn', function() {

        var sectionname = $(this).data('secname');
        var sectionID = $(this).data('id');
        $('#pros-displaydelname-del').html(sectionname);
        $('#prosloaddeletesectionid').val(sectionID);
        
    });


    $('body').on('click', '#pros-submitcsectiondelherebtn', function() {
    
        var sectionID =  $('#prosloaddeletesectionid').val();

        var fullURL = window.location.href;
        const urlParams = new URLSearchParams(window.location.search);

        var campusID = urlParams.get('camp');
        var IntitutionID = localStorage.getItem("abba-stored-institution-id");



        $('#pros-submitcsectiondelherebtn').html('<span class="spinner-border spinner-border-sm" aria-hidden="true"></span><span class="visually-hidden" role="status">Loading...</span>deleting..');


         $.ajax({
                type: "POST",
                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/pros-proceed-todeletesection.php",
                data: { 
                    campusID:campusID,
                    IntitutionID:IntitutionID,
                    sectionID:sectionID,
                    },
                success: function(result) {

                       if(result.trim() == 'success')
                       {


                                $('#prosloadsetupcontenthere').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
                                $('#prosloadsectionforinserthere').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
                            
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/pros-get-section-content-here.php",
                                    data: { 
                                        campusID:campusID,
                                        IntitutionID:IntitutionID
                                        },
                                    success: function(result) {

                                        $('#prosloadsetupcontenthere').html(result);

                                    }
                                }); //load sectiion con


                                $.ajax({
                                        type: "POST",
                                        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/pros-get-section-insert-content-here.php",
                                        data: { 
                                            campusID:campusID,
                                            IntitutionID:IntitutionID
                                            },
                                        success: function(result) {

                                            $('#prosloadsectionforinserthere').html(result);

                                        }
                                    });//load section for insert here


                       }else
                       {

                       }

                    $('#pros-submitcsectiondelherebtn').html('Delete');

                }
            }); //loa




    });
//delete section ende here


    $('body').on('click', '#prosloadsectioneditcontenthere', function() {

                    $('#prosloadesction-editcontent').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

                

                    var fullURL = window.location.href;
                    const urlParams = new URLSearchParams(window.location.search);

                    var campusID = urlParams.get('camp');
                    var IntitutionID = localStorage.getItem("abba-stored-institution-id");
                    var sectionID =  $(this).data('id');

                    $.ajax({
                            type: "POST",
                            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/pros-loadeditsection-contenthere.php",
                            data: { 
                                    campusID:campusID,
                                    IntitutionID:IntitutionID,
                                    sectionID:sectionID
                                },
                            success: function(result) {

                                $('#prosloadesction-editcontent').html(result);

                            }
                        });//load section for insert here

    });




    $('body').on('click', '#prosedititsectiionherebtn', function() {

             $('#prosedititsectiionherebtn').html('<span class="spinner-border spinner-border-sm" aria-hidden="true"></span><span class="visually-hidden" role="status"></span>saving..');


            var fullURL = window.location.href;
            const urlParams = new URLSearchParams(window.location.search);

            var campusID = urlParams.get('camp');
            var IntitutionID = localStorage.getItem("abba-stored-institution-id");
            var sectionID =  $('#prosloadsectionsubmitforeditid').val();
            var sectionName =  $('.proseditsectionvalforeit').val();


            if(sectionName == '')
            {



                  $.wnoty({
                        type: 'warning',
                        message: "Hey!! section should not be left empty",
                        autohideDelay: 5000
                    });

                   $('#prosedititsectiionherebtn').html('Submit');

            }else
            {


                      $.ajax({
                            type: "POST",
                            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/pros-edit-setion-here.php",
                            data: { 
                                    campusID:campusID,
                                    IntitutionID:IntitutionID,
                                    sectionID:sectionID,
                                    sectionName:sectionName
                                },
                            success: function(result) {
                               

                                    $('#prosedititsectiionherebtn').html('Submit');



                                    if(result.trim() == 'success')
                                    {
                                        $.wnoty({
                                            type: 'success',
                                            message: "Great!! section updated successfully.",
                                            autohideDelay: 5000
                                        });
                                    }else
                                    {

                                    }

                            }
                       });//load sect

            }


    });






    
    


</script>