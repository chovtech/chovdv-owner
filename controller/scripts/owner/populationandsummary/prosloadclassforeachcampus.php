

<?php
        
        include('../../../config/config.php');
         $campusID = $_POST['campusID'];

         $prosgetclassforcamp = mysqli_query($link, "SELECT * FROM `classordepartment` WHERE CampusID='$campusID' ORDER BY ClassOrDepartmentName ASC");

         
         $prosgetclassforcampcnt = mysqli_num_rows($prosgetclassforcamp);
         $prosgetclassforcamprow = mysqli_fetch_assoc($prosgetclassforcamp);


         if($prosgetclassforcampcnt > 0)
         {

                echo '<option value="NULL">Select class</option>';


                    do{

                        echo '<option value="'.$prosgetclassforcamprow['ClassOrDepartmentID'].'">'.$prosgetclassforcamprow['ClassOrDepartmentName'].'</option>';

                    }while($prosgetclassforcamprow = mysqli_fetch_assoc($prosgetclassforcamp));
         }else{
                    echo '<option value="NULL">No class found</option>';
         }





?>



          


