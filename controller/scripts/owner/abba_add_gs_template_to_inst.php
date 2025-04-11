<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include('../../config/config.php');

    $abba_instituion_id = $_POST['abba_instituion_id'];

    $selectedTemplate = $_POST['selectedTemplate'];

    $abba_sql_check_gradingmethod_template = ("SELECT * FROM `gradingmethodtemplatetitle` WHERE id = '$selectedTemplate' ORDER BY Title ASC");
    $abba_result_check_gradingmethod_template = mysqli_query($link, $abba_sql_check_gradingmethod_template);
    $abba_row_check_gradingmethod_template = mysqli_fetch_assoc($abba_result_check_gradingmethod_template);
    $abba_row_cnt_check_gradingmethod_template = mysqli_num_rows($abba_result_check_gradingmethod_template);

    if ($abba_row_cnt_check_gradingmethod_template > 0) {

        $gradingmethod_Title = $abba_row_check_gradingmethod_template['Title'];

        $abba_sql_check_gradingmethod = ("SELECT * FROM `gradingmethod` WHERE GradingMethodTitle = '$gradingmethod_Title' ORDER BY GradingMethodTitle ASC");
        $abba_result_check_gradingmethod = mysqli_query($link, $abba_sql_check_gradingmethod);
        $abba_row_check_gradingmethod = mysqli_fetch_assoc($abba_result_check_gradingmethod);
        $abba_row_cnt_check_gradingmethod = mysqli_num_rows($abba_result_check_gradingmethod);

        if($abba_row_cnt_check_gradingmethod > 0)
        {
            echo 0;

        }
        else{
            
            $gradingmethod_id = $abba_row_check_gradingmethod_template['id'];

            $abba_sql_insert_grading_title = ("INSERT INTO `gradingmethod`(`InstitutionID`, `GradingMethodTitle`) VALUES ('$abba_instituion_id','$gradingmethod_Title')");
            $abba_result_insert_grading_title = mysqli_query($link, $abba_sql_insert_grading_title);

            $lastInsertedId = mysqli_insert_id($link);

            $abba_sql_check_gradingstructuretemplate = ("SELECT * FROM `gradingstructuretemplate` WHERE GradingMethodTemplateTitleID='$gradingmethod_id' ORDER BY RangeStart ASC");
            $abba_result_check_gradingstructuretemplate = mysqli_query($link, $abba_sql_check_gradingstructuretemplate);
            $abba_row_check_gradingstructuretemplate = mysqli_fetch_assoc($abba_result_check_gradingstructuretemplate);
            $abba_row_cnt_check_gradingstructuretemplate = mysqli_num_rows($abba_result_check_gradingstructuretemplate);

            if($abba_row_cnt_check_gradingstructuretemplate > 0)
            {
                do{

                    $rangestart = $abba_row_check_gradingstructuretemplate['RangeStart'];
                    $rangeend = $abba_row_check_gradingstructuretemplate['RangeEnd'];
                    $grade = $abba_row_check_gradingstructuretemplate['Grade'];
                    $remark = $abba_row_check_gradingstructuretemplate['Remark'];
                        
                    $abba_sql_insert_grading_title = ("INSERT INTO `gradingstructure`(`InstitutionID`, `GradingMethodID`, `Grade`, `Remark`, `RangeStart`, `RangeEnd`) VALUES ('$abba_instituion_id','$lastInsertedId','$grade','$remark','$rangestart','$rangeend')");
                    $abba_result_insert_grading_title = mysqli_query($link, $abba_sql_insert_grading_title);

                }while($abba_row_check_gradingstructuretemplate = mysqli_fetch_assoc($abba_result_check_gradingstructuretemplate));
            }
            else{

            }

        }

    }

?>