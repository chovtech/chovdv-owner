<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../../../config/config.php');



$ekene_sql_category = ("SELECT * FROM `assetcategory` WHERE `AssetCategoryID`  ORDER BY `AssetCategoryName` ASC");
    $ekene_query_link_category = mysqli_query($link, $ekene_sql_category);
    $ekene_get_details_category = mysqli_fetch_assoc($ekene_query_link_category);
    $ekene_row_cnt_category = mysqli_num_rows($ekene_query_link_category);
   

    echo '<option value="NULL">Select category</option>';

    if($ekene_row_cnt_category > 0)
    {
        $cnt = 0;
        
        do{
            $cnt++;

            $ekene_category_id = $ekene_get_details_category['AssetCategoryID'];

            $ekene_category_name = $ekene_get_details_category['AssetCategoryName'];

            echo '<option value="'.$ekene_category_id.'">'.$ekene_category_name.'</option>';
            
        }while($ekene_get_details_category = mysqli_fetch_assoc($ekene_query_link_category));
    }
    else{
        echo '<option value="NULL">No Records Found</option>';
    }

?>