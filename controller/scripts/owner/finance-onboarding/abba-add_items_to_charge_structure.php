<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include('../../../config/config.php');

    $abba_instituion_id = $_POST['abba_get_stored_instituion_id'];

    $campus_id = $_POST['campus_id'];

    $abba_display_session = $_POST['abba_display_session'];

    $abba_display_term = $_POST['abba_display_term'];

    $rowData = $_POST['rowData'];

    $user_id = $_POST['user_id'];

    $user_type = $_POST['user_type'];

    $class_id = $_POST['class_id'];

    date_default_timezone_set("Africa/Lagos");

    $date = date("Y-m-d H:i:s");


    foreach ($class_id as $class_id_new) 
    {
        
        $class_id_new;
        
        $catArray = array();
        
        $subCatArray = array();

        // Collect cat_id and sub_cat_id values into the array
        foreach ($rowData as $item_new) {
            
            $subCatId = $item_new['sub_cat_id'];
            $catId = $item_new['cat_id'];
        
            $subCatArray[] = array('sub_cat_id' => $subCatId);
        
            $catArray[] = array('cat_id' => $catId);
        }
        
        $subCatString_check = implode(',', $subCatArray);
        
        if($subCatString_check == '')
        {
            $subCatString = 0;
        }
        else
        {
            $subCatString = $subCatString_check;
        }
        
        $catString_check = implode(',', $catArray);
        
        if($catString_check == '')
        {
            $catString = '';
        }
        else
        {
            $catString = $catString_check;
        }

        $abba_sql_delete_chargestructure = ("DELETE FROM `chargestructure` WHERE `InstitutionID` = '$abba_instituion_id' AND `CampusID` = '$campus_id' AND `Session` = '$abba_display_session' AND `TermOrSemesterID` = '$abba_display_term' AND `ClassOrDepartmentID` = '$class_id_new'");
        $abba_result_delete_chargestructure = mysqli_query($link, $abba_sql_delete_chargestructure);

        $abba_sql_delete_assignoptionalfees = ("DELETE FROM `assignoptionalfees` WHERE `CampusID` = '$campus_id' AND `ClassOrDepartmentID` = '$class_id_new' AND `Session` = '$abba_display_session' AND `TermOrSemesterID` = '$abba_display_term' AND `CategoryID` NOT IN ($catString) AND `SubcategoryID` NOT IN ($subCatString)");
        $abba_result_delete_assignoptionalfees = mysqli_query($link, $abba_sql_delete_assignoptionalfees);

        foreach ($rowData as $item) 
        {
            
            $subCatId = $item['sub_cat_id'];
            $catId = $item['cat_id'];
            $value = $item['value'];
            $isChecked = $item['isChecked'];

            $abba_sql_insert_chargestructure = ("INSERT INTO `chargestructure`(`ChargeStructureID`, `InstitutionID`, `CampusID`, `CategoryID`, `SubcategoryID`, `Session`, `TermOrSemesterID`, `ClassOrDepartmentID`, `Amount`, `Status`) VALUES (NULL,'$abba_instituion_id','$campus_id','$catId','$subCatId','$abba_display_session','$abba_display_term','$class_id_new','$value','$isChecked')");
            $abba_result_insert_chargestructure = mysqli_query($link, $abba_sql_insert_chargestructure);

        }

    }

    $discription = 'Created charges';

    $insert_activity_log = mysqli_query($link,"INSERT INTO `activitylog`(`ActitvityLogID`, `InstitutionIDOrCampusID`, `UserID`, `UserType`, `IpAddress`, `Location`, `Longitude`, `Latitude`, `Description`, `Date/Time`) VALUES (NULL,'$abba_instituion_id','$user_id','$user_type','0','0','0','0','$discription','$date')");

?>