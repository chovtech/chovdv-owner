<script>



     //pros load logo content here for upload
    $(document).ready(function() {
        $image_crop = $('#pros-load-image').croppie({
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
                
                // showZoomer: false,
                // enableResize: true,
                // enableOrientation: true,
                // mouseWheelZoom:'ctrl'
                
               
        });


        $image_croplogin = $('#prosloadloadloginimage').croppie({
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

    });
     //pros load logo content here for upload




  
   
    $(document).ready(function() {



        // PROS GET STATE BASE ON COUNTRY SELECTED
            var country = $('.generalcountry').val();
            var dataString = '&country=' + country;

            $('#state').html('<option value="0">Loading...</option>');

            $.ajax({
                type: "POST",
                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/get-state-onboarding.php",
                data: dataString,
                success: function(result) {
                    $('#state').html(result);
                }
            });
            // PROS GET STATE BASE ON COUNTRY SELECTED

            $('body').on('change','#proscampuscountryedit',function(){
                $('#proscampusstateedit').html('<option value="0">Loading...</option>');
                var countryID = $(this).val();
                var dataString = '&country=' + countryID;


                    $.ajax({
                        type: "POST",
                        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/get-state-onboarding.php",
                        data: dataString,
                        success: function(result) {
                            $('#proscampusstateedit').html(result);
                        }
                    });

            });


        
        var tagstatus = '<?php echo $tagstate; ?>';//PROS CURRENT USER TAG STATUS


        // PROS HIDDEN WIZARD CONTENT
            $('#displayaiwelcome').hide();
            $('#changelang').hide();
            $('#institutiontype').hide();
            $('#displayschoolinput').hide();
            $('#displaycontentcreator').hide();
            $('#displaytertiary').hide();
            $('#displayk12').hide();
            $('#displaysetinstitution').hide();
            // PROS HIDDEN WIZARD CONTENT

            // PROS WIZZARD CONTENT CONDITIONAL STAMENTS
            if (tagstatus == '9') {

                $('#setupmodal').modal('show');
                $('#changelang').fadeIn('slow');

            } else if (tagstatus == '11') {
                $('#setupmodal').modal('show');
                $('#displayaiwelcome').fadeIn('slow');

            } else if (tagstatus == '10') {

                $('#setupmodal').modal('show');
                $('#displaysetinstitution').fadeIn('slow');

            } else if (tagstatus == '12') {
                $('#setupmodal').modal('show');
                $('#institutiontype').fadeIn('slow');
            } else if (tagstatus == '13') {
            $('#setupmodal').modal('hide');
                $('#pros-createschoolmodal-first').modal('show');

            } else if (tagstatus == '15') {

                $('#schoolsettings').fadeIn('slow');

                $('#setupmodal').modal('hide'); 
                $('.pros-schoolkindofmodal').on('shown.bs.modal', function() {
                    $(this).addClass('show');
                });

                $('.pros-schoolkindofmodal').on('hide.bs.modal', function() {
                    $(this).removeClass('show');
                });


                $('#pros-createnewcampus').on('hidden.bs.modal', function() {
                    $('#groupschoolnewcampusid').val('');
                });
            }
            // PROS WIZZARD CONTENT CONDITIONAL STAMENTS


    
        var defaultlang = '<?php echo $DefaultLanguage; ?>';//PROS DEFAULT LANGUAGE

        if (defaultlang == 'french') {
            $(".french").prop("checked", true);
        } else if (defaultlang == 'chinese') {

            $(".chinese").prop("checked", true);
        } else if (defaultlang == 'arabic') {
            $(".arabic").prop("checked", true);
        } else if (defaultlang == 'spanish') {
            $(".spanish").prop("checked", true);
        } else {
            $(".english").prop("checked", true);
        }

    // PROS DEFAULT LANGUAGE

        // PROS CHECK IF DEFAULT LANGUAGE IS SET
            if (defaultlang == '') {

                var defaultlang = localStorage.getItem("lang");
                var UserID = "<?php echo $UserID; ?>";
                var tagstate = '';

                if (defaultlang != undefined || defaultlang != null || defaultlang != '') {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/updatedefaultlang.php",
                        data: {
                            defaultlang: defaultlang,
                            UserID: UserID,
                            tagstate: tagstate
                        },
                        cache: false,
                        success: function(result) {
                            // location.reload();
                        }
                    });
                }

            }
        // PROS CHECK IF DEFAULT LANGUAGE IS SET AND UPDATE
    });


    // getschool id when adding new campus to list
    $('body').on('click', '#proscreatescampusgetid', function() {
        var schoolid = $(this).data('school');
        $('#groupschoolnewcampusid').val(schoolid);
    });
    // getschool id when adding new campus to list



    $('body').on('click', '#defaultlangbtn', function() {
        var defaullang = $("input[type='radio'].defaultlang:checked").val();

        if (defaullang === undefined) {

            $.wnoty({
                type: 'warning',
                message: "Hey!! language not selected.",
                autohideDelay: 5000
            });

        } else {
            localStorage.setItem("lang", defaullang);

            $('#changelang').animate({
                opacity: 0.5,
                left: '+=50',
                height: 'toggle'
            }, 400);
            $('#displayaiwelcome').fadeIn('slow');

            var defaultlang = localStorage.getItem("lang");
            var UserID = "<?php echo $UserID; ?>";
            var tagstate = $(this).data('id');
            // alert(tagid);
            $.ajax({
                type: "POST",
                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/updatedefaultlang.php",
                data: {
                    defaultlang: defaultlang,
                    UserID: UserID,
                    tagstate: tagstate
                },
                cache: false,
                success: function(result) {
                    // location.reload();
                }
            });

        }
    });//DEFAULT LANGUAGE
    // click to get to sch type


    $('body').on('click', '#previoutAI', function() {

        var UserID = "<?php echo $UserID; ?>";
        var tagid = $(this).data('id');

        pros_updabackwards_steps(UserID,tagid);

        $('#displayaiwelcome').animate({
            left: '+=50',
            height: 'toggle'
        }, 500);

        $('#changelang').fadeIn('slow');
    });//PREVIOUS BUTTON



    // click to get to sch type
    $('body').on('click', '#previoutAI-btn', function() {

        // $('#displayaiwelcome').fadeOut();
        $('#displayaiwelcome').animate({
            left: '+=50',
            height: 'toggle'
        }, 500);

        $('#displaysetinstitution').fadeIn('slow');
        var UserID = "<?php echo $UserID; ?>";
        var tagid = $(this).data('id');

        pros_updabackwards_steps(UserID,tagid);

    });

    $('body').on('click', '#k-container', function() {

        $("#k12value").prop("checked", true);

        $(this).css('outline', '3px solid #007bff');
        $('#lmscontainer').css('outline', 'none');
        $('#tertiarycontainer').css('outline', 'none');

        $('#k-container').addClass('pulse' + ' animated').one(
            'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
            function() {
                $(this).removeClass('pulse');
            });

    });





    function pros_updabackwards_steps(UserID,tagid)//pros update backwards steps tags
    {
        $.ajax({
            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/updateaimessage.php",
            data: {
                UserID: UserID,
                tagid: tagid
            },
            cache: false,
            success: function(result) {
                // location.reload();
            }
        });
    }//pros update backwards steps tags

       

       


   


    $('body').on('click', '#tertiarycontainer', function() {
        $("#tertiary").prop("checked", true);

        $(this).css('outline', '3px solid #007bff');
        $('#k-container').css('outline', 'none');
        $('#lmscontainer').css('outline', 'none');


        $('#tertiarycontainer').addClass('pulse' + ' animated').one(
            'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
            function() {
                $(this).removeClass('pulse');
            });
    });

    $('body').on('click', '#lmscontainer', function() {
        $("#contentcreator").prop("checked", true);

        $(this).css('outline', '3px solid #007bff');
        $('#k-container').css('outline', 'none');
        $('#tertiarycontainer').css('outline', 'none');
        $('#lmscontainer').addClass('pulse' + ' animated').one(
            'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
            function() {
                $(this).removeClass('pulse');
            });
    });


    $('body').on('click', '#typeofschoolback', function() {

        $('#institutiontype').animate({
            // opacity: 0.5,
            left: '+=50',
            height: 'toggle'
        }, 500);

        $('#displaysetinstitution').fadeIn('slow');

        var UserID = "<?php echo $UserID; ?>";
        var tagid = $(this).data('id');

        pros_updabackwards_steps(UserID,tagid);


    });

    $('body').on('click', '#backbtntoai', function() {

        var UserID = "<?php echo $UserID; ?>";
        var tagid = $(this).data('id');
        pros_updabackwards_steps(UserID,tagid);
        $('#displaysetinstitution').animate({
            
            left: '+=50',
            height: 'toggle'
        }, 500);

        $('#displayaiwelcome').fadeIn('slow');

       

       
    });

    $('body').on('click', '#onboardingbtndisplay', function() {
        $('#displaysetinstitution').animate({
        
            left: '+=50',
            height: 'toggle'
        }, 1000);
        $('#institutiontype').fadeIn('slow');

        var UserID = "<?php echo $UserID; ?>";
        var tagID = $(this).data('id');

        $.ajax({
            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/updatelandpagetoschtype.php",
            data: {
                UserID: UserID,
                tagID: tagID
            },
            cache: false,
            success: function(result) {

            }
        });

    });


    $('body').on('click', '#proceedtosettingsch', function() {
        var schooltype = $("input[type='radio'].typeofscho:checked").val();
        var UserID = "<?php echo $UserID; ?>";
        var tagID = $(this).data('id');


        if (schooltype == '' || schooltype === undefined) {

            $.wnoty({
                type: 'warning',
                message: "Select a School Type.",
                autohideDelay: 5000
            });

        } else {
            $.ajax({
                type: "POST",
                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/updateschooltype.php",
                data: {
                    UserID: UserID,
                    schooltype: schooltype,
                    tagID: tagID
                },
                cache: false,
                success: function(result) {

                }
            });

            $('#institutiontype').animate({
                // opacity: 0.5,
                left: '+=50',
                height: 'toggle'
            }, 1000);
            $('#setupmodal').modal('hide');

            
            $('#pros-createschoolmodal-first').modal('show');
            $('#pros-createschoolmodal-first').modal('show');
            

        }

    });



    // select state base on country selected
    $("body").on('change', ".generalcountry", function() {
        var country = $(this).val();
        var countdataid = $(this).data('id');
        var dataString = '&country=' + country;

        $('#' + countdataid).html('<option value="0">Loading...</option>');

        $.ajax({
            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/get-state-onboarding.php",
            data: dataString,

            success: function(result) {
                $('#' + countdataid).html(result);
            }
        });
    });
    // select state base on country selected end here 

    // select LGA base on state selected 
    $("body").on("change", ".generalstate", function() {

        var state = $(this).val();
        var stateid = $(this).data('id');
        var dataString = '&state=' + state;

        $('#' + stateid).html('<option value="0">Loading...</option>');

        $.ajax({
            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/get-local-govenrment-onboarding.php",
            data: dataString,
            success: function(result) {
                $('#' + stateid).html(result);
            }
        });
    });

    //edit campus change state here
    $("body").on("change", "#proscampusstateedit", function() {
        var stateid = $(this).val();
        var dataString = '&state=' + stateid;

        $('#proscampuslgaedit').html('<option value="0">Loading...</option>');


        $.ajax({
            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/get-local-govenrment-onboarding.php",
            data: dataString,
            success: function(result) {
                $('#proscampuslgaedit').html(result);
            }
        });


    });


// select LGA base on state selected end here

    //update url first create here

    function  prosschool_urlvalid(schoolname)
    {
       const urlgotten =  schoolname.trim().toLowerCase().replace(/ /g, "").replace(/[0-9]/g, "").replace(/[^a-z]/g, "");
         const pros_url = urlgotten.substring(0, 16);
        //  alert(url);
        //  $('#prosschoollink-initial').val(url);
         return pros_url;
    }
   
    $("body").on("input", "#schoolnameinitial", function() { 
        // alert('hello');
        var schoolname = $('#schoolnameinitial').val();
        // var schoolurllength = schoolurl.length;

         const pros_url = prosschool_urlvalid(schoolname);
        $('#prosschoollink-initial').val(pros_url);

            var schoolink = pros_url;
            var UserID = "<?php echo $UserID; ?>";
            pros_checkurlhere(schoolink,UserID);

    });


    $("body").on("input", "#pros-schoolnameID-new", function() { 
        // alert('hello');
        var schoolname = $('#pros-schoolnameID-new').val();
        // var schoolurllength = schoolurl.length;

         const pros_url = prosschool_urlvalid(schoolname);
        $('#pros-schoolurlnew').val(pros_url);

            var schoolink = pros_url;
            var UserID = "<?php echo $UserID; ?>";
            pros_checkurlhere(schoolink,UserID);

    });

    



    $("body").on("click", "#createschoolbtnfirstbtn", function() { //create for the first time
        $(this).html(
            '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>creating...'
        );

        var UserID = "<?php echo $UserID; ?>";
        var schoolname = $('#schoolnameinitial').val();
        var schoolmotto = $('#schoolmottoinitial').val();
        var schoolurl = $('#prosschoollink-initial').val();
        var tag = $(this).data('id');
        var schoolurllength = schoolurl.length;

        var url_exist = $('.pros_verifyurl_exist_input_here').val();//if url exist input


        if (schoolname == '') {
            $('.prosschoolnamecover').css('outline', '1px solid red');

            $.wnoty({
                type: 'warning',
                message: "Hey!! input your school name",
                autohideDelay: 6000
            });
            $('#createschoolbtnfirstbtn').html('Create school');


        } else if (schoolmotto == '') {
            $('.prosschoolnamecover').css('outline', '1px solid green');
            $('.prosschoolmottocover').css('outline', '1px solid red');

            $.wnoty({
                type: 'warning',
                message: "Hey!! input your school motto",
                autohideDelay: 6000
            });
            $('#createschoolbtnfirstbtn').html('Create school');


        } else if (schoolurl == '') {
            $('.schollnameerr-new').css('outline', '1px solid green');
            $('.prosschoolmottocover').css('outline', '1px solid green');
            $('.prosschoollinkcover').css('outline', '1px solid red');


            $.wnoty({
                type: 'warning',
                message: "Hey!! URL should not be left empty",
                autohideDelay: 6000
            });
            $('#createschoolbtnfirstbtn').html('Create school');


        } else if (schoolurllength > 20) {

            $('.schollnameerr-new').css('outline', '1px solid green');
            $('.prosschoolmottocover').css('outline', '1px solid green');
            $('.prosschoollinkcover').css('outline', '1px solid red');


            $.wnoty({
                type: 'warning',
                message: "Hey!! URL should not be greater than 20 characters.",
                autohideDelay: 6000
            });
            $('#createschoolbtnfirstbtn').html('Create school');

        }else if (/[A-Z]/.test(schoolurl) || /\d/.test(schoolurl)) {


                $('.schollnameerr-new').css('outline', '1px solid green');
                $('.prosschoolmottocover').css('outline', '1px solid green');
                $('.prosschoollinkcover').css('outline', '1px solid red');


                $.wnoty({
                    type: 'warning',
                    message: "Hey!! URL should not contain uppercase or number",
                    autohideDelay: 6000
                });
                $('#createschoolbtnfirstbtn').html('Create school');

        }else if(schoolurl.indexOf(' ') !== -1)
        {


                $('.schollnameerr-new').css('outline', '1px solid green');
                $('.prosschoolmottocover').css('outline', '1px solid green');
                $('.prosschoollinkcover').css('outline', '1px solid red');


                $.wnoty({
                    type: 'warning',
                    message: "Hey!! URL should not contain space between",
                    autohideDelay: 6000
                });
                $('#createschoolbtnfirstbtn').html('Create school');
        }
        else {
            $('#createschoolbtnfirstbtn').html('Create school');



           
             //PROS IF URL EXTIST STATEMENT
             if(url_exist.trim() == 'found')
            {

                  $.wnoty({
                        type: 'warning',
                        message: "Hey!!" +schoolurl+".edumess.com is already taken, try another one",
                        autohideDelay: 6000
                    });

                    $('.schollnameerr-new').css('outline', '1px solid green');
                    $('.prosschoolmottocover').css('outline', '1px solid green');
                    $('.prosschoollinkcover').css('outline', '1px solid red');


                
            }else{


                    $('.schollnameerr-new').css('outline', '1px solid green');
                    $('.prosschoolmottocover').css('outline', '1px solid green');
                    $('.prosschoollinkcover').css('outline', '1px solid green');

                    localStorage.setItem("schoolname", schoolname);
                    localStorage.setItem("schoolmotto", schoolmotto);
                    localStorage.setItem("schoolurl", schoolurl);
                    localStorage.setItem("tag", tag);

                    $.wnoty({
                        type: 'success',
                        message: "Greate!! school created successfully kindly Proceed to create campus for your school",
                        autohideDelay: 6000
                    });

                    $('#pros-createschoolmodal-first').modal('hide');

                    setTimeout(function() {

                        $('#pros-createnewcampus').modal('show');

                    }, 700);

            }

           

        }
    }); //create school initial



    $("body").on("click", "#editschoolbtn-full", function() { //edit school

        $(this).html(
            '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>upating...'
        );

        var UserID = "<?php echo $UserID; ?>";
        var InstitutionID = $(this).data('id');
        var schoolname = $('#pros-eitschoolname').val();
        var schoolmotto = $('#pros-eitschoolmotto').val();
        var schoolurl = $('#pros-editschoolurl').val();

        var schoolurllength = schoolurl.length;

        var proslinknew =  schoolurl + '.edumess.com';



        var url_exist = $('.pros_verifyurl_exist_input_here').val();//if url exist input


          




        if (schoolname == '') {
            $('.schollnameerr-newedit').css('outline', '1px solid red');

            $.wnoty({
                type: 'warning',
                message: "Hey!! input your school name",
                autohideDelay: 6000
            });
            $('#editschoolbtn-full').html('Upda te school');


        } else if (schoolmotto == '') {
            $('schollnameerr-newedit').css('outline', '1px solid green');
            $('.schollmottoerr-newedit').css('outline', '1px solid red');

            $.wnoty({
                type: 'warning',
                message: "Hey!! input your school motto",
                autohideDelay: 6000
            });
            $('#editschoolbtn-full').html('Update school');

        } else if (schoolurl == '') {
            $('schollnameerr-newedit').css('outline', '1px solid green');
            $('.schollmottoerr-newedit').css('outline', '1px solid green');
            $('.schollurlerr-newedit').css('outline', '1px solid red');


            $.wnoty({
                type: 'warning',
                message: "Hey!! URL should not be left empty",
                autohideDelay: 6000
            });
            $('#editschoolbtn-full').html('Update school');


        } else if (schoolurllength > 20) {

            $('schollnameerr-newedit').css('outline', '1px solid green');
            $('.schollmottoerr-newedit').css('outline', '1px solid green');
            $('.schollurlerr-newedit').css('outline', '1px solid red');


            $.wnoty({
                type: 'warning',
                message: "Hey!! URL should not be greater than 20 characters.",
                autohideDelay: 6000
            });
            $('#editschoolbtn-full').html('Update school');

        } else if (/[A-Z]/.test(schoolurl) || /\d/.test(schoolurl)) {


            $('schollnameerr-newedit').css('outline', '1px solid green');
            $('.schollmottoerr-newedit').css('outline', '1px solid green');
            $('.schollurlerr-newedit').css('outline', '1px solid red');


            $.wnoty({
                type: 'warning',
                message: "Hey!! URL should not contain uppercase or number",
                autohideDelay: 6000
            });
            $('#editschoolbtn-full').html('Update school');

        } 
        
        else if(schoolurl.indexOf(' ') !== -1)
        {


                $('.schollnameerr-newedit').css('outline', '1px solid green');
                $('.schollmottoerr-newedit').css('outline', '1px solid green');
                $('.schollurlerr-newedit').css('outline', '1px solid red');


                $.wnoty({
                    type: 'warning',
                    message: "Hey!! URL should not contain space between",
                    autohideDelay: 6000
                });
                $('#editschoolbtn-full').html('Update school');
        }else {



              //PROS IF URL EXTIST STATEMENT
              if(url_exist.trim() == 'found')
            {

                $.wnoty({
                    type: 'warning',
                    message: "Hey!! " +proslinknew+" is already taken, try another one",
                    autohideDelay: 6000
                });

                   $('schollnameerr-newedit').css('outline', '1px solid green');
                    $('.schollmottoerr-newedit').css('outline', '1px solid green');
                    $('.schollurlerr-newedit').css('outline', '1px solid red');
                    $('#editschoolbtn-full').html('Update school');


            
            }else{




                   $('schollnameerr-newedit').css('outline', '1px solid green');
                    $('.schollmottoerr-newedit').css('outline', '1px solid green');
                    $('.schollurlerr-newedit').css('outline', '1px solid green');
                    $('#editschoolbtn-full').html('Update school');


                    $.ajax({
                        type: "POST",
                        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/updateschool.php",
                        data: {
                            schoolurl: proslinknew,
                            schoolname: schoolname,
                            schoolmotto: schoolmotto,
                            UserID: UserID,
                            InstitutionID: InstitutionID

                        },

                        success: function(output) {

                            var prosperdata = (output);


                            // alert(prosperdata);

                            if (prosperdata.trim() == 'success') {


                                $('#pros-editschool-modal').modal('hide');
                                $.wnoty({
                                    type: 'success',
                                    message: "Great!! School edited successfully.",
                                    autohideDelay: 6000
                                });


                                var ownerfirst_Name = "<?php echo $PrimaryName; ?>";
                                var tagstate = "<?php echo $tagstate; ?>";

                                $('#displaycampus-created').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

                                $.ajax({

                                    type: "POST",
                                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/displayschool-campus.php",
                                    data: {
                                        UserID: UserID,
                                        ownerfirst_Name: ownerfirst_Name,
                                        tagstate: tagstate
                                    },

                                    success: function(result) {
                                        $('#displaycampus-created').html(result);
                                        var userrole = (result);

                                    }
                                });






                            } else {

                                $.wnoty({
                                    type: 'warning',
                                    message: "Update failed try again.",
                                    autohideDelay: 6000
                                });
                            }

                        }

                    });


            }
    
           

        }




    }); //edit school



   


    $("body").on("click", "#addschoolinitialbtn-new", function() {
        $(this).html(
            '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>creating...'
        );

        var UserID = "<?php echo $UserID; ?>";
        var schoolname = $('#pros-schoolnameID-new').val();
        var schoolmotto = $('#pros-schoolmotto-new').val();
        var schoolurl = $('#pros-schoolurlnew').val();
        var schoolurllength = schoolurl.length;

        


           var url_exist = $('.pros_verifyurl_exist_input_here').val();//if url exist input
           
        if (schoolname == '') {
            $('.schollnameerr-new').css('outline', '1px solid red');

            $.wnoty({
                type: 'warning',
                message: "Hey!! input your school name",
                autohideDelay: 6000
            });
            $('#addschoolinitialbtn-new').html('Create school');


        } else if (schoolmotto == '') {
            $('.schollnameerr-new').css('outline', '1px solid green');
            $('.schollmottoerr-new').css('outline', '1px solid red');

            $.wnoty({
                type: 'warning',
                message: "Hey!! input your school motto",
                autohideDelay: 6000
            });
            $('#addschoolinitialbtn-new').html('Create school');


        } else if (schoolurl == '') {
            $('.schollnameerr-new').css('outline', '1px solid green');
            $('.schollmottoerr-new').css('outline', '1px solid green');
            $('.schollurlerr-new').css('outline', '1px solid red');


            $.wnoty({
                type: 'warning',
                message: "Hey!! URL should not be left empty",
                autohideDelay: 6000
            });

            $('#addschoolinitialbtn-new').html('Create school');


        } else if (schoolurllength > 20) {

            $('.schollnameerr-new').css('outline', '1px solid green');
            $('.schollmottoerr-new').css('outline', '1px solid green');
            $('.schollurlerr-new').css('outline', '1px solid red');


            $.wnoty({
                type: 'warning',
                message: "Hey!! URL should not be greater than 20 characters.",
                autohideDelay: 6000
            });
            $('#addschoolinitialbtn-new').html('Create school');

        }else if (/[A-Z]/.test(schoolurl) || /\d/.test(schoolurl)) {


                $('schollnameerr-new').css('outline', '1px solid green');
                $('.schollmottoerr-new').css('outline', '1px solid green');
                $('.schollurlerr-new').css('outline', '1px solid red');


                $.wnoty({
                    type: 'warning',
                    message: "Hey!! URL should not contain uppercase or number",
                    autohideDelay: 6000
                });
                $('#addschoolinitialbtn-new').html('Create school');

        
        }else if(schoolurl.indexOf(' ') !== -1)
        {


                $('.schollnameerr-new').css('outline', '1px solid green');
                $('.schollmottoerr-new').css('outline', '1px solid green');
                $('.schollurlerr-new').css('outline', '1px solid red');


                $.wnoty({
                    type: 'warning',
                    message: "Hey!! URL should not contain space between",
                    autohideDelay: 6000
                });

                $('#addschoolinitialbtn-new').html('Create school');
        }
        else {
            $('#addschoolinitialbtn-new').html('Create school');

            // alert(url_exist);

           //PROS IF URL EXTIST STATEMENT
            if(url_exist.trim() == 'found')
            {

                  $.wnoty({
                        type: 'warning',
                        message: "Hey!!" +schoolurl+".edumess.com is already taken, try another one",
                        autohideDelay: 6000
                    });


                    $('.schollnameerr-new').css('outline', '1px solid green');
                    $('.schollmottoerr-new').css('outline', '1px solid green');
                    $('.schollurlerr-new').css('outline', '1px solid red');


                
            }else{


                        $('.schollnameerr-new').css('outline', '1px solid green');
                        $('.schollmottoerr-new').css('outline', '1px solid green');
                        $('.schollurlerr-new').css('outline', '1px solid green');

                    localStorage.setItem("schoolname", schoolname);
                    localStorage.setItem("schoolmotto", schoolmotto);
                    localStorage.setItem("schoolurl", schoolurl);
                    localStorage.setItem("tag", '');

                    $.wnoty({
                        type: 'success',
                        message: "Great!! school added successfully, kindly Proceed to create campus for your school",
                        autohideDelay: 6000
                    });

                     $('#pros-createschoolmodal').modal('hide');

                    setTimeout(function() {

                        $('#pros-createnewcampus').modal('show');

                    }, 1000);

            }
            //PROS IF URL EXTIST STATEMENT
           

        }
    });


    // create new campus here

    $("body").on("click", "#pros-createnewcampus-btn", function() {
        $('#pros-createnewcampus-btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="visually-hidden">Loading...</span>creating..');



    
        var schoolName = localStorage.getItem("schoolname");
        var mottoid = localStorage.getItem("schoolmotto");
        var schooldomain = localStorage.getItem("schoolurl");
        var tagID = localStorage.getItem("tag");

        var UserID = "<?php echo $UserID; ?>";

        var checktoverify = $('#checkfirstvilation').val();

        var schoolIDnew = $('#groupschoolnewcampusid').val();


        var campuslocation = [];
        var verifycampuslocation = [];
        $.each($('.campuslocation'), function() {
            campuslocation.push($(this).val());
            var locationverify = $(this).data('id');
            var campvaluefinal = $('#campuslocation' + locationverify).val();


            if (campuslocation == '' || campuslocation == ',') {
                $('.campuslocationcover' + locationverify).css('outline', '1px solid red');
                $('#pros-createnewcampus-btn').html('Create campus');

                $.wnoty({
                    type: 'warning',
                    message: "Hey!! Input your campus name or location.",
                    autohideDelay: 6000
                });
            } else {
                $('.campuslocationcover' + locationverify).css('outline', '1px solid green');
                $('#pros-createnewcampus-btn').html('Create campus');
            }

        });






        var campusemail = [];
        $.each($('.campusemail'), function() {
            campusemail.push($(this).val());
            var emailverify = $(this).data('id');
            var emailverifyfinal = $('#campusemail' + emailverify).val();


            if (emailverifyfinal == '' || emailverifyfinal == ',') {
                $('.campusemailcover' + emailverify).css('outline', '1px solid red');
                $('#pros-createnewcampus-btn').html('Create campus');

                $.wnoty({
                    type: 'warning',
                    message: "Hey!! Input your campus email address.",
                    autohideDelay: 6000
                });
            } else {

                $('.campusemailcover' + emailverify).css('outline', '1px solid green');
                $('#pros-createnewcampus-btn').html('Create campus');

            }

        });




        $.each($('.campusphone'), function() {
            var phoneverify = $(this).data('id');
            var phonelverifyfinal = $('#phonenumber' + phoneverify).val();

            if (phonelverifyfinal == '' || phonelverifyfinal == ',') {
                $('.campusnumbercover' + phoneverify).css('outline', '1px solid red');
                $('#checkfirstvilation').val('validatedfinal');
                $('#pros-createnewcampus-btn').html('Create campus');


                $.wnoty({
                    type: 'warning',
                    message: "Hey!! Input your campus phone number.",
                    autohideDelay: 6000
                });
            } else {
                $('.campusnumbercover' + phoneverify).css('outline', '1px solid green');
                $('#checkfirstvilation').val('vilidatedsuccess');
                $('#pros-createnewcampus-btn').html('Create campus');
            }
        });






        var formattedinput = [];
        document.querySelectorAll('.campusphone').forEach(function(input) {
            // Get the `intlTelInput` plugin instance for the input field
            var iti = window.intlTelInputGlobals.getInstance(input);
            // Get the raw phone number value from the input field
            var numberformat = input.value;
            // Use the `intlTelInputUtils` library to format the phone number with its country code
            formattedinput.push(intlTelInputUtils.formatNumber(numberformat, iti.getSelectedCountryData()
                .iso2));
            // Display the formatted phone number in an alert message
        });



        var country_ID = [];
        $.each($('.generalcountry'), function() {
            country_ID.push($(this).val());

            var countryverify = $(this).data('count');
            var countrylverifyfinal = $('#countryid' + countryverify).val();


            if (countrylverifyfinal == '0' || countrylverifyfinal == ',') {
                $('.campuscountrycover' + countryverify).css('outline', '1px solid red');

                $('#pros-createnewcampus-btn').html('Create campus');

                $.wnoty({
                    type: 'warning',
                    message: "Hey!! select your country.",
                    autohideDelay: 6000
                });

            } else {
                $('.campuscountrycover' + countryverify).css('outline', '1px solid green');
                $('#pros-createnewcampus-btn').html('Create campus');
            }
        });





        var state_ID = [];
        $.each($('.generalstate'), function() {
            state_ID.push($(this).val());


            var stateverify = $(this).data('state');
            var statelverifyfinal = $('#state' + stateverify).val();


            if (statelverifyfinal == '0' || statelverifyfinal == ',') {
                $('.campusstatecover' + stateverify).css('outline', '1px solid red');
                $('#checkfirstvilation').val('validatedfinal');
                $('#pros-createnewcampus-btn').html('Create campus');

                $.wnoty({
                    type: 'warning',
                    message: "Hey!! select your state.",
                    autohideDelay: 6000
                });

            } else {
                $('.campusstatecover' + stateverify).css('outline', '1px solid green');
                $('#pros-createnewcampus-btn').html('Create campus');
            }

        });

        var local_Gov = [];
        $.each($('.generallga'), function() {
            local_Gov.push($(this).val());

            var lgaverify = $(this).data('lga');
            var lgalverifyfinal = $('#lgacity' + lgaverify).val();


            if (lgalverifyfinal == '0' || lgalverifyfinal == ',') {
                $('.campuslgacover' + lgaverify).css('outline', '1px solid red');

                $('#pros-createnewcampus-btn').html('Create campus');

                $.wnoty({
                    type: 'warning',
                    message: "Hey!! select your local government.",
                    autohideDelay: 6000
                });

            } else {
                $('.campuslgacover' + lgaverify).css('outline', '1px solid green');

                $('#pros-createnewcampus-btn').html('Create campus');
            }


        });

        // create new campus here




        var hasEmptyValueloc = campuslocation.some(function(value) {
            return value.trim() === '';
        });


        var hasEmptyValueemail = campusemail.some(function(value) {
            return value.trim() === '';
        });



        var hasEmptyValuephone = formattedinput.some(function(value) {
            return value.trim() === '';
        });



        var hasEmptyValuecountry = country_ID.some(function(value) {
            return value.trim() === '0';
        });

        var hasEmptyValuestate = state_ID.some(function(value) {
            return value.trim() === '0';
        });

        var hasEmptyValueslga = local_Gov.some(function(value) {
            return value.trim() === '0';
        });




        if (hasEmptyValueloc || hasEmptyValueemail || hasEmptyValuephone || hasEmptyValuecountry ||
            hasEmptyValuestate || hasEmptyValueslga) {

            $('#pros-createnewcampus-btn').html('Create campus');

            

        } else {


            campuslocation = campuslocation.toString();
            campusemail = campusemail.toString();
            formattedinput = formattedinput.toString();
            country_ID = country_ID.toString();
            state_ID = state_ID.toString();
            local_Gov = local_Gov.toString();


            if (schoolIDnew == '') {

                $('#pros-createnewcampus-btn').prop('disabled', true);
                //if creating new campus and new school 
                $.ajax({
                    type: "POST",
                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/create-schoolonboarding.php",
                    data: {
                        schoolName: schoolName,
                        mottoid: mottoid,
                        schooldomain: schooldomain,
                        campuslocation: campuslocation,
                        campusemail: campusemail,
                        formattedinput: formattedinput,
                        country_ID: country_ID,
                        state_ID: state_ID,
                        local_Gov: local_Gov,
                        UserID: UserID,
                        tagID: tagID
                    },

                    success: function(output) {
                        
                        $('#pros-createnewcampus-btn').prop('disabled', false);

                        $('#pros-createnewcampus-btn').html('Create campus');

                        localStorage.removeItem("schoolname");
                        localStorage.removeItem("schoolmotto");
                        localStorage.removeItem("schoolurl");
                        localStorage.removeItem("tag");

                        $('#pros-createnewcampus').modal('hide'); //hide create modal
                        $('#schoolsettings').fadeIn('slow'); //show next tag     
                        $('#groupschoolnewcampusid').val('');


                        var feedback = (output);

                        if (feedback == 'success') {

                                    $.wnoty({
                                        type: 'success',
                                        message: "Great!! School created successfully.",
                                        autohideDelay: 6000
                                    });
                                    
                                    location.reload();
                                    $('#displaycampus-created').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
                                    var ownerfirst_Name = "<?php echo $PrimaryName; ?>";
                                    var tagstate = "<?php echo $tagstate; ?>";
                


                                    $.ajax({
                
                                        type: "POST",
                                        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/displayschool-campus.php",
                                        data: {
                                            UserID: UserID,
                                            ownerfirst_Name: ownerfirst_Name,
                                            tagstate: tagstate
                                        },
                
                                        success: function(result) {
                                            $('#displaycampus-created').html(result);
                                            var userrole = (result);
                
                                        }
                                    });
                                        
                            
                            
                            

                        } else if(feedback.trim() == 'schoolexist')
                        {
                        
                            $.wnoty({
                                type: 'success',
                                message: "Hey!! It seems the school '" + schoolName + "' already exists",
                                autohideDelay: 6000
                            });
                            

                        }




                    





                    }
                });
                //if creating new campus and new school 



            } else {
                
                $('#pros-createnewcampus-btn').prop('disabled', true);
                // creating just campus or adding more campus to list
                $.ajax({
                    type: "POST",
                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/create-campusnew.php",
                    data: {
                        schoolIDnew: schoolIDnew,
                        campuslocation: campuslocation,
                        campusemail: campusemail,
                        formattedinput: formattedinput,
                        country_ID: country_ID,
                        state_ID: state_ID,
                        local_Gov: local_Gov,
                        UserID: UserID,
                        tagID: tagID
                    },

                    success: function(output) {

                    $('#pros-createnewcampus-btn').prop('disabled', false);
                        $('#pros-createnewcampus-btn').html('Create campus');
                        $('#groupschoolnewcampusid').val('');


                        $('#pros-createnewcampus').modal('hide'); //hide create modal
                        $('#schoolsettings').fadeIn('slow'); //show next tag     


                        var feedback = (output);

                        if (feedback.trim() == 'success') {

                            $.wnoty({
                                type: 'success',
                                message: "Great!! Campus added successfully.",
                                autohideDelay: 6000
                            });


                        } else {

                        }

                        $('#displaycampus-created').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
    
                    
                        var ownerfirst_Name = "<?php echo $PrimaryName; ?>";
                        var tagstate = "<?php echo $tagstate; ?>";



                        $.ajax({

                            type: "POST",
                            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/displayschool-campus.php",
                            data: {
                                UserID: UserID,
                                ownerfirst_Name: ownerfirst_Name,
                                tagstate: tagstate
                            },

                            success: function(result) {
                                $('#displaycampus-created').html(result);
                                var userrole = (result);

                            }
                        });





                    }
                });

                // creating just campus or adding more campus to list


            }






        }





    });






    // menubtn
    $('body').on('click', '.menubtn', function(e) {
        var planid = $(this).data('id');
        var tagid = $(this).data('tag');
        var UserID = "<?php echo $UserID; ?>";

        $.ajax({
            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/onboardingplan-setting.php",
            data: {
                planid: planid,
                tagid: tagid,
                UserID: UserID
            },
            success: function(result) {
                location.reload();
                // $('.generalstate').html(result);                           
            }
        });



    });//CHOOSE PLAN HERE


//SCHOOL SETTING

    // get country country code in number
    var campusphone = window.intlTelInput(document.querySelector(".campusnumber"), {
        separateDialCode: true,
        preferredCountries: ["ng"],
        hiddenInput: "full",
        utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
    });



    var staff_phone = window.intlTelInput(document.querySelector("#staffnumber"), {
        separateDialCode: true,
        preferredCountries: ["ng"],
        hiddenInput: "full",
        utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
    });



    //load school on document ready here
    $(document).ready(function() {

        $('#displaycampus-created').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');


        var UserID = "<?php echo $UserID; ?>";
        var ownerfirst_Name = "<?php echo $PrimaryName; ?>";
        var tagstate = "<?php echo $tagstate; ?>";


    

        $.ajax({

            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/displayschool-campus.php",
            data: {
                UserID: UserID,
                ownerfirst_Name: ownerfirst_Name,
                tagstate: tagstate
            },

            success: function(result) {
                $('#displaycampus-created').html(result);
                var userrole = (result);

                var confirmationame = $('#confirmschoolfor-owner').val();

                if (tagstate == '15') {
                    $('#pros-displaystepmsg-modal').modal('show');
                }




            }
        });



    }); //load school on document ready here


    //load setup modal when click on school 
    $('body').on('click', '.opensetupmodalforschool', function() {

        var CampusID = $(this).data('campus');
        var groupSchoolID = $(this).data('id');
        var access = $(this).data('access');
        var UserID = "<?php echo $UserID; ?>";
        var ownerfirst_Name = "<?php echo $PrimaryName; ?>";
        var tagstate = $(this).data('tag');
        var maintagstate = $(this).data('maintag');




        if (access == 'granted') {

            $('#pros-createstaff-modal').modal('show'); //load setup modal

            $('#pros-displaysetup-content').html(
                '<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
              

                prosload_set_upcontent(CampusID,groupSchoolID,UserID,ownerfirst_Name,tagstate);

            
          

        } else {


            $.wnoty({
                type: 'warning',
                message: "Oops!! you are only required to  set up with the main campus colored blue.",
                autohideDelay: 6000
            });
        }


    });
    //load setup modal when click on school 


    //open create class dropdown
    $('body').on('click', '.createclassgeneral', function() {
      
        var facultyid = $(this).data('faculty');


        const selectBtn = document.querySelector(".pros-openclasswhenclick" +
                facultyid),
            items = document.querySelectorAll(".listmeslist");

        // Toggle the "open" class when the selectBtn is clicked
        selectBtn.classList.toggle("open");
    });
    //open create class dropdown

    $('body').on('click', '.createsubjectgeneral', function() {
        // alert('hello');
        var facultyid = $(this).data('faculty');

        const selectBtnsub = document.querySelector(".pros-opensubjectwhenclick" +
                facultyid),
            items = document.querySelectorAll(".subjectlistmeslist");

        // Toggle the "open" subject when the selectBtn is clicked
        selectBtnsub.classList.toggle("open");
    });



    // load setup modal
    $('body').on('click', '.pros-loadsetupmodal', function() {
        var CampusID = $(this).data('campus');

        var groupSchoolID = $(this).data('id');
        var UserID = "<?php echo $UserID; ?>";
        var ownerfirst_Name = "<?php echo $PrimaryName; ?>";
        var tagstate = $(this).data('tag');

       
            

        prosload_set_upcontent(CampusID,groupSchoolID,UserID,ownerfirst_Name,tagstate);


    });
    // load setup modal

    function prosload_set_upcontent(CampusID,groupSchoolID,UserID,ownerfirst_Name,tagstate)
    {


      
      

        $('#pros-displaysetup-content').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
        
            $.ajax({

                type: "POST",
                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/loadsetup-modal.php",
                data: {
                    UserID: UserID,
                    ownerfirst_Name: ownerfirst_Name,
                    tagstate: tagstate,
                    groupSchoolID: groupSchoolID,
                    CampusID: CampusID
                },
                success: function(result) {

                    $('#pros-displaysetup-content').html(result);




                    var head_phones = [];
                        document.querySelectorAll('.pros-headnumset').forEach(function (input) {
                            head_phones.push(window.intlTelInput(input, {
                                separateDialCode: true,
                                preferredCountries: ["ng"],
                                hiddenInput: "full",
                                utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                            }));
                        });

                   

                       var head_phone = [];
                        document.querySelectorAll('.pros-teachernumset').forEach(function (input) {
                            head_phone.push(window.intlTelInput(input, {
                                separateDialCode: true,
                                preferredCountries: ["ng"],
                                hiddenInput: "full",
                                utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                            }));
                        });


                       var prosvalidatedadmin_admin =  $('#pros-adminnumset');
                       
                            // console.log(prosvalidatedadmin_admin);
                        if(prosvalidatedadmin_admin.length > 0)
                        {

                           
                            // var head_phone = window.intlTelInput(document.querySelector("#pros-adminnumset"), {
                            //     separateDialCode: true,
                            //     preferredCountries: ["ng"],
                            //     hiddenInput: "full",
                            //     utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                            // });


                        }else
                        {

                        }

                  



                    var tagstatusnew = tagstate;
                    


                    $('#prosloadschoolid-forbackward').val(CampusID);

                    
                    if (tagstatusnew == '' || tagstatusnew == '15') {
                        $('#displaysection-content').fadeIn('slow');
                        $('#movebackbtn-setup').fadeOut('slow');

                    } else if (tagstatusnew == '16') {

                        $('#pros-displayhead-setup').fadeIn('slow');
                        $('#movebackbtn-setup').fadeIn('slow');
                        $('#pros-displaybackvalue-tag').val(15);



                    } else if (tagstatusnew == '17') {

                        $('#assignschoolheadfaculty').fadeIn('slow');
                        $('#movebackbtn-setup').fadeIn('slow');
                        $('#pros-displaybackvalue-tag').val(16);

                    } else if (tagstatusnew == '18') {
                        $('#proscreateschool-teacher').fadeIn('slow');
                        $('#movebackbtn-setup').fadeIn('slow');
                        $('#pros-displaybackvalue-tag').val(17);

                    } else if (tagstatusnew == '19') {
                        $('#createotherschooltype-setup').fadeIn('slow');

                        $('#movebackbtn-setup').fadeIn('slow');
                        $('#pros-displaybackvalue-tag').val(18);

                    } else if (tagstatusnew == '20') {

                        $('#pros-reducemodalclasstypesetup').css('width', '700px');

                        $('#createwelcomemsg-setup').fadeIn('slow');
                        $('#movebackbtn-setup').fadeIn('slow');
                        $('#pros-displaybackvalue-tag').val(19);


                    } else if (tagstatusnew == '21') {

                        $('#createclasses-setup ').fadeIn('slow');
                        $('#movebackbtn-setup').fadeIn('slow');
                        $('#pros-displaybackvalue-tag').val(20);

                        // $('#pros-reducemodalclasstypesetup').addClass('modal-xl');

                    } else if (tagstatusnew == '22') {

                        $('#createsubject-setup').fadeIn('slow');
                        $('#movebackbtn-setup').fadeIn('slow');
                        $('#pros-displaybackvalue-tag').val(21);

                    } else if (tagstatusnew == '23') {

                        $('#mergesubjectcontent').fadeIn('slow');
                        $('#movebackbtn-setup').fadeIn('slow');
                        $('#pros-displaybackvalue-tag').val(22);


                    } else if (tagstatusnew == '24') {

                        $('#pros-assign-formteachercontent').fadeIn('slow');
                        $('#movebackbtn-setup').fadeIn('slow');
                        $('#pros-displaybackvalue-tag').val(23);

                    } else if (tagstatusnew == '25') {

                        $('#assignsubject-teachercontainer').fadeIn('slow');
                        $('#movebackbtn-setup').fadeIn('slow');
                        $('#pros-displaybackvalue-tag').val(24);

                    } else if (tagstatusnew == '26') {

                        $('#pros-loadsession-termcontent').fadeIn('slow');
                        $('#movebackbtn-setup').fadeIn('slow');
                        $('#pros-displaybackvalue-tag').val(25);

                    } else if (tagstatusnew == '27') {

                        $('#pros-schlogo-content').fadeIn('slow');
                        $('#movebackbtn-setup').fadeIn('slow');
                        $('#pros-displaybackvalue-tag').val(26);

                    }else if(tagstatusnew == '28')
                    {
                        $('#prosschool-bgimage-content').fadeIn('slow');
                        $('#movebackbtn-setup').fadeIn('slow');
                        $('#pros-displaybackvalue-tag').val(27);


                    }else if(tagstatusnew == '29')
                    {

                                    //setup completed
                        
                    }


                    
                    const selectBtnnewclass = document.querySelector(
                                    ".getclassopenondocument-ready1"),
                                itemsclass = document.querySelectorAll(".listmeslist");
                            selectBtnnewclass.classList.toggle("open");


                    const selectBtnnewsubject = document.querySelector(".getsubjectopenondocument-ready1"),
                        itemssubject = document.querySelectorAll(".subjectlistmeslist");
                    selectBtnnewsubject.classList.toggle("open");





                          






                   

                }
            });


    }




    // checked subject merge when click on label title
    $('body').on('click', '.pros-subjectmergelabel', function() {
        var margerID = $(this).data('id');


        var verycheckedmerge = $('.generchecksubjectmerge' + margerID).prop("checked");


        if (verycheckedmerge) {
            $('.generchecksubjectmerge' + margerID).prop("checked", false);
        } else {
            $('.generchecksubjectmerge' + margerID).prop("checked", true);
        }

    });
    // checked subject merge when click on label title



   




    $('body').on('input', '.schoollinkclass', function() {

      

        var schoolink = $(this).val();
        var UserID = "<?php echo $UserID; ?>";
        pros_checkurlhere(schoolink,UserID);

        


    });

    function  pros_checkurlhere(schoolink,UserID)
    {

            var SchoolID = '';


            if (schoolink == '') {
                $('#fullschoollinkcon').fadeOut();
                $('#schoollinkdis').html(schoolink);

                $('#fullschoollinkcon-new').fadeOut();
                $('#schoollinkdis-new').html(schoolink);
            } else {
                $('#fullschoollinkcon').fadeIn();
                $('#schoollinkdis').html(schoolink);

                $('#fullschoollinkcon-new').fadeIn();
                $('#schoollinkdis-new').html(schoolink);


                $.ajax({
                    type: "POST",
                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/verify-schoollink.php",
                    data: {
                        schoolink: schoolink,
                        UserID: UserID,
                        SchoolID: SchoolID
                    },
                    success: function(result) {
                        var userrole = (result);


                        if (userrole.trim() == 'found') {
                            // alert(userrole);
                                $('.pros_verifyurl_exist_input_here').val('');//empty input
                            $('.pros_verifyurl_exist_input_here').val('found'); //    pros append value to input if Url found
                            $.wnoty({
                                type: 'warning',
                                message: "This Url already exist for another school",
                                autohideDelay: 6000
                            });
                        } else {

                            $('.pros_verifyurl_exist_input_here').val('');//empty input
                            $('.pros_verifyurl_exist_input_here').val('okay'); //    pros append value to input if Url not found

                        }

                    }
                });
            }

    }
    
    //CHECK SCHOOL LINK HERE


    $('body').on('input', '.schoollinkclassedit', function() {

        var schoolink = $('.schoollinkclassedit').val();
        var UserID = "<?php echo $UserID; ?>";
        var SchoolID = $(this).data('school');
        

        if (schoolink == '') {
            $('#fullschoollinkconedit').fadeOut();
            $('#schoollinkdisedit').html(schoolink);
        } else {
            $('#fullschoollinkconedit').fadeIn();
            $('#schoollinkdisedit').html(schoolink);



            $.ajax({
                type: "POST",
                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/verify-schoollink.php",
                data: {
                    schoolink: schoolink,
                    UserID: UserID,
                    SchoolID: SchoolID
                },
                success: function(result) {
                    var userrole = (result);
                    // alert(result);

                    if (userrole.trim() == 'found') {


                        $('.pros_verifyurl_exist_input_here').val('');//empty input
                        $('.pros_verifyurl_exist_input_here').val('found'); 
                        $.wnoty({
                            type: 'warning',
                            message: "this Url already exist for another school",
                            autohideDelay: 6000
                        });
                    } else {

                        $('.pros_verifyurl_exist_input_here').val('');//empty input
                        $('.pros_verifyurl_exist_input_here').val('okay'); 

                    }

                }
            });


        }



    });//CHECK SCHOOL LINK HERE ON EDIT

    // invite staff content here

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
                    autohideDelay: 5000
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



                    if (usertype_check == 'teacher') {

                        $('#pros-createtitle').html('Create teacher');
                        $('#pros-invitetitle').html('Invite teacher');

                    } else if (usertype_check == 'schoolhead') {
                        $('#pros-createtitle').html('Create school head');
                        $('#pros-invitetitle').html('Invite school head');

                    } else if (usertype_check == 'nonteaching') {

                        $('#pros-createtitle').html('Create Non-teaching staff');
                        $('#pros-invitetitle').html('Invite Non-teaching staff');

                    } else if (usertype_check == 'Senior executive/Board member')

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

        $('body').on('click', '#invitestaffclick', function() {

            $('#pros-displayadminmenuset').html('<div class="d-flex justify-content-center">' +
                '<div class="spinner-border" role="status">' +
                '<span class="visually-hidden">Loading...</span>' +
                '</div>' +
                '</div>');

            var groupSchoolID = $(this).data('id');
            var UserID = "<?php echo $UserID; ?>";
            $('#staffgroupschoolID').val(groupSchoolID);
            $('#pros-display-schoolid').val(groupSchoolID);

            $.ajax({
                type: "POST",
                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/loadmenu-onboarding.php",
                data: {
                    groupSchoolID: groupSchoolID,
                    UserID: UserID
                },
                success: function(result) {

                    $('#pros-displayadminmenuset').html(result);
                }
            });




        });




        // check admin menu prosper
        $('body').on('click', '.pros-mainmenugeneralclass', function(e) {
            var mainmenu = $(this).data('id');
            var checkbox = $('.prossubmenuclass' + mainmenu);
            checkbox.prop('checked', !checkbox.prop('checked'));
            var mainlength = checkbox.length;


            if (mainlength == 0) {} else {
                if ($(".prossubmenuclass" + mainmenu + ":checked").length === mainlength) {
                    $('.prosgeneralmenuchecked' + mainmenu).prop('checked', true);
                } else {
                    $('.prosgeneralmenuchecked' + mainmenu).prop('checked', false);
                }
            }

        });
        // check admin menu prosper



        $('body').on('click', '#pros-checkmenu-foradmin', function() { //collect assign to admin and proceed

            var pros_verify_menucheck_box = $(".pros-checkchildren:checked").val();


            if (pros_verify_menucheck_box == undefined) {
                $.wnoty({
                    type: 'warning',
                    message: "Please select at least one menu option before proceeding!",
                    autohideDelay: 5000
                });

            } else {


                var main_menuarr = [];

                // collect menu as array format prosper
                var mainmenuID = [];
                $.each($(".pros-mainmenugeneralclass:checked"), function() {

                    main_menuarr.push($(this).data('id'));
                    var miancampus = $(this).data('id');

                    var submenuarr = [];
                    //loop through submenu here
                    $.each($(".prossubmenuclass" + miancampus + ":checked"), function() {
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


        }); //collect assign to admin and proceed


        // invite staff content here

        $('body').on('click', '#editcampusbtn', function() {
            $('#displayschforedit').html(
                '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>'
            );
            var campusID = $(this).data('camp');
            var SchoolID = $(this).data('sch');

            $.ajax({
                type: "POST",
                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/loadonbordedcampus-edit.php",
                data: {
                    campusID: campusID,
                    SchoolID: SchoolID
                },
                success: function(result) {
                    $('#displayschforedit').html(result);

                    var campusphoneedit = window.intlTelInput(document.querySelector(
                        ".campusnumberedit"), {
                        separateDialCode: true,
                        preferredCountries: ["ng"],
                        hiddenInput: "full",
                        utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                    });
                }
            });
        });





        //pros proceed to edit campus here
        

        $('body').on('click', '#pros-updtaecampusbtn', function() {

            $(this).html('<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>saving..');


            var campusID = $('#proscampusifforeditfinal').val();
            var campusloceditt = $('#proscampuslocationedit').val();
            var campusemailedit = $('#proscampusemailhere').val();
            var campusenumedit = $('#proscampusnumberedit').val();
            var proscampuscountryedit = $('#proscampuscountryedit').val();
            var proscampusstateedit = $('#proscampusstateedit').val();
            var proscampuslgaedit = $('#proscampuslgaedit').val();

            




            const emailPatternedit = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

            if(campusloceditt == '')
            {

            
                        $.wnoty({
                            type: 'warning',
                            message: "campus location or name should not be left empty.",
                            autohideDelay: 5000
                        });

                        $('#pros-updtaecampusbtn').html('Update campus');


            }else if(campusemailedit == '')
            {


                    $.wnoty({
                            type: 'warning',
                            message: "campus email should not be left empty.",
                            autohideDelay: 5000
                        });

                        $('#pros-updtaecampusbtn').html('Update campus');
            }else if(!emailPatternedit.test(campusemailedit))
            {



                        $.wnoty({
                            type: 'warning',
                            message: "Input a valid mail to proceed.",
                            autohideDelay: 5000
                        });

                        $('#pros-updtaecampusbtn').html('Update campus');

            }else if(campusenumedit  == '')
            {

                        $.wnoty({
                            type: 'warning',
                            message: "Phone number should not be left empty.",
                            autohideDelay: 5000
                        });

                        $('#pros-updtaecampusbtn').html('Update campus');

            }else if(proscampuscountryedit == '' || proscampuscountryedit == '0')
            {

                
                        $.wnoty({
                            type: 'warning',
                            message: "Country should not be left empty.",
                            autohideDelay: 5000
                        });

                        $('#pros-updtaecampusbtn').html('Update campus');

            }else if(proscampusstateedit == '' || proscampusstateedit == '0')
            {


                        $.wnoty({
                            type: 'warning',
                            message: "select state to proceed.",
                            autohideDelay: 5000
                        });

                        $('#pros-updtaecampusbtn').html('Update campus');

            }else if(proscampuslgaedit == '' || proscampuslgaedit == '0')
            {


                        $.wnoty({
                            type: 'warning',
                            message: "select LGA or city to proceed.",
                            autohideDelay: 5000
                        });

                        $('#pros-updtaecampusbtn').html('Update campus');

            }else
            {
                        var formattedinput = [];
                        document.querySelectorAll('.campusnumberedit').forEach(function(input) {
                            // Get the `intlTelInput` plugin instance for the input field
                            var iti = window.intlTelInputGlobals.getInstance(input);
                            // Get the raw phone number value from the input field
                            var numberformat = input.value;
                            // Use the `intlTelInputUtils` library to format the phone number with its country code
                            formattedinput.push(intlTelInputUtils.formatNumber(numberformat, iti.getSelectedCountryData()
                                .iso2));
                            // Display the formatted phone number in an alert message
                        });

                        formattedinput = formattedinput.toString();


                    


                        $('#pros-updtaecampusbtn').prop('disbled', true);


                        



                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/proseditcampusall-here.php",
                                    data: {
                                            campusID:campusID,
                                            campusloceditt:campusloceditt,
                                            campusemailedit:campusemailedit,
                                            proscampuscountryedit:proscampuscountryedit,
                                            proscampusstateedit:proscampusstateedit,
                                            proscampuslgaedit:proscampuslgaedit,
                                            number:formattedinput

                                    },
                                    success: function(result) {

                                    
                                        // alert(result)
                                    

                                        
                                    
                                        $('#pros-updtaecampusbtn').prop('disbled', false);


                                    


                                                                

                                                        if(result.trim() == 'success')
                                                        {
                                                            

                                                                
                                                            const maxLength = 30; // Maximum length of the shortened string
                
                                                            // Check if the original string exceeds the maximum length
                                                            if (campusloceditt.length > maxLength) {
                                                                var shortenedString = campusloceditt.slice(0, maxLength);
                                                            
                                                            } else {
                                                                var shortenedString = campusloceditt;
                                                            }
                                                                                
                                                        

                                                            $('.prosdisplaycampusnameedit'+campusID).html(shortenedString);

                                                            $('#pros-editcampus-modal').modal('hide');

                                                            
                                                            $.wnoty({
                                                                type: 'success',
                                                                message: "campus records saved successfully.",
                                                                autohideDelay: 5000
                                                            });



                                                        }else

                                                        {

                                                        }



                                    }

                                });


                    
                

            }




            
            

        

            
            

        });



        $('body').on('click', '#editschoolbtn', function() {
            $('#displayschoolforedit').html(
                '<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>'
            );
            var SchoolID = $(this).data('id');
            var UserID = "<?php echo $UserID; ?>";


            $.ajax({
                type: "POST",
                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/loadonbordedschool-edit.php",
                data: {
                    UserID: UserID,
                    SchoolID: SchoolID
                },
                success: function(result) {
                    $('#displayschoolforedit').html(result);
                }

            });



        });

        $('body').on('click', '#deleteschoolbtn', function() {
            var SchoolID = $(this).data('school');
            var schoolname = $(this).data('schoolname');
            var UserID = "<?php echo $UserID; ?>";
            $('#displayschoolname-del').html(schoolname);

            $('#prosget-schoolidfordelete').val(SchoolID);
        


        });


        //pros load campus delete content here
        $('body').on('click', '#prosdeletecampusbtnload', function() {

            var SchoolID = $(this).data('sch');
            var campusID = $(this).data('camp');
            var campusname = $(this).data('campname');
        
            $('#prosloadcontentdelte').html(campusname);
            $('#prosloadcampusdeleteschool').val(SchoolID);
            $('#prosloadcampusdeletecampus').val(campusID);


        });

        //delete campus final btn here  
        $('body').on('click', '.pros-deletecampusbtnfinal', function() {




            $(this).html('<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>deleting..');

            var UserID = "<?php echo $UserID; ?>";
            var SchoolID = $('#prosloadcampusdeleteschool').val();
            var campusID = $('#prosloadcampusdeletecampus').val();


            $('.pros-deletecampusbtnfinal').prop('disabled', true);



            $.ajax({
                    type: "POST",
                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/proseletecampus-here.php",
                    data: {
                        UserID:UserID,
                        SchoolID:SchoolID,
                        campusID:campusID
                    },
                    success: function(result){

                        

                            $('.pros-deletecampusbtnfinal').html('Delete');
                            $('.pros-deletecampusbtnfinal').prop('disabled', false);



                            if(result.trim() == 'success')
                            {



                                        $('#pros-deletecampus-modal').modal('hide');
                                                        
                                        $.wnoty({
                                            type: 'success',
                                            message: "campus removed successfully.",
                                            autohideDelay: 5000
                                        });

                                        $('#displaycampus-created').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

                                        var ownerfirst_Name = "<?php echo $PrimaryName; ?>";
                                        var tagstate = "<?php echo $tagstate; ?>";



                                        $.ajax({

                                            type: "POST",
                                            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/displayschool-campus.php",
                                            data: {
                                                UserID: UserID,
                                                ownerfirst_Name: ownerfirst_Name,
                                                tagstate: tagstate
                                            },

                                            success: function(result) {
                                                $('#displaycampus-created').html(result);
                                                var userrole = (result);

                                            }
                                        });




                            }else
                            {


                                    $.wnoty({
                                            type: 'error',
                                            message: "Delete failed pls try again.",
                                            autohideDelay: 5000
                                        });

                            }



                    }

            });
            






        });

        // delete SCHOOL final btn here
        $('body').on('click', '#pros-deleteschoolherebtn', function() {

            $(this).html('<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>deleting..');

            var UserID = "<?php echo $UserID; ?>";
            var SchoolID =  $('#prosget-schoolidfordelete').val();
            $('#pros-deleteschoolherebtn').prop('disabled', true);
        




            $.ajax({
                    type: "POST",
                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/loadonbordedschool-delete.php",
                    data: {
                        UserID:UserID,
                        SchoolID:SchoolID
                    },
                    success: function(result){

                            $('#pros-deleteschoolherebtn').html('Delete');
                            $('#pros-deleteschoolherebtn').prop('disabled', false);
                            

                            if(result.trim() == 'success')
                            {



                                        $('#pros-deleteschool-modal').modal('hide');
                                                        
                                        $.wnoty({
                                            type: 'success',
                                            message: "school removed successfully.",
                                            autohideDelay: 5000
                                        });

                                        $('#displaycampus-created').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

                                        var ownerfirst_Name = "<?php echo $PrimaryName; ?>";
                                        var tagstate = "<?php echo $tagstate; ?>";



                                        $.ajax({

                                            type: "POST",
                                            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/displayschool-campus.php",
                                            data: {
                                                UserID: UserID,
                                                ownerfirst_Name: ownerfirst_Name,
                                                tagstate: tagstate
                                            },

                                            success: function(result) {
                                                $('#displaycampus-created').html(result);
                                                var userrole = (result);

                                            }
                                        });




                            }else
                            {


                                    $.wnoty({
                                            type: 'error',
                                            message: "Delete failed pls try again.",
                                            autohideDelay: 5000
                                        });

                            }


                    }    

            });




            
                        
        });

        // undo delete campus here

        $('body').on('click', '.pros-undoncampusdeletebtn', function() {

                var prosdeletecampusID = $(this).data('id');
                var InstitutionID = $(this).data('school');
                var UserID = "<?php echo $UserID; ?>";



                $.ajax({
                    type: "POST",
                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/pros-undoschooldelete.php",
                    data: {
                        UserID:UserID,
                        prosdeletecampusID:prosdeletecampusID,
                        InstitutionID:InstitutionID
                    },
                    success: function(result){

                            $('#pros-deleteschoolherebtn').html('Delete');
                            $('#pros-deleteschoolherebtn').prop('disabled', false);
                            

                            if(result.trim() == 'success')
                            {



                                        $('#pros-deleteschool-modal').modal('hide');
                                                        
                                        $.wnoty({
                                            type: 'success',
                                            message: "Delete undone successfully.",
                                            autohideDelay: 5000
                                        });

                                        $('#displaycampus-created').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

                                        var ownerfirst_Name = "<?php echo $PrimaryName; ?>";
                                        var tagstate = "<?php echo $tagstate; ?>";



                                        $.ajax({

                                            type: "POST",
                                            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/displayschool-campus.php",
                                            data: {
                                                UserID: UserID,
                                                ownerfirst_Name: ownerfirst_Name,
                                                tagstate: tagstate
                                            },

                                            success: function(result) {
                                                $('#displaycampus-created').html(result);
                                                var userrole = (result);

                                            }
                                        });




                            }else
                            {


                                    $.wnoty({
                                            type: 'error',
                                            message: "Delete undo failed etry again later",
                                            autohideDelay: 5000
                                        });

                            }


                    }    

            });


                
                



        });

        


        // hide on document modal for setup prompt

        $('body').on('click', '#pros-nextschool-createstaff', function() {

            $('#pros-displaystepmsg-modal').modal('hide');
            $('#pros-createstaff-modal').modal('show');
        });



    });






    // insert staff
    $('body').on('click', '#getschoolinvitebtn', function() {

    
            $(this).html(
                '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>creating...'
            );
            var typeof_invitation = $("input[type='radio'].inviteuser-create:checked").val();
            var groupSchoolID = $('#staffgroupschoolID').val();
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
                        autohideDelay: 5000
                    });
                    $('#getschoolinvitebtn').html('Submit <i class="fa fa-long-arrow-right"></i>');

                } else if (staff_lastname == '') {


                    $('.stafff-lastnamecont').css('outline', '1px solid red');
                    $('.stafffnamecont').css('outline', '1px solid green');

                    $.wnoty({
                        type: 'warning',
                        message: "Staff's last name shouldn't be left blank.",
                        autohideDelay: 5000
                    });

                    $('#getschoolinvitebtn').html('Submit <i class="fa fa-long-arrow-right"></i>');

                } else if (staff_email == '') {

                    $('.stafff-emailcont').css('outline', '1px solid red');
                    $('.stafff-lastnamecont').css('outline', '1px solid green');
                    $('.stafffnamecont').css('outline', '1px solid green');

                    $.wnoty({
                        type: 'warning',
                        message: "Staff's email shouldn't be left blank.",
                        autohideDelay: 5000
                    });

                    $('#getschoolinvitebtn').html('Submit <i class="fa fa-long-arrow-right"></i>');

                } else if (!emailPattern.test(staff_email)) {

                    $('.stafff-emailcont').css('outline', '1px solid red');
                    $('.stafff-lastnamecont').css('outline', '1px solid green');
                    $('.stafffnamecont').css('outline', '1px solid green');

                    $.wnoty({
                        type: 'warning',
                        message: "Invalid email. please provide a valid one",
                        autohideDelay: 5000
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
                        autohideDelay: 5000
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
                        autohideDelay: 5000
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
                        autohideDelay: 5000
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
                                    autohideDelay: 5000
                                });
                                $('#pros-invitestaff-usertype').modal('hide');
                            

                            } else if (prosdata == 'exist') {
                                $.wnoty({
                                    type: 'warning',
                                    message: "email already exist",
                                    autohideDelay: 5000
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
                    
                        pros_staffemailinvite.push($(this).val());
                        
                        var staffemaildata = $(this).data('id');
                        
                        var staffselectid = $('.prossingleinvitemail'+staffemaildata).val();
                        
                        if(staffselectid == '')
                        {
                            $('.pros-inviteemailcover'+staffemaildata).css('outline', '1px solid red');
                            
                            $.wnoty({
                                type: 'warning',
                                message: "enter your staff's email",
                                autohideDelay: 5000
                            });
                            $('#getschoolinvitebtn').html('Submit <i class="fa fa-long-arrow-right"></i>');
                            
                        }else if(!emailPattern.test(staffselectid))
                        {
                            $('.pros-inviteemailcover'+staffemaildata).css('outline', '1px solid red');
                            
                            $.wnoty({
                                type: 'warning',
                                message: "enter a valid email",
                                autohideDelay: 5000
                            });
                            $('#getschoolinvitebtn').html('Submit <i class="fa fa-long-arrow-right"></i>');
                        }else
                        {
                        $('.pros-inviteemailcover'+staffemaildata).css('outline', '1px solid green');  
                        }
                        
                        

                        
                        
                        
                    
                });
            
                
                
                
                
                    var pros_staffinviteemailvalidate = pros_staffemailinvite.some(function(value) {
                            return value.trim() === '';
                        });
                        
                        if(pros_staffinviteemailvalidate)
                        {
                            
                        }else
                        {
                            
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
                                            // $('#displaycampus-created').html(result);
                                            $('#getschoolinvitebtn').html('Submit <i class="fa fa-long-arrow-right"></i>');
                                            var prosdata = (output);
                                        
                                            
                            
                                            if (prosdata.trim() == 'success') {
                                                $.wnoty({
                                                    type: 'success',
                                                    message: "Great!! staff created Successfully.",
                                                    autohideDelay: 5000
                                                });
                                                $('#pros-invitestaff-usertype').modal('hide');
                                            
                            
                                            } else if (prosdata == 'found') {
                                                $.wnoty({
                                                    type: 'warning',
                                                    message: "email already exist",
                                                    autohideDelay: 5000
                                                });
                                            }
                            
                                        }
                                    });    
                            
                                
                        }
                
                




            } else {
                $.wnoty({
                    type: 'warning',
                    message: "Hey! select either invite staff or create staff before proceeding.",
                    autohideDelay: 5000
                });
                $('#getschoolinvitebtn').html('Submit <i class="fa fa-long-arrow-right"></i>');
            }


    });
    // insert staff   



    $('body').on('click', '.generalclass-usertype', function() { //when click on staff invite or create link

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

    }); //when click on staff invite or create link

    // check usertype create
    $('body').on('click', '.generalcreateotheeusertypecover', function() {

        var datausertype = $(this).data('id');
    
        if (datausertype == '1') {
            $("#proschecksetupboard").prop("checked", true);
            $("#pros-checksetupdamin").prop("checked", false);

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




    $('body').on('click', '#addcampusbtn', function() {

        var numappended = $("#appendinput").val();
        numappended++;
        var numofcampus = numappended + 1;


        var appendinputnew = '<div  id="pros-campuscontainer' + numappended +
            '"><br><br>  <span  class="schoolheading  campuscntnum" style="margin-left:11%;">Campus ' +
            numofcampus +

            '</span><span class="fa fa-close removecampusbtn" style="color:red;float:right;margin-right:10%;margin-bottom:2rem;cursor:pointer;"  data-id="pros-campuscontainer' +

            numappended + '"  data-camcnt="' + numofcampus +

            '">Remove</span><p></p><div class="pros-geneclass-label" style="margin-left:4%;font-family:poppins, sans-serif;"><label for="schoolName">Campus title/location<span style="color:red;">*</span></label></div>' +
            '<div class="pros-flexi-input-affix-wrapper-campus campuslocationcover' + numappended + '">' +

            '<input name="campusname" class="pros-flexi-input  campuslocation"  data-id="' + numappended +
            '" placeholder=" campus location here" id="campuslocation" type="text" spacebottom="10px" required="" value="" style="width: 100%;">' +

            '</div>&nbsp;&nbsp;' +

            '<div class="pros-geneclass-label" style=" margin-left:4%;font-family: poppins, sans-serif;"><label for="schoolName">Email<span style="color:red;">*</span></label></div>' +

            '<div class="pros-flexi-input-affix-wrapper-campus campusemailcover' + numappended + '">' +

            '<input name="schoolName" class="pros-flexi-input campusemail" data-id="' + numappended +
            '" placeholder="e.g example@gmail.com" id="campusemail' + numappended +
            '" type="text" spacebottom="10px" required="" value="" style="width: 100%;">' +

            '</div>&nbsp;&nbsp;' +

            '<div class="pros-geneclass-label" style=" margin-left:4%;font-family: poppins, sans-serif;"><label for="schoolName">Phone<span style="color:red;">*</span></label></div>' +
            '<div class="pros-flexi-input-affix-wrapper-campus campusnumbercover' + numappended + '">' +
            '<input name="phonenumber' + numappended + '[main]" class="pros-flexi-input  campusphone phonenumber' +
            numappended + '" data-id="' + numappended + '"  id="phonenumber' + numappended +
            '" placeholder="e.g XXXX-XXX-XXXX" id="campusnumber" type="text" spacebottom="10px" required="" value="" style="width: 90%;margin-left:4%;">' +
            '</div>&nbsp;&nbsp;' +

            '<div class="pros-geneclass-label" style=" margin-left:4%;"><label for="schoolName">Country<span style="color:red;">*</span></label></div>' +
            '<div class="pros-flexi-input-affix-wrapper-campus campuscountrycover' + numappended + '">' +
            '<select class="generalcountry pros-generalselect   ml-3" id="countryid' + numappended +
            '" data-count="' + numappended + '"  data-id="state' + numappended +
            '" style="width: 85%;margin-left:2rem;">' +
            '<option value="0">Select Country</option>' +

            <?php
                    $sqltogetcountries_forinput = mysqli_query($link, "SELECT * FROM `countries`");
                    $rowtogetcountries_data = mysqli_fetch_assoc($sqltogetcountries_forinput);
                    $cnttogetcountries_data = mysqli_num_rows($sqltogetcountries_forinput);

                    if ($cnttogetcountries_data > 0) {
                        ?>



                <?php
                        do {

                            $getcountryname = $rowtogetcountries_data['CountryName'];
                            $countryID = $rowtogetcountries_data['countryID'];
                            $escapedStrcountry = htmlspecialchars($getcountryname, ENT_QUOTES, 'UTF-8');

                            if ($countryID == '161') {
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
                    ?>
                        '<option value="<?php echo $countryID; ?>" <?php echo $selected; ?>><?php echo $escapedStrcountry; ?></option>' +
                    <?php
                        } while ($rowtogetcountries_data = mysqli_fetch_assoc($sqltogetcountries_forinput));
                    ?>
                <?php
                    }
                ?>

            '</select>' +
            '</div>&nbsp;&nbsp;' +
            '<div class="row">' +
            '<div class="col-sm-6">' +
            '<div class="pros-flexi-label-wrapper ml-5"><label for="schoolName">State<span style="color:red;">*</span></label></div>' +
            '<div class="pros-flexi-input-affix-wrapper-campus campusstatecover' + numappended + ' ml-5">' +
            '<select class="generalstate pros-generalselect  ml-3" data-state="' + numappended + '" id="state' +
            numappended + '" data-id="lgacity' + numappended + '"  style="width:85%;margin-left:1rem;">' +
            '<option value="0">Select State</option>' +
            '</select>' +

            '</div>' +
            '</div>' +
            '<div class="col-sm-6">' +

            '<div class="pros-flexi-label-wrapper"><label for="schoolName">LGA<span style="color:red;">*</span></label></div>' +
            '<div class="pros-flexi-input-affix-wrapper-campus campuslgacover' + numappended + ' mr-5">' +
            '<select class="generallga pros-generalselect  ml-3"  data-lga="' + numappended + '" id="lgacity' +
            numappended + '" style="width: 85%;margin-left:1rem;">' +
            '<option value="0">Select LGA</option>' +

            '</select>' +

            '</div>' +
            '</div>' +

            '</div><br></div>';

        $(document.createElement('div')).append(appendinputnew).appendTo('#displaycampus');

        var country = $('.generalcountry').val();
        var countryid_doc = $('.generalcountry').data('id');
        var dataString = '&country=' + country;

        $('.generalstate').html('<option value="0">Loading...</option>');

        $.ajax({
            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/get-state-onboarding.php",
            data: dataString,

            success: function(result) {
                $('.generalstate').html(result);
            }
        });
        var dynamicvar = 'phonenumber' + numappended;

        window[dynamicvar] = window.intlTelInput(document.querySelector("#phonenumber" + numappended), {
            separateDialCode: true,
            preferredCountries: ["ng"],
            hiddenInput: "full",
            utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
        });
        $("#appendinput").val(numappended);

    });




    //remove appended input here
    $('body').on('click', '.removecampusbtn', function(e) {

        e.preventDefault();
        var dividd = $(this).data('id');

        var camcnt = 1;
        $('#' + dividd).remove();
        var numappended = $("#appendinput").val();

        // $('#' + camcnt).html(numappended);
        numappended--;
        $("#appendinput").val(numappended);



    });
    //remove appended input 



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


    // remove appende staff email  here

    $('body').on('click', '#pros-removeappended-email', function() {

        var pros_removeinput = $(this).data('id');
        var numappended = $("#pros-appendinput-ivite-email").val();

        $('#pros-staffemail-remove' + pros_removeinput).remove();

        numappended--;

        $("#pros-appendinput-ivite-email").val(numappended);
    });

    // remove appende staff email  end here



        // check input usertype
    $('body').on('click', '.generalclass-checksection', function (e) {

        if($(e.target).is('input[type="checkbox"]') || $(e.target).is('label'))
        {
            return;
        }
       
        let checkboxId = $(this).data('id');
        let $checkbox = $('#' + checkboxId);
        let sectionID = checkboxId.replace('prosfacultyid', '');

        // Toggle checkbox state manually
        // $checkbox.prop('checked', !$checkbox.prop('checked'));
        $checkbox.prop('checked', !$checkbox.prop('checked')).trigger('change');

        // Update outline based on new state

        if ($checkbox.prop('checked')) {
            $(this).css('outline', '1px solid #007bff');

            $('.sectionalianameherechecked' + sectionID).attr('disabled', false);
        } else {
            $(this).css('outline', 'none');
            $('.sectionalianameherechecked' + sectionID).attr('disabled', true);
        }

        // Animation
        $(this).animate({ top: '-=20px' }, 'fast', 'swing')
            .delay(200)
            .animate({ top: '+=20px' }, 'fast', 'swing');
    });


       

    // Prevent checkbox click from bubbling up and double-toggling
    $('body').on('change', '.sectioncheckbox', function (e) {
        e.stopPropagation(); // stop checkbox from bubbling to card
        let sectionID = $(this).attr('id').replace('prosfacultyid', '');
        let $card = $(this).closest('.generalclass-checksection');

        if ($(this).prop('checked')) {
            $card.css('outline', '1px solid #007bff');
            $('.sectionalianameherechecked' + sectionID).attr('disabled', false);
        } else {
            $card.css('outline', 'none');
            $('.sectionalianameherechecked' + sectionID).attr('disabled', true);
        }
    });







        // $('body').on('change', '.sectioncheckbox', function() {
        //     var checkverysection = $(this).data('checkverify');

        // });



    // add new section page
    // $('body').on('click', '#addnew-section', function() {
    //     $('#pros-displaysection-new').fadeIn('slow');

    //     var verifyhidesection_check = $('#pros-upsetioncreatenew-hide').val();

    //     if (verifyhidesection_check == '0') {
    //         $('#pros-displaysection-new').fadeIn('slow');
    //         $(this).html('Close');
    //         $('#pros-upsetioncreatenew-hide').val(1)
    //     } else {
    //         $('#pros-displaysection-new').fadeOut('slow');
    //         $(this).html('Create new');
    //         $('#pros-upsetioncreatenew-hide').val(0)
    //     }

    // });


    //create section setup start here
    $('body').on('click', '#pros-create-sectionbtn', function() {


        $('#pros-create-sectionbtn').html('<span class="spinner-border spinner-border-sm" aria-hidden="true"></span><span class="visually-hidden" role="status">Loading...</span>');
    
        
        var selSchoolFaculty_check_validate = $(".sectioncheckbox:checked").val();
        var ownerfirst_Name = "<?php echo $PrimaryName; ?>";
        var tagstate = $(this).data('tag');
        var UserID = "<?php echo $UserID; ?>";
        var campusID = $(this).data('campus');
        var groupSchoolID = $(this).data('school');
        var maintag = $(this).data('main');




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

        
                $('#pros-create-sectionbtn').html('Create section');


        } else {


            selSchoolFaculty_check = selSchoolFaculty_check.toString();
            pros_section_alias_name = pros_section_alias_name.toString();
            pros_load_sectionID_alias = pros_load_sectionID_alias.toString();


            $.ajax({
                type: "POST",
                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/onboarding-create-section.php",
                data: {
                    selSchoolFaculty_check: selSchoolFaculty_check,
                    pros_section_alias_name: pros_section_alias_name,
                    pros_load_sectionID_alias:pros_load_sectionID_alias,
                    campusID: campusID,
                    tagstate: tagstate,
                    UserID: UserID
                },
                success: function(feeback) {
                    $('#pros-create-sectionbtn').html('Create section');

                    var pros_output = (feeback);
                

                    if (pros_output.trim() == 'success')
                    {

                        $.wnoty({
                            type: 'success',
                            message: "Great!! school head created successfully.",
                            autohideDelay: 5000
                        });


                        $('#displaysection-content').animate({
                            left: '+=50',
                            height: 'toggle'
                        }, 500);

                        $('#pros-displayhead-setup').fadeIn('slow');
                        $('#movebackbtn-setup').fadeIn('slow');
                        
                          prosload_set_upcontent(campusID,groupSchoolID,UserID,ownerfirst_Name,tagstate);
                    }else
                    {

                                $.wnoty({
                                    type: 'error',
                                    message: "Opps!! section failed to be created try again later.",
                                    autohideDelay: 5000
                                });

                    }

                

                }
            });
        }

    }); //create section setup en here

    $('body').on('click', '#pros-addschoolhead-btn', function() {

        var numappended = $("#appendinput-schoolhead").val();
        numappended++;
        var numofcampus = numappended + 1;
        var pros_display_schoolhead_appended_input = '<div id="pros-removeappended-schoolhead' + numappended +
            '">' +
            '<br><br><div class="row">' +
            '<span style="color:red;cursor:pointer;font-size:13px;"><i class="fa fa-times mr-5" id="pros-removeappended-schoolheadbtn" data-id="' +
            numappended + '" style="float: right;">Remove</i></span>' +
            '<div class="col-sm-6">' +
            '<div class="pros-flexi-label-wrapper" style="margin-right:6rem;"><label for="schoolName">First name<span style="color:red;">*</span></label></div>' +
            '<div class="pros-flexi-input-affix-wrapper-campus headfnamecover' + numappended + '">' +
            '<input type="text" class="pros-flexi-input generalheadfirstname" data-id="' + numappended +
            '" id="scheadinsertid' + numappended + '" placeholder="First name" style="width:93%;">' +
            '</div>&nbsp;&nbsp;' +
            '</div>' +
            '<div class="col-sm-6">' +
            '<div class="pros-flexi-label-wrapper" style="margin-right:6rem;"><label for="schoolName">Last Name<span style="color:red;">*</span></label></div>' +
            '<div class="pros-flexi-input-affix-wrapper-campus headlnamecover' + numappended + '">' +
            '<input type="text" class="pros-flexi-input generalhealtname"  data-id="' + numappended +
            '" id="head-lname' + numappended + '" placeholder="Last name" style="width:93%;">' +
            '</div>&nbsp;&nbsp;' +
            '</div>' +
            '<div class="col-sm-12">' +
            '<div class="pros-flexi-label-wrapper" style="margin-right:22rem;"><label for="schoolName">Email<span style="color:red;">*</span></label></div>' +
            '<div class="pros-flexi-input-affix-wrapper-campus heademailcover' + numappended + '">' +
            '<input type="text" class="pros-flexi-input generalheademail" data-id="' + numappended +
            '" id="head-email' + numappended + '" placeholder="eg.example@exaple.com" style="width:93%;">' +
            '</div>&nbsp;&nbsp;' +
            '</div>' +
            '<div class="col-sm-12">' +
            '<div class="pros-flexi-label-wrapper" style="margin-right:22rem;"><label for="schoolName">Phone<span style="color:red;">*</span></label></div>' +
            '<div class="pros-flexi-input-affix-wrapper-campus headnumcover' + numappended + '">' +
            '<input type="number" name="pros-headnumset' + numappended + '[main]" data-id="' + numappended +
            '" class="pros-flexi-input generalheadnum" id="pros-headnumset' + numappended +
            '" placeholder="e.g., XXXX-XXX-XXXX" style="width:91%;margin-left:4%;">' +
            '</div>&nbsp;&nbsp;' +
            '</div>' +
            '</div>' +
            '</div>';

        $(document.createElement('div')).append(pros_display_schoolhead_appended_input).appendTo(
            '#displayschool-headinput');

        var dynamicvar_head = 'pros-headnumset' + numappended;

        window[dynamicvar_head] = window.intlTelInput(document.querySelector("#pros-headnumset" + numappended), {
            separateDialCode: true,
            preferredCountries: ["ng"],
            hiddenInput: "full",
            utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
        });

        $("#appendinput-schoolhead").val(numappended);

    });
    //append school head end here




      // Add phone number formatting on input
        $('body').on('input','.generalheadnum', function() {
            const phone = $(this).val();
            const formattedPhone = formatPhoneNumber(phone);
            if (formattedPhone !== phone) {
                $(this).val(formattedPhone);
            }
        });

        $('body').on('input','.campusphone, .campusnumberedit, #staffnumber', function() {
            const phone = $(this).val();
            const formattedPhone = formatPhoneNumber(phone);
            if (formattedPhone !== phone) {
                $(this).val(formattedPhone);
            }
        });


        

        $('body').on('input','.generalteachernum', function() {
            const phone = $(this).val();
            const formattedPhone = formatPhoneNumber(phone);
            if (formattedPhone !== phone) {
                $(this).val(formattedPhone);
            }
        });

        $('body').on('input','.generaladminnum', function() {
            const phone = $(this).val();
            const formattedPhone = formatPhoneNumber(phone);
            if (formattedPhone !== phone) {
                $(this).val(formattedPhone);
            }
        });


        // Function to format phone number
        function formatPhoneNumber(phone) {
           
            // Check if phone is null or undefined
            if (!phone) return '';
            
            // Convert to string if it's a number
            phone = phone.toString();
            
            // Remove all non-digit characters
            let cleaned = phone.replace(/\D/g, '');
            
            // If number is 11 digits and starts with 0, remove the first digit
            if (cleaned.length === 11 && cleaned.startsWith('0')) {
                cleaned = cleaned.substring(1);
            }

            if (cleaned.length > 10 ) {
                cleaned = cleaned.substring(0, cleaned.length - 1);
            }
            
            // If number is 13 digits and starts with 234, remove the country code
            if (cleaned.length === 13 && cleaned.startsWith('234')) {
                cleaned = cleaned.substring(3);
            }
             
            return cleaned;
        }


    //append teacher start here
    $('body').on('click', '#pros-addteacher-btn', function() {

        var numappended = $("#appendinput-teacher").val();
        numappended++;
        var numofcampus = numappended + 1;
        var pros_display_schoolhead_appended_input = '<div id="pros-removeappended-teacher' + numappended + '">' +
            '<br><br><div class="row">' +
            '<span style="color:red;cursor:pointer;font-size:13px;"><i class="fa fa-times mr-5" id="pros-removeappended-teacherbtn" data-id="' +
            numappended + '" style="float: right;">Remove</i></span>' +
            '<div class="col-sm-6">' +
            '<div class="pros-flexi-label-wrapper" style="margin-right:6rem;"><label for="schoolName">First name<span style="color:red;">*</span></label></div>' +
            '<div class="pros-flexi-input-affix-wrapper-campus teacherfnamecover' + numappended + '">' +
            '<input type="text" class="pros-flexi-input generalteacherfirstname" data-id="' + numappended +
            '" id="teacherinsertid' + numappended + '" placeholder="First name" style="width:70%;">' +
            '</div>&nbsp;&nbsp;' +
            '</div>' +
            '<div class="col-sm-6">' +
            '<div class="pros-flexi-label-wrapper" style="margin-right:6rem;"><label for="schoolName">Last Name<span style="color:red;">*</span></label></div>' +
            '<div class="pros-flexi-input-affix-wrapper-campus teacherlnamecover' + numappended + '">' +
            '<input type="text" class="pros-flexi-input generalteacherltname"  data-id="' + numappended +
            '" id="teacher-lname' + numappended + '" placeholder="Last name" style="width:70%;">' +
            '</div>&nbsp;&nbsp;' +
            '</div>' +
            '<div class="col-sm-12">' +
            '<div class="pros-flexi-label-wrapper" style="margin-right:22rem;"><label for="schoolName">Email<span style="color:red;">*</span></label></div>' +
            '<div class="pros-flexi-input-affix-wrapper-campus teacheremailcover' + numappended + '">' +
            '<input type="text" class="pros-flexi-input generalteacheremail" data-id="' + numappended +
            '" id="head-email' + numappended + '" placeholder="eg.example@exaple.com" style="width:70%;">' +
            '</div>&nbsp;&nbsp;' +
            '</div>' +
            '<div class="col-sm-12">' +
            '<div class="pros-flexi-label-wrapper" style="margin-right:22rem;"><label for="schoolName">Phone<span style="color:red;">*</span></label></div>' +
            '<div class="pros-flexi-input-affix-wrapper-campus teachernumcover' + numappended + '">' +
            '<input type="number" name="pros-teachernumset' + numappended + '[main]" data-id="' + numappended +
            '" class="pros-flexi-input generalteachernum" id="pros-teachernumset' + numappended +
            '" placeholder="e.g., XXXX-XXX-XXXX" style="width:91%;margin-left:4%;">' +
            '</div>&nbsp;&nbsp;' +
            '</div>' +
            '</div>' +
            '</div>';

        $(document.createElement('div')).append(pros_display_schoolhead_appended_input).appendTo(
            '#displayschool-teacher');

        var dynamicvar_head = 'pros-teachernumset' + numappended;

        window[dynamicvar_head] = window.intlTelInput(document.querySelector("#pros-teachernumset" + numappended), {
            separateDialCode: true,
            preferredCountries: ["ng"],
            hiddenInput: "full",
            utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
        });

        $("#appendinput-teacher").val(numappended);

    });
    //append teacher end here





    //append teacher start here
    $('body').on('click', '#pros-add-admin-btn', function() {

        var numappended = $("#appendinput-admin").val();
        numappended++;
        var numofcampus = numappended + 1;

        var pros_display_schoolhead_appended_input = '<div id="pros-removeappended-admin' + numappended + '">' +
            '<br><br><div class="row">' +
            '<span style="color:red;cursor:pointer;font-size:13px;"><i class="fa fa-times mr-5" id="pros-removeappended-adminbtn" data-id="' +
            numappended + '" style="float: right;">Remove</i></span>' +
            '<div class="col-sm-6">' +
            '<div class="pros-flexi-label-wrapper" style="margin-right:6rem;"><label for="schoolName">First name<span style="color:red;">*</span></label></div>' +
            '<div class="pros-flexi-input-affix-wrapper-campus adminfnamecover' + numappended + '">' +
            '<input type="text" class="pros-flexi-input generaladminfirstname" data-id="' + numappended +
            '" id="admininsertid' + numappended + '" placeholder="First name" style="width:70%;">' +
            '</div>&nbsp;&nbsp;' +
            '</div>' +
            '<div class="col-sm-6">' +
            '<div class="pros-flexi-label-wrapper" style="margin-right:6rem;"><label for="schoolName">Last Name<span style="color:red;">*</span></label></div>' +
            '<div class="pros-flexi-input-affix-wrapper-campus adminlnamecover' + numappended + '">' +
            '<input type="text" class="pros-flexi-input generaladminltname"  data-id="' + numappended +
            '" id="admin-lname' + numappended + '" placeholder="Last name" style="width:70%;">' +
            '</div>&nbsp;&nbsp;' +
            '</div>' +
            '<div class="col-sm-12">' +
            '<div class="pros-flexi-label-wrapper" style="margin-right:22rem;"><label for="schoolName">Email<span style="color:red;">*</span></label></div>' +
            '<div class="pros-flexi-input-affix-wrapper-campus adminemailcover' + numappended + '">' +
            '<input type="text" class="pros-flexi-input generaladminemail" data-id="' + numappended +
            '" id="head-email' + numappended + '" placeholder="eg.example@exaple.com" style="width:70%;">' +
            '</div>&nbsp;&nbsp;' +
            '</div>' +
            '<div class="col-sm-12">' +
            '<div class="pros-flexi-label-wrapper" style="margin-right:22rem;"><label for="schoolName">Phone<span style="color:red;">*</span></label></div>' +
            '<div class="pros-flexi-input-affix-wrapper-campus adminnumcover' + numappended + '">' +
            '<input type="number" name="pros-adminnumset' + numappended + '[main]" data-id="' + numappended +
            '" class="pros-flexi-input generaladminnum" id="pros-adminnumset' + numappended +
            '" placeholder="e.g., XXXX-XXX-XXXX" style="width:91%;margin-left:4%;">' +
            '</div>&nbsp;&nbsp;' +
            '</div>' +
            '</div>' +
            '</div>';

        $(document.createElement('div')).append(pros_display_schoolhead_appended_input).appendTo(
            '#displayschool-admin');

        var dynamicvar_admin = 'pros-adminnumset' + numappended;

        window[dynamicvar_admin] = window.intlTelInput(document.querySelector("#pros-adminnumset" + numappended), {
            separateDialCode: true,
            preferredCountries: ["ng"],
            hiddenInput: "full",
            utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
        });

        $("#appendinput-admin").val(numappended);

    });
    //append admin end here




    //remove appended input here
    $('body').on('click', '#pros-removeappended-schoolheadbtn', function(e) {
        e.preventDefault();
        var dividd = $(this).data('id');

        var camcnt = 1;
        $('#pros-removeappended-schoolhead' + dividd).remove();
        var numappended = $("#appendinput-schoolhead").val();

        // $('#' + camcnt).html(numappended);
        numappended--;
        $("#appendinput-schoolhead").val(numappended);
    });
    //remove appended input 

    //remove appended input 4 teacher here
    $('body').on('click', '#pros-removeappended-teacherbtn', function(e) {
        e.preventDefault();
        var dividd = $(this).data('id');

        var camcnt = 1;
        $('#pros-removeappended-teacher' + dividd).remove();
        var numappended = $("#appendinput-teacher").val();

        // $('#' + camcnt).html(numappended);
        numappended--;
        $("#appendinput-teacher").val(numappended);
    });
    //remove appended  input  4 teacher end here

    //remove appended input 4 admin here
    $('body').on('click', '#pros-removeappended-adminbtn', function(e) {
        e.preventDefault();
        var dividd = $(this).data('id');

        var camcnt = 1;
        $('#pros-removeappended-admin' + dividd).remove();
        var numappended = $("#appendinput-teacher").val();

        // $('#' + camcnt).html(numappended);
        numappended--;
        $("#appendinput-admin").val(numappended);
    });
    //remove appended  input  4 admin end here



    //add school head setup
    $('body').on('click', '#pros-create-schoolheadbtn', function(e) {
        $('#pros-create-schoolheadbtn').html('<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>creating...' );
        
    

        var tagstate = $(this).data('tag');
        var groupSchoolID = $(this).data('school');
        var validatestatus = $('#checkfirstvilation').val();
        var UserID = "<?php echo $UserID; ?>";
        var CampusID = $(this).data('campus');
        var maintag = $(this).data('maintag');
        var ownerfirst_Name = "<?php echo $PrimaryName; ?>";



        var schoolheadname = [];

        $('.generalheadfirstname').each(function() {
            schoolheadname.push($(this).val());

            var dataid = $(this).data('id');
            var firstnamevaliate = $('#scheadinsertid' + dataid).val();

            if (firstnamevaliate == '' || firstnamevaliate == ',') {
                $('.headfnamecover' + dataid).css('outline', '1px solid red');
                $('#checkfirstvilation').val('invalid');
            

            
            } else {
                $('.headfnamecover' + dataid).css('outline', '1px solid green');
                $('#checkfirstvilation').val('valid');
                
            }

        });


        var schoooheadlastname = [];

        $('.generalhealtname').each(function() {
            schoooheadlastname.push($(this).val());


            var dataid = $(this).data('id');
            var lastnamevaliate = $('#head-lname' + dataid).val();

            if (lastnamevaliate == '' || lastnamevaliate == ',') {
                $('.headlnamecover' + dataid).css('outline', '1px solid red');
                $('#checkfirstvilation').val('invalid');
                

            
            } else {
                $('.headlnamecover' + dataid).css('outline', '1px solid green');
                $('#checkfirstvilation').val('valid');
                
            }

        });



        var schoolphoneemail = [];
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        $('.generalheademail').each(function() {
            schoolphoneemail.push($(this).val());
            var dataid = $(this).data('id');

            var lastnameemail = $('#head-email' + dataid).val();

            if (lastnameemail == '' || lastnameemail == ',') {
                $('.heademailcover' + dataid).css('outline', '1px solid red');
                $('#checkfirstvilation').val('invalid');
                

                // $.wnoty({
                //     type: 'warning',
                //     message: "hey! email should not be blank",
                //     autohideDelay: 5000
                // });
            } else {



                if (!emailPattern.test(lastnameemail)) {
                    $.wnoty({
                        type: 'warning',
                        message: "hey! enter a valid email.",
                        autohideDelay: 5000
                    });

                    $('.heademailcover' + dataid).css('outline', '1px solid red');
                    $('#checkfirstvilation').val('invalid');
                
                } else {
                    $('.heademailcover' + dataid).css('outline', '1px solid green');
                    $('#checkfirstvilation').val('valid');
                    
                }

            }




        });


        var schoolnum = [];

        $('.generalheadnum').each(function() {
            schoolnum.push($(this).val());
            var dataid = $(this).data('id');

            var numhead = $('#pros-headnumset' + dataid).val();

            if (numhead == '' || numhead == ',') {
                $('.headnumcover' + dataid).css('outline', '1px solid red');
                $('#checkfirstvilation').val('invalid');
            

            
            } else {
                $('.headnumcover' + dataid).css('outline', '1px solid green');
                $('#checkfirstvilation').val('valid');
                
            }

        });







        var formattedinput = [];
        document.querySelectorAll('.generalheadnum').forEach(function(input) {
            // Get the `intlTelInput` plugin instance for the input field
            var iti = window.intlTelInputGlobals.getInstance(input);
            // Get the raw phone number value from the input field
            var numberformat = input.value;
            // Use the `intlTelInputUtils` library to format the phone number with its country code
            formattedinput.push(intlTelInputUtils.formatNumber(numberformat, iti.getSelectedCountryData()
                .iso2));
            // Display the formatted phone number in an alert message
        });









        //trim no value is left empty
        var hasEmptyValuefname = schoolheadname.some(function(value) {
            return value.trim() === '';
        });

        var hasEmptyValuelname = schoooheadlastname.some(function(value) {
            return value.trim() === '';
        });

        var hasEmptyValueemail = schoolphoneemail.some(function(value) {
            return value.trim() === '';
        });

        var hasEmptyValuephone = formattedinput.some(function(value) {
            return value.trim() === '';
        });
        //trim no value is left empty





        if (hasEmptyValuefname || hasEmptyValuelname || hasEmptyValueemail || hasEmptyValuephone) {


            if (maintag == '29') {

                schoolheadname = schoolheadname.toString();
                schoooheadlastname = schoooheadlastname.toString();
                schoolphoneemail = schoolphoneemail.toString();
                formattedinput = formattedinput.toString();

                $.ajax({

                    type: "POST",
                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/createschool-setup.php",
                    data: {

                        tagstate: tagstate,
                        groupSchoolID: groupSchoolID,
                        schoolheadname: schoolheadname,
                        schoooheadlastname: schoooheadlastname,
                        schoolphoneemail: schoolphoneemail,
                        formattedinput: formattedinput,
                        UserID: UserID,
                        CampusID: CampusID,
                        maintag: maintag
                    },


                    success: function(output) {


                        var outputfoun = (output);

                        if (outputfoun == 'found') {
                            $.wnoty({
                                type: 'warning',
                                message: "hey! this email already exist",
                                autohideDelay: 5000
                            });


                        } else {


                            $('#pros-displayhead-setup').animate({
                                // opacity: 0.5,
                                left: '+=50',
                                height: 'toggle'
                            }, 1000);

                            $('#assignschoolheadfaculty').fadeIn('slow');

                        }
                    
                                        // load setupcontent here //

                                        $('#pros-displaysetup-content').html(
                                            '<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
                                        $.ajax({
                                
                                            type: "POST",
                                            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/loadsetup-modal.php",
                                            data: {
                                                UserID: UserID,
                                                ownerfirst_Name: ownerfirst_Name,
                                                tagstate: tagstate,
                                                groupSchoolID: groupSchoolID,
                                                CampusID: CampusID
                                            },
                                            success: function(result) {
                                
                                                $('#pros-displaysetup-content').html(result);
                                                $('#pros-create-schoolheadbtn').html('Create new');
                                                                
                                                                
                                                                            
                                                    var head_phones = [];
                                                        document.querySelectorAll('.pros-headnumset').forEach(function (input) {
                                                            head_phones.push(window.intlTelInput(input, {
                                                                separateDialCode: true,
                                                                preferredCountries: ["ng"],
                                                                hiddenInput: "full",
                                                                utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                                            }));
                                                        });

                                                    // var head_phone = window.intlTelInput(document.querySelector(".pros-headnumset"), {
                                                    //     separateDialCode: true,
                                                    //     preferredCountries: ["ng"],
                                                    //     hiddenInput: "full",
                                                    //     utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                                    // });

                                                    var head_phone = [];
                                                        document.querySelectorAll('.pros-teachernumset').forEach(function (input) {
                                                            head_phone.push(window.intlTelInput(input, {
                                                                separateDialCode: true,
                                                                preferredCountries: ["ng"],
                                                                hiddenInput: "full",
                                                                utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                                            }));
                                                        });

                                                // var head_phone = window.intlTelInput(document.querySelector("#pros-adminnumset"), {
                                                //     separateDialCode: true,
                                                //     preferredCountries: ["ng"],
                                                //     hiddenInput: "full",
                                                //     utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                                // });
                                
                                
                                                var tagstatusnew = tagstate;
                                
                                                $('#prosloadschoolid-forbackward').val(CampusID);
                                
                                
                                                if (maintag == '29' && tagstatusnew == '') {
                                
                                                    $('#pros-reducemodalclasstypesetup').css('width', '700px');
                                                    //if campus havent't started setiing up it should start from the begginning
                                                    $('#pros-loadimportoption').fadeIn('slow');
                                
                                                } else {
                                
                                
                                
                                                    if (tagstatusnew == '' || tagstatusnew == '15') {
                                                        $('#displaysection-content').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');

                                                    } else if (tagstatusnew == '16') {

                                                        $('#pros-displayhead-setup').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(15);



                                                    } else if (tagstatusnew == '17') {

                                                        $('#assignschoolheadfaculty  ').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(16);

                                                    } else if (tagstatusnew == '18') {
                                                        $('#proscreateschool-teacher').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(17);

                                                    } else if (tagstatusnew == '19') {
                                                        $('#createotherschooltype-setup').fadeIn('slow');

                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(18);

                                                    } else if (tagstatusnew == '20') {

                                                        $('#pros-reducemodalclasstypesetup').css('width', '700px');

                                                        $('#createwelcomemsg-setup').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(19);


                                                    } else if (tagstatusnew == '21') {

                                                        $('#createclasses-setup ').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(20);

                                                        // $('#pros-reducemodalclasstypesetup').addClass('modal-xl');

                                                    } else if (tagstatusnew == '22') {

                                                        $('#createsubject-setup').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(21);

                                                    } else if (tagstatusnew == '23') {

                                                        $('#mergesubjectcontent').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(22);


                                                    } else if (tagstatusnew == '24') {

                                                        $('#pros-assign-formteachercontent').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(23);

                                                    } else if (tagstatusnew == '25') {

                                                        $('#assignsubject-teachercontainer').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(24);

                                                    } else if (tagstatusnew == '26') {

                                                        $('#pros-loadsession-termcontent').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(25);

                                                    } else if (tagstatusnew == '27') {

                                                        $('#pros-schlogo-content').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(26);

                                                    }else if(tagstatusnew == '28')
                                                    {
                                                        $('#prosschool-bgimage-content').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(27);


                                                    }else if(tagstatusnew == '29')
                                                    {

                                                                    //setup completed
                                                    
                                                    }
                                                            
                                                }
                                
                                
                                
                                
                                                const selectBtnnewsubject = document.querySelector(
                                                        ".getsubjectopenondocument-ready1"),
                                                    itemssubject = document.querySelectorAll(".subjectlistmeslist");
                                                selectBtnnewsubject.classList.toggle("open");
                                
                                
                                
                                
                                
                                               
                                
                                
                                            }
                                        });
                                
                                        // load setupcontent here //   
                                                    
                        
                        
                        
                        

                    }

                });




            }else
            {
                    $.wnoty({
                        type: 'warning',
                        message: "Hey! Please make sure that the school head's details are not left blank.",
                        autohideDelay: 5000
                    });

                    $('#pros-create-schoolheadbtn').html('Create new');
            }



        } else {

            schoolheadname = schoolheadname.toString();
            schoooheadlastname = schoooheadlastname.toString();
            schoolphoneemail = schoolphoneemail.toString();
            formattedinput = formattedinput.toString();
            

            $.ajax({
                type: "POST",
                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/createschool-setup.php",
                data: {
                    tagstate: tagstate,
                    groupSchoolID: groupSchoolID,
                    schoolheadname: schoolheadname,
                    schoooheadlastname: schoooheadlastname,
                    schoolphoneemail: schoolphoneemail,
                    formattedinput: formattedinput,
                    UserID: UserID,
                    CampusID: CampusID,
                    maintag: maintag
                },


                success: function(output) {

                    var prosfeedback = (output);

                    
                    // alert(prosfeedback);


                    if (output.trim() == 'found') {


                            $.wnoty({
                                type: 'warning',
                                message: "hey! this email already exist.",
                                autohideDelay: 5000
                            });

                           $('#pros-create-schoolheadbtn').html('Register Now');


                          

                             // set time out
                                $('#pros-displayhead-setup').animate({
                                    // opacity: 0.5,
                                    left: '+=50',
                                    height: 'toggle'
                                }, 1000);
                                $('#assignschoolheadfaculty').fadeIn('slow');
                                prosload_set_upcontent(CampusID,groupSchoolID,UserID,ownerfirst_Name,tagstate);
                           



                    } else {


                        $.wnoty({
                            type: 'success',
                            message: "Great! school head created successfully.",
                            autohideDelay: 5000
                        });
                        $('#pros-create-schoolheadbtn').html('Register Now');
                          
                       

                        $('#pros-displayhead-setup').animate({
                            // opacity: 0.5,
                            left: '+=50',
                            height: 'toggle'
                        }, 1000);
                        $('#assignschoolheadfaculty').fadeIn('slow');
                        prosload_set_upcontent(CampusID,groupSchoolID,UserID,ownerfirst_Name,tagstate);
                        
                    }

                }

            });



        
        }

    })
    //add school head setup end



    $('body').on('click', '.pros-generalsechead', function() {
        var facultyid = $(this).data('id');
    

        const selectBtn = document.querySelector(".prosopendrophead" + facultyid),
            items = document.querySelectorAll(".item");

        // Toggle the "open" class when the selectBtn is clicked
        selectBtn.classList.toggle("open");
    });
    // This is a comment describing what the code does


    $('body').on('click', '.pros-generalformteach', function() {
        var facultyid = $(this).data('id');
        

        const selectBtn = document.querySelector(".pros-assignformteacherbtncollapse" + facultyid),
            items = document.querySelectorAll(".item");

        // Toggle the "open" class when the selectBtn is clicked
        selectBtn.classList.toggle("open");
    });
    // This is a comment describing what the code does


    // School head check in Prosper
    $('body').on('click', '.prosgenerallist-itemssel', function(event) {
            var facultyID = $(this).data('id');
            var facunewcheck = $(this).data('faculty');

           
            // Only trigger radio if user clicks outside the radio directly
            if (event.target.type !== 'radio') {
                // alert(facunewcheck);
                $('.proscheckboxinside' + facultyID).prop("checked", true).trigger("change");
            }

            // Count selected radios in this faculty
            let checked = $('.checkshoolheadnew' + facunewcheck + ':checked').length;

            let btnText = document.querySelector(".pros-headdisplaynumslected" + facunewcheck);

            if (btnText) {
                btnText.innerText = (checked > 0) ? `(${checked} Selected)` : '';
            }
});




        $('body').on('change', '.pros-generalcheckschoolhead', function() {
            // Find the closest ancestor div with the class '.pros-generalcheckschoolhead'
            var container = $(this).closest('.pros-generalcheckschoolhead');

            // Extract data attributes from the closest ancestor div
            var facultyID = container.data('faculty');
            var staffID = container.data('staff');

            // Toggle the checked state of the corresponding checkbox
            var verychecked = $('.proscheckboxinside' + facultyID + staffID, container).prop("checked");
            $('.proscheckboxinside' + facultyID + staffID, container).prop("checked", !verychecked);

            // Count the number of checked radio buttons
            let checked = parseInt($('.checkshoolheadnew' + facultyID + ':checked').length);

            // Update the display based on the count
            btnText = container.find(".pros-headdisplaynumslected" + facultyID);

            if (checked > 0) {
                btnText.text(`(${checked} Selected)`);
            } else {
                btnText.text("");
            }
        });
        //school head check here prosper input itself



        // create teacher onboarding start here
        $('body').on('click', '#createteacher-setup-btn', function(e) {
            $('#createteacher-setup-btn').html('<span class="spinner-border spinner-border-sm" aria-hidden="true"></span><span class="visually-hidden" role="status">Loading...</span>');

            var tagstate = $(this).data('tag');
            var groupSchoolID = $(this).data('school');
            var validatestatus = $('#checkvalidatedteacher').val();
            var UserID = "<?php echo $UserID; ?>";
            var usertype = '';
            var CampusID = $(this).data('campus');
            var maintag = $(this).data('maintag');
            var ownerfirst_Name = "<?php echo $PrimaryName; ?>";


            var schoolheadname = [];

            $('.generalteacherfirstname').each(function() {
                schoolheadname.push($(this).val());

                var dataid = $(this).data('id');
                var firstnamevaliate = $('#teacherinsertid' + dataid).val();

                if (firstnamevaliate == '' || firstnamevaliate == ',') {
                    $('.teacherfnamecover' + dataid).css('outline', '1px solid red');
                    $('#checkvalidatedteacher').val('invalid');
                

                    // $.wnoty({
                    //     type: 'warning',
                    //     message: "hey! enter your staff's first name.",
                    //     autohideDelay: 5000
                    // });
                } else {
                    $('.teacherfnamecover' + dataid).css('outline', '1px solid green');
                    $('#checkvalidatedteacher').val('valid');
                
                }

            });



            var schoooheadlastname = [];

            $('.generalteacherltname').each(function() {
                schoooheadlastname.push($(this).val());


                var dataid = $(this).data('id');
                var lastnamevaliate = $('#teacher-lname' + dataid).val();

                if (lastnamevaliate == '' || lastnamevaliate == ',') {
                    $('.teacherlnamecover' + dataid).css('outline', '1px solid red');
                    $('#checkvalidatedteacher').val('invalid');
                    

                    // $.wnoty({
                    //     type: 'warning',
                    //     message: "hey! enter your staff's last name.",
                    //     autohideDelay: 5000
                    // });
                } else {
                    $('.teacherlnamecover' + dataid).css('outline', '1px solid green');
                    $('#checkvalidatedteacher').val('valid');
                    
                }

            });

            var schoolphoneemail = [];
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            $('.generalteacheremail').each(function() {
                schoolphoneemail.push($(this).val());
                var dataid = $(this).data('id');

                var lastnameemail = $('#teacher-email' + dataid).val();


                if (lastnameemail == '' || lastnameemail == ',') {
                    $('.teacheremailcover' + dataid).css('outline', '1px solid red');
                    $('#checkvalidatedteacher').val('invalid');
                    

                    // $.wnoty({
                    //     type: 'warning',
                    //     message: "hey! email should not be blank",
                    //     autohideDelay: 5000
                    // });
                } else {



                    if (!emailPattern.test(lastnameemail)) {
                        $.wnoty({
                            type: 'warning',
                            message: "hey! enter a valid email.",
                            autohideDelay: 5000
                        });

                        $('.teacheremailcover' + dataid).css('outline', '1px solid red');
                        $('#checkvalidatedteacher').val('invalid');
                        
                    } else {
                        $('.teacheremailcover' + dataid).css('outline', '1px solid green');
                        $('#checkvalidatedteacher').val('valid');
                    
                    }

                }


            });




            var schoolnum = [];

            $('.generalteachernum').each(function() {
                schoolnum.push($(this).val());
                var dataid = $(this).data('id');

                var numhead = $('#pros-teachernumset' + dataid).val();

                if (numhead == '' || numhead == ',') {
                    $('.teachernumcover' + dataid).css('outline', '1px solid red');
                    $('#checkvalidatedteacher').val('invalid');
                    
                        
                } else {
                    $('.teachernumcover' + dataid).css('outline', '1px solid green');
                    $('#checkvalidatedteacher').val('valid');
                    
                }

            });



            var formattedinput = [];
            document.querySelectorAll('.generalteachernum').forEach(function(input) {
                // Get the `intlTelInput` plugin instance for the input field
                var iti = window.intlTelInputGlobals.getInstance(input);
                // Get the raw phone number value from the input field
                var numberformat = input.value;
                // Use the `intlTelInputUtils` library to format the phone number with its country code
                formattedinput.push(intlTelInputUtils.formatNumber(numberformat, iti.getSelectedCountryData()
                    .iso2));
                // Display the formatted phone number in an alert message
            });


            //trim no value is left empty
            var hasEmptyValuefname = schoolheadname.some(function(value) {
                return value.trim() === '';
            });

            var hasEmptyValuelname = schoooheadlastname.some(function(value) {
                return value.trim() === '';
            });

            var hasEmptyValueemail = schoolphoneemail.some(function(value) {

                return value.trim() === '';
            });

            var hasEmptyValuephone = formattedinput.some(function(value) {
                return value.trim() === '';
            });
            //trim no value is left empty


            schoolheadname = schoolheadname.toString();
            schoooheadlastname = schoooheadlastname.toString();
            schoolphoneemail = schoolphoneemail.toString();
            formattedinput = formattedinput.toString();




            if (hasEmptyValuefname || hasEmptyValuelname || hasEmptyValueemail || hasEmptyValuephone) {

                if (maintag == '29') {

                    $.ajax({
                        type: "POST",
                        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/createteacher-setup.php",
                        data: {

                            tagstate: tagstate,
                            groupSchoolID: groupSchoolID,
                            schoolheadname: schoolheadname,
                            schoooheadlastname: schoooheadlastname,
                            schoolphoneemail: schoolphoneemail,
                            formattedinput: formattedinput,
                            UserID: UserID,
                            schoolheadname: schoolheadname,
                            usertype: usertype,
                            CampusID: CampusID,
                            maintag: maintag


                        },


                        success: function(result) {
                            $('#createteacher-setup-btn').html('Create new');

                            if (result == 'allexist') {

                                $.wnoty({
                                    type: 'warning',
                                    message: "Hey!! this email already exist",
                                    autohideDelay: 5000
                                });


                            } else {


                                $('#proscreateschool-teacher').animate({
                                    // opacity: 0.5,
                                    left: '+=50',
                                    height: 'toggle'
                                }, 1000);
                                
                                $('#createotherschooltype-setup').fadeIn('slow');





                                // loadsetup content on create teacher 

                                $('#pros-displaysetup-content').html(
                                    '<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>'
                                    );

                                $.ajax({

                                    type: "POST",
                                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/loadsetup-modal.php",
                                    data: {
                                        UserID: UserID,
                                        ownerfirst_Name: ownerfirst_Name,
                                        tagstate: tagstate,
                                        groupSchoolID: groupSchoolID,
                                        CampusID: CampusID
                                    },
                                    success: function(result) {

                                        $('#pros-displaysetup-content').html(result);


                                        
                               var head_phones = [];
                                    document.querySelectorAll('.pros-headnumset').forEach(function (input) {
                                        head_phones.push(window.intlTelInput(input, {
                                            separateDialCode: true,
                                            preferredCountries: ["ng"],
                                            hiddenInput: "full",
                                            utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                        }));
                                    });

                            

                                  var head_phone = [];
                                    document.querySelectorAll('.pros-teachernumset').forEach(function (input) {
                                        head_phone.push(window.intlTelInput(input, {
                                            separateDialCode: true,
                                            preferredCountries: ["ng"],
                                            hiddenInput: "full",
                                            utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                        }));
                                    }); 
                                        // var head_phone = window.intlTelInput(document
                                        //     .querySelector("#pros-adminnumset"), {
                                        //         separateDialCode: true,
                                        //         preferredCountries: ["ng"],
                                        //         hiddenInput: "full",
                                        //         utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                        //     });


                                        var tagstatusnew = tagstate;


                                        $('#prosloadschoolid-forbackward').val(CampusID);


                                        if (maintag == '29' && tagstatusnew == '') {

                                            $('#pros-reducemodalclasstypesetup').css('width',
                                                '700px');
                                            //if campus havent't started setiing up it should start from the begginning
                                            $('#pros-loadimportoption').fadeIn('slow');

                                        } else {



                                            if (tagstatusnew == '' || tagstatusnew == '15') {
                                                        $('#displaysection-content').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');

                                                    } else if (tagstatusnew == '16') {

                                                        $('#pros-displayhead-setup').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(15);



                                                    } else if (tagstatusnew == '17') {

                                                        $('#assignschoolheadfaculty  ').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(16);

                                                    } else if (tagstatusnew == '18') {
                                                        $('#proscreateschool-teacher').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(17);

                                                    } else if (tagstatusnew == '19') {
                                                        $('#createotherschooltype-setup').fadeIn('slow');

                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(18);

                                                    } else if (tagstatusnew == '20') {

                                                        $('#pros-reducemodalclasstypesetup').css('width', '700px');

                                                        $('#createwelcomemsg-setup').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(19);


                                                    } else if (tagstatusnew == '21') {

                                                        $('#createclasses-setup ').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(20);

                                                        // $('#pros-reducemodalclasstypesetup').addClass('modal-xl');

                                                    } else if (tagstatusnew == '22') {

                                                        $('#createsubject-setup').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(21);

                                                    } else if (tagstatusnew == '23') {

                                                        $('#mergesubjectcontent').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(22);


                                                    } else if (tagstatusnew == '24') {

                                                        $('#pros-assign-formteachercontent').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(23);

                                                    } else if (tagstatusnew == '25') {

                                                        $('#assignsubject-teachercontainer').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(24);

                                                    } else if (tagstatusnew == '26') {

                                                        $('#pros-loadsession-termcontent').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(25);

                                                    } else if (tagstatusnew == '27') {

                                                        $('#pros-schlogo-content').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(26);

                                                    }else if(tagstatusnew == '28')
                                                    {
                                                        $('#prosschool-bgimage-content').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(27);


                                                    }else if(tagstatusnew == '29')
                                                    {

                                                                    //setup completed
                                                    
                                                    }

                                        }







                                        const selectBtnnewsubject = document.querySelector(
                                                ".getsubjectopenondocument-ready1"),
                                            itemssubject = document.querySelectorAll(
                                                ".subjectlistmeslist");
                                        selectBtnnewsubject.classList.toggle("open");



                                       

                                    }
                                });


                                // loadsetup content on create teacher 







                            }

                        }

                    });


                } else {



                        $.wnoty({
                                type: 'warning',
                                message: "Hey! Please make sure teachers' basic details are not left blank.",
                                autohideDelay: 5000
                        });

                        $('#createteacher-setup-btn').html('Create new');

                }



            } else {


                $.ajax({
                    type: "POST",
                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/createteacher-setup.php",
                    data: {

                        tagstate: tagstate,
                        groupSchoolID: groupSchoolID,
                        schoolheadname: schoolheadname,
                        schoooheadlastname: schoooheadlastname,
                        schoolphoneemail: schoolphoneemail,
                        formattedinput: formattedinput,
                        UserID: UserID,
                        schoolheadname: schoolheadname,
                        usertype: usertype,
                        CampusID: CampusID,
                        maintag: maintag

                    },



                    success: function(result) {
                        $('#createteacher-setup-btn').html('Create new');

                        if (result.trim() == 'allexist') {

                            $.wnoty({
                                type: 'warning',
                                message: "Hey!! this email already exist",
                                autohideDelay: 5000
                            });


                        } else {


                            $.wnoty({
                                type: 'success',
                                message: "hey! teacher created successfully.",
                                autohideDelay: 5000
                            });


                            $('#proscreateschool-teacher').animate({
                                // opacity: 0.5,
                                left: '+=50',
                                height: 'toggle'
                            }, 1000);
                            $('#createotherschooltype-setup').fadeIn('slow');


                        }


                        
                            // loadsetup content on create teacher 

                            $('#pros-displaysetup-content').html(
                                '<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>'
                                );

                            $.ajax({

                                type: "POST",
                                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/loadsetup-modal.php",
                                data: {
                                    UserID: UserID,
                                    ownerfirst_Name: ownerfirst_Name,
                                    tagstate: tagstate,
                                    groupSchoolID: groupSchoolID,
                                    CampusID: CampusID
                                },
                                success: function(result) {

                                    $('#pros-displaysetup-content').html(result);


                                    var head_phones = [];
                                    document.querySelectorAll('.pros-headnumset').forEach(function (input) {
                                        head_phones.push(window.intlTelInput(input, {
                                            separateDialCode: true,
                                            preferredCountries: ["ng"],
                                            hiddenInput: "full",
                                            utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                        }));
                                    });

                            

                                  var head_phone = [];
                                    document.querySelectorAll('.pros-teachernumset').forEach(function (input) {
                                        head_phone.push(window.intlTelInput(input, {
                                            separateDialCode: true,
                                            preferredCountries: ["ng"],
                                            hiddenInput: "full",
                                            utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                        }));
                                    });

                                    // var head_phone = window.intlTelInput(document.querySelector(
                                    //     "#pros-adminnumset"), {
                                    //     separateDialCode: true,
                                    //     preferredCountries: ["ng"],
                                    //     hiddenInput: "full",
                                    //     utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                    // });


                                    var tagstatusnew = tagstate;


                                    $('#prosloadschoolid-forbackward').val(CampusID);


                                    if (maintag == '29' && tagstatusnew == '') {

                                        $('#pros-reducemodalclasstypesetup').css('width',
                                            '700px');
                                        //if campus havent't started setiing up it should start from the begginning
                                        $('#pros-loadimportoption').fadeIn('slow');

                                    } else {



                                        if (tagstatusnew == '' || tagstatusnew == '15') {
                                                        $('#displaysection-content').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');

                                                    } else if (tagstatusnew == '16') {

                                                        $('#pros-displayhead-setup').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(15);



                                                    } else if (tagstatusnew == '17') {

                                                        $('#assignschoolheadfaculty  ').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(16);

                                                    } else if (tagstatusnew == '18') {
                                                        $('#proscreateschool-teacher').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(17);

                                                    } else if (tagstatusnew == '19') {
                                                        $('#createotherschooltype-setup').fadeIn('slow');

                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(18);

                                                    } else if (tagstatusnew == '20') {

                                                        $('#pros-reducemodalclasstypesetup').css('width', '700px');

                                                        $('#createwelcomemsg-setup').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(19);


                                                    } else if (tagstatusnew == '21') {

                                                        $('#createclasses-setup ').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(20);

                                                        // $('#pros-reducemodalclasstypesetup').addClass('modal-xl');

                                                    } else if (tagstatusnew == '22') {

                                                        $('#createsubject-setup').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(21);

                                                    } else if (tagstatusnew == '23') {

                                                        $('#mergesubjectcontent').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(22);


                                                    } else if (tagstatusnew == '24') {

                                                        $('#pros-assign-formteachercontent').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(23);

                                                    } else if (tagstatusnew == '25') {

                                                        $('#assignsubject-teachercontainer').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(24);

                                                    } else if (tagstatusnew == '26') {

                                                        $('#pros-loadsession-termcontent').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(25);

                                                    } else if (tagstatusnew == '27') {

                                                        $('#pros-schlogo-content').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(26);

                                                    }else if(tagstatusnew == '28')
                                                    {
                                                        $('#prosschool-bgimage-content').fadeIn('slow');
                                                        $('#movebackbtn-setup').fadeIn('slow');
                                                        $('#pros-displaybackvalue-tag').val(27);


                                                    }else if(tagstatusnew == '29')
                                                    {

                                                                    //setup completed
                                                    
                                                    }

                                    }







                                    const selectBtnnewsubject = document.querySelector(
                                            ".getsubjectopenondocument-ready1"),
                                        itemssubject = document.querySelectorAll(
                                            ".subjectlistmeslist");
                                    selectBtnnewsubject.classList.toggle("open");



                                   

                                }
                            });


                            // loadsetup content on create teacher 







                    }
                });

            }
        });
        // create teacher onboarding end here




//create admin setup start here
$('body').on('click', '#createadmin-setup-btn', function(e) {

    $('#createadmin-setup-btn').html('<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>creating...');


    var tagstate = $(this).data('tag');
    var groupSchoolID = $(this).data('school');
    var validatestatus = $('#checkvalidatedadmin').val();
    var UserID = "<?php echo $UserID; ?>";
    var CampusID = $(this).data('campus');
    var maintag = $(this).data('maintag');
    var ownerfirst_Name = "<?php echo $PrimaryName; ?>";

    var action = $(this).data('action'); //GET ACTION TO CHECK IF USER IS EDITING SETUP OR SETTINGUP 

    var usertype = $('#usertypevalue-setup').val();

    var schoolheadname = [];

    $('.generaladminfirstname').each(function() {
        schoolheadname.push($(this).val());

        var dataid = $(this).data('id');
        var firstnamevaliate = $('#admininsertid' + dataid).val();

        if (firstnamevaliate == '' || firstnamevaliate == ',') {
            $('.adminfnamecover' + dataid).css('outline', '1px solid red');
            $('#checkvalidatedadmin').val('invalid');
            

           
        } else {
            $('.adminfnamecover' + dataid).css('outline', '1px solid green');
            $('#checkvalidatedadmin').val('valid');
           
        }

    });



    var schoooheadlastname = [];

    $('.generaladminltname').each(function() {
        schoooheadlastname.push($(this).val());


        var dataid = $(this).data('id');
        var lastnamevaliate = $('#admin-lname' + dataid).val();

        if (lastnamevaliate == '' || lastnamevaliate == ',') {

            $('.adminlnamecover' + dataid).css('outline', '1px solid red');
            $('#checkvalidatedadmin').val('invalid');
            
        } else {
            $('.adminlnamecover' + dataid).css('outline', '1px solid green');
            $('#checkvalidatedadmin').val('valid');
            
        }

    });

    var schoolphoneemail = [];
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    $('.generaladminemail').each(function() {
        schoolphoneemail.push($(this).val());
        var dataid = $(this).data('id');

        var lastnameemail = $('#admin-email' + dataid).val();


        if (lastnameemail == '' || lastnameemail == ',') {
            $('.adminemailcover' + dataid).css('outline', '1px solid red');
            $('#checkvalidatedadmin').val('invalid');
           
        } else {

            if (!emailPattern.test(lastnameemail)) {

                $('.adminemailcover' + dataid).css('outline', '1px solid red');
                $('#checkvalidatedadmin').val('invalid');
                

            } else {

                $('.adminemailcover' + dataid).css('outline', '1px solid green');
                $('#checkvalidatedadmin').val('valid');
               

            }

        }




    });


    var schoolnum = [];

    $('.generaladminnum').each(function() {
        schoolnum.push($(this).val());
        var dataid = $(this).data('id');

        var numhead = $('#pros-adminnumset' + dataid).val();

        if (numhead == '' || numhead == ',') {
            $('.adminnumcover' + dataid).css('outline', '1px solid red');
            $('#checkvalidatedadmin').val('invalid');
            

            
        } else {
            $('.adminnumcover' + dataid).css('outline', '1px solid green');
            $('#checkvalidatedadmin').val('valid');
            
        }

    });


    //COLLECTING NUMBER WITH COUNTRY CODE
    var formattedinput = [];
    document.querySelectorAll('.generaladminnum').forEach(function(input) {
        // Get the `intlTelInput` plugin instance for the input field
        var iti = window.intlTelInputGlobals.getInstance(input);
        // Get the raw phone number value from the input field
        var numberformat = input.value;
        // Use the `intlTelInputUtils` library to format the phone number with its country code
        formattedinput.push(intlTelInputUtils.formatNumber(numberformat, iti.getSelectedCountryData()
            .iso2));
        // Display the formatted phone number in an alert message
    });
    //COLLECTING NUMBER WITH COUNTRY CODE


    //TRIM USER VALUE IT NOT EMPTY
    var hasEmptyValuefname = schoolheadname.some(function(value) {
        return value.trim() === '';
    });

    var hasEmptyValuelname = schoooheadlastname.some(function(value) {
        return value.trim() === '';
    });

    var hasEmptyValueemail = schoolphoneemail.some(function(value) {
        return value.trim() === '';
    });

    var hasEmptyValuephone = formattedinput.some(function(value) {
        return value.trim() === '';
    });
    //TRIM USER VALUE IT NOT EMPTY



    schoolheadname = schoolheadname.toString();
    schoooheadlastname = schoooheadlastname.toString();
    schoolphoneemail = schoolphoneemail.toString();
    formattedinput = formattedinput.toString();



    if (hasEmptyValuefname || hasEmptyValuelname || hasEmptyValueemail || hasEmptyValuephone) {

        if (maintag == '29') {

            $.ajax({
                type: "POST",
                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/createteacher-setup.php",
                data: {
                    tagstate: tagstate,
                    groupSchoolID: groupSchoolID,
                    schoolheadname: schoolheadname,
                    schoooheadlastname: schoooheadlastname,
                    schoolphoneemail: schoolphoneemail,
                    formattedinput: formattedinput,
                    UserID: UserID,
                    usertype: usertype,
                    CampusID: CampusID,
                    maintag: maintag
                },
                success: function(result) {

                    $('#createadmin-setup-btn').html('Create new');

                    //CHECKING THE ACTION OF A USER SETUP

                    $('#createotherschooltype-setup').animate({
                        // opacity: 0.5,
                        left: '+=50',
                        height: 'toggle'
                    }, 1000);


                    $('#createclasses-setup').fadeIn('slow');

                    //CHECKING THE ACTION OF A USER SETUP END HERE

                }

            });

        } else {


                        $.wnoty({
                            type: 'warning',
                            message: "Hey! no staff's details should be left blank",
                            autohideDelay: 5000
                        });

                        $('#createadmin-setup-btn').html('Create new');
        }

    } else {

        $.ajax({
            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/createteacher-setup.php",
            data: {
                tagstate: tagstate,
                groupSchoolID: groupSchoolID,
                schoolheadname: schoolheadname,
                schoooheadlastname: schoooheadlastname,
                schoolphoneemail: schoolphoneemail,
                formattedinput: formattedinput,
                UserID: UserID,
                usertype: usertype,
                CampusID: CampusID,
                maintag: maintag
            },
            success: function(result) {

                $('#createadmin-setup-btn').html('Create new');

                //CHECKING THE ACTION OF A USER SETUP
                if (action == 'edit') {

                    if (result.trim() == 'allexist') {

                        $.wnoty({
                            type: 'warning',
                            message: "Hey!! this email already exist",
                            autohideDelay: 5000
                        });



                        $('#createotherschooltype-setup').animate({
                            // opacity: 0.5,
                            left: '+=50',
                            height: 'toggle'
                        }, 1000);


                        $('#createclasses-setup').fadeIn('slow');

                        //load setup content here
                        $('#pros-displaysetup-content').html(
                            '<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>'
                            );

                        $.ajax({

                            type: "POST",
                            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/loadsetup-modal.php",
                            data: {
                                UserID: UserID,
                                ownerfirst_Name: ownerfirst_Name,
                                tagstate: tagstate,
                                groupSchoolID: groupSchoolID,
                                CampusID: CampusID
                            },
                            success: function(result) {


                                $('#pros-displaysetup-content').html(result);


                                var head_phones = [];
                                    document.querySelectorAll('.pros-headnumset').forEach(function (input) {
                                        head_phones.push(window.intlTelInput(input, {
                                            separateDialCode: true,
                                            preferredCountries: ["ng"],
                                            hiddenInput: "full",
                                            utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                        }));
                                    });

                            

                                  var head_phone = [];
                                    document.querySelectorAll('.pros-teachernumset').forEach(function (input) {
                                        head_phone.push(window.intlTelInput(input, {
                                            separateDialCode: true,
                                            preferredCountries: ["ng"],
                                            hiddenInput: "full",
                                            utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                        }));
                                    });

                                // var head_phone = window.intlTelInput(document
                                //     .querySelector("#pros-adminnumset"), {
                                //         separateDialCode: true,
                                //         preferredCountries: ["ng"],
                                //         hiddenInput: "full",
                                //         utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                //     });


                                var tagstatusnew = tagstate;

                                $('#prosloadschoolid-forbackward').val(CampusID);




                                if (maintag == '29' && tagstatusnew == '') {

                                    $('#pros-reducemodalclasstypesetup').css('width',
                                        '700px');
                                    //if campus havent't started setiing up it should start from the begginning
                                    $('#pros-loadimportoption').fadeIn('slow');

                                } else {



                                    if (tagstatusnew == '' || tagstatusnew == '15') {
                                                $('#displaysection-content').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');

                                            } else if (tagstatusnew == '16') {

                                                $('#pros-displayhead-setup').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(15);



                                            } else if (tagstatusnew == '17') {

                                                $('#assignschoolheadfaculty  ').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(16);

                                            } else if (tagstatusnew == '18') {
                                                $('#proscreateschool-teacher').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(17);

                                            } else if (tagstatusnew == '19') {
                                                $('#createotherschooltype-setup').fadeIn('slow');

                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(18);

                                            } else if (tagstatusnew == '20') {

                                                $('#pros-reducemodalclasstypesetup').css('width', '700px');

                                                $('#createwelcomemsg-setup').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(19);


                                            } else if (tagstatusnew == '21') {

                                                $('#createclasses-setup ').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(20);

                                                // $('#pros-reducemodalclasstypesetup').addClass('modal-xl');

                                            } else if (tagstatusnew == '22') {

                                                $('#createsubject-setup').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(21);

                                            } else if (tagstatusnew == '23') {

                                                $('#mergesubjectcontent').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(22);


                                            } else if (tagstatusnew == '24') {

                                                $('#pros-assign-formteachercontent').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(23);

                                            } else if (tagstatusnew == '25') {

                                                $('#assignsubject-teachercontainer').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(24);

                                            } else if (tagstatusnew == '26') {

                                                $('#pros-loadsession-termcontent').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(25);

                                            } else if (tagstatusnew == '27') {

                                                $('#pros-schlogo-content').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(26);

                                            }else if(tagstatusnew == '28')
                                            {
                                                $('#prosschool-bgimage-content').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(27);


                                            }else if(tagstatusnew == '29')
                                            {

                                                            //setup completed
                                            
                                            }

                                }







                                const selectBtnnewsubject = document.querySelector(
                                        ".getsubjectopenondocument-ready1"),
                                    itemssubject = document.querySelectorAll(
                                        ".subjectlistmeslist");
                                selectBtnnewsubject.classList.toggle("open");



                              

                            }
                        });

                        //load setup content here
                    } else {


                        $.wnoty({
                            type: 'success',
                            message: "hey! admin created successfully.",
                            autohideDelay: 5000
                        });

                        $('#createotherschooltype-setup').animate({
                            // opacity: 0.5,
                            left: '+=50',
                            height: 'toggle'
                        }, 1000);

                        $('#createclasses-setup').fadeIn('slow');

                    }

                } else {

                    if (result.trim() == 'allexist') {

                        $.wnoty({
                            type: 'warning',
                            message: "Hey!! this email already exist",
                            autohideDelay: 5000
                        });



                        $('#createotherschooltype-setup').animate({
                            // opacity: 0.5,
                            left: '+=50',
                            height: 'toggle'
                        }, 1000);

                        $('#pros-reducemodalclasstypesetup').css('width', '700px');
                        $('#createwelcomemsg-setup').fadeIn('slow');

                    } else {


                        $.wnoty({
                            type: 'success',
                            message: "hey! admin created successfully.",
                            autohideDelay: 5000
                        });



                        $('#createotherschooltype-setup').animate({
                            // opacity: 0.5,
                            left: '+=50',
                            height: 'toggle'
                        }, 1000);

                        $('#pros-reducemodalclasstypesetup').css('width', '700px');
                        $('#createwelcomemsg-setup').fadeIn('slow');

                        //load setup content here
                        $('#pros-displaysetup-content').html(
                            '<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>'
                            );

                        $.ajax({

                            type: "POST",
                            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/loadsetup-modal.php",
                            data: {
                                UserID: UserID,
                                ownerfirst_Name: ownerfirst_Name,
                                tagstate: tagstate,
                                groupSchoolID: groupSchoolID,
                                CampusID: CampusID
                            },
                            success: function(result) {


                                $('#pros-displaysetup-content').html(result);


                                var head_phones = [];
                                    document.querySelectorAll('.pros-headnumset').forEach(function (input) {
                                        head_phones.push(window.intlTelInput(input, {
                                            separateDialCode: true,
                                            preferredCountries: ["ng"],
                                            hiddenInput: "full",
                                            utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                        }));
                                    });

                            

                                  var head_phone = [];
                                    document.querySelectorAll('.pros-teachernumset').forEach(function (input) {
                                        head_phone.push(window.intlTelInput(input, {
                                            separateDialCode: true,
                                            preferredCountries: ["ng"],
                                            hiddenInput: "full",
                                            utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                        }));
                                    });
                                // var head_phone = window.intlTelInput(document
                                //     .querySelector("#pros-adminnumset"), {
                                //         separateDialCode: true,
                                //         preferredCountries: ["ng"],
                                //         hiddenInput: "full",
                                //         utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                //     });


                                var tagstatusnew = tagstate;

                                $('#prosloadschoolid-forbackward').val(CampusID);




                                if (maintag == '29' && tagstatusnew == '') {

                                    $('#pros-reducemodalclasstypesetup').css('width',
                                        '700px');
                                    //if campus havent't started setiing up it should start from the begginning
                                    $('#pros-loadimportoption').fadeIn('slow');

                                } else {


                                    if (tagstatusnew == '' || tagstatusnew == '15') {
                                                $('#displaysection-content').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');

                                            } else if (tagstatusnew == '16') {

                                                $('#pros-displayhead-setup').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(15);



                                            } else if (tagstatusnew == '17') {

                                                $('#assignschoolheadfaculty  ').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(16);

                                            } else if (tagstatusnew == '18') {
                                                $('#proscreateschool-teacher').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(17);

                                            } else if (tagstatusnew == '19') {
                                                $('#createotherschooltype-setup').fadeIn('slow');

                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(18);

                                            } else if (tagstatusnew == '20') {

                                                $('#pros-reducemodalclasstypesetup').css('width', '700px');

                                                $('#createwelcomemsg-setup').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(19);


                                            } else if (tagstatusnew == '21') {

                                                $('#createclasses-setup ').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(20);

                                                // $('#pros-reducemodalclasstypesetup').addClass('modal-xl');

                                            } else if (tagstatusnew == '22') {

                                                $('#createsubject-setup').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(21);

                                            } else if (tagstatusnew == '23') {

                                                $('#mergesubjectcontent').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(22);


                                            } else if (tagstatusnew == '24') {

                                                $('#pros-assign-formteachercontent').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(23);

                                            } else if (tagstatusnew == '25') {

                                                $('#assignsubject-teachercontainer').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(24);

                                            } else if (tagstatusnew == '26') {

                                                $('#pros-loadsession-termcontent').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(25);

                                            } else if (tagstatusnew == '27') {

                                                $('#pros-schlogo-content').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(26);

                                            }else if(tagstatusnew == '28')
                                            {
                                                $('#prosschool-bgimage-content').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(27);


                                            }else if(tagstatusnew == '29')
                                            {

                                                            //setup completed
                                            
                                            }

                                }






                                const selectBtnnewsubject = document.querySelector(
                                        ".getsubjectopenondocument-ready1"),
                                    itemssubject = document.querySelectorAll(
                                        ".subjectlistmeslist");
                                selectBtnnewsubject.classList.toggle("open");



                               

                            }
                        });

                        //load setup content here





                    }
                }
                //CHECKING THE ACTION OF A USER SETUP END HERE
            }
        });
    }
});
// create admin setup end here




// assign a school head to a section
$('body').on('click', '#assignschoolheadtofac-btn', function(e) {


    $('#assignschoolheadtofac-btn').html('<span class="spinner-border spinner-border-sm" aria-hidden="true"></span><span class="visually-hidden" role="status">Loading...</span>assigning..');
  

    var tagstate = $(this).data('tag');
    var UserID = "<?php echo $UserID; ?>";
    var campusID = $(this).data('campus');
    var groupSchoolID = $(this).data('school');
    var ownerfirst_Name = "<?php echo $PrimaryName; ?>";
    var maintagstate = $(this).data('main');


    var schoolheadchecked = [];
    var FacultyID = [];

    var checkheadselected = $(".pros-generalcheckschoolhead:checked").val();

    $('.pros-generalcheckschoolhead:checked').each(function() {
        schoolheadchecked.push($(this).val());
        FacultyID.push($(this).data('faculty'));
    });

    schoolheadchecked = schoolheadchecked.toString();
    FacultyID = FacultyID.toString();

    if (checkheadselected === undefined) {

        $.wnoty({
            type: 'warning',
            message: "select a school head to be assigned to a section.",
            autohideDelay: 5000
        });

        $('#assignschoolheadtofac-btn').html('Assign Now');

    } else {


        $.ajax({
            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/assignschoolhead-section.php",
            data: {
                FacultyID: FacultyID,
                schoolheadchecked: schoolheadchecked,
                UserID: UserID,
                tagstate: tagstate,
                campusID: campusID
            },
            success: function(result) {


                $('#assignschoolheadtofac-btn').html('Assign Now');

                $('#assignschoolheadfaculty').animate({
                    left: '+=50',
                    height: 'toggle'
                }, 1000);

                $('#proscreateschool-teacher').fadeIn('slow');


                //load content after assign faculty
                $('#pros-displaysetup-content').html(
                    '<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>'
                    );



                $.ajax({

                    type: "POST",
                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/loadsetup-modal.php",
                    data: {
                        UserID: UserID,
                        ownerfirst_Name: ownerfirst_Name,
                        tagstate: tagstate,
                        groupSchoolID: groupSchoolID,
                        CampusID: campusID
                    },
                    success: function(result) {

                        $('#pros-displaysetup-content').html(result);




                        var head_phones = [];
                        document.querySelectorAll('.pros-headnumset').forEach(function (input) {
                            head_phones.push(window.intlTelInput(input, {
                                separateDialCode: true,
                                preferredCountries: ["ng"],
                                hiddenInput: "full",
                                utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                            }));
                        });
                       

                        var head_phone = [];


                        document.querySelectorAll('.pros-teachernumset').forEach(function (input) {
                            head_phone.push(window.intlTelInput(input, {
                                separateDialCode: true,
                                preferredCountries: ["ng"],
                                hiddenInput: "full",
                                utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                            }));
                        });

                        // var head_phone = window.intlTelInput(document.querySelector(
                        //     "#pros-adminnumset"), {
                        //     separateDialCode: true,
                        //     preferredCountries: ["ng"],
                        //     hiddenInput: "full",
                        //     utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                        // });


                        var tagstatusnew = tagstate;

                        $('#prosloadschoolid-forbackward').val(campusID);


                        if (maintagstate == '29' && tagstatusnew == '') {

                            $('#pros-reducemodalclasstypesetup').css('width', '700px');
                            //if campus havent't started setiing up it should start from the begginning
                            $('#pros-loadimportoption').fadeIn('slow');

                        } else {



                            if (tagstatusnew == '' || tagstatusnew == '15') {
                                $('#displaysection-content').fadeIn('slow');
                                $('#movebackbtn-setup').fadeIn('slow');

                            } else if (tagstatusnew == '16') {

                                $('#pros-displayhead-setup').fadeIn('slow');
                                $('#movebackbtn-setup').fadeIn('slow');
                                $('#pros-displaybackvalue-tag').val(15);



                            } else if (tagstatusnew == '17') {

                                $('#assignschoolheadfaculty  ').fadeIn('slow');
                                $('#movebackbtn-setup').fadeIn('slow');
                                $('#pros-displaybackvalue-tag').val(16);

                            } else if (tagstatusnew == '18') {
                                $('#proscreateschool-teacher').fadeIn('slow');
                                $('#movebackbtn-setup').fadeIn('slow');
                                $('#pros-displaybackvalue-tag').val(17);

                            } else if (tagstatusnew == '19') {
                                $('#createotherschooltype-setup').fadeIn('slow');

                                $('#movebackbtn-setup').fadeIn('slow');
                                $('#pros-displaybackvalue-tag').val(18);

                            } else if (tagstatusnew == '20') {

                                $('#pros-reducemodalclasstypesetup').css('width',
                                    '700px');

                                $('#createwelcomemsg-setup').fadeIn('slow');
                                $('#movebackbtn-setup').fadeIn('slow');
                                $('#pros-displaybackvalue-tag').val(19);


                            } else if (tagstatusnew == '21') {

                                $('#createclasses-setup ').fadeIn('slow');
                                $('#movebackbtn-setup').fadeIn('slow');
                                $('#pros-displaybackvalue-tag').val(20);

                                // $('#pros-reducemodalclasstypesetup').addClass('modal-xl');

                            } else if (tagstatusnew == '22') {

                                $('#createsubject-setup').fadeIn('slow');
                                $('#movebackbtn-setup').fadeIn('slow');
                                $('#pros-displaybackvalue-tag').val(21);

                            } else if (tagstatusnew == '23') {

                                $('#mergesubjectcontent').fadeIn('slow');
                                $('#movebackbtn-setup').fadeIn('slow');
                                $('#pros-displaybackvalue-tag').val(22);


                            } else if (tagstatusnew == '24') {

                                $('#pros-assign-formteachercontent').fadeIn('slow');
                                $('#movebackbtn-setup').fadeIn('slow');
                                $('#pros-displaybackvalue-tag').val(23);

                            } else if (tagstatusnew == '25') {

                                $('#assignsubject-teachercontainer').fadeIn('slow');
                                $('#movebackbtn-setup').fadeIn('slow');
                                $('#pros-displaybackvalue-tag').val(24);

                            } else if (tagstatusnew == '26') {

                                $('#pros-loadsession-termcontent').fadeIn('slow');
                                $('#movebackbtn-setup').fadeIn('slow');
                                $('#pros-displaybackvalue-tag').val(25);

                            } else if (tagstatusnew == '27') {

                            }if (tagstatusnew == '' || tagstatusnew == '15') {
                                                $('#displaysection-content').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');

                                            } else if (tagstatusnew == '16') {

                                                $('#pros-displayhead-setup').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(15);



                                            } else if (tagstatusnew == '17') {

                                                $('#assignschoolheadfaculty  ').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(16);

                                            } else if (tagstatusnew == '18') {
                                                $('#proscreateschool-teacher').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(17);

                                            } else if (tagstatusnew == '19') {
                                                $('#createotherschooltype-setup').fadeIn('slow');

                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(18);

                                            } else if (tagstatusnew == '20') {

                                                $('#pros-reducemodalclasstypesetup').css('width', '700px');

                                                $('#createwelcomemsg-setup').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(19);


                                            } else if (tagstatusnew == '21') {

                                                $('#createclasses-setup ').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(20);

                                                // $('#pros-reducemodalclasstypesetup').addClass('modal-xl');

                                            } else if (tagstatusnew == '22') {

                                                $('#createsubject-setup').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(21);

                                            } else if (tagstatusnew == '23') {

                                                $('#mergesubjectcontent').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(22);


                                            } else if (tagstatusnew == '24') {

                                                $('#pros-assign-formteachercontent').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(23);

                                            } else if (tagstatusnew == '25') {

                                                $('#assignsubject-teachercontainer').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(24);

                                            } else if (tagstatusnew == '26') {

                                                $('#pros-loadsession-termcontent').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(25);

                                            } else if (tagstatusnew == '27') {

                                                $('#pros-schlogo-content').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(26);

                                            }else if(tagstatusnew == '28')
                                            {
                                                $('#prosschool-bgimage-content').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(27);


                                            }else if(tagstatusnew == '29')
                                            {

                                                            //setup completed
                                            
                                            }

                        }




                        const selectBtnnewsubject = document.querySelector(
                                ".getsubjectopenondocument-ready1"),
                            itemssubject = document.querySelectorAll(
                                ".subjectlistmeslist");
                        selectBtnnewsubject.classList.toggle("open");



                       

                    }
                });
                //load content after assign faculty




            }

        });
    }

});
//assign a school head to a section end here




//move back btn by  steps
//move back btn by steps
$('body').on('click', '#movebackbtn-setup', function(e) {
    // Prevent multiple clicks
    if ($(this).data('processing')) return;
    $(this).data('processing', true);

    var getback_wardbtn = $('#pros-displaybackvalue-tag').val();
    var UserID = "<?php echo $UserID; ?>";
    var campusID = $('#prosloadschoolid-forbackward').val();

    // Disable button during processing
    $(this).prop('disabled', true);

    $.ajax({
        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/updatesetup-backwardtag.php",
        data: {
            getback_wardbtn: getback_wardbtn,
            UserID: UserID,
            campusID: campusID
        },
        success: function(result) {
            // Handle the transition based on the current step
            handleStepTransition(getback_wardbtn);
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            // alert('An error occurred while processing your request. Please try again.');
        },
        complete: function() {
            // Reset button state
            $('#movebackbtn-setup').prop('disabled', false).data('processing', false);
        }
    });
});

// Function to handle step transitions
function handleStepTransition(currentStep) {
    const transitions = {
        '15': {
            fadeOut: ['#pros-displayhead-setup', '#movebackbtn-setup'],
            fadeIn: ['#displaysection-content'],
            setValue: 15
        },
        '16': {
            fadeOut: ['#assignschoolheadfaculty'],
            fadeIn: ['#pros-displayhead-setup'],
            setValue: 15
        },
        '17': {
            fadeOut: ['#proscreateschool-teacher'],
            fadeIn: ['#assignschoolheadfaculty'],
            setValue: 16
        },
        '18': {
            fadeOut: ['#createotherschooltype-setup'],
            fadeIn: ['#proscreateschool-teacher'],
            setValue: 17
        },
        '19': {
            fadeOut: ['#createwelcomemsg-setup'],
            fadeIn: ['#createotherschooltype-setup'],
            setValue: 18,
            css: { '#pros-reducemodalclasstypesetup': { width: '86%' } }
        },
        '20': {
            fadeOut: ['#createclasses-setup'],
            fadeIn: ['#createwelcomemsg-setup'],
            setValue: 19,
            css: { '#pros-reducemodalclasstypesetup': { width: '700px' } }
        },
        '21': {
            fadeOut: ['#createsubject-setup'],
            fadeIn: ['#createclasses-setup'],
            setValue: 20,
            css: { '#pros-reducemodalclasstypesetup': { width: '86%' } }
        },
        '22': {
            fadeOut: ['#mergesubjectcontent'],
            fadeIn: ['#createsubject-setup'],
            setValue: 21,
            css: { '#pros-reducemodalclasstypesetup': { width: '86%' } }
        },
        '23': {
            fadeOut: ['#pros-assign-formteachercontent'],
            fadeIn: ['#mergesubjectcontent'],
            setValue: 22,
            css: { '#pros-reducemodalclasstypesetup': { width: '86%' } }
        },
        '24': {
            fadeOut: ['#assignsubject-teachercontainer'],
            fadeIn: ['#pros-assign-formteachercontent'],
            setValue: 23,
            css: { '#pros-reducemodalclasstypesetup': { width: '86%' } }
        },
        '25': {
            fadeOut: ['#pros-loadsession-termcontent'],
            fadeIn: ['#assignsubject-teachercontainer'],
            setValue: 24,
            css: { '#pros-reducemodalclasstypesetup': { width: '86%' } }
        },
        '26': {
            fadeOut: ['#pros-schlogo-content'],
            fadeIn: ['#pros-loadsession-termcontent'],
            setValue: 25,
            css: { '#pros-reducemodalclasstypesetup': { width: '86%' } }
        },
        '27': {
            fadeOut: ['#prosschool-bgimage-content'],
            fadeIn: ['#pros-schlogo-content'],
            setValue: 26,
            css: { '#pros-reducemodalclasstypesetup': { width: '86%' } }
        }
    };

    const transition = transitions[currentStep];
    if (!transition) return;

    // Update the value
    $('#pros-displaybackvalue-tag').val(transition.setValue);

    // Apply CSS changes if any
    if (transition.css) {
        Object.entries(transition.css).forEach(([selector, styles]) => {
            $(selector).css(styles);
        });
    }

    // Handle fade transitions with consistent timing
    transition.fadeOut.forEach(selector => {
        $(selector).fadeOut(300);
    });

    // Wait for fadeOut to complete before fading in
    setTimeout(() => {
        transition.fadeIn.forEach(selector => {
            $(selector).fadeIn(300);
        });
    }, 300);
}
//move back btn by  steps ends here





//SKIP OTHER STAFF CREATION IF CREATED SCHOOL HEAD AND TEACHERS
$('body').on('click', '#skipcreatestaff', function(e) {

    var getback_wardbtn = $(this).data('tag');
    var CampusID = $(this).data('campus');
    var UserID = "<?php echo $UserID; ?>";

 
   $('#skipcreatestaff').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="visually-hidden">Loading...</span>');


    $.ajax({
        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/updatesetup-backwardtag.php",
        data: {
            getback_wardbtn: getback_wardbtn,
            UserID: UserID,
            CampusID: CampusID
        },
        success: function(result) {
        $('#pros-displaybackvalue-tag').val(20);
            $('#createotherschooltype-setup').fadeOut();
            
               
            $('#pros-reducemodalclasstypesetup').css('width', '700px');
            $('#createwelcomemsg-setup').fadeIn('slow');
            $('#skipcreatestaff').html('Skip');
        }
    });
});
//SKIP OTHER STAFF CREATION IF CREATED SCHOOL HEAD AND TEACHERS



$('body').on('click', '#proceedto-createclassbtn', function(e) {

    $(this).html(
        '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>loading...'
    );

    var getback_wardbtn = $(this).data('tag');
    var UserID = "<?php echo $UserID; ?>";
    var campusID = $(this).data('campus');


    $.ajax({
        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/updatesetup-backwardtag.php",
        data: {
            getback_wardbtn: getback_wardbtn,
            UserID: UserID,
            campusID: campusID
        },
        success: function(result) {

            $('#createwelcomemsg-setup').animate({

                left: '+=50',
                height: 'toggle'
            }, 1000);


            $('#pros-reducemodalclasstypesetup').css('width', '86%');
            $('#createclasses-setup').fadeIn('slow');
            $('#proceedto-createclassbtn').html('Create new');


        }
    });

});


// create class for btn

$('body').on('click', '#createclass-setup-btn', function(e) {
    var tagstate = $(this).data('tag');
    var UserID = "<?php echo $UserID; ?>";
    var campusID = $(this).data('campus');
    var groupSchoolID = $(this).data('school');
    var ownerfirst_Name = "<?php echo $PrimaryName; ?>";
    var maintagstate = $(this).data('maintag');





    $(this).html(
        '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>creating...'
    );



    var valueclass = $(this).val();
    var classname = [];
    var FacultyID = [];
    var ClasslistID = [];

    $('.prosgeneralclassselecttobecreated').each(function() {
        var valueclassnew = $(this).val();

            if (valueclassnew.trim() !== '') {
                var classnamegotten = $(this).val();
                var stringArray = classnamegotten.split(',');
                  
                   var sectionew = $(this).data('faculty');
                    var classlisIDnew = $(this).data('classlist');  
                     classname.push($(this).val());
                    
                  if(stringArray.length > 1)
                  {
                      
                      
                            for (i = 0; i < stringArray.length; i++) {
                                        FacultyID.push(sectionew);
                                         ClasslistID.push(classlisIDnew);         
                            }
                      
                  }else
                  {
                           
                            FacultyID.push(sectionew);
                            ClasslistID.push(classlisIDnew);  
                  }
                
            }
    });
    
    
    

    classname = classname.toString();
    FacultyID = FacultyID.toString();
    ClasslistID = ClasslistID.toString();

   


    if (classname == '') {
        $.wnoty({
            type: 'warning',
            message: "pls input a class name before proceeding.",
            autohideDelay: 5000
        });

        $('#createclass-setup-btn').html('Create class');
    } else {



        $.ajax({
            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/createclass-setup.php",
            data: {
                tagstate: tagstate,
                UserID: UserID,
                campusID: campusID,
                classname: classname,
                FacultyID: FacultyID,
                ClasslistID:ClasslistID
            },
            success: function(result) {
               

              


                $('#createclass-setup-btn').html('Create class');

                if (result == 'found') {
                    $.wnoty({
                        type: 'warning',
                        message: "hey! this classs has been created before.",
                        autohideDelay: 5000
                    });

                    $('#createclasses-setup').animate({
                        left: '+=50',
                        height: 'toggle'
                    }, 1000);

                    $('#createsubject-setup').fadeIn('slow');


                } else {


                    $.wnoty({
                        type: 'success',
                        message: "Great! class created successfully.",
                        autohideDelay: 5000
                    });

                    $('#createclasses-setup').animate({
                        left: '+=50',
                        height: 'toggle'
                    }, 1000);

                    $('#createsubject-setup').fadeIn('slow');

                }



                //display setup content

                $('#pros-displaysetup-content').html(
                    '<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>'
                    );

                $.ajax({

                    type: "POST",
                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/loadsetup-modal.php",
                    data: {
                        UserID: UserID,
                        ownerfirst_Name: ownerfirst_Name,
                        tagstate: tagstate,
                        groupSchoolID: groupSchoolID,
                        CampusID: campusID
                    },
                    success: function(result) {

                        $('#pros-displaysetup-content').html(result);


                              var head_phones = [];
                                    document.querySelectorAll('.pros-headnumset').forEach(function (input) {
                                        head_phones.push(window.intlTelInput(input, {
                                            separateDialCode: true,
                                            preferredCountries: ["ng"],
                                            hiddenInput: "full",
                                            utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                        }));
                                    });

                            

                                  var head_phone = [];
                                    document.querySelectorAll('.pros-teachernumset').forEach(function (input) {
                                        head_phone.push(window.intlTelInput(input, {
                                            separateDialCode: true,
                                            preferredCountries: ["ng"],
                                            hiddenInput: "full",
                                            utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                        }));
                                    });
                                // var head_phone = window.intlTelInput(document.querySelector(
                                //     "#pros-adminnumset"), {
                                //     separateDialCode: true,
                                //     preferredCountries: ["ng"],
                                //     hiddenInput: "full",
                                //     utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                // });




                        var tagstatusnew = tagstate;

                        $('#prosloadschoolid-forbackward').val(campusID);


                        if (maintagstate == '29' && tagstatusnew == '') {

                            $('#pros-reducemodalclasstypesetup').css('width', '700px');
                            //if campus havent't started setiing up it should start from the begginning
                            $('#pros-loadimportoption').fadeIn('slow');

                        } else {



                                          if (tagstatusnew == '' || tagstatusnew == '15') {
                                                $('#displaysection-content').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');

                                            } else if (tagstatusnew == '16') {

                                                $('#pros-displayhead-setup').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(15);



                                            } else if (tagstatusnew == '17') {

                                                $('#assignschoolheadfaculty  ').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(16);

                                            } else if (tagstatusnew == '18') {
                                                $('#proscreateschool-teacher').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(17);

                                            } else if (tagstatusnew == '19') {
                                                $('#createotherschooltype-setup').fadeIn('slow');

                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(18);

                                            } else if (tagstatusnew == '20') {

                                                $('#pros-reducemodalclasstypesetup').css('width', '700px');

                                                $('#createwelcomemsg-setup').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(19);


                                            } else if (tagstatusnew == '21') {

                                                $('#createclasses-setup ').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(20);

                                                // $('#pros-reducemodalclasstypesetup').addClass('modal-xl');

                                            } else if (tagstatusnew == '22') {

                                                $('#createsubject-setup').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(21);

                                            } else if (tagstatusnew == '23') {

                                                $('#mergesubjectcontent').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(22);


                                            } else if (tagstatusnew == '24') {

                                                $('#pros-assign-formteachercontent').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(23);

                                            } else if (tagstatusnew == '25') {

                                                $('#assignsubject-teachercontainer').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(24);

                                            } else if (tagstatusnew == '26') {

                                                $('#pros-loadsession-termcontent').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(25);

                                            } else if (tagstatusnew == '27') {

                                                $('#pros-schlogo-content').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(26);

                                            }else if(tagstatusnew == '28')
                                            {
                                                $('#prosschool-bgimage-content').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(27);


                                            }else if(tagstatusnew == '29')
                                            {

                                                            //setup completed
                                            
                                            }

                        }





                        const selectBtnnewclass = document.querySelector(
                                ".getclassopenondocument-ready1"),
                            itemsclass = document.querySelectorAll(".listmeslist");
                        selectBtnnewclass.classList.toggle("open");


                        const selectBtnnewsubject = document.querySelector(
                                ".getsubjectopenondocument-ready1"),
                            itemssubject = document.querySelectorAll(
                                ".subjectlistmeslist");
                        selectBtnnewsubject.classList.toggle("open");



                       
                    }
                });

                // display setup content


            }
        });
    }

});



// create class for btn
$('body').on('click', '#createsubject-setup-btn', function(e) {

    var tagstate = $(this).data('tag');
    var UserID = "<?php echo $UserID; ?>";
    var campusID = $(this).data('campus');
    var groupSchoolID = $(this).data('school');
    var maintagstate = $(this).data('maintag');
    var ownerfirst_Name = "<?php echo $PrimaryName; ?>";



    $(this).html(
        '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>creating...'
    );


    var subject = [];
    var classname = [];

    $('.prosgeneralsubjectgotten:checked').each(function() {
        var valuesubject = $(this).val();

        if (valuesubject.trim() !== '') {
            subject.push($(this).val());
            classname.push($(this).data('class'));
        }
    });

    classname = classname.toString();
    subject = subject.toString();




    if (subject == '') {
        $.wnoty({
            type: 'warning',
            message: "pls input a subject name before proceeding.",
            autohideDelay: 5000
        });

        $('#createsubject-setup-btn').html('Create subject');
    } else {



        $.ajax({
            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/createsubject-setup.php",
            data: {
                tagstate: tagstate,
                UserID: UserID,
                campusID: campusID,
                subject: subject,
                classname: classname
            },
            success: function(result) {
               

                // alert(result);


                $('#createsubject-setup-btn').html('Create subject');

                if (result.trim() == 'found') {

                    $.wnoty({
                        type: 'warning',
                        message: "hey! this subject has been created before.",
                        autohideDelay: 5000
                    });


                } else if(result.trim()== 'success') {

                    $.wnoty({
                        type: 'success',
                        message: "Great! subject created successfully.",
                        autohideDelay: 5000
                    });

                    $('#createsubject-setup').animate({
                        left: '+=50',
                        height: 'toggle'
                    }, 1000);

                    $('#mergesubjectcontent').fadeIn('slow');

                    //load setup content

                    $('#pros-displaysetup-content').html(
                        '<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>'
                        );

                    $.ajax({

                        type: "POST",
                        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/loadsetup-modal.php",
                        data: {
                            UserID: UserID,
                            ownerfirst_Name: ownerfirst_Name,
                            tagstate: tagstate,
                            groupSchoolID: groupSchoolID,
                            CampusID: campusID
                        },
                        success: function(result) {

                            $('#pros-displaysetup-content').html(result);


                            var head_phones = [];
                                    document.querySelectorAll('.pros-headnumset').forEach(function (input) {
                                        head_phones.push(window.intlTelInput(input, {
                                            separateDialCode: true,
                                            preferredCountries: ["ng"],
                                            hiddenInput: "full",
                                            utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                        }));
                                    });

                            

                                  var head_phone = [];
                                    document.querySelectorAll('.pros-teachernumset').forEach(function (input) {
                                        head_phone.push(window.intlTelInput(input, {
                                            separateDialCode: true,
                                            preferredCountries: ["ng"],
                                            hiddenInput: "full",
                                            utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                        }));
                                    });   
                                    
                                // var head_phone = window.intlTelInput(document.querySelector(
                                // "#pros-adminnumset"), {
                                // separateDialCode: true,
                                // preferredCountries: ["ng"],
                                // hiddenInput: "full",
                                // utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                // });


                            var tagstatusnew = tagstate;

                            $('#prosloadschoolid-forbackward').val(campusID);


                            if (maintagstate == '29' && tagstatusnew == '') {

                                $('#pros-reducemodalclasstypesetup').css('width',
                                    '700px');
                                //if campus havent't started setiing up it should start from the begginning
                                $('#pros-loadimportoption').fadeIn('slow');

                            } else {



                                          if (tagstatusnew == '' || tagstatusnew == '15') {
                                                $('#displaysection-content').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');

                                            } else if (tagstatusnew == '16') {

                                                $('#pros-displayhead-setup').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(15);



                                            } else if (tagstatusnew == '17') {

                                                $('#assignschoolheadfaculty  ').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(16);

                                            } else if (tagstatusnew == '18') {
                                                $('#proscreateschool-teacher').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(17);

                                            } else if (tagstatusnew == '19') {
                                                $('#createotherschooltype-setup').fadeIn('slow');

                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(18);

                                            } else if (tagstatusnew == '20') {

                                                $('#pros-reducemodalclasstypesetup').css('width', '700px');

                                                $('#createwelcomemsg-setup').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(19);


                                            } else if (tagstatusnew == '21') {

                                                $('#createclasses-setup ').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(20);

                                                // $('#pros-reducemodalclasstypesetup').addClass('modal-xl');

                                            } else if (tagstatusnew == '22') {

                                                $('#createsubject-setup').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(21);

                                            } else if (tagstatusnew == '23') {

                                                $('#mergesubjectcontent').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(22);


                                            } else if (tagstatusnew == '24') {

                                                $('#pros-assign-formteachercontent').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(23);

                                            } else if (tagstatusnew == '25') {

                                                $('#assignsubject-teachercontainer').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(24);

                                            } else if (tagstatusnew == '26') {

                                                $('#pros-loadsession-termcontent').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(25);

                                            } else if (tagstatusnew == '27') {

                                                $('#pros-schlogo-content').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(26);

                                            }else if(tagstatusnew == '28')
                                            {
                                                $('#prosschool-bgimage-content').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(27);


                                            }else if(tagstatusnew == '29')
                                            {

                                                            //setup completed
                                            
                                            }

                            }





                            const selectBtnnewclass = document.querySelector(
                                    ".getclassopenondocument-ready1"),
                                itemsclass = document.querySelectorAll(".listmeslist");
                            selectBtnnewclass.classList.toggle("open");


                            const selectBtnnewsubject = document.querySelector(
                                    ".getsubjectopenondocument-ready1"),
                                itemssubject = document.querySelectorAll(
                                    ".subjectlistmeslist");
                            selectBtnnewsubject.classList.toggle("open");



                          

                        }
                    });

                    //load setup content






                }


            }
        });
    }

});




//click yes to create other user btn

$('body').on('click', '#proceedtocreatestaff-setup', function(e) {

    var usertypecheck = $("input[type='radio'].usertypecheck-setup:checked").val();


    if (usertypecheck === undefined) {

        $.wnoty({
            type: 'warning',
            message: "Hey!! choose a staff first",
            autohideDelay: 5000
        });

    } else {


        var UserID = $(this).data('uid');
        var ownerfirst_Name = $(this).data('uname');
        var tagstate = $(this).data('utage');
        var groupSchoolID = $(this).data('instid');
        var CampusID = $(this).data('campid');

        prosload_admin_execu_inputs(UserID,ownerfirst_Name,tagstate,groupSchoolID,CampusID,usertypecheck);

        $('#createotheeusertypecover').animate({
            left: '+=50',
            height: 'toggle'
        }, 500);

        $('#admininputcoversetup').fadeIn('slow');

        if(usertypecheck == 'admin')
        {

            $('.prosotherstaffreg').html('an admin');

        }else
        {
            $('.prosotherstaffreg').html('senior executive');
        }

        $('#usertypevalue-setup').val(usertypecheck);


    }
});

//click yes to create other user btn

// prosload admin input here

function  prosload_admin_execu_inputs(UserID,ownerfirst_Name,tagstate,groupSchoolID,CampusID,usertypecheck)
{


   
    $('#admininputcoversetup').html(
        '<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
    
    $.ajax({
        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/load_adminsetup_input.php",
        data: {
            tagstate: tagstate,
            UserID: UserID,
            CampusID: CampusID,
            groupSchoolID: groupSchoolID,
            ownerfirst_Name: ownerfirst_Name,
            usertypecheck: usertypecheck
        },
         success: function(result) {

            $('#admininputcoversetup').html(result);

            // alert(result);
                  var head_phone = [];
                        document.querySelectorAll('.pros-adminnumset').forEach(function (input) {
                            head_phone.push(window.intlTelInput(input, {
                                separateDialCode: true,
                                preferredCountries: ["ng"],
                                hiddenInput: "full",
                                utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                            }));
                        });
                

            

            }
        });


    
}



//click on enter to display display class like tag kind
$('body').on('keypress', '.geneclassnameinput', function(e) {

    if (event.which === 13) {
        var facunaewid = $(this).data('faculty');
        var classname = [];
        var FacultyID = [];


        $('.geneclassnameinput').each(function() {
            var valueclass = $(this).val();
            var facultyd = $(this).val();


            if (valueclass.trim() !== '') {
                classname.push($(this).val());
                FacultyID.push($(this).data('faculty'));
            }
        });


        $('.geneclassnameinput').val('');

        // Clear existing tags


        for (var i = 0; i < classname.length; i++) {

            var valueClassgotten = classname[i];
            var facultygooten = FacultyID[i];
            var valuesArray = valueClassgotten.split(',');

            for (var j = 0; j < valuesArray.length; j++) {

                var trimmedValue = valuesArray[j];
                var facultarr = facultygooten[j];


                
                if (trimmedValue == '') {
                    //display nothing if empty

                } else {

                    //display nothing if empty
                    var spanTag = $('<button>', {
                        'type': 'button',
                        'class': 'removeallappenclass' + facunaewid +
                            ' btn btn-sm mt-2 pros-generalclasssubmitval',
                        'style': 'background-color:#fcfeff;border-radius:10px;color:#434445;border:1px solid #007bff;font-weight:520;font-size:12px;',
                        'html': '<i class="fa fa-times" id="removeappeedinput-tag"  data-id="' + i +
                            facunaewid + '"></i>  ' + trimmedValue,
                        'id': 'pros-addappendedtag' + i + facunaewid,
                        'value': trimmedValue,
                        'data-faculty': facunaewid
                    });
                    //display nothing if empty


                    $('.displaytagappend' + facunaewid).append(spanTag).append('&nbsp;&nbsp;&nbsp;');

                    $('.pros-removeclassaddennew' + facunaewid).fadeIn('slow');
                }
            }
        }

    }

});
//click on enter to display display class like tag kind end here


//=====create subjectfrom input field======//
$('body').on('keypress', '.genesubjectnameinput', function(e) {
    if (event.which === 13) {
        var facunaewid = $(this).data('faculty');
        var classname = [];
        var FacultyID = [];


        $('.genesubjectnameinput').each(function() {
            var valueclass = $(this).val();
            var facultyd = $(this).val();


            if (valueclass.trim() !== '') {
                classname.push($(this).val());
                FacultyID.push($(this).data('faculty'));
            }
        });


        $('.genesubjectnameinput').val('');

        // Clear existing tags


        for (var i = 0; i < classname.length; i++) {

            var valueClassgotten = classname[i];
            var facultygooten = FacultyID[i];
            var valuesArray = valueClassgotten.split(',');

            for (var j = 0; j < valuesArray.length; j++) {

                var trimmedValue = valuesArray[j];
                var facultarr = facultygooten[j];


                // if (trimmedValue !== '' && !$('.displaytagappend' + facunaewid).find('span:contains(' + trimmedValue + ')').length) {
                if (trimmedValue == '') {


                } else {
                    var spanTag = $('<button>', {
                        'type': 'button',
                        'class': 'removeallappensubject' + facunaewid +
                            ' btn btn-sm mt-2 pros-generalsubjectsubmitval',
                        'style': 'background-color:#fcfeff;border-radius:10px;color:#434445;border:1px solid #007bff;font-weight:520;font-size:12px;',
                        'html': '<i class="fa fa-times" id="removeappeedinput-tag-subject"  data-id="' +
                            i + facunaewid + '"></i>' + trimmedValue,
                        'id': 'pros-addappendedtag-subject' + i + facunaewid,
                        'value': trimmedValue,
                        'data-class': facunaewid
                    });


                    $('.displaytagappendsubject' + facunaewid).append(spanTag).append('&nbsp;&nbsp;&nbsp;');

                    $('.pros-removesubjectaddennew' + facunaewid).fadeIn('slow');
                }
            }
        }

    }

});
//=====create subjectfrom input field======//



$('body').on('click', '#removeappeedinput-tag', function(e) {

    var facultyId = $(this).data('id');
    $('#pros-addappendedtag' + facultyId).remove(); // Remove the parent element (including spaces)

});



// remove input appended subject
$('body').on('click', '#removeappeedinput-tag-subject', function(e) {

    var facultyId = $(this).data('id');

   
    $('#pros-addappendedtag-subject' + facultyId).remove(); // Remove the parent element (including spaces)
});
// remove input appended subject



$('body').on('click', '.pros-removefacultyall-classes', function(e) {

    var facultyId = $(this).data('faculty');
    $('.removeallappenclass' + facultyId).remove();

    $('.pros-removeclassaddennew' + facultyId).hide();

});





$('body').on('click', '.pros-removefacultyall-subject', function(e) {

    var facultyId = $(this).data('faculty');
    $('.removeallappensubject' + facultyId).remove();

    $('.pros-removesubjectaddennew' + facultyId).hide();

});



// CHECK IMPORTED CLASSES
$('body').on('click', '.pros-generalclassselectall-template-parent', function() {

    var temtitle = $(this).data('temtitle');

    var checkStatus = $('.pros-genetemplatecheckall' + temtitle).prop('checked');


    if (checkStatus == true) {

        $(".pros-templatecheckgen" + temtitle).prop('checked', true);

    } else if (checkStatus == false) {
        $(".pros-templatecheckgen" + temtitle).prop('checked', false);
    }

});


// CHECK IMPORTED SUBJECT
$('body').on('click', '.pros-generalsubjectelectall-template-parent', function() {

    var temtitle = $(this).data('temtitle');

    var checkStatus = $('.pros-genetemplatecheckallsubject' + temtitle).prop('checked');

    if (checkStatus == true) {

        $(".pros-templatecheckgensubject" + temtitle).prop('checked', true);

    } else if (checkStatus == false) {
        $(".pros-templatecheckgensubject" + temtitle).prop('checked', false);
    }

});




// CHECK IMPORTED CLASSES BY TITLE CLICK

$('body').on('click', '.pros-selectalllclassesjusttitle', function() {

    var temtitle = $(this).data('temtitle');

    var verycheck = $('.pros-genetemplatecheckall' + temtitle).prop('checked', !$('.pros-genetemplatecheckall' +
        temtitle).prop('checked'));

    var checkStatus = $('.pros-genetemplatecheckall' + temtitle).prop('checked');

    if (checkStatus == true) {
        $(".pros-templatecheckgen" + temtitle).prop('checked', true);
    } else if (checkStatus == false) {
        $(".pros-templatecheckgen" + temtitle).prop('checked', false);
    }


});



// CHECK IMPORTED SUBJECT BY TITLE CLICK

$('body').on('click', '.pros-selectalllsubjectjusttitle', function() {

    var temtitle = $(this).data('temtitle');

    var verycheck = $('.pros-genetemplatecheckallsubject' + temtitle).prop('checked', !$(
        '.pros-genetemplatecheckallsubject' + temtitle).prop('checked'));


    var checkStatus = $('.pros-genetemplatecheckallsubject' + temtitle).prop('checked');

    if (checkStatus == true) {

        $(".pros-templatecheckgensubject" + temtitle).prop('checked', true);

    } else if (checkStatus == false) {

        $(".pros-templatecheckgensubject" + temtitle).prop('checked', false);
    }


});




// store imported faculty ID 
$('body').on('click', '.generalimportclassbtn', function() {
    var temtitle = $(this).data('facutly');
    $('#pros-displayfacutyclasstemplateimportedvalue').val(temtitle);

});
// store imported faculty ID 


// store imported class ID 

$('body').on('click', '.generalimportsubjectbtnsubject', function() {
    var temtitle = $(this).data('facutly');
    $('#pros-displayclassinputval').val(temtitle);
});
// store imported class ID 




$('body').on('click', '.pros-generalclass-import-bnt', function() {


    var defaulclass = $(".prospergenecheckimportclasse:checked").val();

    if (defaulclass === undefined) {
        $.wnoty({
            type: 'warning',
            message: "Hey!! choose classes to be imported.",
            autohideDelay: 5000
        });

    } else {
        var facunaewid = $('#pros-displayfacutyclasstemplateimportedvalue').val();
        var classname = [];

        //collect value checked
        $('.prospergenecheckimportclasse:checked').each(function() {
            var valueclass = $(this).val();
            if (valueclass.trim() !== '') {
                classname.push($(this).val());
            }
        });
        //collect value checked


        for (var i = 0; i < classname.length; i++) {

            var valueClassgotten = classname[i];
            var valuesArray = valueClassgotten.split(',');

            for (var j = 0; j < valuesArray.length; j++) {

                var trimmedValue = valuesArray[j];

                if (trimmedValue == '') {


                } else {
                    var spanTag = $('<button>', {
                        'type': 'button',
                        'class': 'removeallappenclass' + facunaewid +
                            ' btn btn-sm mt-2 pros-generalclasssubmitval',
                        'style': 'background-color:#fcfeff;border-radius:10px;color:#434445;border:1px solid #007bff;font-weight:520;font-size:12px;',
                        'html': '<i class="fa fa-times" id="removeappeedinput-tag"  data-id="' + i +
                            facunaewid + '"></i>  ' + trimmedValue,
                        'id': 'pros-addappendedtag' + i + facunaewid,
                        'value': trimmedValue,
                        'data-faculty': facunaewid

                    });




                    $('.displaytagappend' + facunaewid).append(spanTag).append('&nbsp;&nbsp;&nbsp;');

                    $('#pros-loadclasstemplate-modal').modal('hide');

                    $('.pros-removeclassaddennew' + facunaewid).fadeIn('slow');

                    // Store the button in Local Storage
                    localStorage.setItem('myButton', spanTag.prop('outerHTML'));

                }

            }
        }
    }

});





$('body').on('click', '.pros-generalsubject-import-bnt', function() { // add importe subject
    var defaultsubject = $(".genaeralsubjectslectevery:checked").val();

    if (defaultsubject === undefined) {
        $.wnoty({
            type: 'warning',
            message: "Hey!! choose classes to be imported.",
            autohideDelay: 5000
        });

    } else {
        var classid = $('#pros-displayclassinputval').val();
        var subjectname = [];

        //collect value checked
        $('.genaeralsubjectslectevery:checked').each(function() {
            var subjectnameval = $(this).val();
            if (subjectnameval.trim() !== '') {
                subjectname.push($(this).val());


            }
        });


        for (var i = 0; i < subjectname.length; i++) {

            var valueClassgotten = subjectname[i];
            var valuesArray = valueClassgotten.split(',');

            for (var j = 0; j < valuesArray.length; j++) {

                var trimmedValue = valuesArray[j];



                if (trimmedValue == '') {


                } else {
                    var spanTag = $('<button>', {
                        'type': 'button',
                        'class': 'removeallappensubject' + classid +
                            ' btn btn-sm mt-2 pros-generalsubjectsubmitval',
                        'style': 'background-color:#fcfeff;border-radius:10px;color:#434445;border:1px solid #007bff;font-weight:520;font-size:12px;',
                        'html': '<i class="fa fa-times" id="removeappeedinput-tag-subject"  data-id="' +
                            i + classid + '"></i>  ' + trimmedValue,
                        'id': 'pros-addappendedtag-subject' + i + classid,
                        'value': trimmedValue,
                        'data-class': classid

                    });

                    $('.displaytagappendsubject' + classid).append(spanTag).append('&nbsp;&nbsp;&nbsp;');

                    $('#pros-loadsubjectemplate-modal').modal('hide');

                    $('.pros-removesubjectaddennew' + classid).fadeIn('slow');



                }

            }
        }


    }

    //collect value checked
});


// when click on name instead of check box classes


$('body').on('click', '.pros-selectclasschildreen', function() {
    // Get the associated checkbox's ID
    var checkboxId = $(this).data('class');
    var classsarrid = $(this).data('id');

    if ($('.classnamechildren' + checkboxId + ':checked').length == $('.classnamechildren' + checkboxId)
        .length) {
        $(".pros-genetemplatecheckall" + classsarrid).prop('checked', !$('.pros-genetemplatecheckall' +
            classsarrid).prop('checked'));
        // Toggle the checkbox's checked state
        $('.classnamechildren' + checkboxId).prop('checked', !$('.classnamechildren' + checkboxId).prop(
            'checked'));
    } else {

        $(".pros-genetemplatecheckall" + classsarrid).prop('checked', !$('.pros-genetemplatecheckall' +
            classsarrid).prop('checked'));
        // Toggle the checkbox's checked state
        $('.classnamechildren' + checkboxId).prop('checked', !$('.classnamechildren' + checkboxId).prop(
            'checked'));
    }

});
// when click on name instead of check box classes



$('body').on('click', '.pros-generalsucheckselchec-body', function() {

    var checkboxId = $(this).data('subject');
    var classsarrid = $(this).data('id');

    var numcont = $('.pros-templatecheckgensubject' + classsarrid + ':checked').length;

    var verifychc = $('.subjectnamechildrennewcheck' + checkboxId).prop('checked');



    if ($('.pros-templatecheckgensubject' + classsarrid + ':checked').length == $(
            '.pros-templatecheckgensubject' + classsarrid).length) {
        $('.pros-templatecheckgensubject' + classsarrid + ':checked', true)

        if (verifychc === false) {

            $(".subjectnamechildrennewcheck" + checkboxId).prop('checked', true);
        } else {

            $(".subjectnamechildrennewcheck" + checkboxId).prop('checked', false);
        }

    } else {
        if (verifychc === false) {

            $(".subjectnamechildrennewcheck" + checkboxId).prop('checked', true);
        } else {

            $(".subjectnamechildrennewcheck" + checkboxId).prop('checked', false);
        }
    }





});




$('body').on('change', '.prospergenecheckimportclasse', function() {
    // when click on name instead of check box 
    var checkboxId = $(this).data('class');

    var classsarrid = $(this).data('id');

    if ($('.classnamechildren' + checkboxId + ':checked').length == $('.classnamechildren' + checkboxId)
        .length) {
        $(".pros-genetemplatecheckall" + classsarrid).prop('checked', !$('.pros-genetemplatecheckall' +
            classsarrid).prop('checked'));
    } else {
        $(".pros-genetemplatecheckall" + classsarrid).prop('checked', !$('.pros-genetemplatecheckall' +
            classsarrid).prop('checked'));
    }

});
// when click on name instead of check box 



//SUBMIT SUBJECT MERGE FINAL BTN
$('body').on('click', '#createmergesubject-setup-btn', function() {

    var tagstate = $(this).data('tag');
    var UserID = "<?php echo $UserID; ?>";
    var campusID = $(this).data('campus');
    var groupSchoolID = $(this).data('school');
    var ownerfirst_Name = "<?php echo $PrimaryName; ?>";
    var maintagstate = $(this).data('maintag');




    $(this).html(
        '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>creating...'
    );



    var subjectmergename = $(".pros-generalmergesubject:checked").val();

    var mergetitle_verify = $(".genesubjectnameinputmerge").val();



    if (subjectmergename === undefined) {

        var checksubjectverify = 'notfound';

    } else {
        var checksubjectverify = 'found';
    }



    var subjectID = [];
    var classID = [];
    var mergetitlename = [];

    $('.pros-generalmergesubject:checked').each(function() {
        var valuesubject = $(this).val();

        if (valuesubject.trim() !== '') {
            subjectID.push($(this).val());

        }
    });


    $('.genesubjectnameinputmerge').each(function() {
        var titlename = $(this).val();

        if (titlename.trim() !== '') {
            mergetitlename.push($(this).val());
            classID.push($(this).data('id'));
        }
    });

    subjectID = subjectID.toString();
    classID = classID.toString();
    mergetitlename = mergetitlename.toString();



    $.ajax({
        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/mergesubject-title.php",
        data: {
            tagstate: tagstate,
            UserID: UserID,
            campusID: campusID,
            mergetitlename: mergetitlename,
            classID: classID,
            subjectID: subjectID,
            checksubjectverify: checksubjectverify
        },
        success: function(result) {

            $('#createmergesubject-setup-btn').html('Next');

            $('#mergesubjectcontent').animate({
                left: '+=50',
                height: 'toggle'
            }, 1000);

            $('#pros-assign-formteachercontent').fadeIn('slow');



            // load setup content

            $('#pros-displaysetup-content').html(
                '<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>'
                );

            $.ajax({

                type: "POST",
                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/loadsetup-modal.php",
                data: {
                    UserID: UserID,
                    ownerfirst_Name: ownerfirst_Name,
                    tagstate: tagstate,
                    groupSchoolID: groupSchoolID,
                    CampusID: campusID
                },
                success: function(result) {

                    $('#pros-displaysetup-content').html(result);


                    var head_phones = [];
                        document.querySelectorAll('.pros-headnumset').forEach(function (input) {
                            head_phones.push(window.intlTelInput(input, {
                                separateDialCode: true,
                                preferredCountries: ["ng"],
                                hiddenInput: "full",
                                utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                            }));
                        });

                

                        var head_phone = [];
                        document.querySelectorAll('.pros-teachernumset').forEach(function (input) {
                            head_phone.push(window.intlTelInput(input, {
                                separateDialCode: true,
                                preferredCountries: ["ng"],
                                hiddenInput: "full",
                                utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                            }));
                        }); 

                    // var head_phone = window.intlTelInput(document.querySelector(
                    //     "#pros-adminnumset"), {
                    //     separateDialCode: true,
                    //     preferredCountries: ["ng"],
                    //     hiddenInput: "full",
                    //     utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                    // });


                    var tagstatusnew = tagstate;

                    $('#prosloadschoolid-forbackward').val(campusID);


                    if (maintagstate == '29' && tagstatusnew == '') {

                        $('#pros-reducemodalclasstypesetup').css('width', '700px');
                        //if campus havent't started setiing up it should start from the begginning
                        $('#pros-loadimportoption').fadeIn('slow');

                    } else {



                                          if (tagstatusnew == '' || tagstatusnew == '15') {
                                                $('#displaysection-content').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');

                                            } else if (tagstatusnew == '16') {

                                                $('#pros-displayhead-setup').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(15);



                                            } else if (tagstatusnew == '17') {

                                                $('#assignschoolheadfaculty  ').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(16);

                                            } else if (tagstatusnew == '18') {
                                                $('#proscreateschool-teacher').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(17);

                                            } else if (tagstatusnew == '19') {
                                                $('#createotherschooltype-setup').fadeIn('slow');

                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(18);

                                            } else if (tagstatusnew == '20') {

                                                $('#pros-reducemodalclasstypesetup').css('width', '700px');

                                                $('#createwelcomemsg-setup').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(19);


                                            } else if (tagstatusnew == '21') {

                                                $('#createclasses-setup ').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(20);

                                                // $('#pros-reducemodalclasstypesetup').addClass('modal-xl');

                                            } else if (tagstatusnew == '22') {

                                                $('#createsubject-setup').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(21);

                                            } else if (tagstatusnew == '23') {

                                                $('#mergesubjectcontent').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(22);


                                            } else if (tagstatusnew == '24') {

                                                $('#pros-assign-formteachercontent').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(23);

                                            } else if (tagstatusnew == '25') {

                                                $('#assignsubject-teachercontainer').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(24);

                                            } else if (tagstatusnew == '26') {

                                                $('#pros-loadsession-termcontent').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(25);

                                            } else if (tagstatusnew == '27') {

                                                $('#pros-schlogo-content').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(26);

                                            }else if(tagstatusnew == '28')
                                            {
                                                $('#prosschool-bgimage-content').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(27);


                                            }else if(tagstatusnew == '29')
                                            {

                                                            //setup completed
                                            
                                            }

                    }




                    const selectBtnnewclass = document.querySelector(
                            ".getclassopenondocument-ready1"),
                        itemsclass = document.querySelectorAll(".listmeslist");
                    selectBtnnewclass.classList.toggle("open");


                    const selectBtnnewsubject = document.querySelector(
                            ".getsubjectopenondocument-ready1"),
                        itemssubject = document.querySelectorAll(".subjectlistmeslist");
                    selectBtnnewsubject.classList.toggle("open");



                  

                }
            });
            // load setup content


        }
    });
});
//SUBMIT SUBJECT MERGE FINAL BTN



// assign form teacher here
$('body').on('click', '#assignformteacher-setup-btn', function() {
    $(this).html(
        '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>creating...'
    );

    var tagstate = $(this).data('tag');
    var UserID = "<?php echo $UserID; ?>";
    var campusID = $(this).data('campus');
    var groupSchoolID = $(this).data('school');
    var ownerfirst_Name = "<?php echo $PrimaryName; ?>";

    var maintagstate = $(this).data('maintag');



    var fortteacherchecked = [];
    var ClassID = [];

    var check_formteacher_selected = $(".pro-generalclassassign-formteacher:checked").val();

    $('.pro-generalclassassign-formteacher:checked').each(function() {
        fortteacherchecked.push($(this).val());
        ClassID.push($(this).data('faculty'));
    });

    fortteacherchecked = fortteacherchecked.toString();
    ClassID = ClassID.toString();



    if (check_formteacher_selected === undefined) {
        $.wnoty({
            type: 'warning',
            message: "select a teacher to be assigned to a class.",
            autohideDelay: 5000
        });
        $('#assignformteacher-setup-btn').html('Assign now');
    } else {

        $.ajax({
            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/assignformteacher-section.php",
            data: {
                ClassID: ClassID,
                fortteacherchecked: fortteacherchecked,
                UserID: UserID,
                tagstate: tagstate,
                campusID: campusID
            },
            success: function(result) {

                $('#assignformteacher-setup-btn').html('Assign now');



                $('#pros-assign-formteachercontent').animate({
                    left: '+=50',
                    height: 'toggle'
                }, 1000);

                $('#assignsubject-teachercontainer').fadeIn('slow');


                // load setup content

                $('#pros-displaysetup-content').html(
                    '<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>'
                    );

                $.ajax({
                    type: "POST",
                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/loadsetup-modal.php",
                    data: {
                        UserID: UserID,
                        ownerfirst_Name: ownerfirst_Name,
                        tagstate: tagstate,
                        groupSchoolID: groupSchoolID,
                        CampusID: campusID
                    },
                    success: function(result) {

                        $('#pros-displaysetup-content').html(result);


                        
                            var head_phones = [];
                                    document.querySelectorAll('.pros-headnumset').forEach(function (input) {
                                        head_phones.push(window.intlTelInput(input, {
                                            separateDialCode: true,
                                            preferredCountries: ["ng"],
                                            hiddenInput: "full",
                                            utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                        }));
                                    });

                            

                                  var head_phone = [];
                                    document.querySelectorAll('.pros-teachernumset').forEach(function (input) {
                                        head_phone.push(window.intlTelInput(input, {
                                            separateDialCode: true,
                                            preferredCountries: ["ng"],
                                            hiddenInput: "full",
                                            utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                        }));
                                    }); 

                                // var head_phone = window.intlTelInput(document.querySelector(
                                //     "#pros-adminnumset"), {
                                //     separateDialCode: true,
                                //     preferredCountries: ["ng"],
                                //     hiddenInput: "full",
                                //     utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                // });


                        var tagstatusnew = tagstate;

                        $('#prosloadschoolid-forbackward').val(campusID);


                        if (maintagstate == '29' && tagstatusnew == '') {

                            $('#pros-reducemodalclasstypesetup').css('width', '700px');
                            //if campus havent't started setiing up it should start from the begginning
                            $('#pros-loadimportoption').fadeIn('slow');

                        } else {



                            if (tagstatusnew == '' || tagstatusnew == '15') {
                                                $('#displaysection-content').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');

                                            } else if (tagstatusnew == '16') {

                                                $('#pros-displayhead-setup').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(15);



                                            } else if (tagstatusnew == '17') {

                                                $('#assignschoolheadfaculty  ').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(16);

                                            } else if (tagstatusnew == '18') {
                                                $('#proscreateschool-teacher').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(17);

                                            } else if (tagstatusnew == '19') {
                                                $('#createotherschooltype-setup').fadeIn('slow');

                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(18);

                                            } else if (tagstatusnew == '20') {

                                                $('#pros-reducemodalclasstypesetup').css('width', '700px');

                                                $('#createwelcomemsg-setup').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(19);


                                            } else if (tagstatusnew == '21') {

                                                $('#createclasses-setup ').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(20);

                                                // $('#pros-reducemodalclasstypesetup').addClass('modal-xl');

                                            } else if (tagstatusnew == '22') {

                                                $('#createsubject-setup').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(21);

                                            } else if (tagstatusnew == '23') {

                                                $('#mergesubjectcontent').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(22);


                                            } else if (tagstatusnew == '24') {

                                                $('#pros-assign-formteachercontent').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(23);

                                            } else if (tagstatusnew == '25') {

                                                $('#assignsubject-teachercontainer').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(24);

                                            } else if (tagstatusnew == '26') {

                                                $('#pros-loadsession-termcontent').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(25);

                                            } else if (tagstatusnew == '27') {

                                                $('#pros-schlogo-content').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(26);

                                            }else if(tagstatusnew == '28')
                                            {
                                                $('#prosschool-bgimage-content').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(27);


                                            }else if(tagstatusnew == '29')
                                            {

                                                            //setup completed
                                            
                                            }

                        }



                        const selectBtnnewclass = document.querySelector(
                                ".getclassopenondocument-ready1"),
                            itemsclass = document.querySelectorAll(".listmeslist");
                        selectBtnnewclass.classList.toggle("open");


                        const selectBtnnewsubject = document.querySelector(
                                ".getsubjectopenondocument-ready1"),
                            itemssubject = document.querySelectorAll(
                                ".subjectlistmeslist");
                        selectBtnnewsubject.classList.toggle("open");



                       

                    }
                });



                // load setup content


            }

        });
    }


});
// assign form teacher here




$('body').on('click', '.generalbnmergesub-btn', function() {
    $(this).html(
        '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>merging...'
    );

    var tagstate = $(this).data('tag');
    var UserID = "<?php echo $UserID; ?>";
    var campusID = $(this).data('school');
    var maintagstate = $(this).data('maintag');
    var gottenedid = $(this).data('id');

    var groupSchoolID = $(this).data('group');
    var ownerfirst_Name = "<?php echo $PrimaryName; ?>";

    var subjectcheckformarge = [];


    var checkgenralinputmerge = $(".pros-generalinputmerge" + gottenedid).val();
    var ClassID = $(".pros-generalinputmerge" + gottenedid).data('id');

    $('.pros-mergerbyclass' + gottenedid + ':checked').each(function() {
        var subjectmergeid = $(this).val();
        subjectcheckformarge.push($(this).val());
    });

    var lengthofmerge = subjectcheckformarge.length;


    if (subjectcheckformarge == '') {
        $.wnoty({
            type: 'warning',
            message: "Hey!! choose subjects to be merge",
            autohideDelay: 5000
        });
        $('.pros-individualmergerbtn' + gottenedid).html('Merge <i class="fa fa-compress"></i>');

    } else if (lengthofmerge < 2) {

        $.wnoty({
            type: 'warning',
            message: "Hey!! choose atleast two or more subject",
            autohideDelay: 5000
        });

        $('.pros-individualmergerbtn' + gottenedid).html('Merge <i class="fa fa-compress"></i>');



    } else if (checkgenralinputmerge == '') {
        $.wnoty({
            type: 'warning',
            message: "Kindly input a merge title",
            autohideDelay: 5000
        });
        $('.pros-individualmergerbtn' + gottenedid).html('Merge <i class="fa fa-compress"></i>');
    } else {



        subjectcheckformarge = subjectcheckformarge.toString();



        $.ajax({
            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/mergesubject-titlesonbording-single.php",
            data: {

                tagstate: tagstate,
                UserID: UserID,
                campusID: campusID,
                checkgenralinputmerge: checkgenralinputmerge,
                ClassID: ClassID,
                subjectID: subjectcheckformarge,
            },
            success: function(result) {

                $('.pros-individualmergerbtn' + gottenedid).html(
                    'Merge <i class="fa fa-compress"></i>');
                var userrole = (result);

                if (result == 'success') {

                    $.wnoty({
                        type: 'success',
                        message: "Great!! subject merge successfully.",
                        autohideDelay: 5000
                    });
                } else {

                }



                $('#pros-displaysetup-content').html(
                    '<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>'
                    );


                $.ajax({

                    type: "POST",
                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/loadsetup-modal.php",
                    data: {
                        UserID: UserID,
                        ownerfirst_Name: ownerfirst_Name,
                        tagstate: tagstate,
                        groupSchoolID: groupSchoolID,
                        CampusID: campusID
                    },
                    success: function(result) {

                        $('#pros-displaysetup-content').html(result);





                      
                             var head_phones = [];
                                    document.querySelectorAll('.pros-headnumset').forEach(function (input) {
                                        head_phones.push(window.intlTelInput(input, {
                                            separateDialCode: true,
                                            preferredCountries: ["ng"],
                                            hiddenInput: "full",
                                            utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                        }));
                                    });

                            

                                  var head_phone = [];
                                    document.querySelectorAll('.pros-teachernumset').forEach(function (input) {
                                        head_phone.push(window.intlTelInput(input, {
                                            separateDialCode: true,
                                            preferredCountries: ["ng"],
                                            hiddenInput: "full",
                                            utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                        }));
                                    }); 

                                // var head_phone = window.intlTelInput(document.querySelector(
                                //     "#pros-adminnumset"), {
                                //     separateDialCode: true,
                                //     preferredCountries: ["ng"],
                                //     hiddenInput: "full",
                                //     utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                // });


                         var tagstatusnew = tagstate;



                        $('#prosloadschoolid-forbackward').val(campusID);


                        if (maintagstate == '29' && tagstatusnew == '') {

                            $('#pros-reducemodalclasstypesetup').css('width', '700px');
                           
                            $('#pros-loadimportoption').fadeIn('slow');

                        } else {



                            if (tagstatusnew == '' || tagstatusnew == '15') {
                                                $('#displaysection-content').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');

                                            } else if (tagstatusnew == '16') {

                                                $('#pros-displayhead-setup').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(15);



                                            } else if (tagstatusnew == '17') {

                                                $('#assignschoolheadfaculty  ').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(16);

                                            } else if (tagstatusnew == '18') {
                                                $('#proscreateschool-teacher').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(17);

                                            } else if (tagstatusnew == '19') {
                                                $('#createotherschooltype-setup').fadeIn('slow');

                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(18);

                                            } else if (tagstatusnew == '20') {

                                                $('#pros-reducemodalclasstypesetup').css('width', '700px');

                                                $('#createwelcomemsg-setup').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(19);


                                            } else if (tagstatusnew == '21') {

                                                $('#createclasses-setup ').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(20);

                                                // $('#pros-reducemodalclasstypesetup').addClass('modal-xl');

                                            } else if (tagstatusnew == '22') {

                                                $('#createsubject-setup').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(21);

                                            } else if (tagstatusnew == '23') {

                                                $('#mergesubjectcontent').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(22);


                                            } else if (tagstatusnew == '24') {

                                                $('#pros-assign-formteachercontent').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(23);

                                            } else if (tagstatusnew == '25') {

                                                $('#assignsubject-teachercontainer').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(24);

                                            } else if (tagstatusnew == '26') {

                                                $('#pros-loadsession-termcontent').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(25);

                                            } else if (tagstatusnew == '27') {

                                                $('#pros-schlogo-content').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(26);

                                            }else if(tagstatusnew == '28')
                                            {
                                                $('#prosschool-bgimage-content').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(27);


                                            }else if(tagstatusnew == '29')
                                            {

                                                            //setup completed
                                            
                                            }

                        }



                        const selectBtnnewsubject = document.querySelector(
                                ".getsubjectopenondocument-ready1"),
                            itemssubject = document.querySelectorAll(
                                ".subjectlistmeslist");
                        selectBtnnewsubject.classList.toggle("open");






                        //merging of subject dropdown 



                        const selectBtnmerge = document.querySelector(
                                ".pros-opensubjectwhenclickmerge" +
                                ClassID),
                            itemsmerge = document.querySelectorAll(
                                ".subjectlistmeslistmerge");

                        // Toggle the "open" subject when the selectBtn is clicked
                        selectBtnmerge.classList.toggle("open");

                        //merging of subject dropdown 








                    }
                });


            }
        });
    }
});




$('body').on('click', '.remove-linkmergegenehovrbtn', function() {

    var mergerid = $(this).data('id');
    var classID = $(this).data('class');
    var UserID = "<?php echo $UserID; ?>";
    var campusID = $(this).data('campus');
    var groupSchoolID = $(this).data('group');
    var ownerfirst_Name = "<?php echo $PrimaryName; ?>";
    var tagstate = $(this).data('tag');
    var maintagstate = $(this).data('maintag');

    $.ajax({
        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/deletemerge-titlesetup.php",
        data: {
            mergerid: mergerid,
            UserID: UserID,
            campusID: campusID,
            classID: classID
        },
        success: function(result) {

            $.wnoty({
                type: 'success',
                message: "Great!! merge title deleted successfully.",
                autohideDelay: 5000
            });


            //loads  set content  

            $('#pros-displaysetup-content').html(
                '<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>'
                );


            $.ajax({

                type: "POST",
                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/loadsetup-modal.php",
                data: {
                    UserID: UserID,
                    ownerfirst_Name: ownerfirst_Name,
                    tagstate: tagstate,
                    groupSchoolID: groupSchoolID,
                    CampusID: campusID
                },
                success: function(result) {

                    $('#pros-displaysetup-content').html(result);



                    
                    var head_phones = [];
                        document.querySelectorAll('.pros-headnumset').forEach(function (input) {
                            head_phones.push(window.intlTelInput(input, {
                                separateDialCode: true,
                                preferredCountries: ["ng"],
                                hiddenInput: "full",
                                utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                            }));
                        });

                

                        var head_phone = [];
                        document.querySelectorAll('.pros-teachernumset').forEach(function (input) {
                            head_phone.push(window.intlTelInput(input, {
                                separateDialCode: true,
                                preferredCountries: ["ng"],
                                hiddenInput: "full",
                                utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                            }));
                        }); 

                        // var head_phone = window.intlTelInput(document.querySelector(
                        //     "#pros-adminnumset"), {
                        //     separateDialCode: true,
                        //     preferredCountries: ["ng"],
                        //     hiddenInput: "full",
                        //     utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                        // });


                      var tagstatusnew = tagstate;



                    $('#prosloadschoolid-forbackward').val(campusID);


                    if (maintagstate == '29' && tagstatusnew == '') {

                        $('#pros-reducemodalclasstypesetup').css('width', '700px');
                        //if campus havent't started setiing up it should start from the begginning
                        $('#pros-loadimportoption').fadeIn('slow');

                    } else {



                        if (tagstatusnew == '' || tagstatusnew == '15') {
                                                $('#displaysection-content').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');

                                            } else if (tagstatusnew == '16') {

                                                $('#pros-displayhead-setup').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(15);



                                            } else if (tagstatusnew == '17') {

                                                $('#assignschoolheadfaculty  ').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(16);

                                            } else if (tagstatusnew == '18') {
                                                $('#proscreateschool-teacher').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(17);

                                            } else if (tagstatusnew == '19') {
                                                $('#createotherschooltype-setup').fadeIn('slow');

                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(18);

                                            } else if (tagstatusnew == '20') {

                                                $('#pros-reducemodalclasstypesetup').css('width', '700px');

                                                $('#createwelcomemsg-setup').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(19);


                                            } else if (tagstatusnew == '21') {

                                                $('#createclasses-setup ').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(20);

                                                // $('#pros-reducemodalclasstypesetup').addClass('modal-xl');

                                            } else if (tagstatusnew == '22') {

                                                $('#createsubject-setup').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(21);

                                            } else if (tagstatusnew == '23') {

                                                $('#mergesubjectcontent').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(22);


                                            } else if (tagstatusnew == '24') {

                                                $('#pros-assign-formteachercontent').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(23);

                                            } else if (tagstatusnew == '25') {

                                                $('#assignsubject-teachercontainer').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(24);

                                            } else if (tagstatusnew == '26') {

                                                $('#pros-loadsession-termcontent').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(25);

                                            } else if (tagstatusnew == '27') {

                                                $('#pros-schlogo-content').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(26);

                                            }else if(tagstatusnew == '28')
                                            {
                                                $('#prosschool-bgimage-content').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(27);


                                            }else if(tagstatusnew == '29')
                                            {

                                                            //setup completed
                                            
                                            }

                    }





                    const selectBtnnewsubject = document.querySelector(
                            ".getsubjectopenondocument-ready1"),
                        itemssubject = document.querySelectorAll(".subjectlistmeslist");
                    selectBtnnewsubject.classList.toggle("open");





                  






                    const selectBtnmerge = document.querySelector(
                            ".pros-opensubjectwhenclickmerge" +
                            classID),
                        itemsmerge = document.querySelectorAll(
                            ".subjectlistmeslistmerge");

                    // Toggle the "open" subject when the selectBtn is clicked
                    selectBtnmerge.classList.toggle("open");

                    //merging of subject dropdown 

                }
            });

            //loads  set content 

        }

    });

});


$('body').on('click', '.pros-generalsubjectteacher', function() {

    var facultyid = $(this).data('id');


    const selectBtn = document.querySelector(
            ".pros-subjectteacher-open" + facultyid),
        items = document.querySelectorAll(".prosgenerallist-subjectteach");
    selectBtn.classList.toggle("open");
});


$('body').on('mouseover', '.pros-hovermergesub', function() {
    var mergeclaname = $(this).data('id');
    var popup = document.querySelector(".pros-popmeup" + mergeclaname);
    popup.classList.toggle("show");

});


$('body').on('click', '.pros-select-btn-new', function() {
    var mergeclaname_sub = $(this).data('id');


    $('.pros-opensubject-teacher' + mergeclaname_sub).slideToggle();
});



// search subject teache
$('body').on('keyup', '.pros-search-input', function() {
    var mergeclaname_sub = $(this).data('id');
    // Clear previous search results
    $('.pros-optiongoteenserch' + mergeclaname_sub).hide();

    // Get the search query
    var searchQuery = $(this).val().toLowerCase();

    // Perform the search
    if (searchQuery.length > 0) {

        var matchFound = false; // Flag to track if a match is found
       
        // Iterate through the options and show/hide based on the search query
        $('.pros-optiongoteenserch' + mergeclaname_sub).each(function() {

            var optionText = $(this).find('.pros-optiongoteenserch-text' + mergeclaname_sub).text()
                .toLowerCase();
            if (optionText.indexOf(searchQuery) !== -1) {
                $(this).show();
                matchFound = true; // Set the flag to true if a match is found
            }
        });

        if (!matchFound) {
            // Display a "No results found" message or perform any other action
            $('.noresultfound' + mergeclaname_sub).show();
        } else {
            // Hide the "No results found" message if there were previous results
            $('.noresultfound' + mergeclaname_sub).hide();
        }

    } else {
        // If the search query is empty, show all options
        $('.pros-optiongoteenserch' + mergeclaname_sub).show();
        $('.noresultfound' + mergeclaname_sub).hide();
    }

});
// search subject teacher


//merging of subject dropdown 
$('body').on('click', '.createsubjectgeneralmerge', function() {
    var facultyid = $(this).data('faculty');

    const selectBtn = document.querySelector(
            ".pros-opensubjectwhenclickmerge" +
            facultyid),
        itemsmerge = document.querySelectorAll(
            ".subjectlistmeslistmerge");

    // Toggle the "open" subject when the selectBtn is clicked
    selectBtn.classList.toggle("open");
});







// assign single subject to teacher here


$('body').on('click', '.prosoptionsingle', function() {

    var valuegotten = $(this).data('id');
    var classID = $(this).data('class');
    var staffID = $(this).data('staff');
    var campusID = $(this).data('cam');
    var subjecID = $(this).data('subject');
    var UserID = "<?php echo $UserID; ?>";
    var tagstate = $(this).data('tag');
    var ownerfirst_Name = "<?php echo $PrimaryName; ?>";

    var selectedOption = $(this).find('.pros-optiongoteenserch-text' + valuegotten).text();
    $('.pros-displayselectedval-teacher' + valuegotten).html(selectedOption);
    $('.pros-opensubject-teacher' + valuegotten).slideUp();

    subjecID = subjecID.toString();

    $.ajax({

        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/assignsubjectteacher-setup.php",
        data: {
            UserID: UserID,
            classID: classID,
            campusID: campusID,
            subjecID: subjecID,
            staffID: staffID
        },
        success: function(feedback) {


            var pros_output = (feedback);


            if (pros_output === 'success') {

                $.wnoty({
                    type: 'success',
                    message: "Great!! subject teacher assigned   successfully",
                    autohideDelay: 5000
                });


            }



        }
    });



}); // assign single subject to teacher here

// assign all subject to teacher here
$('body').on('click', '.pros-clickselectallteacher', function() {

    var valuegotten = $(this).data('id');
    var classID = $(this).data('class');
    var staffID = $(this).data('staff');
    var campusID = $(this).data('cam');
    var selectedOption = $(this).find('.pros-optiongoteenserch-text' + valuegotten).text();
    var UserID = "<?php echo $UserID; ?>";

    var groupSchoolID = $(this).data('group');
    var ownerfirst_Name = "<?php echo $PrimaryName; ?>";
    var tagstate = $(this).data('tag');

    $('.pros-opensubject-teacher' + valuegotten).slideUp();



    $('.pros-displayallstaffselected' + classID).html(selectedOption);


    var subjecID = [];
    $('.pros-displayallstaffselected' + classID).each(function() {
        subjecID.push($(this).data('subject'));
    });


    subjecID = subjecID.toString();





    $.ajax({

        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/assignsubjectteacher-setup.php",
        data: {
            UserID: UserID,
            classID: classID,
            campusID: campusID,
            subjecID: subjecID,
            staffID: staffID
        },
        success: function(feedback) {


            var pros_output = (feedback);

            if (pros_output === 'success') {

                $.wnoty({
                    type: 'success',
                    message: "Great!! subject teacher assigned   successfully",
                    autohideDelay: 5000
                });


            }



        }
    });


});
// assign all subject to teacher here


// assign form teacher here
$('body').on('click', '#pros-assignsubject-proceedbtn', function() {
    $(this).html(
        '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>creating...'
    );
    var tagstate = $(this).data('tag');
    var UserID = "<?php echo $UserID; ?>";
    var campusID = $(this).data('campus');
    var groupSchoolID = $(this).data('school');
    var ownerfirst_Name = "<?php echo $PrimaryName; ?>";

    var maintagstate = $(this).data('maintag');



    var veryteacherset = [];

    $('.pros-selectallteacherset').each(function() {
        veryteacherset.push($(this).text());
    });

    var allAreSelectStaff = veryteacherset.every(function(text) {
        return text.trim() === 'Select  teacher';
    });

    if (allAreSelectStaff) {


        $.wnoty({
            type: 'warning',
            message: "Hey!! seems no subject teacher has been assigned yet.",
            autohideDelay: 5000
        });

        $('#pros-assignsubject-proceedbtn').html('Proceed');

    } else {




        $.ajax({

            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/updatesetup-backwardtag.php",
            data: {
                getback_wardbtn: tagstate,
                UserID: UserID,
                campusID: campusID
            },
            success: function(result) {
                $('#pros-assignsubject-proceedbtn').html('Proceed');

                $('#assignsubject-teachercontainer').animate({
                    left: '+=50',
                    height: 'toggle'
                }, 1000);

                $('#pros-loadsession-termcontent').fadeIn('slow');


                // load setup content here
                $('#pros-displaysetup-content').html(
                    '<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>'
                    );

                $.ajax({

                    type: "POST",
                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/loadsetup-modal.php",
                    data: {
                        UserID: UserID,
                        ownerfirst_Name: ownerfirst_Name,
                        tagstate: tagstate,
                        groupSchoolID: groupSchoolID,
                        CampusID: campusID
                    },
                    success: function(result) {

                        $('#pros-displaysetup-content').html(result);


                       
                        var head_phones = [];
                            document.querySelectorAll('.pros-headnumset').forEach(function (input) {
                                head_phones.push(window.intlTelInput(input, {
                                    separateDialCode: true,
                                    preferredCountries: ["ng"],
                                    hiddenInput: "full",
                                    utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                }));
                            });

                    

                            var head_phone = [];
                            document.querySelectorAll('.pros-teachernumset').forEach(function (input) {
                                head_phone.push(window.intlTelInput(input, {
                                    separateDialCode: true,
                                    preferredCountries: ["ng"],
                                    hiddenInput: "full",
                                    utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                }));
                            }); 

                        // var head_phone = window.intlTelInput(document.querySelector(
                        //     "#pros-adminnumset"), {
                        //     separateDialCode: true,
                        //     preferredCountries: ["ng"],
                        //     hiddenInput: "full",
                        //     utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                        // });


                        var tagstatusnew = tagstate;

                        $('#prosloadschoolid-forbackward').val(campusID);


                        if (maintagstate == '29' && tagstatusnew == '') {

                            $('#pros-reducemodalclasstypesetup').css('width', '700px');
                            //if campus havent't started setiing up it should start from the begginning
                            $('#pros-loadimportoption').fadeIn('slow');

                        } else {



                            if (tagstatusnew == '' || tagstatusnew == '15') {
                                                $('#displaysection-content').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');

                                            } else if (tagstatusnew == '16') {

                                                $('#pros-displayhead-setup').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(15);



                                            } else if (tagstatusnew == '17') {

                                                $('#assignschoolheadfaculty  ').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(16);

                                            } else if (tagstatusnew == '18') {
                                                $('#proscreateschool-teacher').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(17);

                                            } else if (tagstatusnew == '19') {
                                                $('#createotherschooltype-setup').fadeIn('slow');

                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(18);

                                            } else if (tagstatusnew == '20') {

                                                $('#pros-reducemodalclasstypesetup').css('width', '700px');

                                                $('#createwelcomemsg-setup').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(19);


                                            } else if (tagstatusnew == '21') {

                                                $('#createclasses-setup ').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(20);

                                                // $('#pros-reducemodalclasstypesetup').addClass('modal-xl');

                                            } else if (tagstatusnew == '22') {

                                                $('#createsubject-setup').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(21);

                                            } else if (tagstatusnew == '23') {

                                                $('#mergesubjectcontent').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(22);


                                            } else if (tagstatusnew == '24') {

                                                $('#pros-assign-formteachercontent').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(23);

                                            } else if (tagstatusnew == '25') {

                                                $('#assignsubject-teachercontainer').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(24);

                                            } else if (tagstatusnew == '26') {

                                                $('#pros-loadsession-termcontent').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(25);

                                            } else if (tagstatusnew == '27') {

                                                $('#pros-schlogo-content').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(26);

                                            }else if(tagstatusnew == '28')
                                            {
                                                $('#prosschool-bgimage-content').fadeIn('slow');
                                                $('#movebackbtn-setup').fadeIn('slow');
                                                $('#pros-displaybackvalue-tag').val(27);


                                            }else if(tagstatusnew == '29')
                                            {

                                                            //setup completed
                                            
                                            }

                        }





                        const selectBtnnewclass = document.querySelector(
                                ".getclassopenondocument-ready1"),
                            itemsclass = document.querySelectorAll(".listmeslist");
                        selectBtnnewclass.classList.toggle("open");


                        const selectBtnnewsubject = document.querySelector(
                                ".getsubjectopenondocument-ready1"),
                            itemssubject = document.querySelectorAll(
                                ".subjectlistmeslist");
                        selectBtnnewsubject.classList.toggle("open");



                       
                    }
                });

                // load setup content here



            }
        });





    }

});
// assign form teacher here





//submit logo button final here
$('body').on('click', '#pros-create-logo', function() {




    var getback_wardbtn = $(this).data('tag');
    var CampusID = $(this).data('campus');
    var UserID = "<?php echo $UserID; ?>";
    $('#pros-create-logo').html('<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>sending...');
        
   
    $('#pros-create-logo').prop('disabled', true);



    $.ajax({
        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/updatesetup-backwardtag.php",
        data: {
            getback_wardbtn: getback_wardbtn,
            UserID: UserID,
            campusID: CampusID
        },
        success: function(result) {
            $('#pros-schlogo-content').html('Proceed');
            $('#pros-create-logo').prop('disabled', false);


            $('#pros-schlogo-content').animate({
                // opacity: 0.5,
                left: '+=50',
                height: 'toggle'
            }, 1000);

            $('#pros-reducemodalclasstypesetup').css('width', '80%');
            $('#prosschool-bgimage-content').fadeIn('slow');
        }
    });




});//pros submit logo final ends here



//submit loginbghere button final here
$('body').on('click', '#pros-submitlogin-bgfinal', function() {

    var tagstate = $(this).data('tag');
    var UserID = "<?php echo $UserID; ?>";
    var campusID = $(this).data('campus');
    var ownerfirst_Name = "<?php echo $PrimaryName; ?>";
    var groupSchoolID = $(this).data('school');
    var maintagstate = $(this).data('maintag');

    $('#pros-submitlogin-bgfinal').html('<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>sending...');
        
   
    $('#pros-submitlogin-bgfinal').prop('disabled', true);



    $.ajax({
        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/updatesetup-backwardtag.php",
        data: {
            getback_wardbtn: tagstate,
            UserID: UserID,
            campusID: campusID
        },
        success: function(result) {

            $('#pros-submitlogin-bgfinal').html('Proceed');
            $('#pros-submitlogin-bgfinal').prop('disabled', false);



                    $.wnoty({
                        type: 'success',
                        message: "Great!! login images saved successfully.",
                        autohideDelay: 5000
                    });


                     $('#pros-createstaff-modal').modal('hide');



                    //pros load myschool content here
                    var ownerfirst_Name = "<?php echo $PrimaryName; ?>";
                    var tagstate = "<?php echo $tagstate; ?>";

                    $('#displaycampus-created').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

                    $.ajax({

                        type: "POST",
                        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/displayschool-campus.php",
                        data: {
                            UserID: UserID,
                            ownerfirst_Name: ownerfirst_Name,
                            tagstate: tagstate
                        },

                        success: function(result) {
                            $('#displaycampus-created').html(result);
                            var userrole = (result);
                            location.reload();

                        }
                    });
                    //pros load myschool content here


                   
            




           
        }
    });


});






// create term here
$('body').on('click', '#pros-createsession-termbtn', function() {
    $(this).html(
        '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>creating...'
    );



    var tagstate = $(this).data('tag');
    var UserID = "<?php echo $UserID; ?>";
    var campusID = $(this).data('campus');
    
    var groupSchoolID = $(this).data('school');
    var maintagstate = $(this).data('maintag');


    // var sessioname = $('.selcetsession-setup').val();

    var termID = [];
    var termnamealias = [];
    $('.pros-getterm-aliasvalue').each(function() {
        termnamealias.push($(this).val());
        termID.push($(this).data('id'));
    });


    var hasEmptyValue = termnamealias.some(function(value) {
        return value.trim() === '';
    });

    if (hasEmptyValue) {

        $.wnoty({
            type: 'warning',
            message: "Hey!! check your alias name make sure none is left empty.",
            autohideDelay: 5000
        });

        $('#pros-createsession-termbtn').html('Proceed');


    } else {
        termID = termID.toString();
        termnamealias = termnamealias.toString();

        $.ajax({

            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/update-termaliassetup.php",
            data: {
                tagstate: tagstate,
                UserID: UserID,
                termID: termID,
                termnamealias: termnamealias,
                campusID: campusID
            },
            success: function(feedback) {


                var pros_output = (feedback);
                $('#pros-createsession-termbtn').html('Proceed');


                if (pros_output.trim() === 'success') {

                    $.wnoty({
                        type: 'success',
                        message: "Great!! term and session set successfully",
                        autohideDelay: 5000
                    });

                 

                    var tagstate = $('#pros-createsession-termbtn').data('tag');
                   
                    if(tagstate == '29')
                    {

                           

                                     $('#pros-createstaff-modal').modal('hide');



                                //pros load myschool content here
                                var ownerfirst_Name = "<?php echo $PrimaryName; ?>";
                                var tagstate = "<?php echo $tagstate; ?>";

                                $('#displaycampus-created').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

                                $.ajax({

                                    type: "POST",
                                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/displayschool-campus.php",
                                    data: {
                                        UserID: UserID,
                                        ownerfirst_Name: ownerfirst_Name,
                                        tagstate: tagstate
                                    },

                                    success: function(result) {
                                        $('#displaycampus-created').html(result);
                                        var userrole = (result);

                                    }
                                });
                                //pros load myschool content here





                    }else
                    {

                    

                        var ownerfirst_Name = "<?php echo $PrimaryName; ?>";

                    //pros load setup content here

                    $('#pros-displaysetup-content').html(
                    '<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>'
                    );


                $.ajax({

                    type: "POST",
                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/loadsetup-modal.php",
                    data: {
                        UserID: UserID,
                        ownerfirst_Name: ownerfirst_Name,
                        tagstate: tagstate,
                        groupSchoolID: groupSchoolID,
                        CampusID: campusID
                    },
                    success: function(result) {

                        $('#pros-displaysetup-content').html(result);





                        var head_phones = [];
                            document.querySelectorAll('.pros-headnumset').forEach(function (input) {
                                head_phones.push(window.intlTelInput(input, {
                                    separateDialCode: true,
                                    preferredCountries: ["ng"],
                                    hiddenInput: "full",
                                    utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                }));
                            });

                    

                            var head_phone = [];
                            document.querySelectorAll('.pros-teachernumset').forEach(function (input) {
                                head_phone.push(window.intlTelInput(input, {
                                    separateDialCode: true,
                                    preferredCountries: ["ng"],
                                    hiddenInput: "full",
                                    utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                                }));
                            }); 

                            // var head_phone = window.intlTelInput(document.querySelector(
                            //     "#pros-adminnumset"), {
                            //     separateDialCode: true,
                            //     preferredCountries: ["ng"],
                            //     hiddenInput: "full",
                            //     utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                            // });


                            var tagstatusnew = tagstate;



                        $('#prosloadschoolid-forbackward').val(campusID);


                        if (maintagstate == '29' && tagstatusnew == '') {


                            $('#pros-reducemodalclasstypesetup').css('width', '700px');
                           
                            $('#pros-loadimportoption').fadeIn('slow');

                        } else {



                            if (tagstatusnew == '' || tagstatusnew == '15') {
                                $('#displaysection-content').fadeIn('slow');
                                $('#movebackbtn-setup').fadeIn('slow');

                            } else if (tagstatusnew == '16') {

                                $('#pros-displayhead-setup').fadeIn('slow');
                                $('#movebackbtn-setup').fadeIn('slow');
                                $('#pros-displaybackvalue-tag').val(15);



                            } else if (tagstatusnew == '17') {

                                $('#assignschoolheadfaculty  ').fadeIn('slow');
                                $('#movebackbtn-setup').fadeIn('slow');
                                $('#pros-displaybackvalue-tag').val(16);

                            } else if (tagstatusnew == '18') {
                                $('#proscreateschool-teacher').fadeIn('slow');
                                $('#movebackbtn-setup').fadeIn('slow');
                                $('#pros-displaybackvalue-tag').val(17);

                            } else if (tagstatusnew == '19') {
                                $('#createotherschooltype-setup').fadeIn('slow');

                                $('#movebackbtn-setup').fadeIn('slow');
                                $('#pros-displaybackvalue-tag').val(18);

                            } else if (tagstatusnew == '20') {

                                $('#pros-reducemodalclasstypesetup').css('width', '700px');

                                $('#createwelcomemsg-setup').fadeIn('slow');
                                $('#movebackbtn-setup').fadeIn('slow');
                                $('#pros-displaybackvalue-tag').val(19);


                            } else if (tagstatusnew == '21') {

                                $('#createclasses-setup ').fadeIn('slow');
                                $('#movebackbtn-setup').fadeIn('slow');
                                $('#pros-displaybackvalue-tag').val(20);

                                // $('#pros-reducemodalclasstypesetup').addClass('modal-xl');

                            } else if (tagstatusnew == '22') {

                                $('#createsubject-setup').fadeIn('slow');
                                $('#movebackbtn-setup').fadeIn('slow');
                                $('#pros-displaybackvalue-tag').val(21);

                            } else if (tagstatusnew == '23') {

                                $('#mergesubjectcontent').fadeIn('slow');
                                $('#movebackbtn-setup').fadeIn('slow');
                                $('#pros-displaybackvalue-tag').val(22);


                            } else if (tagstatusnew == '24') {

                                $('#pros-assign-formteachercontent').fadeIn('slow');
                                $('#movebackbtn-setup').fadeIn('slow');
                                $('#pros-displaybackvalue-tag').val(23);

                            } else if (tagstatusnew == '25') {

                                $('#assignsubject-teachercontainer').fadeIn('slow');
                                $('#movebackbtn-setup').fadeIn('slow');
                                $('#pros-displaybackvalue-tag').val(24);

                            } else if (tagstatusnew == '26') {

                                $('#pros-loadsession-termcontent').fadeIn('slow');
                                $('#movebackbtn-setup').fadeIn('slow');
                                $('#pros-displaybackvalue-tag').val(25);

                            } else if (tagstatusnew == '27') {

                                $('#pros-schlogo-content').fadeIn('slow');
                                $('#movebackbtn-setup').fadeIn('slow');
                                $('#pros-displaybackvalue-tag').val(26);

                            }else if(tagstatusnew == '28')
                            {
                                $('#prosschool-bgimage-content').fadeIn('slow');
                                $('#movebackbtn-setup').fadeIn('slow');
                                $('#pros-displaybackvalue-tag').val(27);


                            }else if(tagstatusnew == '29')
                            {

                                            //setup completed
                            
                            }

                        }

                }

                
            });

            //pros load setup content here

        }






                   

                }


            }
        });
    }

});
// create term end here





$('body').on('click', '#pros-proceeimport-campussetup', function() {
    $(this).html(
        '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>creating...'
    );
  


    var tagstate = $(this).data('tag');
    var UserID = "<?php echo $UserID; ?>";
    var campusID = $(this).data('campus');
    var maincampus = $(this).data('maincampus');
    var groupSchoolID = $(this).data('school');



    $.ajax({

        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/importsetup.php",
        data: {
            tagstate: tagstate,
            UserID: UserID,
            groupSchoolID: groupSchoolID,
            campusID: campusID,
            maincampus: maincampus
        },
        success: function(feedback) {


            var pros_output = (feedback);
          
            $('#pros-proceeimport-campussetup').html('Proceed');

            if (pros_output.trim() == 'success') {

                $.wnoty({
                    type: 'success',
                    message: "Great!! setup imported successfully",
                    autohideDelay: 5000
                });
                
                
                     $('#pros-createstaff-modal').modal('hide');
                    //pros load myschool content here
                    var ownerfirst_Name = "<?php echo $PrimaryName; ?>";
                    var tagstate = "<?php echo $tagstate; ?>";

                    $('#displaycampus-created').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

                    $.ajax({

                        type: "POST",
                        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/displayschool-campus.php",
                        data: {
                            UserID: UserID,
                            ownerfirst_Name: ownerfirst_Name,
                            tagstate: tagstate
                        },

                        success: function(result) {
                            $('#displaycampus-created').html(result);
                            var userrole = (result);

                        }
                    });
                    //pros load myschool content here




            }


        }
    });
});



//==proceed to edit setup for other campuss==//

$('body').on('click', '#pros-skipcampuseditsetup-campussetup', function() {

    $('#pros-reducemodalclasstypesetup').css('width', '86%');

    $('#pros-loadimportoption').animate({
        left: '+=50',
        height: 'toggle'
    }, 1000);

    $('#displaysection-content').fadeIn('slow');


});
//====proceed to edit settings==//


$(document).ready(function() {
    // togle class and subject dropdown

    const selectBtnnewclassdoc = document.querySelector(
            ".getclassopenondocument-ready1"),
        itemsclass = document.querySelectorAll(".listmeslist");
    selectBtnnewclassdoc.classList.toggle("open");

   



   







});




        //prosloa logo oncnage here
         $('body').on('change','#prosschoollogo_input', function(){
        

                var reader = new FileReader();
                reader.onload = function (event) {
                    $image_crop.croppie('bind', {
                    url: event.target.result
                    }).then(function(){
                        console.log('jQuery bind complete');
                    });
                };


                var prosloadschoolhere = $(this).data('school');

                $('#prosschoollherebtnlogo').val(prosloadschoolhere);


                reader.readAsDataURL(this.files[0]);
                $('#insertimageModal').modal('show');

        });
         //prosloa logo oncnage here



       //pros load login bg here
        $('body').on('change','.prosgeneralloginimages', function(){
                

           
                var reader = new FileReader();
                reader.onload = function (event) {
                    $image_croplogin.croppie('bind', {
                    url: event.target.result
                    }).then(function(){
                        console.log('jQuery bind complete');
                    });
                };

                reader.readAsDataURL(this.files[0]);

                var prosloadcampusstepstage = $(this).data('stage');
                var prosloadschoolhere = $(this).data('school');

                $('#prosloadstepforbgimage').val(prosloadcampusstepstage);
                $('#prosschoollherebtn').val(prosloadschoolhere);
               
                $('#prosopenloginimagemodal').modal('show');

        });
    //pros load login bg here




    $('body').on('click','.prossubmitschoollogo', function(){

           var prosloginschool = $('#prosschoollherebtnlogo').val();



           $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response){
               



                $('.prossubmitschoollogo').html('saving... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

                // $('.prossubmitloginimagebtn').html('Crop Image', false);
                $('.prossubmitschoollogo').prop("disabled", true);



                $.ajax({

                        type: "POST",
                        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/pros-uploadlogohere-here.php",
                        data: {
                            IntitutionID:prosloginschool,
                            image:response

                        },
                        success: function(result) {


                                $('.prossubmitschoollogo').prop("disabled", false);
                                $('.prossubmitschoollogo').html("Submit");
                                $('#insertimageModal').modal("hide");



                                if(result.trim() == 'success') 
                                 {


                                    $.wnoty({

                                    type: 'success',
                                    message: 'Great! School login updated successfully.',
                                    autohideDelay: 5000, // 3 seconds
                                    autohide: true

                                  }); 

                                }

                                $('#prosloadnologofoundhere').fadeOut();
                                $('.prosloaschoolimageheregeralbtn').fadeIn();
                                $('.proshideimagelogoherelogo').fadeIn();
                                
                                $('.prosloaschoolimageheregeralbtn').attr('src', response);

                        }

                    });





            });



          
    });








        //submit second loginnhere
    $('body').on('click','.prossubmitloginimagebtn', function(){


              var prosstageforloginimage = $('#prosloadstepforbgimage').val();
              var prosloginschool = $('#prosschoollherebtn').val();

             


                
             $image_croplogin.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response){
               



                $('.prossubmitloginimagebtn').html('saving... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

                // $('.prossubmitloginimagebtn').html('Crop Image', false);
                $('.prossubmitloginimagebtn').prop("disabled", true);
                


                $.ajax({

                        type: "POST",
                        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/pros-insertschoolbackgroundimage.php",
                        data: {

                              prosstageforloginimage:prosstageforloginimage,
                              prosloginschool:prosloginschool,
                              image:response
                        },
                        success: function(result) {

                            $('.prossubmitloginimagebtn').prop("disabled", false);
                            $('.prossubmitloginimagebtn').html("Upload");
                            $('#prosopenloginimagemodal').modal("hide");


                             
                                 if(result.trim() == 'success') 
                                 {


                                    $.wnoty({

                                    type: 'success',
                                    message: 'Great! School login updated successfully.',
                                    autohideDelay: 5000, // 3 seconds
                                    autohide: true

                                  }); 


                                  if(prosstageforloginimage == '1')
                                  {

                                               $('#prosnocontenttownotfoundfirst').fadeOut();
                                                $('.prosloadinagecontentherefirst').fadeIn();
                                               $('.prosloadinagecontentherefirst').attr('src', response);
                                              // prosloadinagecontentherefirst prosloadinagecontentherefirst
                                        
                                  }else if(prosstageforloginimage == '2')
                                  {
                                                $('#prosnocontenttownotfoundsecond').fadeOut();
                                                $('.prosloadinagecontentheresecond').fadeIn();
                                               $('.prosloadinagecontentheresecond').attr('src', response);
                                  }else if(prosstageforloginimage == '3')
                                  {

                                                $('#prosnocontenttownotfoundthird').fadeOut();
                                                $('.prosloadinagecontentherethird').fadeIn();
                                               $('.prosloadinagecontentherethird').attr('src', response);
                                  }


                                 }else
                                 {


                                             

                                 }

                        }
                });        







                
            });

    });
     //submit second loginnhere



     $('body').on('click','.prosloadinstitutionbtn', function(){

                var prosloadcampusID = $(this).data('id');
                $('#prosloadquestionsettingcampusid').val(prosloadcampusID);

                var campusID = $(this).data('id');

                // Get the current URL
                var currentURL = window.location.href;

                // Append the campusID to the URL
                var newURL = currentURL + '?campusID=' + campusID;

                // Set the modal's target URL
                $('#prosloadset-configurationhere').attr('data-url', newURL);

     });




     $('body').on('click','.prosgeneralcliklinkhere', function(){

            var proscampusID = $('#prosloadquestionsettingcampusid').val();
            var sectstage = $(this).data('step');


            if(sectstage == 'section')
            {

                var prosdefaulturl = '<?php echo $defaultUrl; ?>' + 'app/section?camp=' + proscampusID;
                    window.location.href = prosdefaulturl;

            }else if(sectstage == 'term')
            {
                var prosdefaulturl = '<?php echo $defaultUrl; ?>' + 'app/term?camp=' + proscampusID;
                    window.location.href = prosdefaulturl;

            }else if(sectstage == 'logo')
            {
                


                var prosdefaulturl = '<?php echo $defaultUrl; ?>' + 'app/logo?camp=' + proscampusID + '&tabrel=logo';
                window.location.href = prosdefaulturl;

                
            }else if(sectstage == 'loginbg')
            {


                            var prosdefaulturl = '<?php echo $defaultUrl; ?>' + 'app/logo?camp=' + proscampusID + '&tabrel=lbg';
                            window.location.href = prosdefaulturl;


            }else if(sectstage == 'class')
            {
                
                                var prosdefaulturl = '<?php echo $defaultUrl; ?>' + 'app/academics?camp=' + proscampusID;
                                window.location.href = prosdefaulturl;

                
            }else if(sectstage == 'subject')
            {
                
                    var prosdefaulturl = '<?php echo $defaultUrl; ?>' + 'app/academics?camp=' + proscampusID;
                    window.location.href = prosdefaulturl;

            }

     });

</script>