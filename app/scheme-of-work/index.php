<?php include('../../controller/session/session-checker-owner.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="EduMESS" />
    <meta name="description" content="EduMESS (Education Management and E-Learning Software Solution) 
        is a leading school management, automation and elearning solution. Since its 
        launch, EduMESS has grown to become a leader. Our clients say that the simplicity 
        of our interface, ease of use, cost effectiveness and excellent customer care is 
        the reason they prefare EduMESS. We have watched schools move from softwares they 
        are using to EduMESS." />
    <meta name="keywords" content="Best, School, Management, Best School, Best School Management, 
        Best School Management Software, Free School Management Software, Portal, 
        School Owner, Group of School Owner, Consultants, Brand Promoters | School Portal Generator ">
    <title>EduMESS</title>
    <!-- FAVICON AND TOUCH ICONS -->
    <link rel="shortcut icon" href="../../assets/images/website_images/favicon.png" type="image/x-icon">
    <link rel="icon" href="../../assets/images/website_images/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="152x152" href="../../assets/images/website_images/favicon.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../../assets/images/website_images/favicon.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/images/website_images/favicon.png">
    <link rel="apple-touch-icon" href="../../assets/images/website_images/favicon.png">
    <link rel="icon" href="../../assets/images/website_images/favicon.png" type="image/x-icon">

    <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">
    <script src="../../assets/plugins/jquery/code.jquery.com_jquery-3.5.1.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- Animate.css CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        integrity="sha512-..." crossorigin="anonymous" />

    <!-- style sheet -->
    <link rel="stylesheet" href="../../css/app_css/appStyle.css">

    <!-- settings sheet -->
    <!-- <link rel="stylesheet" href="../../css/app_css/settings.css"> -->
    <link rel="stylesheet" href="../../css/app_css/schemework.css">

    <!-- notification css-->
    <link href="../../assets/plugins/notify/wnoty.css" rel="stylesheet">

</head>
<body>

    
    <!-- Loader -->
    <div id="gx-overlay">
    	<div class="gx-ellipsis">
    		<div></div>
    		<div></div>
    		<div></div>
    		<div></div>
    	</div>
    </div>

    <div class="grid-container">

        <!-- Header -->
        <?php include('../../includes/app-header.php'); ?>
        <!--End Header -->


        <!-- Sidebar -->
        <?php include('../../includes/app-menu.php'); ?>
        <!-- End Sidebar -->


        <!--======Floating Button=========-->
        <!-- Buttons -->
        <?php include('../../includes/floating-btn.php'); ?>
        <!-- End - Buttons -->
        <!--======Floating Button=========-->


        <!---====Side Modal Start Here====-->
        <?php include('../../includes/setting-menu.php'); ?>
        <!---====Side Modal End Here====-->

        <!----Main----->
        <main class="main-container">

            <div class="main-cards" style="margin-top: 50px;">

                <!-- Navbar pills -->
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Nav tabs -->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs mb-3 customtab" id="pros-schemework" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="config-tab-1" data-bs-toggle="tab" href="#config-tabs-1"
                                        role="tab" aria-controls="config-tabs-1" aria-selected="true">Scheme of work</a>
                                </li>

                                <!-- <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="config-tab-2" data-bs-toggle="tab" href="#config-tabs-2"
                                        role="tab" aria-controls="config-tabs-2" aria-selected="false">Grading
                                        Structure</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="config-tab-3" data-bs-toggle="tab" href="#config-tabs-3"
                                        role="tab" aria-controls="config-tabs-3" aria-selected="false">Result Type</a>
                                </li> -->
                            </ul>


                            <div class="tab-content" id="pros-schemework-content">

                                <div class="tab-pane fade show active" id="config-tabs-1" role="tabpanel"
                                    aria-labelledby="config-tab-1">

                                    <div class="row g-2">
                                        <div class="col-md-12 col-lg-2">
                                            <select style="color: #666666;" class="form-select form-select-sm"
                                                aria-label="form-select-sm example" id="abba_display_campus">
                                                <option value="NULL">Select campus</option>
                                            </select>
                                        </div>

                                        <div class="col-md-12 col-lg-2">
                                            <select style="color: #666666;" class="form-select form-select-sm"  aria-label="form-select-sm example" id="prosload-classload">
                                                <option value="NULL">Select Class</option>
                                            </select>
                                        </div>

                                       

                                        <div class="col-md-12 col-lg-2">
                                            <select style="color: #666666;" class="form-select form-select-sm"
                                                aria-label="form-select-sm example" id="prosload-term">
                                                <option value="NULL">Select Term</option>
                                            </select>
                                        </div>

                                        <div class="col-md-12 col-lg-2">
                                            <button type="button"
                                                style="font-size: 12px;border:1px solid #007bff;background-color:#fff;color:#007bff;"
                                                class="btn btn-sm fw-normal" id="pros_getscheme_on_click"><i class="fas fa-circle-notch"></i>
                                                Load filter</button>
                                        </div>


                                    </div>
                                    
                                    <div class="row pt-5">

                                            <div class="row">
                                                <div class="col-lg-12 col-md-12" align="right">
                                                    
                                                    <button type="button" class="btn btn-sm text-white mb-1 rounded-3 bg-primary" data-bs-toggle="modal" data-bs-target="#caonboardingModal2" id="create-gs-modal" data-id="0"> <i class="fas fa-plus"> Create New</i></button>

                                                </div>
                                            </div>
                                            
                                            
                                            
                                          <div class="row pt-2 pros-load-scheme-ofwork-createdhere">
                                        
                                        </div>

                                        
                                    </div>
                                </div>

                               
                            </div>
                            <!-- Tab panes -->
                        </div>

                    </div>
                </div>
                <!--/ Navbar pills -->

            </div>

        </main>
        <!-- End Main -->

    </div>

    <!-- C.A Onboarding Modal -->
    <div class="modal fade" id="caonboardingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="caonboardingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn float-end text-primary" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"> Close</i></button>
                        </div>

                        
                    </div>
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="card-body">
                                <h3 class="fw-bold pt-3 pb-3">Scheme of work Set Up</h3>
                                <p class="text-lg pb-3">Hi, I will be assisting you in setting up the Scheme of work structure for your campuses. Please click 'Proceed' so we can begin.  </p>
                                <!-- cards -->
                                <div class="row row-cols-1 row-cols-lg-3 border-bottom">
                                    
                                </div>
                                <!-- /cards -->
                                <!-- NEXT BUTTON-->
                                    <button class="btn btn-primary float-start btn-lg text-white mt-2 rounded-3" data-bs-target="#caonboardingModal2" data-bs-toggle="modal" data-bs-dismiss="modal"> <i class="fas fa"> Proceed</i> <i class="fas fa-angle-right"></i></button>
                                <!-- /NEXT BUTTON-->
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="row">

                                     <?php


                                     $selectwelcomingimage = mysqli_query($link, "SELECT * FROM `defaultimages` WHERE ImageName='abba-welcoming-image'");
                                     $selectwelcomingimagecnt = mysqli_num_rows($selectwelcomingimage);
                                     $selectwelcomingimagecntrow = mysqli_fetch_assoc($selectwelcomingimage);


                                     $welcoming_images_onborading = $selectwelcomingimagecntrow['BaseSixtyFour'];

                                     ?>
                                <img class="" src="<?php echo $welcoming_images_onborading ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="caonboardingModal2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="caonboardingModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn float-end text-primary" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"> Close</i></button>


                    <!-- main content -->
                    <div class="main-content">
                                
                        <!-- row -->
                        <div class="row justify-content-center p-0 prosloadcampusnewhere" id="cardSection">
                            <!-- col -->
                            <div class="col-lg-9 col-md-8">
                                <h5 class="fw-bold pt-4">Please select a campus</h5>
                                <p class="small pb-5">kindly select the campus that you would like to set scheme of work for</p>
                                <!-- cards -->
                                <div class="row row-cols-1 row-cols-lg-3 g-4 pb-5 border-bottom" id="pros_display_ca_campus">
                                
                                </div>
                               
                                <button type="button"
                                    class="btn btn-md bg-light text-primary float-start back mt-2 rounded-3 btn-outline-primary" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"> Close</i></button>
                                <button type="button" class="btn btn-md text-white float-end next mt-2 rounded-3 bg-primary"><i class="fas fa"> Next</i> <i class="fas fa-angle-right"></i></button>
                                <!-- /NEXT BUTTON-->
                            </div>
                            <!-- /col -->
                        </div>
                        

                        <div class="row justify-content-center form-business">
                                  
                            <div class="col-lg-9 col-md-8 pt-5">
                                <h5 class="fw-bold">Select input below.</h5>
                                <p class="small pb-0">Kindly select the input provided before you proceed to create your scheme of work.</p>
                               
                                <div class="border-bottom" id="pros_display_schemeofwork-filter">


                                                <div class="row">
                                                    <div class="col-lg-4 col-md-12 col-sm-4">
                                                            <div class="form-group local-forms">
                                                                <label style="font-weight:700;">Section</label>
                                                                <select class="form-control pros-selectgenralselectfield" id="prosloadsection-here" style="border:1px solid #007ffb;">
                                                                    <option value="0">Select section </option>
                                                                </select>
                                                            </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-12 col-sm-4">
                                                            <div class="form-group local-forms">
                                                                <label style="font-weight:700;">Subject</label>
                                                                <select class="form-control pros-selectgenralselectfield" id="prosloadsubject-schemework" style="border:1px solid #007ffb;">
                                                                    <option value="0">Select subject </option>
                                                                </select>
                                                            </div>
                                                    </div>

                                                   

                                                      <div class="col-lg-4 col-md-12 col-sm-4">
                                                            <div class="form-group local-forms">
                                                                <label style="font-weight:700;">Term</label>
                                                                <select class="form-control pros-selectgenralselectfield" id="prosloatermfor-create-schemework" style="border:1px solid #007ffb;">
                                                                    <option value="0">Select term </option>
                                                                </select>
                                                            </div>
                                                     </div>

                                                </div>

                                                <br>

                                                <div class="row prosloadclasshere-for-schemmework">

                                                <?php
                                                $selectwelcomingimage_new = mysqli_query($link, "SELECT * FROM `defaultimages` WHERE ImageName='abba-no-record-found-image2'");
                                                $selectwelcomingimagecnt_new = mysqli_num_rows($selectwelcomingimage_new);
                                                $selectwelcomingimagecntrow_new = mysqli_fetch_assoc($selectwelcomingimage_new);

                                                $welcoming_images_onborading_new = $selectwelcomingimagecntrow_new['BaseSixtyFour'];


                                                echo '<div align="center" class="pb-1 pt-0 justify-content-center">
                                                                    <img class="img-fluid" align="center" src="' . $welcoming_images_onborading_new . '"   style="width:20%;"><br>
                                                                    please select section to load class here.<br>
                                                                   
                                                            </div>';
                                                ?>
                                                </div>

                                                 
                                        <br><br>

                                </div>
                              
                                <button type="button" class="btn btn-md bg-light text-primary float-start back mt-2 rounded-3 btn-outline-primary"><i class="fas fa-angle-left"> Back</i></button>  
                                    <button type="button" class="btn btn-md text-white float-end mt-2 rounded-3 bg-primary pros-submit-schemeofworkinputfilter"> <i class="fas fa"> Submit</i> <i class="fas fa-angle-right"> </i></button>
                               
                            </div>
                           
                        </div>
                      

                        <div class="row justify-content-center py-2 form-business proscreate-topichere">
                            <div class="col-lg-9 col-md-8" id="successMessage">
                           

                                <h5 class="fw-bold">Create topic.</h5>
                                    <div id="prosloadschemetemplate">
                                        <u style="cursor:pointer;color:blue;text-decoration:underline;float:right"  class="prosperloadtemplatemodalbtn" id="create-gs_tem-modal"> <i class="fas fa-plus"> Use Template</i></u> 
                                    </div> 
                                <p class="small pb-0">
                                            Kindly input your topic below. if you want to add more than a topic, click on the plus icon to add new topics<br>
                                        <span><strong>Note:</strong>sub topic is optional</span>
                                </p>
                                      

                                <div class="card" style="border-radius:10px;">
                                    <div class="card-body">
                                         <h6 class="fw-bold">Week 1</h6>
                                             <div class="form-group local-forms">
                                                    <label style="font-weight:700;">Topic Name</label>
                                                    <input type="text" class="form-control prostopicnamegotten" id="prosfirsttopiclist" data-id="1"  placeholder="enter your topic here" style="border:1px solid #007ffb;border-radius:5px;">
                                            </div>

                                            <div class="prosisplaysubtopiceach1"></div>
                                            <a id="pros-appenbtn-addRownew-subtopic" data-id="1" style="cursor:pointer;" class="btn-floating prosappendedsubtopiceach1 float-end mt-1">Add sub topic<i class="fa fa-plus"></i></a>

                                            <input type="hidden" value="0" id="proscollect-topicollectedsub1">
                                    </div>
                                 </div>

                                 <div class="pros-prosloadappendedtopichere"></div>

                                            <a id="pros-appenbtn-addRownew"  style="cursor:pointer;" class="btn-floating blue  float-end mt-1"><i class="fa fa-plus"></i></a> 
                                              <input type="hidden" value="0" id="proscollect-topicollected">
                                            
                            </div>
                            
                            <div class="col-lg-9 col-md-8" id="successForm">
                                
                               <br> <br>
                                <button type="button"
                                    class="btn btn-md bg-light text-primary float-start back mt-2 rounded-3 btn-outline-primary"><i class="fas fa-angle-left"> Back</i></button>

                                    <button type="button" class="btn btn-md text-white float-end mt-2 rounded-3 bg-primary pros-submit-finishedschemeofwork"> <i class="fas fa"> Submit</i> <i class="fas fa-angle-right"> </i></button>
                                   
                            </div>
                            
                        </div> 
                        

                         <!-- load import set up here -->
                            <div class="row justify-content-center py-2 form-business proscreate-import">
                                    <!-- col -->
                                    <div class="col-lg-9 col-md-8">
                                        <div align="center">
                                            <img src="../../assets/gif/done.gif" width="200" height="auto" alt="success-message">

                                            <h5 class="fw-bold">Congratulations</h5>
                                            <p class="small pb-0">
                                                your scheme of work has been created successfully.
                                                kindly click  on 'Import' to  import for other campus.
                                            </p>

                                        </div>

                                        
                                    </div>
                                    
                                    <div class="col-lg-9 col-md-8" id="successForm">
                                        <button type="button"
                                            class="btn btn-md bg-light text-primary float-start back mt-2 rounded-3 btn-outline-primary"><i class="fas fa-angle-left"> Back</i></button>
                                            <button type="button"
                                            class="btn btn-md text-white float-end back mt-2 rounded-3 btn-primary prosimportothercampusbtn" ><i class="fas fa-download"> Import</i></button>
                                    </div>
                            </div> 
                         <!-- load import set up here -->

                    </div>
                    <!-- /main content -->
                </div>

            </div>
        </div>
    </div>

    <!-- load sheme of work here -->
    <div class="modal fade" id="prosloadschemeworkmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="prosloadschemeworkmodalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-xl">
            <div class="modal-content" style="height:100%;">
                <div class="modal-body p-0">
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn float-end text-primary" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"> Close</i></button>
                        </div>
                    </div>
                    <div class="container" id="prosloaschemecampusworkviewhere"></div>
                    
                </div>
            </div>
        </div>
    </div>
    

    <!-- Create Grading Structure -->
    <div class="modal fade modalshow modalfade" id="abba_create_gs_Modal" tabindex="-1"
        aria-labelledby="abba_create_gs_ModalLabel" aria-hidden="true">
        <div class="modal-dialog dialogcontent modal-dialog-scrollable" style="border-top-left-radius: 20px; width: 100%;">
            <div class="modal-content modalcontent" style="background-color:#ffffff; ">

                <div class="modal-header">
                    <h5 class="modal-title text-primary"><i class="fa fa-plus"> Create/Edit Grading Structure</i>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12" align="right">
                            
                            <button type="button" class="btn btn-sm text-white rounded-3 bg-info mt-2 float-end create-gs_tem-modal" data-bs-toggle="modal" data-bs-target="#pros_create_gs_template_Modal" id="create-gs_tem-modal" data-id="1" data-where="create"> <i class="fas fa-plus"> Use Template</i></button>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-sm-12" id="abba_show_gs_edit_create">
                                
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm bg-light text-primary mt-2 rounded-3 btn-outline-primary" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"> Close</i></button>
                    <button type="button" class="btn btn-sm text-white mt-2 rounded-3 bg-primary gs-submit-button"> <i class="fas fa"> Submit</i> <i class="fas fa-angle-right"> </i></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Use Template schemme work-->
    <div class="modal fade modalfade" id="pros_create_gs_template_Modal" tabindex="-1"
        aria-labelledby="pros_create_gs_template_ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl" style="border-top-left-radius: 20px;">
            <div class="modal-content modalcontent-prosscheme" style="background-color:#fff; ">
                <div class="modal-header">
                    <h5 class="modal-title text-primary"><i class="fa fa-plus"> Use Scheme of  Work Templates</i>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row" style="display:none;" id="prostemplate_show_gs_template">
                      <div class="col-sm-1"></div> 
                        <div class="col-sm-10">

                            <div class="row " >
                                    <div class="col-lg-4 col-md-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label style="font-weight:700;">Region</label>
                                            <select class="form-control pros-selectgenralselectfield" id="prosloadrigion-here-template" style="border:1px solid #007ffb;">
                                                <option value="0">Select Region </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label style="font-weight:700;">Class</label>
                                            <select class="form-control pros-selectgenralselectfield" id="prosloadclass-schemework-template" style="border:1px solid #007ffb;">
                                                <option value="0">Select Class </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label style="font-weight:700;">Subject</label>
                                            <select class="form-control pros-selectgenralselectfield" id="prosloadsubject-schemework-template" style="border:1px solid #007ffb;">
                                                <option value="0">Select subject </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label style="font-weight:700;">Term</label>
                                        <select class="form-control pros-selectgenralselectfield" id="prosloatermfor-create-schemework-template" style="border:1px solid #007ffb;">
                                            <option value="0">Select term </option>
                                        </select>
                                    </div>
                                    </div>
                            </div>

                            <button type="button" class="btn btn-md text-white float-end  mt-3 rounded-3 bg-primary prosnexttemplatebtn"><i class="fas fa"> Next</i> <i class="fas fa-angle-right"></i></button>
                            </div>

                        <div class="col-sm-1"></div> 
                    </div>
                            <div class="row" style="display:none;" id="prosloadtemplatedivhere">
                                <div class="col-md-1 col-lg-1"></div> 
                                <div class="col-md-10 col-lg-10 gs-active-card gs-abba_card ">
                                      <div class="prosloadtemplatetopics-here">
                                        
                                    </div>
                                        <button type="button" class="btn btn-sm bg-light text-primary mt-2 rounded-3 btn-outline-primary prosmovetemplateback" ><i class="fas fa-angle-left"> Back</i></button> 
                                        
                                        <button type="button" class="btn btn-md text-white float-end  mt-2 rounded-3 bg-primary prossubmit-template"> Submit</i> <i class="fas fa-angle-right"></i></button>
                                </div>
                                <div class="col-md-1 col-lg-1"></div> 
                            </div>
                </div>
            </div>
        </div>
    </div>


    


    <!--delete schemme work -->
    <div class="modal fade modalfade" id="pros-deleteschemeworkmodal" 
        tabindex="-1" role="dialog" aria-labelledby="pros-deleteschemeworkmodalLabel" aria-hidden="true" style="z-index:2000;">
        <div class="modal-dialog modal-dialog-centered" style="height:80vh;" role="document">
            <div class="modal-content" style="background-color:#fff;">
                <div class="modal-header" style="border:none;">
                    <h5 class="modal-title" style="font-weight:600;font-size:15px;" id="deleteschool-modalLabel">
                        Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="displayschooldel-onboarding">
                    <center>
                    <input type="hidden" id="pros-deleteschoolid">
                        <p style="font-weight:400;font-size:15px;">Are you sure you want to delete this topic <span
                                id="displaydelname-del"></span>?</p>

                        <span style="color:red;font-weight:600;">
                            Note: if you delete this topic,
                                and any sub topic assigned to it will be deleted as well.
                        </span>
                    </center>

                        <input type="hidden" id="prosgetdelschemeid">
                </div>
                <div class="modal-footer" style="border:none;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="pros-schemeconfirmDelete">Delete <i class="fas fa-times"> </i></button>
                </div>
            </div>
        </div>
    </div>
    <!--delete schemme work -->
    
      <!-- eit scheeme of work here-->
      <div class="modal fade modalshow modalfade" id="proseditshemeofworkmodal" tabindex="-1"
        aria-labelledby="proseditshemeofworkmodalLabel" aria-hidden="true" style="z-index:2000;">
        <div class="modal-dialog dialogcontent modal-dialog-scrollable" style="border-top-left-radius: 20px; width: 100%;">
            <div class="modal-content modalcontent" style="background-color: #ebe8ed;">


                <div class="modal-header">
                    <h5 class="modal-title text-primary"><i class="fa fa-edit">Edit Scheme of work</i>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div style="position: fixed; margin-left: -10px; margin-top: -30px;">
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-12" id="prosloadschemeworkforedit">
                                
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm bg-light text-primary mt-2 rounded-3 btn-outline-primary" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"> Close</i></button>
                    <button type="button" class="btn btn-sm text-white mt-2 rounded-3 bg-primary prosproceedto-edit-schemeworbtn"> <i class="fas fa"> Save</i> <i class="fas fa-angle-right"> </i></button>
                </div>
            </div>
        </div>
    </div>

    <!--Script-->
    <!--jquery knob -->
    <script src="../../assets/plugins/knob/jquery.knob.js"></script>

    <script>
        $(function () {
            $('[data-plugin="knob"]').knob();
        });

        // $(window).on('load', function() {
        //     // When the window finishes loading, hide the preloader
        //     $('.preloader').fadeOut('slow');
        // });

        

    </script>
    <!--Custom JS--->
    <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- header js -->
    <?php include('../../controller/js/app/header.php'); ?>

    <script src="../../js/app_js/appScript.js"></script>
    <!-- pagination js -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.min.js"></script>

    <!-- notification js -->
    <script src="../../assets/plugins/notify/wnoty.js"></script>

    <!-- image cropper js -->
    <script src="../../assets/plugins/Croppie/croppie.js"></script>
    <script src="../../assets/plugins/Croppie/croppie.min.js"></script>

    <!-- current page js -->
    <!-- <?php #include('../../js/current_page.php'); ?> -->

    <!-- onboarding js -->
    <?php include('../../controller/js/app/schemme-ofwork-onboarding.php'); ?>
   

    <!-- configuration js -->
  

    

</body>

</html>