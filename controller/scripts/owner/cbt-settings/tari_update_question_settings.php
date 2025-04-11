<?php
    include('../../../config/config.php');

    $settingsID = trim($_POST['settingsID']);
    $category = trim($_POST['category']);

     // Set the timezone to Nigeria.
     date_default_timezone_set('Africa/Lagos');

     $currentDate = date('Y-m-d H:i:s');
 
     // print_r($questionsAns);
 
     if($category == 'Objective'){
 
        $questions = $_POST['questions'];
        $que = implode(',', $questions);
 
        $questionsAns = $_POST['questionsAns'];
        $queAns = implode(',', $questionsAns);
 
         $update = mysqli_query($link, "UPDATE `cbtsetquestionssettings` 
                                        SET `question` = '$que',
                                            `answer` = '$queAns',
                                            `DateCreated` = '$currentDate'
                                        WHERE cbtsetquestionssettings.cbtsetquestionssettingsID = '$settingsID'");
         if($update){
             echo  'Yes';
 
         }else{
 
             echo  'No';
 
         }
 
     }elseif($category == 'Theory'){
 
         $questions = $_POST['questions2'];
         $que = implode(',', $questions);
 
         $update2 = mysqli_query($link, "UPDATE `cbtsetquestionssettings` 
                                        SET `question` = '$que',
                                            `DateCreated` = '$currentDate'
                                        WHERE `cbtsetquestionssettingsID` = '$settingsID'");
 
        
         if($update2){
             echo   'Yes';
 
         }else{
 
             echo 'No';
 
         }
 
     }elseif($category == 'Both'){

        $questions = $_POST['questions'];
        $que = implode(',', $questions);

        $theoryQuestions = $_POST['questions2'];
        $que2 = implode(',', $theoryQuestions);

        $questionsAns = $_POST['questionsAns'];
        $queAns = implode(',', $questionsAns);


        $update = mysqli_query($link, "UPDATE `cbtsetquestionssettings` 
                                        SET `question` = '$que',
                                            `answer` = '$queAns',
                                            `TheoryQuestion` = '$que2',
                                            `DateCreated` = '$currentDate'
                                        WHERE cbtsetquestionssettings.cbtsetquestionssettingsID = '$settingsID'");
         if($update){
             echo  'Yes';
 
         }else{
 
             echo  'No';
 
         }

     }else{
         echo 'Error';
     }

?>