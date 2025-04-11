<script>




$(document).ready(function() {
    
    
       const $image_crop = $('#prosloadimage').croppie({
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



    $('body').on('change', '.prosloadstaffimageonchage', function() {
        
         
        var reader = new FileReader();
        reader.onload = function(event) {
          $image_crop.croppie('bind', {
            url: event.target.result
          }).then(function() {
            console.log('jQuery bind complete');
          });
        };
        reader.readAsDataURL(this.files[0]);
      
        $('#prosloadstaffimagemodal').modal('show');

       
      });
    
    
    
    
    
    
    
    $('.prosuploalogobtnhere').click(function(event){

        $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function(response){
        var StaffID = <?php echo  $staffID; ?>;
        var groupSchoolID = <?php echo  $InstitutionID; ?>;
        
         
          
        
        $('#wizardPicturePreview').attr('src', response);
        $('.prosuploalogobtnhere').html('<i class="fa fa-spinner fa-pulse"></i>uploading');
          
                $.ajax({
                url:'../../controller/scripts/owner/pros-uploadstaffimage.php',
                type:'POST',
                data:{"image":response, "StaffID":StaffID,"groupSchoolID":groupSchoolID},
                success:function(data){
                    // pros_load_staff();
                    $('.prosuploalogobtnhere').html('Saved');
                    
                    $('.posloadimagecontentforall').attr('src', response);
                    $('#prosloadstaffimagemodal').modal('hide');

                   
                   
                    $.wnoty({
                        type: 'success',
                        message: 'Great!! image uploaded successfully.',
                        autohideDelay: 3000, // 5 seconds
                        position:'top-right',
                        autohide:true
                    });
                }
            });
        });
    });

    
    
    

    // Additional code or event handlers can go here
});




$(document).ready(function() {



    var staffnumbernew = window.intlTelInput(document.querySelector("#prosstaffnumberedit"), {
        separateDialCode: true,
        preferredCountries: ["ng"],
        hiddenInput: "full",
        utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
    });


    var StaffReligion = '<?php echo  $StaffReligion ; ?>';
    var staffstate = '<?php echo  $StaffState ; ?>';
    var stafflga = '<?php echo  $StaffLga; ?>';
    $('#pros_get_staff_religion').val(StaffReligion);



    // load state here
    var country = $('#country').val();
    var dataString = '&country=' + country;

    $('#pros-staffstate').html('<option value="0">Loading...</option>');
    //  load state
    $.ajax({
        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/get-state-onboarding.php",
        data: dataString,
        success: function(result) {
            $('#pros-staffstate').html(result);
            $('#pros-staffstate').val(staffstate);


            //  load lga
            var dataString = '&state=' + staffstate;

            $('#pros-lga').html('<option value="0">Loading...</option>');

            $.ajax({
                type: "POST",
                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/get-local-govenrment-onboarding.php",
                data: dataString,
                success: function(result) {
                    $('#pros-lga').html(result);
                    $('#pros-lga').val(stafflga);


                }
            });
            //  load lga


        }
    });

    // load state here

});
//pros submit staff contact info here 

$('body').on('click', '#pros-contactinfobtnhere', function() {
    $(this).html(
        '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>saving...'
    );

   

    var prosstaffadress = $('#prosstaffadress').val();
    var prosstaffemailedit = $('#prosstaffemailedit').val();
    var prosstaffnumberedit = $('#prosstaffnumberedit').val();
    var staffID = '<?php echo $staffID  ; ?>';
   
    if(prosstaffnumberedit == '')
    {
       
        
        $('#prosstaffnumberedit').css('border', '1px  solid red');
        $('#pros-contactinfobtnhere').html('<i class="fa fa-edit"> Update</i>');

        $.wnoty({
            type: 'warning',
            message: "Hey!!phone number required",
            autohideDelay: 6000
        });

    }else if(prosstaffemailedit == '')
    {

           
        $('#prosstaffemailedit').css('border', '1px  solid red');
        $('#pros-contactinfobtnhere').html('<i class="fa fa-edit"> Update</i>');

        $.wnoty({
            type: 'warning',
            message: "Hey!! email required",
            autohideDelay: 6000
        });

    }else if(prosstaffadress == '')
    {
       
                $('#prosstaffadress').css('border', '1px  solid red');
                $('#pros-contactinfobtnhere').html('<i class="fa fa-edit"> Update</i>');

                $.wnoty({
                    type: 'warning',
                    message: "Hey!! address required",
                    autohideDelay: 6000
                });
    }else
    {

            var staffnumber = window.intlTelInput(document.querySelector("#prosstaffnumberedit"), {
            separateDialCode: true,
            preferredCountries: ["ng"],
            hiddenInput: "full",
            utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
            });

        var phonenumfull = staffnumber.getNumber(intlTelInputUtils.numberFormat.E164);
        $("input[name='staffphone[full]'").val(phonenumfull);

       
        $('#pros-contactinfobtnhere').prop('disabled', true);


    $.ajax({
        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prossubmitstaffproscontact-info.php",
        data: {
            
            prosstaffemailedit:prosstaffemailedit,
            prosstaffadress:prosstaffadress,
            phonenumfull:phonenumfull,
            staffID:staffID

        },
        success: function(result) {

            $('#pros-contactinfobtnhere').prop('disabled', false);


            $('#pros-contactinfobtnhere').html('<i class="fa fa-edit"> Update</i>');

           
                if(result.trim() == 'success')
                {


                    $('#edit-proscontactprofile').modal('hide');
                   

                    $('#pros-loadeditnumber').html(phonenumfull);
                    $('#pros-loadeditemail').html(prosstaffemailedit);
                    $('#pros-loadeadresss').html(prosstaffadress);
                      
                    $.wnoty({
                        type: 'success',
                        message: "Great!! record updated successfully.",
                        autohideDelay: 6000
                    });      
                }else
                {

                }
            
        }

    });

        


    }



      

});


// load sate on country change
$('body').on('change', '#country', function() {
    var country = $(this).val();
    var dataString = '&country=' + country;

    $.ajax({
        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/get-state-onboarding.php",
        data: dataString,
        success: function(result) {
            $('#pros-staffstate').html(result);
        }

    });

});
// load sate on country change



// load lga on state change
$('body').on('change', '#pros-staffstate', function() {
    var staffstate = $(this).val();
    var dataString = '&state=' + staffstate;

    $('#pros-lga').html('<option value="0">Loading...</option>');

    $.ajax({
        type: "POST",
        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/get-local-govenrment-onboarding.php",
        data: dataString,
        success: function(result) {
            $('#pros-lga').html(result);
        }
    });
    //  load lga


});
// load lga on state change



$('body').on('click', '#pros-updatestaffpersonal-details', function() {
    $(this).html(
        '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>updating...'
    );

    var fname = $('#fname').val();
    var lname = $('#lname').val();
    var mname = $('#mname').val();
    var bloodg = $('#bloodg').val();
    var religion = $('#pros_get_staff_religion').val();
    var gender = $('#gender').val();
    var dob = $('#dob').val();
    var country = $('#country').val();
    var state = $('#pros-staffstate').val();
    var lga = $('#pros-lga').val();

    var staffID = '<?php echo $staffID  ; ?>';
    var InstitutionID = '<?php echo $InstitutionID ; ?>';
    

        
    if (fname == '') {
        $('#fname').css('border', '1px  solid red');
        $('#pros-updatestaffpersonal-details').html('<i class="fa fa-edit"> Update</i>');

        $.wnoty({
            type: 'warning',
            message: "Hey!! first name required",
            autohideDelay: 6000
        });


    } else if (lname == '') {
        $('#fname').css('border', '1px  solid green');
        $('#lname').css('border', '1px  solid red');
        $('#pros-updatestaffpersonal-details').html('<i class="fa fa-edit"> Update</i>');

        $.wnoty({
            type: 'warning',
            message: "Hey!! last name required",
            autohideDelay: 6000
        });

    } else if (gender == '0' || gender == '') {


        $('#fname').css('border', '1px  solid green');
        $('#lname').css('border', '1px  solid green');
        $('#gender').css('border', '1px  solid red');

        $('#pros-updatestaffpersonal-details').html('<i class="fa fa-edit"> Update</i>');

        $.wnoty({
            type: 'warning',
            message: "Hey!! select staff  gender",
            autohideDelay: 6000
        });


    } else if (dob == '' || dob == '0') {


        $('#fname').css('border', '1px  solid green');
        $('#lname').css('border', '1px  solid green');
        $('#gender').css('border', '1px  solid green');
        $('#dob').css('border', '1px  solid red');
        $('#pros-updatestaffpersonal-details').html('<i class="fa fa-edit"> Update</i>');

        $.wnoty({
            type: 'warning',
            message: "Hey!! staff date of birth required.",
            autohideDelay: 6000
        });



    } else if (bloodg == '' || bloodg == '0') {

        $('#fname').css('border', '1px  solid green');
        $('#lname').css('border', '1px  solid green');
        $('#gender').css('border', '1px  solid green');
        $('#dob').css('border', '1px  solid green');
        $('#bloodg').css('border', '1px  solid red');
        $('#pros-updatestaffpersonal-details').html('<i class="fa fa-edit"> Update</i>');

        $.wnoty({
            type: 'warning',
            message: "Hey!! staff blood group required.",
            autohideDelay: 6000
        });

    } else if (religion == '' || religion == '0') {

        $('#fname').css('border', '1px  solid green');
        $('#lname').css('border', '1px  solid green');
        $('#gender').css('border', '1px  solid green');
        $('#dob').css('border', '1px  solid green');
        $('#bloodg').css('border', '1px  solid green');
        $('#pros_get_staff_religion').css('border', '1px  solid red');
        $('#pros-updatestaffpersonal-details').html('<i class="fa fa-edit"> Update</i>');

        $.wnoty({
            type: 'warning',
            message: "Hey!! staff religion must be selected.",
            autohideDelay: 6000
        });



    } else if (country == '' || country == '0') {

        $('#fname').css('border', '1px  solid green');
        $('#lname').css('border', '1px  solid green');
        $('#gender').css('border', '1px  solid green');
        $('#dob').css('border', '1px  solid green');
        $('#bloodg').css('border', '1px  solid green');
        $('#pros_get_staff_religion').css('border', '1px  solid green');
        $('#country').css('border', '1px  solid red');
        $('#pros-updatestaffpersonal-details').html('<i class="fa fa-edit"> Update</i>');

        $.wnoty({
            type: 'warning',
            message: "Hey!! select country.",
            autohideDelay: 6000
        });

    } else if (state == '' || state == '0') {

        $('#fname').css('border', '1px  solid green');
        $('#lname').css('border', '1px  solid green');
        $('#gender').css('border', '1px  solid green');
        $('#dob').css('border', '1px  solid green');
        $('#bloodg').css('border', '1px  solid green');
        $('#pros_get_staff_religion').css('border', '1px  solid green');
        $('#country').css('border', '1px  solid green');
        $('#pros-staffstate').css('border', '1px  solid red');

        $('#pros-updatestaffpersonal-details').html('<i class="fa fa-edit"> Update</i>');

        $.wnoty({
            type: 'warning',
            message: "Hey!! select state.",
            autohideDelay: 6000
        });

    } else if (lga == '' || lga == '0') {

        $('#fname').css('border', '1px  solid green');
        $('#lname').css('border', '1px  solid green');
        $('#gender').css('border', '1px  solid green');
        $('#dob').css('border', '1px  solid green');
        $('#bloodg').css('border', '1px  solid green');
        $('#pros_get_staff_religion').css('border', '1px  solid green');
        $('#country').css('border', '1px  solid green');
        $('#pros-staffstate').css('border', '1px  solid green');
        $('#pros-lga').css('border', '1px  solid red');



        $('#pros-updatestaffpersonal-details').html('<i class="fa fa-edit"> Update</i>');

        $.wnoty({
            type: 'warning',
            message: "Hey!! select local government area.",
            autohideDelay: 6000
        });

    } else {

        $('#fname').css('border', '1px  solid green');
        $('#lname').css('border', '1px  solid green');
        $('#gender').css('border', '1px  solid green');
        $('#dob').css('border', '1px  solid green');
        $('#bloodg').css('border', '1px  solid green');
        $('#pros_get_staff_religion').css('border', '1px  solid green');
        $('#country').css('border', '1px  solid green');
        $('#pros-staffstate').css('border', '1px  solid green');
        $('#pros-lga').css('border', '1px  solid green');
        $('#pros-updatestaffpersonal-details').html('<i class="fa fa-edit"> Update</i>');

        $.ajax({
            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/updatestaffprofile.php",
            data: {
                fname: fname,
                lname: lname,
                mname: mname,
                bloodg: bloodg,
                religion: religion,
                gender: gender,
                dob: dob,
                country: country,
                state: state,
                lga: lga,
                staffID:staffID,
                InstitutionID:InstitutionID
            },
            success: function(output) {
                $('#edit-staffprofile').modal('hide')

                const selectedTextcount = $('#country option:selected').text();

                    $('#prostaffcountryedit').html(selectedTextcount);
                    $('#prostaffgender').html(gender);
                    $('#prostaffbamefnamehere').html(fname);
                    $('#prostaffbamelnamehere').html(lname);
                    $('#prostaffbamemnamehere').html(mname);

             
                  var prosperdata = (output);
                  

                  if(prosperdata == 'success')
                  {


                            $.wnoty({
                                type: 'success',
                                message: "Great!! staff personal details updated successfully.",
                                autohideDelay: 6000
                            });


                  }else
                  {

                             $.wnoty({
                                type: 'warning',
                                message: "Update failed try again.",
                                autohideDelay: 6000
                            });
                  }

               
            }
        });




    }



      
});




  $('body').on('click', '.pros_submitdocumentmodageneral_btn', function() {
               
               var foldertype = $(this).data('id');
                var filename  = $(this).data('name');
                
                
                $('.prosloaddocumentidtobeuploaded').val(foldertype);
                
                
              $('#prosloaddocumentmodal').modal('show');
              $('.proloaddocumentuploadtitle').html(filename);
     
});



function uploadFileStaff() {
    var fileInput = $('.prosloadstaffimagefileselect')[0];

    // Check if a file is selected
    if (fileInput.files.length > 0) {
        var fileType = fileInput.files[0].type;

        var staffID = '<?php echo $staffID; ?>';
        var InstitutionID = '<?php echo $InstitutionID; ?>';
        var documenttype = $('.prosloaddocumentidtobeuploaded').val();

        var inputFiles = $('.prosloadstaffimagefileselect')[0];
        var filename = inputFiles.files[0].name;
        var fileExtension = filename.split('.').pop();

        // console.log(inputFiles);

        if (inputFiles) {
            // Validate file type
            var allowedTypes = [
                "application/pdf",
                "image/jpeg",
                "image/png",
                "image/gif",
                "image/bmp",
            ];

            if (allowedTypes.indexOf(fileType) === -1) {
                $.wnoty({
                    type: 'warning',
                    message: "Please select a valid PDF or image file",
                    autohideDelay: 5000
                });
                return;
            }

            var reader = new FileReader();
            reader.onload = function (e) {
                var base64Data = e.target.result;
                uploadFile(base64Data, staffID, InstitutionID, documenttype, filename, fileExtension);
            };
            reader.readAsDataURL(inputFiles.files[0]);
        } else {
            $.wnoty({
                type: 'warning',
                message: "Please select a file.",
                autohideDelay: 5000
            });
        }
    } else {
        $.wnoty({
            type: 'warning',
            message: "Please select a file.",
            autohideDelay: 5000
        });
    }

    function uploadFile(base64Data, staffID, InstitutionID, documenttype, filename, fileExtension) {
        
         $('.prosuploaddocumentbtnfinal').html(
        '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>uploading...');
    

        
        // Make an AJAX request to your server to handle the file upload
        $.ajax({
            type: 'POST',
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosuploadstaffdocument.php",
            data: {
                filedata: base64Data,
                staffID: staffID,
                InstitutionID: InstitutionID,
                documenttype: documenttype,
                filename: filename,
                fileExtension: fileExtension
            },
            success: function (output) {
                
                
                
                if(output.trim() == '1')
                {
                     $.wnoty({
                        type: 'success',
                        message: "Great!! file uploaded successfully.",
                        autohideDelay: 5000
                    });
                     $('#prosloaddocumentmodal').modal('hide');
                }else{
                    
                    
                     $.wnoty({
                        type: 'warning',
                        message: "Failed!! file upload failed.",
                        autohideDelay: 5000
                    });
                }
              
                
                  $('.prosuploaddocumentbtnfinal').html('Upload file');   
                
            }
        });
    }
}








 $('body').on('click', '.pros-submitfirstschoolbtn', function() {
     
                
      var fileInput = $('.prosloadimageinputnamedoc')[0];

    // Check if a file is selected
    if (fileInput.files.length > 0) {
        var fileType = fileInput.files[0].type;

        var staffID = '<?php echo $staffID; ?>';
        var InstitutionID = '<?php echo $InstitutionID; ?>';
        var documenttype = 15;

        var inputFiles = $('.prosloadimageinputnamedoc')[0];
        var filename = inputFiles.files[0].name;
        var fileExtension = filename.split('.').pop();

        // console.log(inputFiles);

        if (inputFiles) {
            // Validate file type
            var allowedTypes = [
                "application/pdf",
                "image/jpeg",
                "image/png",
                "image/gif",
                "image/bmp",
            ];

            if (allowedTypes.indexOf(fileType) === -1) {
                $.wnoty({
                    type: 'warning',
                    message: "Please select a valid PDF or image file",
                    autohideDelay: 5000
                });
                return;
            }

            var reader = new FileReader();
            reader.onload = function (e) {
                var base64Data = e.target.result;
                uploadFile(base64Data, staffID, InstitutionID, documenttype, filename, fileExtension);
            };
            reader.readAsDataURL(inputFiles.files[0]);
        } else {
            $.wnoty({
                type: 'warning',
                message: "Please select a file.",
                autohideDelay: 5000
            });
        }
    } else {
        $.wnoty({
            type: 'warning',
            message: "Please select a file.",
            autohideDelay: 5000
        });
    }

    function uploadFile(base64Data, staffID, InstitutionID, documenttype, filename, fileExtension) {
        
         $('.pros-submitfirstschoolbtn').html(
        '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>uploading...');
    

        
        // Make an AJAX request to your server to handle the file upload
        $.ajax({
            type: 'POST',
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosuploadstaffdocument.php",
            data: {
                filedata: base64Data,
                staffID: staffID,
                InstitutionID: InstitutionID,
                documenttype: documenttype,
                filename: filename,
                fileExtension: fileExtension
            },
            success: function (output) {
                
                
                
                if(output.trim() == '1')
                {
                     $.wnoty({
                        type: 'success',
                        message: "Great!! file uploaded successfully.",
                        autohideDelay: 5000
                    });
                    
                }else{
                    
                    
                     $.wnoty({
                        type: 'warning',
                        message: "Failed!! file upload failed.",
                        autohideDelay: 5000
                    });
                }
              
                
                  $('.pros-submitfirstschoolbtn').html('Upload file');   
                
            }
        });
    }                 
     
     
 });

 $('body').on('click', '.prosloaddocumetconbtnmodal', function() {
               
            
                $('#prosloadstaffimagemodaldoc').modal('show');
                
                var foldertype = $(this).data('id');
                 var filename  = $(this).data('name');
                 var staffID = '<?php echo $staffID; ?>';
                 var InstitutionID = '<?php echo $InstitutionID; ?>';
                
                
                
               $('.prosloaddocumentcontehere_content').html('<div align="center"> <i class="fa fa-spinner fa-spin fs-4" style="color:#007ffb;"></i></div>');
                
                
                
                
                
                 $.ajax({
                    type: 'POST',
                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosloadpdfimagecontentdocument.php",
                    data: {
                       foldertype:foldertype,
                        staffID: staffID,
                        InstitutionID: InstitutionID
                        
                    },
                    success: function (output) {
                        
                        
                        
                        $('#prosloaddoctypefullcontent').html(output);
                        
                        
            
                          var prosloadbasecontent = '...';
                          var prosloadbasecontent = $('#prosloadimagebase64content').val();
                          var prosloadstaffdocument_type = $('#prosloadstaffdocument_type').val();
                         
                         
                         
                         if(prosloadstaffdocument_type == 'pdf')
                         {
                             
                             
                             
                             var pdfIframe = $('<iframe>', {
                                src: prosloadbasecontent,
                                style: 'width: 100%; height: 100%; border: none;'
                              });
                               $('.prosloaddocumentcontehere_content').html(pdfIframe);
                            
                             
                         }else
                         {
                             var imageElement = $('<img>', {
                                src: prosloadbasecontent,  // Specify the image source with the 'data:image' prefix
                                alt: 'Image Alt Text',      // Set the alt attribute for accessibility
                                style: 'width: 100%; height: 100%; border: none;'  // Set any additional styles
                            });
                              $('.prosloaddocumentcontehere_content').html(imageElement);
                            
                        
                         }
                       
            
            
            
                            
                
                        
          
                        
                      
                    }
                });
                
                
                
                
             
            
     
});



            const selectImagenew = document.querySelector('.proscontainerimage');
                const inputFilenew = document.querySelector('.pros-logofilehere');


                selectImagenew.addEventListener('click', function () {

                    inputFilenew.click();
                });





        $(document).ready(function() {

              const $signcrop = $('#prosloadsiganture').croppie({
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
                
         $('body').on('change', '#procickinputlogo', function () {
        
        
                var reader = new FileReader();
                reader.onload = function (event) {
                    $signcrop.croppie('bind', {
                        url: event.target.result
                    }).then(function () {
                        console.log('jQuery bind complete');
                    });
                };
        
                reader.readAsDataURL(this.files[0]);
        
                $('#prosloadsignature').modal('show');
            });
            
            
            
            
            
               //PROS SUBMIT SCHOOL HERE
    $('body').on('click', '.prosuploalogobtnheresignature', function () {
        $signcrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (response) {

            $('.prosuploalogobtnheresignature').html('saving... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

            // $('.prossubmitloginimagebtn').html('Crop Image', false);
            $('.prosuploalogobtnheresignature').prop("disabled", true);



          

                 var staffID = '<?php echo $staffID; ?>';
                 var InstitutionID = '<?php echo $InstitutionID; ?>';

            $.ajax({
                type: "POST",
                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosinsertstaffsignaturehere.php",
                data: {
                    staffID: staffID,
                    InstitutionID: InstitutionID,
                    image: response
                },
                success: function (result) {

                    $('.prosuploalogobtnheresignature').prop("disabled", false);
                    $('.prosuploalogobtnheresignature').html("Submit");


                    if (result.trim() == '1') {


                        $.wnoty({
                            type: 'success',
                            message: 'Great! Signature saved successfully.',
                            autohideDelay: 5000, // 3 seconds
                            autohide: true

                        });

                        $('#prosloadsignature').modal('hide');
                        $('#wizardPicturePreview').attr('src', response);


                        const img = document.createElement('img');
                        const imgArea = document.querySelector('.prosbackgroundimagearea');
                        
                        
                          var imagenewcontent = $('<img>', {
                                src: response,  // Specify the image source with the 'data:image' prefix
                                alt: 'Image Alt Text'      // Set the alt attribute for accessibility
                                
                            });
                              $('.prosbackgroundimagearea').html(imagenewcontent);

                        // Add a custom CSS class to the img element (if needed)
                        // img.classList.add('active');
                        // // Set the image source
                        // img.src = response;



                        // // Clear the content of the imgArea
                        // imgArea.innerHTML = '';
                        // // Append the img element to imgArea
                        // imgArea.appendChild(img);

                    }






                }
            }); // Load se





        });


    });

  });
  
  
  
  
  
  
  
  
  $(document).ready(function () {

        var staffID = '<?php echo $staffID; ?>';
       var InstitutionID = '<?php echo $InstitutionID; ?>';



       






       
       




        //LOAD LOGO CONTENT HERE
        $.ajax({
            type: "POST",
            url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/prosloadstaffsignaturecontent.php",
            data: {
                staffID:staffID,
                InstitutionID:InstitutionID
            },
            success: function (result) {

                // $('#pros-school-logo-here').html(result);




                var proslogocontent = result;

                if (proslogocontent == '') {

                } else {



                    $('#wizardPicturePreview').attr('src', proslogocontent);


                    const img = document.createElement('img');
                    const imgArea = document.querySelector('.prosbackgroundimagearea');

                    // Add a custom CSS class to the img element (if needed)
                    // img.classList.add('active');
                    // // Set the image source
                    // img.src = proslogocontent;
                    

                              var imagenewcontent = $('<img>', {
                                src: proslogocontent,  // Specify the image source with the 'data:image' prefix
                                alt: 'Image Alt Text'      // Set the alt attribute for accessibility
                                
                            });
                              $('.prosbackgroundimagearea').html(imagenewcontent);


                    // Clear the content of the imgArea
                    imgArea.innerHTML = '';
                    // Append the img element to imgArea
                    imgArea.appendChild(img);

                }






               



            }
        });
        //LOAD LOGO CONTENT HERE




    });

  
  
  
  
     



</script>