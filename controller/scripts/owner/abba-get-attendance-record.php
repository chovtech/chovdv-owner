<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    include('../../config/config.php');
    
    $abba_instituion_id = $_POST['institution_id'];
    
    $campus_id = $_POST['campus_id'];
    
    $abba_staff_type = $_POST['abba_staff_type'];
    $abba_term = $_POST['abba_term'];
    $abba_session = $_POST['abba_session'];
    
    date_default_timezone_set("Africa/Lagos");
    
    if($abba_instituion_id == '' || $abba_instituion_id == '0' || $abba_instituion_id == 0 || $abba_instituion_id == 'undefined' || $abba_instituion_id == 'NULL')
    {
        echo '<table id="example" class="display">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Present</th>
                    <th>Excused</th>
                    <th>Absent</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>';
    }
    else
    {
        
        if($abba_session == '' || $abba_session == 'NULL'){
            
            $sql_termorsemester = "SELECT * FROM `termorsemester` WHERE status = '1'";
            $result_termorsemester = mysqli_query($link, $sql_termorsemester);
            $row_termorsemester = mysqli_fetch_assoc($result_termorsemester);
            $count_termorsemester = mysqli_num_rows($result_termorsemester);
            
            $current_term = $row_termorsemester['TermOrSemesterID'];
            
            $sql_session = "SELECT * FROM `session` WHERE sessionStatus = '1'";
            $result_session = mysqli_query($link, $sql_session);
            $row_session = mysqli_fetch_assoc($result_session);
            $count_session = mysqli_num_rows($result_session);
        
            $current_session = $row_session['sessionName'];
        }
        else
        {
            $current_session = $abba_session;
        }
        
        
        if($abba_term == '' || $abba_term == 'NULL'){
            
            $sql_termorsemester = "SELECT * FROM `termorsemester` WHERE status = '1'";
            $result_termorsemester = mysqli_query($link, $sql_termorsemester);
            $row_termorsemester = mysqli_fetch_assoc($result_termorsemester);
            $count_termorsemester = mysqli_num_rows($result_termorsemester);
            
            $current_term = $row_termorsemester['TermOrSemesterID'];
            
        }
        else
        {
            $current_term = $abba_term;
        }
        
        $current_date = date("Y-m-d");
        
        $abba_sql_calender_opening = "SELECT * FROM `calender` WHERE InstitutionID=$abba_instituion_id AND TermOrSemesterID = '$current_term' AND Session = '$current_session' AND Purpose_ID ='1'";
        $abba_result_calender_opening = mysqli_query($link, $abba_sql_calender_opening);
        $abba_row_calender_opening = mysqli_fetch_assoc($abba_result_calender_opening);
        $abba_row_cnt_calender_opening = mysqli_num_rows($abba_result_calender_opening);
        
        if($abba_row_cnt_calender_opening > 0)
        {
            $calender_Opening_date_check = $abba_row_calender_opening['End_Date'];
            
            if (strtotime($calender_Opening_date_check) <= strtotime($current_date)) {
                $calender_Opening_date = $calender_Opening_date_check;
            } else {
                $calender_Opening_date = $current_date;
            }
        }
        else
        {
            $calender_Opening_date = $current_date;
        }
        
        $abba_sql_calender_close = "SELECT * FROM `calender` WHERE InstitutionID=$abba_instituion_id AND TermOrSemesterID = '$current_term' AND Session = '$current_session' AND Purpose_ID ='2'";
        $abba_result_calender_close = mysqli_query($link, $abba_sql_calender_close);
        $abba_row_calender_close = mysqli_fetch_assoc($abba_result_calender_close);
        $abba_row_cnt_calender_close = mysqli_num_rows($abba_result_calender_close);
        
        if($abba_row_cnt_calender_close > 0)
        {
            $calender_closing_date_check = $abba_row_calender_close['End_Date'];
            
            if(strtotime($current_date) >= strtotime($calender_closing_date_check))
            {
                $calender_closing_date = $calender_closing_date_check;
            }
            else
            {
                $calender_closing_date = $current_date;
            }
        }
        else
        {
            $calender_closing_date = $current_date;
        }
        
        
        $date_array = array();
        $current_timestamp = strtotime($calender_Opening_date);
        $end_timestamp = strtotime($calender_closing_date);
        
        while ($current_timestamp <= $end_timestamp) {
            // Skip weekends (Saturday and Sunday)
            if (date('N', $current_timestamp) < 6) {
                $date_array[] = date('Y-m-d', $current_timestamp);
            }
            $current_timestamp = strtotime('+1 day', $current_timestamp);
        }
        
        $date_string = count($date_array);
    
        
        
        echo '<table id="example" class="display">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Present</th>
                    <th>Excused</th>
                    <th>Absent</th>
                </tr>
            </thead>
            <tbody>';
            
                $abba_sql_staff = "SELECT * FROM `staff` WHERE InstitutionID = $abba_instituion_id AND StaffType = '$abba_staff_type' AND (Staff_Attendance_Campus = '$campus_id' OR $campus_id IS NULL)";
                $abba_result_staff = mysqli_query($link, $abba_sql_staff);
                $abba_row_staff = mysqli_fetch_assoc($abba_result_staff);
                $abba_row_cnt_staff = mysqli_num_rows($abba_result_staff);
                
                if($abba_row_cnt_staff > 0)
                {
                    $cnt = 1;
                    do{
                        $staff_id = $abba_row_staff['StaffID'];
                        $staff_f_name = $abba_row_staff['StaffFirstName'];
                        $staff_m_name = $abba_row_staff['StaffMiddleName'];
                        $staff_l_name = $abba_row_staff['StaffLastName'];
                        
                        $abba_sql_deactivateuser = "SELECT * FROM `deactivateuser` WHERE InstitutionIDOrCampusID = $abba_instituion_id AND UserID = $staff_id AND UserType = 'staff'";
                        $abba_result_deactivateuser = mysqli_query($link, $abba_sql_deactivateuser);
                        $abba_row_deactivateuser = mysqli_fetch_assoc($abba_result_deactivateuser);
                        $abba_row_cnt_deactivateuser = mysqli_num_rows($abba_result_deactivateuser);
                        
                        if($abba_row_cnt_deactivateuser > 0)
                        {
                            
                        }
                        else
                        {
                            
                            // echo $abba_instituion_id.' '.$staff_id.' '.$current_term.' '.$current_session.' '.$calender_Opening_date.' '.$calender_closing_date.'</br>';
                            
                            $abba_sql_staff_attendance_present = "SELECT * FROM `staff_attendance` WHERE InstitutionID = $abba_instituion_id AND StaffID = '$staff_id' AND TermID = '$current_term' AND Session = '$current_session' AND Status = '1' AND Date >= '$calender_Opening_date' AND Date <= '$calender_closing_date'";
                            $abba_result_staff_attendance_present = mysqli_query($link, $abba_sql_staff_attendance_present);
                            $abba_row_staff_attendance_present = mysqli_fetch_assoc($abba_result_staff_attendance_present);
                            $abba_row_cnt_staff_attendance_present = mysqli_num_rows($abba_result_staff_attendance_present);
                            
                            
                            $abba_sql_staff_attendance_excused = "SELECT * FROM `staff_attendance` WHERE InstitutionID = $abba_instituion_id AND StaffID = '$staff_id' AND TermID = '$current_term' AND Session = '$current_session' AND Status = '2' AND Date >= '$calender_Opening_date' AND Date <= '$calender_closing_date'";
                            $abba_result_staff_attendance_excused = mysqli_query($link, $abba_sql_staff_attendance_excused);
                            $abba_row_staff_attendance_excused = mysqli_fetch_assoc($abba_result_staff_attendance_excused);
                            $abba_row_cnt_staff_attendance_excused = mysqli_num_rows($abba_result_staff_attendance_excused);
                            
                            $total_absent = $date_string - ($abba_row_cnt_staff_attendance_present + $abba_row_cnt_staff_attendance_excused);
                            
                            echo '<tr>
                                <td>'.$cnt++.'.</td> 
                                <td> <b>'.$staff_l_name.'</b> '.$staff_f_name.' '.$staff_m_name.'</td>
                                <td><span style="color:#5cb85c;font-weight:550;cursor:pointer;" data-bs-toggle="modal" data-bs-target="#staticBackdropattend" data-id="present" data-term="'.$current_term.'" data-session="'.$current_session.'" data-campus="'.$campus_id.'" data-staff="'.$staff_id.'" data-stafftype="'.$abba_staff_type.'" class="abba_get_attendance_history">'.$abba_row_cnt_staff_attendance_present.'</span></td>
                                <td><span style="color:#0275d8;font-weight:550;cursor:pointer;" data-bs-toggle="modal" data-bs-target="#staticBackdropattend" data-id="excused" data-term="'.$current_term.'" data-session="'.$current_session.'" data-campus="'.$campus_id.'" data-staff="'.$staff_id.'" data-stafftype="'.$abba_staff_type.'" class="abba_get_attendance_history">'.$abba_row_cnt_staff_attendance_excused.'</span></td>
                                <td><span style="color:#d9534f;font-weight:550;cursor:pointer;" data-bs-toggle="modal" data-bs-target="#staticBackdropattend" data-id="absent" data-term="'.$current_term.'" data-session="'.$current_session.'" data-campus="'.$campus_id.'" data-staff="'.$staff_id.'" data-stafftype="'.$abba_staff_type.'" class="abba_get_attendance_history">'.$total_absent.'</span></td>
                            </tr>';
                            
                        }
                        
                    }while($abba_row_staff = mysqli_fetch_assoc($abba_result_staff));
                
                }
                else
                {
                    
                }
            echo '</tbody>
        </table>';
    }
    
?>