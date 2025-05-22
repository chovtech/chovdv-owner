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

    <!-- style sheet -->
    <link rel="stylesheet" href="../../css/app_css/appStyle.css">
      <link rel="stylesheet" href="../../css/app_css/questionbank.css">

    <!-- notification css-->
    <link href="../../assets/plugins/notify/wnoty.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    
    
       <!-- html2pdf CDN link -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
                integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
        
         <script type="text/javascript" src="../../assets/plugins/tinymce6/tinymce6/plugins/tiny_mce_wiris/integration/WIRISplugins.js"></script>
    <script type="text/javascript" src="../../assets/plugins/tinymce6/js/wirislib.js"></script>
    <script type="text/javascript" src="../../assets/plugins/tinymce6/tinymce6/tinymce.min.js"></script>


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

</head>
<style>
    .hidden_row {
        display: none;
    }

    .abba_class_row {
        border: 1px solid #007ffb;
        color: #0f86fa;
        font-weight: 450;
        text-align: center;
        font-size: 10px;
        border-radius: 7px;
        background-color: #d9eafa;
    }

    .abba_current_teacher {
        border: 1px solid #01df77;
        color: #009751;
        font-weight: 450;
        text-align: center;
        font-size: 11px;
        border-radius: 7px;
        background-color: #bdffe0;
    }

    .editbox {

        display: none
    }

    .editbox {
        font-size: 14px;
        width: 50px;
        background-color: #FFFFFF;
        border: solid 1px #FFFFFF;
        padding: 5px 5px;
    }

    .edit_tr:hover {
        background-color: #90c7fc;
        cursor: pointer;
    }

    .editbox_psycho {

        display: none
    }

    .editbox_psycho {

        display: none
    }

    .editbox_psycho {
        font-size: 14px;
        width: 50px;
        background-color: #FFFFFF;
        border: solid 1px #FFFFFF;
        padding: 5px 5px;
    }

    .edit_tr_psycho:hover {
        background-color: #90c7fc;
        cursor: pointer;
    }

    .editbox_affective {

        display: none
    }

    .editbox_affective {

        display: none
    }

    .editbox_affective {
        font-size: 14px;
        width: 50px;
        background-color: #FFFFFF;
        border: solid 1px #FFFFFF;
        padding: 5px 5px;
    }

    .edit_tr_affective:hover {
        background-color: #90c7fc;
        cursor: pointer;
    }   

    .abba_stud_checkbox-group {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        width: 90%;
        margin-left: auto;
        margin-right: auto;
        max-width: 600px;
        user-select: none;
    }

    .abba_stud_checkbox-group-legend {
        font-size: 1.5rem;
        font-weight: 700;
        color: #9c9c9c;
        text-align: center;
        line-height: 1.125;
        margin-bottom: 1.25rem;
    }

    .abba_stud_checkbox-input {
        clip: rect(0 0 0 0);
        clip-path: inset(100%);
        height: 1px;
        overflow: hidden;
        position: absolute;
        white-space: nowrap;
        width: 1px;
    }

    .abba_stud_checkbox-input:checked+.abba_stud_checkbox-tile {
        border-color: #2260ff;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        color: #2260ff;
    }

    .abba_stud_checkbox-input:checked+.abba_stud_checkbox-tile:before {
        transform: scale(1);
        opacity: 1;
        background-color: #2260ff;
        border-color: #2260ff;
    }

    .abba_stud_checkbox-input:checked+.abba_stud_checkbox-tile .abba_stud_checkbox-icon,
    .abba_stud_checkbox-input:checked+.abba_stud_checkbox-tile .abba_stud_checkbox-label {
        color: #2260ff;
    }

    .abba_stud_checkbox-input:focus+.abba_stud_checkbox-tile {
        border-color: #2260ff;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1), 0 0 0 4px #b5c9fc;
    }

    .abba_stud_checkbox-input:focus+.abba_stud_checkbox-tile:before {
        transform: scale(1);
        opacity: 1;
    }

    .abba_stud_checkbox-tile {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 7rem;
        min-height: 7rem;
        border-radius: 0.5rem;
        border: 2px solid #b5bfd9;
        background-color: #fff;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        transition: 0.15s ease;
        cursor: pointer;
        position: relative;
    }

    .abba_stud_checkbox-tile:before {
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

    .abba_stud_checkbox-tile:hover {
        border-color: #2260ff;
    }

    .abba_stud_checkbox-tile:hover:before {
        transform: scale(1);
        opacity: 1;
    }

    .abba_stud_checkbox-icon {
        transition: 0.375s ease;
        color: #494949;
    }

    .abba_stud_checkbox-icon svg {
        width: 3rem;
        height: 3rem;
    }

    .abba_stud_checkbox-label {
        color: #707070;
        transition: 0.375s ease;
        text-align: center;
    }

    .js .abba-inputfile {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }

    .abba-inputfile+label {
        max-width: 80%;
        font-size: 1.25rem;
        /* 20px */
        font-weight: 700;
        text-overflow: ellipsis;
        white-space: nowrap;
        cursor: pointer;
        display: inline-block;
        overflow: hidden;
        padding: 0.625rem 1.25rem;
        /* 10px 20px */
    }

    .no-js .abba-inputfile+label {
        display: none;
    }

    .abba-inputfile:focus+label,
    .abba-inputfile.has-focus+label {
        outline: 1px dotted #000;
        outline: -webkit-focus-ring-color auto 5px;
    }

    .abba-inputfile+label svg {
        width: 1em;
        height: 1em;
        vertical-align: middle;
        fill: currentColor;
        margin-top: -0.25em;
        /* 4px */
        margin-right: 0.25em;
        /* 4px */
    }

    /* style 4 */

    .abba-inputfile-4+label {
        color: #0268cc;
    }

    .abba-inputfile-4:focus+label,
    .abba-inputfile-4.has-focus+label,
    .abba-inputfile-4+label:hover {
        color: #004b94;
    }

    .abba-inputfile-4+label .icon-color {
        color: #0268cc;
    }

    .abba-inputfile-4:focus+label .icon-color,
    .abba-inputfile-4.has-focus+label .icon-color,
    .abba-inputfile-4+label:hover .icon-color {
        color: #004b94;
    }

    .downloadbtn-student-list {
        color: #fff;
        font-weight: bold;
        background: linear-gradient(0deg, rgba(0, 50, 204, 1) 0%, rgba(0, 127, 251, 1) 100%);
        animation: pulse 1s infinite ease-in-out alternate;

    }

    @keyframes pulse {
        from {
            transform: scale(1.0);
        }

        to {
            transform: scale(1.1);
        }
    }

    @media print {
        body {
            margin: auto;
        }
    }
</style>




 <style>

            
             .protitle {
                 text-transform: uppercase;
                 font-weight: 600;
                 color: #fff;
                 padding: 22px;
                 font-size: 18px;
            } 
             .subprotitle {
                 font-size: 14px;
                 /* padding-left: 16px;*/
                 margin-bottom: -10px; 
            }
             #counter {
                 font-size: 12px;
                 color: #818181;
                 float: right;
                 margin-right: 22px;
            }
             .prosupload-bar {
                 height: 10px;
                 width: 100px;
                 background: #ddd;
                 margin: 18px;
                 border-radius: 99px;
                width: 91%;
                 overflow: hidden;
            }
             #prosprogress-line {
                 background: #008cf7;
                 width: 0%;
                 height: 10px;
                 border-radius: 99px;
            }
             #prosstatusupload {
                 color: #008cf7;
                 font-size: 12px;
                 margin: -12px 0px 22px 20px;
            }
             .prosdropzone {
                 border: 2px dashed #ddd;
                 padding: 22px;
                 width: 81%;
                 height: auto;
                 border-radius: 22px;
                 margin: auto;
                 margin-bottom: 22px;
                 text-align: center;
            }
             .prosprosdz-icon {
                 width: 60px;
            }
             .browse a {
                 font-weight: 800;
                 color: #037af7;
                 text-decoration: none;
            }
             .prossave-btn {
                display:none;
                 text-transform: uppercase;
                 transition: .3s ease;
                 padding: 10px;
                 color: #fff;
                 background:#008cf7;
                 margin: auto;
                 border: none;
                 border-radius: 8px;
                 width: 120px;
                 text-align: center;
                 margin-bottom: 22px;
                 box-shadow: 0px 8px 20px #ccc;
            }
             .prossave-btn:hover {
                 cursor:pointer;
                 color: #037af7;
                 background: #f1f1f1;
            }
             .drag-img {
                 width: 100px;
                 height: 100px;
                 background: #fff;
                 object-fit: cover;
                 border-radius: 12px;
                 position: absolute;
                 z-index:10;
            }
             .prosimg-preview-area {
                 width: 400px;
                 margin:auto;
                 display:none;
                 height: 200px;
                 border-radius: 22px;
                 overflow: hidden;
                 margin-bottom: 22px;
            }
             .prosimg-preview-area img {
                 width: 100%;
                 object-fit:cover;
            }


  </style>



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

            <div class="main-cards" style="margin-top: 20px;">
                <div class="row g-3">
                    <div class="col-sm-4 col-md-6 col-lg-4">

                        <div class="topSecCards" style="width: 100%; height: 120px;">
                            <div style="border: 2px solid #0066FF; height: 100%; border-radius: 8px; padding: 10px;">
                                <div align="center" style="font-size: 60px; color: #0066FF;">
                                    <i class="fas fa-chalkboard"></i>
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
                                            Total Classes</h6>
                                        <p></p>
                                        <h4 style="margin-left: 10px; color: #ffffff;" id="total_classes"></h4>
                                    </div>
                                    <div class="col-4">
                                        <i class="fas fa-user-graduate text-white" style="font-size:50px;"></i>
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
                                            Total Form Teacher</h6>
                                        <p></p>
                                        <h4 style="margin-left: 10px; color: #ffffff;" id="total_teacher"></h4>
                                    </div>
                                    <div class="col-4">
                                        <i class="fas fa-chalkboard-teacher text-white" style="font-size:50px;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="main-cards" style="margin-top: 50px;">

                <!-- Navbar pills -->
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Nav tabs -->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs mb-3 customtab" id="abba-config" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="config-tab-1" data-bs-toggle="tab"
                                        href="#config-tabs-1" role="tab" aria-controls="config-tabs-1"
                                        aria-selected="true">Classes</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="config-tab-2" data-bs-toggle="tab" href="#config-tabs-2"
                                        role="tab" aria-controls="config-tabs-2" aria-selected="false">Result</a>
                                </li>

                               <li class="nav-item " role="presentation">
                                         <a class="nav-link" id="config-tab-3" data-bs-toggle="tab" href="#config-tabs-3"
                                         role="tab" aria-controls="config-tabs-3" aria-selected="false">Assignment</a>
                                 </li>
                                 
                                 <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="config-tab-4" data-bs-toggle="tab" href="#config-tabs-4"
                                        role="tab" aria-controls="config-tabs-4" aria-selected="false">Class Recording</a>
                                </li>
                                 
                                 
                                 <li class="nav-item" role="presentation">
                                    <a
                                    class="nav-link "
                                    id="config-tab-5"
                                    data-bs-toggle="tab"
                                    href="#config-tabs-5"
                                    role="tab"
                                    aria-controls="config-tabs-5"
                                   aria-selected="true">Computer Based Test (CBT)</a> 
                                </li>
                                
                                
                                <li class="nav-item" role="presentation">
                                    <a
                                    class="nav-link "
                                    id="config-tab-6"
                                    data-bs-toggle="tab"
                                    href="#config-tabs-6"
                                    role="tab"
                                    aria-controls="config-tabs-6"
                                   aria-selected="true">Lesson Note</a> 
                                   
                                </li>
                                
                                
                                <li class="nav-item" role="presentation">
                                    <a
                                    class="nav-link "
                                    id="config-tab-7"
                                    data-bs-toggle="tab"
                                    href="#config-tabs-7"
                                    role="tab"
                                    aria-controls="config-tabs-7"
                                   aria-selected="true">Virtual Class</a> 
                                </li>
                                 
                                  
                                   
                                <!-- <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="config-tab-3" data-bs-toggle="tab" href="#config-tabs-3"
                                        role="tab" aria-controls="config-tabs-3" aria-selected="false">Result Type</a>
                                </li> -->
                            </ul>


                            <div class="tab-content" id="abba-config-content">

                                <div class="tab-pane fade show active" id="config-tabs-1" role="tabpanel"
                                    aria-labelledby="config-tab-1">
                                    <div class="row g-2">
                                        <div class="col-md-12 col-lg-3">
                                            <select style="color: #666666;" class="form-select form-select-sm"
                                                aria-label="form-select-sm example"
                                                id="abba_display_class_student_campus">
                                                <option value="NULL">Select campus</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-12 col-lg-7">

                                        </div>
                                        <div class="col-md-12 col-lg-2">
                                            <button type="button" style="float: right;font-size: 13px;border:none;font-weight:500;"
                                                class="btn btn-sm btn-primary text-light" data-bs-toggle="modal"
                                                data-bs-target="#abba_create_class_Modal"> <i class="fas fa-plus-circle"> Create Class</i></button>
                                        </div>
                                    </div>

                                    <div class="table-responsive card mt-5 p-3" id="abba_display_class_students">

                                    </div>

                                </div>

                                <div class="tab-pane fade" id="config-tabs-2" role="tabpanel"
                                    aria-labelledby="config-tab-2">

                                    <ul class="nav nav-pills mb-3 renceTab gap-1" id="pills-tab" role="tablist">
                                        <li class="nav-item border" role="presentation">
                                            <a href="Javascript:;" class="nav-link active abba_tab_checker_for_summary"
                                                id="pills-result_entry-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-result_entry" type="button" role="tab"
                                                aria-controls="pills-result_entry" aria-selected="true" style="font-size:11px;"><i
                                                    class="fas fa-pencil-alt"></i> Result Entry</a>
                                        </li>
                                        <li class="nav-item border" role="presentation">
                                            <a href="Javascript:;" class="nav-link" id="pills-behavioural-tab" data-bs-toggle="pill" data-bs-target="#pills-behavioural" type="button" role="tab" aria-controls="pills-behavioural" aria-selected="false" style="font-size:11px;"><i class="fa fa-user"></i> Behavioural Assessment</a>
                                        </li>
                                        <li class="nav-item border" role="presentation">
                                            <a href="Javascript:;" class="nav-link"
                                                id="pills-comments-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-comments" type="button" role="tab"
                                                aria-controls="pills-comments" aria-selected="false" style="font-size:11px;"><i
                                                    class="fa fa-paper"></i> Comments</a>
                                        </li>
                                        <li class="nav-item border" role="presentation">
                                            <a href="Javascript:;" class="nav-link"
                                                id="pills-british-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-british" type="button" role="tab"
                                                aria-controls="pills-british" aria-selected="false" style="font-size:11px;"><i class="fas fa-flag"></i> British Result</a>
                                        </li>
                                        <li class="nav-item border" role="presentation">
                                            <a href="Javascript:;" class="nav-link abba_tab_checker_for_summary"
                                                id="pills-broadsheet-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-broadsheet" type="button" role="tab"
                                                aria-controls="pills-broadsheet" aria-selected="false" style="font-size:11px;"><i
                                                    class="fas fa-newspaper"></i> BroadSheet</a>
                                        </li>
                                        <li class="nav-item border" role="presentation">
                                            <a href="Javascript:;" class="nav-link abba_tab_checker_for_summary"
                                                id="pills-view-result-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-view-result" type="button" role="tab"
                                                aria-controls="pills-view-result" aria-selected="false" style="font-size:11px;"><i
                                                    class="fa fa-user"></i> Check Result</a>
                                        </li>
                                        
                                       
                                        <!-- <li class="nav-item border" role="presentation">
                                            <a href="Javascript:;" class="nav-link abba_tab_checker_for_summary" id="pills-parent-tab"
                                                data-bs-toggle="pill" data-bs-target="#pills-parent" type="button"
                                                role="tab" aria-controls="pills-parent" aria-selected="false"><i
                                                    class="fa fa-user"></i> Transcript</a>
                                        </li>
                                        <li class="nav-item border" role="presentation">
                                            <a href="Javascript:;" class="nav-link abba_tab_checker_for_summary"
                                                data-id="parent" data-sumdiv="parent_summary_div" id="pills-parent-tab"
                                                data-bs-toggle="pill" data-bs-target="#pills-parent" type="button"
                                                role="tab" aria-controls="pills-parent" aria-selected="false"><i
                                                    class="fa fa-user"></i> Certificate</a>
                                        </li> -->

                                    </ul>

                                    <div class="tab-content" id="pills-tabContent">

                                        <div class="tab-pane fade show active" id="pills-result_entry" role="tabpanel"
                                            aria-labelledby="pills-student-tab">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body">

                                                            <h6 class="card-title" style="font-size:14px;">Result Computation</h6>

                                                            <div class="row mt-4 g-2">
                                                                <div class="col-md-12 col-lg-2">
                                                                    <select style="color: #666666;"
                                                                        class="form-select form-select-sm"
                                                                        aria-label="form-select-sm example"
                                                                        id="abba_display_class_result_student_campus">
                                                                        <option value="NULL">Select campus</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 col-lg-2">
                                                                    <select style="color: #666666;"
                                                                        class="form-select form-select-sm"
                                                                        aria-label="form-select-sm example"
                                                                        id="abba_display_session">

                                                                        <option value="NULL">Select Session</option>
                                                                        <?php

                                                                        $abba_sql_session = ("SELECT * FROM `session` ORDER BY sessionName DESC");
                                                                        $abba_result_session = mysqli_query($link, $abba_sql_session);
                                                                        $abba_row_session = mysqli_fetch_assoc($abba_result_session);
                                                                        $abba_row_cnt_session = mysqli_num_rows($abba_result_session);

                                                                        if ($abba_row_cnt_session > 0) {
                                                                            do {
                                                                                if ($abba_row_session['sessionStatus'] == '1') {
                                                                                    $abba_selected_session = 'selected';
                                                                                } else {
                                                                                    $abba_selected_session = '';
                                                                                }
                                                                                echo '<option value="' . $abba_row_session['sessionName'] . '" ' . $abba_selected_session . '>' . $abba_row_session['sessionName'] . '</option>';

                                                                            } while ($abba_row_session = mysqli_fetch_assoc($abba_result_session));
                                                                        } else {
                                                                            echo '<option value="0">No Records Found</option>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 col-lg-2">
                                                                    <select style="color: #666666;"
                                                                        class="form-select form-select-sm"
                                                                        aria-label="form-select-sm example"
                                                                        id="abba_result_display_term">
                                                                        <option value="NULL">Select Term</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 col-lg-2">
                                                                    <select style="color: #666666;"
                                                                        class="form-select form-select-sm"
                                                                        aria-label="form-select-sm example"
                                                                        id="abba_display_result_class">
                                                                        <option value="NULL">Select Class</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 col-lg-2">
                                                                    <select style="color: #666666;"
                                                                        class="form-select form-select-sm"
                                                                        aria-label="form-select-sm example"
                                                                        id="abba_display_result_subject">
                                                                        <option value="NULL">Select Subject</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 col-lg-2">
                                                                    <a href="javascript:();" type="button"
                                                                        class="btn btn-primary btn-sm"
                                                                        id="abba_get_student_in_result_sheet"
                                                                        style="width: 100%;">
                                                                        <span style="font-size: 13px;">Load</span>
                                                                    </a>
                                                                </div>
                                                            </div>

                                                            <div class="row mt-4">
                                                                <div class="col-12 mt-3"
                                                                    id="abba_display_student_soresheet">
                                                                    <div align="center">
                                                                        <img src="../../assets/images/adminImg/filter.png"
                                                                            style="width:15%;opacity:0.7;" />
                                                                        <p class="pt-2 fs-6 text-secondary">Please
                                                                            filter to proceed.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>

                                        <div class="tab-pane fade" id="pills-behavioural" role="tabpanel"
                                            aria-labelledby="pills-behavioural-tab">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body">

                                                            <h6 style="font-size:14px;" class="card-title">Behavioural Assessment</h6>

                                                            <div class="row mt-4 g-2">
                                                                <div class="col-md-12 col-lg-2">
                                                                    <select style="color: #666666;"
                                                                        class="form-select form-select-sm"
                                                                        aria-label="form-select-sm example"
                                                                        id="abba_display_class_behavioural_student_campus">
                                                                        <option value="NULL">Select campus</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 col-lg-2">
                                                                    <select style="color: #666666;"
                                                                        class="form-select form-select-sm"
                                                                        aria-label="form-select-sm example"
                                                                        id="abba_display_behavioural_session">

                                                                        <option value="NULL">Select Session</option>
                                                                        <?php

                                                                        $abba_sql_session = ("SELECT * FROM `session` ORDER BY sessionName DESC");
                                                                        $abba_result_session = mysqli_query($link, $abba_sql_session);
                                                                        $abba_row_session = mysqli_fetch_assoc($abba_result_session);
                                                                        $abba_row_cnt_session = mysqli_num_rows($abba_result_session);

                                                                        if ($abba_row_cnt_session > 0) {
                                                                            do {
                                                                                if ($abba_row_session['sessionStatus'] == '1') {
                                                                                    $abba_selected_session = 'selected';
                                                                                } else {
                                                                                    $abba_selected_session = '';
                                                                                }
                                                                                echo '<option value="' . $abba_row_session['sessionName'] . '" ' . $abba_selected_session . '>' . $abba_row_session['sessionName'] . '</option>';

                                                                            } while ($abba_row_session = mysqli_fetch_assoc($abba_result_session));
                                                                        } else {
                                                                            echo '<option value="0">No Records Found</option>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 col-lg-2">
                                                                    <select style="color: #666666;"
                                                                        class="form-select form-select-sm"
                                                                        aria-label="form-select-sm example"
                                                                        id="abba_behavioural_display_term">
                                                                        <option value="NULL">Select Term</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 col-lg-2">
                                                                    <select style="color: #666666;"
                                                                        class="form-select form-select-sm"
                                                                        aria-label="form-select-sm example"
                                                                        id="abba_display_behavioural_class">
                                                                        <option value="NULL">Select Class</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 col-lg-2">
                                                                    
                                                                </div>
                                                                <div class="col-md-12 col-lg-2">
                                                                    <a href="javascript:();" type="button"
                                                                        class="btn btn-primary btn-sm"
                                                                        id="abba_get_student_in_behavioural_sheet"
                                                                        style="width: 100%;">
                                                                        <span style="font-size: 13px;">Load</span>
                                                                    </a>
                                                                </div>
                                                            </div>

                                                            <div class="row mt-4">
                                                                <div class="col-12 mt-3"
                                                                    id="abba_display_student_behavioural">
                                                                    <div align="center">
                                                                        <img src="../../assets/images/adminImg/filter.png"
                                                                            style="width:15%;opacity:0.7;" />
                                                                        <p class="pt-2 fs-6 text-secondary">Please
                                                                            filter to proceed.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="tab-pane fade" id="pills-comments" role="tabpanel"
                                            aria-labelledby="pills-comments-tab">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body">

                                                            <h6 class="card-title" style="font-size:14px;">Comments</h6>

                                                            <div class="row mt-4 g-2">
                                                                <div class="col-md-12 col-lg-2">
                                                                    <select style="color: #666666;"
                                                                        class="form-select form-select-sm"
                                                                        aria-label="form-select-sm example"
                                                                        id="abba_display_comments_student_campus">
                                                                        <option value="NULL">Select campus</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 col-lg-2">
                                                                    <select style="color: #666666;"
                                                                        class="form-select form-select-sm"
                                                                        aria-label="form-select-sm example"
                                                                        id="abba_display_comments_session">

                                                                        <option value="NULL">Select Session</option>
                                                                        <?php

                                                                        $abba_sql_session = ("SELECT * FROM `session` ORDER BY sessionName DESC");
                                                                        $abba_result_session = mysqli_query($link, $abba_sql_session);
                                                                        $abba_row_session = mysqli_fetch_assoc($abba_result_session);
                                                                        $abba_row_cnt_session = mysqli_num_rows($abba_result_session);

                                                                        if ($abba_row_cnt_session > 0) {
                                                                            do {
                                                                                if ($abba_row_session['sessionStatus'] == '1') {
                                                                                    $abba_selected_session = 'selected';
                                                                                } else {
                                                                                    $abba_selected_session = '';
                                                                                }
                                                                                echo '<option value="' . $abba_row_session['sessionName'] . '" ' . $abba_selected_session . '>' . $abba_row_session['sessionName'] . '</option>';

                                                                            } while ($abba_row_session = mysqli_fetch_assoc($abba_result_session));
                                                                        } else {
                                                                            echo '<option value="0">No Records Found</option>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 col-lg-2">
                                                                    <select style="color: #666666;"
                                                                        class="form-select form-select-sm"
                                                                        aria-label="form-select-sm example"
                                                                        id="abba_comments_display_term">
                                                                        <option value="NULL">Select Term</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 col-lg-2">
                                                                    <select style="color: #666666;"
                                                                        class="form-select form-select-sm"
                                                                        aria-label="form-select-sm example"
                                                                        id="abba_comments_display_result_type">
                                                                        <option value="NULL" disabled>Select Result Type</option>
                                                                        <option value="mid-term" >Mid-Term Result</option>
                                                                        <option value="termly" selected>Termly Result</option>
                                                                        <option value="cummulative">Cummulative Result</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 col-lg-2">
                                                                    <select style="color: #666666;"
                                                                        class="form-select form-select-sm"
                                                                        aria-label="form-select-sm example"
                                                                        id="abba_comments_usertype">
                                                                        <option value="NULL">Select UserType</option>
                                                                        <option value="schoolhead">School Head</option>
                                                                        <option value="teacher">Form Teacher</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 col-lg-2">
                                                                    <select style="color: #666666;"
                                                                        class="form-select form-select-sm"
                                                                        aria-label="form-select-sm example"
                                                                        id="abba_comments_staff">
                                                                        <option value="NULL">Select Staff</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 col-lg-8">
                                                                    
                                                                </div>
                                                                
                                                                <div class="col-md-12 col-lg-2">
                                                                    <select style="color: #666666;"
                                                                        class="form-select form-select-sm"
                                                                        aria-label="form-select-sm example"
                                                                        id="abba_display_comments_class">
                                                                        <option value="NULL">Select Class</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 col-lg-2">
                                                                    <a href="javascript:();" type="button"
                                                                        class="btn btn-primary btn-sm"
                                                                        id="abba_get_student_comment_list" style="width:100%;">
                                                                        <span style="font-size: 13px;">Load</span>
                                                                    </a>
                                                                </div>
                                                            </div>

                                                            <div class="row mt-4">
                                                                <div class="col-12 mt-3"
                                                                    id="abba_display_student_comments">
                                                                    <div align="center">
                                                                        <img src="../../assets/images/adminImg/filter.png"
                                                                            style="width:15%;opacity:0.7;" />
                                                                        <p class="pt-2 fs-6 text-secondary">Please filter to proceed.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        
                                        <div class="tab-pane fade" id="pills-british" role="tabpanel"
                                            aria-labelledby="pills-british-tab">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body">

                                                            <h6 class="card-title" style="font-size:14px;">British Result</h6>

                                                            <div class="row mt-4 g-2">
                                                                <div class="col-md-12 col-lg-2">
                                                                    <select style="color: #666666;"
                                                                        class="form-select form-select-sm"
                                                                        aria-label="form-select-sm example"
                                                                        id="abba_display_british_student_campus">
                                                                        <option value="NULL">Select campus</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 col-lg-2">
                                                                    <select style="color: #666666;"
                                                                        class="form-select form-select-sm"
                                                                        aria-label="form-select-sm example"
                                                                        id="abba_display_british_session">

                                                                        <option value="NULL">Select Session</option>
                                                                        <?php

                                                                        $abba_sql_session = ("SELECT * FROM `session` ORDER BY sessionName DESC");
                                                                        $abba_result_session = mysqli_query($link, $abba_sql_session);
                                                                        $abba_row_session = mysqli_fetch_assoc($abba_result_session);
                                                                        $abba_row_cnt_session = mysqli_num_rows($abba_result_session);

                                                                        if ($abba_row_cnt_session > 0) {
                                                                            do {
                                                                                if ($abba_row_session['sessionStatus'] == '1') {
                                                                                    $abba_selected_session = 'selected';
                                                                                } else {
                                                                                    $abba_selected_session = '';
                                                                                }
                                                                                echo '<option value="' . $abba_row_session['sessionName'] . '" ' . $abba_selected_session . '>' . $abba_row_session['sessionName'] . '</option>';

                                                                            } while ($abba_row_session = mysqli_fetch_assoc($abba_result_session));
                                                                        } else {
                                                                            echo '<option value="0">No Records Found</option>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 col-lg-2">
                                                                    <select style="color: #666666;"
                                                                        class="form-select form-select-sm"
                                                                        aria-label="form-select-sm example"
                                                                        id="abba_british_display_term">
                                                                        <option value="NULL">Select Term</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 col-lg-2">
                                                                    <select style="color: #666666;"
                                                                        class="form-select form-select-sm"
                                                                        aria-label="form-select-sm example"
                                                                        id="abba_british_display_result_type">
                                                                        <option value="NULL" disabled>Select Result Type</option>
                                                                        <option value="mid-term" disabled>Mid-Term Result</option>
                                                                        <option value="termly" selected>Termly Result</option>
                                                                        <option value="cummulative" disabled>Cummulative Result</option>
                                                                    </select>
                                                                </div>
                                                                
                                                                <div class="col-md-12 col-lg-2">
                                                                    <select style="color: #666666;"
                                                                        class="form-select form-select-sm"
                                                                        aria-label="form-select-sm example"
                                                                        id="abba_display_british_class">
                                                                        <option value="NULL">Select Class</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 col-lg-2">
                                                                    <a href="javascript:();" type="button"
                                                                        class="btn btn-primary btn-sm"
                                                                        id="abba_get_student_british_list" style="width:100%;">
                                                                        <span style="font-size: 13px;">Load</span>
                                                                    </a>
                                                                </div>
                                                            </div>

                                                            <div class="row mt-4">
                                                                <div class="col-12 mt-3"
                                                                    id="abba_display_student_british">
                                                                    <div align="center">
                                                                        <img src="../../assets/images/adminImg/filter.png"
                                                                            style="width:15%;opacity:0.7;" />
                                                                        <p class="pt-2 fs-6 text-secondary">Please filter to proceed.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        
                                        <div class="tab-pane fade" id="pills-broadsheet" role="tabpanel"
                                            aria-labelledby="pills-broadsheet-tab">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body">

                                                            <h6 class="card-title" style="font-size:14px;">BroadSheet</h6>

                                                            <div class="row mt-4 g-2">
                                                                <div class="col-md-12 col-lg-2">
                                                                    <select style="color: #666666;"
                                                                        class="form-select form-select-sm"
                                                                        aria-label="form-select-sm example"
                                                                        id="abba_display_class_broadsheet_student_campus">
                                                                        <option value="NULL">Select campus</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 col-lg-2">
                                                                    <select style="color: #666666;"
                                                                        class="form-select form-select-sm"
                                                                        aria-label="form-select-sm example"
                                                                        id="abba_display_broadsheet_session">

                                                                        <option value="NULL">Select Session</option>
                                                                        <?php

                                                                        $abba_sql_session = ("SELECT * FROM `session` ORDER BY sessionName DESC");
                                                                        $abba_result_session = mysqli_query($link, $abba_sql_session);
                                                                        $abba_row_session = mysqli_fetch_assoc($abba_result_session);
                                                                        $abba_row_cnt_session = mysqli_num_rows($abba_result_session);

                                                                        if ($abba_row_cnt_session > 0) {
                                                                            do {
                                                                                if ($abba_row_session['sessionStatus'] == '1') {
                                                                                    $abba_selected_session = 'selected';
                                                                                } else {
                                                                                    $abba_selected_session = '';
                                                                                }
                                                                                echo '<option value="' . $abba_row_session['sessionName'] . '" ' . $abba_selected_session . '>' . $abba_row_session['sessionName'] . '</option>';

                                                                            } while ($abba_row_session = mysqli_fetch_assoc($abba_result_session));
                                                                        } else {
                                                                            echo '<option value="0">No Records Found</option>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 col-lg-2">
                                                                    <select style="color: #666666;"
                                                                        class="form-select form-select-sm"
                                                                        aria-label="form-select-sm example"
                                                                        id="abba_broadsheet_display_term">
                                                                        <option value="NULL">Select Term</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 col-lg-2">
                                                                    <select style="color: #666666;"
                                                                        class="form-select form-select-sm"
                                                                        aria-label="form-select-sm example"
                                                                        id="abba_display_broadsheet_class">
                                                                        <option value="NULL">Select Class</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 col-lg-2">

                                                                </div>
                                                                <div class="col-md-12 col-lg-2">
                                                                    <a href="javascript:();" type="button"
                                                                        class="btn btn-primary btn-sm"
                                                                        id="abba_get_student_in_broadsheet_sheet" style="width:100%;">
                                                                        <span style="font-size: 13px;">Load</span>
                                                                    </a>
                                                                </div>
                                                            </div>

                                                            <div class="row mt-4">
                                                                <div class="col-12 mt-3"
                                                                    id="abba_display_student_broadsheet">
                                                                    <div align="center">
                                                                        <img src="../../assets/images/adminImg/filter.png"
                                                                            style="width:15%;opacity:0.7;" />
                                                                        <p class="pt-2 fs-6 text-secondary">Please
                                                                            filter to proceed.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="pills-view-result" role="tabpanel"
                                            aria-labelledby="pills-view-result-tab">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body">

                                                            <h6 class="card-title" style="font-size:14px;">View Result</h6>

                                                            <div class="row mt-4 g-2">
                                                                <div class="col-md-12 col-lg-2">
                                                                    <select style="color: #666666;"
                                                                        class="form-select form-select-sm"
                                                                        aria-label="form-select-sm example"
                                                                        id="abba_display_view-result_student_campus">
                                                                        <option value="NULL">Select campus</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 col-lg-2">
                                                                    <select style="color: #666666;"
                                                                        class="form-select form-select-sm"
                                                                        aria-label="form-select-sm example"
                                                                        id="abba_display_view-result_session">

                                                                        <option value="NULL">Select Session</option>
                                                                        <?php

                                                                        $abba_sql_session = ("SELECT * FROM `session` ORDER BY sessionName DESC");
                                                                        $abba_result_session = mysqli_query($link, $abba_sql_session);
                                                                        $abba_row_session = mysqli_fetch_assoc($abba_result_session);
                                                                        $abba_row_cnt_session = mysqli_num_rows($abba_result_session);

                                                                        if ($abba_row_cnt_session > 0) {
                                                                            do {
                                                                                if ($abba_row_session['sessionStatus'] == '1') {
                                                                                    $abba_selected_session = 'selected';
                                                                                } else {
                                                                                    $abba_selected_session = '';
                                                                                }
                                                                                echo '<option value="' . $abba_row_session['sessionName'] . '" ' . $abba_selected_session . '>' . $abba_row_session['sessionName'] . '</option>';

                                                                            } while ($abba_row_session = mysqli_fetch_assoc($abba_result_session));
                                                                        } else {
                                                                            echo '<option value="0">No Records Found</option>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 col-lg-2">
                                                                    <select style="color: #666666;"
                                                                        class="form-select form-select-sm"
                                                                        aria-label="form-select-sm example"
                                                                        id="abba_view-result_display_term">
                                                                        <option value="NULL">Select Term</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 col-lg-2">
                                                                    <select style="color: #666666;"
                                                                        class="form-select form-select-sm"
                                                                        aria-label="form-select-sm example"
                                                                        id="abba_view_result_display_result_type">
                                                                        <option value="NULL" disabled>Select Result Type</option>
                                                                        <option value="mid-term" >Mid-Term Result</option>
                                                                        <option value="termly" selected>Termly Result</option>
                                                                        <option value="cummulative">Cummulative Result</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 col-lg-2">
                                                                    <select style="color: #666666;"
                                                                        class="form-select form-select-sm"
                                                                        aria-label="form-select-sm example"
                                                                        id="abba_display_view-result_class">
                                                                        <option value="NULL">Select Class</option>
                                                                    </select>
                                                                </div>
                                                                
                                                                <div class="col-md-12 col-lg-2">
                                                                    <a href="javascript:();" type="button"
                                                                        class="btn btn-primary btn-sm"
                                                                        id="abba_get_student_in_view-result_sheet" style="width:100%;">
                                                                        <span style="font-size: 13px;">Load</span>
                                                                    </a>
                                                                </div>
                                                            </div>

                                                            <div class="row mt-4">
                                                                <div class="col-12 mt-3"
                                                                    id="abba_display_student_view-result">
                                                                    <div align="center">
                                                                        <img src="../../assets/images/adminImg/filter.png"
                                                                            style="width:15%;opacity:0.7;" />
                                                                        <p class="pt-2 fs-6 text-secondary">Please filter to proceed.</p>
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
                                 <div class="tab-pane fade " id="config-tabs-3" role="tabpanel"
                                            aria-labelledby="config-tab-3">
                                                 <?php include 'assignment.php'; ?>
                                         </div>
                                     <!-- emma tab for class recording  -->
                                <div class="tab-pane fade" id="config-tabs-4" role="tabpanel" aria-labelledby="config-tab-4">
                                                                    
                                    <div class="row pt-2 display_abba_rs_list">

                                        <div class="col-md-12 col-lg-12">
                                                <button type="button" style="float: right;font-size: 13px;border:none;font-weight:500;"
                                                    class="btn btn-sm btn-primary text-light" data-bs-toggle="modal"
                                                    data-bs-target="#emmaloadrecordcontenthere"> <i class="fas fa-circle"> Record</i></button>
                                        </div>
            
                                        <div class="row g-2 mt-3">
                                            <div class="col-md-6 col-lg-2">
                                                <select style="color: #666666;" class="form-select form-select-sm"
                                                    aria-label="form-select-sm example"
                                                    id="emma_load_campus_for_class_recording">
                                                    <option value="NULL">Select campus</option>
                                                </select>
                                            </div>
    
                                            <div class="col-md-6 col-lg-2">
                                                <select style="color: #666666;" class="form-select form-select-sm"
                                                    aria-label="form-select-sm example"
                                                    id="emma_load_session_for_class_recording">
                                                    <option value="NULL">Select Session</option>
                                                </select>
                                            </div>
    
                                            <div class="col-md-6 col-lg-2">
                                                <select style="color: #666666;" class="form-select form-select-sm"
                                                    aria-label="form-select-sm example"
                                                    id="emma_load_term_for_class_recording">
                                                    <option value="NULL">Select Term</option>
                                                </select>
                                            </div>
    
                                            <div class="col-md-6 col-lg-2">
                                                <select style="color: #666666;" class="form-select form-select-sm"
                                                    aria-label="form-select-sm example"
                                                    id="emma_load_class_for_class_recording">
                                                    <option value="NULL">Select Class</option>
                                                </select>
                                            </div>
    
                                            <div class="col-md-6 col-lg-2">
                                                <select style="color: #666666;" class="form-select form-select-sm"
                                                    aria-label="form-select-sm example"
                                                    id="emma_load_subject_for_class_recording">
                                                    <option value="NULL">Select Subject</option>
                                                </select>
                                            </div>
    
                                            <div class="col-md-12 col-lg-2">
                                                <button type="button" style="float: right;font-size: 13px;border:none;font-weight:500;"
                                                    class="btn btn-sm btn-primary text-light" id="emmaloadclassrecordingvalues" data-bs-toggle="modal"
                                                    data-bs-target="#"> <i class="fas fa-sync-alt"> Load</i></button>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row mt-4">
                                                        <div class="col-12 mt-3" id="emmaloadalltheserecordcontents">
                                                            <div align="center">
                                                                <img src="../../assets/images/adminImg/filter.png" style="width:15%;opacity:0.7;" />
                                                                <p class="pt-2 fs-6 text-secondary">Please
                                                                    filter to proceed.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                     
                                             

                                </div>  
                                
                                
                                  <!--===CBT CONTENT HEREE===-->
                                  
                                     <div class="tab-pane fade " id="config-tabs-5" role="tabpanel"  aria-labelledby="config-tab-5">
                                           

                                                 <ul class="nav nav-pills mb-3 renceTab gap-1" id="pills-tab" role="tablist">

                                                            <li class="nav-item" role="presentation">
                                                                <a href="Javascript:;" class="nav-link active abba_tab_checker_for_summary" data-id="question" id="pills-question-tab" data-bs-toggle="pill" data-bs-target="#pills-question" type="button" role="tab" aria-controls="pills-question" aria-selected="true"><span class="fa fa-question"></span> Question Bank</a>
                                                          </li>



                                                            <li class="nav-item border border-2" role="presentation">
                                                                <button class="nav-link" data-id="cbt-settings" id="pills-cbt-settings-tab" data-bs-toggle="pill" data-bs-target="#pills-cbt-settings" type="button" role="tab" aria-controls="pills-cbt-settings" aria-selected="true"><i class="fa fa-list-alt"></i> Examination</button>
                                                            </li>
                                               </ul>   

                                               
                                                 <div class="tab-content" id="pills-tabContent">

                                                     <div class="tab-pane fade show active" id="pills-question" role="tabpanel" aria-labelledby="pills-question-tab">

                                                        <div class="row g-2">
                                                            <div class="col-lg-2">
                                                                <select style="color: #666666;" class="form-select form-select-sm prosloadcampusforcampusload" aria-label=".form-select-sm example" id="prrosloadcampusforquestiondsiplay">
                                                                    <option selected value="NULL">Select Campus</option>
                                                                </select>
                                                            </div>



                                                            <div class=" col-lg-2">
                                                                        <select style="color: #666666;" class="form-select form-select-sm"
                                                                            aria-label=".form-select-sm example" id="prosloadsessionforviewloadquestion">

                                                                            <option value="NULL">Select Session</option>
                                                                            <?php

                                                                                $abba_sql_session = ("SELECT * FROM `session` ORDER BY sessionName DESC");
                                                                                $abba_result_session = mysqli_query($link, $abba_sql_session);
                                                                                $abba_row_session = mysqli_fetch_assoc($abba_result_session);
                                                                                $abba_row_cnt_session = mysqli_num_rows($abba_result_session);

                                                                                if ($abba_row_cnt_session > 0) {
                                                                                    do {
                                                                                        if ($abba_row_session['sessionStatus'] == '1') {
                                                                                            $abba_selected_session = 'selected';
                                                                                        } else {
                                                                                            $abba_selected_session = '';
                                                                                        }
                                                                                        echo '<option value="' . $abba_row_session['sessionName'] . '" ' . $abba_selected_session . '>' . $abba_row_session['sessionName'] . '</option>';

                                                                                    } while ($abba_row_session = mysqli_fetch_assoc($abba_result_session));
                                                                                } else {
                                                                                    echo '<option value="0">No Records Found</option>';
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                </div>
                                                            
                                                            <div class="col-4 col-lg-4">
                                                                <i class="fa fa-filter btn btn-lg btn-outline-primary" data-bs-toggle="collapse" href="#collapseExample"
                                                                    role="button" aria-expanded="false" aria-controls="collapseExample" style="font-size:12px;"> More
                                                                filter</i> 
                                                            </div>

                                                            <div class="col-lg-2 col-sm-2">
                                                                <button type="button" style="float: right; font-size:12px;" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createQuestionDirect"><span class="fa fa-plus"></span> Add Question</button>
                                                            </div>

                                                        </div>


                                                        <div class="row p-2">
                                                            <div class="collapse" id="collapseExample">
                                                                <div class="row g-2">
                                                                
                                                                    <div class="col-md-12 col-lg-2">
                                                                        <select style="color: #666666;" class="form-select form-select-sm"
                                                                            aria-label=".form-select-sm example" id="prosloadtermforquestiondisplay">
                                                                            <option value="NULL">Select Term</option>
                                                                        </select>
                                                                    </div>
                                                                
                                                                    <div class="col-md-12 col-lg-2">
                                                                        <select style="color: #666666;" class="form-select form-select-sm"
                                                                            aria-label=".form-select-sm example" id="prosloadquestiontypefromthebank">
                                                                            <option value="NULL">Select Question Type</option>

                                                                            <option value="Objective">Objective</option>
                                                                            <option value="Theory">Theory</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-12 col-lg-2">
                                                                        <select style="color: #666666;" class="form-select form-select-sm"
                                                                            aria-label=".form-select-sm example" id="prosloadsectionforquestion">
                                                                            <option value="NULL">Select Section</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-12 col-lg-2">
                                                                        <select style="color: #666666;" class="form-select form-select-sm"
                                                                            aria-label=".form-select-sm example" id="prosgetclassid_load_question">
                                                                            <option value="NULL">Select Class</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-12 col-lg-2">
                                                                        <button type="button"
                                                                            style="font-size: 12px;border:1px solid #007bff;background-color:#fff;color:#007bff;"
                                                                            class="btn btn-sm fw-normal" id="prosloadquestionintobank_btn"><i
                                                                            class="fas fa-circle-notch"></i> Load filter
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <br>
                                                        <div id = "prosloadquestioncontnt_questionprev"> </div>
                                                    
                                                        <div align="center" style="margin-top: 30px;" id="pros-questionpaginationcont"></div>
                                                          
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                           <div class="tab-pane fade" id="pills-cbt-settings" role="tabpanel" aria-labelledby="pills-cbt-settings-tab">

                                                               <!--============SET ASSESMENT CONTENT HERE===============  -->


                                                                  <div class="row mt-4 g-2">
                                                            <div class="col-md-12 col-lg-2">
                                                                <select style="color: #666666;"
                                                                    class="form-select form-select-sm"
                                                                    aria-label="form-select-sm example"
                                                                    id="prosload_campus_forcbtquestion">
                                                                    <option value="NULL">Select campus</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12 col-lg-2">
                                                                <select style="color: #666666;"
                                                                    class="form-select form-select-sm"
                                                                    aria-label="form-select-sm example"
                                                                    id="pros_load_sessionforcbtsetting">

                                                                    <option value="NULL">Select Session</option>
                                                                    <?php

                                                                    $abba_sql_session = ("SELECT * FROM `session` ORDER BY sessionName DESC");
                                                                    $abba_result_session = mysqli_query($link, $abba_sql_session);
                                                                    $abba_row_session = mysqli_fetch_assoc($abba_result_session);
                                                                    $abba_row_cnt_session = mysqli_num_rows($abba_result_session);

                                                                    if ($abba_row_cnt_session > 0) {
                                                                        do {
                                                                            if ($abba_row_session['sessionStatus'] == '1') {
                                                                                $abba_selected_session = 'selected';
                                                                            } else {
                                                                                $abba_selected_session = '';
                                                                            }
                                                                            echo '<option value="' . $abba_row_session['sessionName'] . '" ' . $abba_selected_session . '>' . $abba_row_session['sessionName'] . '</option>';

                                                                        } while ($abba_row_session = mysqli_fetch_assoc($abba_result_session));
                                                                    } else {
                                                                        echo '<option value="0">No Records Found</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12 col-lg-2">
                                                                <select style="color: #666666;"
                                                                    class="form-select form-select-sm"
                                                                    aria-label="form-select-sm example"
                                                                    id="prosload_termfor_cbtsettings">
                                                                    <option value="NULL">Select Term</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12 col-lg-2">
                                                                <select style="color: #666666;"
                                                                    class="form-select form-select-sm"
                                                                    aria-label="form-select-sm example"
                                                                    id="prosload_class_forcbtsettings">
                                                                    <option value="NULL">Select Class</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12 col-lg-2">
                                                                <select style="color: #666666;"
                                                                    class="form-select form-select-sm"
                                                                    aria-label="form-select-sm example"
                                                                    id="prosloadcbt_settingssubject">
                                                                    <option value="NULL">Select Subject</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12 col-lg-2">
                                                                <a href="javascript:();" type="button"
                                                                    class="btn btn-primary btn-sm"
                                                                    id="prosloadcbtsettings_loadbtn"
                                                                    style="width: 100%;">
                                                                    <span style="font-size: 13px;">Load</span>
                                                                </a>
                                                            </div>
                                                        </div> <br>



                                                                 <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <h6 class="card-title">Assesment Settings</h6>
                                                                                
                                                                                <div class="col-12 col-lg-12 col-sm-12">
                                                                                    <a href="javascript:();" type="button"
                                                                                        class="btn btn-primary btn-sm float-end"
                                                                                        data-bs-toggle="modal" data-bs-target="#tari_settings_modal"
                                                                                        id="tari_create_assesement">
                                                                                        <span style="font-size: 12px;">Create Assesement</span>
                                                                                    </a>
                                                                                </div>
                                                                            
                                                                            </div>
                                                                            
                                                                
                                                                          

                                                                            <div class="row mt-4" id="loadAllSettings">
                                                                                
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                <!--============SET ASSESMENT CONTENT HERE===============  -->
                                                           </div>

                                                            
                                                            
                                                       </div>
                                            
                                                                                                    
                                    </div>

                                  
                                   <!--===CBT CONTENT HEREE===-->
                                   
                                   
                                     <!--===LESSON NOTE HEREE===-->
                                       <div class="tab-pane fade " id="config-tabs-6" role="tabpanel"  aria-labelledby="config-tab-6">
    
                                            <div class="row pt-2 display_abba_rs_list">
                                                    <div class="col-md-12 col-lg-12">
                                                            <button type="button" style="float: right;font-size: 13px;border:none;font-weight:500;"
                                                                class="btn btn-sm btn-primary text-light" data-bs-toggle="modal"
                                                                data-bs-target="#prossubmitlessonherecontent"> <i class="fas fa-sticky-note"> Plan Lesson</i>
                                                                </button>
                                                    </div>
                                                </div>
    
                                            <div class="row g-2 mt-3">
                                                <div class="col-md-6 col-lg-2">
                                                    <select style="color: #666666;" class="form-select form-select-sm"
                                                        aria-label="form-select-sm example"
                                                        id="prosloadlesonetecampus">
                                                        <option value="NULL">Select campus</option>
                                                    </select>
                                                </div>
                                              
    
                                                <div class="col-md-6 col-lg-2">
                                                    <select style="color: #666666;" class="form-select form-select-sm"
                                                        aria-label="form-select-sm example"
                                                        id="prosloadsessioncontentlessonnote">
                                                        <option value="NULL">Select Session</option>
                                                    </select>
                                                </div>
        
                                                <div class="col-md-6 col-lg-2">
                                                    <select style="color: #666666;" class="form-select form-select-sm"
                                                        aria-label="form-select-sm example"
                                                        id="prosloadtermforlessonnotecreate">
                                                        <option value="NULL">Select Term</option>
                                                    </select>
                                                </div>
        
                                                <div class="col-md-6 col-lg-2">
                                                    <select style="color: #666666;" class="form-select form-select-sm"
                                                        aria-label="form-select-sm example"
                                                        id="proloadlessonnoteclass">
                                                        <option value="NULL">Select Class</option>
                                                    </select>
                                                </div>
        
                                                <div class="col-md-6 col-lg-2">
                                                   
                                                </div>
        
                                                <div class="col-md-12 col-lg-2">
                                                    <button type="button" style="float: right;font-size: 13px;border:none;font-weight:500;"
                                                        class="btn btn-sm btn-primary text-light" id="prosloadlesssonnotecontentbtn" > <i class="fas fa-sync-alt"> Load</i></button>
                                                </div>
                                            </div>
    
                                            <div class="col-12 mt-3">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row mt-4">
                                                            <div class="col-12 mt-3" id="prosloadlessonnotecontenthree">
    
    
                                                                <div align="center">
                                                                    <img src="../../assets/images/adminImg/filter.png" style="width:15%;opacity:0.7;" />
                                                                    <p class="pt-2 fs-6 text-secondary">Please
                                                                        filter to proceed.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                   
                                   <!--===LESSON NOTE HEREE===-->
                                   
                                   
                                   
                                   
                                   
                                     <!--===LIVE CLASS CONTENET===-->

                                <div class="tab-pane fade " id="config-tabs-7" role="tabpanel"  aria-labelledby="config-tab-7">


                                <div class="row pt-2 ">
                                    <div class="col-md-12 col-lg-12">
                                        <button type="button" style="float: right;font-size: 13px;border:none;font-weight:500;"
                                            class="btn btn-sm btn-primary text-light" data-bs-toggle="modal"
                                            data-bs-target="#prossetvirualclass_modal"> <i class="fas fa-video"> </i> Schedule Now
                                        </button>
                                    </div>
                                </div>


                                   
                                 <!-- LIVE CLASS FILTER CONTENT HERE -->
                                        <div class="row g-2 mt-3">
                                            
                                            <div class="col-md-6 col-lg-2">
                                                <select style="color: #666666;" class="form-select form-select-sm"
                                                    aria-label="form-select-sm example"
                                                    id="prosloadliveclasscampus">
                                                    <option value="NULL">Select campus</option>
                                                </select>
                                            </div>
                                          
                                         
                                            <div class="col-md-6 col-lg-2">
                                                <select style="color: #666666;" class="form-select form-select-sm"
                                                    aria-label="form-select-sm example"
                                                    id="prosloadsessioncontentliveclass">
                                                    <option value="NULL">Select Session</option>
                                                </select>
                                            </div>
                                        
                                            <div class="col-md-6 col-lg-2">
                                                <select style="color: #666666;" class="form-select form-select-sm"
                                                    aria-label="form-select-sm example"
                                                    id="prosloadtermforliveclasscreate">
                                                    <option value="NULL">Select Term</option>
                                                </select>
                                            </div>
                                        
                                         
                                            <div class="col-md-6 col-lg-2">
                                                <select style="color: #666666;" class="form-select form-select-sm"
                                                    aria-label="form-select-sm example"
                                                    id="proloadliveclassclass">
                                                    <option value="NULL">Select Class</option>
                                                </select>
                                            </div>
                                        
                                        
                                        
                                            <div class="col-md-6 col-lg-2">
                                                <select style="color: #666666;" class="form-select form-select-sm"
                                                    aria-label="form-select-sm example"
                                                    id="proloadliveclasssubject">
                                                    <option value="NULL">Select Subject</option>
                                                </select>
                                            </div>
                                        
                                            <!-- <div class="col-md-6 col-lg-2">
                                               
                                            </div> -->
                                        
                                            <div class="col-md-12 col-lg-2">
                                                <button type="button" style="float: right;font-size: 13px;border:none;font-weight:500;"
                                                    class="btn btn-sm btn-primary text-light" id="prosload_liveclass_content_btn" > <i class="fas fa-sync-alt"> Load</i></button>
                                            </div>
                                        </div>
                                        <!-- LIVE CLASS FILTER CONTENT HERE -->




                                    <div class="row ">
                                        <div class="col-12 mt-3">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row mt-4">
                                                            <div class="col-12 mt-3" id="prosload_class_content">


                                                                <div align="center">
                                                                    <img src="../../assets/images/adminImg/filter.png" style="width:15%;opacity:0.7;" />
                                                                    <p class="pt-2 fs-6 text-secondary">Please
                                                                        filter to proceed.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                   </div>

                                <!--===LIVE CLASS CONTENET===-->
                                   
                                  
                                  
                                         
                            </div>
                        </div>
                        <!-- <div class="tab-pane fade" id="config-tabs-3" role="tabpanel" aria-labelledby="config-tab-3">
                                    <div class="row pt-2 display_abba_rs_list">
                                        
                                    </div>
                                </div> -->
                    </div>
                </div>
            </div>
        </main>
    </div>


    <!-- Edit Form Teacher/Grading Method/Result -->
    <div class="modal fade modalshow modalfade" id="abba_acad_class_Modal" tabindex="-1"
        aria-labelledby="abba_acad_class_ModalLabel" aria-hidden="true">
        <div class="modal-dialog dialogcontent modal-dialog-scrollable"
            style="border-top-left-radius: 20px; width: 100%;">
            <div class="modal-content modalcontent" style="background-color:#ffffff; ">

                <div class="modal-header">
                    <h5 class="modal-title text-primary"><i class="fa fa-pen" id="abba_dis_title"> </i>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mt-2">
                        <div class="col-sm-12" id="abba_show_acad_class_edit">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm bg-light text-primary mt-2 rounded-3 btn-outline-primary"
                        data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"> Close</i></button>
                    <button type="button"
                        class="btn btn-sm text-white mt-2 rounded-3 bg-primary abba-class-stud-submit-button"> <i
                            class="fas fa"> Submit</i> <i class="fas fa-angle-right"> </i></button>
                </div>
            </div>
        </div>
    </div>

    <!-- delete student modal -->
    <div class="modal fade" id="abba_class_stud_del_modal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="abba_class_stud_del_modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="abba_class_stud_del_modalLabel"><i class="fas fa-trash-alt">
                            Delete Student(s)</i></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" align="center">
                    <span class="btn btn-sm btn-icon" style="background-color:#facaca;border-radius:50%;">
                        <h2><i class="fas fa-trash-alt text-danger" style="padding:10px;"></i></h2>
                    </span><br>
                    <span style="font-size:15px;">Are you sure you want to delete the selected student(s)?</span>
                    <div id="abba_student_delete_success_msg">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i
                            class="fas fa-times"> Close</i></button>
                    <button type="button" class="btn btn-danger btn-sm" id="abba_proceed_to_delete_student"><i
                            class="fas fa-trash-alt"> Yes Delete</i></button>
                </div>
            </div>
        </div>
    </div>

    <div id="abba_update_student_image_modal" class="modal" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Student Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-12 col-lg-12 p-2">
                            <input type="hidden" id="abba_store_student_id_for_image">

                            <input type="hidden" id="abba_store_campus_id_for_image">

                            <input type="hidden" id="abba_get_student_image_class_input">
                            <div id="abba_student_demo_image"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"
                        aria-label="Close">Cancel</button>
                    <button class="btn btn-success abba_crop_student_image btn-sm"> Submit </button>
                </div>
            </div>
        </div>
    </div>

    <!--==== addToSheetModalOpen==== -->
    <div class="modal fade" id="addToSheetModalOpen" tabindex="-1" aria-labelledby="addToSheetModalOpenLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addToSheetModalLabel">Add To Score Sheet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="hiddensheetinput">
                    <div id="LoadStudentForAddToScoreSheet"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fa fa-times"> Close</i></button>
                    <button type="button" class="btn btn-primary btn-sm" id="addToScoreSheetBtn"><i class="fa fa-plus"> Add <span class="abba_sheet_student_total_selected"></span> Student(s)</i></button>
                </div>
            </div>
        </div>
    </div>

    <!--==== clearScoreSheetModalOpen==== -->
    <div class="modal fade" id="clearScoreSheetModalOpen" tabindex="-1" aria-labelledby="clearScoreSheetModalOpenLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Clear Records</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div align="center"><h6>Are you sure?</h6><p><div><i class="fa fa-times fa-lg text-danger" style="font-size:56px"></i></div><p>Do you want to clear this sheet? This process cannot be reversed.</p></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i
                            class="fa fa-times">
                            Close</i></button>
                    <button type="button" class="btn btn-danger btn-sm" id="clearScoreSheetBtn"><i class="fa fa-trash">Clear List</i></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delet Single-->
    <div class="modal fade" id="delScoreModal" tabindex="-1" aria-labelledby="delScoreModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Clear Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="displayScoreDelMsg"> </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i
                            class="fa fa-times"> Close</i></button>
                    <button type="button" class="btn btn-danger btn-sm ProcToDelSelScore"><i class="fa fa-trash"> Yes!
                            Delete</i></button>
                </div>
            </div>
        </div>
    </div>

    <!-- abba_show_result_bulk_upload_modal-->
    <div class="modal fade" id="abba_show_result_bulk_upload_modal" tabindex="-1"
        aria-labelledby="abba_show_result_bulk_upload_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bulk Upload</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12" style="border-right:1px solid lightgrey;">
                            <div class="row">
                                <div class="col-lg-12" align="center">
                                    <div class="alert alert-info errormsg" role="alert">
                                        <small> Firstly you will need to download a list of student offering this
                                            subject in your class. Click on the <b>"<i class="fas fa-download"
                                                    style="font-size:12px;"> Click to download class list</i>"</b> to
                                            get list</small>
                                    </div>
                                    <button type="button" class="btn btn-sm mt-2 rounded-3 btn-outline-primary downloadbtn-student-list" style="width:80%;"><i class="fas fa-download" style="font-size:12px;"> Click to download class list</i></button>
                                </div>
                            </div>

                            <!-- <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div class="alert alert-primary" role="alert">
                                        <small> After the download, open the file that was downloaded, you'll see the list of your students and a column for each C.A offered in your school. Enter the score for each student respectively and save the file.</small>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div class="alert alert-success" role="alert">
                                        <small> After it has been saved, click on the <b>"Click on me to choose a file"</b> and select the file you saved and then click on <b>"<i class="fas fa-cloud-upload-alt" style="font-size:12px;"> Upload</i>"</b>.</small>
                                    </div>
                                    
                                </div>
                            </div> -->
                        </div>

                        <div class="col-12">
                            <div class="row mt-3 p-3" style="">
                                <div class="col-lg-12 shadow" align="center"
                                    style="height:25vh;display: flex; justify-content: center; align-items: center; margin: 0;background-color:#cfe6fc;border-radius:10px;">
                                    <input type="file" name="file-5[]" id="file-5"
                                        class="abba-inputfile abba-inputfile-4" style="display:none;" />
                                    <label for="file-5">
                                        <i class="fas fa-upload fa-2x icon-color"></i><br>
                                        <span style="font-size:12px;">Click on me to choose a file</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-md" data-bs-dismiss="modal"><i
                            class="fa fa-times" style="font-size:14px;"> Close</i></button>
                    <button type="button" class="btn btn-primary btn-md abba_proceed_to_upload_score"><i
                            class="fas fa-cloud-upload-alt" style="font-size:14px;"> Upload</i></button>
                </div>
            </div>
        </div>
    </div>

    
    <!-- create class -->
    <div class="modal fade modalshow modalfade" id="abba_create_class_Modal" tabindex="-1"
        aria-labelledby="abba_create_class_ModalLabel" aria-hidden="true">
        <div class="modal-dialog dialogcontent modal-dialog-scrollable" style="border-top-left-radius: 20px; width: 100%;">
            <div class="modal-content modalcontent" style="background-color:#ffffff; ">

                <div class="modal-header">
                    <h5 class="modal-title text-primary">
                        <i class="fas fa-plus-circle"> Create Class</i>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div style="position: fixed; margin-left: -10px; margin-top: -30px;">
                        
                    </div>
                    <div class="row pt-4">
                        <div class="col-12 col-sm-12">
                            <div class="form-group abba_local-forms">
                                <label>Campus<span style="color:orangered;">*</span> </label>
                                <select class="form-control" id="abba_display_campus_for_create_class">
                                    <option value="0">Select Campus</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12">
                            <div class="form-group abba_local-forms">
                                <label>Section<span style="color:orangered;">*</span> </label>
                                <select class="form-control" id="abba_display_section_for_create_class">
                                    <option value="0">Select Section</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12">
                            <div class="form-group abba_local-forms">
                                <label>Class Type<span style="color:orangered;">*</span> </label>
                                <select class="form-control" id="abba_display_class_for_create_class">
                                    <option value="0">Select Class Type</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 hideappend" style="display:none;">
                            <div id="formtoappend">
                                <div class="row">
                                    
                                    <div class="col-11">
                                        <div class="form-group abba_local-forms">
                                            <label>Class Name</label>
                                            <input type="text" class="form-control new_class_name" placeholder="Class Name"/> 
                                        </div>
                                    </div>

                                    <div class="col-1 removeappendform">
                                        <i class="fa fa-trash fs-6 text-danger mt-4" style="cursor:pointer;"></i>
                                    </div>
                                </div>
                            </div>

                            <a href="#" class="float-end text-primary" id="appendform" style="text-decoration:underline; margin-bottom:5px;" type="button"><i class="fa fa-plus"></i>Add Class</a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fas fa-times"> Close</i></button>
                    <button type="button" class="btn btn-primary btn-sm" id="abba_proceed_to_create_class"> 
                        <i class="fa fa-plus"> Create</i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- create subject -->
    <div class="modal fade modalshow modalfade" id="abba_create_subject_Modal" tabindex="-1"
        aria-labelledby="abba_create_class_ModalLabel" aria-hidden="true">
        <div class="modal-dialog dialogcontent modal-dialog-scrollable" style="border-top-left-radius: 20px; width: 100%;">
            <div class="modal-content modalcontent" style="background-color:#ffffff; ">

                <div class="modal-header">
                    <h5 class="modal-title text-primary">
                        <i class="fas fa-plus-circle"> Add/Remove subject for class</i>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div style="position: fixed; margin-left: -10px; margin-top: -30px;">
                        
                    </div>
                    <div class="row pt-4">

                        <input type="hidden" id="sub_class_holder">
                        <input type="hidden" id="sub_camp_holder">
                        <input type="hidden" id="sub_class_temp_holder">
                        <div class="col-12 col-sm-12" id="display_subjects_to_assign">
                            
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer" id="change_create_btn">
                    <!--<span style="margin-left:-50px;">kjdkfs</span>-->
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fas fa-times"> Close</i></button>
                    <button type="button" class="btn btn-primary btn-sm" id="abba_proceed_to_create_subject"> 
                        <i class="fas fa"> Save Changes</i> <i class="fas fa-angle-right"> </i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delet Single class-->
    <div class="modal fade" id="delClassModal" tabindex="-1" aria-labelledby="delClassModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel"><i class="fa fa-trash"> Delete Class</i></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 align="center">
                        Are you sure you want to delete this class?<br><br>
                        <span class="text-danger">Note that all details concerning this class will be deleted as well.</span>
                        
                        <input type="hidden" id="delete_class_id">
                        <input type="hidden" id="delete_class_camp">
                    </h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i
                            class="fa fa-times"> Close</i></button>
                    <button type="button" class="btn btn-danger btn-sm ProcToDelclass"><i class="fa fa-trash"> Yes!
                            Delete</i></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit class -->
    <div class="modal fade modalshow modalfade" id="abba_edit_class_Modal" tabindex="-1"
        aria-labelledby="abba_edit_class_ModalLabel" aria-hidden="true">
        <div class="modal-dialog dialogcontent modal-dialog-scrollable" style="border-top-left-radius: 20px; width: 100%;">
            <div class="modal-content modalcontent" style="background-color:#ffffff; ">

                <div class="modal-header">
                    <h5 class="modal-title text-primary"><i class="fa fa-pen"> Edit Class Name</i>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mt-2">
                        <div class="col-sm-12">
                            <div class="form-group abba_local-forms">
                                <label>Class Name</label>
                                <input type="text" class="form-control new_class_name_edit" placeholder="Class Name"/>

                                <input type="hidden" id="edit_class_id"/> 
                                <input type="hidden" id="edit_campus_id"/> 
                                <input type="hidden" id="edit_class_input"/> 
                                <input type="hidden" id="edit_class_span"/> 
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm bg-light text-primary mt-2 rounded-3 btn-outline-primary"
                        data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"> Close</i></button>
                    <button type="button"
                        class="btn btn-sm text-white mt-2 rounded-3 bg-primary abba-class-edit-submit-button"> <i
                            class="fas fa"> Submit</i> <i class="fas fa-angle-right"> </i></button>
                </div>
            </div>
        </div>
    </div>


    <!-- Delet Single class-->
    <div class="modal fade" id="abba_add_class_subject_template_Modal" tabindex="-1" aria-labelledby="abba_add_class_subject_template_ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalLabel"><i class="fa fa-plus"> Add Subject</i></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="display_class_template_final">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fa fa-times"> Close</i></button>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal"><i class="fas fa-save"> Save</i></button>
                </div>
            </div>
        </div>
    </div>







    
    
    
    <?php include 'prosload-assignment-modal.php'; ?>
    
    
     <!-- emma modal to view class recording  -->
            
    <div class="modal fade" id="emmaloadrecordcontenthere" tabindex="-1" aria-labelledby="emmaloadrecordcontenthereLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            
            <div class="modal-content">
                
                    <div class="modal-header">
                        <h5 class="modal-title text-primary" id="exampleModalLabel"><i class="fas fa-circle"></i> Recordings</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
            
               
                   <div class="modal-body">
                        <div class="row">
    
                            <div class="col">
                                <select style="color: #666666;" class="form-select form-select-sm"
                                    aria-label="form-select-sm example"
                                    id="emma_load_campus_for_class_recordingmodal">
                                    <option value="NULL">Select campus</option>
                                </select>
                            </div>
    
                            <div class="col">
                                <select style="color: #666666;" class="form-select form-select-sm"
                                    aria-label="form-select-sm example"
                                    id="emma_load_session_for_class_recordingmodal">
                                    <option value="NULL">Select Session</option>
                                </select>
                            </div>
    
                            <div class="col">
                                <select style="color: #666666;" class="form-select form-select-sm"
                                    aria-label="form-select-sm example"
                                    id="emma_load_term_for_class_recordingmodal">
                                    <option value="NULL">Select Term</option>
                                </select>
                            </div>
    
                            <div class="col">
                                <select style="color: #666666;" class="form-select form-select-sm"
                                    aria-label="form-select-sm example"
                                    id="emma_load_class_for_class_recordingmodal">
                                    <option value="NULL">Select Class</option>
                                </select>
                            </div>
    
                            <div class="col">
                                <select style="color: #666666;" class="form-select form-select-sm"
                                    aria-label="form-select-sm example"
                                    id="emma_load_subject_for_class_recordingmodal">
                                    <option value="NULL">Select Subject</option>
                                </select>
                            </div>
                        </div>
                        
                    
                       <div class="table-responsive card mt-5 p-3" id="">
                    <div align="center"style=" padding: 20px;">
                        <audio id="audioPlayer-Chi" controls></audio>
                        <span id="duration" style="float: right; margin-right:10px; color:red;"></span>
                        <div style="margin-top: 20px;">
                            <button class="soundBTN" id="startRecordingButton">Start Recording</button>
                            <button class="soundBTN" id="stopRecordingButton" disabled>Stop Recording</button>
                        </div>
                    </div>
                </div>
                
                   </div>
                  
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            
            </div>
            
        </div>
    </div>
    
    
    
    
    
    
      
    
       <!-- emma modal to view class recording  -->
            
    <div class="modal fade" id="emmaloadrecordcontenthere" tabindex="-1" aria-labelledby="emmaloadrecordcontenthereLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel"><i class="fas fa-circle"></i> Recordings</h5>
                <button type="button" class="btn-close emmacloseicon" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
                <!-- <div class="emmaloadalltheserecordcontents"></div> -->
                <div class="modal-body">
                        <div class="row">
    
                            <div class="col">
                                <select style="color: #666666;" class="form-select form-select-sm"
                                    aria-label="form-select-sm example"
                                    id="emma_load_campus_for_class_recordingmodal">
                                    <option value="NULL">Select campus</option>
                                </select>
                            </div>
    
                            <div class="col">
                                <select style="color: #666666;" class="form-select form-select-sm"
                                    aria-label="form-select-sm example"
                                    id="emma_load_session_for_class_recordingmodal">
                                    <option value="NULL">Select Session</option>
                                </select>
                            </div>
    
                            <div class="col">
                                <select style="color: #666666;" class="form-select form-select-sm"
                                    aria-label="form-select-sm example"
                                    id="emma_load_term_for_class_recordingmodal">
                                    <option value="NULL">Select Term</option>
                                </select>
                            </div>
    
                            <div class="col">
                                <select style="color: #666666;" class="form-select form-select-sm"
                                    aria-label="form-select-sm example"
                                    id="emma_load_class_for_class_recordingmodal">
                                    <option value="NULL">Select Class</option>
                                </select>
                            </div>
    
                            <div class="col">
                                <select style="color: #666666;" class="form-select form-select-sm"
                                    aria-label="form-select-sm example"
                                    id="emma_load_subject_for_class_recordingmodal">
                                    <option value="NULL">Select Subject</option>
                                </select>
                            </div>
                        </div>
                        
                    <div class="table-responsive card mt-5 p-3" id="">
                        <div align="center"style=" padding: 20px;">
                            <audio id="audioPlayer-Chi" controls></audio>
                            <span id="duration" style="float: right; margin-right:10px; color:red;"></span>
                            <div style="margin-top: 20px;">
                                <button class="soundBTN" id="startRecordingButton">Start Recording</button>
                                <button class="soundBTN" id="stopRecordingButton" disabled>Stop Recording</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary emmaclosemodalforrecordings" data-bs-dismiss="modal">Close</button>
                    </div>
                    
                 </div>
            
            </div>
        </div>
    </div>
    <!-- emma modal to view class recording  -->
    
  



    <div class="modal fade" id="britishModal" tabindex="-1" aria-labelledby="britishModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">British Result</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
                <div class="display_british_fields"></div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary upload_students"><i class="fas fa-save"></i> Save</button>
                </div>
            </div>
        </div>
    </div>
    
     <?php include 'prossetmodalcontent-forquestion.php'; ?>
       <?php include 'prosloadlessonnotecontentheremodal.php'; ?>
        <?php include 'prosload-liveclass-modalcontent.php'; ?>
   
    <!--Script-->
    <!--jquery knob -->
    <script src="../../assets/plugins/knob/jquery.knob.js"></script>

    <script>
        $(function () {
            $('[data-plugin="knob"]').knob();
        });

        // $(window).on('load', function() {
        //     // When the window finishes loading, hide the preloader
        //     $('.preloader').fadeOut('slow');
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
    
    
     <script src="../../js/app_js/printtables/waves.js"></script>
    <script src="../../js/app_js/printtables/jspdf.debug.js"></script>
    <script src="../../js/app_js/printtables/html2canvas.min.js"></script>
    <script src="../../js/app_js/printtables/html2pdf.min.js"></script>

    <script src="../../js/admin_js/adminScript.js"></script>
    <!-- current page js -->
    <?php include('../../js/current_page.php'); ?>

    <!-- academic class js -->
    <script src="../../controller/js/app/academic-class.js"></script>
   <script src="../../controller\js\app\emma_class_recording.js"></script>


    <!-- image cropper js -->
    <script src="../../assets/plugins/Croppie/croppie.js"></script>
    <script src="../../assets/plugins/Croppie/croppie.min.js"></script>
    
    
    <script>
        'use strict';

        ; (function (document, window, index) {
            var inputs = document.querySelectorAll('.abba-inputfile');
            Array.prototype.forEach.call(inputs, function (input) {
                var label = input.nextElementSibling,
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
    
         <script src='../../controller/js/app/assignment.js'></script>
     
     
       <!-- Question Direst Wizard Script -->
          <?php include('../../controller/js/app/question_direct.php'); ?>

            <!-- Question Bank Wizard Script -->
            <?php include('../../controller/js/app/question_bank_wizard.php'); ?>
            
            <?php include('../../controller/js/app/question_settings.php'); ?>
               <?php include('../../controller/js/app/prosuploadlessonnote.php'); ?>
                 <?php include('../../controller/js/app/prosvirtual_classjs.php'); ?>
</body>

</html>