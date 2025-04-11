<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include('../../config/config.php');

    $abba_instituion_id = $_POST['abba_instituion_id'];

    $from_edit_or_create_id = $_POST['from_edit_or_create_id'];

    if($from_edit_or_create_id < 1)
    {
        echo '<input type="hidden" value="'.$from_edit_or_create_id.'" id="creat_or_edit_checker">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label><small>Grading Method Title</small></label>
                    <input type="text" class="form-control form-control-sm methodmaintitle gs-gen-input" placeholder="Primary Grading Method"> 
                </div>
            </div>
        </div>
        <div id="formtoappend">
            <div class="row mt-3">
                <div class="col-3">
                    <div class="form-group">
                        <label><small>Start</small></label>
                        <input type="number" class="form-control form-control-sm rangestartval gs-gen-input gs-rstart-input-1" placeholder="80"> 
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                        <label><small>End</small></label>
                        <input type="number"  class="form-control form-control-sm rangeendval gs-gen-input gs-rend-input-1" placeholder="90.99"> 
                    </div>
                </div>

                <div class="col-2">
                    <div class="form-group">
                        <label><small>Grade</small></label>
                        <input type="text"  class="form-control form-control-sm gradeval gs-gen-input gs-grade-input-1" placeholder="A"> 
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                        <label><small>Remark</small></label>
                        <input type="text"  class="form-control form-control-sm remarkval gs-gen-input gs-remark-input-1" placeholder="Excellent"> 
                    </div>
                </div>

                <div class="col-1 removeappendform">
                    <i class="fa fa-trash fs-6 text-danger mt-4" style="cursor:pointer;"></i>
                </div>
            </div>
        </div>

        <a href="#" class="float-end mt-3 text-primary" id="appendform" style="text-decoration:underline; margin-bottom:5px;" type="button"><i class="fa fa-plus"></i>Add More</a>';
    }
    else{
        $sqltocheckgradingmethod = mysqli_query($link, "SELECT * FROM `gradingmethod` WHERE `GradingMethodID`='$from_edit_or_create_id' AND `InstitutionID`='$abba_instituion_id'");
        $rowtocheckgradingmethod = mysqli_fetch_array($sqltocheckgradingmethod);
        $counttocheckgradingmethod = mysqli_num_rows($sqltocheckgradingmethod);

        if($counttocheckgradingmethod > 0)
        {
            echo '<input type="hidden" value="'.$from_edit_or_create_id.'" id="creat_or_edit_checker">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label><small>Grading Method Title</small></label>
                        <input type="text" class="form-control form-control-sm methodmaintitle gs-gen-input" placeholder="Primary Grading Method" value="'.$rowtocheckgradingmethod['GradingMethodTitle'].'"> 
                    </div>
                </div>
            </div>
            <div id="formtoappend">';
            
                $abba_sql_check_gradingstructure = ("SELECT * FROM `gradingstructure` WHERE GradingMethodID='$from_edit_or_create_id' AND `InstitutionID`='$abba_instituion_id' ORDER BY RangeStart ASC");
                $abba_result_check_gradingstructure = mysqli_query($link, $abba_sql_check_gradingstructure);
                $abba_row_check_gradingstructure = mysqli_fetch_assoc($abba_result_check_gradingstructure);
                $abba_row_cnt_check_gradingstructure = mysqli_num_rows($abba_result_check_gradingstructure);

                if($abba_row_cnt_check_gradingstructure > 0)
                {
                    do{

                        $rangestart = $abba_row_check_gradingstructure['RangeStart'];
                        $rangeend = $abba_row_check_gradingstructure['RangeEnd'];
                        $grade = $abba_row_check_gradingstructure['Grade'];
                        $remark = $abba_row_check_gradingstructure['Remark'];
                            
                        echo '<div class="row mt-3">
                            <div class="col-3">
                                <div class="form-group">
                                    <label><small>Start</small></label>
                                    <input type="number" class="form-control form-control-sm rangestartval gs-gen-input" placeholder="80" value="'.$rangestart.'"> 
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label><small>End</small></label>
                                    <input type="number"  class="form-control form-control-sm rangeendval gs-gen-input" placeholder="90.99" value="'.$rangeend.'"> 
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-group">
                                    <label><small>Grade</small></label>
                                    <input type="text"  class="form-control form-control-sm gradeval gs-gen-input" placeholder="A" value="'.$grade.'"> 
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label><small>Remark</small></label>
                                    <input type="text"  class="form-control form-control-sm remarkval gs-gen-input" placeholder="Excellent" value="'.$remark.'"> 
                                </div>
                            </div>

                            <div class="col-1 removeappendform">
                                <i class="fa fa-trash fs-6 text-danger mt-4" style="cursor:pointer;"></i>
                            </div>
                        </div>';

                    }while($abba_row_check_gradingstructure = mysqli_fetch_assoc($abba_result_check_gradingstructure));
                }
                else{
                    echo '<div class="row mt-3">
                        <div class="col-3">
                            <div class="form-group">
                                <label><small>Start</small></label>
                                <input type="number" class="form-control form-control-sm rangestartval gs-gen-input" placeholder="80"> 
                            </div>
                        </div>
        
                        <div class="col-3">
                            <div class="form-group">
                                <label><small>End</small></label>
                                <input type="number"  class="form-control form-control-sm rangeendval gs-gen-input" placeholder="90.99"> 
                            </div>
                        </div>
        
                        <div class="col-2">
                            <div class="form-group">
                                <label><small>Grade</small></label>
                                <input type="text"  class="form-control form-control-sm gradeval gs-gen-input" placeholder="A"> 
                            </div>
                        </div>
        
                        <div class="col-3">
                            <div class="form-group">
                                <label><small>Remark</small></label>
                                <input type="text"  class="form-control form-control-sm remarkval gs-gen-input" placeholder="Excellent"> 
                            </div>
                        </div>
        
                        <div class="col-1 removeappendform">
                            <i class="fa fa-trash fs-6 text-danger mt-4" style="cursor:pointer;"></i>
                        </div>
                    </div>';
                }
                
            echo '</div>

            <a href="#" class="float-end mt-3 text-primary" id="appendform" style="text-decoration:underline; margin-bottom:5px;" type="button"><i class="fa fa-plus"></i>Add More</a>';
        }
        else{
            
        }
    }

?>