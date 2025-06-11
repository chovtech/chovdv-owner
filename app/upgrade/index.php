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
                        $.wnoty({
                            type: 'warning',
                            message: 'Hey!! your school is already on this plan',
                            autohideDelay: 10000
                        }); 
                    }else{

                       const formDatanew = {
                        'choosed_plain': choosed_plain,
                        'UserID':UserID,
                        'institutionId':institutionId,
                        'UserType':UserType
                        };//pros collect data for ajax 
                   
                    // Send AJAX request to backend
                    $.ajax({
                        url: '../../controller/scripts/owner/upgradeplan/change_plan.php',
                        type: 'POST',
                        data: {...formDatanew},
                        beforeSend: function() {
                            
                            $(this).prop('disabled', true).html('<i class="bx bx-loader-alt bx-spin"></i> upgrading...');
                        },
                        success: function(response) {

                            if(response.status === 'success') {

                                $.wnoty({
                                    type: 'success',
                                    message: response.message,
                                    autohideDelay: 3000
                                }); 

                                setTimeout(() => location.reload(), 1000);
                                // windows.reload();
                            }else{
                                $.wnoty({
                                    type: 'warning',
                                    message: response.message,
                                    autohideDelay: 3000
                                }); 
                            }
                            // alert(response.message);
                        },
                        error: function(xhr, status, error) {
                            
                            console.error('Error:', error);
                        },
                        complete: function() {
                            
                            $(this).prop('disabled', false).html('Upgrade Now');
                        }
                    });

                    }


                
                // alert(choosed_plain);
                // console.log('Upgrade clicked');
            });


        });
    </script>
</body>
</html>