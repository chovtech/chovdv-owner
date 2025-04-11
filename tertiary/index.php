<?php
include('../controller/config/config.php');

@$langold = $_GET['lang'];

if ($langold == '' || $langold == NULL || $langold == 'undefined' || $langold == 'null') {
	$lang = 'english';
} else {
	$lang = $_GET['lang'];
}

include('../lang/' . $lang . '.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="author" content="EduMESS" />
	<meta name="description"
		content="EduMESS (Education Management and E-Learning Software Solution) is a leading school management, automation and elearning solution. Since its launch, EduMESS has grown to become a leader. Our clients say that the simplicity of our interface, ease of use, cost effectiveness and excellent customer care is the reason they prefare EduMESS. We have watched schools move from softwares they are using to EduMESS." />
	<meta name="keywords"
		content="Best, School, Management, Best School, Best School Management, Best School Management Software, Free School Management Software, Portal, School Owner, Group of School Owner, Consultants, Brand Promoters | School Portal Generator ">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- SITE TITLE -->
	<title>
		<?php echo $website_title; ?>
	</title>

	<!-- FAVICON -->
	<link rel="shortcut icon" href="../assets/images/website_images/favicon.png"
		type="image/x-icon">

	<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- website css -->
	<link rel="stylesheet" href="../css/website_css/website_css.css">

	<!-- font awesome cn -->
	<link rel="stylesheet" href="../assets/plugins/font_awesome/css/font-awesome.min.css">

	<!-- Swiper CSS -->
	<link rel="stylesheet" href="../css/website_css/swiper-bundle.min.css" />

	<!-- CSS -->
	<link rel="stylesheet" href="../css/website_css/testimonial_style.css" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
	<!-- Boxicons CSS -->
	<link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
	<section>

		<!-------NavBar ------------->
		<!--------------------------->
		<?php include('../includes/website-header.php'); ?>


		<!-------Top banner ------------->
		<!--------------------------->
		<div class="container-fluid" style="background-color: #FCFDFF;">
			<div class="row pb-5" align="left">
				<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 home">
					<!-------dotted img ------------->
					<!--------------------------->
					<img class="dotted-img img-fluid" src="../assets/images/dottedimg.png" />

					<div class="home-text ps-5">

						<h4  style="font-weight: 500;">
							 <?php echo $tertiary_page_banner_h4; ?>
						</h4>


						<a style="font-size: 45px;text-decoration: none;color:#007bff;" href="" class="typewrite fw-bolder"
							data-period="2000"
							data-type='[ "<?php echo $tertiary_page_animate_txt1; ?>", "<?php echo $tertiary_page_animate_txt2; ?>", "<?php echo $tertiary_page_animate_txt3; ?>" ]'>
							<span class="wrap"></span>
						</a>

					</div>

					<div class="aftwriteup" style="font-weight: 400; font-size: 17px; padding-right: 150px;">
						<span>
							<?php echo $tertiary_page_banner_descr; ?>
						</span>
					</div>
									
					<div class="btndiv" align="left">
						<a href="#" class="btn startbtn11"
							style="border-radius: 5px; background: linear-gradient(90deg, rgba(0,123,255,1) 35%, rgba(2,107,219,1) 100%, rgba(0,212,255,1) 100%);">
							<span style="font-weight: 600;">
								 <?php echo $k12_page_banner_started_btn; ?>
							</span>
						</a>
						&nbsp;&nbsp;
						<a href="#" class="btn appbtn22" style="border-radius: 5px;">
							<span style="display: flex; align-items: center;">
								<span style="color: #f03e1f; font-size: 25px;"><i class='bx bx-play-circle'></i></span>
								&nbsp;&nbsp;
								<span style="color:#3A3A3A; font-weight: 600; font-size: 16px;"><?php echo $k12_page_banner_watch_btn; ?></span>
							</span>
						</a>
					</div>

					


				</div>
				<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 containerimg mt-5" align="center">
					<img class="img-fluid" src="../assets/images/tertiaryBanner.png"  style="margin-top:100px;"/>
				</div>
			</div>

			<!-------schools------------->
			<!--------------------------->

			<!-- schools -->
			<div class="pb-5">
				<div class="row p-sm-5" style="margin-top:40px;">
					<div class="col-md-12 col-lg-3">
						
					</div>
					<div class="col-md-12 col-lg-6 fw-Normal fs-4" align="center" style="font-size:22px;font-weight:400;color:#3A3A3A;">
						<?php echo $k12_page_brand_head_txt; ?>
						
					</div>
					<div class="col-md-12 col-lg-3">
						
					</div>
				</div>
				<!-- SCHOOLS -->
				<div class="franchise_slider pt-4">
					<div class="chislide-track">
						<div class="chyslide">
							<img src="../assets/images/website_images/1.png" height="50" width="auto"
								alt="" />
						</div>
						<div class="chyslide">
							<img src="../assets/images/website_images/2.png" height="50" width="auto"
								alt="" />
						</div>
						<div class="chyslide">
							<img src="../assets/images/website_images/3.png" height="50" width="auto"
								alt="" />
						</div>
						<div class="chyslide">
							<img src="../assets/images/website_images/4.png" height="50" width="auto"
								alt="" />
						</div>
						<div class="chyslide">
							<img src="../assets/images/website_images/5.png" height="50" width="auto"
								alt="" />
						</div>
						<div class="chyslide">
							<img src="../assets/images/website_images/6.png" height="50" width="auto"
								alt="" />
						</div>
						<div class="chyslide">
							<img src="../assets/images/website_images/7.png" height="50" width="auto"
								alt="" />
						</div>
						<div class="chyslide">
							<img src="../assets/images/website_images/8.png" height="50" width="auto"
								alt="" />
						</div>
						<div class="chyslide">
							<img src="../assets/images/website_images/9.png" height="50" width="auto"
								alt="" />
						</div>
						<div class="chyslide">
							<img src="../assets/images/website_images/10.png" height="50" width="auto"
								alt="" />
						</div>
						<div class="chyslide">
							<img src="../assets/images/website_images/11.jpg" height="50" width="auto"
								alt="" />
						</div>
						<div class="chyslide">
							<img src="../assets/images/website_images/12.png" height="50" width="auto"
								alt="" />
						</div>
						<div class="chyslide">
							<img src="../assets/images/website_images/13.png" height="50" width="auto"
								alt="" />
						</div>
						<div class="chyslide">
							<img src="../assets/images/website_images/14.png" height="50" width="auto"
								alt="" />
						</div>
						<div class="chyslide">
							<img src="../assets/images/website_images/15.png" height="50" width="auto"
								alt="" />
						</div>
						<div class="chyslide">
							<img src="../assets/images/website_images/16.png" height="50" width="auto"
								alt="" />
						</div>
						<div class="chyslide">
							<img src="../assets/images/website_images/17.png" height="50" width="auto"
								alt="" />
						</div>
						<div class="chyslide">
							<img src="../assets/images/website_images/18.png" height="50" width="auto"
								alt="" />
						</div>
						<div class="chyslide">
							<img src="../assets/images/website_images/19.png" height="50" width="auto"
								alt="" />
						</div>
						<div class="chyslide">
							<img src="../assets/images/website_images/20.png" height="50" width="auto"
								alt="" />
						</div>
						<div class="chyslide">
							<img src="../assets/images/website_images/21.png" height="50" width="auto"
								alt="" />
						</div>
						<div class="chyslide">
							<img src="../assets/images/website_images/22.png" height="50" width="auto"
								alt="" />
						</div>
						<div class="chyslide">
							<img src="../assets/images/website_images/23.png" height="50" width="auto"
								alt="" />
						</div>
					</div>
				</div>
			</div>

		</div>
		


		<div class="container" style="width:85%;">

			<!------- why edumess------------->
			<!--------------------------->
			<div class="row" style="margin-top:120px;">
				<div class="col-md-12 col-lg-6" style="font-size:15px;color:#3A3A3A;margin-top:12px;">
					<div class="row">
						<div class="col-12">
							<small style="font-size:16px;font-weight:550;color:#007bff;">
								<?php echo $k12_page_why_edumess_small; ?>
							</small><br><br>
							<h1 class="fw-bolder" style="color:black;">
								<?php echo $k12_page_why_edumess_h1; ?>
							</h1>
						</div>
						<div class="col-12" style="margin-top:0px;">
						<img class="img-fluid d-sm-block d-md-block d-xm-block" src="../assets/images/whyEduMESS-SchoolManagement.png" style="width:80%;" />
						</div>
					</div>

				</div>
				<div class="col-md-12 col-lg-6" align="center">
					<div class="row mt-5">
						<div class="col-lg-6 col-md-12 ">
							<div class="card mt-5 p-4" align="left" style="border: solid 2px #007bff; border-radius: 10px;">
								<span>
									<i class="fa fa-users fs-4" style="color: #007bff;"></i>
								</span>
								<span class="fs-5 mt-3" style="font-weight: 600;">
									 <?php echo $k12_page_why_edumess_customer_title; ?>
								</span>
								<span class="mt-3">
									<small class="fs-6 fw-light">
										<?php echo $k12_page_why_edumess_customer_descr; ?>
									</small>
								</span>
							</div>
						</div>

						<div class="col-lg-6 col-md-12">
							<div class="card mt-5 p-4" align="left" style="border: #f76134 solid 2px ;border-radius: 10px;">
								<span>
									<i class="fa fa-money fs-4" style="color: #f76134;"></i>
								</span>
								<span class="fs-5 mt-3" style="font-weight: 600;">
									<?php echo $k12_page_why_edumess_flexibl_title; ?>
								</span>
								<span class="mt-3">
									<small class="fs-6 fw-light">
										<?php echo $k12_page_why_edumess_flexibl_descr; ?>
									</small>
								</span>
							</div>
						</div>
						
						<div class="col-lg-6 col-md-12">
							<div class="card mt-4 mb-3 p-4" align="left" style="border: #f76134 solid 2px ;border-radius: 10px;">
								<span>
									<i class="fa fa-smile-o fs-4" style="color: #f76134;"></i>
								</span>
								<span class="fs-5 mt-3" style="font-weight: 600;">
									<?php echo $k12_page_why_edumess_friendly_title; ?>
								</span>
								<span class="mt-3">
									<small class="fs-6 fw-light">
										<?php echo $k12_page_why_edumess_friendly_descr; ?>
									</small>
								</span>
							</div>
						</div>

						<div class="col-lg-6 col-md-12">
							<div class="card mt-4 mb-3 p-4" align="left" style="border: solid 2px #007bff; border-radius: 10px;">
								<span>
									<i class="fa fa-cogs fs-4" style="color: #007bff;"></i>
								</span>
								<span class="fs-5 mt-3" style="font-weight: 600;">
									<?php echo $k12_page_why_edumess_customizable_title; ?>
								</span>
								<span class="mt-3">
									<small class="fs-6 fw-light">
										<?php echo $k12_page_why_edumess_customizable_descr; ?>
									</small>
								</span>
							</div>
						</div>


					</div>
				</div>
			</div>

			<div class="row" style="margin-top:200px;">
				<div class="col-md-12 col-lg-2">
					
				</div>
				<div class="col-md-12 col-lg-8" align="center" style="font-size:35px;font-weight:700;">
					 <?php echo $tertiary_page_feature_head_txt; ?>
				</div>
				<div class="col-md-12 col-lg-2">
					
				</div>
			</div>

		</div>

		<div class="container-fluid" style="width:95%;">

			<!-- Admission Management -->
			<div class="row p-3" style="margin-top:150px;">
				<div class="col-md-12 col-lg-6" align="center">
					<img class="img-fluid d-none d-sm-block d-md-block d-xm-block"
						src="../assets/images/eduMessaddmission.png" style="width:70%;" />
				</div>
				<div class="col-md-12 col-lg-6" style="font-size:15px;color:#3A3A3A;margin-top:12px;">
					<div class="row">
						<div class="col-12">
							<span style="font-size:30px;font-weight:550;color:#007bff;">
							 	 <?php echo $tertiary_page_admission_management_h1; ?>
							</span>
						</div>
						<div class="col-12" style="margin-top:30px;">
							<small style="color:#6e6e6e; font-size:15px; font-weight: 600;">
								<?php echo $tertiary_page_admission_management_descri; ?>
								
							</small>
						</div>
					
						<div class="col-2" style="margin-top:10px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff;font-size:15px;">
								<i class="fa fa-tasks" aria-hidden="true" style="padding:5px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">
							<span style="font-size:15px;font-weight:600; color: #6e6e6e;">
								<?php echo $tertiary_page_admission_management_list1; ?>
												
							</span>
						</div>
					
						<div class="col-2" style="margin-top:10px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff;font-size:18px;">
								<i class='bx bxs-book-content' style="padding:5px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">

							<span style="font-size:15px;font-weight:600; color: #6e6e6e;">
							 	<?php echo $tertiary_page_admission_management_list2; ?>
							</span>

						</div>
						<div class="col-2" style="margin-top:10px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff;">
							
								<i class='bx bx-line-chart' style="padding:5px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">

							<span style="font-size:15px;font-weight:600; color: #6e6e6e;">
								 <?php echo $tertiary_page_admission_management_list3; ?>
							</span>

						</div>
						<div class="col-2" style="margin-top:10px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff;font-size:15px;">
								<i class='bx bxs-receipt' style="padding:5px; font-size:18px;"></i>
								
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">

							<span style="font-size:15px;font-weight:600; color: #6e6e6e;">
							 <?php echo $tertiary_page_admission_management_list4; ?>
							</span>

						</div>
					
					</div>
				</div>
			</div>
			<!-- Admission Management -->


			<!-- Course Registration -->
			<div class="row chires1 p-1" style="margin-top:250px;">
				<div class="col-md-12 col-lg-6" style="font-size:15px;color:#3A3A3A;margin-top:12px;">
					<div class="row ps-5">
						<div class="col-12" style="margin-top:50px;">
							<span style="font-size:30px;font-weight:550;color:#007bff;">
								 <?php echo $tertiary_page_course_registration_h1; ?>
							</span>
						</div>
						<div class="col-12" style="margin-top:30px;">
							<small style="color:#6e6e6e; font-size:15px; font-weight: 600;">
								<?php echo $tertiary_page_course_registration_description; ?>
							</small>
						</div>
						
						<div class="col-10" style="margin-top:20px;">
							<a href="#" align="left" class="btn learnMoreBtn"
								style="background: linear-gradient(90deg, rgba(0,123,255,1) 35%, rgba(2,107,219,1) 100%, rgba(0,212,255,1) 100%);">
								<span style="font-weight: 600;">
								<?php echo $tertiary_page_learn_morebtn ?>
								</span>
							</a>

						</div>
						<div class="col-2" style="margin-top:20px;">
						
							
						</div>
						
					</div>
				</div>
				<div class="col-md-12 col-lg-6" align="center">
					<img class="img-fluid d-none d-sm-block d-md-block d-xm-block"
						src="../assets/images/courseregistrationEduMESS.png" style="width:95%; margin-top: 30px;" />
				</div>
				
			</div>
			<!-- Course Registration -->


			<!------- School Fees Payment Processor ----->
			<div class="row chires2 p-3" style="margin-top:250px;">
				<div class="col-md-12 col-lg-6" align="center">
					<img class="img-fluid d-none d-sm-block d-md-block d-xm-block"
						src="../assets/images/schoolFeesPaymentProcessor.png" style="width:80%; margin-top: 20px;" />
				</div>
				<div class="col-md-12 col-lg-6" style="font-size:15px;color:#3A3A3A;margin-top:12px;">
					<div class="row">
						<div class="col-12">
							<span style="font-size:30px;font-weight: 600; color:#007bff;">
								 <?php echo $tertiary_page_payment_processor_h1; ?>
							</span>
						</div>
						<div class="col-12" style="margin-top:30px;">
							<small style="color:#6e6e6e; font-size:15px; font-weight: 600;">
								<?php echo $tertiary_page_payment_processor_descri; ?>
							</small>
						</div>
						<div class="col-2" style="margin-top:15px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#FF7F5F; border-radius: 100%;  color:#fff;font-size:18px;">
								<i class="bx bxs-wallet" aria-hidden="true" style="padding:10px 7px 10px; 7px"></i>
							</span>
						
						</div>
						<div class="col-10" style="margin-top:30px;">
							<span style="font-size:15px;font-weight:600; color: #6e6e6e;">
								 <?php echo $tertiary_page_payment_processor_list1; ?>
							</span>
						</div>
						<div class="col-2" style="margin-top:15px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#00E1F0; border-radius: 100%; color:#fff;font-size:18px;">
								<i class="bx bxs-receipt" aria-hidden="true" style="padding:10px 7px 10px; 7px"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:30px;">

							<span style="font-size:15px;font-weight:600; color: #6e6e6e;">
								<?php echo $tertiary_page_payment_processor_list2; ?>
							</span>

						</div>
						<div class="col-2" style="margin-top:20px;">
							
						</div>
						<div class="col-10" style="margin-top:20px;">

							<a href="#" align="left" class="btn learnMoreBtn"
								style="background: linear-gradient(90deg, rgba(0,123,255,1) 35%, rgba(2,107,219,1) 100%, rgba(0,212,255,1) 100%);">
								<span style="font-weight: 600;">
									 <?php echo $tertiary_page_learn_morebtn ?>
								</span>
							</a>

						</div>
						
					</div>
				</div>
			</div>
			<!------- School Fees Payment Processor ----->

		</div>


		<div class="container-fluid" style="width:95%; padding-bottom: 250px;">

			<!-- Result Processing  -->
			<div class="row chires3 p-1" style="margin-top: 200px; ">
				<div class="col-md-12 col-lg-6" style="font-size:15px;color:#3A3A3A;margin-top:12px;">
					<div class="row ps-5">
						<div class="col-12" style="margin-top:50px;">
							<span style="font-size:30px;font-weight:550;color:#007bff;">
								<?php echo $tertiary_page_result_processing_h1; ?>
							</span>
						</div>
						<div class="col-12" style="margin-top:30px;">
							<small style="color:#6e6e6e; font-size:15px; font-weight: 600;">
								<?php echo $tertiary_page_result_processing_descri_txt; ?>
								
							</small>
						</div>
						<div class="col-2" style="margin-top:10px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;">
								<img src="../assets/images/icon-3.png" width="35" alt="">
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">
							<span style="font-size:15px;font-weight:600; color: #6e6e6e;">
								 <?php echo $tertiary_page_result_processing_list1; ?>
							</span>
						</div>
						<div class="col-2" style="margin-top:10px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;">
								<img src="../assets/images/icon-2-1.png" width="35" alt="">
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">

							<span style="font-size:15px;font-weight:600; color: #6e6e6e;">
								 <?php echo $tertiary_page_result_processing_list2; ?>
							</span>

						</div>
						<div class="col-2" style="margin-top:10px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;">
								<img src="../assets/images/icon-1.png" width="35" alt="">
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">

							<span style="font-size:15px;font-weight:600; color: #6e6e6e;">
							  <?php echo $tertiary_page_result_processing_list3; ?>
							</span>

						</div>
																
						
					</div>
				</div>
				<div class="col-md-12 col-lg-6" align="center">
					<img class="img-fluid d-none d-sm-block d-md-block d-xm-block"
						src="../assets/images/resultProcessing.png" style="width:90%; margin-top: 50px;" />
				</div>
				
			</div>
			<!-- Result Processing  -->

			
			<!------- Certificate Processing  ----->
			<div class="row p-3" style="margin-top:200px;">
				<div class="col-md-12 col-lg-6" align="center">
					<img class="img-fluid d-none d-sm-block d-md-block d-xm-block"
						src="../assets/images/certificateProcessing.png" style="width:100%;margin-top:30px;" />
				</div>
				<div class="col-md-12 col-lg-6" style="font-size:15px;color:#3A3A3A;margin-top:12px;">
					<div class="row">
						<div class="col-12">
							<span style="font-size:30px;font-weight: 600; color:#007bff;">
								 <?php echo $tertiary_page_certificate_processing; ?>
							</span>
						</div>
						<div class="col-12" style="margin-top:30px;">
							<small style="color:#6e6e6e; font-size:15px; font-weight: 600;">
								<?php echo $tertiary_page_certificate_descri; ?>
							
							</small>
						</div>
						<div class="col-2" style="margin-top:10px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;color: #FF7F5F;font-size:22px;">
								
								<i class="fa fa-hand-pointer-o" style="margin-left:5px;" aria-hidden="true"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">
							<span style="font-size:15px;font-weight:600; color: #6e6e6e;">
								<?php echo $tertiary_page_certificate_processing_list1; ?>
							</span>
						</div>
						<div class="col-2" style="margin-top:10px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;">
								<img src="../assets/images/online-class.png" width="35" alt="">
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">

							<span style="font-size:15px;font-weight:600; color: #6e6e6e;">
								 <?php echo $tertiary_page_certificate_processing_list2; ?>
							</span>

						</div>
						<div class="col-2" style="margin-top:10px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;color: #FF7F5F;font-size:22px;">
								<i class='bx bxs-package' style="padding: 5px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">

							<span style="font-size:15px;font-weight:600; color: #6e6e6e;">
								 <?php echo $tertiary_page_certificate_processing_list3; ?>
							</span>

						</div>
						<div class="col-2" style="margin-top:20px;">
							

						</div>
						<div class="col-10" style="margin-top:20px;">
						
							<a href="#" align="left" class="btn learnMoreBtn"
								style="background: linear-gradient(90deg, rgba(0,123,255,1) 35%, rgba(2,107,219,1) 100%, rgba(0,212,255,1) 100%);">
								<span style="font-weight: 600;">
									<?php echo $tertiary_page_learn_morebtn ?>
								</span>
							</a>
						</div>
						
					</div>
				</div>
			</div>
			<!------- Certificate Processing  ----->


			<!-- E-Learning  -->
			<div  class="row p-1 chires4" style="margin-top: 200px;">
				<div class="col-md-12 col-lg-6" style="font-size:15px;color:#3A3A3A;margin-top:12px;">
					<div class="row ps-5">
						<div class="col-12" style="margin-top:50px;">
							<span style="font-size:30px;font-weight:550;color:#007bff;">
								<?php echo $tertiary_page_e_learning_h1; ?>
							</span>
						</div>
						<div class="col-12" style="margin-top:30px;">
							<small style="color:#6e6e6e; font-size:15px; font-weight: 600;">
								 <?php echo $tertiary_page_e_learning_descri; ?>
							</small>
						</div>
						<div class="col-2" style="padding-top:30px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;border: solid 3px #F1F5F9;color:#ff0000;font-size:18px;">
								<i class="bx bx-play-circle" aria-hidden="true" style="padding:5px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">
							<span style="font-size:15px;font-weight:600; color: #6e6e6e;">
								<?php echo $tertiary_page_access_classrooms; ?><br>
								<small style="font-weight: 400;">
									<?php echo $tertiary_page_access_classrooms1; ?>
										<br>
									<?php echo $tertiary_page_access_classrooms2; ?>
								</small>
							</span>
						</div>
						<div class="col-2" style="padding-top:40px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;border: solid 3px #F1F5F9;color:#ff0000;font-size:18px;">
								<i class="bx bx-spreadsheet" aria-hidden="true" style="padding:5px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:30px;">

							<span style="font-size:15px;font-weight:600; color: #6e6e6e;">
									<?php echo $tertiary_page_learning_material; ?><br>
								<small style="font-weight: 400;">
									<?php echo $tertiary_page_learning_material1; ?> 
									<br> 
									<?php echo $tertiary_page_learning_material2; ?> 
									<br> 
									<?php echo $tertiary_page_learning_material3; ?>
								</small>
							</span>

						</div>
					
					</div>
				</div>
				<div class="col-md-12 col-lg-6" align="center" style="padding: 60px;">
					<img class="img-fluid d-none d-sm-block d-md-block d-xm-block"
						src="../assets/images/eLearningEduMESImg.png" style="width:100%; margin-top: 50px;" />
				</div>
				
			</div>

			<!------- E-Library  ----->
			<div class="row p-3" style="margin-top:200px;">
				<div class="col-md-12 col-lg-6" align="center">
					<img class="img-fluid d-none d-sm-block d-md-block d-xm-block"
						src="../assets/images/EduMESSeLibray.png" style="width:90%; margin-top: 50px;" />
				</div>
				<div class="col-md-12 col-lg-6" style="font-size:15px;color:#3A3A3A;padding-top:50px;">
					<div class="row">
						<div class="col-12">
							<span style="font-size:30px;font-weight: 600; color:#007bff;">
								 <?php echo $tertiary_page_e_library_h1; ?>
							</span>
						</div>
						<div class="col-12" style="margin-top:30px;">
							<small style="color:#6e6e6e; font-size:15px; font-weight: 600;">
								<?php echo $tertiary_page_e_library_descr; ?>
							</small>
						</div>
											
						<div class="col-10" style="margin-top:20px;">
							<a href="#" align="left" class="btn learnMoreBtn"
								style="background: linear-gradient(90deg, rgba(0,123,255,1) 35%, rgba(2,107,219,1) 100%, rgba(0,212,255,1) 100%);">
								<span style="font-weight: 600;">
									<?php echo $tertiary_page_learn_morebtn ?>
								</span>
							</a>

						</div>
						<div class="col-2" style="margin-top:20px;">
						
							
						</div>
						
					</div>
				</div>
			</div>
			<!------- E-Library  ----->


			<!-- Virtual Classroom  -->
			<div  class="row p-1 chires4" style="margin-top: 200px;">
				<div class="col-md-12 col-lg-6" style="font-size:15px;color:#3A3A3A;margin-top:12px;">
					<div class="row ps-5">
						<div class="col-12" style="margin-top:50px;">
							<span style="font-size:30px;font-weight:550;color:#007bff;">
								<?php echo $tertiary_page_virtual_classroom_h1; ?>
							</span>
						</div>
						<div class="col-12" style="margin-top:20px;">
							<small style="color:#6e6e6e; font-size:15px; font-weight: 600;">
								<?php echo $tertiary_page_virtual_classroom_descr1; ?> <br>
								<?php echo $tertiary_page_virtual_classroom_descr2; ?> 
							</small>
							<div align="center" style="width: 70%; margin-top: 20px; border: solid 1px #F1F5F9; "></div>
						</div>
												
						<div class="col-12" style="margin-top:20px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;border-color: #007bff; border-radius: 50%;color:#007bff;font-size:18px;">
								<i class='bx bx-check' style="padding: 5px 2px 5px 2px;"></i>
							</span>
							<span style="margin-left: 10px;font-size:15px;font-weight:600; color: #6e6e6e;">
								<?php echo $tertiary_page_learn_without_walls_1; ?>
							</span>
						</div>
						
						<div class="col-12" style="margin-top:20px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;border-color: #007bff; border-radius: 50%;color:#007bff;font-size:18px;">
								<i class='bx bx-check' style="padding: 5px 2px 5px 2px;"></i>
							</span>
							<span style="margin-left: 10px;font-size:15px;font-weight:600; color: #6e6e6e;">
								<?php echo $tertiary_page_schedule_lecture; ?>
							</span>

						</div>
						
						<div class="col-12" style="margin-top:20px;">

							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;border-color: #007bff; border-radius: 50%;color:#007bff;font-size:18px;">
								<i class='bx bx-check' style="padding: 5px 2px 5px 2px;"></i>
							</span>

							<span style="margin-left: 10px; font-size:15px;font-weight:600; color: #6e6e6e;">
								<?php echo $tertiary_page_schedule_lecture2; ?>
							</span>

						</div>
						<div class="col-2" style="margin-top:20px;">
							
						</div>
						<div class="col-10" style="margin-top:30px;">

							<a href="#" align="left" class="btn learnMoreBtn"
								style="background: linear-gradient(90deg, rgba(0,123,255,1) 35%, rgba(2,107,219,1) 100%, rgba(0,212,255,1) 100%);">
								<span style="font-weight: 600;">
									<?php echo $tertiary_page_learn_morebtn ?>
								</span>
							</a>

						</div>
					
					</div>
				</div>
				<div class="col-md-12 col-lg-6" align="center" style="padding: 50px;">
					<img class="img-fluid d-none d-sm-block d-md-block d-xm-block"
						src="../assets/images/virtualClassImage.png" style="width:100%;" />
				</div>
				
			</div>
			<!-- Virtual Classroom  -->


			
			<!------- Robust and advance database management system ----->
			<div class="row p-3" style="margin-top:200px;">
				<div class="col-md-12 col-lg-6" style="padding-top: 0px" align="center">
					<img class="img-fluid d-none d-sm-block d-md-block d-xm-block"
						src="../assets/images/Robustsystem.png" style="width:95%;" />
				</div>
				<div class="col-md-12 col-lg-6" style="font-size:15px;color:#3A3A3A;margin-top:100px;">
					<div class="row">
						<div class="col-12">
							<span style="font-size:27px;font-weight: 600; color:#007bff;">
								<?php echo $tertiary_page_robust_and_advance_h1; ?>
							</span>
						</div>
						<div class="col-12" style="margin-top:30px;">
							<small style="color:#6e6e6e; font-size:15px; font-weight: 600;">
								<?php echo $tertiary_page_robust_and_advance_descri; ?>
							</small>
							<div align="center" style="width: 90%; margin-top: 20px; border: solid 1px #F1F5F9; "></div>
						</div>
						<div class="col-2" style="margin-top:10px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;border-color: #007bff;color:#007bff;font-size:20px;">
								<i class="bx bx-list-check" aria-hidden="true" style="padding: 5px 4px 5px 4px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">
							<span style="font-size:15px;font-weight:600; color: #6e6e6e;">
									<?php echo $tertiary_page_staff_bio; ?>
							</span>
						</div>
						<div class="col-2" style="margin-top:10px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;border-color: #007bff;color:#007bff;font-size:20px;">
								<i class="bx bx-list-check" aria-hidden="true" style="padding: 5px 4px 5px 4px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">

							<span style="font-size:15px;font-weight:600; color: #6e6e6e;">
								<?php echo $tertiary_page_student_bio; ?>
							</span>

						</div>
						
						
						
					</div>
				</div>
			</div>
			<!------- 	Robust and advance database management system  ----->

			
			<!-- Computer Based Testing -->
			<div class="row chires1 p-1" style="margin-top:250px;">
				<div class="col-md-12 col-lg-6" style="font-size:15px;color:#3A3A3A;margin-top:12px;">
					<div class="row ps-5">
						<div class="col-12" style="margin-top:50px;">
							<span style="font-size:27px;font-weight:550;color:#007bff;">
								<?php echo $tertiary_page_computer_based_testing_h1; ?>
							</span>
						</div>
						<div class="col-12" style="margin-top:30px;">
							<small style="color:#6e6e6e; font-size:15px; font-weight: 600;">
								<?php echo $tertiary_page_computer_based_testing_descr; ?>
								
							</small>
						</div>
						
						<div class="col-10" style="margin-top:20px;">
							<a href="#" align="left" class="btn learnMoreBtn"
								style="background: linear-gradient(90deg, rgba(0,123,255,1) 35%, rgba(2,107,219,1) 100%, rgba(0,212,255,1) 100%);">
								<span style="font-weight: 600;">
									<?php echo $tertiary_page_learn_morebtn ?>
								</span>
							</a>

						</div>
						<div class="col-2" style="margin-top:20px;">
						
							
						</div>
						
					</div>
				</div>
				<div class="col-md-12 col-lg-6" align="center">
					<img class="img-fluid d-none d-sm-block d-md-block d-xm-block"
						src="../assets/images/eduMessCbt.png" style="width:90%; margin-top: 20px;" />
				</div>
				
			</div>
			<!--Computer Based Testing -->

			<!-- Advanced finance management portal -->
			<div class="row chires11 p-1" style="margin-top:250px;">
				
				<div class="col-md-12 col-lg-6" align="center">
					<img class="img-fluid d-none d-sm-block d-md-block d-xm-block"
						src="../assets/images/des.png" style="width:80%;" />
				</div>

				<div class="col-md-12 col-lg-6" style="font-size:15px;color:#3A3A3A;margin-top:12px;">
					<div class="row ps-5">
						<div class="col-12" style="margin-top:50px;">
							<span style="font-size:27px;font-weight:550;color:#007bff;">
								<?php echo $tertiary_page_advanced_finance_management_h1; ?>
							</span>
						</div>
						<div class="col-12" style="margin-top:30px;">
							<small style="color:#6e6e6e; font-size:15px; font-weight: 600;">
								<?php echo $tertiary_page_advanced_finance_management_descr; ?>
							</small>
						</div>
											
					</div>
				</div>
				
			</div>
			<!--Advanced finance management portal -->

			<!-- Hoilday Management -->
			<div class="row p-3" style="margin-top:250px;">
				
				<div class="col-md-12 col-lg-6" style="font-size:15px;color:#3A3A3A;margin-top:12px;">
					<div class="row">
						<div class="col-12">
							<span style="font-size:27px;font-weight: 600; color:#007bff;">
								<?php echo $tertiary_page_hostel_management_descr_h1; ?>
							</span>
						</div>
						<div class="col-12" style="margin-top:30px;">
							<small style="color:#6e6e6e; font-size:15px; font-weight: 600;">
						 		<?php echo $tertiary_page_hostel_management_descr1; ?>
								<br> 
								<?php echo $tertiary_page_hostel_management_descr2; ?>
							</small>
							<div align="center" style="width: 90%; margin-top: 20px; border: solid 1px #F1F5F9; "></div>
						</div>
						<div class="col-2" style="margin-top:10px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;border-color: #007bff;color:#007bff;font-size:20px;">
								<i class="bx bxs-badge-check" aria-hidden="true" style="padding: 5px 4px 5px 4px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">
							<span style="font-size:15px;font-weight:600; color: #6e6e6e;">
								 <?php echo $tertiary_page_hostel_management_list1; ?>
							</span>
						</div>
						<div class="col-2" style="margin-top:10px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;border-color: #007bff;color:#007bff;font-size:20px;">
								<i class="bx bxs-badge-check" aria-hidden="true" style="padding: 5px 4px 5px 4px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">

							<span style="font-size:15px;font-weight:600; color: #6e6e6e;">
								<?php echo $tertiary_page_hostel_management_list2; ?>
							</span>

						</div>
						<div class="col-2" style="margin-top:10px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;border-color: #007bff;color:#007bff;font-size:20px;">
								<i class="bx bxs-badge-check" aria-hidden="true" style="padding: 5px 4px 5px 4px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">
							<span style="font-size:15px;font-weight:600; color: #6e6e6e;">
								<?php echo $tertiary_page_hostel_management_list3; ?>
							</span>
						</div>
						<div class="col-2" style="margin-top:10px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;border-color: #007bff;color:#007bff;font-size:20px;">
								<i class="bx bxs-badge-check" aria-hidden="true" style="padding: 5px 4px 5px 4px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">

							<span style="font-size:15px;font-weight:600; color: #6e6e6e;">
								<?php echo $tertiary_page_hostel_management_list4; ?>
							</span>

						</div>
						
						<div class="col-2" style="margin-top:10px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;border-color: #007bff;color:#007bff;font-size:20px;">
								<i class="bx bxs-badge-check" aria-hidden="true" style="padding: 5px 4px 5px 4px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">

							<span style="font-size:15px;font-weight:600; color: #6e6e6e;">
								<?php echo $tertiary_page_hostel_management_list5; ?>
							</span>

						</div>
						
						
					</div>
				</div>
				<div class="col-md-12 col-lg-6" style="padding-top: 0px" align="center">
					<img class="img-fluid d-none d-sm-block d-md-block d-xm-block"
						src="../assets/images/hostelManagement.png" style="width:80%;" />
				</div>
			</div>
			<!--Hoilday Management -->

		</div>

		
		<!-- Testimonials -->
		<?php include('../includes/testimonials2.php'); ?>


	
		<!-- Download App -->
		<?php include('../includes/download-app-section-for-other-page.php'); ?>

						

		<!-- Footer -->
		<?php include('../includes/website-footer.php'); ?>
	</section>


	<!-- jquery link -->
	<script src="../assets/plugins/jquery/jquery.min.js"></script>

	<!-- Bootstrap JavaScript -->
	<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- web js -->
	<script src="../js/website_js/script.js"></script>

	<!-- Swiper JS -->
	<script src="../js/website_js/swiper-bundle.min.js"></script>

</body>

</html>