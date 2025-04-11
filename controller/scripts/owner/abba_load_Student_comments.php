<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../config/config.php');

    $abba_campus_id = $_POST['abba_campus_id'];
    
    $abba_display_result_class = $_POST['abba_display_result_class'];
    
    $abba_display_session = $_POST['abba_display_session'];
    
    $abba_result_display_term = $_POST['abba_result_display_term'];
    
    $abba_get_instituion_id = $_POST['abba_get_instituion_id'];
    
    $abba_result_type = $_POST['abba_result_type'];

    $usertype = $_POST['usertype'];
    
    $abba_comments_staff = $_POST['abba_comments_staff'];

    $abba_comments_usertype = $_POST['abba_comments_usertype'];
    
    
    $abba_sql_student = "SELECT DISTINCT student.StudentID, StudentFirstName, StudentMiddleName, StudentLastName, userlogin.UserRegNumberOrUsername, student.CampusID, parent.ParentEmail, parent.ParentMainPhoneNumber, parent.ParentWhatsappNumber,
    student.StudentPhoto 
    FROM student 
    INNER JOIN classordepartmentstudentallocation ON student.StudentID=classordepartmentstudentallocation.StudentID AND student.CampusID=classordepartmentstudentallocation.CampusID 
    INNER JOIN userlogin ON student.StudentID=userlogin.UserID AND student.CampusID=userlogin.InstitutionIDOrCampusID 
    LEFT JOIN parent ON student.ParentID=parent.ParentID 
    WHERE student.CampusID=$abba_campus_id AND userlogin.InstitutionIDOrCampusID=$abba_campus_id AND userlogin.UserType='student' AND classordepartmentstudentallocation.CampusID=$abba_campus_id AND classordepartmentstudentallocation.Session='$abba_display_session' AND classordepartmentstudentallocation.ClassOrDepartmentID='$abba_display_result_class' AND StudentTrashStatus = 0 ORDER BY StudentLastName ASC";
    $abba_result_student = mysqli_query($link, $abba_sql_student);
    $abba_row_student = mysqli_fetch_assoc($abba_result_student);
    $abba_row_cnt_student = mysqli_num_rows($abba_result_student);
    
    if($abba_row_cnt_student > 0)
    {
        
        echo '<div class="row g-4 mt-1 maincard selectBox-cont">';

            do{

                $abba_get_student_id = $abba_row_student['StudentID'];

                $abba_get_campus = $abba_row_student['CampusID'];

                $abba_get_student_image = $abba_row_student['StudentPhoto'];

                if($abba_get_student_image === '' || $abba_get_student_image === 0)
                {
                    $abba_get_student_image_final = '../../assets/images/adminImg/default-img.png';
                }
                else
                {
                    $abba_get_student_image_final = $abba_get_student_image;
                }

                
                $abba_get_student_name = '<b>'.$abba_row_student['StudentLastName'].'</b>, '.substr($abba_row_student['StudentMiddleName'], 0, 1).'. '.$abba_row_student['StudentFirstName'];

                $abba_get_student_name_string_length = strlen($abba_get_student_name);

                if($abba_get_student_name_string_length > 23)
                {
                    $abba_get_student_name_shortened_or_not = substr($abba_get_student_name, 0, 23).'..';
                }
                else
                {
                    $abba_get_student_name_shortened_or_not = $abba_get_student_name;
                }

                $abba_sql_status = ("SELECT deactivateuser.Status FROM `deactivateuser` WHERE UserID = '$abba_get_student_id' AND UserType = 'student' AND InstitutionIDOrCampusID = '$abba_get_campus' AND sessionName = '$abba_display_session' AND (TermOrSemesterName = $abba_result_display_term OR TermOrSemesterName = '')");
                $abba_result_status = mysqli_query($link, $abba_sql_status);
                $abba_row_status = mysqli_fetch_assoc($abba_result_status);
                $abba_row_cnt_status = mysqli_num_rows($abba_result_status);

                if($abba_row_cnt_status < 1)
                {
                    echo '<div class="col-sm-3 col-md-6 col-lg-3 carditems card_search_get student_delete_'.$abba_get_student_id.'">
                        <div class="topSecCards" style="width: 100%; ">
                            
                            <div align="center" style="margin-top: 18px;">
                                <label style="cursor:pointer;">
                                    <img class="student'.$abba_get_student_id.'" data-studimgclass="student'.$abba_get_student_id.'" id="abba_get_student_image" data-id="'.$abba_get_student_id.'" data-campusid="'.$abba_get_campus.'" src="'.$abba_get_student_image_final.'" style="width: 30%; border-radius: 50%;" alt=""><br>
                                    <input type="hidden" style="display:none;" class="abba_update_student_image" name="abba_insert_student_image" accept="image/*">
                                </label>
                                
                                <h6 class="abba_tooltip" style="font-weight: 600; margin-top: 5px;font-size:14px;"><i class="fa fa-circle text-success"></i> '.$abba_get_student_name_shortened_or_not.'<span class="abba_tooltiptext">'.$abba_get_student_name.'</span></h6>
                                <p style="font-weight: 500; color: #b8b8b8;">'.$abba_row_student['UserRegNumberOrUsername'].'</p>';

                                $sqlClasscount = ("SELECT * FROM classordepartment WHERE ClassOrDepartmentID = '$abba_display_result_class' AND CampusID = '$abba_campus_id'");
                                $resultClasscount = mysqli_query($link, $sqlClasscount);
                                $rowGetClasscount = mysqli_fetch_assoc($resultClasscount);
                                $row_cntClasscount = mysqli_num_rows($resultClasscount);

                                $SectionID = $rowGetClasscount['SectionID'];

                                if($abba_result_type == 'termly'){

                                    $sqlgettotalgrade = "SELECT AVG(Exam + CA1 + CA2 + CA3 + CA4 + CA5 + CA6 + CA7 + CA8 + CA9 + CA10) AS average FROM `score` WHERE (`Exam` !='0' OR `CA1` !='0' OR `CA2` !='0' OR `CA3` !='0' OR `CA4` !='0' OR `CA5` !='0' OR `CA6` !='0' OR `CA7` !='0' OR `CA8` !='0' OR `CA9` !='0' OR `CA10` !='0') AND CampusID = '$abba_campus_id' AND StudentID = '$abba_get_student_id' AND ClassOrDepartmentID = '$abba_display_result_class' AND Session = '$abba_display_session' AND TermOrSemester = '$abba_result_display_term'";
                                
                                }
                                else if($abba_result_type == 'cummulative'){

                                    $sqlgettotalgrade = "SELECT AVG(Exam + CA1 + CA2 + CA3 + CA4 + CA5 + CA6 + CA7 + CA8 + CA9 + CA10) AS average FROM `score` WHERE (`Exam` !='0' OR `CA1` !='0' OR `CA2` !='0' OR `CA3` !='0' OR `CA4` !='0' OR `CA5` !='0' OR `CA6` !='0' OR `CA7` !='0' OR `CA8` !='0' OR `CA9` !='0' OR `CA10` !='0') AND CampusID = '$abba_campus_id' AND StudentID = '$abba_get_student_id' AND ClassOrDepartmentID = '$abba_display_result_class' AND Session = '$abba_display_session'";
                                
                                }
                                else{

                                    $sqltogetresultsettings = mysqli_query($link,"SELECT * FROM `resultsetting` WHERE SectionID='$SectionID' AND CampusID = '$abba_campus_id'");
                                    $rowresultsettings = mysqli_fetch_assoc($sqltogetresultsettings);
                                    $countresultsettings = mysqli_num_rows($sqltogetresultsettings);
                
                                    if($countresultsettings > 0)
                                    {
                                        $MidTermCaToUse = $rowresultsettings['MidTermCaToUse'];
                
                                        $MidTermCaToUseArr = explode(',',$MidTermCaToUse);

                                        if(in_array("1", $MidTermCaToUseArr))
                                        {
                                            $ca1 = 'CA1';
                                        }
                                        else{
                                            $ca1 = 0;
                                        }
                
                                        if(in_array("2", $MidTermCaToUseArr))
                                        {
                                            $ca2 = 'CA2';
                                        }
                                        else{
                                            $ca2 = 0;
                                        }
                                        if(in_array("3", $MidTermCaToUseArr))
                                        {
                                            $ca3 = 'CA3';
                                        }
                                        else{
                                            $ca3 = 0;
                                        }
                                        if(in_array("4", $MidTermCaToUseArr))
                                        {
                                            $ca4 = 'CA4';
                                        }
                                        else{
                                            $ca4 = 0;
                                        }
                                        if(in_array("5", $MidTermCaToUseArr))
                                        {
                                            $ca5 = 'CA5';
                                        }
                                        else{
                                            $ca5 = 0;
                                        }
                                        if(in_array("6", $MidTermCaToUseArr))
                                        {
                                            $ca6 = 'CA6';
                                        }
                                        else{
                                            $ca6 = 0;
                                        }
                                        if(in_array("7", $MidTermCaToUseArr))
                                        {
                                            $ca7 = 'CA7';
                                        }
                                        else{
                                            $ca7 = 0;
                                        }
                                        if(in_array("8", $MidTermCaToUseArr))
                                        {
                                            $ca8 = 'CA8';
                                        }
                                        else{
                                            $ca8 = 0;
                                        }
                                        if(in_array("9", $MidTermCaToUseArr))
                                        {
                                            $ca9 = 'CA9';
                                        }
                                        else{
                                            $ca9 = 0;
                                        }
                                        if(in_array("10", $MidTermCaToUseArr))
                                        {
                                            $ca10 = 'CA10';
                                        }
                                        else{
                                            $ca10 = 0;
                                        }
                                        
                                    }
                                    else
                                    {
                                        $CA1MidTerm = 0;
                                        $CA2MidTerm = 0;
                                        $CA3MidTerm = 0;
                                        $CA4MidTerm = 0;
                                        $CA5MidTerm = 0;
                                        $CA6MidTerm = 0;
                                        $CA7MidTerm = 0;
                                        $CA8MidTerm = 0;
                                        $CA9MidTerm = 0;
                                        $CA10MidTerm = 0;
                                        
                                        $CA1MidTermHighestScore = 0;
                                        $CA2MidTermHighestScore = 0;
                                        $CA3MidTermHighestScore = 0;
                                        $CA4MidTermHighestScore = 0;
                                        $CA5MidTermHighestScore = 0;
                                        $CA6MidTermHighestScore = 0;
                                        $CA7MidTermHighestScore = 0;
                                        $CA8MidTermHighestScore = 0;
                                        $CA9MidTermHighestScore = 0;
                                        $CA10MidTermHighestScore = 0;
                                        
                                        $ca1 = 0;
                                        $ca2 = 0;
                                        $ca3 = 0;
                                        $ca4 = 0;
                                        $ca5 = 0;
                                        $ca6 = 0;
                                        $ca7 = 0;
                                        $ca8 = 0;
                                        $ca9 = 0;
                                        $ca10 = 0;
                                    }

                                    $sqlgettotalgrade = "SELECT AVG($ca1+$ca2+$ca3+$ca4+$ca5+$ca6+$ca7+$ca8+$ca9+$ca10) * 10 AS average FROM `score` WHERE (`Exam` !='0' OR `CA1` !='0' OR `CA2` !='0' OR `CA3` !='0' OR `CA4` !='0' OR `CA5` !='0' OR `CA6` !='0' OR `CA7` !='0' OR `CA8` !='0' OR `CA9` !='0' OR `CA10` !='0') AND CampusID = '$abba_campus_id' AND StudentID = '$abba_get_student_id' AND ClassOrDepartmentID = '$abba_display_result_class' AND Session = '$abba_display_session' AND TermOrSemester = '$abba_result_display_term'";
                                
                                }
                                $resultgettotalgrade = mysqli_query($link, $sqlgettotalgrade);
                                $rowgettotalgrade = mysqli_fetch_assoc($resultgettotalgrade);
                                $row_cntgettotalgrade = mysqli_num_rows($resultgettotalgrade);
                                
                                if($rowgettotalgrade['average'] > 0)
                                {
                                    
                                    $gettotgrade = floatval(round($rowgettotalgrade['average'], 2));
    
                                }
                                else
                                {
                                    $gettotgrade = 0;
    
                                }

                                echo '<h6 class="abba_tooltip" style="font-weight: 600; margin-top: 1px;font-size:14px;">Average: '.$gettotgrade.'</h6>
                                
                            </div>
                            <div style="padding: 7px;">
                                <div style="width: 100%; border-radius: 5px; background-color: #e8ebf1;">
                                    
                                    <div style="padding: 5px;" align="center">';
                                        
                                        $sqlremark = ("SELECT * FROM `remark` WHERE `CampusID` = '$abba_get_campus' AND `StudentID` = '$abba_get_student_id' AND `RemarkType` = '$abba_comments_usertype' AND `ResultType` = '$abba_result_type' AND `Session` = '$abba_display_session' AND `TermOrSemester` = '$abba_result_display_term'");
                                        $resultremark = mysqli_query($link, $sqlremark);
                                        $rowGetremark = mysqli_fetch_assoc($resultremark);
                                        $row_cntremark = mysqli_num_rows($resultremark);

                                        if($row_cntremark > 0){

                                            $stud_remark = $rowGetremark['RemarkComment'];
                                        
                                        }
                                        else{

                                            $stud_remark = "";
                                        
                                        }
                                        echo '<textarea class="form-control" id="stud_'.$abba_get_student_id.'" placeholder="Enter comment here" rows="3" style="font-size:13px;">'.$stud_remark.'</textarea>
                                    
                                        <button type="button" align="right" data-stud="'.$abba_get_student_id.'" data-camp="'.$abba_get_campus.'" data-session="'.$abba_display_session.'" data-term="'.$abba_result_display_term.'" data-usertype="'.$abba_comments_usertype.'" data-staffid="'.$abba_comments_staff.'" data-resulttype="'.$abba_result_type.'" class="btn btn-sm bg-primary text-light rounded-3 mt-1 abba_save_comments"><i class="fas fa-save"> Save</i></button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>';
                    
                }
                else
                {
                    
                }
                    
            }while($abba_row_student = mysqli_fetch_assoc($abba_result_student));

        echo '</div>';
    }
    else
    {
        echo '<div align="center" class="mt-2"><img src="../../assets/images/adminImg/err.png" style="width:15%;"/><p class="pt-2 fs-6 text-secondary">We couldn\'t find any record.</p></div>';
    }
    
?>