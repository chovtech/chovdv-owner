<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    // echo ini_get('memory_limit');
    
    include('../../../config/config.php');
    
    $abba_instituion_id = $_POST['abba_instituion_id'];
    
    $user_id = $_POST['user_id'];
    
    // get current session and term
    $abba_sql_session = "SELECT * FROM `session` WHERE sessionStatus=1";
    $abba_result_session = mysqli_query($link, $abba_sql_session);
    $abba_row_session = mysqli_fetch_assoc($abba_result_session);
    $abba_row_cnt_session = mysqli_num_rows($abba_result_session);
    
    $abba_display_session = $abba_row_session['sessionName'];
    
    
    
    $abba_sql_term = "SELECT * FROM `termorsemester` WHERE status=1";
    $abba_result_term = mysqli_query($link, $abba_sql_term);
    $abba_row_term = mysqli_fetch_assoc($abba_result_term);
    $abba_row_cnt_term = mysqli_num_rows($abba_result_term);
    
    $abba_display_term = $abba_row_term['TermOrSemesterID'];
    
    $term_array = $abba_row_term['TermOrSemesterID'];
    
    
    
    //get total students for current session
    
    $abba_sql_student = "SELECT DISTINCT student.StudentID
        FROM `campus`
        INNER JOIN student ON campus.CampusID=student.CampusID
        INNER JOIN classordepartmentstudentallocation ON student.StudentID=classordepartmentstudentallocation.StudentID AND student.CampusID=classordepartmentstudentallocation.CampusID
            WHERE campus.InstitutionID=$abba_instituion_id AND StudentTrashStatus = 0 AND classordepartmentstudentallocation.Session = '$abba_display_session'";
            
        $abba_result_student = mysqli_query($link, $abba_sql_student);
        $abba_row_student = mysqli_fetch_assoc($abba_result_student);
        $abba_row_cnt_student = mysqli_num_rows($abba_result_student);
    
    // Split the string into two parts using "/"
    $years = explode('/', $abba_display_session);
    
    // Subtract 1 from each part and store them in an array
    $updatedYears = [
        $years[0] - 1,
        $years[1] - 1
    ];
    
    // Combine the updated years with a "/" separator
    $prev_session = implode('/', $updatedYears);
    
    // get total parent for current session
    $abba_sql_parent = "SELECT DISTINCT student.ParentID
        FROM `campus`
        INNER JOIN student ON campus.CampusID=student.CampusID
        INNER JOIN classordepartmentstudentallocation ON student.StudentID=classordepartmentstudentallocation.StudentID AND student.CampusID=classordepartmentstudentallocation.CampusID
        WHERE campus.InstitutionID=$abba_instituion_id AND StudentTrashStatus = 0 AND classordepartmentstudentallocation.Session = '$abba_display_session' AND student.ParentID != 0";
    $abba_result_parent = mysqli_query($link, $abba_sql_parent);
    $abba_row_parent = mysqli_fetch_assoc($abba_result_parent);
    $abba_row_cnt_parent = mysqli_num_rows($abba_result_parent);
    
    // get total staff for current session
    $abba_sql_staff = "SELECT *
        FROM `campus`
        INNER JOIN staff ON campus.InstitutionID=staff.InstitutionID
        WHERE campus.InstitutionID=$abba_instituion_id";
    $abba_result_staff = mysqli_query($link, $abba_sql_staff);
    $abba_row_staff = mysqli_fetch_assoc($abba_result_staff);
    $abba_row_cnt_staff = mysqli_num_rows($abba_result_staff);
    
    
    $abba_get_comp_charge = 0;
    
    $abba_get_opt_fee = 0;
    
    $abba_get_amount_paid = 0;
    
    $abba_debt = 0;
    
    $abba_stud_owing = 0;
    
    $abba_stud_payed = 0;
    
    $abba_get_comp_charge_prev = 0;
    
    $abba_get_opt_fee_prev = 0;
    
    $abba_get_amount_paid_prev = 0;
    
    $abba_debt_prev = 0;
    
    $abba_stud_owing_prev = 0;
    
    $abba_stud_payed_prev = 0;
    
    $abba_campuses_array = array();
    
    $sql_campus = mysqli_query($link, "SELECT * FROM `campus` WHERE InstitutionID='$abba_instituion_id'");
    $sql_campus_cnt = mysqli_num_rows($sql_campus);
    
    if ($sql_campus_cnt > 0) {
    
    
    
        while ($sql_campus_fetch = mysqli_fetch_assoc($sql_campus)) {
    
            $CampusID = $sql_campus_fetch['CampusID'];
    
            $abba_campuses_array[] = $CampusID;
    
            $sql_student = mysqli_query($link, "SELECT DISTINCT classordepartmentstudentallocation.StudentID, classordepartmentstudentallocation.ClassOrDepartmentID, classordepartmentstudentallocation.Session, classordepartmentstudentallocation.CampusID FROM `student` INNER JOIN `classordepartmentstudentallocation` ON `student`.`StudentID` = `classordepartmentstudentallocation`.`StudentID` WHERE `classordepartmentstudentallocation`.`CampusID`='$CampusID' AND StudentTrashStatus = 0 AND Session = '$abba_display_session'");
            $sql_student_cnt = mysqli_num_rows($sql_student);
    
            if ($sql_student_cnt > 0) {
    
                while ($sql_student_fetch = mysqli_fetch_assoc($sql_student)) {
                    
                    $StudentID = $sql_student_fetch['StudentID'];
                    $ClassOrDepartmentID = $sql_student_fetch['ClassOrDepartmentID'];
                    $student_session = $sql_student_fetch['Session'];
                    $CampusIDnew = $sql_student_fetch['CampusID'];
    
                    $sql_deactivateuser = mysqli_query($link, "SELECT * FROM `deactivateuser` WHERE `InstitutionIDOrCampusID` = '$CampusIDnew' AND `UserID` = '$StudentID' AND `UserType` = 'student' AND `sessionName` = '$abba_display_session' AND `TermOrSemesterName` = '$term_array' AND `Status` IN (0,2)");
                    $sql_deactivateuser_cnt = mysqli_num_rows($sql_deactivateuser);
                    
                    if($sql_deactivateuser_cnt > 0)
                    {
                        
                    }
                    else
                    {
                        
                        $sql_chargestructure = mysqli_query($link, "SELECT  SUM(Amount) AS Amount FROM `chargestructure` WHERE `CampusID`='$CampusIDnew' AND `ClassOrDepartmentID`='$ClassOrDepartmentID' AND `Session`='$student_session' AND `Status`='1' AND `TermOrSemesterID` IN ($term_array)");
                        $sql_chargestructure_fetch = mysqli_fetch_assoc($sql_chargestructure);
                        $sql_chargestructure_cnt = mysqli_num_rows($sql_chargestructure);
        
                        if ($sql_chargestructure_cnt > 0) {
        
                            $comp_amount = $sql_chargestructure_fetch['Amount'];
        
                            $abba_get_comp_charge += $comp_amount;
        
                        } else {
                            $comp_amount = 0;
        
                            $abba_get_comp_charge += 0;
                        }
        
                        $sql_assignoptionalfees = mysqli_query($link, "SELECT SUM(`chargestructure`.Amount) AS optionalfeeamount FROM `assignoptionalfees` INNER JOIN `chargestructure` ON `assignoptionalfees`.`CategoryID` = `chargestructure`.`CategoryID` AND `assignoptionalfees`.`SubcategoryID` = `chargestructure`.`SubcategoryID` AND `assignoptionalfees`.`ClassOrDepartmentID` = `chargestructure`.`ClassOrDepartmentID` WHERE `assignoptionalfees`.`ClassOrDepartmentID`='$ClassOrDepartmentID' AND `assignoptionalfees`.StudentID='$StudentID' AND `chargestructure`.`Status`='0' AND `assignoptionalfees`.`Status`='0' AND `assignoptionalfees`.`CampusID`='$CampusIDnew' AND chargestructure.`Session`='$student_session' AND assignoptionalfees.`Session`='$student_session' AND assignoptionalfees.`TermOrSemesterID` IN ($term_array) AND chargestructure.`TermOrSemesterID` IN ($term_array)");
                        $sql_assignoptionalfees_fetch = mysqli_fetch_assoc($sql_assignoptionalfees);
                        $sql_assignoptionalfees_cnt = mysqli_num_rows($sql_assignoptionalfees);
        
                        if ($sql_assignoptionalfees_cnt > 0) {
        
                            $optionalfeeamount = $sql_assignoptionalfees_fetch['optionalfeeamount'];
        
                            $abba_get_opt_fee += $optionalfeeamount;
        
                        } else {
                            $optionalfeeamount = 0;
        
                            $abba_get_opt_fee += $optionalfeeamount;
                        }
        
                        $sql_transactions = mysqli_query($link, "SELECT SUM(TransactionIn) AS TransactionIn FROM `transactions` WHERE `InstitutionID`='$abba_instituion_id' AND `DeleteStatus`='0' AND StudentID='$StudentID' AND ClassOrDepartmentID = '$ClassOrDepartmentID' AND CampusID='$CampusIDnew' AND Session='$student_session' AND TuitionType !='repurchase' AND `TermOrSemesterID` IN ($term_array)");
                        $sql_transactions_fetch = mysqli_fetch_assoc($sql_transactions);
                        $sql_transactions_cnt = mysqli_num_rows($sql_transactions);
        
        
                        if ($sql_transactions_cnt > 0) {
        
                            $amount_paid = $sql_transactions_fetch['TransactionIn'];
        
                            $abba_get_amount_paid += $amount_paid;
        
                        } else {
                            $amount_paid = 0;
        
                            $abba_get_amount_paid += $amount_paid;
                        }
        
                        $debt = ($comp_amount + $optionalfeeamount) - $amount_paid;
        
                        $abba_debt += $debt;
        
                        if ($debt > 0) {
                            $abba_stud_owing++;
                            $abba_stud_payed;
                        } else {
                            $abba_stud_owing;
                            
                            if(($comp_amount == 0 || $comp_amount == '') && ($optionalfeeamount == 0 || $optionalfeeamount == ''))
                            {
                                $abba_stud_payed;
                            }
                            else
                            {
                                $abba_stud_payed++;
                            }
                            
                        }
        
                    }
    
                }
            } 
            else
            {
                $abba_get_comp_charge = 0;
    
                $abba_get_opt_fee = 0;
    
                $abba_get_amount_paid = 0;
    
                $abba_debt = 0;
    
                $abba_stud_owing = 0;
    
                $abba_stud_payed = 0;
            }
            
        }
    
        $abba_campuses = implode(',', $abba_campuses_array);
    }
    else {
        $abba_get_comp_charge = 0;
    
        $abba_get_opt_fee = 0;
    
        $abba_get_amount_paid = 0;
    
        $abba_debt = 0;
    
        $abba_stud_owing = 0;
    
        $abba_stud_payed = 0;
    
        $abba_campuses = 0;
        
        $abba_get_comp_charge_prev = 0;
    
        $abba_get_opt_fee_prev = 0;
    
        $abba_get_amount_paid_prev = 0;
    
        $abba_debt_prev = 0;
    
        $abba_stud_owing_prev = 0;
    
        $abba_stud_payed_prev = 0;
    }
    
    // echo $abba_get_comp_charge;
    
    $total_income = $abba_get_comp_charge + $abba_get_opt_fee;
    
    $total_income_prev = 0 - 0;
    
    $total_debt = $total_income - $abba_get_amount_paid;
    
    // 
    $sql_birthday = mysqli_query($link, "SELECT 'Parent' AS `Type`, `ParentFirstName` AS `FirstName`, `ParentLastName` AS `LastName`, `ParentDOB` AS `Birthday`, `ParentPhoto` AS `image` FROM `parent` WHERE `InstitutionID` = $abba_instituion_id AND `ParentDOB` >= CURDATE() UNION ALL SELECT 'Student' AS `Type`, `StudentFirstName` AS `FirstName`, `StudentLastName` AS `LastName`, `StudentDOB` AS `Birthday`, `StudentPhoto` AS `image` FROM `student` WHERE `CampusID` IN ($abba_campuses) AND `StudentDOB` >= CURDATE() UNION ALL SELECT 'Staff' AS `Type`, `StaffFirstName` AS `FirstName`, `StaffLastName` AS `LastName`, `StaffDOB` AS `Birthday`, `StaffPhoto` AS `image` FROM `staff` WHERE `InstitutionID` = $abba_instituion_id AND `StaffDOB` >= CURDATE() ORDER BY `Birthday` LIMIT 3");
    $sql_birthday_fetch = mysqli_fetch_assoc($sql_birthday);
    $sql_birthday_cnt = mysqli_num_rows($sql_birthday);
    
    if ($sql_birthday_cnt > 0) {
        $abba_birthday_array = array();
    
        do {
    
            if ($sql_birthday_fetch['image'] === '' || $sql_birthday_fetch['image'] === '0') {
                
                $img = '../../assets/images/adminImg/default-img.png';
                
            } else {
                
                $img = $sql_birthday_fetch['image'];
                
            }
            
            $abba_campuses_array[] = '<tr style="font-size:11px;">
                <th scope="row">
                    <img src="' . $img . '"
                        style="height: 30px; width: 30px; border-radius: 100%;" alt="">
                    <span>' . $sql_birthday_fetch['LastName'] . ' ' . $sql_birthday_fetch['FirstName'] . '</span>
                </th>
                <td>' . $sql_birthday_fetch['Type'] . '</td>
                <td>' . $sql_birthday_fetch['Birthday'] . '</td>
            </tr>';
    
        } while ($sql_birthday_fetch = mysqli_fetch_assoc($sql_birthday));
    
        $abba_birthday = implode(',', $abba_campuses_array);
    }
    else {
        $abba_birthday = '<tr>
            <th colspan="12" align="center">
                No records found
            </th>
        </tr>';
    }
    
    
    $sql_score = mysqli_query($link, "SELECT AVG(Exam + CA1 + CA2 + CA3 + CA4 + CA5 + CA6 + CA7 + CA8 + CA9 + CA10) as scoretotal, StudentFirstName, StudentLastName, StudentPhoto, Session, score.StudentID FROM `score` INNER JOIN student ON score.CampusID=student.CampusID AND score.StudentID=student.StudentID WHERE score.CampusID IN ($abba_campuses) AND student.CampusID IN ($abba_campuses) AND Session = '$abba_display_session' GROUP BY score.StudentID ORDER BY scoretotal DESC LIMIT 1");
    $sql_score_fetch = mysqli_fetch_assoc($sql_score);
    $sql_score_cnt = mysqli_num_rows($sql_score);
    
    if ($sql_score_cnt > 0) {
        
        $stud_id_score = $sql_score_fetch['StudentID'];
    
        $sql_classordepartment = mysqli_query($link, "SELECT * FROM `classordepartmentstudentallocation` INNER JOIN classordepartment ON classordepartmentstudentallocation.CampusID=classordepartment.CampusID WHERE classordepartmentstudentallocation.CampusID IN ($abba_campuses) AND classordepartment.CampusID IN ($abba_campuses) AND Session = '$abba_display_session' AND StudentID = '$stud_id_score'");
        $sql_classordepartment_fetch = mysqli_fetch_assoc($sql_classordepartment);
        $sql_classordepartment_cnt = mysqli_num_rows($sql_classordepartment);
    
        if ($sql_score_fetch['StudentPhoto'] === '' || $sql_score_fetch['StudentPhoto'] === '0') {
            $StudentPhoto = '../../assets/images/adminImg/default-img.png';
        } else {
            $StudentPhoto = $sql_score_fetch['StudentPhoto'];
        }
        $abba_best_student = $sql_score_fetch['StudentLastName'] . ' ' . $sql_score_fetch['StudentFirstName'];
    
        $abba_best_class = $sql_classordepartment_fetch['ClassOrDepartmentName'];
        
        $abba_student_average = '<h6 style="font-weight: 600; color: #292929;">'.round($sql_score_fetch['scoretotal'], 2).'</h6>';
        
        $best_student = '<div style="margin-top: -10px;">
            <img src="'.$StudentPhoto.'"
                style="height: 50px; width: 50px; border-radius: 100%;" alt="">
        </div>
        <div style="margin-left: 10px;">
            <span style="font-weight: 600; color: #292929;">'.$abba_best_student.'</span>
            <br>
            <small style="color: #292929;">'.$abba_best_class.'</small>
        </div>';
    
    }
    else
    {
        $StudentPhoto = '../../assets/images/adminImg/default-img.png';
    
        $abba_best_student = 'Nil';
    
        $abba_best_class = 'Nil';
        
        $abba_student_average = '<h6 style="font-weight: 600; color: #292929;">Nil</h6>';
    
        $best_student = '<div style="margin-top: -10px;">
            <img src="'.$StudentPhoto.'"
                style="height: 50px; width: 50px; border-radius: 100%;" alt="">
        </div>
        <div style="margin-left: 10px;">
            <span style="font-weight: 600; color: #292929;">'.$abba_best_student.'</span>
            <br>
            <small style="color: #292929;">'.$abba_best_class.'</small>
        </div>';
    }
    
    
    $select_agency = mysqli_query($link, "SELECT * FROM `agencyorschoolowner` WHERE AgencyOrSchoolOwnerID='$user_id'");
    $select_agency_rowsel = mysqli_fetch_assoc($select_agency);
    $select_agency_row = mysqli_num_rows($select_agency);
    
    if ($select_agency_row > 0) {
    
        if ($select_agency_rowsel['WalletBalance'] == '0') 
        {
            $abba_WalletBalance = '0';
        } 
        else 
        {
            $abba_WalletBalance = $select_agency_rowsel['WalletBalance'];
        }
    
    } 
    else 
    {
    
    
        $abba_WalletBalance = 0;
    }
    
    $abba_dashboard_content = (object) [
        'total_students' => number_format($abba_row_cnt_student),
        'total_students_percent' => 0,
        'total_parent' => number_format($abba_row_cnt_parent),
        'total_staff' => number_format($abba_row_cnt_staff),
        'student_owing' => number_format($abba_stud_owing),
        'student_owing_percent' => 0,
        'student_payed' => number_format($abba_stud_payed),
        'student_payed_percent' => 0,
        'total_income' => '₦' . number_format($abba_get_amount_paid),
        'total_expected_income' => '₦' . number_format($total_income),
        'total_dept' => '₦' . number_format($total_debt),
        'wallet_balance' => '₦' . number_format($abba_WalletBalance),
        'best_student' => $best_student,
        'abba_student_average' => $abba_student_average,
        'upcoming_birthdays' => $abba_birthday
    
    ];
    
    echo $abba_dashboard_content_json = json_encode($abba_dashboard_content);
?>