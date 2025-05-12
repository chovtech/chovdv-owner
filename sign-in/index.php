<?php  include ('../controller/session/session-checker.php'); ?>
<?php
	@$langold = $_GET['lang'];

	if($langold == '' || $langold == 'null' || $langold == 'undefined' || $langold == 'null')
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
    <title>EduMESS | <?php echo  $website_loginpagetitle;?></title>
    <link rel="shortcut icon" href="../assets/images/website_images/favicon.png" type="image/x-icon">
	<link rel="icon" href="../assets/images/website_images/favicon.png" type="image/x-icon">
	<link rel="apple-touch-icon" sizes="152x152" href="../assets/images/website_images/favicon.png">
	<link rel="apple-touch-icon" sizes="120x120" href="../assets/images/website_images/favicon.png">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/images/website_images/favicon.png">
	<link rel="apple-touch-icon" href="./assets/images/website_images/favicon.png">
	<link rel="icon" href="../assets/images/website_images/favicon.png" type="image/x-icon">
	<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">	
	<!-- font awesome cn -->
	<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
	<!-- font awesome cn -->
	<link href="../css/website_css/registration.css" rel="stylesheet">	
	
	<!--css notify-->
	<link href="../assets/plugins/notify/wnoty.css" rel="stylesheet">
	<!--css notify-->

 </head>
  <body style="overflow-y:visible; ">
      <!-- Loader -->
		<div id="gx-overlay">
			<div class="gx-ellipsis">
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
		</div>

        <!--======================== HTML CONTENT===================== -->	
        <section id="wrapper" >
                 <div class="container">
                      <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                      <div align="center" class="row">
                        <div class="col-md-12">
                           
                          <img id="edumessblue" class="img-fluid" src="../assets/images/website_images/edumes-blue.png" style="margin-top:2.5%;">

                          <div  id="contentlogin" class="" style="box-shadow:0 2px 5px 0 #D3D3D3; 0 3px 11px 0 #D3D3D3;border-radius:10px;margin-top:2%;">
                              
                              <center><h4 style="padding-top:40px;color:#007ffb;" id="verificatitle"><?php echo $website_logintitle; ?></h4></center>

                            <div id="loginmsg"></div>
                         
    				             	 <div class="centerlogin usernameverify" >
        							            <input type="text"  autocomplete="off" class="generalinput" id="signinemail" placeholder="<?php echo $website_loginusername; ?>">
    								          <i class="fa fa-envelope fa-lg  icon" style=""></i>
                            </div>
                            
                                  <div class="centerlogin passwordverify" >
            							           <input type="password"  autocomplete="off" class="generalinput" id="signinpassword" placeholder="<?php echo $website_loginpassword; ?>"  >
        								             <i  class="fa fa-eye fa-lg " style="" id="viewpassword"></i>
                                  </div>

                                    <p style="margin-top:36px;"></p>
                                    
                                    <div class="row">
                                        <div class="col-lg-6">
                                              
                                             <input type="checkbox" style="width: 1em;cursor:pointer;" id="remindmepassid" class="filled-in chk-col-light-blue remindpasswordlink"   /> 
                                               <label for="remindmepassid"><?php echo $website_loginremember; ?></label>
                                        </div>
                                        <div class="col-lg-6">
                                             <a style="color:#2e5ca2;font-size:15px;" href="../forget-password?lang=<?php echo $lang; ?>"><?php echo 	$website_login_forgetpassword; ?></a>
                                        </div>
                                    </div>
                                   <p style="color:#92929D;padding-top:20px;"></p>
                                   <button type="button" id="signinbtn"   style="background-color:#007bff;cursor:pointer;" class="btn btn-block btn-lg text-light"><?php echo $website_login_loginbutton; ?></button>
                                     
                                     <p style="padding-top:20px;padding-bottom:50px;color:#92929D;font-size:14px;" id="signin"><?php echo 	$website_login_logindonthavacc; ?> <a href="../signup?lang=<?php echo $lang; ?>"><?php echo $website_login_login_singuplink; ?></a></p>
                                    
                          </div>
                        </div>
                       
                      </div>
                 </div>
          </section>



                <!--==== Affiliate Non Approve modal==== -->
                   <div class="modal fade" id="affi_notapproved_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="bin_nin_modalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content" style="border-radius: 20px;">
                                <div class="modal-body">
                                    <div align="center">
                                    <h4 class="mt-3"><i class="fa fa-info"></i> Account Pending Approval</h4>
                                    </div>
                                    <div class="row" style="padding-top: 20px; margin: 0 5px 0 5px;">
                                        <div class="col-3">
                                        <img width="70" height="70" src="https://img.icons8.com/stencil/32/data-pending.png" alt="data-pending"/>

                                        </div>
                                        <div class="col-9">
                                            <small>Your affiliate account is currently under review. Please wait for the approval. You will be notified once your account is activated. Thank you for your patience!

                                              </small>
                                        </div>
                                    </div>
                                </div>
                               
                                    <div class="row">
                                        <div class="col-12" style="padding: 30px;">
                                            <button class="btn btn-primary " class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="width: 100%;" type="button">
                                            <i class="fa fa-times"></i> Close
                                            </button>
                                            <div align="center" style="color: #afafaf; font-size: 11px; font-weight: 500;">Powered
                                                by EduMESS
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 <!--==== Affiliate Non Approve modal==== -->


        <!--======================== HTML CONTENT===================== -->	
         <!-- EXTERNAL SCRIPTS============================================= -->	
        <script src="../assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
        <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
         <!--web ui content -->
		            <script src="../js/website_js/registration.js"></script>
         <!--web ui content -->

         <?php include('../controller/js/website/login.php'); ?>
        <!-- <script src="../controller/js/website/login.js"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
        <script src="../assets/plugins/notify/wnoty.js"></script>
        
        <script src="../js/current_page.php"></script>
        
        <script>
            $(document).ready(function(){
               localStorage.clear(); 
            });
        </script>
  </body>
</html>