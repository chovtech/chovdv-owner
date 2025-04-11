<?php




            include('../../config/config.php');
                    
            $IntitutionID = $_POST['IntitutionID'];
            $UserID = $_POST['UserID'];
            $Session = $_POST['Session'];
            $classID = $_POST['classID'];
            $campusID = $_POST['campusID'];
           $usertype = $_POST['usertype'];


            

            if($usertype == 'owner')
            {

                

                            $selectadminssionrecord = mysqli_query($link,"SELECT * FROM `admissionparentdetails` INNER JOIN admissionchilddetails ON admissionparentdetails.ParentDetailID = admissionchilddetails.ParentDetailID INNER JOIN
                            classtemplate ON admissionchilddetails.AdmissionClassID = classtemplate.ClassTemplateID   WHERE  `admissionparentdetails`.InstitutionID='$IntitutionID' AND  (admissionchilddetails.AdmissionClassID=$classID OR  $classID IS NULL) AND   (admissionchilddetails.CampusID=$campusID OR $campusID IS NULL) AND   (admissionchilddetails.sessionName='$Session' OR $Session IS NULL)");
                            $selectadminssionrecordcnt = mysqli_num_rows($selectadminssionrecord);
                            $selectadminssionrecordcntrow = mysqli_fetch_assoc($selectadminssionrecord);


                            $selectadminssionrecordpending = mysqli_query($link,"SELECT * FROM `admissionparentdetails` INNER JOIN admissionchilddetails ON admissionparentdetails.ParentDetailID = admissionchilddetails.ParentDetailID INNER JOIN
                            classtemplate ON admissionchilddetails.AdmissionClassID = classtemplate.ClassTemplateID   WHERE  `admissionparentdetails`.InstitutionID='$IntitutionID' AND  admissionchilddetails.Status=0 AND (admissionchilddetails.AdmissionClassID=$classID OR  $classID IS NULL) AND   (admissionchilddetails.CampusID=$campusID OR $campusID IS NULL) AND   (admissionchilddetails.sessionName='$Session' OR $Session IS NULL) ");
                            $selectadminssionrecordcntpending = mysqli_num_rows($selectadminssionrecordpending);
                            $selectadminssionrecordcntrowpending = mysqli_fetch_assoc($selectadminssionrecordpending);



                            $selectadminssionrecordadmitted = mysqli_query($link,"SELECT * FROM `admissionparentdetails` INNER JOIN admissionchilddetails ON admissionparentdetails.ParentDetailID = admissionchilddetails.ParentDetailID INNER JOIN
                            classtemplate ON admissionchilddetails.AdmissionClassID = classtemplate.ClassTemplateID  WHERE    `admissionparentdetails`.InstitutionID='$IntitutionID' AND  (admissionchilddetails.AdmissionClassID=$classID OR  $classID IS NULL) AND   (admissionchilddetails.CampusID=$campusID OR $campusID IS NULL) AND   (admissionchilddetails.sessionName='$Session' OR $Session IS NULL) AND admissionchilddetails.Status=2");
                            $selectadminssionrecordcntadmitted = mysqli_num_rows($selectadminssionrecordadmitted);
                            $selectadminssionrecordcntrowadmitted = mysqli_fetch_assoc($selectadminssionrecordadmitted);


                            
                            $selectadminssionrecord_declined = mysqli_query($link,"SELECT * FROM `admissionparentdetails` INNER JOIN admissionchilddetails ON admissionparentdetails.ParentDetailID = admissionchilddetails.ParentDetailID INNER JOIN
                            classtemplate ON admissionchilddetails.AdmissionClassID = classtemplate.ClassTemplateID  WHERE  `admissionparentdetails`.InstitutionID='$IntitutionID' AND  (admissionchilddetails.AdmissionClassID=$classID OR  $classID IS NULL) AND   (admissionchilddetails.CampusID=$campusID OR $campusID IS NULL) AND   (admissionchilddetails.sessionName='$Session' OR $Session IS NULL) AND admissionchilddetails.Status=1");
                            $selectadminssionrecordcnt_declined = mysqli_num_rows($selectadminssionrecord_declined);
                            $selectadminssionrecordcntrow_declined = mysqli_fetch_assoc($selectadminssionrecord_declined);

                            $totalparent = mysqli_query($link,"SELECT * FROM `admissionparentdetails` WHERE InstitutionID='$IntitutionID'");
                            $totalparentcnt = mysqli_num_rows($totalparent);


                            $selectadminssionrecordtotalstuentwrittingexam = mysqli_query($link,"SELECT  DISTINCT(`cbtquestionsanswers`.`StudentID`)  FROM `admissionparentdetails` INNER JOIN admissionchilddetails ON admissionparentdetails.ParentDetailID = admissionchilddetails.ParentDetailID INNER JOIN
                            classtemplate ON `admissionchilddetails`.AdmissionClassID = `classtemplate`.ClassTemplateID  INNER JOIN `cbtquestionsanswers` ON `admissionchilddetails`.`ChildDetailID` = `cbtquestionsanswers`.`StudentID`  WHERE  `admissionparentdetails`.InstitutionID='$IntitutionID' AND  (admissionchilddetails.AdmissionClassID=$classID OR  $classID IS NULL) AND   (admissionchilddetails.CampusID=$campusID OR $campusID IS NULL) AND   (admissionchilddetails.sessionName='$Session' OR $Session IS NULL) ");
                            $selectadminssionrecordtotalstuentwrittingexamcnt  = mysqli_num_rows( $selectadminssionrecordtotalstuentwrittingexam);
                            $selectadminssionrecordcntrowadmitted = mysqli_fetch_assoc( $selectadminssionrecordtotalstuentwrittingexam);
                
                            $selectadminssionrecordtotalstuent_notwrittingeaxm = mysqli_query($link,"SELECT  DISTINCT(admissionchilddetails.ChildDetailID) FROM `admissionparentdetails` INNER JOIN admissionchilddetails ON admissionparentdetails.ParentDetailID = admissionchilddetails.ParentDetailID INNER JOIN
                            classtemplate ON admissionchilddetails.AdmissionClassID = classtemplate.ClassTemplateID    INNER JOIN `cbtquestionsanswers` ON `admissionchilddetails`.`ChildDetailID` != `cbtquestionsanswers`.`StudentID`  WHERE  `admissionparentdetails`.InstitutionID='$IntitutionID' AND  (admissionchilddetails.AdmissionClassID=$classID OR  $classID IS NULL) AND   (admissionchilddetails.CampusID=$campusID OR $campusID IS NULL) AND   (admissionchilddetails.sessionName='$Session' OR $Session IS NULL) ");
                            $selectadminssionrecordtotalstuent_notwrittingeaxm = mysqli_num_rows($selectadminssionrecordtotalstuent_notwrittingeaxm);
                                


            }else if($usertype == 'admin')
            {
                            $selectadminssionrecord = mysqli_query($link,"SELECT * FROM `admissionparentdetails` INNER JOIN admissionchilddetails ON admissionparentdetails.ParentDetailID = admissionchilddetails.ParentDetailID INNER JOIN
                            classtemplate ON admissionchilddetails.AdmissionClassID = classtemplate.ClassTemplateID INNER JOIN `campus` ON `campus`.`CampusID` = admissionchilddetails.CampusID WHERE `campus`.Admin='$UserID'  AND `admissionparentdetails`.InstitutionID='$IntitutionID' AND  (admissionchilddetails.AdmissionClassID=$classID OR  $classID IS NULL) AND   (admissionchilddetails.CampusID=$campusID OR $campusID IS NULL) AND   (admissionchilddetails.sessionName='$Session' OR $Session IS NULL)");
                            $selectadminssionrecordcnt = mysqli_num_rows($selectadminssionrecord);
                            $selectadminssionrecordcntrow = mysqli_fetch_assoc($selectadminssionrecord);


                            $selectadminssionrecordpending = mysqli_query($link,"SELECT * FROM `admissionparentdetails` INNER JOIN admissionchilddetails ON admissionparentdetails.ParentDetailID = admissionchilddetails.ParentDetailID INNER JOIN
                            classtemplate ON admissionchilddetails.AdmissionClassID = classtemplate.ClassTemplateID INNER JOIN `campus` ON `campus`.`CampusID` = admissionchilddetails.CampusID WHERE `campus`.Admin='$UserID'  AND `admissionparentdetails`.InstitutionID='$IntitutionID' AND  admissionchilddetails.Status=0 AND (admissionchilddetails.AdmissionClassID=$classID OR  $classID IS NULL) AND   (admissionchilddetails.CampusID=$campusID OR $campusID IS NULL) AND   (admissionchilddetails.sessionName='$Session' OR $Session IS NULL) ");
                            $selectadminssionrecordcntpending = mysqli_num_rows($selectadminssionrecordpending);
                            $selectadminssionrecordcntrowpending = mysqli_fetch_assoc($selectadminssionrecordpending);



                            $selectadminssionrecordadmitted = mysqli_query($link,"SELECT * FROM `admissionparentdetails` INNER JOIN admissionchilddetails ON admissionparentdetails.ParentDetailID = admissionchilddetails.ParentDetailID INNER JOIN
                            classtemplate ON admissionchilddetails.AdmissionClassID = classtemplate.ClassTemplateID INNER JOIN `campus` ON `campus`.`CampusID` = admissionchilddetails.CampusID WHERE `campus`.Admin='$UserID'  AND `admissionparentdetails`.InstitutionID='$IntitutionID' AND  (admissionchilddetails.AdmissionClassID=$classID OR  $classID IS NULL) AND   (admissionchilddetails.CampusID=$campusID OR $campusID IS NULL) AND   (admissionchilddetails.sessionName='$Session' OR $Session IS NULL) AND admissionchilddetails.Status=2");
                            $selectadminssionrecordcntadmitted = mysqli_num_rows($selectadminssionrecordadmitted);
                            $selectadminssionrecordcntrowadmitted = mysqli_fetch_assoc($selectadminssionrecordadmitted);


                            
                            $selectadminssionrecord_declined = mysqli_query($link,"SELECT * FROM `admissionparentdetails` INNER JOIN admissionchilddetails ON admissionparentdetails.ParentDetailID = admissionchilddetails.ParentDetailID INNER JOIN
                            classtemplate ON admissionchilddetails.AdmissionClassID = classtemplate.ClassTemplateID INNER JOIN `campus` ON `campus`.`CampusID` = admissionchilddetails.CampusID WHERE `campus`.Admin='$UserID'  AND `admissionparentdetails`.InstitutionID='$IntitutionID' AND  (admissionchilddetails.AdmissionClassID=$classID OR  $classID IS NULL) AND   (admissionchilddetails.CampusID=$campusID OR $campusID IS NULL) AND   (admissionchilddetails.sessionName='$Session' OR $Session IS NULL) AND admissionchilddetails.Status=1");
                            $selectadminssionrecordcnt_declined = mysqli_num_rows($selectadminssionrecord_declined);
                            $selectadminssionrecordcntrow_declined = mysqli_fetch_assoc($selectadminssionrecord_declined);

                            $totalparent = mysqli_query($link,"SELECT * FROM `admissionparentdetails` WHERE InstitutionID='$IntitutionID'");
                            $totalparentcnt = mysqli_num_rows($totalparent);


                            $selectadminssionrecordtotalstuentwrittingexam = mysqli_query($link,"SELECT  DISTINCT(`cbtquestionsanswers`.`StudentID`)  FROM `admissionparentdetails` INNER JOIN admissionchilddetails ON admissionparentdetails.ParentDetailID = admissionchilddetails.ParentDetailID INNER JOIN
                            classtemplate ON `admissionchilddetails`.AdmissionClassID = `classtemplate`.ClassTemplateID  INNER JOIN `cbtquestionsanswers` ON `admissionchilddetails`.`ChildDetailID` = `cbtquestionsanswers`.`StudentID` INNER JOIN `campus` ON `campus`.`CampusID` = admissionchilddetails.CampusID WHERE `campus`.Admin='$UserID'  AND `admissionparentdetails`.InstitutionID='$IntitutionID' AND  (admissionchilddetails.AdmissionClassID=$classID OR  $classID IS NULL) AND   (admissionchilddetails.CampusID=$campusID OR $campusID IS NULL) AND   (admissionchilddetails.sessionName='$Session' OR $Session IS NULL) ");
                            $selectadminssionrecordtotalstuentwrittingexamcnt  = mysqli_num_rows( $selectadminssionrecordtotalstuentwrittingexam);
                            $selectadminssionrecordcntrowadmitted = mysqli_fetch_assoc( $selectadminssionrecordtotalstuentwrittingexam);
                
                            $selectadminssionrecordtotalstuent_notwrittingeaxm = mysqli_query($link,"SELECT  DISTINCT(admissionchilddetails.ChildDetailID) FROM `admissionparentdetails` INNER JOIN admissionchilddetails ON admissionparentdetails.ParentDetailID = admissionchilddetails.ParentDetailID INNER JOIN
                            classtemplate ON admissionchilddetails.AdmissionClassID = classtemplate.ClassTemplateID    INNER JOIN `campus` ON `campus`.`CampusID` = admissionchilddetails.CampusID WHERE NOT EXISTS (SELECT  DISTINCT(cbtquestionsanswers.StudentID)  FROM cbtquestionsanswers WHERE cbtquestionsanswers.ExamType = 'Admission'  AND cbtquestionsanswers.sessionID='$Session') AND `campus`.Admin='$UserID'  AND `admissionparentdetails`.InstitutionID='$IntitutionID' AND  (admissionchilddetails.AdmissionClassID=$classID OR  $classID IS NULL) AND   (admissionchilddetails.CampusID=$campusID OR $campusID IS NULL) AND   (admissionchilddetails.sessionName='$Session' OR $Session IS NULL) ");
                            $selectadminssionrecordtotalstuent_notwrittingeaxm = mysqli_num_rows($selectadminssionrecordtotalstuent_notwrittingeaxm);


                            
                        

            }

           
           
             



            echo '
            <div class="main-cards" style="margin-top: 20px;">
            <div class="row g-3">
                <div class="col-sm-3 col-md-6 col-lg-3">

                    <div class="topSecCards" style="width: 100%; height: 120px">
                        <div style="border: 2px solid #0066FF; height: 100%; border-radius: 8px; padding: 10px;">
                            <div align="center" style="font-size: 60px; color: #0066FF;">
                                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 col-md-6 col-lg-3">
                <div class="topSecCards" style="width: 100%; height: 120px;">
                    <div class="abba_student_card">
                        <div class="row g-2" style="margin-top: 0px;">
                            <div class="col-6" style="padding-top: 15px;">
                                <h6 style="font-size: 12px; margin-top: 5px; margin-left: 10px; color: #ffffff;">Total Applicants</h6>
                                <p></p>
                                <h4 style="margin-left: 10px; color: #ffffff;">'.number_format($selectadminssionrecordcnt).'</h4>
                            </div>
                            <div class="col-6" style="padding-top: 0px;">
                                <div style="margin-right: 0px;">
                                    <p style="font-size: 10.5px; color: #98ff7e;">
                                        <span style="color: white;">'.number_format($selectadminssionrecordcntadmitted).'</span> <br> Admitted Applicants
                                    </p>

                                    <p style="font-size: 10.5px; margin-top: -10px; color: #FFC600">
                                        <span style="color: white;">'.number_format($selectadminssionrecordcntpending).'</span> <br>Pending Applicants
                                    </p>


                                    
                                    <p style="font-size: 10.5px; margin-top: -10px; color: red;">
                                        <span style="color: white;">'.number_format($selectadminssionrecordcnt_declined).'</span> <br>Declined Applicants
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          </div>

                <div class="col-sm-3 col-md-6 col-lg-3">

                    <div class="topSecCards" style="width: 100%; height: 120px;">
                        <div class="row">
                            <div class="col-7">
                                <div class="card" style="border: none; margin-top: 10px; background: #f7fff7; border-radius: 20px;">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <input data-plugin="knob" data-width="70" data-height="70" data-linecap="round"
                                                data-fgColor="#0066FF" value="'.number_format($totalparentcnt).'" data-skin="tron" data-angleOffset="180"
                                                data-readOnly=true data-thickness=".1" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">

                                <h6 style="color: #666666; margin-top: 25px; font-size: 15px;">'.number_format($totalparentcnt).'</h6>
                                <h6 style="font-size: 12px; font-weight: 400; color: #057ff1;">Total Parents</h6>
                                
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
                                            <input data-plugin="knob" data-width="70" data-height="70" data-linecap=round
                                                data-fgColor="#3ceb71" value="27" data-skin="tron" data-angleOffset="180"
                                                data-readOnly=true data-thickness=".1" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">

                                <h6 style="color: #666666; margin-top: 15px; font-size: 15px;">'.number_format($selectadminssionrecordtotalstuentwrittingexamcnt).'</h6>
                                <h6 style="font-size: 12px; font-weight: 400; color: #057ff1;">total taken exam</h6>
                                <h6 style="color: #666666; font-size: 15px;">'.$selectadminssionrecordtotalstuent_notwrittingeaxm.'</h6>
                                <h6 style="font-size: 12px; font-weight: 400; color: #b4030c;">total not taken exam</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>       
</div>
       
        ';

        




?>