

$(document).ready(function(){
    emma_campus_function();
});

function emma_campus_function(){
    // $('#pros-staffpaginationcont').fadeOut();
    var emma_institution_id_dropdown = $(".abba-change-institution").val();
    $(".emma_load_body_content").html('<div align="center" class="mt-4 text-primary"><span class="spinner-border spinner-border-md" role="status" aria-hidden="true"></span> <span class="visually-hidden">Loading...</span></div>')
    $.ajax({
        type:"POST",
        url: "../../controller/scripts/owner/emma_quality_assurance/emma_get_campus_folder.php",
        data:{institution_id_values_for_dropdown: emma_institution_id_dropdown},
        success:function(outcome){
            $(".emma_load_body_content").html(outcome);
        }
    });
    
}

$(document).ready(function () {

    var emma_folder_campus = $(".abba-change-institution").val();

    $("#emma_display_campus").html("<option value='NULL'>Loading...</option>");

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/emma_quality_assurance/emma_select_quality_assurance.php",
        data: {get_institution_id: emma_folder_campus},
        success: function (output) {
            $("#emma_display_campus").html(output);
            $("#emma_load_campus_content_for_quality_assurance").html(output);

        }
    });
});


$(document).ready(function(){
    $("body").on('click','.emma_create_button ',function(){
        var campus_names = $("#emma_display_campus").val();
       
        var emma_get_campus_folder = $(".abba-change-institution").val();
        var emma_folder_name = $('.emma_folder_input').val()
       
        if(campus_names == 'NULL'){
            $.wnoty({
                type: 'warning',
                message: "Please Select Campus.",
                autohideDelay: 5000
            });
        }
        else if(emma_folder_name == ''){
            $.wnoty({
                type: 'warning',
                message: "Input Folder Name.",
                autohideDelay: 5000
            });
        }
        else
        {

            $(".emma_create_button").html('<span class="spinner-border spinner-border-sm" style="color:007ffb;" role="status" aria-hidden="true"></span> <span class="visually-hidden">Loading...</span>');
            $.ajax({
                type:"POST",
                url:"../../controller/scripts/owner/emma_quality_assurance/emma_send_folder_values.php",
                // data:datastring,
                data: {emma_campus_names : campus_names, emma_folder_names : emma_folder_name, emma_institution_names : emma_get_campus_folder},
                success: function (result) {
                    if(result == 2 || result > 2){
                        $.wnoty({
                            type: 'success',
                            message: "Folder Successfully Created.",
                            autohideDelay: 5000
                        });
                        $(".emma_create_button").html('Create');
                        emma_campus_function();
                        $("#emma_add_new_Modal").modal("hide");
                    }
                    else
                    {
                        $.wnoty({
                            type: 'warning',
                            message: "Folder not Created.",
                            autohideDelay: 5000
                        });
                    }
                }
            });
        }
    });
});

$(document).ready(function(){
    $("body").on('click','.emma_edit_clas',function(){
        var emma_data_id_for_quality_assurance = $(this).data('id');
        var emma_update_institution_id = $(".abba-change-institution").val();
        var emma_update_campus_id = $(this).data('camp');
        var emma_update_folder_name = $(this).data('folder');


        var emma_main_folder_data_id = $(this).data('id');
        var emma_main_folder_campus_id = $(this).data('camp');
        var emma_main_folder_value = $(this).data('folder');


        $('#this_main_folder_data_id').val(emma_main_folder_data_id);
        $('#this_main_folder_campus_id').val(emma_main_folder_campus_id);
        $('#emma_edit_folder_input').val(emma_main_folder_value);

    });

    $("body").on('click','.emma_edit_create_button',function(){

        var getting_data_id = $("#this_main_folder_data_id").val();
        var getting_campus_id = $("#this_main_folder_campus_id").val();
        var getting_institution_id = $(".abba-change-institution").val();
        var getting_folder_main_name = $("#emma_edit_folder_input").val();

        var datastring = "emma_collect_data_id=" + getting_data_id + "&emma_collect_campus_id=" + getting_campus_id + "&emma_collect_institution=" + getting_institution_id + "&emma_collect_main_folder_value=" + getting_folder_main_name;

        $(".emma_edit_create_button").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span class="visually-hidden">Loading...</span>');

        $.ajax({
            type:"POST",
            url:"../../controller/scripts/owner/emma_quality_assurance/emma_edit_page_for_main_folder.php",
            data:datastring,
            success:function(result){
                
                if(result = 7){
                    $("#emma_add_new_edit_Modal").modal("hide");
                    $.wnoty({
                        type: 'success',
                        message: "Folder Updated Successfully",
                        autohideDelay: 5000
                    });
                    $("."+getting_data_id+"autoupdatename").html(getting_folder_main_name);

                    $(".emma_edit_create_button").html('Update');
                }else{
                    $.wnoty({
                        type: 'warning',
                        message: "Folder Not Created",
                        autohideDelay: 5000
                    });
                }
            }
        })
    });

    $("body").on('click','#delete-main_folder_icon',function(){

        var emma_collect_data_id_for_delete = $(this).data('ide');
        var emma_collect_campus_id_for_delete = $(this).data('camp');

        $("#main_delete_folder_id").val(emma_collect_data_id_for_delete);
        $("#main_delete_folder_campus_id").val(emma_collect_campus_id_for_delete);
    });

    $("body").on('click','.emmadeletemainfolderbtn',function(){
        var emma_get_data_id_for_main_folder = $("#main_delete_folder_id").val();
        var emma_get_campus_id_for_main_folder = $("#main_delete_folder_campus_id").val();

        var datastring = "send_data_id_for_main_folder=" + emma_get_data_id_for_main_folder + "&send_campus_id_for_main_folder=" + emma_get_campus_id_for_main_folder;
            $(".emmadeletemainfolderbtn").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span class="visually-hidden">Loading...</span>');
        
        $.ajax({
            type:"POST",
            url:"../../controller/scripts/owner/emma_quality_assurance/emma_delete_page_for_main_folder.php",
            data:datastring,
            success:function(output){

                if(output = 30){
                    $("#emma_add_new_delete_Modal").modal("hide");
                    $.wnoty({
                        type: 'success',
                        message: "Folder Deleted Successfully",
                        autohideDelay: 5000
                    });
                    emma_campus_function();
                    $(".emmadeletemainfolderbtn").html('Yes! Delete');
                }else{
                    $.wnoty({
                        type: 'warning',
                        message: "Folder Not Deleted",
                        autohideDelay: 5000
                    });
                }
            }
        })
    });

    $("body").on('click','.emma_main_folder_loading_card_content',function(){
        var emma_gets_data_id_for_second_folder = $(this).data('id');
        var emma_gets_folder_name = $(this).data('foldername');
        // var emma_gets_data_icons_for_second_folder = $(this).data('icons');
        var emma_gets_data_folder_id_for_second_folder = $(this).data('folderid');
        var emma_gets_campus_id = $(this).data('campusid');
        var emma_gets_data_institution_id_for_second_folder = $(".abba-change-institution").val();


        $(".emma_first_folder_name_display").html('<span class="emma_main_folder_loading_card_content" data-id="'+emma_gets_data_id_for_second_folder+'"  data-foldername="'+emma_gets_folder_name+'"  data-folderid="'+emma_gets_data_folder_id_for_second_folder+'"  data-campusid="'+emma_gets_campus_id+'">'+emma_gets_folder_name+'</span>');

        $(".emma_second_folder_name_display, .emma_third_folder_name_display").html();

        $(".emma_second_folder_name_display").html('');

        $(".emma_third_folder_name_display").html('');

        $('.emma_main_folder_loading_card_content').css('background','white');
        $('#'+emma_gets_data_id_for_second_folder).css('background','#007ffb');
        
        $('.emma_main_folder_loading_card_content').css('color','black');
        $('#'+emma_gets_data_id_for_second_folder).css('color','white');

        $('.emma_main_folder_loading_card_content').css('font-weight','normal');
        $('#'+emma_gets_data_id_for_second_folder).css('font-weight','bold');
        
        var datastring = "emma_main_campus=" + emma_gets_campus_id + "&emma_collects_institution_id=" + emma_gets_data_institution_id_for_second_folder + "&emma_collects_folder_id=" + emma_gets_data_folder_id_for_second_folder;

        $.ajax({
            type:"POST",
            url:"../../controller/scripts/owner/emma_quality_assurance/emma_send_mainfolder_values.php",
            data:datastring,
            success:function(outcome){
                $(".emma_load_folder_content").html(outcome);

                $(document).ready(function(){
                    var items = $(".emma_second_folder_pagination .emma_second_folder_class_pagination");
                    var numItems = items.length;
                    var perPage = 9;
                    var prebtn = '<i class="fa fa-arrow-left"></i>';
                    var nextbtn = '<i class="fa fa-arrow-right"></i>';
                        
                    items.slice(perPage).hide();
                
                    $('#emma_data_room_paginationcont_for_second_folder').pagination({
                        items: numItems,
                        itemsOnPage: perPage,
                        prevText: prebtn,
                        nextText: nextbtn,
                        onPageClick : function (pageNumber){
                            var showFrom = perPage * (pageNumber - 1);
                            var showTo = showFrom + perPage;
                            items.hide().slice(showFrom, showTo).show();
                        }
                    });
                });

                $(document).ready(function(){
                    var items = $(".emma_second_folder_pagination_file .emma_second_folder_class_pagination_file");
                    var numItems = items.length;
                    var perPage = 12;
                    var prebtn = '<i class="fa fa-arrow-left"></i>';
                    var nextbtn = '<i class="fa fa-arrow-right"></i>';
                        
                    items.slice(perPage).hide();
                
                    $('#emma_data_room_paginationcont_for_second_folder_file').pagination({
                        items: numItems,
                        itemsOnPage: perPage,
                        prevText: prebtn,
                        nextText: nextbtn,
                        onPageClick : function (pageNumber){
                            var showFrom = perPage * (pageNumber - 1);
                            var showTo = showFrom + perPage;
                            items.hide().slice(showFrom, showTo).show();
                        }
                    });
                });

                $('#emma_data_room_paginationcont_for_second_folder').show();

                $('#emma_data_room_paginationcont_for_second_folder_file').show();
            }
        })
    });

    $("body").on('click','.emma_main_folder_loading_card_content',function(){
        var emma_sending_firstfolder_id = $(this).data('folderid');
        var emma_sending_campusid = $(this).data('campusid');
        
        $("#firstfolderidforfirstfile").val(emma_sending_firstfolder_id)
        $("#firstcampusidforfirstfile").val(emma_sending_campusid);

    });

    $("body").on('click','#emma_create_icon_for_second_folder',function(){

        var emma_collect_data_id_for_first_folder_table = $(this).data('id');

        $("#emma_received_main_folder_id").val(emma_collect_data_id_for_first_folder_table);
    });

    $("body").on('click','.emma_create_second_folder_button',function(){
        var emma_sends_campus_id = $("#firstcampusidforfirstfile").val();
        var emma_sends_main_folder_id = $("#firstfolderidforfirstfile").val();
        var emma_sends_second_foldername = $("#emma_second_folder_input").val();
        var emma_sends_institution_id = $(".abba-change-institution").val();

        var datastring = "emma_campus_id=" + emma_sends_campus_id + "&emma_mainfolder_id=" + emma_sends_main_folder_id + "&emma_second_foldername=" + emma_sends_second_foldername + "&emma_second_folder_institution_id=" + emma_sends_institution_id;

        $(".emma_create_second_folder_button").html('<span class="spinner-border spinner-border-sm" style="color:007ffb;" role="status" aria-hidden="true"></span> <span class="visually-hidden">Loading...</span>');

        $.ajax({
            type:'POST',
            url:"../../controller/scripts/owner/emma_quality_assurance/emma_create_for_second_folder.php",
            data:datastring,
            success:function(excellent){
                if(excellent = 2){
                    emma_load_second_folder_card();
                    $(".emma_create_second_folder_button").html('Create');
                    $.wnoty({
                        type: 'success',
                        message: "Folder Successfully Created.",
                        autohideDelay: 5000
                    });
                    $("#emma_second_create_new_Modal").modal('hide');
                }else{
                    $.wnoty({
                        type: 'success',
                        message: "FolderName Already Exists.",
                        autohideDelay: 5000
                    });
                }
            }
        })
    });


});

function emma_load_second_folder_card(){
    var emma_gets_institution_id = $(".abba-change-institution").val();
    var emma_gets_first_folder_id = $("#emma_received_main_folder_id").val();

    var datastring = "emma_collects_institution_id=" + emma_gets_institution_id + "&emma_collects_folder_id=" + emma_gets_first_folder_id;

    $.ajax({
        type:'POST',
        url:"../../controller/scripts/owner/emma_quality_assurance/emma_send_mainfolder_values.php",
        data:datastring,
        success:function(output){
            $(".emma_load_folder_content").html(output);
        }
    })
}  

$(document).ready(function(){
    $("body").on('click','#emma_edit_icon_for_second_folder',function(){
        var get_the_data_id_for_edit_second_folder = $(this).data('id');
        var get_the_data_campus_id_for_edit_second_folder = $(this).data('campus');
        var get_the_second_folder_value_for_edit = $(this).data('folder');
        var get_the_second_folder_data_id = $(this).data('secondfolderdataid');


        $("#this_is_the_data_id").val(get_the_second_folder_data_id);
        $("#this_is_second_folder_data_id").val(get_the_data_id_for_edit_second_folder);
        $("#this_is_second_folder_campus_id").val(get_the_data_campus_id_for_edit_second_folder);
        $("#emma_edit_second_folder_input").val(get_the_second_folder_value_for_edit);
    });

    $("body").on('click','.emma_edit_second_folder_create_button',function(){
        var emma_data_id_for_this_folder = $("#this_is_the_data_id").val();
        var emma_second_folder_input_value = $("#emma_edit_second_folder_input").val();
        var emma_second_folder_campus_id = $("#this_is_second_folder_campus_id").val();
        var emma_second_folder_for_data_id = $("#this_is_second_folder_data_id").val();
        var emma_second_folder_institutionid =  $(".abba-change-institution").val();

        var datastring = "emma_data_id_for_second_folder=" + emma_data_id_for_this_folder + "&emma_second_folder_edit_value_name=" + emma_second_folder_input_value + "&emma_second_folder_edit_campus_id=" + emma_second_folder_campus_id + "&emma_second_folder_edit_data_id=" + emma_second_folder_for_data_id + "&emma_second_folder_edit_institution_id=" + emma_second_folder_institutionid ;
        
        $(".emma_edit_second_folder_create_button").html('<span class="spinner-border spinner-border-sm" style="color:007ffb;" role="status" aria-hidden="true"></span> <span class="visually-hidden">Loading...</span>');
        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_quality_assurance/emma_edit_page_for_second_folder.php',
            data:datastring,
            success:function(output){
                if(output == 10){
                    $(".emma_edit_second_folder_create_button").html('Update');
                    $.wnoty({
                        type: 'success',
                        message: "Folder Edited Successfully.",
                        autohideDelay: 5000
                    });
                    $("#emma_add_new_second_edit_Modal").modal('hide');
                }else{
                    $.wnoty({
                        type: 'success',
                        message: "Folder Name Already Exists.",
                        autohideDelay: 5000
                    });
                }
            }
        })
    });


    $("body").on('click','#emma_delete_icon_for_second_folder',function(){
        var emma_get_delete_id_for_second_folder = $(this).data('iddelete');
        var emma_get_delete_campus_for_second_folder = $(this).data('camp');

        $("#emma_delete_second_folder_id").val(emma_get_delete_id_for_second_folder);
        $("#emma_delete_folder_second_campus_id").val(emma_get_delete_campus_for_second_folder)
    });

    
    $("body").on('click','.emmadeletesecondfolderbtn',function(){

        var emma_second_folder_data_id_for_delete = $("#emma_delete_second_folder_id").val();
        var emma_second_folder_campus_id_for_delete = $("#emma_delete_folder_second_campus_id").val();

        var datastring = "emma_send_data_id_for_delete=" + emma_second_folder_data_id_for_delete + "&emma_send_campus_id_for_delete=" + emma_second_folder_campus_id_for_delete;
            $(".emmadeletesecondfolderbtn").html('<span class="spinner-border spinner-border-sm" style="color:007ffb;" role="status" aria-hidden="true"></span> <span class="visually-hidden">Loading...</span>');

            alert(datastring);
        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_quality_assurance/emma_delete_page_for_second_folder.php',
            data:datastring,
            success:function(result){
                if(result == 24){
                    $.wnoty({
                        type: 'success',
                        message: "Folder Deleted Successfully.",
                        autohideDelay: 5000
                    });

                    $(".emmadeletesecondfolderbtn").html('Yes! Delete');
                    $("#emma_second_folder_delete_Modal").modal('hide');

                    // emma_load_second_folder_card();
                    
                }else{
                    $.wnoty({
                        type: 'success',
                        message: "Folder Not Deleted.",
                        autohideDelay: 5000
                    });
                }
            }
        });
    });


    // upload for first file 
    $(".upload_button_button_for_first_file").on("click", function() {
        var inputFile = $("#emma_upload_first_file")[0].files[0];
        var emma_sending_firstfolder_id = $("#firstfolderidforfirstfile").val();
        var emma_sending_campus_id = $("#firstcampusidforfirstfile").val();
        var emma_sending_institution_id = $(".abba-change-institution").val();
        var filename = inputFile.name;
        var fileExtension = filename.split('.').pop();
        // console.log(inputFile);

        if (inputFile) {
            // Validate file type
            var allowedTypes = ["application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document"];
            if (allowedTypes.indexOf(inputFile.type) === -1) {
                $.wnoty({
                    type: 'warning',
                    message: "Please select a valid PDF or DOC file.",
                    autohideDelay: 5000
                });
                return;
            }
            var reader = new FileReader();
            reader.onload = function(e) {
                var base64Data = e.target.result;
                uploadFile(base64Data,emma_sending_firstfolder_id,emma_sending_campus_id,emma_sending_institution_id,filename,fileExtension);
            };
            reader.readAsDataURL(inputFile);
        } else {
            $.wnoty({
                type: 'warning',
                message: "Please select a file.",
                autohideDelay: 5000
            });
        }
    });


    function uploadFile(base64Data,emma_sending_firstfolder_id,emma_sending_campus_id,emma_sending_institution_id,filename,fileExtension) {
        // Make an AJAX request to your server to handle the file upload
        $.ajax({
            type:'POST',
            url: "../../controller/scripts/owner/emma_quality_assurance/emma_send_file_values_for_firstfile.php",
            data: { file: base64Data, fileforfolderid: emma_sending_firstfolder_id, fileforcampusid: emma_sending_campus_id, fileforinstitutionid: emma_sending_institution_id, fileforfilename: filename, fileforfiletype: fileExtension},
            success: function(response) {
      
                if(response == 3){
                    $.wnoty({
                        type: 'success',
                        message: "File Successfully Uploaded.",
                        autohideDelay: 5000
                    });
                    emma_campus_function();
                    $("#emma_open_modal_for_first_file").modal('hide');
                }else if(response == 4){
                    $.wnoty({
                        type: 'warning',
                        message: "Please Already Exists.",
                        autohideDelay: 5000
                    });
                }else{
                    $.wnoty({
                        type: 'warning',
                        message: "File Not Created.",
                        autohideDelay: 5000
                    });
                }
            }
        });
    }


    $("body").on('click','#emma_edit_for_first_file',function(){
        var data_id_for_first_file = $(this).data('thisid');
        var data_name_for_first_file = $(this).data('thisname');
        var data_campus_for_first_file = $(this).data('thiscampus');

        $("#this_main_file_data_id").val(data_id_for_first_file);
        $("#emma_edit_first_file_input").val(data_name_for_first_file);
        $("#this_main_file_campus_id").val(data_campus_for_first_file);
        
    });

    $("body").on('click','.emma_edit_first_file_create_button',function(){
        var emma_gets_first_file_data_id = $("#this_main_file_data_id").val();
        var emma_gets_first_file_name = $("#emma_edit_first_file_input").val();
        var emma_gets_first_file_campus_id = $("#this_main_file_campus_id").val();
        var emma_gets_first_file_institution_id = $(".abba-change-institution").val();

        var datastring = "emma_first_file_data_id=" + emma_gets_first_file_data_id + "&emma_first_file_name=" + emma_gets_first_file_name + "&emma_first_file_campus_id=" + emma_gets_first_file_campus_id + "&emma_first_file_institution_id=" + emma_gets_first_file_institution_id;

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_quality_assurance/emma_edit_page_for_first_file.php',
            data:datastring,
            success:function(result){
                if(result == 100){
                    $.wnoty({
                        type: 'success',
                        message: "File Successfully Edited",
                        autohideDelay: 5000
                    });
                    $("#emma_add_new_edit_modal_for_first_file").modal('hide');

                }else{
                    $.wnoty({
                        type: 'warning',
                        message: "File Not Edited",
                        autohideDelay: 5000
                    });
                }
            }
        })

    });

    // delete for first file
    $("body").on('click','#emma_delete_icon_for_first_file',function(){
        var data_id_for_first_file_delete = $(this).data('deleteid');
        var campus_id_for_first_file_delete = $(this).data('deletecamp');

        $("#emma_delete_first_file_data_id").val(data_id_for_first_file_delete);
        $("#emma_delete_first_file_campus_id").val(campus_id_for_first_file_delete);

    });

    $("body").on('click','.emmadeletefirstfilebtn',function(){
        var emma_data_id_for_delete = $("#emma_delete_first_file_data_id").val();
        var emma_campus_id_for_delete =  $("#emma_delete_first_file_campus_id").val();

        var datastring = "emma_data_id_for_delete=" + emma_data_id_for_delete + "&emma_campus_id_for_delete=" + emma_campus_id_for_delete;

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_quality_assurance/emma_delete_page_for_first_file.php',
            data:datastring,
            success:function(outputorresult){

                if(outputorresult == 9){
                    $.wnoty({
                        type: 'success',
                        message: "File Deleted Successfully",
                        autohideDelay: 5000
                    });
                }else{
                    $.wnoty({
                        type: 'warning',
                        message: "File Not Deleted",
                        autohideDelay: 5000
                    });
                }
            }
        })
    });

    // download for first file 
    $("body").on('click','.emma_download_first_file',function(){
        var emma_data_id_for_download = $(this).data('thisdownloadid');

        var datastring = "emma_download_for_data_id=" + emma_data_id_for_download;

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_quality_assurance/emma_first_file_download_page.php',
            data:datastring,
            success:function(outcome){
                $(".load_firstfile_download_content").html(outcome);

                var emma_basesixtyfour_for_mainfile = $("#emma_id_for_basesixtyfour_files_table").val();
                var emma_filename_for_mainfile = $("#emma_id_for_filename_files_table").val();
                var emma_filetype_for_mainfile = $("#emma_id_for_filetype_files_table").val();

                // Replace 'your_base64_data_from_database' with the actual base64 data from your database
                var base64Data = emma_basesixtyfour_for_mainfile;

                // Create a link
                var a = document.createElement('a');
                
                // Set the href attribute with base64 data
                a.href = base64Data;

                // Set the file name (you can adjust the filename as needed)
                a.download = emma_filename_for_mainfile;

                // Trigger a click on the link to start the download
                a.click();

            }
        });
    });

    $("body").on('click', '.emma_view_for_first_file', function () {
 
        var emma_get_files_id_for_firstfileview = $(this).data('fileviewid');
        var emma_get_filetype_for_firstfileview = $(this).data('filetype');
        var emma_get_basesixtyfour_for_firstfileview = $(this).data('firstfileviewbasesixtyfour');

        
        if(emma_get_filetype_for_firstfileview == 'pdf' || emma_get_filetype_for_firstfileview == 'PDF')
        {
            var decodedPDF = emma_get_basesixtyfour_for_firstfileview
            showfirstfileviewPDF(decodedPDF);
        }
        else if(emma_get_filetype_for_firstfileview == 'rtf' || emma_get_filetype_for_firstfileview == 'RTF')
        {
            var decodedPDF = emma_get_basesixtyfour_for_firstfileview
            showfirstfileviewPDF(decodedPDF);
        }
        else if(emma_get_filetype_for_firstfileview == 'docx' || emma_get_filetype_for_firstfileview == 'doc' || emma_get_filetype_for_firstfileview == 'DOC' || emma_get_filetype_for_firstfileview == 'DOCX')
        {
            var decodedPDF = emma_get_basesixtyfour_for_firstfileview
            showfirstfileviewPDF(decodedPDF);
        }
        else if(emma_get_filetype_for_firstfileview == 'xlsx' || emma_get_filetype_for_firstfileview == 'xls' || emma_get_filetype_for_firstfileview == 'XLSX' || emma_get_filetype_for_firstfileview == 'XLS')
        {
            var decodedPDF = emma_get_basesixtyfour_for_firstfileview
            showfirstfileviewPDF(decodedPDF);
        }
        else if(emma_get_filetype_for_firstfileview == 'html' || emma_get_filetype_for_firstfileview == 'htm' || emma_get_filetype_for_firstfileview == 'HTM' || emma_get_filetype_for_firstfileview == 'HTML')
        {
            var decodedPDF = emma_get_basesixtyfour_for_firstfileview
            showfirstfileviewPDF(decodedPDF);
        }
        else if(emma_get_filetype_for_firstfileview == 'ppt' || emma_get_filetype_for_firstfileview == 'pptx' || emma_get_filetype_for_firstfileview == 'PPT' || emma_get_filetype_for_firstfileview == 'PPTX')
        {
            var decodedPDF = emma_get_basesixtyfour_for_firstfileview
            showfirstfileviewPDF(decodedPDF);
        }
        else if(emma_get_filetype_for_firstfileview == 'ods' || emma_get_filetype_for_firstfileview == 'ODS')
        {
            var decodedPDF = emma_get_basesixtyfour_for_firstfileview
            showfirstfileviewPDF(decodedPDF);
        }
        else if(emma_get_filetype_for_firstfileview == 'odt' || emma_get_filetype_for_firstfileview == 'ODT')
        {
            var decodedPDF = emma_get_basesixtyfour_for_view;
            showfirstfileviewPDF(decodedPDF);
        }
        else
        {
           
        }

        var datastring = "emma_files_id_for_firstfileview=" + emma_get_files_id_for_firstfileview;
        
        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_quality_assurance/emma_display_files_content_for_first_file_view.php',
            data:datastring,
            success:function(output){
                $(".emmaloadmodalcontentforfirstfileview").html(output);
            }
        });
    });

    function showfirstfileviewPDF(decodedPDF) {
        if(decodedPDF) {

            $('.emmaloadmodalcontentforfirstfileview').attr('src', decodedPDF);

            $("#emma_view_for_first_files").modal("show");

        } else {

            alert('Error: PDF data or URL is missing.');

        }
    }
    

    $("body").on('click', '.emma_second_folder_icon, .emma_second_folder_name', function () {
        var emma_second_folder_staff = $(this).data('staff');
        var emma_collects_data_id = $(this).data('secondfolderid');
        var emma_collects_campus_id = $(this).data('campusid');


        $("#emma_hold_staff_data").val(emma_second_folder_staff);
        $("#emma_hold_data_id_for_dive_content").val(emma_collects_data_id);
        $("#emma_hold_campus_id").val(emma_collects_campus_id);

        emmmacollectstaffinfo();
    });

    function emmmacollectstaffinfo(){


        var emma_collect_staff_data = $("#emma_hold_staff_data").val();
        var emma_gets_institution_id_for_file_details = $(".abba-change-institution").val();
        var emma_collect_data_id = $("#emma_hold_data_id_for_dive_content").val();
        var emma_collect_campus = $("#emma_hold_campus_id").val();


        var datastring ="emma_collect_staff_data=" + emma_collect_staff_data + "&emma_collects_institution_id=" + emma_gets_institution_id_for_file_details + "&emma_collects_folder_id=" + emma_collect_data_id + "&emma_gets_campus_id_for_view=" + emma_collect_campus;

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_quality_assurance/emma_send_third_folder_values.php',
            data:datastring,
            success:function(result){
                $(".emma_load_folder_content").html(result);

                $(document).ready(function(){
                    var items = $(".emma_third_folder_pagination_value .emma_rows_for_third_folder_pagination");
                    var numItems = items.length;
                    var perPage = 9;
                    var prebtn = '<i class="fa fa-arrow-left"></i>';
                    var nextbtn = '<i class="fa fa-arrow-right"></i>';
                        
                    items.slice(perPage).hide();
                
                    $('#emma_close_third_folder_pagination').pagination({
                        items: numItems,
                        itemsOnPage: perPage,
                        prevText: prebtn,
                        nextText: nextbtn,
                        onPageClick : function (pageNumber){
                            var showFrom = perPage * (pageNumber - 1);
                            var showTo = showFrom + perPage;
                            items.hide().slice(showFrom, showTo).show();
                        }
                    });
                });

                $(document).ready(function(){
                    var items = $(".emma_first_div_for_second_file_pagination .emma_second_div_for_second_file_pagination");
                    var numItems = items.length;
                    var perPage = 12;
                    var prebtn = '<i class="fa fa-arrow-left"></i>';
                    var nextbtn = '<i class="fa fa-arrow-right"></i>';
                        
                    items.slice(perPage).hide();
                
                    $('#emma_third_div_for_second_file_pagination').pagination({
                        items: numItems,
                        itemsOnPage: perPage,
                        prevText: prebtn,
                        nextText: nextbtn,
                        onPageClick : function (pageNumber){
                            var showFrom = perPage * (pageNumber - 1);
                            var showTo = showFrom + perPage;
                            items.hide().slice(showFrom, showTo).show();
                        }
                    });
                });

                $('#emma_close_third_folder_pagination').show();

                $('#emma_third_div_for_second_file_pagination').show();


            }
        })
       
       
    }
    
    $("body").on('click', '#staff_view_icon_for_second_file', function () {
        var emma_get_staff_id_for_view = $(this).data('staffid');
        var emma_get_staff_institution_for_view = $(".abba-change-institution").val();
        $('#pros-staffpaginationcont').fadeOut();
        var datastring = "emma_receive_staff=" + emma_get_staff_id_for_view + "&emma_collects_institution_id_for_view=" + emma_get_staff_institution_for_view;
        
        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_quality_assurance/emma_display_content_for_first_file.php',
            data:datastring,
            success:function(output){
                // alert()
                $(".emmaprintdivecontsapd").html(output);
            }
        })

    });

    // function emma_campus_load_function(){
    //     $('#pros-staffpaginationcont').fadeOut();
        
    //     var items = $(".emma-data-room-maincard .emma-data-room-carditems");
    //     var numItems = items.length;
    //     var perPage = 5;
    //     var prebtn = '<i class="fa fa-arrow-left"></i>';
    //     var nextbtn = '<i class="fa fa-arrow-right"></i>';
            
    //     items.slice(perPage).hide();
    
    //     $('.emma_second_folder_icon, .emma_second_folder_name').pagination({
    
    //         items: numItems,
    //         itemsOnPage: perPage,
    //         prevText: prebtn,
    //         nextText: nextbtn,
    //         onPageClick : function (pageNumber){
    //             var showFrom = perPage * (pageNumber - 1);
    //             var showTo = showFrom + perPage;
    //             items.hide().slice(showFrom, showTo).show();
    //         }
    
    //     });
    //     $('.emma_second_folder_icon, .emma_second_folder_name').show();

    // }

    $("body").on('click', '#parent_view_icon_for_second_file', function () {
        var emma_get_parent_id_for_view = $(this).data('parentid');
        var emma_get_parent_institution_for_view = $(".abba-change-institution").val();

        var datastring = "emma_receive_parent=" + emma_get_parent_id_for_view + "&emma_collects_institution_id_for_view=" + emma_get_parent_institution_for_view;
    
        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_quality_assurance/emma_display_parent_content_for_view.php',
            data:datastring,
            success:function(output){
            
                $(".emma_load_parent_file_on_modal").html(output);
            }
        })

    });
    $("body").on('click', '#student_view_icon_for_second_file', function () {
        var emma_get_student_id_for_view = $(this).data('studentid');
        var emma_get_student_institution_for_view = $(".abba-change-institution").val();
        var emma_get_campus_id_for_view = $(this).data('campus');

        var datastring = "emma_campus_id_for_view=" + emma_get_campus_id_for_view +"&emma_receive_student=" + emma_get_student_id_for_view + "&emma_collects_student_institution_id_for_view=" + emma_get_student_institution_for_view;
        
        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_quality_assurance/emma_display_student_content_for_view.php',
            data:datastring,
            success:function(output){
                $(".emma_load_student_file_on_modal").html(output);
            }
        })

    });
    $("body").on('click', '.emma_view_for_image', function () {
        var emma_get_image_id_for_view = $(this).data('thisimageid');

        var datastring = "emma_image_id_for_view=" + emma_get_image_id_for_view; 
        
        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_quality_assurance/emma_display_image_content_for_view.php',
            data:datastring,
            success:function(output){
                $(".emma_load_second_image_on_modal").html(output);
            }
        })

    });

    $("body").on('click', '.emma_view_for_files', function () {
        var emma_get_files_id_for_view = $(this).data('thisfilesid');
        var emma_get_files_type_for_view = $(this).data('type');
        var emma_get_basesixtyfour_for_view = $(this).data('basesixtyfour');

        if(emma_get_files_type_for_view == 'pdf' || emma_get_files_type_for_view == 'PDF')
        {
            var decodedPDF = emma_get_basesixtyfour_for_view
            showPDF(decodedPDF);
        }
        else if(emma_get_files_type_for_view == 'rtf' || emma_get_files_type_for_view == 'RTF')
        {
            var decodedPDF = emma_get_basesixtyfour_for_view
            showPDF(decodedPDF);
        }
        else if(emma_get_files_type_for_view == 'docx' || emma_get_files_type_for_view == 'doc' || emma_get_files_type_for_view == 'DOC' || emma_get_files_type_for_view == 'DOCX')
        {
            var decodedPDF = emma_get_basesixtyfour_for_view
            showPDF(decodedPDF);
        }
        else if(emma_get_files_type_for_view == 'xlsx' || emma_get_files_type_for_view == 'xls' || emma_get_files_type_for_view == 'XLSX' || emma_get_files_type_for_view == 'XLS')
        {
            var decodedPDF = emma_get_basesixtyfour_for_view
            showPDF(decodedPDF);
        }
        else if(emma_get_files_type_for_view == 'html' || emma_get_files_type_for_view == 'htm' || emma_get_files_type_for_view == 'HTM' || emma_get_files_type_for_view == 'HTML')
        {
            var decodedPDF = emma_get_basesixtyfour_for_view
            showPDF(decodedPDF);
        }
        else if(emma_get_files_type_for_view == 'ppt' || emma_get_files_type_for_view == 'pptx' || emma_get_files_type_for_view == 'PPT' || emma_get_files_type_for_view == 'PPTX')
        {
            var decodedPDF = emma_get_basesixtyfour_for_view
            showPDF(decodedPDF);
        }
        else if(emma_get_files_type_for_view == 'ods' || emma_get_files_type_for_view == 'ODS')
        {
            var decodedPDF = emma_get_basesixtyfour_for_view
            showPDF(decodedPDF);
        }
        else if(emma_get_files_type_for_view == 'odt' || emma_get_files_type_for_view == 'ODT')
        {
            var decodedPDF = emma_get_basesixtyfour_for_view
            showPDF(decodedPDF);
        }
        else
        {

        }
        var datastring = "emma_files_id_for_view=" + emma_get_files_id_for_view; 
        
        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_quality_assurance/emma_display_files_content_for_view.php',
            data:datastring,
            success:function(output){
                // emma PDF view
                $("#emma_load_second_file_on_modal").html(output);
            }
        });
    });

      // Show Image
    //   function showImage(emma_get_basesixtyfour_for_view) {
    //     document.getElementById("fileContent").innerHTML = `<img src="data:image/png;base64,${emma_get_basesixtyfour_for_view}" alt="Image">`;
    //     $('#myModal').modal('show');
    //   }
    
      // Show PDF
    function showPDF(decodedPDF) {
        if(decodedPDF) {
            $('#emma_load_second_file_on_modal').attr('src', decodedPDF);
            
            $('#emma_modal_for_second_file').modal('show');
        } else {
            alert('Error: PDF data or URL is missing.');
        }
    }
    
      
    //   function showText(decodedText) {
    //     document.getElementById("fileContent").innerText = atob(decodedText); // Assuming it's a simple text file
    //     $('#myModal').modal('show');
    //   }
    
      
      
      
    

    // $("body").on('click','.emma_second_folder_icon, .emma_second_folder_name', function(){

    //     var data_id_for_third_folder = $(this).data('thirddataid');
    //     var campus_id_for_third_folder = $(this).data('campusid');
    //     var third_institution_id = $(".abba-change-institution").val();
    //     var emma_folder_name = $(this).data('thisfoldername');

    //     // emma_second_folder_name_display

    //     // $(".emma_second_folder_name_display").html('<span class="emma_second_folder_icon, emma_second_folder_name" data-thirddataid="'+data_id_for_third_folder+'"  data-thisfoldername="'+emma_folder_name+'"  data-folderid="'+emma_gets_data_folder_id_for_second_folder+'"  data-campusid="'+campus_id_for_third_folder+'">'+emma_folder_name+'</span>');

    //     // $(".emma_third_folder_name_display").html();

    //         $(".emma_second_folder_name_display").html('<span class="emma_second_folder_icon, emma_second_folder_name" data-thirddataid="'+data_id_for_third_folder+'"  data-thisfoldername="'+emma_folder_name+'" data-campusid="'+campus_id_for_third_folder+'">  > '+emma_folder_name+'</span>');


    //         $(".emma_third_folder_name_display").html();

    //         // $(".emma_second_folder_name_display").html('');

    //         $(".emma_third_folder_name_display").html('');
        
    //     var datastring = "emma_third_campus_id=" + campus_id_for_third_folder + "&emma_first_folder_id=" + data_id_for_third_folder + "&emma_third_institution_id=" + third_institution_id;
        
    //     $(".emma_load_folder_content").html('<div align="center" class="mt-4 text-primary"><span class="spinner-border spinner-border-md" role="status" aria-hidden="true"></span> <span class="visually-hidden">Loading...</span></div>')

    //     $.ajax({
    //         type:'POST',
    //         url:'../../controller/scripts/owner/emma_quality_assurance/emma_send_third_folder_values.php',
    //         data:datastring,
    //         success:function(result){
    //            $(".emma_load_folder_content").html(result);
    //         }
    //     })
    // });

    $("body").on('click','.emma_create_icon_for_third_folder',function(){
        var emma_id_for_firstdataid = $(this).data('firstdataid');
        var emma_second_folder_data_id = $(this).data('id');
        var emma_campus_id = $(this).data('campuseid');


        $("#emma_received_data_id").val(emma_id_for_firstdataid);
        $(".emma_received_second_folder_id").val(emma_second_folder_data_id);
        $(".emma_received_this_campus_id").val(emma_campus_id);
    });

    $("body").on('click','.emma_create_third_folder_button',function(){
        var emma_data_id_for_second_folder = $(".emma_received_second_folder_id").val();
        var emma_campus_id_for_this_folder = $(".emma_received_this_campus_id").val();
        // var emma_data_id_for_third_folder_create = $("#emma_received_data_id").val();
        var emma_institution_id_for_third_folder_create = $(".abba-change-institution").val();
        var emma_folder_name_for_third_folder_create = $("#emma_third_folder_input").val();


        var datastring = "emma_campus_id_for_third_folder_create=" + emma_campus_id_for_this_folder + "&emma_second_data_id=" + emma_data_id_for_second_folder + "&emma_create_institution_id=" + emma_institution_id_for_third_folder_create + "&emma_create_folder_value=" + emma_folder_name_for_third_folder_create;
       
        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_quality_assurance/emma_create_for_thirdfolder.php',
            data:datastring,
            success:function(result){
                if(result == 40){
                    $.wnoty({
                        type: 'success',
                        message: "Folder Created Successfully",
                        autohideDelay: 5000
                    });
                    $("#emma_third_create_new_Modal").modal('hide');
                }else{
                    $.wnoty({
                        type: 'warning',
                        message: "Folder Name ALready Exists",
                        autohideDelay: 5000
                    });
                }

            }
        });
    });


    // edit for third folder 
       
    $("body").on('click','#emma_edit_icon_for_third_folder',function(){
        var emma_get_third_folder_data_id = $(this).data('thisdataidforedit');
        var emma_get_third_folder_value = $(this).data('thisdatavalueforedit');
        var emma_get_third_folder_campus_id = $(this).data('thiscampusidforedit');

        $("#this_third_folder_data_id").val(emma_get_third_folder_data_id);
        $("#this_third_folder_campus_id").val(emma_get_third_folder_campus_id);
        $("#emma_edit_third_file_input").val(emma_get_third_folder_value);

    });

    $("body").on('click','.emma_edit_third_file_create_button',function(){
        var emma_data_id_for_third_folder =  $("#this_third_folder_data_id").val();
        var emma_campus_id_for_third_folder =  $("#this_third_folder_campus_id").val();
        var emma_institution_id_for_third_folder =  $(".abba-change-institution").val();
        var emma_folder_value_for_third_folder =  $("#emma_edit_third_file_input").val();

        var datastring = "collect_data_id_for_third_folder=" + emma_data_id_for_third_folder + "&collect_campus_id_for_third_folder=" + emma_campus_id_for_third_folder + "&collect_institution_id_for_third_folder=" + emma_institution_id_for_third_folder + "&collect_value_for_third_folder=" + emma_folder_value_for_third_folder;

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_quality_assurance/emma_edit_page_for_third_folder.php',
            data:datastring,
            success:function(outcome){
                if(outcome == 12){
                    $.wnoty({
                        type: 'warning',
                        message: "Folder Name Already Exists",
                        autohideDelay: 5000
                    });
                }else{
                    $.wnoty({
                        type: 'success',
                        message: "Folder Successfully Updated",
                        autohideDelay: 5000
                    });
                    $("#emma_add_new_edit_modal_for_third_file").modal('hide');
                }
            }
        })
    });


    // delete for third folder 

    $("body").on('click','#emma_delete_icon_for_third_folder',function(){
        var emma_data_id_for_third_folder_delete = $(this).data('thisdataidfordelete');
        var emma_campus_id_for_third_folder_delete = $(this).data('thiscampusidfordelete');

        $("#emma_delete_third_folder_data_id").val(emma_data_id_for_third_folder_delete);
        $("#emma_delete_third_folder_campus_id").val(emma_campus_id_for_third_folder_delete);
    });

    $("body").on('click','.emmadeletethirdfolderbtn',function(){
        var emma_delete_data_id_for_third_folder = $("#emma_delete_third_folder_data_id").val();
        var emma_delete_campus_id_for_third_folder = $("#emma_delete_third_folder_campus_id").val();

        var datastring = "delete_data_id=" + emma_delete_data_id_for_third_folder + "&delete_campus_id=" + emma_delete_campus_id_for_third_folder;

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_quality_assurance/emma_delete_page_for_third_folder.php',
            data:datastring,
            success:function(output){
                if(output == 101){
                    $.wnoty({
                        type: 'success',
                        message: "Folder successfully deleted",
                        autohideDelay: 5000
                    });
                    $("#emma_third_folder_delete_Modal").modal('hide');
                }else{
                    $.wnoty({
                        type: 'warning',
                        message: "Folder Not deleted",
                        autohideDelay: 5000
                    });
                }
            }
        })
    });

    
    // CREATE FOR SECOND FILE 

    $("body").on('click','.emma_second_folder_icon, .emma_second_folder_name',function(){

        var emma_sending_firstfolder_id_for_second_file = $(this).data('thirddataid');
        var emma_sending_campusid_for_second_file = $(this).data('campusid');

        
        $("#emma_data_id_for_second_file").val(emma_sending_firstfolder_id_for_second_file)
        $("#emma_campus_id_for_second_file").val(emma_sending_campusid_for_second_file);


    });

    $("body").on('click','#emma_load_school_details',function(){
        var emma_get_data_id_for_second_file = $(this).data('filedataid');

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_quality_assurance/emma_display_file_content_for_modal.php',
            data:{emma_send_data_id:emma_get_data_id_for_second_file},
            success:function(result){
            }
        })
    });



    $(".upload_button_button_for_second_file").on("click", function() {

        var inputFiles = $("#emma_upload_second_file")[0].files[0];
        var emma_sending_third_folder_data_id = $("#emma_data_id_for_second_file").val();
        var emma_sending_third_folder_campus_id = $("#emma_campus_id_for_second_file").val();
        var emma_sending_third_folder_institution_id = $(".abba-change-institution").val();
        var filename = inputFiles.name;
        var fileExtension = filename.split('.').pop();

        console.log(inputFiles);

        if (inputFiles) {
            // Validate file type
            var allowedTypes = [
                "application/pdf",
                "application/msword",
                "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
                "application/vnd.ms-excel", // Excel 97-2003
                "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet", // Excel 2007 and later
                "image/jpeg",
                "image/png",
                "image/gif",
                "image/bmp",
                // Add more image types if needed
            ];
            
            if (allowedTypes.indexOf(inputFiles.type) === -1) {
                $.wnoty({
                    type: 'warning',
                    message: "Please select a valid PDF or DOC file.",
                    autohideDelay: 5000
                });
                return;
            }
            var reader = new FileReader();
            reader.onload = function(e) {
                var base64Data = e.target.result;
                uploadFile(base64Data,emma_sending_third_folder_data_id,emma_sending_third_folder_campus_id,emma_sending_third_folder_institution_id,filename,fileExtension);
            };
            reader.readAsDataURL(inputFiles);
        } else {
            $.wnoty({
                type: 'warning',
                message: "Please select a file.",
                autohideDelay: 5000
            });
        }


        function uploadFile(base64Data,emma_sending_third_folder_data_id,emma_sending_third_folder_campus_id,emma_sending_third_folder_institution_id,filename,fileExtension) {
             // Make an AJAX request to your server to handle the file upload
            $.ajax({
                type:'POST',
                url: "../../controller/scripts/owner/emma_quality_assurance/emma_upload_second_file_values.php",
                data: 
                {filedata: base64Data,
                filefothirdfolderdataid: emma_sending_third_folder_data_id,
                fileforthirdfoldercampusid: emma_sending_third_folder_campus_id,
                fileforthirdfolderinstitutionid: emma_sending_third_folder_institution_id,
                fileforthirdfilename: filename,
                fileforthirdfiletype: fileExtension},
                success: function(output) {
                    if(output == 3){
                        $.wnoty({
                            type: 'Success',
                            message: "File Successfully Uploaded.",
                            autohideDelay: 5000
                        });
                        emma_campus_function();
                        $(".emma_open_modal_for_second_file").modal('hide');
                    }
                    else if(output == 4){
                        $.wnoty({
                            type: 'warning',
                            message: "Please Already Exists.",
                            autohideDelay: 5000
                        });
                    }else{
                        $.wnoty({
                            type: 'warning',
                            message: "File Not Created.",
                            autohideDelay: 5000
                        });
                    }

                //             console.log("File uploaded successfully:", response);
                //     Handle success response
                // },
                // error: function(xhr, status, error) {
                //     console.error("Error uploading file:", error);
                //     Handle error response
                // }       
                }
            
            });
        }

    });


    // edit for second file 
    $("body").on('click','.emma_edit_icon_for_second_file',function(){
        var secondfile_data_id = $(this).data('id');
        var secondfile_campus_id = $(this).data('thiscampusid');
        var secondfile_value = $(this).data('name');


        $("#this_second_file_data_id").val(secondfile_data_id);
        $("#this_second_file_campus_id").val(secondfile_campus_id);
        $("#emma_edit_second_file_input").val(secondfile_value);



        $("body").on('click','.emma_edit_second_file_create_button',function(){

            var this_second_file_name = $("#emma_edit_second_file_input").val();
            var this_second_data_id = $("#this_second_file_data_id").val();
            var this_second_campus_id = $("#this_second_file_campus_id").val();
            var emma_gets_second_file_institution_id = $(".abba-change-institution").val();
        
            var datastring = "emma_institution_id_for_second_file=" + emma_gets_second_file_institution_id + "&emma_campus_for_second_file=" + this_second_campus_id + "&emma_data_id_for_second_file=" + this_second_data_id + "&emma_second_file_name=" + this_second_file_name;
            
            $.ajax({
                type: 'POST',
                url: '../../controller/scripts/owner/emma_quality_assurance/emma_edit_page_for_second_file.php',
                data: datastring,
                success: function(resultt) {
                    if(resultt == 122){
                        $.wnoty({
                            type: 'success',
                            message: "File Edited Successfully.",
                            autohideDelay: 5000
                        });
                        $("#emma_add_new_edit_modal_for_second_file").modal('hide');

                    }else{
                        $.wnoty({
                            type: 'warning',
                            message: "FileName Already Exists.",
                            autohideDelay: 5000
                        });
                    }
                }
            });
        
        });
    });

    // delete for second file 
    $("body").on('click','#delete_icon_for_second_file',function(){
        var secondfile_data_id_for_delete = $(this).data('ide');
        var secondfile_campus_id_for_delete = $(this).data('thiscampuside');

        $("#emma_delete_second_file_data_id").val(secondfile_data_id_for_delete);
        $("#emma_delete_second_file_campus_id").val(secondfile_campus_id_for_delete);
    });

    $("body").on('click','.emmadeletesecondfilebtn',function(){
        var emma_data_id_for_second_file_delete = $("#emma_delete_second_file_data_id").val();
        var emma_campus_id_for_second_file_delete = $("#emma_delete_second_file_campus_id").val();

        var datastring = "emma_gets_data_id_for_delete=" + emma_data_id_for_second_file_delete + "&emma_gets_campus_id_for_delete=" + emma_campus_id_for_second_file_delete;
        
        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_quality_assurance/emma_delete_page_for_second_file.php',
            data:datastring,
            success: function(outcome) {
                if(outcome == 19){
                    $.wnoty({
                        type: 'success',
                        message: "File Delete Successfully.",
                        autohideDelay: 5000
                    });
                    $("#emma_second_file_delete_Modal").modal('hide');
                }else{
                    $.wnoty({
                        type: 'warning',
                        message: "Delete Not Successful.",
                        autohideDelay: 5000
                    });
                }
            }
        })

    });

    // download for second folder 
    $("body").on('click','.emma_download_second_file',function(){
        var data_id_for_downloading_second_file = $(this).data('idfordownload');

        var datastring = "emma_download_for_data_id_for_second_folder=" + data_id_for_downloading_second_file;

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_quality_assurance/emma_second_file_download_page.php',
            data:datastring,
            success:function(output){
                $(".load_secondfile_download_content").html(output);

                var emma_basesixtyfour_for_secondfile = $("#emma_id_for_basesixtyfour_second_files_table").val();
                var emma_filename_for_secondfile = $("#emma_id_for_filename_second_files_table").val();
                // var emma_filetype_for_secondfile = $("#emma_id_for_filetype_second_files_table").val();

                // Replace 'your_base64_data_from_database' with the actual base64 data from your database
                var base64Data = emma_basesixtyfour_for_secondfile;

                // // Create a link
                var a = document.createElement('a');
                
                // Set the href attribute with base64 data
                a.href = base64Data;

                // // Set the file name (you can adjust the filename as needed)
                a.download = emma_filename_for_secondfile;

                // // Trigger a click on the link to start the download
                a.click();

            }
        })
    });
    

    $("body").on('click','.emma_name_for_third_folder, .emma_icon_for_third_folder',function(){
        var emma_data_id_for_third_file = $(this).data('thirdfileid');
        var emma_campus_id_for_third_file = $(this).data('thirdfilecampus');
        var emma_institution_id_for_third_file = $(".abba-change-institution").val();
        var emma_folder_name_for_third_folder = $(this).data('names');

        $(".emma_third_folder_name_display").html('<span class="emma_name_for_third_folder, emma_icon_for_third_folder" data-thirdfileid="'+emma_data_id_for_third_file+'"  data-names="'+emma_folder_name_for_third_folder+'" data-thirdfilecampus="'+emma_campus_id_for_third_file+'"> > '+emma_folder_name_for_third_folder+' </span>');

        // $(".emma_third_folder_name_display").html();

        // $(".emma_second_folder_name_display").html('');

        // $(".emma_third_folder_name_display").html('');
        $('.emma_first_folder_name_display' ).append(  '  >  '  + emma_folder_name_for_third_folder);


        var datastring = "emma_gets_third_file_data_id=" + emma_data_id_for_third_file + "&emma_gets_third_file_campus_id=" + emma_campus_id_for_third_file + "&emma_gets_third_file_institution_id=" + emma_institution_id_for_third_file;
        
        $(".emma_load_folder_content").html('<div align="center" class="mt-4 text-primary"><span class="spinner-border spinner-border-md" role="status" aria-hidden="true"></span> <span class="visually-hidden">Loading...</span></div>')

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_quality_assurance/emma_send_third_file_values.php',
            data:datastring,
            success:function(outcome){

                $(".emma_load_folder_content").html(outcome);

                $(document).ready(function(){
                    var items = $(".emma_first_div_for_third_file_pagination .emma_second_div_for_third_file_pagination");
                    var numItems = items.length;
                    var perPage = 9;
                    var prebtn = '<i class="fa fa-arrow-left"></i>';
                    var nextbtn = '<i class="fa fa-arrow-right"></i>';
                        
                    items.slice(perPage).hide();
                
                    $('#emma_third_div_for_third_file_pagination').pagination({
                        items: numItems,
                        itemsOnPage: perPage,
                        prevText: prebtn,
                        nextText: nextbtn,
                        onPageClick : function (pageNumber){
                            var showFrom = perPage * (pageNumber - 1);
                            var showTo = showFrom + perPage;
                            items.hide().slice(showFrom, showTo).show();
                        }
                    });
                });

                $('#emma_third_div_for_third_file_pagination').show();

            }
        })
    });

    $("body").on('click','.emma_name_for_third_folder, .emma_icon_for_third_folder',function(){
        var emma_data_id_for_third_file_create = $(this).data('thirdfileid');
        var emma_campus_id_for_third_file_create = $(this).data('thirdfilecampus');


        $("#emma_data_id_for_third_file").val(emma_data_id_for_third_file_create);
        $("#emma_campus_id_for_third_file").val(emma_campus_id_for_third_file_create);

    });

    // $("body").on('click','',function(){

    // });



    $("body").on('click','.upload_button_for_third_file',function(){
        var inputthirdFile = $("#emma_upload_third_file")[0].files[0];
        var emma_sending_third_file_data_id = $("#emma_data_id_for_third_file").val();
        var emma_sending_third_file_campus_id = $("#emma_campus_id_for_third_file").val();
        var emma_sending_third_file_institution_id = $(".abba-change-institution").val();
        var filename = inputthirdFile.name;
        var fileExtension = filename.split('.').pop();


        // console.log(inputthirdFile);

        if (inputthirdFile) {
            // Validate file type
            var allowedTypes = ["application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document"];
            if (allowedTypes.indexOf(inputthirdFile.type) === -1) {
                $.wnoty({
                    type: 'warning',
                    message: "Please select a valid PDF or DOC file.",
                    autohideDelay: 5000
                });
                return;
            }
            var reader = new FileReader();
            reader.onload = function(e) {
                var base64Data = e.target.result;
                uploadFile(base64Data,emma_sending_third_file_data_id,emma_sending_third_file_campus_id,emma_sending_third_file_institution_id ,filename,fileExtension);
            };
            reader.readAsDataURL(inputthirdFile);
        } else {
            $.wnoty({
                type: 'warning',
                message: "Please select a file.",
                autohideDelay: 5000
            });
        }


        function uploadFile(base64Data,emma_sending_third_file_data_id,emma_sending_third_file_campus_id,emma_sending_third_file_institution_id,filename,fileExtension) {
             // Make an AJAX request to your server to handle the file upload
            $.ajax({
                type:'POST',
                url: "../../controller/scripts/owner/emma_quality_assurance/emma_upload_third_file_values.php",
                data: { filedata: base64Data, filefothirdfiledataid: emma_sending_third_file_data_id, fileforthirdfilecampusid: emma_sending_third_file_campus_id, fileforthirdfileinstitutionid: emma_sending_third_file_institution_id, fileforthirdfilename: filename, fileforthirdfiletype: fileExtension},
                success: function(output) {
                    if(output == 3){
                        $.wnoty({
                            type: 'Success',
                            message: "File Successfully Uploaded.",
                            autohideDelay: 5000
                        });
                    }
                    else if
                    (output == 4){
                        $.wnoty({
                            type: 'warning',
                            message: "Please Already Exists.",
                            autohideDelay: 5000
                        });
                    }else{
                        $.wnoty({
                            type: 'warning',
                            message: "File Not Created.",
                            autohideDelay: 5000
                        });
                    }

                //             console.log("File uploaded successfully:", response);
                //     Handle success response
                // },
                // error: function(xhr, status, error) {
                //     console.error("Error uploading file:", error);
                //     Handle error response
                // }       
                }
            
            });
        }
    });

    // edit for third folder 

    $("body").on('click','.emma_edit_third_file',function(){
        var emma_third_file_data_id_for_edit = $(this).data('folderid');
        var emma_third_file_campus_id_for_edit = $(this).data('campusid');
        var emma_third_file_name_for_edit = $(this).data('thisname');

        $("#this_third_file_data_id").val(emma_third_file_data_id_for_edit);
        $("#this_third_file_campus_id").val(emma_third_file_campus_id_for_edit);
        $("#emma_edit_third_files_input").val(emma_third_file_name_for_edit);


        $("body").on('click','.emma_edit_third_files_create_button',function(){

            var this_third_file_name = $("#emma_edit_third_files_input").val();
            var this_third_data_id = $("#this_third_file_data_id").val();
            var this_third_campus_id = $("#this_third_file_campus_id").val();
            var emma_gets_third_file_institution_id = $(".abba-change-institution").val();
        
            var datastring = "emma_institution_id_for_third_file=" + emma_gets_third_file_institution_id + "&emma_campus_for_third_file=" + this_third_campus_id + "&emma_data_id_for_third_file=" + this_third_data_id + "&emma_third_file_name=" + this_third_file_name;
            
            $.ajax({
                type: 'POST',
                url: '../../controller/scripts/owner/emma_quality_assurance/emma_edit_page_for_third_file.php',
                data: datastring,
                success: function(results) {
                    if(results == 122){
                        $.wnoty({
                            type: 'success',
                            message: "File Edited Successfully.",
                            autohideDelay: 5000
                        });
                        $("#emma_add_new_edit_modal_for_third_files").modal('hide');

                    }else{
                        $.wnoty({
                            type: 'warning',
                            message: "FileName Already Exists.",
                            autohideDelay: 5000
                        });
                    }
                }
            });
        
        });

    });

    // delete for third file 

    $("body").on('click','#emma_delete_icon_for_first_files',function(){
        var thirdfiles_data_id_for_delete = $(this).data('folderiddelete');
        var thirdfiles_campus_id_for_delete = $(this).data('campusiddelete');

        $("#emma_delete_third_files_data_id").val(thirdfiles_data_id_for_delete);
        $("#emma_delete_third_files_campus_id").val(thirdfiles_campus_id_for_delete);

        $("body").on('click','.emmadeletethirdfilesbtn',function(){
            var emma_data_id_for_third_files_delete = $("#emma_delete_third_files_data_id").val();
            var emma_campus_id_for_third_files_delete = $("#emma_delete_third_files_campus_id").val();

            var datastring = "emma_gets_third_file_data_id_for_delete=" + emma_data_id_for_third_files_delete + "&emma_gets_third_file_campus_id_for_delete=" + emma_campus_id_for_third_files_delete;
            
            $.ajax({
                type:'POST',
                url:'../../controller/scripts/owner/emma_quality_assurance/emma_delete_page_for_third_files.php',
                data:datastring,
                success: function(outcome) {
                    if(outcome == 223){
                        $.wnoty({
                            type: 'success',
                            message: "File Deleted Successfully.",
                            autohideDelay: 5000
                        });
                        $("#emma_third_files_delete_Modal").modal('hide');
                    }else{
                        $.wnoty({
                            type: 'warning',
                            message: "File Not Deleted.",
                            autohideDelay: 5000
                        });
                    }
                }
            })

        });
    });


    // download for third file 
    $("body").on('click','.emma_download_third_file',function(){
        var data_id_for_downloading_third_files = $(this).data('thirdfiledataid');

        var datastring = "emma_download_for_data_id_for_third_folder=" + data_id_for_downloading_third_files;

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_quality_assurance/emma_third_file_download_page.php',
            data:datastring,
            success:function(outputs){
                $(".load_secondfile_download_content").html(outputs);

                var emma_basesixtyfour_for_thirdfile = $("#emma_id_for_basesixtyfour_third_files_table").val();
                var emma_filename_for_thirdfile = $("#emma_id_for_filename_third_files_table").val();
                // var emma_filetype_for_secondfile = $("#emma_id_for_filetype_second_files_table").val();

                // Replace 'your_base64_data_from_database' with the actual base64 data from your database
                var base64Data = emma_basesixtyfour_for_thirdfile;

                // // Create a link
                var a = document.createElement('a');
                
                // Set the href attribute with base64 data
                a.href = base64Data;

                // // Set the file name (you can adjust the filename as needed)
                a.download = emma_filename_for_thirdfile;

                // // Trigger a click on the link to start the download
                a.click();

            }
        })
    });

    $("body").on("click",".emma_view_for_third_file",function(){
        var emmalastfileid = $(this).data("emmalastfileid");
        var emmalastfiletype = $(this).data("emmalastfiletype");
        var emmalastfilebasesixtyfour = $(this).data("emmalastfilebasesixtyfour");


        if(emmalastfiletype == 'pdf' || emmalastfiletype == 'PDF')
        {
            var decodedPDF = emmalastfilebasesixtyfour
            showlastPDF(decodedPDF);
        }
        else if(emmalastfiletype == 'rtf' || emmalastfiletype == 'RTF')
        {
            var decodedPDF = emmalastfilebasesixtyfour
            showlastPDF(decodedPDF);
        }
        else if(emmalastfiletype == 'docx' || emmalastfiletype == 'doc' || emmalastfiletype == 'DOC' || emmalastfiletype == 'DOCX')
        {
            var decodedPDF = emmalastfilebasesixtyfour
            showlastPDF(decodedPDF);
        }
        else if(emmalastfiletype == 'xlsx' || emmalastfiletype == 'xls' || emmalastfiletype == 'XLSX' || emmalastfiletype == 'XLS')
        {
            var decodedPDF = emmalastfilebasesixtyfour
            showlastPDF(decodedPDF);
        }
        else if(emmalastfiletype == 'html' || emmalastfiletype == 'htm' || emmalastfiletype == 'HTM' || emmalastfiletype == 'HTML')
        {
            var decodedPDF = emmalastfilebasesixtyfour
            showlastPDF(decodedPDF);
        }
        else if(emmalastfiletype == 'ppt' || emmalastfiletype == 'pptx' || emmalastfiletype == 'PPT' || emmalastfiletype == 'PPTX')
        {
            var decodedPDF = emmalastfilebasesixtyfour
            showlastPDF(decodedPDF);
        }
        else if(emmalastfiletype == 'ods' || emmalastfiletype == 'ODS')
        {
            var decodedPDF = emmalastfilebasesixtyfour
            showlastPDF(decodedPDF);
        }
        else if(emmalastfiletype == 'odt' || emmalastfiletype == 'ODT')
        {
            var decodedPDF = emmalastfilebasesixtyfour
            showlastPDF(decodedPDF);
        }
        else
        {

        }
        
        var datastring = "lastfileid=" + emmalastfileid;

        $.ajax({
            type:"POST",
            url:"../../controller/scripts/owner/emma_quality_assurance/emma_display_last_file_content.php",
            data:datastring,
            success:function(outcome){
                alert(outcome);
                $("#emma_load_last_file_on_modal").html(outcome);
            }
        });
    });

    function showlastPDF(decodedPDF) {
        if(decodedPDF) {
            $('#emma_load_last_file_on_modal').attr('src', decodedPDF);
            
            // $('#emma_modal_for_second_file').modal('show');
        } else {
            alert('Error: PDF data or URL is missing.');
        }
    }

    $("body").on('click','#emma-search_icon',function(){
        var searchTerm = $('#searchvalue').val();

        if(searchTerm == '' || searchTerm == 'NULL'){

        }else{
            // Make an AJAX request to the server
            $.ajax({
                type: 'POST',
                url: '../../controller/scripts/owner/emma_quality_assurance/emma_search_page_for_data_room.php',
                data: { search: searchTerm },
                success: function(response) {
                    $('#emma_load_search_contents').html(response);
                }
            });
        }
    });

    // $("body").on('click','.emma_search_details_for_file',function(){
    //     var emma_gets_file_institution_id_for_search = $(".abba-change-institution").val();
    //     var emma_gets_file_file_id_for_search = $(this).data('file');
    //     var emma_gets_file_folder_id_for_search = $(this).data('folder');
    //     var emma_gets_file_type_for_search = $(this).data('type');

    //     var datastring = "emma_get_institution_id_for_search=" + emma_gets_file_institution_id_for_search + "&emma_get_file_id_for_search=" + emma_gets_file_file_id_for_search + "&emma_gets_folder_id_for_search=" + emma_gets_file_folder_id_for_search + "&emma_foldertype_for_search=" + emma_gets_file_type_for_search;

    //     $.ajax({
    //         type:'POST',
    //         url:'../../controller/scripts/owner/emma_quality_assurance/emma_load_search_content_for_file.php',
    //         data:datastring,
    //         success:function(outcome){
    //         }
    //     })
    // });

    $("body").on('click', '.emma_search_details_for_file', function () {
        var emma_base_sixty_four_for_second_file = $(this).data('basesixtyfour');
    
        // Open a new tab or window with the PDF content
        var pdfWindow = window.open('', '_blank');
        pdfWindow.document.write('<embed width="100%" height="100%" src="data:application/pdf;base64,' + emma_base_sixty_four_for_second_file + '" type="application/pdf" />');
    });


    // $('.emma_first_folder_name_display' ).append(  '  >  '  + emma_folder_name_for_third_folder);
    

});