<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../../../config/config.php');

$delete = $_POST['deleteid'];

$delete1 = "DELETE FROM `assetitemlog` WHERE `AssetItemLogID` ='$delete'";

if(mysqli_query($link, $delete1)){
    
} else{
    
}
?>