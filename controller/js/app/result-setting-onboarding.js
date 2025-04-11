// function to get campus
function abba_get_campus() {

    $('#abba_display_campus').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');
    
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
            
        }
    });

}


$(document).ready(function () {

    var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");
    
    abba_get_campus();

    $('#abba_display_ca_campus').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba-get_campus_for_result.php",
        data: { abba_instituion_id: abba_get_stored_instituion_id },
        //cache: false,
        success: function (output)
        {

            $('#abba_display_ca_campus').html(output);

            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/abba-check_ca_gs_rt.php",
                data: { abba_instituion_id: abba_get_stored_instituion_id },
                //cache: false,
                success: function (data) {

                    // alert(data);

                    // ca-gs-rt(meaning CA Setting, grading structure and result type has not been set)
                    // ca-rt(meaning CA Setting and result type has not been set)
                    // gs-rt(meaning grading structure and result type has not been set)
                    // ca-gs(meaning CA Setting and grading structure has not been set)
                    // rt(meaning result type has not been set)
                    // ca(meaning CA Setting has not been set)
                    // gs(meaning grading structure has not been set)

                    if (data == 'ca-gs') {
                        $('#caonboardingModal').modal('show');

                        localStorage.setItem('ca', '0');
                        localStorage.setItem('gs', '0');
                    }
                    else if (data == 'ca') {
                        $('#caonboardingModal').modal('show');

                        localStorage.setItem('ca', '0');
                    }
                    else if (data == 'gs') {
                        $('#gsonboardingModal').modal('show');

                        localStorage.setItem('gs', '0');
                    }
                    else {
                        localStorage.removeItem('ca');
                        localStorage.removeItem('gs');

                    }
                    // alert(output);

                    $(document).ready(function () {
                        // hidden things
                        $(".form-business").hide();
                        // next button
                        $(".next").on({
                            click: function () {
                                // select any card
                                var getValue = $(this).parents(".row").find(".abba_card").hasClass("active-card");

                                var campus_id = $('.active-card').data('id');

                                alert($campus_id);

                                if (getValue) {

                                    $('#abba_display_section').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

                                    $.ajax({
                                        type: "POST",
                                        url: "../../controller/scripts/owner/abba-get_campus_sections.php",
                                        data: { campus_id: campus_id },
                                        //cache: false,
                                        success: function (outputdata) {

                                            $('#abba_display_section').html(outputdata);

                                            $(".section-dis-card").each(function (index) {

                                                var section_id = $(this).data('id');

                                                var ca_numb_cnt_id = $(this).data('canumb');

                                                var ca_numb_cntLS = localStorage.getItem(ca_numb_cnt_id);

                                                if (ca_numb_cntLS == null || ca_numb_cntLS == 'null' || ca_numb_cntLS == '') {
                                                    var ca_numb_cnt = parseInt($('#' + ca_numb_cnt_id).val());

                                                }
                                                else {
                                                    var ca_numb_cnt = parseInt(localStorage.getItem(ca_numb_cnt_id));
                                                }

                                                $('#' + ca_numb_cnt_id).val(ca_numb_cnt);

                                                for (var i = 1; i <= ca_numb_cnt; i++) {

                                                    $('.abba_ca_div_' + i, this).show();

                                                    var caname = $('#' + section_id + 'abbaca' + i + 'id').val();
                                                    var cascore = $('#' + section_id + 'abbaca' + i + 'maxid').val();
                                                    var camidterm = $('input[name="' + section_id + 'selForMidTerm' + i + '"]:checked').data('id');

                                                    var canameLS = localStorage.getItem('#' + section_id + 'abbaca' + i + 'id');

                                                    var cascoreLS = localStorage.getItem('#' + section_id + 'abbaca' + i + 'maxid');

                                                    var camidtermLS = localStorage.getItem(section_id + 'selForMidTerm' + i);

                                                    // alert(cascoreLS);

                                                    if (canameLS == 'null' || canameLS == '' || canameLS == '0' || canameLS == null || canameLS == 'undefined') {
                                                        localStorage.setItem('#' + section_id + 'abbaca' + i + 'id', caname);
                                                    }
                                                    else {
                                                        $('#' + section_id + 'abbaca' + i + 'id').val(canameLS);
                                                    }


                                                    if (cascoreLS == 'null' || cascoreLS == '' || cascoreLS == '0' || cascoreLS == null || cascoreLS == 'undefined') {
                                                        localStorage.setItem('#' + section_id + 'abbaca' + i + 'maxid', cascore);
                                                    }
                                                    else {
                                                        $('#' + section_id + 'abbaca' + i + 'maxid').val(cascoreLS);
                                                    }


                                                    if (camidtermLS == 'null' || camidtermLS == '' || camidtermLS == null || camidtermLS == 'undefined') {
                                                        localStorage.setItem(section_id + 'selForMidTerm' + i, camidterm);
                                                    }
                                                    else {
                                                        if (camidtermLS == 0) {
                                                            $('input[name="' + section_id + 'selForMidTerm' + i + '"]').prop('checked', false);
                                                        }
                                                        else {
                                                            $('input[name="' + section_id + 'selForMidTerm' + i + '"]').prop('checked', true);
                                                        }

                                                    }

                                                }
                                            });

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
                        $(".ca-submit-button").on({
                            click: function () {

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

                                            $(".ca-submit-button").parents(".row").fadeOut("slow", function () {
                                                $(this).next(".row").fadeIn("slow");
                                            });

                                            $(".ca-submit-button").html('<i class="fas fa"> Submit</i> <i class="fas fa-angle-right"> </i>');

                                            $(".ca-submit-button").prop('disabled', false);

                                            abba_get_section_for_display();

                                            $(".section-dis-card").each(function (index) {

                                                var section_id = $(this).data('id');

                                                var ca_numb_cnt_id = $(this).data('canumb');

                                                localStorage.removeItem(ca_numb_cnt_id);

                                                var ca_numb_cnt = parseInt($('#' + ca_numb_cnt_id).val());

                                                for (var i = 1; i <= ca_numb_cnt; i++) {

                                                    $('.abba_ca_div_' + i, this).show();

                                                    localStorage.removeItem('#' + section_id + 'abbaca' + i + 'id');

                                                    localStorage.removeItem('#' + section_id + 'abbaca' + i + 'maxid');

                                                    localStorage.removeItem(section_id + 'selForMidTerm' + i);
                                                }
                                            });


                                            $('#abba_create_ca_Modal').modal('hide');


                                            $.wnoty({
                                                type: 'success',
                                                message: "Hurray, C.As has been created successfully",
                                                autohideDelay: 5000
                                            });


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

        }
    });
    
    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba-get_campus_gs.php",
        data: { abba_instituion_id: abba_get_stored_instituion_id },
        //cache: false,
        success: function (output) {

            // alert(output)

            $('#abba_display_gs_for_inst').html(output);

            $('.display_abba_gs_list').html(output);

            $(document).ready(function () {
                // hidden things
                $(".gs-form-business").hide();
                // next button
                $(".gs-next").on({
                    click: function () {
                        // select any card
                        var getValue = $(this).parents(".row").find(".gs-abba_card").hasClass("gs-active-card");

                        if (getValue) {

                            $(this).parents(".row").fadeOut("slow", function () {
                                $(this).next(".row").fadeIn("slow");
                            });

                        }
                        else {
                            $.wnoty({
                                type: 'warning',
                                message: "Hey, you need to add a grading structure.",
                                autohideDelay: 5000
                            });
                        }
                    }
                });

                // back button
                $(".gs-back").on({
                    click: function () {
                        $("#progressBar .active").last().removeClass("active");
                        $(this).parents(".row").fadeOut("slow", function () {
                            $(this).prev(".row").fadeIn("slow");
                        });
                    }
                });
                //finish button
                $(".gs-next-button").on({
                    click: function () {

                        $(".gs-next-button").parents(".row").fadeOut("slow", function () {
                            $(this).next(".row").fadeIn("slow");
                        });
                    }
                });

                //Active card on click function
                $(".gs-abba_card").on({
                    click: function () {
                        $(this).toggleClass("gs-active-card");
                        $(this).parent(".col").siblings().children(".gs-abba_card").removeClass("gs-active-card");
                    }
                });
            });

        }
    });

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba-get_campus_rt.php",
        data: { abba_instituion_id: abba_get_stored_instituion_id },
        //cache: false,
        success: function (output) {

            $('.display_abba_rs_list').html(output);

        }
    });

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba-get_gs_template.php",
        data: { abba_instituion_id: abba_get_stored_instituion_id },
        //cache: false,
        success: function (output) {

            // alert(output)

            $('#abba_show_gs_template').html(output);

        }
    });
});


$('body').on('change', '.abba_general_ca_select', function () {

    $('.abba_ca_div_all').hide('slow');

    $(".section-dis-card").each(function (index) {

        var section_id = $(this).data('id');

        var ca_numb_cnt_id = $(this).data('canumb');

        localStorage.setItem(ca_numb_cnt_id, parseInt($('#' + ca_numb_cnt_id).val()));

        var ca_numb_cnt = parseInt($('#' + ca_numb_cnt_id).val());

        for (var i = 1; i <= ca_numb_cnt; i++) {

            $('.abba_ca_div_' + i, this).show();

            var caname = $('#' + section_id + 'abbaca' + i + 'id').val();
            var cascore = $('#' + section_id + 'abbaca' + i + 'maxid').val();
            var camidterm = $('input[name="' + section_id + 'selForMidTerm' + i + '"]:checked').data('id');

            var canameLS = localStorage.getItem('#' + section_id + 'abbaca' + i + 'id');

            var cascoreLS = localStorage.getItem('#' + section_id + 'abbaca' + i + 'maxid');

            var camidtermLS = localStorage.getItem(section_id + 'selForMidTerm' + i);

            // alert(caname+' '+cascore+' '+camidterm);

            if (canameLS == 'null' || canameLS == '' || canameLS == '0' || canameLS == null || canameLS == 'undefined') {
                localStorage.setItem('#' + section_id + 'abbaca' + i + 'id', caname);
            }
            else {
                $('#' + section_id + 'abbaca' + i + 'id').val(canameLS);
            }


            if (cascoreLS == 'null' || cascoreLS == '' || cascoreLS == '0' || cascoreLS == null || cascoreLS == 'undefined') {
                localStorage.setItem('#' + section_id + 'abbaca' + i + 'maxid', cascore);
            }
            else {
                $('#' + section_id + 'abbaca' + i + 'maxid').val();
            }


            if (camidtermLS == 'null' || camidtermLS == '' || camidtermLS == null || camidtermLS == 'undefined') {
                localStorage.setItem(section_id + 'selForMidTerm' + i, camidterm);
            }
            else {
                if (camidtermLS == 0) {
                    $('input[name="' + section_id + 'selForMidTerm' + i + '"]').prop('checked', false);
                }
                else {
                    $('input[name="' + section_id + 'selForMidTerm' + i + '"]').prop('checked', true);
                }

            }

        }
    });
});


$('body').on('input', '.abba_input_checker', function () {

    var inputid = $(this).attr('id');

    var inputvalue = $(this).val();

    localStorage.setItem('#' + inputid, inputvalue);

    // alert(inputid+' '+inputvalue);

});


$('body').on('change', '.form-check-input', function () {


    var radioid = $(this).attr('name');

    var radioidvalue = $('input[name="' + radioid + '"]:checked').data('id');

    if (radioidvalue == 'undefined' || radioidvalue == undefined || radioidvalue == null || radioidvalue == 'null') {
        localStorage.setItem(radioid, 0);
    }
    else {
        localStorage.setItem(radioid, radioidvalue);
    }

});

$('body').on('click', '#config-tab-2', function () {

    // alert('working');

    if (localStorage.getItem('gs') == '0') {
        
    }
    else {
        
        $('#gsonboardingModal').modal('show');

    }
});

$(document).ready(function () {
    // Open Second Modal
    $('body').on('click', '#create-gs-modal', function () {
        $('#abba_create_gs_Modal').modal('show');
        $('#gsonboardingModal2').css('z-index', 1040); // Increase z-index of first modal

        var from_edit_or_create_id = $(this).data('id');

        var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");

        $('#abba_show_gs_edit_create').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba_add_gs_or_edit_gs.php",
            data: { abba_instituion_id: abba_get_stored_instituion_id, from_edit_or_create_id: from_edit_or_create_id },
            //cache: false,
            success: function (output) {

                $('#abba_show_gs_edit_create').html(output);

                if(from_edit_or_create_id > 0)
                {
                    $('.create-gs_tem-modal').hide();
                }
                else{
                    $('.create-gs_tem-modal').show();
                }

                var rowCount = $(".removeappendform").length;

                if (rowCount > 1) {
                    $(".removeappendform").show('slow');
                }
                else {
                    $(".removeappendform").hide('slow');
                }

            }
        });
    });

    // Reset z-index of first modal when second modal is closed
    $('#abba_create_gs_Modal').on('hidden.bs.modal', function () {
        $('#gsonboardingModal2').css('z-index', 1050); // Reset z-index of first modal
    });
});


$(document).ready(function () {
    $('body').on('click', '#create-gs_tem-modal', function () {
        
        var btnclicked = $(this).data('where');

        // alert(btnclicked);

        $('#hold_btn_where').val(btnclicked);
        
        if($(this).data('id') == 1)
        {
            $('#abba_create_gs_template_Modal').modal('show');
            $('#abba_create_gs_Modal').css('z-index', 1040); // Increase z-index of first modal
    
            // Reset z-index of first modal when second modal is closed
            $('#abba_create_gs_template_Modal').on('hidden.bs.modal', function () {
                $('#gsonboardingModal2').css('z-index', 1040);
                $('#abba_create_gs_Modal').css('z-index', 1050);// Reset z-index of first modal
    
                $('#abba_create_gs_Modal').on('hidden.bs.modal', function () {
                    $('#gsonboardingModal2').css('z-index', 1050);// Reset z-index of first modal
                });
            });
        }
        else{
            $('#abba_create_gs_template_Modal').modal('show');
            $('#gsonboardingModal2').css('z-index', 1040); // Increase z-index of first modal

            // Reset z-index of first modal when second modal is closed
            $('#abba_create_gs_template_Modal').on('hidden.bs.modal', function () {
                $('#gsonboardingModal2').css('z-index', 1050); // Reset z-index of first modal
            });
        }
        
    });
});


$('body').on('click', '.gs-template-submit-button', function () {

    var selectedTemplate = $('input[name="gstemplate"]:checked').val();

    var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");

    var hold_btn_where = $('#hold_btn_where').val();

    $('.gs-template-submit-button').html('<i class="fas fa-spinner fa-spin fs-6"></i> Submitting..');

    if(hold_btn_where == 'create')
    {
        var checkedRadio = $('input[name="gstemplate"]:checked');

        var label = checkedRadio.closest('label');

        var gradingtitle = label.find('#create'+selectedTemplate).val();

        $('#formtoappend').html('');

        var gs_numb_cnt = parseInt(label.find('#create_row_cnt'+selectedTemplate).val());

        $('.methodmaintitle').val(gradingtitle);

        for (var i = 1; i <= gs_numb_cnt; i++) {

            $("#formtoappend").append('<div class="row mt-3"><div class="col-3"><div class="form-group"><label><small>Start</small></label><input type="number"  class="form-control form-control-sm rangestartval gs-gen-input gs-rstart-input-'+i+'" placeholder="80"></div></div><div class="col-3"><div class="form-group"><label><small>End</small></label><input type="number"  class="form-control form-control-sm rangeendval gs-gen-input gs-rend-input-'+i+'" placeholder="90.99"> </div></div><div class="col-2"><div class="form-group"><label><small>Grade</small></label><input type="text"  class="form-control form-control-sm gradeval gs-gen-input gs-grade-input-'+i+'" placeholder="A"> </div></div><div class="col-3"><div class="form-group"><label><small>Remark</small></label><input type="text"  class="form-control form-control-sm remarkval gs-gen-input gs-remark-input-'+i+'" placeholder="Excellent"> </div></div><div class="col-1 removeappendform"><i class="fa fa-trash fs-6 text-danger mt-4" style="cursor:pointer;"></i></div></div>');

            var rangestart = label.find('#create_rangestart'+selectedTemplate+''+i).val();

            var rangeend = label.find('#create_rangeend'+selectedTemplate+''+i).val();

            var grade = label.find('#create_grade'+selectedTemplate+''+i).val();

            var remark = label.find('#create_remark'+selectedTemplate+''+i).val();

            $('.gs-rstart-input-'+i).val(rangestart);

            $('.gs-rend-input-'+i).val(rangeend);

            $('.gs-grade-input-'+i).val(grade);

            $('.gs-remark-input-'+i).val(remark);

        }

        var rowCount = $(".removeappendform").length;

        if (rowCount > 1) {
            $(".removeappendform").show('slow');
        }
        else {
            $(".removeappendform").hide('slow');
        }

        $('#abba_create_gs_template_Modal').modal('hide');

        $('.gs-template-submit-button').html('<i class="fas fa"> Submit</i> <i class="fas fa-angle-right"> </i>');

    }
    else{
        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba_add_gs_template_to_inst.php",
            data: { abba_instituion_id: abba_get_stored_instituion_id, selectedTemplate: selectedTemplate },
            //cache: false,
            success: function (output) {
    
                // alert(output)

                $('#abba_create_gs_template_Modal').modal('hide');
    
                if (output == '0') {
                    $.wnoty({
                        type: 'warning',
                        message: "Oops, seems like this grading title already exist",
                        autohideDelay: 5000
                    });
                }
                else {
                    $.wnoty({
                        type: 'success',
                        message: "Hurray, Template added successfully",
                        autohideDelay: 5000
                    });
    
                }
    
                $('.gs-template-submit-button').html('<i class="fas fa"> Submit</i> <i class="fas fa-angle-right"> </i>');

                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/abba-get_campus_gs.php",
                    data: { abba_instituion_id: abba_get_stored_instituion_id },
                    //cache: false,
                    success: function (output) {
    
                        // alert(output)
    
                        $('#abba_display_gs_for_inst').html(output);

                        $('.display_abba_gs_list').html(output);
    
                    }
                });
                
            }
        });
    }
});

$("body").on("click", "#appendform", function () {

    $("#formtoappend").append('<div class="row mt-3"><div class="col-3"><div class="form-group"><label><small>Start</small></label><input type="number"  class="form-control form-control-sm rangestartval gs-gen-input" placeholder="80"></div></div><div class="col-3"><div class="form-group"><label><small>End</small></label><input type="number"  class="form-control form-control-sm rangeendval gs-gen-input" placeholder="90.99"> </div></div><div class="col-2"><div class="form-group"><label><small>Grade</small></label><input type="text"  class="form-control form-control-sm gradeval gs-gen-input" placeholder="A"> </div></div><div class="col-3"><div class="form-group"><label><small>Remark</small></label><input type="text"  class="form-control form-control-sm remarkval gs-gen-input" placeholder="Excellent"> </div></div><div class="col-1 removeappendform"><i class="fa fa-trash fs-6 text-danger mt-4" style="cursor:pointer;"></i></div></div>');

    var rowCount = $(".removeappendform").length;

    if (rowCount > 1) {
        $(".removeappendform").show('slow');
    }
    else {
        $(".removeappendform").hide('slow');
    }
});

$("body").on("click", ".removeappendform", function () {

    $(this).closest(".row").remove();

    var rowCount = $(".removeappendform").length;

    if (rowCount > 1) {
        $(".removeappendform").show('slow');
    }
    else {
        $(".removeappendform").hide('slow');
    }
});


$("body").on("click", ".gs-submit-button", function () {

    var methodtitle = $('.methodmaintitle').val();

    var creat_or_edit_checker = $('#creat_or_edit_checker').val();

    var abba_get_instituion_id = localStorage.getItem("abba-stored-institution-id");

    $(this).html('<i class="fas fa-spinner fa-spin fs-6"></i> Submitting..');
    var gradearray = [];
    var rangestartarray = [];
    var rangeendarray = [];
    var remarkarray = [];


    $.each($(".gradeval"), function () {
        gradearray.push(encodeURIComponent($(this).val()));
    });

    $.each($(".rangestartval"), function () {
        rangestartarray.push($(this).val());
    });

    $.each($(".rangeendval"), function () {
        rangeendarray.push($(this).val());
    });

    $.each($(".remarkval"), function () {
        remarkarray.push($(this).val());
    });

    var arrlength = $(gradearray).length;

    var allFieldsValid = true;

    $(".gs-gen-input").each(function (index) {

        var inputval = $(this).val();

        if (inputval == '') {
            $(this).css('border', '2px solid red');

            allFieldsValid = false;
            return false; // Exit the loop early
        }
        else{
            $(this).css('border', '1px solid green');
        }
    });

    if (allFieldsValid) {

        $('.gs-gen-input').css('border', '1px solid green');

        $.ajax({

            method: 'post',
            url: '../../controller/scripts/owner/abba_final_insert_gs.php',
            data: 'gradearray=' + gradearray + '&arrlength=' + arrlength + '&methodtitle=' + methodtitle + '&rangestartarray=' + rangestartarray + '&rangeendarray=' + rangeendarray + '&remarkarray=' + remarkarray + '&abba_get_instituion_id=' + abba_get_instituion_id + '&creat_or_edit_checker=' + creat_or_edit_checker,
            cache: false,
            success: function (outputdata) {

                // alert(outputdata);
                $('#abba_create_gs_Modal').modal('hide');
                
                if(outputdata == 0)
                {
                    $.wnoty({
                        type: 'warning',
                        message: "Oops, the grading structure title you entered already exist",
                        autohideDelay: 5000
                    });
        
                }
                else{

                    $.wnoty({
                        type: 'success',
                        message: "Hurray, Grading structure added successfully",
                        autohideDelay: 5000
                    });


                    $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/abba-get_campus_gs.php",
                        data: { abba_instituion_id: abba_get_instituion_id },
                        //cache: false,
                        success: function (output) {
        
                            // alert(output)
        
                            $('#abba_display_gs_for_inst').html(output);

                            $('.display_abba_gs_list').html(output);
        
                        }
                    });
        
                }
                
                $(".gs-submit-button").html('<i class="fas fa"> Submit</i> <i class="fas fa-angle-right"> </i>');
            }
        });
    }
    else {
        $.wnoty({
            type: 'error',
            message: "Hey, no field should be left empty",
            autohideDelay: 5000
        });


        $(".gs-submit-button").html('<i class="fas fa"> Submit</i> <i class="fas fa-angle-right"> </i>');
    }
});

$("body").on("click", "#delete-gs-modal", function () {

    var gradeid = $(this).data('id');

    var abba_get_instituion_id = localStorage.getItem("abba-stored-institution-id");

    $('#abba_delete_gs_Modal').modal('show');
    $('#gsonboardingModal2').css('z-index', 1040); // Increase z-index of first modal

    $("body").on("click", "#abba_proceed_to_delete_gs", function () {

        $.ajax({

            method: 'post',
            url: '../../controller/scripts/owner/abba_delete_inst_gs.php',
            data: 'gradeid=' + gradeid,
            cache: false,
            success: function (outputdata) {

                // alert(outputdata);

                $('#abba_delete_gs_Modal').modal('hide');

                $.wnoty({
                    type: 'success',
                    message: "Grading structure deleted successfully",
                    autohideDelay: 5000
                });

                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/abba-get_campus_gs.php",
                    data: { abba_instituion_id: abba_get_instituion_id },
                    //cache: false,
                    success: function (output) {
    
                        // alert(output)
    
                        $('#abba_display_gs_for_inst').html(output);

                        $('.display_abba_gs_list').html(output);
    
                    }
                });
                $(".gs-submit-button").html('<i class="fas fa"> Submit</i> <i class="fas fa-angle-right"> </i>');


            }
        });
    });

    // Reset z-index of first modal when second modal is closed
    $('#abba_delete_gs_Modal').on('hidden.bs.modal', function () {
        $('#gsonboardingModal2').css('z-index', 1050);// Reset z-index of first modal

    });
});