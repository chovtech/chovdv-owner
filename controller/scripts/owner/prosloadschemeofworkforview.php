<?php


     include('../../config/config.php');

    $abba_instituion_id = $_POST['abba_get_stored_instituion_id'];
    $campusID = $_POST['campusID'];
    $classID = $_POST['classID'];
    $Term = $_POST['Term'];



   
     


        $select_schemeofworkview = mysqli_query($link,"SELECT * FROM `curriculumtopic` INNER JOIN `subjectorcourse` ON `curriculumtopic`.`SubjectOrCourseID` = `subjectorcourse`.`SubjectOrCourseID` WHERE
        `curriculumtopic`.`CampusID`='$campusID' AND 
        `curriculumtopic`.`ClassOrDepartmentID`='$classID' AND `curriculumtopic`.`TermOrSemesterName`='$Term' GROUP BY `curriculumtopic`.`SubjectOrCourseID`");
        $select_schemeofworkviewcnt = mysqli_num_rows($select_schemeofworkview);
        $select_schemeofworkviewcnt_row = mysqli_fetch_assoc($select_schemeofworkview);



        if($select_schemeofworkviewcnt > 0)
        {

            $num =1;
            
            echo '<div class="row">';

                  do{


                   $SubjectOrCourseID = $select_schemeofworkviewcnt_row['SubjectOrCourseID'];

                        echo '
                       
                        <div class="col-md-12 col-lg-6 gs-active-card gs-abba_card">
                        <div class="card mb-3" style="border:2px dashed #007ffb;">
                            <div class="card-body text-secondary">
                                <div class="row">
                                    <div class="col-lg-8 col-md-12">
                                        <h6 class="card-title"><h6>'.$select_schemeofworkviewcnt_row['SubjectOrCourseTitle'].'</h6> <br><small style="font-size:11px;"></small></h6>
                                    </div>
                                </div>

                                <div class="row">
                                   ';

                                            echo '<div class="col-lg-12 col-md-12 mt-2">
                                            <div class="card card-body">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Range</th>
                                                            <th scope="col"></th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>';
                                                    
                                                   
                                                            $select_topiccreated = mysqli_query($link,"SELECT * FROM `curriculumtopic` WHERE
                                                             CampusID='$campusID' AND ClassOrDepartmentID='$classID' AND SubjectOrCourseID='$SubjectOrCourseID' AND TermOrSemesterName='$Term'");
                                                             $select_topiccreated_cnt = mysqli_num_rows($select_topiccreated);
                                                             $select_topiccreated_cnt_rows = mysqli_fetch_assoc($select_topiccreated);

                                                                do{


                                                                     $topicID = $select_topiccreated_cnt_rows['CurriculumTopicID'];

                                                                    echo '<tr id="prosremovetopfordeletehere'.$topicID.'">
                                                                                <td> '.$select_topiccreated_cnt_rows['TopicName'].'</td>
                                                                                <td></td>
                                                                                <td>';
                                                                                        echo '<a href="javascript:void();"  class="prosloadschemmeofworkforeditbtn"  data-topic="'.$topicID.'"     style=" font-size: 15px;"><i class="fa fa-edit text-warning" aria-hidden="true"></i></a>
                                                                                        <a  href="javascript:void();" data-campus=""   class="prosloadschemeofworkdel " data-topic="'.$topicID.'" data-name="'.$select_topiccreated_cnt_rows['TopicName'].'"    style="font-size:15px;color:red;"><i class="fa fa-trash"  aria-hidden="true"></i></a>';
                                                                            echo '</td>
                                                                        </tr>';


                                                                }while($select_topiccreated_cnt_rows = mysqli_fetch_assoc($select_topiccreated));

                
                                                    echo '</tbody>
                                                </table>
                                            </div>
                                        </div>';
                                echo '</div>

                            </div>   
                        </div>
                    </div>
                   ';
                    
                  }while($select_schemeofworkviewcnt_row = mysqli_fetch_assoc($select_schemeofworkview));
                 echo '</div>';
        }else

        {

        }
                
               




?>