<?php

        include('../../config/config.php');
        
        
        $foldertype = $_POST['foldertype'];
        $staffID = $_POST['staffID'];
        $InstitutionID = $_POST['InstitutionID'];
        
        
         $prosverify_staff = mysqli_query($link,"SELECT * FROM `staffdocument` WHERE InstitutionID='$InstitutionID' AND UserID='$staffID' AND Documentlisttbl_ID='$foldertype'");
        $prosverify_staffcnt = mysqli_num_rows($prosverify_staff);
        $prosverify_staffcnt_row = mysqli_fetch_assoc($prosverify_staff);
        
        
        if($prosverify_staffcnt > 0)
        {
            
            
            $prosdocument = $prosverify_staffcnt_row['DocumentFile'];
            $DocumentFileType = $prosverify_staffcnt_row['DocumentFileType'];
            
           echo  '<textarea hidden="hidden" id="prosloadimagebase64content" name="myTextarea" rows="4" cols="50">'.$prosdocument.'</textarea>
           <input type="hidden" id="prosloadstaffdocument_type" value="'.$DocumentFileType.'"> ';
          
          
              
          

            
        }else
        {
            
             echo  '<textarea hidden="hidden" id="prosloadimagebase64content" name="myTextarea" rows="4" cols="50"></textarea>
           <input type="hidden" id-"prosloadstaffdocument_type">
          
           ';
            
        }
        
      
      
        
        
       

       
        
        
        
?>