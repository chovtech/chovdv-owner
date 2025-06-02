<?php include('../../controller/session/session-checker-owner.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="EduMESS" />
    <meta name="description" content="EduMESS (Education Management and E-Learning Software Solution) 
        is a leading school management, automation and elearning solution. Since its 
        launch, EduMESS has grown to become a leader. Our clients say that the simplicity 
        of our interface, ease of use, cost effectiveness and excellent customer care is 
        the reason they prefare EduMESS. We have watched schools move from softwares they 
        are using to EduMESS." />
    <meta name="keywords" content="Best, School, Management, Best School, Best School Management, 
        Best School Management Software, Free School Management Software, Portal, 
        School Owner, Group of School Owner, Consultants, Brand Promoters | School Portal Generator ">
    <title>EduMESS</title>
    <!-- FAVICON AND TOUCH ICONS -->
    <link rel="shortcut icon" href="../../assets/images/website_images/favicon.png" type="image/x-icon">
    <link rel="icon" href="../../assets/images/website_images/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="152x152" href="../../assets/images/website_images/favicon.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../../assets/images/website_images/favicon.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/images/website_images/favicon.png">
    <link rel="apple-touch-icon" href="../../assets/images/website_images/favicon.png">
    <link rel="icon" href="../../assets/images/website_images/favicon.png" type="image/x-icon">

    <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">
    <script src="../../assets/plugins/jquery/code.jquery.com_jquery-3.5.1.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- Animate.css CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        integrity="sha512-..." crossorigin="anonymous" />

    <!-- style sheet -->
    <link rel="stylesheet" href="../../css/app_css/appStyle.css">

    <!-- settings sheet -->
    <!-- <link rel="stylesheet" href="../../css/app_css/settings.css"> -->
    <link rel="stylesheet" href="../../css/app_css/schemework.css">

    <!-- notification css-->
    <link href="../../assets/plugins/notify/wnoty.css" rel="stylesheet">


     <!-- image Croppie -->
     <link rel="stylesheet" href="../../assets/plugins/Croppie/croppie.css"></link>


     <style>
       
         :root {
            --primary-color:  #0d6efd;
            --secondary-color: #6c757d;
            --accent-color: #ffc107;
            --background-color: #f8f9fa;
            --text-color: #333;
            --border-color: #dee2e6;
        }
        
       
        
        .pros-menu-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        /* Card Styles */
        
        .pros-menu-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 1.5rem;
            overflow: hidden;
        }
        
        .pros-menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        
        .pros-menu-header {
            background: linear-gradient(135deg, var(--primary-color), #0056b3);
            color: white;
            padding: 1.25rem;
            font-weight: 600;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
        }
        
        .pros-menu-header i {
            margin-right: 0.75rem;
        }
        
        .pros-menu-content {
            padding: 1.5rem;
        }
        /* Menu Item Styles */
        
        .pros-menu-item {
            display: flex;
            align-items: center;
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
            transition: background-color 0.3s ease;
            text-decoration: none;
            color: var(--text-color);
        }
        
        .pros-menu-item:last-child {
            border-bottom: none;
        }
        
        .pros-menu-item:hover {
            background-color: #f8f9fa;
            text-decoration: none;
            color: var(--text-color);
        }
        
        .pros-menu-icon {
            width: 40px;
            height: 40px;
            background-color: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: white;
            transition: transform 0.3s ease;
        }
        
        .pros-menu-item:hover .pros-menu-icon {
            transform: scale(1.1);
        }
        
        .pros-menu-text {
            flex-grow: 1;
        }
        
        .pros-menu-title {
            font-weight: 600;
            margin-bottom: 0.25rem;
            font-size: 1.1rem;
        }
        
        .pros-menu-description {
            font-size: 0.875rem;
            color: var(--secondary-color);
        }
        /* Badge Styles */
        
        .badge-coming-soon {
            background-color: var(--accent-color);
            color: black;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
            margin-left: auto;
        }
       
        /* Responsive Adjustments */
        
        @media (max-width: 768px) {
            .pros-menu-container {
                padding: 0 0.5rem;
            }
            .pros-menu-header {
                padding: 1rem;
                font-size: 1.1rem;
            }
            .pros-menu-content {
                padding: 1rem;
            }
            .pros-menu-item {
                padding: 0.75rem;
            }
        }
    </style>

</head>

<body>

    
    <!-- Loader -->
    <div id="gx-overlay">
    	<div class="gx-ellipsis">
    		<div></div>
    		<div></div>
    		<div></div>
    		<div></div>
    	</div>
    </div>


    <div class="grid-container">

        <!-- Header -->
        <?php include('../../includes/app-header.php'); ?>
        <!--End Header -->


        <!-- Sidebar -->
        <?php include('../../includes/app-menu.php'); ?>
        <!-- End Sidebar -->


        <!--======Floating Button=========-->
        <!-- Buttons -->
        <?php include('../../includes/floating-btn.php'); ?>
        <!-- End - Buttons -->
        <!--======Floating Button=========-->


        <!---====Side Modal Start Here====-->
        <?php include('../../includes/setting-menu.php'); ?>
        <!---====Side Modal End Here====-->

        <!----Main----->
        <main class="main-container">

            <div class="main-cards" style="margin-top: 10px;">

                <!-- Navbar pills -->
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Nav tabs -->
                        <div class="pros-menu-container">
                            <!-- Results Section -->
                            <div class="pros-menu-card">
                                <div class="pros-menu-header">
                                    <i class="fas fa-chart-bar"></i> Results Management
                                </div>
                                <div class="pros-menu-content">
                                    <a href="../settings/?tab=config-tabs-1" class="pros-menu-item">
                                        <div class="pros-menu-icon">
                                            <i class="fas fa-cog"></i>
                                        </div>
                                        <div class="pros-menu-text">
                                            <div class="pros-menu-title">C.A Settings</div>
                                            <div class="pros-menu-description">Configure continuous assessment settings</div>
                                        </div>
                                    </a>
                                    <a href="../settings/?tab=config-tabs-2" class="pros-menu-item">
                                        <div class="pros-menu-icon">
                                            <i class="fas fa-list-ol"></i>
                                        </div>
                                        <div class="pros-menu-text">
                                            <div class="pros-menu-title">Grading Structure</div>
                                            <div class="pros-menu-description">Manage grading scales and structures</div>
                                        </div>
                                    </a>
                                    <a href="../settings/?tab=config-tabs-3" class="pros-menu-item">
                                        <div class="pros-menu-icon">
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div class="pros-menu-text">
                                            <div class="pros-menu-title">Result Type</div>
                                            <div class="pros-menu-description">Configure different types of results</div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <!-- Finance Section -->
                            <div class="pros-menu-card">
                                <div class="pros-menu-header">
                                    <i class="fas fa-money-bill-wave"></i> Finance Management
                                </div>
                                <div class="pros-menu-content">
                                    <a href="../finance" class="pros-menu-item">
                                        <div class="pros-menu-icon">
                                            <i class="fas fa-money-bill"></i>
                                        </div>
                                        <div class="pros-menu-text">
                                            <div class="pros-menu-title">Fees Configuration</div>
                                            <div class="pros-menu-description">Manage fee structures and payments</div>
                                        </div>
                                    </a>
                                    <a href="../assets" class="pros-menu-item">
                                        <div class="pros-menu-icon">
                                            <i class="fas fa-archive"></i>
                                        </div>
                                        <div class="pros-menu-text">
                                            <div class="pros-menu-title">Assets</div>
                                            <div class="pros-menu-description">Track and manage school assets</div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <!-- Academics Section -->
                            <div class="pros-menu-card">
                                <div class="pros-menu-header">
                                    <i class="fas fa-book-reader"></i> Academic Management
                                </div>
                                <div class="pros-menu-content">
                                    <a href="../activity-log" class="pros-menu-item">
                                        <div class="pros-menu-icon">
                                            <i class="fas fa-archive"></i>
                                        </div>
                                        <div class="pros-menu-text">
                                            <div class="pros-menu-title">Activity Log</div>
                                            <div class="pros-menu-description">View and track academic activities</div>
                                        </div>
                                    </a>
                                    <a href="<?php echo $defaultUrl;?>app/scheme-of-work" class="pros-menu-item">
                                        <div class="pros-menu-icon">
                                            <i class="fas fa-address-book"></i>
                                        </div>
                                        <div class="pros-menu-text">
                                            <div class="pros-menu-title">Scheme of Work</div>
                                            <div class="pros-menu-description">Manage academic curriculum and schedules</div>
                                        </div>
                                    </a>
                                    <a href="<?php echo $defaultUrl;?>app/menu-previledge" class="pros-menu-item">
                                        <div class="pros-menu-icon">
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="pros-menu-text">
                                            <div class="pros-menu-title">Menu Permissions</div>
                                            <div class="pros-menu-description">Configure access and permissions</div>
                                        </div>
                                    </a>
                                    <a href="<?php echo $defaultUrl;?>app/sales-and-marketing/" class="pros-menu-item">
                                        <div class="pros-menu-icon">
                                            <i class="fas fa-bullseye"></i>
                                        </div>
                                        <div class="pros-menu-text">
                                            <div class="pros-menu-title">Marketing</div>
                                            <div class="pros-menu-description">Manage sales and marketing activities</div>
                                        </div>
                                    </a>
                                    <a  href="<?php echo $defaultUrl;?>app/calender" class="pros-menu-item">
                                        <div class="pros-menu-icon">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                        <div class="pros-menu-text">
                                            <div class="pros-menu-title">Calendar</div>
                                            <div class="pros-menu-description">View and manage academic calendar</div>
                                        </div>
                                    </a>
                                    <a href="<?php echo $defaultUrl;?>app/policy" class="pros-menu-item">
                                        <div class="pros-menu-icon">
                                            <i class="fas fa-file-contract"></i>
                                        </div>
                                        <div class="pros-menu-text">
                                            <div class="pros-menu-title">Policy</div>
                                            <div class="pros-menu-description">Access and manage school policies</div>
                                        </div>
                                    </a>
                                    <a href="<?php echo $defaultUrl;?>app/goalsetting" class="pros-menu-item">
                                        <div class="pros-menu-icon">
                                            <i class="fas fa-cog"></i>
                                        </div>
                                        <div class="pros-menu-text">
                                            <div class="pros-menu-title">Goal Setting</div>
                                            <div class="pros-menu-description">Set and track academic goals</div>
                                        </div>
                                    </a>
                                    
                                    <a href="<?php echo $defaultUrl;?>app/committee/" class="pros-menu-item">
                                        <div class="pros-menu-icon">
                                            <i class="fas fa-users"></i>
                                        </div>
                                        <div class="pros-menu-text">
                                            <div class="pros-menu-title">Committee</div>
                                            <div class="pros-menu-description">Manage school committees</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <!--/ Navbar pills -->
            </div>
        </main>
        <!-- End Main -->
    </div>



    <!--Script-->
    <!--jquery knob -->
    <script src="../../assets/plugins/knob/jquery.knob.js"></script>


    <!--Custom JS--->
    <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="../../js/app_js/appScript.js"></script>
    <!-- header js -->
    <?php include('../../controller/js/app/header.php'); ?>

    <!-- pagination js -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.min.js"></script>

    <!-- notification js -->
    <script src="../../assets/plugins/notify/wnoty.js"></script>

     
    <!-- current page js -->
    <!-- <?php #include('../../js/current_page.php'); ?> -->


      <!-- image cropper js -->
      <script src="../../assets/plugins/Croppie/croppie.js"></script>
    <script src="../../assets/plugins/Croppie/croppie.min.js"></script>


  


</body>

</html>