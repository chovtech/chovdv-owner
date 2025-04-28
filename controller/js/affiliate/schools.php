
<script>
            $(document).ready(function () {


                // var session_name = $('.pros_load_session_general option:selected').val();
                // pros_load_termbase_on_session(session_name);

                

                loadOwners();  // Load owners
                pros_load_dash_borard_content();
              

                // On owner click
                $(document).on('click', '.owner-item', function () {
                    $('.owner-item').removeClass('active');
                    $(this).addClass('active');
                    let ownerId = $(this).data('id');
                    loadSchools(ownerId);
                });

               


                

                // School search
                $("#schoolSearch").on("keyup", function () {
                    let value = $(this).val().toLowerCase();
                    $("#schoolsTable tbody tr").filter(function () {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });


            // prosload_school_campuses




            $('body').on('change', '.pros_load_session_general', function (){
                // var session_name = $(this).val();
                // pros_load_termbase_on_session(session_name);
                // $('.owner-item').removeClass('active');
                // $(this).addClass('active');
                let ownerId = $('.active').data('id');
                loadSchools(ownerId);
                pros_load_dash_borard_content()

            });    // onchange on session

            // onchange on term
            $('body').on('change', '.abba-change-term', function (){
                // var session_name = $(this).val();
                // pros_load_termbase_on_session(session_name);
                // $('.owner-item').removeClass('active');
                // $(this).addClass('active');
                let ownerId = $('.active').data('id');
                loadSchools(ownerId);
                pros_load_dash_borard_content()

            });
            


                // function pros_load_termbase_on_session(session_name)
                // {

                //             var curnt_session = $('#pros_load_crrnt_session_gen').val();
                    
                    
                //             $('#pros_load_term_basesession').html('<option value="NULL"><i class="fa fa-spinner fa-spin">Loading..</i></option>');
                //             $.ajax({
                //                 type: "POST",
                //                 url: "../../controller/scripts/affiliate/school/load_term.php",
                //                 data: {
                //                     session_name: session_name,
                //                     curnt_session:curnt_session
                                
                //                 },
                //                 success: function (response) {
                //                     $('#pros_load_term_basesession').html(response);
                //                 }
                //             });
                // }



            // prosload schoolowner function
            function loadOwners()
            {
                
                
                var user_id = $('#user_id').val();
                var user_type = $('#user_type').val();

                
                    
                    $('#ownerList').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-3" style="color:#007ffb;"></i></div>');

                    $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/affiliate/school/load_owner.php",
                        data: {
                            user_id:user_id,
                            user_type:user_type
                        
                        },
                        success: function (data) {
                            

                            var pros_load_owner_full_content = '';

                            try {
        
    
                                var response = JSON.parse(data);
                                                        

                                var status = response["responseMessage"];
                                var request = response["requestSuccessful"];
                                var des = response["responseDescription"];

                                var ownercontent = response["responseBody"];


                                

                                

                                if(status == 'success')
                                {



                                    pros_load_owner_full_content+=` <li style="cursor:pointer;" class="list-group-item d-flex justify-content-between align-items-center owner-item active prosload_school_campuses_active" data-id="all">
                                                        <i class="fas fa-users me-1"></i> All Owners
                                                        <span class="badge bg-primary rounded-pill">-</span>
                                                    </li>`;

                                    for (var i = 0; i < ownercontent.length; i++) {


                                        var item = ownercontent[i];
        
        
                                        
                                            pros_load_owner_full_content+=`<li class="list-group-item d-flex justify-content-between align-items-center owner-item prosload_school_campuses_active" data-id="${item.owner_id}">
                                                        <div class="text-truncate" style="max-width: 70%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;cursor:pointer;">
                                                            <i class="fas fa-user-tie me-1"></i> ${item.owner_fname} ${item.owner_lname}
                                                        </div>
                                                        <span class="badge bg-primary rounded-pill">${item.no_sch}</span>
                                                    </li>
                                                    `;
                                        }  

                                }else 
                                {
                                    pros_load_owner_full_content += `<div align="center"> No Records Found</div>`;
                                        // Initial load all schools


                                    
                        
                                }

                            } catch (error) {
                                console.error("Failed to parse response:", error);
                            }
                                
                                $('#ownerList').html(pros_load_owner_full_content);
                                loadSchools(ownerId = 'all');
                        }
                        });

                
                
            }





            // Function to load schools
        // Declare globally if needed for search
            let originalSchools = [];

            function loadSchools(ownerId) {
                
                var user_id = $('#user_id').val();
                var user_type = $('#user_type').val();

                var session = $('.pros_load_session_general option:selected').val();
                var term = $('.abba-change-term option:selected').val(); // fixed: term should be different



                
                $('#schoolsTable tbody').html(`
                    <tr><td colspan="5"><div align="center">
                        <i class="fas fa-spinner fa-spin fs-3" style="color:#007ffb;"></i>
                    </div></td></tr>`);
                    

                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/affiliate/school/load_schools.php",
                    data: {
                        user_id: user_id,
                        user_type: user_type,
                        ownerId: ownerId,
                        session: session,
                        term:term
                    },
                    success: function (data) {

                        // alert(data);
                        let tableBody = $('#schoolsTable tbody');
                        tableBody.empty();

                        try {
                            var response = JSON.parse(data);
                            var status = response["responseMessage"];
                            let schools = response["responseBody"];

                            if (status === 'success') {
                                originalSchools = schools; // store original for search

                                let filteredSchools = (ownerId === 'all' || ownerId) 
                                    ? schools 
                                    : schools.filter(s => String(s.owner_id) === String(ownerId));

                                    console.log(filteredSchools);

                                $.each(filteredSchools, function (i, school) {
                                    

                                    let payment_status = (school.payent_status === 'Paid') 
                                        ? `<span class="badge bg-success">${school.payent_status}</span>`
                                        : `<span class="badge bg-danger">${school.payent_status}</span>`;

                                    let pros_campuscontent = school.campuscontent || [];

                                    let row = `<tr>
                                        <td><i class="fas fa-school me-1"></i> ${school.school_name}</td>
                                        <td>${school.campus_sch_count}</td>
                                        <td>${school.student_sch_count}</td>
                                        <td>${payment_status}</td>
                                        <td><span class="text-primary" style="cursor:pointer;" data-bs-toggle="collapse" data-bs-target="#campuses${i}">
                                            <i class="fas fa-eye"></i> 
                                        </span></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" style="padding: 0; border: none;">
                                            <div id="campuses${i}" class="collapse">
                                            <div style="max-height: 200px; overflow-y: auto; padding: 10px;">
                                                <ul class="list-group">`;

                                    for (let s = 0; s < pros_campuscontent.length; s++) {
                                        let item = pros_campuscontent[s];
                                        row += `<li class="list-group-item d-flex justify-content-between">
                                                    <span><i class="fas fa-building me-1"></i> ${item.campus_name}</span>
                                                    <span>${item.student_campus_count} Students</span>
                                                </li>`;
                                    }

                                    row += `</ul>
                                            </div>
                                            </div>
                                        </td>
                                    </tr>`;

                                    tableBody.append(row);
                                });
                            } else {
                                tableBody.html(`<tr><td colspan="5"><div class="text-center text-danger">No Record Found </div></td></tr>`);
                            }
                        } catch (error) {
                            console.error("Failed to parse response:", error);
                            tableBody.html(`<tr><td colspan="5"><div class="text-center text-danger">Error loading schools.</div></td></tr>`);
                        }
                    }
                });
            }

            
                // pros_load_dash_borard_content function
            function pros_load_dash_borard_content() {


                $('.pros_loaddash_boradcont').html(`<div align="center">
                        <i class="fas fa-spinner fa-spin fs-5" style="color:#007ffb;"></i>
                    </div>`);

                var user_id = $('#user_id').val();
                var user_type = $('#user_type').val();
                var session = $('.pros_load_session_general option:selected').val();
                var term = $('.abba-change-term option:selected').val();

                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/affiliate/school/load_schools_dashboard.php",
                    data: {
                        user_id: user_id,
                        user_type: user_type,
                        session: session,
                        term: term
                    },
                    success: function (data) {

                    
                    
                        try {
                            var response = JSON.parse(data);

                            // Access values
                            var totalInstitutions = response.total_institutions;
                            var totalCampuses = response.total_campuses;
                            var totalStudents = response.total_students;

                            

                            $('.pros_loaddash_boradcont').html(`<div class="p-2 flex-fill border-end"><i class="fas fa-user-tie me-1"></i><strong>${response.owner_cont}</strong> Owners</div>
                            <div class="p-2 flex-fill border-end"><i class="fas fa-school me-1"></i><strong>${totalInstitutions}</strong> Schools</div>
                            <div class="p-2 flex-fill border-end"><i class="fas fa-building me-1"></i><strong>${totalCampuses}</strong> Campuses</div>
                            <div class="p-2 flex-fill border-end"><i class="fas fa-users me-1"></i><strong>${totalStudents}</strong> Students</div>`);
                                            
                                    

                        } catch (error) {
                            console.error("Failed to parse JSON:", error);
                        }
                    }
                });
            }

           


                
                       


    </script>
    