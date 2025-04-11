<?php

                include('../../config/config.php');
                $IntitutionID = $_POST['IntitutionID'];
                $campusID = $_POST['campusID'];



                $pros_verify_sectio_created = mysqli_query($link,"SELECT * FROM `section` WHERE `CampusID`='$campusID' AND SectionTrashStatus='0'"); 
                $pros_verify_sectio_created_cnt = mysqli_num_rows($pros_verify_sectio_created);
                $pros_verify_sectio_created_cnt_row = mysqli_fetch_assoc($pros_verify_sectio_created);





              




                if($pros_verify_sectio_created_cnt  > 0)
                {


                      echo '<div class="row">';
                                    do{


                                       $SectionName =  strtoupper($pros_verify_sectio_created_cnt_row['SectionName']);
                                       $SectionID =  strtoupper($pros_verify_sectio_created_cnt_row['SectionID']);

                                        $firstLetter = substr($SectionName , 0, 1);
                                        $uppercaseString = strtoupper($firstLetter);

                                    echo  '<div class="col-md-12 col-lg-6">
                                        <div class="card mb-3" style="max-width: 540px; border:2px dashed #007ffb;">
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                    <span class="btn btn-sm btn-icon fw-bold p-0"
                                                        style="cursor:pointer;background-color:#F1F5F9;color:#007bff;font-size:60px;width:100%;height:100%;justify-content: center; display: flex; align-items: center;">
                                                       '.$uppercaseString.'
                                                    </span>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body text-secondary">
        
                                                        <div class="row">
                                                            <div class="col-lg-7 col-md-12">
                                                                <h6 class="card-title">'.$SectionName.' <br><small style="font-size:11px;">';  
        
                                                                echo ' </small></h6>
        
                                                           </div>
                                                           
                                                        </div>

                                                        <div class="card-text"> 
                                                        <button type="button" class="btn btn-sm text-white float-end  m-2 rounded-3 btn-danger mb-2 tari_delete_settings" data-bs-toggle="modal" data-bs-target="#pros-delete-schemme-workmodal" id="prosloaddeletecontentbtn" style="font-size:11px;" data-id="'.$SectionID.'" data-secname="'.$SectionName.'">
                                                        <i class="fas fa-trash"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-sm text-white float-end  m-2 rounded-3 btn-warning mb-2 tari_edit_setting" data-bs-toggle="modal" data-bs-target="#pros-editsectionhere" id="prosloadsectioneditcontenthere" style="font-size:11px;" data-id="'.$SectionID.'" data-camp="'.$campusID.'">
                                                        <i class="fas fa-edit"></i>
                                                        </button>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';


                                   
                                    }while($pros_verify_sectio_created_cnt_row = mysqli_fetch_assoc($pros_verify_sectio_created));

                    echo '</div>';
                }else
                {



                        $selectwelcomingimage = mysqli_query($link,"SELECT * FROM `defaultimages` WHERE ImageName='abba-no-record-found-image2'");
                        $selectwelcomingimagecnt = mysqli_num_rows($selectwelcomingimage);
                        $selectwelcomingimagecntrow = mysqli_fetch_assoc($selectwelcomingimage);
                    
                        $welcoming_images_onborading =  $selectwelcomingimagecntrow['BaseSixtyFour'];



                    
                        echo '<div align="center" class="pb-1 pt-0 justify-content-center">
                        <img class="img-fluid" align="center" src="'.$welcoming_images_onborading.'"   style="width:10%;">

                        <p class="pt-2 fs-6 text-secondary">No section found!</p>
                        </div>';
                        
                                 
                }





                

?>