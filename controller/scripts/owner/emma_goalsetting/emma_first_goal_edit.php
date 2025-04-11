<?php

    include("../../../config/config.php");

    $goalid = $_POST['goal_id'];
    $goaltitle = $_POST['goal_title'];
    $goalamount = $_POST['goal_amount'];
    $goalimage = $_POST['goal_image'];
    $goalyears = $_POST['goal_years'];
    $goalstatement = $_POST['goal_vision_statement'];
    
    $cnt = 0;
    $count_edit = 0;
    $amount_per_year = $goalamount / $goalyears;

    
    echo'
    <textarea hidden="hidden" class="editgoalid">'.$goalid.'</textarea>
    <textarea hidden="hidden" class="editgoaltitle">'.$goaltitle.'</textarea>
    <textarea hidden="hidden" class="editgoalamount">'.$goalamount.'</textarea>
    <textarea hidden="hidden" class="editgoalimage">'.$goalimage.'</textarea>
    <textarea hidden="hidden" class="editgoalyears">'.$goalyears.'</textarea>
    <textarea hidden="hidden" class="editgoalstatement">'.$goalstatement.'</textarea>';

    echo'
    <h5 class="card-title ps-3 pt-1 mt-3" style="font-family: Roboto, sans-serif;">'.$goaltitle.'</h5>
        <div class="row mt-1">';
    for ($i = 1; $i <= $goalyears; $i++) {
        $cnt_new = $cnt++;


        $count_edit_new = $count_edit++;

        echo'
        <input class="emmageneralinputfortogle  emmainputfortogglecontentfor_edit'.$count_edit_new.'" type="hidden" value="0">
        <div class="col-sm-6 col-lg-6 mt-1 emma_class_per_year_for_edit" data-id="'.$count_edit_new.'">
            <div class="card">
                <div class="card-body">
                    <input type="hidden" class="emmaloadperyearforedit'.$count_edit_new.'" value="'.$i.'">
                    <input type="hidden" class="emmaloadperamountforedit'.$count_edit_new.'" value="'.$amount_per_year.'">
                    <p class="card-text emmageneralselectcollasiblefor_edit" data-id="'.$count_edit_new.'" style="cursor:pointer;"> Year '.$i.':<br><b>Goal amount: '.$amount_per_year.'</b></p>
                    <div align="end">
                        <small class="float-end emmageneralselectcollasiblefor_edit" data-id="'.$count_edit_new.'" style="color:#007ffb; cursor:pointer;">Click to Add Action <i class="fas fa-plus-circle"></i></small></br>
                    </div>
                    <div>
                        <div class="card card-body emmaopencollapsibleherefor_edit'.$count_edit_new.'" style="display:none;">
                            <div class="card-header">
                                To-do/Action
                            </div>
                            <div class="card-body ">
                            <div class="col-12 mb-2 ps-2 pe-2 mt-3">';

                            $select_for_goal_actions_table = "SELECT * FROM `goalactions` WHERE `GoalID` = '$goalid' AND  Years='$i'";
                            $query_for_goal_actions_table = mysqli_query($link, $select_for_goal_actions_table);
                            $fetch_for_goal_actions_table = mysqli_fetch_assoc($query_for_goal_actions_table);
                            $rows_for_goal_actions_table = mysqli_num_rows($query_for_goal_actions_table);

                            if($rows_for_goal_actions_table > 0){
                        
                                $get_actions = explode(',',$fetch_for_goal_actions_table['Actions']);
                                $get_actions_id = $fetch_for_goal_actions_table['ActionID'];

                                foreach ($get_actions as $key => $get_actions_new){
                                    echo'
                                    <div class="abba_local-forms">
                                        <label>Actions<span style="color:orangered;">*</span></label>
                                        <input type="text" class="form-control mt-3 emma_remove_characters_for_action_create emma_add_new_for_todo_for_edit'.$count_edit_new.'" id="" value="'.$get_actions_new.'">
                                    </div>';
                                }
                                
                            }else{
                                echo'
                                    <div class="abba_local-forms">
                                        <label>Actions<span style="color:orangered;">*</span></label>
                                        <input type="text" class="form-control mt-3 emma_remove_characters_for_action_create emma_add_new_for_todo_for_edit'.$count_edit_new.'" placeholder="Actions">
                                    </div>';
                            }
                            echo'
                                </div>
                                <div class="loadinputcontentfortodofor_edit emmadisplayinputcontentforactions_for_edit'.$count_edit_new.'"></div>
                                <small class="float-end emma_add_new_action_for_edit" data-id="'.$count_edit_new.'" style="color:#007ffb; cursor:pointer;">Add More <i class="fas fa-plus-circle"></i></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    }
    echo '
    </div>';

    ?>