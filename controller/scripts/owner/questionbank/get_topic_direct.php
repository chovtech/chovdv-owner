<?php 
  
    include ('../../../config/config.php');
    
    $term = trim($_POST['term']);
    $campus_id = trim($_POST['campus_id']);
    $subjectID = trim($_POST['subjectID']);
    $sectionID = trim($_POST['sectionID']);
    $classID = trim($_POST['classID']);
    


   
    $sqlGetTerm ="SELECT * FROM `curriculumtopic` WHERE `SubjectOrCourseID`='$subjectID' AND `ClassOrDepartmentID`='$classID ' AND `TermOrSemesterName`='$term' AND `CampusID`='$campus_id'  ORDER BY CurriculumTopicID ASC ";
           

    $queryGetTopic = mysqli_query($link, $sqlGetTerm);
    $rowGetTopic = mysqli_fetch_assoc($queryGetTopic);
    $countGetTopic = mysqli_num_rows($queryGetTopic);

    if($countGetTopic > 0)
    {
        echo '<option value="NULL">Select Topic</option>';
        
        do{
            $TopicID = $rowGetTopic['CurriculumTopicID'];
            $TopicName = $rowGetTopic['TopicName'];

           
            echo '<option value="'.$TopicID.'">'.$TopicName.'</option>';

        }while($rowGetTopic = mysqli_fetch_assoc($queryGetTopic));
        
    }
    else{
        echo '<option value="NULL">No Topic</option>';
    }


?>                