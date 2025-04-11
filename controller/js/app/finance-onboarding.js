$(document).ready(function(){
   abba_get_campus(); 
});


$('body').on('click', '.abba_close_btn', function(){
    location.reload();
});


// change of institution
$('body').on('change', '.abba-change-institution', function () {

    var institution_id = $('.abba-change-institution option:selected').data('id');

    var institution_name = $('.abba-change-institution option:selected').text();

    var institution_url = $('.abba-change-institution option:selected').data('url');

    localStorage.setItem("abba-stored-institution-id", institution_id);
    localStorage.setItem("abba-stored-institution-name", institution_name);
    localStorage.setItem("abba-stored-institution-CustomUrl", institution_url);

    abba_get_campus();
});


// function to get campus
function abba_get_campus() {

    $('#abba_display_fee_campus').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');

    var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");
    var abba_get_stored_instituion_name = localStorage.getItem("abba-stored-institution-name");

    // get campus ajax
    var dataString = 'abba_instituion_id=' + abba_get_stored_instituion_id;

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba-get-campus.php",
        data: dataString,
        //cache: false,
        success: function (output) {
            // alert(output);
            
            $('#abba_display_fee_campus').html(output);

        }
    });

}


$(document).ready(function () {

    var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");

    $('#abba_display_finance_campus').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

    // alert(abba_get_stored_instituion_id);

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/finance-onboarding/abba-get_campus_for_finance.php",
        data: { abba_instituion_id: abba_get_stored_instituion_id },
        //cache: false,
        success: function (output) {

            $('#abba_display_finance_campus').html(output);

            var campus_id = $('.active-card').data('id');

            // alert(campus_id);

            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/finance-onboarding/abba-check_finance_setup.php",
                data: { abba_instituion_id: abba_get_stored_instituion_id, campus_id: campus_id },
                //cache: false,
                success: function (data) {

                    // alert(data);

                    if (data == '1') {
                        
                    }
                    else{
                        $('#financeonboardingModal').modal('show');

                    }

                }
            });

            $(document).ready(function () {
                // hidden things
                
                $(".form-business").hide();
                // next button
                $(".next_1").on({
                    click: function () {
                        // select any card
                        var getValue = $(this).parents(".row").find(".abba_card").hasClass("active-card");

                        var campus_id = $('.active-card').data('id');

                        // alert($campus_id);

                        if (getValue) {

                            $('#abba_display_section').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

                            
                            $.ajax({
                                type: "POST",
                                url: "../../controller/scripts/owner/abba-get-term.php",
                                data: { abba_campus_id: campus_id },
                                //cache: false,
                                success: function (output) {
                                    // alert(output);
                                    $('#abba_display_term').html(output);

                                    var abba_display_session = $('#abba_display_session option:selected').val();

                                    var abba_display_term = $('#abba_display_term option:selected').val();

                                    $.ajax({
                                        type: "POST",
                                        url: "../../controller/scripts/owner/finance-onboarding/abba-get_campus_sections.php",
                                        data: { campus_id: campus_id, abba_display_session: abba_display_session, abba_display_term: abba_display_term, abba_instituion_id: abba_get_stored_instituion_id },
                                        //cache: false,
                                        success: function (outputdata) {
        
                                            $('#abba_display_section').html(outputdata);
                                            

                                            $(document).ready(function () {
                                                var coll = document.getElementsByClassName("collapsible");
                                                var i;

                                                for (i = 0; i < coll.length; i++) {
                                                    coll[i].addEventListener("click", function () {
                                                        this.classList.toggle("active");
                                                        var content = this.nextElementSibling;
                                                        if (content.style.maxHeight) {
                                                            content.style.maxHeight = null;
                                                        } else {
                                                            content.style.maxHeight = content.scrollHeight + "px";
                                                        }
                                                    });
                                                }
                                            });
                                        }

                                    });

                                }
                            });

                            $("#progressBar .active").next().addClass("active");
                            $(this).parents(".row").fadeOut("slow", function () {
                                $(this).next(".row").fadeIn("slow");
                            });

                        }
                        else {
                            $.wnoty({
                                type: 'warning',
                                message: "Hey, select a campus to proceed.",
                                autohideDelay: 5000
                            });
                        }
                    }
                });

                $(".next_2").on({
                    click: function () {

                        var campus_id = $('.active-card').data('id');

                        var abba_display_session = $('#abba_display_session option:selected').val();

                        var abba_display_term = $('#abba_display_term option:selected').val();

                        var click_from = '0';

                        var class_id = [];

                        $.each($(".abba_class_checkbox:checked"), function () {
                            class_id.push($(this).data('id'));
                        });

                        if ($('.abba_class_checkbox:checked').length > 0) {

                            $('#abba_display_categories').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

                            $.ajax({
                                type: "POST",
                                url: "../../controller/scripts/owner/finance-onboarding/abba-get_categories_and_sub.php",
                                data: { campus_id: campus_id, abba_display_session: abba_display_session, abba_display_term: abba_display_term, abba_instituion_id: abba_get_stored_instituion_id, class_id: class_id, click_from: click_from },
                                //cache: false,
                                success: function (outputdata) {

                                    $('#abba_display_categories').html(outputdata);

                                    $(document).ready(function () {
                                        var coll = document.getElementsByClassName("collapsible");
                                        var i;

                                        for (i = 0; i < coll.length; i++) {
                                            coll[i].addEventListener("click", function () {
                                                this.classList.toggle("active");
                                                var content = this.nextElementSibling;
                                                if (content.style.maxHeight) {
                                                    content.style.maxHeight = null;
                                                } else {
                                                    content.style.maxHeight = content.scrollHeight + "px";
                                                }
                                            });
                                        }
                                    });
                                }
                            });

                            $("#progressBar .active").next().addClass("active");
                            $(this).parents(".row").fadeOut("slow", function () {
                                $(this).next(".row").fadeIn("slow");
                            });

                        }
                        else if(abba_display_session == 'NULL' || abba_display_session == '' || abba_display_term == 'NULL' || abba_display_term == '')
                        {
                            $.wnoty({
                                type: 'warning',
                                message: "Hey, select a session and term to proceed.",
                                autohideDelay: 5000
                            });
                        }
                        else {
                            $.wnoty({
                                type: 'warning',
                                message: "Hey, select a class to proceed.",
                                autohideDelay: 5000
                            });
                        }
                    }
                });

                $(".next_3").on({
                    click: function () {

                        var campus_id = $('.active-card').data('id');

                        if ($('.abba_subcat_checkbox:checked').length > 0) {


                            $("#progressBar .active").next().addClass("active");
                            $(this).parents(".row").fadeOut("slow", function () {
                                $(this).next(".row").fadeIn("slow");
                            });

                        }
                        else {
                            $.wnoty({
                                type: 'warning',
                                message: "Hey, select an item to proceed.",
                                autohideDelay: 5000
                            });
                        }
                    }
                });

                $(".next_4").on({
                    click: function () {

                        var campus_id = $('.active-card').data('id');

                        var abba_display_session = $('#abba_display_session option:selected').val();

                        var abba_display_term = $('#abba_display_term option:selected').val();

                        var user_id = $('#user_id').val();

                        var user_type = $('#user_type').val();

                        var class_id = [];

                        $.each($(".abba_class_checkbox:checked"), function () {
                            class_id.push($(this).data('id'));
                        });

                        // Initialize an array to store the collected data
                        var rowData = [];

                        // Flag to check if any field is left empty
                        var isEmptyField = false;

                        // Loop through each row with the class "abba_items_amt"
                        $('.abba_items_amt').each(function () {
                            var row = $(this);

                            // Extract class_name from the h6 element within the row
                            var sub_cat_id = $(this).data('subcat');

                            var cat_id = $(this).data('cat');

                            // Extract the input element within the row
                            var input = row.find('input[type="number"]');

                            // Extract value from the input element within the row
                            var value = input.val();

                            // Extract checkbox state from the input element within the row
                            var isChecked_checker = row.find('input[type="checkbox"]').is(':checked');

                            if(isChecked_checker == false)
                            {
                                var isChecked = 0;
                            }
                            else{
                                var isChecked = 1;
                            }

                            // Check if the value is empty
                            if (value === '') {
                                isEmptyField = true;
                                // Change the border-color of the empty input field to red
                                input.css('border-color', 'red');
                                return false; // Exit the loop if any field is empty
                            } else {
                                // Reset the border-color of the input field
                                input.css('border-color', '');
                            }

                            // Push the collected data into the rowData array
                            rowData.push({
                                sub_cat_id: sub_cat_id,
                                cat_id: cat_id,
                                value: value,
                                isChecked: isChecked
                            });
                        });

                        // Check if any field was left empty
                        if (isEmptyField) {
                            $.wnoty({
                                type: 'error',
                                message: "No field should be left empty.",
                                autohideDelay: 5000
                            });
                        }
                        else {
                            // Now you have an array (rowData) with the collected data for each row
                            console.log(rowData);

                            console.log(class_id);

                            $('#abba_display_class_fees_students').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
                            
                            $.ajax({
                                type: "POST",
                                url: "../../controller/scripts/owner/finance-onboarding/abba-add_items_to_charge_structure.php",
                                data: { campus_id: campus_id, abba_get_stored_instituion_id: abba_get_stored_instituion_id, abba_display_session: abba_display_session, abba_display_term: abba_display_term, rowData: rowData, user_id: user_id, user_type: user_type, class_id: class_id },
                                //cache: false,
                                success: function (outputdata) {
                    
                                    // alert(outputdata);
                    
                                    $.wnoty({
                                        type: 'success',
                                        message: "Charge structure has been set successfully",
                                        autohideDelay: 6000
                                    });

                                    $.ajax({
                                        type: "POST",
                                        url: "../../controller/scripts/owner/finance-onboarding/abba_get_classes_and_fees.php",
                                        data: { campus_id: campus_id, abba_get_stored_instituion_id: abba_get_stored_instituion_id, abba_display_session: abba_display_session, abba_display_term: abba_display_term, rowData: rowData, user_id: user_id, user_type: user_type, class_id: class_id },
                                        //cache: false,
                                        success: function (outputdata) {

                                            $('#abba_display_class_fees_students').html(outputdata);

                                            $('.abba_subcat_optional_checkbox:checked').each(function () {

                                                var student_input_id = $(this).data('input');
        
                                                var stud_class = $(this).data('studclass');
                                                
                                                var class_span = $(this).data('classspan');
                                                
                                                var opt_main = $(this).data('optmain');

                                                var student_input = $('#'+student_input_id).val();

                                                // alert(student_input);

                                                // $("#"+select_all).prop('checked', true);

                                                $("."+stud_class).prop("checked", false);

                                                if(student_input == '0' || student_input == '')
                                                {
                                                    $("."+class_span).fadeOut();
                                                    
                                                    $("."+opt_main).prop("checked", false);
                                                }
                                                else{


                                                    $("."+stud_class).prop("checked", false);

                                                    // Split the values into an array
                                                    var valuesArray = student_input.split(',');

                                                    if(valuesArray.length >= $("."+stud_class).length)
                                                    {
                                                        $("."+opt_main).prop("checked", true);
                                                    }
                                                    else
                                                    {

                                                        $("."+opt_main).prop("checked", false);
                                                    
                                                    }
                                                    
                                                    $("."+class_span).html('('+valuesArray.length+')');

                                                    $("."+class_span).fadeIn();
                                                    
                                                    // Loop through the values and check the corresponding checkboxes
                                                    $.each(valuesArray, function(index, value) {
                                                        // Find the checkbox with the matching value attribute
                                                        $("."+stud_class+"[value='" + value + "']").prop("checked", true);
                                                    }); 
                                                    
                                                }
                                            }); 
                                        }
                                    });
                    
                                }
                            });


                            $("#progressBar .active").next().addClass("active");
                            $(this).parents(".row").fadeOut("slow", function () {
                                $(this).next(".row").fadeIn("slow");
                            });

                        }

                    }
                });

                // back button
                $(".back").on({
                    click: function () {
                        $("#progressBar .active").last().removeClass("active");
                        $(this).parents(".row").fadeOut("slow", function () {
                            $(this).prev(".row").fadeIn("slow");
                        });
                    }
                });
                //finish button
                $(".abba-submit-button").on({
                    click: function () {

                        $(".abba-submit-button").parents(".row").fadeOut("slow", function () {
                            $(this).next(".row").fadeIn("slow");
                        });

                    }
                });

                //Active card on click function
                $(".abba_card").on({
                    click: function () {
                        $(this).toggleClass("active-card");
                        $(this).parent(".col").siblings().children(".abba_card").removeClass("active-card");
                    }
                });
            });

        }
    });
});




$('body').on('click', '.create_charge_abba', function(){
   
    var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");

    $('#abba_display_finance_campus').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

    // alert(abba_get_stored_instituion_id);

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/finance-onboarding/abba-get_campus_for_finance.php",
        data: { abba_instituion_id: abba_get_stored_instituion_id },
        //cache: false,
        success: function (output) {

            $('#abba_display_finance_campus').html(output);

            var campus_id = $('.active-card').data('id');

            // alert(campus_id);

            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/finance-onboarding/abba-check_finance_setup.php",
                data: { abba_instituion_id: abba_get_stored_instituion_id, campus_id: campus_id },
                //cache: false,
                success: function (data) {

                    // alert(data);

                    if (data == '1') {
                        
                    }
                    else{
                        $('#financeonboardingModal').modal('show');

                    }

                }
            });

            $(document).ready(function () {
                // hidden things
                
                $(".form-business").hide();
                // next button
                $(".next_1").on({
                    click: function () {
                        // select any card
                        var getValue = $(this).parents(".row").find(".abba_card").hasClass("active-card");

                        var campus_id = $('.active-card').data('id');

                        // alert($campus_id);

                        if (getValue) {

                            $('#abba_display_section').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

                            
                            $.ajax({
                                type: "POST",
                                url: "../../controller/scripts/owner/abba-get-term.php",
                                data: { abba_campus_id: campus_id },
                                //cache: false,
                                success: function (output) {
                                    // alert(output);
                                    $('#abba_display_term').html(output);

                                    var abba_display_session = $('#abba_display_session option:selected').val();

                                    var abba_display_term = $('#abba_display_term option:selected').val();

                                    $.ajax({
                                        type: "POST",
                                        url: "../../controller/scripts/owner/finance-onboarding/abba-get_campus_sections.php",
                                        data: { campus_id: campus_id, abba_display_session: abba_display_session, abba_display_term: abba_display_term, abba_instituion_id: abba_get_stored_instituion_id },
                                        //cache: false,
                                        success: function (outputdata) {
        
                                            $('#abba_display_section').html(outputdata);
                                            

                                            $(document).ready(function () {
                                                var coll = document.getElementsByClassName("collapsible");
                                                var i;

                                                for (i = 0; i < coll.length; i++) {
                                                    coll[i].addEventListener("click", function () {
                                                        this.classList.toggle("active");
                                                        var content = this.nextElementSibling;
                                                        if (content.style.maxHeight) {
                                                            content.style.maxHeight = null;
                                                        } else {
                                                            content.style.maxHeight = content.scrollHeight + "px";
                                                        }
                                                    });
                                                }
                                            });
                                        }

                                    });

                                }
                            });

                            $("#progressBar .active").next().addClass("active");
                            $(this).parents(".row").fadeOut("slow", function () {
                                $(this).next(".row").fadeIn("slow");
                            });

                        }
                        else {
                            $.wnoty({
                                type: 'warning',
                                message: "Hey, select a campus to proceed.",
                                autohideDelay: 5000
                            });
                        }
                    }
                });

                $(".next_2").on({
                    click: function () {

                        var campus_id = $('.active-card').data('id');

                        var abba_display_session = $('#abba_display_session option:selected').val();

                        var abba_display_term = $('#abba_display_term option:selected').val();

                        var click_from = '0';

                        var class_id = [];

                        $.each($(".abba_class_checkbox:checked"), function () {
                            class_id.push($(this).data('id'));
                        });

                        if ($('.abba_class_checkbox:checked').length > 0) {

                            $('#abba_display_categories').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

                            $.ajax({
                                type: "POST",
                                url: "../../controller/scripts/owner/finance-onboarding/abba-get_categories_and_sub.php",
                                data: { campus_id: campus_id, abba_display_session: abba_display_session, abba_display_term: abba_display_term, abba_instituion_id: abba_get_stored_instituion_id, class_id: class_id, click_from: click_from },
                                //cache: false,
                                success: function (outputdata) {

                                    $('#abba_display_categories').html(outputdata);

                                    $(document).ready(function () {
                                        var coll = document.getElementsByClassName("collapsible");
                                        var i;

                                        for (i = 0; i < coll.length; i++) {
                                            coll[i].addEventListener("click", function () {
                                                this.classList.toggle("active");
                                                var content = this.nextElementSibling;
                                                if (content.style.maxHeight) {
                                                    content.style.maxHeight = null;
                                                } else {
                                                    content.style.maxHeight = content.scrollHeight + "px";
                                                }
                                            });
                                        }
                                    });
                                }
                            });

                            $("#progressBar .active").next().addClass("active");
                            $(this).parents(".row").fadeOut("slow", function () {
                                $(this).next(".row").fadeIn("slow");
                            });

                        }
                        else if(abba_display_session == 'NULL' || abba_display_session == '' || abba_display_term == 'NULL' || abba_display_term == '')
                        {
                            $.wnoty({
                                type: 'warning',
                                message: "Hey, select a session and term to proceed.",
                                autohideDelay: 5000
                            });
                        }
                        else {
                            $.wnoty({
                                type: 'warning',
                                message: "Hey, select a class to proceed.",
                                autohideDelay: 5000
                            });
                        }
                    }
                });

                $(".next_3").on({
                    click: function () {

                        var campus_id = $('.active-card').data('id');

                        if ($('.abba_subcat_checkbox:checked').length > 0) {


                            $("#progressBar .active").next().addClass("active");
                            $(this).parents(".row").fadeOut("slow", function () {
                                $(this).next(".row").fadeIn("slow");
                            });

                        }
                        else {
                            $.wnoty({
                                type: 'warning',
                                message: "Hey, select an item to proceed.",
                                autohideDelay: 5000
                            });
                        }
                    }
                });

                $(".next_4").on({
                    click: function () {

                        var campus_id = $('.active-card').data('id');

                        var abba_display_session = $('#abba_display_session option:selected').val();

                        var abba_display_term = $('#abba_display_term option:selected').val();

                        var user_id = $('#user_id').val();

                        var user_type = $('#user_type').val();

                        var class_id = [];

                        $.each($(".abba_class_checkbox:checked"), function () {
                            class_id.push($(this).data('id'));
                        });

                        // Initialize an array to store the collected data
                        var rowData = [];

                        // Flag to check if any field is left empty
                        var isEmptyField = false;

                        // Loop through each row with the class "abba_items_amt"
                        $('.abba_items_amt').each(function () {
                            var row = $(this);

                            // Extract class_name from the h6 element within the row
                            var sub_cat_id = $(this).data('subcat');

                            var cat_id = $(this).data('cat');

                            // Extract the input element within the row
                            var input = row.find('input[type="number"]');

                            // Extract value from the input element within the row
                            var value = input.val();

                            // Extract checkbox state from the input element within the row
                            var isChecked_checker = row.find('input[type="checkbox"]').is(':checked');

                            if(isChecked_checker == false)
                            {
                                var isChecked = 0;
                            }
                            else{
                                var isChecked = 1;
                            }

                            // Check if the value is empty
                            if (value === '') {
                                isEmptyField = true;
                                // Change the border-color of the empty input field to red
                                input.css('border-color', 'red');
                                return false; // Exit the loop if any field is empty
                            } else {
                                // Reset the border-color of the input field
                                input.css('border-color', '');
                            }

                            // Push the collected data into the rowData array
                            rowData.push({
                                sub_cat_id: sub_cat_id,
                                cat_id: cat_id,
                                value: value,
                                isChecked: isChecked
                            });
                        });

                        // Check if any field was left empty
                        if (isEmptyField) {
                            $.wnoty({
                                type: 'error',
                                message: "No field should be left empty.",
                                autohideDelay: 5000
                            });
                        }
                        else {
                            // Now you have an array (rowData) with the collected data for each row
                            console.log(rowData);

                            console.log(class_id);

                            $('#abba_display_class_fees_students').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
                            
                            $.ajax({
                                type: "POST",
                                url: "../../controller/scripts/owner/finance-onboarding/abba-add_items_to_charge_structure.php",
                                data: { campus_id: campus_id, abba_get_stored_instituion_id: abba_get_stored_instituion_id, abba_display_session: abba_display_session, abba_display_term: abba_display_term, rowData: rowData, user_id: user_id, user_type: user_type, class_id: class_id },
                                //cache: false,
                                success: function (outputdata) {
                    
                                    // alert(outputdata);
                    
                                    $.wnoty({
                                        type: 'success',
                                        message: "Charge structure has been set successfully",
                                        autohideDelay: 6000
                                    });

                                    $.ajax({
                                        type: "POST",
                                        url: "../../controller/scripts/owner/finance-onboarding/abba_get_classes_and_fees.php",
                                        data: { campus_id: campus_id, abba_get_stored_instituion_id: abba_get_stored_instituion_id, abba_display_session: abba_display_session, abba_display_term: abba_display_term, rowData: rowData, user_id: user_id, user_type: user_type, class_id: class_id },
                                        //cache: false,
                                        success: function (outputdata) {

                                            $('#abba_display_class_fees_students').html(outputdata);

                                            $('.abba_subcat_optional_checkbox:checked').each(function () {

                                                var student_input_id = $(this).data('input');
        
                                                var stud_class = $(this).data('studclass');
                                                
                                                var class_span = $(this).data('classspan');
                                                
                                                var opt_main = $(this).data('optmain');

                                                var student_input = $('#'+student_input_id).val();

                                                // alert(student_input);

                                                // $("#"+select_all).prop('checked', true);

                                                $("."+stud_class).prop("checked", false);

                                                if(student_input == '0' || student_input == '')
                                                {
                                                    $("."+class_span).fadeOut();
                                                    
                                                    $("."+opt_main).prop("checked", false);
                                                }
                                                else{


                                                    $("."+stud_class).prop("checked", false);

                                                    // Split the values into an array
                                                    var valuesArray = student_input.split(',');

                                                    if(valuesArray.length >= $("."+stud_class).length)
                                                    {
                                                        $("."+opt_main).prop("checked", true);
                                                    }
                                                    else
                                                    {

                                                        $("."+opt_main).prop("checked", false);
                                                    
                                                    }
                                                    
                                                    $("."+class_span).html('('+valuesArray.length+')');

                                                    $("."+class_span).fadeIn();
                                                    
                                                    // Loop through the values and check the corresponding checkboxes
                                                    $.each(valuesArray, function(index, value) {
                                                        // Find the checkbox with the matching value attribute
                                                        $("."+stud_class+"[value='" + value + "']").prop("checked", true);
                                                    }); 
                                                    
                                                }
                                            }); 
                                        }
                                    });
                    
                                }
                            });


                            $("#progressBar .active").next().addClass("active");
                            $(this).parents(".row").fadeOut("slow", function () {
                                $(this).next(".row").fadeIn("slow");
                            });

                        }

                    }
                });

                // back button
                $(".back").on({
                    click: function () {
                        $("#progressBar .active").last().removeClass("active");
                        $(this).parents(".row").fadeOut("slow", function () {
                            $(this).prev(".row").fadeIn("slow");
                        });
                    }
                });
                //finish button
                $(".abba-submit-button").on({
                    click: function () {

                        $(".abba-submit-button").parents(".row").fadeOut("slow", function () {
                            $(this).next(".row").fadeIn("slow");
                        });

                    }
                });

                //Active card on click function
                $(".abba_card").on({
                    click: function () {
                        $(this).toggleClass("active-card");
                        $(this).parent(".col").siblings().children(".abba_card").removeClass("active-card");
                    }
                });
            });

        }
    });
 
});


// select all class checkbox
$("body").on("change", ".abba_select_all_class", function () {  //"select all" change 

    var checkStatus = $(this).prop('checked');

    var sub_checkbox_id = $(this).data('id');

    var classlistclass = $(this).data('id');

    var classlistspan = $(this).data('span');

    if (checkStatus == true) {
        $("." + classlistclass).prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
        var selTotal = $('.' + classlistclass + ':checked').length;
        $('#' + classlistspan).html('(' + selTotal + ')');
        $("#" + classlistspan).fadeIn("slow");

        $('.abba_display_classes_add').html('');

        $.each($(".abba_class_checkbox:checked"), function () {

            var class_name = $(this).val();

            var class_id = $(this).data('id');

            var classlistmine = $(this).data('mine');

            var maincheck = $(this).data('maincheck');

            var tags = `<div class="abba_tag" data-id="` + class_id + `" style="display: inline-flex;">
                <span class="abba_text">`+ class_name + `</span>
                &nbsp;&nbsp;&nbsp;<i class="fas fa-times fs-sm remove_selected_class" data-id="`+ classlistmine + `" data-maincheck="` + maincheck + `" data-class="` + class_id + `" style="cursor:pointer;"></i>
            </div>`;

            $('.abba_display_classes_add').append(tags);
        });

    }
    else if (checkStatus == false) {
        $("." + classlistclass).prop('checked', false); //change "select all" checked status to false
        var selTotal = $('.' + classlistclass + ':checked').length;
        $("#" + classlistspan).fadeOut("slow");

        $('.abba_display_classes_add').html('');

        $.each($(".abba_class_checkbox:checked"), function () {

            var class_name = $(this).val();

            var class_id = $(this).data('id');

            var classlistmine = $(this).data('mine');

            var maincheck = $(this).data('maincheck');

            var tags = `<div class="abba_tag" data-id="` + class_id + `" style="display: inline-flex;">
                <span class="abba_text">`+ class_name + `</span>
                &nbsp;&nbsp;&nbsp;<i class="fas fa-times fs-sm remove_selected_class" data-id="`+ classlistmine + `" data-maincheck="` + maincheck + `" data-class="` + class_id + `" style="cursor:pointer;"></i>
            </div>`;

            $('.abba_display_classes_add').append(tags);
        });
    }
});

// select single class checkbox
$('body').on('change', '.abba_class_checkbox', function () {

    var maincheck = $(this).data('maincheck');

    var classlistspan = $(this).data('span');

    var classlistunique = $(this).data('unique');

    var checkStatus = $(this).prop('checked');

    $('.abba_display_classes_add').html('');

    $.each($(".abba_class_checkbox:checked"), function () {

        var class_name = $(this).val();

        var class_id = $(this).data('id');

        var classlistmine = $(this).data('mine');

        var maincheck = $(this).data('maincheck');

        var tags = `<div class="abba_tag" data-id="` + class_id + `" style="display: inline-flex;">
            <span class="abba_text">`+ class_name + `</span>
            &nbsp;&nbsp;&nbsp;<i class="fas fa-times fs-sm remove_selected_class" data-id="`+ classlistmine + `" data-maincheck="` + maincheck + `" data-class="` + class_id + `" style="cursor:pointer;"></i>
        </div>`;

        $('.abba_display_classes_add').append(tags);
    });

    if ($('.' + classlistunique + ':checked').length == $('.' + classlistunique).length) {
        $("#" + maincheck).prop('checked', true);
        var selTotal = $('.' + classlistunique + ':checked').length;

        if (selTotal > 0) {
            $('#' + classlistspan).html('(' + selTotal + ')');
            $("#" + classlistspan).fadeIn("slow");
        }
        else {
            $("#" + classlistspan).fadeOut("slow");
        }

    }
    else if ($('.' + classlistunique + ':checked').length != $('.' + classlistunique).length) {
        $("#" + maincheck).prop('checked', false);
        var selTotal = $('.' + classlistunique + ':checked').length;

        if (selTotal > 0) {
            $('#' + classlistspan).html('(' + selTotal + ')');
            $("#" + classlistspan).fadeIn("slow");
        }
        else {
            $("#" + classlistspan).fadeOut("slow");
        }
    }
});

$('body').on('click', '.remove_selected_class', function () {

    var classlistmine = $(this).data('id');

    var maincheck = $(this).data('maincheck');

    var class_id = $(this).data('class');

    var class_used = 'abba_tag';

    $('.abba_tag[data-id="' + class_id + '"].' + class_used).remove();

    $("." + classlistmine).prop('checked', false);

    $("#" + maincheck).prop('checked', false);

    if ($('.abba_tag').length > 0) {

    }
    else {
        $("#progressBar .active").last().removeClass("active");

        $('.abba_ext_hider').hide('slow');

        $('.new_back').parents(".row").fadeOut("slow", function () {
            $(this).prev(".row").fadeIn("slow");
        });

        $.wnoty({
            type: 'warning',
            message: "Hey, select a class to proceed.",
            autohideDelay: 5000
        });
    }
});

// select all subcat checkbox
$("body").on("change", ".abba_select_all_subcat", function () {  //"select all" change 

    var checkStatus = $(this).prop('checked');

    var sub_checkbox_id = $(this).data('id');

    var classlistclass = $(this).data('id');

    var classlistspan = $(this).data('span');

    if (checkStatus == true) {
        $("." + classlistclass).prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
        var selTotal = $('.' + classlistclass + ':checked').length;
        $('#' + classlistspan).html('(' + selTotal + ')');
        $("#" + classlistspan).fadeIn("slow");

        let uniqueNumberIncrement = 0;

        $('#abba_display_subcat_amount').html('');

        $.each($(".abba_subcat_checkbox:checked"), function () {

            uniqueNumberIncrement++;

            var sub_catergory_name = $(this).val();

            var sub_category_id = $(this).data('subcat');

            var category_id = $(this).data('id');

            var subcatlistmine = $(this).data('mine');

            var maincheck = $(this).data('maincheck');

            var tags = `<div class="row mt-3 g-3 align-items-center abba_items_amt" data-cat="` + category_id + `" data-subcat="` + sub_category_id + `">
                    <div class="col-lg-3 col-md-6 mt-1">
                        <div class="form-group">
                            <h6>`+ sub_catergory_name + `</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mt-1">
                        <div class="form-group">
                            <input type="number" class="form-control form-control-sm" placeholder="Enter Amount"> 
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-1">
                        <div class="form-group">
                            <label class="abba-toggler-wrapper abba-style-23">
                                <input type="checkbox" checked>
                                <div class="abba-toggler-slider">
                                    <div class="abba-toggler-knob"></div>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-6 removeappendform" data-line="removeline_`+ uniqueNumberIncrement + `" data-id="` + subcatlistmine + `" data-maincheck="` + maincheck + `">
                        <div class="form-group">
                            <i class="fa fa-times fs-4 text-danger" style="cursor:pointer;"></i>
                        </div>
                    </div>
                </div><hr id="removeline_`+ uniqueNumberIncrement + `">`;

            $('#abba_display_subcat_amount').append(tags);
        });

    }
    else if (checkStatus == false) {
        $("." + classlistclass).prop('checked', false); //change "select all" checked status to false
        var selTotal = $('.' + classlistclass + ':checked').length;
        $("#" + classlistspan).fadeOut("slow");

        
        let uniqueNumberIncrement = 0;

        $('#abba_display_subcat_amount').html('');

        $.each($(".abba_subcat_checkbox:checked"), function () {

            uniqueNumberIncrement++;

            var sub_catergory_name = $(this).val();

            var sub_category_id = $(this).data('subcat');

            var category_id = $(this).data('id');

            var subcatlistmine = $(this).data('mine');

            var maincheck = $(this).data('maincheck');

            var tags = `<div class="row mt-3 g-3 align-items-center abba_items_amt" data-cat="` + category_id + `" data-subcat="` + sub_category_id + `">
                    <div class="col-lg-3 col-md-6 mt-1">
                        <div class="form-group">
                            <h6>`+ sub_catergory_name + `</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mt-1">
                        <div class="form-group">
                            <input type="number" class="form-control form-control-sm" placeholder="Enter Amount"> 
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-1">
                        <div class="form-group">
                            <label class="abba-toggler-wrapper abba-style-23">
                                <input type="checkbox" checked>
                                <div class="abba-toggler-slider">
                                    <div class="abba-toggler-knob"></div>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-6 removeappendform" data-line="removeline_`+ uniqueNumberIncrement + `" data-id="` + subcatlistmine + `" data-maincheck="` + maincheck + `">
                        <div class="form-group">
                            <i class="fa fa-times fs-4 text-danger" style="cursor:pointer;"></i>
                        </div>
                    </div>
                </div><hr id="removeline_`+ uniqueNumberIncrement + `">`;

            $('#abba_display_subcat_amount').append(tags);
        });


    }
});

// select single subcat checkbox
$('body').on('change', '.abba_subcat_checkbox', function () {

    var maincheck = $(this).data('maincheck');

    var classlistspan = $(this).data('span');

    var classlistunique = $(this).data('unique');

    var checkStatus = $(this).prop('checked');

    if ($('.' + classlistunique + ':checked').length == $('.' + classlistunique).length) {
        $("#" + maincheck).prop('checked', true);
        var selTotal = $('.' + classlistunique + ':checked').length;

        if (selTotal > 0) 
        {
            $('#' + classlistspan).html('(' + selTotal + ')');
            $("#" + classlistspan).fadeIn("slow");
        }
        else
        {
            $("#" + classlistspan).fadeOut("slow");
        }

    }
    else if ($('.' + classlistunique + ':checked').length != $('.' + classlistunique).length) {
        $("#" + maincheck).prop('checked', false);
        var selTotal = $('.' + classlistunique + ':checked').length;

        if (selTotal > 0) {
            $('#' + classlistspan).html('(' + selTotal + ')');
            $("#" + classlistspan).fadeIn("slow");
        }
        else {
            $("#" + classlistspan).fadeOut("slow");
        }
    }

    $('#abba_display_subcat_amount').html('');

    let uniqueNumberIncrement = 0;

    $.each($(".abba_subcat_checkbox:checked"), function () {

        uniqueNumberIncrement++;

        var sub_catergory_name = $(this).val();

        var sub_category_id = $(this).data('subcat');

        var category_id = $(this).data('id');

        var subcatlistmine = $(this).data('mine');

        var maincheck = $(this).data('maincheck');

        var tags = `<div class="row mt-3 g-3 align-items-center abba_items_amt" data-cat="` + category_id + `" data-subcat="` + sub_category_id + `">
                <div class="col-lg-3 col-md-6 mt-1">
                    <div class="form-group">
                        <h6>`+ sub_catergory_name + `</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-1">
                    <div class="form-group">
                        <input type="number" class="form-control form-control-sm" placeholder="Enter Amount"> 
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-1">
                    <div class="form-group">
                        <label class="abba-toggler-wrapper abba-style-23">
                            <input type="checkbox" checked>
                            <div class="abba-toggler-slider">
                                <div class="abba-toggler-knob"></div>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="col-lg-1 col-md-6 removeappendform" data-line="removeline_`+ uniqueNumberIncrement + `" data-id="` + subcatlistmine + `" data-maincheck="` + maincheck + `">
                    <div class="form-group">
                        <i class="fa fa-times fs-4 text-danger" style="cursor:pointer;"></i>
                    </div>
                </div>
            </div><hr id="removeline_`+ uniqueNumberIncrement + `">`;

        $('#abba_display_subcat_amount').append(tags);
    });
});

$(document).ready(function () {
    $('body').on('click', '.abba_add_item_btn', function () {
        $('#abba_add_item_Modal').modal('show');
        $('#financeonboardingModal2').css('z-index', 1040); // Increase z-index of first modal
        $('#financeaddModal').css('z-index', 1040); // Increase z-index of first modal

        var div = $(this).data('div');

        var category_id = $(this).data('id');

        $('#hold_append_div_class').val(div);

        $('#hold_append_div_category_id').val(category_id);

    });

    // Reset z-index of first modal when second modal is closed
    $('#abba_add_item_Modal').on('hidden.bs.modal', function () {
        $('#financeonboardingModal2').css('z-index', 1050); // Reset z-index of first modal
        $('#financeaddModal').css('z-index', 1050); // Increase z-index of first modal
    });

});

$('body').on('click', '#abba_proceed_to_add_item', function () {

    var category_id = $('#hold_append_div_category_id').val();

    var items = $('.abba_hold_items_to_add').val();

    var user_id = $('#user_id').val();

    var user_type = $('#user_type').val();

    var campus_id = $('.active-card').data('id');

    var abba_instituion_id = localStorage.getItem("abba-stored-institution-id");

    // alert(items);

    if (items != '' && items != 0) {

        $('#abba_proceed_to_add_item').html('<i class="fas fa-spinner fa-spin" style="color:#007ffb;"></i></div>');

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/finance-onboarding/abba-send-email-to-add-category.php",
            data: { campus_id: campus_id, items: items, abba_instituion_id: abba_instituion_id, category_id: category_id, user_id: user_id, user_type: user_type },
            //cache: false,
            success: function (outputdata) {

                // alert(outputdata);

                if (outputdata == 1) {

                    $('#abba_add_item_Modal').modal('hide');

                    $('.abba_hold_items_to_add').val('');

                    $.wnoty({
                        type: 'success',
                        message: "Items has been sent successfully, you'll be updated soon",
                        autohideDelay: 6000
                    });

                    $('#abba_proceed_to_add_item').html('<i class="fa fa-plus"> Submit</i>');

                }
                else {

                    $('#abba_add_item_Modal').modal('hide');

                    $('.abba_hold_items_to_add').val('');

                    $.wnoty({
                        type: 'error',
                        message: "Items has not been sent.",
                        autohideDelay: 6000
                    });

                    $('#abba_proceed_to_add_item').html('<i class="fa fa-plus"> Submit</i>');
                }

            }
        });

    }
    else {
        $.wnoty({
            type: 'warning',
            message: "Input an item to proceed.",
            autohideDelay: 5000
        });
    }

});

$("body").on("click", ".removeappendform", function () {

    $(this).closest(".row").remove();

    var line_id = $(this).data('line');

    $('#' + line_id).remove();

    var classlistmine = $(this).data('id');

    var maincheck = $(this).data('maincheck');

    // alert(maincheck);

    $("." + classlistmine).prop('checked', false);

    $("#" + maincheck).prop('checked', false);

    if ($('.abba_items_amt').length > 0) {

    }
    else 
    {
        $("#progressBar .active").last().removeClass("active");
        $('.new_back_1').parents(".row").fadeOut("slow", function () {
            $(this).prev(".row").fadeIn("slow");
        });

        $.wnoty({
            type: 'warning',
            message: "Hey, select an item to proceed.",
            autohideDelay: 5000
        });
    }
});

// select single optional fee checkbox
$(document).ready(function () {
    $('body').on('change', '.abba_subcat_optional_checkbox', function () {

        var student_input_id = $(this).data('input');
        
        var stud_class = $(this).data('studclass');
        
        var class_span = $(this).data('classspan');
        
        var opt_main = $(this).data('optmain');

        var student_input = $('#'+student_input_id).val();

        // alert(student_input);

        // $("#"+select_all).prop('checked', true);

        $("."+stud_class).prop("checked", false);

        if(student_input == '0' || student_input == '')
        {
            $("."+class_span).fadeOut();
            
            $("."+opt_main).prop("checked", false);
        }
        else{


            $("."+stud_class).prop("checked", false);

            // Split the values into an array
            var valuesArray = student_input.split(',');

            if(valuesArray.length >= $("."+stud_class).length)
            {
                $("."+opt_main).prop("checked", true);
            }
            else
            {

                $("."+opt_main).prop("checked", false);
            
            }
            
            $("."+class_span).html('('+valuesArray.length+')');

            $("."+class_span).fadeIn();
            
            // Loop through the values and check the corresponding checkboxes
            $.each(valuesArray, function(index, value) {
                // Find the checkbox with the matching value attribute
                $("."+stud_class+"[value='" + value + "']").prop("checked", true);
            }); 
            
        }

    });
})

// select all optional fee checkbox
$("body").on("change", ".abba_select_all_optional_student", function () {  //"select all" change 

    var checkStatus = $(this).prop('checked');

    var subcat = $(this).data('subcattop');
    
    var all_sub = $(this).data('sub');

    var my_span = $(this).data('span');

    var mysub = $(this).data('mysub');
    
    if (checkStatus == true)
    {
        $("."+all_sub).prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
        var selTotal = $('.'+all_sub+':checked').length;
        $('.'+my_span).html('(' + selTotal + ')');
        $("."+my_span).fadeIn("slow");


        var selectedValues = $("."+all_sub+":checked").map(function() {
            return this.value;
        }).get().join(',');

        var my_sub_input = $('.'+mysub+':checked').data('input');

        $('#'+my_sub_input).val(selectedValues);

    }
    else if (checkStatus == false)
    {
        $("."+all_sub).prop('checked', false); //change "select all" checked status to false
        var selTotal = $('.'+all_sub+':checked').length;
        $("."+my_span).fadeOut("slow");

        var my_sub_input = $('.'+mysub+':checked').data('input');

        $('#'+my_sub_input).val('0');

    }
});

// select single optional fee checkbox
$('body').on('change', '.abba_student_optional_checkbox', function () {

    var main_select = $(this).data('main');

    var main_span = $(this).data('span');

    var select_all = $(this).data('all');

    var mysub = $(this).data('mysub');
    
    var selectedValues = $("."+main_select+":checked").map(function() {
        return this.value;
    }).get().join(',');

    var my_sub_input = $('.'+mysub+':checked').data('input');

    $('#'+my_sub_input).val(selectedValues);

    // alert(main_select+' '+main_span+' '+select_all+' '+mysub);
    
    if ($('.'+main_select+':checked').length == $('.'+main_select).length) {
        $("#"+select_all).prop('checked', true);
        var selTotal = $('.'+main_select+':checked').length;

        if (selTotal > 0) {
            $('.'+main_span).html('(' + selTotal + ')');
            $("."+main_span).fadeIn("slow");
        }
        else {
            $("."+main_span).fadeOut("slow");
        }

    }
    else if ($('.'+main_select+':checked').length != $('.'+main_select).length) {
        $("#"+select_all).prop('checked', false);
        var selTotal = $('.'+main_select+':checked').length;

        if (selTotal > 0) {
            $('.'+main_span).html('(' + selTotal + ')');
            $("."+main_span).fadeIn("slow");
        }
        else {
            $("."+main_span).fadeOut("slow");
        }
    }

});

$('body').on('click', '.abba_save_optional_btn', function(){

    var abba_instituion_id = localStorage.getItem("abba-stored-institution-id");

    var campus_id = $('.active-card').data('id');

    var abba_display_session = $('#abba_display_session option:selected').val();

    var abba_display_term = $('#abba_display_term option:selected').val();

    var user_id = $('#user_id').val();

    var user_type = $('#user_type').val();

    var class_id = $(this).data('class');

    var student_array = [];

    var subcat_array = [];

    var cat_array = [];

    $.each($(".abba_insert_all_input"+class_id), function () {

        var stud_id = $(this).val();

        var subcat = $(this).data('subcat');

        var cat = $(this).data('cat');

        if(stud_id == '0' || stud_id == '')
        {

        }
        else{

            var valuesToCheck = $(this).val();

            // Split the values into an array
            var valuesArray = valuesToCheck.split(',');

            // Loop through the values and check the corresponding checkboxes
            $.each(valuesArray, function(index, value) {
                student_array.push(value);
                subcat_array.push(subcat);
                cat_array.push(cat);
            });
        }

       
    });

    $(this).html('<i class="fas fa-spinner fa-spin"></i>');

    // alert(student_array);

    // alert(subcat_array);

    // alert(cat_array);

    if(student_array.length < 1 || subcat_array.length < 1)
    {
        $.wnoty({
            type: 'error',
            message: "Please select an item and a student to save.",
            autohideDelay: 5000
        });

        $('.abba_save_optional_btn').html('<i class="fas fa-save fs-6"> Save</i>');
    }
    else{

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/finance-onboarding/abba_inser_student_optional_fee.php",
            data: { abba_instituion_id: abba_instituion_id, campus_id: campus_id, abba_display_session: abba_display_session, abba_display_term: abba_display_term, user_id: user_id, user_type: user_type, student_array: student_array, subcat_array: subcat_array, cat_array: cat_array, class_id: class_id },
            //cache: false,
            success: function (output) {

                $('.abba_save_optional_btn').html('<i class="fas fa-save fs-6"> Save</i>');

                $.wnoty({
                    type: 'success',
                    message: "Saved Successfully.",
                    autohideDelay: 5000
                });
            }
        });
    
    }

});






// charge setting

// change of campus get term alias and section
$('body').on('change', '#abba_display_fee_campus', function () {

    var abba_campus_id = $('#abba_display_fee_campus option:selected').val();

    if (abba_campus_id == 'NULL') {
        $('#abba_display_fee_term').html('<option value="NULL">Select Campus First</option>');

        $('#abba_display_fee_section').html('<option value="NULL">Select Campus First</option>');

    }
    else {
        // alert(abba_campus_id);

        $('#abba_display_fee_term').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');

        $('#abba_display_fee_section').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');

        var dataString = 'abba_campus_id=' + abba_campus_id;


        // get term alias
        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba-get-term.php",
            data: dataString,
            //cache: false,
            success: function (output) {
                // alert(output);
                $('#abba_display_fee_term').html(output);

                // get section
                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/abba-get-section.php",
                    data: dataString,
                    //cache: false,
                    success: function (output) {
                        // alert(output);
                        $('#abba_display_fee_section').html(output);

                    }
                });
            }
        });

    }

});


$("body").on('change', '#abba_display_session, #abba_display_term', function(){

    var campus_id = $('.active-card').data('id');

    var abba_display_session = $('#abba_display_session option:selected').val();

    var abba_display_term = $('#abba_display_term option:selected').val();

    var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");

    // alert($campus_id);

    if(abba_display_session == 'NULL' || abba_display_session == '' || abba_display_term == 'NULL' || abba_display_term == '')
    {
        $.wnoty({
            type: 'warning',
            message: "Hey, select a session and term to proceed.",
            autohideDelay: 5000
        });

        $('#abba_display_section').html('<div align="center"> <img src="../../assets/images/adminImg/filter.png" style="width:15%;opacity:0.7;" /> <p class="pt-2 fs-6 text-secondary">Please select session and term to proceed.</p></div>');
    }
    else
    {
        $('#abba_display_section').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/finance-onboarding/abba-get_campus_sections.php",
            data: { campus_id: campus_id, abba_display_session: abba_display_session, abba_display_term: abba_display_term, abba_instituion_id: abba_get_stored_instituion_id },
            //cache: false,
            success: function (outputdata) {

                $('#abba_display_section').html(outputdata);
                
                $(document).ready(function () {
                    var coll = document.getElementsByClassName("collapsible");
                    var i;

                    for (i = 0; i < coll.length; i++) {
                        coll[i].addEventListener("click", function () {
                            this.classList.toggle("active");
                            var content = this.nextElementSibling;
                            if (content.style.maxHeight) {
                                content.style.maxHeight = null;
                            } else {
                                content.style.maxHeight = content.scrollHeight + "px";
                            }
                        });
                    }
                });
            }

        });
    }

});


$("body").on('click', '.abba_load_class_fee', function(){

    var campus_id = $('#abba_display_fee_campus option:selected').val();

    var abba_display_session = $('#abba_display_fee_session option:selected').val();

    var abba_display_term = $('#abba_display_fee_term option:selected').val();
    
    var abba_display_term_name = $('#abba_display_fee_term option:selected').text();

    var abba_display_section = $('#abba_display_fee_section option:selected').val();

    var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");

    $('#abba_display_classes_set').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

    $('.abba_load_class_fee').html('<i class="fas fa-spinner fa-spin"></i>');

    var dataString = 'campus_id=' + campus_id + '&abba_display_session=' + abba_display_session + '&abba_display_term=' + abba_display_term + '&abba_display_section=' + abba_display_section + '&abba_instituion_id=' + abba_get_stored_instituion_id + '&abba_display_term_name=' + abba_display_term_name;

    // alert(dataString);

    if(campus_id == '' || campus_id == 'NULL' || abba_display_term == '' || abba_display_term == 'NULL' || abba_display_session == '' || abba_display_session == 'NULL')
    {

        $('#abba_display_classes_set').html('<div align="center"> <img src="../../assets/images/adminImg/filter.png" style="width:15%;opacity:0.7;"/> <p class="pt-2 fs-6 text-secondary">Please select campus, session and term to proceed.</p></div>');

        $('.abba_load_class_fee').html('Load');

    }
    else{

        // get term alias
        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/finance-onboarding/abba_get_class_fees.php",
            data: dataString,
            //cache: false,
            success: function (output) {
                // alert(output);
                $('#abba_display_classes_set').html(output);

                $('.abba_load_class_fee').html('Load');

            }
        });
    }

});


$('body').on('click', '.abba_add_fee', function(){
    // alert('sunny');
    $(".abba_form-business").hide();
    
    $(".abba_form-business_first").show();

    var campus_id = $(this).data('campus');

    var abba_display_session = $(this).data('session');

    var abba_display_term = $(this).data('term');

    var abba_instituion_id = $(this).data('inst');
    
    var class_id_string = $(this).data('class');

    var class_id = [class_id_string];

    var click_from = '1';
    
    localStorage.setItem("abba_add_fee_camp", campus_id);
    
    localStorage.setItem("abba_add_fee_session", abba_display_session);
    
    localStorage.setItem("abba_add_fee_term", abba_display_term);
    
    localStorage.setItem("abba_add_fee_inst", abba_instituion_id);
    
    localStorage.setItem("abba_add_fee_class", class_id);
    
    localStorage.setItem("abba_add_fee_click_from", click_from);

    $('#abba_display_categories_add_single').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/finance-onboarding/abba-get_categories_and_sub.php",
        data: { campus_id: campus_id, abba_display_session: abba_display_session, abba_display_term: abba_display_term, abba_instituion_id: abba_instituion_id, class_id: class_id, click_from: click_from },
        //cache: false,
        success: function (outputdata) {

            $('#abba_display_categories_add_single').html(outputdata);

            $(document).ready(function () {
                var coll = document.getElementsByClassName("collapsible");
                var i;

                for (i = 0; i < coll.length; i++) {
                    coll[i].addEventListener("click", function () {
                        this.classList.toggle("active");
                        var content = this.nextElementSibling;
                        if (content.style.maxHeight) {
                            content.style.maxHeight = null;
                        } else {
                            content.style.maxHeight = content.scrollHeight + "px";
                        }
                    });
                }
            });

            // hidden things
            $(".abba_form-business").hide();

        }
    });
});



$(".next_3_abba").on({
    click: function () {
        
        var campus_id = localStorage.getItem("abba_add_fee_camp");
        
        var abba_display_session = localStorage.getItem("abba_add_fee_session");
        
        var abba_display_term = localStorage.getItem("abba_add_fee_term");
        
        var abba_instituion_id = localStorage.getItem("abba_add_fee_inst");
        
        var class_id = [localStorage.getItem("abba_add_fee_class")];
        
        var click_from = localStorage.getItem("abba_add_fee_click_from");

        var cat_id = [];

        var sub_cat_id = [];

        $.each($(".abba_subcat_checkbox_single_add:checked"), function () {
            cat_id.push($(this).data('id'));
            sub_cat_id.push($(this).data('subcat'));
        });

        // alert(sub_cat_id);

        if ($('.abba_subcat_checkbox_single_add:checked').length > 0) {
            
            $('#abba_display_subcat_amount_add_single').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/finance-onboarding/abba-get_sub_assigned_list.php",
                data: { campus_id: campus_id, abba_display_session: abba_display_session, abba_display_term: abba_display_term, abba_instituion_id: abba_instituion_id, class_id: class_id, sub_cat_id: sub_cat_id, cat_id: cat_id },
                //cache: false,
                success: function (outputdata) {
                    $('#abba_display_subcat_amount_add_single').html(outputdata);
                    
                    // alert(outputdata)
                }
            });

            $("#progressBar .active").next().addClass("active");
            $(this).parents(".row").fadeOut("slow", function () {
                $(this).next(".row").fadeIn("slow");
            });

        }
        else {
            $.wnoty({
                type: 'warning',
                message: "Hey, select an item to proceed.",
                autohideDelay: 5000
            });
        }
    }
});

$(".next_4_abba").on({
    click: function () {

        var campus_id = localStorage.getItem("abba_add_fee_camp");
        
        var abba_display_session = localStorage.getItem("abba_add_fee_session");
        
        var abba_display_term = localStorage.getItem("abba_add_fee_term");
        
        var abba_instituion_id = localStorage.getItem("abba_add_fee_inst");
        
        var class_id = [localStorage.getItem("abba_add_fee_class")];
        
        var click_from = localStorage.getItem("abba_add_fee_click_from");

        // alert('abba');
        var user_id = $('#user_id').val();

        var user_type = $('#user_type').val();

        // Initialize an array to store the collected data
        var rowData = [];
        
        // Flag to check if any field is left empty
        var isEmptyField = false;

        // Loop through each row with the class "abba_items_amt"
        $(".abba_items_amt_add_single_new").each(function () {
            
            var row = $(this);
            
            var sub_cat_id = $(this).data('subcat');
            
            // alert(sub_cat_id);

            var cat_id = $(this).data('cat');

            // alert(cat_id);

            // Extract the input element within the row
            var input = row.find('input[type="number"]');

            // Extract value from the input element within the row
            var value = input.val();

            // Extract checkbox state from the input element within the row
            var isChecked_checker = row.find('input[type="checkbox"]').is(':checked');

            if(isChecked_checker == false)
            {
                var isChecked = 0;
            }
            else{
                var isChecked = 1;
            }

            // Check if the value is empty
            if (value === '') {
                isEmptyField = true;
                // Change the border-color of the empty input field to red
                input.css('border-color', 'red');
                return false; // Exit the loop if any field is empty
            } else {
                // Reset the border-color of the input field
                input.css('border-color', '');
            }

            // Push the collected data into the rowData array
            rowData.push({
                sub_cat_id: sub_cat_id,
                cat_id: cat_id,
                value: value,
                isChecked: isChecked
            });
        });
        
        // console.log(rowData);


        // Check if any field was left empty
        if (isEmptyField) {
            $.wnoty({
                type: 'error',
                message: "No field should be left empty.",
                autohideDelay: 5000
            });
        }
        else {
            // Now you have an array (rowData) with the collected data for each row
            console.log(rowData);

            console.log(class_id);

            $('#abba_display_class_fees_students_add_single').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
            

            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/finance-onboarding/abba-add_items_to_charge_structure.php",
                data: { campus_id: campus_id, abba_get_stored_instituion_id: abba_instituion_id, abba_display_session: abba_display_session, abba_display_term: abba_display_term, rowData: rowData, user_id: user_id, user_type: user_type, class_id: class_id },
                //cache: false,
                success: function (outputdata) {
    
                    // alert(outputdata);
    
                    $.wnoty({
                        type: 'success',
                        message: "Charge structure has been set successfully",
                        autohideDelay: 6000
                    });

                    $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/finance-onboarding/abba_get_classes_and_fees.php",
                        data: { campus_id: campus_id, abba_get_stored_instituion_id: abba_instituion_id, abba_display_session: abba_display_session, abba_display_term: abba_display_term, rowData: rowData, user_id: user_id, user_type: user_type, class_id: class_id },
                        //cache: false,
                        success: function (outputdata) {

                            $('#abba_display_class_fees_students_add_single').html(outputdata);

                            $('.abba_subcat_optional_checkbox:checked').each(function () {

                                var student_input_id = $(this).data('input');

                                var stud_class = $(this).data('studclass');
                                
                                var class_span = $(this).data('classspan');
                                
                                var opt_main = $(this).data('optmain');

                                var student_input = $('#'+student_input_id).val();

                                // alert(student_input);

                                // $("#"+select_all).prop('checked', true);

                                $("."+stud_class).prop("checked", false);

                                if(student_input == '0' || student_input == '')
                                {
                                    $("."+class_span).fadeOut();
                                    
                                    $("."+opt_main).prop("checked", false);
                                }
                                else{


                                    $("."+stud_class).prop("checked", false);

                                    // Split the values into an array
                                    var valuesArray = student_input.split(',');

                                    if(valuesArray.length >= $("."+stud_class).length)
                                    {
                                        $("."+opt_main).prop("checked", true);
                                    }
                                    else
                                    {

                                        $("."+opt_main).prop("checked", false);
                                    
                                    }
                                    
                                    $("."+class_span).html('('+valuesArray.length+')');

                                    $("."+class_span).fadeIn();
                                    
                                    // Loop through the values and check the corresponding checkboxes
                                    $.each(valuesArray, function(index, value) {
                                        // Find the checkbox with the matching value attribute
                                        $("."+stud_class+"[value='" + value + "']").prop("checked", true);
                                    }); 
                                    
                                }
                            }); 

                        }
                    });
    
                }
            });


            $("#progressBar .active").next().addClass("active");
            $(this).parents(".row").fadeOut("slow", function () {
                $(this).next(".row").fadeIn("slow");
            });

        }

    }
});

// back button
$(".back_abba").on({
    click: function () {
        $("#progressBar .active").last().removeClass("active");
        $(this).parents(".row").fadeOut("slow", function () {
            $(this).prev(".row").fadeIn("slow");
        });
    }
});
//finish button
$(".abba-submit-button_abba").on({
    click: function () {

        $(".abba-submit-button_abba").parents(".row").fadeOut("slow", function () {
            $(this).next(".row").fadeIn("slow");
        });

    }
});

$(document).ready(function () {
    $('#financeonboardingModal2, #financeaddModal').on('hidden.bs.modal', function () {
        // alert('abba');

        $("#abba_display_section").html('');
        $("#abba_display_categories").html('');
        $("#abba_display_class_fees_students").html('');

        $("#abba_display_categories_add_single").html('');
        $("#abba_display_subcat_amount_add_single").html('');
        $("#abba_display_class_fees_students_add_single").html('');

        // hidden things
        $(".abba_form-business").hide();
        $(".abba_form-business_first").show();

        $(".form-business").hide();
        $(".form-business_first").show();
    });
});



$(document).ready(function () {
    // Function to filter student cards based on the search input
    function filterStudentCards(searchTerm) {

        // alert(searchTerm);

        $('.card_search_get').each(function () {
            const className = $(this).find('.class_name').text().toLowerCase();

            // Check if the student's name contains the search term
            if (className.includes(searchTerm)) {
                $(this).show(); // Show the card
            }
            else {
                $(this).hide(); // Hide the card
            }
        });
    }

    // Add an event listener to the search input
    $('.abba_class_search').on('input paste', function () {
        const searchTerm = $(this).val().toLowerCase();

        // alert(searchTerm);
        filterStudentCards(searchTerm);
    });

});


$('body').on('click', '.view_fee_structure', function(){
    
    var campus_id = $(this).data('campus');

    var abba_display_session = $(this).data('session');

    var abba_display_term = $(this).data('term');

    var abba_display_term_name = $(this).data('termname');

    var abba_instituion_id = $(this).data('inst');
    
    var class_id = $(this).data('class');
    
    var btn = $(this).data('btn');

    // alert(btn);

    $('.abba_display_fee_structure').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/finance-onboarding/abba_get_print_fee_structure.php",
        data: { campus_id: campus_id, abba_display_session: abba_display_session, abba_display_term: abba_display_term, abba_instituion_id: abba_instituion_id, class_id: class_id, abba_display_term_name: abba_display_term_name },
        //cache: false,
        success: function (outputdata) 
        {
            $('.abba_display_fee_structure').html(outputdata);

            var classdatadownload = $('#classdatadownload').val();

            if(btn == '0')
            {
                const element = document.getElementById("abba_fee_structure");

                // Set the filename in the output option
                const options = {
                filename: classdatadownload+".pdf",
                };

                // Generate the PDF with html2pdf and save it with the specified filename
                html2pdf().from(element).set(options).save();

            }
            else{
                
            }
        }
    });
});

$('body').on('click', '#print_fee_structure', function(){

    var printStyle = document.querySelector("style");
      
      var printBox = document.querySelector("#abba_fee_structure");
      var printWidndow = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
      printWidndow.document.write("<style>"+printStyle.innerHTML+"</style>"+printBox.innerHTML);
      printWidndow.document.close();
      printWidndow.focus();
      printWidndow.print();
      printWidndow.close();
});