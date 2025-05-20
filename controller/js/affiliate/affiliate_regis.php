
<script>



// Initialize the phone input when the document is ready
$(document).ready(function() {
    
    // Initialize intlTelInput with your specific configuration
    var MainNumber = window.intlTelInput(document.querySelector("#Phone"), {
        separateDialCode: true,
        preferredCountries: ["ng"],
        hiddenInput: "full",
        utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
    });

    // Store the instance for later use
    window.phoneInput = MainNumber;
    
    
         

    // Password visibility toggle
    $('.viewpassresestsignup').on('click', function() {
        const passwordInput = $('#password');
        const type = passwordInput.attr('type') === 'password' ? 'text' : 'password';
        passwordInput.attr('type', type);
        $(this).toggleClass('fa-eye fa-eye-slash');
    });
});

// Function to update field appearance
const updateFieldAppearance = (fieldId, isValid) => {
    const $field = $(`#${fieldId}`);
    if (isValid) {
        $field.css('outline', '1px solid green');
        if (fieldId !== 'password') {
            $field.removeClass('is-invalid').addClass('is-valid');
        }
    } else {
        $field.css('outline', '1px solid red');
        if (fieldId !== 'password') {
            $field.removeClass('is-valid').addClass('is-invalid');
        }
    }
};

// Function to update select field appearance
const updateSelectAppearance = (fieldClass, isValid) => {
    const $field = $(`.${fieldClass}`);
    if (isValid) {
        $field.css('outline', '1px solid green');
        $field.removeClass('is-invalid').addClass('is-valid');
    } else {
        $field.css('outline', '1px solid red');
        $field.removeClass('is-valid').addClass('is-invalid');
    }
};

// Function to update textarea appearance
const updateTextareaAppearance = (fieldClass, isValid) => {
    const $field = $(`.${fieldClass}`);
    if (isValid) {
        $field.css('outline', '1px solid green');
        $field.removeClass('is-invalid').addClass('is-valid');
    } else {
        $field.css('outline', '1px solid red');
        $field.removeClass('is-valid').addClass('is-invalid');
    }
};

// Enhanced validation utility functions
const validators = {
    // Email validation
    email: (email) => {
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return {
            isValid: emailPattern.test(email),
            message: "Please enter a valid email address"
        };
    },

    // Password validation
    password: (password) => {
        const validations = {
            length: { regex: /.{8,}/, message: "Password must be at least 8 characters long" },
            uppercase: { regex: /[A-Z]/, message: "Password must contain at least one uppercase letter" },
            lowercase: { regex: /[a-z]/, message: "Password must contain at least one lowercase letter" },
            number: { regex: /[0-9]/, message: "Password must contain at least one number" },
            specialChar: { regex: /[!@#$%^&*]/, message: "Password must contain at least one special character (!@#$%^&*)" }
        };

        for (const [key, validation] of Object.entries(validations)) {
            if (!validation.regex.test(password)) {
                return { isValid: false, message: validation.message };
            }
        }
        return { isValid: true, message: "Password is valid" };
    },

    // Phone number validation with country code
    phone: (phone) => {
        const MainNumber = window.phoneInput;
        if (!MainNumber) {
            return {
                isValid: false,
                message: "Phone validation not initialized",
                fullNumber: phone
            };
        }
    
        // Custom validation for Nigerian numbers
        const isValidNigerianNumber = (number) => {
            const nigeriaPattern = /^(?:0|\+234)?(70|80|81|90|91|91)\d{8}$/;
            return nigeriaPattern.test(number);
        };
    
        // Check if the number is valid using intl-tel-input
        let isValid = MainNumber.isValidNumber();
    
        // If intl-tel-input validation fails, perform custom Nigerian validation
        if (!isValid && isValidNigerianNumber(phone)) {
            isValid = true;
        }
    
        return {
            isValid: isValid,
            message: "Please enter a valid phone number",
            fullNumber: MainNumber.getNumber()
        };
    },


    // Name validation
    name: (name) => {
        const namePattern = /^[a-zA-Z\s]{2,50}$/;
        return {
            isValid: namePattern.test(name),
            message: "Name should only contain letters and spaces (2-50 characters)"
        };
    },

    // Required field validation
    required: (value) => {
        return {
            isValid: value !== null && value !== undefined && value.trim() !== '',
            message: "This field is required"
        };
    },

    // Location validation
    location: (value) => {
        return {
            isValid: value !== 'NULL' && value !== 'null' && value !== '' && value !== '0' && value !== null && value !== undefined,
            message: "Please select a valid location"
        };
    }
};

// Form validation function
const validateForm = (formData) => {
    const errors = [];
    const validatedFields = {};

    // Validate first name
    const firstNameValidation = validators.name(formData.firstname);
    validatedFields.firstname = firstNameValidation.isValid;
    if (!firstNameValidation.isValid) {
        errors.push({ field: 'firstname', message: firstNameValidation.message });
    }

    // Validate last name
    const lastNameValidation = validators.name(formData.lastname);
    validatedFields.lastname = lastNameValidation.isValid;
    if (!lastNameValidation.isValid) {
        errors.push({ field: 'lastname', message: lastNameValidation.message });
    }

    // Validate email
    const emailValidation = validators.email(formData.email);
    validatedFields.email = emailValidation.isValid;
    if (!emailValidation.isValid) {
        errors.push({ field: 'email', message: emailValidation.message });
    }

    // Validate phone
    const phoneValidation = validators.phone(formData.phone);
    validatedFields.Phone = phoneValidation.isValid;
    // alert(validatedFields.Phone);
    if (!phoneValidation.isValid) {
        errors.push({ field: 'Phone', message: phoneValidation.message });
    }

    // Validate password
    const passwordValidation = validators.password(formData.password);
    validatedFields.password = passwordValidation.isValid;
    if (!passwordValidation.isValid) {
        errors.push({ field: 'password', message: passwordValidation.message });
    }

    // Validate country
    const countryValidation = validators.location(formData.pros_country);
    validatedFields.pros_country = countryValidation.isValid;
    if (!countryValidation.isValid) {
        errors.push({ field: 'pros_country', message: "Please select a country" });
    }

    // Validate region
    const regionValidation = validators.location(formData.pros_region);
    validatedFields.pros_region = regionValidation.isValid;
    if (!regionValidation.isValid) {
        errors.push({ field: 'pros_region', message: "Please select a region" });
    }

    // Validate location
    const locationValidation = validators.location(formData.location);
    validatedFields.location = locationValidation.isValid;
    if (!locationValidation.isValid) {
        errors.push({ field: 'location', message: "Please select a location" });
    }

    // Validate about yourself
    const aboutSelfValidation = validators.required(formData.tellusaboutyou_self);
    validatedFields.tellusaboutyou_self = aboutSelfValidation.isValid;
    if (!aboutSelfValidation.isValid) {
        errors.push({ field: 'tellusaboutyou_self', message: "Please tell us about yourself" });
    }

    // Validate marketing approach
    const marketingValidation = validators.required(formData.tellusaboutyou_want_market);
    validatedFields.tellusaboutyou_want_market = marketingValidation.isValid;
    if (!marketingValidation.isValid) {
        errors.push({ field: 'tellusaboutyou_want_market', message: "Please tell us how you want to market EduMESS" });
    }

    return {
        isValid: errors.length === 0,
        errors: errors,
        validatedFields: validatedFields
    };
};

// Add real-time validation for all inputs
$('#firstname, #lastname, #email, #Phone, #password').on('input change', function() {
    const fieldId = $(this).attr('id');
    const value = $(this).val();
    
    let validation;
    switch(fieldId) {
        case 'firstname':
        case 'lastname':
            validation = validators.name(value);
            break;
        case 'email':
            validation = validators.email(value);
            break;
        case 'Phone':
            validation = validators.phone(value);
            break;
        case 'password':
            validation = validators.password(value);
            break;
    }
    
    if (validation) {
        updateFieldAppearance(fieldId, validation.isValid);
    }
});

// Add real-time validation for select fields
$('.pros-franchise-country, .pros-franchiseregion, .pros-load-locationhere').on('change', function() {
    const fieldClass = $(this).attr('class').split(' ').find(cls => 
        cls === 'pros-franchise-country' || 
        cls === 'pros-franchiseregion' || 
        cls === 'pros-load-locationhere'
    );
    const value = $(this).val();
    
    const validation = validators.location(value);
    updateSelectAppearance(fieldClass, validation.isValid);
});

// Add real-time validation for textareas
$('.prostelabout-yourself-input, .pros-how-youwant-market-edumess').on('input', function() {
    const fieldClass = $(this).attr('class').split(' ').find(cls => 
        cls === 'prostelabout-yourself-input' || 
        cls === 'pros-how-youwant-market-edumess'
    );
    const value = $(this).val();
    
    const validation = validators.required(value);
    updateTextareaAppearance(fieldClass, validation.isValid);
});

// Update the click handler to use the enhanced validation
$('body').on('click', '#pros_signupaff_btn', function() {
    // Show loading spinner
    $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    

    var consultandid  = '<?= isset($consultant_id) && $consultant_id !== null ? htmlspecialchars($consultant_id, ENT_QUOTES, 'UTF-8') : ''; ?>';
    var tagstateid = $(this).data('id');
      
    var lang = 	localStorage.getItem("lang");
    if(lang == '' ||lang === undefined || lang === null)
    {
        var defaultlang = 'english';
    }else
    {
        var defaultlang = lang;
    }
    
    var signup_as = 'affiliate';
    var  email = $('#email').val();
    
    // Get form values
    const formData = {
        firstname: $('#firstname').val(),
        lastname: $('#lastname').val(),
        email: $('#email').val(),
        phone: $('#Phone').val(),
        password: $('#password').val(),
        signup_as: 'affiliate',
        pros_country: $('.pros-franchise-country').val(),
        pros_region: $('.pros-franchiseregion').val(),
        location: $('.pros-load-locationhere').val(),
        tellusaboutyou_self: $('.prostelabout-yourself-input').val(),
        tellusaboutyou_want_market: $('.pros-how-youwant-market-edumess').val(),
        consultandid:consultandid,
        tagid:tagstateid,
        defaultlang:defaultlang
    };
    
    // Get phone number in E164 format
    const phoneValidation = validators.phone(formData.phone);
    // alert(phoneValidation.fullNumber);
    
    // Update the hidden input with the full phone number
    $("input[name='WhatsappNumber[full]'").val(phoneValidation.fullNumber);

    // Validate form
    const validationResult = validateForm(formData);

    // Update visual feedback for all fields
    Object.entries(validationResult.validatedFields).forEach(([fieldId, isValid]) => {
        if (fieldId === 'password') {
            // Skip visual feedback for password field
            return;
        }
        
        if (fieldId === 'pros_country' || fieldId === 'pros_region' || fieldId === 'location') {
            const fieldClass = fieldId === 'pros_country' ? 'pros-franchise-country' :
                             fieldId === 'pros_region' ? 'pros-franchiseregion' :
                             'pros-load-locationhere';
            updateSelectAppearance(fieldClass, isValid);
        } else if (fieldId === 'tellusaboutyou_self' || fieldId === 'tellusaboutyou_want_market') {
            const fieldClass = fieldId === 'tellusaboutyou_self' ? 'prostelabout-yourself-input' :
                             'pros-how-youwant-market-edumess';
            updateTextareaAppearance(fieldClass, isValid);
        } else {
            updateFieldAppearance(fieldId, isValid);
        }
    });

    if (!validationResult.isValid) {
        // Reset button state
        
        
        // Show first error message
        $.wnoty({
            type: 'warning',
            message: validationResult.errors[0].message,
            autohideDelay: 5000
        });

        $('#pros_signupaff_btn').html('<i class="fas fa-user-plus"></i> Register Now');

        // Scroll to the first error
        const errorField = validationResult.errors[0].field;
        if (errorField === 'pros_country' || errorField === 'pros_region' || errorField === 'location') {
            // $('html, body').animate({
            //     scrollTop: $(`.${errorField}`).offset().top - 100
            // }, 'fast');
        } else {
            // $('html, body').animate({
            //     scrollTop: $(`#${errorField}`).offset().top - 100
            // }, 'fast');
        }
        
        return;
    }

    // All validations passed - proceed with form submission
    // TODO: Implement your AJAX call here
    $('#pros_signupaff_btn').prop('disabled', true);
    $.ajax({
        type: 'post',
        url: '../controller/scripts/affiliate/signuppage.php',
        data: {
            ...formData,
            phonenumfull: phoneValidation.fullNumber
        },
        success: function(response) {
            // alert(response);
            // Handle response



                // alert(output);						    
                var prosfeedback = (response);

                if(prosfeedback.trim() === 'found')
                {

                    $.wnoty({
                        type: 'warning',
                        message: "Hey! email already exist click to login.",
                        autohideDelay: 5000
                    });
                                                
                }else
                {
                                 
                                            
                    var redirectUrl2 = "../signup-verification/?LcH6eMciwz3OOqP7KOrjjFf2V1DYE6=mkiuytrcccvvUR93vlqtfuRp3GPYGbHuyx9Y2LjWhr&UR93vlqtfuRp3GPYGbHuyx9Y2LjWhr=kjgytrexcdsLcH6eMciwz3OOqP7KOrjjFf2V1DYE6&oionxx=&UR93vlqtfuRp3GPYGbHuyx9Y2LjWhr=kjgytrexcdsLcH6eMciwz3OOqP7KOrjjFf2V1DYE6&marana=" + email + "&kjgytrexcdsLcH6eMciwz3OOqP7KOrjjFf2V1DYE6=UR93vlqtfuRp3GPYGbHuyx9Y2LjWhr&tak=&oionxx=" + prosfeedback + "&lang=" + defaultlang +"&utype=" + signup_as;

                    var ref_id = localStorage.getItem('ref');
                    var my_name = firstname+' '+lastname;
                    var my_email = email;
                    var number_new = phoneValidation.fullNumber;
                    var amount = '';
                    var paymentRef = '';

                    // salesplode_api(ref_id,my_name,my_email,number_new,amount,paymentRef,redirectUrl2);
                    $.wnoty({
                        type: 'success',
                        message: "Great!! signup  successfully.",
                        autohideDelay: 5000
                    });
                    
                    window.location.href = redirectUrl2;
                                            
                }

                // $('#successdisplay').html(output);//Show fetched data from database
                $('#pros_signupaff_btn').html('<i class="fas fa-user-plus"></i> Register Now');
                $('#pros_signupaff_btn').prop('disabled', false);

        }
    });
   
});
</script>