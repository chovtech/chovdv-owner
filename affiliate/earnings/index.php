<?php include('../../controller/session/session-checker-franchise.php'); ?>
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

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />

    <!-- style sheet -->
    <link rel="stylesheet" href="../../css/app_css/appStyle.css">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha3/css/bootstrap.min.css">

    <!-- notification css-->
    <link href="../../assets/plugins/notify/wnoty.css" rel="stylesheet">

    <script type="text/javascript" src="https://sdk.monnify.com/plugin/monnify.js"></script>

    <style>
        .coming_soon {
            position: relative;
        }

        .coming_soon::after {
            content: "Coming Soon...";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.7);
            /* White with transparency */
            backdrop-filter: blur(1px);
            /* Apply blur effect */
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
        }

        .abba-font-h2-strong {
            color: #141414;
            font-weight: 400;
            font-size: 24px;
            line-height: 31.68px;
            font-family: "Lexend", sans-serif;
        }

        .abba-font-text-large-1 {
            color: #8f8f8f;
            font-weight: 400;
            font-size: 16px;
            line-height: 20px;
            font-family: "Inter", sans-serif;
        }

        .abba-main-content-container {
            display: flex;
            flex-grow: 1;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            row-gap: 32px;
        }

        .abba-text-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            row-gap: 12px;
        }

        .abba-pin-btn {
            padding: 10px 16px 10px 16px;
            border: none;
            border-radius: 4px;
            line-height: 20px;
            font-weight: 500;
            font-family: "Inter", sans-serif;
            width: 100%;
            max-width: 220px;
            font-size: 16px;
            cursor: pointer;
        }

        #abba-otp-input {
            display: flex;
            column-gap: 8px;
        }

        #abba-otp-input input {
            text-align: center;
            padding: 10px 8px 10px 8px;
            border: 1px solid #adadad;
            border-radius: 4px;
            outline: none;
            height: 64px;
            width: 50px;
        }

        #abba-otp-input input:focus {
            border: 1px solid #007ffb;
        }

        #abba-otp-input input:focus::placeholder {
            color: transparent;
        }

        #abba-otp-input input::-webkit-outer-spin-button,
        #abba-otp-input input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        #abba-otp-input input[type="number"] {
            -moz-appearance: textfield;
            /* Firefox */
        }




        .abba-enter-font-h2-strong {
            color: #141414;
            font-weight: 400;
            font-size: 24px;
            line-height: 31.68px;
            font-family: "Lexend", sans-serif;
        }

        .abba-enter-font-text-large-1 {
            color: #8f8f8f;
            font-weight: 400;
            font-size: 16px;
            line-height: 20px;
            font-family: "Inter", sans-serif;
        }

        .abba-enter-main-content-container {
            display: flex;
            flex-grow: 1;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            row-gap: 32px;
        }

        .abba-enter-text-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            row-gap: 12px;
        }

        .abba-enter-pin-btn {
            padding: 10px 16px 10px 16px;
            border: none;
            border-radius: 4px;
            line-height: 20px;
            font-weight: 500;
            font-family: "Inter", sans-serif;
            width: 100%;
            max-width: 220px;
            font-size: 16px;
            cursor: pointer;
        }

        #abba-enter-otp-input {
            display: flex;
            column-gap: 8px;
        }

        #abba-enter-otp-input input {
            text-align: center;
            padding: 10px 8px 10px 8px;
            border: 1px solid #adadad;
            border-radius: 4px;
            outline: none;
            height: 64px;
            width: 50px;
        }

        #abba-enter-otp-input input:focus {
            border: 1px solid #007ffb;
        }

        #abba-enter-otp-input input:focus::placeholder {
            color: transparent;
        }

        #abba-enter-otp-input input::-webkit-outer-spin-button,
        #abba-enter-otp-input input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        #abba-enter-otp-input input[type="number"] {
            -moz-appearance: textfield;
            /* Firefox */
        }

        .spacer-row {
            margin-bottom: 10px;
            /* Adjust the value to set the desired space between rows */
        }

        /* salary status */

        .prossalystsuscont {
            text-align: center;
            font-weight: 500;
            font-size: 10px;
            border-radius: 7px;
            padding: 2px 12px 2px 12px;
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
        <?php include('../../includes/affiliate-header.php'); ?>
        <!--End Header -->


        <!-- Sidebar -->
        <?php include('../../includes/affiliate-menu.php'); ?>
        <!-- End Sidebar -->


        <!----Main----->
        <main class="main-container">
            <div class="main-cards float-end" style="margin-top: 20px; width:98%;">
                <div class="row" style="padding: 10px; border-radius: 10px;background-color:#ffffff;">
                    <div class="col-sm-12 col-md-12 col-lg-8">
                        <div class="row mt-1">
                            <div class="col-sm-12 d-flex align-items-center">
                                <i class="fas fa-wallet fs-2 me-2"></i>
                                <span class="" style="font-size:20px;">My Earnings</span>
                            </div>
                        </div>
                        <div class="row mt-4 mb-2">
                            <div class="col-sm-4 mt-2">
                                <div class="card"
                                    style="border:none; border-radius: 7px;background-color:#E6F5FA;padding:10px;">
                                    <div>
                                        <small
                                            style="border-radius: 10px;background-color:#fff;padding:2px;padding-left:5px;padding-right:5px;color:#26813E;font-weight:500;width:45px;">
                                            <i class="fas fa-chart-line"></i>
                                        </small>
                                    </div>
                                    <div
                                        style="padding-top:15px;padding-left:5px;padding-right:5px;color:#000000;font-weight:500;">
                                        <small> Current Balance</small>
                                    </div>
                                    <div class="d-flex"
                                        style="padding-left:5px;padding-right:5px;color:#000000;font-weight:600;">
                                        <h5 class="wallet_balance" data-amt="">₦<?php echo number_format($WalletBal); ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-2">
                                <div class="card"
                                    style="border:none; border-radius: 7px;background-color:#FFE3E2;padding:10px;">
                                    <div>
                                        <small
                                            style="border-radius: 10px;background-color:#fff;padding:2px;padding-left:5px;padding-right:5px;color:#FE1E1E;font-weight:500;width:45px;">
                                            <i class="fas fa-chart-line"></i>
                                        </small>
                                    </div>
                                    <div
                                        style="padding-top:15px;padding-left:5px;padding-right:5px;color:#000000;font-weight:500;">
                                        <small> Total Amount Withdrawn</small>
                                    </div>
                                    <div style="padding-left:5px;padding-right:5px;color:#000000;font-weight:600;">
                                        <h5 id="s_l_aff_earn"></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-2">
                                <div class="card"
                                    style="border:none; border-radius: 7px;background-color:#E2FEE5;padding:10px;">
                                    <div>
                                        <small
                                            style="border-radius: 10px;background-color:#fff;padding:2px;padding-left:5px;padding-right:5px;color:#26813E;font-weight:500;width:45px;">
                                            <i class="fas fa-chart-line"></i>
                                        </small>
                                    </div>
                                    <div
                                        style="padding-top:15px;padding-left:5px;padding-right:5px;color:#000000;font-weight:500;">
                                        <small> Total Amount Credited</small>
                                    </div>
                                    <div style="padding-left:5px;padding-right:5px;color:#000000;font-weight:600;">
                                        <h5 id="f_l_aff_earn"></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5 mb-2">
                            
                            <div class="col-sm-12">

                                <div class="float-end table-responsive" style="border:1px solid #E5E5E5;border-radius:20px;padding:10px;width:100%;">
                                    
                                    <div class="row mt-1 mb-2">
                            
                                        <div class="col-xl-6 col-md-6 mb-1">
                                            <div class="justify-content-start mb-2">
                                              <input type="text" id="transactionSearch" class="form-control form-control-sm" placeholder="Search..." 
                                                     style="max-width: 180px; border: none; border-bottom: 1px solid #ccc; border-radius: 0; padding: 2px 5px; font-size: 14px;">
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-3 col-md-6 mb-1">
                                            <select class="form-select form-select-sm" id="aff_level" aria-label=".form-select-sm example">
                                                <option value="0" selected>Affiliate Level</option>
                                                <option value="1">Direct Affiliates</option>
                                                <option value="2">2nd Lvl Affiliates</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-xl-3 col-md-6 mb-1">
                                            <select class="form-select form-select-sm" id="trans_type" aria-label=".form-select-sm example">
                                                <option value="0" selected>All Status</option>
                                                <option value="credit">Credit</option>
                                                <option value="debit">Debit</option>
                                            </select>
                                        </div>
                                    </div>

                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Reference</th>
                                                <th scope="col">From</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Date</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="display_transactions">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <div class="row mt-lg-5">
                            <div class="col-sm-12">
                                <div class="card" style="border:none; border-radius: 12px;color:#fff;padding:10px;background-image: url('../../assets/images/bgs/3.png');">
                                    <div style="padding-top:10px;padding-left:5px;padding-right:5px;color:#fff;">
                                        <small> Earnings </small>
                                        <span class="float-end">
                                            <img src="../../assets/images/adminImg/white-favicon.png" style="width: 20%;" alt="">
                                            <span style="font-weight:bold;font-size:15px;"> EduMESS </span>
                                        </span>
                                    </div>
                                    <div style="padding-top:20px;padding-left:5px;padding-right:5px;color:#fff;letter-spacing: 2px;font-size:15px;">
                                        <span> Mine: <span id="aff_earn_l0_input"></span></span><br>
                                        <span> Direct Affiliates: <span id="aff_earn_l1_input"></span></span><br>
                                        <span> 2nd Lvl Affiliates: <span id="aff_earn_l2_input"></span></span>
                                    </div>
                                    <div style="padding-top:10px;padding-left:5px;padding-right:5px;padding-bottom:10px;color:#fff;">
                                        <!--<span style="font-size:18px;" class="wallet_balance abba_amt_1"></span>-->
                                        <!--<span class="float-end">-->
                                        <!--<span style="background-color:#F94459;padding:2px 7px;border-radius:20px;font-weight:600;"> V</span>erve </span>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row mt-1">
                            <div class="col-12 d-flex align-items-right">
                                <span class="" style="font-size:15px;">Withdrawal Account Details</span>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <div class="card"
                                    style="border:none; border-radius: 12px;background-color:#000000;color:#fff;padding:10px;">
                                    <div style="padding-top:10px;padding-left:5px;padding-right:5px;color:#fff;">
                                        <span class="abba_account_name"><?php echo $BankAccName;?></span>
                                        <span class="float-end">
                                            <img src="../../assets/images/adminImg/white-favicon.png"
                                                style="width: 20%;" alt="">
                                            <span style="font-weight:bold;font-size:15px;">EduMESS </span>
                                        </span>
                                    </div>
                                    <div
                                        style="padding-top:10px;padding-left:5px;padding-right:5px;color:#fff;letter-spacing: 2px;font-size:15px;">
                                        <span class="abba_account_number"><?php echo $BankAccNo;?></span>
                                    </div>
                                    <div
                                        style="padding-top:10px;padding-left:5px;padding-right:5px;color:#fff;letter-spacing: 2px;font-size:15px;">
                                        <span class="abba_bank_name"><?php echo $Bank;?></span>
                                    </div>
                                </div>
                                <div style="padding-top:10px;">
                                <button type="button"
                                    style=" font-size: 15px;background: #27ae60; border-radius: 15px; color:#ffffff;"
                                    class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#pros_withdrawModal">
                                    <i class="fas fa-exchange-alt" style="font-size: 14px;"></i> Withdraw </button>
                                
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- End Main -->
    
    <!-- create parent --> 
    <div class="modal fade modalshow modalfade" id="trans_det_Modal" tabindex="-1"
        aria-labelledby="trans_det_ModalLabel" aria-hidden="true">
        <div class="modal-dialog dialogcontent modal-dialog-scrollable" style="border-top-left-radius: 20px; width: 100%;">
            <div class="modal-content modalcontent" style="background-color:#ffffff; ">
    
                <div class="modal-header">
                    <h5 class="modal-title text-primary">
                        Earning Details
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div style="position: fixed; margin-left: -10px; margin-top: -30px;">
                        
                    </div>
                    <!-- Navbar pills -->
                    <div class="row">
                        <div class="col-lg-6 p-3">
                            <small>Reference</small><br>
                            <span style="font-weight:600;" id="reference"></span>
                        </div>
                        <div class="col-lg-6 p-3 debit_hide">
                            <small>Earning Type</small><br>
                            <span style="font-weight:600;" id="earning_type"></span>
                        </div>
                        <div class="col-lg-6 p-3 debit_hide">
                            <small>Affiliate Name</small><br>
                            <span style="font-weight:600;" id="affiliate_name"></span>
                        </div>
                        <div class="col-lg-6 p-3 debit_hide">
                            <small>Affiliate Type</small><br>
                            <span style="font-weight:600;" id="affiliate_type"></span>
                        </div>
                        <div class="col-lg-6 p-3">
                            <small>Amount</small><br>
                            <span style="font-weight:600;" id="earn_amount"></span>
                        </div>
                        <div class="col-lg-6 p-3">
                            <small>Status</small><br>
                            <span style="font-weight:600;" id="trans_status"></span>
                        </div>
                        <div class="col-lg-6 p-3">
                            <small>Session</small><br>
                            <span style="font-weight:600;" id="trans_session"></span>
                        </div>
                        <div class="col-lg-6 p-3">
                            <small>Term</small><br>
                            <span style="font-weight:600;" id="trans_term"></span>
                        </div>
                        <div class="col-lg-6 p-3">
                            <small>Date</small><br>
                            <span style="font-weight:600;" id="trans_date"></span>
                        </div>
                    </div>
                    <!-- Navbar pills -->
                </div>
            </div>
        </div>
    </div>


    </div>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha3/css/bootstrap.min.css">

    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--Custom JS--->
    <script src="../../js/app_js/appScript.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


    <script src="../../js/app_js/printtables/waves.js"></script>
    <script src="../../js/app_js/printtables/jspdf.debug.js"></script>
    <script src="../../js/app_js/printtables/html2canvas.min.js"></script>
    <script src="../../js/app_js/printtables/html2pdf.min.js"></script>


    <!-- notification js -->
    <script src="../../assets/plugins/notify/wnoty.js"></script>

    <!-- header js -->
    <?php include('../../controller/js/app/header.php'); ?>

    <!-- affiliate js -->
    <?php include('../../controller/js/affiliate/transactions.php'); ?>


</body>

</html>