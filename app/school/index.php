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

    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/users/favicon.png">
    <title>
        <?php echo 'Set Up'; ?> |
        <?php echo $fullname; ?>
    </title>

    <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">
    <script src="../../assets/plugins/jquery/code.jquery.com_jquery-3.5.1.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="../../assets/plugins/notify/wnoty.css" rel="stylesheet">



    <!-- style sheet -->
    <link rel="stylesheet" href="../../css/app_css/appStyle.css">
    <link rel="stylesheet" href="../../css/app_css/onboardingstyle.css">
    <!--=== style sheet==-->
    <!-- image Croppie -->
    <link rel="stylesheet" href="../../assets/plugins/Croppie/croppie.css"></link>

    <!--===numbercountry code==-->

      <link href="../../assets/plugins/numberformat/intlTelInput.min.css"
		rel="stylesheet" />
	<script src="../../assets/plugins/numberformat/intlTelInput.min.js"></script>
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script> -->
    <!--===numbercountry code==-->

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

            <div class="container-fluid">

                <!-- =======row====== -->
                <div class="row">
                    <div class="col-sm-1"></div>

                    <div class="col-sm-10">

                        

                        <!-- pros set up modal-->
                        <div class="modal fade" id="setupmodal" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="setupmodallabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content" style="border-radius: 5px; ">

                                    <div class="modal-header" style="border:none;">
                                        
                                    </div>

                                    <div class="modal-body" style="">
                                        <!-- =======default language start here====== -->
                                        <div id="changelang"
                                            style="background-color:white;display:none;border-radius:21px;padding-bottom:30px;">
                
                                            <center>
                                                <img src="../../assets/images/users/aiwelcome.png" style="width:20%;">
                                            </center>
                
                                            <center>
                                                <h4><b>
                                                        <?php echo $portal_prelanguagequestion; ?>
                                                    </b></h4>
                                            </center>
                
                                            <center>
                                                <p class="" style="color:#5A5A5A;font-size:15px;margin-left:5%;">
                                                    <?php echo $portal_hi; ?>
                                                    <b>
                                                        <?php echo $PrimaryName; ?>
                                                    </b>,
                                                    <?php echo $portal_sellang_info; ?>
                                                    <br>
                                                    <?php echo $portal_sellang_des; ?>
                                                </p>
                                            </center>
                
                
                                            <div class="card-body">
                
                                                <div class="row" align="center">
                                                    <div class="col-sm-4">
                                                        <div class="centerlangues">
                                                            <input type="radio" class="defaultlang english with-gap englishclick"
                                                                value="english" id="radio-btn" name="radio-btn">
                                                            <label style="margin-left:15px;font-size:13px;"
                                                                for="radio-btn">English</label>
                                                            <!-- <span style="float:right;margin-right:5%;"><i
                                                                        class="flag-icon flag-icon-us"></i></span> -->
                                                        </div>
                                                    </div>
                
                                                    <div class="col-sm-4">
                
                                                        <div class="centerlangues bg-light">
                                                            <input type="radio" disabled class="defaultlang french with-gap frenchclick"
                                                                value="french" id="radio-btnone" name="radio-btn"
                                                                style="cursor:pointer;">
                                                            <label style="margin-left:15px;font-size:13px;"
                                                                for="radio-btnone">français <small style="color: #888;">(coming soon. Stay tuned!)</small></label>
                
                                                            <!-- <span style="float:right;margin-right:5%;"><i
                                                                        class="flag-icon flag-icon-fr"></i></span> -->
                                                        </div>
                
                                                    </div>
                
                                                    <div class="col-sm-4">
                
                                                        <div class="centerlangues bg-light">
                
                                                            <input type="radio" disabled class="defaultlang spanish with-gap spanishclick"
                                                                value="spanish" id="spanish" name="radio-btn" style="cursor:pointer;">
                                                            <label style="margin-left:15px;font-size:13px;"
                                                                for="spanish">español <small style="color: #888;">(coming soon. Stay tuned!)</small></label>
                
                                                            <!-- <span style="float:right;margin-right:5%;"><i
                                                                        class="flag-icon flag-icon-es"></i></span> -->
                                                        </div>
                                                    </div>
                
                                                    <div class="col-sm-4">
                
                                                        <div class="centerlangues bg-light">
                
                                                            <input type="radio" disabled  class="defaultlang chinese with-gap chineseclick"
                                                                value="chinese" id="chinese" name="radio-btn" style="cursor:pointer;">
                                                            <label style="margin-left:15px;font-size:13px;" for="chinese">中文 <small style="color: #888;"> (coming soon. Stay tuned!)</small></label>
                                                            <!-- <span style="float:right;margin-right:5%;"><i
                                                                        class="flag-icon flag-icon-ch"></i></span> -->
                                                        </div>
                
                                                    </div>
                
                                                    <div class="col-sm-4">
                
                                                        <div class="centerlangues bg-light">
                
                                                            <input type="radio" disabled class="defaultlang arabic with-gap arabicclick"
                                                                value="arabic" id="arabic" name="radio-btn" style="cursor:pointer;">
                                                            <label style="margin-left:15px;font-size:13px;" for="arabic">العربية <small style="color: #888;"> (coming soon. Stay tuned!)</small></label>
                                                            <!-- <span style="float:right;margin-right:5%;"><i
                                                                        class="flag-icon flag-icon-eh"></i></span> -->
                                                        </div>
                                                    </div>
                
                                                    <div class="col-lg-4">
                
                                                        <div class="centerlangues bg-light">
                
                                                            <input type="radio" disabled class="defaultlang hindi with-gap hindicclick"
                                                                value="hindi" id="hindi" name="radio-btn" style="cursor:pointer;">
                                                            <label style="margin-left:15px;font-size:13px;" for="hindi">हिंदी <small style="color: #888;"> (coming soon. Stay tuned!)</small></label>
                                                            <!-- <span style="float:right;margin-right:5%;"><i
                                                                        class="flag-icon flag-icon-ci"></i></span> -->
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <button type="button" id="defaultlangbtn" data-id="11"
                                                        style="background-color:#007bff;cursor:pointer;margin-top:3%;margin-left:4%;width:93%;"
                                                        class="btn btn-block btn-lg text-light">
                                                        <?php echo $portal_proceed; ?>
                                                        <i class="fa fa-long-arrow-right" style="font-size: 13px;"></i>
                                                    </button>
                
                                                </div>
                
                                            </div>
                
                                        </div>
                                        <!-- =======default language end here====== -->
                
                                        <!-- =======ai welcoming  start here====== -->
                                        <div id="displayaiwelcome"
                                            style="background-color:white;padding:8px;padding-bottom:15px;margin-top:5%;border-radius:10px;display:none;">
                
                                            <u style="cursor:pointer;float:right;margin-right:3%;" data-id="9" class="" id="previoutAI">
                                                <i class="fa fa-long-arrow-left" style="font-size:11px;"></i>
                                                <?php echo $portal_back; ?>
                                            </u>
                
                                            <div class="row">
                
                                                <div class="col-sm-7" align="left" style="margin-top:8%;">
                                                    <p>
                                                        <strong>
                
                                                            <?php echo $portal_welcometo; ?>
                
                                                            <div style="font-size:14px;">
                                                                <?php echo $portal_AI_onboarding_introduction; ?>
                                                            </div>
                                                        </strong>
                                                    </p>
                                                    <button type="button" id="previoutAI-btn" data-id="10"
                                                        style="background-color:#007bff;cursor:pointer;margin-top:5%;width:93%;font-size:15px;"
                                                        class="btn btn-block btn-lg text-light"><?php echo $portal_proceed; ?>
                                                        <i class="fa fa-long-arrow-right" style="font-size: 13px;float:right;"></i>
                                                    </button>
                                                </div>
                
                                                <div class="col-sm-5 d-none d-sm-block  d-xm-block text-right" id="aimessageimagediv">
                                                    <img src="../../assets/images/users/aiimage.jpg" id="aiimage">
                                                </div>
                
                                            </div>
                                        </div>
                                        <!-- =======ai welcoming  end here====== -->
                
                
                                        <!-- =======choice of school start here====== -->
                                        <div id="institutiontype" style='padding: 30px;display:none;'>
                                            <center>
                                                <h2><b>
                                                        <?php echo $portal_typeofsch_header; ?>
                                                    </b></h2>
                                            </center>
                                            <center>
                                                <p style="color:#5A5A5A;font-size:15px;margin-left:5%;margin-bottom:10px;">
                                                    <?php echo $portal_typeofsch_des; ?> <br>
                                                    <?php echo $portal_typeofsch_dessec; ?>
                                                </p>
                                            </center>
                
                                            <div class="container-fluid">
                
                                                <div class="row" style='margin-top: 40px;'>
                
                                                    <div class="col-sm-12">
                
                                                        <div class="square-box" id="k-container" style="outline: 3px solid #007bff;">
                
                                                            <input type="radio" checked class="typeofscho with-gap" value="1" id="k12value"
                                                                name="schooltype" style="margin-left:2%;margin-top:2%;">
                
                                                            <label style="font-size:13px;float:right;margin-right:3%;margin-top:2%;"
                                                                for="sec"></label>
                                                            <br>
                
                                                            <div class="row">
                
                                                                <div class="col-sm-6">
                
                                                                    <img class="img-fluid" src="../../assets/images/users/k-12.png" width="70%">
                
                                                                </div>
                
                                                                <div class="col-sm-6">
                
                                                                    <span>
                                                                        <b style="color:black;">
                                                                            <?php echo $portal_typeofsch_k12; ?>
                                                                        </b>
                                                                    </span><br>
                
                                                                    <p style="font-size:12px;margin-top:3%;">
                                                                        <?php echo $portal_typeofsch_K12_des; ?>
                                                                    </p>
                
                                                                </div>
                                                            </div>
                
                                                        </div>
                                                    </div>
                
                                                    <div class="col-sm-12">
                
                                                        <div class="square-box divlms bg-light pros-disabled-menu" id="tertiarycontainer">
                
                                                            <input type="radio" disabled class="typeofscho with-gap" value="2" id="tertiary"
                                                                name="schooltype" style="margin-left:2%;margin-top:2%;">
                
                                                            <label style="font-size:13px;float:right;margin-right:3%;margin-top:2%;"
                                                                for="tertiary"><small style="color: #888;">coming soon. Stay tuned!</small></label>
                
                                                            <br>
                                                            <div class="row">
                
                                                                <div class="col-sm-6">
                                                                    <img class="img-fluid" src="../../assets/images/users/k-12.png" width="70%">
                                                                </div>
                
                                                                <div class="col-sm-6">
                                                                    <span>
                                                                        <b style="color:black;">
                                                                            <?php echo $portal_typeofsch_tertairy; ?>
                                                                        </b>
                                                                    </span>
                                                                    <br>
                
                                                                    <p style="font-size:12px;margin-top:3%;">
                                                                        <?php echo $portal_typeofsch_tertiary_des; ?>
                                                                    </p>
                
                                                                </div>
                
                                                            </div>
                                                        </div>
                                                    </div>
                
                                                    <div class="col-sm-12 pros-disabled-menu">
                
                                                        <div class="square-box divlms bg-light " id="lmscontainer">
                
                                                            <input type="radio" disabled class="typeofscho with-gap" value="3"
                                                                id="contentcreator" name="schooltype"
                                                                style="margin-left:2%;margin-top:2%;">
                
                                                            <label style="font-size:13px;float:right;margin-right:3%;margin-top:2%;"
                                                                for="contentcreator"><small style="color: #888;">coming soon. Stay tuned!</small></label>
                                                            <br>
                
                                                            <div class="row">
                
                                                                <div class="col-sm-6">
                                                                    <img class="img-fluid" src="../../assets/images/users/k-12.png" width="70%">
                                                                </div>
                
                                                                <div class="col-sm-6">
                                                                    <span><b style="color:black;">
                                                                            <?php echo $portal_typeofsch_lms; ?>
                                                                        </b></span>
                                                                    <p style="font-size:12px;margin-top:3%;">
                                                                        <?php echo $portal_typeofsch_contentcreator_des; ?>
                                                                    </p>
                
                                                                </div>
                
                                                            </div>
                
                
                                                        </div>
                
                                                    </div>
                
                                                    <p></p>
                                                    <p></p>
                                                    <button type="button" style="margin-top:6%;" data-id="10" id="typeofschoolback"
                                                        class="btn  text-dark" class="">
                                                        <i class="fas fa-long-arrow-left" style="font-size:11px;">
                                                        </i>
                                                        <?php echo $portal_back; ?>
                                                    </button>
                                                    <button type="button" data-id="13" style="margin-top:6%;" id="proceedtosettingsch"
                                                        class="btn  text-light"><?php echo $portal_proceed; ?> <i
                                                            class="fas fa-long-arrow-right" style="font-size: 13px;"></i>
                                                    </button>
                                                </div>
                
                                            </div>
                
                                        </div>
                                        <!-- =======choice of school end here====== -->
                
                                        <!-- =======school page after choice of school start here====== -->
                                        <div id="displaysetinstitution" style='margin-bottom:30%;display:none;' align="center">
                
                                            <u style="cursor:pointer;float:right;margin-right:3%;" data-id="11" id="backbtntoai" class="">
                                                <i class="fa fa-long-arrow-left" style="font-size:11px;"></i>
                                                <?php echo $portal_back; ?>
                                            </u>
                
                                            <center><img src="../../assets/images/users/onboarding.png" style="width:200px;"></center>
                
                                            <center>
                                                <h3 style="color:#92929d;">
                                                    <?php echo $portal_createschool_landingpage_title; ?>
                                                </h3>
                                            </center>
                
                                            <div>
                
                                                <div class="row" align="center">
                
                                                    <div class="col-sm-3"></div>
                
                                                    <div class="col-sm-6">
                
                                                        <p style="font-size:15px;">
                                                            <?php echo $portal_createschool_landingpage_desc; ?>
                                                        </p>
                
                                                    </div>
                
                                                    <div class="col-sm-3"></div>
                
                                                </div>
                
                                                <center>
                
                                                    <button type="button" id="onboardingbtndisplay" data-id="12"
                                                        style='background-color:#007bff;font-size:15px;'
                                                        class="btn waves-effect waves-light btn-block btn-lg text-light">
                
                                                        <?php echo $portal_createschool_landingpage_buttontitle; ?>
                                                        <i class="fa fa-long-arrow-right" style="float:right;"></i>
                
                                                    </button>
                
                                                </center>
                
                                            </div>
                
                
                                        </div>
                
                                        <!-- =======school page after choice of school end here====== -->

                                    </div>
                                    <div class="modal-footer" style="border:none;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- pros set up modal-->
                        
                        
                        
                        <!-- create school new initial-->
                        <div class="modal fade" style="background-color: rgba(0, 0, 0, 0.2); z-index: 1050;"
                            id="pros-createschoolmodal-first" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="pros-createschoolmodalLabel-first" aria-hidden="true">
                            <div class="modal-dialog modal-xl"
                                style="height:80vh;margin: 1.75rem auto;color: rgb(56, 58, 63);">
                                <div class="modal-content" style="border:none;width: 100%;border-radius: 5px; ">

                                    <div class="modal-header" style="border:none;">
                                        
                                    </div>

                                    <div class="modal-body" style="padding:6% 8%;">
                                        <div class="row" id="displaycampuscontent" style="padding:0%;">
                                            <div class="col-sm-3 d-none d-lg-block  " style="margin-top:5%;">

                                                <div class="pros-diskschooltitle flexi-wizard-title">
                                                    <h1>Create School </h1>
                                                </div><br>

                                                <div class="pros-dotted-box">
                                                    <span class="schooliconinform">
                                                        <img class="schooliconinform-image"
                                                            src="../../assets/images/users/institutionimage.png">
                                                        <!-- <span class="vertical-school" >Start up your school here</span> -->
                                                    </span>

                                                </div>
                                                <!-- <img src="../../assets/images/users/schoolimage.png" > -->
                                            </div>
                                            <div class="col-sm-6 col-md-12 col-lg-6" style="margin-top:3%;">
                                                <span class="pros-schoolheading"
                                                    style="line-height: 35px; margin-left:11%;">About The School</span>
                                                <span class=""
                                                    style="margin-left:11%;font-family: poppins, sans-serif;color: #363949;font-size:12px;">
                                                    Fill information about your school below
                                                </span>
                                                <span direction="vertical" class=""></span><br><br>

                                                <div class="pros-flexi-label-wrapper"><label for="schoolName">School
                                                        Name<span style="color:red;">*</span></label></div>
                                                <div class="pros-flexi-input-affix-wrapper  prosschoolnamecover">

                                                    <input name="schoolName" class="pros-flexi-input"
                                                        id="schoolnameinitial" placeholder="e.g Startop schools"
                                                        type="text" spacebottom="10px" required="" value=""
                                                        style="width: 100%;">
                                                </div>&nbsp;&nbsp;&nbsp;

                                                <div class="pros-flexi-label-wrapper"><label for="schoolName">School
                                                        Motto<span style="color:red;">*</span></label></div>

                                                <div class="pros-flexi-input-affix-wrapper prosschoolmottocover">
                                                    <input name="schoolName" class="pros-flexi-input"
                                                        id="schoolmottoinitial" placeholder="enter your school motto"
                                                        type="text" spacebottom="10px" required="" value=""
                                                        style="width: 100%;">
                                                </div>

                                                <!-- <div class="pros-flexi-input-affix-wrapper">
                                                                        <input type="color" spacebottom="10px" required="" value="" style="width: 60%;">
                                                                </div> -->

                                                &nbsp;&nbsp;&nbsp;
                                                <div class="pros-flexi-label-wrapper"><label for="schoolName">School
                                                        Link<span style="color:red;">*</span></label>

                                                </div>



                                               




                                                <div class="pros-input-wrappernew prosschoollinkcover">
                                                    <input name="schoolName" class="pros-flexi-input schoollinkclass"
                                                        id="prosschoollink-initial" placeholder="e.g exampleschools"
                                                        type="text" spacebottom="10px" required="" value=""
                                                        style="width: 100%;">
                                                    <span class="pros-input-append">.edumess.com</span>
                                                </div> &nbsp;&nbsp;&nbsp;
                                                <span class=" " id="fullschoollinkcon"
                                                    style="margin-top:-2px;margin-left:40px;color:blue;display:none;">https://<span
                                                        id="schoollinkdis"></span>.edumess.com</span> <br>

                                                <span class=""
                                                    style="margin-top:-2px;margin-left:52px;font-family:poppins,sans-serif;color: #363949;font-size:11px;">
                                                    This will be the url link to your portal
                                                </span>



                                                &nbsp;&nbsp;<br></br>
                                                <button type="button" id="createschoolbtnfirstbtn" data-id="15"
                                                    style="background-color:#007bff;cursor:pointer;width:80%;margin-left:11%;font-size:14px;"
                                                    class="btn btn-block btn-lg text-light">Create School</button>


                                            </div>

                                            <div class="col-sm-3 d-none d-lg-block "
                                                style="margin-top:6%;padding-left:80px;">
                                                <div class="pros-progressbarstep">
                                                    <span
                                                        style="position:absolute;right:13rem;font-size:12px;font-weight:700;">About
                                                        School</span>
                                                    <div class="outer-circle" align="center">
                                                        <div class="inner-circle"></div>
                                                    </div>
                                                    <div class="vertical-line"> </div>
                                                    <div class="outer-circlenew" align="center">
                                                        <div class="inner-circle-down"></div>
                                                    </div>
                                                    <span
                                                        style="position:absolute;right:13rem;top:20.1rem;font-size:12px;">About
                                                        Campus</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer" style="border:none;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- create school new initial-->






                        <!-- =======pros full school list====== -->

                        <div id="schoolsettings" style="display: none">

                            <button class="btn btn-primary " style="font-size:11px;margin-right:1.3rem;float:right;"
                                data-bs-toggle="modal" data-bs-target="#pros-createschoolmodal"
                                id="openmodalcreatesch">Create School <i class="fa fa-arrow-right"></i></button>
                            <br><br><br><br>

                            <!-- =======displaycampus-created here====== -->

                            <div class="row g-2" id="displaycampus-created">

                            </div>
                            <!-- =======displaycampus-created here====== -->


                        </div>


                        <!-- =======pros full school list ====== -->
                    </div>
                    <div class="col-sm-1"></div>



                </div>

            </div>


        </main>
    </div>



    <!-- create campus Modal -->
    <div class="modal fade pros-schoolkindofmodal" style="background-color: rgba(0, 0, 0, 0.2); z-index: 1050;"
        id="pros-createnewcampus" tabindex="-1" aria-labelledby="pros-createnewcampusLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width:86%;height:80vh;margin: 1.75rem auto;color: rgb(56, 58, 63);">
            <div class="modal-content" style="border:none;width: 100%;border-radius: 5px;">
                <div class="modal-header" style="border:none;">
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="padding:6% 8%;">
                    <div class="row" id="displaycampuscontent" style="padding:0%;">
                        <div class="col-sm-4 d-none d-lg-block pros-hidegridcontenthide"
                            style="margin-top:3%;">

                            <div class="pros-diskschooltitle flexi-wizard-title">
                                <h1>About Campus </h1>
                            </div><br>

                            <div class="pros-dotted-box">
                                <span class="schooliconinform">
                                    <img class="schooliconinform-image" src="../../assets/images/users/campusimage.png">

                                </span>
                            </div>

                        </div>
                        <div class="col-sm-5 col-md-12 col-lg-5 " style="margin-top:3%;">
                            <span class="pros-schoolheading" style="line-height: 35px; margin-left:11%;">About The
                                Campus</span>
                            <span
                                style="margin-left:11%;font-family:poppins, sans-serif;color: #363949;font-size:12px;">
                                Fill information about your campus below
                            </span>
                            <span direction="vertical" class=""></span><br><br>

                            <div class="pros-geneclass-label" style=" margin-left:4%;"><label for="schoolName">Campus
                                    title/location<span style="color:red;">*</span></label></div>
                            <div class="pros-flexi-input-affix-wrapper-campus campuslocationcover">
                                <input name="schoolName" class="pros-flexi-input campuslocation" data-id=""
                                    placeholder=" campus location here" id="campuslocation" type="text"
                                    spacebottom="10px" required="" value="" style="width: 85%;">
                            </div>&nbsp;&nbsp;
                            <div class="pros-geneclass-label" style="  margin-left:4%;"><label
                                    for="schoolName">Email<span style="color:red;">*</span></label></div>
                            <div class="pros-flexi-input-affix-wrapper-campus campusemailcover">
                                <input name="schoolName" class="pros-flexi-input campusemail" data-id=""
                                    placeholder="e.g example@gmail.com" id="campusemail" type="text" spacebottom="10px"
                                    required="" value="" style="width: 85%;">
                            </div>&nbsp;&nbsp;

                            <div class="pros-geneclass-label"
                                style=" text-transform: uppercase;position: relative; font-weight: 700; display: block; font-size: 11px; margin-left:4%;font-family: poppins, sans-serif;">
                                <label for="schoolName">Phone<span style="color:red;">*</span></label></div>
                            <div class="pros-flexi-input-affix-wrapper-campus campusnumbercover">
                                <input name="schoolName" class="pros-flexi-input campusnumber campusphone" data-id=""
                                    placeholder="e.g XXXX-XXX-XXXX" id="phonenumber" type="tel" spacebottom="10px"
                                    required="" value="" style="width: 90%;margin-left:4%;">
                            </div>&nbsp;&nbsp;



                            <!-- <br class="d-none d-sm-block d-xm-block"> -->


                            <div class="pros-geneclass-label" style="margin-left:4%;"><label
                                    for="schoolName">Country<span style="color:red;">*</span></label></div>
                            <div class="pros-flexi-input-affix-wrapper-campus campuscountrycover">
                                <select class="generalcountry pros-generalselect ml-3" data-id="state" id="countryid"
                                    data-count="" style="width: 85%;;margin-left:2rem;">
                                    <option value="0">Select Country</option>
                                    <?php
                                                    $sqltogetcountries = mysqli_query($link, "SELECT * FROM `countries`");
                                                    $rowtogetcountries = mysqli_fetch_assoc($sqltogetcountries);
                                                    $cnttogetcountries = mysqli_num_rows($sqltogetcountries);

                                                    if ($cnttogetcountries > 0) {

                                                        do {
                                                            $CountryName = $rowtogetcountries['CountryName'];
                                                            $countryID = $rowtogetcountries['countryID'];

                                                            if ($countryID == '161') {

                                                                $selected = "selected";

                                                            } else {

                                                                $selected = "";
                                                            }


                                                            echo '<option value="' . $countryID . '" ' . $selected . '>' . $CountryName . '</option>';

                                                        } while ($rowtogetcountries = mysqli_fetch_assoc($sqltogetcountries));

                                                    }
                                                    ?>
                                </select>

                            </div>&nbsp;&nbsp;
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="pros-flexi-label-wrapper ml-5"><label for="schoolName">State<span
                                                style="color:red;">*</span></label></div>
                                    <div class="pros-flexi-input-affix-wrapper-campus campusstatecover">
                                        <select class="campus-state pros-generalselect ml-3 generalstate" data-state=""
                                            data-id="lgacity" id="state" style="width:85%;margin-left:1rem;">
                                            <option value="0">Select State</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="pros-flexi-label-wrapper"><label for="schoolName">LGA<span
                                                style="color:red;">*</span></label></div>
                                    <div class="pros-flexi-input-affix-wrapper-campus campuslgacover">
                                        <select class="campus-lga pros-generalselect ml-3 generallga" data-lga=""
                                            id="lgacity" style="width:85%;margin-left:1rem;">
                                            <option value="0">Select LGA</option>

                                        </select>

                                    </div>
                                </div>

                            </div><br>
                            <br>

                            <div id="displaycampus"></div>


                            <center><span class="circle-icon" id="addcampusbtn"
                                    style="color:#007bff;font-size:12px;cursor:pointer;">

                                    Add Campus <i class="fa fa-plus"></i>
                                </span></center>&nbsp;&nbsp;<br></br>
                            <button type="button" id="pros-createnewcampus-btn" data-id=""
                                style="background-color:#007bff;cursor:pointer;width:80%;margin-left:11%;font-size:14px;"
                                class="btn btn-block btn-lg text-light">Create Campus</button>


                        </div>

                        <div class="col-sm-3 d-none d-lg-block" style="margin-top:6%;padding-left:130px;">
                            <div class="pros-progressbarstepcampus ">
                                <span style="position:absolute;right:12rem;font-size:12px;">About School</span>

                                <div class="outer-circlenew" align="center">
                                    <div class="inner-circle-down"></div>
                                </div>

                                <div class="vertical-line"> </div>
                                <div class="outer-circle" align="center">
                                    <div class="inner-circle"></div>
                                </div>
                                <span
                                    style="position:absolute;right:12rem;top:20rem;font-size:12px;font-weight:700;">About
                                    Campus</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border:none;">

                </div>
            </div>
        </div>
    </div>
    <!-- create campus Modal -->



    <!-- create school new -->
    <div class="modal fade pros-schoolkindofmodal" style="background-color: rgba(0, 0, 0, 0.2); z-index: 1050;"
        id="pros-createschoolmodal" tabindex="-1" aria-labelledby="pros-createschoolmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" style="height:80vh;margin: 1.75rem auto;color: rgb(56, 58, 63);">
            <div class="modal-content" style="border:none;width: 100%;border-radius: 5px; ">

                <div class="modal-header" style="border:none;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <!-- <img src="../../assets/images/users/favicon.png" style="width:80px;" alt="EduMESS logo" > -->
                    <!-- <h5 class="modal-title" id="pros-createschoolmodal">Create School</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button> -->
                </div>

                <div class="modal-body" style="padding:6% 8%;">
                    <div class="row" id="displaycampuscontent" style="padding:0%;">
                        <div class="col-sm-3 d-none d-lg-block" style="margin-top:5%;">

                            <div class="pros-diskschooltitle flexi-wizard-title">
                                <h1>Create School </h1>
                            </div><br>

                            <div class="pros-dotted-box">
                                <span class="schooliconinform">
                                    <img class="schooliconinform-image"
                                        src="../../assets/images/users/institutionimage.png">
                                    <!-- <span class="vertical-school" >Start up your school here</span> -->
                                </span>

                            </div>
                            <!-- <img src="../../assets/images/users/schoolimage.png" > -->
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-6 " style="margin-top:3%;">
                            <span class="pros-schoolheading" style="line-height: 35px; margin-left:11%;">About The
                                School</span>
                            <span class=""
                                style="margin-left:11%;font-family: poppins, sans-serif;color: #363949;font-size:12px;">
                                Fill information about your school below
                            </span>
                            <span direction="vertical" class=""></span><br><br>

                            <div class="pros-flexi-label-wrapper"><label for="schoolName">School Name<span
                                        style="color:red;">*</span></label></div>
                            <div class="pros-flexi-input-affix-wrapper schollnameerr-new">

                                <input name="schoolName" class="pros-flexi-input" placeholder="e.g Startop schools"
                                    id="pros-schoolnameID-new" type="text" spacebottom="10px" required="" value=""
                                    style="width: 100%;">
                            </div>&nbsp;&nbsp;&nbsp;

                            <div class="pros-flexi-label-wrapper"><label for="schoolName">School Motto<span
                                        style="color:red;">*</span></label></div>

                            <div class="pros-flexi-input-affix-wrapper schollmottoerr-new">
                                <input name="schoolName" class="pros-flexi-input" id="pros-schoolmotto-new"
                                    placeholder="enter your school motto" type="text" spacebottom="10px" required=""
                                    value="" style="width: 100%;">
                            </div>

                           
                            &nbsp;&nbsp;&nbsp; 
                            <div class="pros-flexi-label-wrapper"><label for="schoolName">School Link<span
                                        style="color:red;">*</span></label>

                            </div>





                            <div class="pros-input-wrappernew schollurlerr-new">
                                <input name="schoolName" class="pros-flexi-input schoollinkclass" id="pros-schoolurlnew"
                                    placeholder="e.g exampleschools" type="text" spacebottom="10px" required="" value=""
                                    style="width:80%;">
                                <span class="pros-input-append">.edumess.com</span>
                            </div> &nbsp;&nbsp;&nbsp;
                            <span class=" " id="fullschoollinkcon-new"
                                style="margin-top:-2px;margin-left:40px;color:blue;display:none;">https://<span
                                    id="schoollinkdis-new"></span>.edumess.com</span> <br>

                            <span class=""
                                style="margin-top:-2px;margin-left:52px;font-family:poppins,sans-serif;color: #363949;font-size:11px;display:block;">
                                This will be the url link to your portal
                            </span>
                            <input type="hidden" value="okay" class="pros_verifyurl_exist_input_here">


                            &nbsp;&nbsp;<br></br>
                            <button type="button" id="addschoolinitialbtn-new"
                                style="background-color:#007bff;cursor:pointer;width:80%;margin-left:11%;font-size:14px;"
                                class="btn btn-block btn-lg text-light">Create School</button>


                        </div>

                        <div class="col-sm-3 d-none d-lg-block" style="margin-top:6%;padding-left:80px;">
                            <div class="pros-progressbarstep">
                                <span style="position:absolute;right:13rem;font-size:12px;font-weight:700;">About
                                    School</span>
                                <div class="outer-circle" align="center">
                                    <div class="inner-circle"></div>
                                </div>
                                <div class="vertical-line"> </div>
                                <div class="outer-circlenew" align="center">
                                    <div class="inner-circle-down"></div>
                                </div>
                                <span style="position:absolute;right:13rem;top:20.1rem;font-size:12px;">About
                                    Campus</span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer" style="border:none;">

                </div>
            </div>
        </div>
    </div>
    <!-- create school new -->


    <!-- INVITE STAFF MODAL-->

    <div class="modal fade" id="pros-invitestaff-usertype" style="background-color: rgba(0, 0, 0, 0.2); z-index: 1050;"
        tabindex="-1" aria-labelledby="pros-invitestaff-usertypeLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg pros-invitestaff-usertype-dialog"
            style="height:80vh;margin: 1.75rem auto;color: rgb(56, 58, 63);">

            <div class="modal-content" style="border:none;width: 100%;border-radius: 5px;">
                <div class="modal-header" style="border:none;">
                    <!-- <h5 class="modal-title"  id="invitestaff-usertype">Modal title</h5>-->
                    <u style="color:blue;font-size:13px;text-decoration:underline;cursor:pointer;display:none"
                        id="invitestaff-backbtn"><i class="fa fa-arrow-left"></i> Back</u>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body" style="padding:6% 8%;">

                            <!-- ======usertype conatiner end here===== -->
                            <div class="row" id="selectuser-typecontainer" style="display:none;">

                                <div class="col-12" align="center">
                                    <h5 class=" schoolheading " style="line-height: 35px;">choose your choise of user below
                                    </h5><br><br>
                                </div>



                                <div class="col-sm-6 mb-3">

                                    <div class="card generalclass-usertype" style="cursor:pointer;" data-id="3">

                                        <div class="card-body"
                                            style="border:none;border:1px solid #007bff;border-radius:5px;height:60px;">

                                            <div class="radio-group">
                                                <input type="radio" style="cursor:pointer;" class="with-gap usertypecheck"
                                                    id="admin" value="admin" name="usertype">
                                                <label class="ml-1" for="admin"
                                                    style="font-weight:600;cursor:pointer;">Admin</label>
                                                <!-- <input type="radio" style="flex:left;" class="defaultlang english with-gap englishclick"  value="english" id="radio-btn" name="radio-btn"> -->
                                            </div>
                                        </div>

                                    </div>

                                </div>


                                <div class="col-sm-6 mb-3">

                                    <div class="card generalclass-usertype" style="cursor:pointer;" data-id="2">

                                        <div class="card-body"
                                            style="border:none;border:1px solid #007bff;border-radius:5px;height:60px;">

                                            <div class="radio-group">
                                                <input type="radio" style="cursor:pointer;" class="with-gap usertypecheck"
                                                    value="schoolhead" id="personalassist" name="usertype">
                                                <label class="ml-1" for="personalassist"
                                                    style="font-weight:600;cursor:pointer;">School Head</label>
                                            </div>
                                            <!-- <small style="font-size:10px;">
                                                                        A school admin is the person in charge of managing the administrative tasks of a school
                                                                    </small> -->
                                        </div>

                                    </div>

                                </div>



                            
                                <div class="col-sm-6 mb-3">

                                    <div class="card generalclass-usertype" style="cursor:pointer;" data-id="4">

                                        <div class="card-body"
                                            style="border:none;border:1px solid #007bff;border-radius:5px;height:60px;">

                                            <div class="radio-group">
                                                <input type="radio" style="cursor:pointer;" class="with-gap usertypecheck"
                                                    id="teacher" value="teacher" name="usertype">
                                                <label class="ml-1" for="teacher"
                                                    style="font-weight:600;cursor:pointer;">Teacher</label>

                                            </div>
                                        </div>

                                    </div>

                                </div>


                                <div class="col-sm-6 mb-3">
                                    <div class="card generalclass-usertype" style="cursor:pointer;" data-id="5">

                                        <div class="card-body"
                                            style="border:none;border:1px solid #007bff;border-radius:5px;height:60px;">

                                            <div class="radio-group">
                                                <input type="radio" style="cursor:pointer;" class="with-gap usertypecheck"
                                                    id="nonteaching" value="nonteaching" name="usertype">
                                                <label class="ml-1" for="teacher"
                                                    style="font-weight:600;cursor:pointer;">Non-teaching</label>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                

                                <div class="col-sm-12 mb-3">
                                    <div class="card generalclass-usertype" style="cursor:pointer;" data-id="1">
                                        <div class="card-body" style="border:none;border:1px solid #007bff;border-radius:5px;height:60px;">
                                            

                                            <div class="radio-group">

                                                <input type="radio" style="cursor:pointer;" class="with-gap usertypecheck"
                                                    value="Senior executive/Board member" id="seniorexecutive" name="usertype">

                                                <label for="seniorexecutive" style="font-weight:600;cursor:pointer;">Senior
                                                    executive/Board member</label>

                                            </div>

                                        </div>

                                    </div>

                                </div>




                                <div class="col-sm-12 mb-3">
                                    <button type="button" id="getschoolusertypebtn"
                                        style="background-color:#007bff;cursor:pointer;width:100%;"
                                        class="btn btn-lg text-light">Proceed <i class="fa fa-long-arrow-right"></i></button>
                                </div>
                            </div>
                            <!-- ======usertype conatiner end here===== -->

                            <!-- ======getstaff-forinsert conatiner end here===== -->
                            <div id="getstaff-forinsert-container" style="display:none;">

                                <div class="row">

                                    <div class="col-12" align="center">
                                        <h5 class=" schoolheading " style="line-height: 35px;">choose to either create staff or
                                            invite</h5>
                                        <br><br>

                                    </div>

                                    <div class="col-12">
                                        <span id="pros-watchtutorial"
                                            style="color:blue;font-size:13px;text-decoration:underline;cursor:pointer;float:right;"><i
                                                class=" fa fa-play-circle" style="font-size:20px;"></i> Watch tutorial </span>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-6 mb-3">

                                        <div class="card stafflink-card " data-id="1" style="cursor:pointer;">

                                            <!-- Card content for box 1 -->
                                            <div class="card-body bringformlinkinvite"
                                                style="border:none;border:1px solid #007bff;border-radius:5px;height:120px;">

                                                <div class="radio-group">

                                                    <input type="radio" style="cursor:pointer;"
                                                        class="with-gap inviteuser-create  bringformlink" id="invitelink"
                                                        value="Invite Staff" name="inviteuser-link">
                                                    <label class="ml-1 mb-2" for="invitelink"
                                                        style="font-weight:600;cursor:pointer;" id="pros-invitetitle">Invite Staff</label>

                                                </div>

                                                <p>By clicking on invite staff, this means you want to send an invite link to a
                                                    staff for registration. </p>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-6 mb-3">

                                        <div class="card stafflink-card " data-id="2" style="cursor:pointer;">

                                            <div class="card-body bringformlinkcreate"
                                                style="border:none;border:1px solid #007bff;border-radius:5px;;height:120px;">

                                                <div class="radio-group">

                                                    <input type="radio" style="cursor:pointer;"
                                                        class="with-gap inviteuser-create bringformlink" id="createstaff"
                                                        value="Create staff" name="inviteuser-link">
                                                    <label class="ml-1 mb-2" for="createstaff"
                                                        style="font-weight:600;cursor:pointer;" id="pros-createtitle">Create staff</label>

                                                </div>

                                                <p>By clicking on craete staff, this means you want to create the staff by
                                                    filling the form your self. </p>
                                            </div>

                                        </div><br>
                                        
                                    </div>

                                    <div class="col-sm-12 mb-3" id="displaystaffemail" style="display:none;">

                                        <div class="pros-geneclass-label"
                                            style="margin-right:11rem;margin-left:2%;text-transform: uppercase;font-weight: 700;display: block;font-size: 0.9em;">
                                            <label for="schoolName">Staff email<span
                                                    style="color:red;margin-right:2.5rem;">*</span></label>
                                        </div>

                                        <div class="pros-flexi-input-affix-wrapper-invitemail staffemail-invitelink pros-inviteemailcover">

                                            <input type="email" class="pros-flexi-input prosgeneralinvitemail prossingleinvitemail" data-id="" id="staffemail-invite"
                                                placeholder="Enter your staff's email" style="width:70%;">
                                        </div>

                                        <!-- appending email for staff invitation here -->
                                        <div id="pros-display-appendstaff-email"></div>
                                        <!-- appending email for staff invitation end here -->

                                        <br>
                                        <span class="circle-icon" id="pros-addstaff-email-invite"
                                            style="color:#007bff;font-size:12px;cursor:pointer;float:right;">
                                            Add Staff <i class="fa fa-plus"></i>
                                        </span>
                                        <input type="hidden" id="pros-appendinput-ivite-email">

                                    </div>

                                    <div class="col-sm-12 mb-3" id="staff-form" style="display:none;">

                                        <div class="row">

                                            <div class="col-sm-6">
                                                <div class="pros-flexi-label-wrapper " style="margin-right:11rem;"><label
                                                        for="schoolName"> First name<span style="color:red;">*</span></label>
                                                </div>
                                                <div class="pros-flexi-input-affix-wrapper-invitemail stafffnamecont">
                                                    <input type="text" class="pros-flexi-input" id="staff-fname"
                                                        placeholder="Enter your staff's first name" style="width:80%;">
                                                </div>&nbsp;&nbsp;
                                            </div>


                                            <div class="col-sm-6">
                                                <div class="pros-flexi-label-wrapper" style="margin-right:11rem;"><label
                                                        for="schoolName"> Last Name<span style="color:red;">*</span></label>
                                                </div>
                                                <div class="pros-flexi-input-affix-wrapper-invitemail stafff-lastnamecont">
                                                    <input type="text" class="pros-flexi-input" id="staff-lname"
                                                        placeholder="Enter your staff's last name" style="width:80%;">
                                                </div>&nbsp;&nbsp;
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="pros-flexi-label-wrapper" style="margin-right:11rem;"><label
                                                        for="schoolName"> Email<span style="color:red;">*</span></label></div>
                                                <div class="pros-flexi-input-affix-wrapper-invitemail stafff-emailcont">
                                                    <input type="text" class="pros-flexi-input" id="staff-email"
                                                        placeholder="Enter your staff's email" style="width:80%;">
                                                </div>&nbsp;&nbsp;
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="pros-flexi-label-wrapper" style="margin-right:11rem;"><label
                                                        for="schoolName"> Phone<span style="color:red;">*</span></label></div>
                                                <div class="pros-flexi-input-affix-wrapper-invitemail staffnumbercont">
                                                    <input type="number" name="staffphone" class="pros-flexi-input "
                                                        id="staffnumber" placeholder="e:g XXXX-XXX-XXXX"
                                                        style="width:85%;margin-left:4%;">
                                                </div>&nbsp;&nbsp;
                                            </div>


                                            
                                            <div class="col-sm-6">
                                                <div class="pros-flexi-label-wrapper" style="margin-right:11rem;"><label
                                                        for="schoolName"> Date of birth<span style="color:red;">*</span></label></div>
                                                <div class="pros-flexi-input-affix-wrapper-invitemail stafff-dobcont">
                                                    <input type="date" class="pros-flexi-input" id="pros-staff-dob"
                                                        placeholder="Enter your staff's email" style="width:80%;">
                                                </div>&nbsp;&nbsp;
                                            </div>


                                            <div class="col-sm-6">
                                                <div class="pros-flexi-label-wrapper" style="margin-right:11rem;"><label
                                                        for="schoolName"> Gender<span style="color:red;">*</span></label></div>
                                            <div class="pros-flexi-input-affix-wrapper-invitemail stafff-gendercont">
                                            <select class="pros-flexi-input" id="prosstaffgender"  style="width:80%;">
                                            
                                                    <option value="0">Select Gender</option>
                                                    <option  value="Male">Male</option>
                                                    <option  value="Female">Female</option>
                                                </select>
                                            </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-sm-12 mb-3">
                                        <button type="button" id="getschoolinvitebtn"
                                            style="background-color:#007bff;cursor:pointer;width:100%;"
                                            class="btn btn-block btn-lg text-light">Submit <i
                                                class="fa fa-long-arrow-right"></i></button>
                                    </div>

                                </div>
                            </div>
                            <!-- ======getstaff-forinsert conatiner end here===== -->



                            <!-- ======display menu conatiner for admin and pa===== -->
                            <div class="row" id="pros-displayadminmenuset" style="display:none;">

                            </div>
                            <!-- ======display menu conatiner for admin and pa===== -->
                </div>

                    <input type="hidden" id="getusertypeinvite"><!-- store staff id here -->

                    <input type="hidden" id="prosmenucontent">

                <div class="modal-footer" style="border:none;">
                </div>

            </div>
        </div>
    </div>

    <!--INVITE STAFF MODAL END-->


    <!-- edit campus modal -->
    <div class="modal fade" id="pros-editcampus-modal" style="background-color: rgba(0, 0, 0, 0.2); z-index: 1050;"
        tabindex="-1" aria-labelledby="editcampus-modalLabel" aria-hidden="true">

        <div class="modal-dialog modal-xl" style="height:80vh;margin: 1.75rem auto;color: rgb(56, 58, 63);">

            <div class="modal-content" style="border:none;width: 100%;border-radius: 5px;">

                <div class="modal-header" style="border:none;">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" style="padding:6% 8%;">
                    <div id="displayschforedit"></div>
                </div>

                <div class="modal-footer" style="border:none;">
                </div>
            </div>
        </div>
    </div>
    <!-- edit campus modal -->


    <!-- delete campus modal -->
    <div class="modal fade" id="pros-deletecampus-modal" style="background-color: rgba(0, 0, 0, 0.2); z-index: 1050;"
        tabindex="-1" aria-labelledby="deletecampus-modalLabel" aria-hidden="true">
        <div class="modal-dialog" style="height:80vh;margin: 1.75rem auto;color: rgb(56, 58, 63);">
            <div class="modal-content" style="border:none;width: 100%;border-radius: 5px;">
                <div class="modal-header" style="border:none;">
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="padding:6% 8%;">
                    <!-- <div id="displayschforedit"></div> -->
                    <center>
                        <p style="font-weight:400;font-size:15px;">Are you sure you want to delete this campus <span style="font-weight:600;" id="prosloadcontentdelte"></span>?</p>
                                

                        <span style="color:red;font-weight:600;">
                            Note: if you delete this campus,
                            all the Staffs,
                            clases<br> and every other things related
                            to this campus will deleted.
                        </span>
                    </center>

                    <input type="hidden" id="prosloadcampusdeletecampus">
                    <input type="hidden" id="prosloadcampusdeleteschool">

                </div>
                <div class="modal-footer" style="border:none;">
                    <button type="button" class="btn btn-danger pros-deletecampusbtnfinal">Delete <i class="fa fa-trash"></i></button>
                    <!-- <u data-toggle="modal" data-target="#deleteModal" id="deleteButton" class= "btn btn-primary">Delete</u> -->
                </div>
            </div>
        </div>
    </div>
    <!-- delete campus modal -->


    <!-- edit school modal -->
    <div class="modal fade" id="pros-editschool-modal" style="background-color: rgba(0, 0, 0, 0.2); z-index: 1050;"
        tabindex="-1" aria-labelledby="editschool-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" style="height:80vh;margin: 1.75rem auto;color: rgb(56, 58, 63);">
            <div class="modal-content" style="border:none;width: 100%;border-radius: 5px;">
                <div class="modal-header" style="border:none;">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="padding:6% 8%;">
                    <div id="displayschoolforedit"></div>
                </div>
                <div class="modal-footer" style="border:none;">
                </div>
            </div>
        </div>
    </div>
   <!-- edit school modal -->

    <!--delete school modal -->
    <div class="modal fade" id="pros-deleteschool-modal" style="background-color: rgba(0, 0, 0, 0.2); z-index: 1050;"
        tabindex="-1" role="dialog" aria-labelledby="deleteschool-modalLabel" aria-hidden="true">
        <div class="modal-dialog " style="height:80vh;margin: 1.75rem auto;color: rgb(56, 58, 63);" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border:none;">
                    <h5 class="modal-title" style="font-weight:600;font-size:15px;" id="deleteschool-modalLabel">
                        Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="displayschooldel-onboarding">
                    <center>
                        <p style="font-weight:400;font-size:15px;">Are you sure you want to delete <span
                                id="displayschoolname-del"></span>?</p>

                        <span style="color:red;font-weight:400;">
                            Note: if you delete this school,
                            all the campuses,Staffs,
                            clases<br> and every other things related
                            to this school will deleted.
                        </span>
                    </center>
                    <input type="hidden" id="prosget-schoolidfordelete">


                </div>
                <div class="modal-footer" style="border:none;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="pros-deleteschoolherebtn">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!--delete school modal -->


    <!-- HIDDEN VALUES -->
    <input type="hidden" id="getusertypeinvite">
    <input type="hidden" id="appendinput">
    <input type="hidden" id="checkfirstvilation" value="validatedfinal">
    <input type="hidden" id="staffgroupschoolID">
    <input type="hidden" id="pros-dispaly-mainmenu">
    <input type="hidden" id="pros-dispaly-submenu">
    <input type="hidden" id="pros-dispaly-menustatus">
    <input type="hidden" id="pros-displaybackvalue-tag">
    <input type="hidden" id="prosloadschoolid-forbackward">
    <input type="hidden" id="groupschoolnewcampusid">



   
    <!-- HIDDEN VALUES -->



    <!-- //pros load logo upload here-->

    <!-- Image Modal -->
    <div id="insertimageModal" class="modal" role="dialog">
        <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload School Logo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                <div class="col-sm-12 col-md-12 col-lg-12 p-2">
                    <div id="pros-load-image"></div>
                    <input type="hidden" id="prosschoollherebtnlogo">
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success prossubmitschoollogo">Submit</button>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
    <!-- End Image Modal -->
     <!-- //pros load logo upload here-->



      <!-- //pros load logo upload here-->
  
    <div id="prosopenloginimagemodal" class="modal" role="dialog">
        <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Login Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                <div class="col-sm-12 col-md-12 col-lg-12 p-2">
                    <div id="prosloadloadloginimage"></div>
                </div>
                </div>
            </div>
                  <input type="hidden" id="prosloadstepforbgimage">
                  <input type="hidden" id="prosschoollherebtn">
            <div class="modal-footer">
                <button class="btn btn-success btn-sm prossubmitloginimagebtn">Crop Image</button>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
     <!-- //pros load logo upload here-->




    <div class="modal fade modalshow modalfade" id="prosloadset-configurationhere" tabindex="-1" aria-labelledby="prosloadset-configurationhereModalLabel"
        aria-hidden="true">
        <div class="modal-dialog dialogcontent" style="border-top-left-radius: 20px; width: 300px;">
            <div class="modal-content modalcontent" style="background-color:#ffffff; ">

                <div class="modal-body modalbodycontent">

                    <div style="position: fixed; margin-left: 0.9rem; padding-top: 20px; display: flex;">
                        <img src="../assets/images/favicon.png" style="width: 80%" data-dismiss="modal" aria-label="Close">
                    </div>


                    <div width="300px" height="30vh" class="sc-UpCWa ezuGy flexi-sheet-body" open="">
                        <button type="button" data-bs-dismiss="modal" aria-label="Close"
                            style="float: right; margin-right: 20px; background: #ffffff; border: none;">
                            <span style="color: #525252; font-size: 30px; cursor: pointer;">×</span>
                        </button>

                    
                        <p style="margin-left: 0.9rem; padding-top: 60px; margin-left: 40px; font-weight: 700; color: #525252;">School Settings</p>
                            

                        <div width="100%" height="100%" style="margin-top: 50px;" class="sc-pyfCe gtGxgb">

                            <ul class="rightModalItems">

                            

                                <li class="chiTag">SETTINGS</li>
                                <li class="chiTagLine"> </li>

                                <li>
                                    <a  class="prosgeneralcliklinkhere" data-step="section" style="cursor:pointer;">
                                        <i class="fa fa-calendar menuicons"></i> Section
                                    </a>
                                </li>

                                <li>
                                    <a class="prosgeneralcliklinkhere" data-step="class">
                                        <i class="fa fa-clock-o menuicons"></i>Class</a>
                                    </a>
                                </li>

                                <li>
                                    <a  class="prosgeneralcliklinkhere" data-step="subject">
                                        <i class="fa fa-address-book menuicons"></i> Subject
                                    </a>
                                </li>

                                <li>
                                    <a class="prosgeneralcliklinkhere" data-step="term" style="cursor:pointer;">
                                        <i class="fa fa-cogs menuicons"></i> Term
                                    </a>
                                </li>


                                <li>
                                    <a class="prosgeneralcliklinkhere" data-step="logo" style="cursor:pointer;">
                                        <i class="fas fa-image menuicons"></i> School Logo
                                    </a>
                                </li>


                                <li>
                                    <a class="prosgeneralcliklinkhere" data-step="loginbg" style="cursor:pointer;">
                                        <i class="fas fa-camera menuicons"></i> Login Images
                                    </a>
                                </li>

                            

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


      <input type="hidden" id="prosloadquestionsettingcampusid">



    <!--Script-->

    <!--jquery  -->
    <script src="../../assets/plugins/jquery/jquery.min.js"></script>
    <!--jquery knob -->
    <script src="../../assets/plugins/knob/jquery.knob.js"></script>

    <script>
    $(function() {
        $('[data-plugin="knob"]').knob();
    });
    </script>
    <!--Custom JS--->
    <script src="../../js/app_js/appScript.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- header js -->
    <script src="../../controller/js/app/header.js"></script>
    <script src="../../assets/plugins/notify/wnoty.js"></script>
    <?php include('../../js/app_js/setup.php'); ?>

   


    <!-- header js -->
    <?php include('../../controller/js/app/header.php'); ?>


     <!-- image cropper js -->
     <script src="../../assets/plugins/Croppie/croppie.js"></script>
    <script src="../../assets/plugins/Croppie/croppie.min.js"></script>




</body>

</html>