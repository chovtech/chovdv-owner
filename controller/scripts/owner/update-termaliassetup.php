<?php
    //Include database connection
    include ('../../config/config.php');

    $userid = $_POST['UserID'];
    $campusID = $_POST['campusID'];
    $tagstate = $_POST['tagstate'];
   //  $sessioname = $_POST['sessioname'];
    $termID = explode(',',$_POST['termID']);
    $termalias = explode(',',$_POST['termnamealias']);

   foreach($termalias as $key  =>   $termaliasnew)
   {

         $nealiasgotten =   mysqli_real_escape_string($link,$termaliasnew);
         $termIDarr =  $termID[$key];

         $verifyterm = mysqli_query($link,"SELECT * FROM `termalias` WHERE TermOrSemesterID='$termIDarr' AND CampusID='$campusID'");
         $verifytermcnt = mysqli_num_rows($verifyterm);


         if($verifytermcnt > 0)
         {
            $insert_termquery =  mysqli_query($link,"UPDATE `termalias` SET `TermAliasName`='$nealiasgotten' WHERE `TermOrSemesterID`='$termIDarr' AND `CampusID`='$campusID'");   

         }else
         {

            $insert_termquery =  mysqli_query($link," INSERT INTO `termalias`(`TermAliasName`, `TermOrSemesterID`, `CampusID`) VALUES ('$nealiasgotten','$termIDarr','$campusID')");  
           
         }

   }

        // if successfully 
        if($insert_termquery == true)
        {

            if($tagstate == '')
            {

            }else
            {
               $updateaistate = mysqli_query($link,"UPDATE `campus` SET `TagState`='$tagstate' WHERE CampusID='$campusID'"); 
            }
               
               echo 'success';
        }
        // if successfully 
    
?>