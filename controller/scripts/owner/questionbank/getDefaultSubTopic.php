<?php   
    include ('../../../config/config.php');
    
  $filter_topic = trim($_POST['filter_topic']);
    
    $sqlGetSubTopic ="SELECT * FROM `edumesscurriculumsubtopic` WHERE CurriculumTopicID ='$filter_topic' ORDER BY SubTopicName ASC";

    $queryGetSubTopic = mysqli_query($link, $sqlGetSubTopic);
    $rowGetSubTopic = mysqli_fetch_assoc($queryGetSubTopic);
    $countGetSubTopic = mysqli_num_rows($queryGetSubTopic);

    if($countGetSubTopic > 0)
    {
        echo '<option value="NULL">Select Topic</option>';
        
        do{
            $SubTopicID = $rowGetSubTopic['CurriculumSubTopic'];
            $SubTopicName = $rowGetSubTopic['SubTopicName'];

            echo '<option value="'.$SubTopicID.'">'.$SubTopicName.'</option>';

        }while($rowGetSubTopic = mysqli_fetch_assoc($queryGetSubTopic));
        
    }
    else{
        echo '<option value="NULL">No Sub-Topic</option>';
    }
?>  