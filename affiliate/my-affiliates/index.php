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
        <?php include('../../includes/affiliate-header.php'); ?>
        <!--End Header -->


        <!-- Sidebar -->
        <?php include('../../includes/affiliate-menu.php'); ?>
        <!-- End Sidebar -->


        <!----Main----->
        <main class="main-container">

          
            <div class="main-cards" style="margin-top: 20px;">

                <div class="row g-3">
                    <div class="col-sm-3 col-md-6 col-lg-3">

                        <div class="topSecCards" style="width: 100%; height: 120px;">
                            <div style="border: 2px solid #0066FF; height: 100%; border-radius: 8px; padding: 10px;">
                                <div align="center" style="font-size: 30px; color: #0066FF;">
                                    <i class="fa fa-user" aria-hidden="true"></i><br>
                                    <i class="fa" aria-hidden="true">My Affiliates</i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-6 col-lg-3">
                
                        <div class="topSecCards" style="width: 100%; height: 120px;">
                            <div class="abba_student_card">
                                <div class="row g-2" style="margin-top: 0px;">
                                    <div class="col-6" style="padding-top: 15px;">
                                        <h6 style="font-size: 14px; margin-top: 5px; margin-left: 10px; color: #ffffff;">Total Affiliates</h6>
                                        <p></p>
                                        <h4 style="margin-left: 10px; color: #ffffff;" id="total_aff_no"></h4>
                                    </div>
                                    <div class="col-6" style="padding-top: 10px;">
                                        <div style="margin-left: 2px;">
                                            <p style="font-size: 12px; color: #98ff7e;">
                                                <span style="color: white;" id="f_l_aff_no"></span> <br> Direct Affiliates
                                            </p>
                
                                            <p style="font-size: 12px;; color: lightgrey;">
                                                <span style="color: white;" id="s_l_aff_no"></span> <br> Level 2 Affiliates
                                            </p>
                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-sm-3 col-md-6 col-lg-3">
                
                        <div class="topSecCards" style="width: 100%; height: 120px;">
                            <div class="abba_student_card">
                                <div class="row g-2" style="margin-top: 0px;">
                                    <div class="col-12" style="padding-top: 15px;">
                                        <h6 style="font-size: 14px; margin-top: 5px; margin-left: 10px; color: #ffffff;">Direct Affiliate Earning</h6>
                                        <p></p>
                                        <h4 style="margin-left: 10px; color: #ffffff;" id="f_l_aff_earn"></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-sm-3 col-md-6 col-lg-3">
                
                        <div class="topSecCards" style="width: 100%; height: 120px;">
                            <div class="abba_student_card">
                                <div class="row g-2" style="margin-top: 0px;">
                                    <div class="col-12" style="padding-top: 15px;">
                                        <h6 style="font-size: 14px; margin-top: 5px; margin-left: 10px; color: #ffffff;">Second Lvl Affiliate Earning</h6>
                                        <p></p>
                                        <h4 style="margin-left: 10px; color: #ffffff;" id="s_l_aff_earn"></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                
                </div>    
            </div>


            <div class="main-cards" style="margin-top: 50px;">

                 <!-- Navbar pills -->
                 <div class="row">
                    <div class="row g-2">
                        <div class="col-md-12 col-lg-3">
                            <form>
                                <div class="mb-3">
                                    <div class="search-container">
                                        <input type="text" class="search-input form-control form-control-sm abba_student_search"
                                            id="searchInput" placeholder="Search by Name, Date, Email..">
                                        <i class="fas fa-search search-icon"></i>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12 col-lg-2">
                            <select style="color: #666666;" class="form-select form-select-sm"
                                aria-label=".form-select-sm example" id="aff_level">
                                <option value="0" selected>Affiliate Level</option>
                                <option value="1">Direct Affiliates</option>
                                <option value="2">Level Two Affiliates</option>
                            </select>
                        </div>
                        <div class="col-md-1 col-lg-1">
                            <!--<select class="form-select form-select-sm"-->
                            <!--    style="border:none;border-bottom:2px solid #007ffb;font-size:13px;cursor:pointer;width:70%;background: transparent;text-align: center;padding-right: 10px;" id="abba_increase_students_per_page">-->
                            <!--    <option value="12" selected>12</option>-->
                            <!--    <option value="60">60</option>-->
                            <!--    <option value="120">120</option>-->
                            <!--    <option value="360">360</option>-->
                            <!--    <option value="720">720</option>-->
                            <!--    <option value="1080">1080</option>-->
                            <!--</select>-->
                        </div>
                        <div class="col-md-2 col-lg-2">
                            <!--<i class="fa fa-filter btn btn-outline-primary" data-bs-toggle="collapse" href="#collapseExample"-->
                            <!--    role="button" aria-expanded="false" aria-controls="collapseExample" style="font-size:12px;">More-->
                            <!--    filter</i>-->
                        </div>
                        <div class="col-md-2 col-lg-2">
                            <!--<button type="button" style="font-size: 12px;border:1px solid #007bff;background-color:#fff;color:#007bff;" class="btn btn-sm fw-normal"  data-bs-toggle="modal" data-bs-target="#regnumberset"> <i class="fas fa-user-graduate"> Set Reg. No. count </i></button>-->
                        </div>
                        
                        <div class="col-md-12 col-lg-2">
                            <button type="button" style="float: right;font-size: 13px;border:none;font-weight:500;"
                                class="btn btn-sm btn-primary text-light" data-bs-toggle="modal"
                                    data-bs-target="#abba_create_parent_Modal"> <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                    height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M19 17v2H7v-2s0-4 6-4s6 4 6 4m-3-9a3 3 0 1 0-3 3a3 3 0 0 0 3-3m3.2 5.06A5.6 5.6 0 0 1 21 17v2h3v-2s0-3.45-4.8-3.94M18 5a2.91 2.91 0 0 0-.89.14a5 5 0 0 1 0 5.72A2.91 2.91 0 0 0 18 11a3 3 0 0 0 0-6M8 10H5V7H3v3H0v2h3v3h2v-3h3Z" />
                                </svg> Get Referral Code</button>
                        </div>
                    </div>
                </div>
                
                <div>
                    
                    <div class="row g-4 mt-1 maincard selectBox-cont" id="display_affiliates">
                    
                        
                    </div>

                </div>
                <!--/ Navbar pills -->
                    
            </div>
            
            <!-- create parent -->
            <div class="modal fade modalshow modalfade" id="abba_create_parent_Modal" tabindex="-1"
                aria-labelledby="abba_create_parent_ModalLabel" aria-hidden="true">
                <div class="modal-dialog dialogcontent modal-dialog-scrollable" style="border-top-left-radius: 20px; width: 100%;">
                    <div class="modal-content modalcontent" style="background-color:#ffffff; ">
            
                        <div class="modal-header">
                            <h5 class="modal-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M19 17v2H7v-2s0-4 6-4s6 4 6 4m-3-9a3 3 0 1 0-3 3a3 3 0 0 0 3-3m3.2 5.06A5.6 5.6 0 0 1 21 17v2h3v-2s0-3.45-4.8-3.94M18 5a2.91 2.91 0 0 0-.89.14a5 5 0 0 1 0 5.72A2.91 2.91 0 0 0 18 11a3 3 0 0 0 0-6M8 10H5V7H3v3H0v2h3v3h2v-3h3Z" />
                                </svg> Invite Affiliate
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div style="position: fixed; margin-left: -10px; margin-top: -30px;">
                                
                            </div>
                            <!-- Navbar pills -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- Nav tabs -->
                                    <div class="col-sm-12">
                                        <ul class="nav nav-tabs mb-3 customtab" id="abba_ex1" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a
                                                class="nav-link active"
                                                id="abba_ex1-tab-10"
                                                data-bs-toggle="tab"
                                                href="#abba_ex1-tabs-10"
                                                role="tab"
                                                aria-controls="abba_ex1-tabs-10"
                                                aria-selected="true">Share Referral Link</a>
                                            </li>
                                            <!-- <li class="nav-item" role="presentation">
                                                <a
                                                class="nav-link"
                                                id="abba_ex1-tab-20"
                                                data-bs-toggle="tab"
                                                href="#abba_ex1-tabs-20"
                                                role="tab"
                                                aria-controls="abba_ex1-tabs-20"
                                                aria-selected="false">Invite Via Email</a
                                                >
                                            </li> -->
                                        </ul>
                                    
                                        
                                        <div class="tab-content" id="ex1-content">
            
                                            <div class="tab-pane fade show active" id="abba_ex1-tabs-10" role="tabpanel" aria-labelledby="abba_ex1-tab-10">
                                                <input type="text" id="ref_link_text" value="<?php echo $referral_link; ?>" readonly style="border:none;width:100%;"><br><br>
            
                                                <button type="button" class="btn btn-primary btn-sm" id="copy-button"><i class="fas fa-file"> Copy</i></button>
            
                                                <a href="whatsapp://send?text=<?php echo $referral_link; ?>"  type="button" class="btn btn-success btn-sm" data-action="share/whatsapp/share"><i class="fab fa-whatsapp"> Share via WhatsApp</i></a>
            
                                                <a href="<?php echo $referral_link; ?>" target="_blank" type="button" class="btn btn-secondary btn-sm"><i class="fas fa-globe"> Open Link</i></a>
                                                
                                            </div>
                                            
                                            <!-- <div class="tab-pane fade" id="abba_ex1-tabs-20" role="tabpanel" aria-labelledby="abba_ex1-tab-20">
                                                Tab 2 content
                                            </div> -->
                                        </div>
                                        <!-- Tab panes -->
                                    </div>
                                </div>
                            </div>
                            <!-- Navbar pills -->
                        </div>
                    </div>
                </div>
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
    
    <!-- affiliate js -->
    <?php include('../../controller/js/affiliate/affiliate.php'); ?>

    
    <!-- current page js -->
    <?php include('../../js/current_page.php'); ?>
    
</body>

</html>