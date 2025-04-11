<?php




    include('../../../config/config.php');

    $tari_get_stored_instituion_id = $_POST['tari_get_stored_instituion_id'];

    // get total parent
    $abba_sql_check_campus = ("SELECT * FROM `campus` WHERE `InstitutionID`='$tari_get_stored_instituion_id' ORDER BY CampusName ASC");

    $abba_result_check_campus = mysqli_query($link, $abba_sql_check_campus);
    $abba_row_check_campus = mysqli_fetch_assoc($abba_result_check_campus);
    $abba_row_cnt_check_campus = mysqli_num_rows($abba_result_check_campus);

    if($abba_row_cnt_check_campus > 0)
    {
         $cnt = 0;
        do {



            $cnt++;

            if($cnt == 1)
            {

                  $activeClass = 'active-card';
                  $shadow = 'shadow-sm';

            }
            else{


                 $activeClass = '';
                  $shadow = '';

            }


       

             $campusname = $abba_row_check_campus['CampusName'];
             $word = 'VIRTUAL';


            if (strpos(strtoupper($campusname), $word) !== false)
            {



                     echo ' <div class="col-lg-4 col-sm-12 col-md-10 p-2 ">

                            <label  class="radio-card" data-id="'.$abba_row_check_campus['CampusID'].'" >
                                <input type="radio" name="radio-card" class="prosloadcampusselectedforquestion" value="'.$abba_row_check_campus['CampusID'].'" id="radio-cards" />
                                <div class="card-content-wrapper">
                                <span class="check-icon"></span>
                                <div class="card-content">
                                    <h4>'.ucwords($campusname).'</h4>
                                </div>
                                </div>
                            </label>

                     </div>';



            } 
            else {
                
                    echo '<div class="col-lg-4 col-sm-12 col-md-10 p-2">
                        <label  class="radio-card" data-id="'.$abba_row_check_campus['CampusID'].'">
                            <input type="radio"  class="prosloadcampusselectedforquestion" name="radio-cards" value="'.$abba_row_check_campus['CampusID'].'" id="radio-cards" />
                            <div class="card-content-wrapper">
                            <span class="check-icon"></span>
                            <div class="card-content">

                                <h4>'.ucwords($campusname).'</h4>

                            </div>
                            </div>
                        </label>
                    </div>';

            }
            
        }while($abba_row_check_campus = mysqli_fetch_assoc($abba_result_check_campus));
    }
    else
    {
        echo '<div class="col tari_card_direct">
                <div class="card text-center active-card h-100 py-5 shadow p-3" data-id="0">
                    <i class="far fa-minus-square card-img-top mx-auto img-light fs-1 pb-1"></i>
                    <div class="card-body px-0">
                        <h6 class="card-title title-binding"> No Campus Found</h6>
                        <p class="card-text">
                    </div>
                </div>
            </div>';
    }

?>