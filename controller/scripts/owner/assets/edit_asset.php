<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../../../config/config.php');

$asset_id = $_POST['assetID'];
$usercategoryid = $_POST['usercategoryid'];
$usercampusid = $_POST['usercampusid'];

$select12 = "SELECT * FROM `assetitemlog`
 WHERE
assetitemlog.AssetItemLogID = '$asset_id' AND assetitemlog.AssetCategoryID = '$usercategoryid'  AND (CampusID = $usercampusid OR $usercampusid IS NULL)";

$result = mysqli_query($link, $select12);
         
$rowcount = mysqli_num_rows($result);
$fetch_assoc = mysqli_fetch_assoc($result);



  if($rowcount > 0)
  {
       
        $AssetName = $fetch_assoc['AssetName'];
        $InitialValue = $fetch_assoc['InitialValue'];
        $DepreciationRate = $fetch_assoc['DepreciationRate'];
        $Quantity = $fetch_assoc['Quantity'];
        


       echo '
        <input type="hidden" id="editassetid" value="'.$asset_id.'">
        <input type="hidden" id="editcategoryid" value="'.$usercategoryid.'">
    
        <div class="tab-pane fade show active" id="abba_ex1-tabs-10" role="tabpanel"
        aria-labelledby="abba_ex1-tab-10">
        <div>
            <div class="row ">
                <div class="col-12 col-sm-12 mt-3">
                    <div class="form-group abba_local-forms">
                        <label>Asset Name<span style="color:orangered;">*</span>
                        </label>
                        <input class="form-control" value="'.$AssetName.'" id="editasset">
                            
                    </div>
                </div>
            </div>

            <div class="row ">
                <div class="col-12 col-sm-12">
                    <div class="form-group abba_local-forms">
                        <label>Asset Category<span style="color:orangered;">*</span>
                        </label>
                        <select id="edit_asset_category" style="color: #666666;"
                        class="form-select form-select-sm emma-transactiontype" aria-label=".form-select-sm example ">';
                        
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

                                if($ekene_category_id == $usercategoryid)
                                {
                                   $selected = "selected";
                                }
                                else
                                {
                                   $selected = '';
                                }
                                $ekene_category_name = $ekene_get_details_category['AssetCategoryName'];

                                echo '<option value="'.$ekene_category_id.'" '.$selected.' >'.$ekene_category_name.'</option>';
                                
                            }while($ekene_get_details_category = mysqli_fetch_assoc($ekene_query_link_category));
                        }
                        else{
                            echo '<option value="NULL">No Records Found</option>';
                        }
                    echo '</select>
                        
                    </div>
                </div>
            </div>
            
            <div class="row ">
                <div class="col-12 col-sm-12">
                    <div class="form-group abba_local-forms">
                        <label>Initial Value (₦)<span style="color:orangered;">*</span>
                        </label>
                        <input type="number" value="'.$InitialValue.'" class="form-control" id="editvalue">


                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-12 col-sm-12">
                    <div class="form-group abba_local-forms">
                        <label>Quantity<span style="color:orangered;">*</span>
                        </label>
                        <input type="number" value="'.$Quantity.'" class="form-control" id="editquantity">

                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-12 col-sm-12">
                    <div class="form-group abba_local-forms">
                        <label>Depreciation Rate(%)<span style="color:orangered;">*</span>
                        </label>
                        <input type="number" value="'.$DepreciationRate.'" class="form-control" id="editrate">

                    </div>
                </div>
            </div>
        </div> ';
    }

?>