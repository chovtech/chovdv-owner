<?php
    include('../../controller/session/session-checker-owner.php');
    include('../../controller/config/function.php');
    if ($DefaultLanguage == '') {
        include('../../lang/english.php');
    } else {
        include('../../lang/' . $DefaultLanguage . '.php');
    }


    $prosload_session = prosload_session();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="EduMESS" />
    <meta name="description" content="EduMESS (Education Management and E-Learning Software Solution) is a leading school management, automation and elearning solution." />
    <meta name="keywords" content="Best, School, Management, Best School, Best School Management, Best School Management Software, Free School Management Software, Portal, School Owner, Group of School Owner, Consultants, Brand Promoters | School Portal Generator">
    <title>EduMESS - Payment Allocation</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="../../assets/images/website_images/favicon.png" type="image/x-icon">
    <link rel="icon" href="../../assets/images/website_images/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="152x152" href="../../assets/images/website_images/favicon.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../../assets/images/website_images/favicon.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/images/website_images/favicon.png">
    <link rel="apple-touch-icon" href="../../assets/images/website_images/favicon.png">
 
    <!-- Core CSS -->
    <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="../../css/app_css/appStyle.css">

    <!-- CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

    
    <!-- <script src="../../css/app_css/tailwind.16"></script> -->
  
    <link href="../../assets/plugins/notify/wnoty.css" rel="stylesheet">
    <script src="../../assets/plugins/sweetalert2@11.js"></script>


    <style>
    .hidden-student {
    display: none !important;
    }
    </style>


</head>

<body>
    <div class="grid-container">
        <!-- Header -->
        <?php include('../../includes/app-header.php'); ?>
        
        <!-- Sidebar -->
        <?php include('../../includes/app-menu.php'); ?>
        
        <!-- Floating Button -->
        <?php include('../../includes/floating-btn.php'); ?>
        
        <!-- Settings Menu -->
        <?php include('../../includes/setting-menu.php'); ?>

        <!-- Main Content -->
        <main class="main-container">
            <div class="main-cards">
                    <!--Allocation Page: Payment Allocation -->
                    <div class="container my-5">
                        <div class="card shadow-sm border-0 rounded-4 p-5">
                            <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
                                <div>
                                    <h4 class="fw-bold mb-1 text-dark">🎓 Allocated Students For Subscription</h4>
                                    <!-- <small class="text-muted">School: <strong>EduMaster High School</strong></small> -->
                                </div>
                                <div class="text-end text-muted small" id="allocationStats">
                                    <p class="mb-1">🧾 Paid Slots: <strong id="paidSlots">0</strong></p>
                                    <p class="mb-1">✅ Allocated: <strong id="allocatedSlots" class="text-primary">0</strong></p>
                                    <p class="mb-0">🕒 Remaining: <strong id="remainingSlots" class="text-success">0</strong></p>
                                </div>

                            </div>

                            <!--  Filter Row -->
                            <div class="row g-3 align-items-end mb-3">
                           
                                <div class="col-md-3">
                                    <label class="form-label">Campus</label>
                                    <select class="form-select pros_campuses" id="pros_load_camist">
                                        <option value="NULL">Select Campus</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Session</label>
                                    <select class="form-select" id="pros_session_list">
                                        <!-- <option value="NULL">Select Session</option> -->
                                         <?php
                                            echo $prosload_session = prosload_session();
                                          ?>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Term</label>
                                    <select class="form-select" id="pros_term_list">
                                        <option value="NULL">Select Term</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Class</label>
                                    <select class="form-select" id="load_class_list">
                                        <option value="NULL">Select Class</option>
                                    </select>
                                </div>

                            </div>

                            <!-- Load Button + Modal Trigger -->
                            <div class="d-flex justify-content-between align-items-center mt-3 mb-4">
                                <button class="btn btn-secondary btn-sm" id="pros_load_btn">Load</button>

                                <button class="btn btn-primary btn-sm  " data-bs-toggle="modal" data-bs-target="#allocateModal">
                                    ➕ Allocate Students
                                </button>
                            </div>

                            <!--Table -->
                            <div class="table-responsive border rounded">

                                <table class="table table-hover align-middle" id="allocatedTable">
                                    <thead class="table-light text-uppercase small">
                                        <tr>
                                            <th>#</th>
                                            <th>Student</th>
                                            <th>Session/Term</th>
                                            <th>Class</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="allocatedTableBody">

                                     <tr><td colspan="5" class=" text-center">Filter to load allocated students.</td></tr>
                                        <!-- <tr>
                                            <td>1</td>
                                            <td>Faith Abiola</td>
                                            <td>2024/2025/First Term</td>
                                            
                                            <td>JSS2</td>
                                            <td><span class="badge bg-success">Allocated</span></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>John Musa</td>
                                            <td>2024/2025/First Term</td>
                                            <td>SS1</td>
                                            <td><span class="badge bg-success">Allocated</span></td>
                                        </tr> -->
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
            </div>
        </main>
    </div>




    <!-- Allocate Students Modal -->
    <div class="modal fade" id="allocateModal" tabindex="-1" aria-labelledby="allocateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content rounded-4 shadow-lg border-0">
        
        <!-- Header -->
        <div class="modal-header bg-white border-0 pt-4 pb-2 px-4">
            <h5 class="modal-title fw-bold text-dark" id="allocateModalLabel">🎓 Allocate Students</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- Body -->
        <div class="modal-body px-4 pb-4 pt-0">
            <!-- Filters -->
            <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold text-muted small">📍 Campus</label>
                <select class="form-select form-select-sm shadow-sm rounded-pill pros_campuses" id="modalCampusSelect">
                   <option value="NULL">All Campuses</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold text-muted small">🏫 Class</label>
                <select class="form-select form-select-sm shadow-sm rounded-pill" id="modalClassSelect">
                <option value="NULL">All Classes</option>
                </select>
            </div>
            </div>

            <!-- Search Input -->
            <div class="input-group mb-4 shadow-sm rounded-pill overflow-hidden">
            <span class="input-group-text bg-white border-0">
                <i class="fas fa-search text-muted"></i>
            </span>
            <input type="text" id="studentSearch" class="form-control border-0" placeholder="Search student by name or ID...">
            </div>

            <!-- Selected Count -->
            <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="text-muted small">Showing available students below</span>
            <span class="fw-bold text-primary small">Selected: <span id="selectedCount">0</span></span>
            </div>

            <!-- Student List -->

            <!-- Filter Notice -->
            <div id="filterNotice" class="text-center border rounded-3 py-5 px-3 bg-light-subtle">
                <img src="https://cdn-icons-png.flaticon.com/512/7486/7486800.png" alt="No Data" style="width: 120px;" class="mb-3">
                <h5 class="fw-semibold text-dark">Filter Required</h5>
                <p class="text-muted small">Please select both <strong>Campus</strong> and <strong>Class</strong> to load students.</p>
            </div>

           
            <div class="list-group border rounded-3 shadow-sm" id="studentList" style="max-height: 360px; overflow-y: auto;display: none;">

                <div id="studentList" class="list-group border rounded-3 shadow-sm" style="max-height: 360px; overflow-y: auto;">
                   
                    <!-- Example Student Item -->
                    

                    <!-- Repeat this structure for each student -->
                </div>

            
            
            </div>
        </div>

        <!-- Footer -->
        <div class="modal-footer bg-light border-0 px-4 py-3">
            <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary rounded-pill px-5 fw-semibold" id="confirmAllocationBtn">
             Allocate Selected
            </button>
        </div>
        </div>
    </div>
    </div>



   


    <!-- Scripts -->
    <script src="../../assets/plugins/jquery/code.jquery.com_jquery-3.5.1.min.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


    <script src="../../assets/plugins/knob/jquery.knob.js"></script>
    <script src="../../assets/plugins/notify/wnoty.js"></script>
    <script src="../../js/admin_js/adminScript.js"></script>

    <!-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script> -->

    
    <?php include('../../controller/js/app/header.php'); ?>

    <!-- current page js -->
    <?php include('../../js/current_page.php'); ?>

   
    <script>

            $(document).ready(function () {

                // Update count of selected students
                function updateSelectedCount() {
                    const checked = $('.student-checkbox:checked').length;
                    $('#selectedCount').text(checked);
                }

                // Handle student checkbox toggle
                $('body').on('change', '.student-checkbox', function () {
                    updateSelectedCount();
                });

                // Reset on modal open
                $('#allocateModal').on('shown.bs.modal', function () {
                    updateSelectedCount();
                    $('#studentSearch').val('');
                });

                // Load campuses
                function prosload_campus(instutitionID) {
                    $('.pros_campuses').html('<option>Loading...</option>');
                    $.post('../../controller/scripts/owner/abba-get-campus.php',
                    { abba_instituion_id: instutitionID },
                    function (output) {
                        $('.pros_campuses').html(output);
                    });
                }

                // Initial campus load
                let instutitionID = $('.abba-change-institution option:selected').val();
                prosload_campus(instutitionID);

                // On Institution change
                $('.abba-change-institution').on('change', function () {
                    let instutitionID = $(this).val();
                    prosload_campus(instutitionID);
                });

                // Load class & term dropdowns
                function prosload_class_term_option(campusID, classid, termid) {
                    if (campusID === 'NULL') {
                    $('#' + termid).html('<option>Select campus</option>');
                    $('#' + classid).html('<option>Select campus</option>');
                    return;
                    }

                    $('#' + termid).html('<option>Loading...</option>');
                    $('#' + classid).html('<option>Loading...</option>');

                    $.post('../../controller/scripts/owner/pros-loadterm-forpostpayment.php',
                     { campusID }, function (output) {
                    $('#' + termid).html(output);
                    });

                    $.post('../../controller/scripts/owner/pros-loadclass-forpostpayment.php', { campusID }, 
                    function (output) {
                    $('#' + classid).html(output);
                    });
                }

                // On campus change
                $('body').on('change', '#pros_load_camist', function () {
                    const campusID = $(this).val();
                    prosload_class_term_option(campusID, 'load_class_list', 'pros_term_list');
                });

                $('body').on('change', '#modalCampusSelect', function () {
                    const campusID = $(this).val();
                    prosload_class_term_option(campusID, 'modalClassSelect', 'null');
                });

                // Load students based on filters
                function checkFiltersAndLoadStudents() {
                    const campus = $('#modalCampusSelect').val();
                    const selectedClass = $('#modalClassSelect').val();

                    if (campus !== 'NULL' && selectedClass !== 'NULL') {
                    $('#filterNotice').hide();
                    $('#studentList').show();

                    const institutionID = $('.abba-change-institution option:selected').val();
                    const userID = $('#user_id').val();
                    const usertype = $('#user_type').val();
                    
                    $('#studentList').html('<div class="text-center text-muted py-4">Loading unallocated students...</div>');
                    

                    $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/edumessssubscription/prros_load_student_foralloc.php",
                        data: { instutitionID: institutionID, campus, userID, usertype, selectedClass },
                        dataType: "json",
                        success: function (response) {
                        if (response.success) {
                            renderStudents(response.data.students);
                            attachStudentSearchListener();
                        } else {
                            showError("Error: " + response.message);
                        }
                        },
                        error: function (xhr, status, error) {
                        console.error("AJAX Error:", error);
                        }
                    });
                    } else {
                    $('#filterNotice').show();
                    $('#studentList').hide();
                    }
                }

                $('#modalCampusSelect, #modalClassSelect').on('change', checkFiltersAndLoadStudents);

                // Render unallocated students
                function renderStudents(students) {
                    const $studentList = $('#studentList');
                    $studentList.empty();

                    if (!students.length) {
                    $studentList.html('<div class="text-center text-muted py-4">No students found.</div>');
                    return;
                    }

                    students.forEach(student => {
                    $studentList.append(`
                        <label class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <div class="d-flex align-items-center gap-2">
                            <input class="form-check-input mt-0 me-2 student-checkbox" type="checkbox" data-id="${student.ClassOrDepartmentID}" value="${student.StudentID}">
                            <div class="student-info">
                            <span class="fw-semibold text-dark student-name">${student.StudentFirstName} ${student.StudentLastName}</span>
                            <div class="text-muted small student-class">${student.ClassOrDepartmentName || ''}</div>
                            </div>
                        </div>
                        <span class="badge bg-info text-dark fw-normal px-3 py-1">Unallocated</span>
                        </label>
                    `);
                    });
                }

                // Search students
                function attachStudentSearchListener() {
                    $('#studentSearch').on('input', function () {
                    const query = $(this).val().toLowerCase();
                    $('#studentList .list-group-item').each(function () {
                        const name = $(this).find('.student-name').text().toLowerCase();
                        const className = $(this).find('.student-class').text().toLowerCase();
                        $(this).toggleClass('hidden-student', !(name.includes(query) || className.includes(query)));
                    });
                    });
                }

                // Confirm allocation
                $('#confirmAllocationBtn').on('click', function () {
                    const selected = $('.student-checkbox:checked');
                    if (!selected.length) return showError("Please select at least one student to allocate.");

                    const studentIDs = selected.map(function () { return this.value; }).get();

                      var student_count =  studentIDs.length;

                      



                    const campusID = $('#modalCampusSelect').val();
                    const pros_get_raminslot = parseInt($('#remainingSlots').text()) || 0;
                    if (!campusID) return showError("Select campus, session and term.");

                    if(selected.length > pros_get_raminslot)
                    {

                        Swal.fire({
                                icon: 'warning',
                                title: 'Slot Elapsed',
                                text: `You have only ${pros_get_raminslot.toLocaleString()} student slot(s) remaining. You cannot assign more students than you have paid for. Please top up your payment.`,
                                showCancelButton: true,
                                confirmButtonText: 'Make Payment'
                            }).then(result => {
                                if (result.isConfirmed) {
                                    // Redirect to payment page
                                    window.location.href = '../../app/subscription/';
                                } 
                        });

                        return;
                    }

                    var instutitionID = $('.abba-change-institution option:selected').val();
                    var userID = $('#user_id').val();
                    var usertype = $('#user_type').val();

                    const $btn = $(this).prop('disabled', true).text('Allocating...');
                    $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/edumessssubscription/allocate-students.php",
                    data: { studentIDs, campusID,userID, usertype,instutitionID},
                    dataType: "json",
                    success: function (res) {
                        if (res.success) {
                        showSuccess(res.message);

                        $('#allocateModal').modal('hide');
                        pros_load_slotsdata(instutitionID,campusID,userID,usertype);
                        // checkFiltersAndLoadStudents();
                        } else {
                        showError("Failed: " + res.message);
                        }
                    },
                    complete: function () {
                        $btn.prop('disabled', false).text('Confirm Allocation');
                    }
                    });
                });

                // Load allocated students
                function loadAllocatedStudents(campusID, session, term, classID, institutionID, userID, usertype) {
                    $('#allocatedTableBody').html('<tr><td colspan="6" class="text-center text-muted">Loading...</td></tr>');
                    pros_load_slotsdata(institutionID,campusID,userID,usertype);


                    $.ajax({
                    url: '../../controller/scripts/owner/edumessssubscription/load-allocated-students.php',
                    method: 'POST',
                    data: { campusID, session, term, class: classID, institutionID, userID, usertype },
                    dataType: 'json',
                    success: function (res) {
                        if (res.success) {
                        renderAllocatedStudents(res.data || []);
                        } else {
                        showError(res.message || "No allocated students found.");
                        }
                    },
                    error: function () {
                        $('#allocatedTableBody').html('<tr><td colspan="6" class="text-danger text-center">Error loading allocated students.</td></tr>');
                    }
                    });
                }

                function renderAllocatedStudents(students) {

                    // console.log(students);


                    const $tbody = $('#allocatedTableBody');
                    $tbody.empty();

                    if (!students.length) {
                    $tbody.html('<tr><td colspan="6" class="text-muted text-center">No allocated students.</td></tr>');
                    return;
                    }

                    students.forEach((student, index) => {
                    $tbody.append(`
                        <tr>
                        <td>${index + 1}</td>
                        <td>${student.StudentFirstName} ${student.StudentLastName}</td>
                        <td>${student.Session}-${student.TermOrSemesterName} Term</td>
                        <td>${student.ClassOrDepartmentName}</td>
                        <td><span class="badge bg-success">Allocated</span></td>
                        
                        </tr>
                    `);
                    });
                }


                // Trigger load
                $('#pros_load_btn').on('click', function (e) {
                    e.preventDefault();
                    const campusID = $('#pros_load_camist').val();
                    const session = $('#pros_session_list').val();
                    const term = $('#pros_term_list').val();
                    const classID = $('#load_class_list').val();
                    const institutionID = $('.abba-change-institution').val();
                    const userID = $('#user_id').val();
                    const usertype = $('#user_type').val();

                    if (campusID && campusID !== 'NULL') {
                    loadAllocatedStudents(campusID, session, term, classID, institutionID, userID, usertype);
                    } else {
                    showError("Please select a campus to view allocations.");
                    }
                });

                // Auto-load on select change
                $('#pros_load_camist, #pros_session_list, #pros_term_list, #load_class_list').on('change', function () {
                    const campusID = $('#pros_load_camist').val();
                    const session = $('#pros_session_list').val();
                    const term = $('#pros_term_list').val();
                    const classID = $('#load_class_list').val();
                    const institutionID = $('.abba-change-institution').val();
                    const userID = $('#user_id').val();
                    const usertype = $('#user_type').val();

                    if (campusID && campusID !== 'NULL') {
                    loadAllocatedStudents(campusID, session, term, classID, institutionID, userID, usertype);
                    }
                });

                // SweetAlert functions
                function showError(message) {
                    Swal.fire({ icon: 'error', title: 'Oops...', text: message });
                }

                function showSuccess(message) {
                    Swal.fire({ icon: 'success', title: 'Success', text: message });
                }

            });


            $(document).ready(function () {
                var instutitionID = $('.abba-change-institution option:selected').val();
                var campusID = $('#pros_load_camist').val();
                var userID = $('#user_id').val();
                var usertype = $('#user_type').val();
                pros_load_slotsdata(instutitionID,campusID,userID,usertype);
            });

            function pros_load_slotsdata(instutitionID,campusID,userID,usertype)
            {
             
                $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/edumessssubscription/prros_load_slotcontent.php",
                        data: { instutitionID, campusID, userID, usertype },
                        dataType: "json",
                        success: function (response) {
                        if (response.success) {

                                const data = response.data[0];
                                const paid = data.total_paid;
                                const allocated = data.total_allocated;
                                const remaining = paid - allocated;

                                // alert(allocated);


                                $('#paidSlots').text(paid.toLocaleString());
                                $('#allocatedSlots').text(allocated.toLocaleString());
                                $('#remainingSlots').text(remaining.toLocaleString());
                        } else {
                            showError("Error: " + response.message);
                        }
                        },
                        error: function (xhr, status, error) {
                            console.error("AJAX Error:", error);
                        }
                    });
                   
               
               

            }

            
    </script>



</body>
</html>