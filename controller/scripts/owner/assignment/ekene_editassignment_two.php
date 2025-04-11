<?php


include("../../../config/config.php");

// Assuming $link is your mysqli connection\


    $userID =  $_POST["userID"];
    $usertype =  $_POST["usertype"];


    $cbtornotedit = mysqli_real_escape_string($link, $_POST["cbtornotedit"]);

   $start_dateedit = mysqli_real_escape_string($link, $_POST["start_dateedit"]);

    $submission_dateedit = mysqli_real_escape_string($link, $_POST["submission_dateedit"]);


    $hidden_dateedit = mysqli_real_escape_string($link, $_POST["hidden_dateedit"]);

    $start_timeedit = mysqli_real_escape_string($link, $_POST["start_timeedit"]);

    $end_timeedit = mysqli_real_escape_string($link, $_POST["end_timeedit"]);


   $overall_scoreedit = mysqli_real_escape_string($link, $_POST["overall_scoreedit"]);
    $ekene_titleedit = mysqli_real_escape_string($link, $_POST["ekene_titleedit"]);

    $instrcutionedit = mysqli_real_escape_string($link, $_POST["instrcutionedit"]);

    $assignmentid = mysqli_real_escape_string($link, $_POST["assignmentid"]);

    $ekene_import_campus = mysqli_real_escape_string($link, $_POST["ekene_import_campus"]);

    date_default_timezone_set( 'Africa/Lagos');

    $currentDateTime = date('Y-m-d H:i:s');

    $Description = "Edit assignment title successfully " . $ekene_titleedit;



 
// $select_assignment_values = "SELECT * FROM `assignmentsettings` WHERE 
//     CampusID = '$datacampus' AND AssignmentSettingsID = '$dataassignmentid'";

// $ekene_select_hostel_result = mysqli_query($link, $select_assignment_values);
// $fetch_assignment_result = mysqli_fetch_assoc($ekene_select_hostel_result);
// $numbers_of_rows = mysqli_num_rows($ekene_select_hostel_result);


$ekene_updateassignment = "UPDATE `assignmentsettings` SET `AssignmentTitle`= '$ekene_titleedit', `Overallscore`= '$overall_scoreedit',`AssignmentDate`= '$hidden_dateedit',  `startdate`= '$start_dateedit',
 `submissiondate`= '$submission_dateedit',`AssignmentType`= '$cbtornotedit',`AssignmentStartTime`= '$start_timeedit',  `AssignmentEndTime`= '$end_timeedit', `Instruction`= '$instrcutionedit'   WHERE `AssignmentSettingsID`= '$assignmentid' AND `CampusID`= '$ekene_import_campus'";

$query_updated = mysqli_query($link, $ekene_updateassignment);

   

    

  

   


    
    
  

   
    
   

if ($query_updated  == true) {

        $insert2 = "INSERT INTO `activitylog`(`InstitutionIDOrCampusID`, `UserID`, `UserType`, `IpAddress`, `Location`, `Longitude`,
            `Latitude`, `Description`, `Date/Time`) VALUES ('$ekene_import_campus','$userID','$usertype',
          '0','0','0','0','$Description','$currentDateTime')";

        $insert2sl = mysqli_query($link, $insert2);

    echo '2';
} else {
    echo '4';
}


?>