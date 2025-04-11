<?php include('../../controller/session/session-checker-owner.php'); ?>

<?php

    $parentID = $_GET['id'];

    $sqlfromsession = ("SELECT * FROM `parent` WHERE ParentID  ='$parentID'");
    $resultfromsession = mysqli_query($link, $sqlfromsession);
    $rowfromsession = mysqli_fetch_assoc($resultfromsession);
    $row_cntfromsession = mysqli_num_rows($resultfromsession);

    $ParentID = $rowfromsession['ParentID'];
    $InstitutionID = $rowfromsession['InstitutionID'];
    $ParentTitle = $rowfromsession['ParentTitle'];
    $ParentFirstName = $rowfromsession['ParentFirstName'];
    $ParentMiddleName = $rowfromsession['ParentMiddleName'];
    $ParentLastName = $rowfromsession['ParentLastName'];
    $ParentDOB = $rowfromsession['ParentDOB'];
    $ParentGender = $rowfromsession['ParentGender'];
    $OtherPhoneCountryCode = $rowfromsession['OtherPhoneCountryCode'];
    $ParentOtherPhoneNumber = $rowfromsession['ParentOtherPhoneNumber'];
    $WhtasAppPhoneCountryCode = $rowfromsession['WhtasAppPhoneCountryCode'];
    $ParentWhatsappNumber = $rowfromsession['ParentWhatsappNumber'];
    $MainPhoneCountryCode = $rowfromsession['MainPhoneCountryCode'];
    $ParentMainPhoneNumber = $rowfromsession['ParentMainPhoneNumber'];
    $ParentEmail = $rowfromsession['ParentEmail'];
    $ParentReservedEmail = $rowfromsession['ParentReservedEmail'];
    $ReservedAccountStatus = $rowfromsession['ReservedAccountStatus'];
    $ParentOccupation = $rowfromsession['ParentOccupation'];
    $ParentCountry = $rowfromsession['ParentCountry'];
    $ParentState = $rowfromsession['ParentState'];
    $ParentLga = $rowfromsession['ParentLga'];
    $ParentCity = $rowfromsession['ParentCity'];
    $ParentHomeAddress = $rowfromsession['ParentHomeAddress'];
    $ParentOfficeAddress = $rowfromsession['ParentOfficeAddress'];
    $Parent_MeansOfIdentification = $rowfromsession['Parent_MeansOfIdentification'];
    $Parent_IdentificationNumber = $rowfromsession['Parent_IdentificationNumber'];
    $ParentPhoto = $rowfromsession['ParentPhoto'];
    $ParentTrashStatus = $rowfromsession['ParentTrashStatus'];
    $ParentagID = $rowfromsession['tagID'];
    $ParentLang = $rowfromsession['Lang_Val'];
?>

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
        <title>EduMESS | Student Profile</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-..." crossorigin="anonymous" />

    <!-- style sheet -->
    <link rel="stylesheet" href="../../css/app_css/appStyle.css">

    <!-- style sheet -->
    <link rel="stylesheet" href="../../css/app_css/profile.css">

    <!-- phone number country code -->
    <link href="../../assets/plugins/intlTelInput.min.css" rel="stylesheet"/>
    <script src="../../assets/plugins/intlTelInput.min.js"></script>

    <!-- notification css-->
    <link href="../../assets/plugins/notify/wnoty.css" rel="stylesheet">

    <!-- image Croppie -->
    <link rel="stylesheet" href="../../assets/plugins/Croppie/croppie.css"></link>

</head>

<body>

    <div class="grid-container">
        
        <!-- Header -->
        <?php include('../../includes/app-header.php'); ?>
        <!--End Header -->


        <!-- Sidebar -->
        <?php include('../../includes/app-menu.php'); ?>
        <!-- End Sidebar -->


        <!--======Floating Button=========-->
        <!-- Buttons -->
        <?php include('../../includes/floatingbtn.php'); ?>
        <!-- End - Buttons -->
        <!--======Floating Button=========-->


        <!---====Side Modal Start Here====-->
        <?php include('../../includes/setting-menu.php'); ?>
        <!---====Side Modal End Here====-->

        <main class="main-container">
			<!-------Dashboard Content ------------->

			<!-- Profile Header -->
			<div class="row">
				<div class="col-12">
					<div class="card mb-4">
					<div class="user-profile-header-banner">
						<img src="3.png" alt="Banner image" class="rounded-top">
					</div>
					<div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
						<div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
						<?php
						if ($ParentPhoto == '' || $ParentPhoto == '0') {

							echo '<img src="../../assets/images/Staff-Profile-Images/dummy.png" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">';

						} else {

							echo '<img src="' . $ParentPhoto . '" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">';

						}
						?>
						<div class="form-group students-up-files profile-edit-icon mb-0">
							<div class="uplod d-flex">
								<label class="file-upload profile-upbtn mb-0">
								<i class="bx bx-pencil"></i><input type="file">
								</label>
							</div>
						</div>
						</div>
						<div class="flex-grow-1 mt-3 mt-sm-5">
						<div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
							<div class="user-profile-info">
							<h4><?php echo ucfirst(strtolower($ParentFirstName)); ?> <?php echo ucfirst(strtolower($ParentLastName)); ?> <?php echo ucfirst(strtolower($ParentMiddleName)); ?></h4>
							<ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
								<li class="list-inline-item fw-semibold">
								<i class='bx bx-pen'></i> UX Designer
								</li>
								<li class="list-inline-item fw-semibold">
								<i class='bx bx-map'></i> <?php
								if ($ParentHomeAddress == '' || $ParentHomeAddress == '0' || $ParentHomeAddress == 'NULL') {
									echo 'N/A';
								} else {
									echo ucfirst(strtolower($ParentHomeAddress));
								}
								?>
								</li>
								<li class="list-inline-item fw-semibold">
								<i class='bx bx-calendar-alt'></i> Joined April 2021
								</li>
							</ul>
							</div>
							<a href="javascript:void(0)" class="btn btn-primary text-nowrap">
								<i class='bx bx-share-alt'></i> Share Profile
							</a>
						</div>
						</div>
					</div>
					</div>
				</div>
			</div>
			<!--/ Profile Header -->

			<!-- Navbar pills -->
			<div class="row">
				<div class="col-sm-12">
					<!-- Nav tabs -->
					<div class="col-sm-12">
						<ul class="nav nav-tabs mb-3 customtab"  id="ex1" role="tablist">
							<li class="nav-item" role="presentation">
								<a
								class="nav-link active"
								id="ex1-tab-1"
								data-bs-toggle="tab"
								href="#ex1-tabs-1"
								role="tab"
								aria-controls="ex1-tabs-1"
								aria-selected="true">Profile</a>
							</li>
							<li class="nav-item" role="presentation">
								<a
								class="nav-link"
								id="ex1-tab-2"
								data-bs-toggle="tab"
								href="#ex1-tabs-2"
								role="tab"
								aria-controls="ex1-tabs-2"
								aria-selected="false">My Kids</a
								>
							</li>
							<!-- <li class="nav-item" role="presentation">
								<a
								class="nav-link"
								id="ex1-tab-7"
								data-bs-toggle="tab"
								href="#ex1-tabs-7"
								role="tab"
								aria-controls="ex1-tabs-7"
								aria-selected="false">Leave/Permission</a>
							</li> -->
							<li class="nav-item" role="presentation">
								<a
								class="nav-link"
								id="ex1-tab-3"
								data-bs-toggle="tab"
								href="#ex1-tabs-3"
								role="tab"
								aria-controls="ex1-tabs-3"
								aria-selected="false">Wallet</a>
							</li>
							<!-- <li class="nav-item" role="presentation">
								<a
								class="nav-link"
								id="ex1-tab-8"
								data-bs-toggle="tab"
								href="#ex1-tabs-8"
								role="tab"
								aria-controls="ex1-tabs-8"
								aria-selected="false">Attendance Summary</a>
							</li>
							<li class="nav-item" role="presentation">
								<a
								class="nav-link"
								id="ex1-tab-6"
								data-bs-toggle="tab"
								href="#ex1-tabs-6"
								role="tab"
								aria-controls="ex1-tabs-6"
								aria-selected="false">Disciplinary</a>
							</li>
							<li class="nav-item" role="presentation">
								<a
								class="nav-link"
								id="ex1-tab-9"
								data-bs-toggle="tab"
								href="#ex1-tabs-9"
								role="tab"
								aria-controls="ex1-tabs-9"
								aria-selected="false">Education</a>
							</li>
							<li class="nav-item" role="presentation">
								<a
								class="nav-link"
								id="ex1-tab-5"
								data-bs-toggle="tab"
								href="#ex1-tabs-5"
								role="tab"
								aria-controls="ex1-tabs-5"
								aria-selected="false">Employment</a>
							</li>
							<li class="nav-item" role="presentation">
								<a
								class="nav-link"
								id="ex1-tab-4"
								data-bs-toggle="tab"
								href="#ex1-tabs-4"
								role="tab"
								aria-controls="ex1-tabs-4"
								aria-selected="false">Documents</a>
							</li> -->
						</ul>

						<div class="tab-content" id="ex1-content">
							<div
								class="tab-pane fade show active"
								id="ex1-tabs-1"
								role="tabpanel"
								aria-labelledby="ex1-tab-1">

								<!-- User Profile Content -->
								<div class="row p-3">

									<div class="col-sm-4 col-xs-4 col-xl-4 col-lg-5 col-md-5">
										<!-- About User -->
										<div class="card mb-2">
											<div class="card-body">
												<div class="row flex-row d-flex">
													<div class="col-8">
														<p class="text-muted fs-6 fw-bolder">Personal Details</p>
													</div>
													<div class="col-4">
														<i class="btn btn-sm bx bx-pencil bx-sm edit_button pull-right" data-bs-toggle="modal" data-bs-target="#exampleModalT"></i>
													</div>
												</div>
												<ul class="list-unstyled mb-4 mt-3">
												<li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-semibold mx-2">Full Name:</span> <span>
													<?php echo ucfirst(strtolower($ParentFirstName)); ?> 
													<?php echo ucfirst(strtolower($ParentLastName)); ?> 
													<?php echo ucfirst(strtolower($ParentMiddleName)); ?>
												</span></li>
												<li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span class="fw-semibold mx-2">Sex:</span> <span>
													<?php
													if ($ParentGender == '' || $ParentGender == 0) {
														echo 'N/A';
													} else {
														echo ucfirst(strtolower($ParentGender));
													}
													?></span></li>
												<li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span class="fw-semibold mx-2">Status:</span> <span>Active</span></li>
												<li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span class="fw-semibold mx-2">Occupation:</span> <span>
													<?php
													if ($ParentOccupation == '' || $ParentOccupation == 0) {
														echo 'N/A';
													} else {
														echo ucfirst(strtolower($ParentOccupation));
													}
													?></span></li>
												<li class="d-flex align-items-center mb-3"><i class="bx bx-flag"></i><span class="fw-semibold mx-2">Country:</span> <span>
													<?php
													if ($ParentCountry == '' || $ParentCountry == 0) {
														echo 'N/A';
													} else {
														echo ucfirst(strtolower($ParentCountry));
													}
													?></span></li>
												<li class="d-flex align-items-center mb-3"><i class="bx bx-detail"></i><span class="fw-semibold mx-2">Languages:</span> <span>
													<?php
													if ($ParentLang == '' || $ParentLang == 0) {
														echo 'N/A';
													} else {
														echo ucfirst(strtolower($ParentLang));
													}
													?></span></li>
												</ul>
												<hr/>
												<div class="row">
													<div class="col-sm-12">
														<div class="row flex-row d-flex">
															<div class="col-8">
																<p class="text-muted fs-6 fw-bolder">Contacts</p>
															</div>
															<div class="col-4">
																<i class="btn btn-sm bx bx-pencil bx-sm edit_button pull-right" data-bs-toggle="modal" data-bs-target="#exampleModalT"></i>
															</div>
														</div>
													</div>
												</div>
												<ul class="list-unstyled mb-4 mt-3">
												<li class="d-flex align-items-center mb-3"><i class="bx bx-phone"></i><span class="fw-semibold mx-2">Contact:</span> <span>
													<?php
													if ($ParentWhatsappNumber == '' || $ParentWhatsappNumber == 0) {
														echo 'N/A';
													} else {
														echo ($ParentWhatsappNumber);
													}
													?></span></li>
												<!-- <li class="d-flex align-items-center mb-3"><i class="bx bx-chat"></i><span class="fw-semibold mx-2">Skype:</span> <span>
													john.doe</span></li> -->
												<li class="d-flex align-items-center mb-3"><i class="bx bx-envelope"></i><span class="fw-semibold mx-2">Email:</span> <span>
													<?php
													if ($ParentEmail == '' || $ParentEmail == 0) {
														echo 'N/A';
													} else {
														echo ($ParentEmail);
													}
													?></span></li>

												<li class="d-flex align-items-center mb-3"><i class="bx bx-map"></i><span class="fw-semibold mx-2">Address:</span> <span>
													<?php
													if ($ParentHomeAddress == '' || $ParentHomeAddress == 0) {
														echo 'N/A';
													} else {
														echo ucfirst(strtolower($ParentHomeAddress));
													}
													?></span></li>
												</ul>
											</div>
										</div>
										<!--/ About User -->

										<!-- Skills Overview -->
										<div class="card mb-2">
											<div class="card-body">
												<div class="row flex-row d-flex">
													<div class="col-10">
														<p class="text-muted fs-6 fw-bolder">Skills</p>
													</div>
													<div class="col-2">
														<i class="bx bx-pencil bx-sm edit_button pull-right" ></i>
													</div>
												</div>
												<!-- <ul class="list-unstyled mt-3 mb-0">
												<li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span class="fw-semibold mx-2">Task Compiled:</span> <span>13.5k</span></li>
												<li class="d-flex align-items-center mb-3"><i class='bx bx-customize'></i><span class="fw-semibold mx-2">Projects Compiled:</span> <span>146</span></li>
												<li class="d-flex align-items-center"><i class="bx bx-user"></i><span class="fw-semibold mx-2">Connections:</span> <span>897</span></li>
												</ul> -->

												<div class="skill-blk mt-3">
													<div class="skill-statistics">
														<div class="skills-head">
															<span>Excel</span>
															<span>90%</span>
														</div>
														<div class="progress mb-0">
															<div class="progress-bar bg-photoshop" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</div>
													<div class="skill-statistics">
														<div class="skills-head">
															<span>Microsoft Word</span>
															<span>75%</span>
														</div>
														<div class="progress mb-0">
															<div class="progress-bar bg-editor" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</div>
													<div class="skill-statistics mb-0">
														<div class="skills-head">
															<span>Graphic Design</span>
															<span>95%</span>
														</div>
														<div class="progress mb-0">
															<div class="progress-bar bg-illustrator" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!--/ Skills Overview -->
									</div>

									<div class="col-sm-8 col-xs-8 col-xl-8 col-lg-7 col-md-7">
										<!-- Activity Log -->
										<div class="card card-action mb-4">
											<div class="card-header align-items-center">
											<h5 class="card-action-title mb-0"><i class="bx bx-list-ul me-2"></i>Activity Timeline</h5>
											<div class="card-action-element">
												<div class="dropdown">
												<button type="button" id = "timelineWapper" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
												<div class="dropdown-menu dropdown-menu" aria-labelledby="timelineWapper" style="position: absolute;inset: 0px 0px auto auto;margin: 0px;transform: translate3d(0.380952px, 24.7619px, 0px);">
													<a class="dropdown-item" href="javascript:void(0);">Select All</a>
													<a class="dropdown-item" href="javascript:void(0);">Refresh</a>
													<a class="dropdown-item" href="javascript:void(0);">Share</a>
												</div>
												</div>
											</div>
											</div>
											<div class="card-body">
											<ul class="timeline ms-2">
												<li class="timeline-item timeline-item-transparent">
												<span class="timeline-point timeline-point-warning"></span>
												<div class="timeline-event">
													<div class="timeline-header mb-1">
													<h6 class="mb-0">Client Meeting</h6>
													<small class="text-muted">Today</small>
													</div>
													<p class="mb-2">Project meeting with john @10:15am</p>
													<div class="d-flex flex-wrap">
													<div class="avatar me-3">
														<img src="assets/img/avatars/3.png" alt="Avatar" class="rounded-circle">
													</div>
													<div>
														<h6 class="mb-0">Lester McCarthy (Client)</h6>
														<span>CEO of Infibeam</span>
													</div>
													</div>
												</div>
												</li>
												<li class="timeline-item timeline-item-transparent">
												<span class="timeline-point timeline-point-info"></span>
												<div class="timeline-event">
													<div class="timeline-header mb-1">
													<h6 class="mb-0">Create a new project for client</h6>
													<small class="text-muted">2 Day Ago</small>
													</div>
													<p class="mb-0">Add files to new design folder</p>
												</div>
												</li>
												<li class="timeline-item timeline-item-transparent">
												<span class="timeline-point timeline-point-primary"></span>
												<div class="timeline-event">
													<div class="timeline-header mb-1">
													<h6 class="mb-0">Shared 2 New Project Files</h6>
													<small class="text-muted">6 Day Ago</small>
													</div>
													<p class="mb-2">Sent by Mollie Dixon <img src="assets/img/avatars/4.png" class="rounded-circle ms-3" alt="avatar" height="20" width="20"></p>
													<div class="d-flex flex-wrap gap-2">
													<a href="javascript:void(0)" class="me-3">
														<img src="assets/img/icons/misc/pdf.png" alt="Document image" width="20" class="me-2">
														<span class="h6">App Guidelines</span>
													</a>
													<a href="javascript:void(0)">
														<img src="assets/img/icons/misc/xls.png" alt="Excel image" width="20" class="me-2">
														<span class="h6">Testing Results</span>
													</a>
													</div>
												</div>
												</li>
												<li class="timeline-item timeline-item-transparent">
												<span class="timeline-point timeline-point-success"></span>
												<div class="timeline-event pb-0">
													<div class="timeline-header mb-1">
													<h6 class="mb-0">Project status updated</h6>
													<small class="text-muted">10 Day Ago</small>
													</div>
													<p class="mb-0">Woocommerce iOS App Completed</p>
												</div>
												</li>
												<li class="timeline-end-indicator">
												<i class="bx bx-check-circle"></i>
												</li>
											</ul>
											</div>
										</div>
										<!-- End of Activity Log -->

										<!-- Awards -->
										<div class="card card-action">
											<div class="card-body subjects">
												<div class="col-sm-12">
													<div class="row">
														<div class="col-8">
															<span style="font-size: 18px;">
																<strong>Awards</strong>
															</span>
														</div>
														<div class="col-4">
															<i class="btn btn-sm bx bx-plus bx-sm edit_button pull-right" data-bs-toggle="modal" data-bs-target="#exampleModalT"></i>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12 p-1">
														<div>
															<div class="card shadow-sm" style="border: 1px solid #e8ebf0; color: #101114;">
																<div class="row p-3">
																	<div class="col-sm-2">
																		<div class="">
																			<?php
																			if ($ParentGender == '' || $ParentGender == 0) {
																				echo '<img class="tari_award_img" src="../../assets/images/Staff-Profile-Images/dummy.png" width="60">';
																			} else {
																				echo '<img class="tari_award_img" src="../../assets/images/Staff-Profile-Images/' . $ParentPhoto . '" width="60">';
																			}
																			?>
																		</div>
																	</div>
																	<div class="col-sm-8">
																		<span><strong>Title: </strong></span><span style="font-size: 12px;"> Best English Teacher</span> <br>
																		<span style="font-size: 12px;">Institution: Goodtidings Academy Jikwoyi</span><br>
																		<span style="font-size: 10px;">Date: 14th June 2021</span>
																	</div>
																	<div class="col-sm-2">
																		<div class="tariaward">
																			<i class="bx bx-trophy bx-md"></i>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="card-body subjects">
												<div class="row">
													<div class="col-sm-12 p-1">
														<div>
															<div class="card shadow-sm" style="border: 1px solid #e8ebf0; color: #101114;">
																<div class="row p-3">
																	<div class="col-sm-2">
																		<div class="">
																		<?php
																		if ($ParentGender == '' || $ParentGender == 0) {
																			echo '<img class="tari_award_img" src="../../assets/images/Staff-Profile-Images/dummy.png" width="60">';
																		} else {
																			echo '<img class="tari_award_img" src="../../assets/images/Staff-Profile-Images/' . $ParentPhoto . '" width="60">';
																		}
																		?>
																		</div>
																	</div>
																	<div class="col-sm-8">
																		<span><strong>Title: </strong></span><span style="font-size: 12px;"> Best English Teacher</span> <br>
																		<span style="font-size: 12px;">Institution: Goodtidings Academy Jikwoyi</span><br>
																		<span style="font-size: 10px;">Date: 14th June 2021</span>
																	</div>
																	<div class="col-sm-2">
																		<div class="tariaward">
																			<i class="bx bx-trophy bx-md"></i>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- End Awards -->
										
									</div>


								</div>
								<!--/ User Profile Content -->
							</div>
							<div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
								<!-- Mykids Content -->
								<div class="row">
									<div class="col-sm-12 col-xl-12 col-lg-12 col-md-12 p-4">
										<div class="mb-3">
											<div class="card-body subjects">
												<div class="row p-2 gap-5 justify-content-center">

													<div class="card col-sm-5 col-md-6 col-lg-3 shadow-sm">
														<div class="topSecCards" style="width: 100%; ">
															<div class="form-check" style="margin-left: 20px; padding-top: 5px;">
																<input class="form-check-input" style="font-size: 20px;" type="checkbox" value="" id="flexCheckDefault">
															</div>
														
															<span style="float: right; margin-top: -15px; margin-right: 15px;"><i class='bx bx-dots-horizontal-rounded' style="font-size: 22px;"></i></span>

															<button  type="button" class="btn chiActive">
																Active
															</button >

															<div align="center" style="margin-top: 30px;">
																<img src="../../assets/images/adminImg/profile-1.jpg" style="width: 30%; border-radius: 50%;" alt="">
																<h6 style="font-weight: 600; margin-top: 5px;">Unamma Chima</h6>
																<p style="font-weight: 500; color: #b8b8b8;">Teacher</p>
															</div>
															<div style="padding: 7px;">
																<div style="width: 100%; border-radius: 5px; background-color: #e8ebf1;">
																	<div class="row">
																		<div align="center" class="col-6">
																			<div style=" padding-top: 10px;">
																				<Small style="color: #8d8d8d; font-size: 11px;">Attendance</Small>
																				<p style="color: #464545; font-size: 12px; font-weight: 600;">78/90 days</p>
																			</div>
																		</div>
																		<div align="center" class="col-6">
																			<div style=" padding-top: 10px;">
																				<Small style="color: #8d8d8d; font-size: 11px;">Date Hired</Small>
																				<p style="color: #464545; font-size: 12px; font-weight: 600;">03-04-2017</p>
																			</div>
																		</div>
																	</div>

																	<div style="padding: 5px; margin-left: 10px;">
																		<Small style="color: #666666; font-size: 12px;"><i class='bx bx-envelope'></i>  example@gmail.com</Small>
																		<p style="color: #666666; font-size: 12px; font-weight: 600;"><i class='bx bx-phone'></i>+234 193 443 2343</p>
																	</div>
																</div>
															</div>

														</div>
													</div>

													<div class="card col-sm-5 col-md-6 col-lg-3 shadow-sm">
														<div class="topSecCards" style="width: 100%; ">
															<div class="form-check" style="margin-left: 20px; padding-top: 5px;">
																<input class="form-check-input" style="font-size: 20px;" type="checkbox" value="" id="flexCheckDefault">
															</div>
														
															<span style="float: right; margin-top: -15px; margin-right: 15px;"><i class='bx bx-dots-horizontal-rounded' style="font-size: 22px;"></i></span>

															<button type="button" class="btn chiBlock">
																Blocked
															</button>

															<div align="center" style="margin-top: 30px;">
																<img src="../../assets/images/adminImg/profile-2.jpg" style="width: 30%; border-radius: 50%;" alt="">
																<h6 style="font-weight: 600; margin-top: 5px;">Unamma Chima</h6>
																<p style="font-weight: 500; color: #b8b8b8;">Teacher</p>
															</div>
															<div style="padding: 7px;">
																<div style="width: 100%; border-radius: 5px; background-color: #e8ebf1;">
																	<div class="row">
																		<div align="center" class="col-6">
																			<div style=" padding-top: 10px;">
																				<Small style="color: #8d8d8d; font-size: 11px;">Attendance</Small>
																				<p style="color: #464545; font-size: 12px; font-weight: 600;">78/90 days</p>
																			</div>
																		</div>
																		<div align="center" class="col-6">
																			<div style=" padding-top: 10px;">
																				<Small style="color: #8d8d8d; font-size: 11px;">Date Hired</Small>
																				<p style="color: #464545; font-size: 12px; font-weight: 600;">03-04-2017</p>
																			</div>
																		</div>
																	</div>

																	<div style="padding: 5px; margin-left: 10px;">
																		<Small style="color: #666666; font-size: 12px;"><i class='bx bx-envelope'></i>  example@gmail.com</Small>
																		<p style="color: #666666; font-size: 12px; font-weight: 600;"><i class='bx bx-phone'></i>+234 193 443 2343</p>
																	</div>
																</div>
															</div>

														</div>
													</div>

													<div class="card col-sm-5 col-md-6 col-lg-3 shadow-sm">
														<div class="topSecCards" style="width: 100%; ">
															<div class="form-check" style="margin-left: 20px; padding-top: 5px;">
																<input class="form-check-input" style="font-size: 20px;" type="checkbox" value="" id="flexCheckDefault">
															</div>
														
															<span style="float: right; margin-top: -15px; margin-right: 15px;"><i class='bx bx-dots-horizontal-rounded' style="font-size: 22px;"></i></span>

															<button  type="button" class="btn chiActive">
																Active
															</button >

															<div align="center" style="margin-top: 30px;">
																<img src="../../assets/images/adminImg/profile-1.jpg" style="width: 30%; border-radius: 50%;" alt="">
																<h6 style="font-weight: 600; margin-top: 5px;">Unamma Chima</h6>
																<p style="font-weight: 500; color: #b8b8b8;">Teacher</p>
															</div>
															<div style="padding: 7px;">
																<div style="width: 100%; border-radius: 5px; background-color: #e8ebf1;">
																	<div class="row">
																		<div align="center" class="col-6">
																			<div style=" padding-top: 10px;">
																				<Small style="color: #8d8d8d; font-size: 11px;">Attendance</Small>
																				<p style="color: #464545; font-size: 12px; font-weight: 600;">78/90 days</p>
																			</div>
																		</div>
																		<div align="center" class="col-6">
																			<div style=" padding-top: 10px;">
																				<Small style="color: #8d8d8d; font-size: 11px;">Date Hired</Small>
																				<p style="color: #464545; font-size: 12px; font-weight: 600;">03-04-2017</p>
																			</div>
																		</div>
																	</div>

																	<div style="padding: 5px; margin-left: 10px;">
																		<Small style="color: #666666; font-size: 12px;"><i class='bx bx-envelope'></i>  example@gmail.com</Small>
																		<p style="color: #666666; font-size: 12px; font-weight: 600;"><i class='bx bx-phone'></i>+234 193 443 2343</p>
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
							</div>
							<div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
								<!-- Salary -->
								<div class="row p-3">
									<div class="col-xl-4 col-lg-5 col-md-5">
										<div class="card_tari card-1">
											<div class="row mt-3 p-3">
												<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 col--12">
													<div class="row d-flex flex-row">
														<div class="col-6">
															<h5 class="card-title text-white fw-lighter"> Monthly Earnings </h5>
															<div class="mt-5">
																<span class=" text-info">Next 2nd April, 2022</span>
															</div>
															<!-- <span class="fw-semibold fs-6 text-white mx-2"> Salary Ammount</span> -->
														</div>
														<div class="col-4 p-1">
															<img src="../../assets/images/Staff-Profile-Images/coin.png" width="140"/>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-12 p-3" style="margin-top: 100px;">
													<span class="fw-semibold fs-1 text-white mx-2">₦45, 000</span>
												</div>
											</div>
										</div>
										<!--Account Details -->
										<div class="card mb-2">
											<div class="card-body">
												<div class="row flex-row d-flex">
													<div class="col-10">
														<p class="text-muted fs-6 fw-bolder">Bank Details</p>
													</div>
													<div class="col-2">
														<i class="bx bx-pencil bx-sm edit_button" ></i>
													</div>
												</div>
												<ul class="list-unstyled mb-4 mt-3">
												<li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-semibold mx-2">Account Name:</span> <span>
													<?php echo ucfirst(strtolower($ParentFirstName)); ?> 
													<?php echo ucfirst(strtolower($ParentLastName)); ?> 
													<?php echo ucfirst(strtolower($ParentMiddleName)); ?>
												</span></li>
												<li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span class="fw-semibold mx-2">Bank Name:</span> <span>
													<?php
													if ($ParentGender == '' || $ParentGender == 0) {
														echo 'N/A';
													} else {
														echo ucfirst(strtolower($ParentGender));
													}
													?></span></li>
												<li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span class="fw-semibold mx-2">Account Number:</span> <span>Active</span></li>
												<li class="d-flex align-items-center mb-3"><i class="bx bx-flag"></i><span class="fw-semibold mx-2">Country:</span> <span>
													<?php
													if ($ParentCountry == '' || $ParentCountry == 0) {
														echo 'N/A';
													} else {
														echo ucfirst(strtolower($ParentCountry));
													}
													?></span></li>
												</ul>
											</div>
										</div>
										<!--/ Aount Details -->
									</div>

									<div class="col-xl-8 col-lg-7 col-md-7">
										<!-- Transaction History -->
										<div class="row">
											<div class="col-sm-12 d-flex align-items-stretch">
											<div class="card w-100">
												<div class="card-body p-5">
												<div class="mb-4">
													<h5 class="card-title fw-semibold">Recent Transactions</h5>
												</div>
												<ul class="nav nav-tabs mb-3 customtab" id="exs" role="tablist">
													<li class="nav-item" role="presentation">
														<a
														class="nav-link active"
														id="exs-tab-1"
														data-bs-toggle="tab"
														href="#exs-tabs-1"
														role="tab"
														aria-controls="exs-tabs-1"
														aria-selected="true">Salary</a>
													</li>
													<li class="nav-item" role="presentation">
														<a
														class="nav-link"
														id="ext-tab-2"
														data-bs-toggle="tab"
														href="#ext-tabs-2"
														role="tab"
														aria-controls="ext-tabs-2"
														aria-selected="false">Transaction</a
														>
													</li>
												</ul>
												<div class="tab-content" id="exs-content">
													<div class="tab-pane fade show active" id="exs-tabs-1" role="tabpanel" aria-labelledby="exs-tab-1">
														<!-- Salary Content -->
														<div class="row p-1">
															<ul class="timeline-widget mb-0 position-relative mb-n5">
																<li class="timeline-item d-flex position-relative overflow-hidden">
																	<div class="timeline-time text-dark flex-shrink-0 text-end">09:30</div>
																	<div class="timeline-badge-wrap d-flex flex-column align-items-center">
																	<span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
																	<span class="timeline-badge-border d-block flex-shrink-0"></span>
																	</div>
																	<div class="timeline-desc fs-3 text-dark mt-n1">Payment received from John Doe of $385.90</div>
																</li>
																<li class="timeline-item d-flex position-relative overflow-hidden">
																	<div class="timeline-time text-dark flex-shrink-0 text-end">10:00 am</div>
																	<div class="timeline-badge-wrap d-flex flex-column align-items-center">
																	<span class="timeline-badge border-2 border border-info flex-shrink-0 my-8"></span>
																	<span class="timeline-badge-border d-block flex-shrink-0"></span>
																	</div>
																	<div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">New sale recorded <a
																		href="javascript:void(0)" class="text-primary d-block fw-normal">#ML-3467</a>
																	</div>
																</li>
																<li class="timeline-item d-flex position-relative overflow-hidden">
																	<div class="timeline-time text-dark flex-shrink-0 text-end">12:00 am</div>
																	<div class="timeline-badge-wrap d-flex flex-column align-items-center">
																	<span class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
																	<span class="timeline-badge-border d-block flex-shrink-0"></span>
																	</div>
																	<div class="timeline-desc fs-3 text-dark mt-n1">Payment was made of $64.95 to Michael</div>
																</li>
																<li class="timeline-item d-flex position-relative overflow-hidden">
																	<div class="timeline-time text-dark flex-shrink-0 text-end">09:30 am</div>
																	<div class="timeline-badge-wrap d-flex flex-column align-items-center">
																	<span class="timeline-badge border-2 border border-warning flex-shrink-0 my-8"></span>
																	<span class="timeline-badge-border d-block flex-shrink-0"></span>
																	</div>
																	<div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">New sale recorded <a
																		href="javascript:void(0)" class="text-primary d-block fw-normal">#ML-3467</a>
																	</div>
																</li>
																<li class="timeline-item d-flex position-relative overflow-hidden">
																	<div class="timeline-time text-dark flex-shrink-0 text-end">09:30 am</div>
																	<div class="timeline-badge-wrap d-flex flex-column align-items-center">
																	<span class="timeline-badge border-2 border border-danger flex-shrink-0 my-8"></span>
																	<span class="timeline-badge-border d-block flex-shrink-0"></span>
																	</div>
																	<div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">New arrival recorded 
																	</div>
																</li>
																<li class="timeline-item d-flex position-relative overflow-hidden">
																	<div class="timeline-time text-dark flex-shrink-0 text-end">12:00 am</div>
																	<div class="timeline-badge-wrap d-flex flex-column align-items-center">
																	<span class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
																	</div>
																	<div class="timeline-desc fs-3 text-dark mt-n1">Payment Done</div>
																</li>
															</ul>
														</div>
														<!--/Salary Content -->
												</div>
												<div class="tab-pane fade" id="ext-tabs-2" role="tabpanel" aria-labelledby="ext-tab-2">
													<!-- Transaction Content -->
													<div class="row p-1">
														<ul class="timeline-widget mb-0 position-relative mb-n5">
															<li class="timeline-item d-flex position-relative overflow-hidden">
																<div class="timeline-time text-dark flex-shrink-0 text-end">09:30</div>
																<div class="timeline-badge-wrap d-flex flex-column align-items-center">
																<span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
																<span class="timeline-badge-border d-block flex-shrink-0"></span>
																</div>
																<div class="timeline-desc fs-3 text-dark mt-n1">Payment received from John Doe of $385.90</div>
															</li>
															<li class="timeline-item d-flex position-relative overflow-hidden">
																<div class="timeline-time text-dark flex-shrink-0 text-end">10:00 am</div>
																<div class="timeline-badge-wrap d-flex flex-column align-items-center">
																<span class="timeline-badge border-2 border border-info flex-shrink-0 my-8"></span>
																<span class="timeline-badge-border d-block flex-shrink-0"></span>
																</div>
																<div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">New sale recorded <a
																	href="javascript:void(0)" class="text-primary d-block fw-normal">#ML-3467</a>
																</div>
															</li>
															<li class="timeline-item d-flex position-relative overflow-hidden">
																<div class="timeline-time text-dark flex-shrink-0 text-end">12:00 am</div>
																<div class="timeline-badge-wrap d-flex flex-column align-items-center">
																<span class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
																<span class="timeline-badge-border d-block flex-shrink-0"></span>
																</div>
																<div class="timeline-desc fs-3 text-dark mt-n1">Payment was made of $64.95 to Michael</div>
															</li>
															<li class="timeline-item d-flex position-relative overflow-hidden">
																<div class="timeline-time text-dark flex-shrink-0 text-end">09:30 am</div>
																<div class="timeline-badge-wrap d-flex flex-column align-items-center">
																<span class="timeline-badge border-2 border border-warning flex-shrink-0 my-8"></span>
																<span class="timeline-badge-border d-block flex-shrink-0"></span>
																</div>
																<div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">New sale recorded <a
																	href="javascript:void(0)" class="text-primary d-block fw-normal">#ML-3467</a>
																</div>
															</li>
															<li class="timeline-item d-flex position-relative overflow-hidden">
																<div class="timeline-time text-dark flex-shrink-0 text-end">09:30 am</div>
																<div class="timeline-badge-wrap d-flex flex-column align-items-center">
																<span class="timeline-badge border-2 border border-danger flex-shrink-0 my-8"></span>
																<span class="timeline-badge-border d-block flex-shrink-0"></span>
																</div>
																<div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">New arrival recorded 
																</div>
															</li>
															<li class="timeline-item d-flex position-relative overflow-hidden">
																<div class="timeline-time text-dark flex-shrink-0 text-end">12:00 am</div>
																<div class="timeline-badge-wrap d-flex flex-column align-items-center">
																<span class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
																</div>
																<div class="timeline-desc fs-3 text-dark mt-n1">Payment Done</div>
															</li>
															</ul>
													</div>
													<!--/Transaction Content -->
												</div>
												</div>
												</div>
											</div>
											</div>
										</div>
										<!-- End Transaction History -->
									</div>
								</div>
								<!--/ Salary -->
							</div>
							<div class="tab-pane fade" id="ex1-tabs-4" role="tabpanel" aria-labelledby="ex1-tab-4">
								<div class="row p-5">
									<div class="col-xl-5 col-lg-5 col-md-5">
										<!-- Documents -->
										<div class="card mb-2">
											<div class="card-body">
												<div class="row flex-row d-flex">
													<div class="col-10">
														<p class="text-muted fs-6 fw-bolder">Documents</p>
													</div>
												</div>
												<ul class="list-unstyled mb-4">
												<li class="d-flex align-items-center mb-3">
												</span> <span>
												</span></li>
												<li class="d-flex align-items-center mb-3"><i class="bx bx-file"></i><span class="fw-semibold mx-2">First School Leaving Certificate</span> <i class="bx bx-pencil bx-xs edit_button ms-1" ></i>
												<button type="button" 
												style ="padding: .25rem .4rem;
													font-size: .55rem;
													line-height: .5;
													margin-left: 5px;
													border-radius: .2rem;" class="btn btn-xs btn-outline-primary">Upload</button><span></span>
													<span><i class="bx bx-show-alt edit_button ms-1"></i></span>
												</li>
												<li class="d-flex align-items-center mb-3"><i class="bx bx-file"></i><span class="fw-semibold mx-2">WAEC</span> <i class="bx bx-pencil bx-xs edit_button ms-1" ></i>
													<button type="button" 
													style ="padding: .25rem .4rem;
														font-size: .55rem;
														line-height: .5;
														margin-left: 5px;
														border-radius: .2rem;" class="btn btn-xs btn-outline-primary">Upload</button><span></span>
													</span></li>
												<li class="d-flex align-items-center mb-3"><i class="bx bx-file"></i><span class="fw-semibold mx-2">Curicullum Vitea(CV)</span> <i class="bx bx-pencil bx-xs edit_button ms-1" ></i>
													<button type="button" 
													style ="padding: .25rem .4rem;
														font-size: .55rem;
														line-height: .5;
														margin-left: 5px;
														border-radius: .2rem;" class="btn btn-xs btn-outline-primary">Upload</button><span></span>
													</span></li>
												<li class="d-flex align-items-center mb-3"><i class="bx bx-file"></i><span class="fw-semibold mx-2">Birth Certificate</span> <i class="bx bx-pencil bx-xs edit_button ms-1" ></i>
													<button type="button" 
													style ="padding: .25rem .4rem;
														font-size: .55rem;
														line-height: .5;
														margin-left: 5px;
														border-radius: .2rem;" class="btn btn-xs btn-outline-primary">Upload</button><span></span>
													</span></li>
												<li class="d-flex align-items-center mb-3"><i class="bx bx-file"></i><span class="fw-semibold mx-2">Nysc Discharge Letter</span> <i class="bx bx-pencil bx-xs edit_button ms-1" ></i>
													<button type="button" 
													style ="padding: .25rem .4rem;
														font-size: .55rem;
														line-height: .5;
														margin-left: 5px;
														border-radius: .2rem;" class="btn btn-xs btn-outline-primary">Upload</button><span></span>
													</span></li>
												<li class="d-flex align-items-center mb-3"><i class="bx bx-file"></i><span class="fw-semibold mx-2">Driver's Licence</span> <i class="bx bx-pencil bx-xs edit_button ms-1" ></i>
													<button type="button" 
													style ="padding: .25rem .4rem;
														font-size: .55rem;
														line-height: .5;
														margin-left: 5px;
														border-radius: .2rem;" class="btn btn-xs btn-outline-primary">Upload</button><span></span>
													</span></li>
												</ul>
											</div>
										</div>
										<!--/ End Documents -->
									</div>
									<div class="col-xl-7 col-lg-7 col-md-7">
										<!-- Document Upload -->
										<div class="card card-action mb-4">
											<!-- <span class="heading">Geeks For Geeks</span>
											<form>
												<div class="holder">
													<img id="imgPreview" src="#" alt="pic" />
												</div>
												<input type="file" name="photograph"
													id="photo" required="true" />
											</form> -->
											<div class="row d-flex flex-row">
												<div class="col-sm-12">
													<div class="center ms-4 me-4">
														<div class="title">
															<h1>First School Leaving Certificate</h1>
														</div>
														<div class="dropzone">
															<img src="http://100dayscss.com/codepen/upload.svg" class="upload-icon" />
															<input type="file" id="photo" class="upload-input" />
														</div>
														<h6>Click here to Select File</h6>
														<button type="button" class="btn_upload" name="uploadbutton">Upload file</button>
													</div>
												</div>
											</div>
										</div>
										<!-- End of Document Upload -->
									</div>

								</div>
							</div>
							<div class="tab-pane fade" id="ex1-tabs-5" role="tabpanel" aria-labelledby="ex1-tab-5">
								<div class="row p-3">
									<div class="col-xl-12 col-lg-12 col-md-12">
										<!-- Experience -->
										<div class="card card-action mb-2 mt-3">
											<div class="card-body">
												<div class="col-sm-12">
													<div class="row flex-row d-flex">
														<div class="col-8">
															<p class="text-muted fs-6 fw-bolder">Experience</p>
														</div>
														<div class="col-4">
															<div class="row pull-right">
																<div class="col-6">
																	<i class="bx bx-pencil bx-sm edit_button" ></i>
																</div>
																<div class="col-6">
																	<i class="bx bx-plus bx-sm edit_button" ></i>
																</div>
															</div>
														</div>
													</div>
													<div class="d-flex flex-wrap info">
														<div class="avatar m-1 me-2">
															<img src="assets/img/avatars/3.png" alt="Avatar" />
														</div>
														<div class="hello-park ms-2">
															<span> Command Secondary School Kaduna</span>
															<br>
															<span>West African Examination Council</span>
															<p class="fw-lighter">Sep 2008 - Aug 2009</p>
														</div>
													</div>
													<ul class="activity-feed ms-4">
														<li class="feed-item d-flex align-items-center">
															<div class="dolor-activity ms-1 mb-3">
																<div class="ms-2">
																	<span>Command Secondary School Kaduna</span>
																	<br>
																	<span>West African Examination Council </span>
																	<p class="fw-lighter">Sep 2008 - Aug 2009</p>
																</div>		
															</div>
														</li>
														<li class="feed-item d-flex align-items-center">
															<div class="dolor-activity ms-1 mb-3">
																<div class="ms-2">
																	<span> Command Secondary School Kaduna</span>
																	<br>
																	<span>West African Examination Council</span>
																	<p class="fw-lighter">Sep 2008 - Aug 2009</p>
																</div>		
															</div>
														</li>
														<li class="feed-item d-flex align-items-center">
															<div class="dolor-activity ms-1 mb-3">
																<div class="ms-2">
																	<span> Command Secondary School Kaduna</span>
																	<br>
																	<span>West African Examination Council</span>
																	<p class="fw-lighter">Sep 2008 - Aug 2009</p>
																</div>		
															</div>
														</li>
													</ul>
													
													<hr class="mt-0"/>

													<div class="d-flex flex-wrap">
														<div class="avatar m-1 me-2">
															<img src="assets/img/avatars/3.png" alt="Avatar" />
														</div>
														<div class="ms-2">
															<span> Command Secondary School Kaduna</span>
															<br>
															<span>West African Examination Council</span>
															<p class="fw-lighter">Sep 2008 - Aug 2009</p>
														</div>
													</div>
													<ul class="activity-feed ms-4">
														<li class="feed-item d-flex align-items-center">
															<div class="dolor-activity ms-1 mb-3">
																<div class="ms-2">
																	<span> Command Secondary School Kaduna</span>
																	<br>
																	<span>West African Examination Council</span>
																	<p class="fw-lighter">Sep 2008 - Aug 2009</p>
																</div>		
															</div>
														</li>
														<li class="feed-item d-flex align-items-center">
															<div class="dolor-activity ms-1 mb-3">
																<div class="ms-2">
																	<span> Command Secondary School Kaduna</span>
																	<br>
																	<span>West African Examination Council</span>
																	<p class="fw-lighter">Sep 2008 - Aug 2009</p>
																</div>		
															</div>
														</li>
														<li class="feed-item d-flex align-items-center">
															<div class="dolor-activity ms-1 mb-3">
																<div class="ms-2">
																	<span> Command Secondary School Kaduna</span>
																	<br>
																	<span>West African Examination Council</span>
																	<p class="fw-lighter">Sep 2008 - Aug 2009</p>
																</div>		
															</div>
														</li>
													</ul>
												</div>
											</div>
										</div>
										<!--/ Experience -->
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="ex1-tabs-6" role="tabpanel" aria-labelledby="ex1-tab-6">
								<div class="row">
									<div class="col-sm-12 col-xl-12 col-lg-12 col-md-12 p-5">
										<div class="card mb-2">
											<div class="card-body subjects">
												<div class="row">
													<div class="col-sm-3 p-1">
														<div>
															<div class="card" style="border: 1px solid #015adf; color: #001797;">
																<div class="row p-2">
																	<div class="col-3">
																		<div class="">
																			<i class="bx bx-user-voice bx-md"></i>
																		</div>
																	</div>
																	<div class="col-7">
																		<span style="font-size: 12px;"> Total Disciplinary</span><br>
																		<span style="font-size: 12px;"> 10</span> 
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-sm-3 p-1">
														<div>
															<div class="card" style="border: 1px solid #2ddf01; color: #009751;">
																<div class="row p-2">
																	<div class="col-3">
																		<div class="">
																			<i class="bx bx-smile bx-md"></i>
																		</div>
																	</div>
																	<div class="col-7">
																		<span style="font-size: 12px;"> Completed</span><br>
																		<span style="font-size: 12px;"> 7</span> 
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-sm-3 p-1">
														<div>
															<div class="card" style="border: 1px solid #df010c; color: #970026;">
																<div class="row p-2">
																	<div class="col-3">
																		<div class="">
																			<i class="bx bx-angry bx-md"></i>
																		</div>
																	</div>
																	<div class="col-7">
																		<span style="font-size: 12px;"> Pending</span><br>
																		<span style="font-size: 12px;"> 2</span> 
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-sm-3 p-1">
														<div>
															<div class="card" style="border: 1px solid #dbdf01; color: #979400;">
																<div class="row p-2">
																	<div class="col-3">
																		<div class="">
																			<i class="bx bx-wink-smile bx-md"></i>
																		</div>
																	</div>
																	<div class="col-7">
																		<span style="font-size: 12px;"> Pardoned</span><br>
																		<span style="font-size: 12px;"> 1</span> 
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="row mt-5 mb-1">
													<div class="col-sm-12">
														<div class="row">
															<div class="col-9">
																<div style="border-left: #8a8a8a solid 4px; margin-top: 10px; height: 30px; padding: 0px 5px 0px 10px;">
																	<h5>Disciplinary History</h5>
																</div>
															</div>
															<div class="col-3">
																<ul class="nav nav-tabs mb-3 customtab pull-right" style="border-bottom: none;"  id="exD" role="tablist">
																	<li class="nav-item border m-1" style="border-radius: 5px;" role="presentation">
																		<a
																		class="nav-link active"
																		id="exD-tab-1"
																		data-bs-toggle="tab"
																		href="#exD-tabs-1"
																		role="tab"
																		aria-controls="exD-tabs-1"
																		aria-selected="true"><i class="bx bx-grid-alt bx-sm"></i></a>
																	</li>
																	<li class="nav-item border m-1" style="border-radius: 5px;" role="presentation">
																		<a
																		class="nav-link"
																		id="exD-tab-2"
																		data-bs-toggle="tab"
																		href="#exD-tabs-2"
																		role="tab"
																		aria-controls="exD-tabs-2"
																		aria-selected="false"><i class="bx bx-table bx-sm"></i></a
																		>
																	</li>
																</ul>
															</div>
														</div>
														<div class="tab-content" id="exD-content">
															<div
																class="tab-pane fade show active"
																id="exD-tabs-1"
																role="tabpanel"
																aria-labelledby="exD-tab-1">
																
																<!-- Grid Table -->
																<div class="col-sm-12">
																	<div class="row">
																		<div class="col-sm-4 p-2">
																			<div>
																				<div class="card" style="background-color: #f3f0f5; border: 1px solid  #2ddf01;">
																					<div class="row p-1">
																						<div class="col-sm-12">
																							<div class="row">
																								<div class="col-1">
																									<i class="bx bx-sm bx-user-voice"></i>
																								</div>
																								<div class="col-7">
																									<span style="font-size: 12px; color: rgb(206, 86, 86);"> LATE COMING</span>
																								</div>
																								<div class="col-4">	
																									<span class="pull-right" style="font-size: 11px; padding:0px 2px 0px 2px; border-radius: 10px; border: 1px solid #2ddf01; color: #009751;  background-color: #bdffe0;"> Completed</span>
																								</div>
																							</div>
																						</div>
																					</div>
																					<div class="row p-1">
																						<div class="col-sm-12">
																							<div class="row">
																								<div class="col-3">
																									<img src="profile-1.jpg"style="border-radius: 15px;" width="40" alt="">
																								</div>
																								<div class="col-8">
																									<span style="font-size: 10px;"> Mr. Micheal John S.</span><br>
																									<span style="font-size: 10px;"> (Goodtidings Admin)</span>
																									<!-- <span style="font-size: 12px;"> Mr. Micheal John S.</span> -->
																								</div>
																								<!-- <div class="col-4">
																									<span class="pull-right" style="font-size: 11px; padding:0px 2px 0px 2px; border-radius: 10px; border: 1px solid #2ddf01; color: #009751;  background-color: #bdffe0;"> On-time</span>
																								</div> -->
																							</div>
																						</div>
																					</div>
																					<div class="row p-1">
																						<div class="col-sm-12">
																							<div class="row">
																								<div class="col-3">
																									<span style="font-size: 12px;"> Penalty:</span>
																								</div>
																								<div class="col-9">
																									<span style="font-size: 12px;"> Salary Reduction by 5,000</span><br>
																									<span class="p-2" style="font-size: 10px; float: right;">5th April, 2023 by 5:00pm</span>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-4 p-2">
																			<div>
																				<div class="card" style="background-color: #f3f0f5; border: 1px solid #dbdf01;">
																					<div class="row p-1">
																						<div class="col-sm-12">
																							<div class="row">
																								<div class="col-1">
																									<i class="bx bx-sm bx-user-voice"></i>
																								</div>
																								<div class="col-7">
																									<span style="font-size: 12px; color: rgb(206, 86, 86);"> Skipping School</span>
																								</div>
																								<div class="col-4">
																									<span class="pull-right" style="font-size: 11px; padding:0px 2px 0px 2px; border-radius: 10px; border: 1px solid #dbdf01; color: #769700;  background-color: #f8ffbd;"> 
																										Pardoned</span><i class="bx bx-eye"></i>
																								</div>
																							</div>
																						</div>
																					</div>
																					<div class="row p-1">
																						<div class="col-sm-12">
																							<div class="row">
																								<div class="col-3">
																									<img src="profile-1.jpg"style="border-radius: 15px;" width="40" alt="">
																								</div>
																								<div class="col-8">
																									<span style="font-size: 10px;"> Mr. Micheal John S.</span><br>
																									<span style="font-size: 10px;"> (Goodtidings Admin)</span>
																									<!-- <span style="font-size: 12px;"> Mr. Micheal John S.</span> -->
																								</div>
																								<!-- <div class="col-4">
																									<span class="pull-right" style="font-size: 11px; padding:0px 2px 0px 2px; border-radius: 10px; border: 1px solid #2ddf01; color: #009751;  background-color: #bdffe0;"> On-time</span>
																								</div> -->
																							</div>
																						</div>
																					</div>
																					<div class="row p-1">
																						<div class="col-sm-12">
																							<div class="row">
																								<div class="col-3">
																									<span style="font-size: 12px;"> Penalty:</span>
																								</div>
																								<div class="col-9">
																									<span style="font-size: 12px;"> Salary Reduction by 5,000</span><br>
																									<span class="p-2" style="font-size: 10px; float: right;">5th April, 2023 by 5:00pm</span>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-4 p-2">
																			<div>
																				<div class="card" style="background-color: #f3f0f5;border: 1px solid #df0101;">
																					<div class="row p-1">
																						<div class="col-sm-12">
																							<div class="row">
																								<div class="col-1">
																									<i class="bx bx-sm bx-user-voice"></i>
																								</div>
																								<div class="col-7">
																									<span style="font-size: 12px; color: rgb(206, 86, 86);"> Beating a Child</span>
																								</div>
																								<div class="col-4">
																									<span class="pull-right" style="font-size: 11px; padding:0px 4px 0px 4px; border-radius: 10px; border: 1px solid #df0101; color: #970000;  background-color: #ffbdbd;"> Pending</span>
																								</div>
																							</div>
																						</div>
																					</div>
																					<div class="row p-1">
																						<div class="col-sm-12">
																							<div class="row">
																								<div class="col-3">
																									<img src="profile-1.jpg"style="border-radius: 15px;" width="40" alt="">
																								</div>
																								<div class="col-8">
																									<span style="font-size: 10px;"> Mr. Micheal John S.</span><br>
																									<span style="font-size: 10px;"> (Goodtidings Admin)</span>
																									<!-- <span style="font-size: 12px;"> Mr. Micheal John S.</span> -->
																								</div>
																								<!-- <div class="col-4">
																									<span class="pull-right" style="font-size: 11px; padding:0px 2px 0px 2px; border-radius: 10px; border: 1px solid #2ddf01; color: #009751;  background-color: #bdffe0;"> On-time</span>
																								</div> -->
																							</div>
																						</div>
																					</div>
																					<div class="row p-1">
																						<div class="col-sm-12">
																							<div class="row">
																								<div class="col-3">
																									<span style="font-size: 12px;"> Penalty:</span>
																								</div>
																								<div class="col-9">
																									<span style="font-size: 12px;"> Apology Letter to the Parents</span><br>
																									<span class="p-2" style="font-size: 10px; float: right;">5th April, 2023 by 5:00pm</span>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-4 p-2">
																			<div>
																				<div class="card" style="background-color: #f3f0f5; border: 1px solid #2ddf01;">
																					<div class="row p-1">
																						<div class="col-sm-12">
																							<div class="row">
																								<div class="col-1">
																									<i class="bx bx-sm bx-user-voice"></i>
																								</div>
																								<div class="col-7">
																									<span style="font-size: 12px; color: rgb(206, 86, 86);"> LATE COMING</span>
																								</div>
																								<div class="col-4">
																									<span class="pull-right" style="font-size: 11px; padding:0px 2px 0px 2px; border-radius: 10px; border: 1px solid #2ddf01; color: #009751;  background-color: #bdffe0;"> Completed</span>
																								</div>
																							</div>
																						</div>
																					</div>
																					<div class="row p-1">
																						<div class="col-sm-12">
																							<div class="row">
																								<div class="col-3">
																									<img src="profile-1.jpg"style="border-radius: 15px;" width="40" alt="">
																								</div>
																								<div class="col-8">
																									<span style="font-size: 10px;"> Mr. Micheal John S.</span><br>
																									<span style="font-size: 10px;"> (Goodtidings Admin)</span>
																									<!-- <span style="font-size: 12px;"> Mr. Micheal John S.</span> -->
																								</div>
																								<!-- <div class="col-4">
																									<span class="pull-right" style="font-size: 11px; padding:0px 2px 0px 2px; border-radius: 10px; border: 1px solid #2ddf01; color: #009751;  background-color: #bdffe0;"> On-time</span>
																								</div> -->
																							</div>
																						</div>
																					</div>
																					<div class="row p-1">
																						<div class="col-sm-12">
																							<div class="row">
																								<div class="col-3">
																									<span style="font-size: 12px;"> Penalty:</span>
																								</div>
																								<div class="col-9">
																									<span style="font-size: 12px;"> Salary Reduction by 5,000</span><br>
																									<span class="p-2" style="font-size: 10px; float: right;">5th April, 2023 by 5:00pm</span>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-4 p-2">
																			<div>
																				<div class="card" style="background-color: #f3f0f5; border: 1px solid #dbdf01;">
																					<div class="row p-1">
																						<div class="col-sm-12">
																							<div class="row">
																								<div class="col-1">
																									<i class="bx bx-sm bx-user-voice"></i>
																								</div>
																								<div class="col-7">
																									<span style="font-size: 12px; color: rgb(206, 86, 86);"> Skipping School</span>
																								</div>
																								<div class="col-4">
																									<span class="pull-right" style="font-size: 11px; padding:0px 2px 0px 2px; border-radius: 10px; border: 1px solid #dbdf01; color: #769700;  background-color: #f8ffbd;"> Pardoned</span>
																								</div>
																							</div>
																						</div>
																					</div>
																					<div class="row p-1">
																						<div class="col-sm-12">
																							<div class="row">
																								<div class="col-3">
																									<img src="profile-1.jpg"style="border-radius: 15px;" width="40" alt="">
																								</div>
																								<div class="col-8">
																									<span style="font-size: 10px;"> Mr. Micheal John S.</span><br>
																									<span style="font-size: 10px;"> (Goodtidings Admin)</span>
																									<!-- <span style="font-size: 12px;"> Mr. Micheal John S.</span> -->
																								</div>
																								<!-- <div class="col-4">
																									<span class="pull-right" style="font-size: 11px; padding:0px 2px 0px 2px; border-radius: 10px; border: 1px solid #2ddf01; color: #009751;  background-color: #bdffe0;"> On-time</span>
																								</div> -->
																							</div>
																						</div>
																					</div>
																					<div class="row p-1">
																						<div class="col-sm-12">
																							<div class="row">
																								<div class="col-3">
																									<span style="font-size: 12px;"> Penalty:</span>
																								</div>
																								<div class="col-9">
																									<span style="font-size: 12px;"> Salary Reduction by 5,000</span><br>
																									<span class="p-2" style="font-size: 10px; float: right;">5th April, 2023 by 5:00pm</span>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-4 p-2">
																			<div>
																				<div class="card" style="background-color: #f3f0f5; border: 1px solid #df0101;">
																					<div class="row p-1">
																						<div class="col-sm-12">
																							<div class="row">
																								<div class="col-1">
																									<i class="bx bx-sm bx-user-voice"></i>
																								</div>
																								<div class="col-7">
																									<span style="font-size: 12px; color: rgb(206, 86, 86);"> Beating a Child</span>
																								</div>
																								<div class="col-4">
																									<span class="pull-right" style="font-size: 11px; padding:0px 4px 0px 4px; border-radius: 10px; border: 1px solid #df0101; color: #970000;  background-color: #ffbdbd;"> Pending</span>
																								</div>
																							</div>
																						</div>
																					</div>
																					<div class="row p-1">
																						<div class="col-sm-12">
																							<div class="row">
																								<div class="col-3">
																									<img src="profile-1.jpg"style="border-radius: 15px;" width="40" alt="">
																								</div>
																								<div class="col-8">
																									<span style="font-size: 10px;"> Mr. Micheal John S.</span><br>
																									<span style="font-size: 10px;"> (Goodtidings Admin)</span>
																									<!-- <span style="font-size: 12px;"> Mr. Micheal John S.</span> -->
																								</div>
																								<!-- <div class="col-4">
																									<span class="pull-right" style="font-size: 11px; padding:0px 2px 0px 2px; border-radius: 10px; border: 1px solid #2ddf01; color: #009751;  background-color: #bdffe0;"> On-time</span>
																								</div> -->
																							</div>
																						</div>
																					</div>
																					<div class="row p-1">
																						<div class="col-sm-12">
																							<div class="row">
																								<div class="col-3">
																									<span style="font-size: 12px;"> Penalty:</span>
																								</div>
																								<div class="col-9">
																									<span style="font-size: 12px;"> Apology Letter to the Parents</span><br>
																									<span class="p-2" style="font-size: 10px; float: right;">5th April, 2023 by 5:00pm</span>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<!--/ Table -->
															</div>
															<div class="tab-pane fade" id="exD-tabs-2" role="tabpanel" aria-labelledby="exD-tab-2">
																<div class="col-sm-12">
																	<div class="table-responsive">
																		<table class="table text-nowrap mb-0 align-items-center">
																		<thead class="text-dark fs-6">
																			<tr>
																			<th class="border-bottom-0">
																				<h6 class="fw-semibold mb-0">Date</h6>
																			</th>
																			<th class="border-bottom-0">
																				<h6 class="fw-semibold mb-0">Offence</h6>
																			</th>
																			<th class="border-bottom-0">
																				<h6 class="fw-semibold mb-0">Disciplinarian</h6>
																			</th>
																			<th class="border-bottom-0">
																				<h6 class="fw-semibold mb-0">Penalty</h6>
																			</th>
																			<th class="border-bottom-0">
																				<h6 class="fw-semibold mb-0">Status</h6>
																			</th>
																			</tr>
																		</thead>
																		<tbody>
																			<tr>
																				<td class="border-bottom-0"><p class="fw-normal mb-0">10th April, 2023 by 8:00am</p></td>
																				<td class="border-bottom-0">
																					<span class="fw-normal">Late Coming</span>                          
																				</td>
																				<td class="border-bottom-0">
																					<span class="fw-normal">Mr. Mike jones (Admin)</span>                          
																				</td>
																				<td class="border-bottom-0">
																					<p class="mb-0 fw-normal">Salary Reduction by 5,000</p>
																				</td>
																				<td class="border-bottom-0">
																					<div class="d-flex align-items-center gap-2">
																					<span class="text-success fw-semibold">Completed</span>
																					</div>
																				</td>
																			</tr> 
																			<tr>
																				<td class="border-bottom-0"><p class="fw-normal mb-0">10th April, 2023 by 8:00am</p></td>
																				<td class="border-bottom-0">
																					<span class="fw-normal">Beating up a Child</span>                          
																				</td>
																				<td class="border-bottom-0">
																					<span class="fw-normal">Mr. Mike jones (Admin)</span>                          
																				</td>
																				<td class="border-bottom-0">
																					<p class="mb-0 fw-normal">Apology Letter</p>
																				</td>
																				<td class="border-bottom-0">
																					<div class="d-flex align-items-center gap-2">
																					<span class="text-warning fw-semibold">Pardoned</span>
																					</div>
																				</td>
																			</tr>
																			<tr>
																				<td class="border-bottom-0"><p class="fw-normal mb-0">10th April, 2023 by 8:00am</p></td>
																				<td class="border-bottom-0">
																					<span class="fw-normal">Late Coming</span>                          
																				</td>
																				<td class="border-bottom-0">
																					<span class="fw-normal">Mr. Mike jones (Admin)</span>                          
																				</td>
																				<td class="border-bottom-0">
																					<p class="mb-0 fw-normal">Salary Reduction by 5,000</p>
																				</td>
																				<td class="border-bottom-0">
																					<div class="d-flex align-items-center gap-2">
																					<span class="text-success fw-semibold">Completed</span>
																					</div>
																				</td>
																			</tr> 
																			<tr>
																				<td class="border-bottom-0"><p class="fw-normal mb-0">10th April, 2023 by 8:00am</p></td>
																				<td class="border-bottom-0">
																					<span class="fw-normal">Beating up a Child</span>                          
																				</td>
																				<td class="border-bottom-0">
																					<span class="fw-normal">Mr. Mike jones (Admin)</span>                          
																				</td>
																				<td class="border-bottom-0">
																					<p class="mb-0 fw-normal">Apology Letter</p>
																				</td>
																				<td class="border-bottom-0">
																					<div class="d-flex align-items-center gap-2">
																					<span class="text-danger fw-semibold">Pending</span>
																					</div>
																				</td>
																			</tr>
																			<tr>
																				<td class="border-bottom-0"><p class="fw-normal mb-0">10th April, 2023 by 8:00am</p></td>
																				<td class="border-bottom-0">
																					<span class="fw-normal">Beating up a Child</span>                          
																				</td>
																				<td class="border-bottom-0">
																					<span class="fw-normal">Mr. Mike jones (Admin)</span>                          
																				</td>
																				<td class="border-bottom-0">
																					<p class="mb-0 fw-normal">Apology Letter</p>
																				</td>
																				<td class="border-bottom-0">
																					<div class="d-flex align-items-center gap-2">
																					<span class="text-warning fw-semibold">Pardoned</span>
																					</div>
																				</td>
																			</tr>                       
																		</tbody>
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
							</div>
							<div class="tab-pane fade" id="ex1-tabs-7" role="tabpanel" aria-labelledby="ex1-tab-7">
								<div class="row p-3">
									<div class="col-xl-4 col-lg-5 col-md-5">
										<!-- Leaves Tab -->
										<div class="card mb-2 mt-3">
											<div class="card-body">
												<div class="row flex-row d-flex">
													<div class="col-10">
														<p class="text-muted fs-6 fw-bolder">Leave</p>
													</div>
													<div class="col-2">
														<!-- <i class="bx bx-pencil bx-sm edit_button" ></i> -->
													</div>
												</div>
												<ul class="list-unstyled mb-4 mt-3">
												<li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-semibold mx-2">Leaves Available</span> <span>
													<div class="card  ms-1" style="padding: 4px; color: #009700;  border-radius: 30px 30px 30px 30px; background-color: #bdffd8;"> 20</div>
												</span></li>
												<li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span class="fw-semibold mx-2">Leaves Taken</span> <span>
													<div class="card ms-1" style="padding: 5px; border-radius: 30px 30px 30px 30px; color: #009751;  background-color: #bdffe0;"> 10</div>
												</span></li>
												<li class="d-flex align-items-center mb-3"><i class="bx bx-stopwatch"></i><span class="fw-semibold mx-2">Leaves Pending</span> <span>
													<div class="card ms-1" style="padding: 5px; border-radius: 30px 30px 30px 30px; color: #8d9700;  background-color: #f3ffbd;"> 2</div>
												</span></li>
												<li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span class="fw-semibold mx-2">Leaves Rejected</span> <span>
													<div class="card ms-1" style="padding: 5px; color: #970000; border-radius: 30px 30px 30px 30px; background-color: #ffc1bd;"> 8</div>
												</span></li>
												</ul>
											</div>
										</div>
										<!--/ Leaves Tab -->
									</div>

									<div class="col-xl-8 col-lg-7 col-md-7">
										<!-- Leaves Table-->
										<div class="card card-action mb-2 mt-3">
											<div class="card-body">
												<div class="hello-park">
													<div class="row flex-row d-flex">
														<div class="col-8">
															<p class="text-muted fs-6 fw-bolder">Leave Status</p>
														</div>
														<div class="col-4 pull-right">
															<button type="button" class="btn btn-sm fw-normal fs-7 btn-primary pull-right align-content-center" 
															style="width: 75px;
															height: 22px;
															border: 0 none transparent;
															padding:0;
															margin:0;
															border-radius: 15px;"><i class="bx bx-plus" ></i> Apply</button>
														</div>
													</div>
												</div>
												<div class="table-responsive">
													<table class="table text-nowrap mb-0 align-items-center">
													<thead class="text-dark fs-6">
														<tr>
														<th class="border-bottom-0">
															<h6 class="fw-semibold mb-0">Leave Type</h6>
														</th>
														<th class="border-bottom-0">
															<h6 class="fw-semibold mb-0">From</h6>
														</th>
														<th class="border-bottom-0">
															<h6 class="fw-semibold mb-0">To</h6>
														</th>
														<th class="border-bottom-0">
															<h6 class="fw-semibold mb-0">Days</h6>
														</th>
														<th class="border-bottom-0">
															<h6 class="fw-semibold mb-0">Permission</h6>
														</th>
														</tr>
													</thead>
													<tbody>
														<tr>
														<td class="border-bottom-0"><p class="fw-normal mb-0">Sick</p></td>
														<td class="border-bottom-0">
															<span class="fw-normal">10.11.2023</span>                          
														</td>
														<td class="border-bottom-0">
															<p class="mb-0 fw-normal">11.10.2013</p>
														</td>
														<td class="border-bottom-0">
															<h6 class="fw-normal mb-0">2</h6>
														</td>
														<td class="border-bottom-0">
															<div class="d-flex align-items-center gap-2">
															<span class="text-warning fw-semibold">Pending</span>
															</div>
														</td>
														</tr> 
														<tr>
															<td class="border-bottom-0"><p class="fw-normal mb-0">Casual</h6></p>
															<td class="border-bottom-0">
																<span class="fw-normal">10.11.2023</span>                          
															</td>
															<td class="border-bottom-0">
																<p class="mb-0 fw-normal">11.10.2013</p>
															</td>
															<td class="border-bottom-0">
																<h6 class="fw-normal mb-0">5</h6>
															</td>
															<td class="border-bottom-0">
																<div class="d-flex align-items-center gap-2">
																<span class="text-success fw-semibold">Approved</span>
																</div>
															</td>
														</tr>
														<tr>
															<td class="border-bottom-0"><p class="fw-normal mb-0">Sick</p></td>
															<td class="border-bottom-0">
																<span class="fw-normal">10.11.2023</span>                          
															</td>
															<td class="border-bottom-0">
															<p class="mb-0 fw-normal">11.10.2013</p>
															</td>
															<td class="border-bottom-0">
															<h6 class="fw-normal mb-0">3</h6>
															</td>
															<td class="border-bottom-0">
															<div class="d-flex align-items-center gap-2">
																<span class="text-danger fw-semibold">Rejected</span>
															</div>
															</td>
														</tr>
														<tr>
															<td class="border-bottom-0"><p class="fw-normal mb-0">Casual</p></td>
															<td class="border-bottom-0">
																<span class="fw-normal">10.11.2023</span>                          
															</td>
															<td class="border-bottom-0">
															<p class="mb-0 fw-normal">11.10.2013</p>
															</td>
															<td class="border-bottom-0">
															<h6 class="fw-normal mb-0">7</h6>
															</td>
															<td class="border-bottom-0">
															<div class="d-flex align-items-center gap-2">
																<span class="text-warning fw-semibold">Pending</span>
															</div>
															</td>
														</tr> 
														<tr>
															<td class="border-bottom-0"><p class="fw-normal mb-0">Child Birth</p></td>
															<td class="border-bottom-0">
																<span class="fw-normal">10.11.2023</span>                          
															</td>
															<td class="border-bottom-0">
															<p class="mb-0 fw-normal">11.10.2013</p>
															</td>
															<td class="border-bottom-0">
															<h6 class="fw-normal mb-0">60</h6>
															</td>
															<td class="border-bottom-0">
															<div class="d-flex align-items-center gap-2">
																<span class="text-warning fw-semibold">Pending</span>
															</div>
															</td>
														</tr>                        
													</tbody>
													</table>
												</div>
											</div>
										</div>
										<!-- Leaves Table -->
									</div>

								</div>
							</div>
							<div class="tab-pane fade" id="ex1-tabs-8" role="tabpanel" aria-labelledby="ex1-tab-8">
								<div class="row">
									<div class="col-sm-12 col-xl-12 col-lg-12 col-md-12 p-5">
										<div class="card mb-2">
											<div class="card-body subjects">
												<div class="row">
													<div class="col-sm-3 p-1">
														<div>
															<div class="card" style="border: 1px solid #015adf; color: #001797;  background-color: #bdbeff;">
																<div class="row p-2">
																	<div class="col-3">
																		<div class="taribadge">
																			<i class="bx bx-time bx-sm"></i>
																		</div>
																	</div>
																	<div class="col-7">
																		<span style="font-size: 12px;"> 309</span> <br>
																		<span style="font-size: 12px;"> Total Attendance</span>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-sm-3 p-1">
														<div>
															<div class="card" style="border: 1px solid #2ddf01; color: #009751;  background-color: #bdffe0;">
																<div class="row p-2">
																	<div class="col-3">
																		<div class="taribadge">
																			<i class="bx bx-time bx-sm"></i>
																		</div>
																	</div>
																	<div class="col-7">
																		<span style="font-size: 12px;"> 100</span> <br>
																		<span style="font-size: 12px;"> Total Present</span>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-sm-3 p-1">
														<div>
															<div class="card" style="border: 1px solid #df010c; color: #970026; background-color: #ffbdcd;">
																<div class="row p-2">
																	<div class="col-3">
																		<div class="taribadge">
																			<i class="bx bx-time bx-sm"></i>
																		</div>
																	</div>
																	<div class="col-7">
																		<span style="font-size: 12px;"> 15</span> <br>
																		<span style="font-size: 12px;"> Total Absent</span>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-sm-3 p-1">
														<div>
															<div class="card" style="border: 1px solid #dbdf01; color: #979400; background-color: #fffebd;">
																<div class="row p-2">
																	<div class="col-3">
																		<div class="taribadge">
																			<i class="bx bx-time bx-sm"></i>
																		</div>
																	</div>
																	<div class="col-7">
																		<span style="font-size: 12px;"> 15</span> <br>
																		<span style="font-size: 12px;"> Total Excused</span>
																	</div>
																</div>
																<!-- <div class="row mx-1">
																	<div class="col-12 mb-2 ">
																		<button  type="button" style="border: 1px solid #2ddf01;
																		color: #009751;  background-color: #bdffe0;" class="btn btn-lg chiActive mt-1">
																			Mathematics
																		</button >
																		<button  type="button" style="border: 1px solid #014fdf;
																		color: #002397;  background-color: #c7bdff;" class="btn btn-lg chiActive mt-1">
																			English Language
																		</button >
																		<button  type="button" style="border: 1px solid #dbdf01;
																		color: #979400; background-color: #fffebd;" class="btn btn-lg chiActive mt-1">
																			Basic Science
																		</button >
																		<button  type="button" style="border: 1px solid #df010c;
																		color: #970026; background-color: #ffbdcd;" class="btn btn-lg chiActive mt-1">
																			Health Education
																		</button >
																		<button  type="button" style="border: 1px solid #df019c;
																		color: #970076; background-color: #ffbdf9;" class="btn btn-lg chiActive mt-1">
																			Computer Studies
																		</button >
																	</div>
																</div> -->
															</div>
														</div>
													</div>
												</div>
												<div class="row mt-5 mb-1">
													<div class="col-sm-12">
														<div class="row">
															<div class="col-9">
																<div style="border-left: #8a8a8a solid 4px; margin-top: 10px; height: 30px; padding: 0px 5px 0px 10px;">
																	<h5>Attendance History</h5>
																</div>
															</div>
															<div class="col-3">
																<ul class="nav nav-tabs mb-3 customtab pull-right" style="border-bottom: none;"  id="exA" role="tablist">
																	<li class="nav-item border m-1" style="border-radius: 5px;" role="presentation">
																		<a
																		class="nav-link active"
																		id="exA-tab-1"
																		data-bs-toggle="tab"
																		href="#exA-tabs-1"
																		role="tab"
																		aria-controls="exA-tabs-1"
																		aria-selected="true"><i class="bx bx-grid-alt bx-sm"></i></a>
																	</li>
																	<li class="nav-item border m-1" style="border-radius: 5px;" role="presentation">
																		<a
																		class="nav-link"
																		id="exA-tab-2"
																		data-bs-toggle="tab"
																		href="#exA-tabs-2"
																		role="tab"
																		aria-controls="exA-tabs-2"
																		aria-selected="false"><i class="bx bx-table bx-sm"></i></a
																		>
																	</li>
																</ul>
															</div>
														</div>
														<div class="tab-content" id="exA-content">
															<div
																class="tab-pane fade show active"
																id="exA-tabs-1"
																role="tabpanel"
																aria-labelledby="exA-tab-1">
																
																<!-- Grid Table -->
																<div class="col-sm-12">
																	<div class="row">
																		<div class="col-sm-3 p-1">
																			<div>
																				<div class="card" style="background-color: #f3f0f5;">
																					<div class="row p-2">
																						<div class="col-12">
																							<div class="row">
																								<div class="col-1">
																									<i class="bx bx-time"></i>
																								</div>
																								<div class="col-6">
																									<span style="font-size: 12px;"> Mar. 27, 2023</span>
																								</div>
																								<div class="col-4">
																									<span class="pull-right" style="font-size: 11px; padding:0px 2px 0px 2px; border-radius: 10px; border: 1px solid #2ddf01; color: #009751;  background-color: #bdffe0;"> On-time</span>
																								</div>
																							</div>
																						</div>
																					</div>
																					<div class="row p-2 mt-3">
																						<div class="col-12">
																							<div class="row">
																								<div class="col-6">
																									<span style="font-size: 10px;">Check In Time</span><br>
																									<span style="font-size: 10px;"><strong>7:00 am</strong></span>
																								</div>
																								<div class="col-6 ">
																									<span style="font-size: 10px;" class="">Check Out Time</span><br>
																									<span style="font-size: 10px;"><strong>5:00 pm</strong></span>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-3 p-1">
																			<div>
																				<div class="card" style="background-color: #f3f0f5;">
																					<div class="row p-2">
																						<div class="col-12">
																							<div class="row">
																								<div class="col-1">
																									<i class="bx bx-time"></i>
																								</div>
																								<div class="col-6">
																									<span style="font-size: 12px;"> Mar. 27, 2023</span>
																								</div>
																								<div class="col-4">
																									<span class="pull-right" style="font-size: 11px; padding:0px 2px 0px 2px; border-radius: 10px; border: 1px solid #dbdf01; color: #769700;  background-color: #f8ffbd;"> Absent</span>
																								</div>
																							</div>
																						</div>
																					</div>
																					<div class="row p-2 mt-3">
																						<div class="col-12">
																							<div class="row">
																								<div class="col-6">
																									<span style="font-size: 10px;">Check In Time</span><br>
																									<span style="font-size: 10px;"><strong>--:--</strong></span>
																								</div>
																								<div class="col-6 ">
																									<span style="font-size: 10px;" class="">Check Out Time</span><br>
																									<span style="font-size: 10px;"><strong>--:--</strong></span>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-3 p-1">
																			<div>
																				<div class="card" style="background-color: #f3f0f5;">
																					<div class="row p-2">
																						<div class="col-12">
																							<div class="row">
																								<div class="col-1">
																									<i class="bx bx-time"></i>
																								</div>
																								<div class="col-6">
																									<span style="font-size: 12px;"> Mar. 27, 2023</span>
																								</div>
																								<div class="col-4">
																									<span class="pull-right" style="font-size: 11px; padding:0px 4px 0px 4px; border-radius: 10px; border: 1px solid #df0101; color: #970000;  background-color: #ffbdbd;"> Late</span>
																								</div>
																							</div>
																						</div>
																					</div>
																					<div class="row p-2 mt-3">
																						<div class="col-12">
																							<div class="row">
																								<div class="col-6">
																									<span style="font-size: 10px;">Check In Time</span><br>
																									<span style="font-size: 10px;"><strong>7:00 am</strong></span>
																								</div>
																								<div class="col-6 ">
																									<span style="font-size: 10px;" class="">Check Out Time</span><br>
																									<span style="font-size: 10px;"><strong>5:00 pm</strong></span>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-3 p-1">
																			<div>
																				<div class="card" style="background-color: #f3f0f5;">
																					<div class="row p-2">
																						<div class="col-12">
																							<div class="row">
																								<div class="col-1">
																									<i class="bx bx-time"></i>
																								</div>
																								<div class="col-6">
																									<span style="font-size: 12px;"> Mar. 27, 2023</span>
																								</div>
																								<div class="col-4">
																									<span class="pull-right" style="font-size: 11px; padding:0px 2px 0px 2px; border-radius: 10px; border: 1px solid #2ddf01; color: #009751;  background-color: #bdffe0;"> On-time</span>
																								</div>
																							</div>
																						</div>
																					</div>
																					<div class="row p-2 mt-3">
																						<div class="col-12">
																							<div class="row">
																								<div class="col-6">
																									<span style="font-size: 10px;">Check In Time</span><br>
																									<span style="font-size: 10px;"><strong>7:00 am</strong></span>
																								</div>
																								<div class="col-6 ">
																									<span style="font-size: 10px;" class="">Check Out Time</span><br>
																									<span style="font-size: 10px;"><strong>5:00 pm</strong></span>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-3 p-1">
																			<div>
																				<div class="card" style="background-color: #f3f0f5;">
																					<div class="row p-2">
																						<div class="col-12">
																							<div class="row">
																								<div class="col-1">
																									<i class="bx bx-time"></i>
																								</div>
																								<div class="col-6">
																									<span style="font-size: 12px;"> Mar. 27, 2023</span>
																								</div>
																								<div class="col-4">
																									<span class="pull-right" style="font-size: 11px; padding:0px 2px 0px 2px; border-radius: 10px; border: 1px solid #2ddf01; color: #009751;  background-color: #bdffe0;"> On-time</span>
																								</div>
																							</div>
																						</div>
																					</div>
																					<div class="row p-2 mt-3">
																						<div class="col-12">
																							<div class="row">
																								<div class="col-6">
																									<span style="font-size: 10px;">Check In Time</span><br>
																									<span style="font-size: 10px;"><strong>7:00 am</strong></span>
																								</div>
																								<div class="col-6 ">
																									<span style="font-size: 10px;" class="">Check Out Time</span><br>
																									<span style="font-size: 10px;"><strong>5:00 pm</strong></span>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-3 p-1">
																			<div>
																				<div class="card" style="background-color: #f3f0f5;">
																					<div class="row p-2">
																						<div class="col-12">
																							<div class="row">
																								<div class="col-1">
																									<i class="bx bx-time"></i>
																								</div>
																								<div class="col-6">
																									<span style="font-size: 12px;"> Mar. 27, 2023</span>
																								</div>
																								<div class="col-4">
																									<span class="pull-right" style="font-size: 11px; padding:0px 2px 0px 2px; border-radius: 10px; border: 1px solid #dbdf01; color: #769700;  background-color: #f8ffbd;"> Absent</span>
																								</div>
																							</div>
																						</div>
																					</div>
																					<div class="row p-2 mt-3">
																						<div class="col-12">
																							<div class="row">
																								<div class="col-6">
																									<span style="font-size: 10px;">Check In Time</span><br>
																									<span style="font-size: 10px;"><strong>--:--</strong></span>
																								</div>
																								<div class="col-6 ">
																									<span style="font-size: 10px;" class="">Check Out Time</span><br>
																									<span style="font-size: 10px;"><strong>--:--</strong></span>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-3 p-1">
																			<div>
																				<div class="card" style="background-color: #f3f0f5;">
																					<div class="row p-2">
																						<div class="col-12">
																							<div class="row">
																								<div class="col-1">
																									<i class="bx bx-time"></i>
																								</div>
																								<div class="col-6">
																									<span style="font-size: 12px;"> Mar. 27, 2023</span>
																								</div>
																								<div class="col-4">
																									<span class="pull-right" style="font-size: 11px; padding:0px 2px 0px 2px; border-radius: 10px; border: 1px solid #2ddf01; color: #009751;  background-color: #bdffe0;"> On-time</span>
																								</div>
																							</div>
																						</div>
																					</div>
																					<div class="row p-2 mt-3">
																						<div class="col-12">
																							<div class="row">
																								<div class="col-6">
																									<span style="font-size: 10px;">Check In Time</span><br>
																									<span style="font-size: 10px;"><strong>7:00 am</strong></span>
																								</div>
																								<div class="col-6 ">
																									<span style="font-size: 10px;" class="">Check Out Time</span><br>
																									<span style="font-size: 10px;"><strong>5:00 pm</strong></span>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																		
																	</div>
																</div>
																<!--/ Table -->
															</div>
															<div class="tab-pane fade" id="exA-tabs-2" role="tabpanel" aria-labelledby="exA-tab-2">
																<div class="col-sm-12">
																	<div class="table-responsive">
																		<table class="table text-nowrap mb-0 align-items-center">
																		<thead class="text-dark fs-6">
																			<tr>
																			<th class="border-bottom-0">
																				<h6 class="fw-semibold mb-0">Date</h6>
																			</th>
																			<th class="border-bottom-0">
																				<h6 class="fw-semibold mb-0">Check In</h6>
																			</th>
																			<th class="border-bottom-0">
																				<h6 class="fw-semibold mb-0">Check Out</h6>
																			</th>
																			<th class="border-bottom-0">
																				<h6 class="fw-semibold mb-0">Status</h6>
																			</th>
																			</tr>
																		</thead>
																		<tbody>
																			<tr>
																			<td class="border-bottom-0"><p class="fw-normal mb-0">10th April, 2023</p></td>
																			<td class="border-bottom-0">
																				<span class="fw-normal">--:--</span>                          
																			</td>
																			<td class="border-bottom-0">
																				<p class="mb-0 fw-normal">--:--</p>
																			</td>
																			<td class="border-bottom-0">
																				<div class="d-flex align-items-center gap-2">
																				<span class="text-success fw-semibold">Present</span>
																				</div>
																			</td>
																			</tr> 
																			<tr>
																				<td class="border-bottom-0"><p class="fw-normal mb-0">15th March, 2023</h6></p>
																				<td class="border-bottom-0">
																					<span class="fw-normal">7:00 am</span>                          
																				</td>
																				<td class="border-bottom-0">
																					<p class="mb-0 fw-normal">4:00 pm</p>
																				</td>
																				<td class="border-bottom-0">
																					<div class="d-flex align-items-center gap-2">
																					<span class="text-success fw-semibold">Present</span>
																					</div>
																				</td>
																			</tr>
																			<tr>
																				<td class="border-bottom-0"><p class="fw-normal mb-0">18th October, 2023</p></td>
																				<td class="border-bottom-0">
																					<span class="fw-normal">--:--</span>                          
																				</td>
																				<td class="border-bottom-0">
																				<p class="mb-0 fw-normal">--:--</p>
																				</td>
																				<td class="border-bottom-0">
																				<div class="d-flex align-items-center gap-2">
																					<span class="text-danger fw-semibold">Absent</span>
																				</div>
																				</td>
																			</tr>
																			<tr>
																				<td class="border-bottom-0"><p class="fw-normal mb-0">11th Febuary, 2023</p></td>
																				<td class="border-bottom-0">
																					<span class="fw-normal">6:00 am</span>                          
																				</td>
																				<td class="border-bottom-0">
																				<p class="mb-0 fw-normal">6:00 pm</p>
																				</td>
																				<td class="border-bottom-0">
																				<div class="d-flex align-items-center gap-2">
																					<span class="text-warning fw-semibold">Excused</span>
																				</div>
																				</td>
																			</tr> 
																			<tr>
																				<td class="border-bottom-0"><p class="fw-normal mb-0">19th June, 2023</p></td>
																				<td class="border-bottom-0">
																					<span class="fw-normal">--:--</span>                          
																				</td>
																				<td class="border-bottom-0">
																				<p class="mb-0 fw-normal">--:--</p>
																				</td>
																				<td class="border-bottom-0">
																				<div class="d-flex align-items-center gap-2">
																					<span class="text-warning fw-semibold">Excused</span>
																				</div>
																				</td>
																			</tr>                        
																		</tbody>
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
							</div>
							<div class="tab-pane fade" id="ex1-tabs-9" role="tabpanel" aria-labelledby="ex1-tab-9">
								<div class="row">
									<div class="col-sm-12 col-xl-12 col-lg-12 col-md-12 p-5">
										<!-- Education -->
										<div class="card card- mb-2">
											<div class="card-body">
												<div class="row flex-row d-flex">
													<div class="col-8">
														<p class="text-muted fs-5 fw-bolder">Education</p>
													</div>
													<div class="col-4">
														<div class="row pull-right">
															<div class="col-6">
																<i class="bx bx-pencil bx-sm edit_button" ></i>
															</div>
															<div class="col-6">
																<i class="bx bx-plus bx-sm edit_button" ></i>
															</div>
														</div>
													</div>
												</div>
												<div class="d-flex flex-wrap">
													<div class="chiBadgeCardOrange">
														<span class="chiBadgeCardTextOrange fw-bolder">C</span>
													</div>
													<div class="ms-2">
														<span> Command Secondary School Kaduna</span>
														<br>
														<span>West African Examination Council</span>
														<p class="fw-lighter">Sep 2008 - Aug 2009</p>
													</div>
												</div>
												<hr class="mt-0"/>
												<div class="d-flex flex-wrap">
													<div class="chiBadgeCardOrange">
														<span class="chiBadgeCardTextOrange fw-bolder">C</span>
													</div>
													<div class="ms-2">
														<span> Command Secondary School Kaduna</span>
														<br>
														<span>West African Examination Council</span>
														<p class="fw-lighter">Sep 2008 - Aug 2009</p>
													</div>
												</div>
											</div>
										</div>
										<!--/ Education -->

										<!-- Certification -->
										<div class="card mb-2">
											<div class="card-body subjects">
												<div class="row flex-row d-flex">
													<div class="col-8">
														<p class="text-muted fs-5 fw-bolder">Certification</p>
													</div>
													<div class="col-4">
														<div class="row pull-right">
															<div class="col-6">
																<i class="bx bx-pencil bx-sm edit_button" ></i>
															</div>
															<div class="col-6">
																<i class="bx bx-plus bx-sm edit_button" ></i>
															</div>
														</div>
													</div>
												</div>
												<div class="row">

													<div class="col-sm-6 p-1">
														<div>
															<div class="card shadow-sm" style="border: 1px solid #e8ebf0; color: #101114;">
																<div class="row p-3">
																	<div class="col-2">
																		<div class="">
																			<!-- <img class="tari_award_img" src="profile-1.jpg" width="60"> -->
																			<?php
																			echo '<img class="tari_award_img" src="../../assets/images/Staff-Profile-Images/' . $StaffPhoto . '" width="60">';
																			?>
																		</div>
																	</div>
																	<div class="col-8">
																		<span><strong>Title: </strong></span><span style="font-size: 12px;"> Best English Teacher</span> <br>
																		<span style="font-size: 12px;">Institution: Goodtidings Academy Jikwoyi</span><br>
																		<span style="font-size: 10px;">Date: 14th June 2021</span>
																	</div>
																	<div class="col-2">
																		<div class="tariaward">
																			<i class="bx bx-certification bx-md"></i>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<div class="col-sm-6 p-1">
														<div>
															<div class="card shadow-sm" style="border: 1px solid #e8ebf0; color: #101114;">
																<div class="row p-3">
																	<div class="col-2">
																		<div class="">
																			<img class="tari_award_img" src="profile-1.jpg" width="60">
																		</div>
																	</div>
																	<div class="col-8">
																		<span><strong>Title: </strong></span><span style="font-size: 12px;"> Best English Teacher</span> <br>
																		<span style="font-size: 12px;">Institution: Goodtidings Academy Jikwoyi</span><br>
																		<span style="font-size: 10px;">Date: 14th June 2021</span>
																	</div>
																	<div class="col-2">
																		<div class="tariaward">
																			<i class="bx bx-certification bx-md"></i>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-6 p-1">
														<div>
															<div class="card shadow-sm" style="border: 1px solid #e8ebf0; color: #101114;">
																<div class="row p-3">
																	<div class="col-2">
																		<div class="">
																			<img class="tari_award_img" src="profile-1.jpg" width="60">
																		</div>
																	</div>
																	<div class="col-8">
																		<span><strong>Title: </strong></span><span style="font-size: 12px;"> Best English Teacher</span> <br>
																		<span style="font-size: 12px;">Institution: Goodtidings Academy Jikwoyi</span><br>
																		<span style="font-size: 10px;">Date: 14th June 2021</span>
																	</div>
																	<div class="col-2">
																		<div class="tariaward">
																			<i class="bx bx-certification bx-md"></i>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-sm-6 p-1">
														<div>
															<div class="card shadow-sm" style="border: 1px solid #e8ebf0; color: #101114;">
																<div class="row p-3">
																	<div class="col-2">
																		<div class="">
																			<img class="tari_award_img" src="profile-1.jpg" width="60">
																		</div>
																	</div>
																	<div class="col-8">
																		<span><strong>Title: </strong></span><span style="font-size: 12px;"> Best English Teacher</span> <br>
																		<span style="font-size: 12px;">Institution: Goodtidings Academy Jikwoyi</span><br>
																		<span style="font-size: 10px;">Date: 14th June 2021</span>
																	</div>
																	<div class="col-2">
																		<div class="tariaward">
																			<i class="bx bx-certification bx-md"></i>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- End Certification -->
									</div>
								</div>
							</div>
							</div>
							<!-- Tab panes -->
					</div>
				
				</div>
			</div>
			<!--/ Navbar pills -->
			<!-------End Dashboard Content ------------->
			
		</main>
		<!-- End Main -->

	</div>

	<!-- Modal container it includes the overlay -->
	<div class="modal fade" id="exampleModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg tari_modal_dialog">
			<div class="modal-content tari_modal">
			<div class="modal-header border-0">
				<!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
				<!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
			</div>
			<div class="modal-body">
				<!-- =======default language start here====== -->
				<div id="changelang"  style="display:none; background-color:white;border-radius:21px; padding-top:20px; padding-bottom:20px;">
					<center>
						<img src="vi.png" style="width:15%;">
					</center>
					<center>
						<h4>
							<b>
							<?php echo $portal_prelanguagequestion; ?>
							</b>
						</h4>
					</center>
					<center>
						<p class="" style="color:#5A5A5A;font-size:15px;margin-left:5%;">
							<?php echo $portal_hi; ?>
							<b>
								<?php echo ucfirst(strtolower($ParentFirstName)); ?>
							</b>,
							<?php echo $portal_sellang_info; ?>
							<br>
							<?php echo $portal_sellang_des; ?>
						</p>
					</center>
					<div class="card-body">
						<div class="row" align="center">
							<div class="col-sm-4">
								<div class="centerlangues eng">
									<input type="radio" class="defaultlang english with-gap englishclick"  value="english" id="radio-btn" name="radio-btn">
									<label style="margin-left:15px;font-size:13px;" for="radio-btn">English</label>
									<!-- <span style="float:right;margin-right:5%;"><i
											class="flag-icon flag-icon-us"></i></span> -->
								</div>
							</div>
							<div class="col-sm-4">
								<div class="centerlangues">
									<input type="radio" class="defaultlang french with-gap frenchclick" value="french" id="radio-btnone" name="radio-btn" style="cursor:pointer;">
									<label style="margin-left:15px;font-size:13px;" for="radio-btnone">français</label>
										
									<!-- <span style="float:right;margin-right:5%;"><i
											class="flag-icon flag-icon-fr"></i></span> -->
								</div>
							</div>
							<div class="col-sm-4">
								<div class="centerlangues">
									<input type="radio" class="defaultlang spanish with-gap spanishclick"  value="spanish" id="spanish" name="radio-btn" style="cursor:pointer;">
									<label style="margin-left:15px;font-size:13px;" for="spanish">español</label>	
									<!-- <span style="float:right;margin-right:5%;"><i
											class="flag-icon flag-icon-es"></i></span> -->
								</div>
							</div>
							<div class="col-sm-4">

								<div class="centerlangues">

									<input type="radio" class="defaultlang chinese with-gap chineseclick"  value="chinese" id="chinese" name="radio-btn" style="cursor:pointer;">
									<label style="margin-left:15px;font-size:13px;" for="chinese">中文</label>
									<!-- <span style="float:right;margin-right:5%;"><i
											class="flag-icon flag-icon-ch"></i></span> -->
								</div>

							</div>
							<div class="col-sm-4">
								<div class="centerlangues">
									<input type="radio" class="defaultlang arabic with-gap arabicclick"  value="arabic" id="arabic" name="radio-btn" style="cursor:pointer;">
									<label style="margin-left:15px;font-size:13px;" for="arabic">العربية</label>
									<!-- <span style="float:right;margin-right:5%;"><i
											class="flag-icon flag-icon-eh"></i></span> -->
								</div>
							</div>
							<div class="col-lg-4">
								<div class="centerlangues">
									<input type="radio" class="defaultlang hindi with-gap hindicclick"  value="hindi" id="hindi" name="radio-btn" style="cursor:pointer;">
									<label style="margin-left:15px;font-size:13px;" for="hindi">हिंदी</label>
									<!-- <span style="float:right;margin-right:5%;"><i
											class="flag-icon flag-icon-ci"></i></span> -->
								</div>
							</div>
							<div class="col-sm-4">
								<div class="centerlangues">
									<input type="radio" class="defaultlang yoruba with-gap yorubaclick"  value="yoruba" id="yoruba" name="radio-btn" style="cursor:pointer;">
									<label style="margin-left:15px;font-size:13px;" for="yoruba">Yoruba</label>
									<!-- <span style="float:right;margin-right:5%;"><i
											class="flag-icon flag-icon-ch"></i></span> -->
								</div>
							</div>
							<div class="col-sm-4">
								<div class="centerlangues">
									<input type="radio" class="defaultlang hausa with-gap hausaclick"  value="hausa" id="hausa" name="radio-btn" style="cursor:pointer;">
									<label style="margin-left:15px;font-size:13px;" for="hausa">Hausa</label>
									<!-- <span style="float:right;margin-right:5%;"><i
											class="flag-icon flag-icon-eh"></i></span> -->
								</div>
							</div>
							<div class="col-lg-4">
								<div class="centerlangues">
									<input type="radio" class="defaultlang igbo with-gap igboclick"  value="igbo" id="igbo" name="radio-btn" style="cursor:pointer;">
									<label style="margin-left:15px;font-size:13px;" for="igbo">Igbo</label>
									<!-- <span style="float:right;margin-right:5%;"><i
											class="flag-icon flag-icon-ci"></i></span> -->
								</div>
							</div>
							<br>
							<button type="button" id="defaultlangbtn" data-id="11" style="background-color:#007bff;cursor:pointer;margin-top:2%;margin-left:2%;width:96%;" class="btn btn-block btn-lg text-light">
								<?php echo $portal_proceed; ?> 
								<i class="fa fa-long-arrow-right" style="font-size: 13px;"></i>
							</button>
						</div>
					</div>

				</div>
				<!-- =======default language end here====== -->

				 <!-- =======ai welcoming  start here====== -->
				 <div id="displayaiwelcome" style="background-color:white;padding:8px;padding-bottom:15px;margin-top:5%;border-radius:10px;display:none;">      
					<u style="cursor:pointer;float:right;margin-right:3%;" class="" id="previoutAI">
						<i class="fa fa-long-arrow-left" style="font-size:11px;"></i>
						<?php echo $portal_back; ?>
					</u>
					<div class="row">
						<div class="col-sm-7" align="left" style="margin-top:8%;">
							<p> <strong><?php echo $portal_welcometo; ?>
									<div style="font-size:14px;">
										<?php echo $portal_AI_onboarding_introduction; ?>
									</div>
								</strong>
							</p>
							<button type="button" id="ai-btn" data-id="10"
								style="background-color:#007bff;cursor:pointer;margin-top:5%;width:93%;font-size:15px;"
								class="btn btn-block btn-lg text-light"><?php echo $portal_proceed; ?>
								<i  class="fa fa-long-arrow-right" style="font-size: 13px;float:right;"></i>
							</button>
						</div>
						<div class="col-sm-5 d-none d-sm-block  d-xm-block text-right" id="aimessageimagediv">
							<img src="../assets/images/users/aiimage.jpg" id="aiimage">
						</div>
					</div>
				</div>
				<!-- =======ai welcoming  end here====== -->

				<!-- ======Verify Phone Number===== -->
				<div class="row" id="verifyphone" style="display:none;padding-left:5px; padding-right:5px;">
					<div class="col-sm-12" align="center">
						<u style="cursor:pointer;float:right;margin-right:3%;" class="" id="previousdisplay">
							<i class="fa fa-long-arrow-left" style="font-size:11px;"></i>
							<?php echo $portal_back; ?>
						</u>
						<div class="row">
							<h4 class="schoolheading"  style="line-height: 35px; color:black;" >Verify Phone Number</h4><br>
							<span class="">How do you wish yo be verified, Kindly select an option below</span><br>
							<span class=""></span><br>
						</div>
					</div>
					<div class="col-sm-12">
						<a href="" id="pros-watchtutorial" style="color:blue;font-size:13px;cursor:pointer;float:right;"><i class=" fa fa-play-circle" style="font-size:20px;"></i> Watch tutorial</a> 
					</div>
					<div class="col-md-6 mb-3">
						<div class="card stafflink-card bringformlink" data-id="1" style="cursor:pointer;">
						<!-- Card content for box 1 -->
							<div class="card-body" style="border:none;border:1px solid #007bff;border-radius:5px;height:100px;">
							<div class="radio-group">
									<input type="radio" style="cursor:pointer;float:right;" class="with-gap inviteuser-create  bringformlink" id="invitelink" value="Invite Staff" name="inviteuser-link">
									<label class="ml-1 mb-2" for="invitelink" style="font-weight:600;cursor:pointer;">
										<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="green" class="bi bi-whatsapp" viewBox="0 0 16 16">
										<path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
										</svg> WhatsApp 
									</label>
								</div>
								<p style="font-size: 12px;">You will recieve an OTP Code on your Whatsapp.</p>
							</div>
						</div>
					</div>  
					<div class="col-md-6 mb-3">
						<div class="card stafflink-card bringformlink" data-id="2" style="cursor:pointer;">
							<div class="card-body" style="border:none;border:1px solid #007bff;border-radius:5px;;height:100px;">
								<div class="radio-group">
									<input type="radio" style="cursor:pointer;float:right;" class="with-gap inviteuser-create bringformlink" id="createstaff" value="Create staff" name="inviteuser-link">
									<label class="ml-1 mb-2" for="createstaff" style="font-weight:600;cursor:pointer;">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-envelope" viewBox="0 0 16 16">
										<path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
										</svg> SMS
									</label>
								</div>
								<p style="font-size: 12px;">You will recieve an OTP Code on your Phone</p>
							</div>
						</div><br>
					</div>
					<div class="row">
						<div class="col-sm-12"  id="displaystaffemail" style="display:none; margin-left:10px;">
							<div class="row">
								<div class="col-sm-12 mb-3">
									<div class="pros-geneclass-label"  style="width: 100%; text-transform: uppercase;position: relative; font-weight: 700; display: block; font-size: 11px; font-family: poppins, sans-serif;"><label for="schoolName"></label></div>
										<div class="pros-flexi-input-affix-wrapper-campus">
											<input name="WhatsappNumber[main]" class="pros-flexi-input WhatsappNumber" placeholder="e.g XXXX-XXX-XXXX" id="WhatsappNumber" type="text" spacebottom="10px" required="" value ="<?php echo $ParentMainPhoneNumber; ?>" style="width: 95%;margin-left:4%;">
										</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<button type="button" id="whatsapp_send" class="btn btn-primary form-control" style="font-size:14px; border-radius: 20px;">Send OTP</button>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12" id="displaystaffemail2" style="display:none;">
						<div class="row">
								<div class="col-sm-12 mb-3">
									<div class="pros-geneclass-label"  style="width: 100%; text-transform: uppercase;position: relative; font-weight: 700; display: block; font-size: 11px; font-family: poppins, sans-serif;"><label for="schoolName"></label></div>
										<div class="pros-flexi-input-affix-wrapper-campus">
											<input name="WhatsappNumber2[main]" class="pros-flexi-input WhatsappNumber2" placeholder="e.g XXXX-XXX-XXXX" id="WhatsappNumber2" type="text" spacebottom="10px" required="" value ="<?php echo $ParentMainPhoneNumber; ?>" style="width: 95%;margin-left:4%;">
										</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<button type="button" id="sms_send" class="btn btn-primary form-control" style="font-size:14px; border-radius: 20px;">Send OTP</button>
									</div>
								</div>
							</div>
						</div>           
					</div>
				</div>
				<!-- ====== End Verify Phone Number===== -->

				<!-- Verification Code -->
				<div class="row" align="center" id="verifysms" style="display:none;">
					<div class="col-md-12">
						<img id="edumessblue" width="150" class="img-fluid" src="../assets/images/website_images/edumes-blue.png" style="margin-top:2.5%;">
						<div  id="" class="" style="box-shadow:0 0px 0px 0 #D3D3D3; border-radius:10px; margin-top:2%;">
							<h3 style="padding-top:40px; padding:20px;" id="verificatitle"><?php echo $website_signup_verication_title; ?></h3>
							<!-- <p style="color:#92929D;font-size:15px;font-family: Arial, Helvetica, sans-serif;padding-top:40px;"><?php echo $website_signup_verication_title_des; ?> <?php echo $email; ?></p>
							<p style="color:#92929D;font-size:15px;padding-top:40px;padding-bottom:40px;" ><?php echo $website_signup_verication_title_dessub; ?></p>
								<span id="pwmatcherr"></span> -->
								<div class="centerverification pin">
									<input type="text"  id="areaCode" value="" size = "1" maxlength="1"  autocomplete="off" required pattern="\d{1}" autofocus class="pasteitems" style="width:40px;border:none;background-color:#F1F5F9;border-bottom:2px solid #00008B;">&nbsp&nbsp
									<input type="text" id="firstNum" value=""  size = "1" maxlength="1" autocomplete="off" required pattern="\d{1}" class="pasteitems"  style="width:40px;border:none;background-color:#F1F5F9;border-bottom:2px solid #00008B;">&nbsp&nbsp
									<input type="text" id="secondNum" value=""  size = "1" maxlength="1" autocomplete="off" required pattern="\d{1}" class="pasteitems"  style="width:40px;border:none;background-color:#F1F5F9;border-bottom:2px solid #00008B;">&nbsp&nbsp
									<input type="text" id="thirdNum" value=""  size = "1" maxlength="1" autocomplete="off" required pattern="\d{1}" class="pasteitems" style="width:40px;border:none;background-color:#F1F5F9;border-bottom:2px solid #00008B;">&nbsp&nbsp
									<input type="text" id="fourthNum" value=""  size = "1" maxlength="1" autocomplete="off" required pattern="\d{1}" class="pasteitems" style="width:40px;border:none;background-color:#F1F5F9;border-bottom:2px solid #00008B;">&nbsp&nbsp
									<input type="text" id="fifthNum" value=""  size = "1" maxlength="1" autocomplete="off" required pattern="\d{1}" class="pasteitems" style="width:40px;border:none;background-color:#F1F5F9;border-bottom:2px solid #00008B;">&nbsp&nbsp
								</div> 
								<br>

								<!-- Timer display -->
								<span id="timer">00:00</span>
								<br>

								<span id="timer2"></span>

								<span id="timer3"></span>
								
								
								<!--w-10 h-[100px] border-b-2 border-[#35977F] !bg-[#F1F5F9] undefined focus:outline-none focus:border-[#35977F] focus:border-b-4 text-center text-2xl font-semibold -->
								<div class="row" id="hide_resend">
									<span style="margin-top:50px;color:#92929D;font-size:17px;">
										<?php echo $website_signup_verication_title_didrecicecode; ?>
									</span><br>
									<span class="button" id="sms_send" style="color: #0066ff;cursor: pointer; font-size:17px;">
										<?php echo $website_signup_verication_title_resendcode; ?>
									</span>
									<br>
								</div>

								<div class="row col-6 mt-2">
									<button type="button" id="verifyotp" class="btn waves-effect waves-light text-light"  style="background-color:#0047AB;"><?php echo $website_signup_verication_title_btntitle; ?></button><br><br>
								</div>
					</div>    
						<!-- <p style="padding-top:40px;color:#92929D;" id="signin"><?php echo $website_signup_verication_title_alreadyhavacc; ?> <a href="../sign-in?lang=<?php echo $lang; ?>"><?php echo $website_signup_verication_title_havacclink; ?></a></p> -->
						</div> 
				</div>
				<!-- End of Verification Code -->
		</div>
			<!-- <div class="modal-footer border-0">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div> -->
			</div>
		</div>
	</div>
   
    <!---====End Edit Contact Side Modal End Here====-->
    
    <!--Script-->
    <!--jquery knob -->
    <script src="../../assets/plugins/knob/jquery.knob.js"></script>

    <!--Custom JS--->
    <script src="../../js/app_js/appScript.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- header js -->
    <script src="../../controller/js/app/header.js"></script>

    <!-- pagination js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.min.js"></script>

    <!-- notification js -->
    <script src="../../assets/plugins/notify/wnoty.js"></script>

    <!-- image cropper js -->
    <script src="../../assets/plugins/Croppie/croppie.js"></script>
    <script src="../../assets/plugins/Croppie/croppie.min.js"></script>
    
    <script src="../../controller/js/app/parent-script.js"></script>
</body>

</html>