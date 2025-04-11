
<script>
    $(document).ready(function() {

        var WhatsappNumber = window.intlTelInput(document.querySelector("#WhatsappNumber"), {
        separateDialCode: true,
        preferredCountries:["ng"],
        hiddenInput: "full",
        utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
        });



        var studentID = '<?php echo $studentID; ?>';
        var BloodGroup = '<?php echo $StudentBloodGroup; ?>';
        var StudentReligion = '<?php echo $StudentReligion; ?>';
        var StudentGender = '<?php echo $StudentGender; ?>';
        var StudentCountry = '<?php echo $StudentCountry; ?>';
        var StudentState = '<?php echo $StudentState; ?>';
        var StudentLga = '<?php echo $StudentLga; ?>';

        
        // alert(BloodGroup);

        $( "#bloodg  option" ).each( function( i ) {
            // alert(this.value);
            if (this.value == BloodGroup) {
                $(this).prop("selected", true);
            } else {
                $(this).prop("selected", false);
            }
        });

        $( "#gender  option" ).each( function( i ) {
            // alert(this.value);
            if (this.value == StudentGender) {
                $(this).prop("selected", true);
            } else {
                $(this).prop("selected", false);
            }
        });

        $( "#religion  option" ).each( function( i ) {
            // alert(this.value);
            if (this.value == StudentReligion) {
                $(this).prop("selected", true);
            } else {
                $(this).prop("selected", false);
            }
        });

        $( "#country  option" ).each( function( i ) {
            // alert(this.value);
            if (this.value == StudentCountry) {
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
                        if (this.value == StudentState) {
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

                            $( "#lga  option" ).each( function( i ) {
                                // alert(this.value);
                                if (this.value == StudentLga) {
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
            var bloodgroup = $('#bloodg').val();
            var religion = $('#religion').val();
            var country = $('#country').val();
            var state = $('#state').val();
            var lga = $('#lga').val();

            var allergies = $('#allergies').val();
            var disability = $('#disability').val();


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

                        $('#update_profile').html('Updating... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                        $(this).prop("disabled", true);

                        $.ajax({
                            type: "POST",
                            url: "../../controller/scripts/owner/update_student_profile.php",
                            data: {
                                    firstName:firstName,
                                    middleName:middleName,
                                    surnameName:surnameName,
                                    gender:gender,
                                    dob:dob,
                                    bloodgroup:bloodgroup,
                                    religion:religion,
                                    country:country,
                                    state:state,
                                    lga:lga,
                                    allergies:allergies,
                                    disability:disability,
                                    studentID:studentID
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
                                    
                                    $('#edit-profile-form').find('input[type="text"], select,input[type="date"]').each(function() {
                                        $(this).css('outline', '');
                                    });

                                    $('#PersonalDetails').html(result);

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

                    }
                    else{

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
                    url: "../../controller/scripts/owner/student_imageUpload.php",
                    data: {
                            image:response,
                            studentID:studentID
                            },
                    success: function(result) {
                        // alert(result);
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
            if (this.value == StudentCountry) {
                $(this).prop("selected", true);
            } else {
                $(this).prop("selected", false);
            }
        });

        $('body').on('click', '#update_contact', function() {

            // var WhatsappNumberfull = WhatsappNumber.getNumber(intlTelInputUtils.numberFormat.E164);
            //  $("input[name='WhatsappNumber[full]'").val(WhatsappNumberfull);

            var studentphonefull = WhatsappNumber.getNumber(intlTelInputUtils.numberFormat.E164);
            $("input[name='WhatsappNumber[full]'").val(studentphonefull);

            var email = $('#email').val();
            var address = $('#address').val();
            var country2 = $('#country2').val();
            var city = $('#city').val();


            var isEmpty = false;

                $('#edit-contact-form').find('textarea, select').each(function() {
                    if ($(this).val() === '' || $(this).val() === '0') {
                        isEmpty = true;
                        $(this).css("outline", "1px solid red");
                        return false; // Exit the loop if an empty field is found
                    }
                    $(this).css("outline", "1px solid green");
                });

                // Display an error message or submit the form
                if (isEmpty) 
                {
                    $.wnoty({
                        type: 'warning',
                        message: 'Please fill in all fields with *',
                        autohideDelay: 5000, // 5 seconds
                        position:'top-right',
                        autohide:true
                    });
                } 
                else {
                //  alert(studentphonefull);

                    $('#update_contact').html('Updating... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                    $(this).prop("disabled", true);


                    $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/update_student_contact.php",
                        data: {
                            studentphonefull:studentphonefull,
                            email:email,
                            address:address,
                            country2:country2,
                            city:city,
                            studentID:studentID
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








   
    