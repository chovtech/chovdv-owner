<?php



        include('../../config/config.php');


         $campusID = $_POST['campusID'];

          $select_getclassforpost = mysqli_query($link,"SELECT * FROM `classordepartment` WHERE CampusID='$campusID' ORDER BY ClassOrDepartmentName");
          $select_getclassforpostcnt = mysqli_num_rows($select_getclassforpost);
          $select_getclassforpostcnt_row = mysqli_fetch_assoc($select_getclassforpost);


          if($select_getclassforpostcnt > 0)
          {


                echo '<option value="NULL">Select class</option>';
                do{

                    $ClassOrDepartmentName = $select_getclassforpostcnt_row['ClassOrDepartmentName'];
                    $ClassOrDepartmentID = $select_getclassforpostcnt_row['ClassOrDepartmentID'];

                    echo '<option value="'.$ClassOrDepartmentID.'">'.$ClassOrDepartmentName.'</option>';
                    

                }while($select_getclassforpostcnt_row = mysqli_fetch_assoc($select_getclassforpost));
          }else
          {
               echo '<option value="NULL">No class found</option>';
          }




?>
