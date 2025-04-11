<?php

include("../../../config/config.php");

$campus = $_POST['emmacampusload'];
$session = $_POST['emmasessionload'];
$term = $_POST['emmatermload'];
$categorytype = $_POST['emmacategoryload'];

$select_budget = "SELECT * FROM `budgeting` WHERE `CampusID` = '$campus' AND `sessionName` = '$session' AND  `TermOrSemesterID` = '$term' AND `CategoryType` = '$categorytype' AND `DeleteStatus` = 0 ";
$query_budget = mysqli_query($link, $select_budget);
$fetch_budget = mysqli_fetch_assoc($query_budget);
$rows_budget = mysqli_num_rows($query_budget);

if($rows_budget > 0){

    echo '<table id="emmaloadtable" class="table" style="width:100%;">
            <thead>
                <tr style="color: #636161;">
                    <th>S/N</th>
                    <th>Title</th>
                    <th>Actual Amount</th>
                    <th>Budgeted Amount</th>
                    <th>Difference</th>
                    <th>Transaction Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody style="color: #888888;">';
            
            $num = 1;
    do{

        $emma_get_budgeting_id = $fetch_budget['sn'];
        $emma_sub_category_id = $fetch_budget['SubcategoryID'];
        $emma_budget_actual_amount = $fetch_budget['Amount'];
        $emma_budgeted_amount = $fetch_budget['BudgetedAmount'];
        $emma_difference_amount = $fetch_budget['Difference'];
        $emma_transaction_type = $fetch_budget['CategoryType'];
        $emma_campus_id = $fetch_budget['CampusID'];

        $select_category_name = "SELECT * FROM `subcategory` WHERE `SubcategoryID` = '$emma_sub_category_id' ";
        $query_category_name = mysqli_query($link,$select_category_name);
        $fetch_category_name = mysqli_fetch_assoc($query_category_name);
        $rows_category_name = mysqli_num_rows($query_category_name);

        if($rows_category_name > 0){
            $get_budget_sub_category_title = $fetch_category_name['SubcategoryTitle'];
        }else{

        }
        
        echo '<tr class="emmadeletecontainer">
                <td>'.$num++.'</td>
                <td>'.$get_budget_sub_category_title.'</td>
                <td>₦'.number_format($emma_budget_actual_amount).'</td>
                <td><span class="">₦'.number_format($emma_budgeted_amount).'</span></td>
                <td>₦'.number_format($emma_difference_amount).'</td>
                <td>'.$emma_transaction_type.'</td>
                <td>
                    <span style="cursor:pointer;" class="text-warning p-1"  data-bs-toggle="modal"  data-bs-target="#edditbudget" data-id="'.$emma_get_budgeting_id.'" data-budget="'.$emma_budgeted_amount.'" data-campus="'.$emma_campus_id.'" data-subcategory="'.$emma_sub_category_id.'" data-difference="'.$emma_difference_amount.'" data-actualamount="₦'.number_format($emma_budget_actual_amount).'" data-actualamounthidden="'.$emma_budget_actual_amount.'"  data-subtitle="'.$get_budget_sub_category_title.'" id="emmaediticon">
                            <i class="fa fa-edit" style="font-size:19px;"></i>
                    </span>

                    <span style="cursor:pointer;" class="text-danger p-1"  data-bs-toggle="modal"  data-bs-target="#deletebudget" data-id="'.$emma_get_budgeting_id.'" data-campus="'.$emma_campus_id.'"  id="emmadeleteicon">
                            <i class="fa fa-trash" style="font-size:19px;"></i>
                    </span>
                </td>
            </tr>';

    }while ($fetch_budget = mysqli_fetch_assoc($query_budget));
    echo '</tbody>
    </table>';
}else{

    $getnorecordfound = "SELECT * FROM `defaultimages` WHERE `ImageName` = 'abba-no-record-found-image2' ";
    $getnorecordfound_query = mysqli_query($link, $getnorecordfound);
    $getnorecordfound_fetch = mysqli_fetch_assoc($getnorecordfound_query);
    $getnorecordfound_rows = mysqli_num_rows($getnorecordfound_query);
    if ($getnorecordfound_rows > 0) {
        
        $getimage = $getnorecordfound_fetch['BaseSixtyFour'];

        echo '<img src="'.$getimage.'" style="width: 15%;" alt="">
        <p></p>
        <p>Sorry it looks like the Schools Budget havent been set yet!!! <br> Please kindly click on Get Started to set it.</p>
    
        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#budgetModalforadditems" style="border-radius: 25px; font-size: 17px; width: 300px;">Get Started</button>';
    }else{

    }
    
}

?>