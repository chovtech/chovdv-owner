<?php
    include ('../../config/config.php');
    $selStaffID = $_POST['selStaffID'];
     $InstitutionID = $_POST['pros_get_stored_instituion_id'];
     $CampusID = $_POST['pros_staff_campus_id'];
     

     $sqlGetAllStaff = "SELECT * FROM `staff` WHERE StaffID = '$selStaffID'";
     $queryGetAllStaff = mysqli_query($link, $sqlGetAllStaff);
     $rowGetAllStaff = mysqli_fetch_assoc($queryGetAllStaff);
     $countGetAllStaff = mysqli_num_rows($queryGetAllStaff);
     $StaffID = $rowGetAllStaff['StaffID'];


        echo '<input type="hidden" value="'.$StaffID.'" id="prosgetstaffvaluforfaculselect">';

      $sqlGetLogin = "SELECT * FROM `userlogin` WHERE InstitutionIDOrCampusID = '$InstitutionID' AND UserID = '$StaffID' AND 
         UserType IN('teacher', 'admin', 'schoolhead')";
        $queryGetLogin = mysqli_query($link, $sqlGetLogin);
        $rowGetLogin = mysqli_fetch_assoc($queryGetLogin);
        $countGetLogin = mysqli_num_rows($queryGetLogin);

        $UserType = $rowGetLogin["UserType"];
        $UserLoginID = $rowGetLogin["UserLoginID"];


        $select_campus = mysqli_query($link,"SELECT * FROM `campus` WHERE InstitutionID='$InstitutionID'");
        $select_campuscnt = mysqli_num_rows($select_campus);
        $select_campuscntrow = mysqli_fetch_assoc($select_campus);

        if($select_campuscnt > 0 )
        {

        echo '<div class="row g-4 mt-1 prosdisplaycampusrole" style="display:none;">
            <div class="col-sm-12 col-md-12 col-lg-12">
              ';

              do{

                $campusName = $select_campuscntrow['CampusName']; 
                $campusnewID = $select_campuscntrow['CampusID']; 

                $useradmin = $select_campuscntrow['Admin']; 

                $useradminewn = explode(',', $useradmin);

                if (in_array($StaffID, $useradminewn)) 
                {

                    $admincheck = 'checked';

                }else
                {
                    $admincheck = ''; 
                }


                echo' <div class="checkbox-group" style="display: flex; align-items: center;">
                        <label class="checkbox-inline" style="display: inline-block; margin-right: 10px;">
                        <input class="form-check-input  pros-checkstaffrolecmapus" '.$admincheck.' value="'.$campusnewID.'" data-id="'.$campusName.'" style="font-size: 20px; width: 20px; height: 20px; vertical-align: middle;" type="checkbox" id="flexCheckDefault"> '.$campusName.'
                        </label>
                </div>';
          

            }while($select_campuscntrow = mysqli_fetch_assoc($select_campus));

              
              
            echo '</div>
          </div><br>
          
                  ';



                  $select_campus_schoolhead = mysqli_query($link,"SELECT * FROM `campus` WHERE InstitutionID='$InstitutionID'");
                  $select_campuscnt_schoolhead = mysqli_num_rows($select_campus_schoolhead);
                  $select_campuscntrow_schoolhead = mysqli_fetch_assoc($select_campus_schoolhead);


                  echo '<div class="row g-4 mt-1 prosdisplaycampusroleschoolehead" style="display:none;">
                  <div class="col-sm-12 col-md-12 col-lg-12">';
                    
      
                    do{
      
                        
                                $campusName_schoolhead = $select_campuscntrow_schoolhead['CampusName']; 
                                $campusnewID_schoolhead = $select_campuscntrow_schoolhead['CampusID']; 
        
                     
                            $selectschoolhead_row = mysqli_query($link,"SELECT * FROM `section` WHERE PrincipalOrDeanOrHeadTeacherUserID='$StaffID' AND CampusID='$campusnewID_schoolhead'");
                            $selectschoolhead_row_cnt = mysqli_num_rows($selectschoolhead_row);

                            if($selectschoolhead_row_cnt > 0)
                            {
                                            $selectshoolhead = 'checked';
                            }else
                            {
                                             $selectshoolhead = '';
                            }
      
        
                            echo' <div class="checkbox-group" style="display: flex; align-items: center;">
                                    <label class="checkbox-inline" style="display: inline-block; margin-right: 10px;">
                                    <input class="form-check-input  pros-checkstaffrolecmapus" '.$selectshoolhead.' name="proscheckschoolhead" value="'.$campusnewID_schoolhead.'" data-id="'.$campusName_schoolhead.'" style="font-size: 20px; width: 20px; height: 20px; vertical-align: middle;" type="radio" id="flexCheckDefault"> '.$campusName_schoolhead.'
                                    </label>
                            </div>';
                
      
                  }while($select_campuscntrow_schoolhead = mysqli_fetch_assoc($select_campus_schoolhead));
      
                    
                    
                  echo '</div>
                </div><br>';
                
                        

        }else
        {

        }



        echo '

            <input type="hidden" id="pros-selStaffForRoleChange" value="'.$StaffID.'">
        
                <div class="pros-flexi-label-wrapper " style="margin-right:40rem;"><label
                      for="schoolName"> Usertype </label>
                </div>
            <div class="pros-flexi-input-affix-wrapper-invitemail ">
                <select id="selUserType" class="pros-flexi-input prosperchangeroleinputdrop" style="width:90%;" 
                >';

                    if($UserType == 'teacher')
                    {
                            
                        echo'<option value="teacher" selected>Teacher</option>
                        <option value="admin">Admin</option>
                        <option value="schoolhead">Head of School(Principal, Head Teacher)</option>';
                        

                       

                    }else if($UserType == 'admin')
                    {

                        echo'<option value="teacher" >Teacher</option>
                        <option value="admin" selected>Admin</option>
                        <option value="schoolhead">Head of School(Principal, Head Teacher)</option>';
                        

                    }else if($UserType == 'schoolhead')
                    {

                        echo'<option value="teacher" >Teacher</option>
                        <option value="admin" >Admin</option>
                        <option value="schoolhead" selected>Head of School(Principal, Head Teacher)</option>';

                    }


        echo '</select>
       
    </div>';
           

    //display section here
    echo '<br><div class="form-group col-sm-12 prossectioninput" style="display:none;">
                            
    </div>';
  //display section here


   echo '<div class="col-sm-12 mb-3">
            <button type="button" id="pros-submitchangerole-btn" style="background-color:#007bff;cursor:pointer;width:100%;font-size:14px;" class="btn btn-block btn-lg text-light">Change Role <iclass="fa fa-long-arrow-right"></i></button>
    </div>';





?>