<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../config/config.php');

    $campus_id = $_POST['campus_id'];

    // $data = $_POST['data'];

    // Decode the JSON data
    $data = json_decode($_POST['data'], true);

    // Loop through the data
    foreach ($data as $sectionId => $section) {

        $abba_sectionid = $sectionId;

        $abba_sql_delete_ca = "DELETE FROM `resultsetting` WHERE CampusID = $campus_id AND `SectionID` = '$abba_sectionid'";
        $abba_result_delete_ca = mysqli_query($link, $abba_sql_delete_ca);

        $caCount = count($section);

        if($caCount> 0)
        {
            // Section does not exist, insert the section and update the columns
            $abba_sql_insert_section = "INSERT INTO `resultsetting`(`CampusID`, `SectionID`, `NumberOfCA`, `CA1Title`, `CA1Score`, `CA2Title`, `CA2Score`, `CA3Title`, `CA3Score`, `CA4Title`, `CA4Score`, `CA5Title`, `CA5Score`, `CA6Title`, `CA6Score`, `CA7Title`, `CA7Score`, `CA8Title`, `CA8Score`, `CA9Title`, `CA9Score`, `CA10Title`, `CA10Score`, `MidTermCaToUse`) VALUES ('$campus_id','$abba_sectionid','$caCount','','0','','0','','0','','0','','0','','0','','0','','0','','0','','0','')";
            $abba_result_insert_section = mysqli_query($link, $abba_sql_insert_section);

            $midtermValues = [];


            foreach ($section as $caId => $ca) {

                $cnt = str_replace('ca','',$caId);

                if (isset($ca['midterm'])) {
                    $midtermValues[] = $ca['midterm'];
                }
                
                $caName = isset($ca['name']) ? $ca['name'] : '';
                $caScore = isset($ca['score']) ? $ca['score'] : '';

                // Update the respective columns for each CA
                $abba_sql_update_ca_column = mysqli_query($link,"UPDATE `resultsetting` SET CA".$cnt."Title = '$caName', CA".$cnt."Score = '$caScore' WHERE CampusID = $campus_id AND `SectionID` = '$abba_sectionid'");
            }

            // Implode midterm values with commas
            $midtermString = implode(',', $midtermValues);

            // Update the Midterm column
            $abba_sql_update_midterm = "UPDATE `resultsetting` SET `MidTermCaToUse` = '$midtermString' WHERE CampusID = $campus_id AND `SectionID` = '$abba_sectionid'";
            $abba_result_update_midterm = mysqli_query($link, $abba_sql_update_midterm);

        }
        else
        {

        }

        
    }

?>