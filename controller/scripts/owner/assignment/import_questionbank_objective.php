<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../../config/config.php');

    $campusid = $_POST["campusid"];
    $class_id = $_POST["class_id"];
  

 $select_question_category = $_POST["select_question_category"];
  
    
   
  $select_question_type = $_POST["select_question_type"];

    
 

    // $session = "SELECT * FROM `session` WHERE `sessionStatus` = 1";

    //     $ekeneselect = mysqli_query($link, $session);
    //     $ekene_get_select_details = mysqli_fetch_assoc($ekeneselect);
    //     $ekene_row_select = mysqli_num_rows($ekeneselect);

    //     $ekene_session_name = $ekene_get_select_details['sessionID'];


        // $term = "SELECT * FROM `termorsemester` WHERE `status` = 1";
        // $ekeneterm = mysqli_query($link, $term);
        // $ekene_get_term_details = mysqli_fetch_assoc($ekeneterm);
        // $ekene_row_term = mysqli_num_rows($ekeneterm);
             
        // $ekene_term = $ekene_get_term_details['TermOrSemesterID'];

         $ekene_import = "SELECT * FROM `questionbank`  WHERE `CampusID`= '$campusid' AND `ClassOrDepartmentID` = '$class_id'
     AND `QuestionType`= '$select_question_type' AND `QuestionCategory` = '$select_question_category'";
            $ekene_queryimport = mysqli_query($link, $ekene_import);
            // $ekene_get_import_details = mysqli_fetch_assoc($ekene_queryimport);
          $ekene_import_row_cnt = mysqli_num_rows($ekene_queryimport);

    if ($ekene_import_row_cnt > 0) {
    $cnt = 0;
    while ($ekene_get_import_details = mysqli_fetch_assoc($ekene_queryimport)) {
        $cnt++;

        $ekene_questionbankid = $ekene_get_import_details['QuestionBankID']; 
        $ekene_questionbankname = $ekene_get_import_details['question'];
        $ekene_questionbankoptionA = $ekene_get_import_details['optionA'];
        $ekene_questionbankoptionB = $ekene_get_import_details['optionB'];
        $ekene_questionbankoptionC = $ekene_get_import_details['optionC'];
        $ekene_questionbankoptionD = $ekene_get_import_details['optionD'];
        $ekene_questionbankanswer = $ekene_get_import_details['answer'];
        $question_type = $ekene_get_import_details['QuestionType'];
        $question_category = $ekene_get_import_details['QuestionCategory'];
        
        echo '<div style="display: none;">
        <textarea id="textarea1" rows="4" type="hidden" cols="50">' . $ekene_questionbankid . '</textarea>
        <br><br>
        <textarea id="textarea1" rows="4" cols="50" type="hidden" class="question' . $ekene_questionbankid . '">' . $ekene_questionbankname . '</textarea>
        <br><br>
        <textarea id="textarea1" rows="4" type="hidden" cols="50" class="optionA' . $ekene_questionbankid . '">' . $ekene_questionbankoptionA . '</textarea>
        <br><br>
        <textarea id="textarea1" rows="4" type="hidden" cols="50" class="optionB' . $ekene_questionbankid . '">' . $ekene_questionbankoptionB . '</textarea>
        <br><br>
        <textarea id="textarea1" rows="4" type="hidden" cols="50" class="optionC' . $ekene_questionbankid . '">' . $ekene_questionbankoptionC . '</textarea>
        <br><br>
        <textarea id="textarea1" rows="4" type="hidden" cols="50" class="optionD' . $ekene_questionbankid . '">' . $ekene_questionbankoptionD . '</textarea>
        <br><br>
        <textarea id="textarea1" rows="4" type="hidden" cols="50" class="category' . $ekene_questionbankid . '">' . $question_category . '</textarea>
        <textarea id="textarea1" rows="4" type="hidden" cols="50" class="Answer' . $ekene_questionbankid . '">' . $ekene_questionbankanswer . '</textarea>
        <br><br>
    </div>
    ';
        
       
        echo '<div class="col-lg-3 col-md-12">
        <label class="abba_radio_card">
            <input name="gstemplate" class="abba_radio question_id" type="checkbox" value="' . $ekene_questionbankid . '">
            <input type="hidden"  id="question_id_hidden">
            <span class="plan-details">
                <p class="question_option"><strong>' . $cnt . ':' . '</strong> ' . $ekene_questionbankname . '</p>
                <p>' . $ekene_questionbankoptionA . '</p>
                <p>' . $ekene_questionbankoptionB . '</p>
                <p>' . $ekene_questionbankoptionC . '</p>
                <p>' . $ekene_questionbankoptionD . '</p>';

        if ($question_category === "Objective") {
            echo '<p>Answer: ' . $ekene_questionbankanswer . '</p>';
        }

        echo '</span>
        </label>
    </div>';
    }
} else {
    echo ' <div class="table-Side-Chi topSecCards" style="padding: 50px 50px 50px 50px;">
    <div class="table-responsive emma-load-transloadnofieldaction-history">
    <div align="center" id="emma--selectedoptionalfee-content">
    ';
    
    $pros_select_record_not_found = mysqli_query($link, "SELECT * FROM defaultimages WHERE ImageName='abba-no-record-found-image2'");
    $pros_select_record_not_found_count = mysqli_num_rows($pros_select_record_not_found);
    $pros_select_record_not_found_row = mysqli_fetch_assoc($pros_select_record_not_found);

    if ($pros_select_record_not_found_count > 0) {
        $pros_general_no_record = $pros_select_record_not_found_row['BaseSixtyFour'];
        echo '<img class="mb-1" src="' . $pros_general_no_record . '" width="100" alt="">
              <p>No record found.</p>';
    }

    echo '</div>
    </div>
                 
   </div>';
}

            


?>