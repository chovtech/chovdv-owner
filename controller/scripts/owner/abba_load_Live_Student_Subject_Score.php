<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include ('../../config/config.php');

    $abba_campus_id = $_POST['abba_campus_id'];

    $abba_get_instituion_id = $_POST['abba_get_instituion_id'];

    $abba_display_result_class = $_POST['abba_display_result_class'];
    $abba_display_session = $_POST['abba_display_session'];
    $abba_result_display_term = $_POST['abba_result_display_term'];
    $abba_display_result_subject = $_POST['abba_display_result_subject'];

    $sqlGetScoreSheet = "SELECT * FROM `score` 
    INNER JOIN `userlogin` ON score.StudentID=userlogin.UserID AND UserType = 'student'
    INNER JOIN student ON student.StudentID=userlogin.UserID
    WHERE score.CampusID = '$abba_campus_id' AND score.ClassOrDepartmentID='$abba_display_result_class' AND score.CourseOrSubjectID='$abba_display_result_subject' AND score.Session='$abba_display_session' AND score.TermOrSemester='$abba_result_display_term' AND student.CampusID = '$abba_campus_id' AND userlogin.InstitutionIDOrCampusID = '$abba_campus_id' ORDER BY StudentLastName ASC";
    $queryGetScoreSheet = mysqli_query($link, $sqlGetScoreSheet);
    $rowGetScoreSheet = mysqli_fetch_assoc($queryGetScoreSheet);
    $countGetScoreSheet = mysqli_num_rows($queryGetScoreSheet);

    $sqlGetSchool = "SELECT * FROM `classordepartment` WHERE CampusID = '$abba_campus_id' AND ClassOrDepartmentID='$abba_display_result_class'";
    $queryGetSchool = mysqli_query($link, $sqlGetSchool);
    $rowGetSchool = mysqli_fetch_assoc($queryGetSchool);
    $countGetSchool = mysqli_num_rows($queryGetSchool);

    $SectionID = $rowGetSchool['SectionID'];
    $GradingMethodID = $rowGetSchool['GradingMethodID'];
    
    $sqlGetcasettings = "SELECT * FROM `resultsetting` WHERE CampusID='$abba_campus_id' AND SectionID='$SectionID'";
    $queryGetcasettings = mysqli_query($link, $sqlGetcasettings);
    $rowGetcasettings = mysqli_fetch_assoc($queryGetcasettings);
    $countGetcasettings = mysqli_num_rows($queryGetcasettings);

    if($countGetcasettings > 0)
    {
        $totalnumbofca = $rowGetcasettings['NumberOfCA'];

        if($countGetScoreSheet > 0)
        {
                    
            $totalnumbofca = $rowGetcasettings['NumberOfCA'];

            if($rowGetcasettings['NumberOfCA'] =='1')
            {
                $ca1test = '<th>'.$rowGetcasettings['CA1Title'].'</th>';
            }
            elseif($rowGetcasettings['NumberOfCA'] =='2')
            {
                $ca1test = '<th>'.$rowGetcasettings['CA1Title'].'</th> <th>'.$rowGetcasettings['CA2Title'].'</th>';
            }
            elseif($rowGetcasettings['NumberOfCA'] =='3')
            {
                $ca1test = '<th>'.$rowGetcasettings['CA1Title'].'</th> <th>'.$rowGetcasettings['CA2Title'].'</th> <th>'.$rowGetcasettings['CA3Title'].'</th>';
            }
            elseif($rowGetcasettings['NumberOfCA'] =='4')
            {
                $ca1test = '<th>'.$rowGetcasettings['CA1Title'].'</th> <th>'.$rowGetcasettings['CA2Title'].'</th> <th>'.$rowGetcasettings['CA3Title'].'</th> <th>'.$rowGetcasettings['CA4Title'].'</th>';
            }
            elseif($rowGetcasettings['NumberOfCA'] =='5')
            {
                $ca1test = '<th>'.$rowGetcasettings['CA1Title'].'</th> <th>'.$rowGetcasettings['CA2Title'].'</th> <th>'.$rowGetcasettings['CA3Title'].'</th> <th>'.$rowGetcasettings['CA4Title'].'</th> <th>'.$rowGetcasettings['CA5Title'].'</th>';
            }
            elseif($rowGetcasettings['NumberOfCA'] =='6')
            {
                $ca1test = '<th>'.$rowGetcasettings['CA1Title'].'</th> <th>'.$rowGetcasettings['CA2Title'].'</th> <th>'.$rowGetcasettings['CA3Title'].'</th> <th>'.$rowGetcasettings['CA4Title'].'</th> <th>'.$rowGetcasettings['CA5Title'].'</th> <th>'.$rowGetcasettings['CA6Title'].'</th>';
            }
            elseif($rowGetcasettings['NumberOfCA'] =='7')
            {
                $ca1test = '<th>'.$rowGetcasettings['CA1Title'].'</th> <th>'.$rowGetcasettings['CA2Title'].'</th> <th>'.$rowGetcasettings['CA3Title'].'</th> <th>'.$rowGetcasettings['CA4Title'].'</th> <th>'.$rowGetcasettings['CA5Title'].'</th> <th>'.$rowGetcasettings['CA6Title'].'</th> <th>'.$rowGetcasettings['CA7Title'].'</th>';
            }
            elseif($rowGetcasettings['NumberOfCA'] =='8')
            {
                $ca1test = '<th>'.$rowGetcasettings['CA1Title'].'</th> <th>'.$rowGetcasettings['CA2Title'].'</th> <th>'.$rowGetcasettings['CA3Title'].'</th> <th>'.$rowGetcasettings['CA4Title'].'</th> <th>'.$rowGetcasettings['CA5Title'].'</th> <th>'.$rowGetcasettings['CA6Title'].'</th> <th>'.$rowGetcasettings['CA7Title'].'</th> <th>'.$rowGetcasettings['CA8Title'].'</th>';
            }
            elseif($rowGetcasettings['NumberOfCA'] =='9')
            {
                $ca1test = '<th>'.$rowGetcasettings['CA1Title'].'</th> <th>'.$rowGetcasettings['CA2Title'].'</th> <th>'.$rowGetcasettings['CA3Title'].'</th> <th>'.$rowGetcasettings['CA4Title'].'</th> <th>'.$rowGetcasettings['CA5Title'].'</th> <th>'.$rowGetcasettings['CA6Title'].'</th> <th>'.$rowGetcasettings['CA7Title'].'</th> <th>'.$rowGetcasettings['CA8Title'].'</th> <th>'.$rowGetcasettings['CA9Title'].'</th>';
            }
            elseif($rowGetcasettings['NumberOfCA'] =='10')
            {
                $ca1test = '<th>'.$rowGetcasettings['CA1Title'].'</th> <th>'.$rowGetcasettings['CA2Title'].'</th> <th>'.$rowGetcasettings['CA3Title'].'</th> <th>'.$rowGetcasettings['CA4Title'].'</th> <th>'.$rowGetcasettings['CA5Title'].'</th> <th>'.$rowGetcasettings['CA6Title'].'</th> <th>'.$rowGetcasettings['CA7Title'].'</th> <th>'.$rowGetcasettings['CA8Title'].'</th> <th>'.$rowGetcasettings['CA9Title'].'</th> <th>'.$rowGetcasettings['CA10Title'].'</th>';
            }
            else
            {
                $ca1test = '';
            }
            
            echo'<div class="row mb-3">
                <div class="col-lg-12">
                    <button type="button" class="btn btn-sm bg-light text-primary mt-2 rounded-3 btn-outline-primary float-end" data-bs-toggle="modal" data-bs-target="#abba_show_result_bulk_upload_modal"><i class="fas fa-cloud-upload-alt text-primary" style="font-size:12px;"> Bulk Upload</i></button>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <span class="d-flex" id="displaysmgsunny" style="font-size:12px;">
                        <div>
                            <i class="fa fa-info-circle text-primary fs-6" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"></i>
                        </div>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body alert alert-primary" role="alert">
                                To input scores kindly click on the CA or Exam that you would like to input the score and input the score.
                            </div>
                        </div>
                    </span>
                </div>
                <div class="col-lg-5 col-md-12 float-end" align="right">
                    <span class="clearScoreSheetModal" type="button" data-bs-toggle="modal" data-bs-target="#clearScoreSheetModalOpen" data-id="1" style="font-size: 12px; color: red; text-decoration: underline;"><i class="fa fa-trash"></i> Remove student from sheet
                    </span>   |  

                    <span id="addToSheetModal" type="button" class="addToSheetModal" data-bs-toggle="modal" data-bs-target="#addToSheetModalOpen" data-id="1" style="font-size: 12px; color: green; text-decoration: underline;"><i class="fa fa-plus"></i> Add student to sheet
                    </span>
                </div>
            </div>
            <div class="table-responsive text-nowrape mt-2">
                <table class="table table-bordered table-striped" id="editable-datatable">
                    <thead>
                        <tr style="font-size:12px;">
                            <th>S/N</th>
                            <th>Full Name</th>
                            '.$ca1test.'
                            <th>Exam</th>
                            <th>Total</th>
                            <th>Grade</th>
                            <th>Remark</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody style="font-size:12px;">';
                    
                        $cnt=1;

                        do{
                            $UserRegNumberOrUsername = $rowGetScoreSheet['UserRegNumberOrUsername'];
                        
                            $studentName = $rowGetScoreSheet['StudentLastName'].' '.$rowGetScoreSheet['StudentFirstName'];


                            if($rowGetcasettings['NumberOfCA'] =='1')
                            {
                                $ca1 = $rowGetScoreSheet['CA1'];
                            }
                            elseif($rowGetcasettings['NumberOfCA'] =='2')
                            {
                                $ca1 = $rowGetScoreSheet['CA1'] + $rowGetScoreSheet['CA2'];
                            }
                            elseif($rowGetcasettings['NumberOfCA'] =='3')
                            {
                                $ca1 = $rowGetScoreSheet['CA1'] + $rowGetScoreSheet['CA2'] + $rowGetScoreSheet['CA3'];
                            }
                            elseif($rowGetcasettings['NumberOfCA'] =='4')
                            {
                                $ca1 = $rowGetScoreSheet['CA1'] + $rowGetScoreSheet['CA2'] + $rowGetScoreSheet['CA3'] + $rowGetScoreSheet['CA4'];
                            }
                            elseif($rowGetcasettings['NumberOfCA'] =='5')
                            {
                                $ca1 = $rowGetScoreSheet['CA1'] + $rowGetScoreSheet['CA2'] + $rowGetScoreSheet['CA3'] + $rowGetScoreSheet['CA4'] + $rowGetScoreSheet['CA5'];
                            }
                            elseif($rowGetcasettings['NumberOfCA'] =='6')
                            {
                                $ca1 = $rowGetScoreSheet['CA1'] + $rowGetScoreSheet['CA2'] + $rowGetScoreSheet['CA3'] + $rowGetScoreSheet['CA4'] + $rowGetScoreSheet['CA5'] + $rowGetScoreSheet['CA6'];
                            }
                            elseif($rowGetcasettings['NumberOfCA'] =='7')
                            {
                                $ca1 = $rowGetScoreSheet['CA1'] + $rowGetScoreSheet['CA2'] + $rowGetScoreSheet['CA3'] + $rowGetScoreSheet['CA4'] + $rowGetScoreSheet['CA5'] + $rowGetScoreSheet['CA6'] + $rowGetScoreSheet['CA7'];
                            }
                            elseif($rowGetcasettings['NumberOfCA'] =='8')
                            {
                                $ca1 = $rowGetScoreSheet['CA1'] + $rowGetScoreSheet['CA2'] + $rowGetScoreSheet['CA3'] + $rowGetScoreSheet['CA4'] + $rowGetScoreSheet['CA5'] + $rowGetScoreSheet['CA6'] + $rowGetScoreSheet['CA7'] + $rowGetScoreSheet['CA8'];
                            }
                            elseif($rowGetcasettings['NumberOfCA'] =='9')
                            {
                                $ca1 = $rowGetScoreSheet['CA1'] + $rowGetScoreSheet['CA2'] + $rowGetScoreSheet['CA3'] + $rowGetScoreSheet['CA4'] + $rowGetScoreSheet['CA5'] + $rowGetScoreSheet['CA6'] + $rowGetScoreSheet['CA7'] + $rowGetScoreSheet['CA8'] + $rowGetScoreSheet['CA9'];
                            }
                            elseif($rowGetcasettings['NumberOfCA'] =='10')
                            {
                                $ca1 = $rowGetScoreSheet['CA1'] + $rowGetScoreSheet['CA2'] + $rowGetScoreSheet['CA3'] + $rowGetScoreSheet['CA4'] + $rowGetScoreSheet['CA5'] + $rowGetScoreSheet['CA6'] + $rowGetScoreSheet['CA7'] + $rowGetScoreSheet['CA8'] + $rowGetScoreSheet['CA9'] + $rowGetScoreSheet['CA10'];
                            }
                            else{
                                $ca1 = 0;
                            }
                            
                        $exam = $rowGetScoreSheet['Exam'];
                        
                        //=============================================

                        $total = $ca1 + $exam; 

                        $sqlGetGradingSystemNew = "SELECT * FROM `gradingstructure` WHERE InstitutionID = '$abba_get_instituion_id' AND GradingMethodID = '$GradingMethodID' AND $total BETWEEN RangeStart AND RangeEnd";
                        $queryGetGradingSystemNew = mysqli_query($link, $sqlGetGradingSystemNew);
                        $rowGetGradingSystemNew = mysqli_fetch_assoc($queryGetGradingSystemNew);
                        $countGetGradingSystemNew = mysqli_num_rows($queryGetGradingSystemNew);
                        
                        if($countGetGradingSystemNew > 0)
                        {

                            $remark = $rowGetGradingSystemNew['Remark'];
                            $grade = $rowGetGradingSystemNew['Grade'];
                                
                        }
                        else{
                            $remark = '---';
                            $grade = '---';
                        }
                        
                            echo '<tr id="'.$rowGetScoreSheet["ScoreID"].'" class="edit_tr">
                    
                                <td>
                                    '.$cnt++.'
                                </td>
                                <td>
                                    '.$studentName.' ('.$UserRegNumberOrUsername.')
                                </td>';
                                
                                if($rowGetcasettings['NumberOfCA'] =='1')
                                {
                                    echo '<td class="edit_td">
                                            <span id="ca1_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA1"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA1"].'" min="1" max="'.$rowGetcasettings['CA1Score'].'" class="editbox" id="ca1_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca2_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA2"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA2"].'" class="editbox" id="ca2_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca3_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA3"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA3"].'" class="editbox" id="ca3_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca4_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA4"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA4"].'" class="editbox" id="ca4_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca5_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA5"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA5"].'" class="editbox" id="ca5_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca6_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA6"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA6"].'" class="editbox" id="ca6_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca7_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA7"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA7"].'" class="editbox" id="ca7_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca8_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA8"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA8"].'" class="editbox" id="ca8_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca9_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA9"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA9"].'" class="editbox" id="ca9_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca10_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA10"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA10"].'" class="editbox" id="ca10_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>';
                                }
                                elseif($rowGetcasettings['NumberOfCA'] =='2')
                                {
                                    echo '<td class="edit_td">
                                            <span id="ca1_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA1"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA1"].'" min="1" max="'.$rowGetcasettings['CA1Score'].'" class="editbox" id="ca1_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                            </td>
                                            <td>
                                            <span id="ca2_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA2"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA2"].'" min="1" max="'.$rowGetcasettings['CA2Score'].'" class="editbox" id="ca2_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                            </td>
                                            <td style="display:none;">
                                        <span id="ca3_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA3"].'</span>
                                        <input type="text" value="'.$rowGetScoreSheet["CA3"].'" class="editbox" id="ca3_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca4_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA4"].'</span>
                                        <input type="text" value="'.$rowGetScoreSheet["CA4"].'" class="editbox" id="ca4_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca5_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA5"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA5"].'" class="editbox" id="ca5_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca6_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA6"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA6"].'" class="editbox" id="ca6_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                            </td>
                                            <td style="display:none;">
                                            <span id="ca7_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA7"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA7"].'" class="editbox" id="ca7_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                            </td>
                                            <td style="display:none;">
                                        <span id="ca8_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA8"].'</span>
                                        <input type="text" value="'.$rowGetScoreSheet["CA8"].'" class="editbox" id="ca8_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca9_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA9"].'</span>
                                        <input type="text" value="'.$rowGetScoreSheet["CA9"].'" class="editbox" id="ca9_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca10_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA10"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA10"].'" class="editbox" id="ca10_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>';
                                }
                                elseif($rowGetcasettings['NumberOfCA'] =='3')
                                {
                                    echo '<td class="edit_td">
                                            <span id="ca1_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA1"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA1"].'" min="1" max="'.$rowGetcasettings['CA1Score'].'" class="editbox" id="ca1_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                            </td>
                                            <td>
                                            <span id="ca2_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA2"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA2"].'" min="1" max="'.$rowGetcasettings['CA2Score'].'" class="editbox" id="ca2_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                            </td>
                                            <td>
                                        <span id="ca3_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA3"].'</span>
                                        <input type="text" value="'.$rowGetScoreSheet["CA3"].'" min="1" max="'.$rowGetcasettings['CA3Score'].'" class="editbox" id="ca3_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca4_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA4"].'</span>
                                        <input type="text" value="'.$rowGetScoreSheet["CA4"].'" class="editbox" id="ca4_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca5_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA5"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA5"].'" class="editbox" id="ca5_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca6_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA6"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA6"].'" class="editbox" id="ca6_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                            </td>
                                            <td style="display:none;">
                                            <span id="ca7_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA7"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA7"].'" class="editbox" id="ca7_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                            </td>
                                            <td style="display:none;">
                                        <span id="ca8_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA8"].'</span>
                                        <input type="text" value="'.$rowGetScoreSheet["CA8"].'" class="editbox" id="ca8_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca9_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA9"].'</span>
                                        <input type="text" value="'.$rowGetScoreSheet["CA9"].'" class="editbox" id="ca9_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca10_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA10"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA10"].'" class="editbox" id="ca10_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>';
                                }        
                                elseif($rowGetcasettings['NumberOfCA'] =='4')
                                {
                                    echo '<td class="edit_td">
                                            <span id="ca1_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA1"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA1"].'" min="1" max="'.$rowGetcasettings['CA1Score'].'" class="editbox" id="ca1_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                            </td>
                                            <td>
                                            <span id="ca2_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA2"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA2"].'" min="1" max="'.$rowGetcasettings['CA2Score'].'" class="editbox" id="ca2_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                            </td>
                                            <td>
                                        <span id="ca3_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA3"].'</span>
                                        <input type="text" value="'.$rowGetScoreSheet["CA3"].'" min="1" max="'.$rowGetcasettings['CA3Score'].'" class="editbox" id="ca3_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td>
                                            <span id="ca4_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA4"].'</span>
                                        <input type="text" value="'.$rowGetScoreSheet["CA4"].'" min="1" max="'.$rowGetcasettings['CA4Score'].'" class="editbox" id="ca4_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca5_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA5"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA5"].'" class="editbox" id="ca5_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca6_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA6"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA6"].'" class="editbox" id="ca6_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                            </td>
                                            <td style="display:none;">
                                            <span id="ca7_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA7"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA7"].'" class="editbox" id="ca7_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                            </td>
                                            <td style="display:none;">
                                        <span id="ca8_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA8"].'</span>
                                        <input type="text" value="'.$rowGetScoreSheet["CA8"].'" class="editbox" id="ca8_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca9_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA9"].'</span>
                                        <input type="text" value="'.$rowGetScoreSheet["CA9"].'" class="editbox" id="ca9_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca10_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA10"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA10"].'" class="editbox" id="ca10_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>';
                                }
                                elseif($rowGetcasettings['NumberOfCA'] =='5')
                                {
                                    echo '<td class="edit_td">
                                            <span id="ca1_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA1"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA1"].'" min="1" max="'.$rowGetcasettings['CA1Score'].'" class="editbox" id="ca1_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                            </td>
                                            <td>
                                            <span id="ca2_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA2"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA2"].'" min="1" max="'.$rowGetcasettings['CA2Score'].'" class="editbox" id="ca2_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                            </td>
                                            <td>
                                        <span id="ca3_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA3"].'</span>
                                        <input type="text" value="'.$rowGetScoreSheet["CA3"].'" min="1" max="'.$rowGetcasettings['CA3Score'].'" class="editbox" id="ca3_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td>
                                            <span id="ca4_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA4"].'</span>
                                        <input type="text" value="'.$rowGetScoreSheet["CA4"].'" min="1" max="'.$rowGetcasettings['CA4Score'].'" class="editbox" id="ca4_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td>
                                            <span id="ca5_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA5"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA5"].'" min="1" max="'.$rowGetcasettings['CA5Score'].'" class="editbox" id="ca5_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca6_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA6"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA6"].'" class="editbox" id="ca6_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                            </td>
                                            <td style="display:none;">
                                            <span id="ca7_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA7"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA7"].'" class="editbox" id="ca7_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                            </td>
                                            <td style="display:none;">
                                        <span id="ca8_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA8"].'</span>
                                        <input type="text" value="'.$rowGetScoreSheet["CA8"].'" class="editbox" id="ca8_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca9_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA9"].'</span>
                                        <input type="text" value="'.$rowGetScoreSheet["CA9"].'" class="editbox" id="ca9_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca10_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA10"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA10"].'" class="editbox" id="ca10_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>';
                                }
                                elseif($rowGetcasettings['NumberOfCA'] =='6')
                                {
                                    echo '<td class="edit_td">
                                            <span id="ca1_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA1"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA1"].'" min="1" max="'.$rowGetcasettings['CA1Score'].'" class="editbox" id="ca1_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                            </td>
                                            <td>
                                            <span id="ca2_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA2"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA2"].'" min="1" max="'.$rowGetcasettings['CA2Score'].'" class="editbox" id="ca2_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                            </td>
                                            <td>
                                        <span id="ca3_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA3"].'</span>
                                        <input type="text" value="'.$rowGetScoreSheet["CA3"].'" min="1" max="'.$rowGetcasettings['CA3Score'].'" class="editbox" id="ca3_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td>
                                            <span id="ca4_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA4"].'</span>
                                        <input type="text" value="'.$rowGetScoreSheet["CA4"].'" min="1" max="'.$rowGetcasettings['CA4Score'].'" class="editbox" id="ca4_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td>
                                            <span id="ca5_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA5"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA5"].'" min="1" max="'.$rowGetcasettings['CA5Score'].'" class="editbox" id="ca5_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td>
                                            <span id="ca6_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA6"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA6"].'" min="1" max="'.$rowGetcasettings['CA6Score'].'" class="editbox" id="ca6_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                            <td style="display:none;">
                                            <span id="ca7_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA7"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA7"].'" class="editbox" id="ca7_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                            </td>
                                            <td style="display:none;">
                                        <span id="ca8_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA8"].'</span>
                                        <input type="text" value="'.$rowGetScoreSheet["CA8"].'" class="editbox" id="ca8_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca9_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA9"].'</span>
                                        <input type="text" value="'.$rowGetScoreSheet["CA9"].'" class="editbox" id="ca9_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca10_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA10"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA10"].'" class="editbox" id="ca10_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>';
                                }
                                elseif($rowGetcasettings['NumberOfCA'] =='7')
                                {
                                    echo '<td class="edit_td">
                                            <span id="ca1_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA1"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA1"].'" min="1" max="'.$rowGetcasettings['CA1Score'].'" class="editbox" id="ca1_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                            </td>
                                            <td>
                                            <span id="ca2_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA2"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA2"].'" min="1" max="'.$rowGetcasettings['CA2Score'].'" class="editbox" id="ca2_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                            </td>
                                            <td>
                                        <span id="ca3_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA3"].'</span>
                                        <input type="text" value="'.$rowGetScoreSheet["CA3"].'" min="1" max="'.$rowGetcasettings['CA3Score'].'" class="editbox" id="ca3_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td>
                                            <span id="ca4_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA4"].'</span>
                                        <input type="text" value="'.$rowGetScoreSheet["CA4"].'" min="1" max="'.$rowGetcasettings['CA4Score'].'" class="editbox" id="ca4_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td>
                                            <span id="ca5_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA5"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA5"].'" min="1" max="'.$rowGetcasettings['CA5Score'].'" class="editbox" id="ca5_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td>
                                            <span id="ca6_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA6"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA6"].'" min="1" max="'.$rowGetcasettings['CA6Score'].'" class="editbox" id="ca6_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td>
                                            <span id="ca7_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA7"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA7"].'" min="1" max="'.$rowGetcasettings['CA7Score'].'" class="editbox" id="ca7_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                        <span id="ca8_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA8"].'</span>
                                        <input type="text" value="'.$rowGetScoreSheet["CA8"].'" class="editbox" id="ca8_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca9_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA9"].'</span>
                                        <input type="text" value="'.$rowGetScoreSheet["CA9"].'" class="editbox" id="ca9_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca10_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA10"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA10"].'" class="editbox" id="ca10_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>';
                                }
                                elseif($rowGetcasettings['NumberOfCA'] =='8')
                                {
                                    echo '<td class="edit_td">
                                            <span id="ca1_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA1"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA1"].'" min="1" max="'.$rowGetcasettings['CA1Score'].'" class="editbox" id="ca1_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                            </td>
                                            <td>
                                            <span id="ca2_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA2"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA2"].'" min="1" max="'.$rowGetcasettings['CA2Score'].'" class="editbox" id="ca2_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                            </td>
                                            <td>
                                        <span id="ca3_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA3"].'</span>
                                        <input type="text" value="'.$rowGetScoreSheet["CA3"].'" min="1" max="'.$rowGetcasettings['CA3Score'].'" class="editbox" id="ca3_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td>
                                            <span id="ca4_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA4"].'</span>
                                        <input type="text" value="'.$rowGetScoreSheet["CA4"].'" min="1" max="'.$rowGetcasettings['CA4Score'].'" class="editbox" id="ca4_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td>
                                            <span id="ca5_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA5"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA5"].'" min="1" max="'.$rowGetcasettings['CA5Score'].'" class="editbox" id="ca5_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td>
                                            <span id="ca6_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA6"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA6"].'" min="1" max="'.$rowGetcasettings['CA6Score'].'" class="editbox" id="ca6_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td>
                                            <span id="ca7_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA7"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA7"].'" min="1" max="'.$rowGetcasettings['CA7Score'].'" class="editbox" id="ca7_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td>
                                            <span id="ca8_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA8"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA8"].'" min="1" max="'.$rowGetcasettings['CA8Score'].'" class="editbox" id="ca8_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca9_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA9"].'</span>
                                        <input type="text" value="'.$rowGetScoreSheet["CA9"].'" class="editbox" id="ca9_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca10_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA10"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA10"].'" class="editbox" id="ca10_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>';
                                }
                                elseif($rowGetcasettings['NumberOfCA'] =='9')
                                {
                                    echo '<td class="edit_td">
                                            <span id="ca1_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA1"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA1"].'" min="1" max="'.$rowGetcasettings['CA1Score'].'" class="editbox" id="ca1_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                            </td>
                                            <td>
                                            <span id="ca2_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA2"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA2"].'" min="1" max="'.$rowGetcasettings['CA2Score'].'" class="editbox" id="ca2_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                            </td>
                                            <td>
                                        <span id="ca3_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA3"].'</span>
                                        <input type="text" value="'.$rowGetScoreSheet["CA3"].'" min="1" max="'.$rowGetcasettings['CA3Score'].'" class="editbox" id="ca3_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td>
                                            <span id="ca4_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA4"].'</span>
                                        <input type="text" value="'.$rowGetScoreSheet["CA4"].'" min="1" max="'.$rowGetcasettings['CA4Score'].'" class="editbox" id="ca4_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td>
                                            <span id="ca5_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA5"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA5"].'" min="1" max="'.$rowGetcasettings['CA5Score'].'" class="editbox" id="ca5_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td>
                                            <span id="ca6_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA6"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA6"].'" min="1" max="'.$rowGetcasettings['CA6Score'].'" class="editbox" id="ca6_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td>
                                            <span id="ca7_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA7"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA7"].'" min="1" max="'.$rowGetcasettings['CA7Score'].'" class="editbox" id="ca7_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td>
                                            <span id="ca8_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA8"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA8"].'" min="1" max="'.$rowGetcasettings['CA8Score'].'" class="editbox" id="ca8_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td>
                                            <span id="ca9_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA9"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA9"].'" min="1" max="'.$rowGetcasettings['CA9Score'].'" class="editbox" id="ca9_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td style="display:none;">
                                            <span id="ca10_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA10"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA10"].'" class="editbox" id="ca10_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>';
                                }
                                elseif($rowGetcasettings['NumberOfCA'] =='10')
                                {
                                    echo '<td class="edit_td">
                                            <span id="ca1_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA1"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA1"].'" min="1" max="'.$rowGetcasettings['CA1Score'].'" class="editbox" id="ca1_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                            </td>
                                            <td>
                                            <span id="ca2_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA2"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA2"].'" min="1" max="'.$rowGetcasettings['CA2Score'].'" class="editbox" id="ca2_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                            </td>
                                            <td>
                                        <span id="ca3_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA3"].'</span>
                                        <input type="text" value="'.$rowGetScoreSheet["CA3"].'" min="1" max="'.$rowGetcasettings['CA3Score'].'" class="editbox" id="ca3_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td>
                                            <span id="ca4_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA4"].'</span>
                                        <input type="text" value="'.$rowGetScoreSheet["CA4"].'" min="1" max="'.$rowGetcasettings['CA4Score'].'" class="editbox" id="ca4_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td>
                                            <span id="ca5_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA5"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA5"].'" min="1" max="'.$rowGetcasettings['CA5Score'].'" class="editbox" id="ca5_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td>
                                            <span id="ca6_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA6"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA6"].'" min="1" max="'.$rowGetcasettings['CA6Score'].'" class="editbox" id="ca6_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td>
                                            <span id="ca7_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA7"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA7"].'" min="1" max="'.$rowGetcasettings['CA7Score'].'" class="editbox" id="ca7_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td>
                                            <span id="ca8_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA8"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA8"].'" min="1" max="'.$rowGetcasettings['CA8Score'].'" class="editbox" id="ca8_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td>
                                            <span id="ca9_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA9"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA9"].'" min="1" max="'.$rowGetcasettings['CA9Score'].'" class="editbox" id="ca9_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>
                                        <td>
                                            <span id="ca10_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["CA10"].'</span>
                                            <input type="text" value="'.$rowGetScoreSheet["CA10"].'" min="1" max="'.$rowGetcasettings['CA10Score'].'" class="editbox" id="ca10_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                        </td>';
                                }
                                else{
                                    echo '';
                                }
                                
                                echo '<td>
                                    <span id="exam_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$rowGetScoreSheet["Exam"].'</span>
                                    <input type="text" value="'.$rowGetScoreSheet["Exam"].'" class="editbox" id="exam_input_'.$rowGetScoreSheet["ScoreID"].'"/>
                                </td>
                                <td>
                                    <span id="total_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$total.'</span>
                                    
                                </td>
                                
                                <td>
                                    <span id="grade_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$grade.'</span>
                                </td>
                                <td class="center">
                                    <span id="remark_'.$rowGetScoreSheet["ScoreID"].'" class="text">'.$remark.'</span>
                                </td>
                                <td>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#delScoreModal" data-id="'.$rowGetScoreSheet["ScoreID"].'" data-tab="1"><i class="fa fa-times text-danger"></i></a>

                                    <span style="display:none;"><input type="text" value="'.$studentName.'" class="editbox abba_name_'.$rowGetScoreSheet["ScoreID"].'_1" id="studname_'.$rowGetScoreSheet["ScoreID"].'_1"/></span>
                                </td>
                            </tr>';
                        }while($rowGetScoreSheet = mysqli_fetch_assoc($queryGetScoreSheet));
                        
                        echo'
                    </tbody> 
                </table>
            </div>';
                
        }
        else
        {
            echo '<div class="row mb-3">
                <div class="col-lg-12">
                    <button type="button" class="btn btn-sm bg-light text-primary mt-2 rounded-3 btn-outline-primary float-end" data-bs-toggle="modal" data-bs-target="#abba_show_result_bulk_upload_modal"><i class="fas fa-cloud-upload-alt text-primary" style="font-size:12px;"> Bulk Upload</i></button>
                </div>
            </div>
            <div align="center">
                <img src="../../assets/images/adminImg/5568706.png" style="width:20%;"/><br>
                <span class="fs-sm text-secondary">No student has been added to the score sheet.<br>Click on "Add Student" to add a student to the score sheet</span><br>
                <button type="button" class="btn btn-primary addToSheetModal" data-bs-toggle="modal" data-bs-target="#addToSheetModalOpen" data-id="1"><i class="fa fa-plus"> Add student(s) to sheet</i></button>
            </div>';
        }
            
        
    }
    else
    {
        echo '<div class="row mb-3">
            <div class="col-lg-12">
                <button type="button" class="btn btn-sm bg-light text-primary mt-2 rounded-3 btn-outline-primary float-end" data-bs-toggle="modal" data-bs-target="#abba_show_result_bulk_upload_modal"><i class="fas fa-cloud-upload-alt text-primary" style="font-size:12px;"> Bulk Upload</i></button>
            </div>
        </div>
        <div align="center">
            <img src="../../assets/images/adminImg/5568706.png" style="width:20%;"/><br>
            <span class="fs-sm text-secondary">Oops, It seems you have not set the number of C.As that this class is supposed to be doing.<br>Click on "Set C.A" to Set the C.As for this class</span><br>
            <a href="'.$defaultUrl.'app/settings/?tab=config-tab-1" type="button" class="btn btn-primary"><i class="fa fa-plus"> Set C.As</i></button>
        </div>';
    }

?>