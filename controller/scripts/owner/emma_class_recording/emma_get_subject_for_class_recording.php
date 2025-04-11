<?php

 include('../../../config/config.php');

$emma_campus_for_subject = $_POST["emma_send_campus_for_subject"];
$emma_class_id_for_subject = $_POST['emma_send_class_id_for_subject'];


$emma_select_subject = "(SELECT * FROM classordepartment INNER JOIN courseorsubjectallocation ON classordepartment.ClassOrDepartmentID = courseorsubjectallocation.ClassOrDepartmentID AND classordepartment.CampusID = courseorsubjectallocation.CampusID INNER JOIN subjectorcourse ON courseorsubjectallocation.SubjectOrCourseID=subjectorcourse.SubjectOrCourseID WHERE classordepartment.CampusID= '$emma_campus_for_subject' AND courseorsubjectallocation.CampusID='$emma_campus_for_subject' AND classordepartment.ClassOrDepartmentID = '$emma_class_id_for_subject' AND courseorsubjectallocation.ClassOrDepartmentID = '$emma_class_id_for_subject' ORDER BY SubjectOrCourseTitle ASC )";

$emma_select_subject_query = mysqli_query($link, $emma_select_subject);
$emma_select_subject_fetch = mysqli_fetch_assoc($emma_select_subject_query);
$emma_select_subject_rows = mysqli_num_rows($emma_select_subject_query);

echo '<option value="NULL">Select subject</option>';

if($emma_select_subject_rows > 0)
{   
    do{
    
        echo $emma_get_subject_id = $emma_select_subject_fetch['SubjectOrCourseID'];
        $emma_get_subject = $emma_select_subject_fetch['SubjectOrCourseTitle'];


        echo '<option value="'.$emma_get_subject_id.'">'.$emma_get_subject.'</option>';
        
    }while($emma_select_subject_fetch = mysqli_fetch_assoc($emma_select_subject_query));
}
else{

}

?>