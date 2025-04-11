<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../../../config/config.php');

$Userasset = $_POST["Userasset"];
$Usercategory = $_POST["Usercategory"];
$Uservalue = $_POST["Uservalue"];
$Userquantity = $_POST["Userquantity"];
$userrate = $_POST["userrate"];
$edit_assetid = $_POST["editassetid"];

$user_sql_category = "SELECT * FROM `assetitemlog` WHERE
 `AssetItemLogID` = '$edit_assetid'";

$user_query_link_category = mysqli_query($link, $user_sql_category);
$user_get_details_category = mysqli_fetch_assoc($user_query_link_category);
$user_row_cnt_category = mysqli_num_rows($user_query_link_category);

if ($user_row_cnt_category > 0) {
    $user_sql_update = "UPDATE `assetitemlog` SET
    `AssetName`= '$Userasset', `AssetCategoryID` = '$Usercategory', `InitialValue` = '$Uservalue', `DepreciationRate` = '$userrate',
    `Quantity` = '$Userquantity'
    WHERE `AssetItemLogID` = '$edit_assetid'";

    if (mysqli_query($link, $user_sql_update)) {
       
    } else {
       
    }
} else {
    echo "No record";
}
