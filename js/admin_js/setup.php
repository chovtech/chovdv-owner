<script>
$(document).ready(function() {



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

    // $("#myModal").modal();
    var tagstatus = '<?php echo $tagstate; ?>';

    // alert(tagstatus);
    $('#displayaiwelcome').hide();
    $('#changelang').hide();
    $('#institutiontype').hide();
    $('#displayschoolinput').hide();
    $('#displaycontentcreator').hide();
    $('#displaytertiary').hide();
    $('#displayk12').hide();
    $('#displaysetinstitution').hide();

    if (tagstatus == '9') {

        $('#changelang').fadeIn('slow');

    } else if (tagstatus == '11') {

        $('#displayaiwelcome').fadeIn('slow');

    } else if (tagstatus == '10') {


        $('#displaysetinstitution').fadeIn('slow');

    } else if (tagstatus == '12') {
        //  alert('hello');
        $('#institutiontype').fadeIn('slow');
    } else if (tagstatus == '13') {
        // $('#createinstitution').fadeIn('slow');
        // $('#pros-createschoolmodal').show();
        $('#pros-createschoolmodal-first').modal('show');

    } else if (tagstatus == '14') {
        $('#displayplan').fadeIn('slow');

    } else if (tagstatus == '15' || tagstatus == '16' || tagstatus == '17' || tagstatus == '18' || tagstatus ==
        '19' || tagstatus == '20' || tagstatus == '21' || tagstatus == '22' || tagstatus == '23' || tagstatus ==
        '24' || tagstatus == '25' || tagstatus == '26' || tagstatus == '27') {
        $('#schoolsettings').fadeIn('slow');


        $('.pros-schoolkindofmodal').on('shown.bs.modal', function() {
            $(this).addClass('show');
        });

        $('.pros-schoolkindofmodal').on('hide.bs.modal', function() {
            $(this).removeClass('show');
        });
    }



    // $('#createschoolmodal').modal();
    var defaultlang = '<?php echo $DefaultLanguage; ?>';

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
});



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
        }, 1000);
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
                location.reload();
            }
        });

    }
});


$('body').on('click', '#previoutAI', function() {
    $('#displayaiwelcome').animate({
        left: '+=50',
        height: 'toggle'
    }, 1000);

    $('#changelang').fadeIn('slow');
});



// click to get to sch type
$('body').on('click', '#previoutAI-btn', function() {

    // $('#displayaiwelcome').fadeOut();
    $('#displayaiwelcome').animate({
        left: '+=50',
        height: 'toggle'
    }, 1000);

    $('#displaysetinstitution').fadeIn('slow');

    var UserID = "<?php echo $UserID; ?>";
    var tagid = $(this).data('id');

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
    }, 1000);

    $('#displaysetinstitution').fadeIn('slow');


});

$('body').on('click', '#backbtntoai', function() {
    // $('#institutiontype').fadeOut('slow');
    $('#displaysetinstitution').animate({
        // opacity: 0.5,
        left: '+=50',
        height: 'toggle'
    }, 1000);

    $('#displayaiwelcome').fadeIn('slow');
});

$('body').on('click', '#onboardingbtndisplay', function() {
    $('#displaysetinstitution').animate({
        // opacity: 0.5,
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
        $('#pros-createschoolmodal-first').modal('show');
        // $('#createinstitution').fadeIn('slow');
        // $('#createschoolmodal').modal();

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

// select LGA base on state selected end here



$("body").on("click", "#createschoolbtnfirstbtn", function() {//create for the first time
    $(this).html(
        '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>creating...'
    );

    var UserID = "<?php echo $UserID; ?>";
    var schoolname = $('#schoolnameinitial').val();
    var schoolmotto = $('#schoolmottoinitial').val();
    var schoolurl = $('#prosschoollink-initial').val();
    var tag = $(this).data('id');
    var schoolurllength = schoolurl.length;


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


    } else if (schoolurllength > 15) {

        $('.schollnameerr-new').css('outline', '1px solid green');
        $('.prosschoolmottocover').css('outline', '1px solid green');
        $('.prosschoollinkcover').css('outline', '1px solid red');


        $.wnoty({
            type: 'warning',
            message: "Hey!! URL should not be greater than 15 characters.",
            autohideDelay: 6000
        });
        $('#createschoolbtnfirstbtn').html('Create school');

    } else {
        $('#createschoolbtnfirstbtn').html('Create school');

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
});//create school initial





$("body").on("click", "#addschoolinitialbtn-new", function() {
    $(this).html(
        '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>creating...'
    );

    var UserID = "<?php echo $UserID; ?>";
    var schoolname = $('#pros-schoolnameID-new').val();
    var schoolmotto = $('#pros-schoolmotto-new').val();
    var schoolurl = $('#pros-schoolurlnew').val();
    var schoolurllength = schoolurl.length;


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


    } else if (schoolurllength > 15) {

        $('.schollnameerr-new').css('outline', '1px solid green');
        $('.schollmottoerr-new').css('outline', '1px solid green');
        $('.schollurlerr-new').css('outline', '1px solid red');


        $.wnoty({
            type: 'warning',
            message: "Hey!! URL should not be greater than 15 characters.",
            autohideDelay: 6000
        });
        $('#addschoolinitialbtn-new').html('Create school');

    } else {
        $('#addschoolinitialbtn-new').html('Create school');

        $('.schollnameerr-new').css('outline', '1px solid green');
        $('.schollmottoerr-new').css('outline', '1px solid green');
        $('.schollurlerr-new').css('outline', '1px solid green');

        localStorage.setItem("schoolname", schoolname);
        localStorage.setItem("schoolmotto", schoolmotto);
        localStorage.setItem("schoolurl", schoolurl);
        localStorage.setItem("tag", '');

        $.wnoty({
            type: 'success',
            message: "Greate!! school created successfully kindly Proceed to create campus for your school",
            autohideDelay: 6000
        });

        $('#pros-createschoolmodal').modal('hide');

        setTimeout(function() {

            $('#pros-createnewcampus').modal('show');

        }, 1000);

    }
});


$("body").on("click", "#pros-createnewcampus-btn", function() {
    $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

    var schoolName = localStorage.getItem("schoolname");
    var mottoid = localStorage.getItem("schoolmotto");
    var schooldomain = localStorage.getItem("schoolurl");
    var tagID = localStorage.getItem("tag");
    var UserID = "<?php echo $UserID; ?>";

    var checktoverify = $('#checkfirstvilation').val();

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




    if (hasEmptyValueloc || hasEmptyValueemail || hasEmptyValuephone || hasEmptyValuecountry ||  hasEmptyValuestate || hasEmptyValueslga) {
       
        $('#pros-createnewcampus-btn').html('Create campus');

        // $('.campusemailcover' + emailverify).css('outline', '1px solid red');
        // $('.campuslocationcover' + locationverify).css('outline', '1px solid red');
        // $('.campusemailcover' + emailverify).css('outline', '1px solid red');
        // $('.campusnumbercover' + phoneverify).css('outline', '1px solid red');
        // $('.campuscountrycover' + countryverify).css('outline', '1px solid red');
        // $('.campusstatecover' + stateverify).css('outline', '1px solid red');
        // $('.campuslgacover' + lgaverify).css('outline', '1px solid red');


    } else {


        campuslocation = campuslocation.toString();
        campusemail = campusemail.toString();
        formattedinput = formattedinput.toString();
        country_ID = country_ID.toString();
        state_ID = state_ID.toString();
        local_Gov = local_Gov.toString();

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

            success: function(result) {

                $('#pros-createnewcampus-btn').html('Create campus');

                 localStorage.removeItem("schoolname");
                 localStorage.removeItem("schoolmotto");
                 localStorage.removeItem("schoolurl");
                 localStorage.removeItem("tag");

                 $('#pros-createnewcampus').modal('hide');

                if(tagID == '')
                {

               


                            $('#displaycampus-created').html(
                            '<center><div class="spinner-grow" style="width: 3rem; height: 3rem;margin:auto;" role="status"> <span class="sr-only">Loading...</span></div></center>'
                        );
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
                    $('#displayplan').fadeIn('slow'); //show next tag     
                }
                     

            }
        });




    }





});







// $('body').on('click', '#createschoolbtn', function(e) {

//     var tagID = $(this).data('id');
//     var schoolName = $('#schoolname').val();
//     var mottoid = $('#mottoid').val();
//     var schooldomain = $('#schooldomain').val();
//     var schooldomainlength = schooldomain.length;

//     var checktoverify = $('#checkfirstvilation').val();
//     var UserID = "<?php echo $UserID; ?>";


//     var campuslocation = [];
//     var verifycampuslocation = [];
//     $.each($('.campuslocation'), function() {
//         campuslocation.push($(this).val());
//         var locationverify = $(this).data('id');
//         var campvaluefinal = $('#campuslocation' + locationverify).val();

//         if (checktoverify == 'validatedfinal') {
//             if (campvaluefinal == '' || campvaluefinal == ',') {
//                 $('.campuslocationcover' + locationverify).css('border', '1px solid red');
//                 $('#checkfirstvilation').val('validatedfinal');
//                 $('#createschoolbtn').html('Submit');
//             } else {
//                 $('.campuslocationcover' + locationverify).css('outline', '1px solid red');
//                 $('.checkfirstvilation').val('vilidatedsuccess');
//                 $('#createschoolbtn').html('Submit');
//             }
//         } else {

//         }

//     });

//     // campuslocation.toString();
//     // var campuslocation = [];
//     //  $.each($('.campuslocation'), function(){
//     //     campuslocation.push($(this).val());
//     // });

//     var campusemail = [];
//     $.each($('.campusemail'), function() {
//         campusemail.push($(this).val());
//         var emailverify = $(this).data('id');
//         var emailverifyfinal = $('#email' + emailverify).val();

//         if (checktoverify == 'validatedfinal') {
//             if (emailverifyfinal == '' || emailverifyfinal == ',') {
//                 $('#email' + emailverify).css('border-color', 'red');
//                 $('#checkfirstvilation').val('validatedfinal');
//                 $('#createschoolbtn').html('Submit');
//             } else {
//                 $('#email' + emailverify).css('border-color', 'green');
//                 $('#checkfirstvilation').val('vilidatedsuccess');
//                 $('#createschoolbtn').html('Submit');
//             }
//         } else {

//         }
//     });



//     $.each($('.campusphone'), function() {
//         var phoneverify = $(this).data('id');
//         var phonelverifyfinal = $('#phonenumber' + phoneverify).val();

//         if (checktoverify == 'validatedfinal') {
//             if (phonelverifyfinal == '' || phonelverifyfinal == ',') {
//                 $('#phonenumber' + phoneverify).css('border-color', 'red');
//                 $('#checkfirstvilation').val('validatedfinal');
//                 $('#createschoolbtn').html('Submit');
//             } else {
//                 $('#phonenumber' + phoneverify).css('border-color', 'green');
//                 $('#checkfirstvilation').val('vilidatedsuccess');
//                 $('#createschoolbtn').html('Submit');
//             }
//         } else {

//         }
//     });


//     var formattedinput = [];
//     document.querySelectorAll('.campusphone').forEach(function(input) {
//         // Get the `intlTelInput` plugin instance for the input field
//         var iti = window.intlTelInputGlobals.getInstance(input);
//         // Get the raw phone number value from the input field
//         var numberformat = input.value;
//         // Use the `intlTelInputUtils` library to format the phone number with its country code
//         formattedinput.push(intlTelInputUtils.formatNumber(numberformat, iti.getSelectedCountryData()
//             .iso2));
//         // Display the formatted phone number in an alert message


//     });

//     var country_ID = [];
//     $.each($('.generalcountry'), function() {
//         country_ID.push($(this).val());

//         var countryverify = $(this).data('count');
//         var countrylverifyfinal = $('#countryid' + countryverify).val();

//         if (checktoverify == 'validatedfinal') {
//             if (countrylverifyfinal == '0' || countrylverifyfinal == ',') {
//                 $('#countryid' + countryverify).css('border-color', 'red');
//                 $('#checkfirstvilation').val('validatedfinal');
//                 $('#createschoolbtn').html('Submit');
//             } else {
//                 $('#countryid' + countryverify).css('border-color', 'green');
//                 $('#checkfirstvilation').val('vilidatedsuccess');
//                 $('#createschoolbtn').html('Submit');
//             }
//         } else {

//         }
//     });

//     var state_ID = [];
//     $.each($('.generalstate'), function() {
//         state_ID.push($(this).val());


//         var stateverify = $(this).data('state');
//         var statelverifyfinal = $('#state' + stateverify).val();

//         if (checktoverify == 'validatedfinal') {
//             if (statelverifyfinal == '0' || statelverifyfinal == ',') {
//                 $('#state' + stateverify).css('border-color', 'red');
//                 $('#checkfirstvilation').val('validatedfinal');
//                 $('#createschoolbtn').html('Submit');
//             } else {
//                 $('#state' + stateverify).css('border-color', 'green');
//                 $('#checkfirstvilation').val('vilidatedsuccess');
//                 $('#createschoolbtn').html('Submit');
//             }
//         } else {

//         }
//     });

//     var local_Gov = [];
//     $.each($('.generallga'), function() {
//         local_Gov.push($(this).val());

//         var lgaverify = $(this).data('lga');
//         var lgalverifyfinal = $('#lgacity' + lgaverify).val();

//         if (checktoverify == 'validatedfinal') {
//             if (lgalverifyfinal == '0' || lgalverifyfinal == ',') {
//                 $('#lgacity' + lgaverify).css('border-color', 'red');
//                 $('#checkfirstvilation').val('validatedfinal');
//                 $('#createschoolbtn').html('Submit');
//             } else {
//                 $('#lgacity' + lgaverify).css('border-color', 'green');
//                 $('#checkfirstvilation').val('vilidatedsuccess');
//                 $('#createschoolbtn').html('Submit');
//             }

//         } else {

//         }
//     });

//     var schooladdress = [];
//     $.each($('.generaladress'), function() {
//         schooladdress.push($(this).val());

//         var addressverify = $(this).data('id');
//         var addresslverifyfinal = $('#campusaddress' + addressverify).val();

//         if (checktoverify == 'validatedfinal') {
//             if (addresslverifyfinal == '' || addresslverifyfinal == ',') {
//                 $('#campusaddress' + addressverify).css('border-color', 'red');
//                 $('#checkfirstvilation').val('validatedfinal');
//                 $('#createschoolbtn').html('Submit');
//             } else {
//                 $('#campusaddress' + addressverify).css('border-color', 'green');
//                 $('#checkfirstvilation').val('vilidatedsuccess');
//                 $('#createschoolbtn').html('Submit');
//             }

//         } else {

//         }
//     });


//     campuslocation = campuslocation.toString();
//     campusemail = campusemail.toString();
//     formattedinput = formattedinput.toString();
//     country_ID = country_ID.toString();
//     state_ID = state_ID.toString();
//     local_Gov = local_Gov.toString();
//     schooladdress = schooladdress.toString();

//     // alert('schoolName');
//     if (schoolName == '') {



//         $('#schoolnameerr').fadeIn();
//         $('#schoolname').css('border-color', 'red');
//         $(this).html('Submit');
//         $('#schoolnameerr').html('hey! Input your school name');
//         $('html,body').animate({
//             scrollTop: 0
//         }, 'fast');
//         $('#checkfirstvilation').val('validatedfinal');
//     } else if (mottoid == '') {
//         $('#schoolnameerr').fadeOut();
//         $('#schoolmottoerr').fadeIn();
//         $('#schoolname').css('border-color', 'green');
//         $('#mottoid').css('border-color', 'red');
//         $(this).html('Submit');
//         $('#schoolmottoerr').html('hey! Input your school motto');
//         $('#checkfirstvilation').val('validatedfinal');

//         $('html,body').animate({
//             scrollTop: 0
//         }, 'fast');
//     } else if (schooldomain == '') {
//         $('#schoolnameerr').fadeOut();
//         $('#schoolmottoerr').fadeOut();
//         $('#schoolurlerr').fadeIn();
//         $('#schoolname').css('border-color', 'green');
//         $('#mottoid').css('border-color', 'green');
//         $('#schooldomain').css('border-color', 'red');
//         $(this).html('Submit');
//         $('#schoolurlerr').html('Oops!  your URL shouldn\'t be left blank');

//         $('html,body').animate({
//             scrollTop: 0
//         }, 'fast');
//         $('#checkfirstvilation').val('validatedfinal');

//     } else if (schooldomainlength > 15) {
//         $('#schoolnameerr').fadeOut();
//         $('#schoolmottoerr').fadeOut();
//         $('#schoolurlerr').fadeIn();
//         $('#schoolname').css('border-color', 'green');
//         $('#mottoid').css('border-color', 'green');

//         $('#schooldomain').css('border-color', 'red');
//         $(this).html('Submit');
//         $('#schoolurlerr').html('Oops! URL too long');

//         $('html,body').animate({
//             scrollTop: 0
//         }, 'fast');
//         $('#checkfirstvilation').val('validatedfinal');
//     } else if (schooldomain === schooldomain.toUpperCase()) {
//         $('#schoolnameerr').fadeOut();
//         $('#schoolmottoerr').fadeOut();
//         $('#schoolurlerr').fadeIn();

//         $('#schoolname').css('border-color', 'green');
//         $('#mottoid').css('border-color', 'green');
//         $('#schooldomain').css('border-color', 'red');
//         $(this).html('Submit');
//         $('#schoolurlerr').html('hey! your URL must be in lower case format e:g;example');
//         $('html,body').animate({
//             scrollTop: 0
//         }, 'fast');
//         $('#checkfirstvilation').val('validatedfinal');
//     } else if (checktoverify == 'vilidatedsuccess') {
//         $('#schoolname').css('border-color', 'green');
//         $('#mottoid').css('border-color', 'green');
//         $('#schooldomain').css('border-color', 'green');

//         $('#schoolnameerr').fadeOut();
//         $('#schoolmottoerr').fadeOut();
//         $('#schoolurlerr').fadeOut();


//         $.ajax({
//             type: "POST",
//             url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/create-schoolonboarding.php",
//             data: {
//                 schoolName: schoolName,
//                 mottoid: mottoid,
//                 schooldomain: schooldomain,
//                 campuslocation: campuslocation,
//                 campusemail: campusemail,
//                 formattedinput: formattedinput,
//                 country_ID: country_ID,
//                 state_ID: state_ID,
//                 local_Gov: local_Gov,
//                 schooladdress: schooladdress,
//                 UserID: UserID,
//                 tagID: tagID
//             },

//             success: function(result) {
//                 $('#createschoolbtn').html('Submit');

//                 $('#displayinfor-success').html(result);
//                 $('html,body').animate({
//                     scrollTop: 0
//                 }, 'fast');
//                 $('#createinstitution').animate({
//                     // opacity: 0.5,
//                     left: '+=50',
//                     height: 'toggle'
//                 }, 1000);
//                 $('#displayplan').fadeIn('slow');
//             }
//         });

//     }

// });


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



});


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










$(document).ready(function() {
    $('#displaycampus-created').html(
        '<center><div class="spinner-grow" style="width: 3rem; height: 3rem;margin:auto;" role="status"> <span class="sr-only">Loading...</span></div></center>'
    );
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



            $('#pros-displaystepmsg-modal').modal('show');


        }
    });



});


//load setup modal when click on school 
$('body').on('click', '.opensetupmodalforschool', function() {

    var CampusID = $(this).data('campus');
    var groupSchoolID = $(this).data('id');
    var access = $(this).data('access');
    var UserID = "<?php echo $UserID; ?>";
    var ownerfirst_Name = "<?php echo $PrimaryName; ?>";
    var tagstate = "<?php echo $tagstate; ?>";


    if (access == 'granted') {
        $('#pros-createstaff-modal').modal('show'); //load setup modal


        $('#pros-displaysetup-content').html(
            '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>loaing...'
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



                var head_phone = window.intlTelInput(document.querySelector("#pros-headnumset"), {
                    separateDialCode: true,
                    preferredCountries: ["ng"],
                    hiddenInput: "full",
                    utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                });



                var head_phone = window.intlTelInput(document.querySelector(
                    "#pros-teachernumset"), {
                    separateDialCode: true,
                    preferredCountries: ["ng"],
                    hiddenInput: "full",
                    utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                });

                var head_phone = window.intlTelInput(document.querySelector("#pros-adminnumset"), {
                    separateDialCode: true,
                    preferredCountries: ["ng"],
                    hiddenInput: "full",
                    utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                });


                var tagstatusnew = '<?php echo $tagstate; ?>';




                if (tagstatusnew == '15') {
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
                    $('#pros-reducemodalclasstypesetup').css('width', '700px');

                    $('#pros-loadimportoption').fadeIn('slow');
                    $('#movebackbtn-setup').fadeIn('slow');
                    $('#pros-displaybackvalue-tag').val(26);
                }








                $('body').on('click', '.pros-generalsechead', function() {

                    var facultyid = $(this).data('id');

                    const selectBtn = document.querySelector(".prosopendrophead" +
                            facultyid),
                        items = document.querySelectorAll(".item");

                    // Toggle the "open" class when the selectBtn is clicked
                    selectBtn.classList.toggle("open");
                });


                const selectBtnnewclass = document.querySelector(".getclassopenondocument-ready1"),
                    itemsclass = document.querySelectorAll(".listmeslist");
                selectBtnnewclass.classList.toggle("open");


                const selectBtnnewsubject = document.querySelector(
                        ".getsubjectopenondocument-ready1"),
                    itemssubject = document.querySelectorAll(".subjectlistmeslist");
                selectBtnnewsubject.classList.toggle("open");


                $('body').on('click', '.createclassgeneral', function() {
                    var facultyid = $(this).data('faculty');

                    const selectBtn = document.querySelector(".pros-openclasswhenclick" +
                            facultyid),
                        items = document.querySelectorAll(".listmeslist");

                    // Toggle the "open" class when the selectBtn is clicked
                    selectBtn.classList.toggle("open");
                });



                $('body').on('click', '.createsubjectgeneral', function() {
                    var facultyid = $(this).data('faculty');

                    const selectBtn = document.querySelector(".pros-opensubjectwhenclick" +
                            facultyid),
                        items = document.querySelectorAll(".subjectlistmeslist");

                    // Toggle the "open" subject when the selectBtn is clicked
                    selectBtn.classList.toggle("open");
                });



                //merging of subject dropdown 
                $('body').on('click', '.createsubjectgeneralmerge', function() {
                    var facultyid = $(this).data('faculty');

                    const selectBtn = document.querySelector(
                            ".pros-opensubjectwhenclickmerge" +
                            facultyid),
                        items = document.querySelectorAll(".subjectlistmeslistmerge");

                    // Toggle the "open" subject when the selectBtn is clicked
                    selectBtn.classList.toggle("open");
                });
                //merging of subject dropdown 


                $('body').on('change', '.pros-generalcheckschoolhead', function() {
                    var facultyID = $(this).data('faculty');


                    let checked = parseInt($('.checkshoolheadnew' + facultyID + ':checked')
                        .length);

                    btnText = document.querySelector(".pros-headdisplaynumslected" +
                        facultyID);

                    if (checked > 0) {
                        btnText.innerText = `(${checked} Selected)`;
                    } else {
                        btnText.innerText = "";
                    }
                });



                $('body').on('click', '.prosgenerallist-itemssel', function() {


                    var facultyID = $(this).data('id');

                    var facunewcheck = $(this).data('faculty');

                    var verychecked = $('.proscheckboxinside' + facultyID).prop("checked");

                    if (verychecked) {
                        $('.proscheckboxinside' + facultyID).prop("checked", false);
                    } else {
                        $('.proscheckboxinside' + facultyID).prop("checked", true);
                    }

                    let checked = parseInt($('.checkshoolheadnew' + facunewcheck +
                            ':checked')
                        .length);

                    btnText = document.querySelector(".pros-headdisplaynumslected" +
                        facunewcheck);

                    if (checked > 0) {
                        btnText.innerText = `(${checked} Selected)`;
                    } else {
                        btnText.innerText = "";
                    }
                });



            }
        });

    } else {
        $.wnoty({
            type: 'warning',
            message: "Oops!! you are only required to  set up with the main campus colored blue.",
            autohideDelay: 6000
        });
    }


});
//load setup modal when click on school 




// load setup modal
$('body').on('click', '.pros-loadsetupmodal', function() {
    var CampusID = $(this).data('campus');

    var groupSchoolID = $(this).data('id');
    var UserID = "<?php echo $UserID; ?>";
    var ownerfirst_Name = "<?php echo $PrimaryName; ?>";
    var tagstate = "<?php echo $tagstate; ?>";

    $('#pros-displaysetup-content').html(
        '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>loaing...'
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



            var head_phone = window.intlTelInput(document.querySelector("#pros-headnumset"), {
                separateDialCode: true,
                preferredCountries: ["ng"],
                hiddenInput: "full",
                utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
            });



            var head_phone = window.intlTelInput(document.querySelector("#pros-teachernumset"), {
                separateDialCode: true,
                preferredCountries: ["ng"],
                hiddenInput: "full",
                utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
            });

            var head_phone = window.intlTelInput(document.querySelector("#pros-adminnumset"), {
                separateDialCode: true,
                preferredCountries: ["ng"],
                hiddenInput: "full",
                utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
            });


            var tagstatusnew = '<?php echo $tagstate; ?>';




            if (tagstatusnew == '15') {
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
                $('#pros-reducemodalclasstypesetup').css('width', '700px');

                $('#pros-loadimportoption').fadeIn('slow');
                $('#movebackbtn-setup').fadeIn('slow');
                $('#pros-displaybackvalue-tag').val(26);
            }








            $('body').on('click', '.pros-generalsechead', function() {

                var facultyid = $(this).data('id');

                const selectBtn = document.querySelector(".prosopendrophead" + facultyid),
                    items = document.querySelectorAll(".item");

                // Toggle the "open" class when the selectBtn is clicked
                selectBtn.classList.toggle("open");
            });


            const selectBtnnewclass = document.querySelector(".getclassopenondocument-ready1"),
                itemsclass = document.querySelectorAll(".listmeslist");
            selectBtnnewclass.classList.toggle("open");


            const selectBtnnewsubject = document.querySelector(".getsubjectopenondocument-ready1"),
                itemssubject = document.querySelectorAll(".subjectlistmeslist");
            selectBtnnewsubject.classList.toggle("open");


            $('body').on('click', '.createclassgeneral', function() {
                var facultyid = $(this).data('faculty');

                const selectBtn = document.querySelector(".pros-openclasswhenclick" +
                        facultyid),
                    items = document.querySelectorAll(".listmeslist");

                // Toggle the "open" class when the selectBtn is clicked
                selectBtn.classList.toggle("open");
            });



            $('body').on('click', '.createsubjectgeneral', function() {
                var facultyid = $(this).data('faculty');

                const selectBtn = document.querySelector(".pros-opensubjectwhenclick" +
                        facultyid),
                    items = document.querySelectorAll(".subjectlistmeslist");

                // Toggle the "open" subject when the selectBtn is clicked
                selectBtn.classList.toggle("open");
            });



            //merging of subject dropdown 
            $('body').on('click', '.createsubjectgeneralmerge', function() {
                var facultyid = $(this).data('faculty');

                const selectBtn = document.querySelector(".pros-opensubjectwhenclickmerge" +
                        facultyid),
                    items = document.querySelectorAll(".subjectlistmeslistmerge");

                // Toggle the "open" subject when the selectBtn is clicked
                selectBtn.classList.toggle("open");
            });
            //merging of subject dropdown 


            $('body').on('change', '.pros-generalcheckschoolhead', function() {
                var facultyID = $(this).data('faculty');


                let checked = parseInt($('.checkshoolheadnew' + facultyID + ':checked')
                    .length);

                btnText = document.querySelector(".pros-headdisplaynumslected" + facultyID);

                if (checked > 0) {
                    btnText.innerText = `(${checked} Selected)`;
                } else {
                    btnText.innerText = "";
                }
            });



            $('body').on('click', '.prosgenerallist-itemssel', function() {


                var facultyID = $(this).data('id');

                var facunewcheck = $(this).data('faculty');

                var verychecked = $('.proscheckboxinside' + facultyID).prop("checked");

                if (verychecked) {
                    $('.proscheckboxinside' + facultyID).prop("checked", false);
                } else {
                    $('.proscheckboxinside' + facultyID).prop("checked", true);
                }

                let checked = parseInt($('.checkshoolheadnew' + facunewcheck + ':checked')
                    .length);

                btnText = document.querySelector(".pros-headdisplaynumslected" +
                    facunewcheck);

                if (checked > 0) {
                    btnText.innerText = `(${checked} Selected)`;
                } else {
                    btnText.innerText = "";
                }
            });



        }
    });

});
// load setup modal




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






$('body').on('keyup', '.schoollinkclass', function() {

    var schoolink = $(this).val();
    var UserID = "<?php echo $UserID; ?>";
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

                if (userrole == 'found') {
                    $.wnoty({
                        type: 'warning',
                        message: "this Url already exist for another school",
                        autohideDelay: 6000
                    });
                } else {

                }

            }
        });
    }


});


$('body').on('keyup', '.schoollinkclassedit', function() {

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

                if (userrole == 'found') {
                    $.wnoty({
                        type: 'warning',
                        message: "this Url already exist for another school",
                        autohideDelay: 6000
                    });
                } else {

                }

            }
        });


    }



});

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
            }


        }


    });




    $('body').on('click', '.bringformlink', function() {
        var usertype_invitelink = $("input[type='radio'].inviteuser-create:checked").val();

        if (usertype_invitelink == undefined) {

        } else {
            if (usertype_invitelink == 'Invite Staff') {
                $('#displaystaffemail').fadeIn();
                $('#staff-form').fadeOut();
            } else if (usertype_invitelink == 'Create staff') {
                $('#displaystaffemail').fadeOut();
                $('#staff-form').fadeIn();
                // staff-form 
            }
        }

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

    // next school menu for admin


    $('body').on('click', '#pros-checkmenu-foradmin', function() {

        var pros_verify_menucheck_box = $(".pros-checkchildren:checked").val();


        if (pros_verify_menucheck_box == undefined) {
            $.wnoty({
                type: 'warning',
                message: "choose atleast a menu before proceeding!!",
                autohideDelay: 5000
            });

        } else {

            var submenuid = [];
            var mainmenuid = [];
            var menustatus = [];

            $.each($(".pros-checkchildren:checked"), function() {
                submenuid.push($(this).val());
                mainmenuid.push($(this).data('pros-main-menu'));
                menustatus.push($(this).data('pros-menuper-status'));


            });

            $('#pros-dispaly-submenu').val(submenuid); //passing value to an input field
            $('#pros-dispaly-mainmenu').val(mainmenuid); //passing value to an input field
            $('#pros-dispaly-menustatus').val(menustatus); //passing value to an input field



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
        }


    });


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

        // $.ajax({
        //         type: "POST",
        //         url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/loadonbordedschool-delete.php",
        //         data: {
        //             UserID:UserID,
        //             SchoolID:SchoolID
        //         },
        //         success: function(result){
        //             $('#displayschoolforedit').html(result);
        //         }    

        // });


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
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (typeof_invitation == 'Create staff') {

        var staff_firstname = $('#staff-fname').val();

        var staff_lastname = $('#staff-lname').val();

        var staff_email = $('#staff-email').val();

        var staff_number = $('#staffnumber').val();


        var submenuid = $('#pros-dispaly-submenu').val();
        var mainmenu_id = $('#pros-dispaly-mainmenu').val();
        var menustatus = $('#pros-dispaly-menustatus').val();


        submenuid = submenuid.toString();
        mainmenu_id = mainmenu_id.toString();
        menustatus = menustatus.toString();




        var regexnumber = /^\+\d{1,3}\s?\(\d{1,4}\)\s?\d{1,4}-?\d{1,9}$/;

        var phonenumfull = staff_phone.getNumber(intlTelInputUtils.numberFormat.E164);
        $("input[name='staffphone[full]'").val(phonenumfull);


        // Function to validate phone number with country code
        // function validatePhoneNumber(phonenumfull) {
        //         // Regular expression pattern for phone number validation
        //         var regex = /^\+\d{1,3}\s?\(\d{1,4}\)\s?\d{1,4}-?\d{1,9}$/;
        //         // Check if the phone number matches the pattern
        //         return regex.test(phonenumfull);
        // }


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

        } else {

            $('.staffnumbercont').css('outline', '1px solid green');
            $('.stafff-emailcont').css('outline', '1px solid green');
            $('.stafff-lastnamecont').css('outline', '1px solid green');
            $('.stafffnamecont').css('outline', '1px solid green');

            $.ajax({
                type: "POST",
                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/createstaff-onboarding.php",
                data: {
                    groupSchoolID: groupSchoolID,
                    userType: userType,
                    staff_firstname: staff_firstname,
                    staff_lastname: staff_lastname,
                    staff_email: staff_email,
                    phonenumfull: phonenumfull,
                    submenuid: submenuid,
                    mainmenu_id: mainmenu_id,
                    menustatus: menustatus

                },
                success: function(result) {
                    // $('#displaycampus-created').html(result);
                    $('#getschoolinvitebtn').html('Submit <i class="fa fa-long-arrow-right"></i>');
                    var prosdata = (result);


                    if (prosdata == 'success') {
                        $.wnoty({
                            type: 'success',
                            message: "Great!! staff created Successfully.",
                            autohideDelay: 5000
                        });
                    } else if (prosdata == 'exist') {
                        $.wnoty({
                            type: 'warning',
                            message: "This staff already exist",
                            autohideDelay: 5000
                        });
                    }

                }
            });
        }


    } else if (typeof_invitation == 'Invite Staff') {
        var staffemailinvite = $('#staffemail-invite').val();

        if (staffemailinvite == '') {
            $('.staffemail-invitelink').css('outline', '1px solid red');
            $.wnoty({
                type: 'warning',
                message: "enter your staff's email",
                autohideDelay: 5000
            });

            $('#getschoolinvitebtn').html('Submit <i class="fa fa-long-arrow-right"></i>');

        } else if (!emailPattern.test(staffemailinvite)) {
            $('.staffemail-invitelink').css('outline', '1px solid red');
            $.wnoty({
                type: 'warning',
                message: "hey!! provide a valide email to proceed.",
                autohideDelay: 5000
            });
            $('#getschoolinvitebtn').html('Submit <i class="fa fa-long-arrow-right"></i>');
        } else {

        }


    } else {
        $.wnoty({
            type: 'warning',
            message: "Hey! select either invite staff or create staff before proceeding.",
            autohideDelay: 5000
        });
    }


});
// insert staff       

$('body').on('click', '.generalclass-usertype', function() {
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
        $("#parent").prop("checked", true);

    } else if (datausertype == '6') {
        $("#student").prop("checked", true);
    }


});

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



    // $.each($('.campuscntnum'), function() {
    //     camcnt++;
    //     var valueprepended = $(this).html(camcnt);

    // });


});
//remove appended input 



// append staff email here

$('body').on('click', '#pros-addstaff-email-invite', function() {

    var numappended = $("#pros-appendinput-ivite-email").val();

    numappended++;

    var appendinputnew = '<div id="pros-staffemail-remove' + numappended + '"><br><br><span  data-id="' +
        numappended +
        '" style="color:red;float:right;cursor:pointer;" id="pros-removeappended-email">Rremove <i class="fa fa-times"></i></span>' +
        '<div class="" style="margin-right:11rem;margin-left:2%;text-transform: uppercase;font-weight: 700;display: block;font-size: 0.9em;"><label for="schoolName">Staff email<span style="color:red;margin-right:2.5rem;">*</span></label></div>'

        +
        '<div class="pros-flexi-input-affix-wrapper-invitemail staffemail-invitelink" id="pros-staffemail' +
        numappended + '">'

        +
        '<input type="email" class="pros-flexi-input" id="staffemail-invite" placeholder="Enter your staff\'s email" style="width:70%;">' +
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
$('body').on('click', '.generalclass-checksection', function() {
    var getsection_checked = $(this).data('id');
    var pros_verify_section_box = $('#' + getsection_checked + ":checked").val();

    if (pros_verify_section_box == undefined) {
        $(this).css('outline', '1px solid #007bff');
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




$('body').on('change', '.sectioncheckbox', function() {
    var checkverysection = $(this).data('checkverify');

});



// add new section page
$('body').on('click', '#addnew-section', function() {
    $('#pros-displaysection-new').fadeIn('slow');

    var verifyhidesection_check = $('#pros-upsetioncreatenew-hide').val();

    if (verifyhidesection_check == '0') {
        $('#pros-displaysection-new').fadeIn('slow');
        $(this).html('Close');
        $('#pros-upsetioncreatenew-hide').val(1)
    } else {
        $('#pros-displaysection-new').fadeOut('slow');
        $(this).html('Create new');
        $('#pros-upsetioncreatenew-hide').val(0)
    }

});




$('body').on('click', '#pros-create-sectionbtn', function() {

    var selSchoolFaculty_check_validate = $(".sectioncheckbox:checked").val();
    var tagstate = $(this).data('tag');
    var UserID = "<?php echo $UserID; ?>";

    var selSchoolFaculty_check = [];
    16
    $('.sectioncheckbox').each(function() {
        if ($(this).is(':checked')) {
            selSchoolFaculty_check.push($(this).val());
        }
    });


    var selSchoolFaculty_input = [];

    $('.sectioninput-val').each(function() {
        selSchoolFaculty_input.push($(this).val().toUpperCase());

    });



    var campusID = $(this).data('campus');
    selSchoolFaculty_check = selSchoolFaculty_check.toString();
    selSchoolFaculty_input = selSchoolFaculty_input.toString();

    // alert(selSchoolFaculty_check);

    if (selSchoolFaculty_check_validate === undefined && selSchoolFaculty_input == '' ||
        selSchoolFaculty_input === undefined) //section valiadtion
    {
        $.wnoty({
            type: 'warning',
            message: "Hey!! either choose  or create section your self before proceeding.",
            autohideDelay: 5000
        });
    } else {
        $.ajax({
            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/onboarding-create-section.php",
            data: {
                selSchoolFaculty_check: selSchoolFaculty_check,
                selSchoolFaculty_input: selSchoolFaculty_input,
                campusID: campusID,
                tagstate: tagstate,
                UserID: UserID
            },
            success: function(result) {

                if (result == 'found') {
                    $.wnoty({
                        type: 'warning',
                        message: "hey! this section alraedy exist",
                        autohideDelay: 5000
                    });
                } else {
                    $.wnoty({
                        type: 'success',
                        message: "hey! school head created successfully.",
                        autohideDelay: 5000
                    });


                    $('#displaysection-content').animate({
                        // opacity: 0.5,
                        left: '+=50',
                        height: 'toggle'
                    }, 1000);

                    $('#pros-displayhead-setup').fadeIn('slow');

                }





            }
        });
    }

});

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
    $(this).html(
        '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>creating...'
    );

    var tagstate = $(this).data('tag');
    var groupSchoolID = $(this).data('school');
    var validatestatus = $('#checkfirstvilation').val();
    var UserID = "<?php echo $UserID; ?>";



    var schoolheadname = [];

    $('.generalheadfirstname').each(function() {
        schoolheadname.push($(this).val());

        var dataid = $(this).data('id');
        var firstnamevaliate = $('#scheadinsertid' + dataid).val();

        if (firstnamevaliate == '' || firstnamevaliate == ',') {
            $('.headfnamecover' + dataid).css('outline', '1px solid red');
            $('#checkfirstvilation').val('invalid');
            $('#pros-create-schoolheadbtn').html('Create new');

            $.wnoty({
                type: 'warning',
                message: "hey! enter your staff's first name.",
                autohideDelay: 5000
            });
        } else {
            $('.headfnamecover' + dataid).css('outline', '1px solid green');
            $('#checkfirstvilation').val('valid');
            $('#pros-create-schoolheadbtn').html('Create new');
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
            $('#pros-create-schoolheadbtn').html('Create new');

            $.wnoty({
                type: 'warning',
                message: "hey! enter your staff's last name.",
                autohideDelay: 5000
            });
        } else {
            $('.headlnamecover' + dataid).css('outline', '1px solid green');
            $('#checkfirstvilation').val('valid');
            $('#pros-create-schoolheadbtn').html('Create new');
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
            $('#pros-create-schoolheadbtn').html('Create new');

            $.wnoty({
                type: 'warning',
                message: "hey! email should not be blank",
                autohideDelay: 5000
            });
        } else {



            if (!emailPattern.test(lastnameemail)) {
                $.wnoty({
                    type: 'warning',
                    message: "hey! enter a valid email.",
                    autohideDelay: 5000
                });

                $('.heademailcover' + dataid).css('outline', '1px solid red');
                $('#checkfirstvilation').val('invalid');
                $('#pros-create-schoolheadbtn').html('Create new');
            } else {
                $('.heademailcover' + dataid).css('outline', '1px solid green');
                $('#checkfirstvilation').val('valid');
                $('#pros-create-schoolheadbtn').html('Create new');
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
            $('#pros-create-schoolheadbtn').html('Create new');

            $.wnoty({
                type: 'warning',
                message: "hey! enter your staff's number.",
                autohideDelay: 5000
            });
        } else {
            $('.headnumcover' + dataid).css('outline', '1px solid green');
            $('#checkfirstvilation').val('valid');
            $('#pros-create-schoolheadbtn').html('Create new');
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

    schoolheadname = schoolheadname.toString();
    schoooheadlastname = schoooheadlastname.toString();
    schoolphoneemail = schoolphoneemail.toString();
    formattedinput = formattedinput.toString();


    if (validatestatus == 'valid') {
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
                UserID: UserID
            },


            success: function(result) {

                if (result == 'found') {
                    $.wnoty({
                        type: 'warning',
                        message: "hey! this user alraedy exist",
                        autohideDelay: 5000
                    });


                } else {
                    $.wnoty({
                        type: 'success',
                        message: "hey! school head created successfully.",
                        autohideDelay: 5000
                    });

                    $('#pros-displayhead-setup').animate({
                        // opacity: 0.5,
                        left: '+=50',
                        height: 'toggle'
                    }, 1000);
                    $('#assignschoolheadfaculty').fadeIn('slow');



                }

            }

        });

    } else {

    }


})
//add school head setup end

// create teacher onboarding start here
$('body').on('click', '#createteacher-setup-btn', function(e) {
    $(this).html(
        '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>creating...'
    );

    var tagstate = $(this).data('tag');
    var groupSchoolID = $(this).data('school');
    var validatestatus = $('#checkvalidatedteacher').val();
    var UserID = "<?php echo $UserID; ?>";
    var usertype = '';

    var schoolheadname = [];

    $('.generalteacherfirstname').each(function() {
        schoolheadname.push($(this).val());

        var dataid = $(this).data('id');
        var firstnamevaliate = $('#teacherinsertid' + dataid).val();

        if (firstnamevaliate == '' || firstnamevaliate == ',') {
            $('.teacherfnamecover' + dataid).css('outline', '1px solid red');
            $('#checkvalidatedteacher').val('invalid');
            $('#createteacher-setup-btn').html('Create new');

            $.wnoty({
                type: 'warning',
                message: "hey! enter your staff's first name.",
                autohideDelay: 5000
            });
        } else {
            $('.teacherfnamecover' + dataid).css('outline', '1px solid green');
            $('#checkvalidatedteacher').val('valid');
            $('#createteacher-setup-btn').html('Create new');
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
            $('#createteacher-setup-btn').html('Create new');

            $.wnoty({
                type: 'warning',
                message: "hey! enter your staff's last name.",
                autohideDelay: 5000
            });
        } else {
            $('.teacherlnamecover' + dataid).css('outline', '1px solid green');
            $('#checkvalidatedteacher').val('valid');
            $('#createteacher-setup-btn').html('Create new');
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
            $('#createteacher-setup-btn').html('Create new');

            $.wnoty({
                type: 'warning',
                message: "hey! email should not be blank",
                autohideDelay: 5000
            });
        } else {



            if (!emailPattern.test(lastnameemail)) {
                $.wnoty({
                    type: 'warning',
                    message: "hey! enter a valid email.",
                    autohideDelay: 5000
                });

                $('.teacheremailcover' + dataid).css('outline', '1px solid red');
                $('#checkvalidatedteacher').val('invalid');
                $('#createteacher-setup-btn').html('Create new');
            } else {
                $('.teacheremailcover' + dataid).css('outline', '1px solid green');
                $('#checkvalidatedteacher').val('valid');
                $('#createteacher-setup-btn').html('Create new');
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
            $('#createteacher-setup-btn').html('Create new');

            $.wnoty({
                type: 'warning',
                message: "hey! enter your staff's number.",
                autohideDelay: 5000
            });
        } else {
            $('.teachernumcover' + dataid).css('outline', '1px solid green');
            $('#checkvalidatedteacher').val('valid');
            $('#createteacher-setup-btn').html('Create new');
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

    schoolheadname = schoolheadname.toString();
    schoooheadlastname = schoooheadlastname.toString();
    schoolphoneemail = schoolphoneemail.toString();
    formattedinput = formattedinput.toString();


    if (validatestatus == 'valid') {
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
                usertype: usertype
            },


            success: function(result) {
                $('#createteacher-setup-btn').html('Create new');
                if (result == 'found') {
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
                    $('#displayotherusersetupmessage').fadeIn('slow');

                }

            }

        });

    } else {

    }




});
// create teacher onboarding end here









// create admin onboarding start here
$('body').on('click', '#createadmin-setup-btn', function(e) {
    $(this).html(
        '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>creating...'
    );

    var tagstate = $(this).data('tag');
    var groupSchoolID = $(this).data('school');
    var validatestatus = $('#checkvalidatedadmin').val();
    var UserID = "<?php echo $UserID; ?>";

    var usertype = $('#usertypevalue-setup').val();



    var schoolheadname = [];

    $('.generaladminfirstname').each(function() {
        schoolheadname.push($(this).val());

        var dataid = $(this).data('id');
        var firstnamevaliate = $('#admininsertid' + dataid).val();

        if (firstnamevaliate == '' || firstnamevaliate == ',') {
            $('.adminfnamecover' + dataid).css('outline', '1px solid red');
            $('#checkvalidatedadmin').val('invalid');
            $('#createadmin-setup-btn').html('Create new');

            $.wnoty({
                type: 'warning',
                message: "hey! enter your staff's first name.",
                autohideDelay: 5000
            });
        } else {
            $('.adminfnamecover' + dataid).css('outline', '1px solid green');
            $('#checkvalidatedadmin').val('valid');
            $('#createadmin-setup-btn').html('Create new');
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
            $('#createadmin-setup-btn').html('Create new');

            $.wnoty({
                type: 'warning',
                message: "hey! enter your staff's last name.",
                autohideDelay: 5000
            });
        } else {
            $('.adminlnamecover' + dataid).css('outline', '1px solid green');
            $('#checkvalidatedadmin').val('valid');
            $('#createadmin-setup-btn').html('Create new');
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
            $('#createadmin-setup-btn').html('Create new');

            $.wnoty({
                type: 'warning',
                message: "hey! email should not be blank",
                autohideDelay: 5000
            });
        } else {



            if (!emailPattern.test(lastnameemail)) {
                $.wnoty({
                    type: 'warning',
                    message: "hey! enter a valid email.",
                    autohideDelay: 5000
                });

                $('.adminemailcover' + dataid).css('outline', '1px solid red');
                $('#checkvalidatedadmin').val('invalid');
                $('#createadmin-setup-btn').html('Create new');
            } else {
                $('.adminemailcover' + dataid).css('outline', '1px solid green');
                $('#checkvalidatedadmin').val('valid');
                $('#createadmin-setup-btn').html('Create new');
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
            $('#createadmin-setup-btn').html('Create new');

            $.wnoty({
                type: 'warning',
                message: "hey! enter your staff's number.",
                autohideDelay: 5000
            });
        } else {
            $('.adminnumcover' + dataid).css('outline', '1px solid green');
            $('#checkvalidatedadmin').val('valid');
            $('#createadmin-setup-btn').html('Create new');
        }

    });



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

    schoolheadname = schoolheadname.toString();
    schoooheadlastname = schoooheadlastname.toString();
    schoolphoneemail = schoolphoneemail.toString();
    formattedinput = formattedinput.toString();


    if (validatestatus == 'valid') {
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
                usertype: usertype
            },


            success: function(result) {
                $('#createadmin-setup-btn').html('Create new');
                if (result == 'found') {
                    $.wnoty({
                        type: 'warning',
                        message: "Hey!! this email already exist",
                        autohideDelay: 5000
                    });


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

                }

            }

        });

    } else {

    }




});
// create admin onboarding end here







// assign a school head to a section

$('body').on('click', '#assignschoolheadtofac-btn', function(e) {
    var tagstate = $(this).data('tag');
    var UserID = "<?php echo $UserID; ?>";
    var campusID = $(this).data('campus');



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




                $('#assignschoolheadfaculty').animate({
                    // opacity: 0.5,
                    left: '+=50',
                    height: 'toggle'
                }, 1000);
                $('#proscreateschool-teacher').fadeIn('slow');





            }

        });
    }

});
//assign a school head to a section end here


//move back btn by  steps

$('body').on('click', '#movebackbtn-setup', function(e) {


    var getback_wardbtn = $('#pros-displaybackvalue-tag').val();
    var UserID = "<?php echo $UserID; ?>";


    if (getback_wardbtn == '15') {



        $.ajax({
            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/updatesetup-backwardtag.php",
            data: {
                getback_wardbtn: getback_wardbtn,
                UserID: UserID
            },
            success: function(result) {


                $('#pros-displaybackvalue-tag').val(14);


                $('#pros-displayhead-setup').fadeOut('slow');

                $('#movebackbtn-setup').fadeOut('slow');

                $('#displaysection-content').fadeIn('slow');


            }
        });


    } else if (getback_wardbtn == '16') {

        $.ajax({
            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/updatesetup-backwardtag.php",
            data: {
                getback_wardbtn: getback_wardbtn,
                UserID: UserID
            },
            success: function(result) {
                $('#pros-displaybackvalue-tag').val(15);

                $('#assignschoolheadfaculty').fadeOut('slow');

                $('#pros-displayhead-setup').fadeIn('slow');


            }
        });

    } else if (getback_wardbtn == '17') {


        $.ajax({
            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/updatesetup-backwardtag.php",
            data: {
                getback_wardbtn: getback_wardbtn,
                UserID: UserID
            },
            success: function(result) {
                $('#pros-displaybackvalue-tag').val(16);

                $('#proscreateschool-teacher').fadeOut('slow');


                $('#assignschoolheadfaculty').fadeIn('slow');

            }
        });

    } else if (getback_wardbtn == '18') {

        $.ajax({
            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/updatesetup-backwardtag.php",
            data: {
                getback_wardbtn: getback_wardbtn,
                UserID: UserID
            },
            success: function(result) {
                $('#pros-displaybackvalue-tag').val(17);

                $('#createotherschooltype-setup').fadeOut('slow');


                $('#proscreateschool-teacher').fadeIn('slow');

            }
        });
    } else if (getback_wardbtn == '19') {

        $.ajax({
            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/updatesetup-backwardtag.php",
            data: {
                getback_wardbtn: getback_wardbtn,
                UserID: UserID
            },
            success: function(result) {
                $('#pros-displaybackvalue-tag').val(18);

                $('#createwelcomemsg-setup').fadeOut('slow');

                $('#pros-reducemodalclasstypesetup').css('width', '86%');

                $('#createotherschooltype-setup').fadeIn('slow');
            }
        });

    } else if (getback_wardbtn == '20') {
        $.ajax({
            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/updatesetup-backwardtag.php",
            data: {
                getback_wardbtn: getback_wardbtn,
                UserID: UserID
            },
            success: function(result) {
                $('#pros-displaybackvalue-tag').val(19);

                $('#createclasses-setup').fadeOut('slow');


                $('#pros-reducemodalclasstypesetup').css('width', '700px');

                $('#createwelcomemsg-setup').fadeIn('slow');

            }

        });
    } else if (getback_wardbtn == '21') {


        $.ajax({

            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/updatesetup-backwardtag.php",
            data: {
                getback_wardbtn: getback_wardbtn,
                UserID: UserID
            },
            success: function(result) {
                $('#pros-displaybackvalue-tag').val(20);

                $('#createsubject-setup').fadeOut('slow');


                $('#createclasses-setup').fadeIn('fast');
            }
        });

    } else if (getback_wardbtn == '22') {



        $.ajax({

            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/updatesetup-backwardtag.php",
            data: {
                getback_wardbtn: getback_wardbtn,
                UserID: UserID
            },
            success: function(result) {
                $('#pros-displaybackvalue-tag').val(21);


                $('#mergesubjectcontent').fadeOut('slow');
                $('#createsubject-setup').fadeIn('fast');
            }
        });



    } else if (getback_wardbtn == '23') {


        $.ajax({

            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/updatesetup-backwardtag.php",
            data: {
                getback_wardbtn: getback_wardbtn,
                UserID: UserID
            },
            success: function(result) {
                $('#pros-displaybackvalue-tag').val(22);
                $('#pros-assign-formteachercontent').fadeOut('slow');
                $('#mergesubjectcontent').fadeIn('fast');
            }
        });



    } else if (getback_wardbtn == '24') {

        $.ajax({

            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/updatesetup-backwardtag.php",
            data: {
                getback_wardbtn: getback_wardbtn,
                UserID: UserID
            },
            success: function(result) {
                $('#pros-displaybackvalue-tag').val(23);
                $('#assignsubject-teachercontainer').fadeOut('slow');
                $('#pros-assign-formteachercontent').fadeIn('fast');
            }
        });



    } else if (getback_wardbtn == '25') {
        $.ajax({

            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/updatesetup-backwardtag.php",
            data: {
                getback_wardbtn: getback_wardbtn,
                UserID: UserID
            },
            success: function(result) {
                $('#pros-displaybackvalue-tag').val(24);
                $('#pros-loadsession-termcontent').fadeOut('slow');
                $('#assignsubject-teachercontainer').fadeIn('fast');
            }
        });
    }






    // if(tagstatusnew == '15')
    // {
    //     $('#displaysection-content').fadeIn('slow');

    // }else if(tagstatusnew == '16')
    // {

    //     $('#pros-displayhead-setup').fadeIn('slow');
    //     $('#movebackbtn-setup').fadeIn('slow');
    //     $('#pros-displaybackvalue-tag').val(15);



    // }else if(tagstatusnew == '17')
    // {

    //     $('#assignschoolheadfaculty  ').fadeIn('slow');
    //     $('#movebackbtn-setup').fadeIn('slow');
    //     $('#pros-displaybackvalue-tag').val(16);

    // }else if(tagstatusnew == '18')
    // {
    //     $('#proscreateschool-teacher').fadeIn('slow');   
    //     $('#movebackbtn-setup').fadeIn('slow');
    //     $('#pros-displaybackvalue-tag').val(17);

    // }
});
//move back btn by  steps ends here






$('body').on('click', '#skipcreatestaff', function(e) {
    var getback_wardbtn = $(this).data('tag');
    var UserID = "<?php echo $UserID; ?>";


    $.ajax({
        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/updatesetup-backwardtag.php",
        data: {
            getback_wardbtn: getback_wardbtn,
            UserID: UserID
        },
        success: function(result) {

            $('#createotherschooltype-setup').animate({
                // opacity: 0.5,
                left: '+=50',
                height: 'toggle'
            }, 1000);

            $('#pros-reducemodalclasstypesetup').css('width', '700px');
            $('#createwelcomemsg-setup').fadeIn('slow');
        }
    });
});




$('body').on('click', '#proceedto-createclassbtn', function(e) {

    $(this).html(
        '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>loading...'
    );

    var getback_wardbtn = $(this).data('tag');
    var UserID = "<?php echo $UserID; ?>";


    $.ajax({
        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/updatesetup-backwardtag.php",
        data: {
            getback_wardbtn: getback_wardbtn,
            UserID: UserID
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
    var campusID = $(this).data('school');


    $(this).html(
        '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>creating...'
    );

    var valueclass = $(this).val();
    var classname = [];
    var FacultyID = [];

    $('.pros-generalclasssubmitval').each(function() {
        var valueclass = $(this).val();

        if (valueclass.trim() !== '') {
            classname.push($(this).val());
            FacultyID.push($(this).data('faculty'));
        }
    });

    classname = classname.toString();
    FacultyID = FacultyID.toString();




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
                FacultyID: FacultyID
            },
            success: function(result) {


                $('#createclass-setup-btn').html('Create class');

                if (result == 'found') {
                    $.wnoty({
                        type: 'warning',
                        message: "hey! this classs has been created before.",
                        autohideDelay: 5000
                    });


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


            }
        });
    }

});



// create class for btn
$('body').on('click', '#createsubject-setup-btn', function(e) {

    var tagstate = $(this).data('tag');
    var UserID = "<?php echo $UserID; ?>";
    var campusID = $(this).data('school');


    $(this).html(
        '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>creating...'
    );


    var subject = [];
    var classname = [];

    $('.pros-generalsubjectsubmitval').each(function() {
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


                $('#createsubject-setup-btn').html('Create subject');

                if (result == 'found') {
                    $.wnoty({
                        type: 'warning',
                        message: "hey! this subject has been created before.",
                        autohideDelay: 5000
                    });


                } else {
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

        $('#createotheeusertypecover').animate({
            left: '+=50',
            height: 'toggle'
        }, 1000);

        $('#admininputcoversetup').fadeIn('slow');
        $('#usertypevalue-setup').val(usertypecheck);

    }
});




//click yes to create other user btn



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


                // if (trimmedValue !== '' && !$('.displaytagappend' + facunaewid).find('span:contains(' + trimmedValue + ')').length) {
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

                    $('.pros-removeclassaddennew' + facunaewid).fadeIn('slow');
                }


            }
        }




    }

});



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
                            i + facunaewid + '"></i>  ' + trimmedValue,
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
    $(this).remove(); // Remove the parent element (including spaces)

});



// remove input appended subject
$('body').on('click', '#removeappeedinput-tag-subject', function(e) {

    var facultyId = $(this).data('id');

    // $('#pros-addappendedtag'+facultyId).remove();
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


$('body').on('click', '#createmergesubject-setup-btn', function() {

    var tagstate = $(this).data('tag');
    var UserID = "<?php echo $UserID; ?>";
    var campusID = $(this).data('school');


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

        }
    });
});


// assign form teacher here
$('body').on('click', '#assignformteacher-setup-btn', function() {
    $(this).html(
        '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>creating...'
    );

    var tagstate = $(this).data('tag');
    var UserID = "<?php echo $UserID; ?>";
    var campusID = $(this).data('school');




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
                    '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>loaing...'
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



                        var head_phone = window.intlTelInput(document.querySelector(
                            "#pros-headnumset"), {
                            separateDialCode: true,
                            preferredCountries: ["ng"],
                            hiddenInput: "full",
                            utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                        });



                        var head_phone = window.intlTelInput(document.querySelector(
                            "#pros-teachernumset"), {
                            separateDialCode: true,
                            preferredCountries: ["ng"],
                            hiddenInput: "full",
                            utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                        });

                        var head_phone = window.intlTelInput(document.querySelector(
                            "#pros-adminnumset"), {
                            separateDialCode: true,
                            preferredCountries: ["ng"],
                            hiddenInput: "full",
                            utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                        });


                        var tagstatusnew = '<?php echo $tagstate; ?>';




                        if (tagstatusnew == '15') {
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
                        }








                        $('body').on('click', '.pros-generalsechead', function() {

                            var facultyid = $(this).data('id');

                            const selectBtn = document.querySelector(
                                    ".prosopendrophead" + facultyid),
                                items = document.querySelectorAll(".item");

                            // Toggle the "open" class when the selectBtn is clicked
                            selectBtn.classList.toggle("open");
                        });


                        const selectBtnnewclass = document.querySelector(
                                ".getclassopenondocument-ready1"),
                            itemsclass = document.querySelectorAll(".listmeslist");
                        selectBtnnewclass.classList.toggle("open");


                        const selectBtnnewsubject = document.querySelector(
                                ".getsubjectopenondocument-ready1"),
                            itemssubject = document.querySelectorAll(
                                ".subjectlistmeslist");
                        selectBtnnewsubject.classList.toggle("open");


                        $('body').on('click', '.createclassgeneral', function() {
                            var facultyid = $(this).data('faculty');

                            const selectBtn = document.querySelector(
                                    ".pros-openclasswhenclick" +
                                    facultyid),
                                items = document.querySelectorAll(
                                    ".listmeslist");

                            // Toggle the "open" class when the selectBtn is clicked
                            selectBtn.classList.toggle("open");
                        });



                        $('body').on('click', '.createsubjectgeneral', function() {
                            var facultyid = $(this).data('faculty');

                            const selectBtn = document.querySelector(
                                    ".pros-opensubjectwhenclick" +
                                    facultyid),
                                items = document.querySelectorAll(
                                    ".subjectlistmeslist");

                            // Toggle the "open" subject when the selectBtn is clicked
                            selectBtn.classList.toggle("open");
                        });



                        //merging of subject dropdown 
                        $('body').on('click', '.createsubjectgeneralmerge', function() {
                            var facultyid = $(this).data('faculty');
                            aler(facultyid);

                            const selectBtn = document.querySelector(
                                    ".pros-opensubjectwhenclickmerge" +
                                    facultyid),
                                items = document.querySelectorAll(
                                    ".subjectlistmeslistmerge");

                            // Toggle the "open" subject when the selectBtn is clicked
                            selectBtn.classList.toggle("open");
                        });
                        //merging of subject dropdown 


                        $('body').on('change', '.pros-generalcheckschoolhead',
                            function() {
                                var facultyID = $(this).data('faculty');


                                let checked = parseInt($('.checkshoolheadnew' +
                                        facultyID + ':checked')
                                    .length);

                                btnText = document.querySelector(
                                    ".pros-headdisplaynumslected" + facultyID);

                                if (checked > 0) {
                                    btnText.innerText = `(${checked} Selected)`;
                                } else {
                                    btnText.innerText = "";
                                }
                            });



                        $('body').on('click', '.prosgenerallist-itemssel', function() {


                            var facultyID = $(this).data('id');

                            var facunewcheck = $(this).data('faculty');

                            var verychecked = $('.proscheckboxinside' +
                                facultyID).prop("checked");

                            if (verychecked) {
                                $('.proscheckboxinside' + facultyID).prop(
                                    "checked", false);
                            } else {
                                $('.proscheckboxinside' + facultyID).prop(
                                    "checked", true);
                            }

                            let checked = parseInt($('.checkshoolheadnew' +
                                    facunewcheck + ':checked')
                                .length);

                            btnText = document.querySelector(
                                ".pros-headdisplaynumslected" +
                                facunewcheck);

                            if (checked > 0) {
                                btnText.innerText = `(${checked} Selected)`;
                            } else {
                                btnText.innerText = "";
                            }
                        });



                    }
                })


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
                '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>loaing...'
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



                    var head_phone = window.intlTelInput(document.querySelector(
                        "#pros-headnumset"), {
                        separateDialCode: true,
                        preferredCountries: ["ng"],
                        hiddenInput: "full",
                        utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                    });



                    var head_phone = window.intlTelInput(document.querySelector(
                        "#pros-teachernumset"), {
                        separateDialCode: true,
                        preferredCountries: ["ng"],
                        hiddenInput: "full",
                        utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                    });

                    var head_phone = window.intlTelInput(document.querySelector(
                        "#pros-adminnumset"), {
                        separateDialCode: true,
                        preferredCountries: ["ng"],
                        hiddenInput: "full",
                        utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                    });


                    var tagstatusnew = '<?php echo $tagstate; ?>';




                    if (tagstatusnew == '15') {
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
                    }





                    $('body').on('click', '.pros-generalsechead', function() {

                        var facultyid = $(this).data('id');

                        const selectBtn = document.querySelector(
                                ".prosopendrophead" + facultyid),
                            items = document.querySelectorAll(".item");

                        // Toggle the "open" class when the selectBtn is clicked
                        selectBtn.classList.toggle("open");
                    });


                    const selectBtnnewclass = document.querySelector(
                            ".getclassopenondocument-ready1"),
                        itemsclass = document.querySelectorAll(".listmeslist");
                    selectBtnnewclass.classList.toggle("open");


                    const selectBtnnewsubject = document.querySelector(
                            ".getsubjectopenondocument-ready1"),
                        itemssubject = document.querySelectorAll(".subjectlistmeslist");
                    selectBtnnewsubject.classList.toggle("open");


                    $('body').on('click', '.createclassgeneral', function() {
                        var facultyid = $(this).data('faculty');

                        const selectBtn = document.querySelector(
                                ".pros-openclasswhenclick" +
                                facultyid),
                            items = document.querySelectorAll(".listmeslist");

                        // Toggle the "open" class when the selectBtn is clicked
                        selectBtn.classList.toggle("open");
                    });



                    $('body').on('click', '.createsubjectgeneral', function() {
                        var facultyid = $(this).data('faculty');

                        const selectBtn = document.querySelector(
                                ".pros-opensubjectwhenclick" +
                                facultyid),
                            items = document.querySelectorAll(
                                ".subjectlistmeslist");

                        // Toggle the "open" subject when the selectBtn is clicked
                        selectBtn.classList.toggle("open");
                    });



                    //merging of subject dropdown 
                    $('body').on('click', '.createsubjectgeneralmerge', function() {
                        var facultyid = $(this).data('faculty');

                        const selectBtn = document.querySelector(
                                ".pros-opensubjectwhenclickmerge" +
                                facultyid),
                            items = document.querySelectorAll(
                                ".subjectlistmeslistmerge");

                        // Toggle the "open" subject when the selectBtn is clicked
                        selectBtn.classList.toggle("open");
                    });
                    //merging of subject dropdown 


                    $('body').on('change', '.pros-generalcheckschoolhead', function() {
                        var facultyID = $(this).data('faculty');


                        let checked = parseInt($('.checkshoolheadnew' +
                                facultyID + ':checked')
                            .length);

                        btnText = document.querySelector(
                            ".pros-headdisplaynumslected" + facultyID);

                        if (checked > 0) {
                            btnText.innerText = `(${checked} Selected)`;
                        } else {
                            btnText.innerText = "";
                        }
                    });



                    $('body').on('click', '.prosgenerallist-itemssel', function() {


                        var facultyID = $(this).data('id');

                        var facunewcheck = $(this).data('faculty');

                        var verychecked = $('.proscheckboxinside' + facultyID)
                            .prop("checked");

                        if (verychecked) {
                            $('.proscheckboxinside' + facultyID).prop("checked",
                                false);
                        } else {
                            $('.proscheckboxinside' + facultyID).prop("checked",
                                true);
                        }

                        let checked = parseInt($('.checkshoolheadnew' +
                                facunewcheck + ':checked')
                            .length);

                        btnText = document.querySelector(
                            ".pros-headdisplaynumslected" +
                            facunewcheck);

                        if (checked > 0) {
                            btnText.innerText = `(${checked} Selected)`;
                        } else {
                            btnText.innerText = "";
                        }
                    });

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








// assign single subject to teacher here


$('body').on('click', '.pros-option', function() {

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
            alert(feedback);

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
    alert('hello');
    // var valuegotten = $(this).data('id');
    // var classID = $(this).data('class');
    // var staffID = $(this).data('staff');
    // var campusID = $(this).data('cam');
    // var selectedOption = $(this).find('.pros-optiongoteenserch-text' + valuegotten).text();
    // var UserID = "<?php echo $UserID; ?>";

    // var groupSchoolID = $(this).data('group');
    // var ownerfirst_Name = "<?php echo $PrimaryName; ?>";
    // var tagstate = $(this).data('tag');



    // $('.pros-displayallstaffselected' + classID).html(selectedOption);


    // var subjecID = [];
    // $('.pros-displayallstaffselected' + classID).each(function() {
    //     subjecID.push($(this).data('subject'));
    // });






    // $.ajax({

    //     type: "POST",
    //     url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/assignsubjectteacher-setup.php",
    //     data: {
    //         UserID: UserID,
    //         classID: classID,
    //         campusID: campusID,
    //         subjecID: subjecID,
    //         staffID: staffID
    //     },
    //     success: function(feedback) {


    //         var pros_output = (feedback);

    //         if (pros_output === 'success') {

    //             $.wnoty({
    //                 type: 'success',
    //                 message: "Great!! subject teacher assigned   successfully",
    //                 autohideDelay: 5000
    //             });


    //         }



    //     }
    // });


});
// assign all subject to teacher here


// assign form teacher here
$('body').on('click', '#pros-assignsubject-proceedbtn', function() {
    $(this).html(
        '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>creating...'
    );
    var tagstate = $(this).data('tag');
    var UserID = "<?php echo $UserID; ?>";
    var campusID = $(this).data('school');


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
                UserID: UserID
            },
            success: function(result) {
                $('#pros-assignsubject-proceedbtn').html('Proceed');
                $('#assignsubject-teachercontainer').animate({
                    left: '+=50',
                    height: 'toggle'
                }, 1000);

                $('#pros-loadsession-termcontent').fadeIn('slow');
            }
        });

    }

});
// assign form teacher here



// create term here
$('body').on('click', '#pros-createsession-termbtn', function() {
    $(this).html(
        '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>creating...'
    );

    var tagstate = $(this).data('tag');
    var UserID = "<?php echo $UserID; ?>";
    var campusID = $(this).data('school');

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



                if (pros_output === 'success') {

                    $.wnoty({
                        type: 'success',
                        message: "Great!! term and session set successfully",
                        autohideDelay: 5000
                    });

                    $('#pros-loadsession-termcontent').animate({
                        left: '+=50',
                        height: 'toggle'
                    }, 1000);

                    $('#pros-loadimportoption').fadeIn('slow');

                }


            }
        });
    }

});


$('body').on('click', '#pros-proceeimport-campussetup', function() {
    $(this).html(
        '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>creating...'
    );

    var tagstate = $(this).data('tag');
    var UserID = "<?php echo $UserID; ?>";
    var campusID = $(this).data('campus');
    var groupSchoolID = $(this).data('school');



    $.ajax({

        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/importsetup.php",
        data: {
            tagstate: tagstate,
            UserID: UserID,
            groupSchoolID: groupSchoolID,
            campusID: campusID
        },
        success: function(feedback) {


            var pros_output = (feedback);
            alert(pros_output);
            $('#pros-proceeimport-campussetup').html('Proceed');

            if (pros_output === 'success') {

                $.wnoty({
                    type: 'success',
                    message: "Great!! setup imported successfully",
                    autohideDelay: 5000
                });



            }


        }
    });
});
</script>