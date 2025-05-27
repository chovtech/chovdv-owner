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
    <link rel="stylesheet" href="../../css/app_css/schemework.css">
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
                <div class="pricing-header">
                  
                    <h1><span style="color: var(--primary-color);">EduMESS</span> <?php echo $pricing_page_header_title; ?></h1>
                    <p>
                        <?php echo $pricing_page_title_sub1; ?><br>
                        <?php echo $pricing_page_title_sub2; ?>
                    </p>
                </div>

                <!-- <div class="pricing-tabs">
                    <div class="pricing-tab active" data-target="k12">
                        <?php #echo $pricing_page_K_12; ?>
                        <div class="subtitle"><?php #echo $pricing_page_K_12_sub_txt; ?></div>
                    </div>
                    <div class="pricing-tab" data-target="tertiary">
                        <?php #echo $pricing_page_tertiary; ?>
                        <div class="subtitle"><?php #echo $pricing_page_tertiary_sub_txt; ?></div>
                    </div>
                </div> -->

                <div class="pricing-content">
                    <!-- K-12 Pricing -->
                    <div class="pricing-section" id="k12">
                        <div class="pricing-grid">
                            <!-- Free Plan -->

                            <?php include('./pros-plancont.php'); ?>
                    
                            
                                <!-- SELECT `PlanID`, `PlanName`, `Amount`, `plan_style`, `VPCommision`, `ManagerCommssion`, `ExecutiveCommssion`, `AssociateCommssion`, `PartnerCommision`, `AmountSharedMg`, `AmountSharedEx`, `AmountSharedAs`, `AmountSharedPartner`, `VpGettingMg`, `VpGettingEx`,
                                `VpGettingAs`, `MgGettingEx`, `MgGettingAs`, `ExGettingAs`, `AsGetting` FROM `edumesplan` WHERE 1 -->
                            
                          

                           
                        </div>
                    </div>

                    <!-- Tertiary Pricing -->
                    <div class="pricing-section" id="tertiary" style="display: none;">
                        <div class="tertiary-pricing">
                            <h2><?php echo $pricing_page_tertiary_edummess_h1; ?></h2>
                            <p>
                                <?php echo $pricing_page_tertiary_callback_descr1; ?><br>
                                <?php echo $pricing_page_tertiary_callback_descr2; ?>
                            </p>
                            <a href="#" class="tertiary-button">
                                <?php echo $pricing_page_tertiary_callback_btn; ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="../../assets/plugins/jquery/code.jquery.com_jquery-3.5.1.min.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/plugins/knob/jquery.knob.js"></script>
    <script src="../../assets/plugins/notify/wnoty.js"></script>
    <script src="../../js/admin_js/adminScript.js"></script>
    <?php include('../../controller/js/app/header.php'); ?>

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