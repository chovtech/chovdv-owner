<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    //Include database connection
    include('../../config/config.php');

    $selDeleteID = $_POST['selDeleteID']; //escape string

    $btnclicked = $_POST['btnclicked'];

    if($btnclicked == '1')
    {
        
        $sqlDel1 = ("DELETE FROM `score` WHERE `score`.`ScoreID` = '$selDeleteID'");
        $resultDel1 = mysqli_query($link, $sqlDel1) or die(mysqli_error($link));

        echo 1;
    }
    elseif($btnclicked == '2')
    {
        $sqlDel1 = ("DELETE FROM `psychomotortraits` WHERE `PsychomotorTraitID` = '$selDeleteID'");
        $resultDel1 = mysqli_query($link, $sqlDel1) or die(mysqli_error($link));
    
        echo 2;
    }
    else{
        $sqlDel1 = ("DELETE FROM `affectivetraits` WHERE `AffectiveTraitID` = '$selDeleteID'");
        $resultDel1 = mysqli_query($link, $sqlDel1) or die(mysqli_error($link));

        echo 3;
    }

?>
