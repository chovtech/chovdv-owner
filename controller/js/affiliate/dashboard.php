
<script>



    $(document).ready(function () {
        pros_load_dash_borard_content();
    });



    $('body').on('change', '.pros_load_session_general', function (){
        pros_load_dash_borard_content();   
    });    // onchange on session

    // onchange on term
    $('body').on('change', '.abba-change-term', function (){
        
        pros_load_dash_borard_content();

    });


        
    var isHidden = true;
    
    $('.pros_earning_clicked_eye').on('click', function () {
        $('.pros_earning_clicked_eye').toggleClass("fa-eye fa-eye-slash");

        var termly_amount = $('.pros_total_earning_input').val();
        if (isHidden) {
            // If currently hidden, show the asterisks
            $('#prosload_totalearnper_term').text('₦' + '*****');
            
            
        } else {
            
            // If currently showing, hide the number
            $('#prosload_totalearnper_term').text('₦' + termly_amount);
            
        }
        // Toggle the state
        isHidden = !isHidden;
    });


    // pros_load_dash_borard_content function
    function pros_load_dash_borard_content() {


            $('.pros_school_dashborad_content').html(`<div align="center">
                    <i class="fas fa-spinner fa-spin fs-5" style="color:#007ffb;"></i>
                </div>`);

                $('#prosload_totalearnper_term').html(`
                    <i class="fas fa-spinner fa-spin fs-5" style="color:#007ffb;"></i>
                `);
                
                $('#prosload_total_affiliate').html(`<div align="center">
                    <i class="fas fa-spinner fa-spin fs-5" style="color:#007ffb;"></i>
                </div>`);




                var user_id = $('#user_id').val();
                var user_type = $('#user_type').val();


            var crnt_session = $('.pros_load_session_general option:selected').val()
            var crnt_term = $('.abba-change-term option:selected').val()
    

           
            
            
            var session = $('.pros_load_session_general option:selected').val();
            
            // var term = $('#pros_load_term_basesession option:selected').val();

            $.ajax({
                type: "POST",
                url: "../../controller/scripts/affiliate/dashboard/load_dashboard.php",
                data: {
                    user_id: user_id,
                    user_type: user_type,
                    session: session,
                    crnt_session:crnt_session,
                    crnt_term:crnt_term
                    // term: term
                },
                success: function (data) {
                    
                    // alert(data);
                
                
                    try {
                        var response = JSON.parse(data);

                        // Access values
                        var total_institutions = response.total_institutions;
                        var total_active_campuses = response.total_active_campuses;
                        var total_inactive_campuses = response.total_inactive_campuses;
                        var owner_cont = response.owner_cont;
                        var termly_amount = response.termly_amount;

                        var newly_school_content = response.newadded_campus;


                        
                        $('#prosload_totalearnper_term').html(`₦`+termly_amount);
                        $('#prosload_total_affiliate').html(`

                            <div class="col-6">
                                <h6 style="font-size: 12px; margin-top: 5px; margin-left: -80px;color: #fff; ">Total Affiliate</h6>
                                <p></p>
                                <h4 style="margin-left: -80px;color: #fff; ">${response.total_affiliate}</h4>
                                </div>

                                <div class="col-6">

                                
                                <h6 style="font-size: 12px; color: #fff;"> First Level Affiliates</h6>
                                <h6 style="color: #fff;">${response.total_affiliate_one}</h6>
                            
                                
                                <h6 style="font-size: 12px;color: #fff; "> Second Level Affiliates</h6>
                                <h6 style="color: #fff;">${response.total_affiliate_two}</h6>
                            </div>
                        
                        `);
                        $('.pros_total_earning_input').val(termly_amount);



                            $('.pros_school_dashborad_content').html(`
                                    <div class="col-6">
                                        <h6 style="font-size: 14px; margin-top: 5px; margin-left: -45px; ">Total Schools</h6>
                                        <p></p>
                                        <h4 style="margin-left: -80px; ">${total_institutions}</h4>
                                        </div>

                                        <div class="col-6">
    
                                        
                                        <h6 style="font-size: 14px; color: #98ff7e;">Active Campuses</h6>
                                        <h6 style="color: #333333;">${total_active_campuses}</h6>
                                    
                                        
                                        <h6 style="font-size: 14px; color: #b4030c;">Inactive Campus</h6>
                                        <h6 style="color: #333333;">${total_inactive_campuses}</h6>
                                    </div> `);



                                    // newly added campus here

                                    var pros_load_full_content = `<div class="col-9  ">
                                                        <h2 class="section-title mb-4" style="font-weight:600;font-size: 1rem;color:black;">Newly Registered Schools
                                                        </h2>
                                                    </div>`;
                                    for (var i = 0; i < newly_school_content.length; i++) {


                                        var item = newly_school_content[i];

                                        // 'institute_id' => $new_institution_id,
                                        // 'institute_name' => $new_institution_name,
                                        // 'campus_name' => $new_campus_name,
                                        // 'campus_id' =>  $new_campus_id
 


                                        if(i == 0){
                                            pros_load_full_content+=` <div class="col-sm-4 mb-4">
                                                <div class="card  " style="background-image: linear-gradient(180deg,#007bff,#00008B);height:180px;border:1px solid #DFE0EB;border-radius:15px;">
                                                    <div class="card-header" style="background-image: linear-gradient(180deg,#007bff,#00008B);border-top-right-radius:15px;border-top-left-radius:15px;">
                                                        <!-- <div class="dropdown " style="margin-right:10rem;position:absolute;top:0.5rem;right:-8.5rem;">
                                                            <span class="fa fa-ellipsis-v  text-light" data-bs-toggle="dropdown" aria-expanded="false" style="cursor:pointer;font-size:14px;"></span> 
                                                            <div class="dropdown-menu" style="width:30px !important;height:140px;background-color:white;border-radius:10px;">
                                                                <a class="dropdown-item" data-bs-toggle="modal" href="#pros-editcampus-modal" id="editcampusbtn" data-camp="81" data-sch="8" style="cursor:pointer;font-size:12px;">   <i class="fa fa-edit text-warning" aria-hidden="true"> </i> Edit</a>
                                                                <a class="dropdown-item" data-bs-toggle="modal" href="#pros-deletecampus-modal" id="prosdeletecampusbtnload" data-campname="Learning Field International Schools (Campus 1, Housing Estate)" data-camp="81" data-sch="8" style="cursor:pointer;font-size:12px;"> <i class="fa fa-trash text-danger" aria-hidden="true"></i>   Delete </a>
                                                            </div>
                                                        </div> -->
                                                        <h3 class="card-title text-light" style="font-weight:600;text-transform: uppercase;font-size: 0.87rem;">${item.institute_name}</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="section-title text-light prosdisplaycampusnameedit81" style="font-weight:600;font-size: 0.77rem;">${item.campus_name}</h5>
                                                        <!-- <a data-bs-toggle="modal" data-bs-target="#prosloadset-configurationhere" data-id="81" class="prosloadinstitutionbtn" style="color:white;float:right;font-size:13px;text-decoration:underline;cursor:pointer;margin-top:4rem;">Make Changes</a> -->
                                                    </div>
                                                </div>
                                            </div>`;
                                        }else
                                        {

                                            pros_load_full_content+=`<div class="col-sm-4 mb-4">
                                                <div class="card  " style="background:#FCFCFC;border:1px solid #DFE0EB;height:180px;border-radius:15px;">
                                                    <div class="card-header" style="background:#FCFCFC;border-top-right-radius:15px;border-top-left-radius:15px;">
                                                        <!-- <div class="dropdown" style="margin-right:10rem;position:absolute;top:0.5rem;right:-8.5rem;">
                                                            <span class="fa fa-ellipsis-v" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor:pointer;font-size:14px;"></span> 
                                                            <div class="dropdown-menu" style="width:30px !important;height:140px;background-color:white;border-radius:10px;">
                                                            <a class="dropdown-item" data-bs-toggle="modal" href="#pros-editcampus-modal" id="editcampusbtn" data-camp="130" data-sch="8" style="cursor:pointer;font-size:12px;">  <i class="fa fa-edit text-warning" aria-hidden="true"></i> Edit </a>
                                                            <a class="dropdown-item" data-bs-toggle="modal" href="#pros-deletecampus-modal" id="prosdeletecampusbtnload" data-campname="Learning Field International Schools (Campus 4, Trans Nkisi)" data-camp="130" data-sch="8" style="cursor:pointer;font-size:12px;">  <i class="fa fa-trash text-danger" aria-hidden="true"></i>  Delete </a>
                                                            </div>
                                                        </div> -->
                                                        <h3 class="card-title" style="font-weight:600;text-transform: uppercase;font-size: 0.87rem;">${item.institute_name}</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="section-title prosdisplaycampusnameedit130" style="font-weight:600;font-size:14px;">${item.campus_name}</h5>
                                                        <!-- <a data-bs-toggle="modal" data-bs-target="#prosloadset-configurationhere" data-id="130" class="prosloadinstitutionbtn" style="color:blue;float:right;font-size:13px;text-decoration:underline;cursor:pointer;margin-top:4rem;">Make Changes</a> -->
                                                    </div>
                                                </div>
                                            </div>`;

                                        }
                                     }  
                      
                                     $('.pros_load_newly_added').html(pros_load_full_content);
                                        
                                

                    } catch (error) {
                        console.error("Failed to parse JSON:", error);
                    }
                }
            });


    }
   
</script>