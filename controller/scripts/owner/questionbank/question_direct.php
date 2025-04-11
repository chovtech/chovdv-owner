<script>

    $(document).ready(function () {

        createEditorInstance(); 

        var tari_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");

        $('#section_subject_card').hide('fast');
        $('#term_topic_card').hide('fast');
        $('#class_card').hide('fast');
        $('#submit_card').hide('fast');

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/tari_get_campus_direct.php",
            data: { tari_get_stored_instituion_id: tari_get_stored_instituion_id },
            //cache: false,
            success: function (output) {
                // alert(output);
                $('#display_campus').html(output);
            }
        });

        // Get Campus ID
        $('body').on('click', '.radio-card', function() {
            
            var campus_id =  $(this).data('id');

            
            
            // alert(campus_id);

            if(campus_id == undefined){

                $.wnoty({
                    type: 'warning',
                    message: 'Please Select Campus',
                    autohideDelay: 3000, // 5 seconds
                    position:'top-right',
                    autohide:true
                });

            }else{

                $('#section_subject_card').show('fast');
                $('#subject_direct').hide('fast');
                
                $('#section_direct').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                
                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/tari_get_section_direct.php",
                    data: { tari_get_stored_instituion_id: tari_get_stored_instituion_id, campus_id:campus_id },
                    //cache: false,
                    success: function (output) {
                       
                          

                        $('#subject_direct').show('fast');
                        $('#section_direct').html(output);

                        // Get Subject from Database
                        $("#select_direct").on("change",function (event) {

                            var sectionID =  $(this).val();


                            // alert(sectionID);

                            if(sectionID == '0'){
                                $.wnoty({
                                    type: 'warning',
                                    message: 'Please Select Section',
                                    autohideDelay: 3000, // 5 seconds
                                    position:'top-right',
                                    autohide:true
                                });
                            }else{

                                $('#subject_direct').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

                                $.ajax({
                                    type: "POST",
                                    url: "../../controller/scripts/owner/tari_get_subject_direct.php",
                                    data: { tari_get_stored_instituion_id: tari_get_stored_instituion_id, campus_id:campus_id, sectionID:sectionID },
                                    //cache: false,
                                    success: function (output) {

                                        // alert(output);

                                        $('#subject_direct').html(output);

                                        // Get Topic and Sub-Topic from Database
                                        $('body').on('click', '.subjectDirect', function() {

                                            var classID =  $(this).data('id');

                                            // alert(subjectID);

                                            $('#term_topic_card').show('fast');


                                            $.ajax({
                                                    type: "POST",
                                                    url: "../../controller/scripts/owner/questionbank/prosgetsubjectforbank.php",
                                                    data: { classID: classID, campus_id:campus_id, sectionID:sectionID },
                                                    //cache: false,
                                                    success: function (output) {


                                                    }
                                             });

                                       



                                             

                                                // $("#term2").on("change",function (event) {
                                                        
                                                //         var term = $('#term2').val();

                                                //         $('#class_card').hide('fast');

                                                        
                                                //         var dataString = '&term='+ term + '&campus_id='+ campus_id + '&subjectID='+ subjectID + '&sectionID='+ sectionID;

                                                //         // alert(dataString);

                                                //         $('#topic2').html('<option value="0">Loading...</option>');
                                                    
                                                //         $.ajax({
                                                //             type: "POST",
                                                //             url: "../../controller/scripts/owner/get_topic_direct.php",
                                                //             data: dataString,
                                                            
                                                //             success: function(result){
                                                //                 // alert(result);
                                                //                 $('#topic2').html(result);

                                                //             }
                                                //         });
                                                // });

                                                // $("#topic2").on("change",function (event) {
                                                    
                                                //     var campus_id = $('.active-card').data('id');
                                                //     var topic = $('#topic2').val();

                                                //     var dataString = '&campus_id='+ campus_id+'&topic='+ topic;

                                                //     // alert(dataString);

                                                //     $('#sub-topic2').html('<option value="0">Loading...</option>');
                                                    
                                                    
                                                //     $.ajax({
                                                //         type: "POST",
                                                //         url: "../../controller/scripts/owner/getSubTopic.php",
                                                //         data: dataString,
                                                        
                                                //         success: function(result){
                                                //             // alert(result);
                                                //             $('#sub-topic2').html(result);                           
                                                //         }
                                                //     });
                                                // });
   
                                            
                                        });
 
                                    }
                                });

                            }

                        });
                    }
                });

            }

        });

        $('body').on('click', '#NextSectionClass', function() {

            var term = $('#term2').val();
            var topic = $('#topic2').val();
            var sub_topic = $('#sub-topic2').val();
            var subjectID =  $('input[name="radio3"]:checked').val();
            var sectionID =  $('#select_direct').val();
            var campus_id =   $('input[name="radio-cards"]:checked').val();

            var dataString = '&term='+ term + '&campus_id='+ campus_id + '&subjectID='+ subjectID + '&sectionID='+ sectionID + '&topic='+ topic  + '&sub_topic='+ sub_topic;

            // alert(dataString);

            if(term == '0' || term == ''){
                $.wnoty({
                    type: 'warning',
                    message: 'Please Select Term',
                    autohideDelay: 3000, // 5 seconds
                    position:'top-right',
                    autohide:true
                });
            }else{

                $('#NextSectionClass').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

                $('#class_card').fadeIn('slow');
                $('#class_card_display').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/tari_get_class_direct.php",
                    data: { 
                        tari_get_stored_instituion_id: tari_get_stored_instituion_id,
                        term:term,
                        topic:topic,
                        sub_topic:sub_topic,
                        subjectID, subjectID,
                        sectionID: sectionID,
                        campus_id: campus_id
                        },
                    //cache: false,
                    success: function (output) {
                        // alert(output);
                        $('#class_card_display').html(output);

                        $('#NextSectionClass').html('Select Class');
                    }
                });
            }
    

        });
        
        // Show the Add Questions Button
        $('body').on('click', '.checkbox', function() {
            var Class = $(this).data('id');
            $('#submit_card').fadeIn('slow');
        });
        
        $('body').on('click', '.exampleModalToggle', function() {

                var Class = $(this).data('id');

                $('#submit_card').fadeIn('slow');

                //  Hide all forms
                $('#objective_direct').hide();
                $('#theory_direct').hide();
                $('.import_direct').hide();


                $("#types_direct").on("change", function (event) {

                    $('#objective_direct').hide();
                    $('#theory_direct').hide();
                    $('.import_direct').hide();

                    var selected = $(this).val();

                    if(selected == '0'){
                        $('#objective_direct').hide();
                        $('#theory_direct').hide();
                        $('.import_direct').hide();

                    }else{

                        if(selected == 'Objective'){

                            $("#category_direct").on("change",function (event) {

                                var category = $(this).val();

                                if(category == 'Assesement'){

                                    $('#theory_direct').hide();
                                    $('#objective_direct').show();
                                    $('.import_direct').show();

                                }else if(category == 'Practice'){

                                    $('#theory_direct').hide();
                                    $('#objective_direct').show();
                                    $('.import_direct').show();

                                }else if(category == '0'){

                                    $('#objective_direct').hide();
                                    $('#theory_direct').hide();
                                    $('.import_direct').hide();
                                }

                            });

                        } else if(selected == 'Theory'){

                            $("#category_direct").on("change",function (event) {

                                var category = $(this).val();

                                if(category == 'Assesement'){

                                    $('#theory_direct').fadeIn();
                                    $('#objective_direct').hide();
                                    $('.import_direct').fadeIn();

                                }else if(category == 'Practice'){

                                    $('#theory_direct').fadeIn();
                                    $('#objective_direct').hide();
                                    $('.import_direct').fadeIn();

                                }else if(category == '0'){

                                    $('#objective_direct').hide();
                                    $('#theory_direct').hide();
                                    $('.import_direct').hide();
                                }

                            });

                        }

                    }
                });
                    



        });

        // Filter the Question Direct
        // Hide all forms
        $('.filter_subject_direct').css('display', 'none');
        $('.filter_region_direct').css('display', 'none');
        $('.filter_topic_direct').css('display', 'none');
        $('.filter_sub_topic_direct').css('display', 'none');
        $('.searchbtn_direct').css('display', 'none');

        $("#filter_class_direct").on("change",function (event) {

                var filter_class = $(this).val();
                var filter_classID = $(this).find('option:selected').data('id');

                // alert(filter_classID);

                if(filter_class == 'NULL'){

                    $('.filter_subject_direct').css('display', 'none');
                    $('.filter_region_direct').css('display', 'none');
                    $('.filter_topic_direct').css('display', 'none');
                    $('.filter_sub_topic_direct').css('display', 'none');

                }else{

                    $('.filter_subject_direct').removeClass('display');
                    $('.filter_subject_direct').fadeIn('fast');

                            var dataString = '&filter_class='+ filter_class;

                            // alert(dataString);

                            $('#filter_subject_direct').html('<option value="0">Loading...</option>');
                            
                            
                            $.ajax({
                                type: "POST",
                                url: "../../controller/scripts/owner/getDefaultSubject.php",
                                data: dataString,
                                
                                success: function(result){
                                    // alert(result);
                                    $('#filter_subject_direct').html(result);                           
                                }
                            });

                            $("#filter_subject_direct").on("change",function (event) {

                                var filter_subject = $(this).val();

                            if(filter_subject == 'NULL'){

                                $('.filter_region_direct').css('display', 'none');
                                $('.filter_topic_direct').css('display', 'none');
                                $('.filter_sub_topic_direct').css('display', 'none');

                            }else{

                                    $('.filter_region_direct').removeClass('display');
                                    $('.filter_region_direct').fadeIn('fast');
                                    $('.searchbtn_direct').removeClass('display');
                                    $('.searchbtn_direct').fadeIn('fast');

                                    var dataString = '&filter_class='+ filter_class + '&filter_subject='+ filter_subject;

                                // alert(dataString);

                                    $('#filter_region_direct').html('<option value="0">Loading...</option>');
                                
                                        $.ajax({
                                            type: "POST",
                                            url: "../../controller/scripts/owner/getDefaultRegion.php",
                                            data: dataString,
                                            
                                            success: function(result){
                                                // alert(result);
                                                $('#filter_region_direct').html(result);                           
                                            }
                                        });

                                    $("#filter_region_direct").on("change",function (event) {

                                        var filter_region = $(this).val();

                                        if(filter_region == 'NULL'){

                                            $('.filter_topic_direct').css('display', 'none');
                                            $('.filter_sub_topic_direct').css('display', 'none');

                                        }else{

                                                $('.filter_topic_direct').removeClass('display');
                                                $('.filter_topic_direct').fadeIn('fast');
                                                $('.filter_sub_topic_direct').removeClass('display');
                                                $('.filter_sub_topic_direct').fadeIn('fast');


                                                var dataString = '&filter_classID='+ filter_classID + '&filter_subject='+ filter_subject + '&filter_region='+ filter_region;
                                                
                                                // alert(dataString);

                                                $('#filter_topic').html('<option value="0">Loading...</option>');

                                                    $.ajax({
                                                        type: "POST",
                                                        url: "../../controller/scripts/owner/getDefaultTopic.php",
                                                        data: dataString,
                                                        
                                                        success: function(result){
                                                            // alert(result);
                                                            $('#filter_topic_direct').html(result);                           
                                                        }
                                                    });

                                                    $("#filter_topic_direct").on("change",function (event) {

                                                        var filter_topic = $(this).val();

                                                        if(filter_topic == 'NULL'){
                                                            $('#filter_sub_topic_direct').css('display', 'none');
                                                        }else{

                                                            $('.filter_sub_topic_direct').removeClass('display');
                                                            $('.filter_sub_topic_direct').fadeIn('slow');

                                                            var dataString = '&filter_topic='+ filter_topic;
                                                
                                                        // alert(dataString);

                                                            $('#filter_sub_topic_direct').html('<option value="0">Loading...</option>');

                                                            $.ajax({
                                                                type: "POST",
                                                                url: "../../controller/scripts/owner/getDefaultSubTopic.php",
                                                                data: dataString,
                                                                
                                                                success: function(result){
                                                                    // alert(result);
                                                                    $('#filter_sub_topic_direct').html(result);                           
                                                                }
                                                            });

                                                        }

                                                    });
                                        }


                                    });


                            }
                    });


                }
        });
    
        // Seach Question Direct
        $("#search_question_direct").on("click", function () {
                
            var filter_classID = $('#filter_class_direct').find('option:selected').data('id');
            var filter_subject = $('#filter_subject_direct').val();
            var filter_region = $('#filter_region_direct').val();
            var filter_topic = $('#filter_topic_direct').val();
            var filter_sub_topic = $('#filter_sub_topic_direct').val();
            var questionCategory = $('#types_direct').val();

            var dataString  =   '&filter_subject='+ filter_subject + 
                                '&filter_classID='+ filter_classID + 
                                '&filter_region='+ filter_region + 
                                '&filter_topic='+ filter_topic + 
                                '&filter_sub_topic='+ filter_sub_topic + 
                                '&questionCategory=' + questionCategory;
                // alert(dataString);


                // $(this).prop('disabled', true);
                $('#output_direct').html('<div class="load-7 mx-auto" style="position:relative; top:50%;display:flex;justify-content:center;align-items:center;"><div class="square-holder"><div class="square"></div></div></div>');

                    $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/get_edumess_question_from_bank.php",
                        data: dataString,
                        success: function(result){
                            // alert(result);

                            $('#search_question_direct').prop('disabled', false);
                            $('#output_direct').html(result); 

                        
                            $('.question_card').click(function() {
                                $(this).toggleClass('selected');
                                
                            });
                           

                        }
                                
                                
                    });
        });

        // Preview and Insert Question Script 
        $('body').on('click', '#previewQ_direct', function() {

            var selectedCardIds = [];
            var selectedCardIds2 = [];

            $.each($('.selected'), function() {
                selectedCardIds.push($(this).data('id'));
                selectedCardIds2.push($(this).data('count'));
            });
            // alert(selectedCardIds);
            // alert(selectedCardIds2);


            // alert(selectedCardIds2);

            if(selectedCardIds.length == 0){
                $.wnoty({
                    type: 'warning',
                    message: 'Please Select Question from Bank',
                    autohideDelay: 3000, // 5 seconds
                    position:'top-right',
                    autohide:true
                });
            }
            else
            {    
            // Send the selectedCards array to PHP for further processing
            $.ajax({
                url: "../../controller/scripts/owner/preview_question_from_bank.php",
                method: 'POST',
                data: { cards: selectedCardIds, nums:selectedCardIds2},
                success: function(response) {
                    // Handle the response from PHP
                    //    alert(response);
                    $(document).ready(function() {
                            
                        $('#show_direct').html(response);
                        $('#previewQuestion_direct').modal('show');
                        
                    });

                }
            });
            }

        });

        // import Question
        $('body').on('click', '#importQ_direct', function() {

            var selectedCardIds = [];
            var selectedCardIds2 = [];

            $.each($('.selected'), function() {
                selectedCardIds.push($(this).data('id'));
                selectedCardIds2.push($(this).data('count'));
            });

            // alert(selectedCardIds);

            var tari_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");
            var campus_id = $('.active-card').data('id');
            var class_id =  $('[name="class_direct"]:checked').val();
            var subject_id =  $('[name="radio3"]:checked').val();
            var term = $('#term2').val();
            var topic = $('#topic2').val();
            var sub_topic = $('#sub-topic2').val();
            var questionType = $('#types_direct').val();
            var questionCategory = $('#category_direct').val();
            var section_id =  $('#select_direct').val();
            var userType = 'owner';


            // alert(section_id);

            var dataString  =   '&tari_get_stored_instituion_id='+ tari_get_stored_instituion_id + 
                                '&campus_id='+ campus_id + 
                                '&class_id='+ class_id + 
                                '&subject_id='+ subject_id + 
                                '&term='+ term + 
                                '&topic=' + topic+ 
                                '&sub_topic=' + sub_topic+ 
                                '&questionType=' + questionType + 
                                '&questionCategory=' + questionCategory + 
                                '&section_id=' + section_id + 
                                '&userType=' + userType ;

                //  alert(dataString);


                $(this).prop("disabled", true);
                $(this).html('Importing... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

                $.ajax({
                    url: "../../controller/scripts/owner/insert_question_from_bank.php",
                    method: 'POST',
                    data: { cards: selectedCardIds,
                            nums:selectedCardIds2,
                            tari_get_stored_instituion_id:tari_get_stored_instituion_id,
                            campus_id:campus_id,
                            class_id:class_id,
                            section_id:section_id,
                            subject_id:subject_id,
                            term:term,
                            topic:topic,
                            sub_topic:sub_topic,
                            questionType:questionType,
                            questionCategory: questionCategory,
                            userType:userType
                        },
                    success: function(response) {

                        // alert(response);

                        $.wnoty({
                            type: 'success',
                            message: response,
                            autohideDelay: 5000, // 5 seconds
                            position:'top-right',
                            autohide: false
                        });

                        $('#importQ_direct').removeProp("disabled");
                        $('#importQ_direct').prop("disabled", false);
                        $('#importQ_direct').html("Import", false);

                    
                        $('#createQuestionDirect').modal('hide');
                        $('#previewQuestion_direct').modal('hide');
                        // $('#previewQuestion2').modal('hide');
                    }
                });

        });

         // Tinymce Create Instance for Modal
         $(".exampleModalToggle").on("click", function () {
            
                var i = 1;
                $('#addy').click(function () {
                    i++;
                    $('#formmy').append('<div class="row"><div class="col-sm-10 col-md-12" id="question"><form class="form" id="all-form"><div class="row"><div class="col-12 col-sm-12 col-md-8 col-lg-10"><div class="card border-0"><h5 class="fw-light-bold">Question'+i+'</h5><p class="fw-light-bold">Please Input Question</p><textarea class ="example tinymce question_direct" id="question'+i+'" name="area"></textarea></div></div></div><div class="form-group mt-3 row"><label for="example-text-input" style="font-size: 12px;" class="col-sm-2 col-md-2 col-form-label">Option A:</label><div class="col-sm-6 col-sm-6 col-lg-6"><textarea class ="example tinymce optionA_direct" id="optionA'+i+'" name="area" style="height: 200px;"></textarea></div></div><div class="form-group mt-3 row"><label for="example-text-input" style="font-size: 12px;" class="col-sm-2 col-md-2 col-form-label">Option B:</label><div class="col-sm-6 col-md-6 col-lg-6"><textarea class ="example tinymce optionB_direct" id="optionB'+i+'" name="area"></textarea></div></div><div class="form-group mt-3 row"><label for="example-text-input" style="font-size: 12px;" class="col-sm-2 col-md-2 col-form-label">Option C:</label><div class="col-sm-6 col-md-6"><textarea class ="example tinymce optionC_direct" id="optionC'+i+'" name="area"></textarea></div></div><div class="form-group  mt-3 row"><label for="example-text-input" style="font-size: 12px;" class="col-sm-2 col-md-2 col-form-label">Option D:</label><div class="col-sm-6 col-md-6 col-lg-6"><textarea class ="example tinymce optionD_direct" id="optionD'+i+'" name="area"></textarea></div></div><div class="form-group  mt-3 row"><label for="example-month-input" style="font-size: 12px;" class="col-sm-4 col-md-2 col-form-label">Select Correct option</label><div class="col-sm-6 col-md-6 col-lg-6"><select class="select form-control" id="inlineFormCustomSelect_direct"><option selected="" disabled>Select correct option</option><option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option></select></div></div></form></div><div class="col-sm-12 col-md-8 col-lg-8 mt-2"><a href="javascript:;" id="remove" class="dell float-end" style="color:red;"><i class="fa fa-trash"></i> Remove</a></div></div>');    
                    createEditorInstance();
                    });
                $(document).on('click','.dell', function(){
                    // $(this).parents('.row').remove();
                    $('.formy').children().last().remove();
                });
          
                var i = 1;
                $('#addy2').click(function () {
                    i++;
                    $('#formmy2').append('<div class="row"><div class="col-12 col-sm-12 col-md-8 col-lg-10"><div class="card border-0"><h5 class="fw-light-bold">Question'+i+'</h5><p class="fw-light-bold">Please Input Question</p><textarea class ="question22_direct example tinymce" id="question2'+i+'" name="area"></textarea></div></div><div class="col-sm-12 col-md-8 col-lg-10 mt-2" style="float:right;"><a href="javascript:;" id="remove" class="dell2 float-end" style="color:red;"><i class="fa fa-trash"></i> Remove</a></div></div>');     
                    createEditorInstance();
                        });
                $(document).on('click','.dell2', function(){
                    // $(this).parents('.row').remove();
                    $('.formy2').children().last().remove();
                    
                });


        });

         // <!-- Preview Typed Question Direct Question -->
         $('body').on('click', '#previewQ2_direct', function() {
                    
                
            tinyMCE.triggerSave();

            var types = $('#types_direct').val();
            var category = $('#category_direct').val();

            var dataString  = '&types=' + types + '&category=' + category;

            // alert(dataString);

            if(types == '0' || types == ''){
                $('#types_direct').css("outline", "1px solid red");
                    $.wnoty({
                        type: 'warning',
                        message: 'Please Select Question Type',
                        autohideDelay: 3000, // 5 seconds
                        position:'top-right',
                        autohide:true
                    });
            }else if(category == '0' || category == ''){
                $('#types_direct').css("outline", "1px solid green");
                $('#category_direct').css("outline", "1px solid red");
                $.wnoty({
                        type: 'warning',
                        message: 'Please Select Question Category',
                        autohideDelay: 3000, // 5 seconds
                        position:'top-right',
                        autohide:true
                    });
            }else{
                $('#types_direct').css("outline", "1px solid green");
                $('#category_direct').css("outline", "1px solid green");

            if(types == 'Objective'){

                    // alert(types);
                            
                    var question = [];
                    var optionA = [];
                    var optionB = [];
                    var optionC = [];
                    var optionD = [];
                    var select = [];
                    
                    
                    $m = 1;
                    $.each($(".question_direct"), function(){
                        question.push($(this).val()+"||##");
                        $m++;
                    });
                    
                    // alert(question);

                    $a = 1;
                    $.each($(".optionA_direct"), function(){
                        optionA.push($(this).val()+"||##");
                    $a++;
                    });
                    
                    // alert(optionA);
                    
                    $b = 1;
                    $.each($(".optionB_direct"), function(){
                        
                        optionB.push($(this).val()+"||##");
                        
                        $b++;
                    });
                    
                    // alert(optionB);
                        
                    $c = 1;
                    $.each($(".optionC_direct"), function(){
                        optionC.push($(this).val()+"||##");
                    $c++;
                    });
                        
                    // alert(optionC);
                    
                    $d = 1;
                    $.each($(".optionD_direct"), function(){
                        optionD.push($(this).val()+"||##");
                    $d++;
                    });
                    
                    // alert(optionD);

                    $.each($("select#inlineFormCustomSelect_direct"),function(){
                    select.push($(this).val());
                    });


                    // alert(select);

                    if(question == "||##" || optionA == "||##" || optionB == "||##" || optionC == "||##"|| optionD == "||##" || select == "") {
                        //$('#submitQ').html('Loading..');
                        $.wnoty({
                            type: 'warning',
                            message: 'Please Fill all Question Fields',
                            autohideDelay: 3000, // 5 seconds
                            position:'top-right',
                            autohide:true
                        });
                    }
                    else{

                        var fd = new FormData();

                        
                        fd.append('types', types);
                        
                        fd.append('question', question);
                        fd.append('optionA', optionA);
                        fd.append('optionB', optionB);
                        fd.append('optionC', optionC);
                        fd.append('optionD', optionD);
                        fd.append('select', select);

                                    
                        $(this).prop('disabled', true);
                        $(this).html('Previewing... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

                        
                        $.ajax({
                            type: 'POST',
                            url: '../../controller/scripts/owner/preview_question_to_questionbank.php',
                            data: fd,
                            processData: false,
                            contentType: false,
                            success: function (result) {

                                $('#show2_direct').html(result);
                                $('#previewQuestion2_direct').modal('show');
                                
                                $("#previewQ2_direct").prop('disabled', false);
                                $("#previewQ2_direct").html('Preview');

                            
                            }
                        });

                        

                        }

            }else{

                    if(types == 'Theory'){

                        // alert('tari');
                        var question = [];

                        tinyMCE.triggerSave();

                        $m = 1;
                        $.each($(".question22_direct"), function(){
                            question.push($(this).val()+"||##");
                            $m++;
                        });

                        alert(question);

                        if(question == '||##' || question == '') {

                            $.wnoty({
                                type: 'warning',
                                message: 'Please fill in all Question Fields',
                                autohideDelay: 3000, // 5 seconds
                                position:'top-right',
                                autohide:true
                            });

                        }
                        else{

                            var fd = new FormData();

                            fd.append('types', types);
                            fd.append('question', question);


                            $(this).prop('disabled', true);
                            $(this).html('Previewing... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

                            $.ajax({

                                type: 'POST',
                                url: '../../controller/scripts/owner/preview_question_to_questionbank.php',
                                data: fd,
                                processData: false,
                                contentType: false,
                                success: function (result) {

                                $('#show2_direct').html(result);
                                $('#previewQuestion2_direct').modal('show');
                                
                                $("#previewQ2_direct").prop('disabled', false);
                                $("#previewQ2_direct").html('Preview');

                            
                                }
                            });

                            
                        }


                    }
                }

            }

        });
        
        $('body').on('click', '#submitQ_direct', function() {

            tinyMCE.triggerSave();

            var tari_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");
            var campus_id = $('.active-card').data('id');
            var class_id =  $('[name="class_direct"]:checked').val();
            var subject_id =  $('[name="radio3"]:checked').val();
            var term = $('#term2').val();
            var topic = $('#topic2').val();
            var sub_topic = $('#sub-topic2').val();
            var types = $('#types_direct').val();
            var category = $('#category_direct').val();
            var section_id =  $('#select_direct').val();
            var userType = 'owner';

            var ownerID = <?php echo $UserID; ?>;
                

                var dataString  =   '&tari_get_stored_instituion_id='+ tari_get_stored_instituion_id + 
                                    '&campus_id='+ campus_id + 
                                    '&class_id='+ class_id + 
                                    '&subject_id='+ subject_id + 
                                    '&term='+ term + 
                                    '&topic=' + topic+ 
                                    '&sub_topic=' + sub_topic+ 
                                    '&types=' + types + 
                                    '&category=' + category + 
                                    '&section_id=' + section_id + 
                                    '&userType=' + userType + 
                                    '&ownerID=' + ownerID ;

                // alert(dataString);

                if(types == '0' || types == ''){
                    $('#types_direct').css("outline", "1px solid red");
                        $.wnoty({
                            type: 'warning',
                            message: 'Please Select Question Type',
                            autohideDelay: 3000, // 5 seconds
                            position:'top-right',
                            autohide:true
                        });
                }else if(category == '0' || category == ''){
                    $('#types_direct').css("outline", "1px solid green");
                    $('#category_direct').css("outline", "1px solid red");
                    $.wnoty({
                            type: 'warning',
                            message: 'Please Select Question Category',
                            autohideDelay: 3000, // 5 seconds
                            position:'top-right',
                            autohide:true
                        });
                }else{
                    $('#types_direct').css("outline", "1px solid green");
                    $('#category_direct').css("outline", "1px solid green");

                    if(types == 'Objective'){

                        // alert(types);
                            
                        var question = [];
                        var optionA = [];
                        var optionB = [];
                        var optionC = [];
                        var optionD = [];
                        var select = [];
                        var question_card = [];
                    
                        
                        $m = 1;
                        $.each($(".question_direct"), function(){
                            question.push($(this).val()+"||##");
                            $m++;
                        });
                        
                        // alert(question);

                        $a = 1;
                        $.each($(".optionA_direct"), function(){
                            optionA.push($(this).val()+"||##");
                        $a++;
                        });
                        
                        // alert(optionA);
                        
                        $b = 1;
                        $.each($(".optionB_direct"), function(){
                            
                            optionB.push($(this).val()+"||##");
                            
                            $b++;
                        });
                        
                        // alert(optionB);
                            
                        $c = 1;
                        $.each($(".optionC_direct"), function(){
                            optionC.push($(this).val()+"||##");
                        $c++;
                        });
                            
                        // alert(optionC);
                        
                        $d = 1;
                        $.each($(".optionD_direct"), function(){
                            optionD.push($(this).val()+"||##");
                        $d++;
                        });
                        
                        // alert(optionD);

                        $.each($("select#inlineFormCustomSelect_direct"),function(){
                        select.push($(this).val());
                        });

                        $.each($('.question_card'), function() {
                            question_card.push($(this).data('count'));
                        });
                        // alert(question_card);

                        // alert(select);

                        if(question == "" || optionA == "" || optionB == "" || optionC == ""|| optionD == "" || select == "") {
                        //$('#submitQ').html('Loading..');
                            $.wnoty({
                                type: 'warning',
                                message: 'Please Fill all Question Fields',
                                autohideDelay: 3000, // 5 seconds
                                position:'top-right',
                                autohide:true
                            });
                        }
                        else{

                            var fd = new FormData();

                            fd.append('tari_get_stored_instituion_id', tari_get_stored_instituion_id);
                            fd.append('ownerID', ownerID);
                            fd.append('campus_id', campus_id);
                            fd.append('class_id', class_id);
                            fd.append('subject_id', subject_id);
                            fd.append('term', term);
                            fd.append('topic', topic);
                            fd.append('sub_topic', sub_topic);
                            fd.append('types', types);
                            fd.append('category', category);

                            fd.append('section_id', section_id);
                            fd.append('userType', userType);
                            fd.append('question_card',question_card);
                            
                            
                            fd.append('question', question);
                            fd.append('optionA', optionA);
                            fd.append('optionB', optionB);
                            fd.append('optionC', optionC);
                            fd.append('optionD', optionD);
                            fd.append('select', select);

                                    
                            $(this).prop('disabled', true);
                            $(this).html('Submitting... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                        
                            $.ajax({
                                type: 'POST',
                                url: '../../controller/scripts/owner/question_bank_insert.php',
                                data: fd,
                                processData: false,
                                contentType: false,
                                success: function (result) {


                                $("#submitQ_direct").prop('disabled', false);
                                $("#submitQ_direct").html('Submit');

                                // alert(result);
                                $.wnoty({
                                    type: 'success',
                                    message: result,
                                    autohideDelay: 5000, // 5 seconds
                                    position:'top-right',
                                    autohide: true
                                });

                               

                                $('#createQuestion_direct').modal('hide');
                                $('#previewQuestion_direct').modal('hide');
                                $('#previewQuestion2_direct').modal('hide');

                                }
                            });

                        }

                    }else{

                        if(types == 'Theory'){

                            // alert('tari');

                            var question = [];
                            var question_card = [];

                            $m = 1;
                            $.each($(".question22_direct"), function(){
                                question.push($(this).val()+"||##");
                                $m++;
                            });

                            $.each($('.question_card'), function() {
                                question_card.push($(this).data('count'));
                            });

                            // alert(question);
                            // alert(question_card);

                            if(question == "||##") {
                                $.wnoty({
                                    type: 'warning',
                                    message: 'Please fill in all Question Fields',
                                    autohideDelay: 3000, // 5 seconds
                                    position:'top-right',
                                    autohide:true
                                });

                            }
                            else{

                                var fd = new FormData();

                                fd.append('tari_get_stored_instituion_id', tari_get_stored_instituion_id);
                                fd.append('ownerID', ownerID);
                                fd.append('campus_id', campus_id);
                                fd.append('class_id', class_id);
                                fd.append('subject_id', subject_id);
                                fd.append('term', term);
                                fd.append('topic', topic);
                                fd.append('sub_topic', sub_topic);
                                fd.append('types', types);
                                fd.append('category', category);

                                fd.append('section_id', section_id);
                                fd.append('userType', userType);
                                fd.append('question_card',question_card);


                                fd.append('question', question);


                                $(this).prop('disabled', true);
                                $(this).html('Submitting... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');


                                $.ajax({
                                    type: 'POST',
                                    url: '../../controller/scripts/owner/question_bank_insert.php',
                                    data: fd,
                                    processData: false,
                                    contentType: false,
                                    success: function (result) {

                                        // alert(result);

                                        $.wnoty({
                                            type: 'success',
                                            message: result,
                                            autohideDelay: 5000, // 5 seconds
                                            position:'top-right',
                                            autohide: true
                                        });

                                        $("#submitQ_direct").prop('disabled', false);
                                        $("#submitQ_direct").html('Submit');

                                        // $('#comfirm').modal('show');
                                        $('#createQuestion_direct').modal('hide');
                                        $('#previewQuestion_direct').modal('hide');
                                        $('#previewQuestion2_direct').modal('hide');


                                    
                                    }
                                });
                            }


                        }
                    }

                }

        });

        //Fetch Edit Question Direct
        $('body').on('click', '#edit_question', function() {

            $("#objective_edit_direct").hide('slow');
            $("#theory_edit_direct").hide('slow');
        
            var questionID = $(this).data('id');
            var questionCategory = $(this).data('cat');

            // alert(questionID);

            var fd = new FormData();
            
            fd.append('questionID', questionID);
            fd.append('questionCategory', questionCategory);


            //    tinymce.get("question_edit").setContent("loading...");
            //    tinymce.get("optionA_edit").setContent("loading....");
            //    tinymce.get("optionB_edit").setContent("loading....");
            //    tinymce.get("optionC_edit").setContent("loading....");
            //    tinymce.get("optionD_edit").setContent("loading....");

            $("#load_question").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

            $.ajax({
                type: 'POST',
                url: '../../controller/scripts/owner/get_question_from_questionbank.php',
                data: fd,
                processData: false,
                contentType: false,
                success: function (result) {

                    // alert(result);
                   

                    $("#load_question").html(result);
                  
                    var QuestionCategory = $('#QuestionCategory').val();
                  
                    // alert(QuestionCategory);

                    if(QuestionCategory == 'Objective'){

                        $("#objective_edit_direct").show('slow');
                        $("#theory_edit_direct").hide('slow');

                        var question_e = $('#qedit').val();
                        var Aedit = $('#Aedit').val();
                        var Bedit = $('#Bedit').val();
                        var Cedit = $('#Cedit').val();
                        var Dedit = $('#Dedit').val();
                        var ansedit = $('#ansedit').val();

                        tinymce.get("question_edit").setContent(question_e);
                        tinymce.get("optionA_edit").setContent(Aedit);
                        tinymce.get("optionB_edit").setContent(Bedit);
                        tinymce.get("optionC_edit").setContent(Cedit);
                        tinymce.get("optionD_edit").setContent(Dedit);

                        $('#inlineFormCustomSelect_selected option').each(function() {
                            if ($(this).val() === ansedit) {
                                $(this).prop('selected', true);
                            } else {
                                $(this).prop('selected', false);
                            }
                        });

                    }else{

                            if(QuestionCategory == 'Theory'){

                                $("#theory_edit_direct").show('slow');
                                $("#objective_edit_direct").hide('slow');

                                var question_em = $('#qedit2').val();

                                // alert(question_em);

                                tinymce.get("tari_direct2").setContent(question_em);

                            }
                    }


                    
                
                }
            });
            
        });

        //Edit Question Direct
        $('#Update_question_direct').on('click', function() {
                
                
                var questionID = $('#questionID_edit').val();
                var questionCategory = $('#QuestionCategory').val();

                // alert(questionID);
                // alert(questionCategory);

                tinyMCE.triggerSave();
               

                if(questionCategory == 'Objective'){

                    var question_edit = $('.question1').val();
                    var optionA_edit = $('.optionA1').val();
                    var optionB_edit = $('.optionB1').val();
                    var optionC_edit = $('.optionC1').val();
                    var optionD_edit = $('.optionD1').val();
                    var select_edit = $('select#inlineFormCustomSelect_selected').val();

                    // alert(question_edit);


                    if(question_edit == "" || optionA_edit == "" || optionB_edit == "" || optionC_edit == ""|| optionD_edit == "" || select_edit == "") {
                    //$('#submitQ').html('Loading..');
                        $.wnoty({
                            type: 'warning',
                            message: 'Please Fill all Question Fields',
                            autohideDelay: 3000, // 5 seconds
                            position:'top-right',
                            autohide:true
                        });
                    }
                    else{

                        var fd = new FormData();

                        fd.append('questionID', questionID);
                        fd.append('questionCategory', questionCategory);

                        
                        fd.append('question', question_edit);
                        fd.append('optionA', optionA_edit);
                        fd.append('optionB', optionB_edit);
                        fd.append('optionC', optionC_edit);
                        fd.append('optionD', optionD_edit);
                        fd.append('select', select_edit);

                                
                        $(this).prop('disabled', true);
                        $(this).html('Updating... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

                        $.ajax({
                            type: 'POST',
                            url: '../../controller/scripts/owner/tari_question_update_direct.php',
                            data: fd,
                            processData: false,
                            contentType: false,
                            success: function (result) {

                            // alert(result);

                            $("#Update_question_direct").prop('disabled', false);
                            $("#Update_question_direct").html('Update Question');

                            if(result == '0'){

                                 $.wnoty({
                                    type: 'warning',
                                    message: 'Question Not Updated',
                                    autohideDelay: 5000, // 5 seconds
                                    position:'top-right',
                                    autohide: true
                                 });

                            }else{

                                $('.updated_question'+questionID).html(result);

                                // alert(questionID);

                                $.wnoty({
                                    type: 'success',
                                    message: 'Question Updated Successfully',
                                    autohideDelay: 5000, // 5 seconds
                                    position:'top-right',
                                    autohide: true
                                 });
                            }

                            }
                        });

                    }

                }
                else{

                    if(questionCategory == 'Theory'){

                        var question_edit = $('.question29_direct').val();
                       
                        // alert(question_edit);

                        if(question_edit == "") {

                            $.wnoty({
                                type: 'warning',
                                message: 'Please fill in all Question Fields',
                                autohideDelay: 3000, // 5 seconds
                                position:'top-right',
                                autohide:true
                            });

                        }
                        else{

                            var fd = new FormData();

                            fd.append('questionID', questionID);
                            fd.append('questionCategory', questionCategory);
                            fd.append('question', question_edit);


                            $(this).prop('disabled', true);
                            $(this).html('Submitting... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');


                            $.ajax({
                                type: 'POST',
                                url: '../../controller/scripts/owner/tari_question_update_direct.php',
                                data: fd,
                                processData: false,
                                contentType: false,
                                success: function (result) {

                                    // alert(result);

                                    $("#Update_question_direct").prop('disabled', false);
                                    $("#Update_question_direct").html('Update Question');

                                    if(result == '0'){

                                        $.wnoty({
                                            type: 'warning',
                                            message: 'Question Not Updated',
                                            autohideDelay: 5000, // 5 seconds
                                            position:'top-right',
                                            autohide: true
                                        });

                                    }else{

                                        $('.updated_question'+questionID).html(result);

                                        // alert(questionID);

                                        $.wnoty({
                                            type: 'success',
                                            message: 'Question Updated Successfully',
                                            autohideDelay: 5000, // 5 seconds
                                            position:'top-right',
                                            autohide: true
                                        });
                                    }



                                
                                }
                            });
                        }


                    }

                }

        });

        //Fetch Edit Question Direct
        $('body').on('click', '#delete_question', function() {

            var questionID = $(this).data('id');

            alert(questionID);

        });


    });
    
</script>