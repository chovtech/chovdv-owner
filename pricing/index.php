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
	<section style="background-color: #fdfeff;">

		<!-- NavBar -->
		<?php include('../includes/website-header.php'); ?>



		<!-------Top banner ------------->
		<!--------------------------->
		
		<div class="container" style="padding-top: 200px;">
			<div align="center">
				<h1 style="font-weight: 700; color:#535353;">
				<span style="color: #0066FF;">EduMESS</span>  <?php echo $pricing_page_header_title; ?></h1>
				<p style="font-size: 17px; font-weight: 400; color:#686868;">
					<?php echo $pricing_page_title_sub1; ?>
					<br> 
					<?php echo $pricing_page_title_sub2; ?>
				</p>
			</div>
		
		</div>

        <div class="container-fluid" style="padding-top: 50px; padding-bottom: 150px;">
            <div class="renz_prizing_MeBTN" style="margin-left: 32%;">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item border renz_K12Btn" style="border-radius: 5px;" role="presentation">
						<button class="nav-link active" style="width: 100%; font-size: 18px; font-weight: 500;" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
							<?php echo $pricing_page_K_12; ?><div style="font-size: 12px; margin-top: -5px;"><?php echo $pricing_page_K_12_sub_txt; ?></div>
						</button>
                    </li>&nbsp;&nbsp;&nbsp;
                    <li class="nav-item border renz_TertiaryBtn" style="border-radius: 5px;" role="presentation">
						<button class="nav-link" style="width: 100%; font-size: 18px; font-weight: 500;" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
							<?php echo $pricing_page_tertiary; ?><div style="font-size: 12px; margin-top: -5px;"><?php echo $pricing_page_tertiary_sub_txt; ?></div>
						</button>
                    </li>
                </ul>
            </div>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                   
                    <div class="renz_pricing-table" style="padding-top: 80px;">
                        <div class="grid">
                            <div class="box basic">
                                <div class="title"><?php echo $pricing_page_free_txt; ?></div>
                                <div class="title_decr"><?php echo $pricing_page_Beginner_txt; ?></div>
                                <div class="price">
                                <b style=" color:#555;">₦0</b>
                                <i style="font-size: 14px; color:#555;"><?php echo $pricing_page_per_student; ?></i>
                                </div>
                                <hr>
                                <div class="features">
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i><?php echo $pricing_page_free_db_management; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i><?php echo $pricing_page_free_bulk_sms; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i><?php echo $pricing_page_free_result_management; ?></div>
                                </div>
                                <div class="button" style="margin-top: 390px;">
                                    <button><?php echo $pricing_page_get_started_btn; ?></button>
                                </div>
                            </div>

                            <div class="box ninja">
                                <div class="title"><?php echo $pricing_page_basic_txt; ?></div>
                                <div class="title_decr"><?php echo $pricing_page_enthusiast_txt; ?></div>
                                <div class="price">
                                    <b style=" color:#555;">₦500</b>
                                    <i style="font-size: 14px; color:#555;"><?php echo $pricing_page_per_student; ?></i>
                                </div>
                                <hr>
                                <div class="features">
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_free_db_management; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_free_bulk_sms; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_free_result_management; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_pta_management; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_attendance; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_user_authentication; ?></div>
                                    
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_multi_users; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_analytics; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_config_setting; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_grading_structure; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_entry_computation; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_promotion_demote; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_comments; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_special_activity; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_telepresence_surveillance; ?></div>
                                </div>
                                <div class="button">
                                    <button><?php echo $pricing_page_get_started_btn; ?></button>
                                </div>
                            </div>
        
                            <div class="box professional">
                                <div class="title_summRe" style="color: #fff;"><?php echo $pricing_page_every_day_plan; ?></div>
                                <div class="title"><?php echo $pricing_page_pro; ?></div>
                                <div class="title_decr" style="color: #fff;"><?php echo $pricing_page_inspirational; ?></div>
                                <div class="price"> 
                                    <b>₦750</b>
                                    <i style="font-size: 15px;"><?php echo $pricing_page_per_student; ?></i>
                                </div>
                                <hr style="color: #fff;">
                                <div class="features">
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_cbt; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_addmission_management; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_finance_management; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_e_leaning; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_e_wallet; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_TP; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_inventory; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_assignment; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_hoilday_program; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_lesson_plan; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_lesson_note; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_Disciplinary_mag; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_e_mail_service; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_policy; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_fee_payment; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #ffffff; font-size: 17px;" ></i> <?php echo $pricing_page_time_table; ?></div>
                                </div>
                                <div class="button" style="margin-top: -10px;">
                                    <button><?php echo $pricing_page_get_started_btn; ?></button>
                                </div>
                            </div>
        
                            <div class="box ninja">
                                <div class="title_summRe" style="color: #555;"><?php echo $pricing_page_every_plan_pro; ?></div>
                                <div class="title"><?php echo $pricing_page_entrepreneur; ?></div>
                                <div class="title_decr"><?php echo $pricing_page_impactful; ?></div>
                                <div class="price">
                                    <b style=" color:#555;">₦1,500</b>
                                    <i style="font-size: 14px; color:#555;"><?php echo $pricing_page_per_student; ?></i>
                                </div>
                                <hr>
                                <div class="features">
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_cbt; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_e_library; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_hostel_management; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_Cafeteria_Management; ?></div>
                                    <div class="renz_txt"><i class='bx bx-check-circle' style="color: #0066FF; font-size: 17px;" ></i> <?php echo $pricing_page_cbt; ?></div>
                                                                   
                                </div>
                                <div class="button" style="margin-top: 270px;">
                                    <button><?php echo $pricing_page_get_started_btn; ?></button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        
					<div class="renz_Ter_Pricing">
						<div align="center">
							<h1 style="color: #fff; font-weight: 700; margin-top: -20px;">
								<span style="font-size: 22px; font-weight: 500;"><?php echo $pricing_page_tertiary_interested; ?></span>
								 <br><?php echo $pricing_page_tertiary_edummess_h1; ?>
							</h1>
						
							<p style="color: #fff; font-size: 14px;"><?php echo $pricing_page_tertiary_callback_descr1; ?> <br> <?php echo $pricing_page_tertiary_callback_descr2; ?></p>
							
							<a href="#" class="btn" style="border: 2px solid #007bff; margin-top: 50px; color:white; width: 60%; border-radius: 7px;padding: 2%;font-weight: 500;font-size:18px;background: #fff;color:#007bff;">
								<span>
									<?php echo $pricing_page_tertiary_callback_btn; ?>
								</span>
							</a>
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

		
		
			<!-- Footer -->
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