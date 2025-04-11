<?php
    include('../../config/config.php');

    $abba_get_owner_id = $_POST['abba_get_owner_id'];

    $abba_sql_owner = ("SELECT * FROM `agencyorschoolowner` WHERE AgencyOrSchoolOwnerID = '$abba_get_owner_id'");
    $abba_query_link_owner = mysqli_query($link, $abba_sql_owner);
    $abba_get_details_owner = mysqli_fetch_assoc($abba_query_link_owner);
    $abba_row_cnt_owner = mysqli_num_rows($abba_query_link_owner);

    if($abba_row_cnt_owner > 0)
    {
        $abba_owner_default_edu = $abba_get_details_owner['EducationType'];


        $abba_sql_institution = ("SELECT * FROM `institution` WHERE EducationType = '$abba_owner_default_edu' AND AgencyOrSchoolOwnerID = '$abba_get_owner_id' ORDER BY InstitutionGeneralName ASC LIMIT 1");
        $abba_query_link_institution = mysqli_query($link, $abba_sql_institution);
        $abba_get_details_institution = mysqli_fetch_assoc($abba_query_link_institution);
        $abba_row_cnt_institution = mysqli_num_rows($abba_query_link_institution);

        if($abba_row_cnt_institution > 0)
        {

            $abba_institution_id = $abba_get_details_institution['InstitutionID'];

            $abba_institution_name = $abba_get_details_institution['InstitutionGeneralName'];
            
            $abba_institution_name_string_length = strlen($abba_institution_name);

            if($abba_institution_name_string_length > 15)
            {
                $abba_institution_name_shortened_or_not = substr($abba_institution_name, 0, 15).'..';
            }
            else
            {
                $abba_institution_name_shortened_or_not = $abba_institution_name;
            }

            echo '<input value="'.$abba_institution_name_shortened_or_not.'" data-id="'.$abba_institution_id.'" data-url="'.$abba_get_details_institution['CustomUrl'].'" id="abba_get_and_dis_inst">';

        }
        else{
            $abba_sql_institution = ("SELECT * FROM `institution` WHERE AgencyOrSchoolOwnerID = '$abba_get_owner_id' ORDER BY InstitutionGeneralName ASC LIMIT 1");
            $abba_query_link_institution = mysqli_query($link, $abba_sql_institution);
            $abba_get_details_institution = mysqli_fetch_assoc($abba_query_link_institution);
            $abba_row_cnt_institution = mysqli_num_rows($abba_query_link_institution);
    
            if($abba_row_cnt_institution > 0)
            {
    
                $abba_institution_id = $abba_get_details_institution['InstitutionID'];
    
                $abba_institution_name = $abba_get_details_institution['InstitutionGeneralName'];
                
                $abba_institution_name_string_length = strlen($abba_institution_name);
    
                if($abba_institution_name_string_length > 15)
                {
                    $abba_institution_name_shortened_or_not = substr($abba_institution_name, 0, 15).'..';
                }
                else
                {
                    $abba_institution_name_shortened_or_not = $abba_institution_name;
                }
    
                echo '<input value="'.$abba_institution_name_shortened_or_not.'" data-id="'.$abba_institution_id.'" data-url="'.$abba_get_details_institution['CustomUrl'].'" id="abba_get_and_dis_inst">';

            }
            else{
    
            }
        }
    }
?>