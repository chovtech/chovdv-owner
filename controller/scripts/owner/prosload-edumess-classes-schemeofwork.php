<?php

            include('../../config/config.php');

            $prosloadedumess_section = $_POST['prosloadedumess_section'];

            $select_template_subject_here = mysqli_query($link,"SELECT * FROM `classtemplate`  ORDER BY OrderingNum ASC");
            $select_template_subject_here_cnt = mysqli_num_rows($select_template_subject_here);
            $select_template_subject_here_cnt_rows  = mysqli_fetch_assoc($select_template_subject_here);


            if($select_template_subject_here_cnt > 0)
            {

                      echo '<option value="0">Select class</option>'; 

                
                        do{

                            $ClassTemplateName = $select_template_subject_here_cnt_rows['ClassTemplateName'];
                            $TemplateTitle = $select_template_subject_here_cnt_rows['TemplateTitle'];

                            echo '<option value="'.$TemplateTitle.'">'.$ClassTemplateName.'</option>';


                        }while($select_template_subject_here_cnt_rows  = mysqli_fetch_assoc($select_template_subject_here));

            }else
            {
                echo '<option value="0">No class found </option>';  
            }








?>