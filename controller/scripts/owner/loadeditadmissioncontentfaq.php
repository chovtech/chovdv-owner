<?php

            include('../../config/config.php');

        $userID = $_POST['UserID'];
        $IntitutionID = $_POST['InstitutionID'];


        $selectinstitutionqueryquestion = mysqli_query($link, "SELECT * FROM `webadmissionquestion` WHERE InstitutionID='$IntitutionID'");
        $selectinstitutionqueryrowques = mysqli_num_rows($selectinstitutionqueryquestion);
        $selectinstitutionqueryrowquesrow = mysqli_fetch_assoc($selectinstitutionqueryquestion);

        echo '<div class="row">';


                 if($selectinstitutionqueryrowques > 0)
                 {

                                do{
                                                $qustion = $selectinstitutionqueryrowquesrow['Question'];
                                                $answer = $selectinstitutionqueryrowquesrow['Answer'];

                                        echo '<div class="col-sm-6" >
                                                    <div class="pros-geneclass-label" style=""><label for="schoolName">Question <span style="color:red;">*</span></label></div>
                                                    <input type="text" style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;"  placeholder="How do I apply for admission to your school?" value="'.$qustion.'"  class="form-control  prosgeneralfaqquestioneditfaq" >
                                        </div>

                                        <div class="col-sm-6" >
                                                <div class="pros-geneclass-label" style="">
                                                    <label for="schoolName">Answer<span style="color:red;">*</span></label>
                                                </div>

                                                <textarea style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;"    class="form-control form-control-sm generalfaqanswersedit" >'.$answer.'</textarea>
                                        </div>';

                                }while($selectinstitutionqueryrowquesrow = mysqli_fetch_assoc($selectinstitutionqueryquestion));

                 }else
                 {

                    
                            echo '<div class="col-sm-6" >
                            <div class="pros-geneclass-label" style=""><label for="schoolName">Question <span style="color:red;">*</span></label></div>
                            <input type="text" style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;"  placeholder="How do I apply for admission to your school?" value="Enrollment Process & Requirements?"  class="form-control  prosgeneralfaqquestioneditfaq" >
                        </div>

                            <div class="col-sm-6" >
                                    <div class="pros-geneclass-label" style="">
                                        <label for="schoolName">Answer<span style="color:red;">*</span></label>
                                    </div>

                                    <textarea style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;"    class="form-control form-control-sm generalfaqanswersedit" >Parents inquire about the enrollment process and admission requirements, including necessary documents and assessments.</textarea>
                            </div>';

                            
                            echo '<div class="col-sm-6" >
                            <div class="pros-geneclass-label" style=""><label for="schoolName">Question <span style="color:red;">*</span></label></div>
                            <input type="text" style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;"  placeholder="How do I apply for admission to your school?" value="Tuition Fees & Financial Aid?"  class="form-control  prosgeneralfaqquestioneditfaq" >
                        </div>

                        <div class="col-sm-6" >
                                <div class="pros-geneclass-label" style="">
                                    <label for="schoolName">Answer<span style="color:red;">*</span></label>
                                </div>

                                <textarea style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;"    class="form-control form-control-sm generalfaqanswersedit" >Parents seek information on tuition fees and available financial aid options, including scholarships and assistance programs.</textarea>
                         </div>';


                         echo '<div class="col-sm-6" >
                         <div class="pros-geneclass-label" style=""><label for="schoolName">Question <span style="color:red;">*</span></label></div>
                         <input type="text" style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;"  placeholder="How do I apply for admission to your school?" value="Extracurricular Activities & Programs?"  class="form-control  prosgeneralfaqquestioneditfaq" >
                     </div>

                     <div class="col-sm-6" >
                             <div class="pros-geneclass-label" style="">
                                 <label for="schoolName">Answer<span style="color:red;">*</span></label>
                             </div>

                             <textarea style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;"    class="form-control form-control-sm generalfaqanswersedit" >Parents want to know about the school\'s extracurricular activities, clubs, sports, and educational programs beyond academics.</textarea>
                      </div>';



                 }
                  
        echo '</div>';

?>


