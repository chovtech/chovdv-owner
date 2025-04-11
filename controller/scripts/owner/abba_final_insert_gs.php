<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../config/config.php');

    $abba_get_instituion_id = $_POST['abba_get_instituion_id'];
    $methodtitle = $_POST['methodtitle'];
    $creat_or_edit_checker = $_POST['creat_or_edit_checker'];

    if($creat_or_edit_checker > 0)
    {
        $sqltocheckgradingmethod = mysqli_query($link, "SELECT * FROM `gradingmethod` WHERE `GradingMethodID`='$creat_or_edit_checker' AND `InstitutionID`='$abba_get_instituion_id'");
        $rowtocheckgradingmethod = mysqli_fetch_array($sqltocheckgradingmethod);
        $counttocheckgradingmethod = mysqli_num_rows($sqltocheckgradingmethod);
    
        if ($counttocheckgradingmethod > 0) {
    
            
            $sqltocheckifgradeexists = mysqli_query($link, "UPDATE `gradingmethod` SET `GradingMethodTitle`='$methodtitle' WHERE InstitutionID = '$abba_get_instituion_id' AND `GradingMethodID`='$creat_or_edit_checker'");

            $sqltodeletestructure = mysqli_query($link, "DELETE FROM `gradingstructure` WHERE InstitutionID = '$abba_get_instituion_id' AND `GradingMethodID`='$creat_or_edit_checker'");
    
            $gradearray = explode(',', $_POST['gradearray']);
            $rangestartarray = explode(',', $_POST['rangestartarray']);
            $rangeendarray = explode(',', $_POST['rangeendarray']);
            $remarkarray = explode(',', $_POST['remarkarray']);
            $arrlength = count($gradearray);
        
            for ($x = 0; $x < $arrlength; $x++) {
        
        
                $fuulgrade = $gradearray[$x];
                $fuulrangestart = $rangestartarray[$x];
                $fuulrangeend = $rangeendarray[$x];
                $fuulremark = $remarkarray[$x];
    
                $sqltoinsert = mysqli_query($link, "INSERT INTO `gradingstructure`( `InstitutionID`, `GradingMethodID`, `Grade`,`Remark`, `RangeStart`, `RangeEnd`)VALUES('$abba_get_instituion_id','$creat_or_edit_checker','$fuulgrade','$fuulremark','$fuulrangestart','$fuulrangeend')");
    
                echo 1;
            }
        } 
        else 
        {
    
        }
    
    }
    else
    {
        $sqltocheckgradingmethod = mysqli_query($link, "SELECT * FROM `gradingmethod` WHERE `GradingMethodTitle`='$methodtitle' AND `InstitutionID`='$abba_get_instituion_id'");
        $rowtocheckgradingmethod = mysqli_fetch_array($sqltocheckgradingmethod);
        $counttocheckgradingmethod = mysqli_num_rows($sqltocheckgradingmethod);
    
        if ($counttocheckgradingmethod > 0) {
    
            echo 0;
        } 
        else 
        {
    
            $sqltocheckifgradeexists = mysqli_query($link, "INSERT INTO `gradingmethod`(`InstitutionID`, `GradingMethodTitle`) VALUES ('$abba_get_instituion_id','$methodtitle')");
    
            $lastInsertedId = mysqli_insert_id($link);
    
            $gradearray = explode(',', $_POST['gradearray']);
            $rangestartarray = explode(',', $_POST['rangestartarray']);
            $rangeendarray = explode(',', $_POST['rangeendarray']);
            $remarkarray = explode(',', $_POST['remarkarray']);
            $arrlength = count($gradearray);
        
            for ($x = 0; $x < $arrlength; $x++) {
        
        
                $fuulgrade = $gradearray[$x];
                $fuulrangestart = $rangestartarray[$x];
                $fuulrangeend = $rangeendarray[$x];
                $fuulremark = $remarkarray[$x];
    
                $sqltoinsert = mysqli_query($link, "INSERT INTO `gradingstructure`( `InstitutionID`, `GradingMethodID`, `Grade`,`Remark`, `RangeStart`, `RangeEnd`)VALUES('$abba_get_instituion_id','$lastInsertedId','$fuulgrade','$fuulremark','$fuulrangestart','$fuulrangeend')");
    
                echo 1;
            }
        }
    
    }
?>