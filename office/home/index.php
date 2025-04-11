<?php
    include('../../controller/session/session-checker-franchise.php');
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
        Home Page | Franchise | EduMESS
    </title>


    <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->


    <link href="../../notify/wnoty.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- style sheet -->
    <link rel="stylesheet" href="../../css/admin_css/adminStyle.css">

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
</head>

<body>


    <div class="grid-container">
        <!-- Header -->
        <?php include('../../includes/franchise-header.php'); ?>
        <!--End Header -->


        <!-- Sidebar -->
        <?php include('../../includes/franchise-menu.php'); ?>
        <!-- End Sidebar -->


        <!--======Floating Button=========-->
        <!-- Buttons -->
        <?php //include('../../includes/floating-btn.php'); ?>
        <!-- End - Buttons -->
        <!--======Floating Button=========-->


        <!---====Side Modal Start Here====-->
        <?php include('../../includes/setting-menu.php'); ?>
        <!---====Side Modal End Here====-->

        <!----Main----->
        <main class="main-container">

            <div class="main-title">
                <span class="font-weight-bold">Hello <?php echo $PrimaryName; ?> </span>
                <br>
                <small style="font-size: 12px;">Welcome Back !!!</small>
            </div>

        </main>


    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.40.0/apexcharts.min.js"></script>
    <script src="../../assets/plugins/jquery/jquery.min.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="../../js/admin_js/adminScript.js"></script>
</body>

</html>