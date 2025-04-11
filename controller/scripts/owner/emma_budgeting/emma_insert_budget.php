<?php

include("../../../config/config.php");

$emma_get_campus = $_POST['emma_budget_camp_id'];
$emma_get_session = $_POST['emma_budget_session'];
$emma_get_term = $_POST['emma_budget_term_id'];
$emma_get_categorytype = $_POST['emma_budget_category'];
$emma_get_subcategoryid = explode(',', $_POST['emma_budget_sub_category_data_id']);
$emma_get_actual_amount = explode(',', $_POST['emma_budget_actual_amt']);
$emma_get_budgeted_amount = explode(',', $_POST['emma_budget_budgeted_amt']);
$emma_get_difference_amount = explode(',', $_POST['emma_budget_difference_amt']);

	foreach ($emma_get_subcategoryid as $key => $emma_get_subcategoryid_new) {

		$emma_get_actual_amount_new = $emma_get_actual_amount[$key];
		$emma_get_budgeted_amount_new = $emma_get_budgeted_amount[$key];
		$emma_get_difference_amount_new = $emma_get_difference_amount[$key];

		$emma_budgeting_select = "SELECT * FROM `budgeting` WHERE `CampusID` = '$emma_get_campus' AND `sessionName` = '$emma_get_session' AND `TermOrSemesterID` = '$emma_get_term' AND `SubcategoryID` = '$emma_get_subcategoryid_new' AND `DeleteStatus` = 0";
		$emma_budgeting_query = mysqli_query($link, $emma_budgeting_select);
		$emma_budgeting_fetch = mysqli_fetch_assoc($emma_budgeting_query);
		$emma_budgeting_rows = mysqli_num_rows($emma_budgeting_query);

		if($emma_budgeting_rows > 0){
            $budget_update = "UPDATE `budgeting` SET `Amount`='$emma_get_actual_amount_new',`BudgetedAmount`='$emma_get_budgeted_amount_new',`Difference`='$emma_get_difference_amount_new' WHERE `CampusID`='$emma_get_campus' AND `sessionName`='$emma_get_session' AND `TermOrSemesterID`='$emma_get_term' AND `CategoryType`='$emma_get_categorytype' AND `SubcategoryID`='$emma_get_subcategoryid_new' AND `DeleteStatus`= 0 ";
			$budget_update_query = mysqli_query($link, $budget_update);
		}else{
			$emma_budgeting_insert = "INSERT INTO `budgeting`(`CampusID`, `sessionName`, `TermOrSemesterID`, `CategoryType`, `SubcategoryID`, `Amount`, `BudgetedAmount`, `Difference`, `DeleteStatus`) VALUES 
			('$emma_get_campus','$emma_get_session','$emma_get_term','$emma_get_categorytype','$emma_get_subcategoryid_new','$emma_get_actual_amount_new','$emma_get_budgeted_amount_new','$emma_get_difference_amount_new',0)";
			$budget_update_query = mysqli_query($link, $emma_budgeting_insert);
		}
	}

	if($budget_update_query == true){
		echo 1;
	}else{
		echo 2;
	}

?>
