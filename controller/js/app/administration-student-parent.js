$(document).ready(function () {
    // When the copy button is clicked
    $('#copy-button').click(function () {
        // Select the text input field
        var textToCopy = $('#text-to-copy');

        // Copy the text to the clipboard
        textToCopy.select();
        document.execCommand('copy');

        // Deselect the text input field (optional)
        textToCopy.blur();

        // Provide feedback to the user
        $.wnoty({
            type: 'success',
            message: "Copied.",
            autohideDelay: 5000
        });
    });
    
    abba_get_campus();
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

    $('#abba_display_campus').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');
            
    $('#abba_display_student_campus').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');

    $('#abba_display_parent_campus').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');

    $('#abba_display_campus_for_create_student').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');

    $('#abba_display_reg_cnt_campus').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');
    
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
            $('#abba_display_campus').html(output);
            
            $('#abba_display_student_campus').html(output);

            $('#abba_display_parent_campus').html(output);

            $('#abba_display_campus_for_create_student').html(output);

            $('#abba_display_reg_cnt_campus').html(output);
            
            abba_get_students();

            abba_get_parent();

            abba_display_top_summary();
            
            // abba_get_class_students();
        }
    });

    // get campus parent list
    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba_get_campus_parent_list.php",
        data: dataString,
        //cache: false,
        success: function (output) {
            // alert(output);
            $('.abba_get_student_parent').html(output);
            
            var select_box_element = document.querySelector('#select_box');

            dselect(select_box_element, {
                search: true
            });

        }
    });
}

$(document).ready(function () {

    var abba_get_current_tab = localStorage.getItem("abba_store_current_tab");

    if (abba_get_current_tab == null) {
        localStorage.setItem("abba_store_current_tab", 'staff');

        abba_display_top_summary();
    }
    else {
        abba_display_top_summary();
    }
});

// remain in current main tab after reload
$(function () {

    $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) 
    {
        localStorage.setItem('lastmainTab', $(this).attr('href'));
    });
    var lastmainTab = localStorage.getItem('lastmainTab');

    if (lastmainTab) 
    {
        $('[href="' + lastmainTab + '"]').tab('show');

    }

});

// display top cards summary
function abba_display_top_summary() {

    var abba_get_current_tab = localStorage.getItem("abba_store_current_tab");

    var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");

    if (abba_get_current_tab == "student") 
    {

        $('#abba_display_student_summary').show();

        $('#abba_display_parent_summary').css('display', 'none');

        $('#abba_display_staff_summary').css('display', 'none');

        $('#abba_display_summary_preloader').html('');
    }
    else if (abba_get_current_tab == 'parent') 
    {
        $('#abba_display_parent_summary').show();

        $('#abba_display_staff_summary').css('display', 'none');

        $('#abba_display_student_summary').css('display', 'none');

        $('#abba_display_summary_preloader').html('');
    }
    else 
    {
        $('#abba_display_staff_summary').show();

        $('#abba_display_parent_summary').css('display', 'none');

        $('#abba_display_student_summary').css('display', 'none');

        $('#abba_display_summary_preloader').html('');
    }


    $('#abba_display_student_summary').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

    $('#abba_display_parent_summary').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

    $('#abba_display_staff_summary').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

    var urlParams = new URLSearchParams(window.location.search);

    // Check if the "class" parameter exists and retrieve its value
    if ($('#abba_display_student_campus option:selected').val() == 'NULL') 
    {
        if (urlParams.has('class')) 
        {
            var classValue = urlParams.get('class');

            $('#abba_display_class option:selected').val(classValue);
        } 
        else 
        {
            $('#abba_display_class option:selected').val('NULL');
        }

    } 
    else 
    {
        
    }

    // for student
    var abba_campus_id = $('#abba_display_student_campus option:selected').val();

    var abba_section_id = $('#abba_display_section option:selected').val();

    var abba_display_class = $('#abba_display_class option:selected').val();

    var abba_display_student_type = $('#abba_display_student_type option:selected').val();

    var abba_display_student_status = $('#abba_display_student_status option:selected').val();

    var abba_display_session = $('#abba_display_session option:selected').val();

    var abba_display_term = $('#abba_display_term option:selected').val();

    var dataString = 'abba_instituion_id=' + abba_get_stored_instituion_id + '&abba_campus_id=' + abba_campus_id + '&abba_display_term=' + abba_display_term + '&abba_display_session=' + abba_display_session + '&abba_display_student_status=' + abba_display_student_status + '&abba_display_student_type=' + abba_display_student_type + '&abba_display_class=' + abba_display_class + '&abba_section_id=' + abba_section_id;

    $.ajax({
        url: '../../controller/scripts/owner/abba_display_top_summary_content_for_student.php',
        type: 'POST',
        data: dataString,
        success: function (data) {
            $('#abba_display_student_summary').html(data);

            $(function () {
                $('[data-plugin="knob"]').knob();
            });

        }
    });

    // for parent

    // Check if the "class" parameter exists and retrieve its value
    if ($('#abba_display_parent_campus option:selected').val() == 'NULL') 
    {
        if (urlParams.has('class')) 
        {
            var classValue = urlParams.get('class');

            $('#abba_display_parent_class option:selected').val(classValue);
        } 
        else 
        {
            $('#abba_display_parent_class option:selected').val('NULL');
        }
        
    } 
    else 
    {
        
    }

    var abba_campus_parent_id = $('#abba_display_parent_campus option:selected').val();

    var abba_section_parent_id = $('#abba_display_parent_section option:selected').val();

    var abba_display_parent_class = $('#abba_display_parent_class option:selected').val();

    var abba_display_parent_type = $('#abba_display_parent_type option:selected').val();

    var abba_display_parent_status = $('#abba_display_parent_status option:selected').val();

    var abba_display_parent_session = $('#abba_display_parent_session option:selected').val();

    var abba_display_parent_term = $('#abba_display_parent_term option:selected').val();

    var dataString = 'abba_instituion_id=' + abba_get_stored_instituion_id + '&abba_campus_id=' + abba_campus_parent_id + '&abba_display_term=' + abba_display_parent_term + '&abba_display_session=' + abba_display_parent_session + '&abba_display_status=' + abba_display_parent_status + '&abba_display_type=' + abba_display_parent_type + '&abba_display_class=' + abba_display_parent_class + '&abba_section_id=' + abba_section_parent_id;

    $.ajax({
        url: '../../controller/scripts/owner/abba_display_top_summary_content_for_parent.php',
        type: 'POST',
        data: dataString,
        success: function (data) {
            $('#abba_display_parent_summary').html(data);

            $(function () {
                $('[data-plugin="knob"]').knob();
            });

        }
    });

    // for staff
    var pros_increase_staff_per_page = $('#pros_increase_staff_per_page option:selected').val();
    var pros_staff_status = $('#pros_display_staff_status option:selected').val();
    var pros_staff_type = $('#pros_display_staff_type option:selected').val();
    var pros_staff_campus_id = $('#abba_display_campus option:selected').val();

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/pros-getstaffcardcontent.php",
        data: {
            pros_get_stored_instituion_id: abba_get_stored_instituion_id,
            pros_staff_status: pros_staff_status,
            pros_staff_type: pros_staff_type,
            pros_staff_campus_id: pros_staff_campus_id
        },
        //cache: false,
        success: function (output) {
            // alert(output);
            $('#abba_display_staff_summary').html(output);
            $(function () {
                $('[data-plugin="knob"]').knob();


            });
        }
    });


}


// $('body').on('click', '.abba_tab_checker_for_summary', function () {

//     var abba_get_clicked_tab = $(this).data('id');

//     localStorage.setItem("abba_store_current_tab", abba_get_clicked_tab);

//     // alert(abba_get_clicked_tab);

//     if (abba_get_clicked_tab == "student") {

//         $('#abba_display_student_summary').show();

//         $('#abba_display_parent_summary').css('display', 'none');

//         $('#abba_display_staff_summary').css('display', 'none');
//     }
//     else if (abba_get_clicked_tab == 'parent') {
//         $('#abba_display_parent_summary').show();

//         $('#abba_display_staff_summary').css('display', 'none');

//         $('#abba_display_student_summary').css('display', 'none');
//     }
//     else {
//         $('#abba_display_staff_summary').show();

//         $('#abba_display_parent_summary').css('display', 'none');

//         $('#abba_display_student_summary').css('display', 'none');
//     }
// });

$('body').on('click', '.abba_main_tab', function () {
    // alert('working');

    var abba_get_new_tab = $(this).data('id');
    
    localStorage.setItem("abba_store_current_tab", abba_get_new_tab);

    if (abba_get_new_tab == "student") 
    {

        $('#abba_display_student_summary').show();

        $('#abba_display_parent_summary').css('display', 'none');

        $('#abba_display_staff_summary').css('display', 'none');
    }
    else if (abba_get_new_tab == 'parent') 
    {
        $('#abba_display_parent_summary').show();

        $('#abba_display_staff_summary').css('display', 'none');

        $('#abba_display_student_summary').css('display', 'none');
    }
    else 
    {
        $('#abba_display_staff_summary').show();

        $('#abba_display_parent_summary').css('display', 'none');

        $('#abba_display_student_summary').css('display', 'none');
    }
});



// initializing a function to load staff
$(document).ready(function () {
   
    abba_display_top_summary();

});


// change of campus get term alias and section
$('body').on('change', '#abba_display_student_campus', function () {

    var abba_campus_id = $('#abba_display_student_campus option:selected').val();

    if (abba_campus_id == 'NULL') {
        $('#abba_display_term').html('<option value="NULL">Select Campus First</option>');

        $('#abba_display_section').html('<option value="NULL">Select Campus First</option>');

        $('#abba_get_promote_section').html('<option value="NULL">Select Campus First</option>');
        
        $('#abba_display_class').html('<option value="NULL">Select Campus First</option>');

    }
    else {
        // alert(abba_campus_id);

        $('#abba_display_term').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');

        $('#abba_display_section').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');

        $('#abba_get_promote_section').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');
        
        $('#abba_display_class').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');

        var dataString = 'abba_campus_id=' + abba_campus_id;


        // get term alias
        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba-get-term.php",
            data: dataString,
            //cache: false,
            success: function (output) {
                // alert(output);
                $('#abba_display_term').html(output);

                // get section
                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/abba-get-section.php",
                    data: dataString,
                    //cache: false,
                    success: function (output) {
                        // alert(output);
                        $('#abba_display_section').html(output);
                        
                        $('#abba_get_promote_section').html(output);
                        
                        // get class
                        abba_get_class();

                        // get students
                        abba_get_students();

                        abba_display_top_summary();

                    }
                });
            }
        });

    }

});

// change of campus get term alias and section
$('body').on('change', '#abba_display_parent_campus', function () {

    var abba_campus_id = $('#abba_display_parent_campus option:selected').val();

    if (abba_campus_id == 'NULL') {

        $('#abba_display_parent_term').html('<option value="NULL">Select Campus First</option>');

        $('#abba_display_parent_section').html('<option value="NULL">Select Campus First</option>');

        $('#abba_display_parent_class').html('<option value="NULL">Select Campus First</option>');

    }
    else {
        // alert(abba_campus_id);

        $('#abba_display_parent_term').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');

        $('#abba_display_parent_section').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');

        $('#abba_display_parent_class').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');

        var dataString = 'abba_campus_id=' + abba_campus_id;


        // get term alias
        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba-get-term.php",
            data: dataString,
            //cache: false,
            success: function (output) {
                // alert(output);
                $('#abba_display_parent_term').html(output);

                // get section
                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/abba-get-section.php",
                    data: dataString,
                    //cache: false,
                    success: function (output) {
                        // alert(output);
                        $('#abba_display_parent_section').html(output);

                        // get class
                        abba_get_parent_class();

                        // get students
                        abba_get_parent();

                        abba_display_top_summary();

                    }
                });
            }
        });

    }

});


// change of section
$('body').on('change', '#abba_display_section', function () {

    // get class
    abba_get_class();

});

// change of section
$('body').on('change', '#abba_display_parent_section', function () {

    // get class
    abba_get_parent_class();

});


// change of section
$('body').on('click', '#abba_get_student_on_click', function () {

    // get class
    abba_get_students();

    abba_display_top_summary();


});


// function to get class
function abba_get_class() {

    $('#abba_display_class').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');

    var abba_campus_id = $('#abba_display_student_campus option:selected').val();

    var abba_section_id = $('#abba_display_section option:selected').val();

    var dataString = 'abba_campus_id=' + abba_campus_id + '&abba_section_id=' + abba_section_id;

    // alert(dataString);

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba-get-class.php",
        data: dataString,
        //cache: false,
        success: function (output) {
            // alert(output);
            $('#abba_display_class').html(output);

        }
    });
}


// function to get class
function abba_get_parent_class() {

    $('#abba_display_parent_class').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');

    var abba_campus_id = $('#abba_display_parent_campus option:selected').val();

    var abba_section_id = $('#abba_display_parent_section option:selected').val();

    var dataString = 'abba_campus_id=' + abba_campus_id + '&abba_section_id=' + abba_section_id;

    // alert(dataString);

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba-get-class.php",
        data: dataString,
        //cache: false,
        success: function (output) {
            // alert(output);
            $('#abba_display_parent_class').html(output);

        }
    });
}


// function to get student
function abba_get_students(page) {

    $('#pagination-container').hide();

    $('#abba_hide_student_filter').hide();

    $('#abba_display_students').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

    $('#abba_get_student_on_click').html('<i class="fas fa-circle-notch fa-spin"></i> Loading...');

    var abba_increase_students_per_page = $('#abba_increase_students_per_page option:selected').val();

    var urlParams = new URLSearchParams(window.location.search);

    if ($('#abba_display_student_campus option:selected').val() == 'NULL') 
    {
        if (urlParams.has('class')) 
        {
            var classValue = urlParams.get('class');

            $('#abba_display_class option:selected').val(classValue);
        } 
        else 
        {
            $('#abba_display_class option:selected').val('NULL');
        }
        
    } 
    else 
    {
        
    }

    var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");

    var abba_campus_id = $('#abba_display_student_campus option:selected').val();

    var abba_section_id = $('#abba_display_section option:selected').val();

    var abba_display_class = $('#abba_display_class option:selected').val();

    var abba_display_student_type = $('#abba_display_student_type option:selected').val();

    var abba_display_student_status = $('#abba_display_student_status option:selected').val();

    var abba_display_session = $('#abba_display_session option:selected').val();

    var abba_display_term = $('#abba_display_term option:selected').val();

    var dataString = 'abba_instituion_id=' + abba_get_stored_instituion_id + '&abba_campus_id=' + abba_campus_id + '&abba_display_term=' + abba_display_term + '&abba_display_session=' + abba_display_session + '&abba_display_student_status=' + abba_display_student_status + '&abba_display_student_type=' + abba_display_student_type + '&abba_display_class=' + abba_display_class + '&abba_section_id=' + abba_section_id + '&page=' + page + '&record_per_page=' + abba_increase_students_per_page;

    // alert(dataString);

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba-get-students.php",
        data: dataString,
        //cache: false,
        success: function (output) {
            // alert(output);
            $('#abba_display_students').html(output);

            $('#abba_hide_student_filter').show('slow');

            $('#abba_get_student_on_click').html('<i class="fas fa-circle-notch"></i> Load filter');

            // student pagination
            $(document).ready(function () {

                var numItems = $('#studentpagination').val();
                var perPage = parseInt(abba_increase_students_per_page);
                var currentPage = $('#currentpage').val(); // For example, page 2
                var prebtn = '<i class="fa fa-arrow-left"></i>';
                var nextbtn = '<i class="fa fa-arrow-right"></i>';

                $('#pagination-container').pagination({

                    items: numItems,
                    itemsOnPage: perPage,
                    prevText: prebtn,
                    nextText: nextbtn,
                    currentPage: currentPage, // Set the current page
                    onPageClick: function (pageNumber) {

                        var showFrom = perPage * (pageNumber - 1);
                        var showTo = showFrom + perPage;

                        // alert(showFrom+' '+showTo);

                        var page = pageNumber;

                        abba_get_students(page);

                    }

                });
            });

            $('#pagination-container').show();
        }
    });
}



$('body').on('click', '#abba_get_parent_on_click', function(){
    abba_get_parent();
});

// function to get student
function abba_get_parent(page) {

    $('#parent_pagination-container').hide();

    $('#abba_hide_parent_filter').hide();

    $('#abba_display_parent').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

    $('#abba_get_parent_on_click').html('<i class="fas fa-circle-notch fa-spin"></i> Loading...');

    var abba_increase_parent_per_page = $('#abba_increase_parent_per_page option:selected').val();
    
    var urlParams = new URLSearchParams(window.location.search);
    
    if ($('#abba_display_parent_campus option:selected').val() == 'NULL') 
    {
        if (urlParams.has('class')) 
        {
            var classValue = urlParams.get('class');

            $('#abba_display_parent_class option:selected').val(classValue);
        } 
        else 
        {
            $('#abba_display_parent_class option:selected').val('NULL');
        }
        
    } 
    else 
    {
        
    }

    var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");

    var abba_campus_id = $('#abba_display_parent_campus option:selected').val();

    var abba_section_id = $('#abba_display_parent_section option:selected').val();

    var abba_display_class = $('#abba_display_parent_class option:selected').val();

    var abba_display_parent_type = $('#abba_display_parent_type option:selected').val();

    var abba_display_parent_status = $('#abba_display_parent_status option:selected').val();

    var abba_display_session = $('#abba_display_parent_session option:selected').val();

    var abba_display_term = $('#abba_display_parent_term option:selected').val();

    var dataString = 'abba_instituion_id=' + abba_get_stored_instituion_id + '&abba_campus_id=' + abba_campus_id + '&abba_display_term=' + abba_display_term + '&abba_display_session=' + abba_display_session + '&abba_display_parent_status=' + abba_display_parent_status + '&abba_display_parent_type=' + abba_display_parent_type + '&abba_display_class=' + abba_display_class + '&abba_section_id=' + abba_section_id + '&page=' + page + '&record_per_page=' + abba_increase_parent_per_page;

    // alert(dataString);

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba-get-parent.php",
        data: dataString,
        //cache: false,
        success: function (output) {
            // alert(output);
            $('#abba_display_parent').html(output);

            $('#abba_hide_parent_filter').show('slow');

            $('#abba_get_parent_on_click').html('<i class="fas fa-circle-notch"></i> Load filter');

            // student pagination
            $(document).ready(function () {

                var numItems = $('#parentpagination').val();
                var perPage = parseInt(abba_increase_parent_per_page);
                var currentPage = $('#currentpage').val(); // For example, page 2
                var prebtn = '<i class="fa fa-arrow-left"></i>';
                var nextbtn = '<i class="fa fa-arrow-right"></i>';

                $('#parent_pagination-container').pagination({

                    items: numItems,
                    itemsOnPage: perPage,
                    prevText: prebtn,
                    nextText: nextbtn,
                    currentPage: currentPage, // Set the current page
                    onPageClick: function (pageNumber) {

                        var showFrom = perPage * (pageNumber - 1);
                        var showTo = showFrom + perPage;

                        // alert(showFrom+' '+showTo);

                        var page = pageNumber;

                        abba_get_parent(page);

                    }

                });
            });

            $('#parent_pagination-container').show();

        }
    });
}

// change number of students per page
$('body').on('change', '#abba_increase_students_per_page', function () {
    // get students
    abba_get_students();
});

// select all student checkbox
$("body").on("change", "#abba_select_all_students", function () {  //"select all" change 

    var checkStatus = $(this).prop('checked');
    if (checkStatus == true) {
        $(".abba_student_checkbox").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
        var selTotal = $('.abba_student_checkbox:checked').length;
        
        $('#abba_student_total_selected').html('(' + selTotal + ' <i class="fa fa-trash"></i>)');
        $("#abba_student_total_selected").fadeIn("slow");
        
        $('#abba_student_total_selected_for_promote').html('(' + selTotal + ' <i class="fas fa-trophy"> Promote Student</i>)');
        $("#abba_student_total_selected_for_promote").fadeIn("slow");
        

    }
    else if (checkStatus == false) {
        $(".abba_student_checkbox").prop('checked', false); //change "select all" checked status to false
        var selTotal = $('.abba_student_checkbox:checked').length;
        $("#abba_student_total_selected").fadeOut("slow");
        $("#abba_student_total_selected_for_promote").fadeOut("slow");
    }

});

// select single student checkbox
$('body').on('change', '.abba_student_checkbox', function () {

    if ($('.abba_student_checkbox:checked').length == $('.abba_student_checkbox').length) {
        $("#abba_select_all_students").prop('checked', true);
        var selTotal = $('.abba_student_checkbox:checked').length;

        if (selTotal > 0) {
            $('#abba_student_total_selected').html('(' + selTotal + ' <i class="fa fa-trash"></i>)');
            $("#abba_student_total_selected").fadeIn("slow");
            
            $('#abba_student_total_selected_for_promote').html('(' + selTotal + ' <i class="fas fa-trophy"> Promote Student</i>)');
            $("#abba_student_total_selected_for_promote").fadeIn("slow");
        }
        else {
            $("#abba_student_total_selected").fadeOut("slow");
            
            $("#abba_student_total_selected_for_promote").fadeOut("slow");
        }

    }
    else if ($('.abba_student_checkbox:checked').length != $('.abba_student_checkbox').length) {
        $("#abba_select_all_students").prop('checked', false);
        var selTotal = $('.abba_student_checkbox:checked').length;

        if (selTotal > 0) {
            $('#abba_student_total_selected').html('(' + selTotal + ' <i class="fa fa-trash"></i>)');
            $("#abba_student_total_selected").fadeIn("slow");
            
            $('#abba_student_total_selected_for_promote').html('(' + selTotal + ' <i class="fas fa-trophy"> Promote Student</i>)');
            $("#abba_student_total_selected_for_promote").fadeIn("slow");
        }
        else {
            $("#abba_student_total_selected").fadeOut("slow");
            
            $("#abba_student_total_selected_for_promote").fadeOut("slow");
        }
    }


});

// delete student
$('body').on('click', '#abba_proceed_to_delete_student', function () {

    $(this).html('<i class="fas fa-circle-notch fa-spin"></i> Deleting..');

    var abba_get_multi_student_id = [];

    $.each($("input[name='abba_get_multi_student_id']:checked"), function () {
        abba_get_multi_student_id.push($(this).val());
        var abba_get_multi_student_remove_card_id = $(this).data('studcardid');

        $('.' + abba_get_multi_student_remove_card_id).remove()
    });

    $('#staticBackdrop').modal('hide');

    $(this).html('<i class="fas fa-trash-alt"> Yes Delete');


    var dataString = '&abba_get_multi_student_id=' + abba_get_multi_student_id;

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba-delete-students.php",
        data: dataString,
        cache: false,

        success: function (result) {
            $('#abba_student_delete_success_msg').html(result);

            $.wnoty({
                type: 'success',
                message: "Hurray! the selected student(s) have been deleted successfully.",
                autohideDelay: 5000
            });

            $("#abba_student_total_selected").fadeOut("slow");

            abba_display_top_summary();
        }
    });

});


// delete single student
$('body').on('click', '.abba_delete_single_student', function () {

    var abba_get_student_checkbox_id = $(this).data('checkbox');

    $("#" + abba_get_student_checkbox_id).prop('checked', true);

    if ($('.abba_student_checkbox:checked').length == $('.abba_student_checkbox').length) {
        $("#abba_select_all_students").prop('checked', true);
        var selTotal = $('.abba_student_checkbox:checked').length;

        if (selTotal > 0) {
            $('#abba_student_total_selected').html('(' + selTotal + ' <i class="fa fa-trash"></i>)');
            $("#abba_student_total_selected").fadeIn("slow");
        }
        else {
            $("#abba_student_total_selected").fadeOut("slow");
        }

    }
    else if ($('.abba_student_checkbox:checked').length != $('.abba_student_checkbox').length) {
        $("#abba_select_all_students").prop('checked', false);
        var selTotal = $('.abba_student_checkbox:checked').length;

        if (selTotal > 0) {
            $('#abba_student_total_selected').html('(' + selTotal + ' <i class="fa fa-trash"></i>)');
            $("#abba_student_total_selected").fadeIn("slow");
        }
        else {
            $("#abba_student_total_selected").fadeOut("slow");
        }
    }
});


// change number of parent per page
$('body').on('change', '#abba_increase_parent_per_page', function () {
    // get students
    abba_get_parent();
});

// select all parent checkbox
$("body").on("change", "#abba_select_all_parent", function () {  //"select all" change 

    var checkStatus = $(this).prop('checked');
    if (checkStatus == true) {
        $(".abba_parent_checkbox").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
        var selTotal = $('.abba_parent_checkbox:checked').length;
        $('#abba_parent_total_selected').html('(' + selTotal + ' <i class="fa fa-trash"></i>)');
        $("#abba_parent_total_selected").fadeIn("slow");

    }
    else if (checkStatus == false) {
        $(".abba_parent_checkbox").prop('checked', false); //change "select all" checked status to false
        var selTotal = $('.abba_parent_checkbox:checked').length;
        $("#abba_parent_total_selected").fadeOut("slow");
    }

});

// select single parent checkbox
$('body').on('change', '.abba_parent_checkbox', function () {

    if ($('.abba_parent_checkbox:checked').length == $('.abba_parent_checkbox').length) {
        $("#abba_select_all_parent").prop('checked', true);
        var selTotal = $('.abba_parent_checkbox:checked').length;

        if (selTotal > 0) {
            $('#abba_parent_total_selected').html('(' + selTotal + ' <i class="fa fa-trash"></i>)');
            $("#abba_parent_total_selected").fadeIn("slow");
        }
        else {
            $("#abba_parent_total_selected").fadeOut("slow");
        }

    }
    else if ($('.abba_parent_checkbox:checked').length != $('.abba_parent_checkbox').length) {
        $("#abba_select_all_parent").prop('checked', false);
        var selTotal = $('.abba_parent_checkbox:checked').length;

        if (selTotal > 0) {
            $('#abba_parent_total_selected').html('(' + selTotal + ' <i class="fa fa-trash"></i>)');
            $("#abba_parent_total_selected").fadeIn("slow");
        }
        else {
            $("#abba_parent_total_selected").fadeOut("slow");
        }
    }


});

// delete parent
$('body').on('click', '#abba_proceed_to_delete_parent', function () {

    $(this).html('<i class="fas fa-circle-notch fa-spin"></i> Deleting..');

    var abba_get_multi_parent_id = [];
    $.each($("input[name='abba_get_multi_parent_id']:checked"), function () {
        abba_get_multi_parent_id.push($(this).val());
        var abba_get_multi_parent_remove_card_id = $(this).data('parent_cardid');

        $('.' + abba_get_multi_parent_remove_card_id).remove()
    });

    // alert(abba_get_multi_parent_id);
    $('#abba_parent_staticBackdrop').modal('hide');

    $(this).html('<i class="fas fa-trash-alt"> Yes Delete');

    var dataString = '&abba_get_multi_parent_id=' + abba_get_multi_parent_id;

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba-delete-parent.php",
        data: dataString,
        cache: false,

        success: function (result) {
            // $('#abba_parent_delete_success_msg').html(result);

            $.wnoty({
                type: 'success',
                message: "Hurray! the selected parent(s) have been deleted successfully.",
                autohideDelay: 5000
            });

            $("#abba_parent_total_selected").fadeOut("slow");

            abba_display_top_summary();

        }
    });
});

// delete single student
$('body').on('click', '.abba_delete_single_parent', function () {

    var abba_get_parent_checkbox_id = $(this).data('checkbox');

    $("#" + abba_get_parent_checkbox_id).prop('checked', true);

    if ($('.abba_parent_checkbox:checked').length == $('.abba_parent_checkbox').length) {
        $("#abba_select_all_parent").prop('checked', true);
        var selTotal = $('.abba_parent_checkbox:checked').length;

        if (selTotal > 0) {
            $('#abba_parent_total_selected').html('(' + selTotal + ' <i class="fa fa-trash"></i>)');
            $("#abba_parent_total_selected").fadeIn("slow");
        }
        else {
            $("#abba_parent_total_selected").fadeOut("slow");
        }

    }
    else if ($('.abba_parent_checkbox:checked').length != $('.abba_parent_checkbox').length) {
        $("#abba_select_all_parent").prop('checked', false);
        var selTotal = $('.abba_parent_checkbox:checked').length;

        if (selTotal > 0) {
            $('#abba_parent_total_selected').html('(' + selTotal + ' <i class="fa fa-trash"></i>)');
            $("#abba_parent_total_selected").fadeIn("slow");
        }
        else {
            $("#abba_parent_total_selected").fadeOut("slow");
        }
    }
});



// get student state
$('body').on("change", "#abba_display_student_country", function () {

    abba_get_student_state();
});

$(document).ready(function () {

    abba_get_student_state();
});

function abba_get_student_state() {

    var abba_get_student_country_id = $('#abba_display_student_country option:selected').val();

    var dataString = '&abba_get_student_country_id=' + abba_get_student_country_id;

    $('#abba_display_student_state').html('<option value="NULL">Loading...</option>');

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba_get_student_state_script.php",
        data: dataString,

        success: function (result) {

            $('#abba_display_student_state').html(result);
        }
    });
}

// get student lga
$('body').on("change", "#abba_display_student_state", function () {

    abba_get_student_lga();
});

$(document).ready(function () {

    abba_get_student_lga();
});

function abba_get_student_lga() {

    var abba_get_student_country_id = $('#abba_display_student_country option:selected').val();

    var abba_get_student_state_id = $('#abba_display_student_state option:selected').val();

    var dataString = '&abba_get_student_country_id=' + abba_get_student_country_id + '&abba_get_student_state_id=' + abba_get_student_state_id;

    $('#abba_display_student_lga').html('<option value="NULL">Loading...</option>');

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba_get_student_lga_script.php",
        data: dataString,

        success: function (result) {

            $('#abba_display_student_lga').html(result);
        }
    });
}

// change of campus get term alias and section
$('body').on('change', '#abba_display_campus_for_create_student', function () {

    var abba_campus_id = $('#abba_display_campus_for_create_student option:selected').val();

    if (abba_campus_id == 'NULL') {

        $('#abba_display_create_student_class').html('<option value="NULL">Select Campus First</option>');

        $('#abba_get_student_reg_number').val('');

        $.wnoty({
            type: 'warning',
            message: "Hey! you have to select a campus before you can select a class for the student.",
            autohideDelay: 5000
        });
    }
    else {
        // alert(abba_campus_id);

        $('#abba_display_create_student_class').html('<option value="0"><i class="fa fa-spinner fa-spin">Loading..</i></option>');

        var dataString = 'abba_campus_id=' + abba_campus_id;

        // get class
        abba_get_create_student_class();

    }

});

// function to get create student class
function abba_get_create_student_class() {

    var abba_campus_id = $('#abba_display_campus_for_create_student option:selected').val();

    var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");

    var dataString = 'abba_campus_id=' + abba_campus_id;

    // alert(dataString);

    // $("#abba_display_create_student_class").animate({ scrollTop: 0 }, "slow");

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba-get_create_student_class_script.php",
        data: dataString,
        //cache: false,
        success: function (output) {
            // alert(output);
            $('#abba_display_create_student_class').html(output);

        }
    });

    // get stud reg number count if available
    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba_get_campus_student_regnumber_count.php",
        data: dataString,
        //cache: false,
        success: function (output) {
            // alert(output);
            $('#abba_get_student_reg_number').val(output);

        }
    });

}


// phone number country code and flag
var studentphone = window.intlTelInput(document.querySelector("#abba_get_student_phone"), {
    separateDialCode: true,
    preferredCountries: ["ng"],
    hiddenInput: "full",
    utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
});


// create student
$('body').on('click', '#abba_proceed_to_create_student', function () {

    $('#abba_proceed_to_create_student').html('<i class="fas fa-circle-notch fa-spin"></i> Creating..');

    var abba_campus_id = $('#abba_display_campus_for_create_student option:selected').val();
    var abba_get_student_first_name = $('#abba_get_student_first_name').val();
    var abba_get_student_middle_name = $('#abba_get_student_middle_name').val();
    var abba_get_student_last_name = $('#abba_get_student_last_name').val();

    // alert(abba_campus_id);
    var studentphonefull = studentphone.getNumber(intlTelInputUtils.numberFormat.E164);
    $("input[name='studentphone[full]'").val(studentphonefull);

    var abba_get_student_email = $('#abba_get_student_email').val();
    var abba_get_student_disability = $('#abba_get_student_disability').val();
    var abba_get_student_alergy = $('#abba_get_student_alergy').val();
    var abba_get_student_gender = $('#abba_get_student_gender option:selected').val();
    var abba_get_student_dob = $('#abba_get_student_dob').val();
    var abba_get_student_blood_group = $('#abba_get_student_blood_group option:selected').val();
    var abba_get_student_religion = $('#abba_get_student_religion option:selected').val();
    var abba_display_student_country = $('#abba_display_student_country option:selected').val();
    var abba_display_student_state = $('#abba_display_student_state option:selected').val();
    var abba_display_student_lga = $('#abba_display_student_lga option:selected').val();
    var abba_get_student_city = $('#abba_get_student_city').val();
    var abba_get_student_address = $('#abba_get_student_address').val();
    var abba_display_create_student_class = $('#abba_display_create_student_class option:selected').val();
    var abba_get_student_session = $('#abba_get_student_session option:selected').val();
    var abba_get_student_doa = $('#abba_get_student_doa').val();
    var abba_get_student_reg_number = $('#abba_get_student_reg_number').val();
    var abba_get_student_password = $('#abba_get_student_password').val();
    var abba_get_student_type = $('#abba_get_student_type option:selected').val();
    var abba_get_student_parent = $('#abba_get_student_parent').val();

    if (abba_campus_id == '0' || abba_campus_id == 'NULL') {
        $.wnoty({
            type: 'error',
            message: "Hey! you have to select a campus to proceed.",
            autohideDelay: 5000
        });

        $('#abba_proceed_to_create_student').html('<i class="fa fa-plus"> Create</i>');
    }
    else if (abba_get_student_first_name == '') {
        $.wnoty({
            type: 'error',
            message: "Hey! you have to enter the student's first name to proceed.",
            autohideDelay: 5000
        });

        $('#abba_proceed_to_create_student').html('<i class="fa fa-plus"> Create</i>');
    }
    else if (abba_get_student_last_name == '') {
        $.wnoty({
            type: 'error',
            message: "Hey! you have to enter the student's last name to proceed.",
            autohideDelay: 5000
        });

        $('#abba_proceed_to_create_student').html('<i class="fa fa-plus"> Create</i>');
    }
    else if (abba_get_student_gender == '0') {
        $.wnoty({
            type: 'error',
            message: "Hey! you have to select the student's gender to proceed.",
            autohideDelay: 5000
        });

        $('#abba_proceed_to_create_student').html('<i class="fa fa-plus"> Create</i>');
    }
    else if (abba_get_student_religion == '0') {
        $.wnoty({
            type: 'error',
            message: "Hey! you have to select the student's religion to proceed.",
            autohideDelay: 5000
        });

        $('#abba_proceed_to_create_student').html('<i class="fa fa-plus"> Create</i>');
    }
    else if (abba_display_student_country == '0') {
        $.wnoty({
            type: 'error',
            message: "Hey! you have to select the student's country to proceed.",
            autohideDelay: 5000
        });

        $('#abba_proceed_to_create_student').html('<i class="fa fa-plus"> Create</i>');
    }
    else if (abba_display_student_state == '0') {
        $.wnoty({
            type: 'error',
            message: "Hey! you have to select the student's state to proceed.",
            autohideDelay: 5000
        });

        $('#abba_proceed_to_create_student').html('<i class="fa fa-plus"> Create</i>');
    }
    else if (abba_display_student_lga == 'NULL' || abba_display_student_lga == '0') {
        $.wnoty({
            type: 'error',
            message: "Hey! you have to select the student's lga to proceed.",
            autohideDelay: 5000
        });

        $('#abba_proceed_to_create_student').html('<i class="fa fa-plus"> Create</i>');
    }
    else if (abba_display_create_student_class == '0') {
        $.wnoty({
            type: 'error',
            message: "Hey! you have to select the student's class to proceed.",
            autohideDelay: 5000
        });

        $('#abba_proceed_to_create_student').html('<i class="fa fa-plus"> Create</i>');
    }
    else if (abba_get_student_session == '0') {
        $.wnoty({
            type: 'error',
            message: "Hey! you have to select a session to proceed.",
            autohideDelay: 5000
        });

        $('#abba_proceed_to_create_student').html('<i class="fa fa-plus"> Create</i>');
    }
    else if (abba_get_student_doa == '') {
        $.wnoty({
            type: 'error',
            message: "Hey! you have to enter the student's DOA(Date of Admission) to proceed.",
            autohideDelay: 5000
        });

        $('#abba_proceed_to_create_student').html('<i class="fa fa-plus"> Create</i>');
    }
    else if (abba_get_student_reg_number == '') {
        $.wnoty({
            type: 'error',
            message: "Hey! you have to enter the student's registration number to proceed.",
            autohideDelay: 5000
        });

        $('#abba_proceed_to_create_student').html('<i class="fa fa-plus"> Create</i>');
    }
    else if (abba_get_student_password == '') {
        $.wnoty({
            type: 'error',
            message: "Hey! you have to enter the student's password to proceed.",
            autohideDelay: 5000
        });

        $('#abba_proceed_to_create_student').html('<i class="fa fa-plus"> Create</i>');
    }
    else if (abba_get_student_type == '0') {
        $.wnoty({
            type: 'error',
            message: "Hey! you have to select the student type to proceed.",
            autohideDelay: 5000
        });

        $('#abba_proceed_to_create_student').html('<i class="fa fa-plus"> Create</i>');
    }
    else {
        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba_finally_create_student.php",
            data: {
                abba_campus_id: abba_campus_id,
                abba_get_student_first_name: abba_get_student_first_name,
                abba_get_student_middle_name: abba_get_student_middle_name,
                abba_get_student_last_name: abba_get_student_last_name,
                studentphonefull: studentphonefull,
                abba_get_student_email: abba_get_student_email,
                abba_get_student_disability: abba_get_student_disability,
                abba_get_student_alergy: abba_get_student_alergy,
                abba_get_student_gender: abba_get_student_gender,
                abba_get_student_dob: abba_get_student_dob,
                abba_get_student_blood_group: abba_get_student_blood_group,
                abba_get_student_religion: abba_get_student_religion,
                abba_display_student_country: abba_display_student_country,
                abba_display_student_state: abba_display_student_state,
                abba_display_student_lga: abba_display_student_lga,
                abba_get_student_city: abba_get_student_city,
                abba_get_student_address: abba_get_student_address,
                abba_display_create_student_class: abba_display_create_student_class,
                abba_get_student_session: abba_get_student_session,
                abba_get_student_doa: abba_get_student_doa,
                abba_get_student_reg_number: abba_get_student_reg_number,
                abba_get_student_password: abba_get_student_password,
                abba_get_student_parent: abba_get_student_parent,
                abba_get_student_type: abba_get_student_type
            },

            success: function (result) {

                $('#abba_proceed_to_create_student').html('<i class="fa fa-plus"> Create</i>');

                // alert(result);

                if (result == 1) {
                    $.wnoty({
                        type: 'success',
                        message: "Hurray! the student has been created successfully.",
                        autohideDelay: 5000
                    });
                }
                else if (result == 2) {
                    $.wnoty({
                        type: 'warning',
                        message: "Oops! the registration number entered already exist, please change the number and try again.",
                        autohideDelay: 5000
                    });
                }
                else {
                    $.wnoty({
                        type: 'error',
                        message: "Oops! the student was not created successfully.",
                        autohideDelay: 5000
                    });
                }

            }
        });
    }

});

// change create student btn
$('body').on('click', '#abba_ex1-tab-10', function () {
    $('#change_create_btn').html('<button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fas fa-times"> Close</i></button> <button type="button" class="btn btn-primary btn-sm" id="abba_proceed_to_create_student">  <i class="fa fa-plus"> Create</i> </button>');
});


// change upload student btn
$('body').on('click', '#abba_ex1-tab-20', function () {
    $('#change_create_btn').html('<button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fas fa-times"> Close</i></button> <button type="button" class="btn btn-primary btn-sm" id="abba_proceed_to_upload_student"> <i class="fa fa-upload"> Upload</i> </button>');
});


// crop and upload student image
$('body').on('click', '#abba_get_student_image', function () {

    var abba_get_student_id = $(this).data('id');

    var abba_get_campus_id = $(this).data('campusid');

    var abba_get_student_img_class = $(this).data('studimgclass');

    $('#abba_store_student_id_for_image').val(abba_get_student_id);

    $('#abba_store_campus_id_for_image').val(abba_get_campus_id);

    $('#abba_get_student_image_class_input').val(abba_get_student_img_class);

});

$(document).ready(function () {

    $abba_student_image_crop = $('#abba_student_demo_image').croppie({
        enableExif: false,
        viewport: {
            width: 300,
            height: 300,
            type: 'square' //circle
        },
        boundary: {
            width: 350,
            height: 350
        }
    });

    $('body').on('change', '.abba_update_student_image', function () {
        var reader = new FileReader();
        reader.onload = function (event) {
            $abba_student_image_crop.croppie('bind', {
                url: event.target.result
            }).then(function () {
                console.log('jQuery bind complete');
            });
        };
        reader.readAsDataURL(this.files[0]);

        $('#abba_update_student_image_modal').modal('show');


    });

    $('body').on('click', '.abba_crop_student_image', function () {

        $abba_student_image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (response) {
            var abba_get_student_id = $('#abba_store_student_id_for_image').val();

            var abba_get_campus_id = $('#abba_store_campus_id_for_image').val();

            $('.abba_crop_student_image').html('<i class="fa fa-spinner fa-pulse"></i> uploading..');

            var abba_get_student_image_class = $('#abba_get_student_image_class_input').val();

            $('#abba_update_student_image_modal').modal('hide');

            $('.' + abba_get_student_image_class).attr('src', response);

            // alert(abba_get_student_image_class);

            $.ajax({
                url: '../../controller/scripts/owner/abba_update_student_image.php',
                type: 'POST',
                data: { "image": response, "abba_get_student_id": abba_get_student_id, "abba_get_campus_id": abba_get_campus_id },
                success: function (data) {

                    // abba_get_students();

                    $('.abba_crop_student_image').html('Submit');

                    if (data == 1) {
                        $.wnoty({
                            type: 'success',
                            message: 'Image has been updated successfully',
                            autohideDelay: 5000, // 5 seconds
                            position: 'top-right',
                            autohide: true
                        });
                    }
                    else {
                        $.wnoty({
                            type: 'warning',
                            message: 'Unfortunately your image was not updated, please try again',
                            autohideDelay: 5000, // 5 seconds
                            position: 'top-right',
                            autohide: true
                        });
                    }

                }
            });
        });
    });
});

// crop and upload parent image
$('body').on('click', '#abba_get_parent_image', function () {

    var abba_get_parent_id = $(this).data('id');

    var abba_get_inst_id = $(this).data('inst');

    var abba_get_parent_img_class = $(this).data('imgclass');

    $('#abba_store_parent_id_for_image').val(abba_get_parent_id);

    $('#abba_store_inst_id_for_image').val(abba_get_inst_id);

    $('#abba_get_parent_image_class_input').val(abba_get_parent_img_class);

});

$(document).ready(function () {

    $abba_parent_image_crop = $('#abba_parent_demo_image').croppie({
        enableExif: false,
        viewport: {
            width: 300,
            height: 300,
            type: 'square' //circle
        },
        boundary: {
            width: 350,
            height: 350
        }
    });

    $('body').on('change', '.abba_update_parent_image', function () {
        var reader = new FileReader();
        reader.onload = function (event) {
            $abba_parent_image_crop.croppie('bind', {
                url: event.target.result
            }).then(function () {
                console.log('jQuery bind complete');
            });
        };
        reader.readAsDataURL(this.files[0]);

        $('#abba_update_parent_image_modal').modal('show');


    });

    $('body').on('click', '.abba_crop_parent_image', function () {

        $abba_parent_image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (response) {
            var abba_get_parent_id = $('#abba_store_parent_id_for_image').val();

            var abba_get_inst_id = $('#abba_store_inst_id_for_image').val();

            var abba_get_parent_image_class = $('#abba_get_parent_image_class_input').val();

            $('.abba_crop_parent_image').html('<i class="fa fa-spinner fa-pulse"></i> uploading..');

            // alert(response);

            $('#abba_update_parent_image_modal').modal('hide');

            $('.' + abba_get_parent_image_class).attr('src', response);

            $.ajax({
                url: '../../controller/scripts/owner/abba_update_parent_image.php',
                type: 'POST',
                data: { "image": response, "abba_get_parent_id": abba_get_parent_id, "abba_get_inst_id": abba_get_inst_id },
                success: function (data) {

                    // abba_get_students();

                    $('.abba_crop_parent_image').html('Submit');

                    if (data == 1) {
                        $.wnoty({
                            type: 'success',
                            message: 'Image has been updated successfully',
                            autohideDelay: 5000, // 5 seconds
                            position: 'top-right',
                            autohide: true
                        });
                    }
                    else {
                        $.wnoty({
                            type: 'warning',
                            message: 'Unfortunately your image was not updated, please try again',
                            autohideDelay: 5000, // 5 seconds
                            position: 'top-right',
                            autohide: true
                        });
                    }

                }
            });
        });
    });
});



// change student status
$('body').on('click', '.abba_change_student_status', function () {

    var abba_student_id = $(this).data('id');

    var abba_student_status = $(this).data('status');

    var abba_student_span = $(this).data('span');

    var abba_campus_id = $(this).data('campusid');

    var abba_display_session = $('#abba_display_session option:selected').val();

    var abba_display_term = $('#abba_display_term option:selected').val();

    var abba_get_student_span_content = $('#' + abba_student_span).html();

    $('#' + abba_student_span).html('<i class="fas fa-spinner fa-spin fs-6" style="color:#007ffb;"></i>');

    // alert('working');

    var dataString = 'abba_campus_id=' + abba_campus_id + '&abba_student_id=' + abba_student_id + '&abba_student_status=' + abba_student_status + '&abba_student_span=' + abba_student_span + '&abba_display_session=' + abba_display_session + '&abba_display_term=' + abba_display_term;

    if (abba_campus_id == 'NULL' || abba_campus_id == '') {
        $.wnoty({
            type: 'warning',
            message: 'Please select a campus to be able to change a students status',
            autohideDelay: 5000, // 5 seconds
            position: 'top-right',
            autohide: true
        });

        $('#' + abba_student_span).html(abba_get_student_span_content);
    }
    else if (abba_display_session == 'NULL' || abba_display_term == '') {
        $.wnoty({
            type: 'warning',
            message: 'Please select a session to be able to change a students status',
            autohideDelay: 5000, // 5 seconds
            position: 'top-right',
            autohide: true
        });

        $('#' + abba_student_span).html(abba_get_student_span_content);
    }
    else if (abba_display_term == 'NULL' || abba_display_term == '') {
        $.wnoty({
            type: 'warning',
            message: 'Please select a term to be able to change a students status',
            autohideDelay: 5000, // 5 seconds
            position: 'top-right',
            autohide: true
        });

        $('#' + abba_student_span).html(abba_get_student_span_content);
    }
    else {

        $.ajax({
            url: '../../controller/scripts/owner/abba_change_student_status.php',
            type: 'POST',
            data: dataString,
            success: function (data) {

                $('#' + abba_student_span).html(data);

                $.wnoty({
                    type: 'success',
                    message: 'Student status has been changed successfully',
                    autohideDelay: 5000, // 5 seconds
                    position: 'top-right',
                    autohide: true
                });

                abba_display_top_summary();

                abba_get_parent();

            }
        });
    }
});



// change parent status
$('body').on('click', '.abba_change_parent_status', function () {

    var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");

    var abba_parent_id = $(this).data('id');

    var abba_parent_status = $(this).data('status');

    var abba_parent_span = $(this).data('span');

    var abba_display_session = $('#abba_display_session option:selected').val();

    var abba_get_parent_span_content = $('#' + abba_parent_span).html();

    $('#' + abba_parent_span).html('<i class="fas fa-spinner fa-spin fs-6" style="color:#007ffb;"></i>');

    var dataString = 'abba_parent_id=' + abba_parent_id + '&abba_parent_status=' + abba_parent_status + '&abba_display_session=' + abba_display_session + '&abba_get_stored_instituion_id=' + abba_get_stored_instituion_id;

    // alert(dataString);

    if (abba_display_session == 'NULL' || abba_display_session == '') {
        $.wnoty({
            type: 'warning',
            message: 'Please select a session to be able to change a parent status',
            autohideDelay: 5000, // 5 seconds
            position: 'top-right',
            autohide: true
        });

        $('#' + abba_parent_span).html(abba_get_parent_span_content);
    }
    else {
        $.ajax({
            url: '../../controller/scripts/owner/abba_change_parent_status.php',
            type: 'POST',
            data: dataString,
            success: function (data) {

                $('#' + abba_parent_span).html(data);

                $.wnoty({
                    type: 'success',
                    message: 'Parent status has been changed successfully',
                    autohideDelay: 5000, // 5 seconds
                    position: 'top-right',
                    autohide: true
                });

                abba_display_top_summary();

            }
        });
    }

});

$(document).ready(function () {
    $('body').on('click', '#parent_copy-button', function () {
        var inviteLink = $('#parent_invite-link');
        inviteLink.select();
        document.execCommand('copy');
        // Update button text temporarily
        $(this).text('Copied!');
        setTimeout(function () {
            $('#parent_copy-button').text('Copy');
        }, 2000);
    });
});

// Select Child Jquery
$('body').on("click", '.selectBox', function () {

    $(this).parent().find('#checkBoxes').fadeToggle();
    $(this).parent().parent().siblings().find('#checkBoxes').fadeOut();

});

$('body').on("click", '.selectBox', function () {

    $(this).parent().find('#checkBoxes-one').fadeToggle();
    $(this).parent().parent().siblings().find('#checkBoxes-one').fadeOut();
});


$('body').on('change','#abba_display_reg_cnt_campus',function(){

    var abba_campus_id = $('#abba_display_reg_cnt_campus option:selected').val();

    // alert(abba_campus_id);

    if(abba_campus_id == 'NULL'){
        $.wnoty({
            type: 'error',
            message: "Please select a campus to proceed.",
            autohideDelay: 5000
        });
    }
    else
    {

        var dataString = 'abba_campus_id=' + abba_campus_id;

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba_get_campus_admission_number_count.php",
            data: dataString,
            //cache: false,
            success: function (output) {
                // alert(output);
                $('#display_number_count').val(output);
    
            }
        });
    
    }

});


$('body').on("click", '#abba_proceed_to_add_number_count', function () {

    $(this).html('<i class="fas fa-circle-notch fa-spin"></i> Submitting..');

    var abba_campus_id = $('#abba_display_reg_cnt_campus option:selected').val();

    var display_number_count = $('#display_number_count').val();

    if(abba_campus_id == 'NULL')
    {
        $.wnoty({
            type: 'error',
            message: "Please select a campus to proceed.",
            autohideDelay: 5000
        });
    }
    else
    {

        var dataString = '&abba_campus_id=' + abba_campus_id + '&display_number_count=' + display_number_count;
        // alert(dataString);
    
        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba-update_regnumber_cnt.php",
            data: dataString,
            cache: false,
    
            success: function (result) {
    
                // alert(result);
    
                $.wnoty({
                    type: 'success',
                    message: "Submitted Successfully.",
                    autohideDelay: 5000
                });
    
                $("#abba_proceed_to_add_number_count").html('<i class="fas fa-save"> Submit</i>');
    
                $("#regnumberset").modal("hide");
    
            }
        });
    
    }

});


$(document).ready(function () {
    // Function to filter student cards based on the search input
    function filterStudentCards(searchTerm) {

        // alert(searchTerm);

        $('.card_search_get').each(function () {
            const studentName = $(this).find('.student_full_name').text().toLowerCase();

            // Check if the student's name contains the search term
            if (studentName.includes(searchTerm)) {
                $(this).show(); // Show the card
            }
            else {
                $(this).hide(); // Hide the card
            }
        });
    }

    // Add an event listener to the search input
    $('.abba_student_search').on('input paste', function () {
        const searchTerm = $(this).val().toLowerCase();

        // alert(searchTerm);
        filterStudentCards(searchTerm);
    });

    // Initial filtering (optional, depending on your requirements)
    // filterStudentCards('initial search term');
});

$(document).ready(function () {
    // Function to filter student cards based on the search input
    function filterParentCards(searchTerm) {

        // alert(searchTerm);

        $('.card_search_get_parent').each(function () {
            const parentName = $(this).find('.parent_full_name').text().toLowerCase();

            // Check if the student's name contains the search term
            if (parentName.includes(searchTerm)) {
                $(this).show(); // Show the card
            }
            else {
                $(this).hide(); // Hide the card
            }
        });
    }

    // Add an event listener to the search input
    $('.abba_parent_search').on('input paste', function () {
        const searchTerm = $(this).val().toLowerCase();

        // alert(searchTerm);
        filterParentCards(searchTerm);
    });

    // Initial filtering (optional, depending on your requirements)
    // filterStudentCards('initial search term');
});


$(document).ready(function () {
    $('#abba_parent_kids').on('show.bs.modal', function (e) {

        var parent_id = $(e.relatedTarget).data('id');
        
        var parent_span = $(e.relatedTarget).data('span');

        $('#abba_parent_id_holder').val(parent_id);

        $('#abba_parent_span').val(parent_span);

        var abba_campus_id = $(e.relatedTarget).data('camp');

        $('#abba_parent_camp').val(abba_campus_id);

        $('#display_my_kids').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

        var dataString = 'parent_id=' + parent_id + '&abba_campus_id=' + abba_campus_id + '&parent_span=' + parent_span;

        // alert(dataString);

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba_display_my_kids.php",
            data: dataString,
            cache: false,

            success: function (result) {

                // alert(result);

                $('#display_my_kids').html(result);

                abba_display_assign_class();

            }
        });
    });
});


// function to get class
function abba_display_assign_class() {

    $('#abba_display_assign_class').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');

    var abba_campus_id = $('#abba_parent_camp').val();

    var abba_section_id = $('#abba_display_parent_section option:selected').val();

    var dataString = 'abba_campus_id=' + abba_campus_id + '&abba_section_id=' + abba_section_id;

    // alert(dataString);

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba-get-class.php",
        data: dataString,
        //cache: false,
        success: function (output) {
            // alert(output);
            $('#abba_display_assign_class').html(output);

        }
    });
}


$('body').on('click', '.abba_student_parent', function () {

    var student_id = $(this).data('id');

    var student_card = $(this).data('card');
    
    var parent_span = $(this).data('span');

    var kidnum = parseInt($('.'+parent_span).text()) - 1;

    $('.'+parent_span).text(kidnum);

    if(kidnum < 1)
    {
        $('#display_my_kids').html('<div align="center" class="mt-2"><img src="../../assets/images/adminImg/err.png" style="width:15%;"/><p class="pt-2 fs-sm text-secondary">We couldn\'t find any record.</p></div>');
    }
    else{

    }

    $('.' + student_card).remove();

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba_update_student_parent.php",
        data: { student_id: student_id },
        cache: false,

        success: function (result) {

            // alert(result);

            $.wnoty({
                type: 'success',
                message: "Student Removed Successfully.",
                autohideDelay: 5000
            });

        }
    });

});

$(document).ready(function () {
    // Open Second Modal
    $('body').on('click', '#abba_assign_parent_to_students', function () {
        $('#abba_assign_parent_to_student_Modal').modal('show');
        $('#abba_parent_kids').css('z-index', 1040); // Increase z-index of first modal

        var abba_campus_id = $('#abba_parent_camp').val();

        var abba_class_id = $('#abba_display_assign_class option:selected').val();

        var dataString = '&abba_campus_id=' + abba_campus_id + '&abba_class_id=' + abba_class_id;

        $('#abba_display_student_for_assign').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba-get-student_to_assign.php",
            data: dataString,
            //cache: false,
            success: function (output) {
                // alert(output);
                $('#abba_display_student_for_assign').html(output);
                // Search parent
                $("body").on("keyup", ".abba_stud_assign_search", function () {
                    var val = $(this).val();
                    filter(val.toLowerCase());
                });

                $("body").on("paste", ".abba_stud_assign_search", function () {
                    var element = this;
                    setTimeout(function () {
                        var text = $(element).val().toLowerCase();
                        filter(text);
                    }, 100);
                });

                function filter(x) {
                    var isMatch = false;
                    $(".stud_assign_selectBox-cont .stud_assign_card_search_get").each(function (i) {
                        var content = $(this).html();

                        if (content.toLowerCase().indexOf(x) == -1) {
                            $(this).hide();
                        } else {
                            isMatch = true;
                            $(this).show();

                        }
                    });

                    var ccs = $('.stud_assign_selectBox-cont label').filter(function () {
                        return $(this).css('display') !== 'none';
                    }).length;

                    $(".no-results").toggle(!isMatch);
                    $(".cc").toggle(isMatch);
                }

                var ccs = $('.stud_assign_selectBox-cont label').filter(function () {
                    return $(this).css('display') !== 'none';
                }).length;

            }
        });
    });

    // Reset z-index of first modal when second modal is closed
    $('#abba_assign_parent_to_student_Modal').on('hidden.bs.modal', function () {
        $('#abba_parent_kids').css('z-index', 1050); // Reset z-index of first modal
    });
});

$('body').on('change', '#abba_display_assign_class', function () {

    var abba_campus_id = $('#abba_parent_camp').val();

    var abba_class_id = $('#abba_display_assign_class option:selected').val();

    var dataString = '&abba_campus_id=' + abba_campus_id + '&abba_class_id=' + abba_class_id;

    $('#abba_display_student_for_assign').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba-get-student_to_assign.php",
        data: dataString,
        //cache: false,
        success: function (output)
        {
            // alert(output);
            $('#abba_display_student_for_assign').html(output);
            // Search parent
            $("body").on("keyup", ".abba_stud_assign_search", function () {
                var val = $(this).val();
                filter(val.toLowerCase());
            });

            $("body").on("paste", ".abba_stud_assign_search", function () {
                var element = this;
                setTimeout(function () {
                    var text = $(element).val().toLowerCase();
                    filter(text);
                }, 100);
            });

            function filter(x) {
                var isMatch = false;
                $(".stud_assign_selectBox-cont .stud_assign_card_search_get").each(function (i) {
                    var content = $(this).html();

                    if (content.toLowerCase().indexOf(x) == -1) {
                        $(this).hide();
                    } else {
                        isMatch = true;
                        $(this).show();

                    }
                });

                var ccs = $('.stud_assign_selectBox-cont label').filter(function () {
                    return $(this).css('display') !== 'none';
                }).length;

                $(".no-results").toggle(!isMatch);
                $(".cc").toggle(isMatch);
            }

            var ccs = $('.stud_assign_selectBox-cont label').filter(function () {
                return $(this).css('display') !== 'none';
            }).length;

        }
    });
});


$('body').on('click', '.abba_add_student_parent', function () {

    var abba_campus_id = $('#abba_parent_camp').val();

    var parent_id = $('#abba_parent_id_holder').val();
    
    var parent_span = $('#abba_parent_span').val();

    var abba_class_id = $('#abba_display_assign_class option:selected').val();

    var abba_get_multi_student_id = [];

    $.each($("input[name='assigned_student']:checked"), function () {
        abba_get_multi_student_id.push($(this).val());
    });

    var dataString = '&abba_campus_id=' + abba_campus_id + '&parent_id=' + parent_id + '&abba_class_id=' + abba_class_id + '&parent_span=' + parent_span + '&abba_get_multi_student_id=' + abba_get_multi_student_id;

    if(abba_get_multi_student_id.length < 1){
        $.wnoty({
            type: 'error',
            message: "Please selected a student to proceed.",
            autohideDelay: 5000
        });
    }
    else{
        var kidnum = parseInt($('.'+parent_span).text()) + parseInt(abba_get_multi_student_id.length);

        $('.'+parent_span).text(kidnum);

        $('.abba_add_student_parent').html('<i class="fas fa-spinner fa-spin"></i>');

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba-assign-student.php",
            data: dataString,
            //cache: false,
            success: function (output) 
            {
    
                // alert(output);
    
                $('.abba_add_student_parent').html('<i class="fas fa-link"> Assign </i>');
    
                $.wnoty({
                    type: 'success',
                    message: "Assigned Successfully.",
                    autohideDelay: 5000
                });
    
                $('#abba_display_student_for_assign').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
    
                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/abba-get-student_to_assign.php",
                    data: dataString,
                    //cache: false,
                    success: function (output) {
                        // alert(output);
                        $('#abba_display_student_for_assign').html(output);
                        // Search parent
                        $("body").on("keyup", ".abba_stud_assign_search", function () {
                            var val = $(this).val();
                            filter(val.toLowerCase());
                        });
    
                        $("body").on("paste", ".abba_stud_assign_search", function () {
                            var element = this;
                            setTimeout(function () {
                                var text = $(element).val().toLowerCase();
                                filter(text);
                            }, 100);
                        });
    
                        function filter(x) {
                            var isMatch = false;
                            $(".stud_assign_selectBox-cont .stud_assign_card_search_get").each(function (i) {
                                var content = $(this).html();
    
                                if (content.toLowerCase().indexOf(x) == -1) {
                                    $(this).hide();
                                } else {
                                    isMatch = true;
                                    $(this).show();
    
                                }
                            });
    
                            var ccs = $('.stud_assign_selectBox-cont label').filter(function () {
                                return $(this).css('display') !== 'none';
                            }).length;
    
                            $(".no-results").toggle(!isMatch);
                            $(".cc").toggle(isMatch);
                        }
    
                        var ccs = $('.stud_assign_selectBox-cont label').filter(function () {
                            return $(this).css('display') !== 'none';
                        }).length;
    
                        $('#display_my_kids').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
    
                        $.ajax({
                            type: "POST",
                            url: "../../controller/scripts/owner/abba_display_my_kids.php",
                            data: dataString,
                            cache: false,
                
                            success: function (result) {
                                
                                $('#display_my_kids').html(result);
                            }
                        });
                    }
                });
            }
        });
    }

    
});


// promote single student
$('body').on('click', '.abba_promote_pre_btn', function () {
    
    var campus_id = $('#abba_display_student_campus option:selected').val();
    
    var section_id = $('#abba_display_section option:selected').val();
    
    var class_id = $('#abba_display_class option:selected').val();
    
    var data_type = $(this).data('type');
    
    if(campus_id == '' || campus_id == 'NULL' || campus_id == '0')
    {
        $.wnoty({
            type: 'error',
            message: "Please select a Campus, Section and Class to proceed.",
            autohideDelay: 5000
        });
    }
    else if(section_id == '' || section_id == 'NULL' || section_id == '0')
    {
        $.wnoty({
            type: 'error',
            message: "Please select a Section and Class to proceed.",
            autohideDelay: 5000
        });
    }
    else if(class_id == '' || class_id == 'NULL' || class_id == '0')
    {
        $.wnoty({
            type: 'error',
            message: "Please select a Class to proceed.",
            autohideDelay: 5000
        });
    }
    else
    {
        
        // alert(data_type);
        
        if(data_type == 'multiple')
        {
            
        }
        else
        {
            $("#abba_select_all_students").prop('checked', false);
            $(".abba_student_checkbox").prop('checked', false);
            
            $("#abba_student_total_selected").fadeOut("slow");
            
        }
        
        $('#abba_get_promote_section').val('NULL');
        $('#abba_display_promote_class').html("<option value='NULL'>Select Class</option>");
        
        $('#abba_promote_stud_staticBackdrop').modal('show');
    
        var abba_get_student_checkbox_id = $(this).data('checkbox');
    
        $("#" + abba_get_student_checkbox_id).prop('checked', true);
    
        if ($('.abba_student_checkbox:checked').length == $('.abba_student_checkbox').length) 
        {
            $("#abba_select_all_students").prop('checked', true);
            var selTotal = $('.abba_student_checkbox:checked').length;
    
            if (selTotal > 0) {
                $('#abba_student_total_selected_for_promote').html('(' + selTotal + ' <i class="fas fa-trophy"> Promote Student</i>)');
                $("#abba_student_total_selected_for_promote").fadeIn("slow");
            }
            else {
                $("#abba_student_total_selected_for_promote").fadeOut("slow");
            }
    
        }
        else if ($('.abba_student_checkbox:checked').length != $('.abba_student_checkbox').length) {
            $("#abba_select_all_students").prop('checked', false);
            var selTotal = $('.abba_student_checkbox:checked').length;
    
            if (selTotal > 0) {
                $('#abba_student_total_selected_for_promote').html('(' + selTotal + ' <i class="fas fa-trophy"> Promote Student</i>)');
                $("#abba_student_total_selected_for_promote").fadeIn("slow");
            }
            else {
                $("#abba_student_total_selected_for_promote").fadeOut("slow");
            }
        }
        
    }
    
});

// change of section
$('body').on('change', '#abba_get_promote_section', function () {
    
    $('#abba_display_promote_class').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');

    var abba_campus_id = $('#abba_display_student_campus option:selected').val();

    var abba_section_id = $('#abba_get_promote_section option:selected').val();

    var dataString = 'abba_campus_id=' + abba_campus_id + '&abba_section_id=' + abba_section_id;

    // alert(dataString);

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba-get-class.php",
        data: dataString,
        //cache: false,
        success: function (output) {
            // alert(output);
            $('#abba_display_promote_class').html(output);

        }
    });

});

$('body').on('click', '#abba_proceed_to_promote_student', function () {
    
    var abba_campus_id = $('#abba_display_student_campus option:selected').val();

    var abba_class_id = $('#abba_display_promote_class option:selected').val();

    var abba_section_id = $('#abba_get_promote_section option:selected').val();

    var abba_session_id = $('#abba_get_promote_session option:selected').val();

    var abba_student_id = [];

    $.each($("input[name='abba_get_multi_student_id']:checked"), function () {
        abba_student_id.push($(this).val());
        
    });
      
    if(abba_student_id.length < 1)
    {
        $.wnoty({
            type: 'error',
            message: "Please select a student to proceed",
            autohideDelay: 5000
        });
    }
    else
    {
        if(abba_session_id == '' || abba_session_id == 'NULL' || abba_session_id == '0' || abba_section_id == '' || abba_section_id == 'NULL' || abba_section_id == '0' || abba_class_id == '' || abba_class_id == 'NULL' || abba_class_id == '0')
        {
            $.wnoty({
                type: 'error',
                message: "Please select Session, Section and Class to proceed",
                autohideDelay: 5000
            });
        }
        else
        {
            
            $('#abba_proceed_to_promote_student').html('<i class="fa fa-spinner fa-spin"></i>');
            
            var dataString = 'abba_campus_id=' + abba_campus_id + '&abba_section_id=' + abba_section_id + '&abba_class_id=' + abba_class_id + '&abba_student_id=' + abba_student_id + '&abba_session_id=' + abba_session_id;
        
            // alert(dataString);
        
            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/administration/abba-promote-student.php",
                data: dataString,
                //cache: false,
                success: function (output) {
                    
                    $.wnoty({
                        type: 'success',
                        message: output,
                        autohideDelay: 5000
                    });
                    
                    $('#abba_proceed_to_promote_student').html('<i class="fas fa-trophy"> Yes Promote</i>');
        
                }
            });
        }
        
    }
    
});