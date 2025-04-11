<?php


include("../../../config/config.php");

$editdataid = $_POST['editdataid'];
$editactualamt = $_POST['editactual'];
$editbudget = $_POST['emmabudget'];
$editcampus = $_POST['emmacampusid'];
$editsubcategoryid = $_POST['emmasubcategoryid'];
$editdifferenceamount = $_POST['edit_budget_amount'];


$edit_budget = "UPDATE `budgeting` SET `Amount`='$editactualamt',`BudgetedAmount`='$editbudget',`Difference`='$editdifferenceamount' WHERE `sn`='$editdataid' AND `CampusID`='$editcampus' AND `DeleteStatus`= 0 AND `SubcategoryID` = '$editsubcategoryid' ";
$edit_budget_query = mysqli_query($link, $edit_budget);

if($edit_budget_query == true){
    echo 1;
}else{
    echo 2;
}


?>