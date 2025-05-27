<?php
   ob_start();

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include('../../../config/config.php');

    // Get default business info if exists
    header('Content-Type: application/json');

    try {

         $choosed_plain = $_POST['choosed_plain'];
         $UserID = $_POST['UserID'];
         $institutionId = $_POST['institutionId'];
         $UserType = $_POST['UserType'];

         $pros_insert_plan = mysqli_query($link, "UPDATE `institution` SET
          `ActualPlan`='$choosed_plain' WHERE InstitutionID='$institutionId'");

            $success_msg = "Plan failed to be upgraded, pls try again";
          if($pros_insert_plan):$success_msg = "Aiit!! Plan upgraded successfull";
        
          endif;
          ob_clean();
         echo json_encode([
            'status' => 'success',
            'message' => $success_msg
        ]);
    } catch (Exception $e) {

        ob_clean();
        // Return error response
        echo json_encode([
            'success' => false,
            'message' =>'requst failed!! pls try again'
        ]);

    } 

    // End output buffering and send response
    ob_end_flush(); 

