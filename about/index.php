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

</head>

<body >
	<section style="background-color: #fff;">

		<!-- NavBar -->
		<?php include('../includes/website-header.php'); ?>
		

		<!-------Top banner ------------->
		<!--------------------------->
		<div style="height: 80%;">
			<div class="chiAbtUsImg"></div>
		</div>
	
		<div class="container">
			<div class="chiabut_beginning">
				<div class="row">
					<div class="col-md-6">
						<span class="chiwe_R"><?php echo $about_us_we_are_txt; ?></span>
						<h1 class="chiheading">E<span style="font-size: 80px; font-weight: 700;">d</span>uMESS</h1>
					</div>
					<div class="col-md-6">
						<p class="chiabut_beginning_p">
							<?php echo $about_us_beginning_p; ?>
						</p>
					</div>
				</div>
			</div>
		</div>

		<div class="container pt-5">
			<div align="center">
				<h2 style="font-weight: 600; color:#535353;"><?php echo $about_us_solution_h1_txt; ?></h2>
				<p style="font-size: 15px; font-weight: 400; color:#686868;">
					<?php echo $about_us_solution_p_txt1; ?><br>
					<?php echo $about_us_solution_p_txt2; ?><br> 
					<?php echo $about_us_solution_p_txt3; ?>
				</p>
			</div>
		
		</div>


		<div class="container">
			<div class="chiabut_solution">
				<div class="row g-3">
					<div class="col-sm-6 col-md-12 col-lg-3">
						<div align="center" style="margin-top: 100px;">
							<img src="../assets/images/k12.png" width="200" style="filter: drop-shadow(5px 10px 1px #0000001a);" alt="">
							<img src="../assets/images/left-arrow.png" class="chi-arrow" width="60" alt="">
							<p></p>
							<h4><?php echo $about_us_sol_K_12; ?></h4>
							<small style="font-size: 13px; color: #555;"><?php echo $about_us_sol_K_12_sub_txt; ?></small>
							<img src="../assets/images/down-arrow.png" width="60" class="chiDown-arrow" alt="">
						</div>
					</div>
					<div class="col-sm-6 col-md-12 col-lg-6">
						<div class="chiabutInner">
							<div align="center">
								<img src="../assets/images/4804443.jpg" style="margin-top: 20px; margin-right: 10px;" width="80" alt="">
								
								<h5 style="color: #464646;"><?php echo $about_us_edumess_plateform_txt; ?></h5>
							</div>

								<div style="padding: 25px 25px 0 25px;">
									<div class="row" style="padding: 10px; background-color: #f7faff; border-radius: 5px;">
									
										<div class="col-md-2 col-lg-2">
											<div align="center" class="btn btn-sm btn-icon"
													style="cursor:pointer;background-color:white; margin-top:30px; border-radius: 10px;">
													<img src="../assets/images/k12Icon.png" width="40" style="padding: 5px;" alt="">
											</div>
										</div>

										<div class="col-md-10 col-lg-10" >
												<h5 style="color: #0066FF;"><?php echo $about_us_sol_K_12; ?></h5>
												<Small style="font-size: 14px; line-spacing: 0.5;">
													<?php echo $about_us_k12_small_desc; ?>
												</Small>
										</div>

									</div>
								</div>

								<div style="padding: 10px 25px 25px 25px;">
									<div class="row" style="padding: 10px; background-color: #f7faff; border-radius: 5px;">
									
										<div class="col-md-2 col-lg-2">
											<div align="center" class="btn btn-sm btn-icon"
													style="cursor:pointer;background-color:white; margin-top:30px; border-radius: 10px;">
													<img src="../assets/images/tertiaryIcon.png" width="40" style="padding: 5px;" alt="">
											</div>
										</div>

										<div class="col-md-10 col-lg-10" >
										<h5 style="color: #0066FF;"><?php echo $about_us_sol_tertiary; ?></h5>
												<Small style="font-size: 14px; line-spacing: 0.5;">
													<?php echo $about_us_tertiary_small_desc; ?>
												</Small>
										</div>

									</div>
								</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-12 col-lg-3">
						<div align="center" class="chiTerImg" style="margin-top: 80px;">
							<img src="../assets/images/up-arrow.png" width="60" class="chiDown-arrow" alt="">
							<img src="../assets/images/ter.png" width="200" style="filter: drop-shadow(5px 10px 1px #0000001a);"  alt="">
							<img src="../assets/images/right-arrow.png" class="chi-arrow" width="55" alt="">
							<p></p>
							<h4><?php echo $about_us_sol_tertiary; ?></h4>
							<small style="font-size: 13px; color: #555;"><?php echo $about_us_sol_tertiary_sub_txt; ?></small>
						</div>
						
					</div>
				</div>
			</div>
					
		</div>

		<div class="growth_Engine"></div>

		<div style="width: 100%; padding-bottom: 80px; margin-top: -95px; background-color: white;">
				<div class="container" style="padding-top: 70px;">
					<div class="row g-3" >

						<div class="col-sm-6 col-md-12 col-lg-6">
							<div class="chiEdumessGoals">
								<h2 style="font-weight: 400; color: #0066FF;"><?php echo $about_us_vision_h2; ?></h2>
								<p style="font-weight: 400; font-size: 16px; color:#535353;">
									<?php echo $about_us_vision_descr; ?>
								</p>

								<div style="width: 100%; border: solid 1px #cecece; margin-top: 30px;"></div>

								<h2 style="font-weight: 400; color: #0066FF; margin-top: 30px;"><?php echo $about_us_mission_h2; ?></h2>
								<p style="font-weight: 400; font-size: 16px; color:#535353;">
									<?php echo $about_us_mission_descr; ?>
								</p>
							</div>
						</div>
						
						<div class="col-sm-6 col-md-12 col-lg-6">
							<div align="center" style="padding-top: 30px;">
								<img src="../assets/images/aboutFeaturedImg.png" style="width: 100%; filter: drop-shadow(10px 15px 1px #0000001a);" alt="">
							</div>
							
						</div>

					</div>
				</div>
		</div>

		

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