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

    <div class="checkbox-wrapper-15">
  <input class="inp-cbx" id="cbx-15" type="checkbox" style="display: none;"/>
  <label class="cbx" for="cbx-15">
    <span>
      <svg width="12px" height="9px" viewbox="0 0 12 9">
        <polyline points="1 5 4 8 11 1"></polyline>
      </svg>
    </span>
    <span>To-do</span>
  </label>
</div>

<style>
  .checkbox-wrapper-15 .cbx {
    -webkit-user-select: none;
    user-select: none;
    -webkit-tap-highlight-color: transparent;
    cursor: pointer;
  }
  .checkbox-wrapper-15 .cbx span {
    display: inline-block;
    vertical-align: middle;
    transform: translate3d(0, 0, 0);
  }
  .checkbox-wrapper-15 .cbx span:first-child {
    position: relative;
    width: 24px;
    height: 24px;
    border-radius: 50%;
    transform: scale(1);
    vertical-align: middle;
    border: 1px solid #B9B8C3;
    transition: all 0.2s ease;
  }
  .checkbox-wrapper-15 .cbx span:first-child svg {
    position: absolute;
    z-index: 1;
    top: 8px;
    left: 6px;
    fill: none;
    stroke: white;
    stroke-width: 2;
    stroke-linecap: round;
    stroke-linejoin: round;
    stroke-dasharray: 16px;
    stroke-dashoffset: 16px;
    transition: all 0.3s ease;
    transition-delay: 0.1s;
    transform: translate3d(0, 0, 0);
  }
  .checkbox-wrapper-15 .cbx span:first-child:before {
    content: "";
    width: 100%;
    height: 100%;
    background: #506EEC;
    display: block;
    transform: scale(0);
    opacity: 1;
    border-radius: 50%;
    transition-delay: 0.2s;
  }
  .checkbox-wrapper-15 .cbx span:last-child {
    margin-left: 8px;
  }
  .checkbox-wrapper-15 .cbx span:last-child:after {
    content: "";
    position: absolute;
    top: 8px;
    left: 0;
    height: 1px;
    width: 100%;
    background: #B9B8C3;
    transform-origin: 0 0;
    transform: scaleX(0);
  }
  .checkbox-wrapper-15 .cbx:hover span:first-child {
    border-color: #3c53c7;
  }

  .checkbox-wrapper-15 .inp-cbx:checked + .cbx span:first-child {
    border-color: #3c53c7;
    background: #3c53c7;
    animation: check-15 0.6s ease;
  }
  .checkbox-wrapper-15 .inp-cbx:checked + .cbx span:first-child svg {
    stroke-dashoffset: 0;
  }
  .checkbox-wrapper-15 .inp-cbx:checked + .cbx span:first-child:before {
    transform: scale(2.2);
    opacity: 0;
    transition: all 0.6s ease;
  }
  .checkbox-wrapper-15 .inp-cbx:checked + .cbx span:last-child {
    color: #B9B8C3;
    transition: all 0.3s ease;
  }
  .checkbox-wrapper-15 .inp-cbx:checked + .cbx span:last-child:after {
    transform: scaleX(1);
    transition: all 0.3s ease;
  }

  @keyframes check-15 {
    50% {
      transform: scale(1.2);
    }
  }
  input[type="checkbox"] {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    width: 20px;
    height: 20px;
    border: 2px solid #007FFB;
    border-radius: 50%; /* Make it round */
    outline: none;
    cursor: pointer;
}

/* Checked state */
input[type="checkbox"]:checked {
    background-color: #007ffb;
}

/* Custom tick */
input[type="checkbox"]:checked::before {
    content: '✔';
    display: block;
    text-align: center;
    font-size: 14px;
    line-height: 20px;
    color: white;
}

  

</style>

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

            


    <div class="mt-4">
        <button type="button" style="float: right;font-size: 13px;border:none;font-weight:500;"
        class="btn btn-sm btn-primary text-white emma_create_policy" data-bs-toggle="modal"
        data-bs-target="#emma_create_policy_modal"> <i class="fas fa-plus-circle text-white"> Create policy</i></button>
    </div><br>

            <div class="emmapolicycard mt-2"></div>
            <input type="hidden" class="emma_data_id_for_publishing_status_for_policy">
            <input type="hidden" class="emma_data_status_for_publishing_status_for_policy">

          
    </main>

        <!-- Button trigger modal -->

            <!-- Modal -->
            <div class="modal fade" id="emma_create_policy_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle text-primary"> Create policy</i></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                        <div class="row">
                            <div class="col-4 text-bolder">
                                <label>
                                    <input type="checkbox" class="emma_checkedboxes_for_policy" id="checkemmaparent" value="parent">
                                    Parent
                                </label>
                            </div>
                            <div class="col-4 text-bolder">
                                <label>
                                    <input type="checkbox" class="emma_checkedboxes_for_policy" id="checkemmastaff" value="staff">
                                    Staff
                                </label>
                            </div>
                            <div class="col-4 text-bolder">
                                <label>
                                    <input type="checkbox" class="emma_checkedboxes_for_policy" id="checkemmastudents" value="students">
                                    Students
                                </label>
                            </div>
                        </div>

                        <div class="form-group abba_local-forms mt-5">
                            <label class="fw-bolder">Policy title</label>
                            <input type="text" class="form-control emma_policy_title" placeholder="Policy Title">
                        </div>
                        
                        <div class="form-group abba_local-forms">
                            <textarea class="form-control mymce" placeholder="Description" id="floatingTextareafordescription"></textarea>
                            <label for="floatingTextarea" class="fw-bolder">Description</label>
                        </div>

                            <!-- <div class="emma_add_section_button float-end" style="cursor:pointer;" data-bs-toggle="collapse" data-bs-target="#"><i class="fas fa-plus-circle text-success"> Add Section(optional)</i></div><br> -->


                                <div class="accordion" id="accordionExample">
                                    <!-- <i class="fas fa-times text-danger float-end emma_remove_section" style="cursor:pointer;"></i> -->

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#emmacollapsesection" aria-expanded="false" aria-controls="collapseOne">
                                            <i class="fas fa-plus-circle text-success"> Add Section(optional)</i>
                                        </button>

                                        </h2>
                                        <div id="emmacollapsesection" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="border">
                                                    <div class="p-3">
                                                        <div class="mt-1 add-new-icon">
                                                            <div class="form-group abba_local-forms mt-3">
                                                                <input class="form-control emma_section_for_policy" id="floatingTextareaforsection"></input>
                                                                <label for="floatingTextarea" class="fw-bolder">Section</label>
                                                        </div>

                                                        <div class="form-group abba_local-forms">
                                                            <textarea class="form-control mymce floatingTextareaforsection_description" placeholder="Description" id=""></textarea>
                                                            <label for="floatingTextarea" class="fw-bolder">Description</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <i class="fas fa-plus-circle text-primary float-end emmacollapsesectionforaddnew mt-2" style="cursor:pointer;"> Add New</i>


                                <div class="emmaloadcontentnew"></div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary emma_create_policy_button"><i class="fas fa-plus-circle text-white"> Create</i></button>
                        </div>

        
                    </div>
                </div>
            </div>

            
        <!-- Modal For Edit Policy -->
        <div class="modal fade" id="editforpolicy" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalLabel"><i class="fas fa-edit">Edit Policy</i></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="emmadataidforedit">
                        <div class="form-group abba_local-forms">
                            <label class="fw-bolder">Policy title</label>
                            <input type="text" class="form-control emma_edit_policy_title" placeholder="Policy Title">
                        </div>
                        
                        <div class="form-group abba_local-forms">
                            <textarea class="form-control mymce emma_edit_policy_description tooltiptext" placeholder="Description" id=""></textarea>
                            <label for="floatingTextarea" class="fw-bolder">Description</label>
                        </div>

                                <div class="accordion" id="accordionExampleforedit">

                                    <div class="accordion-item accordion_item_edit">
                                        <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#emmacollapsesectionforeditaccordion" aria-expanded="false" aria-controls="collapseOne">
                                            <i class="fas fa-plus-circle text-success"> Add Section(optional)</i>
                                        </button>

                                        </h2>
                                        <div id="emmacollapsesectionforeditaccordion" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExampleforedit">
                                            <div class="accordion-body">
                                                <div class="border">
                                                    <div class="p-3">
                                                        <div class="mt-1 add-new-icon">
                                                            <div id="emmaloaddescriptionforedit"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div id="emmaloadcontentnewforedit"></div>


                                <i class="fas fa-plus-circle text-primary float-end emmacollapsesectionforaddnewedit mt-2" style="cursor:pointer;"> Add New</i>


                        <!-- <i class="fas fa-plus-circle text-primary float-end emmacollapsesectionforaddnewedit mt-1" style="cursor:pointer;"> Add New</i> -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary emma_edit_policy_button"><i class="fas fa-edit text-white"> Edit Policy</i></button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Button load policy delete -->
            <div class="modal fade" id="emma_modal_for_policy_delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash text-danger"> Delete Policy</i></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" align="center">
                        <input type="hidden" id="deletedataidforpolicy">
                        <h6 class="text-danger"><b>Note:</b>Once deleted,this cannot be reveresed</h6>
                        <div class="emma_load_delete_container_for_policy"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary btn-danger emma_delete_for_policy_button"><i class="fas fa-trash text-white"> Delete</i></button>
                    </div>
                    </div>
                </div>
            </div>

            <!-- Button trigger view modal policy-->
         
            <div class="modal fade" id="emma_modal_for_view" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-eye"> View Policy</i></h5>
                        </div>

                        <div class="modal-body">
                                <input type="hidden" class="emma_data_id_for_publishing_status">
                                <input type="hidden" class="emma_data_status_for_publishing_status">
                            <div class="emmaloadviewdetails"></div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success emma_continue_for_policy_view" id="publishbutton" >Publish</button>
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
   <!-- <script src="../../controller\js\app\emma_class_recording.js"></script> -->
<script src="../../controller/js/app/emma_policy.js"></script>

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
</body>

</html>