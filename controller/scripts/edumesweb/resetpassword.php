<?php
        include('../../config/config.php');
    
        $UserID  = $_POST['UserID'];
        $password =  $_POST['password'];
        $tagid =  $_POST['tagstateid'];
        $utype =  $_POST['utype'];
        $passwordmd5 = md5($password);
        
        
       
        
        if($utype == 'owner')
        {
             $verify_schoolownerdetails = mysqli_query($link,"SELECT * FROM `agencyorschoolowner` WHERE AgencyOrSchoolOwnerID='$UserID'");
        }else
        {
             $verify_schoolownerdetails = mysqli_query($link,"SELECT * FROM `affiliate` WHERE AffiliateID='$UserID'");
        }
        
       
        $verify_schoolownerdetailcnt = mysqli_num_rows($verify_schoolownerdetails);
        
        
        if($verify_schoolownerdetailcnt > 0)
        {
            
            
            
                        if($utype == 'owner')
                        {
                              $resetpassword = mysqli_query($link,"UPDATE `userlogin` SET `UserPassword`='$passwordmd5', `VerificationStatus`='1' WHERE UserID='$UserID' AND UserType='owner'");
                            
                        }else
                        {
                              $resetpassword = mysqli_query($link,"UPDATE `userlogin` SET `UserPassword`='$passwordmd5', `VerificationStatus`='1' WHERE UserID='$UserID' AND UserType='affiliate'");
                        }
                        
                  
                    
                    if($resetpassword)
                    {
                        
                         if($utype == 'owner')
                         {
                          $verify_schoolownerdetails = mysqli_query($link,"SELECT * FROM `agencyorschoolowner` WHERE AgencyOrSchoolOwnerID='$UserID'");  
                        }else
                        {
                          $verify_schoolownerdetails = mysqli_query($link,"SELECT * FROM `affiliate` WHERE AffiliateID='$UserID'");  
                        }
                        
                         
                        $verify_schoolownerdetailcnt = mysqli_fetch_assoc($verify_schoolownerdetails);
                       
                         $tagcheck = $verify_schoolownerdetailcnt['TagState'];
                        
                        $verifytag = mysqli_query($link,"SELECT * FROM `edumestags` WHERE ID='$tagcheck'");
                        $verifytagrow = mysqli_fetch_assoc($verifytag);
                    
                         $tagname =  $verifytagrow['TagName'];
                        
                            // if($tagname == 'Signed up with Gmail')
                            // {
                                
                               
                                
                                   if($utype == 'owner')
                                    {
                                        $insertsql = mysqli_query($link,"UPDATE `agencyorschoolowner` SET `TagState`='$tagid' WHERE `AgencyOrSchoolOwnerID`='$UserID'");
                                    }else
                                    {
                                      $insertsql = mysqli_query($link,"UPDATE `affiliate` SET `TagState`='$tagid' WHERE `AffiliateID`='$UserID'");  
                                    }
                                 
                                // $update_loginstatus = mysqli_query($link,"UPDATE `userlogin` SET `VerificationStatus`='1' WHERE UserID='$UserID' AND UserType='owner'");
                                
                            // }else
                            // {
                                
                            // }
            
                         
            
                            echo 'success';
                            
            
            
                         
                    }
        }else
        {
            echo 'notfound';
        }
        
        

      

?>