<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../../../config/config.php');

$ogukwe_inst = $_POST['ogukwe_inst'];
$campus = $_POST['campus'];

$dashboard_sql_category = "SELECT * FROM `assetitemlog` WHERE
`InstitutionID` = '$ogukwe_inst' AND (CampusID = $campus OR $campus IS NULL)";

$user_query_link_category = mysqli_query($link, $dashboard_sql_category);
$user_get_details_category = mysqli_fetch_assoc($user_query_link_category);
$user_row_cnt_category = mysqli_num_rows($user_query_link_category);


$value_sql_category = "SELECT SUM(InitialValue) AS InitialValue FROM `assetitemlog` WHERE
`InstitutionID` = '$ogukwe_inst' AND (CampusID = $campus OR $campus IS NULL)";

$user_query_link_category = mysqli_query($link, $value_sql_category);
$ekene_get_details_category = mysqli_fetch_assoc($user_query_link_category);
$ekene_row_cnt_category = mysqli_num_rows($user_query_link_category);




$totalassetvalue = number_format($ekene_get_details_category['InitialValue']);
$totalasset = number_format($user_row_cnt_category);

echo '<input type="hidden" id="totalassetvalue" value="'.$totalassetvalue.'">
<input type="hidden" id="totalasset" value="'.$totalasset.'">';



?>