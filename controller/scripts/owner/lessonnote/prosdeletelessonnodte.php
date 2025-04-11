<?php




        include('../../../config/config.php');

    
        $userID = $_POST['userID'];
        $usertype = $_POST['usertype'];
        $campusID = $_POST['CampusID'];
        
        $instutitionID= $_POST['instutitionID'];
        $proslessonnoteID= $_POST['proslessonnoteID'];
        $date_time = date('Y-m-d');

        $proslessonnoteID= $_POST['proslessonnoteID'];
        $longitude= $_POST['longitude'];
        $latitude= $_POST['latitude'];
        $subjectname = $_POST['subjectname'];
        

        $prosgetsubject = mysqli_query($link,"SELECT * FROM `agencyorschoolowner` WHERE AgencyOrSchoolOwnerID='$userID'");

        $prosgetsubjectcnt  = mysqli_num_rows($prosgetsubject);
        $prosgetsubjectrow = mysqli_fetch_assoc($prosgetsubject);


       $useractivitylog =  $prosgetsubjectrow['AgencyOrSchoolOwnerName'];



        $deletelessonnote = mysqli_query($link, "UPDATE `lessonnote`  SET `Status`='1', `DateDeleted`='$date_time' WHERE LessonId='$proslessonnoteID' AND CampusID='$campusID'");

        if( $deletelessonnote == true)
        {

            


                $activity_log_inst_camp_id =  $campusID;
                $activity_log_userid =  $userID;
                $activity_log_usertype =  $usertype;
                $activity_log_description = $subjectname.' lesson note deleted by '. $useractivitylog;
                $activity_log_longitude =  $longitude;
                $activity_log_latitude =  $latitude;


                   echo 'success';

                   insert_activity_log($activity_log_inst_camp_id, $activity_log_userid, $activity_log_usertype,$activity_log_description, $activity_log_longitude, $activity_log_latitude, $link);




        }else
        {

            echo 'failed';
        }





?>