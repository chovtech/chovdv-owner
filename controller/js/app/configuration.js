$(document).ready(function () {
    var url = new URL(window.location.href);

    // Get the value of a parameter named "paramName"
    var paramValue = url.searchParams.get("tab");

    // Check if the parameter value exists
    if (paramValue) {
        // Parameter value exists
        $('[href="#' + paramValue + '"]').tab('show');

        localStorage.setItem('lastresltsetTab', '#'+paramValue);

    }
});

function abba_get_section_for_display() {
    
    $('.display_abba_section_list').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

    var campus_id = $('#abba_display_campus').val();

    var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");
    // alert(campus_id);

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba-get_campus_sections_display.php",
        data: { campus_id: campus_id, abba_get_instituion_id: abba_get_stored_instituion_id },
        //cache: false,
        success: function (outputdata) {
            // alert(outputdata);
            $('.display_abba_section_list').html(outputdata);
        }
    });
}

$(document).ready(function () {
    abba_get_section_for_display();
});

$('body').on('change', '#abba_display_campus', function () {
    abba_get_section_for_display();
});


$('body').on('click', '.abba_edit_section_ca', function () {
    var section_id = $(this).data('id');
    var campus_id = $(this).data('campusid');

    // alert(section_id+' '+campus_id);

    $('#abba_show_section_ca_edit').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba-get_campus_sections_ca_display.php",
        data: { campus_id: campus_id, section_id: section_id },
        //cache: false,
        success: function (outputdata) {
            // alert(outputdata);
            $('#abba_show_section_ca_edit').html(outputdata);

            $(".section-dis-card").each(function (index) {

                var section_id = $(this).data('id');

                var ca_numb_cnt_id = $(this).data('canumb');

                var ca_numb_cnt = parseInt($('#' + ca_numb_cnt_id).val());

                for (var i = 1; i <= ca_numb_cnt; i++) {

                    $('.abba_ca_div_' + i, this).show();

                }
            });
        }
    });
});

$('body').on('change', '.abba_general_ca_select', function () {

    $('.abba_ca_div_all').hide('slow');

    $(".section-dis-card").each(function (index) {

        var ca_numb_cnt_id = $(this).data('canumb');

        var ca_numb_cnt = parseInt($('#' + ca_numb_cnt_id).val());

        for (var i = ca_numb_cnt; i > 0; i--) {

            $('.abba_ca_div_' + i, this).show('slow');

        }
    });

});

//finish button
$('body').on('click', '.ca-submit-button', function () {

    var allFieldsValid = true;

    var getcardid = '';

    var getcardclass = '';

    var inputfileid1 = '';

    var inputfileid2 = '';

    var inputfileid1val = '';

    var inputfileid2val = '';

    $(".section-dis-card").each(function (index) {

        var section_id = $(this).data('id');

        var ca_numb_cnt_id = $(this).data('canumb');

        var carduniqueclass = $('uniqueclass' + section_id).data('uniqueclass');

        var ca_numb_cnt = parseInt($('#' + ca_numb_cnt_id).val());

        for (var i = 1; i <= ca_numb_cnt; i++) {

            var canamecheck = $('#' + section_id + 'abbaca' + i + 'id').val();

            var cascorecheck = $('#' + section_id + 'abbaca' + i + 'maxid').val();

            // alert(canamecheck + '' + cascorecheck);

            // Check if the input is empty or equals to 0
            if (canamecheck == '' || canamecheck == '0' || cascorecheck == '' || cascorecheck == '0') {

                allFieldsValid = false;

                getcardid = 'ac-' + section_id;

                getcardclass = carduniqueclass;

                inputfileid1 = section_id + 'abbaca' + i + 'id';

                inputfileid2 = section_id + 'abbaca' + i + 'maxid';

                inputfileid1val = canamecheck;

                inputfileid2val = cascorecheck;

                return false; // Exit the loop early
            }

        else{
            $('#' + section_id + 'abbaca' + i + 'id').css('border', '1px solid green');

            $('#' + section_id + 'abbaca' + i + 'maxid').css('border', '1px solid green');
        }

        }
    });


    if (allFieldsValid) {

        $('.abba_input_checker').css('border', '1px solid green');

        $('.abba_general_ca_select').css('border', '1px solid green');

        $(this).html('<i class="fas fa-spinner fa-spin"></i> <i class="fas fa"> Submitting...</i>');

        $(this).prop('disabled', true);

        var campus_id = $('.active-card').data('id');

        var data = {};

        $(".section-dis-card").each(function (index) {

            var section_id = $(this).data('id');

            var ca_numb_cnt_id = $(this).data('canumb');

            var ca_numb_cnt = parseInt($('#' + ca_numb_cnt_id).val());

            var sectionObj = {};

            // Loop through cas in each section
            for (var i = 1; i <= ca_numb_cnt; i++) {

                var caname = $('#' + section_id + 'abbaca' + i + 'id').val();
                var cascore = $('#' + section_id + 'abbaca' + i + 'maxid').val();
                var camidterm = $('input[name="' + section_id + 'selForMidTerm' + i + '"]:checked').data('id');

                var caObj = {
                    name: caname,
                    score: cascore,
                    midterm: camidterm,
                };

                sectionObj["ca" + i] = caObj;
            }

            data[section_id] = sectionObj;
        });

        var jsonArray = JSON.stringify(data);

        console.log(jsonArray);

        // alert(campus_id+' '+data);

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba-insert_campus_sections_ca.php",
            data: { campus_id: campus_id, data: jsonArray },
            //cache: false,
            success: function (outputdataca) {

                // alert(outputdataca);

                $.wnoty({
                    type: 'success',
                    message: "Hurray, C.As has been created successfully",
                    autohideDelay: 5000
                });

                $(".submit-button").parents(".row").fadeOut("slow", function () {
                    $(this).next(".row").fadeIn("slow");
                });

                $(".submit-button").html('<i class="fas fa"> Submit</i> <i class="fas fa-angle-right"> </i>');

                $(".ca-submit-button").prop('disabled', false);
            }
        });

    }
    else {
        console.log('One or more input fields are empty or equal to 0.');

        $('#' + getcardid).prop('checked', true);

        if (inputfileid1val == '' || inputfileid1val == '0') {

            $('#' + inputfileid1).css('border', '2px solid red');
        }
        else {
            $('#' + inputfileid2).css('border', '2px solid red');
        }

    }
});

// remain in current main tab after reload
$(function () {

    $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
        localStorage.setItem('lastresltsetTab', $(this).attr('href'));
    });

    var lastresltsetTab = localStorage.getItem('lastresltsetTab');

    if (lastresltsetTab) {
        $('[href="' + lastresltsetTab + '"]').tab('show');
    }

});