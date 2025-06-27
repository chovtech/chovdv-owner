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
    <title>EduMESS - Pricing Plans</title>
    
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


    

    <style>
        :root {
            --primary-color: #0066FF;
            --secondary-color: #1e00c9;
            --text-color: #2D3748;
            --light-text: #718096;
            --border-color: #E2E8F0;
            --success-color: #48BB78;
            --background-light: #F7FAFC;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text-color);
            background-color: var(--background-light);
        }

        .pricing-header {
            text-align: center;
            padding: 4rem 0 2rem;
        }

        .pricing-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--text-color);
        }

        .pricing-header p {
            font-size: 1.1rem;
            color: var(--light-text);
            max-width: 600px;
            margin: 0 auto;
        }

        .pricing-tabs {
            display: flex;
            justify-content: center;
            margin: 2rem 0;
            gap: 1rem;
        }

        .pricing-tab {
            padding: 0.75rem 1.5rem;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .pricing-tab.active {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .pricing-card {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .pricing-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .pricing-card.current-plan {
            border: 2px solid var(--success-color);
        }

        .current-plan-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: var(--success-color);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .pricing-card.professional {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
        }

        .pricing-card .title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .pricing-card .subtitle {
            font-size: 0.875rem;
            color: var(--light-text);
            margin-bottom: 1.5rem;
        }

        .pricing-card.professional .subtitle {
            color: rgba(255, 255, 255, 0.8);
        }

        .pricing-card .price {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .pricing-card .price small {
            font-size: 13px;
            font-weight: 400;
            opacity: 0.8;
        }

        .pricing-features {
            margin: 2rem 0;
        }

        .pricing-features li {
            display: flex;
            align-items: center;
            margin-bottom: 0.75rem;
            font-size: 0.95rem;
        }

        .pricing-features li i {
            color: var(--success-color);
            margin-right: 0.75rem;
            font-size: 1.25rem;
        }

        .pricing-card.professional .pricing-features li i {
            color: white;
        }

        .pricing-button {
            width: 100%;
            padding: 0.75rem;
            border-radius: 8px;
            font-weight: 500;
            text-align: center;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .pricing-card:not(.professional) .pricing-button {
            background: var(--primary-color);
            color: white;
        }

        .pricing-card.professional .pricing-button {
            background: white;
            color: var(--primary-color);
        }

        .pricing-button:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

        .tertiary-pricing {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 16px;
            padding: 3rem 2rem;
            text-align: center;
            color: white;
            margin: 2rem auto;
            max-width: 800px;
        }

        .tertiary-pricing h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .tertiary-pricing p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 2rem;
        }

        .tertiary-button {
            display: inline-block;
            padding: 1rem 2rem;
            background: white;
            color: var(--primary-color);
            border-radius: 8px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .tertiary-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .pricing-grid {
                grid-template-columns: 1fr;
                padding: 1rem;
            }

            .pricing-header {
                padding: 2rem 1rem;
            }

            .pricing-header h1 {
                font-size: 2rem;
            }

            .pricing-tabs {
                flex-direction: column;
                align-items: stretch;
            }

            .tertiary-pricing {
                margin: 1rem;
                padding: 2rem 1rem;
            }
        }
    </style>





<style>
        /* Accessibility focus outline */
        :focus-visible {
            outline: 1px solid #2563eb;
            outline-offset: 2px;
        }

        /* Campus badge style */
        .campus-badge {
            background-color: #e0e7ff;
            /* Tailwind blue-100 */
            color: #2563eb;
            /* Tailwind blue-600 */
            border-radius: 9999px;
            /* full pill */
            font-weight: 600;
            font-size: 0.875rem;
            /* text-sm */
            padding: 0.125rem 0.75rem;
            /* py-0.5 px-3 */
            margin: 0.125rem 0.25rem 0 0;
            display: inline-flex;
            align-items: center;
            user-select: text;
            white-space: nowrap;
        }

        /* Campus badges container scroll for overflow */
        #campus-container {
            max-height: 6.5rem;
            /* overflow-y: auto; */
            padding-right: 0.25rem;
            width: 100%;
            box-sizing: content-box;
        }

        #campus-container::-webkit-scrollbar {
            width: 6px;
        }

        #campus-container::-webkit-scrollbar-thumb {
            background-color: #c7d2fe;
            /* Tailwind blue-300 */
            border-radius: 3px;
        }

        /* Modal backdrop */
        /* #modal-backdrop {
            background: rgba(0, 0, 0, 0.35);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            transition: opacity 0.3s ease;
        } */
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
               


                
                <!-- <div class="pricing-tabs">

                   <div class="pricing-tab active" data-target="tertiary">
                       Assign Payment
                        <div class="subtitle">Kindly assign and proceed with payment here</div>
                    </div>
                    <div class="pricing-tab " data-target="k12">
                         Upgrade Plan
                        <div class="subtitle">Change/switch to a new plan</div>
                    </div>
                  
                </div> -->

                <!-- <div class="pricing-content"> -->
                    <!-- K-12 Pricing -->
                    <!-- <div class="pricing-section" id="k12" style="display: none;"> -->


                    <div class="pricing-header">
                  
                        <h1><span style="color: var(--primary-color);">EduMESS</span> <?php echo $pricing_page_header_title; ?></h1>
                        <p>
                            <?php echo $pricing_page_title_sub1; ?><br>
                            <?php echo $pricing_page_title_sub2; ?>
                        </p>
                    </div>

                        <div class="pricing-grid">
                            <!-- Free Plan -->

                            <?php include('./pros-plancont.php'); ?>
                    
                           
                        </div>


                    <!-- </div> -->

                    <!-- Tertiary Pricing -->
                    <!-- <div class="pricing-section" id="tertiary" >

                            <div aria-label="School financial and student info"
                                class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 text-center">

                                <div class="p-6 bg-gray-50 rounded-xl shadow-sm flex flex-col items-center justify-center h-[14rem]">
                                    <span class="text-gray-400 uppercase tracking-widest font-semibold mb-2">Wallet Balance <i class="fas fa-wallet"></i></span>
                                    <span id="wallet-balance" class="text-4xl font-extrabold text-gray-900">₦500,000</span>
 
                                    

                                    <a href="../wallet" class="mt-3 bg-white text-primary-900 px-4 py-2 rounded-lg text-sm font-medium hover:bg-primary-50 transition-colors">
                                          Add Funds
                                    </a>
                                </div>

                                <div class="p-6 bg-gray-50 rounded-xl shadow-sm flex flex-col items-center justify-between h-[14rem]">
                                    <div>
                                        <span class="text-gray-400 uppercase tracking-widest font-semibold mb-4 inline-block">Total
                                            Students</span>
                                        <span id="total-students" class="text-4xl font-extrabold text-gray-900 block mb-4">800</span>
                                    </div>
                                    <div id="campus-container" aria-label="Student count per campus" class="w-full">
                                       
                                        <span class="campus-badge">Central Campus: 350</span>
                                        <span class="campus-badge">North Campus: 280</span>
                                        <span class="campus-badge">East Campus: 170</span>
                                    </div>
                                </div>

                                <div class="p-6 bg-gray-50 rounded-xl shadow-sm flex flex-col items-center justify-center h-[14rem]">
                                    <span class="text-gray-400 uppercase tracking-widest font-semibold mb-2">Price per Student</span>
                                    <span id="price-per-student" class="text-4xl font-extrabold text-gray-900">₦500</span>
                                </div>

                            </div>


                            
                            <div aria-labelledby="assigned-title" class="max-w-4xl mx-auto mt-8">
                                <div class="flex items-center justify-between mb-10">
                                    <h2 id="assigned-title" class="text-4xl font-semibold text-gray-900">
                                        Assigned Subscriptions
                                    </h2>

                                    <button id="open-create-btn-mobile"

                                       data-bs-toggle="modal" data-bs-target="#pros_withdrawModal"
                                        class="
                                         rounded bg-blue-600 text-white py-2 px-4 font-semibold hover:bg-blue-700 transition focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-600">Assign
                                        New</button>
                                </div>

                                <p class="mb-6 text-gray-500 max-w-lg leading-relaxed">
                                    Review, edit or delete assigned subscription batches below.
                                </p>


                                <div class="col-span-3 bg-white rounded-xl shadow-soft p-6 border border-gray-100 mb-4">
                                    <div class="flex flex-wrap items-center justify-between gap-4">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex items-center space-x-2">
                                                <label class="text-sm font-medium text-gray-700">Session:</label>
                                                <select class="form-select rounded-lg border-gray-200 focus:border-primary-500 focus:ring-primary-500">
                                                    <option>2023/2024</option>
                                                    <option>2022/2023</option>
                                                    <option>2021/2022</option>
                                                </select>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <label class="text-sm font-medium text-gray-700">Term:</label>
                                                <select class="form-select rounded-lg border-gray-200 focus:border-primary-500 focus:ring-primary-500">
                                                    <option>First Term</option>
                                                    <option>Second Term</option>
                                                    <option>Third Term</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <button class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-700 transition-colors">
                                                <i class="fas fa-filter mr-2"></i>Apply Filter
                                            </button>
                                            <button class="px-4 py-2 border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-50 transition-colors">
                                                <i class="fas fa-sync-alt mr-2"></i>Reset
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div id="assigned-list"
                                    class="space-y-6 max-h-[400px] overflow-y-auto rounded-xl bg-gray-50 border border-gray-200 shadow-inner p-6"
                                    tabindex="0" aria-label="Assigned subscription list">
                                    
                                    <p id="empty-text" class="text-center text-gray-400 italic mt-12">No subscriptions assigned yet.</p>
                                </div>

                                
                             </div>

                        
                    </div> -->
                <!-- </div> -->
            </div>
        </main>
                </div>




                <!-- Trigger button -->
            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paymentModal">
            Manage Payment / Upgrade
            </button> -->

                    <!-- Sleek Upgrade Modal -->
           <!-- Button to open modal -->

        <!-- Modal -->
            <div class="modal fade" id="upgradeModal" tabindex="-1" aria-labelledby="upgradeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content shadow-lg border-0 rounded-4 bg-white">

                <!-- Modal Header -->
                <div class="modal-header border-0 rounded-top-4 bg-light px-4 py-3">
                    <h5 class="modal-title fw-semibold text-primary" id="upgradeModalLabel">
                    <i class="bi bi-arrow-up-circle me-2"></i> Upgrade Summary
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body px-4 py-3">


                 <!-- Header with Wallet -->
                 <div class="row mb-4">
                        <div class="col-6">
                           
                        </div>
                        <div class="col-6 text-md-end">
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

                    <div class="row mb-3">
                    <div class="col-6"><strong>Total Students:</strong></div>
                    <div class="col-6 text-end"><span id="modalTotal" class="text-dark">0</span></div>
                    </div>

                    <div class="row mb-3">
                    <div class="col-6"><strong>Paid Students:</strong></div>
                    <div class="col-6 text-end"><span id="modalPaid" class="text-success">0</span></div>
                    </div>

                    <div class="row mb-3">
                    <div class="col-6"><strong>Unpaid Students:</strong></div>
                    <div class="col-6 text-end"><span id="modalUnpaid" class="text-danger">0</span></div>
                    </div>

                    <div class="row mb-3">
                    <div class="col-6"><strong>Top-Up (Paid):</strong></div>
                    <div class="col-6 text-end"><span id="modalTopUp" class="text-warning">₦0</span></div>
                    </div>

                    <div class="row mb-3">
                    <div class="col-6"><strong>Cost for Unpaid:</strong></div>
                    <div class="col-6 text-end"><span id="modalUnpaidCost" class="text-warning">₦0</span></div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-dark">Total To Pay:</h5>
                    <h5 class="text-success fw-bold"><span id="modalTotalCost">0</span></h5>
                    </div>

                </div>

                <!-- Modal Footer -->
                <div class="modal-footer border-0 bg-light rounded-bottom-4 px-4 py-3">
                    <button type="button" id="proceedToPayment" class="btn btn-success w-100 py-2 rounded-pill shadow-sm">
                    <i class="bi bi-check-circle me-2"></i> Confirm Upgrade
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
    <?php include('../../controller/js/app/header.php'); ?>

    <!-- current page js -->
    <?php include('../../js/current_page.php'); ?>

    <script>
        $(document).ready(function() {
            // Initialize knob
            // $('[data-plugin="knob"]').knob();

            // Tab switching
            $('.pricing-tab').click(function() {
                $('.pricing-tab').removeClass('active');
                $(this).addClass('active');
                
                const target = $(this).data('target');
                $('.pricing-section').hide(); 
                $(`#${target}`).show();
            });

            // Smooth scroll for pricing cards
            $('.pricing-button').click(function() {
                // Add your upgrade logic 

                    var choosed_plain = $(this).data('id');

                    var current_plan = '<?php echo $pros_menuData['school_plan']; ?>';
                    var institutionId = $('.abba-change-institution option:selected').val();
                    var UserID = $('#user_id').val();
                    var UserType = $('#user_type').val();
                       
                    
                   

                    if(choosed_plain == current_plan)
                    {

                             Swal.fire({
                                icon: 'warning',
                                title: 'Hey!!',
                                text: 'Your school is already on this plan',
                                confirmButtonText: 'OK'
                            });
                            return;
                    }

                    loadUpgradeModal(institutionId, UserID, UserType, current_plan, choosed_plain);

            });


        });

        function loadUpgradeModal(institutionId, UserID, UserType, current_plan, choosed_plain) {
                    fetch('../../controller/scripts/owner/upgradeplan/get_plan_payment_status.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ institutionId, UserID, UserType, choosed_plain, current_plan })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.status === 'fail') {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Hold on!',
                                text: data.reason,
                                confirmButtonText: 'OK'
                            });
                            return;
                        }

                        let totalStudents = 0;
                        let paidStudents = 0;
                        let topUpTotal = 0;
                        let unpaidStudents = 0;
                        let unpaidCost = 0;

                        if (!Array.isArray(data.campuses)) {
                            console.error('Invalid data format:', data);
                            alert('Unexpected error occurred. Please try again.');
                            return;
                        }

                        data.campuses.forEach(campus => {
                            const total = parseInt(campus.totalStudents) || 0;
                            const paid = parseInt(campus.studentsPaid) || 0;
                            const topUp = parseFloat(campus.topUp) || 0;

                            totalStudents += total;
                            paidStudents += paid;
                            topUpTotal += topUp;

                            const unpaid = total - paid;
                            unpaidStudents += unpaid;
                            unpaidCost += unpaid * parseFloat(data.perStudentNewPlanAmount || 0);
                        });


                        const allCampusPayments = data.campuses.map(c => ({
                                campusID: c.campusId,
                                totalStudents: c.totalStudents,
                                paidStudents: c.studentsPaid,
                                unpaidStudents: c.totalStudents - c.studentsPaid,
                                topUp: parseFloat(c.topUp),
                                totalCost: parseFloat(c.topUp)
                            }));
                            console.log(allCampusPayments);
                            const transaction_method = 'wallet';
                            const walletBalance = parseFloat($('#pros_wall_bal').val()) || 0;
                            document.getElementById('proceedToPayment').dataset.paymentPayload = JSON.stringify({
                                institutionId,
                                UserID,
                                UserType,
                                current_plan,
                                choosed_plain,
                                transaction_method,
                                walletBalance,
                                campuses: allCampusPayments,
                                totalCost: allCampusPayments.reduce((sum, c) => sum + c.topUp, 0)
                                // totalCost: allCampusPayments.reduce((sum, c) => sum + c.topUp, 0)
                            });
                            // alert(topUpTotal + unpaidCost);

                        document.getElementById('modalTotal').textContent = totalStudents;
                        document.getElementById('modalPaid').textContent = paidStudents;
                        document.getElementById('modalUnpaid').textContent = unpaidStudents;
                        document.getElementById('modalTopUp').textContent = `₦${topUpTotal.toLocaleString()}`;
                        document.getElementById('modalUnpaidCost').textContent = `₦${unpaidCost.toLocaleString()}`;
                        document.getElementById('modalTotalCost').textContent = `₦${(topUpTotal + unpaidCost).toLocaleString()}`;

                        const modal = new bootstrap.Modal(document.getElementById('upgradeModal'));
                        modal.show();
                    })
                    .catch(error => {
                        console.error('Error loading upgrade data:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Load Failed',
                            text: 'Something went wrong while loading upgrade details.',
                            confirmButtonText: 'Close'
                        });
                    });
        }




         $('#proceedToPayment').off('click').on('click', function() {
                const payload = JSON.parse(this.dataset.paymentPayload);
             
                if(payload.totalCost > payload.walletBalance) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Insufficient Wallet Balance',
                        text: `Your wallet balance is ₦${payload.walletBalance.toLocaleString()}. Please top up to proceed.`,
                        showCancelButton: true,
                        confirmButtonText: 'Top Up Wallet'
                    }).then(result => {

                        if (result.isConfirmed) {
                        // Step 4: Start payment
                        window.location.href = '../../app/wallet/';
                     }
                       
                    });
                    return;
                }
                // Optional: Show confirmation
                Swal.fire({
                    title: 'Proceed to Payment?',
                    text: `You are about to pay ₦${payload.totalCost.toLocaleString()}. Continue?`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Pay Now'
                }).then(result => {
                    if (result.isConfirmed) {
                        // Step 4: Start payment
                        initiatePayment(payload);
                    }
                });
            });





            function initiatePayment(payload) {
                const proceedBtn = document.getElementById('proceedToPayment');
                proceedBtn.disabled = true;
                proceedBtn.innerText = "Processing...";

                fetch('../../controller/scripts/owner/upgradeplan/insert_payment_upgrade.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(payload)
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            html: data.message,
                            confirmButtonText: 'OK'
                        }).then(() => {
                            location.reload(); // 🔄 Reload page after user clicks OK
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            html: `Something went wrong:<br>${data.message}`,
                            confirmButtonText: 'Try Again'
                        });
                    }
                })
                .catch(err => {
                    console.error(err);
                    Swal.fire({
                        icon: 'error',
                        title: 'Network Error!',
                        text: 'Please check your internet connection or try again later.',
                        confirmButtonText: 'OK'
                    });
                })
                .finally(() => {
                    proceedBtn.disabled = false;
                    proceedBtn.innerText = "Proceed to Payment";
                });
            }





    </script>
</body>
</html>