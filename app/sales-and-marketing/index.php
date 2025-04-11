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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- Animate.css CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-..." crossorigin="anonymous" />

    <!-- style sheet -->
    <link rel="stylesheet" href="../../css/app_css/appStyle.css">

    <!-- phone number country code -->
    <link href="../../assets/plugins/intlTelInput.min.css" rel="stylesheet"/>
    <script src="../../assets/plugins/intlTelInput.min.js"></script>

    <!-- notification css-->
    <link href="../../assets/plugins/notify/wnoty.css" rel="stylesheet">

    <!-- image Croppie -->
    <link rel="stylesheet" href="../../assets/plugins/Croppie/croppie.css"></link>
    
    <!-- Bootstrap Tagsinput CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">

     <!-- Bootstrap Tagsinput JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

    <style>
        
        body {
            font-family: 'Ubuntu', sans-serif;
        }
          .tags-input {
            display: inline-block;
            position: relative;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 5px;
            box-shadow: 2px 2px 5px #00000033;
            width: 100%;
        }
  
        .tags-input ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
  
        .tags-input li {
            display: inline-block;
            background-color: #262E35;
            color: #fff;
            border-radius: 20px;
            padding: 5px 10px;
            margin-right: 5px;
            margin-bottom: 5px;
        }
  
        .tags-input input[type="text"] {
            border: none;
            outline: none;
            padding: 5px;
            font-size: 14px;
        }
  
        .tags-input input[type="text"]:focus {
            outline: none;
        }
  
        .tags-input .delete-button {
            background-color: transparent;
            border: none;
            color: #999;
            cursor: pointer;
            margin-left: 5px;
        }

        /* Style for the search input container */
        .search-container {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        /* Style for the search input */
        .search-input {
            color: #333;
        }

        /* Style for the search icon */
        .search-icon {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            color: #888;
        }

        .funnel-container {
            background-color: #f8f9fa; /* Light gray background */
            padding: 20px;
            border-radius: 10px;
        }
        .funnel-title {
        margin-bottom: 20px;
        }

        .badge {
        width: auto; /* Set to 'auto' to allow the badge to adjust its width based on content */
        display: inline-block; /* Ensures the badge takes up the width of its content */
        margin-right: 5px; /* Optional: Adjust margin between badges */
    }



        
.tari-tari_checkbox-group {
            display: flex;
        }
        .tari-tari_checkbox-group > * {
            margin: 0.5rem 0.5rem;
        }

        .tari_checkbox-input {
            clip: rect(0 0 0 0);
            clip-path: inset(100%);
            height: 1px;
            overflow: hidden;
            position: absolute;
            white-space: nowrap;
            width: 1px;
        }
        .tari_checkbox-input:checked + .tari_checkbox-tile {
            border-color: #2260ff;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            color: #2260ff;
        }
        .tari_checkbox-input:checked + .tari_checkbox-tile:before {
            transform: scale(1);
            opacity: 1;
            background-color: #2260ff;
            border-color: #2260ff;
        }
        .tari_checkbox-input:checked + .tari_checkbox-tile .tari_checkbox-icon, .tari_checkbox-input:checked + .tari_checkbox-tile .tari_checkbox-label {
            color: #2260ff;
        }
        .tari_checkbox-input:focus + .tari_checkbox-tile {
            border-color: #2260ff;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1), 0 0 0 4px #b5c9fc;
        }
        .tari_checkbox-input:focus + .tari_checkbox-tile:before {
            transform: scale(1);
            opacity: 1;
        }
        .tari_checkbox-tile {
            display: flex;
            /* flex-direction: column; */
            align-items: center;
            justify-content: center;
            width: 9rem;
            min-height: 2rem;
            border-radius: 0.5rem;
            border: 2px solid #b5bfd9;
            background-color: #fff;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            transition: 0.15s ease;
            cursor: pointer;
            position: relative;
        }
        .tari_checkbox-tile:before {
            content: "";
            position: absolute;
            display: block;
            width: 1.25rem;
            height: 1.25rem;
            border: 2px solid #b5bfd9;
            background-color: #fff;
            border-radius: 50%;
            top: 0.25rem;
            left: 0.25rem;
            opacity: 0;
            transform: scale(0);
            transition: 0.25s ease;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='192' height='192' fill='%23FFFFFF' viewBox='0 0 256 256'%3E%3Crect width='256' height='256' fill='none'%3E%3C/rect%3E%3Cpolyline points='216 72.005 104 184 48 128.005' fill='none' stroke='%23FFFFFF' stroke-linecap='round' stroke-linejoin='round' stroke-width='32'%3E%3C/polyline%3E%3C/svg%3E");
            background-size: 12px;
            background-repeat: no-repeat;
            background-position: 50% 50%;
        }
        .tari_checkbox-tile:hover {
            border-color: #2260ff;
        }
        .tari_checkbox-tile:hover:before {
            transform: scale(1);
            opacity: 1;
        }

        .tari_checkbox-label {
            color: #707070;
            transition: 0.375s ease;
            text-align:center;
            font-size:10px;
        }  



        .main-content .wizard-form .progressbar-list::before {

            content: "";
            background-color: rgb(46, 45, 45);
            border: 10px solid #fff;
            border-radius: 50%;
            display: block;
            width: 30px;
            height: 30px;
            margin: 9px auto;
            box-shadow: 1px 1px 3px #606060;
            transition: all;
            }

            .main-content .wizard-form .progressbar-list::after {
            content: "";
            background-color: gray;
            padding: 0px 0px;
            position: absolute;
            top: 14px;
            left: -50%;
            width: 100%;
            height: 1px;
            margin: 9px auto;
            z-index: -1 !important;
            transition: all 0.8s;
            }

            .main-content .wizard-form .progressbar-list.active::after {
            background-color: #3c68b0;
            }

            .main-content .wizard-form .progressbar-list:first-child::after {
            content: none;
            }

            .main-content .wizard-form .progressbar-list.active::before {
            font-family: "Font Awesome 5 free";
            content: "\f00c";
            font-size: 11px;
            font-weight: 600;
            color: #fff;
            padding: 6px;
            background-color: #3c3cb0;
            border: 1px solid #3c3cb0;
            box-shadow: 0 0 0 7.5px rgb(118 60 176 / 11%);
            }

            .progressbar-list {
            color: #6f787d;
            }

            .active {
            color: #1c317e;
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
    
    <div class="grid-container" >
        
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
        <?php include('modalcontent.php'); ?>

        <!----Main----->
        <main class="main-container">


          
            


            <?php


                $prossel_query = mysqli_query($link,"SELECT * FROM `agencyorschoolowner` INNER JOIN `institution` ON `agencyorschoolowner`.`AgencyOrSchoolOwnerID` = 
                `institution`.`AgencyOrSchoolOwnerID` WHERE `institution`.`AgencyOrSchoolOwnerID`='$UserID'");
                $prossel_query_cnt = mysqli_num_rows($prossel_query);

                $prossel_query_cnt_row = mysqli_fetch_assoc($prossel_query);



                if($prossel_query_cnt > 0)
                {

                            $InstitutionGeneralName_sendova = $prossel_query_cnt_row['InstitutionGeneralName'];
                            $InstitutionEmail_sendova = $prossel_query_cnt_row['InstitutionEmail'];
                            $InstitutionPhone_sendova = $prossel_query_cnt_row['InstitutionPhone'];
                            $SendovaApiKey = $prossel_query_cnt_row['SendovaApiKey'];
                            $SendovaSecreteKey = $prossel_query_cnt_row['SendovaSecreteKey'];
                            $SendovaBrandID = $prossel_query_cnt_row['SendovaBrandID'];



                }else
                {


                    $InstitutionGeneralName_sendova = '';
                    $InstitutionEmail_sendova = '';
                    $InstitutionPhone_sendova = '';
                    $SendovaApiKey = '';
                    $SendovaSecreteKey = '';
                    $SendovaBrandID = '';
                }


                echo '
                
                   <input type="hidden" value="'.  $InstitutionEmail_sendova.'" class="prosloadcuseremailforaccount">
                    <input type="hidden" value="'.$InstitutionGeneralName_sendova.'" class="prosloadusernameformarkettings">
                    <input type="hidden" value="'. $InstitutionPhone_sendova.'" class="prosloadphonenumbersendover">
                     <input type="hidden" value="" class="prosloadimagecontentmarketting">

                     <input type="hidden" value="'. $InstitutionGeneralName_sendova.'" class="prosloadinstitutionforaccounthere">



                     
                    <input type="hidden" value="'.$InstitutionEmail_sendova.'" class="prosloadcuseremailforaccount">
                    <input type="hidden" value="'.$SendovaApiKey.'" class="prosloadinsitutioapikey">
                    <input type="hidden" value="'.$SendovaSecreteKey.'" class="prosloadinsitutionsecretekey">
                    <input type="hidden" value="'.$SendovaBrandID .'" class="abba-change-brand">
                ';


               

               


            ?>

            <div class="main-cards" style="margin-top: 50px;">

                        <ul class="nav nav-pills mb-3 renceTab prosloadhidetablist" id="pills-tab" role="tablist">
                        <li class="nav-item border" role="presentation" >
                            <a href="Javascript:;" class="nav-link active abba_tab_checker_for_summary" data-id="student" data-sumdiv="student_summary_div" id="pills-classsetting-tab" data-bs-toggle="pill" data-bs-target="#pills-classsetting" type="button" role="tab" aria-controls="pills-classsetting" aria-selected="true">Funnel</a>
                        </li>
                        <li class="nav-item border" role="presentation">
                            <a href="Javascript:;" class="nav-link abba_tab_checker_for_summary" data-id="parent" data-sumdiv="parent_summary_div" id="pills-websitting-tab" data-bs-toggle="pill" data-bs-target="#pills-websitting" type="button" role="tab" aria-controls="pills-websitting" aria-selected="false">Tags</a>
                        </li>
                        <li class="nav-item border" role="presentation">
                            <a href="Javascript:;" class="nav-link abba_tab_checker_for_summary" data-id="parent" data-sumdiv="parent_summary_div" id="pills-admissionletter-tab" data-bs-toggle="pill" data-bs-target="#pills-admissionletter" type="button" role="tab" aria-controls="pills-admissionletter" aria-selected="false">Contact</a>
                        </li>
                        <li class="nav-item border" role="presentation">
                            <a href="Javascript:;" class="nav-link abba_tab_checker_for_summary" data-id="parent" data-sumdiv="parent_summary_div" id="pills-campaign-tab" data-bs-toggle="pill" data-bs-target="#pills-campaign" type="button" role="tab" aria-controls="pills-campaign" aria-selected="false">Campaign</a>
                        </li>
                        </ul>
                        <div class="tab-content prosloadtabhidecontent" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-classsetting" role="tabpanel" aria-labelledby="pills-classsetting-tab">
                            <div class="row">
                                <div class="col-12">
                                    <button type="button" style="font-size: 13px;border:none;font-weight:500;" class="btn btn-sm  text-light float-end btn-primary" data-bs-toggle="modal" data-bs-target="#proscreate-funnnelmodal">Add Funnel</button>
                                </div>
                            </div>

                            <div class="container mt-5">
                                <div class="row justify-content-center prosloadfunnelcontenthere">
                                    <!-- <div align="center">
                                    <img width="48" height="48" src="https://img.icons8.com/external-sapphire-kerismaker/48/external-Not-Found-web-design-sapphire-kerismaker.png" alt="external-Not-Found-web-design-sapphire-kerismaker">
                                    <p class="pt-2 fs-6 text-secondary">No Funnel found.</p>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="pills-websitting" role="tabpanel" aria-labelledby="pills-websitting-tab">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="button" style="font-size: 13px;border:none;font-weight:500;" class="btn btn-sm  text-light float-end btn-primary" data-bs-toggle="modal" data-bs-target="#proscreate-tagsmodal">Add Tag</button>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="card">
                                        <div class="card-body">
                                            <h4>List Of Tags</h4>
                                            <div class="tags-container">
                                                <div class="prosloadtagcontentformarketting"></div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="pills-admissionletter" role="tabpanel" aria-labelledby="pills-admissionletter-tab">
                            <div class="row">
                                <!-- Nav tabs -->
                                <div class="col-sm-12">
                                    <ul class="nav nav-tabs mb-3 customtab" id="ex1" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="ex1-tab-1" data-bs-toggle="tab" href="#ex1-tabs-1" role="tab" aria-controls="ex1-tabs-1" aria-selected="true">All Contacts</a>
                                    </li>
                                    </ul>
                                    <div class="tab-content" id="ex1-content">
                                    <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="row">
                                                <!-- Tag List -->
                                                <div class="col-sm-12 col-md-12 col-lg-3">
                                                <div class="card" style="margin-top:15px">
                                                    <div class="card-header">
                                                        <div style="display: flex; justify-content: space-between; align-items: center;">
                                                            <div>
                                                            <h5>Tags</h5>
                                                            </div>
                                                        </div>
                                                        <p>Select from the Tag List</p>
                                                    </div>
                                                    <div class="">
                                                        <ul class="list-group list-group-flush display_tags"></ul>
                                                        <div class="card-footer">
                                                            <button style="width:100%" type="button" class="btn btn-outline-secondary get_contact_list">Load Contacts</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <!-- Tag List ends here -->
                                                <!--Contact List  -->
                                                <div class="col-sm-6 col-md-8 col-lg-9">
                                                <div class="row g-2">
                                                    <div class="col-md- 12 pros_action_btns" style="display:none;">
                                                        <button type="button" style="float:right;margin-bottom:2px;margin-right:10px;font-size: 13px;border:none;font-weight:500;  padding:7px;" class="btn btn-sm btn-primary text-light open_delete_contact_modal">Delete</button> <button type="button" style="float:right;margin-bottom:2px;margin-right:10px;font-size: 13px;border:none;font-weight:500; background-color:#3B71CA; padding:7px;" class="btn btn-sm btn-primary text-light open_send_message_modal">Send Message</button> <button type="button" style="float:right;margin-bottom:2px;margin-right:10px;font-size: 13px;border:none;font-weight:500; background-color:#E4A11B; padding:7px;" class="btn btn-sm btn-primary text-light open_edit_tag_modal">Edit Tag</button>
                                                    </div>
                                                </div>
                                                <div class="card" style="padding:20px; margin-top:15px">
                                                    <div class="row">
                                                        <div class="col-md-12 col-lg-9"></div>
                                                        <div class="col-md-12 col-lg-3">
                                                            <button type="button" style="float:right;margin-bottom:2px;margin-right:10px;font-size: 13px;border:none;font-weight:500;  padding:7px;" class="btn btn-sm btn-primary text-light" data-bs-toggle="modal" data-bs-target="#AddContactModal">Add Contact</button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body pros_display_table table-responsive">
                                                        <center>
                                                            <img width="48" height="48" src="https://img.icons8.com/external-topaz-kerismaker/48/external-Not-Found-empty-state-topaz-kerismaker.png" alt="external-Not-Found-empty-state-topaz-kerismaker">
                                                            <p>Select Tag to view contact</p>
                                                        </center>
                                                    </div>
                                                </div>
                                                </div>
                                                <!--End Contact List  -->
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- Tab panes -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="pills-campaign" role="tabpanel" aria-labelledby="pills-campaign-tab">
                            <div class="card" style="padding:20px; margin-top:15px">
                                <div class="row">
                                    <div class="col-md-12 col-lg-9"></div>
                                    <div class="col-md-12 col-lg-3">
                                    <button type="button" style="float:right;margin-bottom:2px;margin-right:10px;font-size: 13px;border:none;font-weight:500;       padding:7px;" class="btn btn-sm  text-light btn-primary" data-bs-toggle="modal" data-bs-target="#setcampaignModal">Set Campaign <i class="fa fa-bullhorn"></i></button>
                                    </div>
                                </div>
                                <br>
                                <div class="row g-2">
                                    <div class="col-md-2 col-lg-2">
                                    <select style="color: #666666;"
                                        class="form-select form-select-sm pros_load_funnel_preview"
                                        aria-label=".form-select-sm example">
                                        <option value="NULL">Select Funnel</option>
                                    </select>
                                    </div>
                                    <div class="col-md-2 col-lg-2">
                                    <select style="color: #666666;"
                                        class="form-select form-select-sm pros_load_tag_preview"
                                        aria-label=".form-select-sm example ">
                                        <option selected value="NULL">Select Tag</option>
                                    </select>
                                    </div>
                                    <div class="col-md-2 col-lg-2">
                                    <button type="button" style="margin-left: 10px; font-size: 11px; height: 30px; width: 70px; border-radius: 5px;" class="btn text-light  btn-sm pros_load_campaig_btn">Load</button>
                                    </div>
                                </div>
                                <br>
                                <div class="card-body  table-responsive ">
                                    <div class="row g-4 mt-1 maincard selectBox-cont prosload_campaign_history">
                                    <center>
                                        <img width="48" height="48" src="https://img.icons8.com/external-topaz-kerismaker/48/external-Not-Found-empty-state-topaz-kerismaker.png" alt="external-Not-Found-empty-state-topaz-kerismaker">
                                        <p>Filter to load campaign</p>
                                    </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>

        </main>
        <!-- End Main -->

        


    </div>

     <!--jquery knob -->
     <script src="../../assets/plugins/knob/jquery.knob.js"></script>

    <!--Custom JS--->
    <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- header js -->
    <?php include('../../controller/js/app/header.php'); ?>
     <script src="../../js/jquery.dataTables.min.js"></script>

    <!-- notification js -->
    <script src="../../assets/plugins/notify/wnoty.js"></script>

    <script src="../../js/admin_js/adminScript.js"></script>
    
    <!-- current page js -->
    <?php include('../../js/current_page.php'); ?>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    
    




    <script>
// // create a function to update the date and time
// function updateDateTime() {
//     // create a new `Date` object
//     const now = new Date();

//     // get the current date and time as a string
//     const currentDateTime = now.toLocaleString();

//     // update the `textContent` property of the `span` element with the `id` of `datetime`
//     document.querySelector('#datetime').textContent = currentDateTime;
// }

// // call the `updateDateTime` function every second
// setInterval(updateDateTime, 1000);

</script>


<script>

function downloadFiles() {
    
    const fileUrls = [
        '../../documents/contact-upload-format.csv',
        '../../documents/country-and-state-ids.csv',
        
    ];
    
    fileUrls.forEach(fileUrl => {
        
        const link = document.createElement('a');
        link.href = fileUrl;
        
        link.setAttribute('download', '');
        
        document.body.appendChild(link);
        
        link.click();
        
        document.body.removeChild(link);
    });
}

document.getElementById('downloadBtn').addEventListener('click', downloadFiles);
</script>


<!-- ========FULL SENDOVAL CONTACT SCRIPT======= -->




<script>





//SEND REQUESTION TO CREATE USER FROM SENDOVA




$(document).ready(function(){

$('.msg_bodyemail').summernote();
$('.msg_bodycampaignemail1').summernote();

});

$(document).ready(function(){
// Handle collapse events
$('.collapse').on('show.bs.collapse', function () {
  var currentCollapseId = $(this).attr('id');
  // Close other collapsibles
  $('.collapse').not('#' + currentCollapseId).collapse('hide');
});
});


$(document).ready(function () {


var MainNumber2 = window.intlTelInput(document.querySelector("#phone2"), {
separateDialCode: true,
preferredCountries:["ng"],
hiddenInput: "full",
utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
});



var MainNumber2edit = window.intlTelInput(document.querySelector("#phone2edit"), {

separateDialCode: true,
preferredCountries:["ng"],
hiddenInput: "full",
utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
});

});



// PROS REGISTER USER HERE
$(document).ready(function() {



            var email = $('.prosloadcuseremailforaccount').val();
            var name = $('.prosloadusernameformarkettings').val();
            var phonenum = $('.prosloadphonenumbersendover').val();
            var imagenewcontent = $('.prosloadimagecontentmarketting').val();
            var institutionname = $('.prosloadinstitutionforaccounthere').val();

            



            // Create a JSON object with the data

                var data = {
                    "email": email,
                    "name": name,
                    "phone": phonenum,
                    "image": imagenewcontent,
                    "brand": institutionname
                };

            // Convert the data object to JSON string
            var jsonData = JSON.stringify(data);

            // // Create a new XMLHttpRequest
            var request = new XMLHttpRequest();

            // // Set up the request
            request.open('POST', 'https://sendova.co/api/create-account/');
            request.setRequestHeader('Content-Type', 'application/json');

            // Define the callback function to handle the response
            request.onreadystatechange = function () {
                if (this.readyState === XMLHttpRequest.DONE) {
                    // alert(this.status);

                    if (this.status === 200) {

                        var abc = this.responseText;

                        // alert(abc);

                        // // Request successful, handle response
                        var response = JSON.parse(this.responseText);

                        var apikey = response["responseBody"]['apikey'];
                        var secretekey = response["responseBody"]['secretekey'];

                        var brand_id = response["responseBody"]['brand_id'];
                        


                        
                        var status = response["responseMessage"];


                            if(status.trim() == 'success')
                            {


                                     prosupdateapikeyandsecrete(apikey,secretekey, brand_id);
                                    
                            }else
                            {
                            
                            }

                        // alert("Response: " + JSON.stringify(response));

                    
                    } else {

                        // Request failed, handle error
                        // alert("Error: " + this.status);
                    }
                }
            };

            // // Send the request with the JSON data as the body
            request.send(jsonData);
                        
                            


});
// PROS REGISTER USER  END HERE




// PROS CRETE FUNNEL CLICK
$('body').on('click', '.proscreatefunnel-btn', function() {



  var funnelname =  $('.proscreatefunnelhere').val();


  if(funnelname == '')
  {


            $.wnoty({
                type: 'warning',
                message: 'Funnel should not be left empty',
                autohideDelay: 5000
            });

  }else
  {


       var verificationstate = 'funnel';
      prosauthorizationfunction(verificationstate);

  }









});

// PROS CRETE FUNNEL CLICK END


// PROS CRETE TAG CLICK
$('body').on('click', '.proscreatetags-btn', function() {

    var verificationstate = 'tag';
    prosauthorizationfunction(verificationstate);


});


// PROS CRETE TAG CLICK END

function prosauthorizationfunction(verificationstate)
{


    if(verificationstate == 'funnel')
    {


        $('.proscreatefunnel-btn').html('<center><i class="fa fa-spinner fa-spin fs-3"></i></center>');



    }else if(verificationstate == 'tag')
    {

         $('.proscreatetags-btn').html('<center><i class="fa fa-spinner fa-spin fs-3"></i></center>');

    }else if(verificationstate == 'loadfunnel')
    {


          $('.prosloadfunnelcontenthere').html('<center><i class="fa fa-spinner fa-spin fs-3 text-primary"></i></center>');
          $('.prosloadtagcontentformarketting').html('<center><i class="fa fa-spinner fa-spin fs-3 text-primary"></i></center>');

    }else if(verificationstate == 'editfunnel')
    {


          $('.proscreateeditfunnel-btn').html('<center><i class="fa fa-spinner fa-spin fs-3 text-light"></i></center>');


    }else if(verificationstate == 'edittag')
    {
        $('.prosedittags-btn').html('<center><i class="fa fa-spinner fa-spin fs-3 text-light"></i></center>');
    }else if(verificationstate == 'loadtagforassign'){
        $('.prosloadtagforassigncontent').html('<center><i class="fa fa-spinner fa-spin fs-3 text-primary"></i></center>');
    }else if(verificationstate == 'assigntag')
    {
        $('.prosassigntagbtn').html('<center><i class="fa fa-spinner fa-spin fs-3 text-light"></i></center>');
    }else if(verificationstate == 'addcontact')
    {

        $('#pros_add_contact_btn').html('<center><i class="fa fa-spinner fa-spin fs-3 text-light"></i></center>');
    }else if(verificationstate == 'loadcontact')
    {

       
        $('.pros_display_table').html('<center><i class="fa fa-spinner fa-spin fs-3 text-primary"></i></center>');

    }else if(verificationstate == 'prosloadtagonchnagefunel')
    {
        $('.pros_add_tag_campaign').html('<option value="NULL">loading...</option>');
    }else if(verificationstate == 'prosloadtagonchnagefunelview')
    {


        $('.pros_load_tag_preview').html('<option value="NULL">loading...</option>');

    }else if(verificationstate == 'prosloadcampaignview'){

        $('.prosload_campaign_history').html('<center><i class="fa fa-spinner fa-spin fs-3 text-primary"></i></center>');

    }else if(verificationstate == 'prosloadcampaignedit'){


        $('.prosloadcamapiagncontentforview').html('<center><i class="fa fa-spinner fa-spin fs-3 text-primary"></i></center>');

        
    }else if(verificationstate == 'schedulemailedit')
    {

            $('.pros_submitcampaig_editbtn').html('<center><i class="fa fa-spinner fa-spin fs-3 text-primary"></i></center>');

    }else if(verificationstate == 'loadtagsconteview')
    {

        $('.prosloadtagcontentformarketting').html('<center><i class="fa fa-spinner fa-spin fs-3 text-primary"></i></center>');
    }


 


       


    
                var email = $('.prosloadcuseremailforaccount').val();
                var secret_key = $('.prosloadinsitutionsecretekey').val();
                var api_key = $('.prosloadinsitutioapikey').val();
                
               console.log(btoa(api_key + ':' + secret_key));

            //   alert(api_key);

                

                var request = new XMLHttpRequest();

                // Set up the request
                request.open('POST', 'https://sendova.co/api/authorization/');
                request.setRequestHeader('Content-Type', 'application/json');
                request.setRequestHeader('Authorization',  btoa(api_key + ':' + secret_key)); // Add Authorization header

                // Define the callback function to handle the response
                request.onreadystatechange = function () {
                    if (this.readyState === XMLHttpRequest.DONE) {
                        if (this.status === 200) {

                             var abc = this.responseText;

                            //  alert(abc);
                            // alert(abc);

                            // console.log(abc);

                        
                            var response = JSON.parse(this.responseText);
                            
                            
                        

                            if (response.requestSuccessful) {



                                // SK_PROD_IzS8GTl798
                                // n0ujsEiJ7hR1MVjUMD9VfTuwTLjYU4LS
                                // console.log(response.responseMessage);
                                // console.log(response.responseDescription);


                                var token =  response.responseBody.accessToken;
                                var epirery =   response.responseBody.expiresIn;
                                
                            //   console.log(token);
                                
                                // alert(token);


                                    if(verificationstate == 'funnel')
                                    {
                                           prosinsertfunnel(token);
                                           prosloadfunnelcontenthere(token);


                                    }else if(verificationstate == 'tag')
                                    {
                                           prosinsert_tag(token);

                        
                                    }else if(verificationstate == 'loadfunnel')
                                    {

                                        prosloadfunnelcontenthere(token);
                                        prosloadtagcontent(token);
                                        prosloadcountryfunction(token);
                                        prosloacontactcontentfunction(token);


                                    }else if(verificationstate == 'editfunnel')
                                    {

                                            prosprocessfunneledit(token);

                                    }else if(verificationstate == 'edittag')
                                    {
                                                prosedittagscontent(token);

                                    }else if(verificationstate == 'loadtagforassign'){

                                        prosloadtagsconforassign(token);

                                       
                                    }else if(verificationstate == 'assigntag')
                                    {
                                        proscompletetagassign(token);

                                    }else if(verificationstate == 'loadstate')
                                    {
                                        prosloadsatecontentfunction(token);
                                    }else if(verificationstate == 'addcontact')
                                    {

                                        proscreateuserfunction(token);


                                    } else if(verificationstate == 'loadcontact')
                                    {

                                            prosloacontactcontentfunction(token);

                                    } else if(verificationstate == 'prossendmsgschdule')
                                    {

                                            prossendschmsgcontent(token);

                                    }
                                    else if(verificationstate == 'proslviewcontactinfo')
                                    {

                                        prosloadcontactinfoforedit(token);

                                    }else if(verificationstate == 'loadstateedit')
                                    {

                                        prosloadstateforeditandview(token);




                                    }else if(verificationstate == 'loadcountry')
                                    {

                                        prosloadcountryfunction(token);

                                    }else if(verificationstate == 'loadtagsconteview')
                                    {
                                        prosloadtagcontent(token);

                                    }else if(verificationstate == 'proseditcontact')
                                    {

                                        prosediteitcontactfunction(token);

                                    }else if(verificationstate == 'proseditcontacttags')
                                    {

                                        proseditcontacttag(token);


                                    }else if(verificationstate == 'prosdeletecontact')
                                    {

                                        prosdeletecontactfun(token);

                                    }else if(verificationstate == 'prosmailmsg')
                                    {
                                            prossendemailmsgcontent(token);
                                            
                                    }else if(verificationstate == 'prossmsmsg')
                                    
                                    {
                                        
                                        
                                          prossendmsgmsgfunc(token);
                                        
                                        
                                    }
                                    
                                    else if(verificationstate == 'schedulewamsg')
                                    {

                                        prosshedulewacampaign(token);

                                    }else if(verificationstate == 'prosloadtagonchnagefunel')
                                    {

                                        prosloadtaforcampaign(token);

                                    }else if(verificationstate == 'prosloadtagonchnagefunelview')
                                    {
                                            prosloadtaforcampaigntaghistor(token);

                                    }else if(verificationstate == 'prosloadcampaignview')
                                    {

                                        prosloadcampaignhistorcont(token);

                                    }else if(verificationstate == 'prosloadcampaignedit')
                                    {
                                       
                                                loadcampaigncontentfunction(token);

                                    }else if(verificationstate == 'schedulewaedit')
                                    {

                                           proseditcampaignfuncs(token);

                                    }else if(verificationstate == 'schedulemailedit')
                                    {
                                         proseditcampaignemailfunc(token);

                                    }else if(verificationstate == 'schedulsmsedit')
                                    {
                                          proseditcampaignsmsfunc(token);
                                    }
                                    
                                    

                                    
                                    
                                    else if(verificationstate == 'prosdelcampiagn')
                                    {
                                           prosdeletecampaignfunct(token);

                                    }else if(verificationstate == 'scheduleemailmsg')
                                    {

                                        proscreateemailcampiagn(token);
                                    }else if(verificationstate == 'schedulesmsmsg'){
                                        
                                        
                                         proscreatesmscampiagn(token);
                                        
                                        
                                    }else if(verificationstate == 'proscreateoptimform')
                                    {
                                        proscreateoptimfunctionhere(token);
                                    }else if(verificationstate == 'prosloadoptimforfunnel')
                                    {

                                          prosloadoptimformcontent(token);


                                    }

                                    
                                    
                                    
                                    
                                    


                                    


                                   
                                   
                                    



                                    

                            } else {
                                // alert(response.responseMessage);
                            }
                        } else {

                            
                            // Request failed, handle error
                            // alert("Error: " + this.status);



                             
                                $('.prosloadfunnelcontenthere').html(`<center>
                                <img width="48" height="48" src="https://img.icons8.com/external-topaz-kerismaker/48/external-Not-Found-empty-state-topaz-kerismaker.png" alt="external-Not-Found-empty-state-topaz-kerismaker"/>
                                <p>Connection error!! Please check your internet connection</p>
                                </center>`);

                                $('.prosload_campaign_history').html(`<center>
                                <img width="48" height="48" src="https://img.icons8.com/external-topaz-kerismaker/48/external-Not-Found-empty-state-topaz-kerismaker.png" alt="external-Not-Found-empty-state-topaz-kerismaker"/>
                                <p>Connection error!! Please check your internet connection</p>
                                </center>`);

                                $('.pros_display_table').html(`<center>
                                <img width="48" height="48" src="https://img.icons8.com/external-topaz-kerismaker/48/external-Not-Found-empty-state-topaz-kerismaker.png" alt="external-Not-Found-empty-state-topaz-kerismaker"/>
                                <p>Connection error!! Please check your internet connection</p>
                                </center>`);

                                
                                $('.prosloadtagcontentformarketting').html(`<center>
                                <img width="48" height="48" src="https://img.icons8.com/external-topaz-kerismaker/48/external-Not-Found-empty-state-topaz-kerismaker.png" alt="external-Not-Found-empty-state-topaz-kerismaker"/>
                                 <p>Connection error!! Please check your internet connection</p>
                                 </center>`);


                                 $('#pros_proceed_to_delete_campaign_btn').html(`<i class="fa fa-solid fa-trash" aria-hidden="true"> Delete</i>`);




                         }
                    }
        };

        // Send the request
        request.send();

}



// PROS CRETE FUNNEL  START HERE
function  prosinsertfunnel(token)
{

        var funneltitle = $('.proscreatefunnelhere').val();
        var brand_id = $('.abba-change-brand').val();

    

        $('.proscreatefunnel-btn').prop('disabled', true);


        // Create a JSON object with the data

            var data = {
                "brand_id": brand_id,
                "funneltitle": funneltitle,
                "token": token
              
            };

        // Convert the data object to JSON string
        var jsonData = JSON.stringify(data);

        // // Create a new XMLHttpRequest
        var request = new XMLHttpRequest();

        // // Set up the request
        request.open('POST', 'https://sendova.co/api/create-funnel/');
        request.setRequestHeader('Content-Type', 'application/json');

        // Define the callback function to handle the response
        request.onreadystatechange = function () {
            if (this.readyState === XMLHttpRequest.DONE) {
                $('.proscreatefunnel-btn').html(' Save Now  <i class="fa fa-funnel-dollar"></i> ');
                $('.proscreatefunnel-btn').prop('disabled', false);
                $('#proscreate-funnnelmodal').modal('hide');

                

            

                if (this.status === 200) {

                    //   var abc = this.responseText;

                    //   alert(abc);

                    // // Request successful, handle response


                    var response = JSON.parse(this.responseText);
                

                    var requestsucces = response["requestSuccessful"];
                    var status = response["responseMessage"];
                    var responseDescription = response["responseDescription"];


                



                    if(status.trim() == 'success')
                    {


                                $.wnoty({
                                    type: 'success',
                                    message: responseDescription,
                                    autohideDelay: 5000
                                });

                                prosloadfunnelcontenthere(token);

                    }else
                    {

                            $.wnoty({
                                type: 'warning',
                                message: responseDescription,
                                autohideDelay: 5000
                            });

                    }

                    

                    
                } else {

                    // Request failed, handle error
                    // alert("Error: " + this.status);
                }
            }
        };

        // // Send the request with the JSON data as the body
        request.send(jsonData);
                        

        

}
// PROS CRETE FUNNEL  END HERE




function prosinsert_tag(token)
{



$('.proscreatetags-btn').prop('disabled', true);


var tag = $('.proscreatetagshere').val();
var brand_id = $('.abba-change-brand').val();




// Create a JSON object with the data

    var data = {
        "brand_id": brand_id,
        "tag": tag,
        "token": token
        
    };

// Convert the data object to JSON string
var jsonData = JSON.stringify(data);

// // Create a new XMLHttpRequest
var request = new XMLHttpRequest();

// // Set up the request
request.open('POST', 'https://sendova.co/api/create-tag/');
request.setRequestHeader('Content-Type', 'application/json');

// Define the callback function to handle the response
request.onreadystatechange = function () {
    if (this.readyState === XMLHttpRequest.DONE) {
        
        $('.proscreatetags-btn').html('Save Now  <i class="fa fa-poll"></i>');
        $('.proscreatetags-btn').prop('disabled', false);
        $('#proscreate-tagsmodal').modal('hide');


        if (this.status === 200) {

            //   var abc = this.responseText;

            //   alert(abc);

            // // Request successful, handle response


            var response = JSON.parse(this.responseText);
        

            var requestsucces = response["requestSuccessful"];
            var status = response["responseMessage"];
            var responseDescription = response["responseDescription"];





            if(status.trim() == 'success')
            {


                        $.wnoty({
                            type: 'success',
                            message: responseDescription,
                            autohideDelay: 5000
                        });


                        prosloadtagcontent(token);


            }else
            {

                    $.wnoty({
                        type: 'warning',
                        message: responseDescription,
                        autohideDelay: 5000
                    });

            }

            

            
        } else {

            // Request failed, handle error
            // alert("Error: " + this.status);
        }
    }
};

// // Send the request with the JSON data as the body
request.send(jsonData);
                

           

}



//  PROS LOAD TAGS FOR ASSIGN

function prosloadtagsconforassign(token)
{


    var brand_id = $('.abba-change-brand').val();
    var funnel_id =  $('.prosloadfunnelfortagassign').val();
    // var brand_id =  $('.abba-change-brand').val();


     
   

        var data = {
            
            "token": token,
            "brand_id": brand_id,
            "funnel_id": funnel_id
           
        };





        // Convert the data object to JSON string
        var jsonData = JSON.stringify(data);
         // Create a new XMLHttpRequest
        var request = new XMLHttpRequest();


 

        // // Set up the request
        request.open('POST', 'https://sendova.co/api/assigntags-funnel/');
        request.setRequestHeader('Content-Type', 'application/json');

            // Define the callback function to handle the response
        request.onreadystatechange = function () {

      
            if (this.readyState === XMLHttpRequest.DONE) {

                if (this.status === 200) {

                    var abc = this.responseText;


                    // alert(abc);
                   




                    var response = JSON.parse(this.responseText);
                    

                    var status = response["responseMessage"];
                    var request = response["requestSuccessful"];
                    var des = response["responseDescription"];

                    var funnelcontent = response["responseBody"];




                    



                    // console.log(funnelcontent);


                    if(status.trim() == 'success')
                    {


                                var prosloadcontenten = '';



                                    if(funnelcontent.length > 1)
                                    {


                                        prosloadcontenten+=` <div class="col-md-12">
                                        <fieldset class="tari-tari_checkbox-group">
                                            <div class="tari_checkbox ">
                                                <label for="prosloadtagselectforall" class="tari_checkbox-wrapper">
                                                <input type="checkbox" value="all" id="prosloadtagselectforall" class="tari_checkbox-input ">
                                                <span class="tari_checkbox-tile">
                                                    <span class="tari_checkbox-label">
                                                        Select All
                                                    </span>
                                                </span>
                                                </label>
                                            </div>
                                        </fieldset>
                                    </div>`;


                


                                    }else
                                    {
                                        
                                    }

                            for (var i = 0; i < funnelcontent.length; i++) {

                              
                                var item = funnelcontent[i];



                                    // console.log("Funnel Title: " + item.tag_title);
                                    // console.log("Funnel ID: " + item.tag_id);
                                    // console.log("Brand ID: " + item.brand_id);



                                  var assignstaus =  item.assign_status;
                                //   alert(assignstaus);

                                  var checksatus = '';
                                  var disabled = '';

                                  if(assignstaus == 'assigned')
                                  {

                                        checksatus+='checked';

                                        disabled+='disabled';
                                    

                                  }else
                                  {

                                  }




                                   var prosloadfunnelcontent = `    <div class="col-md-12 col-lg-3 col-sm-3">
                                    <fieldset class="tari-tari_checkbox-group">
                                        <div class="tari_checkbox ">
                                            <label for="prosloadtagcheckbox${item.tag_id}" class="tari_checkbox-wrapper">
                                            <input type="checkbox" ${checksatus} ${disabled} value="${item.tag_id}" id="prosloadtagcheckbox${item.tag_id}" class="tari_checkbox-input prosloadfunnelcontentautomaticallycheck${funnel_id} " >
                                            <span class="tari_checkbox-tile" >
                                            <span class="tari_checkbox-label">${item.tag_title}<br> </span>
                                            </span>
                                            </label>
                                        </div>
                                    </fieldset>
                                   </div>`;


                                        prosloadcontenten+=prosloadfunnelcontent;




                             



                               
                            }


                          

                           

                            $('.prosloadtagforassigncontent').html(prosloadcontenten);
                            

                    }else
                    {

                    }




                    
                } else {

                    // Request failed, handle error
                        // alert("Error: " + this.status);

                        console.log("Error: " + this.status);
                    }
                }
            };

            // // Send the request with the JSON data as the body
         request.send(jsonData);










}


function proscompletetagassign(token)
{



 var brand_id = $('.abba-change-brand').val();
 var funnel_id = $('.prosloadfunnelfortagassign').val();


var tagid = [];

$('.prosloadfunnelcontentautomaticallycheck'+funnel_id +':checked').each(function() {

    tagid.push($(this).val());
});



if(tag_id == '')
{


    $.wnoty({
        type: 'warning',
        message: 'Select to tags',
        autohideDelay: 5000
    });


}else
{


    var tag_id = tagid.join(',');




        var data = {
            "token": token,
            "brand_id": brand_id,
            "funnel_id": funnel_id,
            "tag_id": tag_id
        };





        // Convert the data object to JSON string
        var jsonData = JSON.stringify(data);
         // Create a new XMLHttpRequest
        var request = new XMLHttpRequest();


        $('.prosassigntagbtn').prop('disabled', true);
        // $('.prosassigntagbtn').html('<i class="fa fa-solid fa-spinner fa-spin" style="font-size:15px;"></i>');

        // // Set up the request
        request.open('POST', 'https://sendova.co/api/assign-tag-funnel/');
        request.setRequestHeader('Content-Type', 'application/json');

            // Define the callback function to handle the response
        request.onreadystatechange = function () {

      
            if (this.readyState === XMLHttpRequest.DONE) {


                $('.prosassigntagbtn').prop('disabled', false);
                $('.prosassigntagbtn').html('Save Now  <i class="fa fa-poll"></i> ');

                if (this.status === 200) {

                    var abc = this.responseText;

                   




                    var response = JSON.parse(this.responseText);
                    

                    var status = response["responseMessage"];
                    var request = response["requestSuccessful"];
                    var des = response["responseDescription"];

                    // var funnelcontent = response["responseBody"];




                    



                    // console.log(funnelcontent);


                    if(status.trim() == 'success')
                    {


                               

                        $.wnoty({
                            type: 'success',
                            message: des,
                            autohideDelay: 7000
                        });

                                    

                          

                    }else
                    {

                        $.wnoty({
                            type: 'warning',
                            message: des,
                            autohideDelay: 7000
                        });


                    }




                    
                } else {

                    // Request failed, handle error
                        // alert("Error: " + this.status);

                        console.log("Error: " + this.status);
                    }
                }
            };

            // // Send the request with the JSON data as the body
         request.send(jsonData);






}



}






$(document).ready(function() {

var verificationstate = 'loadfunnel';
prosauthorizationfunction(verificationstate);


});




$('body').on('change', '.abba-change-brand', function() {


var verificationstate = 'loadfunnel';
prosauthorizationfunction(verificationstate);

});



// $(document).ready(function() {

//     var verificationstate = 'loadcountry';
//     prosauthorizationfunction(verificationstate);
// });



// $(document).ready(function() {

//     var verificationstate = 'loadtagsconteview';
//     prosauthorizationfunction(verificationstate);


// });






function prosloadfunnelcontenthere(token)
{




 

        var brand_id = $('.abba-change-brand').val();


      

        var data = {

            "brand_id": brand_id,
            "token": token
          
        };


        // Convert the data object to JSON string
        var jsonData = JSON.stringify(data);
         // Create a new XMLHttpRequest
        var request = new XMLHttpRequest();


 

        // // Set up the request
        request.open('POST', 'https://sendova.co/api/get-funnel-content/');
        request.setRequestHeader('Content-Type', 'application/json');

            // Define the callback function to handle the response
        request.onreadystatechange = function () {

      
            if (this.readyState === XMLHttpRequest.DONE) {

                if (this.status === 200) {




                    var abc = this.responseText;

                    

                   




                    var response = JSON.parse(this.responseText);
                    

                    var status = response["responseMessage"];
                    var request = response["requestSuccessful"];
                    var des = response["responseDescription"];

                    var funnelcontent = response["responseBody"];

                   


                    // console.log(funnelcontent);


                    if(status.trim() == 'success')
                    {






                        var prosloadcontentenoptions = '<option value="NULL">Select Funnel</option>';
                       
                                var prosloadcontenten = '';

                            for (var i = 0; i < funnelcontent.length; i++) {

                              
                                var item = funnelcontent[i];
                                // console.log("Funnel Title: " + item.funnel_title);
                                // console.log("Funnel ID: " + item.funnel_id);
                                // console.log("Brand ID: " + item.brand_id);



                                prosloadcontentenoptions+=`<option value="${item.funnel_id.toString()}">${item.funnel_title}</option>`;




                                   var prosloadfunnelcontent = ` <div class="col-md-4 mt-3">
                                            <div class="funnel-container">

                                          
                                           


                                        <div class="dropdown dropdown-sm float-end">

                                                <span class="mt-1 " role="button" id="dropdownMenuLinkparent13435" data-bs-toggle="dropdown" aria-expanded="true" style="float: right;  margin-right: 7px;">
                                                    <i class="bx bx-dots-horizontal-rounded" style="font-size: 22px;"></i>
                                                </span>
                                            
                                                <ul class="dropdown-menu shadow abba-parent-dropdown " aria-labelledby="dropdownMenuLinkparent13435" style="background: rgb(247, 255, 247); border: none; position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(-160px, 0px, 0px);" data-popper-placement="bottom-start" data-popper-reference-hidden="" data-popper-escaped="">

                                                    <li>
                                                        <a href="#prosloadassigntagmodal" data-bs-toggle="modal"  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-primary prosgeneralloadtagsforassign" data-id="${item.funnel_id}" data-brand="${item.brand_id}">  <i class="fa fa-poll"></i> Assign Tag </a>
                                                    </li>
                                                    
                                                    
                                                      <li>
                                                            <a href="#setoptimModal" data-bs-toggle="modal"  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-primary prosgeneraload_optimform" data-id="${item.funnel_id}" data-brand="${item.brand_id}">  <i class="fa fa-cog"></i> Up In Form</a>
                                                        </li>

                                                </ul>

                                            </div>



                                    
                                            <h4 class="funnel-title prosloadfullcontentfull${item.funnel_id}">${item.funnel_title}</h4>
                                          
                                            <div class="text-center">
                                            <img width="24" height="24" src="https://img.icons8.com/fluency/48/high-indicator-filter.png" alt="high-indicator-filter"/>
                                            </div>

                                            <div class="text-center mt-4">
                                              
                                                <button class="btn  btn-sm bg-warning text-light prosgeneraledtfunnelbutton" data-bs-toggle="modal"
                                                data-bs-target="#proscreate-editfunnnelmodal" data-title="${item.funnel_title}" data-id="${item.funnel_id}" data-brand="${item.brand_id}">Edit <i class="fa fa-edit"></i></button>
                                            </div>
                                            </div>
                                        </div> `;



                                        prosloadcontenten+=prosloadfunnelcontent;



                               
                            }


                             

                            $('.prosloadfunnelcontenthere').html(prosloadcontenten);

                            $('.pros_add_funnel_campaign').html(prosloadcontentenoptions);
                            $('.pros_load_funnel_preview').html(prosloadcontentenoptions);
                           

                    }else
                    {



                        $('.prosloadfunnelcontenthere').html(`<center>
                            <img width="48" height="48" src="https://img.icons8.com/external-topaz-kerismaker/48/external-Not-Found-empty-state-topaz-kerismaker.png" alt="external-Not-Found-empty-state-topaz-kerismaker"/>
                             <p>Funnel not found</p>
                             </center>`);
                    }






                 
                    // // Request successful, handle response
                    // var response = JSON.parse(this.responseText);
                
                    // var accessstoken = response["responseBody"]['apikey'];


                    // alert("Response: " + JSON.stringify(response));


                    
                } else {

                    // alert('hello');

                    // Request failed, handle error
                        // alert("Error: " + this.status);

                        console.log("Error: " + this.status);



                        $('.prosloadfunnelcontenthere').html(`<center>
                            <img width="48" height="48" src="https://img.icons8.com/external-topaz-kerismaker/48/external-Not-Found-empty-state-topaz-kerismaker.png" alt="external-Not-Found-empty-state-topaz-kerismaker"/>
                             <p>Connection error!! Please check your internet connection</p>
                             </center>`);

                        
                    }
                }
            };

            // // Send the request with the JSON data as the body
         request.send(jsonData);

}



$('body').on('click', '.prosgeneraledtfunnelbutton', function() {


     var prosloadtitle = $(this).data('title');
     var funnelid = $(this).data('id');
     var brand_id = $(this).data('brand');


      
     $('.prosloadbrandid').val(brand_id);
     $('.prosloadfunnelid').val(funnelid);

    

     $('.proscreateeditfunnelhere').val(prosloadtitle);

    


});


$('body').on('click', '.proscreateeditfunnel-btn', function() {


    var verificationstate = 'editfunnel';
    prosauthorizationfunction(verificationstate);

});


$('body').on('click', '.prosassigntagbtn', function() {


var verificationstate = 'assigntag';
prosauthorizationfunction(verificationstate);

});




$('body').on('click', '.prosedittags-btn', function() {


var verificationstate = 'edittag';
prosauthorizationfunction(verificationstate);

});


$('body').on('click', '.prosgeneralloadtagsforassign', function() {


    var funnelID = $(this).data('id');
    var brand_id = $(this).data('brand');

    $('.prosloadbrandidfortagassign').val(brand_id);
    $('.prosloadfunnelfortagassign').val(funnelID);

    var verificationstate = 'loadtagforassign';
    prosauthorizationfunction(verificationstate);






});






function prosprocessfunneledit(token)
{



$('.proscreateeditfunnel-btn').prop('disabled', false);




    var brand_id = $('.abba-change-brand').val();
    var funnel_id =  $('.prosloadfunnelid').val();
    var funnel_title =  $('.proscreateeditfunnelhere').val();

    var email = $('.prosloadcuseremailforaccount').val();

   

    var data = {
        "email": email,
        "token": token,
    
        "brand_id": brand_id,
        "funnel_id": funnel_id,
        "funnel_title": funnel_title,
    };


// // Convert the data object to JSON string
var jsonData = JSON.stringify(data);
//  // Create a new XMLHttpRequest
 var request = new XMLHttpRequest();




// // // Set up the request
request.open('POST', 'https://sendova.co/api/edit-funnel/');
request.setRequestHeader('Content-Type', 'application/json');

//     // Define the callback function to handle the response
request.onreadystatechange = function () {


            $('.proscreateeditfunnel-btn').html('Save Now  <i class="fa fa-funnel-dollar"></i> ');
            $('.proscreateeditfunnel-btn').prop('disabled', false);
            $('#proscreate-editfunnnelmodal').modal('hide');


    if (this.readyState === XMLHttpRequest.DONE) {

        if (this.status === 200) {

            var abc = this.responseText;

          
            var response = JSON.parse(this.responseText);
                    

            var status = response["responseMessage"];
            var request = response["requestSuccessful"];
            var des = response["responseDescription"];

           


            // console.log(funnelcontent);


            if(status.trim() == 'success')
            {


                $('.prosloadfullcontentfull'+funnel_id).html(funnel_title);

                
                    $.wnoty({
                        type: 'success',
                        message: des,
                        autohideDelay: 5000
                    });

            }else
            {

                $.wnoty({
                    type: 'warning',
                    message: des,
                    autohideDelay: 5000
                });

            }


         
          // Request successful, handle response
            // var response = JSON.parse(this.responseText);
            // alert("Response: " + JSON.stringify(response));


            
        } else {

            // Request failed, handle error
                // alert("Error: " + this.status);

                console.log("Error: " + this.status);
            }
        }
    };

// Send the request with the JSON data as the body
 request.send(jsonData);


   
}



function prosedittagscontent(token)
{


        $('.prosedittags-btn').prop('disabled', false);



          

        var brand_id = $('.prosloadbrandidtag').val();
        var tag_id =  $('.prosloadtagidedit').val();
        var tag_title =  $('.prosedittagshere').val();
       

        // var email = $('.prosloadcuseremailforaccount').val();





            var data = {
               
                "token": token,
            
                "brand_id": brand_id,
                "tag_id": tag_id,
                "tag_title": tag_title,
            };


// // Convert the data object to JSON string
var jsonData = JSON.stringify(data);
//  // Create a new XMLHttpRequest
 var request = new XMLHttpRequest();




// // // Set up the request
request.open('POST', 'https://sendova.co/api/edit-tag/');
request.setRequestHeader('Content-Type', 'application/json');


//     // Define the callback function to handle the response
request.onreadystatechange = function () {


            $('.prosedittags-btn').html('Save Now  <i class="fa fa-poll"></i> ');
            $('.prosedittags-btn').prop('disabled', false);
            $('#prosedit-tagsmodal').modal('hide');


    if (this.readyState === XMLHttpRequest.DONE) {

        if (this.status === 200) {

            var abc = this.responseText;

          
            var response = JSON.parse(this.responseText);
                    

            var status = response["responseMessage"];
            var request = response["requestSuccessful"];
            var des = response["responseDescription"];

           


            // console.log(funnelcontent);


            if(status.trim() == 'success')
            {


                $('.prosloadtagforedit'+tag_id).html(tag_title);

                
                    $.wnoty({
                        type: 'success',
                        message: des,
                        autohideDelay: 5000
                    });

            }else
            {

                $.wnoty({
                    type: 'warning',
                    message: des,
                    autohideDelay: 5000
                });

            }


         
          // Request successful, handle response
            // var response = JSON.parse(this.responseText);
            // alert("Response: " + JSON.stringify(response));


            
        } else {

            // Request failed, handle error
                // alert("Error: " + this.status);

                console.log("Error: " + this.status);
            }
        }
    };

// Send the request with the JSON data as the body
 request.send(jsonData);









}






function prosloadtagcontent(token){





$('.display_tags').html('<center><i class="fa fa-spinner fa-spin fs-3 text-primary"></i></center>');



var brand_id = $('.abba-change-brand').val();



    // alert(brand_id);

    var data = {
        "brand_id": brand_id,
        "token": token
    };




// Convert the data object to JSON string
var jsonData = JSON.stringify(data);
 // Create a new XMLHttpRequest
var request = new XMLHttpRequest();



// // Set up the request
request.open('POST', 'https://sendova.co/api/get-tag-content/');
request.setRequestHeader('Content-Type', 'application/json');

    // Define the callback function to handle the response
request.onreadystatechange = function () {


    if (this.readyState === XMLHttpRequest.DONE) {

        if (this.status === 200) {

            var abc = this.responseText;

            // alert(abc);

           




            var response = JSON.parse(this.responseText);
            

            var status = response["responseMessage"];
            var request = response["requestSuccessful"];
            var des = response["responseDescription"];

            var funnelcontent = response["responseBody"];


            // console.log(funnelcontent);


            if(status.trim() == 'success')
            {




                var proloadtagforlist = ` <li class="list-group-item">
                <div class="search-container">
                    <input type="text" class="search-input form-control abba_search" placeholder="Search">
                    <i class="fa fa-search search-icon"></i>
                </div>
              </li>`;



         
       






                if(funnelcontent.length > 1)
                {



                 proloadtagforlist+=` <li class="list-group-item">
                        <div class="form-check">
                            <input class="form-check-input tag_checkboxes_all" type="checkbox" id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                                Select All
                                    </label>
                                </div>
                            </li>`;



                }else
                {
                    
                }
                

               

                        var prosloadcontenten = '';
                        var prosloadcontentenoptions = '<option value="NULL">Select Tag</option>';

                    for (var i = 0; i < funnelcontent.length; i++) {

                      
                        var item = funnelcontent[i];

                        // console.log("Funnel Title: " + item.funnel_title);
                        // console.log("Funnel ID: " + item.funnel_id);
                        // console.log("Brand ID: " + item.brand_id);

                      
                        // tag_title tag_id

                        
                                  

                         prosloadcontentenoptions+=`<option value="${item.tag_id.toString()}">${item.tag_title}</option>`;

                                var prosloadfunnelcontent = ` <span class="prosloadeditclickbtncont" data-bs-toggle="modal"  data-bs-target="#prosedit-tagsmodal" style="cursor:pointer;" data-brand="${item.brand_id}"   data-id="${item.tag_id}" data-title="${item.tag_title}"><span class="badge bg-success "   > <span class="prosloadtagforedit${item.tag_id}">${item.tag_title}</span>  <i class="fa fa-edit"  ></i></span></span>`;

                                prosloadcontenten+=prosloadfunnelcontent;

                                proloadtagforlist+=`<li class="list-group-item card_search_get">
                                        <div class="form-check">
                                            <input class="form-check-input tag_checkboxes" type="checkbox" value="${item.tag_id}" id="flexCheckIndeterminate_${item.tag_id}">
                                            <label class="form-check-label tag_name" for="flexCheckIndeterminate_${item.tag_id}">
                                            ${item.tag_title}
                                            </label>
                                        </div>
                                    </li>`;
                       
                    }

                    
                    $('.display_tags').html(proloadtagforlist);
                    $('.pros_view_edit_tag').html(prosloadcontentenoptions);
                   

                    $('.add_tag').html(prosloadcontentenoptions);
                    $('.add_tag_file').html(prosloadcontentenoptions);
                    $('.pros_change-tag').html(prosloadcontentenoptions);

                    

                    $('.prosloadtagcontentformarketting').html(prosloadcontenten);

            }else
            {

                $('.display_tags').html(`<center>
                                 <img width="48" height="48" src="https://img.icons8.com/external-topaz-kerismaker/48/external-Not-Found-empty-state-topaz-kerismaker.png" alt="external-Not-Found-empty-state-topaz-kerismaker"/>
                                 <p>No  Tag  Found</p>
                           </center>`);

                           $('.prosloadtagcontentformarketting').html(`<center>
                                 <img width="48" height="48" src="https://img.icons8.com/external-topaz-kerismaker/48/external-Not-Found-empty-state-topaz-kerismaker.png" alt="external-Not-Found-empty-state-topaz-kerismaker"/>
                                 <p>No  Tag  Found</p>
                           </center>`);

            }

            // // Request successful, handle response
            // var response = JSON.parse(this.responseText);
        
            // var accessstoken = response["responseBody"]['apikey'];


            // alert("Response: " + JSON.stringify(response));


            
        } else {

            // Request failed, handle error
                // alert("Error: " + this.status);

                console.log("Error: " + this.status);
            }
        }
    };

    // // Send the request with the JSON data as the body
 request.send(jsonData);

}





$('body').on('click', '.prosloadeditclickbtncont', function() {


var prosloadtitle = $(this).data('title');
var tagid = $(this).data('id');
var brand_id = $(this).data('brand');




 
 
$('.prosloadbrandidtag').val(brand_id);
$('.prosloadtagidedit').val(tagid);

$('.prosedittagshere').val(prosloadtitle);



});



//SEND REQUESTION TO CREATE USER FROM SENDOVA

function prosupdateapikeyandsecrete(apikey,secretekey,brand_id)
{



        var instutitionID = $(".abba-change-institution option:selected").val();

   


        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/marketting/prosupdateuserapi.php",
            data: {

                apikey:apikey,
                secretekey:secretekey,
                instutitionID:instutitionID,
                brand_id:brand_id

            },

            success: function (output) { 


                var prostrim_output = output.trim();


                if(prostrim_output == 'success')
                {

                    window.location.reload();

                    
                }else
                {

                }




            },
         });



  



}


$('body').on('click', '#pros_add_contact_btn', function() {


var phone  = $(".pros_phone_num").val();
var email  = $(".pros_add_email").val();



if(email == '')
{
        $.wnoty({
            type: 'warning',
            message: 'Email should not be left blank',
            autohideDelay: 5000
        });

        $(".pros_add_email").css('border', '2px solid red');

}else if(phone == '')
{

    $.wnoty({
        type: 'warning',
        message: 'Phone number should not be left blank',
        autohideDelay: 5000
    });

    $(".pros_phone_num").css('border', '2px solid red');



}else
{

        $(".pros_add_email").css('boder', '');
        $(".pros_phone_num").css('boder', '');
        
        var verificationstate = 'addcontact';
        prosauthorizationfunction(verificationstate);

}

 



});


// PROS LOAD STATE ON CHANGE COUNTRY
$('body').on('change', '.pros_add_country', function() {
    var verificationstate = 'loadstate';
    prosauthorizationfunction(verificationstate);
});
// PROS LOAD STATE ON CHANGE COUNTRY



// PROS LOAD STATE ON CHANGE COUNTRY FOR VIEW

    $('body').on('change', '.pros_view_edit_country', function() {
        var verificationstate = 'loadstateedit';
        prosauthorizationfunction(verificationstate);
    });

// PROS LOAD STATE ON CHANGE COUNTRY FOR VIEW



// PROS LOAD COUNTRY CONTENT HERE

function prosloadcountryfunction(token)
{

    


     

    var email = $('.prosloadcuseremailforaccount').val();

    var data = {

        "email": email,
        "token": token
        
    };


    // Convert the data object to JSON string
    var jsonData = JSON.stringify(data);
    // Create a new XMLHttpRequest
    var request = new XMLHttpRequest();


    

    // // Set up the request
    request.open('POST', 'https://sendova.co/api/get-countries/');
    request.setRequestHeader('Content-Type', 'application/json');

        // Define the callback function to handle the response
    request.onreadystatechange = function () {


        if (this.readyState === XMLHttpRequest.DONE) {

            if (this.status === 200) {

                var abc = this.responseText;

            
              
                  



                var response = JSON.parse(this.responseText);
                

                var status = response["responseMessage"];
                var request = response["requestSuccessful"];
                var des = response["responseDescription"];

                var funnelcontent = response["responseBody"];






                // console.log(funnelcontent);


                if(status.trim() == 'success')
                {


                  


                        
                            var prosloadcontentenoptions = '<option value="NULL">Select Country</option>';

                        for (var i = 0; i < funnelcontent.length; i++) {

                        
                            var item = funnelcontent[i];

                            // console.log("Funnel Title: " + item.funnel_title);
                            // console.log("Funnel ID: " + item.funnel_id);
                            // console.log("Brand ID: " + item.brand_id);

                          

                            prosloadcontentenoptions+=`<option value="${item.country_id}">${item.country_name}</option>`;

                        }

                    


                        $('.pros_add_country').html(prosloadcontentenoptions);
                        $('.pros_view_edit_country').html(prosloadcontentenoptions);
                        

                     


                }else
                {

                }





                
            } else {

                // Request failed, handle error
                    // alert("Error: " + this.status);

                    console.log("Error: " + this.status);
                }
            }
        };

        // // Send the request with the JSON data as the body
    request.send(jsonData);



  

}
// PROS LOAD COUNTRY CONTENT HERE


// PROS LOAD STATE CONTENT HERE

function prosloadsatecontentfunction(token)
{


    var email = $('.prosloadcuseremailforaccount').val();
    var country_id = $('.pros_add_country option:selected').val();



            

            var data = {

                "email": email,
                "token": token,
               
                "country_id":country_id
            };


            // Convert the data object to JSON string
            var jsonData = JSON.stringify(data);
            // Create a new XMLHttpRequest
            var request = new XMLHttpRequest();


            

            // // Set up the request
            request.open('POST', 'https://sendova.co/api/get-states/');
            request.setRequestHeader('Content-Type', 'application/json');

            $('.pros_add_state').html('<option value="NULL">loading..</option>');

                // Define the callback function to handle the response
            request.onreadystatechange = function () {

        
                if (this.readyState === XMLHttpRequest.DONE) {

                    if (this.status === 200) {

                        var abc = this.responseText;

                    
                        // alert(abc);



                        var response = JSON.parse(this.responseText);
                        

                        var status = response["responseMessage"];
                        var request = response["requestSuccessful"];
                        var des = response["responseDescription"];

                        var funnelcontent = response["responseBody"];

                        // alert(status);


                        // console.log(funnelcontent);


                        if(status.trim() == 'success')
                        {


                                
                                    var prosloadcontentenoptions = '<option value="NULL">Select State</option>';

                                    

                                for (var i = 0; i < funnelcontent.length; i++) {

                                
                                    var item = funnelcontent[i];

                                    // console.log("Funnel Title: " + item.funnel_title);
                                    // console.log("Funnel ID: " + item.funnel_id);
                                    // console.log("Brand ID: " + item.brand_id);

                                    
                                    prosloadcontentenoptions+=`<option value="${item.state_id}">${item.state_name}</option>`;

                                }


                                $('.pros_add_state').html(prosloadcontentenoptions);

                            

                        }else
                        {

                        }


                        
                    } else {

                        // Request failed, handle error
                            // alert("Error: " + this.status);

                            console.log("Error: " + this.status);
                        }
                    }
                };

                // // Send the request with the JSON data as the body
            request.send(jsonData);



}

// PROS LOAD STATE CONTENT HERE





function prosloadstateforeditandview(token){


    var email = $('.prosloadcuseremailforaccount').val();
    var country_id = $('.pros_view_edit_country option:selected').val();


        var data = {

            "email": email,
            "token": token,
            
            "country_id":country_id
        };


        // Convert the data object to JSON string
        var jsonData = JSON.stringify(data);
        // Create a new XMLHttpRequest
        var request = new XMLHttpRequest();


        

        // // Set up the request
        request.open('POST', 'https://sendova.co/api/get-states/');
        request.setRequestHeader('Content-Type', 'application/json');

        $('.pros_view_edit_state').html('<option value="NULL">loading..</option>');

            // Define the callback function to handle the response
        request.onreadystatechange = function () {

    
            if (this.readyState === XMLHttpRequest.DONE) {

                if (this.status === 200) {

                    var abc = this.responseText;

                
                    // alert(abc);



                    var response = JSON.parse(this.responseText);
                    

                    var status = response["responseMessage"];
                    var request = response["requestSuccessful"];
                    var des = response["responseDescription"];

                    var funnelcontent = response["responseBody"];

                    // alert(status);


                    // console.log(funnelcontent);


                    if(status.trim() == 'success')
                    {


                            
                                var prosloadcontentenoptions = '<option value="NULL">Select State</option>';

                                

                            for (var i = 0; i < funnelcontent.length; i++) {

                            
                                var item = funnelcontent[i];

                                // console.log("Funnel Title: " + item.funnel_title);
                                // console.log("Funnel ID: " + item.funnel_id);
                                // console.log("Brand ID: " + item.brand_id);

                                
                                prosloadcontentenoptions+=`<option value="${item.state_id.toString()}">${item.state_name}</option>`;

                            }


                            $('.pros_view_edit_state').html(prosloadcontentenoptions);



                            var prosselecttagcontent_verify =  $('#prosvaliadatestatecounthere').val();


                            if(prosselecttagcontent_verify == '0' || prosselecttagcontent_verify == '')
                            {

                            }else
                            {
                                $('.pros_view_edit_state').val(prosselecttagcontent_verify);   

                            }

                            

                        

                    }else
                    {

                    }


                    
                } else {

                    // Request failed, handle error
                        // alert("Error: " + this.status);

                        console.log("Error: " + this.status);
                    }
                }
            };

            // // Send the request with the JSON data as the body
        request.send(jsonData);


}

  // PROS CREATE USER HERE


    // function proscreateuserfunction(token)
    // {


        
    //       $('.pros_add_contact_btn').prop('disabled', true);



    //         var brand_id = $('.abba-change-brand').val();
    //         var tag = $('.pros_add_tag').val();

    //         var user_title = $('.pros_add_title').val();
    //         var user_fname = $('.pros_add_fname').val();
    //         var user_mname = $('.pros_add_mname').val();
    //         var user_lname = $('.pros_add_lname').val();
    //         var user_mname = $('.pros_add_nname').val();

    //         var user_salutation = $('.pros_add_salutation').val();
    //         var user_email = $('.pros_add_email').val();
    //         var user_num = $('.pros_phone_num').val();
    //         var user_dob = $('.pros_add_dob').val();

    //         var user_gender = $('.pros_add_gender').val();
    //         var user_position = $('.pros_add_pib').val();
    //         var user_country = $('.pros_add_country').val();
    //         var user_state = $('.pros_add_state').val();
    //         var user_city = $('.pros_add_city').val();

    //         var user_spouse_title = $('.pros_add_spouse_title').val();
    //         var user_spouse_fname = $('.pros_add_spouse_fname').val();
    //         var user_spouse_lname = $('.pros_add_spouse_lname').val();
    //         var user_spouse_mname = $('.pros_add_spouse_nname').val();
    //         var user_spouse_salutation= $('.pros_add_spouse_salutation').val();


               

    //         var data = { 
    //             "brand_id": brand_id,
    //             "token": token,
               
    //             "tag":tag,
    //             "user_title":user_title,
    //             "user_fname":user_fname,
    //             "user_mname":user_mname,
    //             "user_lname":user_lname,
    //             "user_mname":user_mname,
    //             "user_salutation":user_salutation,
    //             "user_email":user_email,
    //             "user_num":user_num,
    //             "user_dob":user_dob,
    //             "user_gender":user_gender,
    //             "user_position":user_position,
    //             "user_country":user_country,
    //             "user_state":user_state,
    //             "user_city":user_city,
    //             "user_spouse_title":user_spouse_title,
    //             "user_spouse_fname":user_spouse_fname,
    //             "user_spouse_lname":user_spouse_lname,
    //             "user_spouse_mname":user_spouse_mname,
    //             "user_spouse_salutation":user_spouse_salutation 
    //         };







    //         // Convert the data object to JSON string
    //         var jsonData = JSON.stringify(data);
    //         // Create a new XMLHttpRequest
    //         var request = new XMLHttpRequest();
            

    //         // // Set up the request
    //         request.open('POST', 'https://sendova.co/api/submit_user/');
    //         request.setRequestHeader('Content-Type', 'application/json');

         

    //             // Define the callback function to handle the response
    //         request.onreadystatechange = function () {

        
    //             if (this.readyState === XMLHttpRequest.DONE) {


    //                   $('#pros_add_contact_btn').html('<i class="fa fa-save"> Save</i>');
    //                     $('#pros_add_contact_btn').prop('disabled', false);
                       


    //                 if (this.status === 200) {

    //                     var abc = this.responseText;
                    
    //                     // alert(abc);

    //                     var response = JSON.parse(this.responseText);
                        

    //                     var status = response["responseMessage"];
    //                     var request = response["requestSuccessful"];
    //                     var des = response["responseDescription"];

                        

    //                     // console.log(funnelcontent);


    //                     if(status.trim() == 'success')
    //                     {

    //                         $('#AddContactModal').modal('hide');

    //                         $.wnoty({
    //                             type: 'success',
    //                             message: des,
    //                             autohideDelay: 5000
    //                         });
                            

    //                     }else
    //                     {

    //                         $.wnoty({
    //                             type: 'warning',
    //                             message: des,
    //                             autohideDelay: 5000
    //                         });


    //                     }


                        
    //                 } else {

    //                     // Request failed, handle error
    //                         // alert("Error: " + this.status);

    //                         console.log("Error: " + this.status);
    //                     }
    //                 }
    //             };

    //             // // Send the request with the JSON data as the body
    //         request.send(jsonData);











    // }

 // PROS CREATE USER HERE





// Function to filter student cards based on the search input
function filterStudentCards(searchTerm) {

$('.card_search_get').each(function () {
    const house_number = $(this).find('.tag_name').text().toLowerCase();

    // Check if the student's name contains the search term
    if (house_number.includes(searchTerm)) {
        $(this).show(); // Show the card
    }
    else {
        $(this).hide(); // Hide the card
    }
});
}

    
        


// Add an event listener to the search input
$('body').on('input paste', '.abba_search', function () {
const searchTerm = $(this).val().toLowerCase();

filterStudentCards(searchTerm);
});



$('body').on('click', '.get_contact_list', function(){

var verificationstate = 'loadcontact';
prosauthorizationfunction(verificationstate);
});



function prosloacontactcontentfunction(token)
{

  var brand_id = $('.abba-change-brand').val();

  
  
 
 
  


   var checkedValues = [];

    $('.tag_checkboxes:checked').each(function() {
        checkedValues.push($(this).val());
    });


    if(checkedValues.length > 0){

        var tags = checkedValues.join(',');
    }
    else{

        var tags = 'NULL';

    }
    
   

          

            var data = {
                "brand_id": brand_id,
                "token": token,
               
                "tags":tags
            };


            // Convert the data object to JSON string
            var jsonData = JSON.stringify(data);
            // Create a new XMLHttpRequest
            var request = new XMLHttpRequest();


            

            // // Set up the request
            request.open('POST', 'https://sendova.co/api/contact-list/');
            request.setRequestHeader('Content-Type', 'application/json');

          

                // Define the callback function to handle the response
            request.onreadystatechange = function () {

        
                if (this.readyState === XMLHttpRequest.DONE) {
                    
                    
                    // alert(this.status);

                    if (this.status === 200) {

                        var abc = this.responseText;

                    
                       



                        var response = JSON.parse(this.responseText);
                        

                        var status = response["responseMessage"];
                        var request = response["requestSuccessful"];
                        var des = response["responseDescription"];

                        var funnelcontent = response["responseBody"];

                        // alert(status);


                        // console.log(funnelcontent);


                        if(status.trim() == 'success')
                        {




                        var prosloadcontalist = `<table id="example" class="display">
                            <thead>
                                <tr>
                                    <th style="font-size:14px;">
                                        <input class="form-check-input select_all_contact" type="checkbox" id="flexCheckselect_all_contact">
                                        <label class="form-check-label tag_name" for="flexCheckselect_all_contact" id="flexCheckselect_all_contact_html"></label>
                                    </th>
                                    <th style="font-size:14px;">
                                        SN
                                    </th>
                                    <th style="font-size:14px;">Name</th>
                                    <th style="font-size:14px;">Tag </th>
                                    <th style="font-size:14px;">Phone Number</th>
                                    <th style="font-size:14px;">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>`;



                                var prosgetnumber = 0;

                            
                                for (var i = 0; i < funnelcontent.length; i++) {

                                
                                    var item = funnelcontent[i];

                                    // console.log("Funnel Title: " + item.funnel_title);
                                    // console.log("Funnel ID: " + item.funnel_id);
                                    // console.log("Brand ID: " + item.brand_id);

                                  

                                    prosgetnumber++


                                    var tagcontent = (item.tag_title != '' ? item.tag_title : 'NA');

                                    prosloadcontalist+=`<tr>

                                        <td style="font-size:13px;">
                                            <input class="form-check-input contact_checkbox" type="checkbox" value="${item.contact_id}" data-num="${item.user_phone}"  data-email="${item.user_email}" id="flexCheckcontact_list_${item.contact_id}">
                                            <label class="form-check-label tag_name" for="flexCheckcontact_list_${item.contact_id}"></label>
                                        </td>

                                        
                                       

                                        <td style="font-size:13px;">
                                           ${prosgetnumber}
                                        </td>

                                        <td style="font-size:13px;">${item.user_title} ` + `${item.user_fname}` + `  ${item.user_mname}` + `  ${item.user_lname}</td>

                                        <td style="font-size:13px;">${tagcontent}</td>
                                        <td style="font-size:13px;">${item.user_phone}</td>

                                      
                                        
                                        <td> <i class="fa fa-eye" style="font-size:14px;color:#14A44D;cursor:pointer;" data-id="${item.contact_id}" data-bs-toggle="modal" data-bs-target="#ViewEditContactModal"></i>   </td>
                                    
                                    </tr>`;

                                    
                                   

                                }


                                prosloadcontalist+=`</tbody>
                                </table>`;

                                $('.pros_display_table').html(prosloadcontalist);



                                    new DataTable('#example', {
                                        pagingType: 'full_numbers'
                                    });




                                    if ($('.contact_checkbox:checked').length == $('.contact_checkbox').length) {
                                        $("#select_all_contact").prop('checked', true);
                                        var selTotal = $('.contact_checkbox:checked').length;
                            
                                        if (selTotal > 0) {
                            
                            
                                            $('#flexCheckselect_all_contact_html').html('(' + selTotal + ')');
                                            $("#flexCheckselect_all_contact_html").fadeIn("slow");
                            
                            
                            
                                            $(".pros_action_btns").fadeIn("slow");
                            
                                            
                            
                                        }
                                        else {
                            
                                            $("#flexCheckselect_all_contact_html").fadeOut("slow");
                                            $(".pros_action_btns").fadeOut("slow");
                                            
                                        }
                            
                                    }
                                    else if ($('.contact_checkbox:checked').length != $('.contact_checkbox').length) {
                                        $("#select_all_contact").prop('checked', false);
                                        var selTotal = $('.contact_checkbox:checked').length;
                            
                                        if (selTotal > 0) {
                                            $('#flexCheckselect_all_contact_html').html('(' + selTotal + ')');
                                            $("#flexCheckselect_all_contact_html").fadeIn("slow");
                                            $(".pros_action_btns").fadeIn("slow");
                                            
                                        }
                                        else {
                                            
                                            $("#flexCheckselect_all_contact_html").fadeOut("slow");
                                            $(".pros_action_btns").fadeOut("slow");
                                        }
                                    }
                        }else
                        {

                                 $('.pros_display_table').html(`<center>
                                 <img width="48" height="48" src="https://img.icons8.com/external-topaz-kerismaker/48/external-Not-Found-empty-state-topaz-kerismaker.png" alt="external-Not-Found-empty-state-topaz-kerismaker"/>
                                 <p>No  Record Found</p>
                           </center>`);
                        }


                        
                    } else {

                        // Request failed, handle error
                            // alert("Error: " + this.status);
                            // alert("Error: " + this.status + " - " + this.statusText);

                            console.log("Error: " + this.status);
                        }
                    }
                };

                // // Send the request with the JSON data as the body
            request.send(jsonData);






}






$("body").on("change", ".tag_checkboxes_all", function () {

var checkStatus = $(this).prop('checked');

if (checkStatus == true) {
    $(".tag_checkboxes").prop('checked', $(this).prop("checked"));
    
}
else if (checkStatus == false) {
    $(".tag_checkboxes").prop('checked', false);
    
}

});


// select all student checkbox
$("body").on("change", ".select_all_contact", function () {

var checkStatus = $(this).prop('checked');

// alert(checkStatus);

if (checkStatus == true) 
{
    $(".contact_checkbox").prop('checked', $(this).prop("checked"));
    var selTotal = $('.contact_checkbox:checked').length;
    $('#flexCheckselect_all_contact_html').html('(' + selTotal + ')');
    $("#flexCheckselect_all_contact_html").fadeIn("slow");

}
else if (checkStatus == false) {
    $(".contact_checkbox").prop('checked', false);
    var selTotal = $('.contact_checkbox:checked').length;
    $("#flexCheckselect_all_contact_html").fadeOut("slow");

}

});




// select all student checkbox
$("body").on("change", ".select_all_contact", function () {

var checkStatus = $(this).prop('checked');

// alert(checkStatus);

if (checkStatus == true) 
{
    $(".contact_checkbox").prop('checked', $(this).prop("checked"));
    var selTotal = $('.contact_checkbox:checked').length;
    $('#flexCheckselect_all_contact_html').html('(' + selTotal + ')');
    $("#flexCheckselect_all_contact_html").fadeIn("slow");
    $(".pros_action_btns").fadeIn("slow");

}
else if (checkStatus == false) {
    $(".contact_checkbox").prop('checked', false);
    var selTotal = $('.contact_checkbox:checked').length;
    $("#flexCheckselect_all_contact_html").fadeOut("slow");

    $(".pros_action_btns").fadeOut("slow");

}

});


$('body').on('change', '.contact_checkbox', function () {

if ($('.contact_checkbox:checked').length == $('.contact_checkbox').length) {
    $("#select_all_contact").prop('checked', true);
    var selTotal = $('.contact_checkbox:checked').length;

    if (selTotal > 0) {


        $('#flexCheckselect_all_contact_html').html('(' + selTotal + ')');
        $("#flexCheckselect_all_contact_html").fadeIn("slow");



        $(".pros_action_btns").fadeIn("slow");

        

    }
    else {

        $("#flexCheckselect_all_contact_html").fadeOut("slow");
        $(".pros_action_btns").fadeOut("slow");
        
    }

}
else if ($('.contact_checkbox:checked').length != $('.contact_checkbox').length) {
    $("#select_all_contact").prop('checked', false);
    var selTotal = $('.contact_checkbox:checked').length;

    if (selTotal > 0) {
        $('#flexCheckselect_all_contact_html').html('(' + selTotal + ')');
        $("#flexCheckselect_all_contact_html").fadeIn("slow");
        $(".pros_action_btns").fadeIn("slow");
        
    }
    else {
        
        $("#flexCheckselect_all_contact_html").fadeOut("slow");
        $(".pros_action_btns").fadeOut("slow");
    }
}
});



$('body').on('click', '.open_send_message_modal', function(){

var checkedValues = [];
$('.contact_checkbox:checked').each(function() {
    checkedValues.push($(this).val());
});

if(checkedValues.length > 0)
{
    var contact_id = checkedValues.join(',');

    $('#SendMessageModal').modal('show');

}
else
{
    $('#SendMessageModal').modal('hide');

    $.wnoty({
        type: 'warning',
        message: "Select one or more contact that you want to send a message before proceeding.",
        autohideDelay: 7000
    });
}

});


$('body').on('click', '.prostoggeleschedulemesg_altoption', function(){


    
 var prosload_status_input = $('.prosloadaltviewmorecontent').val();

 if(prosload_status_input == '0')
 {

    $('.prosloadhidenschedulemessagecontent_andview').fadeIn('slow');
    $('.prostoggeleschedulemesg_altoption').html('Close');
    $('.prosloadaltviewmorecontent').val(1);

    

 }else{

    $('.prosloadhidenschedulemessagecontent_andview').fadeOut('slow');
    $('.prostoggeleschedulemesg_altoption').html('View More');
    $('.prosloadaltviewmorecontent').val(0);


 }

});






$('body').on('click', '#pros_proceed_to_send_message_schedule_btn', function(){

       

        var status = $(this).data('id');

        if(status == 'wa')
        {


             var verificationstate = 'prossendmsgschdule';
             prosauthorizationfunction(verificationstate);


        }else if(status == 'mail')
        {
              

                var verificationstate = 'prosmailmsg';
                prosauthorizationfunction(verificationstate);

        }else if(status == 'sms')
        {
            
            
                 var verificationstate = 'prossmsmsg';
                prosauthorizationfunction(verificationstate);
            
        }

});


$('body').on('click', '.prosgeneralsendmsgtagbutton', function(){

var status = $(this).data('id');

$('#pros_proceed_to_send_message_schedule_btn').data('id', status);




});





function prossendschmsgcontent(token)
{

       

        var fileInput = document.getElementById('prosuploadfileforwhatsappmessaging');
        var file = fileInput.files[0];
        var allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'video/mp4', 'video/quicktime'];
            // alert(file);

       // if (file && allowedTypes.includes(file.type)) {
       


    
       


        var brand_id = $('.abba-change-brand').val();

       

       

        var checkedValues = [];
        var checkedNum = [];

        $('.contact_checkbox:checked').each(function() {
            checkedValues.push($(this).val());
            checkedNum.push($(this).data('num'));
        });

        var msg_subject = $('.msg_subject').val();
        var msg_body = $('.msg_body').val();
        var msg_duration = $('.msg_duration').val();
        var prosmesagetype = $('.proshowtosendmessageinput').val();
        

       
        if(prosmesagetype === 'schedule' && msg_duration == '')
        {


                    $.wnoty({
                        type: 'warning',
                        message: "Select date you want message to be sent ",
                        autohideDelay: 7000
                    });


                    $('.msg_subject').css('border', '');

                    $('.msg_body').css('border', '');
                    $('.msg_duration').css('border', '2px solid red');



        }else
        {


                            var contact_id = checkedValues.join(',');
                            var contact_Phone = checkedNum.join(',');

                            // var data = {
                            //     "email": email,
                            //     "token": token,
                            //     "epirery": epirery,
                            //     "msg_subject":msg_subject,
                            //     "msg_body":msg_body,
                            //     "msg_number":contact_Phone,
                            //     "contact_id" :contact_id,
                            //     "file" :file,
                            // };


                            var formData = new FormData();
                            formData.append('file', file);
                            formData.append('token', token);
                            // formData.append('epirery', epirery);
                            formData.append('msg_subject', msg_subject);
                            formData.append('msg_body', msg_body);
                            formData.append('msg_number', contact_Phone);
                            formData.append('contact_id', contact_id);
                            formData.append('brand_id', brand_id);
                             formData.append('msg_duration', msg_duration);
                            
            
                        if(msg_body == '' || msg_body == '0')
                        {
            
                                    $('.msg_subject').css('border', '');

                                    $('.msg_body').css('border', '2px solid red');
            
                                    $.wnoty({
                                        type: 'warning',
                                        message: "Input a message body to proceed.",
                                        autohideDelay: 7000
                                    });
                                    
                                    $('#pros_proceed_to_send_message_schedule_btn').html('<i class="ffa-envelope-open-text"> </i> Send');
            
                        }else
                        {
            
            
            
            
                                $('#pros_proceed_to_send_message_schedule_btn').prop('disabled', true);
                                $('#pros_proceed_to_send_message_schedule_btn').html('<i class="fa fa-solid fa-spinner fa-spin" style="font-size:15px;"></i>');
            





                                $.ajax({
                                    url: 'https://sendova.co/api/send-message/',
                                    type: 'POST',
                                    data: formData,
                                    contentType: false,
                                    processData: false,
                                    success: function(response) {


                                        alert(response);
                                      

                                        $('#pros_proceed_to_send_message_schedule_btn').prop('disabled', false);
                                        $('#pros_proceed_to_send_message_schedule_btn').html('<i class="fa-envelope-open-text"> </i> Send Message');

                                        // console.log(response);

                                        //  alert(response);


                                        var response = JSON.parse(response);
                                                
            
                                        var status = response["responseMessage"];
                                        var request = response["requestSuccessful"];
                                        var des = response["responseDescription"];
    
                                        var funnelcontent = response["responseBody"];
    
                                        // alert(status);
    
    
                                        // console.log(funnelcontent);
    
    
                                        if(status.trim() == 'success')
                                        {
    
    
                                                $.wnoty({
                                                    type: 'success',
                                                    message: des,
                                                    autohideDelay: 7000
                                                });
    
                                        }else
                                        {
    
                                            $.wnoty({
                                                type: 'warning',
                                                message: des,
                                                autohideDelay: 7000
                                            });

                                        }
                                        // Handle success response
                                    },
                                    error: function(xhr, status, error) {
                                       console.error('Error Status:', status);
    console.error('Error Details:', error);
    console.log('Response Text:', xhr.responseText);  // This will print the detailed server error message (if any)
                                    }
                                });
                    
            
            
                                  
                            
                        }


        }

       



}






function prossendmsgmsgfunc(token)
{
    
                        
                        
                        
        //                  var fileInput = document.getElementById('prosuploadfileforwhatsappmessaging');
        // var file = fileInput.files[0];
        // var allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'video/mp4', 'video/quicktime'];
            // alert(file);

       // if (file && allowedTypes.includes(file.type)) {
       


    
       


        var brand_id = $('.abba-change-brand').val();

       

       

        var checkedValues = [];
        var checkedNum = [];

        $('.contact_checkbox:checked').each(function() {
            checkedValues.push($(this).val());
            checkedNum.push($(this).data('num'));
        });

        var msg_subject = $('.msg_subjectsms').val();
        var msg_body = $('.msg_bodysms').val();
        var msg_duration = $('.msg_durationsms').val();
        var prosmesagetype = $('.proshowtosendmessageinputsms').val();
        
        

       
        if(prosmesagetype === 'schedule' && msg_duration == '')
        {


                    $.wnoty({
                        type: 'warning',
                        message: "Select date you want message to be sent ",
                        autohideDelay: 7000
                    });


                    $('.msg_subjectsms').css('border', '');

                    $('.msg_bodysms').css('border', '');
                    $('.msg_durationsms').css('border', '2px solid red');



        }else
        {


                            var contact_id = checkedValues.join(',');
                            var contact_Phone = checkedNum.join(',');

                            // var data = {
                            //     "email": email,
                            //     "token": token,
                            //     "epirery": epirery,
                            //     "msg_subject":msg_subject,
                            //     "msg_body":msg_body,
                            //     "msg_number":contact_Phone,
                            //     "contact_id" :contact_id,
                            //     "file" :file,
                            // };


                            var formData = new FormData();
                            // formData.append('file', file);
                            formData.append('token', token);
                            // formData.append('epirery', epirery);
                            formData.append('msg_subject', msg_subject);
                            formData.append('msg_body', msg_body);
                            formData.append('msg_number', contact_Phone);
                            formData.append('contact_id', contact_id);
                            formData.append('brand_id', brand_id);
                            formData.append('msg_duration', msg_duration);
                             formData.append('prosmesagetype', prosmesagetype);
                            
                            
          
            
                        if(msg_body == '' || msg_body == '0')
                        {
            
                                    $('.msg_subjectsms').css('border', '');

                                    $('.msg_bodysms').css('border', '2px solid red');
            
                                    $.wnoty({
                                        type: 'warning',
                                        message: "Input a message body to proceed.",
                                        autohideDelay: 7000
                                    });
                                    
                                    $('#pros_proceed_to_send_message_schedule_btn').html('<i class="ffa-envelope-open-text"> </i> Send');
            
                        }else
                        {
            
            
            
            
                                $('#pros_proceed_to_send_message_schedule_btn').prop('disabled', true);
                                $('#pros_proceed_to_send_message_schedule_btn').html('<i class="fa fa-solid fa-spinner fa-spin" style="font-size:15px;"></i>');
            





                                $.ajax({
                                    url: 'https://sendova.co/api/send-message-sms/',
                                    type: 'POST',
                                    data: formData,
                                    contentType: false,
                                    processData: false,
                                    success: function(response) {


                                        // alert(response);
                                      

                                        $('#pros_proceed_to_send_message_schedule_btn').prop('disabled', false);
                                        $('#pros_proceed_to_send_message_schedule_btn').html('<i class="fa-envelope-open-text"> </i> Send Message');

                                        // console.log(response);

                                        //  alert(response);


                                        var response = JSON.parse(response);
                                                
            
                                        var status = response["responseMessage"];
                                        var request = response["requestSuccessful"];
                                        var des = response["responseDescription"];
    
                                        var funnelcontent = response["responseBody"];
    
                                        // alert(status);
    
    
                                        // console.log(funnelcontent);
    
    
                                        if(status.trim() == 'success')
                                        {
    
    
                                                $.wnoty({
                                                    type: 'success',
                                                    message: des,
                                                    autohideDelay: 7000
                                                });
    
                                        }else
                                        {
    
                                            $.wnoty({
                                                type: 'warning',
                                                message: des,
                                                autohideDelay: 7000
                                            });

                                        }
                                        // Handle success response
                                    },
                                    error: function(xhr, status, error) {
                                        console.log(error);
                                        // Handle error
                                    }
                                });
                    
            
            
                                  
                            
                        }


        }

    
                    
    
}




//  PROS SEND EMAIL FUNCTION

function  prossendemailmsgcontent(token)
{
  

      var fileInput = document.getElementById('prosuploadfileforwhatsappmessagingemail');
      var file = fileInput.files[0];
      var allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'video/mp4', 'video/quicktime'];
          // alert(file);

     // if (file && allowedTypes.includes(file.type)) {
     


      var email = $('.prosloadcuseremailforaccount').val();


    
     

      var checkedValues = [];
      var checkedNum = [];
      var emailcontent = [];



      $('.contact_checkbox:checked').each(function() {
          checkedValues.push($(this).val());
          checkedNum.push($(this).data('num'));
          emailcontent.push($(this).data('email'));
      });


    

     

      var msg_subject = $('.msg_subjectemail').val();
      var msg_body = $('.msg_bodyemail').val();
      var msg_duration = $('.msg_durationemail').val();
      var prosmesagetype = $('.proshowtosendmessageinputemail').val();


     

      if(prosmesagetype === 'schedule' && msg_duration == '')
      {


                  $.wnoty({
                      type: 'warning',
                      message: "Select date you want message to be sent ",
                      autohideDelay: 7000
                  });


                  $('.msg_subject').css('border', '');

                  $('.msg_body').css('border', '');
                  $('.msg_duration').css('border', '2px solid red');



      }else
      {


                          var contact_id = checkedValues.join(',');
                          var contact_Phone = checkedNum.join(',');
                          var prosemail = emailcontent.join(',');


                          var formData = new FormData();
                          formData.append('file', file);
                          formData.append('token', token);
                        //   formData.append('epirery', epirery);
                          formData.append('msg_subject', msg_subject);
                          formData.append('msg_body', msg_body);
                          formData.append('msg_number', contact_Phone);
                          formData.append('contact_id', contact_id);
                          formData.append('email', email);
                          formData.append('prosmesagetype', prosmesagetype);
                          formData.append('prosemail', prosemail);

                         
                      if(msg_body == '' || msg_body == '0')
                      {
          
                                  $('.msg_subject').css('border', '');

                                  $('.msg_body').css('border', '2px solid red');
          
                                  $.wnoty({
                                      type: 'warning',
                                      message: "Input a message body to proceed.",
                                      autohideDelay: 7000
                                  });
                                  
                                  $('#pros_proceed_to_send_message_schedule_btn').html('<i class="ffa-envelope-open-text"> </i> Send');
          
                      }else
                      {
          
          
          
          
                              $('#pros_proceed_to_send_message_schedule_btn').prop('disabled', true);
                              $('#pros_proceed_to_send_message_schedule_btn').html('<i class="fa fa-solid fa-spinner fa-spin" style="font-size:15px;"></i>');
          

                                //   alert('pros');



                              $.ajax({
                                  url: 'https://sendova.co/api/send-message-email/',
                                  type: 'POST',
                                  data: formData,
                                  contentType: false,
                                  processData: false,
                                  success: function(response) {




                                  
                                    

                                      $('#pros_proceed_to_send_message_schedule_btn').prop('disabled', false);
                                      $('#pros_proceed_to_send_message_schedule_btn').html('<i class="fa-envelope-open-text"> </i> Send Message');

                                      // console.log(response);

                                      //  alert(response);


                                      var response = JSON.parse(response);
                                              
          
                                      var status = response["responseMessage"];
                                      var request = response["requestSuccessful"];
                                      var des = response["responseDescription"];
  
                                      var funnelcontent = response["responseBody"];
  
                                      // alert(status);
  
  
                                      // console.log(funnelcontent);
  
  
                                      if(status.trim() == 'success')
                                      {
  
  
                                              $.wnoty({
                                                  type: 'success',
                                                  message: des,
                                                  autohideDelay: 7000
                                              });


  
                                      }else
                                      {



  
                                          $.wnoty({
                                              type: 'warning',
                                              message: des,
                                              autohideDelay: 7000
                                          });


                                      }
                                      // Handle success response
                                  },
                                  error: function(xhr, status, error) {
                                      console.log(error);

                                    //   alert('hello');
                                      // Handle error
                                  }
                              });
                  
          
          
                                
                          
                      }


      }








}


//  PROS SEND EMAIL FUNCTION




$('#ViewEditContactModal').on('show.bs.modal', function (event) {

$('.prosdisplayedit_contact_contact').fadeOut('fast');

var button = event.relatedTarget;
var dataId = button.getAttribute('data-id');

$('#prosload_contact_id_view').val(dataId);

var verificationstate = 'proslviewcontactinfo';
prosauthorizationfunction(verificationstate);

});



function prosloadcontactinfoforedit(token)
{





var brand_id = $('.abba-change-brand').val();
var contact_id = $('#prosload_contact_id_view').val();





        var data = {
            "brand_id": brand_id,
            "token": token,
            "contact_id": contact_id
        };



        $('.pros_view_edit_display').html('<i class="fa fa-solid fa-spinner fa-spin" style="font-size:15px;"></i>');



          // Convert the data object to JSON string
          var jsonData = JSON.stringify(data);
          // Create a new XMLHttpRequest
          var request = new XMLHttpRequest();


          

          // // Set up the request
          request.open('POST', 'https://sendova.co/api/contact-details/');
          request.setRequestHeader('Content-Type', 'application/json');

      

              // Define the callback function to handle the response
          request.onreadystatechange = function () {

      
              if (this.readyState === XMLHttpRequest.DONE) {

                 

                  if (this.status === 200) {

                      var abc = this.responseText;



                      $('.pros_view_edit_display').html('');
                  
                      // alert(abc);



                      var response = JSON.parse(this.responseText);
                      

                      var status = response["responseMessage"];
                      var request = response["requestSuccessful"];
                      var des = response["responseDescription"];

                      var funnelcontent = response["responseBody"];

                    


                      // console.log(funnelcontent);


                      if(status.trim() == 'success')
                      {



                            var item = funnelcontent[0];

                            $('.prosdisplayedit_contact_contact').fadeIn('slow');

                            $('.pros_view_edit_fname').val(item.user_fname);
                            $('.pros_view_edit_mname').val(item.user_mname);
                            $('.pros_view_edit_lname').val(item.user_lname);
                            $('.pros_view_edit_nname').val(item.user_nickname);
                            $('.pros_view_edit_email').val(item.user_email);
                            $('.pros_view_edit_number').val(item.user_phone);
                            $('.pros_view_edit_contact_id').val(item.contact_id.toString());

                        
                         
                         
                         
                            
                            $('.pros_view_edit_country').val(item.user_country_id.toString());
                            $('.pros_view_edit_title').val(item.user_title.toString());

                            $('.pros_view_edit_tag').val(item.tag_id.toString());

                            $('.pros_view_edit_salutation').val(item.user_saluatation.toString());


                            $('.pros_view_edit_dob').val(item.user_DOB.toString());
                            $('.pros_view_edit_gender').val(item.user_gender.toString());
                            $('.pros_view_edit_pib').val(item.user_position.toString());

                            $('.pros_view_edit_city').val(item.user_city.toString());

                            $('.pros_view_edit_spouse_title').val(item.user_spouse_title.toString());

                            $('.pros_view_edit_spouse_fname').val(item.user_spouse_first_name.toString());
                            $('.pros_view_edit_spouse_lname').val(item.user_spouse_last_name.toString());
                            $('.pros_view_edit_spouse_nname').val(item.user_spouse_nick_name.toString());

                            $('.pros_view_edit_spouse_salutation').val(item.user_spouse_salutations.toString());

                            

                            


                                if(item.user_country_id.toString() == '' || item.user_country_id.toString() == 'NULL' )
                                {
                                }else
                                {

                                        if(item.user_state_id.toString() == '' || item.user_state_id.toString() == 'NULL')
                                        {

                                        }else
                                        {



                                            $('#prosvaliadatestatecounthere').val(item.user_state_id.toString());

                                            var verificationstate = 'loadstateedit';
                                            prosauthorizationfunction(verificationstate);


                                          

                                        }


                                }
                              
                       


                              




                      }else
                      {

                      }


                      
                  } else {

                      // Request failed, handle error
                        //   alert("Error: " + this.status);

                          console.log("Error: " + this.status);
                      }
                  }
              };

              // // Send the request with the JSON data as the body
          request.send(jsonData);

   
}





$('body').on('click', '#pros_view_edit_contact_btn', function(){

        var verificationstate = 'proseditcontact';
        prosauthorizationfunction(verificationstate);

});



 // PROS EDIT CONTACT INFO HERE
function  prosediteitcontactfunction(token)
{

    

    var brand_id = $('.abba-change-brand').val();

    var view_edit_tag = $('.pros_view_edit_tag').val();
    var view_edit_title = $('.pros_view_edit_title').val();
    var view_edit_fname = $('.pros_view_edit_fname').val();
    var view_edit_mname = $('.pros_view_edit_mname').val();
    var view_edit_lname = $('.pros_view_edit_lname').val();
    var view_edit_nname = $('.pros_view_edit_nname').val();
    var view_edit_salutation = $('.pros_view_edit_salutation').val();
    var view_edit_email = $('.pros_view_edit_email').val();
    var view_edit_number = $('.pros_view_edit_number').val();
    var view_edit_dob = $('.pros_view_edit_dob').val();
   
    var view_edit_pib = $('.pros_view_edit_pib').val();
    var view_edit_gender = $('.pros_view_edit_gender').val();
    var view_edit_country = $('.pros_view_edit_country').val();
    var view_edit_state = $('.pros_view_edit_state').val();
    var view_edit_city = $('.pros_view_edit_city').val();
    var view_edit_contact_id = $('.pros_view_edit_contact_id').val();
    var view_edit_spouse_title = $('.pros_view_edit_spouse_title').val();
    var view_edit_spouse_fname = $('.pros_view_edit_spouse_fname').val();
    var view_edit_spouse_lname = $('.pros_view_edit_spouse_lname').val();
    var view_edit_spouse_nname = $('.pros_view_edit_spouse_nname').val();
    var view_edit_spouse_salutation = $('.pros_view_edit_spouse_salutation').val();

    
   

  
    
    var formatted_my_number = [];
    $('.pros_view_edit_number').each(function() {
        
        var iti = window.intlTelInputGlobals.getInstance(this);
        
        var my_number_format = $(this).val();
        
        formatted_my_number.push(intlTelInputUtils.formatNumber(my_number_format, iti.getSelectedCountryData().iso2));
        
    });

    formatted_my_number = formatted_my_number.toString();
    formatted_my_number = formatted_my_number.replace(/\+/g, "");


     var data = {
        "brand_id": brand_id,
        "token": token,
        // "epirery": epirery,
        "contact_number":formatted_my_number,
        "contact_tag":view_edit_tag,
        "contact_title":view_edit_title,
        "contact_fname" :view_edit_fname,
        "contact_mname" :view_edit_mname,
        "contact_lname" :view_edit_lname,
        "contact_nname" :view_edit_nname,
        "contact_salutation" :view_edit_salutation,
        "contact_email" :view_edit_email,
        "contact_dob" :view_edit_dob,
        "contact_posistion" :view_edit_pib,
        "contact_gender" :view_edit_gender,
        "contact_country" :view_edit_country,
        "contact_state" :view_edit_state,
        "contact_city" :view_edit_city,
        "contact_id" :view_edit_contact_id,
        "contact_spouse_title" :view_edit_spouse_title,
        "contact_spouse_fname" :view_edit_spouse_fname,
        "contact_spouse_lname" :view_edit_spouse_lname,
        "contact_spouse_nname" :view_edit_spouse_nname,
        "contact_spouse_saluation" :view_edit_spouse_salutation

    };



    if(view_edit_number == '' || view_edit_number == '0')
    {

            $(".pros_view_edit_number").css("border-color", "red");
            
            $.wnoty({
                type: 'warning',
                message: "Please input atleast this contacts phone number to proceed.",
                autohideDelay: 7000
            });

            $('#pros_view_edit_contact_btn').html('<i class="fa fa-save"> Update</i>');


    }else
    {



                        // Convert the data object to JSON string
                        var jsonData = JSON.stringify(data);
                        // Create a new XMLHttpRequest
                        var request = new XMLHttpRequest();


                        $('#pros_view_edit_contact_btn').html('<i class="fa fa-solid fa-spinner fa-spin" style="font-size:15px;"></i>');
                        $('#pros_view_edit_contact_btn').prop('disabled', true);

                            // // Set up the request
                            request.open('POST', 'https://sendova.co/api/update-contact/');
                            request.setRequestHeader('Content-Type', 'application/json');


                                // Define the callback function to handle the response
                            request.onreadystatechange = function () {

                        
                                if (this.readyState === XMLHttpRequest.DONE) {



                                    $('#pros_view_edit_contact_btn').prop('disabled', false);
                                    $('#pros_view_edit_contact_btn').html('<i class="fa fa-save"> Update</i>');
                                    $('#ViewEditContactModal').modal('hide');


                                    if (this.status === 200) {

                                        var abc = this.responseText;

                                        var response = JSON.parse(this.responseText);
                                        

                                        var status = response["responseMessage"];
                                        var request = response["requestSuccessful"];
                                        var des = response["responseDescription"];

                                        var funnelcontent = response["responseBody"];
                                    


                                        // console.log(funnelcontent);


                                        if(status.trim() == 'success')
                                        {

                                                $.wnoty({
                                                    type: 'success',
                                                    message: des,
                                                    autohideDelay: 7000
                                                });


                                                var verificationstate = 'loadcontact';
                                                prosauthorizationfunction(verificationstate);



                                        }else
                                        {

                                            $.wnoty({
                                                type: 'warning',
                                                message: des,
                                                autohideDelay: 7000
                                            });


                                        }

                                        
                                    } else {

                                        // Request failed, handle error
                                            // alert("Error: " + this.status);

                                            console.log("Error: " + this.status);
                                        }
                                    }
                                };

                                // // Send the request with the JSON data as the body
                            request.send(jsonData);








    }

    

}
// PROS EDIT CONTACT INFO HERE





$('body').on('click', '.open_edit_tag_modal', function(){

    var checkedValues = [];
    $('.contact_checkbox:checked').each(function() {
        checkedValues.push($(this).val());
    });

    if(checkedValues.length > 0)
    {
        var contact_id = checkedValues.join(',');

        $('#EditContactTagModal').modal('show');

    }
    else
    {
        $('#EditContactTagModal').modal('hide');

        $.wnoty({
            type: 'warning',
            message: "Select one or more contact that you want to change their tag before proceeding.",
            autohideDelay: 7000
        });
    }
    
});




$('body').on('click', '#pros_edit_contact_tag_btn', function(){



        var verificationstate = 'proseditcontacttags';
        prosauthorizationfunction(verificationstate);
  

    
});



function proseditcontacttag(token)
{


    var brand_id = $('.abba-change-brand').val();

    var tags = $('.pros_change-tag option:selected').val();
    
    var checkedValues = [];
    $('.contact_checkbox:checked').each(function() {
        checkedValues.push($(this).val());
    });

    if(checkedValues.length > 0 && tags != '' && tags != '0' && tags != 'NULL')
    {




                    var contact_id = checkedValues.join(',');

                        var data = {
                            "brand_id": brand_id,
                            "token": token,
                            // "epirery": epirery,
                            "contact_id":contact_id,
                            "tag_id":tags
                            
                        };





                        // Convert the data object to JSON string
                        var jsonData = JSON.stringify(data);
                        // Create a new XMLHttpRequest
                        var request = new XMLHttpRequest();
                        
                        // console.log(jsonData);


                        $('#pros_edit_contact_tag_btn').html('<i class="fa fa-solid fa-spinner fa-spin" style="font-size:15px;"></i>');
                        $('#pros_edit_contact_tag_btn').prop('disabled', true);

                             // Set up the request
                            request.open('POST', 'https://sendova.co/api/change-contact-tag/');
                            request.setRequestHeader('Content-Type', 'application/json');


                            // Define the callback function to handle the response
                            request.onreadystatechange = function () {

                        
                                if (this.readyState === XMLHttpRequest.DONE) {

                                    $('#pros_edit_contact_tag_btn').prop('disabled', false);
                                    $('#pros_edit_contact_tag_btn').html('<i class="fa fa-save"> Update</i>');
                                    $('#EditContactTagModal').modal('hide');


                                    if (this.status === 200) {



                                        var abc = this.responseText;
                                        // alert(abc);


                                       var response = JSON.parse(this.responseText);
                                        

                                        var status = response["responseMessage"];
                                        var request = response["requestSuccessful"];
                                        var des = response["responseDescription"];

                                        var funnelcontent = response["responseBody"];
                                    


                                        if(status.trim() == 'success')
                                        {



                                                $.wnoty({
                                                    type: 'success',
                                                    message: des,
                                                    autohideDelay: 7000
                                                });



                                                $('.tag_checkboxes').prop('checked', false);
                                                $('#flexCheckIndeterminate_'+tags).prop('checked', true);
                                                
                                                 var verificationstate = 'loadcontact';
                                                 prosauthorizationfunction(verificationstate);


                                               



                                        }else
                                        {

                                            $.wnoty({
                                                type: 'warning',
                                                message: des,
                                                autohideDelay: 7000
                                            });


                                        }

                                        
                                    } else {

                                        // Request failed, handle error
                                            // alert("Error: " + this.status);

                                            console.log("Error: " + this.status);
                                        }
                                    }
                                };

                                // // Send the request with the JSON data as the body
                            request.send(jsonData);



    }
    else if(tags == '' || tags == '0')
    {

        $.wnoty({
            type: 'warning',
            message: "Select a tag to proceed.",
            autohideDelay: 7000
        });

        $('#pros_edit_contact_tag_btn').html('<i class="fa fa-save"> Update</i>');

    }
    else
    {
        
            $.wnoty({
                type: 'warning',
                message: "Select one or more contact that you want to change their tag before proceeding.",
                autohideDelay: 7000
            });
            
            $('#pros_edit_contact_tag_btn').html('<i class="fa fa-save"> Update</i>');

    }


    
}





$('body').on('click', '.open_delete_contact_modal', function(){

    var checkedValues = [];
    $('.contact_checkbox:checked').each(function() {
        checkedValues.push($(this).val());
    });

    if(checkedValues.length > 0)
    {
        var contact_id = checkedValues.join(',');

        $('#DeleteContactModalcont').modal('show');

    }
    else
    {
        $('#DeleteContactModalcont').modal('hide');

        $.wnoty({
            type: 'warning',
            message: "Select one or more contact that you want to delete before proceeding.",
            autohideDelay: 7000
        });
    }
    
});


// PR
$('body').on('click', '#pros_proceed_to_delete_contact_btn', function(){

    var verificationstate = 'prosdeletecontact';
    prosauthorizationfunction(verificationstate);




});



// DELETE CONTACT FUNCTION

function prosdeletecontactfun(token)
{



     var brand_id = $('.abba-change-brand').val();

    var checkedValues = [];
    $('.contact_checkbox:checked').each(function() {
        checkedValues.push($(this).val());
    });


    var contact_id = checkedValues.join(',');

    var data = {
        "email": '',
        "token": token,
        // "epirery": epirery,
        "contact_id":contact_id
    };





    // Convert the data object to JSON string
    var jsonData = JSON.stringify(data);
    // Create a new XMLHttpRequest
    var request = new XMLHttpRequest();


    $('#pros_proceed_to_delete_contact_btn').html('<i class="fa fa-solid fa-spinner fa-spin" style="font-size:15px;"></i>');
    $('#pros_proceed_to_delete_contact_btn').prop('disabled', true);

         // Set up the request
        request.open('POST', 'https://sendova.co/api/delete-contact/');
        request.setRequestHeader('Content-Type', 'application/json');


            // Define the callback function to handle the response
        request.onreadystatechange = function () {

    
            if (this.readyState === XMLHttpRequest.DONE) {

                


                $('#pros_proceed_to_delete_contact_btn').prop('disabled', false);
                $('#pros_proceed_to_delete_contact_btn').html(' <i class="fa fa-solid fa-trash" aria-hidden="true"> Delete</i>');
                $('#DeleteContactModalcont').modal('hide');


                if (this.status === 200) {

                   var abc = this.responseText;
                   var response = JSON.parse(this.responseText);
                    

                    var status = response["responseMessage"];
                    var request = response["requestSuccessful"];
                    var des = response["responseDescription"];

                    var funnelcontent = response["responseBody"];
                


                    if(status.trim() == 'success')
                    {



                            $.wnoty({
                                type: 'success',
                                message: des,
                                autohideDelay: 7000
                            });
                            
                             var verificationstate = 'loadcontact';
                             prosauthorizationfunction(verificationstate);


                           



                    }else
                    {

                        $.wnoty({
                            type: 'warning',
                            message: des,
                            autohideDelay: 7000
                        });


                    }

                    
                } else {

                    // Request failed, handle error
                        // alert("Error: " + this.status);

                        console.log("Error: " + this.status);
                    }
                }
            };

            // // Send the request with the JSON data as the body
        request.send(jsonData);







}




$('body').on('click', '.pros-nextcampaigbtn-firstbutton', function(){
          
          
    var  funnel_campaign = $('.pros_add_funnel_campaign').val();
    var  tag_campaign = $('.pros_add_tag_campaign').val();
    var  proscampaiagnmessagetype = $('.proscampaiagnmessagetype').val();
    var  campaign_title = $('.prosschedule_title').val();


   
    

    if(funnel_campaign == 'NULL' || tag_campaign == 'NULL' || proscampaiagnmessagetype == 'NULL')
    {


                $.wnoty({
                    type: 'warning',
                    message: 'All field must be filled',
                    autohideDelay: 7000
                });

    }else if(campaign_title == '')
    {
      
      
      
      
                    $.wnoty({
                        type: 'warning',
                        message: 'Input message title',
                        autohideDelay: 7000
                    });  
                    
                    $('.prosschedule_title').css('border', '2px solid red');
                
                
        
        
    }
    
    else
    {



          $('.prosschedule_title').css('border', '');

          $('.pros_full_set_campiagn_cont').fadeIn();//modal footer with submit btn

            $('.prosloademailactivecontent').removeClass('active');
            $('.prosloadwaactivecontent').removeClass('active');
            $('.prosloadsmsactivecontent').removeClass('active');

              if(proscampaiagnmessagetype == 'email')
              {


                //   $('.prosloadwatabforcampaign').fadeOut();
                  
                  $('.prosloademailactivecontent').addClass('active');

                // prosloademailactivecontent prosloadwaactivecontent

                $('.prosloadwatabforcampaign').fadeOut();
                 $('.prosloadsmstabforcampaign').fadeOut();
                $('.prosloademailtabforcampaign').fadeIn();

              }else if(proscampaiagnmessagetype == 'wa')
              {
                  
                  
                $('.prosloadwaactivecontent').addClass('active');
                $('.prosloadwatabforcampaign').fadeIn();
                
                 $('.prosloadsmstabforcampaign').fadeOut();
                
                $('.prosloademailtabforcampaign').fadeOut();

              }else if(proscampaiagnmessagetype == 'sms')
              {
                  
                  
                   $('.prosloadsmsactivecontent').addClass('active');
                
                    
                     $('.prosloadsmstabforcampaign').fadeIn();
                    
                    $('.prosloademailtabforcampaign').fadeOut();
                    $('.prosloadwatabforcampaign').fadeOut();
                  
              }
              
              else if(proscampaiagnmessagetype == 'both')
              {

                $('.prosloadwaactivecontent').addClass('active');
                $('.prosloadwatabforcampaign').fadeIn();
                $('.prosloademailtabforcampaign').fadeIn();
                
                $('.prosloademailtabforcampaign').fadeIn();
              }
             

             $('.prosloadfirstcampaignsettings').fadeOut();

             $('.prosloadsecondcampaignwizard').fadeIn();

    }





});




//  pros addd campaign content here for whatsApp messaging

$('body').on('click', '.prosappendnewcampaignmsgbtn', function(){


              var prosloadsteps = $('.prosloadcampaignstepforwa').val();
              prosloadsteps++;

               var prosloadappendcontent = `<div class="prosloadwacontenthere${prosloadsteps}"><br> <div class="card shadow">
                    
                <div class="card-body ">
                   <a class="fa fa-times float-end text-danger prosgeneralremovewageneral" data-id="${prosloadsteps}" style="font-size:18px;text-decoration:none;cursor:pointer;"></a>
                    <h5 class="card-title prosloadupdatednumberformsgnumberwa">Message (${prosloadsteps})</h5>

                    <div class="mt-5">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Message Subject</label>
                            <input type="email" class="form-control msg_subjectcampiagn1"  placeholder="Message Subject">
                        </div>
                    </div>


                   
                    <div class="mt-5">
                        <div class="mb-3">

                            <label for="exampleFormControlInput1" class="form-label">Select message interval(no days) </label>
                            <input type="number" class="form-control msg_durationcampaign1">

                        </div>
                    </div>

                   


                    <div class="mt-5">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">File(Image, Video) </label>
                            <input type="file"  class="form-control prosloadfilecampaign1" accept="image/*,video/*">
                        </div>
                    </div>


                    <div class="mt-5">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Message Body</label>
                            <textarea class="form-control msg_bodycampaign1" rows="6" placeholder="Message Body"></textarea>
                        </div>
                    </div>
                  
                </div>
            </div> </div>`;


             $('.prosloadcampaignstepforwa').val(prosloadsteps);
            $('.prosloadappendcampaigncontent').append(prosloadappendcontent);

});


 
// PROS REMOVE WHATSAPP MSG CONTENT HERE
$('body').on('click', '.prosgeneralremovewageneral', function(){
          
        var messagestageid = $(this).data('id');


        $('.prosloadwacontenthere'+messagestageid).remove();

        var countnum = 1;

        $('.prosloadupdatednumberformsgnumberwa').each(function() {


            countnum++;

            $(this).html('Message(' + countnum +')');
           
        });

        $('.prosloadcampaignstepforwa').val(countnum);

});
// PROS REMOVE WHATSAPP MSG CONTENT HERE





//  pros addd campaign content here for whatsApp messaging

$('body').on('click', '.prosappendnewcampaignmsgemailbtn', function(){

//    alert('hello');


        var prosloadsteps = $('.prosloadcampaignstepforemail').val();
        prosloadsteps++;

        var prosloadappendcontent = `<div class="prosloademailcontenthere${prosloadsteps}"><br><div class="card shadow">
        <div class="card-body">
            <a class="fa fa-times float-end text-danger prosgeneralremoveemailgeneral" data-id="${prosloadsteps}" style="font-size:18px;text-decoration:none;cursor:pointer;"></a>
            <h5 class="card-title prosloadupdatednumberformsgnumberemail">Message (${prosloadsteps})</h5>

            <div class="mt-5">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Message Subject</label>
                    <input type="text" class="form-control msg_subjectcampiagnemail1"  placeholder="Message Subject">
                </div>
            </div>



            <div class="mt-5">
                <div class="mb-3">

                    <label for="exampleFormControlInput1" class="form-label">Select time message should be sent(Optional) </label>
                    <input type="datetime-local" class="form-control msg_durationcampaignmail1">

                </div>
            </div>


            <div class="mt-5">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">File(Image, Video) </label>
                    <input type="file"  class="form-control prosloadfilecampaignemail1" accept="image/*,video/*">
                </div>
            </div>


            <div class="mt-5">
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Message Body</label>
                    <textarea class="form-control msg_bodycampaignemail1" rows="6" placeholder="Message Body"></textarea>
                </div>
            </div>

            
        </div>
    </div></div>`;

$('.prosloadcampaignstepforemail').val(prosloadsteps);
$('.prosloadappendcampaigncontentemail').append(prosloadappendcontent);


$('.msg_bodycampaignemail1').summernote();



});






//  pros addd campaign content here for whatsApp messaging

$('body').on('click', '.prosappendnewcampaignmsgsmsbtn', function(){

//    alert('hello');


        var prosloadsteps = $('.prosloadcampaignstepforsms').val();
        prosloadsteps++;

        var prosloadappendcontent = `<div class="prosloadsmscontenthere${prosloadsteps}"><br><div class="card shadow">
        <div class="card-body">
            <a class="fa fa-times float-end text-danger prosgeneralremovesmsgeneral" data-id="${prosloadsteps}" style="font-size:18px;text-decoration:none;cursor:pointer;"></a>
            <h5 class="card-title prosloadupdatednumberformsgnumbersms">Message (${prosloadsteps})</h5>

            <div class="mt-5">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Message Subject</label>
                    <input type="text" class="form-control msg_subjectcampiagnsms1"  placeholder="Message Subject">
                </div>
            </div>



            <div class="mt-5">
                <div class="mb-3">

                    <label for="exampleFormControlInput1" class="form-label">Input message interval(hourly) </label>
                    <input type="datetime-local" class="form-control msg_durationcampaignsms1">

                </div>
            </div>


           


            <div class="mt-5">
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Message Body</label>
                    <textarea class="form-control msg_bodycampaignsms1" rows="6" placeholder="Message Body"></textarea>
                </div>
            </div>

            
        </div>
    </div></div>`;

$('.prosloadcampaignstepforsms').val(prosloadsteps);
$('.prosloadappendcampaigncontentesms').append(prosloadappendcontent);


// $('.msg_bodycampaignsms1').summernote();



});



// PROS REMOVE EMAIL MSG CONTENT HERE
$('body').on('click', '.prosgeneralremoveemailgeneral', function(){
          
var messagestageid = $(this).data('id');


$('.prosloademailcontenthere'+messagestageid).remove();

var countnumemail = 1;

$('.prosloadupdatednumberformsgnumberemail').each(function() {


countnumemail++;

$(this).html('Message(' + countnumemail +')');

});

$('.prosloadcampaignstepforemail').val(countnumemail);

});
// PROS REMOVE EMAIL MSG CONTENT HERE





// PROS REMOVE EMAIL MSG CONTENT HERE
$('body').on('click', '.prosgeneralremovesmsgeneral', function(){
          
var messagestageid_sms = $(this).data('id');


$('.prosloadsmscontenthere'+messagestageid_sms).remove();

var countnumsms = 1;

$('.prosloadupdatednumberformsgnumbersms').each(function() {


countnumemail++;

$(this).html('Message(' + countnumsms +')');

});

$('.prosloadcampaignstepforsms').val(countnumsms);

});
// PROS REMOVE EMAIL MSG CONTENT HERE




// BACK_WARD_BTN_FROM_SECOND_STEP

$('body').on('click', '.prosback_ward_btn_wizard', function(){
        $('.prosloadsecondcampaignwizard').fadeOut();
        $('.prosloadfirstcampaignsettings').fadeIn();


        $('.pros_full_set_campiagn_cont').fadeOut();

        
        
        
});

// BACK_WARD_BTN_FROM_SECOND_STEP


//load tag onchange on funnel
$('body').on('change', '.pros_add_funnel_campaign', function(){
    
    var verificationstate = 'prosloadtagonchnagefunel';
    prosauthorizationfunction(verificationstate);
});


$('body').on('change', '.pros_load_funnel_preview', function(){
    var verificationstate = 'prosloadtagonchnagefunelview';
    prosauthorizationfunction(verificationstate);
});

//load tag onchange on funnel







$('body').on('click', '#pros_submit_campaign_btn', function(){

  var checkemailorwa = $('.prosgeneralcampiagncheckbtn.active').data('id');

  if(checkemailorwa == 'wa')
  {

            var verificationstate = 'schedulewamsg';
   
   
            prosauthorizationfunction(verificationstate);

  }else  if(checkemailorwa == 'mail')
  {



                      var countempybody_email = 0;
                    
                    var bodymsgedit_email = [];

                    $('.msg_bodycampaignemail1').each(function() {

                    var prosgetvaluecontent_email =  $(this).val();

                    if(prosgetvaluecontent_email == '')
                    {


                        


                        $(this).css('border', '2px solid red');

                        countempybody_email++;
                    }else
                    {
                            $(this).css('border', '2px solid green');
                    }


                            

                        bodymsgedit_email.push($(this).summernote('code'));
                    });


                    // alert(bodymsgedit_email);
                    
        


                    var countempybody_duration_email  = 0;
                    var durationmsgedit_email   = [];

                    $('.msg_durationcampaignemail1').each(function() {

                        var prosgetvaluecontent_duration_email  =  $(this).val();
    
                        if(prosgetvaluecontent_duration_email == '')
                        {
                            countempybody_duration_email++;

                            $(this).css('border', '2px solid red');
                        }else
                        {
                            $(this).css('border', '2px solid green');
                        }
    
                        durationmsgedit_email.push($(this).val());
                    });





                    //VALIDATE MAIL MSG BEFORE SENDING REQUEST 


                    if(countempybody_email > 0)
                    {





                            $.wnoty({
                                type: 'warning',
                                message: 'Hey, make sure no message body is left empty',
                                autohideDelay: 5000
                            });


                    }else if(countempybody_duration_email > 0)
                    {




                                $.wnoty({
                                    type: 'warning',
                                    message: 'Hey, make sure no message interval is left blank',
                                    autohideDelay: 5000
                                });



                    }else
                    {




                            var verificationstate = 'scheduleemailmsg';
                           prosauthorizationfunction(verificationstate);

                           




                               
                    }



  
      
  }else
  {
      
      
      
      
      
                   var countempybody_sms = 0;
                    
                    var bodymsgedit_sms= [];

                    $('.msg_bodycampaignsms1').each(function() {

                    var prosgetvaluecontent_sms =  $(this).val();

                    if(prosgetvaluecontent_sms == '')
                    {


                        


                        $(this).css('border', '2px solid red');

                        countempybody_sms++;
                    }else
                    {
                            $(this).css('border', '2px solid green');
                    }


                            

                        bodymsgedit_sms.push($(this).val());
                    });


                    // alert(bodymsgedit_email);
                    
        


                    var countempybody_duration_sms  = 0;
                    var durationmsgedit_sms   = [];

                    $('.msg_durationcampaignsms1').each(function() {

                        var prosgetvaluecontent_duration_sms  =  $(this).val();
    
                        if(prosgetvaluecontent_duration_sms == '')
                        {
                            countempybody_duration_sms++;

                            $(this).css('border', '2px solid red');
                        }else
                        {
                            $(this).css('border', '2px solid green');
                        }
    
                        durationmsgedit_sms.push($(this).val());
                    });





                    //VALIDATE MAIL MSG BEFORE SENDING REQUEST 


                    if(countempybody_sms > 0)
                    {





                            $.wnoty({
                                type: 'warning',
                                message: 'Hey, make sure no SMS message body is left empty',
                                autohideDelay: 5000
                            });


                    }else if(countempybody_duration_sms > 0)
                    {




                                $.wnoty({
                                    type: 'warning',
                                    message: 'Hey, make sure no SMS message interval is left blank',
                                    autohideDelay: 5000
                                });



                    }else
                    {




                            var verificationstate = 'schedulesmsmsg';
                           prosauthorizationfunction(verificationstate);

                           




                               
                    }

      
      
      
      
      
      
      
      
      
      
      
      
  }




});




// SCHEDULE EMAIL MSG

   function proscreateemailcampiagn(token)
    {


                                                
       var brand_id = $('.abba-change-brand').val();


        var prosmsgsubject = [];

        $('.msg_subjectcampiagnemail1').each(function() {
        prosmsgsubject.push($(this).val());
        });





     

    var prosmessagduration = [];


    var countnumberofbody_empty_timer = 0;

    $('.msg_durationcampaignemail1').each(function() {

    prosmessagduration.push($(this).val());

        
        var timmercounempty = $(this).val();

    //  alert(timmercounempty);

    //  alert(timmercounempty);

        if(timmercounempty == '')
        {
        countnumberofbody_empty_timer++;
        $(this).css('border', '2px solid red');

        }else
        {
            $(this).css('border', '2px solid green');
        }
        
    });

    
    
            


    var bodymsg = [];
    var countnumberofbody_empty = 0;

    $('.msg_bodycampaignemail1').each(function() {

    bodymsg.push($(this).summernote('code'));


    var prosloamsgbody =  $(this).summernote('code');

    if(prosloamsgbody == '')
    {
        countnumberofbody_empty++;

        $(this).css('border', '2px solid red');
    }else
    {


            $(this).css('border', '2px solid green');
        

    }

    });






        var pros_set_file = [];
        
    $('.prosloadfilecampaignemail1').each(function() {
        var fileInput = $(this)[0]; // Access the DOM element from the jQuery object
        var files = fileInput.files; // Access the files property
    
        // Loop through each file in the file input
        for (var i = 0; i < files.length; i++) {

            var file = files[i];

            pros_set_file.push(file);
    
            var allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'video/mp4', 'video/quicktime'];
            
            // Check if the file type is allowed
            if (allowedTypes.includes(file.type)) {
                // File type is allowed, proceed with further actions if needed
            } else {
                // File type is not allowed, handle the error or skip the file
            }
        }
    });

    // console.log(pros_set_file);


    var  funnel_id = $('.pros_add_funnel_campaign').val();
    var  tag_id = $('.pros_add_tag_campaign').val();
      var  campaign_title = $('.prosschedule_title').val();


        if(countnumberofbody_empty > 0) 
        {


                $.wnoty({
                    type: 'warning',
                    message: 'All message body should be inputted',
                    autohideDelay: 7000
                });

        }
        else if(countnumberofbody_empty_timer > 0)
        {


            $.wnoty({
                type: 'warning',
                message: 'Message duration should not be blank',
                autohideDelay: 7000
            });

        }else {


                var duration_interval = prosmessagduration.join('###,');
                var msg_body = bodymsg.join('###,');
                var msg_subject = prosmsgsubject.join('###,');

                // var file = pros_set_file;

                // alert(file);
                


                var formData = new FormData();
                formData.append('duration_interval', duration_interval);
                formData.append('token', token);
                formData.append('msg_subject', msg_subject);
                formData.append('msg_body', msg_body);

                // formData.append('filaname', file);

                formData.append('brand_id', brand_id);
                formData.append('tag_id', tag_id);
                formData.append('funnel_id', funnel_id);
                formData.append('campaign_title', campaign_title);
                
                






                // Append each file individually
                for (var i = 0; i < pros_set_file.length; i++) {
                    formData.append('file[]', pros_set_file[i]); // Append each file as an array
                }





                    


                    //   console.log(formData);

                    $('#pros_submit_campaign_btn').prop('disabled', true);
                    $('#pros_submit_campaign_btn').html('<i class="fa fa-solid fa-spinner fa-spin" style="font-size:15px;"></i>');






                    $.ajax({
                        url: 'https://sendova.co/api/schedule-campaign-email/',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {

                            // alert(response);

                            $('#pros_submit_campaign_btn').prop('disabled', false);
                            $('#pros_submit_campaign_btn').html('<i class="fa-envelope-open-text"> </i> Schedule Now');

                            


                            var response = JSON.parse(response);
                                    

                            var status = response["responseMessage"];
                            var request = response["requestSuccessful"];
                            var des = response["responseDescription"];

                            var funnelcontent = response["responseBody"];

                            


                            // console.log(funnelcontent);


                            if(status.trim() == 'success')
                            {


                                    $.wnoty({
                                        type: 'success',
                                        message: des,
                                        autohideDelay: 7000
                                    });


                            }else
                            {

                                $.wnoty({
                                    type: 'warning',
                                    message: des,
                                    autohideDelay: 7000
                                });

                            }
                            // Handle success response
                        },
                        error: function(xhr, status, error) {
                            // alert('hello');
                            console.log(error);
                            // Handle error
                        }
                    });
        

            
    
        }

                    
        
    }
// SCHEDULE EMAIL MSG






// SCHEDULE SMS MSG




  function proscreatesmscampiagn(token)
    {


                                                
       var brand_id = $('.abba-change-brand').val();


        var prosmsgsubject = [];

        $('.msg_subjectcampiagnsms1').each(function() {
        prosmsgsubject.push($(this).val());
        });





     

    var prosmessagduration = [];


    var countnumberofbody_empty_timer = 0;

    $('.msg_durationcampaignsms1').each(function() {

    prosmessagduration.push($(this).val());

        
        var timmercounempty = $(this).val();

    //  alert(timmercounempty);

    //  alert(timmercounempty);

        if(timmercounempty == '')
        {
        countnumberofbody_empty_timer++;
        $(this).css('border', '2px solid red');

        }else
        {
            $(this).css('border', '2px solid green');
        }
        
    });

    
    
            


    var bodymsg = [];
    var countnumberofbody_empty = 0;

    $('.msg_bodycampaignsms1').each(function() {

    bodymsg.push($(this).val());


    var prosloamsgbody =  $(this).val();

    if(prosloamsgbody == '')
    {
        countnumberofbody_empty++;

        $(this).css('border', '2px solid red');
    }else
    {


            $(this).css('border', '2px solid green');
        

    }

    });







    // console.log(pros_set_file);


    var  funnel_id = $('.pros_add_funnel_campaign').val();
    var  tag_id = $('.pros_add_tag_campaign').val();
    var  campaign_title = $('.prosschedule_title').val();
    
    
    


        if(countnumberofbody_empty > 0) 
        {


                $.wnoty({
                    type: 'warning',
                    message: 'All message body should be inputted',
                    autohideDelay: 7000
                });

        }
        else if(countnumberofbody_empty_timer > 0)
        {


            $.wnoty({
                type: 'warning',
                message: 'Message duration should not be blank',
                autohideDelay: 7000
            });

        }else {


                var duration_interval = prosmessagduration.join('###,');
                var msg_body = bodymsg.join('###,');
                var msg_subject = prosmsgsubject.join('###,');

                // var file = pros_set_file;

                // alert(file);
                


                var formData = new FormData();
                formData.append('duration_interval', duration_interval);
                formData.append('token', token);
                formData.append('msg_subject', msg_subject);
                formData.append('msg_body', msg_body);

                // formData.append('filaname', file);

                formData.append('brand_id', brand_id);
                formData.append('tag_id', tag_id);
                formData.append('funnel_id', funnel_id);
                formData.append('campaign_title', campaign_title);
                
                
                

                    //   console.log(formData);

                    $('#pros_submit_campaign_btn').prop('disabled', true);
                    $('#pros_submit_campaign_btn').html('<i class="fa fa-solid fa-spinner fa-spin" style="font-size:15px;"></i>');






                    $.ajax({
                        url: 'https://sendova.co/api/schedule-campaign-sms/',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {

                            // alert(response);

                            $('#pros_submit_campaign_btn').prop('disabled', false);
                            $('#pros_submit_campaign_btn').html('<i class="fa-envelope-open-text"> </i> Schedule Now');

                            


                            var response = JSON.parse(response);
                                    

                            var status = response["responseMessage"];
                            var request = response["requestSuccessful"];
                            var des = response["responseDescription"];

                            var funnelcontent = response["responseBody"];

                            


                            // console.log(funnelcontent);


                            if(status.trim() == 'success')
                            {


                                    $.wnoty({
                                        type: 'success',
                                        message: des,
                                        autohideDelay: 7000
                                    });


                            }else
                            {

                                $.wnoty({
                                    type: 'warning',
                                    message: des,
                                    autohideDelay: 7000
                                });

                            }
                            // Handle success response
                        },
                        error: function(xhr, status, error) {
                            // alert('hello');
                            console.log(error);
                            // Handle error
                        }
                    });
        

            
    
        }

                    
        
    }




// SCHEDULE SMS MSG












//PROS SCHEDULE WA MSG CAMPAIGN
function  prosshedulewacampaign(token)
{


var brand_id = $('.abba-change-brand').val();

 var prosmsgsubject = [];

$('.msg_subjectcampiagn1').each(function() {
    prosmsgsubject.push($(this).val());
});



 var prosmessagduration = [];


 var countnumberofbody_empty_timer = 0;

$('.msg_durationcampaign1').each(function() {

    prosmessagduration.push($(this).val());

     
     var timmercounempty = $(this).val();

    //  alert(timmercounempty);

    //  alert(timmercounempty);

     if(timmercounempty == '')
     {
        countnumberofbody_empty_timer++;
        $(this).css('border', '2px solid red');

     }else
     {
          $(this).css('border', '2px solid green');
     }
        
});



var bodymsg = [];
var countnumberofbody_empty = 0;

$('.msg_bodycampaign1').each(function() {

    bodymsg.push($(this).val());


    var prosloamsgbody =  $(this).val();

    if(prosloamsgbody == '')
    {
        countnumberofbody_empty++;

        $(this).css('border', '2px solid red');
    }else
    {


           $(this).css('border', '2px solid green');
      

    }

});






     var pros_set_file = [];
      
    $('.prosloadfilecampaign1').each(function() {
        var fileInput = $(this)[0]; // Access the DOM element from the jQuery object
        var files = fileInput.files; // Access the files property
    
        // Loop through each file in the file input
        for (var i = 0; i < files.length; i++) {

            var file = files[i];

            pros_set_file.push(file);
    
            var allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'video/mp4', 'video/quicktime'];
            
            // Check if the file type is allowed
            if (allowedTypes.includes(file.type)) {
                // File type is allowed, proceed with further actions if needed
            } else {
                // File type is not allowed, handle the error or skip the file
            }
        }
    });

    // console.log(pros_set_file);


    var  funnel_id = $('.pros_add_funnel_campaign').val();
    var  tag_id = $('.pros_add_tag_campaign').val();
    var  campaign_title = $('.prosschedule_title').val();
    


     if(countnumberofbody_empty > 0) 
     {


                $.wnoty({
                    type: 'warning',
                    message: 'All message body should be inputted',
                    autohideDelay: 7000
                });

     }
     else if(countnumberofbody_empty_timer > 0)
     {


            $.wnoty({
                type: 'warning',
                message: 'Message duration should not be blank',
                autohideDelay: 7000
            });

     }else {


                var duration_interval = prosmessagduration.join('###,');
                var msg_body = bodymsg.join('###,');
                var msg_subject = prosmsgsubject.join('###,');

                // var file = pros_set_file;

                // alert(file);
               


                var formData = new FormData();
                formData.append('duration_interval', duration_interval);
                formData.append('token', token);
                formData.append('msg_subject', msg_subject);
                formData.append('msg_body', msg_body);

                // formData.append('filaname', file);

                formData.append('brand_id', brand_id);
                formData.append('tag_id', tag_id);
                formData.append('funnel_id', funnel_id);
                formData.append('campaign_title', campaign_title);
                
                
                
                






                // Append each file individually
                for (var i = 0; i < pros_set_file.length; i++) {
                    formData.append('file[]', pros_set_file[i]); // Append each file as an array
                }



                    //   console.log(formData);

                    $('#pros_submit_campaign_btn').prop('disabled', true);
                    $('#pros_submit_campaign_btn').html('<i class="fa fa-solid fa-spinner fa-spin" style="font-size:15px;"></i>');






                    $.ajax({
                        url: 'https://sendova.co/api/schedule-campaign-wa/',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {

                            // alert(response);

                            $('#pros_submit_campaign_btn').prop('disabled', false);
                            $('#pros_submit_campaign_btn').html('<i class="fa-envelope-open-text"> </i> Schedule Now');

                           


                            var response = JSON.parse(response);
                                    

                            var status = response["responseMessage"];
                            var request = response["requestSuccessful"];
                            var des = response["responseDescription"];

                            var funnelcontent = response["responseBody"];

                            


                            // console.log(funnelcontent);


                            if(status.trim() == 'success')
                            {


                                    $.wnoty({
                                        type: 'success',
                                        message: des,
                                        autohideDelay: 7000
                                    });


                            }else
                            {

                                $.wnoty({
                                    type: 'warning',
                                    message: des,
                                    autohideDelay: 7000
                                });

                            }
                            // Handle success response
                        },
                        error: function(xhr, status, error) {
                            // alert('hello');
                            console.log(error);
                            // Handle error
                        }
                    });
        

            
    
     }



}
//PROS SCHEDULE WA MSG CAMPAIGN







//  pros load load tag for campaign 

function prosloadtaforcampaign(token)
{
    
    

    var brand_id = $('.abba-change-brand').val();
    var  funnel_id = $('.pros_add_funnel_campaign option:selected').val();






  

    var data = {
        "brand_id": brand_id,
        "token": token,
        "funnel_id":funnel_id
    };





    // Convert the data object to JSON string
    var jsonData = JSON.stringify(data);
    // Create a new XMLHttpRequest
    var request = new XMLHttpRequest();


    // $('#pros_proceed_to_delete_contact_btn').html('<i class="fa fa-solid fa-spinner fa-spin" style="font-size:15px;"></i>');
    // $('#pros_proceed_to_delete_contact_btn').prop('disabled', true);

         // Set up the request
        request.open('POST', 'https://sendova.co/api/load-tag-campaign/');
        request.setRequestHeader('Content-Type', 'application/json');


            // Define the callback function to handle the response
        request.onreadystatechange = function () {

    
            if (this.readyState === XMLHttpRequest.DONE) {

                var prosloadcontentenoptions = '<option value="NULL">Select Tag</option>';


                // $('#pros_proceed_to_delete_contact_btn').prop('disabled', false);
                // $('#pros_proceed_to_delete_contact_btn').html(' <i class="fa fa-solid fa-trash" aria-hidden="true"> Delete</i>');
                // $('#DeleteContactModalcont').modal('hide');


                if (this.status === 200) {

                   var abc = this.responseText;
                   var response = JSON.parse(this.responseText);
                    

                    var status = response["responseMessage"];
                    var request = response["requestSuccessful"];
                    var des = response["responseDescription"];

                    var funnelcontent = response["responseBody"];


                    for (var i = 0; i < funnelcontent.length; i++) {


                        var item = funnelcontent[i];




                       
                        prosloadcontentenoptions+=`<option value="${item.tag_id.toString()}">${item.tag_title}</option>`;
                       

                        // console.log("Funnel Title: " + item.funnel_title);
                        // console.log("Funnel ID: " + item.funnel_id);
                        // console.log("Brand ID: " + item.brand_id);



                    }


                    $('.pros_add_tag_campaign').html(prosloadcontentenoptions);

                  
                    
                } else {

                    // Request failed, handle error
                        // alert("Error: " + this.status);

                        console.log("Error: " + this.status);
                    }
                }
            };

            // // Send the request with the JSON data as the body
          request.send(jsonData);







}




function   prosloadtaforcampaigntaghistor(token)
{


    var brand_id = $('.abba-change-brand').val();
    var  funnel_id = $('.pros_load_funnel_preview option:selected').val();

    




  

    var data = {
        "brand_id": brand_id,
        "token": token,
        "funnel_id":funnel_id
    };





    // Convert the data object to JSON string
    var jsonData = JSON.stringify(data);
    // Create a new XMLHttpRequest
    var request = new XMLHttpRequest();


    // $('#pros_proceed_to_delete_contact_btn').html('<i class="fa fa-solid fa-spinner fa-spin" style="font-size:15px;"></i>');
    // $('#pros_proceed_to_delete_contact_btn').prop('disabled', true);

         // Set up the request
        request.open('POST', 'https://sendova.co/api/load-tag-campaign/');
        request.setRequestHeader('Content-Type', 'application/json');


            // Define the callback function to handle the response
        request.onreadystatechange = function () {

    
            if (this.readyState === XMLHttpRequest.DONE) {

                var prosloadcontentenoptions = '<option value="NULL">Select Tag</option>';


                // $('#pros_proceed_to_delete_contact_btn').prop('disabled', false);
                // $('#pros_proceed_to_delete_contact_btn').html(' <i class="fa fa-solid fa-trash" aria-hidden="true"> Delete</i>');
                // $('#DeleteContactModalcont').modal('hide');


                if (this.status === 200) {

                   var abc = this.responseText;
                   var response = JSON.parse(this.responseText);
                    

                    var status = response["responseMessage"];
                    var request = response["requestSuccessful"];
                    var des = response["responseDescription"];

                    var funnelcontent = response["responseBody"];


                    for (var i = 0; i < funnelcontent.length; i++) {


                        var item = funnelcontent[i];




                       
                        prosloadcontentenoptions+=`<option value="${item.tag_id.toString()}">${item.tag_title}</option>`;
                       

                        // console.log("Funnel Title: " + item.funnel_title);
                        // console.log("Funnel ID: " + item.funnel_id);
                        // console.log("Brand ID: " + item.brand_id);



                    }


                    $('.pros_load_tag_preview').html(prosloadcontentenoptions);

                  
                    
                } else {

                    // Request failed, handle error
                        // alert("Error: " + this.status);

                        console.log("Error: " + this.status);
                    }
                }
            };

            // // Send the request with the JSON data as the body
          request.send(jsonData);






}




$('body').on('click', '.pros_load_campaig_btn', function(){

    var  funnel_id = $('.pros_load_funnel_preview option:selected').val();

    if(funnel_id == 'NULL')
    {

            $.wnoty({
                type: 'warning',
                message: 'Select funnel to load campaign',
                autohideDelay: 7000
            });

    }else
    {

        var verificationstate = 'prosloadcampaignview';
        prosauthorizationfunction(verificationstate);

    }
    
});





function prosloadcampaignhistorcont(token)
{




    var  funnel_id = $('.pros_load_funnel_preview option:selected').val();
    var  tag_id = $('.pros_load_tag_preview option:selected').val();
    var brand_id = $('.abba-change-brand').val();
     



    var data = {
        "brand_id": brand_id,
        "token": token,
        "funnel_id":funnel_id,
        "tag_id":tag_id
    };





    // Convert the data object to JSON string
    var jsonData = JSON.stringify(data);
    // Create a new XMLHttpRequest
    var request = new XMLHttpRequest();


    // $('#pros_proceed_to_delete_contact_btn').html('<i class="fa fa-solid fa-spinner fa-spin" style="font-size:15px;"></i>');
    // $('#pros_proceed_to_delete_contact_btn').prop('disabled', true);

         // Set up the request
        request.open('POST', 'https://sendova.co/api/load-campaign-content/');
        request.setRequestHeader('Content-Type', 'application/json');


            // Define the callback function to handle the response
        request.onreadystatechange = function () {

    
            if (this.readyState === XMLHttpRequest.DONE) {

                var prosloadcampaigncontent = '';


                // $('#pros_proceed_to_delete_contact_btn').prop('disabled', false);
                // $('#pros_proceed_to_delete_contact_btn').html(' <i class="fa fa-solid fa-trash" aria-hidden="true"> Delete</i>');
                // $('#DeleteContactModalcont').modal('hide');


                if (this.status === 200) {

                   var abc = this.responseText;
                   var response = JSON.parse(this.responseText);
                    

                    var status = response["responseMessage"];
                    var request = response["requestSuccessful"];
                    var des = response["responseDescription"];

                    var funnelcontent = response["responseBody"];

                  

                    if(status == 'success')
                    {


                        for (var i = 0; i < funnelcontent.length; i++) {


                            var item = funnelcontent[i];


                            // 'campaign_id' => $CampaignID,
                            // 'funnel_id' => $FunnelID,
                            // 'funnel_id'=> $TagID,
                            // 'message_type'=> $MessageType


                            prosloadcampaigncontent+=`<div class="col-sm-3 col-md-6 col-lg-3 carditems card_search_get">
                                    <div class="topSecCards" style="width: 100%;">
                                        
                                        <div align="center" style="padding-top:10px;">

                                            <img width="50" height="50" src="https://img.icons8.com/ios/50/chat-message--v1.png" alt="chat-message--v1"/>
                                            <br>
                                            
                                            <h6 class="class_name" style="font-weight: 600; margin-top: 5px;font-size:14px;">${item.tag_title}</h6>
                                            <p style="font-weight: 500; color: #b8b8b8;">Campaign Title: ${item.message_type}'</p>
                                        </div>

                                        <div style="padding: 7px;">
                                            <div style="width: 100%; border-radius: 5px; background-color: #e8ebf1;">
                                                
                                                <div style="padding: 5px;" align="center">
                                                    <span class="abba_tooltip">

                                                    <span type="button" class="btn btn-sm text-white prosloacampaignconbtn  rounded-3 btn-primary " data-bs-toggle="modal" data-bs-target="#prosloadviewcapaignmessage" data-camp="${item.campaign_id}"style="font-size:11px;">
                                                        <i class="fa fa-eye text-light" style="cursor:pointer;font-size:17px;" ></i>
                                                        <span class="abba_tooltiptext">View Messages</span>
                                                    </span>
                                                    </span>

                                                    &nbsp;&nbsp;&nbsp;

                                                    <span class="abba_tooltip">
                                                    <span type="button" class="btn btn-sm text-white prosloaddeletecamapaignid   rounded-3 btn-danger " data-bs-toggle="modal" data-bs-target="#prosdeletecamapaignmodal" data-camp="${item.campaign_id} style="font-size:11px;"><i class="fa fa-trash"></i></span>
                                                    </span>

                                                </div>
                                            </div>
                                        </div>
                                </div>`;


                               

                           
                            // prosloadcontentenoptions+=`<option value="${item.tag_id.toString()}">${item.tag_title}</option>`;
                           

                            // console.log("Funnel Title: " + item.funnel_title);
                            // console.log("Funnel ID: " + item.funnel_id);
                            // console.log("Brand ID: " + item.brand_id);



                        }


                    }else

                    {

                        prosloadcampaigncontent+=` <center>
                        <img width="48" height="48" src="https://img.icons8.com/external-topaz-kerismaker/48/external-Not-Found-empty-state-topaz-kerismaker.png" alt="external-Not-Found-empty-state-topaz-kerismaker">
                        <p>Campaign not found</p>
                            </center>`;

                    }


                  

                    $('.prosload_campaign_history').html(prosloadcampaigncontent);

                  
                    
                } else {

                    // Request failed, handle error
                        // alert("Error: " + this.status);

                        console.log("Error: " + this.status);
                    }
                }
            };

            // // Send the request with the JSON data as the body
          request.send(jsonData);

  
}



$('body').on('click', '.prosloaddeletecamapaignid', function(){


        var  campaign_id = $(this).data('camp');

        $('.prosloadgetcampaignidfordeletecampaign').val(campaign_id);
        
});


$('body').on('click', '#pros_proceed_to_delete_campaign_btn', function(){

        $('#pros_proceed_to_delete_campaign_btn').html('<center><i class="fa fa-spinner fa-spin fs-3 text-light"></i></center>');

        var verificationstate = 'prosdelcampiagn';
        prosauthorizationfunction(verificationstate);
    
    
});


function prosdeletecampaignfunct(token)
{

    var campaign_id = $('.prosloadgetcampaignidfordeletecampaign').val();
    var brand_id = $('.abba-change-brand').val();
     



    var data = {
        "brand_id": brand_id,
        "token": token,
        "campaign_id":campaign_id
        
    };





    // Convert the data object to JSON string
    var jsonData = JSON.stringify(data);
    // Create a new XMLHttpRequest
    var request = new XMLHttpRequest();


    
          $('#pros_proceed_to_delete_campaign_btn').prop('disabled', true);

         // Set up the request
        request.open('POST', 'https://sendova.co/api/delete-campaign/');
        request.setRequestHeader('Content-Type', 'application/json');


            // Define the callback function to handle the response
        request.onreadystatechange = function () {

    
            if (this.readyState === XMLHttpRequest.DONE) {


                $('#pros_proceed_to_delete_campaign_btn').prop('disabled', false);
                $('#pros_proceed_to_delete_campaign_btn').html(`<i class="fa fa-solid fa-trash" aria-hidden="true"> Delete</i>`);

                 $('#prosdeletecamapaignmodal').modal('hide');



                if (this.status === 200) {

                   var abc = this.responseText;
                   var response = JSON.parse(this.responseText);
                    

                    var status = response["responseMessage"];
                    var request = response["requestSuccessful"];
                    var des = response["responseDescription"];

                    // var funnelcontent = response["responseBody"];

                  

                    if(status == 'success')
                    {

                                $.wnoty({
                                    type: 'success',
                                    message: des,
                                    autohideDelay: 5000
                                });


                                var verificationstate = 'prosloadcampaignview';
                                prosauthorizationfunction(verificationstate);

                    }else
                    {
                            $.wnoty({
                                type: 'warning',
                                message: des,
                                autohideDelay: 5000
                            });

                    }

                    
                } else {

                    // Request failed, handle error
                        // alert("Error: " + this.status);

                        console.log("Error: " + this.status);
                    }
                }
            };

            // // Send the request with the JSON data as the body
          request.send(jsonData);




}








$('body').on('click', '.prosloacampaignconbtn', function(){

        var  campaign_id = $(this).data('camp');

        // alert(campaign_id);

        $('.prosloadgetcampaignidforview').val(campaign_id);

        var verificationstate = 'prosloadcampaignedit';
        prosauthorizationfunction(verificationstate);

        $('.prosloadcampaignstepforwa-edit').val(0);

        $('.prosloadviewcontent_here_full').fadeOut();
       $('.prosmodalfootercontentforedit_campaign').fadeOut();

       

});



// load campaign function content

function loadcampaigncontentfunction(token)
{



    
            
        

           var campaign_id = $('.prosloadgetcampaignidforview').val();
           var brand_id = $('.abba-change-brand').val();


            var data = {
                "brand_id": brand_id,
                "token": token,
                "campaign_id":campaign_id
            };


            // Convert the data object to JSON string
            var jsonData = JSON.stringify(data);
            // Create a new XMLHttpRequest
            var request = new XMLHttpRequest();


            // $('#pros_proceed_to_delete_contact_btn').html('<i class="fa fa-solid fa-spinner fa-spin" style="font-size:15px;"></i>');
            // $('#pros_proceed_to_delete_contact_btn').prop('disabled', true);

                // Set up the request
                request.open('POST', 'https://sendova.co/api/load-campaign-content-view/');
                request.setRequestHeader('Content-Type', 'application/json');


                    // Define the callback function to handle the response
                request.onreadystatechange = function () {


                    if (this.readyState === XMLHttpRequest.DONE) {

                        var prosloadcampaigncontentwa = '';

                        var prosloadcampaigncontentemail = '';
                        
                        var prosloadcampaigncontentsms = '';


                        var prosloadwainput = $('.prosloadcampaignstepforwa-edit').val();
                         var prosloadsmsinput = $('.prosloadcampaignstepforsms-edit').val();
                          var prosloademailinput = $('.prosloadcampaignstepforemail-edit').val();
                        
                        
                        


                        // $('#pros_proceed_to_delete_contact_btn').prop('disabled', false);
                        // $('#pros_proceed_to_delete_contact_btn').html(' <i class="fa fa-solid fa-trash" aria-hidden="true"> Delete</i>');
                        // $('#DeleteContactModalcont').modal('hide');


                        if (this.status === 200) {

                        var abc = this.responseText;
                        var response = JSON.parse(this.responseText);
                            

                            var status = response["responseMessage"];
                            var request = response["requestSuccessful"];
                            var des = response["responseDescription"];

                            var funnelcontent = response["responseBody"];

                        

                            if(status == 'success')
                            {



                                $('.prosloadviewcontent_here_full').fadeIn();
                                $('.prosloadcamapiagncontentforview').html('');

                                $('.prosmodalfootercontentforedit_campaign').fadeIn();


                                

                                    var getcounfirst =  funnelcontent[0];

                                    $('.prosgetcampaignid_foredit').val(getcounfirst.campaign_id);

                                    
                   
                                


                                for (var i = 0; i < funnelcontent.length; i++) {


                                    var item = funnelcontent[i];
                                    
                                    

                                      

                                    // 'campaign_id'=>'NULL',
                                    // 'msg_id'=>'NULL'
                                   

                                    if(item.msg_type == 'whatsapp')
                                    {




                                           prosloadwainput++;
                                                                    

                                            prosloadcampaigncontentwa+=`<br><br><div class="card shadow">
                                            <div class="card-body">
                                                <h5 class="card-title prosloadupdatednumberformsgnumberwa-edit">Message(${prosloadwainput})</h5><div class="mt-5">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Message Subject</label>
                                                    <input type="text" data-file="${item.msg_file}"  data-id="${item.msg_id}" class="form-control msg_subjectcampiagn1-edit" value="${item.msg_title}"  placeholder="Message Subject">
                                                </div>
                                            </div>

                                            <div class="mt-5">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Select message interval(no hours) </label>
                                                    <input type="number"  value="${ item.msg_interval}"  class="form-control msg_durationcampaign1-edit">
                                                </div>
                                            </div>
                                           


                                            <div class="mt-5">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">File(Image, Video) </label>
                                                    <input type="file"  class="form-control prosloadfilecampaign1-edit" accept="image/*,video/*">
                                                </div>
                                            </div>
                                            <div class="mt-5">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlTextarea1" class="form-label">Message Body</label>
                                                    <textarea class="form-control msg_bodycampaign1-edit" rows="6" placeholder="Message Body">${ item.msg_body}</textarea>
                                                </div>
                                            </div>    </div>
                                            </div>`;


                

                                    }else if(item.msg_type == 'email')
                                    {

                                            prosloademailinput++;

                                                prosloadcampaigncontentemail+=`<div class="card shadow">
                                                <div class="card-body">
                                                    <h5 class="card-title"> Message</h5><div class="mt-5">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Message Subject</label>
                                                    <input type="text" data-file="${item.msg_file}"  data-id="${item.msg_id}"  class="form-control msg_subjectcampiagnemail1-edit" value="${item.msg_title}"   placeholder="Message Subject">
                                                </div>
                                            </div>
                    
                                            <div class="mt-5">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1"   class="form-label">Input message interval(hourly) </label>
                                                    <input type="number" value="${item.msg_interval}" class="form-control msg_durationcampaignemail1-edit">
                                                </div>
                                            </div>
                    
                                            <div class="mt-5">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">File(Image, Video) </label>
                                                    <input type="file"  class="form-control prosloadfilecampaignemail1-edit" accept="image/*,video/*">
                                                </div>
                                            </div>
                    
                                            <div class="mt-5">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlTextarea1" class="form-label">Message Body</label>
                                                    <textarea class="form-control msg_bodycampaignemail1-edit" rows="6" placeholder="Message Body">${item.msg_body}</textarea>
                                                </div>
                                            </div>  </div>
                                            </div>
                                            `;

                                    }else if(item.msg_type == 'sms')
                                    {
                                       
                                       
                                       
                                       prosloadsmsinput++;
                                       
                                                prosloadcampaigncontentsms+=`<div class="card shadow">
                                                        <div class="card-body">
                                                            <h5 class="card-title"> Message(${prosloadsmsinput})</h5><div class="mt-5">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1" class="form-label">Message Subject</label>
                                                            <input type="text" data-file="${item.msg_file}"  data-id="${item.msg_id}"  class="form-control msg_subjectcampiagnsms1-edit" value="${item.msg_title}"   placeholder="Message Subject">
                                                        </div>
                                                    </div>
                            
                                                    <div class="mt-5">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1"  class="form-label">Input message interval(hourly) </label>
                                                            <input type="number"  value="${item.msg_interval}" class="form-control msg_durationcampaignsms1-edit">
                                                        </div>
                                                    </div>
                            
                                                   
                            
                                                    <div class="mt-5">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlTextarea1" class="form-label">Message Body</label>
                                                            <textarea class="form-control msg_bodycampaignsms1-edit" rows="6" placeholder="Message Body">${item.msg_body}</textarea>
                                                        </div>
                                                    </div>  </div>
                                                    </div>
                                                    `; 
                                        
                                        
                                        
                                        
                                    }

                                   

                                }
                            

                            }else

                            {



                                prosloadcampaigncontentwa+=` <center>
                                    <img width="48" height="48" src="https://img.icons8.com/external-topaz-kerismaker/48/external-Not-Found-empty-state-topaz-kerismaker.png" alt="external-Not-Found-empty-state-topaz-kerismaker">
                                    <p>WhatsApp message not found</p>
                                </center>`;

                                $('.prosloadviewcontent_here_full').fadeOut();
                              

                                $('.prosmodalfootercontentforedit_campaign').fadeOut();



                            }



                                // alert(prosloadcampaigncontentsms);

                                $('.prosloadwhatcampaignmsgingcontent').html(prosloadcampaigncontentwa);
                                $('.prosloademailcampaignmsgingcontent').html(prosloadcampaigncontentemail);
                                
                                $('.prosloadsmscampaignmsgingcontent').html(prosloadcampaigncontentsms);
                                
                                $('.prosloadcampaignstepforwa-edit').val(prosloadwainput);
                                
                                $('.prosloadcampaignstepforsms-edit').val(prosloadsmsinput);
                                $('.prosloadcampaignstepforemail-edit').val(prosloademailinput);
                                
                                
                        } else {

                            // Request failed, handle error
                                // alert("Error: " + this.status);

                                console.log("Error: " + this.status);
                            }
                        }
                    };

                    // // Send the request with the JSON data as the body
                request.send(jsonData);



        
}




// pros add new wa msg content for edit
$('body').on('click', '.prosappendnewcampaignmsgbtn-edit', function(){


    var prosloadsteps = $('.prosloadcampaignstepforwa-edit').val();
    prosloadsteps++;

     var prosloadappendcontent = `<div class="prosloadwacontenthere-edit${prosloadsteps}"><br> <div class="card shadow">
          
      <div class="card-body ">
         <a class="fa fa-times float-end text-danger prosgeneralremovewageneral-edit" data-id="${prosloadsteps}" style="font-size:18px;text-decoration:none;cursor:pointer;"></a>
          <h5 class="card-title prosloadupdatednumberformsgnumberwa-edit">Message (${prosloadsteps})</h5>

          <div class="mt-5">
              <div class="mb-3">
                  <label for="exampleFormControlInput1-edit" class="form-label">Message Subject</label>
                  <input type="text" data-file=""   data-id="" class="form-control msg_subjectcampiagn1-edit"  placeholder="Message Subject">
              </div>
          </div>


         
          <div class="mt-5">
              <div class="mb-3">

                  <label for="exampleFormControlInput1" class="form-label">Select message interval(no hours) </label>
                  <input type="number" class="form-control msg_durationcampaign1-edit">

              </div>
          </div>


         

          <div class="mt-5">
              <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">File(Image, Video) </label>
                  <input type="file"  class="form-control prosloadfilecampaign1-edit" accept="image/*,video/*">
              </div>
          </div>


          <div class="mt-5">
              <div class="mb-3">

                  <label for="exampleFormControlTextarea1" class="form-label">Message Body</label>
                  <textarea class="form-control msg_bodycampaign1-edit" rows="6" placeholder="Message Body"></textarea>
              </div>
          </div>
        
      </div>
  </div></div>`;


   $('.prosloadcampaignstepforwa-edit').val(prosloadsteps);
  $('.prosloadappendcampaigncontent-edit').append(prosloadappendcontent);

});
// pros add new wa msg content for edit






// PROS REMOVE WHATSAPP MSG CONTENT HERE FOR EDIT
$('body').on('click', '.prosgeneralremovewageneral-edit', function(){

    // alert('hello');
          
    var messagestageid = $(this).data('id');


    $('.prosloadwacontenthere-edit'+messagestageid).remove();

     var countnum_edit = 0;

    $('.prosloadupdatednumberformsgnumberwa-edit').each(function() {


        countnum_edit++;

        $(this).html('Message(' + countnum_edit +')');
       
    });

   

  
    $('.prosloadcampaignstepforwa-edit').val(countnum_edit);
});
// PROS REMOVE WHATSAPP MSG CONTENT HERE FOR EDIT






//pros addd campaign content here for whatsApp messaging edit
$('body').on('click', '.prosappendnewcampaignmsgemailbtn-edit', function(){


        var prosloadsteps = $('.prosloadcampaignstepforemail-edit').val();
        prosloadsteps++;

        var prosloadappendcontent = `<div class="prosloademailcontenthere-edit${prosloadsteps}"><br><div class="card shadow">
        <div class="card-body">
            <a class="fa fa-times float-end text-danger prosgeneralremoveemailgeneral-edit" data-id="${prosloadsteps}" style="font-size:18px;text-decoration:none;cursor:pointer;"></a>
            <h5 class="card-title prosloadupdatednumberformsgnumberemail-edit">Message (${prosloadsteps})</h5>

            <div class="mt-5">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Message Subject</label>
                    <input type="text" data-file=""  data-id="" class="form-control msg_subjectcampiagnemail1-edit"  placeholder="Message Subject">
                </div>
            </div>

          

            <div class="mt-5">
                <div class="mb-3">

                    <label for="exampleFormControlInput1" class="form-label">Input time message should be sent(no hours) </label>
                    <input type="number" class="form-control msg_durationcampaignemail1-edit">

                </div>
            </div>

         


            <div class="mt-5">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">File(Image, Video) </label>
                    <input type="file"  class="form-control prosloadfilecampaignemail1-edit" accept="image/*,video/*">
                </div>
            </div>


            <div class="mt-5">
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Message Body</label>
                    <textarea class="form-control msg_bodycampaignemail1-edit" rows="6" placeholder="Message Body"></textarea>
                </div>
            </div>
            
        </div>
    </div></div>`;


$('.prosloadcampaignstepforemail-edit').val(prosloadsteps);
$('.prosloadappendcampaigncontentemail-edit').append(prosloadappendcontent);

$('.msg_bodycampaignemail1-edit').summernote();



});

//pros addd campaign content here for whatsApp messaging edit












// pros addd campaign content here for whatsApp messaging edit
$('body').on('click', '.prosappendnewcampaignmsgsmsbtn-edit', function(){


        var prosloadsteps = $('.prosloadcampaignstepforsms-edit').val();
        prosloadsteps++;

        var prosloadappendcontent = `<div class="prosloadsmscontenthere-edit${prosloadsteps}"><br><div class="card shadow">
        <div class="card-body">
            <a class="fa fa-times float-end text-danger prosgeneralremovesmsgeneral-edit" data-id="${prosloadsteps}" style="font-size:18px;text-decoration:none;cursor:pointer;"></a>
            <h5 class="card-title prosloadupdatednumberformsgnumbersms-edit">Message (${prosloadsteps})</h5>

            <div class="mt-5">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Message Subject</label>
                    <input type="text" data-file=""  data-id="" class="form-control msg_subjectcampiagnsms1-edit"  placeholder="Message Subject">
                </div>
            </div>

          

            <div class="mt-5">
                <div class="mb-3">

                    <label for="exampleFormControlInput1" class="form-label">Input time message should be sent(hourly) </label>
                    <input type="number" class="form-control msg_durationcampaignsms1-edit">

                </div>
            </div>

         




            <div class="mt-5">
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Message Body</label>
                    <textarea class="form-control msg_bodycampaignsms1-edit" rows="6" placeholder="Message Body"></textarea>
                </div>
            </div>
            
        </div>
    </div></div>`;


$('.prosloadcampaignstepforsms-edit').val(prosloadsteps);
$('.prosloadappendcampaigncontentsms-edit').append(prosloadappendcontent);

// $('.msg_bodycampaignemail1-edit').summernote();



});

//pros addd campaign content FOR SMS





// PROS REMOVE EMAIL MSG CONTENT HERE EDIT
$('body').on('click', '.prosgeneralremoveemailgeneral-edit', function(){
          
var messagestageid_edit = $(this).data('id');

//   alert(messagestageid_edit);

$('.prosloademailcontenthere-edit'+messagestageid_edit).remove();

     var countnumemail_edit = 1;
    $('.prosloadupdatednumberformsgnumberemail-edit').each(function() {
        countnumemail_edit++;
        $(this).html('Message(' + countnumemail_edit +')');
    });
    

$('.prosloadcampaignstepforemail-edit').val(countnumemail_edit);

});
// PROS REMOVE EMAIL MSG CONTENT HERE EDIT






// PROS REMOVE SMS MSG CONTENT HERE EDIT
$('body').on('click', '.prosgeneralremovesmsgeneral-edit', function(){
          
var messagestageid_edit_sms = $(this).data('id');

//   alert(messagestageid_edit);

$('.prosloadsmscontenthere-edit'+messagestageid_edit_sms).remove();

     var countnumemail_edit_sms = 1;
    $('.prosloadupdatednumberformsgnumbersms-edit').each(function() {
        countnumemail_edit_sms++;
        $(this).html('Message(' + countnumemail_edit_sms +')');
    });
    

$('.prosloadcampaignstepforsms-edit').val(countnumemail_edit_sms);

});
// PROS REMOVE EMAIL SMS CONTENT HERE EDIT





// CAMPIAGN EDIT BTN CLICK

$('body').on('click', '.pros_submitcampaig_editbtn', function(){

var checkemailorwa = $('.prosgeneralcampiagncheckbtn-edit.active').data('id');

// alert(checkemailorwa);

if(checkemailorwa == 'wa')
{

     


        var countempybody = 0;
          
        var bodymsgedit = [];

        $('.msg_bodycampaign1-edit').each(function() {

           var prosgetvaluecontent =  $(this).val();

           if(prosgetvaluecontent == '')
           {


            


              $(this).css('border', '2px solid red');

               countempybody++;
           }else
           {
                  $(this).css('border', '2px solid green');
           }

            bodymsgedit.push($(this).val());
        });



        var countempybody_duration  = 0;
        var durationmsgedit = [];

        $('.msg_durationcampaign1-edit').each(function() {

            var prosgetvaluecontent_duration  =  $(this).val();

            if(prosgetvaluecontent_duration == '')
            {
                countempybody_duration++;

                $(this).css('border', '2px solid red');
            }else
            {
                $(this).css('border', '2px solid green');
            }

            durationmsgedit.push($(this).val());
         });



            if(countempybody > 0)
            {





                    $.wnoty({
                        type: 'warning',
                        message: 'Hey, make sure no message body is left empty',
                        autohideDelay: 5000
                    });


            }else if(countempybody_duration > 0)
            {




                        $.wnoty({
                            type: 'warning',
                            message: 'Hey, make sure no message interval is left blank',
                            autohideDelay: 5000
                        });





            }else
            {

                       var verificationstate = 'schedulewaedit';
                       prosauthorizationfunction(verificationstate);
            }

        

}else if(checkemailorwa == 'mail')
{

        

      var prosgetdurationemail=  $('.msg_durationcampaignemail1-edit').val();



      if(prosgetdurationemail == '')
      {


                $.wnoty({
                    type: 'warning',
                    message: 'Hey, make sure no mail message interval is left blank',
                    autohideDelay: 5000
                });



      }else
      {



                    var countempybody_email = 0;
                    
                    var bodymsgedit_email = [];

                    $('.msg_bodycampaignemail1-edit').each(function() {

                    var prosgetvaluecontent_email =  $(this).val();

                    if(prosgetvaluecontent_email == '')
                    {


                        


                        $(this).css('border', '2px solid red');

                        countempybody_email++;
                    }else
                    {
                            $(this).css('border', '2px solid green');
                    }


                            

                        bodymsgedit_email.push($(this).val());
                    });


                    // alert(bodymsgedit_email);



                    var countempybody_duration_email  = 0;
                    var durationmsgedit_email   = [];

                    $('.msg_durationcampaignemail1-edit').each(function() {

                        var prosgetvaluecontent_duration_email  =  $(this).val();
    
                        if(prosgetvaluecontent_duration_email == '')
                        {
                            countempybody_duration_email++;

                            $(this).css('border', '2px solid red');
                        }else
                        {
                            $(this).css('border', '2px solid green');
                        }
    
                        durationmsgedit_email.push($(this).val());
                    });





                    //VALIDATE MAIL MSG BEFORE SENDING REQUEST 


                    if(countempybody_email > 0)
                    {





                            $.wnoty({
                                type: 'warning',
                                message: 'Hey, make sure no message body is left empty',
                                autohideDelay: 5000
                            });


                    }else if(countempybody_duration_email > 0)
                    {




                                $.wnoty({
                                    type: 'warning',
                                    message: 'Hey, make sure no message interval is left blank',
                                    autohideDelay: 5000
                                });



                    }else
                    {




                                var verificationstate = 'schedulemailedit';
                                prosauthorizationfunction(verificationstate);

                           




                               
                    }

                    //VALIDATE MAIL MSG BEFORE SENDING REQUEST 




      }


      
    
}else if(checkemailorwa == 'sms') 
{
    
    
    
                 var countempybody_sms = 0;
                    
                    var bodymsgedit_sms = [];

                    $('.msg_bodycampaignsms1-edit').each(function() {

                    var prosgetvaluecontent_sms =  $(this).val();

                    if(prosgetvaluecontent_sms == '')
                    {


                        


                        $(this).css('border', '2px solid red');

                        countempybody_sms++;
                    }else
                    {
                            $(this).css('border', '2px solid green');
                    }


                            

                        bodymsgedit_sms.push($(this).val());
                    });


                    // alert(bodymsgedit_email);



                    var countempybody_duration_sms  = 0;
                    var durationmsgedit_sms   = [];

                    $('.msg_durationcampaignsms1-edit').each(function() {

                        var prosgetvaluecontent_duration_sms  =  $(this).val();
    
                        if(prosgetvaluecontent_duration_sms == '')
                        {
                            countempybody_duration_sms++;

                            $(this).css('border', '2px solid red');
                        }else
                        {
                            $(this).css('border', '2px solid green');
                        }
    
                        durationmsgedit_sms.push($(this).val());
                    });





                    //VALIDATE MAIL MSG BEFORE SENDING REQUEST 


                    if(countempybody_sms > 0)
                    {





                            $.wnoty({
                                type: 'warning',
                                message: 'Hey, make sure no message body is left empty',
                                autohideDelay: 5000
                            });


                    }else if(countempybody_duration_sms > 0)
                    {




                                $.wnoty({
                                    type: 'warning',
                                    message: 'Hey, make sure no message interval is left blank',
                                    autohideDelay: 5000
                                });



                    }else
                    {




                                var verificationstate = 'schedulsmsedit';
                                prosauthorizationfunction(verificationstate);

                           




                               
                    }

    
}

});


// CAMPIAGN EDIT BTN CLICK




// CAMPIAGN EDIT WA FUNCTION
function proseditcampaignfuncs(token)
{


  var brand_id = $('.abba-change-brand').val();
  var campaign_id = $('.prosgetcampaignid_foredit').val();

  

    var body_msg = [];
    $('.msg_bodycampaign1-edit').each(function() {
        body_msg.push($(this).val());
    });


    var interval_duration = [];
    
    $('.msg_durationcampaign1-edit').each(function() {
        interval_duration.push($(this).val());
    });


   

    var msg_subject = [];
    var message_id = [];
  
    
    $('.msg_subjectcampiagn1-edit').each(function() {
        msg_subject.push($(this).val());
        message_id.push($(this).data('id'));
    });


    var pros_set_file = [];
      
  $('.prosloadfilecampaign1-edit').each(function() {
        var fileInput = $(this)[0]; // Access the DOM element from the jQuery object
        var files = fileInput.files; // Access the files property
    
        // Loop through each file in the file input
        for (var i = 0; i < files.length; i++) {

            var file = files[i];

            pros_set_file.push(file);
    
            var allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'video/mp4', 'video/quicktime'];
            
            // Check if the file type is allowed
            if (allowedTypes.includes(file.type)) {
                // File type is allowed, proceed with further actions if needed
            } else {
                // File type is not allowed, handle the error or skip the file
            }
        }
     });





    //  brand_id    



     var interval_duration = interval_duration.join('###,');
     var msg_body = body_msg.join('###,');
     var msg_subject = msg_subject.join('###,');

    

     var formData = new FormData();
     formData.append('duration_interval', interval_duration);
     formData.append('token', token);
     formData.append('msg_subject', msg_subject);
     formData.append('msg_body', msg_body);

     // formData.append('filaname', file);

     formData.append('brand_id', brand_id);
     formData.append('message_id', message_id);
     formData.append('campaign_id', campaign_id);






     // Append each file individually
     for (var i = 0; i < pros_set_file.length; i++) {
         formData.append('file[]', pros_set_file[i]); // Append each file as an array
     }


         //   console.log(formData);

         $('.pros_submitcampaig_editbtn').prop('disabled', true);
         $('.pros_submitcampaig_editbtn').html('<i class="fa fa-solid fa-spinner fa-spin" style="font-size:15px;"></i>');


         $.ajax({
             url: 'https://sendova.co/api/edit-campaign-wa/',
             type: 'POST',
             data: formData,
             contentType: false,
             processData: false,
             success: function(response) {

                 // alert(response);

                 $('.pros_submitcampaig_editbtn').prop('disabled', false);
                 $('.pros_submitcampaig_editbtn').html('<i class="fa-envelope-open-text"> </i> Update');

                


                 var response = JSON.parse(response);
                         

                 var status = response["responseMessage"];
                 var request = response["requestSuccessful"];
                 var des = response["responseDescription"];

                 var funnelcontent = response["responseBody"];

                 


                 // console.log(funnelcontent);


                 if(status.trim() == 'success')
                 {


                         $.wnoty({
                             type: 'success',
                             message: des,
                             autohideDelay: 7000
                         });


                 }else
                 {

                     $.wnoty({
                         type: 'warning',
                         message: des,
                         autohideDelay: 7000
                     });

                 }
                 // Handle success response
             },
             error: function(xhr, status, error) {
                 // alert('hello');
                 console.log(error);
                 // Handle error
             }
         });

    
}
// CAMPIAGN EDIT WA FUNCTION




// CAMPIAGN EDIT MAIL FUNCTION
function proseditcampaignemailfunc(token)
{


  var brand_id = $('.abba-change-brand').val();
  var campaign_id = $('.prosgetcampaignid_foredit').val();

    var body_msg = [];
    $('.msg_bodycampaignemail1-edit').each(function() {
        body_msg.push($(this).summernote('code'));
    });


    var interval_duration = [];
    
    $('.msg_durationcampaignemail1-edit').each(function() {
        interval_duration.push($(this).val());
    });

    var msg_subject = [];
    var message_id = [];
  
    
    $('.msg_subjectcampiagnemail1-edit').each(function() {
        msg_subject.push($(this).val());
        message_id.push($(this).data('id'));
    });


    var pros_set_file = [];
      
  $('.prosloadfilecampaignemail1-edit').each(function() {
        var fileInput = $(this)[0]; // Access the DOM element from the jQuery object
        var files = fileInput.files; // Access the files property
    
        // Loop through each file in the file input
        for (var i = 0; i < files.length; i++) {

            var file = files[i];

            pros_set_file.push(file);
    
            var allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'video/mp4', 'video/quicktime'];
            
            // Check if the file type is allowed
            if (allowedTypes.includes(file.type)) {
                // File type is allowed, proceed with further actions if needed
            } else {
                // File type is not allowed, handle the error or skip the file
            }
        }
     });




     var interval_duration = interval_duration.join('###,');
     var msg_body = body_msg.join('###,');
     var msg_subject = msg_subject.join('###,');

    

     var formData = new FormData();
     formData.append('duration_interval', interval_duration);
     formData.append('token', token);
     formData.append('msg_subject', msg_subject);
     formData.append('msg_body', msg_body);

     formData.append('brand_id', brand_id);
     formData.append('message_id', message_id);
     formData.append('campaign_id', campaign_id);




     // Append each file individually
     for (var i = 0; i < pros_set_file.length; i++) {

              formData.append('file[]', pros_set_file[i]); // Append each file as an 
     }


         //   console.log(formData);

         $('.pros_submitcampaig_editbtn').prop('disabled', true);
         $('.pros_submitcampaig_editbtn').html('<i class="fa fa-solid fa-spinner fa-spin" style="font-size:15px;"></i>');


         $.ajax({
             url: 'https://sendova.co/api/edit-campaign-email/',
             type: 'POST',
             data: formData,
             contentType: false,
             processData: false,
             success: function(response) {

                //  alert(response);

                 $('.pros_submitcampaig_editbtn').prop('disabled', false);
                 $('.pros_submitcampaig_editbtn').html('<i class="fa-envelope-open-text"> </i> Update');
                
                 var response = JSON.parse(response);
                         

                 var status = response["responseMessage"];
                 var request = response["requestSuccessful"];
                 var des = response["responseDescription"];

                 var funnelcontent = response["responseBody"];

                 


                 // console.log(funnelcontent);


                 if(status.trim() == 'success')
                 {


                         $.wnoty({
                             type: 'success',
                             message: des,
                             autohideDelay: 7000
                         });


                 }else
                 {

                     $.wnoty({
                         type: 'warning',
                         message: des,
                         autohideDelay: 7000
                     });

                 }
                 // Handle success response
             },
             error: function(xhr, status, error) {
                 console.log(error);
                 // Handle error
             }
         });



}
// CAMPIAGN EDIT MAIL FUNCTION





// CAMPIAGN EDIT MAIL FUNCTION
function proseditcampaignsmsfunc(token)
{


  var brand_id = $('.abba-change-brand').val();
  var campaign_id = $('.prosgetcampaignid_foredit').val();

    var body_msg = [];
    $('.msg_bodycampaignsms1-edit').each(function() {
        body_msg.push($(this).val());
    });


    var interval_duration = [];
    
    $('.msg_durationcampaignsms1-edit').each(function() {
        interval_duration.push($(this).val());
    });

    var msg_subject = [];
    var message_id = [];
  
    
    $('.msg_subjectcampiagnsms1-edit').each(function() {
        msg_subject.push($(this).val());
        message_id.push($(this).data('id'));
    });


  



     var interval_duration = interval_duration.join('###,');
     var msg_body = body_msg.join('###,');
     var msg_subject = msg_subject.join('###,');

    

     var formData = new FormData();
     formData.append('duration_interval', interval_duration);
     formData.append('token', token);
     formData.append('msg_subject', msg_subject);
     formData.append('msg_body', msg_body);

     formData.append('brand_id', brand_id);
     formData.append('message_id', message_id);
     formData.append('campaign_id', campaign_id);





         //   console.log(formData);

         $('.pros_submitcampaig_editbtn').prop('disabled', true);
         $('.pros_submitcampaig_editbtn').html('<i class="fa fa-solid fa-spinner fa-spin" style="font-size:15px;"></i>');


         $.ajax({
             url: 'https://sendova.co/api/edit-campaign-sms/',
             type: 'POST',
             data: formData,
             contentType: false,
             processData: false,
             success: function(response) {

                //  alert(response);

                 $('.pros_submitcampaig_editbtn').prop('disabled', false);
                 $('.pros_submitcampaig_editbtn').html('<i class="fa-envelope-open-text"> </i> Update');
                
                 var response = JSON.parse(response);
                         

                 var status = response["responseMessage"];
                 var request = response["requestSuccessful"];
                 var des = response["responseDescription"];

                 var funnelcontent = response["responseBody"];

                 


                 // console.log(funnelcontent);


                 if(status.trim() == 'success')
                 {


                         $.wnoty({
                             type: 'success',
                             message: des,
                             autohideDelay: 7000
                         });


                 }else
                 {

                     $.wnoty({
                         type: 'warning',
                         message: des,
                         autohideDelay: 7000
                     });

                 }
                 // Handle success response
             },
             error: function(xhr, status, error) {
                 console.log(error);
                 // Handle error
             }
         });



}
// CAMPIAGN EDIT MAIL FUNCTION







//===================UP IN FORM FULL CONTENT HERE======================

// ADD TEXT INPUT CONTENT HERE 


$('body').on('click', '.prosad_text_input_field_btn', function(){


         var pros_track =   parseInt($('.pros_track_input_step_val').val());
        
       
         var prosnewcount =  pros_track + 1;


            var prosloadtext_input = `<div class="col-lg-6 prosgeinput_grid_content pros_loadcontenteachstep${prosnewcount}" data-id="${prosnewcount}">
                        
                       

                            <div class="row">
                                <div class="col-9">
                                </div>

                                <div class="col-3">
                                       

                                <div class="dropdown dropdown-sm float-end">

                                <span class="mt-1 " role="button" id="dropdownMenuLinkparent13435" data-bs-toggle="dropdown" aria-expanded="true" style="float: right;  margin-right: 7px;">
                                    <i class="bx bx-dots-horizontal-rounded" style="font-size: 22px;"></i>
                                </span>
                                
                                <ul class="dropdown-menu shadow abba-parent-dropdown " aria-labelledby="dropdownMenuLinkparent13435" style="background: rgb(247, 255, 247); border: none; position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(-160px, 0px, 0px);" data-popper-placement="bottom-start" >
                                        
                                    <li>
                                    <a  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-danger pros_generalremoveappendinput_optim"  data-id="${prosnewcount}" >  <i class="fa fa-times"></i>  Remove</a>
                                    </li>
                                    <li>
                                    <a  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-warning  prosadd_input_text_title_general  prosadd_input_text_title_single${prosnewcount}" data-bs-toggle="modal" data-bs-target="#prosloadtextModal"  data-id="${prosnewcount}" data-option="" data-check="">  <i class="fa fa-edit"></i>  Edit</a>
                        
                                    </li>
                                </ul>
                         </div>

                             
                                </div>

                            </div>
                            <div class="tags-input form-group abba_local-forms">
                                <label class="prosgeneral_label_input_text prosinputforlabelforeach${prosnewcount} progenral_label_all_field" data-id="text" data-step="${prosnewcount}"></label>
                                <input type="text" class="form-control prosinputgenera_for_text prosinputtext_append_val${prosnewcount}"  data-id="text" >
                            </div>
                        
            </div>`;

         
            

            $('.prosloadtextsectioncontent').fadeIn('slow');

            $('.prosloadtextinputcontent').append(prosloadtext_input);
            $('.pros_track_input_step_val').val(prosnewcount);





            $('.pros_track_input_step_val_title').val(prosnewcount);
            $('.pros_track_input_step_val_options').val('');
            $('.pros_track_input_step_val_checks').val('');
           
             $('.prosload_dropdown_full_content').fadeOut();
             $('.prosload_check_content_full_here').fadeOut();
             $('.prosload_title_step_for_some_button').fadeOut();
     
             $('#prosloadtextModal').modal('show');
             $('.predefined_yes_no_option').fadeIn();

              $('#setoptimModal').css('z-index', 1040);

              $('.prosload_button_stage_track').val('');
          
});





$('body').on('click', '.prosad_text_input_field_number_btn', function(){


    var pros_track =   parseInt($('.pros_track_input_step_val').val());
   
   

    var prosnewcount =  pros_track + 1;

   //   alert(prosnewcount);


       var prosloadtext_input = `  <div class="col-lg-6 prosgeinput_grid_content pros_loadcontenteachstep${prosnewcount}" data-id="${prosnewcount}">

                    
                    <div class="row">
                    <div class="col-9">
                    </div>

                    <div class="col-3">



                            <div class="dropdown dropdown-sm float-end">

                                    <span class="mt-1 " role="button" id="dropdownMenuLinkparent13435" data-bs-toggle="dropdown" aria-expanded="true" style="float: right;  margin-right: 7px;">
                                        <i class="bx bx-dots-horizontal-rounded" style="font-size: 22px;"></i>
                                    </span>
                                    
                                    <ul class="dropdown-menu shadow abba-parent-dropdown " aria-labelledby="dropdownMenuLinkparent13435" style="background: rgb(247, 255, 247); border: none; position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(-160px, 0px, 0px);" data-popper-placement="bottom-start" >
                                            
                                        <li>
                                        <a  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-danger pros_generalremoveappendinput_optim"  data-id="${prosnewcount}" >  <i class="fa fa-times"></i>  Remove</a>
                                        </li>
                                        <li>
                                        <a  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-warning  prosadd_input_text_title_general  prosadd_input_text_title_single${prosnewcount}" data-bs-toggle="modal" data-bs-target="#prosloadtextModal"  data-id="${prosnewcount}" data-option="" data-check="">  <i class="fa fa-edit"></i>  Edit</a>
                            
                                        </li>
                                    </ul>
                            </div>
                                            

                               
                    </div>

                </div>

           <div class="tags-input form-group abba_local-forms">
               <label class="prosgeneral_label_input_text_number prosinputforlabelforeach${prosnewcount} progenral_label_all_field" data-id="number" data-step="${prosnewcount}" ></label>
               <input type="number" class="form-control prosinputgenera_for_text prosinputtext_append_val${prosnewcount}" data-id="number"  >
           </div>
       </div>`;


       $('.prosloadtextinputcontent').append(prosloadtext_input);
       $('.pros_track_input_step_val').val(prosnewcount);

       

       
       

       $('.prosloadtextsectioncontent').fadeIn('slow');


       $('.pros_track_input_step_val_title').val(prosnewcount);
       $('.pros_track_input_step_val_options').val('');
       $('.pros_track_input_step_val_checks').val('');
      
        $('.prosload_dropdown_full_content').fadeOut();

        $('.predefined_yes_no_option').fadeIn();
        $('.prosload_check_content_full_here').fadeOut();
        $('.prosload_title_step_for_some_button').fadeOut();

        $('#prosloadtextModal').modal('show');

         $('#setoptimModal').css('z-index', 1040);

         $('.prosload_button_stage_track').val('');
       
     
});






$('body').on('click', '.prosad_text_input_field_long_btn', function(){


    var pros_track =   parseInt($('.pros_track_input_step_val').val());


    var prosnewcount =  pros_track + 1;

   //   alert(prosnewcount);  


var prosloadtext_input = `  <div class="col-lg-12 prosgeinput_grid_content_long pros_loadcontenteachstep${prosnewcount}" data-id="${prosnewcount}">

        
        <div class="row">
        <div class="col-10">
        </div>

        <div class="col-2">
               
                <div class="dropdown dropdown-sm float-end">

                    <span class="mt-1 " role="button" id="dropdownMenuLinkparent13435" data-bs-toggle="dropdown" aria-expanded="true" style="float: right;  margin-right: 7px;">
                        <i class="bx bx-dots-horizontal-rounded" style="font-size: 22px;"></i>
                    </span>
                    
                    <ul class="dropdown-menu shadow abba-parent-dropdown " aria-labelledby="dropdownMenuLinkparent13435" style="background: rgb(247, 255, 247); border: none; position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(-160px, 0px, 0px);" data-popper-placement="bottom-start" >
                            
                        <li>
                        <a  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-danger pros_generalremoveappendinput_optim"  data-id="${prosnewcount}">  <i class="fa fa-times"></i>  Remove</a>
                        </li>
                        <li>
                        <a  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-warning  prosadd_input_text_title_general  prosadd_input_text_title_single${prosnewcount}" data-bs-toggle="modal" data-bs-target="#prosloadtextModal"  data-id="${prosnewcount}" data-option="" data-check="">  <i class="fa fa-edit"></i>  Edit</a>
            
                        </li>
                    </ul>
             </div>

        </div>
        

    </div>

   <div class="tags-input form-group abba_local-forms">
       <label class="prosgeneral_label_input_text prosinputforlabelforeach${prosnewcount} progenral_label_all_field" data-id="textarea" data-step="${prosnewcount}"></label>
       <textarea class="form-control prosinputgenera_for_text prosinputtext_append_val${prosnewcount}" data-id="textarea"  id="floatingTextarea2" style="height: 100px"></textarea>
      
   </div>
</div>`;


$('.prosloadtextinputcontent').append(prosloadtext_input);
$('.pros_track_input_step_val').val(prosnewcount);


$('.prosloadtextsectioncontent').fadeIn('slow');








$('.pros_track_input_step_val_title').val(prosnewcount);
$('.pros_track_input_step_val_options').val('');
$('.pros_track_input_step_val_checks').val('');

$('.prosload_dropdown_full_content').fadeOut();
$('.predefined_yes_no_option').fadeIn();
$('.prosload_title_step_for_some_button').fadeOut();

$('.prosload_check_content_full_here').fadeOut();

$('#prosloadtextModal').modal('show');

 $('#setoptimModal').css('z-index', 1040);


 $('.prosload_button_stage_track').val('');


});




$('body').on('click', '.prosad_text_input_field_dropdown_btn', function(){


var pros_track =   parseInt($('.pros_track_input_step_val').val());


var prosnewcount =  pros_track + 1;

//   alert(prosnewcount);


var prosloadtext_input = ` <div class="col-lg-6 prosgeinput_grid_content_long pros_loadcontenteachstep${prosnewcount}" data-id="${prosnewcount}">

        <div class="row">
        <div class="col-10">
        </div>

        <div class="col-2">
                   


        <div class="dropdown dropdown-sm float-end">

        <span class="mt-1 " role="button" id="dropdownMenuLinkparent13435" data-bs-toggle="dropdown" aria-expanded="true" style="float: right;  margin-right: 7px;">
            <i class="bx bx-dots-horizontal-rounded" style="font-size: 22px;"></i>
        </span>
        
            <ul class="dropdown-menu shadow abba-parent-dropdown " aria-labelledby="dropdownMenuLinkparent13435" style="background: rgb(247, 255, 247); border: none; position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(-160px, 0px, 0px);" data-popper-placement="bottom-start" >
                
                    <li>
                    <a  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-danger pros_generalremoveappendinput_optim"  data-id="${prosnewcount}">  <i class="fa fa-times"></i>  Remove</a>
                    </li>
        
        
                    <li>
                            <a  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-warning  prosadd_input_text_title_general  prosadd_input_text_title_single${prosnewcount}" data-bs-toggle="modal" data-bs-target="#prosloadtextModal"  data-id="${prosnewcount}" data-option="option" data-check="">  <i class="fa fa-edit"></i>  Edit</a>
        
                    </li>
        
            </ul>
        
        </div>
        

               
        </div>

    </div>
   
   <div class="tags-input form-group abba_local-forms">
       <label class="prosgeneral_label_input_text prosinputforlabelforeach${prosnewcount} progenral_label_all_field" data-id="select" data-step="${prosnewcount}"></label>
       
       <select class="form-select   form-select-sm prosinputgenera_for_text prosinputtext_append_val${prosnewcount} prosgeneraloptionactions" data-id="select"  aria-label=".form-select-sm example">
           <option value="NULL">Option</option>
      </select>
      

      
   </div>
</div>`;




$('.prosloadtextinputcontent').append(prosloadtext_input);
$('.pros_track_input_step_val').val(prosnewcount);


$('.prosloadtextsectioncontent').fadeIn('slow');




$('.pros_track_input_step_val_title').val(prosnewcount);
$('.pros_track_input_step_val_options').val('option');
$('.pros_track_input_step_val_checks').val('');

$('.prosload_dropdown_full_content').fadeIn();
$('.prosload_title_step_for_some_input').fadeIn();



$('.prosload_check_content_full_here').fadeOut();
$('.prosload_title_step_for_some_button').fadeOut();

$('#prosloadtextModal').modal('show');

 $('#setoptimModal').css('z-index', 1040);


 $('.prosload_button_stage_track').val('');



});









$('body').on('click', '.prosad_text_input_field_file_btn', function(){


var pros_track =   parseInt($('.pros_track_input_step_val').val());
var prosnewcount =  pros_track + 1;


var prosloadtext_input = `  <div class="col-lg-6 prosgeinput_grid_content_long pros_loadcontenteachstep${prosnewcount}" data-id="${prosnewcount}">


        
        <div class="row">
        <div class="col-10">
        </div>

        <div class="col-2">
                   


        <div class="dropdown dropdown-sm float-end">

        <span class="mt-1 " role="button" id="dropdownMenuLinkparent13435" data-bs-toggle="dropdown" aria-expanded="true" style="float: right;  margin-right: 7px;">
            <i class="bx bx-dots-horizontal-rounded" style="font-size: 22px;"></i>
        </span>
        
            <ul class="dropdown-menu shadow abba-parent-dropdown " aria-labelledby="dropdownMenuLinkparent13435" style="background: rgb(247, 255, 247); border: none; position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(-160px, 0px, 0px);" data-popper-placement="bottom-start" >
                
                    <li>
                    <a  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-danger pros_generalremoveappendinput_optim"  data-id="${prosnewcount}">  <i class="fa fa-times"></i>  Remove</a>
                    </li>
        
        
                    <li>
        
        
                    <a  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-warning  prosadd_input_text_title_general  prosadd_input_text_title_single${prosnewcount}" data-bs-toggle="modal" data-bs-target="#prosloadtextModal"  data-id="${prosnewcount}" data-option="" data-check="">  <i class="fa fa-edit"></i>  Edit</a>
        
        
                    </li>
        
            </ul>
        
        </div>
        
        </div>

    </div>

   

   <div class="tags-input form-group abba_local-forms">
         <label class="prosgeneral_label_input_text prosinputforlabelforeach${prosnewcount} progenral_label_all_field" data-id="file" data-step="${prosnewcount}"></label>
        <input type="file" class="form-control prosinputgenera_for_text prosinputtext_append_val${prosnewcount}" data-id="file"  >
      
      
   </div>
</div>`;


$('.prosloadtextinputcontent').append(prosloadtext_input);
$('.pros_track_input_step_val').val(prosnewcount);


$('.prosloadtextsectioncontent').fadeIn('slow');




$('.pros_track_input_step_val_title').val(prosnewcount);
$('.pros_track_input_step_val_options').val('');
$('.pros_track_input_step_val_checks').val('');

$('.prosload_dropdown_full_content').fadeOut();
$('.prosload_title_step_for_some_input').fadeIn();
$('.prosload_title_step_for_some_button').fadeOut();



$('.prosload_check_content_full_here').fadeOut();

$('#prosloadtextModal').modal('show');

 $('#setoptimModal').css('z-index', 1040);


 $('.prosload_button_stage_track').val('');




});









$('body').on('click', '.prosad_text_input_field_check_button', function(){

       



var pros_track =   parseInt($('.pros_track_input_step_val').val());

var prosnewcount =  pros_track + 1;

$('.pros_track_input_step_val').val(prosnewcount);
$('.prosloadtextsectioncontent').fadeIn('slow');



$('.pros_track_input_step_val_title').val(prosnewcount);
$('.pros_track_input_step_val_options').val('');
$('.pros_track_input_step_val_checks').val('check');

$('.prosload_dropdown_full_content').fadeOut();
$('.predefined_yes_no_option').fadeOut();
$('.prosload_title_step_for_some_button').fadeOut();

$('.prosload_check_content_full_here').fadeIn();



$('#prosloadcheckradiobtn').modal('show');

  $('#setoptimModal').css('z-index', 1040);

  $('.prosload_button_stage_track').val('');

  var proscheck = 'check';

  var pros_number =  $('.pros_load_number_of_check').val();



 prosload_number_of_checkbox(prosnewcount, proscheck, pros_number);





});



$('body').on('click', '#pros_submit_here_btn_title', function(){

var pros_title =  $('.pros_input_type_general_checks_title').val();
var pros_step =  $('.pros_track_input_step_val').val();

$('.prosloadcheck_content_label' + pros_step).html('Select ' + pros_title);

$('#prosloadcheckradiobtn').modal('hide');
    
});



// prosload check box content here



function prosload_number_of_checkbox(prosnewcount, proscheck, pros_number)
{

// $('.pros_number_of_input_check_box').val(pros_number);




    var prosload_cont = `<p class="small progenral_label_all_field fw-bold mt-5 prosloadcheck_content_label${prosnewcount}" style="font-size:13px;" data-id="checkbox" data-step="${prosnewcount}"></p>`;

var prosloadcheck_cont = `<div class="row prosdisplay_count_new_check${prosnewcount}">
                         </div>

                       <a class="float-end text-primary pros_add_check_box_added_btn" data-id="${prosnewcount}" style="cursor:pointer;font-size:11px;margin-left:16px;">Add new <i class="fa fa-plus"></i></a><input type="hidden" value="${pros_number}" class="pros_number_of_input_check_box${prosnewcount}">`;


   var prosloadtext_input = '';

      for (var i = 0; i < pros_number; i++) {



        var proscountsteps = i+prosnewcount +'checks';

        var proscountsteps_number = i+1;

        prosloadtext_input+= `<div class="col-lg-12 prosgeinput_grid_content_long pros_loadcontenteachstep${proscountsteps}" data-id="${proscountsteps}">
                                    <div class="checkbox-wrapper-40 select_all p-2">

                                    <label>
                                        <div class="dropdown dropdown-sm ">

                                            <span class="" role="button" id="dropdownMenuLinkparent13435" data-bs-toggle="dropdown" aria-expanded="true" >
                                                <i class="bx bx-dots-horizontal-rounded" style="font-size: 22px;"></i>
                                            </span>
                                
                                            <ul class="dropdown-menu shadow abba-parent-dropdown " aria-labelledby="dropdownMenuLinkparent13435" style="background: rgb(247, 255, 247); border: none; position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(-160px, 0px, 0px);" data-popper-placement="bottom-start" data-popper-reference-hidden="" data-popper-escaped="">


                                                <li>
                                                  <a  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-danger pros_generalremoveappendinput_optim"  data-id="${proscountsteps}">  <i class="fa fa-times"></i>  Remove</a>
                                              </li>


                                                <li>


                                                   <a  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-warning  prosadd_input_text_title_general  prosadd_input_text_title_single${proscountsteps}" data-bs-toggle="modal" data-bs-target="#prosloadtextModal"  data-id="${proscountsteps}" data-option="" data-check="check">  <i class="fa fa-edit"></i>  Edit</a>
                                                
                                                </li>

                                            </ul>

                                        </div>

                                         <input type="checkbox" data-id="check"  class="selectallcheckbox pros_select_check_form prosinputgenera_for_text prosinputtext_append_val${proscountsteps} prosgeneraloptionactions${prosnewcount}" id="checkall_actions">
                                         <span  class="prosgeneral_label_input_text prosinputforlabelforeach${proscountsteps} checkbox  prosloadcheckcontentforall${prosnewcount}"  data-val="" data-id="checkbox" data-step="${prosnewcount}">Check ${proscountsteps_number}</span>
                                    </label>
                                </div>
                          </div>`;


           


        }


        $('.prosloadtextinputcontent').append(prosload_cont + prosloadtext_input + prosloadcheck_cont + '<br>');

}




$('body').on('click', '.pros_add_check_box_added_btn', function(){

        var prosnewcount = $(this).data('id');
        var prosload_inputcheckbox =   parseInt($(`.pros_number_of_input_check_box${prosnewcount}`).val());
        var proscountsteps = prosload_inputcheckbox+prosnewcount +'checks';


        var proscountsteps_number = prosload_inputcheckbox+1;

       var prosloadtext_input_new =`<div class="col-lg-12 prosgeinput_grid_content_long pros_loadcontenteachstep${proscountsteps}" data-id="${proscountsteps}">
                                    <div class="checkbox-wrapper-40 select_all p-2">

                                    <label>
                                        <div class="dropdown dropdown-sm ">

                                            <span class="" role="button" id="dropdownMenuLinkparent13435" data-bs-toggle="dropdown" aria-expanded="true" >
                                                <i class="bx bx-dots-horizontal-rounded" style="font-size: 22px;"></i>
                                            </span>
                                
                                            <ul class="dropdown-menu shadow abba-parent-dropdown " aria-labelledby="dropdownMenuLinkparent13435" style="background: rgb(247, 255, 247); border: none; position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(-160px, 0px, 0px);" data-popper-placement="bottom-start" data-popper-reference-hidden="" data-popper-escaped="">

                                             <li>
                                                  <a  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-danger pros_generalremoveappendinput_optim"  data-id="${proscountsteps}">  <i class="fa fa-times"></i>  Remove</a>
                                              </li>


                                                <li>

                                                   <a  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-warning  prosadd_input_text_title_general  prosadd_input_text_title_single${proscountsteps}" data-bs-toggle="modal" data-bs-target="#prosloadtextModal"  data-id="${proscountsteps}" data-option="" data-check="check">  <i class="fa fa-edit"></i>  Edit</a>
                                                
                                                </li>

                                            </ul>

                                        </div>

                                         <input type="checkbox" data-id="check"  class="selectallcheckbox pros_select_check_form prosinputgenera_for_text prosinputtext_append_val${proscountsteps} prosgeneraloptionactions${prosnewcount}" id="checkall_actions">
                                         <span  class="prosgeneral_label_input_text prosinputforlabelforeach${proscountsteps} checkbox  prosloadcheckcontentforall${prosnewcount}" data-val="" data-id="checkbox" data-step="${prosnewcount}">Check ${proscountsteps_number}</span>
                                    </label>
                                </div>
                          </div>`;

                          $(`.prosdisplay_count_new_check${prosnewcount}`).append(prosloadtext_input_new);
                          $(`.pros_number_of_input_check_box${prosnewcount}`).val(proscountsteps_number);
  
});
// prosload check box content here







$('body').on('click', '.prosad_text_input_field_radio_button', function(){


    var pros_track =   parseInt($('.pros_track_input_step_val').val());
    var prosnewcount =  pros_track + 1;

   


        // $('.prosloadtextinputcontent').append(prosloadtext_input);

        $('.pros_track_input_step_val').val(prosnewcount);
        $('.prosloadtextsectioncontent').fadeIn('slow');



        $('.pros_track_input_step_val_title').val(prosnewcount);
        $('.pros_track_input_step_val_options').val('');
        $('.pros_track_input_step_val_checks').val('check');

        $('.prosload_dropdown_full_content').fadeOut();
        $('.prosload_title_step_for_some_button').fadeOut();

        
        $('.predefined_yes_no_option').fadeOut();

        $('.prosload_check_content_full_here').fadeIn();

        $('#prosloadcheckradiobtn').modal('show');

        $('#setoptimModal').css('z-index', 1040);


        $('.prosload_button_stage_track').val('');



        var proscheck = 'check';
        var pros_number =  $('.pros_load_number_of_radio').val();

        prosload_number_of_radiobutton(prosnewcount, proscheck, pros_number);


});



function   prosload_number_of_radiobutton(prosnewcount, proscheck, pros_number)
{



var prosload_cont = `<p class="small progenral_label_all_field fw-bold mt-5 prosloadcheck_content_label${prosnewcount}" style="font-size:13px;" data-id="radiobutton" data-step="${prosnewcount}"></p>`;

                var prosloadcheck_cont = `<div class="row prosdisplay_count_new_radio${prosnewcount}">
                </div>
                <a class="float-end text-primary pros_add_radio_box_added_btn" data-id="${prosnewcount}" style="cursor:pointer;font-size:11px;margin-left:16px;">Add new <i class="fa fa-plus"></i></a><input type="hidden" value="${pros_number}" class="pros_number_of_input_radio_box${prosnewcount}">`;


                    var prosloadtext_input = '';

                    for (var i = 0; i < pros_number; i++) {



                    var proscountsteps = i+prosnewcount +'checks';

                    var proscountsteps_number = i+1;

                    prosloadtext_input+= `<div class="col-lg-12 prosgeinput_grid_content_long pros_loadcontenteachstep${proscountsteps}" data-id="${proscountsteps}">
                                    <div class="checkbox-wrapper-40 select_all p-2">

                                    <label>
                                        <div class="dropdown dropdown-sm ">

                                            <span class="" role="button" id="dropdownMenuLinkparent13435" data-bs-toggle="dropdown" aria-expanded="true" >
                                                <i class="bx bx-dots-horizontal-rounded" style="font-size: 22px;"></i>
                                            </span>
                                
                                            <ul class="dropdown-menu shadow abba-parent-dropdown " aria-labelledby="dropdownMenuLinkparent13435" style="background: rgb(247, 255, 247); border: none; position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(-160px, 0px, 0px);" data-popper-placement="bottom-start" data-popper-reference-hidden="" data-popper-escaped="">


                                                <li>
                                                    <a  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-danger pros_generalremoveappendinput_optim"  data-id="${proscountsteps}">  <i class="fa fa-times"></i>  Remove</a>
                                                </li>


                                                <li>


                                                    <a  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-warning  prosadd_input_text_title_general  prosadd_input_text_title_single${proscountsteps}" data-bs-toggle="modal" data-bs-target="#prosloadtextModal"  data-id="${proscountsteps}" data-option="" data-check="check">  <i class="fa fa-edit"></i>  Edit</a>
                                                
                                                </li>

                                            </ul>

                                        </div>

                                        <input type="radio" name="checkradiocount" data-id="radio"  class="selectallcheckbox pros_select_check_form prosinputgenera_for_text prosinputtext_append_val${proscountsteps} prosgeneraloptionactions${prosnewcount}" id="checkall_actions">
                                         <span  class="prosgeneral_label_input_text prosinputforlabelforeach${proscountsteps} checkbox  prosloadcheckcontentforall${prosnewcount}"  data-val="" data-id="radio" data-step="${prosnewcount}">Check ${proscountsteps_number}</span>

                                            
                                    </label>
                                </div>
                            </div>`;
                    }

                $('.prosloadtextinputcontent').append(prosload_cont + prosloadtext_input + prosloadcheck_cont + '<br>');

}






$('body').on('click', '.pros_add_radio_box_added_btn', function(){

var prosnewcount = $(this).data('id');
var prosload_inputcheckbox =   parseInt($(`.pros_number_of_input_radio_box${prosnewcount}`).val());
var proscountsteps = prosload_inputcheckbox+prosnewcount +'radio';




var proscountsteps_number = prosload_inputcheckbox+1;

var prosloadtext_input_new =`<div class="col-lg-12 prosgeinput_grid_content_long pros_loadcontenteachstep${proscountsteps}" data-id="${proscountsteps}">
                            <div class="checkbox-wrapper-40 select_all p-2">

            <label>
                <div class="dropdown dropdown-sm ">

                    <span class="" role="button" id="dropdownMenuLinkparent13435" data-bs-toggle="dropdown" aria-expanded="true" >
                        <i class="bx bx-dots-horizontal-rounded" style="font-size: 22px;"></i>
                    </span>
        
                    <ul class="dropdown-menu shadow abba-parent-dropdown " aria-labelledby="dropdownMenuLinkparent13435" style="background: rgb(247, 255, 247); border: none; position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(-160px, 0px, 0px);" data-popper-placement="bottom-start" data-popper-reference-hidden="" data-popper-escaped="">


                        <li>
                            <a  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-danger pros_generalremoveappendinput_optim"  data-id="${proscountsteps}">  <i class="fa fa-times"></i>  Remove</a>
                        </li>


                        <li>


                            <a  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-warning  prosadd_input_text_title_general  prosadd_input_text_title_single${proscountsteps}" data-bs-toggle="modal" data-bs-target="#prosloadtextModal"  data-id="${proscountsteps}" data-option="" data-check="check">  <i class="fa fa-edit"></i>  Edit</a>
                        
                        </li>

                    </ul>

                </div>

                    <input type="radio" name="checkradiocount" data-id="radio"  class="selectallcheckbox pros_select_check_form prosinputgenera_for_text prosinputtext_append_val${proscountsteps} prosgeneraloptionactions${prosnewcount}" id="checkall_actions">
                    <span  class="prosgeneral_label_input_text prosinputforlabelforeach${proscountsteps} checkbox prosloadcheckcontentforall${prosnewcount}" data-val="" data-id="radio" data-step="${prosnewcount}">Check ${proscountsteps_number}</span>

            </label>
        </div>
    </div>`;

    $(`.prosdisplay_count_new_radio${prosnewcount}`).append(prosloadtext_input_new);
    $(`.pros_number_of_input_radio_box${prosnewcount}`).val(proscountsteps_number);

});








$('body').on('click', '.prosad_text_input_field_button_btn', function(){

     $('#prosloadtextModal').modal('show');
     $('.prosload_title_step_for_some_button').fadeIn();
     $('.prosload_dropdown_full_content').fadeOut();
     $('#setoptimModal').css('z-index', 1040);




     $('.prosload_button_stage_track').val('addbuton');


     $('.pros_track_input_step_val_options').val('');
     $('.pros_track_input_step_val_checks').val('');
     $('.pros_track_input_step_val_title').val('');


     

});













$('body').on('click', '.pros_generalremoveappendinput_optim', function() {
    var pros_track_step_id =   $(this).data('id');
    $('.pros_loadcontenteachstep'+pros_track_step_id).remove();
});



// $('body').on('mouseleave', '.prosgeinput_grid_content', function() {

//     var pros_track_step_id =   $(this).data('id');

//     $('.proseditinput_text_actions'+pros_track_step_id).fadeOut('slow');

// });




$('body').on('click', '.prosadd_input_text_title_general', function() {

       var pros_track_step_id =   $(this).data('id');
       var option_steps  =   $(this).data('option');
       var option_check  =   $(this).data('check');
    
       
        $('.pros_track_input_step_val_title').val(pros_track_step_id);
        $('.pros_track_input_step_val_options').val(option_steps);
        $('.pros_track_input_step_val_checks').val(option_check);


       if(option_steps == 'option')
       {


               $('.prosload_dropdown_full_content').fadeIn();


       }else
       {

             $('.prosload_dropdown_full_content').fadeOut();

       }



       $('#setoptimModal').css('z-index', 1040); // Reset z-index of firstmodal

});


$('body').on('click', '#pros_add_input_here_btn', function() {

         var pros_title_id = $('.pros_track_input_step_val_title').val();

         var pros_title = $('.pros_input_type_general_title').val();
         var pros_options =  $('.pros_track_input_step_val_options').val();
         var pros_checks =  $('.pros_track_input_step_val_checks').val();

         var pros_load_track_button=  $('.prosload_button_stage_track').val();


         if(pros_load_track_button == 'addbuton')
         {


                   var pros_load_track_title =  $('.pros_input_type_general_button_title').val();
                   var pros_load_track_color =  $('.pros_input_type_general_button_color').val();



                  

                   if(pros_load_track_title == '')
                   {

                                    $.wnoty({
                                        type: 'warning',
                                        message: 'Hey, Input button title to proceed',
                                        autohideDelay: 7000
                                    });

                   }else
                   {

                   

                                $('.pros_generabutton_for_optim').css('background', pros_load_track_color);
                                $('.pros_generabutton_for_optim').html(pros_load_track_title);

                                $('.pros_generabutton_for_optim').attr('data-id', pros_load_track_title);
                                $('.pros_generabutton_for_optim').attr('data-color', pros_load_track_color);

                                $('.pros_generabutton_for_optim').fadeIn();



                                $('#prosloadtextModal').modal('hide');

                   }

                  
         }else
         {

                if(pros_checks == 'check')
                {



                    // alert(pros_title_id);

                    var pros_check_place =  $('.pros_check_options_cont').val();
                    var pros_values_check =  $('.pros_check_value_cont').val();

                    $(".prosinputtext_append_val"+pros_title_id).val(pros_values_check);
                    $(".prosinputforlabelforeach"+pros_title_id).html(pros_check_place);
                    

                    $(".prosinputforlabelforeach" + pros_title_id).attr('data-val', pros_values_check);

                    $('#prosloadtextModal').modal('hide');

                    

                }else
                {

                                if(pros_options == '')
                                {

                                    var option_select =  $('.pros_predifined_yes_no_input').val();

                                    if(option_select == 'yes')
                                    {



                                        var option_defined_title =  $('.pros_predefined_contact_info').val();
                                        $(".prosinputforlabelforeach"+pros_title_id).html(option_defined_title);
                                        $(".prosinputtext_append_val"+pros_title_id).attr("placeholder", option_defined_title);



                                    }else
                                    {

                                        $(".prosinputforlabelforeach"+pros_title_id).html(pros_title);
                                        $(".prosinputtext_append_val"+pros_title_id).attr("placeholder", pros_title);

                                    

                                        // prosinputtext_append_val${prosnewcount}

                                    }

                                
            
                                        $('#prosloadtextModal').modal('hide');
            
                                }else
                                {
            
            
                                
                                    $(".prosinputtext_append_val"+pros_title_id).attr("placeholder", pros_title);
            
            
                                    var prosload_option = [];
                                    var count_option = 0;
            
                                    $('.pros_select_options_cont').each(function() {
            
                                        var countvalue =  $(this).val();
            
                                        if(countvalue == '')
                                        {
            
                                                count_option++;
            
                                        }else
                                        {
                                            prosload_option.push($(this).val());
                                        }
            
                                        
                                    });
            
            
            
                                    var prosload_value = [];
                                    var count_value = 0;
            
                                    $('.pros_select_value_cont').each(function() {
            
                                        var countoption =  $(this).val();
            
                                        if(countoption == '')
                                        {
            
                                            count_value++;
                                        }else
                                        {
                                                prosload_value.push($(this).val());
                                        }
            
                                    });
            
            
            
            
                                    if(count_option > 0 || count_value > 0)
                                    {
            
                                            $.wnoty({
                                                type: 'warning',
                                                message: 'Make no option and value is left empty',
                                                autohideDelay: 7000
                                            });

            
                                    }else
                                    {
            
            
            
                                                var count_option_values = `<option value="NULL">Select ${pros_title}</option>`;
            
                                                for (var i = 0; i < prosload_value.length; i++) {


            
                                                        var itemvalue = prosload_value[i];
                                                        var itemoption = prosload_option[i];

                                                        count_option_values+=`<option value='${itemvalue}'>${itemoption}</option>`;
            
                                                }



                                                var option_select =  $('.pros_predifined_yes_no_input').val();

                                                if(option_select == 'yes')
                                                {
            

                                                    var option_defined_title =  $('.pros_predefined_contact_info').val();

            
                                                }else
                                                {
            
                                                    var option_defined_title = pros_title;
                                                
            
                                                }

            
                                                $('.prosinputtext_append_val'+pros_title_id).html(count_option_values);

                                                $('.prosinputforlabelforeach'+pros_title_id).html(option_defined_title);

                                                
            
                                                    $('#prosloadtextModal').modal('hide');
            
            
                                    }
            
            
            
            
                                }


                }
        }
        

        
});










    $('#prosloadtextModal').on('hidden.bs.modal', function () {
            $('#setoptimModal').css('z-index', 1050); // Reset z-index of firstmodal
    });
    

    $('#prosloadcheckradiobtn').on('hidden.bs.modal', function () {

            $('#setoptimModal').css('z-index', 1050); // Reset z-index of firstmodal
         
      });









// ADD TEXT INPUT CONTENT HERE 


// ADD OPTIONS HERE
$('body').on('click', '.pros_add_option_select_option_btn', function() {

    $('.prosload_options_for_select_here').append(` <div class="col-6">
            <div class="tags-input form-group abba_local-forms">
            <label>Option placeholder</label>
            <input type="text" class="form-control pros_select_options_cont"  placeholder="e:g; number">
            </div>
        </div>

        <div class="col-6">
        <div class="tags-input form-group abba_local-forms">
            <label>Option value</label>
            <input type="text" class="form-control pros_select_value_cont"  placeholder="e:g; 2">
        </div>
    </div>`);

});

// ADD OPTIONS HERE




$('body').on('change', '.pros_predifined_yes_no_input', function() {

    var pros_get_option_selected = $(this).val();

    if(pros_get_option_selected == 'NULL')
    {
            $.wnoty({

                type: 'warning',
                message: "Hey!! select an option",
                autohideDelay: 5000
            });
    }else
    {

            if(pros_get_option_selected == 'yes')
            {
                $('.prosload_title_step_for_some_predifined').fadeIn();
                $('.prosload_title_step_for_some_input').fadeOut();

            }else if(pros_get_option_selected == 'no')
            {
                $('.prosload_title_step_for_some_input').fadeIn();
                $('.prosload_title_step_for_some_predifined').fadeOut();
               
            }

    }


});






$('body').on('click', '#pros_submit_optimform_btn', function() {


        var funnel_id = $('.prosload_funnel_foroptim').val();

             var proscount_valid = [];

            $(".progenral_label_all_field").each(function () {

                    var pros_type = $(this).data('id');
                    var pros_title = $(this).text();
                    var pros_step = $(this).data('step');



                    proscount_valid.push(pros_title);
            });

            if(proscount_valid == '')
            {

                        $.wnoty({
                            type: 'warning',
                            message: 'Hey, Add input before proceeding.',
                            autohideDelay: 7000
                        });

            }else
            {


                if(funnel_id == '' || funnel_id == '0' || funnel_id == 'NULL')
                {



                        $.wnoty({
                            type: 'warning',
                            message: 'Hey, select funnel to proceed.',
                            autohideDelay: 7000
                        });


                  
                }else
                {

                        var verificationstate = 'proscreateoptimform';
                        prosauthorizationfunction(verificationstate);


                }



            }

});





function  proscreateoptimfunctionhere(token)
{

       $('#pros_submit_optimform_btn').html('<center><i class="fa fa-spinner fa-spin fs-3 text-primary"></i></center>');

        var funnel_id = $('.prosload_funnel_foroptim').val();



        var button_tile = $('.pros_generabutton_for_optim').data('id');
        var button_color = $('.pros_generabutton_for_optim').data('color');


       
        
    
         var jsonData = [];
        $(".progenral_label_all_field").each(function () {

            var pros_type = $(this).data('id');
            var pros_title = $(this).text();
            var pros_step = $(this).data('step');

            
            

                var fullinput = {
                    pros_type: pros_type,
                    pros_title: pros_title,
                    otheractions: []
                };


            if(pros_type == 'checkbox' || pros_type == 'radiobutton' || pros_type == 'select')
            {



                if(pros_type == 'select')
                {




                    
                    $(".prosinputtext_append_val" + pros_step + " option").each(function () {

                                var input_val = $(this).val();
                                var options_count = $(this).text();
        
                                var inputactions = {
                                    input_val: input_val,
                                    options_count:options_count
                                };
        
                            
                                fullinput.otheractions.push(inputactions);
        
                            });



                }else
                {


              

                              // prosloadcheckcontentforall${prosnewcount}
                                $('.prosloadcheckcontentforall'+pros_step).each(function () {

                                    var input_val = $(this).data('val');
                                    var options_count = $(this).text();

                                    
            
                                    var inputactions = {
                                        input_val: input_val,
                                        options_count:options_count
                                    };
            
                            
                                    fullinput.otheractions.push(inputactions);
            
                                });

                }


                       

            }else
            {

            }


          


            jsonData.push(fullinput);
        });

        console.log(jsonData);


       var prosget_json =  JSON.stringify(jsonData);
     


        var data = {
            "jsonData": prosget_json,
            "token": token,
            "funnel_id":funnel_id,
            'button_tile':button_tile,
            'button_color':button_color
            
        };

       



        // Convert the data object to JSON string
        var jsonData = JSON.stringify(data);
        // Create a new XMLHttpRequest
        var request = new XMLHttpRequest();


        
              $('#pros_submit_optimform_btn').prop('disabled', true);

             // Set up the request
            request.open('POST', 'https://sendova.co/api/create-optim-form/');
            request.setRequestHeader('Content-Type', 'application/json');


                // Define the callback function to handle the response
            request.onreadystatechange = function () {

        
                if (this.readyState === XMLHttpRequest.DONE) {


                    $('#pros_submit_optimform_btn').prop('disabled', false);
                    $('#pros_submit_optimform_btn').html(`<i class="fa fa-plus"> Save</i>`);

                     $('#prosdeletecamapaignmodal').modal('hide');



                    if (this.status === 200) {

                       var abc = this.responseText;
                       

                       var response = JSON.parse(this.responseText);
                        

                        var status = response["responseMessage"];
                        var request = response["requestSuccessful"];
                        var des = response["responseDescription"];

                        // var funnelcontent = response["responseBody"];

                      

                        if(status == 'success')
                        {

                                    $.wnoty({
                                        type: 'success',
                                        message: des,
                                        autohideDelay: 5000
                                    });


                                    // var verificationstate = 'prosloadcampaignview';
                                    // prosauthorizationfunction(verificationstate);

                        }else
                        {
                                $.wnoty({
                                    type: 'warning',
                                    message: des,
                                    autohideDelay: 5000
                                });

                        }

                        
                    } else {

                        // Request failed, handle error
                            // alert("Error: " + this.status);

                            console.log("Error: " + this.status);
                        }
                    }
                };

                // // Send the request with the JSON data as the body
              request.send(jsonData);

}



$('body').on('click', '.prosgeneraload_optimform', function() {

      var funnel_id = $(this).data('id');
      var brand_id = $(this).data('brand');
      $('.prosload_funnel_foroptim').val(funnel_id);

      $('.prosload_optim_linkcont').fadeOut();



    var prosload_link = `https://sendova.co/optim-form/?funnel_id=${funnel_id}&brand=${brand_id}`;
    $('.prosload_generateedlink').val(prosload_link);
    

      var verificationstate = 'prosloadoptimforfunnel';
      prosauthorizationfunction(verificationstate);


      $('.prosloadtextinputcontent_created_main').html('');




});

$('body').on('click', '#pros_wabtn_optimlink_link', function() {

      var messageUrl = $('.prosload_generateedlink').val();

        // Define the message you want to send
        var message =  messageUrl;
        
        // Combine the base WhatsApp URL with the message you want to send
        var whatsappUrl = 'whatsapp://send?text=' + encodeURIComponent(message);
        
        // When the button with ID 'send-whatsapp' is clicked
    
            // Open the WhatsApp URL in a new window
            window.open(whatsappUrl, '_blank');
        
});


$(document).ready(function() {
    $('body').on('click', '#pros_copy_button_form', function() {
        // Get the text input field
        var $textInputField = $('.prosload_generateedlink');

        // Get the text from the input field
        var textToCopy = $textInputField.val();

        // Copy the text to the clipboard using the modern clipboard API
        navigator.clipboard.writeText(textToCopy).then(function() {
            // Provide feedback to the user
            $.wnoty({
                type: 'success',
                message: "Copied.",
                autohideDelay: 5000
            });
        }).catch(function(error) {
            console.error('Failed to copy text: ', error);
            // You could add error handling code here if needed
        });
    });
});




function  prosloadoptimformcontent(token)
{


         $('.prosloadtextinputcontent_created').html('<center><i class="fa fa-spinner fa-spin fs-3 text-primary"></i></center>');


         var funnel_id  =  $('.prosload_funnel_foroptim').val();
       

            var data = {
                "funnel_id": funnel_id,
                "token": token
            };


            // Convert the data object to JSON string
            var jsonData = JSON.stringify(data);
            // Create a new XMLHttpRequest
            var request = new XMLHttpRequest();


        
            // Set up the request
            request.open('POST', 'https://sendova.co/api/load-optim-form/');
            request.setRequestHeader('Content-Type', 'application/json');


                    // Define the callback function to handle the response
                request.onreadystatechange = function () {


                    if (this.readyState === XMLHttpRequest.DONE) {

                        
                        if (this.status === 200) {

                        var abc = this.responseText;


                      
                      
                        var response = JSON.parse(this.responseText);
                            

                            var status = response["responseMessage"];
                            var request = response["requestSuccessful"];
                            var des = response["responseDescription"];
                            var funnelcontent = response["responseBody"];

                            if(status == 'success')
                            {





                                $('.prosload_optim_linkcont').fadeIn();
                               
                                $('.prosloadtextinputcontent_created').html('');
                                

                                    var pros_track =   parseInt($('.pros_track_input_step_val').val());


                                    // var count_steps = 0

                                    // if(pros_track == '0')
                                    // { 
                                    //     count_steps+=1


                                    // }else
                                    // {
                                    //     count_steps+=0;
                                    // }


                                    // alert(pros_track);

                                    var  countnumberofinput = 0;
                                    var prosloadtext_cont = '';

                                    for (var i = 0; i < funnelcontent.length; i++) {



                                        // 'form_id' => 'NULL',
                                        // 'funnel_id' => 'NULL',
                                        // 'input_type'=> 'NULL',
                                        // 'placeholder'=> 'NULL',
                                        // 'option'=> 'NULL',
                                        // 'values'=>'NULL'    


                                        // alert(abc);

                                        var item = funnelcontent[i];

                                        // alert(item.input_type);

                                        var prosnewcount =  pros_track++;
                                        countnumberofinput+=prosnewcount;



                                          var prosload_actions = item.actions;

                                                    // Accessing the `option` and `values` properties
                                                    var option_arr = prosload_actions.option.split(',');
                                                    var values_arr = prosload_actions.values.split(',');

                                                    // alert(values_arr);

                                                    
                                                    var counsop_slect = '';
                                                      
                                                    for (var n = 0; n < option_arr.length; n++) {

                                                                    
                                                          var item_options = option_arr[n];
                                                          var item_values = values_arr[n];

                                                            counsop_slect+=`<option value="${item_values}">${item_options}</option>`;

                                                    }



                                       if(item.input_type == 'textarea') 
                                       {




                                       


                                       

                                            prosloadtext_cont+=` <div class="col-lg-12 prosgeinput_grid_content_long pros_loadcontenteachstep${prosnewcount}" data-id="${prosnewcount}">
                                            
                                                            
                                                        <div class="row">
                                                        <div class="col-10">
                                                        </div>
                                        
                                                        <div class="col-2">
                                                            
                                                                <div class="dropdown dropdown-sm float-end">
                                        
                                                                    <span class="mt-1 " role="button" id="dropdownMenuLinkparent13435" data-bs-toggle="dropdown" aria-expanded="true" style="float: right;  margin-right: 7px;">
                                                                        <i class="bx bx-dots-horizontal-rounded" style="font-size: 22px;"></i>
                                                                    </span>
                                                                    
                                                                    <ul class="dropdown-menu shadow abba-parent-dropdown " aria-labelledby="dropdownMenuLinkparent13435" style="background: rgb(247, 255, 247); border: none; position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(-160px, 0px, 0px);" data-popper-placement="bottom-start"> 
                                                                            
                                                                        <li>
                                                                        <a  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-danger pros_generalremoveappendinput_optim"  data-id="${prosnewcount}">  <i class="fa fa-times"></i>  Remove</a>
                                                                        </li>
                                                                        <li>
                                                                        <a  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-warning  prosadd_input_text_title_general  prosadd_input_text_title_single${prosnewcount}" data-bs-toggle="modal" data-bs-target="#prosloadtextModal"  data-id="${prosnewcount}" data-option="" data-check="">  <i class="fa fa-edit"></i>  Edit</a>
                                                            
                                                                        </li>
                                                                    </ul>
                                                            </div>
                                        
                                                        </div>
                                                        
                                        
                                                    </div>
                                        
                                                <div class="tags-input form-group abba_local-forms">

                                                    <label class="prosgeneral_label_input_text prosinputforlabelforeach${prosnewcount} progenral_label_all_field" data-id="textarea" data-step="${prosnewcount}">${item.placeholder}</label>
                                                    <textarea class="form-control prosinputgenera_for_text prosinputtext_append_val${prosnewcount}" data-id="textarea"  placeholder="${item.placeholder}" id="floatingTextarea2" style="height: 100px"></textarea>
                                                    
                                                </div>
                                            </div>`;



                                       }
                                       
                                       else if(item.input_type == 'number'){

                                             
                                                        prosloadtext_cont+=`<div class="col-lg-6 prosgeinput_grid_content pros_loadcontenteachstep${prosnewcount}" data-id="${prosnewcount}">

                                                
                                                                    <div class="row">
                                                                    <div class="col-9">
                                                                    </div>
                                        
                                                                    <div class="col-3">
                                        
                                        
                                        
                                                                            <div class="dropdown dropdown-sm float-end">
                                        
                                                                                    <span class="mt-1 " role="button" id="dropdownMenuLinkparent13435" data-bs-toggle="dropdown" aria-expanded="true" style="float: right;  margin-right: 7px;">
                                                                                        <i class="bx bx-dots-horizontal-rounded" style="font-size: 22px;"></i>
                                                                                    </span>
                                                                                    
                                                                                    <ul class="dropdown-menu shadow abba-parent-dropdown " aria-labelledby="dropdownMenuLinkparent13435" style="background: rgb(247, 255, 247); border: none; position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(-160px, 0px, 0px);" data-popper-placement="bottom-start" >
                                                                                            
                                                                                        <li>
                                                                                        <a  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-danger pros_generalremoveappendinput_optim"  data-id="${prosnewcount}" >  <i class="fa fa-times"></i>  Remove</a>
                                                                                        </li>
                                                                                        <li>
                                                                                        <a  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-warning  prosadd_input_text_title_general  prosadd_input_text_title_single${prosnewcount}" data-bs-toggle="modal" data-bs-target="#prosloadtextModal"  data-id="${prosnewcount}" data-option="" data-check="">  <i class="fa fa-edit"></i>  Edit</a>
                                                                            
                                                                                        </li>
                                                                                    </ul>
                                                                            </div>
                                                                                            
                                        
                                                                            
                                                                    </div>
                                        
                                                                </div>
                                        
                                                        <div class="tags-input form-group abba_local-forms">
                                                            <label class="prosgeneral_label_input_text_number prosinputforlabelforeach${prosnewcount} progenral_label_all_field" data-id="number" data-step="${prosnewcount}" >${item.placeholder}</label>
                                                            <input type="number"  class="form-control prosinputgenera_for_text prosinputtext_append_val${prosnewcount}" data-id="number"  >
                                                        </div>
                                                    </div>`;



                                       }  else if(item.input_type == 'select')
                                       {



                                                    // console.log(item.actions);
                                                    //   var pros_options = item.option.split(',');
                                                    //   var pros_values = item.values.split(',');

                                                   
                                                  

                                                 prosloadtext_cont+=`<div class="col-lg-6 prosgeinput_grid_content_long pros_loadcontenteachstep${prosnewcount}" data-id="${prosnewcount}">

                                                        <div class="row">
                                                            <div class="col-10">
                                                            </div>
                                            
                                                            <div class="col-2">
                                                                    
                                            
                                            
                                                            <div class="dropdown dropdown-sm float-end">
                                            
                                                            <span class="mt-1 " role="button" id="dropdownMenuLinkparent13435" data-bs-toggle="dropdown" aria-expanded="true" style="float: right;  margin-right: 7px;">
                                                                <i class="bx bx-dots-horizontal-rounded" style="font-size: 22px;"></i>
                                                            </span>
                                                            
                                                                <ul class="dropdown-menu shadow abba-parent-dropdown " aria-labelledby="dropdownMenuLinkparent13435" style="background: rgb(247, 255, 247); border: none; position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(-160px, 0px, 0px);" data-popper-placement="bottom-start" >
                                                                    
                                                                        <li>
                                                                        <a  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-danger pros_generalremoveappendinput_optim"  data-id="${prosnewcount}">  <i class="fa fa-times"></i>  Remove</a>
                                                                        </li>
                                                            
                                                            
                                                                        <li>
                                                                                <a  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-warning  prosadd_input_text_title_general  prosadd_input_text_title_single${prosnewcount}" data-bs-toggle="modal" data-bs-target="#prosloadtextModal"  data-id="${prosnewcount}" data-option="option" data-check="">  <i class="fa fa-edit"></i>  Edit</a>
                                                            
                                                                        </li>
                                                                </ul>
                                                            </div>
                                                                
                                                            </div>
                                            
                                                        </div>
                                                    
                                                    <div class="tags-input form-group abba_local-forms">
                                                        <label class="prosgeneral_label_input_text prosinputforlabelforeach${prosnewcount} progenral_label_all_field" data-id="select" data-step="${prosnewcount}">${item.placeholder}</label>
                                                        
                                                        <select class="form-select   form-select-sm prosinputgenera_for_text prosinputtext_append_val${prosnewcount} prosgeneraloptionactions" data-id="select"  aria-label=".form-select-sm example">
                                                            ${counsop_slect}
                                                         </select>
                                                    </div>
                                                </div>`;





                                       }else if(item.input_type == 'file')
                                       {






                                                

                                                        prosloadtext_cont+=`<div class="col-lg-6 prosgeinput_grid_content_long pros_loadcontenteachstep${prosnewcount}" data-id="${prosnewcount}">

                                                        <div class="row">
                                                            <div class="col-10">
                                                            </div>
                                            
                                                            <div class="col-2">
                                                                    
                                            
                                            
                                                            <div class="dropdown dropdown-sm float-end">
                                            
                                                            <span class="mt-1 " role="button" id="dropdownMenuLinkparent13435" data-bs-toggle="dropdown" aria-expanded="true" style="float: right;  margin-right: 7px;">
                                                                <i class="bx bx-dots-horizontal-rounded" style="font-size: 22px;"></i>
                                                            </span>
                                                            
                                                                <ul class="dropdown-menu shadow abba-parent-dropdown " aria-labelledby="dropdownMenuLinkparent13435" style="background: rgb(247, 255, 247); border: none; position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(-160px, 0px, 0px);" data-popper-placement="bottom-start" >
                                                                    
                                                                        <li>
                                                                        <a  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-danger pros_generalremoveappendinput_optim"  data-id="${prosnewcount}">  <i class="fa fa-times"></i>  Remove</a>
                                                                        </li>
                                                            
                                                            
                                                                        <li>
                                                                                <a  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-warning  prosadd_input_text_title_general  prosadd_input_text_title_single${prosnewcount}" data-bs-toggle="modal" data-bs-target="#prosloadtextModal"  data-id="${prosnewcount}" data-option="option" data-check="">  <i class="fa fa-edit"></i>  Edit</a>
                                                            
                                                                        </li>
                                                                </ul>
                                                            </div>
                                                                
                                                            </div>
                                            
                                                        </div>
                                                    
                                                        <div class="tags-input form-group abba_local-forms">
                                                        <label class="prosgeneral_label_input_text prosinputforlabelforeach${prosnewcount} progenral_label_all_field" data-id="file" data-step="${prosnewcount}">${item.placeholder}</label>
                                                    <input type="file" class="form-control prosinputgenera_for_text prosinputtext_append_val${prosnewcount}" data-id="file"  >
                                                    
                                                </div>
                                                </div>`;





                                       }else if(item.input_type == 'button')
                                        {




                                            var buttcolor  = prosload_actions.values;

                                            $('.pros_generabutton_for_optim').fadeIn();

                                            $('.pros_generabutton_for_optim').attr('data-id', item.placeholder);
                                            $('.pros_generabutton_for_optim').attr('data-color', buttcolor);
                                            $('.pros_generabutton_for_optim').html(item.placeholder);
                                            $('.pros_generabutton_for_optim').css('background-color', buttcolor);

                                            

                                        }
                                        else if(item.input_type == 'checkbox')
                                        {



                                            // alert(prosnewcount);
                                            var counsop_checkcount = '';


                                            var prosload_contnew = `<p class="small progenral_label_all_field fw-bold prosloadcheck_content_label${prosnewcount}" style="font-size:13px;" data-id="checkbox" data-step="${prosnewcount}">${item.placeholder}</p>`;

                                           
                                                      
                                            for (var d = 0; d < option_arr.length; d++) {


                                               

                                                            
                                                  var item_options_check = option_arr[d];
                                                  var item_values_check = values_arr[d];

                                                  var proscountstepsnew = d+prosnewcount +'checks';
                                                 
                                                  counsop_checkcount+=`<div class="col-lg-12 prosgeinput_grid_content_long pros_loadcontenteachstep${proscountstepsnew}" data-id="${proscountstepsnew}">
                                                    <div class="checkbox-wrapper-40 select_all p-2">
                
                                                                <label>
                                                                    <div class="dropdown dropdown-sm ">
                                            
                                                                        <span class="" role="button" id="dropdownMenuLinkparent13435" data-bs-toggle="dropdown" aria-expanded="true" >
                                                                            <i class="bx bx-dots-horizontal-rounded" style="font-size: 22px;"></i>
                                                                        </span>
                                                            
                                                                        <ul class="dropdown-menu shadow abba-parent-dropdown " aria-labelledby="dropdownMenuLinkparent13435" style="background: rgb(247, 255, 247); border: none; position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(-160px, 0px, 0px);" data-popper-placement="bottom-start" data-popper-reference-hidden="" data-popper-escaped="">
                                            
                                            
                                                                            <li>
                                                                                <a  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-danger pros_generalremoveappendinput_optim"  data-id="${proscountstepsnew}">  <i class="fa fa-times"></i>  Remove</a>
                                                                            </li>
                                            
                                            
                                                                            <li>
                                            
                                            
                                                                                <a  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-warning  prosadd_input_text_title_general  prosadd_input_text_title_single${proscountstepsnew}" data-bs-toggle="modal" data-bs-target="#prosloadtextModal"  data-id="${proscountstepsnew}" data-option="" data-check="check">  <i class="fa fa-edit"></i>  Edit</a>
                                                                            
                                                                            </li>
                                            
                                                                        </ul>
                                                                        
                                            
                                                                    </div>
                                            
                                                                        <input type="checkbox" value="${item_values_check}" name="checkradiocount" data-id="checkbox"  class="selectallcheckbox pros_select_check_form prosinputgenera_for_text prosinputtext_append_val${proscountstepsnew} prosgeneraloptionactions${proscountstepsnew}" id="checkall_actions">
                                                                        <span  class="prosgeneral_label_input_text prosinputforlabelforeach${proscountstepsnew} checkbox prosloadcheckcontentforall${prosnewcount}" data-val="${item_values_check}" data-id="checkbox" data-step="${prosnewcount}">
                                                                         ${item_options_check}</span>
                                                                        
                                                                        
                                                                </label>
                                                            </div>
                                                        </div>`;

                                            }

                                            var newcheckboxcont = prosload_contnew + counsop_checkcount;


                                            prosloadtext_cont+= newcheckboxcont;
                                    
                                            // alert(newcheckboxcont);
                                                




                                        } else if(item.input_type == 'radiobutton')

                                        {




                                            var counsop_checkcount = '';


                                            var prosload_contnew = `<p class="small progenral_label_all_field fw-bold prosloadcheck_content_label${prosnewcount}" style="font-size:13px;" data-id="radiobutton" data-step="${prosnewcount}">${item.placeholder}</p>`;

                                           
                                                      
                                            for (var d = 0; d < option_arr.length; d++) {


                                               

                                                            
                                                  var item_options_check = option_arr[d];
                                                  var item_values_check = values_arr[d];

                                                  var proscountstepsnew = d+prosnewcount +'checks';
                                                 
                                                  counsop_checkcount+=`<div class="col-lg-12 prosgeinput_grid_content_long pros_loadcontenteachstep${proscountstepsnew}" data-id="${proscountstepsnew}">
                                                    <div class="checkbox-wrapper-40 select_all p-2">
                
                                                                <label>
                                                                    <div class="dropdown dropdown-sm ">
                                            
                                                                        <span class="" role="button" id="dropdownMenuLinkparent13435" data-bs-toggle="dropdown" aria-expanded="true" >
                                                                            <i class="bx bx-dots-horizontal-rounded" style="font-size: 22px;"></i>
                                                                        </span>
                                                            
                                                                        <ul class="dropdown-menu shadow abba-parent-dropdown " aria-labelledby="dropdownMenuLinkparent13435" style="background: rgb(247, 255, 247); border: none; position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(-160px, 0px, 0px);" data-popper-placement="bottom-start" data-popper-reference-hidden="" data-popper-escaped="">
                                            
                                            
                                                                            <li>
                                                                                <a  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-danger pros_generalremoveappendinput_optim"  data-id="${proscountstepsnew}">  <i class="fa fa-times"></i>  Remove</a>
                                                                            </li>
                                            
                                            
                                                                            <li>
                                            
                                            
                                                                                <a  class="btn btn-sm btn-icon btn-pure btn-outline dropdown-item text-warning  prosadd_input_text_title_general  prosadd_input_text_title_single${proscountstepsnew}" data-bs-toggle="modal" data-bs-target="#prosloadtextModal"  data-id="${proscountstepsnew}" data-option="" data-check="check">  <i class="fa fa-edit"></i>  Edit</a>
                                                                            
                                                                            </li>
                                            
                                                                        </ul>
                                                                        
                                            
                                                                    </div>
                                            
                                                                        <input type="radio" value="${item_values_check}" name="checkradiocount${prosnewcount}" data-id="checkbox"  class="selectallcheckbox pros_select_check_form prosinputgenera_for_text prosinputtext_append_val${proscountstepsnew} prosgeneraloptionactions${proscountstepsnew}" id="checkall_actions">
                                                                        <span  class="prosgeneral_label_input_text prosinputforlabelforeach${proscountstepsnew} checkbox prosloadcheckcontentforall${prosnewcount}" data-val="${item_values_check}" data-id="radio" data-step="${prosnewcount}">
                                                                         ${item_options_check}</span>
                                                                        
                                                                        
                                                                </label>
                                                            </div>
                                                        </div>`;

                                            }

                                            var newcheckboxcont = prosload_contnew + counsop_checkcount;


                                            prosloadtext_cont+= newcheckboxcont;



                                        }



                                        

  


                                    }

                                   

                                    $('.prosloadtextinputcontent_created_main').append(prosloadtext_cont);
                                    $('.pros_track_input_step_val').val(countnumberofinput);

                            }else

                            {

                                $('.pros_generabutton_for_optim').fadeOut();
                                $('.prosloadtextinputcontent_created').html('');

                            }

                        
                            
                        } else {

                            // Request failed, handle error
                                // alert("Error: " + this.status);

                                console.log("Error: " + this.status);
                            }
                        }
                    };

                    // // Send the request with the JSON data as the body
                request.send(jsonData);





}


//===================UP IN FORM FULL CONTENT HERE======================








$('body').on('click', '#add_contact', function(){

$('#add_contact').html('<i class="fa fa-solid fa-spinner fa-spin" style="font-size:15px;"></i>');

var activeTab = $('.nav-link.active').attr('data-id');

if(activeTab == 1)
{
    var view_edit_tag = $('.add_tag').val();
    var view_edit_title = $('.add_title').val();
    var view_edit_fname = $('.add_fname').val();
    var view_edit_mname = $('.add_mname').val();
    var view_edit_lname = $('.add_lname').val();
    var view_edit_nname = $('.add_nname').val();
    var view_edit_salutation = $('.add_salutation').val();
    var view_edit_email = $('.add_email').val();
    var view_edit_number = $('.add_number').val();
    var view_edit_dob = $('.add_dob').val();
    var view_edit_bname = $('.add_bname').val();
    var view_edit_pib = $('.add_pib').val();
    var view_edit_gender = $('.add_gender').val();
    var view_edit_country = $('.add_country').val();
    var view_edit_state = $('.add_state').val();
    var view_edit_city = $('.add_city').val();
    var view_edit_contact_id = '';
    var view_edit_spouse_title = $('.add_spouse_title').val();
    var view_edit_spouse_fname = $('.add_spouse_fname').val();
    var view_edit_spouse_lname = $('.add_spouse_lname').val();
    var view_edit_spouse_nname = $('.add_spouse_nname').val();
    var view_edit_spouse_salutation = $('.add_spouse_salutation').val();

    var view_edit_kid1_fname = $('.add_kid1_fname').val();
    var view_edit_kid2_fname = $('.add_kid2_fname').val();
    var view_edit_kid3_fname = $('.add_kid3_fname').val();
    var view_edit_kid4_fname = $('.add_kid4_fname').val();
    var brandid = $('.abba-change-brand').val();

    var userid = "<?php echo $UserID; ?>";
    
    var formatted_my_number = [];
    $('.add_number').each(function() {
        
        var iti = window.intlTelInputGlobals.getInstance(this);
        
        var my_number_format = $(this).val();
        
        formatted_my_number.push(intlTelInputUtils.formatNumber(my_number_format, iti.getSelectedCountryData().iso2));
        
    });

    formatted_my_number = formatted_my_number.toString();
    formatted_my_number = formatted_my_number.replace(/\+/g, "");

    if(view_edit_tag == '' || view_edit_tag == '0')
    {
        $(".add_tag").css("border-color", "red");
        
        $.wnoty({
            type: 'warning',
            message: "Please select a tag to proceed.",
            autohideDelay: 7000
        });

        $('#add_contact').html('<i class="fa fa-save"> Save</i>');

    }
    else if(view_edit_number == '' || view_edit_number == '0')
    {
        $(".add_number").css("border-color", "red");
        
        $(".add_tag").css("border-color", "");
        
        $.wnoty({
            type: 'warning',
            message: "Please input atleast this contacts phone number to proceed.",
            autohideDelay: 7000
        });

        $('#add_contact').html('<i class="fa fa-save"> Save</i>');

    }
    else{

        $(".add_number").css("border-color", "");
        
        $(".add_tag").css("border-color", "");
       
        $.ajax({
            type: 'POST',
            url:"https://sendova.co/api/create-user/",
            data: {
                view_edit_tag:view_edit_tag,
                view_edit_title:view_edit_title,
                view_edit_fname:view_edit_fname,
                view_edit_mname:view_edit_mname,
                view_edit_lname:view_edit_lname,
                view_edit_nname:view_edit_nname,
                view_edit_salutation:view_edit_salutation,
                view_edit_spouse_title:view_edit_spouse_title,
                view_edit_spouse_fname:view_edit_spouse_fname,
                view_edit_spouse_lname:view_edit_spouse_lname,
                view_edit_spouse_nname:view_edit_spouse_nname,
                view_edit_spouse_salutation:view_edit_spouse_salutation,
                view_edit_email:view_edit_email,
                view_edit_number:formatted_my_number,
                view_edit_dob:view_edit_dob,
                view_edit_bname:view_edit_bname,
                view_edit_pib:view_edit_pib,
                view_edit_gender:view_edit_gender,
                view_edit_country:view_edit_country,
                view_edit_state:view_edit_state,
                view_edit_city:view_edit_city,
                contact_id:view_edit_contact_id,
                view_edit_kid1_fname:view_edit_kid1_fname,
                view_edit_kid2_fname:view_edit_kid2_fname,
                view_edit_kid3_fname:view_edit_kid3_fname,
                view_edit_kid4_fname:view_edit_kid4_fname,
                brandid:brandid,
                userid:userid,
                activeTab:activeTab
            },
            success: function (output) {

                // alert(output);

                if(output == '1')
                {
                    $.wnoty({
                        type: 'success',
                        message: "Added Successfully",
                        autohideDelay: 7000
                    });
                    setTimeout(function(){
                        var verificationstate = 'loadcontact';
                        prosauthorizationfunction(verificationstate);
                    }, 2000);

                }
                else{

                    $.wnoty({
                        type: 'error',
                        message: "A contact already exist with this number",
                        autohideDelay: 7000
                    });

                }
            
                $('#add_contact').html('<i class="fa fa-save"> Save</i>');

            }

        });
    }

}
else{

    var fd = new FormData();
    var files = $('#file-5')[0].files[0];
    var brandid = $('.abba-change-brand').val();
    var userid = "<?php echo $UserID; ?>";
    var view_edit_tag = $('.add_tag_file').val();
    
    if(view_edit_tag == '' || view_edit_tag == '0')
    {
        $(".add_tag_file").css("border-color", "red");
        
        $.wnoty({
            type: 'warning',
            message: "Please select a tag to proceed.",
            autohideDelay: 7000
        });

        $('#add_contact').html('<i class="fa fa-save"> Update</i>');

    }
    else if (!files) {
        $("#file-5").css("border-color", "red");

        $(".add_tag_file").css("border-color", "");

        $.wnoty({
            type: 'warning',
            message: "Please select a file to proceed.",
            autohideDelay: 7000
        });

        $('#add_contact').html('<i class="fa fa-save"> Save</i>');

    }
    else{
        
        $("#file-5").css("border-color", "");

        $(".add_tag_file").css("border-color", "");

        fd.append('file', files);
        fd.append('brandid', brandid);
        fd.append('userid', userid);
        fd.append('activeTab', activeTab);
        fd.append('view_edit_tag', view_edit_tag);

        $.ajax({
            type: 'POST',
            url: "https://sendova.co/api/create-user/",
            data: fd,
            contentType: false,
            processData: false,
            success: function(output) {
                // alert(output);

                $.wnoty({
                    type: 'success',
                    message: "Added Successfully",
                    autohideDelay: 7000
                });
                setTimeout(function(){
                    var verificationstate = 'loadcontact';
                    prosauthorizationfunction(verificationstate);
                }, 2000);

                $('#add_contact').html('<i class="fa fa-save"> Save</i>');
            }
        });
    }

}

});



</script>
</body>

</html>