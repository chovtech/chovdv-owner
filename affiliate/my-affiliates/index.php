<?php
    include('../../controller/session/session-checker-franchise.php');

?>
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
            <title>EduMESS | Affiliates</title>
            <!-- FAVICON AND TOUCH ICONS -->
        <link rel="shortcut icon" href="../../assets/images/website_images/favicon.png" type="image/x-icon">
        <link rel="icon" href="../../assets/images/website_images/favicon.png" type="image/x-icon">
        <link rel="apple-touch-icon" sizes="152x152" href="../../assets/images/website_images/favicon.png">
        <link rel="apple-touch-icon" sizes="120x120" href="../../assets/images/website_images/favicon.png">
        <link rel="apple-touch-icon" sizes="76x76" href="../../assets/images/website_images/favicon.png">
        <link rel="apple-touch-icon" href="../../assets/images/website_images/favicon.png">
        <link rel="icon" href="../../assets/images/website_images/favicon.png" type="image/x-icon">

        <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap Core CSS -->

        <link href="../../notify/wnoty.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
          <!-- notification css-->
        <link href="../../assets/plugins/notify/wnoty.css" rel="stylesheet">

        <script src="../../assets/plugins/jquery/jquery.min.js"></script>
        <!-- style sheet -->
        <link rel="stylesheet" href="../../css/admin_css/adminStyle.css">
        <link rel="stylesheet" href="../../css/admin_css/affiliate.css">
        <script type="text/javascript" src="https://sdk.monnify.com/plugin/monnify.js"></script>

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
            <?php include('../../includes/affiliate-header.php'); ?>
            <!--End Header -->


            <!-- Sidebar -->
            <?php include('../../includes/affiliate-menu.php'); ?>
            <!-- End Sidebar -->


            

            <!----Main----->
            <main class="main-container">

                <div class="main-title">
                    <span class="font-weight-bold">Manage Affiliates </span>
                </div>

                <!-- Content Row -->
                <div class="row mt-4">

                    <!-- Total First Level Affiliates -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary mb-1">
                                            Total First Level Affiliates</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="f_l_aff_no"></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Second Level Affiliates -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2" style="border-left: .25rem solid #1cc88a !important;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary mb-1">
                                            Total Second Level Affiliates</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="s_l_aff_no"></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2" style="border-left: .25rem solid #36b9cc !important;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary mb-1">
                                            Earnings (First level Affiliates)</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="f_l_aff_earn"></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-naira-sign fa-2x text-gray-300">₦</i>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Second level Affiliates) -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2" style="border-left: .25rem solid #f6c23e !important;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary mb-1">
                                            Earnings (Second level Affiliates)</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="s_l_aff_earn"></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-naira-sign fa-2x text-gray-300">₦</i>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-3 card p-3">

                    <!-- Search and Filter Show -->
                    <div class="row mt-2">

                        <div class="col-xl-9 col-md-6 mb-1">
                            <div class="input-group mb-3" style="width:65%;">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control form-control-sm" id="searchInput" placeholder="Search by Name, Amount, Date, Email, Phone No." aria-label="Search" aria-describedby="basic-addon1">
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-1">
                            <select class="form-select form-select-sm" id="aff_level" aria-label=".form-select-sm example">
                                <option value="0" selected>Affiliate Level</option>
                                <option value="1">Level One Affiliates</option>
                                <option value="2">Level Two Affiliates</option>
                            </select>
                        </div>

                    </div>

                    <!-- Display All Affiliates -->
                    <div class="row" id="display_affiliates">

                    </div>
                </div>

            </main>

        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.40.0/apexcharts.min.js"></script>
        <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- notification js -->
        <script src="../../assets/plugins/notify/wnoty.js"></script>

        <script src="../../js/admin_js/adminScript.js"></script>

        <!-- header js -->
        <?php include('../../controller/js/app/header.php'); ?>

        <!-- affiliate js -->
        <?php include('../../controller/js/affiliate/affiliate.php'); ?>

    </body>

</html>