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

            <div class="main-cards" style="margin-top: 50px;">

                <!-- Navbar pills -->
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Nav tabs -->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs mb-3 customtab" id="pros-schemework" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="config-tab-1" data-bs-toggle="tab"
                                        href="#config-tabs-1" role="tab" aria-controls="config-tabs-1"
                                        aria-selected="true">Section</a>
                                </li>


                            </ul>


                            <div class="tab-content" id="pros-schemework-content">




                            <div class="row pt-5">

                                <div class="row">
                                    <div class="col-lg-12 col-md-12" align="right">
                                        
                                        <button type="button" class="btn btn-sm text-white mb-1 rounded-3 bg-primary" data-bs-toggle="modal" data-bs-target="#pros-addsectionnewhere" id="create-gs-modal" data-id="0"> <i class="fas fa-plus"> Create New</i></button>

                                    </div>
                                </div>


                                <div class="row pt-2 pros-load-scheme-ofwork-createdhere">

                                </div>

                            </div><br>
                                     
                                <!-- <div class="tab-pane fade show active" id="config-tabs-1" role="tabpanel"
                                            aria-labelledby="config-tab-1">

                                            <div class="row g-2">
                                                <div class="col-md-12 col-lg-2">
                                                    <select style="color: #666666;" class="form-select form-select-sm"
                                                        aria-label="form-select-sm example" id="abba_display_campus">
                                                        <option value="NULL">Select campus</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-12 col-lg-2">
                                                    <select style="color: #666666;" class="form-select form-select-sm"  aria-label="form-select-sm example" id="prosload-classload">
                                                        <option value="NULL">Select Class</option>
                                                    </select>
                                                </div>

                                            

                                                <div class="col-md-12 col-lg-2">
                                                    <select style="color: #666666;" class="form-select form-select-sm"
                                                        aria-label="form-select-sm example" id="prosload-term">
                                                        <option value="NULL">Select Term</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-12 col-lg-2">
                                                    <button type="button"
                                                        style="font-size: 12px;border:1px solid #007bff;background-color:#fff;color:#007bff;"
                                                        class="btn btn-sm fw-normal" id="pros_getscheme_on_click"><i class="fas fa-circle-notch"></i>
                                                        Load filter</button>
                                                </div>


                                            </div>
                                            
                                            <div class="row pt-5">

                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12" align="right">
                                                            
                                                            <button type="button" class="btn btn-sm text-white mb-1 rounded-3 bg-primary" data-bs-toggle="modal" data-bs-target="#caonboardingModal" id="create-gs-modal" data-id="0"> <i class="fas fa-plus"> Create New</i></button>

                                                        </div>
                                                    </div>
                                                    
                                                    
                                                <div class="row pt-2 pros-load-scheme-ofwork-createdhere">
                                                
                                                </div>

                                                
                                            </div>
                                    </div> -->


                                         <div id="prosloadsetupcontenthere"></div>


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





                    <!---====ADD SECTION  Side Modal Start Here====-->
                <div class="modal fade modalshow modalfade" id="pros-addsectionnewhere" tabindex="-1"
                    aria-labelledby="edit-staffprofileLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable dialogcontent" style="border-top-left-radius: 30px; width: 100%;">
                        <div class="modal-content modalcontent" style="background-color:#ffffff;">
                            <div class="modal-body modalbodycontent">
                                <div class="modal-header">
                                    <h5 class="modal-title text-primary">Add  Section<svg xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                            <path
                                                d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                        </svg>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div style="position: fixed; margin-left: -10px; margin-top: -30px; display: flex;">
                                    <img src="../../assets/images/favicon11.png" style="width: 150px; z-index: -1; opacity: 0.1;"
                                        data-dismiss="modal" aria-label="Close">
                                </div>
                                <div width="300px" class="sc-UpCWa ezuGy flexi-sheet-body" open="">
                                    <div width="100%" height="100%" style="padding: 20px; margin-top:40px;" class="sc-pyfCe gtGxgb">
                                        <div id="prosloadsectionforinserthere"></div>

                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                                    <i class="fa fa-times"> Close</i>
                                </button>
                                <button type="button" class="btn btn-primary btn-sm" id="pros-submitsectionforinsert">
                                    <i class="fa fa-plus"> Submit</i>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
                <!---====End ADD SECTION Side Modal End Here====-->




                   <!---====ADD SECTION  Side Modal Start Here====-->
                   <div class="modal fade modalshow modalfade" id="pros-editsectionhere" tabindex="-1"
                    aria-labelledby="edit-staffprofileLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable dialogcontent" style="border-top-left-radius: 30px; width: 100%;">
                        <div class="modal-content modalcontent" style="background-color:#ffffff;">
                            <div class="modal-body modalbodycontent">
                                <div class="modal-header">
                                    <h5 class="modal-title text-primary">Edit  Section<svg xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                            <path
                                                d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                        </svg>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div style="position: fixed; margin-left: -10px; margin-top: -30px; display: flex;">
                                    <img src="../../assets/images/favicon11.png" style="width: 150px; z-index: -1; opacity: 0.1;"
                                        data-dismiss="modal" aria-label="Close">
                                </div>
                                <div width="300px" class="sc-UpCWa ezuGy flexi-sheet-body" open="">
                                    <div width="100%" height="100%" style="padding: 20px; margin-top:40px;" class="sc-pyfCe gtGxgb">
                                        <div id="prosloadesction-editcontent"></div>

                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                                    <i class="fa fa-times"> Close</i>
                                </button>
                                <button type="button" class="btn btn-primary btn-sm" id="prosedititsectiionherebtn">
                                    <i class="fa fa-edit"> Update</i>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
                <!---====End ADD SECTION Side Modal End Here====-->




    <!--delete section work -->
    <div class="modal fade modalfade" id="pros-delete-schemme-workmodal" 
        tabindex="-1" role="dialog" aria-labelledby="pros-deleteschemeworkmodalLabel" aria-hidden="true" style="z-index:2000;">
        <div class="modal-dialog " style="height:80vh;" role="document">
            <div class="modal-content" style="background-color:#fff;">
                <div class="modal-header" style="border:none;">
                    <h5 class="modal-title" style="font-weight:600;font-size:15px;" id="deleteschool-modalLabel">
                        Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="displayschooldel-onboarding">
                    <center>
                    <input type="hidden" id="pros-deleteschoolid">
                        <p style="font-weight:400;font-size:15px;">Are you sure you want to delete this section <span
                                id="pros-displaydelname-del"></span>?</p>

                        <span style="color:red;font-weight:600;">
                            Note: if you delete this section,
                                and any sub topic assigned to it will be deleted as well.
                        </span>
                    </center>

                        <input type="hidden" id="prosloaddeletesectionid">
                </div>
                <div class="modal-footer" style="border:none;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="pros-submitcsectiondelherebtn">Delete <i class="fas fa-times"> </i></button>
                </div>
            </div>
        </div>
    </div>
    <!--delete section work -->




    <!--Script-->
    <!--jquery knob -->
    <script src="../../assets/plugins/knob/jquery.knob.js"></script>

    <script>
        $(function () {
            $('[data-plugin="knob"]').knob();
        });




    </script>
    <!--Custom JS--->
    <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- header js -->
    <?php include('../../controller/js/app/header.php'); ?>

    <script src="../../js/admin_js/adminScript.js"></script>
    
    <!-- pagination js -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.min.js"></script>

    <!-- notification js -->
    <script src="../../assets/plugins/notify/wnoty.js"></script>

    <!-- image cropper js -->
    <script src="../../assets/plugins/Croppie/croppie.js"></script>
    <script src="../../assets/plugins/Croppie/croppie.min.js"></script>

    <!-- current page js -->
    <!-- <?php #include('../../js/current_page.php'); ?> -->


    <?php include('../../controller/js/app/pros-section-setup.php'); ?>








</body>

</html>