<?php

include('../../../config/config.php');

$campus = $_POST['thiscampus'];

$select_for_election_settings = "SELECT * FROM `electionsettings` WHERE `CampusID` = '$campus' AND `DeleteStatus` = 0 ";
$query_for_election_settings = mysqli_query($link, $select_for_election_settings);
$fetch_for_election_settings = mysqli_fetch_assoc($query_for_election_settings);
$rows_for_election_settings = mysqli_num_rows($query_for_election_settings);

if($rows_for_election_settings > 0){

    echo '<table id="myDataTable" class="table dataTable no-footer dtr-inline collapsed" style="width: 100%;" aria-describedby="table1_pros_info">

        <thead>
            <tr>
                <th>Election TItle</th>
                <th>Election Season<br> Start & End Date</th>
                <th>Session</th>
                <th>Election Day Date</th>
                <th>Actions</th>
            </tr>
        </thead>';
    do{
        $get_election_id = $fetch_for_election_settings['ElectionSettingsID'];
        $get_election_campus = $fetch_for_election_settings['CampusID'];
        $get_election_position_selected = $fetch_for_election_settings['PositionsSelected'];
        $get_election_classes_selected = $fetch_for_election_settings['ClassesSelected'];
        $get_election_title = $fetch_for_election_settings['ElectionTitle'];
        $get_election_average_range = $fetch_for_election_settings['StudentAverageRange'];
        $get_election_payment_status = $fetch_for_election_settings['PaymentStatus'];
        $get_session = $fetch_for_election_settings['SessionName'];
        $get_election_season_start_date = $fetch_for_election_settings['ElectionSeasonStartDate'];
        $get_election_season_end_date = $fetch_for_election_settings['ElectionSeasonEndDate'];
        $get_election_day_date = $fetch_for_election_settings['ElectionDayDate'];
        $get_election_campaign_start_date = $fetch_for_election_settings['ElectionCampaignStartDate'];
        $get_election_campaign_end_date = $fetch_for_election_settings['ElectionCampaignEndDate'];
        
        // $position_selected = explode(',', $get_election_position_selected);

        echo'   
            <tbody>
                <tr>
                    <td>'.$get_election_title.'</td>
                    <td>'.$get_election_season_start_date.' to '.$get_election_season_end_date.'</td>
                    <td>'.$get_session.'</td>
                    <td>'.$get_election_day_date.'</td>
                    <td>
                        <i class="fa fa-edit" style="color: green; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modal_for_edit_settings" id="emmaedit_election_settings" data-id="'.$get_election_id.'" data-campus="'.$get_election_campus.'" data-positions="'.$get_election_position_selected.'" data-classes="'.$get_election_classes_selected.'" data-title="'.$get_election_title.'" data-average="'.$get_election_average_range.'" data-payment="'.$get_election_payment_status.'" data-session="'.$get_session.'" data-electionseasonstartdate="'.$get_election_season_start_date.'" data-electionseasonenddate="'.$get_election_season_end_date.'" data-electionday="'.$get_election_day_date.'" data-campaignstartdate="'.$get_election_campaign_start_date.'" data-campaignenddate="'.$get_election_campaign_end_date.'"> Edit</i>&nbsp;&nbsp;
                        <i class="fa fa-trash" style="color: red; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#delete_election_settings" id="emmadelete_election_settings" data-id="'.$get_election_id.'" data-campus="'.$get_election_campus.'"> Delete</i>&nbsp;&nbsp;
                        
                    </td>
                </tr>
            </tbody>';

    }while($fetch_for_election_settings = mysqli_fetch_assoc($query_for_election_settings));
   
    echo '</table>';

}else{

    $select_for_defaultimages = "SELECT * FROM `defaultimages` WHERE `ImageName` = 'abba-no-record-found-image2' ";
    $query_for_defaultimages = mysqli_query($link, $select_for_defaultimages);
    $fetch_for_defaultimages = mysqli_fetch_assoc($query_for_defaultimages);
    $rows_for_defaultimages = mysqli_num_rows($query_for_defaultimages);

    if($rows_for_defaultimages > 0){

        $get_image = $fetch_for_defaultimages['BaseSixtyFour'];

    echo'  
        <div align="center">
            <img src="'.$get_image.'" alt="" style="width: 17%">
            <p class="mt-3">No record found, please set an election to proceed</p>
        </div>';
    }else{

    }
    
}


?>