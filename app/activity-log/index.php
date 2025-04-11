<?php include( '../../controller/session/session-checker-owner.php' );
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.NULL'>
    <meta name='author' content='EduMESS' />
    <meta name='description' content="EduMESS (Education Management and E-Learning Software Solution) 
        is a leading school management, automation and elearning solution. Since its 
        launch, EduMESS has grown to become a leader. Our clients say that the simplicity 
        of our interface, ease of use, cost effectiveness and excellent customer care is 
        the reason they prefare EduMESS. We have watched schools move from softwares they 
        are using to EduMESS." />
    <meta name='keywords' content="Best, School, Management, Best School, Best School Management, 
        Best School Management Software, Free School Management Software, Portal, 
        School Owner, Group of School Owner, Consultants, Brand Promoters | School Portal Generator ">
    <title>EduMESS</title>
    <!-- FAVICON AND TOUCH ICONS -->
    <link rel='shortcut icon' href='../../assets/images/website_images/favicon.png' type='image/x-icon'>
    <link rel='icon' href='../../assets/images/website_images/favicon.png' type='image/x-icon'>
    <link rel='apple-touch-icon' sizes='152x152' href='../../assets/images/website_images/favicon.png'>
    <link rel='apple-touch-icon' sizes='120x120' href='../../assets/images/website_images/favicon.png'>
    <link rel='apple-touch-icon' sizes='76x76' href='../../assets/images/website_images/favicon.png'>
    <link rel='apple-touch-icon' href='../../assets/images/website_images/favicon.png'>
    <link rel='icon' href='../../assets/images/website_images/favicon.png' type='image/x-icon'>

    <link href='../../assets/plugins/bootstrap/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Arvo&display=swap' rel='stylesheet'>
    <script src='../../assets/plugins/jquery/code.jquery.com_jquery-3.5.1.min.js'></script>
    <link href='https://fonts.googleapis.com/icon?family=Material+Icons+Sharp' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- fontawesome cdn -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' />

    <!-- Animate.css CDN -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css'
        integrity='sha512-...' crossorigin='anonymous' />

    <!-- style sheet -->
    <link rel='stylesheet' href='../../css/app_css/appStyle.css'>

    <link rel='stylesheet' href='../../css/app_css/settings.css'>
    <!---Sidebar sheetsheet--->

    <!--POST TRANSACTION CSS HERE-->
    <link rel='stylesheet' href='../../css/app_css/postransaction.css'>
    <!--POST TRANSACTION CSS HERE-->
    <!-- CSS -->
    <link rel='stylesheet' href='https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css'>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha3/css/bootstrap.min.css'>

    <!-- notification css-->
    <link href='../../assets/plugins/notify/wnoty.css' rel='stylesheet'>

    <!-- html2pdf CDN link -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js'
        integrity='sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=='
        crossorigin='anonymous' referrerpolicy='no-referrer'></script>

    <script type='text/javascript'>
    function showHideRow(row) {
        $('#' + row).toggle();
    }
    </script>

    <style>
    @font-face {
        font-family: 'Inter';
        src: url('Inter-Regular.ttf') format('truetype');
        font-weight: 400;
        font-style: normal;
    }

    @font-face {
        font-family: 'Inter';
        src: url('Inter-Medium.ttf') format('truetype');
        font-weight: 500;
        font-style: normal;
    }

    @font-face {
        font-family: 'Inter';
        src: url('Inter-Bold.ttf') format('truetype');
        font-weight: 700;
        font-style: normal;
    }

    @font-face {
        font-family: 'Space Mono';
        src: url('SpaceMono-Regular.ttf') format('truetype');
        font-weight: 400;
        font-style: normal;
    }

    .abba_header-columns {
        display: flex;
        justify-content: space-between;
        padding-left: 4.5rem;
        padding-right: 2.5rem;
    }

    .abba_logo {
        height: 5rem;
        width: auto;
        margin-right: 1rem;
    }

    .abba_logotype {
        display: flex;
        align-items: center;
        font-weight: 700;
        color: black;
        font-size: larger;
    }

    .abba_page {
        margin-left: 5rem;
        margin-right: 5rem;
    }

    .abba_table-box table,
    .abba_summary-box table {
        width: 100%;
        font-size: 0.625rem;
    }

    .abba_table-box table {
        padding-top: 0.2rem;
    }

    .abba_table-box table tr.abba_heading td {
        border-top: 1px solid #000000;
        border-left: 1px solid #d7dce4;
        border-right: 1px solid #d7dce4;
        border-bottom: 1px solid #000000;
        padding-left: 5px;
        height: 1.5rem;
    }

    .abba_table-box table tr.abba_item td,
    .abba_summary-box table tr.abba_item td {
        border-bottom: 1px solid #d7dce4;
        border-left: 1px solid #d7dce4;
        border-right: 1px solid #d7dce4;
        padding-left: 5px;
        height: 1.5rem;
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

    <div class='grid-container'>

        <?php

function prosloadnotimagefound( $link )
 {
    $pros_select_record_not_found = mysqli_query( $link, "SELECT * FROM `defaultimages` WHERE `ImageName`='abba-no-record-found-image2'" );
    $pros_select_record_not_found_count = mysqli_num_rows( $pros_select_record_not_found );
    $pros_select_record_not_found_row = mysqli_fetch_assoc( $pros_select_record_not_found );

    if ( $pros_select_record_not_found_count > 0 ) {

        $pros_general_no_record = $pros_select_record_not_found_row[ 'BaseSixtyFour' ];

        echo '<img class="mb-1" src="' . $pros_general_no_record . '" width="100" alt="">

                    <p>Ensure all fields, including Student, are selected before proceeding.</p>';

    } else {
        // Record not found
        // You can do something else here if the record doesn't exist
                }
            }

        ?>

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
                <div class="row g-3">
                    <div class="col-sm-4 col-md-6 col-lg-4">

                        <div class="topSecCards" style="width: 100%; height: 120px;">
                            <div style="border: 2px solid #0066FF; height: 100%; border-radius: 8px; padding: 10px;">
                                <div align="center" style="font-size: 60px; color: #0066FF;">
                                    <i class="fas fa-archive"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-6 col-lg-4">

                        <div class="topSecCards" style="width: 100%; height: 120px;">
                            <div class="abba_parent_card"
                                style="background: linear-gradient(0deg, rgba(255, 165, 0, 1) 0%, rgba(255, 69, 0, 1) 53%, rgba(255, 69, 0, 1) 100%);">
                                <div class="row" style="margin-top: 12px;">
                                    <div class="col-8">
                                        <h6
                                            style="font-size: 12px; margin-top: 5px; margin-left: 10px; color: #ffffff;">
                                            Total Asset</h6>
                                        <p></p>
                                        <h4 style="margin-left: 10px; color: #ffffff;" class="total_asset"
                                            id="total_category"></h4>
                                    </div>
                                    <div class="col-4">
                                        <i class="fas fa-list text-white" style="font-size:50px;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>



                    <div class="col-sm-4 col-md-6 col-lg-4">

                        <div class="topSecCards" style="width: 100%; height: 120px;">
                            <div class="abba_parent_card"
                                style="background: linear-gradient(0deg, rgba(12,3,160,1) 0%, rgba(0,127,251,1) 53%, rgba(0,127,251,1) 100%);">
                                <div class="row" style="margin-top: 12px;">
                                    <div class="col-8">
                                        <h6
                                            style="font-size: 12px; margin-top: 5px; margin-left: 10px; color: #ffffff;">
                                            Total Value</h6>
                                        <p></p>
                                        <h4 style="margin-left: 10px; color: #ffffff;" class="asset_value"
                                            id="total_item"></h4>
                                    </div>
                                    <div class="col-4">
                                        <i class="fas fa-cube text-white" style="font-size:50px;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div id="campus"></div>
            <div class="row g-2" style="margin-top: 50px;">
                <div class="col-md-2 col-lg-2">
                    <select id="selectcampus" style="color: #666666;"
                        class="form-select form-select-sm emma-load-campuspostransaction"
                        aria-label=".form-select-sm example">
                        <option value="NULL">Select Campus</option>

                    </select>
                </div>
                <div class="col-md-2 col-lg-2">

                    <select id="session" style="color: #666666;"
                        class="form-select form-select-sm emma-transactiontype" aria-label=".form-select-sm example ">
                        <option selected value="NULL">Select Session</option>


                    </select>

                </div>

                <div class="col-md-2 col-lg-2">

                    <select id="term" style="color: #666666;"
                        class="form-select form-select-sm emma-transactiontype" aria-label=".form-select-sm example ">
                        <option selected value="NULL">Select Term</option>


                    </select>

                </div>

                <div class="col-md-4 col-lg-3">


                    <button type="button" id="load_btn"
                        style="margin-left: 10px; font-size: 11px; height: 30px; width: 70px; border-radius: 5px;"
                        class="btn btn-primary btn-sm emma-transactionhistory-btn">Load</button>
                </div>



                <!-- JavaScript -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
                <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>

                <script src="../../js/app_js/printtables/waves.js"></script>
                <script src="../../js/app_js/printtables/jspdf.debug.js"></script>
                <script src="../../js/app_js/printtables/html2canvas.min.js"></script>
                <script src="../../js/app_js/printtables/html2pdf.min.js"></script>

                <script>
                $(document).ready(function() {

                    $('#table1').DataTable({
                        responsive: true
                    });

                    // Initialize Second Table
                    $('#table2').DataTable({
                        responsive: true
                    });
                });
                </script>

                <!--Custom JS--->
                <script src="../../js/app_js/appScript.js"></script>
                <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


                <!-- notification js -->
                <script src="../../assets/plugins/notify/wnoty.js"></script>

                <!-- header js -->
                <?php include('../../controller/js/app/header.php' );
        ?>

                <!-- notification js -->
                <script src='../../controller/js/app/activity-log.js'></script>
</body>

</html>