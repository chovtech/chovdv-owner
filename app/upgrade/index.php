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


    <style>

            /* ===========Pricing Page========= */
    

            .chiPrice_beginning {
                background: #fff;
                border-radius: 15px;
                box-shadow: 0 21px 17px 1px rgba(0,0,0,.1);
                margin: -35px auto 60px;
                max-width: 800px;
                overflow: hidden;
                padding: 70px 40px;
            }

            .chiPrice_beginning .chiheading {
                color: #0066FF;
                font-weight: 750;
                font-size: 70px;
                margin: -40px 0 0;
            }

            .chiPrice_beginning .chiwe_R {
                color: #464646;
                font-weight: 500;
                font-size: 38px;
                margin: 0 0 0 80px;
            }
            
                
            .chiPrice_beginning_p {
                color: #464646;
                font-size: 17px;
                margin-top: 0;
                padding-top: 32px;
                vertical-align: bottom;
            }

            
            .renz_pricing-table {
                padding:20px 0px 30px 0px;
                }

                .renz_pricing-table .grid {
                display:flex;
                flex-wrap:wrap;
                justify-content:center;
                gap:10px 0px;
                }
                .renz_pricing-table .grid .box {
                width:250px;
                border:1px solid #eee;
                text-align:center;
                padding:20px;
                background:#ffffff;
                border-radius:10px;
                box-shadow:0px 2px 10px 5px rgba(0,0,0,0.05);
                }
                .renz_pricing-table .grid .box .title {
                font-size:25px;
                font-weight:700;
                margin-bottom:0px;
                color:#0066FF;
                }
                .renz_pricing-table .grid .box .title_decr {
                font-size:12px;
                font-weight:600;
                margin-bottom:15px;
                color:#555;
                }
                .renz_pricing-table .grid .box .title_summRe {
                font-size:14px;
                font-weight:400;
                margin-bottom:px;
                }
                .renz_pricing-table .grid .box .price {
                margin-bottom:20px;
                }
                .renz_pricing-table .grid .box .price b {
                display:block;
                font-size:35px;
                margin-bottom:-5px;
                }
                .renz_pricing-table .grid .box .features > * {
                color:#555;
                padding:5px 0px;
                }
                .renz_txt{
                    text-align: left;
                    font-size: 15px;
                    font-weight: 400;
                }
                .renz_pricing-table .grid .box .button button {
                width:100%;
                margin:25px 0px 0px;
                padding:10px;
                background:linear-gradient(to bottom, #0066FF, #1e00c9);
                color:#fff;
                border-radius:5px;
                outline:none;
                border:none;
                font-weight:600;
                cursor:pointer;
                }
                .renz_pricing-table .grid .box.professional {
                transform:scale(1.1);
                background:linear-gradient(to bottom, #0066FF, #1e00c9);
                }
                .renz_pricing-table .grid .box.professional .title {
                color:#eee;
                }
                .renz_pricing-table .grid .box.professional .price {
                color:#fff;
                }
                .renz_pricing-table .grid .box.professional .features > * {
                color:#fff;
                }
                .renz_pricing-table .grid .box.professional .button button {
                background:#fff;
                color:#1e00c9;
                }

                @media (max-width:804px){
                .renz_pricing-table .grid {
                    gap:20px;
                }
                .renz_pricing-table .grid .box.professional {
                    transform:scale(1);
                }
                }


                @media screen and (max-width: 767px) {
                    .renz_prizing_MeBTN{
                        margin-left: 10px !important;
                    }

                    .renz_K12Btn{
                        margin-left: 30px;
                    }
                    .renz_TertiaryBtn{
                        margin-top: 10px;
                        margin-left: -10px;
                    }
                }
            
                @media screen and (max-width: 912px) {
                .renz_prizing_MeBTN{
                    margin-left: 15% !important;
                }
                    
                }


                
            .renz_Ter_Pricing {
                background: linear-gradient(90deg, rgba(0,123,255,1)
                35%, rgba(2,107,219,1) 100%, rgba(0,212,255,1) 100%);
                border-radius:10px;
                box-shadow:0px 2px 10px 5px rgba(0,0,0,0.05);
                margin: 50px auto 60px;
                max-width: 800px;
                overflow: hidden;
                padding: 50px 40px;
            }


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


                    <!-- <div class="container" > -->
                            <div align="center">
                                <h1 style="font-weight: 700; color:#535353;">
                                <span style="color: #0066FF;">EduMESS</span>  <?php echo $pricing_page_header_title; ?></h1>
                                <p style="font-size: 17px; font-weight: 400; color:#686868;">
                                    <?php echo $pricing_page_title_sub1; ?>
                                    <br> 
                                    <?php echo $pricing_page_title_sub2; ?>
                                </p>
                            </div>
                        
                    <!-- </div> -->


                        <!--PLAN FEATURE CONTENT HERE-->
                        <div class="container-fluid" style="padding-top: 50px; padding-bottom: 150px;">
                            <div class="renz_prizing_MeBTN" style="margin-left: 32%;">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item border renz_K12Btn" style="border-radius: 5px;" role="presentation">
                                        <button class="nav-link active" style="width: 100%; font-size: 18px; font-weight: 500;" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                                            <?php echo $pricing_page_K_12; ?><div style="font-size: 12px; margin-top: -5px;"><?php echo $pricing_page_K_12_sub_txt; ?></div>
                                        </button>
                                    </li>&nbsp;&nbsp;&nbsp;
                                    <li class="nav-item border renz_TertiaryBtn" style="border-radius: 5px;" role="presentation">
                                        <button class="nav-link" style="width: 100%; font-size: 18px; font-weight: 500;" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                                            <?php echo $pricing_page_tertiary; ?><div style="font-size: 12px; margin-top: -5px;"><?php echo $pricing_page_tertiary_sub_txt; ?></div>
                                        </button>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                
                                    <div class="renz_pricing-table" style="padding-top: 80px;">
                                        <div class="grid">
                                            <div class="box basic">
                                                <div class="title"><?php echo $pricing_page_free_txt; ?></div>
                                                <div class="title_decr"><?php echo $pricing_page_Beginner_txt; ?></div>
                                                <div class="price">
                                                <b style=" color:#555;">₦0</b>
                                                <i style="font-size: 14px; color:#555;"><?php echo $pricing_page_per_student; ?></i>
                                                </div>
                                                <hr>
                                                <div class="features">
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i><?php echo $pricing_page_free_db_management; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i><?php echo $pricing_page_free_bulk_sms; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i><?php echo $pricing_page_free_result_management; ?></div>
                                                </div>
                                                <div class="button" style="margin-top: 390px;">
                                                    <button>Upgrade Now</button>
                                                </div>
                                            </div>

                                            <div class="box ninja">
                                                <div class="title"><?php echo $pricing_page_basic_txt; ?></div>
                                                <div class="title_decr"><?php echo $pricing_page_enthusiast_txt; ?></div>
                                                <div class="price">
                                                    <b style=" color:#555;">₦500</b>
                                                    <i style="font-size: 14px; color:#555;"><?php echo $pricing_page_per_student; ?></i>
                                                </div>
                                                <hr>
                                                <div class="features">
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_free_db_management; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_free_bulk_sms; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_free_result_management; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_pta_management; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_attendance; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_user_authentication; ?></div>
                                                    
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_multi_users; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_analytics; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_config_setting; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_grading_structure; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_entry_computation; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_promotion_demote; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_comments; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_special_activity; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_telepresence_surveillance; ?></div>
                                                </div>
                                                <div class="button">
                                                    <button>Upgrade Now</button>
                                                </div>
                                            </div>
                        
                                            <div class="box professional">
                                                <div class="title_summRe" style="color: #fff;"><?php echo $pricing_page_every_day_plan; ?></div>
                                                <div class="title"><?php echo $pricing_page_pro; ?></div>
                                                <div class="title_decr" style="color: #fff;"><?php echo $pricing_page_inspirational; ?></div>
                                                <div class="price"> 
                                                    <b>₦750</b>
                                                    <i style="font-size: 15px;"><?php echo $pricing_page_per_student; ?></i>
                                                </div>
                                                <hr style="color: #fff;">
                                                <div class="features">
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_cbt; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_addmission_management; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_finance_management; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_e_leaning; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_e_wallet; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_TP; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_inventory; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_assignment; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_hoilday_program; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_lesson_plan; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_lesson_note; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_Disciplinary_mag; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_e_mail_service; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_policy; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_fee_payment; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_time_table; ?></div>
                                                </div>
                                                <div class="button" style="margin-top: -10px;">
                                                    <button>Upgrade Now</button>
                                                </div>
                                            </div>
                        
                                            <div class="box ninja">
                                                <div class="title_summRe" style="color: #555;"><?php echo $pricing_page_every_plan_pro; ?></div>
                                                <div class="title"><?php echo $pricing_page_entrepreneur; ?></div>
                                                <div class="title_decr"><?php echo $pricing_page_impactful; ?></div>
                                                <div class="price">
                                                    <b style=" color:#555;">₦1,500</b>
                                                    <i style="font-size: 14px; color:#555;"><?php echo $pricing_page_per_student; ?></i>
                                                </div>
                                                <hr>
                                                <div class="features">
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_cbt; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_e_library; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_hostel_management; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_Cafeteria_Management; ?></div>
                                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_cbt; ?></div>
                                                                                
                                                </div>
                                                <div class="button" style="margin-top: 270px;">
                                                    <button>Upgrade Now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        
                                    <div class="renz_Ter_Pricing">
                                        <div align="center">
                                            <h1 style="color: #fff; font-weight: 700; margin-top: -20px;">
                                                <span style="font-size: 22px; font-weight: 500;"><?php echo $pricing_page_tertiary_interested; ?></span>
                                                <br><?php echo $pricing_page_tertiary_edummess_h1; ?>
                                            </h1>
                                        
                                            <p style="color: #fff; font-size: 14px;"><?php echo $pricing_page_tertiary_callback_descr1; ?> <br> <?php echo $pricing_page_tertiary_callback_descr2; ?></p>
                                            
                                            <a href="#" class="btn" style="border: 2px solid #007bff; margin-top: 50px; color:white; width: 60%; border-radius: 7px;padding: 2%;font-weight: 500;font-size:18px;background: #fff;color:#007bff;">
                                                <span>
                                                    <?php echo $pricing_page_tertiary_callback_btn; ?>
                                                </span>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <!--PLAN FEATURE CONTENT HERE-->

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

  








</body>

</html>