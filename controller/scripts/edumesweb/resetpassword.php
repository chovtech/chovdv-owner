<?php
        include('../../config/config.php');
    
        $UserID  = $_POST['UserID'];
        $password =  $_POST['password'];
        $tagid =  $_POST['tagstateid'];
        $passwordmd5 = md5($password);
        
        
        
        $verify_schoolownerdetails = mysqli_query($link,"SELECT * FROM `agencyorschoolowner` WHERE AgencyOrSchoolOwnerID='$UserID'");
        $verify_schoolownerdetailcnt = mysqli_num_rows($verify_schoolownerdetails);
        
        
        if($verify_schoolownerdetailcnt > 0)
        {
            
            
            
                        
                    $resetpassword = mysqli_query($link,"UPDATE `userlogin` SET `UserPassword`='$passwordmd5', `VerificationStatus`='1' WHERE UserID='$UserID' AND UserType='owner'");
                    
                    if($resetpassword)
                    {
                        
                         $verify_schoolownerdetails = mysqli_query($link,"SELECT * FROM `agencyorschoolowner` WHERE AgencyOrSchoolOwnerID='$UserID'");
                        $verify_schoolownerdetailcnt = mysqli_fetch_assoc($verify_schoolownerdetails);
                       
                         $tagcheck = $verify_schoolownerdetailcnt['TagState'];
                        
                        $verifytag = mysqli_query($link,"SELECT * FROM `edumestags` WHERE ID='$tagcheck'");
                        $verifytagrow = mysqli_fetch_assoc($verifytag);
                    
                         $tagname =  $verifytagrow['TagName'];
                        
                            if($tagname == 'Signed up with Gmail')
                            {
                                
                                $insertsql = mysqli_query($link,"UPDATE `agencyorschoolowner` SET `TagState`='$tagid' WHERE `AgencyOrSchoolOwnerID`='$UserID'"); 
                               $update_loginstatus = mysqli_query($link,"UPDATE `userlogin` SET `VerificationStatus`='1' WHERE UserID='$UserID' AND UserType='owner'");
                                
                            }else
                            {
                                
                            }
            
                         
            
                            echo 'success';
                            
            
            
                         
                    }
        }else
        {
            echo 'notfound';
        }
        
        

      

?>