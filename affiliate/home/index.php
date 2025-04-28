<?php
    include('../../controller/session/session-checker-franchise.php');
    // if ($DefaultLanguage == '') {
    //     include('../../lang/english.php');
    
    // } else {
    //     include('../../lang/' . $DefaultLanguage . '.php');
    // }
    // mysqli_set_charset($link, 'utf8');
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
    <link rel="stylesheet" href="../../css/app_css/appStyle.css">
        <script type="text/javascript" src="https://sdk.monnify.com/plugin/monnify.js"></script>
  
        <!-- C:\xampp\htdocs\chovdv-owner\css\app_css\appStyle.css -->
    
    
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
        <?php include('../../includes/affiliate-header.php'); ?>
        <!--End Header -->


        <!-- Sidebar -->
        <?php include('../../includes/affiliate-menu.php'); ?>
        <!-- End Sidebar -->
      

        <!--======Floating Button=========-->
        <!-- Buttons -->
        <?php# include('../../includes/floating-btn.php'); ?>
        <!-- End - Buttons -->
        <!--======Floating Button=========-->


        <!---====Side Modal Start Here====-->
        <?php #include('../../includes/setting-menu.php'); ?>
        <!---====Side Modal End Here====-->

        <!----Main----->
        <main class="main-container">
      
            
            

            <div class="main-title">
                <span class="font-weight-bold">Hello <?php echo $PrimaryName; ?> </span>
                <br>
                <small style="font-size: 12px;">Welcome Back !!!</small>
            </div>

           

            <div class="main-title" style="margin-top: 30px;">
                <span class="font-weight-bold" style="font-size:18px;">Dashboard Overview </span>
            </div>


            <div class="main-cards" style="margin-top: 10px;">

                    <div class="row">
                            <div class="col-12">
                                <div class="topSecCards"
                                    style="width: 100%; height: 100%; padding: 10px 10px 25px 10px; border-radius: 20px;">
                                    <div class="row">
                                        
                                        <div class="col-sm-12 col-md-6 col-lg-4">
                                            <div align="center" style="padding: 28px 0 0 0px;">
                                                <div class="proscard"
                                                    style="width: 100%; border-radius: 15px; height: 170px; background-color:white;">
                                                    <div style="padding: 10px;">
                                                        
                                                        <div class="row pros_school_dashborad_content" style="margin-top: 12px;">
                                                              
                                                      
                                                        </div>
                                                         
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        



                                        <div class="col-sm-12 col-md-6 col-lg-4">
                                            <div align="center" style="padding: 28px 0 0 0px;">
                                                <div class="renfinaceCard"
                                                    style="width: 100%; border-radius: 15px; height: 170px;">
                                                    <div style="padding: 10px;">
                                                        <h6 style="margin-left: -120px; color: #ffffff;">Total Affiliate</h6>
   
                                                            
                                                        <div align="center" class="mt-4">
                                                            <span style="font-size: 35px; font-weight: 500; color: #ffffff;" id="prosload_total_affiliate">
                                                              
                                                            </span>
                                                          

                                                            
                                                            <!-- <a 
                                                                style="font-size: 18px; margin-top: -13px; color: #ffffff; float: right; margin-right: 50px;cursor:pointer;"><i
                                                                    class="fa fa-eye prosperwalletpendingshowbtn" aria-hidden="true"></i></a> -->
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-4">
                                            <div align="center" style="padding: 28px 0 0 0px;">
                                                <div class="renbluishCard"
                                                    style="width: 95%; border-radius: 15px; height: 170px;">
                                                    <div style=" padding: 10px">
                                                        <h6 style="margin-left: -120px; color: #ffffff;">My Earning This Term</h6>

                                                        <div align="center" class="mt-4">
                                                            <span style="font-size: 35px; font-weight: 500; color: #ffffff;" id="prosload_totalearnper_term">
                                                               
                                                                </span>
                                                            <br>
                                                            <input type="hidden" class="pros_total_earning_input" >
                                                            <a
                                                                style="font-size: 18px; margin-top: -13px; color: #ffffff; float: right; margin-right: 25px;cursor:pointer;"><i
                                                                    class="fa fa-eye pros_earning_clicked_eye" aria-hidden="true"></i></a>

                                                                   
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


        </main>


    </div>
    
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.40.0/apexcharts.min.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    
      <!-- notification js -->
    <script src="../../assets/plugins/notify/wnoty.js"></script>


    <script src="../../js/admin_js/adminScript.js"></script>
   

    <!-- header js -->
    <?php include('../../controller/js/app/header.php'); ?>
    <?php include('../../controller/js/affiliate/dashboard.php'); ?>

   
    
    
    
    
 

</body>

</html>