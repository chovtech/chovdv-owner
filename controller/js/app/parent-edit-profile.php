
<script>
    $(document).ready(function() {

        // alert('tari');

        var WhatsappNumber = window.intlTelInput(document.querySelector("#WhatsappNumber"), {
        separateDialCode: true,
        preferredCountries:["ng"],
        hiddenInput: "full",
        utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
        });


        var parentID = '<?php echo $parentID; ?>';
        var ParentGender = '<?php echo $ParentGender; ?>';
        var ParentCountry = '<?php echo $ParentCountry; ?>';
        var ParentState  = '<?php echo $ParentState ; ?>';
        var ParentLga = '<?php echo $ParentLga; ?>';
        var ParentTitle = '<?php echo $ParentTitle; ?>';
        var ParentAddressCountry = '<?php echo $ParentAddressCountry; ?>';


        // alert(ParentTitle);

        $( "#gender  option" ).each( function( i ) {
            // alert(this.value);
            if (this.value == ParentGender) {
                $(this).prop("selected", true);
            } else {
                $(this).prop("selected", false);
            }
        });

        $( "#parenttitle  option" ).each( function( i ) {
            // alert(this.value);
            if (this.value == ParentTitle) {
                $(this).prop("selected", true);
            } else {
                $(this).prop("selected", false);
            }
        });

        $( "#country  option" ).each( function( i ) {
            // alert(this.value);
            if (this.value == ParentCountry) {
                $(this).prop("selected", true);
            } else {
                $(this).prop("selected", false);
            }
        });



        var country = $('#country').val();

        var dataStringstate = '&country='+ country;

        $('#state').html('<option value="0">Loading...</option>');
    
            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/getState.php",
                data: dataStringstate,
                
                success: function(result){
                    $('#state').html(result);    
                    
                    $("#state  option").each( function( i ) {
                        // alert(this.value);
                        if (this.value == ParentState ) {
                            $(this).prop("selected", true);
                        } else {
                            $(this).prop("selected", false);
                        }
                    });

                    var state = $('#state').val();

                    var dataStringlga = '&country='+ country+'&state='+ state;

                    // alert(dataStringlga);

                    $('#lga').html('<option value="0">Loading...</option>');
                    
                    
                    $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/getLGACity.php",
                        data: dataStringlga,
                        
                        success: function(result){  
                            $('#lga').html(result);   

                            $("#lga  option").each( function( i ) {
                                // alert(this.value);
                                if (this.value == ParentLga) {
                                    $(this).prop("selected", true);
                                } else {
                                    $(this).prop("selected", false);
                                }
                            });
                        }
                    });
                }
            });


        $("#country").on("change",function (event) {
				
                var country = $('#country').val();

                var dataString = '&country='+ country;

                $('#state').html('<option value="0">Loading...</option>');
            
                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/getState.php",
                    data: dataString,
                    
                    success: function(result){
                        $('#state').html(result);    
                        
                        
                    }
                });
        });

        $("#state").on("change",function (event) {
            
            var country = $('#country').val();

            var state = $('#state').val();

            var dataString = '&country='+ country+'&state='+ state;

            $('#lga').html('<option value="0">Loading...</option>');
            
            
            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/getLGACity.php",
                data: dataString,
                
                success: function(result){
                    $('#lga').html(result);                           
                }
            });
        });
       
        $('body').on('click', '#update_profile', function() {

            var firstName = $('#fname').val();
            var middleName = $('#mname').val();
            var surnameName = $('#lname').val();
            var gender = $('#gender').val();
            var dob = $('#dob').val();
            var parenttitle = $('#parenttitle').val();
            var country = $('#country').val();
            var state = $('#state').val();
            var lga = $('#lga').val();

            // Check if any input field is empty
           // Check if any input field is empty
            var isEmpty = false;

            $('#edit-profile-form').find('input[type="text"].pro, select,input[type="date"]').each(function() {
                if ($(this).val() === '' || $(this).val() === '0') {
                    isEmpty = true;
                    $(this).css("outline", "1px solid red");
                    return false; // Exit the loop if an empty field is found
                }
                $(this).css("outline", "1px solid green");
            });

            // Display an error message or submit the form
            if (isEmpty) {
                $.wnoty({
                    type: 'warning',
                    message: 'Please fill in all fields with *',
                    autohideDelay: 5000, // 5 seconds
                    position:'top-right',
                    autohide:true
                });
            } else {
                // alert('Form submitted successfully!');

                var regex = /^[a-zA-Z]+$/;

                if (regex.test(firstName) && regex.test(surnameName)) {
                    // alert('Input is valid!');
                    // alert(dataString);

                    $('#update_profile').html('Updating... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                    $(this).prop("disabled", true);

                    $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/update_parent_profile.php",
                        data: {
                            firstName:firstName,
                            middleName:middleName,
                            surnameName:surnameName,
                            gender:gender,
                            dob:dob,
                            parenttitle:parenttitle,
                            country:country,
                            state:state,
                            lga:lga,
                            parentID:parentID
                            },
                        success: function(result) {

                            $('#PersonalDetails').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

                            // alert(result);

                            $('#update_profile').html('Update', false);
                            $('#update_profile').prop("disabled", false);

                            if(result == '0'){

                                $.wnoty({
                                    type: 'warning',
                                    message: 'Not Updated',
                                    autohideDelay: 5000, // 5 seconds
                                    position:'top-right',
                                    autohide:true
                                });
                                
                            }
                            else{

                                $('#PersonalDetails').html(result);

                                $('#edit-profile-form').find('input[type="text"], select,input[type="date"]').each(function() {
                                    $(this).css('outline', '');
                                });

                                var fname = $('#sf').val();
                                var lname = $('#sl').val();
                                var mname = $('#sm').val();
                                var ctry = $('#countryID').val();

                                // alert(ctry);

                                $('#surN').html(lname);
                                $('#firstN').html(fname);
                                $('#middleN').html(mname);
                                $('#ctry').html(ctry);

                            
                                $.wnoty({
                                    type: 'success',
                                    message: 'You Have Successfully Updated',
                                    autohideDelay: 5000, // 5 seconds
                                    position:'top-right',
                                    autohide:true
                                });
                            
                            }
                        }
                    });
                } else {
                    $.wnoty({
                        type: 'warning',
                        message: 'First Name, Last Name and Middle Name Must be Alphabets Only',
                        autohideDelay: 5000, // 5 seconds
                        position:'top-right',
                        autohide:true
                    });
                }
                
            }

           
        });


        //Initializing Image Croppie
        $image_crop = $('#image_demo').croppie({
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

        $('#insert_image').on('change', function(){
            var reader = new FileReader();
            reader.onload = function (event) {
                $image_crop.croppie('bind', {
                url: event.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });
            };
            reader.readAsDataURL(this.files[0]);
            $('#insertimageModal').modal('show');

        });

        // Upload Image Cropped
        $('.crop_image').click(function(event){
            $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response){

                $('.crop_image').html('Cropping... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
               
                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/parentimageUpload.php",
                    data: {
                            image:response,
                            parentID:parentID
                            },
                    success: function(result) {
                        alert(result);
                        if(result == '0'){

                            $.wnoty({
                            type: 'danger',
                            message: 'Image Not Uploaded',
                            autohideDelay: 5000, // 5 seconds
                            position:'top-right',
                            autohide:true
                            });

                        }else{

                            $('.crop_image').html('Crop Image', false);
                            $('.crop_image').prop("disabled", false);
                            
                            $('#insertimageModal').modal('hide');

                            $.wnoty({
                                type: 'success',
                                message: 'Image Uploaded Successfully',
                                autohideDelay: 5000, // 5 seconds
                                position:'top-right',
                                autohide:true
                            });
                            $('#userProfile').attr('src', result).fadeIn('slow');
                            $('#headerPic').attr('src', result).fadeIn('slow');
                            $('#headerPic2').attr('src', result).fadeIn('slow');
                            $('#awardpic').attr('src', result).fadeIn('slow');
                            $('#awardpic2').attr('src', result).fadeIn('slow');
                           
                            
                        }

                        
                    }
                });
            });

        });


        $( "#country2  option" ).each( function( i ) {
            // alert(this.value);
            if (this.value == ParentAddressCountry) {
                $(this).prop("selected", true);
            } else {
                $(this).prop("selected", false);
            }
        });

        $('body').on('click', '#update_contact', function() {

            var parentphonefull = WhatsappNumber.getNumber(intlTelInputUtils.numberFormat.E164);
            $("input[name='WhatsappNumber[full]'").val(parentphonefull);

            var email = $('#email').val();
            var address = $('#address').val();
            var country2 = $('#country2').val();
            var city = $('#city').val();

            var isEmpty = false;

            $('#edit-contact-form').find('textarea, select, input[type="tel"], input[type="text"]').each(function() {
                if ($(this).val() === '' || $(this).val() === '0') {
                    isEmpty = true;
                    $(this).css("outline", "1px solid red");
                    return false; // Exit the loop if an empty field is found
                }
                $(this).css("outline", "1px solid green");
            });

            // Display an error message or submit the form
            if (isEmpty) {
                $.wnoty({
                    type: 'warning',
                    message: 'Please fill in all fields with *',
                    autohideDelay: 5000, // 5 seconds
                    position:'top-right',
                    autohide:true
                });
            } else {

                     //  alert(teacherphonefull);

                $('#update_contact').html('Updating... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                $(this).prop("disabled", true);


                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/update_parent_contact.php",
                    data: {
                    parentphonefull:parentphonefull,
                    email:email,
                    address:address,
                    country2:country2,
                    city:city,
                    parentID:parentID
                },
                    success: function(result) {

                        $('#PersonalContacts').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

                        // alert(result);

                        $('#update_contact').html('Update', false);
                        $('#update_contact').prop("disabled", false);

                        if(result == '0'){

                            $.wnoty({
                                type: 'warning',
                                message: 'Not Updated',
                                autohideDelay: 5000, // 5 seconds
                                position:'top-right',
                                autohide:true
                            });

                        }
                        else{


                        $('#PersonalContacts').html(result);

                            $('#edit-contact-form').find('textarea, select, input[type="tel"], input[type="text"]').each(function() {
                                $(this).css('outline', '');
                            });

                            $.wnoty({
                                type: 'success',
                                message: 'You Have Successfully Updated',
                                autohideDelay: 5000, // 5 seconds
                                position:'top-right',
                                autohide:true
                            });

                        }
                    }
                });

            }

        });


    });

</script>








   
    