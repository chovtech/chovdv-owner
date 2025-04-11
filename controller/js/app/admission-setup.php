<script>


            $(document).ready(function () {
   
    

                    $('#abba_display_campus').html('<option><i class="fa fa-spinner fa-spin">Loading..</i></option>');
                  
                    var abba_get_stored_instituion_id = $('.abba-change-institution option:selected').data('id');
                    var abba_get_stored_instituion_name = $('.abba-change-institution option:selected').text();
                   
                
                    // get campus ajax
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
                    
            });         

$(document).ready(function() {







    // INITIALIZED IMAGE CROPPER HERE
    const $image_crop = $('#image_demo').croppie({
        enableExif: false,
        viewport: {
            width: 300,
            height: 500,
            type: 'square'
        },
        boundary: {
            width: 350,
            height: 350
        }
    });
    // INITIALIZED IMAGE CROPPER HERE



    // LOAD CURRENT TAB HERE
    $(function() {

        $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
            localStorage.setItem('lastresltsetTab', $(this).attr('href'));
        });

        var lastresltsetTab = localStorage.getItem('lastresltsetTab');

        if (lastresltsetTab) {
            $('[href="' + lastresltsetTab + '"]').tab('show');
        }

    });
    // LOAD CURRENT TAB HERE




    var admissiontag = localStorage.getItem("admissiontag");

    var UserID = "<?php echo $UserID; ?>";
    var IntitutionID = localStorage.getItem("abba-stored-institution-id");
    var prosadmissioncampus_storage = localStorage.getItem("addmissioncampus");
    var ownerfirst_Name = "<?php echo $PrimaryName; ?>";



    // prosloadadmissionclasses
    if (prosadmissioncampus_storage === undefined || prosadmissioncampus_storage === null ||
        prosadmissioncampus_storage === '') {

        var campusIDnew = [];

    } else {

        var campusIDnew = prosadmissioncampus_storage;
    }


    campusIDnew = campusIDnew.toString();



    $('#pros-loadadmissioncontenthere').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
        

    $.ajax({
        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/loadadmissioncontent.php",
        data: {
            UserID: UserID,
            IntitutionID: IntitutionID,
            campusID: campusIDnew,
            ownerfirst_Name: ownerfirst_Name
        },
        cache: false,
        success: function(result) {
            $('#pros-loadadmissioncontenthere').html(result);


            let prosdes_toggles = document.getElementsByClassName('prosadmindes-toggle');
            let prosdes_contentDiv = document.getElementsByClassName('prosadmindes-content');
            let prosdes_icons = document.getElementsByClassName('icon');

            for (let i = 0; i < prosdes_toggles.length; i++) {
                prosdes_toggles[i].addEventListener('click', () => {
                    if (parseInt(prosdes_contentDiv[i].style.height) != prosdes_contentDiv[
                            i].scrollHeight) {
                        prosdes_contentDiv[i].style.height = prosdes_contentDiv[i]
                            .scrollHeight + "px";
                        prosdes_toggles[i].style.color = "#0084e9";
                        prosdes_icons[i].classList.remove('fa-plus');
                        prosdes_icons[i].classList.add('fa-minus');
                    } else {
                        prosdes_contentDiv[i].style.height = "0px";
                        prosdes_toggles[i].style.color = "#111130";
                        prosdes_icons[i].classList.remove('fa-minus');
                        prosdes_icons[i].classList.add('fa-plus');
                    }

                    for (let j = 0; j < prosdes_contentDiv.length; j++) {
                        if (j !== i) {
                            prosdes_contentDiv[j].style.height = "0px";
                            toggles[j].style.color = "#111130";
                            prosdes_icons[j].classList.remove('fa-minus');
                            prosdes_icons[j].classList.add('fa-plus');
                        }
                    }
                });
            }

           
            //process image upload here   









            const selectImage = document.querySelector('.prosbacgroundimagesel');
            const inputFile = document.querySelector('.prosfilebackground');
            const imgArea = document.querySelector('.prosbackgroundimagearea');


            selectImage.addEventListener('click', function() {
                inputFile.click();
            });




            inputFile.addEventListener('change', function() {


                $('#prosloadonboardingmodal').css('z-index', '1040');
                // $('#pros-uploadstaffimage').css('z-index','1040');

                const image = this.files[0];

                const imagenew = new Image();
                imagenew.addEventListener('load', function() {
                    const desiredWidth = 667; // Replace with your desired width
                    const desiredHeight = 1000; // Replace with your desired height

                    const actualWidth = this.width;
                    const actualHeight = this.height;

                    if (actualWidth !== desiredWidth || actualHeight !==
                        desiredHeight) {



                        $.wnoty({
                            type: 'warning',
                            message: "Hey! your background image should be of dimension 667 x 1000.",
                            autohideDelay: 5000
                        });

                    } else {

                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $image_crop.croppie('bind', {
                                url: event.target.result
                            }).then(function() {
                                console.log('jQuery bind complete');
                            });
                        };
                        reader.readAsDataURL(image);

                        $('#pros-uploadstaffimage').modal('show');
                        //    reader.readAsDataURL(fileInputpros.files[0]);

                    }


                });

                imagenew.src = URL.createObjectURL(image);
            });




            $('.crop_image').click(function(event) {
                $image_crop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function(response) {
                    $('#pros-uploadstaffimage').modal('hide');







                    $('#wizardPicturePreview').attr('src', response);

                    const img = document.createElement('img');
                    const img2 = document.createElement('img');
                    img.classList.add(
                        'active'
                        ); // Replace 'your-custom-class' with your desired CSS class for styling the div
                    img.src = response;
                    imgArea.innerHTML = '';
                    imgArea.appendChild(img);



                    localStorage.setItem("admissionbackgroundimage", response);

                });


            });


            

            $('#pros-uploadstaffimage').on('hidden.bs.modal', function() {

                $('#prosloadonboardingmodal').css('z-index', '1060');
            });






            // load admission tag slid

            if (admissiontag === undefined || admissiontag === null || admissiontag === '') {


                $('#prosloadonboardingmodal').modal('show');

                $('#pros-admissionfirstwelcome').fadeIn('slow');
                $('#pros-generalnxtback').fadeOut();

            } else if (admissiontag == 'admissioncampus') {

                $('#prosdisplaycampuforamisssion').fadeIn('slow');
                $('#pros-generalnxtback').fadeOut();
                $('#prosloadonboardingmodal').modal('show');

            } else if (admissiontag == 'admissionclasses') {

                $('#prosloadonboardingmodal').modal('show');
                $('#prosdisplayclassesforadmission').fadeIn('slow');

                $('#pros-generalnxtback').fadeIn();

                let collapsibleHeaders = document.getElementsByClassName('collapsible__header');

                Array.from(collapsibleHeaders).forEach(header => {
                    header.addEventListener('click', () => {
                        header.parentElement.classList.toggle('collapsible--open');
                    });
                });




            } else if (admissiontag == 'admissionpayment') {

                $('#admissionquestionpayment').fadeIn('slow');
                $('#pros-generalnxtback').fadeIn();

                $('#prosloadonboardingmodal').modal('show');

                $('#prosloadonboardingmodal').modal('show');

            } else if (admissiontag == 'admissionprefixtag') {
                $('#prosloadpaymentprefixinput').fadeIn('slow');


                let collapsibleHeaders = document.getElementsByClassName('collapsible__header');

                Array.from(collapsibleHeaders).forEach(header => {
                    header.addEventListener('click', () => {
                        header.parentElement.classList.toggle('collapsible--open');
                    });
                });


                var pros_getprefixlocal = localStorage.getItem("admissionprefix");

                if (pros_getprefixlocal == '' || pros_getprefixlocal === null ||
                    pros_getprefixlocal === undefined) {} else {
                    $('#prosadmissionprefixinput').val(pros_getprefixlocal);
                }

                $('#prosloadonboardingmodal').modal('show');

            } else if (admissiontag == 'admissionexamchoice') {

                $('#pros-admissionchoiceofexam').fadeIn('slow');
                $('#prosloadonboardingmodal').modal('show');

            } else if (admissiontag == 'admissionfirstcongrats') {

                $('#pros-admissionadmistrativecongratemessage').fadeIn('slow');
                $('#prosloadonboardingmodal').modal('show');
                // $('.pros-stylemodalonboardingcontent').css('width', '700px');

            } else if (admissiontag == 'admissiontermsessionvalue') {

                $('#prosadmissiontermandsession').fadeIn('slow');

                var admissionterm_pros = localStorage.getItem("admissionterm");
                var admissionsession_pros = localStorage.getItem("admissionsession");

                if (admissionterm_pros == '' || admissionterm_pros === null ||
                    admissionterm_pros === undefined) {

                } else {
                    $('#termadmission').val(admissionterm_pros);
                }


                if (admissionsession_pros == '' || admissionsession_pros === null ||
                    admissionsession_pros === undefined) {

                } else {
                    $('#sessionadmission').val(admissionsession_pros);
                }
                $('#prosloadonboardingmodal').modal('show');

            } else if (admissiontag == 'admissiontitledes') {

                $('#prosadmissiondestitle').fadeIn('slow');

                var prosadmissiontitlegotten = localStorage.getItem("admissiontitle");
                var prosadmissiondesgotten = localStorage.getItem("admissiondescription");


                if (prosadmissiontitlegotten == '' || prosadmissiontitlegotten === null ||
                    prosadmissiontitlegotten === undefined) {

                } else {
                    $('#admissiontitle').val(prosadmissiontitlegotten);
                }


                if (prosadmissiondesgotten == '' || prosadmissiondesgotten === null ||
                    prosadmissiondesgotten === undefined) {

                } else {

                    $('#prosadmissondes').val(prosadmissiondesgotten);

                }

                $('#prosloadonboardingmodal').modal('show');

            } else if (admissiontag == 'admissionbenefitslid') {

                $('#prosadmissionbenefitcontaineer').fadeIn('slow');


                var prosgetbenefit = localStorage.getItem("admissionbenefit");

                if (prosgetbenefit == '' || prosgetbenefit === null || prosgetbenefit ===
                    undefined) {

                } else {

                    var prosperbenefitsplit = prosgetbenefit.split('###,');
                    var prosbenefit1 = prosperbenefitsplit[0].trim();
                    var prosbenefit2 = prosperbenefitsplit[1].trim();
                    var prosbenefit3 = prosperbenefitsplit[2].trim();
                    var prosbenefit4 = prosperbenefitsplit[3].trim();
                    var prosbenefit5 = prosperbenefitsplit[4].trim();


                    $('#prosbenefit1').val(prosbenefit1);
                    $('#prosbenefit2').val(prosbenefit2);
                    $('#prosbenefit3').val(prosbenefit3);
                    $('#prosbenefit4').val(prosbenefit4);
                    $('#prosbenefit5').val(prosbenefit5);

                }
                $('#prosloadonboardingmodal').modal('show');

            } else if (admissiontag == 'admissionfaqslid') {
                $('#prosadmissionfaqcontaineer').fadeIn('slow');

                var admissionfaquestiopros = localStorage.getItem("admissionfaqquestion");
                var admissionanswertiopros = localStorage.getItem("admissionfaqans");


                var prosfaqquestiongottenloc = localStorage.getItem("admissionfaqquestion");
                var prosfaqansergottenloc = localStorage.getItem("admissionfaqans");


                var prosquestionlastgotten = prosfaqquestiongottenloc.split('###,');
                var faqqustion1 = prosquestionlastgotten[0].trim();
                var faqqustion2 = prosquestionlastgotten[1].trim();
                var faqqustion3 = prosquestionlastgotten[2].trim();

                var prosanswerlastgotten = prosfaqansergottenloc.split('###,');



                var faqanswer1 = prosanswerlastgotten[0].trim();
                var faqanswer2 = prosanswerlastgotten[1].trim();
                var faqanswer3 = prosanswerlastgotten[2].trim();


                $('#prosfaquestion1').val(faqqustion1);
                $('#prosfaquestion2').val(faqqustion2);
                $('#prosfaquestion3').val(faqqustion3);

                $('#prosfaqanswer1').val(faqanswer1);
                $('#prosfaqanswer2').val(faqanswer2);
                $('#prosfaqanswer3').val(faqanswer3);

                $('#prosloadonboardingmodal').modal('show');


            } else if (admissiontag == 'admissionimages') {

                $('#prosadmissionwebimagescontaineer').fadeIn('slow');

                var prosgetbackgroundimage = localStorage.getItem("admissionbackgroundimage");

                //display background Image here
                if (prosgetbackgroundimage == '' || prosgetbackgroundimage === null ||
                    prosgetbackgroundimage === undefined) {} else {
                    const backgroundimage = document.createElement('img');
                    backgroundimage.classList.add(
                        'active'
                        ); // Replace 'your-custom-class' with your desired CSS class for styling the div
                    backgroundimage.src = prosgetbackgroundimage;
                    imgArea.innerHTML = '';
                    imgArea.appendChild(backgroundimage);

                }

                const selectImage = document.querySelector('.prosbacgroundimagesel');
            const inputFile = document.querySelector('.prosfilebackground');
            const imgArea = document.querySelector('.prosbackgroundimagearea');


            selectImage.addEventListener('click', function() {
                inputFile.click();
            });

                

            }

        }
    });
});





$('body').on('click', '#proceedto-toload-campus', function() {

    $('#pros-admissionfirstwelcome').animate({
        right: '+=50',
        height: 'toggle'
    }, 1);

    $('#prosdisplaycampuforamisssion').fadeIn('slow');

    localStorage.setItem("admissiontag", 'admissioncampus');

});




$('body').on('click', '.proscampuscard', function() {

    var campusdata = $(this).data("id");
    $(this).toggleClass("active-card");
    $(this).parent(".col").siblings().children(".proscampuscard").removeClass("active-card");

    $(this).animate({
            top: '-=20px'
        }, 200) // Move up
        .animate({
            top: '+=40px'
        }, 200) // Move down
        .animate({
            top: '-=40px'
        }, 200) // Move up
        .animate({
            top: '+=40px'
        }, 200)
        .animate({
            top: '-=20px'
        }, 200); // Move down
    var checkbox = $(this).find('input[type="radio"]');
    checkbox.prop('checked', !checkbox.prop('checked'));
});
//check active card 




$('body').on('click', '.pros-generalnxt', function() {
    var admissiontag = localStorage.getItem("admissiontag");
    var UserID = "<?php echo $UserID; ?>";
    var IntitutionID = localStorage.getItem("abba-stored-institution-id");
    var ownerfirst_Name = "<?php echo $PrimaryName; ?>";

    if (admissiontag == 'admissioncampus') {
        $('#prosloadonboardingmodal').modal('show');

        var campusID = [];

        $('.proscheckbox').each(function() {
            if ($(this).is(':checked')) {
                campusID.push($(this).val());
            }
        });


        if (campusID == '') {
            $.wnoty({
                type: 'warning',
                message: "Hey! Select campus before proceeding.",
                autohideDelay: 5000
            });

        } else {

            localStorage.setItem("addmissioncampus", campusID);
            localStorage.setItem("admissiontag", 'admissionclasses');
            campusID = campusID.toString();



            $('#pros-loadadmissioncontenthere').html(
                '<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>'
            );

            $.ajax({
                type: "POST",
                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/loadadmissioncontent.php",
                data: {
                    UserID: UserID,
                    IntitutionID: IntitutionID,
                    campusID: campusID,
                    ownerfirst_Name: ownerfirst_Name
                },
                cache: false,
                success: function(result) {

                    $('#pros-loadadmissioncontenthere').html(result);
                    $('#prosdisplaycampuforamisssion').fadeOut('slow');
                    $('#prosdisplayclassesforadmission').fadeIn('slow');


                    let collapsibleHeaders = document.getElementsByClassName('collapsible__header');

                    Array.from(collapsibleHeaders).forEach(header => {
                        header.addEventListener('click', () => {
                            header.parentElement.classList.toggle(
                                'collapsible--open');
                        });
                    });

                }
            });
        }
    } else if (admissiontag == 'admissionclasses') {
       

        $('#prosloadonboardingmodal').modal('show');

        var ownerfirst_Name = "<?php echo $PrimaryName; ?>";
        

        var classID = [];
        var campusID = [];
        var Classgroup = [];

     
        $('.pros-generalcheckschoolhead:checked').each(function() {
            var valuesubject = $(this).val();

            if (valuesubject.trim() !== '') {
                classID.push($(this).val());
                campusID.push($(this).data('campus'));
                Classgroup.push($(this).data('classgroup'));




            }
        });



        if (classID == '') {

            $.wnoty({
                type: 'warning',
                message: "Hey! Select class before proceeding.",
                autohideDelay: 5000
            });


        } else {

            $('.pros-generalnxt').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="visually-hidden">...</span>')
            classID = classID.toString();
            campusID = campusID.toString();

            $.ajax({
                type: "POST",
                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/pros-admissionclass.php",
                data: {
                    UserID: UserID,
                    IntitutionID: IntitutionID,
                    campusID: campusID,
                    classID: classID
                },
                cache: false,
                success: function(result) {

                    var prosfound = (result);
                   
                           
  

                        $('.pros-generalnxt').html('Next');
                    if (prosfound.trim() == 'success') {
                        $.wnoty({
                            type: 'success',
                            message: "Hey! record submitted successfully.",
                            autohideDelay: 5000
                        });


                        $('#pros-loadadmissioncontenthere').html(
                            '<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>'
                        );

                        $.ajax({
                            type: "POST",
                            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/loadadmissioncontent.php",
                            data: {
                                UserID: UserID,
                                IntitutionID: IntitutionID,
                                campusID: campusID,
                                ownerfirst_Name: ownerfirst_Name
                            },
                            cache: false,
                            success: function(result) {

                                $('#pros-loadadmissioncontenthere').html(result);


                                $('#prosdisplayclassesforadmission').fadeOut('slow');
                                $('#admissionquestionpayment').fadeIn('slow');

                            }
                        });

                        localStorage.setItem("addmissionclasses", classID);
                        localStorage.setItem("admissioncampuseachclass", campusID);
                        localStorage.setItem("admissiontag", 'admissionpayment');



                    }

                }


            });



        }


    } else if (admissiontag == 'admissionpayment') {

        $('#prosloadonboardingmodal').modal('show');

        var ownerfirst_Name = "<?php echo $PrimaryName; ?>";

        $(this).html(
            '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>setting...'
        );
        var prosadmissioncampus_storage = localStorage.getItem("addmissioncampus");

        var prosadmissionamount = $('#prosamountforallcampus').val();

        var prosadmissionamountforeach = [];
        var prosadmissionamounteacclassID = [];






        $('.prosgeneralamounteachclass').each(function() {

            prosadmissionamountforeach.push($(this).val());
            prosadmissionamounteacclassID.push($(this).data('id'));

            if ($(this).val() === '') {

                // $(this).css('outline', '1px solid red');
                isValidanseramount = false;
                return false; // Exit the loop if any field is empty
            } else {
                // $(this).css('outline', '1px solid green');
                isValidanseramount = true;
                return true;
            }
        });





        if (prosadmissionamountforeach == '' && prosadmissionamount == '') {

            $.wnoty({
                type: 'warning',
                message: "Hey! kindly input same amount for all classes or input for each class.",
                autohideDelay: 5000
            });

            $('.pros-generalnxt').html('Proceed <i class="fas fa-long-arrow-alt-right"></i>');

        } else if (prosadmissionamount != '' && prosadmissionamountforeach != '') {

            $.wnoty({
                type: 'warning',
                message: "Hey! two action can not be made at once. either input amount for all or input for each classes!!",
                autohideDelay: 5000
            });

            $('.pros-generalnxt').html('Proceed <i class="fas fa-long-arrow-alt-right"></i>');

        } else {

            prosadmissionamounteacclassID = prosadmissionamounteacclassID.toString();
            prosadmissionamountforeach = prosadmissionamountforeach.toString();




            if (prosadmissionamount == '') {

                if (isValidanseramount) {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/pros-insertadmissionamount.php",
                        data: {
                            UserID: UserID,
                            IntitutionID: IntitutionID,
                            prosadmissionamount: prosadmissionamount,
                            prosadmissionamounteacclassID: prosadmissionamounteacclassID,
                            prosadmissionamountforeach: prosadmissionamountforeach,
                            prosadmissioncampus_storage: prosadmissioncampus_storage
                        },
                        cache: false,
                        success: function(result) {

                            var prosfeedback = (result);
                            if (prosfeedback.trim() == 'success') {

                                $.wnoty({
                                    type: 'success',
                                    message: "Hey! amout set successfully.",
                                    autohideDelay: 5000
                                });




                                var campusID = prosadmissioncampus_storage;

                                // load admission content here
                                $('#pros-loadadmissioncontenthere').html(
                                    '<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>'
                                );

                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/loadadmissioncontent.php",
                                    data: {
                                        UserID: UserID,
                                        IntitutionID: IntitutionID,
                                        campusID: campusID,
                                        ownerfirst_Name: ownerfirst_Name
                                    },
                                    cache: false,
                                    success: function(result) {

                                        $('#pros-loadadmissioncontenthere').html(
                                            result);
                                        $('#prosloadpaymentinput').fadeOut('slow');

                                        $('#prosloadpaymentprefixinput').fadeIn('slow');

                                        localStorage.setItem("admissiontag",
                                            'admissionprefixtag');

                                        let collapsibleHeaders = document
                                            .getElementsByClassName(
                                                'collapsible__header');

                                        Array.from(collapsibleHeaders).forEach(
                                            header => {
                                                header.addEventListener('click',
                                                    () => {
                                                        header.parentElement
                                                            .classList.toggle(
                                                                'collapsible--open'
                                                            );
                                                    });
                                            });

                                    }
                                });

                                // load admission content here
                            } else {

                            }
                        }
                    });

                    $('.pros-generalnxt').html('Proceed <i class="fas fa-long-arrow-alt-right"></i>');

                } else {
                    $.wnoty({
                        type: 'warning',
                        message: "Hey! kindly input amount for all the classes before proceeding if want to create for each class.",
                        autohideDelay: 5000
                    });

                    $('.pros-generalnxt').html('Proceed <i class="fas fa-long-arrow-alt-right"></i>');
                }

            } else {



                $.ajax({
                    type: "POST",
                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/pros-insertadmissionamount.php",
                    data: {
                        UserID: UserID,
                        IntitutionID: IntitutionID,
                        prosadmissionamount: prosadmissionamount,
                        prosadmissionamounteacclassID: prosadmissionamounteacclassID,
                        prosadmissionamountforeach: prosadmissionamountforeach,
                        prosadmissioncampus_storage: prosadmissioncampus_storage
                    },
                    cache: false,
                    success: function(result) {

                        var prosfeedback = (result);

                        $('.pros-generalnxt').html(
                            'Proceed <i class="fas fa-long-arrow-alt-right"></i>');
                        if (prosfeedback.trim() == 'success') {

                            $.wnoty({
                                type: 'success',
                                message: "Hey! amout set successfully.",
                                autohideDelay: 5000
                            });

                            var campusID = prosadmissioncampus_storage;

                            // load admission content here
                            $('#pros-loadadmissioncontenthere').html(
                                '<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>'
                            );

                            $.ajax({
                                type: "POST",
                                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/loadadmissioncontent.php",
                                data: {
                                    UserID: UserID,
                                    IntitutionID: IntitutionID,
                                    campusID: campusID,
                                    ownerfirst_Name: ownerfirst_Name
                                },
                                cache: false,
                                success: function(result) {

                                    $('#pros-loadadmissioncontenthere').html(result);


                                    $('#prosloadpaymentinput').fadeOut('slow');

                                    $('#prosloadpaymentprefixinput').fadeIn('slow');

                                    localStorage.setItem("admissiontag",
                                        'admissionprefixtag');

                                    let collapsibleHeaders = document
                                        .getElementsByClassName('collapsible__header');

                                    Array.from(collapsibleHeaders).forEach(header => {
                                        header.addEventListener('click', () => {
                                            header.parentElement
                                                .classList.toggle(
                                                    'collapsible--open'
                                                );
                                        });
                                    });

                                }
                            });

                            // load admission content here


                        } else {

                        }


                    }
                });


            }
        }



    } else if (admissiontag == 'admissionprefixtag') {

        $('#prosloadonboardingmodal').modal('show');

        var prosadmissionprefix = $('#prosadmissionprefixinput').val();

        if (prosadmissionprefix == '') {

            $.wnoty({
                type: 'warning',
                message: "Hey! admission prefix should not be left blank.",
                autohideDelay: 5000
            });

            $('#prosadmissionprefixinput').css('outline', '1px solid red');

        } else {

            $('#prosadmissionprefixinput').css('outline', '1px solid green');

            $('#prosloadpaymentprefixinput').animate({
                right: '+=50',
                height: 'toggle'
            }, 1);


            $('#pros-admissionchoiceofexam').fadeIn('slow');

            localStorage.setItem("admissiontag", 'admissionexamchoice');
            localStorage.setItem("admissionprefix", prosadmissionprefix);

            // INSERT FIRST WIZARD HERE  
            var CampusIDcompleted = localStorage.getItem("addmissioncampus");

            // var admissionclasses = localStorage.getItem("addmissionclasses");
            // var admissionclasses_campus = localStorage.getItem("admissioncampuseachclass");
            var prosadmissionamountgotten = localStorage.getItem("admissionamount");

            var UserID = "<?php echo $UserID; ?>";

            var IntitutionID = localStorage.getItem("abba-stored-institution-id");



            if (prosadmissionamountgotten == '' || prosadmissionamountgotten === null ||
                prosadmissionamountgotten === undefined) {

                var pros_amountfinalgotten = '';

            } else {

                var pros_amountfinalgotten = prosadmissionamountgotten;
            }

            $.ajax({
                type: "POST",
                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosinsertamissionfirst-setup.php",
                data: {

                    CampusIDcompleted: CampusIDcompleted,
                    prosadmissionprefix: prosadmissionprefix,
                    IntitutionID: IntitutionID,
                    UserID: UserID

                },
                cache: false,
                success: function(outpust) {

                    var successfound = (outpust);

                    if (successfound.trim() == 'success') {
                        $.wnoty({
                            type: 'success',
                            message: "Great! record submitted successfully.",
                            autohideDelay: 5000
                        });
                    }

                }
            });
            // INSERT FIRST WIZARD HERE  

        }


    } else if (admissiontag == 'admissiontermsessionvalue') {


        $('#prosloadonboardingmodal').modal('show');

        var admissionsession = $('#sessionadmission').val();
        var admisiionterm = $('#termadmission').val();



        if (admissionsession == '0' || admisiionterm == '0') {

            $.wnoty({
                type: 'warning',
                message: "Hey! term or session should not be left empty.",
                autohideDelay: 5000
            });

        } else {

            localStorage.setItem("admissionterm", admisiionterm);
            localStorage.setItem("admissionsession", admissionsession);
            localStorage.setItem("admissiontag", 'admissiontitledes');

            $('#prosadmissiontermandsession').animate({
                right: '+=50',
                height: 'toggle'
            }, 1);

            $('#prosadmissiondestitle').fadeIn('slow');



            var prosadmissiontitlegotten = localStorage.getItem("admissiontitle");
            var prosadmissiondesgotten = localStorage.getItem("admissiondescription");


            if (prosadmissiontitlegotten == '' || prosadmissiontitlegotten === null ||
                prosadmissiontitlegotten === undefined) {

            } else {
                $('#admissiontitle').val(prosadmissiontitlegotten);
            }


            if (prosadmissiondesgotten == '' || prosadmissiondesgotten === null || prosadmissiondesgotten ===
                undefined) {

            } else {
                $('#prosadmissondes').val(prosadmissiondesgotten);
            }

        }

    } else if (admissiontag == 'admissiontitledes') {

        $('#prosloadonboardingmodal').modal('show');

        var prosadmissiondescription = $('#prosadmissondes').val();
        var admissiontitle = $('#admissiontitle').val();


        if (admissiontitle == '') {

            $.wnoty({
                type: 'warning',
                message: "Hey! title should not be left empty.",
                autohideDelay: 5000
            });


        } else if (prosadmissiondescription == '') {

            $.wnoty({
                type: 'warning',
                message: "Hey! description should not be left empty.",
                autohideDelay: 5000
            });

        } else {


            localStorage.setItem("admissiontitle", admissiontitle);
            localStorage.setItem("admissiondescription", prosadmissiondescription);
            localStorage.setItem("admissiontag", 'admissionbenefitslid');


            $('#prosadmissiondestitle').animate({
                right: '+=50',
                height: 'toggle'
            }, 1);

            $('#prosadmissionbenefitcontaineer').fadeIn('slow');



            var prosgetbenefit = localStorage.getItem("admissionbenefit");

            if (prosgetbenefit == '' || prosgetbenefit === null || prosgetbenefit === undefined) {

            } else {

                var prosperbenefitsplit = prosgetbenefit.split('###,');
                var prosbenefit1 = prosperbenefitsplit[0].trim();
                var prosbenefit2 = prosperbenefitsplit[1].trim();
                var prosbenefit3 = prosperbenefitsplit[2].trim();
                var prosbenefit4 = prosperbenefitsplit[3].trim();
                var prosbenefit5 = prosperbenefitsplit[4].trim();


                $('#prosbenefit1').val(prosbenefit1);
                $('#prosbenefit2').val(prosbenefit2);
                $('#prosbenefit3').val(prosbenefit3);
                $('#prosbenefit4').val(prosbenefit4);
                $('#prosbenefit5').val(prosbenefit5);



            }

        }


    } else if (admissiontag == 'admissionbenefitslid') {


        $('#prosloadonboardingmodal').modal('show');

        var prospergeneralifnput = [];

        $('.prosgeneralbenefit').each(function() {
            prospergeneralifnput.push($(this).val() + "###");

            if ($(this).val() === '') {
                $(this).css('outline', '1px solid red');

                isValid = false;
                return false; // Exit the loop if any field is empty
            } else {
                $(this).css('outline', '1px solid green');

                isValid = true;
                return true;
            }
        });


        if (isValid) {



            localStorage.setItem("admissionbenefit", prospergeneralifnput);
            localStorage.setItem("admissiontag", 'admissionfaqslid');


            $('#prosadmissionbenefitcontaineer').animate({
                right: '+=50',
                height: 'toggle'
            }, 1);

            $('#prosadmissionfaqcontaineer').fadeIn('slow');

            var prosfaqquestiongottenloc = localStorage.getItem("admissionfaqquestion");
            var prosfaqansergottenloc = localStorage.getItem("admissionfaqans");


            var prosquestionlastgotten = prosfaqquestiongottenloc.split('###,');
            var faqqustion1 = prosquestionlastgotten[0].trim();
            var faqqustion2 = prosquestionlastgotten[1].trim();
            var faqqustion3 = prosquestionlastgotten[2].trim();

            var prosanswerlastgotten = prosfaqansergottenloc.split('###,');



            var faqanswer1 = prosanswerlastgotten[0].trim();
            var faqanswer2 = prosanswerlastgotten[1].trim();
            var faqanswer3 = prosanswerlastgotten[2].trim();


            $('#prosfaquestion1').val(faqqustion1);
            $('#prosfaquestion2').val(faqqustion2);
            $('#prosfaquestion3').val(faqqustion3);

            $('#prosfaqanswer1').val(faqanswer1);
            $('#prosfaqanswer2').val(faqanswer2);
            $('#prosfaqanswer3').val(faqanswer3);



        } else {


            $.wnoty({
                type: 'warning',
                message: "Hey! Please ensure that all benefits are filled before proceeding.",
                autohideDelay: 5000
            });
        }



    } else if (admissiontag == 'admissionfaqslid') {

        $('#prosloadonboardingmodal').modal('show');

        var prosfaqqusetion = [];

        $('.prosgeneralfaqquestion').each(function() {
            prosfaqqusetion.push($(this).val() + '###');

            if ($(this).val() === '' || $(this).val() == '###') {
                $(this).css('outline', '1px solid red');

                isValidquestion = false;
                return false; // Exit the loop if any field is empty
            } else {
                $(this).css('outline', '1px solid green');

                isValidquestion = true;
                return true;
            }
        });


        var prosfaqans = [];
        $('.generalfaqanswers').each(function() {
            prosfaqans.push($(this).val() + '###');

            if ($(this).val() === '' || $(this).val() == '###') {

                $(this).css('outline', '1px solid red');

                isValidanser = false;
                return false; // Exit the loop if any field is empty
            } else {
                $(this).css('outline', '1px solid green');

                isValidanser = true;
                return true;
            }
        });


        if (isValidquestion && isValidanser) {

            localStorage.setItem("admissionfaqquestion", prosfaqqusetion);
            localStorage.setItem("admissionfaqans", prosfaqans);
            localStorage.setItem("admissiontag", 'admissionimages');



            $('#prosadmissionfaqcontaineer').animate({
                right: '+=50',
                height: 'toggle'
            }, 1);

            $('#prosadmissionwebimagescontaineer').fadeIn('slow');

            const imgArea = document.querySelector('.prosbackgroundimagearea');

            // const imgAreabanner = document.querySelector('.prosbannerimagearea');

            var prosgetbackgroundimage = localStorage.getItem("admissionbackgroundimage");

            //display background Image here
            if (prosgetbackgroundimage == '' || prosgetbackgroundimage === null || prosgetbackgroundimage ===
                undefined) {

            } else {

                const backgroundimage = document.createElement('img');
                backgroundimage.classList.add(
                    'active'); // Replace 'your-custom-class' with your desired CSS class for styling the div
                backgroundimage.src = prosgetbackgroundimage;
                imgArea.innerHTML = '';
                imgArea.appendChild(backgroundimage);

            }
            //display background Image here

        } else {


            $.wnoty({
                type: 'warning',
                message: "Hey! Please ensure that all FAQS and answers are filled before proceeding.",
                autohideDelay: 5000
            });
        }


    } else if (admissiontag == 'admissionimages') {

        $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');


        // $('.pros-generalnxt').html('Proceed <i class="fas fa-long-arrow-alt-right"></i>');



       
          

                $('#prosloadonboardingmodal').modal('show');

             var selectImageding = document.querySelector('.prosbacgroundimagesel');
            var inputFileonborading = document.querySelector('.prosfilebackground');
            // const imgArea = document.querySelector('.prosbackgroundimagearea');


            selectImageding.addEventListener('click', function() {
                inputFileonborading.click();
            });


        $('.crop_image').click(function (event) {
            $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function (response) {
                $('#pros-uploadstaffimage').modal('hide');
                $('#wizardPicturePreview').attr('src', response);

                const img = document.createElement('img');
                const img2 = document.createElement('img');
                img.classList.add(
                    'active'); // Replace 'your-custom-class' with your desired CSS class for styling the div
                img.src = response;
                imgArea.innerHTML = '';
                imgArea.appendChild(img);

                localStorage.setItem("admissionbackgroundimage", response);


            });
        });



        var campusIDnew = $(this).data('campus');
        campusIDnew = campusIDnew.toString();



        var backgroundimage = localStorage.getItem("admissionbackgroundimage");
        var admissiontermgotten = localStorage.getItem("admissionterm");
        var admissionsessiongotten = localStorage.getItem("admissionsession");
        var admissiontitlegotten = localStorage.getItem("admissiontitle");
        var admissiondescription = localStorage.getItem("admissiondescription");

        var admissionbenefit = localStorage.getItem("admissionbenefit");


        var prosfrequntlyaskedquestion = localStorage.getItem("admissionfaqquestion");
        var frequntlyaskedques_answer = localStorage.getItem("admissionfaqans");


        var UserID = "<?php echo $UserID; ?>";
        var IntitutionID = localStorage.getItem("abba-stored-institution-id");

        if (backgroundimage == '' || backgroundimage === null || backgroundimage === undefined) {


            $.wnoty({
                type: 'warning',
                message: "Hey! kindly upload background image before proceeeding.",
                autohideDelay: 5000
            });
            $('#pros-uploadstaffimagebanner').modal('hide');

        } else {



            admissionbenefit = admissionbenefit.toString();
            frequntlyaskedques_answer = frequntlyaskedques_answer.toString();
            prosfrequntlyaskedquestion = prosfrequntlyaskedquestion.toString();





            //INSERT FIRST SECOND WIZARD HERE 

            $.ajax({
                type: "POST",
                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosinsertadmissionsecond-setup.php",
                data: {

                    backgroundimage: backgroundimage,
                    admissiontermgotten: admissiontermgotten,
                    admissionsessiongotten: admissionsessiongotten,
                    admissiontitlegotten: admissiontitlegotten,
                    admissiondescription: admissiondescription,
                    admissionbenefit: admissionbenefit,
                    prosfrequntlyaskedquestion: prosfrequntlyaskedquestion,
                    frequntlyaskedques_answer: frequntlyaskedques_answer,
                    UserID: UserID,
                    IntitutionID: IntitutionID,
                    campusID: campusIDnew

                },
                cache: false,
                success: function(output) {


                    $('.pros-generalnxt').html(
                    'Proceed <i class="fas fa-long-arrow-alt-right"></i>');
                    var successfound = (output);





                    if (successfound.trim() == 'success') {

                        $('#prosloadonboardingmodal').modal('hide');

                        $.wnoty({
                            type: 'success',
                            message: "Hey! admission set up completed successfully.",
                            autohideDelay: 5000
                        });

                        localStorage.removeItem("admissionbannerimage");
                        localStorage.removeItem("admissionbackgroundimage");
                        localStorage.removeItem("admissionterm");
                        localStorage.removeItem("admissionsession");
                        localStorage.removeItem("admissiontitle");
                        localStorage.removeItem("admissiondescription");
                        localStorage.removeItem("admissionbenefit");
                        localStorage.removeItem("admissionfaqquestion");
                        localStorage.removeItem("admissionfaqans");

                        localStorage.removeItem("addmissioncampus");
                        localStorage.removeItem("addmissionclasses");
                        localStorage.removeItem("admissioncampuseachclass");
                        localStorage.removeItem("admissionamount");
                        localStorage.removeItem("admissiontag");
                        localStorage.removeItem("admissionprefix");
                        var ownerfirst_Name = "<?php echo $PrimaryName; ?>";
                        
                        location.reload();

                        $('#pros-loadadmissioncontenthere').html(
                            '<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>'
                            );

                        $.ajax({

                            type: "POST",
                            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/loadadmissioncontent.php",
                            data: {

                                UserID: UserID,
                                IntitutionID: IntitutionID,
                                campusID: campusIDnew,
                                ownerfirst_Name: ownerfirst_Name
                            },
                            cache: false,
                            success: function(result) {

                                $('#pros-loadadmissioncontenthere').html(result);

                            }


                        });
                    }

                }
            });

            // INSERT FIRST SECOND WIZARD HERE 

        }



    }


});

//PROS SKIPWEB CONTENT SETUP HERE  

$('body').on('click', '.pros-skipwebcontent', function() {

    var UserID = "<?php echo $UserID; ?>";
    var IntitutionID = localStorage.getItem("abba-stored-institution-id");
    var campusIDnew = $(this).data('campus');


    var prosadmissioncampus_storage = localStorage.getItem("addmissioncampus");
    var ownerfirst_Name = "<?php echo $PrimaryName; ?>";

    campusIDnew = campusIDnew.toString();




    $.ajax({
        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosskiptwebcontent.php",
        data: {
            UserID: UserID,
            IntitutionID: IntitutionID,
            campusID: campusIDnew
        },
        cache: false,
        success: function(result) {

            if (result.trim() == 'success') {

                $.wnoty({
                    type: 'success',
                    message: "Great!!. setup completed successfully",
                    autohideDelay: 5000
                });


                $('#prosloadonboardingmodal').modal('hide');


                // load setup content here
                $.ajax({
                    type: "POST",
                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/loadadmissioncontent.php",
                    data: {
                        UserID: UserID,
                        IntitutionID: IntitutionID,
                        campusID: campusIDnew,
                        ownerfirst_Name: ownerfirst_Name
                    },
                    cache: false,
                    success: function(result) {
                        $('#pros-loadadmissioncontenthere').html(result);

                    }
                });
                // load setup content here

            }

        }
    });


});
//PROS SKIPWEB CONTENT SETUP HERE  



$('body').on('click', '.prospaymentnxt', function() {


    $('#admissionquestionpayment').animate({
        right: '+=50',
        height: 'toggle'
    }, 1);

    $('#prosloadpaymentinput').fadeIn('slow');

    var prosloaclamountset = localStorage.getItem("admissionamount");


    if (prosloaclamountset == '' || prosloaclamountset === null || prosloaclamountset === undefined) {} else {
        $('#prosadmissionamount').val(prosloaclamountset);
    }
});




// MOVE WIZARD BACK WIZARD HERE

$('body').on('click', '.pros-generalnxtback', function() {

    var admissiontag = localStorage.getItem("admissiontag");

    if (admissiontag == 'admissionclasses') {
        $('#prosdisplayclassesforadmission').animate({
            right: '+=50',
            height: 'toggle'
        }, 1);

        $('#prosdisplaycampuforamisssion').fadeIn('slow');
        $('#pros-generalnxtback').fadeOut();

        localStorage.setItem("admissiontag", 'admissioncampus');

        $('#prosloadonboardingmodal').modal('show');

    } else if (admissiontag == 'admissionpayment') {



        $('#admissionquestionpayment').fadeOut();
         
        $('#prosloadpaymentinput').fadeOut();
          

        $('#prosdisplayclassesforadmission').fadeIn('slow');
        $('#pros-generalnxtback').fadeIn();
        localStorage.setItem("admissiontag", 'admissionclasses');



       

        $('#prosloadonboardingmodal').modal('show');
         let collapsibleHeaders = document.getElementsByClassName('collapsible__header');

        Array.from(collapsibleHeaders).forEach(header => {
            header.addEventListener('click', () => {
                header.parentElement.classList.toggle('collapsible--open');
            });
        });


    } else if (admissiontag == 'admissionprefixtag') {

        $('#prosloadpaymentprefixinput').animate({
            right: '+=50',
            height: 'toggle'
        }, 1);


        $('#admissionquestionpayment').fadeIn('slow');

        localStorage.setItem("admissiontag", 'admissionpayment');

        $('#prosloadonboardingmodal').modal('show');
        // $('.pros-stylemodalonboardingcontent').css('width', '86%');


    } else if (admissiontag == 'admissionexamchoice') {


        $('#pros-admissionchoiceofexam').animate({
            right: '+=50',
            height: 'toggle'
        }, 1);


        $('#prosloadpaymentprefixinput').fadeIn('slow');

        localStorage.setItem("admissiontag", 'admissionprefixtag');

        let collapsibleHeaders = document.getElementsByClassName('collapsible__header');

        Array.from(collapsibleHeaders).forEach(header => {
            header.addEventListener('click', () => {

                header.parentElement.classList.toggle('collapsible--open');
            });
        });


        var pros_getprefixlocal = localStorage.getItem("admissionprefix");

        if (pros_getprefixlocal == '' || pros_getprefixlocal === null || pros_getprefixlocal ===
            undefined) {} else {
            $('#prosadmissionprefixinput').val(pros_getprefixlocal);
        }

        $('#prosloadonboardingmodal').modal('show');

    } else if (admissiontag == 'admissionfirstcongrats') {


        $('#pros-admissionadmistrativecongratemessage').animate({
            right: '+=50',
            height: 'toggle'
        }, 1);

        $('#pros-admissionchoiceofexam').fadeIn('slow');

        localStorage.setItem("admissiontag", 'admissionexamchoice');

        $('#prosloadonboardingmodal').modal('show');

    } else if (admissiontag == 'admissiontermsessionvalue') {



        $('#prosadmissiontermandsession').animate({
            right: '+=50',
            height: 'toggle'
        }, 1);

        $('#pros-admissionadmistrativecongratemessage').fadeIn('slow');

        localStorage.setItem("admissiontag", 'admissionfirstcongrats');

        $('#prosloadonboardingmodal').modal('show');


    } else if (admissiontag == 'admissiontitledes') {


        localStorage.setItem("admissiontag", 'admissiontermsessionvalue');

        $('#prosadmissiondestitle').animate({
            right: '+=50',
            height: 'toggle'
        }, 1);

        $('#prosadmissiontermandsession').fadeIn('slow');


        var admissionterm_pros = localStorage.getItem("admissionterm");
        var admissionsession_pros = localStorage.getItem("admissionsession");

        if (admissionterm_pros == '' || admissionterm_pros === null || admissionterm_pros === undefined) {

        } else {
            $('#termadmission').val(admissionterm_pros);
        }


        if (admissionsession_pros == '' || admissionsession_pros === null || admissionsession_pros ===
            undefined) {

        } else {
            $('#sessionadmission').val(admissionsession_pros);
        }


        $('#prosloadonboardingmodal').modal('show');

    } else if (admissiontag == 'admissionbenefitslid') {

        $('#prosadmissionbenefitcontaineer').animate({
            right: '+=50',
            height: 'toggle'
        }, 1);

        $('#prosadmissiondestitle').fadeIn('slow');

        localStorage.setItem("admissiontag", 'admissiontitledes');

        var prosadmissiontitlegotten = localStorage.getItem("admissiontitle");
        var prosadmissiondesgotten = localStorage.getItem("admissiondescription");


        if (prosadmissiontitlegotten == '' || prosadmissiontitlegotten === null || prosadmissiontitlegotten ===
            undefined) {

        } else {
            $('#admissiontitle').val(prosadmissiontitlegotten);
        }


        if (prosadmissiondesgotten == '' || prosadmissiondesgotten === null || prosadmissiondesgotten ===
            undefined) {

        } else {
            $('#prosadmissondes').val(prosadmissiondesgotten);
        }

        $('#prosloadonboardingmodal').modal('show');

    } else if (admissiontag == 'admissionfaqslid') {

        $('#prosadmissionfaqcontaineer').animate({
            right: '+=50',
            height: 'toggle'
        }, 1);

        $('#prosadmissionbenefitcontaineer').fadeIn('slow');
        localStorage.setItem("admissiontag", 'admissionbenefitslid');

        var prosgetbenefit = localStorage.getItem("admissionbenefit");

        if (prosgetbenefit == '' || prosgetbenefit === null || prosgetbenefit === undefined) {

        } else {

            var prosperbenefitsplit = prosgetbenefit.split('###,');
            var prosbenefit1 = prosperbenefitsplit[0].trim();
            var prosbenefit2 = prosperbenefitsplit[1].trim();
            var prosbenefit3 = prosperbenefitsplit[2].trim();
            var prosbenefit4 = prosperbenefitsplit[3].trim();
            var prosbenefit5 = prosperbenefitsplit[4].trim();


            $('#prosbenefit1').val(prosbenefit1);
            $('#prosbenefit2').val(prosbenefit2);
            $('#prosbenefit3').val(prosbenefit3);
            $('#prosbenefit4').val(prosbenefit4);
            $('#prosbenefit5').val(prosbenefit5);

        }


        $('#prosloadonboardingmodal').modal('show');



    } else if (admissiontag == 'admissionimages') {

        $('#prosadmissionwebimagescontaineer').animate({
            right: '+=50',
            height: 'toggle'
        }, 1);

        $('#prosadmissionfaqcontaineer').fadeIn('slow');

        localStorage.setItem("admissiontag", 'admissionfaqslid');

        var admissionfaquestiopros = localStorage.getItem("admissionfaqquestion");
        var admissionanswertiopros = localStorage.getItem("admissionfaqans");


        var prosfaqquestiongottenloc = localStorage.getItem("admissionfaqquestion");
        var prosfaqansergottenloc = localStorage.getItem("admissionfaqans");


        var prosquestionlastgotten = prosfaqquestiongottenloc.split('###,');
        var faqqustion1 = prosquestionlastgotten[0].trim();
        var faqqustion2 = prosquestionlastgotten[1].trim();
        var faqqustion3 = prosquestionlastgotten[2].trim();
        var prosanswerlastgotten = prosfaqansergottenloc.split('###,');
        var faqanswer1 = prosanswerlastgotten[0].trim();
        var faqanswer2 = prosanswerlastgotten[1].trim();
        var faqanswer3 = prosanswerlastgotten[2].trim();


        $('#prosfaquestion1').val(faqqustion1);
        $('#prosfaquestion2').val(faqqustion2);
        $('#prosfaquestion3').val(faqqustion3);

        $('#prosfaqanswer1').val(faqanswer1);
        $('#prosfaqanswer2').val(faqanswer2);
        $('#prosfaqanswer3').val(faqanswer3);
    }

    $('#prosloadonboardingmodal').modal('show');
});
// MOVE WIZARD BACK WIZARD END HERE





// skip admission payment here

$('body').on('click', '.prosskippayment', function() {


    localStorage.setItem("admissiontag", 'admissionprefixtag');

    $('#admissionquestionpayment').animate({
        right: '+=50',
        height: 'toggle'
    }, 1);


    $('#prosloadpaymentprefixinput').fadeIn('slow');



    let collapsibleHeaders = document.getElementsByClassName('collapsible__header');

    Array.from(collapsibleHeaders).forEach(header => {
        header.addEventListener('click', () => {

            header.parentElement.classList.toggle('collapsible--open');
        });
    });

    var pros_getprefixlocal = localStorage.getItem("admissionprefix");

    if (pros_getprefixlocal == '' || pros_getprefixlocal === null || pros_getprefixlocal ===
        undefined) {} else {
        $('#prosadmissionprefixinput').val(pros_getprefixlocal);
    }

    $('#prosloadonboardingmodal').modal('show');

});
// skip admission payment here



$('body').on('click', '.prosbacktopaypagebtn', function() {

    $('#prosloadpaymentinput').animate({
        right: '+=50',
        height: 'toggle'
    }, 1);


    $('#admissionquestionpayment').fadeIn('slow');

    //  var pros_getprefixlocal = localStorage.getItem("admissionprefix");

    // if (pros_getprefixlocal == '' || pros_getprefixlocal === null || pros_getprefixlocal === undefined) {
    // }else
    // {
    //     $('#prosadmissionprefixinput').val(pros_getprefixlocal);
    // }

});



// SKIP ADMISSION EXAM HERE


$('body').on('click', '.prosskipadmissioncbt', function() {

    $('#pros-admissionchoiceofexam').animate({
        right: '+=50',
        height: 'toggle'
    }, 1);

    $('#pros-admissionadmistrativecongratemessage').fadeIn('slow');


    localStorage.setItem("admissiontag", 'admissionfirstcongrats');



});



// SKIP ADMISSION EXAM HERE



// PROCEEED TO SETUP WEBADMISSION

$('body').on('click', '.proceedfromcontowebsetup-btn', function() {



    $('#pros-admissionadmistrativecongratemessage').animate({
        right: '+=50',
        height: 'toggle'
    }, 1);

    $('#prosadmissiontermandsession').fadeIn('slow');

    localStorage.setItem("admissiontag", 'admissiontermsessionvalue');


    var admissionsession_pros = localStorage.setItem("admissionsession");

    if (admissionterm_pros == '' || admissionterm_pros === null || admissionterm_pros === undefined) {

    } else {
        $('#termadmission').val(admissionterm_pros);
    }


    if (admissionsession_pros == '' || admissionsession_pros === null || admissionsession_pros === undefined) {

    } else {
        $('#sessionadmission').val(admissionsession_pros);
    }

});







$('body').on('click', '.prosgenerallist-itemssel', function(e) {

    var checkbox = $(this).find('input[type="checkbox"]');
    if (!$(e.target).is(checkbox)) {
        checkbox.prop('checked', !checkbox.prop('checked'));
    }
});

// slid admission dropdown for prefix
// slid admission dropdown for prefix




let collapsibleHeadersnew = document.getElementsByClassName('collapsible__header');

Array.from(collapsibleHeadersnew).forEach(header => {
    header.addEventListener('click', () => {
        header.parentElement.classList.toggle('collapsible--open');
    });
});



// load edit description here
$('body').on('click', '.editadmissiondesscriptionbtn', function() {
    $('#prosloadeditadmindescription').html(
        '<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
    var InstitutionID = $(this).data('id');
    var UserID = "<?php echo $UserID; ?>";





    $.ajax({
        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/loadeditadmissioncontent.php",
        data: {
            UserID: UserID,
            InstitutionID: InstitutionID
        },
        cache: false,
        success: function(result) {

            $('#prosloadeditadmindescription').html(result);
        }

    });


});




$('body').on('click', '#pros-updateadmissiondes', function() {

    $('#pros-updateadmissiondes').html('<i class="fa fa-circle-o-notch fa-spin"></i>..updating');

    var adminTitle = $('#pros-admintitleedit').val();
    var admindescription = $('#prosadmindesedit').val();
    var adminsession = $('#editadminsionsession').val();
    var adminterm = $('#editadminterm').val();
    var InstitutionID = $('#pros-admintitleedit').data('id');
    var UserID = "<?php echo $UserID; ?>";



    $.ajax({
        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/updateadminssiondes.php",
        data: {

            UserID: UserID,
            InstitutionID: InstitutionID,
            adminTitle: adminTitle,
            admindescription: admindescription,
            adminsession: adminsession,
            adminterm: adminterm
        },
        cache: false,
        success: function(result) {

            var feedback = (result);
            $('#pros-updateadmissiondes').html('Update');

            

            if (feedback.trim() == 'success') {

                $.wnoty({
                    type: 'success',
                    message: "Updated successfully",
                    autohideDelay: 5000
                });

            }
            proloadadmissionwebcontent();

            $('#edit-admissionprofile').modal('hide');


        }

    });




});

// LOAD ADMINSSION BENEFIT HERE
$('body').on('click', '.pros-editadmissionbenefitbtn', function() {
    $('#prosloadeditadminbenefit').html(
        '<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
    var InstitutionID = $(this).data('id');
    var UserID = "<?php echo $UserID; ?>";

    $.ajax({
        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/loadeditadmissioncontentbenefit.php",
        data: {
            UserID: UserID,
            InstitutionID: InstitutionID
        },
        cache: false,
        success: function(result) {

            $('#prosloadeditadminbenefit').html(result);
        }

    });


});



//    edit benefit here
$('body').on('click', '#pros-updateadmissionbenefit', function() {
        

  $('#pros-updateadmissionbenefit').html('<div class="spinner-border spinner-border-sm" role="status">'+
 ' <span class="visually-hidden">Loading...</span></div>updating');

   
       
        var IntitutionID = localStorage.getItem("abba-stored-institution-id");
        var UserID = "<?php echo $UserID; ?>";


    var benefitname = [];
    $.each($('.prosgeneralbenefitedit'), function() {

        benefitname.push($(this).val());
        var benefitnamevalidate = $(this).val();

          if(benefitnamevalidate == '')
          {
               $(this).css('outline','1px solid red');

               isValidbenefit = false;
                return false; // Exit the loop i
          }else
          {
            $(this).css('outline','1px solid green');

               isValidbenefit = true;
              return true; // Exit the
          }

    });



    if(isValidbenefit)
    {
       
        // benefitname = benefitname.toString();

        var benefitnameWithHashtags = benefitname.join('###');

        benefitnameWithHashtags = benefitnameWithHashtags.toString();

            $.ajax({
                type: "POST",
                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosupdateadmissionbenefit.php",
                data: {
                    UserID: UserID,
                    IntitutionID: IntitutionID,
                    benefitnameWithHashtags:benefitnameWithHashtags
                },
                cache: false,
                success: function(result) {
                   
                    $('#pros-updateadmissionbenefit').html('Update <i class="fa fa-edit"></i>');
                   
                   
                     if(result.trim() == 'success')
                     {


                            $.wnoty({
                                type: 'success',
                                message: "Great! benefit updated successfully.",
                                autohideDelay: 5000
                            });

                            proloadadmissionwebcontent();

                            $('#edit-admissionprofilebenefit').modal('hide');

                     }else
                     {
                          $.wnoty({
                                type: 'error',
                                message: "Hey!! benefit failed to be updated pls try again later.",
                                autohideDelay: 5000
                            });



                     }

                }

            });



    }else
    {

        $.wnoty({
            type: 'warning',
            message: "Hey! make sure no benefit is left empty.",
            autohideDelay: 5000
        });

        $('#pros-updateadmissionbenefit').html('Update <i class="fa fa-edit"></i>');
           
    }



        
});


// LOAD ADMINSSION BENEFIT HERE


$('body').on('click', '.pros-editadmissionfaqbtn', function() {

    $('#prosloadeditadminfaq').html(
        '<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

    var InstitutionID = $(this).data('id');
    var UserID = "<?php echo $UserID; ?>";

    $.ajax({
        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/loadeditadmissioncontentfaq.php",
        data: {
            UserID: UserID,
            InstitutionID: InstitutionID
        },
        cache: false,
        success: function(result) {

            $('#prosloadeditadminfaq').html(result);
        }

    });


});


$('body').on('click', '#pros-updateadmissionfaq', function() {
       
    $('#pros-updateadmissionfaq').html('<div class="spinner-border spinner-border-sm" role="status">'+
 '<span class="visually-hidden">Loading...</span></div>updating');
        
   
       
    var IntitutionID = localStorage.getItem("abba-stored-institution-id");
    var UserID = "<?php echo $UserID; ?>";


    var faquestion = [];
    var faqanswer = [];

                $.each($('.prosgeneralfaqquestioneditfaq'), function() {

                    faquestion.push($(this).val());
                    var faqusionnew = $(this).val();

                    if(faqusionnew == '')
                    {
                        $(this).css('outline','1px solid red');

                        isValidfaqusetion = false;
                            return false; // Exit the loop i
                    }else
                    {
                        $(this).css('outline','1px solid green');

                        isValidfaqusetion = true;
                        return true; // Exit the
                    }

                });
                 



                $.each($('.generalfaqanswersedit'), function() {

                faqanswer.push($(this).val());
                var faqanswegotten = $(this).val();

                if(faqanswegotten == '')
                {
                    $(this).css('outline','1px solid red');

                    isValidfaanswer = false;
                        return false; // Exit the loop i
                }else
                {
                    $(this).css('outline','1px solid green');

                    isValidfaanswer = true;
                    return true; // Exit the
                }

                });
                


                if(isValidfaqusetion && isValidfaanswer )
                {

                    
                    var faqanswernew = faqanswer.join('###');
                    var faquestionnew = faquestion.join('###');


                    faquestionnew = faquestionnew.toString();
                    faqanswernew = faqanswernew.toString();




                                $.ajax({
                                        type: "POST",
                                        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/proeditfaqforadmissionhere.php",
                                        data: {
                                            UserID: UserID,
                                            IntitutionID: IntitutionID,
                                            faquestionnew:faquestionnew,
                                            faqanswernew:faqanswernew
                                        },
                                        cache: false,
                                        success: function(result) {

                                             

                                                if(result.trim() == 'success')
                                                {


                                                        $.wnoty({
                                                            type: 'success',
                                                            message: "Great! FAQS updated successfully.",
                                                            autohideDelay: 5000
                                                        });

                                                        proloadadmissionwebcontent();

                                                        $('#edit-admissionprofilefaq').modal('hide');

                                                }else
                                                {
                                                    $.wnoty({
                                                            type: 'error',
                                                            message: "Hey!! FAQS failed to be updated pls try again later.",
                                                            autohideDelay: 5000
                                                        });



                                                }
                                            $('#pros-updateadmissionfaq').html('Upadte <i class="fa fa-edit"></i>');

                                        }

                                    });
                }else
                {

                    $('#pros-updateadmissionfaq').html('Upadte <i class="fa fa-edit"></i>');
                        $.wnoty({
                            type: 'warning',
                            message: "Hey! frequently asked question and answer should be left blank.",
                            autohideDelay: 5000
                        }); 
                }


});



// prosgeneralfaqquestionedit  generalfaqanswersedit

   //LOAD ADMISSION WEB CONTENT HERE

   $(document).ready(function() {

         proloadadmissionwebcontent();
    });


    function proloadadmissionwebcontent()
    {
        $('#pros-loadamissionwebcontent').html(
        '<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

        var UserID = "<?php echo $UserID; ?>";
        var IntitutionID = localStorage.getItem("abba-stored-institution-id");


             $.ajax({

                    type: "POST",
                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosloadadmissionwebcontent.php",
                    data: {
                        UserID: UserID,
                        IntitutionID: IntitutionID
                    },
                    cache: false,
                    success: function(result) {

                        $('#pros-loadamissionwebcontent').html(result);

                                var imagegottennew = $('#prosgetimageandloaddes').val();
                              
                              
                            
  



                               
                                
                            const imgAreaeit = document.querySelector('.proscreatnewschooldes');

                            const imgnew= document.createElement('img');
                            
                                imgnew.classList.add(
                                    'active'
                                    ); // Replace 'your-custom-class' with your desired CSS class for styling the div
                                    imgnew.src = imagegottennew;
                                imgAreaeit.innerHTML = '';
                                imgAreaeit.appendChild(imgnew);




                                    const $image_cropedit = $('#image_demobanner').croppie({
                                            enableExif: false,
                                            viewport: {
                                                width: 300,
                                                height: 500,
                                                type: 'square'
                                            },
                                            boundary: {
                                                width: 350,
                                                height: 350
                                            }
                                        });


                                    $('.prosdesfaq-accordion-text .question-arrow').click(function() {
                                            var listItem = $(this).closest('li');
                                            listItem.toggleClass('showAnswer');
                                        });


                                                                    const selectImagenew = document.querySelector('.proscontainerimage');
                                                                const inputFilenew = document.querySelector('.prosfilebackground');
                                                                // const imgArea = document.querySelector('.prosbackgroundimagearea');

                                

                                                                        selectImagenew.addEventListener('click', function() {
                                                                            inputFilenew.click();
                                                                        });

                                                                        inputFilenew.addEventListener('change', function() {
                                                                            const imagegotten = this.files[0];

                                                                            const imagenewweb = new Image();

                                                                            imagenewweb.addEventListener('load', function() {
                                                                                const desiredWidth = 667; // Replace with your desired width
                                                                                const desiredHeight = 1000; // Replace with your desired height

                                                                                const actualWidth = this.width;
                                                                                const actualHeight = this.height;

                                                                                if (actualWidth !== desiredWidth || actualHeight !== desiredHeight) {
                                                                                    $.wnoty({
                                                                                        type: 'warning',
                                                                                        message: "Hey! your background image should be of dimension 667 x 1000.",
                                                                                        autohideDelay: 5000
                                                                                    });
                                                                                } else {

                                                                                    var reader = new FileReader();
                                                                                    reader.onload = function(event) {
                                                                                        // Assuming $image_crop is defined for the cropper library
                                                                                        $image_cropedit.croppie('bind', {
                                                                                            url: event.target.result
                                                                                        }).then(function() {
                                                                                            console.log('jQuery bind complete');
                                                                                        });
                                                                                    };
                                                                                    reader.readAsDataURL(imagegotten);

                                                                                    $('#pros-uploadstaffimagebanner').modal('show');
                                                                                }
                                                                            });

                                                                            imagenewweb.src = URL.createObjectURL(imagegotten);
                                                                        });





                                                                        $('body').on('click', '.proscrop_editwebimage', function() {
                                                                             var IntitutionIDnew = localStorage.getItem("abba-stored-institution-id");
                                                                            
                
                                                                            $image_cropedit.croppie('result', {
                                                                                    type: 'canvas',
                                                                                    size: 'viewport'
                                                                                }).then(function(response) {
                                                                                    

                                                                                        $('.proscrop_editwebimage').html('<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Loading...</span></div>saving..');
                                                                                        
  


                                                                                    $.ajax({

                                                                                        type: "POST",
                                                                                        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/updatewebadmissionimage.php",
                                                                                        data: {
                                                                                            UserID: UserID,
                                                                                             IntitutionID: IntitutionIDnew,
                                                                                             image:response
                                                                                        },
                                                                                        cache: false,
                                                                                        success: function(result) {
                                                                                            $('.proscrop_editwebimage').html('Save')

                                                                                                 if(result.trim() == 'success')
                                                                                                 {
                                                                                                     
                                                                                                     
                                                                                                     
                                                                                                     
                                                                                                         $('#pros-uploadstaffimagebanner').modal('hide');
                                                                    
                                                                                                        const imgAreaeitgotten = document.querySelector('.proscreatnewschooldes');
                                                                                        
                                                                                                        // $('#wizardPicturePreview').attr('src', response);
                                                                                        
                                                                                                        const imginsert = document.createElement('img');
                                                                                                    
                                                                                                        imginsert.classList.add(
                                                                                                            'active'
                                                                                                            ); // Replace 'your-custom-class' with your desired CSS class for styling the div
                                                                                                        imginsert.src = response;
                                                                                                        imgAreaeitgotten.innerHTML = '';
                                                                                                        imgAreaeitgotten.appendChild(imginsert); 
                                                                                                                         
                                                                                                                         
                                                                                                     
                                                                                                     
                                                                                                     
                                                                                                    $.wnoty({
                                                                                                            type: 'success',
                                                                                                            message: "Great!  background image uploaded successfully.",
                                                                                                            autohideDelay: 5000
                                                                                                        });
                                                                                                 }else
                                                                                                 {
                                                                                                    $.wnoty({
                                                                                                            type: 'error',
                                                                                                            message: "Error!  background image uploaded not successfully.",
                                                                                                            autohideDelay: 5000
                                                                                                        });
                                                                                                 }

                                                                                  

                                                                                            
                                                                                        }
                                                                                    });






                                                                                });
                                                                    
                                                                    
                                                                    
                                                                        });






                        }
            });

    }



    
    

   

//LOAD ADMISSION WEB CONTENT HERE







$(document).ready(function() {
    prosloadaminsionclass();
});

// LOAD ADMISSION CLASSES HERE
function prosloadaminsionclass() {

    var UserID = "<?php echo $UserID; ?>";
    var IntitutionID = localStorage.getItem("abba-stored-institution-id");

    $('#prosloadadmissionclasses').html(
        '<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');


    $.ajax({

        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosloadadmissionclass.php",
        data: {
            UserID: UserID,
            IntitutionID: IntitutionID
        },
        cache: false,
        success: function(result) {


            $('#prosloadadmissionclasses').html(result);
        }
    });

}
// LOAD ADMISSION CLASSES HERE

$('body').on('click', '.proseditschooladmissiongeralsettings', function() {

    $('#prosloadclasslistforedit').html(
        '<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
    $('#pros-loadadmissionclassesforaddnewhere').html(
        '<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');



    var campusID = $(this).data('campusid');
    var UserID = "<?php echo $UserID; ?>";
    var IntitutionID = localStorage.getItem("abba-stored-institution-id");


    $.ajax({

        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosloadadmissionclassadded.php",
        data: {
            UserID: UserID,
            IntitutionID: IntitutionID,
            campusID: campusID
        },
        cache: false,
        success: function(result) {

            $('#prosloadclasslistforedit').html(result);
        }
    });



    $.ajax({

        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosloadadmissionclassforaddnew.php",
        data: {
            UserID: UserID,
            IntitutionID: IntitutionID,
            campusID: campusID
        },
        cache: false,
        success: function(result) {

            $('#pros-loadadmissionclassesforaddnewhere').html(result);
        }
    });

});


//LOAD ADMISSION RECORD HERE





// CREATE EDIT,DELETE, AND ADMISSION CLASS HERE 

$('body').on('click', '.pros-prosaddnewclass', function() {

    //     var proscheckedclasnames = [];
    //    var proscheckedClassID = [];

    var Paymentamount = $('#getadmissionpaymentstatus').val();
    var inputappendedednum = $('#tractinputappended').val();


    $.each($('.pros-getclassforaddnew:checked'), function() {

        var ClassIDnew = $(this).data('id');
        var Classnamenew = $(this).data('classname');


        var classnamegottennew = $('.prosgeneralclassnewedit').val();


        if (Classnamenew == classnamegottennew) {


            $('#prosloadaddnewsubjectmodal').modal('hide');

        } else {

            inputappendedednum++;

            if (Paymentamount == '1') {

                var prosappendneclasshere =
                    '<div   class="prosremoveinputappended' +
                    inputappendedednum +
                    '"><div class="row mt-3 "><div class="col-sm-6 mb-3 prosgeralinputclassname"><input type="text" disabled style=" box-shadow:0 2px 5px 0 #D3D3D3,0 3px 11px 0 #D3D3D3;outline:1px solid #007bff;" data-id="' +
                    ClassIDnew + '"   value="' + Classnamenew +
                    '" placeholder="Class name" class="form-control prosgeneralclassnewedit"></div>' +
                    '<div  class="col-sm-5 mb-3 pros-generalremoveclassnewamount"><input type="number" style=" box-shadow:0 2px 5px 0 #D3D3D3,0 3px 11px 0 #D3D3D3;outline:1px solid #007bff;"   value="" placeholder="e.g $1000" class="form-control prosgeneralamountedit"> </div>' +
                    '<div  class="col-sm-1 mb-3"><span class="text-danger generalremoveclassbtn" data-loc=""  data-id="' +
                    inputappendedednum +
                    '" style="cursor:pointer;"><i class="fa fa-trash"></i></span></div></div></div>';
                    
                $(document.createElement('div')).append(prosappendneclasshere).appendTo('.prosdisplayclassnamehere');

                $('.proshidegeralamountforallclassdiv').fadeIn('slow');
                $('#prosloadaddnewsubjectmodal').modal('hide');
                $('#prosaddnewcampusimage').fadeOut();

               

            } else {


                var prosappendneclasshere =
                    '<div   class="prosremoveinputappended' +
                    inputappendedednum +
                    '"><div class="row mt-3 "><div class="col-sm-11 mb-3 prosgeralinputclassname">  <input type="text" disabled style=" box-shadow:0 2px 5px 0 #D3D3D3,0 3px 11px 0 #D3D3D3;outline:1px solid #007bff;" data-id="' +
                    ClassIDnew + '"  value="' + Classnamenew +
                    '" placeholder="Class name" class="form-control prosgeneralclassnewedit"> </div>' +
                    '<div  class="col-sm-5 mb-3 pros-generalremoveclassnewamount" style="display:none;"><input type="number" style=" box-shadow:0 2px 5px 0 #D3D3D3,0 3px 11px 0 #D3D3D3;outline:1px solid #007bff;"   value="" placeholder="e.g $1000" class="form-control prosgeneralamountedit"> </div>' +
                    '<div  class="col-sm-1 mb-3"> <span class="text-danger generalremoveclassbtn" data-loc=""  data-id="' +
                    inputappendedednum +
                    '" style="cursor:pointer;"><i class="fa fa-trash"></i></span> </div></div></div>';
                $(document.createElement('div')).append(prosappendneclasshere).appendTo(
                    '.prosdisplayclassnamehere');
                $('.proshidegeralamountforallclassdiv').fadeOut('slow');
                $('#prosloadaddnewsubjectmodal').modal('hide');
                $('#prosaddnewcampusimage').fadeOut();



            }

        }



    });


});


$('body').on('change', '#getadmissionpaymentstatus', function() {

    var patmentstatus = $(this).val();

    var generalclassnew = [];


    
    if(patmentstatus == '1')
    {
                $('.pros-generalremoveclassnewamount').fadeIn('slow');
           
            $('.prosgeralinputclassname').removeClass('col-sm-11').addClass('col-sm-5');
            $('.prosgeralinputclassname').css('display','block');
    }else
    {
            $('.pros-generalremoveclassnewamount').fadeOut('slow');
           
            $('.prosgeralinputclassname').removeClass('col-sm-5').addClass('col-sm-11');
    }


});





$('body').on('click', '.generalremoveclassbtn', function(e) {

    e.preventDefault();

    var prossourceID = $(this).data('loc');
    var IputstageID = $(this).data('id');

    if (prossourceID == 'server') {


        var campusID = $(this).data('campus');
        var UserID = "<?php echo $UserID; ?>";
        var IntitutionID = localStorage.getItem("abba-stored-institution-id");


        $.ajax({

            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosremoveadmissionclass.php",
            data: {
                campusID: campusID,
                IntitutionID: IntitutionID,
                UserID: UserID,
                IputstageID: IputstageID
            },
            cache: false,
            success: function(result) {


                if (result.trim() == 'success') {


                    $.wnoty({
                        type: 'success',
                        message: "Class removed successfully.",
                        autohideDelay: 5000
                    });


                    $.ajax({

                        type: "POST",
                        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosloadadmissionclassadded.php",
                        data: {
                            UserID: UserID,
                            IntitutionID: IntitutionID,
                            campusID: campusID
                        },
                        cache: false,
                        success: function(result) {

                            $('#prosloadclasslistforedit').html(result);
                        }
                    });

                } else {

                    $.wnoty({
                        type: 'error',
                        message: "Delete failed. kindly try again later.",
                        autohideDelay: 5000
                    });

                }

            }

        });









    } else {

        $('.prosremoveinputappended' + IputstageID).remove();
        var numappended = $("#tractinputappended").val();
        numappended--;
        $("#tractinputappended").val(numappended);


        $.wnoty({
            type: 'success',
            message: "Class removed successfully.",
            autohideDelay: 5000
        });

    }




});


$('body').on('keyup', '.prosgeneralamounteditall', function() {
    var totalamountgotten = $(this).val();


    $.each($('.prosgeneralamountedit'), function() {

        $(this).val(totalamountgotten);
    });

});





// create admission class here 
$('body').on('click', '#prosadmissionclassnewhere', function() {

    var Paymentamountgotten = $('#getadmissionpaymentstatus').val();
    var campusID = $('#pros-campusIDnew').val();
    var UserID = "<?php echo $UserID; ?>";
    var IntitutionID = localStorage.getItem("abba-stored-institution-id");

    var admissionprefix = $('#prosadmissionprefixinputedit').val();

    



    var Amountotal = [];
    var ClassID = [];
    var ClassName = [];


    $.each($('.prosgeneralamountedit'), function() {
        Amountotal.push($(this).val());

        var prosamountvalstatus = $(this).val();

        if (prosamountvalstatus == '') {
            $(this).css('outline', '1px solid red');

            isValidamountedit = false;
            return false;
        } else {
            $(this).css('outline', '1px solid green');

            isValidamountedit = true;
            return true;

        }
    });



    $.each($('.prosgeneralclassnewedit'), function() {
        ClassName.push($(this).val());
        ClassID.push($(this).data('id'));
    });


    if(ClassName == '')
    {


                     $.wnoty({
                            type: 'error',
                            message: "Hey!! please add class before proceeding.",
                            autohideDelay: 5000
                    });

    }else
    {

    


            if(admissionprefix == '' ||  Paymentamountgotten === undefined)
            {
                                $.wnoty({
                                    type: 'warning',
                                    message: "Hey! Input your admission prefix before you proceed.",
                                    autohideDelay: 5000
                                });  
            }else
            {



                if (Paymentamountgotten == '0' || Paymentamountgotten === undefined) {


                    var totalamount = '';
                    ClassID = ClassID.toString();
                    ClassName = ClassName.toString();



                    $.ajax({

                        type: "POST",
                        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/processaddinsertclassnew.php",
                        data: {
                            UserID: UserID,
                            IntitutionID: IntitutionID,
                            campusID: campusID,
                            totalamount: totalamount,
                            ClassName: ClassName,
                            ClassID: ClassID,
                            Paymentamountgotten: Paymentamountgotten,
                            admissionprefix:admissionprefix
                        },
                        cache: false,
                        success: function(result) {

                            if (result.trim() == 'success') {

                                $.wnoty({
                                    type: 'success',
                                    message: "Great!! class updated successfully.",
                                    autohideDelay: 5000
                                });
                                $('#prosloadmodaladminprefixsettings').modal('hide');
                                prosloadaminsionclass();




                            }

                        }
                    });


                } else {

                    if (isValidamountedit) {


                        ClassID = ClassID.toString();
                        ClassName = ClassName.toString();
                        Amountotal = Amountotal.toString();


                        $.ajax({

                            type: "POST",
                            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/processaddinsertclassnew.php",
                            data: {

                                UserID: UserID,
                                IntitutionID: IntitutionID,
                                campusID: campusID,
                                totalamount: Amountotal,
                                ClassID: ClassID,
                                ClassName: ClassName,
                                Amountotal: Amountotal,
                                Paymentamountgotten: Paymentamountgotten,
                                admissionprefix:admissionprefix

                            },
                            cache: false,
                            success: function(result) {


                                if (result.trim() == 'success') {

                                    $.wnoty({
                                        type: 'success',
                                        message: "Great!! class updated successfully.",
                                        autohideDelay: 5000
                                    });

                                    $('#prosloadmodaladminprefixsettings').modal('hide');
                                    prosloadaminsionclass();




                                }



                            }
                        });


                    } else {

                        $.wnoty({
                            type: 'error',
                            message: "Hey!! Input your amount before proceeding",
                            autohideDelay: 5000
                        });
                    }

                }
            }

        }


});


// CREATE EDIT,DELETE, AND ADMISSION CLASS HERE 
$('body').on('click', '.showHideRow', function() {
    var row = $(this).data('id');
    $("#" + row).toggle();
    $("#" + row + "_eye").toggleClass("fa-eye fa-eye-slash");
});




$('body').on('click', '.prosloadadminstatusbtn', function() {

    var campusIDverify = $(this).data('campus');
    var studentIDverify = $(this).data('student');

    if(campusIDverify == '' || campusIDverify === undefined)
    {

          var campusID = [];
            var studentID = [];


            

            $('.proscheckinputapplicant').each(function() {
                if ($(this).is(':checked')) {
                    studentID.push($(this).data('student'));
                    campusID.push($(this).data('campus'));
                    
                }
            });


            

          

    }else
    {
            var campusID = campusIDverify;
            var studentID = studentIDverify;
    }



    var studentIDLength = studentID.length;





    studentID = studentID.toString();
    campusID = campusID.toString();

   
    var currentstatus = $(this).data('currentstatus');
    var UserID = "<?php echo $UserID; ?>";
    var InstitutionID = localStorage.getItem("abba-stored-institution-id");
      var  classID = '';
    // var currentbuttonstatus  = $('.prosgeneralupdatesatus' + studentID).data('status');


    if(currentstatus == '1' ||currentstatus == '0')
    {


        
         var stubutton  = $('.prosgeneralupdatesatus' + studentID).html('<i class="fas fa-spinner fa-spin fs-6" style="color:#007ffb;"></i>');

                $.ajax({
                        type: "POST",
                            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/proproceedtoupdatestatusapplication.php",
                            data: {
                                UserID: UserID,
                                campusID: campusID,
                                studentID: studentID,
                                currentstatus: currentstatus,
                                classID:classID
                            },
                            cache: false,
                            success: function(result) {
                                       

                                if (result.trim() == 'failed') {



                                    $.wnoty({
                                        type: 'error',
                                        message: "Hey!! Admission status not change successfully try again later",
                                        autohideDelay: 5000
                                    });

                                   
                                }else
                                {


                                     if(studentIDLength > 1)
                                     {

                                        $('.proscheckinputapplicant').each(function() {
                                            if ($(this).is(':checked')) {
                                               var studncheck = $(this).data('student');
                                               $('.prosgeneralupdatesatus' + studncheck).html(result);
                                                
                                            }
                                        });


                                     }else
                                     {
                                        $('.prosgeneralupdatesatus' + studentID).html(result);
                                     }

                                    $.wnoty({
                                        type: 'success',
                                        message: "Great!! Admission status  change successfully.",
                                        autohideDelay: 5000
                                    });

                                      
                                          

                                }




                            }

                });
    }else
    {

            $('#prosloadapplicantstausmodal-here').modal('show');

                    $('#prosloadapplicantionstatus').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

                    $.ajax({
                        type: "POST",
                        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosloadappliantstatus.php",
                        data: {
                            UserID: UserID,
                            campusID: campusID,
                            studentID: studentID,
                            currentstatus: currentstatus
                        },
                        cache: false,
                        success: function(result) {

                            $('#prosloaadmissionstatusforchangestatus').html(result);
                        }

                    });


                                 

           
    }


   


   

  

    


});







$(document).ready(function() {


    

    var InstitutionID = localStorage.getItem("abba-stored-institution-id");
    var UserID = "<?php echo $UserID; ?>";
    //========LOAD  SESSION HERE======//
    $('#prosadmissionsession').html('<option value="NULL">loading..</option>');

    $.ajax({

        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosloadadminssionsession.php",
        data: {

            UserID: UserID,
            IntitutionID: InstitutionID
        },
        cache: false,
        success: function(result) {
            $('#prosadmissionsession').html(result);
            
             prosloadadmissionrecordcontent();
             prosloadadmissionrecordcontentcard();

        }

    });

    $('body').on('change', '#abba_display_campus', function() {
        
        $('#prosloadadmitetedclassesinput').html('<option value="NULL">loading..</option>');
        
        var UserID = "<?php echo $UserID; ?>";
        var campusID = $(this).val();

        $.ajax({

            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosloadadminclassesforfilter.php",
            data: {
                UserID: UserID,
                campusID: campusID
            },
            cache: false,
            success: function(result) {

                $('#prosloadadmitetedclassesinput').html(result);
                

            }

        });


    });

    //========LOAD  SESSION HERE======//


    // CREATE APPLICANT HERE
    $('body').on('click', '#pros-create-applicant', function(e) {
        e.preventDefault(); // Prevent the default link behavior
        var url = localStorage.getItem(
            "abba-stored-institution-CustomUrl"); // Get the URL from the href attribute
        var finalurl = "https://" + url + "/apply/";
        // Open the link in a new tab
        window.open(finalurl, '_blank');
    });
    // CREATE APPLICANT HERE






});


$('body').on('click', '#pros_get_applicant_on_click', function() {
   
    prosloadadmissionrecordcontentcard();
    //  prosloadadmissionrecordcontent();
});


function prosloadadmissionrecordcontent() {
    
    $('#prosploadadmission-record').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
        
    var InstitutionID = localStorage.getItem("abba-stored-institution-id");
    
    var UserID = "<?php echo $UserID; ?>";

    var campusID = $('#abba_display_campus').val();
    var Session = $('#prosadmissionsession').val();
    var classID = $('#prosloadadmitetedclassesinput').val();
    var usertype = '<?php echo $UType ; ?>';
    
    


    $.ajax({
        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosloadadmissionrecord.php",
        data: {
            UserID: UserID,
            IntitutionID: InstitutionID,
            campusID: campusID,
            Session: Session,
            classID: classID,
            usertype:usertype

        },
        cache: false,
        success: function(result) {
            $('#prosploadadmission-record').html(result);
        }

    });
}



function prosloadadmissionrecordcontentcard()
{


    $('#prosloadadmissioncardcontent').html(
        '<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
    var InstitutionID = localStorage.getItem("abba-stored-institution-id");
    var UserID = "<?php echo $UserID; ?>";

    var campusID = $('#abba_display_campus').val();
    var Session = $('#prosadmissionsession').val();
    var classID = $('#prosloadadmitetedclassesinput').val();
    var usertype = '<?php echo $UType ; ?>';


    $.ajax({
        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosloadadmissioncardsummary.php",
        data: {
            UserID: UserID,
            IntitutionID: InstitutionID,
            campusID: campusID,
            Session: Session,
            classID: classID,
            usertype:usertype
        },
        cache: false,
        success: function(result) {
            $('#prosloadadmissioncardcontent').html(result);

            $(function() {
                $('[data-plugin="knob"]').knob();
            });
            
        }

    });

}






//LOAD ADMISSION LETTER TEMPLATE FOR EDIT 

$('body').on('click', '.prosloadadmissionletterbtn', function() {
       

        $('#prosloadadmissiontemplate').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

        var InstitutionID = localStorage.getItem("abba-stored-institution-id");
        var UserID = "<?php echo $UserID; ?>";
        var campusID= $(this).data('campusid');
       


        $.ajax({
                type: "POST",
                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosloadadmissionletterteminput.php",
                data: {

                    UserID:UserID,
                    InstitutionID:InstitutionID,
                    campusID:campusID
                },
                cache: false,
                success: function(result) {

                    $('#prosloadadmissiontemplate').html(result);
                     $('.mymce').summernote();
                }
        });
  

});
//LOAD ADMISSION LETTER TEMPLATE FOR EDIT 



$(document).ready(function() {
    $('.mymce').summernote();
});



$('body').on('click', '#pros-updateadmissionletterdescription', function() {
     
    var admissiondescription =  $('.prosadmissiondescription').summernote('code');
    var campusID =   $('.prosadmissiondescription').data('id');
    var InstitutionID = localStorage.getItem("abba-stored-institution-id");
    var UserID = "<?php echo $UserID; ?>";

    $(this).html('<div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden"></span></div>');
    
   


    $.ajax({
                type: "POST",
                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosinsertadmissionletter.php",
                data: {
                        admissiondescription:admissiondescription,
                        campusID:campusID,
                        InstitutionID:InstitutionID,
                         UserID:UserID
                },
                
                cache: false,
                success: function(result) {
                   
                             
                      $('#pros-updateadmissionletterdescription').html('Update<i class="fa fa-edit"></i>')
                        if(result.trim() == 'success')
                        {

                                    $('#proseitadmissionlettermodal').modal('hide');

                                    $.wnoty({
                                        type: 'success',
                                        message: "Great!! admission letter submitted successfully.",
                                        autohideDelay: 5000
                                    });
                        }else
                        {

                                     $.wnoty({
                                        type: 'error',
                                        message: "Failed. admitted letter couldn't save please try again.",
                                        autohideDelay: 5000
                                    });

                        }
                    
              
                }

        });


    


});



                           
                        
                          
                                  
                                    


 



//LOAD ADMISSION LETTER TEMPLATE HERE 


        $(document).ready(function() {

             prosloadadmissionlettercontent();
        });

        
        function prosloadadmissionlettercontent (){
        
                  $('#prosloadadmissiontemplatehere').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
                        

                    var InstitutionID = localStorage.getItem("abba-stored-institution-id");
                    var UserID = "<?php echo $UserID; ?>";

                            $.ajax({
                                    type: "POST",
                                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosloadadmissionlettereach.php",
                                    data: {
                                        UserID: UserID,
                                        InstitutionID:InstitutionID
                                    },
                                    cache: false,
                                    success: function(result) {
                        
                                         $('#prosloadadmissiontemplatehere').html(result);
                                            // $('#prosloadapplicantstausmodal').modal('hide');
                                    }

                                });

        }


        // load letter print here

        $('body').on('click', '.prosloadprintresult', function() {
            $('#pros-loadadmissionletterforview').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
                
            
            var InstitutionID = localStorage.getItem("abba-stored-institution-id");
            var UserID = "<?php echo $UserID; ?>";

            var campusID =   $(this).data('id');




            $.ajax({
                    type: "POST",
                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosloadadmissionletterforview.php",
                    data: {
                        UserID:UserID,
                        InstitutionID:InstitutionID,
                        campusID:campusID
                    },
                    cache: false,
                    success: function(result) {
        
                        $('#pros-loadadmissionletterforview').html(result);
                    }
            });
          

            
            



        });

         // load letter print here


        




        $('body').on('click', '#prosupdateadmissiondurationrangebtn', function() {

            $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="visually-hidden">Loading...</span>');

            var InstitutionID = localStorage.getItem("abba-stored-institution-id");
            var UserID = "<?php echo $UserID; ?>";
            var startdate = $('#prosstartdate').val();
            var enddate = $('#prosenddate').val();


            if(startdate == '' || enddate == '')
            {

                                         $.wnoty({
                                            type: 'warning',
                                            message: "Hey!! make sure start or end date is not left blank.",
                                            autohideDelay: 5000
                                        });

                                        $('#prosupdateadmissiondurationrangebtn').html('<i class="fa fa-edit"> Update</i>');

            }else
            {

           

                        if (startdate > enddate) {
                            
                                        $.wnoty({
                                            type: 'warning',
                                            message: "Hey!! incorrect date range make sure start date is not greater than end date.",
                                            autohideDelay: 5000
                                        });


                                        $('#prosupdateadmissiondurationrangebtn').html('<i class="fa fa-edit"> Update</i>');
                        }else
                        {
                            
                            $.ajax({
                                        type: "POST",
                                        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosupdateadmissiondate.php",
                                        data: {
                                            UserID: UserID,
                                            InstitutionID:InstitutionID,
                                            enddate:enddate,
                                            startdate:startdate
                                        },
                                        cache: false,
                                        success: function(result) {
                                            
                                         

                                            if(result.trim() == 'success')
                                            {


                                                $('#prosupdateadmissiondurationrangebtn').html('<i class="fa fa-edit"> Update</i>');



                                                        $.wnoty({
                                                            type: 'success',
                                                            message: "Great!! admission time duration set successfully.",
                                                            autohideDelay: 5000
                                                        });



                                                               proloadadmissionwebcontent();
                                                                $('#prosloadamissiondurationhere').modal('hide');

                                                        
                                            }else
                                            {


                                                $('#prosupdateadmissiondurationrangebtn').html('<i class="fa fa-edit"> Update</i>');

                                                    $.wnoty({
                                                            type: 'error',
                                                            message: "Hey!! time duration could not be set please try again later.",
                                                            autohideDelay: 5000
                                                        });




                                            }
                                            
                                        }
                                });

                }
            }
        });

        
//LOAD ADMISSION LETTER TEMPLATE HERE 







$('body').on('change', '.proschangestausvaladmin', function() {
    var campusID = $(this).data('campus');
    var studentID = $(this).data('student');
    var classID = $(this).val();
    var UserID = "<?php echo $UserID; ?>";

    var InstitutionID = localStorage.getItem("abba-stored-institution-id");

     var  currentstatus = 2;


    $.ajax({
        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/proproceedtoupdatestatusapplication.php",
        data: {
            UserID: UserID,
            campusID: campusID,
            studentID: studentID,
            currentstatus:currentstatus,
            classID:classID
        },
        cache: false,
        success: function(result) {



            
            if (result.trim() == 'failed') {

                    $.wnoty({
                        type: 'error',
                        message: "Hey!! Admission status not change successfully try again later",
                        autohideDelay: 5000
                    });


                    }else
                    {

                            $.wnoty({
                                type: 'success',
                                message: "Hey!! Admission status  change successfully.",
                                autohideDelay: 5000
                            });

                    
                        $('.prosgeneralupdatesatus' + studentID).html(result);

                        $('#prosloadapplicantstausmodal').modal('hide');

                 }




        }

    });

});

   //pros load admission date set

    $(document).ready(function() {
        
             var InstitutionID = localStorage.getItem("abba-stored-institution-id");  
             
             
              $('#prosloadinstitutiondatesetforadmision').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="visually-hidden">Loading...</span>loading..');
            
            
            
            
                $.ajax({
                    type: "POST",
                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosloaddatesetforamissionhere.php",
                    data: {
                        InstitutionID:InstitutionID
                    },
                    cache: false,
                    success: function(result) {
        
                       $('#prosloadinstitutiondatesetforadmision').html(result);
        
                    }
        
                });  
              
              
    });
  //pros load admission date set

   
    
//LOAD CHAT INFO HERE  
$('body').on('click', '.prosgeneralcommentloadbtn', function() {

    var campusID = $(this).data('campus');
    var studentID = $(this).data('student');
    var email = $(this).data('email');
    var phone = $(this).data('phone');
    var link = $(this).data('link');
    var regno = $(this).data('regno');

    var UserID = "<?php echo $UserID; ?>";

    $('#num').val(phone);
    $('#regnum').val(regno);
    $('#pwrd').val(1234);
    $('#link').val(link);
    $('#student_id').val(student_id);

    var InstitutionID = localStorage.getItem("abba-stored-institution-id");


    $('body').on('click', '#prosloademailinputforemailbtn', function() {



        $('#prosmodalsmsadmissionmessage').modal('hide');
        $('#prosloademailconetnt-applicationmodal').modal('show');
        $('#prosloademailcontactherenowdiv').html(
            '<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>'
        );

        $.ajax({
            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosloademailconteninfo.php",
            data: {
                UserID: UserID,
                campusID: campusID,
                studentID: studentID,
                phone: phone,
                email: email,
                link: link,
                regno: regno


            },
            cache: false,
            success: function(result) {

                $('#prosloademailcontactherenowdiv').html(result);

            }

        });

    });




});


//LOAD EMAIL INPUT HERE 


$('body').on('click', '.prossendlogintoinputbtnemail', function() {

    var link = $('.prosgetlinkforeamilhere').val();
    var regnum = $('.prosgetregnoforeamilhere').val();

    $('.prosemaiildescription').val('Link: ' + link + ', Username: ' + regnum + ', Passwrd: ' + 1234);
});



$('body').on('click', '.prosloadwhatmodalmessgebtn', function() {

    $('#prosmodalsmsadmissionmessage').modal('hide');
    $('#prosloadwhatsappconetnt-applicationmodal').modal('show');
});

$('body').on('click', '.prosload-sms-messgebtn', function() {

    $('#prosmodalsmsadmissionmessage').modal('hide');
    $('#prosload-sms-conetnt-applicationmodal').modal('show');
});






$('body').on('click', '#input-whatsapp-programme-btn', function() {

    var student_id = $('#student_id').val();
    var num = $('#num').val();
    var regnum = $('#regnum').val();
    var pwrd = $('#pwrd').val();
    var link = $('#link').val();

    $('#sendmessage').val('Link: ' + link + ', Username: ' + regnum + ', Passwrd: ' + pwrd);
});


$('body').on('click', '#input-sms-programme-btn', function() {

    var student_id = $('#student_id').val();
    var num = $('#num').val();
    var regnum = $('#regnum').val();
    var pwrd = $('#pwrd').val();
    var link = $('#link').val();

    $('#sendmessage-sms').val('Link: ' + link + ', Username: ' + regnum + ', Passwrd: ' + pwrd);
});




// SEND WHATSAPP MESSAGE HERE
$('body').on('click', '#proceed-whatsapp-programme-btn', function() {

    var sendmessage = $('#sendmessage').val();

    var num = $('#num').val();

    // alert(sendmessage);

    window.open("https://wa.me/" + num + "?text=" + sendmessage, '_blank');

});
// SEND WHATSAPP MESSAGE HERE


// SEND SMS MESSAGE HERE
$('body').on('click', '#proceed-sms-programme-btn', function() {

    var sendmessage = $('#sendmessage-sms').val();
    var num = $('#num').val();

    $.ajax({
        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prossendsmsforamission.php",
        data: {
            sendmessage: sendmessage,
            num: num
        },
        cache: false,
        success: function(result) {


            if (result.trim() == 'success') {

                $.wnoty({
                    type: 'success',
                    message: "Great!! message sent to" + num + " successfully.",
                    autohideDelay: 5000
                });


            } else {

                $.wnoty({
                    type: 'error',
                    message: "Hey!! message not sent successfully kindly try again later.",
                    autohideDelay: 5000
                });
            }


        }

    });

});
// SEND SMS MESSAGE HERE



$('body').on('click', '.prosremoveapplicantgetdetails', function() {

    var campusID = $(this).data('campus');
    var studentID = $(this).data('student');
    var InstitutionID = $(this).data('inst');


    $('.prosremovestudentid').val(studentID);
    $('.prosremovesinstitutioid').val(InstitutionID);
    $('.prosremovescampusid').val(campusID);


});




$('body').on('click', '.prosremoveapplicantgetdetails', function() {

       
            var studentID = [];
            var IntitutionID = [];
            var campusID = [];

            $('.proscheckinputapplicant').each(function() {
                if ($(this).is(':checked')) {
                    studentID.push($(this).data('student'));
                    IntitutionID.push($(this).data('inst'));
                    campusID.push($(this).data('campus'));
                    
                }
            });
          
        
               

                $('.prosremovestudentid').val(studentID);
                $('.prosremovesinstitutioid').val(IntitutionID);
                $('.prosremovescampusid').val(campusID);


});





$('body').on('click', '#deleteconfirmDeleteapplicant', function() {


    $(this).html(
        '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>removing...'
    );

    var campusID = $('.prosremovescampusid').val();
    var studentID = $('.prosremovestudentid').val();
    var InstitutionID = $('.prosremovesinstitutioid').val();
    var UserID = "<?php echo $UserID; ?>";

    $.ajax({
        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosproceedtoremoveapplicant.php",
        data: {
            UserID: UserID,
            campusID: campusID,
            InstitutionID: InstitutionID,
            studentID: studentID

        },
        cache: false,
        success: function(result) {
            

            if(result.trim() == 'success')
            {
        
                                  $.wnoty({
                                        type: 'success',
                                        message: "Great!! applicant removed successfullly.",
                                        autohideDelay: 5000
                                    });

                                    prosloadadmissionrecordcontent();
                                    $('#pros-deleteapplicant-modal').modal('hide');

            }else
            {
                
                                  $.wnoty({
                                        type: 'error',
                                        message: "Hey!! applicant could not removed.",
                                        autohideDelay: 5000
                                    });

            }

            $('#deleteconfirmDeleteapplicant').html('Delete');
            

        }

    });

});



//===========check applicant box here all======================//
$('body').on('change', '#proscheckAllapplicant', function() {

    var checkStatus = $(this).prop('checked');
    if (checkStatus == true) {
        $(".proscheckinputapplicant").prop('checked', $(this).prop("checked"));
        var selTotal = $('.pros-checkstaff:checked').length;

        
        $("#prosgeneralchnagestatus").fadeIn("slow");
        // $("#prosgeneralcommentchatbulk").fadeIn("slow");
        $("#prosgeneralbulkdel").fadeIn("slow");



        
       

      


    } else if (checkStatus == false) {
        $(".proscheckinputapplicant").prop('checked', false);
        $("#prosgeneralchnagestatus").fadeOut("slow");
        // $("#prosgeneralcommentchatbulk").fadeOut("slow");
        $("#prosgeneralbulkdel").fadeOut("slow");
    }
});
//===========check applicant box here all======================//

//===========check applicant box here single======================//
$('body').on('change', '.proscheckinputapplicant', function() {
if ($('.proscheckinputapplicant:checked').length === $('.proscheckinputapplicant').length) {

$("#proscheckAllapplicant").prop('checked', true);

    var selTotalSingle = $('.proscheckinputapplicant:checked').length;

if(selTotalSingle >0){
    

         $("#prosgeneralchnagestatus").fadeIn("slow");
        // $("#prosgeneralcommentchatbulk").fadeIn("slow");
        $("#prosgeneralbulkdel").fadeIn("slow");
}
else{

        $(".proscheckinputapplicant").prop('checked', false);
        $("#prosgeneralchnagestatus").fadeOut("slow");
        // $("#prosgeneralcommentchatbulk").fadeOut("slow");
        $("#prosgeneralbulkdel").fadeOut("slow");
}



} else {

        $("#proscheckAllapplicant").prop('checked', false);

        var selTotalSingle = $('.proscheckinputapplicant:checked').length;

        if(selTotalSingle >0){
            

            $("#prosgeneralchnagestatus").fadeIn("slow");
            // $("#prosgeneralcommentchatbulk").fadeIn("slow");
            $("#prosgeneralbulkdel").fadeIn("slow");


        }
        else{


               $(".proscheckinputapplicant").prop('checked', false);
                $("#prosgeneralchnagestatus").fadeOut("slow");
                // $("#prosgeneralcommentchatbulk").fadeOut("slow");
                $("#prosgeneralbulkdel").fadeOut("slow");


        }

}
});

//===========check applicant box here single======================//
</script>