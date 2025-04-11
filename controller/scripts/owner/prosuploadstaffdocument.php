<?php

        include('../../config/config.php');
        
        
        $filedata = $_POST['filedata'];
        $staffID = $_POST['staffID'];
        $InstitutionID = $_POST['InstitutionID'];
        $documenttype = $_POST['documenttype'];
        $filename = $_POST['filename'];
        $fileExtension= $_POST['fileExtension'];
        
         $date = date("Y-m-d");
        
        
        
        
        $prosverify_staff = mysqli_query($link,"SELECT * FROM `staffdocument` WHERE UserID='$staffID' AND Documentlisttbl_ID='$documenttype'");
        $prosverify_staffcnt = mysqli_num_rows($prosverify_staff);
        $prosverify_staffcnt_row = mysqli_fetch_assoc($prosverify_staff);
        
        if($prosverify_staffcnt > 0)
        {
            
            
                $updatefile = mysqli_query($link, "UPDATE `staffdocument` SET `DocumentFile`='$filedata',`DocumentFileName`='$filename',`DocumentFileType`='$fileExtension',`Date`='$date'
                WHERE `InstitutionID`='$InstitutionID' AND `UserID`='$staffID' AND `Documentlisttbl_ID`='$documenttype'");
                      
                    if($updatefile == true)
                    {
                          echo '1';
                    }else
                    {
                        echo '2';
                    }
                    
            
        }else
        {
            
          
            
            $updatefile = mysqli_query($link,"INSERT INTO `staffdocument`(`InstitutionID`, `UserID`, `Documentlisttbl_ID`, `DocumentFile`, `DocumentFileName`, `DocumentFileType`, `Date`)
            VALUES ('$InstitutionID','$staffID','$documenttype','$filedata','$filename','$fileExtension','$date')");
            
            
            
                  if($updatefile == true)
                    {
                          echo '1';
                    }else
                    {
                        echo '2';
                    }
            
        
        

        }
        
        
        
      
        
        
       
       

       
        
        
        
?>