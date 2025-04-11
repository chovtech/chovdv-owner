
<?php


                    include('../../config/config.php');
                        
                    $formattedinput = implode(',', $_POST['formattedinput']);
                    $studentID = $_POST['studentID'];
                    $CampusID = $_POST['CampusID'];
                    
                    $fullnumber = str_replace('+', '', $formattedinput);
                    
                    
                    
                      $select_parent_no = mysqli_query($link,"SELECT * FROM `student` INNER JOIN `parent` ON `student`.`ParentID` = `parent`.`ParentID` WHERE `student`.`StudentID`='$studentID'");
                      $select_parent_norow = mysqli_num_rows($select_parent_no);
                      $select_parent_norow_row =  mysqli_fetch_assoc($select_parent_no);
                    
                    
                    $ParentID =  $select_parent_norow_row['ParentID']; 
                    
                    $insertquery = mysqli_query($link,"UPDATE `parent` SET `ParentWhatsappNumber`='$fullnumber' WHERE `ParentID`='$ParentID'");
                    
                    
                    if($insertquery == true)
                    {
                        echo 1;
                        
                    }else
                    {
                        
                         echo 2;
                        
                    }
                  
                    
                    
              
?>