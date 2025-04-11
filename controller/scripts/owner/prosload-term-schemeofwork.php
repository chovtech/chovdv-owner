<?php

            include('../../config/config.php');

            $abba_instituion_id = $_POST['abba_instituion_id'];
             $campusID = $_POST['campus_id'];


            $select_term_forcampus_cnt = mysqli_query($link,"SELECT * FROM `termalias` WHERE `CampusID`='$campusID'");
            $select_term_forcampus_cntrow = mysqli_num_rows($select_term_forcampus_cnt);
            $select_term_forcampus_cntrow_fetch = mysqli_fetch_assoc($select_term_forcampus_cnt);


            
            $select_term_forcampus_cnt_currentterm = mysqli_query($link,"SELECT * FROM `termorsemester` WHERE status='1'");
            $select_term_forcampus_cntrow_currentterm = mysqli_num_rows($select_term_forcampus_cnt_currentterm);
            $select_term_forcampus_cntrow_fetch_currentterm = mysqli_fetch_assoc($select_term_forcampus_cnt_currentterm);

            $current_termID = $select_term_forcampus_cntrow_fetch_currentterm['TermOrSemesterID'];



            if($select_term_forcampus_cntrow > 0) 
            {

                echo '<option value="0">Select term </option>';

                    do{

                            $selecttermherename = $select_term_forcampus_cntrow_fetch['TermAliasName'];
                            $TermOrSemesterID = $select_term_forcampus_cntrow_fetch['TermOrSemesterID'];
                            $TermAliasID =  $select_term_forcampus_cntrow_fetch['TermAliasID'];
                            
                            if($current_termID == $TermOrSemesterID)
                            {
                                $selectedterm = 'selected';
                            }else
                            {
                                $selectedterm = 'selected';
                            }

                            echo '<option '.$selectedterm.' value="'.$TermOrSemesterID.'">'.$selecttermherename.'</option>';
                            

                    }while($select_term_forcampus_cntrow_fetch = mysqli_fetch_assoc($select_term_forcampus_cnt));

            }else
            {
                echo '<option value="0">No term found </option>';
            }







?>