<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../../config/config.php');

    $stud = $_POST['stud'];
    $camp = $_POST['camp'];
    $session = $_POST['session'];
    $term = $_POST['term'];
    $resulttype = $_POST['resulttype'];
    $class_id = $_POST['class_id'];
    $inst = $_POST['inst'];
    
    echo '<input type="hidden" value="'.$camp.'" name="'.$camp.'" class="InstitutionID">';
    echo '<input type="hidden" value="'.$session.'" name="'.$session.'" class="sessionName">';
    echo '<input type="hidden" value="'.$term.'" name="'.$term.'" class="TermOrSemesterID">';
    echo '<input type="hidden" value="'.$class_id.'" name="'.$class_id.'" class="ClassOrDepartmentID">';

    // Show fields with the inputted data
    $termorsemestersql = mysqli_query($link, "SELECT * FROM `termorsemester` WHERE TermOrSemesterID='$term'");  
    $termorsemesterrow = mysqli_fetch_array($termorsemestersql);
    $termorsemestercount = mysqli_num_rows($termorsemestersql);

    $termorsemname = $termorsemesterrow['TermOrSemesterName'];

    $sqlgetstudentsinclass= mysqli_query($link,"SELECT * FROM `classordepartmentstudentallocation` WHERE `CampusID`='$camp' AND
    `ClassOrDepartmentID`='$class_id' AND `Session`='$session' AND StudentID = '$stud'");
    $fetchstud = mysqli_fetch_assoc($sqlgetstudentsinclass);
    $countstudinclass = mysqli_num_rows($sqlgetstudentsinclass);
    
    if($countstudinclass > 0)
    {
        
            $studid= $fetchstud['StudentID'];
            echo '<input type="hidden" value="'.$studid.'" class="studentid">';
            
            $sqltofetchname = mysqli_query($link,"SELECT * FROM `student` WHERE `StudentID`='$studid' AND `CampusID`='$camp'");
            
            $countstuddetails = mysqli_num_rows($sqltofetchname);
            $fetchstuddetails = mysqli_fetch_assoc($sqltofetchname);
            
            if($countstuddetails > 0)
            {
                echo '<div id="accordion" style="display:block; margin: 25px 0;">
                    <div class="card">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapse">
                            <div class="card-header" id="heading">
                                <h4 class="mb-0">
                                    ' .$fetchstuddetails['StudentLastName'].' '. $fetchstuddetails['StudentFirstName'] . '
                                </h4>
                            </div>
                        </button>

                        <div id="collapse" class="collapse show" aria-labelledby="heading" data-parent="#accordion">
                            <div class="card-body">';
                                
                                // Extract all the core areas with this institution id for this student
                            $sql = mysqli_query($link,"SELECT * FROM `britishcoreareas` WHERE `InstitutionID`='$inst'");
                            $count = mysqli_num_rows($sql);
                        
                            if($count > 0)
                            {
                                    while($fetcharea = mysqli_fetch_assoc($sql)){
                                        echo "<hr>";
                                        echo '<h5>'.$fetcharea['CoreArea'].'</h5>';
                                            echo '<input type="hidden" value="'.$fetcharea['CoreArea'].'" class="coreareaid">';
                                        echo "<hr>";
                                        $coreareaid = $fetcharea['CoreAreaID'];
                                            echo '
                                            <div class="table-responsive">
                                                <table class="table table-responsive table-bordered">
                                                    <tr>
                                                        <th>Essential Aspects</th>
                                                        <th>Scores</th>
                                                        <th>Remarks</th>
                                                    </tr>';
                                                    
                                                    $sqlgeteesentialid = mysqli_query($link,"SELECT * FROM `britishessentialaspects` WHERE `InstitutionID`='$inst' AND `CoreAreaID`='$coreareaid'");
                                                    $countessentialid = mysqli_num_rows($sqlgeteesentialid);
                                                    if($countessentialid > 0)
                                                    {
                                                        $ak_sn=1;
                                                        while($fetchessentialasp = mysqli_fetch_assoc($sqlgeteesentialid))
                                                        {
                                                                        
                                                                $essentialaspid = $fetchessentialasp['EssentialAspectsID'];
                                                                echo '<tr>';
                                                                echo '<input type="hidden" value="'.$essentialaspid.'" class="essentialid">';
                                                                echo '<td>'.$fetchessentialasp['EssentialAspects'].'</td>';
                                                                
                                                                echo '<td>';
                                                                echo '<table class="table table-striped table-bordered">
                                                                <tr>';
                                                                $sqlgetasskey = mysqli_query($link,"SELECT * FROM `britishassessmentkeys` WHERE `InstitutionID`='$inst'");
                                                                $countaskey = mysqli_num_rows($sqlgetasskey);
                                                                if($countaskey > 0)
                                                                {
                                                                                
                                                                            $checkkeyassess = mysqli_query($link,"SELECT * FROM `britischessentialallocation` WHERE `EssentialAspectsID`='$essentialaspid' AND `CampusID`='$camp' AND 
                                                                            `ClassOrDepartmentID`='$class_id' AND `TermOrSemesterID`='$term' AND `StudentID`='$studid'");
                                                                            $countasskeysadded = mysqli_num_rows($checkkeyassess);
                                                                                $fetchaddedas = mysqli_fetch_assoc($checkkeyassess);
                                                                            $ak_sn++;
                                                                        while($getaskey = mysqli_fetch_assoc($sqlgetasskey))
                                                                        {
                                                                                $id_ct = rand(2594, 9807);

                                                                                if($countasskeysadded > 0)
                                                                                {
                                                                                    $assremark = $fetchaddedas['Remark'];
                                                                                    $AssessmentkeyID = $fetchaddedas['AssessmentkeyID'];
                                                                                }
                                                                                else{
                                                                                    $assremark = '';
                                                                                    $AssessmentkeyID = '';
                                                                                }
                                                                                    
                                                                                    $addedaskeyid = $getaskey["AssessmentKeyID"];
                                                                                    $radiodis = $essentialaspid.$studid.$coreareaid;
                                                                                    $verifycheck =  $essentialaspid.$studid.$coreareaid.$addedaskeyid;              
                                                                                    if($AssessmentkeyID === $getaskey['AssessmentKeyID'])
                                                                                    {
                                                                                            
                                                                                    echo '<td>
                                                                                    <input tabindex="7" type="radio" class="check Assessmentid Generalradiobutton  corearearaion'.$verifycheck.'"  data-assement="assemmentkeyclass'.$radiodis.'" data-radiocoreareacomm="corearearaion'.$verifycheck.'" data-studentid="'.$studid.'"  data-id="'.$essentialaspid.'"  id="minimal-radio-'.$id_ct.$ak_sn.'" name="'.$studid.$essentialaspid.'" value="'.$getaskey["AssessmentKeyID"].'" checked>
                                                                                    <label for="minimal-radio-'.$id_ct.$ak_sn.'">'.$getaskey["AssessmentKey"].'</label></td>';  
                                                                                        
                                                                                        
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                        

                                                                                                    
                                                                                        echo '<td>
                                                                                        <input tabindex="7" type="radio" class="check Assessmentid Generalradiobutton  corearearaion'.$verifycheck.'" data-radiocoreareacomm="corearearaion'.$verifycheck.'"   data-assement="assemmentkeyclass'.$radiodis.'" data-studentid="'.$studid.'" 
                                                                                        data-id="'.$essentialaspid.'"  id="minimal-radio-'.$id_ct.$ak_sn.'" name="'.$studid.$essentialaspid.'" 
                                                                                        value="'.$getaskey["AssessmentKeyID"].'" >
                                                                                        <label for="minimal-radio-'.$id_ct.$ak_sn.'">'.$getaskey["AssessmentKey"].'</label></td>';  
                                                                    
                                                                    
                                                                            
                                                                                        
                                                                            
                                                                                    }
                                                                            
                                                                            
                                                                        }
                                                                }
                                                                else{
                                                                        echo' <td><center> No Assessment Key!!<center></td>';
                                                                    }
                                                                echo  '</tr></table>';
                                                                
                                                                $sqlteachersremark = mysqli_query($link,"SELECT * FROM `britischessentialallocation` WHERE `EssentialAspectsID`='$essentialaspid' 
                                                                AND `CoreAreaID`='$coreareaid' AND `CampusID`='$camp' AND `ClassOrDepartmentID`='$class_id'  AND `Session`='$session' AND `TermOrSemesterID`='$term' AND`StudentID`='$studid'");
                                                                $fetchremark = mysqli_fetch_assoc($sqlteachersremark);
                                                                $row_cntfetchremark = mysqli_num_rows($sqlteachersremark);

                                                                if($row_cntfetchremark > 0)
                                                                {
                                                                    $remarkid = $fetchremark['AllocationID'];
                                                                    $Remark = $fetchremark['Remark'];
                                                                }
                                                                else{
                                                                    $remarkid = 0;
                                                                    $Remark = '';
                                                                }
                                                                
                                                                $corearistuent = $studid.$remarkid;
                                                                
                                                                echo '</td>
                                                                    <td><textarea placeholder="e.g. Good one!" name="remark" class="remark Generalclasskeyup remarkclass'.$corearistuent.' form-control"  data-commentremark="remarkclass'.$corearistuent.'"  data-corearea="'.$coreareaid.'" data-id="'.$essentialaspid.'" data-studid="'.$studid.'">'.$Remark.'</textarea></td>';
                                                            echo '</tr>';
                                                        }
                                                    }
                                                    else{
                                                            echo'
                                                        <div class="alert alert-warning" role="alert">
                                                            <i class="fa fa-warning"></i> <strong>Oops</strong> No Essential Aspect Created!!
                                                        </div>
                                                        ';  
                                                    }
                                                    
                                                    $fetchcoreareacomment = mysqli_query($link,"SELECT * FROM `britishcoreareacomments` WHERE `CampusID`='$camp' AND 
                                                    `Session`='$session' AND `TermOrSemesterID`='$term' AND `ClassOrDepartmentID`='$class_id' AND `CoreAreaID`='$coreareaid' AND `StudentID`='$studid'");
                                                    $fetchcorecomment = mysqli_fetch_assoc($fetchcoreareacomment);
                                                    $row_cnt_fetchcorecomment = mysqli_num_rows($fetchcoreareacomment);

                                                    if($row_cnt_fetchcorecomment > 0)
                                                    {
                                                        $newcommentgotten = $fetchcorecomment['TeachersCoreAreaComment'];
                                                        $newcommentgottenid = $fetchcorecomment['CoreAreaCommentID'];
                                                        
                                                    }
                                                    else{
                                                        $newcommentgotten = '';
                                                        $newcommentgottenid = '';
                                                        
                                                    }
                                                    
                                                    $subjectid =  $fetcharea['CoreArea'];
                                                    $newcommentfound =  $studid.$coreareaid;
                                                    
                                            echo '<td colspan="3"><br><br><label for="teacher_comment" style="font-weight:bolder;">Teacher\'s Comment: ('.$fetcharea['CoreArea'].') </label><textarea class="teachers_comment Generalclasskeyup commentclass'.$newcommentfound.' form-control"  data-commentremark="commentclass'.$newcommentfound.'" data-stud="'.$studid.'" placeholder="e.g. Good one!" name="teacher_comment" data-corearea="'.$coreareaid.'">'.$newcommentgotten.'</textarea></td>
                                        
                                        </table>
                                        </div>';
                                        
                                    }
                                        
                            }
                            else
                            {
                                echo'
                                <div class="alert alert-warning" role="alert">
                                    <i class="fa fa-warning"></i> <strong>Oops</strong> No Core Area Created!!
                                </div>
                                ';  
                                
                            }
                            
                            $sqltogetoverallcomment = mysqli_query($link,"SELECT * FROM `britishoverallcomments` WHERE `CampusID`='$camp' AND `Session`='$session' AND `TermOrSemesterID`='$term' 
                            AND `ClassOrDepartmentID`='$class_id' AND `StudentID`='$studid'");
                            $fetchoverallcomment = mysqli_fetch_assoc($sqltogetoverallcomment);
                            $rowcnt_fetchoverallcomment = mysqli_num_rows($sqltogetoverallcomment);

                            if($rowcnt_fetchoverallcomment > 0)
                            {
                                $newoverallid = $fetchoverallcomment['OverallCommentID'];
                                $OverallComment = $fetchoverallcomment['OverallComment'];
                            }
                            else{
                                $newoverallid = '';
                                $OverallComment = '';
                            }
                    
                                
                                $newoverall =  $studid.$newoverallid;
                                echo '<br><br><label for="comment" style="font-weight:bolder;">Overall Comment: </label><textarea class="overallcomment Generalclasskeyup commentclassall'.$newoverall.' form-control"  data-commentremark="commentclassall'.$newoverall.'" data-id="'.$studid.'" placeholder="e.g. Good one!" name="comment_" id="comment">'.$OverallComment.'</textarea>
                            </div>
                        </div>
                    </div>
                </div>';
                            
            }
            else
            {
                echo'<div class="alert alert-warning" role="alert">
                    <i class="fa fa-warning"></i> <strong>Oops</strong> No Details For this Student
                </div>'; 
                    
            }
        
        
    }

    else
    {
        echo'<div class="alert alert-warning" role="alert">
            <i class="fa fa-warning"></i> <strong>Oops</strong> No Student in this Class
        </div>';  
    }
?>