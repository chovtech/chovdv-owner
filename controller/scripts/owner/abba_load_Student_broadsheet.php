<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../config/config.php');

    $abba_campus_id = $_POST['abba_campus_id'];
    $abba_display_result_class = $_POST['abba_display_result_class'];
    
    $abba_display_result_class_name = $_POST['abba_display_result_class_name'];
    
    $abba_display_session = $_POST['abba_display_session'];
    $abba_result_display_term = $_POST['abba_result_display_term'];
    $abba_result_display_term_name = $_POST['abba_result_display_term_name'];

    $abba_get_instituion_id = $_POST['abba_get_instituion_id'];
    
    $abba_campus_name = $_POST['abba_campus_name'];

    $sqlinstitution = ("SELECT * FROM `institution` WHERE InstitutionID = '$abba_get_instituion_id'");
	$resultinstitution = mysqli_query($link, $sqlinstitution);
	$rowinstitution = mysqli_fetch_assoc($resultinstitution);
	$row_cntinstitution = mysqli_num_rows($resultinstitution);

	$InstitutionLogo = $rowinstitution['InstitutionLogo'];

    $sqlgetclassname = mysqli_query($link,"SELECT * FROM `classordepartment` WHERE `ClassOrDepartmentID` ='$abba_display_result_class' AND CampusID='$abba_campus_id'");
    $rowgetclassname = mysqli_fetch_array($sqlgetclassname);
    $teacherid = $rowgetclassname['HODOrFormTeacherUserID'];
    $getgrademethod = $rowgetclassname['GradingMethodID'];

    $sqltogetstaffname = mysqli_query($link,"SELECT * FROM `staff` WHERE `StaffID`='$teacherid'");
    $rowtogetstaffname = mysqli_fetch_array($sqltogetstaffname);

    $sqlGetSchool = "SELECT * FROM `classordepartment` WHERE ClassOrDepartmentID='$abba_display_result_class'";
    $queryGetSchool = mysqli_query($link, $sqlGetSchool);
    $rowGetSchool = mysqli_fetch_assoc($queryGetSchool);
    $countGetSchool = mysqli_num_rows($queryGetSchool);

    $SectionID = $rowGetSchool['SectionID'];

    if($abba_result_display_term == 'cumulative')
    {
        echo '<div class="row">
            <div class="col-12 float-end">
                <button type="button" class="btn btn-sm bg-light text-primary rounded-3 btn-outline-primary float-end" onclick="tableToExcel(\'testTable\', \'W3C Example Table\')" style="width:30px%;border-top:none;border-left:none;border-right:none;"><i class="fas fa-download"> Download</i></button>
            </div>
            <div class="col-12">
                <div class="table-responsive text-nowrape mt-2">
                    <table class="table table-bordered table-striped rotate-table-grid" id="testTable" summary="Code page support in different versions of MS Windows." rules="groups" frame="hsides" border="2">
                        <thead>';

                            $sqltogetsubjectsheader = mysqli_query($link,"SELECT * FROM `courseorsubjectallocation` 
                            WHERE `ClassOrDepartmentID`='$abba_display_result_class' AND `CampusID` ='$abba_campus_id'");
                            $rowgetsubjectsheader = mysqli_fetch_array($sqltogetsubjectsheader);
                            $countsubjectsheader = mysqli_num_rows($sqltogetsubjectsheader);

                            $newtotalcol = ($countsubjectsheader * 3) + 6;

                            echo '<tr>
                                <th colspan="'.$newtotalcol.'">
                                    <div class="row">
                                        <div class="col-sm-2 col-md-2 col-xs-2 col-lg-2">
                                            <div align="center">
                                                <img src="'.$InstitutionLogo.'" class="img-fluid" alt="..." width="100" height="auto">
                                            </div>
                                        </div>
                                        <div class="col-sm-10 col-md-10 col-xs-10 col-lg-10">
                                            <p style="color: #000000;font-size:40px;">'.$abba_campus_name.'</p>
                                            <p style="color: #000000;font-size:18px;font-weight:450;">BROADSHEET REPORT FOR '.$abba_display_session.' SESSION | CLASS: '.$abba_display_result_class_name.' | TERM: '.$abba_result_display_term_name.'</p>
                                        </div>
                                    </div>
                                </th>
                            </tr>

                            <tr>
                                <th colspan="2" style="width: 100px;">    
                                    
                                </th>';
                                
                                $sqltogetsubjects = mysqli_query($link,"SELECT * FROM `courseorsubjectallocation` 
                                WHERE `ClassOrDepartmentID`='$abba_display_result_class' AND `CampusID` ='$abba_campus_id'");
                                $rowgetsubjects = mysqli_fetch_array($sqltogetsubjects);
                            
                                $countsubjects = mysqli_num_rows($sqltogetsubjects);
                                if($countsubjects > 0)
                                {
                                    do{
                                        $subjectid = $rowgetsubjects['SubjectOrCourseID'];
                                        $sqltogetsubjectname = mysqli_query($link,"SELECT * FROM `subjectorcourse` WHERE `SubjectOrCourseID`='$subjectid'");
                                        $rowtogetsubjectname = mysqli_fetch_array($sqltogetsubjectname);

                                        echo '<th colspan="3">'.$rowtogetsubjectname['SubjectOrCourseTitle'].'</th>';
                                    }while($rowgetsubjects = mysqli_fetch_array($sqltogetsubjects));
                                }

                                echo '<th>TOTAL SCORE</th>
                                <th>AVERAGE SCORE</th>
                                
                                <th>OVERALL GRADE</th>
                                <th>REMARK</th>
                            
                            </tr>
                        </thead>
                        <tbody style="font-size:12px;">
                            <tr>
                                <th style="width: 20px;">S/N</th>
                                <th style="width: 100px;">NAMES OF STUDENTS</th>';
                                
                                $sqltogetsubjects = mysqli_query($link,"SELECT * FROM `courseorsubjectallocation` 
                                WHERE `ClassOrDepartmentID`='$abba_display_result_class' AND `CampusID` ='$abba_campus_id'");
                                $rowgetsubjects = mysqli_fetch_array($sqltogetsubjects);

                                do{
                            
                                    echo '<td>1st Term</td>
                                        <td>2nd Term</td>
                                        <td>3rd Term</td>';

                                }while($rowgetsubjects = mysqli_fetch_array($sqltogetsubjects));
                            
                                echo '<td> </td>
                                <td> </td>
                                <td> </td>
                                
                                
                            </tr>';

                            $sql = mysqli_query($link,"SELECT * FROM `classordepartmentstudentallocation`
                            WHERE `CampusID`='$abba_campus_id' AND `ClassOrDepartmentID`='$abba_display_result_class'AND `Session` ='$abba_display_session'");
                            $row = mysqli_fetch_array($sql);
                            $count = mysqli_num_rows($sql);
                    
                            if($count > 0)
                            {
                                $counter = 1;
                                
                                do {
                                    $studentid = $row['StudentID'];
                                    $sqltogetstudentname = mysqli_query($link,"SELECT * FROM `student` WHERE `StudentID`='$studentid'");
                                    $rowtogetstudentname = mysqli_fetch_array($sqltogetstudentname);   

                                    $sqltogetstudentregnumber = mysqli_query($link,"SELECT * FROM `userlogin` 
                                    WHERE `UserID` ='$studentid' AND `InstitutionIDOrCampusID`='$abba_campus_id' AND `UserType`='student'");
                                    $rowtogetstudentregnumber  = mysqli_fetch_array($sqltogetstudentregnumber);
                                    $studentregnumber = $rowtogetstudentregnumber['UserRegNumberOrUsername'];
                            
                                    $sqltogetstudoffersub = mysqli_query($link,"SELECT * FROM `score` WHERE `StudentID`='$studentid' AND `CampusID`='$abba_campus_id' AND ClassOrDepartmentID='$abba_display_result_class' AND `Session`='$abba_display_session' AND (`Exam` !='0' OR `CA1` !='0' OR `CA2` !='0' OR `CA3` !='0' OR `CA4` !='0' OR `CA5` !='0' OR `CA6` !='0' OR `CA7` !='0' OR `CA8` !='0' OR `CA9` !='0' OR `CA10` !='0')");
                                    $rowtogetstudoffersub  = mysqli_fetch_array($sqltogetstudoffersub);
                                    $rowtocntstudoffersub  = mysqli_num_rows($sqltogetstudoffersub);

                                    echo '<tr>
                                        <th>'.$counter.'</th>
                                        <td>'.$rowtogetstudentname['StudentFirstName'].' '.$rowtogetstudentname['StudentLastName'].'</td>';

                                        $sqltogetsubjects = mysqli_query($link,"SELECT * FROM `courseorsubjectallocation` 
                                        WHERE `ClassOrDepartmentID`='$abba_display_result_class' AND `CampusID` ='$abba_campus_id'");
                                        $rowgetsubjects = mysqli_fetch_array($sqltogetsubjects);
                            
                                        $countsubjects = mysqli_num_rows($sqltogetsubjects);
                                        if($countsubjects > 0)
                                        {
                                            do{
                                                $subID = $rowgetsubjects['SubjectOrCourseID'];

                                                $sqltogetstudentscore1 = mysqli_query($link,"SELECT * , CA1+CA2+CA3+CA4+CA5+CA6+CA7+CA8+CA9+CA10+Exam AS Total 
                                                FROM `score` WHERE `StudentID`='$studentid' AND `CampusID`='$abba_campus_id' AND CourseOrSubjectID='$subID' AND ClassOrDepartmentID='$abba_display_result_class' AND `Session`='$abba_display_session' AND `TermOrSemester`='1'");
                                                $rowtogetstudentscore1 = mysqli_fetch_array($sqltogetstudentscore1);

                                    
                                                if($rowtogetstudentscore1 < 1)
                                                {

                                                    $total1 = '0';
                                                }
                                                else{
                                                    $total1 = $rowtogetstudentscore1['Total'];
                                                }

                                                echo '<td>'.number_format($total1, 2).' </td>';

                                                $sqltogetstudentscore2 = mysqli_query($link,"SELECT * , CA1+CA2+CA3+CA4+CA5+CA6+CA7+CA8+CA9+CA10+Exam AS Total 
                                                FROM `score` WHERE `StudentID`='$studentid' AND `CampusID`='$abba_campus_id' AND CourseOrSubjectID='$subID' AND ClassOrDepartmentID='$abba_display_result_class' AND `Session`='$abba_display_session' AND `TermOrSemester`='2'");
                                                $rowtogetstudentscore2 = mysqli_fetch_array($sqltogetstudentscore2);

                                    
                                                if($rowtogetstudentscore2 < 1)
                                                {

                                                    $total2 = '0';
                                                }
                                                else{
                                                    $total2 = $rowtogetstudentscore2['Total'];
                                                }

                                                echo '<td>'.number_format($total2, 2).' </td>';

                                                $sqltogetstudentscore3 = mysqli_query($link,"SELECT * , CA1+CA2+CA3+CA4+CA5+CA6+CA7+CA8+CA9+CA10+Exam AS Total 
                                                FROM `score` WHERE `StudentID`='$studentid' AND `CampusID`='$abba_campus_id' AND CourseOrSubjectID='$subID' AND ClassOrDepartmentID='$abba_display_result_class' AND `Session`='$abba_display_session' AND `TermOrSemester`='3'");
                                                $rowtogetstudentscore3 = mysqli_fetch_array($sqltogetstudentscore3);

                                    
                                                if($rowtogetstudentscore3 < 1)
                                                {

                                                    $total3 = '0';
                                                }
                                                else{
                                                    $total3 = $rowtogetstudentscore3['Total'];
                                                }

                                                echo '<td>'.number_format($total3, 2).' </td>';

                                            }while($rowgetsubjects = mysqli_fetch_array($sqltogetsubjects));
                                        }
                                        else
                                        {
                                            echo'<td colspan="8"><div class="alert alert-warning alert-rounded"> <i class="ti-info-alt"></i>No subjects allocated to this class</div></td>';
                                        }
                        
                                        $sqltogetstudentscore = mysqli_query($link,"SELECT SUM(CA1+CA2+CA3+CA4+CA5+CA6+CA7+CA8+CA9+CA10+Exam) AS OverallTotal, AVG(CA1+CA2+CA3+CA4+CA5+CA6+CA7+CA8+CA9+CA10+Exam) AS OverallAvg
                                        FROM `score` WHERE `StudentID`='$studentid' AND 
                                        `CampusID`='$abba_campus_id' AND ClassOrDepartmentID='$abba_display_result_class' AND `Session`='$abba_display_session'");
                                        $rowtogetstudentscore = mysqli_fetch_array($sqltogetstudentscore);

                                        if($rowtogetstudentscore['OverallTotal'] == '' || $rowtogetstudentscore['OverallTotal'] == 0)
                                        {

                                            $OverallTotal = round($rowtogetstudentscore['OverallTotal'],2);

                                            $OverallAvg = 0;
                                        }
                                        else{

                                            $OverallTotal = round($rowtogetstudentscore['OverallTotal'],2);

                                            $OverallAvg = $rowtogetstudentscore['OverallTotal']/$rowtocntstudoffersub;
                                        }
                                        
                                        $OverallAvgscr = round($OverallAvg);

                                        $sqlGetGradingSystem = "SELECT * FROM `gradingstructure` WHERE `GradingMethodID`='$getgrademethod' AND $OverallAvgscr >= RangeStart AND $OverallAvgscr <= RangeEnd";
                            
                                        $queryGetGradingSystem = mysqli_query($link, $sqlGetGradingSystem);
                                        $rowGetGradingSystem = mysqli_fetch_assoc($queryGetGradingSystem);
                                        $countGetGradingSystem = mysqli_num_rows($queryGetGradingSystem);

                                        if($countGetGradingSystem == 0){
                                            $grade =  'N/A';
                                            $remark = 'N/A';

                                        }
                                        else
                                        {
                                            $grade =  $rowGetGradingSystem['Grade'];
                                            $remark = $rowGetGradingSystem['Remark'];

                                        }
                            
                                        echo '<td>';
                                            if($OverallTotal > 0)
                                            {
                                                echo number_format($OverallTotal, 2); 
                                            }
                                            else
                                            {
                                                echo'N/A'; 
                                            }
                                        echo '</td>
                                        <td>';
                                            if($OverallAvg > 0)
                                            {
                                                echo number_format($OverallAvg, 2);
                                            }
                                            else
                                            {
                                                echo'N/A'; 
                                            }
                                            
                                        echo '</td>
                            
                                        <td>'. $grade.' </td>
                                        <td>'. $remark.' </td>
                            
                                    </tr>';
                                    
                                    $counter ++;

                                }while($row = mysqli_fetch_array($sql));
                            }
                            else{
                                echo'<td colspan="8"><div class="alert alert-warning alert-rounded"> <i class="ti-info-alt"></i>No student allocated to this class</div></td>';
                            }
                        echo '</tbody>
                    </table>
                </div>
            </div>
        </div>';
    }
    else
    {
        echo '<div class="row">
            <div class="col-12 float-end">
                <button type="button" class="btn btn-sm bg-light text-primary rounded-3 btn-outline-primary float-end" onclick="tableToExcel(\'testTable\', \'W3C Example Table\')" style="width:30px%;border-top:none;border-left:none;border-right:none;"><i class="fas fa-download"> Download</i></button>
            </div>
            <div class="col-12">
                <div class="table-responsive text-nowrape mt-2">
                    <table class="table table-bordered table-striped rotate-table-grid" id="testTable" summary="Code page support in different versions of MS Windows." rules="groups" frame="hsides" border="2">
                        <thead>';

                            $sqltogetsubjectsheader = mysqli_query($link,"SELECT * FROM `courseorsubjectallocation` 
                            WHERE `ClassOrDepartmentID`='$abba_display_result_class' AND `CampusID` ='$abba_campus_id'");
                            $rowgetsubjectsheader = mysqli_fetch_array($sqltogetsubjectsheader);
                            $countsubjectsheader = mysqli_num_rows($sqltogetsubjectsheader);

                            $newtotalcol = $countsubjectsheader + 6;

                            echo '<tr>
                                <th colspan="'.$newtotalcol.'">
                                    <div class="row">
                                        <div class="col-sm-2 col-md-2 col-xs-2 col-lg-2">
                                            <div align="center">
                                                <img src="'.$InstitutionLogo.'" class="img-fluid" alt="..." width="100" height="auto">
                                            </div>
                                        </div>
                                        <div class="col-sm-10 col-md-10 col-xs-10 col-lg-10">
                                            <p style="color: #000000;font-size:40px;">'.$abba_campus_name.'</p>
                                            <p style="color: #000000;font-size:18px;font-weight:450;">BROADSHEET REPORT FOR '.$abba_display_session.' SESSION | CLASS: '.$abba_display_result_class_name.' | TERM: '.$abba_result_display_term_name.'</p>
                                        </div>
                                    </div>
                                </th>
                            </tr>

                            <tr>
                                <th colspan="2" style="width: 100px;">    
                                    
                                </th>';
                                
                                $sqltogetsubjects = mysqli_query($link,"SELECT * FROM `courseorsubjectallocation` 
                                WHERE `ClassOrDepartmentID`='$abba_display_result_class' AND `CampusID` ='$abba_campus_id'");
                                $rowgetsubjects = mysqli_fetch_array($sqltogetsubjects);
                            
                                $countsubjects = mysqli_num_rows($sqltogetsubjects);
                                if($countsubjects > 0)
                                {
                                    do{
                                        $subjectid = $rowgetsubjects['SubjectOrCourseID'];
                                        $sqltogetsubjectname = mysqli_query($link,"SELECT * FROM `subjectorcourse` WHERE `SubjectOrCourseID`='$subjectid'");
                                        $rowtogetsubjectname = mysqli_fetch_array($sqltogetsubjectname);

                                        $sqltogetcolspace = mysqli_query($link,"SELECT DISTINCT(TermOrSemester) FROM `score` WHERE `CampusID`='$abba_campus_id' AND ClassOrDepartmentID='$abba_display_result_class' AND `Session`='$abba_display_session' AND `TermOrSemester`='$abba_result_display_term' AND `CourseOrSubjectID`='$subjectid'");
                                        $rowtogetcolspace  = mysqli_fetch_array($sqltogetcolspace);
                                        $rowtocntcolspace  = mysqli_num_rows($sqltogetcolspace);
                                
                                        echo '<th colspan="'.$rowtocntcolspace.'">'.$rowtogetsubjectname['SubjectOrCourseTitle'].'</th>';
                                    }while($rowgetsubjects = mysqli_fetch_array($sqltogetsubjects));
                                }

                                echo '<th>TOTAL SCORE</th>
                                <th>AVERAGE SCORE</th>
                                
                                <th>OVERALL GRADE</th>
                                <th>REMARK</th>
                            
                            </tr>
                        </thead>
                        <tbody style="font-size:12px;">
                            <tr>
                                <th style="width: 20px;">S/N</th>
                                <th style="width: 100px;">NAMES OF STUDENTS</th>';
                                
                                $sqltogetsubjects = mysqli_query($link,"SELECT * FROM `courseorsubjectallocation` 
                                WHERE `ClassOrDepartmentID`='$abba_display_result_class' AND `CampusID` ='$abba_campus_id'");
                                $rowgetsubjects = mysqli_fetch_array($sqltogetsubjects);

                                do{
                            
                                    echo '<td> </td>';

                                }while($rowgetsubjects = mysqli_fetch_array($sqltogetsubjects));
                            
                                echo '<td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                
                                
                            </tr>';

                            $sql = mysqli_query($link,"SELECT * FROM `classordepartmentstudentallocation`
                            WHERE `CampusID`='$abba_campus_id' AND `ClassOrDepartmentID`='$abba_display_result_class'AND `Session` ='$abba_display_session'");
                            $row = mysqli_fetch_array($sql);
                            $count = mysqli_num_rows($sql);
                    
                            if($count > 0)
                            {
                                $counter = 1;
                                
                                do {
                                    $studentid = $row['StudentID'];
                                    $sqltogetstudentname = mysqli_query($link,"SELECT * FROM `student` WHERE `StudentID`='$studentid'");
                                    $rowtogetstudentname = mysqli_fetch_array($sqltogetstudentname);   

                                    $sqltogetstudentregnumber = mysqli_query($link,"SELECT * FROM `userlogin` 
                                    WHERE `UserID` ='$studentid' AND `InstitutionIDOrCampusID`='$abba_campus_id' AND `UserType`='student'");
                                    $rowtogetstudentregnumber  = mysqli_fetch_array($sqltogetstudentregnumber);
                                    $studentregnumber = $rowtogetstudentregnumber['UserRegNumberOrUsername'];

                                    $sqltogetstudoffersub = mysqli_query($link,"SELECT * FROM `score` WHERE `StudentID`='$studentid' AND `CampusID`='$abba_campus_id' AND ClassOrDepartmentID='$abba_display_result_class' AND `Session`='$abba_display_session' AND (`Exam` !='0' OR `CA1` !='0' OR `CA2` !='0' OR `CA3` !='0' OR `CA4` !='0' OR `CA5` !='0' OR `CA6` !='0' OR `CA7` !='0' OR `CA8` !='0' OR `CA9` !='0' OR `CA10` !='0')");
                                    $rowtogetstudoffersub  = mysqli_fetch_array($sqltogetstudoffersub);
                                    $rowtocntstudoffersub  = mysqli_num_rows($sqltogetstudoffersub);
                            
                                    echo '<tr>
                                        <th>'.$counter.'</th>
                                        <td>'.$rowtogetstudentname['StudentFirstName'].' '.$rowtogetstudentname['StudentLastName'].'</td>';

                                        $sqltogetsubjects = mysqli_query($link,"SELECT * FROM `courseorsubjectallocation` 
                                        WHERE `ClassOrDepartmentID`='$abba_display_result_class' AND `CampusID` ='$abba_campus_id'");
                                        $rowgetsubjects = mysqli_fetch_array($sqltogetsubjects);
                            
                                        $countsubjects = mysqli_num_rows($sqltogetsubjects);
                                        if($countsubjects > 0)
                                        {
                                            do{
                                                $subID = $rowgetsubjects['SubjectOrCourseID'];

                                                $sqltogetstudentscore = mysqli_query($link,"SELECT * , CA1+CA2+CA3+CA4+CA5+CA6+CA7+CA8+CA9+CA10+Exam AS Total 
                                                FROM `score` WHERE `StudentID`='$studentid' AND `CampusID`='$abba_campus_id' AND CourseOrSubjectID='$subID' AND ClassOrDepartmentID='$abba_display_result_class' AND `Session`='$abba_display_session' AND `TermOrSemester`='$abba_result_display_term'");
                                                $rowtogetstudentscore = mysqli_fetch_array($sqltogetstudentscore);

                                    
                                                if($rowtogetstudentscore < 1)
                                                {

                                                    $total = '0';
                                                }
                                                else{
                                                    $total = $rowtogetstudentscore['Total'];
                                                }

                                                echo '<td>'.number_format($total, 2).' </td>';

                                            }while($rowgetsubjects = mysqli_fetch_array($sqltogetsubjects));
                                        }
                                        else
                                        {
                                            echo'<td colspan="8"><div class="alert alert-warning alert-rounded"> <i class="ti-info-alt"></i>No subjects allocated to this class</div></td>';
                                        }
                        
                                        $sqltogetstudentscore = mysqli_query($link,"SELECT SUM(CA1+CA2+CA3+CA4+CA5+CA6+CA7+CA8+CA9+CA10+Exam) AS OverallTotal, AVG(CA1+CA2+CA3+CA4+CA5+CA6+CA7+CA8+CA9+CA10+Exam) AS OverallAvg
                                        FROM `score` WHERE `StudentID`='$studentid' AND 
                                        `CampusID`='$abba_campus_id' AND ClassOrDepartmentID='$abba_display_result_class' AND `Session`='$abba_display_session' AND `TermOrSemester`='$abba_result_display_term'");
                                        $rowtogetstudentscore = mysqli_fetch_array($sqltogetstudentscore);

                                        $OverallTotal = round($rowtogetstudentscore['OverallTotal'],2);

                                        if($rowtogetstudentscore['OverallTotal'] == '' || $rowtogetstudentscore['OverallTotal'] == 0)
                                        {

                                            $OverallAvg = 0;
                                        }
                                        else{

                                            $OverallAvg = $rowtogetstudentscore['OverallTotal']/$rowtocntstudoffersub;
                                        }
                                        
                                        $OverallAvgscr = round($OverallAvg);

                                        $sqlGetGradingSystem = "SELECT * FROM `gradingstructure` WHERE `GradingMethodID`='$getgrademethod' AND $OverallAvgscr >= RangeStart AND $OverallAvgscr <= RangeEnd";
                            
                                        $queryGetGradingSystem = mysqli_query($link, $sqlGetGradingSystem);
                                        $rowGetGradingSystem = mysqli_fetch_assoc($queryGetGradingSystem);
                                        $countGetGradingSystem = mysqli_num_rows($queryGetGradingSystem);

                                        if($countGetGradingSystem == 0){
                                            $grade =  'N/A';
                                            $remark = 'N/A';

                                        }
                                        else
                                        {
                                            $grade =  $rowGetGradingSystem['Grade'];
                                            $remark = $rowGetGradingSystem['Remark'];

                                        }
                            
                                        echo '<td>';
                                            if($OverallTotal > 0)
                                            {
                                                echo number_format($OverallTotal, 2); 
                                            }
                                            else
                                            {
                                                echo'N/A'; 
                                            }
                                        echo '</td>
                                        <td>';
                                            if($OverallAvg > 0)
                                            {
                                                echo number_format($OverallAvg, 2);
                                            }
                                            else
                                            {
                                                echo'N/A'; 
                                            }
                                            
                                        echo '</td>
                            
                                        <td>'. $grade.' </td>
                                        <td>'. $remark.' </td>
                            
                                    </tr>';
                                    
                                    $counter ++;

                                }while($row = mysqli_fetch_array($sql));
                            }
                            else{
                                echo'<td colspan="8"><div class="alert alert-warning alert-rounded"> <i class="ti-info-alt"></i>No student allocated to this class</div></td>';
                            }
                        echo '</tbody>
                    </table>
                </div>
            </div>
        </div>';
    }
	
?>