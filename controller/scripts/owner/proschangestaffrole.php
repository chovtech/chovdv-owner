<?php
    include ('../../config/config.php');

     $staff_Role = $_POST['staff_Role'];
     $StaffID = $_POST['StaffID'];
     $InstitutionID = $_POST['pros_get_stored_instituion_id'];

     

       if($staff_Role == 'schoolhead')
       {

                $updatelogin = mysqli_query($link,"UPDATE `userlogin` SET `UserType`='$staff_Role' WHERE `UserID`='$StaffID' AND InstitutionIDOrCampusID='$InstitutionID'");
                $updestaff  = mysqli_query($link,"UPDATE `staff` SET Role='$staff_Role' WHERE StaffID='$StaffID' AND InstitutionID='$InstitutionID'");
       

                $sectionID = explode(',',$_POST['sectionID']);
                $campusID = $_POST['campusID'];
                 

                foreach($sectionID as $key => $sectionIDarr)
                {
                        
                        
                        $sectionarr =  $sectionID[$key];


                       
                        $update_section = mysqli_query($link,"UPDATE `section` SET `PrincipalOrDeanOrHeadTeacherUserID`='$StaffID' WHERE CampusID='$campusID' AND SectionID='$sectionarr'");

                }

              if($update_section == true)

              {
                echo 'success';
              }
            
        

       }else if($staff_Role == 'admin')
       {

       
                $campusID = explode(',',$_POST['campusID']);

                $updatelogin = mysqli_query($link,"UPDATE `userlogin` SET `UserType`='$staff_Role' WHERE `UserID`='$StaffID' AND InstitutionIDOrCampusID='$InstitutionID'");
                $updestaff  = mysqli_query($link,"UPDATE `staff` SET Role='$staff_Role' WHERE StaffID='$StaffID' AND InstitutionID='$InstitutionID'");

             foreach($campusID  as $CampusIDarr)
             {
                     $CampusIDarr;



                     $select_campus_schoolhead = mysqli_query($link,"SELECT * FROM `campus` WHERE InstitutionID='$InstitutionID' AND CampusID='$CampusIDarr'");
                     $select_campuscnt_schoolhead = mysqli_num_rows($select_campus_schoolhead);
                     $select_campuscntrow_schoolhead = mysqli_fetch_assoc($select_campus_schoolhead);

                     $Admin =$select_campuscntrow_schoolhead['Admin'];
                     $Adminnewarr = explode(',',$Admin);

                     if (in_array($StaffID,  $Adminnewarr)) 
                     {
     
                         $staffnewinsertadmin = $Admin;
     
                     }else
                     {
                          if($Admin == '0')
                          {
                               $staffnewinsertadmin = $StaffID;
                          }else
                          {


                            $Adminnewarr[] = $StaffID;

                               $staffnewinsertadmin = implode(',',$Adminnewarr);
                          }
                           
                     }
                    
                    
                     $update_admin = mysqli_query($link,"UPDATE `campus` SET `Admin`='$staffnewinsertadmin' WHERE CampusID='$CampusIDarr' AND InstitutionID='$InstitutionID'");

             }

             if($update_admin == true)

             {
               echo 'success';
             }
            
       }else
       {

                $updatelogin = mysqli_query($link,"UPDATE `userlogin` SET `UserType`='$staff_Role' WHERE `UserID`='$StaffID' AND InstitutionIDOrCampusID='$InstitutionID'");
                $updestaff  = mysqli_query($link,"UPDATE `staff` SET `Role`='$staff_Role' WHERE StaffID='$StaffID' AND InstitutionID='$InstitutionID'");

                if($updestaff  == true)
                {
                    echo 'success';
                }
               

       }
    

?>