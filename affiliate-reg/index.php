<?php
        include('../controller/config/config.php');
        
        
        @$langold = $_GET['lang'];
        
        if($langold == '' || $langold == NULL || $langold == 'undefined' || $langold == 'null')
        {
        	$lang = 'english';
        	
        }
        else{
        	$lang = $_GET['lang'];
        	
        }
        
        include ('../lang/'.$lang.'.php'); 



         
         @$consultant_uname = $_GET['ref'];
        
        if ($consultant_uname == '') {
        
                $select_comany = "SELECT * FROM `userlogin` WHERE UserType='affiliate' AND UserRegNumberOrUsername='edumessinc@gmail.com'";
                $select_company_result = mysqli_query($link, $select_comany);
                $select_company_result_cnt = mysqli_num_rows($select_company_result);
                $select_company_result_cnt_row = mysqli_fetch_assoc($select_company_result);
                
                
                if($select_company_result_cnt > 0)
                {
                	$consultant_id = $select_company_result_cnt_row['UserID'];
                }else{
                	$consultant_id = '';
                }
        
        
        
        } else {
            
            
                $select_aff = "SELECT * FROM `affiliate` WHERE referral_code='$consultant_uname'";
                $select_aff_result = mysqli_query($link, $select_aff);
                $select_aff_result_cnt = mysqli_num_rows($select_aff_result);
                $select_aff_result_cnt_row = mysqli_fetch_assoc($select_aff_result);
                
                
                if($select_aff_result_cnt > 0)
                {
                	$consultant_id = $select_aff_result_cnt_row['AffiliateID'];
                }else{
                	$consultant_id = '';
                }
            
        	
        }



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="author" content="EduMESS" />
	<meta name="description"
		content="EduMESS (Education Management and E-Learning Software Solution) is a leading school management, automation and elearning solution. Since its launch, EduMESS has grown to become a leader. Our clients say that the simplicity of our interface, ease of use, cost effectiveness and excellent customer care is the reason they prefare EduMESS. We have watched schools move from softwares they are using to EduMESS." />
	<meta name="keywords"
		content="Best, School, Management, Best School, Best School Management, Best School Management Software, Free School Management Software, Portal, School Owner, Group of School Owner, Consultants, Brand Promoters | School Portal Generator ">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Title Page-->
    <title>Affiliate Registration</title>

    <!-- FAVICON -->
	<link rel="shortcut icon" href="../assets/images/website_images/favicon.png"
		type="image/x-icon">

		<!-- jquery link -->
	<script src="../assets/plugins/jquery/jquery.min.js"></script>

	<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	<!-- website css -->
	<link rel="stylesheet" href="../css/website_css/website_css.css">


    	<!-- Boxicons CSS -->
	<link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <link href="../assets/plugins/numberformat/intlTelInput.min.css"
        rel="stylesheet" />
    <script src="../assets/plugins/numberformat/intlTelInput.min.js"></script>

    <link href="../assets/plugins/notify/wnoty.css" rel="stylesheet">


    <style>


          
			.form-floating {
				position: relative;
			}
			.form-floating {
				position: relative;
			}

			.form-floating i {
				position: absolute;
				top: 50%;
				left: 10px; /* Adjust this based on your preferred icon position */
				transform: translateY(-50%);
				color: #7d8597;
				font-size: 18px;
			}

			.form-floating input {
				padding-left: 35px; /* Adjust this to match icon size */
				width: 100%; /* Ensure input takes full width */
			}

			@media (max-width: 820px) and (min-width: 576px) { 
				.form-floating i {
					font-size: 16px; /* Reduce icon size for tablets */
					left: -8px; /* Adjust icon position for tablet screens */
				}

				.form-floating input {
					padding-left: 38px; /* Adjust padding for tablet screens */
				}
			}

			@media (max-width: 576px) and (min-width: 320px) { 
				.form-floating i {
					font-size: 14px; /* Reduce icon size for smaller screens */
					left: -8px;  /* Adjust icon position for mobile screens */
				}

				.form-floating input {
					padding-left: 30px; /* Adjust padding for mobile screens */
				}
			}




            input[type="number"]::-webkit-inner-spin-button,
            input[type="number"]::-webkit-outer-spin-button {
              -webkit-appearance: none;
              margin: 0;
            }
            
            input[type="number"] {
              -moz-appearance: textfield;
            }
					
			.chi-testimonial-container {
				border-radius: 15px;
				left: 6%;
				margin: 40px;
				background-color: #0057B7;
				padding: 20px 30px;
				color: white;
				/* z-index: 200; */
			}

			.fa-quote {
			color: rgba(255, 255, 255, 0.3);
			font-size: 20px;
			position: absolute;
			top: 30px;
			}

			.fa-quote-left {
			left: 25px;
			}

			.fa-quote-right {
			right: 25px;
			} 

			.renxtestimonial {
			font-size: 13px;
			font-weight: 300;
			}

			.chi-user {
			display: flex;
			align-items: center;
			justify-content: left;
			}

			.chi-user .renz_user-image {
			border-radius: 20%;
			height: 40px;
			width: 40px;
			object-fit: cover;
			}

			.chi-user .renz_user-details {
			margin-left: 10px;
			}

			.chi-user .lausername {
				font-weight: 500;
				font-size: 14px;
				margin-top: 15px;
			}

			.chi-user .larole {
			margin-top: -15px;
			font-weight: lighter;
			font-size: 12px;
			
			}

			.chi-progress-bar {
			background-color: #add7f6;
			height: 4px;
			width: 100%;
			animation: grow 10s linear infinite;
			transform-origin: left;
			}

			@keyframes grow {
			0% {
				transform: scaleX(0);
			}
			}

			@media (max-width: 768px) {
			.chi-testimonial-container {
				padding: 20px 30px;
			}

			.fa-quote {
				display: none;
			}
			}

		.chi_ain{
		    font-weight: 700;
				inline-size: 400px;
				overflow-wrap: break-word;
				hyphens: manual;
			}

		@media screen and (max-width: 767px) {
			.chi-formbody {
				margin: 20px 5px 0 5px !important;
			}
			.chiFormLogo{
				display: flex !important;
			}				
		
		}
		@media screen and (max-width: 800px) {
			.googletxt{
				font-size: 12px !important;
			}
					
		
		}
		@media screen and (max-width: 1200px) and (max-width:912px) {
			.chi-formbody {
				margin: 20px 10px 0 10px !important;
			}
			.des_txtx{
				inline-size: 280px;
				overflow-wrap: break-word;
				hyphens: manual;
			}
			.chi_ain{
				inline-size: 320px;
				overflow-wrap: break-word;
				hyphens: manual;
			}
			
		
		}


		@media screen and (max-width: 600px) {
		
			.chi_ain{
				margin: 20px 5px 0 -15px !important;
				inline-size: 280px;
				overflow-wrap: break-word;
				hyphens: manual;
			}
			
		
		}

		@media screen and (max-width: 1024px) {
			.chi-formbody {
				margin: 20px 10px 0 10px !important;
			}
			.chi_ain{
				margin: 0px 5px 0 10px !important;
				font-size: 30px !important;
				inline-size: 320px;
				overflow-wrap: break-word;
				hyphens: manual;
			}
			
		
		}
		
		
		
		
	 .tiny-rolebox {
      font-family: sans-serif;
      max-width: 340px;
      font-size: 10px;
    }

    .tiny-rolebox-options {
      display: flex;
      gap: 0.3rem;
    }

    .tiny-rolebox-card {
      position: relative;
      flex: 1;
      border: 1px solid #0076c0;
      border-radius: 3px;
      background: #f1f9ff;
      padding: 0.3rem 0.4rem;
      cursor: pointer;
      display: flex;
      align-items: flex-start;
      gap: 0.3rem;
      transition: 0.2s;
    }

    .tiny-rolebox-card:hover {
      background: #e3f3ff;
    }

    .tiny-rolebox-card input {
      display: none;
    }

    .tiny-rolebox-icon {
      font-size: 12px;
      color: #0076c0;
      margin-top: 0.1rem;
    }

    .tiny-rolebox-info {
      flex-grow: 1;
    }

    .tiny-rolebox-title {
      font-weight: 600;
      margin-bottom: 1px;
    }

    .tiny-rolebox-desc {
      font-size: 9px;
      color: #444;
    }

    .tiny-rolebox-check {
      display: none;
      position: absolute;
      top: 2px;
      right: 4px;
      font-size: 9px;
      color: #0076c0;
    }

    .tiny-rolebox-card:has(input:checked) {
      background: #cbe7ff;
    }

    .tiny-rolebox-card:has(input:checked) .tiny-rolebox-check {
      display: block;
    }

	button.animated {
    animation: bounce 1.5s infinite;
    -webkit-animation: bounce 1.5s infinite;
		}

		@keyframes bounce {
			0%, 100% { transform: translateY(0); }
			50% { transform: translateY(-5px); }
		}

		button.stopped {
			animation: none;
		}

		.is-valid {
    border-color: #28a745 !important;
}

.is-invalid {
    border-color: #dc3545 !important;
}


    </style>


    
</head>

<body>




<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 col-md-6 col-lg-4 d-none d-sm-block  d-xm-block d-md-block" >
				<div style="background-color: #007bff; height: 97vh; margin: 10px 0 0 0px; border-radius: 15px;">
					
					<div style="padding: 50px 20px 50px; display: flex;">
						<img src="../assets/images/white-favicon.png" width="23" height="23" alt="">
						<h5 style="color: white; font-weight: 600;">EduMESS</h5>
					</div>
				
					<div class="chi_ain" style="padding: 0px 50px 20px 30px;" >


					    <div id="carouselHero" class="carousel slide " data-ride="carousel">
                             <div class="carousel-inner">
                        
									<!-- <div class="carousel-item active">
                                        <img src="img4.png" class="d-block w-100" style="max-height:300px;" alt="Image Description">
                                        
                                    </div> -->
								</div>
						</div>
                        
                       
					</div>

					<!-- <p class="des_txtx" style="color:#e9ecef; font-size: 14px; font-weight: 200; margin-top: 23%; margin-left: 30px;">
						Sign up now and let your school be equipped<br> with one of the best school management <br> software in Africa.
					</p>
						 -->
					<div class="chi-testimonial-container">
														
							<p class="renxtestimonial">
						       	EduMESS has made affiliate marketing easy and rewarding. I’m glad to be part of it.
							</p>
							<div class="chi-user">
								<img src="../assets/images/website_images/team-cmo.png" alt="user" class="renz_user-image">
								<div class="renz_user-details">
									<p class="lausername">Mr Abang Emmanuel</p>
									<p class="larole">Affiliate, EduMESS</p>
								</div>
							</div>
							<div class="chi-progress-bar"></div>
					</div>
					
				
				</div>
			</div>

			<div class="col-sm-8 col-md-6 col-lg-8">
		    	<div class="chiFormLogo" style="float: right; margin-top: 10px; display: none;">
					<img src="../assets/images/website_images/edumes-blue.png" width="110" alt="">
				</div>
				<div style="margin: 40px;">
					<h2 style="font-weight: 500; color: #555;">Sign Up As Affiliate</h2>
					<p style="color:#92929D;font-size:13px;" id="signin">
							<?php echo $website_signup_havaccount; ?> <a href="../sign-in"> <?php echo $website_signup_signlink; ?> </a>
					</p>
					<div>
					    
					</div>
				</div>
				<div class="chi-formbody" style="margin: 40px 140px 0 40px;">  
					<div class="row">
                    <div class="col-6">
                  <div class="form-floating mb-3 fnamevalidate position-relative">
                     <!-- <span style="position: absolute; left: 88%; color: #7d8597; margin-top: 17px;">
                     <i class="fa fa-user" aria-hidden="true" style="font-size: 13px;"></i>
                     </span> -->
                     <input 
                        type="text" 
                        style="height: auto; max-height: 40px;  box-shadow: 0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border: none; border-radius: 6px;" 
                        class="form-control form-control-sm" 
                        id="firstname" 
                        placeholder="<?php echo $website_signup_firstname; ?>"
                        >
                     <label 
                        for="floatingInput" 
                        style="color: #555; margin-top: -8px; font-size: 11px; font-weight: 500;  ">
                     <?php echo $website_signup_firstname; ?><span style="color:orangered;">*</span>
                     </label>
                  </div>
               </div>
               <div class="col-6">
                  <div class="form-floating mb-3 secondnamevalidate position-relative">
                     <!-- <span style="position: absolute; left: 88%; color: #7d8597; margin-top: 17px;"><i class="fa fa-1x fa-user" aria-hidden="true" style="font-size: 13px;"></i></span> -->
                     <input type="text" style="height: auto; max-height: 40px; box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border: none; border-radius: 6px;"
					  class="form-control form-control-sm" id="lastname"
					   placeholder="<?php echo $website_signup_lastname; ?>">
                     <label for="floatingInput" style="color: #555; font-size: 11px; font-weight: 500;">
						<?php echo $website_signup_lastname; ?><span style="color:orangered;">*</span>
					</label>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="form-floating mb-3 emailvalidate position-relative">
                     <!-- <span style="position: absolute; left: 94%; color: #7d8597; margin-top: 17px;"><i class="fa fa-1x fa-envelope" aria-hidden="true" style="font-size: 13px;"></i></span> -->
                     <input type="email"  
					 style="height: auto; max-height: 40px; box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border: none; border-radius: 6px;" class="form-control form-control-sm"
					  id="email" placeholder="<?php echo $website_signup_email; ?>">
                     <label for="floatingInput"
					  style="color: #555; margin-top: 2px; font-size: 11px; font-weight: 500;">
					  <?php echo $website_signup_email; ?><span style="color:orangered;">*</span> 
					</label>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="form-floating mb-3 phonevalidate position-relative">
                     <!-- <span style="position: absolute; left: 94%; color: #7d8597; margin-top: 17px;z-index:6;"><i class="fa fa-1x fa-phone" aria-hidden="true" style="font-size: 13px;"></i></span> -->
                     <input type="number"
					  style="height: auto; max-height: 50px; box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border: none; border-radius: 6px;" class="form-control prosload_phone" 
					   id="Phone" placeholder="<?php echo $website_signup_num; ?>" name="phonenum[main]">
                     <label for="floatingInput"  style="color: #555; font-size: 11px; font-weight: 500;"></label>
                  </div>
               </div>
               <div class="col-12">
                  <div class="form-floating mb-3 passwordvalidate position-relative">
                     <span class=""
					  style="position: absolute; left: 94%; color: #7d8597; margin-top: 17px;cursor:pointer;">
					  <i class="fa fa-1x fa-eye viewpassresestsignup" aria-hidden="true" style="font-size: 13px;"></i></span>
                     <input type="password"
					   style="height: auto; max-height: 40px; box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border: none; border-radius: 6px;"
					    class="form-control form-control-sm signuppassword" id="password" placeholder="<?php echo $website_signup_password; ?>">
                     <label for="floatingInput" style="color: #555; font-size: 11px; font-weight: 500;"><?php echo $website_signup_password; ?><span style="color:orangered;">*</span></label>
                  </div>
                  <small class="help-block" id="password-text"></small>
               </div>


                        <div class="col-lg-4 mb-3 ">
                            <!--<label for="signup_usertype_main" style="color: #555; margin-bottom: 5px; font-size: 12px; font-weight: 500;">-->
                            <!--Sign up as-->
                            <!--</label>-->
                            <select
                                style="height: 40px; box-shadow: 0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border: none; border-radius: 6px;"
                                class="form-select form-select-sm pros-franchise-country"
                               
                                >
                                <option value="" disabled selected>--  Country --</option>
									
								<?php
										$pros_get_country = mysqli_query($link,"SELECT * FROM 
										`franchiseregion` INNER JOIN `countries` ON `franchiseregion`.`CountryID` = 
										 `countries`.`countryID` 
										GROUP BY `franchiseregion`.`CountryID`
										 ORDER BY `countries`.`CountryName` ASC");
										$pros_get_country_cnt_row = mysqli_fetch_assoc($pros_get_country);
										$pros_get_country_cnt = mysqli_num_rows($pros_get_country);

										if($pros_get_country_cnt > 0)
										{
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

                        <div class="col-lg-4 mb-3 ">
                            <!--<label for="signup_usertype_main" style="color: #555; margin-bottom: 5px; font-size: 12px; font-weight: 500;">-->
                            <!--Sign up as-->
                            <!--</label>-->
                            <select
                                style="height: 40px; box-shadow: 0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border: none; border-radius: 6px;"
                                class="form-select form-select-sm pros-franchiseregion"
                               
                                >
                                <option value="" disabled selected>-- Select Your Region--</option>
                                <!-- <option value="affiliate">Affiliate</option>
                                <option value="owner">School Owner</option> -->
                            </select>
                        </div>

                        <div class="col-lg-4 mb-3 ">
                            <!--<label for="signup_usertype_main" style="color: #555; margin-bottom: 5px; font-size: 12px; font-weight: 500;">-->
                            <!--Sign up as-->
                            <!--</label>-->
                            <select
                                style="height: 40px; box-shadow: 0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border: none; border-radius: 6px;"
                                class="form-select form-select-sm pros-load-locationhere"
                               
                                >
                                <option value="" disabled selected>--  Select Your Location -- </option>
                                <!-- <option value="affiliate">Affiliate</option>
                                <option value="owner">School Owner</option> -->
                            </select>
                        </div>

                    <div class="col-lg-12 mb-3">
                    <div class="form-floating mb-3">
                                <!-- <span style="position: absolute; left: 94%; color: #7d8597; margin-top: 15px;">
                                    <i class="fa fa-1x fa-edit" aria-hidden="true"></i>
                                </span> -->
                                <textarea class="form-control prosgroupof-textareacontrol prostelabout-yourself-input"
                                    style="height: 80px; box-shadow: 0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border: none; border-radius: 6px;"
                                    rows="3" id="aboutYourself" placeholder="Write about yourself..."></textarea>
                                <label for="aboutYourself" style="color: #555; margin-top: 2px; font-size: 11px; font-weight: 500;">Write about yourself <span style="color:orangered;">*</span></label>
                            </div>
                        </div>


                        <div class="col-lg-12 mb-3">
                    <div class="form-floating mb-3">
                                <!-- <span style="position: absolute; left: 94%; color: #7d8597; margin-top: 15px;">
                                    <i class="fa fa-1x fa-edit" aria-hidden="true"></i>
                                </span> -->
                                <textarea class="form-control prosgroupof-textareacontrol pros-how-youwant-market-edumess"
                                    style="height: 80px; box-shadow: 0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border: none; border-radius: 6px;"
                                    rows="3" id="tellusaboutyou_want_market" placeholder=""></textarea>
                                <label for="tellusaboutyou_want_market" style="color: #555; margin-top: 2px; font-size: 11px; font-weight: 500;">How do you intend to Sale EduMESS<span style="color:orangered;">*</span></label>
                            </div>
						
						<div class="col-12">
							<div align="center">
								<button class="btn btn-primary btn-lg animated" data-id="2" id="pros_signupaff_btn" type="button" style="padding: 12px; border-radius: 10px; font-size: 13px; width: 100%"><i class="fas fa-user-plus"></i> Register Now </button>
							</div>
						</div>
					</div>
					

					
					
					
				</div>
  			</div>
		</div>
	</div>






	
	<!-- Bootstrap JavaScript -->
	<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/plugins/notify/wnoty.js"></script>
	
	<!--web ui content -->
	<!-- <script src="../js/website_js/registration.js"></script> -->
	<!--web ui content -->
	
	
	<?php include("../js/current_page.php"); ?>
	<!-- franchise application js here -->
	<?php include('../controller/js/website/pros-franchise-application.php'); ?>
	<?php include('../controller/js/affiliate/affiliate_regis.php'); ?>


	<script>
        const testimonialsContainer = document.querySelector(".testimonials-container");
            const testimonial = document.querySelector(".renxtestimonial");
            const userImage = document.querySelector(".renz_user-image");
            const username = document.querySelector(".lausername");
            const role = document.querySelector(".larole");

            const testimonials = [
                
                
                
          
				
				{
					name: "Pst. Godwin Umeh",
					position: "Affiliate, EduMESS",
					photo: "../assets/images/website_images/godwin.jpeg",
					text:
					"Being an EduMESS affiliate has been a great experience. The platform is truly impactful.",
				},
				{
					name: "Mr. Daniel Mbah",
					position: "Affiliate, EduMESS",
					photo: "../assets/images/website_images/daniel.jpeg",
					text:
					"EduMESS makes school management simpler. Proud to be an affiliate.",
				},
				{
					name: "Mr. Abang Emmanuel",
					position: "Affiliate, EduMESS",
					photo: "../assets/images/website_images/team-cmo.png",
					text: 
					"EduMESS has made affiliate marketing easy and rewarding. I’m glad to be part of it.",
				},

         
           
            ];

            let idx = 1;

            function updateTestimonial() {
            const { name, position, photo, text } = testimonials[idx];

            testimonial.innerHTML = text;
            userImage.src = photo;
            username.innerHTML = name;
            role.innerHTML = position;

            idx++;

            if (idx > testimonials.length - 1) {
                idx = 0;
            }
            }

            setInterval(updateTestimonial, 10000);
            
            
            
            
            // pause animation on button click
            const button = document.getElementById('pros_signupaff_btn');
            
            button.addEventListener('click', () => {
                button.classList.toggle('stopped');
            });

    </script>
   
</body>


</html>
<!-- end document-->