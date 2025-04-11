<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    include('../../config/config.php');
    
    $abba_instituion_id = $_POST['abba_instituion_id'];

    $abba_campus_id = $_POST['abba_campus_id'];

    $abba_sql_session = "SELECT * FROM `session` WHERE sessionStatus=1";
    $abba_result_session = mysqli_query($link, $abba_sql_session);
    $abba_row_session = mysqli_fetch_assoc($abba_result_session);
    $abba_row_cnt_session = mysqli_num_rows($abba_result_session);

    $abba_display_session = $abba_row_session['sessionName'];
    
    $abba_sql_term = "SELECT * FROM `termorsemester` WHERE status=1";
    $abba_result_term = mysqli_query($link, $abba_sql_term);
    $abba_row_term = mysqli_fetch_assoc($abba_result_term);
    $abba_row_cnt_term = mysqli_num_rows($abba_result_term);

    $abba_display_term = $abba_row_term['TermOrSemesterID'];
    
    if($abba_instituion_id == '' || $abba_instituion_id == '0' || $abba_instituion_id == 0 || $abba_instituion_id == 'undefined' || $abba_instituion_id == 'NULL')
    {
        
        echo '<input type="hidden" id="hold_tot_class" value="0">
            <input type="hidden" id="hold_tot_teach" value="0">';
        
        echo '<div align="center" class="mt-2"><img src="../../assets/images/adminImg/err.png" style="width:15%;"/><p class="pt-2 fs-6 text-secondary">We couldn\'t find any record.</p></div>';
    }
    else
    {
        
        $abba_sql_class = "SELECT classordepartment.ClassOrDepartmentID, classordepartment.ClassTemplateID, campus.CampusID, ClassOrDepartmentName, COUNT(StudentID) AS Student, HODOrFormTeacherUserID, ResultType, GradingMethodID, StaffLastName, StaffMiddleName, StaffFirstName, CampusName FROM classordepartment INNER JOIN campus ON classordepartment.CampusID = campus.CampusID LEFT JOIN classordepartmentstudentallocation ON classordepartment.ClassOrDepartmentID = classordepartmentstudentallocation.ClassOrDepartmentID AND classordepartmentstudentallocation.Session='$abba_display_session' LEFT JOIN staff ON classordepartment.HODOrFormTeacherUserID = staff.StaffID WHERE campus.InstitutionID=$abba_instituion_id AND (campus.CampusID=$abba_campus_id OR $abba_campus_id IS NULL) GROUP BY classordepartment.ClassOrDepartmentID ORDER BY trim(ClassOrDepartmentName) ASC";
        $abba_result_class = mysqli_query($link, $abba_sql_class);
        $abba_row_class = mysqli_fetch_assoc($abba_result_class);
        $abba_row_cnt_class = mysqli_num_rows($abba_result_class);
        
        if($abba_row_cnt_class > 0)
        {
            $cnt = 0;
            
            $abba_sql_class_form_teacher = "SELECT DISTINCT(HODOrFormTeacherUserID) FROM classordepartment INNER JOIN campus ON classordepartment.CampusID = campus.CampusID WHERE campus.InstitutionID=$abba_instituion_id AND (campus.CampusID=$abba_campus_id OR $abba_campus_id IS NULL)";
            $abba_result_class_form_teacher = mysqli_query($link, $abba_sql_class_form_teacher);
            $abba_row_cnt_class_form_teacher = mysqli_num_rows($abba_result_class_form_teacher);
            
            echo '<input type="hidden" id="hold_tot_class" value="'.$abba_row_cnt_class.'">
                <input type="hidden" id="hold_tot_teach" value="'.$abba_row_cnt_class_form_teacher.'">';
            
            echo '<table id="table2" class="table" style="width:100%;">
                <thead>
                    <tr style="color: #636161;">
                        <th>SN</th>
                        <th>Class Name</th>
                        <th class="d-none d-sm-table-cell">Form Teacher</th>
                        <th>Students</th>
                        <th class="d-none d-sm-table-cell">Subject</th>
                        <th class="d-none d-sm-table-cell">Grading</th>
                        <th class="d-none d-sm-table-cell">Result Type</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody style="color: #888888;">';
    
                    do{
    
                        $abba_display_class = $abba_row_class['ClassOrDepartmentID'];
    
                        $GradingMethodID = $abba_row_class['GradingMethodID'];
    
                        $HODOrFormTeacherUserID = $abba_row_class['HODOrFormTeacherUserID'];
    
                        $camp_id = $abba_row_class['CampusID'];
                        
                        $CampusName = $abba_row_class['CampusName'];
    
                        $abba_sql_subject = "SELECT COUNT(SubjectOrCourseID) AS subject FROM courseorsubjectallocation WHERE CampusID=$camp_id AND ClassOrDepartmentID = '$abba_display_class'";
                        $abba_result_subject = mysqli_query($link, $abba_sql_subject);
                        $abba_row_subject = mysqli_fetch_assoc($abba_result_subject);
                        $abba_row_cnt_subject = mysqli_num_rows($abba_result_subject);
    
    
                        $abba_sql_gradingmethod = "SELECT * FROM gradingmethod WHERE InstitutionID=$abba_instituion_id AND GradingMethodID = '$GradingMethodID'";
                        $abba_result_gradingmethod = mysqli_query($link, $abba_sql_gradingmethod);
                        $abba_row_gradingmethod = mysqli_fetch_assoc($abba_result_gradingmethod);
                        $abba_row_cnt_gradingmethod = mysqli_num_rows($abba_result_gradingmethod);
    
                        if($abba_row_cnt_gradingmethod > 0)
                        {
                            $GradingMethodTitle = $abba_row_gradingmethod['GradingMethodTitle'];
                        }
                        else{
                            $GradingMethodTitle = 'Assign Grading Method';
                        }
    
                        if($HODOrFormTeacherUserID == '' || $HODOrFormTeacherUserID == NULL || $HODOrFormTeacherUserID == '0')
                        {
                            
                            $staffname = 'Assign Form Teacher';
                        }
                        else{
                            $staffname = $abba_row_class['StaffLastName'].' '.substr($abba_row_class['StaffMiddleName'], 0, 1).'. '.$abba_row_class['StaffFirstName'];
                        }
    
    
                        if($abba_row_class['ResultType'] === '' || $abba_row_class['ResultType'] === NULL  || $abba_row_class['ResultType'] === 0)
                        {
                            
                            $ResultType = 'Assign Result Type';
                        }
                        else{
                            $ResultType = $abba_row_class['ResultType'];
                        }
    
                        
                        $cnt++;
    
                        echo '<tr>
                            <td>
                                '.$cnt.'
                            </td>
    
                            <td>
                                <a href="../administration/?class='.$abba_display_class.'&campus='.$camp_id.'" style="text-decoration:none;">
                                    <span class="class_name_span'.$abba_display_class.'">'.$abba_row_class['ClassOrDepartmentName'].'</span>';
    
                                    if($abba_campus_id == 'NULL')
                                    {
                                        echo '<br><small style="font-size:8px;">'.$CampusName.'</small>';
                                    }
                                    else
                                    {
    
                                    }
                                echo '</a>
                            </td>
    
                            <td class="d-none d-sm-table-cell">
                                <button type="button" class="btn abba_class_row create-acad-class-modal" data-bs-toggle="modal" data-bs-target="#abba_acad_class_Modal" data-id="1" data-currentid="'.$abba_display_class.'" data-campus="'.$camp_id.'"> <i class="fas fa-pencil-alt" aria-hidden="true"></i> '.$staffname.' </button>
                            </td>
    
                            <td><a href="../administration/?class='.$abba_display_class.'&campus='.$camp_id.'" style="text-decoration:none;cursor:pointer;"><i class="fa fa-eye"> '.$abba_row_class['Student'].'</i></a></td>
    
                            <td class="d-none d-sm-table-cell">
                                <i class="fas fa-pencil-alt text-success" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#abba_create_subject_Modal" style="cursor:pointer;" data-temp="'.$abba_row_class['ClassTemplateID'].'" data-id="'.$abba_display_class.'" data-camp="'.$camp_id.'"> '.$abba_row_subject['subject'].'</i> 
                            </td>
                            
                            <td class="d-none d-sm-table-cell">
                                <button type="button" class="btn abba_class_row create-acad-class-modal" data-bs-toggle="modal" data-bs-target="#abba_acad_class_Modal" data-id="2" data-currentid="'.$abba_display_class.'" data-campus="'.$camp_id.'"> <i class="fas fa-pencil-alt" aria-hidden="true"></i> '.$GradingMethodTitle.'
                                </button>
                            </td>
    
                            <td class="d-none d-sm-table-cell">
                                <button type="button" class="btn abba_class_row create-acad-class-modal" data-bs-toggle="modal" data-bs-target="#abba_acad_class_Modal" data-id="3" data-currentid="'.$abba_display_class.'" data-campus="'.$camp_id.'"> <i class="fas fa-pencil-alt" aria-hidden="true"></i> '.$ResultType.'</button>
                                
                            </td>
                            <td class="showHideRow d-lg-none" data-id="hidden_row'.$abba_display_class.'" style="cursor:pointer;">
                                <i class="fa fa-eye fs-6 text-primary" id="hidden_row'.$abba_display_class.'_eye"></i> 
                            </td>
                            <td>
                                <i class="fas fa-pencil-alt fs-6 text-warning" data-bs-toggle="modal" data-bs-target="#abba_edit_class_Modal" data-id="'.$abba_display_class.'" data-camp="'.$camp_id.'" data-input="class_name'.$abba_display_class.'" data-span="class_name_span'.$abba_display_class.'" style="cursor:pointer;"></i>
                                <input type="hidden" value="'.$abba_row_class['ClassOrDepartmentName'].'" class="class_name'.$abba_display_class.'">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <i class="fa fa-trash fs-6 text-danger" data-bs-toggle="modal" data-bs-target="#delClassModal" data-id="'.$abba_display_class.'" data-camp="'.$camp_id.'" style="cursor:pointer;"></i>
                            </td>
                            
                        </tr>';
    
                        echo '<tr id="hidden_row'.$abba_display_class.'" class="hidden_row d-lg-none">
                            <td colspan="7">
                                <div class="row d-lg-none">
                                    <div class="col-6 mt-3">
                                        <button type="button" class="btn abba_class_row create-acad-class-modal" data-bs-toggle="modal" data-bs-target="#abba_acad_class_Modal" data-id="1" data-currentid="'.$abba_display_class.'" data-campus="'.$camp_id.'"> <i class="fas fa-pencil-alt" aria-hidden="true"></i> '.$staffname.' </button>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <button type="button" class="btn abba_class_row create-acad-class-modal" data-bs-toggle="modal" data-bs-target="#abba_acad_class_Modal" data-id="2" data-currentid="'.$abba_display_class.'" data-campus="'.$camp_id.'"> <i class="fas fa-pencil-alt" aria-hidden="true"></i> '.$GradingMethodTitle.' </button>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <button type="button" class="btn abba_class_row create-acad-class-modal" data-bs-toggle="modal" data-bs-target="#abba_acad_class_Modal" data-id="3" data-currentid="'.$abba_display_class.'" data-campus="'.$camp_id.'"> <i class="fas fa-pencil-alt" aria-hidden="true"></i> '.$ResultType.'</button>
                                    </div>
                                    <div class="col-6 mt-3 fw-normal">
                                        <i class="fas fa-pencil-alt text-success" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#abba_create_subject_Modal" style="cursor:pointer;" data-temp="'.$abba_row_class['ClassTemplateID'].'" data-id="'.$abba_display_class.'" data-camp="'.$camp_id.'"> '.$abba_row_subject['subject'].' Subjects</i> 
                                    </div>
                                </div>
                            </td>
                        </tr>';
                    }while($abba_row_class = mysqli_fetch_assoc($abba_result_class));
    
                echo '</tbody>
            </table>';
        }
        else
        {
    
            echo '<input type="hidden" id="hold_tot_class" value="0">
                <input type="hidden" id="hold_tot_teach" value="0">';
            
            echo '<div align="center" class="mt-2"><img src="../../assets/images/adminImg/err.png" style="width:15%;"/><p class="pt-2 fs-6 text-secondary">We couldn\'t find any record.</p></div>';
        }
    }

?>