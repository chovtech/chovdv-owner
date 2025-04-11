<?php include ('../controller/config/config.php'); ?>
<?php
	
	@$langold = $_GET['lang'];

	if($langold == '' || $langold == NULL || $langold == 'undefined' || $langold == 'null')
	{
		$lang = 'english';
	}
	else{
		$lang = $_GET['lang'];
	}

	include ('../lang/'.$lang.'.php'); 

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="author" content="EduMESS"/>	
	<meta name="description" content="EduMESS (Education Management and E-Learning Software Solution) is a leading school management, automation and elearning solution. Since its launch, EduMESS has grown to become a leader. Our clients say that the simplicity of our interface, ease of use, cost effectiveness and excellent customer care is the reason they prefare EduMESS. We have watched schools move from softwares they are using to EduMESS."/>
	<meta name="keywords" content="Best, School, Management, Best School, Best School Management, Best School Management Software, Free School Management Software, Portal, School Owner, Group of School Owner, Consultants, Brand Promoters | School Portal Generator ">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <!-- SITE TITLE -->
    <title>EduMESS | <?php echo $website_forgetpassword_pagetitle; ?></title>
	<link rel="shortcut icon" href="../assets/images/website_images/favicon.png" type="image/x-icon">
	<link rel="icon" href="../assets/images/website_images/favicon.png" type="image/x-icon">
	<link rel="apple-touch-icon" sizes="152x152" href="../assets/images/website_images/favicon.png">
	<link rel="apple-touch-icon" sizes="120x120" href="../assets/images/website_images/favicon.png">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/images/website_images/favicon.png">
	<link rel="apple-touch-icon" href="./assets/images/website_images/favicon.png">
	<link rel="icon" href="../assets/images/website_images/favicon.png" type="image/x-icon">

	<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">	

	
	<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" rel="stylesheet"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>


	<!-- font awesome cn -->
	<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
	<!-- font awesome cn -->
	<link href="../css/website_css/registration.css" rel="stylesheet">	
	
		<!-css notify--->
	<link href="../../assets/plugins/notify/wnoty.css" rel="stylesheet">
	<!-css notify--->
	
 </head>
  <body >
        <!--======================== HTML CONTENT===================== -->	
        <section id="wrapper" >
                 <div class="container">
                      <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                      <div align="center" class="row">
                        <div class="col-md-12">
                           
                          <img id="edumessblue" class="img-fluid" src="../assets/images/website_images/edumes-blue.png" >

                          <div  id="contentlogin" class="" style="box-shadow:0 2px 5px 0 #D3D3D3; 0 3px 11px 0 #D3D3D3;border-radius:10px;margin-top:2%;">
                              
                              <center><h4 style="padding-top:40px;color:#0047AB;" id="verificatitle"><?php echo $website_forgetpassword_title; ?></h4></center>
                        
                                <p style="color:#5A5A5A;font-family: Arial, Helvetica, sans-serif;padding-top:18px;" id="otpsent"><?php echo $website_forgetpassword_des; ?></p>
                             <div id="displayerrmessage"></div>
                            <div class="centerlogin" >
                                  <input type="email"  autocomplete="off" class="generalinput" id="resemail" placeholder="<?php echo $website_forgetpassword_email; ?>">
                                <i class="fa fa-envelope fa-lg  icon" style=""></i>
                            </div>
                                
                                	
                              <p style="margin-top:36px;"></p>
                        
                              <button type="button" id="signinbtn"   style="background-color:#007bff;" class="btn btn-block btn-lg text-light"><?php echo $website_forgetpassword_buttontitle; ?></button>
                                <p style="color:#92929D;font-size:15px;font-family: Arial, Helvetica, sans-serif;padding-top:40px;"></p>
                           
                          </div>    
                          <p style="padding-top:20px;color:#92929D;font-size:14px;" id="signin"> <?php echo $website_forgetpassword_haveaccount; ?> <a href="../sign-in?lang=<?php echo $lang; ?>"><?php echo $website_forgetpassword_haveaccountlink; ?></a></p>
                        
                        </div>
                       
                      </div>
                 </div>
            </section>
            
           
        
      <!--======================== HTML CONTENT===================== -->	
    
       <!-- EXTERNAL SCRIPTS============================================= -->	
       <script src="../assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
        <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        
        <?php include("../controller/js/website/registrationcall.php"); ?>
        
        <script src="../../assets/plugins/notify/wnoty.js"></script>
        <script src="../../js/current_page.php"></script>

  </body>
</html>