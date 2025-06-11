<script>



    $(document).ready(function () {


        $('#prostemplate_show_gs_template').fadeIn();

         prosloadschemeworkhere();

         var abba_get_stored_instituion_id = $(".abba-change-institution option:selected").val();
 
         // get campus 
          var dataString = 'abba_instituion_id=' + abba_get_stored_instituion_id;
            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/abba-get-campus.php",
                data: dataString,
                //cache: false,
                success: function (output) {
                    $('#abba_display_campus').html(output);
                    
                }
            });

            $('#pros_display_ca_campus').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

            $.ajax({
                type: "POST",
                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/pros-get_campus_for_scheme_work.php",
                data: { abba_instituion_id: abba_get_stored_instituion_id },
                //cache: false,
                success: function (output)
                {

                
                    
                    $('#pros_display_ca_campus').html(output);

                    $.ajax({
                        type: "POST",
                        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/pros-check_schemeworktag.php",
                        data: { abba_instituion_id: abba_get_stored_instituion_id },
                        //cache: false,
                        success: function (data) {


                            if (data.trim() == 'onboarding') {
                                $('#caonboardingModal').modal('show');
                            }



                            $(document).ready(function () {

                                // hidden things
                                $(".form-business").hide();
                                // next button
                                

                                $(".next").on({
                                    click: function () {
                                        // select any card
                                        var getValue = $(this).parents(".row").find(".abba_card").hasClass("active-card");

                                        var campus_id = $('.active-card').data('id');


                                                if (getValue) {
                                                    

                                                    $('#prosloadsection-here').html('<option value="0">loading...</option>');
                                                    $('#prosloatermfor-create-schemework').html('<option value="0">loading...</option>');

                                                    $('#prosloadrigion-here-template').html('<option value="0">loading...</option>');
                                                    $('#prosloatermfor-create-schemework-template').html('<option value="0">loading...</option>');
                                                    $('#prosloadclass-schemework-template').html('<option value="0">loading...</option>');


                                                    
                                                    
                                                        //load section for school here
                                                        $.ajax({

                                                                type: "POST",
                                                                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosload-section-schemeofwork.php",
                                                                data: { campus_id: campus_id,abba_instituion_id: abba_get_stored_instituion_id  },
                                                                //cache: false,
                                                                success: function (prosoutputdata) {
                                                                        
                                                                    $('#prosloadsection-here').html(prosoutputdata);
                                                                }
                                                            });   
                                                        //load section for school here


                                                        //load Edumess section  here

                                                        var prosloadedumess_section = 'legendary';       

                                                            $.ajax({

                                                                type: "POST",
                                                                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosload-edumess-section-schemeofwork.php",
                                                                data: {prosloadedumess_section:prosloadedumess_section},
                                                                //cache: false,
                                                                success: function (prosoutputdata) {
                                                                            
                                                                    $('#prosloadrigion-here-template').html(prosoutputdata);
                                                                }
                                                            });   
                                                        //load Edumess section  here



                                                        //load Edumess classes  here
                                                                $.ajax({

                                                                    type: "POST",
                                                                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosload-edumess-classes-schemeofwork.php",
                                                                    data: {prosloadedumess_section:prosloadedumess_section},
                                                                    //cache: false,
                                                                    success: function (prosoutputdata) {
                                                                                
                                                                        $('#prosloadclass-schemework-template').html(prosoutputdata);
                                                                    }
                                                                });   
                                                        //load Edumess classes  here



                                                        
                                                        //load term for school here
                                                            $.ajax({

                                                                type: "POST",
                                                                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosload-term-schemeofwork.php",
                                                                data: { campus_id: campus_id,abba_instituion_id: abba_get_stored_instituion_id  },
                                                                //cache: false,
                                                                success: function (prosoutputdata) {
                                                                    
                                                                    $('#prosloatermfor-create-schemework').html(prosoutputdata);
                                                                }
                                                            });   

                                                        //load term for school here


                                                        //load term for edumess here
                                                            $.ajax({

                                                                type: "POST",
                                                                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosload-edumess-term-schemeofwork.php",
                                                                data: {prosloadedumess_section:prosloadedumess_section},
                                                                //cache: false,
                                                                success: function (prosoutputdata) {
                                                                    
                                                                    $('#prosloatermfor-create-schemework-template').html(prosoutputdata);
                                                                }
                                                            });   

                                                        //load term for edumess here



                                                            $(this).parents(".row").fadeOut("slow", function () {
                                                                $(this).next(".row").fadeIn("slow");
                                                            });

                                                            // $('#prosloadschemetemplate').hide('slow');

                                                }else
                                                {
                                                        $.wnoty({
                                                            type: 'warning',
                                                            message: "Hey, select a campus to proceed.",
                                                            autohideDelay: 5000
                                                        }); 
                                                }
                                        
                                    }
                                });    

                                // Active card on click function
                                $(".abba_card").on({
                                    click: function () {
                                        $(this).toggleClass("active-card");
                                        $(this).parent(".col").siblings().children(".abba_card").removeClass("active-card");
                                    }
                                });


                                $(".back").on({
                                    click: function () {
                                        $("#progressBar .active").last().removeClass("active");
                                        $(this).parents(".row").fadeOut("slow", function () {
                                            $(this).prev(".row").fadeIn("slow");
                                        });
                                    }

                                });



                            });





                        }
                        
                    });
                }
            });  



                //onchange on section  here

                $("#prosloadsection-here").on({

                
                        change: function () {
                            // $('#prosloadschemetemplate').fadeIn('slow');
                            var campus_id = $('.active-card').data('id');
                            var sectionID = $(this).val();
                            
                        
                            $('#prosloadsubject-schemework').html('<option value="0">loading...</option>');
                            
                            $('.prosloadclasshere-for-schemmework').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
                            

                        //load school subject here         
                            $.ajax({
                                type: "POST",
                                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/pros-load-subjectfor-schemework-create.php",
                                data: { abba_instituion_id: abba_get_stored_instituion_id,campus_id:campus_id,sectionID:sectionID },
                                //cache: false,
                                success: function (output)
                                {
                                    
                                    
                                    $('#prosloadsubject-schemework').html(output);

                                }
                            });
                            //load school subject here        


                            



                            $.ajax({
                                type: "POST",
                                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/pros-load-classfor-schemework-create.php",
                                data: { abba_instituion_id: abba_get_stored_instituion_id,campus_id:campus_id,sectionID:sectionID },
                                //cache: false,
                                success: function (output)
                                {
                                    
                                    
                                    $('.prosloadclasshere-for-schemmework').html(output);


                                }
                            });



                        }

                    });
                //onchange on section  here
            

                //onchange on template section  here

                $("#prosloadclass-schemework-template").on({
                
                change: function () {
                    $('#prosloadsubject-schemework-template').html('<option value="0">loading...</option>');

                        var edumess_classID = $(this).val();

                            //load school edumess subject here   
                                $.ajax({
                                            type: "POST",
                                            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/pros-load-subjectfor-edumess-schemework-create.php",
                                            data: {edumess_classID:edumess_classID},
                                            //cache: false,
                                            success: function (output)
                                            {

                                            
                                                $('#prosloadsubject-schemework-template').html(output);

                                            }
                                });
                            //load school edumess subject here   

                }

                });

            //hange on template section  here


            // next to create scheme of work 
            $(".pros-submit-schemeofworkinputfilter").on({
                    click: function () {


                        // $('#prosloadschemetemplate').fadeIn('slow');
                        var campus_id = $('.active-card').data('id');
                        var sectionID = $('#prosloadsection-here').val();
                        var subjectID = $('#prosloadsubject-schemework').val();
                        var termsemmester = $('#prosloatermfor-create-schemework').val();
                        

                        var classID = [];
                       $('.prosgetclassnamecheck-general:checked').each(function (index) {
                                classID.push($(this).val());
                        });

                        if (sectionID === undefined || sectionID === '0' ||
                            subjectID === undefined || subjectID === '0' ||
                            termsemmester === undefined || termsemmester === '0') {
                            // At least one of the values is empty or undefined

                                        $.wnoty({
                                                type: 'warning',
                                                message: "Hey, make sure no field is left blank.",
                                                autohideDelay: 5000
                                            }); 

                        }else if(classID == '')
                        {

                                        $.wnoty({
                                                type: 'warning',
                                                message: "Hey, select atleast one class before proceeding.",
                                                autohideDelay: 5000
                                            }); 

                        }
                        else {
                        

                                $(this).parents(".row").fadeOut("slow", function () {
                                    $(this).next(".row").fadeIn("slow");
                                });

                                // $('#prosloadschemetemplate').fadeIn('slow');
                        }

                        
                    }
            });                          
                
        
    });




    $(document).ready(function () {

        $("#pros-appenbtn-addRownew").click(function () {
        

            var numappended = $("#proscollect-topicollected").val();
            numappended++;
            var weeekno = numappended + 1;
        
        var topicInput = 
                    '<div class="mt-4 prosremovecardfortopicappend'+ weeekno +'">'+
                        '<div class="row ">'+
                            '<div class="col-lg-11 col-md-10 col-sm-10"></div>'+
                            '<div class="col-lg-1 col-md-2 col-sm-2 ">'+
                            '<a id="pros-removebtn-addRownew" data-id="'+ weeekno +'" style="cursor:pointer;" class="btn-floating bg-danger mb-1 ms-3"><i class="fa fa-times"></i></a><br>'+ 

                            '</div>'+
                        '</div>'+
                    
                        '<div class="card " style="border-radius:10px;">'+
                                '<div class="card-body">'+
                                        '<h6 class="fw-bold">Week ' + '<span class="prosgeralnoweek prosnumweekeach'+weeekno+'">' + weeekno + '<span>' + '</h6>'+
                                        '<div class="form-group local-forms">'+
                                                '<label style="font-weight:700;">Topic Name</label>'+
                                                '<input type="text" class="form-control prostopicnamegotten" data-id="' + weeekno +'"  placeholder="enter your topic here" style="border:1px solid #007ffb;border-radius:5px;">'+
                                    '</div>'+
                                    
                                    '<div class="prosisplaysubtopiceach'+ weeekno +'"></div>'+
                                    '<input type="hidden" value="0" id="proscollect-topicollectedsub'+ weeekno +'">'+
                                    '<a id="pros-appenbtn-addRownew-subtopic" style="cursor:pointer;"  data-id="' + weeekno +'" class="btn-floating prosappendedsubtopiceach'+weeekno+'  float-end mt-1">Add sub topic<i class="fa fa-plus"></i></a>'+
                                    
                        '</div>'+ 
                        '</div>'+
                    '</div>';

                        
            $(".pros-prosloadappendedtopichere").append(topicInput);
            $('#proscollect-topicollected').val(numappended);

        });


        
        $('body').on('click', '#pros-removebtn-addRownew', function(e) {

                e.preventDefault();
                var dividd = $(this).data('id');

                var camcnt = 1;
                $('.prosremovecardfortopicappend' + dividd).remove();
                var numappended = $("#proscollect-topicollected").val();

                $('#' + camcnt).html(numappended);
                numappended--;
                $('#proscollect-topicollected').val(numappended);


                $.each($('.prosgeralnoweek'), function() {
                    camcnt++;
                    var valueprepended = $(this).html(camcnt);

                });
            });

        // INSERT TOPIC START START HERE

        $('body').on('click', '.pros-submit-finishedschemeofwork', function(e) {
                    
                    $('.pros-submit-finishedschemeofwork').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                    var campus_id = $('.active-card').data('id');
                    var sectionID = $('#prosloadsection-here').val();
                    var subjectID = $('#prosloadsubject-schemework').val();
                    var termsemmester = $('#prosloatermfor-create-schemework').val();
                    var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");

                    var classID = [];
                    $('.prosgetclassnamecheck-general:checked').each(function (index) {
                                classID.push($(this).val());
                    });

                    classID = classID.toString();
                    
                    

                    var prosgeneraltopic = [];
                    var prosmaintopic = {};
                    var prosmain_mainarr = {};

                    $('.prostopicnamegotten').each(function() {
                        var maintopiceach = $(this).val();

                        prosgeneraltopic.push(maintopiceach);

                        if (maintopiceach === '') {

                            $(this).css('border', '1px solid red');

                        } else {

                            $(this).css('border', '1px solid green');
                            
                        }

                        var maintopic = $(this).data('id');

                        prosmaintopic[maintopiceach] = [];

                        var subtopicmenuarr = [];

                        $(".prostopicnamegotten_subtopic" + maintopic).each(function() {
                            var prossubtopic = $(this).val();

                            var proscratesutopicObject = {
                                prossubmenutopic: prossubtopic,
                            };
                            subtopicmenuarr.push(proscratesutopicObject);
                        });

                        prosmaintopic[maintopiceach] = subtopicmenuarr;
                    });

                    prosmain_mainarr = prosgeneraltopic.map(function(topic) {
                        return {
                            topic: topic,
                            subtopics: prosmaintopic[topic]
                        };
                    });

                   var topicobjectgotten = JSON.stringify(prosmain_mainarr);

                    // console.log(topicobjectgotten);

                    var hasEmptyValueloc = prosgeneraltopic.some(function(value) {
                        return value.trim() === '';
                    });


                
                    if(hasEmptyValueloc)
                    {

                                    $.wnoty({
                                            type: 'warning',
                                            message: "Hey, no topic should be left empty.",
                                            autohideDelay: 5000
                                    }); 
                                    $('.pros-submit-finishedschemeofwork').html('Submit');
                    }else
                    {

                    

                        $.ajax({
                            type: "POST",
                            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosceedto-insert-schemework.php",
                            data: { 

                                abba_instituion_id: abba_get_stored_instituion_id,
                                campus_id:campus_id,
                                sectionID:sectionID,
                                subjectID:subjectID,
                                termsemmester:termsemmester,
                                topicobjectgotten:topicobjectgotten,
                                classID:classID
                                    
                            },
                            //cache: false,
                            success: function (output)
                            {
                                
                                
                                
                            $('.pros-submit-finishedschemeofwork').html('Submit');
                            
                                if(output.trim() == 'success')
                                {


                                     $('#abba_display_campus').val(campus_id);
                                     prosload_class_term_fil(campus_id);

                                     

                                       prosloadschemeworkhere()

                                        $.wnoty({
                                                type: 'success',
                                                message: "Great, sheme of work created successfully.",
                                                autohideDelay: 5000
                                        }); 

                                        $(".proscreate-topichere").fadeOut("slow", function () {
                                            // Use a specific class or ID to target the next row you want to fade in
                                            $(".proscreate-import").fadeIn("slow");
                                        });

                                        $(".proscreate-topichere").modal("hide");

                                }else
                                {
                                    
                                    $.wnoty({
                                                type: 'warning',
                                                message: "Seems this scheme of work already exist",
                                                autohideDelay: 5000
                                        });

                                }


                            }
                        });




                    }

                
        });


        // import setup here  
        $('body').on('click', '.prosimportothercampusbtn', function(e) {
            $(".proscreate-import").fadeOut("slow", function () {
                // Use a specific class or ID to target the next row you want to fade in
                $(".proscreate-topichere").fadeOut("slow");
                $(".prosloadcampusnewhere").fadeIn("slow");
            });
            // $('#prosloadschemetemplate').fadeIn('slow');
        });
        // import setup here  

        
        // INSERT TOPIC START START HERE


        $('body').on('click', '#pros-appenbtn-addRownew-subtopic', function(e) {
                var getmaintopicid = $(this).data('id');
                
                var numappended = $("#proscollect-topicollectedsub"+getmaintopicid).val();
                numappended++;
                var weeekno = numappended + 1;
            
            var topicInput_subtopic = '<div class="mt-4 prosremovecardfortopicappendsubtopic' + numappended +'">' +
                        '<div class="row " >' +
                            '<div class="col-sm-6">' +
                                '<div class="form-group local-forms">' +
                                    '<label style="font-weight:80;"> Sub topic </label>' +
                                    '<input type="text" class="form-control form-control-sm prostopicnamegotten_subtopic'+getmaintopicid+'"  placeholder="sub topic" style="border:1px solid #007ffb;border-radius:5px;">' +
                                    
                                '</div>' +
                            '</div>' +

                            
                            '<div class="col-3">' +
                                    '<span class="fa fa-times mt-4 text-danger prosproceedtoremovesubtopicbtn"  data-tag="'+getmaintopicid+'" data-id="'+ numappended +'" style="font-size:16px;cursor:pointer;"></span>' +
                            '</div>'+

                            '<div class="col-3">' +
                                    
                            '</div>'+
                        '</div>' +
                    '</div>';

            

            $(".prosisplaysubtopiceach"+getmaintopicid).append(topicInput_subtopic);
            $("#proscollect-topicollectedsub"+getmaintopicid).val(weeekno);
        });



        $('body').on('click', '.prosproceedtoremovesubtopicbtn', function(e) {
                    
            e.preventDefault();
            
            var dividdsub = $(this).data('id');
            var tag = $(this).data('tag');

            
            $('.prosremovecardfortopicappendsubtopic' + dividdsub).remove();

            var numappended =  $("#proscollect-topicollectedsub"+tag).val();
            numappended--;
            $("#proscollect-topicollectedsubtopic"+tag).val(numappended);


        });
        

    });



    $('body').on('click', '.prosnexttemplatebtn', function(e) {

            $('.prosnexttemplatebtn').html('<div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>');

            $('.prosloadtemplatetopics-here').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

            var prosrgionvalue = $('#prosloadrigion-here-template').val();
            var prosselect_templateclass = $('#prosloadclass-schemework-template').val();
            var prosselect_templatesubject = $('#prosloadsubject-schemework-template').val();
            var prosselect_template_term = $('#prosloatermfor-create-schemework-template').val();
            
            

            if(prosrgionvalue  == '0' || prosselect_templateclass == '0' || prosselect_templatesubject == '0' || prosselect_template_term == '0')
            {


                $('.prosnexttemplatebtn').html('Next <i class="fas fa-angle-right"> </i>');

                $.wnoty({
                        type: 'warning',
                        message: "Hey, all input must be selected before proceeding.",
                        autohideDelay: 5000
                }); 



            }else
            {

                $.ajax({
                        type: "POST",
                        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosload-shemework-template.php",
                        data: { 
                            prosrgionvalue:prosrgionvalue,
                            prosselect_templateclass:prosselect_templateclass,
                            prosselect_templatesubject:prosselect_templatesubject,
                            prosselect_template_term:prosselect_template_term
                            },
                        //cache: false,
                        success: function (output)
                        {
                                $('.prosloadtemplatetopics-here').html(output);  
                                $('.prosnexttemplatebtn').html('Next <i class="fas fa-angle-right"> </i>');      
                        }

                    });
                    
                            $('#prostemplate_show_gs_template').fadeOut("slow");
                            $('#prosloadtemplatedivhere').fadeIn("slow");
                        
            }
    });

    $('body').on('click', '.prosmovetemplateback', function(e) {
        $('#prostemplate_show_gs_template').fadeIn("slow");
        $('#prosloadtemplatedivhere').fadeOut("slow");
    });


    $('body').on('click', '.prossubmit-template', function(e) {
            
        $(".pros-prosloadappendedtopichere").empty();
        $('#proscollect-topicollected').val(0);

            $('.progetopicgotten').each(function (index) {

                    var topicname = $(this).data('topic');

                    
                    if (index === 0)
                    {
                    
                        $('#prosfirsttopiclist').val(topicname);

                    }else
                    {

                                    var numappended = $("#proscollect-topicollected").val();
                                        numappended++;
                                        var weeekno = numappended + 1;
                        
                                                var topicInput = 
                                                            '<div class="mt-4 prosremovecardfortopicappend'+ weeekno +'">'+
                                                                '<div class="row ">'+
                                                                    '<div class="col-lg-11 col-md-10 col-sm-10"></div>'+
                                                                    '<div class="col-lg-1 col-md-2 col-sm-2 ">'+
                                                                    '<a id="pros-removebtn-addRownew" data-id="'+ weeekno +'" style="cursor:pointer;" class="btn-floating bg-danger mb-1 ms-3"><i class="fa fa-times"></i></a><br>'+ 

                                                                    '</div>'+
                                                                '</div>'+
                                                            
                                                                '<div class="card " style="border-radius:10px;">'+
                                                                        '<div class="card-body">'+
                                                                                '<h6 class="fw-bold">Week ' + '<span class="prosgeralnoweek prosnumweekeach'+weeekno+'">' + weeekno + '<span>' + '</h6>'+
                                                                                '<div class="form-group local-forms">'+
                                                                                        '<label style="font-weight:700;">Topic Name</label>'+
                                                                                        '<input type="text" class="form-control prostopicnamegotten" data-id="' + weeekno +'" value="'+topicname+'"  placeholder="enter your topic here" style="border:1px solid #007ffb;border-radius:5px;">'+
                                                                            '</div>'+
                                                                            
                                                                            '<div class="prosisplaysubtopiceach'+ weeekno +'"></div>'+
                                                                            '<input type="hidden" value="0" id="proscollect-topicollectedsub'+ weeekno +'">'+
                                                                            '<a id="pros-appenbtn-addRownew-subtopic" style="cursor:pointer;"  data-id="' + weeekno +'" class="btn-floating prosappendedsubtopiceach'+weeekno+'  float-end mt-1">Add sub topic<i class="fa fa-plus"></i></a>'+
                                                                            
                                                                '</div>'+ 
                                                                '</div>'+
                                                            '</div>';

                                                            $(".pros-prosloadappendedtopichere").append(topicInput);
                                                            $('#proscollect-topicollected').val(numappended);

                    }        
                    $("#pros_create_gs_template_Modal").modal('hide');
            });



    });


    // click load button 
    $('body').on('click', '#pros_getscheme_on_click', function(e) {

        prosloadschemeworkhere();
    });

    //pros load template modal here
    $('body').on('click', '.prosperloadtemplatemodalbtn', function(e) {
                    $('#pros_create_gs_template_Modal').modal('show');
                $('#caonboardingModal2').css('z-index', 1040); // Increase z-index of first modal

    });

        // Reset z-index of first modal when second modal is closed
    $('#pros_create_gs_template_Modal').on('hidden.bs.modal', function () {
        $('#caonboardingModal2').css('z-index', 1050); // Reset z-index of firstmodal
    });

    //pros load template modal here

    // click load button 
    function  prosloadschemeworkhere()
    {

      


        $('.pros-load-scheme-ofwork-createdhere').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');


        var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");
        var campusID = $('#abba_display_campus').val();
        var classID = $('#prosload-classload').val();
        var Term = $('#prosload-term').val();
    
            $.ajax({


                type: "POST",
                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/pros-load-schemeofworkcreated.php",
                data: { 
                    abba_instituion_id: abba_get_stored_instituion_id,
                    campusID:campusID,
                    classID:classID,
                    Term:Term
                
                },
                //cache: false,
                success: function (output)
                {

                    $('.pros-load-scheme-ofwork-createdhere').html(output);
                }



            });
    }


    //load class filter

        $('body').on('change', '#abba_display_campus', function(e) {

            var campus_ID = $(this).val();

            prosload_class_term_fil(campus_ID);
        });

        function prosload_class_term_fil(campus_ID)
        {
     
            $('#prosload-classload').html('<option value="0">loading...</option>');
            $('#prosload-term').html('<option value="0">loading...</option>');
            


            $.ajax({
                    type: "POST",
                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosloadclassloadschemefilter.php",
                    data: { campus_ID:campus_ID},
                    //cache: false,
                    success: function (output)
                    {

                        $('#prosload-classload').html(output);
                    }
            });



            $.ajax({
                    type: "POST",
                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosloadtermloadschemefilter.php",
                    data: { campus_ID:campus_ID},
                    //cache: false,
                    success: function (output)
                    {
                        $('#prosload-term').html(output);
                    }
            });

        }

        


        $('body').on('click', '#prosloadschemmeofworkviewbtn', function(e) {

            $('#prosloaschemecampusworkviewhere').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');


            var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");

                var campusID = $('#abba_display_campus').val();
                var classID = $(this).data('id');
                var Term = $(this).data('term');


                $.ajax({
                    type: "POST",
                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosloadschemeofworkforview.php",
                    data: {
                        campusID:campusID,
                        classID:classID,
                        Term:Term,
                        abba_get_stored_instituion_id:abba_get_stored_instituion_id
                    },
                    //cache: false,
                    success: function (output)
                    {
                        $('#prosloaschemecampusworkviewhere').html(output);
                    }
            });


                


        });




        // Reset z-index of first modal when second modal is closed
            $('#proseditshemeofworkmodal').on('hidden.bs.modal', function () {
                $('#prosloadschemeworkmodal').css('z-index', 1050); // Reset z-index of firstmodal
            });


        $('body').on('click', '.prosloadschemmeofworkforeditbtn', function(e) {

           
           
           
                $('#proseditshemeofworkmodal').modal('show');
                $('#prosloadschemeworkmodal').css('z-index', 1040); // Increase z-index of first modal

         

           
           
              $('#prosloadschemeworkforedit').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

                var topicID = $(this).data('topic');

                var campusID = $('#abba_display_campus').val();
                var classID = $('#prosload-classload').val();
                var Term = $('#prosload-term').val();


                $.ajax({
                    type: "POST",
                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosloadschemeofworkforedit.php",
                    data: {
                        topicID:topicID,
                        campusID:campusID,
                        classID:classID,
                        Term:Term
                    },
                    //cache: false,
                    success: function (output)
                    {
                        $('#prosloadschemeworkforedit').html(output);

                                                 // INSERT TOPIC START START HERE
                                                 
                                                 
                                                 
                                  


       
                }
            });




        });


        // add scheme sub category append here
        $('body').on('click', '#pros-appenbtn-addRownew-subtopicedit', function(e) {
        
            var getmaintopicid = $(this).data('id');
            var numappended = $("#proscollect-topicollectedsubeditstoreinputvalueextral").val();
        
            var weeekno = parseFloat(numappended) + 1;
        
                    
                
            var maintosubtopicnum = weeekno + getmaintopicid;
            var maintosubtopicstr = maintosubtopicnum.toString();
                    
                
                var topicInput_subtopic_edit = '<div class="mt-4 prosremovecardfortopicappendsubtopicedit' + maintosubtopicnum +'">' +
                    '<div class="row " >' +
                        '<div class="col-sm-6">' +
                            '<div class="form-group local-forms">' +
                                '<label style="font-weight:800;"> Sub topic </label>' +
                                '<input type="text" class="form-control form-control-sm prostopicnamegotten_subtopic'+getmaintopicid+' prosloadsubtopicvalueedit" data-subtop=""  placeholder="sub topic" style="border:1px solid #007ffb;border-radius:5px;">' +
                                
                            '</div>' +
                        '</div>' +
        
                        
                        '<div class="col-3">' +
                                '<span class="fa fa-trash mt-4 text-danger prosproceedtoremovesubtopicbtneditremovesubtopicedit"  data-tag="'+getmaintopicid+'" data-id="'+ maintosubtopicnum +'" style="font-size:16px;cursor:pointer;"></span>' +
                        '</div>'+
        
                        '<div class="col-3">' +
                                
                        '</div>'+
                    '</div>' +
                '</div>';
        
                $(".prosisplaysubtopiceach1edit").append(topicInput_subtopic_edit);
                $("#proscollect-topicollectedsubeditstoreinputvalueextral").val(weeekno);
                
        });   


        $('body').on('click', '.prosproceedtoremovesubtopicbtneditremovesubtopicedit', function(e) {
                
            e.preventDefault();
            
            var dividdsub = $(this).data('id');
            var tag = $(this).data('tag');

                        
            $('.prosremovecardfortopicappendsubtopicedit' + dividdsub).remove();

            var numappended =  $("#proscollect-topicollectedsubeditstoreinputvalueextral").val();
            numappended--;
            $("#proscollect-topicollectedsubeditstoreinputvalueextral").val(numappended);


        });
        
        // edit scheme of work btn here
        $('body').on('click', '.prosproceedto-edit-schemeworbtn', function(e) {

                    $('.prosproceedto-edit-schemeworbtn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="visually-hidden"></span>saving..')
            


                    var campusID = $('#abba_display_campus').val();
                    var Term = $('#prosload-term').val();
                    var topicname = $('.prosgettopicnameedit').val();
                    var prosedittopicID = $('#prosgettopicidforeditvalue').val();

                    var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");
                    var classID = $('#prosload-classload').val();

                   
                           
                    var subtopicedit = [];
                    var subtopiceditID = [];
                    
                    $('.prosloadsubtopicvalueedit').each(function (index) {
                        subtopicedit.push($(this).val());
                        subtopiceditID.push($(this).data('subtop'));
                        
                    });
                    
                    var subtopiclenght = subtopicedit.length;
                    
                      var hasEmptyValueloc = subtopicedit.some(function(value) {
                        return value.trim() === '';
                    });
                        

                   
                    subtopicedit = subtopicedit.toString();
                    subtopiceditID = subtopiceditID.toString();
                 

                  
                    

                    if(topicname == '')
                    {


                            $.wnoty({
                                    type: 'warning',
                                    message: "Hey, topic should be left empty.",
                                    autohideDelay: 5000
                            }); 

                            $('.prosgettopicnameedit').css('border','1px solid red');

                            $('.prosproceedto-edit-schemeworbtn').html('Save</i> <i class="fas fa-angle-right"> </i>');
                            
                    }else
                    {
                        
                        
                                
                                
                         if(subtopiclenght == '0')  
                         {
                             
                            
                        
                                $('.prosgettopicnameedit').css('border','1px solid green');

                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/proseditschemeofwork_here.php",
                                    data: {
                                        campusID:campusID,
                                        prosedittopicID:prosedittopicID,
                                        Term:Term,
                                        topicname:topicname,
                                        subtopicedit:subtopicedit,
                                        subtopiceditID:subtopiceditID
                                    },
                                    //cache: false,
                                    success: function (output)
                                    {
                                        
                                         $('.prosproceedto-edit-schemeworbtn').html('Save</i> <i class="fas fa-angle-right"> </i>');

                                          if(output.trim() == 'success')
                                          {


                                                  prosloadschemeworkhere();
                                                    $.wnoty({
                                                            type: 'success',
                                                            message: "Great! topic updated successfully.",
                                                            autohideDelay: 5000
                                                    });

                                                    $('#proseditshemeofworkmodal').modal('hide');
                                                   
                                                    
                                          }else
                                          {

                                          }


                                    }
                                });
                                
                         }else
                         {
                                  if(hasEmptyValueloc)
                                 {
                         
                              
                                         $('.prosproceedto-edit-schemeworbtn').html('Save</i> <i class="fas fa-angle-right"> </i>');
                                         $.wnoty({
                                                type: 'warning',
                                                message: "Hey! sub topic should not be left empty.",
                                                autohideDelay: 5000
                                        });
                                        
                                  }else
                                  {
                                      
                                      
                                               $.ajax({
                                                    type: "POST",
                                                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/proseditschemeofwork_here.php",
                                                    data: {
                                                        campusID:campusID,
                                                        prosedittopicID:prosedittopicID,
                                                        Term:Term,
                                                        topicname:topicname,
                                                        subtopicedit:subtopicedit,
                                                        subtopiceditID:subtopiceditID
                                                    },
                                                    //cache: false,
                                                    success: function (output)
                                                    {
                                                        
                                                         $('.prosproceedto-edit-schemeworbtn').html('Save</i> <i class="fas fa-angle-right"> </i>');
                
                                                          if(output.trim() == 'success')
                                                          {
                
                
                                                                  prosloadschemeworkhere();
                                                                    $.wnoty({
                                                                            type: 'success',
                                                                            message: "Great! topic updated successfully.",
                                                                            autohideDelay: 5000
                                                                    });
                
                                                                    $('#proseditshemeofworkmodal').modal('hide');
                                                                   
                                                                    
                                                          }else
                                                          {
                
                                                          }
                
                
                                                    }
                                                });
                                      
                                                                  
                                            
                                      
                                  }
                         }
                        

                    }

        });
        
        $('body').on('click', '.prosproceedtoremovesubtopicbtneditadded', function() {
               var subtopicID = $(this).data('tag');
               var campusID = $(this).data('campus');
               
               
               
                 $.ajax({
                        type: "POST",
                        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/proceedtodeleteschemeofwork.php",
                        data: {
                            campusID:campusID,
                           subtopicID:subtopicID
                        },
                        success: function (output)
                        {
                                
                                if(output.trim() == 'success')
                                {
                                                $.wnoty({
                                                            type: 'success',
                                                            message: "Great! sub topic removed successfully.",
                                                            autohideDelay: 5000
                                                    });   
                                    
                                    
                                }else
                                {
                                    
                                }
                            
                        }
                        
                  });
                
               
         });
       


        //process scheme of work delete here
        $('body').on('click', '.prosloadschemeofworkdel', function(e) {
            
             $('#pros-deleteschemeworkmodal').modal('show');
             $('#prosloadschemeworkmodal').css('z-index', 1040); // Increase z-index of first modal

                    
              var topicID = $(this).data('topic');
                var topicname = $(this).data('name');

                $('#displaydelname-del').html(topicname);
                $('#prosgetdelschemeid').val(topicID);
                

        });
        
        $('#pros-deleteschemeworkmodal').on('hidden.bs.modal', function () {
              $('#prosloadschemeworkmodal').css('z-index', 1050); // Reset z-index of firstmodal
        });

        $('body').on('click', '#pros-schemeconfirmDelete', function(e) {

            var  prosedittopicID =  $('#prosgetdelschemeid').val();
            var campusID = $('#abba_display_campus').val();
            var Term = $('#prosload-term').val();
            
            
            $('#pros-schemeconfirmDelete').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');  

            $.ajax({
                type: "POST",
                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/proceedtodeleteschemeworkhere.php",
                data: {
                    campusID:campusID,
                    prosedittopicID:prosedittopicID,
                    Term:Term
                },
                //cache: false,
                success: function (output)
                {
                        $('#pros-schemeconfirmDelete').html('Delete');

                    if(output.trim() == 'success')
                        {
                            
                                $('#prosremovetopfordeletehere'+ prosedittopicID).remove();
                                prosloadschemeworkhere();
                                $.wnoty({
                                        type: 'success',
                                        message: "Great! topic removed successfully.",
                                        autohideDelay: 5000
                                });

                                $('#pros-deleteschemeworkmodal').modal('hide');
                                $('#pros-schemeconfirmDelete').html('Delete</i> <i class="fas fa-times"> </i>');
                                

                        }else
                        {

                        }


                }

            });
                
        });




</script>