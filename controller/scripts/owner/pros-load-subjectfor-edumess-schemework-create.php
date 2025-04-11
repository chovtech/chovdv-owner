<?php

            include('../../config/config.php');

            $edumess_classID = $_POST['edumess_classID'];

            $selectsubject = mysqli_query($link,"SELECT * FROM `subjectorcourse` WHERE `ClassTemplateID`='$edumess_classID' ORDER  BY SubjectOrCourseTitle ASC");
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
            