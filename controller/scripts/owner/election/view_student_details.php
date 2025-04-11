<?php

    include('../../../config/config.php');

    $campus_id = $_POST['campus_id'];
    $session = $_POST['session'];
    $positions_id = $_POST['positions_id'];
    $studentid = $_POST['studentid'];

    $get_applicants = "SELECT * FROM `electionapplicants` WHERE `CampusID` = '$campus_id' AND `SessionName` = '$session' AND `PositionApplied` = '$positions_id' GROUP BY PositionApplied";
    $get_applicants_query = mysqli_query($link, $get_applicants);
    $get_applicants_fetch = mysqli_fetch_assoc($get_applicants_query);
    $get_applicants_rows = mysqli_num_rows($get_applicants_query);

    if($get_applicants_rows > 0){

        do{
            $get_student_id = $get_applicants_fetch['StudentID'];
            $get_applied_position = $get_applicants_fetch['PositionApplied'];

            $get_student_details = "SELECT * FROM `student` INNER JOIN `classordepartmentstudentallocation` 
            ON `student`.`CampusID` = `classordepartmentstudentallocation`.`CampusID` AND `student`.`StudentID` = `classordepartmentstudentallocation`.`StudentID` 
            INNER JOIN `classordepartment` ON `classordepartmentstudentallocation`.`ClassOrDepartmentID` = `classordepartment`.`ClassOrDepartmentID` 
            WHERE `classordepartment`.`CampusID` = '$campus_id' AND `classordepartmentstudentallocation`.`Session` = '$session' AND 
            `student`.`StudentID` = '$get_student_id' ";

            $get_student_details_query = mysqli_query($link, $get_student_details);
            $get_student_details_fetch = mysqli_fetch_assoc($get_student_details_query);
            $get_student_details_rows = mysqli_num_rows($get_student_details_query);

            if($get_student_details_rows > 0){

                $get_student_first_name = $get_student_details_fetch['StudentFirstName'];
                $get_student_middle_name = $get_student_details_fetch['StudentMiddleName'];
                $get_student_last_name = $get_student_details_fetch['StudentLastName'];
                $get_student_date_of_birth = $get_student_details_fetch['StudentDOB'];
                $get_student_type = $get_student_details_fetch['StudentTypeBoardingOrDay'];
                $get_student_gender = $get_student_details_fetch['StudentGender'];
                $get_student_religion = $get_student_details_fetch['StudentReligion'];
                // $get_student_image = $get_student_details_fetch['StudentPhoto'];
                $get_student_class = $get_student_details_fetch['ClassOrDepartmentName'];


                $get_selected_positions = "SELECT * FROM `electionpositions` WHERE `ElectionPositionID` = '$get_applied_position' ";
                $get_positions_query = mysqli_query($link, $get_selected_positions);
                $fetch_selected_position = mysqli_fetch_assoc($get_positions_query);
                $get_selected_rows = mysqli_num_rows($get_positions_query);
                

                if($get_selected_rows > 0){

                    $get_applied_positions = $fetch_selected_position['ElectionPositionName'];

                    $get_score_select = "SELECT * FROM `score` WHERE `CampusID` = '$campus_id' AND `Session` = '$session' AND `StudentID` = '$studentid' ";
                    $get_score_query = mysqli_query($link, $get_score_select);
                    $get_score_fetch = mysqli_fetch_assoc($get_score_query);
                    $get_score_rows = mysqli_num_rows($get_score_query);
                    

                    if($get_score_rows > 0){

                        $firsttermsum = 0;
                        $secondtermsum = 0;
                        $thirdtermsum = 0;
                        $totalsessionscore=0;


                            $get_classes = "SELECT * FROM `student` INNER JOIN `classordepartmentstudentallocation` ON `student`.`StudentID` = `classordepartmentstudentallocation`.`StudentID`
                            WHERE `student`.`StudentID` = '$get_student_id' ";
                            $get_classes_query = mysqli_query($link, $get_classes);
                            $fetch_classes = mysqli_fetch_assoc($get_classes_query);
                            $get_classes_rows = mysqli_num_rows($get_classes_query);

                            $optional_fees = 0;
                            $compulsory_fees = 0;
                            $compulsory_and_optional_fees = 0;
                            $transaction_in = 0;
                            $total = 0;

                            if($get_classes_rows > 0){

                                do{

                                    $get_class_id = $fetch_classes['ClassOrDepartmentID'];
                                    $get_session = $fetch_classes['Session'];

                                    $get_compulsory_fee = "SELECT * FROM `chargestructure` WHERE `ClassOrDepartmentID` = '$get_class_id' AND `Session` = '$get_session' AND `Status` = 1 ";
                                    $compulsory_fee_query = mysqli_query($link, $get_compulsory_fee);
                                    $fetch_compulsory_fee = mysqli_fetch_assoc($compulsory_fee_query);
                                    $compulsory_fee_rows = mysqli_num_rows($compulsory_fee_query);

                                    if($compulsory_fee_rows > 0){

                                        do{
                                            $get_compulsory_amount = $fetch_compulsory_fee['Amount'];

                                            $compulsory_fees+=$get_compulsory_amount;

                                        }while($fetch_compulsory_fee = mysqli_fetch_assoc($compulsory_fee_query));

                                        $compulsory_fees;
                                    }else{
                                        
                                    }

                                    $get_optional_fees = "SELECT * FROM `assignoptionalfees` INNER JOIN `chargestructure` ON `assignoptionalfees`.`ClassOrDepartmentID` = `chargestructure`.`ClassOrDepartmentID` AND 
                                    `assignoptionalfees`.`CampusID` = `chargestructure`.`CampusID` AND `assignoptionalfees`.`Session` = `chargestructure`.`Session` AND 
                                    `assignoptionalfees`.`CategoryID` = `chargestructure`.`CategoryID` AND `assignoptionalfees`.`SubcategoryID` = `chargestructure`.`SubcategoryID`
                                    WHERE `chargestructure`.`ClassOrDepartmentID` = '$get_class_id' AND `chargestructure`.`Session` = '$get_session' AND `chargestructure`.`Status` = 0 ";

                                    $get_optional_fees_query = mysqli_query($link, $get_optional_fees);
                                    $get_optional_fees_fetch = mysqli_fetch_assoc($get_optional_fees_query);
                                    $get_optional_fees_rows = mysqli_num_rows($get_optional_fees_query);

                                    if($get_optional_fees_rows > 0){

                                        do{

                                            $get_optional_amount = $get_optional_fees_fetch['Amount'];

                                            $optional_fees+=$get_optional_amount;


                                        }while($get_optional_fees_fetch = mysqli_fetch_assoc($get_optional_fees_query));
                                        
                                        $optional_fees;

                                    }else{
                                    
                                    }

                                    $compulsory_and_optional_fees = $optional_fees+$compulsory_fees;

                                }while($fetch_classes = mysqli_fetch_assoc($get_classes_query));

                            }else{
                                echo 'NO CLASS ID COLLECTED';
                            }

                            $get_transactions = "SELECT * FROM `transactions` WHERE `CampusID` = '$campus_id' AND `StudentID` = '$get_student_id' ";
                            $get_transactions_query = mysqli_query($link, $get_transactions);
                            $fetch_transactions = mysqli_fetch_assoc($get_transactions_query);
                            $transaction_rows = mysqli_num_rows($get_transactions_query);

                            if($transaction_rows > 0){

                                do{

                                    $get_transaction = $fetch_transactions['TransactionIn'];

                                    $transaction_in+=$get_transaction;

                                }while($fetch_transactions = mysqli_fetch_assoc($get_transactions_query));
                                $transaction_in;
                            }else{
                                echo 2;
                            }

                        do{

                            $get_ca_one = $get_score_fetch['CA1'];
                            $get_ca_two = $get_score_fetch['CA2'];
                            $get_ca_three = $get_score_fetch['CA3'];
                            $get_ca_four = $get_score_fetch['CA4'];
                            $get_ca_five = $get_score_fetch['CA5'];
                            $get_ca_six = $get_score_fetch['CA6'];
                            $get_ca_seven = $get_score_fetch['CA7'];
                            $get_ca_eight = $get_score_fetch['CA8'];
                            $get_ca_nine = $get_score_fetch['CA9'];
                            $get_ca_ten = $get_score_fetch['CA10'];
                            $get_exams_score = $get_score_fetch['Exam'];

                            $ca_one_integer = intval($get_ca_one);
                            $ca_two_integer = intval($get_ca_two);
                            $ca_three_integer = intval($get_ca_three);
                            $ca_four_integer = intval($get_ca_four);
                            $ca_five_integer = intval($get_ca_five);
                            $ca_six_integer = intval($get_ca_six);
                            $ca_seven_integer = intval($get_ca_seven);
                            $ca_eight_integer = intval($get_ca_eight);
                            $ca_nine_integer = intval($get_ca_nine);
                            $ca_ten_integer = intval($get_ca_ten);
                            $ca_exams_integer = intval($get_exams_score);

                            $get_term_or_semester = $get_score_fetch['TermOrSemester'];

                            if($get_term_or_semester == 1){

                                $coutfirstnum = $ca_one_integer+$ca_two_integer+$ca_three_integer+$ca_four_integer+$ca_five_integer+$ca_six_integer+$ca_seven_integer+$ca_eight_integer+$ca_nine_integer+$ca_ten_integer+$ca_exams_integer;

                                $firsttermsum+=$coutfirstnum;

                            }elseif ($get_term_or_semester == 2) {

                                $coutsecondnum = $ca_one_integer+$ca_two_integer+$ca_three_integer+$ca_four_integer+$ca_five_integer+$ca_six_integer+$ca_seven_integer+$ca_eight_integer+$ca_nine_integer+$ca_ten_integer+$ca_exams_integer;

                                $secondtermsum+=$coutsecondnum;
                                
                            }else{

                                $coutthirdnum = $ca_one_integer+$ca_two_integer+$ca_three_integer+$ca_four_integer+$ca_five_integer+$ca_six_integer+$ca_seven_integer+$ca_eight_integer+$ca_nine_integer+$ca_ten_integer+$ca_exams_integer;

                                $thirdtermsum+=$coutthirdnum;
                            }

                            // echo $sum+=$get_ca_two;
                            
                        }while($get_score_fetch = mysqli_fetch_assoc($get_score_query));

                        // Scores for each term 
                        $firsttermsum;
                        $secondtermsum;
                        $thirdtermsum;

                        // Total number of terms
                        $total_terms = 3;

                        // Calculate the total score
                        $totalsessionscore+=$firsttermsum+$secondtermsum+$thirdtermsum;

                        if($totalsessionscore == 0){
                            $average_first_term = $firsttermsum;
                            $average_second_term = $secondtermsum;
                            $average_third_term = $thirdtermsum;

                        }else{
                            $average_first_term = $firsttermsum/$totalsessionscore;
                            $average_second_term = $secondtermsum / $totalsessionscore;
                            $average_third_term = $thirdtermsum / $totalsessionscore;
                        }

                        $scaling_factor = 0;

                        if($scaling_factor == 0){

                        }else {
                            // Scale the average scores to ensure that the total does not exceed 100
                            $scaling_factor = 100 / ($average_first_term + $average_second_term + $average_third_term);
                            $average_first_term *= $scaling_factor;
                            $average_second_term *= $scaling_factor;
                            $average_third_term *= $scaling_factor;
                        }

                        $all_average = $average_first_term+$average_second_term+$average_third_term;
                        $total_average = $all_average/3;
                        // Output the average scores
                            echo'
                            <div><b>FULL NAME:</b> '.$get_student_first_name.' '.$get_student_middle_name.' '.$get_student_last_name.'</div>
                            <div class="mt-2"><b>DATE OF BIRTH:</b> '.$get_student_date_of_birth.' </div>
                            <div class="mt-2"><b>STUDENT TYPE:</b> '.$get_student_type.' Student</div>
                            <div class="mt-2"><b>GENDER:</b> '.$get_student_gender.' </div>
                            <div class="mt-2"><b>RELIGION:</b> '.$get_student_religion.' </div>
                            <div class="mt-2"><b>CURRENT CLASS:</b> '.$get_student_class.' </div>

                            <div align="center" class="mt-3">
                            
                                <h6 class="mt-2"><b>TERMLY AVERAGE</b> </h6>
                            </div>';

                            echo "<div class='mt-2'><b>FIRST TERM AVERAGE SCORE:</b>  " . round($average_first_term, 2) . '<br>';
                            echo "<div class='mt-2'><b>SECOND TERM AVERAGE SCORE:</b>  " . round($average_second_term, 2) . '<br>';
                            echo "<div class='mt-2'><b> THIRD TERM AVERAGE SCORE:</b>  " . round($average_third_term, 2) . '<br>';

                            echo'
                            <div align="center" class="mt-3">
                            
                                <h6 class="mt-2"><b>SESSION AVERAGE</b> </h6>
                            </div>';

                            echo "<div class='mt-2'><b>TOTAL AVERAGE:</b>  " . round($total_average, 2) . '<br>';

                            echo'
                                <div align="center" class="mt-3">
                                
                                <h6 class="mt-2"><b>FEES UPDATE</b> </h6>
                            </div>';

                            $total = $compulsory_and_optional_fees-$transaction_in;

                            if($total > 0){
                                echo '<div>'.$get_student_first_name.' '.$get_student_middle_name.' '.$get_student_last_name.' still has an outstanding debt of '.$total.' ';
                            }else{
                                echo "This Student has no outstanding debt";
                            }
                    }else{
                        echo 'No Record Found';
                    }

                }else{
                    echo 'No Record Found';
                }
                
            }else{
                echo 2;
            }
            
        }while($get_applicants_fetch = mysqli_fetch_assoc($get_applicants_query));

    }else{
        $default_images = "SELECT * FROM `defaultimages` WHERE `ImageName` = 'abba-no-record-found-image2' ";
        $default_images_query = mysqli_query($link, $default_images);
        $default_images_fetch = mysqli_fetch_assoc($default_images_query);
        $default_images_rows = mysqli_num_rows($default_images_query);
        
        if($default_images_rows > 0){
            $get_image = $default_images_fetch['BaseSixtyFour'];

            echo '<div align="center">
                    <div class="">
                        <img src="'.$get_image.'" alt="" style="width:150px;">
                        <p class="text-primary"> No Record Found</p>
                    </div>
                </div>';

        }else{

        }
    }

?>