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


                .proscontainerimage {
                    /* max-width: 400px; */
                    width: 100%;
                    background: #fff;
                    padding: 30px;
                    border-radius: 30px;
                    color: #6990F2;
                }

                .img-area {
                    position: relative;
                   
                    width: 100%;
                    width: 100%;
                    height: 240px;
                    background: #fff;
                    margin-bottom: 30px;
                    border-radius: 15px;
                    overflow: hidden;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    flex-direction: column;
                    border: 2px dashed #6990F2;
                    color: #6990F2;
                }

                .img-area .icon {
                    /* font-size: 100px; */
                    font-size: 100px;
                }

                .img-area h3 {
                    font-size: 20px;
                    font-weight: 500;
                    margin-bottom: 6px;
                    color: #6990F2;
                }

                .img-area p {
                    color: #6990F2;
                }

                .img-area p span {
                    font-weight: 600;
                }

                .img-area img {
                    /* position: absolute;
                    top: 0;
                    left: 0; */
                    width:50%;
                    height:50%;
                    /* object-fit: cover; */
                    object-position: center;
                    z-index: 100;
                }

                .img-area::before {
                    content: attr(data-img);
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(0, 0, 0, .5);
                    color: #fff;
                    font-weight: 500;
                    text-align: center;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    pointer-events: none;
                    opacity: 0;
                    transition: all .3s ease;
                    z-index: 200;
                }

                .img-area.active:hover::before {
                    opacity: 1;
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

            <div class="main-cards" style="margin-top: 50px;">

                <!-- Navbar pills -->
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Nav tabs -->
                        <div class="col-sm-12">




                        <ul class="nav nav-pills mb-3 renceTab prosloadhidetablist" id="pills-tab" role="tablist" >
                            <li class="nav-item border" role="presentation">
                                <a href="Javascript:;" class="nav-link active abba_tab_checker_for_summary prosloadlogotbherdercontent" data-id="student"
                                    data-sumdiv="student_summary_div" id="pills-classsetting-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-classsetting" type="button" role="tab" aria-controls="pills-classsetting"
                                    aria-selected="true"><i class="fas fa-cog"></i> School Logo</a>
                            </li>

                            <li class="nav-item border" role="presentation">
                                <a href="Javascript:;" class="nav-link abba_tab_checker_for_summary prosloadlogintbherdercontent" data-id="parent"
                                    data-sumdiv="parent_summary_div" id="pills-websitting-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-websitting" type="button" role="tab" aria-controls="pills-websitting"
                                    aria-selected="false"><i class="fas fa-cog"></i> Login Background Images</a>
                            </li>


                           

                        </ul>


                        
                        

                            <div class="tab-content prosloadtabhidecontent" id="pills-tabContent" >
                                
                                <div class="tab-pane fade show active prosschoollogotabcontent" id="pills-classsetting" role="tabpanel"
                                    aria-labelledby="pills-classsetting-tab">
                                              <div id="pros-school-logo-here"></div>
                                </div>

                                <div class="tab-pane fade show prosschoollogintabcontent" id="pills-websitting" role="tabpanel" aria-labelledby="pills-websitting-tab">
                                    <div id="prosload-loginbgcontent"></div>
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



     <!-- Image Modal -->
     <div id="prosloadlogomoal" class="modal" role="dialog">
        <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload School Logo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                <div class="col-sm-12 col-md-12 col-lg-12 p-2">
                    <div id="prosloadimage"></div>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-sm prosuploalogobtnhere">Submit</button>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
    <!-- End Image Modal -->



      <!-- Image Modal logins-->
      <div id="prosloadmodalbg" class="modal" role="dialog">
        <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload School Login Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                <div class="col-sm-12 col-md-12 col-lg-12 p-2">
                    <div id="prosloadimagebg"></div>
                     <input type="hidden" id="prosgetstageofloginbg">
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-sm prosuploadbgbtnhere">Submit</button>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
    <!-- End Image Modal logins -->
     <!-- //pros load logo upload here-->









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


    <?php include('../../controller/js/app/pros-displayterm-logo.php'); ?>


</body>

</html>