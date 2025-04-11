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

<body>
	<section>

		<!-- NavBar -->
		<?php include('../includes/website-header.php'); ?>


		<!-------Top banner ------------->
		<!--------------------------->
        <div class="container-fluid pb-5">

                <h1 align="center" style="margin-top: 10%; font-size: 65px; color:#007bff; font-weight: 600;">
                    <?php echo $blog_page_title_head; ?>
                </h1>

                <div class="row">
                    <div class="col-10"></div>
                    <div class="col-2">
                        <div class="rencBlogML" style="display: flex;">
                            <a href="" style="text-decoration: none; font-weight: 500; color: #666666;">
                                <?php echo $blog_page_blog_link; ?>
                            </a>
                            &nbsp;&nbsp;/&nbsp;&nbsp;
                            <a href="#caseStudy" style="text-decoration: none; font-weight: 500; color: #666666;">
                               <?php echo $blog_page_case_study_link; ?>
                            </a>
                        </div>
                    </div>
                </div>



                <div class="row chifirstBl g-2" style="padding: 60px;">
                    <div class="col-sm-6 col-md-12 col-lg-6" align="center">
                        <img src="../assets/images/website_images/casestudy1.png" style="width: 90%;" class="chimblog-Img card-img-top" alt="...">
                    </div>
                    <div class="col-sm-6 col-md-12 col-lg-6">
                        <h5 style="color: #666666; margin-top: 30px;"><?php echo $blog_page_topblog_title; ?></h5>
                       
                        <p style="color: #979998; font-size: 13px; word-spacing: 3px; margin-top: 15px;">
                            <?php echo $blog_page_topblog_description; ?>
                        </p> <br>
                        <a href="../#" class="btn btn-primary btn-sm"
								style="background: linear-gradient(90deg, rgba(0,123,255,1) 35%, rgba(2,107,219,1) 100%, rgba(0,212,255,1) 100%);">
                                <small><?php echo $blog_page_continue_read_btn; ?></small>
                        </a>
                    </div>
                </div>

                <div class="row g-3 rencasecards" id="ChiBlog" style="padding: 80px;">
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="zoom-container">
                                <img src="../assets/images/website_images/casestudy1.png" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body mt-2 pb-2">
                                <h6 class="card-title" style="color:#007bff;"><?php echo $blog_page_blog_card_title1; ?>
                                </h6>
                                <small class="card-title" style="color: #979998;font-size: 13px;"><?php echo $blog_page_blog_card_dateNum1; ?>  <?php echo $blog_page_blog_card_caldate1; ?><svg
                                        class="mb-2 mx-1" width="4" height="5" viewBox="0 0 4 5" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <ellipse cx="2.09113" cy="2.26524" rx="1.75324" ry="1.79454" fill="#92929D">
                                        </ellipse>
                                    </svg><?php echo $blog_page_blog_card_news; ?></small>
                                <p class="card-text mt-3" style="font-size: 12px;color: #979998;">
                                    <?php echo $blog_page_blog_card_Description1; ?>
                                </p>
                                <a href="../#" class="btn btn-primary btn-sm"
                                    style="background: linear-gradient(90deg, rgba(0,123,255,1) 35%, rgba(2,107,219,1) 100%, rgba(0,212,255,1) 100%);">
                                    <small><?php echo $blog_page_blog_card_button_Txt; ?></small>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="zoom-container">
                                <img src="../assets/images/website_images/casestudy1.png" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body mt-2 pb-2">
                                <h6 class="card-title" style="color:#007bff;"><?php echo $blog_page_blog_card_title2; ?>
                                </h6>
                                <small class="card-title" style="color: #979998;font-size: 13px;"><?php echo $blog_page_blog_card_dateNum2; ?>  <?php echo $blog_page_blog_card_caldate2; ?><svg
                                        class="mb-2 mx-1" width="4" height="5" viewBox="0 0 4 5" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <ellipse cx="2.09113" cy="2.26524" rx="1.75324" ry="1.79454" fill="#92929D">
                                        </ellipse>
                                    </svg><?php echo $blog_page_blog_card_news; ?></small>
                                <p class="card-text mt-3" style="font-size: 12px;color: #979998;">
                                    <?php echo $blog_page_blog_card_Description2; ?>
                                </p>
                                <a href="../#" class="btn btn-primary btn-sm"
                                    style="background: linear-gradient(90deg, rgba(0,123,255,1) 35%, rgba(2,107,219,1) 100%, rgba(0,212,255,1) 100%);">
                                    <small><?php echo $blog_page_blog_card_button_Txt; ?></small>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="zoom-container">
                                <img src="../assets/images/website_images/casestudy1.png" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body mt-2 pb-2">
                                <h6 class="card-title" style="color:#007bff;"><?php echo $blog_page_blog_card_title3; ?>
                                </h6>
                                <small class="card-title" style="color: #979998;font-size: 13px;"><?php echo $blog_page_blog_card_dateNum3; ?>  <?php echo $blog_page_blog_card_caldate3; ?><svg
                                        class="mb-2 mx-1" width="4" height="5" viewBox="0 0 4 5" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <ellipse cx="2.09113" cy="2.26524" rx="1.75324" ry="1.79454" fill="#92929D">
                                        </ellipse>
                                    </svg><?php echo $blog_page_blog_card_news; ?></small>
                                <p class="card-text mt-3" style="font-size: 12px;color: #979998;">
                                    <?php echo $blog_page_blog_card_Description3; ?>
                                </p>
                                <a href="../#" class="btn btn-primary btn-sm"
                                    style="background: linear-gradient(90deg, rgba(0,123,255,1) 35%, rgba(2,107,219,1) 100%, rgba(0,212,255,1) 100%);">
                                    <small><?php echo $blog_page_blog_card_button_Txt; ?></small>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 pt-5 col-md-12">
                        <div class="card">
                            <div class="zoom-container">
                                <img src="../assets/images/website_images/casestudy1.png" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body mt-2 pb-2">
                                <h6 class="card-title" style="color:#007bff;"><?php echo $blog_page_blog_card_title4; ?>
                                </h6>
                                <small class="card-title" style="color: #979998;font-size: 13px;"><?php echo $blog_page_blog_card_dateNum4; ?>  <?php echo $blog_page_blog_card_caldate4; ?><svg
                                        class="mb-2 mx-1" width="4" height="5" viewBox="0 0 4 5" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <ellipse cx="2.09113" cy="2.26524" rx="1.75324" ry="1.79454" fill="#92929D">
                                        </ellipse>
                                    </svg><?php echo $blog_page_blog_card_news; ?></small>
                                <p class="card-text mt-3" style="font-size: 12px;color: #979998;">
                                    <?php echo $blog_page_blog_card_Description4; ?>
                                </p>
                                <a href="../#" class="btn btn-primary btn-sm"
                                    style="background: linear-gradient(90deg, rgba(0,123,255,1) 35%, rgba(2,107,219,1) 100%, rgba(0,212,255,1) 100%);">
                                    <small><?php echo $blog_page_blog_card_button_Txt; ?></small>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 pt-5 col-md-12">
                        <div class="card">
                            <div class="zoom-container">
                                <img src="../assets/images/website_images/casestudy1.png" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body mt-2 pb-2">
                                <h6 class="card-title" style="color:#007bff;"><?php echo $blog_page_blog_card_title5; ?>
                                </h6>
                                <small class="card-title" style="color: #979998;font-size: 13px;"><?php echo $blog_page_blog_card_dateNum5; ?>  <?php echo $blog_page_blog_card_caldate5; ?><svg
                                        class="mb-2 mx-1" width="4" height="5" viewBox="0 0 4 5" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <ellipse cx="2.09113" cy="2.26524" rx="1.75324" ry="1.79454" fill="#92929D">
                                        </ellipse>
                                    </svg><?php echo $blog_page_blog_card_news; ?></small>
                                <p class="card-text mt-3" style="font-size: 12px;color: #979998;">
                                    <?php echo $blog_page_blog_card_Description5; ?>
                                </p>
                                <a href="../#" class="btn btn-primary btn-sm"
                                    style="background: linear-gradient(90deg, rgba(0,123,255,1) 35%, rgba(2,107,219,1) 100%, rgba(0,212,255,1) 100%);">
                                    <small><?php echo $blog_page_blog_card_button_Txt; ?></small>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 pt-5 col-md-12">
                        <div class="card">
                            <div class="zoom-container">
                                <img src="../assets/images/website_images/casestudy1.png" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body mt-2 pb-2">
                                <h6 class="card-title" style="color:#007bff;"><?php echo $blog_page_blog_card_title6; ?>
                                </h6>
                                <small class="card-title" style="color: #979998;font-size: 13px;"><?php echo $blog_page_blog_card_dateNum6; ?>  <?php echo $blog_page_blog_card_caldate6; ?><svg
                                        class="mb-2 mx-1" width="4" height="5" viewBox="0 0 4 5" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <ellipse cx="2.09113" cy="2.26524" rx="1.75324" ry="1.79454" fill="#92929D">
                                        </ellipse>
                                    </svg><?php echo $blog_page_blog_card_news; ?></small>
                                <p class="card-text mt-3" style="font-size: 12px;color: #979998;">
                                    <?php echo $blog_page_blog_card_Description6; ?>
                                </p>
                                <a href="../#" class="btn btn-primary btn-sm"
                                    style="background: linear-gradient(90deg, rgba(0,123,255,1) 35%, rgba(2,107,219,1) 100%, rgba(0,212,255,1) 100%);">
                                    <small><?php echo $blog_page_blog_card_button_Txt; ?></small>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div align="center" style="margin-top: 50px;">
                        <a href="../#" class="btn btn-primary btn-sm"
                            style="background: linear-gradient(90deg, rgba(0,123,255,1) 35%, rgba(2,107,219,1) 100%, rgba(0,212,255,1) 100%);">
                            <small><?php echo $blog_page_explore_btn; ?></small>
                                
                        </a>
                    </div>
			    </div>


                <h1 align="center" id="caseStudy" style="margin-top: 5%; font-size: 65px; color:#007bff; font-weight: 600;"><?php echo $blog_page_case_study_link; ?></h1>

                <div class="row g-3 rencasecards"  style="padding: 80px;">
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="zoom-container">
                                <img src="../assets/images/website_images/casestudy1.png" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body mt-2 pb-2">
                                <h6 class="card-title" style="color:#007bff;"><?php echo $website_our_case_study_card_title1; ?>
                                </h6>
                                <small class="card-title" style="color: #979998;font-size: 13px;"><?php echo $website_our_case_study_card_dateNum1; ?>  <?php echo $website_our_case_study_card_caldate1; ?><svg
                                        class="mb-2 mx-1" width="4" height="5" viewBox="0 0 4 5" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <ellipse cx="2.09113" cy="2.26524" rx="1.75324" ry="1.79454" fill="#92929D">
                                        </ellipse>
                                    </svg><?php echo $website_our_case_study_card_news; ?></small>
                                <p class="card-text mt-3" style="font-size: 12px;color: #979998;">
                                    <?php echo $website_our_case_study_card_Description1; ?>
                                </p>
                                <a href="#" class="btn btn-primary btn-sm"
                                    style="background: linear-gradient(90deg, rgba(0,123,255,1) 35%, rgba(2,107,219,1) 100%, rgba(0,212,255,1) 100%);">
                                    <small><?php echo $website_our_case_study_card_button_Txt; ?></small>
                                </a>
						    </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="zoom-container">
                                <img src="../assets/images/website_images/casestudy1.png" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body mt-2 pb-2">
                                <h6 class="card-title" style="color:#007bff;"><?php echo $website_our_case_study_card_title2; ?>
                                </h6>
                                <small class="card-title" style="color: #979998;font-size: 13px;"><?php echo $website_our_case_study_card_dateNum2; ?>  <?php echo $website_our_case_study_card_caldate2; ?> <svg
                                        class="mb-2 mx-1" width="4" height="5" viewBox="0 0 4 5" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <ellipse cx="2.09113" cy="2.26524" rx="1.75324" ry="1.79454" fill="#92929D">
                                        </ellipse>
                                    </svg><?php echo $website_our_case_study_card_news; ?></small>
                                <p class="card-text mt-3" style="font-size: 12px;color: #979998;">
                                    <?php echo $website_our_case_study_card_Description2; ?>
                                </p>
                                <a href="#" class="btn btn-primary btn-sm"
                                    style="background: linear-gradient(90deg, rgba(0,123,255,1) 35%, rgba(2,107,219,1) 100%, rgba(0,212,255,1) 100%);">
                                    <small><?php echo $website_our_case_study_card_button_Txt; ?></small>
                                </a>
						    </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="zoom-container">
                                <img src="../assets/images/website_images/casestudy1.png" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body mt-2 pb-2">
                                    <h6 class="card-title" style="color:#007bff;"><?php echo $website_our_case_study_card_title3; ?>
                                    </h6>
                                    <small class="card-title" style="color: #979998;font-size: 13px;"><?php echo $website_our_case_study_card_dateNum3; ?>  <?php echo $website_our_case_study_card_caldate3; ?><svg
                                            class="mb-2 mx-1" width="4" height="5" viewBox="0 0 4 5" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <ellipse cx="2.09113" cy="2.26524" rx="1.75324" ry="1.79454" fill="#92929D">
                                            </ellipse>
                                        </svg><?php echo $website_our_case_study_card_news; ?></small>
                                    <p class="card-text mt-3" style="font-size: 12px;color: #979998;">
                                        <?php echo $website_our_case_study_card_Description3; ?>
                                    </p>
                                    <a href="#" class="btn btn-primary btn-sm"
                                        style="background: linear-gradient(90deg, rgba(0,123,255,1) 35%, rgba(2,107,219,1) 100%, rgba(0,212,255,1) 100%);">
                                        <small><?php echo $website_our_case_study_card_button_Txt; ?></small>
                                    </a>
						    </div>
                        </div>
                    </div>

                    <div align="center" style="margin-top: 50px;">
                        <a href="../#" class="btn btn-primary btn-sm"
                            style="background: linear-gradient(90deg, rgba(0,123,255,1) 35%, rgba(2,107,219,1) 100%, rgba(0,212,255,1) 100%);">
                            <small><?php echo $blog_page_explore_btn; ?></small>
                                
                        </a>
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