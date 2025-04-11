<?php

include("../../../config/config.php");

$get_budget_campus = $_POST['campusbudgeting'];
$get_budget_session = $_POST['sessionbudgeting'];
$get_budget_term = $_POST['termbudgeting'];
$get_budget_category_type = $_POST['categorytypebudgeting'];
$get_category_id = $_POST['emmacategorydataid'];
$get_sub_category_id = $_POST['emmasubcategorydataid'];
$get_budget_sub_category_title = $_POST['subcategorytypebudgeting'];

$get_budget_category_id_array = explode(',', $get_category_id);
$get_budget_sub_category_id_array = explode(',', $get_sub_category_id);
$get_budget_sub_category_title_array = explode(',', $get_budget_sub_category_title);

if($get_budget_category_type == 'income'){

    echo '<h4 class="card-header text-center font-weight-bold text-uppercase py-3">
                Income 
            </h4>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Items</th>
                        <th>Actual Amount</th>
                        <th>Budget Amount</th>
                        <th>Difference</th>
                    </tr>
                </thead>
                <div class="table-editable" style="margin: 0 5px 0 5px;">
                
                <tbody>';

        $emma_total_amount = 0;
        $totalbudgetedamount = 0;
        $totaldifferenceamount = 0;

        foreach ($get_budget_sub_category_title_array as $key => $emma_get_sub_category) {
            $subcategorynew = $get_budget_sub_category_id_array[$key];
            $categorynew = $get_budget_category_id_array[$key];
        
            $select_for_actual_amount = "SELECT SUM(Amount) AS compulsoryamount FROM `chargestructure` WHERE 
            `SubcategoryID` = '$subcategorynew' AND `CategoryID` = '$categorynew' ";
            $query_for_actual_amount = mysqli_query($link, $select_for_actual_amount);
            $fetch_for_actual_amount = mysqli_fetch_assoc($query_for_actual_amount);
            $rows_for_actual_amount = mysqli_num_rows($query_for_actual_amount);
        
            $emma_get_compulsory_amount = $fetch_for_actual_amount['compulsoryamount'];
        
            $select_for_optional_amount = "SELECT SUM(`chargestructure`.`Amount`) AS optionalamount FROM `assignoptionalfees` INNER JOIN `chargestructure` ON 
            `assignoptionalfees`.`ClassOrDepartmentID` = `chargestructure`.`ClassOrDepartmentID` AND `assignoptionalfees`.`SubcategoryID` = `chargestructure`.`SubcategoryID` 
            WHERE `assignoptionalfees`.`SubcategoryID` = '$subcategorynew' AND `assignoptionalfees`.`CategoryID` = '$categorynew' AND `chargestructure`.`Status` = 0 ";
            $query_for_optional_amount = mysqli_query($link, $select_for_optional_amount);
            $fetch_for_optional_amount = mysqli_fetch_assoc($query_for_optional_amount);
            $rows_for_optional_amount = mysqli_num_rows($query_for_optional_amount);
            
            $emma_get_optional_amount = $fetch_for_optional_amount['optionalamount'];
        
            $emma_actual_amount = $emma_get_optional_amount + $emma_get_compulsory_amount;
        
            $emma_total_amount+=$emma_actual_amount;
           
        
            $budgeting_select = "SELECT * FROM `budgeting` WHERE `CampusID` = '$get_budget_campus'  AND `sessionName` = '$get_budget_session' AND 
            `TermOrSemesterID` = '$get_budget_term' AND `CategoryType` = '$get_budget_category_type' AND `SubcategoryID` = '$subcategorynew' ";
            $budgeting_query = mysqli_query($link, $budgeting_select);
            $budgeting_fetch = mysqli_fetch_assoc($budgeting_query);
            $budgeting_rows = mysqli_num_rows($budgeting_query);
            
            if($budgeting_rows){
        
                $emma_get_amount = $budgeting_fetch['Amount'];
                $emma_get_budgeted_amount = $budgeting_fetch['BudgetedAmount'];
                $emma_get_difference_amount = $budgeting_fetch['Difference'];
                $emma_get_subcategory_id = $budgeting_fetch['SubcategoryID'];
        
                $amounamoutbudgetting = ($emma_get_budgeted_amount  == '') ? '' : '₦'.''.number_format($emma_get_budgeted_amount); 
                $amoundifferenceamoutbudgetting = ($emma_get_difference_amount  == '') ? '' : '₦'.''.number_format($emma_get_difference_amount);
        
                $totalbudgetedamount+=$emma_get_budgeted_amount;
                $totaldifferenceamount+=$emma_get_difference_amount;
        
        
            }else{
        
                $amounamoutbudgetting = '';
                $amoundifferenceamoutbudgetting = '';
            }
        
            echo'
                <input type="hidden" class="emmainputforactualamount'.$subcategorynew.'" value="'.$emma_actual_amount.'">
        
                <tr>
                    <input type="hidden" class="emmasubcategoryidforbudgeting" value="'.$subcategorynew.'">
                    <td class="pt-3-half emmasetandcalculatesubcategorytitle" contenteditable="false">'.$emma_get_sub_category.'</td>
                    <td class="pt-3-half emmasetandcalculateactualamount" data-id="'.$subcategorynew.'" contenteditable="false">₦'.number_format($emma_actual_amount).'</td>
                    <td class="pt-3-half emmasetandcalculatebudgetamount" emmabudgetamount'.$subcategorynew.' data-id="'.$subcategorynew.'" contenteditable="true">'.$amounamoutbudgetting.'</td>
                    <td class="pt-3-half emmasetandcalculatedifferenceamount emmadifferencecolumn'.$subcategorynew.'" contenteditable="false">'.$amoundifferenceamoutbudgetting.'</td>
                </tr>';
        }

    echo '<tr>
            <td class="pt-3-half fw-bold">Total Amount</td>
            <td class="pt-3-half fw-bold">₦'.number_format($emma_total_amount).'</td>
            <td class="pt-3-half fw-bold emmaloadtotalbudgetedamount">₦'.number_format($totalbudgetedamount).'</td>
            <td class="pt-3-half fw-bold emmaloadtotaldifferenceamount">₦'.number_format($totaldifferenceamount).'</td>
          </tr>
    </tbody>
    </table>';

}elseif ($get_budget_category_type == 'expenditure') {
    
    echo '<h4 class="card-header text-center font-weight-bold text-uppercase py-3">
                Income 
            </h4>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Items</th>
                        <th>Actual Amount</th>
                        <th>Budget Amount</th>
                        <th>Difference</th>
                    </tr>
                </thead>
                <div class="table-editable" style="margin: 0 5px 0 5px;">
                
                <tbody>';

        $emma_total_amount = 0;
        $totalbudgetedamount = 0;
        $totaldifferenceamount = 0;

    foreach ($get_budget_sub_category_title_array as $key => $emma_get_sub_category) {

        
        $subcategorynew = $get_budget_sub_category_id_array[$key];
        $categorynew = $get_budget_category_id_array[$key];

        $select_for_actual_amount = "SELECT  SUM(Amount) AS compulsoryamount FROM `chargestructure` WHERE 
        `SubcategoryID` = '$subcategorynew' AND `CategoryID` = '$categorynew' ";
        $query_for_actual_amount = mysqli_query($link, $select_for_actual_amount);
        $fetch_for_actual_amount = mysqli_fetch_assoc($query_for_actual_amount);
        $rows_for_actual_amount = mysqli_num_rows($query_for_actual_amount);

        $emma_get_compulsory_amount = $fetch_for_actual_amount['compulsoryamount'];

        $select_for_optional_amount = "SELECT SUM(`chargestructure`.`Amount`) AS optionalamount FROM `assignoptionalfees` INNER JOIN `chargestructure` ON 
        `assignoptionalfees`.`ClassOrDepartmentID` = `chargestructure`.`ClassOrDepartmentID` AND `assignoptionalfees`.`SubcategoryID` = `chargestructure`.`SubcategoryID` 
        WHERE `assignoptionalfees`.`SubcategoryID` = '$subcategorynew' AND `assignoptionalfees`.`CategoryID` = '$categorynew' AND `chargestructure`.`Status` = 0 ";
        $query_for_optional_amount = mysqli_query($link, $select_for_optional_amount);
        $fetch_for_optional_amount = mysqli_fetch_assoc($query_for_optional_amount);
        $rows_for_optional_amount = mysqli_num_rows($query_for_optional_amount);
        
        $emma_get_optional_amount = $fetch_for_optional_amount['optionalamount'];

        $emma_actual_amount = $emma_get_optional_amount + $emma_get_compulsory_amount;

        $emma_total_amount+=$emma_actual_amount;

       

        $budgeting_select = "SELECT * FROM `budgeting` WHERE `CampusID` = '$get_budget_campus'  AND `sessionName` = '$get_budget_session' AND 
        `TermOrSemesterID` = '$get_budget_term' AND `CategoryType` = '$get_budget_category_type' AND `SubcategoryID` = '$subcategorynew' ";
        $budgeting_query = mysqli_query($link, $budgeting_select);
        $budgeting_fetch = mysqli_fetch_assoc($budgeting_query);
        $budgeting_rows = mysqli_num_rows($budgeting_query);
        
        if($budgeting_rows){

            $emma_get_amount = $budgeting_fetch['Amount'];
            $emma_get_budgeted_amount = $budgeting_fetch['BudgetedAmount'];
            $emma_get_difference_amount = $budgeting_fetch['Difference'];
            $emma_get_subcategory_id = $budgeting_fetch['SubcategoryID'];

            // $amounactualbudgetting = ($emma_get_amount  == '') ? '' : '₦'.''.number_format($emma_get_amount);
            $amounamoutbudgetting = ($emma_get_budgeted_amount  == '') ? '' : '₦'.''.number_format($emma_get_budgeted_amount); 
            $amoundifferenceamoutbudgetting = ($emma_get_difference_amount  == '') ? '' : '₦'.''.number_format($emma_get_difference_amount);

            $totalbudgetedamount+=$emma_get_budgeted_amount;
            $totaldifferenceamount+=$emma_get_difference_amount;


        }else{

            $amounamoutbudgetting = '';
            $amoundifferenceamoutbudgetting = '';
        }

        echo'
            <input type="hidden" class="emmainputforactualamount'.$subcategorynew.'" value="'.$emma_actual_amount.'">

            <tr>
                <input type="hidden" class="emmasubcategoryidforbudgeting" value="'.$subcategorynew.'">
                <td class="pt-3-half emmasetandcalculatesubcategorytitle" contenteditable="false">'.$emma_get_sub_category.'</td>
                <td class="pt-3-half emmasetandcalculateactualamount" data-id="'.$subcategorynew.'" contenteditable="false">₦'.number_format($emma_actual_amount).'</td>
                <td class="pt-3-half emmasetandcalculatebudgetamount" emmabudgetamount'.$subcategorynew.' data-id="'.$subcategorynew.'" contenteditable="true">'.$amounamoutbudgetting.'</td>
                <td class="pt-3-half emmasetandcalculatedifferenceamount emmadifferencecolumn'.$subcategorynew.'" contenteditable="false">'.$amoundifferenceamoutbudgetting.'</td>
            </tr>';
    }

    echo '<tr>
            <td class="pt-3-half fw-bold">Total Amount</td>
            <td class="pt-3-half fw-bold">₦'.number_format($emma_total_amount).'</td>
            <td class="pt-3-half fw-bold emmaloadtotalbudgetedamount">₦'.number_format($totalbudgetedamount).'</td>
            <td class="pt-3-half fw-bold emmaloadtotaldifferenceamount">₦'.number_format($totaldifferenceamount).'</td>
          </tr>
    </tbody>
    </table>';
}else{

}

?>