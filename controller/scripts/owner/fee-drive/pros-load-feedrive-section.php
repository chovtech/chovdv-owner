<?php



            include('../../../config/config.php');

            
             $campusID = $_POST['campusID'];


           $pros_select_section = mysqli_query($link,"SELECT * FROM `section` WHERE CampusID='$campusID' ORDER BY SectionName ASC");
           $pros_select_section_cnt = mysqli_num_rows($pros_select_section);
           $pros_select_section_cnt_row = mysqli_fetch_assoc($pros_select_section);


           if($pros_select_section_cnt > 0)
           {
                

                   echo '<option selected value="NULL">Select section</option>';   

                   do{


                             $SectionName = $pros_select_section_cnt_row['SectionName'];
                             $SectionID = $pros_select_section_cnt_row['SectionID'];



                             echo '<option  value="'.$SectionID.'">'.$SectionName.'</option>';   

                   }while($pros_select_section_cnt_row = mysqli_fetch_assoc($pros_select_section));


           }else{
                   echo '<option selected value="NULL">no section found</option>';   
           }





?>