<?php   
    include ('../../../config/config.php');
    
    $filter_class = trim($_POST['filter_class']);
   
    

    $subject ="SELECT * FROM `subjectorcourse` WHERE ClassTemplateID ='$filter_class'";

  
    $querySubject = mysqli_query($link, $subject);
    $rowGetSubject = mysqli_fetch_assoc($querySubject);
    $countGetSubject= mysqli_num_rows($querySubject);

    if($countGetSubject > 0)
    {
        echo '<option value="NULL">Select Subject</option>';
        
        do{
            $subjectID = $rowGetSubject['SubjectOrCourseID'];
            $subjectName = $rowGetSubject['SubjectOrCourseTitle'];

            echo '<option value="'.$subjectID.'">'.$subjectName.'</option>';

        }while($rowGetSubject = mysqli_fetch_assoc($querySubject));
        
    }
    else{
        echo '<option value="NULL">No Subject</option>';
    }
?>                