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
                <div class="container py-5 mt-0">
                     <!-- Header with Wallet -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h1 class="h2 fw-bold text-dark mb-3">EduMESS Subscription</h1>
                            <div class="d-flex gap-4 text-muted small">
                                <span class="d-flex align-items-center">
                                    <i class="fas fa-calendar-alt me-2"></i>
                                    <span id="currentSession">2023/2024</span>
                                </span>
                                <span class="d-flex align-items-center">
                                    <i class="fas fa-book me-2"></i>
                                    <span id="currentTerm">First Term</span>
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
                            <p class="h2 fw-bold mb-0">₦25,000.00</p>
                        </div>
                    </div>

                    <!-- Main Content Grid -->
                    <div class="row g-4">
                        <!-- Left Column: Quick Actions -->
                        <div class="col-lg-4">
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
                        <div class="col-lg-8">
                            <!-- Payment Card -->
                            <div class="card mb-4 pros_card">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <h3 class="h5 fw-semibold mb-0"></h3>
                                        <span class="text-muted small">No.of Students: 50</span>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label fw-medium">Select Campus</label>
                                        <select id="campusSelect" class="form-select">
                                            <option value="">Select a campus</option>
                                            <option value="main">Main Campus</option>
                                            <option value="north">North Campus</option>
                                            <option value="south">South Campus</option>
                                            <option value="east">East Campus</option>
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label fw-medium">Number of Students </label>
                                        <div class="input-group">
                                            <input type="number" id="studentCount" class="form-control" min="1" placeholder="Enter number of students">
                                            <span class="input-group-text">
                                                <i class="fas fa-users text-muted"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="bg-light rounded-3 p-4 mb-4">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="text-muted small mb-1">Total Amount</p>
                                                <p class="h3 fw-bold mb-0">₦<span id="totalAmount">0.00</span></p>
                                            </div>
                                        </div>
                                    </div>

                                    <button id="makePaymentBtn" class="btn btn-primary w-100">
                                        <i class="fas fa-credit-card me-2"></i>
                                        Make Payment
                                    </button>
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
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="d-flex gap-2">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" placeholder="Search transactions...">
                                <span class="input-group-text">
                                    <i class="fas fa-search text-muted"></i>
                                </span>
                            </div>
                            <select class="form-select form-select-sm">
                                <option value="all">Session</option>
                                <!-- <option value="payments">Payments</option>
                                <option value="topups">Top-ups</option>
                                <option value="refunds">Refunds</option> -->
                            </select>
                            <select class="form-select form-select-sm">
                                <option value="7">Term</option>
                                <!-- <option value="30">Last 30 days</option>
                                <option value="90">Last 90 days</option>
                                <option value="custom">Custom Range</option> -->
                            </select>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Date & Time</th>
                                    <th>Transaction ID</th>
                                    <th>Type</th>
                                    <th>Campus</th>
                                    <th>Students</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <!-- <th>Actions</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Transaction 1 -->
                                <tr>
                                    <td>
                                        <div class="small fw-medium">2024-02-20</div>
                                        <div class="small text-muted">14:30 PM</div>
                                    </td>
                                    <td class="small text-muted">TRX123456789</td>
                                    <td>
                                        <span class="badge badge-payment">
                                            <i class="fas fa-credit-card me-1"></i>
                                            Payment
                                        </span>
                                    </td>
                                    <td class="small">Main Campus</td>
                                    <td class="small">50</td>
                                    <td>
                                        <div class="small fw-medium">₦25,000.00</div>
                                        <div class="small text-muted">via Wallet</div>
                                    </td>
                                    <td>
                                        <span class="badge badge-success">
                                            <i class="fas fa-check-circle me-1"></i>
                                            Completed
                                        </span>
                                    </td>
                                    <!-- <td>
                                        <button onclick="showTransactionDetails('TRX123456789')" class="btn btn-link text-primary p-0 me-2">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-link text-muted p-0">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </td> -->
                                </tr>
                                <!-- Add more transactions here -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="small text-muted">
                            Showing <span class="fw-medium">1</span> to <span class="fw-medium">3</span> of <span class="fw-medium">12</span> transactions
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-outline-secondary" disabled>
                                <i class="fas fa-chevron-left me-1"></i>
                                Previous
                            </button>
                            <div class="btn-group">
                                <button class="btn btn-sm btn-primary">1</button>
                                <button class="btn btn-sm btn-outline-secondary">2</button>
                                <button class="btn btn-sm btn-outline-secondary">3</button>
                                <span class="btn btn-sm btn-outline-secondary disabled">...</span>
                                <button class="btn btn-sm btn-outline-secondary">12</button>
                            </div>
                            <button class="btn btn-sm btn-outline-secondary">
                                Next
                                <i class="fas fa-chevron-right ms-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!--==== Transfer Modal==== -->
        <!-- <div class="modal fade" id="pros_withdrawModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="pros_withdrawModalLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius: 20px;">
                    <div class="modal-body">
                       <h3 id="modal-title" class="text-3xl font-extrabold text-gray-900 mb-6 select-text">Assign Subscription</h3>
                        <form id="modal-form" class="space-y-6" novalidate>
                            <div>

                                <select id="student-assign-sel" name="student-assign-count" 
                                        required  
                                        class="form-control w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-900 text-lg 
                                        placeholder-gray-400 focus:border-blue-600 focus:ring-2 focus:ring-blue-600 transition" >
                                        <option>Select term</option>
                                        <option>Prosper ortese</option>
                                        <option>Favour ortese</option>
                                </select>
                             </div>
                             <div>
                                <label for="student-assign-count"
                                    class="block mb-2 text-lg font-semibold text-gray-700 select-text">Number of Students to
                                    Assign</label>
                                <input id="student-assign-count" name="student-assign-count" type="number" min="1" max="800"
                                    required placeholder="Enter number of students" aria-describedby="assign-count-error"
                                    class="w-full rounded-xl border border-gray-300 px-5 py-3 text-gray-900 text-lg placeholder-gray-400 focus:border-blue-600 focus:ring-2 focus:ring-blue-600 transition" />
                                <p id="assign-count-error" role="alert" class="mt-2 text-sm text-red-600 hidden"></p>
                            </div>
                            <div class="text-gray-900 text-2xl font-semibold" aria-live="polite" aria-atomic="true">
                                Total Cost: <span id="modal-total-cost">₦0</span>
                            </div>
                            <div class="flex justify-end mt-8 space-x-4">
                                <button type="button" id="modal-cancel" data-bs-dismiss="modal" aria-label="Close"
                                    class="rounded-xl px-6 py-3 border border-gray-300 text-gray-700 font-semibold hover:bg-gray-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-600 transition">Cancel</button>
                                <button type="submit" id="modal-submit" disabled
                                    class="rounded-xl px-8 py-3 bg-blue-600 text-white font-bold hover:bg-blue-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-600 transition disabled:opacity-50 disabled:cursor-not-allowed">Assign</button>
                            </div>
                        </form>
                                
                        
                    </div>
                </div>
            </div>
        </div> -->


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
        });
    </script>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const studentCountInput = document.getElementById('studentCount');
            const totalAmountSpan = document.getElementById('totalAmount');
            const makePaymentBtn = document.getElementById('makePaymentBtn');
            const campusSelect = document.getElementById('campusSelect');
            const pricePerStudent = 500;
            const historyModal = new bootstrap.Modal(document.getElementById('historyModal'));

            // Calculate total amount when number of students changes
            studentCountInput.addEventListener('input', function() {
                const count = parseInt(this.value) || 0;
                const total = count * pricePerStudent;
                totalAmountSpan.textContent = total.toFixed(2);
            });

            // Make payment button click handler
            makePaymentBtn.addEventListener('click', function() {
                const count = parseInt(studentCountInput.value) || 0;
                const campus = campusSelect.value;

                if (!campus) {
                    alert('Please select a campus');
                    return;
                }
                
                if (count < 1) {
                    alert('Please enter a valid number of students');
                    return;
                }
                
                // Here you would typically integrate with your payment gateway
                alert(`Processing payment for ${count} students at ${campusSelect.options[campusSelect.selectedIndex].text}`);
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

        // Close modal when clicking outside
        document.getElementById('transactionModal').addEventListener('click', function(e) {
            if (e.target === this) {
                hideTransactionDetails();
            }
        });
    </script>

</body>
</html>