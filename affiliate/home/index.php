<?php
    // include('../../controller/session/session-checker-owner.php');
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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->

    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/adminImg/favicon.png">
    <title>
        <?php #echo $portal_onboarding_title; ?> |
        <?php #echo $fullname; ?>
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
                <span class="font-weight-bold">Hello <?php #echo $PrimaryName; ?> </span>
                <br>
                <small style="font-size: 12px;">Welcome Back !!!</small>
            </div>

           

            <div class="main-title" style="margin-top: 30px;">
                <span class="font-weight-bold" style="font-size:18px;">Performance Overview </span>
            </div>


            <div class="main-cards" style="margin-top: 10px;">

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
    <?php include("../../js/app_js/dashboardjs.php"); ?>
   
    
    
    
    
 

</body>

</html>