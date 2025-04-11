<?php

    include('../../../config/config.php');

    $tari_get_stored_instituion_id = trim($_POST['tari_get_stored_instituion_id']);
    $settingsID = trim($_POST['settingsID']);

    $getInstituteDetails = mysqli_query($link,"SELECT * FROM `institution` WHERE  InstitutionID = '$tari_get_stored_instituion_id'");
    $num_row1 = mysqli_num_rows($getInstituteDetails);
    $fetch_row1 = mysqli_fetch_assoc($getInstituteDetails);


    if($num_row1 > 0){


        $InstitutionMotto =  $fetch_row1['InstitutionMotto'];
        $InstitutionLogo =  $fetch_row1['InstitutionLogo'];


        $prosload_viewquestion = mysqli_query($link, "SELECT * FROM `cbtsetquestionssettings` WHERE cbtsetquestionssettingsID='$settingsID'");
        $prosload_viewquestioncnt = mysqli_num_rows($prosload_viewquestion);
        $prosload_viewquestioncnt_row = mysqli_fetch_assoc($prosload_viewquestion);

        $AssesementTypeforverification =   $prosload_viewquestioncnt_row['AssesementType'];





            if($AssesementTypeforverification == 'Admission')
            {




                        $fetch = mysqli_query($link,"SELECT * FROM `cbtsetquestionssettings` 
                        INNER JOIN `campus` 
                        ON `cbtsetquestionssettings`.CampusID = `campus`.CampusID
                        INNER JOIN `section` 
                        ON `cbtsetquestionssettings`.SectionID = `section`.SectionID
                        INNER JOIN `subjectorcourse`
                        ON `cbtsetquestionssettings`.SubjectOrCourseID = `subjectorcourse`.SubjectOrCourseID
                        INNER JOIN `classtemplate`
                        ON `cbtsetquestionssettings`.ClassOrDepartmentID = `classtemplate`.ClassTemplateID
                        WHERE `cbtsetquestionssettings`.cbtsetquestionssettingsID =  $settingsID
                        ORDER BY `cbtsetquestionssettings`.`cbtsetquestionssettingsID` DESC");

            }else
            {


                        $fetch = mysqli_query($link,"SELECT * FROM `cbtsetquestionssettings` 
                        INNER JOIN `campus` 
                        ON `cbtsetquestionssettings`.CampusID = `campus`.CampusID
                        INNER JOIN `section` 
                        ON `cbtsetquestionssettings`.SectionID = `section`.SectionID
                        INNER JOIN `subjectorcourse`
                        ON `cbtsetquestionssettings`.SubjectOrCourseID = `subjectorcourse`.SubjectOrCourseID
                        INNER JOIN `classordepartment`
                        ON `cbtsetquestionssettings`.ClassOrDepartmentID = `classordepartment`.ClassOrDepartmentID
                        WHERE `cbtsetquestionssettings`.cbtsetquestionssettingsID =  $settingsID
                        ORDER BY `cbtsetquestionssettings`.`cbtsetquestionssettingsID` DESC");


            }

      

        $num_row = mysqli_num_rows($fetch);
        $fetch_row = mysqli_fetch_assoc($fetch);

        if($num_row > 0){

            $AssesementCategory =  $fetch_row['AssesementCategory'];

            if($AssesementCategory == 'Objective'){

                $cbtsetquestionssettingsID =  $fetch_row['cbtsetquestionssettingsID'];
                
                $SubjectOrCourseTitle =  $fetch_row['SubjectOrCourseTitle'];

                if($AssesementTypeforverification == 'Admission')
                {
                    $ClassOrDepartmentName =  $fetch_row['ClassTemplateName'];

                    
                }else
                {

                    $ClassOrDepartmentName =  $fetch_row['ClassOrDepartmentName'];

                }


                
                

                $CampusName =  $fetch_row['CampusName'];
                $CampusAddress =  $fetch_row['CampusAddress'];

                $AssesementType =  $fetch_row['AssesementType'];
                $AssesementTitle =  $fetch_row['AssesementTitle'];
                $AssesementDate =  $fetch_row['AssesementDate'];
                $AssesementStartTime =  $fetch_row['AssesementStartTime'];
                $AssesementEndTime =  $fetch_row['AssesementEndTime'];

                $question = $fetch_row['question'];

                $timeIn = new DateTime($AssesementStartTime);
                $timeOut = new DateTime($AssesementEndTime);

                // Calculate the time difference
                $duration = $timeIn->diff($timeOut);

                // Format the duration
                $formattedDuration = $duration->format('%h hours and %i minutes');

                $ex = explode(",", $question);

                $num = 1;

                echo '<div class="tari_page " size="A4" id="prosloadcbtquestionforview_print">
                <div class="row m-0 text-center">
                    <div class="col-lg-12">
                        <figure class="figure">
                            <img src="'.$InstitutionLogo.'" width="65" class="figure-img img-fluid rounded" alt="...">
                            <figcaption class="figure-caption text-end fs-5 fw-bold text-center">'.$CampusName.'</figcaption>
                            <figcaption class="figure-caption text-end fs-6 text-center"><span class="fw-bold ms-2">Motto:</span> '.$InstitutionMotto.'.<span class="fw-bold ms-2">Address:</span> '.$CampusAddress.' </figcaption>
                        </figure>
                        <br>
                        <figure class="figure">
                            <figcaption class="figure-caption text-end fw-bold text-center" style="font-size:14px;">
                                Class: <span class="fw-normal me-2">'.$ClassOrDepartmentName.'</span>  
                                Subject: <span class="fw-normal me-2">'.$SubjectOrCourseTitle.'</span>
                                Date: <span class="fw-normal me-2">'.$AssesementDate.'</span>
                                Time Duration: <span class="fw-normal me-2">'.$formattedDuration.'</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                <div class="row" id="no_print">
                    <div class="col-lg-12">
                        <a class="btn btn-sm btn-primary proloadshowanserbtnforview" style="font-size:12px;" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Show Answer
                          </a>
                    </div>
                </div>';

                foreach($ex as $key){

                    $getquestion = mysqli_query($link,"SELECT * FROM `questionbank` WHERE  `QuestionBankID` = '$key'");
                    $num_question = mysqli_num_rows($getquestion);
                    $fetch_question = mysqli_fetch_assoc($getquestion);


                    $question =  $fetch_question['question'];
                    $optionA =  $fetch_question['optionA'];
                    $optionB =  $fetch_question['optionB'];
                    $optionC =  $fetch_question['optionC'];
                    $optionD =  $fetch_question['optionD'];
                    $answer =  $fetch_question['answer'];

                    $QuestionCategory =  $fetch_question['QuestionCategory'];


                    echo '<div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-3">
                            <div class="card shadow-sm border-0">
                                <div class="card-body">
                                    <div class="card-title">
                                        <p class="fw-bold" style="font-size:16px;">Question '.$num++.' ('.$QuestionCategory.')</p>
                                    </div>
                                    <div class="row mt-0">
                                        <div class="card-text">
                                            <p>'.$question.'</p>
                                        </div>
                                        <form class="question_option">
                                            <label class="m-0">
                                                <p class="me-2">A.</p>'.$optionA.'
                                            </label>
                                            <label class="m-0">
                                                <p class="me-2">B.</p>'.$optionB.'
                                            </label>
                                            <label class="m-0">
                                                <p class="me-2">C.</p>'.$optionC.' 
                                            </label>
                                            <label class="m-0">
                                                <p class="me-2">D.</p>'.$optionD.'
                                            </label>
                                        </form>
                                        <div class="collapse" id="collapseExample">
                                            <div class="card border-0 card-body">
                                                <p><span style="color:blue;">Answer: A</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }
                echo '</div>';

            }elseif($AssesementCategory == 'Theory'){

                $cbtsetquestionssettingsID =  $fetch_row['cbtsetquestionssettingsID'];
               


                if($AssesementTypeforverification == 'Admission')
                {
                    $ClassOrDepartmentName =  $fetch_row['ClassTemplateName'];

                    
                }else
                {

                    $ClassOrDepartmentName =  $fetch_row['ClassOrDepartmentName'];

                }


                $SubjectOrCourseTitle =  $fetch_row['SubjectOrCourseTitle'];

                $CampusName =  $fetch_row['CampusName'];
                $CampusAddress =  $fetch_row['CampusAddress'];

                $AssesementType =  $fetch_row['AssesementType'];
                $AssesementTitle =  $fetch_row['AssesementTitle'];
                $AssesementDate =  $fetch_row['AssesementDate'];
                $AssesementStartTime =  $fetch_row['AssesementStartTime'];
                $AssesementEndTime =  $fetch_row['AssesementEndTime'];

                $question = $fetch_row['TheoryQuestion'];

                $timeIn = new DateTime($AssesementStartTime);
                $timeOut = new DateTime($AssesementEndTime);

                // Calculate the time difference
                $duration = $timeIn->diff($timeOut);

                // Format the duration
                $formattedDuration = $duration->format('%h hours and %i minutes');

                $ex = explode(",", $question);

                $num = 1;

                echo '<div class="tari_page" size="A4" id="prosloadcbtquestionforview_print">
                <div class="row m-0 text-center">
                    <div class="col-lg-12">
                        <figure class="figure">
                            <img src="'.$InstitutionLogo.'" width="65" class="figure-img img-fluid rounded" alt="...">
                            <figcaption class="figure-caption text-end fs-5 fw-bold text-center">'.$CampusName.'</figcaption>
                            <figcaption class="figure-caption text-end fs-6 text-center"><span class="fw-bold ms-2">Motto:</span> '.$InstitutionMotto.'.<span class="fw-bold ms-2">Address:</span> '.$CampusAddress.' </figcaption>
                        </figure>
                        <br>
                        <figure class="figure">
                            <figcaption class="figure-caption text-end fw-bold text-center" style="font-size:14px;">
                                Class: <span class="fw-normal me-2">'.$ClassOrDepartmentName.'</span>  
                                Subject: <span class="fw-normal me-2">'.$SubjectOrCourseTitle.'</span>
                                Date: <span class="fw-normal me-2">'.$AssesementDate.'</span>
                                Time Duration: <span class="fw-normal me-2">'.$formattedDuration.'</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                <div class="row" id="no_print">
                    <div class="col-lg-12">
                        <a class="btn btn-sm btn-primary proloadshowanserbtnforview" style="font-size:12px;" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Show Answer
                          </a>
                    </div>
                </div>';

                foreach($ex as $key){

                    $getquestion = mysqli_query($link,"SELECT * FROM `questionbank` WHERE  `QuestionBankID` = '$key'");
                    $num_question = mysqli_num_rows($getquestion);
                    $fetch_question = mysqli_fetch_assoc($getquestion);

                    $question =  $fetch_question['question'];
                    $QuestionCategory =  $fetch_question['QuestionCategory'];
                    
                    echo '<div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-3">
                            <div class="card shadow-sm border-0">
                                <div class="card-body">
                                    <div class="card-title">
                                        <p class="fw-bold" style="font-size:16px;">Question '.$num++.' ('.$QuestionCategory.')</p>
                                    </div>
                                    <div class="row mt-0">
                                        <div class="card-text">
                                            <p>'.$question.'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }
                echo '</div>';
            }elseif($AssesementCategory == 'Both'){

                $cbtsetquestionssettingsID =  $fetch_row['cbtsetquestionssettingsID'];

                if($AssesementTypeforverification == 'Admission')
                {
                    $ClassOrDepartmentName =  $fetch_row['ClassTemplateName'];

                    
                }else
                {

                    $ClassOrDepartmentName =  $fetch_row['ClassOrDepartmentName'];

                }

                $SubjectOrCourseTitle =  $fetch_row['SubjectOrCourseTitle'];

                $CampusName =  $fetch_row['CampusName'];
                $CampusAddress =  $fetch_row['CampusAddress'];

                $AssesementType =  $fetch_row['AssesementType'];
                $AssesementTitle =  $fetch_row['AssesementTitle'];
                $AssesementDate =  $fetch_row['AssesementDate'];
                $AssesementStartTime =  $fetch_row['AssesementStartTime'];
                $AssesementEndTime =  $fetch_row['AssesementEndTime'];

                $question = $fetch_row['question'];
                $question2 = $fetch_row['TheoryQuestion'];

                $timeIn = new DateTime($AssesementStartTime);
                $timeOut = new DateTime($AssesementEndTime);

                // Calculate the time difference
                $duration = $timeIn->diff($timeOut);

                // Format the duration
                $formattedDuration = $duration->format('%h hours and %i minutes');

                $ex = explode(",", $question);
                $ex2 = explode(",", $question2);

                $num = 1;

                echo '<div class="tari_page" size="A4" id="prosloadcbtquestionforview_print">
                <div class="row m-0 text-center">
                    <div class="col-lg-12">
                        <figure class="figure">
                            <img src="'.$InstitutionLogo.'" width="65" class="figure-img img-fluid rounded" alt="...">
                            <figcaption class="figure-caption text-end fs-5 fw-bold text-center">'.$CampusName.'</figcaption>
                            <figcaption class="figure-caption text-end fs-6 text-center"><span class="fw-bold ms-2">Motto:</span> '.$InstitutionMotto.'.<span class="fw-bold ms-2">Address:</span> '.$CampusAddress.' </figcaption>
                        </figure>
                        <br>
                        <figure class="figure">
                            <figcaption class="figure-caption text-end fw-bold text-center" style="font-size:14px;">
                                Class: <span class="fw-normal me-2">'.$ClassOrDepartmentName.'</span>  
                                Subject: <span class="fw-normal me-2">'.$SubjectOrCourseTitle.'</span>
                                Date: <span class="fw-normal me-2">'.$AssesementDate.'</span>
                                Time Duration: <span class="fw-normal me-2">'.$formattedDuration.'</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                <div class="row" id="no_print">
                    <div class="col-lg-12">
                        <a class="btn btn-sm btn-primary proloadshowanserbtnforview" style="font-size:12px;" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Show Answer
                          </a>
                    </div>
                </div>';

                foreach($ex as $key){

                    $getquestion = mysqli_query($link,"SELECT * FROM `questionbank` WHERE  `QuestionBankID` = '$key'");
                    $num_question = mysqli_num_rows($getquestion);
                    $fetch_question = mysqli_fetch_assoc($getquestion);


                    $question =  $fetch_question['question'];
                    $optionA =  $fetch_question['optionA'];
                    $optionB =  $fetch_question['optionB'];
                    $optionC =  $fetch_question['optionC'];
                    $optionD =  $fetch_question['optionD'];
                    $answer =  $fetch_question['answer'];

                    $QuestionCategory =  $fetch_question['QuestionCategory'];


                    echo '<div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-3">
                            <div class="card shadow-sm border-0">
                                <div class="card-body">
                                    <div class="card-title">
                                        <p class="fw-bold" style="font-size:16px;">Question '.$num++.' ('.$QuestionCategory.')</p>
                                    </div>
                                    <div class="row mt-0">
                                        <div class="card-text">
                                            <p>'.$question.'</p>
                                        </div>
                                        <form class="question_option">
                                            <label class="m-0">
                                                <p class="me-2">A.</p>'.$optionA.'
                                            </label>
                                            <label class="m-0">
                                                <p class="me-2">B.</p>'.$optionB.'
                                            </label>
                                            <label class="m-0">
                                                <p class="me-2">C.</p>'.$optionC.' 
                                            </label>
                                            <label class="m-0">
                                                <p class="me-2">D.</p>'.$optionD.'
                                            </label>
                                        </form>
                                        <div class="collapse" id="collapseExample">
                                            <div class="card border-0 card-body">
                                                <p><span style="color:blue;">Answer: A</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }
                foreach($ex2 as $key2){

                    $getquestion2 = mysqli_query($link,"SELECT * FROM `questionbank` WHERE  `QuestionBankID` = '$key2'");
                    $num_question2 = mysqli_num_rows($getquestion2);
                    $fetch_question = mysqli_fetch_assoc($getquestion2);

                    $question2 =  $fetch_question['question'];
                    $QuestionCategory =  $fetch_question['QuestionCategory'];
                    
                    echo '<div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-3">
                            <div class="card shadow-sm border-0">
                                <div class="card-body">
                                    <div class="card-title">
                                        <p class="fw-bold" style="font-size:16px;">Question '.$num++.' ('.$QuestionCategory.')</p>
                                    </div>
                                    <div class="row mt-0">
                                        <div class="card-text">
                                            <p>'.$question2.'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }
                echo '</div>';
            }

        }



    }else{

    }


   