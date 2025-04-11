<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    include('../../config/config.php');
    
    $abba_instituion_id = $_POST['abba_instituion_id'];
    
    $campus_id = $_POST['atten_campus'];
    
    $abba_staff_type = $_POST['atten_staff_type'];
    $current_term = $_POST['atten_term'];
    $current_session = $_POST['atten_session'];
    $atten_type = $_POST['atten_type'];
    $atten_staff = $_POST['atten_staff'];
    
    date_default_timezone_set("Africa/Lagos");
    
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
    
    
    
    $abba_sql_staff = "SELECT * FROM `staff` WHERE InstitutionID = $abba_instituion_id AND StaffType = '$abba_staff_type' AND StaffID = '$atten_staff' AND (Staff_Attendance_Campus = '$campus_id' OR $campus_id IS NULL)";
    $abba_result_staff = mysqli_query($link, $abba_sql_staff);
    $abba_row_staff = mysqli_fetch_assoc($abba_result_staff);
    $abba_row_cnt_staff = mysqli_num_rows($abba_result_staff);
    
    if($abba_row_cnt_staff > 0)
    {
        echo '<table id="example1" class="display">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Date</th>
                    <th>Clock In Time</th>
                    <th>Clock In Image</th>
                    <th>Clock Out Time</th>
                    <th>Clock Out Image</th>
                </tr>
            </thead>
            <tbody>';
            
                $cnt = 1;
                
                $staff_id = $abba_row_staff['StaffID'];
                $staff_f_name = $abba_row_staff['StaffFirstName'];
                $staff_m_name = $abba_row_staff['StaffMiddleName'];
                $staff_l_name = $abba_row_staff['StaffLastName'];
            
                if($atten_type == 'present')
                {
                    $abba_sql_staff_attendance = "SELECT * FROM `staff_attendance` WHERE InstitutionID = $abba_instituion_id AND StaffID = '$staff_id' AND TermID = '$current_term' AND Session = '$current_session' AND Status = '1' AND Date >= '$calender_Opening_date' AND Date <= '$calender_closing_date'";
                    $abba_result_staff_attendance = mysqli_query($link, $abba_sql_staff_attendance);
                    $abba_row_staff_attendance = mysqli_fetch_assoc($abba_result_staff_attendance);
                    $abba_row_cnt_staff_attendance = mysqli_num_rows($abba_result_staff_attendance);
                    
                    if($abba_row_cnt_staff_attendance > 0)
                    {
                        do{
                            $date = new DateTime($abba_row_staff_attendance['Date']);
    
                            // Format the date to words
                            $dateInWords = $date->format('l, F j, Y');
                            
                            $cnt_new = $cnt++;
                            
                            echo '<tr>
                                <td>'.$cnt++.'.</td> 
                                <td> '.$dateInWords.'</td>
                                <td>'.$abba_row_staff_attendance['Clock_In_Time'].'</td>
                                <td>
                                    <i class="fa fa-eye get_modal_attend_img" style="color:#0275d8;cursor:pointer;" data-bs-toggle="modal" data-bs-target="#exampleModalimageview" data-id="staffattend'.$cnt_new.'"> View Image</i> <input type="hidden" value="'.$abba_row_staff_attendance['Clock_In_Img'].'" class="staffattend'.$cnt_new.'">
                                </td>
                                <td>'.$abba_row_staff_attendance['Clock_Out_Time'].'</td>
                                <td>
                                    <i class="fa fa-eye get_modal_attend_img" style="color:#0275d8;cursor:pointer;" data-bs-toggle="modal" data-bs-target="#exampleModalimageview" data-id="staffattendout'.$cnt_new.'"> View Image</i> <input type="hidden" value="'.$abba_row_staff_attendance['Clock_Out_Img'].'" class="staffattendout'.$cnt_new.'">
                            </tr>';
                            
                        }while($abba_row_staff_attendance = mysqli_fetch_assoc($abba_result_staff_attendance));
                    }
                    else
                    {
                        
                    }
                    
                }
                else if($atten_type == 'excused')
                {
                    $abba_sql_staff_attendance = "SELECT * FROM `staff_attendance` WHERE InstitutionID = $abba_instituion_id AND StaffID = '$staff_id' AND TermID = '$current_term' AND Session = '$current_session' AND Status = '2' AND Date >= '$calender_Opening_date' AND Date <= '$calender_closing_date'";
                    $abba_result_staff_attendance = mysqli_query($link, $abba_sql_staff_attendance);
                    $abba_row_staff_attendance = mysqli_fetch_assoc($abba_result_staff_attendance);
                    $abba_row_cnt_staff_attendance = mysqli_num_rows($abba_result_staff_attendance);
                    
                    if($abba_row_cnt_staff_attendance > 0)
                    {
                        do{
                            $date = new DateTime($abba_row_staff_attendance['Date']);
    
                            // Format the date to words
                            $dateInWords = $date->format('l, F j, Y');
                            
                            $cnt_new = $cnt++;
                            
                            echo '<tr>
                                <td>'.$cnt++.'.</td> 
                                <td> '.$dateInWords.'</td>
                                <td>NIL</td>
                                <td>
                                    NIL
                                </td>
                                <td>NIL</td>
                                <td>
                                    NIL
                                </td>
                            </tr>';
                            
                        }while($abba_row_staff_attendance = mysqli_fetch_assoc($abba_result_staff_attendance));
                    }
                    else
                    {
                        
                    }
                }
                else
                {
                    foreach($date_array as $date_array_new){
                        // echo $date_array_new;
                        
                        $abba_sql_staff_attendance = "SELECT * FROM `staff_attendance` WHERE InstitutionID = $abba_instituion_id AND StaffID = '$staff_id' AND TermID = '$current_term' AND Session = '$current_session' AND Date = '$date_array_new'";
                        $abba_result_staff_attendance = mysqli_query($link, $abba_sql_staff_attendance);
                        $abba_row_staff_attendance = mysqli_fetch_assoc($abba_result_staff_attendance);
                        $abba_row_cnt_staff_attendance = mysqli_num_rows($abba_result_staff_attendance);
                        
                        if($abba_row_cnt_staff_attendance > 0)
                        {

                        }
                        else
                        {
                            $date = new DateTime($date_array_new);
        
                                // Format the date to words
                                $dateInWords = $date->format('l, F j, Y');
                                
                                $cnt_new = $cnt++;
                                
                                echo '<tr>
                                    <td>'.$cnt++.'.</td> 
                                    <td> '.$dateInWords.'</td>
                                    <td>NIL</td>
                                    <td>
                                        NIL
                                    </td>
                                    <td>NIL</td>
                                    <td>
                                        NIL
                                    </td>
                                </tr>';
                                
                        }
                    }
                }
                
                
            echo '</tbody>
        </table>';
    }
    else
    {
        
    }
?>