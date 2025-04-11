<?php
            include('../../config/config.php');

           $groupofschoolID = $_POST['groupSchoolID'];
           
          

            if (isset($_POST['UserID'])) {


               $UserID  = $_POST['UserID'];

                echo '<div class="col-sm-3 d-none d-sm-block d-xm-block "  style="margin-top:5%;">
    
                <div class="pros-diskschooltitle flexi-wizard-title"><h1>Grant Access </h1></div><br>
              
                  <div class="pros-dotted-box">
                          <span class="schooliconinform" >
                          <img  class="schooliconinform-image" src="../../assets/images/users/menu-access.png" >
                             
                          </span>
                          
                  </div>
                 
              </div>
    
              <div class="col-sm-6" style="margin-top:3%;">
                   <span class="pros-schoolheading" style="line-height: 35px; margin-left:11%;" >Give Menu Access</span>
    
                  <span class="" style="margin-left:11%;font-family: poppins, sans-serif;color: #363949;font-size:12px;">
                     Select the menus you want your staff to have access to.
                  </span>
    
                  <span direction="vertical" class=""></span><br><br>
                  <div clases="table-responsive">
                  <table class="table table-borderless pros-stffmenuacces-table"  style="border:none;padding:0% 50%;margin-left:17px;">
                  
                  <tbody  style="border:none;">';
    
                  $verify_plan_from_sch = mysqli_query($link,"SELECT * FROM `institution` WHERE   InstitutionID='$groupofschoolID'");
                  $verify_plan_from_sch_cnt = mysqli_num_rows($verify_plan_from_sch);
                  $verify_plan_from_sch_cnt_row = mysqli_fetch_assoc($verify_plan_from_sch);
                  
                   $planID = $verify_plan_from_sch_cnt_row['ActualPlan'];

                    
                        $select_main_menu = mysqli_query($link,"SELECT * FROM `mainmenu`");
                        $select_main_menu_cnt = mysqli_num_rows($select_main_menu);
                        $select_main_menu_cnt_row = mysqli_fetch_assoc($select_main_menu);

                        do{
                             $mainmenu_name = $select_main_menu_cnt_row['MainMenuName'];  
                             $mainplanID = $select_main_menu_cnt_row['PlanID'];  
                             $mainmenuID = $select_main_menu_cnt_row['MainMenuID']; 

                              //convert a string to an array 
                             $array_mainplanID  = str_split($mainplanID);

                            //  if (in_array($planID, $array_mainplanID)) {

                                            echo '<input type="hidden" value="'.$mainmenuID.'" id="pros-getmainmenu-first">';

                                              $select_sub_menu = mysqli_query($link,"SELECT * FROM `submenu` WHERE MainMenuID='$mainmenuID'");
                                              $select_sub_menu_cnt = mysqli_num_rows($select_sub_menu);
                                              $select_sub_menu__cnt_row = mysqli_fetch_assoc($select_sub_menu);
                                              
                                                
                                              echo '<tr style=" padding: 4px;">
                                              <th scope="row"></th>
                                              <td>
                                                  <h3 style="font-size:16px;cursor:pointer;" class="text-primary pros-mainmenugeneralclass" data-id="'.$mainmenuID.'" data-bs-toggle="collapse" data-bs-target="#pros-submenu-collapse'.$mainmenuID .'" aria-expanded="false" aria-controls="pros-submenu-collapse'.$mainmenuID .'">'.$mainmenu_name.'</h3> 
                                                  <p class="pros-menuaccess-para">Do  you want to give this staff access to '.$mainmenu_name.' menu?</p>';
                                                       
                                                          if($select_sub_menu_cnt > 0)
                                                          {

                                                              echo '<div class="collapse" id="pros-submenu-collapse'.$mainmenuID.'">
                                                              
                                                              <div class="row">';

                                                               do{

                                                                      $submenu_name = $select_sub_menu__cnt_row['SubmenuName'];
                                                                      $submenu_ID = $select_sub_menu__cnt_row['SubMenuID'];
                                                                      $submenu_plan_ID = $select_sub_menu__cnt_row['PlanID'];

                                                                      $array_subplanID  = str_split($submenu_plan_ID);

                                                                   
                                                                         
                                                                          echo '<div class="col-6">
                                                                                          <div class="form-check">
                                                                                                  <input class="form-check-input  pros-checkchildren prossubmenuclass'.$mainmenuID.'"  type="checkbox" data-pros-menuper-status="1,2,3" data-pros-main-menu="'.$mainmenuID.'" value="'.$submenu_ID.'" id="flexCheckIndeterminateDisabled" >
                                                                                                  <label class="form-check-label pros-submenuaccess-style"  style="font-size:12px;cursor:pointer;" for="flexCheckIndeterminateDisabled">
                                                                                                      '.$submenu_name.'
                                                                                                  </label>
                                                                                          </div>
                                                                                </div>';
                                                                            

                                                               }while($select_sub_menu__cnt_row = mysqli_fetch_assoc($select_sub_menu));


                                                               echo '
                                                                  </div>

                                                                  </div>
                                                               ';
                                                          }else
                                                          {

                                                          }        
                  
                                              echo '</td>
                                              
                                              <td>
                                                  <div class="form-check">
                                                      <input type="checkbox" class="pros-checkbox-input mainmenu pros-mainmenugeneralclass prosgeneralmenuchecked'.$mainmenuID.'" data-id="'.$mainmenuID.'" id="myschool" data-bs-toggle="collapse" data-bs-target="#pros-submenu-collapse'.$mainmenuID .'" aria-expanded="false" aria-controls="pros-submenu-collapse'.$mainmenuID .'"  name="todo" value="todo">
                                                          <label id="pros-checkbox-label" for="myschool"></label>
                                                      </div>
                                              </td>
                                          </tr >';


                            //   } else {
                                
                            //   }

                        }while($select_main_menu_cnt_row = mysqli_fetch_assoc($select_main_menu));
             
                echo '
                
                        </tbody>
                          </table>
                          </div>
    
                      
                      &nbsp;&nbsp;
                      <button type="button" id="pros-checkmenu-foradmin"   style="background-color:#007bff;cursor:pointer;width:90%;margin-left:11%;font-size:14px;" class="btn btn-block btn-lg text-light">Next</button>
    
    
              </div>
    
              <div class="col-sm-3 d-none d-sm-block d-xm-block" style="margin-top:6%;padding-left:80px;">
                      <div class="pros-progressbarstep-staff">
                          <span style="position:absolute;right:13rem;font-size:12px;font-weight:700;">Grant Access</span>
                      <div class="outer-circle" align="center">
                              <div class="inner-circle"></div>
                          </div>
                          <div class="vertical-line"> </div>
                          <div class="outer-circlenew" align="center">
                              <div class="inner-circle-down"></div>
                          </div>
                          <span style="position:absolute;right:13rem;top:20.1rem;font-size:12px;">Create admin</span>
                      </div>
              </div>';
    







            }else
            {


          echo '<div class="col-sm-3 d-none d-sm-block d-xm-block "  style="margin-top:5%;">
                <div class="pros-diskschooltitle flexi-wizard-title"><h1>Grant Access </h1></div><br>
                  <div class="pros-dotted-box">
                          <span class="pros-schooliconinform" >
                          <img  class="pros-schooliconinform-image" src="../../assets/images/users/menu-access.png" >
                          </span>
                  </div>
              </div>
    
              <div class="col-sm-6" style="margin-top:3%;">
                   <span class="pros-schoolheading" style="line-height: 35px; margin-left:5%;" >Give Menu Access</span>
    
                  <span class="" style="margin-left:5%;font-family: poppins, sans-serif;color: #363949;font-size:12px;">
                     Select the menus you want your staff to have access to.
                  </span>
    
                  <span direction="vertical" class=""></span><br><br>
                  <div clases="table-responsive">
                  <table class="table table-borderless pros-stffmenuacces-table"  style="border:none;padding:0% 50%;">
                  
                          <tbody  style="border:none;">';
    
                                $verify_plan_from_sch = mysqli_query($link,"SELECT * FROM `institution` WHERE   InstitutionID='$groupofschoolID'");
                                $verify_plan_from_sch_cnt = mysqli_num_rows($verify_plan_from_sch);
                                $verify_plan_from_sch_cnt_row = mysqli_fetch_assoc($verify_plan_from_sch);
                                
                                 $planID = $verify_plan_from_sch_cnt_row['ActualPlan'];
    
                                  
                                      $select_main_menu = mysqli_query($link,"SELECT * FROM `mainmenu`");
                                      $select_main_menu_cnt = mysqli_num_rows($select_main_menu);
                                      $select_main_menu_cnt_row = mysqli_fetch_assoc($select_main_menu);
    
                                      do{
                                           $mainmenu_name = $select_main_menu_cnt_row['MainMenuName'];  
                                           $mainplanID = $select_main_menu_cnt_row['PlanID'];  
                                           $mainmenuID = $select_main_menu_cnt_row['MainMenuID']; 
    
                                            //convert a string to an array 
                                           $array_mainplanID  = str_split($mainplanID);
    
                                        //    if (in_array($planID, $array_mainplanID)) {
    
                                                          echo '<input type="hidden" value="'.$mainmenuID.'" id="pros-getmainmenu-first">';
    
                                                            $select_sub_menu = mysqli_query($link,"SELECT * FROM `submenu` WHERE MainMenuID='$mainmenuID'");
                                                            $select_sub_menu_cnt = mysqli_num_rows($select_sub_menu);
                                                            $select_sub_menu__cnt_row = mysqli_fetch_assoc($select_sub_menu);
                                                            
                                                              
                                                            echo '<tr style=" padding: 4px;">
                                                            <th scope="row"></th>
                                                            <td>
                                                                <h3 style="font-size:16px;cursor:pointer;" class="text-primary pros-mainmenugeneralclass" data-id="'.$mainmenuID.'" data-bs-toggle="collapse" data-bs-target="#pros-submenu-collapse'.$mainmenuID .'" aria-expanded="false" aria-controls="pros-submenu-collapse'.$mainmenuID .'">'.$mainmenu_name.'</h3> 
                                                                <p class="pros-menuaccess-para">Do  you want to give this staff access to '.$mainmenu_name.' menu?</p>';
                                                                     
                                                                        if($select_sub_menu_cnt > 0)
                                                                        {
    
                                                                            echo '<div class="collapse" id="pros-submenu-collapse'.$mainmenuID.'">
                                                                            
                                                                            <div class="row">';
    
                                                                             do{
    
                                                                                    $submenu_name = $select_sub_menu__cnt_row['SubmenuName'];
                                                                                    $submenu_ID = $select_sub_menu__cnt_row['SubMenuID'];
                                                                                    $submenu_plan_ID = $select_sub_menu__cnt_row['PlanID'];
    
                                                                                    $array_subplanID  = str_split($submenu_plan_ID);
    
                                                                                    // if(in_array($planID, $array_mainplanID))
                                                                                    // {
                                                                                    
                                                                                       
                                                                                        echo '<div class="col-6">
                                                                                                        <div class="form-check">
                                                                                                                <input class="form-check-input  pros-checkchildren prossubmenuclass'.$mainmenuID.'"  type="checkbox" data-pros-menuper-status="1,2,3" data-pros-main-menu="'.$mainmenuID.'" value="'.$submenu_ID.'" id="flexCheckIndeterminateDisabled" >
                                                                                                                <label class="form-check-label pros-submenuaccess-style"  style="font-size:12px;cursor:pointer;" for="flexCheckIndeterminateDisabled">
                                                                                                                    '.$submenu_name.'
                                                                                                                </label>
                                                                                                        </div>
                                                                                                </div>
                                                                                           ';
                                                                                    // }else{
                                                                                       
                                                                                    // }    
    
                                                                             }while($select_sub_menu__cnt_row = mysqli_fetch_assoc($select_sub_menu));
    
    
                                                                             echo '
                                                                                </div>
    
                                                                                </div>
                                                                             ';
                                                                        }else
                                                                        {
    
                                                                        }        
                                
                                                            echo '</td>
                                                            
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="pros-checkbox-input mainmenu pros-mainmenugeneralclass prosgeneralmenuchecked'.$mainmenuID.'" data-id="'.$mainmenuID.'" id="myschool" data-bs-toggle="collapse" data-bs-target="#pros-submenu-collapse'.$mainmenuID .'" aria-expanded="false" aria-controls="pros-submenu-collapse'.$mainmenuID .'"  name="todo" value="todo">
                                                                        <label id="pros-checkbox-label" for="myschool"></label>
                                                                    </div>
                                                            </td>
                                                        </tr >';
    
    
                                            // } else {
                                            
                                            // }
    
                                      }while($select_main_menu_cnt_row = mysqli_fetch_assoc($select_main_menu));
                           
                              echo '
                              
                          </tbody>
                          </table>
                          </div>
    
                      
                      &nbsp;&nbsp;
                      <button type="button" id="pros-checkmenu-foradmin"   style="background-color:#007bff;cursor:pointer;width:90%;font-size:14px;" class="btn btn-block btn-lg text-light">Next</button>
    
    
              </div>
    
              <div class="col-sm-3 d-none d-sm-block d-xm-block" style="margin-top:6%;padding-left:80px;">
                      <div class="pros-progressbarstep-staff">
                          <span style="position:absolute;right:13rem;font-size:12px;font-weight:700;">Grant Access</span>
                      <div class="pros-outer-circle" align="center">
                              <div class="pros-inner-circle"></div>
                          </div>
                          <div class="pros-vertical-line"> </div>
                          <div class="pros-outer-circlenew" align="center">
                              <div class="pros-inner-circle-down"></div>
                          </div>
                          <span style="position:absolute;right:13rem;top:20.1rem;font-size:12px;">Create admin</span>
                      </div>
              </div>';
    




            }

           



?>