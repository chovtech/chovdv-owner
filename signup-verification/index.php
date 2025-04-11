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
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="EduMESS" />
    <meta name="description"
        content="EduMESS (Education Management and E-Learning Software Solution) is a leading school management, automation and elearning solution. Since its launch, EduMESS has grown to become a leader. Our clients say that the simplicity of our interface, ease of use, cost effectiveness and excellent customer care is the reason they prefare EduMESS. We have watched schools move from softwares they are using to EduMESS." />
    <meta name="keywords"
        content="Best, School, Management, Best School, Best School Management, Best School Management Software, Free School Management Software, Portal, School Owner, Group of School Owner, Consultants, Brand Promoters | School Portal Generator ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- SITE TITLE -->
    <title>EduMESS | <?php echo $website_signup_verication_pagetitle; ?></title>
    <link rel="shortcut icon" href="../assets/images/website_images/favicon.png" type="image/x-icon">
    <link rel="icon" href="../assets/images/website_images/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="152x152" href="../assets/images/website_images/favicon.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../assets/images/website_images/favicon.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/images/website_images/favicon.png">
    <link rel="apple-touch-icon" href="./assets/images/website_images/favicon.png">
    <link rel="icon" href="../assets/images/website_images/favicon.png" type="image/x-icon">

  <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 	<!-css notify--->
	<link href="../assets/plugins/notify/wnoty.css" rel="stylesheet">
	<!-css notify--->



    <!-- font awesome cn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- font awesome cn -->
    <link href="../css/website_css/registration.css" rel="stylesheet">

    <?php
                 $uid = $_GET['oionxx'];
                 
                
                 
                 if(isset($_GET['tak']))
                 {
                      $token = $_GET['tak'];
                      $tokentwo = explode(' ', $token);
                      
                      if($token == '')
                      {
                                
                          $num1 =  '';
                          $num2 =  '';
                          $num3 =  '';
                          $num4 =  '';
                          $num5 =  '';   
                      }else{
                          foreach($tokentwo as $new)
                          {
                            
                                  $num1 =  $new[0];
                                  $num2 =  $new[1];
                                  $num3 =  $new[2];
                                  $num4 =  $new[3];
                                  $num5 =  $new[4];
                              
                             
                          }    
                      }
                       
                         
                 }else  
                 {
                  
                      $num1 =  '';
                      $num2 =  '';
                      $num3 =  '';
                      $num4 =  '';
                      $num5 =  ''; 
                 }
                 

                @$email = $_GET['marana'];
                 
                 
                
                 
        ?>
</head>

<body id="verificationid">
    <!--======================== HTML CONTENT===================== -->
    <section id="wrapper">
        <div class="container">
            <!-- Stack the columns on mobile by making one full-width and the other half-width -->
            <div align="center" class="row">
                <div class="col-md-12">

                    <img id="edumessblue" class="img-fluid" src="../assets/images/website_images/edumes-blue.png"
                        style="margin-top:2.5%;">

                    <div id="contentverication" class=""
                        style="box-shadow:0 2px 5px 0 #D3D3D3; 0 3px 11px 0 #D3D3D3;border-radius:10px;margin-top:2%;">

                        <h4 style="padding-top:40px;" id="verificatitle"><?php echo $website_signup_verication_title; ?>
                        </h4>

                        <p
                            style="color:#92929D;font-size:15px;font-family: Arial, Helvetica, sans-serif;padding-top:40px;">
                            <?php echo $website_signup_verication_title_des;?> <?php echo $email;?></p>

                        <p style="color:#92929D;font-size:15px;padding-top:40px;padding-bottom:40px;">
                            <?php echo $website_signup_verication_title_dessub;?></p>
                        <span id="pwmatcherr"></span>
                        <div class="centerverification pin prosverficationcontainer">

                            <input type="text" id="idone" value="<?php echo $num1;?>" maxlength="1" autocomplete="off"
                                required pattern="\d{1}" autofocus class="pasteitems"
                                style="width:40px;border:none;background-color:#F1F5F9;border-bottom:2px solid #00008B;">&nbsp&nbsp
                            <input type="text" id="idtwo" value="<?php echo $num2;?>" maxlength="1" autocomplete="off"
                                required pattern="\d{1}" class="pasteitems"
                                style="width:40px;border:none;background-color:#F1F5F9;border-bottom:2px solid #00008B;">&nbsp&nbsp
                            <input type="text" id="idthree" value="<?php echo $num3;?>" maxlength="1" autocomplete="off"
                                required pattern="\d{1}" class="pasteitems"
                                style="width:40px;border:none;background-color:#F1F5F9;border-bottom:2px solid #00008B;">&nbsp&nbsp
                            <input type="text" id="idfour" value="<?php echo $num4;?>" maxlength="1" autocomplete="off"
                                required pattern="\d{1}" class="pasteitems"
                                style="width:40px;border:none;background-color:#F1F5F9;border-bottom:2px solid #00008B;">&nbsp&nbsp
                            <input type="text" id="idfive" value="<?php echo $num5;?>" maxlength="1" autocomplete="off"
                                required pattern="\d{1}" class="pasteitems"
                                style="width:40px;border:none;background-color:#F1F5F9;border-bottom:2px solid #00008B;">&nbsp&nbsp
                            </form>
                        </div>
                        
                          <div class="mt-2" id="timer"></div>

                        <!--w-10 h-[100px] border-b-2 border-[#35977F] !bg-[#F1F5F9] undefined focus:outline-none focus:border-[#35977F] focus:border-b-4 text-center text-2xl font-semibold -->
                        <p style="padding-top:40px;color:#92929D;font-size:17px;">
                            <?php echo $website_signup_verication_title_didrecicecode; ?><br><a href="#"
                                id="resendbtn" style="display:none;"><?php echo $website_signup_verication_title_resendcode; ?></a></p>

                        <button type="button" id="verifymailbtn" data-id="13"
                            class="btn waves-effect waves-light text-light"
                            style="background-color:#0047AB;"><?php echo $website_signup_verication_title_btntitle;?></button><br><br>

                    </div>
                    <p style="padding-top:40px;color:#92929D;" id="signin">
                        <?php echo $website_signup_verication_title_alreadyhavacc;?> <a
                            href="../sign-in?lang=<?php echo $lang; ?>"><?php echo $website_signup_verication_title_havacclink;?></a>
                    </p>

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
    <script src="../js/website_js/registration-verification.js"></script>
    <!--registration callback -->
    <!--<script src="../controller/js/website/registrationcall-verification.js"></script>-->
    <?php include("../controller/js/website/registrationcall-verification.php"); ?>
    <!--registration callback -->
   <script src="../assets/plugins/notify/wnoty.js"></script>
   <script src="../../js/current_page.php"></script>
   
   <script src="../../js/current_page.php"></script>


</body>

</html>