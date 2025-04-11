<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include('../../config/config.php');

    $campus_id = $_POST['campus_id'];

    $abba_get_instituion_id = $_POST['abba_get_instituion_id'];

    // get total parent
    $abba_sql_check_section = ("SELECT * FROM `campus` INNER JOIN section ON campus.CampusID=section.CampusID WHERE (campus.CampusID=$campus_id OR $campus_id IS NULL) AND campus.InstitutionID='$abba_get_instituion_id' ORDER BY trim(SectionName) ASC");
    $abba_result_check_section = mysqli_query($link, $abba_sql_check_section);
    $abba_row_check_section = mysqli_fetch_assoc($abba_result_check_section);
    $abba_row_cnt_check_section = mysqli_num_rows($abba_result_check_section);

    if ($abba_row_cnt_check_section > 0) {

        $cnt = 0;

        do {

            $cnt++;

            $section_id = $abba_row_check_section['SectionID'];

            $camp_id = $abba_row_check_section['CampusID'];

            $abba_sql_campus = ("SELECT * FROM `campus` WHERE CampusID = '$camp_id' ORDER BY CampusName");
            $abba_query_link_campus = mysqli_query($link, $abba_sql_campus);
            $abba_get_details_campus = mysqli_fetch_assoc($abba_query_link_campus);
            $abba_row_cnt_campus = mysqli_num_rows($abba_query_link_campus);

            echo '<div class="col-md-12 col-lg-6">';

                if($campus_id == 'NULL' || $campus_id == '' || $campus_id == '0')
                {
                    echo '<small class="text-secondary" style="font-size:9px;">'.$abba_get_details_campus['CampusName'].'</small>';
                }
                else
                {
                    
                }
                
                echo '<div class="card mb-3" style="max-width: 540px; border:2px dashed #007ffb;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <span class="btn btn-sm btn-icon fw-bold p-0" style="cursor:pointer;background-color:#F1F5F9;color:#007bff;font-size:60px;width:100%;height:100%;justify-content: center; display: flex; align-items: center;">
                                '.strtoupper(trim($abba_row_check_section['SectionName'])[0]).'
                            </span>
                        </div>';

                        $sqltogetresultsettings_checker = mysqli_query($link, "SELECT * FROM `resultsetting` WHERE `SectionID` = '$section_id' AND NumberOfCA NOT IN ('',0)");
                        $rowresultsettings_checker = mysqli_fetch_array($sqltogetresultsettings_checker);
                        $countresultsettings_checker = mysqli_num_rows($sqltogetresultsettings_checker);

                        if ($countresultsettings_checker > 0) 
                        {
                            $cas_set = '('.$rowresultsettings_checker['NumberOfCA'].' C.As attached)';
                        }
                        else{
                            $cas_set = '(No C.A has been attached)';
                        }
                        
                        echo '<div class="col-md-8">
                            <div class="card-body text-secondary">

                                <div class="row">
                                    <div class="col-lg-7 col-md-12">
                                        <h6 class="card-title">'.$abba_row_check_section['SectionName'].' <br><small style="font-size:11px;">'.$cas_set.'</small></h6>
                                    </div>
                                    <div class="col-lg-5 col-md-12">
                                        <i class="fa fa-eye float-end text-primary" data-bs-toggle="collapse" href="#collapseExample'.$cnt.''.$section_id.'" aria-expanded="false" aria-controls="collapseExample'.$cnt.''.$section_id.'" style="cursor:pointer;text-decoration: underline;font-size:11px;"> View Details</i>
                                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        
                                        <div class="collapse" id="collapseExample'.$cnt.''.$section_id.'">
                                            <div class="card card-body">';
                                                $sqltogetresultsettings = mysqli_query($link, "SELECT * FROM `resultsetting` WHERE `SectionID` = '$section_id' AND NumberOfCA NOT IN ('',0)");
                                                $rowresultsettings = mysqli_fetch_array($sqltogetresultsettings);
                                                $countresultsettings = mysqli_num_rows($sqltogetresultsettings);
            
                                                if($countresultsettings > 0)
                                                {
                                                    for ($i = 1; $i <= $rowresultsettings['NumberOfCA']; $i++)
                                                    {

                                                        if (in_array($i, explode(',',$rowresultsettings['MidTermCaToUse']))) {
                                                            $midtemuse = 'Yes';
                                                        } 
                                                        else 
                                                        {
                                                            $midtemuse = 'No';
                                                        }

                                                        echo '<div class="col-md-12 col-lg-12">
                                                            <small style="font-size:11px;"><b>'.$i.'.</b> '.$rowresultsettings['CA'.$i.'Title'].', Max Score: '.$rowresultsettings['CA'.$i.'Score'].', Mid-Term: '.$midtemuse.'</small>
                                                        </div><hr>';

            
                                                    }
                                                }
                                                else{
                                                    echo '<small style="font-size:11px;">No C.A has been attached</small>';
                                                }
                                            echo '</div>
                                        </div>
                                    </div>
                                </div>
                                                
                                <button type="button" class="btn btn-sm text-white float-end mt-2 rounded-3 btn-primary mb-2 abba_edit_section_ca" data-bs-toggle="modal" data-bs-target="#abba_create_ca_Modal" style="font-size:11px;" data-id="'.$section_id.'" data-campusid="'.$camp_id.'"><i class="fas fa-plus"> Add/Edit C.A</i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        } while ($abba_row_check_section = mysqli_fetch_assoc($abba_result_check_section));

    } else {
        echo '<div align="center" class="mt-2"><img src="../../assets/images/adminImg/err.png" style="width:15%;"/><p class="pt-2 fs-6 text-secondary">We couldn\'t find any record.</p></div>';
    }

?>