<?php



            include('../../config/config.php');

            $abba_instituion_id = $_POST['abba_instituion_id'];
        
        
            $select_topicverification =  mysqli_query($link,"SELECT * FROM `curriculumtopic` INNER JOIN  `campus` ON `curriculumtopic`.`CampusID` = `campus`.`CampusID` WHERE `campus`.`InstitutionID`='$abba_instituion_id'");
            $select_topicverification_cnt_result = mysqli_num_rows($select_topicverification);
            $select_topicverification_cnt_resultrow = mysqli_fetch_assoc($select_topicverification);

            if($select_topicverification_cnt_result > 0)
            {
                echo 'notonboarding'; 

            }else
            {
                echo 'onboarding';  
            }






?>