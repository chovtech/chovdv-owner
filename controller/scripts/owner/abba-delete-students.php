<?php
    include('../../config/config.php');
    
    $abba_get_multi_student_id_array = explode(',',$_POST['abba_get_multi_student_id']);


    foreach($abba_get_multi_student_id_array as $abba_get_multi_student_id)
    {
        $abba_get_multi_student_id;
        
        $abba_sql_student_delete_status = ("UPDATE `student` SET `StudentTrashStatus`='1' WHERE `StudentID` = '$abba_get_multi_student_id'");
        $abba_result_student_delete_status = mysqli_query($link, $abba_sql_student_delete_status);
        
        if($abba_result_student_delete_status == true)
        {
    
            $sqlfrom_abba_check_parent = ("SELECT * FROM `student` WHERE StudentID ='$abba_get_multi_student_id' AND ParentID != 0");
            $resultfrom_abba_check_parent = mysqli_query($link, $sqlfrom_abba_check_parent);
            $rowfrom_abba_check_parent = mysqli_fetch_assoc($resultfrom_abba_check_parent);
            $row_cntfrom_abba_check_parent = mysqli_num_rows($resultfrom_abba_check_parent);
    
            if($row_cntfrom_abba_check_parent > 0)
            {
                $abba_get_parent_id = $rowfrom_abba_check_parent['ParentID'];
    
                $sqlfrom_abba_check_student = ("SELECT * FROM `student` WHERE ParentID ='$abba_get_parent_id' AND StudentTrashStatus = 0");
                $resultfrom_abba_check_student = mysqli_query($link, $sqlfrom_abba_check_student);
                $rowfrom_abba_check_student = mysqli_fetch_assoc($resultfrom_abba_check_student);
                $row_cntfrom_abba_check_student = mysqli_num_rows($resultfrom_abba_check_student);
        
                if($row_cntfrom_abba_check_student > 0)
                {
                    
                    echo '<div class="text-success fs-5" align="center" role="alert">
                        <i class="fa fa-check"> Delete Successful</i>
                    </div>';
                }
                else{
        
                    $abba_sql_parent_delete_status = ("UPDATE `parent` SET `ParentTrashStatus`='1' WHERE `ParentID` = '$abba_get_parent_id'");
                    $abba_result_parent_delete_status = mysqli_query($link, $abba_sql_parent_delete_status);
    
    
                    echo '<div class="text-success fs-5" align="center" role="alert">
                        <i class="fa fa-check"> Delete Successful</i>
                    </div>';
                }
            }
            else{
    
                echo '<div class="text-success fs-5" align="center" role="alert">
                    <i class="fa fa-check"> Delete Successful</i>
                </div>';
            }
    
        }
        else
        {
            echo '<div class="text-danger fs-5" align="center" role="alert">
                <i class="fa fa-times"> Delete was not successful</i>  
            </div>';
        }
    }
?>