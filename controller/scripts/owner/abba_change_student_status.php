<?php

    include('../../config/config.php');

    $abba_student_id = $_POST['abba_student_id'];

    $abba_student_status = $_POST['abba_student_status'];

    $abba_campus_id = $_POST['abba_campus_id'];


    $abba_sql_session = "SELECT * FROM `session` WHERE sessionStatus=1";
    $abba_result_session = mysqli_query($link, $abba_sql_session);
    $abba_row_session = mysqli_fetch_assoc($abba_result_session);
    $abba_row_cnt_session = mysqli_num_rows($abba_result_session);

    $abba_sql_term = "SELECT * FROM `termorsemester` WHERE status=1";
    $abba_result_term = mysqli_query($link, $abba_sql_term);
    $abba_row_term = mysqli_fetch_assoc($abba_result_term);
    $abba_row_cnt_term = mysqli_num_rows($abba_result_term);

    if($_POST['abba_display_session'] == '0' || $_POST['abba_display_session'] == '')
    {
        $abba_display_session = $abba_row_session['sessionName'];
    }
    else
    {
        $abba_display_session = $_POST['abba_display_session'];
    }


    if($_POST['abba_display_term'] == '0' || $_POST['abba_display_term'] == '')
    {
        $abba_display_term = $abba_row_term['TermOrSemesterID'];
    }
    else
    {
        $abba_display_term = $_POST['abba_display_term'];
    }

    $abba_create_date = date('Y-m-d');

    if($abba_student_status == 1)
    {
        $abba_sql_status = ("DELETE FROM `deactivateuser` WHERE `InstitutionIDOrCampusID` = '$abba_campus_id' AND `UserType` = 'student' AND `UserID` = '$abba_student_id' AND `sessionName` = '$abba_display_session' AND `TermOrSemesterName` = '$abba_display_term'");
        $abba_result_status = mysqli_query($link, $abba_sql_status);

        $sqlfrom_abba_check_parent = ("SELECT * FROM `student` WHERE StudentID ='$abba_student_id' AND ParentID != 0");
        $resultfrom_abba_check_parent = mysqli_query($link, $sqlfrom_abba_check_parent);
        $rowfrom_abba_check_parent = mysqli_fetch_assoc($resultfrom_abba_check_parent);
        $row_cntfrom_abba_check_parent = mysqli_num_rows($resultfrom_abba_check_parent);

        if($row_cntfrom_abba_check_parent > 0)
        {
            $abba_get_parent_id = $rowfrom_abba_check_parent['ParentID'];

            $sqlfrom_abba_check_student = ("DELETE FROM `deactivateuser` WHERE `UserType` = 'parent' AND `UserID` = '$abba_get_parent_id'");
            $resultfrom_abba_check_student = mysqli_query($link, $sqlfrom_abba_check_student);

        }
        else{

        }

        echo '<span style="float: right;margin-top:-3px;" id="abba_stud_stat_span'.$abba_student_id.'">
            <div class="dropdown dropdown-sm">
                <button type="button" class="btn chiActive" id="dropdownMenuLink'.$abba_student_id.'" data-bs-toggle="dropdown" aria-expanded="false"> 
                    <i class="fas fa-pencil-alt" aria-hidden="true"></i> Active
                </button>
                
                <ul class="dropdown-menu shadow abba-student-dropdown" aria-labelledby="dropdownMenuLink'.$abba_student_id.'" style="background: #f7fff7;border:none;">
                    <li>
                        <a type="button" data-id="'.$abba_student_id.'" data-status="0" data-span="abba_stud_stat_span'.$abba_student_id.'" data-campusid="'.$abba_campus_id.'" class="dropdown-item abba_change_student_status"> <i class="fa fa-minus-circle text-secondary" style="cursor:pointer;font-size:13px;" aria-hidden="true"> Deactivate</i> </a>
                    </li>

                    <li>
                        <a type="button" data-id="'.$abba_student_id.'" data-status="2" data-span="abba_stud_stat_span'.$abba_student_id.'" data-campusid="'.$abba_campus_id.'" class="dropdown-item abba_change_student_status"> <i class="fas fa-ban text-danger" style="color:#fc7f04;cursor:pointer;font-size:13px;" aria-hidden="true"> Block</i></a>
                    </li>

                </ul>
            </div>
        
        </span>';
    }
    elseif($abba_student_status == 0)
    {
        $abba_sql_status = ("DELETE FROM `deactivateuser` WHERE `InstitutionIDOrCampusID` = '$abba_campus_id' AND `UserType` = 'student' AND `UserID` = '$abba_student_id' AND `sessionName` = '$abba_display_session' AND `TermOrSemesterName` = '$abba_display_term'");
        $abba_result_status = mysqli_query($link, $abba_sql_status);

        $abba_sql_insert = ("INSERT INTO `deactivateuser`(`InstitutionIDOrCampusID`, `UserID`, `UserType`, `sessionName`, `TermOrSemesterName`, `Status`, `Date`) VALUES ('$abba_campus_id','$abba_student_id','student','$abba_display_session','$abba_display_term','$abba_student_status','$abba_create_date')");
        $abba_result_insert = mysqli_query($link, $abba_sql_insert);

        echo '<span style="float: right;margin-top:-3px;" id="abba_stud_stat_span'.$abba_student_id.'">
            <div class="dropdown dropdown-sm">
                <button type="button" class="btn chiInActive" id="dropdownMenuLink'.$abba_student_id.'" data-bs-toggle="dropdown" aria-expanded="false"> 
                    <i class="fas fa-pencil-alt" aria-hidden="true"></i> InActive
                </button>
                
                <ul class="dropdown-menu shadow abba-student-dropdown" aria-labelledby="dropdownMenuLink'.$abba_student_id.'" style="background: #f7fff7;border:none;">
                    <li>
                        <a type="button" data-id="'.$abba_student_id.'" data-status="1" data-span="abba_stud_stat_span'.$abba_student_id.'" data-campusid="'.$abba_campus_id.'" class="dropdown-item abba_change_student_status"> <i class="fa fa-toggle-on text-success" style="cursor:pointer;font-size:13px;" aria-hidden="true"> Activate</i> </a>
                    </li>

                    <li>
                        <a type="button" data-id="'.$abba_student_id.'" data-status="2" data-span="abba_stud_stat_span'.$abba_student_id.'" data-campusid="'.$abba_campus_id.'" class="dropdown-item abba_change_student_status"> <i class="fas fa-ban text-danger" style="color:#fc7f04;cursor:pointer;font-size:13px;" aria-hidden="true"> Block</i></a>
                    </li>

                </ul>
            </div>
        
        </span>';
    }
    else
    {

        $abba_sql_status = ("DELETE FROM `deactivateuser` WHERE `InstitutionIDOrCampusID` = '$abba_campus_id' AND `UserType` = 'student' AND `UserID` = '$abba_student_id'");
        $abba_result_status = mysqli_query($link, $abba_sql_status);

        $abba_sql_insert = ("INSERT INTO `deactivateuser`(`InstitutionIDOrCampusID`, `UserID`, `UserType`, `sessionName`, `TermOrSemesterName`, `Status`, `Date`) VALUES ('$abba_campus_id','$abba_student_id','student','$abba_display_session','$abba_display_term','$abba_student_status','$abba_create_date')");
        $abba_result_insert = mysqli_query($link, $abba_sql_insert);

        $sqlfrom_abba_check_parent = ("SELECT * FROM `student` WHERE StudentID ='$abba_student_id' AND ParentID != 0");
        $resultfrom_abba_check_parent = mysqli_query($link, $sqlfrom_abba_check_parent);
        $rowfrom_abba_check_parent = mysqli_fetch_assoc($resultfrom_abba_check_parent);
        $row_cntfrom_abba_check_parent = mysqli_num_rows($resultfrom_abba_check_parent);

        if($row_cntfrom_abba_check_parent > 0)
        {
            $abba_get_parent_id_check = $rowfrom_abba_check_parent['ParentID'];

            $sqlfrom_abba_get_parent = ("SELECT * FROM `parent` WHERE ParentID ='$abba_get_parent_id_check' AND ParentID != 0");
            $resultfrom_abba_get_parent = mysqli_query($link, $sqlfrom_abba_get_parent);
            $rowfrom_abba_get_parent = mysqli_fetch_assoc($resultfrom_abba_get_parent);
            $row_cntfrom_abba_get_parent = mysqli_num_rows($resultfrom_abba_get_parent);

            if($row_cntfrom_abba_get_parent > 0)
            {
                $abba_get_parent_id = $rowfrom_abba_get_parent['ParentID'];

                $InstitutionIDOrCampusID = $rowfrom_abba_get_parent['InstitutionIDOrCampusID'];
            
                $sqlfrom_abba_check_student = ("SELECT * FROM `student` WHERE NOT EXISTS (SELECT UserID FROM deactivateuser WHERE deactivateuser.UserType = 'student' AND student.StudentID=deactivateuser.UserID AND deactivateuser.Status = 2) AND ParentID ='$abba_get_parent_id' AND StudentTrashStatus = 0");
                $resultfrom_abba_check_student = mysqli_query($link, $sqlfrom_abba_check_student);
                $rowfrom_abba_check_student = mysqli_fetch_assoc($resultfrom_abba_check_student);
                $row_cntfrom_abba_check_student = mysqli_num_rows($resultfrom_abba_check_student);
        
                if($row_cntfrom_abba_check_student > 0)
                {
                       
                }
                else{
        
                    $abba_sql_status_parent = ("DELETE FROM `deactivateuser` WHERE `UserType` = 'parent' AND `UserID` = '$abba_get_parent_id'");
                    $abba_result_status_parent = mysqli_query($link, $abba_sql_status_parent);
    
                    $abba_sql_insert_parent = ("INSERT INTO `deactivateuser`(`InstitutionIDOrCampusID`, `UserID`, `UserType`, `sessionName`, `TermOrSemesterName`, `Status`, `Date`) VALUES ('$InstitutionIDOrCampusID','$abba_get_parent_id','parent','$abba_display_session','$abba_display_term','$abba_student_status','$abba_create_date')");
                    $abba_result_insert_parent = mysqli_query($link, $abba_sql_insert_parent);
                }
            }
            else
            {

            }
        }
        else
        {

        }

        echo '<span style="float: right;margin-top:-3px;" id="abba_stud_stat_span'.$abba_student_id.'">
            <div class="dropdown dropdown-sm">
                <button type="button" class="btn chiBlock" id="dropdownMenuLink'.$abba_student_id.'" data-bs-toggle="dropdown" aria-expanded="false"> 
                    <i class="fas fa-pencil-alt" aria-hidden="true"></i> Blocked
                </button>
                
                <ul class="dropdown-menu shadow abba-student-dropdown" aria-labelledby="dropdownMenuLink'.$abba_student_id.'" style="background: #f7fff7;border:none;">
                    <li>
                        <a type="button" data-id="'.$abba_student_id.'" data-status="1" data-span="abba_stud_stat_span'.$abba_student_id.'" data-campusid="'.$abba_campus_id.'" class="dropdown-item abba_change_student_status"> <i class="fa fa-toggle-on text-success" style="cursor:pointer;font-size:13px;" aria-hidden="true"> Activate</i> </a>
                    </li>

                    <li>
                        <a type="button" data-id="'.$abba_student_id.'" data-status="0" data-span="abba_stud_stat_span'.$abba_student_id.'" data-campusid="'.$abba_campus_id.'" class="dropdown-item abba_change_student_status"> <i class="fa fa-minus-circle text-secondary" style="cursor:pointer;font-size:13px;" aria-hidden="true"> Deactivate</i></a>
                    </li>

                </ul>
            </div>
        
        </span>';
    }

?>
