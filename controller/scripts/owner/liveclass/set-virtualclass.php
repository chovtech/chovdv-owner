<?php

                include('../../../config/config.php');

                $userID = $_POST['userID'];
                $usertype = $_POST['usertype'];
                $campusID = $_POST['campusID'];
                $prosselectsession = $_POST['prosselectsession'];
                $term = $_POST['term'];
                $classid = $_POST['classid'];
                $subjectID = $_POST['subjectID'];
             

               
                $instutitionID = $_POST['instutitionID'];
                $usertype = $_POST['usertype'];
                $userID = $_POST['userID'];

                $start_classdate = $_POST['start_classdate'];
                $start_time = $_POST['start_time'];
                $end_time = $_POST['end_time'];

               

                // $longitude = $_POST['longitude'];
                // $latitude = $_POST['latitude'];

            

                //  $prosnewaudio = $prosloadaudiolink != '' ? $prosloadaudiolink : $prosloadaudion;
                // $prosnewvideo = $prosloadvideolink != '' ? $prosloadvideolink : $prosloadvideo;

                $prosgetsubject = mysqli_query($link, "SELECT * FROM `agencyorschoolowner` WHERE AgencyOrSchoolOwnerID='$userID'");
                $prosgetsubjectrow = mysqli_fetch_assoc($prosgetsubject);
                $useractivitylog = $prosgetsubjectrow['AgencyOrSchoolOwnerName'];

                $prosgetsubjectrow = mysqli_query($link, "SELECT * FROM `subjectorcourse` WHERE SubjectOrCourseID='$subjectID'");
                $prosgetsubjectrow = mysqli_fetch_assoc($prosgetsubjectrow);
                $SubjectOrCourseTitle = $prosgetsubjectrow['SubjectOrCourseTitle'];

                $activity_log_inst_camp_id = $campusID;
                $activity_log_userid = $userID;
                $activity_log_usertype = $usertype;
                $activity_log_description = $useractivitylog . 'Set virtual class  for ' . $SubjectOrCourseTitle;
                // $activity_log_longitude = $longitude;
                // $activity_log_latitude = $latitude;

                $date_time = date('Y-m-d H:i:s');

                $veryinsect_virtual = mysqli_query($link, " SELECT * FROM `virtualclasssettings` WHERE `CampusID`='$campusID' AND `ClassOrDepartmentID`='$classid' AND `SubjectOrCourseID`='$subjectID' AND `TermOrSemesterID`='$term' AND `sessionName`='$prosselectsession' AND `ClassDate`='$start_classdate' AND `StartTime`='$start_time' AND `EndTime`='$end_time'");

                
                $veryinsectvirtul_cnt = mysqli_num_rows($veryinsect_virtual);

                if ($veryinsectvirtul_cnt > 0) {


                    echo 'exist';

                    //  $insertfile = mysqli_query($link, "UPDATE `virtualclasssettings` SET `File`='$filecontent', `FileType`='$prosfilemanme',  `LessonVideo`='$prosnewvideo', `LessonAudion`='$prosnewaudio', `DateCreate`='$date_time' WHERE  `CampusID`='$campusID' AND `ClassOrDepartmentID`='$classid' AND `SubjectOrCourseID`='$subjectID' AND `TermOrSemesterID`='$term' AND `sessionName`='$prosselectsession' AND `Status`='0'");
                
                } else {

                          $insert_class = mysqli_query($link, "INSERT INTO `virtualclasssettings`(`CampusID`, `ClassOrDepartmentID`, `SubjectOrCourseID`, `TermOrSemesterID`, `sessionName`, `ClassDate`, `StartTime`, `EndTime`, `DateDeleted`, `DeleteStatus`) VALUES ('$campusID','$classid','$subjectID','$term', '$prosselectsession','$start_classdate', '$start_time', '$end_time', '','0')");




                          if ($insert_class) {
                            echo 'success';
         
                         // insert_activity_log($activity_log_inst_camp_id, $activity_log_userid, $activity_log_usertype,$activity_log_description, $activity_log_longitude, $activity_log_latitude, $link);
         
                         }else
                         {
                                 echo 'failed';   
                         }
         

                }


                // echo mysqli_error($link);

               
    ?>