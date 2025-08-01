<script>

        $(document).ready(function() {
            // When the copy button is clicked
            $('#copy-button').click(function() {
                // Select the text input field
                var textToCopy = $('#pros-text-to-copy');
                // Copy the text to the clipboard
                textToCopy.select();
                document.execCommand('copy');
                // Deselect the text input field (optional)
                textToCopy.blur();
                // Provide feedback to the user
                $.wnoty({
                    type: 'success',
                    message: "Copied.",
                    autohideDelay: 5000
                });
            });
        });



         // SweetAlert functions
         function showError(message) {
          Swal.fire({ icon: 'error', title: 'Oops...', text: message });
        }

        function showSuccess(message) {
            Swal.fire({ icon: 'success', title: 'Success', text: message });
        }
       

            $(document).ready(function () {
                // var session_name = $('.pros_load_session_general option:selected').val();
                // pros_load_termbase_on_session(session_name);
                loadOwners();  // Load owners
                pros_load_dash_borard_content();
                loadPendingTransfers(); // Load pending transfers for approval
                loadMyTransferRequests(); // Load my transfer requests
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

                // When transfer button is clicked
                $('body').on('click', '.transfer-school-btn', function() {
                    const AgencyOrSchoolOwnerID = $(this).data('owner');
                    const schoolName = $(this).data('school-name');
                    const isTransferred = $(this).data('transferred');
                    const originalOwnerId = $(this).data('original-owner');
                    
                    if (isTransferred) {
                        // School was transferred to current user - can only transfer back
                        $('#transferSchoolName').text(`Transfer "${schoolName}" back to original owner:`);
                        // Hide percentage fields for return transfers
                        $('.percentage-section').hide();
                        $('.return-transfer-info').show();
                    } else {
                        // Normal transfer
                        $('#transferSchoolName').text(`Transfer "${schoolName}" to:`);
                        // Show percentage fields for normal transfers
                        $('.percentage-section').show();
                        $('.return-transfer-info').hide();
                    }
                    
                    $('#transferSchoolModal').data('AgencyOrSchoolOwnerID', AgencyOrSchoolOwnerID);
                    $('#transferSchoolModal').data('isTransferred', isTransferred);
                    $('#transferSchoolModal').data('originalOwnerId', originalOwnerId);

                    // alert(AgencyOrSchoolOwnerID);

                      var user_id = $('#user_id').val();
                     var user_type = $('#user_type').val();

                    // console.log(data);

                    // Load affiliates into the select dropdown
                    $.ajax({
                        url: '../../controller/scripts/affiliate/school/load_affiliates.php',
                        type: 'POST',

                         data: {
                            // AgencyOrSchoolOwnerID: AgencyOrSchoolOwnerID,
                            // new_affiliate_id: newAffiliateId,
                            // school_name: schoolName,
                            user_id: $('#user_id').val(),
                            user_type: $('#user_type').val(),
                            original_owner_id: originalOwnerId,
                            is_transferred: isTransferred
                        },
                        dataType: 'json',
                        success: function(data) {
                            let options = '';
                            // Check if data is in your standard response format
                            if (data.responseBody && Array.isArray(data.responseBody)) {
                                data.responseBody.forEach(function(affiliate) {
                                    options += `<option value="${affiliate.affiliate_id}">${affiliate.affiliate_name}</option>`;
                                });
                            } else if (Array.isArray(data)) {
                                // Fallback for direct array response
                                data.forEach(function(affiliate) {
                                    options += `<option value="${affiliate.affiliate_id}">${affiliate.affiliate_name}</option>`;
                                });
                            } else {
                                console.error('Unexpected data format:', data);
                                options = '<option value="">No affiliates available</option>';
                            }
                            $('#newAffiliateSelect').html(options);
                            $('#transferSchoolModal').modal('show');
                        },
                        error: function() {
                            showError("Failed to load affiliates.");
                        }
                    }); 
        
                });

                // When confirm transfer is clicked
                $('#confirmTransferBtn').on('click', function() {
                    const $btn =  $('#confirmTransferBtn');
                    const originalText = $btn.html();
                    
                    // Disable button and show loading
                    $btn.prop('disabled', true);
                    $btn.html('<i class="fas fa-spinner fa-spin me-2"></i>Sending Request...');
                    
                    const AgencyOrSchoolOwnerID = $('#transferSchoolModal').data('AgencyOrSchoolOwnerID');
                    const newAffiliateId = $('#newAffiliateSelect').val();
                    const schoolName = $('#transferSchoolName').text().replace('Transfer "', '').replace('" to:', '').replace('" back to original owner:', '');
                    const isTransferred = $('#transferSchoolModal').data('isTransferred');
                    const transferReason = $('#transferReason').val();

                    if (!newAffiliateId) {
                        showError("Please select an affiliate to transfer to.");
                        // Re-enable button and restore text
                        $btn.prop('disabled', false);
                        $btn.html(originalText);
                        return;
                    }

                    // Only validate percentages for normal transfers, not return transfers
                    if (!isTransferred) {
                        const fromPercentage = parseInt($('#fromPercentage').val());
                        const toPercentage = parseInt($('#toPercentage').val());

                        // Validate percentages
                        if (fromPercentage < 0 || fromPercentage > 100 || toPercentage < 0 || toPercentage > 100) {
                            showError("Percentages must be between 0 and 100.");
                            // Re-enable button and restore text
                            $btn.prop('disabled', false);
                            $btn.html(originalText);
                            return;
                        }

                        if (fromPercentage + toPercentage !== 100) {
                            showError("Total percentage must equal 100%.");
                            // Re-enable button and restore text
                            $btn.prop('disabled', false);
                            $btn.html(originalText);
                            return;
                        }
                    }

                    // Prepare data for AJAX request
                    const requestData = {
                        AgencyOrSchoolOwnerID: AgencyOrSchoolOwnerID,
                        new_affiliate_id: newAffiliateId,
                        school_name: schoolName,
                        transfer_reason: transferReason,
                        user_id: $('#user_id').val(),
                        user_type: $('#user_type').val(),
                        is_return_transfer: isTransferred
                    };

                    // Add percentage data only for normal transfers
                    if (!isTransferred) {
                        requestData.from_percentage = parseInt($('#fromPercentage').val());
                        requestData.to_percentage = parseInt($('#toPercentage').val());
                    }

                    $.ajax({
                        url: '../../controller/scripts/affiliate/school/request_school_transfer.php',
                        type: 'POST',
                        data: requestData,
                        success: function(response) {
                            // console.log(response);
                            // showSuccess(result.responseDescription);
                            // showError("Failed to load affiliates.");
                            try {
                                const result = JSON.parse(response);
                                if (result.responseMessage === 'success') {
                                    $('#transferSchoolModal').modal('hide');
                                    loadSchools($('.active').data('id'));
                                    loadMyTransferRequests(); // Load my transfer requests after successful transfer
                                    showSuccess(result.responseDescription);
                                    
                                } else {
                                    showError(result.responseDescription || "Failed to send transfer request.");
                                    // $.wnoty({
                                    //     type: 'error',
                                    //     message: result.responseDescription || "Failed to send transfer request.",
                                    //     autohideDelay: 5000
                                    // });
                                }
                            } catch (error) {
                                showError("Error processing request.");
                                // $.wnoty({
                                //     type: 'error',
                                //     message: "Error processing request.",
                                //     autohideDelay: 5000
                                // });
                            }
                            
                            // Always re-enable button and restore text
                            $btn.prop('disabled', false);
                            $btn.html(originalText);
                        },
                        error: function() {
                            showError("Failed to send transfer request.");
                            
                            // Re-enable button and restore text
                            $btn.prop('disabled', false);
                            $btn.html(originalText);
                        }
                    });
                });

                // Auto-calculate percentages
                $('#fromPercentage, #toPercentage').on('input', function() {
                    const fromPercent = parseInt($('#fromPercentage').val()) || 0;
                    const toPercent = parseInt($('#toPercentage').val()) || 0;
                    
                    if (fromPercent + toPercent > 100) {
                        $(this).addClass('is-invalid');
                    } else {
                        $('#fromPercentage, #toPercentage').removeClass('is-invalid');
                    }
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
                    <tr><td colspan="6"><div align="center">
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

                                    // console.log(filteredSchools);

                                $.each(filteredSchools, function (i, school) {
                                    
                                    
                                   


                                    let payment_status = `<a href="https://${school.shool_login}" class="badge bg-primary" target="_blank"><i class="fas fa-globe"> School login</a>`
                                       ;

                                    let pros_campuscontent = school.campuscontent || [];

                                    // Check transfer status
                                    let transferStatus = '';
                                    let transferButton = '';
                                    
                                    if (school.transfer_status === 'pending') {
                                        transferButton = `<span class="badge bg-warning">Transfer Pending</span>`;
                                        // transferButton = '<button class="btn btn-sm btn-secondary" disabled> Pending</button>';
                                    } else if (school.transfer_status === 'approved') {
                                        transferStatus = `<span class="badge bg-success">Transfer Approved</span>`;
                                        transferButton = '<button class="btn btn-sm btn-success" disabled>Transfer Approved</button>';
                                    } else if (school.transfer_status === 'rejected') {
                                        transferStatus = `<span class="badge bg-danger">Transfer Rejected</span>`;
                                        transferButton = `<button class="btn btn-sm btn-outline-warning transfer-school-btn" data-owner="${school.AgencyOrSchoolOwnerID}" data-school-name="${school.school_name}">Transfer</button>`;
                                    } else {
                                        // Check if school was transferred to current user
                                        if (school.is_transferred_to_user) {
                                            transferButton = `<button class="btn btn-sm btn-outline-info transfer-school-btn" data-owner="${school.AgencyOrSchoolOwnerID}" data-school-name="${school.school_name}" data-original-owner="${school.original_owner_id}" data-transferred="true">
                                                <i class="fas fa-undo me-1"></i>Transfer Back
                                            </button>`;
                                        } else {
                                            // No transfer status - can initiate transfer
                                            transferButton = `<button class="btn btn-sm btn-outline-warning transfer-school-btn" data-owner="${school.AgencyOrSchoolOwnerID}" data-school-name="${school.school_name}">Transfer</button>`;
                                        }
                                    }

                                    let row = `<tr>
                                        <td><i class="fas fa-school me-1"></i> ${school.school_name}</td>
                                        <td>${school.campus_sch_count}</td>
                                        <td>${school.student_sch_count}</td>
                                        <td>${payment_status}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <span class="text-primary" style="cursor:pointer;" data-bs-toggle="collapse" data-bs-target="#campuses${i}">
                                                    <i class="fas fa-eye"></i> 
                                                </span>
                                                ${transferButton}
                                            </div>
                                        </td>`+
                                        // <td>${transferStatus}</td>
                                    `</tr>
                                    <tr>
                                        <td colspan="6" style="padding: 0; border: none;">
                                            <div id="campuses${i}" class="collapse">
                                            <div style="max-height: 200px; overflow-y: auto; padding: 10px;">
                                                <ul class="list-group">`;

                                    for (let s = 0; s < pros_campuscontent.length; s++) {
                                        let item = pros_campuscontent[s];
                                        
                                         let pay_campus_statusval = (item.pay_campus_status === 'Paid') 
                                        ? `<span class="badge bg-success">${item.pay_campus_status}</span>`
                                        : `<span class="badge bg-danger">${item.pay_campus_status}</span>`;
                                        
                                        
                                        row += `<li class="list-group-item d-flex justify-content-between">
                                                    <span><i class="fas fa-building me-1"></i> ${item.campus_name}</span>
                                                    <span>${item.student_campus_count} Students</span>
                                                    <span>${pay_campus_statusval} </span>
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
                                tableBody.html(`<tr><td colspan="6"><div class="text-center text-danger">No Record Found </div></td></tr>`);
                            }
                        } catch (error) {
                            console.error("Failed to parse response:", error);
                            tableBody.html(`<tr><td colspan="6"><div class="text-center text-danger">Error loading schools.</div></td></tr>`);
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

           

            // Load pending transfers for approval
            function loadPendingTransfers() {
                var user_id = $('#user_id').val();
                var user_type = $('#user_type').val();

                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/affiliate/school/load_pending_transfers.php",
                    data: {
                        user_id: user_id,
                        user_type: user_type
                    },
                    success: function (data) {
                        // console.log(data);
                        try {
                            var response = JSON.parse(data);
                            if (response.responseMessage === 'success' && response.responseBody.length > 0) {
                                let pendingHtml = `
                                    <div class="alert alert-warning border-0 mb-4" role="alert">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <h6 class="alert-heading mb-1">
                                                    <i class="fas fa-clock me-2"></i>Pending Transfer Requests
                                                </h6>
                                                <p class="mb-0 text-muted">You have ${response.responseBody.length} transfer request(s) waiting for your approval.</p>
                                            </div>
                                            <button class="btn btn-sm btn-outline-warning" data-bs-toggle="collapse" data-bs-target="#pendingTransfers">
                                                <i class="fas fa-eye me-1"></i>View
                                            </button>
                                        </div>
                                    </div>
                                    <div class="collapse" id="pendingTransfers">
                                        <div class="card border-0 shadow-sm mb-4">
                                            <div class="card-header bg-light">
                                                <h6 class="mb-0"><i class="fas fa-list me-2"></i>Pending Transfers</h6>
                                            </div>
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                    <table class="table table-hover mb-0">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>School</th>
                                                                <th>From Affiliate</th>
                                                                <th>Revenue Share</th>
                                                                <th>Reason</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>`;

                                                            response.responseBody.forEach(function(transfer) {
                                                                pendingHtml += `
                                                                    <tr>
                                                                        <td><i class="fas fa-school me-1"></i> ${transfer.school_name}</td>
                                                                        <td>${transfer.from_affiliate_name}</td>
                                                                        <td>
                                                                            <span class="badge bg-success">You: ${transfer.to_percentage}%</span>
                                                                            <span class="badge bg-info">${transfer.from_affiliate_name}: ${transfer.from_percentage}%</span>
                                                                        </td>
                                                                        <td>${transfer.transfer_reason || 'No reason provided'}</td>
                                                                        <td>
                                                                            <button class="btn btn-sm btn-success approve-transfer-btn me-1" data-transfer-id="${transfer.id}">
                                                                                <i class="fas fa-check me-1"></i>Approve
                                                                            </button>
                                                                            <button class="btn btn-sm btn-danger reject-transfer-btn" data-transfer-id="${transfer.id}">
                                                                                <i class="fas fa-times me-1"></i>Reject
                                                                            </button>
                                                                        </td>
                                                                    </tr>`;
                                                            });

                                
                                                        pendingHtml += `</tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;

                                // Insert at the top of the schools container
                                $('.main-cards').prepend(pendingHtml);
                            }
                        } catch (error) {
                            console.error("Failed to parse pending transfers:", error);
                        }
                    }
                });
            }

            // Load my transfer requests (sent by current user)
            function loadMyTransferRequests() {
                var user_id = $('#user_id').val();
                var user_type = $('#user_type').val();

                // Remove any existing "My Transfer Requests" section first
                $('.main-cards').find('.alert-info:contains("My Transfer Requests")').closest('.alert-info').next('.collapse').addBack().remove();

                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/affiliate/school/load_my_transfer_requests.php",
                    data: {
                        user_id: user_id,
                        user_type: user_type
                    },
                    success: function (data) {
                        try {
                            var response = JSON.parse(data);
                            if (response.responseMessage === 'success' && response.responseBody.length > 0) {
                                let myTransfersHtml = `
                                    <div class="alert alert-info border-0 mb-4" role="alert">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <h6 class="alert-heading mb-1">
                                                    <i class="fas fa-paper-plane me-2"></i>My Transfer Requests
                                                </h6>
                                                <p class="mb-0 text-muted">You have ${response.responseBody.length} transfer request(s) you initiated.</p>
                                            </div>
                                            <button class="btn btn-sm btn-outline-info" data-bs-toggle="collapse" data-bs-target="#myTransferRequests">
                                                <i class="fas fa-eye me-1"></i>View
                                            </button>
                                        </div>
                                    </div>
                                    <div class="collapse" id="myTransferRequests">
                                        <div class="card border-0 shadow-sm mb-4">
                                            <div class="card-header bg-light">
                                                <h6 class="mb-0"><i class="fas fa-list me-2"></i>My Transfer Requests</h6>
                                            </div>
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                    <table class="table table-hover mb-0">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>School</th>
                                                                <th>To Affiliate</th>
                                                                <th>Revenue Share</th>
                                                                <th>Status</th>
                                                                <th>Date</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>`;

                                                            response.responseBody.forEach(function(transfer) {
                                                                let statusBadge = '';
                                                                let actionButton = '';
                                                                
                                                                if (transfer.Status === 'pending') {
                                                                    statusBadge = '<span class="badge bg-warning">Pending</span>';
                                                                    actionButton = `<button class="btn btn-sm btn-outline-danger cancel-transfer-btn" data-transfer-id="${transfer.id}">
                                                                        <i class="fas fa-times me-1"></i>Cancel
                                                                    </button>`;
                                                                } else if (transfer.Status === 'approved') {
                                                                    statusBadge = '<span class="badge bg-success">Approved</span>';
                                                                    actionButton = '<span class="text-muted">Transfer completed</span>';
                                                                } else if (transfer.Status === 'rejected') {
                                                                    statusBadge = '<span class="badge bg-danger">Rejected</span>';
                                                                    actionButton = `<button class="btn btn-sm btn-outline-danger cancel-transfer-btn" data-transfer-id="${transfer.id}">
                                                                        <i class="fas fa-times me-1"></i>Cancel
                                                                    </button>`;
                                                                }

                                                                myTransfersHtml += `
                                                                    <tr>
                                                                        <td><i class="fas fa-school me-1"></i> ${transfer.school_name}</td>
                                                                        <td>${transfer.to_affiliate_name}</td>
                                                                        <td>
                                                                            <span class="badge bg-primary">You: ${transfer.from_percentage}%</span>
                                                                            <span class="badge bg-info">${transfer.to_affiliate_name}: ${transfer.to_percentage}%</span>
                                                                        </td>
                                                                        <td>${statusBadge}</td>
                                                                        <td>${new Date(transfer.request_date).toLocaleDateString()}</td>
                                                                        <td>${actionButton}</td>
                                                                    </tr>`;
                                                            });

                                
                                                        myTransfersHtml += `</tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;

                                    
                                // Insert at the top of the schools container
                                $('.main-cards').prepend(myTransfersHtml);
                            }
                        } catch (error) {
                            console.error("Failed to parse my transfer requests:", error);
                        }
                    }
                });
            }

            // Handle approve/reject transfer buttons with SweetAlert
            $('body').on('click', '.approve-transfer-btn', function() {
                const transferId = $(this).data('transfer-id');
                const $btn = $(this);
                const originalText = $btn.html();
                
                Swal.fire({
                    title: 'Approve Transfer?',
                    text: 'Are you sure you want to approve this school transfer? This action cannot be undone.',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#28a745',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, Approve!',
                    cancelButtonText: 'Cancel',
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        // Disable button and show loading
                        $btn.prop('disabled', true);
                        $btn.html('<i class="fas fa-spinner fa-spin me-1"></i>Processing...');
                        
                        return $.ajax({
                            url: '../../controller/scripts/affiliate/school/process_transfer_action.php',
                            type: 'POST',
                            data: {
                                transfer_id: transferId,
                                action: 'approve',
                                user_id: $('#user_id').val()
                            }
                        }).then(response => {
                            try {
                                return JSON.parse(response);
                            } catch (error) {
                                throw new Error('Invalid response format');
                            }
                        }).catch(error => {
                            Swal.showValidationMessage(`Request failed: ${error.message}`);
                        });
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                    if (result.isConfirmed) {
                        const response = result.value;
                        
                        if (response.responseMessage === 'success') {
                            Swal.fire({
                                title: 'Approved!',
                                text: response.responseDescription,
                                icon: 'success',
                                confirmButtonColor: '#28a745'
                            }).then(() => {
                                // Reload the page or refresh the pending transfers section
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: response.responseDescription || 'Failed to approve transfer',
                                icon: 'error',
                                confirmButtonColor: '#dc3545'
                            });
                            
                            // Re-enable button and restore text
                            $btn.prop('disabled', false);
                            $btn.html(originalText);
                        }
                    } else {
                        // Re-enable button and restore text if cancelled
                        $btn.prop('disabled', false);
                        $btn.html(originalText);
                    }
                });
            });

            $('body').on('click', '.reject-transfer-btn', function() {
                const transferId = $(this).data('transfer-id');
                const $btn = $(this);
                const originalText = $btn.html();
                
                Swal.fire({
                    title: 'Reject Transfer?',
                    text: 'Are you sure you want to reject this school transfer? This action cannot be undone.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, Reject!',
                    cancelButtonText: 'Cancel',
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        // Disable button and show loading
                        $btn.prop('disabled', true);
                        $btn.html('<i class="fas fa-spinner fa-spin me-1"></i>Processing...');
                        
                        return $.ajax({
                            url: '../../controller/scripts/affiliate/school/process_transfer_action.php',
                            type: 'POST',
                            data: {
                                transfer_id: transferId,
                                action: 'reject',
                                user_id: $('#user_id').val()
                            }
                        }).then(response => {
                            try {
                                return JSON.parse(response);
                            } catch (error) {
                                throw new Error('Invalid response format');
                            }
                        }).catch(error => {
                            Swal.showValidationMessage(`Request failed: ${error.message}`);
                        });
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                    if (result.isConfirmed) {
                        const response = result.value;
                        
                        if (response.responseMessage === 'success') {
                            Swal.fire({
                                title: 'Rejected!',
                                text: response.responseDescription,
                                icon: 'success',
                                confirmButtonColor: '#dc3545'
                            }).then(() => {
                                // Reload the page or refresh the pending transfers section
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: response.responseDescription || 'Failed to reject transfer',
                                icon: 'error',
                                confirmButtonColor: '#dc3545'
                            });
                            
                            // Re-enable button and restore text
                            $btn.prop('disabled', false);
                            $btn.html(originalText);
                        }
                    } else {
                        // Re-enable button and restore text if cancelled
                        $btn.prop('disabled', false);
                        $btn.html(originalText);
                    }
                });
            });

            // Handle cancel transfer button
            $('body').on('click', '.cancel-transfer-btn', function() {
                const transferId = $(this).data('transfer-id');
                const $btn = $(this);
                const originalText = $btn.html();
                
                Swal.fire({
                    title: 'Cancel Transfer?',
                    text: 'Are you sure you want to cancel this transfer request? This action cannot be undone.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, Cancel!',
                    cancelButtonText: 'Keep Request',
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        // Disable button and show loading
                        $btn.prop('disabled', true);
                        $btn.html('<i class="fas fa-spinner fa-spin me-1"></i>Cancelling...');
                        
                        return $.ajax({
                            url: '../../controller/scripts/affiliate/school/cancel_transfer_request.php',
                            type: 'POST',
                            data: {
                                transfer_id: transferId,
                                user_id: $('#user_id').val()
                            }
                        }).then(response => {

                            console.log(response);

                            try {
                                return JSON.parse(response);
                            } catch (error) {
                                throw new Error('Invalid response format');
                            }
                        }).catch(error => {
                            Swal.showValidationMessage(`Request failed: ${error.message}`);
                        });
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                    if (result.isConfirmed) {
                        const response = result.value;
                        
                        if (response.responseMessage === 'success') {
                            Swal.fire({
                                title: 'Cancelled!',
                                text: response.responseDescription,
                                icon: 'success',
                                confirmButtonColor: '#dc3545'
                            }).then(() => {
                                // Reload the page or refresh the transfer requests section
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: response.responseDescription || 'Failed to cancel transfer request',
                                icon: 'error',
                                confirmButtonColor: '#dc3545'
                            });
                            
                            // Re-enable button and restore text
                            $btn.prop('disabled', false);
                            $btn.html(originalText);
                        }
                    } else {
                        // Re-enable button and restore text if cancelled
                        $btn.prop('disabled', false);
                        $btn.html(originalText);
                    }
                });
            });



                
                       


    </script>

    