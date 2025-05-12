<?php
include('../controller/config/config.php');

@$langold = $_GET['lang'];

if ($langold == '' || $langold == NULL || $langold == 'undefined') {
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
	<link rel="shortcut icon" href="../assets/images/website_images/favicon.png" type="image/x-icon">

	<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<link href="../css/admin_css/colors/blue.css" id="theme" rel="stylesheet">

	<!-- website css -->
	<link rel="stylesheet" href="../css/website_css/website_css.css">

	<!-- font awesome cn -->
	<link rel="stylesheet" href="../assets/plugins/font_awesome/css/font-awesome.min.css">

	<!-- Swiper CSS -->
	<link rel="stylesheet" href="../css/website_css/swiper-bundle.min.css" />

	<!-- CSS -->
	<link rel="stylesheet" href="../css/website_css/testimonial_style.css" />

	<!-- Boxicons CSS -->
	<link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


	<link href="../assets/plugins/numberformat/intlTelInput.min.css"
		rel="stylesheet" />
	<script src="../assets/plugins/numberformat/intlTelInput.min.js"></script>
	<link href="../assets/plugins/notify/wnoty.css" rel="stylesheet">
	


	<style>
		/*-----Right Sidebar-----*/

		.dialogcontent {
			width: 292px;
			height: 100%;
			position: fixed;
			top: 0;
			right: 0;
			margin: 0;
			border: none;
			box-shadow: none;
			z-index: 1050;
			background-color: #292929;
			overflow-y: auto;
			overflow-x: hidden;
			outline: 0;
			transition: right 0.3s ease-out;
		}

		.modalcontent {
			height: 100%;
			border: none;
		}

		.modalbodycontent {
			padding: 0;
		}

		/* Define a custom transition for the modal */
		.modalshow.modalfade .dialogcontent {
			transform: translate3d(100%, 0, 0);
			transition: transform 0.5s ease-out;
		}

		/* Define the CSS properties for the transition */
		.modalshow.modalfade.show .dialogcontent {
			transform: translate3d(0, 0, 0);
		}

		.rightModalItems {
			color: #000000;
			list-style-type: none;
			line-height: 40px;
		}

		.rightModalItems li a {
			color: #525252;
			font-size: 13px;
			text-decoration: none;
		}

		.rightModalItems li a i {
			margin-right: 10px;
		}

		.rightModalItems .chiTag {
			font-size: 9px;
		}

		.rightModalItems .chiTagLine {
			width: 90%;
			border: #ccc solid 1px;

		}



		/* pros franchise form for application here */
		.form-group.abba_local-forms {
			margin-bottom: 40px;
		}

		.abba_local-forms {
			position: relative;
		} 

		.abba_local-forms label {
			font-size: 12px;
			color: #ababab;
			font-weight: 100;
			/* position: absolute; */
			/* top: -10px;
			left: 10px; */
			background: #fff;
			margin-bottom: 0;
			padding: 0 2px;
			z-index: 60;
			
		}

		.abba_local-forms .prosgroupof-formcontrol {
			border: 1px solid #ddd;
			box-shadow: none;
			color: #333;
			font-size: 12px;
			height: 40px;
			padding: 0.375rem 0.75rem;
			border-radius: 5px;
			
		}

		.abba_local-forms .prosgroupof-textareacontrol {
			 border: 1px solid #ddd;
			box-shadow: none;
			color: #333;
			font-size: 12px; 
			/* height: 40px; */
			/* padding: 0.375rem 0.75rem; */
			border-radius: 5px;
			 text-align: left;
			
		}


           
		 

		.abba_local-forms .form-control:focus {
			border: 1px solid #007ffb;
		}

		.abba_local-forms .form-select {
			border: 1px solid #ddd;
			box-shadow: none;
			color: #333;
			font-size: 12px;
			height: 40px;
			padding: 0.375rem 0.75rem;
			border-radius: 5px;
			
		}

		

		.abba_local-forms .form-select:focus {
			border: 1px solid #007ffb;
		}


		.pros-whyedumess-franchise{
		font-family: "Poppins", sans-serif !important;
		}
		
		
		textarea{
		    text-align: left; 
		}
		

	</style>

</head>

<body>

	<!-- NavBar -->
	<?php include('../includes/website-header.php'); ?>

	<!-- Top banner -->
	<div class="container-fluid franchise-tob-bana">
		<div class="row">
			<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">

				<!-- dotted img -->
				<img class="franchise-dotted-img img-fluid" src="../assets/images/dottedimg.png" />

				<div class="ps-5">
					<h4>
						<?php echo $franchise_page_banner_h4; ?>
					</h4>
					<a style="font-size: 40px;text-decoration: none;color:#fff;" href="#" class="typewrite fw-bolder"
						data-period="2000"
						data-type='[ "<?php echo $franchise_page_banner_animate_txt1; ?>", "<?php echo $franchise_page_banner_animate_txt2; ?>", "<?php echo $franchise_page_banner_animate_txt3; ?>" ]'>
						<span class="wrap"></span>
					</a>
				</div>
				<div class="franchise-sub text-light">
					<span>
						<?php echo $franchise_page_banner_p_txt1; ?>
						<br>
						<?php echo $franchise_page_banner_p_txt2; ?>
					</span>
				</div>
				<div class="franchise-btn" align="left">
					<a  class="btn franchisejoinbtn fw-bold" data-bs-toggle="modal" data-bs-target="#profranchiseapplication-modal"
						style="background: #fff;color:#007bff;">
						<span>
							<?php echo $franchise_page_banner_register_btn; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<svg width="19" height="16" viewBox="0 0 19 16" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path
									d="M17.7145 8.70711C18.105 8.31658 18.105 7.68342 17.7145 7.29289L11.3505 0.928932C10.96 0.538408 10.3268 0.538408 9.93628 0.928932C9.54576 1.31946 9.54576 1.95262 9.93628 2.34315L15.5931 8L9.93628 13.6569C9.54576 14.0474 9.54576 14.6805 9.93628 15.0711C10.3268 15.4616 10.96 15.4616 11.3505 15.0711L17.7145 8.70711ZM0 9H17.0074V7H0V9Z"
									fill="#007bff"></path>
							</svg>
						</span>
					</a>

					<img class="franchise-dotted-imgsec img-fluid" src="../assets/images/dottedimg.png" />
				</div>

			</div>
			<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
				<img alt="franchise-EduMESS-School-Management-System" class=""
					src="../assets/images/franchise-EduMESS-School-Management-System.png"
					style="width: 100%; margin-top: 150px;" />
			</div>
		</div>
	</div>

	<div class="container-fluid">

		<!-- Benefits -->
		<div class="row p-sm-5 m-sm-3 mt-5 franchise-benefit-content">
			<div class="col-md-12 col-lg-6 franchise-benefits-header">
				<div class="row">
					<div class="col-12">
						<small>
							<div></div>
							<?php echo $franchise_page_amazing_benefits; ?>
						</small>
						<br>
						<br>
						<h1 class="fw-bolder text-dark">
							<?php echo $franchise_page_edumess_franchise_bold; ?>
						</h1>
					</div>
					<div class="col-12">
						<img class="img-fluid d-sm-block d-md-block d-xm-block"
							src="../assets/images/amazingBenefits.png" style="width: 100%; margin-top: 50px;" />
					</div>
				</div>

			</div>
			<div class="col-md-12 col-lg-6">
				<div class="card benefit-1 mb-3 p-4 shadow" align="left">
					<span>
						<i class="fa fa-money fs-4" style="color: #007bff;"></i>
					</span>
					<span class="fs-6 mt-3" style="font-weight: 600;">
						<?php echo $franchise_page_stream_income_head; ?>
					</span>
					<span class="mt-3">
						<small class="fs-sm fw-normal">
							<?php echo $franchise_page_stream_income_descr; ?>
						</small>
					</span>
				</div>
				<div class="card benefit-2 mb-3 p-4 shadow pull-right" align="left">
					<span>
						<i class="fas fa-landmark fs-4" style="color: #007bff;"></i>
					</span>
					<span class="fs-6 mt-3" style="font-weight: 600;">
						<?php echo $franchise_page_public_sector_head; ?>
					</span>
					<span class="mt-3">
						<small class="fs-sm fw-normal">
							<?php echo $franchise_page_public_sector_descr; ?>
						</small>
					</span>
				</div>
				<div class="card benefit-3 mb-3 p-4 shadow" align="left">
					<span>
						<i class="fas fa-rocket fs-4" style="color: #007bff;"></i>
					</span>
					<span class="fs-6 mt-3" style="font-weight: 600;">
						<?php echo $franchise_page_limitless_growth_head; ?>
					</span>
					<span class="mt-3">
						<small class="fs-sm fw-normal">
							<?php echo $franchise_page_limitless_growth_descr; ?>
						</small>
					</span>
				</div>
			</div>
		</div>

		<!-- how it works -->
		<div class="row g-3 p-sm-5 me-3 ms-3 franchise-how-it-works">
			<div class="col-md-12 col-lg-6 franchise-how-it-works-div1">
				<div class="row">
					<div class="col-12">
						<span style="font-size:45px;font-weight:550;">
							<?php echo $franchise_page_how_it_work_h1; ?>
						</span>
					</div>
					<div class="col-2" style="margin-top:20px;">
						<span class="btn btn-sm btn-icon"
							style="color:#007bff;font-size:17px;border-radius: 100%;border:none;border-bottom: 3px solid #007bff;">
							<i class="fa fa-check" aria-hidden="true" style="padding:5px;"></i>
						</span>
					</div>
					<div class="col-10 fw-bold" style="margin-top:20px;">

						<span class="fs-6 mt-3" style="font-weight: 600;">
							<?php echo $franchise_page_complete_list1; ?>
						</span><br>
						<span class="mt-3">
							<small class="fs-sm fw-normal">
								<a href="#">
									<?php echo $franchise_page_register_link; ?>
								</a>
								<?php echo $franchise_page_complete_list_descr; ?>
							</small>
						</span>
					</div>
					<div class="col-2" style="margin-top:20px;">
						<span class="btn btn-sm btn-icon"
							style="cursor:pointer;color:#007bff;font-size:17px;border-radius: 100%;border:none;border-bottom: 3px solid #007bff;">
							<i class="fa fa-check" aria-hidden="true" style="padding:5px;"></i>
						</span>
					</div>
					<div class="col-10" style="margin-top:20px;">
						<span class="fs-6 mt-3" style="font-weight: 600;">
							<?php echo $franchise_page_franchise_location_list2; ?>
						</span><br>
						<span class="mt-3">
							<small class="fs-sm fw-normal">
								<?php echo $franchise_page_franchise_location_list_descr; ?>
							</small>
						</span>
					</div>
					<!--<div class="col-2" style="margin-top:20px;">-->
					<!--	<span class="btn btn-sm btn-icon"-->
					<!--		style="cursor:pointer;color:#007bff;font-size:17px;border-radius: 100%;border:none;border-bottom: 3px solid #007bff;">-->
					<!--		<i class="fa fa-check" aria-hidden="true" style="padding:5px;"></i>-->
					<!--	</span>-->
					<!--</div>-->
					<!--<div class="col-10" style="margin-top:20px;">-->
					<!--	<span class="fs-6 mt-3" style="font-weight: 600;">-->
					<!--		<?php// echo $franchise_page_monthly_payment_list3; ?>-->
					<!--	</span><br>-->
					<!--	<span class="mt-3">-->
					<!--		<small class="fs-sm fw-normal">-->
					<!--			<?php //echo $franchise_page_monthly_payment_list_descr; ?>-->
					<!--		</small>-->
					<!--	</span>-->
					<!--</div>-->
				</div>

				<div class="row" style="margin-top:50px;">
					<div class="col-12">
						<a  class="btn" data-bs-toggle="modal" data-bs-target="#profranchiseapplication-modal"
							style="border: 2px solid #007bff;color:white;border-radius: 10px;padding: 2%;font-weight: 500;font-size:14px;background: linear-gradient(90deg, rgba(0,123,255,1) 35%, rgba(2,107,219,1) 100%, rgba(0,212,255,1) 100%);">
							<span>
								<?php echo $franchise_page_register_link; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<svg width="19" height="16" viewBox="0 0 19 16" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path
										d="M17.7145 8.70711C18.105 8.31658 18.105 7.68342 17.7145 7.29289L11.3505 0.928932C10.96 0.538408 10.3268 0.538408 9.93628 0.928932C9.54576 1.31946 9.54576 1.95262 9.93628 2.34315L15.5931 8L9.93628 13.6569C9.54576 14.0474 9.54576 14.6805 9.93628 15.0711C10.3268 15.4616 10.96 15.4616 11.3505 15.0711L17.7145 8.70711ZM0 9H17.0074V7H0V9Z"
										fill="#fff"></path>
								</svg>
							</span>
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-12 col-lg-6" align="center">
				<img class="img-fluid d-none d-sm-block d-md-block d-xm-block" src="../assets/images/howitwork.png"
					style="width:450px;" />
			</div>
		</div>
	</div>

	<!-- About EduMESS -->
	<div class="container-fluid" style="background-color:#f5f9fc;">

		<div class="container p-sm-5">
			<div class="row">
				<div class="col-md-12 col-lg-12 fs-1 fw-bold" align="center">

					<?php echo $franchise_page_comprehensive_h1; ?>
				</div>
			</div>
		</div>

		<div class="container" style="width:88%;">
			<div class="row justify-content-center g-4 pb-5">
				<div class="col-lg-4 col-md-12 mt-3">
					<div class="card mt-5 mb-3 p-4 shadow-sm" style="border-radius: 15px;border: none;color:#524f4e;">
						<div class="row">
							<div class="col-12">
								<span style="font-size:35px;font-weight:550;color:#007bff;">
									<i class="fas fa-user-tie"></i>
								</span>
							</div>
							<div class="col-12">
								<span style="font-size:20px;font-weight:550;color:#007bff;">
									<?php echo $franchise_page_school_admin_h1; ?>
								</span>
							</div>
							<div class="col-12" style="margin-top:20px;">
								<small style="color:#524f4e;font-size:15px;">
									<?php echo $franchise_page_school_admin_descr_txt; ?>
								</small>
							</div>
							<div class="col-2" style="margin-top:20px;">
								<span class="btn btn-sm btn-icon"
									style="cursor:pointer;background-color:#F1F5F9;color:#007bff;font-size:10px;border-radius: 100px;">
									<i class="fa fa-check" aria-hidden="true" style="padding:1px;"></i>
								</span>
							</div>
							<div class="col-10" style="margin-top:20px;">
								<span style="font-size:13px;">
									<?php echo $franchise_page_school_admin_descr_txt_list1; ?>
								</span>
							</div>
							<div class="col-2" style="margin-top:20px;">
								<span class="btn btn-sm btn-icon"
									style="cursor:pointer;background-color:#F1F5F9;color:#007bff;font-size:10px;border-radius: 100px;">
									<i class="fa fa-check" aria-hidden="true" style="padding:1px;"></i>
								</span>
							</div>
							<div class="col-10" style="margin-top:20px;">
								<span style="font-size:13px;">
									<?php echo $franchise_page_school_admin_descr_txt_list2; ?>
								</span>
							</div>
							<div class="col-2" style="margin-top:20px;">
								<span class="btn btn-sm btn-icon"
									style="cursor:pointer;background-color:#F1F5F9;color:#007bff;font-size:10px;border-radius: 100px;">
									<i class="fa fa-check" aria-hidden="true" style="padding:1px;"></i>
								</span>
							</div>
							<div class="col-10" style="margin-top:20px;">
								<span style="font-size:13px;">

									<?php echo $franchise_page_school_admin_descr_txt_list3; ?>
								</span>
							</div>

						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-12 mt-3">
					<div class="card mt-5 mb-3 p-4 shadow-sm" align="left"
						style="border-radius: 15px;border: none;color:#524f4e;">
						<div class="row">
							<div class="col-12">
								<span style="font-size:35px;font-weight:550;color:#007bff;">
									<i class="fas fa-chalkboard-teacher"></i>
								</span>
							</div>
							<div class="col-12">
								<span style="font-size:20px;font-weight:550;color:#007bff;">
									<?php echo $franchise_page_teacher_h1; ?>
								</span>
							</div>
							<div class="col-12" style="margin-top:30px;">
								<small style="color:#524f4e;font-size:15px;">
									<?php echo $franchise_page_teacher_descr_txt; ?>

								</small>
							</div>
							<div class="col-2" style="margin-top:20px;">
								<span class="btn btn-sm btn-icon"
									style="cursor:pointer;background-color:#F1F5F9;color:#007bff;font-size:10px;border-radius: 100px;">
									<i class="fa fa-check" aria-hidden="true" style="padding:1px;"></i>
								</span>
							</div>
							<div class="col-10" style="margin-top:20px;">
								<span style="font-size:13px;">
									<?php echo $franchise_page_teacher_descr_txt_list1; ?>
								</span>
							</div>
							<div class="col-2" style="margin-top:20px;">
								<span class="btn btn-sm btn-icon"
									style="cursor:pointer;background-color:#F1F5F9;color:#007bff;font-size:10px;border-radius: 100px;">
									<i class="fa fa-check" aria-hidden="true" style="padding:1px;"></i>
								</span>
							</div>
							<div class="col-10" style="margin-top:20px;">
								<span style="font-size:13px;">
									<?php echo $franchise_page_teacher_descr_txt_list2; ?>
								</span>
							</div>
							<div class="col-2" style="margin-top:20px;">
								<span class="btn btn-sm btn-icon"
									style="cursor:pointer;background-color:#F1F5F9;color:#007bff;font-size:10px;border-radius: 100px;">
									<i class="fa fa-check" aria-hidden="true" style="padding:1px;"></i>
								</span>
							</div>
							<div class="col-10" style="margin-top:20px;">
								<span style="font-size:13px;">
									<?php echo $franchise_page_teacher_descr_txt_list3; ?>

								</span>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-12 mt-3">
					<div class="card mt-5 mb-3 p-4 shadow-sm" align="left"
						style="border-radius: 15px;border: none;color:#524f4e;">
						<div class="row">
							<div class="col-12">
								<span style="font-size:35px;font-weight:550;color:#007bff;">
									<i class="fa fa-user"></i>
								</span>
							</div>
							<div class="col-12">
								<span style="font-size:20px;font-weight:550;color:#007bff;">
									<?php echo $franchise_page_parent_h1; ?>
								</span>
							</div>
							<div class="col-12" style="margin-top:30px;">
								<small style="color:#524f4e;font-size:15px;">
									<?php echo $franchise_page_parent_descr_txt; ?>
								</small>
							</div>
							<div class="col-2" style="margin-top:20px;">
								<span class="btn btn-sm btn-icon"
									style="cursor:pointer;background-color:#F1F5F9;color:#007bff;font-size:10px;border-radius: 100px;">
									<i class="fa fa-check" aria-hidden="true" style="padding:1px;"></i>
								</span>
							</div>
							<div class="col-10" style="margin-top:20px;">
								<span style="font-size:13px;">
									<?php echo $franchise_page_parents_descr_txt_list1; ?>

								</span>
							</div>
							<div class="col-2" style="margin-top:20px;">
								<span class="btn btn-sm btn-icon"
									style="cursor:pointer;background-color:#F1F5F9;color:#007bff;font-size:10px;border-radius: 100px;">
									<i class="fa fa-check" aria-hidden="true" style="padding:1px;"></i>
								</span>
							</div>
							<div class="col-10" style="margin-top:20px;">
								<span style="font-size:13px;">
									<?php echo $franchise_page_parents_descr_txt_list2; ?>

								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<!-- Testimonials -->
	<?php include('../includes/testimonials2.php'); ?>

	<!-- SCHOOLS -->
	<div class="franchise_slider pt-4">
		<div class="chislide-track">
			<div class="chyslide">
				<img src="../assets/images/website_images/1.png" height="50" width="auto" alt="" />
			</div>
			<div class="chyslide">
				<img src="../assets/images/website_images/2.png" height="50" width="auto" alt="" />
			</div>
			<div class="chyslide">
				<img src="../assets/images/website_images/3.png" height="50" width="auto" alt="" />
			</div>
			<div class="chyslide">
				<img src="../assets/images/website_images/4.png" height="50" width="auto" alt="" />
			</div>
			<div class="chyslide">
				<img src="../assets/images/website_images/5.png" height="50" width="auto" alt="" />
			</div>
			<div class="chyslide">
				<img src="../assets/images/website_images/6.png" height="50" width="auto" alt="" />
			</div>
			<div class="chyslide">
				<img src="../assets/images/website_images/7.png" height="50" width="auto" alt="" />
			</div>
			<div class="chyslide">
				<img src="../assets/images/website_images/8.png" height="50" width="auto" alt="" />
			</div>
			<div class="chyslide">
				<img src="../assets/images/website_images/9.png" height="50" width="auto" alt="" />
			</div>
			<div class="chyslide">
				<img src="../assets/images/website_images/10.png" height="50" width="auto" alt="" />
			</div>
			<div class="chyslide">
				<img src="../assets/images/website_images/11.jpg" height="50" width="auto" alt="" />
			</div>
			<div class="chyslide">
				<img src="../assets/images/website_images/12.png" height="50" width="auto" alt="" />
			</div>
			<div class="chyslide">
				<img src="../assets/images/website_images/13.png" height="50" width="auto" alt="" />
			</div>
			<div class="chyslide">
				<img src="../assets/images/website_images/14.png" height="50" width="auto" alt="" />
			</div>
			<div class="chyslide">
				<img src="../assets/images/website_images/15.png" height="50" width="auto" alt="" />
			</div>
			<div class="chyslide">
				<img src="../assets/images/website_images/16.png" height="50" width="auto" alt="" />
			</div>
			<div class="chyslide">
				<img src="../assets/images/website_images/17.png" height="50" width="auto" alt="" />
			</div>
			<div class="chyslide">
				<img src="../assets/images/website_images/18.png" height="50" width="auto" alt="" />
			</div>
			<div class="chyslide">
				<img src="../assets/images/website_images/19.png" height="50" width="auto" alt="" />
			</div>
			<div class="chyslide">
				<img src="../assets/images/website_images/20.png" height="50" width="auto" alt="" />
			</div>
			<div class="chyslide">
				<img src="../assets/images/website_images/21.png" height="50" width="auto" alt="" />
			</div>
			<div class="chyslide">
				<img src="../assets/images/website_images/22.png" height="50" width="auto" alt="" />
			</div>
			<div class="chyslide">
				<img src="../assets/images/website_images/23.png" height="50" width="auto" alt="" />
			</div>
		</div>
	</div>


	<!-- join now -->
	<div class="container-fluid">

		<div class="row m-3 mt-5 pt-5">
			<div class="col-md-12 col-lg-7" style="font-size:15px;color:#3A3A3A;margin-top:12px;">
				<div class="row ps-sm-5">
					<div class="col-12">
						<small style="font-size:16px;font-weight:550;color:#007bff;display: inline;">
							<div
								style="display: inline-block; width: 50px; border: 2px solid #0cb800; margin-right: 10px;">
							</div>
							<?php echo $franchise_page_join_edumess_txt; ?>
						</small><br><br>
						<h3 class="fw-bolder" style="color:black;">
							<?php echo $franchise_page_join_edumess_bold_txt; ?>
						</h3>
						<div class="fw-normal pt-4 fs-sm">
							<?php echo $franchise_page_join_edumess_description; ?>
						</div><br>
						<div class="mt-3">
							<a  class="btn" data-bs-toggle="modal" data-bs-target="#profranchiseapplication-modal"
								style="border: 2px solid #007bff;color:white;border-radius: 10px;padding: 2%;font-weight: 500;font-size:14px;background: linear-gradient(90deg, rgba(0,123,255,1) 35%, rgba(2,107,219,1) 100%, rgba(0,212,255,1) 100%);">
								<span>
									<?php echo $franchise_page_register_link; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<svg width="19" height="16" viewBox="0 0 19 16" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<path
											d="M17.7145 8.70711C18.105 8.31658 18.105 7.68342 17.7145 7.29289L11.3505 0.928932C10.96 0.538408 10.3268 0.538408 9.93628 0.928932C9.54576 1.31946 9.54576 1.95262 9.93628 2.34315L15.5931 8L9.93628 13.6569C9.54576 14.0474 9.54576 14.6805 9.93628 15.0711C10.3268 15.4616 10.96 15.4616 11.3505 15.0711L17.7145 8.70711ZM0 9H17.0074V7H0V9Z"
											fill="#fff"></path>
									</svg>
								</span>
							</a>
						</div>
					</div>
				</div>

			</div>
			<div class="col-md-12 col-lg-5">
				<img class="img-fluid d-sm-block d-md-block d-xm-block pt-3" src="../assets/images/joincommunity.svg" />
			</div>
		</div>
	</div>


	<!-- Download App -->
	<?php include('../includes/download-app-section-for-other-page.php'); ?>


	


	
                                        



	<!-- === PROS FRANCHISE APPLICATION== -->
	<div class="modal fade modalshow modalfade" id="profranchiseapplication-modal" tabindex="-1"
		aria-labelledby="profranchiseapplication-modalLabel" aria-hidden="true" style="z-index:2000;">
		<div class="modal-dialog dialogcontent modal-dialog-scrollable"
			style="border-top-left-radius: 20px; width: 100%;">
			<div class="modal-content modalcontent" style="background-color: #ffffff;">


				<div class="modal-header">
					<h5 class="modal-title text-primary">FRANCHISE APPLICATION<i class=""></i>
					</h5>

					

					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">



					<div class="row">


						<div class="col-sm-12">
							<div class="form-group abba_local-forms">
								<label>First Name<span style="color:orangered;">*</span> </label>
								<input type="text" class="form-control prosfirstname-franchise prosgroupof-formcontrol"
									placeholder="First Name here" />
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group abba_local-forms">
								<label>Last Name<span style="color:orangered;">*</span> </label>
								<input type="text" class="form-control proslastname-franchise prosgroupof-formcontrol"
									placeholder="Last Name here" />
							</div>
						</div>


						<div class="col-sm-6">
							<div class="form-group abba_local-forms">
								<label>Email<span style="color:orangered;">*</span> </label>
								<input type="email" class="form-control prosemail-franchise prosgroupof-formcontrol"
									placeholder="example@example.com" />
							</div>
						</div>




						
						<div class="col-sm-6">
							<div class="form-group abba_local-forms">
								<label>Phone<span style="color:orangered;">*</span> </label>
								<input type="number" id="phonef" class="form-control prosnumber-franchise prosgroupof-formcontrol"
									placeholder="xxxx-xxx-xxxx" name="phonenum[main]" />
							</div>
						</div>



					    <div class="col-sm-6">
							<div class="form-group abba_local-forms">
								<label>Franchise Country<span style="color:orangered;">*</span> </label>
								<select class="form-control pros-franchise-country prosgroupof-formcontrol">



											<?php
																$pros_get_country = mysqli_query($link,"SELECT * FROM `franchiseregion` INNER JOIN `countries` ON `franchiseregion`.`CountryID` =  `countries`.`countryID` 
																GROUP BY `franchiseregion`.`CountryID` ORDER BY `countries`.`CountryName` ASC");
																$pros_get_country_cnt_row = mysqli_fetch_assoc($pros_get_country);
																$pros_get_country_cnt = mysqli_num_rows($pros_get_country);

																if($pros_get_country_cnt > 0)
																{
																	echo '<option value="NULL" disabled>Select Country</option>';

																	      do{



																			$CountryName = $pros_get_country_cnt_row['CountryName'];
																			$CountryID = $pros_get_country_cnt_row['CountryID'];

																			if($CountryID == '161')
																			{
																				$proscuntryselected = 'selected';

																			}else{
																						$proscuntryselected = '';
																			}


																			   echo '<option '.$proscuntryselected.' value="'.$CountryID.'">'.$CountryName.'</option>';

																		  }while($pros_get_country_cnt_row = mysqli_fetch_assoc($pros_get_country));

																}else
																{
																	  echo '<option value="NULL">No Country found.</option>';
																}
																


											?>
									
								</select>
							</div>
						</div>


						<div class="col-sm-6">
							<div class="form-group abba_local-forms">
								<label>Franchise Region<span style="color:orangered;">*</span> </label>
								<select class="form-control pros-franchiseregion prosgroupof-formcontrol">
									
								</select>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group abba_local-forms">
								<label>Franchise Location<span style="color:orangered;">*</span> </label>
								<select class="form-control pros-load-locationhere prosgroupof-formcontrol"></select>
									
								
							</div>
						</div>



						<div class="col-sm-12">
							  <h6 class="ms-2 mb-3 pros-whyedumess-franchise"> Tell us about your self.</h6>
							<div class="form-group abba_local-forms">
								<label>About you.<span style="color:orangered;">*</span> </label>
								<textarea class="form-control prosgroupof-textareacontrol prostelabout-yourself-input"  rows="3"></textarea>

								
							</div>
						</div>

						

						<div class="col-sm-12">
							  <h6 class="ms-2 mb-3 pros-whyedumess-franchise">How do you intend to Sale EduMESS?</h6>
							<div class="form-group abba_local-forms">
								<label>Why us<span style="color:orangered;">*</span> </label>
								<textarea class="form-control prosgroupof-textareacontrol pros-how-youwant-market-edumess"   rows="3"></textarea>

								
							</div>
						</div>

					</div>




				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm bg-light text-primary mt-2 rounded-3 btn-outline-primary"
						data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"> Close</i></button>
					<button type="button"
						class="btn btn-sm text-white mt-2 rounded-3 bg-primary pros-registerfranchise-btn">
						<i class="fas fa"> Register Now</i> </button>
				</div>
			</div>
		</div>
	</div>
	<!-- === PROS FRANCHISE APPLICATION== -->



	<!-- Footer -->
	<?php include('../includes/website-footer.php'); ?>

	<!-- jquery link -->
	<script src="../assets/plugins/jquery/jquery.min.js"></script>

	<!-- Bootstrap JavaScript -->
	<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- web js -->
	<script src="../js/website_js/script.js"></script>

	<!-- Swiper JS -->
	<script src="../js/website_js/swiper-bundle.min.js"></script>

	<!-- franchise application js here -->
	<?php include('../controller/js/website/pros-franchise-application.php'); ?>

	
	<script src="../assets/plugins/notify/wnoty.js"></script>
	

</body>

</html>