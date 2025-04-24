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

                    var AffiliateID = <?php echo $AffiliateID; ?>;
            


                $('#wizardPicturePreview').attr('src', response);
                $('.prosuploalogobtnhere').html('<i class="fa fa-spinner fa-pulse"></i>uploading');
                
                $.ajax({
                    url:'../../controller/scripts/affiliate/profiles/pros-upload_affiliate_image.php',
                    type:'POST',
                    data:{"image":response, "AffiliateID":AffiliateID,},
                    success:function(data){
                        
                        $('.prosuploalogobtnhere').html('Saved');
                        
                        $('#prosloadstaffimagemodal').modal('hide');
                        if(data.trim() == 'success')
                        {
                            $('.posloadimagecontentforall').attr('src', response);
                            $('.pros_load_header_image').attr('src', response);
                            

                                
                                $.wnoty({
                                    type: 'success',
                                    message: 'Great!! image uploaded successfully.',
                                    autohideDelay: 3000, // 5 seconds
                                    position:'top-right',
                                    autohide:true
                                });
                            
                        }else{

                            }

                        
                        
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


        var StaffReligion = '<?php echo $rowGetUserDetails['Religion'] ; ?>';
        var staffstate = '<?php echo  $rowGetUserDetails['State'] ; ?>';
        var stafflga = '<?php echo  $rowGetUserDetails['LGA']; ?>';
        $('#pros_get_staff_religion').val(StaffReligion);


            // load state here
            var country = $('#country').val();
            var dataString = '&country=' + country;

            $('#pros-staffstate').html('<option value="0">Loading...</option>');
            //  load state
            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/get-state-onboarding.php",
                data: dataString,
                success: function(result) {
                    $('#pros-staffstate').html(result);
                    $('#pros-staffstate').val(staffstate);


                    //  load lga
                    var dataString = '&state=' + staffstate;

                    $('#pros-lga').html('<option value="0">Loading...</option>');

                    $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/get-local-govenrment-onboarding.php",
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




        
    // load sate on country change
    $('body').on('change', '#country', function() {
        var country = $(this).val();
        var dataString = '&country=' + country;

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/get-state-onboarding.php",
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
            url: "../../controller/scripts/owner/get-local-govenrment-onboarding.php",
            data: dataString,
            success: function(result) {
                $('#pros-lga').html(result);
            }
        });
        //  load lga


    });
    // load lga on state change



     
    //pros submit affilite contact info here
    $('body').on('click', '#pros-contactinfobtnhere', function() {
        $(this).html(
            '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>saving...'
        );

    

        var prosstaffadress = $('#prosstaffadress').val();
        var prosstaffemailedit = $('#prosstaffemailedit').val();
        var prosstaffnumberedit = $('#prosstaffnumberedit').val();
        var AffiliateID = <?php echo $AffiliateID; ?>;
    
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
                    url: "../../controller/scripts/affiliate/profiles/update_proscontact_info.php",
                    data: {
                        
                        prosstaffemailedit:prosstaffemailedit,
                        prosstaffadress:prosstaffadress,
                        phonenumfull:phonenumfull,
                        AffiliateID:AffiliateID

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
    //pros submit affilite contact info here



    
     //pros submit affiliate personal details here
    $('body').on('click', '#pros-updatestaffpersonal-details', function() {
        $(this).html(
            '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>updating...'
        );

        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var mname = $('#mname').val();
    
        var religion = $('#pros_get_staff_religion').val();
        var gender = $('#gender').val();
    
        var country = $('#country').val();
        var state = $('#pros-staffstate').val();
        var lga = $('#pros-lga').val();

        var AffiliateID = <?php echo $AffiliateID; ?>;
        
        

            
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
                message: "Hey!! select gender",
                autohideDelay: 6000
            });


        }  else if (religion == '' || religion == '0') {

            $('#fname').css('border', '1px  solid green');
            $('#lname').css('border', '1px  solid green');
            $('#gender').css('border', '1px  solid green');
            $('#dob').css('border', '1px  solid green');
            $('#bloodg').css('border', '1px  solid green');
            $('#pros_get_staff_religion').css('border', '1px  solid red');
            $('#pros-updatestaffpersonal-details').html('<i class="fa fa-edit"> Update</i>');

            $.wnoty({
                type: 'warning',
                message: "Hey!!  religion must be selected.",
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
            // $('#dob').css('border', '1px  solid green');
            // $('#bloodg').css('border', '1px  solid green');
            $('#pros_get_staff_religion').css('border', '1px  solid green');
            $('#country').css('border', '1px  solid green');
            $('#pros-staffstate').css('border', '1px  solid green');
            $('#pros-lga').css('border', '1px  solid green');
            $('#pros-updatestaffpersonal-details').html('<i class="fa fa-edit"> Update</i>');

            $.ajax({
                type: "POST",
                url: "../../controller/scripts/affiliate/profiles/update_affiliate_profile.php",
                data: {
                    fname: fname,
                    lname: lname,
                    mname: mname,
                    // bloodg: bloodg,
                    religion: religion,
                    gender: gender,
                    // dob: dob,
                    country: country,
                    state: state,
                    lga: lga,
                    AffiliateID:AffiliateID,
                    // InstitutionID:InstitutionID
                },
                success: function(output) {
                    $('#edit-staffprofile').modal('hide')

                    const selectedTextcount = $('#country option:selected').text();

                        $('#prostaffcountryedit').html(selectedTextcount);
                        $('#prostaffgender').html(gender);
                        $('#prostaffbamefnamehere').html(fname);
                        $('#prostaffbamelnamehere').html(lname);
                        $('#prostaffbamemnamehere').html(mname);


                        $('.prosload_header_fullname').html(fname + ' ' + lname);

                        $('.pros_load_full_name_profile').html(fname + ' ' + mname + ' ' + lname);




                
                    var prosperdata = (output);
                    

                    if(prosperdata == 'success')
                    {


                                $.wnoty({
                                    type: 'success',
                                    message: "Great!!  personal details updated successfully.",
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
    //pros submit affiliate personal details here





     //pros submit affilite contact info here
     $('body').on('click', '#pros_edit_bankdetails_btn', function() {
        $(this).html(
            '<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>saving...'
        );

    

        var bank_code = $('.bank_code_input_pros').val();
        var bank_name = $('.bank_code_input_pros option:selected').data('id');


        var acc_name = $('#pros_affiliate_account_nameedit').val();
        var acc_no = $('#pros_affiliate_account_noedit').val();
        var AffiliateID = <?php echo $AffiliateID; ?>;


      

       
      
    
        if(bank_name == '' || bank_name == '0')
        {
        
            
            $('.bank_code_input_pros').css('border', '1px  solid red');
            $('#pros_edit_bankdetails_btn').html('<i class="fa fa-edit"> Save</i>');

            $.wnoty({
                type: 'warning',
                message: "Hey!! Select Bank to proceed",
                autohideDelay: 6000
            });

        }else if(acc_name == '')
        {

            
            $('#pros_affiliate_account_nameedit').css('border', '1px  solid red');
            $('#pros_edit_bankdetails_btn').html('<i class="fa fa-edit"> Save</i>');

            $.wnoty({
                type: 'warning',
                message: "Hey!! acc name required",
                autohideDelay: 6000
            });

        }else if(acc_no == '')
        {
        

            
            
                    $('#pros_affiliate_account_noedit').css('border', '1px  solid red');
                    $('#pros_edit_bankdetails_btn').html('<i class="fa fa-edit"> Save</i>');

                    $.wnoty({
                        type: 'warning',
                        message: "Hey!! Acc No required",
                        autohideDelay: 6000
                    });
        }else
        {

              
        
            $('#pros_edit_bankdetails_btn').prop('disabled', true);


                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/affiliate/profiles/update_prosbank_info.php",
                    data: {
                        
                            bank_code:bank_code,
                            bank_name:bank_name,
                            acc_name:acc_name,
                            acc_no:acc_no,
                           AffiliateID:AffiliateID

                    },
                    success: function(result) {

                     
                        

                        $('#pros_edit_bankdetails_btn').prop('disabled', false);


                        $('#pros_edit_bankdetails_btn').html('<i class="fa fa-edit"> Update</i>');

                    
                            if(result.trim() == 'success')
                            {


                                $('#edit_accdetail_modal').modal('hide');
                            

                                $('.pros_load_bank').html(bank_name);
                                $('.pros_loadbank_name').html(acc_name);
                                $('.pros_loadbank_accno').html(acc_no);

                               
                                                                        
                                
                                $.wnoty({
                                    type: 'success',
                                    message: "Great!! Bank Details Saved successfully.",
                                    autohideDelay: 6000
                                });      
                            }else
                            {

                            }
                        
                    }

                });

                    


        }



        

    });
    //pros submit affilite contact info here






   


  
  
  
  
     



</script>