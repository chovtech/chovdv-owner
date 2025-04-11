<script>


    $(document).ready(function() {


                var userID = $('#user_id').val();
                var usertype = $('#user_type').val();

                var instutitionID = $(".abba-change-institution option:selected").val();

               $('#prosselectlessonnotetosetcampus').html('<option value="NULL">Loading..</option>');
    
               

                // get campus ajax
                var dataString = 'abba_instituion_id=' + instutitionID;

                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/abba-get-campus.php",
                    data: dataString,
                    //cache: false,
                    success: function (output) {

                        
                        
                        $('#prosselectlessonnotetosetcampus').html(output);
                        $('#prosloadlesonetecampus').html(output);
                      

                        
                    }
                });

              
                

                $('#prosselectlessonnotetosetsession').html('<option value="NULL">Loading..</option>');

                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/lessonnote/prosloadsessionlessoninsert.php",
                    data: {instutitionID:instutitionID,usertype:usertype,userID:userID},
                    //cache: false,
                    success: function (output) {
                        
                          $('#prosselectlessonnotetosetsession').html(output);
                          $('#prosloadsessioncontentlessonnote').html(output);

                          
                        
                    }
                });


                $('body').on('change', '#prosselectlessonnotetosetcampus', function() {

                            var campusid = $(this).val();
                            var instutitionID = $(".abba-change-institution option:selected").val();

                            $('#prosselectlessonnotetosetterm').html('<option value="NULL">Loading..</option>');


                            $.ajax({
                                type: "POST",
                                url: "../../controller/scripts/owner/lessonnote/prosloadtermforcreate.php",
                                data: {campusid:campusid,instutitionID:instutitionID},
                                //cache: false,
                                success: function (output) {
                                    
                                    $('#prosselectlessonnotetosetterm').html(output);
                                    
                                }
                            });

                            

                            
                            $('#lessonsettingsclass').html('<option value="NULL">Loading..</option>');

                            $.ajax({
                                type: "POST",
                                url: "../../controller/scripts/owner/lessonnote/prosloadclassforlesson.php",
                                data: {campusid:campusid,instutitionID:instutitionID},
                                //cache: false,
                                success: function (output) {
                                    
                                    $('#lessonsettingsclass').html(output);
                                    
                                }
                            });

                           


                               

                });



                // PROS LOAD TERM AND CLASS FOR LESSON NOTE

                $('body').on('change', '#prosloadlesonetecampus', function() {



                              var campusid = $(this).val();
                              var instutitionID = $(".abba-change-institution option:selected").val();

                            $('#prosloadtermforlessonnotecreate').html('<option value="NULL">Loading..</option>');


                            $.ajax({
                                type: "POST",
                                url: "../../controller/scripts/owner/lessonnote/prosloadtermforcreate.php",
                                data: {campusid:campusid,instutitionID:instutitionID},
                                //cache: false,
                                success: function (output) {
                                    
                                    $('#prosloadtermforlessonnotecreate').html(output);
                                    
                                }
                            });

                            

                            
                            $('#proloadlessonnoteclass').html('<option value="NULL">Loading..</option>');

                            $.ajax({
                                type: "POST",
                                url: "../../controller/scripts/owner/lessonnote/prosloadclassforlesson.php",
                                data: {campusid:campusid,instutitionID:instutitionID},
                                //cache: false,
                                success: function (output) {
                                    
                                    $('#proloadlessonnoteclass').html(output);
                                    
                                }
                            });

                });


             // PROS LOAD TERM AND CLASS FOR LESSON NOTE


                


                $('body').on('change', '#lessonsettingsclass', function() {

                        var classid = $(this).val();
                        var campusID = $("#prosselectlessonnotetosetcampus option:selected").val();

                        $('#lessonsettinssubject').html('<option value="NULL">Loading..</option>');

                        $.ajax({
                            type: "POST",
                            url: "../../controller/scripts/owner/lessonnote/prosloadsubjectforlessoncreat.php",
                            data: {campusID:campusID,classid:classid},
                            //cache: false,
                            success: function (output) {
                                
                                $('#lessonsettinssubject').html(output);
                                
                            }
                        });


            });

                  




    });




$(document).ready(function() {
    // Show file input when "browse" link is clicked
    $('.browse').click(function() {
        $('#prosselectinforlessonfile').click();
    });

    $('.prosloadlessnotevideocontenthere').click(function() {

        $('#proslessonnotevideinputhhree').click();

    });


    $('body').on('change', '#proslessonnotevideinputhhree', function() {



            var files = this.files;
            if (files.length > 0) {
                var file = files[0];
                var fileName = file.name; // Get the file name
                var reader = new FileReader(); // Create a FileReader object
                reader.onload = function(e) {
                    var fileType = file.type;
                    var base64Data = reader.result.split(',')[1]; // Get the Base64 data after the comma
                    var mediaTypePrefix;
                    if (fileType.startsWith('image')) {
                        mediaTypePrefix = 'data:image';
                    } else if (fileType === 'application/pdf') {
                        mediaTypePrefix = 'data:application/pdf';
                    } else if (fileType === 'application/msword' || fileType === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
                        // Word document (DOC or DOCX)
                        mediaTypePrefix = 'data:application/msword';
                    } else if (fileType.startsWith('video')) {
                        mediaTypePrefix = 'data:video';
                    } else {
                        // Unsupported file type
                        console.error('Unsupported file type:', fileType);
                        return;
                    }
                    // Construct the Base64 string
                    var base64String = `${mediaTypePrefix};base64,${base64Data}`;
                    $('#prosloadvideoforlessontecreate').text(base64String);
                  // Alert the Base64 string for debugging
                };
                reader.readAsDataURL(file); // Read the file as a Data URL
            }
});


    $('.prosgeneralaudioclick').click(function() {

            $('#proslessonnoteaudioinputhhree').click();

    });





    $('body').on('change', '#proslessonnoteaudioinputhhree', function() {


    var files = this.files;
    if (files.length > 0) {
        var file = files[0];
        var fileName = file.name; // Get the file name
        var reader = new FileReader(); // Create a FileReader object
        reader.onload = function(e) {
            var fileType = file.type;
            var base64Data = reader.result.split(',')[1]; // Get the Base64 data after the comma
            var mediaTypePrefix;
            if (fileType.startsWith('audio')) {
                mediaTypePrefix = 'data:audio';
            } else {
                // Unsupported file type
                console.error('Unsupported file type:', fileType);
                return;
            }
            // Construct the Base64 string
            var base64String = `${mediaTypePrefix};base64,${base64Data}`;
            $('#prosloadaudiocontentforcreate').text(base64String);
         
        };
        reader.readAsDataURL(file); // Read the file as a Data URL
    }
});



  


    




    

    



    // Handle file selection
$('body').on('change', '#prosselectinforlessonfile', function() {



    var files = this.files;
   
    if (files.length > 0) {

        var file = files[0];


        var fileName = file.name; // Get the file name
       

          

        // console.log(file);
        var reader = new FileReader();
        reader.onload = function(e) {
            var fileType = file.type;

         
           

            var base64Data = reader.result.split(',')[1]; // Get the Base64 data after the comma
           
            // Determine media type prefix based on file type
            var mediaTypePrefix;
            if (fileType.startsWith('image')) {

                mediaTypePrefix = 'data:image';

            } else if (fileType === 'application/pdf') {

                mediaTypePrefix = 'data:application/pdf';

            } else if (fileType === 'application/msword') {

                // Word document (DOC)
                mediaTypePrefix = 'data:application/msword';

            } else if (fileType === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
                // Word document (DOCX)
                mediaTypePrefix = 'data:application/vnd.openxmlformats-officedocument.wordprocessingml.document';
            } else {
                // Unsupported file type
                console.error('Unsupported file type:', fileType);
                return;
            }

            // Construct the Base64 string
            var base64String = `${mediaTypePrefix};base64,${base64Data}`;
            $('#prosloadtextareaforfilehere').text(base64String);
            $('.proshiddeninputfieldforinsert').val(fileName);
         

            
        };
        reader.readAsDataURL(file);
    }

});


   

    // Handle file drop
    $('body').on('dragover', '.prosloadfiledropzonher', function(e) {
        e.preventDefault();
        $(this).addClass('dragover');
    });

    $('body').on('dragleave drop', '.prosloadfiledropzonher', function(e) {
        e.preventDefault();
        $(this).removeClass('dragover');
    });




    $('body').on('drop', '.prosloadfiledropzonher', function(e) {

     e.preventDefault();
    var files = e.originalEvent.dataTransfer.files;
    if (files.length > 0) {
        var file = files[0];
       
        var reader = new FileReader();
        reader.onload = function(e) {
            var fileType = file.type;
            var fileName = file.name; // Get the file name

            var base64Data = reader.result.split(',')[1]; // Get the Base64 data after the comma

            // Determine media type prefix based on file type
            var mediaTypePrefix;
            if (fileType.startsWith('image')) {
                mediaTypePrefix = 'data:image';
            } else if (fileType === 'application/pdf') {
                mediaTypePrefix = 'data:application/pdf';
            } else if (fileType === 'application/msword') {
                // Word document (DOC)
                mediaTypePrefix = 'data:application/msword';
            } else if (fileType === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
                // Word document (DOCX)
                mediaTypePrefix = 'data:application/vnd.openxmlformats-officedocument.wordprocessingml.document';
            } else {
                // Unsupported file type
                // console.error('Unsupported file type:', fileType);
                return;
            }

            // Construct the Base64 string
            var base64String = `${mediaTypePrefix};base64,${base64Data}`;

            $('#prosloadtextareaforfilehere').text(base64String);
            $('.proshiddeninputfieldforinsert').val(fileName);

           
        };
        reader.readAsDataURL(file);
    }
});



});




$('body').on('click', '#prossaveelssubmitfilecontentherebtn', function(e) {

             $('#prossaveelssubmitfilecontentherebtn').html('<center><i class="fa fa-spinner fa-spin fs-3 text-light"></i></center>');

                var campusID = $("#prosselectlessonnotetosetcampus option:selected").val();
                var prosselectsession = $("#prosselectlessonnotetosetsession option:selected").val();
                var term = $("#prosselectlessonnotetosetterm option:selected").val();
                var classid = $("#lessonsettingsclass option:selected").val();
                var subjectID = $("#lessonsettinssubject option:selected").val();

                var subjectID = $("#lessonsettinssubject option:selected").val();


             


                 var filecontent = $("#prosloadtextareaforfilehere").text();

                 var prosfilemanme = $(".proshiddeninputfieldforinsert").val();


                 var userID = $('#user_id').val();
                 var usertype = $('#user_type').val();

                 var instutitionID = $(".abba-change-institution option:selected").val();


                 var prosloadaudion ='';
                 var prosloadvideo = '';

                //  var prosloadaudion = $("#prosloadaudiocontentforcreate").text();
                //  var prosloadvideo = $("#prosloadvideoforlessontecreate").text();

              



                 var prosloadvideolink = $(".prosvideolinklessonte").val();
                 var prosloadaudiolink = $(".prosaudionlinklessonte").val();

              


                
                


               

                 if (campusID == '' || campusID == '0' || campusID == 'NULL') {

                            
                        $.wnoty({
                            type: 'warning',
                            message: "Hey!! Select campus to proceed",
                            autohideDelay: 5000
                        });

                        $('#prossaveelssubmitfilecontentherebtn').html("Submit");

                }
                else if (prosselectsession == '' || prosselectsession == '0' || prosselectsession == 'NULL') {



                           
                     $.wnoty({
                            type: 'warning',
                            message: "Hey!! Select session to proceed",
                            autohideDelay: 5000
                        });

                        $('#prossaveelssubmitfilecontentherebtn').html("Submit");




                    } else if (term == '' || term == '0' || term == 'NULL') {

                        $.wnoty({
                            type: 'warning',
                            message: "Hey!! Select term to proceed",
                            autohideDelay: 5000
                        });

                        $('#prossaveelssubmitfilecontentherebtn').html("Submit");


                    } else if (classid == '' || classid == '0' || classid == 'NULL') {



                        $.wnoty({
                            type: 'warning',
                            message: "Hey!! Select class to proceed",
                            autohideDelay: 5000
                        });

                        $('#prossaveelssubmitfilecontentherebtn').html("Submit");



                    }else if (subjectID == '' || subjectID == '0' || subjectID == 'NULL') {


                            $.wnoty({
                                type: 'warning',
                                message: "Hey!! Select subject to proceed",
                                autohideDelay: 5000
                            });

                            $('#prossaveelssubmitfilecontentherebtn').html("Submit");

                    }else if (filecontent == '' ) {




                          $.wnoty({
                                type: 'warning',
                                message: "Hey!! Select your lesson file",
                                autohideDelay: 5000
                            });

                            $('#prossaveelssubmitfilecontentherebtn').html("Submit");
                        

                   }else
                   {



                             $('#prossaveelssubmitfilecontentherebtn').prop("disabled", true);




                             get_longitude_and_latitude(function(coordinates) {



                                    var latitude = coordinates.latitude;
                                    var longitude = coordinates.longitude;

                                $.ajax({
                                    type: "POST",
                                    url: "../../controller/scripts/owner/lessonnote/prosinserlessonhere.php",
                                    data: {

                                        campusID:campusID,
                                        prosselectsession:prosselectsession,
                                        term:term,
                                        classid:classid,
                                        subjectID:subjectID,
                                        prosfilemanme:prosfilemanme,
                                        filecontent:filecontent,
                                        instutitionID:instutitionID,
                                        usertype:usertype,
                                        userID:userID,
                                        prosloadaudion:prosloadaudion,
                                         prosloadvideo:prosloadvideo,
                                         latitude:latitude,
                                         longitude:longitude,
                                         prosloadaudiolink:prosloadaudiolink,
                                         prosloadvideolink:prosloadvideolink
                                    },
                                    //cache: false,
                                    success: function (output) {

                                      


                                         $('#prossubmitlessonherecontent').modal('hide');

                                          proloadlessontecontenthere();


                                            // $("#prosloadlesonetecampus").val(campusID);
                                            // $("#prosloadsessioncontentlessonnote").val(prosselectsession);
                                            // $("#prosloadtermforlessonnotecreate").val(term);
                                            //  $("#proloadlessonnoteclass").val(classid);


                                   

                                        if(output.trim() == 'success')
                                        {

                                                $.wnoty({
                                                    type: 'success',
                                                    message: "Great!! note saved successfully",
                                                    autohideDelay: 5000
                                                });

                                        }else
                                        {

                                             $.wnoty({
                                                    type: 'warning',
                                                    message: "Failed!! please try again",
                                                    autohideDelay: 5000
                                                });


                                        }


                                        $('#prossaveelssubmitfilecontentherebtn').prop("disabled", false);

                                        $('#prossaveelssubmitfilecontentherebtn').html("Submit");
                                        
                                        
                                        
                                        
                                    }
                                });


                            });


                   }



});




// PROS LOAD LESSON NOTE CONTENT HERE

    $('body').on('click', '#prosloadlesssonnotecontentbtn', function(e) {


            proloadlessontecontenthere();

    });




    function proloadlessontecontenthere(){



                var campusID = $("#prosloadlesonetecampus option:selected").val();
                var prosselectsession = $("#prosloadsessioncontentlessonnote option:selected").val();
                var term = $("#prosloadtermforlessonnotecreate option:selected").val();
                var classid = $("#proloadlessonnoteclass option:selected").val();


                var userID = $('#user_id').val();
                var usertype = $('#user_type').val();

                var instutitionID = $(".abba-change-institution option:selected").val();


                $('#prosloadlesssonnotecontentbtn').html(`<div class="spinner-grow spinner-grow-sm" role="status">
                <span class="visually-hidden"></span>
                </div>Loading...`);





                if (campusID == '' || campusID == '0' || campusID == 'NULL') {

                            
                    $.wnoty({
                        type: 'warning',
                        message: "Hey!! Select campus to proceed",
                        autohideDelay: 5000
                    });

                    $('#prosloadlesssonnotecontentbtn').html(`<i class="fas fa-sync-alt"> Load</i>`);

                }
                else if (prosselectsession == '' || prosselectsession == '0' || prosselectsession == 'NULL') {



                    
                    $.wnoty({
                        type: 'warning',
                        message: "Hey!! Select session to proceed",
                        autohideDelay: 5000
                    });

                    $('#prosloadlesssonnotecontentbtn').html(`<i class="fas fa-sync-alt"> Load</i>`);




                } else if (term == '' || term == '0' || term == 'NULL') {

                    $.wnoty({
                        type: 'warning',
                        message: "Hey!! Select term to proceed",
                        autohideDelay: 5000
                    });

                    $('#prosloadlesssonnotecontentbtn').html(`<i class="fas fa-sync-alt"> Load</i>`);


                } else if (classid == '' || classid == '0' || classid == 'NULL') {



                        $.wnoty({
                            type: 'warning',
                            message: "Hey!! Select class to proceed",
                            autohideDelay: 5000
                        });

                        $('#prosloadlesssonnotecontentbtn').html(`<i class="fas fa-sync-alt"> Load</i>`);



                }else 
                {


                    $('#prosloadlessonnotecontenthree').html('<center><i class="fa fa-spinner fa-spin fs-3 text-primary"></i></center>');



                            $('#prosloadlesssonnotecontentbtn').prop('disabled', true);
                            $('#prosloadlesssonnotecontentbtn').html(`<i class="fas fa-sync-alt"> Load</i>`);



                            $.ajax({
                                    type: "POST",
                                    url: "../../controller/scripts/owner/lessonnote/prosloadlessonnotecontent.php",
                                    data: {
                                        campusID:campusID,
                                        prosselectsession:prosselectsession,
                                        term:term,
                                        classid:classid,
                                        instutitionID:instutitionID,
                                        usertype:usertype,
                                        userID:userID
                                    },
                                    //cache: false,
                                    success: function (output) {

                                           $('#prosloadlesssonnotecontentbtn').prop('disabled', false);
                                           $('#prosloadlesssonnotecontentbtn').html(`<i class="fas fa-sync-alt"> Load</i>`);

                                           $('#prosloadlessonnotecontenthree').html(output);


                                    }

                             });



                }







    }



    



    // PROS LOAD LESSON NOTE CONTENT HERE
    $('body').on('click', '.prosdowloadlessoncontentbtn', function(e) {


                var lessonnoteID = $(this).data('id');
                var file = $('#prosloadbase64contentforlessonnote'+lessonnoteID).text();
                var filenamenew = $('.prosloadfiletypeforlessonnote'+lessonnoteID).val();
               

                
                var fileName = filenamenew;

                downloadBase64Data(file, fileName);

           

    });


    function downloadBase64Data(base64String, fileName) {
            // Create an anchor element
            var downloadLink = $('<a></a>');

            // Set the href attribute to the base64 data
            downloadLink.attr('href', base64String);

            // Set the download attribute to specify the file name
            downloadLink.attr('download', fileName);

            // Append the anchor element to the body
            $('body').append(downloadLink);

            // Trigger a click event on the anchor element to start the download
            downloadLink[0].click();

            // Remove the anchor element from the DOM
            downloadLink.remove();
    }




            //PROS REMOVE OR DELETE LESSON NOTE


                 $('body').on('click', '#prosloaddeletemodalherebtn', function(e) {


                        var proslessonnoteID = $(this).data('id');
                        var CampusID = $(this).data('camp');
                        var subjectname = $(this).data('subjectname');

                        
                        

                        $('.prosloadlessonnotefordelete').val(proslessonnoteID);
                        $('.prosloadlessonnotecampusinst').val(CampusID);
                        $('.prosloadsubjectname').val();

                       

                 });


                 $('body').on('click', '.prosdeletelessonnotebtn', function(e) {


                    $('.prosdeletelessonnotebtn').html('<center><i class="fa fa-spinner fa-spin fs-3 text-primary"></i></center>');


                     var proslessonnoteID =  $('.prosloadlessonnotefordelete').val();
                     var CampusID =  $('.prosloadlessonnotecampusinst').val();
                       var subjectname =  $('.prosloadsubjectname').val();

                     $('.prosdeletelessonnotebtn').html(`<div class="spinner-border spinner-border-sm" role="status">
                                                                <span class="visually-hidden"></span>
                                                                </div>Deleting...`);




                        get_longitude_and_latitude(function(coordinates) {


                                    // Use the coordinates here
                                    var latitude = coordinates.latitude;
                                    var longitude = coordinates.longitude;


                                    var userID = $('#user_id').val();
                                    var usertype = $('#user_type').val();

                                    var instutitionID = $(".abba-change-institution option:selected").val();


                                    $('.prosdeletelessonnotebtn').prop('disabled', true);


                                    $.ajax({
                                        type: "POST",
                                        url: "../../controller/scripts/owner/lessonnote/prosdeletelessonnodte.php",
                                        data: {
                                            
                                            proslessonnoteID:proslessonnoteID,
                                            CampusID:CampusID,
                                            instutitionID:instutitionID,
                                            usertype:usertype,
                                            userID:userID,
                                            longitude:longitude,
                                            latitude:latitude,
                                            subjectname:subjectname

                                        },
                                        //cache: false,
                                        success: function (output) {


                                            $('.prosdeletelessonnotebtn').prop('disabled', false);
                                            $('.prosdeletelessonnotebtn').html('Delete');


                                            if(output.trim() == 'success')
                                            {

                                                        $.wnoty({
                                                            type: 'success',
                                                            message: "Great!! lesson note deleted successfully.",
                                                            autohideDelay: 5000
                                                        });

                                                        $('.prossubjectfullcontenthere'+proslessonnoteID).remove();


                                                        $('#pros-deletelessonemodalbtn').modal('hide');


                                            }else
                                            {

                                            }



                                        }

                                });




                        
                        });



                 });
                 



             //PROS REMOVE OR DELETE LESSON NOTE













</script>