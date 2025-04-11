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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> -->


    <!-- Animate.css CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        integrity="sha512-..." crossorigin="anonymous" />

    <!-- style sheet -->
    <link rel="stylesheet" href="../../css/app_css/appStyle.css">
    <!-- emma css cdn  -->
    <link rel="stylesheet" href="../../css/app_css/css/style.css">

    <!-- notification css-->
    <link href="../../assets/plugins/notify/wnoty.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha3/css/bootstrap.min.css">
    
    <!-- emma CSS CDN for select checkboxes -->
    <link rel="stylesheet" href="../../assets/plugins/virtual-select.min.css">
    
    <!-- html2pdf CDN link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
            integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- image Croppie -->
    <link rel="stylesheet" href="../../assets/plugins/Croppie/croppie.css"/>

    <script src="../../assets/plugins/dselect.js"></script>
    
    <script>(function (e, t, n) { var r = e.querySelectorAll("html")[0]; r.className = r.className.replace(/(^|\s)no-js(\s|$)/, "$1js$2") })(document, window, 0);</script>

    <script type="text/javascript">
        var tableToExcel = (function () {
            var uri = 'data:application/vnd.ms-excel;base64,'
                , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
                , base64 = function (s) { return window.btoa(unescape(encodeURIComponent(s))) }
                , format = function (s, c) { return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; }) }
            return function (table, name) {
                if (!table.nodeType) table = document.getElementById(table)
                var ctx = { worksheet: name || 'Worksheet', table: table.innerHTML }
                window.location.href = uri + base64(format(template, ctx))
            }
        })()
    </script>
    
     <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<style>
        #myDataTable {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

      #myDataTable th, #myDataTable td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    #myDataTable th {
        background-color: #3498db; /* Change this to your desired color, e.g., #2ecc71 for green */
        color: white; /* Adjust text color for better visibility */
    }

    #myDataTable tr:nth-child(even) {
        background-color: #f2f2f2; /* Alternate row color */
    }



    .multipleSelection {
            position: relative;
        
        }

        .scrollable-select {
            width: 500px; /* Set your desired width */
            overflow-y: auto;
            border: 1px solid #ccc;
        }

        .selectBox {
            position: relative;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 5px;
        }

        .overSelect1 {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        #checkBoxes {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            border: 1px solid #ccc;
            max-height: 400px;
            overflow-y: auto;
        }

        #checkBoxes label {
            cursor: pointer;
        }

        #checkBoxes1 {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        border: 1px solid #ccc;
        max-height: 400px;
        overflow-y: auto;
    }

    #checkBoxes1 label {
        display: inline-block; /* Set display to inline-block */
        padding: 5px; /* Add some padding for better spacing */
        cursor: pointer;
    }

</style>
</head>

<body>

    <!-- Preloader HTML structure -->
    <!-- <div class="preloader">
        <span class="smooth spinner"></span>
    </div> -->

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
    
    <div class="main-cards" style="margin-top: 20px;">
        <div class="row g-3">
            <div class="col-sm-4 col-md-6 col-lg-4">
                <div class="topSecCards" style="width: 100%; height: 120px;">
                    <div class="abba_parent_card" style="background: linear-gradient(0deg, rgba(1, 112, 180) 0%, rgba(1, 112, 180) 53%, rgba(1, 112, 180) 100%);">
                        <div class="row" style="margin-top: 12px;">
                            <div class="col-8">
                                <h6 style="font-size: 12px; margin-top: 5px; margin-left: 10px; color: #ffffff;">
                                    Number Of Positions</h6>
                                <p></p>
                                <h4 style="margin-left: 10px; color: #ffffff;" id="emmatotalpositions"></h4>
                            </div>
                            <div class="col-4">
                                <i class="fas fa-briefcase text-white" style="font-size:50px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-md-6 col-lg-4">
                <div class="topSecCards" style="width: 100%; height: 120px;">
                    <div class="abba_parent_card" style="background: linear-gradient(0deg, rgba(12,3,160,1) 0%, rgba(0,127,251,1) 53%, rgba(0,127,251,1) 100%);">
                        <div class="row" style="margin-top: 12px;">
                            <div class="col-8">
                                <h6 style="font-size: 12px; margin-top: 5px; margin-left: 10px; color: #ffffff;">
                                    Number Of Candidates</h6>
                                <p></p>
                                <h4 style="margin-left: 10px; color: #ffffff;" id="emmatotalappliedpositions"></h4>
                            </div>
                            <div class="col-4">
                                <i class="fas fa-user-friends text-white" style="font-size:50px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-4 col-md-6 col-lg-4">
                <div class="topSecCards" style="width: 100%; height: 120px;">
                    <div class="abba_parent_card" style="background: linear-gradient(0deg, rgba(247, 180, 54) 0%, rgba(255, 140, 0) 53%, rgba(255, 140, 0) 100%);">
                        <div class="row" style="margin-top: 12px;">
                            <div class="col-8">
                                <h6 style="font-size: 12px; margin-top: 5px; margin-left: 10px; color: #ffffff;">
                                Total Votes</h6>
                                <p></p>
                                <h4 style="margin-left: 10px; color: #ffffff;" id="emmatotalvotes">93</h4>
                            </div>
                            <div class="col-4">
                            <i class="fas fa-vote-yea text-white" style="font-size:50px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
    <div class="col-12">

        <ul class="nav nav-tabs mb-3 customtab" id="abba_ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="emma_ex1-tab-10" data-bs-toggle="tab" href="#emma_ex1-tabs-10" role="tab" aria-controls="emma_ex1-tabs-10" aria-selected="true">Election Settings</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="emma_ex1-tab-20" data-bs-toggle="tab" href="#emma_ex1-tabs-20" role="tab" aria-controls="emma_ex1-tabs-20" aria-selected="false">Election Applicants</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="emma_ex1-tab-30" data-bs-toggle="tab" href="#emma_ex1-tabs-30" role="tab" aria-controls="emma_ex1-tabs-30" aria-selected="false">Campaign Settings</a>
            </li>
        </ul>

        <div class="tab-content" id="ex1-content">
            <div class="tab-pane fade show active" id="emma_ex1-tabs-10" role="tabpanel" aria-labelledby="emma_ex1-tab-10">
                <div class="row g-2 mt-5">
                    <div class="col-md-12 col-lg-3">
                        <select style="color: #666666;" class="form-select form-select-sm" aria-label="form-select-sm example" id="emma_select_campus_for_election_settings">
                            <option value="NULL">Select Campus</option>
                        </select>
                    </div>
                    <div class="col-md-12 col-lg-7"></div>
                    <div class="col-lg-2">
                        <div align='end'>
                            <button type="button" class="btn btn-primary btn-sm" style="font-size: 12px;" data-bs-toggle="modal" data-bs-target="#set_election">
                                <i class="fa fa-tasks"></i> Set Election
                            </button>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card p-4">
                            <div class="card-body">
                                <div class="loadelectionsettingstablehere"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="emma_ex1-tabs-20" role="tabpanel" aria-labelledby="emma_ex1-tab-20">
                <div class="row g-2 mt-5">
                    <div class="col-md-12 col-lg-3">
                        <select style="color: #666666;" class="form-select form-select-sm loadcampusforapplicants"
                            aria-label="form-select-sm example"
                            id="">
                            <option value="NULL">Select Campus</option>
                        </select>
                    </div>

                    <div class="col-md-12 col-lg-3">
                        <select style="color: #666666;" class="form-select form-select-sm loadsessionforapplicants"
                            aria-label="form-select-sm example"
                            id="">
                            <option value="NULL">Select Session</option>
                        </select>
                    </div>

                    <div class="col-md-12 col-lg-3">
                        <select style="color: #666666;" class="form-select form-select-sm loadpositionforapplicants"
                            aria-label="form-select-sm example"
                            id="">
                            <option value="NULL">Select Position</option>
                        </select>
                    </div>
                    
                    <div class="col-md-12 col-lg-1">

                    </div>

                    <div class="col-md-12 col-lg-2">
                        <button type="button" style="float: right;font-size: 13px;border:none;font-weight:500;"
                            class="btn btn-sm btn-primary text-light load_election_applicants" data-bs-toggle="modal"
                            data-bs-target="#"> <i class="fas fa-sync-alt"> Load</i></button>
                    </div>
                </div>

                <div class="keep_applicants_card mt-4"></div>

            </div>

            <div class="tab-pane fade" id="emma_ex1-tabs-30" role="tabpanel" aria-labelledby="emma_ex1-tab-30">
                <div class="row mt-5">
                    <div class="col-md-12 col-lg-3">
                        <select style="color: #666666;" class="form-select form-select-sm"
                            aria-label="form-select-sm example"
                            id="loadcampusforcampaign">
                            <option value="NULL">Select Campus</option>
                        </select>
                    </div>


                    <div class="col-md-12 col-lg-9">
                        <button type="button" style="float: right;font-size: 13px;border:none;font-weight:500;"
                        class="btn btn-sm btn-primary text-light campaignsettings" data-bs-toggle="modal"
                        data-bs-target="#emmatransactionsettings"> <i class="fas fa-cog"> Campaign Setting</i></button>
                    </div>
                </div>

                <div class="card mt-5">
                    <div class="card-body p-5">
                        
                            
                        <div class="keepcampaigntable"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

</main>
     <!-- End Main -->

    <!--SET ELECTION Modal -->
    <div class="modal fade" id="set_election" tabindex="-1" aria-labelledby="set_electionLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalLabel"><i class="fa fa-tasks"></i> Set Election</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="abba_local-forms mt-4 p-1">
                                <label>Select Campus <span style="color:orangered;">*</span></label>
                                <select class="form-control" id="emma_get_election_settings_campus">
                                    <option value="NULL">Select Campus</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="abba_local-forms mt-4 p-1">
                                <label>Election Title<span style="color:orangered;">*</span></label>
                                <input type="text" id="emma_get_election_settings_title" class="form-control" placeholder="Election Title">
                            </div>
                        </div>

                        <div class="col-12 col-sm-12">
                            <div class="abba_local-forms mt-4 p-1">
                                <label>Session<span style="color:orangered;">*</span></label>
                                <select class="form-control " id="emma_get_election_settings_session">
                                    <option value="NULL">Select Session</option>
                                </select>
                            </div>
                        </div>

                        <div class="emmacontainer">
                            <div class="row">
                                <div class="col-12">
                                    <div class="select-btn">
                                        <span class="btn-text">Select Positions</span>
                                        <span class="arrow-dwn">
                                            <i class="fa-solid fas fa-chevron-down"></i>
                                        </span>
                                    </div>
                                    <ul class="list-items" id="emma_get_election_settings_positions"></ul>
                                </div>
                            </div>
                        </div>

                        <div class="emmacontainer_one">
                            <div class="row">
                                <div class="col-12">
                                    <div class="select-btn-one">
                                        <span class="btn-text-one">Select Classes Permitted For Application</span>
                                        <span class="arrow-dwn">
                                            <i class="fa-solid fas fa-chevron-down"></i>
                                        </span>
                                    </div>

                                    <ul class="list-items_one" id="emma_get_election_settings_classes">
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3 pt-4 pb-4 border" style="border-radius:5px;">
                        <div class="col-6">
                            <div class="abba_local-forms ">
                                <label>Election Season Start Date<span style="color:orangered;">*</span></label>
                                <input type="date" id="emma_get_election_settings_season_start_date" class="form-control" placeholder="Election Season Start Date">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="abba_local-forms">
                                <label>Election Season End Date<span style="color:orangered;">*</span></label>
                                <input type="date" id="emma_get_election_settings_season_end_date" class="form-control" placeholder="Election Season End Date">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3 pt-4 pb-4 border" style="border-radius:5px;">
                        <div class="col-6">
                            <div class="abba_local-forms">
                                <label>Election Campaign Start Date<span style="color:orangered;">*</span></label>
                                <input type="date" id="emma_get_election_settings_season_campaign_start_date" class="form-control" placeholder="Election Campaign Start Date">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="abba_local-forms">
                                <label>Election Campaign End Date<span style="color:orangered;">*</span></label>
                                <input type="date" id="emma_get_election_settings_season_campaign_end_date" class="form-control" placeholder="Election Campaign End Date">
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="abba_local-forms mt-4">
                            <label>Election Day Date<span style="color:orangered;">*</span></label>
                            <input type="date" id="emma_get_election_settings_season_day" class="form-control" placeholder="Election Day Date">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="abba_local-forms mt-4">
                            <label>Student Average Range<span style="color:orangered;">*</span></label>
                            <input type="number" id="emma_get_election_settings_student_average" class="form-control" placeholder="Student Average Range">
                        </div>
                    </div>

                    <div class="col-12 col-sm-12">
                        <div class="abba_local-forms mt-4">
                            <label>Payment Permission<span style="color:orangered;">*</span></label>
                            <select class="form-control " id="emma_get_debtors">
                                <option value="NULL">Do you permit debtors to apply for a position?</option>
                                <option value="1">YES</option>
                                <option value="2">NO</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary emma_election_settings_btn"><i class="fa fa-tasks"></i> Set</button>
                </div>
            </div>
        </div>
    </div>

    <!-- edit settings modal  -->
    <div class="modal fade" id="modal_for_edit_settings" tabindex="-1" aria-labelledby="modal_for_edit_settingsLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalLabel"><i class="fa fa-tasks"></i> Edit Election Settings</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <small class="campus_name mt-4 text-primary">Learning Field School Campus 2</small>
                            <!-- <div class="abba_local-forms mt-2">
                                <label>Session<span style="color:orangered;">*</span></label> -->
                                
                                <input type="hidden" id="keepdataidforedit" class="form-control">
                                <input type="hidden" id="keepcampusidforedit" class="form-control">
                            <!-- </div> -->
                        </div>

                        <div class="col-12">
                            <div class="abba_local-forms mt-4">
                                <label>Session<span style="color:orangered;">*</span></label>
                                <input type="text" id="emma_get_election_settings_session_edit" class="form-control" placeholder="Session" disabled>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="abba_local-forms mt-4">
                                <label>Election Title<span style="color:orangered;">*</span></label>
                                <input type="text" id="emma_get_election_settings_title_edit" class="form-control" placeholder="Election Title">
                            </div>
                        </div>

                        <div class="emmacontainer_edit mt-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="select-btn_edit">
                                        <span class="btn-text_edit">Select Positions</span>
                                        <span class="arrow-dwn">
                                            <i class="fa-solid fas fa-chevron-down"></i>
                                        </span>
                                    </div>
                                    <ul class="list-items_edit" id="emma_get_election_settings_positions_edit"></ul>
                                </div>
                            </div>
                        </div>

                        <div class="emmacontainer_one_edit mt-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="select-btn_one_edit">
                                        <span class="btn-text_one_edit">Select Classes</span>
                                        <span class="arrow-dwn">
                                            <i class="fa-solid fas fa-chevron-down"></i>
                                        </span>
                                    </div>

                                    <ul class="list-items_one_edit" id="emma_get_election_settings_classes_edit">
                                    
                                        <li class="item item_one_edit emmacheckitemsone_edit" data-id="'.$emma_get_class_id.'">
                                            <span class="checkbox-one_edit" id="'.$emma_get_class_id.'" data-id="'.$emma_get_class_id.'">
                                                <i class="fa-solid fas fa-check check-icon"></i>
                                            </span>
                                            <span class="item_one-text_edit">Edit Classes</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="abba_local-forms mt-4">
                                <label>Election Season Start Date<span style="color:orangered;">*</span></label>
                                <input type="date" id="season_start_date_edit" class="form-control" placeholder="Election Season Start Date">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="abba_local-forms mt-4">
                                <label>Election Season End Date<span style="color:orangered;">*</span></label>
                                <input type="date" id="season_end_date_edit" class="form-control" placeholder="Election Season End Date">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="abba_local-forms mt-4">
                                <label>Election Campaign Start Date<span style="color:orangered;">*</span></label>
                                <input type="date" id="campaign_start_date_edit" class="form-control" placeholder="Election Campaign Start Date">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="abba_local-forms mt-4">
                                <label>Election Campaign End Date<span style="color:orangered;">*</span></label>
                                <input type="date" id="campaign_end_date_edit" class="form-control" placeholder="Election Campaign End Date">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="abba_local-forms mt-4">
                                <label>Election Day Date<span style="color:orangered;">*</span></label>
                                <input type="date" id="election_day_date_edit" class="form-control" placeholder="Election Day Date">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="abba_local-forms mt-4">
                                <label>Student Average Range<span style="color:orangered;">*</span></label>
                                <input type="number" id="emma_get_election_settings_student_average_edit" class="form-control" placeholder="Student Average Range">
                            </div>
                        </div>

                        <div class="col-12 col-sm-12">
                            <div class="abba_local-forms mt-4">
                                <label>Payment Permission<span style="color:orangered;">*</span></label>
                                <select class="form-control " id="emma_get_debtors_edit">
                                    <option value="NULL">Do you permit debtors to apply for a position?</option>
                                    <option value="1">YES</option>
                                    <option value="2">NO</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary emmaeditelectionsettings"><i class="fa fa-tasks"></i> Update</button>
                </div>
            </div>
        </div>
    </div>

    <!-- delete settings modal  -->
    <div class="modal fade" id="delete_election_settings" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel"><i class="fas fa-trash"></i> Delete Settings</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="keepsettingsdelete_dataid">
                    <input type="hidden" class="keepsettingsdelete_campusid">

                    <div align="center">
                        <p class="text-danger"><b>NOTE: </b>Once this setting has been deleted, this action <br> cannot be reversed</p>
                    </div>
                    <div class="emma_delete_image"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger emma_delete_election_settings"><i class="fas fa-trash"></i> Yes! Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- view applicants modal  -->
    <div class="modal fade" id="view_applicants" tabindex="-1" aria-labelledby="view_applicantsLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalLabel"><i class="fas fa-eye"></i> View Applicant Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="view_applicantsdetails"></div>
                    <input type="hidden" id="keepcampusforstatus">
                    <input type="hidden" id="keepstudentidforstatus">
                    <input type="hidden" id="keepdataidforstatus">
                    <input type="hidden" id="keepstatus">
                    <input type="hidden" id="keepsession">
                    <input type="hidden" id="keeppositionid">


                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success approve_application"><i class="fa fa-check"></i> Approve</button>
                    <button type="button" class="btn btn-danger decline_application"><i class="fa fa-times"></i> Decline</button>
                </div>
            </div>
        </div>
    </div>


    <!-- campaign settings modal -->

    <div class="modal fade modalshow modalfade" id="emmatransactionsettings" tabindex="-1"
            aria-labelledby="emmatransactionsettingsLabel" aria-hidden="true" style="z-index:2000;">
            <div class="modal-dialog dialogcontent modal-dialog-scrollable"
                style="border-top-left-radius: 20px; width: 100%;">
                <div class="modal-content modalcontent" style="background-color: #ffffff;">


                    <div class="modal-header">
                        <h5 class="modal-title text-primary"><i class="fas fa-cog"></i> Settings (Campaign)</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row p-1">

                        <div class="col-sm-6 col-lg-6">
                                <div class="form-group abba_local-forms">
                                    <label>Campus<span style="color:orangered;">*</span> </label>
                                    <select class="form-control" id="emmaloadcampaigncampus">
                                        <option value="NULL">Select Campus</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group abba_local-forms">
                                    <label>Session<span style="color:orangered;">*</span> </label>
                                    <select class="form-control" id="emmaloadcampaignsession">
                                        <option value="0">Select Session</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card" id="cardforloginpage">
                                    <div class="card-body">
                                        <input type="checkbox" class="form-check-input float-start checkboxforloginpage generaltitle_check" data-index="0" value="Login Page" style="cursor:pointer; margin-right: 10px;">
                                        <div class="abba_local-forms" style="font-size: 15px; cursor: pointer;">
                                            Login Page
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="abba_local-forms">
                                    <label></label>
                                    <input type="number" id="loginpageAmountInput" class="form-control emmacampaignamounts0" placeholder="Login Page Amount" style="height:60px;">
                                </div>
                            </div>

                            <div class="col-lg-6 mt-4">
                                <div class="card" id="cardforwebsite">
                                    <div class="card-body">
                                        <input type="checkbox" class="form-check-input float-start checkboxforwebsite generaltitle_check" data-index="1" value="Website" style="cursor:pointer; margin-right: 10px;">
                                        <div class="abba_local-forms" style="font-size: 15px; cursor: pointer;">
                                            Website
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 mt-4">
                                <div class="abba_local-forms">
                                    <label></label>
                                    <input type="number" id="websiteAmountInput" class="form-control emmacampaignamounts1" placeholder="Website Amount" style="height:60px;">
                                </div>
                            </div>

                            <div class="col-lg-6 mt-4">
                                <div class="card" id="cardforscroll">
                                    <div class="card-body">
                                        <input type="checkbox" class="form-check-input float-start checkboxforscroll generaltitle_check" data-index="2" value="Scroll" style="cursor:pointer; margin-right: 10px;">
                                        <div class="abba_local-forms" style="font-size: 15px; cursor: pointer;">
                                            Scroll
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6 mt-4">
                                <div class="abba_local-forms">
                                    <label></label>
                                    <input type="number" id="scrollAmountInput" class="form-control emmacampaignamounts2" placeholder="Scroll Amount" style="height:60px;">
                                </div>
                            </div>

                            <div class="col-lg-6 mt-4">
                                <div class="card" id="cardforpopup">
                                    <div class="card-body">
                                        <input type="checkbox" class="form-check-input float-start checkboxforpopup generaltitle_check" data-index="3" value="Pop Up" style="cursor:pointer; margin-right: 10px;">
                                        <div class="abba_local-forms" style="font-size: 15px; cursor: pointer;">
                                            Pop Up
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6 mt-4">
                                <div class="abba_local-forms">
                                    <label></label>
                                    <input type="number" id="popupAmountInput" class="form-control emmacampaignamounts3" placeholder="Pop-up Amount" style="height:60px;">
                                </div>
                            </div>

                            <div class="col-lg-6 mt-4">
                                <div class="card" id="cardfornewsflash">
                                    <div class="card-body">
                                        <input type="checkbox" class="form-check-input float-start checkboxfornewsflash" data-index="4" value="NewsFlash" style="cursor:pointer; margin-right: 10px;">
                                        <div class="abba_local-forms" style="font-size: 15px; cursor: pointer;">
                                            NewsFlash
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 mt-4">
                                <div class="abba_local-forms">
                                    <label></label>
                                    <input type="number" id="newsflashAmountInput" class="form-control emmacampaignamounts4" placeholder="Newsflash Amount" style="height:60px;">
                                </div>
                            </div>
                         

                            <div class="col-lg-6 mt-4">
                                <div class="card" id="cardformessaging">
                                    <div class="card-body">
                                        <input type="checkbox" class="form-check-input float-start checkboxformessaging generaltitle_check" data-index="5" value="Messaging" style="cursor:pointer; margin-right: 10px;">
                                        <div class="abba_local-forms" style="font-size: 15px; cursor: pointer;">
                                            Messaging
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 mt-4">
                                <div class="abba_local-forms">
                                    <label></label>
                                    <input type="number" id="messagingAmountInput" class="form-control emmacampaignamounts5" placeholder="Messaging Amount" style="height:60px;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm bg-light text-primary mt-2 rounded-3 btn-outline-primary" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"> Close</i></button>
                        <button type="button" class="btn btn-sm text-white mt-2 rounded-3 bg-primary savecampaignsettings"><i class="fas fa-save"> Save</i></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- edit campaign modal  -->

        <!-- Button trigger modal -->

    <div class="modal fade" id="editcampaign" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel"><i class="fas fa-edit"></i> Edit Campaign</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <input type="hidden" class="campusidforcampaign">
                <input type="hidden" class="sessionidforcampaign">

                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="abba_local-forms ">
                            <label>Campaign Page Title<span style="color:orangered;">*</span></label>
                            <input type="text" id="campaign_page_title" class="form-control" placeholder="Page Title" disabled>
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <div class="abba_local-forms">
                            <label>Campaign Page Amount<span style="color:orangered;">*</span></label>
                            <input type="number" id="campaign_page_amount" class="form-control" placeholder="Page Amount">
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary updatecampaignsettings"><i class="fas fa-edit"></i> Update</button>
            </div>
            </div>
        </div>
    </div>

         <!--Script-->
    <!--jquery knob -->
    <script src="../../assets/plugins/knob/jquery.knob.js"></script>

  <script>
    $(function() {
        $('[data-plugin="knob"]').knob();
    });

   

    // $(document).ready(function () {
    //     $('#myDataTable').DataTable();
    // });

    </script>
<!--Custom JS--->
<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- header js -->
<?php include('../../controller/js/app/header.php'); ?>

<!-- pagination js -->
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.min.js"></script>

<!-- notification js -->
<script src="../../assets/plugins/notify/wnoty.js"></script>

<!-- image cropper js -->
<script src="../../assets/plugins/Croppie/croppie.js"></script>
<script src="../../assets/plugins/Croppie/croppie.min.js"></script>


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>

<script src="../../js/app_js/script.js"></script>
<script src="../../js/admin_js/adminScript.js"></script>
<!-- current page js -->
<?php include('../../js/current_page.php'); ?>


<script src="../../controller/js/app/election.js"></script>

    <!-- emma JS CDN for select checkboxes -->
    <script src="../../js/app_js/virtual-select.min.js"></script>


<!-- image cropper js -->
<script src="../../assets/plugins/Croppie/croppie.js"></script>
<script src="../../assets/plugins/Croppie/croppie.min.js"></script>
<script>

    
    'use strict';

    ; (function (document, window, index) {
        var inputs = document.querySelectorAll('.abba-inputfile');
        Array.prototype.forEach.call(inputs, function (input) {
            var label = input.ElementSibling,
                labelVal = label.innerHTML;

            input.addEventListener('change', function (e) {
                var fileName = '';
                if (this.files && this.files.length > 1)
                    fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
                else
                    fileName = e.target.value.split('\\').pop();

                if (fileName)
                    label.querySelector('span').innerHTML = fileName;
                else
                    label.innerHTML = labelVal;
            });

            // Firefox bug fix
            input.addEventListener('focus', function () { input.classList.add('has-focus'); });
            input.addEventListener('blur', function () { input.classList.remove('has-focus'); });
        });
    }(document, window, 0));
</script>

</body>

</html>