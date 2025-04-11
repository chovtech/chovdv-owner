<?php

            include('../../config/config.php');

            $abba_instituion_id = $_POST['abba_instituion_id'];
            $campusID = $_POST['campus_id'];
            $sectionID = $_POST['sectionID'];

            
           
           

            $selectsubject = mysqli_query($link,"SELECT DISTINCT(`subjectorcourse`.`SubjectOrCourseID`),`subjectorcourse`.`SubjectOrCourseTitle` FROM `classordepartment` INNER JOIN `subjectorcourse` ON
           `classordepartment`.`ClassTemplateID` = `subjectorcourse`.`ClassTemplateID` WHERE `classordepartment`.`CampusID`='$campusID' AND `classordepartment`.`SectionID`='$sectionID' ORDER BY `subjectorcourse`.SubjectOrCourseTitle ASC");

           $selectsubject_cnt = mysqli_num_rows($selectsubject);
            $selectsubject_cnt_row = mysqli_fetch_assoc($selectsubject);



            if($selectsubject_cnt > 0)
            {

                 echo '<option value="0">Select subject </option>';

                     do{



                          $SubjectOrCourseTitle =  $selectsubject_cnt_row['SubjectOrCourseTitle'];
                          $SubjectOrCourseID =  $selectsubject_cnt_row['SubjectOrCourseID'];


                          echo '<option value="'.$SubjectOrCourseID.'">'.$SubjectOrCourseTitle.'</option>';



                     }while($selectsubject_cnt_row = mysqli_fetch_assoc($selectsubject));
            }else
            {


                echo '<option value="0">no subject found</option>';
            }
            