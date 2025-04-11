<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);

 include('../../../config/config.php');

   $usertype = $_POST["usertype"];
   $instutition = $_POST["instutition"];
   $campus = $_POST["campus"];
   
     
    if ($usertype == 'teacher'){
      
      $select_all_teacher  = "SELECT * FROM `staff` WHERE `InstitutionID` = '$instutition' AND `Role` = 'teacher' ORDER BY `StaffLastName` ASC";
       $ekene_query_link_teacher = mysqli_query($link, $select_all_teacher);
       $ekene_get_details_teacher = mysqli_fetch_assoc($ekene_query_link_teacher);
       $ekene_row_cnt_ekeneteacher = mysqli_num_rows($ekene_query_link_teacher);
       
        if($ekene_row_cnt_ekeneteacher > 0){
            do{
                
                $StaffID = $ekene_get_details_teacher['StaffID'];
                $StaffFirstName = $ekene_get_details_teacher['StaffFirstName'];
                $StaffMiddleName = $ekene_get_details_teacher['StaffMiddleName'];
                $StaffLastName = $ekene_get_details_teacher['StaffLastName'];

                $select_from_checked_member = "SELECT * FROM `member` WHERE `InstitutionorCampusID` = '$instutition' AND `Usertype` = 'teacher' AND `UserID` = '$StaffID' AND  Deletestatus = 0";
                $ekene_query_link_memeber = mysqli_query($link, $select_from_checked_member);
                $ekene_get_details_memeber = mysqli_fetch_assoc($ekene_query_link_memeber);
                $ekene_row_cnt_ekenememeber = mysqli_num_rows($ekene_query_link_memeber);
                 if ($ekene_row_cnt_ekenememeber > 0)
                 {
                    echo '
                    <label value="'.$StaffID.'" style="color: #999">
                        <input type="checkbox" class="ekenecheckeboxtopic" data-id="'.$StaffID.'" name="group" value="'.$StaffLastName.' '.$StaffFirstName.' '.$StaffMiddleName.'" />
                        '.$StaffLastName.' '.$StaffFirstName.' '.$StaffMiddleName.'
                    </label><br>
                ';
                
                }else{
                    echo '
                    <label value="'.$StaffID.'" >
                        <input type="checkbox" class="ekenecheckeboxtopic" data-id="'.$StaffID.'" name="group" value="'.$StaffLastName.' '.$StaffFirstName.' '.$StaffMiddleName.'"/>
                        '.$StaffLastName.' '.$StaffFirstName.' '.$StaffMiddleName.'
                    </label><br>
                               ';
                }
            }while($ekene_get_details_teacher = mysqli_fetch_assoc($ekene_query_link_teacher));
        }
        else{
            echo '<label value="NULL">No Records Found</label>';
        }

        
    }elseif ($usertype == 'admin'){

        $slect_all_admin  = "SELECT * FROM `staff` WHERE `InstitutionID` = '$instutition' AND `Role` = 'admin' ORDER BY `StaffLastName` ASC";
        $ekene_query_link_admin = mysqli_query($link, $slect_all_admin);
        $ekene_get_details_admin = mysqli_fetch_assoc($ekene_query_link_admin);
        $ekene_row_cnt_ekeneadmin = mysqli_num_rows($ekene_query_link_admin);
        
        
 
        if($ekene_row_cnt_ekeneadmin > 0){ 
            do{
                $StaffID = $ekene_get_details_admin['StaffID'];
                $StaffFirstName = $ekene_get_details_admin['StaffFirstName'];
                $StaffMiddleName = $ekene_get_details_admin['StaffMiddleName'];
                $StaffLastName = $ekene_get_details_admin['StaffLastName'];

                $select_from_checked_membertwo = "SELECT * FROM `member` WHERE `InstitutionorCampusID` = '$instutition' AND `Usertype` = 'admin' AND `UserID` = '$StaffID' AND  deletestatus = 0";
                $ekene_query_link_memebertwo = mysqli_query($link, $select_from_checked_membertwo);
                $ekene_get_details_memebertwo = mysqli_fetch_assoc($ekene_query_link_memebertwo);
                $ekene_row_cnt_ekenememebertwo = mysqli_num_rows($ekene_query_link_memebertwo);

                if ($ekene_row_cnt_ekenememebertwo > 0){
                    echo '
                    <label value="'.$StaffID.'" style="color: #999;" >
                        <input type="checkbox" class="ekenecheckeboxtopic"  data-id="'.$StaffID.'" name="group" value="'.$StaffLastName.' '.$StaffFirstName.' '.$StaffMiddleName.'"/>
                        '.$StaffLastName.' '.$StaffFirstName.' '.$StaffMiddleName.'
                    </label><br>
                        ';
                }else{
                    echo '
                    <label value="'.$StaffID.'" >
                        <input type="checkbox" class="ekenecheckeboxtopic"  data-id="'.$StaffID.'" name="group" value="'.$StaffLastName.' '.$StaffFirstName.' '.$StaffMiddleName.'"/>
                        '.$StaffLastName.' '.$StaffFirstName.' '.$StaffMiddleName.'
                    </label><br>
                    ';
                }
            }while($ekene_get_details_admin = mysqli_fetch_assoc($ekene_query_link_admin));
        }else{
            echo '<label value="NULL">No Records Found</label>';
        }
    }elseif ($usertype == 'parent'){

        $slect_all_parent  = "SELECT * FROM `parent` WHERE `InstitutionID` = '$instutition'  ORDER BY `ParentLastName` ASC";
        $ekene_query_link_parent = mysqli_query($link, $slect_all_parent);
        $ekene_get_details_parent = mysqli_fetch_assoc($ekene_query_link_parent);
        $ekene_row_cnt_ekeneparent = mysqli_num_rows($ekene_query_link_parent);
        
        
 
         if($ekene_row_cnt_ekeneparent > 0)
         {
             
             
             do{
                 
 
                 $ParentID = $ekene_get_details_parent['ParentID'];
 
                 $ParentFirstName = $ekene_get_details_parent['ParentFirstName'];
                 $ParentMiddleName = $ekene_get_details_parent['ParentMiddleName'];
                 $ParentLastName = $ekene_get_details_parent['ParentLastName'];

                 $select_from_checked_parenttwo = "SELECT * FROM `member` WHERE `InstitutionorCampusID` = '$instutition' AND `Usertype` = 'parent' AND `UserID` = '$ParentID' AND  deletestatus = 0";
                 $ekene_query_link_parenttwo = mysqli_query($link, $select_from_checked_parenttwo);
                 $ekene_get_details_parenttwo = mysqli_fetch_assoc($ekene_query_link_parenttwo);
                 $ekene_row_cnt_ekeneparenttwo = mysqli_num_rows($ekene_query_link_parenttwo);
                 if ($ekene_row_cnt_ekeneparenttwo > 0)
                 {
                    echo '
                    <label value="'.$ParentID.'" style="color: #999;" >
                        <input type="checkbox" class="ekenecheckeboxtopic" data-id="'.$ParentID.'" name="group" value="'.$ParentLastName.' '.$ParentFirstName.' '.$ParentMiddleName.'"/>
                        '.$ParentLastName.' '.$ParentFirstName.' '.$ParentMiddleName.'
                    </label><br>
                               ';
                 }
                 else
                 {
                    echo '
                    <label value="'.$ParentID.'" >
                        <input type="checkbox" class="ekenecheckeboxtopic" data-id="'.$ParentID.'" name="group" value="'.$ParentLastName.' '.$ParentFirstName.' '.$ParentMiddleName.'"/>
                        '.$ParentLastName.' '.$ParentFirstName.' '.$ParentMiddleName.'
                    </label><br>
                               ';
                 }
 
               
                 
             }while($ekene_get_details_parent = mysqli_fetch_assoc($ekene_query_link_parent));
         }
         else{
             echo '<label value="NULL">No Records Found</label>';
         }
    } elseif ($usertype == 'schoolhead')
    {
        $slect_all_schoolhead  = "SELECT * FROM `staff` WHERE `InstitutionID` = '$instutition' AND `Role` = 'schoolhead' ORDER BY `StaffLastName` ASC";
        $ekene_query_link_schoolhead = mysqli_query($link, $slect_all_schoolhead);
        $ekene_get_details_schoolhead = mysqli_fetch_assoc($ekene_query_link_schoolhead);
        $ekene_row_cnt_ekeneschoolhead = mysqli_num_rows($ekene_query_link_schoolhead);
        
        
 
         if($ekene_row_cnt_ekeneschoolhead > 0)
         {
             
             
             do{
                 
 
                 $StaffID = $ekene_get_details_schoolhead['StaffID'];
 
                 $StaffFirstName = $ekene_get_details_schoolhead['StaffFirstName'];
                 $StaffMiddleName = $ekene_get_details_schoolhead['StaffMiddleName'];
                 $StaffLastName = $ekene_get_details_schoolhead['StaffLastName'];
                 
                 $select_from_checked_schoolheadone = "SELECT * FROM `member` WHERE `InstitutionorCampusID` = '$instutition' AND `Usertype` = 'schoolhead' AND `UserID` = '$StaffID' AND deletestatus = 0";
                 $ekene_query_link_schoolheadone = mysqli_query($link, $select_from_checked_schoolheadone);
                 $ekene_get_details_schoolheadone = mysqli_fetch_assoc($ekene_query_link_schoolheadone);
                 $ekene_row_cnt_ekeneschoolheadone = mysqli_num_rows($ekene_query_link_schoolheadone);
                   if ($ekene_row_cnt_ekeneschoolheadone > 0)
                   {

                    echo '
                    <label value="'.$StaffID.'" style="color: #999;" >
                        <input type="checkbox" class="ekenecheckeboxtopic" data-id="'.$StaffID.'" name="group" value="'.$StaffLastName.' '.$StaffFirstName.' '.$StaffMiddleName.'"/>
                        '.$StaffLastName.' '.$StaffFirstName.' '.$StaffMiddleName.'
                    </label><br>
                               ';
                   }
                   else
                   {
                    
                 echo '
                 <label value="'.$StaffID.'" >
                     <input type="checkbox" class="ekenecheckeboxtopic" data-id="'.$StaffID.'" name="group" value="'.$StaffLastName.' '.$StaffFirstName.' '.$StaffMiddleName.'"/>
                     '.$StaffLastName.' '.$StaffFirstName.' '.$StaffMiddleName.'
                 </label><br>
                            ';
                   }

 
                 
             }while($ekene_get_details_schoolhead = mysqli_fetch_assoc($ekene_query_link_schoolhead));
         }
         else{
             echo '<label value="NULL">No Records Found</label>';
         }
    } elseif ($usertype == 'student')
    {
       
        $slect_all_student  = "SELECT * FROM `student` WHERE  CampusID = '$campus' ORDER BY `StudentFirstName` ASC";
        $ekene_query_link_student = mysqli_query($link, $slect_all_student);
        $ekene_get_details_student = mysqli_fetch_assoc($ekene_query_link_student);
        $ekene_row_cnt_ekenestudent = mysqli_num_rows($ekene_query_link_student);
        
        
 
         if($ekene_row_cnt_ekenestudent > 0)
         {
             
             
             do{
                 
 
                 $StudentID = $ekene_get_details_student['StudentID'];
 
                 $StudentFirstName = $ekene_get_details_student['StudentFirstName'];
                 $StudentMiddleName = $ekene_get_details_student['StudentMiddleName'];
                 $StudentLastName = $ekene_get_details_student['StudentLastName'];
 
                 $select_from_checked_studentone = "SELECT * FROM `member` WHERE `InstitutionorCampusID` = '$campus' AND `Usertype` = 'student' AND `UserID` = '$StudentID' AND  deletestatus = 0";
                 $ekene_query_link_studentone = mysqli_query($link, $select_from_checked_studentone);
                 $ekene_get_details_studentone = mysqli_fetch_assoc($ekene_query_link_studentone);
                 $ekene_row_cnt_ekenestudentone = mysqli_num_rows($ekene_query_link_studentone);
                   if ($ekene_row_cnt_ekenestudentone > 0)
                   {
                    echo '
                    <label value="'.$StudentID.'" style="color: #999;" >
                        <input type="checkbox" class="ekenecheckeboxtopic"  data-id="'.$StudentID.'" name="group" value="'.$StudentLastName.' '.$StudentFirstName.' '.$StudentMiddleName.'" />
                        '.$StudentFirstName.' '.$StudentFirstName.' '.$StudentMiddleName.'
                    </label><br>
                               ';
                    
                   }
                   else
                   {
                    echo '
                    <label value="'.$StudentID.'" >
                        <input type="checkbox" class="ekenecheckeboxtopic"  data-id="'.$StudentID.'" name="group" value="'.$StudentLastName.' '.$StudentFirstName.' '.$StudentMiddleName.'"/>
                        '.$StudentFirstName.' '.$StudentFirstName.' '.$StudentMiddleName.'
                    </label><br>
                               ';
                    
                   }
             
             }while($ekene_get_details_student = mysqli_fetch_assoc($ekene_query_link_student));
         }
         else{
             echo '<label value="NULL">No Records Found</label>';
         }
    }else{
        echo '<label value="NULL">No Records Found</label>';
    }


 ?>