<?php   
    include ('../../../config/config.php');
    
    $filter_class = trim($_POST['filter_classID']);
    $filter_subject = trim($_POST['filter_subject']);
    $filter_region = trim($_POST['filter_region']);
    
    $sqlGetTopic ="SELECT * FROM `edumesscurriculumtopic` WHERE ClassTemplateID ='$filter_class' 
                AND `SubjectOrCourseID` = '$filter_subject' AND `schemeofworkregionID` = '$filter_region' ORDER BY TopicName ASC";

    $queryGetTopic = mysqli_query($link, $sqlGetTopic);
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

