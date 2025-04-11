<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../../../config/config.php');

 $institution_1 = $_POST["institution1"];
 $USERID_1 = $_POST["USERID1"];
$USERTYPE_1 = $_POST["USERTYPE1"];
$select_campus = $_POST["selectcampus"];
$select_type = $_POST["selecttype"];

$select12 = "SELECT * FROM `assetitemlog` INNER JOIN assetcategory ON
assetitemlog.AssetCategoryID =assetcategory.AssetCategoryID WHERE
  AgencyOrSchoolOwnerID = '$USERID_1' 
  AND InstitutionID = '$institution_1' AND (CampusID = $select_campus OR $select_campus IS NULL) AND (assetitemlog.AssetCategoryID  = $select_type OR $select_type IS NULL)";

$result = mysqli_query($link, $select12);


            
 $rowcount = mysqli_num_rows($result);
 $num =1;
if( $rowcount > 0)
{



    echo '
    <table id="table1" class="table" style="width:100%;">
    <thead>
        <tr style="color: #636161;">
            <th>S/N</th>
            <th>Asset Name</th>
            <th>Asset category</th>
            <th>Initial Value/ Asset</th>
            <th>Quantity</th>
            <th>Depreciation Rate</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody style="color: #888888;">';

    while($mysql = mysqli_fetch_assoc($result))
    {
       
        $assetitemlog = $mysql['AssetItemLogID'];
        $AssetName = $mysql['AssetName'];
        $InitialValue = $mysql['InitialValue'];
        $DepreciationRate = $mysql['DepreciationRate'];
        $Quantity = $mysql['Quantity'];
       $assetcategory = $mysql['AssetCategoryName'];
       $assetcategoryid = $mysql['AssetCategoryID'];
       $campusid = $mysql['CampusID'];

                

       echo '<tr class="prosdeletetablecontainer">
                        <td>'.$num++.'</td>
                        <td>'.$AssetName.'</td>
                        <td>'.$assetcategory.'</td>
                        <td>₦'.number_format($InitialValue).'</td>
                        <td>'.number_format($Quantity).'</td>
                        <td>'.number_format($DepreciationRate).'</td>
                        <td>
                        <i class="fa fa-edit text-warning" id="edit1" style="cursor:pointer" data-asset="'.$assetitemlog.'"  data-category="'.$assetcategoryid.'" data-cam="'.$campusid.'" data-bs-toggle="modal" data-bs-target="#ekene_edit_asset_Modal"> Edit</i>
                        <i class="fa fa-trash text-danger" id="delete" style="cursor:pointer" data-asset="'.$assetitemlog.'" data-category="'.$assetcategoryid.'" data-cam="'.$campusid.'" data-bs-toggle="modal" data-bs-target="#ekene_delete_asset_Modal"> Delete</i>
                        </td>
                        
           </tr>
              
          ';
       

    }

    echo '</tbody>
     </table>';
}else
{
   echo '<div class="table-Side-Chi topSecCards" style="padding: 50px 50px 50px 50px;">
   <div class="table-responsive emma-load-transloadnofieldaction-history">
             <div align="center" id="emma--selectedoptionalfee-content">
                 
               </div>
                 
   </div>
</div>';
}



?>