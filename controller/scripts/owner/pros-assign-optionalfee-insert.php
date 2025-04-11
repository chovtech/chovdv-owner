<?php
include('../../config/config.php');

$campusID = $_POST['campusID'];
$sessionName = $_POST['sessionName'];
$studentID = $_POST['studentID'];
$ClassID = $_POST['ClassID'];
$term = $_POST['term'];
$InstitutionID = $_POST['prosInstitutionID'];

$subcategoryID = explode(',', $_POST['subcategoryID']);
$catgoryID = explode(',', $_POST['catgoryID']);

foreach ($subcategoryID as $proskey => $subcategoryIDnew) {

    $subcategoryIDnew;
    $catgoryIDarr = $catgoryID[$proskey];

    $verifyassignedupdate = mysqli_query($link, "SELECT * FROM `assignoptionalfees` WHERE
        CampusID='$campusID' AND ClassOrDepartmentID ='$ClassID' AND `Session`='$sessionName' AND `TermOrSemesterID`='$term' AND 
        `CategoryID`='$catgoryIDarr' AND `SubcategoryID`='$subcategoryIDnew' AND `StudentID`='$studentID'");
  $verifyassignedupdatecnt = mysqli_num_rows($verifyassignedupdate);

    if ($verifyassignedupdatecnt > 0) {
        $update_assignoptionalfee = mysqli_query($link, "UPDATE `assignoptionalfees` SET `CategoryID`='$catgoryIDarr',`SubcategoryID`='$subcategoryIDnew' WHERE `InstitutionID`='$InstitutionID' AND `CampusID`='$campusID' AND `StudentID`='$studentID' 
        AND `ClassOrDepartmentID`='$ClassID' AND `TermOrSemesterID`='$term' AND `Session`='$sessionName' AND `CategoryID`='$catgoryIDarr' AND `SubcategoryID`='$subcategoryIDnew'");
    } else {
        $update_assignoptionalfee = mysqli_query($link, "INSERT INTO `assignoptionalfees`(`InstitutionID`, `CampusID`, `ClassOrDepartmentID`, `Session`,
        `TermOrSemesterID`, `CategoryID`,`SubcategoryID`,`StudentID`)
        VALUES ('$InstitutionID','$campusID','$ClassID','$sessionName','$term','$catgoryIDarr','$subcategoryIDnew','$studentID')");
    }
}

if ($update_assignoptionalfee == true) {
    echo 'success';
} else {
    echo 'failed';
}
?>
