<?php

                include('../../../config/config.php');

                $userID = $_POST['userID'];
                $usertype = $_POST['usertype'];

                $campusID = explode(',',$_POST['campusID']);
                $classid = explode(',',$_POST['classid']);
                $subjectID = explode(',',$_POST['subjectID']);
                $virtual_ID = explode(',', $_POST['virtual_ID']);
                
               
                $instutitionID = $_POST['instutitionID'];

              

                // $longitude = $_POST['longitude'];
                // $latitude = $_POST['latitude'];

            

                //  $prosnewaudio = $prosloadaudiolink != '' ? $prosloadaudiolink : $prosloadaudion;
                // $prosnewvideo = $prosloadvideolink != '' ? $prosloadvideolink : $prosloadvideo;

                $prosgetsubject = mysqli_query($link, "SELECT * FROM `agencyorschoolowner` WHERE AgencyOrSchoolOwnerID='$userID'");
                $prosgetsubjectrow = mysqli_fetch_assoc($prosgetsubject);
                $useractivitylog = $prosgetsubjectrow['AgencyOrSchoolOwnerName'];

                $date_time = date('Y-m-d H:i:s');

                $success_count = 0;

                foreach($campusID as $key =>   $campusIDnew)
                {

                    $classidnew =  $classid[$key];
                    $subjectIDnew =   $subjectID[$key];
                    $virtual_IDnew =   $virtual_ID[$key];

                    $prosgetsubjectrow = mysqli_query($link, "SELECT * FROM `subjectorcourse` WHERE SubjectOrCourseID='$subjectIDnew'");
                    $prosgetsubjectrow = mysqli_fetch_assoc($prosgetsubjectrow);
                    $SubjectOrCourseTitle = $prosgetsubjectrow['SubjectOrCourseTitle'];
    
                    $activity_log_inst_camp_id = $campusIDnew;
                    $activity_log_userid = $userID;
                    $activity_log_usertype = $usertype;

                    $activity_log_description = $useractivitylog . 'Deleted a virtual class set for ' . $SubjectOrCourseTitle;
                    // $activity_log_longitude = $longitude;
                    // $activity_log_latitude = $latitude;
        
        
                        $delete_class = mysqli_query($link, "UPDATE `virtualclasssettings` SET DateDeleted='$date_time', DeleteStatus='1' WHERE VirtualID='$virtual_IDnew' AND CampusID='$campusIDnew'");
        
        
                        if( $delete_class == true)
                        {
                            $success_count=+1;
                            // insert_activity_log($activity_log_inst_camp_id, $activity_log_userid, $activity_log_usertype,$activity_log_description, $activity_log_longitude, $activity_log_latitude, $link);
        
                        }else{
                            
                        }

                }

                if($success_count > 0)
                {
                    echo 'success';
                }else
                {
                     echo 'failed';
                }


               
?>