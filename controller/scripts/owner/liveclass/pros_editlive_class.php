<?php

                include('../../../config/config.php');

                $userID = $_POST['userID'];
                $usertype = $_POST['usertype'];
                $campusID = $_POST['campusID'];
               
                $classid = $_POST['classid'];
                $subjectID = $_POST['subjectID'];


               
                $start_classdate = $_POST['start_classdate'];
                $start_time = $_POST['start_time'];
                $end_time = $_POST['end_time'];
               
                $instutitionID = $_POST['instutitionID'];

                $virtual_ID = $_POST['virtual_ID'];
                

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
                $activity_log_description = $useractivitylog . 'Editted a virtual class set for ' . $SubjectOrCourseTitle;
                // $activity_log_longitude = $longitude;
                // $activity_log_latitude = $latitude;

                $date_time = date('Y-m-d H:i:s');


                $delete_class = mysqli_query($link, "UPDATE `virtualclasssettings` SET ClassDate='$start_classdate', StartTime='$start_time', `EndTime`='$end_time' WHERE VirtualID='$virtual_ID ' AND CampusID='$campusID'");


                if( $delete_class == true)
                {
                    echo 'success';
         
                         // insert_activity_log($activity_log_inst_camp_id, $activity_log_userid, $activity_log_usertype,$activity_log_description, $activity_log_longitude, $activity_log_latitude, $link);

                }else{
                    echo 'failed';
                }
?>