<?php



            include('../../../config/config.php');

            
             $campusID = $_POST['campusID'];
             $SectionID = $_POST['SectionID'];
             
             
             $pros_select_class= mysqli_query($link,"SELECT * FROM `classordepartment` WHERE CampusID='$campusID' AND SectionID='$SectionID'");
             $pros_select_class_cnt = mysqli_num_rows($pros_select_class);
             $pros_select_class_cnt_row = mysqli_fetch_assoc($pros_select_class);
        


           if($pros_select_class_cnt > 0)
           {
                

                   echo '<option selected value="NULL">Select class</option>';   

                   do{


                             $ClassOrDepartmentID = $pros_select_class_cnt_row['ClassOrDepartmentID'];
                             $ClassOrDepartmentName = $pros_select_class_cnt_row['ClassOrDepartmentName'];



                             echo '<option  value="'.$ClassOrDepartmentID.'">'.$ClassOrDepartmentName.'</option>';   

                   }while($pros_select_class_cnt_row = mysqli_fetch_assoc($pros_select_class));


           }else{
                   echo '<option selected value="NULL">no class found</option>';   
           }





?>