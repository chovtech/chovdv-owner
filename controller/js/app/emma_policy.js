$(document).ready(function() {
    var emma_institution = $(".abba-change-institution").val();
    $('.mymce').summernote();
});

$("body").on("click",".emma_create_policy",function(){
    var emma_checkbox_policy = $(".emma_checkedboxes_for_policy:checked").val();
    var emma_checkbox_institution_policy = $(".abba-change-institution").val();

    var datastring = "emma_check_policy_box=" + emma_checkbox_policy + "&emma_check_policy_box_institution=" + emma_checkbox_institution_policy;

    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/policy/emma_disable_checkbox_for_policy.php',
        data:datastring,
        success:function(result){
            if(result == 1)
            {
                $('#checkemmaparent').prop('disabled', false);
            }
            else if(result == 11)
            {
                $('#checkemmaparent').prop('disabled', true);
            }
            else if(result == 2)
            {
                $('#checkemmastaff').prop('disabled', false);
            }
            else if(result == 22)
            {
                $('#checkemmastaff').prop('disabled', true);
            }
            else if(result == 3){
                $('#checkemmastudents').prop('disabled', false);
            }
            else if(result == 33)
            {
                $('#checkemmastudents').prop('disabled', true);
            }
            else if(result == 1122)
            {
                $('#checkemmaparent').prop('disabled', false);
                $('#checkemmastaff').prop('disabled', false);
            }
            else if(result == 1133)
            {
                $('#checkemmaparent').prop('disabled', false);
                $('#checkemmastudents').prop('disabled', false);
            }
            else if(result == 13)
            {
                $('#checkemmaparent').prop('disabled', true);
                $('#checkemmastudents').prop('disabled', true);
            }
            else if(result == 23)
            {
                $('#checkemmaparent').prop('disabled', true);
                $('#checkemmastaff').prop('disabled', true);
            }
            else if(result == 112)
            {
                $('#checkemmaparent').prop('disabled', true);
                $('#checkemmastaff').prop('disabled', false);
            }
            else if(result == 113)
            {
                $('#checkemmaparent').prop('disabled', true);
                $('#checkemmastudents').prop('disabled', false);
            }
            else if(result == 21)
            {
                $('#checkemmaparent').prop('disabled', true);
                $('#checkemmastaff').prop('disabled', true);
            }
            else if(result == 23)
            {
                $('#checkemmastudenst').prop('disabled', true);
                $('#checkemmastaff').prop('disabled', true);
            }
            else if(result == 2211)
            {
                $('#checkemmaparent').prop('disabled', false);
                $('#checkemmastaff').prop('disabled', false);
            }
            else if(result == 2233)
            {
                $('#checkemmastudents').prop('disabled', false);
                $('#checkemmastaff').prop('disabled', false);
            }
            else if(result == 211)
            {
                $('#checkemmaparent').prop('disabled', false);
                $('#checkemmastaff').prop('disabled', true);
            }
            else if(result == 233)
            {
                $('#checkemmastudents').prop('disabled', false);
                $('#checkemmastaff').prop('disabled', true);
            }
            else if(result == 223)
            {
                $('#checkemmastudents').prop('disabled', true);
                $('#checkemmastaff').prop('disabled', false);
            }
            else if(result == 332)
            {
                $('#checkemmastudenst').prop('disabled', false);
                $('#checkemmastaff').prop('disabled', true);
            }
            else if(result == 331)
            {
                $('#checkemmastudents').prop('disabled', false);
                $('#checkemmaparent').prop('disabled', true);
            }
            else if(result == 311)
            {
                $('#checkemmastudents').prop('disabled', true);
                $('#checkemmaparent').prop('disabled', false);
            }
            else if(result == 322)
            {
                $('#checkemmastudents').prop('disabled', true);
                $('#checkemmastaff').prop('disabled', false);
            }
            else if(result == 321)
            {
                $('#checkemmastudents').prop('disabled', true);
                $('#checkemmastaff').prop('disabled', true);
                $('#checkemmaparent').prop('disabled', true);
            }
            else if(result == 332211)
            {
                $('#checkemmastudents').prop('disabled', true);
                $('#checkemmastaff').prop('disabled', true);
                $('#checkemmaparent').prop('disabled', true);
            }
            else if(result == 3211)
            {
                $('#checkemmastudents').prop('disabled', true);
                $('#checkemmastaff').prop('disabled', true);
                $('#checkemmaparent').prop('disabled', false);
            }
            else if(result == 3221){
                $('#checkemmastudents').prop('disabled', true);
                $('#checkemmastaff').prop('disabled', false);
                $('#checkemmaparent').prop('disabled', true);
            }
            else if(result == 3321){
                $('#checkemmastudents').prop('disabled', false);
                $('#checkemmastaff').prop('disabled', true);
                $('#checkemmaparent').prop('disabled', true);
            }
            else
            {

            }
        }
    })
});

// Function to add a new accordion section
function addNewAccordion() {
    var newAccordion = `
        <div class="accordion-item border mt-4">
                <i class="fas fa-times text-danger emma_remove_section float-end" style="cursor:pointer;"></i>
                <h2 class="accordion-header" id="heading${$('.accordion-item').length + 1}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${$('.accordion-item').length + 1}" aria-expanded="false" aria-controls="collapse${$('.accordion-item').length + 1}">
                        <i class="fas fa-plus-circle text-success"> Add Section (optional)</i>
                    </button>
                </h2>
            </div>
            <div id="collapse${$('.accordion-item').length + 1}" class="accordion-collapse collapse" aria-labelledby="heading${$('.accordion-item').length + 1}" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="border">
                        <div class="p-3">
                            <div class="mt-1 add-new-icon">
                                <div class="form-group abba_local-forms mt-3">
                                    <input class="form-control emma_section_for_policy" id="floatingTextareaforsection${$('.accordion-item').length + 1}" />
                                    <label for="floatingTextarea${$('.accordion-item').length + 1}" class="fw-bolder">Section</label>
                                </div>
                                <div class="form-group abba_local-forms">
                                    <textarea class="form-control mymce floatingTextareaforsection_description" placeholder="Description" id="floatingTextareafordescription${$('.accordion-item').length + 1}"></textarea>
                                    <label for="floatingTextarea${$('.accordion-item').length + 1}" class="fw-bolder">Description</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>`;

    $('#accordionExample').append(newAccordion);
    $('.mymce').summernote();
}

$("body").on("click", ".emma_create_policy_button", function () {

    var emma_policy_title = $(".emma_policy_title").val();
    var emma_policy_description = $("#floatingTextareafordescription").val();
    var emma_policy_publish = 1;
    var emma_policy_institution = $(".abba-change-institution").val();
    var emmapolicycheckboxes = [];
    var emmapolicysections = [];
    var emmapolicydescriptionsforsections = [];

    $.each($(".emma_checkedboxes_for_policy:checked"), function () {
        var emmagetthisusertypefromcheckbox = $(this).val();
        if (emmagetthisusertypefromcheckbox != 'NULL' && emmagetthisusertypefromcheckbox != '') {
            emmapolicycheckboxes.push($(this).val());
        }
    });

    $.each($(".emma_section_for_policy"), function () {
        var emma_policy_for_section = $(this).val();
        if (emma_policy_for_section != 'NULL' && emma_policy_for_section != '') {
            var splitStringforsection = $(this).val() + '###';
            emmapolicysections.push(splitStringforsection);
        }
    });

    $.each($(".floatingTextareaforsection_description"), function (index) {
        var emma_policy_description_for_section = $(this).val();
        if (emma_policy_description_for_section != 'NULL' && emma_policy_description_for_section != '') {
            if (index < $(".floatingTextareaforsection_description").length - 1) {
                emmapolicydescriptionsforsections.push($(this).val() + '###');
            } else {
                emmapolicydescriptionsforsections.push($(this).val());
            }
        }
    });

    if (emmapolicycheckboxes.length === 0) {
        $.wnoty({
            type: 'warning',
            message: "At least one stakeholder must be checked",
            autohideDelay: 5000
        });
    } else if (emma_policy_title == '' || emma_policy_title == 'NULL') {
        $.wnoty({
            type: 'warning',
            message: "Add Title",
            autohideDelay: 5000
        });
    } else if (emma_policy_description == '' || emma_policy_description == 'NULL') {
        $.wnoty({
            type: 'warning',
            message: "Add Description",
            autohideDelay: 5000
        });
    } else {
        var datastring = "emma_policy_title=" + emma_policy_title + "&emma_policy_description=" + emma_policy_description + "&emma_policy_publish=" + emma_policy_publish +
            "&emma_policy_institution=" + emma_policy_institution + "&emmapolicycheckboxes=" + emmapolicycheckboxes +
            "&emmapolicysections=" + emmapolicysections + "&emmapolicydescriptionsforsections=" + emmapolicydescriptionsforsections;

        emmapolicycheckboxes = emmapolicycheckboxes.toString();
        emmapolicysections = emmapolicysections.toString();
        emmapolicydescriptionsforsections = emmapolicydescriptionsforsections.toString();

        $.ajax({
            type: 'POST',
            url: '../../controller/scripts/owner/policy/emma_create_for_policy.php',
            data: datastring,
            success: function (value) {
                if (value == 1) {
                    $.wnoty({
                        type: 'success',
                        message: "Policy Set successfully.",
                        autohideDelay: 5000
                    });

                    $('#floatingTextareafordescription').summernote('code', '');
                    $('.floatingTextareaforsection_description').summernote('code', '');
                    $(".emma_policy_title").val('');
                    $(".emma_section_for_policy").val('');
                    $("#emma_create_policy_modal").modal('hide');

                } else {
                    $.wnoty({
                        type: 'warning',
                        message: "Policy Not Set.",
                        autohideDelay: 5000

                    });
                }
            }
        });
    }
});

$("body").on("click",".emmacollapsesectionforaddnew",function(){
    addNewAccordion();
});

$("body").on("click",".emma_remove_section",function(){
    $(this).closest('.accordion-item').remove();
});

$("body").on("click", ".emma_remove_section", function () {
    $(this).parent().remove(); // Remove the section
  });

$(document).ready(function() {

    var emma_institution = $(".abba-change-institution").val();

    $(".emmapolicycard").html('<div align="center"><div class="spinner-border text-primary mt-5" role="status"><span class="visually-hidden">Loading...</span></div></div>');

    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/policy/emma_get_card_for_policy.php',
        data:{emma_send_institution:emma_institution},
        success:function(values){
            $(".emmapolicycard").html(values);
        }
    });
});

function emma_add_section_for_edit() {
    var emma_add_new_session_for_edit =
    `   <div class="accordion" id="accordionExampleforedit">
            <i class="fas fa-times text-danger float-end emma_remove_section_for_edit" style="cursor:pointer;"></i>

                <div class="accordion-item accordion_item_edit mt-3">
                    <h6 class="accordion-header" id="headingOne" id="heading${$('.accordion-item_edit').length + 1}>
                    

                    <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#accordion-item_edit" aria-expanded="false" aria-controls="collapseOne">
                    <i class="fas fa-plus-circle text-success p-3"> Add Section(optional)</i>
                    </button>

                    </h6>
                    <div id="accordion-item_edit" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExampleforedit">
                        <div class="accordion-body">
                            <div class="border">
                                <div class="p-3">
                                    <div class="mt-1 add-new-icon">
                                        <div class="form-group abba_local-forms mt-3">
                                            <input class="form-control emma_section_for_policy_for_edit" id="floatingTextareaforsection" placeholder="Section"></input>
                                            <label for="floatingTextareaforsection_for_edit${$('.accordion-item_edit').length + 1}" class="fw-bolder">Section</label>
                                    </div>

                                    <div class="form-group abba_local-forms">
                                        <textarea class="form-control mymce floatingTextareaforsection_description_edit" placeholder="Description" id="floatingTextareafordescriptionsedit${$('.accordion-item_edit').length + 1}></textarea>
                                        <label for="floatingTextareafordescriptionsedit${$('.accordion-item_edit').length + 1}" class="fw-bolder">Description</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>`;

    // Append the new section for edit
    var $newSectionforedit = $(document.createElement('div')).append(emma_add_new_session_for_edit);
    $('#emmaloadcontentnewforedit').append($newSectionforedit);

    $('.mymce').summernote();
}


$("body").on("click",".emmacollapsesectionforaddnewedit",function(){
    emma_add_section_for_edit();
});

$("body").on("click", ".emma_remove_section_for_edit", function () {
    $(this).parent().remove(); // Remove the section
});

$("body").on("click", ".emma_edit_icon_for_policy", function () {

    $('#emmaloaddescriptionforedit').html('');

    var emma_data_id_for_edit = $(this).data('emmapolicy_edit_dataid');
    var emma_input_policy_edit_title = $(this).data('emmapolicy_edit_title');
    var emma_input_policy_edit_description = $(this).data('emma_edit_policy_description');
    var emma_input_policy_edit_section = $(this).data('emma_policy_edit_section');
    var emma_input_policy_edit_section_description = $(this).data('emma_edit_section_description');

    var sectionArray = [];
    var descriptionArray = [];

    if (
        emma_input_policy_edit_section != '' && 
        emma_input_policy_edit_section != 'NULL' || 
        emma_input_policy_edit_section_description != '' && 
        emma_input_policy_edit_section_description != 'NULL'
    ) {
        var sectionArray = emma_input_policy_edit_section.split('###');
        var descriptionArray = emma_input_policy_edit_section_description.split('###');

  
        var emmacombinedContentforedit = ''; 

    
        for (var i = 0; i < sectionArray.length; i++) {
            var section = sectionArray[i];
            var description = descriptionArray[i];
            
            emmacombinedContentforedit += `
                <div class="form-group abba_local-forms mt-3">
                    <input class="form-control emma_section_for_policy_for_edit" id="floatingTextareaforsection_for_edit" value="${section}" placeholder="Section"></input>
                    <label for="floatingTextarea" class="fw-bolder"> Section </label>
                    <br>
                    <textarea class="form-control mymce floatingTextareaforsection_description_edit mt-4" placeholder="Description">${description}</textarea>
                    <label for="floatingTextarea" class="fw-bolder"> Description </label>
                </div>`;
        }
        
     
        $('#emmaloaddescriptionforedit').append(emmacombinedContentforedit);
        $('.mymce').summernote();

    }

    $(".emmadataidforedit").val(emma_data_id_for_edit);
    $(".emma_edit_policy_title").val(emma_input_policy_edit_title);
    $(".emma_edit_policy_description").val(emma_input_policy_edit_description);
});



$("body").on("click",".emma_edit_policy_button",function(){

    $(".emma_edit_policy_button").html('<div class="spinner-border text-white spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>');
       var emma_get_edit_data_id = $(".emmadataidforedit").val();
       var emma_get_edit_title = $(".emma_edit_policy_title").val();
       var emma_get_edit_description = $(".emma_edit_policy_description").val();

       var emmapolicysections_for_edit = [];
       var emmapolicysections_descriptions_for_edit = [];


        $.each($(".emma_section_for_policy_for_edit"), function () {

            var emma_policy_for_section_edit = $(this).val();

                if (emma_policy_for_section_edit == 'NULL' || emma_policy_for_section_edit == '') {
                    emmapolicysections_for_edit.push('');
                    $("#accordionExampleforedit").hide();
                } else {
                    emmapolicysections_for_edit.push($(this).val()+'###');
                }
        });
        
        $.each($(".floatingTextareaforsection_description_edit"), function () {

            var emma_policy_for_section_description_edit = $(this).val();
        
                if (emma_policy_for_section_description_edit == 'NULL' || emma_policy_for_section_description_edit == '') {
                    emmapolicysections_descriptions_for_edit.push('');
                    $("#accordionExampleforedit").hide();
                } else {
                    emmapolicysections_descriptions_for_edit.push($(this).val()+'###');
                }
        });

        var datastring = "emma_edit_id=" + emma_get_edit_data_id + "&emma_edit_title=" + emma_get_edit_title +
        "&emma_edit_description=" + emma_get_edit_description + "&emma_edit_section=" + emmapolicysections_for_edit +
        "&emma_edit_section_description=" + emmapolicysections_descriptions_for_edit;
     

        emmapolicysections_for_edit = emmapolicysections_for_edit.toString();
        emmapolicysections_descriptions_for_edit = emmapolicysections_descriptions_for_edit.toString();

       $.ajax({
           type:'POST',
           url:'../../controller/scripts/owner/policy/emma_edit_for_policy.php',
           data:datastring,
           success:function(outcome){
               $(".emma_edit_policy_button").html('<i class="fas fa-edit text-white"> Edit Policy</i>');
            if(outcome == 1){
                $.wnoty({
                    type: 'success',
                    message: "Policy Edited successfully.",
                    autohideDelay: 5000
                });
            }else{
                $.wnoty({
                    type: 'warning',
                    message: "Policy Not Edited.",
                    autohideDelay: 500031
                });
            }
           }
       });
});

$("body").on("click",".emma_delete_icon_for_policy",function(){
    var emma_institution_for_delete = $(".abba-change-institution").val();
    
    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/policy/emma_display_delete_image.php',
        data:{institution:emma_institution_for_delete},
        success:function(result){
            $(".emma_load_delete_container_for_policy").html(result);
        }
    })
});

$("body").on("click",".emma_delete_icon_for_policy",function(){
    var data_id_for_delete = $(this).data('idforpolicydelete');

    $("#deletedataidforpolicy").val(data_id_for_delete);
});

$("body").on("click",".emma_delete_for_policy_button",function(){
    var emma_institution_for_delete_policy = $(".abba-change-institution").val();
    var data_id_for_delete = $("#deletedataidforpolicy").val();

    var datastring = "emma_institution_for_delete_policy=" + emma_institution_for_delete_policy + "&deletedata_id=" + data_id_for_delete;
  
    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/policy/emma_delete_policy.php',
        data:datastring,
        success:function(results){
            if(results == 1){
                $.wnoty({
                    type: 'success',
                    message: "Policy Deleted successfully.",
                    autohideDelay: 5000
                });
            }else{
                $.wnoty({
                    type: 'warning',
                    message: "Policy Not Deleted.",
                    autohideDelay: 5000
                });
            }
        }
    });
});

$("body").on("click",".emma_view_icon_for_policy",function(){
    var data_id_for_view = $(this).data('idforpolicyview');
    var emma_institution_for_view = $(".abba-change-institution").val();

    var datastring = "emma_data_id_for_view=" + data_id_for_view + "&emma_institution_for_view=" + emma_institution_for_view;
    
    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/policy/emma_view_for_policy.php',
        data:datastring,
        success:function(outcome){
            $(".emmaloadviewdetails").html(outcome);
        }
    });
});


$("body").on("click",".emma_view_icon_for_policy",function(){
    var emma_data_id_for_publish = $(this).data('idforpolicyview');
    var emma_publishstatus = $(this).data('publishstatus');

    $(".emma_data_id_for_publishing_status").val(emma_data_id_for_publish);
    $(".emma_data_status_for_publishing_status").val(emma_publishstatus);
});

$("body").on("click", "#publishbutton", function(){
    var emma_publish_data_id = $(".emma_data_id_for_publishing_status").val();
    var emma_publish_status = $(".emma_data_status_for_publishing_status").val();
    var emma_institution_for_status = $(".abba-change-institution").val();

    var datastring = "view_publish_id=" + emma_publish_data_id + "&view_publish_status=" + emma_publish_status + "&emma_publish_institute=" + emma_institution_for_status;

    $.ajax({
        type: 'POST',
        url: "../../controller/scripts/owner/policy/emma_publish_for_policy.php",
        data: datastring,
        success: function(outcome) {
            var publishButton = $("#publishbutton");
            if(outcome == 1){
                
                $(".emma_data_status_for_publishing_status").val(2);
                publishButton.text("Publish").css("background-color", "#2EA243");
                $.wnoty({
                    type: 'success',
                    message: "Policy Unpublished.",
                    autohideDelay: 5000
                });
                
            }else if(outcome == 2){
                $(".emma_data_status_for_publishing_status").val(1);
                publishButton.text("Unpublish").css("background-color", "#DE0303");
                $.wnoty({
                    type: 'success',
                    message: "Policy Published.",
                    autohideDelay: 5000
                });
            }else{

            }
        }
    });
});

$("body").on("click",".emma_publish_icon_for_policy",function(){
    var emma_data_id_for_publish = $(this).data('idforpolicypublish');
    var emma_publishstatus = $(this).data('publishstatusid');

    $(".emma_data_id_for_publishing_status_for_policy").val(emma_data_id_for_publish);
    $(".emma_data_status_for_publishing_status_for_policy").val(emma_publishstatus);

    var emma_data_id_for_publish_for_policy = $(".emma_data_id_for_publishing_status_for_policy").val();
    var emma_publishstatus_for_policy = $(".emma_data_status_for_publishing_status_for_policy").val();
    var emma_institution_for_status_for_publish = $(".abba-change-institution").val();

    var datastring = "emma_data_id_policy=" + emma_data_id_for_publish_for_policy + "&emmastatusforpolicy=" + emma_publishstatus_for_policy + "&emma_policy_institution=" + emma_institution_for_status_for_publish;

    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/policy/emma_publish.php',
        data:datastring,
        success:function(result){
            if(result == 1){
                $(".emma_publish_icon_for_policy").css("background-color", "#dc3545");
                $(".emma_data_status_for_publishing_status_for_policy").val(2);
                $.wnoty({
                    type: 'success',
                    message: "Policy Unpublished.",
                    autohideDelay: 5000
                });

                }else if(result == 2){

                $(".emma_publish_icon_for_policy").css("background-color", "#28a745");
                $(".emma_data_status_for_publishing_status_for_policy").val(1);
                $.wnoty({
                    type: 'success',
                    message: "Policy Published.",
                    autohideDelay: 5000
                });
            }else{
                
            }
        }
    });
});


