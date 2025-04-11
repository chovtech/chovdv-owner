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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
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
	
	
	<style>
	
	.modal.show {
            display: block; /* Ensure the modal shows properly */
        }
	
	
	    .mobile_view_chi_des{
	        padding: 20px;
	    }
	    
	    @media (max-width: 500px) {
              .hero_chima_text {
                font-size: 36px !important;
                line-height: 35px !important;
              }
              .chi_bex{
                  font-size: 13.5px !important;
                 
              }
              
               .new_chima_btn{
                     margin-top: 10px !important;
                    padding: 10px 10px;
                    font-size: 15px;
                }
                
                .mobile_view_img{
                    width: 60px;
                    height: 60px;
                }
                .mobile_view_chi_text{
                    font-size: 15px;
                }
                .mobile_view_chi_des{
                    font-size: 13px;
                    padding: 0 !important;
                }
            }
            
            .glow-border {
  border: 2px solid transparent; /* Invisible border initially */
  border-radius: 15px; /* Rounded corners */
  padding: 20px; /* Space between content and border */
  background: linear-gradient(#000, #000) padding-box, /* Inner background */
              linear-gradient(45deg, #00ffcc, #ff00cc, #00ccff) border-box; /* Gradient for border */
  animation: glow-animation 3s infinite; /* Animation loop */
}

@keyframes glow-animation {
  0% {
    border-color: #00ffcc;
    box-shadow: 0 0 15px #00ffcc;
  }
  50% {
    border-color: #ff00cc;
    box-shadow: 0 0 25px #ff00cc;
  }
  100% {
    border-color: #00ccff;
    box-shadow: 0 0 15px #00ccff;
  }
}

	</style>
</head>

<body>
    
    <section>
        <!---====== Welcome Modal========--->
        <!-- Modal -->
               <div class="modal fade" id="onLoadModal" tabindex="-1" aria-labelledby="onLoadModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                               <h1 class="modal-title text-center w-100" style="font-family: 'Poppins', sans-serif; font-weight: 600;" id="onLoadModalLabel">Welcome to EduMESS</h1>
                                <!-- Custom close button -->
                                <button id="customCloseButton" type="button" class="btn btn-outline-danger">X</button>
                            </div>
                            <div class="modal-body">
                                <p style="font-family: 'Poppins', sans-serif;">Fill the following information to require a callback.</p>
                                
                                <form class="p-1 mt-4">
                                    <div class="mb-3">
                                      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Full Name">
                                    </div>
                                    
                                     <div class="mb-3">
                                      <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Phone No.">
                                    </div>
                                    
                                    <div class="mb-3">
                                      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                    </div>
                                </form>
                                
                            </div>
                            <div class="modal-footer">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                  <button id="customFooterClose" class="btn btn-primary" style="padding: 12px 12px;" type="button">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
         <!-- Modal -->
            
    </section>
    
    
	<section>

		<!-- NavBar -->
		<?php include('includes/website-header.php'); ?>


		<!-- Top banner -->
		<div class="container-fluid">
			<div class="row pb-5" align="left">
				<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 home">

					<!-- dotted img -->
					<img class="dotted-img img-fluid" src="assets/images/dottedimg.png" />
					
                    
					<div class="home-text">
					    
						<h1 class="fw-bold chi_bex" style="background-color: #ffde72; font-weight: 500; color: #2f2f2f; font-size: 14px; text-transform: uppercase; border-radius: 5px; padding: 10px 7px;  display: inline-block; ">
							<?php echo $k12_page_banner_Pre_Header; ?>
						</h1>
						
						<h1 class="fw-bold hero_chima_text" style="font-size:60px; line-height: 55px; color: #343a40;">
							<?php echo $k12_page_banner_h1; ?>
						</h1>
						
					</div>
					<div class="aftwriteup">
						<span>
							<!--<p> 
								<?php echo $k12_page_banner_p_tag1; ?>
							</p>-->
							<p style="font-weight: 600; font-size: 17px;">
								<?php echo $k12_page_banner_p_tag2; ?>
								
							</p>
						</span>
					</div>
					
					
					
					
					<div class="btndiv" align="left">
						<a href="#" class="btn startbtn"
							style="background: linear-gradient(90deg, rgb(0, 123, 255) 35%, rgb(2, 107, 219) 100%, rgb(0, 212, 255) 100%); cursor: pointer;font-weight: 600; font-weight: 700px; width: 180px; padding:10px;">
							<span>
								<?php echo $k12_page_banner_started_btn; ?>
								
							</span>
						</a>
						
						&nbsp;&nbsp; &nbsp;&nbsp;
						
						
						<a href="#" class="btn new_chima_btn" style="border: 1.5px solid #007bff; padding: 10px 10px;">
							<span style="display: flex; font-weight: 600; align-items: center;">
								<i class="fa fa-play-circle fs-4" style="color: #d00000;"></i>
								&nbsp;&nbsp;
								<span style="vertical-align: middle;color:#3A3A3A;">
									<?php echo $k12_page_banner_watch_btn; ?>
								</span>
							</span>
						</a>
						
					</div>
					
					
					
				


				</div>
				<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 containerimg mt-5" align="center">
					<img class="img-fluid" src="assets/images/k-12Img.png" style="margin-top:60px; width: 70%;"/>
				</div>
			</div>

			<!-- schools -->
			<div class="pb-5">
				<div class="row p-sm-5" style="margin-top:40px;">
					<div class="col-md-12 col-lg-3">
						
					</div>
					<div class="col-md-12 col-lg-6 fw-Normal fs-4" align="center" style="font-size:18px;font-weight:400;color:#3A3A3A;">
						<?php echo $k12_page_brand_head_txt; ?>
						
					</div>
					<div class="col-md-12 col-lg-3">
						
					</div>
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
			</div>
		</div>

		<div class="container" style="width:85%;">

			<!-- why edumess -->
			<div class="row" style="margin-top:50px;">
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
							<img class="img-fluid d-sm-block d-md-block d-xm-block" src="assets/images/whyEduMESS-SchoolManagement.png" style="width:80%;" />
						</div>
					</div>

				</div>
				<div class="col-md-12 col-lg-6" align="center">
					<div class="row g-3 mt-2">
						<div class="col-lg-6 col-md-12 mt-5">
							<div class="card mt-5 mb-3 p-4" align="left" style="border-color: #007bff;border-radius: 15px;">
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

						<div class="col-lg-6 col-md-12 mt-5">
							<div class="card mt-5 mb-3 p-4" align="left" style="border-color: #007bff;border-radius: 15px;">
								<span>
									<i class="fa fa-money fs-4" style="color: #007bff;"></i>
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

						<div class="col-lg-6 col-md-12 mt-1">
							<div class="card mb-3 p-4" align="left" style="border-color: #007bff;border-radius: 15px;">
								<span>
									<i class="fa fa-smile-o fs-4" style="color: #007bff;"></i>
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

						<div class="col-lg-6 col-md-12 mt-1">
							<div class="card mb-3 p-4" align="left" style="border-color: #007bff;border-radius: 15px;">
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
					<?php echo $k12_page_feature_header_txt; ?>
				</div>
				<div class="col-md-12 col-lg-2">
					
				</div>
			</div>

		</div>

		<div class="container-fluid" style="width:95%;">
		    
		    <!-- School Owner -->
			<div class="row container p-sm-3" style="margin-top:50px;">
				<div class="col-md-12 col-lg-6" style="font-size:15px;color:#3A3A3A;margin-top:12px;">
					<div class="row ps-sm-5">
						<div class="col-12">
							<span style="font-size:35px;font-weight:600;color:#007bff;">
								 School Owner
							</span>
						</div>
						<div class="col-12" style="margin-top:30px;">
							<small style="color:#524f4e;font-size:15px;">
							EduMESS empowers school owners with full control over school operations, helping to grow and improve efficiency.
								
							</small>
						</div>
						<div class="col-2" style="margin-top:20px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff;font-size:16px;border-radius: 100%;">
								
								<i class="fa fa-asterisk" aria-hidden="true" style="padding:5px 2px 5px 2px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">
							<span style="font-size:18px;font-weight:500;">
								Gain a complete overview of school performance in real-time.
																
							</span>
						</div>
						<div class="col-2" style="margin-top:20px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff;font-size:16px;border-radius: 100%;">
								
								<i class="fa fa-asterisk" aria-hidden="true" style="padding:5px 2px 5px 2px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">

							<span style="font-size:18px;font-weight:500;">
								Make informed decisions backed by accurate data.
							</span>

						</div>
						<div class="col-2" style="margin-top:20px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff;font-size:16px;border-radius: 100%;">
								
								<i class="fa fa-asterisk" aria-hidden="true" style="padding:5px 2px 5px 2px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">

							<span style="font-size:18px;font-weight:500;">
								Streamline operations to reduce costs and increase profitability.
							</span>

						</div>
						<div class="col-2" style="margin-top:20px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff;font-size:16px;border-radius: 100%;">
								
								<i class="fa fa-asterisk" aria-hidden="true" style="padding:5px 2px 5px 2px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">

							<span style="font-size:18px;font-weight:500;">
								Ensure compliance with regulatory standards effortlessly.
							</span>

						</div>
					</div>
				</div>
				<div class="col-md-12 col-lg-6" align="right">
					<img class="img-fluid d-none d-sm-block d-md-block d-xm-block"
						src="<?php echo $defaultUrl;?>assets/images/school-owner-img.jpg" alt="EduMESS-adminstration-School-Management" style="width:100%;" />
				</div>
				
			</div>

			<!-- administrator -->
			<div class="row g-3" style="margin-top:100px;">
				<div class="col-md-12 col-lg-6" align="center">
					<img class="img-fluid d-none d-sm-block d-md-block d-xm-block"
						src="<?php echo $defaultUrl;?>assets/images/adminstrationSchoolManagement.png" alt="EduMESS-adminstration-School-Management" style="width:75%; margin-top: 30px;" />
				</div>
				<div class="col-md-12 col-lg-6" style="font-size:15px;color:#3A3A3A;margin-top:12px;">
					<div class="row">
						<div class="col-12">
							<span style="font-size:35px;font-weight:550;color:#007bff;">
							    <?php //echo $k12_page_administrator_title; ?>
							    Administrator
							</span>
						</div>
						<div class="col-12" style="margin-top:30px;">
							<small style="color:#524f4e;font-size:15px;">
								<?php //echo $k12_page_administrator_descr; ?>
								EduMESS offers an all-encompassing management system that effectively streamlines operations, minimizes resources, and optimizes costs for your school organization.
							</small>
						</div>
						<div class="col-2" style="margin-top:20px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff; border: 1px solid #007bff;font-size:13px;border-radius: 100%;">
								
								<i class="fa fa-bookmark" aria-hidden="true" style="padding:7px 5px 6px 5px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">
							<span style="font-size:18px;font-weight:500;">
								Maintain full oversight of all school activities in one place.
								<?php //echo $k12_page_administrator_list1; ?>
							</span>
						</div>
						<div class="col-2" style="margin-top:20px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff; border: 1px solid #007bff;font-size:13px;border-radius: 100%;">
								
								<i class="fa fa-bookmark" aria-hidden="true" style="padding:7px 5px 6px 5px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">

							<span style="font-size:18px;font-weight:500;">
							       Safeguard against financial leaks with smart financial tracking.
								 <?php //echo $k12_page_administrator_list2; ?>
							</span>

						</div>
						<div class="col-2" style="margin-top:20px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff; border: 1px solid #007bff;font-size:13px;border-radius: 100%;">
								
								<i class="fa fa-bookmark" aria-hidden="true" style="padding:7px 5px 6px 5px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">

							<span style="font-size:18px;font-weight:500;">
							    Minimize the operational costs of your school.
								<?php //echo $k12_page_administrator_list3; ?>
							</span>

						</div>
						<div class="col-2" style="margin-top:20px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff; border: 1px solid #007bff;font-size:13px;border-radius: 100%;">
								
								<i class="fa fa-bookmark" aria-hidden="true" style="padding:7px 5px 6px 5px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">

							<span style="font-size:18px;font-weight:500;">
							    Achieve a 100% increase in efficiency with automated processes.
								<?php // echo $k12_page_administrator_list4; ?>
							</span>

						</div>

						<div class="col-2" style="margin-top:15px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff; border: 1px solid #007bff;font-size:13px;border-radius: 100%;">
								
								<i class="fa fa-bookmark" aria-hidden="true" style="padding:7px 5px 6px 5px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">

							<span style="font-size:18px;font-weight:500;">
							    Effortlessly generate reports with a few clicks.
								<?php //echo $k12_page_administrator_list5; ?>
							</span>

						</div>
					</div>
				</div>
			</div>

			<div class="row" style="margin-top:30px;">
				<div class="col-6" align="left">
					<img class="img-fluid" style="width: 70px;margin-top:0%;" src="<?php echo $defaultUrl;?>assets/images/dottedimg.png" />
				</div>
				<div class="col-6" align="right">
					<img class="img-fluid" style="width: 70px;margin-buttom:0%;" src="<?php echo $defaultUrl;?>assets/images/dottedimg.png" />
				</div>
			</div>

			<!-- teacher -->
			<div class="row container p-sm-3" style="margin-top:30px;">
				<div class="col-md-12 col-lg-6" style="font-size:15px;color:#3A3A3A;margin-top:12px;">
					<div class="row ps-sm-5">
						<div class="col-12">
							<span style="font-size:35px;font-weight:550;color:#007bff;">
								 <?php echo $k12_page_teacher_title; ?>
							</span>
						</div>
						<div class="col-12" style="margin-top:30px;">
							<small style="color:#524f4e;font-size:15px;">
							    EduMESS provides a comprehensive management system that helps you maximize your time and effort while giving your best to your students.
								<?php // echo $k12_page_teacher_descr; ?>
								
							</small>
						</div>
						<div class="col-2" style="margin-top:20px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff; border: 1px dashed #007bff; font-size:20px;border-radius: 100%;">
								<i class="fa fa-check" aria-hidden="true" style="padding:5px 2px 5px 2px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">
							<span style="font-size:18px;font-weight:500;">
							    Compile student results quickly and accurately.
								<?php // echo $k12_page_teacher_list1; ?>
																
							</span>
						</div>
						<div class="col-2" style="margin-top:20px;">
						    <span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff; border: 1px dashed #007bff; font-size:20px;border-radius: 100%;">
								<i class="fa fa-check" aria-hidden="true" style="padding:5px 2px 5px 2px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">

							<span style="font-size:18px;font-weight:500;">
							    Seamlessly manage attendance and keep track of progress.
								<?php //echo $k12_page_teacher_list2; ?>
							</span>

						</div>
						<div class="col-2" style="margin-top:15px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff; border: 1px dashed #007bff; font-size:20px;border-radius: 100%;">
								<i class="fa fa-check" aria-hidden="true" style="padding:5px 2px 5px 2px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">

							<span style="font-size:18px;font-weight:500;">
							    Generate report cards effortlessly.
								<?php //echo $k12_page_teacher_list3; ?>
							</span>

						</div>
						
						<div class="col-2" style="margin-top:20px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff; border: 1px dashed #007bff; font-size:20px;border-radius: 100%;">
								<i class="fa fa-check" aria-hidden="true" style="padding:5px 2px 5px 2px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">

							<span style="font-size:18px;font-weight:500;">
							   Access teaching resources and lesson plans on the go.
								<?php //echo $k12_page_teacher_list3; ?>
							</span>

						</div>
						
						<div class="col-2" style="margin-top:20px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff; border: 1px dashed #007bff; font-size:20px;border-radius: 100%;">
								<i class="fa fa-check" aria-hidden="true" style="padding:5px 2px 5px 2px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">

							<span style="font-size:18px;font-weight:500;">
							   Improve communication with parents through real-time updates.
								<?php //echo $k12_page_teacher_list3; ?>
							</span>

						</div>
						
					</div>
				</div>
				<div class="col-md-12 col-lg-6" align="right">
					<img class="img-fluid d-none d-sm-block d-md-block d-xm-block"
						src="<?php echo $defaultUrl;?>assets/images/teacherEduMESS.png" style="width:75%;" />
				</div>
				
			</div>

			<!-- Parents -->
			<div class="row g-3" style="margin-top:80px;">
				<div class="col-md-12 col-lg-6" align="center">
					<img class="img-fluid d-none d-sm-block d-md-block d-xm-block"
						src="<?php echo $defaultUrl;?>assets/images/eduMessParents.png" style="width:80%; margin-top: 50px;" />
				</div>
				<div class="col-md-12 col-lg-6" style="font-size:15px;color:#3A3A3A;margin-top:12px;">
					<div class="row">
						<div class="col-12">
							<span style="font-size:35px;font-weight:550;color:#007bff;">
								  <?php echo $k12_page_parents_title; ?>
							</span>
						</div>
						<div class="col-12" style="margin-top:30px;">
							<small style="color:#524f4e;font-size:15px;">
							    EduMESS offers a comprehensive management system that enables parents to actively participate in monitoring and engaging with their children's educational performance and activities.
								<?php // echo $k12_page_parents_descr; ?>
							</small>
						</div>
						<div class="col-2" style="margin-top:20px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff; border: 1px dashed #007bff; font-size:20px;border-radius: 100%;">
								<i class="fa fa-users" aria-hidden="true" style="padding:7px 2px 7px 2px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">
							<span style="font-size:18px;font-weight:500;">
							    Stay connected and monitor your child's performance from anywhere.
								<?php // echo $k12_page_parents_list1; ?>
							</span>
						</div>
						<div class="col-2" style="margin-top:20px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff; border: 1px dashed #007bff; font-size:20px;border-radius: 100%;">
								<i class="fa fa-users" aria-hidden="true" style="padding:7px 2px 7px 2px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">

							<span style="font-size:18px;font-weight:500;">
							    Conveniently pay school fees from home with secure online payments.
								<?php // echo $k12_page_parents_list2; ?>
							</span>

						</div>
						<div class="col-2" style="margin-top:20px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff; border: 1px dashed #007bff; font-size:20px;border-radius: 100%;">
								<i class="fa fa-users" aria-hidden="true" style="padding:7px 2px 7px 2px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">

							<span style="font-size:18px;font-weight:500;">
							    Receive instant notifications about your child's attendance, grades, and school events.
								<?php // echo $k12_page_parents_list3; ?>
							</span>

						</div>
						
						<div class="col-2" style="margin-top:20px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff; border: 1px dashed #007bff; font-size:20px;border-radius: 100%;">
								<i class="fa fa-users" aria-hidden="true" style="padding:7px 2px 7px 2px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">

							<span style="font-size:18px;font-weight:500;">
							    Communicate with teachers directly through the parent portal.
								<?php // echo $k12_page_parents_list3; ?>
							</span>

						</div>
						
						<div class="col-2" style="margin-top:20px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff; border: 1px dashed #007bff; font-size:20px;border-radius: 100%;">
								<i class="fa fa-users" aria-hidden="true" style="padding:7px 2px 7px 2px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">

							<span style="font-size:18px;font-weight:500;">
							    Gain peace of mind with easy access to important school information.
								<?php // echo $k12_page_parents_list3; ?>
							</span>

						</div>
						
					</div>
				</div>
			</div>
			
			<!-- Student -->
			<div class="row container p-sm-3" style="margin-top:80px;">
				<div class="col-md-12 col-lg-6" style="font-size:15px;color:#3A3A3A;margin-top:12px;">
					<div class="row ps-sm-5">
						<div class="col-12">
							<span style="font-size:35px;font-weight:550;color:#007bff;">
								 Student
							</span>
						</div>
						<div class="col-12" style="margin-top:30px;">
							<small style="color:#524f4e;font-size:15px;">
							   EduMESS enhances the learning experience by keeping students organized and engaged with their academic progress.
								<?php // echo $k12_page_teacher_descr; ?>
								
							</small>
						</div>
						<div class="col-2" style="margin-top:20px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff; border: 1px dashed #007bff; font-size:20px;border-radius: 100%;">
							
								<i class='bx bx-chart' style="padding:5px 2px 5px 2px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">
							<span style="font-size:18px;font-weight:500;">
							    Track your grades and assignments in real time.
								<?php // echo $k12_page_teacher_list1; ?>
																
							</span>
						</div>
						<div class="col-2" style="margin-top:20px;">
						    <span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff; border: 1px dashed #007bff; font-size:20px;border-radius: 100%;">
								<i class='bx bxs-calendar' style="padding:5px 2px 5px 2px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">

							<span style="font-size:18px;font-weight:500;">
							   Stay up-to-date with your timetable and school schedule.
								<?php //echo $k12_page_teacher_list2; ?>
							</span>

						</div>
						<div class="col-2" style="margin-top:20px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff; border: 1px dashed #007bff; font-size:20px;border-radius: 100%;">
								
								<i class='bx bxs-graduation' style="padding:5px 2px 5px 2px;"></i>
							
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">

							<span style="font-size:18px;font-weight:500;">
							   Access learning materials and resources anytime, anywhere.
								<?php //echo $k12_page_teacher_list3; ?>
							</span>

						</div>
						
						<div class="col-2" style="margin-top:20px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff; border: 1px dashed #007bff; font-size:20px;border-radius: 100%;">
							
								<i class='bx bxs-video' style="padding:5px 2px 5px 2px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">

							<span style="font-size:18px;font-weight:500;">
							  Communicate with teachers easily through the student portal.
								<?php //echo $k12_page_teacher_list3; ?>
							</span>

						</div>
						
						<div class="col-2" style="margin-top:20px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#007bff; border: 1px dashed #007bff; font-size:20px;border-radius: 100%;">
								
								<i class='bx bxs-bar-chart-alt-2' style="padding:5px 2px 5px 2px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:20px;">

							<span style="font-size:18px;font-weight:500;">
							   Stay motivated with a clear view of your progress toward academic goals.
								<?php //echo $k12_page_teacher_list3; ?>
							</span>

						</div>
						
					</div>
				</div>
				<div class="col-md-12 col-lg-6" align="right">
					<img class="img-fluid d-none d-sm-block d-md-block d-xm-block"
						src="<?php echo $defaultUrl;?>assets/images/website_images/school-student--.png" style="width:90%; margin-top: 70px;" />
				</div>
				
			</div>

			<div class="row">
				<div class="col-6" align="left">
					<img class="img-fluid" style="width: 70px;margin-top:0%;" src="<?php echo $defaultUrl;?>assets/images/dottedimg.png" />
				</div>
				<div class="col-6" align="right">
					<img class="img-fluid" style="width: 70px;margin-buttom:0%;" src="<?php echo $defaultUrl;?>assets/images/dottedimg.png" />
				</div>
			</div>
			
			<!--New Line-->
			<div class="row g-2" style="margin-top:100px;">
				<div class="col-md-12 col-lg-2">
					
				</div>
				<div class="col-md-12 col-lg-8" align="center" style="font-size:30px;font-weight:700;">
				    Other features included are: 

				</div>
				<div class="col-md-12 col-lg-2">
					
				</div>
				
				<div class="row g-2">
				    <div class="col-6 col-md-3 col-lg-3 col-sm-6" style="margin-top: 70px;">
    				     <div align="center">
    				        <img class="mobile_view_img" src="<?php echo $defaultUrl;?>assets/images/website_images/icons8-transportation-100.png" />
    				    </div>
    				    <h5 align="center" class="mt-2 mobile_view_chi_text">Transportation/Hostel Management</h5>
    				    <p align="center" class="mobile_view_chi_des">
    				       Manage student transportation routes, track buses in real-time, and simplify hostel assignments with EduMESS. Ensure student safety and streamline accommodation logistics for a smoother experience.
    				    </p>
				    </div> 
				    <div class="col-6 col-md-3 col-lg-3 col-sm-6" style="margin-top: 70px;">
    				     <div align="center">
    				        <img class="mobile_view_img" src="<?php echo $defaultUrl;?>assets/images/website_images/icons8-management-100.png" />
    				    </div>
    				    <h5 align="center" class="mt-2 mobile_view_chi_text">Governing Board Management</h5>
    				    <p align="center" class="mobile_view_chi_des">
    				       EduMESS facilitates effective communication and collaboration for school board members, enabling agenda sharing, meeting minute tracking, and informed decision-making.
    				     </p>
				    </div>
				    <div class="col-6 col-md-3 col-lg-3 col-sm-6" style="margin-top: 70px;">
    				    <div align="center">
    				        <img class="mobile_view_img" src="<?php echo $defaultUrl;?>assets/images/website_images/icons8-in-inventory-100.png" />
    				    </div>
    				    <h5 align="center" class="mt-2 mobile_view_chi_text">School Stock Inventory</h5>
    				    <p align="center" class="mobile_view_chi_des">
    				      Simplify the management of school supplies with EduMESS's stock inventory module. Track items like books, lab equipment, and uniforms, ensuring availability and minimizing waste.
    				     </p>
				    </div>
				    <div class="col-6 col-md-3 col-lg-3 col-sm-6" style="margin-top: 70px;">
    				    <div align="center">
    				        <img class="mobile_view_img" src="<?php echo $defaultUrl;?>assets/images/website_images/icons8-calendar-plus-100.png" />
    				    </div>
    				    <h5 align="center" class="mt-2 mobile_view_chi_text">Calendar/Timetable</h5>
    				    <p align="center" class="mobile_view_chi_des">
    				      EduMESS offers a user-friendly calendar and timetable feature, allowing administrators to create and share schedules easily. Manage classes, events, exams, and holidays, keeping everyone informed and on time.
    				     </p>
				    </div>
				
				    <div class="col-6 col-md-3 col-lg-3 col-sm-6" style="margin-top: 70px;">
    				    <div align="center">
    				        <img class="mobile_view_img" src="<?php echo $defaultUrl;?>assets/images/website_images/icons8-elections-100.png" />
    				    </div>
    				    <h5 align="center" class="mt-2 mobile_view_chi_text">Student Election Module</h5>
    				    <p align="center" class="mobile_view_chi_des">Simplify student elections with EduMESS. Manage and conduct fair votes, foster leadership skills and democratic values. </p>
    				    
    				</div>
				    <div class="col-6 col-md-3 col-lg-3 col-sm-6" style="margin-top: 70px;">
    				     <div align="center">
    				        <img class="mobile_view_img" src="<?php echo $defaultUrl;?>assets/images/website_images/icons8-legal-100.png" />
    				    </div>
    				    <h5 align="center" class="mt-1 mobile_view_chi_text">Legal/Compliance</h5>
    				    <p align="center" class="mobile_view_chi_des">
    				       Stay Compliant: Ensure your school meets all legal and regulatory requirements with easy document tracking and policy management.
    				    </p>
    				</div> 
				    <div class="col-6 col-md-3 col-lg-3 col-sm-6" style="margin-top: 70px;">
    				     <div align="center">
    				        <img class="mobile_view_img" src="<?php echo $defaultUrl;?>assets/images/website_images/icons8-marketing-100.png" />
    				    </div>
    				    <h5 align="center" class="mt-2 mobile_view_chi_text">Marketing</h5>
    				    <p align="center" class="mobile_view_chi_des">
    				       Promote Your School: Use our targeted marketing tools to attract new students and boost enrollment with streamlined campaigns.
    				    </p>
    				</div>
				    <div class="col-6 col-md-3 col-lg-3 col-sm-6" style="margin-top: 70px;">
    				    <div align="center">
    				        <img class="mobile_view_img" src="<?php echo $defaultUrl;?>assets/images/website_images/icons8-target-100.png" />
    				    </div>
    				    <h5 align="center" class="mt-2 mobile_view_chi_text">School Vision/Goal/KPI Tracker</h5>
    				    <p align="center" class="mobile_view_chi_des">
    				      Set and keep track of KPI's for academic goals and institutional growth. Align activities with your school's vision and track progress.
    				    </p>
    				</div>
    				
    				<div class="col-6 col-md-3 col-lg-3 col-sm-6" style="margin-top: 70px;">
    				    <div align="center">
    				        <img class="mobile_view_img" src="<?php echo $defaultUrl;?>assets/images/website_images/icons8-money-bag-100.png" />
    				    </div>
    				    <h5 align="center" class="mt-2 mobile_view_chi_text">Finance</h5>
    				    <p align="center" class="mobile_view_chi_des">Streamline financial management with EduMESS. Track fees, payments, expenses, and budgeting with ease, ensuring transparency and accuracy in your school's finances. </p>
    				    
    				</div>
				    <div class="col-6 col-md-3 col-lg-3 col-sm-6" style="margin-top: 70px;">
    				     <div align="center">
    				        <img class="mobile_view_img" src="<?php echo $defaultUrl;?>assets/images/website_images/icons8-certificate-100.png" />
    				    </div>
    				    <h5 align="center" class="mt-1 mobile_view_chi_text">Certificate/Document Processing</h5>
    				    <p align="center" class="mobile_view_chi_des">
    				       Automate the issuance of certificates and important documents. EduMESS simplifies the process of generating and verifying academic records, saving time and reducing errors.
    				    </p>
    				</div> 
				    <div class="col-6 col-md-3 col-lg-3 col-sm-6" style="margin-top: 70px;">
    				     <div align="center">
    				        <img class="mobile_view_img" src="<?php echo $defaultUrl;?>assets/images/website_images/icons8-mobile-id-verification-100.png" />
    				    </div>
    				    <h5 align="center" class="mt-2 mobile_view_chi_text">Biometric Attendance App</h5>
    				    <p align="center" class="mobile_view_chi_des">
    				       Ensure accurate attendance tracking with the EduMESS biometric app. Easily monitor student and staff presence, enhancing security and accountability within the school.
    				    </p>
    				</div>
				    <div class="col-6 col-md-3 col-lg-3 col-sm-6" style="margin-top: 70px;">
    				    <div align="center">
    				        <img class="mobile_view_img" src="<?php echo $defaultUrl;?>assets/images/website_images/icons8-bullet-camera-100.png" />
    				    </div>
    				    <h5 align="center" class="mt-2 mobile_view_chi_text">Class Monitoring</h5>
    				    <p align="center" class="mobile_view_chi_des">
    				      Keep an eye on classroom activities with real-time insights. EduMESS helps teachers and administrators monitor class schedules, lesson progress, and student engagement.
    				    </p>
    				</div>
    				
    				<div class="col-6 col-md-3 col-lg-3 col-sm-6" style="margin-top: 70px;">
    				    <div align="center">
    				        <img class="mobile_view_img" src="<?php echo $defaultUrl;?>assets/images/website_images/icons8-payroll-100.png" />
    				    </div>
    				    <h5 align="center" class="mt-2 mobile_view_chi_text">Staff Payroll</h5>
    				    <p align="center" class="mobile_view_chi_des">Simplify payroll management for school staff. EduMESS automates salary calculations, deductions, and tax management, ensuring timely and accurate payroll processing. </p>
    				    
    				</div>
				    <div class="col-6 col-md-3 col-lg-3 col-sm-6" style="margin-top: 70px;">
    				     <div align="center">
    				        <img class="mobile_view_img" src="<?php echo $defaultUrl;?>assets/images/website_images/icons8-wallet-100.png" />
    				    </div>
    				    <h5 align="center" class="mt-1 mobile_view_chi_text">Wallet</h5>
    				    <p align="center" class="mobile_view_chi_des">
    				       Enable cashless transactions with the EduMESS wallet. Parents, students, and staff can manage school-related payments and transactions in a secure and convenient digital environment.
    				    </p>
    				</div> 
				    <div class="col-6 col-md-3 col-lg-3 col-sm-6" style="margin-top: 70px;">
    				     <div align="center">
    				        <img class="mobile_view_img" src="<?php echo $defaultUrl;?>assets/images/website_images/icons8-e-learning-100.png" />
    				    </div>
    				    <h5 align="center" class="mt-2 mobile_view_chi_text">E-learning</h5>
    				    <p align="center" class="mobile_view_chi_des">
    				       Support blended learning with EduMESS's e-learning module. Create, deliver, and track online lessons, assignments, and assessments, enhancing the digital learning experience for students.
    				    </p>
    				</div>
				    <div class="col-6 col-md-3 col-lg-3 col-sm-6" style="margin-top: 70px;">
    				    <div align="center">
    				        <img class="mobile_view_img" src="<?php echo $defaultUrl;?>assets/images/website_images/icons8-new-ticket-100.png" />
    				    </div>
    				    <h5 align="center" class="mt-2 mobile_view_chi_text">Admission Management</h5>
    				    <p align="center" class="mobile_view_chi_des">
    				      Simplify the student admission process. EduMESS streamlines application submissions, reviews, and enrollments, making it easy to manage the entire admission cycle efficiently.
    				    </p>
    				</div>
				</div>
			
			</div>
			
			
		</div>	

		<div class="container-fluid" style="background-color:#f7fafc; margin-top: 200px;">
			
			<!-- advantages -->
			<div class="container pt-5">
				<div class="row">
					<div class="col-md-12 col-lg-2">
						
					</div>
					<div class="col-md-12 col-lg-8" align="center" style="font-size:40px;font-weight:700;">
						<?php echo $k12_page_advantage_head; ?>
					</div>
					<div class="col-md-12 col-lg-2">
						
					</div>
				</div>
			</div>

			<div class="container" style="width:88%;">
				<div class="row justify-content-center g-4 pb-5">
					<div class="col-lg-4 col-md-12 mt-3">
						<div class="card mt-5 mb-3 p-4 shadow-sm" align="left" style="border-radius: 15px;border:none;border-top: 4px solid #0cb800;color:#3A3A3A;">
							<span>
								<i class="fa fa-money fs-4" style="color:#007bff;"></i>
							</span>
							<span class="fs-5 mt-3" style="font-weight: 600;">
								 <?php echo $k12_page_title_bold1; ?>
							</span>
							<span class="mt-3">
								<small class="fs-6 fw-light">
									<?php echo $k12_page_descr_txt1; ?>
								</small>
							</span>
						</div>
					</div>

					<div class="col-lg-4 col-md-12 mt-3">
						<div class="card mt-5 mb-3 p-4 shadow-sm" align="left" style="border-radius: 15px;border: none;">
							<span>
								<i class="fa fa-credit-card fs-4" style="color: #007bff;"></i>
							</span>
							<span class="fs-5 mt-3" style="font-weight: 600;">
								<?php echo $k12_page_title_bold2; ?>
							</span>
							<span class="mt-3 pb-1">
								<small class="fs-6 fw-light">
									<?php echo $k12_page_descr_txt2; ?>
								</small>
							</span>
						</div>
					</div>

					<div class="col-lg-4 col-md-12 mt-3">
						<div class="card mt-5 mb-3 p-4 shadow-sm" align="left" style="border-radius: 15px;border: none;border-top: 4px solid #f2ba02;color:#3A3A3A;">
							<span>
								<i class="fa fa-check-circle fs-4" style="color:#007bff;"></i>
							</span>
							<span class="fs-5 mt-3" style="font-weight: 600;">
								<?php echo $k12_page_title_bold3; ?>
							</span>
							<span class="mt-3 pb-5">
								<small class="fs-6 fw-light">
									<?php echo $k12_page_descr_txt3; ?>
								</small>
							</span>
						</div>
					</div>

					<div class="col-lg-4 col-md-12 mt-3">
						<div class="card mb-3 p-4 shadow-sm" align="left" style="border-radius: 15px;border: none;">
							<span>
								<i class="fa fa-file fs-4" style="color: #007bff;"></i>
							</span>
							<span class="fs-5 mt-3" style="font-weight: 600;">
								<?php echo $k12_page_title_bold4; ?>
							</span>
							<span class="mt-3 pb-4">
								<small class="fs-6 fw-light">
									<?php echo $k12_page_descr_txt4; ?>
								</small>
							</span>
						</div>
					</div>

					<div class="col-lg-4 col-md-12 mt-3">
						<div class="card mb-3 p-4 shadow-sm" align="left" style="border-radius: 15px;border: none;border-top: 4px solid #007bff;color:#3A3A3A;">
							<span>
								<i class="fa fa-smile-o fs-4" style="color:#007bff;"></i>
							</span>
							<span class="mt-3">
								<small class="fs-6 fw-normal">
									 <?php echo $k12_page_descr_txt5; ?>
								</small>
							</span>
						</div>
					</div>

					<div class="col-lg-4 col-md-12 mt-3">
						<div class="card mb-3 p-4 shadow-sm" align="left" style="border-radius: 15px;border: none;">
							<span>
								<i class="fa fa-shield fs-4" style="color: #007bff;"></i>
							</span>
							<span class="fs-5 mt-3" style="font-weight: 600;">
								 <?php echo $k12_page_title_bold5; ?>
							</span>
							<span class="mt-3 pb-3">
								<small class="fs-6 fw-light">
									  <?php echo $k12_page_descr_txt6; ?>
								</small>
							</span>
						</div>
					</div>

					
				</div>
			</div>
		</div>
		
		<!-- Statistics -->
		<?php include('includes/statistics.php'); ?>

		<!-- Testimonials -->
		<?php include('includes/testimonials2.php'); ?>
		
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
		
		<!-- Franchise -->
		<div class="container-fluid" style="width:92%;margin-top: 13%;">
			<div class="row"
				style="margin-top:100px; background: linear-gradient(90deg, rgba(0,123,255,1) 35%, rgba(2,107,219,1) 100%, rgba(0,212,255,1) 100%);border-radius:15px;">
				<div class="col-md-12 col-lg-6" style="font-size:15px;color:#3A3A3A;margin-top:12px;">
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="row">
								<div class="col-12 ps-sm-5 pt-5">
									<small style="font-size:16px; font-family: 'Poppins', sans-serif; font-weight:550;color:#fff;">
										See EduMESS in Action
									</small>
								</div>
							</div>

							<div class="row franchise">
								<div class="col-12 ps-sm-5 pt-5 franchise-text">
									<h4 style="color:#eff5fd; font-family: 'Poppins', sans-serif;">
										 Get a Personalized Demo Today !!!
									</h4>
									<p class="animate-text-second">
										<span style="color:#fff;">
											 Curious to see how EduMESS can transform your school management? Let us show you!
										</span>
										<span style="color:#fff;">
											Our free, no-obligation demo gives you a sneak peek into how our software can improve your school's day-to-day operations.
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
										style="border: 2px solid #007bff;color:white; font-family: 'Poppins', sans-serif;border-radius: 8px;padding: 10px 15px 10px 15px;font-weight: 500;font-size:14px;background: #fff;color:#007bff;">
										<span>
											 Schedule Your Free Demo !!!
										</span>
									</a>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-lg-6" align="center">
					<img class="img-fluid d-none d-sm-block d-md-block d-xm-block p-0"
						src="assets/images/website_images/mainCTA1.png"
						style="width: 100%;" />
				</div>
			</div>

		</div>


		<!-- Download App -->
		<?php include('includes/download-app-section-for-other-page.php'); ?>

		
		<!-- Footer -->
		<?php include('includes/website-footer.php'); ?>
		
		
			
		  
	</section>
	
	<script>
        // Wait until the DOM is fully loaded
        document.addEventListener('DOMContentLoaded', function () {
            // Select the modal element
            var onLoadModal = document.getElementById('onLoadModal');

            // Create a new Bootstrap modal instance
            var myModal = new bootstrap.Modal(onLoadModal, {
                backdrop: 'static', // Prevent closing by clicking outside
                keyboard: false     // Prevent closing with Escape key
            });

            // Show the modal on load
            myModal.show();

            // Attach event listener to custom close button in the header
            document.getElementById('customCloseButton').addEventListener('click', function () {
                myModal.hide(); // Hides the modal
            });

            // Attach event listener to custom close button in the footer
            document.getElementById('customFooterClose').addEventListener('click', function () {
                myModal.hide(); // Hides the modal
            });
        });
        
        
    </script>
	
	 <script>
    // Automatically play video when modal is opened
    const videoModal = document.getElementById('videoModal');
    const testimonialVideo = document.getElementById('testimonialVideo');

    videoModal.addEventListener('shown.bs.modal', () => {
      testimonialVideo.src += "?autoplay=1";
    });

    videoModal.addEventListener('hide.bs.modal', () => {
      testimonialVideo.src = testimonialVideo.src.replace("?autoplay=1", "");
    });
    
    
    
    
    //modal 2
    // Automatically play video when modal is opened
    const videoModal = document.getElementById('videoModal2');
    const testimonialVideo = document.getElementById('testimonialVideo2');

    videoModal.addEventListener('shown.bs.modal', () => {
      testimonialVideo.src += "?autoplay=1";
    });

    videoModal.addEventListener('hide.bs.modal', () => {
      testimonialVideo.src = testimonialVideo.src.replace("?autoplay=1", "");
    });
    
    
    //modal 3
    const videoModal = document.getElementById('videoModal3');
    const testimonialVideo = document.getElementById('testimonialVideo3');

    videoModal.addEventListener('shown.bs.modal', () => {
      testimonialVideo.src += "?autoplay=1";
    });

    videoModal.addEventListener('hide.bs.modal', () => {
      testimonialVideo.src = testimonialVideo.src.replace("?autoplay=1", "");
    });
    
  </script>
  
  
   


	<!-- jquery link -->
	<script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

	<!-- Bootstrap JavaScript -->
	<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- web js -->
	<script src="js/website_js/script.js"></script>

	<!-- Swiper JS -->
	<script src="js/website_js/swiper-bundle.min.js"></script>
	
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>