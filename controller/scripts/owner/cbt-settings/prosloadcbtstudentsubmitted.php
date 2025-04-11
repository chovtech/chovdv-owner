<?php


    
        include('../../../config/config.php');
    
    
    
         $campusID = $_POST['campusID'];
         $settingsID = $_POST['settingsID'];
        
        
        
        
        
         $prosloadloadexamsettherehere = mysqli_query($link, "SELECT * FROM `cbtsetquestionssettings` WHERE CampusID='$campusID' AND `cbtsetquestionssettingsID`='$settingsID'");
         $prosloadloadexamsetthereherecnt = mysqli_num_rows($prosloadloadexamsettherehere);
         $prosloadloadexamsetthereherecntrow = mysqli_fetch_assoc($prosloadloadexamsettherehere);

        
        if($prosloadloadexamsetthereherecnt > 0)
        
        {
            
            
                      $AssesementType =  $prosloadloadexamsetthereherecntrow['AssesementType'];
                      $AssesementDate_new =  $prosloadloadexamsetthereherecntrow['AssesementDate'];
                      $AssesementStartTime_new =  $prosloadloadexamsetthereherecntrow['AssesementStartTime'];
                      $AssesementEndTime_new =  $prosloadloadexamsetthereherecntrow['AssesementEndTime'];
                      
                      
                      if($AssesementType == 'admin')
                      {
                          
                      }else
                      {
                          
                      
                          
                                    $prosloadquestionhere = mysqli_query($link, "SELECT * FROM `cbtquestionsanswers` INNER JOIN `student` ON `cbtquestionsanswers`.`StudentID` = `student`.`StudentID` 
                                      WHERE  `cbtquestionsanswers`.`cbtsetquestionssettingsID`='$settingsID'
                                      AND  `cbtquestionsanswers`.`CampusID`='$campusID' AND `cbtquestionsanswers`.`objective_status`='1'");
                                      
                                     $prosloadquestionherecnt = mysqli_num_rows($prosloadquestionhere);
                                    $prosloadquestionherecntrow = mysqli_fetch_assoc($prosloadquestionhere);
           
                                             
                                     if($prosloadquestionherecnt > 0)
                                     {
                                         
                                         
                                                echo '<div class="row g-4 mt-1 maincard selectBox-cont">';
                                       
                                       
                                                        do{
                                                            
                                                            
                                                                          $StudentFirstName = $prosloadquestionherecntrow['StudentFirstName'];
                                                                          $StudentLastName = $prosloadquestionherecntrow['StudentLastName'];
                                                                          $StudentPhoto = $prosloadquestionherecntrow['StudentPhoto'];
                                                                          $StudentID = $prosloadquestionherecntrow['StudentID'];
                                                                          $CampusID = $prosloadquestionherecntrow['CampusID'];
                                                                            
                                                                            
                                                                          if($StudentPhoto == '')
                                                                          {
                                                                              
                                                                               $prosloadstudimage = $StudentPhoto;
                                                                              
                                                                          }else
                                                                          {
                                                                              $prosloadstudimage = $StudentPhoto;
                                                                          }
                                                                          
                                                                          
                                                                           
                                                                          
                                                            
                                                                                $studentAnswer = $prosloadquestionherecntrow['studentAnswer'];
                                                                                $Answer = $prosloadquestionherecntrow['Answer'];
                                                                                $sessionID = $prosloadquestionherecntrow['sessionID'];
                                                                                  
                                                                                $TermOrSemesterID = $prosloadquestionherecntrow['TermOrSemesterID'];
                                                                                
                                                                                
                                                                                
                                                                                $proscountCorrectAnswer = explode(',', $studentAnswer);
                                                                                 $proscountAnswer = explode(',',  $Answer);
                                                                                
                                                                                
                                                                              $counttotalobj =  count($proscountCorrectAnswer);
                                                                               
                                                                              $prosstudecorrectanseercount = 0;
                                                                               
                                                                              foreach($proscountCorrectAnswer as $key => $newcorrectquestion)
                                                                              {
                                                                                  
                                                                                 
                                                                                  
                                                                                            $newquestioncorrect = trim($newcorrectquestion);
                                                                                           
                                                                                           $miancorrectquestion = trim($proscountAnswer[$key]);
                                                                                           
                                                                                          if($miancorrectquestion == $newquestioncorrect)
                                                                                          {
                                                                                              
                                                                                                                                                                                              
                                                                                              $prosstudecorrectanseercount+=1;
                                                                                              
                                                                                              
                                                                                          }else
                                                                                          {
                                                                                               
                                                                                          }
                                                                                   
                                                                                   
                                                                                   
                                                                              }
                                                                                
                                                            
                                                                         
                                                                         echo '<div class="col-sm-4 col-md-6 col-lg-4 carditems">
                                                                            <div class="topSecCards" style="width: 100%; box-shadow: #97979733 0px 8px 24px; border-radius: 8px; background: #f7fff7;">
                                                                            <input class="form-check-input eachcheckbox" type="checkbox" data-cam="143" data-mytotalscore="2" data-maxscore="13" id="inlineCheckbox1" data-id="203" data-stud="48712" data-publish="0" value="option1" style="height: 20px; width: 20px;">
                                                                                <div align="center" style="margin-top: 18px;">
                                                                                <img src="'.$prosloadstudimage.'" style="width:70px; border-radius:50px;">
                                                                                
                                                                                    <p style="font-weight: bold; color:black;">'.$StudentLastName.' '.$StudentFirstName.'</p>
                                                                                    <div class="row">
                                                                                        <div class="col-6">
                                                                                        Objective: '.$prosstudecorrectanseercount.'/'.$counttotalobj.'
                                                                                        </div>
                                                                                        
                                                                                        <div class="col-6">';
                                                                                        
                                                                                        // Theory: <span class="thoeryscore48712">0 </span> /10
                                                                                        
                                                                                            //  <div class="mt-2" align="center">
                                                                                            // Total score:2/13
                                                                                            // </div>
                                                                                            
                                                                                            $totalsgottenthree = $prosstudecorrectanseercount;
                                                                                            
                                                                                            
                                                                                      echo '</div>
                                                                                    </div>
                                                                                    
                                                                                   
                                                                                    
                                                                                    
                                                                                </div>
                                                                                <div style="padding: 7px;">
                                                                                    <div style="width: 100%; border-radius: 5px; background-color: #e8ebf1;"><div style="padding: 5px;" align="center">
                                                                                            
                                                                                        
                                                                                            <span class="abba_tooltip">
                                                                                            <span class="abba_tooltiptext">convert assessment</span>
                                                                                            <i class="fa fa-sync" data-exam="'.$settingsID.'" data-session="'.$sessionID.'" data-term="'.$TermOrSemesterID.'" data-mytotalscore="'.$totalsgottenthree.'"  data-status="single" id="prosconvertcbtexamtocahere" data-id="'.$StudentID.'" data-cam="'.$CampusID.'"  style="color: blue;"></i>
                                                                                            </span>
                                                    
                                                                   
                                                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                                                            <span class="abba_tooltip">
                                                                                            <span class="abba_tooltiptext">Rsset assessment</span>
                                                                                            <i class="fas fa-undo" id="prosloadresetexamherebtn" data-status="single"
                                                                                            data-date="'.$AssesementDate_new.'" data-stime="'.$AssesementStartTime_new .'"
                                                                                            data-etime="'.$AssesementEndTime_new .'"
                                                                                            data-exam="'.$settingsID.'" data-id="'.$StudentID.'"  data-cam="'.$CampusID.'" style="color: red;"></i>
                                                                                             
                                                            
                                                            
                                                                                            </span>
                                                                                            
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                    
                                                                            </div>
                                                                        </div>';
                                                    
                                                              
                                                         
                                                            
                                                        }while($prosloadquestionherecntrow = mysqli_fetch_assoc($prosloadquestionhere));
                                         
                                         
                                              echo '</div>';
                                         
                                     }else
                                     {
                                         
                                         
                                         
                                         
                                         
                                            $pros_select_record_not_found = mysqli_query($link, "SELECT * FROM defaultimages WHERE ImageName='abba-no-record-found-image2'");
                                            $pros_select_record_not_found_count = mysqli_num_rows($pros_select_record_not_found);
                                            $pros_select_record_not_found_row = mysqli_fetch_assoc($pros_select_record_not_found);
                        
                                            if ($pros_select_record_not_found_count > 0) {
                                                $pros_general_no_record = $pros_select_record_not_found_row['BaseSixtyFour'];
                                                echo '<center><img class="mb-1" src="' . $pros_general_no_record . '" width="100" alt="">
                                                    <p>No record found.</p></center>';
                                            }
                                                                 
                                     }
                                             
                                             
                                          
                          
                          
                          
                      }
                      
                      
                      
                      
            
            
            
        }else
        {
            
        }
        
        
        
        
        
        
        
        
        
          
        
     ?>