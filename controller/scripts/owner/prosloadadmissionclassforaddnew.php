<?php

        include('../../config/config.php');
         $UserID = $_POST['UserID'];
        $InstitutionID = $_POST['IntitutionID'];
        $campusID = $_POST['campusID'];

       

        $selectclasslist = mysqli_query($link,"SELECT * FROM `classtemplate`  ORDER BY ClassTemplateName ASC");
        $selectclasslistrow = mysqli_fetch_assoc($selectclasslist);
        $selectclasslistrowcnt =  mysqli_num_rows($selectclasslist );




        if($selectclasslistrowcnt > 0)
        {


            echo ' <div class="row">';
            
            

       
                       do{


                                 $ClassTemplateName =  $selectclasslistrow['ClassTemplateName'];
                                $ClassTemplateID =  $selectclasslistrow['ClassTemplateID'];


                                $selectcampusclass = mysqli_query($link,"SELECT * FROM `admissionclass` WHERE CampusID='$campusID' AND `AdmissionDefaultClassID`='$ClassTemplateID'");
                                $selectcampusclasscnt = mysqli_num_rows($selectcampusclass);
                                $selectcampusclasscntrow = mysqli_fetch_assoc($selectcampusclass);

                                if($selectcampusclasscnt > 0)
                                {


                                   $AdmissionDefaultClassID = $selectcampusclasscntrow['AdmissionDefaultClassID'];

                                    if($AdmissionDefaultClassID == $ClassTemplateID)
                                    {
                                           $disabled = 'disabled';
                                           $disabledtext = 'disabled';

                                    }else
                                    {
                                        $disabled = '';
                                        $disabledtext = '';
                                    }


                                }else
                                {
                                            $disabled = '';
                                            $disabledtext = '';

                                }



                               

                                  echo '<div class="col-sm-4 mb-3" >

                                            <input '.$disabled.' class="form-check-input pros-getclassforaddnew" data-id="'.$ClassTemplateID.'" data-classname="'.$ClassTemplateName.'"   style="cursor:pointer;font-size:14px;" type="checkbox">
                                            <label  '.$disabled.' data-id="'.$ClassTemplateID.'" style="cursor:pointer;font-size: 14px;" for="md_checkbox_all_primary">'.$ClassTemplateName.'  </label>

                                    </div>';




                       }while($selectclasslistrow = mysqli_fetch_assoc($selectclasslist));


            echo ' </div>';

        }


        


?>