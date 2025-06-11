<?php

    include('../../../config/config.php');

    $abba_instituion_id = $_POST['abba_instituion_id'];
    

 
    // get total parent
    $abba_sql_check_campus = ("SELECT * FROM `campus` WHERE InstitutionID='$abba_instituion_id' ORDER BY TRIM(CampusName) ASC");
    $abba_result_check_campus = mysqli_query($link, $abba_sql_check_campus);
    $abba_row_check_campus = mysqli_fetch_assoc($abba_result_check_campus);
    $abba_row_cnt_check_campus = mysqli_num_rows($abba_result_check_campus);
    
    // if($data_get_status == '')

    if($abba_row_cnt_check_campus > 0)
    {
        $cnt = 0;
        do {

            $cnt++;

            if($cnt == 1)
            {
                $activeClass = 'active-card';
            }
            else
            {
                $activeClass = '';
            }

            $campusname = $abba_row_check_campus['CampusName'];

            $word = 'VIRTUAL';

            if (strpos(strtoupper($campusname), $word) !== false)
            {
                echo '<div class="col">
                    <div class="abba_card text-center h-100 py-5 shadow-sm p-3 '.$activeClass.'" data-id="'.$abba_row_check_campus['CampusID'].'">
                        <i class="fas fa-globe card-img-top mx-auto img-light fs-1 pb-1"></i>
                        <div class="card-body px-0">
                            <span class="card-title title-binding" style="font-size:13px;"> '.$campusname.'</span>
                            <p class="card-text">
                        </div>
                    </div>
                </div>';
            } 
            else {
                
                echo '<div class="col">
                    <div class="abba_card text-center h-100 py-5 shadow-sm p-3 '.$activeClass.'" data-id="'.$abba_row_check_campus['CampusID'].'">
                        <i class="fa fa-university card-img-top mx-auto img-light fs-1 pb-1"></i>
                        <div class="card-body px-0">
                            <span class="card-title title-binding fw-bold" style="font-size:13px;"> '.$campusname.'</span>
                            <p class="card-text">
                        </div>
                    </div>
                </div>';

            }
            
        }while($abba_row_check_campus = mysqli_fetch_assoc($abba_result_check_campus));
    }
    else
    {
        echo '<div class="col">
            <div class="abba_card text-center active-card h-100 py-5 shadow p-3" data-id="0">
                <i class="far fa-minus-square card-img-top mx-auto img-light fs-1 pb-1"></i>
                <div class="card-body px-0">
                    <h6 class="card-title title-binding"> No Campus Found</h6>
                    <p class="card-text">
                </div>
            </div>
        </div>';
    }

?>