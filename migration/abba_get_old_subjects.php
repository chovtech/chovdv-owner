<?php include('../controller/config/config.php'); ?>
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

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha3/css/bootstrap.min.css">

    <!-- notification css-->
    <link href="../../assets/plugins/notify/wnoty.css" rel="stylesheet">

    <!-- html2pdf CDN link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>

    <div class="grid-container">

        <!----Main----->
        <main class="main-container">



            <div class="main-cards" style="margin-top: 50px;">
                <div class="container">
                    <h1>Download CSV FILE</h1>
                    <div class="row g-2 mt-3">
                        <div class="col-md-2 col-lg-2">
                            <select style="color: #666666;" class="form-select form-select-sm abba_get_campus"
                                aria-label=".form-select-sm example">
                                <option value="NULL">CAMPUS</option>

                                <?php
                                $abba_sql_campus = ("SELECT * FROM `campus` WHERE CampusName != 'Virtual campus' ORDER BY CampusName ASC");
                                $abba_query_link_campus = mysqli_query($link, $abba_sql_campus);
                                $abba_get_details_campus = mysqli_fetch_assoc($abba_query_link_campus);
                                $abba_row_cnt_campus = mysqli_num_rows($abba_query_link_campus);

                                echo '<option value="NULL">Select Campus</option>';

                                if ($abba_row_cnt_campus > 0) {
                                    $cnt = 0;

                                    do {
                                        $cnt++;

                                        $abba_campus_id = $abba_get_details_campus['CampusID'];

                                        $abba_campus_name = $abba_get_details_campus['CampusName'];

                                        echo '<option value="' . $abba_campus_id . '">' . $abba_campus_name . '</option>';

                                    } while ($abba_get_details_campus = mysqli_fetch_assoc($abba_query_link_campus));
                                } else {
                                    echo '<option value="NULL">No Records Found</option>';
                                }
                                ?>

                            </select>
                        </div>


                        <div class="col-md-2 col-lg-2">
                            <select style="color: #666666;" class="form-select form-select-sm abba_get_session"
                                aria-label=".form-select-sm example">
                                <option value="NULL">SESSION</option>


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

                        <div class="col-md-2 col-lg-2">
                            <select style="color: #666666;" class="form-select form-select-sm abba_get_term"
                                aria-label=".form-select-sm example">
                                <option value="NULL">TERM</option>

                                <?php

                                    $abba_sql_term = ("SELECT * FROM `termorsemester` ORDER BY TermOrSemesterName DESC");
                                    $abba_result_term = mysqli_query($link, $abba_sql_term);
                                    $abba_row_term = mysqli_fetch_assoc($abba_result_term);
                                    $abba_row_cnt_term = mysqli_num_rows($abba_result_term);
    
                                    if ($abba_row_cnt_term > 0) {
                                        do {
                                            if ($abba_row_term['status'] == '1') {
                                                $abba_selected_term = 'selected';
                                            } else {
                                                $abba_selected_term = '';
                                            }
                                            echo '<option value="' . $abba_row_term['TermOrSemesterName'] . '" ' . $abba_selected_term . '>' . $abba_row_term['TermOrSemesterName'] . '</option>';
    
                                        } while ($abba_row_term = mysqli_fetch_assoc($abba_result_term));
                                    } else {
                                        echo '<option value="0">No Records Found</option>';
                                    }
                                ?>

                            </select>
                        </div>

                        <div class="col-md-2 col-lg-2">
                            <button type="button"
                                style="margin-left: 10px; font-size: 11px; border-radius: 5px;"
                                class="btn btn-primary btn-sm abba_download_subject_list">Download csv</button>
                        </div>

                    </div>
                </div>

            </div>

        </main>
        <!-- End Main -->

    </div>

    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>

    <script src="../../js/app_js/printtables/waves.js"></script>
    <script src="../../js/app_js/printtables/jspdf.debug.js"></script>
    <script src="../../js/app_js/printtables/html2canvas.min.js"></script>
    <script src="../../js/app_js/printtables/html2pdf.min.js"></script>

    <!--Custom JS--->
    <script src="../../js/app_js/appScript.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- onboarding js -->
    <script src="../../controller/js/app/finance-onboarding.js"></script>

    <!-- notification js -->
    <script src="../../assets/plugins/notify/wnoty.js"></script>

    <script>

        $('body').on('click', '.abba_download_subject_list', function () {

            var abba_campus = $('.abba_get_campus option:selected').val();
            var abba_campus_name = $('.abba_get_campus option:selected').text();
            var abba_term = $('.abba_get_term option:selected').val();
            var abba_session = $('.abba_get_session option:selected').val();
            
            $(this).html('<i class="fas fa-spinner fa-spin"></i>Downloading csv...');

            if(abba_campus == 0 || abba_campus == 'NULL')
            {
                alert('Ogah select Campus!!!');
                $('.abba_download_subject_list').html('Download csv');
            }
            else
            {
                var dataString = '&abba_campus=' + abba_campus + '&abba_term=' + abba_term + '&abba_session=' + abba_session + '&abba_campus_name=' + abba_campus_name;

                // alert(dataString);
                $.ajax({
                    type: "POST",
                    url: "scripts/subject/abba-get-subject-list.php",
                    data: dataString,
                    cache: false,
            
                    success: function (result) {
                        alert(result);
                        // $("#subjectlistLink").attr("href", result)
                        // $('#DownloadClassListModal').modal('show');
            
                        // $.wnoty({
                        //     type: 'success',
                        //     message: 'Download is ongoing',
                        //     autohideDelay: 5000, // 5 seconds
                        //     position: 'top-right',
                        //     autohide: true
                        // });
                        
                        var jsonData = JSON.parse(result);
            
                        var downloadPaths = jsonData.downloadPaths;
            
                        var downloadname = jsonData.downloadname;
                        
                        var abbafilename = jsonData.abbafilename;
                            
                            
                        var $a = $("<a>")
                            .attr("href", downloadPaths)
                            .attr("download", downloadname)
                            .appendTo("body");
        
                        // Trigger a click event on the anchor element
                        $a[0].click();
        
                        // Cleanup - remove the anchor element
                        $a.remove();
                        
                        // alert(abbafilename);
                        
                        // $.ajax({
                        //     type: "POST",
                        //     url: "scripts/subject/abba_delete_csv_file.php",
                        //     data: { abbafilename:abbafilename },
                        //     cache: false,
                    
                        //     success: function (result) {
                                alert('Download successfull');
                                
                                $('.abba_download_subject_list').html('Download csv');
                        //     }
                            
                        // });
                            
                    }
                });
            }

        });

    </script>

</body>

</html>