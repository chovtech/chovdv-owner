<?php
        //Include database connection
        include ('../../config/config.php');


        $userid = $_POST['UserID'];
        $campusID = $_POST['campusID'];
        $tagstate = $_POST['tagstate'];

        $ClassNameAddClass = explode(',',$_POST['classID']);
        $selsubmerge = explode(',',$_POST['subjectID']);
        $mergesubtitle = explode(',',$_POST['mergetitlename']);


        $titleverify = $_POST['mergetitlename'];
        $subjectcheck = $_POST['checksubjectverify'];


        if($titleverify == '' || $subjectcheck == 'notfound') 
        {
            if($tagstate == '')
            {

            }else
            {

                
                $updateaistate = mysqli_query($link,"UPDATE `campus` SET `TagState`='$tagstate' WHERE CampusID='$campusID'"); 

            }
            
                echo 'success';

        }else{

            foreach($mergesubtitle as $key =>  $mergesubtitlearr)
            {

                    $mergesubtitlearr;
                    $classidarr = $ClassNameAddClass[$key];


                    $sqlInsertClass = ("INSERT INTO `courseorsubjectmergetitle`(`CampusID`, `ClassOrDepartmentID`, `MergeTitle`) VALUES ('$campusID','$classidarr','$mergesubtitlearr')");
                    $resultInsertClass = mysqli_query($link, $sqlInsertClass);
                    $last_id = mysqli_insert_id($link);

                    
                    foreach($selsubmerge as $subjectidarr)
                    {

                            $subjectidarr;

                            if($subjectidarr == '')
                            {

                            }else
                            {
                                
                                $verifymergequery = mysqli_query($link,"SELECT * FROM `courseorsubjectmerged` WHERE ClassOrDepartmentID='$classidarr' AND SubjectOrCourseID='$subjectidarr' AND CampusID='$campusID'");
                                $verifymergequerycnt = mysqli_num_rows($verifymergequery);

                                if($verifymergequerycnt > 0)
                                {

                                }else
                                {
                                            $sqlInsertClassmerge = ("INSERT INTO `courseorsubjectmerged`(`CampusID`, `CourseOrSubjectMergeID`, `ClassOrDepartmentID`, `SubjectOrCourseID`) VALUES ('$campusID','$last_id','$classidarr','$subjectidarr')");
                                            $resultInsertClassmerge = mysqli_query($link, $sqlInsertClassmerge);
                                }


                            }
                    }
            }

            $updateaistate = mysqli_query($link,"UPDATE `campus` SET `TagState`='$tagstate' WHERE CampusID='$campusID'"); 
            echo 'success';
            
        }
?>   