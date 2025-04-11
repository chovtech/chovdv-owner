<?php

include('../../config/config.php');

$campusID = explode(',',$_POST['campusID']);
$UserID = $_POST['UserID'];
$studentID = explode(',',$_POST['studentID']);
$InstitutionID = explode(',',$_POST['InstitutionID']);

$date = date("Y-m-d");
$newDate = date("Y-m-d", strtotime($date . " +7 days"));


foreach($campusID as $key => $campusIDnew)
{
     $campusIDnew;
     $studentIDarr = $studentID[$key];
    $InstitutionIDarr = $InstitutionID[$key];



            $select_admissionchilddetails = "SELECT * FROM `admissionchilddetails` WHERE `CampusID`='$campusIDnew' AND `ChildDetailID`='$studentIDarr'";
            $select_admissionchilddetails_result = mysqli_query($link, $select_admissionchilddetails);
            $select_admissionchilddetails_result_row = mysqli_fetch_assoc($select_admissionchilddetails_result);
            $select_admissionchilddetails_result_cnt = mysqli_num_rows($select_admissionchilddetails_result);


            if ($select_admissionchilddetails_result_cnt > 0) {
                $parent_id = $select_admissionchilddetails_result_row['ParentDetailID'];

                $select_admissionparentcheck = "SELECT * FROM `admissionchilddetails` WHERE `CampusID`='$campusIDnew' AND `ParentDetailID`='$parent_id' AND TrashStatus != '1'";
                $select_admissionparentcheck_result = mysqli_query($link, $select_admissionparentcheck);
                // $select_admissionparentcheck_result_row = mysqli_fetch_assoc($select_admissionparentcheck_result);
                $select_admissionparentcheck_result_cnt = mysqli_num_rows($select_admissionparentcheck_result);

                if ($select_admissionparentcheck_result_cnt > 1) {

                    $updateapplicant = mysqli_query($link,"UPDATE `admissionchilddetails` SET `TrashStatus`='1', `TrashDate`='$date' WHERE `ChildDetailID`='$studentIDarr'");

                
                } else {

                    $updateapplicant = mysqli_query($link,"UPDATE `admissionchilddetails` SET `TrashStatus`='1', `TrashDate`='$newDate' WHERE `ChildDetailID`='$studentIDarr'");
                    $upateparent = mysqli_query($link,"UPDATE `admissionparentdetails` SET `TrashStatus`='1',`TrashDate`='$newDate' WHERE ParentDetailID='$parent_id'");


                    
                }
            } else {
                echo 'not found';
            }


}






if($updateapplicant == true)
{
    echo 'success';
}else
{
    echo 'failed';
}


?>