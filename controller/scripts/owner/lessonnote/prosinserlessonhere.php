<?php


                include('../../../config/config.php');

                $userID = $_POST['userID'];
                 $usertype = $_POST['usertype'];
                 $campusID = $_POST['campusID'];
                $prosselectsession = $_POST['prosselectsession'];
                $term = $_POST['term'];
                $classid = $_POST['classid'];
                $subjectID = $_POST['subjectID'];
                $prosfilemanme = $_POST['prosfilemanme'];

                $filecontent = mysqli_real_escape_string($link, $_POST['filecontent']);
                $instutitionID = $_POST['instutitionID'];
                $usertype = $_POST['usertype'];
                $userID = $_POST['userID'];

                $prosloadaudion = $_POST['prosloadaudion'];
                $prosloadvideo = $_POST['prosloadvideo'];

                $longitude = $_POST['longitude'];
                $latitude = $_POST['latitude'];

                $prosloadaudiolink = $_POST['prosloadaudiolink'];
                $prosloadvideolink = $_POST['prosloadvideolink'];

                 $prosnewaudio = $prosloadaudiolink != '' ? $prosloadaudiolink : $prosloadaudion;
                $prosnewvideo = $prosloadvideolink != '' ? $prosloadvideolink : $prosloadvideo;

                $prosgetsubject = mysqli_query($link, "SELECT * FROM `agencyorschoolowner` WHERE AgencyOrSchoolOwnerID='$userID'");
                $prosgetsubjectrow = mysqli_fetch_assoc($prosgetsubject);
                $useractivitylog = $prosgetsubjectrow['AgencyOrSchoolOwnerName'];

                $prosgetsubjectrow = mysqli_query($link, "SELECT * FROM `subjectorcourse` WHERE SubjectOrCourseID='$subjectID'");
                $prosgetsubjectrow = mysqli_fetch_assoc($prosgetsubjectrow);
                $SubjectOrCourseTitle = $prosgetsubjectrow['SubjectOrCourseTitle'];

                $activity_log_inst_camp_id = $campusID;
                $activity_log_userid = $userID;
                $activity_log_usertype = $usertype;
                $activity_log_description = $useractivitylog . ' uploaded lesson note for ' . $SubjectOrCourseTitle;
                $activity_log_longitude = $longitude;
                $activity_log_latitude = $latitude;

                $date_time = date('Y-m-d H:i:s');

                $veryinsectlesonte = mysqli_query($link, "SELECT * FROM `lessonnote` WHERE `CampusID`='$campusID' AND `ClassOrDepartmentID`='$classid' AND `SubjectOrCourseID`='$subjectID' AND `TermOrSemesterID`='$term' AND `sessionName`='$prosselectsession' AND `Status`='0'");
                $veryinsectlesonte_cnt = mysqli_num_rows($veryinsectlesonte);

                if ($veryinsectlesonte_cnt > 0) {
                $insertfile = mysqli_query($link, "UPDATE `lessonnote` SET `File`='$filecontent', `FileType`='$prosfilemanme',  `LessonVideo`='$prosnewvideo', `LessonAudion`='$prosnewaudio', `DateCreate`='$date_time' WHERE  `CampusID`='$campusID' AND `ClassOrDepartmentID`='$classid' AND `SubjectOrCourseID`='$subjectID' AND `TermOrSemesterID`='$term' AND `sessionName`='$prosselectsession' AND `Status`='0'");
                } else {
                $insertfile = mysqli_query($link, "INSERT INTO `lessonnote`(`CampusID`, `ClassOrDepartmentID`, `SubjectOrCourseID`, `TermOrSemesterID`, `sessionName`, `File`, `FileType`, `LessonVideo`, `LessonAudion`, `DateCreate`, `Status`, `DateDeleted`) VALUES ('$campusID','$classid','$subjectID','$term', '$prosselectsession','$filecontent', '$prosfilemanme', '$prosnewvideo', '$prosnewaudio', '$date_time','0','')");
                
                }


                echo mysqli_error($link);

                if ($insertfile) {
                echo 'success';

                insert_activity_log($activity_log_inst_camp_id, $activity_log_userid, $activity_log_usertype,$activity_log_description, $activity_log_longitude, $activity_log_latitude, $link);

                }else
                {
                        echo 'failed';   
                }

    ?>