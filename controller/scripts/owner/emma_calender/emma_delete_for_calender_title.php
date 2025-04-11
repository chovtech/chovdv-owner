<?php

include("../../../config/config.php");

$emmadeleteinstitution = $_POST['emmaeditinstitutiondelete'];
$emmadeletedataid = $_POST['emmaedittitle'];
$emma_date_for_delete = $_POST['emmadeletedate'];

$deleteforcalender = "DELETE FROM `calender` WHERE `sn` = '$emmadeletedataid'";
$deleteforcalenderquery = mysqli_query($link, $deleteforcalender);


if($deleteforcalenderquery == 'true'){
    echo 1;
}else{
    echo 2;
}

?>