<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../../../config/config.php');

$campus_id = $_POST['campus_id'];

$abba_display_session = $_POST['abba_display_session'];

$abba_display_term = $_POST['abba_display_term'];

$abba_instituion_id = $_POST['abba_instituion_id'];

$class_id = implode(',',$_POST['class_id']);

$sub_cat_id = implode(',',$_POST['sub_cat_id']);

$cat_id = implode(',',$_POST['cat_id']);


// Numbers to keep
$cat_id_transport = array(27);

// Filter out unwanted numbers
$filtered_cat_id_transport = array_filter($cat_id_transport, function ($number) use ($cat_id) {
    return strpos($cat_id, (string) $number) !== false;
});

// Create a string with the numbers to keep
$filtered_cat_id_transport_String = implode(',', $filtered_cat_id_transport);

// // Numbers to keep
$cat_id_hostel = array(26);

// Filter out unwanted numbers
$filtered_cat_id_hostel = array_filter($cat_id_hostel, function ($number_hostel) use ($cat_id) {
    return strpos($cat_id, (string) $number_hostel) !== false;
});

// Create a string with the numbers to keep
$filtered_cat_id_hostel_String = implode(',', $filtered_cat_id_hostel);


// get total parent
$abba_sql_subcategory = ("SELECT subcategory.SubcategoryID, subcategory.CategoryID, subcategory.SubcategoryTitle, chargestructure.Amount, chargestructure.Status FROM `subcategory` LEFT JOIN chargestructure ON subcategory.CategoryID=chargestructure.CategoryID AND subcategory.SubcategoryID=chargestructure.SubcategoryID AND chargestructure.Session = '$abba_display_session' AND chargestructure.TermOrSemesterID = $abba_display_term AND chargestructure.ClassOrDepartmentID = $class_id AND chargestructure.InstitutionID = $abba_instituion_id AND chargestructure.CampusID = $campus_id WHERE subcategory.SubcategoryID IN ($sub_cat_id) AND subcategory.CategoryID IN ($cat_id)");
$abba_result_subcategory = mysqli_query($link, $abba_sql_subcategory);
$abba_row_subcategory = mysqli_fetch_assoc($abba_result_subcategory);
$abba_row_cnt_subcategory = mysqli_num_rows($abba_result_subcategory);

if ($abba_row_cnt_subcategory > 0) 
{
    $cnt = 0;

    do{

        $cnt++;

        $sub_category_id = $abba_row_subcategory['SubcategoryID'];

        $category_id = $abba_row_subcategory['CategoryID'];

        $sub_category_name = $abba_row_subcategory['SubcategoryTitle'];

        $sub_category_amount = $abba_row_subcategory['Amount'];

        if($abba_row_subcategory['Status'] == 1 || $abba_row_subcategory['Status'] == '' || $abba_row_subcategory['Status'] == NULL)
        {
            $checked = 'checked';
        }
        else{
            $checked = '';
        }

        $subcatlistmine = 'abba_check_subcat_for_cat_for_add'.$sub_category_id.'';
        $maincheck ='abba_check_finance_cat_for_add'.$category_id.'_subcat_'.$sub_category_id.'';

        echo '<div class="row mt-3 g-3 align-items-center abba_items_amt_add_single_new" data-cat="'.$category_id.'" data-subcat="'.$sub_category_id.'">
            <div class="col-lg-3 col-md-6 mt-1">
                <div class="form-group">
                    <h6>'.$sub_category_name.'</h6>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mt-1">
                <div class="form-group">
                    <input type="number" class="form-control form-control-sm" placeholder="Enter Amount" value="'.$sub_category_amount.'"> 
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-1">
                <div class="form-group">
                    <label class="abba-toggler-wrapper abba-style-23">
                        <input type="checkbox" '.$checked.'>
                        <div class="abba-toggler-slider">
                            <div class="abba-toggler-knob"></div>
                        </div>
                    </label>
                </div>
            </div>
            <div class="col-lg-1 col-md-6 removeappendform" data-line="removeline_for_add'. $sub_category_id.$category_id.'" data-id="'.$subcatlistmine.'" data-maincheck="'.$maincheck.'">
                <div class="form-group">';
                
                    $abba_sql_transactions = ("SELECT * FROM `transactions` WHERE `CategoryID` = '$category_id' AND `SubcategoryID` = '$sub_category_id' AND `ClassOrDepartmentID` = '$class_id' AND `Session` = '$abba_display_session' AND `TermOrSemesterID` = '$abba_display_term' AND `DeleteStatus` != '1' AND `CampusID` = '$campus_id'");
                    $abba_result_transactions = mysqli_query($link, $abba_sql_transactions);
                    $abba_row_transactions = mysqli_fetch_assoc($abba_result_transactions);
                    $abba_row_cnt_transactions = mysqli_num_rows($abba_result_transactions);
                    
                    if ($abba_row_cnt_transactions > 0) 
                    {
                        
                    }
                    else
                    {
                        echo '<i class="fa fa-times fs-4 text-danger" style="cursor:pointer;"></i>';
                    }
                
                echo '</div>
            </div>
        </div><hr id="removeline_for_add'.$sub_category_id. $category_id.'">';

    } while ($abba_row_subcategory = mysqli_fetch_assoc($abba_result_subcategory));

} else {
    echo '<div align="center" class="mt-2"><img src="../../assets/images/adminImg/err.png" style="width:15%;"/><p class="pt-2 fs-6 text-secondary">No records found.</p></div>';
    
}



if($filtered_cat_id_transport_String == '27')
{
    // get classes
    $abba_sql_check_transportationtable = ("SELECT transportationtable.RouteID, chargestructure.CategoryID, transportationtable.RouteName, chargestructure.Amount, chargestructure.Status 
        FROM `transportationtable` 
        LEFT JOIN chargestructure ON transportationtable.RouteID=chargestructure.SubcategoryID AND chargestructure.Session = '$abba_display_session' AND chargestructure.TermOrSemesterID = $abba_display_term AND chargestructure.ClassOrDepartmentID = $class_id AND chargestructure.InstitutionID = $abba_instituion_id AND chargestructure.CampusID = $campus_id AND chargestructure.CategoryID = $filtered_cat_id_transport_String 
        WHERE transportationtable.RouteID IN ($sub_cat_id) AND transportationtable.CampusID = $campus_id ORDER BY RouteName ASC");
    $abba_result_check_transportationtable = mysqli_query($link, $abba_sql_check_transportationtable);
    $abba_row_check_transportationtable = mysqli_fetch_assoc($abba_result_check_transportationtable);
    $abba_row_cnt_check_transportationtable = mysqli_num_rows($abba_result_check_transportationtable);

    if ($abba_row_cnt_check_transportationtable > 0)
    {
        $cnt = 0;

        do{
    
            $cnt++;
    
            $sub_category_id_transport = $abba_row_check_transportationtable['RouteID'];
    
            $category_id_transport = $filtered_cat_id_transport_String;
    
            $sub_category_name_transport = $abba_row_check_transportationtable['RouteName'];
    
            $sub_category_amount_transport = $abba_row_check_transportationtable['Amount'];
    
            if($abba_row_check_transportationtable['Status'] == 1 || $abba_row_check_transportationtable['Status'] == '' || $abba_row_check_transportationtable['Status'] == NULL)
            {
                $checked_tp = 'checked';
            }
            else{
                $checked_tp = '';
            }
    
            $subcatlistmine_tp = 'abba_check_subcat_for_cat_for_add'.$sub_category_id_transport.'';
            $maincheck_tp ='abba_check_finance_cat_for_add'.$category_id_transport.'_subcat_'.$sub_category_id_transport.'';
    
            echo '<div class="row mt-3 g-3 align-items-center abba_items_amt_add_single_new" data-cat="'.$category_id_transport.'" data-subcat="'.$sub_category_id_transport.'">
                <div class="col-lg-3 col-md-6 mt-1">
                    <div class="form-group">
                        <h6>'.$sub_category_name_transport.'</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-1">
                    <div class="form-group">
                        <input type="number" class="form-control form-control-sm" placeholder="Enter Amount" value="'.$sub_category_amount_transport.'"> 
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-1">
                    <div class="form-group">
                        <label class="abba-toggler-wrapper abba-style-23">
                            <input type="checkbox" '.$checked_tp.'>
                            <div class="abba-toggler-slider">
                                <div class="abba-toggler-knob"></div>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="col-lg-1 col-md-6 removeappendform" data-line="removeline_for_add'. $sub_category_id_transport.$category_id_transport.'" data-id="'.$subcatlistmine_tp.'" data-maincheck="'.$maincheck_tp.'">
                    <div class="form-group">';
                    
                        $abba_sql_transactions_tp = ("SELECT * FROM `transactions` WHERE `CategoryID` = '$sub_category_id_transport' AND `SubcategoryID` = '$sub_category_id_transport' AND `ClassOrDepartmentID` = '$class_id' AND `Session` = '$abba_display_session' AND `TermOrSemesterID` = '$abba_display_term' AND `DeleteStatus` != '1' AND `CampusID` = '$campus_id'");
                        $abba_result_transactions_tp = mysqli_query($link, $abba_sql_transactions_tp);
                        $abba_row_transactions_tp = mysqli_fetch_assoc($abba_result_transactions_tp);
                        $abba_row_cnt_transactions_tp = mysqli_num_rows($abba_result_transactions_tp);
                        
                        if ($abba_row_cnt_transactions_tp > 0) 
                        {
                            
                        }
                        else
                        {
                            echo '<i class="fa fa-times fs-4 text-danger" style="cursor:pointer;"></i>';
                        }
                    
                    echo '</div>
                </div>
            </div><hr id="removeline_for_add'. $sub_category_id_transport.$category_id_transport.'">';
    
        } while ($abba_row_check_transportationtable = mysqli_fetch_assoc($abba_result_check_transportationtable));
    }
    else
    {
       
    }
}
else
{
    
}

if($filtered_cat_id_hostel_String == '26')
{
    // get classes
    $abba_sql_check_hosteltable = ("SELECT hosteltable.HostelID, chargestructure.CategoryID, hosteltable.HostelName, chargestructure.Amount, chargestructure.Status 
        FROM `hosteltable` 
        LEFT JOIN chargestructure ON hosteltable.HostelID=chargestructure.SubcategoryID AND chargestructure.Session = '$abba_display_session' AND chargestructure.TermOrSemesterID = $abba_display_term AND chargestructure.ClassOrDepartmentID = $class_id AND chargestructure.InstitutionID = $abba_instituion_id AND chargestructure.CampusID = $campus_id AND chargestructure.CategoryID = $filtered_cat_id_transport_String 
        WHERE hosteltable.HostelID IN ($sub_cat_id) AND hosteltable.CampusID = $campus_id ORDER BY HostelName ASC");
    $abba_result_check_hosteltable = mysqli_query($link, $abba_sql_check_hosteltable);
    $abba_row_check_hosteltable = mysqli_fetch_assoc($abba_result_check_hosteltable);
    $abba_row_cnt_check_hosteltable = mysqli_num_rows($abba_result_check_hosteltable);

    if ($abba_row_cnt_check_hosteltable > 0)
    {
        $cnt = 0;

        do{
    
            $cnt++;
    
            $sub_category_id_hostel = $abba_row_check_hosteltable['HostelID'];
    
            $category_id_hostel = $filtered_cat_id_hostel_String;
    
            $sub_category_name_hostel = $abba_row_check_hosteltable['HostelName'];
    
            $sub_category_amount_hostel = $abba_row_check_hosteltable['Amount'];
    
            if($abba_row_check_hosteltable['Status'] == 1 || $abba_row_check_hosteltable['Status'] == '' || $abba_row_check_hosteltable['Status'] == NULL)
            {
                $checked_hos = 'checked';
            }
            else{
                $checked_hos = '';
            }
    
            $subcatlistmine_hos = 'abba_check_subcat_for_cat_for_add'.$sub_category_id_hostel.'';
            $maincheck_hos ='abba_check_finance_cat_for_add'.$category_id_hostel.'_subcat_'.$sub_category_id_hostel.'';
    
            echo '<div class="row mt-3 g-3 align-items-center abba_items_amt_add_single_new" data-cat="'.$category_id_hostel.'" data-subcat="'.$sub_category_id_hostel.'">
                <div class="col-lg-3 col-md-6 mt-1">
                    <div class="form-group">
                        <h6>'.$sub_category_name_hostel.'</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-1">
                    <div class="form-group">
                        <input type="number" class="form-control form-control-sm" placeholder="Enter Amount" value="'.$sub_category_amount_hostel.'"> 
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-1">
                    <div class="form-group">
                        <label class="abba-toggler-wrapper abba-style-23">
                            <input type="checkbox" '.$checked_hos.'>
                            <div class="abba-toggler-slider">
                                <div class="abba-toggler-knob"></div>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="col-lg-1 col-md-6 removeappendform" data-line="removeline_for_add'. $sub_category_id_hostel.$category_id_hostel.'" data-id="'.$subcatlistmine_hos.'" data-maincheck="'.$maincheck_hos.'">
                    <div class="form-group">';
                    
                        $abba_sql_transactions_hos = ("SELECT * FROM `transactions` WHERE `CategoryID` = '$sub_category_id_hostel' AND `SubcategoryID` = '$sub_category_id_hostel' AND `ClassOrDepartmentID` = '$class_id' AND `Session` = '$abba_display_session' AND `TermOrSemesterID` = '$abba_display_term' AND `DeleteStatus` != '1' AND `CampusID` = '$campus_id'");
                        $abba_result_transactions_hos = mysqli_query($link, $abba_sql_transactions_hos);
                        $abba_row_transactions_hos = mysqli_fetch_assoc($abba_result_transactions_hos);
                        $abba_row_cnt_transactions_hos = mysqli_num_rows($abba_result_transactions_hos);
                        
                        if ($abba_row_cnt_transactions_hos > 0) 
                        {
                            
                        }
                        else
                        {
                            echo '<i class="fa fa-times fs-4 text-danger" style="cursor:pointer;"></i>';
                        }
                    
                    echo '</div>
                </div>
            </div><hr id="removeline_for_add'.$sub_category_id_hostel. $category_id_hostel.'">';
    
        } while ($abba_row_check_hosteltable = mysqli_fetch_assoc($abba_result_check_hosteltable));
    }
    else
    {
       
    }
}
else
{
    
}

if ($abba_row_cnt_subcategory < 1 && $filtered_cat_id_transport_String != '27' && $filtered_cat_id_hostel_String != '26') 
{
    echo '<div align="center" class="mt-2"><img src="../../assets/images/adminImg/err.png" style="width:15%;"/><p class="pt-2 fs-6 text-secondary">No records found.</p></div>';
    
} else {
    
}
?>