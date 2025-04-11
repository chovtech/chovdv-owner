<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include ('../../config/config.php');

    $abba_campus_id = $_POST['abba_campus_id'];

    $abba_get_instituion_id = $_POST['abba_get_instituion_id'];

    $abba_display_result_class = $_POST['abba_display_result_class'];
    $abba_display_session = $_POST['abba_display_session'];
    $abba_result_display_term = $_POST['abba_result_display_term'];

    echo '<div class="col-sm-12">
        <ul class="nav nav-tabs mb-3 customtab" id="abba-behave-psychomotor" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="behave-psychomotor-tab-1" data-bs-toggle="tab" href="#behave-psychomotor-tabs-1" role="tab" aria-controls="behave-psychomotor-tabs-1" aria-selected="true">Psychomotor</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="behave-affective-domain-tab-2" data-bs-toggle="tab" href="#behave-affective-domain-tabs-2"
                    role="tab" aria-controls="behave-affective-domain-tabs-2" aria-selected="false">Affective Domain</a>
            </li>
        </ul>


        <div class="tab-content" id="abba-config-content">

            <div class="tab-pane fade show active" id="behave-psychomotor-tabs-1" role="tabpanel" aria-labelledby="behave-psychomotor-tab-1">';

                $sqldeptchecker = "SELECT * FROM `psychomotortraits` INNER JOIN classordepartmentstudentallocation ON psychomotortraits.StudentID= classordepartmentstudentallocation.StudentID WHERE classordepartmentstudentallocation.Session='$abba_display_session' AND psychomotortraits.Session='$abba_display_session' AND TermOrSemester='$abba_result_display_term' AND classordepartmentstudentallocation.CampusID='$abba_campus_id' AND psychomotortraits.CampusID='$abba_campus_id'";
                $querydeptchecker = mysqli_query($link, $sqldeptchecker);
                $rowdeptchecker = mysqli_fetch_assoc($querydeptchecker);
                $countdeptchecker = mysqli_num_rows($querydeptchecker);
                                    
                if($countdeptchecker > 0)
                {
                
                    $sqldept = "SELECT * FROM `classordepartmentstudentallocation` WHERE ClassOrDepartmentID='$abba_display_result_class' AND CampusID='$abba_campus_id' AND Session='$abba_display_session'";
                    $querydept = mysqli_query($link, $sqldept);
                    $rowdept = mysqli_fetch_assoc($querydept);
                    $countdept = mysqli_num_rows($querydept);
                                        
                    if($countdept > 0)
                    {
                        echo '<div class="row mb-3">
                            <div class="col-lg-12">
                                <!--- <button type="button" class="btn btn-sm bg-light text-primary mt-2 rounded-3 btn-outline-primary float-end" data-bs-toggle="modal" data-bs-target="#abba_show_result_bulk_upload_modal"><i class="fas fa-cloud-upload-alt text-primary" style="font-size:12px;"> Bulk Upload</i></button> -->
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
                                <span class="clearScoreSheetModal" type="button" data-bs-toggle="modal" data-bs-target="#clearScoreSheetModalOpen" data-id="2" style="font-size: 12px; color: red; text-decoration: underline;"><i class="fa fa-trash"></i> Remove student from sheet
                                </span> |  
        
                                <span id="addToSheetModal" type="button" class="addToSheetModal" data-bs-toggle="modal" data-bs-target="#addToSheetModalOpen" data-id="2" style="font-size: 12px; color: green; text-decoration: underline;"><i class="fa fa-plus"></i> Add student to sheet
                                </span>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="editable-datatable" style="font-size: 13px;">
                                <thead>
                                    <tr style="font-size:11px;">
                                        <th>S/N</th>
                                        <th>Full Name</th>
                                        <th>Dexterity</th>
                                        <th>Writing Skills</th>
                                        <th>Gymnastic Skills</th>
                                        <th>Musical Skills</th>
                                        <th>Experimental Skills</th>
                                        <th>Handling Of Equipments</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody style="font-size:11px;">';
                                    $cnt = 1;
                                    
                                    do{
                                        
                                        $StudID = $rowdept['StudentID'];
                                    
                                        $sqlGetStudentInfo = "SELECT * FROM `userlogin` WHERE UserType='student' AND UserID='$StudID' AND InstitutionIDOrCampusID='$abba_campus_id'";
                                        $queryGetStudentInfo = mysqli_query($link, $sqlGetStudentInfo);
                                        $rowGetStudentInfo = mysqli_fetch_assoc($queryGetStudentInfo);
                                        $countGetStudentInfo = mysqli_num_rows($queryGetStudentInfo);
                            
                                        $sqlStud = "SELECT * FROM `student` WHERE StudentID='$StudID' AND CampusID='$abba_campus_id'";
                                        $queryStud = mysqli_query($link, $sqlStud);
                                        $rowStud = mysqli_fetch_assoc($queryStud);
                                        $countStud = mysqli_num_rows($queryStud);
                            
                                        $StudReg = $rowGetStudentInfo['UserRegNumberOrUsername'];
                        
                                        $sqlpsycho = "SELECT * FROM `psychomotortraits` WHERE StudentID='$StudID' AND Session='$abba_display_session' AND TermOrSemester='$abba_result_display_term' AND CampusID='$abba_campus_id'";
                                        $querypsycho = mysqli_query($link, $sqlpsycho);
                                        $rowpsycho = mysqli_fetch_assoc($querypsycho);
                                        $countpsycho = mysqli_num_rows($querypsycho);
                        
                                        if($countpsycho > 0){
                        
                                            $studentName = $rowStud['StudentLastName'].' '.$rowStud['StudentFirstName'].' ('.$StudReg.')';
                    
                                            $dex = $rowpsycho['Dexterity'];
                                            $write = $rowpsycho['WritingSkills'];
                                            $gym = $rowpsycho['GymnasticSkills'];
                                            $music = $rowpsycho['MusicalSkills'];
                                            $exp = $rowpsycho['ExperimentalSkills'];
                                            $hand = $rowpsycho['HandlingOfEquipment'];
                    
                                            echo '<tr id="'.$rowpsycho['PsychomotorTraitID'].'" class="edit_tr_psycho"">
                                                
                                                <td>
                                                    '.$cnt++.'
                                                </td>
                                                <td>
                                                    '.$studentName.'
                                                </td>
                                                <td class="edit_td">
                                                    <span id="dex_'.$rowpsycho["PsychomotorTraitID"].'" class="text_psycho">'.$rowpsycho["Dexterity"].'</span>
                                                    <input type="text" value="'.$rowpsycho["Dexterity"].'" class="editbox_psycho" id="dex_input_'.$rowpsycho["PsychomotorTraitID"].'"/>
                                                </td>
                                                <td class="edit_td">
                                                    <span id="write_'.$rowpsycho["PsychomotorTraitID"].'" class="text_psycho">'.$rowpsycho["WritingSkills"].'</span>
                                                    <input type="text" value="'.$rowpsycho["WritingSkills"].'" class="editbox_psycho" id="write_input_'.$rowpsycho["PsychomotorTraitID"].'"/>
                                                </td>
                                                <td class="edit_td">
                                                    <span id="gym_'.$rowpsycho["PsychomotorTraitID"].'" class="text_psycho">'.$rowpsycho["GymnasticSkills"].'</span>
                                                    <input type="text" value="'.$rowpsycho["GymnasticSkills"].'" class="editbox_psycho" id="gym_input_'.$rowpsycho["PsychomotorTraitID"].'"/>
                                                </td>
                                                <td class="edit_td">
                                                    <span id="music_'.$rowpsycho["PsychomotorTraitID"].'" class="text_psycho">'.$rowpsycho["MusicalSkills"].'</span>
                                                    <input type="text" value="'.$rowpsycho["MusicalSkills"].'" class="editbox_psycho" id="music_input_'.$rowpsycho["PsychomotorTraitID"].'"/>
                                                </td>
                                                <td class="edit_td">
                                                    <span id="exp_'.$rowpsycho["PsychomotorTraitID"].'" class="text_psycho">'.$rowpsycho["ExperimentalSkills"].'</span>
                                                    <input type="text" value="'.$rowpsycho["ExperimentalSkills"].'" class="editbox_psycho" id="exp_input_'.$rowpsycho["PsychomotorTraitID"].'"/>
                                                </td>
                                                <td class="edit_td">
                                                    <span id="hand_'.$rowpsycho["PsychomotorTraitID"].'" class="text_psycho">'.$rowpsycho["HandlingOfEquipment"].'</span>
                                                    <input type="text" value="'.$rowpsycho["HandlingOfEquipment"].'" class="editbox_psycho" id="hand_input_'.$rowpsycho["PsychomotorTraitID"].'"/>
                                                </td>
                                                <td>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#delScoreModal" data-id="'.$rowpsycho["PsychomotorTraitID"].'" data-tab="2"><i class="fa fa-times text-danger"></i></a>

                                                    <span style="display:none;"><input type="text" value="'.$studentName.'" class="abba_name_'.$rowpsycho["PsychomotorTraitID"].'_2" id="studname_'.$rowpsycho["PsychomotorTraitID"].'_2"/></span>
                                                </td>
                                            </tr>';
                        
                                        }
                                            
                                    }while($rowdept = mysqli_fetch_assoc($querydept));
                                echo '</tbody>
                            </table>
                        </div>';
                    }
                    else
                    {
                        echo '<div class="row mb-3">
                            <div class="col-lg-12">
                                <!--- <button type="button" class="btn btn-sm bg-light text-primary mt-2 rounded-3 btn-outline-primary float-end" data-bs-toggle="modal" data-bs-target="#abba_show_result_bulk_upload_modal"><i class="fas fa-cloud-upload-alt text-primary" style="font-size:12px;"> Bulk Upload</i></button> -->
                            </div>
                        </div>
                        <div align="center">
                            <img src="../../assets/images/adminImg/5568706.png" style="width:20%;"/><br>
                            <span class="fs-sm text-secondary">No student has been added to the sheet.<br>Click on "Add Student" to add a student to the sheet</span><br>
                            <button type="button" class="btn btn-primary addToSheetModal" data-bs-toggle="modal" data-bs-target="#addToSheetModalOpen" data-id="2"><i class="fa fa-plus"> Add student(s) to sheet</i></button>
                        </div>';
                    }
                }
                else
                {
                    echo '<div class="row mb-3">
                        <div class="col-lg-12">
                            <!--- <button type="button" class="btn btn-sm bg-light text-primary mt-2 rounded-3 btn-outline-primary float-end" data-bs-toggle="modal" data-bs-target="#abba_show_result_bulk_upload_modal"><i class="fas fa-cloud-upload-alt text-primary" style="font-size:12px;"> Bulk Upload</i></button> -->
                        </div>
                    </div>
                    <div align="center">
                        <img src="../../assets/images/adminImg/5568706.png" style="width:20%;"/><br>
                        <span class="fs-sm text-secondary">No student has been added to the sheet.<br>Click on "Add Student" to add a student to the sheet</span><br>
                        <button type="button" class="btn btn-primary addToSheetModal" data-bs-toggle="modal" data-bs-target="#addToSheetModalOpen" data-id="2"><i class="fa fa-plus"> Add student(s) to sheet</i></button>
                    </div>';
                }
                        
            echo '</div>

            <div class="tab-pane fade" id="behave-affective-domain-tabs-2" role="tabpanel" aria-labelledby="behave-affective-domain-tab-2">';
                
                $sqldeptchecker = "SELECT * FROM `affectivetraits` INNER JOIN classordepartmentstudentallocation ON affectivetraits.StudentID= classordepartmentstudentallocation.StudentID WHERE classordepartmentstudentallocation.Session='$abba_display_session' AND affectivetraits.Session='$abba_display_session' AND TermOrSemester='$abba_result_display_term' AND classordepartmentstudentallocation.CampusID='$abba_campus_id' AND affectivetraits.CampusID='$abba_campus_id'";
                $querydeptchecker = mysqli_query($link, $sqldeptchecker);
                $rowdeptchecker = mysqli_fetch_assoc($querydeptchecker);
                $countdeptchecker = mysqli_num_rows($querydeptchecker);
                                    
                if($countdeptchecker > 0)
                {
                    $sqldeptsec = "SELECT * FROM `classordepartmentstudentallocation` WHERE ClassOrDepartmentID='$abba_display_result_class' AND CampusID='$abba_campus_id' AND Session='$abba_display_session'";
                    $querydeptsec = mysqli_query($link, $sqldeptsec);
                    $rowdeptsec = mysqli_fetch_assoc($querydeptsec);
                    $countdeptsec = mysqli_num_rows($querydeptsec);
                            
                    if($countdeptsec > 0)
                    {
                        echo '<div class="row mb-3">
                            <div class="col-lg-12">
                                <!--- <button type="button" class="btn btn-sm bg-light text-primary mt-2 rounded-3 btn-outline-primary float-end" data-bs-toggle="modal" data-bs-target="#abba_show_result_bulk_upload_modal"><i class="fas fa-cloud-upload-alt text-primary" style="font-size:12px;"> Bulk Upload</i></button> -->
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
                                <span class="clearScoreSheetModal" type="button" data-bs-toggle="modal" data-bs-target="#clearScoreSheetModalOpen" data-id="3" style="font-size: 12px; color: red; text-decoration: underline;"><i class="fa fa-trash"></i> Remove student from sheet
                                </span>   |  

                                <span id="addToSheetModal" type="button" class="addToSheetModal" data-bs-toggle="modal" data-bs-target="#addToSheetModalOpen" data-id="3" style="font-size: 12px; color: green; text-decoration: underline;"><i class="fa fa-plus"></i> Add student to sheet
                                </span>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="editable-datatable" style="font-size: 13px;">
                                <thead>
                                    <tr style="font-size:11px;">
                                        <th>S/N</th>
                                        <th>Full Name</th>
                                        <th>Punctuality</th>
                                        <th>Attendance</th>
                                        <th>Neatness</th>
                                        <th>Curiosity</th>
                                        <th>Diligence</th>
                                        <th>Creative</th>
                                        <th>Attentiveness</th>
                                        <th>Class Participation</th>
                                        <th>Obedience</th>
                                        <th>Honesty</th>
                                        <th>Relationship With Mates</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody style="font-size:11px;">';
                                    $cntsec = 1;
                                        
                                    do{
                                        
                                        $StudIDsec = $rowdeptsec['StudentID'];

                                        $sqlGetStudentInfosec = "SELECT * FROM `userlogin` WHERE UserType='student' AND UserID='$StudIDsec' AND InstitutionIDOrCampusID='$abba_campus_id'";
                                        $queryGetStudentInfosec = mysqli_query($link, $sqlGetStudentInfosec);
                                        $rowGetStudentInfosec = mysqli_fetch_assoc($queryGetStudentInfosec);
                                        $countGetStudentInfosec = mysqli_num_rows($queryGetStudentInfosec);
                            
                                        $sqlStudsec = "SELECT * FROM `student` WHERE StudentID='$StudIDsec' AND CampusID='$abba_campus_id'";
                                        $queryStudsec = mysqli_query($link, $sqlStudsec);
                                        $rowStudsec = mysqli_fetch_assoc($queryStudsec);
                                        $countStudsec = mysqli_num_rows($queryStudsec);
                            
                                        $StudRegsec = $rowGetStudentInfosec['UserRegNumberOrUsername'];

                                        $sqlaffective = "SELECT * FROM `affectivetraits` WHERE StudentID='$StudIDsec' AND Session='$abba_display_session' AND TermOrSemester='$abba_result_display_term' AND CampusID='$abba_campus_id'";
                                        $queryaffective = mysqli_query($link, $sqlaffective);
                                        $rowaffective = mysqli_fetch_assoc($queryaffective);
                                        $countaffective = mysqli_num_rows($queryaffective);
                        
                                        if($countaffective > 0){
                        
                                            $studentNamesec = $rowStudsec['StudentLastName'].' '.$rowStudsec['StudentFirstName'].' ('.$StudRegsec.')';

                                            $Punctuality = $rowaffective['Punctuality'];
                                            $Attendance = $rowaffective['Attendance'];
                                            $Neatness = $rowaffective['Neatness'];
                                            $Curiosity = $rowaffective['Curiosity'];
                                            $Diligence = $rowaffective['Diligence'];
                                            $Creative = $rowaffective['Creative'];
                                            $Attentiveness = $rowaffective['Attentiveness'];
                                            $ClassParticipation = $rowaffective['ClassParticipation'];
                                            $Obedience = $rowaffective['Obedience'];
                                            $Honesty = $rowaffective['Honesty'];
                                            $RelationshipWithMates = $rowaffective['RelationshipWithMates'];
                    
                                            echo '<tr id="'.$rowaffective['AffectiveTraitID'].'" class="edit_tr_affective">
                                                
                                                <td>
                                                    '.$cntsec++.'
                                                </td>
                                                <td>
                                                    '.$studentNamesec.'
                                                </td>
                                                <td class="edit_td">
                                                    <span id="Punc_'.$rowaffective["AffectiveTraitID"].'" class="text_affective">'.$Punctuality.'</span>
                                                    <input type="text" value="'.$Punctuality.'" class="editbox_affective" id="Punc_input_'.$rowaffective["AffectiveTraitID"].'"/>
                                                </td>
                                                <td class="edit_td">
                                                    <span id="Atten_'.$rowaffective["AffectiveTraitID"].'" class="text_affective">'.$Attendance.'</span>
                                                    <input type="text" value="'.$Attendance.'" class="editbox_affective" id="Atten_input_'.$rowaffective["AffectiveTraitID"].'"/>
                                                </td>
                                                <td class="edit_td">
                                                    <span id="Neat_'.$rowaffective["AffectiveTraitID"].'" class="text_affective">'.$Neatness.'</span>
                                                    <input type="text" value="'.$Neatness.'" class="editbox_affective" id="Neat_input_'.$rowaffective["AffectiveTraitID"].'"/>
                                                </td>
                                                <td class="edit_td">
                                                    <span id="Curi_'.$rowaffective["AffectiveTraitID"].'" class="text_affective">'.$Curiosity.'</span>
                                                    <input type="text" value="'.$Curiosity.'" class="editbox_affective" id="Curi_input_'.$rowaffective["AffectiveTraitID"].'"/>
                                                </td>
                                                <td class="edit_td">
                                                    <span id="Dili_'.$rowaffective["AffectiveTraitID"].'" class="text_affective">'.$Diligence.'</span>
                                                    <input type="text" value="'.$Diligence.'" class="editbox_affective" id="Dili_input_'.$rowaffective["AffectiveTraitID"].'"/>
                                                </td>
                                                <td class="edit_td">
                                                    <span id="Creat_'.$rowaffective["AffectiveTraitID"].'" class="text_affective">'.$Creative.'</span>
                                                    <input type="text" value="'.$Creative.'" class="editbox_affective" id="Creat_input_'.$rowaffective["AffectiveTraitID"].'"/>
                                                </td>
                                                <td class="edit_td">
                                                    <span id="Attentive_'.$rowaffective["AffectiveTraitID"].'" class="text_affective">'.$Attentiveness.'</span>
                                                    <input type="text" value="'.$Attentiveness.'" class="editbox_affective" id="Attentive_input_'.$rowaffective["AffectiveTraitID"].'"/>
                                                </td>
                                                <td class="edit_td">
                                                    <span id="ClassPart_'.$rowaffective["AffectiveTraitID"].'" class="text_affective">'.$ClassParticipation.'</span>
                                                    <input type="text" value="'.$ClassParticipation.'" class="editbox_affective" id="ClassPart_input_'.$rowaffective["AffectiveTraitID"].'"/>
                                                </td>
                                                <td class="edit_td">
                                                    <span id="Obedi_'.$rowaffective["AffectiveTraitID"].'" class="text_affective">'.$Obedience.'</span>
                                                    <input type="text" value="'.$Obedience.'" class="editbox_affective" id="Obedi_input_'.$rowaffective["AffectiveTraitID"].'"/>
                                                </td>
                                                <td class="edit_td">
                                                    <span id="Honesty_'.$rowaffective["AffectiveTraitID"].'" class="text_affective">'.$Honesty.'</span>
                                                    <input type="text" value="'.$Honesty.'" class="editbox_affective" id="Honesty_input_'.$rowaffective["AffectiveTraitID"].'"/>
                                                </td>
                                                <td class="edit_td">
                                                    <span id="Relation_'.$rowaffective["AffectiveTraitID"].'" class="text_affective">'.$RelationshipWithMates.'</span>
                                                    <input type="text" value="'.$RelationshipWithMates.'" class="editbox_affective" id="Relation_input_'.$rowaffective["AffectiveTraitID"].'"/>
                                                </td>
                                                <td>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#delScoreModal" data-id="'.$rowaffective["AffectiveTraitID"].'" data-tab="3"><i class="fa fa-times text-danger"></i></a>

                                                    <span style="display:none;"><input type="text" value="'.$studentNamesec.'" class="abba_name_'.$rowaffective["AffectiveTraitID"].'_3" id="studname_'.$rowaffective["AffectiveTraitID"].'_3"/></span>
                                                </td>
                                            </tr>';
                        
                                        }
                        
                                    }while($rowdeptsec = mysqli_fetch_assoc($querydeptsec));
                                echo '</tbody>
                            </table>
                        </div>';
                    }
                    else
                    {
                        echo '<div class="row mb-3">
                            <div class="col-lg-12">
                                <!--- <button type="button" class="btn btn-sm bg-light text-primary mt-2 rounded-3 btn-outline-primary float-end" data-bs-toggle="modal" data-bs-target="#abba_show_result_bulk_upload_modal"><i class="fas fa-cloud-upload-alt text-primary" style="font-size:12px;"> Bulk Upload</i></button> -->
                            </div>
                        </div>
                        <div align="center">
                            <img src="../../assets/images/adminImg/5568706.png" style="width:20%;"/><br>
                            <span class="fs-sm text-secondary">No student has been added to the sheet.<br>Click on "Add Student" to add a student to the sheet</span><br>
                            <button type="button" class="btn btn-primary addToSheetModal" data-bs-toggle="modal" data-bs-target="#addToSheetModalOpen" data-id="3"><i class="fa fa-plus"> Add student(s) to sheet</i></button>
                        </div>';
                    }
                }
                else
                {
                    echo '<div class="row mb-3">
                        <div class="col-lg-12">
                            <!--- <button type="button" class="btn btn-sm bg-light text-primary mt-2 rounded-3 btn-outline-primary float-end" data-bs-toggle="modal" data-bs-target="#abba_show_result_bulk_upload_modal"><i class="fas fa-cloud-upload-alt text-primary" style="font-size:12px;"> Bulk Upload</i></button> -->
                        </div>
                    </div>
                    <div align="center">
                        <img src="../../assets/images/adminImg/5568706.png" style="width:20%;"/><br>
                        <span class="fs-sm text-secondary">No student has been added to the sheet.<br>Click on "Add Student" to add a student to the sheet</span><br>
                        <button type="button" class="btn btn-primary addToSheetModal" data-bs-toggle="modal" data-bs-target="#addToSheetModalOpen" data-id="3"><i class="fa fa-plus"> Add student(s) to sheet</i></button>
                    </div>';
                }
                        
            echo '</div>
        </div>
    </div>';
?>