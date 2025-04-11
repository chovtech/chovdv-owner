<?php
        include('../../config/config.php');
        $userid  = $_POST['UserID'];
        $defaullang  = $_POST['defaultlang'];
        $tagstate  = $_POST['tagstate'];

        if($tagstate == '')
        {
                $updatelang = mysqli_query($link,"UPDATE `agencyorschoolowner` SET `DefaultLanguage`='$defaullang' WHERE  `AgencyOrSchoolOwnerID`='$userid'");
               
        }else
        {
          $updatelang = mysqli_query($link,"UPDATE `agencyorschoolowner` SET `DefaultLanguage`='$defaullang',`TagState`='$tagstate' WHERE  `AgencyOrSchoolOwnerID`='$userid'");

        }

  ?>     