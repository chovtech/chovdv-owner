<?php include('../../controller/session/session-checker-franchise.php'); 
// staff country name
    if($rowGetUserDetails['Country'] == '' ||$rowGetUserDetails['Country'] == '0')
    {
        $CountryName_staff= '';
    }else
    {
        $countid = $rowGetUserDetails['Country'];
        $sqltogetcountries_staff = mysqli_query($link,"SELECT * FROM `countries` WHERE countryID='$countid'");
        $rowtogetcountries_staff = mysqli_fetch_assoc($sqltogetcountries_staff);
        $cnttogetcountries_staff = mysqli_num_rows($sqltogetcountries_staff);
        $CountryName_staff = $rowtogetcountries_staff['CountryName'];
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
    EduMESS | Affiliates
    </title>
    <!-- FAVICON AND TOUCH ICONS -->
    <link rel="shortcut icon" href="../../assets/images/website_images/favicon.png" type="image/x-icon">
    <link rel="icon" href="../../assets/images/website_images/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="152x152" href="../../assets/images/website_images/favicon.png">
    <link rel="apple-touch-icon" sizes="120x120" href=".././assets/images/website_images/favicon.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/images/website_images/favicon.png">
    <link rel="apple-touch-icon" href="../assets/images/website_images/favicon.png">
    <link rel="icon" href="../../assets/images/website_images/favicon.png" type="image/x-icon">
   
   
    <!-- Boxi Cons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!--Bootstrap CSS -->
    <link href="../../css/app_css/teacher_css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">

    <!--CALENDER UI CSS -->
    <link href="../../js/website_js/Charts/morris.css" rel="stylesheet">

    <script src="https://code.jquery.com/ui/1.12.0-rc.2/jquery-ui.js"></script>

    <!-- font awesome cn -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- notification css-->
    <!-- Phone Number CDN -->
    <link href="../../assets/plugins/intlTelInput.min.css" rel="stylesheet"/>
     <script src="../../assets/plugins/intlTelInput.min.js"></script>

    <!--This - Morris Chart CSS -->
    <link href="../../assets/plugins/morrisjs/morris.css" rel="stylesheet">

    <!-- style sheet -->

   <link rel="stylesheet" href="../../css/app_css/appStyle.css">
   

    <!-- Profile CSS -->
    <link rel="stylesheet" href="../../css/app_css/teacher_css/page-profile.css">
    <link rel="stylesheet" href="../../css/app_css/teacher_css/profile.css">


     <!-- css notify -->
    <link href="../../assets/plugins/notify/wnoty.css" rel="stylesheet">
    
    
     <!-- image Croppie -->
   <link rel="stylesheet" href="../../assets/plugins/Croppie/croppie.css"></link>
 


    <style>
            /* Edit Form CSS */

            .form-group.local-forms {
                margin-bottom: 40px;
            }

            .local-forms {
                position: relative;
            }

            .local-forms label {
                font-size: 13px;
                color: #ababab;
                font-weight: 100;
                position: absolute;
                top: -10px;
                left: 10px;
                background: #fff;
                margin-bottom: 0;
                padding: 0 2px;
                z-index: 99;
            }

            .local-forms .form-control {
                border: 1px solid #ddd;
                box-shadow: none;
                color: #333;
                font-size: 12px;
                height: 40px;
                padding: 0.375rem 0.75rem;
                border-radius: 3px;
            }

            .local-forms .form-control:focus {
                border: 1px solid #007ffb;
            }
    </style>
  
    
     <style>


             .proscontainerimage {
                 /* max-width: 400px; */
                 width: 100%;
                 background: #fff;
                 padding: 30px;
                 border-radius: 30px;
                 color: #6990F2;
             }

             .img-area {
                 position: relative;
                
                 width: 100%;
                 width: 100%;
                 height: 240px;
                 background: #fff;
                 margin-bottom: 30px;
                 border-radius: 15px;
                 overflow: hidden;
                 display: flex;
                 justify-content: center;
                 align-items: center;
                 flex-direction: column;
                 border: 2px dashed #6990F2;
                 color: #6990F2;
             }

             .img-area .icon {
                 /* font-size: 100px; */
                 font-size: 100px;
             }

             .img-area h3 {
                 font-size: 20px;
                 font-weight: 500;
                 margin-bottom: 6px;
                 color: #6990F2;
             }

             .img-area p {
                 color: #6990F2;
             }

             .img-area p span {
                 font-weight: 600;
             }

             .img-area img {
                 /* position: absolute;
                 top: 0;
                 left: 0; */
                 width:50%;
                 height:50%;
                 /* object-fit: cover; */
                 object-position: center;
                 z-index: 100;
             }

             .img-area::before {
                 content: attr(data-img);
                 position: absolute;
                 top: 0;
                 left: 0;
                 width: 100%;
                 height: 100%;
                 background: rgba(0, 0, 0, .5);
                 color: #fff;
                 font-weight: 500;
                 text-align: center;
                 display: flex;
                 justify-content: center;
                 align-items: center;
                 pointer-events: none;
                 opacity: 0;
                 transition: all .3s ease;
                 z-index: 200;
             }

             .img-area.active:hover::before {
                 opacity: 1;
             }

   </style>
    
    


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
        <?php include('../../includes/affiliate-header.php'); ?>
        <!--End Header -->


        <!-- Sidebar -->
        <?php include('../../includes/affiliate-menu.php'); ?>
        <!-- End Sidebar -->



   


        

        <!----Main----->
        <main class="main-container">

            <!-------Dashboard Content ------------->
            <!-- Profile Header -->
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="user-profile-header-banner">
                            <img src="3.png" alt="Banner image" class="rounded-top">
                        </div>
                        <div
                            class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                            <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                                <img  src="<?php echo $userPicture;?>" alt="user image"
                                    class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img posloadimagecontentforall">


                                <div class="form-group students-up-files profile-edit-icon mb-0">
                                    <div class="uplod d-flex">
                                        <label class="file-upload profile-upbtn mb-0">
                                            <i class="bx bx-pencil"></i><input type="file" class="prosloadstaffimageonchage">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1 mt-3 mt-sm-5">
                                <div
                              
                                    class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                                    <div class="user-profile-info">
                                        <h6 class="pros_load_full_name_profile"><?php echo ucfirst(strtolower($PrimaryName));  ?>
                                            <?php echo ucfirst(strtolower($rowGetUserDetails['AffiliateMName'])); ?>
                                            <?php echo ucfirst(strtolower($SecondaryName)); ?></h6>
                                        <ul
                                            class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                            <li class="list-inline-item fw-semibold">
                                                <i class='bx bx-pen'></i>
                                                <?php echo 'Active'; ?>
                                            </li>
                                            <!-- <li class="list-inline-item fw-semibold">
                                                <i class='bx bx-map'></i>
                                                
                                               
                                                 
                                            </li> -->
                                            <li class="list-inline-item fw-semibold">
                                                <i class='bx bx-calendar-alt'></i> Joined <?php $rowGetUserDetails['DateJoined'];  ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--<a href="javascript:void(0)" class="btn btn-primary text-nowrap">-->
                                    <!--    <i class='bx bx-share-alt'></i> Share Profile-->
                                    <!--</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Profile Header -->

            <!-- Navbar pills -->
            <div class="row">
                <div class="col-sm-12">
                    <!-- Nav tabs -->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs mb-3 customtab" id="ex1" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="ex1-tab-1" data-bs-toggle="tab" href="#ex1-tabs-1"
                                    role="tab" aria-controls="ex1-tabs-1" aria-selected="true">Profile</a>
                            </li>
                           
                           
                            <!-- <li class="nav-item" role="presentation">
                                <a class="nav-link" id="ex1-tab-3" data-bs-toggle="tab" href="#ex1-tabs-3" role="tab"
                                    aria-controls="ex1-tabs-3" aria-selected="false">Withdrawer History</a>
                            </li>
                           -->
                          
                            
                            
                             <!-- <li class="nav-item" role="presentation">
                                <a class="nav-link" id="ex1-tab-15" data-bs-toggle="tab" href="#ex1-tabs-15" role="tab"
                                    aria-controls="ex1-tabs-15" aria-selected="false">Signature</a>
                            </li> -->
                        </ul>

                        <div class="tab-content" id="ex1-content">
                            <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel"
                                aria-labelledby="ex1-tab-1">

                                <!-- User Profile Content -->
                                <div class="row p-3">

                                    <div class="col-sm-4 col-xs-4 col-xl-7 col-lg-7 col-md-5">
                                        <!-- About User -->
                                        <div class="card mb-2">
                                            <div class="card-body">
                                                <div class="row flex-row d-flex">
                                                    <div class="col-8">
                                                        <p class="text-muted fs-6 fw-bolder">Personal Details</p>
                                                    </div>
                                                    <div class="col-4">
                                                        <i class="btn btn-sm bx bx-pencil bx-sm edit_button pull-right"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#edit-staffprofile"></i>
                                                    </div>
                                                </div>
                                                <ul class="list-unstyled mb-4 mt-3">
                                                    <li class="d-flex align-items-center mb-3"><i
                                                            class="bx bx-user"></i><span
                                                            class="fw-semibold mx-2">Full Name:</span> <span>
                                                            <span id="prostaffbamefnamehere"> <?php echo ucfirst(strtolower($PrimaryName));  ?> </span>
                                                            <span id="prostaffbamelnamehere">  <?php echo ucfirst(strtolower($SecondaryName)); ?></span>
                                                            <span id="prostaffbamemnamehere"> <?php echo ucfirst(strtolower($rowGetUserDetails['AffiliateMName'])); ?></span>
                                                        </span></li>


                                                       
                                           
                                          
                                                    <li class="d-flex align-items-center mb-3"><i
                                                            class="bx bx-star"></i><span
                                                            class="fw-semibold mx-2">Sex:</span> <span>
                                                            <?php 
                                                            
                                                        
                                                             echo '<span id="prostaffgender">'.$rowGetUserDetails['Gender'].'</span>';
                                                        
                                                     ?></span></li>
                                                    <li class="d-flex align-items-center mb-3"><i
                                                            class="bx bx-check"></i><span
                                                            class="fw-semibold mx-2">Status:</span>
                                                        <span><?php 
                                                        
                                                        if($rowGetUserDetails['Gender'] == '1')
                                                        {
                                                            $status_new = '<span id="prostaffstatusedit">Inactive</span>';
                                                        }else
                                                        {
                                                            $status_new = '<span id="prostaffstatusedit">Active</span>';
                                                          
                                                        }
                                                       echo $status_new;
                                                        ?></span>
                                                    </li>
                                                      <!-- <li class="d-flex align-items-center mb-3"><i
                                                            class="bx bx-star"></i><span
                                                            class="fw-semibold mx-2">Role:</span> <span>
                                                           </span>
                                                        </li> -->
                                                    <li class="d-flex align-items-center mb-3"><i
                                                            class="bx bx-flag"></i><span
                                                            class="fw-semibold mx-2">Country:</span> <span>
                                                           
                                                            <?php 
                                                                
                                                                if ($rowGetUserDetails['Country'] == '' || $rowGetUserDetails['Country'] == 0){

                                                                    echo '<span id="prostaffcountryedit">N/A</span>';
                                                                    
                                                                }
                                                                else{
                                                                    echo '<span id="prostaffcountryedit">'; echo ucfirst(strtolower($CountryName_staff)); echo '</span>';
                                                                }
                                                                ?>
                                                            </span></li>
                                                             
                                                        
                                                     
                                                        
                                                    <!-- <li class="d-flex align-items-center mb-3"><i
                                                            class="bx bx-detail"></i><span
                                                            class="fw-semibold mx-2">Languages:</span> <span>
                                                            </span>
                                                     </li>
                                                     
                                                     
                                                       <li class="d-flex align-items-center mb-3"><i
                                                            class="bx bx-detail"></i><span
                                                            class="fw-semibold mx-2">UserName:</span> <span>
                                                         </span>
                                                        </li> -->
                                                </ul>
                                                <hr />
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="row flex-row d-flex">
                                                            <div class="col-8">
                                                                <p class="text-muted fs-6 fw-bolder">Contacts</p>
                                                            </div>
                                                            <div class="col-4">
                                                                <i class="btn btn-sm bx bx-pencil bx-sm edit_button pull-right"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#edit-proscontactprofile"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="list-unstyled mb-4 mt-3">
                                                    <li class="d-flex align-items-center mb-3"><i
                                                            class="bx bx-phone"></i><span
                                                            class="fw-semibold mx-2">Contact:</span> <span>
                                                            <?php 
                                                                echo '<span id="pros-loadeditnumber">';if($Phone == ''){echo 'N/A';}else{echo $Phone;}  echo '</span>';
                                                            ?>
                                                          
                                                     </span></li>
                                                    <!-- <li class="d-flex align-items-center mb-3"><i class="bx bx-chat"></i><span class="fw-semibold mx-2">Skype:</span> <span>
                                                     john.doe</span></li> -->
                                                    <li class="d-flex align-items-center mb-3"><i
                                                            class="bx bx-envelope"></i><span
                                                            class="fw-semibold mx-2">Email:</span> <span>
                                                            <?php 
                                                               echo '<span id="pros-loadeditemail">';if($Email == ''){echo 'N/A';}else{echo $Email;}  echo '</span>';
                                                             ?>
                                                        
                                                     </span></li>

                                                    <li class="d-flex align-items-center mb-3"><i
                                                            class="bx bx-map"></i><span
                                                            class="fw-semibold mx-2">Address:</span> <span>
                                                            <?php 
                                                            echo '<span id="pros-loadeadresss">';if($Address == ''){echo 'N/A';}else{echo $Address;}  echo '</span>';
                                                           
                                                        
                                                     ?></span></li>
                                                </ul>
                                                
                                                <!-- <small class="text-muted text-uppercase">Teams</small> -->
                                                
                                            </div>
                                        </div>
                                        <!--/ About User -->

                                        <!-- Skills Overview -->
                                        <!-- <div class="card mb-2">
                                            <div class="card-body">
                                                <div class="row flex-row d-flex">
                                                    <div class="col-10">
                                                        <p class="text-muted fs-6 fw-bolder">Skills</p>
                                                    </div>
                                                    <div class="col-2">
                                                        <i class="bx bx-pencil bx-sm edit_button pull-right"></i>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div> -->
                                        <!--/ Skills Overview -->
                                    </div>

                                    <div class="col-sm-8 col-xs-8 col-xl-5 col-lg-5 col-md-7">

                                                <!-- Salary -->
                                                
                                                    <!-- <div class="col-xl-6 col-lg-6 col-md-6"> -->
                                                        <div class="card_tari card-1">
                                                            <div class="row mt-3 p-3">
                                                                <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 col--12">
                                                                    <div class="row d-flex flex-row">
                                                                        <div class="col-6">
                                                                            <h5 class="card-title text-white fw-lighter"> Wallet 
                                                                                Balance </h5>
                                                                            <div class="mt-5">
                                                                                <!-- <span class=" text-info">Next 2nd April, 2022</span>-->
                                                                            </div>
                                                                            <!-- <span class="fw-semibold fs-6 text-white mx-2"> Salary Ammount</span> -->
                                                                        </div>
                                                                        <div class="col-4 p-1">
                                                                            <img src="../../assets/images/Staff-Profile-Images/coin.png"
                                                                                width="140" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 p-3" style="margin-top: 100px;">
                                                                    <span class="fw-semibold fs-1 text-white mx-2">₦ <?php echo number_format($rowGetUserDetails['WalletBal']); ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        
                                                    
                                                        <!--Account Details -->
                                                        <div class="card mb-2">
                                                            <div class="card-body">
                                                                <div class="row flex-row d-flex">
                                                                    <div class="col-10">
                                                                        <p class="text-muted fs-6 fw-bolder">Bank Details</p>
                                                                    </div>
                                                                    <div class="col-2">
                                                                        <i class="bx bx-pencil bx-sm edit_button" style="cursor:pointer;"  data-bs-toggle="modal"
                                                                        data-bs-target="#edit_accdetail_modal"></i>
                                                                    </div>
                                                                </div>
                                                                <ul class="list-unstyled mb-4 mt-3">
                                                                    <li class="d-flex align-items-center mb-3"><i
                                                                            class="bx bx-user"></i><span
                                                                            class="fw-semibold mx-2">Account Name:</span> <span class="pros_load_bank">
                                                                            <?php 
                                                                                    echo $rowGetUserDetails['BankAccName'];
                                                                                ?>
                                                                        
                                                                        </span></li>
                                                                       
                                                                    <li class="d-flex align-items-center mb-3"><i
                                                                            class="bx bx-star"></i><span
                                                                            class="fw-semibold mx-2 ">Bank Name:</span> <span class="pros_loadbank_name">
                                                                            <?php 
                                                                        
                                                                              echo $rowGetUserDetails['Bank'];
                                                                            ?>
                                                                    </span></li>
                                                                    <li class="d-flex align-items-center mb-3"><i
                                                                            class="bx bx-check"></i><span
                                                                            class="fw-semibold mx-2">Account Number: <span class="pros_loadbank_accno"> <?php  echo $rowGetUserDetails['BankAccNo'];?></span></span>
                                                                       
                                                                    </li>
                                                                   
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!--/ Aount Details -->
                                                    <!-- </div> -->
                                                
                                                <!--/ Salary -->
                                       

                                    </div>


                                </div>
                                <!--/ User Profile Content -->
                            </div>
                            
                            <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">

                                <!-- Transaction History -->
                                <div class="row">
                                    <div class="col-sm-12 d-flex align-items-stretch">
                                        <div class="card w-100">
                                            <div class="card-body p-5">
                                                <div class="mb-4">
                                                    <h5 class="card-title fw-semibold">Recent Transactions
                                                    </h5>
                                                </div>
                                                <!-- <ul class="nav nav-tabs mb-3 customtab" id="exs"
                                                    role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link active" id="exs-tab-1"
                                                            data-bs-toggle="tab" href="#exs-tabs-1"
                                                            role="tab" aria-controls="exs-tabs-1"
                                                            aria-selected="true">Salary</a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link" id="ext-tab-2"
                                                            data-bs-toggle="tab" href="#ext-tabs-2"
                                                            role="tab" aria-controls="ext-tabs-2"
                                                            aria-selected="false">Transaction</a>
                                                    </li>
                                                </ul> -->
                                                <!-- <div class="tab-content" id="exs-content">
                                                    <div class="tab-pane fade show active" id="exs-tabs-1"
                                                        role="tabpanel" aria-labelledby="exs-tab-1"> -->
                                                        <!-- Salary Content -->
                                                        <div class="row p-1">
                                                            <ul
                                                                class="timeline-widget mb-0 position-relative mb-n5">
                                                                
                                                                    
                                                            
                                                            </ul>
                                                        </div>
                                                        <!--/Salary Content -->
                                                    <!-- </div>
                                                    <div class="tab-pane fade" id="ext-tabs-2"
                                                        role="tabpanel" aria-labelledby="ext-tab-2"> -->
                                                        <!-- Transaction Content -->
                                                        <!-- <div class="row p-1">
                                                            <ul
                                                                class="timeline-widget mb-0 position-relative mb-n5">
                                                                
                                                            </ul>
                                                        </div> -->
                                                        <!--/Transaction Content -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Transaction History -->
                                
                            </div>
                           
                            <div class="tab-pane fade" id="ex1-tabs-15" role="tabpanel" aria-labelledby="ex1-tab-15">
                                <div class="row">
                                     <div class="col-sm-2 col-xl-2 col-lg-2 col-md-2 p-5"> </div>
                                    <div class="col-sm-7 col-xl-7 col-lg-7 col-md-7 p-5">
                                        
                                      <div class="card card-action mb-4">
                                            
                                         <div class="row" id="createwelcomemsg-setup" style="padding:0%;">
                                             <div class="col-sm-12">
                                                 <div class="proscontainerimage select-image ">
                                                             
                                                     <h4>Signature </h4>
                                                     <input type="file" id="procickinputlogo" class="pros-logofilehere"  accept="image/*" hidden>
                                                   <div class="img-area prosbackgroundimagearea proscreatnewschooldes" data-img="" >
                                                     <i class="fas fa-cloud-upload-alt"></i>
                                                     <p>upload your Signature</p>
                                                 </div>
                                                 
                                                 </div>
                                             </div>  
                                            
                                         </div>
                                                 
                                            
                                        </div> 
                                        
                                        
                                    </div>
                                    <div class="col-sm-3 col-xl-3 col-lg-3 col-md-3 p-5"> </div>
                                </div>
                            </div>
                            
                            
                        </div>
                        <!-- Tab panes -->
                    </div>

                </div>
            </div>
            <!--/ Navbar pills -->
            <!-------End Dashboard Content ------------->

        </main>
        <!-- End Main -->

    </div>




    <!---====Edit Profile Side Modal Start Here====-->
    <div class="modal fade modalshow modalfade" id="edit-staffprofile" tabindex="-1"
        aria-labelledby="edit-staffprofileLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable dialogcontent"
            style="border-top-left-radius: 30px; width: 100%;">
            <div class="modal-content modalcontent" style="background-color:#ffffff;">
                <div class="modal-body modalbodycontent">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary"> Edit Personal Details <svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pen" viewBox="0 0 16 16">
                                <path
                                    d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                            </svg>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div style="position: fixed; margin-left: -10px; margin-top: -30px; display: flex;">
                        <img src="../../assets/images/favicon11.png" style="width: 150px; z-index: -1; opacity: 0.1;"
                            data-dismiss="modal" aria-label="Close">
                    </div>
                    <div width="300px" class="sc-UpCWa ezuGy flexi-sheet-body" open="">
                        <div width="100%" height="100%" style="padding: 20px; margin-top:40px;"
                            class="sc-pyfCe gtGxgb">
                  

                            <form>
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>First Name </label>
                                            <input class="form-control" type="text"
                                                value="<?php echo $PrimaryName;  ?>" placeholder="Enter First Name"
                                                id="fname">

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Last Name </label>
                                            <input class="form-control" type="text"
                                                value="<?php echo $SecondaryName; ?>" placeholder="Enter Last Name"
                                                id="lname">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Middle Name </label>
                                            <input class="form-control" type="text"
                                                value="<?php echo $rowGetUserDetails['AffiliateMName']; ?>"
                                                placeholder="Enter Middle Name" id="mname">

                                        </div>
                                    </div>

                                    
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group local-forms">
                                            <label>Gender </label>
                                            <select class="form-control select" id="gender">
                                                <option value="0">Select Gender</option>

                                                <?php

                                                if($rowGetUserDetails['Gender'] == 'Male')
                                                {
                                                   echo '<option value="Male" selected>Male</option>';

                                                }else if($rowGetUserDetails['Gender'] == 'Female')
                                                {
                                                    echo '<option value="Female" selected>Female</option>';
                                                }else{

                                                     echo '<option value="Male" >Male</option>
                                                     <option value="Female" >Female</option>
                                                     ';
                                                }

                                                        
                                                        
                                                ?>

                                              


                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms calendar-icon">
                                            <label>Date Of Birth </label>
                                            
                                        </div>
                                    </div> -->


                                    
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group local-forms">
                                       

                                            <label>Religion <span style="color:orangered;">*</span></label>
                                            <select class="form-control" id="pros_get_staff_religion">
                                                <option value="0">Select Religion</option>
                                                <option value="Christianity">Christianity</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Hinduism">Hinduism</option>
                                                <option value="African Traditional &amp; Diasporic">African
                                                    Traditional &amp; Diasporic</option>
                                                <option value="Agnostic">Agnostic</option>
                                                <option value="Atheist">Atheist</option>
                                                <option value="Baha'i">Baha'i</option>
                                                <option value="Buddhism">Buddhism</option>
                                                <option value="Cao Dai">Cao Dai</option>
                                                <option value="Chinese traditional religion">Chinese traditional
                                                    religion</option>
                                                <option value="Jainism">Jainism</option>
                                                <option value="Juche">Juche</option>
                                                <option value="Judaism">Judaism</option>
                                                <option value="Neo-Paganism">Neo-Paganism</option>
                                                <option value="Nonreligious">Nonreligious</option>
                                                <option value="Rastafarianism">Rastafarianism</option>
                                                <option value="Secular">Secular</option>
                                                <option value="Shinto">Shinto</option>
                                                <option value="Sikhism">Sikhism</option>
                                                <option value="Spiritism">Spiritism</option>
                                                <option value="Tenrikyo">Tenrikyo</option>
                                                <option value="Unitarian-Universalism">Unitarian-Universalism
                                                </option>
                                                <option value="Zoroastrianism">Zoroastrianism</option>
                                                <option value="primal-indigenous">primal-indigenous</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Country</label>
                                            <select class="form-control shadow-sm select" data-id="country"
                                                id="country">

                                                <?php
                        
                                                    $sqltogetcountries = mysqli_query($link,"SELECT * FROM `countries`");
                                                    $rowtogetcountries = mysqli_fetch_assoc($sqltogetcountries);
                                                    $cnttogetcountries = mysqli_num_rows($sqltogetcountries);
                                                
                                                    
                                                
                                                        if($cnttogetcountries > 0)
                                                        {
                                                            echo '
                                                                <option value="0" selected>Choose Country</option>'; 
                                                            do{

                                                                $CountryName = $rowtogetcountries['CountryName'];
                                                                $countryID = $rowtogetcountries['countryID'];

                                                                if($countryID ==   $countid)
                                                                {
                                                                $countryselected = 'selected';

                                                                }else
                                                                {
                                                                    $countryselected = '';
                                                                }

                                                            echo '
                                                                <option '.$countryselected.' value="'.$countryID.'">'.$CountryName.'</option>';

                                                            }while($rowtogetcountries = mysqli_fetch_assoc($sqltogetcountries));
                                                            
                                                        }else{
                                                            echo '
                                                            <option value="0" selected>Choose Country</option>'; 
                                                        }
                                                        ?>

                                 </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>State</label>
                                            <select class="form-control select" id="pros-staffstate">
                                                <option value="0">Please Select State </option>
                                            </select>
                                            <div id="state_error"></div>
                                        </div>
                                    </div> 
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>LGA</label>
                                            <select class="form-control select" id="pros-lga">
                                                <option value="0">Please Select LGA </option>
                                            </select>
                                            <div id="lga_error"></div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-12 col-sm-4">
                                        <div class="student-submit justify-content-center">
                                            <button type="button" class="btn btn-sm btn-primary"
                                                id="update_profile">Update</button>
                                        </div>
                                    </div> -->
                                </div>
                            </form>
                           

                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                        <i class="fa fa-times"> Close</i>
                    </button>
                    <button type="button" class="btn btn-primary btn-sm" id="pros-updatestaffpersonal-details">
                        <i class="fa fa-edit"> Update</i>
                    </button>
                </div>

            </div>
        </div>
    </div>
    <!---====End Edit Profile Side Modal End Here====-->



    <!---====Edit Profile Side Modal Start Here====-->
    <div class="modal fade modalshow modalfade" id="edit-proscontactprofile" tabindex="-1"
        aria-labelledby="edit-staffprofileLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable dialogcontent"
            style="border-top-left-radius: 30px; width: 100%;">
            <div class="modal-content modalcontent" style="background-color:#ffffff;">
                <div class="modal-body modalbodycontent">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary"> Edit Personal Details <svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pen" viewBox="0 0 16 16">
                                <path
                                    d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                            </svg>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div style="position: fixed; margin-left: -10px; margin-top: -30px; display: flex;">
                        <img src="../../assets/images/favicon11.png" style="width: 150px; z-index: -1; opacity: 0.1;"
                            data-dismiss="modal" aria-label="Close">
                    </div>
                    <div width="300px" class="sc-UpCWa ezuGy flexi-sheet-body" open="">
                        <div width="100%" height="100%" style="padding: 20px; margin-top:40px;"
                            class="sc-pyfCe gtGxgb">

                            <form>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group local-forms">
                                            <label>Phone </label>
                                            <input class="form-control" type="text"
                                                value="<?php echo $Phone;?>" placeholder="Enter phone Number"
                                                id="prosstaffnumberedit">

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group local-forms">
                                            <label>Email</label>
                                            <input class="form-control" disabled type="text"
                                                value="<?php echo $Email;?>" placeholder="Enter Email"
                                                id="prosstaffemailedit">
                                        </div>
                                    </div>

                                   
                                      

                                    <div class="col-12 col-sm-12">
                                        <div class="form-group local-forms">
                                            <label>Address </label>
                                            <textarea class="form-control" id="prosstaffadress" rows="3"><?php echo $Address;?></textarea>
                                        </div>
                                    </div>

                                   
                                   
                                    
                                </div>
                            </form>
                           

                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                        <i class="fa fa-times"> Close</i>
                    </button>
                    <button type="button" class="btn btn-primary btn-sm" id="pros-contactinfobtnhere">
                        <i class="fa fa-edit"> Update</i>
                    </button>
                </div>

            </div>
        </div>
    </div>
    <!---====End Edit Profile Side Modal End Here====-->



      <!---====Edit Profile Bank Details Start Here====-->
      <div class="modal fade modalshow modalfade" id="edit_accdetail_modal" tabindex="-1"
        aria-labelledby="edit_accdetail_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable dialogcontent"
            style="border-top-left-radius: 30px; width: 100%;">
            <div class="modal-content modalcontent" style="background-color:#ffffff;">
                <div class="modal-body modalbodycontent">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary"> Edit Bank Details <svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pen" viewBox="0 0 16 16">
                                <path
                                    d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                            </svg>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div style="position: fixed; margin-left: -10px; margin-top: -30px; display: flex;">
                        <img src="../../assets/images/favicon11.png" style="width: 150px; z-index: -1; opacity: 0.1;"
                            data-dismiss="modal" aria-label="Close">
                    </div>
                    <div width="300px" class="sc-UpCWa ezuGy flexi-sheet-body" open="">
                        <div width="100%" height="100%" style="padding: 20px; margin-top:40px;"
                            class="sc-pyfCe gtGxgb">

                            <form>
                                <div class="row">
                              

                                <div class="col-12 mb-2">
                                    <div class="form-floating ">
                                        <select class="form-select bank_code_input_pros"
                                            style="font-size: 13px; border: none; border-bottom: #b3b3b3 solid 1px;"
                                            id="floatingSelect" aria-label="Floating label select example">
                                            <option selected></option>
                                            <?php
                                            $abba_sql_banks = ("SELECT * FROM `banks` ORDER BY name ASC");
                                            $abba_result_banks = mysqli_query($link, $abba_sql_banks);
                                            $abba_row_banks = mysqli_fetch_assoc($abba_result_banks);
                                            $abba_row_cnt_banks = mysqli_num_rows($abba_result_banks);
                                            
                                            if ($abba_row_cnt_banks > 0) {
                                                do {


                                                    if( $rowGetUserDetails['Bank'] == $abba_row_banks['name'])
                                                    {
                                                        $bank_pros_sel = 'selected';
                                                    }else
                                                    {
                                                        $bank_pros_sel = '';
                                                    }
                                                   

                                                    
                                            
                                                    echo '<option value="' . $abba_row_banks['code'] . '" data-id="'.$abba_row_banks['name'].'" '.$bank_pros_sel.'>' . $abba_row_banks['name'] . '</option>';
                                            
                                                } while ($abba_row_banks = mysqli_fetch_assoc($abba_result_banks));
                                            } else {
                                                echo '<option value="0">No Records Found</option>';
                                            }
                                            ?>
                                        </select>
                                        <label for="floatingSelect">Select Bank</label>
                                    </div>
                                </div>

                                
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" value="<?php echo $rowGetUserDetails['BankAccName'];?>"
                                            style="height: 50px; border: none; border-bottom: #b3b3b3 solid 1px;"
                                            class="form-control form-control-sm account_name" id="pros_affiliate_account_nameedit"
                                            placeholder="Acc No">
                                        <label for="floatingInput"
                                            style="color: #afafaf; margin-top: 2px; font-weight: 500;">Account
                                        Name</label>
                                    </div>
                                </div>



                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" value="<?php echo $rowGetUserDetails['BankAccNo'];?>"
                                            style="height: 50px; border: none; border-bottom: #b3b3b3 solid 1px;"
                                            class="form-control form-control-sm account_name" id="pros_affiliate_account_noedit"
                                            placeholder="name">
                                        <label for="floatingInput"
                                            style="color: #afafaf; margin-top: 2px; font-weight: 500;">Account
                                        Number</label>
                                    </div>
                                </div>


                                    
                             </div>
                            </form>
                           

                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                        <i class="fa fa-times"> Close</i>
                    </button>
                    <button type="button" class="btn btn-primary btn-sm" id="pros_edit_bankdetails_btn">
                        <i class="fa fa-edit"> Save</i>
                    </button>
                </div>

            </div>
        </div>
    </div>
    <!---====End Edit Bank Details Here====-->



        <!-- Image Modal -->
        <div id="prosloadstaffimagemodal" class="modal" role="dialog">
            <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Profile Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-12 col-lg-12 p-2">
                        <div id="prosloadimage"></div>
                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success btn-sm prosuploalogobtnhere">Save</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
        <!-- End Image Modal -->
        
 
 
 
 
 
 
 
 
 
 
 
    <!-- Chima JS- -->
    <script src="../../js/user_js/teacher_js/staffScript.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

     <script src="../../js/admin_js/adminScript.js"></script>
 
    <!--Notifier UI -->
    <script src="../../assets/plugins/notify/wnoty.js"></script>
    <!--CALENDER UI JS -->
    <script src="../../js/website_js/Calender UI/cal.js"></script>
    
    <script src="../../controller\js\app\leave_application.js"></script>

     <script src="../../js/admin_js/adminScript.js"></script>


   <!-- image cropper js -->
     <script src="../../assets/plugins/Croppie/croppie.js"></script>
     <script src="../../assets/plugins/Croppie/croppie.min.js"></script>
        <!--Chart UI JS -->
    <script src="../../js/website_js/Charts/morris.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
    <!--google chart-->

    <!--Apexcharts-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.40.0/apexcharts.min.js"></script>


    <?php include('../../controller/js/affiliate/profile.php'); ?>

    

</body>

</html>