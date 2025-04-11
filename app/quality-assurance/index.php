<?php 
include('../../controller/session/session-checker-owner.php'); ?>
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

    <!-- settings sheet -->
    <link rel="stylesheet" href="../../css/app_css/settings.css">

    <!-- notification css-->
    <link href="../../assets/plugins/notify/wnoty.css" rel="stylesheet">
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

    <!-- html2pdf CDN link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
    integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>




</head>
<style>
.emmadropbtn {
  /* background-color: #04AA6D; */
  /* color: white; */
  padding: 16px;
  font-size: 16px;
  border: none;
}

.emmadropdown {
  position: relative;
  display: inline-block;
}

.emmadropdown-content {
  display: none;
  position: absolute;
  /* background-color: #f1f1f1; */
  min-width: 160px;
  box-shadow: 5px 8px 16px 5px rgba(0,0,0,0.3);
  z-index: 1;
  color:white;
}

.emmadropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* .emmadropdown:hover .emmadropdown-content {
  display: block;
} */

/* .emmadropdown:hover .emmadropbtn {
  
} */

/* .emmadropdown-content a:hover {background-color: #ddd;} */

/* .emmadropdown:hover .emmadropdown-content {display: block;} */

/* .emmadropdown:hover .emmadropbtn {background-color: #3e8e41;} */
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
        
        <div class="main-cards" style="margin-top: 10px;">
            <div class="container">
                <div class="row">

                    <div class="col-3">
                        <h4 class="">Documents</h4>
                    </div>

                    <div class="col-2"></div>

                    <div class="col-6 justify-content-end d-flex" style="display:inline;">
                        <!-- <div style="background-color:#dedada; width:120px;"> -->
                            <!-- <div align="center"> -->
                                <!-- <button class="btn-white mt-2" style="border:none;">All</button>
                                <button  class="btn-white" style="border:none;">Share URL</button> -->
                            <!-- </div> -->
                    <!-- </div> -->
                    </div>

                </div>
            </div>

            <div class="row mt-4">
                    <div class="col-lg-3 col-md-6 emma_hide_staff_collapsible">
                        <div class="card emma_main_folder_card" style="border-radius:10px;">
                            <div class="card-body">
                                <h6 style="display:inline;">FAVORITES</h6>
                                <button class="btn btn-sm text-small text-light btn-primary text-white ms-3 emma_add_new_button float-end" style="display:inline; color:#4DA1FF;font-size:10px;" data-bs-toggle="modal" data-bs-target="#emma_add_new_Modal"><i class="fas fa-plus"></i> Add New</button>
                                
                                <div class="emma_load_body_content p-2">
                                        
                                </div>
                                <div align="center" style="margin-top: 30px;" id="emma-data-room-paginationcont"></div>
                                

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-12 preloaderforthirdfile">

                        <div class="card" style="border-radius:10px;">
                            <div class="row mt-2">
                                <div class="col-8 ps-4" style="cursor:pointer;">
                                    <span class="emma_first_folder_name_display">
                                        
                                    </span>
                                    <span class="emma_second_folder_name_display">
                                        
                                    </span>
                                    <span class="emma_third_folder_name_display">
                                        
                                    </span>
                                </div>

                                <div class="col-4">
                                    <span>
                                        <form id="searchform">
                                            <div class="input-group input-group-sm mb-3">
                                                <input type="text" id="searchvalue" class="form-control" placeholder="Search" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                    <span class="input-group-text me-2" id="inputGroup-sizing-sm" data-bs-toggle="dropdown" data-bs-target="#multiCollapseExample1">
                                                        <i class="fas fa-search" id="emma-search_icon" onclick="loadSearchContents()"></i>
                                                    </span><br>
                                                <div class="dropdown multi-collapse" id="multiCollapseExample1" style="z-index: 1000;">
                                                    <div style="border: 1px solid black;">
                                                        <div id="emma_load_search_contents">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </span>
                                </div>

                            </div>

                            <div class="card-body">
                                <div class="emma_load_folder_content">
                                    <div class="p-5" align="center" style="opacity:0.3;">
                                        <?php
                                            $select_for_main_folder_image_in_first_table = "SELECT * FROM `defaultimages` WHERE `ImageName` = 'filter_image_for_background' ";
                                            $select_for_main_folder_image_in_first_table_query = mysqli_query($link, $select_for_main_folder_image_in_first_table);
                                            $select_for_main_folder_image_in_first_table_fetch = mysqli_fetch_assoc($select_for_main_folder_image_in_first_table_query);
                                            $select_for_main_folder_image_in_first_table_num_of_rows = mysqli_num_rows($select_for_main_folder_image_in_first_table_query);

                                                $fetch_image_from_first_folder_image = $select_for_main_folder_image_in_first_table_fetch["BaseSixtyFour"];

                                            echo '<img src="'.$fetch_image_from_first_folder_image.'" alt="" style="width:40%;">
                                                  <br>
                                                  <h6>Select a folder to view content</h6>';
                                        ?>
                                    </div>

                                    <!-- <div id="emma_loadcontent_for_downloadtest"></div> -->
                                </div>
                            </div>
                        </div>

                    <p>
                        
                    </p>

                    
            </div>
        </div>
    </main>
         <!-- End Main -->
                <!-- Create for first or main folder  -->
        <div class="modal" tabindex="-1" id="emma_add_new_Modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color:#007ffb;"><i class="fas fa-plus-circle" style="color:007ffb;"></i>Create Folder</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                            <div class="col-12 col-sm-12">
                                <div class="form-group abba_local-forms emma_select_class">
                                    <label>Campus<span style="color:orangered;">*</span></label>
                                    <select class="form-control" id="emma_display_campus">
                                        <option value="NULL">Select Campus</option>
                                    </select>
                                </div>
                            </div>

                        <div class="abba_local-forms emma_folder_inputs mt-4">
                            <label>Folder Name<span style="color:orangered;">*</span></label>
                            <input type="text" class="form-control emma_folder_input" placeholder="My Folder">
                            <small>To add multiple folders, separate each with comma</small>
                        </div>

                        <input type="hidden" id="emma_hold_staff_data">
                        <input type="hidden" id="emma_hold_data_id_for_dive_content">
                        <input type="hidden" id="emma_hold_campus_id">

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary emma_close_button" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary emma_create_button">Create</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- emma edit modal for quality assurance  -->
        
        <div class="modal" tabindex="-1" id="emma_add_new_edit_Modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color:#007ffb;"><i class="fas fa-plus-circle" style="color:007ffb;"></i>Create Folder</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                    <input type="hidden" id="this_main_folder_data_id" value="">
                    <input type="hidden" id="this_main_folder_campus_id" value="">

                        <div class="emmaloadthesecontentforedit"></div>
                        <div class="abba_local-forms emma_edit_folder_input mt-4">
                            <label>Folder Name<span style="color:orangered;">*</span></label>
                            <input type="text" class="form-control" id="emma_edit_folder_input">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary emma_edit_close_button" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary emma_edit_create_button">Update</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- modal for delete main folder -->

        <div class="modal fade" id="emma_add_new_delete_Modal" tabindex="-1" aria-labelledby="delClassModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="exampleModalLabel"><i class="fa fa-trash">Delete Folder</i></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6 align="center">
                            Are you sure you want to delete this folder <span id=""> </span>?<br><br>
                            <span class="text-danger">Note all sub folder and files under this would be deleted as well.</span>
                            
                            <input type="hidden" id="main_delete_folder_id">
                            <input type="hidden" id="main_delete_folder_campus_id">
                        </h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fa fa-times"> Close</i></button>
                        <button type="button" class="btn btn-danger btn-sm emmadeletemainfolderbtn"><i class="fa fa-trash"> Yes! Delete</i></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- second modal to filter campus  -->

        <div class="modal" tabindex="-1" id="emma_second_create_new_Modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color:#007ffb;"><i class="fas fa-plus-circle" style="color:007ffb;"></i>Create Folder</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                            <!-- <div class="col-12 col-sm-12">
                                <div class="form-group abba_local-forms emma_select_second_folder">
                                    <label>Campus<span style="color:orangered;">*</span></label>
                                    <select class="form-control" id="emma_display_second_subject_class">
                                        <option value="NULL">Select Campus</option>
                                    </select>
                                </div>
                            </div> -->
                            <input type="hidden" id="emma_received_main_folder_id">
                            <input type="hidden" id="emma_received_campus_id">


                        <div class="abba_local-forms emma_folder_input mt-4">
                            <label>Folder Name<span style="color:orangered;">*</span></label>
                            <input type="text" class="form-control" id="emma_second_folder_input">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary emma_close_button" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary emma_create_second_folder_button">Create</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- second modal for edit  -->
        <div class="modal" tabindex="-1" id="emma_add_new_second_edit_Modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color:#007ffb;"><i class="fas fa-plus-circle" style="color:007ffb;"></i>Edit Folder</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                    <input type="hidden" id="this_is_second_folder_data_id" value="">
                    <input type="hidden" id="this_is_the_data_id" value="">
                    <input type="hidden" id="this_is_second_folder_campus_id" value="">

                    <div class="emma_edit_for_second_folder"></div>
                        <div class="abba_local-forms emma_edit_second_folder_input mt-4">
                            <label>Folder Name<span style="color:orangered;">*</span></label>
                            <input type="text" class="form-control" id="emma_edit_second_folder_input">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary emma_edit_close_button" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary emma_edit_second_folder_create_button">Update</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- emma_second_folder_modal_for_delete  -->

        <div class="modal fade" id="emma_second_folder_delete_Modal" tabindex="-1" aria-labelledby="delClassModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="exampleModalLabel"><i class="fa fa-trash">Delete Folder</i></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6 align="center">
                            Are you sure you want to delete this folder <span id=""> </span>?<br><br>
                            <span class="text-danger">Note all sub folder and files under this would be deleted as well.</span>
                            
                            <input type="hidden" id="emma_delete_second_folder_id">
                            <input type="hidden" id="emma_delete_folder_second_campus_id">
                        </h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fa fa-times"> Close</i></button>
                        <button type="button" class="btn btn-danger btn-sm emmadeletesecondfolderbtn"><i class="fa fa-trash"> Yes! Delete</i></button>
                    </div>
                </div>
            </div>
        </div>


        <div class="emma_load_first_file_modal_content"></div>

            <!-- Modal for first file-->
            <div class="modal fade" id="emma_open_modal_for_first_file" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="firstfolderidforfirstfile">
                        <input type="hidden" id="firstcampusidforfirstfile">

                        <input type="file" id="emma_upload_first_file" value="Upload File">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary upload_button_button_for_first_file">Upload</button>
                    </div>
                    </div>
                </div>
            </div>

            <!-- edit modal for first file  -->
        <div class="modal" tabindex="-1" id="emma_add_new_edit_modal_for_first_file">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color:#007ffb;"><i class="fas fa-plus-circle" style="color:007ffb;"></i>Edit File</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                    <input type="hidden" id="this_main_file_data_id" value="">
                    <input type="hidden" id="this_main_file_campus_id" value="">

                        <div class="emmaloadthesecontentforedit"></div>
                        <div class="abba_local-forms emma_edit_folder_input mt-4">
                            <label>File Name<span style="color:orangered;">*</span></label>
                            <input type="text" class="form-control" id="emma_edit_first_file_input">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary emma_edit_first_file_close_button" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary emma_edit_first_file_create_button">Update</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="load_firstfile_download_content"></div>


        <!-- emma_second_folder_modal_for_delete  -->

        <div class="modal fade" id="emma_first_file_delete_Modal" tabindex="-1" aria-labelledby="delClassModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="exampleModalLabel"><i class="fa fa-trash">Delete File</i></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6 align="center">
                            Are you sure you want to delete this file <span id=""> </span>?<br><br>
                            <span class="text-danger">Note: This file can't be restored.</span>
                            
                            <input type="hidden" id="emma_delete_first_file_data_id">
                            <input type="hidden" id="emma_delete_first_file_campus_id">
                        </h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fa fa-times"> Close</i></button>
                        <button type="button" class="btn btn-danger btn-sm emmadeletefirstfilebtn"><i class="fa fa-trash"> Yes! Delete</i></button>
                    </div>
                </div>
            </div>
        </div>


    <!-- third folder create modal  -->

        <div class="modal" tabindex="-1" id="emma_third_create_new_Modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color:#007ffb;"><i class="fas fa-plus-circle" style="color:007ffb;"></i>Create Folder</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                           
                            <!-- <input type="text" id="emma_received_data_id"> -->
                            <input type="hidden" class="emma_received_second_folder_id">
                            <input type="hidden" class="emma_received_this_campus_id">

                        <div class="abba_local-forms emma_folder_inputs mt-4">
                            <label>Folder Name<span style="color:orangered;">*</span></label>
                            <input type="text" class="form-control" id="emma_third_folder_input">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary emma_close_button" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary emma_create_third_folder_button">Create</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- edit modal for third folder  -->
            <div class="modal" tabindex="-1" id="emma_add_new_edit_modal_for_third_file">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color:#4b9f5d;"><i class="fas fa-plus-circle" style="color:#4b9f5d;"></i>Edit Folder</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                    <input type="hidden" id="this_third_folder_data_id" value="">
                    <input type="hidden" id="this_third_folder_campus_id" value="">


                        <div class="emmaloadthethirdcontentforedit"></div>
                        <div class="abba_local-forms emma_edit_third_folder_input mt-4">
                            <label>Folder Name<span style="color:orangered;">*</span></label>
                            <input type="text" class="form-control" id="emma_edit_third_file_input">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary emma_edit_third_file_close_button" data-bs-dismiss="modal">Close</button>
                        <button type="button" style="background-color:#4b9f5d;" class="btn text-white emma_edit_third_file_create_button">Update</button>
                    </div>
                </div>
            </div>
        </div>

    <!-- third folder delete modal  -->
        <div class="modal fade" id="emma_third_folder_delete_Modal" tabindex="-1" aria-labelledby="delClassModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="exampleModalLabel"><i class="fa fa-trash">Delete File</i></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6 align="center">
                            Are you sure you want to delete this file <span id=""> </span>?<br><br>
                            <span class="text-danger">Note:All files under this folder would be deleted</span>
                            
                            <input type="hidden" id="emma_delete_third_folder_data_id">
                            <input type="hidden" id="emma_delete_third_folder_campus_id">
                        </h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fa fa-times"> Close</i></button>
                        <button type="button" class="btn btn-danger btn-sm emmadeletethirdfolderbtn"><i class="fa fa-trash"> Yes! Delete</i></button>
                    </div>
                </div>
            </div>
        </div>



            <!-- Upload second file  -->
        <div class="modal fade" id="emma_open_modal_for_second_file" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="emma_data_id_for_second_file">
                        <input type="hidden" id="emma_campus_id_for_second_file">

                        <input type="file" id="emma_upload_second_file" value="Upload File">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary upload_button_button_for_second_file">Upload</button>
                    </div>
                    </div>
                </div>
            </div>

            <!-- second modal for file edit  -->
            <div class="modal" tabindex="-1" id="emma_add_new_edit_modal_for_second_file">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color:#007ffb;"><i class="fas fa-plus-circle" style="color:007ffb;"></i>Edit File</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                    <input type="hidden" id="this_second_file_data_id" value="">
                    <input type="hidden" id="this_second_file_campus_id" value="">

                        <div class="emmaloadthesecondfilecontentforedit"></div>
                        <div class="abba_local-forms emma_edit_second_folder_input mt-4">
                            <label>File Name<span style="color:orangered;">*</span></label>
                            <input type="text" class="form-control" id="emma_edit_second_file_input">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary emma_edit_second_file_close_button" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary emma_edit_second_file_create_button">Update</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="load_secondfile_download_content"></div>


        <!-- emma_second_file_modal_for_delete  -->

        <div class="modal fade" id="emma_second_file_delete_Modal" tabindex="-1" aria-labelledby="delClassModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="exampleModalLabel"><i class="fa fa-trash">Delete File</i></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6 align="center">
                            Are you sure you want to delete this file <span id=""> </span>?<br><br>
                            <span class="text-danger">Note: This file can't be restored.</span>
                            
                            <input type="hidden" id="emma_delete_second_file_data_id">
                            <input type="hidden" id="emma_delete_second_file_campus_id">
                        </h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fa fa-times"> Close</i></button>
                        <button type="button" class="btn btn-danger btn-sm emmadeletesecondfilebtn"><i class="fa fa-trash"> Yes! Delete</i></button>
                    </div>
                </div>
            </div>
        </div>


        <!-- create third file  -->


        <div class="modal fade" id="emma_open_modal_for_third_file" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="emma_data_id_for_third_file">
                        <input type="hidden" id="emma_campus_id_for_third_file">

                        <input type="file" id="emma_upload_third_file" value="Upload File">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary upload_button_for_third_file">Upload</button>
                    </div>
                    </div>
                </div>
            </div>


            <!-- third modal for file edit  -->
        <div class="modal" tabindex="-1" id="emma_add_new_edit_modal_for_third_files">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color:#007ffb;"><i class="fas fa-plus-circle" style="color:007ffb;"></i>Edit File</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                    <input type="hidden" id="this_third_file_data_id" value="">
                    <input type="hidden" id="this_third_file_campus_id" value="">

                        <div class="emmaloadthethirdfilecontentforedit"></div>
                        <div class="abba_local-forms emma_edit_this_third_file_input mt-4">
                            <label>File Name<span style="color:orangered;">*</span></label>
                            <input type="text" class="form-control" id="emma_edit_third_files_input">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary emma_edit_third_file_close_button" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary emma_edit_third_files_create_button">Update</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- emma_third_file_modal_for_delete -->
        <div class="modal fade" id="emma_third_files_delete_Modal" tabindex="-1" aria-labelledby="delClassModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="exampleModalLabel"><i class="fa fa-trash">Delete File</i></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6 align="center">
                            Are you sure you want to delete this file <span id=""> </span>?<br><br>
                            <span class="text-danger">Note: This file can't be restored.</span>
                            
                            <input type="danger" id="emma_delete_third_files_data_id">
                            <input type="danger" id="emma_delete_third_files_campus_id">
                        </h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fa fa-times"> Close</i></button>
                        <button type="button" class="btn btn-danger btn-sm emmadeletethirdfilesbtn"><i class="fa fa-trash"> Yes! Delete</i></button>
                    </div>
                </div>
            </div>
        </div>


            <!-- emma load view content for staff  -->
        <div class="load_content_for_pdf">
            <div class="modal fade" id="openstaffdetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">View Staff Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body emmaprintdivecontsapd"> 
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- parent content for staff  -->
            <div class="load_content_for_pdf">
                <div class="modal fade" id="emma_load_modal_content_for_parent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Parent</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body emma_load_parent_file_on_modal">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <!-- parent content for staff  -->
         <div class="load_content_for_pdf">
                <div class="modal fade" id="emma_load_modal_content_for_student" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-primary" id="exampleModalLabel">Student</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body emma_load_student_file_on_modal">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal for second file view  -->
        <div class="">
                <div class="modal fade" id="emma_modal_for_second_file" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-primary" id="exampleModalLabel">Image</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="emma_load_second_image_on_modal"></div>
                            <div id="">
                                <embed src="" id="emma_load_second_file_on_modal" type="application/pdf" width="100%" height="600px"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!--Script-->
    <!--jquery knob -->



    <div id="emma_loadcontent_for_download"></div>


    
    


    

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>


    <!-- notification js -->
    <script src="../../assets/plugins/notify/wnoty.js"></script>

    <!-- image cropper js -->
    <script src="../../assets/plugins/Croppie/croppie.js"></script>
    <script src="../../assets/plugins/Croppie/croppie.min.js"></script>

    <script src="../../js/admin_js/adminScript.js"></script>

    <!-- quality assurance index jquery  -->
    <script src="../../controller/js/app/emma_quality_assurance.js"></script>
    
    <!-- current page js -->
    <?php include('../../js/current_page.php'); ?>

    <script src="../../js/app_js/printtables/waves.js"></script>
    <script src="../../js/app_js/printtables/jspdf.debug.js"></script>
    <script src="../../js/app_js/printtables/html2canvas.min.js"></script>
    <script src="../../js/app_js/printtables/html2pdf.min.js"></script>
    
</body>

</html>