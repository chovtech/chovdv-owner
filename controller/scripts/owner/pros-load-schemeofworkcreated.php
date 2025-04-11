<?php

    include('../../config/config.php');

    $abba_instituion_id = $_POST['abba_instituion_id'];
    $campusID = $_POST['campusID'];
    $classID = $_POST['classID'];
    $Term = $_POST['Term'];



    $selectwelcomingimage = mysqli_query($link,"SELECT * FROM `defaultimages` WHERE ImageName='abba-no-record-found-image2'");
    $selectwelcomingimagecnt = mysqli_num_rows($selectwelcomingimage);
    $selectwelcomingimagecntrow = mysqli_fetch_assoc($selectwelcomingimage);

    $welcoming_images_onborading =  $selectwelcomingimagecntrow['BaseSixtyFour'];


   

    
    
    if($campusID == 'NULL' ||  $campusID == '' ||  $campusID == '0' && $Term == 'NULL' ||  $Term == '' ||  $Term== '0')
    {

                echo '<div align="center" class="pb-1 pt-0 justify-content-center">
                <img class="img-fluid" align="center" src="'.$welcoming_images_onborading.'"   style="width:10%;">

                <p class="pt-2 fs-6 text-secondary">Hey! Select atleast term and campus.</p>
                </div>';

    }else
    {

    
   
     


        $select_topicverification =  mysqli_query($link," SELECT DISTINCT(`curriculumtopic`.`ClassOrDepartmentID`),`classordepartment`.`ClassOrDepartmentName`,`campus`.`CampusName`
        FROM `curriculumtopic` INNER JOIN `classordepartment` ON `curriculumtopic`.`ClassOrDepartmentID` = `classordepartment`.`ClassOrDepartmentID` 
        INNER JOIN `campus` ON `curriculumtopic`.`CampusID` = `campus`.`CampusID` WHERE 
        `curriculumtopic`.`CampusID`='$campusID' AND `curriculumtopic`.`TermOrSemesterName`='$Term' 
        AND  (`curriculumtopic`.ClassOrDepartmentID=$classID OR  $classID IS NULL)"); 
       
        $select_topicverification_cnt_result = mysqli_num_rows($select_topicverification);
        $select_topicverification_cnt_resultrow = mysqli_fetch_assoc($select_topicverification);


        if($select_topicverification_cnt_result > 0)
        {

            
            echo '<br><br>
            <div class="row">';

            do{


                    echo '<div class="col-md-12 col-lg-6">';

                    if($campusID == 'NULL' ||  $campusID == '' ||  $campusID == '0')
                    {


                        echo '<small class="text-secondary" style="font-size:9px;">'. $select_topicverification_cnt_resultrow['CampusName'].'</small>';
                    }
                    else
                    {
                        
                    }
                    
                    echo '<div class="card mb-3" style="max-width: 540px; border:2px dashed #007ffb;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <span class="btn btn-sm btn-icon fw-bold p-0" style="cursor:pointer;background-color:#F1F5F9;color:#007bff;font-size:60px;width:100%;height:100%;justify-content: center; display: flex; align-items: center;">
                                    '.strtoupper(trim($select_topicverification_cnt_resultrow['ClassOrDepartmentName'])[0]).'
                                </span>
                            </div>';
    
                           
                            
                            echo '<div class="col-md-8">
                                <div class="card-body text-secondary">
    
                                    <div class="row">
                                        <div class="col-lg-7 col-md-12">
                                            <h6 class="card-title">'.$select_topicverification_cnt_resultrow['ClassOrDepartmentName'].'</h6>
                                        </div>
                                        <div class="col-lg-5 col-md-12">
                                            <i class="fa fa-eye float-end text-primary"  data-bs-toggle="modal" data-bs-target="#prosloadschemeworkmodal" id="prosloadschemmeofworkviewbtn" data-term="'.$Term.'" data-id="'.$select_topicverification_cnt_resultrow['ClassOrDepartmentID'].'" style="cursor:pointer;text-decoration: underline;font-size:11px;"> View Details</i>
                                            
                                            
                                        </div>
                                    </div>
    
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            
                                            <div class="collapse" id="collapseExample">
                                                <div class="card card-body">';
                                           
                                                echo '</div>
                                            </div>
                                        </div>
                                    </div>';
                                                    
                                   
                                echo '</div>
                            </div>
                        </div>
                    </div>
                </div>';


              

            }while($select_topicverification_cnt_resultrow = mysqli_fetch_assoc($select_topicverification));


        echo '</div>';

        }else
        { 
            

                   


                    echo '<div align="center" class="pb-1 pt-0 justify-content-center">
                                <img class="img-fluid" align="center" src="'.$welcoming_images_onborading.'"   style="width:10%;">

                                <p class="pt-2 fs-6 text-secondary">No records found.</p>
                        </div>';

           
        }

    }


?>