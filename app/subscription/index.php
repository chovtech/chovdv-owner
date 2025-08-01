<?php
    include('../../controller/session/session-checker-owner.php');
   
    if ($DefaultLanguage == '') {
        include('../../lang/english.php');
    } else {
        include('../../lang/' . $DefaultLanguage . '.php');
    }

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
    <title>EduMESS - Subscription</title>
    
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
    
    <!-- <script src="../../css/app_css/tailwind.16"></script> -->
  
    <link href="../../assets/plugins/notify/wnoty.css" rel="stylesheet">
    <script src="../../assets/plugins/sweetalert2@11.js"></script>

    <script type="text/javascript" src="https://sdk.monnify.com/plugin/monnify.js"></script>


    <style>
      
        
        :root {
            --primary-50: #EEF2FF;
            --primary-100: #E0E7FF;
            --primary-500: #6366F1;
            --primary-600: #4F46E5;
            --primary-700: #4338CA;
        }
        
      

        .pros_card {
            border: none;
            box-shadow: 0 2px 15px -3px rgba(0, 0, 0, 0.07), 0 10px 20px -2px rgba(0, 0, 0, 0.04);
            transition: all 0.3s ease;
            border-radius: 1rem;
        }

        .pros_card:hover {
            transform: translateY(-2px);
        }

        /* .btn-primary {
            background-color: var(--primary-600);
            border-color: var(--primary-600);
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            border-radius: 0.75rem;
        }

        .btn-primary:hover {
            background-color: var(--primary-700);
            border-color: var(--primary-700);
        }

        .text-primary {
            color: var(--primary-600) !important;
        }

        .bg-primary-50 {
            background-color: var(--primary-50);
        } */

        .form-control, .form-select {
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
            border-color: #e2e8f0;
            font-size: 0.875rem;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-500);
            box-shadow: 0 0 0 0.2rem rgba(99, 102, 241, 0.1);
        }

        .input-group-text {
            border-radius: 0.75rem;
            border-color: #e2e8f0;
            background-color: #fff;
        }

        .table {
            margin-bottom: 0;
        }

        .table th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            color: #64748b;
            padding: 1rem;
        }

        .table td {
            padding: 1rem;
            vertical-align: middle;
        }

        .badge {
            padding: 0.5rem 1rem;
            font-weight: 500;
            border-radius: 9999px;
            font-size: 0.75rem;
        }

        .badge-payment {
            background-color: #e3f2fd;
            color: #1976d2;
        }

        .badge-topup {
            background-color: #f3e5f5;
            color: #7b1fa2;
        }

        .badge-success {
            background-color: #d4edda;
            color: #155724;
        }

        .badge-warning {
            background-color: #fff3cd;
            color: #856404;
        }

        .btn-link {
            padding: 0.5rem;
            border-radius: 0.5rem;
            transition: all 0.2s;
        }

        .btn-link:hover {
            background-color: var(--primary-50);
        }

        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1050;
            animation: fadeIn 0.3s ease-out;
        }

        .modal-overlay.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .transaction-details {
            background: #fff;
            border-radius: 1rem;
            padding: 1.5rem;
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            animation: slideUp 0.3s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .info-item {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 0.75rem;
            height: 100%;
        }

        .info-item label {
            display: block;
            color: #64748b;
            font-size: 0.875rem;
            margin-bottom: 0.25rem;
        }

        .info-item span {
            color: #1e293b;
            font-weight: 500;
        }

        .close-modal {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: none;
            border: none;
            color: #64748b;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 50%;
            transition: all 0.2s;
            width: 2rem;
            height: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .close-modal:hover {
            background: #f8f9fa;
            color: #1e293b;
        }

        .btn-group .btn {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
        }

        .btn-outline-secondary {
            border-color: #e2e8f0;
            color: #64748b;
        }

        .btn-outline-secondary:hover {
            background-color: #f8f9fa;
            border-color: #e2e8f0;
            color: #1e293b;
        }

        /* --- Enhanced Transaction History UI --- */
        .term-section {
            border: 1px solid #e2e8f0;
            border-radius: 0.75rem;
            margin-bottom: 1.5rem;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.03);
        }
        .term-header {
            cursor: pointer;
            padding: 1rem 1.5rem;
            background: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-weight: 600;
            font-size: 1.1rem;
            border-radius: 0.75rem 0.75rem 0 0;
            transition: background 0.2s;
        }
        .term-header:hover {
            background: #e0e7ff;
        }
        .term-table-container {
            padding: 0 1.5rem 1rem 1.5rem;
            display: none;
        }
        .term-table-container.active {
            display: block;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f6f8fa;
        }
        .collapse-btn {
            background: none;
            border: none;
            font-size: 1.2rem;
            margin-left: 0.5rem;
            color: #6366f1;
            cursor: pointer;
        }
       
    </style>
</head>

<body>
    <!-- Preloader -->
    <div id="preloader" style="position:fixed;top:0;left:0;width:100vw;height:100vh;background:rgba(255,255,255,0.7);z-index:9999;display:none;align-items:center;justify-content:center;">
        <div style="border:8px solid #f3f3f3;border-top:8px solid #3498db;border-radius:50%;width:60px;height:60px;animation:spin 1s linear infinite;"></div>
    </div>
    <style>
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    </style>
    <div class="grid-container">
        <!-- Header -->
        <?php include('../../includes/app-header.php'); ?>
        
        <!-- Sidebar -->
        <?php include('../../includes/app-menu.php'); ?>
        
        <!-- Floating Button -->
        <?php include('../../includes/floating-btn.php'); ?>
        
        <!-- Settings Menu -->
        <?php include('../../includes/setting-menu.php'); ?>


            <?php
                $pros_get_current_term = mysqli_query($link,"SELECT * FROM session 
                INNER JOIN termorsemester WHERE session.sessionStatus='1'
                AND termorsemester.status=1");//PROS GET CURRENT TERM AND SESSION HERE
                $pros_get_current_term_fetch = mysqli_fetch_assoc($pros_get_current_term);
            ?>

        <!-- Main Content -->
        <main class="main-container">
            <div class="main-cards">
                <div class="container py-5 mt-0">
                     <!-- Header with Wallet -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h1 class="h2 fw-bold text-dark mb-3">EduMESS Subscription</h1>
                            <div class="d-flex gap-4 text-muted small">
                                <span class="d-flex align-items-center">
                                    <i class="fas fa-calendar-alt me-2"></i>
                                   <input type="hidden" id="currentSessionID" value="<?php echo $pros_get_current_term_fetch['sessionName'] ?>">
                                    <span id="currentSession"><?php echo $pros_get_current_term_fetch['sessionName'] ?></span>
                                </span>
                                <span class="d-flex align-items-center">
                                    <i class="fas fa-book me-2"></i>
                                    <input type="hidden" id="currentTermID" value="<?php echo $pros_get_current_term_fetch['TermOrSemesterID'] ?>">
                                    <span id="currentTerm"><?php echo $pros_get_current_term_fetch['TermOrSemesterName'] ?></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <div class="d-flex align-items-center justify-content-md-end gap-3 mb-2">
                                <p class="text-muted small mb-0">Wallet Balance</p>
                                <a href="../wallet" class="btn btn-link text-primary p-0 small">
                                    <i class="fas fa-plus-circle me-1"></i>
                                    Top Up
                                </a>
                            </div>
                            
                            <p class="h2 fw-bold mb-0">₦ 
                              <?php 
                                echo $pros_wallet_bal =  (!empty($rowGetUserDetails['WalletBalance']) && is_numeric($rowGetUserDetails['WalletBalance'])) 
                                    ? number_format($rowGetUserDetails['WalletBalance'], 2) 
                                    : number_format(0, 2); 

                                    

                                     echo '<input type="hidden" value="'.$rowGetUserDetails['WalletBalance'].'" id="pros_wall_bal">';
                                ?>
                            </p>
                        </div>
                    </div>

                    <!-- Main Content Grid -->
                    <div class="row g-4">
                        <!-- Left Column: Quick Actions -->
                        <div class="col-lg-4 order-2 order-lg-1">
                            <div class="d-grid gap-3">
                                <a  class="card p-3 text-start border-0 pros_card text-decoration-none" href="../upgrade">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary-50 rounded-3 p-2 me-3">
                                            <i class="fas fa-arrow-up text-primary"></i>
                                        </div>
                                        <div >
                                            <h4 class="h6 fw-medium mb-1 " style="color: #212529;">Upgrade Plan</h4>
                                            <p class="small text-muted mb-0">Get more features</p>
                                        </div>
                                    </div>
                                </a>
                                <button class="card p-3 text-start border-0 pros_card">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary-50 rounded-3 p-2 me-3">
                                            <i class="fas fa-history text-primary"></i>
                                        </div>
                                        <div>
                                            <h4 class="h6 fw-medium mb-1">View History</h4>
                                            <p class="small text-muted mb-0">Payment records</p>
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </div>

                        <!-- Right Column: Payment & History -->
                        <div class="col-lg-8 order-1 order-lg-2">
                            <!-- Move Payment Method to the top -->
                            <div class="card mb-3 pros_card">
                                <div class="card-body p-3">
                                    <div class="mb-2">
                                         <h4 class="h6 fw-medium mb-1 " style="color: #212529;">Payment Method</h4>
                                        <!-- <label class="form-label fw-medium">Payment Method</label> -->
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="paymentMethod" id="walletPayment" value="wallet">
                                                <label class="form-check-label" for="walletPayment">Wallet</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="paymentMethod" id="instantPayment" value="instant" checked>
                                                <label class="form-check-label" for="instantPayment">Instant Payment </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Payment Card -->
                            <div class="card mb-4 pros_card">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <h3 class="h5 fw-semibold mb-0"></h3>
                                        <span class="text-muted small prosloadnumber_student"> </span>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label fw-medium">Select Campus</label>
                                        <select id="campusSelect" class="form-select pro_load_payment_campus">
                                           
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-medium">Select Term</label>
                                        <select id="TermSelect" class="form-select pro_load_payment_term">
                                          <option value="NULL">Select campus to load term</option>
                                        </select>
                                    </div>

                                    <!-- Place this just before the Number of Students input -->
                                    <div class="mb-2">
                                    <marquee behavior="scroll" direction="left" scrollamount="5" style="color: #842029; background: #fff3cd; border: 1px solid #ffeeba; padding: 10px; font-weight: 600; border-radius: .25rem;">
                                        ⚠️ Warning: Do not enter more than your actual number of students. No refunds after payment. Please confirm your student count before proceeding.
                                    </marquee>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label fw-medium">Number of Students </label>
                                        <div class="input-group">
                                            <input type="number" id="studentCount" class="form-control" min="1" placeholder="Enter number of students">
                                            <span class="input-group-text">
                                                <i class="fas fa-users text-muted"></i>
                                            </span>
                                        </div>
                                        <small class="text-muted  mt-1  ms-2 paidfor_fullcontent " style="display: none;">
                                            No. of Students Paid For: <span id="studentsPaidFor">0</span> &nbsp;|&nbsp; No. of Students Remaining: <span id="studentsRemaining">0</span>
                                        </small>


                                    </div>
                                  
                                   


                                    <div class="bg-light rounded-3 p-4 mb-4">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="text-muted small mb-1">Total Amount</p>
                                                <p class="h3 fw-bold mb-0">₦<span id="totalAmount">0.00</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" class="pros_number_student_input">
                                    <input type="hidden" class="pros_amount_per_student_input">
                                    <input type="hidden" class="pros_plan_id_hidden">
                                    <input type="hidden" class="pros_load_paid_studnum">

                                   

                                   
                                    <div class="mb-4">
                                        <button id="makePaymentBtn" disabled class="btn btn-primary w-100">
                                            <i class="fas fa-credit-card me-2"></i>
                                            Make Payment
                                        </button> 
                                    </div>
                                    <center><small class="small text-muted mb-0 ">₦ <span class="prosload_amount_per_student"></span></small> </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>




     <!-- Transaction History Modal -->
     <div class="modal fade" id="historyModal" tabindex="-1" aria-labelledby="historyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 pb-0">
                    <div>
                        <h5 class="modal-title fw-semibold" id="historyModalLabel">Transaction History</h5>
                        <p class="text-muted small mb-0">View and manage your payment history</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class=" justify-content-between align-items-center mb-4">
                        <div class="row">
                          <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm" id="transactionSearch" placeholder="Search transactions...">
                                    <span class="input-group-text">
                                        <i class="fas fa-search text-muted"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select form-select-sm pros_transaction_hist_session">
                                    <option value="all">Session</option>

                                            <?php

                                                    $abba_sql_session = ("SELECT * FROM `session` ORDER BY sessionName DESC");
                                                    $abba_result_session = mysqli_query($link, $abba_sql_session);
                                                    $abba_row_session = mysqli_fetch_assoc($abba_result_session);
                                                    $abba_row_cnt_session = mysqli_num_rows($abba_result_session);

                                                    if ($abba_row_cnt_session > 0) {
                                                        do {
                                                            if ($abba_row_session['sessionStatus'] == '1') {
                                                                $abba_selected_session = 'selected';
                                                            } else {
                                                                $abba_selected_session = '';
                                                            }
                                                            echo '<option value="' . $abba_row_session['sessionName'] . '" ' . $abba_selected_session . '>' . $abba_row_session['sessionName'] . '</option>';

                                                        } while ($abba_row_session = mysqli_fetch_assoc($abba_result_session));
                                                    } else {
                                                        echo '<option value="0">No Records Found</option>';
                                                    }
                                        ?>
                                    <!-- <option value="payments">Payments</option>
                                    <option value="topups">Top-ups</option>
                                    <option value="refunds">Refunds</option> -->
                                </select>
                            </div>
                            <!-- <div class="col-3">
                            <select class="form-select form-select-sm">
                                <option value="7">Term</option>
                               
                            </select>
                            </div> -->
                        </div>
                    </div>

                    <div class="table-responsive prosload_transaction_history">
                    </div>
                    <div class="pagination-container"></div>

                    
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
    <?php include('../../controller/js/app/header.php'); ?>

    <!-- current page js -->
    <?php include('../../js/current_page.php'); ?>

    <script>

         $(document).ready(function() {

                var userID = $('#user_id').val();
                var usertype = $('#user_type').val();
                var instutitionID = $(".abba-change-institution option:selected").val();

                // pros process to load content base on institution
                prosload_payment_campus(instutitionID);
                

                function prosload_payment_campus(instutitionID) {
                    showPreloader();
                    $('.pro_load_payment_campus').html('<option value="NULL"><i class="fa fa-spinner fa-spin"></i> Loading...</option>');
                    // get campus ajax
                    var dataString = 'pros_instituion_id=' + instutitionID;

                    $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/edumessssubscription/pros_get_campus.php",
                        data: dataString,
                        //cache: false,
                        success: function (output) {
                            // alert(output);
                            $('.pro_load_payment_campus').html(output);

                            var selectedOption = $('.pro_load_payment_campus').find('option:selected');
                            var numStudent = parseInt(selectedOption.data('numstudent')) || 0;
                            var plan_amount = parseInt(selectedOption.data('planprice')) || 0;
                            var planid = parseInt(selectedOption.data('planid')) || 0;
                            var studpaid = parseInt(selectedOption.data('studpaid')) || 0;
                            
                            var prosload_campval = selectedOption.val();

                            prosload_term_forpayment(prosload_campval)

                            proload_number_student(numStudent,plan_amount,planid,studpaid);
                            hidePreloader();
                        },
                        error: function() { hidePreloader(); }
                    });
                    
                }
                    

                // get total student here
                $('.pro_load_payment_campus').on('change', function() {
                    var selectedOption = $(this).find('option:selected');
                    var numStudent = parseInt(selectedOption.data('numstudent')) || 0;
                    var plan_amount = parseInt(selectedOption.data('planprice')) || 0;
                    var planid = parseInt(selectedOption.data('planid')) || 0;
                    var studpaid = parseInt(selectedOption.data('studpaid')) || 0;

                    proload_number_student(numStudent,plan_amount,planid,studpaid);

                    var campusID = $(this).find('option:selected').val();

                    prosload_term_forpayment(campusID);//load campus term here
                });

                // pros load term here
                function prosload_term_forpayment(campusID)
                {
                    showPreloader();
                    $('.pro_load_payment_term').html('<option value="NULL"><i class="fa fa-spinner fa-spin"></i> Loading...</option>');
                    var instutitionID = $(".abba-change-institution option:selected").val();
                    var userID = $('#user_id').val();
                    var usertype = $('#user_type').val();

                    $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/edumessssubscription/prosload_termforpayment.php",
                        data: {
                            campusID,
                            userID,
                            usertype,
                            instutitionID
                        },
                        //cache: false,
                        success: function (output) {
                            // alert(output);
                            $('.pro_load_payment_term').html(output);

                            var selectedOption = $('.pro_load_payment_term').find('option:selected');
                            var paidfor = parseInt(selectedOption.data('paid')) || 0;
                            var reamining = parseInt(selectedOption.data('rem')) || 0;
                            
                            prosload_payrem(paidfor,reamining);
                            hidePreloader();
                        },
                        error: function() { hidePreloader(); }
                    });
                }


                $('.pro_load_payment_term').on('change', function() {
                    var selectedOption = $(this).find('option:selected');
                        var paidfor = parseInt(selectedOption.data('paid')) || 0;
                        var reamining = parseInt(selectedOption.data('rem')) || 0;
                        prosload_payrem(paidfor,reamining);
                });

                function  prosload_payrem(paidfor,reamining){
                    $('.paidfor_fullcontent').show();
                        $('#studentsPaidFor').html(paidfor);
                        $('#studentsRemaining').html(reamining);
                }

                function proload_number_student(numStudent,plan_amount,planid, studpaid) {
                        $('.prosloadnumber_student').text('No.of Students: ' + numStudent);
                        $('.pros_number_student_input').val(numStudent);

                        $('.prosload_amount_per_student').text(plan_amount + '/student/term' );
                        $('.pros_amount_per_student_input').val(plan_amount);
                        $('.pros_plan_id_hidden').val(planid);
                        $('.pros_load_paid_studnum').val(studpaid);

                        
                }   

        });

        $('.abba-change-institution').on('change', function() {
                var instutitionID = $(this).find("option:selected").val();
                prosload_payment_campus(instutitionID);
        });

        // pros load transaction hist

        $(document).ready(function() {

            var instutitionID = $(".abba-change-institution option:selected").val();
            var userID = $('#user_id').val();
            var usertype = $('#user_type').val();
            var session = $(".pros_transaction_hist_session option:selected").val();
            prosload_transaction(instutitionID,userID,usertype,session);
        });

        $('.pros_transaction_hist_session').on('change', function() {
                var instutitionID = $(".abba-change-institution option:selected").val();
                var userID = $('#user_id').val();
                var usertype = $('#user_type').val();
                var session =$(this).find("option:selected").val();
                prosload_transaction(instutitionID,userID,usertype,session);
        });


        // Global state
        let allTransactions = [];
        let currentInstitutionID = '';
        let currentUserID = '';
        let currentUserType = '';
        let currentSession = '';

        //  Load Transactions (AJAX)
        function prosload_transaction(institutionID, userID, usertype, session, page = 1) {
            // Save current filters
            currentInstitutionID = institutionID;
            currentUserID = userID;
            currentUserType = usertype;
            currentSession = session;

            // Show loading spinner for transaction history
            $('.prosload_transaction_history').html('<div align="center"><i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i><br><small class="text-muted">Loading transaction history...</small></div>');
            showPreloader();
            $.ajax({
                url: "../../controller/scripts/owner/edumessssubscription/pros_get_transac_history.php",
                type: 'POST',
                data: {
                    institutionID,
                    userID,
                    usertype,
                    session,
                    page
                },
                success: function (response) {
                    if (response.success) {
                        allTransactions = response.data.transactions_grouped; // Now grouped by term
                        displaytractions(allTransactions);
                        renderPagination(response.data.pagination);
                    } else {
                        showError('Failed to load transactions.');
                    }
                    hidePreloader();
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Status:", status);
                    console.error("AJAX Error:", error);
                    console.log("Response Text:", xhr.responseText);
                    showError('Error occurred while loading.');
                    hidePreloader();
                }
            });
        }

        //Display Transactions (Grouped by Term)
        function displaytractions(groupedTransactions) {
            const container = $('.prosload_transaction_history');
            container.empty();

            if (!groupedTransactions || Object.keys(groupedTransactions).length === 0) {
                const emptyCard = `
                    <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                        <img src="https://cdn-icons-png.flaticon.com/512/7486/7486800.png" alt="No data" style="width: 60px; opacity: 0.8;">
                        <div><strong>No transactions found</strong></div>
                        <small class="text-muted">Try a different search or filter.</small>
                    </div>`;
                container.append(emptyCard);
                return;
            }

            // Collapse/Expand All Buttons
            let controls = `
                <div class="d-flex justify-content-end mb-2 gap-2">
                    <button class="btn btn-sm btn-outline-secondary" id="expandAllTerms">Expand All</button>
                    <button class="btn btn-sm btn-outline-secondary" id="collapseAllTerms">Collapse All</button>
                </div>
            `;
            container.append(controls);

            let html = '';
            let termIndex = 0;
            for (const [term, transactions] of Object.entries(groupedTransactions)) {
                const sectionId = `term-section-${termIndex}`;
                html += `
                    <div class="term-section">
                        <div class="term-header" data-target="#${sectionId}">
                            <span>
                                <i class="fas fa-chevron-down me-2"></i>
                                ${term} <span class="badge bg-primary ms-2">${transactions.length}</span>
                            </span>
                        </div>
                        <div class="term-table-container" id="${sectionId}">
                            <table class="table table-hover table-striped align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Date & Time</th>
                                        <th>Transaction Ref</th>
                                        <th>Type</th>
                                        <th>Campus</th>
                                        <th>Session</th>
                                        <th>Term/Semester</th>
                                        <th>Students</th>
                                        <th>Amount Paid</th>
                                    </tr>
                                </thead>
                                <tbody>
                `;
                transactions.forEach(tx => {
                    const dateTime = new Date(tx.DatePaid);
                    const date = dateTime.toLocaleDateString();
                    const time = dateTime.toLocaleTimeString();

                    html += `
                        <tr>
                            <td>
                                <div class="small fw-medium">${date}</div>
                                <div class="small text-muted">${time}</div>
                            </td>
                            <td class="small text-muted">${tx.ref_number || 'N/A'}</td>
                            <td>
                                <span class="badge badge-payment">
                                    <i class="fas fa-credit-card me-1"></i>
                                    ${tx.transaction_method || 'N/A'}
                                </span>
                            </td>
                            <td class="small">${tx.CampusName || 'N/A'}</td>
                            <td class="small">${tx.SessionName || 'N/A'}</td>
                            <td class="small">${tx.TermAliasName || 'N/A'}</td>
                            <td class="small">${isNaN(tx.num_of_studentnew) ? (tx.num_of_studentnew || 'N/A') : tx.num_of_studentnew}</td>
                            <td>
                                <div class="small fw-medium">₦${parseFloat(tx.ActualAmount || 0).toLocaleString()}</div>
                            </td>
                        </tr>
                    `;
                });
                html += `
                                </tbody>
                            </table>
                        </div>
                    </div>
                `;
                termIndex++;
            }
            container.append(html);

            // By default, expand the first term section
            $('.term-table-container').first().addClass('active');
            $('.term-header').first().find('i').removeClass('fa-chevron-down').addClass('fa-chevron-up');

            // Toggle collapse/expand on header click
            $('.term-header').on('click', function() {
                const target = $($(this).data('target'));
                const icon = $(this).find('i');
                if (target.hasClass('active')) {
                    target.removeClass('active');
                    icon.removeClass('fa-chevron-up').addClass('fa-chevron-down');
                } else {
                    target.addClass('active');
                    icon.removeClass('fa-chevron-down').addClass('fa-chevron-up');
                }
            });

            // Expand/Collapse All
            $('#expandAllTerms').on('click', function() {
                $('.term-table-container').addClass('active');
                $('.term-header i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
            });
            $('#collapseAllTerms').on('click', function() {
                $('.term-table-container').removeClass('active');
                $('.term-header i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
            });
        }

        // Live Search Input
        $('#transactionSearch').on('input', function () {
            const query = $(this).val().toLowerCase().trim();

            if (query === '') {
                displaytractions(allTransactions);
                return;
            }

            // Flatten all grouped transactions into a single array
            let flatTransactions = [];
            for (const txArr of Object.values(allTransactions)) {
                flatTransactions = flatTransactions.concat(txArr);
            }

            // Filter the flat array
            const filtered = flatTransactions.filter(tx => {
                return (
                    (tx.ref_number && tx.ref_number.toLowerCase().includes(query)) ||
                    (tx.transaction_type && tx.transaction_method && tx.transaction_method.toLowerCase().includes(query)) ||
                    (tx.CampusName && tx.CampusName.toLowerCase().includes(query)) ||
                    (tx.SessionName && tx.SessionName.toLowerCase().includes(query)) ||
                    (tx.TermOrSemesterName && tx.TermOrSemesterName.toLowerCase().includes(query))||
                    (tx.ActualAmount && tx.ActualAmount.toString().toLowerCase().includes(query)) ||
                    (tx.TermAliasName && tx.TermAliasName.toLowerCase().includes(query))
                );
            });

            // Regroup filtered transactions by term
            const regrouped = {};
            filtered.forEach(tx => {
                const term = tx.TermAliasName || tx.TermOrSemesterName || 'Unknown Term';
                if (!regrouped[term]) regrouped[term] = [];
                regrouped[term].push(tx);
            });

            displaytractions(regrouped);
        });

        // Pagination Renderer
        function renderPagination(pagination) {
            const container = $('.pagination-container');

            const { current_page, total_pages, total_records, limit } = pagination;
            const start = (current_page - 1) * limit + 1;
            const end = Math.min(current_page * limit, total_records);

            let html = `
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="small text-muted">
                        Showing <span class="fw-medium">${start}</span> to <span class="fw-medium">${end}</span> of <span class="fw-medium">${total_records}</span> transactions
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-secondary" ${current_page === 1 ? 'disabled' : ''} 
                            onclick="prosload_transaction(currentInstitutionID, currentUserID, currentUserType, currentSession, ${current_page - 1})">
                            <i class="fas fa-chevron-left me-1"></i>
                            Previous
                        </button>
                        <div class="btn-group">
            `;

            for (let i = 1; i <= total_pages; i++) {
                if (i === current_page) {
                    html += `<button class="btn btn-sm btn-primary">${i}</button>`;
                } else {
                    html += `<button class="btn btn-sm btn-outline-secondary" onclick="prosload_transaction(currentInstitutionID, currentUserID, currentUserType, currentSession, ${i})">${i}</button>`;
                }
            }

            html += `
                        </div>
                        <button class="btn btn-sm btn-outline-secondary" ${current_page === total_pages ? 'disabled' : ''} 
                            onclick="prosload_transaction(currentInstitutionID, currentUserID, currentUserType, currentSession, ${current_page + 1})">
                            Next
                            <i class="fas fa-chevron-right ms-1"></i>
                        </button>
                    </div>
                </div>
            `;

            container.html(html);
        }

    </script>



    <script>

        document.addEventListener('DOMContentLoaded', function() {
            const studentCountInput = document.getElementById('studentCount');
            const totalAmountSpan = document.getElementById('totalAmount');
            const makePaymentBtn = document.getElementById('makePaymentBtn');
            const campusSelect = document.getElementById('campusSelect');
            const perstudentinput = document.querySelector('.pros_amount_per_student_input');
            const number_studdent = document.querySelector('.pros_number_student_input');
            const planidsec = document.querySelector('.pros_plan_id_hidden');
            const paidnostu_sel = document.querySelector('.pros_load_paid_studnum');

            
            const pros_wallet = document.getElementById('pros_wall_bal');

                                   
            const historyModal = new bootstrap.Modal(document.getElementById('historyModal'));

            // Calculate total amount when number of students changes
            studentCountInput.addEventListener('input', function() {

                const pricePerStudent =  parseInt(perstudentinput.value) || 0;
                const number_student_val =  parseInt(number_studdent.value) || 0;
                const paid_studencount = parseInt(paidnostu_sel.value) || 0; 
                const count = parseInt(this.value) || 0;
                // alert(number_student_val);

                if(count > number_student_val)
                {
                    showError('Hey!! your input value should not be greater than your number of student for the campus selected');
                    totalAmountSpan.textContent = 0.00.toFixed(2);
                    return;
                    
                }

                // if(paid_studencount >= number_student_val)
                // {

                //     showError('Hey!! payment already made for all the student of the campus selected');
                //     totalAmountSpan.textContent = 0.00.toFixed(2);
                //     return;

                // }
                

                const total = count * pricePerStudent;

                // Check selected payment method
                const paymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value;
                if(paymentMethod === 'wallet') {
                    if(total > parseInt(pros_wallet.value))
                    {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Insufficient Wallet Balance',
                            text: `Your wallet balance is ₦${pros_wallet.value.toLocaleString()}. Please top up to proceed.`,
                            showCancelButton: true,
                            confirmButtonText: 'Top Up Wallet'
                        }).then(result => {
                            if (result.isConfirmed) {
                                window.location.href = '../../app/wallet/';
                            }
                        });
                        totalAmountSpan.textContent = 0.00.toFixed(2);
                        makePaymentBtn.disabled = true;
                        return;
                    }
                }

                totalAmountSpan.textContent = total.toFixed(2);
                makePaymentBtn.disabled = false; // Enable button when input is valid
            });

            // Listen for payment method change to update button state
            document.querySelectorAll('input[name="paymentMethod"]').forEach(function(radio) {
                radio.addEventListener('change', function() {
                    studentCountInput.dispatchEvent(new Event('input'));
                });
            });

            // Set 'instant' as the default payment method on page load
            document.getElementById('instantPayment').checked = true;
            document.getElementById('walletPayment').checked = false;

            // Make payment button click handler
            makePaymentBtn.addEventListener('click', function() {
                const count = parseInt(studentCountInput.value) || 0;
                const campus = campusSelect.value;
                const pricePerStudent =  parseInt(perstudentinput.value) || 0;
                const plan_id = parseInt(planidsec.value) || 0;
                const total_payment = count * pricePerStudent;
                var userID = $('#user_id').val();
                var usertype = $('#user_type').val();
                var session = $('#currentSessionID').val();
                var term = $('.pro_load_payment_term').val();
                const pros_wallet_bal = $('#pros_wall_bal').val();
                if (!campus) {
                    showError('Please select a campus');
                    return;
                }
                if (count < 1) {
                    showError('Please enter a valid number of students');
                    return;
                }
                // Check selected payment method
                const paymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value;
                if(paymentMethod === 'wallet') {
                    // Show confirmation dialog before proceeding
                    Swal.fire({
                        icon: 'question',
                        title: 'Confirm Payment',
                        html: `This payment of <b>₦${total_payment.toLocaleString()}</b> will be deducted from your wallet. Do you want to proceed?`,
                        showCancelButton: true,
                        confirmButtonText: 'Yes, Proceed',
                        cancelButtonText: 'Cancel',
                        reverseButtons: true
                    }).then((result) => {
                        if (!result.isConfirmed) {
                            return;
                        }
                        $('#makePaymentBtn').html('<i class="fa fa-spinner fa-spin me-2"></i>Processing Payment...').prop('disabled', true);
                        showPreloader();
                        var instutitionID = $(".abba-change-institution option:selected").val();
                        $.ajax({
                            type: "POST",
                            url: "../../controller/scripts/owner/edumessssubscription/pros_sch_payment.php",
                            data: {
                                num_student: count,
                                campus_id: campus,
                                total_payment: total_payment,
                                institutionID: instutitionID,
                                userID: userID,
                                usertype: usertype,
                                session: session,
                                term: term,
                                transaction_method: 'wallet',
                                plan_id: plan_id,
                                discount: '0'
                            },
                            dataType: "json",
                            success: function (response) {
                                if (response.status === 'success') {
                                   
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Payment Successful!',
                                        html: 'Your payment has been recorded successfully.<br><br>' +
                                            '<strong>Do you want to allocate this payment to students now?</strong><br>' +
                                            '<small class="text-muted">You can always do this later from the Student Allocation menu.</small>',
                                        showCancelButton: true,
                                        confirmButtonText: 'Yes, Allocate Now',
                                        cancelButtonText: 'Close',
                                        reverseButtons: true
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = '../payment-allocation';
                                        } else {
                                            location.reload();
                                        }
                                    });
                                } else {
                                    showError(response.message)
                                }
                                hidePreloader();
                            },
                            error: function (xhr, status, error) {
                                console.log("AJAX Error: " + error);
                                console.log("Raw response from server:", xhr.responseText);
                                hidePreloader();
                            },
                            complete: function () {
                                $('#makePaymentBtn').prop('disabled', false).html(`<i class="fas fa-credit-card me-2"></i>\n                        Make Payment`);
                            }
                        });
                    });
                } else if(paymentMethod === 'instant') {
                    // Monnify Instant Payment Integration
                    // TODO: Replace with your Monnify public key and contract code
                    const monnifyApiKey = '<?php echo $MonnifyTestPaymentApi; ?>'; // <-- Replace
                    const monnifyContractCode = '<?php echo $MonnifyTestContractCode; ?>'; // <-- Replace
                    const customerEmail = '<?php echo $Email; ?>' || 'customer@email.com';
                    const customerName = '<?php echo $PrimaryName; ?>' || 'Customer';
                    // You may want to generate a unique reference for each payment
                    const paymentReference = 'EDUMESS-' + Date.now();
                    // Open Monnify modal
                    MonnifySDK.initialize({
                        amount: total_payment,
                        currency: 'NGN',
                        reference: paymentReference,
                        customerName: customerName,
                        customerEmail: customerEmail,
                        apiKey: monnifyApiKey,
                        contractCode: monnifyContractCode,
                        paymentDescription: `Subscription payment for ${count} students`,
                        onComplete: function(response) {
                            // Handle Monnify payment completion

                            
                            if(response.paymentReference && response.status === 'SUCCESS') {
                                // Notify your backend to credit the user
                                showPreloader();
                                $.ajax({
                                    type: "POST",
                                    url: "../../controller/scripts/owner/edumessssubscription/pros_sch_payment.php",
                                    data: {
                                        num_student: count,
                                        campus_id: campus,
                                        total_payment: total_payment,
                                        institutionID: $(".abba-change-institution option:selected").val(),
                                        userID: userID,
                                        usertype: usertype,
                                        session: session,
                                        term: term,
                                        transaction_method: 'transfer',
                                        plan_id: plan_id,
                                        discount: '0',
                                        monnify_reference: response.paymentReference
                                    },
                                    dataType: "json",
                                    success: function (res) {
                                        if (res.status === 'success') {
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Payment Successful!',
                                                html: 'Your payment has been recorded successfully.<br><br>' +
                                                    '<strong>Do you want to allocate this payment to students now?</strong><br>' +
                                                    '<small class="text-muted">You can always do this later from the Student Allocation menu.</small>',
                                                showCancelButton: true,
                                                confirmButtonText: 'Yes, Allocate Now',
                                                cancelButtonText: 'Close',
                                                reverseButtons: true
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    window.location.href = '../payment-allocation';
                                                } else {
                                                    location.reload();
                                                }
                                            });
                                        } else {
                                            showError(res.message)
                                        }
                                        hidePreloader();
                                    },
                                    error: function (xhr, status, error) {
                                        alert(error);
                                        showError('Error processing Monnify payment.');
                                        hidePreloader();
                                    }
                                });
                            } else {
                                showError('Monnify payment was not successful.');
                                hidePreloader();
                            }
                        },
                        onClose: function() {
                            // User closed Monnify modal
                        }
                    });
                }
            });

            // View History button click handler
            document.querySelector('button:has(i.fa-history)').addEventListener('click', function() {
                historyModal.show();
            });
        });

        function showTransactionDetails(transactionId) {
            const modal = document.getElementById('transactionModal');
            modal.classList.add('active');
            // Here you would typically fetch and populate transaction details
        }

        function hideTransactionDetails() {
            const modal = document.getElementById('transactionModal');
            modal.classList.remove('active');
        }

        function showError(message) {
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: message,
            confirmButtonText: 'Close'
             });
        }


        function showSuccess(message) {
            Swal.fire({
            icon: 'success',
            title: 'Success',
            text: message,
            confirmButtonText: 'Close'
             });
        }
       
   </script>

    <script>
        function showPreloader() {
            document.getElementById('preloader').style.display = 'flex';
        }
        function hidePreloader() {
            document.getElementById('preloader').style.display = 'none';
        }
    </script>

    <!-- Add Monnify SDK script tag if not already present -->
    <?php
        if (!isset($monnify_sdk_loaded)) {
            echo '<script src="https://sdk.monnify.com/plugin/monnify.js"></script>';
            $monnify_sdk_loaded = true;
        }
    ?>
</body>
</html>