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

        |

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
    <link rel="stylesheet" href="../../css/app_css/addmissionstyle.css">
    <link rel="stylesheet" href="../../assets/plugins/Croppie/croppie.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/1.11.3/css/jquery.dataTables.min.css"> -->

    <!--=== style sheet==-->

    


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

          <div class="row g-3" id="prosloadadmissioncardcontent">
                    
                    </div>  
                <div class="main-cards" style="margin-top: 50px;">
                        <!-- Navbar pills -->
                        <div class="row">
                        <div class="col-sm-12">
                            <!-- Nav tabs -->
                            <div class="col-sm-12">
                                
                                <ul class="nav nav-tabs mb-3 customtab" id="ex1" role="tablist">

                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active abba_main_tab"
                                        id="ex1-tab-1" data-id="staff"
                                        data-bs-toggle="tab"
                                        href="#ex1-tabs-1"
                                        role="tab"
                                        aria-controls="ex1-tabs-1"
                                        aria-selected="true" data-id="employee">Admission Settings</a>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <a
                                        class="nav-link abba_main_tab"
                                        id="ex1-tab-2" data-id="student"
                                        data-bs-toggle="tab"
                                        href="#ex1-tabs-2"
                                        role="tab"
                                        aria-controls="ex1-tabs-2"
                                        aria-selected="false">Admission Record</a>
                                    </li>

                                </ul>
                                <div class="tab-content" id="ex1-content">
                                        <!-- admission settings here -->
                                        <?php include('admissionsetup.php'); ?>
                                          <!-- admission settings here -->

                                          <?php include('applicant-list.php'); ?>
                                         
                                            
                                <!-- Tab panes -->
                            </div>
                        
                        </div>
                        </div>
                        <!--/ Navbar pills -->

                </div>
        </main>
    </div>



    <!--jquery  -->
    <script src="../../assets/plugins/jquery/jquery.min.js"></script>
    <!--jquery knob -->
    <script src="../../assets/plugins/knob/jquery.knob.js"></script>

    <script>
        $(function () {
            $('[data-plugin="knob"]').knob();
        });
    </script>
    <!--Custom JS--->
    <script src="../../js/app_js/appScript.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- header js -->
    <script src="../../controller/js/app/header.js"></script>
    <script src="../../assets/plugins/notify/wnoty.js"></script>

    <!-- image cropper js -->
    <script src="../../assets/plugins/Croppie/croppie.js"></script>
    <script src="../../assets/plugins/Croppie/croppie.min.js"></script>

    <!-- header js -->
    <?php include('../../controller/js/app/header.php'); ?>
    <?php include('../../controller/js/app/admission-setup.php'); ?>
    <!-- <script src="https://cdn.datatables.net/v/1.11.3/js/jquery.dataTables.min.js"></script> -->

    <!-- current page js -->
    <?php include('../../js/current_page.php'); ?>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>



</body>

</html>