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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        integrity="sha512-..." crossorigin="anonymous" />

    <!-- style sheet -->
    <link rel="stylesheet" href="../../css/app_css/appStyle.css">

    <link rel="stylesheet" href="../../css/app_css/settings.css">
    <!---Sidebar sheetsheet--->
    
     <!--POST TRANSACTION CSS HERE-->
     <link rel="stylesheet" href="../../css/app_css/postransaction.css">
     <!--POST TRANSACTION CSS HERE-->
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha3/css/bootstrap.min.css">

    <!-- notification css-->
    <link href="../../assets/plugins/notify/wnoty.css" rel="stylesheet">

    <!-- html2pdf CDN link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
         <link href="../../../assets/plugins/numberformat/intlTelInput.min.css"
		rel="stylesheet" />
        	<script src="../../../assets/plugins/numberformat/intlTelInput.min.js"></script>

    <script type="text/javascript">
        function showHideRow(row) {
            $("#" + row).toggle();
        }
    </script>
        
    <style>
 
        @font-face {
            font-family: "Inter";
            src: url("Inter-Regular.ttf") format("truetype");
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: "Inter";
            src: url("Inter-Medium.ttf") format("truetype");
            font-weight: 500;
            font-style: normal;
        }

        @font-face {
            font-family: "Inter";
            src: url("Inter-Bold.ttf") format("truetype");
            font-weight: 700;
            font-style: normal;
        }

        @font-face {
            font-family: "Space Mono";
            src: url("SpaceMono-Regular.ttf") format("truetype");
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
            color:black;
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
    
    
    
    
     <style>
        .coming_soon {
            position: relative;
             pointer-events: none;
            cursor: not-allowed;
        }
        
        .coming_soon::after {
            content: "Coming Soon...";
            position: absolute;
            top: 0;
            left: 10px;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.7); /* White with transparency */
            backdrop-filter: blur(1px); /* Apply blur effect */
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            
        }

    </style>
  
</head>

<body>

    <!-- Loader -->
    <!--<div id="gx-overlay">-->
    <!--	<div class="gx-ellipsis">-->
    <!--		<div></div>-->
    <!--		<div></div>-->
    <!--		<div></div>-->
    <!--		<div></div>-->
    <!--	</div>-->
    <!--</div>-->

    <div class="grid-container" >

        <?php

            function prosloadnotimagefound($link)
            {
                $pros_select_record_not_found = mysqli_query($link, "SELECT * FROM `defaultimages` WHERE `ImageName`='abba-no-record-found-image2'");
                $pros_select_record_not_found_count = mysqli_num_rows($pros_select_record_not_found);
                $pros_select_record_not_found_row = mysqli_fetch_assoc($pros_select_record_not_found);

                if ($pros_select_record_not_found_count > 0) {


                    $pros_general_no_record = $pros_select_record_not_found_row['BaseSixtyFour'];

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

            <?php include('pros-financetopdashboard.php'); ?>
            
            <div class="main-cards" style="margin-top: 50px;">
                <div class="row">
                    <div class="col-md-9 col-lg-10"></div>
                    <div class="col-md-3 col-lg-2">
                        <!-- Example single danger button -->
                        <div class="dropdown">
                            <button class="btn btn-sm btn-primary dropdown-toggle" style="float: right;font-size: 12px;"
                                type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-plus"></i> Post Transaction
                            </button>
                            <ul class="dropdown-menu postTransBtn dropdown-menu-lg-end"
                                style="font-size: 13px; color: #636161;cursor:pointer;" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#prosperpostincometransaction">Post Income</a></li>
                                <li><a class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#prosperpostincometransactionexpen">Post Expenses</a></li>
                            </ul> 
                        </div>

                    </div>
                </div><br>
                
                <!-- Navbar pills -->
                <div class="row">
                   <div class="col-sm-12">
                       <!-- Nav tabs -->
                       <div class="col-sm-12">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link border active mt-3" id="transaction_history-tab"
                                        data-bs-toggle="pill" data-bs-target="#transaction_history" type="button"
                                        role="tab" aria-controls="transaction_history" aria-selected="true">Transaction
                                        History</button>
                                </li>&nbsp;&nbsp;&nbsp;
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link border mt-3" id="fee-setting-tab" data-bs-toggle="pill" data-bs-target="#fee-setting" type="button" role="tab" aria-controls="fee-setting" aria-selected="false">Fee Setting</button>
                                </li>&nbsp;&nbsp;&nbsp;
                                
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link border emma_transport_tab mt-3" id="transport-settings-tab" data-id="transportation" data-bs-toggle="pill" data-bs-target="#transport-settings" type="button" role="tab" aria-controls="transport-settings" aria-selected="false">Transport Setting</button>
                                </li>
                                
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link border  emma_hostel_tab mt-3" id="hostel-settings-tab" data-id="hostel" data-bs-toggle="pill" data-bs-target="#hostel-settings" type="button" role="tab" aria-controls="hostel-settings" aria-selected="false">Hostel Setting</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                <button class="nav-link border mt-3" id="individual_bill-tab" data-bs-toggle="pill" data-bs-target="#individual_bill" type="button" role="tab" aria-controls="individual_bill" aria-selected="false">Individual Bill/Fee Drive</button>
                                </li>&nbsp;&nbsp;&nbsp;


                               

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link border mt-3" id="reportCl-tab" data-bs-toggle="pill" data-bs-target="#reportCl"budgeting-tab type="button" role="tab" aria-controls="reportCl" aria-selected="false">Report/Statement</button>
                                </li>
                                
                                  <li class="nav-item ms-2" role="presentation">
                                    <button class="nav-link border mt-3" id="audit-trail-tab" data-bs-toggle="pill" data-bs-target="#audit-trail" type="button" role="tab" aria-controls="audit-trail" aria-selected="false">Audit Trail</button>
                                </li>
                                
                                 <li class="nav-item ms-2" role="presentation">
                                    <button class="nav-link border mt-3" id="budgeting-tab" data-bs-toggle="pill" data-bs-target="#budgeting" type="button" role="tab" aria-controls="budgeting" aria-selected="false">Budgeting</button>
                                </li>

                            </ul>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="transaction_history" role="tabpanel"
                                    aria-labelledby="transaction_history-tab">
                                    <?php include('post-transaction-history.php'); ?>
                                </div>
                                
                                
                                
                                <div class="tab-pane fade  " id="transport-settings" role="tabpanel"
                                    aria-labelledby="transport-settings-tab">
                                     <!-- manage route/transportation -->
                                     <?php include('transportation.php'); ?>
                                   
                                </div>
                                
                                
                                 <div class="tab-pane fade" id="hostel-settings" role="tabpanel"
                                    aria-labelledby="hostel-settings-tab">
                                      <!-- manage route/transportation -->
                                       <?php include('hostel.php'); ?>
                                </div>
                                
                              

                                 


                                <div class="tab-pane fade" id="fee-setting" role="tabpanel" aria-labelledby="fee-setting-tab">
                                    <div class="row g-2">
                                        <div class="col-md-12 col-lg-10">
                                            
                                        </div>
                                        
                                        <div class="col-md-3 col-lg-2">
                                            
                                            <button class="btn btn-sm btn-primary create_charge_abba" style="float: right;font-size: 12px;" type="button" data-bs-toggle="modal" data-bs-target="#financeonboardingModal2">
                                                <i class="fas fa-money-bill"></i> Create Charge
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row g-2 mt-3">
                                        
                                        <div class="col-md-2 col-lg-2">
                                            <form>
                                                <div class="mb-3">
                                                    <div class="search-container">
                                                        <input type="text" class="search-input form-control form-control-sm abba_class_search" placeholder="Search">
                                                        <i class="fa fa-search search-icon"></i>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-3 col-lg-2">
                                            <select style="color: #666666;" class="form-select form-select-sm" aria-label="form-select-sm example" id="abba_display_fee_campus">
                                                <option value="NULL">Select campus</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-lg-2">
                                            <select style="color: #666666;" class="form-select form-select-sm" aria-label="form-select-sm example" id="abba_display_fee_session">

                                                <option value="NULL" disabled>Select Session</option>
                                                <?php

                                                    $abba_sql_session = ("SELECT * FROM `session` ORDER BY sessionName DESC");
                                                    $abba_result_session = mysqli_query($link, $abba_sql_session);
                                                    $abba_row_session = mysqli_fetch_assoc($abba_result_session);
                                                    $abba_row_cnt_session = mysqli_num_rows($abba_result_session);

                                                    if ($abba_row_cnt_session > 0) {
                                                        do {
                                                            if ($abba_row_session['sessionStatus'] == '1') {
                                                                $abba_selected_session = 'selected';
                                                            } else {
                                                                $abba_selected_session = '';
                                                            }
                                                            echo '<option value="' . $abba_row_session['sessionName'] . '" ' . $abba_selected_session . '>' . $abba_row_session['sessionName'] . '</option>';

                                                        } while ($abba_row_session = mysqli_fetch_assoc($abba_result_session));
                                                    } else {
                                                        echo '<option value="0">No Records Found</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-lg-2">
                                            <select style="color: #666666;" class="form-select form-select-sm" aria-label="form-select-sm example"
                                                id="abba_display_fee_term">
                                                <option value="NULL">Select Term</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-lg-2">
                                            <select style="color: #666666;" class="form-select form-select-sm"
                                                aria-label=".form-select-sm example" id="abba_display_fee_section">
                                                <option value="NULL">Select Section</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-lg-2">
                                            
                                            <button class="btn btn-sm btn-primary abba_load_class_fee" style="float: right;font-size: 12px;" type="button">
                                                Load
                                            </button>
                                        </div>
                                    </div>

                                    <div class="row g-2 mt-3" id="abba_display_classes_set">
                                        <div align="center"> <img src="../../assets/images/adminImg/filter.png" style="width:15%;opacity:0.7;"/> <p class="pt-2 fs-6 text-secondary">Please select campus, session and term to proceed.</p></div>
                                        
                                    </div>

                                </div>


                                <div class="tab-pane fade" id="individual_bill" role="tabpanel" aria-labelledby="individual_bill-tab">
                                      <?php include('feedrive-content.php'); ?>
                               </div> 
                              

                                <div class="tab-pane fade" id="reportCl" role="tabpanel" aria-labelledby="reportCl-tab">

                                    <ul class="nav nav-tabs mb-3 customtab" id="ex1" role="tablist">

                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active abba_main_tab"
                                            id="ex1-tab-1" data-id="staff"
                                            data-bs-toggle="tab"
                                            href="#ex1-tabs-1"
                                            role="tab"
                                            aria-controls="ex1-tabs-1"
                                            aria-selected="true" data-id="employee">Category Summary</a>
                                        </li>

                                        <li class="nav-item" role="presentation">
                                            <a
                                            class="nav-link abba_main_tab"
                                            id="ex1-tab-2" data-id="student"
                                            data-bs-toggle="tab"
                                            href="#ex1-tabs-2"
                                            role="tab"
                                            aria-controls="ex1-tabs-2"
                                            aria-selected="false">School Procceed</a>
                                        </li>
                                        
                                        <li class="nav-item" role="presentation">
                                            <a
                                            class="nav-link abba_main_tab"
                                            id="ex1-tab-3" data-id="student"
                                            data-bs-toggle="tab"
                                            href="#ex1-tabs-3"
                                            role="tab"
                                            aria-controls="ex1-tabs-3"
                                            aria-selected="false">Balance Sheet</a>
                                        </li>
                                        
                                        <li class="nav-item" role="presentation">
                                            <a
                                            class="nav-link abba_main_tab"
                                            id="ex1-tabP-4" data-id="profit"
                                            data-bs-toggle="tab"
                                            href="#ex1-tabsP-4"
                                            role="tab"
                                            aria-controls="ex1-tabsP-4"
                                            aria-selected="false">Profit & Loss Statement</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content" id="ex1-content">

                                         <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">    
                                             <?php include('categorysummary.php'); ?>
                                        
                                         </div>   
                                         
                                         <div class="tab-pane fade show " id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">    
                                        
                                                 <?php include('schoolproceed.php'); ?>     
                                         </div>   


                                        <div class="tab-pane fade show " id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">    
                                        
                                                   <?php include('pros-balancesheetcont.php'); ?>
                                         </div>  
                                         
                                          <div class="tab-pane fade show " id="ex1-tabsP-4" role="tabpanel" aria-labelledby="ex1-tabP-4">    
                                        
                                                   <?php include('pros-profit-loss-stament.php'); ?>
                                         </div>  


                                    </div>                                  


                                </div>
                                
                                 <div class="tab-pane fade" id="audit-trail" role="tabpanel"
                                    aria-labelledby="audi-trail-tab">
                                    <?php include('audit-trail2.php'); ?>
                                </div>
                                
                                
                                 <div class="tab-pane fade" id="budgeting" role="tabpanel" 
                                    aria-labelledby="budgeting-tab">
                                    <?php include('emmabudgetingcontent.php')?>
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
    <?php include('pros-load-transactionmodal.php'); ?>
    
    <!-- Fees Onboarding -->
    <?php include('onboarding.php'); ?>
    <!-- End Sidebar -->
    
    <?php include('emmaloadbudgetingmodal.php')?>

    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>
    
    <!-- pagination js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.min.js"></script>
    
    <script src="../../js/app_js/printtables/waves.js"></script>
    <script src="../../js/app_js/printtables/jspdf.debug.js"></script>
    <script src="../../js/app_js/printtables/html2canvas.min.js"></script>
    <script src="../../js/app_js/printtables/html2pdf.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    
        <!-- current page js -->
        <?php include('../../js/current_page.php'); ?>
    
    
    <!-- jsPDF -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script> -->
    <!-- html2pdf -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script> -->
    
    <script>
    
    //   $(document).ready(function() {
    //   // Initialize First Table
    //   $('#table1').DataTable({
    //     responsive: true
    //   });
    
    //   // Initialize Second Table
    //   $('#table2').DataTable({
    //     responsive: true
    //   });
    // });
    
    
           
    
    </script>

    <!--Custom JS--->
    <script src="../../js/app_js/appScript.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

     <!-- onboarding js -->
    <script src="../../controller/js/app/finance-onboarding.js"></script>

    <!-- notification js -->
    <script src="../../assets/plugins/notify/wnoty.js"></script>

    <!-- header js -->
    <?php include('../../controller/js/app/header.php'); ?>
    
    <!--  -->
    <?php include('../../controller/js/app/pros-financetransaction.php'); ?>
    
     <script src="../../controller/js/app/emma-audit-trial.js"></script>

    <!-- transportation js -->
    <script src="../../controller/js/app/emma_administration.js"></script>

    <!-- hostel js  -->
    <script src="../../controller/js/app/hostel.js"></script>
    
    <script src="../../controller/js/app/emma_budgeting.js"></script>

</body>

</html>