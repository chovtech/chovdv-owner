<?php
include("../../../config/config.php");


  $assignmentid = $_POST["assignmentid"];
  $campusid = $_POST["campusid"];
  $questionanswer = "SELECT * FROM `assignmentanswer` WHERE `AssignmentSettingsID`= '$assignmentid' AND `CampusID`= '$campusid'";

    $mysqli_viewquery = mysqli_query($link, $questionanswer);

  $number_of_row = mysqli_num_rows($mysqli_viewquery);


  if($number_of_row > 0)
  {
    
    $answerquestion = "dontedit";

  }
    else
    {

      $answerquestion = "editquestion";

    }


  $select_ekene_viewassignment = "SELECT * FROM `assignmentquestion` WHERE  `AssignmentSettingsID`= '$assignmentid' AND `CampusID`= '$campusid' AND deletestatus = '0'";

    $mysqli_viewqueryquestion = mysqli_query($link, $select_ekene_viewassignment);

    $number_of_rowquestion = mysqli_num_rows($mysqli_viewqueryquestion);

    // Create an array to store the categories 
    $questions = array();

    if($number_of_rowquestion  > 0)
    {

            while ($mysqli_fecassco = mysqli_fetch_assoc($mysqli_viewqueryquestion)) {
                
                
                $questions[] = array(
                  'id' => $mysqli_fecassco['AssignmentQuestionID'],
                    'assignmentid' => $mysqli_fecassco['AssignmentSettingsID'],
                    'question' => $mysqli_fecassco['question'],
                    'optionA' => $mysqli_fecassco['optionA'],
                    'optionB' => $mysqli_fecassco['optionB'],
                    'optionC' => $mysqli_fecassco['optionC'],
                    'optionD' => $mysqli_fecassco['optionD'],
                    'answer' => $mysqli_fecassco['answer'],
                    'CampusID' => $mysqli_fecassco['CampusID'],
                    'AssignmentCategory' => $mysqli_fecassco['AssignmentCategory'],
                    'answerquestion' =>$answerquestion
            
                );


              

        } 

        $json_data = json_encode($questions, JSON_PRETTY_PRINT);
        echo $json_data;
    }else
    {

      

        $pros_select_record_not_found = mysqli_query($link, "SELECT * FROM defaultimages WHERE ImageName='abba-no-record-found-image2'");
        $pros_select_record_not_found_count = mysqli_num_rows($pros_select_record_not_found);
        $pros_select_record_not_found_row = mysqli_fetch_assoc($pros_select_record_not_found);

        if ($pros_select_record_not_found_count > 0) {
            $pros_general_no_record = $pros_select_record_not_found_row['BaseSixtyFour'];
            echo '<img class="mb-1" src="' . $pros_general_no_record . '" width="100" alt="">
                <p>No record found.</p>';
        }

    }


?>
