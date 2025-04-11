<?php

    include('../../../config/config.php');

   
      $campusID = $_POST['campusID'];
      $classid = $_POST['classid'];
      



     


           $select_subject_sql = mysqli_query($link, "SELECT DISTINCT `subjectorcourse`.`SubjectOrCourseID`,`subjectorcourse`.`SubjectOrCourseTitle` FROM `courseorsubjectallocation` INNER JOIN `subjectorcourse` ON `courseorsubjectallocation`.`SubjectOrCourseID` = `subjectorcourse`.`SubjectOrCourseID` WHERE `courseorsubjectallocation`.`ClassOrDepartmentID`='$classid' AND `courseorsubjectallocation`.`CampusID`='$campusID' ORDER BY `subjectorcourse`.`SubjectOrCourseTitle` ASC");


           $select_subject_sql_cnt = mysqli_num_rows($select_subject_sql);
           $select_subject_sql_cntfetch = mysqli_fetch_assoc($select_subject_sql);



             if(  $select_subject_sql_cnt > 0)
             {


                     echo '<option value="NULL">Select Subject</option>';
                        do{

                                $SubjectOrCourseTitle =  $select_subject_sql_cntfetch['SubjectOrCourseTitle'];
                              $SubjectOrCourseID =  $select_subject_sql_cntfetch['SubjectOrCourseID'];


                           echo '<option value="'.$SubjectOrCourseID.'">'.$SubjectOrCourseTitle.'</option>';

               }while($select_subject_sql_cntfetch = mysqli_fetch_assoc($select_subject_sql));
             }else{


                echo '<option value="NULL">no record found</option>';
             }






  ?>