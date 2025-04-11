<?php
        include('../../config/config.php');

        $section_check  = explode(',', $_POST['selSchoolFaculty_check']);
        $sectionalias_name   =  explode(',',$_POST['pros_section_alias_name']);
        $pros_load_sectionID_aliasnew   = explode(',',$_POST['pros_load_sectionID_alias']);

        $campusID  = $_POST['campusID'];

        $tagstate  = $_POST['tagstate'];
        $UserID  = $_POST['UserID'];


        
         
        
        foreach($sectionalias_name as $key => $section_check_newaliass_name) 
        {

               $section_check_newaliass_name;
               $prosgetsectalisID = $pros_load_sectionID_aliasnew[$key];
               $pros_section_main =  $section_check[$key];

                $sqlGetSchool = ("SELECT * FROM `section` WHERE CampusID='$campusID' AND SectionListID='$prosgetsectalisID'");
                $resultGetSchool = mysqli_query($link, $sqlGetSchool);
                $rowGetSchool = mysqli_fetch_assoc($resultGetSchool);
                $row_cntGetSchool = mysqli_num_rows($resultGetSchool);

                if($row_cntGetSchool > 0)
                {



                    

                    $sqlInsertIntoScoolFacylty = "UPDATE `section` SET `SectionName`='$section_check_newaliass_name' WHERE `SectionListID`='$prosgetsectalisID' AND `CampusID`='$campusID'";
                    $resultInsertIntoScoolFacylty = mysqli_query($link, $sqlInsertIntoScoolFacylty);
                     

                       $updateaistate = mysqli_query($link,"UPDATE `campus` SET `TagState`='$tagstate' WHERE CampusID='$campusID'"); 
                        
                }else
                {

                    
                    $sqlInsertIntoScoolFacylty = "INSERT INTO `section`(`SectionListID`, `CampusID`,`SectionName`) VALUES ('$prosgetsectalisID','$campusID','$section_check_newaliass_name')";
                    $resultInsertIntoScoolFacylty = mysqli_query($link, $sqlInsertIntoScoolFacylty);


                    $updateaistate = mysqli_query($link,"UPDATE `campus` SET `TagState`='$tagstate' WHERE CampusID='$campusID'"); 
            
                }
        }    


        if($resultInsertIntoScoolFacylty == true)
        {
            echo 'success';
        }else{
            echo 'failed';
        }
            
        



       


     
?>