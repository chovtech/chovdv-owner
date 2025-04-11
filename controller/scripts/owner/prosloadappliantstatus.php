<?php

        include('../../config/config.php');
        
         $campusID = $_POST['campusID'];
         $UserID = $_POST['UserID'];
         $studentID = $_POST['studentID'];
         $currentstatus = $_POST['currentstatus'];




         $selectstapplicant = mysqli_query($link,"SELECT * FROM `admissionchilddetails` INNER JOIN `classtemplate` ON `admissionchilddetails`.`AdmissionClassID` = `classtemplate`.`ClassTemplateID` WHERE `admissionchilddetails`.CampusID='$campusID' AND `admissionchilddetails`.ChildDetailID='$studentID'"); 
         $selectstapplicantrow = mysqli_num_rows($selectstapplicant);
         $selectstapplicantrowcnt = mysqli_fetch_assoc($selectstapplicant);



         if($selectstapplicantrow > 0)
         {
             

            $statusnew = $selectstapplicantrowcnt['Status'];
            $AdmissionClassID = $selectstapplicantrowcnt['AdmissionClassID'];
            $ClassTemplateName = $selectstapplicantrowcnt['ClassTemplateName'];


           
            echo '
            <small class="small pb-5" style="font-size:13px;">Kindly change your applicant status below.</small> 
          
                        <div class="form-floating mb-3 fnamevalidate">
                                <div class="select-wrapper">

                                <select data-campus="'.$campusID.'" data-student="'.$studentID.'" style="height:30px; box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3;  border-radius:80px; outline: 1px solid #007bff;" class="form-control form-control-sm proschangestausvaladmin">
                                ';


                                $selectclassname = mysqli_query($link,"SELECT * FROM `classordepartment` WHERE CampusID='$campusID' ORDER BY ClassOrDepartmentName ASC ");
                                $selectclassnamecnt = mysqli_num_rows($selectclassname);
                                $selectclassnamecntrow = mysqli_fetch_assoc($selectclassname);


                                if($selectclassnamecnt > 0)
                                {
                                            


                                          echo '<option value="0">select class</option>';


                                        do{

                                                    $classname = $selectclassnamecntrow['ClassOrDepartmentName'];
                                                    $classID = $selectclassnamecntrow['ClassOrDepartmentName'];

                                                    echo '<option value="'.$classID.'">'.$classname.'</option>';


                                        }while($selectclassnamecntrow = mysqli_fetch_assoc($selectclassname));
                               }else
                               {

                                  echo '<option value="0">No class found for this campus</option>';

                               }
                              

                        echo '</select>
                        </div>
                </div>';

            // Status



         }

?>