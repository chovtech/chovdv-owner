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
	<title>EduMESS | <?php  echo $website_navbar_policy_page_header; ?></title>
	
	<!-- FAVICON -->
	<link rel="shortcut icon" href="<?php echo $defaultUrl; ?>assets/images/website_images/favicon.png"
		type="image/x-icon">

	<link href="<?php echo $defaultUrl; ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- font awesome cn -->
	<link rel="stylesheet" href="<?php echo $defaultUrl; ?>assets/plugins/font_awesome/css/font-awesome.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

	<style>
		
		.loginbtn-terms:hover{
              border-bottom:2px solid black;
		}
	
		
		.navbar-brandimg {
			width: 205px;
			padding: 0.4%;
			margin-left: 6%;
		}


		@media screen and (max-width: 767px) {
			
			.navbar-brandimg {
				width: 30%;
				margin-left: 0%;
			}

			
		}

		@media only screen and (min-width: 768px) and (max-width:912px) {
		

			.navbar-brandimg {
				width: 30%;
				margin-left: 0%;
			}

		
		}
	</style>



</head>

<body style="overflow-y:visible;">
	<!--======================== HTML CONTENT===================== -->
	<section>
		<nav class="navbar navbar-expand-lg navbar-light " style="border-top:1px solid #d6d4d0;border-bottom:1px solid #d6d4d0;">
			<div class="container-fluid">
					<!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0 ml-5" > -->
						<li class="nav-item" style="margin-left:9%;list-style-type:none;" >
						   <!--<img class="navbar-brandimg img-fluid" src="../assets/images/website_images/favicon-logo.png" />-->
						     <img class="navbar-brandimg img-fluid" src="../assets/images/website_images/edumes-blue.png" />
						    
						</li>
					<!-- </ul> -->

					<form class="d-flex mr-5" style="margin-right:9%;">
						<li class="nav-item loginbtn-terms" style="list-style-type:none;">
								<a class="nav-link" href=""  style="cursor:pointer;color:gray;font-size:15px;">hello@edumess.com</a>
						</li>
						<li class="nav-item" style="float:right;list-style-type:none;">
								<a class="nav-link loginbtn-terms"  style="cursor:pointer;color:gray;font-size:15px;"  href="../sign-in/?lang=<?php echo $lang;?>"><?php echo $website_navbar_policy_login; ?></a>
						</li>
       				</form>
			</div>
		</nav>
	</section>

	<br></br>
	<!-- TERMS & PRIVACY
			============================================= -->
			<section id="terms-page" class="bg-snow wide-70 inner-page-hero terms-section division">
				<div class="container">

					<!-- Title -->
					<h3 class="h3-xs" style="margin-left:9%;">Privacy Policy</h3>
					
					<!-- TERMS CONTENT -->
					<div class="row justify-content-center">	
						<div class="col-lg-10">

							
							
							<!-- TERMS BOX -->
							<div class="terms-box">

								<!-- Text -->
								<p class="p-lg">
									<?php  echo $website_policy_one_des_one; ?>
								</p>

							</div>	<!-- END TERMS BOX -->


							<!-- TERMS BOX -->
							<div class="terms-box">

								<!-- Title -->
								<h5 class="h5-xl"> <?php  echo  $website_policy_title_one; ?></h5>
								
								<!-- Text -->
								<p class="p-lg">
								          <?php  echo  $website_policy_two_des_one; ?>
								</p>

								<!-- Text -->
								<p class="p-lg">
								         <?php  echo $website_policy_two_des_one;  ?> 
								</p>

							</div>	<!-- END TERMS BOX -->


							<!-- TERMS BOX -->
							<div class="terms-box">

								<!-- Title -->
								<h5 class="h5-xl"><?php echo $website_policy_title_two; ?></h5>
								
								<!-- Text -->  
								<p class="p-lg">
								     <?php echo  $website_policy_three_des_one; ?>
								</p>
								
								<!-- List -->
								<ul class="simple-list">
									
									<li class="list-item">
										<p class="p-lg">
										<?php echo  $website_policy_three_des_two;?>
										</p>
									</li>

									<li class="list-item">
										<p class="p-lg">
										     <?php echo $website_policy_three_des_three; ?>
										</p>
									</li>

									<li class="list-item">
										<p class="p-lg">
										    
										</p><?php echo $website_policy_three_des_four; ?>
									</li>

									<li class="list-item">
										<p class="p-lg">
										<?php 
										           echo $website_policy_three_des_five; 
												   
										 ?>
											
										</p>
									</li>
									
									<li class="list-item">
										<p class="p-lg">
										<?php
											echo $website_policy_three_des_six;
										?>	
										</p>
									</li>
									
									<li class="list-item">
										<p class="p-lg">
										      <?php
										           echo $website_policy_three_des_seven;
											   ?>	
										</p>
									</li>
								  	
								</ul>

							</div>	<!-- END TERMS BOX -->


							<!-- TERMS BOX #3 -->
							<div class="terms-box">

								<!-- Title -->
								<h5 class="h5-xl">
									<?php
										echo $website_policy_title_three;
									?>		
								</h5>
							
								<!-- Text -->
								<p class="p-lg">
 									<?php
								        echo $website_policy_three_des_one;
									?>
								</p>

								<!-- Text -->  
								<p class="p-lg">

								     <?php
								        echo  $website_policy_three_des_two;
									  ?>
								</p>	
								
								<!-- List -->
								<ul class="simple-list">
									
									<li class="list-item">
										<p class="p-lg">
										<?php
										     echo $website_policy_three_des_three;
										 ?>	
										</p>
									</li>

									<li class="list-item">
										<p class="p-lg">
											<?php
										        echo $website_policy_three_des_four;
										   	?>	
										</p>
									</li>

									<li class="list-item">
										<p class="p-lg">
											<?php echo $website_policy_three_des_five; ?>
										</p>
									</li>
								  	
								</ul>

							</div>	<!-- END TERMS BOX -->


							<!-- TERMS BOX -->
							<div class="terms-box">

								<!-- Title -->
								<h5 class="h5-xl"><?php echo $website_policy_title_four; ?></h5>
							
								<!-- Text -->
								<p class="p-lg">
									<?php echo $website_policy_four_des_one; ?>
								</p>
								
								<p class="p-lg">
								    <?php echo $website_policy_four_des_two; ?>
									
								</p>

							</div>	<!-- END TERMS BOX -->


							<!-- TERMS BOX #5 -->
							<div class="terms-box">

								<!-- Title -->
								<h5 class="h5-xl">
								
								    <?php echo $website_policy_title_five; ?>

								</h5>
							
								<!-- Text -->
								<p class="p-lg">
								      <?php echo $website_policy_five_des_one; ?>
									
								</p>
								
								<p class="p-lg">
								      <?php echo $website_policy_five_des_two; ?>
									
								</p>

							</div>	<!-- END TERMS BOX -->


							<!-- TERMS BOX -->
							<div class="terms-box">

								<!-- Title -->
								<h5 class="h5-xl">
								    <?php echo $website_policy_title_six; ?>
								</h5>

								<!-- List -->	
								<ul class="simple-list">

									<li class="list-item">
										<p class="p-lg"><span class="txt-500">
										   <?php echo  $website_policy_title_seven ; ?>
											
										</span></p>
										
										<p class="p-lg">
										<?php echo   $website_policy_seven_des_one ; ?>
											
										</p>
									</li>

									<li class="list-item">
										<p class="p-lg"><span class="txt-500">
										   <?php echo   $website_policy_title_eight ; ?>
											
										</span> </p>
										
										<p class="p-lg">
										<?php echo $website_policy_eight_des_one ; ?>
										</p>
									</li>

									<li class="list-item">
										<p class="p-lg"><span class="txt-500"><?php echo $website_policy_title_nine; ?></span></p>
										
										<p class="p-lg">
									         	<?php echo $website_policy_nine_des_one;?>
										</p>
										
										<ul class="simple-list">
									
        									<li class="list-item">
        										<p class="p-lg">
												<?php
													echo $website_policy_nine_des_two;
												?>
        										</p>
        									</li>
        
        									<li class="list-item">
        										<p class="p-lg">
													<?php
														echo $website_policy_nine_des_three;
													?>
													
        										</p>
        									</li>
        
        									<li class="list-item">
        										<p class="p-lg">
													 <?php echo  $website_policy_nine_des_four ; ?>
        										</p>
        									</li>
        								  	
        								</ul>
									</li>

								</ul>

							</div>	<!-- END TERMS BOX -->


							<!-- TERMS BOX -->
							<div class="terms-box">

								<!-- Title -->
								<h5 class="h5-xl"><?php echo $website_policy_title_ten;?></h5>

								<!-- Text -->
								<p class="p-lg">
								       <?php echo $website_policy_ten_des_one;?>
									
								</p>

								<!-- Text -->
								<p class="p-lg">
									<?Php echo $website_policy_ten_des_two; ?>
								</p>								

							</div>	<!-- END TERMS BOX -->



						</div>	<!-- END TERMS CONTENT -->


					</div>     <!-- End row -->		
				</div>	    <!-- End container -->
			</section>	 <!-- END TERMS & PRIVACY -->


	<!--======================== HTML CONTENT===================== -->

	<!-- EXTERNAL SCRIPTS============================================= -->
	<script src="../assets/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap tether Core JavaScript -->
	<script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
	<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>