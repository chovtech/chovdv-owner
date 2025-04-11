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

#ekene-setassignmentmodal .modal-body {
    overflow-y: auto;
}


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

.abba-inputfile-4+label {
    color: #0268cc;
}

.selectBox {
        position: relative;
    }

    .selectBox select {
        width: 100%;
        
    }

    .overSelect {
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
    }

    #checkBoxes {
        display: none;
        
    }

    #checkBoxes label {
        display: block;
    }

    #checkBoxes label:hover {
        background-color: #4F615E;
        color: white;
        /* Added text color for better visibility */
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

:root {
    --card-line-height: 1.2em;
    --card-padding: 2em;
    --card-radius: 0.5em;
    --color-blue: #007ffb;
    --color-gray: #e2ebf6;
    --color-dark-gray: #c4d1e1;
    --radio-border-width: 2px;
    --radio-size: 1.5em;
}

.abba_radio_card {
    background-color: #fff;
    border-radius: var(--card-radius);
    position: relative;

    &:hover {
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.15);
    }
}

.abba_radio {
    font-size: inherit;

    margin-bottom: 500px;
    position: absolute;
    right: calc(var(--card-padding) + var(--radio-border-width));
    top: calc(var(--card-padding) - 10px);
}

@supports(-webkit-appearance: none) or (-moz-appearance: none) {
    .abba_radio {
        -webkit-appearance: none;
        -moz-appearance: none;
        background: #fff;
        border: var(--radio-border-width) solid var(--color-gray);
        border-radius: 50%;
        cursor: pointer;
        height: var(--radio-size);
        outline: none;
        transition:
            background 0.2s ease-out,
            border-color 0.2s ease-out;
        width: var(--radio-size);

        &::after {
            border: var(--radio-border-width) solid #fff;
            border-top: 0;
            border-left: 0;
            content: '';
            display: block;
            height: 0.75rem;
            left: 25%;
            position: absolute;
            top: 50%;
            transform:
                rotate(45deg) translate(-50%, -50%);
            width: 0.375rem;
        }

        &:checked {
            background: var(--color-blue);
            border-color: var(--color-blue);
        }
    }

    .abba_radio_card:hover .abba_radio {
        border-color: var(--color-dark-gray);

        &:checked {
            border-color: var(--color-blue);
        }
    }
}

.plan-details {
    border: var(--radio-border-width) solid var(--color-gray);
    border-radius: var(--card-radius);
    cursor: pointer;
    display: flex;
    flex-direction: column;
    padding: var(--card-padding);
    transition: border-color 0.2s ease-out;
}

.abba_radio_card:hover .plan-details {
    border-color: var(--color-dark-gray);
}

.abba_radio:checked~.plan-details {
    border-color: var(--color-blue);
}

.abba_radio:focus~.plan-details {
    box-shadow: 0 0 0 2px var(--color-dark-gray);
}

.abba_radio:disabled~.plan-details {
    color: var(--color-dark-gray);
    cursor: default;
}

.abba_radio:disabled~.plan-details .plan-type {
    color: var(--color-dark-gray);
}

.abba_radio_card:hover .abba_radio:disabled~.plan-details {
    border-color: var(--color-gray);
    box-shadow: none;
}

.abba_radio_card:hover .abba_radio:disabled {
    border-color: var(--color-gray);
}


.tari-tari_checkbox-group {
    display: flex;
}

.tari-tari_checkbox-group>* {
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

.tari_checkbox-input:checked+.tari_checkbox-tile {
    border-color: #2260ff;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    color: #2260ff;
}

.tari_checkbox-input:checked+.tari_checkbox-tile:before {
    transform: scale(1);
    opacity: 1;
    background-color: #2260ff;
    border-color: #2260ff;
}

.tari_checkbox-input:checked+.tari_checkbox-tile .tari_checkbox-icon,
.tari_checkbox-input:checked+.tari_checkbox-tile .tari_checkbox-label {
    color: #2260ff;
}

.tari_checkbox-input:focus+.tari_checkbox-tile {
    border-color: #2260ff;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1), 0 0 0 4px #b5c9fc;
}

.tari_checkbox-input:focus+.tari_checkbox-tile:before {
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
    text-align: center;
    font-size: 10px;
}

.modal-content {
    z-index: -2 !important;
}

.main-content .wizard-form .progressbar-list::before {
    content: "";
    background-color: #f0f0f0;
    border: 10px solid #fff;
    border-radius: 50%;
    display: block;
    width: 30px;
    height: 30px;
    margin: 9px auto;
    box-shadow: 1px 1px 3px #dbdbdb;
    transition: all;
}

.main-content .wizard-form .progressbar-list::after {
    content: "";
    background-color: #f0f0f0;
    padding: 0px 0px;
    position: absolute;
    top: 14px;
    left: -50%;
    width: 100%;
    height: 1.5px;
    margin: 9px auto;
    z-index: -1;
    transition: all 0.8s;
}

.main-content .wizard-form .progressbar-list.active::after {
    background-color: #007ffb;
}

.main-content .wizard-form .progressbar-list:first-child::after {
    content: none;
}

.main-content .wizard-form .progressbar-list.active::before {
    font-family: "Font Awesome 5 free";
    content: "\f00c";
    font-size: 10px;
    font-weight: 600;
    color: #fff;
    padding: 6px;
    background-color: #007ffb;
    border: 1px solid #007ffb;
    box-shadow: 0 0 0 7.5px rgb(118 60 176 / 11%);
}

.progressbar-list {
    color: #8a8a8a;
}

.active {
    color: #007ffb;
}

.active-card {
    color: #e6f1fc;
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


.form-check-input:focus {
    box-shadow: none;
}

.bg-color-info {
    background-color: #00d69f;
}

.border-color {
    border-color: #25da4c;
}


.back-to-wizard {
    transform: translate(-50%, -139%) !important;
}

.bg-success-color {
    background-color: #87D185;
}

.bg-success-color:focus {
    box-shadow: 0 0 0 0.25rem rgb(55 197 20 / 25%);
}

:root {
    --color-text: #FFF;
    --color-front: #007ffb;
    --color-back: #7fbcf9;
}

.abba_tag {
    align-items: center;
    /* Vertically center the items */
    position: relative;
    border-radius: 6px;
    clip-path: polygon(7px 0px, 100% 0px, 100% 100%, 0% 100%, 0% 7px);
    background: var(--color-front);
    padding: 5px 10px;
    margin: 4px 4px;
    font-weight: 600;
    font-size: 10px;
    color: var(--color-text);
    transition: clip-path 500ms;
}

.abba_tag:hover {
    clip-path: polygon(0px 0px, 100% 0px, 100% 100%, 0% 100%, 0% 0px);
}

.abba_text {
    flex-grow: 1;
    /* Allow the text to grow and fill available space */
}

.abba_tag:after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 7px;
    height: 7px;
    background: var(--color-back);
    box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1);
    border-radius: 0 0 6px 0;
    transition: transform 500ms;
}

.abba_tag:hover:after {
    transform: translate(-100%, -100%);
}

@charset "UTF-8";

.abba-toggler-wrapper {
    display: block;
    width: 45px;
    height: 25px;
    cursor: pointer;
    position: relative;
}

.abba-toggler-wrapper input[type="checkbox"] {
    display: none;
}

.abba-toggler-wrapper input[type="checkbox"]:checked+.abba-toggler-slider {
    background-color: #44cc66;
}

.abba-toggler-wrapper .abba-toggler-slider {
    background-color: #ccc;
    position: absolute;
    border-radius: 100px;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    -webkit-transition: all 300ms ease;
    transition: all 300ms ease;
}

.abba-toggler-wrapper .abba-toggler-knob {
    position: absolute;
    -webkit-transition: all 300ms ease;
    transition: all 300ms ease;
}


.abba-toggler-wrapper.abba-style-23 input[type="checkbox"]:checked+.abba-toggler-slider {
    background-color: transparent;
    border-color: #44cc66;
}

.abba-toggler-wrapper.abba-style-23 input[type="checkbox"]:checked+.abba-toggler-slider:before {
    -webkit-transform: translateY(0);
    transform: translateY(0);
    opacity: 0.7;
}

.abba-toggler-wrapper.abba-style-23 input[type="checkbox"]:checked+.abba-toggler-slider:after {
    opacity: 0;
    -webkit-transform: translateY(20px);
    transform: translateY(20px);
}

.abba-toggler-wrapper.abba-style-23 input[type="checkbox"]:checked+.abba-toggler-slider .abba-toggler-knob {
    left: calc(100% - 19px - 3px);
    background-color: #44cc66;
}

.abba-toggler-wrapper.abba-style-23 .abba-toggler-slider {
    background-color: transparent;
    border: 2px solid #eb4f37;
}

.abba-toggler-wrapper.abba-style-23 .abba-toggler-slider:before {
    content: 'Compulsory';
    position: absolute;
    top: 2px;
    right: -90px;
    font-size: 12px;
    color: #000000;
    text-transform: uppercase;
    font-weight: 600;
    opacity: 0;
    -webkit-transition: all 300ms ease;
    transition: all 300ms ease;
    -webkit-transform: translateY(-20px);
    transform: translateY(-20px);
}

.abba-toggler-wrapper.abba-style-23 .abba-toggler-slider:after {
    content: 'Optional';
    position: absolute;
    top: 2px;
    right: -68px;
    font-size: 12px;
    color: #000000;
    text-transform: uppercase;
    font-weight: 600;
    opacity: 0.7;
    -webkit-transition: all 300ms ease;
    transition: all 300ms ease;
}

.abba-toggler-wrapper.abba-style-23 .abba-toggler-knob {
    width: calc(25px - 6px);
    height: calc(25px - 6px);
    border-radius: 50%;
    left: 3px;
    top: 1px;
    background-color: #eb4f37;
}

.abba_stud_checkbox-group {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    width: 100%;
    /* /* margin-left: auto; */
    margin-right: auto;
    /* max-width: 600px; */
    user-select: none;
}

.abba_stud_checkbox-group-legend {
    font-size: 14px;
    font-weight: 500;
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
    width: 6rem;
    min-height: 6rem;
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
    font-size: 10px;
}

@font-face {
    font-family: "Inter";
    src: url("Inter-Regular.ttf") format("truetype");
    font-weight: 400;
    font-style: normal;
}

@font-face {
    font-family: "Inter";
    src: url("Inter-Medium.ttf") format("truetype");
    font-weight: 500;
    font-style: normal;
}

@font-face {
    font-family: "Inter";
    src: url("Inter-Bold.ttf") format("truetype");
    font-weight: 700;
    font-style: normal;
}

@font-face {
    font-family: "Space Mono";
    src: url("SpaceMono-Regular.ttf") format("truetype");
    font-weight: 400;
    font-style: normal;
}

.abba_header-columns {
    display: flex;
    justify-content: space-between;
    padding-left: 4.5rem;
    padding-right: 2.5rem;
}

.abba_logo {
    height: 5rem;
    width: auto;
    margin-right: 1rem;
}

.abba_logotype {
    display: flex;
    align-items: center;
    font-weight: 700;
    color: black;
    font-size: larger;
}

.abba_page {
    margin-left: 5rem;
    margin-right: 5rem;
}

.abba_table-box table,
.abba_summary-box table {
    width: 100%;
    font-size: 0.625rem;
}

.abba_table-box table {
    padding-top: 0.2rem;
}

.abba_table-box table tr.abba_heading td {
    border-top: 1px solid #000000;
    border-left: 1px solid #d7dce4;
    border-right: 1px solid #d7dce4;
    border-bottom: 1px solid #000000;
    padding-left: 5px;
    height: 1.5rem;
}

.abba_table-box table tr.abba_item td,
.abba_summary-box table tr.abba_item td {
    border-bottom: 1px solid #d7dce4;
    border-left: 1px solid #d7dce4;
    border-right: 1px solid #d7dce4;
    padding-left: 5px;
    height: 1.5rem;
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

           

            <div class="main-cards" style="margin-top: 50px;">

                <!-- Navbar pills -->
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Nav tabs -->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs mb-3 customtab" id="abba-config" role="tablist">
                                <!-- <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="config-tab-1" data-bs-toggle="tab"
                                        href="#config-tabs-1" role="tab" aria-controls="config-tabs-1"
                                        aria-selected="true">Classes</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="config-tab-2" data-bs-toggle="tab" href="#config-tabs-2"
                                        role="tab" aria-controls="config-tabs-2" aria-selected="false">Result</a>
                                </li> -->
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="config-tab-3" data-bs-toggle="tab" href="#config-tabs-3"
                                        role="tab" aria-controls="config-tabs-3" aria-selected="false">Committee</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="abba-config-content">
                                <div class="tab-pane fade show active" id="config-tabs-3" role="tabpanel"
                                    aria-labelledby="config-tab-3">
                                    <?php include 'assignment.php'; ?>
                                </div>
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
                    <button type="button" class="btn btn-danger btn-sm" id="abba_proceed_to_delete_student"><i class="fas fa-trash-alt"> Yes Delete</i></button>
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
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i
                            class="fa fa-times"> Close</i></button>
                    <button type="button" class="btn btn-primary btn-sm" id="addToScoreSheetBtn"><i class="fa fa-plus">
                            Add <span class="abba_sheet_student_total_selected"></span> Student(s)</i></button>
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
                    <div align="center">
                        <h6>Are you sure?</h6>
                        <p>
                        <div><i class="fa fa-times fa-lg text-danger" style="font-size:56px"></i></div>
                        <p>Do you want to clear this sheet? This process cannot be reversed.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i
                            class="fa fa-times">
                            Close</i></button>
                    <button type="button" class="btn btn-danger btn-sm" id="clearScoreSheetBtn"><i
                            class="fa fa-trash">Clear List</i></button>
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
                                    <button type="button"
                                        class="btn btn-sm mt-2 rounded-3 btn-outline-primary downloadbtn-student-list"
                                        style="width:80%;"><i class="fas fa-download" style="font-size:12px;"> Click to
                                            download class list</i></button>
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
        <div class="modal-dialog dialogcontent modal-dialog-scrollable"
            style="border-top-left-radius: 20px; width: 100%;">
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
                        <!-- <div class="col-12 col-sm-12">
                            <div class="form-group abba_local-forms">
                                <label>Campus<span style="color:orangered;">*</span> </label>
                                <select class="form-control" id="abba_display_campus_for_create_class">
                                    <option value="0">Select Campus</option>
                                </select>
                            </div>
                        </div> -->
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
                                            <input type="text" class="form-control new_class_name"
                                                placeholder="Class Name" />
                                        </div>
                                    </div>

                                    <div class="col-1 removeappendform">
                                        <i class="fa fa-trash fs-6 text-danger mt-4" style="cursor:pointer;"></i>
                                    </div>
                                </div>
                            </div>

                            <a href="#" class="float-end text-primary" id="appendform"
                                style="text-decoration:underline; margin-bottom:5px;" type="button"><i
                                    class="fa fa-plus"></i>Add Class</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="change_create_btn">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fas fa-times">
                        Close</i></button>
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
        <div class="modal-dialog dialogcontent modal-dialog-scrollable"
            style="border-top-left-radius: 20px; width: 100%;">
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
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i
                            class="fas fa-times"> Close</i></button>
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
                    <h5 class="modal-title text-danger" id="exampleModalLabel"><i class="fa fa-trash"> Delete Class</i>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 align="center">
                        Are you sure you want to delete this class?<br><br>
                        <span class="text-danger">Note that all details concerning this class will be deleted as
                            well.</span>

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
        <div class="modal-dialog dialogcontent modal-dialog-scrollable"
            style="border-top-left-radius: 20px; width: 100%;">
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
                                <input type="text" class="form-control new_class_name_edit" placeholder="Class Name" />

                                <input type="hidden" id="edit_class_id" />
                                <input type="hidden" id="edit_campus_id" />
                                <input type="hidden" id="edit_class_input" />
                                <input type="hidden" id="edit_class_span" />

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
    <div class="modal fade" id="abba_add_class_subject_template_Modal" tabindex="-1"
        aria-labelledby="abba_add_class_subject_template_ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalLabel"><i class="fa fa-plus"> Add Subject</i>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="display_class_template_final">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i
                            class="fa fa-times"> Close</i></button>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal"><i class="fas fa-save">
                            Save</i></button>
                </div>
            </div>
        </div>
    </div>

<!---====Edit Profile Side Modal Start Here====-->
<div class="modal fade modalshow modalfade" id="edit_assignmenttitle" tabindex="-1"
    aria-labelledby="edit_assignmenttitle" aria-hidden="true" sty>
    <div class="modal-dialog modal-dialog-scrollable dialogcontent" style="border-top-left-radius: 30px; width: 25%;">
        <div class="modal-content modalcontent" style="background-color:#ffffff;">
            <div class="modal-body modalbodycontent">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" style="font-weight: bold;"> Edit Assignment <svg xmlns="http://www.w3.org/2000/svg"
                            width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                            <path
                                d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                        </svg>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div style="position: fixed; margin-left: -10px; margin-top: -30px; display: flex;">
                    <img src="../../assets/images/favicon11.png" style="width: 150px; z-index: -1; opacity: 0.1;"
                        data-dismiss="modal" aria-label="Close">
                </div>
                <div width="300px" class="sc-UpCWa ezuGy flexi-sheet-body" open="">
                    <div width="100%" height="100%" style="padding: 20px; margin-top:40px;" class="sc-pyfCe gtGxgb">
                        <div id="ekeneedit_content"></div>
                            <input type="hidden" id="eke_hiddeninput">


                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                    <i class="fa fa-times"> Close</i>
                </button>
                <button type="button" class="btn btn-primary btn-sm" id="eken_edit_assignmenttitle">
                    <i class="fa fa-edit"> Edit</i>
                </button>
            </div>

        </div>
    </div>
</div>
<!---====End Edit Profile Side ModalEndHere====-->




<!---====Edit Profile Side Modal Start Here====-->
<div class="modal fade modalshow modalfade" id="ekene_adding_of_memebersidemodal" tabindex="-1"
    aria-labelledby="ekene_adding_of_memebersidemodal" aria-hidden="true" sty>
    <div class="modal-dialog modal-dialog-scrollable dialogcontent" style="border-top-left-radius: 30px; width: 25%;">
        <div class="modal-content modalcontent" style="background-color:#ffffff;">
            <div class="modal-body modalbodycontent">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" style="font-weight: bold;">Add Member<svg xmlns="http://www.w3.org/2000/svg"
                            width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                            <path
                                d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                        </svg>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div style="position: fixed; margin-left: -10px; margin-top: -30px; display: flex;">
                    <img src="../../assets/images/favicon11.png" style="width: 150px; z-index: -1; opacity: 0.1;"
                        data-dismiss="modal" aria-label="Close">
                </div>
                <div width="300px" class="sc-UpCWa ezuGy flexi-sheet-body" open="">
                    <div width="100%" height="100%" style="padding: 20px; margin-top:40px;" class="sc-pyfCe gtGxgb">
                        <div id="ekene_adding_of_member_content">


                        </div>
                            <!-- <input type="hidden" id="eke_hiddeninput"> -->


                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                    <i class="fa fa-times"> Close</i>
                </button>
                <button type="button" class="btn btn-primary btn-sm" id="eken_edit_assignmenttitle">
                    <i class="fa fa-plus">Save</i>
                </button>
            </div>

        </div>
    </div>
</div>
<!---====End Edit Profile Side ModalEndHere====-->


<!-- 
    //set assignment modal =======----- -->
   

        <!-- Button trigger modal -->
     

        <div class="modal fade" id="ekeneloaddeletemodal" tabindex="-1" aria-labelledby="ekeneloaddeletemodalLabel" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 20px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="dataid">
                    <input type="hidden" id="datacam">
                    <p style="color: red">Are you sure you want to delete this? This action is irreversible.</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="eken_delete_all">Delete</button>
                </div>
                </div>
            </div>
        </div>



        
               <div class="modal fade" id="ekene_save_change" aria-hidden="true" aria-labelledby="ekene_save_changeLabel" tabindex="-1">
                    <div class="modal-dialog modal-xl" style="width:80%;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalToggleLabel"> Member</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                
                            <div class="modal-body mt-4">
                                <input type="hidden" class="emma_keep_institution">
                                <div class="row">
                                    <div class="col-6">

                                    </div>
                                    <div class="col-6">
                                        <button type="button"  id="ekeneaddfirst" style="float: right;font-size: 13px;border:none;font-weight:500;"
                                            class="btn btn-sm btn-primary text-light mb-5">
                                            <span class=" float-end  cursor:pointer; font-weight:bold;"
                                               ><i class="fa fa-plus"></i> Add Member</span>
                                        </button>
                                    </div>
                                   
                                </div>
                                
                                <div id= "kdataidekene"></div>
                                  <div id= "ekene_view_member_content">

                                  </div>
                            </div>

                        </div>

                    </div>
                </div>

            <!-- </div>
            </div>
        </div>      -->


        <div class="modal fade" id="ekene_assigning_of_task" aria-hidden="true" aria-labelledby="ekene_assigning_of_taskLabel" tabindex="-1">
                    <div class="modal-dialog modal-xl" style="width:80%;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalToggleLabel"> Add Task</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body mt-4">
                            <input type="hidden" id="ekene_angry">
                            <input type="hidden" class="emma_institution_id">
                                <div class="row">
                                    <div class="col-6">

                                    </div>
                                    <div class="col-6">
                                        <button type="button"  id="ekene_add_first_task" style="float: right;font-size: 13px; border-radius:10px; font-weight:500;"
                                            class="btn btn-sm btn-primary text-light mb-5">
                                            <span class=" float-end  cursor:pointer; font-weight:bold;"><i class="fa fa-plus"></i> Add Task</span>
                                        </button>
                                    </div>
                                </div>

                                <input type= "hidden" id= "kdataidekene">
                               
                                        <div id="ekenecontentoftask">
                                            <div class="container-fluid mt-4">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table id="myDataTable" class="table table-bordered table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>S/n</th>
                                                                        <th>Title</th>
                                                                        <th>Description</th>
                                                                        <th>Conclusion</th>
                                                                        <th>Date&Time</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="displaymytask"></tbody>
                                                            </table>
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





        <div class="modal fade" id="ekene_delete_committee" tabindex="-1" aria-labelledby="ekeneloaddeletemodaljsonLabel" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 20px;">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel"><i class="fas fa-trash"></i> Delete Commitee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="kdatacamid">
                    <input type="hidden" id="kdataid">
                    
                    <div align="center">
                        <p style="color: red">Are you sure you want to delete this commitee? <br> <b>NOTE:</b> This action is irreversible.</p>
                    </div>
                        <div class="emma_keep_delete_member_card"></div>
                    <!-- </div> -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="ekene_delete_committee_button"> <i class="fas fa-trash"></i> Yes! Delete</button>
                    <!-- main delete  -->
                </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="ekene_delete_deletetaskmodal" tabindex="-1" aria-labelledby="ekeneloaddeletemodaljsonLabel" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 20px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash-alt"> Delete Task Assigned</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <input type="hidden" id="kdatacamidtask">
                <input type="hidden" id="kdataid">
                
                    <div align="center">
                        <p style="color: red">Are you sure you want to delete this? <br> <b>NOTE:</b> This action is irreversible.</p>
                    </div>
                    <div class="delete_icon_for_add_task_modal"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="ekene_delete_committee_buttontask"><i class="fas fa-trash-alt"> Yes Delete</i></button>
                </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="ekene_delete_member_modal" tabindex="-1" aria-labelledby="ekeneloaddeletemodaljsonLabel" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 20px;">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalLabel"><i class="fas fa-trash"> Delete Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <input type="hidden" id="kdatacamiddelete">
                <input type="hidden" id="kdataiddelete">
                <input type="hidden" id="ekenedelete1">
                 
                 
                <div align="center">
                    <p style="color: red">Are you sure you want to delete this? <br> <b>NOTE:</b> This action is irreversible.</p>
                </div>
                    <div class="emma_keep_delete_member"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="ekene_delete_member_modalbutton"><i class="fas fa-trash"> Yes! Delete</i></button>
                </div>
                </div>
            </div>
        </div>

        
        <div class="modal fade" id="ekene_edit_committee_name" tabindex="-1" aria-labelledby="ekene_edit_committee_nameLabel" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 20px;">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalLabel"><i class="fas fa-edit"></i> Edit Commitee Name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

            
        
                    <input type="hidden" class="form-control" id="edit_new_committee_id">
                    <input type="text" class="form-control" id="edit_new_committee"  placeholder="Enter Committee Name ">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="ekene_edit_committee_name_button"> <i class="fas fa-edit"></i> Edit</button>
                </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="ekene_edit_member" tabindex="-1" aria-labelledby="ekene_edit_committee_nameLabel" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 20px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Position</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                              <div class="col-12">
                            <div class="row g-2">
                                <div class="col-md-12 col-lg-12">
                                    <select style="color: #666666;" class="form-select form-select-sm"
                                        aria-label="form-select-sm example" id="ekene_select_position">
                                        <option value="NULL">Select Position</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="ekene_hide_userid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="ekene_edit_member_name_button"> <i class="fas fa-edit"></i> Update</button>
                </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="ekeneloaddeletemodaljsontheory" tabindex="-1" aria-labelledby="ekeneloaddeletemodaljsontheoryLabel" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 20px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <input type="hidden" id="kdatacamidtheory">
                <input type="hidden" id="kdataidtheory">
                    <input type="hidden" id="dataassignmentquestionidtheory">
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="eken_delete_eachjsonquestiontheory">Delete</button>
                </div>
                </div>
            </div>
        </div>

    <div class="modal fade" id="ekene-import-questionmodaltheory" aria-hidden="true"
        aria-labelledby="ekene-import-questionmodaltheoryLabel" tabindex="-1">
        <div class="modal-dialog modal-fullscreen" style="width:100%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel"> Question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3">
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                id="select_question_categorytheory">
                                <option >Question category</option>
                              
                                <option selected>Theory </option>
                             

                            </select>


                        </div>
                        <div class="col-3">
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                id="select_question_typetheory">
                                <option selected value="NULL">Question type</option>
                                <option>Assessment</option>
                                <option>Pratice Question</option>
                                <option>Other Question</option>

                            </select>
                        </div>
                        <div class="col-2">
                            <a href="javascript:();" type="button" class="btn btn-primary btn-sm"
                                id="load_import_questiontheory" style="width: 100%;">
                                <span style="font-size: 13px;">Load</span>
                            </a>
                        </div>
                    </div>

                    <div class="row mt-5 g-3" id="display_importtheory">
                        <div class="col-12 mt-5" id="ekene_display_student_behaviouraltheory">
                            <!-- <div align="center">
                                <img src="../../assets/images/adminImg/filter.png" style="width:15%;opacity:0.7;" />
                                <p class="pt-2 fs-6 text-secondary">Please
                                    filter to proceed.</p>
                            </div> -->
                        </div>



                    </div>

                </div>
                <div class="modal-footer mt-5">
                    <button class="btn btn-primary" id="add_buttontheory">Next</button>

                </div>

            </div>

        </div>
    </div>
<input type="hidden" id="dataassignmentid">
        <div class="modal fade" id="ekene_view_dowloadquestion" aria-hidden="true"
             aria-labelledby="ekene_view_dowloadquestionLabel" tabindex="-1">

            <div class="modal-dialog modal-xl" style="width:80%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel"> Download</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
             
                    <div class="modal-body mt-1">
                        <div class="row">
                            <div class="col-6 float-start">
                                <span style="cursor: pointer; color: blue; text-decoration: underline" id="ekene_showanswer"><i class="fa fa-eye"></i>"Show answer </span>
                             </div>
                             <div class="col-6 float-end" align="right">
                                <button class="btn btn-primary" id="ekene_print"><i class="fa fa-print"></i>Download</button>
                             </div>
                        </div>
                
                           <div id="downloadassignmentekene"></div>
                           
                                    
                    </div>

                </div>
            </div>
        </div>   
        
        <div class="modal fade" id="ekene_mark_question" aria-hidden="true"
             aria-labelledby="ekene_mark_questionLabel" tabindex="-1">

            <div class="modal-dialog modal-xl" style="width:80%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel"> Mark Assignment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
             
                    <div class="modal-body mt-1">
                        <!-- <div class="row">
                            <div class="col-6 float-start">
                                <span style="cursor: pointer; color: blue; text-decoration: underline" id="ekene_showanswer"><i class="fa fa-eye"></i>"Show answer </span>
                             </div>
                             <div class="col-6 float-end" align="right">
                                <button class="btn btn-primary" id="ekene_print"><i class="fa fa-print"></i> Print </button>
                             </div>
                        </div> -->
                
                           <div id="ekenemarkassignmentekene"></div>

                           <!-- reset hidden input field -->
                           <input type="hidden" id="resetassignmentid">
                            <input type="hidden" id="resetstudentid">
                            <!-- pulish hidden input field -->
                            <input type="hidden" id="publishassignmentid">
                            <input type="hidden" id="publishstudentid">
                            <input type="hidden" id="publishdatastatus">
                            
                                 <!-- convert hidden input field.... -->
                            <input type="hidden" id="ekeneconvertdatastatus" name="ekeneconvertdatastatus">
                            
                            <input type="hidden" id="ekeneconvertstudentid" name="ekeneconvertstudentid">
                            <input type="hidden" id="overallhiddeninput" name="overallhiddeninput">

                            <input type="hidden" id="tota_lobjectivequestion" name="tota_lobjectivequestion">
                                    <!-- hidden -->
                            <input type="hidden" id="datasession">
                            <input type="hidden" id="dataterm">
                
                                    
                    </div>

                </div>
            </div>
        </div>   
        <div class="modal fade" id="ekene_markmainassignment" aria-hidden="true" aria-labelledby="modalLabel"
    tabindex="-1">

    <div class="modal-dialog modal-xl" style="width:80%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel"> Question</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body mt-4">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Nav tabs -->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs mb-3 customtab" id="abba-config" role="tablist">

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="config-tab-20" data-bs-toggle="tab" href="#config-tabs-20"
                                        role="tab" aria-controls="config-tabs-20" aria-selected="false">Obective</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="config-tab-21" data-bs-toggle="tab" href="#config-tabs-21"
                                        role="tab" aria-controls="config-tabs-21" aria-selected="false">Theory</a>
                                </li>
                            </ul>

                        </div>
                    </div>

                    <div class="tab-content" id="ekene-config-content1">

                        <div class="tab-pane fade show active" id="config-tabs-21" role="tabpanel"
                            aria-labelledby="config-tab-21">

                            <div id="theoryparttab" style="color: black;"></div>
                            <input type="hidden" id="ekene_studenthiddenidten">
                            <input type="hidden" id="ekene_campushiddenidten">
                            <input type="hidden" id="ekene_sassignmenthiddenidten">

                        </div>

                        <div class="tab-pane fade" id="config-tabs-20" role="tabpanel" aria-labelledby="config-tab-20">
                          <div id="objectiveparttab"  style="color: black;"></div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="submit_markedassignment">Submit</button>
                </div>
        </div>
    </div>
</div>

        <div class="modal fade" id="ekene_create_committee" tabindex="-1" aria-labelledby="ekene_convert_assignmentmodalLabel" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 20px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 600; color: blue;">Create Committees</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <!-- <input type="hidden" id="kdatacamidtheory">
                <input type="hidden" id="kdataidtheory"> -->
                    <input type="hidden" id="">
                    <div class="row g-2">
                        <div class="col-md-12 col-lg-12 p-2">
                            <select style="color: #666666;" class="form-select form-select-sm"
                                aria-label="form-select-sm example" id="ekene_select_create_campus">
                                <option value="NULL">Select campus</option>
                            </select>
                        </div>

                        <div class="col-md-12 col-lg-12 p-2">
                            <input type="text" class="form-control" id="new_committee" aria-describedby="emailHelp" placeholder="Enter Committee Names ">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="ekene_convertbutton"><i class="fa fa-plus"></i> Create</button>
                </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="ekene_add_member_forreal" tabindex="-1" aria-labelledby="ekene_add_member_forrealmodalLabel" aria-hidden="true" >
            <div class="modal-dialog ">
                <div class="modal-content" style="border-radius: 20px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 600; color: blue;"><i class="fa fa-plus-circle"></i> Add Commitee Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <!-- <input type="hidden" id="kdatacamidtheory">
                <input type="hidden" id="kdataidtheory"> -->
                    <input type="hidden" id="">
                    <div class="col-12">
                            <div class="row g-2">
                                <div class="col-md-12 col-lg-12">
                                    <select style="color: #666666;" class="form-select form-select-sm"
                                        aria-label="form-select-sm example" id="ekene_select_usertype">
                                        <option value="NULL"selected>Select UserType</option>
                                        <option value="teacher">Teacher</option>
                                        <option value="schoolhead">Schoolhead</option>
                                        <option value="parent">Parent</option>
                                        <option value="admin">Admin</option>
                                        <option value="student">Student</option>
                                    </select>
                                </div>
                            </div>
                        </div>&nbsp;
                        <div class="col-12">
                            <div class="row g-2">
                                <div class="col-md-12 col-lg-12">
                                    <div class="multipleSelection">
                                        <div class="selectBox scrollable-select"  onclick="showCheckboxes()" >
                                            <select style="color: #666666;" class="form-select form-select-sm" aria-label="form-select-sm example" id="">
                                                <option>Select Member</option>
                                            </select>
                                            <div class="overSelect"></div>
                                        </div>
                                        <div id="checkBoxes"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>
                <!-- </div> -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="ekene_add_onemember"><i class="fa fa-plus-circle"></i> Add</button>
                </div>
                </div>
            </div>
        </div>



        <div class="modal fade" id="ekene_add_member_forrealtask" tabindex="-1" aria-labelledby="ekene_add_member_forrealmodalLabel" aria-hidden="true" >
            <div class="modal-dialog ">
                <div class="modal-content" style="border-radius: 20px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 600; color: blue;">Add Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <!-- <input type="hidden" id="kdatacamidtheory">
                <input type="hidden" id="kdataidtheory"> -->
                    <input type="hidden" id="">
                    <div class="col-12">


                         
                            <div class="row g-2">
                                <div class="col-md-12 col-lg-12">
                                    <select style="color: #666666;" class="form-select form-select-sm"
                                        aria-label="form-select-sm example" id="ekene_offenserusertype">
                                        <option value="NULL"selected>Offenser Usertype</option>
                                        <option value="teacher">Teacher</option>
                                        <option value="schoolhead">Schoolhead</option>
                                        <option value="parent">Parent</option>
                                        <option value="admin">Admin</option>
                                        <option value="student">Student</option>
                                    </select>
                                </div>
                            </div>
                        </div>&nbsp;
                        <div class="col-12">
                            <div class="row g-2">
                                <div class="col-md-12 col-lg-12">
                            <div class="multipleSelection">
                                <div class="selectBox scrollable-select"  onclick="showCheckboxesone()" >
                                    <select style="color: #666666;" class="form-select form-select-sm"     aria-label="form-select-sm example">
                                        <option>Offenser Name</option>
                                    </select>
                                    <div class="overSelect"></div>
                                </div>
                    
                                <div id="checkBoxes1">
                                   
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Title</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Title">
                            </div>
                            <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                     </div>
                   </div>
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="ekene_add_onemembertask"><i class="fa fa-plus"></i> Add Task</button>
                </div>
                </div>
            </div>
        </div>

        <!-- edit task modal  -->

        <div class="modal fade" id="modalforeditingtask" tabindex="-1" aria-labelledby="modalforeditingtaskLabel" aria-hidden="true" >
            <div class="modal-dialog ">
                <div class="modal-content" style="border-radius: 20px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 600; color: blue;">Edit Task Assigned</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" class="emma_edit_data_id">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="emma_load_task_edit_title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="emma_load_task_edit_title">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="emma_load_task_edit_description" class="form-label">Description</label>
                                <textarea class="form-control" id="emma_load_task_edit_description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="emma_update_task_button"><i class="fa fa-edit"></i> Update</button>
                </div>
                </div>
            </div>
        </div>

        <!-- view task conclusion  -->
        
        <div class="modal fade" id="modalforviewingtask" tabindex="-1" aria-labelledby="modalforviewingtaskLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content" style="border-radius: 20px;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 600; color: blue;">View Recommendation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" class="emma_view_data_id">
                        <div class="load_view_content"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="emma_approve_task_button"><i class="fas fa-check"></i> Approve</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- upload conclusion  -->
        <div class="modal fade" id="modalforuploadingtask" tabindex="-1" aria-labelledby="modalforuploadingtaskLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content" style="border-radius: 20px;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 600; color: blue;">Upload Recommendation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" class="emma_upload_task_id">
                        <input type="hidden" class="emma_upload_commitee_id">
                        <input type="hidden" class="emma_upload_user_id">

                        <div class="mb-3">
                            <label for="emma_load_upload_penalty" class="form-label"><b>Penalty:</b></label>
                            <textarea class="form-control mymce" id="emma_load_upload_penalty"></textarea>
                        </div>
                        <div class="emma_upload_penalty_conclusion"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="emma_upload_penalty_button"> <i class="fa fa-upload"></i> Upload</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalforassigningtasks" tabindex="-1" aria-labelledby="modalforassigningtasksLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 20px;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 600; color: blue;">Assigned Users</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        
                        <div class="emma_upload_assigned_users"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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

    let show = true;
 
 function showCheckboxes() {

          alert('hello');
     let checkboxes = document.getElementById("checkBoxes");

     if (show) {
         checkboxes.style.display = "block";
         show = false;
     } else {
         checkboxes.style.display = "none";
         show = true;
     }
 }


  function openModal() {
        var modal = document.getElementById('myModal');
        modal.style.display = 'block';
    }
    // $(window).on('load', function() {
    //     // When the window finishes loading, hide the preloader
    //     $('.preloader').fadeOut('slow');
    // });
    function showCheckboxes() {
        var checkBoxes = document.getElementById("checkBoxes");
        checkBoxes.style.display = checkBoxes.style.display === "block" ? "none" : "block";
    }






    function showCheckboxesone() {
     let checkboxes = document.getElementById("checkBoxes1");

     if (show) {
         checkboxes.style.display = "block";
         show = false;
     } else {
         checkboxes.style.display = "none";
         show = true;
     }
 }

  function openModal() {
        var modal = document.getElementById('myModal');
        modal.style.display = 'block';
    }
    // $(window).on('load', function() {
    //     // When the window finishes loading, hide the preloader
    //     $('.preloader').fadeOut('slow');
    // });
    function showCheckboxesone() {
        var checkBoxes = document.getElementById("checkBoxes1");
        checkBoxes.style.display = checkBoxes.style.display === "block" ? "none" : "block";
    }

    // Handle checkbox changes
    document.querySelectorAll('#checkBoxes1 input[type="checkbox"]').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            updateSelect();
        });
    });
    function updateSelect() {
        var selectBox = document.querySelector('.selectBox select');
        var selectedOptions = Array.from(document.querySelectorAll('#checkBoxes1 input[type="checkbox"]:checked')).map(function(checkbox) {
            return checkbox.value;
        });

        // Update the select box with selected options
        selectBox.innerHTML = '<option>' + (selectedOptions.length > 0 ? selectedOptions.join(', ') : 'Offenser Name') + '</option>';
    }






    // Update the visible part of the select box
    function updateSelect() {
        var selectBox = document.querySelector('.selectBox select');
        var selectedOptions = Array.from(document.querySelectorAll('#checkBoxes input[type="checkbox"]:checked')).map(function(checkbox) {
            return checkbox.value;
        });

        // Update the select box with selected options
        selectBox.innerHTML = '<option>' + (selectedOptions.length > 0 ? selectedOptions.join(', ') : 'Select Member') + '</option>';
    }

    $(document).ready(function () {
        $('#myDataTable').DataTable();
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


<script src="../../controller/js/app/committee.js"></script>

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