<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../../../config/config.php');
$user_id = $_POST["USERID"];
$user_type = $_POST["USERTYPE"];
$ekene_campus = $_POST["ekenecampus"];
$ekene_category = $_POST["ekenecategory"];
$ekene_assetname = $_POST["ekeneassetname"];
$initial_value = $_POST["initialvalue"];
$ekene_quantity = $_POST["ekenequantity"];
$ekene_rate = $_POST["ekenerate"];
$institutionid = $_POST["institution"];
date_default_timezone_set("Africa/Lagos");
$today = date("d/m/Y");
$currentTime = date("H:i:s");
   $mean = "SELECT * FROM `assetitemlog` WHERE `AssetCategoryID`= '$ekene_category' AND `AssetName`='$ekene_assetname'";

    $result = mysqli_query($link, $mean);
            
    $rowcount = mysqli_num_rows($result);
    if( $rowcount > 0)
    {
        echo 1;
    }else
    {

       $insertlog = "INSERT INTO `assetitemlog`(`AssetItemLogID`, `AssetCategoryID`, `AgencyOrSchoolOwnerID`, `InstitutionID`, `CampusID`, `AssetName`, `InitialValue`, `DepreciationRate`, `Quantity`, `Date`, `Time`) 
        VALUES (NULL,'$ekene_category', '$user_id','$institutionid','$ekene_campus','$ekene_assetname','$initial_value','$ekene_rate','$ekene_quantity','$today','$currentTime')";
        if(mysqli_query($link, $insertlog)){
              echo 2; 
        } else{
            echo 0;
        } 
    }


?>