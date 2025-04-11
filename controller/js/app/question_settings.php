<script>

    function loadQuestions(){

            $('#loadAllSettings').html('<div class="text-center p-5"> <span class="spinner-border spinner-border-lg" role="status" aria-hidden="true" style="color:#007ffb;"></span></div>');

            var tari_get_stored_instituion_id = $('.abba-change-institution option:selected').val();

            var campusID = $('#prosload_campus_forcbtquestion option:selected').val();
            var subjectID = $('#prosloadcbt_settingssubject option:selected').val();
            var classID = $('#prosload_class_forcbtsettings option:selected').val();

            var termID = $('#prosload_termfor_cbtsettings option:selected').val();


            var sessionID = $('#pros_load_sessionforcbtsetting option:selected').val();

           
            


            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/cbt-settings/tari_get_all_questions_settings.php",
                data: { 
                    tari_get_stored_instituion_id: tari_get_stored_instituion_id,
                    campusID:campusID,
                    sessionID:sessionID,
                    subjectID:subjectID,
                    classID:classID,
                    termID:termID
                
                },
                //cache: false,
                success: function (output) {

                      $('#loadAllSettings').html(output);
                }
            });

    }



    

    $('body').on('click','#prosloadcbtsettings_loadbtn', function () {
        loadQuestions();

    });


    
    $(document).ready(function () {

                // prosload_campus_forcbtquestion
                var tari_get_stored_instituion_id = $('.abba-change-institution option:selected').val();


        
                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/cbt-settings/tari_settings_get_campus.php",
                    data: { tari_get_stored_instituion_id: tari_get_stored_instituion_id },
                    //cache: false,
                    success: function (output) {

                        $('#prosload_campus_forcbtquestion').html(output);
                    }
                });    // alert(campusID);

      

    });

        $(document).ready(function () {


            var tari_get_stored_instituion_id = $('.abba-change-institution option:selected').val();

                $('#pros_campustousequestion_settings').html('<option value="NULL">loading..</option>');





                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/cbt-settings/prosload_campus_toimportquestion.php",
                    data: { tari_get_stored_instituion_id: tari_get_stored_instituion_id },
                    //cache: false,
                    success: function (output) {

                        $('#pros_campustousequestion_settings').html(output);
                    }
                }); 
                
                
                // alert(campusID);


            
        });




    


    // PROS LOAD CAMPUS TERM ON CHANGE OF CAMPUS 

                $('body').on('change','#prosload_campus_forcbtquestion', function () {
                    

                         var campusID = $(this).val();


                         if(campusID == '' || campusID == 'NULL' || campusID == '0')
                         {

                                 $('#prosload_termfor_cbtsettings').html('<option value="NULL">Select campus first</option>');

                                 $('#prosload_class_forcbtsettings').html('<option value="NULL">Select campus first</option>');
                         }else
                         {

                              $('#prosload_termfor_cbtsettings').html('<option value="NULL">Loading..</option>');
                              $('#prosload_class_forcbtsettings').html('<option value="NULL">Loading..</option>');

                              


                              $.ajax({
                                    type: "POST",
                                    url: "../../controller/scripts/owner/cbt-settings/prosloadtermsemestercontent.php",
                                    data: { abba_campus_id: campusID },
                                    //cache: false,
                                    success: function (output) {
                                        $('#prosload_termfor_cbtsettings').html(output);
                                    
                                    }
                                });


                                $.ajax({
                                    type: "POST",
                                    url: "../../controller/scripts/owner/cbt-settings/prosloadclassforcbtexamset.php",
                                    data: { abba_campus_id: campusID },
                                    //cache: false,
                                    success: function (output) {
                                        $('#prosload_class_forcbtsettings').html(output);
                                    
                                    }
                                });



                         }
                         




                });


    // PROS LOAD CAMPUS TERM ON CHANGE OF CAMPUS 



        // PROS LOAD SUBJECT ON CHANGE CLASS

                $('body').on('change','#prosload_class_forcbtsettings', function () {

                    var campusID = $('#prosload_campus_forcbtquestion option:selected').val();
                    var classID = $(this).val();


                    if(classID == '' || classID == 'NULL' || classID == '0')
                    {

                        $('#prosloadcbt_settingssubject').html('<option value="NULL">Select class first</option>');


                    }else{


                        $('#prosloadcbt_settingssubject').html('<option value="NULL">loading...</option>');


                        
                      $.ajax({
                            type: "POST",
                            url: "../../controller/scripts/owner/cbt-settings/prosloadsubjectforcbtcreate.php",
                            data: { abba_campus_id: campusID, classID:classID},
                            //cache: false,
                            success: function (output) {
                                $('#prosloadcbt_settingssubject').html(output);
                            
                            }
                        });

                   

                    }


                });

    // PROS LOAD SUBJECT ON CHANGE CLASS


   


    


    $(document).ready(function () {

            $('#hide_section_2_settings').hide();
            $('#add_question_settings_btn').prop('disabled', true);

           loadQuestions();

                var tari_get_stored_instituion_id = $('.abba-change-institution option:selected').val();


                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/cbt-settings/tari_settings_get_campus.php",
                    data: { tari_get_stored_instituion_id: tari_get_stored_instituion_id },
                    //cache: false,
                    success: function (output) {

                        $('#tari_settings_campus').html(output);
                    }
                });    // alert(campusID);




                

                //PROS LOAD CAMPUS ON CHANGE 

                $("#tari_settings_campus").on("change",function (event) {

                    var campusID = $('#tari_settings_campus').val();


                    
                       $('#tari_settings_section').html('<option value="NULL">loading..</option>');
                       $('#tari_settings_term').html('<option value="NULL">loading..</option>');

                       

                         $.ajax({
                            type: "POST",
                            url: "../../controller/scripts/owner/cbt-settings/abba-get-section.php",
                            data: { abba_campus_id: campusID },
                            //cache: false,
                            success: function (output) {

                                $('#tari_settings_section').html(output);

                                // $('#section_direct').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                        

                                $('#subject_direct').show('fast');
                                $('#section_direct').html(output);
                            }
                         });




                         $.ajax({
                            type: "POST",
                            url: "../../controller/scripts/owner/cbt-settings/prosloadtermsemestercontent.php",
                            data: { abba_campus_id: campusID },
                            //cache: false,
                            success: function (output) {
                                $('#tari_settings_term').html(output);
                               
                            }
                         });



                }); 

               
                        // Get Subject from Database
                        // $("#tari_settings_section").on("change",function (event) {

                            
                            // var sectionID =  $(this).val();
                            // var campusID = $('#tari_settings_campus').val();

                            // if(sectionID == '0'){


                            //     $.wnoty({
                            //         type: 'warning',
                            //         message: 'Please Select Section',
                            //         autohideDelay: 3000, // 5 seconds
                            //         position:'top-right',
                            //         autohide:true
                            //     });

                            // }else{

                               

                //             }
                // });




         

    });

    // Select Topic and Sub-Topic
    $("#tari_settings_term").on("change",function (event) {

        $('#hide_section_2_settings').hide();
                    
        var term = $(this).val();
        var campus_id = $('#tari_settings_campus').val();
        var subjectID = $('#tari_settings_subject').val();
        var sectionID = $('#tari_settings_section').val();

      
        var dataString = '&term='+ term + '&campus_id='+ campus_id + '&subjectID='+ subjectID + '&sectionID='+ sectionID;

        // alert(dataString);

        if((subjectID == 'NULL' || subjectID == '0') && (sectionID == 'NULL' || sectionID == '0')){

            $.wnoty({
                type: 'warning',
                message: 'Please Select Subject and Section',
                autohideDelay: 3000, // 5 seconds
                position:'top-right',
                autohide:true
            });


        }else{

            $('#tari_settings_topic2').html('<option value="0">Loading...</option>');
        
            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/cbt-settings/get_topic_direct.php",
                data: dataString,
                
                success: function(result){
                    // alert(result);
                    $('#tari_settings_topic2').html(result);

                }
            });

        }

            
    });

    $("#tari_settings_topic2").on("change",function (event) {
        
        var campus_id = $('#tari_settings_campus').val();
        var topic = $('#tari_settings_topic2').val();

        var dataString = '&campus_id='+ campus_id+'&topic='+ topic;

        // alert(dataString);

        $('#tari_settings_sub_topic2').html('<option value="0">Loading...</option>');
        
        
        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/cbt-settings/getSubTopic.php",
            data: dataString,
            
            success: function(result){
                // alert(result);
                $('#tari_settings_sub_topic2').html(result);                           
            }
        });
    });

     // hide section 2 on change of session
     $("#tari_settings_campus").on("change",function (event) {
        $('#hide_section_2_settings').hide();
    });

    // hide section 2 on change of session
    $("#tari_settings_session").on("change",function (event) {
        $('#hide_section_2_settings').hide();
    });

     // hide section 2 on change of section
     $("#tari_settings_section").on("change",function (event) {
        $('#hide_section_2_settings').hide();
    });

     // hide section 2 on change of subject
     $("body").on("change", '.prosloadclassfortosetexam', function (event) {

       
          $('#proshidesettingsfinal').fadeOut();
    });
    


   
     // Get Topic and Sub-Topic from Database
    $('body').on('click', '#tari_settings_NextSectionClass', function() {

        $('#proshidesettingsfinal').fadeOut();    
        var isEmpty = false;

        $('#question_settings_form').find('.select1').each(function() {
            if ($(this).val() === '' || $(this).val() === '0' || $(this).val() === 'NULL') {
                isEmpty = true;
                $(this).css("outline", "1px solid red");
                return false; // Exit the loop if an empty field is found
            }
            $(this).css("outline", "1px solid green");
        });

        if (isEmpty) 
        {
            $.wnoty({
                type: 'warning',
                message: 'Please fill in all Assesement Settings with *',
                autohideDelay: 5000, // 5 seconds
                position:'top-right',
                autohide:true
            });
        } 
        else {
                var term = $('#tari_settings_term').val();                            
                var campus_id = $('#tari_settings_campus').val();
                // var subjectID = $('#tari_settings_subject').val();
                var sectionID = $('#tari_settings_section').val();
                // var topic = $('#tari_settings_topic2').val();
                // var sub_topic = $('#tari_settings_sub_topic2').val();

               
                // var dataString = '&term='+ term + '&campus_id='+ campus_id + '&subjectID='+ subjectID + '&sectionID='+ sectionID + '&topic='+ topic  + '&sub_topic='+ sub_topic;

                // alert(dataString);

                $('#tari_settings_NextSectionClass').prop('disabled', true);
                $('#tari_settings_class').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/cbt-settings/tari_settings_class.php",
                    data: { 
                            term:term,
                            // topic:topic,
                            // sub_topic:sub_topic,
                            // subjectID, subjectID,
                            sectionID: sectionID,
                            campus_id: campus_id
                        },
                    //cache: false,
                    success: function (output) {

                        // alert(output);

                        $('#hide_section_2_settings').fadeIn('slow');

                        $('#tari_settings_class').html(output);
                        
                       
                        $('#tari_settings_NextSectionClass').prop('disabled', false);
                        $('#tari_settings_NextSectionClass').html('Load Class <span class="fa fa-arrow-right"></span>');

                        $('#add_question_settings_btn').prop('disabled', false);
                        $('#add_question_settings_btn').html('Add Question');

                    }
                });

           
        }

        
    });



    // PROS LOAD SET QUESTION NEXT AFTER CLASS CONTENT
                 $('body').on('click', '.prosloadlastinputfiltercontent_cbtsetbtn', function() {

                    
                    var classtemplateID = [];
                    var MainclassID = [];


                    

                    var allEqual = true;
                    var firstID;

                    // Iterate through checked checkboxes
                    $.each($('.prosloadclassfortosetexam:checked'), function() {
                        var currentID = $(this).data('id');
                        var prosgetclassid = $(this).val();

                        classtemplateID.push(currentID);
                        MainclassID.push(prosgetclassid);



                        // If it's the first ID, store it
                        if (!firstID) {
                            firstID = currentID;
                        } else {
                            // If subsequent ID is different from the first one, set flag to false
                            if (firstID !== currentID) {
                                allEqual = false;
                                return false; // Exit the loop early since we already found a difference
                            }
                        }
                    });

                    // Check if all IDs are equal
                    if (allEqual) {



                        var term = $('#tari_settings_term').val();                            
                        var campus_id = $('#tari_settings_campus').val();
                        // var subjectID = $('#tari_settings_subject').val();
                        var sectionID = $('#tari_settings_section').val();


                        $('#proshidesettingsfinal').fadeIn();


                     


                            $('#tari_settings_subject').html('<option value="">Loading...</option>');

                            $.ajax({
                                type: "POST",
                                url: "../../controller/scripts/owner/cbt-settings/tari_settings_subject.php",
                                data: { 

                                            classtemplateID:classtemplateID,
                                            MainclassID:MainclassID,
                                            term:term,
                                            campus_id:campus_id,
                                            sectionID:sectionID

                                 },
                                //cache: false,
                                success: function (output) {
                                    $('#tari_settings_subject').html(output);
                                }
                            });
                    
                            
                    } else {
                        


                                $.wnoty({
                                    type: 'warning',
                                    message: 'Hey!! Please select classes with the same classification. e:g Jss 1 A, jSS 1 B',
                                    autohideDelay: 5000, // 5 seconds
                                    position:'top-right',
                                    autohide:true
                                });
                      
                    }



                                  


                                //   alert('hhelo');x
                 });
      // PROS LOAD SET QUESTION NEXT AFTER CLASS CONTENT


    

     $('body').on('click', '#tari_create_assesement', function() {

        // alert('tari');
        $('#question_number_hide').hide();

        $('input[name="switch-one"]').click(function() {
            
            var selectedValue = $('input[name="switch-one"]:checked').val();

            if (selectedValue === "1") {
                $('#question_number_hide').fadeIn('slow');

            } else if (selectedValue === "0") {
                $('#question_number_hide').hide();

            }
        });
        
     });

     $('body').on('click', '#add_question_settings_btn', function() {

        // var class_id =  $('[name="tari_settings_class"]:checked').val();

        var userID = <?php echo $UserID; ?>;

        // alert(userID);

        var automatic =  $('[name="switch-one"]:checked').val();
        var questionNumber =  $('#question_Number_for_settings').val();
        var shuffle =  $('[name="switch-two"]:checked').val();


        var term = $('#tari_settings_term').val();                            
        var campus_id = $('#tari_settings_campus').val();
        var subjectID = $('#tari_settings_subject').val();
        var sectionID = $('#tari_settings_section').val();
        var topic = $('#tari_settings_topic2').val();
        var sub_topic = $('#tari_settings_sub_topic2').val();
        var session = $('#tari_settings_session').val();



        var campustoimported = $('#pros_campustousequestion_settings').val();
        var pros_settingspurpose = $('#tari_settings_type').val();


        var tari_get_stored_instituion_id = $('.abba-change-institution option:selected').val();


         
      

       
        

        var title = $('#tari_settings_title').val();                            
        var type = $('#tari_settings_type').val();
        var category = $('#tari_settings_category').val();
        var date = $('#tari_settings_date').val();
        var timeIN3 = $('#tari_settings_time_in').val();
        var timeOUT3 = $('#tari_settings_time_out').val();
        var questionNumber =  $('#question_Number_for_settings').val();

       
        var class_id = [];
        var mainclassID = [];

        $.each($('.prosloadclassfortosetexam:checked'), function() {
            class_id.push($(this).data('id'));
            mainclassID.push($(this).val());

        });


      


        if(mainclassID == '' || mainclassID == 'NULL' || mainclassID == '0')
        {


                    $.wnoty({
                        type: 'warning',
                        message: 'Hey!! Select Class to procced',
                        autohideDelay: 5000, // 5 seconds
                        position:'top-right',
                        autohide:true
                    });


        }else if(subjectID == '' || subjectID == '0' || subjectID == 'NULL')
        {


                    $.wnoty({
                        type: 'warning',
                        message: 'Hey!! Select Subject to procced',
                        autohideDelay: 5000, // 5 seconds
                        position:'top-right',
                        autohide:true
                    });


        }
        else if(title == '' ||title == '0' || title == 'NULL')
        {



                  $.wnoty({
                        type: 'warning',
                        message: 'Hey!! Input Exam title to proceed',
                        autohideDelay: 5000, // 5 seconds
                        position:'top-right',
                        autohide:true
                    });



        }else if(type == '0' || type == '' || type == 'NULL')
        {


                   $.wnoty({
                        type: 'warning',
                        message: 'Hey!! Select Exam type to proceed',
                        autohideDelay: 5000, // 5 seconds
                        position:'top-right',
                        autohide:true
                    });


        }else if(category == '' || category == '0' || category == 'NULL')
        {



             
                  $.wnoty({
                        type: 'warning',
                        message: 'Hey!! Select Exam category to proceed',
                        autohideDelay: 5000, // 5 seconds
                        position:'top-right',
                        autohide:true
                    });


        }else if(date == '' || date == '0' || date == 'NULL')
        {


               $.wnoty({
                        type: 'warning',
                        message: 'Hey!! Select Exam Date to proceed',
                        autohideDelay: 5000, // 5 seconds
                        position:'top-right',
                        autohide:true
                    });

        }else if(timeIN3 == '' || timeIN3 == '0' || timeIN3 == 'NULL' || timeOUT3 == '' || timeOUT3 == '0' || timeOUT3 == 'NULL')
        {


                     $.wnoty({
                        type: 'warning',
                        message: 'Hey!! Start and end time of the Exam should not be left blank.',
                        autohideDelay: 5000, // 5 seconds
                        position:'top-right',
                        autohide:true
                    });
           
        }
        else
        {



                    $('#add_question_settings_btn').html('saving...<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                                                                
                            var isEmpty = false;

                            $('#question_settings_form').find('.select1').each(function() {
                                if ($(this).val() === '' || $(this).val() === '0' || $(this).val() === 'NULL') {
                                    isEmpty = true;
                                    $(this).css("outline", "1px solid red");
                                    return false; // Exit the loop if an empty field is found
                                }
                                $(this).css("outline", "1px solid green");
                            });

                            if (isEmpty) 
                            {
                                $.wnoty({
                                    type: 'warning',
                                    message: 'Please fill in all Assesement Settings with *',
                                    autohideDelay: 5000, // 5 seconds
                                    position:'top-right',
                                    autohide:true
                                });

                            } else{
                                if(class_id == undefined){
                                    $.wnoty({
                                        type: 'warning',
                                        message: 'Please Select Class',
                                        autohideDelay: 5000, // 5 seconds
                                        position:'top-right',
                                        autohide:true
                                    });
                                }else{

                                    var isEmpty2 = false;

                                    $('#question_settings_form').find('.settings_sec_2').each(function() {
                                        if ($(this).val() === '' || $(this).val() === '0' || $(this).val() === 'NULL') {
                                            isEmpty2 = true;
                                            $(this).css("outline", "1px solid red");
                                            return false; // Exit the loop if an empty field is found
                                        }
                                        $(this).css("outline", "1px solid green");
                                    });

                                if (isEmpty2) 
                                {
                                    $.wnoty({
                                        type: 'warning',
                                        message: 'Please fill in all Assesement Settings with *',
                                        autohideDelay: 5000, // 5 seconds
                                        position:'top-right',
                                        autohide:true
                                    });
                                } 
                                else{

                                    if(automatic === "1" && (questionNumber === '' || questionNumber === '0')){

                                        $.wnoty({
                                            type: 'warning',
                                            message: 'Please fill Number of Questions You want the System to Set',
                                            autohideDelay: 5000, // 5 seconds
                                            position:'top-right',
                                            autohide:true
                                        });

                                    }else{
                                        
                                        // alert(automatic);
                                        // alert(class_id);
                                        // alert(shuffle);

                        

                                        // Convert time to 12-hour format
                                        var timeIN = convertTo12HourFormat(timeIN3);
                                        var timeOUT = convertTo12HourFormat(timeOUT3);


                                        function convertTo12HourFormat(timeValue) {
                                            var timeParts = timeValue.split(":");
                                            var hours = parseInt(timeParts[0]);
                                            var minutes = timeParts[1];

                                            var amPm = hours >= 12 ? "PM" : "AM";
                                            hours = hours % 12 || 12;

                                            var convertedTime = hours + ":" + minutes + " " + amPm;
                                            return convertedTime;
                                        }

                                       

                                        if(timeIN3 > timeOUT3){

                                            $.wnoty({
                                                type: 'warning',
                                                message: 'Assesement Start Time Cannot be greater than End Time',
                                                autohideDelay: 5000, // 5 seconds
                                                position:'top-right',
                                                autohide:true
                                            });

                                        }
                                        else{

                                            $.ajax({
                                            type: "POST",
                                            url: "../../controller/scripts/owner/cbt-settings/tari_question_check_settings.php",
                                            data: { userID:userID,
                                                    session: session,
                                                    term:term,
                                                    topic:topic,
                                                    sub_topic:sub_topic,
                                                    subjectID, subjectID,
                                                    sectionID: sectionID,
                                                    campus_id: campus_id,
                                                    automatic: automatic,
                                                    class_id: class_id,
                                                    mainclassID:mainclassID,
                                                    shuffle: shuffle,
                                                    title:title,
                                                    type:type,
                                                    category:category,
                                                    date:date,
                                                    timeIN:timeIN,
                                                    timeOUT:timeOUT,
                                                    questionNumber:questionNumber,
                                                    campustoimported:campustoimported,
                                                   pros_settingspurpose:pros_settingspurpose,
                                                   tari_get_stored_instituion_id:tari_get_stored_instituion_id
                                                },
                                            //cache: false,
                                            success: function (output) {

                                               
                                              $('#add_question_settings_btn').html('Add Question');
                                            
                                                if(output == 'Yes'){


                                                    if(automatic == '1'){

                                                        // alert(questionNumber);

                                                        $.ajax({
                                                        type: "POST",
                                                        url: "../../controller/scripts/owner/cbt-settings/tari_fetch_question_from_bank_settings_automatic.php",
                                                        data: { userID:userID,
                                                                session: session,
                                                                term:term,
                                                                topic:topic,
                                                                sub_topic:sub_topic,
                                                                subjectID, subjectID,
                                                                sectionID: sectionID,
                                                                campus_id: campus_id,
                                                                automatic: automatic,
                                                                class_id: class_id,
                                                                shuffle: shuffle,
                                                                title:title,
                                                                type:type,
                                                                category:category,
                                                                date:date,
                                                                timeIN:timeIN,
                                                                timeOUT:timeOUT,
                                                                questionNumber:questionNumber,
                                                                campustoimported:campustoimported,
                                                                pros_settingspurpose:pros_settingspurpose,
                                                                tari_get_stored_instituion_id:tari_get_stored_instituion_id
                                                            },
                                                        //cache: false,
                                                        success: function (output) {

                                                         

                                                            // alert(questionNumber);
                                                            
                                                            $('#get_questions2').html(output);

                                                            for(var i = 1; i <= questionNumber; i++)
                                                            {
                                                                // alert(i);
                                                                $('.tari_quescheck'+i).toggleClass('selected selected2');
                                                            }

                                                
                                                            $('.PreviewQuestionBankModal2').modal('show');




                                                             $(document).ready(function(){

                                                                $('.question_card2').click(function() {
                                                                    $(this).toggleClass('selected');
                                                                });

                                                                $('.question_card3').click(function() {
                                                                    $(this).toggleClass('selected2');
                                                                });

                                                                $('#back_to_settings').click(function() {
                                                                    $('#QuestionBankModal').modal('hide');
                                                                    $('#tari_settings_modal').modal('show');
                                                                });
                                                          });

                                                           
                                                            
                                                        
                                                        }
                                                    });
                                                        
                                                    }else{

                                                        // alert('SelectYourSelf');

                                                        $.ajax({
                                                            type: "POST",
                                                            url: "../../controller/scripts/owner/cbt-settings/tari_fetch_question_from_bank_settings.php",
                                                            data: { 
                                                                   userID:userID,
                                                                    session: session,
                                                                    term:term,
                                                                    topic:topic,
                                                                    sub_topic:sub_topic,
                                                                    subjectID, subjectID,
                                                                    sectionID: sectionID,
                                                                    campus_id: campus_id,
                                                                    automatic: automatic,
                                                                    class_id: class_id,
                                                                    shuffle: shuffle,
                                                                    title:title,
                                                                    type:type,
                                                                    category:category,
                                                                    date:date,
                                                                    timeIN:timeIN,
                                                                    timeOUT:timeOUT,
                                                                    questionNumber:questionNumber,
                                                                    campustoimported:campustoimported,
                                                                    pros_settingspurpose:pros_settingspurpose,
                                                                    tari_get_stored_instituion_id:tari_get_stored_instituion_id

                                                                },
                                                            //cache: false,
                                                            success: function (output) {

                                                                       

                                                                // alert(output);
                                                                $('#load_questions').html(output);

                                                                $('.QuestionBankModal').modal('show');

                                                                $(document).ready(function(){

                                                                    $('.question_card2').click(function() {
                                                                        $(this).toggleClass('selected');
                                                                    });

                                                                    $('.question_card3').click(function() {
                                                                        $(this).toggleClass('selected2');
                                                                    });

                                                                    $('#back_to_settings').click(function() {
                                                                        $('#QuestionBankModal').modal('hide');
                                                                        $('#tari_settings_modal').modal('show');
                                                                    });
                                                                });

                                                        
                                                            }
                                                        });


                                                    }

                                                
                                                }else

                                                    if(output == 'No'){
                                                    
                                                    // $('#load_questions').html(output);
                                                    $(document).ready(function(){
                                                        $('#WarningQuery').modal('show');
                                                        $('#tari_settings_modal').modal('hide');
                                                    });


                                                    $('#save_settings_only').click(function() {

                                                            $.ajax({
                                                                type: "POST",
                                                                url: "../../controller/scripts/owner/cbt-settings/tari_save_settings_only.php",
                                                                data: { userID:userID,
                                                                        session: session,
                                                                        term:term,
                                                                        topic:topic,
                                                                        sub_topic:sub_topic,
                                                                        subjectID, subjectID,
                                                                        sectionID: sectionID,
                                                                        campus_id: campus_id,
                                                                        automatic: automatic,
                                                                        class_id: class_id,
                                                                        shuffle: shuffle,
                                                                        title:title,
                                                                        type:type,
                                                                        category:category,
                                                                        date:date,
                                                                        timeIN:timeIN,
                                                                        timeOUT:timeOUT,
                                                                        questionNumber:questionNumber,
                                                                        campustoimported:campustoimported,
                                                                        pros_settingspurpose:pros_settingspurpose,
                                                                        tari_get_stored_instituion_id:tari_get_stored_instituion_id
                                                                    },
                                                            //cache: false,
                                                                success: function (output) {

                                                                   

                                                                    if(output =='true'){

                                                                        $.wnoty({
                                                                            type: 'success',
                                                                            message: title+'Questions Settings Saved',
                                                                            autohideDelay: 5000, // 5 seconds
                                                                            position:'top-right',
                                                                            autohide:true
                                                                        });

                                                                        // setTimeout(function() {
                                                                        //     window.location.href = '../question-bank/'; // Replace with the URL you want to redirect to
                                                                        // }, 2000); // 2000 milliseconds = 2 seconds


                                                                    }else
                                                                        if(output =='false'){

                                                                            $.wnoty({
                                                                                type: 'warning',
                                                                                message: 'Questions Settings Not Saved',
                                                                                autohideDelay: 5000, // 5 seconds
                                                                                position:'top-right',
                                                                                autohide:true
                                                                            });

                                                                        }else{

                                                                            $.wnoty({
                                                                                type: 'warning',
                                                                                message: output,
                                                                                autohideDelay: 5000, // 5 seconds
                                                                                position:'top-right',
                                                                                autohide:false
                                                                            });

                                                                        }

                                                                }
                                                        });

                                                    });


                                                    }else{

                                                        $.wnoty({
                                                            type: 'warning',
                                                            message: 'No question found',
                                                            autohideDelay: 5000, // 5 seconds
                                                            position:'top-right',
                                                            autohide:true
                                                        });

                                                    }



                                              

                                            }
                                        });

                                        }
                        




                                    

                                    }

                                    

                                }

                                }

                                
                            }








        }

       


        

     });

     $('body').on('click', '#previewQuestionFromSttings', function() {

            var questionNumber =  $('#question_Number_for_settings').val();

            var category = $('#tari_settings_category').val();

            // alert(category);

            // alert(questionNumber);

            var selectedCardIds = [];
            var selectedCardIds2 = [];

            var selectedCardIds3 = [];
            var selectedCardIds4 = [];

            $.each($('.selected'), function() {
                selectedCardIds.push($(this).data('id'));
                selectedCardIds2.push($(this).data('count'));
                // alert(selectedCardIds);
            });

            $.each($('.selected2'), function() {
                selectedCardIds3.push($(this).data('id'));
                selectedCardIds4.push($(this).data('count'));
                // alert(selectedCardIds);
            });


            if(selectedCardIds.length == 0 && selectedCardIds3.length == 0){
                $.wnoty({
                    type: 'warning',
                    message: 'Please No Question Selected',
                    autohideDelay: 3000, // 5 seconds
                    position:'top-right',
                    autohide:true
                });
            }
            else
            {   
                
                $('#previewQuestionFromSttings').html('loading...<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

                // Send the selectedCards array to PHP for further processing
                $.ajax({
                    url: "../../controller/scripts/owner/cbt-settings/tari_settings_preview_question_from_bank.php",
                    method: 'POST',
                    data: { category:category, cards: selectedCardIds, nums:selectedCardIds2, cards2: selectedCardIds3, nums2:selectedCardIds4},
                    success: function(response) {
                        // Handle the response from PHP
                         
                        $(document).ready(function() {
                                
                            $('#get_questions').html(response);

                            $('#PreviewQuestionBankModal').modal('show');

                        });

                    }
                });
            }

    });

    $('#questionModalShow').click(function() {

        $('#QuestionBankModal').modal('show');
        $('#PreviewQuestionBankModal').modal('hide');

        // alert('show');
    });

    $('#goBacktoSettings').click(function() {
        $('#tari_settings_modal').modal('show');
        $('#WarningQuery').modal('hide');
        // alert('show');
    });

    $('#questionModalShow2').click(function() {

        $('#QuestionBankModal').modal('hide');
        $('#PreviewQuestionBankModal2').modal('hide');
        $('#tari_settings_modal').modal('show');

    // alert('show');
    });

    $('body').on('click','#importQuestionSettings', function() {

        // alert(selectedCardIds);

        var userID = <?php echo $UserID; ?>;

        // alert(userID);

        var automatic =  $('[name="switch-one"]:checked').val();
        var shuffle =  $('[name="switch-two"]:checked').val();

        var class_id = [];
        var class_idmain = [];

        $.each($('.prosloadclassfortosetexam:checked'), function() {
            class_id.push($(this).data('id'));
            class_idmain.push($(this).val());
            // alert(class_id);
        });

        var questions = [];
        var questionsAns = [];
       
        var questions2 = [];

        $.each($('.selected'), function() {
            questions.push($(this).data('id'));
            questionsAns.push($(this).data('ans'));
            // alert(questions);
        });

        $.each($('.selected2'), function() {
            questions2.push($(this).data('id'));
        });

        // alert(questions2);

        

        var tari_get_stored_instituion_id = $('.abba-change-institution option:selected').val();

        var term = $('#tari_settings_term').val();                            
        var campus_id = $('#tari_settings_campus').val();

        var subjectID = $('#tari_settings_subject').val();
        var sectionID = $('#tari_settings_section').val();
        var topic = $('#tari_settings_topic2').val();
        var sub_topic = $('#tari_settings_sub_topic2').val();
        var session = $('#tari_settings_session').val();
        var title = $('#tari_settings_title').val();                            
        var type = $('#tari_settings_type').val();
        var category = $('#tari_settings_category').val();
        var date = $('#tari_settings_date').val();
        var timeINnew = $('#tari_settings_time_in').val();
        var timeOUTnew = $('#tari_settings_time_out').val();
        var questionNumber =  $('#question_Number_for_settings').val();

        var campustoimported = $('#pros_campustousequestion_settings').val();
        var pros_settingspurpose = $('#tari_settings_type').val();

      
      





            var timeIN = convertTo12HourFormat(timeINnew);
            var timeOUT = convertTo12HourFormat(timeOUTnew);


                function convertTo12HourFormat(timeValue) {
                    var timeParts = timeValue.split(":");
                    var hours = parseInt(timeParts[0]);
                    var minutes = timeParts[1];

                    var amPm = hours >= 12 ? "PM" : "AM";
                    hours = hours % 12 || 12;

                    var convertedTime = hours + ":" + minutes + " " + amPm;
                    return convertedTime;
                }





            $('#importQuestionSettings').prop("disabled", true);
            $('#importQuestionSettings').html('Saving... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

            $.ajax({
                url: "../../controller/scripts/owner/cbt-settings/tari_insert_assesement_settings.php",
                method: 'POST',
                data: { userID:userID,
                        session: session,
                        term:term,
                        topic:topic,
                        sub_topic:sub_topic,
                        subjectID, subjectID,
                        sectionID: sectionID,
                        campus_id: campus_id,
                        automatic: automatic,
                        class_id: class_id,
                        shuffle: shuffle,
                        title:title,
                        type:type,
                        category:category,
                        date:date,
                        timeIN:timeIN,
                        timeOUT:timeOUT,
                        questionNumber:questionNumber,
                        questions:questions,
                        questions2:questions2,
                        questionsAns:questionsAns,
                        class_idmain:class_idmain,
                        pros_settingspurpose:pros_settingspurpose,
                        campustoimported:campustoimported
                    },
                success: function(response) {

                       $('#importQuestionSettings').prop("disabled", false);
                        $('#importQuestionSettings').html("Save Settings");

                   
                    
                    if(response == 'Yes'){

                                $.wnoty({
                                type: 'success',
                                message: title+' Assesement Settings is saved Successfully',
                                autohideDelay: 5000, // 5 seconds
                                position:'top-right',
                                autohide: true

                                });

                            
                                loadQuestions();
                        
                        
                            $('#tari_settings_modal').modal('hide');
                            $('#QuestionBankModal').modal('hide');
                            $('#PreviewQuestionBankModal').modal('hide');
                            $('#PreviewQuestionBankModal2').modal('hide');
                        

                    }else{

                        if(response == 'No'){

                            $.wnoty({
                                type: 'warning',
                                message: title+'  failed to be inserted please try again later',
                                autohideDelay: 5000, // 5 seconds
                                position:'top-right',
                                autohide: true

                            });

                            $('#importQuestionSettings').prop("disabled", false);
                            $('#importQuestionSettings').html("Save Settings");
                       
                        }else
                        {
                            
                            
                             $.wnoty({
                                type: 'warning',
                                message: title+'already exist',
                                autohideDelay: 5000, // 5 seconds
                                position:'top-right',
                                autohide: true

                            });

                            $('#importQuestionSettings').prop("disabled", false);
                            $('#importQuestionSettings').html("Save Settings");
                       
                            
                            
                            
                        }
                    }

                   
                   
                    // $('#comfirm').modal('show');
                    // $('#createQuestion').modal('hide');
                    // $('#previewQuestion').modal('hide');
                    // $('#previewQuestion2').modal('hide');
                }
            });


    });

    // Search function 
    $(document).ready(function() {

        $("#searchInput").on("keyup", function() {
            var searchQuery = $(this).val().toLowerCase();
            
            $(".question_card2").each(function() {
                var questionText = $(this).find(".card-text p").text().toLowerCase();
                
                if (questionText.indexOf(searchQuery) === -1) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        });
    
    });

    // Load Settings 
    $('body').on('click','#tari_edit_setting', function() {

            var settingsID = $(this).data('id');
            var campusID = $(this).data('camp');


                $('#section_edit_modal').html('<div class="text-center p-5"> <span class="spinner-border spinner-border-lg" role="status" aria-hidden="true" style="color:#007ffb;"></span></div>');

            

        //    alert(settingsID);

            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/cbt-settings/tari_get_assement_settings_single.php",
                data: { settingsID: settingsID,campusID:campusID },
                //cache: false,
                success: function (output) {

                // alert(output);

                $('#section_edit_modal').html(output);

                   
                }
            });

           
    });

     // Update Question Settings
    $('#tari_update_settings').on('click', function() {

       

        var settingsID = $('#getSeetingsiD').val();

        //  alert(settingsID);


        var userID = <?php echo $UserID; ?>;

        var shuffle =  $('[name="switch-three"]:checked').val();
        var title = $('#tari_settings_title1').val();                            
        var type = $('#tari_settings_type1').val();
        var category = $('#tari_settings_category1').val();
        var date = $('#tari_settings_date1').val();
        var timeIN1 = $('#tari_settings_time_in1').val();
        var timeOUT2 = $('#tari_settings_time_out1').val();



        // Convert time to 12-hour format
        var timeIN = convertTo12HourFormat(timeIN1);
        var timeOUT = convertTo12HourFormat(timeOUT2);


        function convertTo12HourFormat(timeValue) {
            var timeParts = timeValue.split(":");
            var hours = parseInt(timeParts[0]);
            var minutes = timeParts[1];

            var amPm = hours >= 12 ? "PM" : "AM";
            hours = hours % 12 || 12;

            var convertedTime = hours + ":" + minutes + " " + amPm;
            return convertedTime;
        }

        // alert(timeIN);

        var isEmpty2 = false;

        $('#question_settings_form2').find('.settings_sec_2').each(function() {
            if ($(this).val() === '' || $(this).val() === '0' || $(this).val() === 'NULL') {
                isEmpty2 = true;
                $(this).css("outline", "1px solid red");
                return false; // Exit the loop if an empty field is found
            }
            $(this).css("outline", "1px solid green");
        });

        if (isEmpty2) 
        {
            $.wnoty({
                type: 'warning',
                message: 'Please fill in all Assesement Settings with *',
                autohideDelay: 5000, // 5 seconds
                position:'top-right',
                autohide:true
            });
        } 
        else{

 
            if(timeIN1 > timeOUT2){
                $.wnoty({
                    type: 'warning',
                    message: 'Assesement Start Time Cannot be greater than End Time',
                    autohideDelay: 5000, // 5 seconds
                    position:'top-right',
                    autohide:true
                });
                
            }else{

                $(this).prop("disabled", true);
                $(this).html('Updating... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');


                $.ajax({
                    url: "../../controller/scripts/owner/cbt-settings/tari_edit_settings.php",
                    method: 'POST',
                    data: { userID:userID,
                            settingsID:settingsID,
                            shuffle: shuffle,
                            title:title,
                            type:type,
                            category:category,
                            date:date,
                            timeIN:timeIN,
                            timeOUT:timeOUT
                        },
                    success: function(response) {

                        // alert(response);

                        if(response == 'Yes'){

                            loadQuestions();

                           $.wnoty({
                            type: 'success',
                            message: title+' Assesement Settings is saved Successfully',
                            autohideDelay: 5000, // 5 seconds
                            position:'top-right',
                            autohide: true

                            });
                        

                            $('#tari_update_settings').prop("disabled", false);
                            $('#tari_update_settings').html("Save Settings");

                             $('#tari_edit_setting_modal').modal('hide');



                        }else{

                            if(response == 'No'){

                                $.wnoty({
                                    type: 'warning',
                                    message: title+' Assesement Settings is saved Successfully',
                                    autohideDelay: 5000, // 5 seconds
                                    position:'top-right',
                                    autohide: true

                                });

                                $('#tari_update_settings').prop("disabled", false);
                                $('#tari_update_settings').html("Save Settings");
                        
                            }else{
                                $.wnoty({
                                    type: 'warning',
                                    message: response,
                                    autohideDelay: 5000, // 5 seconds
                                    position:'top-right',
                                    autohide: true

                                });

                                $('#tari_update_settings').prop("disabled", false);
                                $('#tari_update_settings').html("Save Settings");
                            }
                        }

                    }
                

                });

            }

        }


    });

     // Load Questions Added to Assesement Settings 
    $('body').on('click','#tari_view_settings', function() {

        var settingsID = $(this).data('id');
        var tari_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");


      


              $('#load_Questions_and_Settings').html('<div class="text-center p-5"> <span class="spinner-border spinner-border-lg" role="status" aria-hidden="true" style="color:#007ffb;"></span></div>');

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/cbt-settings/tari_get_all_questions_and_settings_for_a_single_assessment.php",
            data: { tari_get_stored_instituion_id:tari_get_stored_instituion_id,settingsID: settingsID },
            //cache: false,
            success: function (output) {

            // alert(output);

            $('#load_Questions_and_Settings').html(output);

            }
        });


    });

     // Load Questions Added to Assesement Settings 
    $('body').on('click','#tari_add_remove_settings', function() {

            var settingsID = $(this).data('id');
            var campusID = $(this).data('campus');
            var subjectID = $(this).data('subject');
            var classID = $(this).data('class');
            var termID = $(this).data('term');
            var category = $(this).data('cat');

            // alert(settingsID);

            $('#load_questions_from_settings_add_remove').html('<div class="text-center p-5"> <span class="spinner-border spinner-border-lg" role="status" aria-hidden="true" style="color:#007ffb;"></span></div>');

            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/cbt-settings/tari_fetch_questions_from_settings.php",
                data: { settingsID:settingsID,
                        campusID:campusID,
                        subjectID:subjectID,
                        classID:classID,
                        termID:termID,
                        category:category
                    },
                //cache: false,
                success: function (output) {

                    // alert(output);

                    $('#load_questions_from_settings_add_remove').html(output);

                    $('.question_card2').click(function() {
                        $(this).toggleClass('selected');
                    });
                    
                    $('.question_card3').click(function() {
                        $(this).toggleClass('selected2');
                    });


                    // Insert Questions Updated
                     $("body").off("click", "#tari_add_remove_question_settings").on("click", "#tari_add_remove_question_settings", function () {

                        // alert(settingsID);

                        var questions = [];
                        var questionsAns = [];

                        var questions2 = [];

                        $.each($('.selected'), function() {
                            questions.push($(this).data('id'));
                            questionsAns.push($(this).data('ans'));
                            // alert(questionsAns);
                        });

                        $.each($('.selected2'), function() {
                            questions2.push($(this).data('id'));
                        });

                        // alert(questions2);

                            $(this).prop("disabled", true);
                            
                            $(this).html('Updating... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');


                            $.ajax({
                                    type: "POST",
                                    url: "../../controller/scripts/owner/cbt-settings/tari_update_question_settings.php",
                                    data: { settingsID:settingsID,
                                            questions:questions,
                                            questions2:questions2,
                                            questionsAns:questionsAns,
                                            category:category
                                        },
                                    //cache: false,
                                    success: function (output) {

                                    // alert(output);

                                    if(output == 'Yes'){



                                        $.wnoty({
                                            type: 'success',
                                            message: 'Assesement Settings Updated Successfully',
                                            autohideDelay: 5000, // 5 seconds
                                            position:'top-right',
                                            autohide: true
                                        });

                                            
                                          loadQuestions();
                                          
                                          $('#tari_add_remove_settings_modal').modal('hide');
                                          
                                          

                                    }else{
                                        
                                        if(output == 'No'){

                                            $.wnoty({
                                                type: 'warning',
                                                message: 'Assesement Settings Not Updated',
                                                autohideDelay: 5000, // 5 seconds
                                                position:'top-right',
                                                autohide: true
                                            });

                                        }
                                    }

                                    $('#tari_add_remove_question_settings').prop("disabled", false);
                                    $('#tari_add_remove_question_settings').html("Update");


                                    }
                            });

                                    
                    }); 


                }
            });

    });

    // Tari get ID to Delete Assesement Settings 
    $(document).ready(function(){
        $('#delete_question_settings_modal').on('show.bs.modal', function(e) {

            var settingsID = $(e.relatedTarget).data('id');
            var campusID = $(e.relatedTarget).data('camp');

            
            
            $('#hold_del_id').val(settingsID);
            $('#prosgetcampusfordel').val(campusID);
            

        });
    });

    $('body').on('click', '#delete_question_settings_btn', function() {

        var settingsID = $('#hold_del_id').val();
        var campusID =  $('#prosgetcampusfordel').val();
            

    

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/cbt-settings/tari_delete_settings.php",
            data: { settingsID:settingsID,campusID:campusID },
            //cache: false,
            success: function (output) {

                // alert(output);

                if(output == 'Yes'){



                    $.wnoty({
                        type: 'success',
                        message: 'Question Deleted Successfully',
                        autohideDelay: 5000, // 5 seconds
                        position:'top-right',
                        autohide: true
                    });

                    loadQuestions();

                    $('#delete_question_settings_modal').modal('hide');

                }else{

                    if(output == 'No'){
                        
                        $.wnoty({
                            type: 'warning',
                            message: 'Assesement Not Deleted Successfully',
                            autohideDelay: 5000, // 5 seconds
                            position:'top-right',
                            autohide: true
                        });

                    }else{

                        $.wnoty({
                            type: 'warning',
                            message: output,
                            autohideDelay: 5000, // 5 seconds
                            position:'top-right',
                            autohide: true
                        });


                    }
                    

                }


            }
        });
        



    });

    // Function to trigger the printing
    $("#tari_Print_Settings_and_Questions").on("click", function() {
            var element = document.getElementById('load_Questions_and_Settings');

            element.style.paddingRight = '40px';
            element.style.paddingLeft = '40px';
            var prosloadname = 'CBT EXAM QUESTION';
            // Clone the content and manipulate the clone
             var clone = element.cloneNode(true);

            // Remove elements to exclude from the clone
            $(clone).find('.proloadshowanserbtnforview').remove();
            // Generate PDF from the modified clone
            html2pdf().from(clone).output('blob').then(function (pdfBlob) {
                // Create a Blob and trigger the download
                var a = document.createElement('a');
                a.href = URL.createObjectURL(pdfBlob);
                a.download = prosloadname + '.pdf';
                a.click();
            });

          

    });
    
    
    
    
    //PROS LOAD STUDENT ANSWER FOR CBT HERE
    
                    
          $('body').on('click', '#prosloadloadsytudentanswerbtn', function() {
              
                             $('#prosloadstudentforcbthere').html('<div class="text-center p-5"> <span class="spinner-border spinner-border-lg" role="status" aria-hidden="true" style="color:#007ffb;"></span></div>');
              
              
               
              
                             var settingsID = $(this).data('id');
                             var campusID =  $(this).data('camp');
                             
                             
                             
                                 $.ajax({
                                    type: "POST",
                                    url: "../../controller/scripts/owner/cbt-settings/prosloadcbtstudentsubmitted.php",
                                    data: { settingsID:settingsID,campusID:campusID },
                                    //cache: false,
                                    success: function (output) {
                                         $('#prosloadstudentforcbthere').html(output);
                                        
                                    }
                                    
                                 });
                 
              
          });
    
    
    
     //PROS LOAD STUDENT ANSWER FOR CBT HERE
     
     
   $('body').on('click', '#prosloadresetexamherebtn', function() {
    // Show the reset exam modal
    $('#prosreset_exam_modal').modal('show');
    
    // Ensure the z-index of the first modal is increased to avoid overlap issues
    $('#prosloadmarexamheremodal').css('z-index', 1040);
    
    // Get dynamic data attributes from the clicked button
    var student_id = $(this).data('id');
    var campusID = $(this).data('cam');
     var ctbid = $(this).data('exam');
    
    var date = $(this).data('date');
    var stime = $(this).data('stime');  // '2:13 PM' (12-hour format)
    var etime = $(this).data('etime');  // '4:30 PM' (12-hour format)
    
    
 
                   
     $('#reset_exam_stud_id').val(student_id); // Set the date
    $('#reset_exam_stud_campusid').val(campusID);  // Set start time in 24-hour format
    $('#reset_exam_stud_cbtid').val(ctbid);
     
    
    // Function to convert '2:13 PM' to '14:13' (24-hour format)
    function convertTo24Hour(time12h) {
        const [time, modifier] = time12h.split(' ');
        let [hours, minutes] = time.split(':');

        if (hours === '12') {
            hours = modifier === 'AM' ? '00' : '12';
        } else {
            hours = modifier === 'PM' ? String(parseInt(hours, 10) + 12) : hours;
        }

        return hours.padStart(2, '0') + ':' + minutes;  // Ensures 'HH:MM' format
    }

    // Convert stime and etime from 12-hour to 24-hour format
    var stime24 = convertTo24Hour(stime);  // Convert to '14:13'
    var etime24 = convertTo24Hour(etime);  // Convert to '16:30'

    // Set the date and converted time values into the form fields
    $('#pros_settings_date_edit').val(date); // Set the date
    $('#pros_settings_time_in_edit').val(stime24);  // Set start time in 24-hour format
    $('#pros_settings_time_out_edit').val(etime24); // Set end time in 24-hour format
});




   
      
      // Reset z-index of first modal when second modal is closed
    $('#prosreset_exam_modal').on('hidden.bs.modal', function () {
        $('#prosloadmarexamheremodal').css('z-index', 1050); // Reset z-index of first modal
    });
    
    
    
     // PROS RESET CBT EXAM HERE
     
        $('body').on('click', '.pros_resetcbt_btn', function() {
            
            
             var student_id = $('#reset_exam_stud_id').val(); 
             var campusID = $('#reset_exam_stud_campusid').val();  
             var ctbid =  $('#reset_exam_stud_cbtid').val();
             
             
           
             
             
                var timeIN1 = $('#pros_settings_time_in_edit').val();
               var timeOUT2 = $('#pros_settings_time_out_edit').val();
               var date = $('#pros_settings_date_edit').val();


           

                // Convert time to 12-hour format
                var timeIN = convertTo12HourFormat(timeIN1);
                var timeOUT = convertTo12HourFormat(timeOUT2);
        
        
                function convertTo12HourFormat(timeValue) {
                    var timeParts = timeValue.split(":");
                    var hours = parseInt(timeParts[0]);
                    var minutes = timeParts[1];
        
                    var amPm = hours >= 12 ? "PM" : "AM";
                    hours = hours % 12 || 12;
        
                    var convertedTime = hours + ":" + minutes + " " + amPm;
                    return convertedTime;
                }
                
                  
                
                
                if(date == '' || timeIN1 == '' || timeOUT2 == '')
                {
                    
                    
                        $.wnoty({
                            type: 'warning',
                            message: 'All field should not be left blank',
                            autohideDelay: 5000, // 5 seconds
                            position:'top-right',
                            autohide: true
                        });

                    
                    
                }else
                {
                    
                    
                    
                       if(timeIN1 > timeOUT2){
                           
                            $.wnoty({
                                type: 'warning',
                                message: 'Assesement Start Time Cannot be greater than End Time',
                                autohideDelay: 5000, // 5 seconds
                                position:'top-right',
                                autohide:true
                            });
                        }else
                        {
                            
                            
                             $('.pros_resetcbt_btn').prop("disabled", true);
                            $('.pros_resetcbt_btn').html('Updating... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                            
                            
                               $.ajax({
                                    type: "POST",
                                    url: "../../controller/scripts/owner/cbt-settings/pros-resetexam.php",
                                    data: { 
                                     student_id:student_id,
                                     campusID:campusID,
                                     ctbid:ctbid,
                                     timeIN:timeIN,
                                     timeOUT:timeOUT,
                                     date:date
                                     
                                    },
                                    //cache: false,
                                    success: function (output) {
                                        
                                        var success_count = output.trim();
                                        
                                       
                                        
                                        
                                        if(success_count == 'success')
                                        {
                                            
                                            
                                            $.wnoty({
                                                type: 'success',
                                                message: 'Assesement reset successfully.',
                                                autohideDelay: 5000, // 5 seconds
                                                position:'top-right',
                                                autohide:true
                                            });
                                            
                                               $('#prosreset_exam_modal').modal('hide');
                                            
                                        }else
                                        {
                                            
                                            
                                            $.wnoty({
                                                type: 'error',
                                                message: 'Opps!! assesement could not be set pls try again',
                                                autohideDelay: 5000, // 5 seconds
                                                position:'top-right',
                                                autohide:true
                                            });
                                            
                                        }
                                        
                                        
                                          $('.pros_resetcbt_btn').prop("disabled", false);
                                         $('.pros_resetcbt_btn').html('Save <i class="fas fa-undo"></i>');
                                       
                                       
                                        
                                    }
                                    
                                 });
                            
                            
                            
                        }
                             
                    
                }
   
    

             
             
             
             
             
        });
    
     // PROS RESET CBT EXAM HERE
    
</script>