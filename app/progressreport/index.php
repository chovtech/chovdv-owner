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
    <link rel="stylesheet" href="../../assets/plugins/Croppie/croppie.css" />

    <script src="../../assets/plugins/dselect.js"></script>

    <script>
    (function(e, t, n) {
        var r = e.querySelectorAll("html")[0];
        r.className = r.className.replace(/(^|\s)no-js(\s|$)/, "$1js$2")
    })(document, window, 0);
    </script>

    <script type="text/javascript">
    var tableToExcel = (function() {
        var uri = 'data:application/vnd.ms-excel;base64,',
            template =
            '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
            base64 = function(s) {
                return window.btoa(unescape(encodeURIComponent(s)))
            },
            format = function(s, c) {
                return s.replace(/{(\w+)}/g, function(m, p) {
                    return c[p];
                })
            }
        return function(table, name) {
            if (!table.nodeType) table = document.getElementById(table)
            var ctx = {
                worksheet: name || 'Worksheet',
                table: table.innerHTML
            }
            window.location.href = uri + base64(format(template, ctx))
        }
    })()
    </script>

</head>
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
                            <div class="abba_parent_card"
                                style="background: linear-gradient(0deg, rgba(12,3,160,1) 0%, rgba(0,127,251,1) 53%, rgba(0,127,251,1) 100%);">
                                <div class="row" style="margin-top: 12px;">
                                    <div class="col-8">
                                        <h6
                                            style="font-size: 12px; margin-top: 5px; margin-left: 10px; color: #ffffff;">
                                            Submitted</h6>
                                        <p></p>
                                        <h4 style="margin-left: 10px; color: #ffffff;" id="total_classe"></h4>
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
                            <div class="abba_parent_card"
                                style="background: linear-gradient(0deg, rgba(12,3,160,1) 0%, rgba(0,127,251,1) 53%, rgba(0,127,251,1) 100%);">
                                <div class="row" style="margin-top: 12px;">
                                    <div class="col-8">
                                        <h6
                                            style="font-size: 12px; margin-top: 5px; margin-left: 10px; color: #ffffff;">
                                            Total Topics</h6>
                                        <p></p>
                                        <h4 style="margin-left: 10px; color: #ffffff;" id="total_tooo"></h4>
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
                                        role="tab" aria-controls="config-tabs-3" aria-selected="false">Progressreport</a>
                                </li>
                            </ul>


                            <div class="tab-content" id="abba-config-content">

                                <div class="tab-pane fade show active" id="config-tabs-3" role="tabpanel"
                                    aria-labelledby="config-tab-3">
                                    <?php include 'ekene_progressreporttwo.php'; ?>
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
    
    <div class="modal fade" id="ekene_progress_report2" tabindex="-1" aria-labelledby="ekene_progress_reporttmodalLabel" aria-hidden="true" >
			     	<div class="modal-dialog modal-xl" style="width:80%;">
					   <div class="modal-content" style="border-radius: 20px;">
							<div class="modal-header">
							
							</div>
							<div class="modal-body">
					
								<!-- <input type="hidden" id=""> -->

								<!-- <div id="publishandunpulishassignment"></div> -->
                              

							<div class="col-12 mt-3">
								
										<div class="row mt-4">
											<div class="col-12 mt-3" id="display_progress_reporttwo">
                                            <?php

                                                $pros_select_record_not_found = mysqli_query($link, "SELECT * FROM defaultimages WHERE ImageName='abba-no-record-found-image2'");
                                                $pros_select_record_not_found_count = mysqli_num_rows($pros_select_record_not_found);
                                                $pros_select_record_not_found_row = mysqli_fetch_assoc($pros_select_record_not_found);

                                                if ($pros_select_record_not_found_count > 0) {
                                                    $pros_general_no_record = $pros_select_record_not_found_row['BaseSixtyFour'];
                                                    echo '

                                                    <img class="mb-1" src="'.$pros_general_no_record.'" width="100" alt="">
                                                    <p style="color: black;">No record found.</p>';
                                                }


                                                ?>

											
											</div>
										</div>
								

							</div>
							</div>
						
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.min.js">
    </script>

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


    <!-- image cropper js -->
    <script src="../../assets/plugins/Croppie/croppie.js"></script>
    <script src="../../assets/plugins/Croppie/croppie.min.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    'use strict';

    ;
    (function(document, window, index) {
        var inputs = document.querySelectorAll('.abba-inputfile');
        Array.prototype.forEach.call(inputs, function(input) {
            var label = input.nextElementSibling,
                labelVal = label.innerHTML;

            input.addEventListener('change', function(e) {
                var fileName = '';
                if (this.files && this.files.length > 1)
                    fileName = (this.getAttribute('data-multiple-caption') || '').replace(
                        '{count}', this.files.length);
                else
                    fileName = e.target.value.split('\\').pop();

                if (fileName)
                    label.querySelector('span').innerHTML = fileName;
                else
                    label.innerHTML = labelVal;
            });

            // Firefox bug fix
            input.addEventListener('focus', function() {
                input.classList.add('has-focus');
            });
            input.addEventListener('blur', function() {
                input.classList.remove('has-focus');
            });
        });
    }(document, window, 0));
    </script>

<script src="../../controller/js/app/progressreport.js"></script>
</body>

</html>