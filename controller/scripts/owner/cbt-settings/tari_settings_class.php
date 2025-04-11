<?php



    include('../../../config/config.php');

        $campus_id = trim($_POST['campus_id']);
        $sectionID = trim($_POST['sectionID']);
        $term = trim($_POST['term']);
       

     

        // get Class
        $check_class = "SELECT * FROM `classordepartment` WHERE `CampusID`='$campus_id' AND `SectionID`='$sectionID' ORDER BY ClassOrDepartmentName";
                    

                // ORDER BY `curriculumtopic`.`TopicName` ASC 

            $query_class = mysqli_query($link,$check_class);
            $fetch_class= mysqli_fetch_assoc($query_class);
            $row_class = mysqli_num_rows($query_class);
            

        if($row_class > 0)
        {

            echo '
            <form class="selectSubject" syle="margin-left:60px;">';
                
            do{


                

                
                $ClassID = $fetch_class['ClassOrDepartmentID'];
                $ClassName = $fetch_class['ClassOrDepartmentName'];
                $ClassTemplateID = $fetch_class['ClassTemplateID'];

                

                // echo '<div class="tari_checkbox p-2" data-id="'.$ClassID.'" style="dispplay:flex;">
                //             <label class="tari_checkbox-wrapper">
                //             <input type="checkbox" class="tari_checkbox-input" id="class_slect_settings" name="tari_settings_class" value="'.$ClassID.'" />
                //             <span class="tari_checkbox-tile">
                //                 <span class="tari_checkbox-label">'.$ClassName.'</span>
                //             </span>
                //         </label>
                // </div>';   



                echo '<label class="ps-1 py-1 subjectDirect" data-id="'. $ClassID .'">
                <input type="checkbox" class="tari_checkbox-input prosloadclassfortosetexam" name="radio3" data-id="'. $ClassTemplateID .'" value="'.$ClassID .'"/>
                <span style="font-size:12px;">'. $ClassName.'</span>
            </label>';   

            }while($fetch_class= mysqli_fetch_assoc($query_class));

            echo '</form> <span class="float-end text-primary prosloadlastinputfiltercontent_cbtsetbtn" style="margin-right:20px;font-size:17px;text-decoration:underline;">Next <i class="fa fa-step-forward " aria-hidden="true"></i></span>';
        }else{
            echo '<img src="err.png" width="70" class="img-fluid mx-auto d-block" alt="...">
                    <figure class="text-center">
                        <blockquote class="blockquote">
                        <p style="font-size:12px;">No Class Allocated to this Subject.</p>
                        </blockquote>
                    </figure>';
        }
?>
