<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../../../config/config.php');

$abba_instituion_id = $_POST['abba_get_stored_instituion_id'];

$campus_id = $_POST['campus_id'];

$abba_display_session = $_POST['abba_display_session'];

$abba_display_term = $_POST['abba_display_term'];

$user_id = $_POST['user_id'];

$user_type = $_POST['user_type'];

$class_id = implode(',',$_POST['class_id']);

date_default_timezone_set("Africa/Lagos");

$date = date("Y-m-d H:i:s");

echo '<section class="ac-container">';

    $cnt = 0;


    $abba_sql_classordepartment = ("SELECT * FROM `classordepartment` WHERE classordepartment.CampusID='$campus_id' AND ClassOrDepartmentID IN ($class_id) ORDER BY ClassOrDepartmentName ASC");
    $abba_result_classordepartment = mysqli_query($link, $abba_sql_classordepartment);
    $abba_row_classordepartment = mysqli_fetch_assoc($abba_result_classordepartment);
    $abba_row_cnt_classordepartment = mysqli_num_rows($abba_result_classordepartment);


    do{
        $class_id = $abba_row_classordepartment['ClassOrDepartmentID'];

        $cnt++;
        
        if ($cnt == 1) {
            $checked = 'checked';
        } else {
            $checked = '';
        }

        echo '<div class="pb-4 section-dis-card uniqueclass' . $class_id . '" data-canumb = "abba_section_ca_num' . $cnt . '" data-id = "' . $class_id . '" data-uniqueclass = "uniqueclass' . $class_id . '">
            <input class="abba_input" id="ac-' . $class_id . '" name="accordion-1" type="radio" ' . $checked . '>
            <label class="abba_label" for="ac-' . $class_id . '">' . $abba_row_classordepartment['ClassOrDepartmentName'] . '</label>
            <article class="ac-medium">
                <div style="padding-left:30px;padding-right:30px;">

                    <div class="row pt-2 pb-2 abba_append_item_'.$class_id.'">
                        <legend class="abba_stud_checkbox-group-legend">Choose Item(s)</legend>';

                        // get classes
                        $abba_sql_chargestructure = ("SELECT * FROM `chargestructure` WHERE InstitutionID = '$abba_instituion_id' AND CampusID = '$campus_id' AND chargestructure.Session = '$abba_display_session' AND TermOrSemesterID = '$abba_display_term' AND ClassOrDepartmentID = '$class_id' AND chargestructure.Status = 0");
                        $abba_result_chargestructure = mysqli_query($link, $abba_sql_chargestructure);
                        $abba_row_chargestructure = mysqli_fetch_assoc($abba_result_chargestructure);
                        $abba_row_cnt_chargestructure = mysqli_num_rows($abba_result_chargestructure);

                        if ($abba_row_cnt_chargestructure > 0)
                        {
                            $cnt_new = 0;

                            do{

                                $cnt_new++;
        
                                if ($cnt_new == 1) 
                                {
                                    $checked_new = 'checked';
                                } 
                                else 
                                {
                                    $checked_new = '1';
                                }

                                $subcategory_id = $abba_row_chargestructure['SubcategoryID'];

                                $amount = $abba_row_chargestructure['Amount'];

                                $category_id = $abba_row_chargestructure['CategoryID'];
                                
                                if($category_id == '27')
                                {
                                    // get classes
                                    $abba_sql_check_subcategory = ("SELECT * FROM `transportationtable` WHERE CampusID=$campus_id AND RouteID = '$subcategory_id' ORDER BY RouteName ASC");
                                    $abba_result_check_subcategory = mysqli_query($link, $abba_sql_check_subcategory);
                                    $abba_row_check_subcategory = mysqli_fetch_assoc($abba_result_check_subcategory);
                                    $abba_row_cnt_check_subcategory = mysqli_num_rows($abba_result_check_subcategory);
            
                                    if ($abba_row_cnt_check_subcategory > 0)
                                    {
                                        $subcategory_title = $abba_row_check_subcategory['RouteName'];
        
                                        $abba_sql_assignoptionalfees = ("SELECT * FROM `assignoptionalfees` WHERE `InstitutionID` = '$abba_instituion_id' AND `CampusID` = '$campus_id' AND `ClassOrDepartmentID` = '$class_id' AND `Session` = '$abba_display_session' AND `TermOrSemesterID` = '$abba_display_term' AND `CategoryID` = '$category_id' AND `SubcategoryID` = '$subcategory_id' AND `Status` != 1");
                                        $abba_result_assignoptionalfees = mysqli_query($link, $abba_sql_assignoptionalfees);
                                        $abba_row_assignoptionalfees = mysqli_fetch_assoc($abba_result_assignoptionalfees);
                                        $abba_row_cnt_assignoptionalfees = mysqli_num_rows($abba_result_assignoptionalfees);
        
                                        if ($abba_row_cnt_assignoptionalfees > 0) {
        
                                            $stud_id_holder = []; // Initialize the array
        
                                            do {
                                                $stud_id_holder[] = $abba_row_assignoptionalfees['StudentID'];
                                            } while ($abba_row_assignoptionalfees = mysqli_fetch_assoc($abba_result_assignoptionalfees));
        
                                            // Convert the array to a comma-separated string
                                            $comma_separated_ids = implode(',', $stud_id_holder);
        
                                        } else {
                                            $comma_separated_ids = 0;
                                        }
        
                                        echo '<div class="col-md-12 col-lg-3">
                                        
                                            <fieldset class="tari-tari_checkbox-group">
                                                <div class="tari_checkbox ">
                                                    <label for="abba_check_finance_subcat_optional_'.$subcategory_id.'_'.$class_id.'" class="tari_checkbox-wrapper">
                                                        <input type="radio" '.$checked_new.' name="flexRadioDefault_'.$class_id.'" value="'.$subcategory_id.'" id="abba_check_finance_subcat_optional_'.$subcategory_id.'_'.$class_id.'" class="tari_checkbox-input abba_subcat_optional_checkbox'.$class_id.' abba_subcat_optional_checkbox" data-category="'.$category_id.'" data-input="abba_subcat_optional_checkbox'.$class_id.'_input_'.$subcategory_id.'" data-studclass="abba_student_optional_checkbox'.$class_id.'"
                                                        data-optmain="abba_select_all_optional_student_'.$class_id.'"
                                                        data-classspan="abba_student_optional_span'.$class_id.'"/>
                                                        <span class="tari_checkbox-tile">
                                                            <span class="tari_checkbox-label">'.$subcategory_title.' (₦'.number_format($amount).')</span>
                                                            <input type="hidden" value="'.$comma_separated_ids.'" id="abba_subcat_optional_checkbox'.$class_id.'_input_'.$subcategory_id.'" data-subcat="'.$subcategory_id.'" data-cat="'.$category_id.'" class="abba_insert_all_input'.$class_id.'">
                                                        </span>
                                                    </label>
                                                </div>
                                            </fieldset>
                                        </div>';
                                    }
                                    else
                                    {
                                        
                                    }
                                }
                                elseif($category_id == '26')
                                {
                                    // get classes
                                    $abba_sql_check_subcategory = ("SELECT * FROM `hosteltable` WHERE CampusID=$campus_id AND HostelID = '$subcategory_id' ORDER BY HostelName ASC");
                                    $abba_result_check_subcategory = mysqli_query($link, $abba_sql_check_subcategory);
                                    $abba_row_check_subcategory = mysqli_fetch_assoc($abba_result_check_subcategory);
                                    $abba_row_cnt_check_subcategory = mysqli_num_rows($abba_result_check_subcategory);
            
                                    if ($abba_row_cnt_check_subcategory > 0)
                                    {
                                        $subcategory_title = $abba_row_check_subcategory['HostelName'];
        
                                        $abba_sql_assignoptionalfees = ("SELECT * FROM `assignoptionalfees` WHERE `InstitutionID` = '$abba_instituion_id' AND `CampusID` = '$campus_id' AND `ClassOrDepartmentID` = '$class_id' AND `Session` = '$abba_display_session' AND `TermOrSemesterID` = '$abba_display_term' AND `CategoryID` = '$category_id' AND `SubcategoryID` = '$subcategory_id' AND `Status` != 1");
                                        $abba_result_assignoptionalfees = mysqli_query($link, $abba_sql_assignoptionalfees);
                                        $abba_row_assignoptionalfees = mysqli_fetch_assoc($abba_result_assignoptionalfees);
                                        $abba_row_cnt_assignoptionalfees = mysqli_num_rows($abba_result_assignoptionalfees);
        
                                        if ($abba_row_cnt_assignoptionalfees > 0) {
        
                                            $stud_id_holder = []; // Initialize the array
        
                                            do {
                                                $stud_id_holder[] = $abba_row_assignoptionalfees['StudentID'];
                                            } while ($abba_row_assignoptionalfees = mysqli_fetch_assoc($abba_result_assignoptionalfees));
        
                                            // Convert the array to a comma-separated string
                                            $comma_separated_ids = implode(',', $stud_id_holder);
        
                                        } else {
                                            $comma_separated_ids = 0;
                                        }
        
                                        echo '<div class="col-md-12 col-lg-3">
                                        
                                            <fieldset class="tari-tari_checkbox-group">
                                                <div class="tari_checkbox ">
                                                    <label for="abba_check_finance_subcat_optional_'.$subcategory_id.'_'.$class_id.'" class="tari_checkbox-wrapper">
                                                        <input type="radio" '.$checked_new.' name="flexRadioDefault_'.$class_id.'" value="'.$subcategory_id.'" id="abba_check_finance_subcat_optional_'.$subcategory_id.'_'.$class_id.'" class="tari_checkbox-input abba_subcat_optional_checkbox'.$class_id.' abba_subcat_optional_checkbox" data-category="'.$category_id.'" data-input="abba_subcat_optional_checkbox'.$class_id.'_input_'.$subcategory_id.'" data-studclass="abba_student_optional_checkbox'.$class_id.'"
                                                        data-optmain="abba_select_all_optional_student_'.$class_id.'"
                                                        data-classspan="abba_student_optional_span'.$class_id.'"/>
                                                        <span class="tari_checkbox-tile">
                                                            <span class="tari_checkbox-label">'.$subcategory_title.' (₦'.number_format($amount).')</span>
                                                            <input type="hidden" value="'.$comma_separated_ids.'" id="abba_subcat_optional_checkbox'.$class_id.'_input_'.$subcategory_id.'" data-subcat="'.$subcategory_id.'" data-cat="'.$category_id.'" class="abba_insert_all_input'.$class_id.'">
                                                        </span>
                                                    </label>
                                                </div>
                                            </fieldset>
                                        </div>';

                                    }
                                    else
                                    {
                                        
                                    }
                                }
                                else
                                {
                                    // get classes
                                    $abba_sql_check_subcategory = ("SELECT * FROM `subcategory` WHERE CategoryID=$category_id AND SubcategoryID=$subcategory_id ORDER BY SubcategoryTitle ASC");
                                    $abba_result_check_subcategory = mysqli_query($link, $abba_sql_check_subcategory);
                                    $abba_row_check_subcategory = mysqli_fetch_assoc($abba_result_check_subcategory);
                                    $abba_row_cnt_check_subcategory = mysqli_num_rows($abba_result_check_subcategory);
            
                                    if ($abba_row_cnt_check_subcategory > 0)
                                    {
                                        
                                        $subcategory_title = $abba_row_check_subcategory['SubcategoryTitle'];
        
                                        $abba_sql_assignoptionalfees = ("SELECT * FROM `assignoptionalfees` WHERE `InstitutionID` = '$abba_instituion_id' AND `CampusID` = '$campus_id' AND `ClassOrDepartmentID` = '$class_id' AND `Session` = '$abba_display_session' AND `TermOrSemesterID` = '$abba_display_term' AND `CategoryID` = '$category_id' AND `SubcategoryID` = '$subcategory_id' AND `Status` != 1");
                                        $abba_result_assignoptionalfees = mysqli_query($link, $abba_sql_assignoptionalfees);
                                        $abba_row_assignoptionalfees = mysqli_fetch_assoc($abba_result_assignoptionalfees);
                                        $abba_row_cnt_assignoptionalfees = mysqli_num_rows($abba_result_assignoptionalfees);
        
                                        if ($abba_row_cnt_assignoptionalfees > 0) {
        
                                            $stud_id_holder = []; // Initialize the array
        
                                            do {
                                                $stud_id_holder[] = $abba_row_assignoptionalfees['StudentID'];
                                            } while ($abba_row_assignoptionalfees = mysqli_fetch_assoc($abba_result_assignoptionalfees));
        
                                            // Convert the array to a comma-separated string
                                            $comma_separated_ids = implode(',', $stud_id_holder);
        
                                        } else {
                                            $comma_separated_ids = 0;
                                        }
        
                                        echo '<div class="col-md-12 col-lg-3">
                                        
                                            <fieldset class="tari-tari_checkbox-group">
                                                <div class="tari_checkbox ">
                                                    <label for="abba_check_finance_subcat_optional_'.$subcategory_id.'_'.$class_id.'" class="tari_checkbox-wrapper">
                                                        <input type="radio" '.$checked_new.' name="flexRadioDefault_'.$class_id.'" value="'.$subcategory_id.'" id="abba_check_finance_subcat_optional_'.$subcategory_id.'_'.$class_id.'" class="tari_checkbox-input abba_subcat_optional_checkbox'.$class_id.' abba_subcat_optional_checkbox" data-category="'.$category_id.'" data-input="abba_subcat_optional_checkbox'.$class_id.'_input_'.$subcategory_id.'" data-studclass="abba_student_optional_checkbox'.$class_id.'"
                                                        data-optmain="abba_select_all_optional_student_'.$class_id.'"
                                                        data-classspan="abba_student_optional_span'.$class_id.'"/>
                                                        <span class="tari_checkbox-tile">
                                                            <span class="tari_checkbox-label">'.$subcategory_title.' (₦'.number_format($amount).')</span>
                                                            <input type="hidden" value="'.$comma_separated_ids.'" id="abba_subcat_optional_checkbox'.$class_id.'_input_'.$subcategory_id.'" data-subcat="'.$subcategory_id.'" data-cat="'.$category_id.'" class="abba_insert_all_input'.$class_id.'">
                                                        </span>
                                                    </label>
                                                </div>
                                            </fieldset>
                                        </div>';

                                    }
                                    else
                                    {
                                        
                                    }
                                }

                            }while($abba_row_chargestructure = mysqli_fetch_assoc($abba_result_chargestructure));
                            
                        }
                        else
                        {
                            echo '<div align="center" class="mt-2"><img src="../../assets/images/adminImg/err.png" style="width:10%;"/><p class="pt-2 fs-sm text-secondary">No optional sub-category was found.</p></div>';

                        }
                        
                    echo '</div><hr>

                    <div class="row pt-2 pb-2 abba_append_item_'.$class_id.'">';

                        $sqlGetStudent = "SELECT * FROM `classordepartmentstudentallocation` INNER JOIN student ON student.StudentID=classordepartmentstudentallocation.StudentID WHERE classordepartmentstudentallocation.Session='$abba_display_session' AND classordepartmentstudentallocation.ClassOrDepartmentID IN ($class_id) ORDER BY StudentLastName ASC";
                        $queryGetStudent = mysqli_query($link, $sqlGetStudent);
                        $rowGetStudent = mysqli_fetch_assoc($queryGetStudent);
                        $countGetStudent = mysqli_num_rows($queryGetStudent);
                    
                        if ($countGetStudent > 0) {
                            echo '<fieldset class="abba_stud_checkbox-group">';
                                echo '<legend class="abba_stud_checkbox-group-legend">Choose Student(s)</legend>
                                    <div class="abba_stud_checkbox m-3">
                                    <label class="abba_stud_checkbox-wrapper" for="select_all_student_'.$class_id.'">
                                        <input type="checkbox" class="abba_stud_checkbox-input abba_select_all_optional_student_'.$class_id.' abba_select_all_optional_student" id="select_all_student_'.$class_id.'"  data-mine="abba_select_all_optional_student_'.$class_id.'" data-sub="abba_student_optional_checkbox'.$class_id.'"  data-span="abba_student_optional_span'.$class_id.'"  data-mysub="abba_subcat_optional_checkbox'.$class_id.'"/>
                                        <span class="abba_stud_checkbox-tile">
                                            <span class="abba_stud_checkbox-label p-2 fw-bold">Select All <br><small class="text-primary abba_student_optional_span'.$class_id.'"></small></span>
                                        </span>
                                    </label>

                                </div>';
                    
                                do {
                                    $StudentID = $rowGetStudent['StudentID'];
                    
                                    $sqlGetStudentReg = "SELECT * FROM `userlogin` WHERE userlogin.UserType='student' AND UserID='$StudentID' AND userlogin.InstitutionIDOrCampusID='$campus_id'";
                                    $queryGetStudentReg = mysqli_query($link, $sqlGetStudentReg);
                                    $rowGetStudentReg = mysqli_fetch_assoc($queryGetStudentReg);
                    
                                    $UserRegNumberOrUsername = $rowGetStudentReg['UserRegNumberOrUsername'];
                    
                                    $fullname = $rowGetStudent['StudentLastName'] . ' ' . $rowGetStudent['StudentFirstName'];
                                    
                                    if($rowGetStudent['StudentPhoto'] === 0 || $rowGetStudent['StudentPhoto'] === NULL || $rowGetStudent['StudentPhoto'] === '')
                                    {
                                        $stud_img = '../../assets/images/adminImg/default-img.png';
                                    }
                                    else{
                                        $stud_img = $rowGetStudent['StudentPhoto'];
                                    }
                    
                                    echo '<div class="abba_stud_checkbox m-3">
                                        <label class="abba_stud_checkbox-wrapper" for="abba_check_finance_student_optional_' . $rowGetStudent['StudentID'] . '">
                                            <input type="checkbox" class="abba_stud_checkbox-input bg-secondary  abba_student_optional_checkbox'.$class_id.' abba_student_optional_checkbox" id="abba_check_finance_student_optional_' . $rowGetStudent['StudentID'] . '" name="" value="' . $rowGetStudent['StudentID'] . '" data-main="abba_student_optional_checkbox'.$class_id.'" data-span="abba_student_optional_span'.$class_id.'" data-all="select_all_student_'.$class_id.'" data-mysub="abba_subcat_optional_checkbox'.$class_id.'"/>
                                            <span class="abba_stud_checkbox-tile">
                                                <span class="abba_stud_checkbox-icon">
                                                    <img src="'.$stud_img.'" width="40" style="border-radius:50px;"/>
                                                </span>
                                                <span class="abba_stud_checkbox-label p-2"><i class="fa fa-circle text-success"></i> ' . $fullname . '</span>
                                                
                                            </span>
                                        </label>

                                    </div>';
                                } while ($rowGetStudent = mysqli_fetch_assoc($queryGetStudent));
                    
                            echo '</fieldset>';
                    
                        } 
                        else 
                        {
                            echo '<div align="center" class="mt-2"><img src="../../assets/images/adminImg/err.png" style="width:10%;"/><p class="pt-2 fs-sm text-secondary">No student was found in this class for this session.</p></div>';

                        }
                        
                    echo '</div>

                    <div align="right" class="mb-2">
                        <button type="button" class="btn btn-primary btn-sm abba_save_optional_btn" data-subcat="abba_subcat_optional_checkbox'.$class_id.'" data-student="abba_student_optional_checkbox'.$class_id.'" data-class="'.$class_id.'"><i class="fas fa-save fs-6"> Save</i></button>
                    </div>
                </div>
            </article>
        </div>';
    }while($abba_row_classordepartment = mysqli_fetch_assoc($abba_result_classordepartment));

?>