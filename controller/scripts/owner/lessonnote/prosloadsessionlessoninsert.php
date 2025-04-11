<?php


                include('../../../config/config.php');

            
                $userID = $_POST['userID'];
                $usertype = $_POST['usertype'];
                 $instutitionID = $_POST['instutitionID'];


            


                 $abba_sql_session = ("SELECT * FROM `session` ORDER BY sessionName DESC");
                 $abba_result_session = mysqli_query($link, $abba_sql_session);
                 $abba_row_session = mysqli_fetch_assoc($abba_result_session);
                 $abba_row_cnt_session = mysqli_num_rows($abba_result_session);

                 if ($abba_row_cnt_session > 0) {
                     do {
                         if ($abba_row_session['sessionStatus'] == '1') {
                             $abba_selected_session = 'selected';
                         } else {
                             $abba_selected_session = '';
                         }
                         echo '<option value="' . $abba_row_session['sessionName'] . '" ' . $abba_selected_session . '>' . $abba_row_session['sessionName'] . '</option>';

                     } while ($abba_row_session = mysqli_fetch_assoc($abba_result_session));
                 } else {
                     echo '<option value="0">No Records Found</option>';
                 }



 ?>