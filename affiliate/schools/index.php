<?php include('../../controller/session/session-checker-franchise.php'); ?>
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
        /* .qr-code {
            max-width: 200px;
            margin: 10px;
        } */
    </style>
</head>
<body>

    <!-- Loader -->
    <!-- <div id="gx-overlay">
    	<div class="gx-ellipsis">
    		<div></div>
    		<div></div>
    		<div></div>
    		<div></div>
    	</div>
    </div> -->

    <div class="grid-container" >
         <?php include('../../includes/affiliate-header.php'); ?>
        <!--End Header -->


        <!-- Sidebar -->
        <?php include('../../includes/affiliate-menu.php'); ?>
        <!-- End Sidebar -->
      



        <!----Main----->
        <main class="main-container">

          
          
            <div class="main-cards" style="margin-top: 50px;">

                 <!-- Navbar pills -->
                 <div class="row">
                    <div class="col-sm-12">
                        <div style="background-color:#fff;padding: 35px 35px 35px 35px;margin-top:15px;">

                            
                                <div class="row">
                                    <!-- School Owners -->
                                    <div class="col-lg-3 mb-3">
                                        <div class="card h-100" style="border-radius: 0.1rem; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);">
                                            <div class="card-header fw-bold">School Owners</div>
                                            <ul class="list-group list-group-flush" id="ownerList">
                                               
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Schools and Summary -->
                                    <div class="col-lg-9 mb-3">

                                      <div class="row">
                                            <div class="col-md-12 col-lg-4">
                                                <select style="color: #666666;" class="form-select form-select-sm mb-2"
                                                    aria-label=".form-select-sm example" id="pros_load_term_basesession">
                                                    <option value="NULL">Select Term</option>
                                                </select>
                                            </div>
                                      </div>

                                        <div class="card mb-3">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <span class="fw-bold">Schools</span>
                                                <input type="text" id="schoolSearch" class="form-control form-control-sm w-auto" placeholder="Search school...">
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table mb-0" id="schoolsTable">
                                                    <thead>
                                                        <tr>
                                                            <th>School</th>
                                                            <th>Campuses</th>
                                                            <th>Students</th>
                                                            <th>Paid</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- Dynamic rows here -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <!-- Summary -->
                                        <div class="card">
                                            <div class="card-body d-flex flex-wrap justify-content-around text-center pros_loaddash_boradcont">
                                               
                                                <!-- <div class="p-2 flex-fill"><i class="fas fa-wallet me-1"></i><strong>900</strong> Paid</div> -->
                                            </div>
                                        </div>
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
    
    
      
    
    <!-- current page js -->
    <?php include('../../js/current_page.php'); ?>
    <?php include('../../controller/js/affiliate/schools.php'); ?>


    
    

    
    
    
    
</body>

</html>