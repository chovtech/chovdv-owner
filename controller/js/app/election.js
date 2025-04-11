    let show = true;
 
    function showCheckboxes() {

        let checkboxes = document.getElementById("checkBoxes");

        if (show) {
            checkboxes.style.display = "block";
            show = false;
        } else {
            checkboxes.style.display = "none";
            show = true;
        }
    }

    function openModal() {
        var modal = document.getElementById('myModal');
        modal.style.display = 'block';
    }
    // $(window).on('load', function() {
    //     // When the window finishes loading, hide the preloader
    //     $('.preloader').fadeOut('slow');
    // });
    function showCheckboxes() {
        var checkBoxes = document.getElementById("checkBoxes");
        checkBoxes.style.display = checkBoxes.style.display === "block" ? "none" : "block";
    }

    function showCheckboxesone() {
        let checkboxes = document.getElementById("checkBoxes1");

        if (show) {
            checkboxes.style.display = "block";
            show = false;
        } else {
            checkboxes.style.display = "none";
            show = true;
        }
    }

    function openModal() {
        var modal = document.getElementById('myModal');
        modal.style.display = 'block';
    }
    // $(window).on('load', function() {
    //     // When the window finishes loading, hide the preloader
    //     $('.preloader').fadeOut('slow');
    // });
    function showCheckboxesone() {
        var checkBoxes = document.getElementById("checkBoxes1");
        checkBoxes.style.display = checkBoxes.style.display === "block" ? "none" : "block";
    }

    // Handle checkbox changes
    document.querySelectorAll('#checkBoxes1 input[type="checkbox"]').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            updateSelect();
        });
    });
    function updateSelect() {
        var selectBox = document.querySelector('.selectBox select');
        var selectedOptions = Array.from(document.querySelectorAll('#checkBoxes1 input[type="checkbox"]:checked')).map(function(checkbox) {
            return checkbox.value;
        });

        // Update the select box with selected options
        selectBox.innerHTML = '<option>' + (selectedOptions.length > 0 ? selectedOptions.join(', ') : 'Offenser Name') + '</option>';
    }

    // Update the visible part of the select box
    function updateSelect() {
        var selectBox = document.querySelector('.selectBox select');
        var selectedOptions = Array.from(document.querySelectorAll('#checkBoxes input[type="checkbox"]:checked')).map(function(checkbox) {
            return checkbox.value;
        });

        // Update the select box with selected options
        selectBox.innerHTML = '<option>' + (selectedOptions.length > 0 ? selectedOptions.join(', ') : 'Select Member') + '</option>';
    }

    const selectBtn = document.querySelector(".select-btn"),
        itemsemma = document.querySelectorAll(".items");

        selectBtn.addEventListener("click", () => {

        selectBtn.classList.toggle("open");
    });

    const selectBtn_edit = document.querySelector(".select-btn_edit"),
        itemsemmaedit = document.querySelectorAll(".itemedit");

        selectBtn_edit.addEventListener("click", () => {
         
        selectBtn_edit.classList.toggle("open");
    });

    const selectBtn_editclasses = document.querySelector(".select-btn_one_edit"),
        itemsemmaeditclasses = document.querySelectorAll(".item_one_edit");

        selectBtn_editclasses.addEventListener("click", () => {
         
        selectBtn_editclasses.classList.toggle("open");
    });

    $(document).ready(function(){
        $('#myDataTable').DataTable({
            responsive: true
        });

        var institution = $(".abba-change-institution").val();

        $("#emma_get_election_settings_campus").html("<option value='NULL'>Loading...</option>");
        $("#emmaloadcampaigncampus").html("<option value='NULL'>Loading...</option>");
        $("#emma_get_election_settings_session").html("<option value='NULL'>Loading...</option>");
        $("#emma_get_election_settings_positions").html("<option value='NULL'>Loading...</option>");
        $(".loadcampusforapplicants").html("<option value='NULL'>Loading...</option>");
        $(".loadsessionforapplicants").html("<option value='NULL'>Loading...</option>");
        $("#loadcampusforcampaign").html("<option value='NULL'>Loading...</option>");
        $("#loadsessionforcampaign").html("<option value='NULL'>Loading...</option>");

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/election/election_campus.php',
            data:{
                institution: institution
            },
            success:function(result){
                $("#emma_get_election_settings_campus").html(result);
                $("#emma_select_campus_for_election_settings").html(result);
                $(".loadcampusforapplicants").html(result);
                $("#emmaloadcampaigncampus").html(result);
                $("#loadcampusforcampaign").html(result);
            }
        });

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/election/election_session.php',
            data:{
                institution: institution
            },
            success:function(session){
                $("#emma_get_election_settings_session").html(session);
                $(".loadsessionforapplicants").html(session);
                $("#emmaloadcampaignsession").html(session);
                $("#loadsessionforcampaign").html(session);

            }
        });

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/election/election_positions.php',
            data:{
                institution: institution
            },
            success:function(result){

                $("#emma_get_election_settings_positions").html(result);

                var count =  $('.emmacheckitems').html();

                $('.emmacheckitems').each(function(index, item) {
                    item.addEventListener("click", () => {
                        item.classList.toggle("checked");

                        let checked = document.querySelectorAll(".checked.emmacheckitems"),
                        btnText = document.querySelector(".btn-text");

                        if(checked && checked.length > 0 && checked && checked.length < 2){
                            btnText.innerText = `${checked.length} Postion Selected`;
                        }else if(checked && checked.length > 1 ){
                            btnText.innerText = `${checked.length} Positions Selected`;
                        }else{
                            btnText.innerText = "Select Positions";
                        }
                    });
                });
            }
        });

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/election/select_campus_image.php',
            data:{
                institution: institution
            },
            success:function(image){
                $("#emma_get_election_settings_classes").html(image);
                $(".keepcampaigntable").html(image);
            }
        });

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/election/image_for_applicants.php',
            data:{
                institution: institution
            },
            success:function(image){
                $(".keep_applicants_card").html(image);
            }
        });

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/election/filter_image_for_election_settings.php',
            data:{
                institution: institution
            },
            success:function(image){
                $(".loadelectionsettingstablehere").html(image);
            }
        })

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/election/display_delete_image_for_election_settings.php',
            data:{
                institution: institution
            },
            success:function(image){
                $(".emma_delete_image").html(image);
            }
        });

        $("#emmatotalpositions").html('<div class="spinner-border spinner-border-sm text-light" role="status"><span class="visually-hidden">Loading...</span></div>');

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/election/totalpositions.php',
            data:{
                institution: institution
            },
            success:function(result){
               $("#emmatotalpositions").html(result);
            }
        });

        $("#emmatotalappliedpositions").html('<div class="spinner-border spinner-border-sm text-light" role="status"><span class="visually-hidden">Loading...</span></div>');

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/election/totalapprovedappplicants.php',
            data:{
                institution: institution
            },
            success:function(result){
               $("#emmatotalappliedpositions").html(result);
            }
        });

        $("#emmatotalvotes").html('<div class="spinner-border spinner-border-sm text-light" role="status"><span class="visually-hidden">Loading...</span></div>');

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/election/totalvotes.php',
            data:{
                institution: institution
            },
            success:function(results){
               $("#emmatotalvotes").html(results);
            }
        });
    });

    const $selectBtn_one = $(".select-btn-one"),
        $itemsemmaone = $(".items");

    $('body').on('click','.select-btn-one, items', function(){
        $(this).toggleClass("open");
    });

    $('body').on('click','.select-btn_edit, items', function(){
    //     $(this).toggleClass("open");
    });

    $('body').on('click','.select-btn_one_edit, items', function(){
        //     $(this).toggleClass("open");
    });

    $('body').on('change','#emma_select_campus_for_election_settings',function(){

        var thiscampus = $(this).val();

        $(".loadelectionsettingstablehere").html('<div class="text-center text-primary"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/election/display_election_settings.php',
            data:{
                thiscampus: thiscampus
            },
            success:function(display){
                $(".loadelectionsettingstablehere").html(display);

                $('#myDataTable').DataTable({
                    responsive: true
                });
            }
        })
    });

    $('body').on('change','#emma_get_election_settings_campus',function(){
        
        var thisvalue = $(this).val();

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/election/get_classes_for_election.php',
            data:{
                campus: thisvalue
            },
            success:function(class_select){

                $("#emma_get_election_settings_classes").html(class_select);

                var classes_count =  $('.emmacheckitemsone').html();

               
                $('.emmacheckitemsone').each(function(index, item_one) {
                       

                    item_one.addEventListener("click", () => {
                        item_one.classList.toggle("checked");

                        let checked = document.querySelectorAll(".checked.emmacheckitemsone"),
                        btnText = document.querySelector(".btn-text-one");

                        if(checked && checked.length > 0 && checked && checked.length < 2){
                            btnText.innerText = `${checked.length} Class Selected`;
                        }else if(checked && checked.length > 1){
                            btnText.innerText = `${checked.length} Classes Selected`;
                        }else{
                            btnText.innerText = "Select Classes";
                        }
                    });
                });
            }
        })
    });

    $('body').on('click','.emma_election_settings_btn',function(){
        var campus = $("#emma_get_election_settings_campus").val();
        var session = $("#emma_get_election_settings_session").val();
        var positions = [];
        var classes_permitted = [];
        var election_title = $("#emma_get_election_settings_title").val();
        var election_season_start_date = $("#emma_get_election_settings_season_start_date").val();
        var election_season_end_date = $("#emma_get_election_settings_season_end_date").val();
        var election_day_date = $("#emma_get_election_settings_season_day").val();
        var election_campaign_start_date = $("#emma_get_election_settings_season_campaign_start_date").val();
        var election_campaign_end_date = $("#emma_get_election_settings_season_campaign_end_date").val();
        var student_average_limit = $("#emma_get_election_settings_student_average").val();
        var student_debt = $("#emma_get_debtors").val();

        $(".emmacheckitems.checked").each(function() {
            var election_positions = $(this).data('id');

            positions.push(election_positions);
        });

        $(".emmacheckitemsone.checked").each(function() {
            var election_classes = $(this).data('id');

            classes_permitted.push(election_classes);
        });

        if(campus == '' || campus == 'NULL'){
            $("#emma_get_election_settings_campus").css('border', '2px solid red');

            $.wnoty({
                type: 'warning',
                message: "Please Select Campus",
                autohideDelay: 5000
            });
        }else if(election_title == '' || election_title == 'NULL'){

            $("#emma_get_election_settings_campus").css('border', '2px solid green');
            $("#emma_get_election_settings_title").css('border', '2px solid red');

            $.wnoty({
                type: 'warning',
                message: "Add Election Title",
                autohideDelay: 5000
            });
        }else if(session == '' || session == 'NULL'){
            $("#emma_get_election_settings_campus").css('border', '2px solid green');
            $("#emma_get_election_settings_title").css('border', '2px solid green');
            $("#emma_get_election_settings_session").css('border', '2px solid red');

            $.wnoty({
                type: 'warning',
                message: "Please Select Session",
                autohideDelay: 5000
            });
        }else if(positions == '' || positions == 'NULL'){
            $("#emma_get_election_settings_campus").css('border', '2px solid green');
            $("#emma_get_election_settings_title").css('border', '2px solid green');
            $("#emma_get_election_settings_session").css('border', '2px solid green');
            $(".select-btn").css('border', '2px solid red');

            $.wnoty({
                type: 'warning',
                message: "Please Select Positions...",
                autohideDelay: 5000
            });

        }else if(classes_permitted == '' || classes_permitted == 'NULL'){
            $("#emma_get_election_settings_campus").css('border', '2px solid green');
            $("#emma_get_election_settings_title").css('border', '2px solid green');
            $("#emma_get_election_settings_session").css('border', '2px solid green');
            $(".select-btn").css('border', '2px solid green');
            $(".select-btn-one").css('border', '2px solid red');

            $.wnoty({
                type: 'warning',
                message: "Please Select Session",
                autohideDelay: 5000
            });

        }else if(election_season_start_date == '' || election_season_start_date == 'NULL'){
            $("#emma_get_election_settings_campus").css('border', '2px solid green');
            $("#emma_get_election_settings_title").css('border', '2px solid green');
            $("#emma_get_election_settings_session").css('border', '2px solid green');
            $(".select-btn").css('border', '2px solid green');
            $(".select-btn-one").css('border', '2px solid green');
            $("#emma_get_election_settings_season_start_date").css('border', '2px solid red');

            $.wnoty({
                type: 'warning',
                message: "Select Election Start Date",
                autohideDelay: 5000
            });
        }else if(election_season_end_date == '' || election_season_end_date == 'NULL'){
            $("#emma_get_election_settings_campus").css('border', '2px solid green');
            $("#emma_get_election_settings_session").css('border', '2px solid green');
            $(".select-btn").css('border', '2px solid green');
            $(".select-btn-one").css('border', '2px solid green');
            $("#emma_get_election_settings_title").css('border', '2px solid green');
            $("#emma_get_election_settings_season_start_date").css('border', '2px solid green');
            $("#emma_get_election_settings_season_end_date").css('border', '2px solid red');

            $.wnoty({
                type: 'warning',
                message: "Select Election End Date",
                autohideDelay: 5000
            });
        }else if(election_campaign_start_date == '' || election_campaign_start_date == 'NULL'){
            $("#emma_get_election_settings_campus").css('border', '2px solid green');
            $("#emma_get_election_settings_session").css('border', '2px solid green');
            $(".select-btn").css('border', '2px solid green');
            $(".select-btn-one").css('border', '2px solid green');
            $("#emma_get_election_settings_title").css('border', '2px solid green');
            $("#emma_get_election_settings_season_start_date").css('border', '2px solid green');
            $("#emma_get_election_settings_season_end_date").css('border', '2px solid green');
            $("#emma_get_election_settings_season_campaign_start_date").css('border', '2px solid red');

            $.wnoty({
                type: 'warning',
                message: "Select Campaign Start Date...",
                autohideDelay: 5000
            });
        }else if(election_campaign_end_date == '' || election_campaign_end_date == 'NULL'){
            $("#emma_get_election_settings_campus").css('border', '2px solid green');
            $("#emma_get_election_settings_session").css('border', '2px solid green');
            $(".select-btn").css('border', '2px solid green');
            $(".select-btn-one").css('border', '2px solid green');
            $("#emma_get_election_settings_title").css('border', '2px solid green');
            $("#emma_get_election_settings_season_start_date").css('border', '2px solid green');
            $("#emma_get_election_settings_season_end_date").css('border', '2px solid green');
            $("#emma_get_election_settings_season_campaign_start_date").css('border', '2px solid green');
            $("#emma_get_election_settings_season_campaign_end_date").css('border', '2px solid red');

            $.wnoty({
                type: 'warning',
                message: "Select Campaign End Date",
                autohideDelay: 5000
            });
        }else if(election_day_date == '' || election_day_date == 'NULL'){
            $("#emma_get_election_settings_campus").css('border', '2px solid green');
            $("#emma_get_election_settings_session").css('border', '2px solid green');
            $(".select-btn").css('border', '2px solid green');
            $(".select-btn-one").css('border', '2px solid green');
            $("#emma_get_election_settings_title").css('border', '2px solid green');
            $("#emma_get_election_settings_season_start_date").css('border', '2px solid green');
            $("#emma_get_election_settings_season_end_date").css('border', '2px solid green');
            $("#emma_get_election_settings_season_campaign_start_date").css('border', '2px solid green');
            $("#emma_get_election_settings_season_campaign_end_date").css('border', '2px solid green');
            $("#emma_get_election_settings_season_day").css('border', '2px solid red');

            $.wnoty({
                type: 'warning',
                message: "Select Election Day Date...",
                autohideDelay: 5000
            });
        }else if(student_average_limit == '' || student_average_limit == 'NULL'){
            $("#emma_get_election_settings_campus").css('border', '2px solid green');
            $("#emma_get_election_settings_session").css('border', '2px solid green');
            $(".select-btn").css('border', '2px solid green');
            $(".select-btn-one").css('border', '2px solid green');
            $("#emma_get_election_settings_title").css('border', '2px solid green');
            $("#emma_get_election_settings_season_start_date").css('border', '2px solid green');
            $("#emma_get_election_settings_season_end_date").css('border', '2px solid green');
            $("#emma_get_election_settings_season_day").css('border', '2px solid green');
            $("#emma_get_election_settings_season_campaign_start_date").css('border', '2px solid green');
            $("#emma_get_election_settings_season_campaign_end_date").css('border', '2px solid green');
            $("#emma_get_election_settings_student_average").css('border', '2px solid red');

            $.wnoty({
                type: 'warning',
                message: "Add Average Limit",
                autohideDelay: 5000
            });
            
        }else if(student_debt == '' || student_debt == 'NULL'){
            $("#emma_get_election_settings_campus").css('border', '2px solid green');
            $("#emma_get_election_settings_session").css('border', '2px solid green');
            $(".select-btn").css('border', '2px solid green');
            $(".select-btn-one").css('border', '2px solid green');
            $("#emma_get_election_settings_title").css('border', '2px solid green');
            $("#emma_get_election_settings_season_start_date").css('border', '2px solid green');
            $("#emma_get_election_settings_season_end_date").css('border', '2px solid green');
            $("#emma_get_election_settings_season_day").css('border', '2px solid green');
            $("#emma_get_election_settings_season_campaign_start_date").css('border', '2px solid green');
            $("#emma_get_election_settings_season_campaign_end_date").css('border', '2px solid green');
            $("#emma_get_election_settings_student_average").css('border', '2px solid green');
            $("#emma_get_debtors").css('border', '2px solid red');

            $.wnoty({
                type: 'warning',
                message: "Select YES or NO",
                autohideDelay: 5000
            });
        }else if(election_season_start_date >= election_season_end_date){

            $("#emma_get_election_settings_campus").css('border', '2px solid green');
            $("#emma_get_election_settings_session").css('border', '2px solid green');
            $(".select-btn").css('border', '2px solid green');
            $(".select-btn-one").css('border', '2px solid green');
            $("#emma_get_election_settings_title").css('border', '2px solid green');
            $("#emma_get_election_settings_season_start_date").css('border', '2px solid green');
            $("#emma_get_election_settings_season_end_date").css('border', '2px solid red');

            $.wnoty({
                type: 'warning',
                message: "Election End Date Must be Greater than Start Date",
                autohideDelay: 5000
            });
        }else if(election_campaign_start_date >= election_campaign_end_date){

            $("#emma_get_election_settings_campus").css('border', '2px solid green');
            $("#emma_get_election_settings_session").css('border', '2px solid green');
            $(".select-btn").css('border', '2px solid green');
            $(".select-btn-one").css('border', '2px solid green');
            $("#emma_get_election_settings_title").css('border', '2px solid green');
            $("#emma_get_election_settings_season_start_date").css('border', '2px solid green');
            $("#emma_get_election_settings_season_end_date").css('border', '2px solid green');
            $("#emma_get_election_settings_season_campaign_start_date").css('border', '2px solid green');
            $("#emma_get_election_settings_season_campaign_end_date").css('border', '2px solid red');

            $.wnoty({
                type: 'warning',
                message: "Campaign End Date Must be Greater than Campaign Start Date...",
                autohideDelay: 5000
            });

        }else if (!(election_day_date >= election_season_start_date && election_day_date <= election_season_end_date)) {
            $.wnoty({
                type: 'warning',
                message: "Election Day Must be between election season...",
                autohideDelay: 5000
            });
        }else{
            $("#emma_get_election_settings_campus").css('border', '2px solid green');
            $("#emma_get_election_settings_session").css('border', '2px solid green');
            $(".select-btn").css('border', '2px solid green');
            $(".select-btn-one").css('border', '2px solid green');
            $("#emma_get_election_settings_title").css('border', '2px solid green');
            $("#emma_get_election_settings_season_start_date").css('border', '2px solid green');
            $("#emma_get_election_settings_season_end_date").css('border', '2px solid green');
            $("#emma_get_election_settings_season_day").css('border', '2px solid green');
            $("#emma_get_election_settings_season_campaign_start_date").css('border', '2px solid green');
            $("#emma_get_election_settings_season_campaign_end_date").css('border', '2px solid green');
            $("#emma_get_election_settings_student_average").css('border', '2px solid green');
            $("#emma_get_debtors").css('border', '2px solid green');


            get_longitude_and_latitude(function(coordinates) {

                var latitude = coordinates.latitude;
                var longitude = coordinates.longitude;
                var userid = $("#user_id").val();
                var usertype = $("#user_type").val();

                $.ajax({
                    type:'POST',
                    url:'../../controller/scripts/owner/election/insert_election_settings.php',
                    data:{
                        campus: campus,
                        session: session,
                        positions: positions,
                        classes_permitted: classes_permitted,
                        election_title: election_title,
                        election_season_start_date: election_season_start_date,
                        election_season_end_date: election_season_end_date,
                        election_day_date: election_day_date,
                        election_campaign_start_date: election_campaign_start_date,
                        election_campaign_end_date: election_campaign_end_date,
                        student_average_limit: student_average_limit,
                        student_debt: student_debt,
                        latitude: latitude,
                        longitude: longitude,
                        userid: userid,
                        usertype: usertype
                    },
                    success:function(insert){

                        if(insert == 2){
                            $.wnoty({
                                type: 'success',
                                message: "Settings Applied Successfully...",
                                autohideDelay: 5000
                            });
                            $("#set_election").modal('hide');

                            $(".loadelectionsettingstablehere").html('<div class="text-center text-primary"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');

                            $.ajax({
                                type:'POST',
                                url:'../../controller/scripts/owner/election/display_election_settings.php',
                                data:{
                                    thiscampus: campus
                                },
                                success:function(display){
                                    $(".loadelectionsettingstablehere").html(display);

                                    $('#myDataTable').DataTable({
                                        responsive: true
                                    });
                                }
                            })
                        }else{
                            $.wnoty({
                                type: 'warning',
                                message: "Settings Already Exists...",
                                autohideDelay: 5000
                            });
                        }
                    }
                })
            });
        }
    });

    $('body').on('click','#emmaedit_election_settings',function(){
        var session = $(this).data('session');
        var data_id = $(this).data('id');
        var campus = $(this).data('campus');
        var positionsString = $(this).data('positions');
        var positionsArray = positionsString.split(',');
        var classesString = $(this).data('classes');
        var classesArray = classesString.split(',');
        var title = $(this).data('title');
        var average = $(this).data('average');
        var payment = $(this).data('payment');
        var electionseasonstartdate = $(this).data('electionseasonstartdate');
        var electionseasonenddate = $(this).data('electionseasonenddate');
        var electionday = $(this).data('electionday');
        var campaignstartdate = $(this).data('campaignstartdate');
        var campaignenddate = $(this).data('campaignenddate');

        $("#keepdataidforedit").val(data_id);
        $("#keepcampusidforedit").val(campus);
        $("#emma_get_election_settings_session_edit").val(session);
        $("#emma_get_election_settings_title_edit").val(title);
        $("#season_start_date_edit").val(electionseasonstartdate);
        $("#season_end_date_edit").val(electionseasonenddate);
        $("#election_day_date_edit").val(electionday);
        $("#campaign_start_date_edit").val(campaignstartdate);
        $("#campaign_end_date_edit").val(campaignenddate);
        $("#emma_get_election_settings_student_average_edit").val(average);
        $("#emma_get_debtors_edit").val(average);

        if (payment == 1 || payment == 2) {
            $('#emma_get_debtors_edit').find('option[value="' + payment + '"]').prop('selected', true);
        }

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/election/edit_settings_positions.php',
            data:{
                positionsArray: positionsArray
            },
            success:function(edit_positions){

               $("#emma_get_election_settings_positions_edit").html(edit_positions);

               var count_edit =  $('.emmacheckitems_edit').html();

                $('.emmacheckitems_edit').each(function(index, itemedit) {
                    itemedit.addEventListener("click", () => {
                        itemedit.classList.toggle("checked");

                        let checked = document.querySelectorAll(".checked.emmacheckitems_edit"),
                        btnText = document.querySelector(".btn-text_edit");

                        if(checked && checked.length > 0 && checked && checked.length < 2){
                            btnText.innerText = `${checked.length} Postion Selected`;
                        }else if(checked && checked.length > 1 ){
                            btnText.innerText = `${checked.length} Positions Selected`;
                        }else{
                            btnText.innerText = "Select Positions";
                        }
                    });
                });
            }
        })

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/election/get_classes_for_election_edit.php',
            data:{
                campus: campus,
                classesArray: classesArray
            },
            success:function(edit_classes){

               $("#emma_get_election_settings_classes_edit").html(edit_classes);

                var countone_edit =  $('.emmacheckitemsone_edit').html();

                $('.emmacheckitemsone_edit').each(function(index, item_one_edit) {
                    item_one_edit.addEventListener("click", () => {
                        item_one_edit.classList.toggle("checked");

                        let checked = document.querySelectorAll(".checked.emmacheckitemsone_edit"),
                        btnText = document.querySelector(".btn-text_one_edit");

                        if(checked && checked.length > 0 && checked && checked.length < 2){
                            btnText.innerText = `${checked.length} Class Selected`;
                        }else if(checked && checked.length > 1 ){
                            btnText.innerText = `${checked.length} Classes Selected`;
                        }else{
                            btnText.innerText = "Select Classes";
                        }
                    });
                });
            }
        })
    });

    $('body').on('click','.emmaeditelectionsettings',function(){
        $(".emmaeditelectionsettings").html('<div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>');

        var data_id = $("#keepdataidforedit").val();
        var campus_id = $("#keepcampusidforedit").val();
        var session = $("#emma_get_election_settings_session_edit").val();
        var title = $("#emma_get_election_settings_title_edit").val();
        var positions_edit = [];
        var classes_edit = [];
        var season_start_date_edit = $("#season_start_date_edit").val();
        var season_end_date_edit = $("#season_end_date_edit").val();
        var campaign_start_date_edit = $("#campaign_start_date_edit").val();
        var campaign_end_date_edit = $("#campaign_end_date_edit").val();
        var election_day_date_edit = $("#election_day_date_edit").val();
        var student_average_range_edit = $("#emma_get_election_settings_student_average_edit").val();
        var payment_permission = $("#emma_get_debtors_edit").val();

        
        $(".emmapositions_edit.checked").each(function() {

            var election_positions_edit = $(this).data('id');
            
            positions_edit.push(election_positions_edit);
        });

        $(".emmacheckitemsone_edit.checked").each(function() {

            var election_classses_edit = $(this).data('id');
            
            classes_edit.push(election_classses_edit);
        });

        get_longitude_and_latitude(function(coordinates) {

            var latitude = coordinates.latitude;
            var longitude = coordinates.longitude;
            var userid = $("#user_id").val();
            var usertype = $("#user_type").val();
            
            $.ajax({
                type:'POST',
                url:'../../controller/scripts/owner/election/update_election_settings.php',
                data:{
                    data_id: data_id,
                    campus_id: campus_id,
                    session: session,
                    title: title,
                    positions_edit: positions_edit,
                    classes_edit: classes_edit,
                    season_start_date_edit: season_start_date_edit,
                    season_end_date_edit: season_end_date_edit,
                    campaign_start_date_edit: campaign_start_date_edit,
                    campaign_end_date_edit: campaign_end_date_edit,
                    election_day_date_edit: election_day_date_edit,
                    student_average_range_edit: student_average_range_edit,
                    payment_permission: payment_permission,
                    latitude: latitude,
                    longitude: longitude,
                    userid: userid,
                    usertype: usertype
                },
                success:function(update_settings){
                    $(".emmaeditelectionsettings").html('<i class="fa fa-tasks"></i> Update');

                    if(update_settings == 1){
                        $.wnoty({
                            type: 'success',
                            message: "Settings Updated Successfully...",
                            autohideDelay: 5000
                        });
                        $("#modal_for_edit_settings").modal('hide');

                        $(".loadelectionsettingstablehere").html('<div class="text-center text-primary"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');

                        $.ajax({
                            type:'POST',
                            url:'../../controller/scripts/owner/election/display_election_settings.php',
                            data:{
                                thiscampus: campus_id
                            },
                            success:function(display){
                            
                
                                $(".loadelectionsettingstablehere").html(display);
                
                                $('#myDataTable').DataTable({
                                    responsive: true
                                });
                            }
                        })
                    }else{
                        $.wnoty({
                            type: 'warning',
                            message: "Settings Already Updated...",
                            autohideDelay: 5000
                        });
                    }
                }
            })
        });
    });


    $('body').on('click','#emmadelete_election_settings',function(){
        var data_id = $(this).data('id');
        var campus_id = $(this).data('campus');
        
        $(".keepsettingsdelete_dataid").val(data_id);
        $(".keepsettingsdelete_campusid").val(campus_id);
    });

    $('body').on('click','.emma_delete_election_settings',function(){
        
        var delete_dataid = $(".keepsettingsdelete_dataid").val();
        var delete_campusid = $(".keepsettingsdelete_campusid").val();

        get_longitude_and_latitude(function(coordinates){

            var latitude = coordinates.latitude;
            var longitude = coordinates.longitude;
            var userid = $("#user_id").val();
            var usertype = $("#user_type").val();

            $.ajax({
                type:'POST',
                url:'../../controller/scripts/owner/election/delete_election_settings.php',
                data:{
                    delete_dataid: delete_dataid,
                    delete_campusid: delete_campusid,
                    latitude: latitude,
                    longitude: longitude,
                    userid: userid,
                    usertype: usertype
                },
                success:function(delete_settings){

                    if(delete_settings == 1){
                        $.wnoty({
                            type: 'success',
                            message: "Settings Deleted Successfully...",
                            autohideDelay: 5000
                        });

                        $("#delete_election_settings").modal('hide');

                        $(".loadelectionsettingstablehere").html('<div class="text-center text-primary"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');

                        $.ajax({
                            type:'POST',
                            url:'../../controller/scripts/owner/election/display_election_settings.php',
                            data:{
                                thiscampus: delete_campusid
                            },
                            success:function(display){
                                $(".loadelectionsettingstablehere").html(display);
                
                                $('#myDataTable').DataTable({
                                    responsive: true
                                });
                            }
                        })
                    }else{

                    }
                }
            })

        });
    });


    $('body').on('change','.loadcampusforapplicants',function(){
        var campus_id = $(this).val();
        var session = $(".loadsessionforapplicants").val();

        if(session == '' || session == 'NULL'){

            $.wnoty({
                type: 'warning',
                message: "Please Select Session...",
                autohideDelay: 5000
            });

            $(".loadsessionforapplicants").css('border', '2px solid red');
            $(".loadpositionforapplicants").css('border', '2px solid red');
            $(".loadpositionforapplicants").css('display', 'block');
            $(".loadpositionforapplicants").text('No Record Found');

        }else{

            $(".loadpositionforapplicants").html("<option value='NULL'>Loading...</option>");

            $(".loadsessionforapplicants").css('border', '');

            $.ajax({
                type:'POST',
                url:'../../controller/scripts/owner/election/get_selected_positions.php',
                data:{
                    campus_id: campus_id,
                    session: session
                },
                success:function(positions){
                    $(".loadpositionforapplicants").html(positions);
                }
            })
        }
    });

    $('body').on('click','.load_election_applicants',function(){
        var campus_id = $(".loadcampusforapplicants").val();
        var session = $(".loadsessionforapplicants").val();
        var positions_id = $(".loadpositionforapplicants").val();

        if(campus_id == 'NULL' || campus_id == ''){

            $.wnoty({
                type: 'warning',
                message: "Please Select Campus...",
                autohideDelay: 5000
            });

            $(".loadcampusforapplicants").css('border', '2px solid red');

        }else if(session == 'NULL' || session == ''){

            $.wnoty({
                type: 'warning',
                message: "Please Select Session...",
                autohideDelay: 5000
            });

            $(".loadcampusforapplicants").css('border', '2px solid green');
            $(".loadsessionforapplicants").css('border', '2px solid red');

        }else if(positions_id == 'NULL'){

            $.wnoty({
                type: 'warning',
                message: "Please Select Position...",
                autohideDelay: 5000
            });

            $(".loadcampusforapplicants").css('border', '2px solid green');
            $(".loadsessionforapplicants").css('border', '2px solid green');
            $(".loadpositionforapplicants").css('border', '2px solid red');

        }else{

            $(".loadcampusforapplicants").css('border', '2px solid green');
            $(".loadsessionforapplicants").css('border', '2px solid green');
            $(".loadpositionforapplicants").css('border', '2px solid green');

            // $("").html(<div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>);
            $(".keep_applicants_card").html('<div class="text-center text-primary"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');

            $.ajax({
                type:'POST',
                url:'../../controller/scripts/owner/election/display-applicants.php',
                data:{
                    campus_id: campus_id,
                    session: session,
                    positions_id: positions_id
                },
                success:function(applicants){
                    $(".keep_applicants_card").html(applicants);
                }
            });
        }
    });

    $('body').on('click','.viewapplicantsdetails',function(){
        
        $(".view_applicantsdetails").html('<div class="text-center text-primary"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');

        var campus = $(this).data('campus');
        var session = $(this).data('session');
        var positionsid = $(this).data('positionsid');
        var studentid = $(this).data('studentid');
        var data_id = $(this).data('id');
        var status = $(this).data('status');
        var position_id = $(this).data('positionapplied');


        if (status == 1) {
            $(".approve_application").prop('disabled', true);
            $(".decline_application").prop('disabled', false);
        }else if(status == 2){
            $(".decline_application").prop('disabled', true);
            $(".approve_application").prop('disabled', false);
        }else{
            $(".decline_application").prop('disabled', false);
            $(".approve_application").prop('disabled', false);
        }

        $("#keepcampusforstatus").val(campus);
        $("#keepstudentidforstatus").val(studentid);
        $("#keepdataidforstatus").val(data_id);
        $("#keepstatus").val(status);
        $("#keepsession").val(session);
        $("#keeppositionid").val(position_id);


        
        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/election/view_student_details.php',
            data:{
                campus_id: campus,
                session: session,
                positions_id: positionsid,
                studentid: studentid
            },
            success:function(viewapplicants){
                $(".view_applicantsdetails").html(viewapplicants);
            }
        });
    });

    $('body').on('click','.approve_application',function(){
        $(".approve_application").html('<div class="spinner-border spinner-border-sm text-white" role="status"><span class="visually-hidden">Loading...</span></div>');

        var get_data_id = $("#keepdataidforstatus").val();
        var get_campus_id = $("#keepcampusforstatus").val();
        var get_student_id = $("#keepstudentidforstatus").val();
        var session = $("#keepsession").val();
        var position_id = $("#keeppositionid").val();

        get_longitude_and_latitude(function(coordinates){

            var latitude = coordinates.latitude;
            var longitude = coordinates.longitude;
            var userid = $("#user_id").val();
            var usertype = $("#user_type").val();

            $.ajax({
                type:'POST',
                url:'../../controller/scripts/owner/election/approve_application.php',
                data:{
                    get_data_id: get_data_id,
                    get_campus_id: get_campus_id,
                    get_student_id: get_student_id,
                    latitude: latitude,
                    longitude: longitude,
                    userid: userid,
                    usertype: usertype
                },
                success:function(approve){
                    $(".approve_application").html('<i class="fa fa-check"></i> Approve');

                    if(approve == 1){
                        $.wnoty({
                            type: 'success',
                            message: "Position Application Approved Successfully...",
                            autohideDelay: 5000
                        });
                        $("#view_applicants").modal('hide');

                        $(".keep_applicants_card").html('<div class="text-center text-primary"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');

                        $.ajax({
                            type:'POST',
                            url:'../../controller/scripts/owner/election/display-applicants.php',
                            data:{
                                campus_id: get_campus_id,
                                session: session,
                                positions_id: position_id
                            },
                            success:function(applicants){
                                $(".keep_applicants_card").html(applicants);
                            }
                        });

                    }else{
                        $.wnoty({
                            type: 'warning',
                            message: "Application Not Approved...",
                            autohideDelay: 5000
                        });
                    }
                }
            })
        });
    });
        
    $('body').on('click','.decline_application',function(){
        $(".decline_application").html('<div class="spinner-border spinner-border-sm text-white" role="status"><span class="visually-hidden">Loading...</span></div>');

        var get_data_id = $("#keepdataidforstatus").val();
        var get_campus_id = $("#keepcampusforstatus").val();
        var get_student_id = $("#keepstudentidforstatus").val();
        var session = $("#keepsession").val();
        var position_id = $("#keeppositionid").val();

        get_longitude_and_latitude(function(coordinates){

            var latitude = coordinates.latitude;
            var longitude = coordinates.longitude;
            var userid = $("#user_id").val();
            var usertype = $("#user_type").val();

            $.ajax({
                type:'POST',
                url:'../../controller/scripts/owner/election/decline_application.php',
                data:{
                    get_data_id: get_data_id,
                    get_campus_id: get_campus_id,
                    get_student_id: get_student_id,
                    latitude: latitude,
                    longitude: longitude,
                    userid: userid,
                    usertype: usertype
                },
                success:function(approve){
                    $(".decline_application").html('<i class="fa fa-times"></i> Decline');

                    if(approve == 1){
                        $.wnoty({
                            type: 'success',
                            message: "Position Application Declined Successfully ...",
                            autohideDelay: 5000
                        });
                        $("#view_applicants").modal('hide');

                        $(".keep_applicants_card").html('<div class="text-center text-primary"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');

                        $.ajax({
                            type:'POST',
                            url:'../../controller/scripts/owner/election/display-applicants.php',
                            data:{
                                campus_id: get_campus_id,
                                session: session,
                                positions_id: position_id
                            },
                            success:function(applicants){
                                $(".keep_applicants_card").html(applicants);
                            }
                        });

                    }else{
                        $.wnoty({
                            type: 'warning',
                            message: "Position Not Declined...",
                            autohideDelay: 5000
                        });
                    }
                }
            })
        });
    });


    $('body').on('click', '.campaignsettings', function() {
    
        var checkboxformessaging = $('.checkboxformessaging');
        var inputFieldformessaging = $('#messagingAmountInput');

        var checkboxfornewsflash = $('.checkboxfornewsflash');
        var inputFieldfornewsflash = $('#newsflashAmountInput');

        var checkboxforpopup = $('.checkboxforpopup');
        var inputFieldforpopup = $('#popupAmountInput');

        var checkboxforscroll = $('.checkboxforscroll');
        var inputFieldforscroll = $('#scrollAmountInput');

        var checkboxforwebsite = $('.checkboxforwebsite');
        var inputFieldforwebsite = $('#websiteAmountInput');

        var checkboxforloginpage = $('.checkboxforloginpage');
        var inputFieldforloginpage = $('#loginpageAmountInput');

        if (!checkboxformessaging.prop('checked')) {
            inputFieldformessaging.prop('disabled', true);
        } else {
            inputFieldformessaging.val('');
            inputFieldformessaging.prop('disabled', false);
        }

        if (!checkboxfornewsflash.prop('checked')) {
            inputFieldfornewsflash.prop('disabled', true);
        } else {
            inputFieldfornewsflash.val('');
            inputFieldfornewsflash.prop('disabled', false);
        }

        if (!checkboxforpopup.prop('checked')) {
            inputFieldforpopup.prop('disabled', true);
        }else{
            inputFieldforpopup.val('');
            inputFieldforpopup.prop('disabled', false);
        }

        if (!checkboxforscroll.prop('checked')) {
            inputFieldforscroll.prop('disabled', true);
        }else{
            inputFieldforscroll.val('');
            inputFieldforscroll.prop('disabled', false);
        }

        if (!checkboxforwebsite.prop('checked')) {
            inputFieldforwebsite.prop('disabled', true);
        }else{
            inputFieldforwebsite.val('');
            inputFieldforwebsite.prop('disabled', false);
        }

        if (!checkboxforloginpage.prop('checked')) {
            inputFieldforloginpage.prop('disabled', true);
        }else{
            inputFieldforloginpage.val('');
            inputFieldforloginpage.prop('disabled', false);
        }
    });

    // messaging 
    $('body').on('click', '#cardformessaging', function() {

        var checkboxformessaging = $('.checkboxformessaging');
        var inputField = $('#messagingAmountInput');

        if (!checkboxformessaging.prop('checked')) {

            checkboxformessaging.prop('checked', true);
            inputField.prop('disabled', false);
            
        } else {
            checkboxformessaging.prop('checked', false);
            inputField.val(''); 
            inputField.prop('disabled', true);
        }
    });

    // newsflash
    $('body').on('click', '#cardfornewsflash', function() {

        var checkboxfornewsflash = $('.checkboxfornewsflash');
        var inputFieldfornewsflash = $('#newsflashAmountInput');

        if (!checkboxfornewsflash.prop('checked')) {

            checkboxfornewsflash.prop('checked', true);
            inputFieldfornewsflash.prop('disabled', false);
            
        } else {
            checkboxfornewsflash.prop('checked', false);
            inputFieldfornewsflash.val(''); 
            inputFieldfornewsflash.prop('disabled', true);
        }
    });

    // card pop-up 
    $('body').on('click', '#cardforpopup', function() {

        var checkboxforpopup = $('.checkboxforpopup');
        var inputFieldforpopup = $('#popupAmountInput');

        if(!checkboxforpopup.prop('checked')){
      
            checkboxforpopup.prop('checked', true);
            inputFieldforpopup.prop('disabled', false);
            
        }else{
            checkboxforpopup.prop('checked', false);
            inputFieldforpopup.val('');
            inputFieldforpopup.prop('disabled', true);
        }
    });

    // scroll 
    $('body').on('click', '#cardforscroll', function() {

        var checkboxforscroll = $('.checkboxforscroll');
        var inputFieldforscroll = $('#scrollAmountInput');

        if(!checkboxforscroll.prop('checked')){
      
            checkboxforscroll.prop('checked', true);
            inputFieldforscroll.prop('disabled', false);
            
        }else{
            checkboxforscroll.prop('checked', false);
            inputFieldforscroll.val('');
            inputFieldforscroll.prop('disabled', true);
        }
    });

    // website
    $('body').on('click', '#cardforwebsite', function() {

        var checkboxforwebsite = $('.checkboxforwebsite');
        var inputFieldforwebsite = $('#websiteAmountInput');

        if(!checkboxforwebsite.prop('checked')){
      
            checkboxforwebsite.prop('checked', true);
            inputFieldforwebsite.prop('disabled', false);
            
        }else{
            checkboxforwebsite.prop('checked', false);
            inputFieldforwebsite.val('');
            inputFieldforwebsite.prop('disabled', true);
        }
    });

    // loginpage
    $('body').on('click', '#cardforloginpage', function() {

        var checkboxforloginpage = $('.checkboxforloginpage');
        var inputFieldforloginpage = $('#loginpageAmountInput');

        if(!checkboxforloginpage.prop('checked')){
      
            checkboxforloginpage.prop('checked', true);
            inputFieldforloginpage.prop('disabled', false);
            
        }else{
            checkboxforloginpage.prop('checked', false);
            inputFieldforloginpage.val('');
            inputFieldforloginpage.prop('disabled', true);
        }
    });

    $('body').on('click', '.savecampaignsettings', function() {
        var campaigncampus = $("#emmaloadcampaigncampus").val();
        var campaignsession = $("#emmaloadcampaignsession").val();
        var checkforloginpage = $('.checkboxforloginpage').is(':checked');
        var amountforloginpage = $('#loginpageAmountInput').val();
        var checkforwebsite = $('.checkboxforwebsite').is(':checked');
        var amountforwebsite = $('#websiteAmountInput').val();
        var checkforscroll = $('.checkboxforscroll').is(':checked');
        var amountforscroll = $('#scrollAmountInput').val();
        var checkforpopup = $('.checkboxforpopup').is(':checked');
        var amountforpopup = $('#popupAmountInput').val();
        var checkfornewsflash = $('.checkboxfornewsflash').is(':checked');
        var amountfornewsflash = $('#newsflashAmountInput').val();
        var checkformessaging = $('.checkboxformessaging').is(':checked');
        var amountformessaging = $('#messagingAmountInput').val();

        var campaign_settingstitle = [];
        var emmagetamount = [];

        $('.generaltitle_check').each(function() {
            if ($(this).is(':checked')) {
                campaign_settingstitle.push($(this).val());

                var emmagetamt_set =  $(this).data('index');

                $('.emmacampaignamounts'+ emmagetamt_set).each(function() {
                    emmagetamount.push($(this).val());
                });
            }
        });

        if(campaigncampus == '' || campaigncampus == 'NULL'){
            $.wnoty({
                type: 'warning',
                message: "Select Campus...",
                autohideDelay: 5000
            });
        }else if(campaignsession == '' || campaignsession == 'NULL'){
            $.wnoty({
                type: 'warning',
                message: "Select Session...",
                autohideDelay: 5000
            });
        }else if(checkforloginpage && !amountforloginpage){
            $.wnoty({
                type: 'warning',
                message: "Enter Login Amount...",
                autohideDelay: 5000
            });
        }else if(checkforwebsite && !amountforwebsite){
            $.wnoty({
                type: 'warning',
                message: "Enter Website Amount...",
                autohideDelay: 5000
            });
        }else if(checkforscroll && !amountforscroll){
            $.wnoty({
                type: 'warning',
                message: "Enter Scroll Amount...",
                autohideDelay: 5000
            });
        }else if(checkforpopup && !amountforpopup){
            $.wnoty({
                type: 'warning',
                message: "Enter Pop-Up Amount...",
                autohideDelay: 5000
            });
        }else if(checkfornewsflash && !amountfornewsflash){
            $.wnoty({
                type: 'warning',
                message: "Enter NewsFlash Amount...",
                autohideDelay: 5000
            });
        }else if(checkformessaging && !amountformessaging){
            $.wnoty({
                type: 'warning',
                message: "Enter Messaging Amount...",
                autohideDelay: 5000
            });
        }else if(amountforloginpage == '' && amountforwebsite == '' && amountforscroll == '' && amountforpopup == '' && amountfornewsflash == '' && amountformessaging == ''){
            $.wnoty({
                type: 'warning',
                message: "Select One At Least...",
                autohideDelay: 5000
            });
        }else{

            get_longitude_and_latitude(function(coordinates){

                var latitude = coordinates.latitude;
                var longitude = coordinates.longitude;
                var userid = $("#user_id").val();
                var usertype = $("#user_type").val();

                $.ajax({
                    type:'POST',
                    url:'../../controller/scripts/owner/election/insert_campaign_settings.php',
                    data:{
                        campaigncampus: campaigncampus,
                        campaignsession: campaignsession,
                        campaign_settingstitle: campaign_settingstitle,
                        emmagetamount: emmagetamount,
                        latitude: latitude,
                        longitude: longitude,
                        userid: userid,
                        usertype: usertype
                    },
                    success:function(campaign){
                        if(campaign == 1){
                            $.wnoty({
                                type: 'warning',
                                message: "Campaign Setting Already Exists...",
                                autohideDelay: 5000
                            });
                        }else if(campaign == 3){

                            $.wnoty({
                                type: 'success',
                                message: "Campaign Set Successfully...",
                                autohideDelay: 5000
                            });

                            $(".keepcampaigntable").html('<div class="text-center text-primary"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');

                            $.ajax({
                                type:'POST',
                                url:'../../controller/scripts/owner/election/campaigndisplay.php',
                                data:{
                                    campus: campaigncampus
                                },
                                success:function(displaycampaignsettings){
                                    $(".keepcampaigntable").html(displaycampaignsettings);
                                    $('#myDataTable').DataTable({
                                        responsive: true
                                    });
                                }
                            })

                        }else{
                            $.wnoty({
                                type: 'warning',
                                message: "Campaign Setting Already Exists...",
                                autohideDelay: 5000
                            });
                        }
                    }
                });
            });
        }
    });
    

    $('body').on('change','#loadcampusforcampaign',function(){
        var campus = $(this).val();
        
        if(campus == 'NULL'){

            $.wnoty({
                type: 'warning',
                message: "Please Select A Campus...",
                autohideDelay: 5000
            });

        }else{

            $(".keepcampaigntable").html('<div class="text-center text-primary"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');

            $.ajax({
                type:'POST',
                url:'../../controller/scripts/owner/election/campaigndisplay.php',
                data:{
                    campus: campus
                },
                success:function(displaycampaignsettings){
                    $(".keepcampaigntable").html(displaycampaignsettings);
                    $('#myDataTable').DataTable({
                        responsive: true
                    });
                }
            })
        }
    });


    $('body').on('click','#emmaedit_campaign_settings',function(){
       
        var amount = $(this).data('amount');
        var title = $(this).data('title');
        var campus = $(this).data('campus');
        var session = $(this).data('session');

        $("#campaign_page_title").val(title);
        $("#campaign_page_amount").val(amount);
        $(".campusidforcampaign").val(campus);
        $(".sessionidforcampaign").val(session);

    });

    $('body').on('click','.updatecampaignsettings',function(){

        $(".updatecampaignsettings").html('<div class="spinner-border spinner-border-sm text-white" role="status"><span class="visually-hidden">Loading...</span></div>');

        var campusid = $(".campusidforcampaign").val();
        var sessionname = $(".sessionidforcampaign").val();
        var campaigntitle = $("#campaign_page_title").val();
        var campaignamount = $("#campaign_page_amount").val();

        get_longitude_and_latitude(function(coordinates){

            var latitude = coordinates.latitude;
            var longitude = coordinates.longitude;
            var userid = $("#user_id").val();
            var usertype = $("#user_type").val();

            $.ajax({
                type:'POST',
                url:'../../controller/scripts/owner/election/editcampaign.php',
                data:{
                    campusid: campusid,
                    sessionname: sessionname,
                    campaigntitle: campaigntitle,
                    campaignamount: campaignamount,
                    latitude: latitude,
                    longitude: longitude,
                    userid: userid,
                    usertype: usertype
                },
                success:function(editcampaign){
                    $(".updatecampaignsettings").html('<i class="fas fa-edit"></i> Update');

                    if(editcampaign == 1){

                        $.wnoty({
                            type: 'success',
                            message: "Amount Edited Successfully...",
                            autohideDelay: 5000
                        });

                        $("#editcampaign").modal('hide');

                        $(".keepcampaigntable").html('<div class="text-center text-primary"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');

                        $.ajax({
                            type:'POST',
                            url:'../../controller/scripts/owner/election/campaigndisplay.php',
                            data:{
                                campus: campusid
                            },
                            success:function(displaycampaignsettings){
                                $(".keepcampaigntable").html(displaycampaignsettings);
                                $('#myDataTable').DataTable({
                                    responsive: true
                                });
                            }
                        })

                    }else{

                        $.wnoty({
                            type: 'warning',
                            message: "Amount Not Edited...",
                            autohideDelay: 5000
                        });
                    }
                }
            })
        });
    });
