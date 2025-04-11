<?php

        include('../../config/config.php');
        
         $campusID = explode(',',$_POST['campusID']);
         $UserID = $_POST['UserID'];
         $studentID = explode(',',$_POST['studentID']);
         $currentstatus = $_POST['currentstatus'];
         $classIDnew = $_POST['classID'];



         foreach($campusID as $key => $campusIDnew)
        {
             $campusIDnew;
             $studentIDarr = $studentID[$key];
         

         if($currentstatus  == '2')
         {

            $updatestatus = mysqli_query($link,"UPDATE `admissionchilddetails` SET `Status`='$currentstatus', `ClassAdmitted`='$classIDnew' WHERE CampusID='$campusIDnew' AND ChildDetailID='$studentIDarr'");

         }else
         {

              $updatestatus = mysqli_query($link,"UPDATE `admissionchilddetails` SET `Status`='$currentstatus', `ClassAdmitted`='0' WHERE CampusID='$campusIDnew' AND ChildDetailID='$studentIDarr'");
  
         }



       
         if($updatestatus == true)
         {


              if($currentstatus == '1')
              {


                     echo '<span class=" prosgeneralupdatesatus'.$studentIDarr.'"  id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"  data-status="'.$currentstatus.'"><span type="button"    data-student="' .$studentIDarr. '"  class="btn btn-danger btn-sm text-light" style="font-size:11px;border-radius:7px;"  > 
                     <i class="fa fa-pen " ></i> Declined </span></span>';


              }else if($currentstatus == '2') 
              {


                        echo '<span class=" prosgeneralupdatesatus'.$studentIDarr.'"  id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"  data-status="'.$currentstatus.'"><span type="button"   id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"  data-status="'.$currentstatus.'"  data-student="' .$studentIDarr. '"  class="btn btn-success  btn-sm text-light" style="font-size:11px;border-radius:7px;"  > 
                        <i class="fa fa-pen " ></i> Admitted </span></span>';


              }else if($currentstatus == '0')
              {


                        echo '<span class=" prosgeneralupdatesatus'.$studentIDarr.'"  id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"  data-status="'.$currentstatus.'"><span type="button"   id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"  data-status="'.$currentstatus.'"  data-student="' .$studentIDarr. '"  class="btn btn-warning  btn-sm text-light" style="font-size:11px;border-radius:7px;"  > 
                        <i class="fa fa-pen " ></i> Pending </span></span>';

              }else
              {

               echo 'failed';
              }


         }
     }


?>