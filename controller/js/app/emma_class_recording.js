$(document).ready(function(){
    var emma_get_institution_for_campus = $(".abba-change-institution").val();

    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/emma_class_recording/emma_get_filter_images.php',
        data:{emma_send_institution_for_images:emma_get_institution_for_campus},
        success:function(output){
            $(".emmaloadalltheserecordcontents").html(output);
        }
    });
    
    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/emma_class_recording/emma_get_campus_for_class_recording.php',
        data:{emma_send_institution:emma_get_institution_for_campus},
        success:function(outcome){
            $("#emma_load_campus_for_class_recording").html(outcome);
            $("#emma_load_campus_for_class_recordingmodal").html(outcome);
        }
    });

    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/emma_class_recording/emma_get_session_for_class_recording.php',
        data:{emma_send_institution_for_session:emma_get_institution_for_campus},
        success:function(result){
            $("#emma_load_session_for_class_recording").html(result);
            $("#emma_load_session_for_class_recordingmodal").html(result);

        }
    });
})

$("body").on('change','#emma_load_campus_for_class_recording,#emma_load_campus_for_class_recordingmodal',function(){
    var emma_send_campus = $(this).val();

    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/emma_class_recording/emma_get_term_for_class_recording.php',
        data:{emma_send_campus_for_term:emma_send_campus},
        success:function(results){
            $("#emma_load_term_for_class_recording").html(results);
            $("#emma_load_term_for_class_recordingmodal").html(results);
            alert(results);
        }
    });

    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/emma_class_recording/emma_get_class_for_class-recording.php',
        data:{emma_send_campus_for_class:emma_send_campus},
        success:function(output){
            $("#emma_load_class_for_class_recording").html(output);
            $("#emma_load_class_for_class_recordingmodal").html(output);

        }
    });

});

$("body").on('change','#emma_load_class_for_class_recording',function(){
    var emma_send_class_id = $(this).val();
    var campus_for_subject = $("#emma_load_campus_for_class_recording").val()

    var datastring = "emma_send_class_id_for_subject=" + emma_send_class_id + "&emma_send_campus_for_subject=" + campus_for_subject;
    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/emma_class_recording/emma_get_subject_for_class_recording.php',
        data:datastring,
        success:function(value){
            $("#emma_load_subject_for_class_recording").html(value);
        }
    });
});


$("body").on('change','#emma_load_class_for_class_recordingmodal',function(){
    var emma_send_class_id = $(this).val();
    var campus_for_subject = $("#emma_load_campus_for_class_recordingmodal").val()

    var datastring = "emma_send_class_id_for_subject=" + emma_send_class_id + "&emma_send_campus_for_subject=" + campus_for_subject;
    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/emma_class_recording/emma_get_subject_for_class_recording.php',
        data:datastring,
        success:function(values){
            $("#emma_load_subject_for_class_recordingmodal").html(values);
        }
    });
});




$(document).ready(function(){
    let isRecording = false;
    let mediaRecorder;
    let recordedChunks = [];
    let startTime;
    let timerInterval;
    let durationDisplay;

    const startRecordingButton = document.getElementById('startRecordingButton');
    const stopRecordingButton = document.getElementById('stopRecordingButton');
    const audioPlayer = document.getElementById('audioPlayer-Chi');

    // Assign durationDisplay correctly using jQuery
    durationDisplay = $('#duration');

    const constraints = { audio: true };

    startRecordingButton.addEventListener('click', startRecording);
    stopRecordingButton.addEventListener('click', stopRecording);

    $("body").on('click','#startRecordingButton',function(){
        startRecording();
    });

    $("body").on('click','#stopRecordingButton',function(){
    var emma_get_institution_for_this_campus = $(".abba-change-institution").val();

    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/emma_class_recording/emma_save_class_recordingtwo.php',
        data:{emmainstitute:emma_get_institution_for_this_campus},
        success:function(output){
            if(output == 11){
                $.wnoty({
                    type: 'success',
                    message: "Record Saved Successfully",
                    autohideDelay: 4000, // 5 seconds
                    position:'top-right',
                    autohide:true
                });
            }else{
                $.wnoty({
                    type: 'warning',
                    message: "Record Not Updated",
                    autohideDelay: 4000, // 5 seconds
                    position:'top-right',
                    autohide:true
                });
            }
        }
    })
    })

    // Define calculateDuration before using it in updateTimer
    function calculateDuration(start, end) {
        return end - start;
    }

        async function startRecording() {
        isRecording = true;

        const emma_campus_for_rec = $('#emma_load_campus_for_class_recordingmodal').val();
        const emma_session_for_rec = $('#emma_load_session_for_class_recordingmodal').val();
        const emma_term_for_rec = $('#emma_load_term_for_class_recordingmodal').val();
        const emma_class_for_rec = $('#emma_load_class_for_class_recordingmodal').val();
        const emma_subject_for_rec = $('#emma_load_subject_for_class_recordingmodal').val();
        const status = 1;


        if(emma_campus_for_rec == 'NULL' || emma_campus_for_rec == ''){

            $.wnoty({
                type: 'warning',
                message: 'Please Select Campus',
                autohideDelay: 4000, // 5 seconds
                position:'top-right',
                autohide:true
            });

        }else if(emma_session_for_rec == 'NULL' || emma_session_for_rec == ''){
            $.wnoty({
                type: 'warning',
                message: 'Please Select Session',
                autohideDelay: 4000, // 5 seconds
                position:'top-right',
                autohide:true
            });
        }else if(emma_term_for_rec == 'NULL' || emma_term_for_rec == ''){
            $.wnoty({
                type: 'warning',
                message: 'Please Select Term',
                autohideDelay: 4000, // 5 seconds
                position:'top-right',
                autohide:true
            });
        }else if(emma_class_for_rec == 'NULL' || emma_class_for_rec == ''){
            $.wnoty({
                type: 'warning',
                message: 'Please Select Class',
                autohideDelay: 4000, // 5 seconds
                position:'top-right',
                autohide:true
            });
        }else if(emma_subject_for_rec == 'NULL' || emma_subject_for_rec == ''){
            $.wnoty({
                type: 'warning',
                message: 'Please Select Subject',
                autohideDelay: 4000, // 5 seconds
                position:'top-right',
                autohide:true
            });
        }else{

            try {
                const stream = await navigator.mediaDevices.getUserMedia(constraints);
                mediaRecorder = new MediaRecorder(stream);

                mediaRecorder.ondataavailable = handleDataAvailable;
                mediaRecorder.onstop = handleRecordingStop;

                recordedChunks = [];
                mediaRecorder.start();
                startTime = Date.now();

                startRecordingButton.disabled = true;
                stopRecordingButton.disabled = false;

                // saveRecordingFirst();

                // Start updating the timer while recording
                updateTimer();

                console.log('Recording started');
            } catch (error) {
                $.wnoty({
                    type: 'warning',
                    message: "Error Accessing microphone",
                    autohideDelay: 4000, // 5 seconds
                    position:'top-right',
                    autohide:true
                });
                // console.error('Error accessing microphone:', error);
        }
        }
    }


    // Move the rest of the functions here...

    function handleDataAvailable(event) {
          

        if (event.data.size > 0) {
            recordedChunks.push(event.data);
        }
    }

    function stopRecording() {
        if (mediaRecorder.state !== 'inactive') {
            mediaRecorder.stop();
        }

        startRecordingButton.disabled = false;
        stopRecordingButton.disabled = true;

         // Stop updating the timer
        clearTimeout(timerInterval);

        console.log('Recording stopped');
    }

    function handleRecordingStop() {
        
        isRecording = false;

        displayDuration();

        const audioBlob = new Blob(recordedChunks, { type: 'audio/wav' });
        const reader = new FileReader();
        
        reader.onloadend = function() {
            const audioData = reader.result.split(',')[1]; // Extract base64 data
            
            const duration = calculateDuration(startTime, Date.now());
            
            saveRecording(audioData, duration);
        };

        reader.readAsDataURL(audioBlob);
    }

    function displayDuration() {
        const currentTime = Date.now();
        const elapsedTime = calculateDuration(startTime, currentTime);
        const formattedDuration = formatTime(elapsedTime);
        durationDisplay.text('Duration: ' + formattedDuration);
    }

    function updateTimer() {
        const currentTime = Date.now();
        const elapsedTime = calculateDuration(startTime, currentTime);
        const formattedTime = formatTime(elapsedTime);
        durationDisplay.text(formattedTime);

        // Update the timer every second
        timerInterval = setTimeout(updateTimer, 1000);
    }

    function formatTime(milliseconds) {
        const seconds = Math.floor(milliseconds / 1000);
        const minutes = Math.floor(seconds / 60);
        const remainingSeconds = seconds % 60;
        return (minutes < 10 ? '0' : '') + minutes + ':' + (remainingSeconds < 10 ? '0' : '') + remainingSeconds;
    }

    function saveRecording(audioData, duration) {

        var currentDate = new Date();
        var year = currentDate.getFullYear();
        var month = (currentDate.getMonth() + 1).toString().padStart(2, '0'); // Adding 1 because months are zero-based
        var day = currentDate.getDate().toString().padStart(2, '0');

        var formattedDate = year + '-' + month + '-' + day;

        const emma_campus_for_rec = $('#emma_load_campus_for_class_recordingmodal').val();
        const emma_session_for_rec = $('#emma_load_session_for_class_recordingmodal').val();
        const emma_term_for_rec = $('#emma_load_term_for_class_recordingmodal').val();
        const emma_class_for_rec = $('#emma_load_class_for_class_recordingmodal').val();
        const emma_subject_for_rec = $('#emma_load_subject_for_class_recordingmodal').val();
        const status = 1;
        var formattedDate = formattedDate;

        var formData = new FormData();

        formData.append('emma_campus_for_rec', emma_campus_for_rec);
        formData.append('emma_session_for_rec', emma_session_for_rec);
        formData.append('emma_term_for_rec', emma_term_for_rec);
        formData.append('emma_class_for_rec', emma_class_for_rec);
        formData.append('emma_subject_for_rec', emma_subject_for_rec);
        formData.append('audioData', audioData);
        formData.append('duration', duration);
        formData.append('status',status);
        formData.append('formattedDate',formattedDate);


        console.log(formData)
            $.ajax({
                url: "../../controller/scripts/owner/emma_class_recording/emma_save_class_recording.php",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if(response == 1){
                        $.wnoty({
                            type: 'success',
                            message: "Record saved",
                            autohideDelay: 4000, // 5 seconds
                            position:'top-right',
                            autohide:true
                        });
                    }else{
                        $.wnoty({
                            type: 'warning',
                            message: "Record Not Saved",
                            autohideDelay: 4000, // 5 seconds
                            position:'top-right',
                            autohide:true
                        });
                    }
                },
            });
    }
});

$("body").on("click","#emmaloadclassrecordingvalues",function(){

    var emma_campus_for_rec = $('#emma_load_campus_for_class_recording').val();
    var emma_session_for_rec = $('#emma_load_session_for_class_recording').val();
    var emma_term_for_rec = $('#emma_load_term_for_class_recording').val();
    var emma_class_for_rec = $('#emma_load_class_for_class_recording').val();
    var emma_subject_for_rec = $('#emma_load_subject_for_class_recording').val();

    if(emma_campus_for_rec == 'NULL' || emma_campus_for_rec == ''){
        $.wnoty({
            type: 'warning',
            message: "Please Select Campus",
            autohideDelay: 4000, // 5 seconds
            position:'top-right',
            autohide:true
        });
    }
    else if(emma_session_for_rec == 'NULL' || emma_session_for_rec == '')
    {
        $.wnoty({
            type: 'warning',
            message: "Please Select Session",
            autohideDelay: 4000, // 5 seconds
            position:'top-right',
            autohide:true
        });
    }
    else if(emma_term_for_rec == '' || emma_term_for_rec == 'NULL')
    {
        $.wnoty({
            type: 'warning',
            message: "Please Select Term",
            autohideDelay: 4000, // 5 seconds
            position:'top-right',
            autohide:true
        });
    }
    else if(emma_class_for_rec == '' || emma_class_for_rec == 'NULL')
    {
        $.wnoty({
            type: 'warning',
            message: "Please Select Class",
            autohideDelay: 4000, // 5 seconds
            position:'top-right',
            autohide:true
        });
    }
    else if(emma_subject_for_rec == '' || emma_subject_for_rec == 'NULL')
    {
        $.wnoty({
            type: 'warning',
            message: "Please Select Subject",
            autohideDelay: 4000, // 5 seconds
            position:'top-right',
            autohide:true
        });
    }
    else
    {

    datastring = "emma_send_campus=" + emma_campus_for_rec + "&emma_send_session=" + emma_session_for_rec + "&emma_send_term=" + emma_term_for_rec + "&emma_send_class=" + emma_class_for_rec + "&emma_send_subject=" + emma_subject_for_rec;               
    
    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/emma_class_recording/emma_load_recording_values.php',
        data:datastring,
        success:function(outcome){
            $("#emmaloadalltheserecordcontents").html(outcome);
        }
    });
    }
});


$("body").on("click","#startRecordingButton",function(){

    var emma_campus_for_rec = $('#emma_load_campus_for_class_recordingmodal').val();
    var emma_session_for_rec = $('#emma_load_session_for_class_recordingmodal').val();
    var emma_term_for_rec = $('#emma_load_term_for_class_recordingmodal').val();
    var emma_class_for_rec = $('#emma_load_class_for_class_recordingmodal').val();
    var emma_subject_for_rec = $('#emma_load_subject_for_class_recordingmodal').val();

   
    var datastring = "emma_send_campus=" + emma_campus_for_rec + "&emma_send_session=" + emma_session_for_rec + "&emma_send_term=" + emma_term_for_rec + "&emma_send_class=" + emma_class_for_rec + "&emma_send_subject=" + emma_subject_for_rec;               
    alert(datastring);
    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/emma_class_recording/emma_load_recording_values.php',
        data:datastring,
        success:function(outcome){
            
            $("#emmaloadalltheserecordcontents").html(outcome);
        }
    });
    
});
