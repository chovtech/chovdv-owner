<?php
        include('../../config/config.php');

        $userid  = $_POST['UserID'];
        $campuslocation  = $_POST['campuslocation'];


        
        $select_schoolowner = mysqli_query($link,"SELECT * FROM `institution` WHERE `AgencyOrSchoolOwnerID`='$userid'");
        $select_schoolowner_row = mysqli_fetch_assoc($select_schoolowner);
        $groupschoolID =  $select_schoolowner_row['InstitutionID'];

        $selectverify_campus = mysqli_query($link,"SELECT  * FROM `campus` WHERE CampusName='$campuslocation' AND  InstitutionID='$groupschoolID'"); 
        $selectverify_campuscnt = mysqli_num_rows($selectverify_campus);

        if($selectverify_campuscnt > 0)
        {
           echo 'found';
        }else
        {
          echo 'not found'; 
        }


?>