<?php   
    include ('../../../config/config.php');
    
    $campus_id = trim($_POST['campus_id']);
    $topic = trim($_POST['topic']);
   

    $sqlGetSubTopic ="SELECT * FROM `curriculumsubtopic` WHERE `CampusID` ='$campus_id' 
                AND `CurriculumTopicID` = '$topic' ORDER BY SubTopicName ASC";

    $queryGetSubTopic = mysqli_query($link,$sqlGetSubTopic);
    $rowGetSubTopic = mysqli_fetch_assoc($queryGetSubTopic);
    $countGetSubTopic = mysqli_num_rows($queryGetSubTopic);

    if($countGetSubTopic > 0)
    {
        echo '<option value="NULL">Select Sub-Topic</option>';
        
        do{
            $TopicID = $rowGetSubTopic['CurriculumTopicID'];
            $TopicName = $rowGetSubTopic['SubTopicName'];

            echo '<option value="'.$TopicID.'">'.$TopicName.'</option>';

        }while($rowGetTopic = mysqli_fetch_assoc($queryGetTopic));
        
    }
    else{
        echo '<option value="NULL">No Sub-Topic</option>';
    }
?>                