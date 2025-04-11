<?php


            include('../../../config/config.php');
            
            $emma_get_institution_id = $_POST['abba-change-institution'];
            $emma_get_campus_value = $_POST['emma-load-campuspostransaction'];
            $emma_get_transaction_value = $_POST['emma-transactiontype'];
            $emma_get_session_value = $_POST['emmagetsessiontransactionfileter'];
            $emma_get_term_id = $_POST['emma_filterterm_id'];
            $emma_get_tuitiontype_value = $_POST['emmatutionfeetuitiontype'];
            $emma_get_datestart_value = $_POST['emmaload-start-date-transhistory'];
            $emma_get_dateend_value = $_POST['emmaload-end-date-transhistory'];
            
            
            
            $sqlselect_values = "SELECT * FROM `audittrail` WHERE `InstitutionID` = '$emma_get_institution_id' AND `Session` = '$emma_get_session_value'";
            


                if($emma_get_campus_value == 'NULL'){

                    
                }else{
                        $sqlselect_values .= " AND CampusID ='$emma_get_campus_value'";
                }

                if($emma_get_transaction_value == 'NULL'){

                }else{
                    $sqlselect_values .= " AND TransactionType = '$emma_get_transaction_value'";
                }

                if($emma_get_term_id == 'NULL'){

                }else{
                $sqlselect_values .= " AND TermOrSemesterID = '$emma_get_term_id'" ;
                }

                if($emma_get_tuitiontype_value == 'NULL'){

                }else{
                $sqlselect_values .= " AND TuitionType= '$emma_get_tuitiontype_value'" ;
                }

                if($emma_get_datestart_value == ''){

                }else{
                $sqlselect_values .= " AND DateStart= '$emma_get_datestart_value'" ;
                }

                if($emma_get_dateend_value == ''){

                }else{
                $sqlselect_values .= " AND DateEnd= '$emma_get_dateend_value'" ;
                }
  
  

                $emma_result = mysqli_query($link, $sqlselect_values);
                $emma_get_values = mysqli_fetch_assoc($emma_result);
                $emma_rowcount = mysqli_num_rows($emma_result);
                
           
                if($emma_rowcount > 0){

                    $row = 1;

                    echo '<table id="table2" class="table" style="width:100%;">
                        <thead >
                            <tr style="color: #636161;">
                            <th>NO</th>
                                
                                <th>   
                                    <span style="margin-left: 20px; margin-top: 5px;">Name</span>
                                </th>

                                
                                <th class="d-none d-sm-table-cell">Transaction Type</th>
                                <th class="d-none d-sm-table-cell">Session</th>
                                <th class="d-none d-sm-table-cell">Term</th>
                                <th>Action Type</th>
                                <th class="d-none d-sm-table-cell">Tuition Type</th>
                                <th class="">Date</th>
                                <th class="">Time</th>
                            </tr>
                        </thead>
                        <tbody style="color: #888888;">';
                                                   
                    do{
                        $row++;

                        $emma_audittrail_id = $emma_get_values['AuditTrailID'];
                        $emma_campus_id = $emma_get_values['CampusID'];
                        $emma_institution_id = $emma_get_values['InstitutionID'];
                        $emma_user_id = $emma_get_values['UserID'];
                        $emma_user_type_value = $emma_get_values['UserType'];
                        $emma_transaction_value = $emma_get_values['TransactionType'];
                        $emma_session_id = $emma_get_values['Session'];
                        $emma_term_id = $emma_get_values['TermOrSemesterID'];
                        $emma_tuitiontype_value = $emma_get_values['TuitionType'];
                        $emma_action_type_value = $emma_get_values['ActionType'];
                        $emma_description_value = $emma_get_values['Description'];
                        $emma_datestart_value = $emma_get_values['DateStart'];
                        $emma_time_value = $emma_get_values['DateEnd'];

                        $emma_get_term = "SELECT * FROM `termalias` WHERE `CampusID` = '$emma_campus_id' AND `TermOrSemesterID` = '$emma_term_id'";
                        $emma_get_term_result = mysqli_query($link, $emma_get_term);
                        $emma_fetch_term_result = mysqli_fetch_assoc($emma_get_term_result);

                        $emma_term_alias_name = $emma_fetch_term_result['TermAliasName'];

                       

                        if($emma_user_type_value = "teacher" || $emma_user_type_value =  "admin" || $emma_user_type_value = "schoolhead"){
                            
                            
                            // echo 'hello';
                            

                                $select_from_stafftable = "SELECT * FROM `staff` WHERE StaffID = '$emma_user_id'";
                                $emma_get_stafftable_values = mysqli_query($link, $select_from_stafftable);
                                $emma_fetch_stafftable_values = mysqli_fetch_assoc($emma_get_stafftable_values);
                                $emma_get_number_of_rows = mysqli_num_rows($emma_get_stafftable_values);

                            
                                if($emma_get_number_of_rows > 0){

                                    $emma_get_staff_firstname = $emma_fetch_stafftable_values['StaffFirstName'];
                                    $emma_get_staff_lastname = $emma_fetch_stafftable_values['StaffLastName'];


                                    

                                }else{
                                    
                                    
                                       
                                   
                                }

                        }else{
                       
                               

                            $select_from_stafftable = "SELECT * FROM `agencyorschoolowner` WHERE AgencyOrSchoolOwnerID='$emma_user_id'";
                            $emma_get_stafftable_values = mysqli_query($link, $select_from_stafftable);
                            $emma_fetch_stafftable_values = mysqli_fetch_assoc($emma_get_stafftable_values);
                            $emma_get_number_of_rows = mysqli_num_rows($emma_get_stafftable_values);
                            
                            
                             $emma_get_staff_firstname =  $emma_fetch_stafftable_values['AgencyOrSchoolOwnerName'];
                             $emma_get_staff_lastname =  '';
                    
                                       
                        }


                        echo '<tr class="clicktoview-tablecollapse" data-id="row'.$emma_audittrail_id.'">
                                    <td>'.$emma_audittrail_id.'</td>
                                
                                    <td>
                                        <div style="display: flex;">
                                            <a style="margin-left: 20px; color: #b3b3b3; font-size: 20px;"> 
                                                <i class="bx bx-chevron-down-circle"></i> 
                                            </a>
                                            <span style="margin-left: 10px; margin-top: 5px;">'.$emma_get_staff_firstname.' '.$emma_get_staff_lastname.'</span>
                                        </div>
                                    </td>
                                

                                    <td class="d-none d-sm-table-cell">'.$emma_transaction_value.'</td>
                                    <td class="d-none d-sm-table-cell">'.$emma_session_id.'</td>
                                    <td class="d-none d-sm-table-cell">'.$emma_term_alias_name.'</td>
                                    <td> '.$emma_action_type_value.'</td>
                                    <td class="d-none d-sm-table-cell">'.$emma_tuitiontype_value.'</td>
                                    <td class="">'.$emma_datestart_value.'</td>
                                    <td class=""> '.$emma_time_value.'</td>
                                </tr>

                                <tr id="row'.$emma_audittrail_id.'" class="hidden_row p-5" style="display:none;">
                                    <td colspan=4>
                                        <div>
                                            <span>
                                            <b>Description:</b>
                                           '.$emma_get_staff_firstname.' '.$emma_get_staff_lastname.' '.$emma_description_value.'
                                            </span><br>

                                            <span class="d-sm-block d-lg-none">
                                            <b>Tuition Type:</b>
                                            '.$emma_tuitiontype_value.'
                                            </span><br>

                                            <span class="d-sm-block d-lg-none">
                                            <b>Term:</b>
                                            '.$emma_term_alias_name.'
                                            </span><br>

                                            <span class="d-sm-block d-lg-none">
                                            <b>Session:</b>
                                            '.$emma_session_id.'
                                            </span><br>

                                            <span class="d-sm-block d-lg-none">
                                            <b>Transaction Type:</b>
                                            '.$emma_transaction_value.'
                                            </span><br>

                                           
                                        </div><br>
                                    </td>
                                    <td></td>
                                </tr>';

                    
                                
                        
                        
                    }while($emma_get_values = mysqli_fetch_assoc($emma_result));


                    echo  '</tbody>
                    </table>';


                }else{
                  echo  '<div align="center" id="pros-loadnofield-selectedoptionalfee-content">';

                            $pros_select_record_not_found = mysqli_query($link, "SELECT * FROM `defaultimages` WHERE `ImageName`='abba-no-record-found-image2'");
                            $pros_select_record_not_found_count = mysqli_num_rows($pros_select_record_not_found);
                            $pros_select_record_not_found_row = mysqli_fetch_assoc($pros_select_record_not_found);

                            if ($pros_select_record_not_found_count > 0) {
                            

                                $pros_general_no_record = $pros_select_record_not_found_row['BaseSixtyFour'];

                               echo '<img class="mb-1" src="'.$pros_general_no_record.'" width="100" alt="">

                                <p>No record found.</p>';
                            }

            echo   '</div>';
                }
 ?>