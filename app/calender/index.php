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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

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

	<style>

.today {
        background-color: #007ffb !important;
        color: white;
    }
    
	* {
  margin: 0;
  padding: 0;
}

.container {
  margin-top: 20px;
}

th {
  height: 30px;
  text-align: center;
  font-weight: 700;
}

td {
  height: 100px;
}

th:nth-of-type(7),
td:nth-of-type(7) {
  font-weight: bold;
}

th:nth-of-type(1),
td:nth-of-type(1) {
  font-weight: bold;
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
			
			<div class="main-cards">
				<div class="container p-5" style="background-color:#ffffff; border-radius:10px;">

				<div class="row">
					<div class="col">
						<i class="prev-month fa fa-chevron-left fa-2x mt-2" style="color:#007ffb;"></i> <i class="next-month fa fa-chevron-right fa-2x mt-2" style="color:#007ffb;"></i>
					</div>

					<div class="col">
						<div class="month-year text-center" style="color:#007ffb;">
							<h4></h4>
						</div>
					</div>

					<div class="col">
						<button type="button" class="btn btn-outline-primary float-end emma_add_event_button_for_calender" data-bs-toggle="modal" data-bs-target="#emma_event_button">Add event</button>
					</div>
				</div>

					<table class="table table-bordered" style="color:#007ffb;">
						<tr>
						<th>S</th>
						<th>M</th>
						<th>T</th>
						<th>W</th>
						<th>T</th>
						<th>F</th>
						<th>S</th>
						</tr>
					</table>
          <div class="emmadotheloads"></div>
				</div>
			</div>
		</main>
         <!-- End Main -->

			<!-- Modal -->
			<div class="modal fade" id="emma_event_button" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">

					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Event</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>

					<div class="modal-body emma_preloader_for_modal_body">
						<div class="row">
                            <div class="col-6">
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Date</span>
                                    <input type="date" class="form-control emma_start_event_date" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>

                        </div>

            <div class="row">
              <div class="col-6 col-sm-6">
                <div class="form-group abba_local-forms emma_select_purposes">
                    <label>Session<span style="color:orangered;">*</span></label>
                    <select class="form-control" id="emma_load_session">
                        <option value="NULL">Select Session</option>
                    </select>
                </div>
              </div>

              <div class="col-6 col-sm-6">
                <div class="form-group abba_local-forms emma_select_purposes">
                    <label>Term<span style="color:orangered;">*</span></label>
                    <select class="form-control" id="emma_load_term">
                        <option value="NULL">Select Term</option>
                    </select>
                </div>
              </div>
            </div>

            <div id="emma_load_calender_card_values"></div>
            <small class="float-end add_new_purpose_and_title_for_calender" style="color:#007ffb; cursor:pointer;">Add New <i class="fas fa-plus-circle"></i></small>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary emma_create_event_button">Add Event</button>
					</div>
					</div>
				</div>
			</div>

			<!-- modal for event update and delete  -->

			<!-- Button trigger modal -->
				<!-- Modal -->
				<div class="modal fade" id="emma_calender_launch_update_and_delete_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title text-primary" id="exampleModalLabel">Events</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="emmaloadmodalevent"></div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary text-white" data-bs-dismiss="modal">Close</button>
					</div>
					</div>
				</div>
				</div>


          <!-- Modal -->
          <div class="modal fade" id="emmatogglemodalforedit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title text=primary" id="exampleModalLabel">Edit Event</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <input type="hidden" class="emmadataidforedit">
                    <label>Edit Title<span style="color:orangered;">*</span></label>
                    <input type="text" class="form-control emma_load_event_edit" placeholder="Edit Title">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary emma_save_edit_for_calender">Save Changes</button>
                </div>
              </div>
            </div>
          </div>


           <!-- Modal -->
           <div class="modal fade" id="emmatogglemodalfordelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title text-danger" id="exampleModalLabel">Delete Event</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-danger">
                  <input type="hidden" class="emma_load_event_delete">
                  <h6 align="center">Are you sure you want to delete this event?</h6>

                  <input type="hidden" class="emmaloadyearfordelete">
                  <input type="hidden" class="emmaloadmonthfordelete">
                  <input type="hidden" class="emmaloaddayfordelete">

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-danger text-white emma_save_delete_for_calender">Yes! Delete</button>
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

	<script src="../../controller/js/app/emma_calender.js"></script>
    
  <!-- emma calender  -->
  <script src="../../controller\js\admin\emma_calender.js"></script>
    <!-- current page js -->
    <?php include('../../js/current_page.php'); ?>

    
    
</body>

</html>