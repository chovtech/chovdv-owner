<?php

        include('../../config/config.php');
        
         $lang = $_POST['defaultlang'];
        include('../../../lang/'.$lang.'.php');
      
        $userid  = $_POST['UserID'];
        $token  = $_POST['totaltoken'];
        $tagid  = $_POST['tagid'];
        
        $u_type  = $_POST['u_type'];
        
        if($u_type == 'owner')
        {
            $verify_schoolownerdetails = mysqli_query($link,"SELECT * FROM `agencyorschoolowner` WHERE AgencyOrSchoolOwnerID='$userid'");
            
        }else
        {
            $verify_schoolownerdetails = mysqli_query($link,"SELECT * FROM `affiliate` WHERE AffiliateID='$userid'");
        }
        
        
        
        $verify_schoolownerdetailcnt = mysqli_fetch_assoc($verify_schoolownerdetails);
        
        $tokenid = $verify_schoolownerdetailcnt['TokenID'];
        
        $duration = $verify_schoolownerdetailcnt['TokenDuration'];
        $tagcheck = $verify_schoolownerdetailcnt['TagState'];
        
        $verifytag = mysqli_query($link,"SELECT * FROM `edumestags` WHERE ID='$tagcheck'");
        $verifytagrow = mysqli_fetch_assoc($verifytag);
        
         $tagname =  $verifytagrow['TagName'];
         
         
         
        
         date_default_timezone_set('Africa/Lagos');
          $now_stamp    = strtotime(date("Y-m-d H:i:sa"));
         $gettime = date("H:i:sa",$now_stamp);
         
          $durationverify = strtotime($duration);
          $validateduration = date("H:i:s",$durationverify);
          
        
          
      
          if($now_stamp >  $durationverify)
         {
                        echo 'tokenexpired';  
         }else
         {
             
             
             
             
             
                if($u_type == 'owner')
                {
                    $verifytoken = mysqli_query($link,"SELECT * FROM `agencyorschoolowner` WHERE AgencyOrSchoolOwnerID='$userid' AND TokenID='$token'");
                    
                }else
                {
                   $verifytoken = mysqli_query($link,"SELECT * FROM `affiliate` WHERE AffiliateID='$userid' AND TokenID='$token'");
                }
        
             
               
                $verifytokencnt = mysqli_num_rows($verifytoken);
               
               if($verifytokencnt > 0)
               {
                   
                   
                    if($u_type == 'owner')
                    {
                        
                         $insertsql = mysqli_query($link,"UPDATE `agencyorschoolowner` SET `TagState`='$tagid' WHERE `AgencyOrSchoolOwnerID`='$userid'");

                        $sql = ("SELECT * FROM `userlogin` WHERE UserID='$userid' AND UserType='owner'");
                        
                    }else
                    {
                        
                         $insertsql = mysqli_query($link,"UPDATE `affiliate` SET `TagState`='$tagid' WHERE `AffiliateID`='$userid'");

                         $sql = ("SELECT * FROM `userlogin` WHERE UserID='$userid' AND UserType='affiliate'");
                        
                    }
                        
                       $result = mysqli_query($link, $sql);
                       $row = mysqli_fetch_assoc($result);
                       $row_cnt = mysqli_num_rows($result);

                       $row_cnt = mysqli_num_rows($result);
                  
                           if($row_cnt > 0)
                          {
                               $currentdate = Date('Y-m-d');
                               
                               
                                 $usertype = $row['UserType'];
                                  $username = $row['UserRegNumberOrUsername'];   
                               
                                
                                if($u_type == 'owner')
                                {
                                    
                                     $notifycationinsert = mysqli_query($link,"INSERT INTO `notifications`(`UserID`, `UserType`, `Description`,  `DateandTime`) VALUES ('$userid','owner','Signup token verified successfully','$now_stamp')");//notification email
                                     $update_loginstatus = mysqli_query($link,"UPDATE `userlogin` SET `VerificationStatus`='1' WHERE UserID='$userid' AND UserType='owner'");
                                     
                                     
                                           session_start();
                                          $_SESSION['spgowner'] = $username; 
                                          $_SESSION['spgUserType'] = $usertype;
                                    
                                }else{
                                    
                                     $notifycationinsert = mysqli_query($link,"INSERT INTO `notifications`(`UserID`, `UserType`, `Description`,  `DateandTime`) VALUES ('$userid','affiliate','Signup token verified successfully','$now_stamp')");//notification email
                                     $update_loginstatus = mysqli_query($link,"UPDATE `userlogin` SET `VerificationStatus`='1' WHERE UserID='$userid' AND UserType='affiliate'");
                                     
                                          session_start();
                                          $_SESSION['spgaffiliate'] = $username;
                                          $_SESSION['spgUserType'] = $usertype;
                                    
                                }
                        
                                    
                                   
                                           
                                     
                                          
                                          
                                          echo $usertype = $row['UserType'];
                                      
                           }else
                           {
                                  echo 'invalid login';
                           }
               }else
               {
                          echo 'tokennotmatch';    


                       
               }
               
         }
    //   } 
         
        
        
        
?>