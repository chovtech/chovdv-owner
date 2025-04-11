<?php

        include('../../config/config.php');
        $campusID = $_POST['campusID'];
        $classID = $_POST['classID'];
        $Term = $_POST['Term'];
        $topicID = $_POST['topicID'];

       


        $select_topiccreated = mysqli_query($link,"SELECT * FROM `curriculumtopic` WHERE
        CampusID='$campusID' AND TermOrSemesterName='$Term' AND CurriculumTopicID='$topicID'");
         $select_topiccreated_cnt = mysqli_num_rows($select_topiccreated);
        $select_topiccreated_cnt_rows = mysqli_fetch_assoc($select_topiccreated);



        if($select_topiccreated_cnt > 0)
        {
                

           

                $topicname = $select_topiccreated_cnt_rows['TopicName'];


                    echo '<input type="hidden" value="'.$topicID.'" id="prosgettopicidforeditvalue">';

                echo '<div class="form-group local-forms">
                        <label style="font-weight:700;">Topic Name</label>
                        <input type="text" class="form-control prosgettopicnameedit" value="'.$topicname.'"    placeholder="enter your topic here" style="border:1px solid #007ffb;border-radius:5px;">
                </div>';

                $select_subtopic = mysqli_query($link,"SELECT * FROM `curriculumsubtopic` WHERE `CampusID`='$campusID' AND `CurriculumTopicID`='$topicID'");
                $select_subtopic_cnt = mysqli_num_rows($select_subtopic);
                $select_subtopic_cnt_row = mysqli_fetch_assoc($select_subtopic);

                if($select_subtopic_cnt  )

                    if($select_subtopic_cnt > 0)
                    {


                        echo '<div class="row mt-2" >';
                           do{



                                    $subtopicname = $select_subtopic_cnt_row['SubTopicName'];
                                    $CurriculumSubTopic = $select_subtopic_cnt_row['CurriculumSubTopic'];



                                   
                                echo '
                                <br>
                                <div class="col-sm-6">
                                        <div class="form-group local-forms">
                                            <label style="font-weight:800;"> Sub topic </label>
                                            <input type="text" class="form-control form-control-sm prostopicnamegotten_subtopicedit'.$topicID.' prosloadsubtopicvalueeditforalladded" data-subtop="'.$CurriculumSubTopic.'" value="'.$subtopicname.'"  placeholder="sub topic" style="border:1px solid #007ffb;border-radius:5px;">
                                            
                                        </div>
                                    </div>

                                    <div class="col-3">
                                            <span class="fa fa-trash mt-4 text-danger prosproceedtoremovesubtopicbtneditadded" data-campus="'.$campusID.'"  data-tag="'.$CurriculumSubTopic.'" data-id="" style="font-size:16px;cursor:pointer;"></span>
                                    </div>

                                    <div class="col-3">
                                    </div>';


                           }while($select_subtopic_cnt_row = mysqli_fetch_assoc($select_subtopic));

                           echo '</div>';
                    }

                    echo '<div class="prosisplaysubtopiceach1edit"></div>


                    <a id="pros-appenbtn-addRownew-subtopicedit" data-id="'.$topicID.'" style="cursor:pointer;" class="btn-floating  float-end mt-1">Add sub topic<i class="fa fa-plus"></i></a>';
    
    
    
                    
                     echo '<input type="hidden" id="proscollect-topicollectedsubeditstoreinputvalueextral" value="'.$select_subtopic_cnt.'">';
                    
                    
           

        }else
        {

        }

          




?>