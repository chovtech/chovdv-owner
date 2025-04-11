<?php

include('../../controller/session/session-checker-owner.php');

if ($DefaultLanguage == '') {
    include('../../lang/english.php');

} else {
    include('../../lang/' . $DefaultLanguage . '.php');
}


mysqli_set_charset($link, 'utf8');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->

    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/users/favicon.png">
    <title>

        |

        <?php echo $fullname; ?>

    </title>

    <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">
    <script src="../../assets/plugins/jquery/code.jquery.com_jquery-3.5.1.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="../../assets/plugins/notify/wnoty.css" rel="stylesheet">

    <!-- style sheet -->
    <link rel="stylesheet" href="../../css/app_css/appStyle.css">
    <link rel="stylesheet" href="../../css/app_css/menupermission.css">
    <link rel="stylesheet" href="../../assets/plugins/Croppie/croppie.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/1.11.3/css/jquery.dataTables.min.css"> -->

    <!--=== style sheet==-->

    


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

          <div class="row ">
                
            <div class="col-sm-1"></div>
             
                <div class="col-sm-10" >
                   
                        <span class="pros-schoolheading" style="line-height:35px;" >Select an admin</span>
                        <span class="" style="font-family: poppins, sans-serif;color: #363949;font-size:12px;">
                           kindly select an admin to assign your choice of menu just below.
                        </span> 
                   
                    
                        <div class="select-menu">

                            <div class="select-btn">
                                <span class="sBtn-text">Select Admin</span>
                                     <i class="bx bx-chevron-down"></i>
                            </div>
                               
                            <ul class="options proshideadminmenu">
                               <div id="prosloadadmin-info"></div>
                                
                            </ul>
                        </div>
                        
                </div>

              
                <div class="col-sm-1"></div>
                    <div class="col-sm-1"></div>
                   <div class="col-sm-10 pros-loadpermission-menuhere">

                       <div class="prosloamenucontentready" style="display:none;">
                       
                     
                            <?php
                                    $counter = 0;

                                    $select_main_menu = mysqli_query($link, "SELECT * FROM `mainmenu`");
                                    $select_main_menu_cnt = mysqli_num_rows($select_main_menu);

                                    echo  '<input type="hidden" id="prosgetstaffIDinsert" >';

                                   
                                    echo '<div class="row">
                                        <div class="form-check ms-3" style="position:relative;top:0.7rem;">
                                                <input class="form-check-input check-all pros-generalcheckedallfeatures" style="height: 18px; width: 18px;cursor:pointer;"  type="checkbox" id="proscheckAllapplicant">
                                                <label class="form-check-label pros-schoolheading" style="font-size:13px;"  for="checkAll"> All Features </label>
                                        </div>';
                                    
                                    while ($select_main_menu_cnt_row = mysqli_fetch_assoc($select_main_menu)) {
                        
                                        $mainmenu_name = $select_main_menu_cnt_row['MainMenuName'];
                                        $mainplanID = $select_main_menu_cnt_row['PlanID'];
                                        $mainmenuID = $select_main_menu_cnt_row['MainMenuID'];
                                    
                                        // Convert a string to an array
                                        $array_mainplanID = str_split($mainplanID);
                                    
                                        echo '<div class="col-sm-6" style="margin-top: 3%; border-radius: 20px;">
                                            <div class="card" style="border: none;">
                                                <div class="card-body prosloadmaimmenugeneral" data-id="'.$mainmenuID .'">
                                                    <div class="clearfix" style="cursor: pointer;"  data-bs-toggle="collapse" data-bs-target="#pros-submenu-collapse'.$mainmenuID.'" aria-expanded="false" aria-controls="pros-submenu-collapse'.$mainmenuID.'">
                                                        <input class="form-check-input float-start pros-selectall-mainmenuhere proscheckedmenu'.$mainmenuID.'" data-id="'.$mainmenuID .'"   type="checkbox" id="proscheckAllapplicant">&nbsp;&nbsp;
                                                        <h3 style="font-size: 17px; cursor: pointer;" class="text-primary pros-mainmenugeneralclass float-start ms-2" data-id="'.$mainmenuID.'">
                                                            '.$mainmenu_name.'
                                                        </h3>
                                                        <i class="fas fa-chevron-down float-end"></i>
                                                    </div>
                                                    
                                                    <div class="collapse" id="pros-submenu-collapse'.$mainmenuID.'">
                                                    <span class="pros-schoolheading" style="line-height:35px;font-size:14px;" >Give Menu Access</span>
                                    
                                                    <span  style="font-family: poppins,sans-serif;color: #363949;font-size:12px;display:block;">
                                                        kindly click on each sub menu to give menu previledge.
                                                    </span>
                        
                                                    <p></p>';
                        
                        
                                                            echo '<input type="hidden" value="'.$mainmenuID.'" id="pros-getmainmenu-first">';
                                                
                                                            // echo $mainmenuID;
                                                            $select_sub_menu = mysqli_query($link,"SELECT * FROM `submenu` WHERE MainMenuID='$mainmenuID'");
                                                            $select_sub_menu_cnt = mysqli_num_rows($select_sub_menu);
                                                            $select_sub_menu__cnt_row = mysqli_fetch_assoc($select_sub_menu);
                        
                        
                                                            
                        
                                                            if( $select_sub_menu_cnt > 0)
                                                            {
                                                                        $firstIteration = true;
                                                            
                                                                        do{
                                                                                    $submenu_name = $select_sub_menu__cnt_row['SubmenuName'];
                                                                                    $submenu_ID = $select_sub_menu__cnt_row['SubMenuID'];

                                                                                    $counter++;
                        
                                                                                echo '<div class="accordion prosgeneralsubmenuchecked'.$mainmenuID.'" data-id="'.$submenu_ID.'" id="accordionPanelsStayOpenExample" >
                                                                                            <div class="accordion-item" style="border:none;">';
                        
                                                                                            if($submenu_name == '')
                                                                                            {
                                                                                                
                                                                                                echo '<h2 class="accordion-header" id="panelsStayOpen-headingOne'.$submenu_ID.'">
                                                                                                        <button class="accordion-button" style="font-size:14px;" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne'.$submenu_ID.'" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                                                                                        '.$mainmenu_name.'
                                                                                                        </button>
                                                                                                    </h2>';
                                                                                            }else
                        
                                                                                            {
                                                                                                        echo '<h2 class="accordion-header" id="panelsStayOpen-headingOne'.$submenu_ID.'">
                                                                                                                <button class="accordion-button" style="font-size:14px;" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne'.$submenu_ID.'" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                                                                                                '.$submenu_name.'
                                                                                                                </button>
                                                                                                            </h2>';
                                                                                            }
                        
                        
                                                                                        
                        
                                                                                            echo '<div id="panelsStayOpen-collapseOne'.$submenu_ID.'" class="accordion-collapse collaps " aria-labelledby="panelsStayOpen-headingOne'.$submenu_ID.'">
                                                                                                <div class="accordion-body">

                                                                                                            
                                                                                                        ';
                                                                                                            
                                                                                                                if($mainmenuID == 5)
                                                                                                                {
                                                                                                                   
                                                                                                                      
                                                                                                                               
                                                                                                                                       
                                                                                                                                     echo '<fieldset class="tari-tari_checkbox-group">
                                                                                                                                        <div class="tari_checkbox float-start" >
                                                                                                                                        <label  for="editcheckbox'.$submenu_ID.'" class="tari_checkbox-wrapper">
                                                                                                                                            <input type="checkbox" id="editcheckbox'.$submenu_ID.'" value="1" class="tari_checkbox-input prosgeneralselpreviledgestatus proscheckedallmenupreviledge'.$mainmenuID.'"   />
                                                                                                                                            <span class="tari_checkbox-tile">
                                                                                                                                            <span class="tari_checkbox-label">Edit</span>
                                                                                                                                            </span>
                                                                                                                                        </label>
                                                                                                                                       </div>
                            
                                                                                                                                        <div class="tari_checkbox">
                                                                                                                                        <label class="tari_checkbox-wrapper">
                                                                                                                                            <input type="checkbox" id="deletecheckbox'.$submenu_ID.'" value="2"  class="tari_checkbox-input prosgeneralselpreviledgestatus proscheckedallmenupreviledge'.$mainmenuID.'" />
                                                                                                                                            <span class="tari_checkbox-tile">
                                                                                                                                            <span class="tari_checkbox-label">Delete</span>
                                                                                                                                            </span>
                                                                                                                                        </label>
                                                                                                                                        </div>
                                                                                                                                        
                                                                                                                                        
                                                                                                                                       
                                                                                                                                       <div class="tari_checkbox">
                                                                                                                                            <label class="tari_checkbox-wrapper">
                                                                                                                                                <input type="checkbox" id="viewcheckbox'.$submenu_ID.'" value="3"  class="tari_checkbox-input prosgeneralselpreviledgestatus proscheckedallmenupreviledge'.$mainmenuID.'" />
                                                                                                                                                <span class="tari_checkbox-tile">
                                                                                                                                                <span class="tari_checkbox-label">View </span>
                                                                                                                                                </span>
                                                                                                                                            </label>
                                                                                                                                        </div>
                                                                                                                                       </fieldset>';
                                                                                                                                         
                                                                                                                    }else
                                                                                                                    {
                                                                                                                       
                                                                                                                       
                                                                                                                       
                                                                                                                               echo '
                                                                                                                                       
                                                                                                                                     <fieldset class="tari-tari_checkbox-group mr-5">
                                                                                                                                        <div class="tari_checkbox float-start">
                                                                                                                                        <label  for="editcheckbox'.$submenu_ID.'" class="tari_checkbox-wrapper">
                                                                                                                                            <input type="checkbox" id="editcheckbox'.$submenu_ID.'" value="1" class="tari_checkbox-input prosgeneralselpreviledgestatus proscheckedallmenupreviledge'.$mainmenuID.'"   />
                                                                                                                                            <span class="tari_checkbox-tile">
                                                                                                                                            <span class="tari_checkbox-label">Edit</span>
                                                                                                                                            </span>
                                                                                                                                        </label>
                                                                                                                                        </div>
                            
                                                                                                                                        <div class="tari_checkbox">
                                                                                                                                        <label class="tari_checkbox-wrapper">
                                                                                                                                            <input type="checkbox" id="deletecheckbox'.$submenu_ID.'" value="2"  class="tari_checkbox-input prosgeneralselpreviledgestatus proscheckedallmenupreviledge'.$mainmenuID.'" />
                                                                                                                                            <span class="tari_checkbox-tile">
                                                                                                                                            <span class="tari_checkbox-label">Delete</span>
                                                                                                                                            </span>
                                                                                                                                        </label>
                                                                                                                                        </div>
                                                                                                                                       
                                                                                                                                      
                                                                                                                                        ';    
                                                                                                                       
                                                                                                                       
                                                                                                                       
                                                                                                                        
                                                                                                                    }
                                                                                                             
                                                                                                            
                                                                                                            
                                                                                                      echo  '
                                                                                                                
                                                                                                </div>
                                                                                            </div>
                                                                                            </div>
                                                                                        </div>';



                                                                        }while($select_sub_menu__cnt_row = mysqli_fetch_assoc($select_sub_menu));
                                                            }else
                                                            {
                                                                        
                                                            }
                                                        
                                                echo '</div>
                                                </div>
                                            </div>
                                        </div>';
                                    }
                                    
                                    echo '</div><br>';
                                    
                        
                                echo  '<button type="button" class="btn btn-primary pros-submitpermissionbtn" style="width:100%;">Submit <i class="fa fa-arrow-right"></i></button>';                                
                            ?>
                       </div>
                         
                     <?php
                             $selectdefaultimages = mysqli_query($link,"SELECT * FROM `defaultimages` WHERE `ImageName`='tari_error_Opps'");
                             $selectdefaultimagescnt = mysqli_num_rows($selectdefaultimages);
                             $selectdefaultimagescntrow = mysqli_fetch_assoc($selectdefaultimages);
                            
                            $selectdefaultimage = $selectdefaultimagescntrow['BaseSixtyFour'];
                      ?>
                                  <center id="prosloadmessageforchoice">
                                    <img src="<?php echo $selectdefaultimage; ?>" width="200">

                                      <p class="pt-2 fs-6 text-secondary">select an admin to assign the menu of your choice.</p>
                                
                                </center>


                   </div>
                   <div class="col-sm-1"></div>
            </div>  
               
        </main>
    </div>



    <!--jquery  -->
    <script src="../../assets/plugins/jquery/jquery.min.js"></script>
    <!--jquery knob -->
    <script src="../../assets/plugins/knob/jquery.knob.js"></script>

    <script>
        $(function () {
            $('[data-plugin="knob"]').knob();
        });
    </script>
    <!--Custom JS--->
    <script src="../../js/app_js/appScript.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- header js -->
    <script src="../../controller/js/app/header.js"></script>
    <script src="../../assets/plugins/notify/wnoty.js"></script>

    <!-- image cropper js -->
    <script src="../../assets/plugins/Croppie/croppie.js"></script>
    <script src="../../assets/plugins/Croppie/croppie.min.js"></script>

    <!-- header js -->
    <?php include('../../controller/js/app/header.php'); ?>
    <?php include('../../controller/js/app/menupermission.php'); ?>
    <!-- <script src="https://cdn.datatables.net/v/1.11.3/js/jquery.dataTables.min.js"></script> -->

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>



</body>

</html>