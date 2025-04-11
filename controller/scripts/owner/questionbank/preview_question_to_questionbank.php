<?php
include('../../../config/config.php');


        $types = $_POST['types'];

        $class = explode("||##,",$_POST['question']);
        $text = $_POST['question'];
        $textareaVal = explode("||##,",$text);
        $arrclasslength = sizeof($class);
    


        if($types == 'Objective'){
          
            $optionAVal = $_POST['optionA'];
            $optionAVal = $_POST['optionA'];
            $optionBVal = $_POST['optionB'];
            $optionCVal = $_POST['optionC'];
            $optionDVal = $_POST['optionD'];
            $selectVal = $_POST['select'];

            for($i=0; $i < $arrclasslength; $i++){
                
                $classarr = $class[$i];
                $num = $i + 1;

                    $textareaValarr = $textareaVal[$i];
                    $optionAValarr = explode("||##,",$optionAVal)[$i];
                    $optionBValarr = explode("||##,",$optionBVal)[$i];
                    $optionCValarr = explode("||##,",$optionCVal)[$i];
                    $optionDValarr = explode("||##,",$optionDVal)[$i];
                    $selectValarr = explode(",",$selectVal)[$i];
                    
                    $question =  mysqli_real_escape_string($link,str_replace('||##','',$textareaValarr));
                    $optionA =  mysqli_real_escape_string($link,str_replace('||##','',$optionAValarr));
                    $optionB =  mysqli_real_escape_string($link,str_replace('||##','',$optionBValarr));
                    $optionC =  mysqli_real_escape_string($link,str_replace('||##','',$optionCValarr));
                    $optionD =  mysqli_real_escape_string($link,str_replace('||##','',$optionDValarr));


                        echo '<div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                        <div class="card question_card" data-count="'.$num.'">
                            <div class="card-body">
                                <div class="card-title">
                                    <h5>Question '.$num.'</h5>
                                </div>
                                <div class="card-text fw-normal">
                                    <p> '.$question.'</p>
                                </div>
                                <div class="card-text">
                                    <form class="question_option">
                                        <label class="mx-auto">
                                            <p class="me-2">A.</p>'.$optionA.'
                                        </label>
                                        <label class="mx-auto">
                                            <p class="me-2">B.</p>'.$optionB.'
                                        </label>
                                        <label class="mx-auto">
                                            <p class="me-2">C.</p>'.$optionC.' 
                                        </label>
                                        <label class="mx-auto">
                                            <p class="me-2">D.</p>'.$optionD.'
                                        </label>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>';
                
            }

        }elseif($types == 'Theory'){


            for($i=0; $i < $arrclasslength; $i++){
                                    
                $classarr = $class[$i];
                $num = $i + 1;

                    $textareaValarr = $textareaVal[$i];
                    $question2 =   mysqli_real_escape_string($link,str_replace('||##','',$textareaValarr));

                    echo '<div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-1">
                            <div class="card question_card" data-count="'.$num.'">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h5>Question '.$num++.'</h5>
                                    </div>
                                    <div class="card-text">
                                        <p> '.$question2.'</p>
                                    </div>
                                </div>
                            </div>
                        </div>';
                
            }
            
        }











       

                   
                       
               
            
                   
          
?>