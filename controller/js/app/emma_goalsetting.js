
    $(document).ready(function(){
        $('.mymce').summernote();

        var emma_institution = $(".abba-change-institution").val();

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_goalsetting/emma_get_campus.php',
            data:{emma_institution:emma_institution},
            success:function(outcome){
                $(".emmaloadcampusforgoalsetting").html(outcome);
                $("#emma_load_campus_for_goals").html(outcome);
            }
        });
    
        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_goalsetting/emma_display_filter.php',
            data:{emma_institution:emma_institution},
            success:function(outcome){
                $(".emmaloadallgoalscard").html(outcome);
            }
        })
    });

    function emma_load_cards(){
        $(".emmaloadallgoalscard").html('<div align="center"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>');

        var emmaloadcampus = $("#emma_load_campus_for_goals").val();

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_goalsetting/emma_display_all_cards.php',
            data:{emmaloadcampusforgoalsetting: emmaloadcampus},
            success:function(outcome){
                $(".emmaloadallgoalscard").html(outcome);
            }
        });
    }

    function emma_load_cards_create(){
        $(".emmaloadallgoalscard").html('<div align="center"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>');

        var emmaloadcampus = $(".emmaloadcampusforgoalsetting").val();

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_goalsetting/emma_display_all_cards.php',
            data:{emmaloadcampusforgoalsetting: emmaloadcampus},
            success:function(outcome){
                $(".emmaloadallgoalscard").html(outcome);
            }
        });
    }

        
    $("body").on("click",".visionbutton",function(){
        var whatsyourvision = $(".textareaforvision").val();

        if(whatsyourvision == ''){
            $.wnoty({
                type: 'warning',
                message: "Set your Vision",
                autohideDelay: 5000
            });
        }else{
            $("#emmasetvision").modal("hide");
            $("#filtermodalforsettinggoal").modal("show");
        }
    })

    function addNewCardgoal() {
        var emmagoalimageinput = parseInt($(".emmagoalimageinput").val())+1;
    
        var emmaloadgoaladdnew =
        `<div class="border mt-4 emmatitleandamount" style="border-radius:3px;">
            <div align="end" class="p-1">
                <div class="form-group">
                    <i class="fa fa-times removeicon fs-6 text-danger" style="cursor:pointer;"></i>
                </div>
            </div>
            <div class="col-12 mb-2">
                <div class="form-floating ">
                    <select class="form-select emmanumberofyears" style="font-size: 13px; height: 50px;border: none; border-bottom: #b3b3b3 solid 1px;" id="floatingSelect" aria-label="Floating label select example">
                        <option value="NULL" selected>No. of Years</option>
                        <option value="1"> 1 </option>
                        <option value="2"> 2 </option>
                        <option value="3"> 3 </option>
                        <option value="4"> 4 </option>
                        <option value="5"> 5 </option>
                        <option value="6"> 6 </option>
                        <option value="7"> 7 </option>
                        <option value="8"> 8 </option>
                        <option value="9"> 9 </option>
                        <option value="10"> 10 </option>
                    </select>
                    <label for="floatingSelect">No. of Years</label>
                </div>
            </div>
            <div class="col-12 mb-2 ps-2 pe-2 mt-4">
            <div class="abba_local-forms">
                <label>Goal Title<span style="color:orangered;">*</span></label>
                <input type="text" class="form-control emma_title_for_goal" id="" placeholder="Goal Title">
            </div>
        </div>
        <div class="col-12 mb-2 ps-2 pe-2">
            <div class="abba_local-forms  mt-4">
                <label>Goal Amount<span style="color:orangered;">*</span></label>
                <input type="number" class="form-control emma_amount_for_goal" id="" placeholder="Goal Amount">
            </div>
        </div>
        <div class="col-12 mb-2 ps-2 pe-2">
            <div class="abba_local-forms mt-4">
                <label>Upload Goal Image(optional)<span style="color:orangered;">*</span></label>
                <input type="file" class="form-control pb-3 pt-3 ps-4 emma_goalsetting_image" data-id="`+emmagoalimageinput+`" id="" placeholder="Upload Image (optional)" accept="image/jpeg, image/jpg, image/png, image/JPG, image/JPEG, image/PNG">
            </div>
        </div>
        <textarea hidden="hidden" class="emma_keepgoalimage emmaloadgoalimage`+emmagoalimageinput+`"></textarea>
        </div>`;

        $(".loadaddnewcardhere").append(emmaloadgoaladdnew);
        $(".emmagoalimageinput").val(emmagoalimageinput);
        $(".removeicon").click(function () {
            $(this).closest('.emmatitleandamount').fadeOut("slow", function () {
                $(this).remove();
            });
        });
    }

    $("body").on("click",".emma_add_new_goal",function(){
        addNewCardgoal();
    });


    $("body").on("change", ".emma_goalsetting_image", function() {
        var getthisimagedataid = $(this).data('id');
        var fileInput = this.files[0];
        var reader = new FileReader();

        reader.onload = function(event) {
            var base64Image = event.target.result;
            $(".emmaloadgoalimage"+getthisimagedataid).val(base64Image);
        };
        reader.readAsDataURL(fileInput);
    });

    function addnewinputaction(addmoredataid){
        var emmaloadinputforactions = 
        `<div class="actioninput">
            <div align="end" class="p-1">
                <div class="form-group">
                    <i class="fa fa-times remove_icon fs-6 text-danger" style="cursor:pointer;"></i>
                </div>
            </div>
            <div class="abba_local-forms">
                <label>Actions<span style="color:orangered;">*</span></label>
                <input type="text" class="form-control emma_actions_for_create emma_add_new_for_todo` + addmoredataid+`" id="" placeholder="Actions">
            </div>
        </div>`;

        $(".emmadisplayinputcontentforactions" + addmoredataid).append(emmaloadinputforactions);

        $(".remove_icon").click(function () {
            $(this).closest('.actioninput').fadeOut("slow", function () {
                $(this).remove();
            });
        });
    }

    $("body").on("click",".emma_add_new_action",function(){
        var addmoredataid = $(this).data('id');
        addnewinputaction(addmoredataid);
    });

    $("body").on("click",".emmasubmitgoalbutton",function(){
        $(".emmasubmitgoalbutton").html('<div align="center"><div class="spinner-border text-white spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div></div>');

        var emma_get_campus = $(".emmaloadcampusforgoalsetting").val();
        var emma_get_image_for_goal = [];
        var emma_get_number_of_years = [];
        var emma_get_goal_title = [];
        var emma_get_goal_amount = [];

        $.each($(".emma_keepgoalimage"), function () {
            var emmagetgoalimage = $(this).val();

            if (emmagetgoalimage == 'NULL' || emmagetgoalimage == '') {
                emma_get_image_for_goal.push('');
            } else {
                emma_get_image_for_goal.push($(this).val()+'###');
            }
        });

        $.each($(".emma_title_for_goal"), function () {
            var emmagetgoaltitle = $(this).val();

            if (emmagetgoaltitle == 'NULL' || emmagetgoaltitle == '') {
                emma_get_goal_title.push('');
            } else {
                emma_get_goal_title.push($(this).val());
            }
        });

        $.each($(".emma_amount_for_goal"), function () {
            var emmagetgoalamount = $(this).val();

            if (emmagetgoalamount == 'NULL' || emmagetgoalamount == '') {
                emma_get_goal_amount.push('');
            } else {
                emma_get_goal_amount.push($(this).val());
            }
        });

        $.each($(".emmanumberofyears"), function () {
            var numofyrs = $(this).val();

            if (numofyrs == 'NULL' || numofyrs == '') {
                emma_get_number_of_years.push('');
            } else {
                emma_get_number_of_years.push($(this).val());
            }
        });

        if(emma_get_campus == '' || emma_get_campus == 'NULL'){

            $.wnoty({
                type: 'warning',
                message: "Please Select Campus",
                autohideDelay: 5000
            });
        }else if(emma_get_number_of_years == '' || emma_get_number_of_years == 'NULL'){

            $.wnoty({
                type: 'warning',
                message: "Select No. of years",
                autohideDelay: 5000
            });
        }else if(emma_get_goal_title == '' || emma_get_goal_title == 'NULL'){

            $.wnoty({
                type: 'warning',
                message: "Add Goal Title",
                autohideDelay: 5000
            });

        }else if(emma_get_goal_amount == '' || emma_get_goal_amount == 'NULL'){
            $.wnoty({
                type: 'warning',
                message: "Add Goal Amount",
                autohideDelay: 5000
            });
        }else{
            // var datastring = "goalcampus=" + emma_get_campus + "&goalnumofyears=" + emma_get_number_of_years + "&goalimage=" + emma_get_image_for_goal + 
            // "&goaltitle=" + emma_get_goal_title + "&goalamount=" + emma_get_goal_amount;
        
            emma_get_goal_title = emma_get_goal_title.toString();
            emma_get_goal_amount = emma_get_goal_amount.toString();
            emma_get_number_of_years = emma_get_number_of_years.toString();
            emma_get_image_for_goal = emma_get_image_for_goal.toString();

            $.ajax({
                type:'POST',
                url:'../../controller/scripts/owner/emma_goalsetting/emma_send_goal_values.php',
                // data:datastring,
                data:{
                    goalcampus: emma_get_campus,
                    goalnumofyears: emma_get_number_of_years,
                    goalimage: emma_get_image_for_goal,
                    goaltitle: emma_get_goal_title,
                    goalamount: emma_get_goal_amount
                },
                success:function(display){

                    $(".emmasubmitgoalbutton").html('Submit');

                    $(".emmaloadgoalcontent").html(display);
                    $("#emmaloadcontent").modal('show');
                    $("#filtermodalforsettinggoal").modal('hide');

                    $('.emmageneralselectcollasible').click(function(event) {
                        var emmanewid = $(this).data('id');
                        var prosinfortoggle = $('.emmainputfortogglecontent'+emmanewid).val();
                
                        if (prosinfortoggle === '0') {

                            $('.emmaopencollapsiblehere'+emmanewid).show('slow');
                            $('.emmainputfortogglecontent'+emmanewid).val(1);

                        } else {

                            $('.emmaopencollapsiblehere'+emmanewid).hide('slow');
                            $('.emmainputfortogglecontent'+emmanewid).val(0);
                    
                        }
                    });
                }
            });
        }
    });

    $("body").on("click", ".emma_insert_for_goal", function (){

        $(".emma_insert_for_goal").html('<div align="center"><div class="spinner-border text-white spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div></div>');
        var setvision = $(".textareaforvision").val();
        var emma_get_campus = $(".emmaloadcampusforgoalsetting").val();
        

        var jsonData = [];

        isEmpty = false;

        $(".emma_actions_for_create").each(function () {
            if ($(this).val().trim() === '') {
                isEmpty = true;
                return false;
            }
        });

        if (isEmpty) {
            $.wnoty({
                type: 'warning',
                message: "Leave No Review Input Empty",
                autohideDelay: 5000
            });
            return; // exit the function if any input is empty
        }

        $(".emmaloadgoatitle").each(function () {
            var title = $(this).val();
            var data_id = $(this).data('id');
            var amount = $('.emmaloadgoalamount'+data_id).val();
            var image = $('.emmaloadgoalimage'+data_id).text();
            var totalyears = $('.emmaloadgoaltitle'+data_id).val();

            var goalData = {
                title: title,
                data_id: data_id,
                amount: amount,
                image: image,
                totalyears: totalyears,
                yearly_goals: []
            };

            $(".emma_class_per_year"+data_id).each(function () {
                var data_id_new = $(this).data('id');
                var year = $('.emmaloadperyear'+data_id_new).val();
                var pyear_amt = $('.emmaloadperamount'+data_id_new).val();
            
                var yearlyGoal = {
                    year: year,
                    pyear_amt: pyear_amt,
                    todos: []
                };

                $(".emma_add_new_for_todo"+data_id_new).each(function () {
                    var todo_val = $(this).val();

                    yearlyGoal.todos.push(todo_val);
                });

                goalData.yearly_goals.push(yearlyGoal);
            });

            jsonData.push(goalData);
        });

        var jsonString = JSON.stringify(jsonData);

        get_longitude_and_latitude(function(coordinates) {
            var latitude = coordinates.latitude;
            var longitude = coordinates.longitude;
            var userid = $("#user_id").val();
            var usertype = $("#user_type").val();

            $.ajax({
                url: '../../controller/scripts/owner/emma_goalsetting/emma_insert_vision_and_goals.php',
                type: 'POST',
                data: { setvision: setvision,
                        emma_get_campus: emma_get_campus,
                        jsonString: jsonString,
                        latitude: latitude,
                        longitude: longitude,
                        userid: userid,
                        usertype: usertype
                },
                success: function(response) {
                    // alert(response);
                    if(response == 2)
                    {
                        $.wnoty({
                            type: 'warning',
                            message: "Goal Not Created",
                            autohideDelay: 5000
                        });
                    }
                    else
                    {
                        $(".emmaloadgoalid").val(response);
                        $("#emmaloadcontent").modal('hide');
                        $("#visionboardmodal").modal('show');
                    }
                    $(".emma_insert_for_goal").html('Set Goal');
                    emma_load_cards_create();
                }
            });
        });
    });

    $('#visionboardmodal').on('shown.bs.modal', function () {

        $(".displayvisionboard").html('<div align="center"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>');

        var emma_get_campus = $(".emmaloadcampusforgoalsetting").val();
        var setdataid = $(".emmaloadgoalid").val();

        var datastring = "campusdisplay=" + emma_get_campus + "&setdataid=" + setdataid;

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_goalsetting/emmadisplaygoalsonvisionboard.php',
            data:datastring,
            success:function(display){
                $(".displayvisionboard").html(display);
                emma_load_cards();

            }
        })
    });

    $("body").on("click", "#emma_download_after_create", function () { 
    
        const element = document.getElementById("vision_content_after_create");

        const options = {
        filename: "vision.pdf",
        };

        // Generate the PDF with html2pdf and save it with the specified filename
        html2pdf().from(element).set(options).save();

        $("#visionboardmodal").modal('hide');
    });

    $("body").on("click", ".emma_edit_goals", function(){

        var edit_data_id = $(this).data('id');
        var edit_data_title = $(this).data('title');
        var edit_data_amount = $(this).data('amount');
        var edit_data_image = $(this).data('image');
        var edit_data_total_years = $(this).data('years');
        var edit_data_vision_statement = $(this).data('statement');
    
        $(".loadeditdataid").val(edit_data_id);
        $("#emmaeditgoaltitle").val(edit_data_title);
        $("#emmaeditgoalamount").val(edit_data_amount);
        $("#edittextareaforvision").summernote('code', edit_data_vision_statement);
        $("#emmaeditgoalimage").val(edit_data_image);
        $("#emmaeditgoalyears").val(edit_data_total_years);
    });

    function addnewinputactionforedit(addmoredataidforedit){
        var emmaloadinputforactionsforedit = 
        `<div class="actioninputedit">
            <div align="end" class="p-1">
                <div class="form-group">
                    <i class="fa fa-times remove_icon fs-6 text-danger" style="cursor:pointer;"></i>
                </div>
            </div>
            <div class="abba_local-forms">
                <label>Actions<span style="color:orangered;">*</span></label>
                <input type="text" class="form-control emma_remove_characters_for_action_create emma_add_new_for_todo_for_edit` + addmoredataidforedit+`" id="" placeholder="Actions">
            </div>
        </div>`;

        $(".emmadisplayinputcontentforactions_for_edit" + addmoredataidforedit).append(emmaloadinputforactionsforedit);

        $(".remove_icon").click(function () {
            $(this).closest('.actioninputedit').fadeOut("slow", function () {
                $(this).remove();
            });
        });
    }

    $("body").on("click",".emma_add_new_action_for_edit",function(){
        var addmoredataidforedit = $(this).data('id');
        addnewinputactionforedit(addmoredataidforedit);
    });

    document.getElementById("emmaeditgoalyears").addEventListener("keypress", function(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        var inputValue = this.value + String.fromCharCode(charCode);
    
        // Check if input is a number between 1 and 10 and has no more than 2 digits
        if (/^\d{0,2}$/.test(inputValue) && parseInt(inputValue) >= 1 && parseInt(inputValue) <= 10) {
            return true;
        } else {
            evt.preventDefault();
            return false;
        }
    });

    $("body").on("change", "#emma_load_campus_for_goals", function(){

        $(".emmaloadallgoalscard").html('<div align="center"><div class="spinner-border text-primary spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');
    
        var emmaloadcampus = $(this).val();
    
        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_goalsetting/emma_display_all_cards.php',
            data:{emmaloadcampusforgoalsetting: emmaloadcampus},
            success:function(outcome){
                $(".emmaloadallgoalscard").html(outcome);
            }
        });
    });

    $("body").on("click", ".edit_next", function(){
        $(".edit_next").html('<div class="spinner-border text-white spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>');
        var goal_id = $(".loadeditdataid").val();
        var goal_title = $("#emmaeditgoaltitle").val();
        var goal_amount = $("#emmaeditgoalamount").val();
        var goal_image = $("#emmaeditgoalimage").val();
        var goal_years = $("#emmaeditgoalyears").val();
        var goal_vision_statement = $("#edittextareaforvision").val();

        $(".loadgoalmodaleditcontent").html('<div class="text-center text-primary"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');

       
            $.ajax({
                type:'POST',
                url:'../../controller/scripts/owner/emma_goalsetting/emma_first_goal_edit.php',
                data:{
                    goal_id: goal_id,
                    goal_title: goal_title,
                    goal_amount: goal_amount,
                    goal_image: goal_image,
                    goal_years: goal_years,
                    goal_vision_statement: goal_vision_statement,
                },
                success:function(output){
                    $(".edit_next").html('Next');
                    $(".loadgoalmodaleditcontent").html(output);
                    $('.emmageneralselectcollasiblefor_edit').click(function(event) {
                        var emmaneweditid = $(this).data('id');
                        var emmaopencollapsiblehere = $('.emmaopencollapsibleherefor_edit'+emmaneweditid);
                        
                        if (emmaopencollapsiblehere.is(":visible")) {
                            emmaopencollapsiblehere.hide('slow');
                        } else {
                            emmaopencollapsiblehere.show('slow');
                        }
                    });
                }
            })
        // });
    });

    $("body").on('click','.edit_next_two',function(){
        var editgoalid = $(".editgoalid").val();
        var editvisionstatement = $(".editgoalstatement").val();
        var emma_get_campus_for_edit =  $(".emmaloadcampusforgoalsetting").val();
        var jsonData = [];

        var isEmpty = false;

        $(".emma_remove_characters_for_action_create").each(function () {
            if ($(this).val().trim() === '') {
                isEmpty = true;
                return false;
            }
        });

        if (isEmpty) {
            $.wnoty({
                type: 'warning',
                message: "Leave No Review Input Empty",
                autohideDelay: 5000
            });
            return;
        }

        $(".edit_next_two").html('<div class="spinner-border text-white spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>');
        
        $(".editgoaltitle").each(function () {
            var title = $(this).val();
            var amount = $('.editgoalamount').val();
            var image = $('.editgoalimage').text();
            var totalyears = $('.editgoalyears').val();

            var goalData = {
                title: title,
                amount: amount,
                image: image,
                totalyears: totalyears,
                yearly_goals: []
            };

            $(".emma_class_per_year_for_edit").each(function () {
                var data_id_new = $(this).data('id');
                var year = $('.emmaloadperyearforedit'+data_id_new).val();
                var pyear_amt = $('.emmaloadperamountforedit'+data_id_new).val();
                
                var yearlyGoal = {
                    year: year,
                    pyear_amt: pyear_amt,
                    todos: []
                };

                $(".emma_add_new_for_todo_for_edit"+data_id_new).each(function () {
                    var todo_val = $(this).val();
                    yearlyGoal.todos.push(todo_val);
                });

                goalData.yearly_goals.push(yearlyGoal);
            });

            jsonData.push(goalData);
        });

        var jsonString = JSON.stringify(jsonData);
        
            get_longitude_and_latitude(function(coordinates) {
                var latitude = coordinates.latitude;
                var longitude = coordinates.longitude;
                var userid = $("#user_id").val();
                var usertype = $("#user_type").val();

                $.ajax({
                type:'POST',
                url:'../../controller/scripts/owner/emma_goalsetting/emma_edit_for_goalandvision.php',
                data:{
                    editgoalid: editgoalid,
                    editvisionstatement: editvisionstatement,
                    emma_get_campus_for_edit: emma_get_campus_for_edit,
                    jsonString: jsonString,
                    latitude:latitude,
                    longitude:longitude,
                    userid:userid,
                    usertype:usertype
                },
                success:function(edit){
              
                    if(edit == ''){
                        $.wnoty({
                            type: 'success',
                            message: "Goal Edited Successfully",
                            autohideDelay: 5000
                        });
                        $("#editgoaltwo").modal('hide');
                        emma_load_cards();
                    }else{
                        $.wnoty({
                            type: 'warning',
                            message: "Goal Not Edited",
                            autohideDelay: 5000
                        });
                    }
                }
            })
        });
    });

    $("body").on('click','.emma_goal_view_icon',function(){
        var goalview_data_id = $(this).data('id');
        var goalview_campus_id = $("#emma_load_campus_for_goals").val();

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_goalsetting/emma_view_goals.php',
            data:{
                goalview_data_id: goalview_data_id,
                goalview_campus_id: goalview_campus_id
            },
            success:function(view){
                $(".emma_load_goal_view_contents").html(view);
            }
        });
    });

    $("body").on('click','.emma_goal_review_icon',function(){
        var review_data_id = $(this).data('id');
        var review_campus_id = $("#emma_load_campus_for_goals").val();


        $(".emma_load_goal_review_contents").html('<div align="center"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>');
        $(".loadreviewid").val(review_data_id);

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_goalsetting/emma_review_goals.php',
            data:{
                review_data_id: review_data_id,
                review_campus_id: review_campus_id
            },
            success:function(review){

                $(".emma_load_goal_review_contents").html(review);

                $('.add_new_review_collapible').click(function(event) {
                    var emmanewidforreview = $(this).data('id');
                    var emmainfortoggle = $('.emmainputfortogglecontentreview'+emmanewidforreview).val();

                    if (emmainfortoggle === '0') {

                        $('.emmmtoggleclassreview'+emmanewidforreview).show('slow');
                        $('.emmainputfortogglecontentreview'+emmanewidforreview).val(1);

                    } else {

                        $('.emmmtoggleclassreview'+emmanewidforreview).hide('slow');
                        $('.emmainputfortogglecontentreview'+emmanewidforreview).val(0);
                
                    }
                });

                $(".emma_review_card").each(function () {
                    var data_idgotten = $(this).data('id');

                    var itemslength = $(".check_eachaction"+data_idgotten).length;
    
                    var emmagetcheckedleng = $(".check_eachaction"+data_idgotten + ':checked').length;
                
                    if(emmagetcheckedleng == itemslength ){
                        $(".checkallactions"+data_idgotten).prop('checked', true); 
                    }else{
                        $(".checkallactions"+data_idgotten).prop('checked', false); 
                    }

                });
            }
        })
    });

    function addnewreview(addmore_reviewdataid){
        var emmaloadinputforreviews = 
        `<div class="reviewinput">
            <div align="end" class="p-1">
                <div class="form-groups">
                    <i class="fa fa-times remove_icon_for_reviews fs-6 text-danger" style="cursor:pointer;"></i>
                </div>
            </div>
            <div class="abba_local-forms">
                <label>Reviews<span style="color:orangered;">*</span></label>
                <input type="text" class="form-control  emma_add_new_reviews emma_get_all_reviews emma_goal_reviews_input`+ addmore_reviewdataid+`" id="" placeholder="Reviews">
            </div>
        </div>`;

        $(".emmaloadreviewscontent" + addmore_reviewdataid).append(emmaloadinputforreviews);

        $(".remove_icon_for_reviews").click(function () {
            $(this).closest('.reviewinput').fadeOut("slow", function () {
                $(this).remove();
            });
        });
    }

    $("body").on("click",".emma_add_new_reviews",function(){
        var addmore_reviewdataid = $(this).data('id');

        addnewreview(addmore_reviewdataid);
    });
    
    $("body").on("change","#checkall_actions",function(){
        var data_action_id = $(this).data('id');
        
        if($(this).is(':checked')) {
            $(".check_eachaction"+data_action_id).prop('checked', true);
        }else{
            $(".check_eachaction"+data_action_id).prop('checked', false);
        }
    });

    $("body").on("change",".emmacheckboxforeachaction",function(){
        var emmagetdataidforgoallenght = $(this).data('id');
    
        var itemslength = $(".check_eachaction"+emmagetdataidforgoallenght).length;
    
        var emmagetcheckedleng = $(".check_eachaction"+emmagetdataidforgoallenght + ':checked').length;
    
        if(emmagetcheckedleng == itemslength ){
            $(".checkallactions"+emmagetdataidforgoallenght).prop('checked', true); 
        }else{
            $(".checkallactions"+emmagetdataidforgoallenght).prop('checked', false); 
        }
    });

    $("body").on("click", ".save_reviews_for_goal", function () {
        $(".save_reviews_for_goal").html('<div class="spinner-border text-white spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>');


        var user_data_id = $("#user_id").val();
        var loadreviewid = $(".loadreviewid").val();
        var emma_institution = $(".abba-change-institution").val();
        var emma_goal_id_for_messaging = $(".emma_goal_id_for_messaging").val();
        var jsonData = [];

        var isEmpty = false;

        $(".emma_get_all_reviews").each(function () {
            if ($(this).val().trim() === '') {
                isEmpty = true;
                return false;
            }
        });

        if (isEmpty) {
            $.wnoty({
                type: 'warning',
                message: "Add Review and leave no input Empty",
                autohideDelay: 5000
            });
            return;
        }
    
        $(".emma_review_card").each(function () {
            var data_id = $(this).data('id');
            var yearlyGoal = {
                data_id: data_id,
                actions_review: [],
                review: []
            };

            $(".check_eachaction" + data_id).each(function () {
                if ($(this).is(":checked")) {
                    yearlyGoal.actions_review.push($(this).val());
                } else {
                    yearlyGoal.actions_review.push('');
                }
            });

            $(".emma_goal_reviews_input" + data_id).each(function () {
                var reviews = $(this).val();
                yearlyGoal.review.push(reviews);
            });

            jsonData.push(yearlyGoal);
        });
    
        var jsonString = JSON.stringify(jsonData);
    
        $.ajax({
            type: 'POST',
            url: '../../controller/scripts/owner/emma_goalsetting/emma_review.php',
            data: {
                loadreviewid: loadreviewid,
                user_data_id: user_data_id,
                emma_institution: emma_institution,
                emma_goal_id_for_messaging: emma_goal_id_for_messaging,
                jsonString: jsonString
            },
            success: function (review_output) {
                // (review_output);alert
                $(".save_reviews_for_goal").html('<i class="fas fa-save"> Save</i>');
                if(review_output == 1){
                    $.wnoty({
                        type: 'success',
                        message: "Review Updated Successfully",
                        autohideDelay: 5000
                    });
                    $("#emmareviewgoals").modal('hide');
                    $(".emma_goal_reviews_input" + data_id).each(function () {
                        var reviews = $(this).val();
                        $(".emma_goal_reviews_input" + data_id).val(reviews);
                        
                    });
                }else if(review_output == 2){
                    $.wnoty({
                        type: 'warning',
                        message: "Review Already Exists",
                        autohideDelay: 5000
                    });
                   
                }else{
                    $.wnoty({
                        type: 'warning',
                        message: "Review Not Updated",
                        autohideDelay: 5000
                    });
                }
            }
        });
    });

    $("body").on("click", ".emma_delete_goals", function() {
        var thisdataid = $(this).data('id');
        var thisdatacampus = $(this).data('campus');


        $(".reviewdataid").val(thisdataid);
        $(".reviewdatacampus").val(thisdatacampus);
    });

    $("body").on("click", ".deletegoalsbutton", function() {

        $(".deletegoalsbutton").html('<div class="spinner-border text-white spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>');
        var dataid = $(".reviewdataid").val();
        var datacampus = $(".reviewdatacampus").val();

        get_longitude_and_latitude(function(coordinates) {
            var latitude = coordinates.latitude;
            var longitude = coordinates.longitude;
            var userid = $("#user_id").val();
            var usertype = $("#user_type").val();

            $.ajax({
                type:'POST',
                url:'../../controller/scripts/owner/emma_goalsetting/delete_goals.php',
                data:{
                    dataid:dataid,
                    datacampus:datacampus,
                    latitude: latitude,
                    longitude: longitude,
                    userid: userid,
                    usertype: usertype
                },
                success:function(delete_status){
                    $(".deletegoalsbutton").html('<i class="fas fa-trash"> Delete</i>');
                if(delete_status == 1){
                    $.wnoty({
                        type: 'success',
                        message: "Goal Successfully deleted",
                        autohideDelay: 5000
                    });
                    $("#deletegoal").modal('hide');
                    emma_load_cards();
                }else{
                    $.wnoty({
                        type: 'warning',
                        message: "Goal Not deleted",
                        autohideDelay: 5000
                    });
                }
                }
            })
        })
    });

    $("body").on("click", ".emma_print_on_view_modal", function() {
        const element = document.getElementById("print_view_modal");

        const options = {
        filename: "vision.pdf",
        };

        // Generate the PDF with html2pdf and save it with the specified filename
        html2pdf().from(element).set(options).save();
    });
