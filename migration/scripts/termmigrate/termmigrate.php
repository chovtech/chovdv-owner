<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../../controller/config/config.php');
    
    include('../../../controller/config/config2.php');

    $sql_get_classordepartment_new = "SELECT * FROM `campus`";
    $query_get_classordepartment_new = mysqli_query($link, $sql_get_classordepartment_new);
    $row_get_classordepartment_new = mysqli_fetch_assoc($query_get_classordepartment_new);
    $count_get_classordepartment_new = mysqli_num_rows($query_get_classordepartment_new);
    
    if($count_get_classordepartment_new > 0)
    {
        
        do{
            
            $campid = $row_get_classordepartment_new['CampusID'];
            
            $sql_get_subjectorcourse_old = "INSERT INTO `termalias`(`TermAliasID`, `TermAliasName`, `TermOrSemesterID`, `CampusID`) 
            VALUES (NULL,'First Term','1','$campid')";
            $query_get_subjectorcourse_old = mysqli_query($link, $sql_get_subjectorcourse_old);
            
            $sql_get_subjectorcourse_old2 = "INSERT INTO `termalias`(`TermAliasID`, `TermAliasName`, `TermOrSemesterID`, `CampusID`) 
            VALUES (NULL,'Second Term','2','$campid')";
            $query_get_subjectorcourse_old2 = mysqli_query($link, $sql_get_subjectorcourse_old2);
            
            $sql_get_subjectorcourse_old3 = "INSERT INTO `termalias`(`TermAliasID`, `TermAliasName`, `TermOrSemesterID`, `CampusID`) 
            VALUES (NULL,'Third Term','3','$campid')";
            $query_get_subjectorcourse_old3 = mysqli_query($link, $sql_get_subjectorcourse_old3);
                    
        }while($row_get_classordepartment_new = mysqli_fetch_assoc($query_get_classordepartment_new));
    }   
?>