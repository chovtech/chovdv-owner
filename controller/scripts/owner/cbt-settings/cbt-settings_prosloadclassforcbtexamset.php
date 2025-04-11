<?php

    include('../../../config/config.php');

   
      $campusID = $_POST['campusID'];


      $selectcampus_query = mysqli_query($link,"SELECT * FROM `classordepartment` WHERE CampusID='$campusID' ORDER BY ClassOrDepartmentName ASC");
      $selectcampus_query_cnt = mysqli_num_rows($selectcampus_query);
      $selectcampus_query_cnt_rows = mysqli_fetch_assoc($selectcampus_query);

      if($selectcampus_query_cnt > 0)
      {


               do{

                   $ClassOrDepartmentName = $selectcampus_query_cnt_rows['ClassOrDepartmentName'];
                   $ClassOrDepartmentID = $selectcampus_query_cnt_rows['ClassOrDepartmentID'];


                   echo '<option value="'.$ClassOrDepartmentID.'">'.$ClassOrDepartmentName.'</option>';

               }while($selectcampus_query_cnt_rows = mysqli_fetch_assoc($selectcampus_query));
      }else
      {
           echo '<option value="NULL">no record found</option>';
      }



  ?>