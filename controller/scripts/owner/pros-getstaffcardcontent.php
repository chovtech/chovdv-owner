<?php

    include('../../config/config.php');
    
    $pros_instituion_id = $_POST['pros_get_stored_instituion_id'];
    $pros_staff_status = $_POST['pros_staff_status'];
    $pros_staff_type = $_POST['pros_staff_type'];
    $pros_staff_campusid = $_POST['pros_staff_campus_id'];

    $sqlsession = ("SELECT * FROM `session` WHERE sessionStatus = '1'");
    $resultsession = mysqli_query($link, $sqlsession); 
    $rowGetsession = mysqli_fetch_assoc($resultsession);
    $row_cntsession = mysqli_num_rows($resultsession);
                
    $sessionName = $rowGetsession['sessionName'];




    


    if($pros_staff_campusid == 'NULL'){

   
        //============IF STAFF ALL STATUS ======//

            #total male
                $pros_sql_staff = ("SELECT
                    * FROM `institution` INNER JOIN staff ON institution.InstitutionID = staff.InstitutionID 
                INNER JOIN userlogin ON staff.StaffID = userlogin.UserID AND staff.InstitutionID=userlogin.InstitutionIDOrCampusID
                    LEFT JOIN deactivateuser ON 
                staff.StaffID = deactivateuser.UserID AND deactivateuser.UserType='staff' 
                AND staff.InstitutionID = deactivateuser.InstitutionIDOrCampusID   WHERE institution.InstitutionID='$pros_instituion_id' 
                 AND (staff.StaffType=$pros_staff_type OR $pros_staff_type IS NULL) AND staff.StaffGender='Male' AND staff.StaffTrashStatus='0'");
            
                $pros_result_staff = mysqli_query($link, $pros_sql_staff);
                $pros_row_staff = mysqli_fetch_assoc($pros_result_staff);
                 $pros_row_cnt_staff = mysqli_num_rows($pros_result_staff);
           #total male


           #total female
                 $pros_sql_staff_female = ("SELECT
                 * FROM `institution` INNER JOIN staff ON institution.InstitutionID = staff.InstitutionID 
             INNER JOIN userlogin ON staff.StaffID = userlogin.UserID AND staff.InstitutionID=userlogin.InstitutionIDOrCampusID
                 LEFT JOIN deactivateuser ON 
             staff.StaffID = deactivateuser.UserID AND deactivateuser.UserType='staff' 
             AND staff.InstitutionID = deactivateuser.InstitutionIDOrCampusID   WHERE institution.InstitutionID='$pros_instituion_id' 
              AND (staff.StaffType=$pros_staff_type OR $pros_staff_type IS NULL) AND staff.StaffGender='Female' AND staff.StaffTrashStatus='0'");
         
             $pros_result_staf_female = mysqli_query($link, $pros_sql_staff_female);
             $pros_row_staff_female = mysqli_fetch_assoc($pros_result_staf_female);
             $pros_row_cnt_staff_female = mysqli_num_rows( $pros_result_staf_female);
            #total female
 
           $totalgender = intval($pros_row_cnt_staff_female + $pros_row_cnt_staff);#total of male and female


        #all staff
            $pros_sql_staff_all = ("SELECT
             * FROM `institution` INNER JOIN staff ON institution.InstitutionID = staff.InstitutionID 
         INNER JOIN userlogin ON staff.StaffID = userlogin.UserID AND staff.InstitutionID=userlogin.InstitutionIDOrCampusID
             LEFT JOIN deactivateuser ON 
         staff.StaffID = deactivateuser.UserID AND deactivateuser.UserType='staff' 
         AND staff.InstitutionID = deactivateuser.InstitutionIDOrCampusID   WHERE institution.InstitutionID='$pros_instituion_id' 
           AND staff.StaffTrashStatus='0'");
     
         $pros_result_staff_all = mysqli_query($link, $pros_sql_staff_all);
         $pros_row_staff_all = mysqli_fetch_assoc($pros_result_staff_all);
          $pros_row_cnt_staff_all = mysqli_num_rows($pros_result_staff_all);
         #all staff


        #total blocked
          $pros_sql_staff_all_block = (" SELECT * FROM `staff` INNER JOIN deactivateuser ON staff.InstitutionID = deactivateuser.InstitutionIDOrCampusID AND staff.StaffID = deactivateuser.UserID
           WHERE InstitutionID='$pros_instituion_id'  AND staff.StaffTrashStatus='0'");
     
         $pros_result_staff_all_block = mysqli_query($link, $pros_sql_staff_all_block);
         $pros_row_cnt_staff_all_block = mysqli_num_rows($pros_result_staff_all_block);
         #total blocked

        
         #total active
        $pros_sql_staff_all_active = ("SELECT
          * FROM `institution` INNER JOIN staff ON institution.InstitutionID = staff.InstitutionID 
      INNER JOIN userlogin ON staff.StaffID = userlogin.UserID AND staff.InstitutionID=userlogin.InstitutionIDOrCampusID
           WHERE  NOT EXISTS (SELECT UserID FROM deactivateuser WHERE deactivateuser.UserType = 'staff' AND StaffID=deactivateuser.UserID ) AND institution.InstitutionID='$pros_instituion_id' 
       AND (staff.StaffType=$pros_staff_type OR $pros_staff_type IS NULL) AND staff.StaffTrashStatus='0'");
        $pros_result_staff_all_active = mysqli_query($link, $pros_sql_staff_all_active);
        $pros_row_cnt_staff_all_active = mysqli_num_rows($pros_result_staff_all_active);
         #total active


        #total academic staff
        $pros_sql_staff_academicstaff = ("SELECT
                * FROM `institution` INNER JOIN staff ON institution.InstitutionID = staff.InstitutionID 
            INNER JOIN userlogin ON staff.StaffID = userlogin.UserID AND staff.InstitutionID=userlogin.InstitutionIDOrCampusID
                LEFT JOIN deactivateuser ON 
            staff.StaffID = deactivateuser.UserID AND deactivateuser.UserType='staff' 
            AND staff.InstitutionID = deactivateuser.InstitutionIDOrCampusID   WHERE institution.InstitutionID='$pros_instituion_id' 
             AND staff.StaffType='0' AND staff.StaffTrashStatus='0'");
        
            $pros_result_staff_academicstaff = mysqli_query($link, $pros_sql_staff_academicstaff);
            $pros_row_staff_academicstaff = mysqli_fetch_assoc($pros_result_staff_academicstaff);
            $pros_row_cnt_staff_academicstaff = mysqli_num_rows($pros_result_staff_academicstaff);
        #total academic staff

         #total NONacademic staff
                $pros_sql_staff_nonacademicstaff = ("SELECT
                * FROM `institution` INNER JOIN staff ON institution.InstitutionID = staff.InstitutionID 
            INNER JOIN userlogin ON staff.StaffID = userlogin.UserID AND staff.InstitutionID=userlogin.InstitutionIDOrCampusID
                LEFT JOIN deactivateuser ON 
            staff.StaffID = deactivateuser.UserID AND deactivateuser.UserType='staff' 
            AND staff.InstitutionID = deactivateuser.InstitutionIDOrCampusID   WHERE institution.InstitutionID='$pros_instituion_id' 
            AND staff.StaffTrashStatus='0' AND staff.StaffType='1'");
        
            $pros_result_staff_nonacademicstaff = mysqli_query($link, $pros_sql_staff_nonacademicstaff);
            $pros_row_staff_nonacademicstaff = mysqli_fetch_assoc($pros_result_staff_nonacademicstaff);
           $pros_row_cnt_staff_nonacademicstaff = mysqli_num_rows($pros_result_staff_nonacademicstaff);
        #total NONacademic staff

        #total nonacademic staff
        $totalstafftype = $pros_row_cnt_staff_nonacademicstaff + $pros_row_cnt_staff_academicstaff;
      #total nonacademic staff

    } else
    {


            #all staff teacher
            $pros_sql_staff_all_teacher = ("SELECT DISTINCT courseorsubjectallocation.CourseOrSubjectTeacherUserID FROM `courseorsubjectallocation` INNER JOIN staff ON courseorsubjectallocation.CourseOrSubjectTeacherUserID = 
            staff.StaffID WHERE staff.InstitutionID='$pros_instituion_id' AND CourseOrSubjectTeacherUserID !='0' AND courseorsubjectallocation.CampusID='$pros_staff_campusid' 
            AND staff.StaffTrashStatus='0'");
    
            $pros_result_staff_teacher = mysqli_query($link, $pros_sql_staff_all_teacher);
            $pros_row_cnt_staff_teacher = mysqli_num_rows($pros_result_staff_teacher);
           #all staff teacher

            #all staff head
            $pros_sql_staff_all_head = ("SELECT DISTINCT section.PrincipalOrDeanOrHeadTeacherUserID FROM `section` INNER JOIN staff ON 
            section.PrincipalOrDeanOrHeadTeacherUserID = staff.StaffID WHERE staff.InstitutionID='$pros_instituion_id' AND PrincipalOrDeanOrHeadTeacherUserID !='0' AND section.CampusID='$pros_staff_campusid' AND staff.StaffTrashStatus ='0'");
    
            $pros_result_staff_head = mysqli_query($link, $pros_sql_staff_all_head);
            $pros_row_cnt_staff_head = mysqli_num_rows($pros_result_staff_head);
           #all staff head


            #all staff admin
            $pros_sql_staff_all_admin = ("SELECT DISTINCT campus.Admin FROM `campus` INNER JOIN
             staff ON campus.Admin = staff.StaffID WHERE staff.InstitutionID='$pros_instituion_id' AND `Admin` !='0' AND campus.CampusID='$pros_staff_campusid' AND staff.StaffTrashStatus ='0'");
    
            $pros_result_staff_admin = mysqli_query($link, $pros_sql_staff_all_admin);
            $pros_row_cnt_staff_admin= mysqli_num_rows($pros_result_staff_admin);
           #all staff admin


           $pros_row_cnt_staff_all = $pros_row_cnt_staff_head +  $pros_row_cnt_staff_teacher +  $pros_row_cnt_staff_admin;






           $pros_sql_staff_all_admin_active  = ("SELECT DISTINCT campus.Admin FROM `campus` INNER JOIN staff ON campus.Admin = staff.StaffID  WHERE  NOT EXISTS (SELECT UserID FROM deactivateuser WHERE deactivateuser.UserType = 'staff' AND StaffID=deactivateuser.UserID)
            AND staff.InstitutionID='$pros_instituion_id' AND `Admin` !='0' AND campus.CampusID='$pros_staff_campusid' AND staff.StaffTrashStatus ='0'");
            $pros_result_staff_admin_active  = mysqli_query($link, $pros_sql_staff_all_admin_active);
            $pros_row_cnt_staff_admin_active = mysqli_num_rows($pros_result_staff_admin_active);



            $pros_sql_staff_all_teacher_active = ("SELECT DISTINCT courseorsubjectallocation.CourseOrSubjectTeacherUserID FROM `courseorsubjectallocation` INNER JOIN staff ON courseorsubjectallocation.CourseOrSubjectTeacherUserID = 
            staff.StaffID WHERE NOT EXISTS (SELECT UserID FROM deactivateuser WHERE deactivateuser.UserType = 'staff' AND StaffID=deactivateuser.UserID) AND staff.InstitutionID='$pros_instituion_id' AND CourseOrSubjectTeacherUserID !='0' AND courseorsubjectallocation.CampusID='$pros_staff_campusid' 
            AND staff.StaffTrashStatus='0'");

            $pros_result_staff_teacher_active = mysqli_query($link, $pros_sql_staff_all_teacher_active);
            $pros_row_cnt_staff_teacher_active = mysqli_num_rows($pros_result_staff_teacher_active);

            

            $pros_sql_staff_all_head_active = ("SELECT DISTINCT section.PrincipalOrDeanOrHeadTeacherUserID FROM `section` INNER JOIN staff ON 
            section.PrincipalOrDeanOrHeadTeacherUserID = staff.StaffID WHERE NOT EXISTS (SELECT UserID FROM deactivateuser WHERE deactivateuser.UserType = 'staff' AND StaffID=deactivateuser.UserID AND 
            deactivateuser.sessionName='$sessionName') AND staff.InstitutionID='$pros_instituion_id' AND PrincipalOrDeanOrHeadTeacherUserID !='0' AND section.CampusID='$pros_staff_campusid' AND staff.StaffTrashStatus ='0'");
            $pros_result_staff_head_active = mysqli_query($link, $pros_sql_staff_all_head_active);
            $pros_row_cnt_staff_head_active = mysqli_num_rows($pros_result_staff_head_active);    


            $pros_row_cnt_staff_all_active = $pros_row_cnt_staff_admin_active +  $pros_row_cnt_staff_teacher_active + $pros_row_cnt_staff_head_active;




            // block staff campus


            $pros_sql_staff_all_adminblock  = ("SELECT DISTINCT courseorsubjectallocation.CourseOrSubjectTeacherUserID FROM `courseorsubjectallocation` INNER JOIN staff ON courseorsubjectallocation.CourseOrSubjectTeacherUserID = 
            staff.StaffID  INNER JOIN deactivateuser ON staff.InstitutionID = deactivateuser.InstitutionIDOrCampusID AND staff.StaffID = deactivateuser.UserID
           WHERE   deactivateuser.sessionName='$sessionName' AND staff.InstitutionID='$pros_instituion_id' AND CourseOrSubjectTeacherUserID !='0' AND courseorsubjectallocation.CampusID='$pros_staff_campusid' 
            AND staff.StaffTrashStatus='0'");

            $pros_result_staff_teacher_block = mysqli_query($link,$pros_sql_staff_all_adminblock);
            $pros_row_cnt_staff_teacher_block = mysqli_num_rows($pros_result_staff_teacher_block);


            $pros_sql_staff_all_head_block = ("SELECT DISTINCT section.PrincipalOrDeanOrHeadTeacherUserID FROM `section` INNER JOIN staff ON 
            section.PrincipalOrDeanOrHeadTeacherUserID = staff.StaffID  INNER JOIN deactivateuser ON staff.InstitutionID = deactivateuser.InstitutionIDOrCampusID AND staff.StaffID = deactivateuser.UserID
           WHERE  deactivateuser.sessionName='$sessionName' AND staff.InstitutionID='$pros_instituion_id' AND PrincipalOrDeanOrHeadTeacherUserID !='0' AND section.CampusID='$pros_staff_campusid' AND staff.StaffTrashStatus ='0'");

            $pros_result_staff_head_block = mysqli_query($link, $pros_sql_staff_all_head_block);
            $pros_row_cnt_staff_head_block = mysqli_num_rows($pros_result_staff_head_block);   



            $pros_sql_staff_all_admin_block  = ("SELECT DISTINCT campus.Admin FROM `campus` INNER JOIN
            staff ON campus.Admin = staff.StaffID INNER JOIN deactivateuser ON staff.InstitutionID = deactivateuser.InstitutionIDOrCampusID AND staff.StaffID = deactivateuser.UserID
          WHERE  deactivateuser.sessionName='$sessionName' AND staff.InstitutionID='$pros_instituion_id' AND `Admin` !='0' AND campus.CampusID='$pros_staff_campusid' AND staff.StaffTrashStatus ='0';");
            $pros_result_staff_admin_block  = mysqli_query($link, $pros_sql_staff_all_admin_block);
            $pros_row_cnt_staff_admin_block = mysqli_num_rows($pros_result_staff_admin_block);

           $pros_row_cnt_staff_all_block =  $pros_row_cnt_staff_teacher_block +   $pros_row_cnt_staff_head_block +  $pros_row_cnt_staff_admin_block;




          
            $pros_sql_staffteacherteachermale = ("SELECT DISTINCT courseorsubjectallocation.CourseOrSubjectTeacherUserID FROM `courseorsubjectallocation` INNER JOIN staff ON courseorsubjectallocation.CourseOrSubjectTeacherUserID = 
            staff.StaffID WHERE staff.InstitutionID='$pros_instituion_id' AND CourseOrSubjectTeacherUserID !='0' AND courseorsubjectallocation.CampusID='$pros_staff_campusid' 
            AND staff.StaffTrashStatus='0' AND staff.StaffGender='Male'");
    
            $pros_sql_staffteacherteachermaleres = mysqli_query($link,$pros_sql_staffteacherteachermale);
            $pros_sql_staffteacherteachermalerow = mysqli_num_rows($pros_sql_staffteacherteachermaleres);


            $pros_sql_staff_all_head_male = ("SELECT DISTINCT section.PrincipalOrDeanOrHeadTeacherUserID FROM `section` INNER JOIN staff ON 
            section.PrincipalOrDeanOrHeadTeacherUserID = staff.StaffID WHERE staff.InstitutionID='$pros_instituion_id' AND PrincipalOrDeanOrHeadTeacherUserID !='0' AND section.CampusID='$pros_staff_campusid' AND staff.StaffTrashStatus ='0' AND staff.StaffGender='Male'");
    
            $pros_result_staff_head_male = mysqli_query($link, $pros_sql_staff_all_head_male);
            $pros_row_cnt_staff_head_male = mysqli_num_rows($pros_result_staff_head_male);


            $pros_sql_staff_all_admin_male = ("SELECT DISTINCT campus.Admin FROM `campus` INNER JOIN
             staff ON campus.Admin = staff.StaffID WHERE staff.InstitutionID='$pros_instituion_id' AND `Admin` !='0' AND campus.CampusID='$pros_staff_campusid' AND staff.StaffTrashStatus ='0' AND staff.StaffGender='Male'");
    
            $pros_result_staff_admin_male = mysqli_query($link, $pros_sql_staff_all_admin_male);
            $pros_row_cnt_staff_admin_male = mysqli_num_rows($pros_result_staff_admin_male);
          

           $pros_row_cnt_staff =  $pros_sql_staffteacherteachermalerow +  $pros_row_cnt_staff_head_male  + $pros_row_cnt_staff_admin_male;





           $pros_sql_staffteacherteacherfemale = ("SELECT DISTINCT courseorsubjectallocation.CourseOrSubjectTeacherUserID FROM `courseorsubjectallocation` INNER JOIN staff ON courseorsubjectallocation.CourseOrSubjectTeacherUserID = 
           staff.StaffID WHERE staff.InstitutionID='$pros_instituion_id' AND CourseOrSubjectTeacherUserID !='0' AND courseorsubjectallocation.CampusID='$pros_staff_campusid' 
           AND staff.StaffTrashStatus='0' AND staff.StaffGender='Female'");
   
           $pros_sql_staffteacherteacherfemaleres = mysqli_query($link,$pros_sql_staffteacherteacherfemale);
           $pros_sql_staffteacherteacherfemalerow = mysqli_num_rows($pros_sql_staffteacherteacherfemaleres);


           $pros_sql_staff_all_head_female = ("SELECT DISTINCT section.PrincipalOrDeanOrHeadTeacherUserID FROM `section` INNER JOIN staff ON 
           section.PrincipalOrDeanOrHeadTeacherUserID = staff.StaffID WHERE staff.InstitutionID='$pros_instituion_id' AND PrincipalOrDeanOrHeadTeacherUserID !='0' AND section.CampusID='$pros_staff_campusid' AND staff.StaffTrashStatus ='0' AND staff.StaffGender='Female'");
   
           $pros_result_staff_head_female = mysqli_query($link, $pros_sql_staff_all_head_female);
           $pros_row_cnt_staff_head_female = mysqli_num_rows($pros_result_staff_head_female);


           $pros_sql_staff_all_admin_female = ("SELECT DISTINCT campus.Admin FROM `campus` INNER JOIN
            staff ON campus.Admin = staff.StaffID WHERE staff.InstitutionID='$pros_instituion_id' AND `Admin` !='0' AND campus.CampusID='$pros_staff_campusid' AND staff.StaffTrashStatus ='0' AND staff.StaffGender='Female'");
   
           $pros_result_staff_admin_female = mysqli_query($link, $pros_sql_staff_all_admin_female);
           $pros_row_cnt_staff_admin_female = mysqli_num_rows($pros_result_staff_admin_female);
         

            $pros_row_cnt_staff_female =  $pros_sql_staffteacherteacherfemalerow +  $pros_row_cnt_staff_head_female  + $pros_row_cnt_staff_admin_female;

            $totalgender =  $pros_row_cnt_staff + $pros_row_cnt_staff_female;






        #all staff teacher academin
        $pros_sql_staff_all_teacher_academicstaff = ("SELECT DISTINCT courseorsubjectallocation.CourseOrSubjectTeacherUserID FROM `courseorsubjectallocation` INNER JOIN staff ON courseorsubjectallocation.CourseOrSubjectTeacherUserID = 
        staff.StaffID WHERE staff.InstitutionID='$pros_instituion_id' AND CourseOrSubjectTeacherUserID !='0' AND courseorsubjectallocation.CampusID='$pros_staff_campusid' 
        AND staff.StaffTrashStatus='0' AND staff.StaffType='0'");

        $pros_result_staff_teacher_academicstaff = mysqli_query($link, $pros_sql_staff_all_teacher_academicstaff);
        $pros_row_cnt_staff_teacher_academicstaff = mysqli_num_rows($pros_result_staff_teacher_academicstaff);
        #all staff teacher academin

        #all staff head academin
        $pros_sql_staff_all_head_academicstaff = ("SELECT DISTINCT section.PrincipalOrDeanOrHeadTeacherUserID FROM `section` INNER JOIN staff ON 
        section.PrincipalOrDeanOrHeadTeacherUserID = staff.StaffID WHERE staff.InstitutionID='$pros_instituion_id' AND PrincipalOrDeanOrHeadTeacherUserID !='0' AND section.CampusID='$pros_staff_campusid' AND staff.StaffTrashStatus ='0' AND staff.StaffType='0'");

        $pros_result_staff_head_academicstaff = mysqli_query($link, $pros_sql_staff_all_head_academicstaff);
        $pros_row_cnt_staff_head_academicstaff = mysqli_num_rows($pros_result_staff_head_academicstaff);
        #all staff head academin


        #all staff admin academin
        $pros_sql_staff_all_admin_academicstaff = ("SELECT DISTINCT campus.Admin FROM `campus` INNER JOIN
            staff ON campus.Admin = staff.StaffID WHERE staff.InstitutionID='$pros_instituion_id' AND `Admin` !='0' AND campus.CampusID='$pros_staff_campusid' AND staff.StaffTrashStatus ='0' AND staff.StaffType='0'");

        $pros_result_staff_admin_academicstaff = mysqli_query($link, $pros_sql_staff_all_admin_academicstaff);
        $pros_row_cnt_staff_admin_academicstaff = mysqli_num_rows($pros_result_staff_admin_academicstaff);
        #all staff admin academin
        $pros_row_cnt_staff_academicstaff = $pros_row_cnt_staff_teacher_academicstaff +  $pros_row_cnt_staff_head_academicstaff + $pros_row_cnt_staff_admin_academicstaff;




        // nonacademic staff campus


        #all staff teacher nonecademic
        $pros_sql_staff_all_teacher_nonacademicstaff = ("SELECT DISTINCT courseorsubjectallocation.CourseOrSubjectTeacherUserID FROM `courseorsubjectallocation` INNER JOIN staff ON courseorsubjectallocation.CourseOrSubjectTeacherUserID = 
        staff.StaffID WHERE staff.InstitutionID='$pros_instituion_id' AND CourseOrSubjectTeacherUserID !='0' AND courseorsubjectallocation.CampusID='$pros_staff_campusid' 
        AND staff.StaffTrashStatus='0' AND staff.StaffType='1'");

        $pros_result_staff_teacher_nonacademicstaff = mysqli_query($link, $pros_sql_staff_all_teacher_nonacademicstaff);
        $pros_row_cnt_staff_teacher_nonacademicstaff = mysqli_num_rows($pros_result_staff_teacher_nonacademicstaff);
        #all staff teacher nonecademic

        #all staff head nonecademic
        $pros_sql_staff_all_head_nonacademicstaff = ("SELECT DISTINCT section.PrincipalOrDeanOrHeadTeacherUserID FROM `section` INNER JOIN staff ON 
        section.PrincipalOrDeanOrHeadTeacherUserID = staff.StaffID WHERE staff.InstitutionID='$pros_instituion_id' AND PrincipalOrDeanOrHeadTeacherUserID !='0' AND section.CampusID='$pros_staff_campusid' AND staff.StaffTrashStatus ='0' AND staff.StaffType='1'");

        $pros_result_staff_head_nonacademicstaff = mysqli_query($link, $pros_sql_staff_all_head_nonacademicstaff);
          $pros_row_cnt_staff_head_nonacademicstaff = mysqli_num_rows($pros_result_staff_head_nonacademicstaff);
        #all staff head nonecademic


        #all staff admin nonecademic
        $pros_sql_staff_all_admin_nonacademicstaff = ("SELECT DISTINCT campus.Admin FROM `campus` INNER JOIN
            staff ON campus.Admin = staff.StaffID WHERE staff.InstitutionID='$pros_instituion_id' AND `Admin` !='0' AND campus.CampusID='$pros_staff_campusid' AND staff.StaffTrashStatus ='0' AND staff.StaffType='1'");

        $pros_result_staff_admin_nonacademicstaff = mysqli_query($link, $pros_sql_staff_all_admin_nonacademicstaff);
       $pros_row_cnt_staff_admin_nonacademicstaff = mysqli_num_rows($pros_result_staff_admin_nonacademicstaff);
        #all staff admin nonecademic


         $pros_row_cnt_staff_nonacademicstaff = $pros_row_cnt_staff_admin_nonacademicstaff + $pros_row_cnt_staff_head_nonacademicstaff + $pros_row_cnt_staff_teacher_nonacademicstaff;


         $totalstafftype =  $pros_row_cnt_staff_nonacademicstaff + $pros_row_cnt_staff_academicstaff;

    }


            echo '<div class="col-sm-3 col-md-6 col-lg-3">
               
                <div class="topSecCards" style="width: 100%; height: 120px;">
                    <div style="border: 2px solid #0066FF; height: 100%; border-radius: 8px; padding: 10px;">
                        <div align="center" style="font-size: 60px; color: #0066FF;">
                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-6 col-lg-3">
               
                <div class="topSecCards" style="width: 100%; height: 120px;">
                    <div class="renStaffCard" >
                        <div class="row" style="margin-top: 12px;">
                            <div class="col-6">
                                <h6 style="font-size: 12px; margin-top: 5px; margin-left: 10px; color: #ffffff;">Total Staff</h6>
                                <p></p>
                                <h4 style="margin-left: 10px; color: #ffffff;">'.$pros_row_cnt_staff_all.'</h4>
                            </div>
                            <div class="col-6">
                                
                                <h6 style="color: white;">'.$pros_row_cnt_staff_all_active.'</h6>
                                <h6 style="font-size: 12px; color: #98ff7e;">Active Staffs</h6>
                               
                                <h6 style="color: white;">'.$pros_row_cnt_staff_all_block.'</h6>
                                <h6 style="font-size: 12px; color: #b4030c;">Blocked Staffs</h6>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>

            <div class="col-sm-3 col-md-6 col-lg-3">
               
                <div class="topSecCards" style="width: 100%; height: 120px;">
                    <div class="row">
                        <div class="col-7">
                            <div class="card" style="border: none; margin-top: 10px; background:#f7fff7;border-radius: 20px;">
                                <div class="card-body">
                                    <div class="text-center">';
  
                                    echo '<input data-plugin="knob" data-width="70" data-height="70" data-linecap="round" data-fgColor="#0066FF" value="' . $totalgender . '" data-skin="tron" data-angleOffset="180" data-readOnly="true" data-thickness=".1" />';
  
   
                                        
                                    echo '</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                           
                            <h6 style="color: #666666; margin-top: 25px; font-size: 15px;">'.$pros_row_cnt_staff.'</h6>
                            <h6 style="font-size: 12px; font-weight: 400; color: #057ff1;">Male</h6>
                            <h6 style="color: #666666; font-size: 15px;">'.$pros_row_cnt_staff_female.'</h6>
                            <h6 style="font-size: 12px; font-weight: 400; color: #b4030c;">Female</h6>
                        </div>
                    </div>
                </div>
            
            </div>


            <div class="col-sm-3 col-md-6 col-lg-3">
               
                <div class="topSecCards" style="width: 100%; height: 120px;">
                    <div class="row">
                        <div class="col-6">
                            <div class="card" style="border: none; margin-top: 10px; background: #f7fff7; border-radius: 20px;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <input data-plugin="knob" data-width="70" data-height="70" data-linecap=round data-fgColor="#3ceb71" value="'.$totalstafftype.'" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".1" />';
                                    echo '</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                           
                            <h6 style="color: #666666; margin-top: 15px; font-size: 15px;">'.$pros_row_cnt_staff_academicstaff.'</h6>
                            <h6 style="font-size: 12px; font-weight: 400; color: #057ff1;">Academic Staff</h6>
                            <h6 style="color: #666666; font-size: 15px;">'.$pros_row_cnt_staff_nonacademicstaff.'</h6>
                            <h6 style="font-size: 12px; font-weight: 400; color: #b4030c;">Non-Academic Staff</h6>
                        </div>
                    </div>
                </div>

            </div>';
                
                
                
            //============IF STAFF ALL STATUS ======//



   


    
   


   
?>