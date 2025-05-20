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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	<!-- website css -->
	<link rel="stylesheet" href="../css/website_css/website_css.css">


	<!-- Swiper CSS -->
	<link rel="stylesheet" href="../css/website_css/swiper-bundle.min.css" />

	<!-- CSS -->
	<link rel="stylesheet" href="../css/website_css/testimonial_style.css" />

	<!-- Boxicons CSS -->
	<link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<script src="https://accounts.google.com/gsi/client" async defer></script>
	<link href="../assets/plugins/numberformat/intlTelInput.min.css"
		rel="stylesheet" />
	<script src="../assets/plugins/numberformat/intlTelInput.min.js"></script>
	
	<link href="../assets/plugins/notify/wnoty.css" rel="stylesheet">

	
	<style>


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
						<p style="font-size: 35px;text-decoration: none;cursor: context-menu; color:#fff; margin-top: -20px; position: fixed;"><?php echo $website_signupbannetxtx;?> </p>
						<br>
						<a style="font-size: 35px;text-decoration: none;cursor: context-menu; color:#fff; position: fixed;" href="#" class="typewrite" data-period="3000"
							data-type='[ "<?php echo $website_signupbannetxtx1;?>", "" ]'>
							<span class="wrap"></span>
						</a>									
					</div>

					<p class="des_txtx" style="color:#e9ecef; font-size: 14px; font-weight: 200; margin-top: 23%; margin-left: 30px;">
						Sign up now and let your school be equipped<br> with one of the best school management <br> software in Africa.
					</p>
						
					<div class="chi-testimonial-container">
														
							<p class="renxtestimonial">
								Simply unbelievable! I am really satisfied with 
								this software. This Absolutely wonderful!
							</p>
							<div class="chi-user">
								<img src="../assets/images/website_images/p3.jpeg" alt="user" class="renz_user-image">
								<div class="renz_user-details">
									<p class="lausername">Mrs. Ify Eunice Okoli</p>
									<p class="larole">Proprietress, Deraline Seed of Faith School</p>
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
					<h2 style="font-weight: 700; color: #555;"><?php echo $website_signuptitle;?></h2>
					<p style="color:#92929D;font-size:13px;" id="signin">
							<?php echo $website_signup_havaccount; ?> <a href="../sign-in"> <?php echo $website_signup_signlink; ?> </a>
					</p>
					<div>
					    
					</div>
				</div>
				<div class="chi-formbody" style="margin: 40px 140px 0 40px;">  
					<div class="row">
						<div class="col-6">
							<div class="form-floating mb-3 fnamevalidate">
								<span style="position: absolute; left: 88%; color: #7d8597; margin-top: 15px;"><i class="fa fa-1x fa-user" aria-hidden="true"></i></span>
								<input type="text" style="height: 55px; box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border: none; border-radius: 6px;" class="form-control form-control-sm" id="firstname" placeholder="<?php echo $website_signup_firstname; ?>">
								<label for="floatingInput" style="color: #555; margin-top: 2px; font-size: 11px; font-weight: 500;"><?php echo $website_signup_firstname; ?> </label>
							</div>
						</div>
						<div class="col-6">
							<div class="form-floating mb-3 secondnamevalidate ">
							<span style="position: absolute; left: 88%; color: #7d8597; margin-top: 15px;"><i class="fa fa-1x fa-user" aria-hidden="true"></i></span>
								<input type="text" style="height: 55px; box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border: none; border-radius: 6px;" class="form-control form-control-sm" id="lastname" placeholder="<?php echo $website_signup_lastname; ?>">
								<label for="floatingInput" style="color: #555; font-size: 11px; font-weight: 500;"><?php echo $website_signup_lastname; ?></label>
							</div>
						</div>
						<div class="col-12">
							<div class="form-floating mb-3 emailvalidate">
								<span style="position: absolute; left: 94%; color: #7d8597; margin-top: 15px;"><i class="fa fa-1x fa-envelope" aria-hidden="true"></i></span>
								<input type="email"  style="height: 55px; box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border: none; border-radius: 6px;" class="form-control form-control-sm" id="email" placeholder="<?php echo $website_signup_email; ?>">
								<label for="floatingInput" style="color: #555; margin-top: 2px; font-size: 11px; font-weight: 500;"><?php echo $website_signup_email; ?> </label>
							</div>
						</div>
						<div class="col-12">
							<div class="form-floating mb-3 phonevalidate">
								<span style="position: absolute; left: 94%; color: #7d8597; margin-top: 15px;z-index:6;"><i class="fa fa-1x fa-phone" aria-hidden="true"></i></span>
								<input type="number" style="height: 55px; box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border: none; border-radius: 6px;" class="form-control form-control-sm"  id="Phone" placeholder="<?php echo $website_signup_num; ?>" name="phonenum[main]">
								<label for="floatingInput"  style="color: #555; font-size: 11px; font-weight: 500;"></span></label>
							</div>
						</div>
						<div class="col-12">
							<div class="form-floating mb-3 passwordvalidate">
							<span class="" style="position: absolute; left: 94%; color: #7d8597; margin-top: 15px;cursor:pointer;"><i class="fa fa-1x fa-eye viewpassresestsignup" aria-hidden="true"></i></span>
								<input type="password"  style="height: 55px; box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border: none; border-radius: 6px;" class="form-control form-control-sm signuppassword" id="password" placeholder="<?php echo $website_signup_password; ?>">
								<label for="floatingInput" style="color: #555; font-size: 11px; font-weight: 500;"><?php echo $website_signup_password; ?></label>
							</div>
							<small class="help-block" id="password-text"></small>
						</div>
						
						<div class="col-12">
							<div align="center">
								<button class="btn btn-primary btn-lg" data-id="2" id="signup-btn" type="button" style="padding: 12px; border-radius: 10px; font-size: 13px; width: 100%"><?php echo $website_signup_buttontitle; ?></button>
							</div>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-3">
							<hr>
						</div>
						<div class="col-auto">
							<?php echo $website_signup_orgoogletitle; ?>
						</div>
						<div class="col-3">
							<hr>
						</div>
					</div>

					<div class="row" align="center" id="googlegrid" data-id="1">
						<div class="col-lg-1 col-sm-1"></div>
						<div class="col-lg-10 col-sm-10">
							<div id="g_id_onload"
								data-client_id="298617862133-i2vv75kb2a18tacjuakc89n718pagp7v.apps.googleusercontent.com"
								data-context="signup" data-ux_mode="popup"  data-callback="Signupfunction"
								data-itp_support="true"></div>
							<div class="g_id_signin" data-type="standard" data-shape="pill" data-theme="outline"
								data-text="signup_with" data-size="large" data-logo_alignment="left"
								data-width="100% ~ 400px"></div>
						</div>
						<div class="col-lg-1 col-sm-1"></div>
                	</div>
					
					<div align="center" style="margin-top: 10px;">
						
						<p style="font-size:13px;color:#6c757d;"><?php echo $signupterms_one ; ?> <b>EduMESS</b> <a
								target="_blank" href="<?php echo $defaultUrl; ?>terms/?lang=<?php echo $lang; ?>"><?php echo $signupterms_two;?></a> <a
								target="_blank" href="<?php echo $defaultUrl; ?>privacy/?lang=<?php echo $lang; ?>"><?php echo $signupterms_three; ?></a> <?php echo $signupterms_four ?> 
						</p>
					</div>

				</div>
  			</div>
		</div>
	</div>
	
	<script>
        const testimonialsContainer = document.querySelector(".testimonials-container");
            const testimonial = document.querySelector(".renxtestimonial");
            const userImage = document.querySelector(".renz_user-image");
            const username = document.querySelector(".lausername");
            const role = document.querySelector(".larole");

            const testimonials = [
          
            {
                name: "Mrs. Elizabeth Ugiagbe",
                position: "Proprietress, Kingston Children School.",
                photo: "../assets/images/website_images/p2.jpeg",
                text:
				"This simply amazing! I am really satisfied with this software. it has really helped a lot in my school"
            },
            {
                name: "Mrs. C M Umeh (JP)",
                position: "Proprietress, Crown of Glory Schools.",
                photo: "../assets/images/website_images/p1.jpeg",
                text:
                "EduMESS took my school and management abilities from mediocrity to excellence, No more worries with EduMESS, I feel like a CEO."
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

    </script>
    
    <script>
        
        // Franchise top bana 
        var TxtType = function (el, toRotate, period) {
            this.toRotate = toRotate;
            this.el = el;
            this.loopNum = 0;
            this.period = parseInt(period, 10) || 2000;
            this.txt = '';
            this.tick();
            this.isDeleting = false;
        };
        
        TxtType.prototype.tick = function () {
            var i = this.loopNum % this.toRotate.length;
            var fullTxt = this.toRotate[i];
        
            if (this.isDeleting) {
                this.txt = fullTxt.substring(0, this.txt.length - 1);
            } else {
                this.txt = fullTxt.substring(0, this.txt.length + 1);
            }
        
            this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';
        
            var that = this;
            var delta = 200 - Math.random() * 100;
        
            if (this.isDeleting) { delta /= 2; }
        
            if (!this.isDeleting && this.txt === fullTxt) {
                delta = this.period;
                this.isDeleting = true;
            } else if (this.isDeleting && this.txt === '') {
                this.isDeleting = false;
                this.loopNum++;
                delta = 500;
            }
        
            setTimeout(function () {
                that.tick();
            }, delta);
        };
        
        window.onload = function () {
            var elements = document.getElementsByClassName('typewrite');
            for (var i = 0; i < elements.length; i++) {
                var toRotate = elements[i].getAttribute('data-type');
                var period = elements[i].getAttribute('data-period');
                if (toRotate) {
                    new TxtType(elements[i], JSON.parse(toRotate), period);
                }
            }
            // INJECT CSS
            var css = document.createElement("style");
            css.type = "text/css";
            css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
            document.body.appendChild(css);
        };
        
        // bana animated Text
        document.addEventListener("DOMContentLoaded", function () {
            const txts_sec = document.querySelector(".animate-text-second").children;
            const txtsLen_sec = txts_sec.length;
            let index_sec = 0;
            const textInTimer_sec = 3000;
            const textOutTimer_sec = 2800;
        
            function animateText_sec() {
                for (let i = 0; i < txtsLen_sec; i++) {
                    txts_sec[i].classList.remove("text-in_sec", "text-out_sec");
                }
                txts_sec[index_sec].classList.add("text-in_sec");
        
                setTimeout(function () {
                    txts_sec[index_sec].classList.add("text-out_sec");
                }, textOutTimer_sec);
        
                setTimeout(function () {
                    if (index_sec == txtsLen_sec - 1) {
                        index_sec = 0;
                    } else {
                        index_sec++;
                    }
                    animateText_sec();
                }, textInTimer_sec);
            }
        
            animateText_sec();
        
            const txts = document.querySelector(".animate-text").children;
            const txtsLen = txts.length;
            let index = 0;
            const textInTimer = 3000;
            const textOutTimer = 2800;
        
            function animateText() {
                for (let i = 0; i < txtsLen; i++) {
                    txts[i].classList.remove("text-in", "text-out");
                }
                txts[index].classList.add("text-in");
        
                setTimeout(function () {
                    txts[index].classList.add("text-out");
                }, textOutTimer);
        
                setTimeout(function () {
                    if (index == txtsLen - 1) {
                        index = 0;
                    } else {
                        index++;
                    }
                    animateText();
                }, textInTimer);
            }
        
            animateText();
        });

    </script>

	<!-- jquery link -->
	<script src="../assets/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap JavaScript -->
	<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/plugins/notify/wnoty.js"></script>
	
	<!--web ui content -->
	<script src="../js/website_js/registration.js"></script>
	<!--web ui content -->
	
	<?php include("../controller/js/website/registrationcall.php"); ?>
	<script src="../../js/current_page.php"></script>

</body>

</html>