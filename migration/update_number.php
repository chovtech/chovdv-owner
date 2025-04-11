<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../controller/config/config.php');
    
    include('../controller/config/config2.php');
    
    

    $abba_campus = 47;
    
    $sql_get_classordepartment_new = "SELECT * FROM `student` WHERE InstitutionID='$abba_campus'";
    $query_get_classordepartment_new = mysqli_query($link_abba, $sql_get_classordepartment_new);
    $row_get_classordepartment_new = mysqli_fetch_assoc($query_get_classordepartment_new);
     $count_get_classordepartment_new = mysqli_num_rows($query_get_classordepartment_new);
    
    if($count_get_classordepartment_new > 0)
    {
        
        do{
            
            $StudentID = $row_get_classordepartment_new['StudentID'];
            $StudentPhone = $row_get_classordepartment_new['StudentPhone'];
            
            echo $StudentIDshow = $row_get_classordepartment_new['StudentID'];
            echo ':';
            echo $StudentPhoneshow = $row_get_classordepartment_new['StudentPhone'];
            
            $sql_get_courseorsubjectallocation_old = "SELECT * FROM `student` WHERE CampusID='$abba_campus' AND StudentID='$StudentID' AND StudentPhone LIKE '%E+15%'";
            $query_get_courseorsubjectallocation_old = mysqli_query($link, $sql_get_courseorsubjectallocation_old);
            $row_get_courseorsubjectallocation_old = mysqli_fetch_assoc($query_get_courseorsubjectallocation_old);
            $count_get_courseorsubjectallocation_old = mysqli_num_rows($query_get_courseorsubjectallocation_old);
            
            if($count_get_courseorsubjectallocation_old > 0)
            {
                
                $StudentPhone_new = $row_get_courseorsubjectallocation_old['StudentPhone'];
                
                $sql_get_parent_update = "UPDATE `student` SET `StudentPhone`='$StudentPhone' WHERE `StudentID` = '$StudentID' AND CampusID='$abba_campus'";
                $query_get_parent_update = mysqli_query($link, $sql_get_parent_update);
                    
                if($query_get_parent_update == true)
                {
                    echo 'Updated<br>';
                }
                else
                {
                    echo 'not Updated<br>';
                }
                
            }
            else
            {
                echo 'not exist';
                echo '<br>';
            }
            
        }while($row_get_classordepartment_new = mysqli_fetch_assoc($query_get_classordepartment_new));
        
    }
    else
    {
        echo 1;
    }
    
?>