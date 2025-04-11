<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../../controller/config/config.php');
    
    include('../../../controller/config/config2.php');
    
    

    $abba_campus = $_POST['abba_campus'];
    $abba_campus_name = str_replace(' ', '_', $_POST['abba_campus_name']);
    
    $abba_campus_name_new = str_replace(',', '_', $_POST['abba_campus_name']);
    
    $abba_term = $_POST['abba_term'];
    $abba_session = $_POST['abba_session'];

    $sql_get_classordepartment_new = "SELECT * FROM `classordepartment` WHERE CampusID='$abba_campus'";
    $query_get_classordepartment_new = mysqli_query($link, $sql_get_classordepartment_new);
    $row_get_classordepartment_new = mysqli_fetch_assoc($query_get_classordepartment_new);
     $count_get_classordepartment_new = mysqli_num_rows($query_get_classordepartment_new);
    
    if($count_get_classordepartment_new > 0)
    {
        $today = date("Y-m-d");
        $seconds = date("hisa");
        $time = $today . $seconds; 
        
        $csv_header = ["Old_Subject_Id", "Subject_Title", "New_Subject_Id", "New_Subject_Title", "Class_Name", "Class_Template_Id", "Class_Id"];
    
        $fileName = $abba_campus_name . '-' . $time;

        $Fname = fopen('../subjectcsv/' . $fileName . '.csv', 'w') or die("Unable to open file!");
        $lineHeader = $csv_header;
        fputcsv($Fname, $lineHeader);
        
        do{
            
            $class_id_new = $row_get_classordepartment_new['ClassOrDepartmentID'];
            
            $class_template_id = $row_get_classordepartment_new['ClassTemplateID'];
            
            $class_name = $row_get_classordepartment_new['ClassOrDepartmentName'];
            
            $sql_get_courseorsubjectallocation_old = "SELECT * FROM `courseorsubjectallocation` WHERE InstitutionID='$abba_campus' AND ClassOrDepartmentID='$class_id_new'";
            $query_get_courseorsubjectallocation_old = mysqli_query($link_abba, $sql_get_courseorsubjectallocation_old);
            $row_get_courseorsubjectallocation_old = mysqli_fetch_assoc($query_get_courseorsubjectallocation_old);
            $count_get_courseorsubjectallocation_old = mysqli_num_rows($query_get_courseorsubjectallocation_old);
            
            if($count_get_courseorsubjectallocation_old > 0)
            {
                
                do{
                    
                    $subject_id_old = $row_get_courseorsubjectallocation_old['SubjectOrCourseID'];
                    
                    $sql_get_subjectorcourse_old = "SELECT * FROM `subjectorcourse` WHERE InstitutionID='$abba_campus' AND SubjectOrCourseID='$subject_id_old'";
                    $query_get_subjectorcourse_old = mysqli_query($link_abba, $sql_get_subjectorcourse_old);
                    $row_get_subjectorcourse_old = mysqli_fetch_assoc($query_get_subjectorcourse_old);
                    $count_get_subjectorcourse_old = mysqli_num_rows($query_get_subjectorcourse_old);
                    
                    if($count_get_subjectorcourse_old > 0)
                    {
                        $subject_title_old = trim($row_get_subjectorcourse_old['SubjectOrCourseTitle']);
                        
                        $sql_get_subjectorcourse_id_new = "SELECT * FROM `subjectorcourse` WHERE ClassTemplateID='$class_template_id' AND SubjectOrCourseTitle LIKE '%$subject_title_old%'";
                        $query_get_subjectorcourse_id_new = mysqli_query($link, $sql_get_subjectorcourse_id_new);
                        $row_get_subjectorcourse_id_new = mysqli_fetch_assoc($query_get_subjectorcourse_id_new);
                        $count_get_subjectorcourse_id_new = mysqli_num_rows($query_get_subjectorcourse_id_new);
                        
                        if($count_get_subjectorcourse_id_new > 0)
                        {
                            $subject_id_new = $row_get_subjectorcourse_id_new['SubjectOrCourseID'];
                            
                            $subject_title_new = $row_get_subjectorcourse_id_new['SubjectOrCourseTitle'];
                        }
                        else
                        {
                            $subject_id_new = NULL; 
                            
                            $subject_title_new = NULL;
                        }
                        
                        $lineData = array($subject_id_old, $subject_title_old, $subject_id_new, $subject_title_new, $class_name, $class_template_id, $class_id_new);

                        fputcsv($Fname, $lineData);
                    }
                    else
                    {
                        
                    }
                    
                }while($row_get_courseorsubjectallocation_old = mysqli_fetch_assoc($query_get_courseorsubjectallocation_old));
                
            }
            else
            {
                
            }
            
        }while($row_get_classordepartment_new = mysqli_fetch_assoc($query_get_classordepartment_new));
        
        //set headers to download file rather than displayed
        $downloadPaths = 'https://edumess.com/migration/scripts/subjectcsv/' . $fileName . '.csv';
        
        $downloadname = $abba_campus_name . '-' . $time;
        
        $abba_json = (object) [
            'downloadPaths' => $downloadPaths,
            'downloadname' => $downloadname,
            'abbafilename' => '../subjectcsv/'.$fileName.'.csv'
        ];
        
        echo $abba_json_content = json_encode($abba_json);
    }
    else
    {
        echo 1;
    }
    
    
    
    
    // this code gets the parents phone numbers from the old database and updates it to the new database
    // $sql_get_parent_new = "SELECT * FROM `parent`";
    // $query_get_parent_new = mysqli_query($link, $sql_get_parent_new);
    // $row_get_parent_new = mysqli_fetch_assoc($query_get_parent_new);
    // $count_get_parent_new = mysqli_num_rows($query_get_parent_new);
    
    // if($count_get_parent_new > 0)
    // {
        
    //     do{
            
    //         $parent_id_new = $row_get_parent_new['ParentID'];
            
    //         $sql_get_parent_old = "SELECT * FROM `parent` WHERE ParentID='$parent_id_new'";
    //         $query_get_parent_old = mysqli_query($link_abba, $sql_get_parent_old); 
    //         $row_get_parent_old = mysqli_fetch_assoc($query_get_parent_old);
    //         $count_get_parent_old = mysqli_num_rows($query_get_parent_old);
            
    //         if($count_get_parent_old > 0)
    //         {
    //             $parent_whatsapp = $row_get_parent_old['ParentWhatsappNumber'];
    //             $parent_main = $row_get_parent_old['ParentMainPhoneNumber'];
    //             $parent_other = $row_get_parent_old['ParentOtherPhoneNumber'];
                
    //             $sql_get_parent_update = "UPDATE `parent` SET `ParentOtherPhoneNumber`='$parent_other',`ParentWhatsappNumber`='$parent_whatsapp',`ParentMainPhoneNumber`='$parent_main' WHERE `ParentID` = '$parent_id_new'";
    //             $query_get_parent_update = mysqli_query($link, $sql_get_parent_update);
                    
    //             if($query_get_parent_update == true)
    //             {
    //                 echo 'inserted<br>';
    //             }
    //             else
    //             {
    //                 echo 'not inserted<br>';
    //             }
    //         }
    //         else
    //         {
    //             echo 'not exist in old<br>';
    //         }
            
    //     }while($row_get_parent_new = mysqli_fetch_assoc($query_get_parent_new));
        
    // }
    // else
    // {
    //     echo 'no records in new<br>';
    // }
    
    
    
    
    // $sql_get_parent_old = "SELECT * FROM `parent` WHERE InstitutionID IN (79,80,81,130)";
    // $query_get_parent_old = mysqli_query($link_abba, $sql_get_parent_old); 
    // $row_get_parent_old = mysqli_fetch_assoc($query_get_parent_old);
    // $count_get_parent_old = mysqli_num_rows($query_get_parent_old);
    
    // if($count_get_parent_old > 0)
    // {
        
    //     do{
            
    //         $parent_id_old = $row_get_parent_old['ParentID'];
            
    //         $sql_get_parent_new = "SELECT * FROM `parent` WHERE ParentID='$parent_id_old'";
    //         $query_get_parent_new = mysqli_query($link, $sql_get_parent_new);
    //         $row_get_parent_new = mysqli_fetch_assoc($query_get_parent_new);
    //         $count_get_parent_new = mysqli_num_rows($query_get_parent_new);
            
    //         if($count_get_parent_new > 0)
    //         {
    //             echo 'exist';
    //         }
    //         else
    //         {
    //             $ParentID = $row_get_parent_old['ParentID'];	
    //             $InstitutionID = $row_get_parent_old['InstitutionID'];	
    //             $ParentTitle = $row_get_parent_old['ParentTitle'];	
    //             $ParentFirstName = $row_get_parent_old['ParentFirstName'];	
    //             $ParentMiddleName = $row_get_parent_old['ParentMiddleName'];	
    //             $ParentLastName = $row_get_parent_old['ParentLastName'];	
    //             $ParentDOB = $row_get_parent_old['ParentDOB'];	
    //             $ParentGender = $row_get_parent_old['ParentGender'];	
    //             $OtherPhoneCountryCode = $row_get_parent_old['OtherPhoneCountryCode'];	
    //             $ParentOtherPhoneNumber = $row_get_parent_old['ParentOtherPhoneNumber'];	
    //             $WhtasAppPhoneCountryCode = $row_get_parent_old['WhtasAppPhoneCountryCode'];	
    //             $ParentWhatsappNumber = $row_get_parent_old['ParentWhatsappNumber'];	
    //             $MainPhoneCountryCode = $row_get_parent_old['MainPhoneCountryCode'];	
    //             $ParentMainPhoneNumber = $row_get_parent_old['ParentMainPhoneNumber'];	
    //             $ParentEmail = $row_get_parent_old['ParentEmail'];	
    //             $ParentReservedEmail = $row_get_parent_old['ParentReservedEmail'];	
    //             $ReservedAccountStatus = $row_get_parent_old['ReservedAccountStatus'];	
    //             $ParentOccupation = $row_get_parent_old['ParentOccupation'];	
    //             $ParentCountry = $row_get_parent_old['ParentCountry'];	
    //             $ParentState = $row_get_parent_old['ParentState'];	
    //             $ParentLga = $row_get_parent_old['ParentLga'];	
    //             $ParentCity = $row_get_parent_old['ParentCity'];	
    //             $ParentHomeAddress = $row_get_parent_old['ParentHomeAddress'];	
    //             $ParentOfficeAddress = $row_get_parent_old['ParentOfficeAddress'];	
    //             $Parent_MeansOfIdentification = $row_get_parent_old['Parent_MeansOfIdentification'];	
    //             $Parent_IdentificationNumber = $row_get_parent_old['Parent_IdentificationNumber'];	
    //             $ParentPhoto = $row_get_parent_old['ParentPhoto'];	
    //             $ParentTrashStatus = $row_get_parent_old['ParentTrashStatus'];
                
    //             $sql_get_parent_update = "INSERT INTO `parent`(`ParentID`, `InstitutionID`, `ParentTitle`, `ParentFirstName`, `ParentMiddleName`, `ParentLastName`, `ParentDOB`, `ParentGender`, `OtherPhoneCountryCode`, `ParentOtherPhoneNumber`, `WhtasAppPhoneCountryCode`, `ParentWhatsappNumber`, `MainPhoneCountryCode`, `ParentMainPhoneNumber`, `ParentEmail`, `ParentReservedEmail`, `ReservedAccountStatus`, `ParentOccupation`, `ParentCountry`, `ParentAddressCountry`, `ParentState`, `ParentLga`, `ParentCity`, `ParentHomeAddress`, `ParentOfficeAddress`, `Parent_MeansOfIdentification`, `Parent_IdentificationNumber`, `ParentPhoto`, `tagID`, `Lang_Val`, `OTP`, `ParentTrashStatus`, `WalletBank`, `WalletAccountName`, `WalletAccountNumber`, `WalletAccountReference`, `WalletBalance`, `PendingWithdrawal`, `AmountWithdrawn`, `TransactionPin`) 
    //             VALUES ($ParentID,'8','$ParentTitle','$ParentFirstName','$ParentMiddleName','$ParentLastName','$ParentDOB','$ParentGender','$OtherPhoneCountryCode','$ParentOtherPhoneNumber','$WhtasAppPhoneCountryCode','$ParentWhatsappNumber','$MainPhoneCountryCode','$ParentMainPhoneNumber','$ParentEmail','$ParentReservedEmail','$ReservedAccountStatus','$ParentOccupation','$ParentCountry','$ParentState','$ParentLga','$ParentCity','$ParentHomeAddress','$ParentOfficeAddress','$Parent_MeansOfIdentification','$Parent_IdentificationNumber','$ParentPhoto','0','0','0','$ParentTrashStatus','0','0','0','0','0','0','0','0','0')";
    //             $query_get_parent_update = mysqli_query($link, $sql_get_parent_update);
                    
    //             if($query_get_parent_update == true)
    //             {
    //                 echo 'inserted<br>';
    //             }
    //             else
    //             {
    //                 echo 'not inserted<br>';
    //             }
    //         }
            
    //     }while($row_get_parent_old = mysqli_fetch_assoc($query_get_parent_old));
        
    // }
    // else
    // {
    //     echo 'no records in new<br>';
    // }
    
    
    
    
    
    
    
    
    // $sql_get_userlogin_old = "SELECT * FROM `userlogin` WHERE UserType IN ('teacher')";
    // $query_get_userlogin_old = mysqli_query($link_abba, $sql_get_userlogin_old); 
    // $row_get_userlogin_old = mysqli_fetch_assoc($query_get_userlogin_old);
    // $count_get_userlogin_old = mysqli_num_rows($query_get_userlogin_old);
    
    // if($count_get_userlogin_old > 0)
    // {
    //     $cnt = 1;
        
    //     $cnt_not = 1;
        
    //     do{
            
    //         $user_id_old = $row_get_userlogin_old['UserID'];
            
    //         $user_password_old = MD5($row_get_userlogin_old['UserPassword']);
            
    //         $user_type_old = $row_get_userlogin_old['UserType'];
            
    //         $sql_update_userlogin = "UPDATE `userlogin` SET `UserPassword`= '$user_password_old' WHERE `UserID` = '$user_id_old' AND `UserType`= 'teacher'";
    //         $query_update_userlogin = mysqli_query($link, $sql_update_userlogin);
            
    //         if($query_update_userlogin == true)
    //         {
    //             echo $cnt++.', ';
            
    //             echo $user_id_old.', ';
                
    //             echo $user_password_old.', ';
                
    //             echo $user_type_old.', ';
                
    //             echo 'inserted<br>';
    //         }
    //         else
    //         {
    //             echo $cnt_not++.', ';
            
    //             echo $user_id_old.', ';
                
    //             echo $user_password_old.', ';
                
    //             echo $user_type_old.', ';
                
    //             echo 'not inserted<br>';
                
    //         }
            
    //     }while($row_get_userlogin_old = mysqli_fetch_assoc($query_get_userlogin_old));
        
    // }
    // else
    // {
    //     echo 'no records in old<br>';
    // }

?>