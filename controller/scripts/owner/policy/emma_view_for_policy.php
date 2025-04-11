<?php

include('../../../config/config.php');

$emma_get_this_institution = $_POST['emma_institution_for_view'];
$emma_get_data_id = $_POST['emma_data_id_for_view'];

$view_for_policy_select = "SELECT * FROM `policy` WHERE `sn` = '$emma_get_data_id' AND `InstitutionIDOrCampusID` = '$emma_get_this_institution' ";
$view_for_policy_query = mysqli_query($link, $view_for_policy_select);
$view_for_policy_fetch = mysqli_fetch_assoc($view_for_policy_query);
$view_for_policy_rows = mysqli_num_rows($view_for_policy_query);

if($view_for_policy_rows > 0){

    do{
        $emma_get_description_for_view = $view_for_policy_fetch['Description'];
        $emma_get_title_for_view = $view_for_policy_fetch['Title'];
        $emma_get_sections_for_view = explode(',', $view_for_policy_fetch['Section']);
        $emma_get_section_descriptions_for_view = explode(',', $view_for_policy_fetch['SectionDescription']);

        $new_string_for_section_view = str_replace("#", "", $emma_get_sections_for_view);
        $new_section_description_view = str_replace("#", "", $emma_get_section_descriptions_for_view);

        // Initialize empty variable to store combined HTML content for sections
        $combinedContentForView = '';

        // Iterate over sections and generate HTML dynamically
        for ($i = 0; $i < count($new_string_for_section_view); $i++) {

            $section = $new_string_for_section_view[$i];
            $description = $new_section_description_view[$i];

            // Append HTML code for each section
            $combinedContentForView .= '

            <div class="row">
                <div class="col-12 text-break">
                    <div class="card d-flex text-break mt-2">
                        <ul class="fw-bold p-2">
                        '.htmlspecialchars($section).'
                        </ul>
                        <p class="card-text p-2 d-flex">'.htmlspecialchars($description).'</p>
                    </div>
                </div>
            </div>';
        }
       

    //   echo  $combinedContentForView;

        // Output combined HTML content for sections
        echo '

            <div class="row mt-2 p-1 overflow-auto">
                <div class="col-12 ">
                    <div class="card">
                        <div align="center">
                            <h5 class="card-header text-dark" style="font-size:14px;">'.htmlspecialchars($emma_get_title_for_view).'</h5>
                        </div>
                        <p class="card-text p-2">'.$emma_get_description_for_view.'</p>
                    </div>
                </div>
            </div>

                

            <div class="accordion mt-3" id="accordionExampleforview">
                '.$combinedContentForView.'
            </div>';

    }while($view_for_policy_fetch = mysqli_fetch_assoc($view_for_policy_query));

}else{
    echo 2;
}
?>
