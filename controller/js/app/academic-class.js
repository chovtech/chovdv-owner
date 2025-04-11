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

$(document).ready(function(){
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

    
    $('#abba_display_class_student_campus').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');
    
    $('#abba_display_class_result_student_campus').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');
    
    $('#abba_display_class_broadsheet_student_campus').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');
    
    $('#abba_display_class_behavioural_student_campus').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');

    $('#abba_display_view-result_student_campus').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');
    
    $('#abba_display_comments_student_campus').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');
    
    $('#abba_display_british_student_campus').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');
    
    $('#abba_display_campus_for_create_class').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');

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
            
            $('#abba_display_class_student_campus').html(output);
            
            $('#abba_display_class_result_student_campus').html(output);
            
            $('#abba_display_class_broadsheet_student_campus').html(output);
            
            $('#abba_display_class_behavioural_student_campus').html(output);

            $('#abba_display_view-result_student_campus').html(output);
            
            $('#abba_display_comments_student_campus').html(output);
            
            $('#abba_display_campus_for_create_class').html(output);

            $('#abba_display_british_student_campus').html(output);
    
        }
    });

}


// function to get student
function abba_get_class_students() {

    $('#pagination-container').hide();

    $('#abba_hide_student_filter').hide();

    $('#abba_display_class_students').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

    $('#abba_get_class_student_on_click').html('<i class="fas fa-circle-notch fa-spin"></i> Loading...');
    
    $('#total_classes').html('<i class="fas fa-circle-notch fa-spin"></i>');
    
    $('#total_teacher').html('<i class="fas fa-circle-notch fa-spin"></i>');

    // var abba_increase_students_per_page = $('#abba_increase_students_per_page option:selected').val();

    var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");

    var abba_campus_id = $('#abba_display_class_student_campus option:selected').val();

    var dataString = 'abba_instituion_id=' + abba_get_stored_instituion_id + '&abba_campus_id=' + abba_campus_id;

    // alert(dataString);

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba-get-class-students.php",
        data: dataString,
        //cache: false,
        success: function (output) {
            // alert(output);
            $('#abba_display_class_students').html(output);

            $('#abba_get_class_student_on_click').html('<i class="fas fa-circle-notch"></i> Load filter');
            
            $('#total_classes').html($('#hold_tot_class').val());
            
            $('#total_teacher').html($('#hold_tot_teach').val());

            // Helper function to sort the table based on a specific column
            function sortTable(table, columnIndex, ascending) {
                const tbody = table.tBodies[0];
                const rows = Array.from(tbody.querySelectorAll('tr'));

                rows.sort((a, b) => {
                    const cellA = a.querySelectorAll('td')[columnIndex].textContent.trim();
                    const cellB = b.querySelectorAll('td')[columnIndex].textContent.trim();

                    return ascending ? cellA.localeCompare(cellB) : cellB.localeCompare(cellA);
                });

                tbody.innerHTML = '';
                rows.forEach(row => tbody.appendChild(row));
            }

            // Helper function to filter the table based on the search input
            function filterTable(table, columnIndex, searchValue) {
                const tbody = table.tBodies[0];
                const rows = Array.from(tbody.querySelectorAll('tr'));

                rows.forEach(row => {
                    const cellText = row.querySelectorAll('td')[columnIndex].textContent.toLowerCase();
                    const isVisible = cellText.includes(searchValue.toLowerCase());
                    row.style.display = isVisible ? '' : 'none';
                });
            }

            // Sorting and Searching Initialization
            document.addEventListener('DOMContentLoaded', function () {
                const table = document.getElementById('table2');
                const headers = table.querySelectorAll('th');

                headers.forEach((header, index) => {
                    header.addEventListener('click', () => {
                        sortTable(table, index, true); // Initial sort ascending
                    });
                });

                const searchInput = document.getElementById('searchInput');
                searchInput.addEventListener('input', () => {
                    filterTable(table, 1, searchInput.value); // Search on the "Class Name" column (index 1)
                });
            });

        }
    });
}

$(document).ready(function () {
    abba_get_class_students();
});

$('body').on('click', '.showHideRow', function () {
    var row = $(this).data('id');

    $("#" + row).toggle();

    $("#" + row + "_eye").toggleClass("fa-eye fa-eye-slash");

});

$('body').on('click', '.create-acad-class-modal', function () {

    var btnclicked = $(this).data('id');

    var currentid = $(this).data('currentid');

    var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");

    var abba_campus_id = $(this).data('campus');

    $('#abba_show_acad_class_edit').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

    if (btnclicked == 1) {
        $('#abba_dis_title').html(' Update Form Teacher')
    }
    else if (btnclicked == 2) {
        $('#abba_dis_title').html(' Update Grading Structure')
    }
    else {
        $('#abba_dis_title').html(' Update Result Type')
    }

    var dataString = 'abba_instituion_id=' + abba_get_stored_instituion_id + '&abba_campus_id=' + abba_campus_id + '&btnclicked=' + btnclicked + '&currentid=' + currentid;

    // alert(dataString);

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba-get-acad-class-edit-content.php",
        data: dataString,
        //cache: false,
        success: function (output) {
            // alert(output);
            $('#abba_show_acad_class_edit').html(output);


            // Add event listener for search input
            // Search parent
            $("body").on("keyup", ".abba_class_stud_search", function () {
                var val = $(this).val();
                filter(val.toLowerCase());
            });
            
            $("body").on("paste", ".abba_class_stud_search", function () {
                var element = this;
                setTimeout(function () {
                    var text = $(element).val().toLowerCase();
                    filter(text);
                }, 100);
            });
            
            function filter(x) {
                var isMatch = false;
                $(".class_stud_selectBox-cont .class_stud_card_search_get").each(function (i) {
                    var content = $(this).html();
            
                    if (content.toLowerCase().indexOf(x) == -1) {
                        $(this).hide();
                    } else {
                        isMatch = true;
                        $(this).show();
            
                    }
                });
            
                var ccs = $('.class_stud_selectBox-cont label').filter(function () {
                    return $(this).css('display') !== 'none';
                }).length;
            
                $(".no-results").toggle(!isMatch);
                $(".cc").toggle(isMatch);
            }
            
            var ccs = $('.class_stud_selectBox-cont label').filter(function () {
                return $(this).css('display') !== 'none';
            }).length;
        }
    });
});


$('body').on('click', '.abba-class-stud-submit-button', function () {

    var ft_gs_rt_id = $("input[name='ft_gs_rt_id']:checked").val();

    var class_id = $("input[name='ft_gs_rt_id']:checked").data('class');

    var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");

    var abba_campus_id = $("input[name='ft_gs_rt_id']:checked").data('campus');

    var btnclicked = $("input[name='ft_gs_rt_id']:checked").data('btn');

    $('.abba-class-stud-submit-button').html('<i class="fas fa-circle-notch fa-spin"></i> Submitting..');

    var dataString = 'abba_instituion_id=' + abba_get_stored_instituion_id + '&abba_campus_id=' + abba_campus_id + '&btnclicked=' + btnclicked + '&class_id=' + class_id + '&ft_gs_rt_id=' + ft_gs_rt_id;

    // alert(dataString);

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba-update-acad-class-content.php",
        data: dataString,
        //cache: false,
        success: function (output) {
            // alert(output);
            // $('#abba_show_acad_class_edit').html(output);

            if (btnclicked == 1) {
                $.wnoty({
                    type: 'success',
                    message: "Hurray! the class form teacher has been updated successfully.",
                    autohideDelay: 5000
                });
            }
            else if (btnclicked == 2) {
                $.wnoty({
                    type: 'success',
                    message: "Hurray! the class grading structure has been updated successfully.",
                    autohideDelay: 5000
                });
            }
            else {
                $.wnoty({
                    type: 'success',
                    message: "Hurray! the class result type has been updated successfully.",
                    autohideDelay: 5000
                });
            }
            $('#abba_acad_class_Modal').modal('hide');
            
            $('.abba-class-stud-submit-button').html('<i class="fas fa"> Submit</i> <i class="fas fa-angle-right"> </i>');

            $('#abba_show_acad_class_edit').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

            var dataStringsec = 'abba_instituion_id=' + abba_get_stored_instituion_id + '&abba_campus_id=' + abba_campus_id + '&btnclicked=' + btnclicked + '&currentid=' + class_id;

            // alert(dataString);

            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/abba-get-acad-class-edit-content.php",
                data: dataStringsec,
                //cache: false,
                success: function (output) {
                    // alert(output);
                    $('#abba_show_acad_class_edit').html(output);

                }
            });

            abba_get_class_students();

        }
    });
});


$('body').on('change', '#abba_display_class_student_campus', function () {
    abba_get_class_students();
});


// Search parent
$("body").on("keyup", ".abba_class_stud_search", function () {
    var val = $(this).val();
    filter(val.toLowerCase());
});

$("body").on("paste", ".abba_class_stud_search", function () {
    var element = this;
    setTimeout(function () {
        var text = $(element).val().toLowerCase();
        filter(text);
    }, 100);
});

function filter(x) {
    var isMatch = false;
    $(".class_stud_selectBox-cont .class_stud_card_search_get").each(function (i) {
        var content = $(this).html();

        if (content.toLowerCase().indexOf(x) == -1) {
            $(this).hide();
        } else {
            isMatch = true;
            $(this).show();

        }
    });

    var ccs = $('.class_stud_selectBox-cont label').filter(function () {
        return $(this).css('display') !== 'none';
    }).length;

    $(".no-results").toggle(!isMatch);
    $(".cc").toggle(isMatch);
}

var ccs = $('.class_stud_selectBox-cont label').filter(function () {
    return $(this).css('display') !== 'none';
}).length;


// select all student checkbox
$("body").on("change", ".abba_select_all_students", function () {  //"select all" change 

    var checkStatus = $(this).prop('checked');

    var classlistclass = $(this).data('id');

    var classlistspan = $(this).data('span');

    if (checkStatus == true) {
        $("." + classlistclass).prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
        var selTotal = $('.' + classlistclass + ':checked').length;
        $('#' + classlistspan).html('(' + selTotal + ' <i class="fa fa-trash"></i>)');
        $("#" + classlistspan).fadeIn("slow");

    }
    else if (checkStatus == false) 
    {
        $("." + classlistclass).prop('checked', false); //change "select all" checked status to false
        var selTotal = $('.' + classlistclass + ':checked').length;
        $("#" + classlistspan).fadeOut("slow");
    }
});


// select single student checkbox
$('body').on('change', '.abba_student_checkbox', function () {

    var maincheck = $(this).data('maincheck');

    var classlistspan = $(this).data('span');

    var classlistunique = $(this).data('unique');

    if ($('.' + classlistunique + ':checked').length == $('.' + classlistunique).length) 
    {
        $("#" + maincheck).prop('checked', true);
        var selTotal = $('.' + classlistunique + ':checked').length;

        if (selTotal > 0) {
            $('#' + classlistspan).html('(' + selTotal + ' <i class="fa fa-trash"></i>)');
            $("#" + classlistspan).fadeIn("slow");
        }
        else {
            $("#" + classlistspan).fadeOut("slow");
        }

    }
    else if ($('.' + classlistunique + ':checked').length != $('.' + classlistunique).length) 
    {
        $("#" + maincheck).prop('checked', false);
        var selTotal = $('.' + classlistunique + ':checked').length;

        if (selTotal > 0) {
            $('#' + classlistspan).html('(' + selTotal + ' <i class="fa fa-trash"></i>)');
            $("#" + classlistspan).fadeIn("slow");
        }
        else {
            $("#" + classlistspan).fadeOut("slow");
        }
    }
});


// delete single student
$('body').on('click', '.abba_delete_single_student', function () {

    var abba_get_student_checkbox_id = $(this).data('checkbox');

    var maincheck = $(this).data('maincheck');

    var classlistspan = $(this).data('span');

    var classlistunique = $(this).data('unique');

    $("#" + abba_get_student_checkbox_id).prop('checked', true);

    if ($('.' + classlistunique + ':checked').length == $('.' + classlistunique).length) {
        $("#" + maincheck).prop('checked', true);
        var selTotal = $('.' + classlistunique + ':checked').length;

        if (selTotal > 0) {
            $('#' + classlistspan).html('(' + selTotal + ' <i class="fa fa-trash"></i>)');
            $('#' + classlistspan).fadeIn("slow");
        }
        else {
            $("#" + classlistspan).fadeOut("slow");
        }

    }
    else if ($('.' + classlistunique + ':checked').length != $('.' + classlistunique).length) {
        $("#" + maincheck).prop('checked', false);
        var selTotal = $('.' + classlistunique + ':checked').length;

        if (selTotal > 0) {
            $('#' + classlistspan).html('(' + selTotal + ' <i class="fa fa-trash"></i>)');
            $("#" + classlistspan).fadeIn("slow");
        }
        else {
            $("#" + classlistspan).fadeOut("slow");
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

    $('#abba_class_stud_del_modal').modal('hide');

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

            abba_get_class_students();
        }
    });

});

// change of campus
$('body').on('change', '#abba_display_class_result_student_campus', function () {

    var abba_campus_id = $('#abba_display_class_result_student_campus option:selected').val();

    if (abba_campus_id == 'NULL') {
        $('#abba_result_display_term').html('<option value="NULL">Select Campus First</option>');

        $('#abba_display_result_class').html('<option value="NULL">Select Campus First</option>');

    }
    else {
        // alert(abba_campus_id);

        $('#abba_result_display_term').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');

        $('#abba_display_result_class').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');

        var dataString = 'abba_campus_id=' + abba_campus_id + '&abba_section_id=' + 'NULL';

        // get term alias
        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba-get-term.php",
            data: dataString,
            //cache: false,
            success: function (output) {
                // alert(output);
                $('#abba_result_display_term').html(output);

                abba_load_filter_result();

            }
        });

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba-get-class.php",
            data: dataString,
            //cache: false,
            success: function (output) {
                // alert(output);
                $('#abba_display_result_class').html(output);

            }
        });


    }

});

// change of campus
$('body').on('change', '#abba_display_campus_for_create_class', function () {

    var abba_campus_id = $('#abba_display_campus_for_create_class option:selected').val();

    if (abba_campus_id == 'NULL') 
    {
        $('#abba_display_section_for_create_class').html('<option value="NULL">Select Campus First</option>')
        ;
        $('#abba_display_class_for_create_class').html('<option value="NULL">Select Section First</option>');
    }
    else {
        // alert(abba_campus_id);

        $('#abba_display_section_for_create_class').html('<option value="NULL">Loading...</option>');

        $('#abba_display_class_for_create_class').html('<option value="NULL">Select Class</option>');

        var dataString = 'abba_campus_id=' + abba_campus_id;

        // get term alias
        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba-get-section.php",
            data: dataString,
            //cache: false,
            success: function (output) {
                // alert(output);
                $('#abba_display_section_for_create_class').html(output);

            }
        });

    }

});


// change of campus
$('body').on('change', '#abba_display_section_for_create_class', function () {

    var abba_campus_id = $('#abba_display_campus_for_create_class option:selected').val();

    var abba_section_id = $('#abba_display_section_for_create_class option:selected').data('id');
    
    if (abba_campus_id == 'NULL') 
    {
        $('#abba_display_section_for_create_class').html('<option value="NULL">Select Campus First</option>');
    }
    else if(abba_section_id == 'NULL')
    {
        $('#abba_display_class_for_create_class').html('<option value="NULL">Select Section First</option>');
    }
    else {
        
        $('#abba_display_class_for_create_class').html('<option value="NULL">Loading...</option>');

        var dataString = 'abba_campus_id=' + abba_campus_id + '&abba_section_id=' + abba_section_id;

        // get term alias
        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba-get-template_class.php",
            data: dataString,
            //cache: false,
            success: function (output) {
                // alert(output);
                $('#abba_display_class_for_create_class').html(output);

                $('.hideappend').show('slow');
                
                var rowCount = $(".removeappendform").length;

                if (rowCount > 1) {
                    $(".removeappendform").show('slow');
                }
                else {
                    $(".removeappendform").hide('slow');
                }

            }
        });

    }

});

$("body").on("click", "#appendform", function () {

    $("#formtoappend").append(`<div class="row">
                                                    
        <div class="col-11">
            <div class="form-group abba_local-forms">
                <label>Class Name</label>
                <input type="text" class="form-control new_class_name" placeholder="Class Name"/> 
            </div>
        </div>

        <div class="col-1 removeappendform">
            <i class="fa fa-trash fs-6 text-danger mt-4" style="cursor:pointer;"></i>
        </div>
    </div>`);

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


// create class
$('body').on('click', '#abba_proceed_to_create_class', function(){
    // alert('working');

    var abba_campus_id = $('#abba_display_campus_for_create_class option:selected').val();

    var abba_default_section_id = $('#abba_display_section_for_create_class option:selected').data('id');

    var abba_section_id = $('#abba_display_section_for_create_class option:selected').val();
    
    var abba_default_class_id = $('#abba_display_class_for_create_class option:selected').val();

    var new_class_name = [];

    $.each($(".new_class_name"), function () {
        var clasname = $(this).val();

        if(clasname == '' || clasname == 0)
        {

        }
        else{
            new_class_name.push(clasname);
        }
    });

    if(abba_campus_id == 'NULL' || abba_section_id == 'NULL' || abba_default_class_id == 'NULL' || new_class_name.length == 0)
    {
        $.wnoty({
            type: 'warning',
            message: '<small>No field should be left empty.</small>',
            autohideDelay: 5000, // 5 seconds
            position: 'top-right',
            autohide: true
        });
    }
    else
    {

        $('#abba_proceed_to_create_class').html('<center><i class="fa fa-spinner fa-spin fs-3"></i></center>');

        var dataString = 'abba_campus_id=' + abba_campus_id + '&abba_default_section_id=' + abba_default_section_id + '&abba_section_id=' + abba_section_id + '&abba_default_class_id=' + abba_default_class_id + '&new_class_name=' + new_class_name;

        // alert(dataString);

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba-create-class.php",
            data: dataString,
            //cache: false,
            success: function (output) {

                // alert(output);

                $('#abba_create_class_Modal').modal('hide');

                $.wnoty({
                    type: 'success',
                    message: '<small>Created Successfully.</small>',
                    autohideDelay: 5000, // 5 seconds
                    position: 'top-right',
                    autohide: true
                });

                $('#abba_proceed_to_create_class').html('<i class="fa fa-plus"> Create</i>');

                $.each($(".new_class_name"), function () {
                    $(this).closest(".row").remove();
                });

                var abba_campus_id = $('#abba_display_campus_for_create_class option:selected').val('NULL');

                var abba_section_id = $('#abba_display_section_for_create_class option:selected').val('NULL');
                
                var abba_default_class_id = $('#abba_display_class_for_create_class option:selected').val('NULL');

                abba_get_class_students();
            }
        });
    }
});

$(document).ready(function () 
{
    $('#delClassModal').on('show.bs.modal', function (e) 
    {
        var class_id = $(e.relatedTarget).data('id');

        var abba_campus_id = $(e.relatedTarget).data('camp');

        $('#delete_class_id').val(class_id);

        $('#delete_class_camp').val(abba_campus_id);

    });
});


$(document).ready(function () 
{
    $(".ProcToDelclass").click(function () 
    {
        $('.ProcToDelclass').html('Deleting...<i class="fa fa-spinner fa-spin"></i>');

        var class_id = $('#delete_class_id').val();

        var abba_campus_id = $('#delete_class_camp').val();

        var dataString = 'class_id=' + class_id + '&abba_campus_id=' + abba_campus_id;

        // alert(dataString)

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba-poceed-to-del-class.php",
            data: dataString,
            cache: false,

            success: function (result) {

                // alert(result);

                $('#delClassModal').modal('hide');

                abba_get_class_students();

                $.wnoty({
                    type: 'success',
                    message: 'Class record has been deleted successfully',
                    autohideDelay: 5000, // 5 seconds
                    position: 'top-right',
                    autohide: true
                });

                //location.reload();   
                $('.ProcToDelclass').html('<i class="fa fa-trash"> Yes! Delete</i>');
                // $('#ProcToDelSelStaff').attr('disabled', true);                                    
            }
        });
    });

});


$(document).ready(function () 
{
    $('#abba_edit_class_Modal').on('show.bs.modal', function (e) 
    {
        var class_id = $(e.relatedTarget).data('id');

        var abba_campus_id = $(e.relatedTarget).data('camp');

        var abba_input = $(e.relatedTarget).data('input');

        var abba_span = $(e.relatedTarget).data('span');

        $('#edit_class_id').val(class_id);

        $('#edit_campus_id').val(abba_campus_id);

        $('#edit_class_input').val(abba_input);

        $('#edit_class_span').val(abba_span);

        var abba_get_name = $('.'+abba_input).val();
        
        $('.new_class_name_edit').val(abba_get_name);
        
    });
});


$(document).ready(function () 
{
    $(".abba-class-edit-submit-button").click(function () 
    {
        $('.abba-class-edit-submit-button').html('Saving...<i class="fa fa-spinner fa-spin"></i>');

        var class_id = $('#edit_class_id').val();

        var abba_campus_id = $('#edit_campus_id').val();

        var abba_input = $('#edit_class_input').val();

        var abba_span = $('#edit_class_span').val();

        var abba_get_name_new = $('.new_class_name_edit').val();

        var abba_get_name = $('.'+abba_input).val();

        var dataString = 'class_id=' + class_id + '&abba_campus_id=' + abba_campus_id + '&abba_get_name=' + abba_get_name + '&abba_get_name_new=' + abba_get_name_new;

        // alert(abba_span)

        if(abba_get_name_new == '' || abba_get_name_new == '0')
        {
            $.wnoty({
                type: 'error',
                message: 'No field should be empty',
                autohideDelay: 5000, // 5 seconds
                position: 'top-right',
                autohide: true
            });
        }
        else{

            $('.'+abba_span).text(abba_get_name_new);

            $('.'+abba_input).val(abba_get_name_new);

            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/abba-poceed-to-edit-class.php",
                data: dataString,
                cache: false,

                success: function (result) {

                    $('#abba_edit_class_Modal').modal('hide');

                    // abba_get_class_students();

                    $.wnoty({
                        type: 'success',
                        message: 'Class edited successfully',
                        autohideDelay: 5000, // 5 seconds
                        position: 'top-right',
                        autohide: true
                    });

                    $('.abba-class-edit-submit-button').html('<i class="fas fa"> Submit</i> <i class="fas fa-angle-right"> </i>');
                                                       
                }
            });
        }

    });

});


$(document).ready(function () 
{
    $('#abba_create_subject_Modal').on('show.bs.modal', function (e) 
    {

        var class_id = $(e.relatedTarget).data('id');

        var abba_campus_id = $(e.relatedTarget).data('camp');

        var abba_class_template_id = $(e.relatedTarget).data('temp');


        $('#sub_class_holder').val(class_id);

        $('#sub_camp_holder').val(abba_campus_id);

        $('#sub_class_temp_holder').val(abba_class_template_id);
        
        $('#display_subjects_to_assign').html('<center><i class="fa fa-spinner fa-spin fs-3"></i></center>');

        var dataString = 'class_id=' + class_id + '&abba_campus_id=' + abba_campus_id + '&abba_class_template_id=' + abba_class_template_id;

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba-poceed-to-display_class_subjects.php",
            data: dataString,
            cache: false,

            success: function (result) {

                $('#display_subjects_to_assign').html(result);

                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/abba-poceed-to-display_class_subjects_template.php",
                    data: dataString,
                    cache: false,
        
                    success: function (result) {
        
                        $('#display_class_template_final').html(result);
                        
                        
                    }
                });

                var rowCount = $(".sub_removeappendform").length;

                if (rowCount >= 1) {
                    $(".abba_collect_staff_list").prop('disabled', false);

                    $(".imagediv").html('');

                }
                else 
                {
                    $(".abba_collect_staff_list").prop('disabled', true);

                    $(".abba_collect_staff_list").val('0');

                    $("#sub_formtoappend").html('<div align="center" class="mt-2 imagediv"><img src="../../assets/images/adminImg/err.png" style="width:15%;"/><p class="pt-2 fs-sm text-secondary">No subject found.</p></div>');
                }

            }
        });

        
    });
});

// Search subject
$("body").on("keyup", ".abba_subject_assign_search", function () {
    var val = $(this).val();
    filter(val.toLowerCase());
});

$("body").on("paste", ".abba_subject_assign_search", function () {
    var element = this;
    setTimeout(function () {
        var text = $(element).val().toLowerCase();
        filter(text);
    }, 100);
});

function filter(x) {
    
    // alert(x);
    var isMatch = false;
    $(".subject_assign_selectBox-cont .subject_assign_card_search_get").each(function (i) {
        var content = $(this).html();

        if (content.toLowerCase().indexOf(x) == -1) {
            $(this).hide();
        } else {
            isMatch = true;
            $(this).show();

        }
    });

    var ccs = $('.subject_assign_selectBox-cont label').filter(function () {
        return $(this).css('display') !== 'none';
    }).length;

    $(".no-results").toggle(!isMatch);
    $(".cc").toggle(isMatch);


}

var ccs = $('.subject_assign_selectBox-cont label').filter(function () {
    return $(this).css('display') !== 'none';
}).length;


$(document).ready(function ()
{
    $("#abba_proceed_to_create_subject").click(function () 
    {
        $("#abba_proceed_to_create_subject").html('Saving...<i class="fa fa-spinner fa-spin"></i>');

        var subject_id = [];

        var teacher_id = [];

        $.each($(".get_assign_subject_id"), function () {
            subject_id.push($(this).data('id'));
        });

        $.each($(".abba_teacher_for_subject"), function () {
            teacher_id.push($(this).val());
        });

        var class_id = $('#sub_class_holder').val();

        var abba_campus_id = $('#sub_camp_holder').val();

        var abba_class_template_id = $('#sub_class_temp_holder').val();

        var dataStringsec = 'class_id=' + class_id + '&abba_campus_id=' + abba_campus_id + '&abba_class_template_id=' + abba_class_template_id + '&subject_id=' + subject_id + '&teacher_id=' + teacher_id;

        // alert(dataStringsec);

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba_proceed_to_add_edit_subject.php",
            data: dataStringsec,
            cache: false,

            success: function (result) {

                // alert(result);

                $('#abba_create_subject_Modal').modal('hide');

                abba_get_class_students();

                $.wnoty({
                    type: 'success',
                    message: 'Saved Successfully',
                    autohideDelay: 5000, // 5 seconds
                    position: 'top-right',
                    autohide: true
                });

                $("#abba_proceed_to_create_subject").html('<i class="fas fa"> Save Changes</i> <i class="fas fa-angle-right"> </i>');
                                                
            }
        });
    });

});


$("body").on("click", ".sub_removeappendform", function () {

    var div_row = $(this).closest(".row").attr('id');

    var div_span = $(this).closest(".row").attr('data-span');

    $('input[data-div="'+div_row+'"]').prop('checked', false);

    $('input[data-div="'+div_row+'"]').prop('disabled', false);
    
    $('#abba_select_all_subject_template').prop('checked', false);
    
    $('.'+div_span).html('');
  
    $(this).closest(".row").remove();

    var rowCount = $(".sub_removeappendform").length;

    if (rowCount >= 1) {
        $(".abba_collect_staff_list").prop('disabled', false);

        $(".imagediv").html('');

    }
    else 
    {
        $(".abba_collect_staff_list").prop('disabled', true);

        $(".abba_collect_staff_list").val('0');

        $("#sub_formtoappend").html('<div align="center" class="mt-2 imagediv"><img src="../../assets/images/adminImg/err.png" style="width:15%;"/><p class="pt-2 fs-sm text-secondary">No subject found.</p></div>');
    }
});

$("body").on("change", "#abba_teacher_for_all_subject", function () {

    var val = $(this).val();

    $('.abba_teacher_for_subject').val(val);
});

$("body").on("change", "#abba_select_all_subject_template", function () {  //"select all" change 

    var val = $(this).val();

    var checkStatusMain = $(this).prop('checked');
    
    if (checkStatusMain == true) 
    {
        
        $('.'+val).each(function () {
            
            if($(this).is('[disabled]'))
            {
                
            }
            else
            {
                var subjectname = $(this).val();
            
                var subjectid = $(this).data('id');
                
                var div_row = $(this).data('div');
            
                var stafflist = $('.abba_collect_staff_list').html();
            
                $(this).prop('checked', true);
                
                // alert(subjectname);
            
                $('#'+div_row).remove();
        
                var newrow = `<div class="row" id="`+div_row+`">
        
                    <div class="col-6">
                        <div class="form-group abba_local-forms">
                            <label>Subject</label>
                            <input type="text" disabled class="form-control get_assign_subject_id" placeholder="Class Name" value="`+subjectname+`" data-id="`+subjectid+`"/> 
                        </div>
                    </div>
        
                    <div class="col-5">
                        <div class="form-group abba_local-forms">
                            <label>Subject Teacher</label>
                            <select class="form-control abba_teacher_for_subject">
                                `+stafflist+`
                            </select>
                        </div>
                    </div>
        
                    <div class="col-1 sub_removeappendform">
                        <i class="fa fa-trash fs-6 text-danger mt-4" style="cursor:pointer;"></i>
                    </div>
                </div>`;
        
                $('#sub_formtoappend').append(newrow);
        
        
                var rowCount = $(".sub_removeappendform").length;
            
                if (rowCount >= 1) 
                {
        
                    $(".abba_collect_staff_list").prop('disabled', false);
                    
                    $(".imagediv").html('');
            
                }
                else 
                {
                    $(".abba_collect_staff_list").prop('disabled', true);
        
                    $(".abba_collect_staff_list").val('0');
            
                    $("#sub_formtoappend").html('<div align="center" class="mt-2 imagediv"><img src="../../assets/images/adminImg/err.png" style="width:15%;"/><p class="pt-2 fs-sm text-secondary">No subject found.</p></div>');
                }
            }

        });
        
    }
    else if (checkStatusMain == false) 
    {
        $('.'+val).each(function () {
            
            if($(this).is('[disabled]'))
            {
                
            }
            else
            {
                var subjectname = $(this).val();
        
                var subjectid = $(this).data('id');
                
                var div_row = $(this).data('div');
            
                var stafflist = $('.abba_collect_staff_list').html();
                
                $(this).prop('checked', false);
            
                $('#'+div_row).remove();
                
                var rowCount = $(".sub_removeappendform").length;
            
                if (rowCount >= 1) 
                {
        
                    $(".abba_collect_staff_list").prop('disabled', false);
        
                    $(".imagediv").html('');
            
                }
                else 
                {
                    $(".abba_collect_staff_list").prop('disabled', true);
        
                    $(".abba_collect_staff_list").val('0');
            
                    $("#sub_formtoappend").html('<div align="center" class="mt-2 imagediv"><img src="../../assets/images/adminImg/err.png" style="width:15%;"/><p class="pt-2 fs-sm text-secondary">No subject found.</p></div>');
                }
               
            }

        });
        
    }

});

$("body").on("change", ".ProcToaddSubjects", function () {
    
    var subjectname = $(this).val();

    var subjectid = $(this).data('id');
    
    var div_row = $(this).data('div');

    var stafflist = $('.abba_collect_staff_list').html();

    var checkStatus = $(this).prop('checked');

    if(checkStatus ==  true)
    {
        $('#'+div_row).remove();

        var newrow = `<div class="row" id="`+div_row+`">

            <div class="col-6">
                <div class="form-group abba_local-forms">
                    <label>Subject</label>
                    <input type="text" disabled class="form-control get_assign_subject_id" placeholder="Class Name" value="`+subjectname+`" data-id="`+subjectid+`"/> 
                </div>
            </div>

            <div class="col-5">
                <div class="form-group abba_local-forms">
                    <label>Subject Teacher</label>
                    <select class="form-control abba_teacher_for_subject">
                        `+stafflist+`
                    </select>
                </div>
            </div>

            <div class="col-1 sub_removeappendform">
                <i class="fa fa-trash fs-6 text-danger mt-4" style="cursor:pointer;"></i>
            </div>
        </div>`;

        $('#sub_formtoappend').append(newrow);


        var rowCount = $(".sub_removeappendform").length;
    
        if (rowCount >= 1) 
        {

            $(".abba_collect_staff_list").prop('disabled', false);
            
            $(".imagediv").html('');
    
        }
        else 
        {
            $(".abba_collect_staff_list").prop('disabled', true);

            $(".abba_collect_staff_list").val('0');
    
            $("#sub_formtoappend").html('<div align="center" class="mt-2 imagediv"><img src="../../assets/images/adminImg/err.png" style="width:15%;"/><p class="pt-2 fs-sm text-secondary">No subject found.</p></div>');
        }
       
    }
    else
    {

        $('#'+div_row).remove();


        var rowCount = $(".sub_removeappendform").length;
    
        if (rowCount >= 1) 
        {

            $(".abba_collect_staff_list").prop('disabled', false);

            $(".imagediv").html('');
    
        }
        else 
        {
            $(".abba_collect_staff_list").prop('disabled', true);

            $(".abba_collect_staff_list").val('0');
    
            $("#sub_formtoappend").html('<div align="center" class="mt-2 imagediv"><img src="../../assets/images/adminImg/err.png" style="width:15%;"/><p class="pt-2 fs-sm text-secondary">No subject found.</p></div>');
        }
       
    }

});

$(document).ready(function(){
    $('body').on('click', '#display_subject_temp', function () {
        $('#abba_add_class_subject_template_Modal').modal('show');
        $('#abba_create_subject_Modal').css('z-index', 1040); // Increase z-index of first modal
        
    });
    
    // Reset z-index of first modal when second modal is closed
    $('#abba_add_class_subject_template_Modal').on('hidden.bs.modal', function () {
        $('#abba_create_subject_Modal').css('z-index', 1050); // Reset z-index of first modal
    });
    
});


// change of class to get subject
$('body').on('change', '#abba_display_result_class', function () {

    var abba_campus_id = $('#abba_display_class_result_student_campus option:selected').val();

    var abba_display_result_class = $('#abba_display_result_class option:selected').val();

    if (abba_display_result_class == 'NULL') {

        $('#abba_display_result_class').html('<option value="NULL">Select Class First</option>');

    }
    else {
        // alert(abba_campus_id);
        $('#abba_display_result_subject').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');

        var dataString = 'abba_campus_id=' + abba_campus_id + '&abba_display_result_class=' + abba_display_result_class;

        // alert(dataString);
        // get term alias
        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba-get-class_subject.php",
            data: dataString,
            //cache: false,
            success: function (output) {
                // alert(output);
                $('#abba_display_result_subject').html(output);

                abba_load_filter_result();

            }
        });
    }

});

function abba_load_filter_result() {

    $('#abba_get_student_in_result_sheet').html('<center><i class="fa fa-spinner fa-spin"></i></center>');

    var abba_campus_id = $('#abba_display_class_result_student_campus option:selected').val();

    var abba_display_session = $('#abba_display_session option:selected').val();

    var abba_result_display_term = $('#abba_result_display_term option:selected').val();

    var abba_display_result_class = $('#abba_display_result_class option:selected').val();

    var abba_display_result_subject = $('#abba_display_result_subject option:selected').val();

    var abba_display_student_soresheet = $('#abba_display_student_soresheet').html();

    var abba_get_instituion_id = localStorage.getItem("abba-stored-institution-id");

    $('#abba_display_student_soresheet').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
    // alert(abba_display_student_soresheet);

    var dataString = '&abba_campus_id=' + abba_campus_id + '&abba_display_result_class=' + abba_display_result_class + '&abba_display_session=' + abba_display_session + '&abba_result_display_term=' + abba_result_display_term + '&abba_display_result_subject=' + abba_display_result_subject + '&abba_get_instituion_id=' + abba_get_instituion_id;

    // alert(dataString);

    if (abba_campus_id == 0 || abba_campus_id == 'NULL' || abba_campus_id == '') {
        
        $('#abba_get_student_in_result_sheet').html('load');

        $('#abba_display_class_result_student_campus').css('border', '1px solid orangered');

        $('#abba_display_result_class').css('border', '1px solid lightgrey');
        $('#abba_display_session').css('border', '1px solid lightgrey');
        $('#abba_result_display_term').css('border', '1px solid lightgrey');
        $('#abba_display_result_subject').css('border', '1px solid lightgrey');

        $('#abba_display_student_soresheet').html('<div align="center"> <img src="../../assets/images/adminImg/filter.png"style="width:15%;opacity:0.7;" /><p class="pt-2 fs-6 text-secondary">Please filter to proceed.</p></div>');
    }
    else if (abba_display_session == 0 || abba_display_session == 'NULL' || abba_display_session == '') {
        
        $('#abba_get_student_in_result_sheet').html('load');

        $('#abba_display_session').css('border', '1px solid orangered');

        $('#abba_display_class_result_student_campus').css('border', '1px solid green');
        $('#abba_result_display_term').css('border', '1px solid lightgrey');
        $('#abba_display_result_class').css('border', '1px solid lightgrey');
        $('#abba_display_result_subject').css('border', '1px solid lightgrey');

        $('#abba_display_student_soresheet').html('<div align="center"> <img src="../../assets/images/adminImg/filter.png"style="width:15%;opacity:0.7;" /><p class="pt-2 fs-6 text-secondary">Please filter to proceed.</p></div>');

    }
    else if (abba_result_display_term == 0 || abba_result_display_term == 'NULL' || abba_result_display_term == '') {
        
        $('#abba_get_student_in_result_sheet').html('load');

        $('#abba_result_display_term').css('border', '1px solid orangered');

        $('#abba_display_class_result_student_campus').css('border', '1px solid green');
        $('#abba_display_session').css('border', '1px solid green');
        $('#abba_display_result_class').css('border', '1px solid lightgrey');
        $('#abba_display_result_subject').css('border', '1px solid lightgrey');

        $('#abba_display_student_soresheet').html('<div align="center"> <img src="../../assets/images/adminImg/filter.png"style="width:15%;opacity:0.7;" /><p class="pt-2 fs-6 text-secondary">Please filter to proceed.</p></div>');
    }
    else if (abba_display_result_class == 0 || abba_display_result_class == 'NULL' || abba_display_result_class == '') {
        
        $('#abba_get_student_in_result_sheet').html('load');

        $('#abba_display_result_class').css('border', '1px solid orangered');

        $('#abba_display_class_result_student_campus').css('border', '1px solid green');
        $('#abba_display_session').css('border', '1px solid green');
        $('#abba_result_display_term').css('border', '1px solid green');
        $('#abba_display_result_subject').css('border', '1px solid lightgrey');

        $('#abba_display_student_soresheet').html('<div align="center"> <img src="../../assets/images/adminImg/filter.png"style="width:15%;opacity:0.7;" /><p class="pt-2 fs-6 text-secondary">Please filter to proceed.</p></div>');
    }
    else if (abba_display_result_subject == 0 || abba_display_result_subject == 'NULL' || abba_display_result_subject == '') {
        
        $('#abba_get_student_in_result_sheet').html('load');

        $('#abba_display_result_subject').css('border', '1px solid orangered');

        $('#abba_display_result_class').css('border', '1px solid green');

        $('#abba_display_class_result_student_campus').css('border', '1px solid green');
        $('#abba_display_session').css('border', '1px solid green');
        $('#abba_result_display_term').css('border', '1px solid green');

        $('#abba_display_student_soresheet').html('<div align="center"> <img src="../../assets/images/adminImg/filter.png"style="width:15%;opacity:0.7;" /><p class="pt-2 fs-6 text-secondary">Please filter to proceed.</p></div>');
    }
    else {
        $('#abba_display_class_result_student_campus').css('border', '1px solid green');
        $('#abba_display_result_class').css('border', '1px solid green');
        $('#abba_display_session').css('border', '1px solid green');
        $('#abba_result_display_term').css('border', '1px solid green');
        $('#abba_display_result_subject').css('border', '1px solid green');

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba_load_Live_Student_Subject_Score.php",
            data: dataString,
            cache: false,

            success: function (result) {
                //alert(result);
                $('#abba_display_student_soresheet').html(result);
                $('#abba_get_student_in_result_sheet').html('load');

                $('#abba_display_class_result_student_campus').css('border', '1px solid lightgrey');
                $('#abba_display_result_class').css('border', '1px solid lightgrey');
                $('#abba_display_session').css('border', '1px solid lightgrey');
                $('#abba_result_display_term').css('border', '1px solid lightgrey');
                $('#abba_display_result_subject').css('border', '1px solid lightgrey');
            }
        });
    }
}

$('body').on("click", "#abba_get_student_in_result_sheet", function () {

    abba_load_filter_result();

});

// Edit input box click action
$(document).on('mouseup', '.editbox', function () {
    return false
});


// Outside click action
$(document).mouseup(function () {
    $(".editbox").hide();
    $(".text").show();
});

//LiveScore Computing=========================================================================================
//============================================================================================================
$(document).on('click', '.edit_tr', function () {

    //get the unique ID of the row
    var ID = $(this).attr('id');

    //Hide all the label
    $("#ca1_" + ID).hide();
    $("#ca2_" + ID).hide();
    $("#ca3_" + ID).hide();
    $("#ca4_" + ID).hide();
    $("#ca5_" + ID).hide();
    $("#ca6_" + ID).hide();
    $("#ca7_" + ID).hide();
    $("#ca8_" + ID).hide();
    $("#ca9_" + ID).hide();
    $("#ca10_" + ID).hide();
    $("#exam_" + ID).hide();
    //Show all the input box
    $("#ca1_input_" + ID).fadeIn(1000);
    $("#ca2_input_" + ID).fadeIn(1000);
    $("#ca3_input_" + ID).fadeIn(1000);
    $("#ca4_input_" + ID).fadeIn(1000);
    $("#ca5_input_" + ID).fadeIn(1000);
    $("#ca6_input_" + ID).fadeIn(1000);
    $("#ca7_input_" + ID).fadeIn(1000);
    $("#ca8_input_" + ID).fadeIn(1000);
    $("#ca9_input_" + ID).fadeIn(1000);
    $("#ca10_input_" + ID).fadeIn(1000);
    $("#exam_input_" + ID).fadeIn(1000);

});

$(document).on('change', '.edit_tr', function () {

    var ID = $(this).attr('id');

    var abba_get_instituion_id = localStorage.getItem("abba-stored-institution-id");

    var ca1 = parseFloat($("#ca1_input_" + ID).val());
    var ca2 = parseFloat($("#ca2_input_" + ID).val());
    var ca3 = parseFloat($("#ca3_input_" + ID).val());
    var ca4 = parseFloat($("#ca4_input_" + ID).val());
    var ca5 = parseFloat($("#ca5_input_" + ID).val());
    var ca6 = parseFloat($("#ca6_input_" + ID).val());
    var ca7 = parseFloat($("#ca7_input_" + ID).val());
    var ca8 = parseFloat($("#ca8_input_" + ID).val());
    var ca9 = parseFloat($("#ca9_input_" + ID).val());
    var ca10 = parseFloat($("#ca10_input_" + ID).val());
    var exam = parseFloat($("#exam_input_" + ID).val());

    var studname = $("#studname_" + ID).val();

    var totall = (ca1 + ca2 + ca3 + ca4 + ca5 + ca6 + ca7 + ca8 + ca9 + ca10 + exam);

    var dataString = '&ID=' + ID + '&ca1=' + ca1 + '&ca2=' + ca2 + '&ca3=' + ca3 + '&ca4=' + ca4 + '&ca5=' + ca5 + '&ca6=' + ca6 + '&ca7=' + ca7 + '&ca8=' + ca8 + '&ca9=' + ca9 + '&ca10=' + ca10 + '&exam=' + exam + '&abba_get_instituion_id=' + abba_get_instituion_id;

    // alert(dataString);

    if (totall > 100) {
        $.wnoty({
            type: 'warning',
            message: '<small>Sorry but the total score for <b>' + studname + '</b> is greater than 100.</small>',
            autohideDelay: 5000, // 5 seconds
            position: 'top-right',
            autohide: true
        });
    }
    else {

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba_update_student_score_live_table.php",
            data: dataString,
            cache: false,
            success: function (result) {
                //alert(result);
                $("#ca1_" + ID).html(ca1);
                $("#ca2_" + ID).html(ca2);
                $("#ca3_" + ID).html(ca3);
                $("#ca4_" + ID).html(ca4);
                $("#ca5_" + ID).html(ca5);
                $("#ca6_" + ID).html(ca6);
                $("#ca7_" + ID).html(ca7);
                $("#ca8_" + ID).html(ca8);
                $("#ca9_" + ID).html(ca9);
                $("#ca10_" + ID).html(ca10);
                $("#exam_" + ID).html(exam);

                var total = ca1 + ca2 + ca3 + ca4 + ca5 + ca6 + ca7 + ca8 + ca9 + ca10 + exam;

                $("#total_" + ID).html(total);

                // alert(result);

                var obj = JSON.parse(result);
                console.log(obj);
                var grading = obj[0];
                var remark = obj[1];

                $("#grade_" + ID).html(grading);
                $("#remark_" + ID).html(remark);


            }
        });

    }

});

// Edit input box click action
$(document).on('mouseup', '.editbox_psycho', function () {
    return false
});

// Outside click action
$(document).mouseup(function () {
    $(".editbox_psycho").hide();
    $(".text_psycho").show();
});

//LiveScore Computing=========================================================================================
//============================================================================================================
$(document).on('click', '.edit_tr_psycho', function () {

    //get the unique ID of the row
    var ID=$(this).attr('id');

    //Hide all the label
    $("#dex_"+ID).hide();
    $("#write_"+ID).hide();
    $("#gym_"+ID).hide();
    $("#music_"+ID).hide();
    $("#exp_"+ID).hide();
    $("#hand_"+ID).hide();
    //Show all the input box
    $("#dex_input_"+ID).fadeIn(1000);
    $("#write_input_"+ID).fadeIn(1000);
    $("#gym_input_"+ID).fadeIn(1000);
    $("#music_input_"+ID).fadeIn(1000);
    $("#exp_input_"+ID).fadeIn(1000);
    $("#hand_input_"+ID).fadeIn(1000);

});

$(document).on('change', '.edit_tr_psycho', function () {

    var ID=$(this).attr('id');

    var dex = parseFloat($("#dex_input_"+ID).val());
    var write = parseFloat($("#write_input_"+ID).val());
    var gym = parseFloat($("#gym_input_"+ID).val());
    var music = parseFloat($("#music_input_"+ID).val());
    var exp = parseFloat($("#exp_input_"+ID).val());
    var hand = parseFloat($("#hand_input_"+ID).val());
    var institution = "<?php echo $InstitutionID; ?>"


    //alert(dex + write + gym + music + exp + hand);
    var dataString = '&ID='+ ID + '&dex='+ dex + '&write='+ write + '&gym='+ gym + '&music='+ music + '&exp='+ exp + '&hand='+ hand;
    //alert(dataString);
    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba_update_psychomotor_live_table.php",
        data: dataString,
        cache: false,
        success: function(result)
        {
            $("#dex_"+ID).html(dex);
            $("#write_"+ID).html(write);
            $("#gym_"+ID).html(gym);
            $("#music_"+ID).html(music);
            $("#exp_"+ID).html(exp);
            $("#hand_"+ID).html(hand);
        }
    });
});



// Edit input box click action
$(document).on('mouseup', '.editbox_affective', function () {
    return false
});
// Outside click action
$(document).mouseup(function () {
    $(".editbox_affective").hide();
    $(".text_affective").show();
});

//LiveScore Computing=========================================================================================
//============================================================================================================
$(document).on('click', '.edit_tr_affective', function () {

    var ID=$(this).attr('id');
    
    //Hide all the label
    $("#Punc_"+ID).hide();
    $("#Atten_"+ID).hide();
    $("#Neat_"+ID).hide();
    $("#Curi_"+ID).hide();
    $("#Dili_"+ID).hide();
    $("#Creat_"+ID).hide();
    $("#Attentive_"+ID).hide();
    $("#ClassPart_"+ID).hide();
    $("#Obedi_"+ID).hide();
    $("#Honesty_"+ID).hide();
    $("#Relation_"+ID).hide();

    //Show all the input box
    $("#Punc_input_"+ID).fadeIn(1000);
    $("#Atten_input_"+ID).fadeIn(1000);
    $("#Neat_input_"+ID).fadeIn(1000);
    $("#Curi_input_"+ID).fadeIn(1000);
    $("#Dili_input_"+ID).fadeIn(1000);
    $("#Creat_input_"+ID).fadeIn(1000);
    $("#Attentive_input_"+ID).fadeIn(1000);
    $("#ClassPart_input_"+ID).fadeIn(1000);
    $("#Obedi_input_"+ID).fadeIn(1000);
    $("#Honesty_input_"+ID).fadeIn(1000);
    $("#Relation_input_"+ID).fadeIn(1000);

});

$(document).on('change', '.edit_tr_affective', function () {

    var abba_get_instituion_id = localStorage.getItem("abba-stored-institution-id");

    var ID=$(this).attr('id');

    var Punctuality = parseFloat($("#Punc_input_"+ID).val());
    var Attendance = parseFloat($("#Atten_input_"+ID).val());
    var Neatness = parseFloat($("#Neat_input_"+ID).val());
    var Curiosity = parseFloat($("#Curi_input_"+ID).val());
    var Diligence = parseFloat($("#Dili_input_"+ID).val());
    var Creative = parseFloat($("#Creat_input_"+ID).val());
    var Attentiveness = parseFloat($("#Attentive_input_"+ID).val());
    var ClassParticipation = parseFloat($("#ClassPart_input_"+ID).val());
    var Obedience = parseFloat($("#Obedi_input_"+ID).val());
    var Honesty = parseFloat($("#Honesty_input_"+ID).val());
    var RelationshipWithMates = parseFloat($("#Relation_input_"+ID).val());
    
    var dataString = 'ID='+ID + '&Punctuality='+Punctuality+'&Neatness='+Neatness +'&Attendance='+Attendance+'&Curiosity='+Curiosity+'&Diligence='+Diligence+'&Creative='+Creative+'&Attentiveness='+Attentiveness+'&ClassParticipation='+ClassParticipation+'&Obedience='+Obedience+'&Honesty='+Honesty
    +'&RelationshipWithMates='+RelationshipWithMates;
    

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba_update_affective_traits_live_table.php",
        data: dataString,
        cache: false,
        success: function(result)
        {
            $("#Punc_"+ID).html(Punctuality);
            $("#Atten_"+ID).html(Attendance);
            $("#Neat_"+ID).html(Neatness);
            $("#Curi_"+ID).html(Curiosity);
            $("#Dili_"+ID).html(Diligence);
            $("#Creat_"+ID).html(Creative);
            $("#Attentive_"+ID).html(Attentiveness);
            $("#ClassPart_"+ID).html(ClassParticipation);
            $("#Obedi_"+ID).html(Obedience);
            $("#Honesty_"+ID).html(Honesty);
            $("#Relation_"+ID).html(RelationshipWithMates);

        }
    });

});


$('body').on('click', '.addToSheetModal', function () {

    var btnclicked = $(this).data('id');

    $('#hiddensheetinput').val(btnclicked);

    $('#LoadStudentForAddToScoreSheet').html('<center><i class="fa fa-spinner fa-spin fs-3"></i></center>');

    if(btnclicked == 1)
    {
        var abba_campus_id = $('#abba_display_class_result_student_campus option:selected').val();

        var abba_display_session = $('#abba_display_session option:selected').val();

        var abba_result_display_term = $('#abba_result_display_term option:selected').val();

        var abba_display_result_class = $('#abba_display_result_class option:selected').val();

        var abba_display_result_subject = $('#abba_display_result_subject option:selected').val();

        var abba_get_instituion_id = localStorage.getItem("abba-stored-institution-id");

        $('#addToSheetModalLabel').html('Add To Score Sheet');
    }
    else
    {
        var abba_campus_id = $('#abba_display_class_behavioural_student_campus option:selected').val();

        var abba_display_session = $('#abba_display_behavioural_session option:selected').val();

        var abba_result_display_term = $('#abba_behavioural_display_term option:selected').val();

        var abba_display_result_class = $('#abba_display_behavioural_class option:selected').val();

        var abba_display_result_subject = 0;

        var abba_get_instituion_id = localStorage.getItem("abba-stored-institution-id");

        if(btnclicked == 2)
        {
            $('#addToSheetModalLabel').html('Add To Psychomotor Sheet');
        }
        else
        {
            $('#addToSheetModalLabel').html('Add To Affective Domain Sheet');
        }
    }

    var dataString = '&abba_campus_id=' + abba_campus_id + '&abba_display_result_class=' + abba_display_result_class + '&abba_display_session=' + abba_display_session + '&abba_result_display_term=' + abba_result_display_term + '&abba_display_result_subject=' + abba_display_result_subject + '&abba_get_instituion_id=' + abba_get_instituion_id + '&btnclicked=' + btnclicked;

    // alert(dataString);

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba_display_class_students.php",
        data: dataString,
        cache: false,

        success: function (result) {
            //alert(result);
            $('#LoadStudentForAddToScoreSheet').html(result);

        }
    });
});

// select all student checkbox
$("body").on("change", "#StudentToSheet_id_selectall", function () {  //"select all" change 

    var checkStatus = $(this).prop('checked');
    if (checkStatus == true) {
        $(".studentAddToScoreSheet").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
        var selTotal = $('.studentAddToScoreSheet:checked').length;
        $('.abba_sheet_student_total_selected').html('(' + selTotal + ' selected)');
        $(".abba_sheet_student_total_selected").fadeIn("slow");

    }
    else if (checkStatus == false) {
        $(".studentAddToScoreSheet").prop('checked', false); //change "select all" checked status to false
        var selTotal = $('.studentAddToScoreSheet:checked').length;
        $(".abba_sheet_student_total_selected").fadeOut("slow");
    }

});

// select single student checkbox
$('body').on('change', '.studentAddToScoreSheet', function () {

    if ($('.studentAddToScoreSheet:checked').length == $('.studentAddToScoreSheet').length) {
        $("#StudentToSheet_id_selectall").prop('checked', true);
        var selTotal = $('.studentAddToScoreSheet:checked').length;

        if (selTotal > 0) {
            $('.abba_sheet_student_total_selected').html('(' + selTotal + ' selected)');
            $(".abba_sheet_student_total_selected").fadeIn("slow");
        }
        else {
            $(".abba_sheet_student_total_selected").fadeOut("slow");
        }

    }
    else if ($('.studentAddToScoreSheet:checked').length != $('.studentAddToScoreSheet').length) {
        $("#StudentToSheet_id_selectall").prop('checked', false);
        var selTotal = $('.studentAddToScoreSheet:checked').length;

        if (selTotal > 0) {
            $('.abba_sheet_student_total_selected').html('(' + selTotal + ' selected)');
            $(".abba_sheet_student_total_selected").fadeIn("slow");
        }
        else {
            $(".abba_sheet_student_total_selected").fadeOut("slow");
        }
    }


});

$('body').on("click", "#addToScoreSheetBtn", function () {
    
    var btnclicked = $('#hiddensheetinput').val();

    $("#addToScoreSheetBtn").html('<i class="fa fa-circle-o-notch fa-spin"></i> Adding Selected...');

    if(btnclicked == 1)
    {
        
        var abba_campus_id = $('#abba_display_class_result_student_campus option:selected').val();

        var abba_display_session = $('#abba_display_session option:selected').val();

        var abba_result_display_term = $('#abba_result_display_term option:selected').val();

        var abba_display_result_class = $('#abba_display_result_class option:selected').val();

        var abba_display_result_subject = $('#abba_display_result_subject option:selected').val();

        var abba_get_instituion_id = localStorage.getItem("abba-stored-institution-id");

    }
    else
    {
        var abba_campus_id = $('#abba_display_class_behavioural_student_campus option:selected').val();

        var abba_display_session = $('#abba_display_behavioural_session option:selected').val();

        var abba_result_display_term = $('#abba_behavioural_display_term option:selected').val();

        var abba_display_result_class = $('#abba_display_behavioural_class option:selected').val();

        var abba_display_result_subject = 0;

        var abba_get_instituion_id = localStorage.getItem("abba-stored-institution-id");

    }

    var selStudentAddToScoreSheet = [];


    $('.studentAddToScoreSheet').each(function () {
        if ($(this).is(':checked')) {
            selStudentAddToScoreSheet.push($(this).val());
        }
    });

    if (selStudentAddToScoreSheet.length > 0) {

        var dataString = '&abba_campus_id=' + abba_campus_id + '&abba_display_result_class=' + abba_display_result_class + '&abba_display_session=' + abba_display_session + '&abba_result_display_term=' + abba_result_display_term + '&abba_display_result_subject=' + abba_display_result_subject + '&selStudentAddToScoreSheet=' + selStudentAddToScoreSheet + '&btnclicked=' + btnclicked;

        // alert(dataString);

        $.ajax({

            type: "POST",
            url: "../../controller/scripts/owner/abba-insert-selected-student-to-scoresheet.php",
            data: dataString,
            cache: false,

            success: function (output) {

                $('#addToSheetModalOpen').modal('hide');

                // alert(output);
                $.wnoty({
                    type: 'success',
                    message: 'The student(s) has been added to the sheet successfully',
                    autohideDelay: 5000, // 5 seconds
                    position: 'top-right',
                    autohide: true
                });

                $("#addToScoreSheetBtn").html('<i class="fa fa-plus"> Add Student</i>');

                if(output == 1)
                {
                    abba_load_filter_result();

                }
                else
                {
                    abba_load_filter_behavioural_sheet();
                }
                
            }
        });
    }
    else {
        $.wnoty({
            type: 'warning',
            message: 'Kindly select atleast one student to proceed',
            autohideDelay: 5000, // 5 seconds
            position: 'top-right',
            autohide: true
        });
        
        $("#addToScoreSheetBtn").html('<i class="fa fa-plus"> Add Student</i>');
    }
});


$('body').on("change", "#abba_display_session, #abba_result_display_term, #abba_display_result_subject", function () {
    abba_load_filter_result();
});


//==============Delete Score Single================== // 
$(document).ready(function () {
    $('#delScoreModal').on('show.bs.modal', function (e) {
        var ScoreID = $(e.relatedTarget).data('id');

        var btnclicked = $(e.relatedTarget).data('tab');

        var studname = $('.abba_name_' + ScoreID + '_' + btnclicked).val();

        $('#displayScoreDelMsg').html('<div align="center"><h6>Are you sure?</h6><p><div><i class="fa fa-times fa-lg text-danger" style="font-size:56px"></i></div><p>Do want to delete the records for this record for <b>"' + studname + '"</b>? This process cannot be reversed.</p></div>');

        localStorage.setItem("ScoreID", ScoreID);
        
        localStorage.setItem("btnclicked", btnclicked);

    });
});


$(document).ready(function () {
    $(".ProcToDelSelScore").click(function () {
        $('.ProcToDelSelScore').html('Removing...<i class="fa fa-spinner fa-spin"></i>');
        
        var ScoreID = localStorage.getItem("ScoreID");

        var btnclicked = localStorage.getItem("btnclicked");
        
        var dataString = 'selDeleteID=' + ScoreID + '&btnclicked=' + btnclicked;
        
        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba-poceed-to-del-single-score.php",
            data: dataString,
            cache: false,

            success: function (result) {
                $('#delScoreModal').modal('hide');

                $.wnoty({
                    type: 'success',
                    message: 'The student\'s record has been removed successfully',
                    autohideDelay: 5000, // 5 seconds
                    position: 'top-right',
                    autohide: true
                });

                if(result == 1)
                {
                    abba_load_filter_result();

                }
                else
                {
                    abba_load_filter_behavioural_sheet();
                }

                //location.reload();   
                $('.ProcToDelSelScore').html('<i class="fa fa-trash"> Yes! Delete</i>');
                // $('#ProcToDelSelStaff').attr('disabled', true);     
                
                localStorage.removeItem("ScoreID");
                
                localStorage.removeItem("btnclicked");
            }
        });
    });

});


$('body').on('click','.clearScoreSheetModal', function () {

    var btnclicked = $(this).data('id');
    
    localStorage.setItem("btnclicked", btnclicked);

});


$('body').on('click','#clearScoreSheetBtn', function () 
{
    $('#clearScoreSheetBtn').html('Clearing...<i class="fa fa-spinner fa-spin"></i>');

    var btnclicked = localStorage.getItem("btnclicked");
    
    if(btnclicked == 1)
    {
        
        var abba_campus_id = $('#abba_display_class_result_student_campus option:selected').val();

        var abba_display_session = $('#abba_display_session option:selected').val();

        var abba_result_display_term = $('#abba_result_display_term option:selected').val();

        var abba_display_result_class = $('#abba_display_result_class option:selected').val();

        var abba_display_result_subject = $('#abba_display_result_subject option:selected').val();

        var abba_get_instituion_id = localStorage.getItem("abba-stored-institution-id");

    }
    else
    {
        var abba_campus_id = $('#abba_display_class_behavioural_student_campus option:selected').val();

        var abba_display_session = $('#abba_display_behavioural_session option:selected').val();

        var abba_result_display_term = $('#abba_behavioural_display_term option:selected').val();

        var abba_display_result_class = $('#abba_display_behavioural_class option:selected').val();

        var abba_display_result_subject = 0;

        var abba_get_instituion_id = localStorage.getItem("abba-stored-institution-id");

    }

    var dataString = '&abba_campus_id=' + abba_campus_id + '&abba_display_result_class=' + abba_display_result_class + '&abba_display_session=' + abba_display_session + '&abba_result_display_term=' + abba_result_display_term + '&abba_display_result_subject=' + abba_display_result_subject + '&btnclicked=' + btnclicked;

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba-proceed-to-clear-score.php",
        data: dataString,
        cache: false,

        success: function (result) {

            // alert(result);

            $('#clearScoreSheetModalOpen').modal('hide');

            $.wnoty({
                type: 'success',
                message: 'The sheet has been cleared successfully',
                autohideDelay: 5000, // 5 seconds
                position: 'top-right',
                autohide: true
            });

            if(result == 1)
            {
                abba_load_filter_result();

            }
            else
            {
                abba_load_filter_behavioural_sheet();
            }
            //location.reload();   
            $('#clearScoreSheetBtn').html('<i class="fa fa-trash"> Clear List</i>');
            // $('#ProcToDelSelStaff').attr('disabled', true);
            
            localStorage.removeItem("btnclicked");
        }
    });
});


$('body').on("click", ".downloadbtn-student-list", function () {
    // alert('working');

    var abba_campus_id = $('#abba_display_class_result_student_campus option:selected').val();

    var abba_display_session = $('#abba_display_session option:selected').val();

    var abba_result_display_term = $('#abba_result_display_term option:selected').val();

    var abba_display_result_class = $('#abba_display_result_class option:selected').val();

    var abba_display_result_subject = $('#abba_display_result_subject option:selected').val();

    var dataString = '&abba_campus_id=' + abba_campus_id + '&abba_display_session=' + abba_display_session + '&abba_result_display_term=' + abba_result_display_term + '&abba_display_result_class=' + abba_display_result_class + '&abba_display_result_subject=' + abba_display_result_subject;

    // alert(dataString);
    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/abba-get-student-list-for-subject.php",
        data: dataString,
        cache: false,

        success: function (result) {
            
            // alert(result);
            // $(".errormsg").html(result);
            // $("#subjectlistLink").attr("href", result)
            // $('#DownloadClassListModal').modal('show');

            $.wnoty({
                type: 'success',
                message: 'Download is ongoing',
                autohideDelay: 5000, // 5 seconds
                position: 'top-right',
                autohide: true
            });
            
            var jsonData = JSON.parse(result);

            var downloadPaths = jsonData.downloadPaths;

            var downloadname = jsonData.downloadname;
            
            var abbafilename = jsonData.abbafilename;
                
                
            var $a = $("<a>")
                    .attr("href", downloadPaths)
                    .attr("download", downloadname)
                    .appendTo("body");

            // Trigger a click event on the anchor element
            $a[0].click();

            // Cleanup - remove the anchor element
            $a.remove();
            
            // alert(abbafilename);
            
            setTimeout(function () {
                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/abba_delete_csv_file.php",
                    data: { abbafilename:abbafilename },
                    cache: false,
            
                    success: function (result) {
                        // alert(result);
                    }
                    
                });
            }, 10000);
        }
    });
});


$('body').on('click', '.abba_proceed_to_upload_score', function () {
    
    // alert('abba');
    $(".abba_proceed_to_upload_score").html('<center><i class="fa fa-spinner fa-spin"></i> Uploading</center>');
    
    var fd = new FormData();

    var files = $('#file-5')[0].files[0];

    var abba_campus_id = $('#abba_display_class_result_student_campus option:selected').val();

    var abba_display_session = $('#abba_display_session option:selected').val();

    var abba_result_display_term = $('#abba_result_display_term option:selected').val();

    var abba_display_result_class = $('#abba_display_result_class option:selected').val();

    var abba_display_result_subject = $('#abba_display_result_subject option:selected').val();

    fd.append('file', files);

    fd.append('abba_display_result_class', abba_display_result_class);
    fd.append('abba_display_result_subject', abba_display_result_subject);
    fd.append('abba_display_session', abba_display_session);
    fd.append('abba_result_display_term', abba_result_display_term);
    fd.append('abba_campus_id', abba_campus_id);

    $.ajax({
        url: '../../controller/scripts/owner/abba_upload_score_bulk.php',
        type: 'post',
        data: fd,
        contentType: false,
        processData: false,
        success: function (response) {
            $('.abba_proceed_to_upload_score').html('<i class="fas fa-cloud-upload-alt" style="font-size:14px;"> Upload</i>');
            
            $.wnoty({
                type: 'success',
                message: 'Uploaded Successfully',
                autohideDelay: 5000, // 5 seconds
                position: 'top-right',
                autohide: true
            });
            
            $('#abba_show_result_bulk_upload_modal').modal('hide');
            
            abba_load_filter_result();
        }
    });

});


// change of campus for broadsheet
$('body').on('change', '#abba_display_class_broadsheet_student_campus', function () {

    var abba_campus_id = $('#abba_display_class_broadsheet_student_campus option:selected').val();

    var page = 'result-broadsheet';

    if (abba_campus_id == 'NULL') {
        $('#abba_broadsheet_display_term').html('<option value="NULL">Select Campus First</option>');

        $('#abba_display_broadsheet_class').html('<option value="NULL">Select Campus First</option>');

    }
    else {
        // alert(abba_campus_id);

        $('#abba_broadsheet_display_term').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');

        $('#abba_display_broadsheet_class').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');
        
        var dataString = 'abba_campus_id=' + abba_campus_id + '&abba_section_id=' + 'NULL' + '&page=' + page;

        // get term alias
        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba-get-term.php",
            data: dataString,
            //cache: false,
            success: function (output) {
                // alert(output);
                $('#abba_broadsheet_display_term').html(output);

            }
        });

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba-get-class.php",
            data: dataString,
            //cache: false,
            success: function (output) {
                // alert(output);
                $('#abba_display_broadsheet_class').html(output);
            }
        });
    }
});

// change of campus for view result
$('body').on('change', '#abba_display_view-result_student_campus', function () {

    var abba_campus_id = $('#abba_display_view-result_student_campus option:selected').val();

    var page = '';

    if (abba_campus_id == 'NULL') {
        $('#abba_view-result_display_term').html('<option value="NULL">Select Campus First</option>');

        $('#abba_display_view-result_class').html('<option value="NULL">Select Campus First</option>');

    }
    else {
        // alert(abba_campus_id);

        $('#abba_view-result_display_term').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');

        $('#abba_display_view-result_class').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');
        
        var dataString = 'abba_campus_id=' + abba_campus_id + '&abba_section_id=' + 'NULL' + '&page=' + page;

        // get term alias
        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba-get-term.php",
            data: dataString,
            //cache: false,
            success: function (output) {
                // alert(output);
                $('#abba_view-result_display_term').html(output);

            }
        });

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba-get-class.php",
            data: dataString,
            //cache: false,
            success: function (output) {
                // alert(output);
                $('#abba_display_view-result_class').html(output);
            }
        });
    }
});

$('body').on('click', '#abba_get_student_in_broadsheet_sheet', function () {

    $('#abba_get_student_in_broadsheet_sheet').html('<center><i class="fa fa-spinner fa-spin"></i></center>');

    var abba_campus_id = $('#abba_display_class_broadsheet_student_campus option:selected').val();

    var abba_campus_name = $('#abba_display_class_broadsheet_student_campus option:selected').text();

    var abba_display_session = $('#abba_display_broadsheet_session option:selected').val();

    var abba_result_display_term = $('#abba_broadsheet_display_term option:selected').val();
    
    var abba_result_display_term_name = $('#abba_broadsheet_display_term option:selected').text();

    var abba_display_result_class = $('#abba_display_broadsheet_class option:selected').val();

    var abba_display_result_class_name = $('#abba_display_broadsheet_class option:selected').text();

    var abba_get_instituion_id = localStorage.getItem("abba-stored-institution-id");

    $('#abba_display_student_broadsheet').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
    // alert(abba_display_result_class_name);

    var dataString = '&abba_campus_id=' + abba_campus_id + '&abba_display_result_class=' + abba_display_result_class + '&abba_display_session=' + abba_display_session + '&abba_result_display_term=' + abba_result_display_term + '&abba_get_instituion_id=' + abba_get_instituion_id + '&abba_campus_name=' + abba_campus_name + '&abba_result_display_term_name=' + abba_result_display_term_name + '&abba_display_result_class_name=' + abba_display_result_class_name;

    // alert(dataString);

    if (abba_campus_id == 0 || abba_campus_id == 'NULL' || abba_campus_id == '') 
    {
        
        $('#abba_get_student_in_broadsheet_sheet').html('load');

        $('#abba_display_class_broadsheet_student_campus').css('border', '1px solid orangered');

        $('#abba_display_broadsheet_class').css('border', '1px solid lightgrey');
        $('#abba_display_broadsheet_session').css('border', '1px solid lightgrey');
        $('#abba_broadsheet_display_term').css('border', '1px solid lightgrey');

        $('#abba_display_student_broadsheet').html('<div align="center"> <img src="../../assets/images/adminImg/filter.png"style="width:15%;opacity:0.7;" /><p class="pt-2 fs-6 text-secondary">Please filter to proceed.</p></div>');
    }
    else if (abba_display_session == 0 || abba_display_session == 'NULL' || abba_display_session == '') 
    {
        
        $('#abba_get_student_in_broadsheet_sheet').html('load');

        $('#abba_display_broadsheet_session').css('border', '1px solid orangered');

        $('#abba_display_class_broadsheet_student_campus').css('border', '1px solid green');
        $('#abba_broadsheet_display_term').css('border', '1px solid lightgrey');
        $('#abba_display_broadsheet_class').css('border', '1px solid lightgrey');

        $('#abba_display_student_broadsheet').html('<div align="center"> <img src="../../assets/images/adminImg/filter.png"style="width:15%;opacity:0.7;" /><p class="pt-2 fs-6 text-secondary">Please filter to proceed.</p></div>');

    }
    else if (abba_result_display_term == 0 || abba_result_display_term == 'NULL' || abba_result_display_term == '') 
    {
        
        $('#abba_get_student_in_broadsheet_sheet').html('load');

        $('#abba_broadsheet_display_term').css('border', '1px solid orangered');

        $('#abba_display_class_broadsheet_student_campus').css('border', '1px solid green');
        $('#abba_display_broadsheet_session').css('border', '1px solid green');
        $('#abba_display_broadsheet_class').css('border', '1px solid lightgrey');

        $('#abba_display_student_broadsheet').html('<div align="center"> <img src="../../assets/images/adminImg/filter.png"style="width:15%;opacity:0.7;" /><p class="pt-2 fs-6 text-secondary">Please filter to proceed.</p></div>');
    }
    else if (abba_display_result_class == 0 || abba_display_result_class == 'NULL' || abba_display_result_class == '') 
    {
        
        $('#abba_get_student_in_broadsheet_sheet').html('load');

        $('#abba_display_broadsheet_class').css('border', '1px solid orangered');

        $('#abba_display_class_broadsheet_student_campus').css('border', '1px solid green');
        $('#abba_display_broadsheet_session').css('border', '1px solid green');
        $('#abba_broadsheet_display_term').css('border', '1px solid green');

        $('#abba_display_student_broadsheet').html('<div align="center"> <img src="../../assets/images/adminImg/filter.png"style="width:15%;opacity:0.7;" /><p class="pt-2 fs-6 text-secondary">Please filter to proceed.</p></div>');
    }
    else 
    {
        $('#abba_display_class_broadsheet_student_campus').css('border', '1px solid green');
        $('#abba_display_broadsheet_class').css('border', '1px solid green');
        $('#abba_display_broadsheet_session').css('border', '1px solid green');
        $('#abba_broadsheet_display_term').css('border', '1px solid green');

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba_load_Student_broadsheet.php",
            data: dataString,
            cache: false,

            success: function (result) {
                //alert(result);
                $('#abba_display_student_broadsheet').html(result);
                $('#abba_get_student_in_broadsheet_sheet').html('load');

                $('#abba_display_class_broadsheet_student_campus').css('border', '1px solid lightgrey');
                $('#abba_display_broadsheet_class').css('border', '1px solid lightgrey');
                $('#abba_display_broadsheet_session').css('border', '1px solid lightgrey');
                $('#abba_broadsheet_display_term').css('border', '1px solid lightgrey');
            }
        });
    }
});


$('body').on('click', '#abba_get_student_in_view-result_sheet', function () {

    $('#abba_get_student_in_view-result_sheet').html('<center><i class="fa fa-spinner fa-spin"></i></center>');

    var abba_campus_id = $('#abba_display_view-result_student_campus option:selected').val();

    var abba_display_session = $('#abba_display_view-result_session option:selected').val();

    var abba_result_display_term = $('#abba_view-result_display_term option:selected').val();
    
    var abba_display_result_class = $('#abba_display_view-result_class option:selected').val();
    
    var abba_result_type = $('#abba_view_result_display_result_type option:selected').val();

    var abba_get_instituion_id = localStorage.getItem("abba-stored-institution-id");

    var usertype = 0;

    $('#abba_display_student_view-result').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
    // alert(abba_display_result_class_name);

    var dataString = '&abba_campus_id=' + abba_campus_id + '&abba_display_result_class=' + abba_display_result_class + '&abba_display_session=' + abba_display_session + '&abba_result_display_term=' + abba_result_display_term + '&abba_get_instituion_id=' + abba_get_instituion_id + '&usertype=' + usertype + '&abba_result_type=' + abba_result_type;

    // alert(dataString);

    if (abba_campus_id == 0 || abba_campus_id == 'NULL' || abba_campus_id == '') 
    {
        
        $('#abba_get_student_in_view-result_sheet').html('load');

        $('#abba_display_view-result_student_campus').css('border', '1px solid orangered');

        $('#abba_display_view-result_class').css('border', '1px solid lightgrey');
        $('#abba_display_view-result_session').css('border', '1px solid lightgrey');
        $('#abba_view-result_display_term').css('border', '1px solid lightgrey');

        $('#abba_display_student_view-result').html('<div align="center"> <img src="../../assets/images/adminImg/filter.png"style="width:15%;opacity:0.7;" /><p class="pt-2 fs-6 text-secondary">Please filter to proceed.</p></div>');
    }
    else if (abba_display_session == 0 || abba_display_session == 'NULL' || abba_display_session == '') 
    {
        
        $('#abba_get_student_in_view-result_sheet').html('load');

        $('#abba_display_view-result_session').css('border', '1px solid orangered');

        $('#abba_display_view-result_student_campus').css('border', '1px solid green');
        $('#abba_view-result_display_term').css('border', '1px solid lightgrey');
        $('#abba_display_view-result_class').css('border', '1px solid lightgrey');

        $('#abba_display_student_broadsheet').html('<div align="center"> <img src="../../assets/images/adminImg/filter.png"style="width:15%;opacity:0.7;" /><p class="pt-2 fs-6 text-secondary">Please filter to proceed.</p></div>');

    }
    else if (abba_result_display_term == 0 || abba_result_display_term == 'NULL' || abba_result_display_term == '') 
    {
         
        $('#abba_get_student_in_broadsheet_sheet').html('load');

        $('#abba_view-result_display_term').css('border', '1px solid orangered');

        $('#abba_display_view-result_student_campus').css('border', '1px solid green');
        $('#abba_display_view-result_session').css('border', '1px solid green');
        $('#abba_display_view-result_class').css('border', '1px solid lightgrey');

        $('#abba_display_student_broadsheet').html('<div align="center"> <img src="../../assets/images/adminImg/filter.png"style="width:15%;opacity:0.7;" /><p class="pt-2 fs-6 text-secondary">Please filter to proceed.</p></div>');
    }
    else if (abba_display_result_class == 0 || abba_display_result_class == 'NULL' || abba_display_result_class == '') 
    {
        
        $('#abba_get_student_in_broadsheet_sheet').html('load');

        $('#abba_display_view-result_class').css('border', '1px solid orangered');

        $('#abba_display_view-result_student_campus').css('border', '1px solid green');
        $('#abba_display_view-result_session').css('border', '1px solid green');
        $('#abba_view-result_display_term').css('border', '1px solid green');

        $('#abba_display_student_broadsheet').html('<div align="center"> <img src="../../assets/images/adminImg/filter.png"style="width:15%;opacity:0.7;" /><p class="pt-2 fs-6 text-secondary">Please filter to proceed.</p></div>');
    }
    else 
    {
        $('#abba_display_view-result_student_campus').css('border', '1px solid green');
        $('#abba_display_view-result_class').css('border', '1px solid green');
        $('#abba_display_view-result_session').css('border', '1px solid green');
        $('#abba_view-result_display_term').css('border', '1px solid green');

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba_load_Student_view_result.php",
            data: dataString,
            cache: false,

            success: function (result) {
                //alert(result);
                $('#abba_display_student_view-result').html(result);
                $('#abba_get_student_in_view-result_sheet').html('load');

                $('#abba_display_view-result_student_campus').css('border', '1px solid lightgrey');
                $('#abba_display_view-result_class').css('border', '1px solid lightgrey');
                $('#abba_display_view-result_session').css('border', '1px solid lightgrey');
                $('#abba_view-result_display_term').css('border', '1px solid lightgrey');
            }
        });
    }
});


// change of campus for behavoiural
$('body').on('change', '#abba_display_class_behavioural_student_campus', function () {

    var abba_campus_id = $('#abba_display_class_behavioural_student_campus option:selected').val();

    var page = 'behavioural';

    if (abba_campus_id == 'NULL') {
        $('#abba_behavioural_display_term').html('<option value="NULL">Select Campus First</option>');

        $('#abba_display_behavioural_class').html('<option value="NULL">Select Campus First</option>');

    }
    else {
        // alert(abba_campus_id);

        $('#abba_behavioural_display_term').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');

        $('#abba_display_behavioural_class').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');
        
        var dataString = 'abba_campus_id=' + abba_campus_id + '&abba_section_id=' + 'NULL' + '&page=' + page;

        // get term alias
        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba-get-term.php",
            data: dataString,
            //cache: false,
            success: function (output) {
                // alert(output);
                $('#abba_behavioural_display_term').html(output);

            }
        });

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba-get-class.php",
            data: dataString,
            //cache: false,
            success: function (output) {
                // alert(output);
                $('#abba_display_behavioural_class').html(output);
            }
        });
    }
});


$('body').on('click', '#abba_get_student_in_behavioural_sheet', function () {

    abba_load_filter_behavioural_sheet();
});


function abba_load_filter_behavioural_sheet() {

    $('#abba_get_student_in_behavioural_sheet').html('<center><i class="fa fa-spinner fa-spin"></i></center>');

    var abba_campus_id = $('#abba_display_class_behavioural_student_campus option:selected').val();

    var abba_display_session = $('#abba_display_behavioural_session option:selected').val();

    var abba_result_display_term = $('#abba_behavioural_display_term option:selected').val();

    var abba_display_result_class = $('#abba_display_behavioural_class option:selected').val();

    var abba_get_instituion_id = localStorage.getItem("abba-stored-institution-id");

    $('#abba_display_student_behavioural').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
    
    var dataString = 'abba_campus_id=' + abba_campus_id + '&abba_display_result_class=' + abba_display_result_class + '&abba_display_session=' + abba_display_session + '&abba_result_display_term=' + abba_result_display_term + '&abba_get_instituion_id=' + abba_get_instituion_id;

    // alert(dataString);

    if (abba_campus_id == 0 || abba_campus_id == 'NULL' || abba_campus_id == '') {
        
        $('#abba_get_student_in_behavioural_sheet').html('load');

        $('#abba_display_class_result_student_campus').css('border', '1px solid orangered');

        $('#abba_display_result_class').css('border', '1px solid lightgrey');
        $('#abba_display_behavioural_session').css('border', '1px solid lightgrey');
        $('#abba_result_display_term').css('border', '1px solid lightgrey');

        $('#abba_display_student_behavioural').html('<div align="center"> <img src="../../assets/images/adminImg/filter.png"style="width:15%;opacity:0.7;" /><p class="pt-2 fs-6 text-secondary">Please filter to proceed.</p></div>');
    }
    else if (abba_display_session == 0 || abba_display_session == 'NULL' || abba_display_session == '') {
        
        $('#abba_get_student_in_behavioural_sheet').html('load');

        $('#abba_display_behavioural_session').css('border', '1px solid orangered');

        $('#abba_display_class_result_student_campus').css('border', '1px solid green');
        $('#abba_result_display_term').css('border', '1px solid lightgrey');
        $('#abba_display_result_class').css('border', '1px solid lightgrey');

        $('#abba_display_student_behavioural').html('<div align="center"> <img src="../../assets/images/adminImg/filter.png"style="width:15%;opacity:0.7;" /><p class="pt-2 fs-6 text-secondary">Please filter to proceed.</p></div>');

    }
    else if (abba_result_display_term == 0 || abba_result_display_term == 'NULL' || abba_result_display_term == '') {
        
        $('#abba_get_student_in_behavioural_sheet').html('load');

        $('#abba_behavioural_display_term').css('border', '1px solid orangered');

        $('#abba_display_class_behavioural_student_campus').css('border', '1px solid green');
        $('#abba_display_behavioural_session').css('border', '1px solid green');
        $('#abba_display_behavioural_class').css('border', '1px solid lightgrey');

        $('#abba_display_student_behavioural').html('<div align="center"> <img src="../../assets/images/adminImg/filter.png"style="width:15%;opacity:0.7;" /><p class="pt-2 fs-6 text-secondary">Please filter to proceed.</p></div>');
    }
    else if (abba_display_result_class == 0 || abba_display_result_class == 'NULL' || abba_display_result_class == '') {
        
        $('#abba_get_student_in_behavioural_sheet').html('load');

        $('#abba_display_behavioural_class').css('border', '1px solid orangered');

        $('#abba_display_class_behavioural_student_campus').css('border', '1px solid green');
        $('#abba_display_behavioural_session').css('border', '1px solid green');
        $('#abba_behavioural_display_term').css('border', '1px solid green');

        $('#abba_display_student_behavioural').html('<div align="center"> <img src="../../assets/images/adminImg/filter.png"style="width:15%;opacity:0.7;" /><p class="pt-2 fs-6 text-secondary">Please filter to proceed.</p></div>');
    }
    else {
        $('#abba_display_class_behavioural_student_campus').css('border', '1px solid green');
        $('#abba_display_behavioural_class').css('border', '1px solid green');
        $('#abba_display_behavioural_session').css('border', '1px solid green');
        $('#abba_behavioural_display_term').css('border', '1px solid green');
        $('#abba_display_behavioural_subject').css('border', '1px solid green');

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba_load_Live_Student_behavioural_assessment.php",
            data: dataString,
            cache: false,

            success: function (result) {
                //alert(result);
                $('#abba_display_student_behavioural').html(result);

                $('#abba_get_student_in_behavioural_sheet').html('load');

                $('#abba_display_class_behavioural_student_campus').css('border', '1px solid lightgrey');
                $('#abba_display_behavioural_class').css('border', '1px solid lightgrey');
                $('#abba_display_behavioural_session').css('border', '1px solid lightgrey');
                $('#abba_behavioural_display_term').css('border', '1px solid lightgrey');
            }
        });
    }
}



// change of campus for comments
$('body').on('change', '#abba_display_comments_student_campus', function () {

    var abba_campus_id = $('#abba_display_comments_student_campus option:selected').val();

    var page = '';

    if (abba_campus_id == 'NULL') {
        $('#abba_comments_display_term').html('<option value="NULL">Select Campus First</option>');

    }
    else {
        // alert(abba_campus_id);

        $('#abba_comments_display_term').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');

        var dataString = 'abba_campus_id=' + abba_campus_id + '&abba_section_id=' + 'NULL' + '&page=' + page;

        // get term alias
        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba-get-term.php",
            data: dataString,
            //cache: false,
            success: function (output) {
                // alert(output);
                $('#abba_comments_display_term').html(output);

            }
        });
    }
});


// change of campus for comments
$('body').on('change', '#abba_display_british_student_campus', function () {

    var abba_campus_id = $('#abba_display_british_student_campus option:selected').val();

    var page = '';

    if (abba_campus_id == 'NULL') {
        $('#abba_british_display_term').html('<option value="NULL">Select Campus First</option>');
        $('#abba_display_british_class').html('<option value="NULL">Select Campus First</option>');

    }
    else {
        // alert(abba_campus_id);

        $('#abba_british_display_term').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');
        $('#abba_display_british_class').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');
        
        var dataString = 'abba_campus_id=' + abba_campus_id + '&abba_section_id=' + 'NULL' + '&page=' + page;

        // get term alias
        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba-get-term.php",
            data: dataString,
            //cache: false,
            success: function (output) {
                // alert(output);
                $('#abba_british_display_term').html(output);

                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/british_result/abba-get-british-class.php",
                    data: dataString,
                    success: function (output) {
                        // alert(output);
                        $('#abba_display_british_class').html(output);
                    }
                });

            }
        });
    }
});



// change of usertype for comments
$('body').on('change', '#abba_comments_usertype', function () {

    var abba_campus_id = $('#abba_display_comments_student_campus option:selected').val();
    
    var abba_comments_usertype = $('#abba_comments_usertype option:selected').val();

    if (abba_campus_id == 'NULL') {

        $('#abba_comments_staff').html('<option value="NULL">Select Campus First</option>');

    }
    else {
        // alert(abba_campus_id);

        $('#abba_comments_staff').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');
        
        var dataString = 'abba_campus_id=' + abba_campus_id + '&abba_comments_usertype=' + abba_comments_usertype;

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba-get-staff.php",
            data: dataString,
            //cache: false,
            success: function (output) {
                // alert(output);
                $('#abba_comments_staff').html(output);
            }
        });
    }
});



// change of campus for staff
$('body').on('change', '#abba_comments_staff', function () {

    var abba_campus_id = $('#abba_display_comments_student_campus option:selected').val();
    
    var abba_comments_usertype = $('#abba_comments_usertype option:selected').val();
    
    var abba_comments_staff = $('#abba_comments_staff option:selected').val();

    if (abba_comments_staff == 'NULL') {

        $('#abba_display_comments_class').html('<option value="NULL">Select Campus First</option>');

    }
    else {
        // alert(abba_campus_id);

        $('#abba_display_comments_class').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');
        
        var dataString = 'abba_campus_id=' + abba_campus_id + '&abba_comments_usertype=' + abba_comments_usertype + '&abba_comments_staff=' + abba_comments_staff;

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba-get-comment-class.php",
            data: dataString,
            //cache: false,
            success: function (output) {
                // alert(output);
                $('#abba_display_comments_class').html(output);
            }
        });
    }
});



$('body').on('click', '#abba_get_student_comment_list', function () {

    $('#abba_get_student_comment_list').html('<center><i class="fa fa-spinner fa-spin"></i></center>');

    var abba_campus_id = $('#abba_display_comments_student_campus option:selected').val();

    var abba_display_session = $('#abba_display_comments_session option:selected').val();

    var abba_result_display_term = $('#abba_comments_display_term option:selected').val();
    
    var abba_display_result_class = $('#abba_display_comments_class option:selected').val();
    
    var abba_result_type = $('#abba_comments_display_result_type option:selected').val();
    
    var abba_comments_usertype = $('#abba_comments_usertype option:selected').val();
    
    var abba_comments_staff = $('#abba_comments_staff option:selected').val();

    var abba_get_instituion_id = localStorage.getItem("abba-stored-institution-id");

    var usertype = 0;

    $('#abba_display_student_comments').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
    // alert(abba_display_result_class_name);

    var dataString = '&abba_campus_id=' + abba_campus_id + '&abba_display_result_class=' + abba_display_result_class + '&abba_display_session=' + abba_display_session + '&abba_result_display_term=' + abba_result_display_term + '&abba_get_instituion_id=' + abba_get_instituion_id + '&usertype=' + usertype + '&abba_result_type=' + abba_result_type + '&abba_comments_usertype=' + abba_comments_usertype + '&abba_comments_staff=' + abba_comments_staff;

    // alert(dataString);

    if (abba_campus_id == 0 || abba_campus_id == 'NULL' || abba_campus_id == '') 
    {
        
        $('#abba_get_student_comment_list').html('load');

        $('#abba_display_comments_student_campus').css('border', '1px solid orangered');

        $('#abba_display_comments_class').css('border', '1px solid lightgrey');
        $('#abba_display_comments_session').css('border', '1px solid lightgrey');
        $('#abba_comments_display_term').css('border', '1px solid lightgrey');

        $('#abba_display_student_comments').html('<div align="center"> <img src="../../assets/images/adminImg/filter.png"style="width:15%;opacity:0.7;" /><p class="pt-2 fs-6 text-secondary">Please filter to proceed.</p></div>');
    }
    else if (abba_display_session == 0 || abba_display_session == 'NULL' || abba_display_session == '') 
    {
        
        $('#abba_get_student_comment_list').html('load');

        $('#abba_display_comments_session').css('border', '1px solid orangered');

        $('#abba_display_comments_student_campus').css('border', '1px solid green');
        $('#abba_comments_display_term').css('border', '1px solid lightgrey');
        $('#abba_display_comments_class').css('border', '1px solid lightgrey');

        $('#abba_display_student_comments').html('<div align="center"> <img src="../../assets/images/adminImg/filter.png"style="width:15%;opacity:0.7;" /><p class="pt-2 fs-6 text-secondary">Please filter to proceed.</p></div>');

    }
    else if (abba_result_display_term == 0 || abba_result_display_term == 'NULL' || abba_result_display_term == '') 
    {
         
        $('#abba_get_student_comment_list').html('load');

        $('#abba_comments_display_term').css('border', '1px solid orangered');

        $('#abba_display_comments_student_campus').css('border', '1px solid green');
        $('#abba_display_comments_session').css('border', '1px solid green');
        $('#abba_display_comments_class').css('border', '1px solid lightgrey');

        $('#abba_display_student_comments').html('<div align="center"> <img src="../../assets/images/adminImg/filter.png"style="width:15%;opacity:0.7;" /><p class="pt-2 fs-6 text-secondary">Please filter to proceed.</p></div>');
    }
    else if (abba_display_result_class == 0 || abba_display_result_class == 'NULL' || abba_display_result_class == '') 
    {
        
        $('#abba_get_student_comment_list').html('load');

        $('#abba_display_comments_class').css('border', '1px solid orangered');

        $('#abba_display_comments_student_campus').css('border', '1px solid green');
        $('#abba_display_comments_session').css('border', '1px solid green');
        $('#abba_comments_display_term').css('border', '1px solid green');

        $('#abba_display_student_comments').html('<div align="center"> <img src="../../assets/images/adminImg/filter.png"style="width:15%;opacity:0.7;" /><p class="pt-2 fs-6 text-secondary">Please filter to proceed.</p></div>');
    }
    else 
    {
        $('#abba_display_comments_student_campus').css('border', '1px solid green');
        $('#abba_display_comments_class').css('border', '1px solid green');
        $('#abba_display_comments_session').css('border', '1px solid green');
        $('#abba_comments_display_term').css('border', '1px solid green');

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba_load_Student_comments.php",
            data: dataString,
            cache: false,

            success: function (result) {
                // alert(result);
                $('#abba_display_student_comments').html(result);
                $('#abba_get_student_comment_list').html('load');

                $('#abba_display_comments_student_campus').css('border', '1px solid lightgrey');
                $('#abba_display_comments_class').css('border', '1px solid lightgrey');
                $('#abba_display_comments_session').css('border', '1px solid lightgrey');
                $('#abba_comments_display_term').css('border', '1px solid lightgrey');
            }
        });
    }
});



$('body').on('click', '.abba_save_comments', function () {

    $('#abba_save_comments').html('<center><i class="fa fa-spinner fa-spin"></i></center>');
    
    var stud = $(this).data('stud');

    var camp = $(this).data('camp');

    var session = $(this).data('session');
    
    var term = $(this).data('term');
    
    var usertype = $(this).data('usertype');
    
    var staffid = $(this).data('staffid');

    var comment = $('#stud_'+stud).val();

    var resulttype = $(this).data('resulttype');
    
    // alert(abba_display_result_class_name);

    var dataString = {stud:stud,camp:camp,session:session,term:term,usertype:usertype,staffid:staffid,comment:comment,resulttype:resulttype};

    // alert(dataString);

    if (comment == 0 || comment == 'NULL' || comment == '') 
    {
        $('#abba_save_comments').html('<i class="fas fa-save"> Save</i>');

        $.wnoty({
            type: 'warning',
            message: 'Enter a comment to save.',
            autohideDelay: 5000, // 5 seconds
            position: 'top-right',
            autohide: true
        });
    }
    else 
    {
        
        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba_save_comments.php",
            data: dataString,
            cache: false,

            success: function (result) {
                // alert(result);
                $('#abba_save_comments').html('<i class="fas fa-save"> Save</i>');

                $.wnoty({
                    type: 'success',
                    message: 'Comment saved successfully.',
                    autohideDelay: 5000, // 5 seconds
                    position: 'top-right',
                    autohide: true
                });
            }
        });
    }
});

$('body').on('click', '#abba_get_student_british_list', function () {

    $('#abba_get_student_british_list').html('<center><i class="fa fa-spinner fa-spin"></i></center>');

    var abba_campus_id = $('#abba_display_british_student_campus option:selected').val();

    var abba_display_session = $('#abba_display_british_session option:selected').val();

    var abba_result_display_term = $('#abba_british_display_term option:selected').val();
    
    var abba_display_result_class = $('#abba_display_british_class option:selected').val();
    
    var abba_result_type = $('#abba_british_display_result_type option:selected').val();
    
    var abba_get_instituion_id = localStorage.getItem("abba-stored-institution-id");

    var usertype = 0;

    $('#abba_display_student_british').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
    // alert(abba_display_result_class_name);

    var dataString = '&abba_campus_id=' + abba_campus_id + '&abba_display_result_class=' + abba_display_result_class + '&abba_display_session=' + abba_display_session + '&abba_result_display_term=' + abba_result_display_term + '&abba_get_instituion_id=' + abba_get_instituion_id + '&usertype=' + usertype + '&abba_result_type=' + abba_result_type;

    // alert(dataString);

    if (abba_campus_id == 0 || abba_campus_id == 'NULL' || abba_campus_id == '') 
    {
        
        $('#abba_get_student_british_list').html('load');

        $('#abba_display_british_student_campus').css('border', '1px solid orangered');

        $('#abba_display_british_class').css('border', '1px solid lightgrey');
        $('#abba_display_british_session').css('border', '1px solid lightgrey');
        $('#abba_british_display_term').css('border', '1px solid lightgrey');

        $('#abba_display_student_british').html('<div align="center"> <img src="../../assets/images/adminImg/filter.png"style="width:15%;opacity:0.7;" /><p class="pt-2 fs-6 text-secondary">Please filter to proceed.</p></div>');
    }
    else if (abba_display_session == 0 || abba_display_session == 'NULL' || abba_display_session == '') 
    {
        
        $('#abba_get_student_british_list').html('load');

        $('#abba_display_british_session').css('border', '1px solid orangered');

        $('#abba_display_british_student_campus').css('border', '1px solid green');
        $('#abba_british_display_term').css('border', '1px solid lightgrey');
        $('#abba_display_british_class').css('border', '1px solid lightgrey');

        $('#abba_display_student_british').html('<div align="center"> <img src="../../assets/images/adminImg/filter.png"style="width:15%;opacity:0.7;" /><p class="pt-2 fs-6 text-secondary">Please filter to proceed.</p></div>');

    }
    else if (abba_result_display_term == 0 || abba_result_display_term == 'NULL' || abba_result_display_term == '') 
    {
         
        $('#abba_get_student_british_list').html('load');

        $('#abba_british_display_term').css('border', '1px solid orangered');

        $('#abba_display_british_student_campus').css('border', '1px solid green');
        $('#abba_display_british_session').css('border', '1px solid green');
        $('#abba_display_british_class').css('border', '1px solid lightgrey');

        $('#abba_display_student_british').html('<div align="center"> <img src="../../assets/images/adminImg/filter.png"style="width:15%;opacity:0.7;" /><p class="pt-2 fs-6 text-secondary">Please filter to proceed.</p></div>');
    }
    else if (abba_display_result_class == 0 || abba_display_result_class == 'NULL' || abba_display_result_class == '') 
    {
        
        $('#abba_get_student_british_list').html('load');

        $('#abba_display_british_class').css('border', '1px solid orangered');

        $('#abba_display_british_student_campus').css('border', '1px solid green');
        $('#abba_display_british_session').css('border', '1px solid green');
        $('#abba_british_display_term').css('border', '1px solid green');

        $('#abba_display_student_british').html('<div align="center"> <img src="../../assets/images/adminImg/filter.png"style="width:15%;opacity:0.7;" /><p class="pt-2 fs-6 text-secondary">Please filter to proceed.</p></div>');
    }
    else 
    {
        $('#abba_display_british_student_campus').css('border', '1px solid green');
        $('#abba_display_british_class').css('border', '1px solid green');
        $('#abba_display_british_session').css('border', '1px solid green');
        $('#abba_british_display_term').css('border', '1px solid green');

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/british_result/abba_load_Student_british.php",
            data: dataString,
            cache: false,

            success: function (result) {
                // alert(result);
                $('#abba_display_student_british').html(result);
                $('#abba_get_student_british_list').html('load');

                $('#abba_display_british_student_campus').css('border', '1px solid lightgrey');
                $('#abba_display_british_class').css('border', '1px solid lightgrey');
                $('#abba_display_british_session').css('border', '1px solid lightgrey');
                $('#abba_british_display_term').css('border', '1px solid lightgrey');
            }
        });
    }
});


$('body').on('click', '.british_modal_id', function () {
    
    $('.display_british_fields').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
    
    var stud = $(this).data('stud');
    var camp = $(this).data('camp');
    var session = $(this).data('session');
    var term = $(this).data('term');
    var resulttype = $(this).data('resulttype');
    var class_id = $(this).data('class');
    var inst = $(this).data('inst');

    $('#britishModal').modal('show');

    $.ajax({
                       
        method:'post',
        url:'../../controller/scripts/owner/british_result/load_student_british_result.php',
        data:{
            stud:stud,
            camp:camp,
            session:session,
            term:term,
            resulttype:resulttype,
            class_id:class_id,
            inst:inst
        },
        success: function(outputdata){

            $('.display_british_fields').html(outputdata);
        }

    });

});



$("body").on("click",".upload_students",function () {
      
    var InstitutionID = localStorage.getItem("abba-stored-institution-id");
    var Session = $(".sessionName").val();
    var TermOrSemesterID = $(".TermOrSemesterID").val();
    var ClassOrDepartmentID = $(".ClassOrDepartmentID").val();

    var user_id = $("#user_id").val();
    var user_type = $("#user_type").val();

    var abba_campus_id = $('#abba_display_british_student_campus option:selected').val();

    var StudentID = [];
    var CoreAreaID = [];
    var remarkEssentialAspectsID = [];
    var AssessmentKeyID = [];
    var AssessmentKeyIDstdid = [];
    var students_assessmentessentialid = [];
    var essentialremark = [];
    var remark = [];
    var remarkcorearea = [];
    var teacher_comment = [];
    var teacher_comment_corearea = [];
    var teacher_comment_studid = [];
    var overall_comment_studid = [];
    var overall_comment = [];
    var remarkstudid = [];

    $(".coreareaid").each(function(){
        CoreAreaID.push($(this).val());
        
    });
  
    
    $(".studentid").each(function(){
        StudentID.push($(this).val());
    });
    console.log(StudentID);

    $(".Assessmentid:checked").each(function(){

        AssessmentKeyID.push($(this).val());
        AssessmentKeyIDstdid.push($(this).data('studentid'));
        students_assessmentessentialid.push($(this).data("id"));
  
    });
    console.log(students_assessmentessentialid);
    
    $(".remark").each(function(){
        remark.push($(this).val()+' ####');
        remarkcorearea.push($(this).data('corearea'));
        remarkEssentialAspectsID.push($(this).data('id'));
        remarkstudid.push($(this).data('studid'));
    });
         
    console.log(remark);
       
    $(".teachers_comment").each(function(){
        teacher_comment.push($(this).val()+' ####');
        teacher_comment_corearea.push($(this).data('corearea'));
        teacher_comment_studid.push($(this).data('stud'));
        
    });

    $(".overallcomment").each(function(){
        overall_comment_studid.push($(this).data('id'));
        overall_comment.push($(this).val()+' ####');
    });
    
    $('.upload_students').html('<center><i class="fas fa-circle-o-notch fa-spin"></i> Saving..</center>'); 
    
    get_longitude_and_latitude(function(coordinates) {
        // Use the coordinates here
        var latitude = coordinates.latitude;
        var longitude = coordinates.longitude;

    // alert('InstitutionID='+InstitutionID+'&Session='+Session+'&TermOrSemesterID='+TermOrSemesterID +
    //         '&ClassOrDepartmentID='+ClassOrDepartmentID+'&StudentID='+StudentID+
    //         '&remarkEssentialAspectsID='+remarkEssentialAspectsID+'&AssessmentKeyID='+AssessmentKeyID
    //         +'&AssessmentKeyIDstdid='+AssessmentKeyIDstdid+'&students_assessmentessentialid='+students_assessmentessentialid
    //         +'&remark='+remark+'&remarkcorearea='+remarkcorearea+'&teacher_comment='+teacher_comment
    //         +'&teacher_comment_corearea='+teacher_comment_corearea+'&teacher_comment_studid='+teacher_comment_studid
    //         +'&overall_comment_studid='+overall_comment_studid+'&overall_comment='+overall_comment+'&remarkstudid='+remarkstudid+'&abba_campus_id='+abba_campus_id+'&longitude='+longitude+'&latitude='+latitude+'&user_id='+user_id+'&user_type='+user_type);
        
        $.ajax({
            type : 'post',
            url : '../../controller/scripts/owner/british_result/update_british_result.php',
            data : 'InstitutionID='+InstitutionID+'&Session='+Session+'&TermOrSemesterID='+TermOrSemesterID +
            '&ClassOrDepartmentID='+ClassOrDepartmentID+'&StudentID='+StudentID+
            '&remarkEssentialAspectsID='+remarkEssentialAspectsID+'&AssessmentKeyID='+AssessmentKeyID
            +'&AssessmentKeyIDstdid='+AssessmentKeyIDstdid+'&students_assessmentessentialid='+students_assessmentessentialid
            +'&remark='+remark+'&remarkcorearea='+remarkcorearea+'&teacher_comment='+teacher_comment
            +'&teacher_comment_corearea='+teacher_comment_corearea+'&teacher_comment_studid='+teacher_comment_studid
            +'&overall_comment_studid='+overall_comment_studid+'&overall_comment='+overall_comment+'&remarkstudid='+remarkstudid+'&abba_campus_id='+abba_campus_id+'&longitude='+longitude+'&latitude='+latitude+'&user_id='+user_id+'&user_type='+user_type,
            success: function(result) {
                
                // alert(result);

                $.wnoty({
                    type: 'success',
                    message: 'Result saved successfully.',
                    autohideDelay: 5000, // 5 seconds
                    position: 'top-right',
                    autohide: true
                });

                $('.upload_students').html('<i class="fas fa-save"></i> Save');
                
            }
        });
    });

    
});