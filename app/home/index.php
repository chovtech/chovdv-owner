<?php
    include('../../controller/session/session-checker-owner.php');
    if ($DefaultLanguage == '') {
        include('../../lang/english.php');
    
    } else {

        
        include('../../lang/' . $DefaultLanguage . '.php');
    }
    mysqli_set_charset($link, 'utf8');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->

    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/adminImg/favicon.png">
    <title>
        <?php echo $portalindex_title_owner; ?> |
        <?php echo $fullname; ?>
    </title>


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
    
    
    
    <style>
    
        .countdown {
            display: flex;
            justify-content: center;
            gap: 25px;
            position: relative;
        }
        .box{
            width: 10vmin;
            height: 10vmin;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-evenly;
            position: relative;
            box-shadow: 15px 15px 30px #cacbcc;
            border-radius: 10px 10px 10px 10px;
        }
        .box:after{
            content: "";
            position: absolute;
            background-color: rgba(255,255,255,0.12);
            height: 100%;
            width: 50%;
            left: 0;
            border-radius: 10px 10px 10px 10px;
        }
        span.num{
            background-color: #f5f5f5;
            height: 100%;
            width: 100%;
            display: grid;
            place-items: center;
            font-weight: 600;
            font-size: 20px;
            border-radius: 10px 10px 0 0;
        }
        span.text{
            font-size: 10px;
            background-color: #007ffb;
            display: block;
            width: 100%;
            text-align: center;
            padding: 0.5em 0;
            font-weight: 400;
            color: #fff;
            border-radius: 0px 0px 10px 10px;
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
            
            
            <!-- ---=====Pros subscription count down sql==== -->
            <?php 
            
            
                    $prosselectschoolplanconetentnew = mysqli_query($link,"SELECT * FROM `institution` WHERE AgencyOrSchoolOwnerID='$UserID'");
                    $prosselectschoolplanconetentcntnew = mysqli_num_rows($prosselectschoolplanconetentnew);
                    
                    $prosselectschoolplanconetentcntrownew = mysqli_fetch_assoc($prosselectschoolplanconetentnew);
                    
                    $NoDaysToCountnew = $prosselectschoolplanconetentcntrownew['NoDaysToCount'];
                    $SubscriptionStatusnew = $prosselectschoolplanconetentcntrownew['SubscriptionStatus'];
                    
                    $StartCountDatenew = $prosselectschoolplanconetentcntrownew['StartCountDate'];
                    
                    
                    $currentdate = date('Y-m-d');

                    $startcountingdate = date("Y-m-d", strtotime("$StartCountDatenew + $NoDaysToCountnew day"));
                                    
                    if ($StartCountDatenew >= $currentdate) {
                        
                       
                        if($SubscriptionStatusnew == '0')
                        {
                            
                            
                            
                           $styleContent =   '';
                            
                            
                            
                        }else
                        {
                             $styleContent =   'style="border-radius: 14px;display:none;"';
                        }
                        
                        
                       
                        
                    } else {
                        
                       $styleContent =   'style="border-radius: 14px;display:none;"';
                    }
            ?>
            <!-- ---=====Pros subscription count down sql==== -->
            
                 
            
            
            
             <div class="row prosloadcountdowncontentcontent">
                    <input type="hidden" id="prosloadstartdate" value="<?php echo $currentdate; ?>">
                    <input type="hidden" id="prosloadenddate" value="<?php echo $startcountingdate; ?>"> 
                     <input type="hidden" id="prossubscriptionstatus" value="<?php echo $SubscriptionStatusnew; ?>">
                <div class="col-12">
                    <div class="card" id="prosloadcountdowncontent"  <?php echo $styleContent; ?>  >
                          <div class="card-body" >
                                  <button type="button" class="btn-close float-end prosclionhidetimmercontentbtn" data-bs-dismiss="modal" aria-label="Close"></button>
                                <h5 class="card-title">EDUMESS Subscription Alert</h5>
                                    <div class="row">
                                        <div class="col-md-4">
                                           <h6 class="card-subtitle" style="font-size:14px;">Hello, <b class="prosloadnamecountdown"><?php echo $PrimaryName; ?></b> <br> <span class="prosloadcoundes">your subscription plan with EDUMES Software is due <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#profeepaymentmodal">Click to pay</a></span></h6>
                                        </div>
    
                                              <input type="hidden" class="prosloadstartcoundown">
                                              <input type="hidden" class="prosloadendcoundown"> 
                                        <div  class="col-md-5">
    
                                                <div class="countdown pt-3">
                                                    <div class="box">
                                                        <span class="num" id="day-box">00</span>
                                                        <span class="text">D</span>
                                                    </div>
                                                    <div class="box">
                                                        <span class="num" id="hr-box">00</span>
                                                        <span class="text">H</span>
                                                    </div>
                                                    <div class="box">
                                                        <span class="num" id="min-box">00</span>
                                                        <span class="text">M</span>
                                                    </div>
                                                    <div class="box">
                                                        <span class="num" id="sec-box">00</span>
                                                        <span class="text">S</span>
                                                    </div>
                                                </div>
                                        </div>  
                                             
    
    
                                       
    
                                        <div  class="col-md-3">
    
                                        
                                            <div class="col-sm-12">
                                                <!--<a href="" style="font-size: 23px; font-weight: 500; text-decoration: none; color: #666666;">-->
                                                <!--    Fee: ₦<span  id="prosloadtotalamountchargefee"></span>-->
                                                <!--</a>-->
                                            </div>
                                       
                                                 
                                            <button type="button "
                                                    class="btn waves-effect waves-light  btn-rounded btn-danger  mt-2" data-bs-toggle="modal" data-bs-target="#profeepaymentmodal">
                                                    Pay Now
                                            </button><p></p>
    
                                        </div>
                                    </div>
                            </div>
                        </div>
                   </div>
            </div>
            <p></p>
            
            

            <div class="main-title">
                <span class="font-weight-bold">Hello <?php echo $PrimaryName; ?> </span>
                <br>
                <small style="font-size: 12px;">Welcome Back !!!</small>
            </div>

            <div id="hold_dashboard_data"></div>
            <div class="main-cards" style="margin-top: 10px;">

                <div class="row g-3">

                    <div class="col-sm-3 col-md-3">

                        <div class="topSecCards" style="height: 110px; background: #0066FF; ">

                            <div style="display: flex;">
                                <div>
                                    <h6 style="padding-left: 10px; padding-top: 10px; font-size: 13px; color: #fff;">
                                        Total Students</h6>

                                    <h6
                                        style="color: #fff; padding-left: 10px; padding-top: 10px;font-size: 15px; font-weight: 600;" id="get_total_students">
                                        </h6>

                                    <div style="color: #fff; padding-left: 10px; font-size: 10px;" id="abba_display_stud_increase">
                                        
                                    </div>
                                </div>
                                <div class="chartLight" style="margin-top: 53px; margin-left: 13px;">
                                    <img src="../../assets/images/adminImg/chart-white.png" style="width: 70px;" alt="">
                                </div>
                            </div>


                        </div>

                        <br>

                        <div class="row g-3">
                            <div class="col-sm-12">
                                <div class="topSecCards" style="padding-bottom: 10px;">
                                    <h6 style="padding: 30px 10px 5px 20px; font-weight: 600;">Analytics</h6>

                                    <div style="padding-top: 20px; padding-left: 15px;">

                                        <div class="row g-3">
                                            <div class="col-9">
                                                <small style="font-weight: 500; font-size: 12px;">Total Income This Term</small>
                                                <h6 style="color: #000000; font-weight: 600;" id="total_income"></h6>
                                            </div>
                                            <div class="col-3">
                                                <div
                                                    style="height: 40px; width: 40px; border-radius: 50%; background-color: rgb(206, 255, 255);">
                                                    <span style="font-size: 25px; padding-left: 8px; color: #2a7df8;">
                                                        <i class='bx bx-dollar-circle'></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 pt-2">
                                            <div class="col-9">
                                                <small style="font-weight: 500; font-size: 12px;">Total Expected Income</small>
                                                <h6 style="color: #000000; font-weight: 600;" id="total_expected_income"></h6>
                                            </div>
                                            <div class="col-3">
                                                <div
                                                    style="height: 40px; width: 40px; border-radius: 50%; background-color: rgb(206, 255, 255);">
                                                    <span style="font-size: 25px; padding-left: 8px;  color: #2a7df8;">
                                                        <i class='bx bx-sync'></i> </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 pt-2">
                                            <div class="col-9">
                                                <small style="font-weight: 500; font-size: 12px;">Total Debt</small>
                                                <h6 style="color: #000000; font-weight: 600;" id="total_dept"></h6>
                                            </div>
                                            <div class="col-3">
                                                <div
                                                    style="height: 40px; width: 40px; border-radius: 50%; background-color: rgb(206, 255, 255);">
                                                    <span style="font-size: 25px; padding-left: 8px; color: #2a7df8;">
                                                        <i class='bx bx-sync'></i> </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 pt-2">
                                            <div class="col-9">
                                                <small style="font-weight: 500; font-size: 12px;">Wallet Balance</small>
                                                <h6 style="color: #000000; font-weight: 600;" id="wallet_balance"></h6>
                                            </div>
                                            <div class="col-3">
                                                <div
                                                    style="height: 40px; width: 40px; border-radius: 50%; background-color: rgb(206, 255, 255);">
                                                    <span
                                                        style="font-size: 23px; font-weight: 600; padding-left: 10px; color: #2a7df8;">
                                                        % </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div style="margin-left: 10px; width: 90%; border: 1px solid grey; "></div>

                                    <div style="padding-top: 10px; padding-left: 20px;">
                                        <a href="<?php echo $defaultUrl;?>app/finance" style="font-weight: 500; font-size: 12px;">More Insights
                                            <i class='fa fa-chevron-right' style="font-size: 12px;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="row g-3">

                            <div class="col-sm-6">
                                <div class="topSecCards" style="height: 110px;">

                                    <div style="display: flex;">
                                        <div>
                                            <h6 style="padding-left: 10px; padding-top: 10px; font-size: 13px;">Students
                                                Owning</h6>

                                            <h6
                                                style="padding-left: 10px; padding-top: 10px; font-size: 15px; font-weight: 600;" id="student_owing">
                                            </h6>

                                            <div style="padding-left: 10px; font-size: 10px;" id="student_owing_percent">
                                                
                                            </div>
                                        </div>
                                        <div class="chartLight" style="margin-top: 53px; margin-left: 13px;">
                                            <img src="../../assets/images/adminImg/chart-orange.png" style="width: 70px;"
                                                alt="">
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="topSecCards" style="height: 110px;">

                                    <div style="display: flex;">
                                        <div>
                                            <h6 style="padding-left: 10px; padding-top: 10px; font-size: 13px;">Students
                                                Payed</h6>

                                            <h6
                                                style="padding-left: 10px; padding-top: 10px; font-size: 15; font-weight: 600;" id="student_payed">
                                                </h6>

                                            <div style="padding-left: 10px; font-size: 10px;" id="student_payed_percent">
                                               
                                            </div>
                                        </div>
                                        <div class="chartLight" style="margin-top: 48px; margin-left: 13px;">
                                            <img src="../../assets/images/adminImg/chart-blue.png" style="width: 70px;"
                                                alt="">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row g-3" style="padding-top: 16px;">
                            <div class="col-sm-12">
                                <div class="topSecCards coming_soon">

                                    <div class="row g-3">
                                        <div class="col-sm-5">
                                            <h6 style="padding: 10px 10px 5px 20px; font-weight: 600;">
                                                SMS Breakdown By Unit Used</h6>

                                            <div id="gauge-chart" style="padding-top: 100px; width: 100%;"></div>

                                        </div>
                                        <div class="col-sm-7" style="border-left: 1px solid #9c9a9a;">

                                            <div style="padding-right: 10px;">
                                                <table class="table" style="font-size: 12px; ">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="font-weight: 700;">All</th>
                                                            <th scope="col" style="color: #666666; font-weight: 700;">
                                                                SMS</th>
                                                            <th scope="col" style="color: #666666; font-weight: 700;">
                                                                Email</th>
                                                        </tr>

                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Student</th>
                                                            <td>Fees Payment </td>
                                                            <td>3d ago</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Parent</th>
                                                            <td>Fees Payment</td>
                                                            <td>4d ago</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Staff</th>
                                                            <td>Recruitment Notice</td>
                                                            <td>3m ago</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Accountant</th>
                                                            <td>Acceptances of Remita</td>
                                                            <td>5m ago</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Teacher</th>
                                                            <td>Submission of Result</td>
                                                            <td>1y ago</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 col-md-3">
                        <div class="topSecCards">
                            <!-- Calender -->
                            <div class="twobase">
                                <div class="twocentering">
                                    <div class="twocalender">
                                        <div class="twoheader">
                                            <button type="button" class="twonav" id="twoprevButton">
                                                <i class='bx bx-left-arrow-alt' style="font-size: 20px;"></i></button>
                                            <button class="twoheaderName" id="twoheaderName"></button>
                                            <button type="button" class="twonav" id="twonextButton">
                                                <i class='bx bx-right-arrow-alt' style="font-size: 20px;"></i>
                                            </button>
                                        </div>
                                        <div class="twocontent">
                                            <div class="twodayNames" id="twodayNames"></div>
                                            <div class="twodayDates" id="twodayDates"></div>
                                            <div class="twomonthSection twoselect" id="twomonthSection"></div>
                                            <div class="twoyearSection twoselect" id="twoyearSection"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Calender -->

                            <br></br><div class="" style="padding: 30px 10px 10px 10px;">
                                <div class="">
                                    
                                    <div class="prosloadcalendforadmin"></div>
    
                                    <div align="right">
                                        <a href="<?php echo $defaultUrl;?>app/calender" style="font-weight: 500; font-size: 12px;">View More.. 
                                            <i class='fa fa-chevron-right' style="font-size: 12px;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <div class="main-title" style="margin-top: 30px;">
                <span class="font-weight-bold" style="font-size:18px;">Performance Overview </span>
            </div>


            <div class="main-cards" style="margin-top: 10px;">

                <div class="row g-4">

                    <div class="col-sm-6 col-md-6">

                        <div class="topSecCards" style="padding: 20px;">

                            <h6 style="padding: 5px 10px 5px 0px; font-weight: 600;">Top Performing Students</h6>

                            <div class="row g-3">

                                <div class="col-8">
                                    <div style="display: flex; padding-top: 20px;" id="best_student">

                                    </div>
                                </div>

                                <div class="col-2">
                                    <div style="margin-top: 20px;" id="abba_student_average">
                                        
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div style="margin-top: 20px;">
                                        <span style="font-size: 22px;"><i class='bx bx-envelope'></i></span>
                                        <span style="font-size: 22px; margin-left: 10px;"><i
                                                class='bx bx-dots-horizontal-rounded'></i></span>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="col-sm-6 col-md-6">

                        <div class="topSecCards coming_soon" style="padding: 20px;">

                            <h6 style="padding: 5px 10px 5px 0px; font-weight: 700;">Top Performing Staff</h6>

                            <div class="row g-3">

                                <div class="col-8">
                                    <div style="display: flex; padding-top: 20px;">

                                        <div style="margin-top: -10px;">
                                            <img src="../../assets/images/adminImg/profile-1.jpg"
                                                style="height: 50px; width: 50px; border-radius: 100%;" alt="">
                                        </div>
                                        <div style="margin-left: 10px;">
                                            <span style="font-weight: 600; color: #292929;">Chima Lawrence</span>
                                            <br>
                                            <!-- <small style="color: #292929;">SS 3B</small> -->
                                        </div>

                                    </div>
                                </div>

                                <div class="col-2">
                                    <div style="margin-top: 20px;">
                                        <h6 style="font-weight: 700; color: #292929;">4,234</h6>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div style="margin-top: 20px;">
                                        <span style="font-size: 22px;"><i class='bx bx-envelope'></i></span>
                                        <span style="font-size: 22px; margin-left: 10px;"><i
                                                class='bx bx-dots-horizontal-rounded'></i></span>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!--<div class="main-cards" style="margin-top: 25px;">-->

            <!--    <div class="row g-3">-->

            <!--        <div class="col-sm-4 col-md-4">-->

            <!--            <div class="topSecCards" style="padding: 20px;">-->

            <!--                <h6 style="padding: 5px 10px 5px 0px; font-weight: 700;">Students Attendance</h6>-->

            <!--                <div id="attendance-chart" style="width: 50px; padding-top: 80px;"></div>-->

            <!--                <div style="margin-left: 10px; margin-top: 30px; width: 90%; border: 1px solid grey; ">-->
            <!--                </div>-->

            <!--                <div style="padding-top: 30px; padding-bottom: 17px; padding-left: 20px;">-->
            <!--                    <a href="" style="font-weight: 600; font-size: 14px;">More Insights-->
            <!--                        <i class='fa fa-chevron-right' style="font-size: 13px;"></i>-->
            <!--                    </a>-->
            <!--                </div>-->
            <!--            </div>-->

            <!--        </div>-->

            <!--        <div class="col-sm-8 col-md-8 topSecCards">-->

            <!--            <div class="row g-3">-->

            <!--                <div class="col-sm-4">-->
            <!--                    <div>-->
            <!--                        <h6 style="padding: 20px 10px 20px 10px; font-weight: 700;">Quiz</h6>-->

            <!--                        <div style="padding: 50px 10px 20px 10px;">-->

            <!--                            <table class="table table-borderless">-->
            <!--                                <thead class="table-secondary"-->
            <!--                                    style="font-weight: bolder; font-size: 14px; color: #292929;">-->
            <!--                                    <tr>-->
            <!--                                        <th scope="col">CLASS</th>-->
            <!--                                        <th scope="col">ATT.</th>-->
            <!--                                        <th scope="col"> </th>-->
            <!--                                    </tr>-->

            <!--                                </thead>-->
            <!--                                <tbody>-->
            <!--                                    <tr>-->
            <!--                                        <th scope="row">SS 3B</th>-->
            <!--                                        <td>25 </td>-->
            <!--                                        <td>-->
            <!--                                            <span-->
            <!--                                                style="color: #9c9a9a; font-weight: 800; font-size: 12px;">49.2%</span>-->
            <!--                                            <div class="progress" style="height: 8px;">-->
            <!--                                                <div class="progress-bar" role="progressbar"-->
            <!--                                                    style="width: 49.2%;" aria-valuenow="49.2%"-->
            <!--                                                    aria-valuemin="0" aria-valuemax="100"></div>-->
            <!--                                            </div>-->
            <!--                                        </td>-->
            <!--                                    </tr>-->
            <!--                                    <tr>-->
            <!--                                        <th scope="row">SS 2A</th>-->
            <!--                                        <td>15</td>-->
            <!--                                        <td>-->
            <!--                                            <span-->
            <!--                                                style="color: #9c9a9a; font-weight: 800; font-size: 12px;">49.2%</span>-->
            <!--                                            <div class="progress" style="height: 8px;">-->
            <!--                                                <div class="progress-bar" role="progressbar"-->
            <!--                                                    style="width: 49.2%;" aria-valuenow="49.2%"-->
            <!--                                                    aria-valuemin="0" aria-valuemax="100"></div>-->
            <!--                                            </div>-->
            <!--                                        </td>-->
            <!--                                    </tr>-->
            <!--                                    <tr>-->
            <!--                                        <th scope="row">Pri 1 Gold</th>-->
            <!--                                        <td>35</td>-->
            <!--                                        <td>-->
            <!--                                            <span-->
            <!--                                                style="color: #9c9a9a; font-weight: 800; font-size: 12px;">9.3%</span>-->
            <!--                                            <div class="progress" style="height: 8px;">-->
            <!--                                                <div class="progress-bar" role="progressbar"-->
            <!--                                                    style="width: 9.3%" aria-valuenow="9.3%"-->
            <!--                                                    aria-valuemin="0" aria-valuemax="100"></div>-->
            <!--                                            </div>-->
            <!--                                        </td>-->
            <!--                                    </tr>-->
            <!--                                    <tr>-->
            <!--                                        <th scope="row">Pri 1 Gold</th>-->
            <!--                                        <td>35</td>-->
            <!--                                        <td>-->
            <!--                                            <span-->
            <!--                                                style="color: #9c9a9a; font-weight: 800; font-size: 12px;">37.2%</span>-->
            <!--                                            <div class="progress" style="height: 8px;">-->
            <!--                                                <div class="progress-bar" role="progressbar"-->
            <!--                                                    style="width: 37.2%" aria-valuenow="37.2%"-->
            <!--                                                    aria-valuemin="0" aria-valuemax="100"></div>-->
            <!--                                            </div>-->
            <!--                                        </td>-->
            <!--                                    </tr>-->
            <!--                                    <tr>-->
            <!--                                        <th scope="row">Pri 1 Gold</th>-->
            <!--                                        <td>35</td>-->
            <!--                                        <td>-->
            <!--                                            <span-->
            <!--                                                style="color: #9c9a9a; font-weight: 800; font-size: 12px;">49.2%</span>-->
            <!--                                            <div class="progress" style="height: 8px;">-->
            <!--                                                <div class="progress-bar" role="progressbar"-->
            <!--                                                    style="width: 49.2%;" aria-valuenow="49.2%"-->
            <!--                                                    aria-valuemin="0" aria-valuemax="100"></div>-->
            <!--                                            </div>-->
            <!--                                        </td>-->
            <!--                                    </tr>-->
            <!--                                    <tr>-->
            <!--                                        <th scope="row">Pri 1 Gold</th>-->
            <!--                                        <td>35</td>-->
            <!--                                        <td>-->
            <!--                                            <span-->
            <!--                                                style="color: #9c9a9a; font-weight: 800; font-size: 12px;">46.2%</span>-->
            <!--                                            <div class="progress" style="height: 8px;">-->
            <!--                                                <div class="progress-bar" role="progressbar"-->
            <!--                                                    style="width: 46.2%;" aria-valuenow="46.2%"-->
            <!--                                                    aria-valuemin="0" aria-valuemax="100"></div>-->
            <!--                                            </div>-->
            <!--                                        </td>-->
            <!--                                    </tr>-->


            <!--                                </tbody>-->
            <!--                            </table>-->

            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->

            <!--                <div class="col-sm-4">-->

            <!--                    <h6 style="padding: 20px 10px 0px 10px; font-weight: 700;">Overall Performance</h6>-->

            <!--                    <div style="margin-top: 170px;">-->
            <!--                        <div id="performance-chart"></div>-->
            <!--                    </div>-->
            <!--                </div>-->

            <!--                <div class="col-sm-4">-->
            <!--                    <div>-->

            <!--                        <div style="padding: 110px 10px 20px 10px;">-->

            <!--                            <table class="table" style="font-size: 11px;">-->
            <!--                                <thead style="font-weight: bolder; color: gray">-->
            <!--                                    <tr>-->
            <!--                                        <th scope="col" style="font-size: 14px;">Subject</th>-->
            <!--                                        <th scope="col" style="font-size: 14px;">Quiz</th>-->
            <!--                                        <th scope="col" style="font-size: 14px;">Class</th>-->
            <!--                                    </tr>-->

            <!--                                </thead>-->
            <!--                                <tbody>-->
            <!--                                    <tr>-->
            <!--                                        <th scope="row">Mathes</th>-->
            <!--                                        <td>Class Work </td>-->
            <!--                                        <td>Pri 3 Gold</td>-->
            <!--                                    </tr>-->
            <!--                                    <tr>-->
            <!--                                        <th scope="row">English Lan.</th>-->
            <!--                                        <td>Test</td>-->
            <!--                                        <td>Pri 4 Pink</td>-->
            <!--                                    </tr>-->
            <!--                                    <tr>-->
            <!--                                        <th scope="row">Computer Sci.</th>-->
            <!--                                        <td>Assignment</td>-->
            <!--                                        <td>Pri 2 Pink</td>-->
            <!--                                    </tr>-->
            <!--                                    <tr>-->
            <!--                                        <th scope="row">Physics</th>-->
            <!--                                        <td>35</td>-->
            <!--                                        <td>SS3A</td>-->
            <!--                                    </tr>-->

            <!--                                    <tr>-->
            <!--                                        <th scope="row">Government</th>-->
            <!--                                        <td>Test</td>-->
            <!--                                        <td>SS1B</td>-->
            <!--                                    </tr>-->


            <!--                                </tbody>-->
            <!--                            </table>-->

            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->

            <!--            </div>-->

            <!--        </div>-->

            <!--    </div>-->

            <!--</div>-->

            <!--<div class="main-cards" style="margin-top: 25px;">-->

            <!--    <div class="row g-3">-->

            <!--        <div class="col-sm-8 col-md-8">-->

            <!--            <div class="topSecCardsPrimary" style="padding-bottom: 10px;">-->
            <!--                <div class="row">-->
            <!--                    <div class="col-sm-7 col-md-7">-->
            <!--                        <h3 style="padding: 40px 0px 0px 20px; font-weight: 700; color: white;">-->
            <!--                            Download the app to enjoy <br> simple home payment-->
            <!--                        </h3>-->

            <!--                        <div style="padding: 65px 0px 0px 30px">-->
            <!--                            <span>-->
            <!--                                <img src="../../assets/images/adminImg/app_store.png" style="width: 30%;"-->
            <!--                                    alt="">-->
            <!--                                <img src="../../assets/images/adminImg/play_store.png"-->
            <!--                                    style="width: 30%; margin-left: 10px;" alt="">-->
            <!--                            </span>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                    <div class="col-sm-5 col-md-5">-->
            <!--                        <div style="padding: 20px 0px 0px 0px;">-->
            <!--                            <span>-->
            <!--                                <img src="../../assets/images/adminImg/mobilePh.png" style="width: 100%;"-->
            <!--                                    alt="">-->
            <!--                            </span>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->

            <!--        </div>-->

            <!--        <div class="col-sm-4 col-md-4">-->

            <!--            <div class="topSecCards">-->

            <!--                <h6 style="padding: 15px 10px 5px 10px; font-weight: 700; color: #292929;">Upcoming-->
            <!--                    Birthdays</h6>-->

            <!--                <div style="padding: 10px;">-->
            <!--                    <table class="table" style="font-size: 13px;">-->
            <!--                        <thead style="font-weight: bolder; color: gray">-->
            <!--                            <tr>-->
            <!--                                <th scope="col" style="font-size: 12px;">Profile</th>-->
            <!--                                <th scope="col" style="font-size: 12px;">Type</th>-->
            <!--                                <th scope="col" style="font-size: 12px;">Year</th>-->
            <!--                            </tr>-->

            <!--                        </thead>-->
            <!--                        <tbody id="upcoming_birthdays">-->
                                        
            <!--                        </tbody>-->
            <!--                    </table>-->
            <!--                    <a href="" style="font-weight: 600; font-size: 13px; text-decoration: none;">More-->
            <!--                        Insights-->
            <!--                        <i class='fa fa-chevron-right' style="font-size: 12px;"></i>-->
            <!--                    </a>-->
            <!--                </div>-->
            <!--            </div>-->

            <!--        </div>-->

            <!--    </div>-->

            <!--</div>-->

            <div class="main-cards" style="margin-top: 25px;">

                <div class="row g-3">
                    <div class="col-sm-6 col-md-6">
                        <div class="topSecCards coming_soon" style="padding-bottom: 10px;">

                            <div style="width: 100px; float: right; margin-right: 10px; margin-top: 20px;">
                                <select class="form-select" style="font-size: 12px;"
                                    aria-label="Default select example">
                                    <option selected>Last 12 Month</option>
                                </select>
                            </div>

                            <div>
                                <h6 style="font-weight: 700; color: #292929; margin-left: 20px; padding-top: 20px;">
                                    Total Stock</h6>
                            </div>

                            <div id="area-chart"></div>

                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="topSecCards" style="padding-bottom: 10px;">


                            <div id="bar-chart"></div>

                        </div>
                    </div>
                </div>
            </div>

        </main>


    </div>
    
    
    
    
    
        <!-- SUBSCRIPTION MODAL CONTENT HERE -->
        <div class="modal fade" id="profeepaymentmodal" tabindex="-1" aria-labelledby="profeepaymentmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDUMES Subscription Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

                    <div class="modal-body">
                        <div class="container">
                            <div class="row m-0">
                                <div class="col-md-7 col-12">
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <div class="row box-right prosloadcontenttypeinstant">
                                                
                                                    <div class="col-md-8 ps-0 ">
                                                         <p class="ps-3 textmuted fw-bold h6 mb-0">TOTAL AMOUNT</p>
                                                          <p class="h1 fw-bold d-flex">₦ <span class="textmuted" id="displayamount"></span><small style="color:red;font-size:15px;margin-top:20px;font-weight:bold;" id="discountamountid"></small></p> 
                                                          <p id="discountedamount" class="textmuted fw-bold h4" style="text-decoration: line-through;color:lightgrey;"></p>
                                             
                                                        </div> 
                                             
                                                    </div>
                            
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12 ps-md-5 p-0 ">
                                    <div class="h8">

                                    <div class="table-responsive prosloadfeecontent">
                                        
                                    </div>
                                    <div class="form">

                                        <div class="row">
                                            
                                            <div class="col-12">
                                                
                                                
                                                 <div class="h8"> 
                                                                                         <?php
                                                                                         
                                                                                             
                                                                                                  $sqlsecsession_startcount = mysqli_query($link, "SELECT * FROM `session` WHERE `sessionStatus`='1'");
                                                                                                  $querysecsession_startcount = mysqli_fetch_assoc($sqlsecsession_startcount);
                                                                                                  $cntsecsession_startcount = mysqli_num_rows($sqlsecsession_startcount);
                                                                        
                                                                                                 $session_startcount = $querysecsession_startcount['sessionName'];
                                                                                                 $sessionID_startcount = $querysecsession_startcount['sessionID'];
                                                                                                 
                                                                                                   $sqlsectermorsemesterdebt = mysqli_query($link, "SELECT * FROM `termorsemester` WHERE `status`='1'");
                                                                                                    $querysectermorsemesterdebt = mysqli_fetch_assoc($sqlsectermorsemesterdebt);
                                                                                                    $cntsectermorsemesterdebt = mysqli_num_rows($sqlsectermorsemesterdebt);
                                                                                
                                                                                                    $termorsemesterdebt = $querysectermorsemesterdebt['TermOrSemesterName'];
                                                                                                                                                                                
                                                                                                     $getinstitutionforsub_genearal = "SELECT * FROM `institution` WHERE AgencyOrSchoolOwnerID='$UserID' AND NoDaysToCount!='0' AND SubscriptionStatus='0' ORDER BY InstitutionGeneralName ASC";
                                                                                                     $getinstitutionforsub_res_genearal = mysqli_query($link, $getinstitutionforsub_genearal);
                                                                                                     $getinstitutionforsub_res_cnt_genearal = mysqli_num_rows($getinstitutionforsub_res_genearal);
                                                                                                     $getinstitutionforsub_res_cnt_row_genearal = mysqli_fetch_assoc($getinstitutionforsub_res_genearal);
                                                                                                 
                                                                                                       $InstitutionIDgeneral = $getinstitutionforsub_res_cnt_row_genearal['InstitutionID'];
                                                                                                       $planid = $getinstitutionforsub_res_cnt_row_genearal['ActualPlan'];
                                                                                                       
                                                                                                       $planamount_set = $getinstitutionforsub_res_cnt_row_genearal['PlanAmount'];
                                                                                                       $planpercentage = $getinstitutionforsub_res_cnt_row_genearal['PlanPercentage'];
                                                                                                   
                                                                                                 


                                                                                                 $getinstitutionforsub_pay = "SELECT * FROM `campus` WHERE InstitutionID='$InstitutionIDgeneral' ORDER BY CampusName ASC";
                                                                                                 $getinstitutionforsub_res_pay = mysqli_query($link, $getinstitutionforsub_pay);
                                                                                                 $getinstitutionforsub_res_cnt_pay = mysqli_num_rows($getinstitutionforsub_res_pay);
                                                                                                 $getinstitutionforsub_res_cnt_row_pay = mysqli_fetch_assoc($getinstitutionforsub_res_pay);

                                                                                         if ($getinstitutionforsub_res_cnt_pay > 0) {
                                                                                             
                                                                                             

                                                                                             echo '<div class="table-responsive">
                                                                                            <table class="table table-hover">
                                                                                                    <thead class="textmuted">
                                                                                                        <tr><th  class="textmuted">';
                                                                                                        
                                                                                                        
                                                                                             if ($getinstitutionforsub_res_cnt_pay == '1') {

                                                                                             } else {
                                                                                                 
                                                                                                 echo '
                                                                                                               <input type="checkbox" id="selalinstitutionamount" name="allinstitution" class="filled-in chk-col-blue">
                                                                                                                 <label for="selalinstitutionamount">All</label>
                                                                                                            ';
                                                                                             }
                                                                                            echo '</th>';
                                                                                             echo '<th  class="textmuted">Institution</th>
                                                                                                            <th  class="textmuted">Plan</th>
                                                                                                            <th  class="textmuted">Amount</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>';



                                                                                             do {
                                                                                                 
                                                                                                 
                                                                                                 
                                                                                                 $institutionid = $getinstitutionforsub_res_cnt_row_pay['InstitutionID'];
                                                                                                 $newgottentCampusID = $getinstitutionforsub_res_cnt_row_pay['CampusID'];
                                                                                               
                                                                                               
                                                                                                 




                                                                                                 $verifyplan = "SELECT * FROM `plantransaction` WHERE
                                                                                                  InstitutionID='$institutionid' AND SessionName='$session_startcount' AND TermOrSemesterName='$termorsemesterdebt' AND PlanID='$planid'";
                                                                                                 $verifyplan_res = mysqli_query($link, $verifyplan);
                                                                                                 $verifyplan_rescnt = mysqli_num_rows($verifyplan_res);

                                                                                                 if ($verifyplan_rescnt > 0) {

                                                                                                 } else {
                                                                                                     

                                                                                                     $select_deactivated_student = mysqli_query($link, "SELECT DISTINCT(deactivateuser.UserID) FROM `deactivateuser` INNER JOIN classordepartmentstudentallocation ON deactivateuser.InstitutionIDOrCampusID = classordepartmentstudentallocation.CampusID 
                                                                                                     WHERE deactivateuser.sessionName='$session_startcount' AND classordepartmentstudentallocation.CampusID ='$newgottentCampusID'
                                                                                                      AND deactivateuser.UserType='student'");
                                                                                                      
                                                                                                     $select_deactivated_student_cnt = mysqli_num_rows($select_deactivated_student);
                                                                                                     $select_deactivated_student_row = mysqli_fetch_assoc($select_deactivated_student);


                                                                                                     do {
                                                                                                         
                                                                                                          $studentdeactivated = $select_deactivated_student_row['UserID'];

                                                                                                         $select_amount_bystudent = mysqli_query($link, "SELECT * FROM `student` INNER JOIN classordepartmentstudentallocation ON 
                                                                                                         student.StudentID = classordepartmentstudentallocation.StudentID WHERE student.CampusID='$newgottentCampusID' 
                                                                                                         AND classordepartmentstudentallocation.Session='$session_startcount' AND 
                                                                                                         classordepartmentstudentallocation.StudentID !='$studentdeactivated'");
                                                                                                          $select_amount_bystudent_cnt = mysqli_num_rows($select_amount_bystudent);
                                                                                                         $select_amount_bystudent_cnt_row = mysqli_fetch_assoc($select_amount_bystudent);


                                                                                                        
                                                                                                        //  $getinstitutionid = $select_amount_bystudent_cnt_row['InstitutionID'];




                                                                                                         $select_institutionname = mysqli_query($link, "SELECT * FROM `campus` WHERE CampusID='$newgottentCampusID'");
                                                                                                         $select_institutionname_cnt = mysqli_num_rows($select_institutionname);
                                                                                                         $select_institutionname_cnt_rows = mysqli_fetch_assoc($select_institutionname);

                                                                                                         $institutionname = $select_institutionname_cnt_rows['CampusName'];
                                                                                                         


                                                                                                         $check_num_student_forpayment = mysqli_query($link, "SELECT * FROM `plantransaction` WHERE InstitutionID='$institutionid' AND SessionName='$session_startcount' AND TermOrSemesterName='$termorsemesterdebt'");
                                                                                                          $check_num_student_forpayment_cnt = mysqli_num_rows($check_num_student_forpayment);
                                                                                                         $check_num_student_forpayment_row = mysqli_fetch_assoc($check_num_student_forpayment);

                                                                                                         $getplanamount = mysqli_query($link, "SELECT * FROM `edumesplan` WHERE PlanID='$planid'");
                                                                                                         $getplanamount_cnt = mysqli_num_rows($getplanamount);
                                                                                                         $getplanamount_cnt_row = mysqli_fetch_assoc($getplanamount);
                                                                                                         

                                                                                                         $planamount = $getplanamount_cnt_row['Amount'];
                                                                                                         $planname = $getplanamount_cnt_row['PlanName'];


                                                                                                         if ($check_num_student_forpayment_cnt > 0) {
                                                                                                             
                                                                                                             
                                                                                                             
                                                                                                             
                                                                                                            
                                                                                                             $discountedamout = $check_num_student_forpayment_row['DiscountedAmount'];
                                                                                                             $actualamount = $check_num_student_forpayment_row['ActualAmount'];

                                                                                                             $totalpaidfee = ($actualamount + $discountedamout);
                                                                                                             $totalchargefee = ($select_amount_bystudent_cnt * $planamount_set);

                                                                                                             $totalamount = ($totalchargefee - $totalpaidfee);
                                                                                                             

                                                                                                         } else {
                                                                                                             
                                                                                                             
                                                                                                             
                                                                                                              $select_amount_bystudent_cnt;
                                                                                                              $totalamount = ($select_amount_bystudent_cnt * $planamount_set);
                                                                                                             
                                                                                                         }



                                                                                                     } while ($select_deactivated_student_row = mysqli_fetch_assoc($select_deactivated_student));


                                                                                                     echo '<tr>';
                                                                                                     echo '<td>
                                                                                                                                    <input type="checkbox" id="getinstitution' . $getinstitutionid . '" value="' . $getinstitutionid . '" data-plan="' . $planid . '" data-id="' . $totalamount . '"  data-percent="' . $planpercentage . '" name="getinstitutionsingle" class="filled-in chk-col-blue getinstitutionsingle">
                                                                                                                                    <label for="getinstitution' . $getinstitutionid . '"></label>
                                                                                                                             </td>';
                                                                                                     echo '<td>' . $institutionname . '</td>';
                                                                                                     echo '<td>' . $planname . '</td>';
                                                                                                     echo '<td> ₦' . number_format($totalamount) . '</td>';
                                                                                                     echo '</tr>';

                                                                                                 }
                                                                                             } while ($getinstitutionforsub_res_cnt_row_pay = mysqli_fetch_assoc($getinstitutionforsub_res_pay));
                                                                                             echo '</tbody>
                                                                                                </table>';

                                                                                         }

                                                                                         ?>
                                                                                        </div>  
                                                                                        
                                                                                        
                                                                                    
                                                 <div class="form"> 
                                                    <div class="row">
                                                            <div class="col-12">
                                                                          <center>
                                                                            <h4 class="p-blue h8 fw-bold  " style="font-weight:bold;">PAYMENT TYPE</h4>
                                                                             <span class="textmuted h8" style="font-weight:bold;">Pay Annually Receive a massive Discount of <?php echo $planpercentage . '%'; ?></span> 
                                                                        </center><br> 
                                                           </div>    
                                              
                                                              <?php
                                                              

                                                                  $getterm_curentterm = mysqli_query($link, "SELECT * FROM `termorsemester` WHERE `status`='1'");
                                                                  $gettermid_row_curentterm = mysqli_fetch_assoc($getterm_curentterm);
                                                                  $getterm_cnt_curentterm = mysqli_num_rows($getterm_curentterm);
                                                                  
                                                                  $current_term = $gettermid_row_curentterm['TermOrSemesterName'];


                                                                  if ($current_term == 'First') {
                                                                      $disabled = '';
                                                                  } elseif ($current_term == 'Second') {
                                                                      $disabled = 'disabled';
                                                                  } elseif ($current_term == 'Third') {
                                                                      $disabled = 'disabled';
                                                                  }

                                                                  ?>


                                                              <div class="col-2"> </div>
                                                                <div class="col-4"> 
                                                                     <input class="radioBtnClass  paymentmethod" <?php echo $disabled; ?>  style="border-radius:50%;width: 16px; height: 16px;color:red;" name="paymenttype" type="radio" id="payanuallyid" value = "Annually"/> <label for="payanuallyid">Annually</label>
                                                                </div> 
                                                                
                                                                <div class="col-4"> 
                                                                <input class="radioBtnClass  paymentmethod"  style="border-radius:50%;width: 16px; height: 16px;color:red;"   name="paymenttype" type="radio" id="paytermlyid" value = "Termly"/> <label style="border-radius:50%;width: 16px; height: 16px;" for="paytermlyid">Termly</label> 
                                                            </div> 
                                                            <div class="col-2"> </div>
                                                            <!-- <p class="p-blue h8 fw-bold mb-3">MORE PAYMENT METHODS</p>  -->
                                                    </div> <br> 
                                       
                                                </div>  
                                                                
                                                                        
                                                
                                                
                                                    
                                            </div>
                                    
                                        </div>
                                        <br>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <button class="btn btn-danger btn-lg prosmakepaymentbtn" onClick="makePayment()" style="width:100%;"> PAY ₦ <span id="displaybtnamount">0</span>
                            <span class="ms-3 fa fa-arrow-right"></span>
                        </button>
                        <input type="hidden" id="inputamoutval">
                    </div>

                    <div class="modal-footer">
                            
                    </div>
            </div>
        </div>
        </div>
     <!-- SUBSCRIPTION MODAL CONTENT HERE -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.40.0/apexcharts.min.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    
      <!-- notification js -->
    <script src="../../assets/plugins/notify/wnoty.js"></script>


    <script src="../../js/admin_js/adminScript.js"></script>
    <?php include("../../js/app_js/dashboardjs.php"); ?>

        <!-- current page js -->
        <?php include('../../js/current_page.php'); ?>

    <!-- header js -->
    <?php include('../../controller/js/app/header.php'); ?>
    <?php include('../../controller/js/app/edumesssubscription.php'); ?>
    <!-- get dashboard contents -->
    <script src="../../controller/js/app/dashboard-data.js"></script>
    
    
    
    
 

</body>

</html>