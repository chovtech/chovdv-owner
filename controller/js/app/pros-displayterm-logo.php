<script>

    // Initialize image cropper

    const $logocrop = $('#prosloadimage').croppie({
        enableExif: false,
        viewport: {
            width: 300,
            height: 300,
            type: 'square'
        },
        boundary: {
            width: 350,
            height: 350
        }
    });


    const $logocropbgimages = $('#prosloadimagebg').croppie({
        enableExif: false,
        viewport: {
            width: 300,
            height: 300,
            type: 'square'
        },
        boundary: {
            width: 350,
            height: 350
        }
    });




    $(document).ready(function () {

        var fullURL = window.location.href;
        const urlParams = new URLSearchParams(window.location.search);
        

        var campusID = urlParams.get('camp');
        var tabcontenthere = urlParams.get('tabrel');
        var IntitutionID = localStorage.getItem("abba-stored-institution-id");



        if(tabcontenthere == 'lbg')
        {
            $('.prosschoollogotabcontent').removeClass('active');
            $('.prosschoollogintabcontent').addClass('active');

            $('.prosloadlogotbherdercontent').removeClass('active');
            $('.prosloadlogintbherdercontent').addClass('active');

             

        }else
        {

        }






        $('#pros-school-logo-here').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
        $('#prosload-loginbgcontent').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');




        //LOAD LOGO CONTENT HERE
        $.ajax({
            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/pros-get-logo-content-here.php",
            data: {
                campusID: campusID,
                IntitutionID: IntitutionID
            },
            success: function (result) {

                $('#pros-school-logo-here').html(result);




                var proslogocontent = $('#prosgetimagecontethere-logo').val();

                if (proslogocontent == '') {

                } else {



                    $('#wizardPicturePreview').attr('src', proslogocontent);


                    const img = document.createElement('img');
                    const imgArea = document.querySelector('.prosbackgroundimagearea');

                    // Add a custom CSS class to the img element (if needed)
                    img.classList.add('active');
                    // Set the image source
                    img.src = proslogocontent;



                    // Clear the content of the imgArea
                    imgArea.innerHTML = '';
                    // Append the img element to imgArea
                    imgArea.appendChild(img);

                }






                const selectImagenew = document.querySelector('.proscontainerimage');
                const inputFilenew = document.querySelector('.pros-logofilehere');


                selectImagenew.addEventListener('click', function () {

                    inputFilenew.click();
                });




            }
        });
        //LOAD LOGO CONTENT HERE






        //LOAD  LOGIN BG CONTENT HERE
        $.ajax({
            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/pros-get-loginbg-content-here.php",
            data: {
                campusID: campusID,
                IntitutionID: IntitutionID
            },
            success: function (result) {

                $('#prosload-loginbgcontent').html(result);




                $('body').on('click', '.prosloadgerallogincontent', function () {
                    var prosimagetagstateforupload = $(this).data('id');


                            $('#prosgetstageofloginbg').val(prosimagetagstateforupload);



                            if (prosimagetagstateforupload == '1') {

                                const inputFilenewinput = document.querySelector('.prosgeneralimageselectfilebg1');

                                // Trigger a click event on the input element
                                inputFilenewinput.click();

                            } else if (prosimagetagstateforupload == '2') {

                                const inputFilenewinput = document.querySelector('.prosgeneralimageselectfilebg2');

                                // Trigger a click event on the input element
                                inputFilenewinput.click();

                            } else if (prosimagetagstateforupload == '3') {

                                const inputFilenewinput = document.querySelector('.prosgeneralimageselectfilebg3');

                                // Trigger a click event on the input element
                                inputFilenewinput.click();

                            }

                          




                            










                });


                    //prosloadimages created here

                              var proslogocontent1 = $('#prosgetimagecontethere-login1').val();
                              var proslogocontent2 = $('#prosgetimagecontethere-login2').val();
                              var proslogocontent3 = $('#prosgetimagecontethere-login3').val();
                             

                                if (proslogocontent1 == '') 
                                {

                                } else {



                                    $('#wizardPicturePreview').attr('src', proslogocontent1);


                                    const img = document.createElement('img');
                                    const imgArea = document.querySelector('.prosloadgerallogincontentnew1');

                                    // Add a custom CSS class to the img element (if needed)
                                    img.classList.add('active');
                                    // Set the image source
                                    img.src = proslogocontent1;



                                    // Clear the content of the imgArea
                                    imgArea.innerHTML = '';
                                    // Append the img element to imgArea
                                    imgArea.appendChild(img);

                                }



                                if (proslogocontent2 == '') 
                                {

                                } else {



                                    $('#wizardPicturePreview').attr('src', proslogocontent2);


                                    const img = document.createElement('img');
                                    const imgArea = document.querySelector('.prosloadgerallogincontentnew2');

                                    // Add a custom CSS class to the img element (if needed)
                                    img.classList.add('active');
                                    // Set the image source
                                    img.src = proslogocontent2;



                                    // Clear the content of the imgArea
                                    imgArea.innerHTML = '';
                                    // Append the img element to imgArea
                                    imgArea.appendChild(img);

                                }



                                if (proslogocontent3 == '') 
                                {

                                } else {



                                    $('#wizardPicturePreview').attr('src', proslogocontent3);


                                    const img = document.createElement('img');
                                    const imgArea = document.querySelector('.prosloadgerallogincontentnew3');

                                    // Add a custom CSS class to the img element (if needed)
                                    img.classList.add('active');
                                    // Set the image source
                                    img.src = proslogocontent3;



                                    // Clear the content of the imgArea
                                    imgArea.innerHTML = '';
                                    // Append the img element to imgArea
                                    imgArea.appendChild(img);

                                }







            }
        });
        //LOAD LOGIN BG CONTENT HERE


    });















    $('body').on('change', '#procickinputlogo', function () {


        var reader = new FileReader();
        reader.onload = function (event) {
            $logocrop.croppie('bind', {
                url: event.target.result
            }).then(function () {
                console.log('jQuery bind complete');
            });
        };

        reader.readAsDataURL(this.files[0]);

        $('#prosloadlogomoal').modal('show');
    });
    // Pros load logo




    $('body').on('change', '.prosgeneralinputloginsel', function () {


        var reader = new FileReader();
        reader.onload = function (event) {
            $logocropbgimages.croppie('bind', {
                url: event.target.result
            }).then(function () {
                console.log('jQuery bind complete');
            });
        };

        reader.readAsDataURL(this.files[0]);

        $('#prosloadmodalbg').modal('show');
    });
    // // Pros load bg 





        //PROS SUBMIT SCHOOL HERE
    $('.prosuploalogobtnhere').click(function (event) {
        $logocrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (response) {

            $('.prosuploalogobtnhere').html('saving... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

            // $('.prossubmitloginimagebtn').html('Crop Image', false);
            $('.prosuploalogobtnhere').prop("disabled", true);



            var fullURL = window.location.href;
            const urlParams = new URLSearchParams(window.location.search);

            var campusID = urlParams.get('camp');
            var IntitutionID = localStorage.getItem("abba-stored-institution-id");

            $.ajax({
                type: "POST",
                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/pros-uploadlogohere-here.php",
                data: {
                    campusID: campusID,
                    IntitutionID: IntitutionID,
                    image: response
                },
                success: function (result) {

                    $('.prosuploalogobtnhere').prop("disabled", false);
                    $('.prosuploalogobtnhere').html("Submit");





                    if (result.trim() == 'success') {


                        $.wnoty({
                            type: 'success',
                            message: 'Great! School Logo saved successfully.',
                            autohideDelay: 5000, // 3 seconds
                            autohide: true

                        });

                        $('#prosloadlogomoal').modal('hide');
                        $('#wizardPicturePreview').attr('src', response);


                        const img = document.createElement('img');
                        const imgArea = document.querySelector('.prosbackgroundimagearea');

                        // Add a custom CSS class to the img element (if needed)
                        img.classList.add('active');
                        // Set the image source
                        img.src = response;



                        // Clear the content of the imgArea
                        imgArea.innerHTML = '';
                        // Append the img element to imgArea
                        imgArea.appendChild(img);

                    }






                }
            }); // Load se





        });


    });

   //PROS SUBMIT SCHOOL HERE




       //PROS SUBMIT SCHOOL HERE
       $('.prosuploadbgbtnhere').click(function (event) {


                    var fullURL = window.location.href;
                    const urlParams = new URLSearchParams(window.location.search);

                    var campusID = urlParams.get('camp');
                    var IntitutionID = localStorage.getItem("abba-stored-institution-id");

                     var prosloadstageoimage =  $('#prosgetstageofloginbg').val();



                    $logocropbgimages.croppie('result', {
                        type: 'canvas',
                        size: 'viewport'
                    }).then(function (response) {

                        $('.prosuploadbgbtnhere').html('saving... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

                        $('.prosuploadbgbtnhere').prop("disabled", true);


                                $.ajax({
                                        type: "POST",
                                        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/pros-uploadloginimageherehere-here.php",
                                        data: {
                                            campusID: campusID,
                                            IntitutionID: IntitutionID,
                                            image: response,
                                            prosloadstageoimage:prosloadstageoimage
                                        },
                                        success: function (result) {

                                            $('.prosuploadbgbtnhere').prop("disabled", false);
                                            $('.prosuploadbgbtnhere').html("Submit");





                                            if (result.trim() == 'success') {


                                                $.wnoty({
                                                    type: 'success',
                                                    message: 'Great! School login bg saved successfully.',
                                                    autohideDelay: 5000, // 3 seconds
                                                    autohide: true

                                                });

                                                $('#prosloadmodalbg').modal('hide');
                                                
                                               

                                                if (prosloadstageoimage == '1') {

                                                    $('#wizardPicturePreview').attr('src', response);

                                                            const imgnew = document.createElement('img');
                                                            const imgAreanew = document.querySelector('.prosloadgerallogincontentnew1');

                                                            // Add a custom CSS class to the img element (if needed)
                                                            imgnew.classList.add('active');
                                                            // Set the image source
                                                            imgnew.src = response;



                                                            // Clear the content of the imgArea
                                                            imgAreanew.innerHTML = '';
                                                            // Append the img element to imgArea
                                                            imgAreanew.appendChild(imgnew);


                                                } else if (prosloadstageoimage == '2') {

                                                              const img = document.createElement('img');
                                                            const imgArea = document.querySelector('.prosloadgerallogincontentnew2');

                                                            // Add a custom CSS class to the img element (if needed)
                                                            img.classList.add('active');
                                                            // Set the image source
                                                            img.src = response;



                                                            // Clear the content of the imgArea
                                                            imgArea.innerHTML = '';
                                                            // Append the img element to imgArea
                                                            imgArea.appendChild(img);




                                                } else if (prosloadstageoimage == '3') {


                                                            const img = document.createElement('img');
                                                            const imgArea = document.querySelector('.prosloadgerallogincontentnew3');

                                                            // Add a custom CSS class to the img element (if needed)
                                                            img.classList.add('active');
                                                            // Set the image source
                                                            img.src = response;



                                                            // Clear the content of the imgArea
                                                            imgArea.innerHTML = '';
                                                            // Append the img element to imgArea
                                                            imgArea.appendChild(img);
                                               

                                                }

                                               

                                            }






                                        }
                                    }); // Load se


                    });


    });



</script>