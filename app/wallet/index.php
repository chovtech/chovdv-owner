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
            margin-bottom: 10px; /* Adjust the value to set the desired space between rows */
        }
        /* salary status */

        .prossalystsuscont{
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
                <div class="main-cards float-end" style="margin-top: 20px; width:98%;">
                    <div class="row" style="padding: 10px; border-radius: 10px;background-color:#ffffff;">
                        <div class="col-sm-12 col-md-12 col-lg-8">
                            <div class="row mt-1">
                            <div class="col-sm-12 d-flex align-items-center">
                                <i class="fas fa-wallet fs-2 me-2"></i>
                                <span class="" style="font-size:20px;">My Wallet</span>
                            </div>
                            </div>
                            <div class="row mt-4 mb-2">
                            <div class="col-sm-4 mt-2">
                                <div class="card" style="border:none; border-radius: 7px;background-color:#E6F5FA;padding:10px;">
                                    <div>
                                        <small style="border-radius: 10px;background-color:#fff;padding:2px;padding-left:5px;padding-right:5px;color:#26813E;font-weight:500;width:45px;">
                                        <i class="fas fa-chart-line"></i>
                                        </small>
                                        <i class="fa fa-eye-slash toggle-visibility float-end" data-id="abba_amt_1" aria-hidden="true"></i>
                                    </div>
                                    <div style="padding-top:15px;padding-left:5px;padding-right:5px;color:#000000;font-weight:500;">
                                        <small> Wallet Balance</small>
                                    </div>
                                    <div class="d-flex" style="padding-left:5px;padding-right:5px;color:#000000;font-weight:600;">
                                        <h5 id="abba_amt_1" class="wallet_balance" data-amt=""></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-2">
                                <div class="card" style="border:none; border-radius: 7px;background-color:#FFE3E2;padding:10px;">
                                    <div>
                                        <small style="border-radius: 10px;background-color:#fff;padding:2px;padding-left:5px;padding-right:5px;color:#FE1E1E;font-weight:500;width:45px;">
                                        <i class="fas fa-chart-line"></i>
                                        </small>
                                        <i class="fa fa-eye-slash toggle-visibility float-end" data-id="abba_amt_2" aria-hidden="true"></i>
                                    </div>
                                    <div style="padding-top:15px;padding-left:5px;padding-right:5px;color:#000000;font-weight:500;">
                                        <small> Pending Withdrawal</small>
                                    </div>
                                    <div style="padding-left:5px;padding-right:5px;color:#000000;font-weight:600;">
                                        <h5 id="abba_amt_2" class="pending_withdrawal" data-amt=""></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-2">
                                <div class="card" style="border:none; border-radius: 7px;background-color:#E2FEE5;padding:10px;">
                                    <div>
                                        <small style="border-radius: 10px;background-color:#fff;padding:2px;padding-left:5px;padding-right:5px;color:#26813E;font-weight:500;width:45px;">
                                        <i class="fas fa-chart-line"></i>
                                        </small>
                                        <i class="fa fa-eye-slash toggle-visibility float-end" data-id="abba_amt_3" aria-hidden="true"></i>
                                    </div>
                                    <div style="padding-top:15px;padding-left:5px;padding-right:5px;color:#000000;font-weight:500;">
                                        <small> Amount Withdrawal</small>
                                    </div>
                                    <div style="padding-left:5px;padding-right:5px;color:#000000;font-weight:600;">
                                        <h5 id="abba_amt_3" class="amount_withdrawn" data-amt=""></h5>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="row mt-5 mb-2">
                            <div style="display: flex; padding-bottom:10px;">
                                <button type="button" style=" font-size: 10px; border-radius: 15px; background-color:#3498db; color:#ffffff;" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#fundwalletModal">
                                <i class="fa fa-plus"></i> Fund Wallet </button>
                                <button type="button" style=" font-size: 10px; margin-left: 10px; background: #27ae60; border-radius: 15px; color:#ffffff;" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#withdrawModal">
                                <i class="fas fa-exchange-alt" style="font-size: 9px;"></i> Transfer </button>
                                <div style="justify-content: flex-end;">
                                    <button type="button" style=" font-size: 10px; margin-left: 10px;  border-radius: 15px; color:#ffffff;" class="btn btn-sm btn-warning float-end prospaysalrymodalbtn" data-bs-toggle="modal" data-bs-target="#withdrawModalBulk">
                                    <i class="fas fa-check-double" style="font-size: 9px;"></i> Salary </button>
                                </div>
                            </div>
                            <div class="col-sm-12">
               
                                <div class="float-end table-responsive" style="border:1px solid #E5E5E5;border-radius:20px;padding:10px;width:100%;">

                                    <table class="table " >
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Reference</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Date</th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody class="display_transactions"></tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <div class="row mt-1">
                            <div class="col-12 d-flex align-items-right">
                                <span class="" style="font-size:15px;">Account Details</span>
                            </div>
                            </div>
                            <div class="row mt-2">
                            <div class="col-12">
                                <div class="card" style="border:none; border-radius: 12px;background-color:#000000;color:#fff;padding:10px;">
                                    <div style="padding-top:10px;padding-left:5px;padding-right:5px;color:#fff;">
                                        <span class="abba_account_name"></span>
                                        <span class="float-end">
                                        <img src="../../assets/images/adminImg/white-favicon.png" style="width: 20%;" alt="">
                                        <span style="font-weight:bold;font-size:15px;">EduMESS </span>
                                        </span>
                                    </div>
                                    <div style="padding-top:10px;padding-left:5px;padding-right:5px;color:#fff;letter-spacing: 2px;font-size:15px;">
                                        <span class="abba_account_number"></span>
                                    </div>
                                    <div style="padding-top:10px;padding-left:5px;padding-right:5px;color:#fff;letter-spacing: 2px;font-size:15px;">
                                        <span class="abba_bank_name"></span>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="row mt-5">
                            <div class="col-12 d-flex align-items-right">
                                <span class="" style="font-size:15px;">My Cards</span>
                            </div>
                            </div>
                            <div class="row mt-2">
                            <div class="col-sm-12">
                                <div class="card" style="border:none; border-radius: 12px;color:#fff;padding:10px;background-image: url('../../assets/images/bgs/3.png');">
                                    <div style="padding-top:10px;padding-left:5px;padding-right:5px;color:#fff;">
                                        <small> <?php echo $PrimaryName . ' ' . $SecondaryName; ?> </small>
                                        <span class="float-end">
                                        <img src="../../assets/images/adminImg/white-favicon.png" style="width: 20%;" alt="">
                                        <span style="font-weight:bold;font-size:15px;"> EduMESS </span>
                                        </span>
                                    </div>
                                    <div style="padding-top:60px;padding-left:5px;padding-right:5px;color:#fff;letter-spacing: 2px;font-size:15px;">
                                        <span> 4143 **** **** **62</span>
                                    </div>
                                    <div style="padding-top:10px;padding-left:5px;padding-right:5px;padding-bottom:10px;color:#fff;">
                                        <span style="font-size:18px;" class="wallet_balance abba_amt_1"></span>
                                        <span class="float-end">
                                        <span style="background-color:#F94459;padding:2px 7px;border-radius:20px;font-weight:600;"> V</span>erve </span>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <br>
                            <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                            <ul class="nav nav-pills mb-3 renceTab " id="pills-tab" role="tablist">
                                <li class="nav-item border" role="presentation">
                                    <a href="Javascript:;" class="nav-link active abba_tab_checker_for_summary" data-sumdiv="student_summary_div" id="pills-edumesssave-tab" data-bs-toggle="pill" data-bs-target="#pills-edumesssave" type="button" role="tab" aria-controls="pills-edumesssave" aria-selected="true">
                                    <i class="fas fa-save"></i> Save </a>
                                </li>
                                &nbsp;&nbsp; 
                                <li class="nav-item border" role="presentation">
                                    <a href="Javascript:;" class="nav-link abba_tab_checker_for_summary" data-sumdiv="parent_summary_div" id="pills-edumesslock-tab" data-bs-toggle="pill" data-bs-target="#pills-edumesslock" type="button" role="tab" aria-controls="pills-edumesslock" aria-selected="false">
                                    <i class="fas fa-lock"></i> Lock </a>
                                </li>
                            </ul>
                            <div class="tab-content prosloadtabhidecontent" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-edumesssave" role="tabpanel" aria-labelledby="pills-edumesssave-tab">
                                    <div class="row mt-5">
                                        <div class="col-12">
                                            <span class="" style="font-size:15px;">Saving Plan</span>
                                            <span class="float-end" style="font-size:14px;color:#007ffb;cursor:pointer;" data-bs-toggle="modal" data-bs-target="#prosloadsavingforsalryere">
                                            <i class="fas fa-plus"> Add Plan</i>
                                            </span>
                                        </div>
                                        <!--  -->
                                        <div class="prosloadsavenspincont"></div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show " id="pills-edumesslock" role="tabpanel" aria-labelledby="pills-edumesslock-tab">
                                    <div class="row mt-5">
                                        <div class="col-12">
                                        <span class="" style="font-size:15px;">Saving Plan</span>
                                        <span class="float-end" style="font-size:14px;color:#007ffb;cursor:pointer;" data-bs-toggle="modal" data-bs-target="#prosloadlockforsalryere">
                                        <i class="fas fa-plus"> Add Plan</i>
                                        </span>
                                        </div>
                                        <!--  -->
                                        <div class="prosloadsavenspincontlock"></div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </main>
                <!-- End Main -->

                            <!--==== fund wallet Modal==== -->
                    <div class="modal fade" id="fundwalletModal" tabindex="-1" aria-labelledby="fundwalletModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="border-radius: 20px;">
                            <div class="modal-body">
                                <div align="center">
                                <h4 class="mt-3"><i class="fas fa-wallet"></i> Fund Wallet</h4>
                                </div>
                                <div class="row" style="padding-top: 50px; margin: 0 5px 0 5px;">
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="number"
                                            style="height: 50px; border: none; border-bottom: #b3b3b3 solid 1px;"
                                            class="form-control form-control-sm funding_amt" id="floatingInput"
                                            placeholder="name">
                                        <label for="floatingInput"
                                            style="color: #afafaf; margin-top: 2px; font-weight: 500;">Amount</label>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-12" style="padding: 30px;">
                                    <button class="btn btn-primary abba_fund_wallet_btn" style="width: 100%;" type="button"
                                        onclick="payWithMonnify()"><i class="fas fa-arrow-right"></i> Proceed</button>
                                    <div align="center" style="color: #afafaf; font-size: 11px; font-weight: 500;">Powered
                                        by EduMESS
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    <!--===fund wallet Modal=======-->
                    <!--==== Transfer Modal==== -->
                    <div class="modal fade" id="withdrawModal" tabindex="-1" aria-labelledby="withdrawModalLabel"
                    aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content" style="border-radius: 20px;">
                                <div class="modal-body">
                                    <div align="center">
                                    <h4 class="mt-3"><i class="fas fa-exchange-alt"></i> Transfer</h4>
                                    </div>
                                    <div class="row" style="padding-top: 50px; margin: 0 5px 0 5px;">
                                    <div class="col-12 mb-2">
                                        <div class="form-floating">
                                            <select class="form-select bank_code"
                                                style="font-size: 13px; height: 53px;border: none; border-bottom: #b3b3b3 solid 1px;"
                                                id="floatingSelect" aria-label="Floating label select example">
                                                <option selected></option>
                                                <?php
                                                $abba_sql_banks = ("SELECT * FROM `banks` ORDER BY name ASC");
                                                $abba_result_banks = mysqli_query($link, $abba_sql_banks);
                                                $abba_row_banks = mysqli_fetch_assoc($abba_result_banks);
                                                $abba_row_cnt_banks = mysqli_num_rows($abba_result_banks);
                                                
                                                if ($abba_row_cnt_banks > 0) {
                                                    do {
                                                
                                                        echo '<option value="' . $abba_row_banks['code'] . '">' . $abba_row_banks['name'] . '</option>';
                                                
                                                    } while ($abba_row_banks = mysqli_fetch_assoc($abba_result_banks));
                                                } else {
                                                    echo '<option value="0">No Records Found</option>';
                                                }
                                                ?>
                                            </select>
                                            <label for="floatingSelect">Select Bank</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text"
                                                style="height: 50px; border: none; border-bottom: #b3b3b3 solid 1px;"
                                                class="form-control form-control-sm account_name" id="floatingInput"
                                                placeholder="name">
                                            <label for="floatingInput"
                                                style="color: #afafaf; margin-top: 2px; font-weight: 500;">Account
                                            Number</label>
                                        </div>
                                    </div>
                                    <div class="col-12 account_user_name">
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="number"
                                                style="height: 50px; border: none; border-bottom: #b3b3b3 solid 1px;"
                                                class="form-control form-control-sm transfer_amt" id="floatingInput"
                                                placeholder="name">
                                            <label for="floatingInput"
                                                style="color: #afafaf; margin-top: 2px; font-weight: 500;">Amount</label>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-12" style="padding: 30px;">
                                        <button class="btn btn-primary abba_transfer" style="width: 100%;" type="button">
                                        <i class="fas fa-exchange-alt"></i> Transfer
                                        </button>
                                        <div align="center" style="color: #afafaf; font-size: 11px; font-weight: 500;">Powered
                                            by EduMESS
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--===Transfer Modal=======-->
                    
                    
                    <!--==== Get nin and bvn modal==== -->
                    <div class="modal fade" id="bin_nin_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="bin_nin_modalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content" style="border-radius: 20px;">
                                <div class="modal-body">
                                    <div align="center">
                                    <h4 class="mt-3"><i class="fas fa-check-circle"></i> Account Verification</h4>
                                    </div>
                                    <div class="row" style="padding-top: 20px; margin: 0 5px 0 5px;">
                                        <div class="col-3">
                                            <svg id="svg2" width="70" height="auto" version="1.1" viewBox="0 0 268.81653 357.33347" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"><metadata id="metadata8"><rdf:RDF><cc:Work rdf:about=""><dc:format>image/svg+xml</dc:format><dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage"/></cc:Work></rdf:RDF></metadata><g id="g10" transform="matrix(1.3333333,0,0,-1.3333333,-31.591911,379.99999)"><g id="g12" transform="scale(.1)"><path id="path14" d="m969.188 1786.53c41.182-30.89 195.642-48.05 252.752-46.33 13.9 0.42 22.78 6.06 28.35 14.29 5.59-8.23 14.46-13.87 28.35-14.29 57.12-1.72 211.57 15.44 252.77 46.33 41.19 30.89 6.86 90.96 13.73 121.85 6.86 30.9 90.95 133.87 166.47 137.3 75.51 3.43 211.09-51.49 248.85-176.77 37.75-125.29 27.45-254-68.65-307.2-96.11-53.2-187.06-24.02-204.23 0-17.16 24.02-89.24 22.31-116.7-13.73s-123.57-99.54-123.57-137.3c0-1.92 0.02-3.86 0.04-5.81-19.87 9.42-43.83 13.33-55.59-13.21-22.08-49.87-63.52-193.04-52.47-241.22 11.03-48.18 81.77-33.46 97.29-58.49 103.82-167.462-1.79-303.239-108.86-342.052-1.3 25.942-11.72 236.274-10.16 274.072 1.69 40.54 10.4 360.43 10.5 363.66 0.16 5.98 2.29 11.54 6.15 16.04 77.33 90.45 127.97 149.26 131.42 152.9 3.75 2.52 20.43 6.79 31.47 9.6 10.54 2.7 21.44 5.49 29.39 8.38 11.02 4.01 46.36 30.11 126.66 90.99 36.77 27.88 74.78 56.71 85.09 62.88 26.56 15.95 140.03 77.3 149.9 81.06l-4.22 13.05-3.27 13.34c-10.89-2.67-140.46-74.26-156.54-83.91-11.58-6.94-46.78-33.63-87.54-64.54-43.48-32.97-109.21-82.79-119.46-87.07-6.68-2.43-16.91-5.04-26.81-7.56-23.35-5.98-36.88-9.67-43.42-16.23-5.41-5.4-75.6-87.29-133.53-155.03-7.88-9.21-12.4-20.96-12.75-33.14-0.08-3.23-8.79-322.94-10.47-363.27-1.73-41.35 9.81-269.6 10.29-279.3l17.68 0.899c-22.45-6.91-44.67-9.559-64.77-7.149-19 2.282-37.56 5.809-55.5 10.34h1.32c0.31 98.969 2.21 362.06 7.22 390.68 5.43 31.06 2.18 178.13 0.53 239.93-0.29 10.66-3.71 20.9-9.92 29.63-73.55 103.06-120 158.43-138.05 164.57-5.96 2.02-12.05 3.85-18.43 5.79-20.49 6.19-43.691 13.2-76.828 31.05-17.703 9.53-74.922 48.42-135.496 89.57-119.113 80.96-192.766 130.42-211.074 134.76l-6.387-26.71c16.062-4.38 127.976-80.42 202.027-130.75 63.84-43.38 118.957-80.84 137.934-91.06 35.554-19.15 61.224-26.91 81.874-33.14 6.08-1.84 11.86-3.6 17.32-5.43 10.29-4.67 53.71-55.04 124.75-154.58 3.02-4.25 4.7-9.24 4.82-14.43 2.63-98.03 3.98-211.09-0.12-234.46-6.01-34.28-7.41-335.33-7.6-387.9-81.62 26.941-143.85 79.629-151.39 159.699-9.9 105.251 47.46 174.621 73.83 180.661 26.37 6.05 50.98 70.46 30.65 108.46-20.31 38-38.86 147.17-70.55 161.52-1.68 0.77-3.38 1.53-5.09 2.27 3.61 12.55 4.11 26.82 4.11 40.64 0 37.76-96.112 101.26-123.561 137.3-27.461 36.04-99.543 37.75-116.711 13.73-17.156-24.02-108.113-53.2-204.219 0-96.113 53.2-106.406 181.91-68.652 307.2 37.754 125.28 173.34 180.2 248.847 176.77 75.52-3.43 159.61-106.4 166.477-137.3 6.863-30.89-27.465-90.96 13.727-121.85" fill="#ffffff"/><g fill="#00a650"><path id="path16" d="m1947.59 1296.38c93.11 27.81 71.47 131.48 61.64 165.31l-86.68-87.97c11.4-1.65 19.38-4.24 21.43-7.66 3.54-5.88 4.64-33.6 3.61-69.68"/><path id="path18" d="m2033.22 1180.71c39.63 69.35 50.64 164.34 51.42 336.45l-24-12.06c5.57-67.85-0.8-121.14-20.55-184.77-12.79-41.17-60.82-66.49-95.43-79.78-4.35-58.97-12.85-121.99-24.7-149.08-24.03-54.92 72.08 17.16 113.26 89.24"/><path id="path20" d="m2204.84 1647.52c-3.42 48.06-28.69 113.97-45.23 60.42-9.81-31.73-24.6-90.88-34.36-170.36-6.71-54.68-11.05-118.89-9.64-190.77 3.42-176.39-29.3-209.99-134.79-297.87-105.49-87.901-132.94-111.928-132.94-111.928s65.3 258.748 58.39 321.588c-3.63 33.06-12.88 59.48-27.07 71.13-12.77 10.48-29.54 9.01-49.98-10.89-43.13-42.01-76.5-309.75-114.73-385.258-38.23-75.512-76.33-156.051-76.33-156.051s-75.85-167.461 0-211.652c75.85-44.18 91.17-47.617 249.98 137.73 158.81 185.352 306.41 302.051 316.7 463.371 10.31 161.33 3.44 432.48 0 480.54"/></g><path id="path22" d="m542.41 1296.38c-1.031 36.08 0.07 63.8 3.606 69.68 2.05 3.42 10.039 6.01 21.433 7.66l-86.679 87.97c-9.832-33.83-31.473-137.5 61.64-165.31" fill="#ffffff"/><path id="path24" d="m570.039 1091.47c-11.848 27.09-20.351 90.11-24.695 149.08-34.614 13.29-82.649 38.61-95.434 79.78-19.754 63.63-26.121 116.92-20.555 184.77l-23.996 47.46c0.786-172.12 11.789-302.5 51.418-371.85 41.184-72.08 137.293-144.16 113.262-89.24" fill="#ffffff"/><g fill="#00a650"><path id="path26" d="m851.836 565.879c75.852 44.191 0 211.652 0 211.652s-38.098 80.539-76.328 156.051c-38.235 75.508-71.602 343.248-114.727 385.258-20.437 19.9-37.207 21.37-49.98 10.89-14.192-11.65-23.438-38.07-27.071-71.13-6.914-62.84 58.387-321.588 58.387-321.588s-27.449 24.027-132.937 111.928c-105.489 87.88-138.211 121.48-134.785 297.87 1.406 71.88-2.942 136.09-9.649 190.77-9.758 79.48-24.551 138.63-34.355 170.36-16.543 53.55-41.805-12.36-45.235-60.42-3.437-48.06-10.301-319.21 0-480.54 10.293-161.32 157.891-278.019 316.699-463.371 158.821-185.347 174.129-181.91 249.981-137.73"/><path id="path28" d="m738.074 2266.5s11.438 2.28 25.168 17.15c13.731 14.87 115.559 191.08 133.867 228.83 18.301 37.75 40.039 30.89 40.039 30.89l4.582-16.01c4.571-53.77-54.921-135.02-84.667-163.62-29.75-28.6 0-50.34 0-50.34s14.871 8.02 53.765 58.36c38.906 50.34 52.641 140.72 52.641 140.72l14.871 18.31h22.93c1.03-2.57 2.48-5.89 4.53-10.3 14.87-32.03-22.89-108.69-43.476-143.02-20.594-34.32 0-35.47 0-35.47 75.656 53.79 72.076 196.8 65.216 210.53-6.87 13.73-36.61 5.72-50.345 11.43-13.726 5.73 0 33.19 0 33.19s57.205 14.87 54.915 6.87c-2.29-8.01 9.16-25.18 30.71-35.47 21.56-10.3 58.54-1.15 58.54-1.15l3.43-20.59 11.44-8.01c2.29-143.02 46.9-154.46 91.52-196.8 44.63-42.32 99.54-51.48 99.54-51.48-16.01-41.18 2.3-110.98 2.3-110.98s28.6-12.59 51.48 8.01c22.89 20.59 12.59 102.97 12.59 107.55s-18.31-29.75-18.31-29.75l-12.62 29.75c-12.61 29.74-25.13 78.94-25.13 78.94s-13.73 35.47 13.73 8.01c27.45-27.46 29.74-28.6 37.75-11.44s-6.86 70.93-6.86 70.93-1.15 6.87 8 3.44c9.16-3.44 29.75-20.85 29.75-20.85s4.58 26.57 12.59 22c8.01-4.59 9.15-13.74 18.3-38.9 9.16-25.18 25.18-12.59 25.18-12.59s-3.44 17.16 1.14 45.76 24.02 6.87 24.02 6.87c5.72-59.5 56.07-112.13 56.07-112.13 22.88 37.76-34.33 152.17-34.33 152.17s-13.73 5.72-44.62 5.72-96.1-11.44-96.1-11.44-18.31 2.29-48.06 38.9-16.02 53.78-16.02 53.78 12.59 1.14 25.17-2.3c12.59-3.42 30.9-40.04 56.07-56.05 25.17-16.03 58.34 8.01 81.24 33.17 22.88 25.18 22.88 83.53 22.88 83.53-1.38 22.33-2.77 44.67-4.14 67.01-0.9 14.58 10.38 27.21 24.99 27.5 14.61 0.28 31.1-0.59 48.93-3.56 55.32-9.21 95.16-33.89 116.71-49.77-8.98 14.23-82.96 86.86-161.33 117.85-28.75 11.37-51.65-6.97-65.7-24.17-10.14-12.4-14.02-28.82-10.88-44.53 12.7-63.43 7.76-112.9-4.65-131.52-13.73-20.6-66.36-13.73-66.36-13.73-34.32 25.17-48.05 137.29-48.05 180.77 0 43.47-25.97 77.71-84.67 75.51-58.69-2.2-77.79-45.77-77.79-45.77s22.88-9.15 50.33-45.76c27.46-36.61 11.44-151.02 11.44-151.02l-13.73 4.58s-9.15-18.31-48.04-18.31c-38.91 0-89.25 41.19-89.25 102.96 0 61.79-15.11 107.07-18.3 107.55-66.369 10.31-120.139-59.49-161.33-72.08-41.192-12.58-45.762-35.47-45.762-35.47 52.629-12.57 90.383 22.89 131.57 50.35 41.192 27.46 45.762 10.3 45.762 10.3 6.87-48.06-11.43-76.66-11.43-76.66-33.187 5.72-24.027 28.6-24.027 28.6s-28.605-4.57-65.227-36.61c-36.609-32.03-90.378-34.33-90.378-34.33 1.14-35.46 40.046-25.16 40.046-25.16l-11.441-22.88c-22.883 4.57-30.891-12.59-30.891-12.59 9.153-22.88 42.332-14.87 42.332-14.87l-3.433-13.74c-37.754-22.87-117.844-183.05-140.727-221.96-22.886-38.89 0-44.61 0-44.61"/><path id="path30" d="m1088.17 2414.66c9.73-25.74 22.88-20.02 22.88-20.02s11.45 53.77 0 88.09c-11.43 34.33-14.87 38.9-14.87 38.9s-24.02 10.3-34.32-11.43c-10.3-21.74-36.62-105.27-34.32-123.57l2.28-18.31s36.99 10.45 41.95 77.88 16.4 23.94 16.4 23.94-7.77-34.89 0-55.48"/><path id="path32" d="m1572.14 2545.66c18.31 11.44 30.32-8 30.32-8 6.29 12.57-9.73 30.89-9.73 30.89s12.59 13.72 33.19-4.59c20.59-18.3 36.73-17.15 36.73-17.15-11.32 10.29-21.86 59.49-21.86 59.49 12.2 3.43 24.41 6.86 36.61 10.3-26.85 47.88-54.82 64.14-76.05 69.85-27.01 7.25-73.83 5.66-73.83 5.66-0.94-9.57-1.76-23.66-0.58-40.62 1.48-21.01 5.15-33.95 7.44-46.33 3.25-17.47 5.41-42.68 0-75.52 0 0 19.46 4.58 37.76 16.02"/><path id="path34" d="m1653.37 2303.11s20.59 8-8.01 57.2-41.33 77.8-47.55 114.42c-6.22 36.61-38.25 22.88-38.25 22.88s10.29-140.72 93.81-194.5"/><path id="path36" d="m1645.36 2495.32s-6.86-110.98 62.93-167.04c69.8-56.06 75.52-61.78 75.52-61.78s-2.3 28.6-43.48 96.1c-41.19 67.51-64.07 117.85-94.97 132.72"/><path id="path38" d="m1258.65 2185.27c13.73 2.28 13.73 85.8 13.73 85.8s-26.32-3.43-43.47 17.16c-17.17 20.6-38.91 21.74-43.48 6.87-4.58-14.87-50.34-98.4 14.87-136.15 0 0 22.88 16.01 43.48 0 0 0 1.14 24.02 14.87 26.32"/><path id="path40" d="m1449.72 2226.45c-9.15-21.74 9.16-44.62 9.16-44.62h21.74s0 17.17 20.58 13.73c20.6-3.43 38.91 4.58 38.91 4.58s-5.73 2.28-21.89 20.59c-16.16 18.3-40.32 25.43-37.6 21.74 12.57-17.17 3.42-30.32 3.42-30.32l-34.32 14.3"/><path id="path42" d="m1373.07 2025.08c1.09 0.37 0.41 1.22-1.44 2.19 0.17-1.82 0.49-2.5 1.44-2.19"/><path id="path44" d="m1337.6 2128.06s-8.01 5.72-9.16-33.18-13.72-56.07-13.72-56.07 12.57-6.87 30.89-6.87c12.45 0 22.1-2.62 26.02-4.67-0.42 4.74 0.37 18.01-5.43 47.01-8.01 40.05-28.6 53.78-28.6 53.78"/><path id="path46" d="m1258.65 2061.7s24.03-2.3 33.18 14.97c9.16 17.28 0 51.68 0 51.68s-10.3-7.16-33.18-14.02c-22.88-6.87-10.3-52.74-10.3-52.74l10.3 0.11"/><path id="path48" d="m1188.86 2076.67c-11.45-27.56-23.29-36.71-23.29-36.71s23.29-14.88 43.88 0c20.6 14.88 9.52 28.73 9.52 28.73v35.33c-2.65 0-18.67 0.22-30.11-27.35"/><path id="path50" d="m543.563 411.871c-0.04-0.039 95.363 63.258 174.843 90.418-25.906 33.57-76.511 56.492-134.793 56.492-84.531 0-153.308-48.09-153.308-107.211 0-27.461 43.758-75.761 113.258-39.699"/><path id="path52" d="m1950.34 375.809c-120.73 71.601-313.3 156.851-596.38 171.3l-0.42-2.339c-30.66 2.199-61.77 3.8-93.63 4.351-3.35-0.019-6.58 0.059-9.95 0.02-3.37 0.039-6.6-0.039-9.95-0.02-31.86-0.551-62.97-2.152-93.63-4.351l-0.41 2.339c-283.087-14.449-475.657-99.699-596.392-171.3-50.633-30.02-75.594-8.5-75.515-8.571l111.738-136.117c27.566-27.449 70.762-31.062 102.617-8.723 129.988 91.161 326.612 149.422 546.412 149.422 5.09 0 10.06-0.289 15.13-0.359 5.06 0.07 10.04 0.359 15.13 0.359 219.8 0 416.42-58.261 546.41-149.422 31.86-22.339 75.05-18.726 102.62 8.723l111.74 136.117c0.08 0.071-24.88-21.449-75.52 8.571"/><path id="path54" d="m1916.3 558.781c-58.27 0-108.88-22.922-134.79-56.492 79.49-27.16 174.89-90.457 174.84-90.418 69.51-36.062 113.27 12.238 113.27 39.699 0 59.121-68.78 107.211-153.32 107.211"/></g><path id="path56" d="m1270.4 2796.8c0-5.37-8.01-9.73-17.89-9.73s-17.89 4.36-17.89 9.73 8.01 9.72 17.89 9.72 17.89-4.35 17.89-9.72" fill="#000000"/><path id="path58" d="m1443.25 1684.41-1.23-0.19zm19.85-121.95h-0.05zm-151.02-833.331-123.57 16.691 5.24 640.84c-46.08 75.51-129.17 192.05-217.695 209.38-78.946 15.44-312.332 201.72-341.375 223.17l65.957 89.33c105.996-78.27 166.961-152.9 344.823-222.38 55.21-21.56 144.12-105.75 201.12-159 84.72 68.88 109.45 111.95 161.11 122.08 37.5 12.36 262.94 144.63 413.21 248.85l62.19-79.96c-158.67-63.6-357.51-221.15-416.88-255.06-22.9-10.09-90.63-97.51-151.71-167.9l-2.42-666.041" fill="#00adef"/><g fill="#231f20"><path id="path60" d="m1926.82 1346.81s37.47-2 58.21 61.83c20.73 63.83-77.66-30.93-77.66-30.93l19.45-30.9"/><path id="path62" d="m2204.84 1166.98c-10.29-161.32-157.89-278.019-316.7-463.371-158.81-185.347-174.13-181.91-249.98-137.73-75.85 44.191 0 211.652 0 211.652s38.1 80.539 76.33 156.051c38.23 75.508 71.6 343.248 114.73 385.258 20.44 19.9 37.21 21.37 49.98 10.89 14.19-11.65 23.44-38.07 27.07-71.13 6.91-62.84-58.39-321.588-58.39-321.588s27.45 24.027 132.94 111.928c105.49 87.88 138.21 121.48 134.79 297.87-1.41 71.88 2.93 136.09 9.64 190.77 9.76 79.48 24.55 138.63 34.36 170.36 16.54 53.55 41.81-12.36 45.23-60.42 3.44-48.06 10.31-319.21 0-480.54zm-135.22-715.41c0-27.461-43.76-75.761-113.27-39.699 0.05-0.039-95.35 63.258-174.84 90.418 25.91 33.57 76.52 56.492 134.79 56.492 84.54 0 153.32-48.09 153.32-107.211zm-155.5-220.449c-27.57-27.449-70.76-31.062-102.62-8.723-129.99 91.161-326.61 149.422-546.41 149.422-5.09 0-10.07-0.289-15.13-0.359-5.07 0.07-10.04 0.359-15.13 0.359-219.8 0-416.424-58.261-546.412-149.422-31.855-22.339-75.051-18.726-102.617 8.723l-111.738 136.117c-0.079 0.071 24.882-21.449 75.515 8.571 120.735 71.601 313.305 156.851 596.392 171.3l0.41-2.339c30.66 2.199 61.77 3.8 93.63 4.351 3.35-0.019 6.58 0.059 9.95 0.02 3.37 0.039 6.6-0.039 9.95-0.02 31.86-0.551 62.97-2.152 93.63-4.351l0.42 2.339c283.08-14.449 475.65-99.699 596.38-171.3 50.64-30.02 75.6-8.5 75.52-8.571zm-1483.815 220.449c0 59.121 68.777 107.211 153.308 107.211 58.282 0 108.887-22.922 134.793-56.492-79.48-27.16-174.883-90.457-174.843-90.418-69.5-36.062-113.258 12.238-113.258 39.699zm-145.149 715.41c-10.301 161.33-3.437 432.48 0 480.54 3.43 48.06 28.692 113.97 45.235 60.42 9.804-31.73 24.597-90.88 34.355-170.36 6.707-54.68 11.055-118.89 9.649-190.77-3.426-176.39 29.296-209.99 134.785-297.87 105.488-87.901 132.937-111.928 132.937-111.928s-65.301 258.748-58.387 321.588c3.633 33.06 12.879 59.48 27.071 71.13 12.773 10.48 29.543 9.01 49.98-10.89 43.125-42.01 76.492-309.75 114.727-385.258 38.23-75.512 76.328-156.051 76.328-156.051s75.852-167.461 0-211.652c-75.852-44.18-91.16-47.617-249.981 137.73-158.808 185.352-306.406 302.051-316.699 463.371zm257.254 129.4c-80.847 24.15-75.176 105.45-65.84 148.6 6.145-6.43 12.434-12.73 18.95-18.85 24.187-22.7 48.589-39.5 72.578-52.33l-0.649-0.08c-11.394-1.65-19.383-4.24-21.433-7.66-3.536-5.88-4.637-33.6-3.606-69.68zm-92.5 23.95c12.785-41.17 60.82-66.49 95.434-79.78 4.344-58.97 12.847-121.99 24.695-149.08 24.031-54.92-72.078 17.16-113.262 89.24-39.629 69.35-50.632 164.34-51.418 336.45-0.027 6.8-0.066 13.48-0.066 20.53l-0.039 2.63c7.383-12.81 15.43-25.27 23.965-37.44-5.235-66.78 1.152-119.64 20.691-182.55zm-28.191 663.57c61.789 80.65 145.554 193.92 306.179 209.37 160.625 15.44 244.719-50.54 316.802-131.68 72.08-81.13 185.35-184.1 190.5-216.71 1.87-11.89 5.87-26.74 7.67-40.65-0.88-7.69-1.25-16.17-0.5-24.44-3.12-12.25-12.24-20.39-33.42-19-52.7 3.43-183.13 29.17-205.44 41.18-22.311 12.02-32.612 58.36-30.893 89.25s-18.879 98.91-90.957 142.13c-72.082 43.22-129.133 56.31-180.207 28.24-7.848-4.32-152.73-57.1-185.34-199.55-32.605-142.44-29.375-253.68 92.676-331.22 122.039-77.55 262.566 20.6 262.566 20.6l34.329-18.88s116.696-94.4 113.276-120.14c-1.76-13.18-0.86-24.1-6.22-32.32-11.94 0.33-23.385-3.53-33.463-14.88-2.136-0.31-4.277-0.61-6.66-0.85-42.004-4.35-174.347-23.26-259.531-15.67-13.477 16.34-55.195 24.6-93.75 26.58-43.074 19.07-93.359 48.76-137.141 91.15 1.223 3.85 2.043 6.06 2.043 6.06s-40.879 97.71-52.187 53.72c-10.586 15.8-20.031 32.81-28.059 51.07-4.179 65.11-18.445 117.28-36.922 153.02-8.039 101.06 12.871 199.08 54.649 253.62zm286.719 222.93c29.992 9.21 44.46 19.51 48.464 22.48 14.321 10.64 26.516 24.17 35.735 39.84l4.929 8.37c176.196 13.31 203.654 53.35 203.654 53.35s20.6-2.6 52.63 18.65c32.04 21.25 91.53 34.24 91.53 34.24 6.87-77.24 61.79-41.76 22.88-73.25-38.89-31.51-29.74-162.85-29.74-162.85l16.01 4.57 2.3-41.21 20.58-1.66c0-34.22-71.63-62.91-86.4-68.48-50.01 49.87-102.416 98.92-140.705 126.65-99.535 72.08-241.867 39.3-241.867 39.3s209.257 13.9-8.047-2.34h-8e-3c2.859 0.78 5.562 1.56 8.055 2.34zm363.332 239.37c-4.96-67.43-41.95-77.88-41.95-77.88l-2.28 18.31c-2.3 18.3 24.02 101.83 34.32 123.57 10.3 21.73 34.32 11.43 34.32 11.43s3.44-4.57 14.87-38.9c11.45-34.32 0-88.09 0-88.09s-13.15-5.72-22.88 20.02c-7.77 20.59 0 55.48 0 55.48s-11.44 43.49-16.4-23.94zm-333.696-135.09c22.883 38.91 102.973 199.09 140.727 221.96l3.433 13.74s-33.179-8.01-42.332 14.87c0 0 8.008 17.16 30.891 12.59l11.441 22.88s-38.906-10.3-40.046 25.16c0 0 53.769 2.3 90.378 34.33 36.622 32.04 65.227 36.61 65.227 36.61s-9.16-22.88 24.027-28.6c0 0 18.3 28.6 11.43 76.66 0 0-4.57 17.16-45.762-10.3-41.187-27.46-78.941-62.92-131.57-50.35 0 0 4.57 22.89 45.762 35.47 41.191 12.59 94.961 82.39 161.33 72.08 3.19-0.48 18.3-45.76 18.3-107.55 0-61.77 50.34-102.96 89.25-102.96 38.89 0 48.04 18.31 48.04 18.31l13.73-4.58s16.02 114.41-11.44 151.02c-27.45 36.61-50.33 45.76-50.33 45.76s19.1 43.57 77.79 45.77c58.7 2.2 84.67-32.04 84.67-75.51 0-43.48 13.73-155.6 48.05-180.77 0 0 52.63-6.87 66.36 13.73 12.41 18.62 17.35 68.09 4.65 131.52-3.14 15.71 0.74 32.13 10.88 44.53 14.05 17.2 36.95 35.54 65.7 24.17 78.37-30.99 152.35-103.62 161.33-117.85-21.55 15.88-61.39 40.56-116.71 49.77-17.83 2.97-34.32 3.84-48.93 3.56-14.61-0.29-25.89-12.92-24.99-27.5 1.37-22.34 2.76-44.68 4.14-67.01 0 0 0-58.35-22.88-83.53-22.9-25.16-56.07-49.2-81.24-33.17-25.17 16.01-43.48 52.63-56.07 56.05-12.58 3.44-25.17 2.3-25.17 2.3s-13.73-17.17 16.02-53.78 48.06-38.9 48.06-38.9 65.21 11.44 96.1 11.44 44.62-5.72 44.62-5.72 57.21-114.41 34.33-152.17c0 0-50.35 52.63-56.07 112.13 0 0-19.44 21.73-24.02-6.87s-1.14-45.76-1.14-45.76-16.02-12.59-25.18 12.59c-9.15 25.16-10.29 34.31-18.3 38.9-8.01 4.57-12.59-22-12.59-22s-20.59 17.41-29.75 20.85c-9.15 3.43-8-3.44-8-3.44s14.87-53.77 6.86-70.93-10.3-16.02-37.75 11.44c-27.46 27.46-13.73-8.01-13.73-8.01s12.52-49.2 25.13-78.94l12.62-29.75s18.31 34.33 18.31 29.75 10.3-86.96-12.59-107.55c-22.88-20.6-51.48-8.01-51.48-8.01s-18.31 69.8-2.3 110.98c0 0-54.91 9.16-99.54 51.48-44.62 42.34-89.23 53.78-91.52 196.8l-11.44 8.01-3.43 20.59s-36.98-9.15-58.54 1.15c-21.55 10.29-33 27.46-30.71 35.47 2.29 8-54.915-6.87-54.915-6.87s-13.726-27.46 0-33.19c13.735-5.71 43.475 2.3 50.345-11.43 6.86-13.73 10.44-156.74-65.216-210.53 0 0-20.594 1.15 0 35.47 20.586 34.33 58.346 110.99 43.476 143.02-2.05 4.41-3.5 7.73-4.53 10.3h-22.93l-14.871-18.31s-13.735-90.38-52.641-140.72c-38.894-50.34-53.765-58.36-53.765-58.36s-29.75 21.74 0 50.34c29.746 28.6 89.238 109.85 84.667 163.62l-4.582 16.01s-21.738 6.86-40.039-30.89c-18.308-37.75-120.136-213.96-133.867-228.83-13.73-14.87-25.168-17.15-25.168-17.15s-22.886 5.72 0 44.61zm1002.256 51.49c41.18-67.5 43.48-96.1 43.48-96.1s-5.72 5.72-75.52 61.78c-69.79 56.06-62.93 167.04-62.93 167.04 30.9-14.87 53.78-65.21 94.97-132.72zm-142.52 112.13c6.22-36.62 18.95-65.22 47.55-114.42s8.01-57.2 8.01-57.2c-83.52 53.78-93.81 194.5-93.81 194.5s32.03 13.73 38.25-22.88zm-63.43 130.43c-2.29 12.38-5.96 25.32-7.44 46.33-1.18 16.96-0.36 31.05 0.58 40.62 0 0 46.82 1.59 73.83-5.66 21.23-5.71 49.2-21.97 76.05-69.85-12.2-3.44-24.41-6.87-36.61-10.3 0 0 10.54-49.2 21.86-59.49 0 0-16.14-1.15-36.73 17.15-20.6 18.31-33.19 4.59-33.19 4.59s16.02-18.32 9.73-30.89c0 0-12.01 19.44-30.32 8-18.3-11.44-37.76-16.02-37.76-16.02 5.41 32.84 3.25 58.05 0 75.52zm-73.22-451.39c36.61-2.88 54.91 28.05 54.91 28.05 43.49 0 68.66 18.78 68.66 18.78s-144.16 95.64-157.89 130.27c-13.73 34.62 45.76 22.87 45.76 22.87l6.86-18.34 41.19-15.38 9.15-12.12 68.66-4.02 75.5-89.92 1.11 0.04 1.01-1.77c-41.07-4.31-86.71-16.41-125.8-44.7-37.98-27.5-89.85-76-139.5-125.45-0.19 0.17-16.03 14.18-25.14 59.96-9.15 46.07 4.58 34.02 32.05 35.37 27.46 1.35 43.47 16.36 43.47 16.36zm19.46 88.7c-2.72 3.69 21.44-3.44 37.6-21.74 16.16-18.31 21.89-20.59 21.89-20.59s-18.31-8.01-38.91-4.58c-20.58 3.44-20.58-13.73-20.58-13.73h-21.74s-18.31 22.88-9.16 44.62l34.32-14.3s9.15 13.15-3.42 30.32zm47.85-910.84c38.55-0.42 86.36-2.13 128.7-2.18-28.83-37.62-55.41-76.74-79.9-117.31-19.22 48.92-37.48 92.74-48.8 119.49zm-213.75 707.18s12.57 17.17 13.72 56.07 9.16 33.18 9.16 33.18 20.59-13.73 28.6-53.78c5.8-29 5.01-42.27 5.43-47.01-3.92 2.05-13.57 4.67-26.02 4.67-18.32 0-30.89 6.87-30.89 6.87zm52.93-40.43c-62.12-63.94-111.96-119.17-111.96-119.17l-5.4-34.07-5.39 34.07s-56.55 62.67-124.27 131.78l10.5923-10.8495zm-178.79 78.29c11.44 27.57 27.46 27.35 30.11 27.35v-35.33s11.08-13.85-9.52-28.73c-20.59-14.88-43.88 0-43.88 0s11.84 9.15 23.29 36.71zm102.97 51.68s9.16-34.4 0-51.68c-9.15-17.27-33.18-14.97-33.18-14.97l-10.3-0.11s-12.58 45.87 10.3 52.74c22.88 6.86 33.18 14.02 33.18 14.02zm-33.18 56.92c-13.73-2.3-14.87-26.32-14.87-26.32-20.6 16.01-43.48 0-43.48 0-65.21 37.75-19.45 121.28-14.87 136.15 4.57 14.87 26.31 13.73 43.48-6.87 17.15-20.59 43.47-17.16 43.47-17.16s0-83.52-13.73-85.8zm-289.462-398.74c41.182-30.89 195.642-48.05 252.752-46.33 13.9 0.42 22.78 6.06 28.35 14.29 5.59-8.23 14.46-13.87 28.35-14.29 57.12-1.72 211.57 15.44 252.77 46.33 41.19 30.89 6.86 90.96 13.73 121.85 6.86 30.9 90.95 133.87 166.47 137.3 75.51 3.43 211.09-51.49 248.85-176.77 37.75-125.29 27.45-254-68.65-307.2-96.11-53.2-187.06-24.02-204.23 0-17.16 24.02-89.24 22.31-116.7-13.73s-123.57-99.54-123.57-137.3c0-1.92 0.02-3.86 0.04-5.81-19.87 9.42-43.83 13.33-55.59-13.21-22.08-49.87-63.52-193.04-52.47-241.22 11.03-48.18 81.77-33.46 97.29-58.49 103.82-167.462-1.79-303.239-108.86-342.052-1.3 25.942-11.72 236.274-10.16 274.072 1.69 40.54 10.4 360.43 10.5 363.66 0.16 5.98 2.29 11.54 6.15 16.04 77.33 90.45 127.97 149.26 131.42 152.9 3.75 2.52 20.43 6.79 31.47 9.6 10.54 2.7 21.44 5.49 29.39 8.38 11.02 4.01 46.36 30.11 126.66 90.99 36.77 27.88 74.78 56.71 85.09 62.88 26.56 15.95 140.03 77.3 149.9 81.06l-4.22 13.05-3.27 13.34c-10.89-2.67-140.46-74.26-156.54-83.91-11.58-6.94-46.78-33.63-87.54-64.54-43.48-32.97-109.21-82.79-119.46-87.07-6.68-2.43-16.91-5.04-26.81-7.56-23.35-5.98-36.88-9.67-43.42-16.23-5.41-5.4-75.6-87.29-133.53-155.03-7.88-9.21-12.4-20.96-12.75-33.14-0.08-3.23-8.79-322.94-10.47-363.27-1.73-41.35 9.81-269.6 10.29-279.3l17.68 0.899c-22.45-6.91-44.67-9.559-64.77-7.149-19 2.282-37.56 5.809-55.5 10.34h1.32c0.31 98.969 2.21 362.06 7.22 390.68 5.43 31.06 2.18 178.13 0.53 239.93-0.29 10.66-3.71 20.9-9.92 29.63-73.55 103.06-120 158.43-138.05 164.57-5.96 2.02-12.05 3.85-18.43 5.79-20.49 6.19-43.691 13.2-76.828 31.05-17.703 9.53-74.922 48.42-135.496 89.57-119.113 80.96-192.766 130.42-211.074 134.76l-6.387-26.71c16.062-4.38 127.976-80.42 202.027-130.75 63.84-43.38 118.957-80.84 137.934-91.06 35.554-19.15 61.224-26.91 81.874-33.14 6.08-1.84 11.86-3.6 17.32-5.43 10.29-4.67 53.71-55.04 124.75-154.58 3.02-4.25 4.7-9.24 4.82-14.43 2.63-98.03 3.98-211.09-0.12-234.46-6.01-34.28-7.41-335.33-7.6-387.9-81.62 26.941-143.85 79.629-151.39 159.699-9.9 105.251 47.46 174.621 73.83 180.661 26.37 6.05 50.98 70.46 30.65 108.46-20.31 38-38.86 147.17-70.55 161.52-1.68 0.77-3.38 1.53-5.09 2.27 3.61 12.55 4.11 26.82 4.11 40.64 0 37.76-96.112 101.26-123.561 137.3-27.461 36.04-99.543 37.75-116.711 13.73-17.156-24.02-108.113-53.2-204.219 0-96.113 53.2-106.406 181.91-68.652 307.2 37.754 125.28 173.34 180.2 248.847 176.77 75.52-3.43 159.61-106.4 166.477-137.3 6.863-30.89-27.465-90.96 13.727-121.85zm624.222-1004.229c-71.03-136.211-196.36-167.242-286.39-191.219-90.02-23.973-243.4 28.359-340.758 131.047-97.367 102.672-104.375 254.223-96.133 328.701 3.726 33.64 23.25 82.01 45.562 128.83 9.211 3.07 15.832 11.51 11.34 23.18 23.965 47.97 48.645 91.31 59.192 111.2 4.129 7.8 7.898 13.69 11.453 18.12 13.474 1.06 23.664 4.42 31.404 9.41 4.35-1.43 8.99-3.26 14.21-4.81 22.85-6.75 59.88-145.89 59.88-145.89l3.44-37.54s-133.165-86.99-112.196-224.451c20.956-137.449 111.596-192.75 244.476-207.949 226.28-25.899 273.08 187.82 262.87 268.031-10.23 80.189-46.84 114.469-73.38 124.699s-61.71 36.96-63.73 61.27c-2.01 24.31 23.52 149.47 39.7 197.39 9.38 27.83 26.27 26.05 43.77 16.39 2.59-28.8 13.68-54.4 57.99-56.69 25.62-50.34 59.45-147.66 91.3-219.39 32.8-73.85 54.99-150.739 29.5-245.65-12.64-28.691-23.05-55.601-31.56-80.671-0.68-1.348-1.24-2.649-1.94-4.008zm-29.03-225.36c-62.58 10.797-128.16 18.129-196.13 21.868 80.59 20.179 158.61 65.632 209.2 147.32-21.06-82.988-18.49-144.258-13.07-169.188zm-721.001 772.529c38.332 0.04 81.094 1.43 117.488 2.01-13.035-31.26-30.34-69.91-45.445-106.03-10.813 16.96-24.223 30.33-37.922 47.4-14.258 17.77-19.746 39.58-34.121 56.62zm-38.535-19.73c18.261-14.59 23.261-37.93 36.219-56.61 15.136-21.81 35.98-35.25 46.183-61.03 2.195-5.54 5.984-9.19 10.371-11.36-3.652-9.79-6.992-19.17-9.48-27.36-14.914-49.02-70.063-146.39-22.524-284.88 47.532-138.5 154.617-248.211 283.867-286.988 1.76-0.524 3.6-1 5.39-1.512-79.49-3.371-155.878-11.57-228.171-24.469 11.199 24.188 19.129 183.61-126.687 434.707 0 0-74.504 289.902-81.887 344.162 23.605-1.33 43.816-1.21 58.848-2.66 6.789-0.66 14.445-1.11 22.468-1.46-3.054-6.6-2.273-14.42 5.403-20.54zm847.356-320.9c-10 47.12-34.4 117.38-59.76 184.08 5.7 0.45 11.26 3.33 15.06 9.74 26.37 44.49 55.3 87.17 86.85 128.15 5.36 6.97 4.93 13.86 1.47 19.23 10.1 0.36 19.5 0.9 27.8 1.7 12.72 1.23 29.14 1.31 48.19 2.11-7.85-55.77-81.82-343.612-81.82-343.612-12.33-21.226-23.42-41.699-33.6-61.547 1.1 19.59 0.12 39.821-4.19 60.149zm292.46 251.71c34.61 13.29 82.64 38.61 95.43 79.78 18.17 58.53 24.88 108.44 21.53 168.85 8.2 10.89 15.78 22.17 23.04 33.63-0.01-1.86-0.02-3.78-0.02-5.65-0.78-172.11-11.79-267.1-51.42-336.45-41.18-72.08-137.29-144.16-113.26-89.24 11.85 27.09 20.35 90.11 24.7 149.08zm-0.68 125.51c-1.57 2.63-6.68 4.75-14.09 6.34 24.82 13 50.12 30.21 75.19 53.73 3.47 3.26 6.74 6.7 10.11 10.05 7.95-44.61 8.01-117.22-67.6-139.8 1.03 36.08-0.07 63.8-3.61 69.68zm134.89 617.84c39.02-50.95 59.86-139.81 55.91-233.65-26.44-38.2-47.65-106.6-49.86-196.93-7.56-13.96-15.85-27.23-24.93-39.59-6.89 71.91-54.23-41.26-54.23-41.26s1.51-4 3.47-10.78c0.29-0.99 0.6-2.22 0.91-3.32-41.45-37.92-87.82-64.83-127.97-82.69-42.02-0.83-91.98-9.31-105.9-27.92-85.17-5.11-208.12 12.44-248.29 16.59-13.9 1.43-23.26 3.84-29.79 7.08l-6.79 4.52c-9.29 8.53-7.69 20.92-9.76 36.45-3.44 25.74 113.26 120.14 113.26 120.14l34.33 18.88s140.53-98.15 262.58-20.6c122.05 77.54 125.28 188.78 92.67 331.22-32.6 142.45-177.49 195.23-185.35 199.55-51.06 28.07-108.11 14.98-180.19-28.24s-92.68-111.24-90.96-142.13c1.71-30.89-8.59-77.23-30.9-89.25-22.3-12.01-152.73-37.75-205.43-41.18-21.19-1.39-30.31 6.75-33.43 19 0.74 8.27 0.37 16.75-0.51 24.44 1.81 13.91 5.81 28.76 7.69 40.65 5.15 32.61 118.42 135.58 190.5 216.71 72.08 81.14 156.17 147.12 316.79 131.68 160.62-15.45 244.4-128.72 306.18-209.37zm132.84-212.74c-15.42 16.55-34 17.45-52.16 5.02-0.06 17.79-1.16 35.58-3.45 53.25-15.06 116.45-94.65 275.21-236.57 342.96-0.22 1.22-0.71 2.47-1.88 3.63-2.2 2.17-3.87 4.36-5.4 7.04-0.7 1.2-1.61 1.94-2.58 2.48l-0.63 1.42c-2.03 2.94-4.58 5.18-7.44 7.04-1.62 1.77-3.32 3.47-5.19 5 6.02-1.27 12.02-2.52 18.39-4.01-40.04 37.2-84.56 83.97-128.42 141.53-34.67 45.47-62.56 89.31-84.95 129.05 20.59-11.44 82.38-11.44 82.38-11.44-36.61 27.46-52.64 98.4-52.64 98.4 25.18-11.44 52.64-4.58 52.64-4.58-25.18 27.46-38.91 77.8-38.91 77.8 27.46-2.29 27.46 11.44 27.46 11.44-18.3 11.44-151.02 130.43-228.82 169.33-49.26 24.63-83.38-8.3-101.79-35.77-10.54-15.74-13.42-35.26-7.54-53.26 12.18-37.3 28.48-107.53-16.52-119.2-61.79-16.02-70.94 93.82-68.66 153.31 2.3 59.51-34.31 98.4-100.68 98.4-66.36 0-114.41-80.09-114.41-80.09s45.77-6.86 59.5-16.02 45.76-82.37 11.43-128.14c-34.31-45.77-75.5-2.29-93.82 18.3-18.3 20.6-2.28 141.88-25.16 167.06-22.88 25.16-157.894-34.33-219.679-86.96-61.777-52.63-135-61.79-135-61.79 0-29.74 38.894-27.46 38.894-27.46-9.148-32.03-36.609-68.64-36.609-68.64l36.609-11.45c2.29-41.18-34.324-73.22-34.324-73.22h41.192c-8.282-33.16-20.586-71.19-39.18-111.68-36.082-78.59-81.992-136.26-118.711-174.92 8.762-0.23 16.992-0.02 24.844 0.44-181.621-45.14-282.266-233.29-299.434-366-2.676-20.67-3.633-41.47-3.269-62.27-21.387 21.22-44.446 23.85-62.934 4-48.055-51.56-61.785-634.34 0-722.22 54.047-76.889 270.18-360.311 360.559-455.088-17.5 3.968-36.035 6.117-55.235 6.117-107.246 0-194.504-66.571-194.504-148.399 0-3.672 0.325-7.269 0.676-10.879l-0.012-0.043 0.024-0.039c1.863-19.179 8.473-37.347 19.051-53.8l0.047-0.129 0.109-0.149c4.934-7.621 10.73-14.859 17.226-21.691l125-157.418c43.907-43.711 112.747-49.852 163.692-14.613 108.848 74.703 269.31215 125.85776 451.188 135.761 52.2524 2.84517 119.3689 1.99476 167.7 0 181.9883-7.51117 342.34-61.058 451.19-135.761 50.94-35.239 119.79-29.098 163.69 14.613l124.99 157.418c6.51 6.832 12.31 14.07 17.23 21.691l0.12 0.149 0.04 0.129c10.58 16.453 17.19 34.621 19.06 53.8l0.02 0.039-0.01 0.043c0.34 3.61 0.67 7.207 0.67 10.879 0 81.828-87.26 148.399-194.51 148.399-24.11 0-47.19-3.379-68.48-9.539 88.22 91.011 309.15 380.629 363.89 458.51 61.79 87.88 48.06 670.66 0 722.22"/><path id="path64" d="m809.578 1402.1c202.512 3.44 99.543 42.91 99.543 42.91s-46.34 56.63-63.508 49.77c-17.156-6.87-5.144-32.61-63.496-36.04-58.347-3.44-188.457-43.11-281.453 104.69-92.996 147.79-63.496 168.18-61.785 188.78 1.719 20.59-10.293 92.67-10.293 92.67 0-5.14-58.352-151.02 18.875-259.15 77.227-108.11 159.609-187.06 362.117-183.63"/><path id="path66" d="m1617.22 2128.35c-89.25-24.48-236.84-256.01-264.3-269.74s-39.47-27.46-27.46-34.32c12.02-6.87 72.86 8.58 103.36 8.58 30.51 0 51.1 10.29 52.82 25.74 1.71 15.44-10.3 82.39 27.45 128.71 37.77 46.34 97.82 141.03 229.97 141.03h66.94s-77.23 30.6-188.78 0"/><path id="path68" d="m991.492 1987.32c37.758-46.32 25.748-113.27 27.468-128.71 1.71-15.45 22.31-25.74 52.81-25.74 30.51 0 91.35-15.45 103.36-8.58 12.01 6.86 0 20.59-27.46 34.32s-175.053 245.26-264.291 269.74c-111.555 30.6-188.789 0-188.789 0h66.933c132.149 0 192.215-94.69 229.969-141.03"/><path id="path70" d="m1999.93 1563.43c-93.01-147.8-223.1-108.13-281.46-104.69-58.35 3.43-46.33 29.17-63.5 36.04-17.16 6.86-63.5-49.77-63.5-49.77s-102.96-39.47 99.55-42.91c202.51-3.43 284.88 75.52 362.11 183.63 77.23 108.13 18.88 254.01 18.88 259.15 0 0-12.02-72.08-10.3-92.67 1.72-20.6 31.22-40.99-61.78-188.78"/><path id="path72" d="m982.695 820.84c-90.422 138.48-10.09 238.48 13.875 288.79 23.98 50.31 41.24 29.89 53.21 42.46 11.96 12.58-18.82 75.11-18.82 75.11s4.09 106.1-71.983-71.74c-76.086-177.831-39.614-280.73 23.211-390.179 62.822-109.429 206.342-113.301 210.652-115.25 0 0-56.15 38.039-74.05 44.348-17.9 6.312-45.68-12.027-136.095 126.461"/><path id="path74" d="m1445.41 1318.26c-10.11-8.02-19.13-67.71-30.16-94.7-11.02-26.98-9.83-49.12 2.51-56.51 12.35-7.39 72.87-22.22 98.1-73.24 25.23-51.03 82.99-140.181 35.22-257.072-11.37-27.828-24.2-59.207-24.2-59.207s53.6 56.68 68.25 167c11.72 88.249-129.24 306.879-130.84 336.389-1.59 29.51-8.77 45.36-18.88 37.34"/><path id="path76" d="m691.582 1896.14c7.82-6.56 192.93-160.9 302.031-201.09 92.857-34.2 216.537-149.85 240.357-172.68 4.59-4.41 10.51-6.62 16.44-6.62 5.82 0 11.64 2.13 16.21 6.4 70.22 65.57 110.03 99.57 119.42 105.07 20.57 3.16 87.04 31.49 114.62 47.99 31.41 18.75 308.47 194.37 320.24 201.84l-14.7 23.19c-2.88-1.82-288.53-182.9-319.61-201.46-29.97-17.9-94.16-43.28-103.76-44.4-6.92 0-14.73 0-132.38-109.78-37.5 35.69-154.05 141.86-247.34 176.22-104.633 38.55-292.036 194.8-293.911 196.37l-17.617-21.05"/><path id="path78" d="m681.641 311.449c0.632-3.367 0.683-6.14 0.168-8.258-0.891-3.902-3.442-6.98-7.676-9.242-4.121-2.207-8.332-2.469-12.641-0.777-4.297 1.687-8.113 5.687-11.402 12.027-3.281 6.321-4.543 11.949-3.711 16.84 0.816 4.891 3.516 8.582 8.055 11.031 4.472 2.391 8.464 2.942 11.961 1.641 1.957-0.742 4.015-2.262 6.171-4.57 5.079 2.64 7.629 3.949 12.739 6.539-1.907 3.5-5 6.371-9.321 8.57-7.793 3.93-16.882 3.191-27.136-2.301-7.664-4.109-12.754-9.91-15.227-17.277-2.851-8.473-1.601-17.602 3.625-27.422 4.832-9.059 11.055-14.828 18.547-17.379 7.488-2.539 15.352-1.539 23.687 2.918 6.731 3.602 11.313 8.441 13.762 14.602 2.461 6.16 2.774 12.648 0.867 19.461-5-2.532-7.488-3.813-12.468-6.403"/><path id="path80" d="m721.223 319.809c-2.7 5.98-4.043 8.972-6.75 14.941 11.828 5.699 17.761 8.461 29.699 13.82-1.731 4.09-2.59 6.129-4.317 10.211-12.023-5.41-18.019-8.199-29.945-13.949-2.222 4.938-3.34 7.398-5.562 12.328 13.113 6.32 19.715 9.379 32.957 15.301-1.746 4.168-2.625 6.25-4.375 10.418-18.516-8.277-27.703-12.609-45.977-21.649 10.742-23.109 16.106-34.671 26.848-57.769 17.984 8.891 27.051 13.148 45.281 21.277-1.769 4.223-2.656 6.344-4.426 10.571-13.433-5.977-20.125-9.09-33.433-15.5"/><path id="path82" d="m783.762 404.32c6.211-16.691 9.312-25.031 15.535-41.711-16.035 12.782-24.207 19.063-40.84 31.352-5.574-2.352-8.352-3.539-13.906-5.949 9.66-23.621 14.48-35.43 24.14-59.051 4.7 2.059 7.051 3.059 11.758 5.051-6.679 16.84-10.019 25.25-16.711 42.078 16.887-12.52 25.18-18.899 41.438-31.93 5.09 2.02 7.637 3.02 12.746 4.988-8.684 24.012-13.02 36.024-21.699 60.043-4.993-1.921-7.485-2.902-12.461-4.871"/><path id="path84" d="m855.781 430.441c-21.047-6.929-31.511-10.64-52.324-18.5 1.516-4.261 2.266-6.39 3.777-10.66 7.661 2.891 11.496 4.309 19.184 7.071 6.727-19.911 10.086-29.864 16.812-49.782 5.176 1.86 7.766 2.782 12.954 4.571-6.528 19.988-9.778 29.98-16.301 49.98 7.683 2.66 11.535 3.961 19.238 6.5-1.34 4.328-2.004 6.488-3.34 10.82"/><path id="path86" d="m905.754 417.43c-1.242-1.078-3.293-2.051-6.152-2.899-5.762-1.711-8.633-2.582-14.375-4.351-1.926 6.59-2.883 9.89-4.805 16.492 5.965 1.848 8.953 2.75 14.93 4.519 2.785 0.829 4.98 1.079 6.574 0.75 2.832-0.562 4.746-2.711 5.75-6.449 0.937-3.472 0.293-6.152-1.922-8.062zm23.766-25.942c-0.489 0.953-1.114 2.844-1.844 5.66-0.442 1.661-0.656 2.5-1.082 4.161-1.133 4.332-2.59 7.39-4.367 9.16-1.778 1.781-4.289 2.812-7.559 3.121 3.223 2.18 5.234 4.898 6.023 8.16 0.813 3.27 0.84 6.371 0.071 9.309-0.625 2.441-1.582 4.5-2.891 6.191-1.301 1.672-2.844 3.102-4.629 4.281-2.168 1.438-4.597 2.301-7.273 2.59-2.668 0.289-6.262-0.16-10.754-1.402-12.512-3.668-18.75-5.59-31.192-9.598 7.395-24.473 11.082-36.699 18.497-61.172 5.058 1.633 7.585 2.43 12.668 4.012-2.805 9.629-4.211 14.437-7.012 24.059 5.164 1.601 7.754 2.39 12.937 3.941 3.7 1.098 6.399 1.18 8.106 0.258 1.699-0.918 3.105-3.34 4.238-7.27 0.652-2.269 0.984-3.41 1.641-5.699 0.527-1.82 1.179-3.539 1.992-5.168 0.39-0.781 0.976-1.793 1.75-3.051 5.762 1.66 8.64 2.469 14.414 4.051l-0.402 1.547c-1.465 0.422-2.571 1.383-3.332 2.859"/><path id="path88" d="m956.34 418.102c1.031 10.628 1.582 15.949 2.742 26.597 5.535-9.039 8.273-13.558 13.684-22.629-6.575-1.539-9.868-2.332-16.426-3.968zm-8.149 38.98c-3.613-27.262-5.195-40.883-7.878-68.094 5.48 1.481 8.222 2.203 13.71 3.602 0.469 5.539 0.711 8.32 1.219 13.871 9.336 2.359 14.028 3.488 23.403 5.66 2.8-4.75 4.199-7.133 6.96-11.902 5.711 1.301 8.575 1.941 14.297 3.172-14.011 23.16-21.23 34.668-36.093 57.461-6.25-1.473-9.375-2.223-15.618-3.77"/><path id="path90" d="m1019.09 419.078c-3.82 20.66-5.72 30.981-9.54 51.633-5.55-1.09-8.33-1.652-13.874-2.801 4.914-25.129 7.364-37.699 12.284-62.808 17.91 3.718 26.9 5.418 44.91 8.457-0.72 4.55-1.08 6.82-1.81 11.371-12.81-2.168-19.2-3.34-31.97-5.852"/><path id="path92" d="m1118.47 435.172c-1.49-0.93-3.62-1.563-6.41-1.891-6.26-0.73-9.39-1.121-15.64-1.941-0.83 6.781-1.25 10.16-2.08 16.941 6.41 0.84 9.62 1.239 16.05 2 2.81 0.309 5.03 0.188 6.64-0.332 2.91-0.929 4.52-3.058 4.86-6.367 0.4-3.922-0.74-6.711-3.42-8.41zm-27.16 37.648c5.79 0.762 8.68 1.129 14.47 1.821 3.18 0.371 5.92 0.39 7.96-0.102 2.43-0.578 3.87-2.508 4.17-5.469 0.28-2.679-0.42-4.648-2.09-5.898-1.67-1.242-3.94-2.043-6.8-2.383-6.39-0.75-9.6-1.148-15.98-1.98-0.7 5.601-1.04 8.41-1.73 14.011zm32.86-14.789c2.08 1.34 3.65 2.707 4.65 4.16 1.81 2.571 2.54 5.789 2.18 9.688-0.36 3.769-1.66 6.93-3.98 9.43-3.82 4.062-9.85 5.73-18.05 4.902-12.96-1.5-19.44-2.332-32.38-4.172 3.39-25.391 5.08-38.078 8.46-63.48 11.49 1.64 17.24 2.382 28.76 3.73 3.25 0.391 6.23 1.012 8.95 1.891 2.71 0.89 5.01 2.211 6.92 3.968 1.68 1.551 3.03 3.372 4.07 5.493 1.63 3.191 2.28 6.66 1.93 10.437-0.34 3.672-1.46 6.723-3.39 9.113-1.93 2.399-4.65 4.008-8.12 4.84"/><path id="path94" d="m1164.74 451.461c2.69 10.32 4.07 15.461 6.89 25.769 4-9.851 5.97-14.781 9.84-24.648-6.69-0.402-10.04-0.633-16.73-1.121zm-1.83 39.84c-7.85-26.27-11.55-39.43-18.49-65.801 5.6 0.512 8.4 0.75 14 1.199 1.35 5.391 2.02 8.09 3.4 13.481 9.53 0.73 14.3 1.039 23.84 1.59 2.01-5.161 2.99-7.75 4.96-12.911 5.81 0.313 8.72 0.45 14.53 0.692-10.08 25.23-15.35 37.789-26.32 62.801-6.37-0.383-9.55-0.59-15.92-1.051"/><path id="path96" d="m1252.52 494.672c0.04-17.871 0.06-26.813 0.1-44.684-10.39 17.844-15.76 26.711-26.86 44.344-5.91-0.141-8.87-0.23-14.77-0.434 0.85-25.628 1.27-38.429 2.12-64.046 5 0.179 7.5 0.257 12.5 0.367-0.43 18.191-0.64 27.281-1.06 45.461 11.25-17.918 16.69-26.942 27.21-45.078 5.36 0.019 8.04 7e-3 13.42-0.032 0.18 25.621 0.28 38.43 0.46 64.071-5.25 0.039-7.88 0.05-13.12 0.031"/><path id="path98" d="m1318.96 493.109c-10.9-10.027-16.25-15.109-26.75-25.379 0.28 10.571 0.43 15.84 0.72 26.399-5.55 0.172-8.31 0.242-13.86 0.332-0.44-25.621-0.66-38.43-1.1-64.063 5.28-0.097 7.92-0.168 13.2-0.308 0.24 8.558 0.35 12.851 0.59 21.41 2.7 2.539 4.05 3.809 6.78 6.328 7.72-11.457 11.5-17.219 18.87-28.797 6.9-0.351 10.34-0.543 17.23-0.992-10.15 15.781-15.38 23.609-26.18 39.172 11.26 10.078 16.99 15.059 28.67 24.867-7.27 0.461-10.9 0.66-18.17 1.031"/><path id="path100" d="m1409.59 436.379c-3.59-3.488-8.05-4.918-13.37-4.297-5.32 0.617-9.38 3.02-12.19 7.25-2.8 4.207-3.89 9.918-3.22 17.098 0.68 7.179 2.84 12.55 6.49 16.101 3.66 3.551 8.28 5.02 13.78 4.379 5.51-0.629 9.67-3.109 12.44-7.422 2.76-4.297 3.68-10.027 2.81-17.156-0.88-7.152-3.14-12.473-6.74-15.953zm-7.29 51.82c-9.59 1.11-17.24-0.949-22.71-5.09-6.91-5.257-11.41-13.687-12.39-25.39-0.97-11.457 1.88-20.528 7.56-27.239 4.4-5.218 11.11-8.609 20.24-9.671 9.12-1.047 16.4 0.722 21.82 4.812 6.96 5.25 11.67 13.457 13.18 24.859 1.54 11.629-1.02 20.879-6.62 27.571-4.44 5.301-11.47 9.039-21.08 10.148"/><path id="path102" d="m1435.94 417.18c5.29-0.789 7.93-1.2 13.21-2.051 1.61 10.601 2.41 15.91 4.02 26.531 11.51-1.859 17.26-2.851 28.73-4.98 0.77 4.379 1.15 6.57 1.91 10.961-11.57 2.14-17.36 3.14-28.98 5.019 0.88 5.82 1.32 8.731 2.21 14.559 13.39-2.16 20.07-3.328 33.42-5.848 0.78 4.43 1.18 6.649 1.96 11.078-18.98 3.59-28.49 5.199-47.57 8.051-3.56-25.328-5.35-38-8.91-63.32"/><path id="path104" d="m1567.6 456.012c-4.11-17.371-6.16-26.051-10.28-43.41-6.01 19.91-9.19 29.847-15.94 49.707-5.8 1.332-8.7 1.98-14.51 3.25-5.13-25.09-7.69-37.629-12.81-62.707 4.92-1.063 7.39-1.614 12.3-2.731 3.8 17.75 5.7 26.629 9.51 44.391 6.83-20.18 10.05-30.293 16.11-50.532 5.25-1.308 7.87-1.992 13.11-3.359 6.13 24.828 9.2 37.25 15.33 62.09-5.13 1.34-7.69 2-12.82 3.301"/><path id="path106" d="m1592.18 449.559c-6.36-24.778-9.53-37.168-15.89-61.938 5.2-1.43 7.79-2.152 12.99-3.633 6.61 24.711 9.91 37.051 16.52 61.762-5.45 1.551-8.17 2.32-13.62 3.809"/><path id="path108" d="m1637.21 394.121c5.84-1.883 8.75-2.851 14.57-4.812-1.91-3.75-4.66-6.379-8.23-7.899-3.55-1.531-7.51-1.59-11.89-0.172-4.46 1.442-7.98 4.262-10.6 8.481-2.59 4.222-2.85 10.09-0.68 17.64 2.15 7.493 5.43 12.602 9.85 15.289 4.43 2.68 9.26 3.192 14.47 1.524 2.7-0.883 5.04-2.133 6.97-3.774 3.45-2.957 5.03-6.699 4.73-11.199 5.25-1.758 7.87-2.66 13.11-4.48 1.19 6.101-0.05 11.972-3.78 17.582-3.72 5.621-9.75 9.808-18.02 12.48-9.55 3.059-18.14 2.438-25.62-1.832-7.5-4.269-12.56-11.437-15.3-21.41-2.72-9.848-1.95-18.469 1.86-25.777 3.72-7.133 9.61-12.114 17.81-14.731 4.98-1.601 9.49-1.941 13.54-1.019 2.36 0.539 5.24 1.808 8.66 3.84-0.45-3.223-0.67-4.832-1.12-8.043 3.42-1.161 5.13-1.75 8.53-2.93 4.26 13.031 6.39 19.543 10.65 32.57-10.54 3.672-15.82 5.442-26.42 8.871-1.24-4.09-1.85-6.129-3.09-10.199"/><path id="path110" d="m1698.62 403.391c13.5-5.032 20.22-7.641 33.62-13.071 1.6 4.231 2.4 6.352 4.01 10.578-18.71 7.582-28.12 11.172-47.04 17.993-8.19-24.2-12.29-36.301-20.47-60.493 18.62-6.707 27.89-10.269 46.31-17.757 1.64 4.289 2.45 6.441 4.09 10.73-13.57 5.508-20.39 8.168-34.08 13.27 2.17 6.199 3.25 9.3 5.42 15.5 12.17-4.532 18.23-6.891 30.3-11.743 1.57 4.141 2.35 6.223 3.93 10.364-12.19 4.898-18.3 7.269-30.57 11.84 1.8 5.109 2.69 7.668 4.48 12.789"/><path id="path112" d="m1771.44 356.309c-1.65-0.02-3.85 0.582-6.62 1.812-5.56 2.481-8.35 3.688-13.93 6.09 2.57 6.359 3.85 9.539 6.41 15.898 5.81-2.5 8.7-3.757 14.48-6.328 2.68-1.191 4.56-2.449 5.6-3.75 1.88-2.312 2.04-5.23 0.53-8.781-1.41-3.289-3.56-4.941-6.47-4.941zm14.38-6.52c2.65 1.981 4.59 4.359 5.81 7.133 1.01 2.289 1.52 4.519 1.54 6.68 0.02 2.148-0.31 4.269-0.98 6.367-0.82 2.543-2.2 4.812-4.11 6.801-1.92 1.98-5.01 3.992-9.29 6-12.07 5.402-18.14 8.019-30.3 13.101-9.31-23.762-13.97-35.652-23.28-59.41 4.96-2.07 7.43-3.109 12.36-5.231 3.75 9.282 5.62 13.918 9.36 23.192 5.03-2.152 7.54-3.25 12.55-5.461 3.58-1.59 5.73-3.313 6.51-5.141 0.76-1.832 0.37-4.629-1.16-8.398-0.89-2.203-1.34-3.301-2.23-5.492-0.72-1.75-1.26-3.508-1.63-5.301-0.18-0.859-0.34-2.027-0.52-3.508 5.54-2.519 8.3-3.801 13.82-6.383l0.64 1.461c-0.9 1.289-1.16 2.762-0.85 4.422 0.2 1.039 0.88 2.91 2.04 5.57 0.69 1.571 1.04 2.348 1.72 3.93 1.79 4.09 2.53 7.41 2.23 9.949-0.29 2.532-1.62 5-4 7.391 3.88-0.449 7.13 0.32 9.77 2.328"/><path id="path114" d="m1810.41 368.121c-10.48-23.25-15.71-34.871-26.19-58.109 4.95-2.371 7.42-3.571 12.36-6.024 10.71 23.133 16.08 34.692 26.8 57.813-5.18 2.558-7.77 3.82-12.97 6.32"/><path id="path116" d="m1850.17 303.32c-6.12 3.309-9.17 4.95-15.32 8.168 7.55 7.364 11.35 11.024 19.01 18.293-1.42-10.609-2.16-15.89-3.69-26.461zm-46.21-3c5.17-2.601 7.76-3.91 12.92-6.582 3.87 3.891 5.83 5.832 9.74 9.692 8.76-4.571 13.13-6.899 21.82-11.649-0.83-5.519-1.25-8.261-2.11-13.761 5.28-2.918 7.92-4.399 13.18-7.379 3.75 27.121 5.41 40.757 8.28 68.16-5.81 3.148-8.72 4.711-14.56 7.769-20.1-18.191-29.95-27.449-49.27-46.25"/></g><g fill="#d8af7f"><path id="path118" d="m809.578 1402.1c-202.508-3.43-284.89 75.52-362.117 183.63-77.227 108.13-18.875 254.01-18.875 259.15 0 0 12.012-72.08 10.293-92.67-1.711-20.6-31.211-40.99 61.785-188.78 92.996-147.8 223.106-108.13 281.453-104.69 58.352 3.43 46.34 29.17 63.496 36.04 17.168 6.86 63.508-49.77 63.508-49.77s102.969-39.47-99.543-42.91zm73.801 726.25c89.238-24.48 236.831-256.01 264.291-269.74s39.47-27.46 27.46-34.32c-12.01-6.87-72.85 8.58-103.36 8.58-30.5 0-51.1 10.29-52.81 25.74-1.72 15.44 10.29 82.39-27.468 128.71-37.754 46.34-97.82 141.03-229.969 141.03h-66.933s77.234 30.6 188.789 0zm135.581-715.95c3.42 25.74-113.276 120.14-113.276 120.14l-34.329 18.88s-140.527-98.15-262.566-20.6c-122.051 77.54-125.281 188.78-92.676 331.22 32.61 142.45 177.492 195.23 185.34 199.55 51.074 28.07 108.125 14.98 180.207-28.24 72.078-43.22 92.676-111.24 90.957-142.13s8.582-77.23 30.893-89.25c22.31-12.01 152.74-37.75 205.44-41.18 52.69-3.44 31.39 51.49 26.25 84.09-5.15 32.61-118.42 135.58-190.5 216.71-72.083 81.14-156.177 147.12-316.802 131.68-160.625-15.45-244.39-128.72-306.179-209.37-61.785-80.67-78.164-256.37-22.317-396.45 55.864-140.07 197.368-209.37 271.977-231.68 74.598-22.31 251.473 3.43 301.238 8.58 49.763 5.14 42.903 22.31 46.343 48.05"/><path id="path120" d="m2053.13 1585.73c-77.23-108.11-159.6-187.06-362.11-183.63-202.51 3.44-99.55 42.91-99.55 42.91s46.34 56.63 63.5 49.77c17.17-6.87 5.15-32.61 63.5-36.04 58.36-3.44 188.45-43.11 281.46 104.69 93 147.79 63.5 168.18 61.78 188.78-1.72 20.59 10.3 92.67 10.3 92.67 0-5.14 58.35-151.02-18.88-259.15zm-314.07 542.62c-132.15 0-192.2-94.69-229.97-141.03-37.75-46.32-25.74-113.27-27.45-128.71-1.72-15.45-22.31-25.74-52.82-25.74-30.5 0-91.34-15.45-103.36-8.58-12.01 6.86 0 20.59 27.46 34.32s175.05 245.26 264.3 269.74c111.55 30.6 188.78 0 188.78 0h-66.94zm339.81-144.45c-61.78 80.65-145.56 193.92-306.18 209.37-160.62 15.44-244.71-50.54-316.79-131.68-72.08-81.13-185.35-184.1-190.5-216.71-5.16-32.6-26.44-87.53 26.25-84.09 52.7 3.43 183.13 29.17 205.43 41.18 22.31 12.02 32.61 58.36 30.9 89.25-1.72 30.89 18.88 98.91 90.96 142.13s129.13 56.31 180.19 28.24c7.86-4.32 152.75-57.1 185.35-199.55 32.61-142.44 29.38-253.68-92.67-331.22-122.05-77.55-262.58 20.6-262.58 20.6l-34.33-18.88s-116.7-94.4-113.26-120.14c3.43-25.74-3.44-42.91 46.34-48.05 49.76-5.15 226.63-30.89 301.24-8.58 74.6 22.31 216.11 91.61 271.96 231.68 55.85 140.08 39.47 315.78-22.31 396.45"/><path id="path122" d="m1595.13 944.531c-14.65-110.32-68.25-167-68.25-167s12.83 31.379 24.2 59.207c47.77 116.891-9.99 206.042-35.22 257.072-25.23 51.02-85.75 65.85-98.1 73.24-12.34 7.39-13.53 29.53-2.51 56.51 11.03 26.99 20.05 86.68 30.16 94.7s17.29-7.83 18.88-37.34c1.6-29.51 142.56-248.14 130.84-336.389zm-612.942-179.25c-62.825 109.449-99.297 212.348-23.211 390.179 76.073 177.84 71.983 71.74 71.983 71.74s30.78-62.53 18.82-75.11c-11.97-12.57-29.23 7.85-53.21-42.46-23.965-50.31-104.297-150.31-13.875-288.79 90.415-138.488 118.195-120.149 136.095-126.461 17.9-6.309 74.05-44.348 74.05-44.348-4.31 1.949-147.83 5.821-210.652 115.25zm502.212 598.279c-25.5 16.96-63.89 56.68-80.05 8.76-16.18-47.92-41.71-173.08-39.7-197.39 2.02-24.31 37.19-51.04 63.73-61.27s153.49-142.32 7.25-328.922c-5.15-6.59-65.42-89.136-196.74-63.808-131.33 25.332-223.52 70.5-244.476 207.949-20.969 137.461 112.196 224.451 112.196 224.451l-3.44 37.54s-37.03 139.14-59.88 145.89c-22.84 6.76-34.76 19.35-57.067-22.72-22.317-42.07-107.856-188.73-116.094-263.21-8.242-74.478-1.234-226.029 96.133-328.701 97.358-102.688 250.738-155.02 340.758-131.047 90.03 23.977 215.36 55.008 286.39 191.219 71.02 136.219 46.04 235.709 4 330.329-42.03 94.62-87.5 233.98-113.01 250.93"/></g></g></g></svg>

                                        </div>
                                        <div class="col-9">
                                            <small>To meet regulations, please provide your BVN (Bank Verification Number) and NIN (National Identification Number). This ensures security and a smooth virtual banking experience. Your information is handled securely. Thank you for your cooperation.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 10px; margin: 0 5px 0 5px;">
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="number" style="height: 50px; border: none; border-bottom: #b3b3b3 solid 1px;" class="form-control form-control-sm bvn" id="floatingInput"placeholder="name">
                                                <label for="floatingInput" style="color: #afafaf; margin-top: 2px; font-weight: 500;">BVN</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="number" style="height: 50px; border: none; border-bottom: #b3b3b3 solid 1px;" class="form-control form-control-sm transfer_amt nin" id="floatingInput"
                                                    placeholder="name">
                                                <label for="floatingInput" style="color: #afafaf; margin-top: 2px; font-weight: 500;">NIN</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12" style="padding: 30px;">
                                            <button class="btn btn-primary abba_save_bvn_nin" style="width: 100%;" type="button">
                                            <i class="fas fa-save"></i> Generate Account
                                            </button>
                                            <div align="center" style="color: #afafaf; font-size: 11px; font-weight: 500;">Powered
                                                by EduMESS
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--===get nin and bvn modal=======-->
                    
                    

                    <!--==== Set tranfer pin Modal==== -->
                    <div class="modal fade" id="set_transfer_pin_Modal" tabindex="-1" aria-labelledby="set_transfer_pin_ModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="border-radius: 20px;">
                            <div class="modal-body">
                                <div align="center">
                                <h4 class="mt-3"><i class="fas fa-key"></i> Set Transaction Pin</h4>
                                </div>
                                <div class="row" style="padding-top: 50px; margin: 0 5px 0 5px;">
                                <div class="col-12 mb-2 abba-main-content-container">
                                    <div id="abba-otp-input" class="abba-font-h2-strong">
                                        <input class="abba-font-h2-strong" placeholder="_" type="number" step="1" min="0"
                                            max="9" autocomplete="no" pattern="\d*" />
                                        <input class="abba-font-h2-strong" placeholder="_" type="number" step="1" min="0"
                                            max="9" autocomplete="no" pattern="\d*" />
                                        <input class="abba-font-h2-strong" placeholder="_" type="number" step="1" min="0"
                                            max="9" autocomplete="no" pattern="\d*" />
                                        <input class="abba-font-h2-strong" placeholder="_" type="number" step="1" min="0"
                                            max="9" autocomplete="no" pattern="\d*" />
                                        <input id="abba-otp-value" placeholder="_" type="hidden" name="otp" />
                                    </div>
                                    <button class="abba-pin-btn btn-primary"><i class="fas fa-key"></i> Set Pin</button>
                                    <div align="center" style="color: #afafaf; font-size: 11px; font-weight: 500;">Powered
                                        by EduMESS
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!--===Set tranfer pin Modal=======-->
                    <!--==== Enter tranfer pin Modal==== -->
                    <div class="modal fade" id="enter_transfer_pin_Modal" tabindex="-1" aria-labelledby="enter_transfer_pin_ModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="border-radius: 20px;">
                            <div class="modal-body">
                                <div align="center">
                                <h4 class="mt-3"><i class="fas fa-key"></i> Enter Transaction Pin</h4>
                                </div>
                                <div class="row" style="padding-top: 50px; margin: 0 5px 0 5px;">
                                <div class="col-12 mb-2 abba-enter-main-content-container">
                                    <div id="abba-enter-otp-input" class="abba-enter-font-h2-strong">
                                        <input class="abba-enter-font-h2-strong" placeholder="_" type="number" step="1" min="0"
                                            max="9" autocomplete="no" pattern="\d*" />
                                        <input class="abba-enter-font-h2-strong" placeholder="_" type="number" step="1" min="0"
                                            max="9" autocomplete="no" pattern="\d*" />
                                        <input class="abba-enter-font-h2-strong" placeholder="_" type="number" step="1" min="0"
                                            max="9" autocomplete="no" pattern="\d*" />
                                        <input class="abba-enter-font-h2-strong" placeholder="_" type="number" step="1" min="0"
                                            max="9" autocomplete="no" pattern="\d*" />
                                        <input id="abba-enter-otp-value" placeholder="_" type="hidden" name="otp" />
                                    </div>
                                    <button class="abba-pin-btn btn-primary abba-enter-pin-btn"><i class="fas fa-key"></i> Enter Pin</button>
                                    <span> Forgot Pin? Click Here</span>
                                    <div align="center" style="color: #afafaf; font-size: 11px; font-weight: 500;">Powered
                                        by EduMESS
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <input type="hidden" id="abba_modal" >
                    <!--===Set tranfer pin Modal=======-->
                    <!--==== View Transaction Modal==== -->
                    <div class="modal fade" id="view_transaction_details_Modal" tabindex="-1"
                    aria-labelledby="view_transaction_details_ModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="border-radius: 20px;">
                            <div class="modal-body">
                                <div align="center">
                                <h4 class="mt-3"><i class="fas fa-exchange-alt"></i> Transaction Details</h4>
                                </div>
                                <div class="row" style="padding-top: 50px; margin: 0 5px 0 5px;">
                                <div class="col-12 mb-2">
                                    <div class="form-floating ">
                                        <select class="form-select bank_code"
                                            style="font-size: 13px; height: 53px;border: none; border-bottom: #b3b3b3 solid 1px;"
                                            id="floatingSelect" aria-label="Floating label select example">
                                            <option selected></option>
                                            <?php
                                            $abba_sql_banks = ("SELECT * FROM `banks` ORDER BY name ASC");
                                            $abba_result_banks = mysqli_query($link, $abba_sql_banks);
                                            $abba_row_banks = mysqli_fetch_assoc($abba_result_banks);
                                            $abba_row_cnt_banks = mysqli_num_rows($abba_result_banks);
                                            
                                            if ($abba_row_cnt_banks > 0) {
                                                do {
                                            
                                                    echo '<option value="' . $abba_row_banks['code'] . '">' . $abba_row_banks['name'] . '</option>';
                                            
                                                } while ($abba_row_banks = mysqli_fetch_assoc($abba_result_banks));
                                            } else {
                                                echo '<option value="0">No Records Found</option>';
                                            }
                                            ?>
                                        </select>
                                        <label for="floatingSelect">Select Bank</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            style="height: 50px; border: none; border-bottom: #b3b3b3 solid 1px;"
                                            class="form-control form-control-sm account_name" id="floatingInput"
                                            placeholder="name">
                                        <label for="floatingInput"
                                            style="color: #afafaf; margin-top: 2px; font-weight: 500;">Account
                                        Number</label>
                                    </div>
                                </div>
                                <div class="col-12 account_user_name">
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="number"
                                            style="height: 50px; border: none; border-bottom: #b3b3b3 solid 1px;"
                                            class="form-control form-control-sm transfer_amt" id="floatingInput"
                                            placeholder="name">
                                        <label for="floatingInput"
                                            style="color: #afafaf; margin-top: 2px; font-weight: 500;">Amount</label>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-12" style="padding: 30px;">
                                    <button class="btn btn-primary abba_transfer" style="width: 100%;" type="button">
                                    <i class="fas fa-exchange-alt"></i> Transfer
                                    </button>
                                    <div align="center" style="color: #afafaf; font-size: 11px; font-weight: 500;">Powered
                                        by EduMESS
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!--===View Transaction Modal=======-->
                    <!--==== =Transfer Modal In Bulk===== -->
                    <div class="modal fade" id="withdrawModalBulk" tabindex="-1" aria-labelledby="withdrawModalBulkLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content" style="border-radius: 20px;">
                            <div class="modal-body overflow-auto">
                                <div align="center">
                                <h4 class="mt-3"><i class="fas fa-exchange-alt"></i> Pay Salary</h4>
                                </div>
                                <br><br>
                                <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                                <ul class="nav nav-pills mb-3 renceTab prosloadhidetablist" id="pills-tab" role="tablist" >
                                    <li class="nav-item border" role="presentation">
                                        <a href="Javascript:;" class="nav-link active abba_tab_checker_for_summary" data-id="student"
                                            data-sumdiv="student_summary_div" id="pills-classsetting-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-classsetting" type="button" role="tab" aria-controls="pills-classsetting"
                                            aria-selected="true"><i class="fas fa-money-bill"></i> Payment Now</a>
                                    </li>
                                    &nbsp;&nbsp;
                                    <li class="nav-item border" role="presentation">
                                        <a href="Javascript:;" class="nav-link abba_tab_checker_for_summary" data-id="parent"
                                            data-sumdiv="parent_summary_div" id="pills-websitting-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-websitting" type="button" role="tab" aria-controls="pills-websitting"
                                            aria-selected="false"><i class="fas fa-credit-card"></i> Schedule Salary </a>
                                    </li>
                                </ul>
                                <div class="tab-content prosloadtabhidecontent" id="pills-tabContent" >
                                    <div class="tab-pane fade show active" id="pills-classsetting" role="tabpanel" aria-labelledby="pills-classsetting-tab">
                                        <div class="row">
                                            <div class="col-md-7 col-12">
                                            <div class="row">
                                                <input type="hidden" class="prosloadsalaybulkamount_inititated">
                                                <div class="col-12 mb-4">
                                                    <div class="row">
                                                        <div class="col-md-12 ps-0">
                                                        <p class="ps-3 textmuted fw-bold h6 mb-0">TOTAL SALARY AMOUNT</p>
                                                        <span class="h4 fw-bold d-flex ps-3">₦ <span class="textmuted prosloadamountcontent" >0.00</span></span> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group abba_local-forms ">
                                            <label>Month<span style="color:orangered;">*</span> </label>
                                            <input type="month" class="form-control  prosstartamountmonth_instantpayment" >
                                        </div>
                                        <div class="accordion" id="accordionExample">
                                            <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Click to pick staff for payment
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <p class="ps-3 textmuted mb-0">Choose the right payment type for efficient staff salary processing. </p>
                                                    <div  class="my-4" style="margin-left:15px;"> 
                                                        <input  class="prosgeneralpaymenttypecheck"  type="radio" onchange="toggleForm('Wallet')" value="wallet" name="chargeType" id="wallet" checked> <label class="text-primary" for="wallet"><strong>Wallet</strong></label>
                                                        <input class="ms-3 prosgeneralpaymenttypecheck" onchange="toggleForm('Saved')" value="saved"  type="radio" name="chargeType" id="saved"> <label class="text-primary" for="saved"><strong>Saved</strong></label>
                                                        <input class="ms-3 prosgeneralpaymenttypecheck" onchange="toggleForm('Blocked')" value="blocked"    type="radio" name="chargeType" id="block"> <label class="text-primary" for="block"><strong>Locked</strong></label>
                                                    </div>
                                                    <div class="row  " style="margin-left:12px;"> 
                                                             <div class="prosloadcontenttypeinstant"></div>
                                                    </div>
                                                    
                                                    <div class="container table-responsive proscontfloatcontent prosloadstaffcontentsalary"> </div>

                                                   
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12" style="padding: 30px;">
                                            <button class="btn btn-primary abba_transfer_bulk"  onclick="payWithMonnifyBulk()" style="width: 100%;" type="button">
                                            <i class="fas fa-exchange-alt"></i> Pay
                                            </button>
                                            <div align="center" style="color: #afafaf; font-size: 11px; font-weight: 500;">Powered
                                                by EduMESS
                                            </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="tab-pane fade show " id="pills-websitting" role="tabpanel" aria-labelledby="pills-websitting-tab">
                                        <div id="pros-loadamissionwebcontent">
                                            


                                         <div class="row ">
                                           
                                            <div  class="my-4" style="margin-left:15px;"> 
                                                 <p class="ps-3 textmuted mb-0 mb-2" style="margin-right:25px;">Choose the right payment type </p>
                                                <input  class="prosgeneralpaymenttypecheck_schedule"  type="radio" value="wallet" name="chargeTypeshedule" id="walletschedule" checked> <label class="text-primary" for="walletschedule"><strong>Wallet</strong></label>
                                                <input class="ms-3 prosgeneralpaymenttypecheck_schedule" value="saved"  type="radio" name="chargeTypeshedule" id="savedschedule"> <label class="text-primary" for="savedschedule"><strong>Saved</strong></label>
                                                <input class="ms-3 prosgeneralpaymenttypecheck_schedule" value="blocked"    type="radio" name="chargeTypeshedule" id="blockschedule"> <label class="text-primary" for="blockschedule"><strong>Locked</strong></label>
                                                </div>

                                                 <div class="row " style="margin-left:12px;"> 
                                                         <div class="prosloadcontenttypeinstant_schedule"></div>
                                                 </div>
                                            </div>


                                            <div class="accordion" id="accordionExampleschedule">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOneschedule">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneschedule" aria-expanded="true" aria-controls="collapseOneschedule">
                                                    <u>Click to view more fields</u>
                                                    </button>
                                                </h2>
                                                <div id="collapseOneschedule" class="accordion-collapse collapse " aria-labelledby="headingOneschedule" data-bs-parent="#accordionExampleschedule">
                                                    <div class="accordion-body">
                                                          <br>

                                                          <p class="mr-2"><strong>Select Date, Month And Amount for Staff's automated Salary Payment</strong></p>
                                                        
                                                        
                                                        <div class="form-group abba_local-forms ">
                                                        <label>Month<span style="color:orangered;">*</span> </label>
                                                        <input type="month" class="form-control pros_general_schedule_input prosstartamountmonth-scheule" >
                                                        </div>
                                                        <div class="form-group abba_local-forms ">
                                                        <label>Date<span style="color:orangered;">*</span> </label>
                                                        <input type="date" class="form-control pros_general_schedule_input schedulepaymentdate" id="schedulepaymentdate">
                                                        </div>
                                                        <div class="form-group abba_local-forms">
                                                        <label>Amount<span style="color:orangered;">*</span> </label>
                                                        <input type="number"
                                                            class="form-control form-control-sm account_name prosamountschedule pros_general_schedule_input_amount" 
                                                            placeholder="Amount">
                                                        </div>


                                                        <div class="row">
                                                        <div class="col-md-7 col-12">
                                                            <div class="row">
                                                                <input type="hidden" class="prosloadsalaybulkamount_schedule">
                                                                <div class="col-12 mb-4">
                                                                    <div class="row">
                                                                    <div class="col-md-12 ps-0">
                                                                        <p class="ps-3 textmuted fw-bold h6 mb-0">TOTAL SALARY AMOUNT</p>
                                                                        <input type="hidden" class="prosloadsalaybulkamount_inititatedschedule">
                                                                        <span class="h4 fw-bold d-flex ps-3">₦ <span class="textmuted prosloadamountcontent-schedule" >0.00</span></span> 
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>



                                                        <div class="prosloadstaffforshedule-salary"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>

                                                    <input type="hidden" classs="prosgetscheduletypeofpaymentamount">



                                            

                                            <div class="row">
                                            <div class="col-12" style="padding: 30px;">
                                                <button class="btn btn-primary pros_transfer_schedulebtn"  disabled="disabled"   style="width: 100%;" type="button">
                                                <i class="fas fa-credit-card"></i> Schedule Now
                                                </button>
                                                <div align="center" style="color: #afafaf; font-size: 11px; font-weight: 500;">Powered
                                                    by EduMESS
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!--===Transfer Modal In Bulk=======-->
                    <!--==== save plan modal here==== -->
                    <div class="modal fade" id="prosloadsavingforsalryere" tabindex="-1" aria-labelledby="prosloadsavingforsalryereLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="border-radius: 20px;">
                            <div class="modal-body">
                                <div align="center">
                                <h5 class="mt-3"><i class="fas fa-save"></i> Saving Plan</h5>
                                </div>
                                <div class="form-group abba_local-forms prosloadothersave_input" >
                                <label>Saving Title<span style="color:orangered;">*</span> </label>
                                <input type="text"
                                    class="form-control form-control-sm account_name  prossavingplan_dessave onkeyup_plantitle_save pros_save_payement_content"
                                    placeholder="Enter Plan Name">
                                </div>
                                <div class="form-group abba_local-forms">
                                <label>Amount<span style="color:orangered;">*</span> </label>
                                <input type="number"
                                    class="form-control form-control-sm account_name pros_save_payement_content proscollectamountname"
                                    placeholder="Amount">
                                </div>
                                <div class="form-group abba_local-forms ">
                                <label>Date<span style="color:orangered;">*</span> </label>
                                <input type="date" class="form-control prosgetsave_end_date pros_save_payement_content pros_save_payement_contentonchange" >
                                </div>
                                <div class="row">
                                <div class="col-12" style="padding: 30px;">
                                    <button class="btn btn-primary pros_transfer_prossavebtn" data-id="save"    style="width: 100%;" type="button">
                                    <i class="fas fa-save"></i> Save Now
                                    </button>
                                    <div align="center" style="color: #afafaf; font-size: 11px; font-weight: 500;">Powered
                                        by EduMESS
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!--==== save plan modal here==== -->

                    
                    <!--==== save plan modal here==== -->
                    <div class="modal fade" id="prosloadlockforsalryere" tabindex="-1" aria-labelledby="prosloadlockforsalryereLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="border-radius: 20px;">
                            <div class="modal-body">
                                <div align="center">
                                <h5 class="mt-3"><i class="fas fa-lock"></i> Locking Plan</h5>
                                </div>
                                <div class="form-group abba_local-forms prosloadotherlock_input" >
                                <label>Saving Title<span style="color:orangered;">*</span> </label>
                                <input type="text"
                                    class="form-control form-control-sm account_name  proslockplan_deslock onkeyup_plantitle_save pros_lock_payement_content"
                                    placeholder="Enter Plan Name">
                                </div>
                                <div class="form-group abba_local-forms">
                                <label>Amount<span style="color:orangered;">*</span> </label>
                                <input type="number"
                                    class="form-control form-control-sm account_name pros_save_payement_content proscollectamountnamelock"
                                    placeholder="Amount">
                                </div>
                                <div class="form-group abba_local-forms ">
                                <label>Date<span style="color:orangered;">*</span> </label>
                                <input type="date" class="form-control prosgetlock_end_date pros_save_payement_content pros_save_payement_contentonchangelock" >
                                </div>
                                <div class="row">
                                <div class="col-12" style="padding: 30px;">
                                    <button class="btn btn-primary pros_transfer_proslockbtn" data-id="lock"   style="width: 100%;" type="button">
                                    <i class="fas fa-lock"></i> Save Now
                                    </button>
                                    <div align="center" style="color: #afafaf; font-size: 11px; font-weight: 500;">Powered
                                        by EduMESS
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!--==== save plan modal here==== -->

        

    </div>



    

          <!--==== Transfer Modal==== -->
          <div class="modal fade" id="printreceiptcontent-modal" tabindex="-1" aria-labelledby="printreceiptcontent-modalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content modal-md" style="border-radius: 20px;">
                    <div class="modal-body" id="prosloadreceiiptcontenthere"> 
                       

                        
                     </div>
               </div>
           </div>
           </div>
        <!--===Transfer Modal=======-->


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

    <!-- Wallet js -->
    <?php include('../../controller/js/app/wallet.php'); ?>

</body>

</html>