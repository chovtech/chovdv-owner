<?php


include('../../../config/config.php');

$campus = $_POST['campus'];


$select_for_campaign = "SELECT * FROM `electioncampaign` WHERE `CampusID` = '$campus' ";
$query_for_campaign = mysqli_query($link, $select_for_campaign);
$fetch_for_campaign = mysqli_fetch_assoc($query_for_campaign);
$rows_for_campaign = mysqli_num_rows($query_for_campaign);

if($rows_for_campaign > 0){

    echo '<table id="myDataTable" class="table dataTable no-footer dtr-inline collapsed" style="width: 100%;" aria-describedby="table1_pros_info">

        <thead>
            <tr>
                <th>s/n</th>
                <th>Session</th>
                <th>Page Title</th>
                <th>Page Amount</th>
                <th>Actions</th>
            </tr>
        </thead>';
        $sn = 1;
    do{
        $get_session = $fetch_for_campaign['SessionName'];
        $get_campaign_name = $fetch_for_campaign['CampaignPageName'];
        $get_campaign_amount = $fetch_for_campaign['CampaignAmount'];

        echo '<tbody>
                <tr>
                    <td>'.$sn.'</td>
                    <td>'.$get_session.'</td>
                    <td>'.$get_campaign_name.'</td>
                    <td>₦'.number_format($get_campaign_amount).'</td>
                    <td>
                        <i class="fa fa-edit" style="color: green; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#editcampaign" id="emmaedit_campaign_settings" data-title="'.$get_campaign_name.'" data-amount="'.$get_campaign_amount.'" data-session="'.$get_session.'" data-campus="'.$campus.'"> Edit</i>&nbsp;&nbsp;
                        <i class="fa fa-trash" style="color: red; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#delete_campaign_setting" id="emmadelete_campaign_settings"> Delete</i>&nbsp;&nbsp;
                        <i class="fa fa-eye" style="color: blue; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#view_campaign_setting" id="emmaview_campaign_settings"> View</i>&nbsp;&nbsp;
                    </td>
                </tr>
            </tbody>';
            $sn++;
    }while($fetch_for_campaign = mysqli_fetch_assoc($query_for_campaign));
    echo '</table>';
}else{

    $default_images = "SELECT * FROM `defaultimages` WHERE `ImageName` = 'abba-no-record-found-image2' ";
    $default_images_query = mysqli_query($link, $default_images);
    $default_images_fetch = mysqli_fetch_assoc($default_images_query);
    $default_images_rows = mysqli_num_rows($default_images_query);

    if($default_images_rows > 0){
        $get_image = $default_images_fetch['BaseSixtyFour'];

    echo '<div align="center">
                <div class="">
                    <img src="'.$get_image.'" alt="" style="width:150px;">
                    <p class="text-primary"> No Record Found</p>
                </div>
            </div>';
    }else{

    }
}


?>