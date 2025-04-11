<?php
    include('../../config/config.php');
    
    $gradeid = $_POST['gradeid'];
    
    $abba_sql_gradingmethod = ("DELETE FROM `gradingmethod` WHERE `GradingMethodID` = '$gradeid'");
    $abba_result_gradingmethod = mysqli_query($link, $abba_sql_gradingmethod);


    $abba_sql_gradingstructure = ("DELETE FROM `gradingstructure` WHERE `GradingMethodID` = '$gradeid'");
    $abba_result_gradingstructure = mysqli_query($link, $abba_sql_gradingstructure);
    
?>