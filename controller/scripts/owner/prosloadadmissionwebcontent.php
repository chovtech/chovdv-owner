<?php

                include('../../config/config.php');
                $UserID = $_POST['UserID'];
                $IntitutionID  = $_POST['IntitutionID'];





                      $getschoolname = mysqli_query($link,"SELECT * FROM `institution` WHERE InstitutionID='$IntitutionID'");
                      $getschoolnamecnt = mysqli_num_rows($getschoolname);
                      $getschoolnamecntrow = mysqli_fetch_assoc($getschoolname);

                      $institutionGeneralname =  $getschoolnamecntrow['InstitutionGeneralName'];


                     $selectinstitutionqueryquestion = mysqli_query($link, "SELECT * FROM `webadmissionquestion` WHERE InstitutionID='$IntitutionID'");
                    $selectinstitutionqueryrowques = mysqli_num_rows($selectinstitutionqueryquestion);
                    $selectinstitutionqueryrowquesrow = mysqli_fetch_assoc($selectinstitutionqueryquestion);




                    $verifyupdatequerysettings = mysqli_query($link, "SELECT * FROM `webadmissionsetting` WHERE  `InstitutionID`='$IntitutionID'");
                    $verifyupdatequerysettingscnt = mysqli_num_rows($verifyupdatequerysettings);
                    $verifyupdatequerysettingscntrow = mysqli_fetch_assoc($verifyupdatequerysettings);



                    if($verifyupdatequerysettingscnt > 0)
                    {


                                      

                        $description =  $verifyupdatequerysettingscntrow['Description'];
                        $Title =  $verifyupdatequerysettingscntrow['Title'];
                        $BackgroundImage = $verifyupdatequerysettingscntrow['BackgroundImage'];
                        $Session =  $verifyupdatequerysettingscntrow['Session'];
                        $Term =  $verifyupdatequerysettingscntrow['Term'];

                    

                        $benefitone =   $verifyupdatequerysettingscntrow['FirstBenefit'];
                        $benefit_two =   $verifyupdatequerysettingscntrow['SecondBenefit'];
                        $benefit_three = $verifyupdatequerysettingscntrow['ThirdBenefit'];
                        $benefit_forth =  $verifyupdatequerysettingscntrow['FourthBenefit'];
                        $benefit_fifth =  $verifyupdatequerysettingscntrow['FifthBenefit'];



                        $startdate =  $verifyupdatequerysettingscntrow['StartDate'];
                        $EndDate =  $verifyupdatequerysettingscntrow['EndDate'];



                       echo '<textarea hidden="hidden" id="prosgetimageandloaddes" rows="4" cols="50">'.$BackgroundImage.'</textarea>';
                     
                        //ADMISSION WELCOME MSG
                    // echo '<input type="hidden" value="'.$BackgroundImage.'" id="prosgetimageandloaddes">';
                    echo '<div class="row">
                            <div class="col-sm-12 col-md-12">
                            <div class="card" style="background-color:white;border-radius:21px;padding-top:40px;">
                            <div class="card-body">
                            <div class="row" id="createwelcomemsg-setup" style="padding:0%;">
                                <div class="col-sm-4">
                                    <div class="proscontainerimage select-image">
                                                
                                        <h4>Background Image <i class="fas fa-pen" style="font-size:13px;"></i></h4>
                                        <input type="file" class="prosfilebackground" id="file" accept="image/*" hidden>
                                        <div class="img-area prosbackgroundimagearea proscreatnewschooldes" data-img="">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                            <p> dimension <span>1000 x 667</span></p>
                                        </div>
                                    
                                    </div>
                                </div>  
    
                                    <div class="col-sm-12 col-lg-8 col-md-8">
                                                   <div class="ms-s" style="display: block;width: 63%; margin-left:6%;">
                                                        <span class="editadmissiondesscriptionbtn" data-id="'.$IntitutionID.'" style="font-size:14px;cursor:pointer;color:#6990F2;" data-bs-toggle="modal"  data-bs-target="#prosloadamissiondurationhere">Edit/Set duration<i class="fas fa-pen" style="font-size:13px;"></i></span>
                                                           <h4 class="title" style="color: #595959;">Admission Duration</h4>';

                                                           if($startdate == '')
                                                           {

                                                                 echo  '<p style="font-size:15px; font-weight: 500;color: #595959;">No duration has been set yet. kindly click to set duration.</p>';
                                                               
                                                           }else
                                                           {

                                                               echo '<p><span style="font-size: 15px;color: #595959; font-weight: 500"><i class="bx bx-book-content"></i>&nbsp;<b>Duration:</b> ' . $startdate .  ' To '  . $EndDate . '</span></p>';

                                                                
                                                           }

                                                          
                                                           
                                                    echo '</div>
                                                   
                                                    <div class="ms-s" style="display: block;width: 63%; margin-left:6%;">
                                                     <span class="editadmissiondesscriptionbtn" data-id="'.$IntitutionID.'" style="font-size:13px;cursor:pointer;color:#6990F2;" data-bs-toggle="modal"  data-bs-target="#edit-admissionprofile">Edit<i class="fas fa-pen" style="font-size:13px;"></i></span>';

                                                              if($Title == '')
                                                              {


                                                                   echo '<h4 class="title" style="color: #595959;">Seeking a Journey of Knowledge and Growth? Apply for Admission Today!  </h4>
                                                                    <p style="font-size:15px; font-weight: 500;color: #595959;">
                                                                                    Congratulations on taking the first step towards unlocking your full potential! We invite you to embark on a transformative educational experience by applying for admission to our prestigious institution.

                                                                                    We look forward to welcoming you to the [Institution Name] family and witnessing your incredible journey of growth and achievement. See you soon! 

                                                                    </p>';

                                                              }else{


                                                                echo '<h4 class="title" style="color: #595959;">'. $Title.' </h4>
                                                                 <p style="font-size:15px; font-weight: 500;color: #595959;">'.$description.'</p>';

                                                              }
                                                        
                                                    echo '</div>
                                                     
                                                    <br>
        
                                                    <div class="prosdesfaq-accordion-text" style="display: block; margin-left:6%;">
                                                    <span class="pros-editadmissionbenefitbtn" data-id="'.$IntitutionID.'" style="font-size:13px;cursor:pointer;color:#6990F2;" data-bs-toggle="modal"  data-bs-target="#edit-admissionprofilebenefit">Edit<i class="fas fa-pen" style="font-size:13px;"></i></span>
                                                       <h4 class="title" style="color: #595959;">BENEFITS </h4>';

                                                       if($benefitone == '')
                                                       {


                                                            echo '<ul class="faq-text prosfagtogledowndes" style="list-style-type:none;font-size:15px;color: #595959;line-height:30px;">
                                                            <li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-checkicon.svg" style="width:20px;"> Academic Excellence: Renowned faculty, state-of-the-art resources, and a rigorous curriculum ensure top-notch education.</li>
                                                            <li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-checkicon.svg" style="width:20px;"> Holistic Development: Access to diverse extracurricular activities fosters personal growth and character development.</li>
                                                            <li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-checkicon.svg" style="width:20px;"> Supportive Community: A close-knit, inclusive environment where students feel valued and encouraged.</li>
                                                            <li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-checkicon.svg" style="width:20px;"> Cutting-Edge Facilities: Modern classrooms and advanced labs for a future-ready learning experience.</li>
                                                            <li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-checkicon.svg" style="width:20px;"> Global Perspective: Embracing diversity, international programs, and cultural exchanges for a broader worldview.</li>

                                                            </ul>';

                                                       }else
                                                       {


                                                               echo  '<ul class="faq-text prosfagtogledowndes" style="list-style-type:none;font-size:15px;color: #595959;line-height:30px;">
                                                                <li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-checkicon.svg" style="width:20px;"> '.$benefitone.'</li>
                                                                <li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-checkicon.svg" style="width:20px;"> '.$benefit_two.'</li>
                                                                <li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-checkicon.svg" style="width:20px;"> '.$benefit_three.'</li>
                                                                <li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-checkicon.svg" style="width:20px;"> '.$benefit_forth.'</li>
                                                                <li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-checkicon.svg" style="width:20px;"> '.$benefit_fifth.'</li>
                                                            </ul>';
                                                       }
                                                                
                                                    
                                                  echo '</div>
                                           
    
                                                   
                                                    
                                            <div class="prosdesfaq-accordion">
                                                <div class="prosdesfaq-accordion-text">
                                                <span class="pros-editadmissionfaqbtn" data-id="'.$IntitutionID.'" style="font-size:13px;cursor:pointer;color:#6990F2;" data-bs-toggle="modal"  data-bs-target="#edit-admissionprofilefaq">Edit<i class="fas fa-pen" style="font-size:13px;"></i></span>
                                                <div class="title" style="color: #595959;">FAQ </div>
                                                <ul class="faq-text prosfagtogledowndes">';
                                                
                                                $selectinstitutionqueryquestion = mysqli_query($link, "SELECT * FROM `webadmissionquestion` WHERE InstitutionID='$IntitutionID'");
                                                $selectinstitutionqueryrowques = mysqli_num_rows($selectinstitutionqueryquestion);
                                                $selectinstitutionqueryrowquesrow = mysqli_fetch_assoc($selectinstitutionqueryquestion);
    




                                                if($selectinstitutionqueryrowques > 0)
                                                {





                                                        do{
        
        
                                                            $qustion = $selectinstitutionqueryrowquesrow['Question'];
                                                            $Answer = $selectinstitutionqueryrowquesrow['Answer'];
                    
                                                            echo '<li>
                                                            <div class="question-arrow">
                                                            <span class="question">'.$qustion.'</span>
                                                            <i class="bx bxs-chevron-down arrow"></i>
                                                            </div>
                                                            <p>'.$Answer.'</p>
                                                            <span class="line"></span>
                                                        </li>';
                    
                    
                    
                                                        }while($selectinstitutionqueryrowquesrow = mysqli_fetch_assoc($selectinstitutionqueryquestion));

                                                }else
                                                {


                                                     
                                                            echo '<li>
                                                                <div class="question-arrow">
                                                                <span class="question">Enrollment Process & Requirements?</span>
                                                                <i class="bx bxs-chevron-down arrow"></i>
                                                                </div>
                                                                <p>Parents inquire about the enrollment process and admission requirements, including necessary documents and assessments.</p>
                                                                <span class="line"></span>
                                                            </li>';


                                                            echo '<li>
                                                                <div class="question-arrow">
                                                                <span class="question">Tuition Fees & Financial Aid?</span>
                                                                <i class="bx bxs-chevron-down arrow"></i>
                                                                </div>
                                                                <p>Parents seek information on tuition fees and available financial aid options, including scholarships and assistance programs.</p>
                                                                <span class="line"></span>
                                                            </li>';

                                                    echo '<li>
                                                            <div class="question-arrow">
                                                            <span class="question">Extracurricular Activities & Programs?</span>
                                                            <i class="bx bxs-chevron-down arrow"></i>
                                                            </div>
                                                                    <p>Parents want to know about the school\'s extracurricular activities, clubs, sports, and educational programs beyond academics.</p>
                                                            <span class="line"></span>
                                                        </li>';


                                                }
    
    
                                        
                                               
                                               echo  '</ul>
                                                </div>
                                            </div>
                                    </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>';
                            //ADMISSION WELCOME MSG


                    }else
                    {



                      
                        $selectinstitutionverifydate  = mysqli_query($link,"SELECT * FROM `webadmissionsetting` WHERE InstitutionID='$IntitutionID'");
                        $selectinstitutionverifydatefetch = mysqli_fetch_assoc($selectinstitutionverifydate);
                        $selectinstitutionverifydatefetchrows = mysqli_num_rows($selectinstitutionverifydate);

                        if($selectinstitutionverifydatefetchrows > 0)
                        {
                           

                            $startdatenew = $selectinstitutionverifydatefetch['StartDate'];
                            $enddatenew = $selectinstitutionverifydatefetch['EndDate'];
                        }else
                        {
                           

                            $startdatenew = '';
                            $enddatenew = '';
                        }
                      
                      

                                                             //ADMISSION WELCOME MSG
                    echo '<input type="hidden" value="" id="prosgetimageandloaddes">';
                    echo '<div class="row">
                            <div class="col-sm-12 col-md-12">
                            <div class="card" style="background-color:white;border-radius:21px;padding-top:40px;">
                            <div class="card-body">
                            <div class="row" id="createwelcomemsg-setup" style="padding:0%;">
                                <div class="col-sm-4">
                                    <div class="proscontainerimage select-image ">
                                                
                                        <h4>Background Image <i class="fas fa-pen" style="font-size:13px;"></i></h4>
                                        <input type="file" class="prosfilebackground" id="file" accept="image/*" hidden>
                                        <div class="img-area prosbackgroundimagearea proscreatnewschooldes" data-img="">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                            <p> dimension <span>1000 x 667</span></p>
                                        </div>
                                    
                                    </div>
                                </div>  
    
                                    <div class="col-sm-12 col-lg-8 col-md-8">
                                                   <div class="ms-s" style="display: block;width: 63%; margin-left:6%;">
                                                        <span class="editadmissiondesscriptionbtn" data-id="'.$IntitutionID.'" style="font-size:14px;cursor:pointer;color:#6990F2;" data-bs-toggle="modal"  data-bs-target="#prosloadamissiondurationhere">Edit/Set duration<i class="fas fa-pen" style="font-size:13px;"></i></span>
                                                           <h4 class="title" style="color: #595959;">Admission Duration</h4>';

                                                           if($startdatenew == '')
                                                           {

                                                                 echo  '<p style="font-size:15px; font-weight: 500;color: #595959;">No duration has been set yet. kindly click to set duration.</p>';
                                                               
                                                           }else
                                                           {

                                                               echo '<p><span style="font-size: 15px;color: #595959; font-weight: 500"><i class="bx bx-book-content"></i>&nbsp;<b>Time:</b>'.$startdatenew.'-'.$enddatenew.'</span></p>';
                                                                
                                                           }

                                                           
                        

                                                          
                                                    echo '</div>
                                                   
                                                    <div class="ms-s" style="display: block;width: 63%; margin-left:6%;">
                                                     <span class="editadmissiondesscriptionbtn" data-id="'.$IntitutionID.'" style="font-size:13px;cursor:pointer;color:#6990F2;" data-bs-toggle="modal"  data-bs-target="#edit-admissionprofile">Edit<i class="fas fa-pen" style="font-size:13px;"></i></span>
                                                         <h4 class="title" style="color: #595959;">Seeking a Journey of Knowledge and Growth? Apply for Admission Today!  </h4>
                                                        <p style="font-size:15px; font-weight: 500;color: #595959;">
                                                                        Congratulations on taking the first step towards unlocking your full potential! We invite you to embark on a transformative educational experience by applying for admission to our prestigious institution.

                                                                        We look forward to welcoming you to the [Institution Name] family and witnessing your incredible journey of growth and achievement. See you soon! 

                                                        </p>
                                                    </div>
                                                     
                                                    <br>
        
                                                    <div class="prosdesfaq-accordion-text" style="display: block; margin-left:6%;">
                                                    <span class="pros-editadmissionbenefitbtn" data-id="'.$IntitutionID.'" style="font-size:13px;cursor:pointer;color:#6990F2;" data-bs-toggle="modal"  data-bs-target="#edit-admissionprofilebenefit">Edit<i class="fas fa-pen" style="font-size:13px;"></i></span>
                                                            <h4 class="title" style="color: #595959;">BENEFITS </h4>
                                                            <ul class="faq-text prosfagtogledowndes" style="list-style-type:none;font-size:15px;color: #595959;line-height:30px;">
                                                            <li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-checkicon.svg" style="width:20px;"> Academic Excellence: Renowned faculty, state-of-the-art resources, and a rigorous curriculum ensure top-notch education.</li>
                                                            <li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-checkicon.svg" style="width:20px;"> Holistic Development: Access to diverse extracurricular activities fosters personal growth and character development.</li>
                                                            <li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-checkicon.svg" style="width:20px;"> Supportive Community: A close-knit, inclusive environment where students feel valued and encouraged.</li>
                                                            <li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-checkicon.svg" style="width:20px;"> Cutting-Edge Facilities: Modern classrooms and advanced labs for a future-ready learning experience.</li>
                                                            <li class="pros-setmsgdesitem"><img  class="" src="../../assets/images/users/pros-checkicon.svg" style="width:20px;"> Global Perspective: Embracing diversity, international programs, and cultural exchanges for a broader worldview.</li>
                                                        </ul>
                                                   </div>
                                           
    
                                                   
                                                    
                                            <div class="prosdesfaq-accordion">
                                                <div class="prosdesfaq-accordion-text">
                                                <span class="pros-editadmissionfaqbtn" data-id="'.$IntitutionID.'" style="font-size:13px;cursor:pointer;color:#6990F2;" data-bs-toggle="modal"  data-bs-target="#edit-admissionprofilefaq">Edit<i class="fas fa-pen" style="font-size:13px;"></i></span>
                                                <div class="title" style="color: #595959;">FAQ </div>
                                                <ul class="faq-text prosfagtogledowndes">';
                                                

                                                
                                                
    
    
    
                                       
                                        echo '<li>
                                                <div class="question-arrow">
                                                <span class="question">Enrollment Process & Requirements?</span>
                                                <i class="bx bxs-chevron-down arrow"></i>
                                                </div>
                                                <p>Parents inquire about the enrollment process and admission requirements, including necessary documents and assessments.</p>
                                                <span class="line"></span>
                                            </li>';
    

                                            echo '<li>
                                                <div class="question-arrow">
                                                <span class="question">Tuition Fees & Financial Aid?</span>
                                                <i class="bx bxs-chevron-down arrow"></i>
                                                </div>
                                                <p>Parents seek information on tuition fees and available financial aid options, including scholarships and assistance programs.</p>
                                                <span class="line"></span>
                                            </li>';

                                    echo '<li>
                                              <div class="question-arrow">
                                              <span class="question">Extracurricular Activities & Programs?</span>
                                              <i class="bx bxs-chevron-down arrow"></i>
                                              </div>
                                                     <p>Parents want to know about the school\'s extracurricular activities, clubs, sports, and educational programs beyond academics.</p>
                                              <span class="line"></span>
                                        </li>';
    
    
    
                                      
                                               
                                               echo  '</ul>
                                                </div>
                                            </div>
                                    </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>';
                            //ADMISSION WELCOME MSG




            }


                                            
                    



?>