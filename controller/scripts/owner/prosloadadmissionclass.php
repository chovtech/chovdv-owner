<?php

        include('../../config/config.php');
         $UserID = $_POST['UserID'];
        $InstitutionID = $_POST['IntitutionID'];


         $selectinstitution = mysqli_query($link,"SELECT * FROM `institution` INNER JOIN `campus` ON `institution`.`InstitutionID`= `campus`.`InstitutionID` WHERE `institution`.`InstitutionID`='$InstitutionID'");
         $selectinstitutioncnt = mysqli_num_rows($selectinstitution);
         $selectinstitutioncntrow = mysqli_fetch_assoc($selectinstitution);


         if($selectinstitutioncnt > 0)
         {
              
            echo '<div class="row">';
           
                    do{


                        $campusname =  $selectinstitutioncntrow['CampusName'];
                        $campusID =  $selectinstitutioncntrow['CampusID'];
                        $campusemail =  $selectinstitutioncntrow['CampusEmail'];
                        $campusphone =  $selectinstitutioncntrow['CampusPhone'];
                        $address =  $selectinstitutioncntrow['CampusAddress'];
                        $campustagstate =  $selectinstitutioncntrow['TagState'];

                        $firstLetter = substr($campusname, 0, 1);

                        $selectcampusclass = mysqli_query($link,"SELECT * FROM `admissionclass` WHERE CampusID='$campusID'");
                        $selectcampusclasscnt = mysqli_num_rows($selectcampusclass);
                        $selectcampusclasscntrow = mysqli_fetch_assoc($selectcampusclass);


                        // <small class="text-secondary" style="font-size:9px;">Campus 1</small>
                           echo  '<div class="col-md-12 col-lg-6">
                                
                                <div class="card mb-3" style="max-width: 540px; border:2px dashed #007ffb;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <span class="btn btn-sm btn-icon fw-bold p-0"
                                                style="cursor:pointer;background-color:#F1F5F9;color:#007bff;font-size:60px;width:100%;height:100%;justify-content: center; display: flex; align-items: center;">
                                                '.$firstLetter.'
                                            </span>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body text-secondary">

                                                <div class="row">
                                                    <div class="col-lg-7 col-md-12">
                                                        <h6 class="card-title">'.$campusname.' <br><small style="font-size:11px;">';  


                                                       

                                                        if($selectcampusclasscnt > 0)
                                                        {

                                                        }else
                                                        {
                                                            echo '<small class="" style="font-size:11px;">adminssion not set </small>';
                                                        }
                                                        
                                                        
                                                        echo ' </small></h6>

                                                   </div>


                                                    <div class="col-lg-5 col-md-12">
                                                        <i class="fa fa-eye float-end text-primary" data-bs-toggle="collapse"
                                                            href="#collapseExample'.$campusID.'" aria-expanded="false" aria-controls="collapseExample'.$campusID.'"
                                                            style="cursor:pointer;text-decoration: underline;font-size:11px;"> View class list</i>

                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">

                                                        <div class="collapse" id="collapseExample'.$campusID.'">
                                                            <div class="card card-body">
                                                                <div class="col-md-12 col-lg-12">
                                                                         <small style="font-size:11px;"> </small>';

                                                                               if( $selectcampusclasscnt > 0)
                                                                               {


                                                                                $num = 1;

                                                                                    echo '<center><h6 class="title">Class list here </h6></center>
                                                                                    <div class="row">
                                                                                    ';

                                                                                      do{


                                                                                        $ClassID = $selectcampusclasscntrow['AdmissionDefaultClassID'];

                                                                                              $selectclasslist = mysqli_query($link,"SELECT * FROM `classtemplate` WHERE ClassTemplateID='$ClassID' ORDER BY ClassTemplateName ASC");
                                                                                              $selectclasslistrow = mysqli_fetch_assoc($selectclasslist);


                                                                                             $ClassTemplateName =  $selectclasslistrow['ClassTemplateName'];

                                                                                        
                                                                                       echo '
                                                                                            <div class="col-sm-6">
                                                                                            <ul class=" " style="list-style-type:none;font-size:12px;line-height:30px;">

                                                                                                    <li class="pros-setmsgdesitem">'.$num++.' '.$ClassTemplateName.' </li>
                                                                                            
                                                                                            </ul>
                                                                                            </div>
                                                                                       ';

                                                                                      }while($selectcampusclasscntrow = mysqli_fetch_assoc($selectcampusclass));

                                                                                      echo '</div>';
                                                                               }else
                                                                               {
                                                                                        echo '<p class="text-info">admission classes not set</p>';
                                                                               }
                       

                                                                             
                                                                echo '</div>
                                                                <hr>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="button"
                                                    class="btn btn-sm text-white float-end mt-2 rounded-3 btn-primary mb-2 proseditschooladmissiongeralsettings"
                                                    data-bs-toggle="modal" data-bs-target="#prosloadmodaladminprefixsettings" style="font-size:11px;"
                                                    data-campusid="'.$campusID.'"><i class="fas fa-plus"> Add/Edit </i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';



                    }while($selectinstitutioncntrow = mysqli_fetch_assoc($selectinstitution));
           echo '</div>';

         }





?>


           