<?php
include('controller/config/config.php');

@$langold = $_GET['lang'];

if ($langold == '' || $langold == NULL || $langold == 'undefined' || $langold == 'null') {
	$lang = 'english';
} else {
	$lang = $_GET['lang'];
}

include('lang/' . $lang . '.php');

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
	<link rel="shortcut icon" href="assets/images/website_images/favicon.png"
		type="image/x-icon">

	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- website css -->
	<link rel="stylesheet" href="css/website_css/website_css.css">

	<!-- font awesome cn -->
	<link rel="stylesheet" href="assets/plugins/font_awesome/css/font-awesome.min.css">

	<!-- Swiper CSS -->
	<link rel="stylesheet" href="css/website_css/swiper-bundle.min.css" />

	<!-- CSS -->
	<link rel="stylesheet" href="css/website_css/testimonial_style.css" />

	<!-- Boxicons CSS -->
	<link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

   
</head>

<body >
    
    <section>
        <!---====== Welcome Modal========--->
        <!-- Modal -->
            <div class="modal fade" id="onLoadModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="onLoadModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="onLoadModalLabel">Welcome</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            This modal appears automatically when the page loads.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
         <!-- Modal -->
            
    </section>
    

	<div class="wrapper">
      	<head class="header_chi" style="display: flex;">
        	<h4 style="color: #4070f4; font-weight: 500;"><i class="bx bx-cookie" style="font-size: 25px;"></i> Cookies Consent</h4>
    	</head>

      <div class="data_chi">
        <p>This website use cookies to help you have a superior and more relevant browsing experience on the website. <a href="#"> Read more...</a></p>
      </div>

      <div class="chi_buttons">
        <button class="button" id="acceptBtn">Accept</button>
        <button class="button" id="declineBtn">Decline</button>
      </div>
    </div>


	<section>

		<!-- NavBar -->
		<?php include('includes/website-header.php'); ?>


		<!-- Top banner -->
		<div class="container" style="width:90%;">
			<div class="row" align="left">
				<div class="col-sm-12 col-md-7 col-lg-7 col-xl-7 home">

					<!-- dotted img -->
					<img class="dotted-img img-fluid" src="assets/images/website_images/dottedimg.png" />

					<div class="home-text">
						<h1>
							<?php echo $website_subtitle1; ?>
						</h1>
						<p class="animate-text">
							<span style="color:#007bff;">
								<?php echo $website_subtitle2; ?>
							</span>
							<span style="color:#007bff;">
								<?php echo $website_subtitle3; ?>
							</span>
							<span style="color:#007bff;">
								<?php echo $website_subtitle2; ?>
							</span>
							<span style="color:#007bff;">
								<?php echo $website_subtitle3; ?>
							</span>
							<span style="color:#007bff;">
								<?php echo $website_subtitle2; ?>
							</span>
						</p>
					</div>
					<div class="aftwriteup">
						<span>
							<?php echo $website_minisub; ?> <br>
							<?php echo $website_minisub2; ?>.
						</span>
					</div>
					<div class="btndiv" align="left">
						<a href="<?php echo $defaultUrl.'school-management-system';?>" class="btn appbtn">
						    
						    <i class='bx bx-info-circle' style="font-size: 18px; color: #007bff;"></i>
					
						
							<span>
								<?php echo $website_app; ?>
							</span>
								<!---<span>
							<svg width="20" height="20" viewBox="0 0 30 30" fill="none" xmlns="">
									<path
										d="M4.81562 2.52686C4.5575 2.59373 4.375 2.81686 4.375 3.20061C4.375 4.32686 4.375 14.9475 4.375 14.9475C4.375 14.9475 4.375 26.425 4.375 26.9319C4.375 27.2106 4.49812 27.3975 4.6875 27.4669L17.3006 14.9269L4.81562 2.52686Z"
										fill="#4DB6AC"></path>
									<path
										d="M20.7739 11.475L15.582 8.4775C15.582 8.4775 6.05391 2.97562 5.49391 2.6525C5.25141 2.5125 5.01266 2.47562 4.81641 2.52687L17.302 14.9269L20.7739 11.475Z"
										fill="#DCE775"></path>
									<path
										d="M5.26062 27.3762C5.59312 27.1837 14.8131 21.8606 20.8013 18.4031L17.3006 14.9269L4.6875 27.4669C4.8425 27.5237 5.04125 27.5025 5.26062 27.3762Z"
										fill="#D32F2F"></path>
									<path
										d="M25.8739 14.419C25.3764 14.1509 20.8114 11.4965 20.8114 11.4965L20.7733 11.4746L17.3008 14.9265L20.8014 18.4027C23.5714 16.8034 25.652 15.6027 25.8383 15.4946C26.4283 15.1546 26.3714 14.6871 25.8739 14.419Z"
										fill="#FBC02D"></path>
								</svg>
							</span> |
							<span>
								<svg width="20" height="20" viewBox="0 0 30 30" fill="none" xmlns="">
									<path
										d="M21.8945 15.6943C21.8828 13.6963 22.7881 12.1904 24.6162 11.0801C23.5937 9.61524 22.0469 8.80957 20.0078 8.6543C18.0771 8.50195 15.9648 9.7793 15.1914 9.7793C14.374 9.7793 12.5049 8.70703 11.0342 8.70703C7.99902 8.75391 4.77344 11.127 4.77344 15.9551C4.77344 17.3818 5.03418 18.8555 5.55566 20.373C6.25293 22.3711 8.7666 27.2666 11.3887 27.1875C12.7598 27.1553 13.7295 26.2148 15.5137 26.2148C17.2451 26.2148 18.1416 27.1875 19.6709 27.1875C22.3164 27.1494 24.5898 22.6992 25.252 20.6953C21.7041 19.0225 21.8945 15.7969 21.8945 15.6943V15.6943ZM18.8154 6.75879C20.3008 4.99512 20.166 3.38965 20.1221 2.8125C18.8096 2.88867 17.292 3.70605 16.4277 4.71094C15.4756 5.78906 14.916 7.12207 15.0361 8.625C16.4541 8.7334 17.749 8.00391 18.8154 6.75879V6.75879Z"
										fill="#1E293B"></path>
								</svg>
							</span>-->
						</a>
						&nbsp;&nbsp;
						<a href="<?php echo $defaultUrl; ?>signup/" class="btn startbtn"
							style="background: linear-gradient(90deg, rgba(0,123,255,1) 35%, rgba(2,107,219,1) 100%, rgba(0,212,255,1) 100%);">
							<span>
								<?php echo $website_start; ?> &nbsp;&nbsp;&nbsp;<svg width="19" height="16"
									viewBox="0 0 19 16" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path
										d="M17.7145 8.70711C18.105 8.31658 18.105 7.68342 17.7145 7.29289L11.3505 0.928932C10.96 0.538408 10.3268 0.538408 9.93628 0.928932C9.54576 1.31946 9.54576 1.95262 9.93628 2.34315L15.5931 8L9.93628 13.6569C9.54576 14.0474 9.54576 14.6805 9.93628 15.0711C10.3268 15.4616 10.96 15.4616 11.3505 15.0711L17.7145 8.70711ZM0 9H17.0074V7H0V9Z"
										fill="white"></path>
								</svg>
							</span>
						</a>
					</div>

					<img class="dotted-imgsec img-fluid" src="assets/images/website_images/dottedimg.png" />
				</div>
				<div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 containerimg" align="center">
					<img class="img-fluid" src="assets/images/IndexheroBanner.png" />
				</div>
			</div>
		</div>
	
	
		<!-- Trusted By -->
		<div class="trustedby">

			<div class="row" style="width:100%;">
				<div class="col-1">
					<img class="img-fluid d-none d-sm-block d-md-block d-xm-block"
						src="assets/images/website_images/featureimg2.png"
						style="width:80px;margin-top:-3px;float:left;" />
				</div>
				<div class="col-11">
					<div class="row">
						<div class="col-4">
							<div class="featuretxt">
								<span>
									<?php echo $website_feature; ?>
								</span>
							</div>
						</div>
						<div class="col-2" align="left">
						     <a href="https://punchng.com/edutech-launches-learning-software/">
						         <img class="img-fluid"
								src="assets/images/website_images/punchnews.png"
								style="width:120px;" />
						     </a>
						</div>
						<div class="col-2">
						    <a href="https://fi.co/insight/applications-open-to-founder-institute-lagos-virtual-spring-2022">
						         <img class="img-fluid" src="assets/images/website_images/FI1-1.png"
								style="width:110px;margin-top:15px;" />
						     </a>
						</div>
						<div class="col-2">
						     <a href="https://thesun.ng/edumess-sterling-bank-partner-to-empower-school-owners/">
						         <img class="img-fluid"
								src="assets/images/website_images/the-sun.png"
								style="width:120px; margin-top:25px;" />
						     </a>
						</div>
						<div class="col-2">
						    <a href="https://www.vanguardngr.com/2024/04/we-are-excited-to-empower-school-owners-chike-okoli/">
						         <img class="img-fluid" src="assets/images/website_images/Vanguard-logo.png"
								style="width:120px;margin-top:20px;" />
						     </a>
						</div>
					</div>
				</div>
			</div>

		</div>

		<!-- Features -->
		<div class="container">
			<div class="row" style="margin-top:60px;">
				<div class="col-12 fs-1 fw-bold" align="center" style="color:#007bff;">
					<?php echo $website_whouse; ?>
				</div>
			</div>
		</div>

		<div class="container" style="width:85%;">

			<!-- K-12 -->
			<div class="row g-5" style="margin-top:60px;">
				<div class="col-md-12 col-lg-6">
					<img class=" d-none d-sm-block d-md-block d-xm-block" src="assets/images/k12feature.png" style="height: 60%; margin-left: -20px;" />
				</div>
				<div class="col-md-12 col-lg-6" style="font-size:15px;color:#3A3A3A;margin-top:12px;">
					<div class="row">
						<div class="col-12">
							<span style="font-size:27px;font-weight:550;color:#007bff;">
								<?php echo $website_k_12; ?>
							</span><br>
							<small style="color:#524f4e;font-size:12px;">
								<?php echo $website_feature_K12_sub; ?>
							</small>
						</div>
						<div class="col-12" style="margin-top:30px;">
							<small style="color:#524f4e;font-size:15px;">
								<?php echo $website_feature_K12_subtitle; ?>
							</small>
						</div>
						<div class="col-2" style="margin-top:30px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff;font-size:30px;">
								<i class="fa fa-tasks" aria-hidden="true" style="padding:5px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:30px;">
							<span style="color:#007bff;font-size:18px;font-weight:520;">
								<?php echo $website_feature_K12_1; ?>
							</span><br>
							<small style="color:#524f4e;font-size:13px;">
								<?php echo $website_feature_K12_1des; ?>
							</small>
						</div>
						<div class="col-2" style="margin-top:30px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff;font-size:30px;">
								<i class="fa fa-envelope" aria-hidden="true" style="padding:5px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:30px;">

							<span style="color:#007bff;font-size:18px;font-weight:520;">
								<?php echo $website_feature_K12_2; ?>
							</span><br>
							<small style="color:#524f4e;font-size:13px;">
								<?php echo $website_feature_K12_2des; ?>
							</small>

						</div>
						<div class="col-2" style="margin-top:30px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff;font-size:30px;">
								<i class="fa fa-book" aria-hidden="true" style="padding:5px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:30px;">

							<span style="color:#007bff;font-size:18px;font-weight:520;">
								<?php echo $website_feature_K12_3; ?>
							</span><br>
							<small style="color:#524f4e;font-size:13px;">
								<?php echo $website_feature_K12_3des; ?>
							</small>

						</div>
						<div class="col-2" style="margin-top:30px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff;font-size:30px;">
								<i class="fa fa-bar-chart-o" aria-hidden="true" style="padding:5px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:30px;">

							<span style="color:#007bff;font-size:18px;font-weight:520;">
								<?php echo $website_feature_K12_4; ?>
							</span><br>
							<small style="color:#524f4e;font-size:13px;">
								<?php echo $website_feature_K12_4des; ?>
							</small>

						</div>
					</div>
					<div class="row" style="margin-top:50px;">
						<div class="col-12">
						    <a href="<?php echo $defaultUrl.'school-management-system';?>" class="btn"
    								style="border: 1px solid #007bff;color:white;border-radius: 8px;padding: 10px 25px 10px 25px;font-weight: 500;font-size:16px;background: linear-gradient(90deg, rgba(0,123,255,1) 35%, rgba(2,107,219,1) 100%, rgba(0,212,255,1) 100%);">
    								<span>
    									Learn More
    								</span>
    							</a>
						
						</div>
					</div>
				</div>
			</div>

			<div class="row" style="margin-bottom: -80px;">
				<div class="col-6" align="left">
					<img class="img-fluid" style="width: 70px;margin-top:0%;"
						src="assets/images/dottedimg.png" />
				</div>
				<div class="col-6" align="right">
					<img class="img-fluid" style="width: 70px;margin-buttom:0%;"
						src="assets/images/dottedimg.png" />
				</div>
			</div>

			<!-- Tertiary -->
			<div class="row" style="margin-top:50px;">
				<div class="col-md-12 col-lg-6" style="font-size:15px;color:#3A3A3A;margin-top:12px;">
					<div class="row">
						<div class="col-12">
							<small style="font-size:16px;font-weight:550;color:#007bff;">
								<?php echo $website_tertiary; ?>
							</small><br><br>
							<h2 style="color:#524f4e;">
								<?php echo $website_feature_tertiary_sub; ?>
							</h2>
						</div>
						<div class="col-12" style="margin-top:30px;">
							<small style="color:#524f4e;font-size:15px;">
								<?php echo $website_feature_tertiary_des; ?>
							</small>
						</div>
					</div>

					<div class="row" style="margin-top:30px;">

						<div class="col-12">
							<div class="image-container ms-5 ps-5 d-flex">
								<img src="assets/images/users/fimg.png" alt="Image 3"
									style="width:35px;border-radius:50px;border:2px solid white;">
								<img src="assets/images/users/1.jpg" alt="Image 1"
									style="width:35px;border-radius:50px;border:2px solid white;">
								<img src="assets/images/users/2.jpg" alt="Image 2"
									style="width:35px;border-radius:50px;border:2px solid white;">
								<img src="assets/images/users/3.jpg" alt="Image 3"
									style="width:35px;border-radius:50px;border:2px solid white;">
								<img src="assets/images/users/1.jpg" alt="Image 1"
									style="width:35px;border-radius:50px;border:2px solid white;">
								<img src="assets/images/users/2.jpg" alt="Image 2"
									style="width:35px;border-radius:50px;border:2px solid white;">
							</div>
						</div>
						<div class="col-12">
							<small>
								<?php echo $website_feature_tertiary_LPr; ?>
							</small>
						</div>
					</div>

					<div class="row" style="margin-top:50px;">
						<div class="col-12">
							<a href="#" class="btn"
								style="border: 2px solid #007bff;color:white;border-radius: 10px;padding: 2%;font-weight: 500;font-size:14px;background: linear-gradient(90deg, rgba(0,123,255,1) 35%, rgba(2,107,219,1) 100%, rgba(0,212,255,1) 100%);">
								<span>
									<?php echo $website_feature_tertiary_call; ?>
								</span>
							</a>
							&nbsp;&nbsp;
							<a href="<?php echo $defaultUrl; ?>signup/" class="btn" style="font-weight:500;color:#007bff;">
								<span>
									<?php echo $website_feature_tertiary_LM; ?> &nbsp;&nbsp;&nbsp;
									<i class="fa fa-long-arrow-right"></i>
									</svg>
								</span>
							</a>
						</div>
					</div>

				</div>
				<div class="col-md-12 col-lg-6" align="center">
					<img class="img-fluid d-none d-sm-block d-md-block d-xm-block"
						src="assets/images/tertiaryFeature.png"
						style="width:500px; margin-30px;" />
				</div>
			</div>


			<!-- Case Study -->
			<!--<div class="row casestudy" style="margin-top:10%;">-->
			<!--	<div class="d-flex col-lg-5 col-md-12">-->
			<!--		<h1 style="color: #3a3a3a;">-->
			<!--			<?php echo $website_our_case_study1; ?><br> <?php echo $website_our_case_study2; ?>-->
			<!--		</h1>-->
			<!--		<div class="mt-4" style="padding-left: 160px;"><i class="fa fa-long-arrow-right"-->
			<!--				style="font-size:40px;color: #007bff;"></i></div>-->
			<!--	</div>-->

			<!--	<div class="col-lg-7 col-md-12 mt-4 font-serif"-->
			<!--		style="font-size: 15px;color: #3a3a3a;padding-left:20px;">-->
			<!--		<?php echo $website_our_case_study_Description; ?>-->
			<!--	</div>-->
			<!--</div>-->



			<!--<div class="row g-5 casecards">-->
			<!--	<div class="col-lg-4 col-md-12">-->
			<!--		<div class="card">-->
			<!--			<div class="zoom-container">-->
			<!--				<img src="assets/images/website_images/casestudy1.png"-->
			<!--					class="card-img-top" alt="...">-->
			<!--			</div>-->
			<!--			<div class="card-body mt-2 pb-2">-->
			<!--				<h6 class="card-title" style="color:#007bff;"><?php echo $website_our_case_study_card_title1; ?>-->
			<!--				</h6>-->
			<!--				<small class="card-title" style="color: #979998;font-size: 13px;"><?php echo $website_our_case_study_card_dateNum1; ?>  <?php echo $website_our_case_study_card_caldate1; ?><svg-->
			<!--						class="mb-2 mx-1" width="4" height="5" viewBox="0 0 4 5" fill="none"-->
			<!--						xmlns="http://www.w3.org/2000/svg">-->
			<!--						<ellipse cx="2.09113" cy="2.26524" rx="1.75324" ry="1.79454" fill="#92929D">-->
			<!--						</ellipse>-->
			<!--					</svg><?php echo $website_our_case_study_card_news; ?></small>-->
			<!--				<p class="card-text mt-3" style="font-size: 12px;color: #979998;">-->
			<!--					<?php echo $website_our_case_study_card_Description1; ?>-->
			<!--				</p>-->
			<!--				<a href="#" class="btn btn-primary btn-sm"-->
			<!--					style="background: linear-gradient(90deg, rgba(0,123,255,1) 35%, rgba(2,107,219,1) 100%, rgba(0,212,255,1) 100%);">-->
			<!--					<small><?php echo $website_our_case_study_card_button_Txt; ?></small>-->
			<!--				</a>-->
			<!--			</div>-->
			<!--		</div>-->
			<!--	</div>-->

			<!--	<div class="col-lg-4 col-md-12">-->
			<!--		<div class="card">-->
			<!--			<div class="zoom-container">-->
			<!--				<img src="assets/images/website_images/casestudy1.png"-->
			<!--					class="card-img-top" alt="...">-->
			<!--			</div>-->
			<!--			<div class="card-body mt-2 pb-2">-->
			<!--				<h6 class="card-title" style="color:#007bff;"><?php echo $website_our_case_study_card_title2; ?>-->
			<!--				</h6>-->
			<!--				<small class="card-title" style="color: #979998;font-size: 13px;"><?php echo $website_our_case_study_card_dateNum2; ?>  <?php echo $website_our_case_study_card_caldate2; ?> <svg-->
			<!--						class="mb-2 mx-1" width="4" height="5" viewBox="0 0 4 5" fill="none"-->
			<!--						xmlns="http://www.w3.org/2000/svg">-->
			<!--						<ellipse cx="2.09113" cy="2.26524" rx="1.75324" ry="1.79454" fill="#92929D">-->
			<!--						</ellipse>-->
			<!--					</svg><?php echo $website_our_case_study_card_news; ?></small>-->
			<!--				<p class="card-text mt-3" style="font-size: 12px;color: #979998;">-->
			<!--					<?php echo $website_our_case_study_card_Description2; ?>-->
			<!--				</p>-->
			<!--				<a href="#" class="btn btn-primary btn-sm"-->
			<!--					style="background: linear-gradient(90deg, rgba(0,123,255,1) 35%, rgba(2,107,219,1) 100%, rgba(0,212,255,1) 100%);">-->
			<!--					<small><?php echo $website_our_case_study_card_button_Txt; ?></small>-->
			<!--				</a>-->
			<!--			</div>-->
			<!--		</div>-->
			<!--	</div>-->

			<!--	<div class="col-lg-4 col-md-12">-->
			<!--		<div class="card">-->
			<!--			<div class="zoom-container">-->
			<!--				<img src="assets/images/website_images/casestudy1.png"-->
			<!--					class="card-img-top" alt="...">-->
			<!--			</div>-->
			<!--			<div class="card-body mt-2 pb-2">-->
			<!--				<h6 class="card-title" style="color:#007bff;"><?php echo $website_our_case_study_card_title3; ?>-->
			<!--				</h6>-->
			<!--				<small class="card-title" style="color: #979998;font-size: 13px;"><?php echo $website_our_case_study_card_dateNum3; ?>  <?php echo $website_our_case_study_card_caldate3; ?><svg-->
			<!--						class="mb-2 mx-1" width="4" height="5" viewBox="0 0 4 5" fill="none"-->
			<!--						xmlns="http://www.w3.org/2000/svg">-->
			<!--						<ellipse cx="2.09113" cy="2.26524" rx="1.75324" ry="1.79454" fill="#92929D">-->
			<!--						</ellipse>-->
			<!--					</svg><?php echo $website_our_case_study_card_news; ?></small>-->
			<!--				<p class="card-text mt-3" style="font-size: 12px;color: #979998;">-->
			<!--					<?php echo $website_our_case_study_card_Description3; ?>-->
			<!--				</p>-->
			<!--				<a href="#" class="btn btn-primary btn-sm"-->
			<!--					style="background: linear-gradient(90deg, rgba(0,123,255,1) 35%, rgba(2,107,219,1) 100%, rgba(0,212,255,1) 100%);">-->
			<!--					<small><?php echo $website_our_case_study_card_button_Txt; ?></small>-->
			<!--				</a>-->
			<!--			</div>-->
			<!--		</div>-->
			<!--	</div>-->
			<!--</div>-->

			<!-- Statistics -->
			<?php include('includes/statistics.php'); ?>
		</div>

		<!-- Franchise -->
		<div class="container-fluid" style="width:92%;margin-top: 13%;">
			<div class="row"
				style="margin-top:100px;background: linear-gradient(90deg, rgba(0,123,255,1) 35%, rgba(2,107,219,1) 100%, rgba(0,212,255,1) 100%);border-radius:15px;">
				<div class="col-md-12 col-lg-6" style="font-size:15px;color:#3A3A3A;margin-top:12px;">
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="row">
								<div class="col-12 ps-sm-5 pt-2">
									<small style="font-size:16px;font-weight:550;color:#fff;">
										<?php echo $website_franchise_head_txt; ?>
									</small>
								</div>
							</div>

							<div class="row franchise">
								<div class="col-12 ps-sm-5 pt-5 franchise-text">
									<h5 style="color:#eff5fd;">
										 <?php echo $website_franchise_h5; ?>
									</h5>
									<p class="animate-text-second">
										<span style="color:#fff;">
											 <?php echo $website_franchise_animate1; ?>
										</span>
										<span style="color:#fff;">
											<?php echo $website_franchise_animate2; ?>
										</span>
									</p>
								</div>
							</div>

							<div class="row ps-sm-5 pt-3">

								<div class="col-md-12 col-lg-12">
									<div class="image-container ms-5 ps-5 d-flex">
										<img src="assets/images/users/fimg.png" alt="Image 3"
											style="width:35px;border-radius:50px;border:2px solid white;">
										<img src="assets/images/users/1.jpg" alt="Image 1"
											style="width:35px;border-radius:50px;border:2px solid white;">
										<img src="assets/images/users/2.jpg" alt="Image 2"
											style="width:35px;border-radius:50px;border:2px solid white;">
										<img src="assets/images/users/3.jpg" alt="Image 3"
											style="width:35px;border-radius:50px;border:2px solid white;">
										<img src="assets/images/users/1.jpg" alt="Image 1"
											style="width:35px;border-radius:50px;border:2px solid white;">
										<img src="assets/images/users/2.jpg" alt="Image 2"
											style="width:35px;border-radius:50px;border:2px solid white;">
									</div>
								</div>
								<div class="col-md-12 col-lg-12 text-light">
									<small>
										<?php echo $website_feature_tertiary_LPr; ?>
									</small>
								</div>

							</div>
							<div class="row ps-5 pt-4 pb-4">
								<div class="col-md-12 col-lg-12">
									<a href="<?php echo $defaultUrl; ?>signup/" class="btn"
										style="border: 2px solid #007bff;color:white;border-radius: 10px;padding: 2%;font-weight: 500;font-size:14px;background: #fff;color:#007bff;">
										<span>
											 <?php echo $website_franchise_register_now; ?>
										</span>
									</a>
									&nbsp;&nbsp;
									<a href="<?php echo $defaultUrl.'franchise';?>" class="btn"
										style="font-weight:500;color:#fff;border:1px solid #fff;font-size:14px;padding: 2%;border-radius: 10px">
										<span>
											<?php echo $website_franchise_learn_more; ?> &nbsp;&nbsp;&nbsp;<i class='bx bx-right-arrow-alt'></i>
											</svg>
										</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-lg-6" align="center">
					<img class="img-fluid d-none d-sm-block d-md-block d-xm-block p-0"
						src="assets/images/website_images/franchise.png"
						style="width: 100%;" />
				</div>
			</div>

		</div>

		
			<!-- Testimonials -->
		<?php include('includes/testimonials2.php'); ?>



		<!-- our clients -->
		<div align="center">
			<p><?php echo $website_clients_header_txt; ?></p>
		</div>

		<!-- SCHOOLS -->
		<div class="franchise_slider pt-4">
			<div class="chislide-track">
				<div class="chyslide">
					<img src="assets/images/website_images/1.png" height="50" width="auto"
						alt="" />
				</div>
				<div class="chyslide">
					<img src="assets/images/website_images/2.png" height="50" width="auto"
						alt="" />
				</div>
				<div class="chyslide">
					<img src="assets/images/website_images/3.png" height="50" width="auto"
						alt="" />
				</div>
				<div class="chyslide">
					<img src="assets/images/website_images/4.png" height="50" width="auto"
						alt="" />
				</div>
				<div class="chyslide">
					<img src="assets/images/website_images/5.png" height="50" width="auto"
						alt="" />
				</div>
				<div class="chyslide">
					<img src="assets/images/website_images/6.png" height="50" width="auto"
						alt="" />
				</div>
				<div class="chyslide">
					<img src="assets/images/website_images/7.png" height="50" width="auto"
						alt="" />
				</div>
				<div class="chyslide">
					<img src="assets/images/website_images/8.png" height="50" width="auto"
						alt="" />
				</div>
				<div class="chyslide">
					<img src="assets/images/website_images/9.png" height="50" width="auto"
						alt="" />
				</div>
				<div class="chyslide">
					<img src="assets/images/website_images/10.png" height="50" width="auto"
						alt="" />
				</div>
				<div class="chyslide">
					<img src="assets/images/website_images/11.jpg" height="50" width="auto"
						alt="" />
				</div>
				<div class="chyslide">
					<img src="assets/images/website_images/12.png" height="50" width="auto"
						alt="" />
				</div>
				<div class="chyslide">
					<img src="assets/images/website_images/13.png" height="50" width="auto"
						alt="" />
				</div>
				<div class="chyslide">
					<img src="assets/images/website_images/14.png" height="50" width="auto"
						alt="" />
				</div>
				<div class="chyslide">
					<img src="assets/images/website_images/15.png" height="50" width="auto"
						alt="" />
				</div>
				<div class="chyslide">
					<img src="assets/images/website_images/16.png" height="50" width="auto"
						alt="" />
				</div>
				<div class="chyslide">
					<img src="assets/images/website_images/17.png" height="50" width="auto"
						alt="" />
				</div>
				<div class="chyslide">
					<img src="assets/images/website_images/18.png" height="50" width="auto"
						alt="" />
				</div>
				<div class="chyslide">
					<img src="assets/images/website_images/19.png" height="50" width="auto"
						alt="" />
				</div>
				<div class="chyslide">
					<img src="assets/images/website_images/20.png" height="50" width="auto"
						alt="" />
				</div>
				<div class="chyslide">
					<img src="assets/images/website_images/21.png" height="50" width="auto"
						alt="" />
				</div>
				<div class="chyslide">
					<img src="assets/images/website_images/22.png" height="50" width="auto"
						alt="" />
				</div>
				<div class="chyslide">
					<img src="assets/images/website_images/23.png" height="50" width="auto"
						alt="" />
				</div>
			</div>
		</div>

		<!-- Download App -->
		<?php include('includes/download-app-section.php'); ?>


       

		<!-- Footer -->
		<?php include('includes/website-footer.php'); ?>
		
	
		
	</section>
	
	<script>
        document.addEventListener('DOMContentLoaded', function () {
            // Select the modal element
            var onLoadModal = document.getElementById('onLoadModal');
            
            // Create a Bootstrap modal instance
            var myModal = new bootstrap.Modal(onLoadModal);
            
            // Show the modal
            myModal.show();
        });
    </script>
	
	<!-- jquery link -->
	<script src="assets/plugins/jquery/jquery.min.js"></script>

	<!-- Bootstrap JavaScript -->
	<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- web js -->
	<script src="js/website_js/script.js"></script>

	<!-- Swiper JS -->
	<script src="js/website_js/swiper-bundle.min.js"></script>

</body>

</html>