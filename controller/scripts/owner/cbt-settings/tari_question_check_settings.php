<?php


    include('../../../config/config.php');

       $campus_id = trim($_POST['campus_id']);
       $sectionID = trim($_POST['sectionID']);
       $term = trim($_POST['term']);
       $topic = trim($_POST['topic']);
       $subjectID = trim($_POST['subjectID']);
       $sub_topic = trim($_POST['sub_topic']);

       $class_id = $_POST['class_id'];

       $InstitutionID = $_POST['tari_get_stored_instituion_id'];

       $campustoimported = $_POST['campustoimported'];


       

       

       foreach($class_id as $key)
       {

        // get Class



        if($campustoimported == 'all')
        {




                    
                $check_Question = "SELECT *
                FROM    `questionbank` 
                WHERE   InstitutionID = '$InstitutionID' 
                AND     SectionID = '$sectionID'
                AND     ClassOrDepartmentID = '$key'
                AND     TermOrSemesterID = '$term' 
                AND     SubjectOrCourseID = '$subjectID'
                AND     (CurriculumTopicID = '$topic' OR $topic IS NULL)
                AND     (CurriculumSubTopic = $sub_topic OR $sub_topic IS NULL)
                ORDER BY `SubjectOrCourseID` ASC ";





        }else
        {



                            
                        $check_Question = "SELECT *
                        FROM    `questionbank` 
                        WHERE   CampusID = '$campustoimported' 
                        AND     SectionID = '$sectionID'
                        AND     ClassOrDepartmentID = '$key'
                        AND     TermOrSemesterID = '$term' 
                        AND     SubjectOrCourseID = '$subjectID'
                        AND     (CurriculumTopicID = '$topic' OR $topic IS NULL)
                        AND     (CurriculumSubTopic = $sub_topic OR $sub_topic IS NULL)
                        ORDER BY `SubjectOrCourseID` ASC ";
            
        }

      

        $query_question = mysqli_query($link,$check_Question);
        $row_question = mysqli_num_rows($query_question);

        if($row_question > 0)
        {
            echo 'Yes';

        }else{
            echo 'No';
        }
    }

    
?>
