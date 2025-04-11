<?php



            include('../../config/config.php');

            $abba_instituion_id = $_POST['abba_instituion_id'];
            $campusID = $_POST['campus_id'];


            $selectsection = mysqli_query($link," SELECT * FROM `section` WHERE `CampusID`='$campusID' ORDER BY SectionName ASC");

            $selectsection_cnt = mysqli_num_rows($selectsection);
            $selectsection_cnt_row = mysqli_fetch_assoc($selectsection);
           
            if($selectsection_cnt  > 0)
            {

                 echo '<option value="0">Select section </option>';

                     do{


                          $SectionName = $selectsection_cnt_row['SectionName'];
                          $SectionID = $selectsection_cnt_row['SectionID'];

                          echo '<option value="'.$SectionID.'">'.$SectionName.'</option>';


                     }while($selectsection_cnt_row = mysqli_fetch_assoc($selectsection));
            }else
            {
                echo '<option value="0">no section found</option>';
            }
            



         


?>