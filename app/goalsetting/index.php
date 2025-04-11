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

    <!-- Animate.css CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        integrity="sha512-..." crossorigin="anonymous" />

    <!-- style sheet -->
    <link rel="stylesheet" href="../../css/app_css/appStyle.css">

    <!-- notification css-->
    <link href="../../assets/plugins/notify/wnoty.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    
    
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

    .border {
    border: 1px solid #ccc;
    padding: 10px;
    margin: 10px;
    }

    .text-danger {
    color: red;
    cursor: pointer;
    }

    /* This css is for normalizing styles. You can skip this. */
    *, *:before, *:after {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    }

  .checkbox-wrapper-40 {
    --borderColor: #48c;
    --borderWidth: .125em;
  }

  .checkbox-wrapper-40 label {
    display: block;
    max-width: 100%;
    margin: 0 auto;
  }

  .checkbox-wrapper-40 input[type=checkbox] {
    -webkit-appearance: none;
    appearance: none;
    vertical-align: middle;
    background: #fff;
    font-size: 1.8em;
    border-radius: 0.125em;
    display: inline-block;
    border: var(--borderWidth) solid var(--borderColor);
    width: 1em;
    height: 1em;
    position: relative;
  }
  .checkbox-wrapper-40 input[type=checkbox]:before,
  .checkbox-wrapper-40 input[type=checkbox]:after {
    content: "";
    position: absolute;
    background: var(--borderColor);
    width: calc(var(--borderWidth) * 3);
    height: var(--borderWidth);
    top: 50%;
    left: 10%;
    transform-origin: left center;
  }
  .checkbox-wrapper-40 input[type=checkbox]:before {
    transform: rotate(45deg) translate(calc(var(--borderWidth) / -2), calc(var(--borderWidth) / -2)) scaleX(0);
    transition: transform 200ms ease-in 200ms;
  }
  .checkbox-wrapper-40 input[type=checkbox]:after {
    width: calc(var(--borderWidth) * 5);
    transform: rotate(-45deg) translateY(calc(var(--borderWidth) * 2)) scaleX(0);
    transform-origin: left center;
    transition: transform 200ms ease-in;
  }
  .checkbox-wrapper-40 input[type=checkbox]:checked:before {
    transform: rotate(45deg) translate(calc(var(--borderWidth) / -2), calc(var(--borderWidth) / -2)) scaleX(1);
    transition: transform 200ms ease-in;
  }
  .checkbox-wrapper-40 input[type=checkbox]:checked:after {
    width: calc(var(--borderWidth) * 5);
    transform: rotate(-45deg) translateY(calc(var(--borderWidth) * 2)) scaleX(1);
    transition: transform 200ms ease-out 200ms;
  }
  .checkbox-wrapper-40 input[type=checkbox]:focus {
    outline: calc(var(--borderWidth) / 2) dotted rgba(0, 0, 0, 0.25);
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
            <div class="row mt-5">
                <div class="col-md-12 col-lg-3 mt-2">
                    <select style="color: #666666;" class="form-select form-select-sm"
                        aria-label="form-select-sm example"
                        id="emma_load_campus_for_goals">
                        <option value="NULL">Select Campus</option>
                    </select>
                </div>

                <div class="col-md-12 col-lg-12">
                    <button type="button" style="float: right;font-size: 13px;border:none;font-weight:500;"
                        class="btn btn-sm btn-primary set_goal text-light" id="" data-bs-toggle="modal"
                        data-bs-target="#getstartedmodalforgoal"> <i class="fas fa-bullseye"> Set Goal</i>
                    </button>
                </div>
            </div>

            <div class="emmaloadallgoalscard"></div>
            <input type="hidden" class="emmaloadgoalid">
        </main>

        <!-- modals -->

         <!-- Set Vision  -->
            <div class="modal fade center" id="emmasetvision" aria-hidden="true" aria-labelledby="emmasetvisionLabel" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-primary"><i class="fas fa-eye"> Set Vision</i></h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="form-group abba_local-forms">
                                <textarea class="form-control mymce textareaforvision" placeholder="What's your vision?" id=""></textarea>
                                <label for="floatingTextarea" class="fw-bolder">What's your vision?</label>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-primary visionbutton" data-bs-toggle="modal" data-bs-target="#">Next</button>
                        </div>
                    </div>
                </div>
            </div>

        <!-- create modal  -->

        <div class="modal fade center" id="filtermodalforsettinggoal" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="addItemsModalLabel2" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary" id="exampleModalToggleLabel2"><i class="fas fa-arrow-left fs-6 text-primary" style="cursor:pointer;"  data-bs-toggle="modal" data-bs-target="#emmasetvision" data-bs-dismiss="modal"> Back</i></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div style=" margin: 20px 25px 0 25px;">

                        <div class="col-12 mb-2">
                            <div class="form-floating">
                                <select class="form-select emmaloadcampusforgoalsetting" style="font-size: 13px; height: 50px;border: none; border-bottom: #b3b3b3 solid 1px;" id="floatingSelect" aria-label="Floating label select example">
                                <option  selected>Select Campus</option>
                                
                                </select>
                                <label for="floatingSelect">Select Campus</label>
                            </div>
                        </div>
                            <div class="border mt-4 emmatitleandamountforgoal" style="border-radius:3px;">

                                <div class="col-12 mb-2">
                                    <div class="form-floating ">
                                        <select class="form-select emmanumberofyears" style="font-size: 13px; height: 50px;border: none; border-bottom: #b3b3b3 solid 1px;" id="floatingSelect" aria-label="Floating label select example">
                                            <option value="NULL" selected>No. of Years</option>
                                            <option value="1"> 1 </option>
                                            <option value="2"> 2 </option>
                                            <option value="3"> 3 </option>
                                            <option value="4"> 4 </option>
                                            <option value="5"> 5 </option>
                                            <option value="6"> 6 </option>
                                            <option value="7"> 7 </option>
                                            <option value="8"> 8 </option>
                                            <option value="9"> 9 </option>
                                            <option value="10"> 10 </option>
                                        </select>
                                        <label for="floatingSelect">No. of Years</label>
                                    </div>
                                </div>

                                <div class="col-12 mb-2 ps-2 pe-2 mt-3">
                                    <div class="abba_local-forms">
                                        <label>Goal Title<span style="color:orangered;">*</span></label>
                                        <input type="text" class="form-control emma_title_for_goal" id="" placeholder="Goal Title">
                                    </div>
                                </div>
                                
                                <div class="col-12 mb-2 ps-2 pe-2">
                                    <div class="abba_local-forms  mt-4">
                                        <label>Goal Amount<span style="color:orangered;">*</span></label>
                                        <input type="number" class="form-control emma_amount_for_goal" id="" placeholder="Goal Amount">
                                    </div>
                                </div>

                                <div class="col-12 mb-2 ps-2 pe-2">
                                    <div class="abba_local-forms mt-4">
                                        <label>Upload Goal Image(optional)<span style="color:orangered;">*</span></label>
                                        <input type="file" class="form-control pb-3 pt-3 ps-4 emma_goalsetting_image" id="" placeholder="Upload Image (optional)" data-id="1" accept="image/jpeg, image/jpg, image/png, image/JPG, image/JPEG, image/PNG">
                                    </div>
                                </div>

                                <input type="hidden" class="emmagoalimageinput" value="1">

                                <textarea hidden="hidden" class="emma_keepgoalimage emmaloadgoalimage1"></textarea>
                            </div>

                            <div class="loadaddnewcardhere"></div>

                            <small class="float-end emma_add_new_goal" style="color:#007ffb; cursor:pointer;">Add New <i class="fas fa-plus-circle"></i></small>
                        </div>
                    </div>

                    <div class="modal-footer mt-4">
                        <button class="btn btn-sm btn-primary emmasubmitgoalbutton" data-bs-target="#" data-bs-toggle="modal" data-bs-dismiss="" >Submit</button>
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- edit goal  -->
        <div class="modal fade center" id="editgoal" tabindex="-1" aria-labelledby="editgoalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary" id=""><i class="fas fa-edit"> Edit Goal</i></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" class="loadeditdataid">
                        <textarea hidden="hidden" id="emmaeditgoalimage"></textarea>

                        <div class="">
                            <div align="end">
                                <div class="fw-bold"></div>
                                <div class="fw-bold"></div>
                            </div>
                        </div>

                        <div class="form-group abba_local-forms">
                            <textarea class="form-control mymce" placeholder="What's your vision?" id="edittextareaforvision"></textarea>
                            <label for="floatingTextarea" class="fw-bolder">What's your vision?</label>
                        </div>

                        <div class="abba_local-forms  mt-4">
                            <label>No. of years<span style="color:orangered;">*</span></label>
                            <input type="text" class="form-control" id="emmaeditgoalyears">
                        </div>

                        <div class="abba_local-forms  mt-4">
                            <label>Goal Title<span style="color:orangered;">*</span></label>
                            <input type="text" class="form-control" id="emmaeditgoaltitle">
                        </div>

                        <div class="abba_local-forms  mt-4">
                            <label>Goal Amount<span style="color:orangered;">*</span></label>
                            <input type="number" class="form-control" id="emmaeditgoalamount">
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary edit_next" data-bs-toggle="modal" data-bs-target="#editgoaltwo" data-bs-dismiss="modal"> Next</i></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- edit modal 2  -->
        <div class="modal fade center" id="editgoaltwo" tabindex="-1" aria-labelledby="editgoalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary" id="" data-bs-toggle="modal" data-bs-target="#editgoal" data-bs-dismiss="modal"><i class="fas fa-arrow-left fs-6 text-primary" style="cursor:pointer;"> Back</i></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="loadgoalmodaleditcontent"></div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary edit_next_two"><i class="fas fa-edit"> Update</i></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- view goal modal  -->
        <div class="modal fade center" id="emmaviewgoal" tabindex="-1" aria-labelledby="editgoalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary" id="" data-bs-toggle="modal" data-bs-target="#" data-bs-dismiss="modal"><i class="fas fa-bullseye fs-6 text-primary" style="cursor:pointer;"> View Goals</i></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body" id="print_view_modal">
                        <div class="visionboard" align="center">
                            <h4 style="font-family: Roboto sans-serif;"> Vision Board </h4>
                        </div>
                        <div class="emma_load_goal_view_contents"></div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary emma_print_on_view_modal"><i class="fas fa-print"> Print</i></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- review goal modal  -->
        <div class="modal fade center" id="emmareviewgoals" tabindex="-1" aria-labelledby="editgoalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary" id="" data-bs-toggle="modal" data-bs-target="#" data-bs-dismiss="modal"><i class="fas fa-star fs-5 text-primary" style="cursor:pointer;"> Review Goals</i></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" class="loadreviewid">
                        <div class="visionboard" align="center">
                            <h4 style="font-family: Roboto sans-serif;"> Vision Board </h4>
                        </div>
                        <div class="emma_load_goal_review_contents"></div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary save_reviews_for_goal"><i class="fas fa-save"> Save</i></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- delete goal modal  -->
        <div class="modal fade" id="deletegoal" tabindex="-1" aria-labelledby="deletegoalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id=""><i class="fas fa-trash"> Delete Goal</i></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    
                        <input type="hidden" class="reviewdataid">
                        <input type="hidden" class="reviewdatacampus">

                        <div align="center" class="text-danger">

                            <h6>Are you sure you want to delete this, <br> <b>Note</b>: This cannot be reversed</h6>
                        </div>

                        <div class="displaydeleteimg"></div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger text-white deletegoalsbutton"><i class="fas fa-trash"> Delete</i></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- emma modal for loading content -->
        <div class="modal fade" id="emmaloadcontent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel" data-bs-toggle="modal" data-bs-target="#filtermodalforsettinggoal" data-bs-dismiss="modal"><i class="fas fa-arrow-left fs-6 text-primary" style="cursor:pointer;"> Back</i></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="emmaloadgoalcontent"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary emma_insert_for_goal displayonvisionboard" data-bs-toggle="modal" data-bs-target="#">Set Goal</button>
                </div>
                
                </div>
            </div>
        </div>

        <!-- get started modal  -->
        <div class="modal fade" id="getstartedmodalforgoal" aria-hidden="true" aria-labelledby="getstartedmodalforgoalLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Set Goal</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-10">
                                
                            </div>
                            <div class="col-lg-2">
                                <!-- <a href="" data-bs-target="#useTemplateModal" data-bs-toggle="modal" data-bs-dismiss="modal"  style="float: right; font-size: 12px;" >
                                    <i class="fa fa-plus" aria-hidden="true"></i> Use Template
                                </a> -->
                            </div>
                        </div>
                        
                        <div class="row" style="margin-top: 50px;">
                            <div class="col-12">
                                <div align="center">
                                    <img src="../../assets/images/Feb-Business_9.jpg" style="width: 15%;" alt="">
                                    <p></p>
                                    <p>Opps looks like you haven't set any Goals yet!!! <br> Click on Get Started to set them.</p>

                                    <button type="button" id="emma_add_items_button" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#emmasetvision" data-bs-dismiss="modal" style="border: solid 1px white; border-radius: 25px; font-size: 16px; width: 250px;" >
                                        Get Started <i class='fas fa-arrow-right' ></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- vision board modal  -->
        <div class="modal fade" id="visionboardmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="visionboardmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel" style="cursor:pointer;" data-bs-toggle="modal"><i class="fas fa-bullseye text-primary"> Vision Board</i></h5>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>

                    <div class="modal-body" id="vision_content_after_create">
                        <div class="visionboard" align="center">
                            <h4 style="font-family: Roboto sans-serif;"> Vision Board </h4>
                        </div>

                        <div class="displayvisionboard">
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="emma_download_after_create"><i class="fas fa-print"> Print</i></button>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
      
    <!--Script-->
    <!--jquery knob -->
    <script src="../../assets/plugins/knob/jquery.knob.js"></script>

    <script>

        $(function () {
            $('[data-plugin="knob"]').knob();
        });

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
    <script src="../../controller/js/app/emma_goalsetting.js"></script>
    

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
    
     <script src='../../controller/js/app/assignment.js'></script>
</body>

</html>