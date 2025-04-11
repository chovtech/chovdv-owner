<?php include('../../controller/session/session-checker-owner.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="EduMESS" />
    <meta name="description"
        content="EduMESS (Education Management and E-Learning Software Solution) 
        is a leading school management, automation and elearning solution. Since its 
        launch, EduMESS has grown to become a leader. Our clients say that the simplicity 
        of our interface, ease of use, cost effectiveness and excellent customer care is 
        the reason they prefare EduMESS. We have watched schools move from softwares they 
        are using to EduMESS." />
    <meta name="keywords"
        content="Best, School, Management, Best School, Best School Management, 
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
    
    <link href='https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css' rel='stylesheet'>

    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- Animate.css CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-..." crossorigin="anonymous" />

    <!-- style sheet -->
    <link rel="stylesheet" href="../../css/app_css/appStyle.css">

    <!-- phone number country code -->
    <link href="../../assets/plugins/intlTelInput.min.css" rel="stylesheet"/>
    <script src="../../assets/plugins/intlTelInput.min.js"></script>

    <!-- notification css-->
    <link href="../../assets/plugins/notify/wnoty.css" rel="stylesheet">

    <!-- image Croppie -->
    <link rel="stylesheet" href="../../assets/plugins/Croppie/croppie.css"></link>
    
    <!-- Bootstrap Tagsinput CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">

     <!-- Bootstrap Tagsinput JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

    <script src="../../assets/plugins/dselect.js"></script>
    
    <style>
        .qr-code {
            max-width: 200px;
            margin: 10px;
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

    <div class="grid-container" >
        
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

          
            <div class="main-cards" style="margin-top: 20px;">

                <div class="row g-3" id="abba_display_student_summary" style="display:none;">
                    
                </div>
                <div class="row g-3" id="abba_display_parent_summary" style="display:none;">
                    
                </div>
                <div class="row g-3" id="abba_display_staff_summary" style="display:none;">
                    
                </div>
               
                            
            </div>


            <div class="main-cards" style="margin-top: 50px;">

                 <!-- Navbar pills -->
                 <div class="row">
                    <div class="col-sm-12">
                        <!-- Nav tabs -->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs mb-3 customtab" id="ex1" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a
                                    class="nav-link active abba_main_tab"
                                    id="ex1-tab-1" data-id="staff"
                                    data-bs-toggle="tab"
                                    href="#ex1-tabs-1"
                                    role="tab"
                                    aria-controls="ex1-tabs-1"
                                    aria-selected="true" data-id="employee">Employee</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a
                                    class="nav-link abba_main_tab"
                                    id="ex1-tab-2" data-id="student"
                                    data-bs-toggle="tab"
                                    href="#ex1-tabs-2"
                                    role="tab"
                                    aria-controls="ex1-tabs-2"
                                    aria-selected="false">Students</a
                                    >
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a
                                    class="nav-link abba_main_tab"
                                    id="ex1-tab-3" data-id="parent"
                                    data-bs-toggle="tab"
                                    href="#ex1-tabs-3"
                                    role="tab"
                                    aria-controls="ex1-tabs-3"
                                    aria-selected="false">Parents</a
                                    >
                                </li>
                                
                            </ul>
                        
                            
                            <div class="tab-content" id="ex1-content">
                                
                                <!-- manage staff -->
                                <?php include('staff.php'); ?>
                                
                                <!-- manage student -->
                                <?php include('student.php'); ?>

                                <!-- manage parent -->
                                <?php include('parent.php'); ?>
                                
                                  

                            </div>
                            <!-- Tab panes -->
                        </div>
                    
                    </div>
                </div>
                <!--/ Navbar pills -->
                    
        
            </div>


          
        </main>
        <!-- End Main -->


    </div>

    <!--Script-->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    
     <!--jquery knob -->
     <script src="../../assets/plugins/knob/jquery.knob.js"></script>

    <!--Custom JS--->
    <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- header js -->
    <?php include('../../controller/js/app/header.php'); ?>

    <script src="../../js/admin_js/adminScript.js"></script>
    
    <!-- pagination js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.min.js"></script>

    <!-- notification js -->
    <script src="../../assets/plugins/notify/wnoty.js"></script>

    <!-- image cropper js -->
    <script src="../../assets/plugins/Croppie/croppie.js"></script>
    <script src="../../assets/plugins/Croppie/croppie.min.js"></script>
    
    <!--staff administration js-->
     <script src="../../controller/js/app/administration.js"></script>
      <!--staff administration js-->
      
    <!-- administration js -->
    <script src="../../controller/js/app/administration-student-parent.js"></script>
    
    <script src="../../controller/js/app/leave_application.js"></script>
    
    <!-- current page js -->
    <?php include('../../js/current_page.php'); ?>
    
    
     <!-- Wallet js -->
     <?php include('../../controller/js/app/payroll.php'); ?>

    
    
    
    
</body>

</html>