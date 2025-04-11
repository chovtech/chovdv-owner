<?php
    include("../../../config/config.php");

    $getgoalcamp = $_POST['goalcampus'];
    $getgoalnumofyears = explode(',',$_POST['goalnumofyears']); 
    $getgoalimage = explode('###,',$_POST['goalimage']);
    $getgoaltitle = explode(',',$_POST['goaltitle']); 
    $getgoalamount = explode(',',$_POST['goalamount']); 
    
    $cnt = 0;
    $count = 0;

    foreach ($getgoalnumofyears as $key => $getgoalnumofyears_new) {
        $cnt_new = $cnt++;

        $cnt_new;
        $getgoaltitle_new = $getgoaltitle[$key];
        $newamountcontent = $getgoalamount[$key];
        $getgoalimagenew = $getgoalimage[$key];

       echo'<textarea hidden="hidden" class="emmaloadgoatitle" data-id="'.$cnt_new.'">'.$getgoaltitle_new.'</textarea>
            <textarea hidden="hidden" class="emmaloadgoalamount'.$cnt_new.'">'. $newamountcontent.'</textarea>
            <textarea hidden="hidden" class="emmaloadgoalimage'.$cnt_new.'">'.$getgoalimagenew .'</textarea>
            <textarea hidden="hidden" class="emmaloadgoaltitle'.$cnt_new.'">'.$getgoalnumofyears_new .'</textarea>

            <h5 class="card-title ps-3 pt-1 mt-3" style="font-family: Roboto, sans-serif;">'.$getgoaltitle_new.'</h5>

            <div class="row mt-1">';

            for ($i = 1; $i <= $getgoalnumofyears_new; $i++) {

            $goalPerYear = $newamountcontent / $getgoalnumofyears_new;
            $count_new = $count++;

        echo'
        <input class="emmageneralinputfortogle  emmainputfortogglecontent'.$count_new.' " type="hidden" value="0">
            <div class="col-sm-6 col-lg-6 mt-1 emma_class_per_year'.$cnt_new.'" data-id="'.$count_new.'">
                <div class="card">
                    <div class="card-body">
                    <input type="hidden" class="emmaloadperyear'.$count_new.'" value="'.$i.'">
                    <input type="hidden" class="emmaloadperamount'.$count_new.'" value="'.$goalPerYear.'">

                        <p class="card-text emmageneralselectcollasible" data-id="'.$count_new .'" style="cursor:pointer;"> Year '.$i.':<br><b>Goal amount: ' . $goalPerYear . '</b></p>
                            <div align="end">
                            <small class="float-end emmageneralselectcollasible" data-id="'.$count_new.'" style="color:#007ffb; cursor:pointer;">Click to Add Action <i class="fas fa-plus-circle"></i></small></br>
                            </div>
                        <div>
                            <div class="card card-body emmaopencollapsiblehere'.$count_new.'" style="display:none;">
                                <div class="card-header">
                                    To-do/Action
                                </div>
                                <div class="card-body">
                                    <div class="col-12 mb-2 ps-2 pe-2 mt-3">
                                        <div class="abba_local-forms">
                                            <label>Actions<span style="color:orangered;">*</span></label>
                                            <input type="text" class="form-control emma_actions_for_create emma_add_new_for_todo'.$count_new.'" id="" placeholder="Actions">
                                        </div>
                                    </div>
                                    <div class="loadinputcontentfortodo emmadisplayinputcontentforactions'.$count_new.'"></div>
                                    <small class="float-end emma_add_new_action" data-id="'.$count_new.'" style="color:#007ffb; cursor:pointer;">Add More <i class="fas fa-plus-circle"></i></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        }
        echo' </div>';
    }
?>