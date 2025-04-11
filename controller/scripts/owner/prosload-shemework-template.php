<?php

            include('../../config/config.php');

            $prosrgionvalue = $_POST['prosrgionvalue'];
            $prosselect_templateclass = $_POST['prosselect_templateclass'];
            $prosselect_templatesubject = $_POST['prosselect_templatesubject'];
            $prosselect_template_term = $_POST['prosselect_template_term'];



             $select_topicshere = mysqli_query($link,"SELECT * FROM `templatecurriculumtopic` WHERE SubjectOrCourseID='$prosselect_templatesubject' AND TermOrSemesterName='$prosselect_template_term' AND CountryOrRegion='$prosrgionvalue' ORDER BY TemplateCurriculumTopicID ASC ");
             $select_topicsherecnt = mysqli_num_rows($select_topicshere);
             $select_topicsherecntrow = mysqli_fetch_assoc($select_topicshere);


               if($select_topicsherecnt > 0)
               {


                        $num = 1;

                            echo '<div class="card mb-3" style="border:2px dashed #007ffb;">
                            <div class="card-body text-secondary">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="card card-body">';

                                                    do{

                                                        $TopicName =  $select_topicsherecntrow['TopicName'];

                                                        echo '<ul class="list-group progetopicgotten" data-topic="'.$TopicName.'" style="list-style-type:none;font-size:13px;font-weight:550;line-height:40px;">';

                                                           

                                                           echo '<li class="">'.$num++.' '.$TopicName.'</li>';

                                                        echo '</ul>';

                                                    }while($select_topicsherecntrow = mysqli_fetch_assoc($select_topicshere));
                                                 
                                        echo '</div>         
                                    </div>
                                </div>
                            </div>
                        </div>';

               }










?>