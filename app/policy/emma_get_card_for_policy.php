<?php

include('../../../config/config.php');

$emma_get_institution = $_POST['emma_send_institution'];

$emma_select_for_policy_card = "SELECT * FROM `policy` WHERE `InstitutionIDorCampusID` = '$emma_get_institution' AND `DeleteStatus` = 0 AND `StakeHolder` IN ('staff') ";
$emma_query_for_policy_card = mysqli_query($link, $emma_select_for_policy_card);
$emma_fetch_for_policy_card = mysqli_fetch_assoc($emma_query_for_policy_card);
$emma_rows_for_policy_card = mysqli_num_rows($emma_query_for_policy_card);

    if($emma_rows_for_policy_card > 0){

        do{
            $emma_get_title_for_policy = $emma_fetch_for_policy_card['Title'];
            $emma_get_description_for_policy = $emma_fetch_for_policy_card['Description'];
            $emma_get_section_for_policy = $emma_fetch_for_policy_card['Section'];
            $emma_get_stakeholder_for_policy = $emma_fetch_for_policy_card['StakeHolder'];
            $emma_get_publish_status_for_policy = $emma_fetch_for_policy_card['PublishStatus']; 
            $emma_get_data_id_for_policy = $emma_fetch_for_policy_card['sn'];
            $emma_get_section_for_policy_description = $emma_fetch_for_policy_card['SectionDescription'];

            // $new_section_description_for_edit_admin = str_replace(",", "", $emma_get_section_for_policy_description);
            // $new_section_for_edit_admin = str_replace(",", "", $emma_get_section_for_policy);

            $new_section_for_edit_admin = explode(",", $emma_get_section_for_policy);
            $new_section_description_for_edit_admin = explode(",", $emma_get_section_for_policy_description);
            
           
        $combinedContentForViewsectionanddescription = '';

       
        for ($i = 0; $i < count($new_section_for_edit_admin); $i++) {

            $section = $new_section_for_edit_admin[$i];
            $description = $new_section_description_for_edit_admin[$i];
        
            // Append HTML code for each section
            $combinedContentForViewsectionanddescription .= '
        
            <div align="start">
                <p style="font-size:14px; font-weight:bold;" class="text-uppercase">'.htmlspecialchars($section).'</p>
            </div>
            
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 p-3">
                        <p style="font-weight:normal; font-size:14px;">'.htmlspecialchars($description).'</p>
                    </div>
                </div>
            </div>';
        }
 
            echo '<div align="center">
                    <p style="font-size:20px; font-weight:bold;" class="text-uppercase">'.htmlspecialchars($emma_get_title_for_policy).'</p>
                  </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 p-3">
                        <p style="font-weight:normal; font-size:14px;">'.$emma_get_description_for_policy.'</p>
                    </div>
                </div>
            </div>

            <div class="emmaload">
                '.$combinedContentForViewsectionanddescription.'
            </div>';

        }while($emma_fetch_for_policy_card = mysqli_fetch_assoc($emma_query_for_policy_card));

    }else{
        echo 'NULL';
    }
?>