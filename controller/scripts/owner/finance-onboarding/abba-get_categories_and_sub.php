<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../../../config/config.php');

$campus_id = $_POST['campus_id'];

$abba_display_session = $_POST['abba_display_session'];

$abba_display_term = $_POST['abba_display_term'];

$abba_instituion_id = $_POST['abba_instituion_id'];

$class_id = implode(',',$_POST['class_id']);

$click_from = $_POST['click_from'];

if($click_from == 0)
{
    $singleclass = '';
}
else
{
    $singleclass = 'abba_subcat_checkbox_single_add';
}

// get total parent
$abba_sql_check_category = ("SELECT * FROM `category` WHERE CategoryType = 'income' ORDER BY CategoryTitle");
$abba_result_check_category = mysqli_query($link, $abba_sql_check_category);
$abba_row_check_category = mysqli_fetch_assoc($abba_result_check_category);
$abba_row_cnt_check_category = mysqli_num_rows($abba_result_check_category);

if ($abba_row_cnt_check_category > 0) 
{

    echo '<section class="ac-container">';

    $cnt = 0;

    do{

        $cnt++;

        $category_id = $abba_row_check_category['CategoryID'];

        if ($cnt == 1) {
            $checked = 'checked';
        } else {
            $checked = '';
        }

        echo '<div class="pb-4 section-dis-card uniqueclass' . $category_id . '" data-canumb = "abba_section_ca_num' . $cnt . '" data-id = "' . $category_id . '" data-uniqueclass = "uniqueclass' . $category_id . '">
            <input class="abba_input" id="ac-' . $category_id . '" name="accordion-1" type="radio" ' . $checked . '>
            <label class="abba_label" for="ac-' . $category_id . '">' . $abba_row_check_category['CategoryTitle'] . '</label>
            <article class="ac-medium">
                <div style="padding-left:30px;padding-right:30px;">

                    <div class="row pt-2 pb-2 abba_append_item_'.$category_id.'">';
                    
                        if($category_id == '27')
                        {
                            // get classes
                            $abba_sql_check_subcategory = ("SELECT * FROM `transportationtable` WHERE CampusID=$campus_id ORDER BY RouteName ASC");
                            $abba_result_check_subcategory = mysqli_query($link, $abba_sql_check_subcategory);
                            $abba_row_check_subcategory = mysqli_fetch_assoc($abba_result_check_subcategory);
                            $abba_row_cnt_check_subcategory = mysqli_num_rows($abba_result_check_subcategory);
    
                            if ($abba_row_cnt_check_subcategory > 0)
                            {
                                echo '<div class="col-md-12">
    
                                    <fieldset class="tari-tari_checkbox-group">
                                        <div class="tari_checkbox ">
                                            <label for="abba_check_subcat_for_cat_'.$category_id.'" class="tari_checkbox-wrapper">
                                                <input type="checkbox" value="" id="abba_check_subcat_for_cat_'.$category_id.'"  class="tari_checkbox-input abba_select_all_subcat" data-id="abba_check_finance_subcat_all'.$category_id.'" data-span="abba_check_subcat_for_cat_'.$category_id.'_span"/>
                                                <span class="tari_checkbox-tile">
                                                <span class="tari_checkbox-label">Select All <!--- <span id="abba_check_subcat_for_cat_'.$category_id.'_span"></span> --></span>
                                                </span>
                                            </label>
                                        </div>
                                    </fieldset>
                                </div>';
    
                                do{
                                    
                                    $subcategory_id = $abba_row_check_subcategory['RouteID'];
    
                                    $subcategory_title = $abba_row_check_subcategory['RouteName'];
    
                                    $abba_sql_transactions = ("SELECT * FROM `transactions` WHERE `CategoryID` = '$category_id'
                                     AND `SubcategoryID` = '$subcategory_id' AND `ClassOrDepartmentID` = '$class_id' AND `Session` = '$abba_display_session' AND `TermOrSemesterID` = '$abba_display_term' AND `DeleteStatus` != '1' AND `CampusID` = '$campus_id'");
                                    $abba_result_transactions = mysqli_query($link, $abba_sql_transactions);
                                    $abba_row_transactions = mysqli_fetch_assoc($abba_result_transactions);
                                    $abba_row_cnt_transactions = mysqli_num_rows($abba_result_transactions);
                                    
                                    if ($abba_row_cnt_transactions > 0) 
                                    {
                                        $checked = 'checked';
                                        
                                        $disabled = "disabled";
                                        $style = "background-color:lightgrey;border-color:lightgrey;";
                                        $text = "(Already Paid For)";
                                    }
                                    else{
                                        
                                        $abba_sql_chargestructure = ("SELECT * FROM `chargestructure` WHERE `InstitutionID` = '$abba_instituion_id' AND `CampusID` = '$campus_id' AND `Session` = '$abba_display_session' AND `TermOrSemesterID` = '$abba_display_term' AND `ClassOrDepartmentID` IN ($class_id) AND `CategoryID`='$category_id' AND `SubcategoryID` = '$subcategory_id'");
                                        $abba_result_chargestructure = mysqli_query($link, $abba_sql_chargestructure);
                                        $abba_row_chargestructure = mysqli_fetch_assoc($abba_result_chargestructure);
                                        $abba_row_cnt_chargestructure = mysqli_num_rows($abba_result_chargestructure);
        
                                        if($abba_row_cnt_chargestructure > 0)
                                        {
                                            $checked = 'checked';
                                        }
                                        else{
                                            $checked = '';
                                        }
        
                                        $disabled = "";
                                        $style = "";
                                        $text = "";
                                    }
                                    
                                    echo '<div class="col-md-12 col-lg-3">
                                    
                                        <fieldset class="tari-tari_checkbox-group">
                                            <div class="tari_checkbox ">
                                                <label for="abba_check_finance_subcat_'.$subcategory_id.'" class="tari_checkbox-wrapper">
                                                    <input type="checkbox" '.$checked.' '.$disabled.' value="'.$subcategory_title.'" id="abba_check_finance_subcat_'.$subcategory_id.'" class="tari_checkbox-input abba_check_finance_subcat_all'.$category_id.' abba_check_finance_cat'.$category_id.'_subcat_'.$subcategory_id.' abba_check_subcat_for_cat_for_add'.$subcategory_id.' abba_subcat_checkbox '.$singleclass.'" data-maincheck="abba_check_subcat_for_cat_'.$category_id.'" data-span="abba_check_subcat_for_cat_'.$category_id.'_span" data-unique="abba_check_finance_subcat_all'.$category_id.'"
                                                    data-mine="abba_check_finance_cat'.$category_id.'_subcat_'.$subcategory_id.'"
                                                    data-id="'.$category_id.'" data-subcat="'.$subcategory_id.'"/>
                                                    <span class="tari_checkbox-tile" style="'.$style.'">
                                                        <span class="tari_checkbox-label">'.$subcategory_title.'</br> '.$text.'</span>
                                                    </span>
                                                </label>
                                            </div>
                                        </fieldset>
                                    </div>';
                                }while($abba_row_check_subcategory = mysqli_fetch_assoc($abba_result_check_subcategory));
                                
                            }
                            else
                            {
                                echo '<div align="center" class="mt-2"><img src="../../assets/images/adminImg/err.png" style="width:10%;"/><p class="pt-2 fs-sm text-secondary">No sub-category was found.</p></div>';
    
                            }
                        }
                        elseif($category_id == '26')
                        {
                            // get classes
                            $abba_sql_check_subcategory = ("SELECT * FROM `hosteltable` WHERE CampusID=$campus_id ORDER BY HostelName ASC");
                            $abba_result_check_subcategory = mysqli_query($link, $abba_sql_check_subcategory);
                            $abba_row_check_subcategory = mysqli_fetch_assoc($abba_result_check_subcategory);
                            $abba_row_cnt_check_subcategory = mysqli_num_rows($abba_result_check_subcategory);
    
                            if ($abba_row_cnt_check_subcategory > 0)
                            {
                                echo '<div class="col-md-12">
    
                                    <fieldset class="tari-tari_checkbox-group">
                                        <div class="tari_checkbox ">
                                            <label for="abba_check_subcat_for_cat_'.$category_id.'" class="tari_checkbox-wrapper">
                                                <input type="checkbox" value="" id="abba_check_subcat_for_cat_'.$category_id.'"  class="tari_checkbox-input abba_select_all_subcat" data-id="abba_check_finance_subcat_all'.$category_id.'" data-span="abba_check_subcat_for_cat_'.$category_id.'_span"/>
                                                <span class="tari_checkbox-tile">
                                                <span class="tari_checkbox-label">Select All <!--- <span id="abba_check_subcat_for_cat_'.$category_id.'_span"></span> --></span>
                                                </span>
                                            </label>
                                        </div>
                                    </fieldset>
                                </div>';
    
                                do{
                                    
                                    $subcategory_id = $abba_row_check_subcategory['HostelID'];
    
                                    $subcategory_title = $abba_row_check_subcategory['HostelName'];
    
                                    $abba_sql_transactions = ("SELECT * FROM `transactions` WHERE `CategoryID` = '$category_id' AND `SubcategoryID` = '$subcategory_id' AND `ClassOrDepartmentID` = '$class_id' AND `Session` = '$abba_display_session' AND `TermOrSemesterID` = '$abba_display_term' AND `DeleteStatus` != '1' AND `CampusID` = '$campus_id'");
                                    $abba_result_transactions = mysqli_query($link, $abba_sql_transactions);
                                    $abba_row_transactions = mysqli_fetch_assoc($abba_result_transactions);
                                    $abba_row_cnt_transactions = mysqli_num_rows($abba_result_transactions);
                                    
                                    if ($abba_row_cnt_transactions > 0) 
                                    {
                                        $checked = 'checked';
                                        
                                        $disabled = "disabled";
                                        $style = "background-color:lightgrey;border-color:lightgrey;";
                                        $text = "(Already Paid For)";
                                    }
                                    else{
                                        
                                        $abba_sql_chargestructure = ("SELECT * FROM `chargestructure` WHERE `InstitutionID` = '$abba_instituion_id' AND `CampusID` = '$campus_id' AND `Session` = '$abba_display_session' AND `TermOrSemesterID` = '$abba_display_term' AND `ClassOrDepartmentID` IN ($class_id) AND `CategoryID`='$category_id' AND `SubcategoryID` = '$subcategory_id'");
                                        $abba_result_chargestructure = mysqli_query($link, $abba_sql_chargestructure);
                                        $abba_row_chargestructure = mysqli_fetch_assoc($abba_result_chargestructure);
                                        $abba_row_cnt_chargestructure = mysqli_num_rows($abba_result_chargestructure);
        
                                        if($abba_row_cnt_chargestructure > 0)
                                        {
                                            $checked = 'checked';
                                        }
                                        else{
                                            $checked = '';
                                        }
        
                                        $disabled = "";
                                        $style = "";
                                        $text = "";
                                    }
                                    
                                    echo '<div class="col-md-12 col-lg-3">
                                    
                                        <fieldset class="tari-tari_checkbox-group">
                                            <div class="tari_checkbox ">
                                                <label for="abba_check_finance_subcat_'.$subcategory_id.'" class="tari_checkbox-wrapper">
                                                    <input type="checkbox" '.$checked.' '.$disabled.' value="'.$subcategory_title.'" id="abba_check_finance_subcat_'.$subcategory_id.'" class="tari_checkbox-input abba_check_finance_subcat_all'.$category_id.' abba_check_finance_cat'.$category_id.'_subcat_'.$subcategory_id.' abba_check_subcat_for_cat_for_add'.$subcategory_id.' abba_subcat_checkbox '.$singleclass.'" data-maincheck="abba_check_subcat_for_cat_'.$category_id.'" data-span="abba_check_subcat_for_cat_'.$category_id.'_span" data-unique="abba_check_finance_subcat_all'.$category_id.'"
                                                    data-mine="abba_check_finance_cat'.$category_id.'_subcat_'.$subcategory_id.'"
                                                    data-id="'.$category_id.'" data-subcat="'.$subcategory_id.'"/>
                                                    <span class="tari_checkbox-tile" style="'.$style.'">
                                                        <span class="tari_checkbox-label">'.$subcategory_title.'</br> '.$text.'</span>
                                                    </span>
                                                </label>
                                            </div>
                                        </fieldset>
                                    </div>';
                                }while($abba_row_check_subcategory = mysqli_fetch_assoc($abba_result_check_subcategory));
                                
                            }
                            else
                            {
                                echo '<div align="center" class="mt-2"><img src="../../assets/images/adminImg/err.png" style="width:10%;"/><p class="pt-2 fs-sm text-secondary">No sub-category was found.</p></div>';
    
                            }
                        }
                        else
                        {
                            // get classes
                            $abba_sql_check_subcategory = ("SELECT * FROM `subcategory` WHERE CategoryID=$category_id ORDER BY SubcategoryTitle ASC");
                            $abba_result_check_subcategory = mysqli_query($link, $abba_sql_check_subcategory);
                            $abba_row_check_subcategory = mysqli_fetch_assoc($abba_result_check_subcategory);
                            $abba_row_cnt_check_subcategory = mysqli_num_rows($abba_result_check_subcategory);
    
                            if ($abba_row_cnt_check_subcategory > 0)
                            {
                                echo '<div class="col-md-12">
    
                                    <fieldset class="tari-tari_checkbox-group">
                                        <div class="tari_checkbox ">
                                            <label for="abba_check_subcat_for_cat_'.$category_id.'" class="tari_checkbox-wrapper">
                                                <input type="checkbox" value="" id="abba_check_subcat_for_cat_'.$category_id.'"  class="tari_checkbox-input abba_select_all_subcat" data-id="abba_check_finance_subcat_all'.$category_id.'" data-span="abba_check_subcat_for_cat_'.$category_id.'_span"/>
                                                <span class="tari_checkbox-tile">
                                                <span class="tari_checkbox-label">Select All <!--- <span id="abba_check_subcat_for_cat_'.$category_id.'_span"></span> --></span>
                                                </span>
                                            </label>
                                        </div>
                                    </fieldset>
                                </div>';
    
                                do{
                                    
                                    $subcategory_id = $abba_row_check_subcategory['SubcategoryID'];
    
                                    $subcategory_title = $abba_row_check_subcategory['SubcategoryTitle'];
    
                                    $abba_sql_transactions = ("SELECT * FROM `transactions` WHERE `CategoryID` = '$category_id' AND `SubcategoryID` = '$subcategory_id' AND `ClassOrDepartmentID` = '$class_id' AND `Session` = '$abba_display_session' AND `TermOrSemesterID` = '$abba_display_term' AND `DeleteStatus` != '1' AND `CampusID` = '$campus_id'");
                                    $abba_result_transactions = mysqli_query($link, $abba_sql_transactions);
                                    $abba_row_transactions = mysqli_fetch_assoc($abba_result_transactions);
                                    $abba_row_cnt_transactions = mysqli_num_rows($abba_result_transactions);
                                    
                                    if ($abba_row_cnt_transactions > 0) 
                                    {
                                        $checked = 'checked';
                                        
                                        $disabled = "disabled";
                                        $style = "background-color:lightgrey;border-color:lightgrey;";
                                        $text = "(Already Paid For)";
                                    }
                                    else{
                                        
                                        $abba_sql_chargestructure = ("SELECT * FROM `chargestructure` WHERE `InstitutionID` = '$abba_instituion_id' AND `CampusID` = '$campus_id' AND `Session` = '$abba_display_session' AND `TermOrSemesterID` = '$abba_display_term' AND `ClassOrDepartmentID` IN ($class_id) AND `CategoryID`='$category_id' AND `SubcategoryID` = '$subcategory_id'");
                                        $abba_result_chargestructure = mysqli_query($link, $abba_sql_chargestructure);
                                        $abba_row_chargestructure = mysqli_fetch_assoc($abba_result_chargestructure);
                                        $abba_row_cnt_chargestructure = mysqli_num_rows($abba_result_chargestructure);
        
                                        if($abba_row_cnt_chargestructure > 0)
                                        {
                                            $checked = 'checked';
                                        }
                                        else{
                                            $checked = '';
                                        }
        
                                        $disabled = "";
                                        $style = "";
                                        $text = "";
                                    }
                                    
                                    echo '<div class="col-md-12 col-lg-3">
                                    
                                        <fieldset class="tari-tari_checkbox-group">
                                            <div class="tari_checkbox ">
                                                <label for="abba_check_finance_subcat_'.$subcategory_id.'" class="tari_checkbox-wrapper">
                                                    <input type="checkbox" '.$checked.' '.$disabled.' value="'.$subcategory_title.'" id="abba_check_finance_subcat_'.$subcategory_id.'" class="tari_checkbox-input abba_check_finance_subcat_all'.$category_id.' abba_check_finance_cat'.$category_id.'_subcat_'.$subcategory_id.' abba_check_subcat_for_cat_for_add'.$subcategory_id.' abba_subcat_checkbox '.$singleclass.'" data-maincheck="abba_check_subcat_for_cat_'.$category_id.'" data-span="abba_check_subcat_for_cat_'.$category_id.'_span" data-unique="abba_check_finance_subcat_all'.$category_id.'"
                                                    data-mine="abba_check_finance_cat'.$category_id.'_subcat_'.$subcategory_id.'"
                                                    data-id="'.$category_id.'" data-subcat="'.$subcategory_id.'"/>
                                                    <span class="tari_checkbox-tile" style="'.$style.'">
                                                        <span class="tari_checkbox-label">'.$subcategory_title.'</br> '.$text.'</span>
                                                    </span>
                                                </label>
                                            </div>
                                        </fieldset>
                                    </div>';
                                }while($abba_row_check_subcategory = mysqli_fetch_assoc($abba_result_check_subcategory));
                                
                            }
                            else
                            {
                                echo '<div align="center" class="mt-2"><img src="../../assets/images/adminImg/err.png" style="width:10%;"/><p class="pt-2 fs-sm text-secondary">No sub-category was found.</p></div>';
    
                            }
                        }
                        
                    echo '</div>

                    <div align="right" class="mb-2"><span style="cursor:pointer;" class="abba_add_item_btn" data-div="abba_append_item_'.$category_id.'" data-id="'.$category_id.'" data-bs-toggle="modal" data-bs-target="#abba_add_item_Modal"><i class="fas fa-plus-circle text-primary fs-6"> Add Item</i></span></div>
                </div>
            </article>
        </div>';

    } while ($abba_row_check_category = mysqli_fetch_assoc($abba_result_check_category));

    echo '</section>';
} else {
    echo '<div align="center" class="mt-2"><img src="../../assets/images/adminImg/err.png" style="width:15%;"/><p class="pt-2 fs-6 text-secondary">No records found.</p></div>';
    
}

?>