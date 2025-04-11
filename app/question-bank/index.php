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

    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- Animate.css CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-..." crossorigin="anonymous" />

    <!-- style sheet -->
    <link rel="stylesheet" href="../../css/app_css/appStyle.css">

    <!-- notification css-->
    <link href="../../assets/plugins/notify/wnoty.css" rel="stylesheet">

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
        <?php include('../../includes/floatingbtn.php'); ?>
        <!-- End - Buttons -->
        <!--======Floating Button=========-->


        <!---====Side Modal Start Here====-->
        <?php include('../../includes/setting-menu.php'); ?>
        <!---====Side Modal End Here====-->

        <!----Main----->
        <main class="main-container">

          
            <div class="main-cards" style="margin-top: 20px;">

              
                <!-- <div class="row g-3">
                    <div class="col-sm-3 col-md-6 col-lg-3">
                       
                        <div class="topSecCards" style="width: 100%; height: 150px;">
                            <div style="border: 2px solid #0066FF; height: 100%; border-radius: 8px; padding: 10px;">
                                <div align="center" style="font-size: 80px; color: #0066FF;">
                                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                    <div class="col-sm-3 col-md-6 col-lg-3">
                       
                        <div class="topSecCards" style="width: 100%; height: 150px;">
                            <div class="renStaffCard" >
                                <div class="row" style="margin-top: 20px;">
                                    <div class="col-6">
                                        <h6 style="font-size: 15px; margin-top: 5px; margin-left: 10px; color: #ffffff;">Total Staff</h6>
                                        <p></p>
                                        <h2 style="margin-left: 10px; color: #ffffff;">50</h2>
                                    </div>
                                    <div class="col-6" >
                                        
                                        <h6 style="color: white;">35</h6>
                                        <h6 style="font-size: 13px; color: #98ff7e;">Active Staffs</h6>
                                       
                                        <b style="text-align: center; color: white;">15</b>
                                        <h6 style="font-size: 15px; text-align: center; color: #b4030c;">Blocked Staffs</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </div>

                    <div class="col-sm-3 col-md-6 col-lg-3">
                       
                        <div class="topSecCards" style="width: 100%; height: 150px;">
                            <div class="row">
                                <div class="col-7">
                                    <div class="card" style="border: none; margin-top: 10px; background: #f7fff7; border-radius: 20px;">
                                        <div class="card-body">
                                            <div class="text-center">
                                                <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round data-fgColor="#0066FF" value="28" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".1" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-5">
                                   
                                    <h6 style="color: #666666; margin-top: 25px; font-size: 15px;">10</h6>
                                    <h6 style="font-size: 12px; font-weight: 400; color: #057ff1;">Male</h6>
                                    <h6 style="color: #666666; font-size: 15px;">15</h6>
                                    <h6 style="font-size: 12px; font-weight: 400; color: #b4030c;">Female</h6>
                                </div>
                            </div>
                        </div>
                    
                    </div>


                    <div class="col-sm-3 col-md-6 col-lg-3">
                       
                        <div class="topSecCards" style="width: 100%; height: 150px;">
                            <div class="row">
                                <div class="col-7">
                                    <div class="card" style="border: none; margin-top: 10px; background: none; border-radius: 20px;">
                                        <div class="card-body">
                                            <div class="text-center">
                                                <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round data-fgColor="#3ceb71" value="27" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".1" />
                                            </div>
                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="col-5">
                                   
                                    <h6 style="color: #666666; margin-top: 25px; font-size: 15px;">10</h6>
                                    <h6 style="font-size: 11px; font-weight: 400; color: #057ff1;">Academic Staff</h6>
                                    <h6 style="color: #666666; font-size: 15px;">15</h6>
                                    <h6 style="font-size: 11px; font-weight: 400; color: #b4030c;">Non Academic Staff</h6>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div> -->
               
                    		
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
                                    class="nav-link active"
                                    id="ex1-tab-1"
                                    data-bs-toggle="tab"
                                    href="#ex1-tabs-1"
                                    role="tab"
                                    aria-controls="ex1-tabs-1"
                                    aria-selected="true">C.A Setting</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a
                                    class="nav-link"
                                    id="ex1-tab-2"
                                    data-bs-toggle="tab"
                                    href="#ex1-tabs-2"
                                    role="tab"
                                    aria-controls="ex1-tabs-2"
                                    aria-selected="false">Grading Structure</a
                                    >
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a
                                    class="nav-link"
                                    id="ex1-tab-2"
                                    data-bs-toggle="tab"
                                    href="#ex1-tabs-2"
                                    role="tab"
                                    aria-controls="ex1-tabs-2"
                                    aria-selected="false">Result Type</a
                                    >
                                </li>
                            </ul>
                        
                            
                            <div class="tab-content" id="ex1-content">

                                <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                                   
                                    <div class="row g-2">
                                        <div class="col-3">
                                            <form>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control form-control-sm" placeholder="search staff" aria-describedby="emailText">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-3">
                                            <select style="color: #666666;" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                                <option selected>Select staff type</option>
                                                <option value="Academic Staff">Academic Staff</option>
                                                <option value="Non Academic Staff">Non Academic Staff</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            
                                        </div>
                                        <div class="col-2">
                                            <button type="button" style="float: right;" class="btn btn-sm btn-primary">Create Staff</button>
                                        </div>
                                    </div>

                                </div>




                                <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                                    Tab 2 content
                                </div>
                                <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                                    Tab 3 content
                                </div>
                                <div class="tab-pane fade" id="ex1-tabs-4" role="tabpanel" aria-labelledby="ex1-tab-4">
                                    Tab 4 content
                                </div>
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
     <!--jquery knob -->
     <script src="../../assets/plugins/knob/jquery.knob.js"></script>

     <script>
         
     $(function() {
         $('[data-plugin="knob"]').knob();
     });
     </script>
    <!--Custom JS--->
    <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- header js -->
    <?php include('../../controller/js/app/header.php'); ?>

    <!-- pagination js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.min.js"></script>

    <!-- notification js -->
    <script src="../../assets/plugins/notify/wnoty.js"></script>

    <!-- image cropper js -->
    <script src="../../assets/plugins/Croppie/croppie.js"></script>
    <script src="../../assets/plugins/Croppie/croppie.min.js"></script>

    <!-- administration js -->
    <script src="../../controller/js/app/administration.js"></script>
    
    <!-- current page js -->
    <?php include('../../js/current_page.php'); ?>

    <!-- current page js -->
    <script src="../../controller/js/app/result-setting-onboarding.js"></script>
</body>

</html>