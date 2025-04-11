<?php
    //Include database connection
    include ('../../config/config.php');

        $campusID = $_POST['campusID'];

         $ClassNameAddClass = $_POST['ClassID'];
        $selsubmerge = explode(',',$_POST['subjectID']);
        $mergesubtitle = $_POST['checkgenralinputmerge'];

    
        $verifymergettle  = mysqli_query($link,"SELECT * FROM `courseorsubjectmergetitle` WHERE CampusID='$campusID' AND ClassOrDepartmentID='$ClassNameAddClass' AND MergeTitle='$mergesubtitle'");
         $verifymergettle_cnt  = mysqli_num_rows($verifymergettle);


        if($verifymergettle_cnt > 0)
        {
                echo 'foundtitle'; 
        }else
        {

                $sqlInsertClass = ("INSERT INTO `courseorsubjectmergetitle`(`CampusID`, `ClassOrDepartmentID`, `MergeTitle`) VALUES ('$campusID','$ClassNameAddClass','$mergesubtitle')");
                $resultInsertClass = mysqli_query($link, $sqlInsertClass);
                
                $last_id = mysqli_insert_id($link);

                
                foreach($selsubmerge as  $subjectmergearr)
                {

                        $subjectmergearr;
                    
                        $verifymergequery = mysqli_query($link,"SELECT * FROM `courseorsubjectmerged` WHERE ClassOrDepartmentID='$ClassNameAddClass' AND SubjectOrCourseID='$subjectmergearr' AND CampusID='$campusID'");
                        $verifymergequerycnt = mysqli_num_rows($verifymergequery);



                        if($verifymergequerycnt > 0)
                        {
                            $deletecourmertitle =  mysqli_query($link,"DELETE FROM `courseorsubjectmerged` WHERE CampusID='$campusID' AND ClassOrDepartmentID='$ClassNameAddClass' AND CourseOrSubjectMergeID='$last_id'");
                        }else
                        {

                            $sqlInsertClassmerge = ("INSERT INTO `courseorsubjectmerged`(`CampusID`, `CourseOrSubjectMergeID`, `ClassOrDepartmentID`, `SubjectOrCourseID`) VALUES ('$campusID','$last_id','$ClassNameAddClass','$subjectmergearr')");
                            $resultInsertClassmerge = mysqli_query($link, $sqlInsertClassmerge);

                            
                        }

                       
                }

                echo 'success';
        }
        



?>   