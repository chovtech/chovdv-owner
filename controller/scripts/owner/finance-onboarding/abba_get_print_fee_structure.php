<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../../config/config.php');

    $abba_campus_id = $_POST['campus_id'];

    $class_id = $_POST['class_id'];
    
    $abba_display_session = $_POST['abba_display_session'];

    $abba_display_term = $_POST['abba_display_term'];
    
    $abba_get_instituion_id = $_POST['abba_instituion_id'];

    $abba_display_term_name = $_POST['abba_display_term_name'];

    $sql_campus = ("SELECT * FROM `campus` WHERE CampusID = '$abba_campus_id'");
	$result_campus = mysqli_query($link, $sql_campus);
	$row_campus = mysqli_fetch_assoc($result_campus);
	$row_cnt_campus = mysqli_num_rows($result_campus);

    $abba_campus_name = $row_campus['CampusName'];

    $sqlinstitution = ("SELECT * FROM `institution` WHERE InstitutionID = '$abba_get_instituion_id'");
	$resultinstitution = mysqli_query($link, $sqlinstitution);
	$rowinstitution = mysqli_fetch_assoc($resultinstitution);
	$row_cntinstitution = mysqli_num_rows($resultinstitution);

	$InstitutionLogo = $rowinstitution['InstitutionLogo'];

    $InstitutionGeneralName = $rowinstitution['InstitutionGeneralName'];

    $sqlgetclassname = mysqli_query($link,"SELECT * FROM `classordepartment` WHERE `ClassOrDepartmentID` ='$class_id' AND CampusID='$abba_campus_id'");
    $rowgetclassname = mysqli_fetch_array($sqlgetclassname);
    
    $teacherid = $rowgetclassname['HODOrFormTeacherUserID'];

    $getgrademethod = $rowgetclassname['GradingMethodID'];

    $class_name = $rowgetclassname['ClassOrDepartmentName'];

    $sqltogetstaffname = mysqli_query($link,"SELECT * FROM `staff` WHERE `StaffID`='$teacherid'");
    $rowtogetstaffname = mysqli_fetch_array($sqltogetstaffname);

    $SectionID = $rowgetclassname['SectionID'];

    // Concatenate the string
    $concatenated_string = $class_name . '_' . str_replace('/', '_', $abba_display_session) . '_' . $abba_display_term_name . '_Fees_Structure';

    // Replace all special characters with underscores
    $cleaned_string = preg_replace('/[^\w\d]/', '_', $concatenated_string);

    // Output the result
    echo '<input value="' . $cleaned_string . '" type="hidden" id="classdatadownload">';

    echo '<div id="abba_fee_structure">
        <div>
            <div class="abba_header-columns" style="margin-top:10px;">
                <div class="abba_logotype">
                    <img class="abba_logo" src="'.$InstitutionLogo.'" />
                    <p>'.$InstitutionGeneralName.'<br>('.$abba_campus_name.').</p>
                </div>
            </div>
        </div>
        
        <div class="abba_page" style="page-break-after: always">

            <div class="abba_table-box" style="color: black;">
                <table cellpadding="0" cellspacing="0" style="margin-top: 10px;">
                    <tbody>
                        <tr class="abba_item" style="background-color: lightgrey;">
                            <td colspan="4" style="font-size: larger;padding: 10px;font-weight: 600;">Compulsory Fees</td>
                        </tr>

                        <tr class="abba_heading">
                            <td>SN</td>
                            <td>Category</td>
                            <td>Item</td>
                            <td>Amount</td>
                        </tr>';
                        
                        $sql_category = ("SELECT DISTINCT chargestructure.CategoryID,CategoryTitle  FROM `category` INNER JOIN subcategory ON category.CategoryID=subcategory.CategoryID INNER JOIN chargestructure ON subcategory.CategoryID=chargestructure.CategoryID AND subcategory.SubcategoryID=chargestructure.SubcategoryID WHERE chargestructure.InstitutionID = '$abba_get_instituion_id' AND chargestructure.CampusID = '$abba_campus_id' AND chargestructure.Session = '$abba_display_session' AND chargestructure.TermOrSemesterID = '$abba_display_term' AND chargestructure.ClassOrDepartmentID = '$class_id' AND chargestructure.Status = 1 ORDER BY CategoryTitle");
                        $result_category = mysqli_query($link, $sql_category);
                        $row_category = mysqli_fetch_assoc($result_category);
                        $row_cnt_category = mysqli_num_rows($result_category);

                        if($row_cnt_category > 0)
                        {
                            $cnt = 0;

                            do{

                                $cnt++;

                                $category_id = $row_category['CategoryID'];

                                $sql_category_check = ("SELECT *  FROM `subcategory` INNER JOIN chargestructure ON subcategory.CategoryID=chargestructure.CategoryID AND subcategory.SubcategoryID=chargestructure.SubcategoryID WHERE chargestructure.InstitutionID = '$abba_get_instituion_id' AND chargestructure.CampusID = '$abba_campus_id' AND chargestructure.Session = '$abba_display_session' AND chargestructure.TermOrSemesterID = '$abba_display_term' AND chargestructure.ClassOrDepartmentID = '$class_id' AND chargestructure.Status = 1 AND subcategory.CategoryID = $category_id AND chargestructure.CategoryID = $category_id ORDER BY SubcategoryTitle");
                                $result_category_check = mysqli_query($link, $sql_category_check);
                                $row_category_check = mysqli_fetch_assoc($result_category_check);
                                $row_cnt_category_check = mysqli_num_rows($result_category_check);

                                if($row_cnt_category_check > 0)
                                {
                                    $tot_cnt = $row_cnt_category_check;
                                }
                                else{
                                    $tot_cnt = 0;
                                }
                            
                                echo '<tr class="abba_item">
                                    <td rowspan="'.($tot_cnt + 1).'">'.$cnt.'.</td>
                                    <td rowspan="'.($tot_cnt + 1).'">'.$row_category['CategoryTitle'].'</td>
                                </tr>';

                                do{
                                    echo '<tr class="abba_item">
                                        <td>'.$row_category_check['SubcategoryTitle'].'</td>
                                        <td>₦ '.number_format($row_category_check['Amount']).'</td>
                                    </tr>';
                                }while($row_category_check = mysqli_fetch_assoc($result_category_check));

                            }while($row_category = mysqli_fetch_assoc($result_category));

                        }
                        else{
                            echo '<tr class="abba_item" align="center">
                                <td colspan="4">No records found</td>
                            </tr>';
                        }
                    echo '</tbody>
                </table>

                <table cellpadding="0" cellspacing="0" style="margin-top: 10px;">
                    <tbody>
                        <tr class="abba_item" style="background-color: lightgrey;">
                            <td colspan="4" style="font-size: larger;padding: 10px;font-weight: 600;">Optional Fees</td>
                        </tr>

                        <tr class="abba_heading">
                            <td>SN</td>
                            <td>Category</td>
                            <td>Item</td>
                            <td>Amount</td>
                        </tr>';

                        $sql_category_optional = ("SELECT DISTINCT chargestructure.CategoryID,CategoryTitle  FROM `category` INNER JOIN subcategory ON category.CategoryID=subcategory.CategoryID INNER JOIN chargestructure ON subcategory.CategoryID=chargestructure.CategoryID AND subcategory.SubcategoryID=chargestructure.SubcategoryID WHERE chargestructure.InstitutionID = '$abba_get_instituion_id' AND chargestructure.CampusID = '$abba_campus_id' AND chargestructure.Session = '$abba_display_session' AND chargestructure.TermOrSemesterID = '$abba_display_term' AND chargestructure.ClassOrDepartmentID = '$class_id' AND chargestructure.Status = 0 ORDER BY CategoryTitle");
                        $result_category_optional = mysqli_query($link, $sql_category_optional);
                        $row_category_optional = mysqli_fetch_assoc($result_category_optional);
                        $row_cnt_category_optional = mysqli_num_rows($result_category_optional);

                        if($row_cnt_category_optional > 0)
                        {
                            $cnt_optional = 0;

                            do{

                                $cnt_optional++;

                                $category_id_optional = $row_category_optional['CategoryID'];

                                $sql_category_check_optional = ("SELECT *  FROM `subcategory` INNER JOIN chargestructure ON subcategory.CategoryID=chargestructure.CategoryID AND subcategory.SubcategoryID=chargestructure.SubcategoryID WHERE chargestructure.InstitutionID = '$abba_get_instituion_id' AND chargestructure.CampusID = '$abba_campus_id' AND chargestructure.Session = '$abba_display_session' AND chargestructure.TermOrSemesterID = '$abba_display_term' AND chargestructure.ClassOrDepartmentID = '$class_id' AND chargestructure.Status = 0 AND subcategory.CategoryID = $category_id_optional AND chargestructure.CategoryID = $category_id_optional ORDER BY SubcategoryTitle");
                                $result_category_check_optional = mysqli_query($link, $sql_category_check_optional);
                                $row_category_check_optional = mysqli_fetch_assoc($result_category_check_optional);
                                $row_cnt_category_check_optional = mysqli_num_rows($result_category_check_optional);

                                if($row_cnt_category_check_optional > 0)
                                {
                                    $tot_cnt_optional = $row_cnt_category_check_optional;
                                }
                                else{
                                    $tot_cnt_optional = 0;
                                }
                            
                                echo '<tr class="abba_item">
                                    <td rowspan="'.($tot_cnt_optional + 1).'">'.$cnt_optional.'.</td>
                                    <td rowspan="'.($tot_cnt_optional + 1).'">'.$row_category_optional['CategoryTitle'].'</td>
                                </tr>';

                                do{
                                    echo '<tr class="abba_item">
                                        <td>'.$row_category_check_optional['SubcategoryTitle'].'</td>
                                        <td>₦ '.number_format($row_category_check_optional['Amount']).'</td>
                                    </tr>';
                                }while($row_category_check_optional = mysqli_fetch_assoc($result_category_check_optional));

                            }while($row_category_optional = mysqli_fetch_assoc($result_category_optional));

                        }
                        else{
                            echo '<tr class="abba_item" align="center">
                                <td colspan="4">No records found</td>
                            </tr>';
                        }
                    echo '</tbody>
                </table>
            </div>
        </div>
    </div>';
    
?>