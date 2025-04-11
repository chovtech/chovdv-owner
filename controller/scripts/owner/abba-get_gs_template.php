<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include('../../config/config.php');

    $abba_instituion_id = $_POST['abba_instituion_id'];

    $abba_sql_check_gradingmethod_template = ("SELECT * FROM `gradingmethodtemplatetitle` ORDER BY Title ASC");
    $abba_result_check_gradingmethod_template = mysqli_query($link, $abba_sql_check_gradingmethod_template);
    $abba_row_check_gradingmethod_template = mysqli_fetch_assoc($abba_result_check_gradingmethod_template);
    $abba_row_cnt_check_gradingmethod_template = mysqli_num_rows($abba_result_check_gradingmethod_template);

    if ($abba_row_cnt_check_gradingmethod_template > 0) {

        $cnt = 0;
        
        do{

            $cnt++;

            $gradingmethod_id = $abba_row_check_gradingmethod_template['id'];

            if($cnt == 1)
            {
                $checked = 'checked';
            }
            else{
                $checked = '';
            }
            echo '<label class="abba_radio_card col-md-12 col-lg-6 mt-3">
                <input name="gstemplate" class="abba_radio" type="radio" '.$checked.' value="'.$gradingmethod_id.'">
                <input id="create'.$gradingmethod_id.'" type="hidden" value="'.$abba_row_check_gradingmethod_template['Title'].'">
                <span class="plan-details">
                    <h6>'.$abba_row_check_gradingmethod_template['Title'].'</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Range</th>
                                <th scope="col">Grade</th>
                                <th scope="col">Remark</th>
                            </tr>
                        </thead>
                        <tbody>';

                            $abba_sql_check_gradingstructuretemplate = ("SELECT * FROM `gradingstructuretemplate` WHERE GradingMethodTemplateTitleID='$gradingmethod_id' ORDER BY RangeStart ASC");
                            $abba_result_check_gradingstructuretemplate = mysqli_query($link, $abba_sql_check_gradingstructuretemplate);
                            $abba_row_check_gradingstructuretemplate = mysqli_fetch_assoc($abba_result_check_gradingstructuretemplate);
                            $abba_row_cnt_check_gradingstructuretemplate = mysqli_num_rows($abba_result_check_gradingstructuretemplate);

                            if($abba_row_cnt_check_gradingstructuretemplate > 0)
                            {
                                $cntloop = 0;
                                do{
                                    $cntloop++;

                                    echo '<tr class="">
                                        <td>'.$abba_row_check_gradingstructuretemplate['RangeStart'].' - '.$abba_row_check_gradingstructuretemplate['RangeEnd'].'</td>
                                        <td>'.$abba_row_check_gradingstructuretemplate['Grade'].'</td>
                                        <td>'.$abba_row_check_gradingstructuretemplate['Remark'].'</td>

                                        <input id="create_rangestart'.$gradingmethod_id.''.$cntloop.'" type="hidden" value="'.$abba_row_check_gradingstructuretemplate['RangeStart'].'">
                                        <input id="create_rangeend'.$gradingmethod_id.''.$cntloop.'" type="hidden" value="'.$abba_row_check_gradingstructuretemplate['RangeEnd'].'">
                                        <input id="create_grade'.$gradingmethod_id.''.$cntloop.'" type="hidden" value="'.$abba_row_check_gradingstructuretemplate['Grade'].'">
                                        <input id="create_remark'.$gradingmethod_id.''.$cntloop.'" type="hidden" value="'.$abba_row_check_gradingstructuretemplate['Remark'].'">
                                    </tr>';
                                }while($abba_row_check_gradingstructuretemplate = mysqli_fetch_assoc($abba_result_check_gradingstructuretemplate));

                                echo '<input id="create_row_cnt'.$gradingmethod_id.'" type="hidden" value="'.$cntloop.'">';
                            }
                            else{

                            }

                        echo '</tbody>
                    </table>
                </span>
            </label>';
        }while($abba_row_check_gradingmethod_template = mysqli_fetch_assoc($abba_result_check_gradingmethod_template));
        
    }
?>