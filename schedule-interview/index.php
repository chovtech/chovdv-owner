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
				<span style="color: #0066FF;">EduMESS</span> Franchise Interview</h1>
				<p style="font-size: 17px; font-weight: 400; color:#686868;">
                         Kindly schedule a franchise interview date from the options provided below.
                         <br> 
                         Your prompt response is greatly appreciated.
					 
					
				</p>
			</div>
		
		</div>

        <div class="container-fluid" style="padding-top: 50px; padding-bottom: 150px;">
              <!-- Calendly inline widget begin -->
                <div class="calendly-inline-widget" data-url="https://calendly.com/edumessinc/franchise-intervie?hide_event_type_details=1&hide_gdpr_banner=1" style="min-width:320px;height:700px;"></div>
                <!-- Calendly inline widget end -->
          
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
   
    <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
       <!-- Calendly inline widget end -->

</body>

</html>