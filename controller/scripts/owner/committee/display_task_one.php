<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../../config/config.php');

    echo $committeeid = $_POST["committeeid"];
    $instutition = $_POST['instutition'];
    $campus = $_POST["campus"];
    $usertype = $_POST['usertype'];
    $userid = $_POST['userid'];

    $select_all_committee = "SELECT * FROM `task` WHERE `CommitteeID` = '$committeeid' AND `InstitutionorCampusID` IN ($instutition, $campus) AND Deletestatus = 0 ";
    $ekene_query_link_class = mysqli_query($link, $select_all_committee);
    $ekene_get_details_subject = mysqli_fetch_assoc($ekene_query_link_class);
    $ekene_row_cnt_ekene = mysqli_num_rows($ekene_query_link_class);

    $cnt= 0;
    if($ekene_row_cnt_ekene > 0){

        do{
            $cnt++;
            $Title =  $ekene_get_details_subject['Title'];
            $Description =  $ekene_get_details_subject['Description'];
            $Datecreated =  $ekene_get_details_subject['Datecreated'];
            $TaskID =  $ekene_get_details_subject['TaskID'];
            $CommiteeID = $ekene_get_details_subject['CommitteeID'];
            $UserID = $ekene_get_details_subject['UserID'];
            $Usertype = $ekene_get_details_subject['Usertype'];


            $select_for_upload_conclusion = "SELECT * FROM `member` INNER JOIN `boardmember` ON `member`.`CommitteeID` = `boardmember`.`CommitteeID`
            WHERE `member`.`CommitteeID` = '$committeeid' AND `member`.`Usertype` = '$usertype' AND `member`.`UserID` = '$userid' ";
            $query_for_uploading_conclusion = mysqli_query($link, $select_for_upload_conclusion);
            $fetch_for_uploading_conclusion = mysqli_fetch_assoc($query_for_uploading_conclusion);
            $rows_for_uploading_conclusion = mysqli_num_rows($query_for_uploading_conclusion);

            if($rows_for_uploading_conclusion  > 0){
                $get_position_id = $fetch_for_uploading_conclusion['PositionID'];
            }else{
                $get_position_id = 0;
            }

            echo'<tr>
                    <td>'.$cnt.'</td>
                    <td>'.$Title.'</td>
                    <td>'.$Description.'</td>`
                    <td><i class="fa fa-eye" style="color: blue; cursor: pointer;" id="ekene_view_membericontable" data-task='.$TaskID.' data-comm='.$CommiteeID.'> View</i></td>
                    <td>'.$Datecreated.'</td>
                    <td>
                        <i class="fa fa-edit" style="color: green; cursor: pointer;" id="ekene_edit_membericontable" data-task='.$TaskID.' data-title="'.$Title.'" data-desc="'.$Description.'"> Edit</i>&nbsp;&nbsp;
                        <i class="fa fa-trash" style="color: red; cursor: pointer;" id="ekene_delete_membericontable"  data-task='.$TaskID.'> Delete</i>&nbsp;&nbsp;';

                        if($get_position_id == 40){
                                echo '<i class="fa fa-upload emma_display_penalty_on_input emma_upload_penalty'.$TaskID.'" style="color: blue; cursor: pointer;" id="emma_upload_membericontable" data-task='.$TaskID.' data-commitee="'.$committeeid.'"> Upload</i>';
                        }else{

                        }
                        echo'
                        <i class="fa fa-users" style="color: green; cursor: pointer;" id="ekene_assigned_users_membericontable" data-task='.$TaskID.' data-userid='.$UserID.' data-commitee='.$CommiteeID.' data-usertype='.$Usertype.'> Assigned Users</i>&nbsp;&nbsp;';
                    '</td>
                </tr>';
        }while($ekene_get_details_subject = mysqli_fetch_assoc($ekene_query_link_class));

    }else{

    echo '<td style="color: red;">No Task Have been Set....</td>';

    }

?>